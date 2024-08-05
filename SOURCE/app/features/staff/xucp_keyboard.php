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
include_once(dirname(__FILE__) . "/../../../app/system.php");

$user = new xUCP_User($db);
if (!$user->isLoggedIn()) {
    header('Location: /index');
    exit;
}

// Initialisierung der Benutzerobjekte
$user = new xUCP_Themes($db);
$user->xucp_header_logged(KEY_HEADER);
$user->xucp_content_logged();

$user = new xUCP_Secure($db);
$user->staff_check_rank();

if (isset($_REQUEST['xucp_submit'])) {
    $key_config_uid = 1;
    $keys = [];
    for ($i = 1; $i <= 19; $i++) {
        $keys["key$i"] = strip_tags($_REQUEST["xucp_key$i"] ?? '');
    }
    
    $errorMsg = [];
    foreach ($keys as $key => $value) {
        if (empty($value)) {
            $errorMsg[] = KEYNOTE;
            break;
        }
    }
    
    if (empty($errorMsg)) {
        try {
            $sql = "UPDATE `xucp_keys` SET ";
            $sql .= implode(", ", array_map(fn($k) => "`$k` = :$k", array_keys($keys)));
            $sql .= " WHERE `id` = :key_config_uid";
            
            $keys['key_config_uid'] = $key_config_uid;
            $insert_stmt = $db->prepare($sql);
            
            if ($insert_stmt->execute($keys)) {
                $doneMsg = KEY_DONE;
                header("refresh:2; /vendor/backend/staff/keyboard/index");
                exit;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

if (isset($errorMsg)) {
    foreach ($errorMsg as $error) {
        echo "
        <div class='row'>
            <div class='col-xl-12'>
                <div class='card xucp-card'>
                    <div class='card-header'>
                        <h4 class='card-title'>" . KEY_HEADER . "</h4>
                    </div>
                    <div class='card-body'>
                        " . htmlspecialchars($error) . "
                    </div>
                </div>
            </div>
        </div>";
    }
}

if (isset($doneMsg)) {
    echo "
    <div class='row'>
        <div class='col-xl-12'>
            <div class='card xucp-card'>
                <div class='card-header'>
                    <h4 class='card-title'>" . KEY_HEADER . "</h4>
                </div>
                <div class='card-body'>
                    " . htmlspecialchars($doneMsg) . "
                </div>
            </div>
        </div>
    </div>";
}