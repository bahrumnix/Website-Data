-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2021 at 03:46 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_mahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nomor` int(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nim` varchar(25) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nomor`, `nama`, `nim`, `nohp`, `agama`, `alamat`) VALUES
(30, 'Ayatullah Fajri', '123456789876553', '0853942810941', 'Islam', 'Pasir Putih, Kota Jambi                                     '),
(34, 'Bani', '20515070922112', '0895606819311', 'Islam', 'Kota Jambi'),
(35, 'Bahrum Nisar', '205150200111070', '0895606819311', 'Islam', 'Talang Bakung, Kota Jambi'),
(36, 'Raka Ardiansyah', '205150200111069', '0895606818822', 'Islam', 'Tebing Tinggi, Sumatra Utara');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'bahrum', '$2y$10$8yOMW6ZscdKbWOsXyeWkzeD2aGSSkz5/b3xEG.dYQRBMSp0K.GCkq'),
(3, 'kaliber1933', '$2y$10$K8GbG9hfJ6opALKG1bd3yOakMc6zbI3ON1XMUkTSt/el0P/MzRlEK'),
(4, 'raka123', '$2y$10$jGlRyr.J17UhE7YCc7O5H.tR7kjjCbvvUsXWcMkIsmcZ0EMjM59b2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `nomor` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
