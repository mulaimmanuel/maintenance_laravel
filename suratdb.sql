-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2024 at 02:55 PM
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
-- Database: `suratdb`
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
-- Table structure for table `form_f_p_p_s`
--

CREATE TABLE `form_f_p_p_s` (
  `id` bigint(20) NOT NULL,
  `nomor_tiket` varchar(100) NOT NULL,
  `pemohon` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `section` varchar(50) NOT NULL,
  `mesin` varchar(50) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `kendala` varchar(100) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `tindak_lanjut` varchar(100) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `schedule_pengecekan` date DEFAULT NULL,
  `attachment_file` varchar(255) DEFAULT NULL,
  `note` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_f_p_p_s`
--

INSERT INTO `form_f_p_p_s` (`id`, `nomor_tiket`, `pemohon`, `date`, `section`, `mesin`, `lokasi`, `kendala`, `gambar`, `status`, `tindak_lanjut`, `due_date`, `schedule_pengecekan`, `attachment_file`, `note`, `created_at`, `updated_at`) VALUES
(1, '', 'Medi', '2024-01-03', 'Cutting', 'Mesin 01', 'Deltamas', 'Sparepart Rusak', '', 'Open', NULL, NULL, NULL, NULL, NULL, '2024-01-29 09:45:02', '2024-01-29 09:45:02'),
(2, '', 'Mas Rian', '2024-01-03', 'Cutting', 'Mesin 02', 'Deltamas', 'Rusak', '', 'Closed', NULL, NULL, NULL, NULL, NULL, '2024-01-29 09:58:08', '2024-01-29 09:58:08'),
(3, '', 'Mas Mula', '2024-01-05', 'MC Custom', 'CC2', 'Deltamas', 'Sparepart Karatan', 'C:\\xampp\\tmp\\php564A.tmp', 'Open', NULL, NULL, NULL, NULL, NULL, '2024-01-29 11:33:03', '2024-01-29 11:33:03'),
(4, '', 'Mas Mula', '2024-01-05', 'MC Custom', 'CC2', 'Deltamas', 'Sparepart Karatan', 'C:\\xampp\\tmp\\php83E3.tmp', 'Open', NULL, NULL, NULL, NULL, NULL, '2024-01-29 11:33:15', '2024-01-29 11:33:15'),
(5, '', 'Mas Mula', '2024-01-06', 'MC Custom', 'CC1', 'Deltamas', 'Rusak', 'C:\\xampp\\tmp\\php5D26.tmp', 'Open', NULL, NULL, NULL, NULL, NULL, '2024-01-29 11:53:50', '2024-01-29 11:53:50'),
(6, '', 'Mas Mula', '2024-01-13', 'Bubut', 'CC2', 'Deltamas', 'mana nih bos', 'C:\\xampp\\tmp\\phpDDB9.tmp', 'Open', NULL, NULL, NULL, NULL, NULL, '2024-01-29 12:09:41', '2024-01-29 12:09:41'),
(7, '', 'Mas Mula', '2024-01-18', 'Machining', 'CC4', 'Deltamas', 'manan', 'C:\\xampp\\tmp\\phpC9C1.tmp', 'Open', NULL, NULL, NULL, NULL, NULL, '2024-01-29 12:13:58', '2024-01-29 12:13:58'),
(8, '', 'Mas Mula', '2024-01-17', 'Bubut', 'CC2', 'DS8', 'a', 'gambar/qf9mvxv44Mqwl1P74YKfj0z7euWYPgL6p7KgOzHl.jpg', 'On Progress', NULL, NULL, NULL, NULL, NULL, '2024-01-29 12:19:03', '2024-01-30 04:14:33'),
(9, '', 'Mas Mula', '2024-01-17', 'Bubut', 'CC2', 'DS8', 'a', 'gambar/8hl9scjB0aCuq9ikVDMcJplM3PBRmPbhkY0VWTCe.jpg', 'On Progress', NULL, NULL, NULL, NULL, NULL, '2024-01-29 12:19:29', '2024-01-30 01:20:39'),
(10, '', 'Mas Mula', '2024-01-17', 'Bubut', 'CC2', 'DS8', 'a', 'C:\\xampp\\tmp\\phpD8FF.tmp', 'On Progress', NULL, NULL, NULL, NULL, NULL, '2024-01-29 12:19:29', '2024-01-30 01:12:38'),
(11, '', 'Rina Suryani', '2024-01-23', 'Machining', 'CC5', 'Deltamas', 'Sparepart Hilang', 'gambar/SuCTcslIn00nMF8CEJ1gLJBBBRJjur4s0Ylb4qPA.jpg', 'On Progress', NULL, NULL, NULL, NULL, NULL, '2024-01-30 01:43:54', '2024-01-30 01:47:44'),
(12, '', 'Rina Suryani', '2024-01-23', 'Machining', 'CC5', 'Deltamas', 'Sparepart Hilang', 'C:\\xampp\\tmp\\php4E9C.tmp', 'On Progress', NULL, NULL, NULL, NULL, NULL, '2024-01-30 01:43:54', '2024-01-30 01:51:19'),
(13, '', 'Rina Suryani', '2024-01-10', 'Cutting', 'CC1', 'Deltamas', 'Siapa ini bos', 'gambar/SWImp5FQM85ai4UsyqWQmlmCYNrjypMu4Rvv2ikx.jpg', 'On Progress', NULL, NULL, NULL, NULL, NULL, '2024-01-30 04:18:36', '2024-01-30 04:18:53'),
(14, '', 'Rina Suryani', '2024-01-10', 'Cutting', 'CC1', 'Deltamas', 'Siapa ini bos', 'C:\\xampp\\tmp\\phpBDBF.tmp', 'On Progress', NULL, NULL, NULL, NULL, NULL, '2024-01-30 04:18:36', '2024-01-30 04:19:56'),
(15, '', 'Rina Suryani', '2024-01-17', 'Machining', 'CC1', 'Deltamas', 'Siapa innibang', 'gambar/YRDA60zGbV7sIPFZZrVUNc0k1g6EkbXiOOWNehvL.jpg', 'Finish', NULL, NULL, NULL, NULL, NULL, '2024-01-30 04:21:21', '2024-01-30 04:49:01'),
(16, '', 'Rina Suryani', '2024-01-02', 'Bubut', 'CC2', 'Deltamas', 'Kenapa yah', 'gambar/OPcJJEIBEIngPqflKrDgnlBmkbP5zXESLyY27FYe.jpg', 'Finish', NULL, NULL, NULL, NULL, NULL, '2024-01-30 04:23:16', '2024-01-30 04:27:02'),
(17, '', 'Mas Mula', '2024-01-12', 'Machining', 'CC3', 'DS8', 'aaa', 'gambar/JfsPRQj50YLzwxch6U6ZEt8FesItRPjxwmQrdNFl.jpg', 'Finish', NULL, NULL, NULL, NULL, NULL, '2024-01-30 04:59:34', '2024-01-31 00:48:03'),
(18, '', 'Rina Suryani', '2024-01-24', 'MC Custom', 'CC3', 'DS8', 'Sparepart Hilang', 'gambar/EGwNU6IYl3st9GQExv3Xa9mFXzWvYXBIa7PKgbQa.jpg', 'Finish', NULL, NULL, NULL, NULL, NULL, '2024-01-30 07:25:51', '2024-01-31 00:45:05'),
(19, '', 'Mas Mula', '2024-01-22', 'MC Custom', 'CC1', 'Deltamas', 'Sparepart Rusak', 'gambar/sU9jYWOMWJGTkHWd3udgA0TWvonpYhsZFxKZZEut.jpg', 'Finish', 'www', NULL, NULL, NULL, NULL, '2024-01-30 07:42:07', '2024-01-30 09:46:56'),
(20, '', 'Rina Suryani', '2024-01-24', 'MC Custom', 'CC2', 'DS8', 'Waduuhhh Salah Bikin', 'gambar/YN4J6o0fyRSyJKNKByeCeSdR9AIU9HCaLf6wKjXP.jpg', 'Finish', NULL, NULL, NULL, NULL, NULL, '2024-01-30 09:44:30', '2024-01-31 00:44:54'),
(21, '', 'Mas Medi', '2024-01-18', 'Machining', 'CC2', 'DS8', 'Masalah nih', 'gambar/bnzcDynPDOFdZTjx36xXYWweIwxNGU6mAu77RW6a.jpg', 'Finish', 'Siapa ini bosss', '2024-01-15', '2024-01-18', 'C:\\xampp\\tmp\\php5382.tmp', NULL, '2024-01-31 00:49:30', '2024-01-31 00:50:07'),
(22, '', 'Mas Medi', '2024-01-25', 'Machining', 'CC2', 'DS8', 'Pekerja Hilang', 'gambar/lI0TY15rt2I46N8joRHObeq2yDM4Oh4rZoFUdQ40.jpg', 'Finish', 'ssss', '2024-01-02', '2024-01-04', NULL, NULL, '2024-01-31 01:02:32', '2024-01-31 03:02:38'),
(23, '', 'Rina Suryani', '2024-01-24', 'Machining', 'CC1', 'DS8', 'Salah Mesin', 'gambar/mG78rxqFpOuxfgFZoaXIqFkogKD8GiGtmddGpW7Z.jpg', 'Closed', 'aaa', '2024-01-06', '2024-01-04', 'C:\\xampp\\tmp\\phpA6E3.tmp', NULL, '2024-01-31 01:09:37', '2024-01-31 01:51:19'),
(24, '', 'Mas Mula', '2024-01-19', 'MC Custom', 'CC2', 'DS8', 'eeeee', 'gambar/EaXgeXEfjkHy4sePYZhIXrAQcUyZy7wr493BY18T.jpg', 'Closed', NULL, NULL, NULL, NULL, NULL, '2024-01-31 02:18:25', '2024-01-31 02:18:59'),
(25, '', 'Mas Mula', '2024-01-18', 'MC Custom', 'CC2', 'DS8', 'ww', 'gambar/PxMvndokT5G7pgFgO0VpdJ6VDJMlzheHPesu2bLr.jpg', 'On Progress', 'Masa sih', '2024-01-12', '2024-01-25', 'C:\\xampp\\tmp\\php5A96.tmp', NULL, '2024-01-31 05:55:11', '2024-01-31 12:04:09'),
(26, '', 'Rina Suryani', '2024-01-12', 'Machining', 'CC1', 'Deltamas', 'd', 'gambar/JOVweoVdE3SQogbKnYvIicAGjHY7IpJFiEdqxWCe.jpg', 'Closed', NULL, NULL, NULL, NULL, NULL, '2024-01-31 05:56:47', '2024-01-31 06:10:23'),
(27, '', 'Astra Daido', '2024-01-18', 'Bubut', 'CC2', 'DS8', 'Sparepart', 'gambar/kLpeAYIjJi30PbQNQLv68GposMLVcx7UYWciRxHi.jpg', 'Closed', 'Rian nih bosss', '2024-01-11', '2024-01-15', 'C:\\xampp\\tmp\\php8701.tmp', NULL, '2024-01-31 07:04:55', '2024-01-31 07:33:11'),
(28, '', 'Astra Daido', '2024-01-26', 'MC Custom', 'CC2', 'DS8', 'a', 'gambar/oBMMV5zH3r3kivTQjCxAJEGgteHps8K2gR1UmfEx.jpg', 'Closed', NULL, NULL, NULL, NULL, NULL, '2024-01-31 07:56:37', '2024-01-31 08:20:16'),
(29, '', 'Astra Daido', '2024-01-18', 'MC Custom', 'CC2', 'Deltamas', 'Kasus', 'gambar/P5Ltku1Tiku6hszPtE2BtpXeXrmlNnpFKefHqgmw.jpg', 'Closed', NULL, NULL, NULL, NULL, NULL, '2024-01-31 11:42:52', '2024-01-31 11:45:43'),
(30, '', 'Rina Suryani', '2024-01-13', 'Machining', 'CC1', 'Deltamas', 's', NULL, 'On Progress', 'ss', '2024-01-05', '2024-01-15', 'C:\\xampp\\tmp\\php5428.tmp', 'Draft Tindak Lanjut', '2024-01-31 12:05:47', '2024-02-01 07:10:12'),
(31, '', 'Astra Daido', '2024-02-08', 'MC Custom', 'CC2', 'DS8', 'Masa', 'gambar/YZBuxvCMUCjcuwz5uQkSLokpMUQS2fTDI3aSkhPk.jpg', 'On Progress', 'Wokehh siapp', '2024-02-08', '2024-02-15', 'C:\\xampp\\tmp\\phpC9E8.tmp', 'Draft Tindak Lanjut', '2024-02-01 01:16:38', '2024-02-01 06:35:45'),
(32, '', 'Rina Suryani', '2024-02-15', 'Machining', 'CC1', 'DS8', 'a', NULL, 'On Progress', 'Apa ini bos', '2024-02-07', '2024-02-10', 'C:\\xampp\\tmp\\php2314.tmp', 'Draft Tindak Lanjut', '2024-02-01 02:57:12', '2024-02-01 06:47:03'),
(33, '', 'Mas Mula', '2024-02-23', 'MC Custom', 'CC2', 'DS8', 'Mana nih', NULL, 'Closed', NULL, NULL, NULL, NULL, 'Form FPP Closed', '2024-02-01 04:32:48', '2024-02-01 04:59:29'),
(34, '', 'Rina Suryani Mega', '2024-02-14', 'MC Custom', 'CC2', 'DS8', 'Megaprojek', 'gambar/5C0NnldjEMA3y8VrfSE7hBOClFOuz2uF0jmLlKC1.jpg', 'On Progress', 'Hari ini tanggal 1', '2024-02-10', '2024-02-08', 'C:\\xampp\\tmp\\php90BC.tmp', 'Draft Tindak Lanjut', '2024-02-01 06:57:33', '2024-02-01 07:08:17'),
(35, '', 'Mash Adler', '2024-02-12', 'Machining', 'CC2', 'Deltamas', 'Mash Adler S1', 'gambar/IZeN0C7jdXts5qyK4RrwI1iHUdIDtyFHNNk2M5Wf.png', 'On Progress', NULL, NULL, NULL, 'public/attachment_file/oqdJsiq9s5EvWArs1fAQVGMin7N7AlvO1cGH5TGG.xlsx', 'Draft Tindak Lanjut', '2024-02-01 07:15:03', '2024-02-01 08:05:24');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mesins`
--

CREATE TABLE `mesins` (
  `id` bigint(20) NOT NULL,
  `nama_mesin` varchar(50) NOT NULL,
  `no_mesin` varchar(25) NOT NULL,
  `merk` varchar(25) NOT NULL,
  `type` varchar(25) NOT NULL,
  `mfg_date` year(4) NOT NULL,
  `acq_date` year(4) NOT NULL,
  `age` int(11) NOT NULL,
  `preventive_date` date DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `sparepart` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mesins`
--

INSERT INTO `mesins` (`id`, `nama_mesin`, `no_mesin`, `merk`, `type`, `mfg_date`, `acq_date`, `age`, `preventive_date`, `foto`, `sparepart`, `created_at`, `updated_at`) VALUES
(1, 'Mesin Cutting', 'CC-001', 'Yamaha', 'Baru', '1988', '2010', 22, '2024-01-10', '', '', '2024-01-29 02:50:18', '2024-01-29 03:06:00'),
(2, 'Mesin Siapa', 'CC-002', 'Honda', 'Terbaru', '1922', '2012', 90, '2024-01-05', 'C:\\xampp\\tmp\\php875A.tmp', 'C:\\xampp\\tmp\\php875B.tmp', '2024-01-29 02:59:53', '2024-01-29 03:14:06'),
(3, 'Mesin Siapa ini', 'CC-003', 'Honda One Heart', 'Honda', '2000', '2011', 11, NULL, 'foto/8P1aqdWJcAPnGxfgCdMboricV0CLL9xWwrsMAr8X.jpg', 'sparepart/8iQIULl2xWJvGJOyhXTLLUQRTsXSe6nBopIwbT03.jpg', '2024-01-29 03:19:09', '2024-01-29 03:19:09'),
(4, 'Mesin Siapa Siapa', 'CC-004', 'Honda One Heart', 'Honda', '2000', '2011', 11, '2024-01-25', 'foto/dCnjfA5TpOqVxObv2AjDdTnGqn4SUsVG9AcDKP0U.jpg', 'sparepart/ZjMtXNrAK1VE9HS4I4CSwoGaQZRamfZdDonZev3C.jpg', '2024-01-29 03:21:12', '2024-01-29 04:27:18'),
(5, 'Mesin Siapa', 'CC-002', 'Honda', 'Terbaru', '2022', '2024', 2, NULL, 'foto/BbqQ6w5JmgK8GILmeVPgnY7bZrAg7dIFcLmX4NfL.jpg', 'sparepart/AZlAdmhp3CuzFxGslt8se678MxRWZaYIvo4AJzbU.jpg', '2024-01-29 04:57:38', '2024-01-29 04:57:38'),
(6, 'Mesin Siapa', 'CC-002', 'Honda', 'Terbaru', '2023', '2024', 1, '2024-01-18', 'foto/eLr5AWdSAChJl4b6PYAPcpUVncLJ4m7JtbptEal3.jpg', 'sparepart/67pvvBL1qWr3bDXbxFbu3YkdqBsaclpJLB1Gz8zV.jpg', '2024-01-30 06:58:28', '2024-01-30 06:58:28'),
(8, 'Mesin Cutting 2333', 'CC-00333', 'Honda33', 'Terbaru33', '1999', '2023', 24, '2024-01-17', 'foto/cyoa3oGli3w2JqeBT1ODwIycitxFcVh7862v5sj9.jpg', 'sparepart/5Smm0S2dBJejN0ZOsgqLSh991WqlFy7Wpvbmf2JQ.jpg', '2024-01-30 07:07:12', '2024-01-30 07:07:47'),
(13, 'Mesin Cutting 2333', 'CC-002', 'Honda33', 'Honda', '2020', '2023', 3, '2024-01-15', 'foto/hlf5qiX7T5KJrSUNko1M5xksEawnjEq0iTPcydTl.jpg', NULL, '2024-01-31 11:49:24', '2024-01-31 11:49:24'),
(14, 'Mesin Cutting 2333', 'CC-002', 'Honda33', 'Honda', '2020', '2023', 3, NULL, NULL, NULL, '2024-01-31 12:09:00', '2024-01-31 12:09:00');

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
(5, '2024_01_24_061500_create_surat_table', 1);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `preventives`
--

CREATE TABLE `preventives` (
  `id` bigint(11) NOT NULL,
  `nama_mesin` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `due_date` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `preventives`
--

INSERT INTO `preventives` (`id`, `nama_mesin`, `section`, `lokasi`, `due_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mesin Cutting', 'Cutting', 'Deltamas', '2024-01-31', 'Finish', '2024-01-30 08:57:52', '2024-01-31 08:27:30'),
(2, 'Mesin Cutting', 'Cutting', 'Deltamas', '2024-01-31', 'Finish', '2024-01-31 06:29:26', '2024-01-31 06:29:26');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id_surat` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `karyawan` varchar(100) NOT NULL,
  `departemen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surats`
--

CREATE TABLE `surats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_surat` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tanggal_surat` date NOT NULL,
  `departemen` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surats`
--

INSERT INTO `surats` (`id`, `nomor_surat`, `keterangan`, `tanggal_surat`, `departemen`, `created_at`, `updated_at`) VALUES
(7, '001/HRGA/I/2024', 'e', '2024-01-03', 'HR', '2024-01-26 05:35:50', '2024-01-26 05:35:50'),
(8, '002/HRGA/I/2024', '1', '2024-01-04', 'HR', '2024-01-26 05:36:37', '2024-01-26 05:36:56'),
(9, '001/ADDIR/XI/2023', '1', '2023-11-08', 'Direksi', '2024-01-26 05:37:29', '2024-01-26 05:37:29'),
(10, '001/ADADM/X/2023', 'w', '2023-10-17', 'Administrasi', '2024-01-26 05:39:48', '2024-01-26 05:39:48'),
(11, '001/ADADM/I/2024', '1', '2024-01-04', 'Administrasi', '2024-01-26 05:43:00', '2024-01-26 05:43:00');

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
-- Indexes for table `form_f_p_p_s`
--
ALTER TABLE `form_f_p_p_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `mesins`
--
ALTER TABLE `mesins`
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
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `preventives`
--
ALTER TABLE `preventives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `surats`
--
ALTER TABLE `surats`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_f_p_p_s`
--
ALTER TABLE `form_f_p_p_s`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mesins`
--
ALTER TABLE `mesins`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `preventives`
--
ALTER TABLE `preventives`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surats`
--
ALTER TABLE `surats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `id_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `id_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
