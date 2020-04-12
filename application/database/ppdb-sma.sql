-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 12, 2020 at 10:36 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_berkas`
--

INSERT INTO `data_berkas` (`id_data_berkas`, `id_user`, `nilai_indo`, `nilai_ing`, `matematika`, `ipa`, `foto_ijasah_smp`, `foto_shun`, `berkas_created`) VALUES
(5, 17, '91', '89', '77', '88', 'adetitit/userinput.jpg', 'adetitit/userinterface.jpg', '2020-04-02 19:38:08'),
(6, 18, '100', '100', '100', '100', 'yuliant/userinput.jpg', 'yuliant/userinterface.jpg', '2020-04-03 06:39:06');

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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_diri_pribadi`
--

INSERT INTO `data_diri_pribadi` (`id_data_diri_pribadi`, `id_user`, `username`, `nama`, `tempat_lahir`, `tanggal_lahir`, `agama`, `kelamin`, `alamat`, `telp`) VALUES
(12, 17, 'adetitit', 'ADE SETYA', 'SIDOARJO', '2020-03-17', 'ISLAM', 'L', 'DESA KENDAL PECABEAN RT 03 RW 01 CANDI', '089695615257'),
(13, 18, 'yuliant', 'MASRIZAL EKA YULIANTO', 'SURABAYA', '1997-04-07', 'ISLAM', 'L', 'CABEAN', '089695615222');

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_diri_sekolah`
--

INSERT INTO `data_diri_sekolah` (`id_data_diri_sekolah`, `id_user`, `asal_sekolah`, `nisn`, `tahun_lulus`, `no_ijasah`) VALUES
(7, 17, 'SMPN 2 CANDI', '1234567890', 2016, '1234567890'),
(8, 18, 'SMPN 2 CANDI', '1234567089', 2013, '1234567089');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_ortu`
--

INSERT INTO `data_ortu` (`id_data_ortu`, `id_user`, `nama_ortu`, `pekerjaan`, `alamat_ortu`, `telp_ortu`) VALUES
(5, 17, 'SUPAJI', 'MANDOR', 'KENDAL', '089695615253'),
(6, 18, 'SUPAJI', 'MANDOR', 'CABEAN', '089677544123');

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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_qrcode`
--

INSERT INTO `data_qrcode` (`id_data_qrcode`, `id_user`, `token`) VALUES
(12, 17, '44EtLtfnJ0'),
(13, 18, 'BYj8WajeCy');

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
  `level` int(1) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nama`, `username`, `password`, `image`, `level`, `is_active`, `date_created`) VALUES
(10, 'admin', 'admin', '$2y$10$Q6WhX7NjGHD6Kt0kfb/GxOcNcoWMID8QyvxqYwuwMF7MIUoWhiqNy', 'admin/71505673_p0.jpg', 1, 1, '2020-04-02 18:33:34'),
(17, 'Ade setya', 'adetitit', '$2y$10$5XwmHV3vwPPyTsmpehaYr./xZJDjA8KLJVupoZ6wc3xbO90/aiPEO', 'adetitit/pp.jpg', 2, 1, '2020-04-02 19:13:54'),
(18, 'Masrizal Eka Yulianto', 'yuliant', '$2y$10$j92b54y.mXlsgi6U8mH1DebqhqfiAf1.ObQlpahWOaaIZYxZ5WNmu', 'yuliant/dragon_chan.jpg', 2, 1, '2020-04-03 06:34:31');

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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_daftar`
--

INSERT INTO `user_daftar` (`id_user_daftar`, `id_user`, `telp`, `email`, `foto_bukti_transfer`, `status`, `daftar_created`) VALUES
(13, 17, '089695615257', 'masrizal04@gmail.com', 'adetitit/androidparty.jpg', 2, '2020-04-02 19:28:49'),
(14, 18, '089695615222', 'masrizalsn@gmail.com', 'yuliant/here_account.png', 1, '2020-04-03 06:36:47');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
