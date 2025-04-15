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
class xUCP_MyWhitelist
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function processRequest()
    {
        if (isset($_REQUEST['xucp_myaddwl'])) {
            $ucpname    = $this->sanitizeInput($_REQUEST['xucp_ucpname']);
            $charname   = $this->sanitizeInput($_REQUEST['xucp_charname']);
            $charstory  = $this->sanitizeInput($_REQUEST['xucp_charstory']);
            $fragen = array_map(array($this, 'sanitizeInput'), $_REQUEST);

            if (empty($ucpname) || empty($charname) || empty($charstory)) {
                $errorMsg[] = MYWHITELIST_STATUS_4;
            } else {
                try {
                    $insert_stmt = $this->db->prepare("INSERT INTO xucp_whitelist (ucpname, charname, charstory, frage1, frage2, frage3, frage4, frage5, frage6, frage7, frage8, frage9, frage10, frage11, frage12) VALUES
                                                                (:xucp_ucpname,:xucp_charname,:xucp_charstory,:xucp_frage1,:xucp_frage2,:xucp_frage3,:xucp_frage4,:xucp_frage5,:xucp_frage6,:xucp_frage7,:xucp_frage8,:xucp_frage9,:xucp_frage10,:xucp_frage11,:xucp_frage12)");

                    if ($insert_stmt->execute(array(
                        ':xucp_ucpname' => $ucpname,
                        ':xucp_charname' => $charname,
                        ':xucp_charstory' => $charstory,
                        ':xucp_frage1' => $fragen['xucp_frage1'],
                        ':xucp_frage2' => $fragen['xucp_frage2'],
                        ':xucp_frage3' => $fragen['xucp_frage3'],
                        ':xucp_frage4' => $fragen['xucp_frage4'],
                        ':xucp_frage5' => $fragen['xucp_frage5'],
                        ':xucp_frage6' => $fragen['xucp_frage6'],
                        ':xucp_frage7' => $fragen['xucp_frage7'],
                        ':xucp_frage8' => $fragen['xucp_frage8'],
                        ':xucp_frage9' => $fragen['xucp_frage9'],
                        ':xucp_frage10' => $fragen['xucp_frage10'],
                        ':xucp_frage11' => $fragen['xucp_frage11'],
                        ':xucp_frage12' => $fragen['xucp_frage12']
                    ))) {
                        $registerMsg = MYWHITELIST_STATUS_3;
                    }
                } catch (PDOException $e) {
                    $errorMsg[] = "Database error: " . $e->getMessage();
                }
            }
        }

        if (isset($errorMsg)) {
            foreach ($errorMsg as $error) {
                echo "
                    <div class='row'>
                        <div class='col-xl-12'>
                            <div class='card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>" . MYWHITELIST_HEADER . "</h4>
                                    <p class='card-title-desc'>" . MYWHITELIST_STATUS_5 . "<br>" . MYWHITELIST_STATUS_6 . "</p>
                                </div>
                                <div class='card-body'>   
                                    " . $error . "
                                </div>
                            </div>
                        </div>
                    </div>";
            }
        }

        if (isset($registerMsg)) {
            echo "
                    <div class='row'>
                        <div class='col-xl-12'>
                            <div class='card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>" . MYWHITELIST_HEADER . "</h4>
                                </div>
                                <div class='card-body'>   
                                    " . $registerMsg . "
                                </div>
                            </div>
                        </div>
                    </div>";
        }
    }

    private function sanitizeInput($input)
    {
        return htmlspecialchars(strip_tags($input), ENT_QUOTES, 'UTF-8');
    }
}