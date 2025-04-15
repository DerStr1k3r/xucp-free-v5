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
$user->xucp_header_logged(SUPPORT_HEADER_LIST);
$user->xucp_content_logged();

xUCP_Secure::staff_check();

$id = $_GET['id'];
$select_stmt = $db->prepare(query: "SELECT * FROM xucp_support WHERE id = ".$id);
$select_stmt->execute();
$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
if($select_stmt->rowCount() > 0){
    echo "
                    <div class='row'>
                        <div class='col-lg-12'>
                            <div class='card xucp-card'>
					            <div class='card-body'>
						            <input type='hidden' name='new' value='1' />
                                        <div class='form-group'>
								            <div class='form-line'>
									            <label  class='col-sm-3 col-form-label'>".SUPPORTUSERID."</label>
									            <div class='col-sm-12 form-control'>
                                                    " . $row["id"]. "
									            </div>
								            </div>
                                        </div>
                                        <div class='form-group'>
								            <div class='form-line'>
									            <label  class='col-sm-3 col-form-label'>".SUPPORTUSERNAME."</label>
									            <div class='col-sm-12 form-control'>
                                                    " . $row["username"]. "
									            </div>
								            </div>							
                                        </div>
                                        <div class='form-group'>
								            <div class='form-line'>
									            <label  class='col-sm-3 col-form-label'>".SUPPORTSUBJECT."</label>
									            <div class='col-sm-12 form-control'>
                                                    <p>";
                                                        $parser = new xUCP_BBCode_Parser();
                                                        
                                                        $htmlText = $parser->parse($row['bug']);
                                                            
                                                        echo $htmlText;
echo "
                                                    </p>
									            </div>
								            </div>							
                                        </div>
                                        <div class='form-group'>
								            <div class='form-line'>
									            <label  class='col-sm-3 col-form-label'>".SUPPORTMSG."</label>
									            <div class='col-sm-12 form-control'>
                                                    <p>";
                                                        $parser = new xUCP_BBCode_Parser();
                                                        
                                                        $htmlText = $parser->parse($row['msg']);
                                                            
                                                        echo $htmlText;
echo "
                                                    </p>									
									            </div>
								            </div>							
                                        </div>
                                        <div class='form-group'>
								            <div class='form-line'>
									            <label  class='col-sm-3 col-form-label'>".SUPPORTDATE."</label>
									            <div class='col-sm-12 form-control'>
                                                    ".$row["posted"]."
									            </div>
								            </div>							
                                        </div>						
						            </input>
						        </div>							
					        </div>
				        </div>
                    </div>";
}
$user = new xUCP_Themes($db);
$user->xucp_footer_logged();