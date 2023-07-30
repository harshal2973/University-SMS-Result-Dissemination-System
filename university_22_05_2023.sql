-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2023 at 11:41 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `uname` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`uname`, `pwd`) VALUES
('admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `be_sem_6_mse_reg`
--

CREATE TABLE `be_sem_6_mse_reg` (
  `eno` varchar(12) DEFAULT NULL,
  `IP` int(10) DEFAULT NULL,
  `ASD` int(10) DEFAULT NULL,
  `TOC` int(10) DEFAULT NULL,
  `IOT` int(10) DEFAULT NULL,
  `CCM` int(10) DEFAULT NULL,
  `CPDP` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `be_sem_6_mse_reg`
--

INSERT INTO `be_sem_6_mse_reg` (`eno`, `IP`, `ASD`, `TOC`, `IOT`, `CCM`, `CPDP`) VALUES
('201430142001', 49, 56, 55, 42, 56, 50),
('201430142002', 52, 52, 54, 44, 52, 52),
('201430142003', 55, 42, 52, 46, 48, 48);

-- --------------------------------------------------------

--
-- Table structure for table `branch_table`
--

CREATE TABLE `branch_table` (
  `coursename` varchar(30) NOT NULL,
  `branchid` int(10) NOT NULL,
  `branchname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch_table`
--

INSERT INTO `branch_table` (`coursename`, `branchid`, `branchname`) VALUES
('Bachelors of Engineering', 1, 'Computer Engineering'),
('Bachelors of Engineering', 2, 'Information Technology'),
('Masters of Engineering', 1, 'Computer Engineering'),
('Masters of Engineering', 2, 'Information Technology'),
('Bachelors of Engineering', 3, 'Computer Science Engineering'),
('Masters of Engineering', 3, 'Computer Science Engineering'),
('Diploma in Engineering', 1, 'Computer Engineering'),
('Diploma in Engineering', 2, 'Information Technology'),
('Diploma in Engineering', 3, 'Computer Science Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `course_table`
--

CREATE TABLE `course_table` (
  `courseid` varchar(20) NOT NULL,
  `coursename` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_table`
--

INSERT INTO `course_table` (`courseid`, `coursename`) VALUES
('BE', 'Bachelors of Engineering'),
('ME', 'Masters of Engineering'),
('DE', 'Diploma in Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `exam_table`
--

CREATE TABLE `exam_table` (
  `coursename` varchar(30) NOT NULL,
  `branchname` varchar(30) NOT NULL,
  `sem` int(10) NOT NULL,
  `examname` varchar(30) NOT NULL,
  `examtype` varchar(20) NOT NULL,
  `maxmarks` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_table`
--

INSERT INTO `exam_table` (`coursename`, `branchname`, `sem`, `examname`, `examtype`, `maxmarks`) VALUES
('Bachelors of Engineering', 'Computer Science Engineering', 6, 'Mid Semester Examination', 'Regular', 60),
('Bachelors of Engineering', 'Computer Science Engineering', 6, 'Mid Semester Examination', 'Regular', 60);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_table`
--

CREATE TABLE `faculty_table` (
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gen` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mno` varchar(10) NOT NULL,
  `course` varchar(30) NOT NULL,
  `branch` varchar(30) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `sem` varchar(10) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `cpwd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty_table`
--

INSERT INTO `faculty_table` (`fname`, `lname`, `dob`, `gen`, `email`, `mno`, `course`, `branch`, `uname`, `sem`, `pwd`, `cpwd`) VALUES
('Rohit', 'Patel', '1998-02-25', 'Male', 'rohitpatel@gmail.com', '9876543211', 'Bachelors of Engineering', 'Computer Science Engineering', 'rohit123', '6', '123', '123'),
('Nisha', 'Shah', '2000-01-19', 'Female', 'nishashah@gmail.com', '9845852365', 'Bachelors of Engineering', 'Computer Science Engineering', 'nisha123', '6', '123', '123'),
('Sneha', 'Desai', '2001-02-18', 'Female', 'snehadesai@gmail.com', '9876543231', 'Bachelors of Engineering', 'Computer Science Engineering', 'sneha123', '6', '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `student_table`
--

CREATE TABLE `student_table` (
  `sfname` varchar(20) NOT NULL,
  `slname` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gen` varchar(20) NOT NULL,
  `eno` varchar(12) NOT NULL,
  `sem` varchar(10) NOT NULL,
  `course` varchar(30) NOT NULL,
  `branch` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mno` varchar(10) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `femail` varchar(50) NOT NULL,
  `fmno` varchar(10) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `memail` varchar(50) NOT NULL,
  `mmno` varchar(10) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `cpwd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_table`
--

INSERT INTO `student_table` (`sfname`, `slname`, `dob`, `gen`, `eno`, `sem`, `course`, `branch`, `email`, `mno`, `fname`, `femail`, `fmno`, `mname`, `memail`, `mmno`, `pwd`, `cpwd`) VALUES
('Mahesh', 'Patel', '2002-01-08', 'Male', '201430142001', '6', 'Bachelors of Engineering', 'Computer Science Engineering', 'maheshpatel@gmail.com', '9876543200', 'Kamlesh Patel', 'kamleshpatel@gmail.com', '9876543201', 'Mina Patel', 'minapatel@gmail.com', '9876543202', '123', '123'),
('Karan', 'Shah', '2002-01-02', 'Male', '201430142002', '6', 'Bachelors of Engineering', 'Computer Science Engineering', 'karanshah@gmail.com', '9876543211', 'Shailesh Shah', 'shaileshshah@gmail.com', '9876543212', 'Komal Shah', 'komalshah@gmail.com', '9876543213', '123', '123'),
('Rohan', 'Trivedi', '2002-01-03', 'Male', '201430142003', '6', 'Bachelors of Engineering', 'Computer Science Engineering', 'rohantrivedi@gmail.com', '9876543221', 'Kamlesh Trivedi', 'kamleshtrivedi@gmail.com', '9876543222', 'Rina Trivedi', 'rinatrivedi@gmail.com', '9876543223', '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `subject_faculty_table`
--

CREATE TABLE `subject_faculty_table` (
  `coursename` varchar(50) NOT NULL,
  `branchname` varchar(50) NOT NULL,
  `semester` int(10) NOT NULL,
  `subjectname` varchar(50) NOT NULL,
  `facultyname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject_faculty_table`
--

INSERT INTO `subject_faculty_table` (`coursename`, `branchname`, `semester`, `subjectname`, `facultyname`) VALUES
('Bachelors of Engineering', 'Computer Science Engineering', 6, 'Cyber Crime and Mitigation', 'Rohit Patel'),
('Bachelors of Engineering', 'Computer Science Engineering', 6, 'Agile Software Development & Devops', 'Rohit Patel'),
('Bachelors of Engineering', 'Computer Science Engineering', 6, 'Image Processing', 'Nisha Shah'),
('Bachelors of Engineering', 'Computer Science Engineering', 6, 'Theory of Computation', 'Nisha Shah'),
('Bachelors of Engineering', 'Computer Science Engineering', 6, 'Internet of Things', 'Sneha Desai'),
('Bachelors of Engineering', 'Computer Science Engineering', 6, 'Contributor Personality & Development Program', 'Sneha Desai');

-- --------------------------------------------------------

--
-- Table structure for table `subject_table`
--

CREATE TABLE `subject_table` (
  `coursename` varchar(30) NOT NULL,
  `branchname` varchar(50) NOT NULL,
  `semester` int(10) NOT NULL,
  `subjectid` varchar(20) NOT NULL,
  `subjectname` varchar(50) NOT NULL,
  `subjectabbr` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject_table`
--

INSERT INTO `subject_table` (`coursename`, `branchname`, `semester`, `subjectid`, `subjectname`, `subjectabbr`) VALUES
('Bachelors of Engineering', 'Computer Science Engineering', 6, '316201', 'Image Processing', 'IP'),
('Bachelors of Engineering', 'Computer Science Engineering', 6, '316202', 'Agile Software Development & Devops', 'ASD'),
('Bachelors of Engineering', 'Computer Science Engineering', 6, '316203', 'Theory of Computation', 'TOC'),
('Bachelors of Engineering', 'Computer Science Engineering', 6, '316206', 'Internet of Things', 'IOT'),
('Bachelors of Engineering', 'Computer Science Engineering', 6, '316207', 'Cyber Crime and Mitigation', 'CCM'),
('Bachelors of Engineering', 'Computer Science Engineering', 5, '315201', 'Optimization Techniques', 'OT'),
('Bachelors of Engineering', 'Computer Science Engineering', 6, '316002', 'Contributor Personality & Development Program', 'CPDP');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
