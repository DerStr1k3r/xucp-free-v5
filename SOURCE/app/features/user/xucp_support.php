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
global $db;
include_once(dirname(__FILE__) . "/../../../app/system.php");

$user = new xUCP_User($db);
if (!$user->isLoggedIn()) {
    header('Location: /index');
    exit;
}

$user = new xUCP_Themes($db);
$user->xucp_header_logged(USER_SUPPORT);
$user->xucp_content_logged();

if(isset($_REQUEST['xucp_submit']))
{
    $username = strip_tags($_REQUEST['xucp_username']);
    $msg 	= strip_tags($_REQUEST['xucp_msg']);
    $bug 	= strip_tags($_REQUEST['xucp_bug']);

    if(empty($username)){
        $errorMsg[]=MSG_10;
    }
    else
    {
        if (empty($msg)) {
            $errorMsg[] = MSG_10;
        } else {
            if (empty($bug)) {
                $errorMsg[] = MSG_10;
            } else {
                try {
                    if (!isset($errorMsg)) {
                        $insert_stmt = $db->prepare("INSERT INTO `xucp_support` (username,msg,bug) VALUES
																(:xucp_username,:xucp_msg,:xucp_bug)");

                        if ($insert_stmt->execute(array(':xucp_username' => $username,
                            ':xucp_msg' => $msg,
                            ':xucp_bug' => $bug))) {

                            $doneMsg = SUPPORTADDDONE;
                            
                            // Erstellen einer Instanz der DiscordWebhook-Klasse
                            $webhook = new xUCP_Discord(DC_WEBHOOK_URL);
                            
                            // Festlegen von benutzerdefinierten Werten wie Benutzername, Avatar-URL, Autor und Fußzeile
                            $webhook->setUsername(DC_WEBHOOK_NAME);
                            $webhook->setAvatarUrl(DC_WEBHOOK_AVATAR);
                            $webhook->setAuthor(DC_WEBHOOK_NAME);
                            $webhook->setFooter('Powered by xUCP Free v5.1.1429');
                            
                            // Definieren des Inhalts, den du senden möchtest
                            $content = DC_WEBHOOK_INFO_SUPPORT_TICKET_ADDED . " " . $msg;
                            
                            // Senden des Inhalts an Discord
                            $response = $webhook->send($content);
                            
                            // Ausgabe der Antwort von Discord (optional)
                            echo $response;
                            header("refresh:2; /vendor/backend/user/support/index");
                        }
                    }
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }
        }
    }
}

if(isset($errorMsg))
{
    foreach($errorMsg as $error)
    {
        echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card xucp-card'>
									<div class='card-header'>
										<h4 class='card-title'>".USER_SUPPORT."</h4>
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
    echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card xucp-card'>
									<div class='card-header'>
										<h4 class='card-title'>".USER_SUPPORT."</h4>
									</div>
									<div class='card-body'>
										".$doneMsg."
									</div>
								</div>
							</div>
						</div>";
}
$user = new xUCP_Themes($db);
$user->xucp_footer_none_logged();
