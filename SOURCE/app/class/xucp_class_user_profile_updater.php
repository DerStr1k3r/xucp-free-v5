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
class xUCP_UserProfileUpdater {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function handleFormSubmission() {
        if (isset($_POST['xucp_submit'])) {
            $this->updateUserProfile();
        }
    }

    private function updateUserProfile() {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start([
                'cookie_lifetime' => 0,
                'cookie_httponly' => true,
                'use_strict_mode' => true,
                'use_only_cookies' => true,
                'cookie_secure' => isset($_SERVER['HTTPS']),
            ]);
        }
        $userId = $_SESSION['xucp_free']['secure_first'];
        $newData = [
            'email' => filter_input(INPUT_POST, 'xucp_email', FILTER_SANITIZE_EMAIL),
            'password' => filter_input(INPUT_POST, 'xucp_password', FILTER_DEFAULT),
            'userhp' => filter_input(INPUT_POST, 'xucp_userhp', FILTER_SANITIZE_SPECIAL_CHARS),
            'userava' => filter_input(INPUT_POST, 'xucp_userava', FILTER_SANITIZE_SPECIAL_CHARS),
            'language' => filter_input(INPUT_POST, 'xucp_language', FILTER_SANITIZE_SPECIAL_CHARS),
            'usersig' => strip_tags($_REQUEST['xucp_usersig']),
            'userdiscordtag' => filter_input(INPUT_POST, 'xucp_userdiscordtag', FILTER_SANITIZE_SPECIAL_CHARS),
        ];

        $user = new xUCP_User($this->db);
        $user->updateUser($userId, $newData);

        $this->displaySuccessMessage();
    }

    private function displaySuccessMessage() {
        echo "
        <div class='col-lg-12'>
            <div class='card xucp-card'>
                <div class='card-header d-flex justify-content-between flex-wrap'>
                    <div class='header-title'>
                        <h4 class='card-title'>
                            <svg width='32' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>                                    
                                <path d='M14.3955 9.59497L9.60352 14.387' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
                                <path d='M14.3971 14.3898L9.60107 9.59277' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
                                <path fill-rule='evenodd' clip-rule='evenodd' d='M16.3345 2.75024H7.66549C4.64449 2.75024 2.75049 4.88924 2.75049 7.91624V16.0842C2.75049 19.1112 4.63549 21.2502 7.66549 21.2502H16.3335C19.3645 21.2502 21.2505 19.1112 21.2505 16.0842V7.91624C21.2505 4.88924 19.3645 2.75024 16.3345 2.75024Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                
                            </svg>
                            " . USER_PROFILE_CHANGE . "
                        </h4>
                        <hr class='hr-horizontal'>                         
                    </div>   
                </div>
                <div class='card-body'>
                    <div class='d-flex flex-wrap align-items-center justify-content-between'>
                        <p>" . MSG_8 . "</p>
                    </div>
                </div>
            </div>
        </div>";
    }
}