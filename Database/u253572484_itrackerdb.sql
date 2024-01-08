-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 10, 2022 at 05:38 AM
-- Server version: 10.5.16-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u253572484_itrackerdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `buttonupdate`
--

CREATE TABLE `buttonupdate` (
  `ID` int(10) NOT NULL,
  `Status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buttonupdate`
--

INSERT INTO `buttonupdate` (`ID`, `Status`) VALUES
(0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(50) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `incident` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL,
  `time` varchar(250) NOT NULL,
  `location` varchar(250) NOT NULL,
  `officer` varchar(250) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `summary` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `fullname`, `incident`, `date`, `time`, `location`, `officer`, `remarks`, `summary`) VALUES
(70, 'Arnel', 'Alarm and Scandal', '2022-03-22', '12:00 am', 'Molino II', 'Joel Tengco', 'Solved', 'Alarm and Scandal'),
(69, 'Reynaldo', 'Theft', '2022-03-01', '12:00 am', 'Molino II', 'Joel Tengco', 'Solved', 'Theft'),
(68, 'Johns', 'Alarm and Scandal', '2022-03-17', '00:34', 'Molino II', 'Joel Tengco', 'Solved', 'Solved'),
(71, 'Mary Anne', 'Alarm and Scandal', '2022-02-03', '12:00 am', 'Molino II', 'Marlon Careon', 'Solved', 'A&S'),
(72, 'Ariel', 'Alarm and Scandal', '2022-02-05', '12:00 am', 'Molino II', 'Joel Tengco', 'Solved', 'A&S'),
(73, 'Rei Shon', 'Alarm and Scandal', '2022-02-14', '12:00 am', 'Molino II', 'Marlon Careon', 'Solved', 'A&S'),
(74, 'Navarro', 'Theft', '2022-04-06', '12:00 am', 'Molino II', 'Johnny Langreo', 'Solved', 'Theft'),
(75, 'Marvin', 'Physical Injury', '2022-04-03', '12:00 am', 'Molino II', 'Marlon Careon', 'Solved', 'PI'),
(76, 'John Paul', 'Physical Injury', '2022-04-04', '12:00 am', 'Molino II', 'Joel Tengco', 'Solved', 'PI\r\n'),
(77, 'Jhon Mark', 'Alarm and Scandal', '2022-04-10', '12:00 am', 'Molino II', 'Johnny Langreo', 'Solved', 'A&S'),
(78, 'Jerme', 'Alarm and Scandal', '2022-04-13', '12:00 am', 'Molino II', 'Marlon Careon', 'Solved', 'A&S'),
(79, 'Rejino', 'Physical Injury', '2022-04-09', '12:00 am', 'Molino II', 'Johnny Langreo', 'Solved', 'PI'),
(80, 'Jhonel', 'Theft', '2022-04-20', '12:00 am', 'Molino II', 'Marlon Careon', 'Solved', 'Theft'),
(81, 'Jonaran', 'Alarm and Scandal', '2022-04-18', '12:00 am', 'Molino II', 'Joel Tengco', 'Solved', 'A&S'),
(82, 'Teresa', 'Alarm and Scandal', '2022-04-19', '12:00 am', 'Molino II', 'Johnny Langreo', 'Solved', 'A&S'),
(83, 'Cheryl', 'Alarm and Scandal', '2022-04-30', '00:00', 'Greensite Homes Molino II', 'Marlon Careon', 'Solved', 'Ms. Cheryl caused an alarm and sort of public disturbance in Greensite Homes Molino II');

-- --------------------------------------------------------

--
-- Table structure for table `resident`
--

CREATE TABLE `resident` (
  `id` int(50) NOT NULL,
  `username` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `province` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `contact` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `create_datetime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resident`
--

INSERT INTO `resident` (`id`, `username`, `lname`, `fname`, `address`, `city`, `province`, `email`, `contact`, `password`, `image`, `create_datetime`) VALUES
(1, 'ewasd', 'Lopez', 'Ardie', '900 San Marcelino St, Ermita, Manila', 'Manila', 'NCR', '', '9089926582', '9538557b603be5904f96066224861234', '', '2022-11-20 16:31:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gps`
--

CREATE TABLE `tbl_gps` (
  `id` int(11) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `opened` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gps`
--

INSERT INTO `tbl_gps` (`id`, `lat`, `lng`, `created_date`, `opened`) VALUES
(1, 14.612088, 120.971909, '2022-11-21 18:53:26', 1),
(2, 14.612095, 120.971855, '2022-11-21 18:57:52', 1),
(3, 14.612052, 120.971840, '2022-11-21 18:59:34', 1),
(4, 14.612102, 120.971840, '2022-11-21 19:01:59', 1),
(5, 14.612027, 120.971809, '2022-11-21 19:04:19', 1),
(6, 14.612051, 120.971802, '2022-11-21 19:05:13', 1),
(7, 14.612061, 120.971817, '2022-11-21 19:05:45', 1),
(8, 14.612001, 120.971970, '2022-11-21 19:41:47', 1),
(9, 14.612101, 120.971848, '2022-11-21 19:53:41', 1),
(10, 0.000000, 0.000000, '2022-11-22 08:14:14', 1),
(11, 0.000000, 0.000000, '2022-11-22 08:16:17', 1),
(12, 14.585250, 120.985275, '2022-11-22 08:21:28', 1),
(13, 0.000000, 0.000000, '2022-11-22 13:37:00', 1),
(14, 0.000000, 0.000000, '2022-11-22 13:38:16', 1),
(15, 0.000000, 0.000000, '2022-11-22 13:39:39', 1),
(16, 0.000000, 0.000000, '2022-11-22 13:40:44', 1),
(17, 0.000000, 0.000000, '2022-11-22 13:47:10', 1),
(18, 0.000000, 0.000000, '2022-11-22 13:47:46', 1),
(19, 0.000000, 0.000000, '2022-11-22 13:48:54', 1),
(20, 14.585273, 120.985031, '2022-11-22 10:53:08', 1),
(21, 14.585253, 120.984856, '2022-11-22 10:55:09', 1),
(22, 14.585261, 120.984955, '2022-11-22 05:56:01', 1),
(23, 14.585317, 120.985016, '2022-11-22 13:56:48', 1),
(24, 14.585324, 120.985008, '2022-11-22 13:57:50', 1),
(25, 14.585228, 120.985199, '2022-11-22 14:47:27', 1),
(26, 14.585150, 120.985161, '2022-11-22 14:59:44', 1),
(27, 14.585279, 120.985062, '2022-11-22 15:54:34', 1),
(28, 14.585224, 120.985016, '2022-11-22 15:55:01', 1),
(29, 14.585213, 120.984955, '2022-11-22 15:56:39', 1),
(30, 14.585269, 120.984955, '2022-11-22 15:57:31', 1),
(31, 14.410102, 120.975838, '2022-11-23 13:32:30', 1),
(32, 0.000000, 0.000000, '2022-12-03 10:08:19', 1),
(33, 0.000000, 0.000000, '2022-12-03 10:10:06', 1),
(34, 0.000000, 0.000000, '2022-12-03 10:38:19', 1),
(35, 14.612050, 120.971802, '2022-12-03 22:17:21', 1),
(36, 14.612069, 120.971840, '2022-12-03 22:18:18', 1),
(37, 14.612093, 120.971825, '2022-12-03 22:19:17', 1),
(38, 14.612072, 120.971825, '2022-12-03 22:20:02', 1),
(39, 14.612053, 120.971855, '2022-12-03 22:28:39', 1),
(40, 0.000000, 0.000000, '2022-12-04 09:47:02', 1),
(41, 14.585920, 120.985741, '2022-12-04 09:48:12', 1),
(42, 14.585934, 120.985847, '2022-12-04 09:53:29', 1),
(43, 14.585800, 120.985847, '2022-12-04 10:08:56', 1),
(44, 14.585776, 120.985825, '2022-12-04 12:57:28', 1),
(45, 14.585766, 120.985870, '2022-12-04 12:59:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_datetime` datetime NOT NULL,
  `noUpdate` int(11) NOT NULL,
  `position` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `contact` bigint(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `lname`, `fname`, `email`, `password`, `create_datetime`, `noUpdate`, `position`, `gender`, `contact`) VALUES
(40, 'genven', 'ventura', 'genesis', 'genven0626@gmail.com', '315eb115d98fcbad39ffc5edebd669c9', '2022-11-23 05:28:30', 1, 'SK Secretary', 'Male', 9475382208),
(34, 'marlon', 'Marlon', 'Careon', 'marlon@gmail.com', '73d27ff84fb900c81949f4eb3bcc18de', '2022-11-14 07:24:48', 1, 'Executive Officer', 'Male', 9454085543),
(36, 'james', 'Fajardo', 'James', 'james.limfajardo@gmail.com', '73d27ff84fb900c81949f4eb3bcc18de', '2022-11-18 20:20:40', 1, 'Executive Officer', 'Male', 9480271515),
(38, 'ardie', 'Lopez', 'Ardie Ezekiel', 'ardielopez031601@gmail.com', 'c6e950f2bdc8d379c44fc9534fb83874', '2022-11-22 06:28:45', 1, 'SK Kagawad', 'Male', 9089926582),
(50, 'jarymags', 'Magnaye', 'John Ray', 'johnraymagnaye@gmail.com', '14dcd22edf6309a65f80de38ae23a091', '2022-12-04 04:50:43', 1, 'SK Secretary', 'Male', 9454098738);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buttonupdate`
--
ALTER TABLE `buttonupdate`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resident`
--
ALTER TABLE `resident`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gps`
--
ALTER TABLE `tbl_gps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `noUpdate` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `resident`
--
ALTER TABLE `resident`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_gps`
--
ALTER TABLE `tbl_gps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
