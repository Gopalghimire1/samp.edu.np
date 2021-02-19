-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2018 at 01:13 PM
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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `eventtime`, `eventdate`, `adress`, `created_at`, `updated_at`) VALUES
(2, 'sunday party', '                                Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services. Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services.\r\n            \r\n            ', '00:45:00', '2018-12-01', 'Biratnagar', '2018-11-05 19:04:46', '2018-11-05 19:04:46'),
(3, 'Daru khane din', '                                Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services. Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services.\r\n            \r\n            ', '00:45:00', '2018-11-12', 'Biratnagar', '2018-11-05 19:04:22', '2018-11-05 19:04:22'),
(4, 'Daru khane din', 'Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services.Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services.', '00:48:00', '2018-11-09', 'Biratnagar', '2018-11-05 19:04:02', '2018-11-05 19:04:02');

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
(12, 2, 1, '2018-11-02 14:35:55', '2018-11-02 14:35:55');

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
(1, 'First Terminal Exam', '2018-11-01', '2018-11-12', '2018-10-31 19:19:20', '2018-10-31 19:19:20');

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
(8, 12, NULL, '100', '40', '2018-11-23 02:15:17', '2018-11-23 02:15:17', 'asdf');

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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `title`, `amount`, `level_id`, `created_at`, `updated_at`) VALUES
(2, 'Tuition Fee ', '1000', 4, '2018-11-20 09:08:22', '2018-11-20 09:08:22'),
(3, 'Coaching Fees', '10000', 2, '2018-11-20 09:11:04', '2018-11-20 09:11:04');

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
(2, 'Teachers party', 'asdf sad f asf  sdfasdf', '2018-11-04 14:19:25', '2018-11-04 14:19:25');

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
(2, '3', '2018-10-30 14:23:10', '2018-10-30 14:23:10'),
(3, '4', '2018-11-19 13:38:06', '2018-11-19 13:38:06'),
(4, '5', '2018-11-19 13:38:29', '2018-11-19 13:38:29');

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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `publisher`, `published`, `news`, `created_at`, `updated_at`) VALUES
(1, 'Coming Sunday will happen most scary ? ', 'Gopal ghimire', '2018-11-05', 'something gone wrong more dangerous something gone wrong more dangerous something gone wrong more dangerous something gone wrong more dangerous something gone wrong more dangerous something gone wrong more dangerous ', '2018-11-05 16:52:23', '2018-11-05 16:52:23'),
(2, 'hot news coming now ', 'Gopal ghimire', '2018-11-05', 'its gone fu*k more hard just kidding naa its gone fu*k more hard just kidding naa its gone fu*k more hard just kidding naa its gone fu*k more hard just kidding naa its gone fu*k more hard just kidding naa its gone fu*k more hard just kidding naa ', '2018-11-05 16:54:40', '2018-11-05 16:54:40');

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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `title`, `description`, `file`, `level_id`, `created_at`, `updated_at`) VALUES
(2, 'Digital Logic', 'hellon men', 'License.pdf', 2, '2018-11-19 13:37:25', '2018-11-19 13:37:25'),
(3, 'Microprocessor ', 'hellos dis ', 'index.html', 3, '2018-11-19 13:41:46', '2018-11-19 13:41:46');

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
(3, 'dffd', 'ttete ddg', '2018-11-23', 'zdssdsfsdfdsfsdfds\r\ndfgd', '2018-11-23 06:22:04', '2018-11-23 06:22:04');

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
(33, 2, 'assets/img/galary/36590282_880639882129206_2202509051009433600_n.jpg', '2018-11-04 14:20:03', '2018-11-04 14:20:03');

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
(10, 10, 1, '15', '2018-11-23 06:21:19', '2018-11-23 06:21:19');

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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentparents`
--

INSERT INTO `studentparents` (`id`, `name`, `adress`, `phone`, `password`, `email`, `isarchived`, `created_at`, `updated_at`) VALUES
(24, 'Gopal ghimire', 'Biratnagar', '9819356415', 'd935b1ca595a1e60af20a399f833a61b', 'abcd@gmail.com', NULL, '2018-10-31 15:54:56', '2018-10-31 15:54:56'),
(25, 'Gopal ghimire', 'Biratnagar', '9819356415', 'd935b1ca595a1e60af20a399f833a61b', 'abcd@gmail.com', NULL, '2018-10-31 15:54:57', '2018-10-31 15:54:57'),
(26, 'chhatra man', 'ktm', '9800916365', '3bde5f8767d73339037c4f1ded4d1bdb', 'abxyzcd@gmail.com', NULL, '2018-10-31 15:55:19', '2018-10-31 15:55:19'),
(27, 'barmaraj rai', 'Biratnagar', '980000000', '65eee3d2c324769f5e7a9e5044135596', 'abcd123@gmail.com', NULL, '2018-10-31 18:58:31', '2018-10-31 18:58:31'),
(28, 'Gopal1 ghimire', 'Biratnagar', '9819356415', '65eee3d2c324769f5e7a9e5044135596', 'abcd@gmail.com', NULL, '2018-11-02 06:33:46', '2018-11-02 06:33:46'),
(29, 'sanjeev chamling', 'Biratnagar', '9816356415', '65eee3d2c324769f5e7a9e5044135596', 'abcd@gmail.com', NULL, '2018-11-04 06:07:35', '2018-11-04 06:07:35'),
(30, 'sanjeev chamling', 'damak', '9814256545', '65eee3d2c324769f5e7a9e5044135596', 'chamling@sanjeev.com', NULL, '2018-11-04 06:10:07', '2018-11-04 06:10:07'),
(31, 'chhatra man', 'brt', '9819356415', '65eee3d2c324769f5e7a9e5044135596', 'cms1100@gmail.com', NULL, '2018-11-04 06:21:37', '2018-11-04 06:21:37'),
(32, 'sanjeev chamling', 'Rajbiraj', '9819356415', '65eee3d2c324769f5e7a9e5044135596', 'abcd@gmail.com', NULL, '2018-11-04 06:23:30', '2018-11-04 06:23:30'),
(33, 'something', 'something', '98000000', '65eee3d2c324769f5e7a9e5044135596', 'something@something.com', NULL, '2018-11-04 14:17:11', '2018-11-04 14:17:11'),
(34, 'Gopal ghimire', 'Biratnagar', '9819356415', '65eee3d2c324769f5e7a9e5044135596', 'abcd@gmail.com', NULL, '2018-11-20 09:17:54', '2018-11-20 09:17:54');

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
  `phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `level_id`, `classroom_id`, `studentparent_id`, `roll`, `adress`, `email`, `password`, `isarchived`, `created_at`, `updated_at`, `phone`) VALUES
