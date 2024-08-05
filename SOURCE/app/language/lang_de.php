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
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {        
	header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
	setCookie("PHPSESSID", "", 0x7fffffff,  "/");
  	session_destroy();
	die( header( 'location: /vendor/frontend/404/index', true, 0 ) );
}
const DASHBOARD = "Dashboard";
const HOME_NONE_LOGGED = "Startseite";
const USERPROFILE = "User Profil";
const USER_ACCOUNT = "Account Tools";
const USER_PROFILE_CHANGE = "User Profil bearbeiten";
const USER_SUPPORT = "Support";
const USER_TICKET_CREATE = "Tickets";
const WELCOME_TO = "Willkommen bei";
const STAFF_NEWS_ACP = "News System";
const STAFF_RULES_ACP = "Regelwerk System";
const SITE_LOGOUT = "Abmelden";
const SITE_EMAIL_NOTE = "E-Mail";
const TEAMSPEAK = "Teamspeak";
const FAQ = "FAQs";
const NEWS = "Neuigkeiten: ";
const OUR_FEATURES = "Unsere Funktionen";
const SECURE_SYSTEM = "Secure System";
const MY_CHARACTERS = "Mein Charakter";
const FROM_WL = "von";
const GSERVER_INFO_HEAD = "Client & Server";
const GSERVER_INFO_01 = "Hier in der Auflistung siehst du alle Informationen zu unseren Game Server!";
const GSERVER_INFO_02 = "F&uuml;r weitere Fragen wende dich bitte an den Support!";
const GO_TO_SITE = "Öffnen";
// ************************************************************************************//
// * My Whitelist Status Language Section - Main 
// ************************************************************************************//
const MYWHITELIST_STATUS = "Deine Whitelist ist f&uuml;r unseren Server freigegeben. Wir w&uuml;nschen dir Viel Spa&szlig; bei uns!";
const MYWHITELIST_STATUS_2 = "Du hast noch keine Whitelist gestellt bzw. deine Whitelist ist vielleicht noch in Bearbeitung! <a href='/vendor/backend/user/whitelist/index.php?mywhitelist=addwl'><button class='btn btn-secondary btn-sm waves-effect waves-light'>Zur Whitelist</button></a>";
const MYWHITELIST_STATUS_3 = "Dein Whitelist Fragebogen wurde an unser Team gesendet. Bitte warte nun ab bis du zum Teamspeak Gespr&auml;ch eingeladen wirst.";
const MYWHITELIST_STATUS_4 = "Dein Whitelist Fragebogen konnte leider nicht an unser Team gesendet werden. Wende dich Bitte an unser Support Team.";
const MYWHITELIST_STATUS_5 = "Herzlich Willkommen im Whitelist System, Nimm dir bitte ausreichend Zeit und beantworte die Fragen nach deinen eigenen Ermessen!";
const MYWHITELIST_STATUS_6 = "Bedenke: Du hast 20 Minuten Zeit um den Fragebogen abzuschicken. Nach den 5 Minuten musst du von neu beginnen!";
const MYWHITELIST_USERNAME = "Dein Benutzername";
const MYWHITELIST_CHARNAME = "Dein Charaktername";
const MYWHITELIST_STORY = "Deine Charakter Story";
const MYWHITELIST_HEADER = "Whitelist System";
// ************************************************************************************//
// * Whitelist Language Section - Main 
// ************************************************************************************//
const FRAGE1 = "Frage 1";
const FRAGE2 = "Frage 2";
const FRAGE3 = "Frage 3";
const FRAGE4 = "Frage 4";
const FRAGE5 = "Frage 5";
const FRAGE6 = "Frage 6";
const FRAGE7 = "Frage 7";
const FRAGE8 = "Frage 8";
const FRAGE9 = "Frage 9";
const FRAGE10 = "Frage 10";
const FRAGE11 = "Frage 11";
const FRAGE12 = "Frage 12";
const FRAGEDONE = "Deine Eintr&auml;ge waren erfolgreich!";
const FRAGENOTE = "Es m&uuml;ssen alle Fragen eingetragen werden!";
const FRAGEDONEBTN = "Bearbeiten";
const FRAGE_HEADER = "Whitelist Fragen";
const FRAGE_HEADER_2 = "Whitelist Bewerbungen";
const FRAGE_VIEW = "Bewerbung anschauen";
const FRAGE_SEND = "Bewerbung abschicken";
// ************************************************************************************//
// * Keyboard Section - Main 
// ************************************************************************************//
const KEY1 = "Voice Range";
const KEY2 = "LSPD Police Shield (anlegen)";
const KEY3 = "LSPD Police Shield (ablegen)";
const KEY4 = "Auto Farming";
const KEY5 = "Dimension";
const KEY6 = "Tablet";
const KEY7 = "Staatliches Aktensystem";
const KEY8 = "Animationen";
const KEY9 = "Animation Stop";
const KEY10 = "Kleidungsrad";
const KEY11 = "Interagieren";
const KEY12 = "Inventar";
const KEY13 = "Zeigen";
const KEY14 = "Funk";
const KEY15 = "T&uuml;ren";
const KEY16 = "Sonstiges";
const KEY17 = "Siren Stummschalten";
const KEY18 = "Handy Hoch";
const KEY19 = "Handy Runter";
const KEY_DONE = "Deine Eintr&auml;ge waren erfolgreich!";
const KEYNOTE = "Es m&uuml;ssen alle Keys eingetragen werden!";
const KEYERROR = "Das war nicht erfolgreich!";
const KEY_DONE_BTN = "Bearbeiten";
const KEY_HEADER = "Tastaturbelegung Manager";
const KEY_HEADER_2 = "Tastaturbelegung";
// ************************************************************************************//
// * English Language Section - Main Site Settings 
// ************************************************************************************//
const SITE_CONFIG_HEADER = "Seiteneinstellungen";
const SITE_CONFIG_HEADERNOTE = "Bitte beachten Sie, dass einige Einstellungen mit 0 oder 1 eingestellt werden müssen!";
const SITE_CONFIG_ONLINE = "Site Online Status";
const SITE_CONFIG_ONLINENOTE = "Unser UCP ist momentan nicht erreichbar!";
const SITE_CONFIG_NAME = "Site Name";
const SITE_CONFIG_DOWNLOAD_SECTION = "Download Section";
const SITE_CONFIG_RAGEMP = "Rage.MP";
const SITE_CONFIG_ALTV = "AltV";
const SITE_CONFIG_FIVEM = "FiveM";
const SITE_CONFIG_DONE = "<strong>Erfolgreich!</strong> Die Seiteneinstellungen wurden erfolgreich gespeichert!";
const SITE_CONFIG_ERROR = "<strong>Error!</strong> Die Seiteneinstellungen wurden nicht erfolgreich gespeichert!";
const SITE_CONFIG_TEAMSPEAK = "Teamspeak Adresse";
const SITE_CONFIG_REDM = "RedM";
const SITE_CONFIG_GSERVERNAME = "Game Server Name";
const SITE_CONFIG_GSERVERIP = "Game Server IP";
const SITE_CONFIG_GSERVERPORT = "Game Server Port";
const SITE_CONFIG_THEMES = "Design";
const SITE_CONFIG_THEMES_INFO = "W&auml;hlen Sie das Design, das Sie verwenden m&ouml;chten.";
const SITE_CONFIG_THEMES_BLACK = "Black";
const SITE_CONFIG_THEMES_BLUE = "Night Blue";
const SITE_CONFIG_THEMES_RED = "Red";
const SITE_CONFIG_THEMES_GREEN = "Green";
const SITE_CONFIG_THEMES_LIGHTBLUE = "Light Blue";
const SITE_CONFIG_THEMES_ORANGE = "Orange";
const SITE_CONFIG_ONLINE_INFO = "W&auml;hlen Sie den Online Status, den Sie verwenden m&ouml;chten.";
const SITE_CONFIG_ONLINE_ONLINE = "Online";
const SITE_CONFIG_ONLINE_OFFLINE = "Offline";
const SITE_CONFIG_CLIENT_INFO = "W&auml;hlen Sie den Status, den Sie verwenden m&ouml;chten.";
const SITE_CONFIG_CLIENT_YES = "Ja";
const SITE_CONFIG_CLIENT_NO = "Nein";
const SITE_CONFIG_UPGRADE_NOTE = "Upgrade Hinweis";
const SITE_CONFIG_UPGRADE_NOTE_INFO = "W&auml;hlen Sie die Upgrade Anzeige, den Sie verwenden m&ouml;chten.";
const SITE_CONFIG_GSERVER_STATUS = "Game Server Status";
const SITE_CONFIG_LANG = "Site Sprache";
// ************************************************************************************//
// * German Language Section - xUCP V5 Update Status System
// ************************************************************************************//
const XUCP_UPDATE_STATUS_HEADER = "xUCP V5 Update Status";
const XUCP_UPDATE_STATUS_NOTE1 = "Deine Version ist:";
const XUCP_UPDATE_STATUS_NOTE2 = "Neue Version:";
const XUCP_UPDATE_STATUS_NOTE3 = "Deine installierte Version ist aktuell.";
const XUCP_UPDATE_STATUS_NOTE4 = "Es gibt momentan keine neue Version!";
const XUCP_UPDATE_STATUS_TABLE1 = "Deine xUCP Free V5 Version";
const XUCP_UPDATE_STATUS_TABLE2 = "Neue xUCP Free V5 Version";
// ************************************************************************************//
// * German Language Section - Message System 
// ************************************************************************************//
const MSG_1 = "Du hast hier kein Zugriff!";
const MSG_2 = "Du bist kein Supporter!";
const MSG_3 = "<b>Du hast den Account erfolgreich bearbeitet!</b>";
const MSG_4 = "<b>Dein Ticket wurde gesendet!</b><br><br><a href='support.php'>Zurück</a>";
const MSG_5 = "<b>Dein Tweet wurde erfolgreich gesendet!</b><br><br><a href='dashboard.php'>Zur&uuml;ck zum Dashboard</a>";
const MSG_6 = "<b>Dein Like in den Tweet wurde erfolgreich gesetzt!</b><br><br><a href='dashboard.php'>Zur&uuml;ck zum Dashboard</a>";
const MSG_7 = "<b>Deine Änderungen konnten nicht gespeichert werden!</b>";
const MSG_8 = "<b>Du hast dein Account erfolgreich bearbeitet!</b>";
const MSG_9 = "<b>Deine Registrierung ist abgeschlossen!</b>";
const MSG_10 = "<b>Bitte f&uuml;llen Sie sowohl den Benutzernamen als auch das Passwortfeld aus!</b>";
const MSG_11 = "<b>Falsches Passwort!</b>";
const MSG_12 = "<b>Kein Benutzer gefunden!</b>";
const MSG_13 = "<b>Die E-Mail ist keine g&uuml;ltige!</b>";
const MSG_14 = "<b>Username nicht g&uuml;ltig</b>";
const MSG_15 = "<b>Das Passwort muss zwischen 5 und 20 Zeichen lang sein!</b>";
const MSG_16 = "<b>Account schon vorhanden</b>";
const MSG_17 = "<b>Dein Logout war erfolgreich!</b>";
const MSG_18 = "<b>Dein News Eintrag war nicht erfolgreich!</b>";
const MSG_19 = "<b>Bitte geben Sie sowohl den deutschen als auch den englischen Titel ein!</b>";
const MSG_20 = "<b>Bitte f&uuml;llen Sie sowohl den deutschen als auch den englischen Kontent aus!</b>";
const MSG_21 = "<b>Dein News Eintrag war erfolgreich!</b>";
const MSG_22 = "<b>Dein Regelwerk Eintrag war erfolgreich!</b>";
const MSG_23 = "<b>Dein Regelwerk Eintrag war nicht erfolgreich!</b>";
const MSG_24 = "<b>Dein FAQ Eintrag war erfolgreich!</b>";
const MSG_25 = "<b>Dein FAQ Eintrag war nicht erfolgreich!</b>";
const MSG_26 = "<b>Dein Rang ist f&uuml;r diese Seite nicht freigeschaltet!</b>";
const MSG_27 = "<b>Dein Login war Erfolgreich!</b>";
const MSG_28 = "Willkommen bei";
const MSG_29 = "Hallo";
const MSG_30 = "! Wir freuen uns, Sie an Bord zu haben.";
const MSG_31 = "Viele Grüße,";
const MSG_32 = "Das ";
const MSG_33 = "-Team";
// ************************************************************************************//
// * German Language Section - My Profile Change
// ************************************************************************************//
const WHITELIST = "F&uuml;r die Whitelist";
const TWITTER = "F&uuml;r das Twitter Modul";
const RPSERVER = "UCP sowie f&uuml;r den Game Server";
const MYPROFILENOTE = "Du musst bei jeder Änderung alle Felder ausf&uuml;hlen!";
const SIGNATUR = "Signatur";
const SIGNOTE = "Deine Signatur f&uuml;r deine Profil Ansicht!";
const AVATAR = "Avatar URL";
const AVANOTE = "Dein Avatar Bild f&uuml;r dein Profil!";
const MYPROFILESAVE = "Speichern";
const LANGUAGE = "Webseiten Sprache";
const LANGUAGENOTE = "Du hast hier die M&ouml;glichkeit die Sprache des UCP zu &auml;ndern.";
const CHANGE_MY_PROFILE_DASHNOTE = "Bitte beachten";
const CHANGE_MY_PROFILE_PASSWORD = "Passwort &auml;ndern";
const CHANGE_MY_PROFILE_SIGNATUR = "Signatur &auml;ndern";
const CHANGE_MY_PROFILE_USERNAME = "Benutzername &auml;ndern";
const CHANGE_MY_PROFILE_EMAIL = "E-Mail Adresse &auml;ndern";
const CHANGE_MY_PROFILE_AVATAR = "Avatar &auml;ndern";
const CHANGE_MY_PROFILE_AVATARNOTE = "Legen Sie Dateien hier ab oder klicken Sie zum Hochladen.";
const CHANGE_MY_PROFILE_LANGUAGE = "Webseiten Sprache &auml;ndern";
const CHANGE_MY_PROFILE_LANGUAGENOTE = "Bitte ausw&auml;hlen";
const CHANGE_MY_PROFILE_LANGUAGE_SELECT_EN = "Englisch";
const CHANGE_MY_PROFILE_LANGUAGE_SELECT_DE = "Deutsch";
const CHANGE_MY_PROFILE_BANNED_STATUS = "Ja, du bist auf unseren Game Server gebannt!!";
// ************************************************************************************//
// * German Language Section - My Profile
// ************************************************************************************//
const PLAYERID = "Spieler ID";
const PLAYERSOCIALCLUB = "Social Club";
const PLAYEREMAIL = "E-Mail";
const PLAYERBANNED = "Gebannt";
const PLAYERADMIN = "Admin Level";
const PLAYERWHITELISTED = "Whitelistet";
const PLAYERFIRSTLOGIN = "Erster Login";
const PLAYERNOTE1 = "Auf unseren Projekt wird jede Whitelist in unseren Teamspeak Server abgehalten.";
const PLAYERNOTE2 = "Unser Motto";
const PLAYERSIGNATURE = "Signatur";
const PLAYERABOUTME = "&uuml;BER MICH";
const AVATAR_CHECK_BACK = "Deine Avatar URL ist nicht erlaubt!";
const AVATAR_CHECK_OKAY = "Deine Avatar URL wurde erlaubt!!";
// ************************************************************************************//
// * German Language Section - Dashboard
// ************************************************************************************//
const DASHBOARD_USERS = "Registrierte Users";
const DASHBOARD_SUPPORT = "Support Tickets";
const DASHBOARD_BLOG = "Blog Posts";
// ************************************************************************************//
// * German Language Section - Imprint
// ************************************************************************************//
const IMPRINT_MANAGER_HEADER = "Impressum Manager";
const IMPRINT_HEADER = "Impressum";
const IMPRINT_NAME = "Name";
const IMPRINT_ADDRESS = "Adresse";
const IMPRINT_PHONE = "Telefonnr.";
const IMPRINT_MANAGER_DONE = "Speichern";
const IMPRINT_DONE = "Dein Eintrag wurde Erfolgreich gespeichert!";
const IMPRINT_NOT_DONE = "Dein Eintrag konnte nicht gespeichert werden!";
const IMPRINT_DATA_PROTECTION = "Datenschutz";
const IMPRINT_LIABILITY_FOR_CONTENT = "Haftung für Inhalte";
const IMPRINT_LIABILITY_FOR_LINKS = "Haftung für Links";
const IMPRINT_COPYRIGHT = "Urheberrechte";
// ************************************************************************************//
// * German Language Section - Team Control
// ************************************************************************************//
const TEAM_CONTROL_HEADER = "Team Control";
const TEAM_CONTROL_SECTION_OPEN = "Bedienfeld öffnen";
const TEAM_CONTROL_SECTION_CATEGORY = "Kategorie";
const TEAM_CONTROL_SUPPORTER_NOTE = "Ihre Notiznachricht";
const TEAM_CONTROL_SUPPORT_LEADER_NOTE = "Ihre Notiznachricht";
const TEAM_CONTROL_PROJECT_LEADER_NOTE = "Ihre Notiznachricht";
// ************************************************************************************//
// * German Language Section - News System
// ************************************************************************************//
const NEWS_HEADER = "News System";
const NEWS_INFO = "Du musst alle Felder ausf&uuml;hlen!";
const NEWS_TITLE_EN = "Titel Englisch";
const NEWS_TITLE_EN_TEXT = "Der Englische Titel";
const NEWS_TITLE_DE = "Titel Deutsch";
const NEWS_TITLE_DE_TEXT = "Der Deutsche Titel";
const NEWS_CONTENT_EN = "Kontent Englisch";
const NEWS_CONTENT_EN_TEXT = "Der Englische Content";
const NEWS_CONTENT_DE = "Kontent Deutsch";
const NEWS_CONTENT_DE_TEXT = "Der Deutsche Kontent";
const NEWS_SAVE = "Speichern";
// ************************************************************************************//
// * German Language Section - Discord Web-Hook Message System
// ************************************************************************************//
const DC_WEBHOOK_HEADER = "Discord Message";
const DC_WEBHOOK_MESSAGE = "Nachricht";
const DC_WEBHOOK_ENTRY_NOT_WORK = "Nachricht konnte nicht in den Discord gesendet werden!";
const DC_WEBHOOK_ENTRY_WORKING = "Deine Nachricht wurde Erfolgreich in den Discord gesendet!";
const DC_WEBHOOK_SEND = "Senden";
const DC_WEBHOOK_INFO_LOGIN_1 = "Es hat sich gerade";
const DC_WEBHOOK_INFO_LOGIN_2 = "bei den xUCP eingeloggt!";
const DC_WEBHOOK_INFO_REGISTER_1 = "Es hat sich gerade";
const DC_WEBHOOK_INFO_REGISTER_2 = "im xUCP registriert!";
const DC_WEBHOOK_INFO_BLOG_ADDED = "Es wurde ein Blog Post erstellt!";
const DC_WEBHOOK_INFO_SUPPORT_TICKET_ADDED = "Support Ticket:";
// ************************************************************************************//
// * German Language Section - Teamlist System
// ************************************************************************************//
const TLIST_HEADER = "Team";
const TLIST_NAME = "Beschreibung";
const TLIST_PROJECT_LEADER = "Project Management";
const TLIST_SUPPORT_LEADER = "Support Leader";
const TLIST_SUPPORTER = "Supporter";
// ************************************************************************************//
// * German Language Section - Rules System
// ************************************************************************************//
const RULES_INFO = "Du musst alle Felder ausfühlen!";
const RULES_TITLE_EN = "Titel Englisch";
const RULES_TITLE_EN_TEXT = "Der Englische Titel";
const RULES_TITLE_DE = "Titel Deutsch";
const RULES_TITLE_DE_TEXT = "Der Deutsche Titel";
const RULES_CONTENT_EN = "Kontent Englisch";
const RULES_CONTENT_EN_TEXT = "Der Englische Kontent";
const RULES_CONTENT_DE = "Kontent Deutsch";
const RULES_CONTENT_DE_TEXT = "Der Deutsche Kontent";
const RULES_SAVE = "Speichern";
// ************************************************************************************//
// * German Language Section - Support
// ************************************************************************************//
const SUPPORTUSERID = "Spieler ID";
const SUPPORTINFO = "Dein Support Ticket sollte m&ouml;glichst genau beschrieben werden.";
const SUPPORTUSERINFO1 = "Gebe dein Username ein";
const SUPPORTUSERINFO2 = "Welchen Bug hast du gefunden?";
const SUPPORTUSERINFO3 = "Deine Beschreibung sollte m&ouml;glichst genau beschrieben sein.";
const SUPPORTUSERNAME = "Username";
const SUPPORTEMAIL = "E-Mail";
const SUPPORTSUBJECT = "Betreff";
const SUPPORTMSG = "Nachricht";
const SUPPORTDATE = "Datum";
const SUPPORTSAVE = "Speichern";
const SUPPORTDELETEINFO = "Du hast alle Support Tickets gel&ouml;scht";
const SUPPORTDELETE1 = "<b>Gehe nun zur&uuml;ck zu den <a href='support.php'>Support Tickets</a>!</b>";
const SUPPORTDELETE2 = "Tickets l&ouml;schen!";
const SUPPORTADDTICKET1 = "Erstelle nun dein Ticket!";
const SUPPORTADDTICKET2 = "Klick mich";
const SUPPORTADDDONE = "Dein Support Ticket wurde gesendet!";
const SUPPORT_HEADER_LIST = "Support Tickets";
const SUPPORTOPTIONS = "Options";
const SUPPORTOPTIONS_VIEW = "Anschauen";
const SUPPORTOPTIONS_PRINT = "Drucken";
// ************************************************************************************//
// * German Language Section - No Logged & Logged Section
// ************************************************************************************//
const REGISTER = "Registrieren";
const LOGIN = "Einloggen";
const LOGOUT = "Ausloggen";
const SOCIALCLUBNAME = "Social Club Name";
const USERNAME = "Benutzername";
const EMAIL = "E-Mail";
const PASSWORD = "Passwort";
const SUBMIT = "Senden";
const RULES = "Regeln";
const NOTE = "<b>Hinweis:</b> Felder mit <span class='pflichtfeld'>*</span> m&uuml;ssen ausgef&uuml;llt werden.";
const NOTE2 = "<b>Hinweis:</b> Der Username sowie der Social Club Name m&uuml;ssen gleich sein.";
const NOTE3 = "<b>Hinweis:</b> Sie haben kein Account?";
const NOTE4 = "<b>Hinweis:</b> Sie haben ein Account ?";
const INFO1 = "Benutzername eingeben";
const INFO2 = "Passwort eingeben";
const INDEXTEXT = "Wir Bringen Das Roleplay Auf Ein Neues Level, Mit Unserer Realistischen Handhabung, Sind Uns Keine Grenzen Gesetzt!";
const PROFILE_SETTINGS = "Settings";
const PROFILE_ABOUT = "About";
const PROFILE_PORTFOLIO = "Portfolio";
const PROFILE_PORTFOLIO_WEBSITE = "Website";
const PROFILE_PORTFOLIO_DISCORDTAG = "Discord";
const PROFILE_BANNED = "Game server ban";
const PROFILE_BANNED_YES = "Ja, ich bin gebannt!!";
const PROFILE_BANNED_NO = "Nein, ich bin nicht gebannt!!";
const PROFILE_BANNED_INFO = "Du brauchst dir momentan keine Sorgen machen!";
const PROFILE_WHITELIST = "Whitelist";
const PROFILE_WHITELIST_SUB = "Status";
// ************************************************************************************//
// * German Language Section - Blog
// ************************************************************************************//
const BLOG_TITLE = "Titel";
const BLOG_DESCRIPTION = "Beschreibung";
const BLOG_HEADER = "Blog";
const BLOG_HEADER_2 = "Blog Eintrag hinzufügen";
const BLOG_SUBMIT = "Eintragen";
const BLOG_ENTRY_NOT_WORK = "Dein Blogeintrag war nicht erfolgreich!";
const BLOG_ENTRY_WORKING = "Dein Blogeintrag war erfolgreich!";
const BLOG_DETAILS = "Weiterlesen";
const BLOG_DATE = "Datum";
const BLOG_BY = "Blog von";
const BLOG_ID = "Blog ID";
// ************************************************************************************//
// * German Language Section - User Tools CP
// ************************************************************************************//
const USER_TOOLS_NAME = "Name";
const USER_TOOLS_LINK = "Link";
// ************************************************************************************//
// * German Language Section - Staff Member 
// ************************************************************************************//
const STAFF_USER_CAHNEGED = "Spieler bearbeiten";
const STAFF_USER_CONTROL = "Spielerliste";
const STAFF_USER_CONTROLUSERID = "Spieler ID";
const STAFF_USER_CONTROLUSERNAME = "Spieler Username";
const STAFF_USER_CONTROLSOCIALCLUB = "Spieler Social Club";
const STAFF_USER_CONTROLEMAIL = "Spieler E-Mail";
const STAFF_USER_CONTROLACCOUNTWHITELIST = "Spieler Whitelisted";
const STAFF_USER_CONTROLOPTION = "Einstellung";
const STAFF_USER_CONTROLSAVE = "Speichern";
const STAFF_USER_CONTROLDELETE = "L&ouml;schen";
const STAFF_USER_CONTROL_WL_STATUS = "W&auml;hlen Sie den Whitelist Status aus.";
const STAFF_CHANGE_USER = "Bearbeiten";
const STAFF_BANNED_USER = "Gebannt";
const STAFF_BANNED_USER_NOTE = "Grund";
// ************************************************************************************//
// * German Language Section - Server Status 
// ************************************************************************************//
const SERVER_STATUS = "Server Status";
const SERVER_STATUS_DESC = "Dedicated Server Status";
const SERVER_STATUS_FINAL_MEMORY = "Final Memory";
const SERVER_STATUS_PEAK = "Peak";
const SERVER_STATUS_CPU_USAGE = "CPU usage";
const SERVER_STATUS_ALL_USAGE_MEMORY = "All Used Memory";
const SERVER_STATUS_SMEMORY_USAGE = "Server Memory Usage";
const SERVER_STATUS_CPU_USAGE_INFO = "CPU-Last nicht absch�tzbar (evtl. zu altes Windows oder fehlende Rechte bei Linux oder Windows)";
const SERVER_STATUS_STORAGE_STAGE = "Speicherplatz";
// ************************************************************************************//
// * German Language Section - Whitelist System 
// ************************************************************************************//
const WHITELIST_HEADER = "Whitelist Fragen &Uuml;bersicht";
// ************************************************************************************//
// * German Language Section - BB-Code-Editor System
// ************************************************************************************//
const BBCODE_EDITOR = "Zitat";
const BBCODE_EDITOR_INFO = "1 schrieb:";
const BBCODE_EDITOR_REMOVE_FORMATTING = "Formatierung entfernen";
const BBCODE_EDITOR_FONTS = "Schriftart";
const BBCODE_EDITOR_SIZE = "Gr��e";
const BBCODE_EDITOR_BOLD = "Fett";
const BBCODE_EDITOR_ITALIC = "Italic";
const BBCODE_EDITOR_UNDERLINE = "Unterstrichen";
const BBCODE_EDITOR_BLETTERS = "Blockschrift";
const BBCODE_EDITOR_COLOR = "Textfarbe";
const BBCODE_EDITOR_CENTER = "Zentriert";
const BBCODE_EDITOR_URL = "URL Link";
const BBCODE_EDITOR_URL_REMOVE = "Links entfernen";
const BBCODE_EDITOR_IMAGE = "Bild";
const BBCODE_EDITOR_NUMBERLIST = "nummerierte Liste";
const BBCODE_EDITOR_NORMAL_NUMBERLIST = "normale Liste";
// ************************************************************************************//
// * German Language Section - E-Mail System
// ************************************************************************************//
const EMAIL_SYSTEM_HEADER = "E-Mail System";
const EMAIL_SYSTEM_INFO = "Mass Mail erfolgreich versendet.";
const EMAIL_SYSTEM_SUBJECT = "Betreff";
const EMAIL_SYSTEM_MESSAGE = "Nachricht";
const EMAIL_SYSTEM_SUBMIT = "Senden";
const EMAIL_SYSTEM_NOTE1 = "Hinweis: Sie k�nnen auf diese E-Mail nicht antworten.";
const EMAIL_SYSTEM_NOTE2 = "Nachricht von:";
const EMAIL_SYSTEM_NOTE3 = "am";
// ************************************************************************************//
// * German Language Section - Sponsor System
// ************************************************************************************//
const SPONSOR_SYSTEM_HEADER = "Sponsor System";
const SPONSOR_HEADER = "Sponsors";
const SPONSOR_NAME = "Name";
const SPONSOR_URL = "URL";
const SPONSOR_IMAGE = "Image";
const SPONSOR_TEXT = "Text";
const SPONSOR_SUBMIT = "Erstellen";
const SPONSOR_DONE = "Sponsor wurde erfolgreich erstellt!";
const SPONSOR_NAME_NOT_WORK = "Ung�ltiger Sponsor Name!";
const SPONSOR_URL_NOT_WORK = "Ung�ltige Sponsor URL!";
const SPONSOR_IMAGE_NOT_WORK = "Ung�ltige Sponsor Image!";
const SPONSOR_TEXT_NOT_WORK = "Ung�ltige Sponsor Text!";
const SPONSOR_NOT_WORK = "Sponsor konnte nicht angelegt werden!";
const SPONSOR_NOT_FOUND = "Es wurde kein Sponsor gefunden!";
// ************************************************************************************//
// * German Language Section - Uptime System
// ************************************************************************************//
const UPTIME_SYSTEM_HEADER = "Dienststatus";
const UPTIME_MYSQL = "Datenbank";
const UPTIME_HOMEPAGE = "Homepage";
const UPTIME_TEAMSPEAK = "Teamspeak";
const UPTIME_MAIL = "Mail";
const UPTIME_SUPPORT = "Support";
const UPTIME_SUPPORT_INFO = "Mo-Do & Sa Abends";
const UPTIME_WHITELIST = "Whitelist";
const UPTIME_WHITELIST_INFO = "Di/Do/Sa 18:00-20:00 Uhr";
const UPTIME_SERVICE = "Service";
const UPTIME_STATUS = "Status";
const UPTIME_UP = "UP";
const UPTIME_DOWN = "DOWN";
const UPTIME_GTA_ONLINE = "GTA Online";
const UPTIME_SOCIAL_CLUB = "Social Club";
const UPTIME_LAUNCHER_AUTHENTIFIZIERUNG = "Launcher Authentifizierung";
const UPTIME_ROCKSTAR = "ROCKSTAR-GAMES";
const UPTIME_CLOUD = "Cloud-Service";
// ************************************************************************************//
// * German Language Section - Uptime Config System
// ************************************************************************************//
const UPTIME_CONFIG_SYSTEM_HEADER = "Dienststatus Config";
const UPTIME_CONFIG_MYSQL = "Datenbank";
const UPTIME_CONFIG_HOMEPAGE = "Homepage";
const UPTIME_CONFIG_TEAMSPEAK = "Teamspeak";
const UPTIME_CONFIG_MAIL = "Mail";
const UPTIME_CONFIG_BNT = "Senden";
const UPTIME_CONFIG_DONE = "<strong>Erfolgreich!</strong> Die Dienststatus Einstellungen wurden erfolgreich gespeichert!";
const UPTIME_CONFIG_ERROR = "<strong>Error!</strong> Die Dienststatus Einstellungen wurden nicht erfolgreich gespeichert!";