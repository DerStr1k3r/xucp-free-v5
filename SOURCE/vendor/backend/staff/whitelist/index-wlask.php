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
include_once(dirname(__FILE__) . "/../../../../app/system.php");

$user = new xUCP_User($db);
if (!$user->isLoggedIn()) {
    header('Location: /index');
    exit;
}

$user = new xUCP_Themes($db);
$user->xucp_header_logged(FRAGE_HEADER);
$user->xucp_content_logged();

xUCP_Secure::staff_check_rank();

$xucpProcessor = new xUCP_Whitelist_Question_Updater($db);
$xucpProcessor->processRequest();

echo "
    <div class='row'>
        <div class='col-xl-12'>
            <div class='card xucp-card'>
                <div class='card-header'>
                    <h4 class='card-title'>" . FRAGE_HEADER . "</h4>
                    <p class='card-title-desc'>" . FRAGENOTE . "</p>
                </div>
                <div class='card-body'>";

$select_stmt = $db->prepare("SELECT frage1, frage2, frage3, frage4, frage5, frage6, frage7, frage8, frage9, frage10, frage11, frage12 FROM xucp_config WHERE id = 1");
$select_stmt->execute();
$conf_set = $select_stmt->fetch(PDO::FETCH_ASSOC);

if ($select_stmt->rowCount() > 0) {
    echo "
    <form action='" . $_SERVER['PHP_SELF'] . "' method='post' enctype='multipart/form-data'>";

    for ($i = 1; $i <= 12; $i++) {
        $frage = constant('FRAGE' . $i);
        $value = $conf_set['frage' . $i];
        echo "
        <div class='form-group'>
            <label class='col-sm-3 col-form-label'>" . $frage . "</label>
            <div class='col-sm-12'>
                <div class='input-group'>
                    <input type='text' name='xucp_key" . $i . "' size='50' maxlength='256' class='form-control' value='" . $value . "' required>
                </div>
            </div>
        </div>";
    }

    echo "
    <br>
    <button type='submit' name='xucp_submit' class='btn btn-primary w-100 waves-effect waves-light'>" . FRAGEDONEBTN . "</button>
    </form>";
}

echo "
                </div>
            </div>
        </div>
    </div>";

$user = new xUCP_Themes($db);
$user->xucp_footer_logged();