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
global $db;
include_once(dirname(__FILE__) . "/../../../../app/system.php");

$user = new xUCP_User($db);
if (!$user->isLoggedIn()) {
    header('Location: /index');
    exit;
}

$user = new xUCP_Themes($db);
$user->xucp_header_logged(BLOG_HEADER);
$user->xucp_content_logged();

// Prepare and execute the SQL query
$select_stmt = $db->prepare("SELECT * FROM xucp_blog WHERE id LIKE ?");
$select_stmt->execute(array("%$query%"));

// Fetch and display the blog posts
while($blog_status = $select_stmt->fetch()) {
    // Extract and escape variables
    $title = htmlentities($blog_status['title'], ENT_QUOTES, 'UTF-8');
    $created_at = htmlentities($blog_status['created_at'], ENT_QUOTES, 'UTF-8');
    $id = $blog_status['id'];
    $description = $blog_status['description'];

    // Parse the blog description
    $parser = new xUCP_BBCode_Parser();
    $htmlText = $parser->parse($description);

    // Determine if user has sufficient privileges
    $is_staff = intval($_SESSION['xucp_free']['secure_staff']) >= UC_CLASS_SUPPORTER;

    // Output the HTML
    echo "
    <div class='grid-cols-6'>
        <div class='card xucp-card'>
            <div class='card-body'>
                <div class='d-flex align-items-center'>
                    <div>
                        <p class='mb-0'>
                            <svg width='32' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                <path fill-rule='evenodd' clip-rule='evenodd' d='M3 6.5C3 3.87479 3.02811 3 6.5 3C9.97189 3 10 3.87479 10 6.5C10 9.12521 10.0111 10 6.5 10C2.98893 10 3 9.12521 3 6.5Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                                <path fill-rule='evenodd' clip-rule='evenodd' d='M14 6.5C14 3.87479 14.0281 3 17.5 3C20.9719 3 21 3.87479 21 6.5C21 9.12521 21.0111 10 17.5 10C13.9889 10 14 9.12521 14 6.5Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                                <path fill-rule='evenodd' clip-rule='evenodd' d='M3 17.5C3 14.8748 3.02811 14 6.5 14C9.97189 14 10 14.8748 10 17.5C10 20.1252 10.0111 21 6.5 21C2.98893 21 3 20.1252 3 17.5Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                                <path fill-rule='evenodd' clip-rule='evenodd' d='M14 17.5C14 14.8748 14.0281 14 17.5 14C20.9719 14 21 14.8748 21 17.5C21 20.1252 21.0111 21 17.5 21C13.9889 21 14 20.1252 14 17.5Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>
                            </svg>
                            $title
                            <hr class='hr-horizontal'>
                        </p>
                        <div class='pt-3'>
                            <div class='pt-1'>
                                <img src='/public/images/blog-entry.png' alt='' class='img-fluid shadow'>
                                <p class='mb-0 font-size-14'>
                                    $htmlText
                                </p>
                                <p class='text-muted mb-2'>$created_at</p>
                                <div class='d-grid'>";
    if ($is_staff) {
        echo "
                                    <a href='/vendor/backend/staff/blog/index' class='btn btn-primary mt-3'>".BLOG_HEADER_2."</a>";
    }
    echo "
                                    <a href='/vendor/backend/user/blog/index-details?id=$id' class='btn btn-primary mt-3'>".BLOG_DETAILS." <i class='mdi mdi-chevron-right'></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>";
}
$user->xucp_footer_logged();