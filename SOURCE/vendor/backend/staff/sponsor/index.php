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
$user->xucp_header_logged(SPONSOR_SYSTEM_HEADER);
$user->xucp_content_logged();

$user = new xUCP_Secure($db);
$user->staff_check_rank();

if(isset($_REQUEST['xucp_submit']))
{
    $sponsor_name = strip_tags($_REQUEST['xucp_sponsor_name']);
    $sponsor_url 	= strip_tags($_REQUEST['xucp_sponsor_url']);
    $sponsor_image 	= strip_tags($_REQUEST['xucp_sponsor_image']);
    $sponsor_text 	= strip_tags($_REQUEST['xucp_sponsor_text']);

    if(empty($sponsor_name)){
        $errorMsg[]=SPONSOR_NOT_WORK;
    }
    else if(empty($sponsor_url)){
        $errorMsg[]=SPONSOR_NOT_WORK;
    }
    else if(empty($sponsor_image)){
        $errorMsg[]=SPONSOR_NOT_WORK;
    }
    else {
        if (empty($sponsor_text)) {
            $errorMsg[] = SPONSOR_NOT_WORK;
        } else {
            try {
                if (!isset($errorMsg)) {
                    $insert_stmt = $db->prepare("INSERT INTO xucp_sponsors (sponsor_name, sponsor_url, sponsor_image, sponsor_text) VALUES
																(:xucp_sponsor_name,:xucp_sponsor_url,:xucp_sponsor_image,:xucp_sponsor_text)");

                    if ($insert_stmt->execute(array(':xucp_sponsor_name' => $sponsor_name,
                        ':xucp_sponsor_url' => $sponsor_url,
                        ':xucp_sponsor_image' => $sponsor_image,
                        ':xucp_sponsor_text' => $sponsor_text))) {

                        $doneMsg = SPONSOR_DONE;
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
										<h4 class='card-title'>".SPONSOR_SYSTEM_HEADER."</h4>
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
										<h4 class='card-title'>".SPONSOR_SYSTEM_HEADER."</h4>
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
                        <div class='col-xl-12'>
                            <div class='card xucp-card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>".SPONSOR_SYSTEM_HEADER."</h4>
                                </div>
                                <div class='card-body'>
									<form action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data'>
										<tr>				  
											<td>
												<h6>
													".SPONSOR_NAME."
												</h6>
												<div class='input-group'>
													<input type='text' name='xucp_sponsor_name' size='50' maxlength='100' class='form-control' required>
												</div>	
											</td>
										</tr>
										<tr>				  
											<td>
												<h6>
													".SPONSOR_URL."
												</h6>
												<div class='input-group'>
													<input type='text' name='xucp_sponsor_url' size='50' maxlength='100' class='form-control' required>
												</div>	
											</td>
										</tr>
										<tr>					  
											<td>
												<h6>
													".SPONSOR_IMAGE."
												</h6>
												<div class='input-group'>
													<input type='text' name='xucp_sponsor_image' size='50' maxlength='100' class='form-control' required>
												</div>	
											</td>						
										</tr>
										<tr>					  
											<td>
												<h6>
													".SPONSOR_TEXT."
												</h6>
												<div class='input-group'>";
                                                        $bbcodeEditor = new xUCP_BBCode_Editor();
                                                        echo $bbcodeEditor->xucp_text_bbcode('xucp_sponsor_text', htmlspecialchars(stripslashes($_POST["sponsor_text"])));
echo "
												</div>	
											</td>						
										</tr>										
										<tr>					  
											<td>
												<br>
												<button type='submit' name='xucp_submit' class='btn btn-primary btn-round'>
													".SPONSOR_SUBMIT."
												</button>
												</submit>
											</td>							
										</tr>						
									</form>					
                                </div>
                            </div>
                        </div>
                    </div>";
$user = new xUCP_Themes($db);
$user->xucp_footer_logged();