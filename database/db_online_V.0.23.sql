-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2018 at 06:15 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

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
  `BACH_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `BACH_SATU_ID` int(11) NOT NULL,
  `BACH_BAPA_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang_child`
--

INSERT INTO `barang_child` (`BACH_ID`, `BACH_NAME`, `BACH_TIMESTAMP`, `BACH_SATU_ID`, `BACH_BAPA_ID`) VALUES
(1, 'Adjustable Dead End Assembly 25-35', '2018-05-04 11:55:34', 1, 1),
(2, 'Adjustable Dead End Assembly 50-70', '2018-05-04 11:56:13', 1, 1),
(3, 'Fixed Dead End Assembly 25-35', '2018-05-04 11:56:34', 1, 1),
(4, 'Fixed Dead End Assembly 50-70', '2018-05-04 11:56:48', 1, 1),
(5, 'Large Angle Assembly 25-35', '2018-05-04 11:57:06', 1, 1),
(6, 'Large Angle Assembly 50-70', '2018-05-04 11:57:20', 1, 1),
(7, 'Strain clamp 25-70', '2018-05-04 11:57:34', 1, 1),
(8, 'Strain clamp 70-150', '2018-05-04 11:57:47', 1, 1),
(9, 'Strain clamp 150-240', '2018-05-04 11:58:06', 1, 1),
(10, 'Suspension Assembly 25-70', '2018-05-04 11:58:20', 1, 1),
(11, 'APG Tunggal 25-35', '2018-05-04 11:58:46', 1, 1),
(12, 'APG 150-240 A-B', '2018-05-04 11:58:57', 1, 1),
(13, 'APG 150-240 ', '2018-05-04 11:59:14', 1, 1),
(14, 'APG 70-150', '2018-05-04 11:59:29', 1, 1),
(15, 'Arrester Polymer 18 Kv 5 Ka Guju', '2018-05-04 11:59:45', 2, 2),
(16, 'Arrester  Polymer 18 Kv 5 Ka Cheryong', '2018-05-04 12:00:00', 2, 2),
(17, 'Arrester Polymer 20 Kv 10 Ka Guju', '2018-05-04 12:00:18', 2, 2),
(18, 'Arrester Polymer 24 Kv 5 Ka Guju', '2018-05-04 12:00:32', 2, 2),
(19, 'Arrester Polymer 24 KV 100 A Right', '2018-05-04 12:00:47', 2, 2),
(20, 'Arrester Porcelen Piramida 24 Kv 100 Ka ', '2018-05-04 12:01:01', 2, 2),
(21, 'Arrester Porcelain 24 Kv 10 Ka Right', '2018-05-04 12:01:09', 2, 2),
(22, 'Cut Out 24 Kv 100 A Porcelen Right', '2018-05-04 12:02:13', 2, 3),
(23, 'Cut Out 27 Kv 100 A Porcelen Right', '2018-05-04 12:02:29', 2, 3),
(24, 'Cut Out Right 24 Kv 100 A Polymer ', '2018-05-04 12:02:40', 2, 3),
(25, 'Cut Out 25,8 Kv 100 A Cheryong', '2018-05-04 12:02:51', 2, 3),
(26, 'Line Post 25 Kv', '2018-05-04 12:05:10', 2, 3),
(27, 'Suspension Guju', '2018-05-04 12:05:24', 2, 3),
(28, 'Kaki Arrester Abu Abu', '2018-05-04 12:05:38', 2, 3),
(29, 'Kaki Arrester Putih', '2018-05-04 12:05:50', 2, 3),
(30, 'Tabung Cut Out', '2018-05-04 12:06:30', 0, 3),
(31, 'Tabung Cut Out', '2018-05-04 12:06:51', 2, 3),
(32, 'Isolator Tumpu', '2018-05-04 12:07:09', 2, 3),
(33, 'Isolator Pin Post', '2018-05-04 12:07:39', 2, 3),
(34, 'Isolator Aspan', '2018-05-04 12:07:54', 2, 3),
(35, 'Cable Clamp 16 - 16', '2018-05-04 12:08:25', 2, 4),
(36, 'Cable Clamp 16 - 35', '2018-05-04 12:08:37', 2, 4),
(37, 'Cable Clamp 24 - 70', '2018-05-04 12:08:50', 2, 4),
(38, 'Cable Clamp 35 - 35', '2018-05-04 12:09:07', 2, 4),
(39, 'Cable Clamp 35 - 70', '2018-05-04 12:09:24', 2, 4),
(40, 'Cable Clamp 35 - 150', '2018-05-04 12:09:38', 2, 4),
(41, 'Cable Clamp 50 - 70', '2018-05-04 12:09:54', 2, 4),
(42, 'Cable Clamp 70 - 16', '2018-05-04 12:10:10', 2, 4),
(43, 'Cable Clamp 70 - 70', '2018-05-04 12:10:24', 2, 4),
(44, 'Cable Clamp 70 - 150', '2018-05-04 12:10:35', 2, 4),
(45, 'Cable Clamp 150 - 150', '2018-05-04 12:10:50', 2, 4),
(46, 'Cable Clamp 150 - 240', '2018-05-04 12:11:01', 2, 4),
(47, 'Cable Clamp 240 -  240', '2018-05-04 12:20:56', 2, 4),
(48, 'KP 35 - 50/10 - 16', '2018-05-04 12:21:15', 2, 4),
(49, 'KJ 50 - 70/50 - 70', '2018-05-04 12:21:34', 2, 4),
(50, 'KJ 95 - 120/95 - 120', '2018-05-04 12:21:50', 2, 4),
(51, 'Cable Clamp KAK', '2018-05-04 12:22:09', 2, 4),
(52, 'Cable Clamp Cheryong', '2018-05-04 12:22:28', 2, 4),
(53, 'Cover Bushing Trafo Blue', '2018-05-04 12:22:51', 2, 5),
(54, 'Cover Bushing Trafo Red', '2018-05-04 12:23:08', 2, 5),
(55, 'Cover Bushing Trafo Yellow', '2018-05-04 12:23:22', 2, 5),
(56, 'Cup Arrester Blue', '2018-05-04 12:23:39', 2, 5),
(57, 'Cup Arrester Red', '2018-05-04 12:23:58', 2, 5),
(58, 'Cup Arrester Yellow', '2018-05-04 12:24:13', 2, 5),
(59, 'Cup Arrester Abu Abu', '2018-05-04 12:24:30', 2, 5),
(60, 'Clamp 8\"', '2018-05-04 12:24:50', 2, 6),
(61, 'Clamp Mangkok', '2018-05-04 12:25:04', 2, 6),
(62, 'Clamp Nanas', '2018-05-04 12:25:21', 2, 6),
(63, 'Clamp Poleband', '2018-05-04 12:25:36', 2, 6),
(64, 'Plat Simpul Besar', '2018-05-04 12:25:48', 2, 6),
(65, 'Plat Simpul Kecil', '2018-05-04 12:26:04', 2, 6),
(66, 'Plat Strip 45 cm', '2018-05-04 12:26:14', 2, 6),
(67, 'Strain Hook', '2018-05-04 12:26:23', 2, 6),
(68, 'Fuse Link 2 A', '2018-05-04 12:27:06', 2, 7),
(69, 'Fuse Link 3 A', '2018-05-04 12:27:18', 2, 7),
(70, 'Fuse Link 4 A', '2018-05-04 12:27:26', 2, 7),
(71, 'Fuse Link 5 A', '2018-05-04 12:27:34', 2, 7),
(72, 'Fuse Link 6 A', '2018-05-04 12:27:44', 2, 7),
(73, 'Fuse Link 8 A', '2018-05-04 12:27:53', 2, 7),
(74, 'Fuse Link 10 A', '2018-05-04 12:28:01', 2, 7),
(75, 'Fuse Link 12 A', '2018-05-04 12:28:10', 2, 7),
(76, 'Fuse Link 15 A', '2018-05-04 12:28:19', 2, 7),
(77, 'Fuse Link 20 A', '2018-05-04 12:28:27', 2, 7),
(78, 'Fuse Link 25 A', '2018-05-04 12:28:36', 2, 7),
(79, 'Fuse Link 30 A', '2018-05-04 12:28:43', 2, 7),
(80, 'Fuse Link 40 A', '2018-05-04 12:28:52', 2, 7),
(81, 'Fuse Link 50 A', '2018-05-04 12:29:00', 2, 7),
(82, 'Fuse Link 60 A', '2018-05-04 12:29:09', 2, 7),
(83, 'Fuse Link 65 A', '2018-05-04 12:29:18', 2, 7),
(84, 'Fuse Link 80 A', '2018-05-04 12:29:28', 2, 7),
(85, 'Fuse Link 100 A', '2018-05-04 12:29:37', 2, 7),
(86, 'Fuse Link 140 A', '2018-05-04 12:29:49', 2, 7),
(87, 'Fuse Link 200 A', '2018-05-04 12:29:58', 2, 7),
(88, 'NT1 250 A', '2018-05-04 12:30:29', 2, 8),
(89, 'NT2 400 A', '2018-05-04 12:30:40', 2, 8),
(90, 'Grounding 5/8 x 1,8 m\'', '2018-05-04 12:31:09', 3, 9),
(91, 'Grounding 5/8 x 2,4 m\'', '2018-05-04 12:31:20', 3, 9),
(92, 'Grounding 5/8 x 2,5 m\'', '2018-05-04 12:31:34', 3, 9),
(93, 'Grounding 5/8 x 2,75 m\'', '2018-05-04 12:31:48', 3, 9),
(94, 'Grounding besi+tembaga', '2018-05-04 12:32:01', 3, 9),
(95, 'H/S Ø 14', '2018-05-04 12:32:15', 4, 10),
(96, 'H/S Ø 22 ', '2018-05-04 12:32:26', 4, 10),
(97, 'H/S Ø 10 (9 Cm)', '2018-05-04 12:32:38', 2, 10),
(98, 'H/S Ø 14 (7 Cm)', '2018-05-04 12:32:51', 2, 10),
(99, 'H/S Ø 14 (9 Cm)', '2018-05-04 12:33:02', 2, 10),
(100, 'H/S Ø 22 (7 Cm)', '2018-05-04 12:33:11', 2, 10),
(101, 'H/S Ø 22 (17 Cm)', '2018-05-04 12:33:21', 2, 10),
(102, 'H/S Ø 40 Cm', '2018-05-04 12:33:32', 2, 10),
(103, 'JOINT SLEEVE AL 35', '2018-05-04 12:34:03', 2, 11),
(104, 'JOINT SLEEVE AL 50', '2018-05-04 12:34:17', 2, 11),
(105, 'JOINT SLEEVE AL 70-35', '2018-05-04 12:34:27', 2, 11),
(106, 'JOINT SLEEVE AL 50-70', '2018-05-04 12:34:41', 2, 11),
(107, 'JOINT SLEEVE AL 70', '2018-05-04 12:34:55', 2, 11),
(108, 'JOINT SLEEVE AL 95', '2018-05-04 12:35:40', 2, 11),
(109, 'JOINT SLEEVE AL 120', '2018-05-04 12:35:49', 2, 11),
(110, 'JOINT SLEEVE AL 150', '2018-05-04 12:35:57', 2, 11),
(111, 'JOINT SLEEVE AL 240', '2018-05-04 12:37:24', 2, 11),
(112, 'LBS Manual', '2018-05-04 12:38:39', 5, 12),
(113, 'LBS Automatic On Off', '2018-05-04 12:39:09', 5, 12),
(114, 'LBS Motorize RTU', '2018-05-04 12:39:29', 5, 12),
(115, 'MOF 15 / 5 A', '2018-05-04 12:40:02', 5, 13),
(116, 'MOF 25/ 5 A', '2018-05-04 12:40:19', 5, 13),
(117, 'MOF 150/ 5 A', '2018-05-04 12:40:30', 5, 13),
(118, 'NT1 50 A', '2018-05-04 12:40:58', 2, 14),
(119, 'NT1 63 A', '2018-05-04 12:41:06', 2, 14),
(120, 'NT1 80 A', '2018-05-04 12:41:16', 2, 14),
(121, 'NT1 100 A', '2018-05-04 12:41:26', 2, 14),
(122, 'NT1 125 A', '2018-05-04 12:41:37', 2, 14),
(123, 'NT1 160 A', '2018-05-04 12:42:26', 2, 14),
(124, 'NT1 200 A', '2018-05-04 12:42:36', 2, 14),
(125, 'NT1 224 A', '2018-05-04 12:42:46', 2, 14),
(126, 'NT1 225 A', '2018-05-04 12:42:57', 2, 14),
(127, 'NT1 250 A', '2018-05-04 12:43:06', 2, 14),
(128, 'NT2 300 A', '2018-05-04 12:43:17', 2, 14),
(129, 'NT2 315 A', '2018-05-04 12:43:29', 2, 14),
(130, 'NT2 355 A', '2018-05-04 12:43:39', 2, 14),
(131, 'NT2 400 A', '2018-05-04 12:43:54', 2, 14),
(132, 'NT3 500 A', '2018-05-04 12:44:15', 2, 14),
(133, 'NT3 630 A', '2018-05-04 12:44:24', 2, 14),
(134, 'NT0 40 A', '2018-05-04 12:44:43', 2, 14),
(135, 'NT0 50 A', '2018-05-04 12:45:40', 2, 14),
(136, 'NT0 63 A', '2018-05-04 12:46:22', 2, 14),
(137, 'NT0 80 A', '2018-05-04 12:46:32', 2, 14),
(138, 'NT0 100 A', '2018-05-04 12:46:58', 2, 14),
(139, 'NT0 125 A', '2018-05-04 12:47:10', 2, 14),
(140, 'NT0 160 A', '2018-05-04 12:47:20', 2, 14),
(141, 'NT00 25 A', '2018-05-04 12:47:30', 2, 14),
(142, 'NT00 40 A', '2018-05-04 12:47:43', 2, 14),
(143, 'NT00 50 A', '2018-05-04 12:47:53', 2, 14),
(144, 'NT00 63 A', '2018-05-04 12:48:02', 2, 14),
(145, 'NT00 80 A', '2018-05-04 12:48:11', 2, 14),
(146, 'NT00 100 A', '2018-05-04 12:48:20', 2, 14),
(147, 'NT00 125 A', '2018-05-04 12:48:39', 2, 14),
(148, 'NT00 160 A', '2018-05-04 12:48:51', 2, 14),
(149, 'Non Tension Joint AL 16-16', '2018-05-04 12:49:23', 2, 15),
(150, 'Non Tension Joint AL 50-50', '2018-05-04 12:49:31', 2, 15),
(151, 'Non Tension Joint AL 70', '2018-05-04 12:49:40', 2, 15),
(152, 'Non Tension Joint AL 70-50', '2018-05-04 12:49:52', 2, 15),
(153, 'Non Tension Joint AL 70-95', '2018-05-04 12:50:10', 2, 15),
(154, 'Non Tension Joint AL 95', '2018-05-04 12:50:43', 2, 15),
(155, 'Non Tension Joint AL 95-240', '2018-05-04 12:51:09', 2, 15),
(156, 'Non Tension Joint AL 120', '2018-05-04 12:51:22', 2, 15),
(157, 'Non Tension Joint AL 150', '2018-05-04 12:51:43', 2, 15),
(158, 'Non Tension Joint AL 150-240', '2018-05-04 12:51:53', 2, 15),
(159, 'Non Tension Joint AL 240', '2018-05-04 12:52:06', 2, 15),
(160, 'Non Tension Joint CU 35', '2018-05-04 12:52:20', 2, 16),
(161, 'Non Tension Joint CU 50', '2018-05-04 12:52:31', 2, 16),
(162, 'Non Tension Joint CU 70', '2018-05-04 12:52:53', 2, 16),
(163, 'Non Tension Joint CU 95', '2018-05-04 12:53:05', 2, 16),
(164, 'Non Tension Joint CU 150', '2018-05-04 12:53:17', 2, 16),
(165, 'Non Tension Joint CU 240', '2018-05-04 12:53:26', 2, 16),
(166, 'Scoth Roll', '2018-05-04 12:55:14', 4, 17),
(167, 'Scoth Roll Hitam', '2018-05-04 12:54:41', 4, 17),
(168, 'Scoth 16 Cm', '2018-05-04 12:56:16', 2, 17),
(169, 'Scoth 20 Cm', '2018-05-04 12:56:35', 2, 17),
(170, 'Scoth 30 Cm', '2018-05-04 13:01:19', 2, 17),
(171, 'Scoth 30 Cm (Hitam)', '2018-05-04 13:01:29', 2, 17),
(172, 'SWC 6-16 PP', '2018-05-04 13:01:43', 1, 18),
(173, 'SWC 6-16 Nilon', '2018-05-04 13:02:44', 1, 18),
(174, 'SWC 6-16 Sinarindo ', '2018-05-04 13:03:50', 1, 18),
(175, 'Sepatu Kabel CU 35', '2018-05-04 13:04:11', 2, 19),
(176, 'Sepatu Kabel CU 50', '2018-05-04 13:04:21', 2, 19),
(177, 'Sepatu Kabel CU 70', '2018-05-04 13:04:31', 2, 19),
(178, 'Sepatu Kabel CU 95', '2018-05-04 13:04:41', 2, 19),
(179, 'Sepatu Kabel CU 120', '2018-05-04 13:04:54', 2, 19),
(180, 'Sepatu Kabel CU 120 L', '2018-05-04 13:05:04', 2, 19),
(181, 'Sepatu Kabel CU 150', '2018-05-04 13:05:27', 2, 19),
(182, 'Sepatu Kabel CU 185', '2018-05-04 13:05:39', 2, 19),
(183, 'Sepatu Kabel CU 240', '2018-05-04 13:05:49', 2, 19),
(184, 'Sepatu Kabel CU 300', '2018-05-04 13:05:59', 2, 19),
(185, 'Sepatu Kabel AL 35', '2018-05-04 13:06:32', 2, 20),
(186, 'Sepatu Kabel AL 50', '2018-05-04 13:06:42', 2, 20),
(187, 'Sepatu Kabel AL 70', '2018-05-04 13:10:53', 2, 20),
(188, 'Sepatu Kabel AL 70 L', '2018-05-04 13:11:08', 2, 20),
(189, 'Sepatu Kabel AL 95', '2018-05-04 13:11:23', 2, 20),
(190, 'Sepatu Kabel AL 120', '2018-05-04 13:11:35', 2, 20),
(191, 'Sepatu Kabel AL 150', '2018-05-04 13:11:46', 2, 20),
(192, 'Sepatu Kabel AL 185', '2018-05-04 13:11:57', 2, 20),
(193, 'Sepatu Kabel AL 240', '2018-05-04 13:12:10', 2, 20),
(194, 'Sepatu Kabel AL 300', '2018-05-04 13:12:41', 2, 20),
(195, 'Sepatu Kabel AL-CU 35', '2018-05-04 13:13:38', 2, 21),
(196, 'Sepatu Kabel AL-CU 50', '2018-05-04 13:13:47', 2, 21),
(197, 'Sepatu Kabel AL-CU 70', '2018-05-04 13:13:58', 2, 21),
(198, 'Sepatu Kabel AL-CU 70 Long', '2018-05-04 13:14:08', 2, 21),
(199, 'Sepatu Kabel AL-CU 70 Short', '2018-05-04 13:14:21', 2, 21),
(200, 'Sepatu Kabel AL-CU 95', '2018-05-04 13:14:36', 2, 21),
(201, 'Sepatu Kabel AL-CU 120', '2018-05-04 13:14:45', 2, 21),
(202, 'Sepatu Kabel AL-CU 150', '2018-05-04 13:14:57', 2, 21),
(203, 'Sepatu Kabel AL-CU 185', '2018-05-04 13:15:09', 2, 21),
(204, 'Sepatu Kabel AL-CU 240', '2018-05-04 13:15:21', 2, 21),
(205, 'Bimetal 16-16', '2018-05-04 13:19:09', 2, 22),
(206, 'Bimetal 35-70', '2018-05-04 13:19:24', 2, 22),
(207, 'Bimetal 50-50', '2018-05-04 13:19:39', 2, 22),
(208, 'Bimetal 50-70', '2018-05-04 13:19:49', 2, 22),
(209, 'Bimetal 70-70', '2018-05-04 13:19:59', 2, 22),
(210, 'Bimetal 70-50', '2018-05-04 13:20:10', 2, 22),
(211, 'Bimetal 70-95', '2018-05-04 13:20:21', 2, 22),
(212, 'Bimetal 70-150', '2018-05-04 13:20:32', 2, 22),
(213, 'Bimetal 95-95', '2018-05-04 13:20:43', 2, 22),
(214, 'Bimetal 95-70', '2018-05-04 13:20:54', 2, 22),
(215, 'Bimetal 150-240', '2018-05-04 13:21:07', 2, 22),
(216, 'Tap Connector 1 baut 6-25', '2018-05-04 13:21:59', 2, 23),
(217, 'Tap Connector 2 baut 35-70', '2018-05-04 13:22:09', 2, 23);

-- --------------------------------------------------------

--
-- Table structure for table `barang_cimuning_child`
--

CREATE TABLE `barang_cimuning_child` (
  `BACC_ID` int(11) NOT NULL,
  `BACC_NAME` varchar(100) NOT NULL,
  `BACC_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `BACC_SATU_ID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `barang_cimuning_parent`
--

CREATE TABLE `barang_cimuning_parent` (
  `BACP_ID` int(11) NOT NULL,
  `BACP_NAME` varchar(100) NOT NULL,
  `BACP_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `barang_parent`
