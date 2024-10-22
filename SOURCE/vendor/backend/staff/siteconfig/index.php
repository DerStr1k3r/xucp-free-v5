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
$user->xucp_header_logged(SITE_CONFIG_HEADER);
$user->xucp_content_logged();

$user = new xUCP_Secure($db);
$user->staff_check();

$siteConfigUpdater = new xUCP_SiteConfigUpdater($db);
$siteConfigUpdater->updateConfig($_REQUEST);

echo "	
					<div class='row'>
						<div class='col-lg-12'>
							<div class='card xucp-card'>
								<div class='card-body'>";
                $select_stmt = $db->prepare("SELECT id, site_dl_section, site_rage_section, site_altv_section, site_fivem_section, site_redm_section, site_online, site_name, site_teamspeak, site_lang, site_gservername, site_gserverip, site_gserverport from xucp_config ORDER by id DESC LIMIT 1");
                $select_stmt->execute();
                $conf_set=$select_stmt->fetch(PDO::FETCH_ASSOC);
                if($select_stmt->rowCount() > 0){
					echo "
						<form class='form-horizontal' method='post' action='".$_SERVER['PHP_SELF']."' enctype='multipart/form-data'>
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='email_address_2'>".SITE_CONFIG_ONLINE."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<select name='xucp_site_online' class='form-control show-tick' required>
												<option value=''>-- ".SITE_CONFIG_ONLINE_INFO." --</option>
												<option value='1'>".SITE_CONFIG_ONLINE_ONLINE."</option>
												<option value='0'>".SITE_CONFIG_ONLINE_OFFLINE."</option>											
											</select>
										</div>									
									</div>
								</div>
							</div>							
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='password_2'>".SITE_CONFIG_NAME."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<input type='text' name='xucp_site_name' size='12' maxlength='12' class='form-control' placeholder='".SITE_CONFIG_NAME."' value='" . $conf_set["site_name"]. "' required>
										</div>
									</div>
								</div>
							</div>
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='password_2'>".SITE_CONFIG_LANG."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
										    <select name='xucp_site_lang' class='form-control show-tick' required>
												<option value=''>-- ".CHANGE_MY_PROFILE_LANGUAGENOTE." --</option>
												<option value='en'>".CHANGE_MY_PROFILE_LANGUAGE_SELECT_EN."</option>
												<option value='de'>".CHANGE_MY_PROFILE_LANGUAGE_SELECT_DE."</option>
											</select>
										</div>
									</div>
								</div>
							</div>							
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='password_2'>".SITE_CONFIG_TEAMSPEAK."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<input type='text' name='xucp_site_teamspeak' size='12' maxlength='64' class='form-control' placeholder='".SITE_CONFIG_TEAMSPEAK."' value='" . $conf_set["site_teamspeak"]. "' required>
										</div>
									</div>
								</div>
							</div>
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='password_2'>".SITE_CONFIG_DOWNLOAD_SECTION."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<input type='text' name='xucp_site_dl_section' size='12' maxlength='12' class='form-control' placeholder='".SITE_CONFIG_DOWNLOAD_SECTION."' value='" . $conf_set["site_dl_section"]. "' required>
										</div>
									</div>
								</div>
							</div>
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='password_2'>".SITE_CONFIG_GSERVERNAME."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<input type='text' name='xucp_site_gservername' size='12' maxlength='64' class='form-control' placeholder='".SITE_CONFIG_GSERVERNAME."' value='" . $conf_set["site_gservername"]. "' required>
										</div>
									</div>
								</div>
							</div>
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='password_2'>".SITE_CONFIG_GSERVERIP."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<input type='text' name='xucp_site_gserverip' size='12' maxlength='64' class='form-control' placeholder='".SITE_CONFIG_GSERVERIP."' value='" . $conf_set["site_gserverip"]. "' required>
										</div>
									</div>
								</div>
							</div>
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='password_2'>".SITE_CONFIG_GSERVERPORT."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<input type='text' name='xucp_site_gserverport' size='12' maxlength='64' class='form-control' placeholder='".SITE_CONFIG_GSERVERPORT."' value='" . $conf_set["site_gserverport"]. "' required>
										</div>
									</div>
								</div>
							</div>								
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='password_2'>".SITE_CONFIG_RAGEMP."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<select name='xucp_site_rage_section' class='form-control show-tick' required>
												<option value=''>-- ".SITE_CONFIG_CLIENT_INFO." --</option>
												<option value='1'>".SITE_CONFIG_CLIENT_YES."</option>
												<option value='0'>".SITE_CONFIG_CLIENT_NO."</option>											
											</select>
										</div>									
									</div>
								</div>
							</div>
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='password_2'>".SITE_CONFIG_ALTV."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<select name='xucp_site_altv_section' class='form-control show-tick' required>
												<option value=''>-- ".SITE_CONFIG_CLIENT_INFO." --</option>
												<option value='1'>".SITE_CONFIG_CLIENT_YES."</option>
												<option value='0'>".SITE_CONFIG_CLIENT_NO."</option>											
											</select>
										</div>									
									</div>
								</div>
							</div>
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='password_2'>".SITE_CONFIG_FIVEM."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<select name='xucp_site_fivem_section' class='form-control show-tick' required>
												<option value=''>-- ".SITE_CONFIG_CLIENT_INFO." --</option>
												<option value='1'>".SITE_CONFIG_CLIENT_YES."</option>
												<option value='0'>".SITE_CONFIG_CLIENT_NO."</option>											
											</select>
										</div>									
									</div>
								</div>
							</div>
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='password_2'>".SITE_CONFIG_REDM."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<select name='xucp_site_redm_section' class='form-control show-tick' required>
												<option value=''>-- ".SITE_CONFIG_CLIENT_INFO." --</option>
												<option value='1'>".SITE_CONFIG_CLIENT_YES."</option>
												<option value='0'>".SITE_CONFIG_CLIENT_NO."</option>											
											</select>
										</div>									
									</div>
								</div>
							</div><br />							
							<div class='row clearfix'>
								<div class='col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5'>   
								    <input type='submit'  name='xucp_submit' class='btn btn-primary w-100 waves-effect waves-light' value='".STAFF_USER_CONTROLSAVE."'>
								</div>
							</div>
						</form>";
				}					

		echo "		  			
                                </div>
                            </div>
                        </div>
                    </div>";
$user = new xUCP_Themes($db);
$user->xucp_footer_logged();