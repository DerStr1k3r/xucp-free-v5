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
// * License Type: GNU GPLv3
// ************************************************************************************//
include_once(dirname(__FILE__) . "/../../../app/system.php");

$hostUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
// OAuth2-Konfigurationsdaten für Discord
$clientId = DC_CLIENT_ID;
$clientSecret = DC_CLIENT_SECRET;
$redirectUri = $hostUrl . "/app/features/user/xucp_signin_callback"; // Korrekte Redirect-URI hier eintragen

if (isset($_GET['code'])) {
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
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data),
        ],
    ];
    $context = stream_context_create($options);
    $response = file_get_contents($tokenUrl, false, $context);
    $tokenData = json_decode($response, true);

    if (isset($tokenData['access_token'])) {
        $accessToken = $tokenData['access_token'];

        $userUrl = "https://discord.com/api/users/@me";
        $options = [
            'http' => [
                'header' => "Authorization: Bearer $accessToken\r\n",
            ],
        ];
        $context = stream_context_create($options);
        $userInfo = file_get_contents($userUrl, false, $context);
        $user = json_decode($userInfo, true);

        if ($user) {
            $dbUser = new xUCP_User($db);
            $dbUser->processDiscordUser($user);

            $webhook = new xUCP_Discord(DC_WEBHOOK_URL);

            $webhook->setUsername(DC_WEBHOOK_NAME);
            $webhook->setAvatarUrl(DC_WEBHOOK_AVATAR);
            $webhook->setAuthor(DC_WEBHOOK_NAME);
            $webhook->setFooter('Powered by xUCP Free v5.1.1456');

            $content = DC_WEBHOOK_INFO_LOGIN_1 . " " . $username . " " . DC_WEBHOOK_INFO_LOGIN_2;

            $response = $webhook->send($content);

            echo $response;
            header("Location: /vendor/backend/user/dashboard/index");
            exit();
        } else {
            echo "Failed to get user info from Discord.";
        }
    } else {
        echo "Failed to get access token from Discord.";
    }
} else {
    echo "Authorization code not found.";
}