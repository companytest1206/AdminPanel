-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2018 at 04:38 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `admin_panel`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comp_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comp_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=40 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`cid`, `comp_name`, `comp_url`, `created_at`, `updated_at`) VALUES
(1, 'Narola Infotech', 'http://narolainfotech.com', '2018-01-30 18:00:00', '2018-01-30 19:00:00'),
(2, 'Coldfin Private Lab', 'http://coldfinlab.com', '2018-02-20 18:11:30', '2018-02-20 18:20:30'),
(3, 'Peacock Technologies', 'http://peacockTech.com', '2018-03-15 17:15:16', '2018-09-12 18:25:34'),
(5, 'Tech Sky Technologies', 'http://techSky.com', '2018-04-30 17:17:55', '2018-04-30 19:22:55'),
(7, 'Linkup PVT. LTD.', 'http://linkupsolutions.in', '2018-06-22 17:34:34', '2018-06-22 19:00:00'),
(8, 'Diffusion Infotech', 'http://diffusioninfotech.com', '2018-07-30 19:06:31', '2018-07-30 19:10:31'),
(9, 'Log Infotech', 'http://loginfotech.com', '2018-07-30 19:30:19', '2018-07-30 19:30:19'),
(10, 'Dominant Infotech', 'http://dominantinfotech.com', '2018-08-30 19:10:09', '2018-08-30 19:10:09'),
(12, 'SkyHigh', 'http://skyhigh.com', '2018-09-10 16:52:27', '2018-09-10 16:52:27'),
(13, 'Shine Infotech', 'http://shineinfotech.com', '2018-09-11 16:52:37', '2018-09-11 16:52:37'),
(15, 'EClinical Works', 'http://eclinicalworks.com', '2018-09-13 17:29:47', '2018-09-13 17:29:47');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `cust_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `name`, `address`, `phone`, `email`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Prachi Patel', 'Udhana, Surat', '7228044734', 'p@gmail.com', NULL, '2018-09-21 18:20:18', '2018-10-18 16:08:36'),
(2, 'Akshay', 'Navsari', '7228044734', 'akytest@gmail.com', NULL, '2018-09-26 17:30:32', '2018-09-26 17:30:32'),
(3, 'Anmol Patel', 'Surat surat', '7226894240', 'companytest1130@gmail.com', NULL, '2018-09-27 18:10:26', '2018-10-11 20:41:35');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE IF NOT EXISTS `designation` (
  `des_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`des_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`des_id`, `designation`, `created_at`, `updated_at`) VALUES
(1, 'Front End Developer', '2018-08-07 17:20:00', '2018-08-07 17:20:00'),
(2, 'Back End Developer', '2018-08-09 20:18:00', '2018-08-09 20:18:00'),
(3, 'UI/UX Designer', '2018-08-07 17:23:30', '2018-08-07 17:23:30'),
(4, 'Tester', '2018-08-07 17:32:00', '2018-08-07 17:32:00'),
(5, 'Analyst', '2018-08-09 20:18:00', '2018-08-09 20:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `drafts`
--

CREATE TABLE IF NOT EXISTS `drafts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reply_message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `msg_id` int(11) NOT NULL,
  `forward_to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `drafts`
--

INSERT INTO `drafts` (`id`, `reply_message`, `details`, `attachment`, `created_at`, `updated_at`, `msg_id`, `forward_to`) VALUES
(1, 'Hello Anamika Patel!\n              	  	CV has been sended in email.\n               		Thank you!  Yours Faithfully, Anmol Patel!', '--------Forwarded Message--------\n				From: Anamika Patel \n				Date: Oct 5, 2018, 12:18 (2 days ago)\n				Subject: Laravel: You''ve got a new message from Anamika Patel!\n				To: ', 'null', '2018-10-08 17:04:39', '2018-10-08 17:04:39', 4, 'companytest1130@gmail.com'),
(2, 'hello', 'null', 'null', '2018-10-08 17:30:06', '2018-10-08 17:30:06', 4, 'companytest1130@gmail.com'),
(14, 'Hello Anamika Patel!\n              	  				CV has been sended in email.\n               					Thank you!  Yours Faithfully, Anmol Patel!', '--------Forwarded Message--------\n							From: Anamika Patel \n							Date: Oct 5, 2018, 12:20 (7 days ago)\n							Subject: Laravel: You''ve got a new message from Anamika Patel!\n							To: ', 'C:\\fakepath\\generate-pdf.pdf', '2018-10-12 19:55:14', '2018-10-12 19:55:14', 6, 'companytest1130@gmail.com'),
(22, 'hello', 'null', 'C:\\fakepath\\Work update  Format.pdf', '2018-10-13 17:52:51', '2018-10-13 17:52:51', 1, 'companytest1130@gmail.com'),
(24, '\nHello Anamika Patel!\nCV has been sended in email.\nThank you!  Yours Faithfully, Anmol Patel! //forwarded msg\n', '--------Forwarded Message--------\n							From: Anamika Patel \n							Date: Oct 2, 2018, 07:42 (11 days ago)\n							Subject: Laravel: You''ve got a new message from Anamika Patel!\n							To: ', 'C:\\fakepath\\Work update  Format.pdf', '2018-10-13 17:59:39', '2018-10-13 17:59:39', 1, 'companytest1130@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` date DEFAULT NULL,
  `extra_notes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Employee',
  `company_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_salary` int(11) NOT NULL,
  `emp_joining_date` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `emp_address`, `emp_phone`, `emp_image`, `email`, `emp_position`, `duration`, `extra_notes`, `emp_gender`, `emp_designation`, `emp_role`, `company_id`, `team_id`, `emp_salary`, `emp_joining_date`, `created_at`, `updated_at`) VALUES
(5, 'Nisarg Patel', 'Udhana, Surat', '7226894240', 'pexels-photo-46710.jpeg', 'nisu@gmail.com', '1', '2018-03-07', 'Your training is for 3 months and probation period will be for 1 year.', 'male', '3', 'Employee', '1', '1', 4000, '2018-01-07 21:28:44', '2018-01-07 21:28:44', '2018-09-14 13:48:44'),
(6, 'Anmol Patel', 'Surat', '0987654321', 'person1.jpg', 'companytest1130@gmail.com', '2', '0000-00-00', 'You are selected as an employee.', 'male', '5', 'Employee', '1', '1', 12000, '2018-02-07 21:52:43', '2018-02-07 21:52:43', '2018-09-11 16:11:23'),
(9, 'Anamika Kamani', 'Surat', '0987654321', 'gallery-1.jpg', 'anamika@gmail.com', '1', '2018-06-10', 'Your training is for 3 months and probation period will be for 1 year.', 'female', '3', 'Employee', '2', '18', 4000, '2018-03-10 15:58:27', '2018-03-10 15:58:27', '2018-03-10 18:48:51'),
(10, 'Maitry Patel', 'Navsari', '0987654321', 'gallery-12.jpg', 'mapatel@gmail.com', '3', '2018-10-10', 'Your training is for 6 months and probation period will be for 1 year.', 'female', '4', 'Employee', '1', '17', 2500, '2018-04-10 17:07:18', '2018-04-10 17:07:18', '2018-04-10 17:07:40'),
(11, 'Prachi Patel', 'Surat', '7226894240', 'bride.jpg', 'angel.prachi03@gmail.com', '3', '2018-11-01', 'Your training is for 6 months and probation period will be for 1 year.', 'female', '2', 'Employee', '2', '14', 2500, '2018-05-01 14:28:34', '2018-05-01 14:28:34', '2018-05-01 14:28:34'),
(12, 'Yash Patel', 'Surat', '1234567890', 'person2.jpg', 'yash@gmail.com', '2', '0000-00-00', 'You are selected as an employee.', 'male', '3', 'Employee', '2', '14', 10000, '2018-05-10 17:50:06', '2018-05-10 17:50:06', '2018-09-10 18:30:00'),
(13, 'Dhara Patel', 'Surat', '1234567890', 'images (6).jpg', 'dhara@gmail.com', '1', '2018-09-10', 'Your training is for 3 months and probation period will be for 1 year.', 'female', '5', 'Employee', '3', '7', 4000, '2018-06-10 19:33:37', '2018-06-10 19:33:37', '2018-09-11 16:13:54'),
(14, 'Akshay Patel', 'Navsari', '9876543210', 'thumbnail-smile.jpg', 'akshay@gmail.com', '2', '0000-00-00', 'You are selected as an employee.', 'male', '2', 'Employee', '2', '18', 12000, '2018-07-11 13:23:19', '2018-07-11 13:23:19', '2018-09-11 13:23:19'),
(15, 'Patel Disha', 'Navsari', '7654321890', 'gallery-12.jpg', 'disha@gmail.com', '1', '2018-11-11', 'Your training is for 3 months and probation period will be for 1 year.', 'female', '1', 'Employee', '1', '1', 4000, '2018-08-11 13:30:21', '2018-08-11 13:30:21', '2018-09-12 11:49:15'),
(16, 'Patel Parth', 'Navsari', '9807654321', 'ABC5b1b02852bb26.jpg', 'parth@gmail.com', '3', '2019-02-20', 'Your training is for 6 months and probation period will be for 1 year.', 'male', '1', 'Employee', '1', '3', 2500, '2018-08-20 13:31:33', '2018-08-20 13:31:33', '2018-09-20 15:00:29'),
(17, 'Patel Vishwa', 'Surat', '6356908765', 'WhatsApp-DP-for-Girls-1185b1b02853948c.jpg', 'vishwa@gmail.com', '3', '2019-03-20', 'Your training is for 6 months and probation period will be for 1 year.', 'female', '5', 'Employee', '1', '3', 2500, '2018-09-21 15:00:01', '2018-09-21 15:00:01', '2018-09-21 15:00:01'),
(18, 'Patel Nikunj', 'Navsari', '1234567890', 'c.jpg', 'nikunj@gmail.com', '2', '0000-00-00', 'You are selected as an employee.', 'male', '3', 'Employee', '2', '10', 12000, '2018-10-11 16:34:46', '2018-10-11 16:34:46', '2018-10-11 16:35:11'),
(19, 'Kharadi Himanshu', 'Gandhinagar', '7890654321', 'road.jpg', 'himanshu@yahoo.com', '2', '0000-00-00', 'You are selected as an employee.', 'male', '1', 'Employee', '1', '13', 10000, '2018-11-19 17:39:58', '2018-11-19 17:39:58', '2018-11-19 17:39:58'),
(20, 'Test User', 'Surat', '9786534210', 'gallery-8.jpg', 'testuser123@gmail.com', '1', '2019-03-18', 'Your training is for 3 months and probation period will be for 1 year.', 'female', '2', 'Employee', '2', '19', 4000, '2018-12-18 20:16:52', '2018-12-18 20:16:52', '2018-12-18 21:29:33');

-- --------------------------------------------------------

--
-- Table structure for table `emp_salary`
--

CREATE TABLE IF NOT EXISTS `emp_salary` (
  `sid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `BasicAndDA` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HRA` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Conveyance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ProvidentFund` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ESI` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Loan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ProfessionTax` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TSD_IT` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NetSalary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Salary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `emp_salary`
--

INSERT INTO `emp_salary` (`sid`, `BasicAndDA`, `HRA`, `Conveyance`, `ProvidentFund`, `ESI`, `Loan`, `ProfessionTax`, `TSD_IT`, `NetSalary`, `Salary`, `employee_id`, `created_at`, `updated_at`) VALUES
(1, '7200', '4000', '500', '350', '120', '-', '-', '-', '11230', '', '5', '2018-09-14 18:00:00', '2018-09-14 18:00:00'),
(2, '7200', '4000', '500', '350', '120', '-', '-', '-', '11230', '', '6', '2018-09-14 18:00:00', '2018-09-14 18:00:00'),
(3, '7200', '4000', '500', '350', '120', '-', '-', '-', '11230', '', '9', '2018-09-14 18:00:00', '2018-09-14 18:00:00'),
(4, '5200', '3000', '500', '350', '120', '-', '-', '-', '8222', '', '10', '2018-09-14 18:00:00', '2018-09-14 18:00:00'),
(5, '7200', '4000', '500', '350', '120', '-', '-', '-', '11230', '', '11', '2018-09-14 18:00:00', '2018-09-14 18:00:00'),
(6, '7200', '4000', '500', '350', '120', '-', '-', '-', '11230', '', '12', '2018-09-14 18:00:00', '2018-09-14 18:00:00'),
(7, '7200', '4000', '500', '350', '120', '-', '-', '-', '8222', '', '13', '2018-09-14 18:00:00', '2018-09-14 18:00:00'),
(8, '7200', '4000', '500', '350', '120', '-', '-', '-', '11230', '', '14', '2018-09-14 18:00:00', '2018-09-14 18:00:00'),
(9, '5200', '3000', '500', '350', '120', '-', '-', '-', '8222', '', '15', '2018-09-14 18:00:00', '2018-09-14 18:00:00'),
(10, '5200', '3000', '500', '350', '120', '-', '-', '-', '8222', '', '16', '2018-09-14 18:00:00', '2018-09-14 18:00:00'),
(11, '7200', '4000', '500', '350', '120', '100', '-', '-', '11130', '', '17', '2018-09-14 18:00:00', '2018-09-14 18:00:00'),
(12, '7200', '4000', '500', '350', '120', '300', '-', '-', '10930', '', '18', '2018-09-14 18:00:00', '2018-09-14 18:00:00'),
(13, '5200', '3000', '500', '350', '120', '-', '-', '-', '8222', '', '19', '2018-09-14 18:00:00', '2018-09-14 18:00:00'),
(14, '7200', '4000', '500', '350', '120', '300', '-', '-', '10930', '', '20', '2018-09-14 18:00:00', '2018-09-14 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `inv_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cust_id` int(11) NOT NULL,
  `prod_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `sub_total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`inv_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`inv_id`, `cust_id`, `prod_name`, `prod_qty`, `prod_price`, `prod_description`, `tax`, `sub_total`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ladies Dress,Jeans', '1,1', '1200,1000', 'Red ladies dress,Blue denim jeans', 'null', '1200,1000', '2200', '2018-09-25 12:29:48', '2018-09-25 12:29:48'),
