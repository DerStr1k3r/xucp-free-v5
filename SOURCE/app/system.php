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
// * Session starting
// ************************************************************************************//
global $db;
ob_start();
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start([
        'cookie_lifetime' => 0,
        'cookie_httponly' => true,
        'use_strict_mode' => true,
        'use_only_cookies' => true,
        'cookie_secure' => isset($_SERVER['HTTPS']),
    ]);
}

// ************************************************************************************//
// * ENV Config File Loader
// ************************************************************************************//
function loadEnvFile($filePath) {
    // Converts the path to an absolute path
    $filePath = realpath($filePath); 

    if ($filePath === false) {
        throw new Exception('.env file not found at ' . $filePath);
    }

    if (!file_exists($filePath)) {
        throw new Exception('.env file not found at ' . $filePath);
    }

    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue; // Ignore comments
        }

        list($name, $value) = explode('=', $line, 2);
        putenv(trim($name) . '=' . trim($value));
    }
}

// ************************************************************************************//
// * Example of calling with absolute path
// ************************************************************************************//
try {
    loadEnvFile(dirname(__FILE__) . '/../.env');
} catch (Exception $e) {
    echo 'Error loading .env file: ' . $e->getMessage();
    exit;
}

// ************************************************************************************//
// * Config files
// ************************************************************************************//
require_once(dirname(__FILE__) . "/config/config_mysql.php");
require_once(dirname(__FILE__) . "/config/config_settings.php");
require_once(dirname(__FILE__) . "/config/config_class.php");
require_once(dirname(__FILE__) . "/config/config_discord.php");

// ************************************************************************************//
// Class files from this xucp
// ************************************************************************************//
require_once(dirname(__FILE__) . "/class/xucp_class_discord.php");
require_once(dirname(__FILE__) . "/class/xucp_class_discord_bbcode_converter.php");
require_once(dirname(__FILE__) . "/class/xucp_class_user.php");
require_once(dirname(__FILE__) . "/class/xucp_class_csrf.php");
require_once(dirname(__FILE__) . "/class/xucp_class_system.php");
require_once(dirname(__FILE__) . "/class/xucp_class_themes.php");
require_once(dirname(__FILE__) . "/class/xucp_class_secure.php");
require_once(dirname(__FILE__) . "/class/xucp_class_bbcode_parser.php");
require_once(dirname(__FILE__) . "/class/xucp_class_bbcode_editor.php");
require_once(dirname(__FILE__) . "/class/xucp_setup_check.php");
require_once(dirname(__FILE__) . "/class/xucp_class_updater.php");
require_once(dirname(__FILE__) . "/class/xucp_class_site_config.php");
require_once(dirname(__FILE__) . "/class/xucp_class_wl_quest_updater.php");
require_once(dirname(__FILE__) . "/class/xucp_class_my_whitelist.php");
require_once(dirname(__FILE__) . "/class/xucp_class_user_profile_updater.php");
// ************************************************************************************//
// Autoload System
// ************************************************************************************//
$user = new xUCP_System($db);
$user->xucp_secure_lang();
$user->xucp_session_site();

// ************************************************************************************//
// Logout System
// ************************************************************************************//
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    try {
        $user = new xUCP_User($db);
        $user->logout();

        // HTTP-Redirect für mehr Sicherheit
        header('Location: /index', true, 302);
        exit;
    } catch (Throwable $e) {
        error_log('Error during logout: ' . $e->getMessage());
        echo 'An error occurred while logging out. Please try again.';
    }
}