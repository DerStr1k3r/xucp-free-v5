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
// * License Typ: GNU GPLv3
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
// * E-Mail System
// ************************************************************************************//
define('SITE_EMAIL', getenv('SITE_EMAIL') ?: 'default_email');
// ************************************************************************************//
// * Site Login Secure System
// ************************************************************************************//
define('SITE_LOGIN_SECURE_ALGO', getenv('SITE_LOGIN_SECURE_ALGO') ?: 'default_algo');
define('SITE_LOGIN_SECURE_ALGO_ENCRYPT', getenv('SITE_LOGIN_SECURE_ALGO_ENCRYPT') ?: 'default_encrypt_algo');