(3, 2, 'Ladies Dress,Jeans,demo product', '1,2,1', '1200,1000,100', 'Red ladies dress,Blue denim jeans,example product', 'null', '1200,2000,1000', '3300', '2018-09-26 19:03:07', '2018-09-26 19:03:07'),
(9, 3, 'Jeans', '2', '1000', 'Blue denim jeans', 'null', '2000', '2000', '2018-09-27 18:17:45', '2018-09-27 18:17:45');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `log_activities`
--

CREATE TABLE IF NOT EXISTS `log_activities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=630 ;

--
-- Dumping data for table `log_activities`
--

INSERT INTO `log_activities` (`id`, `subject`, `url`, `method`, `ip`, `agent`, `user_id`, `created_at`, `updated_at`) VALUES
(19, 'User logged out successfully', 'http://192.168.2.169:8000/logout', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, '2018-09-14 15:00:59', '2018-09-14 15:00:59'),
(20, 'User logged in successfully', 'http://192.168.2.169:8000/login', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, '2018-09-14 15:01:21', '2018-09-14 15:01:21'),
(21, 'User logged in successfully', 'http://192.168.2.169:8000/login', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, '2018-09-14 17:32:08', '2018-09-14 17:32:08'),
(22, 'User logged in successfully', 'http://192.168.2.169:8000/login', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, '2018-09-15 12:00:50', '2018-09-15 12:00:50'),
(23, 'User logged in successfully', 'http://192.168.2.169:8000/login', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, '2018-09-15 12:59:49', '2018-09-15 12:59:49'),
(24, 'User logged in successfully', 'http://192.168.2.169:8000/login', 'POST', '192.168.2.151', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, '2018-09-15 14:06:20', '2018-09-15 14:06:20'),
(25, 'User updated successfully', 'http://192.168.2.169:8000/users/edit/5', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, '2018-09-15 14:59:40', '2018-09-15 14:59:40'),
(26, 'Admin profile updated', 'http://192.168.2.169:8000/update/profile/1/0/0/0', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, '2018-09-15 19:47:30', '2018-09-15 19:47:30'),
(27, 'Admin profile updated', 'http://192.168.2.169:8000/update/profile/1/0/0/0', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, '2018-09-15 19:47:38', '2018-09-15 19:47:38'),
(28, 'User logged in successfully', 'http://192.168.2.169:8000/login', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 68, '2018-09-17 12:34:00', '2018-09-17 12:34:00'),
(29, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 68, '2018-09-17 13:52:54', '2018-09-17 13:52:54'),
(30, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 68, '2018-09-17 13:56:26', '2018-09-17 13:56:26'),
(31, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 68, '2018-09-17 13:56:43', '2018-09-17 13:56:43'),
(32, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 68, '2018-09-17 13:57:59', '2018-09-17 13:57:59'),
(33, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 68, '2018-09-17 13:58:23', '2018-09-17 13:58:23'),
(34, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 68, '2018-09-17 13:58:59', '2018-09-17 13:58:59'),
(35, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 68, '2018-09-17 14:00:52', '2018-09-17 14:00:52'),
(36, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 68, '2018-09-17 14:01:50', '2018-09-17 14:01:50'),
(37, 'User logged out successfully', 'http://192.168.2.169:8000/logout', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, '2018-09-17 14:04:55', '2018-09-17 14:04:55'),
(38, 'User logged in successfully', 'http://192.168.2.169:8000/login', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, '2018-09-17 14:05:31', '2018-09-17 14:05:31'),
(39, 'User logged out successfully', 'http://192.168.2.169:8000/logout', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, '2018-09-17 14:06:08', '2018-09-17 14:06:08'),
(40, 'User logged in successfully', 'http://192.168.2.169:8000/login', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 68, '2018-09-17 14:06:17', '2018-09-17 14:06:17'),
(41, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 68, '2018-09-17 14:07:01', '2018-09-17 14:07:01'),
(42, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 68, '2018-09-17 14:07:49', '2018-09-17 14:07:49'),
(43, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 68, '2018-09-17 14:08:10', '2018-09-17 14:08:10'),
(44, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 68, '2018-09-17 14:09:51', '2018-09-17 14:09:51'),
(45, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 68, '2018-09-17 14:11:11', '2018-09-17 14:11:11'),
(46, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 68, '2018-09-17 14:16:19', '2018-09-17 14:16:19'),
(47, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 68, '2018-09-17 14:16:45', '2018-09-17 14:16:45'),
(48, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 68, '2018-09-17 14:17:00', '2018-09-17 14:17:00'),
(49, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 68, '2018-09-17 14:19:48', '2018-09-17 14:19:48'),
(50, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 68, '2018-09-17 14:22:01', '2018-09-17 14:22:01'),
(51, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 68, '2018-09-17 14:32:02', '2018-09-17 14:32:02'),
(52, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 68, '2018-09-17 14:36:14', '2018-09-17 14:36:14'),
(53, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 68, '2018-09-17 14:37:45', '2018-09-17 14:37:45'),
(54, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 68, '2018-09-17 14:40:16', '2018-09-17 14:40:16'),
(55, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 68, '2018-09-17 14:54:23', '2018-09-17 14:54:23'),
(56, 'User logged in successfully', 'http://192.168.2.169:8000/login', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, '2018-09-17 17:01:38', '2018-09-17 17:01:38'),
(57, 'User logged in successfully', 'http://192.168.2.169:8000/login', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, '2018-09-17 20:06:43', '2018-09-17 20:06:43'),
(58, 'Admin added customer successfully', 'http://192.168.2.169:8000/customers/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, '2018-09-17 20:19:27', '2018-09-17 20:19:27'),
(59, 'Admin updated customer successfully', 'http://192.168.2.169:8000/customers/edit/1', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, '2018-09-17 20:31:28', '2018-09-17 20:31:28'),
(60, 'User logged in successfully', 'http://192.168.2.169:8000/login', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, '2018-09-18 12:01:17', '2018-09-18 12:01:17'),
(61, 'Admin updated customer successfully', 'http://192.168.2.169:8000/customers/edit/1', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, '2018-09-18 12:05:45', '2018-09-18 12:05:45'),
(62, 'Admin added product successfully', 'http://192.168.2.169:8000/products/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, '2018-09-18 12:16:07', '2018-09-18 12:16:07'),
(63, 'Admin updated product successfully', 'http://192.168.2.169:8000/products/edit/1', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, '2018-09-18 12:21:30', '2018-09-18 12:21:30'),
(64, 'Admin added product successfully', 'http://192.168.2.169:8000/products/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, '2018-09-18 12:22:00', '2018-09-18 12:22:00'),
(65, 'Admin deleted product successfully', 'http://192.168.2.169:8000/products/delete/2', 'DELETE', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, '2018-09-18 12:22:05', '2018-09-18 12:22:05'),
(66, 'User logged out successfully', 'http://192.168.2.169:8000/logout', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, '2018-09-18 13:55:57', '2018-09-18 13:55:57'),
(67, 'User logged in successfully', 'http://192.168.2.169:8000/login', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, '2018-09-18 13:56:34', '2018-09-18 13:56:34'),
(68, 'User logged in successfully', 'http://192.168.2.169:8000/login', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, '2018-09-18 14:50:31', '2018-09-18 14:50:31'),
(69, 'User logged in successfully', 'http://192.168.2.169:8000/login', 'POST', '192.168.2.151', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, '2018-09-18 14:53:32', '2018-09-18 14:53:32'),
(70, 'User logged out successfully', 'http://192.168.2.169:8000/logout', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, '2018-09-18 14:57:51', '2018-09-18 14:57:51'),
(71, 'User logged in successfully', 'http://192.168.2.169:8000/login', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, '2018-09-18 14:58:23', '2018-09-18 14:58:23'),
(72, 'User logged in successfully', 'http://192.168.2.169:8000/login', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, '2018-09-19 12:03:18', '2018-09-19 12:03:18'),
(73, 'Admin added product successfully', 'http://192.168.2.169:8000/products/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, '2018-09-19 20:11:18', '2018-09-19 20:11:18'),
(74, 'Admin updated product successfully', 'http://192.168.2.169:8000/products/edit/3', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, '2018-09-19 20:11:28', '2018-09-19 20:11:28'),
(75, 'User logged in successfully', 'http://192.168.2.169:8000/login', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-20 12:00:19', '2018-09-20 12:00:19'),
(76, 'User logged in successfully', 'http://192.168.2.169:8000/login', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-20 12:40:30', '2018-09-20 12:40:30'),
(77, 'User logged in successfully', 'http://192.168.2.169:8000/login', 'POST', '192.168.2.151', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1, '2018-09-20 12:43:11', '2018-09-20 12:43:11'),
(78, 'User logged in successfully', 'http://192.168.2.169:8000/login', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 16:18:04', '2018-09-21 16:18:04'),
(79, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 17:03:33', '2018-09-21 17:03:33'),
(80, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 17:06:44', '2018-09-21 17:06:44'),
(81, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 17:08:59', '2018-09-21 17:08:59'),
(82, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 17:11:35', '2018-09-21 17:11:35'),
(83, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 17:12:49', '2018-09-21 17:12:49'),
(84, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 17:13:22', '2018-09-21 17:13:22'),
(85, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 17:13:45', '2018-09-21 17:13:45'),
(86, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 17:22:33', '2018-09-21 17:22:33'),
(87, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 17:23:38', '2018-09-21 17:23:38'),
(88, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 17:24:57', '2018-09-21 17:24:57'),
(89, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 17:25:19', '2018-09-21 17:25:19'),
(90, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 17:25:34', '2018-09-21 17:25:34'),
(91, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 17:44:56', '2018-09-21 17:44:56'),
(92, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 17:49:02', '2018-09-21 17:49:02'),
(93, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 17:55:44', '2018-09-21 17:55:44'),
(94, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 17:56:33', '2018-09-21 17:56:33'),
(95, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 18:00:26', '2018-09-21 18:00:26'),
(96, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 18:00:53', '2018-09-21 18:00:53'),
(97, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 18:01:09', '2018-09-21 18:01:09'),
(98, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 18:12:37', '2018-09-21 18:12:37'),
(99, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 18:13:14', '2018-09-21 18:13:14'),
(100, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 18:13:31', '2018-09-21 18:13:31'),
(101, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 18:13:45', '2018-09-21 18:13:45'),
(102, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 18:14:16', '2018-09-21 18:14:16'),
(103, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 18:14:29', '2018-09-21 18:14:29'),
(104, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 18:14:35', '2018-09-21 18:14:35'),
(105, 'Admin added customer successfully', 'http://192.168.2.169:8000/customers/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 18:20:18', '2018-09-21 18:20:18'),
(106, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 18:21:02', '2018-09-21 18:21:02'),
(107, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 18:21:30', '2018-09-21 18:21:30'),
(108, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 18:22:05', '2018-09-21 18:22:05'),
(109, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 18:22:16', '2018-09-21 18:22:16'),
(110, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 18:22:26', '2018-09-21 18:22:26'),
(111, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 18:22:31', '2018-09-21 18:22:31'),
(112, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 18:22:52', '2018-09-21 18:22:52'),
(113, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 18:23:13', '2018-09-21 18:23:13'),
(114, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 18:23:24', '2018-09-21 18:23:24'),
(115, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 18:23:53', '2018-09-21 18:23:53'),
(116, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 18:24:17', '2018-09-21 18:24:17'),
(117, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 18:24:48', '2018-09-21 18:24:48'),
(118, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 18:26:19', '2018-09-21 18:26:19'),
(119, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 18:26:27', '2018-09-21 18:26:27'),
(120, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 18:26:32', '2018-09-21 18:26:32'),
(121, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 18:26:44', '2018-09-21 18:26:44'),
(122, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 18:26:56', '2018-09-21 18:26:56'),
(123, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 18:30:24', '2018-09-21 18:30:24'),
(124, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 18:32:28', '2018-09-21 18:32:28'),
(125, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 18:33:27', '2018-09-21 18:33:27'),
(126, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 18:33:45', '2018-09-21 18:33:45'),
(127, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 18:34:18', '2018-09-21 18:34:18'),
(128, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 18:34:42', '2018-09-21 18:34:42'),
(129, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 19:32:07', '2018-09-21 19:32:07'),
(130, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 19:36:43', '2018-09-21 19:36:43'),
(131, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 20:03:19', '2018-09-21 20:03:19'),
(132, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 20:03:35', '2018-09-21 20:03:35'),
(133, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 20:05:03', '2018-09-21 20:05:03'),
(134, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 20:07:28', '2018-09-21 20:07:28'),
(135, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 20:09:31', '2018-09-21 20:09:31'),
(136, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 20:12:05', '2018-09-21 20:12:05'),
(137, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 20:12:50', '2018-09-21 20:12:50'),
(138, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 20:16:16', '2018-09-21 20:16:16'),
(139, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 20:23:26', '2018-09-21 20:23:26'),
(140, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 20:23:55', '2018-09-21 20:23:55'),
(141, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 20:24:28', '2018-09-21 20:24:28'),
(142, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 20:27:58', '2018-09-21 20:27:58'),
(143, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 20:35:18', '2018-09-21 20:35:18'),
(144, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 20:36:57', '2018-09-21 20:36:57'),
(145, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 20:37:43', '2018-09-21 20:37:43'),
(146, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 20:38:36', '2018-09-21 20:38:36'),
(147, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 20:38:47', '2018-09-21 20:38:47'),
(148, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 20:39:04', '2018-09-21 20:39:04'),
(149, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 20:39:15', '2018-09-21 20:39:15'),
(150, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 20:39:38', '2018-09-21 20:39:38'),
(151, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 20:39:58', '2018-09-21 20:39:58'),
(152, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 20:40:23', '2018-09-21 20:40:23'),
(153, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 20:40:52', '2018-09-21 20:40:52'),
(154, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 20:41:12', '2018-09-21 20:41:12'),
(155, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 20:41:24', '2018-09-21 20:41:24'),
(156, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 20:41:51', '2018-09-21 20:41:51'),
(157, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 20:42:26', '2018-09-21 20:42:26'),
(158, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 20:42:47', '2018-09-21 20:42:47'),
(159, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 20:45:43', '2018-09-21 20:45:43'),
(160, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 20:46:05', '2018-09-21 20:46:05'),
(161, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-21 20:46:26', '2018-09-21 20:46:26'),
(162, 'User logged in successfully', 'http://192.168.2.169:8000/login', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 11:59:52', '2018-09-22 11:59:52'),
(163, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 12:01:02', '2018-09-22 12:01:02'),
(164, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 12:04:49', '2018-09-22 12:04:49'),
(165, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 12:04:57', '2018-09-22 12:04:57'),
(166, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 12:05:03', '2018-09-22 12:05:03'),
(167, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 12:05:20', '2018-09-22 12:05:20'),
(168, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 12:05:43', '2018-09-22 12:05:43'),
(169, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 12:06:03', '2018-09-22 12:06:03'),
(170, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 12:06:12', '2018-09-22 12:06:12'),
(171, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 12:08:39', '2018-09-22 12:08:39'),
(172, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 12:08:56', '2018-09-22 12:08:56'),
(173, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 12:09:11', '2018-09-22 12:09:11'),
(174, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 12:10:35', '2018-09-22 12:10:35'),
(175, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 12:10:47', '2018-09-22 12:10:47'),
(176, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 12:28:20', '2018-09-22 12:28:20'),
(177, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 12:37:40', '2018-09-22 12:37:40'),
(178, 'Admin added product successfully', 'http://192.168.2.169:8000/products/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 13:53:47', '2018-09-22 13:53:47'),
(179, 'Admin added product successfully', 'http://192.168.2.169:8000/products/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 13:54:07', '2018-09-22 13:54:07'),
(180, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 14:32:26', '2018-09-22 14:32:26'),
(181, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 14:33:26', '2018-09-22 14:33:26'),
(182, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 14:54:50', '2018-09-22 14:54:50'),
(183, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 14:54:51', '2018-09-22 14:54:51'),
(184, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 14:54:52', '2018-09-22 14:54:52'),
(185, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 14:54:52', '2018-09-22 14:54:52'),
(186, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 14:54:54', '2018-09-22 14:54:54'),
(187, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 14:55:00', '2018-09-22 14:55:00'),
(188, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 14:55:56', '2018-09-22 14:55:56'),
(189, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 14:56:05', '2018-09-22 14:56:05'),
(190, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 14:59:01', '2018-09-22 14:59:01'),
(191, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 14:59:16', '2018-09-22 14:59:16'),
(192, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 14:59:22', '2018-09-22 14:59:22'),
(193, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 14:59:32', '2018-09-22 14:59:32'),
(194, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 15:00:26', '2018-09-22 15:00:26'),
(195, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 15:01:18', '2018-09-22 15:01:18');
INSERT INTO `log_activities` (`id`, `subject`, `url`, `method`, `ip`, `agent`, `user_id`, `created_at`, `updated_at`) VALUES
(196, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 15:01:53', '2018-09-22 15:01:53'),
(197, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 15:02:31', '2018-09-22 15:02:31'),
(198, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 15:02:39', '2018-09-22 15:02:39'),
(199, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 16:29:38', '2018-09-22 16:29:38'),
(200, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 16:31:32', '2018-09-22 16:31:32'),
(201, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 16:31:53', '2018-09-22 16:31:53'),
(202, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 16:32:08', '2018-09-22 16:32:08'),
(203, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 16:32:15', '2018-09-22 16:32:15'),
(204, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 16:32:24', '2018-09-22 16:32:24'),
(205, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 16:32:53', '2018-09-22 16:32:53'),
(206, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 16:35:07', '2018-09-22 16:35:07'),
(207, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 16:35:24', '2018-09-22 16:35:24'),
(208, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 16:35:43', '2018-09-22 16:35:43'),
(209, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 16:38:57', '2018-09-22 16:38:57'),
(210, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 16:40:42', '2018-09-22 16:40:42'),
(211, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 16:42:00', '2018-09-22 16:42:00'),
(212, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 16:42:09', '2018-09-22 16:42:09'),
(213, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 16:42:42', '2018-09-22 16:42:42'),
(214, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 16:44:18', '2018-09-22 16:44:18'),
(215, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 16:45:03', '2018-09-22 16:45:03'),
(216, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 16:45:19', '2018-09-22 16:45:19'),
(217, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 16:45:29', '2018-09-22 16:45:29'),
(218, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 16:45:54', '2018-09-22 16:45:54'),
(219, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 16:46:09', '2018-09-22 16:46:09'),
(220, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 16:46:21', '2018-09-22 16:46:21'),
(221, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 16:47:37', '2018-09-22 16:47:37'),
(222, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 16:48:45', '2018-09-22 16:48:45'),
(223, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 16:53:49', '2018-09-22 16:53:49'),
(224, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 16:54:06', '2018-09-22 16:54:06'),
(225, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 16:54:33', '2018-09-22 16:54:33'),
(226, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 16:54:47', '2018-09-22 16:54:47'),
(227, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 16:55:21', '2018-09-22 16:55:21'),
(228, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 16:55:30', '2018-09-22 16:55:30'),
(229, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 17:09:48', '2018-09-22 17:09:48'),
(230, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 17:39:05', '2018-09-22 17:39:05'),
(231, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 18:15:55', '2018-09-22 18:15:55'),
(232, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 18:17:30', '2018-09-22 18:17:30'),
(233, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 18:17:56', '2018-09-22 18:17:56'),
(234, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 18:18:48', '2018-09-22 18:18:48'),
(235, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 18:21:00', '2018-09-22 18:21:00'),
(236, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 18:21:40', '2018-09-22 18:21:40'),
(237, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 18:23:02', '2018-09-22 18:23:02'),
(238, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 18:28:10', '2018-09-22 18:28:10'),
(239, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 18:28:34', '2018-09-22 18:28:34'),
(240, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 18:38:11', '2018-09-22 18:38:11'),
(241, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 18:39:18', '2018-09-22 18:39:18'),
(242, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 18:39:36', '2018-09-22 18:39:36'),
(243, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 18:46:47', '2018-09-22 18:46:47'),
(244, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 18:50:24', '2018-09-22 18:50:24'),
(245, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 18:56:49', '2018-09-22 18:56:49'),
(246, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 18:57:43', '2018-09-22 18:57:43'),
(247, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 18:58:41', '2018-09-22 18:58:41'),
(248, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 19:12:42', '2018-09-22 19:12:42'),
(249, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 19:15:14', '2018-09-22 19:15:14'),
(250, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 19:16:37', '2018-09-22 19:16:37'),
(251, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 19:17:52', '2018-09-22 19:17:52'),
(252, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 19:18:32', '2018-09-22 19:18:32'),
(253, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 19:33:49', '2018-09-22 19:33:49'),
(254, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 19:44:36', '2018-09-22 19:44:36'),
(255, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 20:03:03', '2018-09-22 20:03:03'),
(256, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 20:06:12', '2018-09-22 20:06:12'),
(257, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 20:07:17', '2018-09-22 20:07:17'),
(258, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 20:08:06', '2018-09-22 20:08:06'),
(259, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 20:30:20', '2018-09-22 20:30:20'),
(260, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-22 20:32:24', '2018-09-22 20:32:24'),
(261, 'User logged in successfully', 'http://192.168.2.169:8000/login', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 11:52:27', '2018-09-24 11:52:27'),
(262, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 11:56:28', '2018-09-24 11:56:28'),
(263, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 12:06:01', '2018-09-24 12:06:01'),
(264, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 12:06:20', '2018-09-24 12:06:20'),
(265, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 12:07:34', '2018-09-24 12:07:34'),
(266, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 12:09:56', '2018-09-24 12:09:56'),
(267, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 12:10:27', '2018-09-24 12:10:27'),
(268, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 12:11:28', '2018-09-24 12:11:28'),
(269, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 12:12:46', '2018-09-24 12:12:46'),
(270, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 12:13:16', '2018-09-24 12:13:16'),
(271, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 12:13:52', '2018-09-24 12:13:52'),
(272, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 12:14:06', '2018-09-24 12:14:06'),
(273, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 12:14:52', '2018-09-24 12:14:52'),
(274, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 12:15:06', '2018-09-24 12:15:06'),
(275, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 12:15:11', '2018-09-24 12:15:11'),
(276, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 12:15:42', '2018-09-24 12:15:42'),
(277, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 12:17:17', '2018-09-24 12:17:17'),
(278, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 12:18:40', '2018-09-24 12:18:40'),
(279, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 12:19:21', '2018-09-24 12:19:21'),
(280, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 12:20:27', '2018-09-24 12:20:27'),
(281, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 12:24:51', '2018-09-24 12:24:51'),
(282, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 12:45:50', '2018-09-24 12:45:50'),
(283, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 12:48:31', '2018-09-24 12:48:31'),
(284, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 12:50:55', '2018-09-24 12:50:55'),
(285, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 12:51:15', '2018-09-24 12:51:15'),
(286, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 12:51:38', '2018-09-24 12:51:38'),
(287, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 12:57:57', '2018-09-24 12:57:57'),
(288, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 12:58:12', '2018-09-24 12:58:12'),
(289, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 13:02:55', '2018-09-24 13:02:55'),
(290, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 13:16:57', '2018-09-24 13:16:57'),
(291, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 13:21:49', '2018-09-24 13:21:49'),
(292, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 13:26:30', '2018-09-24 13:26:30'),
(293, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 13:37:47', '2018-09-24 13:37:47'),
(294, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 13:38:43', '2018-09-24 13:38:43'),
(295, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 13:40:27', '2018-09-24 13:40:27'),
(296, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 13:49:14', '2018-09-24 13:49:14'),
(297, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 13:51:14', '2018-09-24 13:51:14'),
(298, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 14:10:02', '2018-09-24 14:10:02'),
(299, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 14:15:46', '2018-09-24 14:15:46'),
(300, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 14:44:12', '2018-09-24 14:44:12'),
(301, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 14:46:44', '2018-09-24 14:46:44'),
(302, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 14:50:52', '2018-09-24 14:50:52'),
(303, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 14:54:57', '2018-09-24 14:54:57'),
(304, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 16:04:13', '2018-09-24 16:04:13'),
(305, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 16:08:10', '2018-09-24 16:08:10'),
(306, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 16:16:09', '2018-09-24 16:16:09'),
(307, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 16:32:11', '2018-09-24 16:32:11'),
(308, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 16:33:42', '2018-09-24 16:33:42'),
(309, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 16:35:01', '2018-09-24 16:35:01'),
(310, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 16:35:25', '2018-09-24 16:35:25'),
(311, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 16:36:26', '2018-09-24 16:36:26'),
(312, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 16:36:41', '2018-09-24 16:36:41'),
(313, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 16:40:44', '2018-09-24 16:40:44'),
(314, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 16:43:22', '2018-09-24 16:43:22'),
(315, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 16:43:53', '2018-09-24 16:43:53'),
(316, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 16:44:10', '2018-09-24 16:44:10'),
(317, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 16:45:23', '2018-09-24 16:45:23'),
(318, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 16:46:43', '2018-09-24 16:46:43'),
(319, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 16:49:05', '2018-09-24 16:49:05'),
(320, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 16:49:56', '2018-09-24 16:49:56'),
(321, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 16:50:50', '2018-09-24 16:50:50'),
(322, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 16:56:58', '2018-09-24 16:56:58'),
(323, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 16:58:55', '2018-09-24 16:58:55'),
(324, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 17:04:14', '2018-09-24 17:04:14'),
(325, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 17:07:09', '2018-09-24 17:07:09'),
(326, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 17:09:27', '2018-09-24 17:09:27'),
(327, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 17:10:46', '2018-09-24 17:10:46'),
(328, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 17:14:14', '2018-09-24 17:14:14'),
(329, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 17:15:17', '2018-09-24 17:15:17'),
(330, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 17:17:06', '2018-09-24 17:17:06'),
(331, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 17:17:26', '2018-09-24 17:17:26'),
(332, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 17:32:42', '2018-09-24 17:32:42'),
(333, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 17:33:23', '2018-09-24 17:33:23'),
(334, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 17:34:27', '2018-09-24 17:34:27'),
(335, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 17:35:21', '2018-09-24 17:35:21'),
(336, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 17:45:54', '2018-09-24 17:45:54'),
(337, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 17:48:40', '2018-09-24 17:48:40'),
(338, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 17:48:57', '2018-09-24 17:48:57'),
(339, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 18:04:15', '2018-09-24 18:04:15'),
(340, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 18:14:21', '2018-09-24 18:14:21'),
(341, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 18:17:47', '2018-09-24 18:17:47'),
(342, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 18:53:56', '2018-09-24 18:53:56'),
(343, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 18:55:41', '2018-09-24 18:55:41'),
(344, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 19:10:42', '2018-09-24 19:10:42'),
(345, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 19:23:13', '2018-09-24 19:23:13'),
(346, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 19:28:07', '2018-09-24 19:28:07'),
(347, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 19:32:56', '2018-09-24 19:32:56'),
(348, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 19:33:58', '2018-09-24 19:33:58'),
(349, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 19:35:06', '2018-09-24 19:35:06'),
(350, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 20:07:58', '2018-09-24 20:07:58'),
(351, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 20:13:02', '2018-09-24 20:13:02'),
(352, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 20:15:24', '2018-09-24 20:15:24'),
(353, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 20:38:24', '2018-09-24 20:38:24'),
(354, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 20:39:46', '2018-09-24 20:39:46'),
(355, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-24 20:40:43', '2018-09-24 20:40:43'),
(356, 'User logged in successfully', 'http://192.168.2.169:8000/login', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-25 12:00:44', '2018-09-25 12:00:44'),
(357, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-25 12:29:48', '2018-09-25 12:29:48'),
(358, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-25 12:30:10', '2018-09-25 12:30:10'),
(359, 'User logged in successfully', 'http://192.168.2.169:8000/login', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-26 12:00:53', '2018-09-26 12:00:53'),
(360, 'Admin added customer successfully', 'http://192.168.2.169:8000/customers/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-26 17:30:32', '2018-09-26 17:30:32'),
(361, 'Admin added product successfully', 'http://192.168.2.169:8000/products/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-26 17:37:28', '2018-09-26 17:37:28'),
(362, 'Admin updated product successfully', 'http://192.168.2.169:8000/products/edit/3', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-26 17:40:18', '2018-09-26 17:40:18'),
(363, 'Admin updated product successfully', 'http://192.168.2.169:8000/products/edit/3', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-26 17:40:30', '2018-09-26 17:40:30'),
(364, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-26 19:03:07', '2018-09-26 19:03:07'),
(365, 'Admin added customer successfully', 'http://192.168.2.169:8000/customers/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-27 18:10:26', '2018-09-27 18:10:26'),
(366, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-27 18:10:56', '2018-09-27 18:10:56'),
(367, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-27 18:12:20', '2018-09-27 18:12:20'),
(368, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-27 18:13:32', '2018-09-27 18:13:32'),
(369, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-27 18:14:32', '2018-09-27 18:14:32'),
(370, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-27 18:15:09', '2018-09-27 18:15:09'),
(371, 'Admin created customer invoice successfully', 'http://192.168.2.169:8000/invoice', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-09-27 18:17:45', '2018-09-27 18:17:45'),
(372, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 68, '2018-09-28 13:10:47', '2018-09-28 13:10:47');
INSERT INTO `log_activities` (`id`, `subject`, `url`, `method`, `ip`, `agent`, `user_id`, `created_at`, `updated_at`) VALUES
(373, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 68, '2018-09-28 13:13:49', '2018-09-28 13:13:49'),
(374, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 68, '2018-09-28 13:14:14', '2018-09-28 13:14:14'),
(375, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 68, '2018-09-28 13:14:42', '2018-09-28 13:14:42'),
(376, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 68, '2018-09-28 13:15:42', '2018-09-28 13:15:42'),
(377, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 68, '2018-09-28 13:16:27', '2018-09-28 13:16:27'),
(378, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 13:33:44', '2018-09-28 13:33:44'),
(379, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 13:41:54', '2018-09-28 13:41:54'),
(380, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 13:45:36', '2018-09-28 13:45:36'),
(381, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 13:54:55', '2018-09-28 13:54:55'),
(382, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 14:02:37', '2018-09-28 14:02:37'),
(383, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 14:14:40', '2018-09-28 14:14:40'),
(384, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 14:23:10', '2018-09-28 14:23:10'),
(385, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 14:43:31', '2018-09-28 14:43:31'),
(386, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 14:44:40', '2018-09-28 14:44:40'),
(387, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 14:45:25', '2018-09-28 14:45:25'),
(388, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 14:57:03', '2018-09-28 14:57:03'),
(389, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 14:59:01', '2018-09-28 14:59:01'),
(390, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 15:00:49', '2018-09-28 15:00:49'),
(391, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 16:17:30', '2018-09-28 16:17:30'),
(392, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 17:45:11', '2018-09-28 17:45:11'),
(393, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 17:53:19', '2018-09-28 17:53:19'),
(394, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 17:55:30', '2018-09-28 17:55:30'),
(395, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 17:58:42', '2018-09-28 17:58:42'),
(396, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 18:00:02', '2018-09-28 18:00:02'),
(397, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 18:02:17', '2018-09-28 18:02:17'),
(398, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 18:08:52', '2018-09-28 18:08:52'),
(399, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 18:10:26', '2018-09-28 18:10:26'),
(400, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 18:11:17', '2018-09-28 18:11:17'),
(401, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 18:13:13', '2018-09-28 18:13:13'),
(402, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 18:20:39', '2018-09-28 18:20:39'),
(403, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 18:23:23', '2018-09-28 18:23:23'),
(404, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 18:25:23', '2018-09-28 18:25:23'),
(405, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 18:28:28', '2018-09-28 18:28:28'),
(406, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 18:33:16', '2018-09-28 18:33:16'),
(407, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 18:36:51', '2018-09-28 18:36:51'),
(408, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 18:45:46', '2018-09-28 18:45:46'),
(409, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 19:04:15', '2018-09-28 19:04:15'),
(410, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 19:22:23', '2018-09-28 19:22:23'),
(411, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 19:23:38', '2018-09-28 19:23:38'),
(412, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 19:24:40', '2018-09-28 19:24:40'),
(413, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 19:28:42', '2018-09-28 19:28:42'),
(414, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 20:03:20', '2018-09-28 20:03:20'),
(415, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-09-28 20:18:05', '2018-09-28 20:18:05'),
(416, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 68, '2018-10-01 12:12:02', '2018-10-01 12:12:02'),
(417, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 68, '2018-10-01 12:19:57', '2018-10-01 12:19:57'),
(418, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-10-01 12:24:07', '2018-10-01 12:24:07'),
(419, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-10-01 12:45:11', '2018-10-01 12:45:11'),
(420, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-10-01 12:54:30', '2018-10-01 12:54:30'),
(421, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-10-01 12:57:58', '2018-10-01 12:57:58'),
(422, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-10-01 13:02:11', '2018-10-01 13:02:11'),
(423, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-10-01 13:03:11', '2018-10-01 13:03:11'),
(424, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-10-01 13:05:00', '2018-10-01 13:05:00'),
(425, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-10-01 13:07:03', '2018-10-01 13:07:03'),
(426, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 68, '2018-10-01 13:07:57', '2018-10-01 13:07:57'),
(427, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 68, '2018-10-01 13:54:27', '2018-10-01 13:54:27'),
(428, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 68, '2018-10-01 13:57:02', '2018-10-01 13:57:02'),
(429, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-10-01 14:03:02', '2018-10-01 14:03:02'),
(430, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-10-01 14:08:18', '2018-10-01 14:08:18'),
(431, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-10-01 14:15:39', '2018-10-01 14:15:39'),
(432, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-10-01 14:18:35', '2018-10-01 14:18:35'),
(433, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-10-01 14:21:39', '2018-10-01 14:21:39'),
(434, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-10-01 14:24:31', '2018-10-01 14:24:31'),
(435, 'Employee updated successfully', 'http://192.168.2.169:8000/employees/edit/11/79', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-01 14:28:34', '2018-10-01 14:28:34'),
(436, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 79, '2018-10-01 14:29:48', '2018-10-01 14:29:48'),
(437, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-01 16:35:06', '2018-10-01 16:35:06'),
(438, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-10-01 16:46:06', '2018-10-01 16:46:06'),
(439, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-10-01 17:23:24', '2018-10-01 17:23:24'),
(440, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-10-01 18:39:34', '2018-10-01 18:39:34'),
(441, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-10-01 18:43:09', '2018-10-01 18:43:09'),
(442, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-10-01 18:53:27', '2018-10-01 18:53:27'),
(443, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-10-02 14:11:44', '2018-10-02 14:11:44'),
(444, 'Admin profile updated', 'http://192.168.2.169:8000/update/profile/1/0/0/0', 'POST', '192.168.2.151', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-02 14:21:52', '2018-10-02 14:21:52'),
(445, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-10-02 14:25:05', '2018-10-02 14:25:05'),
(446, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-10-02 14:26:13', '2018-10-02 14:26:13'),
(447, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-10-02 14:27:22', '2018-10-02 14:27:22'),
(448, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-10-02 14:32:32', '2018-10-02 14:32:32'),
(449, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-10-02 14:35:26', '2018-10-02 14:35:26'),
(450, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-10-02 14:38:30', '2018-10-02 14:38:30'),
(451, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-10-02 14:40:52', '2018-10-02 14:40:52'),
(452, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-10-02 14:42:25', '2018-10-02 14:42:25'),
(453, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 79, '2018-10-02 20:14:27', '2018-10-02 20:14:27'),
(454, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-10-05 17:22:08', '2018-10-05 17:22:08'),
(455, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-10-05 17:24:12', '2018-10-05 17:24:12'),
(456, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-10-05 17:28:04', '2018-10-05 17:28:04'),
(457, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-10-05 17:29:02', '2018-10-05 17:29:02'),
(458, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-10-05 17:36:49', '2018-10-05 17:36:49'),
(459, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-10-05 17:46:29', '2018-10-05 17:46:29'),
(460, 'Employee uploaded his/her CV & sended to admin successfully', 'http://192.168.2.169:8000/uploadCV', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 69, '2018-10-05 17:48:44', '2018-10-05 17:48:44'),
(461, 'Admin replied back on mail notification of employee.', 'http://192.168.2.169:8000/replyEmailNotification/3', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-05 20:44:24', '2018-10-05 20:44:24'),
(462, 'Admin replied back on mail notification of employee.', 'http://192.168.2.169:8000/replyEmailNotification/3', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-05 20:47:13', '2018-10-05 20:47:13'),
(463, 'Admin replied back on mail notification of employee.', 'http://192.168.2.169:8000/replyEmailNotification/3', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-06 14:24:18', '2018-10-06 14:24:18'),
(464, 'Admin replied back on mail notification of employee.', 'http://192.168.2.169:8000/replyEmailNotification/3', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-06 14:25:24', '2018-10-06 14:25:24'),
(465, 'Admin replied back on mail notification of employee.', 'http://192.168.2.169:8000/replyEmailNotification/3', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-06 14:56:14', '2018-10-06 14:56:14'),
(466, 'Admin replied back on mail notification of employee.', 'http://192.168.2.169:8000/replyEmailNotification/3', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-06 15:02:29', '2018-10-06 15:02:29'),
(467, 'Admin replied back on mail notification of employee.', 'http://192.168.2.169:8000/replyEmailNotification/3', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-06 16:13:56', '2018-10-06 16:13:56'),
(468, 'Admin replied back on mail notification of employee.', 'http://192.168.2.169:8000/replyEmailNotification/4', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-06 16:24:47', '2018-10-06 16:24:47'),
(469, 'Admin forwarded the email to someone.', 'http://192.168.2.169:8000/forwardThisMail/4', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-08 12:22:08', '2018-10-08 12:22:08'),
(470, 'Admin forwarded the email to someone.', 'http://192.168.2.169:8000/forwardThisMail/4', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-08 12:29:09', '2018-10-08 12:29:09'),
(471, 'Admin forwarded the email to someone.', 'http://192.168.2.169:8000/forwardThisMail/4', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-08 12:39:38', '2018-10-08 12:39:38'),
(472, 'Admin forwarded the email to someone.', 'http://192.168.2.169:8000/forwardThisMail/4', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-08 12:48:03', '2018-10-08 12:48:03'),
(473, 'Admin replied back on mail notification of employee.', 'http://192.168.2.169:8000/replyEmailNotification/flag=reply/4', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-08 17:32:29', '2018-10-08 17:32:29'),
(474, 'Admin profile updated', 'http://192.168.2.169:8000/update/profile/1/0/0/0', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-10 13:15:31', '2018-10-10 13:15:31'),
(475, 'Employee updated successfully', 'http://192.168.2.169:8000/employees/edit/5/68', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-10 18:27:18', '2018-10-10 18:27:18'),
(476, 'User deleted successfully', 'http://192.168.2.169:8000/users/delete/96', 'DELETE', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-11 12:31:25', '2018-10-11 12:31:25'),
(477, 'User updated successfully', 'http://192.168.2.169:8000/users/edit/1', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-11 12:41:36', '2018-10-11 12:41:36'),
(478, 'User updated successfully', 'http://192.168.2.169:8000/users/edit/3', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-11 12:46:35', '2018-10-11 12:46:35'),
(479, 'User updated successfully', 'http://192.168.2.169:8000/users/edit/3', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-11 12:47:32', '2018-10-11 12:47:32'),
(480, 'Company updated successfully', 'http://192.168.2.169:8000/companies/edit/1/3', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-11 12:52:06', '2018-10-11 12:52:06'),
(481, 'Company updated successfully', 'http://192.168.2.169:8000/companies/edit/1/3', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-11 12:53:24', '2018-10-11 12:53:24'),
(482, 'Company updated successfully', 'http://192.168.2.169:8000/companies/edit/1/3', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-11 12:55:23', '2018-10-11 12:55:23'),
(483, 'Admin deleted product successfully', 'http://192.168.2.169:8000/products/delete/3', 'DELETE', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-11 14:34:39', '2018-10-11 14:34:39'),
(484, 'Admin added product successfully', 'http://192.168.2.169:8000/products/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-11 14:34:56', '2018-10-11 14:34:56'),
(485, 'Admin updated product successfully', 'http://192.168.2.169:8000/products/edit/1', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-11 14:35:13', '2018-10-11 14:35:13'),
(486, 'Admin profile updated', 'http://192.168.2.169:8000/update/profile/1/0/0/0', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-11 20:39:25', '2018-10-11 20:39:25'),
(487, 'Admin updated customer successfully', 'http://192.168.2.169:8000/customers/edit/3', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-11 20:41:35', '2018-10-11 20:41:35'),
(488, 'Admin replied back on mail notification of employee.', 'http://192.168.2.169:8000/replyEmailNotification/flag=reply/1', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-12 18:23:53', '2018-10-12 18:23:53'),
(489, 'Admin replied back on mail notification of employee.', 'http://192.168.2.169:8000/replyEmailNotification/flag=reply/1', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-12 18:38:27', '2018-10-12 18:38:27'),
(490, 'Admin forwarded the email to someone.', 'http://192.168.2.169:8000/forwardThisMail/flag=forward/5', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-12 19:22:12', '2018-10-12 19:22:12'),
(491, 'Admin replied back on mail notification of employee.', 'http://192.168.2.169:8000/replyEmailNotification/flag=reply/1', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-13 13:12:37', '2018-10-13 13:12:37'),
(492, 'Admin replied back on mail notification of employee.', 'http://192.168.2.169:8000/replyEmailNotification/flag=reply/1', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-13 13:15:48', '2018-10-13 13:15:48'),
(493, 'Admin replied back on mail notification of employee.', 'http://192.168.2.169:8000/replyEmailNotification/flag=reply/1', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-13 13:17:09', '2018-10-13 13:17:09'),
(494, 'Admin replied back on mail notification of employee.', 'http://192.168.2.169:8000/replyEmailNotification/flag=reply/1', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-13 13:55:24', '2018-10-13 13:55:24'),
(495, 'Admin forwarded the email to someone.', 'http://192.168.2.169:8000/forwardThisMail/flag=forward/1', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-13 14:19:30', '2018-10-13 14:19:30'),
(496, 'Admin forwarded the email to someone.', 'http://192.168.2.169:8000/forwardThisMail/flag=forward/1', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-13 14:57:17', '2018-10-13 14:57:17'),
(497, 'Notification mail deleted successfully', 'http://192.168.2.169:8000/deleteNotification/1', 'DELETE', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-13 18:00:40', '2018-10-13 18:00:40'),
(498, 'Notification mail deleted successfully', 'http://192.168.2.169:8000/deleteNotification/2', 'DELETE', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-13 18:20:58', '2018-10-13 18:20:58'),
(499, 'Notification mail deleted successfully', 'http://192.168.2.169:8000/deleteNotification/7', 'DELETE', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-13 18:57:13', '2018-10-13 18:57:13'),
(500, 'Admin forwarded the email to someone.', 'http://192.168.2.169:8000/forwardThisMail/flag=forward/8', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-13 19:48:20', '2018-10-13 19:48:20'),
(501, 'Admin forwarded the email to someone.', 'http://192.168.2.169:8000/forwardThisMail/flag=forward/3', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-13 20:08:07', '2018-10-13 20:08:07'),
(502, 'Admin forwarded the email to someone.', 'http://192.168.2.169:8000/forwardThisMail/flag=forward/3', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-13 20:09:55', '2018-10-13 20:09:55'),
(503, 'Admin forwarded the email to someone.', 'http://192.168.2.169:8000/forwardThisMail/flag=forward/3', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-13 20:14:35', '2018-10-13 20:14:35'),
(504, 'Admin forwarded the email to someone.', 'http://192.168.2.169:8000/forwardThisMail/flag=forward/3', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-13 20:16:33', '2018-10-13 20:16:33'),
(505, 'Admin forwarded the email to someone.', 'http://192.168.2.169:8000/forwardThisMail/flag=forward/3', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-13 20:22:18', '2018-10-13 20:22:18'),
(506, 'Admin replied back on mail notification of employee.', 'http://192.168.2.169:8000/replyEmailNotification/flag=reply/8', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-15 12:26:58', '2018-10-15 12:26:58'),
(507, 'Company updated successfully', 'http://192.168.2.169:8000/companies/edit/1/3', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-15 16:20:15', '2018-10-15 16:20:15'),
(508, 'Company updated successfully', 'http://192.168.2.169:8000/companies/edit/1/3', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-15 16:20:30', '2018-10-15 16:20:30'),
(509, 'Company deleted successfully', 'http://192.168.2.169:8000/companies/delete/6', 'DELETE', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-15 20:16:07', '2018-10-15 20:16:07'),
(510, 'Company deleted successfully', 'http://192.168.2.169:8000/companies/delete/7', 'DELETE', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-15 20:17:13', '2018-10-15 20:17:13'),
(511, 'Company deleted successfully', 'http://192.168.2.169:8000/companies/delete/9', 'DELETE', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-15 20:26:05', '2018-10-15 20:26:05'),
(512, 'Company deleted successfully', 'http://192.168.2.169:8000/companies/delete/11', 'DELETE', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-15 20:40:34', '2018-10-15 20:40:34'),
(513, 'Company added successfully', 'http://192.168.2.169:8000/companies/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-16 13:07:05', '2018-10-16 13:07:05'),
(514, 'Company deleted successfully', 'http://192.168.2.169:8000/companies/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-16 13:30:12', '2018-10-16 13:30:12'),
(515, 'Company added successfully', 'http://192.168.2.169:8000/companies/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-16 13:33:44', '2018-10-16 13:33:44'),
(516, 'Company deleted successfully', 'http://192.168.2.169:8000/companies/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-16 13:34:18', '2018-10-16 13:34:18'),
(517, 'Company added successfully', 'http://192.168.2.169:8000/companies/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-16 13:37:50', '2018-10-16 13:37:50'),
(518, 'Company deleted successfully', 'http://192.168.2.169:8000/companies/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-16 13:38:07', '2018-10-16 13:38:07'),
(519, 'Admin added customer successfully', 'http://192.168.2.169:8000/customers/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-16 13:47:37', '2018-10-16 13:47:37'),
(520, 'Admin deleted customer successfully', 'http://192.168.2.169:8000/customers/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-16 13:48:13', '2018-10-16 13:48:13'),
(521, 'Employee added successfully', 'http://192.168.2.169:8000/employees/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-16 19:01:53', '2018-10-16 19:01:53'),
(522, 'Employee added successfully', 'http://192.168.2.169:8000/employees/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-16 20:20:07', '2018-10-16 20:20:07'),
(523, 'Employee updated successfully', 'http://192.168.2.169:8000/employees/edit/21/99', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-16 20:24:02', '2018-10-16 20:24:02'),
(524, 'Employee deleted successfully', 'http://192.168.2.169:8000/employees/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-16 20:24:13', '2018-10-16 20:24:13'),
(525, 'Employee added successfully', 'http://192.168.2.169:8000/employees/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-16 20:26:47', '2018-10-16 20:26:47'),
(526, 'Employee deleted successfully', 'http://192.168.2.169:8000/employees/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-16 20:26:56', '2018-10-16 20:26:56'),
(527, 'User added successfully', 'http://192.168.2.169:8000/users/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-16 20:34:43', '2018-10-16 20:34:43'),
(528, 'User updated successfully', 'http://192.168.2.169:8000/users/edit/101', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-16 20:35:10', '2018-10-16 20:35:10'),
(529, 'User deleted successfully', 'http://192.168.2.169:8000/users/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-16 20:35:18', '2018-10-16 20:35:18'),
(530, 'Team added successfully', 'http://192.168.2.169:8000/teams/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 12:26:23', '2018-10-17 12:26:23'),
(531, 'Team added successfully', 'http://192.168.2.169:8000/teams/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 12:26:57', '2018-10-17 12:26:57'),
(532, 'Team deleted successfully', 'http://192.168.2.169:8000/teams/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 12:32:47', '2018-10-17 12:32:47'),
(533, 'Team updated successfully', 'http://192.168.2.169:8000/teams/edit/18/81', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 12:33:21', '2018-10-17 12:33:21'),
(534, 'Team updated successfully', 'http://192.168.2.169:8000/teams/edit/18/81', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 12:33:46', '2018-10-17 12:33:46'),
(535, 'Notification mail deleted successfully', 'http://192.168.2.169:8000/deleteNotification', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 13:53:58', '2018-10-17 13:53:58'),
(536, 'Notification mail deleted successfully', 'http://192.168.2.169:8000/deleteAllNotifications', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 14:06:44', '2018-10-17 14:06:44'),
(537, 'Notification mail deleted successfully', 'http://192.168.2.169:8000/deleteAllNotifications', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 14:15:20', '2018-10-17 14:15:20'),
(538, 'Notification mails deleted successfully', 'http://192.168.2.169:8000/deleteAllNotifications', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 14:21:44', '2018-10-17 14:21:44'),
(539, 'Notification mails deleted successfully', 'http://192.168.2.169:8000/deleteAllNotifications', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 14:22:00', '2018-10-17 14:22:00'),
(540, 'Notification mails deleted successfully', 'http://192.168.2.169:8000/deleteAllNotifications', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 14:38:56', '2018-10-17 14:38:56'),
(541, 'Notification mails deleted successfully', 'http://192.168.2.169:8000/deleteAllNotifications', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 17:10:10', '2018-10-17 17:10:10');
INSERT INTO `log_activities` (`id`, `subject`, `url`, `method`, `ip`, `agent`, `user_id`, `created_at`, `updated_at`) VALUES
(542, 'Notification mails deleted successfully', 'http://192.168.2.169:8000/deleteAllNotifications', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 17:22:31', '2018-10-17 17:22:31'),
(543, 'Notification mails deleted successfully', 'http://192.168.2.169:8000/deleteAllNotifications', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 17:22:42', '2018-10-17 17:22:42'),
(544, 'Notification mails deleted successfully', 'http://192.168.2.169:8000/deleteAllNotifications', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 17:40:44', '2018-10-17 17:40:44'),
(545, 'Notification mails deleted successfully', 'http://192.168.2.169:8000/deleteAllNotifications', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 18:22:26', '2018-10-17 18:22:26'),
(546, 'Admin replied back on mail notification of employee.', 'http://192.168.2.169:8000/replyEmailNotification/flag=reply/9', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 18:43:05', '2018-10-17 18:43:05'),
(547, 'Admin replied back on mail notification of employee.', 'http://192.168.2.169:8000/replyEmailNotification/flag=reply/9', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 18:43:09', '2018-10-17 18:43:09'),
(548, 'Admin replied back on mail notification of employee.', 'http://192.168.2.169:8000/replyEmailNotification/flag=reply/4', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 18:46:44', '2018-10-17 18:46:44'),
(549, 'Notification mails deleted successfully', 'http://192.168.2.169:8000/deleteAllNotifications', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 18:58:13', '2018-10-17 18:58:13'),
(550, 'Notification mails deleted successfully', 'http://192.168.2.169:8000/deleteAllNotifications', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 18:59:38', '2018-10-17 18:59:38'),
(551, 'Notification mails deleted successfully', 'http://192.168.2.169:8000/deleteAllNotifications', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 19:01:44', '2018-10-17 19:01:44'),
(552, 'Notification mails deleted successfully', 'http://192.168.2.169:8000/deleteAllNotifications', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 19:04:40', '2018-10-17 19:04:40'),
(553, 'Notification mails deleted successfully', 'http://192.168.2.169:8000/deleteAllNotifications', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 19:04:57', '2018-10-17 19:04:57'),
(554, 'Notification mails deleted successfully', 'http://192.168.2.169:8000/deleteAllNotifications', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 19:07:52', '2018-10-17 19:07:52'),
(555, 'Notification mails deleted successfully', 'http://192.168.2.169:8000/deleteAllNotifications', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 19:09:24', '2018-10-17 19:09:24'),
(556, 'Company deleted successfully', 'http://192.168.2.169:8000/companies/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 20:05:39', '2018-10-17 20:05:39'),
(557, 'Company added successfully', 'http://192.168.2.169:8000/companies/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 20:16:13', '2018-10-17 20:16:13'),
(558, 'Company deleted successfully', 'http://192.168.2.169:8000/companies/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 20:16:42', '2018-10-17 20:16:42'),
(559, 'Company added successfully', 'http://192.168.2.169:8000/companies/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 20:18:38', '2018-10-17 20:18:38'),
(560, 'Company deleted successfully', 'http://192.168.2.169:8000/companies/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 20:18:55', '2018-10-17 20:18:55'),
(561, 'Company added successfully', 'http://192.168.2.169:8000/companies/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 20:23:30', '2018-10-17 20:23:30'),
(562, 'Company deleted successfully', 'http://192.168.2.169:8000/companies/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 20:23:52', '2018-10-17 20:23:52'),
(563, 'Company added successfully', 'http://192.168.2.169:8000/companies/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 20:25:24', '2018-10-17 20:25:24'),
(564, 'Company deleted successfully', 'http://192.168.2.169:8000/companies/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 20:27:37', '2018-10-17 20:27:37'),
(565, 'Company added successfully', 'http://192.168.2.169:8000/companies/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 20:30:39', '2018-10-17 20:30:39'),
(566, 'Company deleted successfully', 'http://192.168.2.169:8000/companies/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 20:31:57', '2018-10-17 20:31:57'),
(567, 'Company added successfully', 'http://192.168.2.169:8000/companies/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 20:39:24', '2018-10-17 20:39:24'),
(568, 'Company deleted successfully', 'http://192.168.2.169:8000/companies/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 20:39:44', '2018-10-17 20:39:44'),
(569, 'Company added successfully', 'http://192.168.2.169:8000/companies/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 20:40:41', '2018-10-17 20:40:41'),
(570, 'Company deleted successfully', 'http://192.168.2.169:8000/companies/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 20:45:30', '2018-10-17 20:45:30'),
(571, 'Company added successfully', 'http://192.168.2.169:8000/companies/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 20:46:05', '2018-10-17 20:46:05'),
(572, 'Company deleted successfully', 'http://192.168.2.169:8000/companies/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 20:46:44', '2018-10-17 20:46:44'),
(573, 'Company added successfully', 'http://192.168.2.169:8000/companies/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 20:47:55', '2018-10-17 20:47:55'),
(574, 'Company deleted successfully', 'http://192.168.2.169:8000/companies/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 20:48:09', '2018-10-17 20:48:09'),
(575, 'Company added successfully', 'http://192.168.2.169:8000/companies/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 20:49:17', '2018-10-17 20:49:17'),
(576, 'Company deleted successfully', 'http://192.168.2.169:8000/companies/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-17 20:49:35', '2018-10-17 20:49:35'),
(577, 'Company added successfully', 'http://192.168.2.169:8000/companies/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 12:16:22', '2018-10-18 12:16:22'),
(578, 'Company deleted successfully', 'http://192.168.2.169:8000/companies/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 12:16:39', '2018-10-18 12:16:39'),
(579, 'Company added successfully', 'http://192.168.2.169:8000/companies/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 12:17:56', '2018-10-18 12:17:56'),
(580, 'Company added successfully', 'http://192.168.2.169:8000/companies/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 12:18:43', '2018-10-18 12:18:43'),
(581, 'Company deleted successfully', 'http://192.168.2.169:8000/companies/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 12:20:53', '2018-10-18 12:20:53'),
(582, 'Company deleted successfully', 'http://192.168.2.169:8000/companies/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 13:01:38', '2018-10-18 13:01:38'),
(583, 'Company added successfully', 'http://192.168.2.169:8000/companies/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 13:03:00', '2018-10-18 13:03:00'),
(584, 'Company deleted successfully', 'http://192.168.2.169:8000/companies/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 13:03:20', '2018-10-18 13:03:20'),
(585, 'Company added successfully', 'http://192.168.2.169:8000/companies/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 13:05:35', '2018-10-18 13:05:35'),
(586, 'Company deleted successfully', 'http://192.168.2.169:8000/companies/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 13:06:20', '2018-10-18 13:06:20'),
(587, 'Company added successfully', 'http://192.168.2.169:8000/companies/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 13:11:08', '2018-10-18 13:11:08'),
(588, 'Company deleted successfully', 'http://192.168.2.169:8000/companies/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 13:11:20', '2018-10-18 13:11:20'),
(589, 'Company added successfully', 'http://192.168.2.169:8000/companies/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 13:12:01', '2018-10-18 13:12:01'),
(590, 'Company deleted successfully', 'http://192.168.2.169:8000/companies/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 13:15:20', '2018-10-18 13:15:20'),
(591, 'Company added successfully', 'http://192.168.2.169:8000/companies/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 13:16:28', '2018-10-18 13:16:28'),
(592, 'Company deleted successfully', 'http://192.168.2.169:8000/companies/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 13:16:37', '2018-10-18 13:16:37'),
(593, 'Company added successfully', 'http://192.168.2.169:8000/companies/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 13:17:20', '2018-10-18 13:17:20'),
(594, 'Company deleted successfully', 'http://192.168.2.169:8000/companies/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 13:17:30', '2018-10-18 13:17:30'),
(595, 'Company deleted successfully', 'http://192.168.2.169:8000/companies/delete', 'POST', '192.168.2.151', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 13:25:13', '2018-10-18 13:25:13'),
(596, 'Company added successfully', 'http://192.168.2.169:8000/companies/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 13:40:11', '2018-10-18 13:40:11'),
(597, 'Company added successfully', 'http://192.168.2.169:8000/companies/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 13:51:47', '2018-10-18 13:51:47'),
(598, 'Company deleted successfully', 'http://192.168.2.169:8000/companies/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 14:44:58', '2018-10-18 14:44:58'),
(599, 'Company deleted successfully', 'http://192.168.2.169:8000/companies/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 14:45:08', '2018-10-18 14:45:08'),
(600, 'Company added successfully', 'http://192.168.2.169:8000/companies/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 14:46:02', '2018-10-18 14:46:02'),
(601, 'Company added successfully', 'http://192.168.2.169:8000/companies/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 14:47:08', '2018-10-18 14:47:08'),
(602, 'Company updated successfully', 'http://192.168.2.169:8000/companies/edit/38/125', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 14:54:00', '2018-10-18 14:54:00'),
(603, 'Admin added customer successfully', 'http://192.168.2.169:8000/customers/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 15:01:47', '2018-10-18 15:01:47'),
(604, 'Admin updated customer successfully', 'http://192.168.2.169:8000/customers/edit/4', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 15:02:04', '2018-10-18 15:02:04'),
(605, 'Admin deleted customer successfully', 'http://192.168.2.169:8000/customers/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 15:02:28', '2018-10-18 15:02:28'),
(606, 'Admin updated customer successfully', 'http://192.168.2.169:8000/customers/edit/1', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 16:08:37', '2018-10-18 16:08:37'),
(607, 'Employee added successfully', 'http://192.168.2.169:8000/employees/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 16:28:43', '2018-10-18 16:28:43'),
(608, 'Employee updated successfully', 'http://192.168.2.169:8000/employees/edit/21/126', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 16:29:32', '2018-10-18 16:29:32'),
(609, 'Employee deleted successfully', 'http://192.168.2.169:8000/employees/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 16:29:56', '2018-10-18 16:29:56'),
(610, 'Admin added customer successfully', 'http://192.168.2.169:8000/customers/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 16:31:22', '2018-10-18 16:31:22'),
(611, 'Admin updated customer successfully', 'http://192.168.2.169:8000/customers/edit/5', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 16:32:14', '2018-10-18 16:32:14'),
(612, 'Admin deleted customer successfully', 'http://192.168.2.169:8000/customers/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 16:32:21', '2018-10-18 16:32:21'),
(613, 'Admin replied back on mail notification of employee.', 'http://192.168.2.169:8000/replyEmailNotification/flag=reply/4', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 17:39:41', '2018-10-18 17:39:41'),
(614, 'Notification mail deleted successfully', 'http://192.168.2.169:8000/deleteNotification', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 17:42:48', '2018-10-18 17:42:48'),
(615, 'Admin profile updated', 'http://192.168.2.169:8000/update/profile/1/0/0/0', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 17:43:55', '2018-10-18 17:43:55'),
(616, 'Admin profile updated', 'http://192.168.2.169:8000/update/profile/1/0/0/0', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 17:44:44', '2018-10-18 17:44:44'),
(617, 'Admin added product successfully', 'http://192.168.2.169:8000/products/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 17:54:02', '2018-10-18 17:54:02'),
(618, 'Admin added product successfully', 'http://192.168.2.169:8000/products/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 17:54:42', '2018-10-18 17:54:42'),
(619, 'Admin deleted product successfully', 'http://192.168.2.169:8000/products/delete/6', 'DELETE', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 17:55:25', '2018-10-18 17:55:25'),
(620, 'User added successfully', 'http://192.168.2.169:8000/users/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 19:42:07', '2018-10-18 19:42:07'),
(621, 'User updated successfully', 'http://192.168.2.169:8000/users/edit/127', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 19:42:28', '2018-10-18 19:42:28'),
(622, 'User deleted successfully', 'http://192.168.2.169:8000/users/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-18 19:42:39', '2018-10-18 19:42:39'),
(623, 'User updated successfully', 'http://192.168.2.169:8000/users/edit/124', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-20 12:52:41', '2018-10-20 12:52:41'),
(624, 'User deleted successfully', 'http://192.168.2.169:8000/users/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-20 12:52:56', '2018-10-20 12:52:56'),
(625, 'Team added successfully', 'http://192.168.2.169:8000/teams/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-20 12:54:24', '2018-10-20 12:54:24'),
(626, 'Team deleted successfully', 'http://192.168.2.169:8000/teams/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-20 12:54:33', '2018-10-20 12:54:33'),
(627, 'Company deleted successfully', 'http://192.168.2.169:8000/companies/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-20 12:54:47', '2018-10-20 12:54:47'),
(628, 'Company added successfully', 'http://192.168.2.169:8000/companies/new', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-20 13:00:58', '2018-10-20 13:00:58'),
(629, 'Company deleted successfully', 'http://192.168.2.169:8000/companies/delete', 'POST', '192.168.2.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 1, '2018-10-20 13:01:07', '2018-10-20 13:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from_user` int(10) unsigned NOT NULL,
  `to_user` int(10) unsigned NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=51 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from_user`, `to_user`, `message`, `read_at`, `created_at`, `updated_at`) VALUES
(8, 69, 1, 'Anmol Patel sended his/her CV to you(Anamika Patel)', '2018-10-18 17:01:45', '2018-10-05 19:24:31', '2018-10-18 17:01:45'),
(9, 69, 1, 'Anmol Patel sended his/her CV to you(Anamika Patel)', '2018-10-18 17:07:10', '2018-10-05 19:25:58', '2018-10-18 17:07:10'),
(44, 68, 1, 'Nisarg Patel sended his/her CV to you(Anamika Patel)', '2018-10-12 19:01:49', '2018-10-12 19:01:49', '2018-10-20 13:06:20'),
(45, 68, 1, 'Nisarg Patel sended his/her CV to you(Anamika Patel)', '2018-10-12 19:30:09', '2018-10-12 19:30:09', '2018-10-12 19:30:09'),
(46, 69, 1, 'Anmol Patel sended his/her CV to you(Anamika Patel)', '2018-10-17 18:03:48', '2018-10-17 18:03:48', '2018-10-17 18:03:48'),
(49, 1, 69, 'Admin Anamika Patel replied back to Anmol Patel', '2018-10-17 18:46:44', '2018-10-17 18:46:44', '2018-10-17 18:46:44'),
(50, 1, 69, 'Admin Anamika Patel replied back to Anmol Patel', '2018-10-18 17:39:41', '2018-10-18 17:39:41', '2018-10-18 17:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_10_08_124358_create-company-table', 2),
(4, '2018_10_08_124603_create-team-table', 3),
(5, '2018_10_08_125343_create-employee-table', 4),
(6, '2018_10_08_125450_create-designation-table', 5),
(7, '2018_10_08_125603_create-log-activity-table', 6),
(8, '2018_10_08_125712_create-employee-salary-table', 7),
(9, '2018_10_08_125827_create-customer-table', 8),
(10, '2018_10_08_125931_create-product-table', 9),
(11, '2018_10_08_130035_create-invoice-table', 10),
(12, '2018_10_08_130131_create-jobs-table', 11),
(13, '2018_10_08_130225_create-messages-table', 12),
(14, '2018_10_08_130341_create-drafts-table', 13),
(16, '2018_10_22_092115_create-position-table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('companytest1206@gmail.com', '$2y$10$qQi41ob3n.SiWRwXHq6BMeU/dUch7P/beME0gxQAg3R66DCGv/d/6', '2018-09-10 14:51:48');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `emp_position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`pid`, `emp_position`, `created_at`, `updated_at`) VALUES
(1, 'Fresher', '2018-08-07 17:20:00', '2018-08-07 17:20:00'),
(2, 'Employee', '2018-08-07 17:21:30', '2018-08-07 17:21:30'),
(3, 'Trainee', '2018-08-09 20:18:00', '2018-08-09 20:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `prod_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_description`, `prod_price`, `created_at`, `updated_at`) VALUES
(1, 'Ladies Dress', 'Red ladies dress', '1400', '2018-09-22 13:53:47', '2018-10-11 14:35:12'),
(2, 'Jeans', 'Blue denim jeans', '1000', '2018-09-22 13:54:07', '2018-09-22 13:54:07'),
(4, 'demo product', 'demo product', '1200', '2018-10-11 14:34:56', '2018-10-11 14:34:56'),
(5, 'demp product', 'demo', '1200', '2018-10-18 17:54:02', '2018-10-18 17:54:02');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `team_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`tid`, `team_name`, `company_id`, `created_at`, `updated_at`) VALUES
(1, 'Team A', 1, '2018-01-30 20:26:53', '2018-09-08 14:17:49'),
(3, 'Team B', 1, '2018-02-14 20:28:10', '2018-09-11 16:09:11'),
(7, 'Team D', 3, '2018-03-30 20:12:18', '2018-03-30 20:20:00'),
(8, 'Team Z', 3, '2018-04-20 20:34:32', '2018-06-20 20:45:00'),
(9, 'Team E', 2, '2018-04-30 20:36:05', '2018-06-30 20:50:00'),
(10, 'Team F', 2, '2018-05-20 20:37:08', '2018-07-20 20:55:00'),
(13, 'Team Xetc', 1, '2018-07-07 18:32:12', '2018-09-11 16:41:46'),
(14, 'Team Y', 2, '2018-08-08 14:31:04', '2018-09-10 19:25:17'),
(16, 'Team L', 1, '2018-08-10 16:54:39', '2018-09-10 16:54:39'),
(17, 'Team N', 1, '2018-08-10 16:58:14', '2018-09-10 16:58:14'),
(18, 'Team Dev', 2, '2018-09-10 18:42:13', '2018-09-10 18:42:13'),
(19, 'Team Test', 2, '2018-09-11 12:36:47', '2018-09-11 12:36:47'),
(20, 'Team Designing', 2, '2018-09-11 13:20:40', '2018-09-11 13:20:40'),
(22, 'Team U', 3, '2018-09-11 19:18:42', '2018-09-11 19:18:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Admin',
  `company_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=129 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `provider_id`, `provider`, `name`, `address`, `phone`, `role_name`, `company_id`, `team_id`, `employee_id`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '0', 'null', 'Anamika Patel', 'Surat', '8154986917', 'Admin', '0', '0', '0', 'anamika', 'companytest1206@gmail.com', '$2y$10$03XLsi3I3JIvLD41.hOz9OW6qJ/FSZzKUOqnX9MHl4Gd7sBHhStEG', 'DZhTLuJ5DqFYIthJE2gOEgu1jByDBNBfirX0FzdJ3hLcdkFbm1xGwxicupJ2', '2018-08-29 14:34:34', '2018-10-18 17:44:44'),
