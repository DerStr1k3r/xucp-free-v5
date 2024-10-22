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
$user->xucp_header_logged(TEAM_CONTROL_HEADER);
$user->xucp_content_logged();

$user = new xUCP_Secure($db);
$user->staff_check_rank();

$hostUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];

$versionFile = "https://raw.githubusercontent.com/DerStr1k3r/xucp-free-v5/refs/heads/main/SOURCE/update.txt";
$referenceVersionFile = "" . $hostUrl . "/reference_version.txt";

$is_staff_support = intval($_SESSION['xucp_free']['secure_staff']) >= UC_CLASS_SUPPORTER;
$is_staff_leader_support = intval($_SESSION['xucp_free']['secure_staff']) >= UC_CLASS_SUPPORTER_LEADER;
$is_staff_project_management = intval($_SESSION['xucp_free']['secure_staff']) >= UC_CLASS_PROJECT_MANAGEMENT;

if ($is_staff_project_management) {
echo "
                    <div class='row'>
							<div class='col-xl-12'>
								<div class='card xucp-card'>
									<div class='card-header'>
										<h4 class='card-title'>
											<svg width='32' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>                                    
												<path d='M15.7161 16.2234H8.49609' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
												<path d='M15.7161 12.0369H8.49609' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
												<path d='M11.2521 7.86011H8.49707' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
												<path fill-rule='evenodd' clip-rule='evenodd' d='M15.909 2.74976C15.909 2.74976 8.23198 2.75376 8.21998 2.75376C5.45998 2.77076 3.75098 4.58676 3.75098 7.35676V16.5528C3.75098 19.3368 5.47298 21.1598 8.25698 21.1598C8.25698 21.1598 15.933 21.1568 15.946 21.1568C18.706 21.1398 20.416 19.3228 20.416 16.5528V7.35676C20.416 4.57276 18.693 2.74976 15.909 2.74976Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                
											</svg>
											".XUCP_UPDATE_STATUS_HEADER."
										</h4>
										<hr class='hr-horizontal'>
									</div>
									<div class='card-body'>										
							<div class='table-responsive'>
								<table class='table'>
									<thead class=' text-primary'>
										<th>
											".XUCP_UPDATE_STATUS_TABLE1."
										</th>
										<th>
											".XUCP_UPDATE_STATUS_TABLE2."
										</th>					  																			
									</thead>
									<tbody>
										<tr>
											<td>";
											$versionChecker = new xUCP_Updater($versionFile, $referenceVersionFile);
											try {
												if ($versionChecker->isNewVersionAvailable()) {
													echo "".XUCP_UPDATE_STATUS_NOTE1." " . $versionChecker->getNewVersion() . "<br>";
												} else {
													echo "".XUCP_UPDATE_STATUS_NOTE3."";
												}
											} catch (Exception $e) {
												echo "Fehler: " . $e->getMessage();
											}																						
echo "												
											</td>
											<td>";
											$versionChecker = new xUCP_Updater($versionFile, $referenceVersionFile);
											try {
												if ($versionChecker->isNewVersionAvailable()) {
													echo "".XUCP_UPDATE_STATUS_NOTE2." " . $versionChecker->getCurrentVersion() . "<br>";
												} else {
													echo "".XUCP_UPDATE_STATUS_NOTE4."";
												}
											} catch (Exception $e) {
												echo "Fehler: " . $e->getMessage();
											}
echo "												
											</td>																	
										</tr>				  
									</tbody>
								</table>			  
								</div>
							</div>
						</div>
					</div>";
}					
echo "
				<div class='row'>
					<div class='col-12'>
						<div class='card xucp-card'>
							<div class='card-body'>
								<ul class='nav nav-pills mb-3 xucp-nav xucp-bg-dark' role='tablist'>";								
									if ($is_staff_support) {
										echo "
									<li class='nav-item' role='presentation'>
										<a class='nav-link px-3 active' data-bs-toggle='tab' href='#supporter' role='tab' aria-selected='true'>
											<div class='d-flex align-items-center'>
												<div class='tab-icon'><i class='bx bx-support font-18 me-1'></i>
												</div>
												<div class='tab-title'>".TLIST_SUPPORTER."</div>
											</div>
										</a>
									</li>";
									}
									if ($is_staff_leader_support) {
										echo "
									<li class='nav-item' role='presentation'>
										<a class='nav-link px-3' data-bs-toggle='tab' href='#supportleader' role='tab' aria-selected='false'>
											<div class='d-flex align-items-center'>
												<div class='tab-icon'><i class='bx bx-command font-18 me-1'></i>
												</div>
												<div class='tab-title'>".TLIST_SUPPORT_LEADER."</div>
											</div>
										</a>
									</li>";
									}
									if ($is_staff_project_management) {
										echo"
									<li class='nav-item' role='presentation'>
										<a class='nav-link px-3' data-bs-toggle='tab' href='#projectmanagement' role='tab' aria-selected='false'>
											<div class='d-flex align-items-center'>
												<div class='tab-icon'><i class='bx bx-body font-18 me-1'></i>
												</div>
												<div class='tab-title'>".TLIST_PROJECT_LEADER."</div>
											</div>
										</a>
									</li>";
									}
								echo "
								</ul>
								<div class='tab-content py-3'>
									<div class='tab-pane fade show active' id='supporter' role='tabpanel'>
				                        <div class='row'>
					                        <div class='col-12'>
						                        <div class='card xucp-card'>
							                        <div class='card-body text-center'>
								                        <div class='p-4 border radius-15'>
									                        <div class='d-grid'>
									                            <div class='row'>
					                                                <div class='col-xl-12 mx-auto'>
						                                                <div class='card xucp-card'>
																			<table class='table'>
																				<thead class=' text-primary'>
																					<th>
																						".USER_TOOLS_NAME."
																					</th>
																					<th>
																						".USER_TOOLS_LINK."
																					</th>					  																			
																				</thead>
																				<tbody>
																					<tr>
																						<td>
																							".STAFF_USER_CONTROL."
																						</td>
																						<td>
																							<a href='/vendor/backend/staff/users/index-control' class='bottom-0'>".GO_TO_SITE."</a>
																						</td>																	
																					</tr>
																					<tr>
																						<td>
																							".SUPPORT_HEADER_LIST."
																						</td>
																						<td>
																							<a href='/vendor/backend/staff/support/index' class='bottom-0'>".GO_TO_SITE."</a>
																						</td>																	
																					</tr>
																					<tr>
																						<td>
																							".WHITELIST_HEADER."
																						</td>
																						<td>
																							<a href='/vendor/backend/staff/whitelist/index-wlquestion' class='bottom-0'>".GO_TO_SITE."</a>
																						</td>																	
																					</tr>
																					<tr>
																						<td>
																							".FRAGE_HEADER_2."
																						</td>
																						<td>
																							<a href='/vendor/backend/staff/keyboard/index' class='bottom-0'>".GO_TO_SITE."</a>
																						</td>																	
																					</tr>										
																				</tbody>
																			</table>			  
																		</div>
					                                                </div>
				                                                </div>
									                        </div>
								                        </div>
							                        </div>
						                        </div>
					                        </div>
				                        </div>																		
									</div>
									<div class='tab-pane fade' id='supportleader' role='tabpanel'>
				                        <div class='row'>
					                        <div class='col-12'>
						                        <div class='card xucp-card'>
							                        <div class='card-body text-center'>
								                        <div class='p-4 border radius-15'>
									                        <div class='d-grid'>
																<table class='table'>
																	<thead class=' text-primary'>
																		<th>
																			".USER_TOOLS_NAME."
																		</th>
																		<th>
																			".USER_TOOLS_LINK."
																		</th>					  																			
																	</thead>
																	<tbody>
																		<tr>
																			<td>
																				".DC_WEBHOOK_HEADER."
																			</td>
																			<td>
																				<a href='/vendor/backend/staff/dcmsg/index' class='bottom-0'>".GO_TO_SITE."</a>
																			</td>																	
																		</tr>
																		<tr>
																			<td>
																				".SPONSOR_SYSTEM_HEADER."
																			</td>
																			<td>
																				<a href='/vendor/backend/staff/sponsor/index' class='bottom-0'>".GO_TO_SITE."</a>
																			</td>																	
																		</tr>
																		<tr>
																			<td>
																				".NEWS_HEADER."
																			</td>
																			<td>
																				<a href='/vendor/backend/staff/news/index' class='bottom-0'>".GO_TO_SITE."</a>
																			</td>																	
																		</tr>
																		<tr>
																			<td>
																				".STAFF_RULES_ACP."
																			</td>
																			<td>
																				<a href='/vendor/backend/staff/rules/index' class='bottom-0'>".GO_TO_SITE."</a>
																			</td>																	
																		</tr>
																		<tr>
																			<td>
																				".FRAGE_HEADER."
																			</td>
																			<td>
																				<a href='/vendor/backend/staff/whitelist/index-wlask' class='bottom-0'>".GO_TO_SITE."</a>
																			</td>																	
																		</tr>										
																	</tbody>
																</table>			  
															</div>
								                        </div>
							                        </div>
						                        </div>
					                        </div>
				                        </div>																			
									</div>
									<div class='tab-pane fade' id='projectmanagement' role='tabpanel'>
				                        <div class='row'>
					                        <div class='col-12'>
						                        <div class='card xucp-card'>
							                        <div class='card-body text-center'>
								                        <div class='p-4 border radius-15'>							                        
															<div class='d-grid'>
																<div class='table-responsive'>
																	<table class='table'>
																		<thead class=' text-primary'>
																			<th>
																				".USER_TOOLS_NAME."
																			</th>
																			<th>
																				".USER_TOOLS_LINK."
																			</th>					  																			
																		</thead>
																		<tbody>
																			<tr>
																				<td>
																					".SITE_CONFIG_HEADER."
																				</td>
																				<td>
																					<a href='/vendor/backend/staff/siteconfig/index' class='bottom-0'>".GO_TO_SITE."</a>
																				</td>																	
																			</tr>
																			<tr>
																				<td>
																					".KEY_HEADER."
																				</td>
																				<td>
																					<a href='/vendor/backend/staff/keyboard/index' class='bottom-0'>".GO_TO_SITE."</a>
																				</td>																	
																			</tr>
																			<tr>
																				<td>
																					".UPTIME_CONFIG_SYSTEM_HEADER."
																				</td>
																				<td>
																					<a href='/vendor/backend/staff/uptimeconfig/index' class='bottom-0'>".GO_TO_SITE."</a>
																				</td>																	
																			</tr>
																			<tr>
																				<td>
																					".DC_WEBHOOK_HEADER."
																				</td>
																				<td>
																					<a href='/vendor/backend/staff/dcmsg/index' class='bottom-0'>".GO_TO_SITE."</a>
																				</td>																	
																			</tr>
																			<tr>
																				<td>
																					".IMPRINT_MANAGER_HEADER."
																				</td>
																				<td>
																					<a href='/vendor/backend/staff/imprint/index' class='bottom-0'>".GO_TO_SITE."</a>
																				</td>																	
																			</tr>										
																		</tbody>
																	</table>			  
																</div>																		
															</div>															
								                        </div>
							                        </div>
						                        </div>
					                        </div>
				                        </div>																			
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>";

$user = new xUCP_Themes($db);
$user->xucp_footer_logged();
