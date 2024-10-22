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
// * Class: Supporter ( default = 20 )
// ************************************************************************************//
const UC_CLASS_SUPPORTER = "20";
// ************************************************************************************//
// * Class: Supporter Leader ( default = 50 )
// ************************************************************************************//
const UC_CLASS_SUPPORTER_LEADER = "50";
// ************************************************************************************//
// * Class: Supporter ( default = 120 )
// ************************************************************************************//
const UC_CLASS_PROJECT_MANAGEMENT = "120";