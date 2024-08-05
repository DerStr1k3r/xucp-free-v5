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
include_once(dirname(__FILE__) . "/../../../../app/system.php");

// Sicherstellen, dass die erforderlichen Konstanten und Klassen definiert sind
if (!defined('KEY_HEADER') || !defined('KEY_DONE') || !defined('KEYNOTE') || !defined('KEY_DONE_BTN')) {
    exit('Konstanten sind nicht definiert');
}

if (!class_exists('xUCP_User') || !class_exists('xUCP_Themes') || !class_exists('xUCP_Secure')) {
    exit('Klassen sind nicht definiert');
}

$user = new xUCP_User($db);
if (!$user->isLoggedIn()) {
    header('Location: /index');
    exit;
}

$userThemes = new xUCP_Themes($db);
$userThemes->xucp_header_logged(KEY_HEADER);
$userThemes->xucp_content_logged();

$userSecure = new xUCP_Secure($db);
$userSecure->staff_check_rank();

echo "
<div class='row'>
    <div class='col-lg-12'>
        <div class='card xucp-card'>
            <div class='card-header'>
                <h4 class='mb-0'>" . htmlspecialchars(KEY_HEADER) . "</h4>
                <p class='card-title-desc'>" . htmlspecialchars(KEYNOTE) . "</p>
            </div>
            <div class='card-body'>";

try {
    $select_stmt = $db->prepare("SELECT key1, key2, key3, key4, key5, key6, key7, key8, key9, key10, key11, key12, key13, key14, key15, key16, key17, key18, key19 FROM xucp_keys WHERE id = 1");
    $select_stmt->execute();
    $key_set = $select_stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($key_set) {
        echo "<form action='/app/features/staff/xucp_keyboard.php' method='post' enctype='multipart/form-data'>";
        
        for ($i = 1; $i <= 19; $i++) {
            $key = "key$i";
            echo "
            <div class='form-group'>
                <label class='col-sm-3 col-form-label'>" . constant("KEY$i") . "</label>
                <div class='col-sm-12'>
                    <div class='input-group'>
                        <input type='text' name='xucp_key$i' size='50' maxlength='256' class='form-control' value='" . htmlspecialchars($key_set[$key]) . "' required>
                    </div>
                </div>
            </div>";
        }
        
        echo "<br />
        <button type='submit' name='xucp_submit' class='btn btn-primary w-100 waves-effect waves-light'>
            <i class='dripicons-checkmark'></i>&nbsp;" . htmlspecialchars(KEY_DONE_BTN) . "
        </button>
        </form>";
    } else {
        echo "<p>Keine Daten gefunden.</p>";
    }
} catch (PDOException $e) {
    echo "<p>Fehler: " . htmlspecialchars($e->getMessage()) . "</p>";
}

echo "
            </div>
        </div>
    </div>
</div>";

$userThemes->xucp_footer_logged();