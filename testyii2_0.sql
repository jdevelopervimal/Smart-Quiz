-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 16, 2016 at 01:09 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testyii2.0`
--

-- --------------------------------------------------------

--
-- Table structure for table `difficult_level`
--

CREATE TABLE `difficult_level` (
  `did` int(11) NOT NULL,
  `level_name` varchar(100) NOT NULL,
  `institute_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `difficult_level`
--

INSERT INTO `difficult_level` (`did`, `level_name`, `institute_id`) VALUES
(1, 'Easy', 1),
(2, 'Medium', 1),
(3, 'Difficult', 1);

-- --------------------------------------------------------

--
-- Table structure for table `essay_qsn`
--

CREATE TABLE `essay_qsn` (
  `essay_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `essay_cont` longtext NOT NULL,
  `essay_score` int(11) NOT NULL,
  `essay_status` int(11) NOT NULL DEFAULT '0',
  `q_type` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `essay_qsn`
--

INSERT INTO `essay_qsn` (`essay_id`, `q_id`, `r_id`, `essay_cont`, `essay_score`, `essay_status`, `q_type`) VALUES
(1, 6, 1, 'Red=Green,BMW=Honda,Keyboard=Mouse,Eye=Nose', 0, 0, 5),
(2, 4, 1, 'Red', 0, 0, 3),
(3, 6, 1, 'Red=Green,BMW=Honda,Keyboard=Mouse,Eye=Nose', 0, 0, 5),
(4, 3, 1, 'Transparent', 0, 0, 2),
(5, 6, 2, 'Red=Mouse,BMW=Nose,Keyboard=Green,Eye=Honda', 0, 0, 5),
(6, 4, 2, 'red', 0, 0, 3),
(7, 3, 2, 'yellow', 0, 0, 2),
(8, 6, 2, 'Red=Mouse,BMW=Nose,Keyboard=Green,Eye=Honda', 0, 0, 5),
(9, 5, 2, 'India is a country in Asia', 1, 1, 0),
(10, 6, 3, 'Red=Nose,BMW=Green,Keyboard=Green,Eye=Mouse', 0, 0, 5),
(11, 4, 3, 'blue', 0, 0, 3),
(12, 3, 3, 'transparent', 0, 0, 2),
(13, 6, 3, 'Red=Nose,BMW=Green,Keyboard=Green,Eye=Mouse', 0, 0, 5),
(14, 5, 3, 'india india', 1, 1, 0),
(15, 6, 4, 'Red=Mouse,BMW=Nose,Keyboard=Honda,Eye=Mouse', 0, 0, 5),
(16, 4, 4, 'blue', 0, 0, 3),
(17, 3, 4, 'transparent', 0, 0, 2),
(18, 6, 4, 'Red=Mouse,BMW=Nose,Keyboard=Honda,Eye=Mouse', 0, 0, 5),
(19, 5, 4, 'india', 1, 1, 0),
(20, 6, 5, 'Red=Nose,BMW=Green,Keyboard=Honda,Eye=Mouse', 0, 0, 5),
(21, 4, 5, 'blue', 0, 0, 3),
(22, 3, 5, 'transparent', 0, 0, 2),
(23, 6, 5, 'Red=Nose,BMW=Green,Keyboard=Honda,Eye=Mouse', 0, 0, 5),
(24, 5, 5, 'india', 1, 1, 0),
(25, 6, 6, 'Red=,BMW=,Keyboard=,Eye=', 0, 0, 5),
(26, 4, 6, 'sky blue', 0, 0, 3),
(27, 3, 6, 'transparents', 0, 0, 2),
(28, 5, 6, 'india', 1, 1, 0),
(29, 6, 7, 'Red=Nose,BMW=Green,Keyboard=Nose,Eye=Green', 0, 0, 5),
(30, 4, 7, 'blue', 0, 0, 3),
(31, 3, 7, 'transparent', 0, 0, 2),
(32, 6, 7, 'Red=Nose,BMW=Green,Keyboard=Nose,Eye=Green', 0, 0, 5),
(33, 5, 7, 'india is a country', 1, 1, 0),
(34, 6, 8, 'Red=Honda,BMW=Green,Keyboard=Green,Eye=Green', 0, 0, 5),
(35, 4, 8, 'blue', 0, 0, 3),
(36, 3, 8, 'transparent', 0, 0, 2),
(37, 6, 8, 'Red=Honda,BMW=Green,Keyboard=Green,Eye=Green', 0, 0, 5),
(38, 5, 8, 'india', 1, 1, 0),
(39, 6, 3, 'Red=Green,BMW=Honda,Keyboard=Mouse,Eye=Nose', 0, 0, 5),
(40, 6, 4, 'Red=Green,BMW=Honda,Keyboard=Mouse,Eye=Nose', 0, 0, 5),
(41, 6, 5, 'Red=Honda,BMW=Mouse,Keyboard=Mouse,Eye=Nose', 0, 0, 5),
(42, 6, 6, 'Red=Green,BMW=Honda,Keyboard=Mouse,Eye=Nose', 0, 0, 5),
(43, 4, 10, '', 0, 0, 3),
(44, 3, 10, '', 0, 0, 2),
(45, 4, 11, '', 0, 0, 3),
(46, 3, 11, '', 0, 0, 2),
(47, 4, 12, '', 0, 0, 3),
(48, 3, 12, '', 0, 0, 2),
(50, 5, 15, '', 0, 0, 4),
(51, 4, 15, '', 0, 0, 3),
(52, 3, 15, '', 0, 0, 2),
(53, 3, 16, 'blue', 0, 0, 2),
(54, 4, 16, 'blue', 0, 0, 3),
(55, 5, 16, 'hjhj', 0, 0, 4),
(56, 5, 16, 'hjhj', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `institute_data`
--

CREATE TABLE `institute_data` (
  `su_institute_id` int(11) NOT NULL,
  `organization_name` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL DEFAULT 'logo.png',
  `contact_info` text NOT NULL,
  `active_till` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `description` text NOT NULL,
  `custom_domain` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institute_data`
--

INSERT INTO `institute_data` (`su_institute_id`, `organization_name`, `logo`, `contact_info`, `active_till`, `status`, `description`, `custom_domain`) VALUES
(1, 'Default', 'logo.png', '', 2147483647, 1, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1462430487),
('m130524_201442_init', 1462430492);

-- --------------------------------------------------------

--
-- Table structure for table `qbank`
--

CREATE TABLE `qbank` (
  `qid` int(11) NOT NULL,
  `parent_qid` int(11) NOT NULL,
  `question` text NOT NULL,
  `description` text NOT NULL,
  `cid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `institute_id` int(11) NOT NULL DEFAULT '1',
  `q_type` enum('1','2','3','4','5','6') DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qbank`
--

INSERT INTO `qbank` (`qid`, `parent_qid`, `question`, `description`, `cid`, `did`, `institute_id`, `q_type`) VALUES
(1, 0, '<p style="font-family: Helvetica, Arial, sans-serif; font-size: 13px; margin: 0px 0px 1em; padding: 0px; text-align: justify; color: #444444; line-height: 18px;">Here are the most frequently asked general science questions in General knowledge section of exams. The general science questions includes Physics, Chemistry and Biology. These questions will be useful for your practice for TNPSC exams, UPSC exams, state PSC exams, entrance exams, bank exams, or any other competitive exams. To help the students preparing for competitive exams and placement tests, we provide interactive online practice general knowledge tests.</p>\r\n<p style="font-family: Helvetica, Arial, sans-serif; font-size: 13px; margin: 0px 0px 1em; padding: 0px; text-align: justify; color: #444444; line-height: 18px;">Each of the below online tests consists of ten multiple choice objective type questions with answers. In the tests, simply select one of the answer choices. Your answer will be marked immediately by indicating&nbsp;<img style="font-size: 1em; margin: 0px; padding: 0px; max-width: 100%;" src="http://tamilcube.com/image/correct.gif" alt="Correct!" width="16" height="16" />&nbsp;or&nbsp;<img style="font-size: 1em; margin: 0px; padding: 0px; max-width: 100%;" src="http://tamilcube.com/image/incorrect.gif" alt="Incorrect!" width="16" height="16" />. Also, the correct answer will be highlighted in green colour. If you prefer, you also have a choice to print these questions and work out at your convenient time.</p>\r\n<p style="font-family: Helvetica, Arial, sans-serif; font-size: 13px; margin: 0px 0px 1em; padding: 0px; text-align: justify; color: #444444; line-height: 18px;">Once you have answered all the ten questions in each of these online tests, you can get your score for this test and the total score for all the tests you attempted today.</p>', '<p>ffdfjhj dhj</p>', 2, 1, 1, '2'),
(3, 0, '<p>Passage test</p>\r\n<p><img src="/testyii2.0/uploads/images/Vorsteiner-Porsche-Cayman-GT4-1.jpg" alt="" /></p>', '<p>hello naskjdK JFHKAJ KJF K</p>', 2, 1, 1, '3'),
(4, 0, '<p>new test</p>', '<p>test solution</p>', 2, 1, 1, '2'),
(5, 3, '<p>Child Ques</p>', '<p>soution</p>', 2, 1, 1, '1'),
(6, 3, '<p>hello child passage question</p>', '<p>solution</p>', 2, 2, 1, '2'),
(7, 3, '<p>another child question</p>', '<p>solution</p>', 2, 2, 1, '1'),
(8, 0, '<p>New Assay Question ?</p>', '<p>Solytion</p>', 2, 1, 1, '4'),
(11, 0, '<p style="font-family: Helvetica, Arial, sans-serif; font-size: 13px; margin: 0px 0px 1em; padding: 0px; text-align: justify; color: #444444; line-height: 18px;">Here are the most frequently asked general science questions in General knowledge section of exams. The general science questions includes Physics, Chemistry and Biology. These questions will be useful for your practice for TNPSC exams, UPSC exams, state PSC exams, entrance exams, bank exams, or any other competitive exams. To help the students preparing for competitive exams and placement tests, we provide interactive online practice general knowledge tests.</p>\r\n<p style="font-family: Helvetica, Arial, sans-serif; font-size: 13px; margin: 0px 0px 1em; padding: 0px; text-align: justify; color: #444444; line-height: 18px;">Each of the below online tests consists of ten multiple choice objective type questions with answers. In the tests, simply select one of the answer choices. Your answer will be marked immediately by indicating&nbsp;<img style="font-size: 1em; margin: 0px; padding: 0px; max-width: 100%;" src="http://tamilcube.com/image/correct.gif" alt="Correct!" width="16" height="16" />&nbsp;or&nbsp;<img style="font-size: 1em; margin: 0px; padding: 0px; max-width: 100%;" src="http://tamilcube.com/image/incorrect.gif" alt="Incorrect!" width="16" height="16" />. Also, the correct answer will be highlighted in green colour. If you prefer, you also have a choice to print these questions and work out at your convenient time.</p>\r\n<p style="font-family: Helvetica, Arial, sans-serif; font-size: 13px; margin: 0px 0px 1em; padding: 0px; text-align: justify; color: #444444; line-height: 18px;">Once you have answered all the ten questions in each of these online tests, you can get your score for this test and the total score for all the tests you attempted today.</p>\r\n<p style="font-family: Helvetica, Arial, sans-serif; font-size: 13px; margin: 0px 0px 1em; padding: 0px; text-align: justify; color: #444444; line-height: 18px;"><img src="/quiz/upload/36a823379716ac9c3fdfbf960c11769a.jpg" alt="" /></p>\r\n<p style="font-family: Helvetica, Arial, sans-serif; font-size: 13px; margin: 0px 0px 1em; padding: 0px; text-align: justify; color: #444444; line-height: 18px;">&nbsp;</p>\r\n<p style="font-family: Helvetica, Arial, sans-serif; font-size: 13px; margin: 0px 0px 1em; padding: 0px; text-align: justify; color: #444444; line-height: 18px;">&nbsp;</p>', '<p style="font-family: Helvetica, Arial, sans-serif; font-size: 13px; margin: 0px 0px 1em; padding: 0px; text-align: justify; color: #444444; line-height: 18px;">Here are the most frequently asked general science questions in General knowledge section of exams. The general science questions includes Physics, Chemistry and Biology. These questions will be useful for your practice for TNPSC exams, UPSC exams, state PSC exams, entrance exams, bank exams, or any other competitive exams. To help the students preparing for competitive exams and placement tests, we provide interactive online practice general knowledge tests.</p>\r\n<p style="font-family: Helvetica, Arial, sans-serif; font-size: 13px; margin: 0px 0px 1em; padding: 0px; text-align: justify; color: #444444; line-height: 18px;">Each of the below online tests consists of ten multiple choice objective type questions with answers. In the tests, simply select one of the answer choices. Your answer will be marked immediately by indicating&nbsp;<img style="font-size: 1em; margin: 0px; padding: 0px; max-width: 100%;" src="http://tamilcube.com/image/correct.gif" alt="Correct!" width="16" height="16" />&nbsp;or&nbsp;<img style="font-size: 1em; margin: 0px; padding: 0px; max-width: 100%;" src="http://tamilcube.com/image/incorrect.gif" alt="Incorrect!" width="16" height="16" />. Also, the correct answer will be highlighted in green colour. If you prefer, you also have a choice to print these questions and work out at your convenient time.</p>\r\n<p style="font-family: Helvetica, Arial, sans-serif; font-size: 13px; margin: 0px 0px 1em; padding: 0px; text-align: justify; color: #444444; line-height: 18px;">Once you have answered all the ten questions in each of these online tests, you can get your score for this test and the total score for all the tests you attempted today.</p>', 1, 1, 1, '3'),
(12, 0, '<p>sdgfhjas</p>', '<p>asdgh</p>', 1, 1, 1, '1'),
(13, 0, '<p><span class="hljs-variable" style="box-sizing: border-box; color: #b58900; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">$session</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;"> = Yii::</span><span class="hljs-variable" style="box-sizing: border-box; color: #b58900; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">$app</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">-&gt;session; </span><span class="hljs-comment" style="box-sizing: border-box; color: #ff6900; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">// get a session variable. The following usages are equivalent:</span><span class="hljs-variable" style="box-sizing: border-box; color: #b58900; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">$language</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;"> = </span><span class="hljs-variable" style="box-sizing: border-box; color: #b58900; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">$session</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">-&gt;get(</span><span class="hljs-string" style="box-sizing: border-box; color: #2aa198; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">''language''</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">); </span><span class="hljs-variable" style="box-sizing: border-box; color: #b58900; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">$language</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;"> = </span><span class="hljs-variable" style="box-sizing: border-box; color: #b58900; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">$session</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">[</span><span class="hljs-string" style="box-sizing: border-box; color: #2aa198; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">''language''</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">]; </span><span class="hljs-variable" style="box-sizing: border-box; color: #b58900; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">$language</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;"> = </span><span class="hljs-keyword" style="box-sizing: border-box; color: #859900; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">isset</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">(</span><span class="hljs-variable" style="box-sizing: border-box; color: #b58900; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">$_SESSION</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">[</span><span class="hljs-string" style="box-sizing: border-box; color: #2aa198; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">''language''</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">]) ? </span><span class="hljs-variable" style="box-sizing: border-box; color: #b58900; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">$_SESSION</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">[</span><span class="hljs-string" style="box-sizing: border-box; color: #2aa198; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">''language''</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">] : </span><span class="hljs-keyword" style="box-sizing: border-box; color: #859900; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">null</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">; </span><span class="hljs-comment" style="box-sizing: border-box; color: #ff6900; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">// set a session variable. The following usages are equivalent:</span><span class="hljs-variable" style="box-sizing: border-box; color: #b58900; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">$session</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">-&gt;set(</span><span class="hljs-string" style="box-sizing: border-box; color: #2aa198; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">''language''</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">, </span><span class="hljs-string" style="box-sizing: border-box; color: #2aa198; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">''en-US''</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">); </span><span class="hljs-variable" style="box-sizing: border-box; color: #b58900; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">$session</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">[</span><span class="hljs-string" style="box-sizing: border-box; color: #2aa198; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">''language''</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">] = </span><span class="hljs-string" style="box-sizing: border-box; color: #2aa198; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">''en-US''</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">; </span><span class="hljs-variable" style="box-sizing: border-box; color: #b58900; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">$_SESSION</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">[</span><span class="hljs-string" style="box-sizing: border-box; color: #2aa198; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">''language''</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">] = </span><span class="hljs-string" style="box-sizing: border-box; color: #2aa198; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">''en-US''</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">; </span><span class="hljs-comment" style="box-sizing: border-box; color: #ff6900; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">// remove a session variable. The following usages are equivalent:</span><span class="hljs-variable" style="box-sizing: border-box; color: #b58900; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">$session</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">-&gt;remove(</span><span class="hljs-string" style="box-sizing: border-box; color: #2aa198; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">''language''</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">); </span><span class="hljs-keyword" style="box-sizing: border-box; color: #859900; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">unset</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">(</span><span class="hljs-variable" style="box-sizing: border-box; color: #b58900; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">$session</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">[</span><span class="hljs-string" style="box-sizing: border-box; color: #2aa198; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">''language''</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">]); </span><span class="hljs-keyword" style="box-sizing: border-box; color: #859900; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">unset</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">(</span><span class="hljs-variable" style="box-sizing: border-box; color: #b58900; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">$_SESSION</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">[</span><span class="hljs-string" style="box-sizing: border-box; color: #2aa198; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">''language''</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">]); </span><span class="hljs-comment" style="box-sizing: border-box; color: #ff6900; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">// check if a session variable exists. The following usages are equivalent:</span><span class="hljs-keyword" style="box-sizing: border-box; color: #859900; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">if</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;"> (</span><span class="hljs-variable" style="box-sizing: border-box; color: #b58900; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">$session</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">-&gt;has(</span><span class="hljs-string" style="box-sizing: border-box; color: #2aa198; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">''language''</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">)) ... </span><span class="hljs-keyword" style="box-sizing: border-box; color: #859900; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">if</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;"> (</span><span class="hljs-keyword" style="box-sizing: border-box; color: #859900; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">isset</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">(</span><span class="hljs-variable" style="box-sizing: border-box; color: #b58900; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">$session</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">[</span><span class="hljs-string" style="box-sizing: border-box; color: #2aa198; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">''language''</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">])) ... </span><span class="hljs-keyword" style="box-sizing: border-box; color: #859900; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">if</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;"> (</span><span class="hljs-keyword" style="box-sizing: border-box; color: #859900; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">isset</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">(</span><span class="hljs-variable" style="box-sizing: border-box; color: #b58900; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">$_SESSION</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">[</span><span class="hljs-string" style="box-sizing: border-box; color: #2aa198; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">''language''</span><span style="color: #28353d; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">])) ... </span><span class="hljs-comment" style="box-sizing: border-box; color: #ff6900; font-family: Menlo, Monaco, Consolas, ''Courier New'', monospace; font-size: 13px; line-height: 18.5714px; white-space: pre-wrap; background-color: #efefef;">// traverse all session variables. The following usages are equivalent:</span></p>', '<p>dsds</p>', 2, 2, 1, '2'),
(14, 0, '<p>sdsds</p>', '<p>afhs</p>', 1, 2, 1, '3'),
(15, 14, '<p>dd</p>', '<p>da</p>', 1, 1, 1, '1'),
(16, 14, '<p>scA</p>', '<p>sda</p>', 1, 2, 1, '2'),
(17, 0, '<p>sd</p>', '<p>dfd</p>', 2, 1, 1, '4'),
(18, 0, '<p>zdasa</p>', '<p>shkjas</p>', 2, 1, 1, '4'),
(19, 0, '<p>zcas</p>', '<p>zda</p>', 1, 1, 1, '3'),
(20, 11, '<p>dfds</p>', '<p>sdsds</p>', 1, 1, 1, '1'),
(21, 11, '<p>ds</p>', '<p>sas</p>', 1, 2, 1, '2');

-- --------------------------------------------------------

--
-- Table structure for table `question_category`
--

CREATE TABLE `question_category` (
  `cid` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `cat_duration` smallint(6) DEFAULT NULL,
  `institute_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_category`
--

INSERT INTO `question_category` (`cid`, `category_name`, `cat_duration`, `institute_id`) VALUES
(1, 'Maths', 90, 1),
(2, 'Section 2', 2, 1),
(5, 'section 123', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quid` int(11) NOT NULL,
  `quiz_name` varchar(100) NOT NULL,
  `description` text,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `duration` int(11) NOT NULL,
  `pass_percentage` varchar(5) NOT NULL,
  `test_type` int(1) NOT NULL COMMENT '0=> Free,1=> Paid',
  `credit` varchar(10) NOT NULL,
  `view_answer` int(1) NOT NULL,
  `max_attempts` int(3) NOT NULL,
  `correct_score` varchar(1000) NOT NULL,
  `incorrect_score` varchar(1000) NOT NULL,
  `institute_id` int(11) NOT NULL DEFAULT '1',
  `qids_static` text,
  `qselect` int(11) NOT NULL DEFAULT '1',
  `ip_address` text NOT NULL,
  `camera_req` int(1) NOT NULL DEFAULT '0',
  `pract_test` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quid`, `quiz_name`, `description`, `start_time`, `end_time`, `duration`, `pass_percentage`, `test_type`, `credit`, `view_answer`, `max_attempts`, `correct_score`, `incorrect_score`, `institute_id`, `qids_static`, `qselect`, `ip_address`, `camera_req`, `pract_test`) VALUES
(5, 'new test', '<p>description</p>', '2016-05-16 00:00:00', '2016-07-21 00:00:00', 300, '50', 0, '0', 1, 85, '1', '0', 1, 'a:2:{s:4:"type";s:4:"auto";s:8:"category";a:3:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"5";}}', 0, '', 0, 0),
(6, 'New Quiz', '<p>Description</p>', '2016-05-16 00:00:00', '2016-07-14 00:00:00', 111, '45.21', 0, '', 1, 10, '1', '0', 1, 'a:3:{s:4:"type";s:6:"manual";s:8:"category";s:13:"Uncategorised";s:4:"ques";a:3:{i:0;s:1:"1";i:1;s:1:"3";i:3;s:1:"8";}}', 1, '', 0, 1),
(10, 'MAT 2017', '<p>text</p>', '2016-05-09 00:00:00', '2016-07-20 00:00:00', 0, '33.3', 1, '', 1, 17, '4', '0', 1, 'a:2:{s:4:"type";s:4:"auto";s:8:"category";a:3:{i:0;N;i:1;N;i:2;s:1:"1";}}', 1, '', 0, 0),
(11, 'CAT', '<p>sfsd</p>', '2016-05-10 00:00:00', '2016-07-20 00:00:00', 0, '49', 0, '', 1, 17, '12', '0', 1, NULL, 1, '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_group`
--

CREATE TABLE `quiz_group` (
  `qgid` int(11) NOT NULL,
  `quid` int(11) NOT NULL,
  `gid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_group`
--

INSERT INTO `quiz_group` (`qgid`, `quid`, `gid`) VALUES
(76, 5, 9),
(78, 5, 11),
(80, 6, 9),
(81, 10, 12),
(82, 11, 11);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_qids`
--

CREATE TABLE `quiz_qids` (
  `qquid` int(11) NOT NULL,
  `quid` text NOT NULL,
  `cid` text NOT NULL,
  `did` text NOT NULL,
  `no_of_questions` int(11) NOT NULL,
  `institute_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_result`
--

CREATE TABLE `quiz_result` (
  `rid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `quid` int(11) NOT NULL,
  `qids` text NOT NULL,
  `category_name` varchar(1000) DEFAULT NULL,
  `qids_range` varchar(1000) DEFAULT NULL,
  `oids` text NOT NULL,
  `start_time` int(11) NOT NULL,
  `end_time` int(11) NOT NULL,
  `last_response` int(11) NOT NULL,
  `time_spent` int(11) NOT NULL,
  `time_spent_ind` text NOT NULL,
  `score` float NOT NULL,
  `percentage` varchar(10) NOT NULL DEFAULT '0',
  `q_result` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `institute_id` int(11) NOT NULL DEFAULT '1',
  `photo` text,
  `essay_ques` int(11) NOT NULL DEFAULT '0',
  `score_ind` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_result`
--

INSERT INTO `quiz_result` (`rid`, `uid`, `quid`, `qids`, `category_name`, `qids_range`, `oids`, `start_time`, `end_time`, `last_response`, `time_spent`, `time_spent_ind`, `score`, `percentage`, `q_result`, `status`, `institute_id`, `photo`, `essay_ques`, `score_ind`) VALUES
(16, 1, 5, '1,2,3,4,5,25,26,27,29,30,23,22,21', 'General,social studies,General History,Math', '0-5,6-10,11-11,12-13', '3,7-6,9,10,0,60,64,69,0,0,0,0,0', 1462689159, 1462707161, 1462689159, 18002, '190,5,7,5,3,9,2603,14,5,10,3,85,19,0', 4.5, '34.6153846', 2, 1, 1, '', 1, '0,1,0,1,0,1,1,0.5,0,0,0,0,0'),
(17, 1, 5, '1,2,3,4,5,25,26,27,29,30,23,22,21', 'General,social studies,General History,Math', '0-4,5-9,10-10,11-12', '0,0,0,0,0,0,0,0,0,0,0,0,0', 1462707327, 0, 1462707327, 1122, '140,0,0,0,0,1,0,0,0,0,0,0,0', 0, '0', 0, 0, 1, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `q_options`
--

CREATE TABLE `q_options` (
  `oid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `option_value` text NOT NULL,
  `score` varchar(10) DEFAULT '0',
  `institute_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `q_options`
--

INSERT INTO `q_options` (`oid`, `qid`, `option_value`, `score`, `institute_id`) VALUES
(1, 1, '<p>anbnb</p>', '0', 1),
(2, 1, '<p>bhhjhjh</p>', '0', 1),
(3, 1, '<p>cmnm</p>', '1', 1),
(4, 1, '<p>d</p>', '0', 1),
(5, 4, '<p>a</p>', '1', 1),
(6, 4, '<p>bwsd</p>', '0', 1),
(7, 4, '<p>c</p>', '1', 1),
(8, 4, '<p>d</p>', '1', 1),
(9, 4, '<p>e</p>', '1', 1),
(10, 5, '<p>A</p>', '1', 1),
(11, 5, '<p>B</p>', '0', 1),
(12, 5, '<p>C</p>', '0', 1),
(13, 5, '<p>D</p>', '0', 1),
(14, 6, '<p>a</p>', '1', 1),
(15, 6, '<p>B</p>', '1', 1),
(16, 6, '<p>C</p>', '0', 1),
(17, 6, '<p>D</p>', '1', 1),
(18, 7, '<p>A</p>', '0', 1),
(19, 7, '<p>B</p>', '1', 1),
(20, 7, '<p>C</p>', '0', 1),
(21, 7, '<p>D</p>', '0', 1),
(22, 9, '<p>hh</p>', '1', 1),
(23, 9, '<p>k</p>', '0', 1),
(24, 9, '<p>rt</p>', '0', 1),
(25, 9, '<p>sd</p>', '1', 1),
(30, 12, '<p>a</p>', '0', 1),
(31, 12, '<p>b</p>', '0', 1),
(32, 12, '<p>c</p>', '1', 1),
(33, 12, '<p>d</p>', '0', 1),
(34, 13, '<p>A</p>', '1', 1),
(35, 13, '<p>B</p>', '0', 1),
(36, 13, '<p>C</p>', '1', 1),
(37, 13, '<p>D</p>', '0', 1),
(38, 15, '<p>x</p>', '1', 1),
(39, 15, '<p>s</p>', '0', 1),
(40, 15, '<p>d</p>', '0', 1),
(41, 15, '<p>s</p>', '0', 1),
(42, 16, '<p>dsd</p>', '1', 1),
(43, 16, '<p>csd</p>', '0', 1),
(44, 16, '<p>gh</p>', '1', 1),
(45, 16, '<p>rrw</p>', '0', 1),
(46, 20, '<p>a</p>', '0', 1),
(47, 20, '<p>d</p>', '0', 1),
(48, 20, '<p>s</p>', '1', 1),
(49, 20, '<p>w</p>', '0', 1),
(50, 21, '<p>x</p>', '1', 1),
(51, 21, '<p>s</p>', '1', 1),
(52, 21, '<p>w</p>', '0', 1),
(53, 21, '<p>a</p>', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) NOT NULL,
  `version` bigint(20) NOT NULL,
  `authority` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `version`, `authority`, `description`, `name`, `created_at`, `updated_at`, `updated_by`) VALUES
(1, 1, 'Super', 'Create update delete', 'superadmin', '2016-05-17 14:07:09', '2016-05-05 10:56:27', '1'),
(2, 1, 'admin', 'Create update delete', 'admin', '2016-05-05 05:06:00', '2016-05-05 10:56:27', '1'),
(3, 1, 'user', 'user', 'user', '2016-05-17 03:04:30', '2016-05-05 10:57:12', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `first_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `institute_id` int(11) DEFAULT NULL,
  `profile_pic` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `referrer` int(11) DEFAULT NULL,
  `date_of_birth` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fathers_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` enum('male','female') COLLATE utf8_unicode_ci DEFAULT NULL,
  `marital_status` enum('yes','no') COLLATE utf8_unicode_ci DEFAULT 'no',
  `login_status` enum('enable','disable') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'disable',
  `login_time` datetime DEFAULT NULL,
  `logout_time` datetime DEFAULT NULL,
  `otp_expire` datetime DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT '3',
  `membership` enum('free','paid') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'free',
  `group_id` int(11) DEFAULT NULL,
  `profile_status` enum('pending','complete') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `first_name`, `last_name`, `institute_id`, `profile_pic`, `referrer`, `date_of_birth`, `fathers_name`, `gender`, `marital_status`, `login_status`, `login_time`, `logout_time`, `otp_expire`, `role_id`, `membership`, `group_id`, `profile_status`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'cBZyhh9QvrmhwWPFHGY8g6qlkZ9M4NP4', '$2y$13$ljN/VwAIGvQ9Tm5yZ0gl0eV9lgZOYyCB5bKZxv/vfWj1rAijvccZy', NULL, 'jdeveloper.vimal@gmail.com', 'active', 'Vikas', 'singh', 1, NULL, NULL, NULL, NULL, NULL, 'no', 'enable', NULL, NULL, NULL, 3, 'free', 9, 'pending', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, NULL, 'YOPYQgA9sa5WvffcXidRePbJ6gtZ8130', '$2y$13$3oU2gerUOXMEBeCWvGXmvuPwBJzZCKgdZHPlISim2VzkpMl2R0y1O', NULL, 'test132@test.com', 'active', 'Vimal', 'Kumar', 1, NULL, NULL, NULL, NULL, NULL, 'no', 'enable', NULL, NULL, NULL, 1, 'free', 11, 'pending', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, NULL, 'tZhLC5hfSUOrgb-4Wou8i1PcPQcrS7Og', '$2y$13$gztQokJQ/72q.KFTxIHyU.X9/yG81HWCztI6nU4MsxkbMHt75B.Sm', NULL, 'aman@test.com', 'inactive', 'Aman', 'Singh', 1, NULL, NULL, NULL, NULL, NULL, 'no', 'enable', NULL, NULL, NULL, 3, 'paid', 9, 'pending', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, NULL, 'BhKUfh0_5lWY0IlSjPE6x01uavEE-afu', '$2y$13$6q9KT2MkX/.UFHuUGLQaVOpXOVaVbugpBAN8KQ8yq986EKgT24vgq', NULL, 'test123@gmail.com', 'active', 'Test', 'Profile', NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'enable', NULL, NULL, NULL, 3, 'free', NULL, 'pending', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, NULL, 'eyFXZ2nZJsHoo2cGB7zKa8XNF7TOMdZz', '$2y$13$n./FhpEEDtwr9RhB48H6fuZq2uhDCINfCRrvRKp6eWalgZEpZ8nW6', NULL, 'quaber@test.com', 'active', 'Quaber', ' inslabel', NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'enable', NULL, NULL, NULL, 1, 'paid', 11, 'pending', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `gid` int(11) NOT NULL,
  `group_name` varchar(200) NOT NULL,
  `institute_id` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`gid`, `group_name`, `institute_id`) VALUES
(9, 'Group1', 1),
(11, 'CAT', 1),
(12, 'MAT', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `difficult_level`
--
ALTER TABLE `difficult_level`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `essay_qsn`
--
ALTER TABLE `essay_qsn`
  ADD PRIMARY KEY (`essay_id`);

--
-- Indexes for table `institute_data`
--
ALTER TABLE `institute_data`
  ADD PRIMARY KEY (`su_institute_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `qbank`
--
ALTER TABLE `qbank`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `question_category`
--
ALTER TABLE `question_category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quid`);

--
-- Indexes for table `quiz_group`
--
ALTER TABLE `quiz_group`
  ADD PRIMARY KEY (`qgid`);

--
-- Indexes for table `quiz_qids`
--
ALTER TABLE `quiz_qids`
  ADD PRIMARY KEY (`qquid`);

--
-- Indexes for table `quiz_result`
--
ALTER TABLE `quiz_result`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `q_options`
--
ALTER TABLE `q_options`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UK_irsamgnera6angm0prq1kemt2` (`authority`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`gid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `difficult_level`
--
ALTER TABLE `difficult_level`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `essay_qsn`
--
ALTER TABLE `essay_qsn`
  MODIFY `essay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `institute_data`
--
ALTER TABLE `institute_data`
  MODIFY `su_institute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `qbank`
--
ALTER TABLE `qbank`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `question_category`
--
ALTER TABLE `question_category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `quiz_group`
--
ALTER TABLE `quiz_group`
  MODIFY `qgid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `quiz_qids`
--
ALTER TABLE `quiz_qids`
  MODIFY `qquid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quiz_result`
--
ALTER TABLE `quiz_result`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `q_options`
--
ALTER TABLE `q_options`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
