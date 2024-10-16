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

        try {
        // Prepare statement to select site configuration
            $select_stmt = $db->prepare(
                "SELECT site_dl_section, site_rage_section, site_altv_section, site_fivem_section, 
                    site_redm_section, site_online, site_name, site_themes, site_lang, 
                    site_teamspeak, site_gserverport, site_gserverip, site_gservername, 
                    site_upgrade_note 
                FROM xucp_config 
                WHERE id = 1"
            );

            // Execute statement
            $select_stmt->execute();
            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

            // Check if we got a result
            if ($row !== false) {
                $site_settings = [
                'site_online'            => $row['site_online'],
                'site_name'              => $row['site_name'],
                'site_lang'              => $row['site_lang'],
                'site_themes'            => $row['site_themes'],
                'site_dl_section'        => $row['site_dl_section'],
                'site_rage_section'      => $row['site_rage_section'],
                'site_altv_section'      => $row['site_altv_section'],
                'site_fivem_section'     => $row['site_fivem_section'],
                'site_redm_section'      => $row['site_redm_section'],
                'site_teamspeak'         => $row['site_teamspeak'],
                'site_gserverport'       => $row['site_gserverport'],
                'site_gserverip'         => $row['site_gserverip'],
                'site_gservername'       => $row['site_gservername'],
                'site_upgrade_note'      => $row['site_upgrade_note']
            ];

            // Use htmlentities only where necessary (e.g., for HTML output)
            foreach ($site_settings as $key => $value) {
                $_SESSION['xucp_free']['site_settings_' . $key] = htmlentities($value, ENT_QUOTES, 'UTF-8');
            }
        }

        } catch (PDOException $e) {
            // Log the error (ensure error logging is configured properly)
            error_log("Database error: " . $e->getMessage());
        }
    }
}