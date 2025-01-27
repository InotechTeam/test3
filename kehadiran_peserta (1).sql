-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2024 at 11:23 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kehadiran_peserta`
--

-- --------------------------------------------------------

--
-- Table structure for table `aktiviti`
--

CREATE TABLE `aktiviti` (
  `id_aktiviti` int(5) NOT NULL,
  `nama_aktiviti` text DEFAULT NULL,
  `tarikh_aktiviti` date DEFAULT NULL,
  `masa_mula` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aktiviti`
--

INSERT INTO `aktiviti` (`id_aktiviti`, `nama_aktiviti`, `tarikh_aktiviti`, `masa_mula`) VALUES
(1111, 'Bengkel robot sumo', '2023-08-23', '08.00 pagi'),
(2226, 'Bengkel Robot 2 ', '2024-02-02', '10.00 pagi');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `Id` int(11) NOT NULL,
  `id_aktiviti` int(7) DEFAULT NULL,
  `nokp` varchar(12) NOT NULL,
  `masa_hadir` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `Id` int(11) NOT NULL,
  `nama` varchar(60) DEFAULT NULL,
  `nokp` varchar(12) NOT NULL,
  `id_sekolah` int(7) DEFAULT NULL,
  `tahap` varchar(20) DEFAULT NULL,
  `katalaluan` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`Id`, `nama`, `nokp`, `id_sekolah`, `tahap`, `katalaluan`) VALUES
(1, 'manusia', '11111111111', 8888, 'PESERTA BIASA', '123'),
(2, 'ANIQ', '1235', 8888, 'ADMIN', '123'),
(3, 'ADI', '5555', 8888, 'ADMIN \n', '123'),
(4, 'EHSAN', '6666', 9999, 'ADMIN', '123'),
(5, 'jamal', '5556', 8888, 'ADMIN', '123'),
(7, 'Aqilah', '123456071234', 9999, 'PESERTA BIASA', '123'),
(8, 'HASIF', '9087', 8888, 'PESERTA BIASA', '123'),
(10, 'Muhammad Fairuz', '070730020665', 8888, 'PESERTA BIASA', 'amjadgay'),
(11, 'ASIF', '9187', 8888, 'PESERTA BIASA', '123'),
(17, 'HASIF', '9087', 8888, 'PESERTA BIASA \n', '123');

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `Nama_sekolah` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `Nama_sekolah`) VALUES
(8888, 'SMKDS'),
(9999, 'SMKD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktiviti`
--
ALTER TABLE `aktiviti`
  ADD PRIMARY KEY (`id_aktiviti`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `id_aktiviti` (`id_aktiviti`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `id_sekolah` (`id_sekolah`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aktiviti`
--
ALTER TABLE `aktiviti`
  MODIFY `id_aktiviti` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2227;

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD CONSTRAINT `kehadiran_ibfk_1` FOREIGN KEY (`nokp`) REFERENCES `peserta` (`nokp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kehadiran_ibfk_2` FOREIGN KEY (`id_aktiviti`) REFERENCES `aktiviti` (`id_aktiviti`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `peserta_ibfk_1` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id_sekolah`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
