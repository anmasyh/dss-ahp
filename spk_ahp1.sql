-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2023 at 08:40 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_ahp1`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id` int(11) NOT NULL,
  `no_kk` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id`, `no_kk`, `nama`, `alamat`) VALUES
(1, '3318161402910001', 'AHMAD SHODIKHUL                       ', 'BULUMANIS KIDUL RT 1 RW 3'),
(2, '3318167112570099', 'AMINAH                        ', 'BULUMANIS KIDUL RT 5 RW 3'),
(3, '3318165107830009', 'ANIS KOMARIYAH                                              ', 'BULUMANIS KIDUL RT 2 RW 4'),
(4, '3318165811800001', 'ANIS SUGIYANTI                                              ', 'BULUMNIS KIDUL RT 4 RW 4'),
(5, '3318167112520092', 'ANTIJAH                               ', 'BULUMANIS KIDUL RT 5 RW 4'),
(6, '3318164305850003', 'ARI KISWATI                                                 ', 'BULUMANIS KIDUL RT 2 RW 3'),
(7, '3318165708800015', 'BUDI AGUSTINA                 ', 'BULUMANIS KIDUL RT 4 RW 4'),
(8, '3318164107520277', 'CHOTIJAH                                                    ', 'BULUMANIS KIDUL RT 5 RW 2'),
(9, '3318166107770005', 'CHUMAIDAH                     ', 'BULUMANIS KIDUL RT 5 RW 1'),
(10, '3318163112520228', 'DARNAJI                               ', 'BULUMANIS KIDUL RT 1 RW 4');

-- --------------------------------------------------------

--
-- Table structure for table `ir`
--

CREATE TABLE `ir` (
  `jumlah` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ir`
--

INSERT INTO `ir` (`jumlah`, `nilai`) VALUES
(1, 0),
(2, 0),
(3, 0.58),
(4, 0.9),
(5, 1.12),
(6, 1.24),
(7, 1.32),
(8, 1.41),
(9, 1.45),
(10, 1.49),
(11, 1.51),
(12, 1.48),
(13, 1.56),
(14, 1.57),
(15, 1.59);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`) VALUES
(1, 'Penghasilan'),
(2, 'Luas Rumah'),
(3, 'Jenis Lantai'),
(4, 'Jenis Dinding'),
(5, 'Fasilitas BAB'),
(6, 'Tabungan');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_alt`
--

