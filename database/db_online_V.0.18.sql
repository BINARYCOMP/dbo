-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 05, 2018 at 03:27 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=218 ;

--
-- Dumping data for table `barang_child`
--

INSERT INTO `barang_child` (`BACH_ID`, `BACH_NAME`, `BACH_GUJA_TOTAL`, `BACH_GUTA_TOTAL`, `BACH_TIMESTAMP`, `BACH_SATU_ID`, `BACH_BAPA_ID`) VALUES
(1, 'Adjustable Dead End Assembly 25-35', 0, 0, '2018-05-05 01:55:34', 1, 1),
(2, 'Adjustable Dead End Assembly 50-70', 0, 0, '2018-05-05 01:56:13', 1, 1),
(3, 'Fixed Dead End Assembly 25-35', 0, 0, '2018-05-05 01:56:34', 1, 1),
(4, 'Fixed Dead End Assembly 50-70', 0, 0, '2018-05-05 01:56:48', 1, 1),
(5, 'Large Angle Assembly 25-35', 0, 0, '2018-05-05 01:57:06', 1, 1),
(6, 'Large Angle Assembly 50-70', 0, 0, '2018-05-05 01:57:20', 1, 1),
(7, 'Strain clamp 25-70', 0, 0, '2018-05-05 01:57:34', 1, 1),
(8, 'Strain clamp 70-150', 0, 0, '2018-05-05 01:57:47', 1, 1),
(9, 'Strain clamp 150-240', 0, 0, '2018-05-05 01:58:06', 1, 1),
(10, 'Suspension Assembly 25-70', 0, 0, '2018-05-05 01:58:20', 1, 1),
(11, 'APG Tunggal 25-35', 0, 0, '2018-05-05 01:58:46', 1, 1),
(12, 'APG 150-240 A-B', 0, 0, '2018-05-05 01:58:57', 1, 1),
(13, 'APG 150-240 ', 0, 0, '2018-05-05 01:59:14', 1, 1),
(14, 'APG 70-150', 0, 0, '2018-05-05 01:59:29', 1, 1),
(15, 'Arrester Polymer 18 Kv 5 Ka Guju', 0, 0, '2018-05-05 01:59:45', 2, 2),
(16, 'Arrester  Polymer 18 Kv 5 Ka Cheryong', 0, 0, '2018-05-05 02:00:00', 2, 2),
(17, 'Arrester Polymer 20 Kv 10 Ka Guju', 0, 0, '2018-05-05 02:00:18', 2, 2),
(18, 'Arrester Polymer 24 Kv 5 Ka Guju', 0, 0, '2018-05-05 02:00:32', 2, 2),
(19, 'Arrester Polymer 24 KV 100 A Right', 0, 0, '2018-05-05 02:00:47', 2, 2),
(20, 'Arrester Porcelen Piramida 24 Kv 100 Ka ', 0, 0, '2018-05-05 02:01:01', 2, 2),
(21, 'Arrester Porcelain 24 Kv 10 Ka Right', 0, 0, '2018-05-05 02:01:09', 2, 2),
(22, 'Cut Out 24 Kv 100 A Porcelen Right', 0, 0, '2018-05-05 02:02:13', 2, 3),
(23, 'Cut Out 27 Kv 100 A Porcelen Right', 0, 0, '2018-05-05 02:02:29', 2, 3),
(24, 'Cut Out Right 24 Kv 100 A Polymer ', 0, 0, '2018-05-05 02:02:40', 2, 3),
(25, 'Cut Out 25,8 Kv 100 A Cheryong', 0, 0, '2018-05-05 02:02:51', 2, 3),
(26, 'Line Post 25 Kv', 0, 0, '2018-05-05 02:05:10', 2, 3),
(27, 'Suspension Guju', 0, 0, '2018-05-05 02:05:24', 2, 3),
(28, 'Kaki Arrester Abu Abu', 0, 0, '2018-05-05 02:05:38', 2, 3),
(29, 'Kaki Arrester Putih', 0, 0, '2018-05-05 02:05:50', 2, 3),
(30, 'Tabung Cut Out', 0, 0, '2018-05-05 02:06:30', 0, 3),
(31, 'Tabung Cut Out', 0, 0, '2018-05-05 02:06:51', 2, 3),
(32, 'Isolator Tumpu', 0, 0, '2018-05-05 02:07:09', 2, 3),
(33, 'Isolator Pin Post', 0, 0, '2018-05-05 02:07:39', 2, 3),
(34, 'Isolator Aspan', 0, 0, '2018-05-05 02:07:54', 2, 3),
(35, 'Cable Clamp 16 - 16', 0, 0, '2018-05-05 02:08:25', 2, 4),
(36, 'Cable Clamp 16 - 35', 0, 0, '2018-05-05 02:08:37', 2, 4),
(37, 'Cable Clamp 24 - 70', 0, 0, '2018-05-05 02:08:50', 2, 4),
(38, 'Cable Clamp 35 - 35', 0, 0, '2018-05-05 02:09:07', 2, 4),
(39, 'Cable Clamp 35 - 70', 0, 0, '2018-05-05 02:09:24', 2, 4),
(40, 'Cable Clamp 35 - 150', 0, 0, '2018-05-05 02:09:38', 2, 4),
(41, 'Cable Clamp 50 - 70', 0, 0, '2018-05-05 02:09:54', 2, 4),
(42, 'Cable Clamp 70 - 16', 0, 0, '2018-05-05 02:10:10', 2, 4),
(43, 'Cable Clamp 70 - 70', 0, 0, '2018-05-05 02:10:24', 2, 4),
(44, 'Cable Clamp 70 - 150', 0, 0, '2018-05-05 02:10:35', 2, 4),
(45, 'Cable Clamp 150 - 150', 0, 0, '2018-05-05 02:10:50', 2, 4),
(46, 'Cable Clamp 150 - 240', 0, 0, '2018-05-05 02:11:01', 2, 4),
(47, 'Cable Clamp 240 -  240', 0, 0, '2018-05-05 02:20:56', 2, 4),
(48, 'KP 35 - 50/10 - 16', 0, 0, '2018-05-05 02:21:15', 2, 4),
(49, 'KJ 50 - 70/50 - 70', 0, 0, '2018-05-05 02:21:34', 2, 4),
(50, 'KJ 95 - 120/95 - 120', 0, 0, '2018-05-05 02:21:50', 2, 4),
(51, 'Cable Clamp KAK', 0, 0, '2018-05-05 02:22:09', 2, 4),
(52, 'Cable Clamp Cheryong', 0, 0, '2018-05-05 02:22:28', 2, 4),
(53, 'Cover Bushing Trafo Blue', 0, 0, '2018-05-05 02:22:51', 2, 5),
(54, 'Cover Bushing Trafo Red', 0, 0, '2018-05-05 02:23:08', 2, 5),
(55, 'Cover Bushing Trafo Yellow', 0, 0, '2018-05-05 02:23:22', 2, 5),
(56, 'Cup Arrester Blue', 0, 0, '2018-05-05 02:23:39', 2, 5),
(57, 'Cup Arrester Red', 0, 0, '2018-05-05 02:23:58', 2, 5),
(58, 'Cup Arrester Yellow', 0, 0, '2018-05-05 02:24:13', 2, 5),
(59, 'Cup Arrester Abu Abu', 0, 0, '2018-05-05 02:24:30', 2, 5),
(60, 'Clamp 8"', 0, 0, '2018-05-05 02:24:50', 2, 6),
(61, 'Clamp Mangkok', 0, 0, '2018-05-05 02:25:04', 2, 6),
(62, 'Clamp Nanas', 0, 0, '2018-05-05 02:25:21', 2, 6),
(63, 'Clamp Poleband', 0, 0, '2018-05-05 02:25:36', 2, 6),
(64, 'Plat Simpul Besar', 0, 0, '2018-05-05 02:25:48', 2, 6),
(65, 'Plat Simpul Kecil', 0, 0, '2018-05-05 02:26:04', 2, 6),
(66, 'Plat Strip 45 cm', 0, 0, '2018-05-05 02:26:14', 2, 6),
(67, 'Strain Hook', 0, 0, '2018-05-05 02:26:23', 2, 6),
(68, 'Fuse Link 2 A', 0, 0, '2018-05-05 02:27:06', 2, 7),
(69, 'Fuse Link 3 A', 0, 0, '2018-05-05 02:27:18', 2, 7),
(70, 'Fuse Link 4 A', 0, 0, '2018-05-05 02:27:26', 2, 7),
(71, 'Fuse Link 5 A', 0, 0, '2018-05-05 02:27:34', 2, 7),
(72, 'Fuse Link 6 A', 0, 0, '2018-05-05 02:27:44', 2, 7),
(73, 'Fuse Link 8 A', 0, 0, '2018-05-05 02:27:53', 2, 7),
(74, 'Fuse Link 10 A', 0, 0, '2018-05-05 02:28:01', 2, 7),
(75, 'Fuse Link 12 A', 0, 0, '2018-05-05 02:28:10', 2, 7),
(76, 'Fuse Link 15 A', 0, 0, '2018-05-05 02:28:19', 2, 7),
(77, 'Fuse Link 20 A', 0, 0, '2018-05-05 02:28:27', 2, 7),
(78, 'Fuse Link 25 A', 0, 0, '2018-05-05 02:28:36', 2, 7),
(79, 'Fuse Link 30 A', 0, 0, '2018-05-05 02:28:43', 2, 7),
(80, 'Fuse Link 40 A', 0, 0, '2018-05-05 02:28:52', 2, 7),
(81, 'Fuse Link 50 A', 0, 0, '2018-05-05 02:29:00', 2, 7),
(82, 'Fuse Link 60 A', 0, 0, '2018-05-05 02:29:09', 2, 7),
(83, 'Fuse Link 65 A', 0, 0, '2018-05-05 02:29:18', 2, 7),
(84, 'Fuse Link 80 A', 0, 0, '2018-05-05 02:29:28', 2, 7),
(85, 'Fuse Link 100 A', 0, 0, '2018-05-05 02:29:37', 2, 7),
(86, 'Fuse Link 140 A', 0, 0, '2018-05-05 02:29:49', 2, 7),
(87, 'Fuse Link 200 A', 0, 0, '2018-05-05 02:29:58', 2, 7),
(88, 'NT1 250 A', 0, 0, '2018-05-05 02:30:29', 2, 8),
(89, 'NT2 400 A', 0, 0, '2018-05-05 02:30:40', 2, 8),
(90, 'Grounding 5/8 x 1,8 m''', 0, 0, '2018-05-05 02:31:09', 3, 9),
(91, 'Grounding 5/8 x 2,4 m''', 0, 0, '2018-05-05 02:31:20', 3, 9),
(92, 'Grounding 5/8 x 2,5 m''', 0, 0, '2018-05-05 02:31:34', 3, 9),
(93, 'Grounding 5/8 x 2,75 m''', 0, 0, '2018-05-05 02:31:48', 3, 9),
(94, 'Grounding besi+tembaga', 0, 0, '2018-05-05 02:32:01', 3, 9),
(95, 'H/S Ø 14', 0, 0, '2018-05-05 02:32:15', 4, 10),
(96, 'H/S Ø 22 ', 0, 0, '2018-05-05 02:32:26', 4, 10),
(97, 'H/S Ø 10 (9 Cm)', 0, 0, '2018-05-05 02:32:38', 2, 10),
(98, 'H/S Ø 14 (7 Cm)', 0, 0, '2018-05-05 02:32:51', 2, 10),
(99, 'H/S Ø 14 (9 Cm)', 0, 0, '2018-05-05 02:33:02', 2, 10),
(100, 'H/S Ø 22 (7 Cm)', 0, 0, '2018-05-05 02:33:11', 2, 10),
(101, 'H/S Ø 22 (17 Cm)', 0, 0, '2018-05-05 02:33:21', 2, 10),
(102, 'H/S Ø 40 Cm', 0, 0, '2018-05-05 02:33:32', 2, 10),
(103, 'JOINT SLEEVE AL 35', 0, 0, '2018-05-05 02:34:03', 2, 11),
(104, 'JOINT SLEEVE AL 50', 0, 0, '2018-05-05 02:34:17', 2, 11),
(105, 'JOINT SLEEVE AL 70-35', 0, 0, '2018-05-05 02:34:27', 2, 11),
(106, 'JOINT SLEEVE AL 50-70', 0, 0, '2018-05-05 02:34:41', 2, 11),
(107, 'JOINT SLEEVE AL 70', 0, 0, '2018-05-05 02:34:55', 2, 11),
(108, 'JOINT SLEEVE AL 95', 0, 0, '2018-05-05 02:35:40', 2, 11),
(109, 'JOINT SLEEVE AL 120', 0, 0, '2018-05-05 02:35:49', 2, 11),
(110, 'JOINT SLEEVE AL 150', 0, 0, '2018-05-05 02:35:57', 2, 11),
(111, 'JOINT SLEEVE AL 240', 0, 0, '2018-05-05 02:37:24', 2, 11),
(112, 'LBS Manual', 0, 0, '2018-05-05 02:38:39', 5, 12),
(113, 'LBS Automatic On Off', 0, 0, '2018-05-05 02:39:09', 5, 12),
(114, 'LBS Motorize RTU', 0, 0, '2018-05-05 02:39:29', 5, 12),
(115, 'MOF 15 / 5 A', 0, 0, '2018-05-05 02:40:02', 5, 13),
(116, 'MOF 25/ 5 A', 0, 0, '2018-05-05 02:40:19', 5, 13),
(117, 'MOF 150/ 5 A', 0, 0, '2018-05-05 02:40:30', 5, 13),
(118, 'NT1 50 A', 0, 0, '2018-05-05 02:40:58', 2, 14),
(119, 'NT1 63 A', 0, 0, '2018-05-05 02:41:06', 2, 14),
(120, 'NT1 80 A', 0, 0, '2018-05-05 02:41:16', 2, 14),
(121, 'NT1 100 A', 0, 0, '2018-05-05 02:41:26', 2, 14),
(122, 'NT1 125 A', 0, 0, '2018-05-05 02:41:37', 2, 14),
(123, 'NT1 160 A', 0, 0, '2018-05-05 02:42:26', 2, 14),
(124, 'NT1 200 A', 0, 0, '2018-05-05 02:42:36', 2, 14),
(125, 'NT1 224 A', 0, 0, '2018-05-05 02:42:46', 2, 14),
(126, 'NT1 225 A', 0, 0, '2018-05-05 02:42:57', 2, 14),
(127, 'NT1 250 A', 0, 0, '2018-05-05 02:43:06', 2, 14),
(128, 'NT2 300 A', 0, 0, '2018-05-05 02:43:17', 2, 14),
(129, 'NT2 315 A', 0, 0, '2018-05-05 02:43:29', 2, 14),
(130, 'NT2 355 A', 0, 0, '2018-05-05 02:43:39', 2, 14),
(131, 'NT2 400 A', 0, 0, '2018-05-05 02:43:54', 2, 14),
(132, 'NT3 500 A', 0, 0, '2018-05-05 02:44:15', 2, 14),
(133, 'NT3 630 A', 0, 0, '2018-05-05 02:44:24', 2, 14),
(134, 'NT0 40 A', 0, 0, '2018-05-05 02:44:43', 2, 14),
(135, 'NT0 50 A', 0, 0, '2018-05-05 02:45:40', 2, 14),
(136, 'NT0 63 A', 0, 0, '2018-05-05 02:46:22', 2, 14),
(137, 'NT0 80 A', 0, 0, '2018-05-05 02:46:32', 2, 14),
(138, 'NT0 100 A', 0, 0, '2018-05-05 02:46:58', 2, 14),
(139, 'NT0 125 A', 0, 0, '2018-05-05 02:47:10', 2, 14),
(140, 'NT0 160 A', 0, 0, '2018-05-05 02:47:20', 2, 14),
(141, 'NT00 25 A', 0, 0, '2018-05-05 02:47:30', 2, 14),
(142, 'NT00 40 A', 0, 0, '2018-05-05 02:47:43', 2, 14),
(143, 'NT00 50 A', 0, 0, '2018-05-05 02:47:53', 2, 14),
(144, 'NT00 63 A', 0, 0, '2018-05-05 02:48:02', 2, 14),
(145, 'NT00 80 A', 0, 0, '2018-05-05 02:48:11', 2, 14),
(146, 'NT00 100 A', 0, 0, '2018-05-05 02:48:20', 2, 14),
(147, 'NT00 125 A', 0, 0, '2018-05-05 02:48:39', 2, 14),
(148, 'NT00 160 A', 0, 0, '2018-05-05 02:48:51', 2, 14),
(149, 'Non Tension Joint AL 16-16', 0, 0, '2018-05-05 02:49:23', 2, 15),
(150, 'Non Tension Joint AL 50-50', 0, 0, '2018-05-05 02:49:31', 2, 15),
(151, 'Non Tension Joint AL 70', 0, 0, '2018-05-05 02:49:40', 2, 15),
(152, 'Non Tension Joint AL 70-50', 0, 0, '2018-05-05 02:49:52', 2, 15),
(153, 'Non Tension Joint AL 70-95', 0, 0, '2018-05-05 02:50:10', 2, 15),
(154, 'Non Tension Joint AL 95', 0, 0, '2018-05-05 02:50:43', 2, 15),
(155, 'Non Tension Joint AL 95-240', 0, 0, '2018-05-05 02:51:09', 2, 15),
(156, 'Non Tension Joint AL 120', 0, 0, '2018-05-05 02:51:22', 2, 15),
(157, 'Non Tension Joint AL 150', 0, 0, '2018-05-05 02:51:43', 2, 15),
(158, 'Non Tension Joint AL 150-240', 0, 0, '2018-05-05 02:51:53', 2, 15),
(159, 'Non Tension Joint AL 240', 0, 0, '2018-05-05 02:52:06', 2, 15),
(160, 'Non Tension Joint CU 35', 0, 0, '2018-05-05 02:52:20', 2, 16),
(161, 'Non Tension Joint CU 50', 0, 0, '2018-05-05 02:52:31', 2, 16),
(162, 'Non Tension Joint CU 70', 0, 0, '2018-05-05 02:52:53', 2, 16),
(163, 'Non Tension Joint CU 95', 0, 0, '2018-05-05 02:53:05', 2, 16),
(164, 'Non Tension Joint CU 150', 0, 0, '2018-05-05 02:53:17', 2, 16),
(165, 'Non Tension Joint CU 240', 0, 0, '2018-05-05 02:53:26', 2, 16),
(166, 'Scoth Roll', 0, 0, '2018-05-05 02:55:14', 4, 17),
(167, 'Scoth Roll Hitam', 0, 0, '2018-05-05 02:54:41', 4, 17),
(168, 'Scoth 16 Cm', 0, 0, '2018-05-05 02:56:16', 2, 17),
(169, 'Scoth 20 Cm', 0, 0, '2018-05-05 02:56:35', 2, 17),
(170, 'Scoth 30 Cm', 0, 0, '2018-05-05 03:01:19', 2, 17),
(171, 'Scoth 30 Cm (Hitam)', 0, 0, '2018-05-05 03:01:29', 2, 17),
(172, 'SWC 6-16 PP', 0, 0, '2018-05-05 03:01:43', 1, 18),
(173, 'SWC 6-16 Nilon', 0, 0, '2018-05-05 03:02:44', 1, 18),
(174, 'SWC 6-16 Sinarindo ', 0, 0, '2018-05-05 03:03:50', 1, 18),
(175, 'Sepatu Kabel CU 35', 0, 0, '2018-05-05 03:04:11', 2, 19),
(176, 'Sepatu Kabel CU 50', 0, 0, '2018-05-05 03:04:21', 2, 19),
(177, 'Sepatu Kabel CU 70', 0, 0, '2018-05-05 03:04:31', 2, 19),
(178, 'Sepatu Kabel CU 95', 0, 0, '2018-05-05 03:04:41', 2, 19),
(179, 'Sepatu Kabel CU 120', 0, 0, '2018-05-05 03:04:54', 2, 19),
(180, 'Sepatu Kabel CU 120 L', 0, 0, '2018-05-05 03:05:04', 2, 19),
(181, 'Sepatu Kabel CU 150', 0, 0, '2018-05-05 03:05:27', 2, 19),
(182, 'Sepatu Kabel CU 185', 0, 0, '2018-05-05 03:05:39', 2, 19),
(183, 'Sepatu Kabel CU 240', 0, 0, '2018-05-05 03:05:49', 2, 19),
(184, 'Sepatu Kabel CU 300', 0, 0, '2018-05-05 03:05:59', 2, 19),
(185, 'Sepatu Kabel AL 35', 0, 0, '2018-05-05 03:06:32', 2, 20),
(186, 'Sepatu Kabel AL 50', 0, 0, '2018-05-05 03:06:42', 2, 20),
(187, 'Sepatu Kabel AL 70', 0, 0, '2018-05-05 03:10:53', 2, 20),
(188, 'Sepatu Kabel AL 70 L', 0, 0, '2018-05-05 03:11:08', 2, 20),
(189, 'Sepatu Kabel AL 95', 0, 0, '2018-05-05 03:11:23', 2, 20),
(190, 'Sepatu Kabel AL 120', 0, 0, '2018-05-05 03:11:35', 2, 20),
(191, 'Sepatu Kabel AL 150', 0, 0, '2018-05-05 03:11:46', 2, 20),
(192, 'Sepatu Kabel AL 185', 0, 0, '2018-05-05 03:11:57', 2, 20),
(193, 'Sepatu Kabel AL 240', 0, 0, '2018-05-05 03:12:10', 2, 20),
(194, 'Sepatu Kabel AL 300', 0, 0, '2018-05-05 03:12:41', 2, 20),
(195, 'Sepatu Kabel AL-CU 35', 0, 0, '2018-05-05 03:13:38', 2, 21),
(196, 'Sepatu Kabel AL-CU 50', 0, 0, '2018-05-05 03:13:47', 2, 21),
(197, 'Sepatu Kabel AL-CU 70', 0, 0, '2018-05-05 03:13:58', 2, 21),
(198, 'Sepatu Kabel AL-CU 70 Long', 0, 0, '2018-05-05 03:14:08', 2, 21),
(199, 'Sepatu Kabel AL-CU 70 Short', 0, 0, '2018-05-05 03:14:21', 2, 21),
(200, 'Sepatu Kabel AL-CU 95', 0, 0, '2018-05-05 03:14:36', 2, 21),
(201, 'Sepatu Kabel AL-CU 120', 0, 0, '2018-05-05 03:14:45', 2, 21),
(202, 'Sepatu Kabel AL-CU 150', 0, 0, '2018-05-05 03:14:57', 2, 21),
(203, 'Sepatu Kabel AL-CU 185', 0, 0, '2018-05-05 03:15:09', 2, 21),
(204, 'Sepatu Kabel AL-CU 240', 0, 0, '2018-05-05 03:15:21', 2, 21),
(205, 'Bimetal 16-16', 0, 0, '2018-05-05 03:19:09', 2, 22),
(206, 'Bimetal 35-70', 0, 0, '2018-05-05 03:19:24', 2, 22),
(207, 'Bimetal 50-50', 0, 0, '2018-05-05 03:19:39', 2, 22),
(208, 'Bimetal 50-70', 0, 0, '2018-05-05 03:19:49', 2, 22),
(209, 'Bimetal 70-70', 0, 0, '2018-05-05 03:19:59', 2, 22),
(210, 'Bimetal 70-50', 0, 0, '2018-05-05 03:20:10', 2, 22),
(211, 'Bimetal 70-95', 0, 0, '2018-05-05 03:20:21', 2, 22),
(212, 'Bimetal 70-150', 0, 0, '2018-05-05 03:20:32', 2, 22),
(213, 'Bimetal 95-95', 0, 0, '2018-05-05 03:20:43', 2, 22),
(214, 'Bimetal 95-70', 0, 0, '2018-05-05 03:20:54', 2, 22),
(215, 'Bimetal 150-240', 0, 0, '2018-05-05 03:21:07', 2, 22),
(216, 'Tap Connector 1 baut 6-25', 0, 0, '2018-05-05 03:21:59', 2, 23),
(217, 'Tap Connector 2 baut 35-70', 0, 0, '2018-05-05 03:22:09', 2, 23);

