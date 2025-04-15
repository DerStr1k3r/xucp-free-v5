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
$user->xucp_header_logged(USER_PROFILE_CHANGE);
$user->xucp_content_logged();

$profileUpdater = new xUCP_UserProfileUpdater($db);
$profileUpdater->handleFormSubmission();

$select_stmt = $db->prepare("SELECT * FROM xucp_accounts WHERE id = :id");
$select_stmt->bindParam(':id', $_SESSION['xucp_free']['secure_first']);
$select_stmt->execute();
$user_data = $select_stmt->fetch(PDO::FETCH_ASSOC);

if ($select_stmt->rowCount() > 0) {
    $avatar = htmlentities($user_data['userava'], ENT_QUOTES, 'UTF-8');
    $username = htmlentities($user_data['username'], ENT_QUOTES, 'UTF-8');
    $usersig = htmlentities($user_data['usersig'], ENT_QUOTES, 'UTF-8');
    $email = htmlentities($user_data['email'], ENT_QUOTES, 'UTF-8');
    $userhp = htmlentities($user_data['userhp'], ENT_QUOTES, 'UTF-8');
    $userdiscordtag = htmlentities($user_data['userdiscordtag'], ENT_QUOTES, 'UTF-8');
    $ban = htmlentities($user_data['ban'], ENT_QUOTES, 'UTF-8');
    $banReason = htmlentities($user_data['banReason'], ENT_QUOTES, 'UTF-8');
    $whitelisted = htmlentities($user_data['whitelisted'], ENT_QUOTES, 'UTF-8');

    $parser = new xUCP_BBCode_Parser();
    $htmlText = $parser->parse($usersig, ENT_QUOTES, 'UTF-8');
    $bbcodeEditor = new xUCP_BBCode_Editor();

    echo "
    <div class='row'>
        <div class='col-xl-9 col-lg-8'>
            <div class='card xucp-card'>
                <div class='card-body'>
                    <div class='row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2'>
                        <div class='col-sm order-2 order-sm-1'>
                            <div class='d-flex align-items-start mt-3 mt-sm-0'>
                                <div class='flex-shrink-0'>
                                    <div class='me-3'>
                                        <img src='$avatar' alt='' class='rounded-circle p-1 bg-dark'>
                                    </div>
                                </div>
                                <div class='flex-grow-1'>
                                    <div>
                                        <h1 class='font-size-24 mb-1'>$username</h1>
                                    </div>
                                    <hr class='hr-horizontal'>
                                    <br /><br />
                                    <ul class='nav nav-pills mb-3 xucp-nav xucp-bg-dark' role='tablist'>
                                        <li class='nav-item nav-xucp-item'>
                                            <a class='nav-link px-3 active' data-bs-toggle='tab' href='#overview' role='tab'>
                                                <div class='d-flex align-items-center'>
                                                    <div class='tab-icon'><i class='bx bx-home font-18 me-1'></i></div>   
                                                    <div class='tab-title'>" . PROFILE_ABOUT . "</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class='nav-item nav-xucp-item'>
                                            <a class='nav-link px-3' data-bs-toggle='tab' href='#wl-status' role='tab'>
                                                <div class='d-flex align-items-center'>
                                                    <div class='tab-icon'><i class='bx bx-server font-18 me-1'></i></div>   
                                                    <div class='tab-title'>" . PROFILE_WHITELIST . "</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class='nav-item nav-xucp-item'>
                                            <a class='nav-link px-3' data-bs-toggle='tab' href='#settings' role='tab'>
                                                <div class='d-flex align-items-center'>
                                                    <div class='tab-icon'><i class='bx bx-user-pin font-18 me-1'></i></div>   
                                                    <div class='tab-title'>" . PROFILE_SETTINGS . "</div>
                                                </div>
                                            </a>
                                        </li>                                                                                
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class='tab-content'>
                <div class='tab-pane fade show active' id='overview' role='tabpanel'>
                    <div class='card xucp-card'>
                        <div class='card-header'>
                            <h5 class='card-title mb-0'>
                                <i class='bx bx-home font-18 me-1'></i>
                                " . PROFILE_ABOUT . "
                            </h5>
                            <hr class='hr-horizontal'>
                        </div>
                        <div class='card-body'>
                            <div>
                                <div class='pb-3'>
                                    <div class='row'>
                                        <div class='col-xl-2'>
                                            <div>
                                                <h5 class='font-size-15'>" . SIGNATUR . " :</h5>
                                            </div>
                                        </div>
                                        <div class='col-xl'>
                                            <div class='text-muted'>
                                                <p class='mb-2'>$htmlText</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='tab-pane fade show' id='wl-status' role='tabpanel'>
                    <div class='card xucp-card'>
                        <div class='card-header'>
                            <h5 class='card-title mb-0'>
                                <i class='bx bx-server font-32 me-1'></i>
                                " . PROFILE_WHITELIST . "
                            </h5>
                            <hr class='hr-horizontal'>
                        </div>
                        <div class='card-body'>
                            <div>
                                <div class='pb-3'>
                                    <div class='row'>
                                        <div class='col-xl-2'>
                                            <div>
                                                <h5 class='font-size-15'>" . PROFILE_WHITELIST_SUB . ":</h5>
                                            </div>
                                        </div>
                                        <div class='col-xl'>";
                                        if ($whitelisted == 0) {
                                            echo "
                                            <div class='text-muted'>
                                                <p class='mb-2'>" . MYWHITELIST_STATUS_2 . "</p>
                                            </div>";
                                        } else {
                                            echo "
                                            <div class='text-muted'>
                                                <p class='mb-2'>" . MYWHITELIST_STATUS . "</p>
                                            </div>";
                                        }
                                        echo "
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
                <div class='tab-pane fade' id='settings' role='tabpanel'>
                    <div class='card xucp-card'>
                        <div class='card-header'>
                            <h5 class='card-title mb-0'>
                                <i class='bx bx-user-pin font-32 me-1'></i>
                                " . PROFILE_SETTINGS . "
                            </h5>
                            <hr class='hr-horizontal'>
                        </div>
                        <div class='card-body'>
                            <div>
                                <div class='pb-3'>
                                    <div class='text-muted'>
                                        <form class='card' action='" . $_SERVER['PHP_SELF'] . "' method='post' enctype='multipart/form-data'>
                                            <div class='card-body'>
                                                <div class='row gy-4'>
                                                    <div class='col-sm-6'>
                                                        <label class='form-label'>" . EMAIL . "</label>
                                                        <input class='form-control' type='text' name='xucp_email' placeholder='" . EMAIL . "' value='$email' required>
                                                    </div>
                                                    <div class='col-sm-6'>
                                                        <label class='form-label'>" . PASSWORD . "</label>
                                                        <input class='form-control' type='password' name='xucp_password' placeholder='" . PASSWORD . "' required>
                                                    </div>
                                                    <div class='col-md-12'>
                                                        <label class='form-label'>" . PROFILE_PORTFOLIO_WEBSITE . "</label>
                                                        <input class='form-control' type='text' name='xucp_userhp' placeholder='" . PROFILE_PORTFOLIO_WEBSITE . "' value='$userhp' required>
                                                    </div>	
                                                    <div class='col-md-12'>
                                                        <label class='form-label'>" . PROFILE_PORTFOLIO_DISCORDTAG . "</label>
                                                        <input class='form-control' type='text' name='xucp_userdiscordtag' placeholder='" . PROFILE_PORTFOLIO_DISCORDTAG . "' value='$userdiscordtag' required>
                                                    </div>																		
                                                    <div class='col-md-12'>
                                                        <label class='form-label'>" . LANGUAGE . "</label>
                                                        <div class='bootstrap-select form-control show-tick'>
                                                            <select name='xucp_language' class='form-control show-tick' required>
                                                                <option value=''>-- " . CHANGE_MY_PROFILE_LANGUAGENOTE . " --</option>
                                                                <option value='en'>" . CHANGE_MY_PROFILE_LANGUAGE_SELECT_EN . "</option>
                                                                <option value='de'>" . CHANGE_MY_PROFILE_LANGUAGE_SELECT_DE . "</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class='col-md-12'>
                                                        <label class='form-label'>" . AVATAR . "</label>
                                                        <input class='form-control' type='text' name='xucp_userava' placeholder='" . AVATAR . "' value='$avatar'>
                                                    </div>									
                                                    <div class='col-md-12'>
                                                        <label class='form-label'>" . SIGNATUR . "</label>";
                                                    echo $bbcodeEditor->xucp_text_bbcode("xucp_usersig", $usersig);
    echo "
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='card-footer text-end'>
                                                <input type='submit' name='xucp_submit' class='btn btn-primary w-100 waves-effect waves-light' value='" . MYPROFILESAVE . "'>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='col-xl-3 col-lg-4'>
            <div class='card xucp-card'>
                <div class='card-body'>
                    <h5 class='card-title mb-3'>" . PROFILE_PORTFOLIO . "</h5>
                    <hr class='hr-horizontal'>
                    <div class='d-flex align-items-center mb-3'>
                        <a href='$userhp' class='d-flex align-items-center mb-6'>
                            <div class='d-flex align-items-center'>
                                <div class='avatar-sm flex-shrink-0 me-3'>
                                    <img src='/public/images/profile-32x32.png' alt='' class='rounded-circle p-1 bg-dark'>
                                </div>
                                <div class='flex-grow-1'>
                                    <div>
                                        <h5 class='font-size-14 mb-1'>" . PROFILE_PORTFOLIO_WEBSITE . "</h5>
                                        <p class='font-size-13 text-muted mb-0'>$userhp</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class='card xucp-card'>
                <div class='card-body'>
                    <h5 class='card-title mb-3'>" . PROFILE_PORTFOLIO_DISCORDTAG . "</h5>
                    <hr class='hr-horizontal'>
                    <div class='d-flex align-items-center mb-3'>
                        <a href='#' class='d-flex align-items-center mb-6'>
                            <div class='d-flex align-items-center'>
                                <div class='avatar-sm flex-shrink-0 me-3'>
                                    <img src='/public/images/profile-32x32.png' alt='' class='rounded-circle p-1 bg-dark'>
                                </div>
                                <div class='flex-grow-1'>
                                    <div>
                                        <h5 class='font-size-14 mb-1'>$username</h5>
                                        <p class='font-size-13 text-muted mb-0'>$userdiscordtag</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class='card xucp-card'>
                <div class='card-body'>
                    <h5 class='card-title mb-3'>" . PROFILE_BANNED . "</h5>
                    <hr class='hr-horizontal'>
                    <div class='d-flex align-items-center mb-3'>";
                    if ($ban == 1) {
                        echo "
                        <a href='#' class='d-flex align-items-center mb-6'>
                            <div class='d-flex align-items-center'>
                                <div class='avatar-sm flex-shrink-0 me-3'>
                                    <img src='/public/images/profile-32x32.png' alt='' class='rounded-circle p-1 bg-dark'>
                                </div>
                                <div class='flex-grow-1'>
                                    <div>
                                        <h5 class='font-size-14 mb-1'>" . PROFILE_BANNED_YES . "</h5>
                                        <p class='font-size-13 text-muted mb-0'>$banReason</p>
                                    </div>
                                </div>
                            </div>
                        </a>";
                    } else {
                        echo "
                        <a href='#' class='d-flex align-items-center mb-6'>
                            <div class='d-flex align-items-center'>
                                <div class='avatar-sm flex-shrink-0 me-3'>
                                    <img src='/public/images/profile-32x32.png' alt='' class='rounded-circle p-1 bg-dark'>
                                </div>
                                <div class='flex-grow-1'>
                                    <div>
                                        <h5 class='font-size-14 mb-1'>" . PROFILE_BANNED_NO . "</h5>
                                        <p class='font-size-13 text-muted mb-0'>" . PROFILE_BANNED_INFO . "</p>
                                    </div>
                                </div>
                            </div>
                        </a>";
                    }
                    echo "
                    </div>
                </div>
            </div>
        </div>
    </div>";
}

$user = new xUCP_Themes($db);
$user->xucp_footer_logged();