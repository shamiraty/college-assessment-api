-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2025 at 02:30 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course_evaluation`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_years`
--

CREATE TABLE `academic_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_years`
--

INSERT INTO `academic_years` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '2020/2021', '2025-05-07 07:41:55', '2025-05-07 07:41:55'),
(2, '2021/2022', '2025-05-07 07:41:56', '2025-05-07 07:41:56'),
(3, '2022/2023', '2025-05-07 07:41:56', '2025-05-07 07:41:56'),
(4, '2023/2024', '2025-05-07 07:41:57', '2025-05-07 07:41:57'),
(5, '2024/2025', '2025-05-07 07:41:57', '2025-05-07 07:41:57'),
(6, '2025/2026', '2025-05-07 07:41:57', '2025-05-07 07:41:57'),
(7, '2026/2027', '2025-05-07 07:41:57', '2025-05-07 07:41:57'),
(8, '2027/2028', '2025-05-07 07:41:58', '2025-05-07 07:41:58'),
(9, '2028/2029', '2025-05-07 07:41:58', '2025-05-07 07:41:58'),
(10, '2029/2030', '2025-05-07 07:41:58', '2025-05-07 07:41:58'),
(11, '2030/2031', '2025-05-07 07:41:58', '2025-05-07 07:41:58');

-- --------------------------------------------------------

--
-- Table structure for table `api_keys`
--

