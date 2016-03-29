-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2016 at 04:36 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testplans_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(10) UNSIGNED NOT NULL,
  `testplan_id` int(10) UNSIGNED NOT NULL,
  `testcase_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `testplan_id`, `testcase_id`, `created_at`, `updated_at`) VALUES
(26, 2, 6, NULL, NULL),
(27, 2, 7, NULL, NULL),
(28, 2, 8, NULL, NULL),
(29, 2, 9, NULL, NULL),
(30, 2, 10, NULL, NULL),
(31, 2, 11, NULL, NULL),
(32, 2, 12, NULL, NULL),
(33, 3, 4, NULL, NULL),
(34, 3, 5, NULL, NULL),
(35, 3, 6, NULL, NULL),
(36, 3, 7, NULL, NULL),
(37, 3, 8, NULL, NULL),
(38, 3, 9, NULL, NULL),
(39, 3, 10, NULL, NULL),
(40, 3, 11, NULL, NULL),
(41, 3, 12, NULL, NULL),
(42, 4, 4, NULL, NULL),
(43, 4, 5, NULL, NULL),
(44, 4, 6, NULL, NULL),
(45, 4, 7, NULL, NULL),
(46, 4, 8, NULL, NULL),
(47, 4, 9, NULL, NULL),
(48, 4, 10, NULL, NULL),
(49, 4, 11, NULL, NULL),
(50, 4, 12, NULL, NULL),
(51, 2, 4, NULL, NULL),
(52, 2, 5, NULL, NULL),
(53, 2, 13, NULL, NULL),
(54, 2, 14, NULL, NULL),
(55, 2, 15, NULL, NULL),
(56, 2, 16, NULL, NULL),
(57, 2, 17, NULL, NULL),
(58, 2, 18, NULL, NULL),
(59, 2, 19, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `testcase_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `testcase_id`, `user_id`, `created_at`, `updated_at`) VALUES
(67, '123', 6, 1, '2016-03-28 11:50:53', '2016-03-28 11:50:53'),
(68, '123', 6, 1, '2016-03-28 12:47:49', '2016-03-28 12:47:49'),
(69, '123', 6, 1, '2016-03-28 12:52:03', '2016-03-28 12:52:03'),
(70, '123', 6, 1, '2016-03-28 12:52:09', '2016-03-28 12:52:09'),
(71, '456', 6, 1, '2016-03-28 12:52:24', '2016-03-28 12:52:24'),
(72, 'qq', 6, 1, '2016-03-28 12:55:08', '2016-03-28 12:55:08'),
(73, '111', 6, 1, '2016-03-28 19:33:06', '2016-03-28 19:33:06');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_03_20_144610_create_tasks_table', 1),
('2016_03_20_144636_create_status_table', 1),
('2016_03_20_144652_create_roles_table', 1),
('2016_03_20_144905_create_testcases_table', 1),
('2016_03_20_144923_create_testplans_table', 1),
('2016_03_20_144945_create_comments_table', 1),
('2016_03_20_145017_create_assignments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2016-03-21 14:49:06', '2016-03-21 14:49:06'),
(2, 'Lead', '2016-03-21 14:49:26', '2016-03-21 14:49:26'),
(3, 'Tester', '2016-03-21 14:49:26', '2016-03-21 14:49:26');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pass', '2016-03-21 14:57:48', '2016-03-21 14:57:48'),
(2, 'Fail', '2016-03-21 14:57:48', '2016-03-21 14:57:48'),
(3, 'Retest', '2016-03-21 14:58:08', '2016-03-21 14:58:08'),
(4, 'Untest', '2016-03-21 14:58:08', '2016-03-21 14:58:08');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'CONG HOAN', '2016-03-21 08:54:22', '2016-03-21 08:54:22');

-- --------------------------------------------------------

--
-- Table structure for table `testcases`
--

