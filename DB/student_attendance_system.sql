-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2024 at 11:16 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_attendance_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `aid` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sid` int(11) NOT NULL,
  `lid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`aid`, `status`, `date`, `sid`, `lid`) VALUES
(1, 'Present', '2023-10-12 14:18:12', 1, 16),
(2, 'Present', '2023-10-12 14:18:35', 1, 18),
(3, 'Present', '2023-10-12 18:03:22', 1, 22),
(5, 'present', '2023-11-03 14:19:06', 1, 25),
(6, 'present', '2023-11-03 14:45:02', 1, 27),
(7, 'present', '2023-11-03 14:50:08', 1, 29),
(8, 'present', '2023-11-03 14:50:13', 1, 28),
(9, 'present', '2023-11-03 14:55:05', 2, 29),
(10, 'present', '2023-11-03 14:55:26', 2, 28),
(11, 'present', '2023-11-10 07:32:50', 1, 30),
(12, 'present', '2023-11-11 21:11:50', 1, 31),
(13, 'present', '2023-11-20 08:30:17', 1, 34),
(14, 'present', '2023-11-20 10:02:47', 1, 36);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `bid` int(11) NOT NULL,
  `bname` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`bid`, `bname`) VALUES
(2, 'Automobile Engineering'),
(3, 'Civil Engineering'),
(4, 'Biotechnology'),
(6, 'Mechanical Engineering'),
(9, 'Bachelor of Technology'),
(10, 'Master of Computer Applications'),
(11, 'Bachelor of Computer Applications'),
(12, 'Bachelor of Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fid` int(11) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `fgender` varchar(6) NOT NULL,
  `fmobile` bigint(11) NOT NULL,
  `fdob` date NOT NULL,
  `faddress` varchar(50) NOT NULL,
  `type` varchar(15) NOT NULL,
  `femail` varchar(40) NOT NULL,
  `fpassword` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fid`, `fname`, `fgender`, `fmobile`, `fdob`, `faddress`, `type`, `femail`, `fpassword`) VALUES
(1, 'Parul Saxena', 'Female', 8786583921, '1980-02-20', 'City Center, Gwalior', 'Faculty', 'parulsaxena@gmail.com', 'parul'),
(2, 'Anshul Chaturvedi', 'Female', 7657483923, '1985-10-12', 'Near Shivaji Park, Thatipur, Gwalior', 'Faculty', 'anshuchaturvedi@gmail.com', 'anshu'),
(3, 'Rakesh Jadon', 'Male', 9979457623, '1970-05-17', 'Behine Cosmo Tower, City Center, Gwalior', 'Faculty', 'rakeshjadon@gmail.com', 'rakesh'),
(4, 'Aashi Singh Bhadoriya', 'Other', 6264572876, '1992-10-03', 'City Center, Gwalior', 'Admin', 'aashising@gmail.com', 'aashi'),
(5, 'Siddharth Sharma', 'Male', 8876499342, '1960-03-19', 'Gole Ka Mandir, Gwalior', 'Faculty', 'siddharthsharma@gmail.com', 'siddharth'),
(6, 'Kushi Pathak', 'Female', 6897035462, '1992-08-23', 'Opposite C-sky Tower, Roxy Pull, Gwalior', 'Faculty', 'kushipathak@gmail.com', 'kushi'),
(7, 'Radhika Maheshwari', 'Female', 8739345234, '1985-10-02', 'Gwalior', 'Admin', 'radhika@gmail.com', 'radhika');

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

CREATE TABLE `lecture` (
  `lid` int(11) NOT NULL,
  `stime` datetime(6) NOT NULL,
  `etime` datetime(6) NOT NULL,
  `fid` int(11) NOT NULL,
  `subid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecture`
--

INSERT INTO `lecture` (`lid`, `stime`, `etime`, `fid`, `subid`) VALUES
(5, '2023-10-08 01:14:00.000000', '2023-10-27 01:14:00.000000', 3, 3),
(6, '2023-10-10 01:17:00.000000', '2023-10-05 01:17:00.000000', 2, 7),
(13, '2023-10-25 14:00:00.000000', '2023-10-25 15:00:00.000000', 3, 3),
(16, '2023-11-20 12:02:00.000000', '2023-11-20 12:19:00.000000', 1, 1),
(17, '2023-10-19 15:55:00.000000', '2023-10-25 14:55:00.000000', 1, 9),
(18, '2023-10-21 00:55:00.000000', '2023-10-12 12:55:00.000000', 1, 1),
(19, '2023-10-12 15:17:00.000000', '2023-10-12 13:17:00.000000', 1, 9),
(20, '2023-10-12 13:30:00.000000', '2023-10-12 13:30:00.000000', 2, 2),
(21, '2023-10-12 15:35:00.000000', '2023-10-12 15:35:00.000000', 3, 3),
(22, '2023-10-12 07:48:00.000000', '2023-10-12 07:48:00.000000', 1, 1),
(23, '2023-10-12 07:49:00.000000', '2023-10-12 07:49:00.000000', 1, 1),
(24, '2023-10-13 01:00:00.000000', '2023-10-13 02:00:00.000000', 3, 3),
(25, '2023-11-03 19:46:00.000000', '2023-11-03 19:50:00.000000', 1, 1),
(26, '2023-11-03 20:11:00.000000', '2023-11-03 20:30:00.000000', 1, 9),
(27, '2023-11-03 20:14:00.000000', '2023-11-03 20:20:00.000000', 1, 1),
(28, '2023-11-03 20:00:00.000000', '2023-11-03 21:00:00.000000', 3, 3),
(29, '2023-11-03 20:15:00.000000', '2023-11-03 20:30:00.000000', 2, 2),
(30, '2023-11-10 13:01:00.000000', '2023-11-10 13:10:00.000000', 1, 1),
(31, '2023-11-12 02:41:00.000000', '2023-11-12 03:41:00.000000', 1, 1),
(32, '2023-11-20 11:54:00.000000', '2023-11-20 11:59:00.000000', 1, 1),
(33, '2023-11-20 12:58:00.000000', '2023-11-20 13:10:00.000000', 1, 1),
(34, '2023-11-20 13:48:00.000000', '2023-11-20 14:00:00.000000', 1, 22),
(35, '2023-11-20 15:30:00.000000', '2023-11-20 15:36:00.000000', 1, 7),
(36, '2023-11-20 15:32:00.000000', '2023-11-20 15:37:00.000000', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` int(11) NOT NULL,
  `sname` varchar(40) NOT NULL,
  `smobile` bigint(11) NOT NULL,
  `sdob` date NOT NULL,
  `saddress` varchar(50) NOT NULL,
  `sgender` varchar(6) NOT NULL,
  `bid` int(11) NOT NULL,
  `semail` varchar(40) NOT NULL,
  `spassword` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `sname`, `smobile`, `sdob`, `saddress`, `sgender`, `bid`, `semail`, `spassword`) VALUES
