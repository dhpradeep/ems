-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 18. Aug 2019 um 22:17
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
(12, 'Eversoft', 'Eversoft for all');

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
(17, 54, 'Lekhnath', '1', '', 'Kaski', '', '988888866669', '88', '', 'NO', '', ''),
(31, 68, '', '', '', '', '', '', '', '', '', '', ''),
(32, 69, '', '', '', '', '', '', '', '', '', '', '');

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
(16, 54, '22344', '22322', 'true', 'Transcript to submit.', 'true', 'true', 'true', 'false', 'true', 'true', 'true', 'true'),
(30, 68, '', '222', 'false', '', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false'),
(31, 69, '', '22', 'false', '', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false');

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
(36, 54, '1', '', 'AMHSS', 'Nepal', 2015, '91'),
(37, 54, '2', 'Science', 'AMHSS', 'HSEB', 2017, '83');

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
(18, 54, 'eversoft22322', '8', '2019-07-30', '2019-08-11', '2019-08-11', 1, 'Nepal', 'Danu'),
(32, 68, 'eversoft222', '', '2019-08-18', '0000-00-00', '', 0, 'Nepali', ''),
(33, 69, 'eversoft22', '', '2019-08-18', '0000-00-00', '', 0, 'Nepali', '');

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
(8, 'BCA', 90, '&lt;h3&gt;&lt;strong&gt;Welcome to BCA Entrance Exam.&lt;/strong&gt;&lt;/h3&gt;\n', '&lt;h3&gt;&lt;strong&gt;Thank you&lt;/strong&gt;&lt;/h3&gt;\n');

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
(11, 2, 12, 2, 2, 1),
(13, 2, 11, 1, 1, 10),
(14, 8, 4, 2, 2, 2),
(15, 8, 11, 1, 1, 4),
(16, 8, 12, 1, 1, 2),
(20, 8, 11, 1, 1, 3),
(21, 8, 11, 1, 1, 4);

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
(4, 4, 'Who is famous for formula to calculate hypotenuse for right angle traingle?\r\n', 2, 'Pythagorus', 'Niels Bohr', 'Einstein', 'Newton'),
(5, 11, 'Which is not a programming language?\r\n', 3, 'Lotus', 'C', 'R', 'Java'),
(6, 12, 'Is debit&lt;strong&gt; good&lt;/strong&gt;?\r\n', 1, 'No', 'I dont know.', 'Yes', 'Depends'),
(7, 11, 'Who is father of Computer?\r\n', 1, 'Charles Babbage', 'Niels Bohr', 'Lady Augusta', 'Steve Jobs'),
(8, 11, 'What is binary of 7?\r\n', 1, '111', '101', '10', '1111'),
(9, 11, 'What is full form of RAM?\r\n', 1, 'Random Access Memory', 'Ram And Manish', 'Read Access Memory', 'Read And Memory'),
(10, 12, 'Who is responsible for Eversoft finance?\r\n', 1, 'Pradip', 'Saroj', 'Raju', 'Pravhu'),
(11, 12, 'What is the cost of Web Hosting in Eversoft (p.a)?\r\n', 1, '1250', '5000', '200', '340'),
(12, 4, 'Which one is a prime number?\r\n', 1, '13', '21', '25', '18'),
(13, 4, 'What is value of 3! ?\r\n', 2, '6', '9', '21', '27'),
(14, 12, 'When was Eversoft started?\r\n', 2, '2015', '2017', '2018', '2014'),
(15, 11, 'How are you?', 1, '2', '3', '1', '9');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `record`
--

CREATE TABLE `record` (
  `id` int(11) NOT NULL,
  `examId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `questionId` int(11) NOT NULL,
  `question` varchar(1200) COLLATE utf8_unicode_ci NOT NULL,
  `userAnswer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `answer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `choice2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `choice3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `choice4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `result` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `record`
--

INSERT INTO `record` (`id`, `examId`, `userId`, `categoryId`, `questionId`, `question`, `userAnswer`, `answer`, `choice2`, `choice3`, `choice4`, `result`) VALUES
(191, 22, 54, 4, 4, 'Who is famous for formula to calculate hypotenuse for right angle traingle?\r\n', NULL, 'Pythagorus', 'Niels Bohr', 'Einstein', 'Newton', 0),
(192, 22, 54, 4, 13, 'What is value of 3! ?\r\n', NULL, '6', '9', '21', '27', 0),
(193, 22, 54, 11, 7, 'Who is father of Computer?\r\n', NULL, 'Charles Babbage', 'Niels Bohr', 'Lady Augusta', 'Steve Jobs', 0),
(194, 22, 54, 11, 8, 'What is binary of 7?\r\n', NULL, '111', '101', '10', '1111', 0),
(195, 22, 54, 11, 9, 'What is full form of RAM?\r\n', NULL, 'Random Access Memory', 'Ram And Manish', 'Read Access Memory', 'Read And Memory', 0),
(196, 22, 54, 11, 15, 'How are you?', NULL, '2', '3', '1', '9', 0),
(197, 22, 54, 12, 6, 'Is debit&lt;strong&gt; good&lt;/strong&gt;?\r\n', NULL, 'No', 'I dont know.', 'Yes', 'Depends', 0),
(198, 22, 54, 12, 11, 'What is the cost of Web Hosting in Eversoft (p.a)?\r\n', NULL, '1250', '5000', '200', '340', 0),
(199, 22, 54, 11, 7, 'Who is father of Computer?\r\n', NULL, 'Charles Babbage', 'Niels Bohr', 'Lady Augusta', 'Steve Jobs', 0),
(200, 22, 54, 11, 8, 'What is binary of 7?\r\n', NULL, '111', '101', '10', '1111', 0),
(201, 22, 54, 11, 9, 'What is full form of RAM?\r\n', NULL, 'Random Access Memory', 'Ram And Manish', 'Read Access Memory', 'Read And Memory', 0),
(202, 22, 54, 11, 7, 'Who is father of Computer?\r\n', NULL, 'Charles Babbage', 'Niels Bohr', 'Lady Augusta', 'Steve Jobs', 0),
(203, 22, 54, 11, 8, 'What is binary of 7?\r\n', NULL, '111', '101', '10', '1111', 0),
(204, 22, 54, 11, 9, 'What is full form of RAM?\r\n', NULL, 'Random Access Memory', 'Ram And Manish', 'Read Access Memory', 'Read And Memory', 0),
(205, 22, 54, 11, 15, 'How are you?', NULL, '2', '3', '1', '9', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `timetrack`
--

CREATE TABLE `timetrack` (
  `id` int(11) NOT NULL COMMENT 'examId for others',
  `userId` int(11) NOT NULL,
  `programId` int(11) NOT NULL,
  `remainingTime` int(11) NOT NULL,
  `isSubmitted` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `timetrack`
--

INSERT INTO `timetrack` (`id`, `userId`, `programId`, `remainingTime`, `isSubmitted`) VALUES
(22, 54, 8, 0, 'true');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `userlogin`
--

CREATE TABLE `userlogin` (
  `id` int(11) NOT NULL COMMENT 'userID for others',
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
(54, 'saroj22322', 'Saroj', '', 'Tripathi', 'saroj@admin.com', '11d3d3a67cd34bfc05ca02bff3fd55de', 3),
(68, 'pradip222', 'Pradip', '', '', '', 'bd1e1f105485d1dfab0ebfc0de3214be', 3),
(69, 'pradip22', 'Pradip', '', '', '', '71b01924a11a127da7122628a813a15b', 3);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT für Tabelle `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT für Tabelle `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT für Tabelle `personaldata`
--
ALTER TABLE `personaldata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT für Tabelle `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `questionmodel`
--
ALTER TABLE `questionmodel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT für Tabelle `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT für Tabelle `record`
--
ALTER TABLE `record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT für Tabelle `timetrack`
--
ALTER TABLE `timetrack`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'examId for others', AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT für Tabelle `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'userID for others', AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
