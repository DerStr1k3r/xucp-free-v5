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
$user->xucp_header_logged(DASHBOARD);
$user->xucp_content_logged();

$select_stmt = $db->prepare("SELECT * FROM xucp_accounts WHERE `id` = :id");
$select_stmt->bindParam(':id', $_SESSION['xucp_free']['secure_first']);
$select_stmt->execute();
$wl_status = $select_stmt->fetch(PDO::FETCH_ASSOC);

echo "<div class='row row-cols-1 row-cols-md-2 row-cols-xl-3'>";

if ($select_stmt->rowCount() > 0 && intval($_SESSION['xucp_free']['secure_staff']) >= UC_CLASS_SUPPORTER) {
    function printCard($title, $value) {
        echo "
        <div class='col'>
            <div class='card xucp-card'>
                <div class='card-body'>
                    <div class='d-flex align-items-center'>
                        <div>
                            <p class='mb-0'>
                                <svg width='36' height='35' class='img-fluid avatar avatar-50 avatar-rounded' viewBox='0 0 36 35' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                    <path d='M3.86124 21.6224L11.2734 16.8577C11.6095 16.6417 12.041 16.6447 12.3718 16.8655L18.9661 21.2663C19.2968 21.4871 19.7283 21.4901 20.0644 21.2741L27.875 16.2534' stroke='#BFBFBF' stroke-linecap='round' stroke-linejoin='round'/>
                                    <path d='M26.7847 13.3246L31.6677 14.0197L30.4485 18.7565L26.7847 13.3246ZM30.2822 19.4024C30.2823 19.4023 30.2823 19.4021 30.2824 19.402L30.2822 19.4024ZM31.9991 14.0669L31.9995 14.0669L32.0418 13.7699L31.9995 14.0669C31.9994 14.0669 31.9993 14.0669 31.9991 14.0669Z' fill='#BFBFBF' stroke='#BFBFBF'/>
                                </svg>                                        
                                $title
                            </p>
                            <div class='pt-3'>
                                <h4 class='counter' style=''>" . htmlentities($value, ENT_QUOTES, 'UTF-8') . "</h4>
                                <div class='pt-1'>
                                    <small>
                                        <div class='progress radius-10 mt-4' style='height:4.5px;'>
                                            <div class='progress-bar bg-info' role='progressbar' style='width: " . htmlentities($value, ENT_QUOTES, 'UTF-8') . "%'></div>
                                        </div>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
    }

    $select_stmt = $db->prepare("SELECT id FROM xucp_accounts ORDER by id DESC LIMIT 1");
    $select_stmt->execute();
    $max_users_status = $select_stmt->fetch(PDO::FETCH_ASSOC);
    if ($select_stmt->rowCount() > 0) {
        printCard(DASHBOARD_USERS, $max_users_status['id']);
    }

    $select_stmt = $db->prepare("SELECT id FROM xucp_blog ORDER by id DESC LIMIT 1");
    $select_stmt->execute();
    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
    if ($select_stmt->rowCount() > 0) {
        printCard(DASHBOARD_BLOG, $row['id']);
    }

    $select_stmt = $db->prepare("SELECT id FROM xucp_support ORDER by id DESC LIMIT 1");
    $select_stmt->execute();
    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
    if ($select_stmt->rowCount() > 0) {
        printCard(DASHBOARD_SUPPORT, $row['id']);
    }
}

echo "</div>";

$select_stmt = $db->prepare("SELECT * FROM xucp_news");
$select_stmt->execute();
$row=$select_stmt->fetch(PDO::FETCH_ASSOC);

if($select_stmt->rowCount() > 0){
    $title_field = "title";
    $content_field = "content";
    if(isset($_SESSION['xucp_free']['secure_lang']) && $_SESSION['xucp_free']['secure_lang'] == 'de'){
        $title_field = "title_de";
        $content_field = "content_de";
    }
    $id = $row['id'];
    $title = $row[$title_field];
    $content = $row[$content_field];
    $short_content = substr($content, 0, 600);

    echo "
      <div class='col-lg-12'>
         <div class='card xucp-card'>
            <div class='card-header d-flex justify-content-between flex-wrap'>
               <div class='header-title'>
                  <h4 class='card-title'>
                    <svg width='32' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>                                    
						<path d='M15.7161 16.2234H8.49609' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
						<path d='M15.7161 12.0369H8.49609' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
						<path d='M11.2521 7.86011H8.49707' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
						<path fill-rule='evenodd' clip-rule='evenodd' d='M15.909 2.74976C15.909 2.74976 8.23198 2.75376 8.21998 2.75376C5.45998 2.77076 3.75098 4.58676 3.75098 7.35676V16.5528C3.75098 19.3368 5.47298 21.1598 8.25698 21.1598C8.25698 21.1598 15.933 21.1568 15.946 21.1568C18.706 21.1398 20.416 19.3228 20.416 16.5528V7.35676C20.416 4.57276 18.693 2.74976 15.909 2.74976Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                
					</svg>
                    ".NEWS." ".$title."
                  </h4>
                  <hr class='hr-horizontal'>                         
               </div>   
            </div>
            <div class='card-body'>
               <div class='d-flex flex-wrap align-items-center justify-content-between'>
                    <p>";
                    $parser = new xUCP_BBCode_Parser();    

                    $htmlText = $parser->parse($short_content);
                    
                    echo $htmlText;
echo "                    
                    </p>
               </div>
            </div>
         </div>
      </div>";
}
$user->xucp_footer_logged();