--

CREATE TABLE `barang_parent` (
  `BAPA_ID` int(11) NOT NULL,
  `BAPA_NAME` varchar(100) NOT NULL,
  `BAPA_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang_parent`
--

INSERT INTO `barang_parent` (`BAPA_ID`, `BAPA_NAME`, `BAPA_TIMESTAMP`) VALUES
(1, 'ASSEMBLY', '2018-05-04 11:49:11'),
(2, 'ARRESTER', '2018-05-04 11:49:56'),
(3, 'CUT OUT', '2018-05-04 11:50:07'),
(4, 'CABLE CLAMP ', '2018-05-04 11:50:16'),
(5, 'COVER BUSHING', '2018-05-04 11:50:26'),
(6, 'CLAMP', '2018-05-04 11:50:35'),
(7, 'FUSE LINK ', '2018-05-04 11:50:43'),
(8, 'FUSE BASE', '2018-05-04 11:50:52'),
(9, 'Grounding Kecil', '2018-05-04 11:51:02'),
(10, 'HEATSHRINK', '2018-05-04 11:51:09'),
(11, 'JOINT SLEEVE AL', '2018-05-04 11:51:17'),
(12, 'LOAD BREAK SWITCH ', '2018-05-04 11:51:29'),
(13, 'METERING OUT FIT', '2018-05-04 11:51:40'),
(14, 'NH FUSE', '2018-05-04 11:51:48'),
(15, 'NON TENSION JOINT AL ', '2018-05-04 11:51:57'),
(16, 'NON TENSION JOINT CU', '2018-05-04 11:52:04'),
(17, 'SCOTH', '2018-05-04 11:52:12'),
(18, 'SERVICE WEDGE CLAMP', '2018-05-04 11:52:20'),
(19, 'SEPATU KABEL CU', '2018-05-04 11:52:27'),
(20, 'SEPATU KABEL AL', '2018-05-04 11:52:35'),
(21, 'SEPATU KABEL AL-CU', '2018-05-04 11:52:42'),
(22, 'BIMETAL', '2018-05-04 11:52:49'),
(23, 'TAP CONNECTOR', '2018-05-04 11:53:03');

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
  `GUJA_BACC_ID` int(11) NOT NULL,
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
  `GUTA_BACC_ID` int(11) NOT NULL,
  `GUTA_KATE_ID` int(11) NOT NULL,
  `GUTA_RUAN_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `INVE_ID` int(11) NOT NULL,
  `INVE_KEADAAN` varchar(25) NOT NULL,
  `INVE_KETERANGAN` text NOT NULL,
  `INVE_QTY` int(11) NOT NULL,
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
  `INCH_KETERANGAN` varchar(20) NOT NULL,
  `INCH_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `INCH_INPA_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventaris_child`
--

INSERT INTO `inventaris_child` (`INCH_ID`, `INCH_NAME`, `INCH_KETERANGAN`, `INCH_TIME`, `INCH_INPA_ID`) VALUES
(1, 'DKM-RA500-001', 'CIMUNING', '2018-05-09 10:01:59', 1),
(2, 'DKM-RA500-002', 'CIMUNING', '2018-05-09 10:01:59', 1),
(3, 'DKM-RA500-003', 'CIMUNING', '2018-05-09 10:01:59', 1),
(4, 'WIPM-001', 'CIMUNING', '2018-05-09 10:01:59', 2),
(5, 'WIPM-002', 'CIMUNING', '2018-05-09 10:01:59', 2),
(6, 'WIPM-003', 'CIMUNING', '2018-05-09 10:01:59', 2),
(7, 'No.3881', 'CIMUNING', '2018-05-09 10:01:59', 4),
(8, 'No.7320', 'CIMUNING', '2018-05-09 10:01:59', 4),
(9, 'TS101A-3-001', 'CIMUNING', '2018-05-09 10:01:59', 6),
(10, 'TS101A-3-002', 'CIMUNING', '2018-05-09 10:01:59', 6),
(11, 'TS101A-2-001', 'CIMUNING', '2018-05-09 10:01:59', 7),
(12, 'TS101A-2-002', 'CIMUNING', '2018-05-09 10:01:59', 7),
(13, 'TS101A-2-003', 'CIMUNING', '2018-05-09 10:01:59', 7),
(14, 'TS101A-2-004', 'CIMUNING', '2018-05-09 10:01:59', 7),
(15, 'CJX-250-001', 'CIMUNING', '2018-05-09 10:01:59', 8),
(16, 'CJX-250-002', 'CIMUNING', '2018-05-09 10:01:59', 8),
(17, 'Alat-001 Alat Uji Tegangan', 'CIMUNING', '2018-05-09 10:01:59', 13),
(18, 'Alat-002 Alat Uji Infuse', 'CIMUNING', '2018-05-09 10:01:59', 13),
(19, 'Alat-003 Komputer/Kontrol', 'CIMUNING', '2018-05-09 10:01:59', 13),
(20, 'Alat-004', 'CIMUNING', '2018-05-09 10:01:59', 13),
(21, 'Alat-005', 'CIMUNING', '2018-05-09 10:01:59', 13),
(22, 'Samsung-001 Kantor', 'CIMUNING', '2018-05-09 10:01:59', 14),
(23, 'Samsung-002 Kantor', 'CIMUNING', '2018-05-09 10:01:59', 14),
(24, 'Samsung-003 Lab Atas', 'CIMUNING', '2018-05-09 10:01:59', 14),
(25, 'Samsung-004 Ruang Rapat', 'CIMUNING', '2018-05-09 10:01:59', 14),
(26, 'Samsung-005 Ruang Rapat', 'CIMUNING', '2018-05-09 10:01:59', 14),
(27, 'Samsung-006 Ruang Manager', 'CIMUNING', '2018-05-09 10:01:59', 14),
(28, 'Layar LG', 'CIMUNING', '2018-05-09 10:01:59', 17),
(29, 'Keyboard Logitech', 'CIMUNING', '2018-05-09 10:01:59', 17),
(30, 'Mouse Ligitech', 'CIMUNING', '2018-05-09 10:01:59', 17),
(31, 'CPU Intel Core i3 Ram4GB', 'CIMUNING', '2018-05-09 10:01:59', 17),
(32, 'TP-Link Wifi', 'CIMUNING', '2018-05-09 10:01:59', 17),
(33, 'Kursi Direktur', 'CIMUNING', '2018-05-09 10:01:59', 17),
(34, 'Kursi Cheetos', 'CIMUNING', '2018-05-09 10:01:59', 17),
(35, 'Kursi Tamu', 'CIMUNING', '2018-05-09 10:01:59', 17),
(36, 'Meja Tamu', 'CIMUNING', '2018-05-09 10:01:59', 17),
(37, 'Kursi Busa', 'CIMUNING', '2018-05-09 10:01:59', 17),
(38, 'Kursi Plastik', 'CIMUNING', '2018-05-09 10:01:59', 17),
(39, 'Meja Kantor ', 'CIMUNING', '2018-05-09 10:01:59', 17),
(40, 'Meja Rapat', 'CIMUNING', '2018-05-09 10:01:59', 17),
(41, 'Lemari Kantor', 'CIMUNING', '2018-05-09 10:01:59', 17),
(42, 'Lemari Display', 'CIMUNING', '2018-05-09 10:01:59', 17),
(43, '001-Pos Satpam', 'CIMUNING', '2018-05-09 10:01:59', 17),
(44, '002-Produksi', 'CIMUNING', '2018-05-09 10:01:59', 18),
(45, '003-Produksi', 'CIMUNING', '2018-05-09 10:01:59', 18),
(46, '004-Lab Atas', 'CIMUNING', '2018-05-09 10:01:59', 18),
(47, 'APAR Besar Produksi', 'CIMUNING', '2018-05-09 10:01:59', 20),
(48, 'APAR Kecil Produksi', 'CIMUNING', '2018-05-09 10:01:59', 20),
(49, 'APAR Kecil Lab Arrester', 'CIMUNING', '2018-05-09 10:01:59', 20),
(50, 'APAR Kecil Lab Atas', 'CIMUNING', '2018-05-09 10:01:59', 20),
(51, 'APAR Kecil Kantor', 'CIMUNING', '2018-05-09 10:01:59', 20),
(52, 'APAR Kecil Pos Satpam', 'CIMUNING', '2018-05-09 10:01:59', 20),
(53, 'Toilet Produksi', 'CIMUNING', '2018-05-09 10:01:59', 21),
(54, 'Toilet Kantor', 'CIMUNING', '2018-05-09 10:01:59', 21),
(55, 'Toilet Atas', 'CIMUNING', '2018-05-09 10:01:59', 21);

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_parent`
--

CREATE TABLE `inventaris_parent` (
  `INPA_ID` int(11) NOT NULL,
  `INPA_NAME` varchar(75) NOT NULL,
  `INPA_KETERANGAN` varchar(20) NOT NULL,
  `INPA_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventaris_parent`
--

INSERT INTO `inventaris_parent` (`INPA_ID`, `INPA_NAME`, `INPA_KETERANGAN`, `INPA_TIME`) VALUES
(1, 'Dekuma DKM-RA500 Rubber Injection', 'CIMUNING', '2018-05-09 10:01:34'),
(2, 'Welltech Injection Plastic Machine', 'CIMUNING', '2018-05-09 10:01:34'),
(3, 'Mesin Penggiling Rubber XK-230X630', 'CIMUNING', '2018-05-09 10:01:34'),
(4, 'Mesin Press Daylight Press', 'CIMUNING', '2018-05-09 10:01:34'),
(5, 'Mesin Uji Tarik YJN-L-50', 'CIMUNING', '2018-05-09 10:01:34'),
(6, 'Oven TS101A-3', 'CIMUNING', '2018-05-09 10:01:34'),
(7, 'Oven TS101A-2', 'CIMUNING', '2018-05-09 10:01:34'),
(8, 'Crimping and Press Machine CJX-250', 'CIMUNING', '2018-05-09 10:01:34'),
(9, 'Megger DLRO-200', 'CIMUNING', '2018-05-09 10:01:34'),
(10, 'Ling Hoo Colling Tower', 'CIMUNING', '2018-05-09 10:01:34'),
(11, 'Panther Kompressor', 'CIMUNING', '2018-05-09 10:01:34'),
(12, 'Kompressor Lab Arrester', 'CIMUNING', '2018-05-09 10:01:34'),
(13, 'Alat Uji Lab Arrester', 'CIMUNING', '2018-05-09 10:01:34'),
(14, 'Air Conditioner', 'CIMUNING', '2018-05-09 10:01:34'),
(15, 'Infocus Ruang Rapat', 'CIMUNING', '2018-05-09 10:01:34'),
(16, 'Telephone Ruang Manager', 'CIMUNING', '2018-05-09 10:01:34'),
(17, 'Perlengkapan Kantor', 'CIMUNING', '2018-05-09 10:01:34'),
(18, 'Kipas Angin', 'CIMUNING', '2018-05-09 10:01:34'),
(19, 'Televisi Pos Satpam', 'CIMUNING', '2018-05-09 10:01:34'),
(20, 'Alat Pemadam Kebakaran (APAR)', 'CIMUNING', '2018-05-09 10:01:34'),
(21, 'Toilet/WC', 'CIMUNING', '2018-05-09 10:01:34');

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
(3, 'PIPA'),
(4, 'AS');

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
  `MABA_MCBA_ID` int(11) NOT NULL,
  `MABA_RUAN_ID` int(11) NOT NULL
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

--
-- Dumping data for table `material_child_bawang`
--

INSERT INTO `material_child_bawang` (`MCBA_ID`, `MCBA_NAME`, `MCBA_MABA_TOTAL`, `MCBA_TIMESTAMP`, `MCBA_SATU_ID`, `MCBA_MPBA_ID`) VALUES
(1, 'SCW 25-35', 0, '2018-05-05 09:31:59', 7, 1),
(2, 'SCW 50-70', 0, '2018-05-05 09:32:09', 7, 1),
(3, 'Cagak SP', 0, '2018-05-05 09:32:24', 7, 1),
(4, 'PB', 0, '2018-05-05 09:32:39', 7, 1),
(5, 'TP', 0, '2018-05-05 09:32:49', 7, 1),
(6, 'Lidah SP', 0, '2018-05-05 09:33:12', 7, 1),
(7, 'SP', 0, '2018-05-05 09:34:13', 7, 1),
(8, 'LA', 0, '2018-05-05 09:34:28', 7, 1),
(9, 'ASC 70-150', 0, '2018-05-05 09:34:40', 7, 1),
(10, 'ASC 150-240', 0, '2018-05-05 09:34:48', 7, 1),
(11, 'Lidah ASC 70-150', 0, '2018-05-05 09:34:59', 7, 1),
(12, 'Lidah ASC 150-240', 0, '2018-05-05 09:35:12', 7, 1),
(13, 'Insert 25-35', 0, '2018-05-05 09:35:29', 2, 2),
(14, 'Insert 50-70', 0, '2018-05-05 09:35:38', 2, 2),
(15, 'MB M6x25 SP ', 0, '2018-05-05 09:35:50', 2, 2),
(16, 'Kawat Slink', 0, '2018-05-05 09:36:14', 2, 2),
(17, 'Kawat Slink dia 4,0', 0, '2018-05-05 09:36:30', 4, 2),
(18, 'Link 25 x 25', 0, '2018-05-05 09:36:41', 2, 2),
(19, 'Stopping Buckle', 0, '2018-05-05 09:36:49', 2, 2),
(20, 'Plastik Strap', 0, '2018-05-05 09:37:06', 2, 2),
(21, 'PKB Cagak 5/16 x 1\'\'', 0, '2018-05-05 09:37:13', 2, 2),
(22, 'PKB Cagak 5/16 x 1 1/4 Hitam', 0, '2018-05-05 09:37:47', 2, 2),
(23, 'PKB  3/8 x 1 1/2  (bor Samping)', 0, '2018-05-05 09:37:54', 2, 2),
(24, 'PKB ASC 70-150 ', 0, '2018-05-05 09:38:02', 2, 2),
(25, 'PKB ASC 150-240', 0, '2018-05-05 09:38:13', 2, 2),
(26, 'PKB Kawat Slink 3/8 x 1 1/4', 0, '2018-05-05 09:38:26', 2, 2),
(27, 'Spit SP 1/8 X 1 1/4', 0, '2018-05-05 09:38:35', 2, 2),
(28, 'Spit Besar 1/8 x 1/2', 0, '2018-05-05 09:38:48', 2, 2),
(29, 'Stainless 1,5', 0, '2018-05-05 09:38:56', 2, 2),
(30, 'Turn Buckle M 10', 0, '2018-05-05 09:39:04', 2, 2),
(31, 'Turn Buckle M 12', 0, '2018-05-05 09:39:13', 2, 2),
(32, 'Turn Buckle M16', 0, '2018-05-05 09:39:21', 2, 2),
(33, 'U-BOLD 150-240 TM', 0, '2018-05-05 09:39:30', 2, 2),
(34, 'U-BOLD 70-150 TM', 0, '2018-05-05 09:39:37', 2, 2),
(35, 'Cable Clamp 16 - 16 (3008)', 0, '2018-05-05 09:40:01', 3, 3),
(36, 'Cable Clamp 16 - 70', 0, '2018-05-05 09:40:27', 3, 3),
(37, 'Cable Clamp 35 - 16 (3012)', 0, '2018-05-05 09:40:36', 3, 3),
(38, 'Cable Clamp 35 - 35 (3010)', 0, '2018-05-05 09:40:43', 3, 3),
(39, 'Cable Clamp 35 - 50 (3046)', 0, '2018-05-05 09:40:54', 3, 3),
(40, 'Cable Clamp 70 - 35 (3009)', 0, '2018-05-05 09:41:06', 3, 3),
(41, 'Cable Clamp 70 - 70 (3011)', 0, '2018-05-05 09:41:14', 3, 3),
(42, 'Cable Clamp 95 - 16 (3052)', 0, '2018-05-05 09:41:21', 3, 3),
(43, 'Cable Clamp 95 - 35 (3053)', 0, '2018-05-05 09:41:37', 3, 3),
(44, 'Cable Clamp 95 - 70 (3048)', 0, '2018-05-05 09:41:46', 3, 3),
(45, 'Cable Clamp 70 - 150 (3013)', 0, '2018-05-05 09:41:53', 3, 3),
(46, 'Cable Clamp 150 - 150 (3014)', 0, '2018-05-05 09:42:08', 3, 3),
(47, 'Cable Clamp 150 - 240 (3016)', 0, '2018-05-05 09:42:16', 3, 3),
(48, 'Cable Clamp 240 - 240  (3015)', 0, '2018-05-05 09:42:29', 3, 3),
(49, 'Cable Clamp KJ 50 - 70 / 50 - 70 (3047)', 0, '2018-05-05 09:44:08', 3, 3),
(50, 'Cable Clamp KJ 70-95/ 70-95 (3054)', 0, '2018-05-05 09:44:17', 3, 3),
(51, 'Cable Clamp KJ 95-120 / 95-120 (3049)', 0, '2018-05-05 09:44:25', 3, 3),
(52, 'Cable Clamp KJ 95-120 / 95-120 (3055)', 0, '2018-05-05 09:44:33', 3, 3),
(53, 'Cable Clamp KP 35 - 50  / 35-50 (3056)', 0, '2018-05-05 09:44:44', 3, 3),
(54, 'Cable Clamp KP 35 - 50  / 10 - 16 (3050)', 0, '2018-05-05 09:44:52', 3, 3),
(55, 'LVTC 16 - 16', 0, '2018-05-05 09:45:01', 3, 3),
(56, 'AL Ø 16 PIPA', 0, '2018-05-05 09:46:21', 3, 4),
(57, 'AL Ø 18 PIPA', 0, '2018-05-05 09:46:29', 3, 4),
(58, 'AL Ø 20 PIPA', 0, '2018-05-05 09:47:15', 3, 4),
(59, 'AL Ø 22 PIPA', 0, '2018-05-05 09:46:54', 3, 4),
(60, 'AL Ø 24 PIPA', 0, '2018-05-05 09:47:33', 3, 4),
(61, 'AL Ø 26 PIPA', 0, '2018-05-05 09:47:41', 3, 4),
(62, 'AL Ø 30 PIPA', 0, '2018-05-05 09:47:50', 3, 4),
(63, 'AL Ø 16 AS', 0, '2018-05-05 09:47:58', 3, 4),
(64, 'AL Ø 18 AS', 0, '2018-05-05 09:48:05', 3, 4),
(65, 'AL Ø 20 AS', 0, '2018-05-05 09:48:12', 3, 4),
(66, 'AL Ø 21 AS', 0, '2018-05-05 09:48:20', 3, 4),
(67, 'AL Ø 22 AS', 0, '2018-05-05 09:52:49', 3, 4),
(68, 'AL Ø 25 AS', 0, '2018-05-05 09:48:35', 3, 4),
(69, 'AL Ø 27 AS', 0, '2018-05-05 09:48:42', 3, 4),
(70, 'AL Ø 30 AS', 0, '2018-05-05 09:49:05', 3, 4),
(71, 'AL Ø 32 AS', 0, '2018-05-05 09:49:14', 3, 4),
(72, 'AL Ø 24 AS', 0, '2018-05-05 09:50:59', 3, 0),
(73, 'CU Ø 13 X 1,5', 0, '2018-05-05 09:51:25', 3, 4),
(74, 'CU Ø 15 X 1,5', 0, '2018-05-05 09:51:36', 3, 4),
(75, 'CU Ø 18 X 2', 0, '2018-05-05 09:53:24', 3, 4),
(76, 'CU Ø 20 X 2,5', 0, '2018-05-05 09:51:51', 3, 4),
(77, 'CU Ø 22 X 2,5', 0, '2018-05-05 09:52:00', 3, 4),
(78, 'CU Ø 24 X 2', 0, '2018-05-05 09:52:10', 3, 4),
(79, 'CU Ø 26 X 2,5', 0, '2018-05-05 09:52:18', 3, 4),
(80, 'CU Ø 30 X 3', 0, '2018-05-05 09:52:26', 3, 4),
(81, 'CU Ø 14', 0, '2018-05-05 09:53:57', 3, 4),
(82, 'CU Ø 16', 0, '2018-05-05 09:54:09', 3, 4),
(83, 'CU Ø 18', 0, '2018-05-05 09:54:17', 3, 4),
(84, 'CU Ø 20 ', 0, '2018-05-05 09:54:25', 3, 4),
(85, 'CU Ø 22', 0, '2018-05-05 09:54:33', 3, 4),
(86, 'CU Ø 25', 0, '2018-05-05 09:54:40', 3, 4),
(87, 'CU Ø 27', 0, '2018-05-05 09:54:49', 3, 4),
(88, 'CU Ø 32', 0, '2018-05-05 09:54:57', 3, 4),
(89, 'Baut Apg 25 - 35', 0, '2018-05-05 09:56:09', 2, 5),
(90, 'Baut Apg 70 - 150', 0, '2018-05-05 09:56:18', 2, 5),
(91, 'Baut Line Post', 0, '2018-05-05 09:56:25', 2, 5),
(92, 'Baut Kotak Ok', 0, '2018-05-05 09:56:33', 2, 5),
(93, 'Ball Machine 3/8 X 30 Cm', 0, '2018-05-05 09:57:17', 2, 5),
(94, 'Ball Machine 5/8 X 6', 0, '2018-05-05 09:58:10', 2, 5),
(95, 'Ball Machine 5/8 X 10', 0, '2018-05-05 09:58:35', 2, 5),
(96, 'Ball Clevice', 0, '2018-05-05 09:57:43', 2, 5),
(97, 'Baut 5/8 X 3,5\"', 0, '2018-05-05 09:58:53', 2, 5),
(98, 'Baut 5/8 X 4,5\"', 0, '2018-05-05 09:59:01', 2, 5),
(99, 'Baut M 8', 0, '2018-05-05 09:59:09', 2, 5),
(100, 'Mur M 6', 0, '2018-05-05 09:59:18', 2, 5),
(101, 'Mur M 8', 0, '2018-05-05 09:59:29', 2, 5),
(102, 'Mur M 10', 0, '2018-05-05 09:59:38', 2, 5),
(103, 'Mur M 14', 0, '2018-05-05 09:59:47', 2, 5),
(104, 'Mur M 14 Hitam', 0, '2018-05-05 10:00:02', 2, 5),
(105, 'Mur M 16', 0, '2018-05-05 10:00:11', 2, 5),
(106, 'Mur Baut  8', 0, '2018-05-05 10:00:54', 2, 5),
(107, 'Mur Baut 3/8 X 12\"', 0, '2018-05-05 10:01:03', 2, 5),
(108, 'Mur Baut 3/8 X 4,5\"', 0, '2018-05-05 10:01:12', 2, 5),
(109, 'Mur Baut 5/8 X 3\"', 0, '2018-05-05 10:01:24', 2, 5),
(110, 'Double Arming 5/8 X 30 Cm', 0, '2018-05-05 10:01:32', 2, 5),
(111, 'Double Arming  35 Cm', 0, '2018-05-05 10:01:38', 2, 5),
(112, 'Double Arming  5/8 X 1 M', 0, '2018-05-05 10:01:48', 2, 5),
(113, 'Besi Double Siku', 0, '2018-05-05 10:02:28', 3, 6),
(114, 'Besi Siku 44 Cm', 0, '2018-05-05 10:02:35', 3, 6),
(115, 'Besi Siku 62 Cm', 0, '2018-05-05 10:02:42', 3, 6),
(116, 'Besi Siku 81 Cm', 0, '2018-05-05 10:03:42', 3, 6),
(117, 'Besi Siku 91 Cm', 0, '2018-05-05 10:02:56', 3, 6),
(118, 'Besi Siku 97 Cm', 0, '2018-05-05 10:03:03', 3, 6),
(119, 'Besi Siku 130 Cm', 0, '2018-05-05 10:03:10', 3, 6),
(120, 'Besi Siku 183 Cm', 0, '2018-05-05 10:03:18', 3, 6),
(121, 'Besi Siku 197 Cm', 0, '2018-05-05 10:03:26', 3, 6),
(122, 'Besi UNP 6 x 40 Cm', 0, '2018-05-05 10:05:09', 3, 6),
(123, 'Besi UNP 6 x 183 Cm', 0, '2018-05-05 10:04:52', 3, 6),
(124, 'Besi UNP 8 x 40 Cm ', 0, '2018-05-05 10:05:45', 3, 6),
(125, 'Besi UNP 8 x 240 Cm ', 0, '2018-05-05 10:05:53', 3, 6),
(126, 'Besi UNP 10 x 120 cm', 0, '2018-05-05 10:06:00', 3, 6),
(127, 'Besi UNP 10 x 142 cm', 0, '2018-05-05 10:06:09', 3, 6),
(128, 'Besi UNP 10 x 189 cm', 0, '2018-05-05 10:06:18', 3, 6),
(129, 'Besi UNP 10 x 200 cm', 0, '2018-05-05 10:06:29', 3, 6),
(130, 'Besi UNP 10 x 230 cm', 0, '2018-05-05 10:06:37', 3, 6),
(131, 'Besi UNP 10 X 60', 0, '2018-05-05 10:07:05', 3, 6),
(132, 'Besi UNP 10 x  235 cm', 0, '2018-05-05 10:07:23', 3, 6),
(133, 'Besi UNP 10 x 180 cm (Traves)', 0, '2018-05-05 10:07:30', 3, 6),
(134, 'Binding Wire 4 mm', 0, '2018-05-05 10:07:48', 6, 6),
(135, 'Tiang Espanding 5/8', 0, '2018-05-05 10:07:55', 3, 6),
(136, 'Tiang Espanding 3/4', 0, '2018-05-05 10:08:03', 3, 6),
(137, 'Ring Per M 8', 0, '2018-05-05 10:12:25', 2, 7),
(138, 'Ring Per M 10', 0, '2018-05-05 10:12:32', 2, 7),
(139, 'Ring Per M 12 ', 0, '2018-05-05 10:12:40', 2, 7),
(140, 'Ring Per M 14', 0, '2018-05-05 10:12:48', 2, 7),
(141, 'Ring Per M 16', 0, '2018-05-05 10:13:52', 2, 7),
(142, 'Ring Per 5/8 M 16 Hitam ', 0, '2018-05-05 10:14:04', 2, 7),
(143, 'Ring Per M 20', 0, '2018-05-05 10:14:12', 2, 7),
(144, 'Ring Plat M 8 ', 0, '2018-05-05 10:14:29', 2, 8),
(145, 'Ring Plat M 10', 0, '2018-05-05 10:14:37', 2, 8),
(146, 'Ring Plat M 12 ', 0, '2018-05-05 10:14:46', 2, 8),
(147, 'Ring Plat M 14 ', 0, '2018-05-05 10:14:54', 2, 8),
(148, 'Ring Plat M 16', 0, '2018-05-05 10:15:02', 2, 8),
(149, 'Ring Plat 5/8 M 16', 0, '2018-05-05 10:15:11', 2, 8),
(150, 'Fuse Tube', 0, '2018-05-05 10:15:42', 2, 9),
(151, 'Fuse Link Tube', 0, '2018-05-05 10:15:51', 2, 9),
(152, 'Fuse Link Nut', 0, '2018-05-05 10:16:02', 2, 9),
(153, 'Fuse Link Ring', 0, '2018-05-05 10:16:10', 2, 9),
(154, 'Fuse Link Head', 0, '2018-05-05 10:16:19', 2, 9),
(155, 'Jarum 2 A', 0, '2018-05-05 10:16:27', 2, 9),
(156, 'Jarum 4 A', 0, '2018-05-05 10:16:36', 2, 9),
(157, 'Jarum 5 A', 0, '2018-05-05 10:16:44', 2, 9),
(158, 'Jarum  6 A', 0, '2018-05-05 10:16:52', 2, 9),
(159, 'Jarum 10 A', 0, '2018-05-05 10:17:02', 2, 9),
(160, 'Jarum 12 A', 0, '2018-05-05 10:17:09', 2, 9),
(161, 'Jarum 15 A', 0, '2018-05-05 10:17:17', 2, 9),
(162, 'Jarum  20 A', 0, '2018-05-05 10:17:24', 2, 8),
(163, 'Jarum 25 A', 0, '2018-05-05 10:17:32', 2, 9),
(164, 'Insert SWC', 0, '2018-05-05 10:18:02', 6, 10),
(165, 'Insert SWC', 0, '2018-05-05 10:18:13', 7, 10),
(166, 'Body SWC', 0, '2018-05-05 10:19:22', 6, 10),
(167, 'Body SWC', 0, '2018-05-05 10:19:34', 7, 9),
(168, 'Kawat SWC Roll ', 0, '2018-05-05 10:19:44', 4, 10),
(169, 'Kawat SWC', 0, '2018-05-05 10:19:52', 2, 10),
(170, 'Bodi Nilon', 0, '2018-05-05 10:20:03', 6, 10),
(171, 'Kabel TIC 3 X 35 + 25', 0, '2018-05-05 10:20:19', 4, 11),
(172, 'Kabel TIC 3 x 95 + 70', 0, '2018-05-05 10:21:27', 4, 11),
(173, 'Kabel TIC 3 X 120 + 95', 0, '2018-05-05 10:21:35', 4, 10),
(174, 'Cincin Arde Kuningan', 0, '2018-05-05 10:22:23', 2, 12),
(175, 'Cincin Arde Tembaga', 0, '2018-05-05 10:22:32', 2, 12),
(176, 'Cross By 3/8', 0, '2018-05-05 10:23:09', 2, 12),
(177, 'Cross By 16', 0, '2018-05-05 10:22:53', 2, 12),
(178, 'Cross Arm Kecil', 0, '2018-05-05 10:24:29', 2, 12),
(179, 'Cross Arm Besar', 0, '2018-05-05 10:24:40', 2, 12),
(180, 'Kotak Ok Kecil', 0, '2018-05-05 10:25:09', 2, 12),
(181, 'Paralon', 0, '2018-05-05 10:24:55', 2, 12),
(182, 'Preform 16', 0, '2018-05-05 10:25:19', 2, 12),
(183, 'Preform 22', 0, '2018-05-05 10:25:30', 2, 12),
(184, 'Preform 70', 0, '2018-05-05 10:25:40', 2, 12),
(185, 'Link 25 X 50', 0, '2018-05-05 10:25:48', 2, 12),
(186, 'Timble 16 Kecil', 0, '2018-05-05 10:25:57', 2, 12),
(187, 'Timble 22 Sedang', 0, '2018-05-05 10:26:06', 2, 12),
(188, 'Timble 70 Besar', 0, '2018-05-05 10:26:14', 2, 12),
(189, 'Karton Box 400 x 260 x 165', 0, '2018-05-05 10:26:25', 2, 12),
(190, 'Karton Box 430 x 300 x 270', 0, '2018-05-05 10:26:33', 2, 12),
(191, 'Karton Box 570 x 300 x 310', 0, '2018-05-05 10:26:42', 2, 12);

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
  `MACI_MCCI_ID` int(11) NOT NULL,
  `MACI_RUAN_ID` int(11) NOT NULL
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

--
-- Dumping data for table `material_parent_bawang`
--

INSERT INTO `material_parent_bawang` (`MPBA_ID`, `MPBA_NAME`, `MPBA_TIMESTAMP`) VALUES
(1, 'PRODUKSI ALUMUNIUM', '2018-05-05 09:29:06'),
(2, 'MATERIAL ASSEMBLY', '2018-05-05 09:29:14'),
(3, 'CCO BATANGAN', '2018-05-05 09:29:25'),
(4, 'BAHAN SEPATU KABEL', '2018-05-05 09:29:33'),
(5, 'BAUT & MUR', '2018-05-05 09:29:43'),
(6, 'BESI BESI ', '2018-05-05 09:29:59'),
(7, 'RING PER', '2018-05-05 09:30:13'),
(8, 'RING PLAT', '2018-05-05 09:30:35'),
(9, 'MATERIAL FUSE LINK', '2018-05-05 09:31:02'),
(10, 'MATERIAL SWC', '2018-05-05 09:31:17'),
(11, 'KABEL TIC', '2018-05-05 09:31:24'),
(12, 'ACCESSORIES', '2018-05-05 09:31:32');

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
(0, 'SUDO', 'SUDO', 'SUDO', 12345, 'L', '2018-05-04 10:26:59', 1);

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
(5, 'UNIT'),
(6, 'KG'),
(7, 'PCS'),
(8, 'KRG');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USER_ID` int(11) NOT NULL,
  `USER_NAME` varchar(50) NOT NULL,
  `USER_PASSWORD` varchar(50) NOT NULL,
  `USER_PICTURE` text NOT NULL,
  `USER_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `USER_LEVE_ID` int(11) NOT NULL,
  `USER_DAPE_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `USER_NAME`, `USER_PASSWORD`, `USER_PICTURE`, `USER_TIMESTAMP`, `USER_LEVE_ID`, `USER_DAPE_ID`) VALUES
