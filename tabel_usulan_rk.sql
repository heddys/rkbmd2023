-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2021 at 11:12 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rkpbmd`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_usulan_rk`
--

CREATE TABLE `tabel_usulan_rk` (
  `id` int(11) NOT NULL,
  `kode_opd` varchar(20) NOT NULL,
  `id_komponen` int(20) NOT NULL,
  `keb_ideal` int(100) NOT NULL,
  `eksisting` int(100) NOT NULL,
  `keb_real` int(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_usulan_rk`
--

INSERT INTO `tabel_usulan_rk` (`id`, `kode_opd`, `id_komponen`, `keb_ideal`, `eksisting`, `keb_real`, `keterangan`) VALUES
(1, '0400', 1740, 10, 5, 5, '<ul><li>10 Unit untuk partai gerindra</li><li>10 Unit untuk partai PDI</li><li>5 Unit untuk partai PAN</li></ul>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_usulan_rk`
--
ALTER TABLE `tabel_usulan_rk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_usulan_rk`
--
ALTER TABLE `tabel_usulan_rk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
