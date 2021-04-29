-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2021 at 03:05 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `ep_bloodgroups`
--

CREATE TABLE `ep_bloodgroups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bloodgroups` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ep_bloodgroups`
--

INSERT INTO `ep_bloodgroups` (`id`, `bloodgroups`, `created_at`, `updated_at`, `active_status`, `created_by`, `updated_by`) VALUES
(9, 'A(+ve)', '2020-10-29 19:57:53', '2020-11-21 06:47:22', 1, 1, 1),
(10, 'A(-ve)', '2020-10-29 19:57:53', '2020-11-09 12:53:00', 1, 1, 1),
(11, 'B(+ve)', '2020-10-29 20:02:13', '2020-11-09 12:46:40', 1, 1, NULL),
(12, 'B(-ve)', '2020-10-29 20:02:13', '2020-11-09 12:46:44', 1, 1, NULL),
(13, 'AB(+ve)', '2020-10-29 20:02:13', '2020-11-09 12:53:19', 1, 1, NULL),
(14, 'AB(-ve)', '2020-10-29 20:02:13', '2020-11-10 06:33:15', 1, 1, NULL),
(15, 'O(+ve)', '2020-10-29 20:02:13', '2020-11-10 06:33:19', 1, 1, NULL),
(52, 'O(-ve)', '2020-11-30 08:39:40', '2020-11-30 08:39:40', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ep_genders`
--

CREATE TABLE `ep_genders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `genders` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ep_genders`
--

