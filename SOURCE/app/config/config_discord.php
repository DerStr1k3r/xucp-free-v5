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
// * Discord Web-Hook Settings
// ************************************************************************************//
const DC_WEBHOOK_URL = "https://discord.com/api/webhooks/.....";

// ************************************************************************************//
// * Discord Web-Hook Avatar Settings
// ************************************************************************************//
const DC_WEBHOOK_AVATAR = "https://.......";

// ************************************************************************************//
// * Discord Web-Hook Botname Settings
// ************************************************************************************//
const DC_WEBHOOK_NAME = "DerStr1k3r.com | xUCP Pro V5";
