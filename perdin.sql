-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2026 at 02:50 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perdin`
--

-- --------------------------------------------------------

--
-- Table structure for table `datakota`
--

CREATE TABLE `datakota` (
  `id` int(11) NOT NULL,
  `nama_kota` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `pulau` varchar(255) NOT NULL,
  `luar_negeri` varchar(255) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datakota`
--

INSERT INTO `datakota` (`id`, `nama_kota`, `provinsi`, `pulau`, `luar_negeri`, `latitude`, `longitude`) VALUES
(1, 'Surabaya', 'Jawa Timur', 'Jawa', 'Tidak', -7.2653, 112.7425),
(2, 'Tegal', 'Jawa Tengah', 'Jawa', 'Tidak', -6.8707, 109.1332);

-- --------------------------------------------------------

--
-- Table structure for table `dataperjalanan`
--

CREATE TABLE `dataperjalanan` (
  `id` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_kota_asal` int(11) NOT NULL,
  `id_kota_tujuan` int(11) NOT NULL,
  `tanggal_awal` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `keterangan` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dataperjalanan`
--

INSERT INTO `dataperjalanan` (`id`, `id_pengguna`, `id_kota_asal`, `id_kota_tujuan`, `tanggal_awal`, `tanggal_akhir`, `keterangan`, `status`) VALUES
(1, 1, 1, 2, '2026-05-11', '2026-05-15', NULL, 'Pending'),
(2, 1, 2, 1, '2026-05-06', '2026-05-26', 'Jalan-jalan', 'Approved'),
(3, 1, 1, 1, '2026-05-15', '2026-05-16', NULL, 'Pending'),
(4, 1, 1, 2, '2026-05-21', '2026-05-23', 'Liburan', 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `kata_sandi` varchar(255) NOT NULL,
  `posisi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama_pengguna`, `kata_sandi`, `posisi`) VALUES
(1, 'abc', '$2y$10$1k8zx76t4U/sRyjIJ6V/VuKu3eAZW7XNkiTkQA8jDFMgrdkHp9VWG', 'Pegawai'),
(2, 'def', '$2y$10$0DKaXGkSbgEAy5tqRbrCv.aYEkmoQrRoeCd5WxjTOMjZlyZUSJKCe', NULL),
(3, 'a', '$2y$10$rYu4Q8Y1pe62Gz7AsUdtiuDlRA/7uvWmOuWYt7PR3c0MCKTX/md/C', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datakota`
--
ALTER TABLE `datakota`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_kota` (`nama_kota`);

--
-- Indexes for table `dataperjalanan`
--
ALTER TABLE `dataperjalanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pengguna` (`id_pengguna`),
  ADD KEY `fk_kota_asal` (`id_kota_asal`),
  ADD KEY `fk_kota_tujuan` (`id_kota_tujuan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`nama_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datakota`
--
ALTER TABLE `datakota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dataperjalanan`
--
ALTER TABLE `dataperjalanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dataperjalanan`
--
ALTER TABLE `dataperjalanan`
  ADD CONSTRAINT `fk_kota_asal` FOREIGN KEY (`id_kota_asal`) REFERENCES `datakota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kota_tujuan` FOREIGN KEY (`id_kota_tujuan`) REFERENCES `datakota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