CREATE TABLE `api_keys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `api_key` varchar(255) NOT NULL,
  `end_date` date NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `category` enum('web_system','app') DEFAULT NULL,
  `last_used` timestamp NULL DEFAULT NULL,
  `number_of_requests` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `access_history` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`access_history`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `api_keys`
--

INSERT INTO `api_keys` (`id`, `username`, `password`, `api_key`, `end_date`, `phone_number`, `email`, `category`, `last_used`, `number_of_requests`, `status`, `access_history`, `created_at`, `updated_at`) VALUES
(1, 'Soft-River Consultants LTD', '$2y$12$0T0zulzRQi5MAV.ntIFApO4FfK6aoSDcH0z1JW0qgdSI5Q82M1y.W', 'LwhY1KKdmvQE8ca3OdmjKVGg8FlvRXfPFV0aeyrA', '2025-08-30', '255755400927', 'softriver@river.co.tz', 'app', '2025-05-09 08:27:15', 170, 1, '[{\"accessed_at\":\"2025-05-06 14:43:32\"},{\"accessed_at\":\"2025-05-06 15:20:37\"},{\"accessed_at\":\"2025-05-06 15:20:59\"},{\"accessed_at\":\"2025-05-06 15:21:20\"},{\"accessed_at\":\"2025-05-06 15:22:34\"},{\"accessed_at\":\"2025-05-06 15:33:47\"},{\"accessed_at\":\"2025-05-06 15:35:23\"},{\"accessed_at\":\"2025-05-07 04:38:17\"},{\"accessed_at\":\"2025-05-07 04:54:45\"},{\"accessed_at\":\"2025-05-07 04:54:50\"},{\"accessed_at\":\"2025-05-07 05:52:34\"},{\"accessed_at\":\"2025-05-07 05:53:16\"},{\"accessed_at\":\"2025-05-07 05:58:48\"},{\"accessed_at\":\"2025-05-07 05:58:54\"},{\"accessed_at\":\"2025-05-07 05:59:25\"},{\"accessed_at\":\"2025-05-07 06:44:23\"},{\"accessed_at\":\"2025-05-07 06:44:34\"},{\"accessed_at\":\"2025-05-07 06:46:12\"},{\"accessed_at\":\"2025-05-07 06:46:19\"},{\"accessed_at\":\"2025-05-07 06:47:12\"},{\"accessed_at\":\"2025-05-07 06:47:59\"},{\"accessed_at\":\"2025-05-07 06:48:29\"},{\"accessed_at\":\"2025-05-07 06:49:00\"},{\"accessed_at\":\"2025-05-07 06:49:24\"},{\"accessed_at\":\"2025-05-07 06:58:06\"},{\"accessed_at\":\"2025-05-07 07:03:43\"},{\"accessed_at\":\"2025-05-07 07:10:11\"},{\"accessed_at\":\"2025-05-07 07:10:36\"},{\"accessed_at\":\"2025-05-07 07:13:27\"},{\"accessed_at\":\"2025-05-07 07:52:35\"},{\"accessed_at\":\"2025-05-07 07:54:17\"},{\"accessed_at\":\"2025-05-07 07:55:53\"},{\"accessed_at\":\"2025-05-07 07:56:52\"},{\"accessed_at\":\"2025-05-07 08:02:04\"},{\"accessed_at\":\"2025-05-07 08:03:34\"},{\"accessed_at\":\"2025-05-07 08:05:37\"},{\"accessed_at\":\"2025-05-07 08:12:43\"},{\"accessed_at\":\"2025-05-07 08:13:34\"},{\"accessed_at\":\"2025-05-07 08:17:40\"},{\"accessed_at\":\"2025-05-07 08:18:10\"},{\"accessed_at\":\"2025-05-07 08:18:34\"},{\"accessed_at\":\"2025-05-07 08:21:34\"},{\"accessed_at\":\"2025-05-07 08:21:59\"},{\"accessed_at\":\"2025-05-07 08:22:36\"},{\"accessed_at\":\"2025-05-07 08:22:57\"},{\"accessed_at\":\"2025-05-07 08:23:28\"},{\"accessed_at\":\"2025-05-07 08:24:23\"},{\"accessed_at\":\"2025-05-07 08:32:20\"},{\"accessed_at\":\"2025-05-07 08:34:23\"},{\"accessed_at\":\"2025-05-07 08:34:57\"},{\"accessed_at\":\"2025-05-07 08:38:58\"},{\"accessed_at\":\"2025-05-07 08:39:39\"},{\"accessed_at\":\"2025-05-07 08:48:01\"},{\"accessed_at\":\"2025-05-07 08:49:07\"},{\"accessed_at\":\"2025-05-07 08:52:38\"},{\"accessed_at\":\"2025-05-07 08:59:56\"},{\"accessed_at\":\"2025-05-07 09:01:53\"},{\"accessed_at\":\"2025-05-07 09:09:33\"},{\"accessed_at\":\"2025-05-07 09:15:55\"},{\"accessed_at\":\"2025-05-07 09:20:40\"},{\"accessed_at\":\"2025-05-07 09:20:53\"},{\"accessed_at\":\"2025-05-07 09:22:00\"},{\"accessed_at\":\"2025-05-07 09:25:36\"},{\"accessed_at\":\"2025-05-07 09:30:00\"},{\"accessed_at\":\"2025-05-07 09:33:44\"},{\"accessed_at\":\"2025-05-07 09:37:22\"},{\"accessed_at\":\"2025-05-07 09:39:38\"},{\"accessed_at\":\"2025-05-07 09:42:06\"},{\"accessed_at\":\"2025-05-07 09:42:31\"},{\"accessed_at\":\"2025-05-07 09:44:43\"},{\"accessed_at\":\"2025-05-07 09:46:09\"},{\"accessed_at\":\"2025-05-07 09:46:18\"},{\"accessed_at\":\"2025-05-07 09:48:34\"},{\"accessed_at\":\"2025-05-07 09:50:12\"},{\"accessed_at\":\"2025-05-07 09:52:30\"},{\"accessed_at\":\"2025-05-07 09:52:35\"},{\"accessed_at\":\"2025-05-07 10:53:31\"},{\"accessed_at\":\"2025-05-07 10:55:25\"},{\"accessed_at\":\"2025-05-07 10:56:58\"},{\"accessed_at\":\"2025-05-07 11:15:10\"},{\"accessed_at\":\"2025-05-07 11:26:32\"},{\"accessed_at\":\"2025-05-07 11:28:46\"},{\"accessed_at\":\"2025-05-07 11:31:23\"},{\"accessed_at\":\"2025-05-07 11:34:09\"},{\"accessed_at\":\"2025-05-07 11:35:37\"},{\"accessed_at\":\"2025-05-07 11:41:14\"},{\"accessed_at\":\"2025-05-07 11:41:59\"},{\"accessed_at\":\"2025-05-07 11:49:29\"},{\"accessed_at\":\"2025-05-07 11:52:49\"},{\"accessed_at\":\"2025-05-07 11:53:23\"},{\"accessed_at\":\"2025-05-07 11:54:44\"},{\"accessed_at\":\"2025-05-07 11:56:51\"},{\"accessed_at\":\"2025-05-07 12:58:48\"},{\"accessed_at\":\"2025-05-07 12:59:01\"},{\"accessed_at\":\"2025-05-07 13:00:00\"},{\"accessed_at\":\"2025-05-07 13:00:51\"},{\"accessed_at\":\"2025-05-07 13:44:42\"},{\"accessed_at\":\"2025-05-09 05:26:40\"},{\"accessed_at\":\"2025-05-09 05:29:45\"},{\"accessed_at\":\"2025-05-09 05:33:28\"},{\"accessed_at\":\"2025-05-09 05:36:12\"},{\"accessed_at\":\"2025-05-09 05:37:37\"},{\"accessed_at\":\"2025-05-09 05:38:59\"},{\"accessed_at\":\"2025-05-09 05:39:14\"},{\"accessed_at\":\"2025-05-09 05:43:50\"},{\"accessed_at\":\"2025-05-09 05:44:58\"},{\"accessed_at\":\"2025-05-09 05:45:57\"},{\"accessed_at\":\"2025-05-09 05:46:00\"},{\"accessed_at\":\"2025-05-09 05:46:02\"},{\"accessed_at\":\"2025-05-09 05:46:04\"},{\"accessed_at\":\"2025-05-09 05:46:06\"},{\"accessed_at\":\"2025-05-09 05:46:08\"},{\"accessed_at\":\"2025-05-09 05:46:10\"},{\"accessed_at\":\"2025-05-09 05:46:12\"},{\"accessed_at\":\"2025-05-09 05:53:52\"},{\"accessed_at\":\"2025-05-09 05:54:38\"},{\"accessed_at\":\"2025-05-09 05:57:53\"},{\"accessed_at\":\"2025-05-09 06:08:01\"},{\"accessed_at\":\"2025-05-09 06:16:18\"},{\"accessed_at\":\"2025-05-09 06:27:49\"},{\"accessed_at\":\"2025-05-09 06:31:44\"},{\"accessed_at\":\"2025-05-09 06:41:03\"},{\"accessed_at\":\"2025-05-09 06:49:57\"},{\"accessed_at\":\"2025-05-09 06:53:49\"},{\"accessed_at\":\"2025-05-09 07:26:42\"},{\"accessed_at\":\"2025-05-09 07:27:25\"},{\"accessed_at\":\"2025-05-09 07:28:02\"},{\"accessed_at\":\"2025-05-09 07:28:42\"},{\"accessed_at\":\"2025-05-09 07:33:33\"},{\"accessed_at\":\"2025-05-09 07:34:34\"},{\"accessed_at\":\"2025-05-09 07:35:38\"},{\"accessed_at\":\"2025-05-09 07:37:02\"},{\"accessed_at\":\"2025-05-09 07:42:26\"},{\"accessed_at\":\"2025-05-09 07:45:02\"},{\"accessed_at\":\"2025-05-09 07:45:37\"},{\"accessed_at\":\"2025-05-09 07:49:07\"},{\"accessed_at\":\"2025-05-09 07:50:14\"},{\"accessed_at\":\"2025-05-09 07:51:14\"},{\"accessed_at\":\"2025-05-09 07:53:29\"},{\"accessed_at\":\"2025-05-09 07:57:38\"},{\"accessed_at\":\"2025-05-09 07:59:22\"},{\"accessed_at\":\"2025-05-09 08:00:50\"},{\"accessed_at\":\"2025-05-09 08:02:01\"},{\"accessed_at\":\"2025-05-09 08:03:24\"},{\"accessed_at\":\"2025-05-09 08:04:53\"},{\"accessed_at\":\"2025-05-09 08:05:37\"},{\"accessed_at\":\"2025-05-09 08:06:01\"},{\"accessed_at\":\"2025-05-09 08:08:12\"},{\"accessed_at\":\"2025-05-09 08:15:55\"},{\"accessed_at\":\"2025-05-09 08:18:16\"},{\"accessed_at\":\"2025-05-09 08:21:48\"},{\"accessed_at\":\"2025-05-09 08:23:34\"},{\"accessed_at\":\"2025-05-09 08:26:39\"},{\"accessed_at\":\"2025-05-09 08:27:58\"},{\"accessed_at\":\"2025-05-09 08:29:33\"},{\"accessed_at\":\"2025-05-09 08:32:15\"},{\"accessed_at\":\"2025-05-09 08:32:41\"},{\"accessed_at\":\"2025-05-09 08:33:14\"},{\"accessed_at\":\"2025-05-09 08:34:36\"},{\"accessed_at\":\"2025-05-09 10:53:59\"},{\"accessed_at\":\"2025-05-09 10:56:25\"},{\"accessed_at\":\"2025-05-09 11:00:35\"},{\"accessed_at\":\"2025-05-09 11:01:34\"},{\"accessed_at\":\"2025-05-09 11:03:20\"},{\"accessed_at\":\"2025-05-09 11:05:31\"},{\"accessed_at\":\"2025-05-09 11:06:45\"},{\"accessed_at\":\"2025-05-09 11:07:28\"},{\"accessed_at\":\"2025-05-09 11:09:02\"},{\"accessed_at\":\"2025-05-09 11:10:40\"},{\"accessed_at\":\"2025-05-09 11:27:15\"}]', '2025-05-06 11:22:21', '2025-05-09 09:21:02');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `HOD_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`id`, `name`, `HOD_name`, `created_at`, `updated_at`) VALUES
(1, 'College of Engineering', 'Dr. John Doe', '2025-05-07 07:41:58', '2025-05-07 07:41:58'),
(2, 'College of Science', 'Prof. Jane Smith', '2025-05-07 07:41:58', '2025-05-07 07:41:58'),
(3, 'College of Arts and Social Sciences', 'Dr. Peter Jones', '2025-05-07 07:41:59', '2025-05-07 07:41:59'),
(4, 'College of Business', 'Prof. Alice Brown', '2025-05-07 07:41:59', '2025-05-07 07:41:59'),
(5, 'College of Medicine', 'Dr. Robert Green', '2025-05-07 07:41:59', '2025-05-07 07:41:59');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `program_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `code`, `program_id`, `created_at`, `updated_at`) VALUES
(1, 'Financial Accounting', 'QUI 2988', 2, '2025-05-07 07:42:09', '2025-05-07 07:42:09'),
(2, 'Managerial Economics', 'LAB 3309', 1, '2025-05-07 07:42:09', '2025-05-07 07:42:09'),
(3, 'Marketing Management', 'INC 2343', 4, '2025-05-07 07:42:09', '2025-05-07 07:42:09'),
(4, 'Human Resource Management', 'QUI 231', 3, '2025-05-07 07:42:10', '2025-05-07 07:42:10'),
(5, 'Strategic Management', 'APE 2483', 5, '2025-05-07 07:42:10', '2025-05-07 07:42:10'),
(6, 'Entrepreneurship', 'AUT 4145', 7, '2025-05-07 07:42:10', '2025-05-07 07:42:10'),
(7, 'Organizational Behavior', 'SED 3013', 1, '2025-05-07 07:42:10', '2025-05-07 07:42:10'),
(8, 'International Business', 'ID 2722', 6, '2025-05-07 07:42:10', '2025-05-07 07:42:10'),
(9, 'Project Management', 'QUI 5345', 2, '2025-05-07 07:42:11', '2025-05-07 07:42:11'),
(10, 'Business Ethics', 'REM 4402', 2, '2025-05-07 07:42:11', '2025-05-07 07:42:11'),
(11, 'E-commerce', 'AUT 3417', 1, '2025-05-07 07:42:11', '2025-05-07 07:42:11'),
(12, 'Supply Chain Management', 'NON 7531', 5, '2025-05-07 07:42:11', '2025-05-07 07:42:11'),
(13, 'Customer Relationship Management (CRM)', 'IST 9808', 7, '2025-05-07 07:42:11', '2025-05-07 07:42:11'),
(14, 'Business Intelligence', 'ASP 2573', 2, '2025-05-07 07:42:12', '2025-05-07 07:42:12'),
(15, 'Data Visualization', 'NOS 3804', 1, '2025-05-07 07:42:12', '2025-05-07 07:42:12'),
(16, 'Machine Learning', 'LAB 9106', 2, '2025-05-07 07:42:12', '2025-05-07 07:42:12'),
(17, 'Artificial Intelligence', 'NIH 1569', 1, '2025-05-07 07:42:13', '2025-05-07 07:42:13'),
(18, 'Big Data Analytics', 'VOL 1234', 1, '2025-05-07 07:42:13', '2025-05-07 07:42:13'),
(19, 'Database Management Systems', 'DIC 592', 2, '2025-05-07 07:42:13', '2025-05-07 07:42:13'),
(20, 'Cloud Computing', 'UT 8047', 8, '2025-05-07 07:42:13', '2025-05-07 07:42:13'),
(21, 'Human Anatomy', 'CUM 1303', 2, '2025-05-07 07:42:14', '2025-05-07 07:42:14'),
(22, 'Physiology', 'FAC 4102', 2, '2025-05-07 07:42:14', '2025-05-07 07:42:14'),
(23, 'Pharmacology', 'BEA 4666', 1, '2025-05-07 07:42:14', '2025-05-07 07:42:14'),
(24, 'Microbiology', 'ET 9802', 3, '2025-05-07 07:42:14', '2025-05-07 07:42:14'),
(25, 'Pathology', 'ULL 1607', 2, '2025-05-07 07:42:14', '2025-05-07 07:42:14'),
(26, 'Public Health', 'ILL 4969', 6, '2025-05-07 07:42:15', '2025-05-07 07:42:15'),
(27, 'Biochemistry', 'QUA 6510', 2, '2025-05-07 07:42:15', '2025-05-07 07:42:15'),
(28, 'Medical Ethics', 'AME 1653', 7, '2025-05-07 07:42:15', '2025-05-07 07:42:15'),
(29, 'Healthcare Management', 'VEL 2592', 1, '2025-05-07 07:42:15', '2025-05-07 07:42:15'),
(30, 'Epidemiology', 'PLA 9588', 8, '2025-05-07 07:42:15', '2025-05-07 07:42:15');

-- --------------------------------------------------------

--
-- Table structure for table `course_evaluations`
--

CREATE TABLE `course_evaluations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `token_number` varchar(255) NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `teaching_modality` enum('Good','Better','Best') NOT NULL,
  `learning_materials` enum('Available','Not Available','Complex to Understand') NOT NULL,
  `lecture_time_start` enum('Early Start','Coming Late') NOT NULL,
  `lecture_time_end` enum('Early End','Ending Late') NOT NULL,
  `lecturer_punctuality` enum('Always On Time','Sometimes Late','Always Late') NOT NULL,
  `content_understanding` enum('Very Clear','Average','Confusing') NOT NULL,
  `student_engagement` enum('Highly Interactive','Moderate','Not Interactive') NOT NULL,
  `use_of_technology` enum('Effective','Moderate','Not Used') NOT NULL,
  `assessment_feedback` enum('Timely & Helpful','Late Feedback','No Feedback') NOT NULL,
  `course_relevance` enum('Very Relevant','Somewhat Relevant','Not Relevant') NOT NULL,
  `overall_satisfaction` enum('Very Satisfied','Satisfied','Not Satisfied') NOT NULL,
  `suggestions` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_evaluations`
--

INSERT INTO `course_evaluations` (`id`, `student_id`, `token_number`, `course_id`, `teaching_modality`, `learning_materials`, `lecture_time_start`, `lecture_time_end`, `lecturer_punctuality`, `content_understanding`, `student_engagement`, `use_of_technology`, `assessment_feedback`, `course_relevance`, `overall_satisfaction`, `suggestions`, `created_at`, `updated_at`) VALUES
(1, 6, '1', 24, 'Good', 'Available', 'Early Start', 'Ending Late', 'Always On Time', 'Very Clear', 'Highly Interactive', 'Effective', 'Timely & Helpful', 'Very Relevant', 'Satisfied', NULL, '2025-05-07 08:41:59', '2025-05-07 08:41:59'),
(2, 6, '1', 8, 'Better', 'Not Available', 'Early Start', 'Ending Late', 'Always On Time', 'Average', 'Not Interactive', 'Not Used', 'Late Feedback', 'Somewhat Relevant', 'Satisfied', NULL, '2025-05-07 08:56:51', '2025-05-07 08:56:51'),
(3, 2, '4', 19, 'Good', 'Complex to Understand', 'Coming Late', 'Ending Late', 'Always Late', 'Confusing', 'Moderate', 'Not Used', 'Timely & Helpful', 'Not Relevant', 'Very Satisfied', NULL, '2025-05-09 07:56:25', '2025-05-09 07:56:25'),
(4, 6, '1', 19, 'Best', 'Available', 'Coming Late', 'Ending Late', 'Always Late', 'Confusing', 'Not Interactive', 'Not Used', 'No Feedback', 'Not Relevant', 'Not Satisfied', NULL, '2025-05-09 08:03:20', '2025-05-09 08:03:20'),
(5, 6, '1', 11, 'Good', 'Not Available', 'Coming Late', 'Early End', 'Always On Time', 'Very Clear', 'Moderate', 'Moderate', 'Late Feedback', 'Somewhat Relevant', 'Very Satisfied', NULL, '2025-05-09 08:07:29', '2025-05-09 08:07:29'),
(6, 6, '1', 1, 'Best', 'Complex to Understand', 'Coming Late', 'Ending Late', 'Always Late', 'Confusing', 'Not Interactive', 'Not Used', 'No Feedback', 'Not Relevant', 'Not Satisfied', NULL, '2025-05-09 08:09:03', '2025-05-09 08:09:03'),
(7, 6, '1', 12, 'Best', 'Complex to Understand', 'Coming Late', 'Ending Late', 'Always Late', 'Confusing', 'Not Interactive', 'Not Used', 'No Feedback', 'Not Relevant', 'Not Satisfied', NULL, '2025-05-09 08:10:40', '2025-05-09 08:10:40');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `college_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `college_id`, `created_at`, `updated_at`) VALUES
(1, 'Computer Science', NULL, '2025-05-07 07:41:59', '2025-05-07 07:41:59'),
(2, 'Electrical Engineering', NULL, '2025-05-07 07:42:00', '2025-05-07 07:42:00'),
(3, 'Mechanical Engineering', NULL, '2025-05-07 07:42:00', '2025-05-07 07:42:00'),
(4, 'Physics', NULL, '2025-05-07 07:42:01', '2025-05-07 07:42:01'),
(5, 'Chemistry', NULL, '2025-05-07 07:42:01', '2025-05-07 07:42:01'),
(6, 'Mathematics', NULL, '2025-05-07 07:42:01', '2025-05-07 07:42:01'),
(7, 'History', NULL, '2025-05-07 07:42:01', '2025-05-07 07:42:01'),
(8, 'Sociology', NULL, '2025-05-07 07:42:01', '2025-05-07 07:42:01'),
(9, 'Economics', NULL, '2025-05-07 07:42:02', '2025-05-07 07:42:02'),
(10, 'Accounting', NULL, '2025-05-07 07:42:02', '2025-05-07 07:42:02'),
(11, 'General Medicine', NULL, '2025-05-07 07:42:02', '2025-05-07 07:42:02'),
(12, 'Pharmacy', NULL, '2025-05-07 07:42:02', '2025-05-07 07:42:02');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `name`, `department_id`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 'Sofia Jones', 9, 21, '2025-05-07 07:42:20', '2025-05-07 07:42:20'),
(2, 'Malvina Gutkowski', 12, 19, '2025-05-07 07:42:21', '2025-05-07 07:42:21'),
(3, 'Mose Nienow', 3, 27, '2025-05-07 07:42:22', '2025-05-07 07:42:22'),
(4, 'Giuseppe Brakus', 11, 5, '2025-05-07 07:42:22', '2025-05-07 07:42:22'),
(5, 'Eliza Heller', 11, 6, '2025-05-07 07:42:23', '2025-05-07 07:42:23'),
(6, 'Prof. Kim Howe', 1, 25, '2025-05-07 07:42:23', '2025-05-07 07:42:23'),
(7, 'Tanya Labadie', 1, 12, '2025-05-07 07:42:23', '2025-05-07 07:42:23'),
(8, 'Bobbie Gorczany PhD', 9, 10, '2025-05-07 07:42:23', '2025-05-07 07:42:23'),
(9, 'Maiya Ryan DVM', 7, 12, '2025-05-07 07:42:24', '2025-05-07 07:42:24'),
(10, 'Verda Lindgren Jr.', 6, 10, '2025-05-07 07:42:24', '2025-05-07 07:42:24'),
(11, 'Prof. Nels Block DDS', 11, 10, '2025-05-07 07:42:24', '2025-05-07 07:42:24'),
(12, 'Ronny Runolfsdottir', 9, 8, '2025-05-07 07:42:24', '2025-05-07 07:42:24'),
(13, 'Mr. Jairo Marks', 12, 29, '2025-05-07 07:42:24', '2025-05-07 07:42:24'),
(14, 'Maximo Torp', 9, 7, '2025-05-07 07:42:24', '2025-05-07 07:42:24'),
(15, 'Ulices Hettinger', 3, 7, '2025-05-07 07:42:25', '2025-05-07 07:42:25'),
(16, 'Dr. Matilde Stanton III', 3, 25, '2025-05-07 07:42:25', '2025-05-07 07:42:25'),
(17, 'Lempi Davis', 11, 6, '2025-05-07 07:42:25', '2025-05-07 07:42:25'),
(18, 'Yolanda Quigley', 6, 8, '2025-05-07 07:42:25', '2025-05-07 07:42:25'),
(19, 'Noah Gleason', 12, 4, '2025-05-07 07:42:25', '2025-05-07 07:42:25'),
(20, 'Dr. Reynold Klocko DVM', 7, 15, '2025-05-07 07:42:25', '2025-05-07 07:42:25'),
(21, 'Zora Halvorson III', 8, 8, '2025-05-07 07:42:26', '2025-05-07 07:42:26'),
(22, 'Savanah Batz', 9, 29, '2025-05-07 07:42:26', '2025-05-07 07:42:26'),
(23, 'Eden Buckridge Sr.', 4, 21, '2025-05-07 07:42:26', '2025-05-07 07:42:26'),
(24, 'Mrs. Priscilla Jast II', 7, 13, '2025-05-07 07:42:26', '2025-05-07 07:42:26'),
(25, 'Otha Farrell II', 11, 2, '2025-05-07 07:42:26', '2025-05-07 07:42:26'),
(26, 'Prof. Muriel Kozey', 8, 6, '2025-05-07 07:42:26', '2025-05-07 07:42:26'),
(27, 'Roxanne Jenkins DVM', 11, 22, '2025-05-07 07:42:26', '2025-05-07 07:42:26'),
(28, 'Charlie Stark', 3, 7, '2025-05-07 07:42:27', '2025-05-07 07:42:27'),
(29, 'Mr. Tatum Raynor', 4, 23, '2025-05-07 07:42:27', '2025-05-07 07:42:27'),
(30, 'Shyann Bahringer Sr.', 5, 3, '2025-05-07 07:42:27', '2025-05-07 07:42:27');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `name`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 'Diploma in Cyber Security and Digital Forensics', 1, '2025-05-07 07:42:05', '2025-05-07 07:42:05'),
(2, 'Diploma in Educational Technology', 1, '2025-05-07 07:42:05', '2025-05-07 07:42:05'),
(3, 'Bachelor of Art in Economics and Statistics', 1, NULL, NULL),
(4, 'Bachelor of Arts in Fine Arts and Design', 4, NULL, NULL),
(5, 'Bachelor of Commerce in Human Resource Management', 10, NULL, NULL),
(6, 'Bachelor of Commerce in Procurement and Logistic Management	', 10, NULL, NULL),
(7, 'Bachelor of Science in Software Engineering	', 1, NULL, NULL),
(8, 'Bachelor of Science in Telecommunications EngineerinG', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2UYdhbOuvuRVBgWt4bOx3cwV5Nm40pl2LzA1bzXm', NULL, '192.168.137.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36 Edg/136.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVlBockRsSFo0eWZpalRtR2ZFa0twR0NpOG5VS2VxcnNlcmNqY05pUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHA6Ly8xOTIuMTY4LjEzNy4xOjgwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1746767938),
('IGdYDLaFNk0UZqLrRMnDfBqg6bviNPILIdsJ17f2', NULL, '192.168.137.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36 Edg/136.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUWFVdHZXNkh6dkUxN1BydjcybG5TbE5XWVYwcDFvOGc2S1VuY01mbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHA6Ly8xOTIuMTY4LjEzNy4xOjgwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1746793439),
('whEBbTXxNYOkJzSGcCuAAN4VJAbOEXGPoxecg49c', NULL, '192.168.137.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36 Edg/136.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieXNLeXhDZnNZd2hIRXpvdEJ5T01HNHNiUUhjWndYckpvQjZzUGM1diI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHA6Ly8xOTIuMTY4LjEzNy4xOjgwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1746622275);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `registration_number` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL DEFAULT 'nREDQqGNiX',
  `academic_year_id` bigint(20) UNSIGNED NOT NULL,
  `semester` varchar(255) NOT NULL,
  `program_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `registration_number`, `token`, `academic_year_id`, `semester`, `program_id`, `course_id`, `department_id`, `created_at`, `updated_at`) VALUES
(1, '2', '2', 7, 'Summer', 2, NULL, 1, '2025-05-07 07:42:28', '2025-05-07 07:42:28'),
(2, '3', '4', 7, 'Fall', 2, NULL, 1, '2025-05-07 07:42:29', '2025-05-07 07:42:29'),
(3, 'REG-81327', '3', 6, 'Summer', 2, NULL, 1, '2025-05-07 07:42:30', '2025-05-07 07:42:30'),
(4, 'REG-50327', '6oVRg3cSEF', 1, 'Spring', 1, NULL, 1, '2025-05-07 07:42:30', '2025-05-07 07:42:30'),
(5, 'REG-67906', 'OGyL6uzd9r', 11, 'Fall', 1, NULL, 1, '2025-05-07 07:42:30', '2025-05-07 07:42:30'),
(6, '1', '1', 9, 'Spring', 1, NULL, 1, '2025-05-07 07:42:31', '2025-05-07 07:42:31'),
(7, 'REG-37369', 'xaezwhnRKk', 3, 'Summer', 2, NULL, 1, '2025-05-07 07:42:31', '2025-05-07 07:42:31'),
(8, 'REG-63186', 'CnLHbsBZSR', 8, 'Fall', 2, NULL, 1, '2025-05-07 07:42:31', '2025-05-07 07:42:31'),
(9, 'REG-57764', 'PlkJ1Tqu6S', 8, 'Spring', 1, NULL, 1, '2025-05-07 07:42:31', '2025-05-07 07:42:31'),
(10, 'REG-26894', '6Bo2IyumoX', 2, 'Summer', 2, NULL, 1, '2025-05-07 07:42:31', '2025-05-07 07:42:31'),
(11, 'REG-90737', 'zlshfRftOe', 5, 'Summer', 2, NULL, 1, '2025-05-07 07:42:32', '2025-05-07 07:42:32'),
(12, 'REG-21079', 'eg8DFSJOPJ', 3, 'Fall', 2, NULL, 1, '2025-05-07 07:42:32', '2025-05-07 07:42:32'),
(13, 'REG-59084', 'c3kGyjyK62', 10, 'Fall', 1, NULL, 1, '2025-05-07 07:42:32', '2025-05-07 07:42:32'),
(14, 'REG-10626', '9AOi643h0u', 9, 'Fall', 1, NULL, 1, '2025-05-07 07:42:32', '2025-05-07 07:42:32'),
(15, 'REG-25238', 'bkkCGDlNSJ', 9, 'Spring', 2, NULL, 1, '2025-05-07 07:42:32', '2025-05-07 07:42:32'),
(16, 'REG-10553', 'NkNLZ5tRUl', 1, 'Spring', 2, NULL, 1, '2025-05-07 07:42:32', '2025-05-07 07:42:32'),
(17, 'REG-35347', 'A6YG0SBOPT', 6, 'Spring', 1, NULL, 1, '2025-05-07 07:42:32', '2025-05-07 07:42:32'),
(18, 'REG-85943', 'fISQTCCqM2', 7, 'Spring', 1, NULL, 1, '2025-05-07 07:42:32', '2025-05-07 07:42:32'),
(19, 'REG-15040', 'FPjLqITbr6', 4, 'Fall', 1, NULL, 1, '2025-05-07 07:42:32', '2025-05-07 07:42:32'),
(20, 'REG-86223', 'B33uIikzzQ', 7, 'Summer', 1, NULL, 1, '2025-05-07 07:42:33', '2025-05-07 07:42:33'),
(21, 'REG-40797', 'bB4S3i2EzF', 8, 'Spring', 1, NULL, 1, '2025-05-07 07:42:33', '2025-05-07 07:42:33'),
(22, 'REG-40636', 'nX9HiuRWiC', 4, 'Fall', 2, NULL, 1, '2025-05-07 07:42:33', '2025-05-07 07:42:33'),
(23, 'REG-11607', 'zIFW3FDR3s', 10, 'Spring', 1, NULL, 1, '2025-05-07 07:42:33', '2025-05-07 07:42:33'),
(24, 'REG-12293', '8Yf9JMlXsP', 10, 'Fall', 1, NULL, 1, '2025-05-07 07:42:33', '2025-05-07 07:42:33'),
(25, 'REG-87748', 'hmpZMTX0Uv', 10, 'Summer', 1, NULL, 1, '2025-05-07 07:42:33', '2025-05-07 07:42:33'),
(26, 'REG-22575', 'gPhG5pomLm', 4, 'Spring', 2, NULL, 1, '2025-05-07 07:42:33', '2025-05-07 07:42:33'),
(27, 'REG-48340', 'ptdmWcJmHE', 6, 'Fall', 1, NULL, 1, '2025-05-07 07:42:34', '2025-05-07 07:42:34'),
(28, 'REG-5594', 'Ww0r2KYxgR', 1, 'Fall', 1, NULL, 1, '2025-05-07 07:42:34', '2025-05-07 07:42:34'),
(29, 'REG-87175', 'SnD23NAssp', 1, 'Summer', 1, NULL, 1, '2025-05-07 07:42:34', '2025-05-07 07:42:34'),
(30, 'REG-38021', '4FW6yXHED4', 2, 'Spring', 2, NULL, 1, '2025-05-07 07:42:35', '2025-05-07 07:42:35');

-- --------------------------------------------------------

--
-- Table structure for table `student_courses`
--

CREATE TABLE `student_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_courses`
--

INSERT INTO `student_courses` (`id`, `student_id`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 6, 24, '2025-05-07 07:42:36', '2025-05-07 07:42:36'),
(2, 1, 8, '2025-05-07 07:42:36', '2025-05-07 07:42:36'),
(3, 19, 29, '2025-05-07 07:42:37', '2025-05-07 07:42:37'),
(4, 6, 12, '2025-05-07 07:42:37', '2025-05-07 07:42:37'),
(5, 12, 4, '2025-05-07 07:42:37', '2025-05-07 07:42:37'),
(6, 11, 11, '2025-05-07 07:42:38', '2025-05-07 07:42:38'),
(7, 18, 26, '2025-05-07 07:42:38', '2025-05-07 07:42:38'),
(8, 8, 26, '2025-05-07 07:42:38', '2025-05-07 07:42:38'),
(9, 29, 14, '2025-05-07 07:42:38', '2025-05-07 07:42:38'),
(10, 27, 26, '2025-05-07 07:42:38', '2025-05-07 07:42:38'),
(11, 13, 8, '2025-05-07 07:42:38', '2025-05-07 07:42:38'),
(12, 23, 4, '2025-05-07 07:42:39', '2025-05-07 07:42:39'),
(13, 5, 9, '2025-05-07 07:42:39', '2025-05-07 07:42:39'),
(14, 5, 5, '2025-05-07 07:42:39', '2025-05-07 07:42:39'),
(15, 21, 13, '2025-05-07 07:42:39', '2025-05-07 07:42:39'),
(16, 29, 22, '2025-05-07 07:42:39', '2025-05-07 07:42:39'),
(17, 5, 2, '2025-05-07 07:42:39', '2025-05-07 07:42:39'),
(18, 24, 23, '2025-05-07 07:42:40', '2025-05-07 07:42:40'),
(19, 4, 21, '2025-05-07 07:42:40', '2025-05-07 07:42:40'),
(20, 24, 18, '2025-05-07 07:42:40', '2025-05-07 07:42:40'),
(21, 24, 27, '2025-05-07 07:42:41', '2025-05-07 07:42:41'),
(22, 2, 19, '2025-05-07 07:42:41', '2025-05-07 07:42:41'),
(23, 29, 16, '2025-05-07 07:42:41', '2025-05-07 07:42:41'),
(24, 18, 11, '2025-05-07 07:42:41', '2025-05-07 07:42:41'),
(25, 21, 12, '2025-05-07 07:42:41', '2025-05-07 07:42:41'),
(26, 13, 16, '2025-05-07 07:42:41', '2025-05-07 07:42:41'),
(27, 14, 11, '2025-05-07 07:42:42', '2025-05-07 07:42:42'),
(28, 21, 8, '2025-05-07 07:42:42', '2025-05-07 07:42:42'),
(29, 15, 7, '2025-05-07 07:42:42', '2025-05-07 07:42:42'),
(30, 4, 11, '2025-05-07 07:42:42', '2025-05-07 07:42:42'),
(31, 2, 7, '2025-05-07 07:42:43', '2025-05-07 07:42:43'),
(32, 17, 30, '2025-05-07 07:42:43', '2025-05-07 07:42:43'),
(33, 17, 19, '2025-05-07 07:42:43', '2025-05-07 07:42:43'),
(34, 22, 14, '2025-05-07 07:42:43', '2025-05-07 07:42:43'),
(35, 25, 22, '2025-05-07 07:42:43', '2025-05-07 07:42:43'),
(36, 29, 7, '2025-05-07 07:42:43', '2025-05-07 07:42:43'),
(37, 20, 7, '2025-05-07 07:42:43', '2025-05-07 07:42:43'),
(38, 10, 16, '2025-05-07 07:42:44', '2025-05-07 07:42:44'),
(39, 26, 4, '2025-05-07 07:42:44', '2025-05-07 07:42:44'),
(40, 10, 3, '2025-05-07 07:42:44', '2025-05-07 07:42:44'),
(41, 26, 24, '2025-05-07 07:42:44', '2025-05-07 07:42:44'),
(42, 24, 22, '2025-05-07 07:42:44', '2025-05-07 07:42:44'),
(43, 22, 20, '2025-05-07 07:42:45', '2025-05-07 07:42:45'),
(44, 3, 6, '2025-05-07 07:42:45', '2025-05-07 07:42:45'),
(45, 13, 28, '2025-05-07 07:42:45', '2025-05-07 07:42:45'),
(46, 24, 11, '2025-05-07 07:42:45', '2025-05-07 07:42:45'),
(47, 1, 10, '2025-05-07 07:42:45', '2025-05-07 07:42:45'),
(48, 1, 12, '2025-05-07 07:42:45', '2025-05-07 07:42:45'),
(49, 20, 9, '2025-05-07 07:42:45', '2025-05-07 07:42:45'),
(50, 19, 20, '2025-05-07 07:42:45', '2025-05-07 07:42:45'),
(51, 2, 28, '2025-05-07 07:42:45', '2025-05-07 07:42:45'),
(52, 23, 23, '2025-05-07 07:42:46', '2025-05-07 07:42:46'),
(53, 19, 12, '2025-05-07 07:42:46', '2025-05-07 07:42:46'),
(54, 3, 1, '2025-05-07 07:42:46', '2025-05-07 07:42:46'),
(55, 12, 29, '2025-05-07 07:42:46', '2025-05-07 07:42:46'),
(56, 19, 17, '2025-05-07 07:42:46', '2025-05-07 07:42:46'),
(57, 13, 9, '2025-05-07 07:42:46', '2025-05-07 07:42:46'),
(58, 20, 23, '2025-05-07 07:42:46', '2025-05-07 07:42:46'),
(59, 23, 29, '2025-05-07 07:42:47', '2025-05-07 07:42:47'),
(60, 29, 26, '2025-05-07 07:42:47', '2025-05-07 07:42:47'),
(61, 18, 27, '2025-05-07 07:42:47', '2025-05-07 07:42:47'),
(62, 22, 8, '2025-05-07 07:42:48', '2025-05-07 07:42:48'),
(63, 24, 9, '2025-05-07 07:42:48', '2025-05-07 07:42:48'),
(64, 19, 3, '2025-05-07 07:42:48', '2025-05-07 07:42:48'),
(65, 7, 27, '2025-05-07 07:42:48', '2025-05-07 07:42:48'),
(66, 11, 12, '2025-05-07 07:42:48', '2025-05-07 07:42:48'),
(67, 26, 19, '2025-05-07 07:42:48', '2025-05-07 07:42:48'),
(68, 14, 29, '2025-05-07 07:42:48', '2025-05-07 07:42:48'),
(69, 3, 2, '2025-05-07 07:42:49', '2025-05-07 07:42:49'),
(70, 30, 22, '2025-05-07 07:42:49', '2025-05-07 07:42:49'),
(71, 22, 4, '2025-05-07 07:42:49', '2025-05-07 07:42:49'),
(72, 1, 3, '2025-05-07 07:42:49', '2025-05-07 07:42:49'),
(73, 5, 21, '2025-05-07 07:42:50', '2025-05-07 07:42:50'),
(74, 14, 27, '2025-05-07 07:42:50', '2025-05-07 07:42:50'),
(75, 14, 3, '2025-05-07 07:42:50', '2025-05-07 07:42:50'),
(76, 27, 14, '2025-05-07 07:42:50', '2025-05-07 07:42:50'),
(77, 12, 20, '2025-05-07 07:42:50', '2025-05-07 07:42:50'),
(78, 16, 2, '2025-05-07 07:42:50', '2025-05-07 07:42:50'),
(79, 10, 15, '2025-05-07 07:42:51', '2025-05-07 07:42:51'),
(80, 18, 3, '2025-05-07 07:42:51', '2025-05-07 07:42:51'),
(81, 29, 9, '2025-05-07 07:42:51', '2025-05-07 07:42:51'),
(82, 22, 24, '2025-05-07 07:42:51', '2025-05-07 07:42:51'),
(83, 8, 10, '2025-05-07 07:42:51', '2025-05-07 07:42:51'),
(84, 4, 24, '2025-05-07 07:42:51', '2025-05-07 07:42:51'),
(85, 20, 20, '2025-05-07 07:42:51', '2025-05-07 07:42:51'),
(86, 25, 11, '2025-05-07 07:42:52', '2025-05-07 07:42:52'),
(87, 4, 14, '2025-05-07 07:42:52', '2025-05-07 07:42:52'),
(88, 4, 7, '2025-05-07 07:42:52', '2025-05-07 07:42:52'),
(89, 14, 19, '2025-05-07 07:42:52', '2025-05-07 07:42:52'),
(90, 21, 5, '2025-05-07 07:42:52', '2025-05-07 07:42:52'),
(91, 14, 22, '2025-05-07 07:42:52', '2025-05-07 07:42:52'),
(92, 23, 26, '2025-05-07 07:42:53', '2025-05-07 07:42:53'),
(93, 5, 28, '2025-05-07 07:42:53', '2025-05-07 07:42:53'),
(94, 14, 18, '2025-05-07 07:42:53', '2025-05-07 07:42:53'),
(95, 16, 16, '2025-05-07 07:42:53', '2025-05-07 07:42:53'),
(96, 21, 20, '2025-05-07 07:42:53', '2025-05-07 07:42:53'),
(97, 24, 3, '2025-05-07 07:42:53', '2025-05-07 07:42:53'),
(98, 19, 24, '2025-05-07 07:42:53', '2025-05-07 07:42:53'),
(99, 26, 1, '2025-05-07 07:42:53', '2025-05-07 07:42:53'),
(100, 9, 4, '2025-05-07 07:42:53', '2025-05-07 07:42:53'),
(101, 17, 8, '2025-05-07 07:42:54', '2025-05-07 07:42:54'),
(102, 8, 15, '2025-05-07 07:42:54', '2025-05-07 07:42:54'),
(103, 28, 25, '2025-05-07 07:42:55', '2025-05-07 07:42:55'),
(104, 10, 25, '2025-05-07 07:42:55', '2025-05-07 07:42:55'),
(105, 27, 21, '2025-05-07 07:42:55', '2025-05-07 07:42:55'),
(106, 15, 17, '2025-05-07 07:42:55', '2025-05-07 07:42:55'),
(107, 8, 29, '2025-05-07 07:42:56', '2025-05-07 07:42:56'),
(108, 10, 24, '2025-05-07 07:42:56', '2025-05-07 07:42:56'),
(109, 18, 4, '2025-05-07 07:42:56', '2025-05-07 07:42:56'),
(110, 19, 13, '2025-05-07 07:42:57', '2025-05-07 07:42:57'),
(111, 19, 2, '2025-05-07 07:42:57', '2025-05-07 07:42:57'),
(112, 11, 17, '2025-05-07 07:42:57', '2025-05-07 07:42:57'),
(113, 3, 5, '2025-05-07 07:42:57', '2025-05-07 07:42:57'),
(114, 12, 21, '2025-05-07 07:42:57', '2025-05-07 07:42:57'),
(115, 25, 5, '2025-05-07 07:42:57', '2025-05-07 07:42:57'),
(116, 28, 17, '2025-05-07 07:42:57', '2025-05-07 07:42:57'),
(117, 7, 30, '2025-05-07 07:42:58', '2025-05-07 07:42:58'),
(118, 25, 18, '2025-05-07 07:42:58', '2025-05-07 07:42:58'),
(119, 22, 9, '2025-05-07 07:42:58', '2025-05-07 07:42:58'),
(120, 5, 29, '2025-05-07 07:42:58', '2025-05-07 07:42:58'),
(121, 3, 8, '2025-05-07 07:42:59', '2025-05-07 07:42:59'),
(122, 2, 30, '2025-05-07 07:42:59', '2025-05-07 07:42:59'),
(123, 24, 16, '2025-05-07 07:42:59', '2025-05-07 07:42:59'),
(124, 22, 15, '2025-05-07 07:43:00', '2025-05-07 07:43:00'),
(125, 6, 8, '2025-05-07 07:43:00', '2025-05-07 07:43:00'),
(126, 3, 12, '2025-05-07 07:43:00', '2025-05-07 07:43:00'),
(127, 7, 13, '2025-05-07 07:43:00', '2025-05-07 07:43:00'),
(128, 17, 10, '2025-05-07 07:43:00', '2025-05-07 07:43:00'),
(129, 1, 5, '2025-05-07 07:43:00', '2025-05-07 07:43:00'),
(130, 25, 1, '2025-05-07 07:43:01', '2025-05-07 07:43:01'),
(131, 10, 17, '2025-05-07 07:43:01', '2025-05-07 07:43:01'),
(132, 13, 1, '2025-05-07 07:43:01', '2025-05-07 07:43:01'),
(133, 6, 18, '2025-05-07 07:43:01', '2025-05-07 07:43:01'),
(134, 6, 26, '2025-05-07 07:43:02', '2025-05-07 07:43:02'),
(135, 28, 8, '2025-05-07 07:43:02', '2025-05-07 07:43:02'),
(136, 8, 12, '2025-05-07 07:43:02', '2025-05-07 07:43:02'),
(137, 7, 21, '2025-05-07 07:43:02', '2025-05-07 07:43:02'),
(138, 21, 30, '2025-05-07 07:43:02', '2025-05-07 07:43:02'),
(139, 10, 8, '2025-05-07 07:43:02', '2025-05-07 07:43:02'),
(140, 17, 7, '2025-05-07 07:43:02', '2025-05-07 07:43:02'),
(141, 17, 17, '2025-05-07 07:43:03', '2025-05-07 07:43:03'),
(142, 8, 4, '2025-05-07 07:43:03', '2025-05-07 07:43:03'),
(143, 10, 23, '2025-05-07 07:43:04', '2025-05-07 07:43:04'),
(144, 2, 14, '2025-05-07 07:43:04', '2025-05-07 07:43:04'),
(145, 19, 9, '2025-05-07 07:43:04', '2025-05-07 07:43:04'),
(146, 21, 16, '2025-05-07 07:43:05', '2025-05-07 07:43:05'),
(147, 23, 2, '2025-05-07 07:43:05', '2025-05-07 07:43:05'),
(148, 18, 15, '2025-05-07 07:43:05', '2025-05-07 07:43:05'),
(149, 29, 4, '2025-05-07 07:43:05', '2025-05-07 07:43:05'),
(150, 20, 17, '2025-05-07 07:43:05', '2025-05-07 07:43:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `api_token` varchar(80) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_years`
--
ALTER TABLE `academic_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_keys`
--
ALTER TABLE `api_keys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `api_keys_username_unique` (`username`),
  ADD UNIQUE KEY `api_keys_api_key_unique` (`api_key`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_program_id_foreign` (`program_id`);

--
-- Indexes for table `course_evaluations`
--
ALTER TABLE `course_evaluations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_evaluations_student_id_foreign` (`student_id`),
  ADD KEY `course_evaluations_course_id_foreign` (`course_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_departments_college_id` (`college_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instructors_department_id_foreign` (`department_id`),
  ADD KEY `instructors_course_id_foreign` (`course_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programs_department_id_foreign` (`department_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_registration_number_unique` (`registration_number`),
  ADD UNIQUE KEY `students_token_unique` (`token`),
  ADD KEY `students_academic_year_id_foreign` (`academic_year_id`),
  ADD KEY `students_program_id_foreign` (`program_id`),
  ADD KEY `students_course_id_foreign` (`course_id`),
  ADD KEY `students_department_id_foreign` (`department_id`);

--
-- Indexes for table `student_courses`
--
ALTER TABLE `student_courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_courses_student_id_course_id_unique` (`student_id`,`course_id`),
  ADD KEY `student_courses_course_id_foreign` (`course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_api_token_unique` (`api_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_years`
--
ALTER TABLE `academic_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `api_keys`
--
ALTER TABLE `api_keys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `course_evaluations`
--
ALTER TABLE `course_evaluations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `student_courses`
--
ALTER TABLE `student_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`);

--
-- Constraints for table `course_evaluations`
--
ALTER TABLE `course_evaluations`
  ADD CONSTRAINT `course_evaluations_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `course_evaluations_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `fk_departments_colleges` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `instructors`
--
ALTER TABLE `instructors`
  ADD CONSTRAINT `instructors_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `instructors_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `programs`
--
ALTER TABLE `programs`
  ADD CONSTRAINT `programs_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_academic_year_id_foreign` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_years` (`id`),
  ADD CONSTRAINT `students_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `students_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `students_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`);

--
-- Constraints for table `student_courses`
--
ALTER TABLE `student_courses`
  ADD CONSTRAINT `student_courses_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_courses_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
