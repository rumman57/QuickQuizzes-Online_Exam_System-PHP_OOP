-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2017 at 06:07 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myexam`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminregistraion`
--

CREATE TABLE `adminregistraion` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_un_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminregistraion`
--

INSERT INTO `adminregistraion` (`id`, `firstName`, `lastName`, `userName`, `email`, `password`, `date`, `admin_un_id`) VALUES
(8, 'Raqibul Hasan', 'Rumman', 'rumman', 'rumman142228@gmail.com', '$2y$12$4LNR2T5aY24RQAvtFvu5RuXnyJsVEY.y9u.cGYZMoOmnalasbGuQm', '2017-01-25 15:40:33', 'JmsFfxA)m6Zn%%$41u0l');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `ans` varchar(255) NOT NULL,
  `qid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `gid` int(11) DEFAULT NULL,
  `publish` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `ans`, `qid`, `sid`, `gid`, `publish`) VALUES
(55, '6', 70, 1, 19, 1),
(57, 'Yes', 80, 1, 19, 1),
(58, '26', 66, 1, 19, 1),
(59, '8', 67, 1, 19, 1),
(60, '17', 27, 1, 19, 1),
(61, '7', 27, 1, 19, 1),
(62, '6', 27, 1, 19, 1),
(65, '8', 74, 1, 19, 1),
(67, '20', 22, 1, 19, 1),
(68, '88', 72, 1, 19, 1),
(69, '7', 21, 1, 19, 1),
(70, '15', 67, 2, 19, 1),
(71, '7', 66, 2, 19, 1),
(72, '7', 25, 2, 19, 1),
(74, '88', 72, 2, 19, 1),
(75, '88', 72, 1, 19, 1),
(76, '26', 66, 1, 19, 1),
(77, '20', 22, 1, 19, 1),
(78, '8', 25, 1, 19, 1),
(79, 'Jackfruit', 82, 1, 19, 1),
(80, '8', 65, 1, 19, 1),
(81, '5', 21, 1, 19, 1),
(82, '8', 64, 1, 19, 1),
(83, '6', 22, 1, 19, 1),
(84, '8', 69, 1, 19, 1),
(85, '6', 71, 1, 19, 1),
(86, '88', 72, 1, 19, 1),
(87, '26', 66, 2, 19, 1),
(88, '31', 24, 2, 19, 1),
(89, '36', 26, 2, 19, 1),
(90, '8', 69, 2, 19, 1),
(91, '8', 74, 2, 19, 1),
(92, 'database', 101, 1, 26, 0),
(93, 'POST admin.php', 100, 1, 26, 0),
(94, 'Methods', 102, 1, 26, 0),
(95, 'Public', 103, 1, 26, 0),
(96, 'session_start()', 111, 1, 26, 0),
(97, 'one or more word characters and/or hypens', 98, 1, 26, 0),
(98, 'PHPSESSIONID', 109, 1, 26, 0),
(99, 'Abstraction', 104, 1, 26, 0),
(100, 'either nothing or a forward slash', 97, 1, 26, 0),
(101, 'functions.include.php', 99, 1, 26, 0),
(102, 'file_get_contents()', 89, 1, 26, 0),
(103, 'Composition', 105, 1, 26, 0),
(104, '180', 110, 1, 26, 0),
(105, 'Nothing happens', 112, 1, 26, 0),
(106, 'URL rewriting', 112, 1, 26, 0),
(107, '6', 96, 1, 26, 0),
(108, '7', 96, 1, 26, 0),
(109, 'Methods', 102, 4, 26, 0),
(110, '4', 107, 4, 26, 0),
(111, 'REQUEST', 94, 4, 26, 0),
(112, 'VALIDATE_MAIL', 95, 4, 26, 0),
(113, 'arrfile()', 88, 4, 26, 0),
(114, 'function.inc.php', 101, 4, 26, 0),
(115, '5', 96, 4, 26, 0),
(116, '180', 110, 4, 26, 0),
(117, 'Public', 103, 4, 26, 0),
(118, 'POST admin.php', 100, 4, 26, 0),
(119, '$GET ', 92, 4, 26, 0),
(120, '$_REQUEST', 93, 4, 26, 0),
(121, 'Abstraction', 106, 4, 26, 0),
(122, 'filetime()', 87, 4, 26, 0),
(123, 'NEXT', 94, 4, 26, 0),
(124, 'one or more word characters and/or hypens', 98, 4, 26, 0),
(125, '180', 110, 4, 26, 0),
(126, 'Public', 103, 4, 26, 0),
(127, 'GET ', 92, 4, 26, 0),
(128, 'session.save_handler', 108, 4, 26, 0),
(129, 'VALIDATE_MAIL', 95, 4, 26, 0),
(130, 'fgets()', 90, 4, 26, 0),
(131, 'begin_session()', 111, 4, 26, 0),
(132, 'Session', 112, 4, 26, 0),
(133, 'functions.include.php', 99, 4, 26, 0),
(134, 'Attributes', 102, 4, 26, 0),
(135, 'database', 101, 4, 26, 0),
(136, 'Strong Aggregation', 105, 4, 26, 0),
(137, 'VALIDATE_EMAIL', 95, 4, 26, 0),
(138, 'session.save', 108, 4, 26, 0),
(139, '360', 110, 4, 26, 0),
(140, 'Friendly', 103, 4, 26, 0),
(141, 'Cookie', 112, 4, 26, 0),
(142, 'database', 101, 4, 26, 0),
(143, '$_REQUEST', 93, 4, 26, 0),
(144, 'PHPSESSID', 109, 4, 26, 0),
(145, 'POST admin.php', 100, 4, 26, 0),
(146, '6', 96, 4, 26, 0),
(147, 'either nothing or a forward slash', 97, 4, 26, 0),
(148, 'Strong Aggregation', 105, 4, 26, 0),
(149, 'Composition', 105, 4, 26, 0),
(150, 'functions.inc.php', 99, 4, 26, 0),
(151, 'Operations', 106, 4, 26, 0),
(152, 'file_get_contents()', 89, 4, 26, 0);

