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
$user->xucp_header_logged(UPTIME_SYSTEM_HEADER);
$user->xucp_content_logged();

$keys_uid = 1;
$select_stmt = $db->prepare("SELECT * FROM xucp_uptime WHERE `id` = ".$keys_uid);
$select_stmt->execute();
$uptime_status=$select_stmt->fetch(PDO::FETCH_ASSOC);

if($select_stmt->rowCount() > 0){
	echo "
                    <div class='row'>
                        <div class='col-xl-6'>
                            <div class='card xucp-card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>
                                        <svg width='32' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>                                    
                                            <path d='M7.37121 10.2017V17.0618' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
                                            <path d='M12.0382 6.91919V17.0619' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
                                            <path d='M16.6285 13.8269V17.0619' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
                                            <path fill-rule='evenodd' clip-rule='evenodd' d='M16.6857 2H7.31429C4.04762 2 2 4.31208 2 7.58516V16.4148C2 19.6879 4.0381 22 7.31429 22H16.6857C19.9619 22 22 19.6879 22 16.4148V7.58516C22 4.31208 19.9619 2 16.6857 2Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                
                                        </svg>
                                        ".UPTIME_MYSQL." ".UPTIME_STATUS."
                                    </h4>
                                    <hr class='hr-horizontal'>
                                </div>
                                <div class='card-body'>
                                    <div class='table-responsive'>
                                        <table class='table mb-0'>

                                            <thead>
                                                <tr>
                                                    <th>".UPTIME_STATUS."</th>												
                                                    <th>".UPTIME_SERVICE."</th>													
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope='row'>";
                                                if (false === fsockopen($db_host, $db_port, $errno, $errstr, 3600)) {
                                                    echo "
														<span style='color: #F00000; '><b>".UPTIME_DOWN."</b></span>";
                                                } else {
                                                    echo "
														<span style='color: #31B404; '><b>".UPTIME_UP."</b></span></td>";
                                                }
												echo "	
													</th>
                                                    <td>".UPTIME_MYSQL."</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-xl-6'>
                            <div class='card xucp-card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>
                                        <svg width='32' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>                                    
                                            <path d='M7.37121 10.2017V17.0618' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
                                            <path d='M12.0382 6.91919V17.0619' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
                                            <path d='M16.6285 13.8269V17.0619' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
                                            <path fill-rule='evenodd' clip-rule='evenodd' d='M16.6857 2H7.31429C4.04762 2 2 4.31208 2 7.58516V16.4148C2 19.6879 4.0381 22 7.31429 22H16.6857C19.9619 22 22 19.6879 22 16.4148V7.58516C22 4.31208 19.9619 2 16.6857 2Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                
                                        </svg>
                                        ".UPTIME_HOMEPAGE." ".UPTIME_STATUS."
                                    </h4>
                                    <hr class='hr-horizontal'>
                                </div>
                                <div class='card-body'>						
                                    <div class='table-responsive'>
                                        <table class='table mb-0'>

                                            <thead>
                                                <tr>
                                                    <th>".UPTIME_STATUS."</th>												
                                                    <th>".UPTIME_SERVICE."</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope='row'>";
												if (false === fsockopen(htmlentities($uptime_status['uptime_homepage'], ENT_QUOTES, 'UTF-8'), 443, $errno, $errstr, 3600)) {
													echo "
														<span style='color: #F00000; '><b>".UPTIME_DOWN."</b></span>";
												}
												else
												{
													echo "
														<span style='color: #31B404; '><b>".UPTIME_UP."</b></span></td>";
												}
												echo "	
													</th>
                                                    <td>".UPTIME_HOMEPAGE."</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-xl-6'>
                            <div class='card xucp-card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>
                                        <svg width='32' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>                                    
                                            <path d='M7.37121 10.2017V17.0618' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
                                            <path d='M12.0382 6.91919V17.0619' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
                                            <path d='M16.6285 13.8269V17.0619' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
                                            <path fill-rule='evenodd' clip-rule='evenodd' d='M16.6857 2H7.31429C4.04762 2 2 4.31208 2 7.58516V16.4148C2 19.6879 4.0381 22 7.31429 22H16.6857C19.9619 22 22 19.6879 22 16.4148V7.58516C22 4.31208 19.9619 2 16.6857 2Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                
                                        </svg>
                                        ".UPTIME_MAIL." ".UPTIME_STATUS."
                                    </h4>
                                    <hr class='hr-horizontal'>
                                </div>
                                <div class='card-body'>										
                                    <div class='table-responsive'>
                                        <table class='table mb-0'>

                                            <thead>
                                                <tr>
                                                    <th>".UPTIME_STATUS."</th>												
                                                    <th>".UPTIME_SERVICE."</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope='row'>";
												if (false === fsockopen(htmlentities($uptime_status['uptime_mail'], ENT_QUOTES, 'UTF-8'), 25, $errno, $errstr, 3600)) {
													echo "
														<span style='color: #F00000; '><b>".UPTIME_DOWN."</b></span>";
												}
												else
												{
													echo "
														<span style='color: #31B404; '><b>".UPTIME_UP."</b></span></td>";
												}
												echo "	
													</th>
                                                    <td>".UPTIME_MAIL."</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>									
                                </div>
                            </div>
                        </div>
                        <div class='col-xl-6'>
                            <div class='card xucp-card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>
                                        <svg width='32' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>                                    
                                            <path d='M7.37121 10.2017V17.0618' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
                                            <path d='M12.0382 6.91919V17.0619' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
                                            <path d='M16.6285 13.8269V17.0619' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
                                            <path fill-rule='evenodd' clip-rule='evenodd' d='M16.6857 2H7.31429C4.04762 2 2 4.31208 2 7.58516V16.4148C2 19.6879 4.0381 22 7.31429 22H16.6857C19.9619 22 22 19.6879 22 16.4148V7.58516C22 4.31208 19.9619 2 16.6857 2Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                
                                        </svg>
                                        ".UPTIME_TEAMSPEAK." ".UPTIME_STATUS."
                                    </h4>
                                    <hr class='hr-horizontal'>
                                </div>
                                <div class='card-body'>										
                                    <div class='table-responsive'>
                                        <table class='table mb-0'>

                                            <thead>
                                                <tr>
                                                    <th>".UPTIME_STATUS."</th>												
                                                    <th>".UPTIME_SERVICE."</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope='row'>";
												if (false === fsockopen(htmlentities($uptime_status['uptime_teamspeak'], ENT_QUOTES, 'UTF-8'), htmlentities($uptime_status['uptime_teamspeak_port'], ENT_QUOTES, 'UTF-8'), $errno, $errstr, 3600)) {
													echo "
														<span style='color: #F00000; '><b>".UPTIME_DOWN."</b></span>";
												}
												else
												{
													echo "
														<span style='color: #31B404; '><b>".UPTIME_UP."</b></span></td>";
												}
												echo "	
													</th>
                                                    <td>".UPTIME_TEAMSPEAK."</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>									
                                </div>
                            </div>
                        </div>
					</div>
                    <div class='row'>
                        <div class='col-xl-12'>
                            <div class='card xucp-card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>
                                        <svg width='32' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>                                    
                                            <path d='M7.37121 10.2017V17.0618' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
                                            <path d='M12.0382 6.91919V17.0619' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
                                            <path d='M16.6285 13.8269V17.0619' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
                                            <path fill-rule='evenodd' clip-rule='evenodd' d='M16.6857 2H7.31429C4.04762 2 2 4.31208 2 7.58516V16.4148C2 19.6879 4.0381 22 7.31429 22H16.6857C19.9619 22 22 19.6879 22 16.4148V7.58516C22 4.31208 19.9619 2 16.6857 2Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                
                                        </svg>                                    
                                        ".UPTIME_SERVICE."
                                    </h4>
                                    <hr class='hr-horizontal'>
                                </div>
                                <div class='card-body'>
                                    <div class='table-responsive'>
                                        <table class='table mb-0'>
                                            <thead>
                                                <tr>
                                                    <th>".UPTIME_SUPPORT."</th>												
                                                    <th>".UPTIME_WHITELIST."</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class='table-light'>
                                                    <th scope='row'>".UPTIME_SUPPORT_INFO."</th>
                                                    <td>".UPTIME_WHITELIST_INFO."</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-xl-12'>
                            <div class='card xucp-card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>
                                        <svg width='32' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>                                    
									        <path d='M7.37121 10.2017V17.0618' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
									        <path d='M12.0382 6.91919V17.0619' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
									        <path d='M16.6285 13.8269V17.0619' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
									        <path fill-rule='evenodd' clip-rule='evenodd' d='M16.6857 2H7.31429C4.04762 2 2 4.31208 2 7.58516V16.4148C2 19.6879 4.0381 22 7.31429 22H16.6857C19.9619 22 22 19.6879 22 16.4148V7.58516C22 4.31208 19.9619 2 16.6857 2Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                
								        </svg>
                                        ".UPTIME_ROCKSTAR."
                                    </h4>
                                    <hr class='hr-horizontal'>
                                </div>
                                <div class='card-body'>
                                    <div class='table-responsive'>
                                        <table class='table mb-0'>
                                            <thead>
                                                <tr>
                                                    <th>".UPTIME_GTA_ONLINE."</th>
                                                    <th>".UPTIME_SOCIAL_CLUB."</th>
                                                    <th>".UPTIME_LAUNCHER_AUTHENTIFIZIERUNG."</th>
                                                    <th>".UPTIME_CLOUD."</th>													
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class='table-light'>
                                                    <th scope='row'>";
												if (false === fsockopen("www.rockstargames.com", 443, $errno, $errstr, 3600)) {
													echo "
														<span style='color: #F00000; '><b>".UPTIME_DOWN."</b></span>";
												}
												else
												{
													echo "
														<span style='color: #31B404; '><b>".UPTIME_UP."</b></span></td>";
												}
												echo "	
													</th>
                                                    <th scope='row'>";
												if (false === fsockopen("socialclub.rockstargames.com", 443, $errno, $errstr, 3600)) {
													echo "
														<span style='color: #F00000; '><b>".UPTIME_DOWN."</b></span>";
												}
												else
												{
													echo "
														<span style='color: #31B404; '><b>".UPTIME_UP."</b></span></td>";
												}
												echo "	
													</th>
                                                    <th scope='row'>";
												if (false === fsockopen("www.rockstargames.com", 443, $errno, $errstr, 3600)) {
													echo "
														<span style='color: #F00000; '><b>".UPTIME_DOWN."</b></span>";
												}
												else
												{
													echo "
														<span style='color: #31B404; '><b>".UPTIME_UP."</b></span></td>";
												}
												echo "	
													</th>
                                                    <th scope='row'>";
												if (false === fsockopen("rgl-prod.ros.rockstargames.com", 443, $errno, $errstr, 3600)) {
													echo "
														<span style='color: #F00000; '><b>".UPTIME_DOWN."</b></span>";
												}
												else
												{
													echo "
														<span style='color: #31B404; '><b>".UPTIME_UP."</b></span></td>";
												}
												echo "	
													</th>													
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
}
$user->xucp_footer_logged();