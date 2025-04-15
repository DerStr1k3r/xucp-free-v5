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
$user->xucp_header_logged(USER_TICKET_CREATE);
$user->xucp_content_logged();

$select_stmt = $db->prepare("SELECT * FROM xucp_accounts  WHERE id = ".$_SESSION['xucp_free']['secure_first']);
$select_stmt->execute();
$support=$select_stmt->fetch(PDO::FETCH_ASSOC);
if($select_stmt->rowCount() > 0){
    echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card xucp-card'>
									<div class='card-header'>
										<h4 class='card-title'>
											<svg width='32' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>                                    
												<path fill-rule='evenodd' clip-rule='evenodd' d='M21.419 15.732C21.419 19.31 19.31 21.419 15.732 21.419H7.95C4.363 21.419 2.25 19.31 2.25 15.732V7.932C2.25 4.359 3.564 2.25 7.143 2.25H9.143C9.861 2.251 10.537 2.588 10.967 3.163L11.88 4.377C12.312 4.951 12.988 5.289 13.706 5.29H16.536C20.123 5.29 21.447 7.116 21.447 10.767L21.419 15.732Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
												<path d='M7.48145 14.4629H16.2164' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                
											</svg>
											".USER_TICKET_CREATE."
										</h4>
										<hr class='hr-horizontal'>
										<p class='card-title-desc'>".SUPPORTADDTICKET1."</p>
									</div>
									<div class='card-body'>
										<form action='/app/features/user/xucp_support' method='post' enctype='multipart/form-data'>
											<tr>				  
												<td>
													<h6 class='title'>
														".SUPPORTUSERNAME."
														<small class='text-muted'>".SUPPORTUSERINFO1."</small>
													</h6>
													<div class='input-group'>
														<input type='text' name='xucp_username' size='50' maxlength='60' class='form-control' value='".htmlentities($support['username'], ENT_QUOTES, 'UTF-8')."' required>
													</div>	
												</td>
											</tr>
											<tr>				  
												<td>
													<h6 class='title'>
														".SUPPORTSUBJECT."
														<small class='text-muted'>".SUPPORTUSERINFO2."</small>
													</h6>
													<div class='input-group'>
														<input type='text' name='xucp_bug' size='50' maxlength='60' class='form-control' required>
													</div>	
												</td>
											</tr>
											<tr>					  
												<td>
													<h6 class='title'>
														".SUPPORTMSG."
														<small class='text-muted'>".SUPPORTUSERINFO3."</small>
													</h6>
													<div class='input-group'>";
                                                        $bbcodeEditor = new xUCP_BBCode_Editor();
                                                        echo $bbcodeEditor->xucp_text_bbcode("xucp_msg", htmlspecialchars(stripslashes($support['msg'])));
												echo"
													</div>	
												</td>						
											</tr>
											<br />
											<tr>					  
												<td>						
													<button type='submit' name='xucp_submit' class='btn btn-primary w-100 waves-effect waves-light'>
														<i class='dripicons-checkmark'></i>&nbsp;".SUPPORTSAVE."
													</button>
													</submit>
												</td>							
											</tr>				  						
										</form>
									</div>
								</div>
							</div>
						</div>";
}
$user->xucp_footer_logged();
