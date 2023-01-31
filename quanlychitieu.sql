-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 31, 2023 at 09:28 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlychitieu`
--

-- --------------------------------------------------------

--
-- Table structure for table `cackhoangchi`
--

DROP TABLE IF EXISTS `cackhoangchi`;
CREATE TABLE IF NOT EXISTS `cackhoangchi` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDDiaDiem` int(11) NOT NULL,
  `TenKhoangChi` varchar(4000) COLLATE utf8_unicode_ci NOT NULL,
  `TongTien` decimal(10,0) NOT NULL,
  `NgayTao` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diadiemdulich`
--

DROP TABLE IF EXISTS `diadiemdulich`;
CREATE TABLE IF NOT EXISTS `diadiemdulich` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TenDiaDiem` varchar(4000) COLLATE utf8_unicode_ci NOT NULL,
  `TongTien` decimal(10,0) NOT NULL,
  `NgayTao` date NOT NULL,
  `GhiChu` varchar(4000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nguoithamgia`
--

DROP TABLE IF EXISTS `nguoithamgia`;
CREATE TABLE IF NOT EXISTS `nguoithamgia` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDCacKhoangChi` int(11) NOT NULL,
  `IDNguoiThamGia` int(11) NOT NULL,
  `SoTien` decimal(10,0) NOT NULL,
  `NgayTao` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `HoTen` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `GioiTinh` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `HoTen`, `NgaySinh`, `GioiTinh`) VALUES
(1, 'Võ Thanh Bình', '2000-07-17', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
