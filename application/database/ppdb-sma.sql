-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 31, 2020 at 02:48 AM
-- Server version: 5.7.26
-- PHP Version: 7.1.29

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
  PRIMARY KEY (`id_data_berkas`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_berkas`
--

INSERT INTO `data_berkas` (`id_data_berkas`, `id_user`, `nilai_indo`, `nilai_ing`, `matematika`, `ipa`, `foto_ijasah_smp`, `foto_shun`) VALUES
(1, 7, '90', '90', '90', '90', 'ade/e.png', 'ade/userinterface.jpg'),
(4, 8, '90', '90', '90', '67', 'yuliant/asasin.jpg', 'yuliant/anime2.jpg');

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
  PRIMARY KEY (`id_data_diri_pribadi`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_diri_pribadi`
--

INSERT INTO `data_diri_pribadi` (`id_data_diri_pribadi`, `id_user`, `username`, `nama`, `tempat_lahir`, `tanggal_lahir`, `agama`, `kelamin`, `alamat`, `telp`) VALUES
(1, 7, 'ade', 'ADE TITIT', 'JOMBANG', '2020-03-01', 'BUDDHA', 'P', 'KENDAL PECABEAN RT 03 RW 01 CANDI JOMBANG', '089695615257'),
(11, 8, 'yuliant', 'MASRIZAL EKA YULIANTO', 'PROBOLINGGO', '2020-03-30', 'KHONGHUCU', 'L', 'DS KENDAL', '089677566444');

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
  PRIMARY KEY (`id_data_diri_sekolah`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_diri_sekolah`
--

INSERT INTO `data_diri_sekolah` (`id_data_diri_sekolah`, `id_user`, `asal_sekolah`, `nisn`, `tahun_lulus`, `no_ijasah`) VALUES
(1, 7, 'SMPN 2 KAROBELAH', '1234567810', 2018, '1234567810'),
(6, 8, 'SMP 2', '1234567890', 2019, '1234567890');

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
  PRIMARY KEY (`id_data_ortu`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_ortu`
--

INSERT INTO `data_ortu` (`id_data_ortu`, `id_user`, `nama_ortu`, `pekerjaan`, `alamat_ortu`, `telp_ortu`) VALUES
(4, 8, 'SUPAJI', 'MANDOR', 'DS KENDAL', '089695644344'),
(1, 7, 'JI', 'MANAGER', 'KENDAL PECABEAN RT 03 RW 01 CANDI', '089695615250');

-- --------------------------------------------------------

--
-- Table structure for table `data_qrcode`
--

DROP TABLE IF EXISTS `data_qrcode`;
CREATE TABLE IF NOT EXISTS `data_qrcode` (
  `id_data_qrcode` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `token` varchar(128) NOT NULL,
  PRIMARY KEY (`id_data_qrcode`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_qrcode`
--

INSERT INTO `data_qrcode` (`id_data_qrcode`, `id_user`, `token`) VALUES
(1, 7, 'pJnDFDiBLt'),
(11, 8, 'CHzQ4yI7lS');

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
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nama`, `username`, `password`, `image`, `level`, `is_active`, `date_created`) VALUES
(10, 'admin', 'admin', '$2y$10$Q6WhX7NjGHD6Kt0kfb/GxOcNcoWMID8QyvxqYwuwMF7MIUoWhiqNy', 'admin/71505673_p0.jpg', 1, 1, 1583237912),
(7, 'Ade titit', 'ade', '$2y$10$RjmlSC1WKq6TBu75BliZlu/8FaWo7hRmFYqSjeoWIQay5Rt7WPGia', 'ade/ade.jpg', 2, 1, 1583236211),
(8, 'MASRIZAL EKA YULIANTO', 'yuliant', '$2y$10$BsyIjWHcJL5tp/ZXY5f.L.C1OovzLVAxOM8urxigATxKAiI4k80k.', 'yuliant/ruler_chan.jpg', 2, 1, 1583236559);

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
  PRIMARY KEY (`id_user_daftar`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_daftar`
--

INSERT INTO `user_daftar` (`id_user_daftar`, `id_user`, `telp`, `email`, `foto_bukti_transfer`, `status`) VALUES
(1, 7, '089695615257', 'masrizal04@gmail.com', 'ade/anime2.jpg', 1),
(12, 8, '089677566444', 'masrizal04@gmail.com', 'yuliant/TATA_CARA_RECYCLERVIEW.png', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
