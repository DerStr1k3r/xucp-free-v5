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
const HOME_NONE_LOGGED = "Home";
const RULES = "Rules";
const USER_ACCOUNT = "Account Tools";
const USER_PROFILE_CHANGE = "User Settings";
const USER_SUPPORT = "Support";
const USER_TICKET_CREATE = "Tickets";
const WELCOME_TO = "Welcome to";
const STAFF_NEWS_ACP = "News System";
const STAFF_RULES_ACP = "Rules System";
const SITE_LOGOUT = "Logout";
const SITE_EMAIL_NOTE = "E-Mail";
const TEAMSPEAK = "Teamspeak";
const FAQ = "FAQs";
const NEWS = "News: ";
const OUR_FEATURES = "Our Features";
const SECURE_SYSTEM = "Secure System";
const MY_CHARACTERS = "My Character";
const SITE_CONFIG_TEAMSPEAK = "Teamspeak Adress";
const GSERVER_INFO_HEAD = "Client & Server";
const GSERVER_INFO_01 = "Here in the list you can see all information about our game servers!";
const GSERVER_INFO_02 = "For further questions please contact the support!";
const GO_TO_SITE = "Open";
// ************************************************************************************//
// * My Whitelist Status Language Section - Main 
// ************************************************************************************//
const MYWHITELIST_STATUS = "Your whitelist is approved for our server. We wish you a lot of fun with us!";
const MYWHITELIST_STATUS_2 = "You have not yet created a whitelist or your whitelist may still be in progress! <a href='/vendor/backend/user/whitelist/index.php?mywhitelist=addwl'><button class='btn btn-secondary btn-sm waves-effect waves-light'>To the white list</button></a>";
const MYWHITELIST_STATUS_3 = "Your whitelist questionnaire has been sent to our team. Please wait until you are invited to the Teamspeak interview.";
const MYWHITELIST_STATUS_4 = "Unfortunately, your whitelist questionnaire could not be sent to our team. Please contact our support team.";
const MYWHITELIST_STATUS_5 = "Welcome to the whitelist system, please take your time and answer the questions at your own discretion!";
const MYWHITELIST_STATUS_6 = "Remember: You have 20 minutes to send off the questionnaire. After the 5 minutes you have to start over!";
const MYWHITELIST_USERNAME = "Your Username";
const MYWHITELIST_CHARNAME = "Your Character Name";
const MYWHITELIST_STORY = "Your Character Story";
const MYWHITELIST_HEADER = "White list system";
// ************************************************************************************//
// * Whitelist Language Section - Main 
// ************************************************************************************//
const FRAGE1 = "Question 1";
const FRAGE2 = "Question 2";
const FRAGE3 = "Question 3";
const FRAGE4 = "Question 4";
const FRAGE5 = "Question 5";
const FRAGE6 = "Question 6";
const FRAGE7 = "Question 7";
const FRAGE8 = "Question 8";
const FRAGE9 = "Question 9";
const FRAGE10 = "Question 10";
const FRAGE11 = "Question 11";
const FRAGE12 = "Question 12";
const FRAGEDONE = "Your entries were successful!";
const FRAGENOTE = "All questions must be entered!";
const FRAGEDONEBTN = "Edit";
const FRAGE_HEADER = "Whitelist Questions";
const FRAGE_HEADER_2 = "Whitelist Applications";
const FRAGE_VIEW = "View Application";
const FRAGE_SEND = "Submit application";
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
const KEY15 = "Doors";
const KEY16 = "Sonstiges";
const KEY17 = "Siren Stummschalten";
const KEY18 = "Handy Hoch";
const KEY19 = "Handy Runter";
const KEY_DONE = "Your entries were successful!";
const KEYNOTE = "All questions must be entered!";
const KEY_DONE_BTN = "Edit";
const KEY_HEADER = "Keyboard Manager";
const KEY_HEADER_2 = "Keyboard";
// ************************************************************************************//
// * English Language Section - Main Site Settings 
// ************************************************************************************//
const SITE_CONFIG_HEADER = "Site Settings";
const SITE_CONFIG_HEADERNOTE = "Please note that some settings have to be set with 0 or 1!";
const SITE_CONFIG_ONLINE = "Site Online Status";
const SITE_CONFIG_ONLINENOTE = "Our UCP is currently unavailable!";
const SITE_CONFIG_NAME = "Site Name";
const SITE_CONFIG_DOWNLOAD_SECTION = "Download Section";
const SITE_CONFIG_RAGEMP = "Rage.MP";
const SITE_CONFIG_ALTV = "AltV";
const SITE_CONFIG_FIVEM = "FiveM";
const SITE_CONFIG_DONE = "<strong>Success!</strong> The site settings have been saved successfully!";
const SITE_CONFIG_ERROR = "<strong>Error!</strong> The site settings were not saved successfully!";
const SITE_CONFIG_REDM = "RedM";
const SITE_CONFIG_GSERVERNAME = "Game Server Name";
const SITE_CONFIG_GSERVERIP = "Game Server IP";
const SITE_CONFIG_GSERVERPORT = "Game Server Port";
const SITE_CONFIG_THEMES = "Themes";
const SITE_CONFIG_THEMES_INFO = "Choose the theme you want to use.";
const SITE_CONFIG_THEMES_BLACK = "Black";
const SITE_CONFIG_THEMES_BLUE = "Night Blue";
const SITE_CONFIG_THEMES_RED = "Red";
const SITE_CONFIG_THEMES_GREEN = "Green";
const SITE_CONFIG_THEMES_LIGHTBLUE = "Light Blue";
const SITE_CONFIG_THEMES_ORANGE = "Orange";
const SITE_CONFIG_ONLINE_INFO = "Choose the online status you want to use.";
const SITE_CONFIG_ONLINE_ONLINE = "Online";
const SITE_CONFIG_ONLINE_OFFLINE = "Offline";
const SITE_CONFIG_CLIENT_INFO = "Choose the status you want to use.";
const SITE_CONFIG_CLIENT_YES = "Yes";
const SITE_CONFIG_CLIENT_NO = "No";
const SITE_CONFIG_UPGRADE_NOTE = "Upgrade notice";
const SITE_CONFIG_UPGRADE_NOTE_INFO = "Choose the upgrade display you want to use.";
const SITE_CONFIG_GSERVER_STATUS = "Game Server Status";
const SITE_CONFIG_LANG = "Site Language";
// ************************************************************************************//
// * English Language Section - xUCP V5 Update Status System
// ************************************************************************************//
const XUCP_UPDATE_STATUS_HEADER = "xUCP V5 Update Status";
const XUCP_UPDATE_STATUS_NOTE1 = "Your version is:";
const XUCP_UPDATE_STATUS_NOTE2 = "New version:";
const XUCP_UPDATE_STATUS_NOTE3 = "Your installed version is up to date.";
const XUCP_UPDATE_STATUS_NOTE4 = "There is currently no new version!";
const XUCP_UPDATE_STATUS_TABLE1 = "Your xUCP Free V5 version";
const XUCP_UPDATE_STATUS_TABLE2 = "New xUCP Free V5 version";
// ************************************************************************************//
// * English Language Section - Message System 
// ************************************************************************************//
const MSG_1 = "You have no access here!";
const MSG_2 = "You are not a supporter!";
const MSG_3 = "<b>You have successfully edited the account!</b><br><br><a href='STAFF_USER_changed.php'>go back</a>";
const MSG_4 = "<b>Your ticket has been sent!</b>";
const MSG_5 = "<b>Your tweet was sent successfully!</b><br><br><a href='dashboard.php'>Back to the dashboard</a>";
const MSG_6 = "<b>Your like in the tweet was successfully set!</b><br><br><a href='dashboard.php'>Back to the dashboard</a>";
const MSG_7 = "<b>Your changes could not be saved!</b>";
const MSG_8 = "<b>You have successfully edited your account!</b>";
const MSG_9 = "<b>Your registration is complete!</b>";
const MSG_10 = "<b>Please fill in both the username and the password field!</b>";
const MSG_11 = "<b>Wrong password!</b>";
const MSG_12 = "<b>No user found!</b>";
const MSG_13 = "<b>E-Mail is not valid!</b>";
const MSG_14 = "<b>Username is not valid!</b>";
const MSG_15 = "<b>Password must be between 5 and 20 characters long!</b>";
const MSG_16 = "<b>Account already exists</b>";
const MSG_17 = "<b>Your logout was successful!</b>";
const MSG_18 = "<b>Your news entry was not successful!</b>";
const MSG_19 = "<b>Please fill in both the German title and the English title!</b>";
const MSG_20 = "<b>Please fill in both the German content and the English content!</b>";
const MSG_21 = "<b>Your news entry was successful!</b>";
const MSG_22 = "<b>Your rules entry was successful!</b>";
const MSG_23 = "<b>Your rules entry was not successful!</b>";
const MSG_24 = "<b>Your faq entry was successful!</b>";
const MSG_25 = "<b>Your faq entry was not successful!</b>";
const MSG_26 = "<b>Your rank is not unlocked for this page!</b>";
const MSG_27 = "<b>Your login was successful!</b>";
const MSG_28 = "Welcome to";
const MSG_29 = "Hello";
const MSG_30 = "! We are pleased to have you on board.";
const MSG_31 = "Best regards,";
const MSG_32 = "The ";
const MSG_33 = "-Team";

