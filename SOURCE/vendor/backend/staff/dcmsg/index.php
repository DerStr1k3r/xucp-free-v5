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

echo "
                    <div class='row'>
                        <div class='col-xl-12'>
                            <div class='card xucp-card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>".DC_WEBHOOK_HEADER."</h4>
                                </div>
                                <div class='card-body'>
									<form action='/app/features/staff/xucp_dcmsg.php' method='post' enctype='multipart/form-data'>
										<tr>				  
											<td>
												<h6>
													".DC_WEBHOOK_MESSAGE."
												</h6>
												<div class='input-group'>";
													$bbcodeEditor = new xUCP_BBCode_Editor();
													echo $bbcodeEditor->xucp_text_bbcode("xucp_msg", isset($_POST['xucp_msg']) ? htmlspecialchars(stripslashes($_POST['xucp_msg'])) : '');
                                                    echo "
												</div>	
											</td>
										</tr>										
										<tr>					  
											<td>
												<br>
												<button type='submit' name='xucp_submit' class='btn btn-primary btn-round'>
													".DC_WEBHOOK_SEND."
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