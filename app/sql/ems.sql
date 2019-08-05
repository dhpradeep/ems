-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 06. Aug 2019 um 01:23
-- Server-Version: 10.1.38-MariaDB
-- PHP-Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `ems`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(4, 'Basic Mathematics', 'Basic Mathematics for BBA and BCA'),
(11, 'Programming', 'PHP, Javascript and HTML'),
(12, 'Account', 'Account for BBA');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `connection`
--

CREATE TABLE `connection` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `resourceId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `contactdetails`
--

CREATE TABLE `contactdetails` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `municipality` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wardNo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `area` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobileNo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephoneNo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blockNo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `guardianName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `guardianRelation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `guardianContact` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `contactdetails`
--

INSERT INTO `contactdetails` (`id`, `userId`, `municipality`, `wardNo`, `area`, `district`, `zone`, `mobileNo`, `telephoneNo`, `blockNo`, `guardianName`, `guardianRelation`, `guardianContact`) VALUES
(17, 54, 'Lekhnath', NULL, '', 'Kaski', '', '98888886666', '', '', 'NO', '', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `formNo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `entranceNo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `eligible` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `remarks` varchar(1200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `marksheet_see` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `marksheet_11` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `marksheet_12` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `transcript` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `characterCertificate_see` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `characterCertificate_12` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `citizenship` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `photo` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `documents`
--

INSERT INTO `documents` (`id`, `userId`, `formNo`, `entranceNo`, `eligible`, `remarks`, `marksheet_see`, `marksheet_11`, `marksheet_12`, `transcript`, `characterCertificate_see`, `characterCertificate_12`, `citizenship`, `photo`) VALUES
(16, 54, '22344', '22322', 'true', 'Transcript to submit.', 'true', 'true', 'true', 'false', 'true', 'true', 'true', 'true');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `faculty` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `institution` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `board` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `yearOfCompletion` int(11) NOT NULL,
  `percent` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `education`
--

INSERT INTO `education` (`id`, `userId`, `level`, `faculty`, `institution`, `board`, `yearOfCompletion`, `percent`) VALUES
(13, 54, '1', '', 'AMHSS', 'Nepal', 2015, '91'),
(14, 54, '2', 'Science', 'AMHSS', 'HSEB', 2017, '83');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `personaldata`
--

CREATE TABLE `personaldata` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `programId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `doa` date NOT NULL,
  `dobAd` date NOT NULL,
  `dobBs` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` tinyint(11) NOT NULL,
  `nationality` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Nepali',
  `fatherName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `personaldata`
--