-- --------------------------------------------------------

--
-- Table structure for table `examcondition`
--

CREATE TABLE `examcondition` (
  `id` int(11) NOT NULL,
  `gid` int(11) DEFAULT NULL,
  `sid` int(11) NOT NULL,
  `econdition` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examcondition`
--

INSERT INTO `examcondition` (`id`, `gid`, `sid`, `econdition`) VALUES
(6, 19, 1, 2),
(7, 19, 2, 2),
(8, 26, 1, 2),
(15, 26, 4, 2),
(16, 26, 4, 2),
(17, 26, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `examgroups`
--

CREATE TABLE `examgroups` (
  `id` int(11) NOT NULL,
  `groupName` varchar(255) NOT NULL,
  `examName` varchar(255) NOT NULL,
  `totalQuestion` int(11) NOT NULL,
  `totalExamShowQues` int(11) NOT NULL,
  `examRunningTime` int(11) NOT NULL,
  `eachQuestionTime` int(11) NOT NULL,
  `startingTime` datetime NOT NULL,
  `admin_id` int(11) NOT NULL,
  `admin_code` varchar(255) NOT NULL,
  `groupToken` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examgroups`
--

INSERT INTO `examgroups` (`id`, `groupName`, `examName`, `totalQuestion`, `totalExamShowQues`, `examRunningTime`, `eachQuestionTime`, `startingTime`, `admin_id`, `admin_code`, `groupToken`) VALUES
(19, 'CSTE 9th batch', 'Data Structure', 100, 5, 43, 10, '2017-02-10 21:48:00', 8, 'JmsFfxA)m6Zn%%$41u0l', 'SE%@()o%$()MVgvf$D((((666VK(y('),
(24, 'ACCE', 'Chemistry', 324, 234, 345335353, 345, '2017-02-17 02:05:07', 8, 'JmsFfxA)m6Zn%%$41u0l', 'xEBNwZzFdhSMJtsKVTSFUk18qcm~Ig'),
(25, 'FTNS', 'Food Technology', 43, 34, 344535, 34, '2019-03-10 20:48:00', 8, 'JmsFfxA)m6Zn%%$41u0l', '0XXzhH7Pu3~Kzw2H1gHv{S0xeo6Cvt'),
(26, 'PHP', 'Test PHP Skills', 100, 15, 7205354, 60, '2017-02-17 12:00:00', 8, 'JmsFfxA)m6Zn%%$41u0l', 'qDMNBOPjwOM}otCCXcN8nKhsowxKfm');

-- --------------------------------------------------------

--
-- Table structure for table `groupquestions`
--

CREATE TABLE `groupquestions` (
  `id` int(11) NOT NULL,
  `questionTitle` varchar(255) NOT NULL,
  `mulfiop` varchar(255) NOT NULL,
  `mulsiop` varchar(255) NOT NULL,
  `multhop` varchar(255) NOT NULL,
  `mulfoop` varchar(255) NOT NULL,
  `mulcs` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `tffiop` varchar(255) NOT NULL,
  `tfsiop` varchar(255) NOT NULL,
  `tfcs` varchar(255) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `group_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groupquestions`
--

INSERT INTO `groupquestions` (`id`, `questionTitle`, `mulfiop`, `mulsiop`, `multhop`, `mulfoop`, `mulcs`, `image`, `tffiop`, `tfsiop`, `tfcs`, `group_id`, `group_token`) VALUES
(19, 'what is 4+2 ?', '5', '6', '7', '8', '6', '', '', '', '', 19, 'SE%@()o%$()MVgvf$D((((666VK(y('),
(20, 'what is 9+2 ?', '5', '6', '11', '8', '11', '', '', '', '', 19, 'SE%@()o%$()MVgvf$D((((666VK(y('),
(21, 'what is 4/2 ?', '5', '6', '7', '2', '2', '', '', '', '', 19, 'SE%@()o%$()MVgvf$D((((666VK(y('),
(22, 'what is 4*5 ?', '5', '6', '20', '8', '20', '', '', '', '', 19, 'SE%@()o%$()MVgvf$D((((666VK(y('),
(24, 'what is 9+22 ?', '31', '6', '7', '8', '31', '', '', '', '', 19, 'SE%@()o%$()MVgvf$D((((666VK(y('),
(25, 'what is 100/10 ?', '5', '10', '7', '8', '10', '', '', '', '', 19, 'SE%@()o%$()MVgvf$D((((666VK(y('),
(26, 'what is 6*6 ?', '5', '6', '36', '8', '36', '', '', '', '', 19, 'SE%@()o%$()MVgvf$D((((666VK(y('),
(27, 'what is 34/2 ?', '5', '6', '7', '17', '17', '', '', '', '', 19, 'SE%@()o%$()MVgvf$D((((666VK(y('),
(28, 'what is 10/5 ?', '5', '2', '7', '8', '2', '', '', '', '', 19, 'SE%@()o%$()MVgvf$D((((666VK(y('),
(64, 'what is 10/5 ?', '5', '2', '7', '8', '2', '', '', '', '', 19, 'SE%@()o%$()MVgvf$D((((666VK(y('),
(65, 'what is 41*2 ?', '82', '6', '7', '8', '82', '', '', '', '', 19, 'SE%@()o%$()MVgvf$D((((666VK(y('),
(66, 'what is 4+22 ?', '5', '6', '7', '26', '26', '', '', '', '', 19, 'SE%@()o%$()MVgvf$D((((666VK(y('),
(67, 'what is 30/2 ?', '5', '6', '15', '8', '15', '', '', '', '', 19, 'SE%@()o%$()MVgvf$D((((666VK(y('),
(69, 'what is 4+25 ?', '5', '29', '7', '8', '29', '', '', '', '', 19, 'SE%@()o%$()MVgvf$D((((666VK(y('),
(70, 'what is 40/2 ?', '20', '6', '7', '8', '20', '', '', '', '', 19, 'SE%@()o%$()MVgvf$D((((666VK(y('),
(71, 'what is 4+23 ?', '5', '6', '27', '8', '27', '', '', '', '', 19, 'SE%@()o%$()MVgvf$D((((666VK(y('),
(72, 'what is 4*22 ?', '5', '6', '7', '88', '88', '', '', '', '', 19, 'SE%@()o%$()MVgvf$D((((666VK(y('),
(73, 'what is 50+2 ?', '52', '6', '7', '8', '52', '', '', '', '', 19, 'SE%@()o%$()MVgvf$D((((666VK(y('),
(74, 'what is 4+29 ?', '5', '6', '33', '8', '33', '', '', '', '', 19, 'SE%@()o%$()MVgvf$D((((666VK(y('),
(75, 'what is 44-12 ?', '5', '32', '7', '8', '32', '', '', '', '', 19, 'SE%@()o%$()MVgvf$D((((666VK(y('),
(77, 'Is this Nishi?', '', '', '', '', '', 'img/10a4f89324.jpg', 'Yes', 'No', 'Yes', 19, 'SE%@()o%$()MVgvf$D((((666VK(y('),
(78, 'Is This Rumman?', '', '', '', '', '', 'img/7f58d7c4f2.jpg', 'Yes', 'No', 'Yes', 19, 'SE%@()o%$()MVgvf$D((((666VK(y('),
(79, 'Is This Shanta ?', '', '', '', '', '', 'img/8e618105c5.jpg', 'Yes', 'No', 'No', 19, 'SE%@()o%$()MVgvf$D((((666VK(y('),
(80, 'Is it a fruit?', '', '', '', '', '', 'img/76822c6578.jpg', 'No', 'Yes', 'No', 19, 'SE%@()o%$()MVgvf$D((((666VK(y('),
(81, 'Is it Mango?', '', '', '', '', '', 'img/5f8b46e1bc.jpg', 'Yes', 'No', 'Yes', 19, 'SE%@()o%$()MVgvf$D((((666VK(y('),
(82, 'What is This ?', 'Mango', 'Pineapple', 'Litchi', 'Jackfruit', 'Pineapple', 'img/8b716b7d18.jpg', '', '', '', 19, 'SE%@()o%$()MVgvf$D((((666VK(y('),
(83, 'Which is better?', 'Java', 'PHP', 'C#', 'C++', 'C#', '', '', '', '', 24, 'xEBNwZzFdhSMJtsKVTSFUk18qcm~Ig'),
(84, 'which language  use   &quot;col-md-8&quot; ?', 'Java', 'Bootstarp', 'HTML', 'CSS', 'Bootstarp', '', '', '', '', 24, 'xEBNwZzFdhSMJtsKVTSFUk18qcm~Ig'),
(85, 'Which is Server Side Language ?', 'HTML', 'CSS', 'PHP', 'C', 'PHP', '', '', '', '', 24, 'xEBNwZzFdhSMJtsKVTSFUk18qcm~Ig'),
(87, 'Which one of the following PHP function is used to determine a fileâ€™s last access time?', 'fileltime()', 'filectime()', 'fileatime()', 'filetime()', 'fileatime()', '', '', '', '', 26, 'qDMNBOPjwOM}otCCXcN8nKhsowxKfm'),
(88, 'Which one of the following function is capable of reading a file into an array?', 'file()', 'arrfile()', 'arr_file()', 'file_arr()', 'file()', '', '', '', '', 26, 'qDMNBOPjwOM}otCCXcN8nKhsowxKfm'),
(89, 'Which one of the following function is capable of reading a file into a string variable?', 'file_contents()', 'file_get_contents()', 'file_get_content()', 'file_content()', 'file_get_contents()', '', '', '', '', 26, 'qDMNBOPjwOM}otCCXcN8nKhsowxKfm'),
(90, 'Which one of the following function is capable of reading a specific number of characters form a file?', 'fgets()', 'fget()', 'fileget()', 'filegets()', 'fgets()', '', '', '', '', 26, 'qDMNBOPjwOM}otCCXcN8nKhsowxKfm'),
(92, 'Which two predefined variables are used to retrieve information from forms?', '$GET &amp; $SET', 'GET &amp; SET', '$_GET &amp; $_SET', '$__GET  &amp; $__SET', '$_GET &amp; $_SET', '', '', '', '', 26, 'qDMNBOPjwOM}otCCXcN8nKhsowxKfm'),
(93, 'Which variable is used to collect form data sent with both the GET and POST methods?', '$BOTH', '$_BOTH', '$REQUEST', '$_REQUEST', '$_REQUEST', '', '', '', '', 26, 'qDMNBOPjwOM}otCCXcN8nKhsowxKfm'),
(94, 'Which one of the following should not be used while sending passwords or other sensitive information?', 'GET', 'POST', 'REQUEST', 'NEXT', 'GET', '', '', '', '', 26, 'qDMNBOPjwOM}otCCXcN8nKhsowxKfm'),
(95, 'To validate an e-mail address, which flag is to be passed to the function filter_var()?', 'FILTER_VALIDATE_EMAIL', 'FILTER_VALIDATE_MAIL', 'VALIDATE_EMAIL', 'VALIDATE_MAIL', 'FILTER_VALIDATE_EMAIL', '', '', '', '', 26, 'qDMNBOPjwOM}otCCXcN8nKhsowxKfm'),
(96, 'How many validation filters like FILTER_VALIDATE_EMAIL are currently available?', '5', '6', '7', '8', '7', '', '', '', '', 26, 'qDMNBOPjwOM}otCCXcN8nKhsowxKfm'),
(97, 'The (|/) tells the server to match ___.', 'nothing', 'forward slash', 'backward slash', 'either nothing or a forward slash', 'either nothing or a forward slash', '', '', '', '', 26, 'qDMNBOPjwOM}otCCXcN8nKhsowxKfm'),
(98, '([w-]+) will match ___.', 'one word characters', 'one or more word characters', 'one or more word characters and/or hypens', 'one or more word characters and hypens', 'one or more word characters and/or hypens', '', '', '', '', 26, 'qDMNBOPjwOM}otCCXcN8nKhsowxKfm'),
(99, 'To declare the function to confirm the deletion you need to add the code to ___.', 'inc.php', 'functions.inc.php', 'include.php', 'functions.include.php', 'functions.inc.php', '', '', '', '', 26, 'qDMNBOPjwOM}otCCXcN8nKhsowxKfm'),
(100, 'Your confirmation form submits your choice, via the ____ method, to ____.', 'GET index.php', 'GET admin.php', 'POST index.php', 'POST admin.php', 'POST admin.php', '', '', '', '', 26, 'qDMNBOPjwOM}otCCXcN8nKhsowxKfm'),
(101, 'When a user confirms that he wishes to delete an entry, that entryâ€™s URL is passed to a function which removes the entry from the ___.', '', '', '', '', '', '', 'database', 'function.inc.php', 'database', 26, 'qDMNBOPjwOM}otCCXcN8nKhsowxKfm'),
(102, 'Which one of the following is displayed below the class name in the class diagrams?', '', '', '', '', '', '', 'Methods', 'Attributes', 'Attributes', 26, 'qDMNBOPjwOM}otCCXcN8nKhsowxKfm'),
(103, '+ is the visibility code for?', '', '', '', '', '', '', 'Public', 'Friendly', 'Public', 26, 'qDMNBOPjwOM}otCCXcN8nKhsowxKfm'),
(104, 'Which relationship is illustrated by a line that begins with an unfilled diamond?', '', '', '', '', '', '', 'Abstraction', 'Aggregation', 'Aggregation', 26, 'qDMNBOPjwOM}otCCXcN8nKhsowxKfm'),
(105, 'If the diamond is filled it depicts which relationship?', '', '', '', '', '', '', 'Composition', 'Strong Aggregation', 'Composition', 26, 'qDMNBOPjwOM}otCCXcN8nKhsowxKfm'),
(106, 'Which one of the following is displayed in the third section of the class diagram?', '', '', '', '', '', '', 'Abstraction', 'Operations', 'Operations', 26, 'qDMNBOPjwOM}otCCXcN8nKhsowxKfm'),
(107, 'How many ways can a session data be stored?', '', '', '', '', '', '', '3', '4', '3', 26, 'qDMNBOPjwOM}otCCXcN8nKhsowxKfm'),
(108, 'Which directive determines how the session information will be stored?', '', '', '', '', '', '', 'session.save_handler', 'session.save', 'session.save_handler', 26, 'qDMNBOPjwOM}otCCXcN8nKhsowxKfm'),
(109, 'Which one of the following is the default PHP session name?', '', '', '', '', '', '', 'PHPSESSID', 'PHPSESSIONID', 'PHPSESSID', 26, 'qDMNBOPjwOM}otCCXcN8nKhsowxKfm'),
(110, 'What is the default number of seconds that cached session pages are made available before the new pages are created?', '', '', '', '', '', '', '360', '180', '180', 26, 'qDMNBOPjwOM}otCCXcN8nKhsowxKfm'),
(111, 'Which one of the following function is used to start a session?', 'start_session()', 'session_start()', 'session_begin()', 'begin_session()', 'session_start()', '', '', '', '', 26, 'qDMNBOPjwOM}otCCXcN8nKhsowxKfm'),
(112, 'If session.use_cookie is set to 0, this results in use of..', 'Session', 'Cookie', 'URL rewriting', 'Nothing happens', 'URL rewriting', '', '', '', '', 26, 'qDMNBOPjwOM}otCCXcN8nKhsowxKfm'),
(113, 'What is this ?', 'Blackberry', 'Jackfruit', 'Litchi', 'Mango', 'Blackberry', 'img/74f35c6436.jpg', '', '', '', 25, '0XXzhH7Pu3~Kzw2H1gHv{S0xeo6Cvt'),
(114, 'What is This?', '', '', '', '', '', 'img/51b10a747e.jpg', 'Malta', 'Orange', 'Orange', 25, '0XXzhH7Pu3~Kzw2H1gHv{S0xeo6Cvt');

-- --------------------------------------------------------

--
-- Table structure for table `maintaindate`
--

CREATE TABLE `maintaindate` (
  `id` int(11) NOT NULL,
  `startdate` datetime NOT NULL,
  `enddate` datetime NOT NULL,
  `sid` int(11) NOT NULL,
  `gid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maintaindate`
--

INSERT INTO `maintaindate` (`id`, `startdate`, `enddate`, `sid`, `gid`) VALUES
(34, '2017-02-16 20:29:45', '2017-02-16 20:29:55', 1, 19),
(35, '2017-02-16 23:51:16', '2017-02-16 23:52:06', 2, 19),
(36, '2017-02-17 14:32:50', '2017-02-17 14:47:50', 1, 26),
(39, '2017-02-18 23:03:02', '2017-02-18 23:18:02', 4, 26);

-- --------------------------------------------------------

--
-- Table structure for table `storerightans`
--

CREATE TABLE `storerightans` (
  `id` int(11) NOT NULL,
  `qidd` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `gid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storerightans`
--

INSERT INTO `storerightans` (`id`, `qidd`, `sid`, `gid`) VALUES
(14, 24, 1, 19),
(15, 66, 1, 19),
(16, 27, 1, 19),
(17, 77, 1, 19),
(18, 69, 1, 19),
(19, 22, 1, 19),
(20, 72, 1, 19),
(21, 67, 2, 19),
(22, 26, 2, 19),
(23, 72, 2, 19),
(24, 66, 2, 19),
(25, 24, 2, 19),
(26, 101, 1, 26),
(27, 100, 1, 26),
(28, 103, 1, 26),
(29, 111, 1, 26),
(30, 98, 1, 26),
(31, 97, 1, 26),
(32, 89, 1, 26),
(33, 105, 1, 26),
(34, 110, 1, 26),
(35, 112, 1, 26),
(36, 96, 1, 26),
(37, 110, 4, 26),
(38, 103, 4, 26),
(39, 100, 4, 26),
(40, 93, 4, 26),
(41, 98, 4, 26),
(42, 108, 4, 26),
(43, 90, 4, 26),
(44, 102, 4, 26),
(45, 101, 4, 26),
(46, 109, 4, 26),
(47, 97, 4, 26),
(48, 105, 4, 26),
(49, 99, 4, 26),
(50, 106, 4, 26),
(51, 89, 4, 26);

-- --------------------------------------------------------

--
-- Table structure for table `urlcheck`
--

CREATE TABLE `urlcheck` (
  `id` int(11) NOT NULL,
  `gid` int(11) DEFAULT NULL,
  `maintain` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userregistration`
--

CREATE TABLE `userregistration` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userregistration`
--

INSERT INTO `userregistration` (`id`, `firstName`, `lastName`, `userName`, `email`, `password`, `date`) VALUES
(1, 'Rumman', 'None', 'rumman', 'rumman142228@gmail.com', '$2y$12$JrY.E2AfOVrEe1eGbfk5XOCViEQSp0CDms2wtXNdvWg.EpNQ1VuNu', '2017-01-25 15:58:28'),
(2, 'Farzana', 'Mim', 'mim', 'mim@gmail.com', '$2y$12$eY/msUsWU7sb.pPUqgn.7O0VTllFDAQuaTbsOEHyaDU7nQjgaofBi', '2017-02-13 17:58:57'),
(3, 'Rafiz', 'Hasan', 'rafiz', 'mdrafizulhasan699@gmail.com', '$2y$12$0lO27bL5SqlarasFVwSWJ.s1Bqb2VNKFvYYrfqjIywKujdty499je', '2017-02-14 17:46:06'),
(4, 'kaikobud', 'sarkar', 'kaikobud', 'kaikobud@gmail.com', '$2y$12$lvJGVuUyyU5Ll.BGR0eHxOgew7GwOCFm9xtgHuBRK1Pg7USVLpR4y', '2017-02-17 13:29:03');

-- --------------------------------------------------------

--
-- Table structure for table `usersforexamgroups`
--

CREATE TABLE `usersforexamgroups` (
  `id` int(11) NOT NULL,
  `instructor_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `roll` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `group_token` varchar(255) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usersforexamgroups`
--

INSERT INTO `usersforexamgroups` (`id`, `instructor_id`, `name`, `roll`, `email`, `department`, `group_token`, `group_id`, `student_id`) VALUES
(6, 'JmsFfxA)m6Zn%%$41u0l', 'Rumman', 'ASH1401042M', 'rumman142228@gmail.com', 'CSTE', 'SE%@()o%$()MVgvf$D((((666VK(y(', 19, 1),
(9, 'JmsFfxA)m6Zn%%$41u0l', 'Nishi', 'ASH1401042M6', 'nishi@gmail.com', 'ACCE', 'xEBNwZzFdhSMJtsKVTSFUk18qcm~Ig', 24, 1),
(10, 'JmsFfxA)m6Zn%%$41u0l', 'Eshat', 'ASH1601042M', 'eshat@gmail.com', 'FTNS', '0XXzhH7Pu3~Kzw2H1gHv{S0xeo6Cvt', 25, 1),
(11, 'JmsFfxA)m6Zn%%$41u0l', 'Mim', '1029', 'mim@gmail.com', 'Medical', 'SE%@()o%$()MVgvf$D((((666VK(y(', 19, 2),
(13, 'JmsFfxA)m6Zn%%$41u0l', 'Rafiz', '2322', 'mdrafizulhasan699@gmail.com', 'SSC', 'SE%@()o%$()MVgvf$D((((666VK(y(', 19, 3),
(14, 'JmsFfxA)m6Zn%%$41u0l', 'Rumman', 'ASH1401042M', 'rumman142228@gmail.com', 'CSTE', 'qDMNBOPjwOM}otCCXcN8nKhsowxKfm', 26, 1),
(16, 'JmsFfxA)m6Zn%%$41u0l', 'Kaikobud', 'ASH1401002M', 'kaikobud@gmail.com', 'CSTE', 'qDMNBOPjwOM}otCCXcN8nKhsowxKfm', 26, 4),
(17, 'JmsFfxA)m6Zn%%$41u0l', 'Kaikobud', 'ASH1401002M', 'kaikobud@gmail.com', 'CSTE', 'xEBNwZzFdhSMJtsKVTSFUk18qcm~Ig', 24, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminregistraion`
--
ALTER TABLE `adminregistraion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_correct_answer` (`gid`);

--
-- Indexes for table `examcondition`
--
ALTER TABLE `examcondition`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_exam_condition` (`gid`);

--
-- Indexes for table `examgroups`
--
ALTER TABLE `examgroups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupquestions`
--
ALTER TABLE `groupquestions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_group_id` (`group_id`);

--
-- Indexes for table `maintaindate`
--
ALTER TABLE `maintaindate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_date_maintain` (`gid`);

--
-- Indexes for table `storerightans`
--
ALTER TABLE `storerightans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_right_answer` (`gid`);

--
-- Indexes for table `urlcheck`
--
ALTER TABLE `urlcheck`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_url_check` (`gid`);

--
-- Indexes for table `userregistration`
--
ALTER TABLE `userregistration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usersforexamgroups`
--
ALTER TABLE `usersforexamgroups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_group_id_for_user` (`group_id`),
  ADD KEY `fk_user_for_exam` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminregistraion`
--
ALTER TABLE `adminregistraion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;
--
-- AUTO_INCREMENT for table `examcondition`
--
ALTER TABLE `examcondition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `examgroups`
--
ALTER TABLE `examgroups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `groupquestions`
--
ALTER TABLE `groupquestions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `maintaindate`
--
ALTER TABLE `maintaindate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `storerightans`
--
ALTER TABLE `storerightans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `urlcheck`
--
ALTER TABLE `urlcheck`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `userregistration`
--
ALTER TABLE `userregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usersforexamgroups`
--
ALTER TABLE `usersforexamgroups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `fk_correct_answer` FOREIGN KEY (`gid`) REFERENCES `examgroups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `examcondition`
--
ALTER TABLE `examcondition`
  ADD CONSTRAINT `fk_exam_condition` FOREIGN KEY (`gid`) REFERENCES `examgroups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `groupquestions`
--
ALTER TABLE `groupquestions`
  ADD CONSTRAINT `fk_group_id` FOREIGN KEY (`group_id`) REFERENCES `examgroups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `maintaindate`
--
ALTER TABLE `maintaindate`
  ADD CONSTRAINT `fk_date_maintain` FOREIGN KEY (`gid`) REFERENCES `examgroups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `storerightans`
--
ALTER TABLE `storerightans`
  ADD CONSTRAINT `fk_right_answer` FOREIGN KEY (`gid`) REFERENCES `examgroups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `urlcheck`
--
ALTER TABLE `urlcheck`
  ADD CONSTRAINT `fk_url_check` FOREIGN KEY (`gid`) REFERENCES `examgroups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `usersforexamgroups`
--
ALTER TABLE `usersforexamgroups`
  ADD CONSTRAINT `fk_group_id_for_user` FOREIGN KEY (`group_id`) REFERENCES `examgroups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user_for_exam` FOREIGN KEY (`student_id`) REFERENCES `userregistration` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
