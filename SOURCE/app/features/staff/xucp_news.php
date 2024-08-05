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

$user = new xUCP_Themes($db);
$user->xucp_header_logged(NEWS_HEADER);
$user->xucp_content_logged();

$user = new xUCP_Secure($db);
$user->staff_check_rank();

if(isset($_REQUEST['xucp_submit']))
{
    $title_config_uid 	= 1;
    $title = strip_tags($_REQUEST['xucp_title']);
    $title_de 	= strip_tags($_REQUEST['xucp_title_de']);
    $title_content 	= strip_tags($_REQUEST['xucp_content']);
    $title_content_de 	= strip_tags($_REQUEST['xucp_content_de']);

    $errorMsg = [];

    if(empty($title)){
        $errorMsg[]=MSG_19;
    }
    else if(empty($title_de)){
        $errorMsg[]=MSG_19;
    }
    else if(empty($title_content)){
        $errorMsg[]=MSG_20;
    }
    else {
        if (empty($title_content_de)) {
            $errorMsg[] = MSG_20;
        } else {
            try {
                $insert_stmt = $db->prepare("UPDATE `xucp_news` SET `title` = :xucp_title, `title_de` = :xucp_title_de, `content` = :xucp_content, `content_de` = :xucp_content_de WHERE `id` = :title_config_uid");

                if ($insert_stmt->execute(array(':xucp_title' => $title,
                                                ':xucp_title_de' => $title_de,
                                                ':xucp_content' => $title_content,
                                                ':xucp_content_de' => $title_content_de,
                                                ':title_config_uid' => $title_config_uid))) {

                    $doneMsg = MSG_21;

                    header("refresh:2;url=/vendor/backend/staff/news/index");
                    exit; // Beende das Skript nach dem Weiterleiten
                } else {
                    $errorMsg[] = "Fehler beim Ausführen der Abfrage.";
                }
            } catch (PDOException $e) {
                $errorMsg[] = $e->getMessage();
            }
        }
    }
}

if(isset($errorMsg))
{
    foreach($errorMsg as $error)
    {
        echo "
            <div class='row'>
                <div class='col-xl-12'>
                    <div class='card xucp-card'>
                        <div class='card-header'>
                            <h4 class='card-title'>".NEWS_HEADER."</h4>
                        </div>
                        <div class='card-body'>
                            ".$error."
                        </div>
                    </div>
                </div>
            </div>";
    }
}
if(isset($doneMsg))
{
    echo "
        <div class='row'>
            <div class='col-xl-12'>
                <div class='card xucp-card'>
                    <div class='card-header'>
                        <h4 class='card-title'>".NEWS_HEADER."</h4>
                    </div>
                    <div class='card-body'>
                        ".$doneMsg."
                    </div>
                </div>
            </div>
        </div>";
}