(1, 'Ritik Saxena', 8871056900, '2002-08-13', 'Nai Sadak', 'Male', 1, 'ritiksaxena@gmail.com', 'ritik'),
(2, 'Harsh Prajapati', 8877662234, '2002-12-05', 'Hospital Road, Gwalior', 'Male', 1, 'harshprajapati@gmail.com', 'harsh'),
(3, 'Rahul Batham', 8796345321, '2001-04-24', 'Bawan Payega, Nai Sadak, Gwalior', 'Male', 1, 'rahulbatham@gmail.com', 'rahul'),
(4, 'Shahrukh Khan', 9192546543, '2002-12-05', 'Near MITS College, Gole ka Mandir, Gwalior', 'Male', 2, 'sharukhkhan@gmail.com', 'sharukh'),
(5, 'Yash Namdev', 8785689432, '2001-04-24', 'Opposite Bakra Mandi, Gwalior', 'Male', 2, 'yashnamdev@gmail.com', 'yash'),
(6, 'Ashish Sharma', 9131466156, '2001-04-24', 'Brij Bihar Colony, Nai Sadak, Gwalior', 'Male', 2, 'ashishsharma@gmail.com', 'ashish'),
(7, 'Harshit Sahu', 6264578341, '2002-08-29', 'Near HP petrol pump, Dabra', 'Male', 3, 'harshitsahu@gmail.com', 'harshit'),
(8, 'Nidhi Sharma', 8768456432, '2001-12-09', 'Near Top in City, Gwalior', 'Female', 3, 'nidhisharma@gmail.com', 'nidhi'),
(9, 'Shiv Kumar', 9456929765, '2001-02-26', 'Behind Kailash Talkies, Sube Ki Goth, Lashkar, Gwa', 'Male', 3, 'shivkumar@gmail.com', 'shiv'),
(10, 'Amit Sharma', 9879657865, '2001-04-24', 'Near MITS College, Gole ka Mandir, Gwalior', 'Male', 1, 'amitsharma@gmail.com', 'amit'),
(11, 'Khusbu', 82897238748923, '2023-12-31', 'asdf', 'Female', 1, 'Khusbu@gmail.com', 'hello'),
(12, 'Khusbu', 23423, '2023-12-31', 'asdfsdf', 'Male', 1, 'khusbu@gmail.com', 'sdfss');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subid` int(11) NOT NULL,
  `subname` varchar(40) NOT NULL,
  `bid` int(11) NOT NULL,
  `fid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subid`, `subname`, `bid`, `fid`) VALUES
(1, 'Computer Network', 10, 1),
(2, 'Operating System', 10, 3),
(4, 'Engineering Physics', 2, 4),
(5, 'Engineering Maths', 2, 5),
(6, 'Engineering Chemistry', 2, 6),
(7, 'Solid Mechanics', 4, 1),
(8, 'Introduction to Bioscience', 3, 5),
(9, 'Analysis and Structural Design', 3, 1),
(17, 'Internet of Things', 10, 2),
(18, 'Data Structure', 10, 2),
(20, 'Internet of Things', 4, 2),
(22, 'Database Management System', 10, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lecture`
--
ALTER TABLE `lecture`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
