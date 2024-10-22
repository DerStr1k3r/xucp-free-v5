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
class xUCP_MailSystem {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function processForm() {
        if (isset($_POST['message'])) {
            try {
                $select_stmt = $this->db->prepare("SELECT * FROM xucp_accounts");
                $select_stmt->execute();
                $norep = $select_stmt->fetch(PDO::FETCH_ASSOC);

                if ($select_stmt->rowCount() > 0) {
                    $subject = isset($_POST['subject']) ? substr(htmlspecialchars(stripslashes($_POST['subject'])), 0, 80) : "";
                    if (empty($subject)) {
                        $subject = "(No subject)";
                    }
                    $subject = "Fw: $subject";

                    $message = htmlspecialchars(stripslashes($_POST['message']));
                    $to = $norep["email"];

                    $formatted_message = sprintf(
                        "%s %s %s %s.\n%s\n---------------------------------------------------------------------\n\n%s%s\n\n---------------------------------------------------------------------\n\nPowered by xUCP Free V5\n\n---------------------------------------------------------------------\n\n",
                        EMAIL_SYSTEM_NOTE2,
                        $_SESSION['username']['site_settings_site_name'],
                        EMAIL_SYSTEM_NOTE3,
                        date("Y-m-d H:i:s"),
                        EMAIL_SYSTEM_NOTE1,
                        $message,
                        htmlspecialchars(stripslashes($_POST['message']))
                    );

                    $headers = "From: " . SITE_EMAIL;
                    $success = mail($to, $subject, $formatted_message, $headers, "-f " . SITE_EMAIL);

                    if ($success) {
                        echo "
                        <div class='row'>
                            <div class='col-xl-12'>
                                <div class='card xucp-card'>
                                    <div class='card-header'>
                                        <h4 class='card-title'>
                                            <svg width='32' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>                                    
                                                <path d='M17.9028 8.85107L13.4596 12.4641C12.6201 13.1301 11.4389 13.1301 10.5994 12.4641L6.11865 8.85107' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                    
                                                <path fill-rule='evenodd' clip-rule='evenodd' d='M16.9089 21C19.9502 21.0084 22 18.5095 22 15.4384V8.57001C22 5.49883 19.9502 3 16.9089 3H7.09114C4.04979 3 2 5.49883 2 8.57001V15.4384C2 18.5095 4.04979 21.0084 7.09114 21H16.9089Z' stroke='currentColor' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path>                                
                                            </svg>
                                            " . EMAIL_SYSTEM_HEADER . "
                                        </h4>
                                        <hr class='hr-horizontal'>
                                    </div>
                                    <div class='card-body'>
                                        " . EMAIL_SYSTEM_INFO . "
                                    </div>
                                </div>
                            </div>
                        </div>";
                    } else {
                        echo "<div class='alert alert-danger'>E-Mail konnte nicht gesendet werden.</div>";
                    }
                } else {
                    echo "<div class='alert alert-warning'>Keine E-Mail-Adresse gefunden.</div>";
                }
            } catch (Exception $e) {
                echo "<div class='alert alert-danger'>Ein Fehler ist aufgetreten: " . $e->getMessage() . "</div>";
            }
        }
    }
}