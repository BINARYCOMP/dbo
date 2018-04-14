-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 15, 2018 at 12:03 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE IF NOT EXISTS `agama` (
  `AGAM_ID` int(11) NOT NULL,
  `AGAM_NAME` varchar(15) NOT NULL,
  PRIMARY KEY (`AGAM_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agama`
--


-- --------------------------------------------------------

--
-- Table structure for table `barang_child`
--

CREATE TABLE IF NOT EXISTS `barang_child` (
  `BACH_ID` int(11) NOT NULL AUTO_INCREMENT,
  `BACH_NAME` varchar(100) NOT NULL,
  `BACH_HARGA` int(11) NOT NULL,
  `BACH_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `BACH_SATU_ID` int(11) NOT NULL,
  PRIMARY KEY (`BACH_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `barang_child`
--


-- --------------------------------------------------------

--
-- Table structure for table `barang_parent`
--

CREATE TABLE IF NOT EXISTS `barang_parent` (
  `BAPA_ID` int(11) NOT NULL AUTO_INCREMENT,
  `BAPA_NAME` varchar(100) NOT NULL,
  `BAPA_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `BAPA_BACH_ID` int(11) NOT NULL,
  PRIMARY KEY (`BAPA_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `barang_parent`
--


-- --------------------------------------------------------

--
-- Table structure for table `gudang_jadi`
--

CREATE TABLE IF NOT EXISTS `gudang_jadi` (
  `GUJA_ID` int(11) NOT NULL AUTO_INCREMENT,
  `GUJA_KELUAR` int(11) NOT NULL,
  `GUJA_MASUK` int(11) NOT NULL,
  `GUJA_TOTAL` int(11) NOT NULL,
  `GUJA_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `GUJA_BAPA_ID` int(11) NOT NULL,
  `GUJA_BACH_ID` int(11) NOT NULL,
  PRIMARY KEY (`GUJA_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gudang_jadi`
--


-- --------------------------------------------------------

--
-- Table structure for table `gudang_tak_jadi`
--

CREATE TABLE IF NOT EXISTS `gudang_tak_jadi` (
  `GUTA_ID` int(11) NOT NULL AUTO_INCREMENT,
  `GUTA_KELUAR` int(11) NOT NULL,
  `GUTA_MASUK` int(11) NOT NULL,
  `GUTA_TOTAL` int(11) NOT NULL,
  `GUTA_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `GUTA_BAPA_ID` int(11) NOT NULL,
  `GUTA_BACH_ID` int(11) NOT NULL,
  PRIMARY KEY (`GUTA_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gudang_tak_jadi`
--


-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE IF NOT EXISTS `keuangan` (
  `KEUA_ID` int(11) NOT NULL AUTO_INCREMENT,
  `KEUA_MASUK` int(11) NOT NULL,
  `KEUA_KELUAR` int(11) NOT NULL,
  `KEUA_SALDO` int(11) NOT NULL,
  `KEUA_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`KEUA_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `keuangan`
--


-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
  `LEVE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LEVE_NAME` varchar(20) NOT NULL,
  PRIMARY KEY (`LEVE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `level`
--


-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `PEGA_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PEGA_NAME` varchar(80) NOT NULL,
  `PEGA_EMAIL` varchar(80) NOT NULL,
  `PEGA_ALAMAT` varchar(100) NOT NULL,
  `PEGA_NO_TLP` int(13) NOT NULL,
  `PEGA_JENKEL` varchar(1) NOT NULL,
  `PEGA_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `PEGA_AGAM_ID` int(11) NOT NULL,
  PRIMARY KEY (`PEGA_ID`),
  UNIQUE KEY `PEGA_EMAIL` (`PEGA_EMAIL`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pegawai`
--


-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE IF NOT EXISTS `satuan` (
  `SATU_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SATU_NAME` varchar(10) NOT NULL,
  PRIMARY KEY (`SATU_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `satuan`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `USER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_NAME` varchar(50) NOT NULL,
  `USER_PASSWORD` varchar(50) NOT NULL,
  `USER_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `USER_LEVE_ID` int(11) NOT NULL,
  `USER_PEGA_ID` int(11) NOT NULL,
  PRIMARY KEY (`USER_ID`),
  UNIQUE KEY `USER_NAME` (`USER_NAME`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
