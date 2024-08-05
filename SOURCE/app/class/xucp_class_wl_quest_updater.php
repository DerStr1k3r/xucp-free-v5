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
class xUCP_Whitelist_Question_Updater
{
    private $db;
    private $errorMsg = [];
    private $doneMsg;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function processRequest()
    {
        if (isset($_REQUEST['xucp_submit'])) {
            $xucp_uid = 1;
            $keys = [];

            for ($i = 1; $i <= 12; $i++) {
                $keys[$i] = strip_tags($_REQUEST["xucp_key$i"]);
            }

            for ($i = 1; $i <= 12; $i++) {
                if (empty($keys[$i])) {
                    $this->errorMsg[] = MSG_19;
                    return;
                }
            }

            $this->updateConfig($xucp_uid, $keys);
        }

        $this->displayMessages();
    }

    private function updateConfig($xucp_uid, $keys)
    {
        try {
            if (empty($this->errorMsg)) {
                $stmt = $this->db->prepare("
                    UPDATE `xucp_config`
                    SET `frage1` = :xucp_key1, `frage2` = :xucp_key2, `frage3` = :xucp_key3, 
                        `frage4` = :xucp_key4, `frage5` = :xucp_key5, `frage6` = :xucp_key6, 
                        `frage7` = :xucp_key7, `frage8` = :xucp_key8, `frage9` = :xucp_key9, 
                        `frage10` = :xucp_key10, `frage11` = :xucp_key11, `frage12` = :xucp_key12 
                    WHERE `id` = :xucp_uid
                ");

                $params = [':xucp_uid' => $xucp_uid];
                for ($i = 1; $i <= 12; $i++) {
                    $params[":xucp_key$i"] = $keys[$i];
                }

                if ($stmt->execute($params)) {
                    $this->doneMsg = FRAGEDONE;
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    private function displayMessages()
    {
        if (!empty($this->errorMsg)) {
            foreach ($this->errorMsg as $error) {
                echo $this->renderMessage(FRAGE_HEADER, $error);
            }
        }

        if ($this->doneMsg) {
            echo $this->renderMessage(FRAGE_HEADER, $this->doneMsg);
        }
    }

    private function renderMessage($header, $message)
    {
        return "
            <div class='row'>
                <div class='col-xl-12'>
                    <div class='card xucp-card'>
                        <div class='card-header'>
                            <h4 class='card-title'>$header</h4>
                        </div>
                        <div class='card-body'>
                            $message
                        </div>
                    </div>
                </div>
            </div>";
    }
}