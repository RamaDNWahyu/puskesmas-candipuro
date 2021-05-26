-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2021 at 05:41 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_puskes`
--

-- --------------------------------------------------------

--
-- Table structure for table `berobat`
--

CREATE TABLE `berobat` (
  `id` int(11) NOT NULL,
  `no_rm` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `jenis_kunjungan` varchar(20) NOT NULL,
  `rujukan` tinytext NOT NULL DEFAULT '0',
  `kepesertaan` varchar(25) NOT NULL,
  `status` enum('Menunggu','Selesai') NOT NULL DEFAULT 'Menunggu',
  `tanggal` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berobat`
--

INSERT INTO `berobat` (`id`, `no_rm`, `no_urut`, `jenis_kunjungan`, `rujukan`, `kepesertaan`, `status`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'KIA', '1', 'PBI', 'Menunggu', '2021-05-12 10:55:01', '2021-05-12 03:55:01', '2021-05-12 03:55:01'),
(3, 1, 2, 'KIA', '0', 'PBI', 'Selesai', '2021-05-12 11:31:55', '2021-05-12 04:31:55', '2021-05-12 04:31:55'),
(4, 1, 3, 'KIA', '1', 'UMUM', 'Menunggu', '2021-05-12 11:57:01', '2021-05-12 04:57:01', '2021-05-12 04:57:01'),
(11, 1, 1, 'KIA', '0', 'UMUM', 'Menunggu', '2021-05-14 15:11:26', '2021-05-14 08:11:26', '2021-05-14 08:11:26'),
(12, 1, 1, 'KIA', '0', 'NON PBI', 'Menunggu', '2021-05-15 06:30:41', '2021-05-14 23:30:41', '2021-05-14 23:30:41'),
(14, 2105210003, 1, 'KIA', '0', 'PBI', 'Selesai', '2021-05-21 20:35:44', '2021-05-21 13:35:44', '2021-05-21 13:53:39'),
(15, 1, 2, 'KIA', '0', 'NON PBI', 'Menunggu', '2021-05-21 20:36:19', '2021-05-21 13:36:19', '2021-05-21 13:36:19'),
(16, 1, 1, 'KIA', '1', 'NON PBI', 'Menunggu', '2021-05-25 09:40:03', '2021-05-25 02:40:03', '2021-05-25 02:40:03');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_pemeriksaan`
--

CREATE TABLE `hasil_pemeriksaan` (
  `id` int(11) NOT NULL,
  `no_rm` int(11) NOT NULL,
  `id_berobat` int(11) NOT NULL,
  `keluhan` text NOT NULL,
  `diagnosa` text NOT NULL,
  `terapi` text NOT NULL,
  `keterangan` text NOT NULL,
  `kunjungan` enum('Baru','Lama') NOT NULL DEFAULT 'Baru',
  `Kasus` enum('Baru','Lama') NOT NULL DEFAULT 'Baru',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil_pemeriksaan`
--