(1, 'SUDO', '28a4437b86f15b3e4204252dd75327fe', '', '2018-04-17 19:18:03', 5, 0);

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
-- Indexes for table `barang_cimuning_child`
--
ALTER TABLE `barang_cimuning_child`
  ADD PRIMARY KEY (`BACC_ID`);

--
-- Indexes for table `barang_cimuning_parent`
--
ALTER TABLE `barang_cimuning_parent`
  ADD PRIMARY KEY (`BACP_ID`);

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
-- Indexes for table `material_parent_cimuning`
--
ALTER TABLE `material_parent_cimuning`
  ADD PRIMARY KEY (`MPCI_ID`);

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
  MODIFY `BACH_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `barang_cimuning_child`
--
ALTER TABLE `barang_cimuning_child`
  MODIFY `BACC_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barang_cimuning_parent`
--
ALTER TABLE `barang_cimuning_parent`
  MODIFY `BACP_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barang_parent`
--
ALTER TABLE `barang_parent`
  MODIFY `BAPA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `gudang_bawang`
--
ALTER TABLE `gudang_bawang`
  MODIFY `GUBA_ID` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `INCH_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `inventaris_parent`
--
ALTER TABLE `inventaris_parent`
  MODIFY `INPA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `KATE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT for table `material_bawang`
--
ALTER TABLE `material_bawang`
  MODIFY `MABA_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `material_child_bawang`
--
ALTER TABLE `material_child_bawang`
  MODIFY `MCBA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `material_child_cimuning`
--
ALTER TABLE `material_child_cimuning`
  MODIFY `MCCI_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `material_cimuning`
--
ALTER TABLE `material_cimuning`
  MODIFY `MACI_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `material_parent_bawang`
--
ALTER TABLE `material_parent_bawang`
  MODIFY `MPBA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `material_parent_cimuning`
--
ALTER TABLE `material_parent_cimuning`
  MODIFY `MPCI_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `PEGA_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `RUAN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `SATU_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
