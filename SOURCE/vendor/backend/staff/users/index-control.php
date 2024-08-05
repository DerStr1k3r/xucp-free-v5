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
$user->xucp_header_logged(STAFF_USER_CONTROL);
$user->xucp_content_logged();

$user = new xUCP_Secure($db);
$user->staff_check();

echo "
                    <div class='row'>
							<div class='col-xl-12'>
								<div class='card xucp-card'>
									<div class='card-header'>
										<h4 class='card-title'>".USER_SUPPORT."</h4>
										<p class='card-title-desc'></p>
									</div>
									<div class='card-body'>										
							<div class='table-responsive'>
								<table class='table'>
									<thead class=' text-primary'>
										<th>
											".STAFF_USER_CONTROLUSERID."
										</th>
										<th>
											".STAFF_USER_CONTROLUSERNAME."
										</th>					  
										<th>
											".STAFF_USER_CONTROLEMAIL."
										</th>				  
										<th>
											".STAFF_USER_CONTROLACCOUNTWHITELIST."
										</th>
								        <th>
									        ".STAFF_BANNED_USER."
								        </th>
								        <th>
									        ".STAFF_BANNED_USER." ".STAFF_BANNED_USER_NOTE."
								        </th>								        										
										<th>
											".PROFILE_PORTFOLIO_WEBSITE."
										</th>
										<th>
											".PROFILE_PORTFOLIO_DISCORDTAG."
										</th>	
										<th>
											".STAFF_USER_CONTROLOPTION."
										</th>																			
									</thead>
									<tbody>";
                                $select_stmt = $db->prepare(query: "SELECT * FROM xucp_accounts WHERE id LIKE ?");
                                $select_stmt->execute(array("%$query%"));
                                while($row = $select_stmt->fetch()) {
									echo "
										<tr>
											<td>
												" . $row["id"]. "
											</td>
											<td>
												" . $row["username"]. "
											</td>						
											<td>
												" . $row["email"]. "
											</td>
											<td>
												" . $row["whitelisted"]. "
											</td>
											<td>
												" . $row["ban"]. "
											</td>
											<td>
												" . $row["banReason"]. "
											</td>											
											<td>
												" . $row["userhp"]. "
											</td>
											<td>
												" . $row["userdiscordtag"]. "
											</td>
                                            <td>
                                                <a href='/vendor/backend/staff/users/index-change-view?id=".$row['id']."' class='btn btn-primary w-100 waves-effect waves-light'>
                                                    <i class='dripicons-checkmark'></i>&nbsp;".STAFF_CHANGE_USER."
                                                </a>
                                            </td>											
										</tr>";
								}					
								echo "					  
									</tbody>
								</table>			  
								</div>
							</div>
						</div>
					</div>";
$user = new xUCP_Themes($db);
$user->xucp_footer_logged();