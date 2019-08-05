-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 05. Aug 2019 um 03:11
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
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `guardianName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `guardianRelation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `guardianContact` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `formNo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `entranceNo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `eligible` tinyint(1) NOT NULL,
  `minimumPercent` tinyint(1) NOT NULL,
  `marksheet` tinyint(1) NOT NULL,
  `characterCertificate` tinyint(1) NOT NULL,
  `citizenship` tinyint(1) NOT NULL,
  `photo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `institution` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `board` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `yearOfCompletion` int(11) NOT NULL,
  `percent` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `personaldata`
--

CREATE TABLE `personaldata` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `program` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `doa` datetime NOT NULL,
  `dobAd` datetime NOT NULL,
  `dobBs` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` tinyint(11) NOT NULL,
  `nationality` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Nepali',
  `fatherName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(8, 'BCA', 90, '&lt;p&gt;&amp;lt;p&amp;gt;&amp;lt;strong&amp;gt;Welcome to BCA Entrance Exam.&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;&lt;/p&gt;\n', '&lt;p&gt;&amp;lt;p&amp;gt;&amp;lt;strong&amp;gt;Thank you.&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;&lt;/p&gt;\n'),
(9, 'BPH', 120, '&lt;p&gt;Welcome to BPH section.&lt;/p&gt;\n', '&lt;p&gt;Thank you for your test for BPH.&lt;/p&gt;\n');

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
(6, 12, '&lt;p&gt;Is debit good?&lt;/p&gt;\n', 1, 'No', 'I dont know.', 'Yes', 'Depends');

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
(32, 'student', 'Saroj', '', 'Tripathi', 'student@student.com', 'cd73502828457d15655bbd7a63fb0bc8', 3),
(33, 'pravhu', 'Pravhu', '', 'Gurung', 'admin44@admin.com', 'e00cf25ad42683b3df678c61f42c6bda', 1),
(34, 'teacher', 'Raju', 'Prasad', 'Lamsal', 'teacher@teacher.com', '41c8949aa55b8cb5dbec662f34b62df3', 2),
(35, 'test1', 'Test', '', 'User', 'test@test.com', 'e00cf25ad42683b3df678c61f42c6bda', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `personaldata`
--
ALTER TABLE `personaldata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
