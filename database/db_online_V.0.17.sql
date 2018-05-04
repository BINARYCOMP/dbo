-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 05, 2018 at 01:32 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;


--
-- Database: `db_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE IF NOT EXISTS `agama` (
  `AGAM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `AGAM_NAME` varchar(15) NOT NULL,
  PRIMARY KEY (`AGAM_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`AGAM_ID`, `AGAM_NAME`) VALUES
(1, 'ISLAM'),
(2, 'PROTESTAN'),
(3, 'KRISTEN'),
(4, 'HINDU'),
(5, 'BUDHA');

-- --------------------------------------------------------

--
-- Table structure for table `barang_child`
--

CREATE TABLE IF NOT EXISTS `barang_child` (
  `BACH_ID` int(11) NOT NULL AUTO_INCREMENT,
  `BACH_NAME` varchar(100) NOT NULL,
  `BACH_GUJA_TOTAL` int(11) NOT NULL,
  `BACH_GUTA_TOTAL` int(11) NOT NULL,
  `BACH_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `BACH_SATU_ID` int(11) NOT NULL,
  `BACH_BAPA_ID` int(11) NOT NULL,
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
  PRIMARY KEY (`BAPA_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `barang_parent`
--


-- --------------------------------------------------------

--
-- Table structure for table `gudang_bawang`
--

CREATE TABLE IF NOT EXISTS `gudang_bawang` (
  `GUBA_ID` int(11) NOT NULL,
  `GUBA_URAIAN` text NOT NULL,
  `GUBA_KELUAR` int(11) NOT NULL,
  `GUBA_MASUK` int(11) NOT NULL,
  `GUBA_SALDO` int(11) NOT NULL,
  `GUBA_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `GUBA_BAPA_ID` int(11) NOT NULL,
  `GUBA_BACH_ID` int(11) NOT NULL,
  `GUBA_KATE_ID` int(11) NOT NULL,
  `GUBA_RUAN_ID` int(11) NOT NULL,
  PRIMARY KEY (`GUBA_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gudang_bawang`
--


-- --------------------------------------------------------

--
-- Table structure for table `gudang_jadi`
--

CREATE TABLE IF NOT EXISTS `gudang_jadi` (
  `GUJA_ID` int(11) NOT NULL AUTO_INCREMENT,
  `GUJA_URAIAN` text NOT NULL,
  `GUJA_KELUAR` int(11) NOT NULL,
  `GUJA_MASUK` int(11) NOT NULL,
  `GUJA_SALDO` int(11) NOT NULL,
  `GUJA_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `GUJA_BAPA_ID` int(11) NOT NULL,
  `GUJA_BACH_ID` int(11) NOT NULL,
  `GUJA_KATE_ID` int(11) NOT NULL,
  `GUJA_RUAN_ID` int(11) NOT NULL,
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
  `GUTA_URAIAN` text NOT NULL,
  `GUTA_KELUAR` int(11) NOT NULL,
  `GUTA_MASUK` int(11) NOT NULL,
  `GUTA_SALDO` int(11) NOT NULL,
  `GUTA_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `GUTA_BAPA_ID` int(11) NOT NULL,
  `GUTA_BACH_ID` int(11) NOT NULL,
  `GUTA_KATE_ID` int(11) NOT NULL,
  PRIMARY KEY (`GUTA_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gudang_tak_jadi`
--


-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE IF NOT EXISTS `inventaris` (
  `INVE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `INVE_KEADAAN` varchar(25) NOT NULL,
  `INVE_KETERANGAN` text NOT NULL,
  `INVE_INPA_ID` int(11) NOT NULL,
  `INVE_INCH_ID` int(11) NOT NULL,
  `INVE_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`INVE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `inventaris`
--


-- --------------------------------------------------------

--
-- Table structure for table `inventaris_child`
--

CREATE TABLE IF NOT EXISTS `inventaris_child` (
  `INCH_ID` int(11) NOT NULL AUTO_INCREMENT,
  `INCH_NAME` varchar(75) NOT NULL,
  `INCH_QTY` int(11) NOT NULL,
  `INCH_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `INCH_INPA_ID` int(11) NOT NULL,
  PRIMARY KEY (`INCH_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `inventaris_child`
--


-- --------------------------------------------------------

--
-- Table structure for table `inventaris_parent`
--

CREATE TABLE IF NOT EXISTS `inventaris_parent` (
  `INPA_ID` int(11) NOT NULL AUTO_INCREMENT,
  `INPA_NAME` varchar(75) NOT NULL,
  `INPA_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`INPA_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `inventaris_parent`
--


-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `KATE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `KATE_NAME` varchar(50) NOT NULL,
  PRIMARY KEY (`KATE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`KATE_ID`, `KATE_NAME`) VALUES
(1, 'EX CHINA'),
(2, 'SGS'),
(3, 'PIPA'),
(4, 'AS');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE IF NOT EXISTS `keuangan` (
  `KEUA_ID` int(11) NOT NULL AUTO_INCREMENT,
  `KEUA_MASUK` int(11) NOT NULL,
  `KEUA_KELUAR` int(11) NOT NULL,
  `KEUA_SALDO` int(11) NOT NULL,
  `KEUA_RINCIAN` text NOT NULL,
  `KEUA_TANGGAL` date NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`LEVE_ID`, `LEVE_NAME`) VALUES
(2, 'KEUANGAN'),
(3, 'MANAGERIAL'),
(4, 'OWNER'),
(5, 'SUPER ADMIN'),
(6, 'SUPER ADMIN'),
(7, 'ADMIN BAWANG'),
(8, 'ADMIN CIMUNING');

-- --------------------------------------------------------

--
-- Table structure for table `material_bawang`
--

CREATE TABLE IF NOT EXISTS `material_bawang` (
  `MABA_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MABA_URAIAN` text NOT NULL,
  `MABA_KELUAR` int(11) NOT NULL,
  `MABA_MASUK` int(11) NOT NULL,
  `MABA_SALDO` int(11) NOT NULL,
  `MABA_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MABA_MPBA_ID` int(11) NOT NULL,
  `MABA_MCBA_ID` int(11) NOT NULL,
  PRIMARY KEY (`MABA_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `material_bawang`
--


-- --------------------------------------------------------

--
-- Table structure for table `material_child_bawang`
--

CREATE TABLE IF NOT EXISTS `material_child_bawang` (
  `MCBA_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MCBA_NAME` varchar(100) NOT NULL,
  `MCBA_MABA_TOTAL` int(11) NOT NULL,
  `MCBA_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MCBA_SATU_ID` int(11) NOT NULL,
  `MCBA_MPBA_ID` int(11) NOT NULL,
  PRIMARY KEY (`MCBA_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `material_child_bawang`
--


-- --------------------------------------------------------

--
-- Table structure for table `material_child_cimuning`
--

CREATE TABLE IF NOT EXISTS `material_child_cimuning` (
  `MCCI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MCCI_NAME` varchar(100) NOT NULL,
  `MCCI_MACI_TOTAL` int(11) NOT NULL,
  `MCCI_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MCCI_SATU_ID` int(11) NOT NULL,
  `MCCI_MPCI_ID` int(11) NOT NULL,
  PRIMARY KEY (`MCCI_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `material_child_cimuning`
--


-- --------------------------------------------------------

--
-- Table structure for table `material_cimuning`
--

CREATE TABLE IF NOT EXISTS `material_cimuning` (
  `MACI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MACI_URAIAN` text NOT NULL,
  `MACI_KELUAR` int(11) NOT NULL,
  `MACI_MASUK` int(11) NOT NULL,
  `MACI_SALDO` int(11) NOT NULL,
  `MACI_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MACI_MPCI_ID` int(11) NOT NULL,
  `MACI_MCCI_ID` int(11) NOT NULL,
  PRIMARY KEY (`MACI_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `material_cimuning`
--


-- --------------------------------------------------------

--
-- Table structure for table `material_parent_bawang`
--

CREATE TABLE IF NOT EXISTS `material_parent_bawang` (
  `MPBA_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MPBA_NAME` varchar(100) NOT NULL,
  `MPBA_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`MPBA_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `material_parent_bawang`
--


-- --------------------------------------------------------

--
-- Table structure for table `material_parent_cimuning`
--

CREATE TABLE IF NOT EXISTS `material_parent_cimuning` (
  `MPCI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MPCI_NAME` varchar(100) NOT NULL,
  `MPCI_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`MPCI_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `material_parent_cimuning`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`PEGA_ID`, `PEGA_NAME`, `PEGA_EMAIL`, `PEGA_ALAMAT`, `PEGA_NO_TLP`, `PEGA_JENKEL`, `PEGA_TIMESTAMP`, `PEGA_AGAM_ID`) VALUES
(0, 'SUDO', 'SUDO', 'SUDO', 12345, 'L', '2018-05-05 00:26:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE IF NOT EXISTS `ruangan` (
  `RUAN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `RUAN_NUMBER` int(11) NOT NULL,
  PRIMARY KEY (`RUAN_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`RUAN_ID`, `RUAN_NUMBER`) VALUES
(1, 2),
(2, 3),
(3, 7),
(4, 8),
(5, 3),
(6, 9);

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE IF NOT EXISTS `satuan` (
  `SATU_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SATU_NAME` varchar(10) NOT NULL,
  PRIMARY KEY (`SATU_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`SATU_ID`, `SATU_NAME`) VALUES
(1, 'SET'),
(2, 'BH'),
(3, 'BTG'),
(4, 'ROLL'),
(5, 'UNIT'),
(6, 'KG'),
(7, 'PCS'),
(8, 'KRG');

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
  `USER_DAPE_ID` int(11) NOT NULL,
  PRIMARY KEY (`USER_ID`),
  UNIQUE KEY `USER_NAME` (`USER_NAME`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `USER_NAME`, `USER_PASSWORD`, `USER_TIMESTAMP`, `USER_LEVE_ID`, `USER_DAPE_ID`) VALUES
(1, 'SUDO', '28a4437b86f15b3e4204252dd75327fe', '2018-04-18 09:18:03', 5, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
