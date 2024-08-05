SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `xucp_accounts`
--

CREATE TABLE `xucp_accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT 'N/A',
  `identifier` varchar(32) NOT NULL DEFAULT '0',
  `email` varchar(64) NOT NULL,
  `socialid` bigint(20) UNSIGNED DEFAULT 0,
  `password` varchar(256) NOT NULL,
  `hwid` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `online` int(11) NOT NULL DEFAULT 0,
  `whitelisted` tinyint(1) NOT NULL DEFAULT 0,
  `ban` tinyint(1) NOT NULL DEFAULT 0,
  `banReason` varchar(128) NOT NULL DEFAULT '',
  `adminlevel` int(11) NOT NULL DEFAULT 0,
  `language` varchar(50) DEFAULT 'de',
  `userava` varchar(256) DEFAULT '/public/images/logo.png',
  `usersig` varchar(256) DEFAULT 'No signature available!',
  `userhp` varchar(64) DEFAULT NULL,
  `userdiscordtag` varchar(32) NOT NULL DEFAULT 'No discord tag available!',
  `token` varchar(256) NOT NULL,
  `signup_date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=DYNAMIC;

--
-- Daten für Tabelle `xucp_accounts`
--

INSERT INTO `xucp_accounts` (`id`, `username`, `identifier`, `email`, `socialid`, `password`, `hwid`, `online`, `whitelisted`, `ban`, `banReason`, `adminlevel`, `language`, `userava`, `usersig`, `userhp`, `userdiscordtag`, `token`, `signup_date_time`) VALUES
(2, 'admin', '0', 'noreplay@derstr1k3r.com', 0, '$2y$10$LBOkcgl5kGUwsD/ZJL/Zmu2cA.YxEBFKYJuakFGb1tiSXVm3kjwYe', 0, 0, 0, 0, '', 120, 'en', '/public/images/logo.png', 'No signature available!', 'https://derstr1k3r.com', 'No discord tag available!', '', '2024-06-06 01:16:37');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `xucp_blog`
--

CREATE TABLE `xucp_blog` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `description` varchar(2048) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Daten für Tabelle `xucp_blog`
--

INSERT INTO `xucp_blog` (`id`, `title`, `description`, `user_id`, `created_at`) VALUES
(1, 'Test', 'Ist nur ein Test', 1, '2024-01-25 16:39:12'),
(2, 'Test', 'ist ein test', 1, '2024-02-29 11:12:26'),
(3, 'Test', 'eeerr', 1, '2024-02-29 11:31:40'),
(4, 'Tet Zoom', '[u]Test[/u]\r\n[i]Test[/i]\r\n[b]Test[/b]\r\n[size=6]Test[/size]\r\n[font=Impact]Test[/font]\r\n[color=#FFFF00]Test[/color][img]https://xucpv5-dev.derstr1k3r.com/resources/images/logo.png[/img]\r\n[url]https://xucpv5-dev.derstr1k3r.com/resources/images/logo.png[/url]', 1, '2024-05-31 12:17:03');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `xucp_config`
--

