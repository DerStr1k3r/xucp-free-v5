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
$user->xucp_header_logged(BLOG_HEADER);
$user->xucp_content_logged();

$id = $_GET['id'];

$select_stmt = $db->prepare("SELECT * FROM xucp_blog WHERE id = :id");
$select_stmt->bindParam(':id', $id, PDO::PARAM_INT);
$select_stmt->execute();
$row = $select_stmt->fetch(PDO::FETCH_ASSOC);

if ($select_stmt->rowCount() > 0) {
    echo "
    <div class='row'>
        <div class='col-lg-12'>
            <div class='card xucp-card'>
                <div class='card-header d-flex justify-content-between flex-wrap'>
                    <div class='header-title'>
                        <h4 class='card-title'>
                            <svg width='32' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>                                    
                                <path fill-rule='evenodd' clip-rule='evenodd' d='M3 6.5C3 3.87479 3.02811 3 6.5 3C9.97189 3 10 3.87479 10 6.5C10 9.12521 10.0111 10 6.5 10C2.98893 10 3 9.12521 3 6.5Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
                                <path fill-rule='evenodd' clip-rule='evenodd' d='M14 6.5C14 3.87479 14.0281 3 17.5 3C20.9719 3 21 3.87479 21 6.5C21 9.12521 21.0111 10 17.5 10C13.9889 10 14 9.12521 14 6.5Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
                                <path fill-rule='evenodd' clip-rule='evenodd' d='M3 17.5C3 14.8748 3.02811 14 6.5 14C9.97189 14 10 14.8748 10 17.5C10 20.1252 10.0111 21 6.5 21C2.98893 21 3 20.1252 3 17.5Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
                                <path fill-rule='evenodd' clip-rule='evenodd' d='M14 17.5C14 14.8748 14.0281 14 17.5 14C20.9719 14 21 14.8748 21 17.5C21 20.1252 21.0111 21 17.5 21C13.9889 21 14 20.1252 14 17.5Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                
                            </svg>
                            {$row['title']}
                        </h4>    
                        <hr class='hr-horizontal'>
                    </div>                         
                </div>
                <div class='card-body'>
                    <div>
                        <div class='mb-4'>
                            <img src='/public/images/xucp-blogger.png' alt='' class='img-fluid rounded-circle shadow mx-auto d-block'>
                        </div>
                        <div class='text-center'>
                            <div class='row'>
                                <div class='col-sm-4'>
                                    <div>
                                        <h6 class='mb-2'>".BLOG_ID."</h6>
                                        <p class='text-muted font-size-15'>{$row['id']}</p>
                                    </div>
                                </div>
                                <div class='col-sm-4'>
                                    <div class='mt-4 mt-sm-0'>
                                        <h6 class='mb-2'>".BLOG_DATE."</h6>
                                        <p class='text-muted font-size-15'>{$row['created_at']}</p>
                                    </div>
                                </div>
                                <div class='col-sm-4'>
                                    <div class='mt-4 mt-sm-0'>
                                        <p class='mb-2'>".BLOG_BY."</p>";

    $select_stmt = $db->prepare("SELECT * FROM xucp_accounts WHERE id = :user_id");
    $select_stmt->bindParam(':user_id', $row['user_id'], PDO::PARAM_INT);
    $select_stmt->execute();
    $blog_user = $select_stmt->fetch(PDO::FETCH_ASSOC);

    if ($select_stmt->rowCount() > 0) {
        echo "
                                        <h5 class='text-muted font-size-12'>{$blog_user['username']}</h5>";
    }
    echo "
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class='hr-horizontal'>
                        <div class='mt-4'>
                            <div class='text-muted font-size-14'>";
    
    $parser = new xUCP_BBCode_Parser();
    $htmlText = $parser->parse($row['description']);
    echo $htmlText;
    
    echo "
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>";
}

$user->xucp_footer_logged();