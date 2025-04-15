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
$user->xucp_header_logged(FRAGE_HEADER_2);
$user->xucp_content_logged();

xUCP_Secure::staff_check();

echo "
						<div class='row'>
							<div class='col-lg-12'>
								<div class='card xucp-card'>
									<div class='card-body'>
										<table class='table'>
											<thead>
												<tr>
													<th>ID</th>
													<th>Username</th>
													<th>Charakter Name</th>
													<th>Option</th>
												</tr>
											</thead>
											<tbody>";
										$select_stmt = $db->prepare(query: "SELECT * FROM xucp_whitelist WHERE id LIKE ?");
										$select_stmt->execute(array("%$query%"));
										while($row = $select_stmt->fetch()) {
											echo"		
												<tr>
													<td>".$row['id']."</td>
													<td>".$row['ucpname']."</td>
													<td>".$row['charname']."</td>
													<td>
														<a href='/vendor/backend/staff/whitelist/index-wllist-view?id=".$row['id']."' class='btn btn-primary w-100 waves-effect waves-light'>
															<i class='dripicons-checkmark'></i>&nbsp;".FRAGE_VIEW."
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