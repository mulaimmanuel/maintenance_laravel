-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2024 at 11:34 AM
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
-- Database: `adm_adasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_code` varchar(255) NOT NULL,
  `name_customer` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_code`, `name_customer`, `area`, `email`, `no_telp`, `status`, `created_at`, `updated_at`) VALUES
(1, 'BAT07', 'PT BATUM SARANA SEJAHTERA', '140', 'batum@gmail.com', '089128316313', '1', NULL, NULL),
(2, 'DUT01\r\n', 'PT. DUTA NICHIRINDO PRATAMA', '2', 'duta@gmail.com', '08126152371313', '1', NULL, NULL),
(3, 'YUK01', 'PT YUKITA AMI DAI INDONESIA', '150', 'yukita@gmail.com', '081631872361', '1', NULL, NULL),
(4, 'ISK01\r\n', 'PT. ISK INDONESIA\r\n', '0\r\n', 'isk@gmail.com', '0856776107121', '1', NULL, NULL),
(5, 'CAL04', 'PT CALICO METALS INDONESIA', '120', 'calicio@gmail.com', '087727432323', '1', NULL, NULL),
(6, 'HAR01', 'PT. HARAPAN JAYA ABADI TEKNIK INDONESIA', '420', 'harapanjaya@gmail.com', '087612531231', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_preventives`
--