CREATE TABLE `testcases` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descriptions` text COLLATE utf8_unicode_ci NOT NULL,
  `preconditions` text COLLATE utf8_unicode_ci NOT NULL,
  `steps` text COLLATE utf8_unicode_ci NOT NULL,
  `actualy_result` text COLLATE utf8_unicode_ci NOT NULL,
  `expected_result` text COLLATE utf8_unicode_ci NOT NULL,
  `id_status` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `testcases`
--

INSERT INTO `testcases` (`id`, `title`, `descriptions`, `preconditions`, `steps`, `actualy_result`, `expected_result`, `id_status`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 'Test case 1', 'this is test case 1', 'run on Windows', '1\r\n2\r\n3\r\n4\r\n5\r\n6\r\n', '', 'Successfull all :)', 4, 1, '2016-03-21 08:00:04', '2016-03-23 08:46:35'),
(5, 'Test case demo 2', 'dsc', 'bla bla ', 'bla bla bla bla \r\nbla bla \r\nbla bla \r\nbla bla \r\nbla bla \r\n', '', 'bla bla ', 4, 1, '2016-03-21 21:34:59', '2016-03-21 21:34:59'),
(6, 'bla bla ', 'bla bla ', 'bla bla ', 'bla blbla bla a \r\nbla bla \r\nbla bla ', '123', 'bla bla ', 4, 1, '2016-03-21 21:35:08', '2016-03-28 11:50:10'),
(7, 'Test case demo', 'bla bla ', 'bla bla ', 'bla bla ', '', 'bla bla ', 4, 1, '2016-03-22 10:38:36', '2016-03-22 10:38:36'),
(8, '1', '', '', '1', '', '', 4, 1, '2016-03-25 21:38:16', '2016-03-25 21:38:16'),
(9, '2', '', '', '3', '', '', 4, 1, '2016-03-25 21:38:20', '2016-03-25 21:38:20'),
(10, '3', '', '', '4', '', '', 4, 1, '2016-03-25 21:38:24', '2016-03-25 21:38:24'),
(11, '4', '', '', '5', '', '', 4, 1, '2016-03-25 21:38:30', '2016-03-25 21:38:30'),
(12, '5', '', '', '6', '', '', 4, 1, '2016-03-25 21:38:37', '2016-03-25 21:38:37'),
(13, '11', '1', '', '11', '', '', 4, 1, '2016-03-26 09:35:48', '2016-03-26 09:35:48'),
(14, '11', '11', '11', '11', '', '11', 4, 1, '2016-03-26 09:35:55', '2016-03-26 09:35:55'),
(15, '111', '111', '1111', '1111', '', '111', 4, 1, '2016-03-26 09:36:02', '2016-03-26 09:36:02'),
(16, '222', '222', '222', '222', '', '222', 4, 1, '2016-03-26 09:36:09', '2016-03-26 09:36:09'),
(17, '333', '333', '333', '333', '', '333', 4, 1, '2016-03-26 09:36:16', '2016-03-26 09:36:16'),
(18, '555', '555', '555', '555', '', '555', 4, 1, '2016-03-26 09:37:13', '2016-03-26 09:37:13'),
(19, '666', '666', '666', '666', '', '666', 4, 1, '2016-03-26 09:37:20', '2016-03-26 09:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `testplans`
--

CREATE TABLE `testplans` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descriptions` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `testplans`
--

INSERT INTO `testplans` (`id`, `name`, `descriptions`, `user_id`, `created_at`, `updated_at`) VALUES
(2, '123123123', '1123123123123123', 1, '2016-03-24 09:51:08', '2016-03-24 09:51:08'),
(3, '123123', '123123', 1, '2016-03-25 22:50:21', '2016-03-25 22:50:21'),
(4, '22222', '222222', 1, '2016-03-25 23:06:11', '2016-03-25 23:06:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tran Hoan', 'hpcisme@gmail.com', '$2y$10$.F6GW/EgDNgAnfiWY.6K4OLmgcY9bi5yuA5XZhwEoRiGfKKvNCwoW', 1, 'MrtSCYhaY6LqZiSSXaMDUcgn5toaoTwNgU3jzyBoVjvzt1xQXhyqIGd3JvBM', '2016-03-21 07:49:49', '2016-03-27 19:11:49'),
(2, 'CONG HOAN', 'hpcisme123@gmail.com', '$2y$10$jJnQCSgkjOgIidoh2zmC2.2abSFECDaz8b2A/nUwEwy0AEO0Ww1hG', 2, '2c1LsaXeiZk4gXtWtunsUmQYINHgvjTZcY0bcGoTTvpZlJlcp3bhNKXY0Trk', '2016-03-27 09:24:30', '2016-03-27 09:24:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignments_plan_id_foreign` (`testplan_id`),
  ADD KEY `assignments_testcase_id_foreign` (`testcase_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_testcase_id_foreign` (`testcase_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_user_id_index` (`user_id`);

--
-- Indexes for table `testcases`
--
ALTER TABLE `testcases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testcases_id_status_foreign` (`id_status`),
  ADD KEY `testcases_user_id_foreign` (`user_id`);

--
-- Indexes for table `testplans`
--
ALTER TABLE `testplans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testplans_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `testcases`
--
ALTER TABLE `testcases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `testplans`
--
ALTER TABLE `testplans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_plan_id_foreign` FOREIGN KEY (`testplan_id`) REFERENCES `testplans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assignments_testcase_id_foreign` FOREIGN KEY (`testcase_id`) REFERENCES `testcases` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_testcase_id_foreign` FOREIGN KEY (`testcase_id`) REFERENCES `testcases` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `testcases`
--
ALTER TABLE `testcases`
  ADD CONSTRAINT `testcases_id_status_foreign` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `testcases_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `testplans`
--
ALTER TABLE `testplans`
  ADD CONSTRAINT `testplans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
