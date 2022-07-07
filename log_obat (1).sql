-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2022 at 03:05 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik_312010067`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_obat`
--

CREATE TABLE `log_obat` (
  `id_log` int(100) NOT NULL,
  `id_obat` int(10) DEFAULT NULL,
  `nama_obat_lama` varchar(100) DEFAULT NULL,
  `Nama_obat_baru` varchar(100) DEFAULT NULL,
  `waktu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_obat`
--

INSERT INTO `log_obat` (`id_log`, `id_obat`, `nama_obat_lama`, `Nama_obat_baru`, `waktu`) VALUES
(1, 2226, 'tolak angin', 'promag', '2022-06-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_obat`
--
ALTER TABLE `log_obat`
  ADD PRIMARY KEY (`id_log`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_obat`
--
ALTER TABLE `log_obat`
  MODIFY `id_log` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
