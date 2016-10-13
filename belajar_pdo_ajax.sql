-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2016 at 01:54 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belajar_mysqli_oop`
--

-- --------------------------------------------------------

--
-- Table structure for table `pondok`
--

CREATE TABLE `pondok` (
  `idpondok` int(11) NOT NULL,
  `nama_pondok` varchar(145) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pondok`
--

INSERT INTO `pondok` (`idpondok`, `nama_pondok`) VALUES
(1, 'al-qodir'),
(2, 'al-maksum');

-- --------------------------------------------------------

--
-- Table structure for table `santri`
--

CREATE TABLE `santri` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pondok_idpondok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `santri`
--

INSERT INTO `santri` (`id`, `nama`, `alamat`, `pondok_idpondok`) VALUES
(140, 'jokoooooooo', 'aaaaaaaa', 1),
(144, 'joko', '<h1>lala</h1>', 1),
(145, 'joko', 'lala', 1),
(146, 'joko', 'lala', 1),
(147, 'joko', 'jombang', 2),
(148, 'joko', 'lala', 1),
(149, 'joko', 'lala', 1),
(150, '111111', 'jom', 1),
(151, 'bfcf vjhvj5465465465444568', 'localhostmkhb', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pondok`
--
ALTER TABLE `pondok`
  ADD PRIMARY KEY (`idpondok`);

--
-- Indexes for table `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_santri_pondok_idx` (`pondok_idpondok`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pondok`
--
ALTER TABLE `pondok`
  MODIFY `idpondok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `santri`
--
ALTER TABLE `santri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `santri`
--
ALTER TABLE `santri`
  ADD CONSTRAINT `fk_santri_pondok` FOREIGN KEY (`pondok_idpondok`) REFERENCES `pondok` (`idpondok`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
