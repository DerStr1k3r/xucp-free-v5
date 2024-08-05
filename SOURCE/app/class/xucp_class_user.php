<?php
// ************************************************************************************//
// * xUCP Free
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 5.0
// *
// * Copyright (c) 2023 - 2024 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
class xUCP_User {
    private PDO $db;
    
    public function __construct(PDO $db) {
        $this->pdo = $db;
    }
    
    public function register(string $username, string $password, string $email): void {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $token = hash_hmac('sha256', rand().time(), 'xUCP');
        $sql = 'INSERT INTO xucp_accounts (username,email,password,token) VALUES (:xucp_username,:xucp_email,:xucp_password,:xucp_token)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['xucp_username' => $username, 'xucp_password' => $hashed_password, 'xucp_email' => $email, 'xucp_token' => $token]);

        $subject = "".MSG_28." ".$_SESSION['xucp_free']['site_settings_site_name']."";
        $message = "".MSG_29." $username,\n\n".MSG_28." ".$_SESSION['xucp_free']['site_settings_site_name']."! ".MSG_30."\n\n".MSG_31."\n".MSG_32."".$_SESSION['xucp_free']['site_settings_site_name']."".MSG_33."";
        $headers = 'From: '.SITE_EMAIL.'' . "\r\n" .
                   'Reply-To: '.SITE_EMAIL.'' . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();
        
        mail($email, $subject, $message, $headers);
    }
    
    public function addUser(string $username, string $password, string $email): void {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $token = hash_hmac('sha256', rand().time(), 'xUCP');
        $sql = 'INSERT INTO xucp_accounts (username,email,password,token) VALUES (:xucp_username,:xucp_email,:xucp_password,:xucp_token)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['xucp_username' => $username, 'xucp_password' => $hashed_password, 'xucp_email' => $email, 'xucp_token' => $token]);
    }
    
    public function checkUsernameExists(string $username): bool {
        $sql = 'SELECT COUNT(*) AS count FROM xucp_accounts WHERE username = :xucp_username';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['xucp_username' => $username]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $result['count'] > 0;
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

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
    }
    
    public function login(string $username, string $password): bool {
        $sql = 'SELECT * FROM xucp_accounts WHERE username = :xucp_username';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['xucp_username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($password, $user['password'])) {
            if ($user['ban'] === 0) {
                $token = bin2hex(random_bytes(32));

                $updateTokenSql = 'UPDATE xucp_accounts SET token = :token WHERE id = :id';
                $updateTokenStmt = $this->pdo->prepare($updateTokenSql);
                $updateTokenStmt->execute(['token' => $token, 'id' => $user['id']]);

                $_SESSION['xucp_free'] = [
                    'secure_first' => $user["id"],
                    'secure_uname' => $user["username"],
                    'secure_uavatar' => $user["userava"],
                    'secure_granted' => "granted",
                    'secure_staff' => $user["adminlevel"],
                    'secure_lang' => $user["language"],
                    'secure_ban_status' => $user["ban"],
                    'secure_token' => $token,
                    'secure_key' => hash(SITE_LOGIN_SECURE_ALGO, SITE_LOGIN_SECURE_ALGO_ENCRYPT)
                ];
                return true;
            } else {
                session_unset();
                session_destroy();
                header("Location: /index");
                exit();
            }
        }
        return false;
    }
    
    
    public function isLoggedIn(): bool {
        if (isset($_SESSION['xucp_free']['secure_first']) && 
            $_SESSION['xucp_free']['secure_granted'] === 'granted' && 
            isset($_SESSION['xucp_free']['secure_token'])) {

            $userId = $_SESSION['xucp_free']['secure_first'];
            $token = $_SESSION['xucp_free']['secure_token'];
            $sql = 'SELECT COUNT(*) AS count FROM xucp_accounts WHERE id = :id AND token = :token';
            $stmt = $this->pdo->prepare($sql);
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
    
    public function deleteToken(int $userId): void {
        $sql = 'UPDATE xucp_accounts SET token = "" WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $userId]);
    }

    public function logout(): void {
        if (isset($_SESSION['xucp_free']['secure_first'])) {
            $this->deleteToken($_SESSION['xucp_free']['secure_first']);

            session_unset();
            session_destroy();
        }
    }
}