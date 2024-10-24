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
include_once(dirname(__FILE__) . "/../../../app/system.php");

$user = new xUCP_User($db);
if (!$user->isLoggedIn()) {
    header('Location: /index');
    exit;
}

$user = new xUCP_Themes($db);
$user->xucp_header_logged(DC_WEBHOOK_HEADER);
$user->xucp_content_logged();

$user = new xUCP_Secure($db);
$user->staff_check_rank();

if(isset($_REQUEST['xucp_submit']))
{
    $msg = strip_tags($_POST['xucp_msg']);

    if(empty($msg)){
        $errorMsg[]=DC_WEBHOOK_ENTRY_NOT_WORK;
    }
    else
    {
        try
        {
            if(!isset($errorMsg))
            {
                $doneMsg=DC_WEBHOOK_ENTRY_WORKING;
                // Erstellen einer Instanz der DiscordWebhook-Klasse
                $webhook = new xUCP_Discord(DC_WEBHOOK_URL);
                
                // Festlegen von benutzerdefinierten Werten wie Benutzername, Avatar-URL, Autor und Fußzeile
                $webhook->setUsername(DC_WEBHOOK_NAME);
                $webhook->setAvatarUrl(DC_WEBHOOK_AVATAR);
                $webhook->setAuthor(DC_WEBHOOK_NAME);
                $webhook->setFooter('Powered by xUCP Free v5.1.1431');
                
                // Definieren des Inhalts, den du senden möchtest
                $content = $msg;
                
                // Senden des Inhalts an Discord
                $response = $webhook->send($content);
                
                // Ausgabe der Antwort von Discord (optional)
                echo $response;
                header("refresh:2; /vendor/backend/staff/dcmsg/index");
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
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
										<h4 class='card-title'>".DC_WEBHOOK_HEADER."</h4>
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
										<h4 class='card-title'>".DC_WEBHOOK_HEADER."</h4>
									</div>
									<div class='card-body'>
										".$doneMsg."
									</div>
								</div>
							</div>
						</div>";
}