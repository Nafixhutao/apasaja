-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 19, 2025 at 06:12 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_form`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int NOT NULL,
  `nim` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jurusan` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `agama` varchar(40) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_general_ci,
  `hobi` set('Membaca','Menulis','Olahraga','Musik') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` enum('Aktif','Cuti') COLLATE utf8mb4_general_ci DEFAULT 'Aktif',
  `foto` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `berkas_pendukung` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_pendaftaran` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `tanggal_lahir`, `email`, `no_hp`, `jenis_kelamin`, `jurusan`, `agama`, `alamat`, `hobi`, `status`, `foto`, `berkas_pendukung`, `tgl_pendaftaran`) VALUES
(13, '2222222222222', 'WIRDA NASUTION', '2025-05-15', 'kuramanafi231@gmail.com', '08773507622', 'Laki-laki', 'Teknik Informatika', 'islam', 'Harvest city Quince blossom 3/19', 'Membaca', 'Aktif', 'profile_6829d6e2a9f88.png', NULL, '2025-05-18 12:47:30'),
(14, '32131331231', 'WIRDA NASUTION', '2025-05-13', 'kuramanafi231@gmail.com', '08773507622', 'Laki-laki', 'bisnis digital', 'islam', 'Harvest city Quince blossom 3/19', 'Membaca', 'Aktif', 'profile_682a6c3d4be48.png', NULL, '2025-05-18 23:24:45'),
(21, '32923482348222', 'WIRDA NASUTION', '2025-05-20', 'kuramanafi231@gmail.com', '08773507622', 'Laki-laki', 'Teknik Komputer', 'kristen', 'Harvest city Quince blossom 3/19', 'Membaca', 'Aktif', 'profile_682ac03feb82a.jpg', NULL, '2025-05-19 05:23:11'),
(23, '32923482348', 'WIRDA NASUTION', '2025-05-13', 'kuramanafi231@gmail.com', '08773507622', 'Laki-laki', 'Sistem Informasi', 'islam', 'Harvest city Quince blossom 3/19', 'Membaca', 'Aktif', 'profile_682ac3a40eed6.jpg', NULL, '2025-05-19 05:37:40'),
(25, '3213133123122', 'WIRDA NASUTION', '2025-05-12', 'kuramanafi231@gmail.com', '08773507622', 'Laki-laki', 'Teknik Komputer', 'hindu', 'Harvest city Quince blossom 3/19', 'Membaca', 'Aktif', 'profile_682ac689cdebb.jpg', NULL, '2025-05-19 05:50:01');

-- --------------------------------------------------------

--
-- Table structure for table `table_agama`
--

CREATE TABLE `table_agama` (
  `id_agama` int DEFAULT NULL,
  `agama` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `table_agama`
--

INSERT INTO `table_agama` (`id_agama`, `agama`) VALUES
(1, 'islam'),
(2, 'kristen'),
(3, 'hindu'),
(4, 'katolik'),
(5, 'buddha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indexes for table `table_agama`
--
ALTER TABLE `table_agama`
  ADD UNIQUE KEY `id_agama` (`id_agama`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
