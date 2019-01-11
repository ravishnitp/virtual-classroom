-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 11, 2019 at 06:10 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `virtual_classroom_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'admin.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `image`) VALUES
(1, 'ravish', '123456', 'ravish01998@gmail.com', 'img29.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `aid` int(10) NOT NULL,
  `did` int(10) NOT NULL,
  `answer` text NOT NULL,
  `answerBy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignment_Id` int(10) NOT NULL,
  `title` text NOT NULL,
  `body` text NOT NULL,
  `cid` int(10) NOT NULL,
  `fid` int(10) NOT NULL,
  `courseCode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignment_Id`, `title`, `body`, `cid`, `fid`, `courseCode`) VALUES
(1, 'gchgcdwwd', '&lt;p&gt;nhvjhsdsdd&lt;/p&gt;\r\n', 3, 1, '3cs104'),
(2, 'gchgcdwwd', '&lt;p&gt;nhvjhsdsdd&lt;/p&gt;\r\n', 3, 1, '3cs104'),
(3, 'Structures', '&lt;p&gt;1) What is structures?&lt;/p&gt;\r\n\r\n&lt;p&gt;2) Explain its difference from enum?&lt;/p&gt;\r\n', 1, 1, '1cs101'),
(4, 'abc', '&lt;p&gt;abcde&lt;/p&gt;\r\n', 3, 1, '3cs104'),
(5, 'new Assignment', '&lt;p&gt;new Assignment&lt;/p&gt;\r\n', 2, 1, '3cs103');

-- --------------------------------------------------------

--
-- Table structure for table `assignmentresponse`
--

CREATE TABLE `assignmentresponse` (
  `assignResponseId` int(11) NOT NULL,
  `assignment_Id` int(11) NOT NULL,
  `title` text NOT NULL,
  `body` text NOT NULL,
  `sid` int(11) NOT NULL,
  `cid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignmentresponse`
--

INSERT INTO `assignmentresponse` (`assignResponseId`, `assignment_Id`, `title`, `body`, `sid`, `cid`) VALUES
(1, 1, 'gchgcdwwd', 'abcd', 6, 3),
(2, 2, 'gchgcdwwd', '&lt;p&gt;Hello this is answer&lt;/p&gt;\r\n', 6, 3),
(3, 4, 'abc', '&lt;p&gt;This is response&lt;/p&gt;\r\n', 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `cid` int(10) NOT NULL,
  `courseCode` varchar(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `fid` int(10) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`cid`, `courseCode`, `title`, `startDate`, `endDate`, `fid`, `department`) VALUES
(1, '1cs101', 'c Programming', '2018-10-01', '2018-10-26', 1, 'computerScience'),
(2, '3cs103', 'data structure', '2018-10-13', '2018-10-31', 1, 'computerScience'),
(3, '3cs104', 'cpp', '2018-10-01', '2018-10-31', 1, 'computerScience'),
(4, '5cs109', 'os', '2018-10-31', '2018-11-16', 1, 'computerScience'),
(5, '6cs110', 'lab', '2018-11-17', '2018-12-19', 1, 'computerScience'),
(6, '1it101', 'mis', '2018-11-09', '2018-12-12', 1, 'computerScience'),
(9, 'asdfg', 'lkjhgfdsa', '2018-11-16', '2018-11-28', 1, 'computerScience');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id` int(10) NOT NULL,
  `cid` int(10) NOT NULL,
  `courseCode` varchar(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `fid` int(10) NOT NULL,
  `document` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doubt`
--

CREATE TABLE `doubt` (
  `did` int(10) NOT NULL,
  `sid` int(10) NOT NULL,
  `cid` int(10) NOT NULL,
  `fid` int(10) NOT NULL,
  `dtitle` varchar(255) NOT NULL,
  `que` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doubt`
--

INSERT INTO `doubt` (`did`, `sid`, `cid`, `fid`, `dtitle`, `que`) VALUES
(1, 6, 2, 1, 'dbt1', '&lt;p&gt;new doubt&lt;/p&gt;\r\n'),
(2, 6, 3, 1, 'dbt2', '&lt;p&gt;doubt2&lt;/p&gt;\r\n'),
(3, 6, 2, 1, 'dbt3', '&lt;p&gt;doubt3&lt;/p&gt;\r\n'),
(4, 6, 3, 1, 'dbt4', '&lt;p&gt;Doubt4&lt;/p&gt;\r\n'),
(5, 6, 3, 1, 'dbt5', '&lt;p&gt;Doubt5&lt;/p&gt;\r\n'),
(6, 6, 4, 1, 'dbt10', '&lt;p&gt;what is thrasing?&lt;/p&gt;\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `doubtresponse`
--

CREATE TABLE `doubtresponse` (
  `dResponseId` int(10) NOT NULL,
  `did` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `cid` int(10) NOT NULL,
  `fid` int(10) NOT NULL,
  `sid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doubtresponse`
--

INSERT INTO `doubtresponse` (`dResponseId`, `did`, `title`, `body`, `cid`, `fid`, `sid`) VALUES
(1, 2, 'dbt2', 'Response for dbt2', 3, 1, 6),
(2, 1, 'dbt1', '&lt;p&gt;First response&lt;/p&gt;\r\n', 1, 1, 6),
(3, 5, 'dbt5', '&lt;p&gt;Response for doubt 5&lt;/p&gt;\r\n', 1, 1, 6),
(4, 4, 'dbt4', '&lt;p&gt;Response For Doubt 4&lt;/p&gt;\r\n', 1, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `eid` int(10) NOT NULL,
  `cid` int(10) NOT NULL,
  `fid` int(10) NOT NULL,
  `sid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`eid`, `cid`, `fid`, `sid`) VALUES
(1, 6, 1, 6),
(2, 4, 1, 6),
(3, 6, 1, 7),
(4, 4, 1, 7),
(5, 1, 1, 6),
(6, 2, 1, 6),
(7, 3, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fid` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT 'Unknown',
  `phoneNumber` varchar(10) DEFAULT NULL,
  `department` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'faculty.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fid`, `username`, `password`, `email`, `name`, `phoneNumber`, `department`, `image`) VALUES
(1, 'ravishKumar', '$2y$10$nxTTSye54B5jHSpIjVYXyeV4OsGv1vi4VvdYG7cTMV1Adoif3hscS', 'ravish01998@gmail.com', 'Ravish Kumar        ', '9934772199', 'computerScience', 'Chrysanthemum.jpg'),
(3, 'keshav', '$2y$10$6ab4vEFkajUO8xZW6VUwg.UEY5btZcTmDbPBvXL6Dq0UHzlSNT33e', 'keshav01998@gmail.com', 'keshav', '7717730880', 'mechanicalEngineering', 'faculty.png'),
(9, 'pqr', '$2y$10$xSyTfWfcTbaG36TFubsX7.xuHttsWrj8Dgg9mYF1.gAujacdFdTBa', 'pqr@gmail.com', 'PQR', '7717730880', 'chemistry', 'faculty.png'),
(11, 'vwx', '$2y$10$I5Q4Mcj03lK1kBQzDss88u2jd4DZXXc3Sf2Ko8nidebW4WJG2uhTS', 'vwx@gmail.com', 'VWX', '7717730880', 'mathematics', 'faculty.png'),
(13, 'ab', '$2y$10$aYhr/IFiu19QsYatbsQQ4.bdC4QJ/GiK68myz8R8SQcf.wMt8vWYi', 'ab@gmail.com', 'Unknown', NULL, 'electricalEngineering', 'faculty.png'),
(14, 'ghijkl', '$2y$10$RU753vRpH5X8Y4kbXn4am.dlOovfcEH2xlJk/ezck.rtoLDaQhkk2', 'ghijkl@gmail.com', 'Unknown', NULL, 'mechanicalEngineering', 'faculty.png'),
(15, 'cd', '$2y$10$UKnCfbOE9weJ9O013kNQNuHBOSggYou..VMV70GLjxfRVMj7L2ugu', 'cd@gmail.com', 'Unknown', NULL, 'physics', 'faculty.png'),
(16, 'ac', '$2y$10$zsWZa7xkewL19MDQ6r/k/esrX8Fk.ua2idilPtoayY11OLUaBTeDS', 'ac@gmail.com', 'AC', '7717730880', 'mechanicalEngineering', 'Desert.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `facultysignup`
--

CREATE TABLE `facultysignup` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `department` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facultysignup`
--

INSERT INTO `facultysignup` (`id`, `username`, `password`, `email`, `department`) VALUES
(1, 'abcde', '$2y$10$ERybMhZirOLAGV/wm4wNH.UKQzJwE4X38x3eW83bswDuBIr2oUUka', 'abcde@gmail.com', 'mechanicalEngineering');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `qid` int(15) NOT NULL,
  `cid` int(15) NOT NULL,
  `title` varchar(255) NOT NULL,
  `noOfQuestions` int(4) NOT NULL,
  `deadline` date NOT NULL,
  `fid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`qid`, `cid`, `title`, `noOfQuestions`, `deadline`, `fid`) VALUES
(1, 1, 'mid sem', 2, '2018-10-20', 1),
(2, 1, 'mid sem', 2, '2018-10-20', 1),
(3, 2, 'ffhjjfh', 2, '2018-10-29', 1),
(4, 2, 'abc', 2, '2018-10-31', 1),
(5, 2, 'new test', 2, '2018-11-09', 1),
(6, 4, 'MidSem', 5, '2018-11-13', 1),
(7, 4, 'end sem', 2, '2018-11-10', 1),
(8, 4, 'testExpiryRest', 2, '2018-11-04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quizquestions`
--

CREATE TABLE `quizquestions` (
  `QuesId` int(11) NOT NULL,
  `qid` int(15) NOT NULL,
  `question` text NOT NULL,
  `optionA` varchar(255) NOT NULL,
  `optionB` varchar(255) NOT NULL,
  `optionC` varchar(255) NOT NULL,
  `optionD` varchar(255) NOT NULL,
  `answer` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quizquestions`
--

INSERT INTO `quizquestions` (`QuesId`, `qid`, `question`, `optionA`, `optionB`, `optionC`, `optionD`, `answer`) VALUES
(1, 2, 'hello world', 'he', 'll', 'ow', 'd', 'B'),
(2, 6, 'What is os', 'A', 'B', 'what', 'D', 'C'),
(3, 7, 'qwe', 'a', 'qb', 'hj', 'kj', 'A'),
(4, 7, 'rty', 'ddf', 'hjk', 'lkj', 'hgf', 'B'),
(5, 8, 'qwe', 'as', 'df', 'gh', 'jk', 'A'),
(6, 8, 'qwerty', 'gh', 'ju', 'ty', 'rt', 'D'),
(7, 6, 'what is network', 'af', 'jk', 'yu', 'oi', 'D'),
(8, 6, 'hj', 'yu', 'po', 'lk', 'nj', 'C'),
(9, 6, 'jjh', 'ol', 'ju', 'ik', 'ok', 'A'),
(10, 6, 'qwertyuiop', 'po', 'iu', 'yt', 're', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `quizresponse`
--

CREATE TABLE `quizresponse` (
  `qrid` int(10) NOT NULL,
  `qid` int(10) NOT NULL,
  `sid` int(10) NOT NULL,
  `cid` int(10) NOT NULL,
  `resbody` varchar(255) NOT NULL,
  `actualAns` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quizresponse`
--

INSERT INTO `quizresponse` (`qrid`, `qid`, `sid`, `cid`, `resbody`, `actualAns`) VALUES
(1, 6, 6, 4, 'XDCBA', 'CDCAC'),
(2, 7, 6, 4, 'DA', 'AB');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `sid` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sYear` int(4) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phoneNumber` varchar(10) DEFAULT NULL,
  `department` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'student.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`sid`, `username`, `password`, `email`, `sYear`, `name`, `phoneNumber`, `department`, `image`) VALUES
(4, 'def', '$2y$10$vtFJp.g4C9dCEr799N7eI.KMzvkR/UQ9DKOgfXU2Qo9EopLLW1J06', 'def@gmail.com', 2013, 'DEF', '7717730880', 'electricalEngineering', 'student.png'),
(5, 'pqr', '$2y$10$V6w8KpG0YapeHZDTDpKVKOKwW6G6Us1UNi9WHRsO.gm9uQqAt5/XK', 'pqr@gmail.com', 2018, 'PQR', '7717730880', 'electricalEngineering', 'student.png'),
(6, 'rks', '$2y$10$SJekF9ylkWz39I9RA.osM.iFQSLWi6VMRgIr7zvocycX5BwUWC4FO', 'ravishnitp@gmail.com', 2018, 'Ravish Kumar ', '7717730880', 'computerScience', 'Desert.jpg'),
(7, 'abh', '$2y$10$IWA0c8VCQgXuvBT5lUY/5uf25krm2sDHpwt1S.hKv0dxCWYDIjeN6', 'abhijeet01998@gmail.com', 2017, 'Abhijeet Kumar  ', '7739637714', 'mechanicalEngineering', 'student.png');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(10) NOT NULL,
  `cid` int(10) NOT NULL,
  `courseCode` varchar(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `fid` int(10) NOT NULL,
  `video` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignment_Id`);

--
-- Indexes for table `assignmentresponse`
--
ALTER TABLE `assignmentresponse`
  ADD PRIMARY KEY (`assignResponseId`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doubt`
--
ALTER TABLE `doubt`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `doubtresponse`
--
ALTER TABLE `doubtresponse`
  ADD PRIMARY KEY (`dResponseId`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `facultysignup`
--
ALTER TABLE `facultysignup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `quizquestions`
--
ALTER TABLE `quizquestions`
  ADD PRIMARY KEY (`QuesId`);

--
-- Indexes for table `quizresponse`
--
ALTER TABLE `quizresponse`
  ADD PRIMARY KEY (`qrid`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `aid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignment_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `assignmentresponse`
--
ALTER TABLE `assignmentresponse`
  MODIFY `assignResponseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doubt`
--
ALTER TABLE `doubt`
  MODIFY `did` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doubtresponse`
--
ALTER TABLE `doubtresponse`
  MODIFY `dResponseId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `eid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `fid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `facultysignup`
--
ALTER TABLE `facultysignup`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `qid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `quizquestions`
--
ALTER TABLE `quizquestions`
  MODIFY `QuesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `quizresponse`
--
ALTER TABLE `quizresponse`
  MODIFY `qrid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
