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

// Sicherheitsheader setzen
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
// * MySQL Database Connection
// ************************************************************************************//
// Access to environment variables (either via server config or fallback to default values)
$db_host = getenv('DB_HOST') ?: 'localhost';
$db_port = getenv('DB_PORT') ?: '3306';
$db_user = getenv('DB_USER') ?: 'root';
$db_password = getenv('DB_PASSWORD') ?: '';
$db_name = getenv('DB_NAME') ?: 'test';
$db_charset = 'utf8mb4';

// ************************************************************************************//
// * MySQL Account Data Connect
// ************************************************************************************//
$options = [
    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES   => false,
];

$dsn = "mysql:host=$db_host;dbname=$db_name;charset=$db_charset;port=$db_port";
try {
    $db = new \PDO($dsn, $db_user, $db_password, $options);
} catch (\PDOException $e) {
    // Logging the error and user-friendly reporting
    error_log($e->getMessage(), 3, __DIR__ . '/logs/db_errors.log'); // Write errors to a log file
    http_response_code(500); // Internal Server Error
    echo "An error has occurred. Please try again later.";
    exit;
}