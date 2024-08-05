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
$user->xucp_header_logged(IMPRINT_MANAGER_HEADER);
$user->xucp_content_logged();

$user = new xUCP_Secure($db);
$user->staff_check_rank();

if(isset($_REQUEST['xucp_submit']))
{
    $site_config_uid 	= 1;
    $name = strip_tags($_POST['xucp_name']);
    $address = strip_tags($_POST['xucp_address']);
    $phone_number = strip_tags($_POST['xucp_phone_number']);
    $data_protection = strip_tags($_POST['xucp_data_protection']);
    $liability_for_content = strip_tags($_POST['xucp_liability_for_content']);
    $liability_for_links = strip_tags($_POST['xucp_liability_for_links']);
    $copyright = strip_tags($_POST['xucp_copyright']);

    if(empty($name)){
        $errorMsg[]=IMPRINT_NOT_DONE;
    }
    else {
        if (empty($address)) {
            $errorMsg[] = IMPRINT_NOT_DONE;
        } else {
            try {
                if (!isset($errorMsg)) {
                    $insert_stmt = $db->prepare("UPDATE `xucp_imprint` SET `name` = :xucp_name, `address` = :xucp_address, `phone_number` = :xucp_phone_number, `data_protection` = :xucp_data_protection, `liability_for_content` = :xucp_liability_for_content, `liability_for_links` = :xucp_liability_for_links, `copyright` = :xucp_copyright WHERE `id` = " . $site_config_uid);

                    if ($insert_stmt->execute(array(':xucp_name' => $name,
                        ':xucp_address' => $address,
                        ':xucp_phone_number' => $phone_number,
                        ':xucp_data_protection' => $data_protection,
                        ':xucp_liability_for_content' => $liability_for_content,
                        ':xucp_liability_for_links' => $liability_for_links,
                        ':xucp_copyright' => $copyright))) {

                        $doneMsg = IMPRINT_DONE;
                        header("refresh:2; /vendor/backend/staff/imprint/index");
                    }
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
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
										<h4 class='card-title'>".IMPRINT_MANAGER_HEADER."</h4>
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
										<h4 class='card-title'>".IMPRINT_MANAGER_HEADER."</h4>
									</div>
									<div class='card-body'>
										".$doneMsg."
									</div>
								</div>
							</div>
						</div>";
}