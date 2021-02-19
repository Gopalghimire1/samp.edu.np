-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2019 at 04:19 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `azucation`
--

-- --------------------------------------------------------

--
-- Table structure for table `academiccalendars`
--

CREATE TABLE `academiccalendars` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `name` text,
  `multiday` int(11) DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `isholiday` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `level_id` int(11) DEFAULT NULL,
  `classroom_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academiccalendars`
--

INSERT INTO `academiccalendars` (`id`, `date`, `name`, `multiday`, `start`, `end`, `isholiday`, `created_at`, `updated_at`, `level_id`, `classroom_id`) VALUES
(1, NULL, 'examk ', 0, '2018-11-27', '2018-11-27', 0, '2018-11-27 16:35:01', '2018-11-27 16:35:01', NULL, NULL),
(2, NULL, 'winter vacation', 1, '2018-11-27', '2018-12-04', 1, '2018-11-27 13:58:27', '2018-11-27 13:58:27', NULL, NULL),
(4, NULL, 'test', 0, '2018-11-27', '2018-11-27', 0, '2018-11-27 16:44:28', '2018-11-27 16:44:28', NULL, NULL),
(5, NULL, 'test test', 0, '2018-11-27', '2018-11-27', 0, '2018-11-27 16:44:48', '2018-11-27 16:44:48', NULL, NULL),
(6, NULL, 'winter vacation', 1, '2018-11-28', '2018-12-06', 1, '2018-11-28 16:07:58', '2018-11-28 16:07:58', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` text,
  `password` text,
  `role` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(5, 'admin', '8b1a9953c4611296a827abf8c47804d7', 1, '2019-03-11 01:26:01', '2019-01-31 02:26:33');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `att` int(11) DEFAULT '0',
  `date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `level_id` int(11) DEFAULT NULL,
  `classroom_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `teacher_id`, `student_id`, `att`, `date`, `created_at`, `updated_at`, `level_id`, `classroom_id`) VALUES
(26, NULL, 8, 0, '2018-11-28', '2018-11-28 05:47:49', '2018-11-28 05:47:49', NULL, 3),
(27, NULL, 9, 0, '2018-11-28', '2018-11-28 15:56:53', '2018-11-28 15:56:53', NULL, 3),
(28, NULL, 6, 0, '2018-11-28', '2018-11-28 15:56:53', '2018-11-28 15:56:53', NULL, 3),
(29, NULL, 7, 1, '2018-11-28', '2018-11-28 08:19:17', '2018-11-28 08:19:17', NULL, 3),
(30, NULL, 2, 0, '2018-11-28', '2018-11-28 05:47:49', '2018-11-28 05:47:49', NULL, 3),
(31, NULL, 10, 1, '2018-11-28', '2018-11-28 06:33:39', '2018-11-28 06:33:39', NULL, 4),
(32, NULL, 11, 0, '2018-11-28', '2018-11-28 06:33:39', '2018-11-28 06:33:39', NULL, 4),
(33, NULL, 5, 0, '2018-11-28', '2018-11-28 06:33:39', '2018-11-28 06:33:39', NULL, 4),
(34, NULL, 8, 0, '2018-11-29', '2018-11-28 14:10:42', '2018-11-28 14:10:42', NULL, 3),
(35, NULL, 9, 0, '2018-11-29', '2018-11-28 14:10:42', '2018-11-28 14:10:42', NULL, 3),
(36, NULL, 6, 1, '2018-11-29', '2018-11-28 14:10:42', '2018-11-28 14:10:42', NULL, 3),
(37, NULL, 7, 0, '2018-11-29', '2018-11-28 14:10:43', '2018-11-28 14:10:43', NULL, 3),
(38, NULL, 2, 1, '2018-11-29', '2018-11-28 14:10:43', '2018-11-28 14:10:43', NULL, 3),
(39, NULL, 8, 0, '2018-11-30', '2018-11-28 14:11:09', '2018-11-28 14:11:09', NULL, 3),
(40, NULL, 9, 0, '2018-11-30', '2018-11-28 14:11:09', '2018-11-28 14:11:09', NULL, 3),
(41, NULL, 6, 0, '2018-11-30', '2018-11-28 14:11:09', '2018-11-28 14:11:09', NULL, 3),
(42, NULL, 7, 0, '2018-11-30', '2018-11-28 14:11:10', '2018-11-28 14:11:10', NULL, 3),
(43, NULL, 2, 1, '2018-11-30', '2018-11-28 14:11:10', '2018-11-28 14:11:10', NULL, 3),
(44, NULL, 8, 0, '2018-12-12', '2018-11-28 14:11:55', '2018-11-28 14:11:55', NULL, 3),
(45, NULL, 9, 0, '2018-12-12', '2018-11-28 14:11:55', '2018-11-28 14:11:55', NULL, 3),
(46, NULL, 6, 0, '2018-12-12', '2018-11-28 14:11:55', '2018-11-28 14:11:55', NULL, 3),
(47, NULL, 7, 0, '2018-12-12', '2018-11-28 14:11:55', '2018-11-28 14:11:55', NULL, 3),
(48, NULL, 2, 1, '2018-12-12', '2018-11-28 14:11:55', '2018-11-28 14:11:55', NULL, 3),
(49, NULL, 8, 0, '2018-12-03', '2018-11-28 14:12:13', '2018-11-28 14:12:13', NULL, 3),
(50, NULL, 9, 0, '2018-12-03', '2018-11-28 14:12:13', '2018-11-28 14:12:13', NULL, 3),
(51, NULL, 6, 0, '2018-12-03', '2018-11-28 14:12:13', '2018-11-28 14:12:13', NULL, 3),
(52, NULL, 7, 0, '2018-12-03', '2018-11-28 14:12:13', '2018-11-28 14:12:13', NULL, 3),
(53, NULL, 2, 1, '2018-12-03', '2018-11-28 14:12:13', '2018-11-28 14:12:13', NULL, 3),
(54, NULL, 8, 0, '2018-12-21', '2018-11-28 14:12:38', '2018-11-28 14:12:38', NULL, 3),
(55, NULL, 9, 0, '2018-12-21', '2018-11-28 14:12:38', '2018-11-28 14:12:38', NULL, 3),
(56, NULL, 6, 0, '2018-12-21', '2018-11-28 14:12:38', '2018-11-28 14:12:38', NULL, 3),
(57, NULL, 7, 0, '2018-12-21', '2018-11-28 14:12:38', '2018-11-28 14:12:38', NULL, 3),
(58, NULL, 2, 1, '2018-12-21', '2018-11-28 14:12:38', '2018-11-28 14:12:38', NULL, 3),
(59, NULL, 8, 0, '2019-01-15', '2018-11-28 14:12:56', '2018-11-28 14:12:56', NULL, 3),
(60, NULL, 9, 0, '2019-01-15', '2018-11-28 14:12:56', '2018-11-28 14:12:56', NULL, 3),
(61, NULL, 6, 0, '2019-01-15', '2018-11-28 14:12:56', '2018-11-28 14:12:56', NULL, 3),
(62, NULL, 7, 0, '2019-01-15', '2018-11-28 14:12:56', '2018-11-28 14:12:56', NULL, 3),
(63, NULL, 2, 1, '2019-01-15', '2018-11-28 14:12:56', '2018-11-28 14:12:56', NULL, 3),
(64, NULL, 8, 0, '2018-10-09', '2018-11-28 14:13:59', '2018-11-28 14:13:59', NULL, 3),
(65, NULL, 9, 0, '2018-10-09', '2018-11-28 14:13:59', '2018-11-28 14:13:59', NULL, 3),
(66, NULL, 6, 0, '2018-10-09', '2018-11-28 14:13:59', '2018-11-28 14:13:59', NULL, 3),
(67, NULL, 7, 0, '2018-10-09', '2018-11-28 14:13:59', '2018-11-28 14:13:59', NULL, 3),
(68, NULL, 2, 1, '2018-10-09', '2018-11-28 14:13:59', '2018-11-28 14:13:59', NULL, 3),
(69, NULL, 8, 0, '2018-09-17', '2018-11-28 14:14:20', '2018-11-28 14:14:20', NULL, 3),
(70, NULL, 9, 0, '2018-09-17', '2018-11-28 14:14:21', '2018-11-28 14:14:21', NULL, 3),
(71, NULL, 6, 0, '2018-09-17', '2018-11-28 14:14:21', '2018-11-28 14:14:21', NULL, 3),
(72, NULL, 7, 0, '2018-09-17', '2018-11-28 14:14:21', '2018-11-28 14:14:21', NULL, 3),
(73, NULL, 2, 0, '2018-09-17', '2018-11-28 14:14:21', '2018-11-28 14:14:21', NULL, 3),
(74, NULL, 8, 0, '2018-08-13', '2018-11-28 14:14:43', '2018-11-28 14:14:43', NULL, 3),
(75, NULL, 9, 0, '2018-08-13', '2018-11-28 14:14:43', '2018-11-28 14:14:43', NULL, 3),
(76, NULL, 6, 0, '2018-08-13', '2018-11-28 14:14:44', '2018-11-28 14:14:44', NULL, 3),
(77, NULL, 7, 0, '2018-08-13', '2018-11-28 14:14:44', '2018-11-28 14:14:44', NULL, 3),
(78, NULL, 2, 1, '2018-08-13', '2018-11-28 14:22:16', '2018-11-28 14:22:16', NULL, 3),
(79, NULL, 8, 0, '2018-08-12', '2018-11-28 14:22:37', '2018-11-28 14:22:37', NULL, 3),
(80, NULL, 9, 0, '2018-08-12', '2018-11-28 14:22:37', '2018-11-28 14:22:37', NULL, 3),
(81, NULL, 6, 0, '2018-08-12', '2018-11-28 14:22:37', '2018-11-28 14:22:37', NULL, 3),
(82, NULL, 7, 0, '2018-08-12', '2018-11-28 14:22:37', '2018-11-28 14:22:37', NULL, 3),
(83, NULL, 2, 0, '2018-08-12', '2018-11-28 14:22:37', '2018-11-28 14:22:37', NULL, 3),
(84, NULL, 8, 0, '2018-08-11', '2018-11-28 14:22:51', '2018-11-28 14:22:51', NULL, 3),
(85, NULL, 9, 0, '2018-08-11', '2018-11-28 14:22:51', '2018-11-28 14:22:51', NULL, 3),
(86, NULL, 6, 0, '2018-08-11', '2018-11-28 14:22:51', '2018-11-28 14:22:51', NULL, 3),
(87, NULL, 7, 0, '2018-08-11', '2018-11-28 14:22:51', '2018-11-28 14:22:51', NULL, 3),
(88, NULL, 2, 1, '2018-08-11', '2018-11-28 14:22:51', '2018-11-28 14:22:51', NULL, 3),
(89, NULL, 8, 0, '2018-07-01', '2018-11-28 14:23:15', '2018-11-28 14:23:15', NULL, 3),
(90, NULL, 9, 0, '2018-07-01', '2018-11-28 14:23:15', '2018-11-28 14:23:15', NULL, 3),
(91, NULL, 6, 0, '2018-07-01', '2018-11-28 14:23:15', '2018-11-28 14:23:15', NULL, 3),
(92, NULL, 7, 0, '2018-07-01', '2018-11-28 14:23:15', '2018-11-28 14:23:15', NULL, 3),
(93, NULL, 2, 1, '2018-07-01', '2018-11-28 14:23:15', '2018-11-28 14:23:15', NULL, 3),
(94, NULL, 8, 0, '2018-07-02', '2018-11-28 14:23:25', '2018-11-28 14:23:25', NULL, 3),
(95, NULL, 9, 0, '2018-07-02', '2018-11-28 14:23:25', '2018-11-28 14:23:25', NULL, 3),
(96, NULL, 6, 0, '2018-07-02', '2018-11-28 14:23:25', '2018-11-28 14:23:25', NULL, 3),
(97, NULL, 7, 0, '2018-07-02', '2018-11-28 14:23:25', '2018-11-28 14:23:25', NULL, 3),
(98, NULL, 2, 0, '2018-07-02', '2018-11-28 14:23:25', '2018-11-28 14:23:25', NULL, 3),
(99, NULL, 8, 0, '2018-07-03', '2018-11-28 14:23:48', '2018-11-28 14:23:48', NULL, 3),
(100, NULL, 9, 0, '2018-07-03', '2018-11-28 14:23:48', '2018-11-28 14:23:48', NULL, 3),
(101, NULL, 6, 0, '2018-07-03', '2018-11-28 14:23:49', '2018-11-28 14:23:49', NULL, 3),
(102, NULL, 7, 0, '2018-07-03', '2018-11-28 14:23:49', '2018-11-28 14:23:49', NULL, 3),
(103, NULL, 2, 1, '2018-07-03', '2018-11-28 14:23:49', '2018-11-28 14:23:49', NULL, 3),
(104, NULL, 8, 0, '2018-07-04', '2018-11-28 14:24:03', '2018-11-28 14:24:03', NULL, 3),
(105, NULL, 9, 0, '2018-07-04', '2018-11-28 14:24:03', '2018-11-28 14:24:03', NULL, 3),
(106, NULL, 6, 0, '2018-07-04', '2018-11-28 14:24:03', '2018-11-28 14:24:03', NULL, 3),
(107, NULL, 7, 0, '2018-07-04', '2018-11-28 14:24:03', '2018-11-28 14:24:03', NULL, 3),
(108, NULL, 2, 1, '2018-07-04', '2018-11-28 14:24:09', '2018-11-28 14:24:09', NULL, 3),
(109, NULL, 8, 1, '2019-02-07', '2019-02-07 04:10:50', '2019-02-07 04:10:50', NULL, 3),
(110, NULL, 9, 1, '2019-02-07', '2019-02-07 04:10:50', '2019-02-07 04:10:50', NULL, 3),
(111, NULL, 6, 1, '2019-02-07', '2019-02-07 08:57:01', '2019-02-07 04:12:01', NULL, 3),
(112, NULL, 7, 1, '2019-02-07', '2019-02-07 08:57:02', '2019-02-07 04:12:02', NULL, 3),
(113, NULL, 2, 1, '2019-02-07', '2019-02-07 08:57:02', '2019-02-07 04:12:02', NULL, 3),
(114, NULL, 8, 0, '2019-03-10', '2019-03-10 11:17:25', '2019-03-10 11:17:25', NULL, 3),
(115, NULL, 9, 1, '2019-03-10', '2019-03-10 11:17:26', '2019-03-10 11:17:26', NULL, 3),
(116, NULL, 6, 1, '2019-03-10', '2019-03-10 11:17:26', '2019-03-10 11:17:26', NULL, 3),
(117, NULL, 7, 1, '2019-03-10', '2019-03-10 11:17:26', '2019-03-10 11:17:26', NULL, 3),
(118, NULL, 2, 1, '2019-03-10', '2019-03-10 11:17:26', '2019-03-10 11:17:26', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `auths`
--

CREATE TABLE `auths` (
  `id` int(11) NOT NULL,
  `role` int(11) DEFAULT NULL,
  `session_key` text,
  `refrence_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auths`
--

INSERT INTO `auths` (`id`, `role`, `session_key`, `refrence_id`, `created_at`, `updated_at`) VALUES
(1, 3, 'asdfghjklqwertyuiopzxcvbnm', 5, '2019-02-01 02:38:41', '2019-02-01 02:38:41'),
(2, 3, 'asdfghjklqwertyuiopzxcvbnm', 5, '2019-02-02 00:15:28', '2019-02-02 00:15:28'),
(3, 3, 'asdfghjklqwertyuiopzxcvbnm', 5, '2019-02-02 00:45:11', '2019-02-02 00:45:11'),
(4, 3, 'asdfghjklqwertyuiopzxcvbnm', 5, '2019-02-02 03:34:04', '2019-02-02 03:34:04'),
(5, 3, 'c3198ba41c671829f70ab733d939f48f', 5, '2019-02-02 03:38:18', '2019-02-02 03:38:18'),
(6, 3, '517c2d8125f7333b417e25cb1634bcc3', 5, '2019-02-02 03:38:28', '2019-02-02 03:38:28'),
(7, 3, 'e51f43cf8518517662ac624aed2e677f', 5, '2019-02-02 03:38:35', '2019-02-02 03:38:35'),
(8, 3, '9b2aa0380f466e2823f6fedadbaacbd8', 5, '2019-02-02 03:38:42', '2019-02-02 03:38:42'),
(9, 3, 'c812245af122ee4f2418156c8ba8d64b', 5, '2019-02-02 03:59:18', '2019-02-02 03:59:18'),
(10, 3, '7523bffa7f353399944166dc54277c46', 5, '2019-02-02 04:52:49', '2019-02-02 04:52:49'),
(11, 3, '96ae9219e18c8fd3eaeeacc55323dbf4', 5, '2019-02-02 04:53:10', '2019-02-02 04:53:10'),
(12, 3, '2545800923d209e94eac3dd4a8f7d6bc', 5, '2019-02-03 04:59:17', '2019-02-03 04:59:17'),
(13, 3, 'e8ab44c0160366caf1d6093d92752198', 5, '2019-02-03 05:19:38', '2019-02-03 05:19:38'),
(14, 3, 'e8cdddf8c7853097bc8eb2723f69d5f4', 5, '2019-02-03 05:20:21', '2019-02-03 05:20:21'),
(15, 1, 'a9c533f6aa439596168d7c65ba3cb3e1', 4, '2019-02-03 23:23:41', '2019-02-03 23:23:41'),
(16, 1, '38933e6ebb19048d6bf34ac0198b5b5e', 3, '2019-02-03 23:42:25', '2019-02-03 23:42:25'),
(17, 2, 'e6a127fc97356eb70f7bc88212cc87ce', 28, '2019-02-04 00:14:55', '2019-02-04 00:14:55'),
(18, 2, '14355db024f913fd12aef8956958157e', 28, '2019-02-04 09:42:38', '2019-02-04 09:42:38'),
(19, 1, '261c19b6c98c7d151857f93a05dda504', 3, '2019-02-04 10:19:33', '2019-02-04 10:19:33'),
(20, 3, '03242bfe8a57b973273fe284af552096', 5, '2019-02-04 10:49:34', '2019-02-04 10:49:34'),
(21, 3, 'a0018ae3c5e2a73a5da123df01925325', 5, '2019-02-07 04:02:54', '2019-02-07 04:02:54'),
(22, 2, '26740ab3a43d68fc03bb9945167ff867', 28, '2019-02-07 04:06:50', '2019-02-07 04:06:50'),
(23, 0, NULL, NULL, '2019-02-07 04:15:27', '2019-02-07 04:15:27'),
(24, 3, '29f5ed790d8356a7192e16b591fa3b6b', 5, '2019-02-07 10:01:09', '2019-02-07 10:01:09'),
(25, 0, NULL, NULL, '2019-02-07 11:26:09', '2019-02-07 11:26:09'),
(26, 2, '01dc33f768febd71747f562f53e20d03', 28, '2019-02-07 11:46:18', '2019-02-07 11:46:18'),
(27, 3, 'e49b8843685e89aa4ec7da6a2a5720ff', 5, '2019-02-07 11:47:20', '2019-02-07 11:47:20'),
(28, 0, NULL, NULL, '2019-02-20 02:19:41', '2019-02-20 02:19:41'),
(29, 0, NULL, NULL, '2019-02-22 00:21:53', '2019-02-22 00:21:53'),
(30, 3, '27905f3e86dd03ec473f2efe14fb299a', 5, '2019-02-22 01:17:38', '2019-02-22 01:17:38'),
(31, 0, NULL, NULL, '2019-02-23 00:49:11', '2019-02-23 00:49:11'),
(32, 3, 'c0de3e6d1a110c29825b9b8490b935a0', 5, '2019-02-24 02:18:13', '2019-02-24 02:18:13'),
(33, 3, '36bf180b6d5351e88e028081724a5251', 5, '2019-02-24 05:58:13', '2019-02-24 05:58:13'),
(34, 2, '1fa2515eaeddbcf037a896ed1e86d60d', 28, '2019-02-24 06:20:38', '2019-02-24 06:20:38'),
(35, 1, 'd1e448e49abe4329bf4133f2ab39a34b', 3, '2019-02-24 06:25:17', '2019-02-24 06:25:17'),
(36, 3, '369e6274666c41a2a8da56ae52709a42', 5, '2019-02-24 09:51:01', '2019-02-24 09:51:01'),
(37, 0, NULL, NULL, '2019-03-03 21:38:04', '2019-03-03 21:38:04'),
(38, 0, NULL, NULL, '2019-03-04 06:50:04', '2019-03-04 06:50:04'),
(39, 0, NULL, NULL, '2019-03-05 02:34:17', '2019-03-05 02:34:17'),
(40, 0, NULL, NULL, '2019-03-07 01:11:32', '2019-03-07 01:11:32'),
(41, 3, 'e452d0c5d1e4c074d9e6eb74eea07ff4', 5, '2019-03-07 03:06:35', '2019-03-07 03:06:35'),
(42, 3, 'bfe3a05585841ccd3e5d5de8805228c6', 5, '2019-03-07 03:29:43', '2019-03-07 03:29:43'),
(43, 3, '715ccf21ebedbe2f136081d5ccf8ea99', 5, '2019-03-08 04:38:06', '2019-03-08 04:38:06'),
(44, 3, '2aeaac5290b0c4fbdedcc2ae065cc016', 5, '2019-03-08 10:53:00', '2019-03-08 10:53:00'),
(45, 1, '828af3150332d0571482fabb4970b777', 3, '2019-03-10 10:09:32', '2019-03-10 10:09:32'),
(46, 0, NULL, NULL, '2019-03-10 20:41:19', '2019-03-10 20:41:19'),
(47, 2, 'd7bdf7f03ad1dcf4dde57dd3cba5dd9f', 30, '2019-03-10 21:15:23', '2019-03-10 21:15:23'),
(48, 0, NULL, NULL, '2019-03-10 21:32:42', '2019-03-10 21:32:42'),
(49, 2, 'b66cf314d3fcdbb8c83bcde1284cc2ba', 35, '2019-03-10 21:40:20', '2019-03-10 21:40:20'),
(50, 2, '655a736fac394baa14210e6adbe95384', 28, '2019-03-10 23:05:24', '2019-03-10 23:05:24'),
(51, 2, '68806819609d88f5c315d420a8d9278d', 28, '2019-03-11 00:04:34', '2019-03-11 00:04:34'),
(52, 0, NULL, NULL, '2019-03-11 02:52:29', '2019-03-11 02:52:29'),
(53, 2, '0c2264bf788ae2baa1cb69cbd8292751', 28, '2019-03-11 04:27:12', '2019-03-11 04:27:12'),
(54, 2, '7142afd8ea71364299effdab5ca46e4a', 35, '2019-03-11 06:05:40', '2019-03-11 06:05:40'),
(55, 2, '85444f354ac27b354a1230cc338bd164', 35, '2019-03-11 08:17:00', '2019-03-11 08:17:00'),
(56, 2, '04e59a8935e605284b475bad89a5edb5', 24, '2019-03-11 19:19:46', '2019-03-11 19:19:46'),
(57, 2, '45f1656e48cb3bc8a374bedb9893cbf4', 30, '2019-03-11 19:53:16', '2019-03-11 19:53:16');

-- --------------------------------------------------------

--
-- Table structure for table `billitems`
--

CREATE TABLE `billitems` (
  `id` int(11) NOT NULL,
  `prt` text,
  `rate` decimal(10,0) DEFAULT NULL,
  `qty` text,
  `fee_id` int(11) DEFAULT NULL,
  `bill_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billitems`
--

INSERT INTO `billitems` (`id`, `prt`, `rate`, `qty`, `fee_id`, `bill_id`, `created_at`, `updated_at`) VALUES
(1, 'Tuition Fee ', '1000', '0', 2, 12, '2019-02-22 03:40:24', '2019-02-22 03:40:24'),
(2, 'Tuition Fee ', '1000', '1', 2, 12, '2019-02-22 03:40:24', '2019-02-22 03:40:24'),
(3, 'Coaching Fees', '10000', '6', 3, 13, '2019-02-22 06:36:22', '2019-02-22 06:36:22'),
(4, 'Coaching Fees', '10000', '6', 3, 14, '2019-02-22 06:37:26', '2019-02-22 06:37:26'),
(5, 'Coaching Fees', '10000', '5', 3, 14, '2019-02-22 06:37:26', '2019-02-22 06:37:26'),
(6, 'Coaching Fees', '10000', '6', 3, 15, '2019-02-22 06:37:30', '2019-02-22 06:37:30'),
(7, 'Coaching Fees', '10000', '5', 3, 15, '2019-02-22 06:37:30', '2019-02-22 06:37:30'),
(8, 'Coaching Fees', '10000', '6', 3, 16, '2019-02-22 06:38:46', '2019-02-22 06:38:46'),
(9, 'Coaching Fees', '10000', '5', 3, 16, '2019-02-22 06:38:47', '2019-02-22 06:38:47'),
(10, 'Coaching Fees', '10000', '6', 3, 17, '2019-02-22 06:38:50', '2019-02-22 06:38:50'),
(11, 'Coaching Fees', '10000', '5', 3, 17, '2019-02-22 06:38:50', '2019-02-22 06:38:50'),
(12, 'Coaching Fees', '10000', '6', 3, 18, '2019-02-22 06:38:53', '2019-02-22 06:38:53'),
(13, 'Coaching Fees', '10000', '5', 3, 18, '2019-02-22 06:38:53', '2019-02-22 06:38:53'),
(14, 'nepali ', '50000', '8', 6, 19, '2019-02-22 06:40:46', '2019-02-22 06:40:46'),
(15, 'fee1', '4200', '12', 8, 20, '2019-03-11 00:18:14', '2019-03-11 00:18:14');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `total` decimal(10,0) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `level_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `date`, `total`, `student_id`, `level_id`, `created_at`, `updated_at`) VALUES
(1, '2019-02-22', NULL, 6, 2, '2019-02-22 03:29:28', '2019-02-22 03:29:28'),
(2, '2019-02-22', NULL, 6, 2, '2019-02-22 03:29:30', '2019-02-22 03:29:30'),
(3, '2019-02-22', NULL, 6, 2, '2019-02-22 03:29:30', '2019-02-22 03:29:30'),
(4, '2019-02-22', NULL, 6, 2, '2019-02-22 03:29:31', '2019-02-22 03:29:31'),
(5, '2019-02-22', NULL, 6, 2, '2019-02-22 03:29:31', '2019-02-22 03:29:31'),
(6, '2019-02-22', NULL, 6, 2, '2019-02-22 03:30:33', '2019-02-22 03:30:33'),
(7, '2019-02-22', NULL, 6, 2, '2019-02-22 03:32:36', '2019-02-22 03:32:36'),
(8, '2019-02-22', NULL, 2, 1, '2019-02-22 03:34:25', '2019-02-22 03:34:25'),
(9, '2019-02-22', NULL, 2, 1, '2019-02-22 03:35:46', '2019-02-22 03:35:46'),
(10, '2019-02-22', NULL, 2, 1, '2019-02-22 03:37:19', '2019-02-22 03:37:19'),
(11, '2019-02-22', NULL, 2, 4, '2019-02-22 03:38:33', '2019-02-22 03:38:33'),
(12, '2019-02-22', NULL, 2, 4, '2019-02-22 03:40:24', '2019-02-22 03:40:24'),
(13, '2019-02-22', NULL, 2, 6, '2019-02-22 06:36:22', '2019-02-22 06:36:22'),
(14, '2019-02-22', NULL, 2, 6, '2019-02-22 06:37:26', '2019-02-22 06:37:26'),
(15, '2019-02-22', NULL, 2, 6, '2019-02-22 06:37:30', '2019-02-22 06:37:30'),
(16, '2019-02-22', NULL, 2, 6, '2019-02-22 06:38:46', '2019-02-22 06:38:46'),
(17, '2019-02-22', NULL, 2, 6, '2019-02-22 06:38:50', '2019-02-22 06:38:50'),
(18, '2019-02-22', NULL, 2, 6, '2019-02-22 06:38:53', '2019-02-22 06:38:53'),
(19, '2019-02-22', NULL, 5, 6, '2019-02-22 06:40:45', '2019-02-22 06:40:45'),
(20, '2019-03-11', NULL, 2, 2, '2019-03-11 00:18:14', '2019-03-11 00:18:14');

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

