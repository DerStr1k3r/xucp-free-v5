<?php
// ************************************************************************************//
// * xUCP Free
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 5.0
// *
// * Copyright (c) 2024 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
if ($_SERVER['REQUEST_METHOD'] === 'GET' && realpath(__FILE__) === realpath($_SERVER['SCRIPT_FILENAME'])) {
    // Setze den HTTP-Statuscode auf 403 Forbidden
    http_response_code(403);
    
    // Lösche das Session-Cookie und beende die Session
    setcookie("PHPSESSID", "", time() - 3600, "/");
    session_unset();
    session_destroy();
    
    // Leite den Benutzer zur 404-Seite weiter
    header('location: /vendor/frontend/404/index');
    exit;
}
// ************************************************************************************//
// * E-Mail System
// ************************************************************************************//
const SITE_EMAIL = "noreplay@xxx.com";
// ************************************************************************************//
// * Site Login Secure System
// ************************************************************************************//
// SHA-512 Cryptographic Hash Algorithm
const SITE_LOGIN_SECURE_ALGO = "sha512";
// Your keywords
const SITE_LOGIN_SECURE_ALGO_ENCRYPT = "xUCP Pro V5";