(3, '0', 'null', 'Narola Infotech', 'Surat', '1346790258', 'Company', '1', '0', '0', 'narola', 'NarolaInfotech@gmail.com', '$2y$10$QdOyUlLhUUjObwU7OqXijeIlLMtk68iDgXUofj9M6cVAMvCWhEVDi', 'E5Hy1IzECQYhh2a63cL6nXVK0iRAxW9V6KGtB1KVuDd48CxIStlL8MHZpxQ1', '2018-08-30 17:10:56', '2018-09-11 16:12:27'),
(4, '0', 'null', 'Coldfin Private Lab', 'Lal Darwaja, Surat', '0987654320', 'Company', '2', '0', '0', 'coldfin', 'coldfinlab@gmail.com', '$2y$10$crsJ5HN0ZQ2Zg5icm9qL0eWcrw1.wVg4k.AdE2eIOCbrhokLk.Tcy', 'x1XiqPrfFvZsoDQoWdeyH0IDsKd3eXTMFuJUxirQz2LSmvsLhqooLTGQil3w', '2018-08-30 17:11:39', '2018-09-11 13:26:52'),
(5, '0', 'null', 'Peacock Technologies', 'Udhana, Surat', '0864213579', 'Company', '3', '0', '0', 'peacocktech', 'peacocktech@gmail.com', '$2y$10$0uD9vgJ/YAC9PFN8LlJRUuq6.frIr4lBe6XAHDSTVq7Gphxccd.VG', 'T92y2eo6GNSHSBGdiGSc6P0uJrN56jCY1qYvVAgh16NmzJlJDHPUrgH4d0V8', '2018-08-30 17:15:16', '2018-09-15 14:59:40'),
(7, '0', 'null', 'Tech Sky Technologies', 'surat', '9857429012', 'Company', '5', '0', '0', 'techSky', 'techSky@gmail.com', '$2y$10$S157HKdqSYc1rW5iVTJKROrLbP/DPNvH8v/vgGHQH0.96gwDQEMXu', 'gmcWA7zZE89BrHlwgQEmOSsDA6nSAPtGqAKlEKBLKTqoJa35cki7pwHeD3il', '2018-08-30 17:17:56', '2018-09-10 16:43:25'),
(9, '0', 'null', 'Linkup PVT LTD', 'surat', '7533553355', 'Company', '7', '0', '0', 'linkupsolutions', 'linkupsolutions@gmail.com', '$2y$10$Ilrpdl4DUIh70gTXF6VwAO0JLC3x/Fb9H/1n4uhRJjywDO3Qhajrq', 'NWT5Wf99VvjsiYnkQf1ucR9MnR3tI6XTVgY8gjhv', '2018-08-30 17:34:34', '2018-09-10 16:44:37'),
(10, '0', 'null', 'Diffusion Infotech', 'surat', '7055443322', 'Company', '8', '0', '0', 'diffusioninfotech', 'diffusioninfotech@gmail.com', '$2y$10$kYjYXIKtIvn5jrnyjigtyeArKqQBl4Ansk2P7zlI.Lq.idbzK0s0a', 'NWT5Wf99VvjsiYnkQf1ucR9MnR3tI6XTVgY8gjhv', '2018-08-30 19:06:31', '2018-09-10 16:44:58'),
(11, '0', 'null', 'Log Infotech', 'surat', '2304556788', 'Company', '9', '0', '0', 'loginfotech', 'loginfotech@gmail.com', '$2y$10$dO/YrCoU6MXwh9tVH5Xqc.YgENbh9vUIk9KkW8/aPMbVkP7mu1DOO', 'NWT5Wf99VvjsiYnkQf1ucR9MnR3tI6XTVgY8gjhv', '2018-08-30 19:08:19', '2018-09-10 16:45:19'),
(12, '0', 'null', 'Dominant Infotech', 'surat', '8576456899', 'Company', '10', '0', '0', 'dominantinfotech', 'dominantinfotech@gmail.com', '$2y$10$6KV7uYFp2HsoQMQ.tpXX1Okuk2CdemtgI9xR.rJg0NgmB4VKTt1M.', 'NWT5Wf99VvjsiYnkQf1ucR9MnR3tI6XTVgY8gjhv', '2018-08-30 19:10:09', '2018-09-10 16:45:48'),
(15, '0', 'null', 'Team A', 'Surat', '9876543210', 'Team', '1', '1', '0', 'team-A', 'team-A@gmail.com', '$2y$10$FChwzGqTxk8DTjim5f23B.7dBNy3a/aO1eMdx.OnVsD.MpQmT7QoC', 'pDNBM8br5dbl05ckiSoImbIZVGOkXrtKtMU3O2DIieK9NXXP7gRfKKfzm2cP', '2018-08-30 19:26:53', '2018-09-13 14:54:05'),
(17, '0', 'null', 'Team B', 'Surat', '0987654322', 'Team', '1', '3', '0', 'team-B', 'team-B@gmail.com', '$2y$10$5aNvJ744Nqn4jmXJTOUy5.bpcekUOidMQys20ZwTtczU3I50i3Xs.', 'm5y0GnW3h7fBjnbvnNF77Qy7DB9BCMHyB2p7GWV8GPdioqZrXMhEBHByUdw2', '2018-08-30 19:28:10', '2018-09-11 16:09:11'),
(21, '0', 'null', 'Team D', 'Surat', '8765432190', 'Team', '3', '7', '0', 'team-D', 'team-D@gmail.com', '$2y$10$WpAeejEQvmJq0XBuUSR22.F9.8W9T6so.u6mBOeKCKDz1tEPUgiqK', 'NWT5Wf99VvjsiYnkQf1ucR9MnR3tI6XTVgY8gjhv', '2018-08-30 20:12:18', '2018-09-11 20:31:52'),
(22, '0', 'null', 'Team Z', 'Surat', '0099887766', 'Team', '3', '8', '0', 'team-Z', 'team-Z@gmail.com', '$2y$10$dIINB9HHnsbJMH2OywWR/OEDlZU2QN9loWZF1Iz/xBoOTQLXZeS9K', 'NWT5Wf99VvjsiYnkQf1ucR9MnR3tI6XTVgY8gjhv', '2018-08-30 20:34:32', '2018-09-11 12:33:30'),
(23, '0', 'null', 'Team E', 'Surat', '0864213579', 'Team', '4', '9', '0', 'team-E', 'team-E@gmail.com', '$2y$10$7D3L3eQ.HneB0TshlNKWlebFhwlweHZKyRcdzzqDwUpbw6Kq.7SY.', 'NWT5Wf99VvjsiYnkQf1ucR9MnR3tI6XTVgY8gjhv', '2018-08-30 20:36:05', '2018-09-11 12:33:46'),
(24, '0', 'null', 'Team F', 'Surat', '6789012345', 'Team', '4', '10', '0', 'team-F', 'team-F@gmail.com', '$2y$10$YRdLy10c2QKyq..MYAjsYO5Ll6faU5tOZsRSM6yAdpB05VPtG6eiO', 'NWT5Wf99VvjsiYnkQf1ucR9MnR3tI6XTVgY8gjhv', '2018-08-30 20:37:08', '2018-09-11 19:18:58'),
(66, '0', 'null', 'Team Xetc', 'Surat', '2345678901', 'Team', '4', '13', '0', 'team-xetc', 'team-xetc@gmail.com', '$2y$10$lkZ3CaX9Z/TRqoxx6cR/gO2pVPUEwchLov8OPhIjDbiLl1HTWHZjS', 'KKURHQYBIVId0LQq6gY0AjkHnXYMWidAzzAEDxI0094NpSMwa4LncRKGrJ57', '2018-09-07 18:32:12', '2018-09-11 16:41:46'),
(68, '0', 'null', 'Nisarg Patel', 'Udhana, Surat', '7226894240', 'Employee', '1', '1', '5', 'nisu12', 'nisu@gmail.com', '$2y$10$KauTbsa7f0LjMcRY4A1BSuPVpa0zzMQiciTuLZXrN2YL/liiUyTpW', 'kCtcXC8Q0ZzUs8Fd1DKB5udG4gwsnuuQeJV8zDFz75GTeuBkggGh2T5z4Fo4', '2018-09-07 20:28:44', '2018-09-12 11:43:25'),
(69, '0', 'null', 'Anmol Patel', 'Surat', '0987654321', 'Employee', '1', '1', '6', 'anmol', 'companytest1130@gmail.com', '$2y$10$rA3YLmeX3MgEjnxFq.MOje5K0Q8MoU12iwiqK5jr3/1tgKlkXUDCC', 'C0faTDrIdLU0doy0ff22L0klTlXNmqWSFkTq5tU3ErryAi7bOkcnsME9j8UU', '2018-09-07 20:52:43', '2018-09-10 17:20:39'),
(70, '0', 'null', 'Team Y', 'Surat', '1234567890', 'Team', '2', '14', '0', 'team-Y', 'teamY@gmail.com', '$2y$10$jDlbh9HrZufQKK1ZrUgaD.Y.WniT1je8zJta9aqsS7L2ZDFEZdtiy', 'kJ3C2miQ9blLU7sa7bR7qHkg6LLQi8fnkRYvnhvRD9gFWtnMvRef6zz9ppYT', '2018-09-08 14:31:04', '2018-09-11 13:19:19'),
(73, '0', 'null', 'Anamika Kamani', 'Surat', '0987654321', 'Employee', '2', '18', '9', 'anamika', 'anamika@gmail.com', '$2y$10$r6ilY3RDv6gL/CfRgn0I2OgI20/O2uxKRphzdgf.JI5sDYVSUqCXe', 'FCMgoXtvWLv6geKmzgfZxK4bN7e2DlP7FnGXfRVy5Ncrcfl7XclRQWlF8ORz', '2018-09-10 14:58:28', '2018-09-10 17:48:51'),
(76, '0', 'null', 'Team L', 'Surat', '0876543219', 'Team', '4', '16', NULL, 'team-L', 'teamL@gmail.com', '$2y$10$pxSRc0bW/wk5BkLQf.FRn.7YBMW5tQuFRnjiAY2OnP8H/WdogT/eW', 'GCaTSzK95pd6Rg5SWQ6fQrjSgoLPwRO2rDWu8tlU', '2018-09-10 16:55:34', '2018-09-11 12:38:58'),
(77, '0', 'null', 'Team N', 'Surat', '7654321908', 'Team', '1', '17', NULL, 'team-N', 'teamN@gmail.com', '$2y$10$4YmDudS1sOu9RooZZuuubO5TH4Ln6/oBZuCTkoEHzSOHtLSyJPAXW', 'jLExYgohFCXDzS8MmXlKzzlWu07r7vsfZdtb4ZPx', '2018-09-10 16:58:14', '2018-09-11 12:35:23'),
(78, '0', 'null', 'Maitry Patel', 'Navsari', '0987654321', 'Employee', '1', '17', '10', 'maitry', 'mapatel@gmail.com', '$2y$10$HSSXSMrPsK7CVQb33qJege7IYX8yZ/9/DyNCS3H1UchnNr2VTzo8u', 'jLExYgohFCXDzS8MmXlKzzlWu07r7vsfZdtb4ZPx', '2018-09-10 17:07:18', '2018-09-10 17:07:40'),
(79, '0', 'null', 'Prachi Patel', 'Surat', '7226894240', 'Employee', '2', '14', '11', 'prachi17', 'angel.prachi03@gmail.com', '$2y$10$kfT.yuj/KxbcpRpeDGeCGeo4xO5iRzUPMAuHlk7p2lxQy76sSrr8G', 'kxgrZxKeNY8aN3ccLlrGAhJlBzH3GDGwpEGs9s6oFodDdoAFufViHVnTcWoM', '2018-09-10 17:41:13', '2018-10-01 14:28:34'),
(80, '0', 'null', 'Yash Patel', 'Surat', '1234567890', 'Employee', '2', '14', '12', 'yash02', 'yash@gmail.com', '$2y$10$G.PqXEYFcXnojAipUPFKT.jtOpZP1nIFo/1SEBSx89ynU2fbUfUry', '63NkFSVUqXCUhH5OTD1xRfZYBHM3kNxb0Or9l8vl', '2018-09-10 17:50:06', '2018-09-10 18:30:00'),
(81, '0', 'null', 'Team Dev', 'Surat', '3456789012', 'Team', '2', '18', NULL, 'team-Dev', 'test@gmail.com', '$2y$10$bJI0M0aQUpUhYWz416IjXeVOdfzqQsPlAceRuLMRcxH6BVpw.iF3C', '0MI56E33fGsgylaemOyUgQZ44DmWWdJF1ySZ0QTz', '2018-09-10 18:42:13', '2018-10-17 12:33:45'),
(82, '0', 'null', 'Dhara Patel', 'Surat', '1234567890', 'Employee', '3', '7', '13', 'dhara123', 'dhara@gmail.com', '$2y$10$VXEUkd.tX.7E.m9D/aAJ0.0mb38AVqMp8kituIcGqYgfRNx5xjqf2', 'Zt6TloKElQpQaC3jDJGtNzT9jquHo2ZdS1oaLSjpDkQtu5onaXY7O8TNFcjF', '2018-09-10 19:33:37', '2018-09-10 19:33:37'),
(83, '0', 'null', 'Team Test', 'Surat', '0987654320', 'Team', '4', '19', NULL, 'team-test', 'team-test@gmail.com', '$2y$10$glxn9DD2GVPQXID3AgLVD.Up9wCvETTr1ikEM3HqRbWR7erZWgwMa', 'VJuwC2BeV7mU4QUavt7tM1S8c0HWPCrEVjrifbBbrANsRUtL4U1Tx1dqenpU', '2018-09-11 12:36:47', '2018-09-11 12:36:47'),
(85, '0', 'null', 'Team Designing', 'Surat', '9876543210', 'Team', '2', '20', NULL, 'team-designing', 'team-designing@gmail.com', '$2y$10$M0OzTFL6vYD.Nftgey3ZgOktdWOWWtMJK7jUYp2ju31Jtj2HuMf5e', 'QEvEtrVnwASt6Oal3WQ5MIMJ4sGHcfb4xliXV49O', '2018-09-11 13:20:40', '2018-09-11 13:20:40'),
(86, '0', 'null', 'Akshay Patel', 'Navsari', '9876543210', 'Employee', '2', '18', '14', 'akshay', 'akshay@gmail.com', '$2y$10$6Z7tU1j4H2CYXhOdtFH0ue03aPQKLYchE8jljjG9u/WpqAop2m6iy', 'QEvEtrVnwASt6Oal3WQ5MIMJ4sGHcfb4xliXV49O', '2018-09-11 13:23:20', '2018-09-11 13:23:20'),
(87, '0', 'null', 'Patel Disha', 'Navsari', '7654321890', 'Employee', '1', '1', '15', 'disha13', 'disha@gmail.com', '$2y$10$iCJnKRwFzaGW9diA9DPNae4qLEvbXwtfjAvXLW1jvs1vyEnpEab2a', 'AcnPrLNjAIHK02ryNGd2SZ2nlBgHUyWgroi8290I', '2018-09-11 13:30:22', '2018-09-11 13:30:22'),
(88, '0', 'null', 'Patel Parth', 'Navsari', '9807654321', 'Employee', '1', '3', '16', 'parth123', 'parth@gmail.com', '$2y$10$cvvKUpZzIbP5HEkK7v2LkuslpI6Y9QpX6rZ7yY.ty900hiGW7NBJm', 'AcnPrLNjAIHK02ryNGd2SZ2nlBgHUyWgroi8290I', '2018-09-11 13:31:33', '2018-09-11 13:31:33'),
(89, '0', 'null', 'Patel Vishwa', 'Surat', '6356908765', 'Employee', '1', '3', '17', 'vishwa', 'vishwa@gmail.com', '$2y$10$yqrKMK2SPOs8T86dh/tmT.1du0LGJ4vbJR6LKnTSW1CvpsNkebDkC', 'SlC33jkYezO5tGbx4PP1g7Vtm5uyyruCXPHvKuXrbkwZvkIlMTtVhX25LFxq', '2018-09-11 15:00:01', '2018-09-11 15:00:01'),
(91, '0', 'null', 'Patel Nikunj', 'Navsari', '1234567890', 'Employee', '4', '10', '18', 'nikunj', 'nikunj@gmail.com', '$2y$10$G4Mrgj3Tn17L6vd4xrFOGOCySvMsMmXFI7oed7i72HiG5i3JsFVAe', 'Kp3y7pS0SAlQMi67bXEQwfzTeJ4JccCOl8VILejI', '2018-09-11 16:34:46', '2018-09-11 16:34:46'),
(92, '0', 'null', 'Kharadi Himanshu', 'Gandhinagar', '7890654321', 'Employee', '4', '13', '19', 'himanshu', 'himanshu@yahoo.com', '$2y$10$6kdSUVkatK63L6ICdgF6secxYQO0hr6t1s7OvFXbXlJxWsdgX4HZy', 'Ir0q9tkfNCQ0PSedU4zlWc5TyPTAQnUHK7ULZxnp', '2018-09-11 16:39:58', '2018-09-11 16:40:27'),
(96, '0', 'null', 'Test User', 'Surat', '9786534210', 'Employee', '4', '19', '20', 'testuser123', 'testuser123@gmail.com', '$2y$10$zbUvlizyMjuYjuxu9zQKwOVUeKACp4f42h/zcLlU1Lp9dgnIlKkXO', 'PKuP6WFiUj8ankO962ktOBEO64AYORl2nHw0h151', '2018-09-11 19:16:52', '2018-09-11 20:29:33'),
(97, '0', 'null', 'Team U', 'Surat', '0974658903', 'Team', '4', '22', NULL, 'team-U', 'TeamU@gmail.com', '$2y$10$w0GXO2MNfeSHqEWdkFWYzOP2dVT6HJZBnROvPvA7uPbj.koxi4.UW', 'PKuP6WFiUj8ankO962ktOBEO64AYORl2nHw0h151', '2018-09-11 19:18:42', '2018-09-11 19:18:42'),
(102, '0', 'null', 'Team EG', 'surat', '7226894240', 'Team', '3', '27', NULL, 'team-EG', 'team-eg@gmail.com', '$2y$10$tL9xFe1ROXCaNx86lxR8i.sPa5i6K./s5wcDzmpcOvOaQJNoe85zC', 'NCiLT5VKbbgPtssLkWdKrTK86wdSzuebcaEqOd5p', '2018-10-17 12:26:23', '2018-10-17 12:26:23'),
(128, '0', 'null', 'abc', 'abc', '1234567890', 'Admin', NULL, NULL, NULL, 'abc', 'abc@gmail.com', '$2y$10$v2XFNe4jppblIcxrwqz/N.RFvz7S.kkHVw3i5wcwr4BHzVnrkBm/u', NULL, '2018-10-20 13:22:41', '2018-10-20 13:22:41');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
