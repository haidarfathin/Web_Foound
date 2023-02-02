-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2023 at 03:28 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lost_found`
--

-- --------------------------------------------------------

--
-- Table structure for table `lost`
--

CREATE TABLE `lost` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `desc_barang` text NOT NULL,
  `area` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `nama_pemilik` varchar(200) NOT NULL,
  `status_pemilik` varchar(10) NOT NULL,
  `kelas` varchar(7) NOT NULL,
  `foto_bukti` varchar(200) NOT NULL,
  `returned` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lost`
--

INSERT INTO `lost` (`id`, `username`, `nama_barang`, `desc_barang`, `area`, `tanggal`, `gambar`, `nama_pemilik`, `status_pemilik`, `kelas`, `foto_bukti`, `returned`) VALUES
(35, 'admin', 'Jaket Ultraman', 'jaket gambar ultraman warna biru ada fotonya', 'ruang SBII-09', '2022-12-31 12:16:00', 'hilang-20221231-121652.jpg', '', '', '', '', 0),
(36, 'admin', 'Corkcicle', 'ditemukan tumblr mahal warna hitam siapa mau', 'ruang SBII-07', '2022-12-31 12:17:00', 'hilang-20221231-121733.jpg', '', '', '', '', 0),
(37, 'haidara', 'Tempat pensil ', 'tempat pensil gambar prozen ini siapa yang punya', 'ruang SBII-09', '2022-12-31 12:18:00', 'hilang-20221231-121806.jpg', '', '', '', '', 0),
(38, 'haidara', 'Kunci mobil toyota', 'kunci mobil toyota ini siapa yang punyaa', 'ruang SAII-09', '2022-12-31 12:18:00', 'hilang-20221231-121844.jpg', 'Bambang slebew', 'mahasiswa', 'IK2C', 'pemilik-20230104-203940.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nomor` varchar(15) NOT NULL,
  `foto_profil` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `nama_lengkap`, `password`, `nomor`, `foto_profil`) VALUES
(1, 'haidara', 'Muhammad Haidar Alfathin', '$2y$10$wTjmtf9tAzz.7yjmckOUq.gB38Yzr9dK9xTiP84p3rg9KKwunIAN2', '6287828817102', 'profil-haidara.jpg'),
(2, 'admin', 'Siapayaaa', '$2y$10$wTjmtf9tAzz.7yjmckOUq.gB38Yzr9dK9xTiP84p3rg9KKwunIAN2', '6287828817102', 'profil-admin.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lost`
--
ALTER TABLE `lost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lost`
--
ALTER TABLE `lost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
