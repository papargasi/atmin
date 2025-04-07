-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2025 at 05:13 AM
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
-- Database: `admin`
--

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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_10_14_013810_tbl_produk', 1),
(6, '2024_10_14_022130_tbl_customer', 1),
(7, '2024_10_14_025330_tbl_barang_masuk', 1),
(8, '2024_10_14_025501_tbl_transaksi', 1),
(9, '2024_11_04_015717_tbl_kriteria_produk', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_absen`
--

CREATE TABLE `tbl_absen` (
  `id_absen` int(11) NOT NULL,
  `id_host` int(11) NOT NULL,
  `tanggal` timestamp NULL DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `durasi` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_absen`
--

INSERT INTO `tbl_absen` (`id_absen`, `id_host`, `tanggal`, `status`, `durasi`, `created_at`, `updated_at`) VALUES
(62, 1, '2025-01-11 11:25:04', '2', 0, NULL, NULL),
(63, 1, '2025-01-18 11:25:04', '2', 0, NULL, NULL),
(64, 1, '2025-01-25 11:25:26', '2', 0, NULL, NULL),
(66, 1, '2025-01-11 17:00:00', '1', 5, '2025-01-23 04:26:37', '2025-01-23 04:26:37'),
(67, 1, '2025-01-12 17:00:00', '1', 5, '2025-01-23 04:26:50', '2025-01-23 04:26:50'),
(68, 1, '2025-01-13 17:00:00', '1', 5, '2025-01-23 04:27:02', '2025-01-23 04:27:02'),
(69, 1, '2025-01-14 17:00:00', '1', 5, '2025-01-23 04:27:18', '2025-01-23 04:27:18'),
(70, 1, '2025-01-15 17:00:00', '1', 5, '2025-01-23 04:27:31', '2025-01-23 04:27:31'),
(71, 1, '2025-01-16 17:00:00', '1', 5, '2025-01-23 04:27:43', '2025-01-23 04:27:43'),
(73, 1, '2025-01-18 17:00:00', '1', 5, '2025-01-23 04:28:34', '2025-01-23 04:28:34'),
(74, 1, '2025-01-19 17:00:00', '1', 5, '2025-01-23 04:28:52', '2025-01-23 04:28:52'),
(82, 1, '2025-01-21 17:00:00', '1', 5, '2025-02-09 18:10:38', '2025-02-09 18:10:38'),
(83, 1, '2025-01-22 17:00:00', '1', 5, '2025-02-09 18:10:54', '2025-02-09 18:10:54'),
(84, 1, '2025-01-23 17:00:00', '1', 5, '2025-02-09 18:11:07', '2025-02-09 18:11:07'),
(85, 1, '2025-01-25 17:00:00', '1', 5, '2025-02-09 18:11:20', '2025-02-09 18:11:20'),
(86, 1, '2025-01-26 17:00:00', '1', 5, '2025-02-09 18:11:46', '2025-02-09 18:11:46'),
(87, 1, '2025-01-27 17:00:00', '1', 5, '2025-02-09 18:11:57', '2025-02-09 18:11:57'),
(88, 1, '2025-01-28 17:00:00', '1', 5, '2025-02-09 18:12:06', '2025-02-09 18:12:06'),
(89, 1, '2025-01-29 17:00:00', '1', 5, '2025-02-09 18:12:17', '2025-02-09 18:12:17'),
(90, 1, '2025-01-30 17:00:00', '1', 5, '2025-02-09 18:12:29', '2025-02-09 18:12:29'),
(91, 1, '2025-02-01 01:14:43', '2', 0, '2025-02-01 01:14:43', '2025-02-01 01:14:43'),
(92, 1, '2025-02-02 01:14:43', '1', 5, '2025-02-02 01:14:43', '2025-02-02 01:14:43'),
(93, 1, '2025-02-03 01:14:43', '1', 5, '2025-02-03 01:14:43', '2025-02-03 01:14:43'),
(94, 1, '2025-02-04 01:14:43', '1', 5, '2025-02-04 01:14:43', '2025-02-04 01:14:43'),
(95, 1, '2025-02-05 01:14:43', '1', 5, '2025-02-05 01:14:43', '2025-02-05 01:14:43'),
(96, 1, '2025-02-06 01:14:43', '1', 5, '2025-02-06 01:14:43', '2025-02-06 01:14:43'),
(97, 1, '2025-01-10 01:14:43', '1', 5, '2025-02-06 01:14:43', '2025-02-06 01:14:43'),
(98, 1, '2025-02-07 01:14:43', '1', 5, '2025-02-07 01:14:43', '2025-02-07 01:14:43'),
(99, 1, '2025-02-08 01:17:39', '1', 5, '2025-02-08 01:17:39', '2025-02-08 01:17:39'),
(100, 1, '2025-01-20 17:00:00', '1', 5, '2025-02-09 18:48:36', '2025-02-09 18:48:36'),
(101, 10, '2025-01-09 17:00:00', '1', 5, '2025-02-09 19:16:40', '2025-02-09 19:16:40'),
(102, 10, '2025-01-08 17:00:00', '1', 5, '2025-02-09 20:25:40', '2025-02-09 20:25:40'),
(103, 10, '2025-01-10 17:00:00', '1', 5, '2025-02-09 20:25:54', '2025-02-09 20:25:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gmv`
--

CREATE TABLE `tbl_gmv` (
  `id_gmv` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `gmv` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_gmv`
--

INSERT INTO `tbl_gmv` (`id_gmv`, `tanggal`, `gmv`, `created_at`, `updated_at`) VALUES
(17, '2025-02-07', 1290000, '2025-02-09 03:42:15', '2025-02-09 18:23:34'),
(18, '2025-02-08', 2600000, '2025-02-09 03:52:12', '2025-02-09 20:24:25'),
(19, '2025-02-06', 3201879, '2025-02-09 18:23:51', '2025-02-09 18:23:51'),
(21, '2025-02-04', 2312687, '2025-02-09 18:24:23', '2025-02-09 18:24:23'),
(22, '2025-02-03', 2000000, '2025-02-09 18:25:02', '2025-02-09 18:25:02'),
(23, '2025-02-02', 2011098, '2025-02-09 18:25:17', '2025-02-09 18:25:17'),
(24, '2025-02-01', 2091100, '2025-02-09 18:25:29', '2025-02-09 18:25:29'),
(25, '2025-01-31', 2091765, '2025-02-09 18:25:40', '2025-02-09 18:25:40'),
(26, '2025-01-30', 3000000, '2025-02-09 18:25:50', '2025-02-09 18:25:50'),
(27, '2025-01-29', 3214567, '2025-02-09 18:26:10', '2025-02-09 18:26:10'),
(28, '2025-01-28', 4232546, '2025-02-09 18:26:30', '2025-02-09 18:26:30'),
(29, '2025-01-27', 1000000, '2025-02-09 18:26:46', '2025-02-09 18:26:46'),
(30, '2025-01-26', 3000000, '2025-02-09 18:27:01', '2025-02-09 18:27:01'),
(31, '2025-01-25', 2314544, '2025-02-09 18:27:16', '2025-02-09 18:27:16'),
(32, '2025-01-24', 2313987, '2025-01-24 01:28:11', '2025-01-24 01:28:11'),
(33, '2025-01-23', 5267123, '2025-01-22 17:00:00', '2025-01-22 17:00:00'),
(34, '2025-01-22', 2398100, '2025-01-21 17:00:00', '2025-01-21 17:00:00'),
(35, '2025-01-21', 5436980, '2025-01-20 17:00:00', '2025-01-20 17:00:00'),
(36, '2025-01-20', 2456189, '2025-01-19 17:00:00', '2025-01-19 17:00:00'),
(37, '2025-01-19', 876567, '2025-01-18 17:00:00', '2025-01-18 17:00:00'),
(38, '2025-01-18', 1000000, '2025-01-17 17:00:00', '2025-01-17 17:00:00'),
(39, '2025-01-17', 2000000, '2025-01-16 17:00:00', '2025-01-16 17:00:00'),
(40, '2025-01-16', 2450177, '2025-01-15 17:00:00', '2025-01-15 17:00:00'),
(41, '2025-01-15', 786489, '2025-01-14 17:00:00', '2025-01-14 17:00:00'),
(42, '2025-01-14', 2098155, '2025-01-13 17:00:00', '2025-01-13 17:00:00'),
(43, '2025-01-13', 2129100, '2025-01-12 17:00:00', '2025-01-12 17:00:00'),
(44, '2025-01-12', 987567, '2025-01-11 17:00:00', '2025-01-11 17:00:00'),
(45, '2025-01-11', 4598200, '2025-01-10 17:00:00', '2025-01-10 17:00:00'),
(46, '2025-01-10', 1598235, '2025-01-09 17:00:00', '2025-01-09 17:00:00'),
(47, '2025-01-09', 1232769, '2025-01-09 01:30:14', '2025-01-09 01:30:14'),
(48, '2025-01-08', 7820100, '2025-01-07 17:00:00', '2025-01-07 17:00:00'),
(50, '2025-02-05', 5634800, '2025-02-09 18:57:28', '2025-02-09 18:57:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_host`
--

CREATE TABLE `tbl_host` (
  `id_host` int(11) NOT NULL,
  `foto` text DEFAULT NULL,
  `nm_host` varchar(100) NOT NULL,
  `nm_panggilan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(50) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `norek` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_host`
--

INSERT INTO `tbl_host` (`id_host`, `foto`, `nm_host`, `nm_panggilan`, `alamat`, `nohp`, `bank`, `norek`, `created_at`, `updated_at`) VALUES
(1, '1737445960.jpg', 'Muhammad Farhan Syadida', 'Parhan', 'Kuningan, Jawa Barat', '08976580885', 'DANA', '08976580885', '2025-01-18 05:38:05', '2025-01-21 01:04:10'),
(10, '17391527963220.jpg', 'Nisrina Niar Widya Ifanka', 'Niar', 'Bojong, Cilimus, Kuningan', '0821872637221', 'DANA', '0821872637221', '2025-02-09 18:59:56', '2025-02-09 18:59:56');

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `tbl_absen`
--
ALTER TABLE `tbl_absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `tbl_gmv`
--
ALTER TABLE `tbl_gmv`
  ADD PRIMARY KEY (`id_gmv`);

--
-- Indexes for table `tbl_host`
--
ALTER TABLE `tbl_host`
  ADD PRIMARY KEY (`id_host`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_absen`
--
ALTER TABLE `tbl_absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `tbl_gmv`
--
ALTER TABLE `tbl_gmv`
  MODIFY `id_gmv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_host`
--
ALTER TABLE `tbl_host`
  MODIFY `id_host` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
