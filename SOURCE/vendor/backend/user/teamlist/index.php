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
$user->xucp_header_logged(TLIST_HEADER);
$user->xucp_content_logged();

echo "
                        <div class='row'>
                            <div class='col-xl-12'>
                                <div class='card xucp-card'>                        
									<div class='card-header'>
										<h4 class='card-title'>
                                            <svg width='32' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>                                    
									           <path d='M17.8877 10.8967C19.2827 10.7007 20.3567 9.50473 20.3597 8.05573C20.3597 6.62773 19.3187 5.44373 17.9537 5.21973' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
									           <path d='M19.7285 14.2505C21.0795 14.4525 22.0225 14.9255 22.0225 15.9005C22.0225 16.5715 21.5785 17.0075 20.8605 17.2815' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
									           <path fill-rule='evenodd' clip-rule='evenodd' d='M11.8867 14.6638C8.67273 14.6638 5.92773 15.1508 5.92773 17.0958C5.92773 19.0398 8.65573 19.5408 11.8867 19.5408C15.1007 19.5408 17.8447 19.0588 17.8447 17.1128C17.8447 15.1668 15.1177 14.6638 11.8867 14.6638Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
									           <path fill-rule='evenodd' clip-rule='evenodd' d='M11.8869 11.888C13.9959 11.888 15.7059 10.179 15.7059 8.069C15.7059 5.96 13.9959 4.25 11.8869 4.25C9.7779 4.25 8.0679 5.96 8.0679 8.069C8.0599 10.171 9.7569 11.881 11.8589 11.888H11.8869Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
									           <path d='M5.88509 10.8967C4.48909 10.7007 3.41609 9.50473 3.41309 8.05573C3.41309 6.62773 4.45409 5.44373 5.81909 5.21973' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    <path d='M4.044 14.2505C2.693 14.4525 1.75 14.9255 1.75 15.9005C1.75 16.5715 2.194 17.0075 2.912 17.2815' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                
								            </svg>  
                                            ".TLIST_PROJECT_LEADER."
                                            <hr class='hr-horizontal'>
                                        </h4>
									</div>
									<div class='card-body'>
                                        <div class='row row-cols-1 row-cols-lg-2 row-cols-xl-4'>";
                                        $projectlead_id = UC_CLASS_PROJECT_MANAGEMENT;
                                        $select_stmt = $db->prepare(query: "SELECT * FROM xucp_accounts WHERE adminlevel = $projectlead_id");
                                        $select_stmt->execute();
                                        while($blog_status = $select_stmt->fetch()) {
                                           echo "
                                            <div class='col'>
                                                <div class='card radius-15'>
                                                    <div class='card-body text-center'>                                    
                                                        <div class='p-4 border radius-15'>
                                                            <img src='".htmlentities($blog_status['userava'], ENT_QUOTES, 'UTF-8')."' alt='' class='rounded-circle p-1 bg-primary'>
                                                            <h5 class='font-size-16 mb-1'><a href='#' class='text-dark'>".htmlentities($blog_status['username'], ENT_QUOTES, 'UTF-8')."</a></h5>
                                                            <p class='text-muted mb-2'>";
                                                            $parser = new xUCP_BBCode_Parser();    

                                                            $htmlText = $parser->parse($blog_status['usersig'], ENT_QUOTES, 'UTF-8');
                    
                                                            echo $htmlText;
echo "                    
                                                            </p>
                                                        </div>   
                                                    </div>
                                                </div>
                                            </div>";
                                        }
                                        echo "
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
									           <path d='M17.8877 10.8967C19.2827 10.7007 20.3567 9.50473 20.3597 8.05573C20.3597 6.62773 19.3187 5.44373 17.9537 5.21973' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
									           <path d='M19.7285 14.2505C21.0795 14.4525 22.0225 14.9255 22.0225 15.9005C22.0225 16.5715 21.5785 17.0075 20.8605 17.2815' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
									           <path fill-rule='evenodd' clip-rule='evenodd' d='M11.8867 14.6638C8.67273 14.6638 5.92773 15.1508 5.92773 17.0958C5.92773 19.0398 8.65573 19.5408 11.8867 19.5408C15.1007 19.5408 17.8447 19.0588 17.8447 17.1128C17.8447 15.1668 15.1177 14.6638 11.8867 14.6638Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
									           <path fill-rule='evenodd' clip-rule='evenodd' d='M11.8869 11.888C13.9959 11.888 15.7059 10.179 15.7059 8.069C15.7059 5.96 13.9959 4.25 11.8869 4.25C9.7779 4.25 8.0679 5.96 8.0679 8.069C8.0599 10.171 9.7569 11.881 11.8589 11.888H11.8869Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
									           <path d='M5.88509 10.8967C4.48909 10.7007 3.41609 9.50473 3.41309 8.05573C3.41309 6.62773 4.45409 5.44373 5.81909 5.21973' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    <path d='M4.044 14.2505C2.693 14.4525 1.75 14.9255 1.75 15.9005C1.75 16.5715 2.194 17.0075 2.912 17.2815' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                
								            </svg>
                                            ".TLIST_SUPPORT_LEADER."
                                            <hr class='hr-horizontal'>
                                        </h4>
									</div>
									<div class='card-body'>
                                        <div class='row row-cols-1 row-cols-lg-2 row-cols-xl-4'>";
                                            $suplead_id = UC_CLASS_SUPPORTER_LEADER;
                                            $select_stmt = $db->prepare(query: "SELECT * FROM xucp_accounts WHERE adminlevel = $suplead_id");
                                            $select_stmt->execute();
                                            while($blog_status = $select_stmt->fetch()) {
                                            echo "
                                            <div class='col'>
                                                <div class='card radius-15'>
                                                    <div class='card-body text-center'>                                    
                                                        <div class='p-4 border radius-15'>
                                                            <img src='".htmlentities($blog_status['userava'], ENT_QUOTES, 'UTF-8')."' alt='' class='rounded-circle p-1 bg-primary'>
                                                            <h5 class='font-size-16 mb-1'><a href='#' class='text-dark'>".htmlentities($blog_status['username'], ENT_QUOTES, 'UTF-8')."</a></h5>
                                                            <p class='text-muted mb-2'>";
                                                            $parser = new xUCP_BBCode_Parser();    

                                                            $htmlText = $parser->parse($blog_status['usersig'], ENT_QUOTES, 'UTF-8');
                    
                                                            echo $htmlText;
echo "                    
                                                            </p>
                                                        </div>   
                                                    </div>
                                                </div>
                                            </div>";
                                            }
                                            echo "                          
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
									           <path d='M17.8877 10.8967C19.2827 10.7007 20.3567 9.50473 20.3597 8.05573C20.3597 6.62773 19.3187 5.44373 17.9537 5.21973' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
									           <path d='M19.7285 14.2505C21.0795 14.4525 22.0225 14.9255 22.0225 15.9005C22.0225 16.5715 21.5785 17.0075 20.8605 17.2815' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
									           <path fill-rule='evenodd' clip-rule='evenodd' d='M11.8867 14.6638C8.67273 14.6638 5.92773 15.1508 5.92773 17.0958C5.92773 19.0398 8.65573 19.5408 11.8867 19.5408C15.1007 19.5408 17.8447 19.0588 17.8447 17.1128C17.8447 15.1668 15.1177 14.6638 11.8867 14.6638Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
									           <path fill-rule='evenodd' clip-rule='evenodd' d='M11.8869 11.888C13.9959 11.888 15.7059 10.179 15.7059 8.069C15.7059 5.96 13.9959 4.25 11.8869 4.25C9.7779 4.25 8.0679 5.96 8.0679 8.069C8.0599 10.171 9.7569 11.881 11.8589 11.888H11.8869Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
									           <path d='M5.88509 10.8967C4.48909 10.7007 3.41609 9.50473 3.41309 8.05573C3.41309 6.62773 4.45409 5.44373 5.81909 5.21973' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    <path d='M4.044 14.2505C2.693 14.4525 1.75 14.9255 1.75 15.9005C1.75 16.5715 2.194 17.0075 2.912 17.2815' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                
								            </svg>
                                            ".TLIST_SUPPORTER."
                                            <hr class='hr-horizontal'>
                                        </h4>
									</div>
									<div class='card-body'>
                                        <div class='row row-cols-1 row-cols-lg-2 row-cols-xl-4'>";
                                            $sup_id = UC_CLASS_SUPPORTER;
                                            $select_stmt = $db->prepare(query: "SELECT * FROM xucp_accounts WHERE adminlevel = $sup_id");
                                            $select_stmt->execute();
                                            while($blog_status = $select_stmt->fetch()) {
                                            echo "
                                            <div class='col'>
                                                <div class='card radius-15'>
                                                    <div class='card-body text-center'>                                    
                                                        <div class='p-4 border radius-15'>
                                                            <img src='".htmlentities($blog_status['userava'], ENT_QUOTES, 'UTF-8')."' alt='' class='rounded-circle p-1 bg-primary'>
                                                            <h5 class='font-size-16 mb-1'><a href='#' class='text-dark'>".htmlentities($blog_status['username'], ENT_QUOTES, 'UTF-8')."</a></h5>
                                                            <p class='text-muted mb-2'>";
                                                            $parser = new xUCP_BBCode_Parser();    

                                                            $htmlText = $parser->parse($blog_status['usersig'], ENT_QUOTES, 'UTF-8');
                    
                                                            echo $htmlText;
echo "                    
                                                            </p>
                                                        </div>   
                                                    </div>
                                                </div>
                                            </div>";
                                            }
                                        echo "                           
                                        </div>
                                    </div>                            
								</div>
							</div>
						</div>";
$user->xucp_footer_logged();