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
$user->xucp_header_logged(GSERVER_INFO_HEAD);
$user->xucp_content_logged();

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
					".GSERVER_INFO_HEAD."
				</h4>
				<hr class='hr-horizontal'>
                <p class='card-title-desc'>".GSERVER_INFO_01."<br />".GSERVER_INFO_02."</p>
            </div>
            <div class='card-body'>
                <div class='row gy-3'>";

$server_ip = $_SESSION['xucp_free']['site_settings_gserver_ip'];
$server_port = $_SESSION['xucp_free']['site_settings_gserver_port'];

function checkServerStatus($ip, $port) {
    if (false === @fsockopen($ip, $port, $errno, $errstr, 3600)) {
        return "<span style='color: #F00000;'><b>".UPTIME_DOWN."</b></span>";
    } else {
        return "<span style='color: #31B404;'><b>".UPTIME_UP."</b></span>";
    }
}

echo "
                    <div class='col-lg-6'>
                        <label class='form-label'>".SITE_CONFIG_GSERVERNAME."</label>
                    </div>
                    <div class='col-lg-6'>
                        <label class='form-label'>".$_SESSION['xucp_free']['site_settings_gserver_name']."</label>
                    </div>
                    <div class='col-lg-6'>
                        <label class='form-label'>".SITE_CONFIG_GSERVERIP."</label>
                    </div>
                    <div class='col-lg-6'>
                        <label class='form-label'>".$server_ip."</label>
                    </div>
                    <div class='col-lg-6'>
                        <label class='form-label'>".SITE_CONFIG_GSERVERPORT."</label>
                    </div>
                    <div class='col-lg-6'>
                        <label class='form-label'>".$server_port."</label>
                    </div>
                    <div class='col-lg-6'>
                        <label class='form-label'>".SITE_CONFIG_GSERVER_STATUS."</label>
                    </div>
                    <div class='col-lg-6'>
                        <label class='form-label'>".checkServerStatus($server_ip, $server_port)."</label>
                    </div>
                    <div class='col-lg-6'>
                        <label class='form-label'>Voice Chat</label>
                    </div>
                    <div class='col-lg-6'>
                        <label class='form-label'>
                            <a href='https://gaming.v10networks.com/saltychat/download/3.1.2'>
                                <span>SaltyChat</span>
                            </a>
                        </label>
                    </div>";

$dl_sections = [
    'ragemp' => SITE_CONFIG_RAGEMP,
    'altv' => SITE_CONFIG_ALTV,
    'fivem' => SITE_CONFIG_FIVEM,
    'redm' => SITE_CONFIG_REDM
];

foreach ($dl_sections as $section => $label) {
    if (intval($_SESSION['xucp_free']['site_settings_dl_section_' . $section]) >= 1) {
        echo "
                    <div class='col-lg-6'>
                        <label class='form-label'>Client</label>
                    </div>
                    <div class='col-lg-6'>
                        <label class='form-label'>
                            <a href='https://runtime.fivem.net/client/$section/$section.zip'>
                                <span>$label</span>
                            </a>
                        </label>
                    </div>";
    }
}

echo "
                </div>
            </div>
        </div>
    </div>
</div>";	
$user->xucp_footer_logged();
		