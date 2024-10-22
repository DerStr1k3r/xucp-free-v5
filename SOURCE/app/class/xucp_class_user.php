<?php
// ************************************************************************************//
// * xUCP Free
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 5.1
// * 
// * Copyright (c) 2024 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//

class xUCP_User {    
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function discordLogin(string $clientId, string $clientSecret, string $redirectUri): void {
        // Step 1: Get the authorization code
        if (!isset($_GET['code'])) {
            $authUrl = "https://discord.com/api/oauth2/authorize?client_id={$clientId}&redirect_uri={$redirectUri}&response_type=code&scope=identify email";
            header("Location: $authUrl");
            exit();
        }

        // Step 2: Exchange the authorization code for an access token
        $code = $_GET['code'];
        $tokenUrl = "https://discord.com/api/oauth2/token";
        $data = [
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'grant_type' => 'authorization_code',
            'code' => $code,
            'redirect_uri' => $redirectUri,
        ];

        $options = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data),
            ],
        ];

        try {
            $context  = stream_context_create($options);
            $response = file_get_contents($tokenUrl, false, $context);

            if ($response === false) {
                // Handle file_get_contents failure
                echo "Failed to get response from Discord token endpoint.";
                return;
            }

            $tokenData = json_decode($response, true);

            if (isset($tokenData['access_token'])) {
                // Access token obtained successfully
                $accessToken = $tokenData['access_token'];

                // Step 3: Use the access token to get the user's information
                $userUrl = "https://discord.com/api/users/@me";
                $options = [
                    'http' => [
                        'header' => "Authorization: Bearer $accessToken\r\n",
                    ],
                ];
                $context = stream_context_create($options);
                $userInfo = file_get_contents($userUrl, false, $context);

                if ($userInfo === false) {
                    // Handle file_get_contents failure
                    echo "Failed to get user info from Discord.";
                    return;
                }

                $user = json_decode($userInfo, true);

                if ($user) {
                    $this->processDiscordUser($user); // Aufruf der privaten Methode innerhalb der Klasse erlaubt
                } else {
                    echo "Failed to decode user info JSON.";
                }
            } else {
                echo "Failed to get access token from Discord.";
            }
        } catch (Exception $e) {
            // Handle any exceptions that may occur during the process
            echo "Exception occurred: " . $e->getMessage();
        }
    }

    public function processDiscordUser(array $user): void {
        $discordId = $user['id'];
        $username = $user['username'];
        $email = $user['email'];

        $sql = 'SELECT * FROM xucp_accounts WHERE discord_id = :discord_id';
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['discord_id' => $discordId]);
        $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existingUser) {
            $this->loginDiscordUser($existingUser); 
        } else {
            $this->registerDiscordUser($discordId, $username, $email);
        }
    }

    private function registerDiscordUser(string $discordId, string $username, string $email): void {
        $sql = 'INSERT INTO xucp_accounts (discord_id, username, email) VALUES (:discord_id, :username, :email)';
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['discord_id' => $discordId, 'username' => $username, 'email' => $email]);

        $userId = $this->db->lastInsertId();
        $newUser = [
            'id' => $userId,
            'username' => $username,
            'email' => $email,
        ];

        $this->loginDiscordUser($newUser);
    }

    private function loginDiscordUser(array $user): void {
        $token = bin2hex(random_bytes(32));
        $sql = 'UPDATE xucp_accounts SET token = :token WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['token' => $token, 'id' => $user['id']]);
    
        // Session setzen
        $_SESSION['xucp_free'] = [
            'secure_first' => $user['id'],
            'secure_uname' => $user['username'],
            'secure_uavatar' => $user['userava'] ?? null,
            'secure_granted' => 'granted',
            'secure_staff' => $user['adminlevel'] ?? 0,
            'secure_lang' => $user['language'] ?? 'en',
            'secure_ban_status' => $user['ban'] ?? 0,
            'secure_token' => $token,
            'secure_key' => hash(SITE_LOGIN_SECURE_ALGO, SITE_LOGIN_SECURE_ALGO_ENCRYPT),
        ];
    
        header("Location: /vendor/backend/user/dashboard/index");
        exit();
    }

    public function addUser(string $username, string $password, string $email, string $discordid): void {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $token = hash_hmac('sha256', rand().time(), 'xUCP');
        $sql = 'INSERT INTO xucp_accounts (username,email,password,discord_id,token) VALUES (:xucp_username,:xucp_email,:xucp_password,:xucp_discord_id,:xucp_token)';
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['xucp_username' => $username, 'xucp_password' => $hashed_password, 'xucp_email' => $email, 'xucp_discord_id' => $discordid, 'xucp_token' => $token]);
    }

    public function updateUser(int $userId, array $data): void {
        $sql = 'UPDATE xucp_accounts SET ';

        $fields = [];
        $params = ['id' => $userId];
        foreach ($data as $field => $value) {
            $fields[] = "$field = :$field";
            if ($field == 'password') {
                $params[$field] = password_hash($value, PASSWORD_BCRYPT);
            } else {
                $params[$field] = $value;
            }
        }

        $sql .= implode(', ', $fields);
        $sql .= ' WHERE id = :id';

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
    }

    public function isLoggedIn(): bool {
        if (isset($_SESSION['xucp_free']['secure_first']) &&
            $_SESSION['xucp_free']['secure_granted'] === 'granted' &&
            isset($_SESSION['xucp_free']['secure_token'])) {

            $userId = $_SESSION['xucp_free']['secure_first'];
            $token = $_SESSION['xucp_free']['secure_token'];
            $sql = 'SELECT COUNT(*) AS count FROM xucp_accounts WHERE id = :id AND token = :token';
            $stmt = $this->db->prepare($sql);
            $stmt->execute(['id' => $userId, 'token' => $token]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result['count'] > 0) {
                return true;
            } else {
                session_unset();
                session_destroy();
                header("Location: /index");
                exit();
            }
        } else {
            session_unset();
            session_destroy();
            header("Location: /index");
            exit();
        }
    }

    public function logout(): void {
        session_start();
        if (isset($_SESSION['xucp_free']['secure_first'])) {
            $this->deleteToken($_SESSION['xucp_free']['secure_first']);
            session_unset();
            session_destroy();
        }
    }

    public function deleteToken(int $userId): void {
        $sql = 'UPDATE xucp_accounts SET token = "" WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $userId]);
    }
}