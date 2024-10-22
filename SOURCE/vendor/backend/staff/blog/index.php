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
$user->xucp_header_logged(BLOG_HEADER_2);
$user->xucp_content_logged();

$user = new xUCP_Secure($db);
$user->staff_check_rank();

echo "
                    <div class='row'>
                        <div class='col-xl-12'>
                            <div class='card xucp-card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>".BLOG_HEADER_2."</h4>
                                </div>
                                <div class='card-body'>
									<form action='/app/features/staff/xucp_blog.php' method='post' enctype='multipart/form-data'>
										<tr>				  
											<td>
												<h6>
													".BLOG_TITLE."
												</h6>
												<div class='input-group'>
													<input type='text' name='xucp_title' size='50' maxlength='100' class='form-control' required>
												</div>	
											</td>
										</tr>
										<tr>				  
											<td>
												<h6>
													".BLOG_DESCRIPTION."
												</h6>
												<div class='input-group'>";
                                                    $bbcodeEditor = new xUCP_BBCode_Editor();
                                                    echo $bbcodeEditor->xucp_text_bbcode("xucp_description", htmlspecialchars(stripslashes($_POST["xucp_description"])));
                                                    echo "
												</div>	
											</td>
										</tr>										
										<tr>					  
											<td>
												<br>
												<button type='submit' name='xucp_submit' class='btn btn-primary btn-round'>
													".BLOG_SUBMIT."
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