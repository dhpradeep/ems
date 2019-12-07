-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2019 at 07:09 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `programId` int(11) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `programId`, `description`) VALUES
(1, 'Photoshop and Indesign', 1, 'Photoshop and Indesign course in one section'),
(4, 'Basic Mathematics', 1 , ''),
(5, 'Computer Fundamental', 1, ''),
(6, 'paragraph', 1, ''),
(7, 'passage', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `connection`
--

CREATE TABLE `connection` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `resourceId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contactdetails`
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
-- Dumping data for table `contactdetails`
--

INSERT INTO `contactdetails` (`id`, `userId`, `municipality`, `wardNo`, `area`, `district`, `zone`, `mobileNo`, `telephoneNo`, `blockNo`, `guardianName`, `guardianRelation`, `guardianContact`) VALUES
(1, 2, '', '', 'Pokhara', 'Kaski', 'Gandaki', '9806570669', '', '', '', '', ''),
(2, 3, 'Pokhara', '', 'Ratnachowk', 'Kaski', 'Gandaki', '9846751280', '', '', '', '', ''),
(3, 4, 'Pokhara', '', 'Ratnachowk', 'Kaski', 'Gandaki', '9815150106', '', '', '', '', ''),
(4, 5, 'Pokhara', '', 'Ratnachowk', 'Kaski', 'Gandaki', '9867861977', '', '', '', '', ''),
(5, 6, 'Pokhara', '', 'Ratnachowk', 'Kaski', 'Gandaki', '9840010302', '', '', '', '', ''),
(6, 7, 'Pokhara', '', 'Ratnachowk', 'Kaski', 'Gandaki', '9846531569', '', '', '', '', ''),
(7, 8, 'Pokhara', '', 'Ratnachowk', 'Kaski', 'Gandaki', '9804185335', '', '', '', '', ''),
(8, 9, 'Pokhara', '', 'Ratnachowk', 'Kaski', 'Gandaki', '9806725266', '', '', '', '', ''),
(9, 10, 'Pokhara', '', 'Ratnachowk', 'Kaski', 'Gandaki', '9846845849', '', '', '', '', ''),
(10, 11, 'Pokhara', '', 'Ratnachowk', 'Kaski', 'Gandaki', '9846584393', '', '', '', '', ''),
(11, 12, 'Pokhara', '', 'Ratnachowk', 'Kaski', 'Gandaki', '1234567890', '', '', '', '', ''),
(12, 13, 'Pokhara', '', 'Ratnachowk', 'Kaski', 'Gandaki', '1231231231', '', '', '', '', ''),
(13, 14, 'Pokhara', '', 'Ratnachowk', 'Kaski', 'Gandaki', '1231231231', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
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
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `userId`, `formNo`, `entranceNo`, `eligible`, `remarks`, `marksheet_see`, `marksheet_11`, `marksheet_12`, `transcript`, `characterCertificate_see`, `characterCertificate_12`, `citizenship`, `photo`) VALUES
(1, 2, '1', '1', 'false', '', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false'),
(2, 3, '2', '2', 'false', '', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false'),
(3, 4, '3', '3', 'false', '', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false'),
(4, 5, '4', '4', 'false', '', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false'),
(5, 6, '5', '5', 'false', '', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false'),
(6, 7, '6', '6', 'false', '', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false'),
(7, 8, '7', '7', 'false', '', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false'),
(8, 9, '8', '8', 'false', '', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false'),
(9, 10, '9', '9', 'false', '', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false'),
(10, 11, '10', '10', 'false', '', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false'),
(11, 12, '11', '11', 'false', '', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false'),
(12, 13, '12', '12', 'false', '', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false'),
(13, 14, '13', '13', 'false', '', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `education`
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

-- --------------------------------------------------------

--
-- Table structure for table `passage`
--

CREATE TABLE `passage` (
  `id` int(11) NOT NULL,
  `passageTitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `passage` varchar(10000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personaldata`
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
-- Dumping data for table `personaldata`
--

INSERT INTO `personaldata` (`id`, `userId`, `password`, `programId`, `doa`, `dobAd`, `dobBs`, `gender`, `nationality`, `fatherName`) VALUES
(1, 2, 'eversoft1', '1', '2019-08-20', '2019-08-20', '2019-08-20', 2, 'Nepali', ''),
(2, 3, 'eversoft2', '2', '2019-08-20', '2019-08-20', '2019-08-20', 2, 'Nepali', ''),
(3, 4, 'eversoft3', '1', '2019-08-20', '2019-08-20', '2019-08-20', 2, 'Nepali', ''),
(4, 5, 'eversoft4', '1', '2019-08-20', '2019-08-20', '2019-08-20', 1, 'Nepali', ''),
(5, 6, 'eversoft5', '1', '2019-08-20', '2019-08-20', '2019-08-20', 2, 'Nepali', ''),
(6, 7, 'eversoft6', '1', '2019-08-20', '2019-08-20', '2019-08-20', 2, 'Nepali', ''),
(7, 8, 'eversoft7', '1', '2019-08-20', '2019-08-20', '2019-08-20', 1, 'Nepali', ''),
(8, 9, 'eversoft8', '1', '2019-08-20', '2019-08-20', '2019-08-20', 1, 'Nepali', ''),
(9, 10, 'eversoft9', '1', '2019-08-20', '2019-08-20', '2019-08-20', 1, 'Nepali', ''),
(10, 11, 'eversoft10', '2', '2019-08-20', '2019-08-20', '2019-08-20', 2, 'Nepali', ''),
(11, 12, 'eversoft11', '1', '2019-08-20', '2019-08-20', '2019-08-20', 1, 'Nepali', ''),
(12, 13, 'eversoft12', '1', '2019-08-20', '2019-08-20', '2019-08-20', 2, 'Nepali', ''),
(13, 14, 'eversoft13', '1', '2019-08-20', '2019-08-20', '2019-08-20', 1, 'Nepali', '');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `duration` int(11) NOT NULL,
  `welcome` varchar(1200) COLLATE utf8_unicode_ci NOT NULL,
  `thanks` varchar(1200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `name`, `duration`, `welcome`, `thanks`) VALUES
(1, 'Graphic Designing Workshop', 10, '&lt;h2&gt;Graphic Designing workshop test exam.&lt;/h2&gt;\n\n&lt;h3&gt;&lt;span class=&quot;marker&quot;&gt;&lt;strong&gt;Rules:&lt;/strong&gt;&lt;/span&gt;&lt;/h3&gt;\n\n&lt;blockquote&gt;\n&lt;ul&gt;\n	&lt;li&gt;You can&amp;#39;t use Internet or friends help.&lt;/li&gt;\n	&lt;li&gt;Once you have been press the &lt;strong&gt;&amp;#39;take test&amp;#39;&lt;/strong&gt;&amp;nbsp;button than your time has been start, so you can&amp;#39;t go back.&lt;/li&gt;\n	&lt;li&gt;All Questions are in MCQ(Multiple choice questions) format.&lt;/li&gt;\n&lt;/ul&gt;\n&lt;/blockquote&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n', '&lt;p&gt;Thank you for your participation!&lt;br /&gt;\nYour result will publish soon.&lt;/p&gt;\n'),
(2, 'BCA', 500, '&lt;p&gt;welcome sample message for &lt;strong&gt;BCA&lt;/strong&gt;&lt;/p&gt;\n', '&lt;p&gt;Thank you message for &lt;strong&gt;BCA&lt;/strong&gt;&lt;/p&gt;\n');

-- --------------------------------------------------------

--
-- Table structure for table `questionmodel`
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
-- Dumping data for table `questionmodel`
--

INSERT INTO `questionmodel` (`id`, `programId`, `categoryId`, `minLevel`, `maxLevel`, `noOfQuestions`) VALUES
(7, 1, 1, 1, 1, 10),
(8, 1, 1, 3, 3, 5),
(10, 1, 1, 2, 2, 10),
(11, 2, 4, 1, 1, 1),
(12, 2, 5, 2, 2, 1),
(13, 2, 1, 2, 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `programId` int(11) COLLATE utf8_unicode_ci NOT NULL,
  `question` varchar(1200) COLLATE utf8_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL,
  `answer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `choice2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `choice3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `choice4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `passageId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `categoryId`, `programId`, `question`, `level`, `answer`, `choice2`, `choice3`, `choice4`, `passageId`) VALUES
(1, 1, 1, 'What does the Eyedropper tool do?', 1, 'Selects the color at the cursor', 'Paints a single dot of color at the cursor', 'Creates a histogram of the area around the cursor', 'Fades the colors of an area centered on the cursor', NULL),
(2, 1, 1, '&lt;strong&gt;&amp;quot;Layers&amp;quot;&lt;/strong&gt; in Photoshop are:', 1, 'Images stacked on top of each other', 'Filters that have been applied to the image', 'Previous versions of an image', 'Color and brightness correction', NULL),
(3, 1, 1, 'How do you add a page in layout &lt;em&gt;(indesign)&lt;/em&gt;', 1, 'layout / page / add page', 'file / open', 'Under object, Effect', 'Under object, content', NULL),
(4, 1, 1, 'What are smart guides ?', 1, 'lines used to help line up object', 'border around page', 'None of these', 'grids in the background', NULL),
(5, 1, 1, 'What three color make up visible light spectrum ?', 1, 'RGB', 'CMYK', 'CMY', 'RGY', NULL),
(6, 1, 1, 'What does &lt;strong&gt;Control+shift+I&lt;/strong&gt; does in photoshop during selection?', 1, 'Inverse selection', 'New document', 'Desaturate', 'New layer', NULL),
(7, 1, 1, 'which of these is not a selection tool ?', 1, 'Pen Tool', 'Polygonal Lasso tool', 'Magnetic Lasso Tool', 'Lasso Tool', NULL),
(8, 1, 1, '&lt;strong&gt;&amp;quot;B&amp;quot;&lt;/strong&gt; is the keyboard shortcut in photoshop for :', 1, 'PaintBrush', 'Select Box', 'Blur', 'Bold', NULL),
(9, 1, 1, 'A layer style that outlines an object or type is called .......', 1, 'Stroke', 'Gradient Overlay', 'Warp', '3d modelling', NULL),
(10, 1, 1, 'What does 0% opacity does ?', 1, 'Transparent', 'Gradient Overlay', 'Opaque', 'Lightness', NULL),
(11, 1, 1, 'Which is photoshop default file extension for saving file ?', 3, '.psd', '.png', '.jpg', '.tiff', NULL),
(12, 1, 1, 'what is the standard size of photo paper is ?', 3, '4*6', '4*5', '4*7', '5*7', NULL),
(13, 1, 1, 'How many color can gradient include ?', 3, 'multiple', '2', '3', '1', NULL),
(14, 1, 1, 'Pen tool is primariliy used for :&amp;nbsp;', 3, 'Path', 'Shape', 'Selection', 'None of above', NULL),
(15, 1, 1, 'What is th keyboard shortcut for Zoom tool ?', 3, 'Z', 'Ctrl + Z', 'Alt + Z', 'Shift +Z', NULL),
(16, 1, 1, 'How to select whole canvas through shortcut ?', 2, 'Ctrl + a', 'Ctrl + w', 'Ctrl + Y', 'Ctrl + B', NULL),
(17, 1, 1, 'What is adobe indesign used for ?', 2, 'designing books', 'vector image', 'editing photos', '3d modelling', NULL),
(18, 1, 1, 'What is the use of &lt;strong&gt;CTRL + G&lt;/strong&gt; in layer&amp;nbsp; ?', 2, 'Group layer', 'Merge layer', 'Filter Layer', 'Save layer', NULL),
(19, 1, 1, '&lt;strong&gt;&amp;quot;Levels&amp;quot;&lt;/strong&gt; in Photoshop are:', 2, 'Color and brightness correction', 'Images stacked on top of each other', 'Previous versions of an image', 'Filters that have been applied to the image', NULL),
(20, 1, 1, 'What is canvas also called ?', 2, 'working space', 'editing toolkit', 'tool bar', 'history showing toolbar', NULL),
(21, 1, 1, 'What does &lt;strong&gt;CTRL+SHIFT+S&lt;/strong&gt; does ?', 2, 'Save As', 'Open', 'Save', 'Open As', NULL),
(22, 1, 1, 'Shortcut for resizing brush in photoshop ?', 2, '[ ]', '{ }', '( )', 'V', NULL),
(23, 1, 1, 'what does SHIFT does during selection ?', 2, 'Add', 'Substract', 'deselect', 'multiply', NULL),
(24, 1, 1, 'What is the shortcut key for Showing Text designing toolbar ?', 2, 'Ctrl + T', 'Ctrl+Y', 'Ctrl + Q', 'Ctrl + K', NULL),
(25, 1, 1, 'what does &lt;strong&gt;ALT&lt;/strong&gt; does during selection ?', 2, 'deselect', 'Substract', 'Add', 'multiply', NULL),
(26, 5, 1, 'What is the full form of &lt;strong&gt;BCA ?&lt;/strong&gt;', 2, 'bachelors in computer application', 'bachelors in computer architecture', 'bachelors in co-operative application', 'bachelors in computer engineer', NULL),
(27, 4, 1, 'Addition of 2 + 2 ?', 1, '4', '3', '2', '5', NULL),
(28, 6, 1, '&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum ha&lt;/p&gt;\n\n&lt;p&gt;(Q1-5)&lt;/p&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n\n&lt;p&gt;Q1. djaadjldajl&amp;nbsp;&lt;/p&gt;\n', 1, '1', '2', '3', '4', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `record`
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
-- Dumping data for table `record`
--

INSERT INTO `record` (`id`, `examId`, `userId`, `categoryId`, `questionId`, `question`, `userAnswer`, `answer`, `choice2`, `choice3`, `choice4`, `result`) VALUES
(250, 12, 3, 4, 27, 'Addition of 2 + 2 ?', NULL, '4', '3', '2', '5', 0),
(251, 12, 3, 5, 26, 'What is the full form of &lt;strong&gt;BCA ?&lt;/strong&gt;', NULL, 'bachelors in computer application', 'bachelors in computer architecture', 'bachelors in co-operative application', 'bachelors in computer engineer', 0),
(252, 12, 3, 1, 16, 'How to select whole canvas through shortcut ?', NULL, 'Ctrl + a', 'Ctrl + w', 'Ctrl + Y', 'Ctrl + B', 0),
(253, 12, 3, 1, 17, 'What is adobe indesign used for ?', NULL, 'designing books', 'vector image', 'editing photos', '3d modelling', 0),
(254, 12, 3, 1, 18, 'What is the use of &lt;strong&gt;CTRL + G&lt;/strong&gt; in layer&amp;nbsp; ?', NULL, 'Group layer', 'Merge layer', 'Filter Layer', 'Save layer', 0),
(255, 12, 3, 1, 19, '&lt;strong&gt;&amp;quot;Levels&amp;quot;&lt;/strong&gt; in Photoshop are:', NULL, 'Color and brightness correction', 'Images stacked on top of each other', 'Previous versions of an image', 'Filters that have been applied to the image', 0),
(256, 12, 3, 1, 20, 'What is canvas also called ?', NULL, 'working space', 'editing toolkit', 'tool bar', 'history showing toolbar', 0),
(257, 12, 3, 1, 21, 'What does &lt;strong&gt;CTRL+SHIFT+S&lt;/strong&gt; does ?', NULL, 'Save As', 'Open', 'Save', 'Open As', 0),
(258, 12, 3, 1, 22, 'Shortcut for resizing brush in photoshop ?', NULL, '[ ]', '{ }', '( )', 'V', 0),
(259, 12, 3, 1, 23, 'what does SHIFT does during selection ?', NULL, 'Add', 'Substract', 'deselect', 'multiply', 0),
(260, 12, 3, 1, 24, 'What is the shortcut key for Showing Text designing toolbar ?', NULL, 'Ctrl + T', 'Ctrl+Y', 'Ctrl + Q', 'Ctrl + K', 0),
(261, 12, 3, 1, 25, 'what does &lt;strong&gt;ALT&lt;/strong&gt; does during selection ?', NULL, 'deselect', 'Substract', 'Add', 'multiply', 0),
(274, 14, 11, 4, 27, 'Addition of 2 + 2 ?', NULL, '4', '3', '2', '5', 0),
(275, 14, 11, 5, 26, 'What is the full form of &lt;strong&gt;BCA ?&lt;/strong&gt;', NULL, 'bachelors in computer application', 'bachelors in computer architecture', 'bachelors in co-operative application', 'bachelors in computer engineer', 0),
(276, 14, 11, 1, 16, 'How to select whole canvas through shortcut ?', NULL, 'Ctrl + a', 'Ctrl + w', 'Ctrl + Y', 'Ctrl + B', 0),
(277, 14, 11, 1, 17, 'What is adobe indesign used for ?', NULL, 'designing books', 'vector image', 'editing photos', '3d modelling', 0),
(278, 14, 11, 1, 18, 'What is the use of &lt;strong&gt;CTRL + G&lt;/strong&gt; in layer&amp;nbsp; ?', NULL, 'Group layer', 'Merge layer', 'Filter Layer', 'Save layer', 0),
(279, 14, 11, 1, 19, '&lt;strong&gt;&amp;quot;Levels&amp;quot;&lt;/strong&gt; in Photoshop are:', NULL, 'Color and brightness correction', 'Images stacked on top of each other', 'Previous versions of an image', 'Filters that have been applied to the image', 0),
(280, 14, 11, 1, 20, 'What is canvas also called ?', NULL, 'working space', 'editing toolkit', 'tool bar', 'history showing toolbar', 0),
(281, 14, 11, 1, 21, 'What does &lt;strong&gt;CTRL+SHIFT+S&lt;/strong&gt; does ?', NULL, 'Save As', 'Open', 'Save', 'Open As', 0),
(282, 14, 11, 1, 22, 'Shortcut for resizing brush in photoshop ?', NULL, '[ ]', '{ }', '( )', 'V', 0),
(283, 14, 11, 1, 23, 'what does SHIFT does during selection ?', NULL, 'Add', 'Substract', 'deselect', 'multiply', 0),
(284, 14, 11, 1, 24, 'What is the shortcut key for Showing Text designing toolbar ?', NULL, 'Ctrl + T', 'Ctrl+Y', 'Ctrl + Q', 'Ctrl + K', 0),
(285, 14, 11, 1, 25, 'what does &lt;strong&gt;ALT&lt;/strong&gt; does during selection ?', NULL, 'deselect', 'Substract', 'Add', 'multiply', 0);

-- --------------------------------------------------------

--
-- Table structure for table `timetrack`
--

CREATE TABLE `timetrack` (
  `id` int(11) NOT NULL COMMENT 'examId for others',
  `userId` int(11) NOT NULL,
  `programId` int(11) NOT NULL,
  `remainingTime` int(11) NOT NULL,
  `isSubmitted` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `timetrack`
--

INSERT INTO `timetrack` (`id`, `userId`, `programId`, `remainingTime`, `isSubmitted`) VALUES
(12, 3, 2, 3516, 'false'),
(14, 11, 2, 29565, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
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
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`id`, `username`, `fname`, `mname`, `lname`, `email`, `passwordHash`, `role`) VALUES
(1, 'admin', 'Pradip', NULL, 'Dhakal', 'dhpradeep25@gmail.com', '7488e331b8b64e5794da3fa4eb10ad5d', 1),
(2, 'niruta1', 'Niruta', '', 'Shrestha', 'nirutastha24@gmail.com', 'f7434565370befd8f9cec1626d018fca', 3),
(3, 'asmita2', 'Asmita', '', 'Pokhrel', 'asmitapokhrel89@gmail.com', '3dd12d38cad25e3831329d939ba804ba', 3),
(4, 'santoshi3', 'Santoshi', '', 'Regmi', 'santoshireg@gmail.com', 'f83976fd055906fd24a415a00a3385fd', 3),
(5, 'sagun4', 'Sagun', '', 'Baral', 'sagunbaral30@gmail.com', '227fba76c15f76286c0489a06fee1a7f', 3),
(6, 'puspa5', 'Puspa', '', 'Khanal', 'pujusmile037@gmail.com', 'b3d43e3cf364cb339360c5411fe147b7', 3),
(7, 'sapana6', 'Sapana', '', 'Timilsina', 'timilsinasapana20@gmail.com', 'edad3cebe4c3315c8230795cc33f151a', 3),
(8, 'shiva7', 'Shiva', '', 'Aryal', 'shivaaryal62@gmail.com', '22a8f408f8bb5dc85849cd3f341c0ea8', 3),
(9, 'subanta8', 'Subanta', '', 'Poudel', 'subantaleeonel@gmail.com', '4e74e4a47e273f54cd0df7f477986f79', 3),
(10, 'shiva9', 'Shiva', 'Kumar', 'Gurung', 'shivakgrg@gmail.com', '10ac75f45988b1c7f6bed60265d71c17', 3),
(11, 'jyotsna10', 'Jyotsna', '', 'Udas', 'jyotsnajosu8493@gmail.com', 'aed2bdab464533897564cb8c0a10c773', 3),
(12, 'jeevan11', 'Jeevan', '', 'Subedi', 'jeevan@student.com', 'fd008eac4ba7789b3f1f7bb23f7143d4', 3),
(13, 'samjhana12', 'Samjhana', '', 'Timilsina', 'samjhana@student.com', '4bf659c7db089092212b049219f93c89', 3),
(14, 'nabin13', 'Nabin', '', 'Poudel', 'nabin@student.com', '416c2aa3347bac9e096eee6d68e787dc', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `connection`
--
ALTER TABLE `connection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactdetails`
--
ALTER TABLE `contactdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passage`
--
ALTER TABLE `passage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personaldata`
--
ALTER TABLE `personaldata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionmodel`
--
ALTER TABLE `questionmodel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetrack`
--
ALTER TABLE `timetrack`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `connection`
--
ALTER TABLE `connection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contactdetails`
--
ALTER TABLE `contactdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `passage`
--
ALTER TABLE `passage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personaldata`
--
ALTER TABLE `personaldata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `questionmodel`
--
ALTER TABLE `questionmodel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;

--
-- AUTO_INCREMENT for table `timetrack`
--
ALTER TABLE `timetrack`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'examId for others', AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'userID for others', AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
