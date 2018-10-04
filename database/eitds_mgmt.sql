-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 30, 2018 at 05:26 AM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eitds_mgmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

DROP TABLE IF EXISTS `devices`;
CREATE TABLE IF NOT EXISTS `devices` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `device_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `device_id` (`device_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `device_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'EITDS01', 'ENGAGE', '2018-07-08 23:45:26', '2018-07-19 10:51:58'),
(2, 'EITDS02', 'ENGAGE', '2018-07-09 04:20:05', '2018-07-20 08:37:50'),
(3, 'EITDS03', 'ENGAGE', '2018-07-09 04:20:12', '2018-07-24 05:29:56'),
(4, 'EITDS04', 'ENGAGE', '2018-07-09 04:20:20', '2018-07-23 11:51:57'),
(5, 'EITDS05', 'ENGAGE', '2018-07-09 04:20:28', '2018-07-20 08:47:00'),
(6, 'EITDS06', 'NOT ENGAGE', '2018-07-09 04:23:47', '2018-08-29 06:55:57'),
(11, 'EITDS08', 'NOT ENGAGE', '2018-07-10 10:33:17', '2018-07-24 05:29:56'),
(12, 'EITDS88', 'ENGAGE', '2018-07-13 06:37:30', '2018-07-24 05:41:56'),
(13, 'EITDS77', 'NOT ENGAGE', '2018-07-13 06:46:06', '2018-08-29 07:00:28'),
(14, 'EITDS99', 'ENGAGE', '2018-07-13 06:46:27', '2018-08-29 11:05:01'),
(15, 'yog001', 'NOT ENGAGE', NULL, NULL),
(16, 'yog002', 'NOT ENGAGE', NULL, NULL),
(17, 'yog003', 'NOT ENGAGE', NULL, NULL),
(18, 'yog004', 'NOT ENGAGE', NULL, NULL),
(19, 'yog005', 'NOT ENGAGE', NULL, NULL),
(22, 'EITDS100', 'ENGAGE', '2018-07-20 08:40:49', '2018-07-24 06:26:07');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_05_17_091141_create_users_table', 1),
(2, '2018_07_06_080228_create_devices_table', 2),
(3, '2018_07_09_054935_create_user_device_assoc', 3),
(5, '2018_07_10_044640_create_users_product_assoc_table', 4),
(6, '2018_07_10_163110_create_mode_table', 5),
(7, '2018_07_10_164756_create_statuses_table', 6),
(8, '2018_07_10_165042_create_test_cases_table', 6),
(9, '2018_07_11_125000_create_roles_table', 7),
(11, '2018_07_16_153018_create_pdf_settings_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `modes`
--

DROP TABLE IF EXISTS `modes`;
CREATE TABLE IF NOT EXISTS `modes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modes`
--

INSERT INTO `modes` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Timer Mode', NULL, NULL),
(2, 'Impact Mode', NULL, NULL),
(3, 'Timer & Impact Mode', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pdf_settings`
--

DROP TABLE IF EXISTS `pdf_settings`;
CREATE TABLE IF NOT EXISTS `pdf_settings` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_heading` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_heading` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pdf_settings`
--

INSERT INTO `pdf_settings` (`id`, `logo`, `header_heading`, `footer_heading`, `status`, `created_at`, `updated_at`) VALUES
(5, '1531740711.jpg', 'header', 'footer', 'INACTIVE', '2018-07-16 11:31:51', '2018-07-17 06:26:53'),
(6, '1531741226.jpg', 'header', 'footer', 'INACTIVE', '2018-07-16 11:40:26', '2018-07-17 06:26:53'),
(7, '1531741233.jpg', 'header', 'footer', 'INACTIVE', '2018-07-16 11:40:33', '2018-07-17 06:26:53'),
(8, '1531808812.jpg', 'EITDS Testing Report Format with EITDS Testing System', 'yogesh Jaiswal', 'ACTIVE', '2018-07-17 06:26:53', '2018-07-17 06:26:53');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Operator', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

DROP TABLE IF EXISTS `statuses`;
CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'OK', NULL, NULL),
(2, 'FAIL', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `test_cases`
--

DROP TABLE IF EXISTS `test_cases`;
CREATE TABLE IF NOT EXISTS `test_cases` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_cases`
--

