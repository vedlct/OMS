-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2017 at 10:42 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oms`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `user_id` int(255) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `user_type` varchar(50) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `short_name` varchar(50) DEFAULT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  `contact_no` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `webaddress` varchar(100) DEFAULT NULL,
  `client_status` varchar(20) DEFAULT 'Deactive'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`user_id`, `username`, `password`, `user_type`, `company_name`, `short_name`, `contact_person`, `contact_no`, `email`, `address`, `webaddress`, `client_status`) VALUES
(1, 'admin', '123', 'Admin', 'TCL', 'TCL', 'forhad', '01616404404', 'fcml44@gmail.com', 'baridhara', 'errorsworld.com', 'Active'),
(2, 'test', 'test1', 'User', 'TCL1', 'TCL1', 'test1', '444', 'test1@test.com', 'test1', 'test1', 'Active'),
(5, 'chandan', '123', 'User', 'Tecno ERP', 'TE', 'Me', '01722504422', 'fcml44@gmail.com', 'baridhara', 'errorsworld.com', 'Active'),
(4, 'sgdj', 'sgdj@123', 'User', 'Sangini Gold & Diamond Jewellery', 'SG&DJ', 'test', '014444', 'test@404.com', 'sss', 'ddd', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `job_request`
--

CREATE TABLE `job_request` (
  `job_id` int(100) NOT NULL,
  `client_id` varchar(50) DEFAULT NULL,
  `service` varchar(500) DEFAULT NULL,
  `instruction` varchar(10000) DEFAULT NULL,
  `job_status` varchar(50) DEFAULT 'Pending'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_request`
--

