-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2022 at 09:53 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `snaphomework`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminuser` varchar(50) NOT NULL,
  `adminpass` varchar(100) NOT NULL,
  `adminemail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminuser`, `adminpass`, `adminemail`) VALUES
('myadmin', 'admin', 'myadmin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignmentid` int(11) NOT NULL,
  `assignmenttopic` varchar(100) NOT NULL,
  `assignmentdesc` text NOT NULL,
  `assignmentfile` varchar(100) NOT NULL,
  `subid` int(11) NOT NULL,
  `teacherid` int(11) NOT NULL,
  `uploaddate` date NOT NULL,
  `lastdate` date NOT NULL,
  `coursename` varchar(100) NOT NULL,
  `assignmentsem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignmentid`, `assignmenttopic`, `assignmentdesc`, `assignmentfile`, `subid`, `teacherid`, `uploaddate`, `lastdate`, `coursename`, `assignmentsem`) VALUES
(7, 'trtyr', 'ryyr', 'photouploads/amanté.pdf', 35, 22, '2022-04-03', '2022-04-03', 'BBA', 6);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendanceid` int(11) NOT NULL,
  `attendancedate` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `studentid` int(11) NOT NULL,
  `teacherid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendanceid`, `attendancedate`, `status`, `studentid`, `teacherid`) VALUES
(18, '2022-04-21', 'P', 19, 22),
(21, '2022-04-22', 'P', 19, 22),
(22, '2022-04-22', 'P', 22, 22);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `coursename` varchar(100) NOT NULL,
  `courseduration` int(20) NOT NULL,
  `coursedesc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`coursename`, `courseduration`, `coursedesc`) VALUES
('BBA', 3, 'This is BBA Course'),
('BCA', 3, 'This is BCA course'),
('CSE', 4, 'This is CSE Course');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `marksid` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `teacherid` int(11) NOT NULL,
  `subid` int(11) NOT NULL,
  `assignmentid` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `coursename` varchar(100) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `mstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `notesid` int(11) NOT NULL,
  `coursename` varchar(100) NOT NULL,
  `subid` int(11) NOT NULL,
  `notesfile` varchar(100) NOT NULL,
  `notestitle` varchar(50) NOT NULL,
  `notesdesc` text NOT NULL,
  `notesdate` date NOT NULL,
  `notessem` int(11) NOT NULL,
  `teacherid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`notesid`, `coursename`, `subid`, `notesfile`, `notestitle`, `notesdesc`, `notesdate`, `notessem`, `teacherid`) VALUES
(9, 'CSE', 33, 'photouploads/amanté.pdf', 'dc', 'fvfvv', '2022-04-03', 6, 22);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `noticeid` int(11) NOT NULL,
  `noticetitle` varchar(100) NOT NULL,
  `noticedesc` text NOT NULL,
  `noticedate` date NOT NULL,
  `noticeflag` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`noticeid`, `noticetitle`, `noticedesc`, `noticedate`, `noticeflag`) VALUES
