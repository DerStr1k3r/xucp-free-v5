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
$user->xucp_header_logged(KEY_HEADER_2);
$user->xucp_content_logged();

$keys_uid = 1;
$select_stmt = $db->prepare("SELECT * FROM xucp_keys WHERE `id` = :keys_uid");
$select_stmt->bindParam(':keys_uid', $keys_uid, PDO::PARAM_INT);
$select_stmt->execute();
$keys_status = $select_stmt->fetch(PDO::FETCH_ASSOC);

if ($keys_status) {
    echo "
        <div class='row'>
            <div class='col-lg-12'>
                <div class='card'>
                    <div class='card-header'>
                        <h4 class='card-title'>
                            <svg width='32' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>                                    
                                <path d='M15.7161 16.2234H8.49609' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
                                <path d='M15.7161 12.0369H8.49609' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
                                <path d='M11.2521 7.86011H8.49707' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
                                <path fill-rule='evenodd' clip-rule='evenodd' d='M15.909 2.74976C15.909 2.74976 8.23198 2.75376 8.21998 2.75376C5.45998 2.77076 3.75098 4.58676 3.75098 7.35676V16.5528C3.75098 19.3368 5.47298 21.1598 8.25698 21.1598C8.25698 21.1598 15.933 21.1568 15.946 21.1568C18.706 21.1398 20.416 19.3228 20.416 16.5528V7.35676C20.416 4.57276 18.693 2.74976 15.909 2.74976Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                
                            </svg>              
                            ".KEY_HEADER_2."
                        </h4>
                        <hr class='hr-horizontal'>
                    </div>                          
                    <div class='card-body'>
                        <div class='table-responsive'>
                            <table class='table'>
                                <thead class=' text-primary'>
                                    <th>
                                        Beschreibung
                                    </th>
                                    <th>
                                        Hotkey
                                    </th>                      
                                </thead>
                                <tbody>";

    $keys = [
        "".KEY1."",
        "".KEY2."",
        "".KEY3."",
        "".KEY4."",
        "".KEY5."",
        "".KEY6."",
        "".KEY7."",
        "".KEY8."",
        "".KEY9."",
        "".KEY10."",
        "".KEY11."",
        "".KEY12."",
        "".KEY13."",
        "".KEY14."",
        "".KEY15."",
        "".KEY16."",
        "".KEY17."",
        "".KEY18."",
        "".KEY19.""
    ];
    $count = 1;
    foreach ($keys as $key) {
        echo "
            <tr>
                <td>{$key}</td>
                <td>".htmlentities($keys_status['key'.$count], ENT_QUOTES, 'UTF-8')."</td>
            </tr>";
        $count++;
    }

    echo "
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
}
	  	
$user->xucp_footer_logged();