-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 25, 2020 at 03:52 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb-sma`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_berkas`
--

DROP TABLE IF EXISTS `data_berkas`;
CREATE TABLE IF NOT EXISTS `data_berkas` (
  `id_data_berkas` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nilai_indo` varchar(3) NOT NULL,
  `nilai_ing` varchar(3) NOT NULL,
  `matematika` varchar(3) NOT NULL,
  `ipa` varchar(3) NOT NULL,
  `foto_ijasah_smp` varchar(255) NOT NULL,
  `foto_shun` varchar(255) NOT NULL,
  `berkas_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id_data_berkas`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_berkas`
--

INSERT INTO `data_berkas` (`id_data_berkas`, `id_user`, `nilai_indo`, `nilai_ing`, `matematika`, `ipa`, `foto_ijasah_smp`, `foto_shun`, `berkas_created`) VALUES
(8, 24, '100', '100', '100', '100', 'yuliant/userinput.jpg', 'yuliant/userinterface.jpg', '2020-04-25 10:18:06'),
(7, 23, '100', '100', '100', '100', 'adetitit/userinput.jpg', 'adetitit/userinterface.jpg', '2020-04-25 05:57:47');

-- --------------------------------------------------------

--
-- Table structure for table `data_diri_pribadi`
--

DROP TABLE IF EXISTS `data_diri_pribadi`;
CREATE TABLE IF NOT EXISTS `data_diri_pribadi` (
  `id_data_diri_pribadi` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `username` varchar(12) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `kelamin` char(1) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(16) NOT NULL,
  PRIMARY KEY (`id_data_diri_pribadi`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_diri_pribadi`
--

INSERT INTO `data_diri_pribadi` (`id_data_diri_pribadi`, `id_user`, `username`, `nama`, `tempat_lahir`, `tanggal_lahir`, `agama`, `kelamin`, `alamat`, `telp`) VALUES
(15, 24, 'yuliant', 'MASRIZAL EKA YULIANTO', 'SIDOARJO', '2020-04-17', 'ISLAM', 'L', 'KENDAL PECABEAN', '089695615256'),
(14, 23, 'adetitit', 'ADE SETYA', 'SIDOARJO', '2020-04-25', 'KATOLIK', 'L', 'KENDAL PECABEAN', '089695615251');

-- --------------------------------------------------------

--
-- Table structure for table `data_diri_sekolah`
--

DROP TABLE IF EXISTS `data_diri_sekolah`;
CREATE TABLE IF NOT EXISTS `data_diri_sekolah` (
  `id_data_diri_sekolah` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `asal_sekolah` varchar(40) NOT NULL,
  `nisn` varchar(14) NOT NULL,
  `tahun_lulus` year(4) NOT NULL,
  `no_ijasah` varchar(10) NOT NULL,
  PRIMARY KEY (`id_data_diri_sekolah`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_diri_sekolah`
--

INSERT INTO `data_diri_sekolah` (`id_data_diri_sekolah`, `id_user`, `asal_sekolah`, `nisn`, `tahun_lulus`, `no_ijasah`) VALUES
(10, 24, 'SMP 2 CANDI', '1234567890', 2016, '1234567891'),
(9, 23, 'SMP 2 CANDI', '1234567890', 2019, '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `data_ortu`
--

DROP TABLE IF EXISTS `data_ortu`;
CREATE TABLE IF NOT EXISTS `data_ortu` (
  `id_data_ortu` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nama_ortu` varchar(40) NOT NULL,
  `pekerjaan` varchar(25) NOT NULL,
  `alamat_ortu` text NOT NULL,
  `telp_ortu` varchar(16) NOT NULL,
  PRIMARY KEY (`id_data_ortu`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_ortu`
--

INSERT INTO `data_ortu` (`id_data_ortu`, `id_user`, `nama_ortu`, `pekerjaan`, `alamat_ortu`, `telp_ortu`) VALUES
(8, 24, 'SUPAJI', 'MANDOR LAPANGAN', 'KENDAL PECABEAN', '089611611611'),
(7, 23, 'SUPAJI', 'MANDOR', 'KENDAL PECABEAN', '088778889781');

-- --------------------------------------------------------

--
-- Table structure for table `data_qrcode`
--

DROP TABLE IF EXISTS `data_qrcode`;
CREATE TABLE IF NOT EXISTS `data_qrcode` (
  `id_data_qrcode` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `token` varchar(128) NOT NULL,
  PRIMARY KEY (`id_data_qrcode`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_qrcode`
--

INSERT INTO `data_qrcode` (`id_data_qrcode`, `id_user`, `token`) VALUES
(15, 24, '9sZ0Be68FT'),
(14, 23, 'Tcwg5aMzjG');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(40) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(128) NOT NULL,
  `level` int(1) NOT NULL COMMENT '1: admin, 2: user',
  `is_active` int(1) NOT NULL COMMENT '0: nonaktif, 1: aktif',
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nama`, `username`, `password`, `image`, `level`, `is_active`, `date_created`) VALUES
(10, 'neko', 'admin', '$2y$10$Q6WhX7NjGHD6Kt0kfb/GxOcNcoWMID8QyvxqYwuwMF7MIUoWhiqNy', 'admin/neko_cibi.jpg', 1, 1, '2020-04-02 18:33:34'),
(23, 'Ade setya', 'adetitit', '$2y$10$LGJYTTcRNJeLiWUdAUxtKOMZ9uQkSa6pZALrnMnA7lP81SoOu4i4m', 'adetitit/pp.jpg', 2, 1, '2020-04-25 05:34:36'),
(24, 'Masrizal Eka Yulianto', 'yuliant', '$2y$10$Uwl29dhPJBfsrZGOXoy8F.7W.a5dTB8ExYNLdbJbkmM5ny3bTu2w2', 'yuliant/shipit.png', 2, 1, '2020-04-25 05:59:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_daftar`
--

DROP TABLE IF EXISTS `user_daftar`;
CREATE TABLE IF NOT EXISTS `user_daftar` (
  `id_user_daftar` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `telp` varchar(16) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `foto_bukti_transfer` varchar(255) NOT NULL,
  `status` int(1) NOT NULL COMMENT '1: dikonfirmasi, 2: ditolak',
  `daftar_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id_user_daftar`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_daftar`
--

INSERT INTO `user_daftar` (`id_user_daftar`, `id_user`, `telp`, `email`, `foto_bukti_transfer`, `status`, `daftar_created`) VALUES
(16, 24, '089695615256', 'masrizal04@gmail.com', 'yuliant/masrizal.jpg', 1, '2020-04-25 08:14:33'),
(15, 23, '089695615251', 'adesetya123@gmail.com', 'adetitit/e.png', 1, '2020-04-25 05:39:37');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