-- --------------------------------------------------------

--
-- Table structure for table `barang_parent`
--

CREATE TABLE IF NOT EXISTS `barang_parent` (
  `BAPA_ID` int(11) NOT NULL AUTO_INCREMENT,
  `BAPA_NAME` varchar(100) NOT NULL,
  `BAPA_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`BAPA_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `barang_parent`
--

INSERT INTO `barang_parent` (`BAPA_ID`, `BAPA_NAME`, `BAPA_TIMESTAMP`) VALUES
(1, 'ASSEMBLY', '2018-05-05 01:49:11'),
(2, 'ARRESTER', '2018-05-05 01:49:56'),
(3, 'CUT OUT', '2018-05-05 01:50:07'),
(4, 'CABLE CLAMP ', '2018-05-05 01:50:16'),
(5, 'COVER BUSHING', '2018-05-05 01:50:26'),
(6, 'CLAMP', '2018-05-05 01:50:35'),
(7, 'FUSE LINK ', '2018-05-05 01:50:43'),
(8, 'FUSE BASE', '2018-05-05 01:50:52'),
(9, 'Grounding Kecil', '2018-05-05 01:51:02'),
(10, 'HEATSHRINK', '2018-05-05 01:51:09'),
(11, 'JOINT SLEEVE AL', '2018-05-05 01:51:17'),
(12, 'LOAD BREAK SWITCH ', '2018-05-05 01:51:29'),
(13, 'METERING OUT FIT', '2018-05-05 01:51:40'),
(14, 'NH FUSE', '2018-05-05 01:51:48'),
(15, 'NON TENSION JOINT AL ', '2018-05-05 01:51:57'),
(16, 'NON TENSION JOINT CU', '2018-05-05 01:52:04'),
(17, 'SCOTH', '2018-05-05 01:52:12'),
(18, 'SERVICE WEDGE CLAMP', '2018-05-05 01:52:20'),
(19, 'SEPATU KABEL CU', '2018-05-05 01:52:27'),
(20, 'SEPATU KABEL AL', '2018-05-05 01:52:35'),
(21, 'SEPATU KABEL AL-CU', '2018-05-05 01:52:42'),
(22, 'BIMETAL', '2018-05-05 01:52:49'),
(23, 'TAP CONNECTOR', '2018-05-05 01:53:03');

-- --------------------------------------------------------

--
-- Table structure for table `gudang_bawang`
--

CREATE TABLE IF NOT EXISTS `gudang_bawang` (
  `GUBA_ID` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