INSERT INTO `job_request` (`job_id`, `client_id`, `service`, `instruction`, `job_status`) VALUES
(1, '5', 'test', 'www', 'Done'),
(2, '5', 'test', 'www', 'Done'),
(3, '2', 'rumi', 'adas', 'On Going'),
(4, '2', 'test', '<p><span style="font-family: sans-serif; font-size: 13.12px; font-weight: bold; white-space: nowrap;">service</span><br></p>', 'Done'),
(5, '2', 'test', '<p>huge summery</p>', 'Done'),
(6, '2', 'rumi', '<p>as</p>', 'Done'),
(7, '2', 'rumi', '<p><u>jji</u>ujii</p>', 'Done'),
(10, '2', 'test', '<p>test sdf&nbsp;</p>', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `log_info`
--

CREATE TABLE `log_info` (
  `id` int(10) NOT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `login_details` varchar(100) DEFAULT NULL,
  `logout_details` varchar(100) DEFAULT NULL,
  `login_ip` varchar(20) DEFAULT NULL,
  `login_status` varchar(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_info`
--

INSERT INTO `log_info` (`id`, `company_name`, `login_details`, `logout_details`, `login_ip`, `login_status`) VALUES
(1, 'TCL', '2017-05-08 17:15', '2017-05-18 15:31', '::1', '0'),
(2, 'TCL', '2017-05-10 18:51', '2017-05-18 15:31', '::1', '0'),
(3, 'TCL', '2017-05-11 12:34', '2017-05-18 15:31', '::1', '0'),
(4, 'TCL', '2017-05-11 18:07', '2017-05-18 15:31', '::1', '0'),
(5, 'TCL', '2017-05-18 16:05', '2017-05-18 17:03', '::1', '0'),
(6, '', '2017-05-18 16:11', '2017-05-18 19:20', '::1', '0'),
(7, '', '2017-05-18 17:25', '2017-05-18 19:20', '::1', '0'),
(8, '', '2017-05-18 19:13', '2017-05-18 19:20', '::1', '0'),
(9, '', '2017-05-18 19:27', '2017-05-18 19:32', '::1', '0'),
(10, '', '2017-05-18 19:30', '2017-05-18 19:32', '::1', '0'),
(11, '', '2017-05-18 19:32', '2017-05-18 19:32', '::1', '0'),
(12, '', '2017-05-18 19:33', '2017-05-18 20:12', '::1', '0'),
(13, '', '2017-05-18 19:39', '2017-05-18 20:12', '::1', '0'),
(14, '', '2017-05-18 19:39', '2017-05-18 20:12', '::1', '0'),
(15, '', '2017-05-18 20:12', '2017-05-18 20:40', '::1', '0'),
(16, '', '2017-05-18 20:40', '2017-07-06 15:17', '::1', '0'),
(17, '', '2017-07-05 17:58', '2017-07-06 15:17', '::1', '0'),
(18, '', '2017-07-05 18:44', '2017-07-06 15:17', '::1', '0'),
(19, '', '2017-07-06 15:29', '2017-07-12 14:09', '::1', '0'),
(20, '', '2017-07-10 15:15', '2017-07-12 14:09', '::1', '0'),
(21, '', '2017-07-11 17:51', '2017-07-12 14:09', '::1', '0'),
(22, '', '2017-07-12 12:29', '2017-07-12 14:09', '::1', '0'),
(23, '', '2017-07-12 14:26', '2017-07-12 17:26', '::1', '0'),
(24, 'TCL', '2017-07-12 16:19:59', '2017-07-12 17:07:02', '127.0.0.1', '0'),
(25, 'TCL', '2017-07-12 17:15:45', '2017-07-12 17:19:14', '127.0.0.1', '0'),
(26, 'TCL', '2017-07-12 17:20:14', '2017-07-16 13:34:32', '127.0.0.1', '0'),
(27, '', '2017-07-12 17:27', '2017-07-12 17:42', '::1', '0'),
(28, 'TCL', '2017-07-13 11:12:20', '2017-07-16 13:34:32', '127.0.0.1', '0'),
(29, '', '2017-07-13 11:45', '2017-07-16 12:57', '::1', '0'),
(30, 'TCL', '2017-07-15 11:41:52', '2017-07-16 13:34:32', '127.0.0.1', '0'),
(31, '', '2017-07-15 11:43', '2017-07-16 12:57', '::1', '0'),
(32, 'TCL', '2017-07-15 14:59:20', '2017-07-16 13:34:32', '127.0.0.1', '0'),
(33, '', '2017-07-15 15:26', '2017-07-16 12:57', '::1', '0'),
(34, 'TCL', '2017-07-16 10:24:22', '2017-07-16 13:34:32', '127.0.0.1', '0'),
(35, '', '2017-07-16 10:26', '2017-07-16 12:57', '::1', '0'),
(36, '', '2017-07-16 12:57', NULL, '::1', '1'),
(37, 'TCL', '2017-07-16 13:34:41', '2017-07-17 12:18:38', '127.0.0.1', '0'),
(38, 'TCL', '2017-07-16 16:22:34', '2017-07-17 12:18:38', '127.0.0.1', '0'),
(39, 'TCL', '2017-07-17 10:13:32', '2017-07-17 12:18:38', '127.0.0.1', '0'),
(40, '', '2017-07-17 10:15', NULL, '::1', '1'),
(41, 'TCL', '2017-07-17 12:18:47', '2017-07-17 12:25:05', '127.0.0.1', '0'),
(42, 'TCL', '2017-07-17 12:32:01', '2017-07-17 12:35:48', '127.0.0.1', '0'),
(43, 'TCL', '2017-07-17 12:35:56', '2017-07-17 12:37:44', '127.0.0.1', '0'),
(44, 'TCL', '2017-07-17 12:37:51', '2017-07-17 13:12:47', '127.0.0.1', '0'),
(45, 'TCL', '2017-07-17 13:12:55', '2017-07-17 13:13:20', '127.0.0.1', '0'),
(46, 'TCL', '2017-07-17 13:13:29', '2017-07-17 13:15:12', '127.0.0.1', '0'),
(47, 'TCL', '2017-07-17 13:15:19', '2017-07-17 13:55:43', '127.0.0.1', '0'),
(48, 'TCL', '2017-07-17 13:56:05', '2017-07-17 15:39:17', '127.0.0.1', '0'),
(49, 'TCL', '2017-07-17 15:39:29', '2017-07-17 15:40:18', '127.0.0.1', '0'),
(50, 'TCL', '2017-07-17 15:40:28', '2017-07-17 16:05:47', '127.0.0.1', '0'),
(51, 'TCL', '2017-07-17 16:05:54', '2017-07-17 16:09:43', '127.0.0.1', '0'),
(52, 'TCL', '2017-07-17 16:09:53', '2017-07-17 16:10:51', '127.0.0.1', '0'),
(53, 'TCL', '2017-07-17 16:10:58', '2017-07-19 13:15:32', '127.0.0.1', '0'),
(54, 'TCL', '2017-07-17 22:20:03', '2017-07-19 13:15:32', '127.0.0.1', '0'),
(55, 'TCL', '2017-07-17 23:28:40', '2017-07-19 13:15:32', '127.0.0.1', '0'),
(56, 'TE', '2017-07-19 13:15:53', '2017-07-19 13:16:43', '127.0.0.1', '0'),
(57, 'TCL', '2017-07-19 13:16:49', '2017-07-19 16:44:38', '127.0.0.1', '0'),
(58, 'TCL', '2017-07-19 16:13:22', '2017-07-19 16:44:38', '127.0.0.1', '0'),
(59, 'TCL', '2017-07-19 16:45:25', '2017-07-19 17:18:39', '127.0.0.1', '0'),
(60, 'TCL', '2017-07-19 17:18:56', '2017-07-20 11:10:10', '127.0.0.1', '0'),
(61, 'TCL1', '2017-07-19 17:30:40', '2017-07-20 10:33:05', '127.0.0.1', '0'),
(62, 'TCL1', '2017-07-20 10:30:56', '2017-07-20 10:33:05', '127.0.0.1', '0'),
(63, 'TCL', '2017-07-20 10:33:30', '2017-07-20 11:10:10', '127.0.0.1', '0'),
(64, 'TCL1', '2017-07-20 11:10:18', '2017-07-20 11:38:04', '127.0.0.1', '0'),
(65, 'TCL1', '2017-07-20 11:14:46', '2017-07-20 11:38:04', '127.0.0.1', '0'),
(66, 'TCL', '2017-07-20 11:38:31', '2017-07-20 12:49:18', '127.0.0.1', '0'),
(67, 'TCL', '2017-07-20 12:49:30', '2017-07-20 12:51:28', '127.0.0.1', '0'),
(68, 'TCL1', '2017-07-20 12:51:37', '2017-07-20 13:01:16', '127.0.0.1', '0'),
(69, 'TCL', '2017-07-20 13:01:26', '2017-07-20 13:07:10', '127.0.0.1', '0'),
(70, 'TCL1', '2017-07-20 13:13:35', NULL, '127.0.0.1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(10) NOT NULL,
  `sender` varchar(100) NOT NULL,
  `receiver` varchar(100) NOT NULL,
  `sms` text NOT NULL,
  `job` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `inserted_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `sender`, `receiver`, `sms`, `job`, `status`, `inserted_time`) VALUES
(16, 'Admin', 'TCL1', 'aaa', '', '', '2017-07-19 18:00:00'),
(17, 'TCL1', 'Admin', 'user msg', '', '', '2017-07-19 18:00:00'),
(18, 'Techno Erp', 'Admin', 'techno', '', '', '2017-07-19 18:00:00'),
(19, 'Admin', 'TCL1', 'new msg', '', 'unseen', '2017-07-20 05:38:49'),
(20, 'Admin', 'TCL1', 's', '', 'unseen', '2017-07-20 06:48:45'),
(21, 'Admin', 'TCL1', 'reply from admin', '', 'unseen', '2017-07-20 06:48:58'),
(22, 'Admin', 'Techno Erp', 'reply to techno', '', 'unseen', '2017-07-20 06:50:47'),
(23, 'TCL1', 'Admin', 'but tcl can see this', '', 'unseen', '2017-07-20 06:53:22'),
(24, 'TCL1', 'Admin', 'tcl replied', '', 'unseen', '2017-07-20 07:01:03'),
(25, 'Admin', 'TCL1', 'tcl msg seen from admin', '', 'unseen', '2017-07-20 07:02:22');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(100) NOT NULL,
  `service_name` varchar(1000) DEFAULT NULL,
  `service_type` varchar(500) DEFAULT NULL,
  `service_status` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_name`, `service_type`, `service_status`) VALUES
(1, 'test', 'web', 'Active'),
(8, 'a', 'a', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `job_request`
--
ALTER TABLE `job_request`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `log_info`
--
ALTER TABLE `log_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `job_request`
--
ALTER TABLE `job_request`
  MODIFY `job_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `log_info`
--
ALTER TABLE `log_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