// ************************************************************************************//
// * English Language Section - My Profile Change
// ************************************************************************************//
const WHITELIST = "For the whitelist";
const TWITTER = "For the upcoming Twitter module";
const SIGNATUR = "Signature";
const AVATAR = "Avatar url";
const MYPROFILESAVE = "Save";
const LANGUAGE = "Website language";
const LANGUAGENOTE = "Here you have the option to change the language of the UCP.";
const CHANGE_MY_PROFILE_DASHNOTE = "Please note";
const CHANGE_MY_PROFILE_PASSWORD = "Change Password";
const CHANGE_MY_PROFILE_SIGNATUR = "Change signature";
const CHANGE_MY_PROFILE_USERNAME = "Change username";
const CHANGE_MY_PROFILE_EMAIL = "Change E-Mail address";
const CHANGE_MY_PROFILE_AVATAR = "Change avatar";
const CHANGE_MY_PROFILE_AVATARNOTE = "Drop files here or click to upload.";
const CHANGE_MY_PROFILE_LANGUAGE = "Change website language";
const CHANGE_MY_PROFILE_LANGUAGENOTE = "Please select";
const CHANGE_MY_PROFILE_LANGUAGE_SELECT_EN = "English";
const CHANGE_MY_PROFILE_LANGUAGE_SELECT_DE = "German";
const CHANGE_MY_PROFILE_BANNED_STATUS = "Yes, you are banned on our game server!!";
// ************************************************************************************//
// * English Language Section - My Profile
// ************************************************************************************//
const PLAYERID = "Player ID";
const PLAYERSOCIALCLUB = "Social Club";
const PLAYEREMAIL = "E-Mail";
const PLAYERBANNED = "Banned";
const PLAYERADMIN = "Admin Level";
const PLAYERWHITELISTED = "Whitelisted";
const PLAYERFIRSTLOGIN = "First Login";
const PLAYERNOTE1 = "From our Project every whitelist is held in our Teamspeak server.";
const PLAYERNOTE2 = "Our statement";
const PLAYERSIGNATURE = "Signature";
const PLAYERABOUTME = "ABOUT ME";
const AVATAR_CHECK_BACK = "Your avatar URL is not allowed!";
const AVATAR_CHECK_OKAY = "Your avatar URL has been allowed!";
// ************************************************************************************//
// * English Language Section - Dashboard
// ************************************************************************************//
const DASHBOARD_USERS = "Registered users";
const DASHBOARD_SUPPORT = "Support Tickets";
const DASHBOARD_BLOG = "Blog Posts";
// ************************************************************************************//
// * English Language Section - Imprint
// ************************************************************************************//
const IMPRINT_MANAGER_HEADER = "Imprint Manager";
const IMPRINT_HEADER = "Imprint";
const IMPRINT_NAME = "Name";
const IMPRINT_ADDRESS = "Address";
const IMPRINT_PHONE = "Phone number";
const IMPRINT_MANAGER_DONE = "Save";
const IMPRINT_DONE = "Your entry has been successfully saved!";
const IMPRINT_NOT_DONE = "Your entry could not be saved!";
const IMPRINT_DATA_PROTECTION = "Data Protection";
const IMPRINT_LIABILITY_FOR_CONTENT = "Liability for content";
const IMPRINT_LIABILITY_FOR_LINKS = "Liability for links";
const IMPRINT_COPYRIGHT = "Copyright";
// ************************************************************************************//
// * English Language Section - Team Control
// ************************************************************************************//
const TEAM_CONTROL_HEADER = "Team Control";
const TEAM_CONTROL_SECTION_OPEN = "Open Panel";
const TEAM_CONTROL_SECTION_CATEGORY = "Category";
const TEAM_CONTROL_SUPPORTER_NOTE = "your note message";
const TEAM_CONTROL_SUPPORT_LEADER_NOTE = "your note message";
const TEAM_CONTROL_PROJECT_LEADER_NOTE = "your note message";
// ************************************************************************************//
// * English Language Section - News System
// ************************************************************************************//
const NEWS_HEADER = "News System";
const NEWS_INFO = "You have to fill in all fields!";
const NEWS_TITLE_EN = "Title English";
const NEWS_TITLE_EN_TEXT = "The English Title";
const NEWS_TITLE_DE = "Title German";
const NEWS_TITLE_DE_TEXT = "The German Title";
const NEWS_CONTENT_EN = "Content Englisch";
const NEWS_CONTENT_EN_TEXT = "The English Content";
const NEWS_CONTENT_DE = "Content German";
const NEWS_CONTENT_DE_TEXT = "The German Content";
const NEWS_SAVE = "Save";
// ************************************************************************************//
// * English Language Section - Discord Web-Hook Message System
// ************************************************************************************//
const DC_WEBHOOK_HEADER = "Discord Message";
const DC_WEBHOOK_MESSAGE = "Message";
const DC_WEBHOOK_ENTRY_NOT_WORK = "Message could not be sent to Discord!";
const DC_WEBHOOK_ENTRY_WORKING = "Your message has been successfully sent to the discord!";
const DC_WEBHOOK_SEND = "Send";
const DC_WEBHOOK_INFO_HEADER = "xUCP Demo Bot";
const DC_WEBHOOK_INFO_LOGIN_1 = "It has just";
const DC_WEBHOOK_INFO_LOGIN_2 = "logged into the xUCP!";
const DC_WEBHOOK_INFO_REGISTER_1 = "It has just turned";
const DC_WEBHOOK_INFO_REGISTER_2 = "registered in xUCP!";
const DC_WEBHOOK_INFO_BLOG_ADDED = "A blog post has been created!";
const DC_WEBHOOK_INFO_SUPPORT_TICKET_ADDED = "Support Ticket:";
// ************************************************************************************//
// * English Language Section - Team list System
// ************************************************************************************//
const TLIST_HEADER = "Team";
const TLIST_NAME = "Description";
const TLIST_PROJECT_LEADER = "Project Management";
const TLIST_SUPPORT_LEADER = "Support Leader";
const TLIST_SUPPORTER = "Supporter";
// ************************************************************************************//
// * English Language Section - Rules System
// ************************************************************************************//
const RULES_INFO = "You have to fill in all fields!";
const RULES_TITLE_EN = "Title English";
const RULES_TITLE_EN_TEXT = "The English Title";
const RULES_TITLE_DE = "Title German";
const RULES_TITLE_DE_TEXT = "The German Title";
const RULES_CONTENT_EN = "Content Englisch";
const RULES_CONTENT_EN_TEXT = "The English Content";
const RULES_CONTENT_DE = "Content German";
const RULES_CONTENT_DE_TEXT = "The German Content";
const RULES_SAVE = "Save";
// ************************************************************************************//
// * English Language Section - Support
// ************************************************************************************//
const SUPPORTUSERID = "Player ID";
const SUPPORTINFO = "Your support ticket should be described as precisely as possible.";
const SUPPORTUSERINFO1 = "Enter your username";
const SUPPORTUSERINFO2 = "What bug did you find?";
const SUPPORTUSERINFO3 = "Your description should be described as precisely as possible.";
const SUPPORTUSERNAME = "Username";
const SUPPORTEMAIL = "E-Mail";
const SUPPORTSUBJECT = "Subject";
const SUPPORTMSG = "Message";
const SUPPORTDATE = "Date";
const SUPPORTSAVE = "Save";
const SUPPORTDELETEINFO = "You have deleted all support tickets";
const SUPPORTDELETE1 = "Now go back to the <a href='support.php'>Support Tickets</a>!";
const SUPPORTDELETE2 = "Delete tickets";
const SUPPORTADDTICKET1 = "Now create your ticket!";
const SUPPORTADDTICKET2 = "click me";
const SUPPORTADDDONE = "Your support ticket has been sent!";
const SUPPORT_HEADER_LIST = "Support Tickets";
const SUPPORTOPTIONS = "Options";
const SUPPORTOPTIONS_VIEW = "View";
const SUPPORTOPTIONS_PRINT = "Print";
// ************************************************************************************//
// * English Language Section - No Logged & Logged Section
// ************************************************************************************//
const REGISTER = "Register";
const LOGIN = "Login";
const LOGOUT = "Logout";
const SOCIALCLUBNAME = "Social Club Name";
const USERNAME = "Username";
const EMAIL = "Email";
const PASSWORD = "Password";
const SUBMIT = "Submit";
const NOTE = "<b>Note:</b> Fields with <span class='phpflickr'>*</span> have to be filled out.";
const NOTE2 = "<b>Note:</b> The username and the social club name must be the same.";
const NOTE3 = "<b>Note:</b> Don't have an account ?";
const NOTE4 = "<b>Note:</b> You have an account ?";
const INFO1 = "Enter Username";
const INFO2 = "Enter Password";
const INDEXTEXT = "We bring the roleplay to a new level, with our realistic handling, there are no limits!";
const PROFILE_SETTINGS = "Settings";
const PROFILE_ABOUT = "About";
const PROFILE_PORTFOLIO = "Portfolio";
const PROFILE_PORTFOLIO_WEBSITE = "Website";
const PROFILE_PORTFOLIO_DISCORDTAG = "Discord";
const PROFILE_BANNED = "Game server ban";
const PROFILE_BANNED_YES = "Yes, I'm banned!";
const PROFILE_BANNED_NO = "No, I'm not banned!";
const PROFILE_BANNED_INFO = "You don't need to worry right now!";
const PROFILE_WHITELIST = "Whitelist";
const PROFILE_WHITELIST_SUB = "Status";
// ************************************************************************************//
// * German Language Section - Blog
// ************************************************************************************//
const BLOG_TITLE = "Title";
const BLOG_DESCRIPTION = "Description";
const BLOG_HEADER = "Blog";
const BLOG_HEADER_2 = "Add Blog Entry";
const BLOG_SUBMIT = "Send";
const BLOG_ENTRY_NOT_WORK = "Your blog entry was unsuccessful!";
const BLOG_ENTRY_WORKING = "Your blog entry was successful!";
const BLOG_DETAILS = "Read more";
const BLOG_DATE = "Date";
const BLOG_BY = "Blog by";
const BLOG_ID = "Blog ID";
// ************************************************************************************//
// * German Language Section - User Tools CP
// ************************************************************************************//
const USER_TOOLS_NAME = "Name";
const USER_TOOLS_LINK = "Link";
// ************************************************************************************//
// * English Language Section - Staff Member 
// ************************************************************************************//
const STAFF_USER_CAHNEGED = "Player Changer";
const STAFF_USER_CONTROL = "Playerlist";
const STAFF_USER_CONTROLUSERID = "Player ID";
const STAFF_USER_CONTROLUSERNAME = "Player Username";
const STAFF_USER_CONTROLSOCIALCLUB = "Player Social Club";
const STAFF_USER_CONTROLEMAIL = "Player E-Mail";
const STAFF_USER_CONTROLACCOUNTWHITELIST = "Player Whitelisted";
const STAFF_USER_CONTROLOPTION = "Settings";
const STAFF_USER_CONTROLSAVE = "Save";
const STAFF_USER_CONTROLDELETE = "Delete";
const STAFF_USER_CONTROL_WL_STATUS = "Select the whitelist status.";
const STAFF_CHANGE_USER = "Edit";
const STAFF_BANNED_USER = "Banned";
const STAFF_BANNED_USER_NOTE = "Reason";
// ************************************************************************************//
// * English Language Section - Server Status 
// ************************************************************************************//
const SERVER_STATUS = "Server Status";
const SERVER_STATUS_DESC = "Dedicated Server Status";
const SERVER_STATUS_FINAL_MEMORY = "Final Memory";
const SERVER_STATUS_PEAK = "Peak";
const SERVER_STATUS_CPU_USAGE = "CPU usage";
const SERVER_STATUS_ALL_USAGE_MEMORY = "All Used Memory";
const SERVER_STATUS_SMEMORY_USAGE = "Server Memory Usage";
const SERVER_STATUS_CPU_USAGE_INFO = "CPU load not estimateable (maybe too old Windows or missing rights at Linux or Windows)";
const SERVER_STATUS_STORAGE_STAGE = "Storage Space";
// ************************************************************************************//
// * English Language Section - Whitelist System 
// ************************************************************************************//
const WHITELIST_HEADER = "Whitelist Questions";
// ************************************************************************************//
// * English Language Section - BB-Code-Editor System
// ************************************************************************************//
const BBCODE_EDITOR = "Quote";
const BBCODE_EDITOR_INFO = "1 wrote:";
// ************************************************************************************//
// * English Language Section - Sponsor System
// ************************************************************************************//
const SPONSOR_SYSTEM_HEADER = "Sponsor System";
const SPONSOR_HEADER = "Sponsors";
const SPONSOR_NAME = "Name";
const SPONSOR_URL = "URL";
const SPONSOR_IMAGE = "Image";
const SPONSOR_TEXT = "Text";
const SPONSOR_SUBMIT = "Create";
const SPONSOR_DONE = "Sponsor has been successfully created!";
const SPONSOR_NAME_NOT_WORK = "Invalid sponsor name!";
const SPONSOR_URL_NOT_WORK = "Invalid sponsor URL!";
const SPONSOR_IMAGE_NOT_WORK = "Invalid sponsor image!";
const SPONSOR_TEXT_NOT_WORK = "Invalid sponsor text!";
const SPONSOR_NOT_WORK = "Sponsor could not be created!";
const SPONSOR_NOT_FOUND = "No sponsor found!";
// ************************************************************************************//
// * English Language Section - Uptime System
// ************************************************************************************//
const UPTIME_SYSTEM_HEADER = "Service status";
const UPTIME_MYSQL = "Database";
const UPTIME_HOMEPAGE = "Homepage";
const UPTIME_TEAMSPEAK = "Teamspeak";
const UPTIME_MAIL = "Mail";
const UPTIME_SUPPORT = "Support";
const UPTIME_SUPPORT_INFO = "Mon-Thu & Sat evenings";
const UPTIME_WHITELIST = "Whitelist";
const UPTIME_WHITELIST_INFO = "Tue/Thu/Sat 6:00 p.m. - 8:00 p.m";
const UPTIME_STATUS = "Status";
const UPTIME_SERVICE = "Service";
const UPTIME_UP = "UP";
const UPTIME_DOWN = "DOWN";
const UPTIME_GTA_ONLINE = "GTA Online";
const UPTIME_SOCIAL_CLUB = "Social Club";
const UPTIME_LAUNCHER_AUTHENTIFIZIERUNG = "Launcher authentication";
const UPTIME_ROCKSTAR = "ROCKSTAR-GAMES";
const UPTIME_CLOUD = "Cloud-Service";
// ************************************************************************************//
// * English Language Section - Uptime Config System
// ************************************************************************************//
const UPTIME_CONFIG_SYSTEM_HEADER = "Service status Config";
const UPTIME_CONFIG_MYSQL = "Datenbank";
const UPTIME_CONFIG_HOMEPAGE = "Homepage";
const UPTIME_CONFIG_TEAMSPEAK = "Teamspeak";
const UPTIME_CONFIG_MAIL = "Mail";
const UPTIME_CONFIG_BNT = "Send";
const UPTIME_CONFIG_DONE = "<strong>Successful!</strong> The service status settings have been saved successfully!";
const UPTIME_CONFIG_ERROR = "<strong>Error!</strong> The service status settings were not saved successfully!";