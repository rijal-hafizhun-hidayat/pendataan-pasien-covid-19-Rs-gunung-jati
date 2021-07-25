-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2021 at 01:29 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumah_sakit`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `username`, `password`, `level`) VALUES
(101, 'kevin', 'cirebon123', 'staff'),
(104, 'admin', 'admin123', 'dokter');

-- --------------------------------------------------------

--
-- Table structure for table `banyak_ruang`
--

CREATE TABLE `banyak_ruang` (
  `id_banyak_ruang` int(50) NOT NULL,
  `banyak` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banyak_ruang`
--

INSERT INTO `banyak_ruang` (`id_banyak_ruang`, `banyak`) VALUES
(1, 46);

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `id_bayar` int(50) NOT NULL,
  `nama_pembayar` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `level_ruang` int(50) NOT NULL,
  `jumlah_bayar` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bayar`
--

INSERT INTO `bayar` (`id_bayar`, `nama_pembayar`, `gender`, `level_ruang`, `jumlah_bayar`) VALUES
(208, 'nugraha', 'laki', 500000, 900000),
(209, 'sksks', 'laki', 1000000, 1200000),
(215, 'tretan', 'laki', 500000, 700000);

--
-- Triggers `bayar`
--
DELIMITER $$
CREATE TRIGGER `kurangi_ruang` AFTER INSERT ON `bayar` FOR EACH ROW BEGIN
UPDATE banyak_ruang
SET banyak=banyak-1;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_ruang` AFTER DELETE ON `bayar` FOR EACH ROW BEGIN
UPDATE banyak_ruang
SET banyak=banyak+1;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `banyak_ruang`
--
ALTER TABLE `banyak_ruang`
  ADD PRIMARY KEY (`id_banyak_ruang`);

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `banyak_ruang`
--
ALTER TABLE `banyak_ruang`
  MODIFY `id_banyak_ruang` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bayar`
--
ALTER TABLE `bayar`
  MODIFY `id_bayar` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