CREATE TABLE `xucp_config` (
  `id` int(11) NOT NULL,
  `site_dl_section` int(11) NOT NULL,
  `site_rage_section` int(11) NOT NULL,
  `site_altv_section` int(11) NOT NULL,
  `site_fivem_section` int(11) NOT NULL,
  `site_redm_section` int(11) NOT NULL,
  `site_online` int(11) NOT NULL,
  `site_name` varchar(32) NOT NULL,
  `site_teamspeak` varchar(64) NOT NULL,
  `site_gservername` varchar(64) NOT NULL,
  `site_gserverip` varchar(64) NOT NULL,
  `site_gserverport` varchar(64) NOT NULL,
  `site_themes` varchar(32) NOT NULL DEFAULT 'bg-theme bg-theme2',
  `site_lang` varchar(6) NOT NULL DEFAULT 'en',
  `site_upgrade_note` int(2) NOT NULL,
  `frage1` varchar(256) DEFAULT NULL,
  `frage2` varchar(256) DEFAULT NULL,
  `frage3` varchar(256) DEFAULT NULL,
  `frage4` varchar(256) DEFAULT NULL,
  `frage5` varchar(256) DEFAULT NULL,
  `frage6` varchar(256) DEFAULT NULL,
  `frage7` varchar(256) DEFAULT NULL,
  `frage8` varchar(256) DEFAULT NULL,
  `frage9` varchar(256) DEFAULT NULL,
  `frage10` varchar(256) DEFAULT NULL,
  `frage11` varchar(256) DEFAULT NULL,
  `frage12` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Daten für Tabelle `xucp_config`
--

INSERT INTO `xucp_config` (`id`, `site_dl_section`, `site_rage_section`, `site_altv_section`, `site_fivem_section`, `site_redm_section`, `site_online`, `site_name`, `site_teamspeak`, `site_gservername`, `site_gserverip`, `site_gserverport`, `site_themes`, `site_lang`, `site_upgrade_note`, `frage1`, `frage2`, `frage3`, `frage4`, `frage5`, `frage6`, `frage7`, `frage8`, `frage9`, `frage10`, `frage11`, `frage12`) VALUES
(1, 1, 1, 1, 1, 1, 1, 'xUCP Pro V5', 'ts3.xxx.com?port=9987', 'xUCP Project', 'xxx.com', '443', 'bg-theme bg-theme2', 'en', 1, 'Eine Person ist mit dem Auto in der Stadt unterwegs. Am Würfelpark vorbeigefahren, späht er eine Gruppe von Menschen auf, die sich gerade unterhalten. Er beschließt einfach so die Gruppe umzufahren. Warum ist das verboten?', 'Du bist gerade gemütlich am Karotten sammeln, wo plötzlich eine Person hinter dir steht und dir einen Schuss in den Kopf verpasst. Du hast diese Person noch nie zuvor gesehen. Darf er das?', 'Wo befinden sich unsere Safezones?', 'Was muss man bei der New-Life Regel beachten?', 'Wie lange hat man Zeit ein Supportfall zu melden?', 'Was muss man beachten, wenn Wertsachen durch einen Bug verschwinden oder beschädigt werden?', 'Was muss man bei einer Hinrichtungen, Suizid oder einer Ausreise beachten?', 'Ein Teammietglied kommt auf dich IC zu [AdminOutfit] wie verhälst du dich?', 'Sind Medic´s unantasbar?', 'Ab welchen Rang darf man Korrupt sein?', 'Du hast 2 platte Reifen wie verhälst du dich im RP?', 'Dich nimmt eine Gang/Mafia als Geisel und fordert von dir das du all dein Geld ihnen gibst oder du stirbst was ist daran falsch und warum?');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `xucp_imprint`
--

CREATE TABLE `xucp_imprint` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `address` varchar(128) NOT NULL,
  `phone_number` varchar(64) NOT NULL,
  `data_protection` varchar(2048) NOT NULL,
  `liability_for_content` varchar(2048) NOT NULL,
  `liability_for_links` varchar(2048) NOT NULL,
  `copyright` varchar(2048) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Daten für Tabelle `xucp_imprint`
--

INSERT INTO `xucp_imprint` (`id`, `name`, `address`, `phone_number`, `data_protection`, `liability_for_content`, `liability_for_links`, `copyright`) VALUES
(1, 'Your Name', 'xxx.com', 'none', 'Our website can generally be used without providing any personal data. Insofar as personal data (e.g. name, address or e-mail addresses) is collected on our website, this is always done on a voluntary basis as far as possible. This data will not be passed on to third parties without your express consent. We would like to point out that data transmission over the Internet (e.g. when communicating by e-mail) can have security gaps. A complete protection of the data against access by third parties is not possible.The use of contact data published as part of the imprint obligation by third parties to send advertising and information material that has not been expressly requested is hereby expressly rohibited. The site operators expressly reserve the right to take legal action in the event of unsolicited advertising being sent, such as spam e-mails.', 'The contents of our pages were created with great care. However, we cannot guarantee that the content is correct, complete or up-to-date. As a service provider, we are responsible for our own content on these pages according to � 7 paragraph 1 of the German Telemedia Act (TMG). According to � 8 to � 10 TMG, however, we as a service provider are not obliged to monitor transmitted or stored third-party information or to investigate circumstances that indicate illegal activity. Obligations to remove or block the use of information according to general laws remain unaffected. However, liability in this regard is only possible from the point in time at which knowledge of a specific infringement of the law is known. As soon as we become aware of any legal violations, we will remove this content immediately.', 'Our offer contains links to external websites over which we have no influence. Therefore we cannot assume any liability for this third-party content. The respective provider or operator of the pages is always responsible for the content of the linked pages. The linked pages were checked for possible legal violations at the time of linking. Illegal content was not recognizable at the time of linking. However, a permanent control of the content of the linked pages is not reasonable without concrete evidence of an infringement. As soon as we become aware of legal violations, we will remove such links immediately.', 'The content and works on these pages created by the site operators are subject to German copyright law. The duplication, processing, distribution and any kind of exploitation outside the limits of copyright require the written consent of the respective author or creator. Downloads and copies of this site are only permitted for private, non-commercial use. Insofar as the content on this site was not created by the operator, the copyrights of third parties are observed. In particular contents of third parties are marked as such. Should you nevertheless become aware of a copyright infringement, we ask that you inform us accordingly. As soon as we become aware of legal violations, we will remove such content immediately.');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `xucp_keys`
--

CREATE TABLE `xucp_keys` (
  `id` int(11) NOT NULL,
  `key1` varchar(256) DEFAULT NULL,
  `key2` varchar(256) DEFAULT NULL,
  `key3` varchar(256) DEFAULT NULL,
  `key4` varchar(256) DEFAULT NULL,
  `key5` varchar(256) DEFAULT NULL,
  `key6` varchar(256) DEFAULT NULL,
  `key7` varchar(256) DEFAULT NULL,
  `key8` varchar(256) DEFAULT NULL,
  `key9` varchar(256) DEFAULT NULL,
  `key10` varchar(256) DEFAULT NULL,
  `key11` varchar(256) DEFAULT NULL,
  `key12` varchar(256) DEFAULT NULL,
  `key13` varchar(256) DEFAULT NULL,
  `key14` varchar(256) DEFAULT NULL,
  `key15` varchar(256) DEFAULT NULL,
  `key16` varchar(256) DEFAULT NULL,
  `key17` varchar(256) DEFAULT NULL,
  `key18` varchar(256) DEFAULT NULL,
  `key19` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Daten für Tabelle `xucp_keys`
--

INSERT INTO `xucp_keys` (`id`, `key1`, `key2`, `key3`, `key4`, `key5`, `key6`, `key7`, `key8`, `key9`, `key10`, `key11`, `key12`, `key13`, `key14`, `key15`, `key16`, `key17`, `key18`, `key19`) VALUES
(1, '^', '0', '9', 'F2', 'F3', 'F4', 'F5', 'F6', 'NUM0', 'K', 'X', 'I', 'B', 'N', 'U', 'E', 'O', 'Bild hoch', 'Bild runter');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `xucp_news`
--

CREATE TABLE `xucp_news` (
  `id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `title_de` varchar(100) NOT NULL,
  `content` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `content_de` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Daten für Tabelle `xucp_news`
--

INSERT INTO `xucp_news` (`id`, `title`, `title_de`, `content`, `content_de`) VALUES
(1, 'xUCP Pro V5', 'xUCP Pro V5', '[b]Search support?[/b]\r\n[br][br]\r\nJoin my discord server: [url=https://discord.derstr1k3r.com]here[/url]\r\n[br][br]\r\nbest regards\r\n[br]\r\nDerStr1k3r', '[b]Search support?[/b]\r\n[br][br][br]\r\nJoin my discord server: [url=https://discord.derstr1k3r.com]here[/url]\r\n[br][br]\r\nbest regards\r\n[br]\r\nDerStr1k3r');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `xucp_rules`
--

CREATE TABLE `xucp_rules` (
  `id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `title_de` varchar(100) NOT NULL,
  `content` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `content_de` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Daten für Tabelle `xucp_rules`
--

INSERT INTO `xucp_rules` (`id`, `title`, `title_de`, `content`, `content_de`) VALUES
(1, 'Rules', 'Regelwerk', 'This Rules is for the DerStr1k3r.com.\r\n[br][br]\r\n[b][1]: Profile & naming[/b]\r\n[br]\r\n- Nicknames must not contain any offensive or other prohibited or protected names or parts of names.\r\n[br]\r\n- The team reserves the right to change them.Or impose sanctions.\r\n[br]\r\n- Avatars must not contain any pornographic, racist or offensive content.\r\n[br][br]\r\n[b][2]: Spam[/b][br]\r\n- Any kind of spam is forbidden.\r\n- Insults and harassment are not permitted.[br]\r\n- Racism and anti- Semitism in any form will not be tolerated!\r\n[br][br]\r\n[b][3]: Code of Conduct[/b]\r\n- Excessive pinging of other users is prohibited.[br]\r\n- There is no support via PMs to team members.[br]\r\n- External advertising of any kind is prohibited.\r\n[br][br]\r\n[b][4]: Privacy Policy[/b][br]\r\n- Private data such as telephone numbers, addresses, passwords and the like may not be exchanged publicly.[br][br]\r\n\r\n[b][5]: Amendment clause[/b][br]\r\n- These rules can be supplemented at any time by the team, or changed completely.[br][br]\r\n\r\n[b][6]: Mark[/b][br]\r\n- Tagging the project lead is prohibited.', 'This Rules is for the DerStr1k3r.de - Modding Center Discord Servers.\r\n[br][br]\r\n[b][1]: Profile & naming[/b]\r\n[br]\r\n- Nicknames must not contain any offensive or other prohibited or protected names or parts of names.\r\n[br]\r\n- The team reserves the right to change them.Or impose sanctions.\r\n[br]\r\n- Avatars must not contain any pornographic, racist or offensive content.\r\n[br][br]\r\n[b][2]: Spam[/b][br]\r\n- Any kind of spam is forbidden.\r\n- Insults and harassment are not permitted.[br]\r\n- Racism and anti- Semitism in any form will not be tolerated!\r\n[br][br]\r\n[b][3]: Code of Conduct[/b]\r\n- Excessive pinging of other users is prohibited.[br]\r\n- There is no support via PMs to team members.[br]\r\n- External advertising of any kind is prohibited.\r\n[br][br]\r\n[b][4]: Privacy Policy[/b][br]\r\n- Private data such as telephone numbers, addresses, passwords and the like may not be exchanged publicly.[br][br]\r\n\r\n[b][5]: Amendment clause[/b][br]\r\n- These rules can be supplemented at any time by the team, or changed completely.[br][br]\r\n\r\n[b][6]: Mark[/b][br]\r\n- Tagging the project lead is prohibited.');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `xucp_sponsors`
--

CREATE TABLE `xucp_sponsors` (
  `id` int(11) NOT NULL,
  `sponsor_name` varchar(64) NOT NULL DEFAULT 'N/A',
  `sponsor_url` varchar(64) NOT NULL,
  `sponsor_image` varchar(256) NOT NULL,
  `sponsor_text` varchar(2048) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=DYNAMIC;

--
-- Daten für Tabelle `xucp_sponsors`
--

INSERT INTO `xucp_sponsors` (`id`, `sponsor_name`, `sponsor_url`, `sponsor_image`, `sponsor_text`) VALUES
(1, 'DerStr1k3r.com', 'https://derstr1k3r.com', 'https://derstr1k3r.com/res/themes/default/assets/images/logo-img.png', '[b]Developer from this xUCP Pro V5.[/b]');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `xucp_support`
--

CREATE TABLE `xucp_support` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `msg` varchar(256) NOT NULL,
  `bug` varchar(30) NOT NULL,
  `posted` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Daten für Tabelle `xucp_support`
--

INSERT INTO `xucp_support` (`id`, `username`, `msg`, `bug`, `posted`) VALUES
(2, 'DerStr1k3r', 'dsd', 'test', '2024-05-29 16:19:44'),
(3, 'DerStr1k3r', 'kkkkkkkkkkkkkku', 'test2', '2024-05-30 13:54:40'),
(4, 'DerStr1k3r', '[u]dddddddddddddddddd[/u]', '123', '2024-05-31 06:24:52'),
(5, 'DerStr1k3r', 'Ist nur ein Test', '12345', '2024-05-31 12:45:46');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `xucp_uptime`
--

CREATE TABLE `xucp_uptime` (
  `id` int(11) NOT NULL,
  `uptime_homepage` varchar(64) NOT NULL DEFAULT 'N/A',
  `uptime_mail` varchar(64) NOT NULL DEFAULT 'N/A',
  `uptime_teamspeak` varchar(64) NOT NULL DEFAULT 'N/A',
  `uptime_teamspeak_port` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=DYNAMIC;

--
-- Daten für Tabelle `xucp_uptime`
--

INSERT INTO `xucp_uptime` (`id`, `uptime_homepage`, `uptime_mail`, `uptime_teamspeak`, `uptime_teamspeak_port`) VALUES
(1, 'xxxx.com', 'mail.xxxx.com', 'ts3.xxxx.com', '9987');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `xucp_whitelist`
--

CREATE TABLE `xucp_whitelist` (
  `id` int(11) NOT NULL,
  `charstory` varchar(2048) DEFAULT NULL,
  `ucpname` varchar(64) DEFAULT NULL,
  `charname` varchar(64) DEFAULT NULL,
  `frage1` varchar(256) DEFAULT NULL,
  `frage2` varchar(256) DEFAULT NULL,
  `frage3` varchar(256) DEFAULT NULL,
  `frage4` varchar(256) DEFAULT NULL,
  `frage5` varchar(256) DEFAULT NULL,
  `frage6` varchar(256) DEFAULT NULL,
  `frage7` varchar(256) DEFAULT NULL,
  `frage8` varchar(256) DEFAULT NULL,
  `frage9` varchar(256) DEFAULT NULL,
  `frage10` varchar(256) DEFAULT NULL,
  `frage11` varchar(256) DEFAULT NULL,
  `frage12` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Daten für Tabelle `xucp_whitelist`
--

INSERT INTO `xucp_whitelist` (`id`, `charstory`, `ucpname`, `charname`, `frage1`, `frage2`, `frage3`, `frage4`, `frage5`, `frage6`, `frage7`, `frage8`, `frage9`, `frage10`, `frage11`, `frage12`) VALUES
(1, 'ererereetette', 'DerStr1k3r', 'ijkejkw3er', 'eetretttz', 'tertertertertertertertertertertertertert', 'ettttttttt', 'zzzzzzzzzzzzzzzzzzzz', 'eeeeeeeeeeeee', 'zzzzzzzzzzzzzzzzz', 'ereeeeeeeeer', 'tze', 'eeeeeeeeeeeee', 'wwwwwwwwwwww', 'tttttttttttt', 'wwwwwwwwww'),
(2, 'ererereetette', 'DerStr1k3r', 'ijkejkw3er', 'utrtzr', 'erwww', 'gfee', 'ivgt', 'ererw', 'zhf', 'fhff', 'hfhdre', 'deew', 'hhfr', 'kut', 'reew'),
(3, 'ererereetette', 'DerStr1k3r', 'John Connor', 'ie3rr', 'ettt', 'qwqe', 'rewtcv', 'ttewdw', 'wrwerw', 'twte', 'f3wr', 'rwrw', 'tettee', 'zezrre', 'etzeer'),
(4, 'ererereetette', 'DerStr1k3r', 'John Connor2', 'uutz', 'tutz', 'ututu', 'utttttt', 'eeeeeeeeertt', 'zrtzrtz', 'rzzrz', 'ufgf', 'hhjtr', 'hrre', 'rt5t', 'rzrtzrt'),
(5, 'ererereetettew32', 'DerStr1k3r', 'John Connor3', 'ewewewewewewewew', 'rrrww', 'rwrw', 'wrrwwr', 'twewr', 'wrrwrw', 'wrrwrrw', 'wrtrwrw', 'wrerwf', 'hfhr', 'hrhrt', 'rger');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `xucp_accounts`
--
ALTER TABLE `xucp_accounts`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indizes für die Tabelle `xucp_blog`
--
ALTER TABLE `xucp_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `xucp_config`
--
ALTER TABLE `xucp_config`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `xucp_imprint`
--
ALTER TABLE `xucp_imprint`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `xucp_keys`
--
ALTER TABLE `xucp_keys`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `xucp_news`
--
ALTER TABLE `xucp_news`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `xucp_rules`
--
ALTER TABLE `xucp_rules`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `xucp_sponsors`
--
ALTER TABLE `xucp_sponsors`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indizes für die Tabelle `xucp_support`
--
ALTER TABLE `xucp_support`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `xucp_uptime`
--
ALTER TABLE `xucp_uptime`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indizes für die Tabelle `xucp_whitelist`
--
ALTER TABLE `xucp_whitelist`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `xucp_accounts`
--
ALTER TABLE `xucp_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `xucp_blog`
--
ALTER TABLE `xucp_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `xucp_config`
--
ALTER TABLE `xucp_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `xucp_imprint`
--
ALTER TABLE `xucp_imprint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `xucp_keys`
--
ALTER TABLE `xucp_keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `xucp_news`
--
ALTER TABLE `xucp_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `xucp_rules`
--
ALTER TABLE `xucp_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `xucp_sponsors`
--
ALTER TABLE `xucp_sponsors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `xucp_support`
--
ALTER TABLE `xucp_support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `xucp_whitelist`
--
ALTER TABLE `xucp_whitelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
