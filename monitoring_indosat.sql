-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2021 at 05:35 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoring_indosat`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kpi`
--

CREATE TABLE `kpi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `micro_cluster` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_outlet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `not_order` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `msa_target` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `msa_ach` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `msa_gap` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `msa_percen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `msa_nilai` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `omb_target` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `omb_ach` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `omb_gap` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `omb_percen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `omb_nilai` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qsso_target` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qsso_ach` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qsso_gap` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qsso_percen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qsso_nilai` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quro_target` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quro_ach` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quro_gap` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quro_percen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quro_nilai` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sc_target` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sc_ach` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sc_gap` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sc_percen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sc_nilai` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ssohvc_target` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ssohvc_ach` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ssohvc_gap` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ssohvc_percen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ssohvc_nilai` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sqsso_target` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sqsso_ach` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sqsso_gap` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sqsso_percen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sqsso_nilai` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ssc_target` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ssc_ach` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ssc_gap` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ssc_percen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ssc_nilai` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `score` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `last_upload`
--

CREATE TABLE `last_upload` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waktu_upload` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `last_upload`
--

INSERT INTO `last_upload` (`id`, `kategori`, `waktu_upload`, `created_at`, `updated_at`) VALUES
(1, 'kpi_outlet', NULL, NULL, NULL),
(2, 'site', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_02_13_005846_create_site', 1),
(7, '2021_02_14_034502_create_outlet', 1),
(8, '2021_02_14_135751_create_kpi', 1),
(9, '2021_02_15_130501_create_sessions_table', 1),
(10, '2021_02_15_153156_create_last_upload_table', 1),
(11, '2021_02_22_154041_create_rencana_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `outlet`
--

CREATE TABLE `outlet` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `outlet_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outlet_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `micro_cluster` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobo_transaction` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sultan_target` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sultan_ach` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sultan_percen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jawara_target` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jawara_ach` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jawara_percen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sellin_sp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sellin_daily` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobo_daily` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rencana`
--

CREATE TABLE `rencana` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `cso_id` int(11) DEFAULT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci,
  `rencana_start` date DEFAULT NULL,
  `rencana_end` date DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('bcCTjM1M5w5GLUXeFEUlPBUlFZFuxltQmiwFUDcT', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiVXdiSzQ5c2NjT3J5NEJNTmdYTkxEbzFMdld4Wm56c2lmeGNHT3Q2WiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJG1PcEQ1OHc1RDRlUVNkZDcwdXZ1NU95MGtVbkF2TWZtUzdCc2o3dHdRUDh5eTVZdGt3VGx1IjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRtT3BENTh3NUQ0ZVFTZGQ3MHV2dTVPeTBrVW5Bdk1mbVM3QnNqN3R3UVA4eXk1WXRrd1RsdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9vdXRsZXQtZGF0YSI7fX0=', 1614789301);

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE `site` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `micro_cluster` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coverage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outlet_surrounding` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_outlet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uro` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sso` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quro` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qsso` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revenue` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gap_revenue` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `micro_cluster_user` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `micro_cluster_user`, `name`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `role`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, 'Admin', NULL, '$2y$10$mOpD58w5D4eQSdd70uvu5Oy0kUnAvMfmS7Bsj7twQP8yy5YtkwTlu', NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, '2021-03-03 16:32:48', '2021-03-03 16:33:53');

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
-- Indexes for table `kpi`
--
ALTER TABLE `kpi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kpi_username_unique` (`username`);

--
-- Indexes for table `last_upload`
--
ALTER TABLE `last_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outlet`
--
ALTER TABLE `outlet`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `outlet_outlet_id_unique` (`outlet_id`);

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
-- Indexes for table `rencana`
--
ALTER TABLE `rencana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `site_site_id_unique` (`site_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kpi`
--
ALTER TABLE `kpi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `last_upload`
--
ALTER TABLE `last_upload`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `outlet`
--
ALTER TABLE `outlet`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rencana`
--
ALTER TABLE `rencana`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
