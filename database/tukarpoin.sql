-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20221031.25fe766a26
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2024 at 11:00 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tukarpoin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `nama`, `email`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `penukaran`
--

CREATE TABLE `penukaran` (
  `idpenukaran` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idproduk` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `waktupenukaran` datetime NOT NULL DEFAULT current_timestamp(),
  `nama` varchar(255) NOT NULL,
  `nohp` text NOT NULL,
  `email` text NOT NULL,
  `alamat` text NOT NULL,
  `jenishadiah` text NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penukaran`
--

INSERT INTO `penukaran` (`idpenukaran`, `iduser`, `idproduk`, `status`, `waktupenukaran`, `nama`, `nohp`, `email`, `alamat`, `jenishadiah`, `waktu`) VALUES
(15, 4, 1, 'Penukaran Poin Sedang Di Proses', '2024-12-12 16:58:00', 'Fahrul Adib', '082282076702', 'fahruladib9@gmail.com', 'Banyuasin', '', '2024-12-12 16:58:00');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `idpesan` int(11) NOT NULL,
  `nama` text NOT NULL,
  `email` text NOT NULL,
  `nohp` text NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`idpesan`, `nama`, `email`, `nohp`, `pesan`) VALUES
(1, 'Sugeng Pratama', 'sugeng@gmail.com', '0831837129', 'sdadsadsad'),
(2, 'Sugeng Pratama', 'sugeng@gmail.com', '0831837129', 'mantap');

-- --------------------------------------------------------

--
-- Table structure for table `produktukar`
--

CREATE TABLE `produktukar` (
  `idproduktukar` int(11) NOT NULL,
  `namaproduk` text NOT NULL,
  `produkpoin` text NOT NULL,
  `fotoproduk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produktukar`
--

INSERT INTO `produktukar` (`idproduktukar`, `namaproduk`, `produkpoin`, `fotoproduk`) VALUES
(1, 'Saldo E-Wallet Rp10,000', '1000', 'caa892c68ead6615314eb9742a9e52bb 1.png'),
(2, 'Voucher Pulsa Rp25,000', '2500', 'caa892c68ead6615314eb9742a9e52bb 1.png'),
(3, 'Botol Minum Stainless (500 ml)', '2000', 'caa892c68ead6615314eb9742a9e52bb 1.png'),
(4, 'Sedotan Stainless Steel', '1000', 'caa892c68ead6615314eb9742a9e52bb 1.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `poin` varchar(250) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `nohp`, `alamat`, `poin`) VALUES
(1, 'Sugeng Setiawan', 'sugeng@gmail.com', 'sugeng', '085982159125', '<p>Jl. Palembang</p>\r\n', '1000'),
(4, 'Fahrul Adib', 'fahruladib9@gmail.com', '123', '082282076702', '<p>Banyuasin</p>\r\n', '4000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `penukaran`
--
ALTER TABLE `penukaran`
  ADD PRIMARY KEY (`idpenukaran`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`idpesan`);

--
-- Indexes for table `produktukar`
--
ALTER TABLE `produktukar`
  ADD PRIMARY KEY (`idproduktukar`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penukaran`
--
ALTER TABLE `penukaran`
  MODIFY `idpenukaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `idpesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produktukar`
--
ALTER TABLE `produktukar`
  MODIFY `idproduktukar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
