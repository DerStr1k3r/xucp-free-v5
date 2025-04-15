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
$user->xucp_header_logged(UPTIME_CONFIG_SYSTEM_HEADER);
$user->xucp_content_logged();

xUCP_Secure::staff_check_rank();

if (isset($_GET["uptimeconfig"])) $uptimeconfig = trim(htmlentities($_GET["uptimeconfig"]));
elseif (isset($_POST["uptimeconfig"])) $uptimeconfig = trim(htmlentities($_POST["uptimeconfig"]));
else $uptimeconfig = "view";

$limit = 10;
if (isset($_GET["site"])) {
	$site  = $_GET["site"];
}else{
	$site=1;
};
$start_from = ($site-1) * $limit;

if(isset($_REQUEST['xucp_submit']))
{
    $uptime_config_uid 	= 1;
    $uptime_homepage = strip_tags($_REQUEST['xucp_uptime_homepage']);
    $uptime_mail 	= strip_tags($_REQUEST['xucp_uptime_mail']);
    $uptime_teamspeak 	= strip_tags($_REQUEST['xucp_uptime_teamspeak']);
    $uptime_teamspeak_port 	= strip_tags($_REQUEST['xucp_uptime_teamspeak_port']);

    if(empty($uptime_homepage)){
        $errorMsg[]=UPTIME_CONFIG_ERROR;
    }
    else if(empty($uptime_mail)){
        $errorMsg[]=UPTIME_CONFIG_ERROR;
    }
    else if(empty($uptime_teamspeak)){
        $errorMsg[]=UPTIME_CONFIG_ERROR;
    }
    else {
        if (empty($uptime_teamspeak_port)) {
            $errorMsg[] = UPTIME_CONFIG_ERROR;
        } else {
            try {
                if (!isset($errorMsg)) {
                    $insert_stmt = $db->prepare("UPDATE `xucp_uptime` SET `uptime_homepage` = :xucp_uptime_homepage, `uptime_mail` = :xucp_uptime_mail, `uptime_teamspeak` = :xucp_uptime_teamspeak, `uptime_teamspeak_port` = :xucp_uptime_teamspeak_port WHERE `id` = " . $uptime_config_uid);

                    if ($insert_stmt->execute(array(':xucp_uptime_homepage' => $uptime_homepage,
                        ':xucp_uptime_mail' => $uptime_mail,
                        ':xucp_uptime_teamspeak' => $uptime_teamspeak,
                        ':xucp_uptime_teamspeak_port' => $uptime_teamspeak_port))) {

                        $doneMsg = UPTIME_CONFIG_DONE;
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
										<h4 class='card-title'>".UPTIME_CONFIG_SYSTEM_HEADER."</h4>
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
										<h4 class='card-title'>".UPTIME_CONFIG_SYSTEM_HEADER."</h4>
									</div>
									<div class='card-body'>
										".$doneMsg."
									</div>
								</div>
							</div>
						</div>";
}
echo "
					<div class='row'>
						<div class='col-lg-12'>
							<div class='card xucp-card'>
								<div class='card-body'>";

                    $uptime_uid = 1;
                    $select_stmt = $db->prepare("SELECT * FROM xucp_uptime WHERE `id` = ".$uptime_uid);
                    $select_stmt->execute();
                    $uptime_status=$select_stmt->fetch(PDO::FETCH_ASSOC);

                    if($select_stmt->rowCount() > 0){
					    echo "
						<form class='form-horizontal' method='post' action='".$_SERVER['PHP_SELF']."' enctype='multipart/form-data'>
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='email_address_2'>".UPTIME_CONFIG_HOMEPAGE."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<input type='text' name='xucp_uptime_homepage' size='22' maxlength='64' class='form-control' placeholder='".UPTIME_CONFIG_HOMEPAGE."' value='" . $uptime_status["uptime_homepage"]. "' required>
										</div>									
									</div>
								</div>
							</div>
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='email_address_2'>".UPTIME_CONFIG_MAIL."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<input type='text' name='xucp_uptime_mail' size='22' maxlength='64' class='form-control' placeholder='".UPTIME_CONFIG_MAIL."' value='" . $uptime_status["uptime_mail"]. "' required>
										</div>
									</div>
								</div>
							</div>							
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='password_2'>".UPTIME_CONFIG_TEAMSPEAK."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<input type='text' name='xucp_uptime_teamspeak' size='22' maxlength='64' class='form-control' placeholder='".UPTIME_CONFIG_TEAMSPEAK."' value='" . $uptime_status["uptime_teamspeak"]. "' required>
										</div>
									</div>
								</div>
							</div>
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='password_2'>".UPTIME_CONFIG_TEAMSPEAK." Port</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<input type='text' name='xucp_uptime_teamspeak_port' size='22' maxlength='64' class='form-control' placeholder='".UPTIME_CONFIG_TEAMSPEAK." Port' value='" . $uptime_status["uptime_teamspeak_port"]. "' required>
										</div>
									</div>
								</div>
							</div><br />							
							<div class='row clearfix'>
								<div class='col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5'>
									<button type='submit' class='btn btn-primary w-100 waves-effect waves-light' name='xucp_submit'>".UPTIME_CONFIG_BNT."</button>
								</div>
							</div>
						</form>";
				    }

echo "		  			
                                </div>
                            </div>
                        </div>
                    </div>";
$user = new xUCP_Themes($db);
$user->xucp_footer_logged();