-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 23, 2020 at 11:47 PM
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
(7, 'Ade titit totot', 'ade', '$2y$10$RjmlSC1WKq6TBu75BliZlu/8FaWo7hRmFYqSjeoWIQay5Rt7WPGia', 'ade/pp.jpg', 2, 1, 1583236211),
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
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_user_daftar`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_daftar`
--

INSERT INTO `user_daftar` (`id_user_daftar`, `id_user`, `telp`, `email`, `foto_bukti_transfer`, `status`) VALUES
(7, 7, '089695615257', 'ade@gmail.com', 'ade/anime2.jpg', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