CREATE TABLE `detail_preventives` (
  `id` int(11) NOT NULL,
  `id_mesin` varchar(50) NOT NULL,
  `issue` varchar(100) NOT NULL,
  `rencana_perbaikan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_preventives`
--

INSERT INTO `detail_preventives` (`id`, `id_mesin`, `issue`, `rencana_perbaikan`) VALUES
(1, 'CC-003', '- Salah mesin\r\n- Salah Sparepart', '- Perbaikan mesin \r\n- Ganti Sparepart'),
(2, 'CC-004', '- Alat hilang \r\n- Parts tidak ada', '- Cari alat pengganti\r\n- Buat custom parts');

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
  `id_fpp` varchar(20) NOT NULL,
  `pemohon` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `section` varchar(50) NOT NULL,
  `mesin` varchar(50) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `kendala` varchar(100) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_f_p_p_s`
--

INSERT INTO `form_f_p_p_s` (`id`, `id_fpp`, `pemohon`, `date`, `section`, `mesin`, `lokasi`, `kendala`, `gambar`, `status`, `created_at`, `updated_at`) VALUES
(88, 'FP0001', 'Mas Medi', '2024-02-09', 'MC Custom', 'CC2', 'DS8', 'sparepart rusak', 'gambar/1eC0Zr7kykxyJpEFOWaNWFc1TYWW7yt7Ll3nEBm0.jpg', '3', '2024-02-06 08:21:56', '2024-02-06 08:26:27'),
(89, 'FP0089', 'Mas Mula', '2024-01-30', 'MC Custom', 'CC3', 'Deltamas', 'Oke', NULL, '3', '2024-02-06 09:06:24', '2024-02-13 03:53:13'),
(90, 'FP0090', 'Mas Mula', '2024-02-08', 'Machining', 'CC3', 'DS8', 'q', 'gambar/rHn6bWX2JdnRaztLQwhmU2cBuFfzQmSJp7svnDeW.png', '1', '2024-02-13 08:36:33', '2024-02-15 06:41:05'),
(91, 'FP0091', 'Rina Suryani', '2024-02-09', 'Bubut', 'CC1', 'Deltamas', 'Salah Sparepart', 'gambar/LSl8UQde9zaEx6uhYNsUWpdD7hsiEt4qB6t63B4u.jpg', '0', '2024-02-15 01:28:12', '2024-02-15 01:28:12'),
(92, 'FP0092', 'Rina Suryani', '2024-02-09', 'Machining', 'CC3', 'Deltamas', 'Salah Mesin', NULL, '0', '2024-02-15 01:32:19', '2024-02-15 01:32:19'),
(93, 'FP0093', 'Rina Suryani', '2024-02-09', 'Machining', 'CC3', 'Deltamas', 'Salah Mesin', NULL, '0', '2024-02-15 01:33:48', '2024-02-15 01:33:48'),
(94, 'FP0094', 'Rina Suryani', '2024-02-16', 'MC Custom', 'CC3', 'DS8', 'Salah Mesin Lagi', NULL, '1', '2024-02-15 01:34:34', '2024-02-15 04:25:52'),
(95, 'FP0095', 'Rina Suryani', '2024-02-16', 'MC Custom', 'CC2', 'Deltamas', 'Sparepart', NULL, '2', '2024-02-15 01:35:43', '2024-02-15 06:50:00'),
(96, 'FP0096', 'Mas Medi', '2024-02-17', 'Bubut', 'CC2', 'Deltamas', 'Oke', NULL, '3', '2024-02-15 03:13:52', '2024-02-15 06:24:46'),
(97, 'FP0097', 'Mash Adler', '2024-02-16', 'MC Custom', 'CC4', 'Deltamas', 'Aduh', NULL, '2', '2024-02-15 03:33:03', '2024-02-15 06:42:53'),
(98, 'FP0098', 'Mash Adler', '2024-02-16', 'MC Custom', 'CC3', 'DS8', 'Oke Sipp', 'assets/gambar/VsDUyEhxTIfj9zosFhL6AhTBiSgudCw365YzuRhf.jpg', '0', '2024-02-15 07:11:42', '2024-02-15 07:11:42'),
(99, 'FP0099', 'Mas Medi', '2024-02-17', 'MC Custom', 'CC2', 'DS8', 'Salah ISI', 'assets/gambar/gunung.jpg', '0', '2024-02-15 07:15:17', '2024-02-15 07:15:17'),
(100, 'FP0100', 'Rina Suryani Mega', '2024-02-14', 'MC Custom', 'CC3', 'Deltamas', 'SIAPPP', 'assets/gambar/gunung.jpg', '0', '2024-02-15 07:17:37', '2024-02-15 07:17:37'),
(101, 'FP0101', 'Mash Adler', '2024-02-16', 'Machining', 'CC2', 'DS8', 'A', 'gambar/9GZVSSGzXitCWDDcKPJ8DS6QEjtMQQNvP6N3kxPH.jpg', '1', '2024-02-15 07:21:52', '2024-02-15 08:07:20'),
(102, 'FP0102', 'Rina Suryani', '2024-02-13', 'Machining', 'CC1', 'Deltamas', 'OKEHHHH', 'assets/gambar/Mesin Rusak.jpg', '1', '2024-02-15 07:23:20', '2024-02-15 07:54:47'),
(103, 'FP0103', 'Mas Medi', '2024-02-16', 'Bubut', 'CC1', 'Deltamas', 'OKEEEEEEEEEEEEEEEEEEEEEEEE', 'assets/gambar/Mesin Rusak.jpg', '1', '2024-02-15 07:25:21', '2024-02-15 07:51:23'),
(104, 'FP0104', 'Mash Adler', '2024-02-17', 'Bubut', 'CC1', 'DS8', 'WOKEHHH', 'assets/gambar/Mesin Rusak.jpg', '3', '2024-02-15 07:31:27', '2024-02-15 07:48:23'),
(105, 'FP0105', 'Rina Suryani', '2024-02-03', 'Bubut', 'CC3', 'DS8', 'Salah Sparepart', 'assets/gambar/Struktur Organisasi.drawio.png', '1', '2024-02-16 01:29:47', '2024-02-16 01:30:05'),
(106, 'FP0106', 'Mash Adler', '2024-02-17', 'MC Custom', 'CC2', 'DS8', 'Wokehh Siapp', 'assets/gambar/Form FPP 0196.jpg', '2', '2024-02-16 01:37:24', '2024-02-16 12:03:47'),
(107, 'FP0107', 'Astra Daido', '2024-02-27', 'Machining', 'CC3', 'DS8', 'Sparepart', 'assets/gambar/gunung.jpg', '3', '2024-02-26 01:42:17', '2024-02-26 01:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `handlings`
--

CREATE TABLE `handlings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_wo` varchar(255) NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `thickness` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `outer_diameter` varchar(255) DEFAULT NULL,
  `inner_diameter` varchar(255) DEFAULT NULL,
  `lenght` varchar(255) DEFAULT NULL,
  `qty` varchar(255) NOT NULL,
  `pcs` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `process_type` varchar(255) NOT NULL,
  `type_1` varchar(255) NOT NULL,
  `type_2` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `handlings`
--

INSERT INTO `handlings` (`id`, `no_wo`, `customer_id`, `type_id`, `thickness`, `weight`, `outer_diameter`, `inner_diameter`, `lenght`, `qty`, `pcs`, `category`, `process_type`, `type_1`, `type_2`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'WO/2024/29291', 1, 3, '200', '300', '-', '-', '1000', '200', '1000', 'Pecah', 'Cutting', 'Claim', NULL, '1REjsYcODJpij0fjk0I9pyvW98Kg4kUmQ17FRBs0.png', 3, '2024-02-26 04:54:25', '2024-02-26 05:00:18');

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
(23, 'Mesin Siapa 6 Februari', 'CC-004', 'Honda33', 'Honda', '2000', '2010', 10, NULL, NULL, NULL, '2024-02-06 08:35:28', '2024-02-06 08:45:26'),
(24, 'Mesin Cutting', 'CC3', 'Honda', 'Honda', '2010', '2024', 14, NULL, NULL, NULL, '2024-02-13 03:47:00', '2024-02-13 03:47:00'),
(25, 'Mesin Cutting 2', 'CC3', 'Honda', 'Honda', '2010', '2024', 14, NULL, 'foto/aXSYa5tKzJU1oOvkHZj37t2EDh82Yr8co4M3cdqt.png', 'sparepart/Ux5qzCbvQM998VvrdWSMlJpc2LeKvsEfrAXyynSF.png', '2024-02-13 04:16:41', '2024-02-13 04:16:41'),
(26, 'Mesin Cutting 3', 'CC3', 'Honda', 'Honda', '2010', '2024', 14, NULL, 'foto/webryrdGGrGDIvwlHVtcaXEw3uqAWN22LeEMeGhT.png', 'sparepart/Z6Vakln8HVM6ezcklgjcYRSFbZIZ8M1C8rm2XtKz.png', '2024-02-13 04:23:19', '2024-02-13 04:23:19'),
(27, 'Mesin Cutting 4', 'CC3', 'Honda', 'Honda', '2010', '2024', 14, NULL, 'assets/foto/gunung.jpg', 'assets/sparepart/gunung.jpg', '2024-02-13 06:44:54', '2024-02-13 06:44:54'),
(28, 'Mesin Cutting 5', 'CC3', 'Honda', 'Honda', '2010', '2024', 14, NULL, 'public/assets/foto/s8kJfctIkT7orUX5Y0ptPB9hABk1f6kqnD2osFBF.jpg', 'public/assets/sparepart/lKhJkLFaomAxnWxqllPIZohPVLeEerP3kzitFBoZ.jpg', '2024-02-15 06:52:22', '2024-02-15 06:52:22'),
(29, 'Mesin Cutting 6', 'CC3', 'Honda', 'Honda', '2010', '2024', 14, '2024-02-17', 'assets/foto/gunung.jpg', 'assets/sparepart/gunung.jpg', '2024-02-15 07:09:54', '2024-02-15 07:09:54'),
(30, 'Mesin Cutting 7', 'CC3', 'Honda', 'Honda', '2010', '2024', 14, NULL, 'assets/foto/gunung.jpg', 'assets/sparepart/gunung.jpg', '2024-02-15 09:57:10', '2024-02-15 09:57:10'),
(31, 'Mesin Cutting 8', 'CC3', 'Honda', 'Honda', '2010', '2024', 14, NULL, 'assets/foto/Mesin baru.jpg', 'assets/sparepart/Mesin baru.jpg', '2024-02-15 09:58:15', '2024-02-15 09:58:15'),
(32, 'Mesin Cutting 9', 'CC3', 'Honda', 'Honda', '2010', '2024', 14, NULL, 'assets/foto/gunung.jpg', 'assets/sparepart/gunung.jpg', '2024-02-20 04:45:32', '2024-02-20 04:45:32');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_05_032039_create_customers_table', 1),
(6, '2024_02_05_032520_create_type_materials_table', 1),
(7, '2024_02_05_032957_create_handlings_table', 1),
(8, '2024_02_15_043000_create_roles_table', 2),
(9, '2024_02_22_004414_create_schedule_visits_table', 3);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
  `nama_mesin` varchar(25) NOT NULL,
  `no_mesin` varchar(25) NOT NULL,
  `merk` varchar(25) NOT NULL,
  `mfg_date` year(4) NOT NULL,
  `issue` varchar(50) NOT NULL,
  `rencana_perbaikan` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `preventives`
--

INSERT INTO `preventives` (`id`, `nama_mesin`, `no_mesin`, `merk`, `mfg_date`, `issue`, `rencana_perbaikan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mesin Cutting', 'CC003', 'Yamaha', '1988', 'Sparepart Rusak', 'Ganti Sparepart', '0', '2024-02-26 01:20:32', '2024-02-26 01:20:32'),
(2, 'Mesin Machinig Custom', 'CC003', 'Honda', '2000', 'Part ada yang rusak', 'Ganti dan perbaiki part', '0', '2024-02-26 01:20:32', '2024-02-26 01:20:32'),
(3, 'Mesin Cutting Baru', 'CC003', 'Yamaha', '1988', 'Sparepart Rusak', 'Ganti Sparepart', '0', '2024-02-26 01:35:07', '2024-02-26 01:35:07'),
(4, 'Mesin Machinig Custom', 'CC004', 'Honda', '2010', 'Part ada yang rusak', 'Ganti dan perbaiki part', '0', '2024-02-26 01:35:07', '2024-02-26 01:35:07');

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
-- Table structure for table `schedule_visits`
--

CREATE TABLE `schedule_visits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `handling_id` bigint(20) UNSIGNED DEFAULT NULL,
  `schedule` date DEFAULT NULL,
  `results` varchar(255) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedule_visits`
--

INSERT INTO `schedule_visits` (`id`, `handling_id`, `schedule`, `results`, `due_date`, `pic`, `file`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-02-26', NULL, '2024-02-26', 'Rodjo', NULL, 1, '2024-02-26 04:56:09', '2024-02-26 04:56:09'),
(2, 1, '2024-02-28', 'Hasil visit material memang harus di klaim karena genjang pada sisi X', '2024-02-29', 'Rodjo dan Eto-sang', 'C7j661ikRtyZ7KCTOTblNQqCX6sgZeN2zm3sWH87.pdf', 1, '2024-02-26 04:57:21', '2024-02-26 04:57:21');

-- --------------------------------------------------------

--
-- Table structure for table `sparepart`
--

CREATE TABLE `sparepart` (
  `id` bigint(20) NOT NULL,
  `sparepart` varchar(50) NOT NULL,
  `vendor` varchar(25) NOT NULL,
  `leadtime` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tindak_lanjuts`
--

CREATE TABLE `tindak_lanjuts` (
  `id` bigint(20) NOT NULL,
  `id_fpp` varchar(20) NOT NULL,
  `tindak_lanjut` varchar(100) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `schedule_pengecekan` date DEFAULT NULL,
  `attachment_file` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `note` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tindak_lanjuts`
--

INSERT INTO `tindak_lanjuts` (`id`, `id_fpp`, `tindak_lanjut`, `due_date`, `schedule_pengecekan`, `attachment_file`, `status`, `note`, `created_at`, `updated_at`) VALUES
(133, 'FP0001', NULL, NULL, NULL, NULL, '0', 'Form FPP Dibuat', '2024-02-06 08:21:56', '2024-02-06 08:21:56'),
(134, 'FP0001', NULL, NULL, NULL, NULL, '1', 'Menunggu Sparepart', '2024-02-06 08:22:32', '2024-02-06 08:22:32'),
(135, 'FP0001', 'Sparepart diganti', '2024-02-07', '2024-02-02', NULL, '1', 'Menunggu Sparepart', '2024-02-06 08:23:49', '2024-02-06 08:23:49'),
(136, 'FP0001', NULL, NULL, NULL, NULL, '2', 'DISUBMIT MAINTENANCE', '2024-02-06 08:24:57', '2024-02-06 08:24:57'),
(137, 'FP0001', NULL, NULL, NULL, NULL, '1', 'sparepartnya salah', '2024-02-06 08:25:23', '2024-02-06 08:25:23'),
(138, 'FP0001', NULL, NULL, NULL, NULL, '2', 'DISUBMIT MAINTENANCE', '2024-02-06 08:25:47', '2024-02-06 08:25:47'),
(139, 'FP0001', NULL, NULL, NULL, NULL, '2', 'Dikonfirmasi Dept.Maintenance', '2024-02-06 08:25:56', '2024-02-06 08:25:56'),
(140, 'FP0001', NULL, NULL, NULL, NULL, '3', 'Diclosed Production', '2024-02-06 08:26:27', '2024-02-06 08:26:27'),
(141, 'FP0089', NULL, NULL, NULL, NULL, '0', 'Form FPP Dibuat', '2024-02-06 09:06:24', '2024-02-06 09:06:24'),
(142, 'FP0089', NULL, NULL, NULL, NULL, '1', 'Sedang Ditindaklanjuti', '2024-02-06 09:06:35', '2024-02-06 09:06:35'),
(143, 'FP0089', 'Oke Siapp', '2024-02-07', '2024-02-08', 'public/EpntpX8As208kAD9ytIfv2IUV9qBSYmUZXiv1A4k.xlsx', '1', 'Menunggu Sparepart', '2024-02-06 09:12:36', '2024-02-06 09:12:36'),
(144, 'FP0089', NULL, NULL, NULL, NULL, '2', 'DISUBMIT MAINTENANCE', '2024-02-13 03:52:58', '2024-02-13 03:52:58'),
(145, 'FP0089', NULL, NULL, NULL, NULL, '2', 'Dikonfirmasi Dept.Maintenance', '2024-02-13 03:53:04', '2024-02-13 03:53:04'),
(146, 'FP0089', NULL, NULL, NULL, NULL, '3', 'Diclosed Production', '2024-02-13 03:53:13', '2024-02-13 03:53:13'),
(147, 'FP0090', NULL, NULL, NULL, NULL, '0', 'Form FPP Dibuat', '2024-02-13 08:36:33', '2024-02-13 08:36:33'),
(148, 'FP0090', NULL, NULL, NULL, NULL, '1', 'Sedang Ditindaklanjuti', '2024-02-13 08:36:46', '2024-02-13 08:36:46'),
(149, 'FP0090', 'Oke Siapp', '2024-02-05', '2024-02-06', NULL, '2', 'DISUBMIT MAINTENANCE', '2024-02-13 08:37:11', '2024-02-13 08:37:11'),
(150, 'FP0093', NULL, NULL, NULL, NULL, '0', NULL, '2024-02-15 01:33:48', '2024-02-15 01:33:48'),
(151, 'FP0095', NULL, NULL, NULL, NULL, '0', NULL, '2024-02-15 01:35:43', '2024-02-15 01:35:43'),
(152, 'FP0096', NULL, NULL, NULL, NULL, '0', NULL, '2024-02-15 03:13:52', '2024-02-15 03:13:52'),
(153, 'FP0097', NULL, NULL, NULL, NULL, '0', 'Form FPP Dibuat', '2024-02-15 03:33:03', '2024-02-15 03:33:03'),
(154, 'FP0097', NULL, NULL, NULL, NULL, '1', 'Sedang Ditindaklanjuti', '2024-02-15 03:41:58', '2024-02-15 03:41:58'),
(155, 'FP0097', 'Oke Siapp', '2024-02-10', '2024-02-17', NULL, '1', 'Sedang Ditindaklanjuti', '2024-02-15 03:45:53', '2024-02-15 03:45:53'),
(156, 'FP0096', NULL, NULL, NULL, NULL, '1', 'Sedang Ditindaklanjuti', '2024-02-15 04:07:57', '2024-02-15 04:07:57'),
(157, 'FP0096', 'Wokehh siapp', '2024-02-16', '2024-02-16', NULL, '1', 'Sedang Ditindaklanjuti', '2024-02-15 04:08:10', '2024-02-15 04:08:10'),
(158, 'FP0095', NULL, NULL, NULL, NULL, '1', 'Sedang Ditindaklanjuti', '2024-02-15 04:11:18', '2024-02-15 04:11:18'),
(159, 'FP0094', NULL, NULL, NULL, NULL, '1', 'Sedang Ditindaklanjuti', '2024-02-15 04:25:52', '2024-02-15 04:25:52'),
(160, 'FP0097', 'Oke Siapp', '2024-02-10', '2024-02-17', 'public/jm70DD01UFUQcY2fK1J1tMFVj0rXdPi224gxTINt.xlsx', '1', 'Sedang Ditindaklanjuti', '2024-02-15 04:26:06', '2024-02-15 04:26:06'),
(161, 'FP0097', 'Oke Siapp', '2024-02-10', '2024-02-17', NULL, '2', 'DISUBMIT MAINTENANCE', '2024-02-15 04:36:05', '2024-02-15 04:36:05'),
(162, 'FP0096', 'Wokehh siapp', '2024-02-16', '2024-02-16', 'public/V8z4dPYdSaSC2CI7lXxrAkr2TYSxt3bt81Iohnob.xlsx', '1', 'Sedang Ditindaklanjuti', '2024-02-15 04:39:09', '2024-02-15 04:39:09'),
(163, 'FP0096', 'Wokehh siapp', '2024-02-16', '2024-02-16', 'public/gefsp2bV2TURH6bAy1NMVKKSQKXCZB6gjWbbIJjP.xlsx', '1', 'Sedang Ditindaklanjuti', '2024-02-15 04:47:58', '2024-02-15 04:47:58'),
(164, 'FP0096', 'Wokehh siapp', '2024-02-16', '2024-02-16', NULL, '1', 'Sedang Ditindaklanjuti', '2024-02-15 04:51:30', '2024-02-15 04:51:30'),
(165, 'FP0096', 'Wokehh siapp', '2024-02-16', '2024-02-16', NULL, '1', 'Sedang Ditindaklanjuti', '2024-02-15 06:17:51', '2024-02-15 06:17:51'),
(166, 'FP0096', 'Wokehh siapp', '2024-02-16', '2024-02-16', 'public/KGAU8dEe2LeJSfovIDhcIKbT6MJKHwyPkKvXWSTO.xlsx', '1', 'Sedang Ditindaklanjuti', '2024-02-15 06:20:04', '2024-02-15 06:20:04'),
(167, 'FP0096', 'Wokehh siapp', '2024-02-16', '2024-02-16', NULL, '2', 'DISUBMIT MAINTENANCE', '2024-02-15 06:20:16', '2024-02-15 06:20:16'),
(168, 'FP0095', NULL, NULL, NULL, 'public/ETGZZejSRKkhfhC0iKwyxh7cai9mdtTDKYwRiWfL.xlsx', '1', 'Sedang Ditindaklanjuti', '2024-02-15 06:22:27', '2024-02-15 06:22:27'),
(169, 'FP0097', NULL, NULL, NULL, NULL, '1', 'Maaf Salah File', '2024-02-15 06:23:47', '2024-02-15 06:23:47'),
(170, 'FP0096', NULL, NULL, NULL, NULL, '2', 'Dikonfirmasi Dept.Maintenance', '2024-02-15 06:24:30', '2024-02-15 06:24:30'),
(171, 'FP0096', NULL, NULL, NULL, NULL, '3', 'Diclosed Production', '2024-02-15 06:24:46', '2024-02-15 06:24:46'),
(172, 'FP0097', 'Oke siappp', '2024-02-14', '2024-02-15', 'public/WmAClo9npRp2X5O9FS63PGMICU4j2RJqNFnsxdU0.xlsx', '1', 'Sedang Ditindaklanjuti', '2024-02-15 06:30:47', '2024-02-15 06:30:47'),
(173, 'FP0097', 'Oke siappp', '2024-02-14', '2024-02-15', NULL, '2', 'DISUBMIT MAINTENANCE', '2024-02-15 06:31:23', '2024-02-15 06:31:23'),
(174, 'FP0095', 'Oke Sepp', '2024-02-22', '2024-02-15', NULL, '2', 'DISUBMIT MAINTENANCE', '2024-02-15 06:33:11', '2024-02-15 06:33:11'),
(175, 'FP0097', NULL, NULL, NULL, NULL, '1', 'Salah isi', '2024-02-15 06:33:53', '2024-02-15 06:33:53'),
(176, 'FP0095', NULL, NULL, NULL, NULL, '2', 'Dikonfirmasi Dept.Maintenance', '2024-02-15 06:34:08', '2024-02-15 06:34:08'),
(177, 'FP0095', NULL, NULL, NULL, NULL, '1', 'Salah isi', '2024-02-15 06:39:04', '2024-02-15 06:39:04'),
(178, 'FP0090', NULL, NULL, NULL, NULL, '1', NULL, '2024-02-15 06:41:05', '2024-02-15 06:41:05'),
(179, 'FP0097', 'Siapa ini', '2024-02-16', '2024-02-16', 'public/W4KzIRCAoV7UZ1jzKz9oBnXdztk23rt9FhsSZDq5.xlsx', '2', 'DISUBMIT MAINTENANCE', '2024-02-15 06:42:53', '2024-02-15 06:42:53'),
(180, 'FP0095', NULL, NULL, NULL, 'public/HZraPU8LA0jQQN1MohK6lRqD8akmT1WVShoRNErp.pdf', '1', 'Sedang Ditindaklanjuti', '2024-02-15 06:45:47', '2024-02-15 06:45:47'),
(181, 'FP0095', 'Oke Siapp', '2024-02-16', '2024-02-17', NULL, '1', 'Sedang Ditindaklanjuti', '2024-02-15 06:46:17', '2024-02-15 06:46:17'),
(182, 'FP0095', 'Oke Siapp', '2024-02-16', '2024-02-17', 'public/1N2Xk3dPKXMxnsIwe1YC50r4G7uNqIubuAxdpEjo.pdf', '1', 'Sedang Ditindaklanjuti', '2024-02-15 06:49:49', '2024-02-15 06:49:49'),
(183, 'FP0095', 'Oke Siapp', '2024-02-16', '2024-02-17', NULL, '2', 'DISUBMIT MAINTENANCE', '2024-02-15 06:50:00', '2024-02-15 06:50:00'),
(184, 'FP0101', NULL, NULL, NULL, NULL, '0', 'Form FPP Dibuat', '2024-02-15 07:21:52', '2024-02-15 07:21:52'),
(185, 'FP0102', NULL, NULL, NULL, NULL, '0', 'Form FPP Dibuat', '2024-02-15 07:23:20', '2024-02-15 07:23:20'),
(186, 'FP0103', NULL, NULL, NULL, NULL, '0', 'Form FPP Dibuat', '2024-02-15 07:25:21', '2024-02-15 07:25:21'),
(187, 'FP0104', NULL, NULL, NULL, NULL, '0', 'Form FPP Dibuat', '2024-02-15 07:31:27', '2024-02-15 07:31:27'),
(188, 'FP0104', NULL, NULL, NULL, NULL, '1', 'Sedang Ditindaklanjuti', '2024-02-15 07:34:59', '2024-02-15 07:34:59'),
(189, 'FP0104', NULL, NULL, NULL, NULL, '2', 'DISUBMIT MAINTENANCE', '2024-02-15 07:35:44', '2024-02-15 07:35:44'),
(190, 'FP0104', NULL, NULL, NULL, NULL, '2', 'Dikonfirmasi Dept.Maintenance', '2024-02-15 07:36:46', '2024-02-15 07:36:46'),
(191, 'FP0104', NULL, NULL, NULL, NULL, '3', 'Diclosed Production', '2024-02-15 07:48:23', '2024-02-15 07:48:23'),
(192, 'FP0103', NULL, NULL, NULL, NULL, '1', 'Sedang Ditindaklanjuti', '2024-02-15 07:51:23', '2024-02-15 07:51:23'),
(194, 'FP0102', NULL, NULL, NULL, NULL, '1', 'Sedang Ditindaklanjuti', '2024-02-15 07:54:47', '2024-02-15 07:54:47'),
(195, 'FP0102', 'WOKEHH SIAPP', '2024-02-15', '2024-02-17', NULL, '1', 'Sedang Ditindaklanjuti', '2024-02-15 07:55:04', '2024-02-15 07:55:04'),
(196, 'FP0103', 'SIAPPP', '2024-02-16', '2024-02-17', 'assets/attachment/Mesin Rusak.jpg', '1', 'Sedang Ditindaklanjuti', '2024-02-15 08:00:46', '2024-02-15 08:00:46'),
(197, 'FP0103', 'SIAPPP', '2024-02-16', '2024-02-17', 'assets/attachment/gunung.jpg', '1', 'Sedang Ditindaklanjuti', '2024-02-15 08:04:06', '2024-02-15 08:04:06'),
(198, 'FP0101', NULL, NULL, NULL, NULL, '1', 'Sedang Ditindaklanjuti', '2024-02-15 08:07:20', '2024-02-15 08:07:20'),
(199, 'FP0101', 'OKE SIAPPKAN SEMUANYA', '2024-02-16', '2024-02-17', NULL, '1', 'Sedang Ditindaklanjuti', '2024-02-15 08:07:39', '2024-02-15 08:07:39'),
(200, 'FP0101', 'OKE SIAPPKAN SEMUANYA', '2024-02-16', '2024-02-17', 'assets/attachment/Mesin Rusak.jpg', '1', 'Sedang Ditindaklanjuti', '2024-02-15 08:09:07', '2024-02-15 08:09:07'),
(201, 'FP0103', 'SIAPPP', '2024-02-16', '2024-02-17', 'assets/attachment/Tutorial Pembuatan Akun di Certiport.pdf', '1', 'Sedang Ditindaklanjuti', '2024-02-15 08:12:32', '2024-02-15 08:12:32'),
(202, 'FP0103', 'SIAPPP', '2024-02-16', '2024-02-17', 'assets/attachment/PanduanTesting Apps for AstraTech.xlsx', '1', 'Sedang Ditindaklanjuti', '2024-02-15 08:13:11', '2024-02-15 08:13:11'),
(203, 'FP0103', 'SIAPPP', '2024-02-16', '2024-02-17', 'assets/attachment/PK_42 review by RIF (1).docx', '1', 'Sedang Ditindaklanjuti', '2024-02-15 08:13:37', '2024-02-15 08:13:37'),
(204, 'FP0103', 'SIAPPP', '2024-02-16', '2024-02-17', 'assets/attachment/Microsoft Certification.docx', '1', 'Sedang Ditindaklanjuti', '2024-02-16 01:02:24', '2024-02-16 01:02:24'),
(205, 'FP0105', NULL, NULL, NULL, NULL, '0', 'Form FPP Dibuat', '2024-02-16 01:29:47', '2024-02-16 01:29:47'),
(206, 'FP0105', NULL, NULL, NULL, NULL, '1', 'Sedang Ditindaklanjuti', '2024-02-16 01:30:05', '2024-02-16 01:30:05'),
(207, 'FP0105', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-16 01:30:05', '2024-02-16 01:30:05'),
(208, 'FP0105', NULL, NULL, NULL, 'assets/attachment/gunung.jpg', '1', 'Sedang Ditindaklanjuti', '2024-02-16 01:32:48', '2024-02-16 01:32:48'),
(209, 'FP0106', NULL, NULL, NULL, NULL, '0', 'Form FPP Dibuat', '2024-02-16 01:37:24', '2024-02-16 01:37:24'),
(210, 'FP0106', NULL, NULL, NULL, NULL, '1', 'Sedang Ditindaklanjuti', '2024-02-16 01:37:44', '2024-02-16 01:37:44'),
(211, 'FP0106', NULL, NULL, NULL, 'assets/attachment/Microsoft Certification (1).docx', '1', 'Sedang Ditindaklanjuti', '2024-02-16 01:38:42', '2024-02-16 01:38:42'),
(212, 'FP0106', NULL, NULL, NULL, NULL, '2', 'DISUBMIT MAINTENANCE', '2024-02-16 12:03:47', '2024-02-16 12:03:47'),
(213, 'FP0107', NULL, NULL, NULL, NULL, '0', 'Form FPP Dibuat', '2024-02-26 01:42:17', '2024-02-26 01:42:17'),
(214, 'FP0107', NULL, NULL, NULL, NULL, '1', 'Sedang Ditindaklanjuti', '2024-02-26 01:42:53', '2024-02-26 01:42:53'),
(215, 'FP0107', 'Ganti Sparepart', '2024-02-16', '2024-02-13', 'assets/attachment/PanduanTesting Apps for AstraTech.xlsx', '1', 'Sedang Ditindaklanjuti', '2024-02-26 01:43:38', '2024-02-26 01:43:38'),
(216, 'FP0107', 'Ganti Sparepart', '2024-02-16', '2024-02-13', NULL, '2', 'DISUBMIT MAINTENANCE', '2024-02-26 01:44:43', '2024-02-26 01:44:43'),
(217, 'FP0107', NULL, NULL, NULL, NULL, '1', 'Ada data yang kurang', '2024-02-26 01:45:31', '2024-02-26 01:45:31'),
(218, 'FP0107', NULL, NULL, NULL, NULL, '2', 'DISUBMIT MAINTENANCE', '2024-02-26 01:54:53', '2024-02-26 01:54:53'),
(219, 'FP0107', NULL, NULL, NULL, NULL, '2', 'Dikonfirmasi Dept.Maintenance', '2024-02-26 01:55:16', '2024-02-26 01:55:16'),
(220, 'FP0107', NULL, NULL, NULL, NULL, '3', 'Diclosed Production', '2024-02-26 01:55:54', '2024-02-26 01:55:54'),
(221, 'FP0105', NULL, '2024-02-15', '2024-02-16', NULL, '1', 'Sedang Ditindaklanjuti', '2024-02-26 02:20:32', '2024-02-26 02:20:32'),
(222, 'FP0105', NULL, '2024-02-15', '2024-02-17', NULL, '1', 'Sedang Ditindaklanjuti', '2024-02-26 02:22:03', '2024-02-26 02:22:03'),
(223, 'FP0105', NULL, '2024-02-15', '2024-02-15', 'assets/attachment/gunung.jpg', '1', 'Sedang Ditindaklanjuti', '2024-02-26 04:18:05', '2024-02-26 04:18:05');

-- --------------------------------------------------------

--
-- Table structure for table `type_materials`
--

CREATE TABLE `type_materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_materials`
--

INSERT INTO `type_materials` (`id`, `type_name`, `created_at`, `updated_at`) VALUES
(1, 'GO4OF', NULL, NULL),
(2, 'GOA', NULL, NULL),
(3, 'GO5', NULL, NULL),
(4, 'DC11', NULL, NULL),
(5, 'DC53', NULL, NULL),
(6, 'DCMX', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `handlings`
--
ALTER TABLE `handlings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `handlings_customer_id_foreign` (`customer_id`),
  ADD KEY `handlings_type_id_foreign` (`type_id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
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
-- Indexes for table `schedule_visits`
--
ALTER TABLE `schedule_visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedule_visits_handling_id_foreign` (`handling_id`);

--
-- Indexes for table `tindak_lanjuts`
--
ALTER TABLE `tindak_lanjuts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_materials`
--
ALTER TABLE `type_materials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_f_p_p_s`
--
ALTER TABLE `form_f_p_p_s`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `handlings`
--
ALTER TABLE `handlings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mesins`
--
ALTER TABLE `mesins`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
-- AUTO_INCREMENT for table `preventives`
--
ALTER TABLE `preventives`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule_visits`
--
ALTER TABLE `schedule_visits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tindak_lanjuts`
--
ALTER TABLE `tindak_lanjuts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT for table `type_materials`
--
ALTER TABLE `type_materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `handlings`
--
ALTER TABLE `handlings`
  ADD CONSTRAINT `handlings_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `handlings_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `type_materials` (`id`);

--
-- Constraints for table `schedule_visits`
--
ALTER TABLE `schedule_visits`
  ADD CONSTRAINT `schedule_visits_handling_id_foreign` FOREIGN KEY (`handling_id`) REFERENCES `handlings` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