INSERT INTO `hasil_pemeriksaan` (`id`, `no_rm`, `id_berobat`, `keluhan`, `diagnosa`, `terapi`, `keterangan`, `kunjungan`, `Kasus`, `created_at`, `updated_at`) VALUES
(2, 1, 12, 'dawda', 'dawda', 'dawd', 'dawdaw', 'Baru', 'Baru', '2021-05-15 00:18:17', '2021-05-15 00:18:17'),
(3, 2105210003, 14, 'batuk', 'sakit', 'paracet', 'sembuh', 'Baru', 'Baru', '2021-05-21 14:09:27', '2021-05-21 14:09:27');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `type` varchar(25) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `content`, `type`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Pengguna Wahyu Ramadhan Berhasil Login pada IP : 127.0.0.1', 'log', 2, '2021-05-20 09:00:39', '2021-05-20 09:00:39'),
(2, 'Pengguna Wahyu Ramadhan Berhasil Login pada IP : 127.0.0.1', 'log', 2, '2021-05-20 22:42:45', '2021-05-20 22:42:45'),
(3, 'Pengguna Wahyu Ramadhan Berhasil Login pada IP : 127.0.0.1', 'event', 2, '2021-05-20 22:42:45', '2021-05-20 22:42:45'),
(4, 'Update Pasien : 13', 'event', 13, '2021-05-21 13:23:49', '2021-05-21 13:23:49'),
(5, 'Menyimpan berobat NO RM : 2105210003', 'event', 13, '2021-05-21 13:31:10', '2021-05-21 13:31:10'),
(6, 'Pengguna Petugas Pelayanan Berhasil Login pada IP : 127.0.0.1', 'log', 3, '2021-05-21 13:34:45', '2021-05-21 13:34:45'),
(7, 'Menyimpan berobat NO RM : 2105210003', 'event', 13, '2021-05-21 13:35:44', '2021-05-21 13:35:44'),
(8, 'Pengguna Wahyu Ramadhan Berhasil Login pada IP : 127.0.0.1', 'log', 2, '2021-05-21 13:36:04', '2021-05-21 13:36:04'),
(9, 'Menyimpan berobat NO RM : 1', 'event', 2, '2021-05-21 13:36:19', '2021-05-21 13:36:19'),
(10, 'Pengguna Petugas Pelayanan Berhasil Login pada IP : 127.0.0.1', 'log', 3, '2021-05-21 13:39:19', '2021-05-21 13:39:19'),
(11, 'Pengguna Petugas Pelayanan Berhasil Login pada IP : 127.0.0.1', 'log', 3, '2021-05-21 13:41:33', '2021-05-21 13:41:33'),
(12, 'Pengguna Petugas KIA Berhasil Login pada IP : 127.0.0.1', 'log', 5, '2021-05-21 13:57:11', '2021-05-21 13:57:11'),
(13, 'Pengguna Petugas Medis Berhasil Login pada IP : 127.0.0.1', 'log', 4, '2021-05-21 14:06:41', '2021-05-21 14:06:41'),
(14, 'Menyimpan Hasil Pemeriksaan RM : 2105210003', 'event', 4, '2021-05-21 14:09:27', '2021-05-21 14:09:27'),
(15, 'Pengguna Petugas Medis Berhasil Login pada IP : 127.0.0.1', 'log', 4, '2021-05-25 01:41:18', '2021-05-25 01:41:18'),
(16, 'Pengguna Wahyu Ramadhan Berhasil Login pada IP : 127.0.0.1', 'log', 2, '2021-05-25 02:24:32', '2021-05-25 02:24:32'),
(17, 'Update Pasien : 2', 'event', 2, '2021-05-25 02:24:39', '2021-05-25 02:24:39'),
(18, 'Pengguna Petugas Medis Berhasil Login pada IP : 127.0.0.1', 'log', 4, '2021-05-25 02:38:03', '2021-05-25 02:38:03'),
(19, 'Pengguna Wahyu Ramadhan Berhasil Login pada IP : 127.0.0.1', 'log', 2, '2021-05-25 02:39:50', '2021-05-25 02:39:50'),
(20, 'Menyimpan berobat NO RM : 1', 'event', 2, '2021-05-25 02:40:03', '2021-05-25 02:40:03'),
(21, 'Pengguna Petugas Pelayanan Berhasil Login pada IP : 127.0.0.1', 'log', 3, '2021-05-25 02:42:52', '2021-05-25 02:42:52'),
(22, 'Pengguna Petugas KIA Berhasil Login pada IP : 127.0.0.1', 'log', 5, '2021-05-25 03:12:43', '2021-05-25 03:12:43'),
(23, 'Pengguna Wahyu Ramadhan Berhasil Login pada IP : 127.0.0.1', 'log', 2, '2021-05-25 03:50:03', '2021-05-25 03:50:03');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_05_06_105225_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mtbs`
--

CREATE TABLE `mtbs` (
  `id` int(11) NOT NULL,
  `no_rm` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `nama_anak` varchar(100) NOT NULL,
  `gender` enum('Lelaki','Perempuan') NOT NULL DEFAULT 'Lelaki',
  `berat_badan` int(11) NOT NULL DEFAULT 0,
  `tinggi` int(11) NOT NULL DEFAULT 0,
  `suhu` int(11) NOT NULL DEFAULT 0,
  `keluhan` text DEFAULT NULL,
  `kunjungan_pertama` tinyint(4) NOT NULL DEFAULT 0,
  `kunjungan_ulang` tinyint(4) NOT NULL DEFAULT 0,
  `tanda_bahaya` text NOT NULL,
  `batuk` tinyint(4) NOT NULL DEFAULT 0,
  `batuk_lama` int(11) NOT NULL DEFAULT 0,
  `demam` tinyint(4) NOT NULL DEFAULT 0,
  `demam_lama` int(11) NOT NULL DEFAULT 0,
  `demam_tiap_hari` tinyint(4) NOT NULL DEFAULT 0,
  `diare` tinyint(4) NOT NULL DEFAULT 0,
  `diare_lama` int(11) NOT NULL DEFAULT 0,
  `darah_demam` int(11) NOT NULL,
  `klasifikasi_bahaya_umum` tinyint(4) NOT NULL DEFAULT 0,
  `tindakan_bahaya_umum` text DEFAULT NULL,
  `hasil_rdt` text NOT NULL,
  `hasil_sdm` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mtbs`
