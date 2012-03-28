-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 12, 2012 at 08:03 
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `latihan`
--

CREATE TABLE IF NOT EXISTS `latihan` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `isi` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `latihan`
--

INSERT INTO `latihan` (`id`, `isi`) VALUES
(1, 'contoh latihan pertama'),
(2, 'contoh latihan kedua');

-- --------------------------------------------------------

--
-- Table structure for table `latihan2`
--

CREATE TABLE IF NOT EXISTS `latihan2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `konten` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `latihan2`
--

INSERT INTO `latihan2` (`id`, `judul`, `penulis`, `konten`) VALUES
(1, 'judul baru diupdate tiga kali!', 'Komang 1', 'konten baru diupdate tiga kali'),
(2, 'Judul 2', 'Komang 2', 'Konten Judul 2'),
(3, 'Judul 3', 'Komang 3', 'Konten Judul 3'),
(4, 'Judul 4', 'Komang 4', 'Konten Judul 4'),
(6, 'Judul baru ', '', 'Konten Baru'),
(7, 'aneh', '', 'nyata');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
