-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2018 at 06:33 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


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

CREATE TABLE `agama` (
  `AGAM_ID` int(11) NOT NULL,
  `AGAM_NAME` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `barang_child` (
  `BACH_ID` int(11) NOT NULL,
  `BACH_NAME` varchar(100) NOT NULL,
  `BACH_GUJA_TOTAL` int(11) NOT NULL,
  `BACH_GUTA_TOTAL` int(11) NOT NULL,
  `BACH_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `BACH_SATU_ID` int(11) NOT NULL,
  `BACH_BAPA_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `barang_parent`
--

CREATE TABLE `barang_parent` (
  `BAPA_ID` int(11) NOT NULL,
  `BAPA_NAME` varchar(100) NOT NULL,
  `BAPA_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gudang_bawang`
--

CREATE TABLE `gudang_bawang` (
  `GUBA_ID` int(11) NOT NULL,
  `GUBA_URAIAN` text NOT NULL,
  `GUBA_KELUAR` int(11) NOT NULL,
  `GUBA_MASUK` int(11) NOT NULL,
  `GUBA_SALDO` int(11) NOT NULL,
  `GUBA_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `GUBA_BAPA_ID` int(11) NOT NULL,
  `GUBA_BACH_ID` int(11) NOT NULL,
  `GUBA_KATE_ID` int(11) NOT NULL,
  `GUBA_RUAN_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gudang_jadi`
--

CREATE TABLE `gudang_jadi` (
  `GUJA_ID` int(11) NOT NULL,
  `GUJA_URAIAN` text NOT NULL,
  `GUJA_KELUAR` int(11) NOT NULL,
  `GUJA_MASUK` int(11) NOT NULL,
  `GUJA_SALDO` int(11) NOT NULL,
  `GUJA_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `GUJA_BAPA_ID` int(11) NOT NULL,
  `GUJA_BACH_ID` int(11) NOT NULL,
  `GUJA_KATE_ID` int(11) NOT NULL,
  `GUJA_RUAN_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gudang_tak_jadi`
--

CREATE TABLE `gudang_tak_jadi` (
  `GUTA_ID` int(11) NOT NULL,
  `GUTA_URAIAN` text NOT NULL,
  `GUTA_KELUAR` int(11) NOT NULL,
  `GUTA_MASUK` int(11) NOT NULL,
  `GUTA_SALDO` int(11) NOT NULL,
  `GUTA_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `GUTA_BAPA_ID` int(11) NOT NULL,
  `GUTA_BACH_ID` int(11) NOT NULL,
  `GUTA_KATE_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `INVE_ID` int(11) NOT NULL,
  `INVE_KEADAAN` varchar(25) NOT NULL,
  `INVE_KETERANGAN` text NOT NULL,
  `INVE_INPA_ID` int(11) NOT NULL,
  `INVE_INCH_ID` int(11) NOT NULL,
  `INVE_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_child`
--

CREATE TABLE `inventaris_child` (
  `INCH_ID` int(11) NOT NULL,
  `INCH_NAME` varchar(75) NOT NULL,
  `INCH_QTY` int(11) NOT NULL,
  `INCH_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `INCH_INPA_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_parent`
--

CREATE TABLE `inventaris_parent` (
  `INPA_ID` int(11) NOT NULL,
  `INPA_NAME` varchar(75) NOT NULL,
  `INPA_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `KATE_ID` int(11) NOT NULL,
  `KATE_NAME` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`KATE_ID`, `KATE_NAME`) VALUES
(1, 'EX CHINA'),
(2, 'SGS'),
(3, 'PIPA');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `KEUA_ID` int(11) NOT NULL,
  `KEUA_MASUK` int(11) NOT NULL,
  `KEUA_KELUAR` int(11) NOT NULL,
  `KEUA_SALDO` int(11) NOT NULL,
  `KEUA_RINCIAN` text NOT NULL,
  `KEUA_TANGGAL` date NOT NULL,
  `KEUA_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `LEVE_ID` int(11) NOT NULL,
  `LEVE_NAME` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `material_bawang` (
  `MABA_ID` int(11) NOT NULL,
  `MABA_URAIAN` text NOT NULL,
  `MABA_KELUAR` int(11) NOT NULL,
  `MABA_MASUK` int(11) NOT NULL,
  `MABA_SALDO` int(11) NOT NULL,
  `MABA_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MABA_MPBA_ID` int(11) NOT NULL,
  `MABA_MCBA_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `material_child_bawang`
--

CREATE TABLE `material_child_bawang` (
  `MCBA_ID` int(11) NOT NULL,
  `MCBA_NAME` varchar(100) NOT NULL,
  `MCBA_MABA_TOTAL` int(11) NOT NULL,
  `MCBA_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MCBA_SATU_ID` int(11) NOT NULL,
  `MCBA_MPBA_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `material_child_cimuning`
--

CREATE TABLE `material_child_cimuning` (
  `MCCI_ID` int(11) NOT NULL,
  `MCCI_NAME` varchar(100) NOT NULL,
  `MCCI_MACI_TOTAL` int(11) NOT NULL,
  `MCCI_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MCCI_SATU_ID` int(11) NOT NULL,
  `MCCI_MPCI_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `material_cimuning`
--

CREATE TABLE `material_cimuning` (
  `MACI_ID` int(11) NOT NULL,
  `MACI_URAIAN` text NOT NULL,
  `MACI_KELUAR` int(11) NOT NULL,
  `MACI_MASUK` int(11) NOT NULL,
  `MACI_SALDO` int(11) NOT NULL,
  `MACI_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MACI_MPCI_ID` int(11) NOT NULL,
  `MACI_MCCI_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `material_parent_bawang`
--

CREATE TABLE `material_parent_bawang` (
  `MPBA_ID` int(11) NOT NULL,
  `MPBA_NAME` varchar(100) NOT NULL,
  `MPBA_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `material_parent_cimuning`
--

CREATE TABLE `material_parent_cimuning` (
  `MPCI_ID` int(11) NOT NULL,
  `MPCI_NAME` varchar(100) NOT NULL,
  `MPCI_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `PEGA_ID` int(11) NOT NULL,
  `PEGA_NAME` varchar(80) NOT NULL,
  `PEGA_EMAIL` varchar(80) NOT NULL,
  `PEGA_ALAMAT` varchar(100) NOT NULL,
  `PEGA_NO_TLP` int(13) NOT NULL,
  `PEGA_JENKEL` varchar(1) NOT NULL,
  `PEGA_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `PEGA_AGAM_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`PEGA_ID`, `PEGA_NAME`, `PEGA_EMAIL`, `PEGA_ALAMAT`, `PEGA_NO_TLP`, `PEGA_JENKEL`, `PEGA_TIMESTAMP`, `PEGA_AGAM_ID`) VALUES
(0, 'SUDO', 'SUDO', 'SUDO', 12345, 'L', '2018-05-04 16:27:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `RUAN_ID` int(11) NOT NULL,
  `RUAN_NUMBER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `satuan` (
  `SATU_ID` int(11) NOT NULL,
  `SATU_NAME` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`SATU_ID`, `SATU_NAME`) VALUES
(1, 'SET'),
(2, 'BH'),
(3, 'BTG'),
(4, 'ROLL'),
(5, 'UNIT');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USER_ID` int(11) NOT NULL,
  `USER_NAME` varchar(50) NOT NULL,
  `USER_PASSWORD` varchar(50) NOT NULL,
  `USER_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `USER_LEVE_ID` int(11) NOT NULL,
  `USER_DAPE_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `USER_NAME`, `USER_PASSWORD`, `USER_TIMESTAMP`, `USER_LEVE_ID`, `USER_DAPE_ID`) VALUES
(1, 'SUDO', '28a4437b86f15b3e4204252dd75327fe', '2018-04-18 01:18:27', 5, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`AGAM_ID`);

--
-- Indexes for table `barang_child`
--
ALTER TABLE `barang_child`
  ADD PRIMARY KEY (`BACH_ID`);

--
-- Indexes for table `barang_parent`
--
ALTER TABLE `barang_parent`
  ADD PRIMARY KEY (`BAPA_ID`);

--
-- Indexes for table `gudang_bawang`
--
ALTER TABLE `gudang_bawang`
  ADD PRIMARY KEY (`GUBA_ID`);

--
-- Indexes for table `gudang_jadi`
--
ALTER TABLE `gudang_jadi`
  ADD PRIMARY KEY (`GUJA_ID`);

--
-- Indexes for table `gudang_tak_jadi`
--
ALTER TABLE `gudang_tak_jadi`
  ADD PRIMARY KEY (`GUTA_ID`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`INVE_ID`);

--
-- Indexes for table `inventaris_child`
--
ALTER TABLE `inventaris_child`
  ADD PRIMARY KEY (`INCH_ID`);

--
-- Indexes for table `inventaris_parent`
--
ALTER TABLE `inventaris_parent`
  ADD PRIMARY KEY (`INPA_ID`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`KATE_ID`);

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`KEUA_ID`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`LEVE_ID`);

--
-- Indexes for table `material_bawang`
--
ALTER TABLE `material_bawang`
  ADD PRIMARY KEY (`MABA_ID`);

--
-- Indexes for table `material_child_bawang`
--
ALTER TABLE `material_child_bawang`
  ADD PRIMARY KEY (`MCBA_ID`);

--
-- Indexes for table `material_child_cimuning`
--
ALTER TABLE `material_child_cimuning`
  ADD PRIMARY KEY (`MCCI_ID`);

--
-- Indexes for table `material_cimuning`
--
ALTER TABLE `material_cimuning`
  ADD PRIMARY KEY (`MACI_ID`);

--
-- Indexes for table `material_parent_bawang`
--
ALTER TABLE `material_parent_bawang`
  ADD PRIMARY KEY (`MPBA_ID`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`PEGA_ID`),
  ADD UNIQUE KEY `PEGA_EMAIL` (`PEGA_EMAIL`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`RUAN_ID`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`SATU_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`),
  ADD UNIQUE KEY `USER_NAME` (`USER_NAME`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `AGAM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `barang_child`
--
ALTER TABLE `barang_child`
  MODIFY `BACH_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barang_parent`
--
ALTER TABLE `barang_parent`
  MODIFY `BAPA_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gudang_jadi`
--
ALTER TABLE `gudang_jadi`
  MODIFY `GUJA_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gudang_tak_jadi`
--
ALTER TABLE `gudang_tak_jadi`
  MODIFY `GUTA_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `INVE_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventaris_child`
--
ALTER TABLE `inventaris_child`
  MODIFY `INCH_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventaris_parent`
--
ALTER TABLE `inventaris_parent`
  MODIFY `INPA_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `KATE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `KEUA_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `LEVE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `PEGA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `RUAN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `SATU_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