CREATE TABLE `classrooms` (
  `id` int(11) NOT NULL,
  `level_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `section` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`id`, `level_id`, `created_at`, `updated_at`, `section`) VALUES
(3, 2, '2018-11-20 09:35:29', '2018-11-20 09:35:29', 'C'),
(4, 1, '2018-10-31 08:52:44', '2018-10-31 08:52:44', 'A'),
(5, 1, '2018-10-31 08:52:57', '2018-10-31 08:52:57', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `firstname` text,
  `lastname` text,
  `email` text,
  `phone` varchar(15) DEFAULT NULL,
  `message` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `address` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `firstname`, `lastname`, `email`, `phone`, `message`, `created_at`, `updated_at`, `address`) VALUES
(1, 'Gopal', 'Ghimire', 'abcd@gmail.com', '9819356415', 'kjkjhkjsf', '2019-01-09 01:14:36', '2019-01-09 01:14:36', NULL),
(2, 'Gopal', 'Ghimire', 'gopal.ghimire332@gmail.com', '9819356415', 'hello, i want to admission my child on your schools so that \r\ndfdjfdfo dfidf l fdso ho e go your your jdjdjd ', '2019-01-09 01:20:00', '2019-01-09 01:20:00', NULL),
(3, 'Sagaar ', 'Sitaulo', 'cms1100@gmail.com', '9819356415', 'hey men whats up ?', '2019-01-09 05:56:27', '2019-01-09 05:56:27', 'Biratnagar'),
(4, 'Sagaar ', 'Sitaulo', 'chhatramanshreshta@outlook.com', '9819356415', 'Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services', '2019-01-09 06:06:03', '2019-01-09 06:06:03', 'Biratnagar');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` text,
  `description` text,
  `eventtime` text,
  `eventdate` date DEFAULT NULL,
  `adress` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `photo` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `eventtime`, `eventdate`, `adress`, `created_at`, `updated_at`, `photo`) VALUES
