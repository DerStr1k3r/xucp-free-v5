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
// * License Type: GNU GPLv3
// ************************************************************************************//
// * Session starting
// ************************************************************************************//
global $db;
ob_start();
session_start();

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
if (isset($_POST['logout'])) {
    $user = new xUCP_User($db);
    $user->logout();
    header("refresh:1; /index");
    exit();
}