INSERT INTO `ep_genders` (`id`, `genders`, `created_at`, `updated_at`, `active_status`, `created_by`, `updated_by`) VALUES
(1, 'Male', NULL, NULL, 1, NULL, NULL),
(2, 'Female', NULL, NULL, 1, NULL, NULL),
(3, 'Other', NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ep_religions`
--

CREATE TABLE `ep_religions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `religions` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ep_religions`
--

INSERT INTO `ep_religions` (`id`, `religions`, `created_at`, `updated_at`, `active_status`, `created_by`, `updated_by`) VALUES
(1, 'Islam', NULL, '2020-10-31 06:31:56', 1, NULL, 1),
(2, 'Hinduism', NULL, NULL, 1, NULL, NULL),
(3, 'Buddhists', NULL, NULL, 1, NULL, NULL),
(4, 'Christians', NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_10_14_195630_create_permission_tables', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2020_10_14_195444_create_ep_bloodgroups_table', 2),
(6, '2020_10_14_195511_create_ep_religions_table', 2),
(7, '2020_10_14_195524_create_ep_student_categorys_table', 2),
(8, '2020_10_14_195536_create_ep_classes_table', 2),
(9, '2020_10_14_195605_create_ep_sections_table', 2),
(10, '2020_10_14_195616_create_ep_sessions_table', 2),
(11, '2020_10_14_195629_create_ep_genders_table', 2),
(12, '2020_10_14_195631_create_ep_parents_table', 2),
(13, '2020_10_14_195649_create_ep_students_table', 2),
(14, '2020_10_17_175541_create_class_has_section_table', 3),
(15, '2020_10_17_182210_create_ep_departments_table', 3),
(16, '2020_10_17_182241_create_ep_designations_table', 3),
(21, '2020_11_26_154318_create_salary_increments_table', 6),
(22, '2020_11_26_154352_create_salary_deductions_table', 6),
(23, '2020_11_26_160143_create_salary_process_table', 7),
(24, '2020_10_17_184917_create_ep_staffs_table', 8),
(25, '2020_11_11_160758_create_subjects_table', 9),
(26, '2020_12_05_113712_create_ep_classrooms_table', 10),
(27, '2020_12_05_124459_create_ep_classtimes_table', 11),
(29, '2020_12_05_145157_create_ep_classroutine_table', 12),
(30, '2020_12_10_122911_create_ep_fees_types_table', 13),
(31, '2020_12_10_122951_create_ep_fees_setup_table', 13),
(32, '2020_12_11_134712_create_ep_assign_fees_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 2),
(3, 'App\\User', 34),
(4, 'App\\User', 15),
(4, 'App\\User', 17),
(4, 'App\\User', 19),
(4, 'App\\User', 55),
(4, 'App\\User', 57),
(4, 'App\\User', 59),
(4, 'App\\User', 60),
(4, 'App\\User', 61),
(4, 'App\\User', 62),
(5, 'App\\User', 16),
(5, 'App\\User', 20),
(5, 'App\\User', 22),
(5, 'App\\User', 56),
(5, 'App\\User', 58),
(5, 'App\\User', 63),
(10, 'App\\User', 32),
(10, 'App\\User', 33),
(10, 'App\\User', 35),
(10, 'App\\User', 36),
(10, 'App\\User', 37),
(10, 'App\\User', 38),
(10, 'App\\User', 64),
(10, 'App\\User', 65),
(10, 'App\\User', 66),
(10, 'App\\User', 67);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create-bloodgroup', 'web', '2020-11-02 09:27:20', '2020-11-02 09:27:20'),
(2, 'read-bloodgroup', 'web', '2020-11-02 09:27:56', '2020-11-02 09:27:56'),
(3, 'edit-bloodgroup', 'web', '2020-11-02 09:28:16', '2020-11-02 09:29:18'),
(4, 'delete-bloodgroup', 'web', '2020-11-02 09:29:06', '2020-11-02 09:29:06'),
(7, 'create-religion', 'web', '2020-11-06 01:31:27', '2020-11-06 01:31:27'),
(8, 'read-religion', 'web', '2020-11-06 01:32:32', '2020-11-06 01:32:32'),
(9, 'edit-religion', 'web', '2020-11-06 01:32:44', '2020-11-06 01:32:44'),
(10, 'delete-religion', 'web', '2020-11-06 01:32:59', '2020-11-06 01:32:59'),
(11, 'create-gender', 'web', '2020-11-06 01:33:12', '2020-11-06 01:33:12'),
(12, 'read-gender', 'web', '2020-11-06 01:33:23', '2020-11-06 01:33:23'),
(13, 'edit-gender', 'web', '2020-11-06 01:33:34', '2020-11-06 01:33:34'),
(14, 'delete-gender', 'web', '2020-11-06 01:33:45', '2020-11-06 01:33:45'),
(15, 'create-role', 'web', '2020-11-06 01:33:55', '2020-11-06 01:33:55'),
(16, 'read-role', 'web', '2020-11-06 01:34:07', '2020-11-06 01:34:07'),
(17, 'edit-role', 'web', '2020-11-06 01:34:17', '2020-11-06 01:34:17'),
(18, 'delete-role', 'web', '2020-11-06 01:34:27', '2020-11-06 01:34:27'),
(19, 'create-permission', 'web', '2020-11-06 01:34:39', '2020-11-06 01:34:39'),
(20, 'read-permission', 'web', '2020-11-06 01:34:52', '2020-11-06 01:34:52'),
(21, 'edit-permission', 'web', '2020-11-06 01:35:04', '2020-11-06 01:35:04'),
(22, 'delete-permission', 'web', '2020-11-06 01:35:14', '2020-11-06 01:35:14');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Administrator', 'web', '2020-11-02 08:47:13', '2020-11-02 11:23:04'),
(2, 'Administrator', 'web', '2020-11-02 08:49:53', '2020-11-02 08:49:53'),
(3, 'Teacher', 'web', '2020-11-02 08:51:29', '2020-11-02 08:51:29'),
(4, 'Student', 'web', '2020-11-02 08:51:48', '2020-11-02 08:51:48'),
(5, 'Parent', 'web', '2020-11-02 08:52:05', '2020-11-14 11:58:32'),
(6, 'Accountant', 'web', '2020-11-02 08:52:37', '2020-11-02 08:52:37'),
(7, 'HR Admin', 'web', '2020-11-02 08:53:02', '2020-11-02 08:53:02'),
(8, 'Librarian', 'web', '2020-11-02 08:55:03', '2020-11-02 08:55:03'),
(10, 'General', 'web', '2020-11-25 09:16:06', '2020-11-25 09:16:06');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `active_status`, `created_at`, `updated_at`, `user_type`) VALUES
(1, 'Prodip M', 'munshiprodip@gmail.com', NULL, '$2y$10$HqOgIgf2h9Gij0lDuKzADOtnPuNLIqNb6KvKoy.0fr4ck7g.QNiYe', NULL, 1, '2020-10-29 13:38:46', '2020-10-29 13:38:46', 'Employee'),
(55, 'Nazmul', 'nazmul@gmail.com', NULL, '$2y$10$/QqBfa8pVK2c7/hG4QfpG.d17NuWd8.8vcggpY8pcRPRafzVyXfK.', NULL, 1, '2020-11-30 11:01:04', '2020-11-30 11:01:04', 'Student'),
(56, 'Md. Golam Hossen', 'nazmulfather@gmail.com', NULL, '$2y$10$z.iTLRkCMrJm9Ax4h17T..7QWoPm/AKrkezU2SLv8w86KoWqfv8t.', NULL, 1, '2020-11-30 11:01:04', '2020-11-30 11:01:04', 'Parent'),
(57, 'Md. Ibrahim', 'ibrahim@gmail.com', NULL, '$2y$10$WZhD7Mm5gbpCTy//fgK77uXhzVlux8uinlNK/GWt48jqJ3lG3qWQe', NULL, 1, '2020-11-30 11:05:49', '2020-11-30 11:05:49', 'Student'),
(58, 'Hanif Sardar', 'ibrahimfather@gmail.com', NULL, '$2y$10$S7Af69RmCw5o7MdUhSx9IebPytBr/yzEB5ztQa1APx01c0R9upEMO', NULL, 1, '2020-11-30 11:05:49', '2020-11-30 11:05:49', 'Parent'),
(59, 'shahidul', 'shahidul@gmail.com', NULL, '$2y$10$ISRYM2BhfQDb9djLrdqqVOybPwYDmNPa3l3lMz9SynUlj/5nmKBZa', NULL, 1, '2020-11-30 11:12:57', '2020-11-30 11:12:57', 'Student'),
(60, 'shahin', 'shahin@gmail.com', NULL, '$2y$10$sLEUatreVY41LhljVx3vDuGUs9ar87n49bbPxOKRtljjuqUQSzyd2', NULL, 1, '2020-11-30 11:15:23', '2020-11-30 11:15:23', 'Student'),
(61, 'Subrato', 'subrato@gmail.com', NULL, '$2y$10$IqDrm.a.AwfWKTvk8s2ybeOmS0YVQEp2bJByem0bDZtNIUQpr44sK', NULL, 1, '2020-11-30 11:17:12', '2020-11-30 11:17:12', 'Student'),
(62, 'Shafiq', 'shafiq@gmail.com', NULL, '$2y$10$/RF/CpP8y3B/yJleNelKtuir/vScbiz.VAOPCkFiPgOZn/6mmIS8O', NULL, 1, '2020-11-30 11:19:56', '2020-11-30 11:19:56', 'Student'),
(63, 'Rahim Howlader', 'shafiqfather@gmail.com', NULL, '$2y$10$ywHn3LwY1Df4UKx0RyGrfe11d7r9DgjbuDmjY8YrAEcrBJX3qFkfW', NULL, 1, '2020-11-30 11:19:56', '2020-11-30 11:19:56', 'Parent'),
(64, 'Prodip Munshi', 'munshiprodip2@gmail.com', NULL, '$2y$10$UlYKaAtTdCuRp4Aju1ouO.FRrvEC.sSjtQJ7MX9EoFkc6wbLVgu4O', NULL, 1, '2020-11-30 11:29:11', '2020-11-30 11:29:11', 'Employee'),
(65, 'Nazmul Alom', 'nazmulalom@gmail.com', NULL, '$2y$10$hK5Urz4UAAXMSlobHSoSz.U8.ac5JpNUqGjjMrpYnPBEJITfniTMm', NULL, 1, '2020-12-05 05:18:25', '2020-12-05 05:18:25', 'Employee'),
(66, 'Gopal Sikdar', 'gopal@gmail.com', NULL, '$2y$10$IBXfBy2e8R3qAQj2GL3mJ..LvzIw8k.i5gAEWkBEPvuFlVidZ8/.G', NULL, 1, '2020-12-05 05:22:27', '2020-12-05 05:22:27', 'Employee'),
(67, 'Shafiq Hawlader', 'shafiqhawlader@gmail.com', NULL, '$2y$10$V0rHXuCp4V2QF3XDa2gLGOt3nHREjxVLVa2tCxZnwNU7YEtSzfqgG', NULL, 1, '2020-12-05 05:26:28', '2020-12-07 12:28:56', 'Employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ep_bloodgroups`
--
ALTER TABLE `ep_bloodgroups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ep_bloodgroups_created_by_foreign` (`created_by`),
  ADD KEY `ep_bloodgroups_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `ep_genders`
--
ALTER TABLE `ep_genders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ep_genders_created_by_foreign` (`created_by`),
  ADD KEY `ep_genders_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `ep_religions`
--
ALTER TABLE `ep_religions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ep_religions_created_by_foreign` (`created_by`),
  ADD KEY `ep_religions_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `ep_bloodgroups`
--
ALTER TABLE `ep_bloodgroups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `ep_genders`
--
ALTER TABLE `ep_genders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ep_religions`
--
ALTER TABLE `ep_religions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ep_bloodgroups`
--
ALTER TABLE `ep_bloodgroups`
  ADD CONSTRAINT `ep_bloodgroups_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ep_bloodgroups_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ep_genders`
--
ALTER TABLE `ep_genders`
  ADD CONSTRAINT `ep_genders_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ep_genders_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ep_religions`
--
ALTER TABLE `ep_religions`
  ADD CONSTRAINT `ep_religions_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ep_religions_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
