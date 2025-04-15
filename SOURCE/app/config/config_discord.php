<?php
// ************************************************************************************//
// * xUCP Free
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 5.2
// *
// * Copyright (c) 2024 - 2025 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Type: GNU GPLv3
// ************************************************************************************//
header('X-Frame-Options: DENY'); // Verhindert Clickjacking
header('X-Content-Type-Options: nosniff'); // Verhindert MIME-Type Sniffing

// Blockiere direkte GET-Anfragen an dieses Skript
if ($_SERVER['REQUEST_METHOD'] === 'GET' && realpath(__FILE__) === realpath($_SERVER['SCRIPT_FILENAME'])) {
    // Setze den HTTP-Statuscode auf 403 Forbidden
    http_response_code(403);
    
    // Lösche das Session-Cookie und beende die Session
    if (isset($_COOKIE['PHPSESSID'])) {
        setcookie("PHPSESSID", "", time() - 3600, "/");
    }
    session_start(); // Session sollte gestartet sein, bevor sie zerstört wird
    session_unset();
    session_destroy();
    
    // Leite den Benutzer zur 404-Seite weiter
    header('location: /vendor/frontend/404/index');
    exit;
}
// ************************************************************************************//
// * Discord Web-Hook Settings
// ************************************************************************************//
define('DC_WEBHOOK_URL', getenv('DC_WEBHOOK_URL') ?: 'default_webhook_url');

// ************************************************************************************//
// * Discord Web-Hook Avatar Settings
// ************************************************************************************//
define('DC_WEBHOOK_AVATAR', getenv('DC_WEBHOOK_AVATAR') ?: 'default_avatar_url');

// ************************************************************************************//
// * Discord Web-Hook Botname Settings
// ************************************************************************************//
define('DC_WEBHOOK_NAME', getenv('DC_WEBHOOK_NAME') ?: 'default_webhook_name');

// ************************************************************************************//
// * Discord Client-ID Settings
// ************************************************************************************//
define('DC_CLIENT_ID', getenv('DC_CLIENT_ID') ?: 'default_dc_client_id');

// ************************************************************************************//
// * Discord Client-Secret Settings
// ************************************************************************************//
define('DC_CLIENT_SECRET', getenv('DC_CLIENT_SECRET') ?: 'default_dc_client_secret');