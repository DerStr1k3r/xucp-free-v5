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
class xUCP_SiteConfigUpdater
{
    private $db;
    private $site_config_uid = 1;
    private array $errorMsg = [];
    private string $doneMsg = '';

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function updateConfig(array $request): void
    {
        if (!isset($request['xucp_submit'])) {
            return;
        }

        $site_online = strip_tags($request['xucp_site_online'] ?? '');
        $site_name = strip_tags($request['xucp_site_name'] ?? '');
        $site_lang = strip_tags($request['xucp_site_lang'] ?? '');
        $site_dl_section = strip_tags($request['xucp_site_dl_section'] ?? '');
        $site_rage_section = strip_tags($request['xucp_site_rage_section'] ?? '');
        $site_altv_section = strip_tags($request['xucp_site_altv_section'] ?? '');
        $site_fivem_section = strip_tags($request['xucp_site_fivem_section'] ?? '');
        $site_redm_section = strip_tags($request['xucp_site_redm_section'] ?? '');
        $site_teamspeak = strip_tags($request['xucp_site_teamspeak'] ?? '');
        $site_gservername = strip_tags($request['xucp_site_gservername'] ?? '');
        $site_gserverip = strip_tags($request['xucp_site_gserverip'] ?? '');
        $site_gserverport = strip_tags($request['xucp_site_gserverport'] ?? '');

        $this->validateFields([
            $site_online,
            $site_name,
            $site_dl_section,
            $site_teamspeak,
            $site_gservername,
            $site_gserverip,
            $site_gserverport
        ]);

        if (empty($this->errorMsg)) {
            $this->saveConfig([
                'site_online' => $site_online,
                'site_name' => $site_name,
                'site_lang' => $site_lang,
                'site_dl_section' => $site_dl_section,
                'site_rage_section' => $site_rage_section,
                'site_altv_section' => $site_altv_section,
                'site_fivem_section' => $site_fivem_section,
                'site_redm_section' => $site_redm_section,
                'site_teamspeak' => $site_teamspeak,
                'site_gservername' => $site_gservername,
                'site_gserverip' => $site_gserverip,
                'site_gserverport' => $site_gserverport
            ]);
        }

        $this->displayMessages();
    }

    private function validateFields(array $fields): void
    {
        foreach ($fields as $field) {
            if (empty($field)) {
                $this->errorMsg[] = SITE_CONFIG_ERROR;
            }
        }
    }

    private function saveConfig(array $config): void
    {
        try {
            $stmt = $this->db->prepare("UPDATE `xucp_config` SET 
                `site_online` = :site_online, 
                `site_name` = :site_name, 
                `site_dl_section` = :site_dl_section, 
                `site_rage_section` = :site_rage_section, 
                `site_altv_section` = :site_altv_section, 
                `site_fivem_section` = :site_fivem_section, 
                `site_redm_section` = :site_redm_section, 
                `site_teamspeak` = :site_teamspeak, 
                `site_gservername` = :site_gservername, 
                `site_gserverip` = :site_gserverip, 
                `site_gserverport` = :site_gserverport, 
                `site_lang` = :site_lang 
                WHERE `id` = :id");

            $stmt->execute(array_merge($config, ['id' => $this->site_config_uid]));
            $this->doneMsg = SITE_CONFIG_DONE;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    private function displayMessages(): void
    {
        if (!empty($this->errorMsg)) {
            foreach ($this->errorMsg as $error) {
                echo "
                    <div class='row'>
                        <div class='col-xl-12'>
                            <div class='card xucp-card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>" . SITE_CONFIG_HEADER . "</h4>
                                </div>
                                <div class='card-body'>
                                    $error
                                </div>
                            </div>
                        </div>
                    </div>";
            }
        }

        if (!empty($this->doneMsg)) {
            echo "
                <div class='row'>
                    <div class='col-xl-12'>
                        <div class='card xucp-card'>
                            <div class='card-header'>
                                <h4 class='card-title'>" . SITE_CONFIG_HEADER . "</h4>
                            </div>
                            <div class='card-body'>
                                $this->doneMsg
                            </div>
                        </div>
                    </div>
                </div>";
        }
    }
}