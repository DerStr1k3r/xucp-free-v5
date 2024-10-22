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
include_once(dirname(__FILE__) . "/../../../../app/system.php");

$user = new xUCP_User($db);
if (!$user->isLoggedIn()) {
    header('Location: /index');
    exit;
}

$user = new xUCP_Themes($db);
$user->xucp_header_logged(WHITELIST_HEADER);
$user->xucp_content_logged();

$user = new xUCP_Secure($db);
$user->staff_check();

$select_stmt = $db->prepare("SELECT frage1, frage2, frage3, frage4, frage5, frage6, frage7, frage8, frage9, frage10, frage11, frage12 FROM xucp_config WHERE id = 1");
$select_stmt->execute();
$conf_set = $select_stmt->fetch(PDO::FETCH_ASSOC);

if ($select_stmt->rowCount() > 0) {
    echo "<div class='row'>
            <div class='col-lg-12'>
                <div class='card xucp-card'>
                    <div class='card-body'>";

    $fragen = [
        "".FRAGE1."" => "frage1",
        "".FRAGE2."" => "frage2",
        "".FRAGE3."" => "frage3",
        "".FRAGE4."" => "frage4",
        "".FRAGE5."" => "frage5",
        "".FRAGE6."" => "frage6",
        "".FRAGE7."" => "frage7",
        "".FRAGE8."" => "frage8",
        "".FRAGE9."" => "frage9",
        "".FRAGE10."" => "frage10",
        "".FRAGE11."" => "frage11",
        "".FRAGE12."" => "frage12"
    ];

    foreach ($fragen as $label => $frage) {
        echo "<div class='form-group'>
                <div class='card-title'>$label</div>
                <label class='col-sm-12 col-form-label'>" . htmlentities($conf_set[$frage], ENT_QUOTES, 'UTF-8') . "</label>
              </div>";
    }

    echo "</div></div></div>";
}

$user = new xUCP_Themes($db);
$user->xucp_footer_logged();