INSERT INTO `test_cases` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Test case 1', NULL, NULL),
(2, 'Test case 2', NULL, NULL),
(3, 'Test case 3', NULL, NULL),
(4, 'Test case 4', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@syslogyx.com', '$2y$10$iYOcnNi0tYTv0YWH06OaducmL6sKEec9Op.29Y0vE6g4xtpmP5d2.', 1, NULL, NULL, '2018-07-20 07:11:43'),
(2, 'Operator', 'operator@syslogyx.com', '$2y$10$wLeW8yPL5z/DaF9VNVePNOxPRDLtfeAKnqJIJiRNVBkabPQ3xYhqS', 2, NULL, NULL, NULL),
(3, 'jaiswal', 'yogesh@syslogyx.com', '$2y$10$6FdEOMEVBRa4SDRxJrY1UuKCSsMQeLb5zKJjDgPr/1xHC/LDiX/Am', 1, NULL, '2018-07-06 01:37:09', '2018-07-10 07:13:28'),
(5, 'suchi', 'suchi@syslogyx.com', '$2y$10$slYRjkP20UclK.kJFqDbbOc58goBZoVoSCKiSNN33Gm1VHIVzPRFO', 2, NULL, '2018-07-06 02:17:43', '2018-07-10 07:14:16'),
(6, 'suchi123', 'suchi123@syslogyx.com', '$2y$10$.h5eQSl6/h99aq8qFcVAUOmgPOfUyA7BO0jw.7VrftaKkaRZPzS0G', 1, NULL, '2018-07-06 02:19:39', '2018-07-10 07:15:01'),
(7, 'sanket', 'sanket@syslogyx.com', '$2y$10$xBZrj56zQrEcl03Z6MCBh.bPNrOIrYLLOPKgnXsiI1ZaSx0Dt0mPS', 1, NULL, '2018-07-10 10:13:10', '2018-07-10 10:13:10'),
(9, 'jitesh', 'jitesh.patle@syslogyx.com', '$2y$10$aohRhAsrbOkoPs9XzsUld.zHv7TS8CY2aT6zOCaz3jSiCMCGaJbdu', 1, NULL, '2018-07-10 10:32:04', '2018-07-10 10:32:04'),
(10, 'test', 'test@test.com', '$2y$10$2WvyIha4JxJFcJFtmkF5g.GeiESXMuFvxioxq7BW8opdBesQiCVgm', 1, NULL, '2018-07-11 10:00:55', '2018-07-11 13:01:47'),
(12, 'test operator', 'test_operator@test.com', '$2y$10$pN4DBx43lxX5GIiKSCRk.Ow1wcpN0iIdzXDb288N5iDtIk4rAsflS', 2, NULL, '2018-07-11 10:14:39', '2018-07-11 10:14:39'),
(13, 'test operator', 'test_operator1@test.com', '$2y$10$UaMg5TzDhAtOS7wfvypRCONkkTe6RztenmdZq2Zr85GvX2wt.BMl6', 2, NULL, '2018-07-11 10:21:21', '2018-07-11 10:21:21'),
(14, 'operator1', 'test_operator2@test.com', '$2y$10$IM.LdsN4.qT1TED61495tuEKuJb2yE.bRMyf65/AIv3tAWYm2JpSe', 2, NULL, '2018-07-11 10:23:16', '2018-07-11 10:23:16'),
(15, 'test operator 3', 'test@syslogyx.com', '$2y$10$cADp4Wy5uSro9ekj8WQRkutqW8ek2Ls6onJ87aDnlkFOTaWrYv4Ka', 2, NULL, '2018-07-11 10:25:22', '2018-07-11 10:25:22'),
(16, 'test operator 3', 'testqqq@syslogyx.com', '$2y$10$Uu2E.cw1byT5PCnBkcElpe9dayrhLjnlCVs/vTYXz07lTLv69tA6G', 2, NULL, '2018-07-11 10:26:28', '2018-07-11 10:26:28'),
(17, 'test operator 4', 'test_operato4@gmail.com', '$2y$10$WhEYHt1J9qRKWsFjezE1VO.83CSMgnXxMiAXHgzb94RwVxp9tSj6S', 2, NULL, '2018-07-11 10:29:00', '2018-07-11 10:29:00'),
(63, 'yogesh1', 'yogesh1@gmail.com', '$2y$10$xVUAGT4ezIeS4oq51QinZ.ezAEKGG2GkkLrHSrvN4dd37lSpB5NJG', 1, NULL, NULL, NULL),
(64, 'suchi1', 'suchi1@gmail.com', '$2y$10$dsO0tvqTQFc3wIjxeMjZJ..nJvFwjcEVdaD089ZRPRv.X5pH6fWBC', 2, NULL, NULL, NULL),
(65, 'sonal1', 'sonal1@gmail.com', '$2y$10$yn6KjZD0LThvDAu30ORJZ.Z4q8eiltkjRXZXbLZphF3kNOV4/FOYm', 1, NULL, NULL, NULL),
(66, 'monica1', 'monica1@gmail.com', '$2y$10$4Um16/4pj/iJPbn2Mf5.OejFpTajLlsC5lOyGCRQCoACZLIvmhWJm', 1, NULL, NULL, NULL),
(67, 'surabhi1', 'surabhi1@gmail.com', '$2y$10$2GXJXRnF8jOBsvdHi5STfe9nuCg//7C1uJAKzpfYX2dXm4p6jAs0.', 2, NULL, NULL, NULL),
(68, 'Vaibhav', 'vaibhav@syslogyx.com', '$2y$10$f01TnhbinQT4DcEda017MO2aEs4qlMB/Wu.xfIr/i48rg2wnG.Dfe', 1, NULL, '2018-07-20 08:33:34', '2018-07-20 08:33:34'),
(69, 'vaibhav_1', 'vaibhav.syslogyx@gmail.com', '$2y$10$WlAxPn6PQEG6EN5msObT1.gzk887cDpLmIqKxZsiUjOVwsBFC41FK', 2, NULL, '2018-07-20 08:34:30', '2018-07-20 08:34:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_device_assoc`
--

DROP TABLE IF EXISTS `user_device_assoc`;
CREATE TABLE IF NOT EXISTS `user_device_assoc` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `device_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_device_assoc_device_id_foreign` (`device_id`),
  KEY `user_device_assoc_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_device_assoc`
--

INSERT INTO `user_device_assoc` (`id`, `device_id`, `user_id`, `date`, `status`, `created_at`, `updated_at`) VALUES
(2, 5, 2, '2018-07-09 12:13:01', 'ENGAGE', '2018-07-09 06:43:01', '2018-07-09 06:43:01'),
(3, 5, 2, '2018-07-09 12:15:18', 'NOT ENGAGE', '2018-07-09 06:45:18', '2018-07-09 06:45:18'),
(6, 5, 2, '2018-07-09 12:25:39', 'ENGAGE', '2018-07-09 06:55:39', '2018-07-09 06:55:39'),
(8, 1, 3, '2018-07-10', 'ENGAGE', '2018-07-10 07:29:42', '2018-07-10 07:29:42'),
(9, 5, 3, '2018-07-10', 'NOT ENGAGE', '2018-07-10 07:36:51', '2018-07-10 07:36:51'),
(10, 5, 2, '2018-07-10', 'NOT ENGAGE', '2018-07-10 07:37:17', '2018-07-10 07:37:17'),
(13, 11, 9, '2018-07-10', 'ENGAGE', '2018-07-10 10:33:55', '2018-07-10 10:33:55'),
(14, 4, 1, '2018-07-10', 'ENGAGE', '2018-07-10 11:17:45', '2018-07-10 11:17:45'),
(15, 11, 9, '2018-07-12', 'NOT ENGAGE', '2018-07-12 05:44:05', '2018-07-12 05:44:05'),
(16, 4, 1, '2018-07-12', 'NOT ENGAGE', '2018-07-12 06:00:12', '2018-07-12 06:00:12'),
(17, 3, 1, '2018-07-12', 'ENGAGE', '2018-07-12 06:37:33', '2018-07-12 06:37:33'),
(18, 2, 1, '2018-07-12', 'ENGAGE', '2018-07-12 06:40:08', '2018-07-12 06:40:08'),
(19, 2, 1, '2018-07-12', 'NOT ENGAGE', '2018-07-12 06:41:16', '2018-07-12 06:41:16'),
(20, 2, 1, '2018-07-12', 'ENGAGE', '2018-07-12 06:42:40', '2018-07-12 06:42:40'),
(23, 2, 1, '2018-07-12', 'NOT ENGAGE', '2018-07-12 06:44:43', '2018-07-12 06:44:43'),
(24, 2, 1, '2018-07-12', 'ENGAGE', '2018-07-12 06:45:23', '2018-07-12 06:45:23'),
(25, 2, 1, '2018-07-12', 'NOT ENGAGE', '2018-07-12 06:45:31', '2018-07-12 06:45:31'),
(26, 2, 1, '2018-07-12', 'ENGAGE', '2018-07-12 06:46:14', '2018-07-12 06:46:14'),
(27, 2, 1, '2018-07-12', 'NOT ENGAGE', '2018-07-12 06:46:21', '2018-07-12 06:46:21'),
(28, 3, 1, '2018-07-12', 'ENGAGE', '2018-07-12 06:47:45', '2018-07-12 06:47:45'),
(29, 3, 1, '2018-07-12', 'NOT ENGAGE', '2018-07-12 06:47:55', '2018-07-12 06:47:55'),
(30, 2, 1, '2018-07-12', 'ENGAGE', '2018-07-12 06:48:59', '2018-07-12 06:48:59'),
(31, 2, 1, '2018-07-12', 'NOT ENGAGE', '2018-07-12 06:49:16', '2018-07-12 06:49:16'),
(32, 4, 1, '2018-07-12', 'ENGAGE', '2018-07-12 06:49:27', '2018-07-12 06:49:27'),
(33, 4, 1, '2018-07-12', 'NOT ENGAGE', '2018-07-12 06:59:50', '2018-07-12 06:59:50'),
(34, 3, 1, '2018-07-12', 'ENGAGE', '2018-07-12 07:08:33', '2018-07-12 07:08:33'),
(35, 3, 1, '2018-07-12', 'NOT ENGAGE', '2018-07-12 07:08:38', '2018-07-12 07:08:38'),
(36, 4, 1, '2018-07-12', 'ENGAGE', '2018-07-12 07:12:27', '2018-07-12 07:12:27'),
(37, 4, 1, '2018-07-12', 'NOT ENGAGE', '2018-07-12 07:12:32', '2018-07-12 07:12:32'),
(38, 4, 1, '2018-07-12', 'ENGAGE', '2018-07-12 07:12:39', '2018-07-12 07:12:39'),
(39, 4, 1, '2018-07-12', 'NOT ENGAGE', '2018-07-12 07:13:07', '2018-07-12 07:13:07'),
(40, 4, 1, '2018-07-12', 'ENGAGE', '2018-07-12 07:16:33', '2018-07-12 07:16:33'),
(41, 4, 1, '2018-07-13', 'NOT ENGAGE', '2018-07-13 05:17:29', '2018-07-13 05:17:29'),
(42, 2, 1, '2018-07-13', 'ENGAGE', '2018-07-13 05:18:37', '2018-07-13 05:18:37'),
(43, 2, 1, '2018-07-13', 'NOT ENGAGE', '2018-07-13 06:11:14', '2018-07-13 06:11:14'),
(44, 1, 3, '2018-07-13', 'NOT ENGAGE', '2018-07-13 06:12:10', '2018-07-13 06:12:10'),
(45, 1, 1, '2018-07-13', 'ENGAGE', '2018-07-13 06:12:23', '2018-07-13 06:12:23'),
(46, 1, 1, '2018-07-13', 'NOT ENGAGE', '2018-07-13 06:12:35', '2018-07-13 06:12:35'),
(47, 1, 1, '2018-07-13', 'ENGAGE', '2018-07-13 06:13:07', '2018-07-13 06:13:07'),
(48, 1, 1, '2018-07-13', 'NOT ENGAGE', '2018-07-13 10:07:45', '2018-07-13 10:07:45'),
(49, 2, 1, '2018-07-13', 'ENGAGE', '2018-07-13 10:08:28', '2018-07-13 10:08:28'),
(51, 1, 2, '2018-07-13', 'ENGAGE', '2018-07-13 10:09:02', '2018-07-13 10:09:02'),
(52, 2, 1, '2018-07-13', 'NOT ENGAGE', '2018-07-13 10:09:12', '2018-07-13 10:09:12'),
(53, 2, 1, '2018-07-13', 'ENGAGE', '2018-07-13 10:14:37', '2018-07-13 10:14:37'),
(54, 14, 2, '2018-07-13', 'ENGAGE', '2018-07-13 10:17:36', '2018-07-13 10:17:36'),
(55, 1, 1, '2018-07-13', 'ENGAGE', '2018-07-13 10:18:11', '2018-07-13 10:18:11'),
(56, 1, 1, '2018-07-19', 'NOT ENGAGE', '2018-07-19 10:51:49', '2018-07-19 10:51:49'),
(57, 1, 63, '2018-07-19', 'ENGAGE', '2018-07-19 10:51:58', '2018-07-19 10:51:58'),
(58, 2, 69, '2018-07-20', 'ENGAGE', '2018-07-20 08:37:50', '2018-07-20 08:37:50'),
(59, 6, 68, '2018-07-20', 'ENGAGE', '2018-07-20 08:46:30', '2018-07-20 08:46:30'),
(60, 13, 68, '2018-07-20', 'ENGAGE', '2018-07-20 08:46:54', '2018-07-20 08:46:54'),
(61, 5, 68, '2018-07-20', 'ENGAGE', '2018-07-20 08:47:00', '2018-07-20 08:47:00'),
(62, 3, 1, '2018-07-23', 'ENGAGE', '2018-07-23 11:43:04', '2018-07-23 11:43:04'),
(64, 4, 2, '2018-07-23', 'ENGAGE', '2018-07-23 11:51:57', '2018-07-23 11:51:57'),
(65, 6, 1, '2018-07-23', 'ENGAGE', '2018-07-23 13:25:05', '2018-07-23 13:25:05'),
(66, 11, 5, '2018-07-23', 'ENGAGE', '2018-07-23 13:28:38', '2018-07-23 13:28:38'),
(67, 3, 5, '2018-07-24', 'ENGAGE', '2018-07-24 05:29:56', '2018-07-24 05:29:56'),
(68, 12, 3, '2018-07-24', 'ENGAGE', '2018-07-24 05:41:56', '2018-07-24 05:41:56'),
(69, 22, 6, '2018-07-24', 'ENGAGE', '2018-07-24 06:26:07', '2018-07-24 06:26:07'),
(70, 6, 1, '2018-08-29', 'NOT ENGAGE', '2018-08-29 06:55:58', '2018-08-29 06:55:58'),
(71, 13, 1, '2018-08-29', 'ENGAGE', '2018-08-29 06:57:41', '2018-08-29 06:57:41'),
(72, 13, 1, '2018-08-29', 'NOT ENGAGE', '2018-08-29 07:00:28', '2018-08-29 07:00:28'),
(73, 14, 1, '2018-08-29', 'ENGAGE', '2018-08-29 11:05:01', '2018-08-29 11:05:01');

-- --------------------------------------------------------

--
-- Table structure for table `user_product_assoc`
--

DROP TABLE IF EXISTS `user_product_assoc`;
CREATE TABLE IF NOT EXISTS `user_product_assoc` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `device_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_case` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_point_3_voltage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_point_3_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_point_4_voltage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_point_4_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_point_4_pulse_low` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_point_4_pulse_high` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `user_product_assoc_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_product_assoc`
--

INSERT INTO `user_product_assoc` (`user_id`, `device_id`, `product_id`, `mode`, `test_case`, `test_point_3_voltage`, `test_point_3_time`, `test_point_4_voltage`, `test_point_4_time`, `test_point_4_pulse_low`, `test_point_4_pulse_high`, `status`, `date`, `created_at`, `updated_at`) VALUES
(1, 'did_01', 'pid_01', '2', 'tc', '2', '3', '1', '4', '56_24_56', '56_24_56', '1', '2018-07-10', '2018-07-10 06:08:22', '2018-07-10 06:08:22'),
(1, 'did_01', 'pid_02', '2', 'tc', '2', '3', '1', '4', '56_24_56', '56_24_56', '1', '2018-07-10', '2018-07-10 06:11:08', '2018-07-10 06:11:08'),
(1, 'did_02', 'pid_01', '2', 'tc', '2', '3', '1', '4', '56_24_56', '56_24_56', '1', '2018-07-10', '2018-07-10 06:11:34', '2018-07-10 06:11:34'),
(2, 'did_02', 'pid_01', '2', 'tc', '2', '3', '1', '4', '56_24_56', '56_24_56', '1', '2018-07-10', '2018-07-10 06:11:40', '2018-07-10 06:11:40'),
(2, 'did_02', 'pid_04', '2', 'tc', '2', '3', '1', '4', '56_24_56', '56_24_56', '1', '2018-07-10', '2018-07-10 06:11:52', '2018-07-10 06:11:52'),
(2, 'did_02', 'pid_01', '2', 'tc', '2', '3', '1', '4', '56_24_56', '56_24_56', '1', '2018-07-10', '2018-07-10 06:41:42', '2018-07-10 06:41:42'),
(2, 'did_02', 'pid_01', '2', 'tc', '2', '3', '1', '4', '56_24_56', '56_24_56', '1', '2018-07-10', '2018-07-10 09:29:08', '2018-07-10 09:29:08'),
(9, 'EITDS08', '000001', '1', '1', '3.15', '6005', '3.1', '4005', '56-50-51', '20-24-21', '1', '2018-07-10', '2018-07-10 10:38:58', '2018-07-10 10:38:58'),
(9, 'EITDS08', '000001', '1', '1', '3.15', '6005', '3.1', '4005', '56-50-51', '20-24-0', '1', '2018-07-11', '2018-07-11 13:06:55', '2018-07-11 13:06:55'),
(9, 'EITDS08', '000001', '1', '1', '3.15', '6005', '3.1', '4005', '56-50-51', '20-24-21', '1', '2018-07-12', '2018-07-12 06:09:59', '2018-07-12 06:09:59'),
(9, 'EITDS08', '000001', '1', '1', '3.15', '6005', '3.1', '4005', '56-50-51', '20-24-0', '1', '2018-07-12', '2018-07-12 06:18:56', '2018-07-12 06:18:56');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_device_assoc`
--
ALTER TABLE `user_device_assoc`
  ADD CONSTRAINT `user_device_assoc_device_id_foreign` FOREIGN KEY (`device_id`) REFERENCES `devices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_device_assoc_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_product_assoc`
--
ALTER TABLE `user_product_assoc`
  ADD CONSTRAINT `user_product_assoc_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