(1, 'Fee Submission', 'The submission of fee after the last date is not accepted', '2021-08-28', 'student'),
(2, 'Discussion', 'Kindly meet all teacher at reception', '2021-08-29', 'teacher'),
(3, 'Assignment', 'The assignment is not submitted after the last date', '2021-09-02', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `sendmessage`
--

CREATE TABLE `sendmessage` (
  `messageid` int(11) NOT NULL,
  `messagedate` date NOT NULL,
  `messagestatus` int(11) NOT NULL,
  `message` text NOT NULL,
  `coursename` varchar(100) NOT NULL,
  `teacherid` int(11) NOT NULL,
  `messagesem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sendmessage`
--

INSERT INTO `sendmessage` (`messageid`, `messagedate`, `messagestatus`, `message`, `coursename`, `teacherid`, `messagesem`) VALUES
(7, '2022-04-21', 1, 'wqeqeqe', 'BBA', 22, 6);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentid` int(11) NOT NULL,
  `studentroll` int(11) NOT NULL,
  `studentname` varchar(100) NOT NULL,
  `studentfather` varchar(100) NOT NULL,
  `studentsex` varchar(20) NOT NULL,
  `studentmobile` varchar(50) NOT NULL,
  `studentguidancemobile` varchar(50) NOT NULL,
  `studentaddress` text NOT NULL,
  `studentemail` varchar(100) NOT NULL,
  `studentpass` varchar(100) NOT NULL,
  `studentphoto` varchar(100) NOT NULL,
  `coursename` varchar(100) NOT NULL,
  `studentstatus` varchar(20) NOT NULL,
  `studentsem` varchar(20) NOT NULL,
  `studentcountry` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentid`, `studentroll`, `studentname`, `studentfather`, `studentsex`, `studentmobile`, `studentguidancemobile`, `studentaddress`, `studentemail`, `studentpass`, `studentphoto`, `coursename`, `studentstatus`, `studentsem`, `studentcountry`) VALUES
(19, 1001, 'Abhi', 'abc', 'male', '1234567890', '0987654321', 'KPM', 'ab.kp6239@gmail.com', '123', 'photouploads/test3.jpg', 'CSE', '1', '6', 'male'),
(20, 1002, 'Abhi Singh', 'abc', 'male', '0987654321', '1234567890', 'GNDU', 'abhi@gmail.com', '123', 'photouploads/test1.jpg', 'BBA', '1', '6', 'India'),
(21, 1003, 'Inder', 'abc', 'male', '0987654321', '1234567890', 'Bus Stand', 'inder@gmail.com', 'wFmnOsQ3$i', 'photouploads/test4.jpg', 'BCA', '1', '6', 'Canada'),
(22, 1004, 'Palak', 'abc', 'female', '1234567890', '0987654321', 'Rani ka bagh', 'palak@gmail.com', '123', 'photouploads/test1.jpg', 'CSE', '1', '6', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subid` int(11) NOT NULL,
  `subname` varchar(100) NOT NULL,
  `subdesc` text NOT NULL,
  `coursename` varchar(100) NOT NULL,
  `subsem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subid`, `subname`, `subdesc`, `coursename`, `subsem`) VALUES
(33, 'ML', 'This is ML', 'CSE', 6),
(34, 'JAVA', 'This is JAVA', 'BCA', 6),
(35, 'HRM', 'This is HRM', 'BBA', 6);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teachername` varchar(100) NOT NULL,
  `teachermobile` int(30) NOT NULL,
  `teacheraddress` text NOT NULL,
  `teacherphoto` varchar(100) NOT NULL,
  `teacherquali` varchar(50) NOT NULL,
  `teacheremail` varchar(100) NOT NULL,
  `teacherpass` varchar(100) NOT NULL,
  `teachersubject` varchar(50) DEFAULT NULL,
  `teacherid` int(11) NOT NULL,
  `teachersex` varchar(20) NOT NULL,
  `teacherstate` varchar(50) NOT NULL,
  `teachercountry` varchar(50) NOT NULL,
  `coursename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teachername`, `teachermobile`, `teacheraddress`, `teacherphoto`, `teacherquali`, `teacheremail`, `teacherpass`, `teachersubject`, `teacherid`, `teachersex`, `teacherstate`, `teachercountry`, `coursename`) VALUES
('Abhishek', 987654321, 'Kamla Devi Avenue', 'photouploads/test1.jpg', 'B. Tech CSE', 'abhishek.kp6239@gmail.com', '123', 'JAVA', 22, 'male', 'Punjab', '', 'BCA'),
('Abhijeet', 1234567890, 'Chhehata Road', 'photouploads/test3.jpg', 'Music', 'abhijeet@gmail.com', '123', 'HRM', 23, 'female', 'Punjab', 'Canada', 'BBA');

-- --------------------------------------------------------

--
-- Table structure for table `upassign`
--

CREATE TABLE `upassign` (
  `assignid` int(11) NOT NULL,
  `subid` int(11) NOT NULL,
  `teacherid` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `coursename` varchar(100) NOT NULL,
  `assignpath` varchar(100) NOT NULL,
  `assignstatus` int(11) NOT NULL,
  `assignsem` int(11) NOT NULL,
  `sturoll` int(11) NOT NULL,
  `assignmentid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminuser`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignmentid`),
  ADD KEY `afk1` (`subid`),
  ADD KEY `afk2` (`teacherid`),
  ADD KEY `afkk3` (`coursename`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendanceid`),
  ADD KEY `afk3` (`studentid`),
  ADD KEY `afk4` (`teacherid`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`coursename`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`marksid`),
  ADD KEY `mfk1` (`assignmentid`),
  ADD KEY `mfk2` (`coursename`),
  ADD KEY `mfk3` (`studentid`),
  ADD KEY `mfk4` (`subid`),
  ADD KEY `mfk5` (`teacherid`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`notesid`),
  ADD KEY `nfk1` (`coursename`),
  ADD KEY `nfk2` (`teacherid`),
  ADD KEY `nfk3` (`subid`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`noticeid`);

--
-- Indexes for table `sendmessage`
--
ALTER TABLE `sendmessage`
  ADD PRIMARY KEY (`messageid`),
  ADD KEY `smfk1` (`coursename`),
  ADD KEY `smfk2` (`teacherid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentid`),
  ADD UNIQUE KEY `studentemail` (`studentemail`),
  ADD KEY `coursename` (`coursename`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subid`),
  ADD KEY `sfk` (`coursename`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacherid`),
  ADD UNIQUE KEY `teacheremail` (`teacheremail`),
  ADD KEY `tfk` (`coursename`);

--
-- Indexes for table `upassign`
--
ALTER TABLE `upassign`
  ADD PRIMARY KEY (`assignid`),
  ADD KEY `safk1` (`coursename`),
  ADD KEY `safk2` (`studentid`),
  ADD KEY `safk3` (`subid`),
  ADD KEY `safk4` (`teacherid`),
  ADD KEY `safk5` (`assignmentid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignmentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendanceid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `marksid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `notesid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `noticeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sendmessage`
--
ALTER TABLE `sendmessage`
  MODIFY `messageid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacherid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `upassign`
--
ALTER TABLE `upassign`
  MODIFY `assignid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `afk1` FOREIGN KEY (`subid`) REFERENCES `subject` (`subid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `afk2` FOREIGN KEY (`teacherid`) REFERENCES `teacher` (`teacherid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `afkk3` FOREIGN KEY (`coursename`) REFERENCES `courses` (`coursename`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `afk3` FOREIGN KEY (`studentid`) REFERENCES `student` (`studentid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `afk4` FOREIGN KEY (`teacherid`) REFERENCES `teacher` (`teacherid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `mfk1` FOREIGN KEY (`assignmentid`) REFERENCES `assignment` (`assignmentid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mfk2` FOREIGN KEY (`coursename`) REFERENCES `courses` (`coursename`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mfk3` FOREIGN KEY (`studentid`) REFERENCES `student` (`studentid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mfk4` FOREIGN KEY (`subid`) REFERENCES `subject` (`subid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mfk5` FOREIGN KEY (`teacherid`) REFERENCES `teacher` (`teacherid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `nfk1` FOREIGN KEY (`coursename`) REFERENCES `courses` (`coursename`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nfk2` FOREIGN KEY (`teacherid`) REFERENCES `teacher` (`teacherid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nfk3` FOREIGN KEY (`subid`) REFERENCES `subject` (`subid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sendmessage`
--
ALTER TABLE `sendmessage`
  ADD CONSTRAINT `smfk1` FOREIGN KEY (`coursename`) REFERENCES `courses` (`coursename`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `smfk2` FOREIGN KEY (`teacherid`) REFERENCES `teacher` (`teacherid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `myfk` FOREIGN KEY (`coursename`) REFERENCES `courses` (`coursename`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `sfk` FOREIGN KEY (`coursename`) REFERENCES `courses` (`coursename`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `tfk` FOREIGN KEY (`coursename`) REFERENCES `courses` (`coursename`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `upassign`
--
ALTER TABLE `upassign`
  ADD CONSTRAINT `safk1` FOREIGN KEY (`coursename`) REFERENCES `courses` (`coursename`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `safk2` FOREIGN KEY (`studentid`) REFERENCES `student` (`studentid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `safk3` FOREIGN KEY (`subid`) REFERENCES `subject` (`subid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `safk4` FOREIGN KEY (`teacherid`) REFERENCES `teacher` (`teacherid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `safk5` FOREIGN KEY (`assignmentid`) REFERENCES `assignment` (`assignmentid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
