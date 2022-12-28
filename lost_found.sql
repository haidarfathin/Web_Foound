-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2022 at 07:01 PM
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
(1, 'haidara', 'tws hitam', 'warnanya hitam, trus bentuknya bulet gitu, apa itu bla blabla gituu pokoknya plzzz yang nemuu ', 'disekitar dimana polines', '2022-11-16 00:00:00', 'gambar.jpg', '', '', '', '', 0),
(2, 'admin', 'pacar', 'DIMANAAA PACAR GUAA', 'hati', '2022-11-02 00:00:00', 'gambar.jpg', 'Saiful jamil', 'pengajar', '', 'pemilik-20221228-230611.jpg', 1),
(3, 'admin', 'semangatttt', 'aduandonfkjdnkfnkdnkjsmkndkmlkdmlkmlkasmkldmlkmdasklmdlasdas', 'Semarang', '2022-02-08 00:00:00', 'gambar.jpg', '', '', '', '', 0),
(4, 'haidara', 'megawatiasdadas', 'asdasdas', 'asdasa', '2022-12-21 20:05:00', 'gambar.jpg', '', '', '', '', 0),
(19, 'haidara', 'cucumilo', 'cakep banget', 'markas pdip', '2022-12-29 20:19:00', 'gambar.jpg', '', '', '', '', 0),
(20, 'haidara', 'cacargh', 'cakeppp bwuwetweewmr', 'tiktok', '2022-02-16 15:27:00', 'gambar.jpg', '', '', '', '', 0),
(21, 'haidara', 'cucucucuc', 'bjhjdfaddfadf', 'dfdfdfd', '2022-12-13 22:52:00', 'gambar.jpg', '', '', '', '', 0),
(22, 'haidara', 'siapayaaaa', 'asadasdasdsadsd', 'sdadasdasd', '2022-12-16 21:55:00', '5818c931b3519e3d2b13955205538cb8.jpg', '', '', '', '', 0),
(23, 'haidara', 'pppantek', 'sdmaksdmaksd', 'sdmasdmakmdskm', '2022-12-22 23:58:00', '5818c931b3519e3d2b13955205538cb8.jpg', '', '', '', '', 0),
(24, 'haidara', 'asdasdas', 'dfasdas', 'asdfasdas', '2022-12-30 04:03:00', 'IMG_20220904_101947.jpg', '', '', '', '', 0),
(25, '', 'ultramen', 'apaaantohhh', 'jepang', '2022-12-17 19:19:00', 'gambar.jpg', '', '', '', '', 0),
(26, 'admin', 'podkesmas', 'asdasdad', 'dfdfdfd', '2022-12-23 21:36:00', '238f05d48e6eecd8dd89c7761f001bf7.jpg', '', '', '', '', 0),
(27, 'admin', 'tws pink', 'asdasda', 'kamar', '2022-12-29 17:41:00', 'IMG_20221219_092527.jpg', '', '', '', '', 0),
(28, 'admin', 'tes', 'tessfdsfsd', 'hati', '2022-12-21 18:05:00', 'hilang-20221228120016pmjpg', '', '', '', '', 0),
(29, 'admin', 'adasasd', 'sdadsa', 'asdadas', '2023-01-04 18:08:00', 'hilang-20221228-120310.jpg', '', '', '', '', 0),
(30, 'admin', 'asdadsdadsda', 'sadsada', 'adasda', '2022-12-28 18:09:00', 'hilang-20221228-060548.jpg', '', '', '', '', 0),
(31, 'admin', 'sadasa', 'asdasda', 'sdasda', '2022-12-23 22:06:00', 'hilang-20221228-180654.jpg', 'Ahmad sarifudin', 'mahasiswa', 'IK2A', 'pemilik-20221228-200052.JPG', 1),
(32, 'admin', 'dada', 'asdasd', 'asdada', '2022-12-23 22:07:00', 'hilang-20221228-180745.jpg', 'semangat', 'mahasiswa', 'IK2C', 'pemilik-20221228-183015.jpeg', 1),
(33, 'admin', 'flashdisk', 'flashdisk apaanin gua gatyau ', 'kamar', '2022-12-28 21:39:00', 'hilang-20221228-213937.jpg', '', '', '', '', 0);

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
(1, 'haidara', 'Muhammad Haidar alfathin', '$2y$10$wTjmtf9tAzz.7yjmckOUq.gB38Yzr9dK9xTiP84p3rg9KKwunIAN2', '', ''),
(2, 'admin', 'Affantuh Bin Nance', '$2y$10$wTjmtf9tAzz.7yjmckOUq.gB38Yzr9dK9xTiP84p3rg9KKwunIAN2', '6282142685510', 'profil-admin.jpg'),
(5, 'isma', '', '$2y$10$wTjmtf9tAzz.7yjmckOUq.gB38Yzr9dK9xTiP84p3rg9KKwunIAN2', '082142685510', ''),
(6, 'akrom', '', '$2y$10$wTjmtf9tAzz.7yjmckOUq.gB38Yzr9dK9xTiP84p3rg9KKwunIAN2', '087828817102', ''),
(7, 'ahmad', '', '$2y$10$wTjmtf9tAzz.7yjmckOUq.gB38Yzr9dK9xTiP84p3rg9KKwunIAN2', '085156728787', ''),
(8, 'bin', '', '$2y$10$wTjmtf9tAzz.7yjmckOUq.gB38Yzr9dK9xTiP84p3rg9KKwunIAN2', '6285156728787', ''),
(9, 'ibin', '', '$2y$10$wTjmtf9tAzz.7yjmckOUq.gB38Yzr9dK9xTiP84p3rg9KKwunIAN2', '628967394796262', ''),
(10, 'siapa', '', '$2y$10$wTjmtf9tAzz.7yjmckOUq.gB38Yzr9dK9xTiP84p3rg9KKwunIAN2', '', ''),
(11, 'ahihi', '', '$2y$10$wTjmtf9tAzz.7yjmckOUq.gB38Yzr9dK9xTiP84p3rg9KKwunIAN2', '6285156728787', ''),
(12, 'haha', '', '$2y$10$wTjmtf9tAzz.7yjmckOUq.gB38Yzr9dK9xTiP84p3rg9KKwunIAN2', '6289673947900', ''),
(13, 'new', '', '$2y$10$yv3BZWVDMBh0s3CVgQRMRuGSuAxmR/ddQTRzOgjY.arWLdeOgBCIy', '6285156728787', ''),
(14, 'asdasda', '', '$2y$10$wTjmtf9tAzz.7yjmckOUq.gB38Yzr9dK9xTiP84p3rg9KKwunIAN2', '6285156728787', ''),
(15, 'asdasd', '', '$2y$10$ZqlDdrs8kbLy8r589RhFnOyEI6b2dnxZjSwYkxPdEmOpaSmk6CNWG', '6285156728787', ''),
(16, 'fathin', '', '$2y$10$OuztWO.5Sedht2iUARnHJuG/f5If6s5Oqp8okMDliQ75zASlZ82PO', '6285156728787', ''),
(17, 'affaskaj', 'Siapaaa Itu', '$2y$10$jR03DwLA246RpN1kTlFrvOgDISBJL7ZBxp11qCPBk/hCAXivK8g0q', '6285156728787', 'profil-affaskaj.jpg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