(11, 'Microsoft Corporation is an American multinational', '                                Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services.\r\n            \r\n            ', '08:27:00', '2019-03-04', 'Biratnagar', '2019-03-04 15:28:27', '2019-03-04 10:43:27', 'assets/img/event\\landing.png'),
(12, 'Microsoft Corporation is an American multinational', '                Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services. Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services.  Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services. Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services.\r\n            ', '21:20:00', '2023-04-01', 'Biratnagar', '2019-03-04 15:37:53', '2019-03-04 10:52:53', 'assets/img/event\\classpad-banner2.jpg'),
(13, 'Welcome and Farewell Program ', '                Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services. Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services. Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services.\r\n            ', '21:37:00', '2015-02-04', 'Biratnagar', '2019-03-04 15:58:20', '2019-03-04 11:13:20', 'assets/img/event\\6ef537efd40e70ea1bf2d9b60417301d.jpg'),
(14, 'Welcome and Farewell Program ', 'Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services. Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services. Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services.', '21:37:00', '1971-08-03', 'Biratnagar', '2019-03-04 11:09:26', '2019-03-04 11:09:26', 'assets/img/event\\6ef537efd40e70ea1bf2d9b60417301d.jpg'),
(16, 'Microsoft Corporation is an American multinational', 'it is the test of news fields', '10:00:00', '2019-03-05', 'Biratnagar', '2019-03-05 02:38:21', '2019-03-05 02:38:21', 'assets/img/event\\IMG_20181209_132015.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `examclasses`
--

CREATE TABLE `examclasses` (
  `id` int(11) NOT NULL,
  `level_id` int(11) DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examclasses`
--

INSERT INTO `examclasses` (`id`, `level_id`, `exam_id`, `created_at`, `updated_at`) VALUES
(11, 1, 1, '2018-11-02 11:21:07', '2018-11-02 11:21:07'),
(12, 2, 1, '2018-11-02 14:35:55', '2018-11-02 14:35:55'),
(13, 1, 2, '2018-11-26 04:11:47', '2018-11-26 04:11:47'),
(14, 2, 2, '2019-02-07 04:17:57', '2019-02-07 04:17:57'),
(15, 4, 3, '2019-02-23 02:38:50', '2019-02-23 02:38:50');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `name` text,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `name`, `startdate`, `enddate`, `created_at`, `updated_at`) VALUES
(1, 'First Terminal Exam', '2018-11-01', '2018-11-12', '2018-10-31 19:19:20', '2018-10-31 19:19:20'),
(2, 'second terminal exam', '2018-11-26', '2018-12-26', '2018-11-26 04:11:15', '2018-11-26 04:11:15'),
(3, 'final examination ', '2019-02-07', '2019-02-12', '2019-02-07 04:26:56', '2019-02-07 04:26:56');

-- --------------------------------------------------------

--
-- Table structure for table `examsubjects`
--

CREATE TABLE `examsubjects` (
  `id` int(11) NOT NULL,
  `examclass_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `fullmarks` decimal(10,0) DEFAULT NULL,
  `passmarks` decimal(10,0) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examsubjects`
--

INSERT INTO `examsubjects` (`id`, `examclass_id`, `teacher_id`, `fullmarks`, `passmarks`, `created_at`, `updated_at`, `name`) VALUES
(1, 11, NULL, '100', '40', '2018-11-04 06:46:42', '2018-11-04 06:46:42', 'Math'),
(2, 11, NULL, '110', '40', '2018-11-03 04:13:05', '2018-11-03 04:13:05', 'Digital Logic'),
(5, 12, NULL, '150', '45', '2018-11-04 14:22:12', '2018-11-04 14:22:12', 'English'),
(6, 11, NULL, '10', '30', '2018-11-23 01:57:21', '2018-11-23 01:57:21', 'xvfdfd'),
(7, 12, NULL, '110', '40', '2018-11-23 02:12:07', '2018-11-23 02:12:07', 'Math'),
(8, 12, NULL, '100', '40', '2018-11-23 02:15:17', '2018-11-23 02:15:17', 'asdf'),
(9, 11, NULL, '100', '40', '2018-11-26 04:10:00', '2018-11-26 04:10:00', 'ddf'),
(10, 13, NULL, '125', '50', '2018-11-26 04:12:06', '2018-11-26 04:12:06', 'ddf'),
(11, 14, NULL, '60', '24', '2019-02-07 04:18:37', '2019-02-07 04:18:37', 'digital logic'),
(12, 14, NULL, '60', '24', '2019-02-07 04:29:23', '2019-02-07 04:29:23', 'webtechnology'),
(13, 15, NULL, '60', '24', '2019-02-23 02:47:40', '2019-02-23 02:47:40', 'Microprocessor ');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(11) NOT NULL,
  `title` text,
  `amount` decimal(10,0) DEFAULT NULL,
  `level_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `types` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `title`, `amount`, `level_id`, `created_at`, `updated_at`, `types`) VALUES
(2, 'Tuition Fee ', '1000', 4, '2018-11-24 07:07:27', '2018-11-24 07:07:27', 'Weekly'),
(3, 'Coaching Fees', '10000', 6, '2018-11-24 07:06:40', '2018-11-24 07:06:40', 'Half Yearly'),
(4, 'dddd', '5000', 3, '2018-11-25 05:37:07', '2018-11-25 05:37:07', 'Yearly'),
(5, 'fee1', '500', 4, '2018-11-25 05:36:33', '2018-11-25 05:36:33', 'Monthly'),
(6, 'nepali ', '50000', 6, '2018-11-24 07:02:53', '2018-11-24 07:02:53', 'Monthly'),
(7, 'fee1', '500', 1, '2018-11-25 05:35:02', '2018-11-25 05:35:02', 'Half Yearly'),
(8, 'fee1', '4200', 2, '2018-11-25 05:35:40', '2018-11-25 05:35:40', 'Half Yearly');

-- --------------------------------------------------------

--
-- Table structure for table `galaries`
--

CREATE TABLE `galaries` (
  `id` int(11) NOT NULL,
  `title` text,
  `description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galaries`
--

INSERT INTO `galaries` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'sunday party', 'adsfasdf adsfasdf as df asdf', '2018-10-30 21:40:56', '2018-10-30 21:40:56'),
(2, 'Teachers party', 'asdf sad f asf  sdfasdf', '2018-11-04 14:19:25', '2018-11-04 14:19:25'),
(3, 'test', 'fghjghgyyyu', '2019-02-22 06:28:28', '2019-02-22 06:28:28');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '1', '2018-10-30 14:01:39', '2018-10-30 14:01:39'),
(2, '2', '2018-11-23 14:39:00', '2018-11-23 14:39:00'),
(3, '3', '2018-11-23 14:38:44', '2018-11-23 14:38:44'),
(4, '4', '2018-11-23 14:39:16', '2018-11-23 14:39:16'),
(6, '5', '2018-11-23 14:47:55', '2018-11-23 14:47:55');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` text,
  `publisher` text,
  `published` date DEFAULT NULL,
  `news` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `photo` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `publisher`, `published`, `news`, `created_at`, `updated_at`, `photo`) VALUES
(3, 'à¤µà¤¿à¤°à¤¾à¤Ÿà¤¨à¤—à¤°à¤®à¤¾ à¤°à¥‹à¤¬à¥‹à¤Ÿà¤•à¥‹ à¤­à¤¿à¤¡à¤¨à¥à¤¤  ', 'Gopal Ghimire', '2000-02-07', '                                                kjkjjkjlkjlkjlkjkljkjklkljkljlkjlkjlljlkjlkkjlk\r\n            \r\n            \r\n            ', '2019-03-05 08:02:26', '2019-03-05 03:17:26', 'assets/img/news\\landing.png'),
(4, 'News test1', 'Gopal Ghimire', '2019-03-31', '                hello it is no things \r\n            ', '2019-03-05 07:59:55', '2019-03-05 03:14:55', 'assets/img/news\\IMG_20181209_132015.jpg'),
(5, 'Microsoft Corporation is an American multinational', 'Gopal Ghimire', '2019-03-05', '                Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services.\r\n            ', '2019-03-05 07:59:14', '2019-03-05 03:14:14', 'assets/img/news\\photo-1536084577616-ea0e7911a977.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `title` text,
  `description` text,
  `file` text,
  `level_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `filename` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `title`, `description`, `file`, `level_id`, `created_at`, `updated_at`, `filename`) VALUES
