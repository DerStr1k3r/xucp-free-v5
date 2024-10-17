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

    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    // Checking Session Site System
    public function xucp_session_site(): void
    {
        try {
            // Prepare statement to select site configuration
            $select_stmt = $this->db->prepare(
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
            if ($row) {
                $site_settings = [
                    'site_online'        => $row['site_online'],
                    'site_name'          => $row['site_name'],
                    'site_lang'          => $row['site_lang'],
                    'site_themes'        => $row['site_themes'],
                    'site_dl_section'    => $row['site_dl_section'],
                    'site_rage_section'  => $row['site_rage_section'],
                    'site_altv_section'  => $row['site_altv_section'],
                    'site_fivem_section' => $row['site_fivem_section'],
                    'site_redm_section'  => $row['site_redm_section'],
                    'site_teamspeak'     => $row['site_teamspeak'],
                    'site_gserverport'   => $row['site_gserverport'],
                    'site_gserverip'     => $row['site_gserverip'],
                    'site_gservername'   => $row['site_gservername'],
                    'site_upgrade_note'  => $row['site_upgrade_note']
                ];

                // Securely store site settings in session, escaping only for HTML output
                foreach ($site_settings as $key => $value) {
                    $_SESSION['xucp_free']['site_settings_' . $key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
                }
            }

        } catch (PDOException $e) {
            // Log the error (ensure error logging is configured properly)
            error_log("Database error: " . $e->getMessage());
        }
    }

    public function xucp_secure_lang(): void
    {
        // Check if 'secure_lang' parameter is set and sanitize it using htmlspecialchars to prevent XSS
        if (isset($_GET['secure_lang']) && !empty($_GET['secure_lang'])) {
            $secureLang = htmlspecialchars($_GET['secure_lang'], ENT_QUOTES, 'UTF-8');
            $_SESSION['xucp_free']['secure_lang'] = $secureLang;
    
            // Reload if session variable differs from the current 'secure_lang' value
            if ($_SESSION['xucp_free']['secure_lang'] !== $secureLang) {
                echo "<script type='text/javascript'>location.reload();</script>";
                exit; // Ensure further script execution is halted
            }
        }
    
        // Determine the language file based on session data
        $langFileName = '';
    
        // Check if secure_first is set and retrieve the user language
        if (isset($_SESSION['xucp_free']['secure_first'])) {
            try {
                $select_stmt = $this->db->prepare("SELECT language FROM xucp_accounts WHERE id = :secure_first");
                $select_stmt->bindValue(':secure_first', $_SESSION['xucp_free']['secure_first'], PDO::PARAM_INT);
    
                $select_stmt->execute();
                $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
    
                if ($row && !empty($row['language'])) {
                    $langFileName = "lang_" . htmlspecialchars($row['language'], ENT_QUOTES, 'UTF-8');
                }
            } catch (PDOException $e) {
                error_log("Database error: " . $e->getMessage());
            }
        }
    
        // Use site settings language if no specific language was found
        if (empty($langFileName) && isset($_SESSION['xucp_free']['site_settings_lang'])) {
            $langFileName = "lang_" . htmlspecialchars($_SESSION['xucp_free']['site_settings_lang'], ENT_QUOTES, 'UTF-8');
        }
    
        // Fallback to a default language if no language is set
        if (empty($langFileName)) {
            $langFileName = "lang_en"; // Default language
        }
    
        // Check if the language file exists before including it
        $langFilePath = __DIR__ . "/../language/" . $langFileName . ".php";
        if (file_exists($langFilePath)) {
            include($langFilePath);
        } else {
            error_log("Language file not found: " . $langFilePath);
            // Optionally load the default language if the file isn't found
            $defaultLangFilePath = __DIR__ . "/../language/lang_en.php";
            if (file_exists($defaultLangFilePath)) {
                include($defaultLangFilePath);
            } else {
                error_log("Default language file not found: " . $defaultLangFilePath);
            }
        }
    }        
}