--

INSERT INTO `mtbs` (`id`, `no_rm`, `tanggal`, `nama_anak`, `gender`, `berat_badan`, `tinggi`, `suhu`, `keluhan`, `kunjungan_pertama`, `kunjungan_ulang`, `tanda_bahaya`, `batuk`, `batuk_lama`, `demam`, `demam_lama`, `demam_tiap_hari`, `diare`, `diare_lama`, `darah_demam`, `klasifikasi_bahaya_umum`, `tindakan_bahaya_umum`, `hasil_rdt`, `hasil_sdm`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-05-20', 'dawd', 'Lelaki', 232, 2323, 232, 'dawda', 0, 0, 'Kejang', 0, 23, 0, 232, 0, 0, 23, 0, 0, 'dawd', 'dawdwa', 'dawdaw', '2021-05-19 03:22:53', '2021-05-19 03:22:53'),
(2, 1005210001, '2021-05-20', 'dawdawdaw', 'Lelaki', 22, 22, 22, 'dawd', 0, 0, 'Kejang', 0, 22, 0, 22, 0, 0, 22, 0, 0, 'dawdaw', 'dawd', 'adawda', '2021-05-19 03:23:29', '2021-05-19 03:23:29'),
(3, 1005210001, NULL, 'dawda', 'Perempuan', 22, 22, 22, 'dawda', 1, 1, 'Memuntahkan semuanya,Letangis atau Tidak sadar', 1, 22, 1, 22, 0, 0, 22, 1, 0, 'awdawd', 'awdawd', 'wadawdwwwww', '2021-05-20 08:37:36', '2021-05-20 08:42:36');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `ketentuan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `kode`, `name`, `jenis`, `ketentuan`, `created_at`, `updated_at`) VALUES
(1, '353452', 'Ultraflue', 'Anak anak', 'YAHAHAHAHA', '2021-05-09 10:27:57', NULL),
(2, '3534533', 'Hufagrip', 'dewasa', 'YAHAHAHAHA', '2021-05-09 10:27:57', NULL),
(4, 'sadsdasd', 'dawdwaddddd', 'Anak - Anak', 'Anak - Anak', '2021-05-09 10:40:18', '2021-05-09 10:45:58');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ktp` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_rm` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kk` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `gender` enum('Lelaki','Perempuan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kepesertaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('Admin','Pasien','Petugas Medis','Petugas Pelayanan','Petugas KIA','Kepala Puskes') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pasien',
  `updated` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ktp`, `no_rm`, `name`, `nama_kk`, `email`, `no_hp`, `username`, `tanggal_lahir`, `gender`, `alamat`, `pekerjaan`, `kepesertaan`, `verified_at`, `password`, `remember_token`, `role`, `updated`, `created_at`, `updated_at`) VALUES
(2, '187115', '1', 'Wahyu Ramadhan', 'Ranma', 'ranma@gmail.com', '081414515197', 'ramadhan076', '1997-05-07', 'Perempuan', 'Tidadk punya rumah', 'Lagi Gabuts', 'NON PBI', NULL, '$2y$10$TgNlPnTFxkD/mIaG3F3GIuOz1ORSWtGO9TbvOZ914yocuoR/Br8eK', NULL, 'Pasien', 1, '2021-05-06 23:19:07', '2021-05-25 02:24:39'),
(3, '1', '2', 'Petugas Pelayanan', NULL, 'pelayanan@mail.com', NULL, 'pelayanan', '2019-05-07', 'Lelaki', 'Tidak punya rumah', 'Lagi Gabut', 'PELAYANAN', '2021-05-07 01:16:37', '$2y$10$TgNlPnTFxkD/mIaG3F3GIuOz1ORSWtGO9TbvOZ914yocuoR/Br8eK', NULL, 'Petugas Pelayanan', 1, '2021-05-06 23:19:07', '2021-05-06 23:19:07'),
(4, '2', '3', 'Petugas Medis', NULL, 'medis@mail.com', NULL, 'medis', '2019-05-07', 'Lelaki', 'Tidak punya rumah', 'Lagi Gabut', 'MEDIS', '2021-05-07 01:16:37', '$2y$10$TgNlPnTFxkD/mIaG3F3GIuOz1ORSWtGO9TbvOZ914yocuoR/Br8eK', NULL, 'Petugas Medis', 1, '2021-05-06 23:19:07', '2021-05-06 23:19:07'),
(5, '3', '4', 'Petugas KIA', NULL, 'kia@mail.com', NULL, 'kia', '2019-05-07', 'Lelaki', 'Tidak punya rumah', 'Lagi Gabut', 'KIA', '2021-05-07 01:16:37', '$2y$10$TgNlPnTFxkD/mIaG3F3GIuOz1ORSWtGO9TbvOZ914yocuoR/Br8eK', NULL, 'Petugas KIA', 1, '2021-05-06 23:19:07', '2021-05-06 23:19:07'),
(6, '4', '5', 'Kepala Puskesmas', NULL, 'kepala@mail.com', NULL, 'kepala', '2019-05-07', 'Lelaki', 'Tidak punya rumah', 'Lagi Gabut', 'KEPALA PUSKES', '2021-05-07 01:16:37', '$2y$10$TgNlPnTFxkD/mIaG3F3GIuOz1ORSWtGO9TbvOZ914yocuoR/Br8eK', NULL, 'Kepala Puskes', 1, '2021-05-06 23:19:07', '2021-05-06 23:19:07'),
(10, '123456', '1005210001', 'Waaa', 'Yuuuu', 'loosen.memories@gmail.com', '2222222', 'ranmaaaa', '1997-10-14', 'Perempuan', 'Jalaaannn', 'Programmer', 'PBI', NULL, '$2y$10$TgNlPnTFxkD/mIaG3F3GIuOz1ORSWtGO9TbvOZ914yocuoR/Br8eK', NULL, 'Pasien', 1, '2021-05-09 23:01:57', '2021-05-09 23:01:57'),
(11, '2432342', '2105210001', 'esfselfhkj', NULL, 'afkjfh@gmail.com', NULL, 'fakjefsekjf', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$j2pPySKQ.HBb2qo3FU.2FeyGnJUdCjSGFHsvOZ/KpdpJvoBSp9ZEG', NULL, 'Pasien', 1, '2021-05-21 13:15:36', '2021-05-21 13:15:36'),
(12, '34234', '2105210002', 'seflksejlk', NULL, 'dawf@gmail.com', NULL, 'dfafjkafn', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$8o46z3/AwnKeenyKwdO.4.JviyxOl8HogBVl169myyYHcxR5iKlua', NULL, 'Pasien', 1, '2021-05-21 13:16:11', '2021-05-21 13:16:11'),
(13, '12344566', '2105210003', 'layla', 'angga', 'laylatulazizah@gmai.com', '0987653421', 'laylacantik', '2000-02-15', 'Perempuan', 'jl sidoasri', 'wiraswasta', 'PBI', NULL, '$2y$10$3ff8nl0Sq.tpIZDoK.QQpOLe9cOSYm4EhDIJ6gRuRxYY9LFDJTiTK', NULL, 'Pasien', 1, '2021-05-21 13:19:39', '2021-05-21 13:23:49'),
(14, '435345345', '2505210001', 'Wahyu Ramadhan', NULL, 'wahyu.ramadfhfhhfdeffan59@gmail.com', NULL, 'loosen076', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$dSXk0A0f46I3Pzw7IY9SwOYvaiMD9AqOk0nqorHEyCEnI/7YFEZCS', NULL, 'Pasien', 0, '2021-05-25 02:02:56', '2021-05-25 02:02:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berobat`
--
ALTER TABLE `berobat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hasil_pemeriksaan`
--
ALTER TABLE `hasil_pemeriksaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mtbs`
--
ALTER TABLE `mtbs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `ktp` (`ktp`),
  ADD UNIQUE KEY `no_rm` (`no_rm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berobat`
--
ALTER TABLE `berobat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hasil_pemeriksaan`
--
ALTER TABLE `hasil_pemeriksaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mtbs`
--
ALTER TABLE `mtbs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