(2, 'chhatraman shrestha', 2, 3, 24, '10', 'Biratnagar', 'abcd11@gmail.com', NULL, 0, '2018-11-04 13:20:24', '2018-11-04 13:20:24', '9819356415'),
(5, 'sanjeev chamling', 1, 4, 27, '20', 'Biratnagar', 'chamling@sanjeev.com', '44791b9470db00717475cd6aff88f42e', 0, '2018-11-04 13:20:42', '2018-11-04 13:20:42', '9819356419'),
(6, 'Hari parsad', 1, 3, 29, '5', 'Biratnagar', 'abcd@gmail.com', '44791b9470db00717475cd6aff88f42e', 0, '2018-11-04 06:08:06', '2018-11-04 06:08:06', '9819356415'),
(7, 'Ram parsad', 1, 3, 30, '9', 'damak', 'chamling@sanjeev.com', '44791b9470db00717475cd6aff88f42e', 0, '2018-11-04 06:10:28', '2018-11-04 06:10:28', '9819356415'),
(8, 'Reema', 1, 3, 31, '2', 'brt', 'cms1100@gmail.com', '44791b9470db00717475cd6aff88f42e', 0, '2018-11-04 06:22:12', '2018-11-04 06:22:12', '9819356415'),
(9, 'sagar sitaula', 1, 3, 32, '3', 'Rajbiraj', 'abcd@gmail.com', '44791b9470db00717475cd6aff88f42e', 0, '2018-11-04 06:24:03', '2018-11-04 06:24:03', '9819356415'),
(10, 'dipesh chettry', 1, 4, 33, '1', 'biratnagar', 'asdfa@asdfas.com', '44791b9470db00717475cd6aff88f42e', 0, '2018-11-04 14:17:32', '2018-11-04 14:17:32', '9888888888'),
(11, 'chhatra man', 4, 4, 34, '9', 'damak', 'cms1100@gmail.com', '44791b9470db00717475cd6aff88f42e', 0, '2018-11-20 09:22:58', '2018-11-20 09:22:58', '9819356415');

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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `adress`, `phone`, `education`, `photo`, `email`, `description`, `password`, `isarchived`, `created_at`, `updated_at`) VALUES
(2, 'Gopal ghimire', 'damak', '9819356415', 'bachelor on BCA', 'assets/img/teacher\\gopal1.jpg', 'abcd@gmail.com', 'i am the teacher Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related servicesMicrosoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related servicesMicrosoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related servicesMicrosoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services', '46040c38d1cbe8ffcd3df6c8ba787951', NULL, '2018-11-06 14:33:29', '2018-11-06 14:33:29'),
(3, 'Suyog poudel', 'Biratnagar', '9819356415', 'bachelor on BCA', 'assets/img/teacher\\20151117_112758.jpg', 'abcd@gmail.com', 'Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related servicesMicrosoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services', 'dbd78530ac8bfb2ed4bf0aa8039e4fec', NULL, '2018-11-06 14:12:49', '2018-11-06 14:12:49'),
(4, 'Sanjeev Chamling', 'Biratnagar', '9819356415', 'bachelor on BCA', 'assets/img/teacher\\gopal.jpg', 'cms1100@gmail.com', 'Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related servicesMicrosoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related servicesMicrosoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related servicesMicrosoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services', 'dbd78530ac8bfb2ed4bf0aa8039e4fec', NULL, '2018-11-06 14:20:10', '2018-11-06 14:20:10'),
(5, 'Chhatra man', 'Biratnagar', '9819356415', 'bachelor on BIT', 'assets/img/teacher\\pooja-hegde-hot-bikini-images1.jpg', 'cms1100@gmail.com', 'Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related servicesMicrosoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services. Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and related services', 'dbd78530ac8bfb2ed4bf0aa8039e4fec', NULL, '2018-11-06 14:26:44', '2018-11-06 14:26:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_id` (`level_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `examclasses`
--
ALTER TABLE `examclasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `examsubjects`
--
ALTER TABLE `examsubjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `galaries`
--
ALTER TABLE `galaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

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
