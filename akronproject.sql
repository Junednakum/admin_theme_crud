-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 30, 2023 at 05:25 PM
-- Server version: 8.0.31-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akronproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_no` int NOT NULL,
  `machine_type_id` int UNSIGNED NOT NULL,
  `department_id` int UNSIGNED NOT NULL,
  `site_id` int UNSIGNED NOT NULL,
  `setup_time` int NOT NULL,
  `output_per_hours` int NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `is_deleted` int NOT NULL DEFAULT '0',
  `created_by` int NOT NULL DEFAULT '1',
  `deleted_by` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `item_no`, `machine_type_id`, `department_id`, `site_id`, `setup_time`, `output_per_hours`, `status`, `is_deleted`, `created_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'Item 1', 2020, 1, 1, 1, 15, 2000, 0, 0, 1, 1, NULL, NULL),
(2, 'item 2', 202, 1, 1, 2, 10, 1500, 0, 0, 1, 1, NULL, NULL),
(3, 'demo', 1, 1, 1, 1, 5, 2000, 0, 0, 1, 1, '2022-09-13 23:54:36', '2022-09-13 23:54:36');

-- --------------------------------------------------------

--
-- Table structure for table `machine_types`
--

CREATE TABLE `machine_types` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hours_per_day` double(8,2) NOT NULL,
  `overtime` double(8,2) NOT NULL,
  `number_of_machines` int NOT NULL,
  `first_shift_machines` int NOT NULL,
  `second_shift_machines` int NOT NULL,
  `site` int NOT NULL,
  `Department` int NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `is_deleted` int NOT NULL DEFAULT '0',
  `created_by` int NOT NULL DEFAULT '1',
  `deleted_by` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `machine_types`
--

INSERT INTO `machine_types` (`id`, `name`, `hours_per_day`, `overtime`, `number_of_machines`, `first_shift_machines`, `second_shift_machines`, `site`, `Department`, `status`, `is_deleted`, `created_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'abc', 7.00, 0.00, 1, 1, 1, 1, 1, 0, 0, 1, 1, NULL, NULL),
(2, 'abc', 7.00, 0.00, 1, 1, 1, 1, 1, 0, 0, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(16, '2022_09_13_065705_create_production_departments_table', 2),
(17, '2022_09_13_065712_create_machine_types_table', 2),
(20, '2022_09_13_123854_create_sites_table', 4),
(21, '2022_09_13_065731_create_items_table', 5);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `production_departments`
--

CREATE TABLE `production_departments` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `is_deleted` int NOT NULL DEFAULT '0',
  `created_by` int NOT NULL DEFAULT '1',
  `deleted_by` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `production_departments`
--

INSERT INTO `production_departments` (`id`, `name`, `status`, `is_deleted`, `created_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'bca', 0, 0, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `is_deleted` int NOT NULL DEFAULT '0',
  `created_by` int NOT NULL DEFAULT '1',
  `deleted_by` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `name`, `status`, `is_deleted`, `created_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'N', 0, 0, 1, 1, NULL, NULL),
(2, 'T', 0, 0, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` int NOT NULL,
  `role` int NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `user_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` int NOT NULL DEFAULT '0',
  `last_active_time` datetime NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `email_verified_at`, `mobile`, `password`, `department`, `role`, `designation`, `status`, `user_image`, `is_deleted`, `last_active_time`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', NULL, NULL, '$2a$04$RyVBlNUQRff3ePOyuQJQXOvOwAh5eu0CiCtjAPmy3LUX7pSde6xly', 1, 1, 'developer', 0, 'Screenshot from 2022-09-08 11-08-07.png', 0, '2022-09-12 13:16:45', NULL, NULL, '2022-09-12 06:55:24', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_machine_type_id_index` (`machine_type_id`),
  ADD KEY `items_department_id_index` (`department_id`),
  ADD KEY `items_site_id_index` (`site_id`);

--
-- Indexes for table `machine_types`
--
ALTER TABLE `machine_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `production_departments`
--
ALTER TABLE `production_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `machine_types`
--
ALTER TABLE `machine_types`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `production_departments`
--
ALTER TABLE `production_departments`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `production_departments` (`id`),
  ADD CONSTRAINT `items_machine_type_id_foreign` FOREIGN KEY (`machine_type_id`) REFERENCES `machine_types` (`id`),
  ADD CONSTRAINT `items_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