(10, 'Micro syllabus ', 'lkdvnskjvsdjkvnskjnv', 'asset/notes\\1. Introduction 2. .NET Basics 3. C# Basics 4. Code Elements 5. Organization 6. GUI 7. Demo 8.pdf', 1, '2018-11-24 08:22:05', '2018-11-24 08:22:05', '1. Introduction 2. .NET Basics 3. C# Basics 4. Code Elements 5. Organization 6. GUI 7. Demo 8.pdf'),
(11, 'One Indian Girl', 'dssdjkfhdsjkfhsdkjh', 'asset/notes\\One_Indian_Girl_-_Chetan_Bhagat-Redicals.pdf', 4, '2018-11-24 08:10:27', '2018-11-24 08:10:27', 'One_Indian_Girl_-_Chetan_Bhagat-Redicals.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(11) NOT NULL,
  `title` text,
  `publisher` text,
  `published` date DEFAULT NULL,
  `description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `title`, `publisher`, `published`, `description`, `created_at`, `updated_at`) VALUES
(1, 'First Exam Notice', 'Gopal ghimire', '2018-11-09', 'This Free Responsive Template for Schools is fully responsive and retina ready. Built with HTML5 and CSS3, the modern scholastic style is designed to feature your school\'s most important features and values. This Free Responsive Template for Schools is fully responsive and retina ready. Built with HTML5 and CSS3, the modern scholastic style is designed to feature your school\'s most important features and values.', '2018-11-05 20:35:11', '2018-11-05 20:35:11'),
(2, 'Second Notice', 'Gopal ghimire', '2018-11-12', 'This Free Responsive Template for Schools is fully responsive and retina ready. Built with HTML5 and CSS3, the modern scholastic style is designed to feature your school\'s most important features and values. This Free Responsive Template for Schools is fully responsive and retina ready. Built with HTML5 and CSS3, the modern scholastic style is designed to feature your school\'s most important features and values.', '2018-11-05 20:36:52', '2018-11-05 20:36:52'),
(3, 'dffd', 'ttete ddg', '2019-03-05', '          This Free Responsive Template for Schools is fully responsive and retina ready. Built with HTML5 and CSS3, the modern scholastic style is designed to feature your school\'s most important features and values. This Free Responsive Template for Schools is fully responsive and retina ready. Built with HTML5 and CSS3, the modern scholastic style is designed to feature your school\'s most important features and values.\r\n            ', '2019-03-05 10:39:24', '2019-03-05 05:54:24'),
(4, 'Test notice for you ', 'Gopal Ghimire', '2019-02-11', 'This Free Responsive Template for Schools is fully responsive and retina ready. Built with HTML5 and CSS3, the modern scholastic style is designed to feature your school\'s most important ', '2019-03-05 05:42:25', '2019-03-05 05:42:25'),
(5, 'à¤µà¤¿à¤°à¤¾à¤Ÿà¤¨à¤—à¤°à¤®à¤¾ à¤°à¥‹à¤¬à¥‹à¤Ÿà¤•à¥‹ à¤­à¤¿à¤¡à¤¨à¥à¤¤  ', 'Gopal Ghimire', '2019-03-05', 'This Free Responsive Template for Schools is fully responsive and retina ready. Built with HTML5 and CSS3, the modern scholastic style is designed to feature your school\'s most important ', '2019-03-05 05:45:58', '2019-03-05 05:45:58'),
(6, 'à¤µà¥‹à¤²à¥à¤­à¥à¤¸à¤®à¤¾à¤¥à¤¿ à¤®à¥à¤¯à¤¾à¤¨à¤šà¥‡à¤·à¥à¤Ÿà¤° à¤¸à¤¿à¤Ÿà¥€à¤•à¥‹', 'Gopal Ghimire', '2019-03-05', '                This Free Responsive Template for Schools is fully responsive and retina ready. Built with HTML5 and CSS3, the modern scholastic style is designed to feature your school\'s most important \r\n            ', '2019-03-05 10:34:17', '2019-03-05 05:49:17'),
(7, 'à¤µà¤¿à¤°à¤¾à¤Ÿà¤¨à¤—à¤°à¤®à¤¾ à¤°à¥‹à¤¬à¥‹à¤Ÿà¤•à¥‹ à¤­à¤¿à¤¡à¤¨à¥à¤¤ 2', 'Gopal Ghimire', '2019-03-05', 'This Free Responsive Template for Schools is fully responsive and retina ready. Built with HTML5 and CSS3, the modern scholastic style is designed to feature your school\'s most important features and values. This Free Responsive Template for Schools is fully responsive and retina ready. Built with HTML5 and CSS3, the modern scholastic style is designed to feature your school\'s most important features and values.', '2019-03-05 05:56:41', '2019-03-05 05:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `galary_id` int(11) DEFAULT NULL,
  `filepath` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `galary_id`, `filepath`, `created_at`, `updated_at`) VALUES
(23, 1, 'assets/img/galary/39861870_442253432929688_2152747886335492096_n.jpg', '2018-10-31 07:46:53', '2018-10-31 07:46:53'),
(24, 1, 'assets/img/galary/33488300_987056931452656_1438744053372944384_n.jpg', '2018-10-31 07:47:22', '2018-10-31 07:47:22'),
(25, 1, 'assets/img/galary/363.jpg', '2018-11-04 06:39:53', '2018-11-04 06:39:53'),
(26, 1, 'assets/img/galary/36396821_1819852314746945_8774044820478885888_n.jpg', '2018-11-04 06:39:54', '2018-11-04 06:39:54'),
(27, 1, 'assets/img/galary/36590282_880639882129206_2202509051009433600_n.jpg', '2018-11-04 06:39:54', '2018-11-04 06:39:54'),
(28, 1, 'assets/img/galary/37310284_425798527924721_3763148846088060928_n.jpg', '2018-11-04 06:39:54', '2018-11-04 06:39:54'),
(30, 2, 'assets/img/galary/57b289e7a8ca3_thumb900.jpg', '2018-11-04 14:20:01', '2018-11-04 14:20:01'),
(31, 2, 'assets/img/galary/363.jpg', '2018-11-04 14:20:01', '2018-11-04 14:20:01'),
(32, 2, 'assets/img/galary/36396821_1819852314746945_8774044820478885888_n.jpg', '2018-11-04 14:20:02', '2018-11-04 14:20:02'),
(33, 2, 'assets/img/galary/36590282_880639882129206_2202509051009433600_n.jpg', '2018-11-04 14:20:03', '2018-11-04 14:20:03'),
(34, 3, 'assets/img/galary/banner1.jpg', '2019-02-23 01:03:43', '2019-02-23 01:03:43'),
(35, 3, 'assets/img/galary/1534391142_5.jpg', '2019-02-23 01:04:21', '2019-02-23 01:04:21'),
(36, 3, 'assets/img/galary/banner1.jpg', '2019-02-23 01:04:22', '2019-02-23 01:04:22'),
(37, 3, 'assets/img/galary/efef34f7-f8c4-4e4c-a7e0-2c311a3dda30.jpg', '2019-02-23 01:04:22', '2019-02-23 01:04:22'),
(38, 3, 'assets/img/galary/getSchoolPicture.jpg', '2019-02-23 01:04:22', '2019-02-23 01:04:22');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `examsubject_id` int(11) DEFAULT NULL,
  `mark` decimal(10,0) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `student_id`, `examsubject_id`, `mark`, `created_at`, `updated_at`) VALUES
(3, 5, 1, '80', '2018-11-04 06:25:38', '2018-11-04 06:25:38'),
(4, 6, 1, '55', '2018-11-04 06:25:38', '2018-11-04 06:25:38'),
(5, 7, 1, '60', '2018-11-04 06:25:38', '2018-11-04 06:25:38'),
(6, 8, 1, '55', '2018-11-04 06:25:38', '2018-11-04 06:25:38'),
(7, 9, 1, '89', '2018-11-04 06:25:38', '2018-11-04 06:25:38'),
(8, 2, 5, '10', '2018-11-23 02:15:54', '2018-11-23 02:15:54'),
(10, 10, 1, '15', '2018-11-23 06:21:19', '2018-11-23 06:21:19'),
(11, 5, 2, '45', '2018-11-26 04:09:09', '2018-11-26 04:09:09'),
(12, 6, 2, '0', '2018-11-26 04:09:09', '2018-11-26 04:09:09'),
(13, 7, 2, '0', '2018-11-26 04:09:09', '2018-11-26 04:09:09'),
(14, 8, 2, '0', '2018-11-26 04:09:09', '2018-11-26 04:09:09'),
(15, 9, 2, '0', '2018-11-26 04:09:09', '2018-11-26 04:09:09'),
(16, 10, 2, '0', '2018-11-26 04:09:09', '2018-11-26 04:09:09'),
(17, 5, 9, '89', '2018-11-26 04:10:21', '2018-11-26 04:10:21'),
(18, 6, 9, '0', '2018-11-26 04:10:21', '2018-11-26 04:10:21'),
(19, 7, 9, '0', '2018-11-26 04:10:21', '2018-11-26 04:10:21'),
(20, 8, 9, '0', '2018-11-26 04:10:21', '2018-11-26 04:10:21'),
(21, 9, 9, '0', '2018-11-26 04:10:21', '2018-11-26 04:10:21'),
(22, 10, 9, '0', '2018-11-26 04:10:21', '2018-11-26 04:10:21'),
(23, 5, 10, '78', '2018-11-26 04:12:18', '2018-11-26 04:12:18'),
(24, 6, 10, '133', '2019-02-07 09:01:39', '2019-02-07 04:16:39'),
(25, 7, 10, '0', '2018-11-26 10:40:01', '2018-11-26 10:40:01'),
(26, 8, 10, '0', '2018-11-26 10:40:01', '2018-11-26 10:40:01'),
(27, 9, 10, '0', '2018-11-26 10:40:01', '2018-11-26 10:40:01'),
(28, 10, 10, '0', '2018-11-26 10:40:02', '2018-11-26 10:40:02'),
(29, 2, 11, '60', '2019-02-07 04:27:57', '2019-02-07 04:27:57');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `image` text,
  `link` text,
  `caption` text,
  `subcaption` text,
  `button` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `link`, `caption`, `subcaption`, `button`, `created_at`, `updated_at`) VALUES
(2, 'assets/img/slider/6ef537efd40e70ea1bf2d9b60417301d.jpg', '', 'Welcome to your company', 'heello whats up man good to see you', 'See More', '2019-03-04 13:51:00', '2019-03-04 09:06:00'),
(3, 'assets/img/slider/1534391092_3.jpg', '', 'Welcome to your company', 'hello', 'See More', '2019-03-04 13:51:16', '2019-03-04 09:06:16');

-- --------------------------------------------------------

--
-- Table structure for table `studentinboxes`
--

CREATE TABLE `studentinboxes` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `message` text,
  `hasread` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentparentinboxes`
--

CREATE TABLE `studentparentinboxes` (
  `id` int(11) NOT NULL,
  `studentparent_id` int(11) DEFAULT NULL,
  `message` text,
  `hasread` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentparents`
--

CREATE TABLE `studentparents` (
  `id` int(11) NOT NULL,
  `name` text,
  `adress` text,
  `phone` varchar(15) DEFAULT NULL,
  `password` text,
  `email` text,
  `isarchived` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `photo` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentparents`
--

INSERT INTO `studentparents` (`id`, `name`, `adress`, `phone`, `password`, `email`, `isarchived`, `created_at`, `updated_at`, `photo`) VALUES
(24, 'Gopal ghimire', 'Biratnagar', '9819356415', '8b1a9953c4611296a827abf8c47804d7', 'abcd@gmail.com', NULL, '2019-03-11 18:32:25', '2018-10-31 15:54:56', NULL),
(25, 'Gopal ghimire', 'Biratnagar', '9819356415', 'd935b1ca595a1e60af20a399f833a61b', 'abcd@gmail.com', NULL, '2018-10-31 15:54:57', '2018-10-31 15:54:57', NULL),
(26, 'chhatra man', 'ktm', '9800916365', '3bde5f8767d73339037c4f1ded4d1bdb', 'abxyzcd@gmail.com', NULL, '2018-10-31 15:55:19', '2018-10-31 15:55:19', NULL),
(27, 'barmaraj rai', 'Biratnagar', '980000000', '65eee3d2c324769f5e7a9e5044135596', 'abcd123@gmail.com', NULL, '2018-10-31 18:58:31', '2018-10-31 18:58:31', NULL),
(28, 'Gopal1 ghimire', 'Biratnagar', '9819356415', 'c44a471bd78cc6c2fea32b9fe028d30a', 'abcd@gmail.com', NULL, '2019-03-11 04:52:29', '2019-03-11 00:07:29', NULL),
(29, 'sanjeev chamling', 'Biratnagar', '9816356415', '65eee3d2c324769f5e7a9e5044135596', 'abcd@gmail.com', NULL, '2018-11-04 06:07:35', '2018-11-04 06:07:35', NULL),
(30, 'sanjeev chamling', 'damak', '9814256545', '8b1a9953c4611296a827abf8c47804d7', 'chamling@sanjeev.com', NULL, '2019-03-12 00:36:16', '2018-11-04 06:10:07', NULL),
(31, 'chhatra man', 'brt', '9819356415', '65eee3d2c324769f5e7a9e5044135596', 'cms1100@gmail.com', NULL, '2018-11-04 06:21:37', '2018-11-04 06:21:37', NULL),
(32, 'sanjeev chamling', 'Rajbiraj', '9819356415', '65eee3d2c324769f5e7a9e5044135596', 'abcd@gmail.com', NULL, '2018-11-04 06:23:30', '2018-11-04 06:23:30', NULL),
(33, 'something', 'something', '98000000', '65eee3d2c324769f5e7a9e5044135596', 'something@something.com', NULL, '2018-11-04 14:17:11', '2018-11-04 14:17:11', NULL),
(34, 'Gopal ghimire', 'Biratnagar', '9819356415', '65eee3d2c324769f5e7a9e5044135596', 'abcd@gmail.com', NULL, '2018-11-20 09:17:54', '2018-11-20 09:17:54', NULL),
(35, 'kumar rai', 'Biratnagar', '9842334553', '65eee3d2c324769f5e7a9e5044135596', 'kumar@gmail.com', NULL, '2019-03-10 21:35:18', '2019-03-10 21:35:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` text,
  `level_id` int(11) DEFAULT NULL,
  `classroom_id` int(11) DEFAULT NULL,
  `studentparent_id` int(11) DEFAULT NULL,
  `roll` varchar(10) DEFAULT NULL,
  `adress` text,
  `email` text,
  `password` text,
  `isarchived` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `phone` varchar(15) DEFAULT NULL,
  `photo` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `level_id`, `classroom_id`, `studentparent_id`, `roll`, `adress`, `email`, `password`, `isarchived`, `created_at`, `updated_at`, `phone`, `photo`) VALUES
(2, 'chhatraman shrestha', 2, 3, 24, '10', 'Biratnagar', 'abcd11@gmail.com', NULL, 0, '2018-11-04 13:20:24', '2018-11-04 13:20:24', '9819356415', NULL),
(5, 'sanjeev chamling', 1, 4, 27, '11', 'Biratnagar', 'chamling@sanjeev.com', '44791b9470db00717475cd6aff88f42e', 0, '2019-03-11 07:38:52', '2019-03-11 02:53:52', '9819356419', NULL),
(6, 'Hari parsad', 1, 3, 29, '5', 'Biratnagar', 'abcd@gmail.com', '44791b9470db00717475cd6aff88f42e', 0, '2018-11-04 06:08:06', '2018-11-04 06:08:06', '9819356415', NULL),
(7, 'Ram parsad', 1, 3, 30, '9', 'damak', 'chamling@sanjeev.com', '44791b9470db00717475cd6aff88f42e', 0, '2018-11-04 06:10:28', '2018-11-04 06:10:28', '9819356415', NULL),
(8, 'Reema', 1, 3, 31, '2', 'brt', 'cms1100@gmail.com', '44791b9470db00717475cd6aff88f42e', 0, '2018-11-04 06:22:12', '2018-11-04 06:22:12', '9819356415', NULL),
(9, 'sagar sitaula', 1, 3, 32, '3', 'Rajbiraj', 'abcd@gmail.com', '44791b9470db00717475cd6aff88f42e', 0, '2018-11-04 06:24:03', '2018-11-04 06:24:03', '9819356415', NULL),
(10, 'dipesh chettry', 1, 4, 33, '1', 'biratnagar', 'asdfa@asdfas.com', '44791b9470db00717475cd6aff88f42e', 0, '2018-11-04 14:17:32', '2018-11-04 14:17:32', '9888888888', NULL),
(11, 'chhatra man', 4, 4, 34, '9', 'damak', 'cms1100@gmail.com', '44791b9470db00717475cd6aff88f42e', 0, '2018-11-20 09:22:58', '2018-11-20 09:22:58', '9819356415', NULL),
(12, 'PRAKASH SHRESTHA', 2, 3, 35, '12', 'Biratnagar', 'prakash@gmail.com', '44791b9470db00717475cd6aff88f42e', 0, '2019-03-11 02:20:53', '2019-03-10 21:35:53', '9819356414', NULL),
(13, 'teria magar', 1, 3, 35, '34', 'Biratnagar', 'teria@gmail.com', '44791b9470db00717475cd6aff88f42e', 0, '2019-03-11 02:22:29', '2019-03-10 21:37:29', '9819356433', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `level_id` int(11) DEFAULT NULL,
  `name` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` text,
  `adress` text,
  `phone` varchar(15) DEFAULT NULL,
  `education` text,
  `photo` text,
  `email` text,
  `description` text,
  `password` text,
  `isarchived` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fb` text,
  `twitter` text,
  `linkedin` text,
  `skype` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `adress`, `phone`, `education`, `photo`, `email`, `description`, `password`, `isarchived`, `created_at`, `updated_at`, `fb`, `twitter`, `linkedin`, `skype`) VALUES
(2, 'Gopal ghimire', 'damak', '9819356415', 'Bachelor In BCA', 'assets/img/teacher\\photo_2019-02-14_23-34-45.jpg', 'abcd@gmail.com', 'i am the teacher Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related servicesMicrosoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related servicesMicrosoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related servicesMicrosoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services', '46040c38d1cbe8ffcd3df6c8ba787951', NULL, '2019-03-07 06:15:07', '2019-03-07 01:30:07', NULL, NULL, NULL, NULL),
(3, 'Luis Paschar Ghimire', 'Biratnagar', '9819356415', 'Bachelor In BIT', 'assets/img/teacher\\25299818_1198489740251316_2284877756196366522_o.jpg', 'abcd@gmail.com', 'Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related servicesMicrosoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services', 'dbd78530ac8bfb2ed4bf0aa8039e4fec', NULL, '2019-03-07 06:14:40', '2019-03-07 01:29:40', NULL, NULL, NULL, NULL),
(4, 'Sanjeev Chamling', 'Biratnagar', '9819356415', 'Bachelor In BCA', 'assets/img/teacher\\29060324_1659812920779450_2937108269001824723_o.jpg', 'cms1100@gmail.com', 'Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related servicesMicrosoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related servicesMicrosoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related servicesMicrosoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services', 'dbd78530ac8bfb2ed4bf0aa8039e4fec', NULL, '2019-03-07 06:14:00', '2019-03-07 01:29:00', NULL, NULL, NULL, NULL),
(5, 'Chhatraman Shrestha', 'Biratnagar', '9819356415', 'Bachelor In BIT', 'assets/img/teacher\\photo_2019-02-15_12-49-18.jpg', 'cms1100@gmail.com', 'Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related servicesMicrosoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services. Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services', 'dbd78530ac8bfb2ed4bf0aa8039e4fec', NULL, '2019-03-07 06:13:16', '2019-03-07 01:28:16', NULL, NULL, NULL, NULL),
(6, 'Nabin Bhattarai', 'Biratnagar', '9819356418', 'Bachelor In BIT', 'assets/img/teacher\\mypic.png', 'abcd@gmail.com', 'Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related servicesMicrosoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services', 'dbd78530ac8bfb2ed4bf0aa8039e4fec', NULL, '2019-03-07 01:32:01', '2019-03-07 01:32:01', NULL, NULL, NULL, NULL),
(7, 'Krishna Kumar Rai', 'Biratnagar', '9819356855', 'Bachelor In BCA', 'assets/img/teacher\\photo_2019-02-15_12-51-42.jpg', 'abcd@gmail.com', 'Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related servicesMicrosoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services', 'dbd78530ac8bfb2ed4bf0aa8039e4fec', NULL, '2019-03-07 01:34:09', '2019-03-07 01:34:09', NULL, NULL, NULL, NULL),
(8, 'Bishnu Bhurtel', 'Biratnagar', '9819356990', 'Masters In MBS', 'assets/img/teacher\\15894294_1293051710738130_17590317664816289_n.jpg', 'abcd@gmail.com', 'Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related servicesMicrosoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services', 'dbd78530ac8bfb2ed4bf0aa8039e4fec', NULL, '2019-03-07 01:35:33', '2019-03-07 01:35:33', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academiccalendars`
--
ALTER TABLE `academiccalendars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_id` (`level_id`),
  ADD KEY `classroom_id` (`classroom_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `level_id` (`level_id`),
  ADD KEY `classroom_id` (`classroom_id`);

--
-- Indexes for table `auths`
--
ALTER TABLE `auths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billitems`
--
ALTER TABLE `billitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fee_id` (`fee_id`),
  ADD KEY `bill_id` (`bill_id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `level_id` (`level_id`);

--
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_id` (`level_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examclasses`
--
ALTER TABLE `examclasses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_id` (`level_id`),
  ADD KEY `exam_id` (`exam_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examsubjects`
--
ALTER TABLE `examsubjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `examclass_id` (`examclass_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_id` (`level_id`);

--
-- Indexes for table `galaries`
--
ALTER TABLE `galaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_id` (`level_id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galary_id` (`galary_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `examsubject_id` (`examsubject_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentinboxes`
--
ALTER TABLE `studentinboxes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `studentparentinboxes`
--
ALTER TABLE `studentparentinboxes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentparent_id` (`studentparent_id`);

--
-- Indexes for table `studentparents`
--
ALTER TABLE `studentparents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_id` (`level_id`),
  ADD KEY `classroom_id` (`classroom_id`),
  ADD KEY `studentparent_id` (`studentparent_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_id` (`level_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academiccalendars`
--
ALTER TABLE `academiccalendars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT for table `auths`
--
ALTER TABLE `auths`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `billitems`
--
ALTER TABLE `billitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `examclasses`
--
ALTER TABLE `examclasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `examsubjects`
--
ALTER TABLE `examsubjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `galaries`
--
ALTER TABLE `galaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `studentinboxes`
--
ALTER TABLE `studentinboxes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `studentparentinboxes`
--
ALTER TABLE `studentparentinboxes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `studentparents`
--
ALTER TABLE `studentparents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `academiccalendars`
--
ALTER TABLE `academiccalendars`
  ADD CONSTRAINT `academiccalendars_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`),
  ADD CONSTRAINT `academiccalendars_ibfk_2` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`);

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `attendances_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `attendances_ibfk_3` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`),
  ADD CONSTRAINT `attendances_ibfk_4` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`);

--
-- Constraints for table `billitems`
--
ALTER TABLE `billitems`
  ADD CONSTRAINT `billitems_ibfk_1` FOREIGN KEY (`fee_id`) REFERENCES `fees` (`id`),
  ADD CONSTRAINT `billitems_ibfk_2` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`id`);

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `bills_ibfk_2` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`);

--
-- Constraints for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD CONSTRAINT `classrooms_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`);

--
-- Constraints for table `examclasses`
--
ALTER TABLE `examclasses`
  ADD CONSTRAINT `examclasses_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`),
  ADD CONSTRAINT `examclasses_ibfk_2` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`);

--
-- Constraints for table `examsubjects`
--
ALTER TABLE `examsubjects`
  ADD CONSTRAINT `examsubjects_ibfk_1` FOREIGN KEY (`examclass_id`) REFERENCES `examclasses` (`id`),
  ADD CONSTRAINT `examsubjects_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

--
-- Constraints for table `fees`
--
ALTER TABLE `fees`
  ADD CONSTRAINT `fees_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`);

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`);

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`galary_id`) REFERENCES `galaries` (`id`);

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`examsubject_id`) REFERENCES `examsubjects` (`id`);

--
-- Constraints for table `studentinboxes`
--
ALTER TABLE `studentinboxes`
  ADD CONSTRAINT `studentinboxes_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `studentparentinboxes`
--
ALTER TABLE `studentparentinboxes`
  ADD CONSTRAINT `studentparentinboxes_ibfk_1` FOREIGN KEY (`studentparent_id`) REFERENCES `studentparents` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`),
  ADD CONSTRAINT `students_ibfk_3` FOREIGN KEY (`studentparent_id`) REFERENCES `studentparents` (`id`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