CREATE TABLE `nilai_alt` (
  `id` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai_alternatif` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_alt`
--

INSERT INTO `nilai_alt` (`id`, `id_alternatif`, `id_kriteria`, `nilai_alternatif`) VALUES
(1, 1, 1, 0.125539),
(2, 1, 2, 0.0456339),
(3, 1, 3, 0.0766989),
(4, 1, 4, 0.082531),
(5, 1, 5, 0.0671456),
(6, 1, 6, 0.0176001),
(7, 2, 1, 0.125539),
(8, 2, 2, 0.0456339),
(9, 2, 3, 0.0766989),
(10, 2, 4, 0.157787),
(11, 2, 5, 0.0671456),
(12, 2, 6, 0.0431891),
(13, 3, 1, 0.3266),
(14, 3, 2, 0.0456339),
(15, 3, 3, 0.0766989),
(16, 3, 4, 0.0215816),
(17, 3, 5, 0.0671456),
(18, 3, 6, 0.0176001),
(19, 4, 1, 0.125539),
(20, 4, 2, 0.0456339),
(21, 4, 3, 0.0766989),
(22, 4, 4, 0.157787),
(23, 4, 5, 0.16622),
(24, 4, 6, 0.0431891),
(25, 5, 1, 0.048021),
(26, 5, 2, 0.0456339),
(27, 5, 3, 0.0766989),
(28, 5, 4, 0.0215816),
(29, 5, 5, 0.0671456),
(30, 5, 6, 0.0431891),
(31, 6, 1, 0.048021),
(32, 6, 2, 0.0456339),
(33, 6, 3, 0.0766989),
(34, 6, 4, 0.157787),
(35, 6, 5, 0.0671456),
(36, 6, 6, 0.0431891),
(37, 7, 1, 0.3266),
(38, 7, 2, 0.110949),
(39, 7, 3, 0.133439),
(40, 7, 4, 0.157787),
(41, 7, 5, 0.16622),
(42, 7, 6, 0.0431891),
(43, 8, 1, 0.3266),
(44, 8, 2, 0.110949),
(45, 8, 3, 0.133439),
(46, 8, 4, 0.157787),
(47, 8, 5, 0.16622),
(48, 8, 6, 0.0431891),
(49, 9, 1, 0.3266),
(50, 9, 2, 0.110949),
(51, 9, 3, 0.133439),
(52, 9, 4, 0.157787),
(53, 9, 5, 0.0671456),
(54, 9, 6, 0.105005),
(55, 10, 1, 0.048021),
(56, 10, 2, 0.0456339),
(57, 10, 3, 0.0766989),
(58, 10, 4, 0.082531),
(59, 10, 5, 0.16622),
(60, 10, 6, 0.0431891);

-- --------------------------------------------------------

--
-- Table structure for table `perbandingan_alternatif`
--

CREATE TABLE `perbandingan_alternatif` (
  `id` int(11) NOT NULL,
  `alternatif1` int(11) NOT NULL,
  `alternatif2` int(11) NOT NULL,
  `pembanding` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perbandingan_alternatif`
--

INSERT INTO `perbandingan_alternatif` (`id`, `alternatif1`, `alternatif2`, `pembanding`, `nilai`) VALUES
(1, 1, 2, 1, 3),
(2, 1, 3, 1, 6),
(3, 2, 3, 1, 3),
(4, 1, 2, 2, 3),
(5, 1, 3, 2, 5),
(6, 2, 3, 2, 3),
(7, 1, 2, 3, 2),
(8, 1, 3, 3, 4),
(9, 2, 3, 3, 3),
(10, 1, 2, 4, 2),
(11, 1, 3, 4, 7),
(12, 2, 3, 4, 4),
(13, 1, 2, 5, 3),
(14, 1, 3, 5, 7),
(15, 2, 3, 5, 4),
(16, 1, 2, 6, 3),
(17, 1, 3, 6, 5),
(18, 2, 3, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `perbandingan_kriteria`
--

CREATE TABLE `perbandingan_kriteria` (
  `id` int(11) NOT NULL,
  `kriteria1` int(11) NOT NULL,
  `kriteria2` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perbandingan_kriteria`
--

INSERT INTO `perbandingan_kriteria` (`id`, `kriteria1`, `kriteria2`, `nilai`) VALUES
(1, 1, 2, 3),
(2, 1, 3, 3),
(3, 1, 4, 3),
(4, 1, 5, 3),
(5, 1, 6, 2),
(6, 2, 3, 0.5),
(7, 2, 4, 0.5),
(8, 2, 5, 0.5),
(9, 2, 6, 3),
(10, 3, 4, 2),
(11, 3, 5, 0.5),
(12, 3, 6, 0.5),
(13, 4, 5, 2),
(14, 4, 6, 2),
(15, 5, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pv_alternatif`
--

CREATE TABLE `pv_alternatif` (
  `id` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` float NOT NULL,
  `pv_subkriteria` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pv_alternatif`
--

INSERT INTO `pv_alternatif` (`id`, `id_alternatif`, `id_kriteria`, `nilai`, `pv_subkriteria`) VALUES
(1, 1, 1, 0.652991, 1),
(2, 2, 1, 0.250997, 0.38438),
(3, 3, 1, 0.0960114, 0.147033),
(4, 1, 2, 0.633346, 1),
(5, 2, 2, 0.260498, 0.411305),
(6, 3, 2, 0.106156, 0.167612),
(7, 1, 3, 0.557143, 1),
(8, 2, 3, 0.320238, 0.574786),
(9, 3, 3, 0.122619, 0.220085),
(10, 1, 4, 0.602471, 1),
(11, 2, 4, 0.315124, 0.523053),
(12, 3, 4, 0.0824043, 0.136777),
(13, 1, 5, 0.655545, 1),
(14, 2, 5, 0.264811, 0.403956),
(15, 3, 5, 0.0796437, 0.121492),
(16, 1, 6, 0.633346, 1),
(17, 2, 6, 0.260498, 0.411305),
(18, 3, 6, 0.106156, 0.167612);

-- --------------------------------------------------------

--
-- Table structure for table `pv_kriteria`
--

CREATE TABLE `pv_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pv_kriteria`
--

INSERT INTO `pv_kriteria` (`id_kriteria`, `nilai`) VALUES
(1, 0.3266),
(2, 0.110949),
(3, 0.133439),
(4, 0.157787),
(5, 0.16622),
(6, 0.105005);

-- --------------------------------------------------------

--
-- Table structure for table `ranking`
--

CREATE TABLE `ranking` (
  `id_alternatif` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ranking`
--

INSERT INTO `ranking` (`id_alternatif`, `nilai`) VALUES
(1, 0.415148),
(2, 0.515993),
(3, 0.55526),
(4, 0.615067),
(5, 0.30227),
(6, 0.438475),
(7, 0.938184),
(8, 0.938184),
(9, 0.900926),
(10, 0.462294);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id`, `nama`) VALUES
(1, 'Tinggi'),
(2, 'Cukup'),
(3, 'Rendah');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`) VALUES
(1, 'admin', 'admin', '$2y$10$zhJQWViMHEPT9Czdpt.dJuHibjgVlgBUsa86Qh1r4Fyuertd7.Mku'),
(2, 'admin1', 'admin1', '$2y$10$eA7xR.0kop7HjlvoQIg6luUM9h92b35n5eGwqn4dmhAGyQVxQCagm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ir`
--
ALTER TABLE `ir`
  ADD PRIMARY KEY (`jumlah`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_alt`
--
ALTER TABLE `nilai_alt`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_altkrt` (`id_alternatif`,`id_kriteria`);

--
-- Indexes for table `perbandingan_alternatif`
--
ALTER TABLE `perbandingan_alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perbandingan_kriteria`
--
ALTER TABLE `perbandingan_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pv_alternatif`
--
ALTER TABLE `pv_alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pv_kriteria`
--
ALTER TABLE `pv_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nilai_alt`
--
ALTER TABLE `nilai_alt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `perbandingan_alternatif`
--
ALTER TABLE `perbandingan_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `perbandingan_kriteria`
--
ALTER TABLE `perbandingan_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pv_alternatif`
--
ALTER TABLE `pv_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
