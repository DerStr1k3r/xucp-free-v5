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
class xUCP_System {

    // Checking Language System
    public function xucp_secure_lang(): void
    {
        global $db;
    
        // Check if secure_lang parameter is set and not empty
        if (isset($_GET['secure_lang']) && !empty($_GET['secure_lang'])) {
            $_SESSION['xucp_free']['secure_lang'] = $_GET['secure_lang'];
    
            // Check if session variable secure_lang is set and different from $_GET['secure_lang']
            if (isset($_SESSION['xucp_free']['secure_lang']) && $_SESSION['xucp_free']['secure_lang'] !== $_GET['secure_lang']) {
                echo "<script type='text/javascript'> location.reload(); </script>";
                exit; // Exit to prevent further execution
            }
        }
    
        // Include Language file
        $langFileName = '';
        if (isset($_SESSION['xucp_free']['secure_lang'])) {
            $select_stmt = $db->prepare("SELECT language FROM xucp_accounts WHERE id = :secure_first");
            $select_stmt->bindValue(':secure_first', $_SESSION['xucp_free']['secure_first'], PDO::PARAM_INT);
            $select_stmt->execute();
            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($row && $select_stmt->rowCount() > 0) {
                $langFileName = "lang_" . htmlentities($row['language'], ENT_QUOTES, 'UTF-8');
            }
        }
    
        // If no language file found from session, use site_settings_lang
        if (empty($langFileName)) {
            $langFileName = "lang_" . $_SESSION['xucp_free']['site_settings_lang'];
        }
    
        // Include language file
        include(dirname(__FILE__) . "/../language/" . $langFileName . ".php");
    }
    
    // Checking Session Site System
    public function xucp_session_site(): void
    {
        global $db;
        
        $query = "
                SELECT 
                    site_dl_section, 
                    site_rage_section, 
                    site_altv_section, 
                    site_fivem_section, 
                    site_redm_section, 
                    site_online, 
                    site_name, 
                    site_lang, 
                    site_teamspeak, 
                    site_gserverport, 
                    site_gserverip, 
                    site_gservername,
                    site_upgrade_note 
                FROM 
                    xucp_config 
                WHERE 
                    id = 1
        ";
        
        try {
            $stmt = $db->prepare($query);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
            if ($row) {
                $_SESSION['xucp_free']['site_settings_site_online'] = htmlspecialchars($row['site_online'] ?? '');
                $_SESSION['xucp_free']['site_settings_site_name'] = htmlspecialchars($row['site_name'] ?? '');
                $_SESSION['xucp_free']['site_settings_lang'] = htmlspecialchars($row['site_lang'] ?? '');
                $_SESSION['xucp_free']['site_settings_dl_section'] = htmlspecialchars($row['site_dl_section'] ?? '');
                $_SESSION['xucp_free']['site_settings_dl_section_ragemp'] = htmlspecialchars($row['site_rage_section'] ?? '');
                $_SESSION['xucp_free']['site_settings_dl_section_altv'] = htmlspecialchars($row['site_altv_section'] ?? '');
                $_SESSION['xucp_free']['site_settings_dl_section_fivem'] = htmlspecialchars($row['site_fivem_section'] ?? '');
                $_SESSION['xucp_free']['site_settings_dl_section_redm'] = htmlspecialchars($row['site_redm_section'] ?? '');
                $_SESSION['xucp_free']['site_settings_teamspeak'] = htmlspecialchars($row['site_teamspeak'] ?? '');
                $_SESSION['xucp_free']['site_settings_gserver_port'] = htmlspecialchars($row['site_gserverport'] ?? '');
                $_SESSION['xucp_free']['site_settings_gserver_ip'] = htmlspecialchars($row['site_gserverip'] ?? '');
                $_SESSION['xucp_free']['site_settings_gserver_name'] = htmlspecialchars($row['site_gservername'] ?? '');
                $_SESSION['xucp_free']['site_upgrade_note'] = htmlspecialchars($row['site_upgrade_note'] ?? '');
                }
        } catch (PDOException $e) {
            // Log the error or handle it appropriately
            error_log($e->getMessage());
            // Optionally, you can also throw the exception to be handled by the caller
            throw new Exception("Database query failed: " . $e->getMessage());
        }
    }        
}