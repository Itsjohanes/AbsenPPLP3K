-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 21, 2023 at 02:51 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forge`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `id_user`, `nim`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
(3, 5, '2004561', '089643953186', 'Batujajar Bandung Barat', '2023-04-21 05:26:59', '2023-04-21 05:26:59'),
(4, 8, '2002895', '081934172542', 'Taman Holis Indah G3/3', '2023-04-21 06:44:59', '2023-04-21 06:44:59');

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
-- Table structure for table `guru_p3k`
--

CREATE TABLE `guru_p3k` (
  `id` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guru_p3k`
--

INSERT INTO `guru_p3k` (`id`, `id_user`, `nim`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 6, '2004561', '089634953186', 'Batujajar', '2023-04-21 05:26:59', '2023-04-21 05:26:59'),
(3, 10, '2002895', '081934172542', 'Taman Holis Indah G3/3', '2023-04-21 06:49:12', '2023-04-21 06:49:12');

-- --------------------------------------------------------

--
-- Table structure for table `guru_p3k_absens`
--

CREATE TABLE `guru_p3k_absens` (
  `id` bigint UNSIGNED NOT NULL,
  `id_guru_p3k` bigint UNSIGNED NOT NULL,
  `tgl` date NOT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `jam_kerja` time DEFAULT NULL,
  `lokasi_absen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guru_p3k_absens`
--

INSERT INTO `guru_p3k_absens` (`id`, `id_guru_p3k`, `tgl`, `jam_masuk`, `jam_keluar`, `jam_kerja`, `lokasi_absen`, `created_at`, `updated_at`) VALUES
(1, 3, '2023-04-21', '21:45:46', '21:45:53', '00:00:07', NULL, '2023-04-21 07:45:46', '2023-04-21 07:45:53');

-- --------------------------------------------------------

--
-- Table structure for table `guru_ppl`
--

CREATE TABLE `guru_ppl` (
  `id` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guru_ppl`
--

INSERT INTO `guru_ppl` (`id`, `id_user`, `nim`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 7, '747123912032013', '085756219908', 'Pimpi', '2023-04-21 05:26:59', '2023-04-21 05:26:59');

-- --------------------------------------------------------

--
-- Table structure for table `guru_ppl_absens`
--

CREATE TABLE `guru_ppl_absens` (
  `id` bigint UNSIGNED NOT NULL,
  `id_guru_ppl` bigint UNSIGNED NOT NULL,
  `tgl` date NOT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `jam_kerja` time DEFAULT NULL,
  `lokasi_absen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guru_ppl_absens`
--

INSERT INTO `guru_ppl_absens` (`id`, `id_guru_ppl`, `tgl`, `jam_masuk`, `jam_keluar`, `jam_kerja`, `lokasi_absen`, `created_at`, `updated_at`) VALUES
(2, 1, '2023-04-21', '21:40:46', '21:40:54', '00:00:08', NULL, '2023-04-21 07:40:46', '2023-04-21 07:40:54');

-- --------------------------------------------------------

--
-- Table structure for table `koordinats`
--

CREATE TABLE `koordinats` (
  `id` bigint UNSIGNED NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `koordinats`
--

INSERT INTO `koordinats` (`id`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, '-6.946216', '107.5598582', '2023-04-21 05:25:00', '2023-04-21 07:11:59'),
(2, '-6.902180', '107.538713', '2023-04-21 05:25:21', '2023-04-21 05:25:21'),
(3, '-6.902180', '107.538713', '2023-04-21 05:25:50', '2023-04-21 05:25:50'),
(4, '-6.902180', '107.538713', '2023-04-21 05:26:41', '2023-04-21 05:26:41'),
(5, '-6.902180', '107.538713', '2023-04-21 05:26:59', '2023-04-21 05:26:59');

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
(5, '2021_09_17_093456_create_admins_table', 1),
(6, '2021_09_17_093633_create_guru_p3k_table', 1),
(7, '2021_09_17_093649_create_guru_PPL_table', 1),
(8, '2021_09_17_093726_guru_p3K_absens', 1),
(9, '2021_09_17_093742_guru_ppl_absens', 1),
(10, '2021_09_28_024650_create_koordinats_table', 1);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','kepsek','guru_p3k','guru_ppl') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `level`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Administrator', 'admin', 'miftahrizkyalamsyah@protonmail.com', NULL, 'miftahrizkyalamsyah@gmail.com', NULL, '2023-04-21 05:26:59', '2023-04-21 05:26:59'),
(6, 'Miftah Rizky Alamsyah', 'guru_p3k', 'miftahrizkyalamsyah@upi.edu', NULL, 'miftahmiftah', NULL, '2023-04-21 05:26:59', '2023-04-21 05:26:59'),
(7, 'Asrila', 'guru_ppl', 'asrila@gmail.com', NULL, 'asrila123', NULL, '2023-04-21 05:26:59', '2023-04-21 05:26:59'),
(8, 'Administrator 2', 'admin', 'johanesalex774@gmail.com', NULL, 'johanes123', NULL, '2023-04-21 06:44:59', '2023-04-21 06:44:59'),
(10, 'Johannes Alexander Putra', 'guru_p3k', 'johannesap@upi.edu', NULL, 'putra123', NULL, '2023-04-21 06:49:12', '2023-04-21 06:49:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_nim_unique` (`nim`),
  ADD KEY `admins_id_user_foreign` (`id_user`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `guru_p3k`
--
ALTER TABLE `guru_p3k`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `guru_p3k_nim_unique` (`nim`),
  ADD KEY `guru_p3k_id_user_foreign` (`id_user`);

--
-- Indexes for table `guru_p3k_absens`
--
ALTER TABLE `guru_p3k_absens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guru_p3k_absens_id_guru_p3k_foreign` (`id_guru_p3k`);

--
-- Indexes for table `guru_ppl`
--
ALTER TABLE `guru_ppl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `guru_ppl_nim_unique` (`nim`),
  ADD KEY `guru_ppl_id_user_foreign` (`id_user`);

--
-- Indexes for table `guru_ppl_absens`
--
ALTER TABLE `guru_ppl_absens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guru_ppl_absens_id_guru_ppl_foreign` (`id_guru_ppl`);

--
-- Indexes for table `koordinats`
--
ALTER TABLE `koordinats`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guru_p3k`
--
ALTER TABLE `guru_p3k`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `guru_p3k_absens`
--
ALTER TABLE `guru_p3k_absens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guru_ppl`
--
ALTER TABLE `guru_ppl`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `guru_ppl_absens`
--
ALTER TABLE `guru_ppl_absens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `koordinats`
--
ALTER TABLE `koordinats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guru_p3k`
--
ALTER TABLE `guru_p3k`
  ADD CONSTRAINT `guru_p3k_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guru_p3k_absens`
--
ALTER TABLE `guru_p3k_absens`
  ADD CONSTRAINT `guru_p3k_absens_id_guru_p3k_foreign` FOREIGN KEY (`id_guru_p3k`) REFERENCES `guru_p3k` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guru_ppl`
--
ALTER TABLE `guru_ppl`
  ADD CONSTRAINT `guru_ppl_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guru_ppl_absens`
--
ALTER TABLE `guru_ppl_absens`
  ADD CONSTRAINT `guru_ppl_absens_id_guru_ppl_foreign` FOREIGN KEY (`id_guru_ppl`) REFERENCES `guru_ppl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
