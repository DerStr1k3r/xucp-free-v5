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
$user->xucp_header_logged(IMPRINT_MANAGER_HEADER);
$user->xucp_content_logged();

$user = new xUCP_Secure($db);
$user->staff_check_rank();

echo "
                    <div class='row'>
                        <div class='col-xl-12'>
                            <div class='card xucp-card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>".IMPRINT_MANAGER_HEADER."</h4>
                                </div>
                                <div class='card-body'>";
$select_stmt = $db->prepare("SELECT id, name, address, phone_number, data_protection, liability_for_content, liability_for_links, copyright FROM xucp_imprint ORDER by id DESC LIMIT 1");
$select_stmt->execute();
$conf_set=$select_stmt->fetch(PDO::FETCH_ASSOC);
if($select_stmt->rowCount() > 0){
    echo "
									<form class='form-horizontal' action='/app/features/staff/xucp_imprint.php' method='post' enctype='multipart/form-data'>
										<tr>				  
											<td>
												<h6>
													".IMPRINT_NAME."
												</h6>
												<div class='input-group'>
													<input type='text' name='xucp_name' size='50' maxlength='100' class='form-control' value='" . $conf_set["name"]. "' required>
												</div>	
											</td>
										</tr>
										<tr>				  
											<td>
												<h6>
													".IMPRINT_ADDRESS."
												</h6>
												<div class='input-group'>
													<input type='text' name='xucp_address' size='50' maxlength='100' class='form-control' value='" . $conf_set["address"]. "' required>
												</div>	
											</td>
										</tr>
										<tr>				  
											<td>
												<h6>
													".IMPRINT_PHONE."
												</h6>
												<div class='input-group'>
													<input type='text' name='xucp_phone_number' size='50' maxlength='100' class='form-control' value='" . $conf_set["phone_number"]. "' required>
												</div>	
											</td>
										</tr>
										<tr>				  
											<td>
												<h6>
													".IMPRINT_DATA_PROTECTION."
												</h6>
												<div class='input-group'>
													<input type='text' name='xucp_data_protection' size='50' maxlength='2048' class='form-control' value='" . $conf_set["data_protection"]. "' required>
												</div>	
											</td>
										</tr>
										<tr>				  
											<td>
												<h6>
													".IMPRINT_LIABILITY_FOR_CONTENT."
												</h6>
												<div class='input-group'>
													<input type='text' name='xucp_liability_for_content' size='50' maxlength='2048' class='form-control' value='" . $conf_set["liability_for_content"]. "' required>
												</div>	
											</td>
										</tr>
										<tr>				  
											<td>
												<h6>
													".IMPRINT_LIABILITY_FOR_LINKS."
												</h6>
												<div class='input-group'>
													<input type='text' name='xucp_liability_for_links' size='50' maxlength='2048' class='form-control' value='" . $conf_set["liability_for_links"]. "' required>
												</div>	
											</td>
										</tr>
										<tr>				  
											<td>
												<h6>
													".IMPRINT_COPYRIGHT."
												</h6>
												<div class='input-group'>
													<input type='text' name='xucp_copyright' size='50' maxlength='2048' class='form-control' value='" . $conf_set["copyright"]. "' required>
												</div>	
											</td>
										</tr>																																																												
										<tr>					  
											<td>
												<br>
												<button type='submit' name='xucp_submit' class='btn btn-primary btn-round'>
													".IMPRINT_MANAGER_DONE."
												</button>
												</submit>
											</td>							
										</tr>						
									</form>	";
}

echo "				
                                </div>
                            </div>
                        </div>
                    </div>";
$user = new xUCP_Themes($db);
$user->xucp_footer_logged();