INSERT INTO `personaldata` (`id`, `userId`, `password`, `programId`, `doa`, `dobAd`, `dobBs`, `gender`, `nationality`, `fatherName`) VALUES
(18, 54, 'eversoft22322', '2', '2019-07-30', '2019-08-11', '2019-08-11', 1, 'Nepal', 'Danu');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `duration` int(11) NOT NULL,
  `welcome` varchar(1200) COLLATE utf8_unicode_ci NOT NULL,
  `thanks` varchar(1200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `program`
--

INSERT INTO `program` (`id`, `name`, `duration`, `welcome`, `thanks`) VALUES
(2, 'BBA', 120, 'Welcome to BBA section.', 'Thank you for your test.'),
(8, 'BCA', 90, '&lt;p&gt;&lt;strong&gt;Welcome to BCA Entrance Exam.&lt;/strong&gt;&lt;/p&gt;\n', '&lt;p&gt;&lt;strong&gt;Thank you&lt;/strong&gt;&lt;/p&gt;\n'),
(9, 'BPH', 120, '&lt;p&gt;Welcome to BPH section.&lt;/p&gt;\n', '&lt;p&gt;Thank you for your test for BPH.&lt;/p&gt;\n'),
(14, 'Test', 60, '&lt;p&gt;&lt;br /&gt;\nWelcome to Test&lt;/p&gt;\n', '&lt;p&gt;&lt;br /&gt;\nTesting Exit.&lt;/p&gt;\n');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `questionmodel`
--

CREATE TABLE `questionmodel` (
  `id` int(11) NOT NULL,
  `programId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `minLevel` int(11) NOT NULL,
  `maxLevel` int(11) NOT NULL,
  `noOfQuestions` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `questionmodel`
--

INSERT INTO `questionmodel` (`id`, `programId`, `categoryId`, `minLevel`, `maxLevel`, `noOfQuestions`) VALUES
(6, 2, 4, 2, 2, 20),
(9, 8, 4, 3, 3, 20),
(10, 8, 11, 2, 2, 30),
(11, 2, 12, 3, 3, 30),
(13, 2, 11, 1, 1, 10);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `question` varchar(1200) COLLATE utf8_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL,
  `answer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `choice2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `choice3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `choice4` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `questions`
--

INSERT INTO `questions` (`id`, `categoryId`, `question`, `level`, `answer`, `choice2`, `choice3`, `choice4`) VALUES
(4, 4, '&lt;p&gt;Who is famous for formula to calculate hypotenuse for right angle traingle?&lt;/p&gt;\n', 2, 'Pythagorus', 'Niels Bohr', 'Einstein', 'Newton'),
(5, 11, '&lt;p&gt;Which is not a programming language?&lt;/p&gt;\n', 3, 'Lotus', 'C', 'R', 'Java'),
(6, 12, '&lt;p&gt;Is debit&lt;strong&gt; good&lt;/strong&gt;?&lt;/p&gt;\n', 1, 'No', 'I dont know.', 'Yes', 'Depends');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `record`
--

CREATE TABLE `record` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `questionId` int(11) NOT NULL,
  `choice` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rightAnswer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `result` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `timetrack`
--

CREATE TABLE `timetrack` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `remainingTime` int(11) NOT NULL,
  `isSubmitted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `userlogin`
--

CREATE TABLE `userlogin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passwordHash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `userlogin`
--

INSERT INTO `userlogin` (`id`, `username`, `fname`, `mname`, `lname`, `email`, `passwordHash`, `role`) VALUES
(13, 'admin', 'Saroj', '', 'Tripathi', 'admin@admin.com', 'e00cf25ad42683b3df678c61f42c6bda', 1),
(14, 'admin2', 'Pradip', '', 'Dhakal', 'admin2@admin.com', 'c84258e9c39059a89ab77d846ddab909', 1),
(28, 'thaxaina', 'Saroj', '', 'Tripathi', 'ademin@admin.com', 'e00cf25ad42683b3df678c61f42c6bda', 1),
(31, 'admin1', 'Arjun', 'Prasad', 'Subedi', 'admin1@admin.com', 'e00cf25ad42683b3df678c61f42c6bda', 1),
(32, 'student', 'Saroj', '', 'Tripathi', 'student@student.com', 'cd73502828457d15655bbd7a63fb0bc8', 1),
(33, 'pravhu', 'Pravhu', '', 'Gurung', 'admin44@admin.com', 'e00cf25ad42683b3df678c61f42c6bda', 1),
(34, 'teacher', 'Raju', 'Prasad', 'Lamsal', 'teacher@teacher.com', '41c8949aa55b8cb5dbec662f34b62df3', 2),
(35, 'test1', 'Test', '', 'User', 'test@test.com', 'e00cf25ad42683b3df678c61f42c6bda', 1),
(54, 'saroj22322', 'Saroj', '', 'Tripathi', 'saroj@admin.com', '11d3d3a67cd34bfc05ca02bff3fd55de', 3);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `connection`
--
ALTER TABLE `connection`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `contactdetails`
--
ALTER TABLE `contactdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `personaldata`
--
ALTER TABLE `personaldata`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `questionmodel`
--
ALTER TABLE `questionmodel`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `timetrack`
--
ALTER TABLE `timetrack`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT für Tabelle `connection`
--
ALTER TABLE `connection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `contactdetails`
--
ALTER TABLE `contactdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT für Tabelle `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT für Tabelle `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT für Tabelle `personaldata`
--
ALTER TABLE `personaldata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT für Tabelle `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT für Tabelle `questionmodel`
--
ALTER TABLE `questionmodel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT für Tabelle `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `record`
--
ALTER TABLE `record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `timetrack`
--
ALTER TABLE `timetrack`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
