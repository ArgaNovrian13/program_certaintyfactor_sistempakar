-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 12 Jul 2024 pada 09.41
-- Versi server: 8.0.30
-- Versi PHP: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `certainty_factor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_nama` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sandi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_nama`, `nama`, `email`, `sandi`) VALUES
(4, 'arga', 'arga@gmail.com', '$2y$10$OcxjhLIZsWMPI3YTRo1uVuIehzdQb1OgBbjyCznxhaYlidFVZH.WG'),
(5, 'arga novrian', 'arganovrian@gmail.com', '$2y$10$c.JLZzuNe5cLBGRtHsj3PesbokocCJfcpnj6yDX7dtjXr5xKviYy2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aturan`
--

CREATE TABLE `aturan` (
  `id_aturan` int NOT NULL,
  `id_penyakit` int DEFAULT NULL,
  `id_gejala` int DEFAULT NULL,
  `certainty_factor` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `aturan`
--

INSERT INTO `aturan` (`id_aturan`, `id_penyakit`, `id_gejala`, `certainty_factor`) VALUES
(1, 1, 1, 0.70),
(2, 1, 2, 0.70),
(3, 1, 3, 0.60),
(4, 2, 1, 0.80),
(5, 2, 2, 0.80),
(6, 2, 3, 0.80),
(7, 2, 4, 0.70),
(8, 3, 1, 0.60),
(9, 3, 5, 0.60),
(10, 3, 2, 0.40),
(11, 4, 1, 0.90),
(12, 4, 9, 0.90),
(13, 4, 8, 0.70),
(14, 5, 1, 0.80),
(15, 5, 6, 0.80),
(16, 5, 7, 0.60),
(17, 5, 8, 0.60),
(18, 6, 1, 0.85),
(19, 6, 7, 0.85),
(20, 6, 9, 0.85),
(21, 7, 1, 0.90),
(22, 7, 7, 0.90),
(23, 7, 8, 0.90),
(24, 7, 6, 0.75),
(25, 7, 2, 0.75);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pasien`
--

CREATE TABLE `data_pasien` (
  `id_data_pasien` int NOT NULL,
  `id_pasien` int DEFAULT NULL,
  `id_gejala` int DEFAULT NULL,
  `id_penyakit` int DEFAULT NULL,
  `certainty_factor` decimal(5,2) DEFAULT NULL,
  `waktu_pemeriksaan` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `data_pasien`
--

INSERT INTO `data_pasien` (`id_data_pasien`, `id_pasien`, `id_gejala`, `id_penyakit`, `certainty_factor`, `waktu_pemeriksaan`) VALUES
(1, 84, 6, 2, 0.94, '2024-06-11 07:11:30'),
(2, 88, 6, 7, 0.98, '2024-06-13 02:20:00'),
(3, 96, 7, 7, 0.99, '2024-06-18 14:55:50'),
(4, 96, 7, 7, 0.99, '2024-06-18 14:55:50'),
(5, 97, 6, 7, 0.98, '2024-06-21 04:53:00'),
(6, 98, 8, 7, 0.99, '2024-06-27 05:37:19'),
(7, 99, 6, 7, 0.94, '2024-06-27 08:29:08'),
(8, 100, 6, 2, 0.99, '2024-06-28 04:14:54'),
(9, 101, 6, 2, 0.99, '2024-06-28 04:16:12'),
(10, 102, 7, 7, 0.98, '2024-06-28 04:18:48'),
(11, 103, 8, 7, 1.00, '2024-06-28 04:21:12'),
(12, 104, 9, 7, 0.99, '2024-06-28 04:50:34'),
(13, 105, 9, 2, 0.94, '2024-07-01 01:00:32'),
(14, 106, 9, 4, 0.99, '2024-07-01 02:05:11'),
(15, 107, 9, 2, 0.94, '2024-07-01 05:32:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diagnosa_pasien`
--

CREATE TABLE `diagnosa_pasien` (
  `id_diagnosa` int NOT NULL,
  `id_pasien` int DEFAULT NULL,
  `id_gejala` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `diagnosa_pasien`
--

INSERT INTO `diagnosa_pasien` (`id_diagnosa`, `id_pasien`, `id_gejala`) VALUES
(1, 1, 3),
(2, 1, 3),
(3, 1, 3),
(4, 1, 3),
(5, 1, 3),
(6, 1, 3),
(7, 1, 3),
(8, 1, 3),
(9, 1, 3),
(10, 1, 3),
(11, 1, 3),
(12, 1, 3),
(13, 1, 3),
(14, 1, 3),
(15, 1, 3),
(16, 1, 3),
(17, 1, 3),
(18, 1, 3),
(19, 1, 3),
(20, 1, 3),
(21, 1, 3),
(22, 1, 3),
(23, 1, 3),
(24, 1, 3),
(25, 1, 3),
(26, 1, 3),
(27, 1, 3),
(28, 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int NOT NULL,
  `nama_gejala` varchar(255) NOT NULL,
  `kode_gejala` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `nama_gejala`, `kode_gejala`) VALUES
(1, 'Demam tinggi', 'G1'),
(2, 'Batuk berdahak', 'G2'),
(3, 'Sesak napas', 'G3'),
(4, 'Nyeri dada', 'G4'),
(5, 'Sakit tenggorokan', 'G5'),
(6, 'Sakit kepala', 'G6'),
(7, 'Mual', 'G7'),
(8, 'Nyeri otot', 'G8'),
(9, 'Ruam kulit', 'G9');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala_pasien`
--

CREATE TABLE `gejala_pasien` (
  `id_gejala_pasien` int NOT NULL,
  `id_gejala` int DEFAULT NULL,
  `id_pasien` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `gejala_pasien`
--

INSERT INTO `gejala_pasien` (`id_gejala_pasien`, `id_gejala`, `id_pasien`) VALUES
(1, 1, 3),
(2, 5, 3),
(3, 2, 4),
(4, 5, 4),
(5, 1, 6),
(6, 3, 6),
(7, 6, 6),
(8, 1, 7),
(9, 4, 7),
(10, 7, 7),
(11, 1, 8),
(12, 4, 8),
(13, 7, 8),
(14, 1, 8),
(15, 4, 8),
(16, 7, 8),
(17, 1, 8),
(18, 4, 8),
(19, 7, 8),
(20, 1, 8),
(21, 4, 8),
(22, 7, 8),
(23, 1, 8),
(24, 2, 8),
(25, 3, 8),
(26, 4, 8),
(27, 7, 8),
(28, 1, 9),
(29, 5, 9),
(30, 6, 9),
(31, 1, 9),
(32, 5, 9),
(33, 6, 9),
(34, 1, 9),
(35, 4, 9),
(36, 6, 9),
(37, 1, 9),
(38, 4, 9),
(39, 6, 9),
(40, 1, 10),
(41, 6, 10),
(42, 7, 10),
(43, 2, 10),
(44, 5, 10),
(45, 8, 10),
(46, 1, 10),
(47, 5, 10),
(48, 8, 10),
(49, 3, 10),
(50, 5, 10),
(51, 1, 10),
(52, 5, 10),
(53, 8, 10),
(54, 1, 10),
(55, 4, 10),
(56, 8, 10),
(57, 1, 10),
(58, 5, 10),
(59, 8, 10),
(60, 1, 10),
(61, 5, 10),
(62, 8, 10),
(63, 1, 10),
(64, 5, 10),
(65, 8, 10),
(66, 1, 13),
(67, 4, 13),
(68, 7, 13),
(69, 1, 13),
(70, 2, 13),
(71, 4, 13),
(72, 6, 13),
(73, 7, 13),
(74, 1, 13),
(75, 2, 13),
(76, 4, 13),
(77, 6, 13),
(78, 7, 13),
(79, 1, 14),
(80, 5, 14),
(81, 9, 14),
(82, 1, 15),
(83, 4, 15),
(84, 5, 15),
(85, 8, 15),
(86, 9, 15),
(87, 1, 16),
(88, 4, 16),
(89, 5, 16),
(90, 7, 16),
(91, 1, 17),
(92, 5, 17),
(93, 1, 17),
(94, 6, 17),
(95, 1, 18),
(96, 7, 18),
(97, 9, 18),
(98, 1, 19),
(99, 4, 19),
(100, 7, 19),
(101, 1, 20),
(102, 3, 20),
(103, 5, 20),
(104, 7, 20),
(105, 9, 20),
(106, 1, 21),
(107, 4, 21),
(108, 5, 21),
(109, 6, 21),
(110, 1, 22),
(111, 2, 22),
(112, 3, 22),
(113, 4, 22),
(114, 5, 22),
(115, 6, 22),
(116, 7, 22),
(117, 8, 22),
(118, 9, 22),
(119, 1, 23),
(120, 4, 23),
(121, 1, 24),
(122, 5, 24),
(123, 7, 24),
(124, 1, 25),
(125, 4, 25),
(126, 7, 25),
(127, 1, 26),
(128, 2, 27),
(129, 3, 27),
(130, 5, 27),
(131, 1, 28),
(132, 7, 28),
(133, 1, 29),
(134, 5, 29),
(135, 9, 29),
(136, 4, 30),
(137, 2, 31),
(138, 3, 31),
(139, 5, 31),
(140, 7, 31),
(141, 9, 31),
(142, 1, 32),
(143, 2, 32),
(144, 4, 32),
(145, 6, 32),
(146, 1, 33),
(147, 5, 33),
(148, 9, 33),
(149, 1, 34),
(150, 3, 34),
(151, 5, 34),
(152, 1, 35),
(153, 4, 35),
(154, 8, 35),
(155, 1, 35),
(156, 4, 35),
(157, 8, 35),
(158, 1, 36),
(159, 5, 36),
(160, 9, 36),
(161, 1, 37),
(162, 5, 37),
(163, 8, 37),
(164, 1, 38),
(165, 4, 38),
(166, 8, 38),
(167, 1, 38),
(168, 4, 38),
(169, 8, 38),
(170, 1, 38),
(171, 4, 38),
(172, 8, 38),
(173, 1, 39),
(174, 4, 39),
(175, 7, 39),
(176, 1, 40),
(177, 5, 40),
(178, 9, 40),
(179, 1, 40),
(180, 3, 40),
(181, 6, 40),
(182, 1, 40),
(183, 3, 40),
(184, 6, 40),
(185, 1, 40),
(186, 3, 40),
(187, 6, 40),
(188, 1, 41),
(189, 4, 41),
(190, 7, 41),
(191, 1, 42),
(192, 4, 42),
(193, 6, 42),
(194, 1, 42),
(195, 4, 42),
(196, 6, 42),
(197, 1, 42),
(198, 4, 42),
(199, 6, 42),
(200, 1, 43),
(201, 4, 43),
(202, 7, 43),
(203, 1, 43),
(204, 4, 43),
(205, 7, 43),
(206, 1, 43),
(207, 4, 43),
(208, 7, 43),
(209, 1, 43),
(210, 4, 43),
(211, 7, 43),
(212, 1, 44),
(213, 4, 44),
(214, 7, 44),
(215, 1, 45),
(216, 4, 45),
(217, 8, 45),
(218, 1, 46),
(219, 2, 46),
(220, 3, 46),
(221, 5, 46),
(222, 8, 46),
(223, 1, 47),
(224, 9, 47),
(225, 3, 48),
(226, 5, 48),
(227, 6, 48),
(228, 9, 48),
(229, 1, 49),
(230, 2, 49),
(231, 3, 49),
(232, 5, 49),
(233, 6, 49),
(234, 9, 49),
(235, 1, 50),
(236, 4, 50),
(237, 5, 50),
(238, 8, 50),
(239, 9, 50),
(240, 1, 51),
(241, 5, 51),
(242, 6, 51),
(243, 8, 51),
(244, 2, 52),
(245, 6, 52),
(246, 1, 53),
(247, 3, 53),
(248, 1, 54),
(249, 4, 54),
(250, 6, 54),
(251, 9, 54),
(252, 1, 55),
(253, 3, 55),
(254, 7, 55),
(255, 1, 56),
(256, 5, 56),
(257, 8, 56),
(258, 1, 57),
(259, 5, 57),
(260, 6, 57),
(261, 3, 58),
(262, 5, 58),
(263, 7, 58),
(264, 9, 58),
(265, 1, 59),
(266, 2, 59),
(267, 3, 59),
(268, 4, 59),
(269, 6, 59),
(270, 7, 59),
(271, 1, 60),
(272, 5, 60),
(273, 8, 60),
(274, 1, 61),
(275, 4, 61),
(276, 6, 61),
(277, 9, 61),
(278, 1, 62),
(279, 5, 62),
(280, 9, 62),
(281, 1, 63),
(282, 3, 63),
(283, 6, 63),
(284, 1, 64),
(285, 3, 64),
(286, 6, 64),
(287, 9, 64),
(288, 1, 65),
(289, 5, 65),
(290, 8, 65),
(291, 1, 66),
(292, 2, 66),
(293, 4, 66),
(294, 5, 66),
(295, 7, 66),
(296, 7, 67),
(297, 9, 67),
(298, 3, 68),
(299, 7, 68),
(300, 4, 69),
(301, 6, 69),
(302, 8, 69),
(303, 2, 70),
(304, 3, 70),
(305, 4, 70),
(306, 1, 71),
(307, 5, 71),
(308, 7, 71),
(309, 9, 71),
(310, 3, 72),
(311, 5, 72),
(312, 8, 72),
(313, 2, 73),
(314, 6, 73),
(315, 8, 73),
(316, 2, 74),
(317, 4, 74),
(318, 6, 74),
(319, 8, 74),
(320, 3, 75),
(321, 9, 75),
(322, 1, 76),
(323, 4, 76),
(324, 6, 76),
(325, 7, 76),
(326, 9, 76),
(327, 2, 77),
(328, 3, 77),
(329, 6, 77),
(330, 2, 78),
(331, 3, 78),
(332, 5, 79),
(333, 7, 79),
(334, 1, 80),
(335, 6, 80),
(336, 9, 80),
(337, 1, 81),
(338, 4, 81),
(339, 6, 81),
(340, 1, 81),
(341, 4, 81),
(342, 6, 81),
(343, 2, 82),
(344, 4, 82),
(345, 6, 82),
(346, 7, 82),
(347, 9, 82),
(348, 2, 83),
(349, 3, 83),
(350, 6, 83),
(351, 9, 83),
(352, 2, 84),
(353, 4, 84),
(354, 6, 84),
(355, 1, 88),
(356, 6, 88),
(357, 1, 91),
(358, 6, 91),
(359, 1, 91),
(360, 6, 91),
(361, 4, 91),
(362, 6, 91),
(363, 4, 91),
(364, 6, 91),
(365, 3, 91),
(366, 6, 91),
(367, 2, 92),
(368, 6, 92),
(369, 2, 92),
(370, 6, 92),
(371, 2, 92),
(372, 6, 92),
(373, 2, 92),
(374, 6, 92),
(375, 2, 92),
(376, 6, 92),
(377, 2, 92),
(378, 6, 92),
(379, 2, 92),
(380, 6, 92),
(381, 2, 92),
(382, 6, 92),
(383, 2, 92),
(384, 6, 92),
(385, 2, 92),
(386, 6, 92),
(387, 1, 93),
(388, 4, 93),
(389, 7, 93),
(390, 2, 94),
(391, 5, 94),
(392, 1, 95),
(393, 5, 95),
(394, 7, 95),
(395, 1, 96),
(396, 4, 96),
(397, 7, 96),
(398, 1, 97),
(399, 3, 97),
(400, 6, 97),
(401, 1, 98),
(402, 5, 98),
(403, 8, 98),
(404, 2, 99),
(405, 5, 99),
(406, 6, 99),
(407, 2, 100),
(408, 3, 100),
(409, 4, 100),
(410, 5, 100),
(411, 6, 100),
(412, 2, 101),
(413, 3, 101),
(414, 4, 101),
(415, 5, 101),
(416, 6, 101),
(417, 3, 102),
(418, 4, 102),
(419, 5, 102),
(420, 6, 102),
(421, 7, 102),
(422, 3, 103),
(423, 4, 103),
(424, 6, 103),
(425, 7, 103),
(426, 8, 103),
(427, 7, 104),
(428, 8, 104),
(429, 9, 104),
(430, 2, 105),
(431, 4, 105),
(432, 5, 105),
(433, 9, 105),
(434, 1, 106),
(435, 5, 106),
(436, 9, 106),
(437, 2, 107),
(438, 4, 107),
(439, 5, 107),
(440, 9, 107);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_diagnosa`
--

CREATE TABLE `hasil_diagnosa` (
  `id_hasil` int NOT NULL,
  `id_pasien` int DEFAULT NULL,
  `id_gejala` int DEFAULT NULL,
  `id_penyakit` int DEFAULT NULL,
  `certainty_factor` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `hasil_diagnosa`
--

INSERT INTO `hasil_diagnosa` (`id_hasil`, `id_pasien`, `id_gejala`, `id_penyakit`, `certainty_factor`) VALUES
(1, 8, NULL, NULL, 1.00),
(2, 8, NULL, NULL, 1.00),
(3, 8, NULL, NULL, 1.00),
(4, 8, NULL, NULL, 1.00),
(5, 8, NULL, NULL, 1.00),
(6, 8, NULL, NULL, 1.00),
(7, 8, NULL, NULL, 1.00),
(8, 8, NULL, NULL, 1.00),
(9, 8, NULL, NULL, 1.00),
(10, 8, NULL, NULL, 1.00),
(11, 8, NULL, NULL, 1.00),
(12, 8, NULL, NULL, 1.00),
(13, 8, NULL, NULL, 1.00),
(14, 8, NULL, NULL, 1.00),
(15, 9, NULL, NULL, 1.00),
(16, 9, NULL, NULL, 1.00),
(17, 9, NULL, NULL, 1.00),
(18, 13, NULL, 4, 0.06),
(19, 13, NULL, 4, 0.06),
(20, 13, NULL, 4, 0.06),
(21, 13, NULL, 4, 0.06),
(22, 13, NULL, 4, 0.06),
(23, 13, NULL, 4, 0.06),
(24, 13, NULL, 4, 0.06),
(25, 13, NULL, 4, 0.06),
(26, 13, NULL, 4, 0.06),
(27, 13, NULL, 4, 0.06),
(28, 13, NULL, 4, 0.01),
(29, 14, NULL, 4, 0.08),
(30, 14, NULL, 4, 0.08),
(31, 15, NULL, 4, 0.02),
(32, 16, NULL, 7, 0.99),
(33, 16, NULL, 7, 0.99),
(34, 16, NULL, 7, 0.99),
(35, 16, NULL, 7, 0.99),
(36, 17, NULL, 4, 0.90),
(37, 17, NULL, 4, 0.90),
(38, 17, NULL, 4, 0.90),
(39, 17, NULL, 4, 0.90),
(40, 17, NULL, 4, 0.90),
(41, 17, NULL, 4, 0.90),
(42, 17, NULL, 4, 0.90),
(43, 18, NULL, 6, 1.00),
(44, 18, NULL, 6, 1.00),
(45, 19, NULL, 7, 0.99),
(46, 20, NULL, 6, 1.00),
(47, 21, NULL, 7, 0.98),
(48, 21, NULL, 7, 0.98),
(49, 21, NULL, 7, 0.98),
(50, 22, NULL, 7, 1.00),
(51, 23, NULL, 2, 0.94),
(52, 24, NULL, 7, 0.99),
(53, 25, NULL, 7, 0.99),
(54, 26, NULL, 4, 0.90),
(55, 27, NULL, 2, 0.96),
(56, 27, NULL, 2, 0.96),
(57, 27, NULL, 2, 0.96),
(58, 27, NULL, 2, 0.96),
(59, 27, NULL, 2, 0.96),
(60, 28, NULL, 7, 0.99),
(61, 29, NULL, 4, 0.99),
(62, 30, NULL, 2, 0.70),
(63, 31, NULL, 6, 0.98),
(64, 31, NULL, 6, 0.98),
(65, 31, NULL, 6, 0.98),
(66, 31, NULL, 6, 0.98),
(67, 31, NULL, 6, 0.98),
(68, 31, NULL, 6, 0.98),
(69, 31, NULL, 6, 0.98),
(70, 31, NULL, 6, 0.98),
(71, 32, NULL, 7, 0.99),
(72, 32, NULL, 7, 0.99),
(73, 32, NULL, 7, 0.99),
(74, 32, NULL, 7, 0.99),
(75, 32, NULL, 7, 0.99),
(76, 32, NULL, 7, 0.99),
(77, 33, NULL, 4, 0.99),
(78, 34, NULL, 2, 0.96),
(79, 35, NULL, 7, 0.99),
(80, 35, NULL, 7, 0.99),
(81, 36, NULL, 4, 0.99),
(82, 38, NULL, 7, 0.99),
(83, 39, NULL, 7, 0.99),
(84, 39, NULL, 7, 0.99),
(85, 39, NULL, 7, 0.99),
(86, 39, NULL, 7, 0.99),
(87, 39, NULL, 7, 0.99),
(88, 39, NULL, 7, 0.99),
(89, 39, NULL, 7, 0.99),
(90, 39, NULL, 7, 0.99),
(91, 40, NULL, 4, 0.99),
(92, 40, NULL, 4, 0.99),
(93, 41, NULL, 7, 0.99),
(94, 42, NULL, 7, 0.98),
(95, 43, NULL, 7, 0.99),
(96, 43, NULL, 7, 0.99),
(97, 44, NULL, 7, 0.99),
(98, 44, NULL, 7, 0.99),
(99, 45, NULL, 7, 0.99),
(100, 46, NULL, 7, 1.00),
(101, 47, NULL, 4, 0.99),
(102, 48, NULL, 4, 0.90),
(103, 49, NULL, 7, 0.99),
(104, 50, NULL, 4, 1.00),
(105, 50, NULL, 4, 1.00),
(106, 50, NULL, 4, 1.00),
(107, 50, NULL, 4, 1.00),
(108, 51, NULL, 7, 1.00),
(109, 52, NULL, 7, 0.94),
(110, 53, NULL, 2, 0.96),
(111, 54, NULL, 4, 0.99),
(112, 55, NULL, 7, 0.99),
(113, 56, NULL, 7, 0.99),
(114, 57, NULL, 7, 0.98),
(115, 58, 9, 6, 0.98),
(116, 59, 2, 7, 1.00),
(117, 60, 8, 7, 0.99),
(118, 61, 9, 4, 0.99),
(119, 62, 9, 4, 0.99),
(120, 63, 6, 7, 0.98),
(121, 64, 9, 4, 0.99),
(122, 65, 8, 7, 0.99),
(123, 66, 7, 7, 1.00),
(124, 67, 9, 6, 0.98),
(125, 68, 7, 7, 0.90),
(126, 69, 8, 7, 0.98),
(127, 70, 4, 2, 0.99),
(128, 71, 9, 6, 1.00),
(129, 72, 8, 7, 0.90),
(130, 73, 8, 7, 0.99),
(131, 74, 8, 7, 0.99),
(132, 75, 9, 4, 0.90),
(133, 76, 9, 7, 1.00),
(134, 77, 6, 2, 0.96),
(135, 77, 6, 2, 0.96),
(136, 78, NULL, 2, 0.96),
(137, 78, 3, 2, 0.96),
(138, 79, 7, 7, 0.90),
(139, 79, 7, 7, 0.90),
(140, 80, 9, 4, 0.99),
(141, 82, 9, 7, 0.99),
(142, 83, 9, 2, 0.96),
(143, 83, 9, 2, 0.96),
(144, 84, 6, 2, 0.94),
(145, 88, 6, 7, 0.98),
(146, 93, 7, 7, 0.99),
(147, 93, 7, 7, 0.99),
(148, 94, NULL, 2, 0.80),
(149, 95, 7, 7, 0.99),
(150, 96, 7, 7, 0.99),
(151, 96, 7, 7, 0.99),
(152, 97, 6, 7, 0.98),
(153, 98, 8, 7, 0.99),
(154, 99, 6, 7, 0.94),
(155, 100, 6, 2, 0.99),
(156, 100, 6, 2, 0.99),
(157, 101, 6, 2, 0.99),
(158, 101, 6, 2, 0.99),
(159, 102, 7, 7, 0.98),
(160, 103, 8, 7, 1.00),
(161, 104, 9, 7, 0.99),
(162, 105, 9, 2, 0.94),
(163, 106, 9, 4, 0.99),
(164, 107, 9, 2, 0.94);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `tanggal_kunjungan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `tanggal_kunjungan`) VALUES
(1, 'budi', '2024-05-30'),
(2, 'riski', '2024-05-30'),
(3, 'arga', '2024-05-30'),
(4, 'grace', '2024-05-30'),
(5, 'rika', '2024-05-30'),
(6, 'tami', '2024-05-30'),
(7, 'uli', '2024-05-31'),
(8, 'tina', '2024-05-31'),
(9, 'guy', '2024-05-31'),
(10, 'yui', '2024-05-31'),
(11, 'tui', '2024-05-31'),
(12, 'hui', '2024-05-31'),
(13, 'yuna', '2024-05-31'),
(14, 'rini', '2024-06-02'),
(15, 'ita', '2024-06-02'),
(16, 'dika', '2024-06-02'),
(17, 'yui', '2024-06-02'),
(18, 'rani', '2024-06-02'),
(19, 'uli', '2024-06-02'),
(20, 'grace', '2024-06-02'),
(21, 'TYOEHDO', '2024-06-02'),
(22, 'ARGA NOVRIAN', '2024-06-02'),
(23, 'OKI ', '2024-06-03'),
(24, 'MUTIA ', '2024-06-03'),
(25, 'TONO ', '2024-06-03'),
(26, 'YUI', '2024-06-03'),
(27, 'YINA ', '2024-06-03'),
(28, 'INTAN ', '2024-06-03'),
(29, 'ULI', '2024-06-03'),
(30, 'HURA ', '2024-06-03'),
(31, 'IRA ', '2024-06-03'),
(32, 'EVA ', '2024-06-03'),
(33, 'IRA ', '2024-06-03'),
(34, 'TURA', '2024-06-03'),
(35, 'ARGA NOVRIAN', '2024-06-04'),
(36, 'ITA', '2024-06-05'),
(37, 'RANI ', '2024-06-05'),
(38, 'YULI ', '2024-06-05'),
(39, 'YULIA ', '2024-06-05'),
(40, 'TUI', '2024-06-05'),
(41, 'UKI', '2024-06-05'),
(42, 'ULIANA', '2024-06-05'),
(43, 'ULIANA SINAGA', '2024-06-05'),
(44, 'OKY', '2024-06-06'),
(45, 'IRA', '2024-06-06'),
(46, 'RINA', '2024-06-06'),
(47, 'TULA ', '2024-06-06'),
(48, 'YULIO', '2024-06-06'),
(49, 'WANDA ', '2024-06-06'),
(50, 'QUEEN ', '2024-06-06'),
(51, 'RIZKY', '2024-06-06'),
(52, 'OKAL', '2024-06-06'),
(53, 'RUA', '2024-06-06'),
(54, 'OVAL ', '2024-06-06'),
(55, 'ECA ', '2024-06-06'),
(56, 'YOGA ', '2024-06-06'),
(57, 'OLA ', '2024-06-06'),
(58, 'SURPI ', '2024-06-06'),
(59, 'DIVA ', '2024-06-08'),
(60, 'GRACE ', '2024-06-08'),
(61, 'IRGI ', '2024-06-08'),
(62, 'AMEl', '2024-06-08'),
(63, 'DANDI ', '2024-06-08'),
(64, 'ARGA ', '2024-06-08'),
(65, 'ARGA ', '2024-06-08'),
(66, 'ARGA ', '2024-06-08'),
(67, 'KING ', '2024-06-08'),
(68, 'WANDA ', '2024-06-08'),
(69, 'ARGA', '2024-06-08'),
(70, 'NOVRIAN ', '2024-06-08'),
(71, 'MELISA', '2024-06-08'),
(72, 'JAMAL ', '2024-06-08'),
(73, 'EVA ', '2024-06-08'),
(74, 'HERLAN ', '2024-06-08'),
(75, 'TONO', '2024-06-08'),
(76, 'ULA ', '2024-06-08'),
(77, 'ARGA ', '2024-06-08'),
(78, 'ULI ', '2024-06-08'),
(79, 'EVA ', '2024-06-08'),
(80, 'IOP ', '2024-06-08'),
(81, 'TINA', '2024-06-08'),
(82, 'RUIO ', '2024-06-08'),
(83, 'HURA ', '2024-06-08'),
(84, 'INTAN ', '2024-06-11'),
(85, 'YINA ', '2024-06-13'),
(86, 'YINA ', '2024-06-13'),
(87, 'YINA ', '2024-06-13'),
(88, 'YINA ', '2024-06-13'),
(89, 'ITA ', '2024-06-13'),
(90, 'ARGA ', '2024-06-13'),
(91, 'ARGA ', '2024-06-13'),
(92, 'YUIO', '2024-06-13'),
(93, 'HARTONO ', '2024-06-18'),
(94, 'IKA ', '2024-06-18'),
(95, 'GOLD BERG ', '2024-06-18'),
(96, 'DIKA ', '2024-06-18'),
(97, 'JHON ', '2024-06-21'),
(98, 'MELISA', '2024-06-27'),
(99, 'ARGA NOVRIAN ', '2024-06-27'),
(100, 'AGUNG ', '2024-06-28'),
(101, 'AGUNG ', '2024-06-28'),
(102, 'ADDY ', '2024-06-28'),
(103, 'ACE ', '2024-06-28'),
(104, 'ADE ', '2024-06-28'),
(105, 'RAPIPRST ', '2024-07-01'),
(106, 'JAMES ', '2024-07-01'),
(107, 'JHON DAVID', '2024-07-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int NOT NULL,
  `nama_penyakit` varchar(255) NOT NULL,
  `kode_penyakit` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `nama_penyakit`, `kode_penyakit`) VALUES
(1, 'Bronkitis Akut', 'P1'),
(2, 'Pneumonia', 'P2'),
(3, 'Infeksi Saluran Pernapasan Atas', 'P3'),
(4, 'Demam Berdarah Dengue (DBD)', 'P4'),
(5, 'Flu', 'P5'),
(6, 'Tifus', 'P6'),
(7, 'COVID-19', 'P7');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_nama`);

--
-- Indeks untuk tabel `aturan`
--
ALTER TABLE `aturan`
  ADD PRIMARY KEY (`id_aturan`),
  ADD KEY `id_penyakit` (`id_penyakit`),
  ADD KEY `id_gejala` (`id_gejala`);

--
-- Indeks untuk tabel `data_pasien`
--
ALTER TABLE `data_pasien`
  ADD PRIMARY KEY (`id_data_pasien`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_gejala` (`id_gejala`),
  ADD KEY `id_penyakit` (`id_penyakit`);

--
-- Indeks untuk tabel `diagnosa_pasien`
--
ALTER TABLE `diagnosa_pasien`
  ADD PRIMARY KEY (`id_diagnosa`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_gejala` (`id_gejala`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indeks untuk tabel `gejala_pasien`
--
ALTER TABLE `gejala_pasien`
  ADD PRIMARY KEY (`id_gejala_pasien`),
  ADD KEY `id_gejala` (`id_gejala`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indeks untuk tabel `hasil_diagnosa`
--
ALTER TABLE `hasil_diagnosa`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_penyakit` (`id_penyakit`),
  ADD KEY `fk_id_gejala` (`id_gejala`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_nama` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `data_pasien`
--
ALTER TABLE `data_pasien`
  MODIFY `id_data_pasien` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `diagnosa_pasien`
--
ALTER TABLE `diagnosa_pasien`
  MODIFY `id_diagnosa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `gejala_pasien`
--
ALTER TABLE `gejala_pasien`
  MODIFY `id_gejala_pasien` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=441;

--
-- AUTO_INCREMENT untuk tabel `hasil_diagnosa`
--
ALTER TABLE `hasil_diagnosa`
  MODIFY `id_hasil` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `aturan`
--
ALTER TABLE `aturan`
  ADD CONSTRAINT `aturan_ibfk_1` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`),
  ADD CONSTRAINT `aturan_ibfk_2` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`);

--
-- Ketidakleluasaan untuk tabel `data_pasien`
--
ALTER TABLE `data_pasien`
  ADD CONSTRAINT `data_pasien_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`),
  ADD CONSTRAINT `data_pasien_ibfk_2` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`),
  ADD CONSTRAINT `data_pasien_ibfk_3` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`);

--
-- Ketidakleluasaan untuk tabel `diagnosa_pasien`
--
ALTER TABLE `diagnosa_pasien`
  ADD CONSTRAINT `diagnosa_pasien_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`),
  ADD CONSTRAINT `diagnosa_pasien_ibfk_2` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`);

--
-- Ketidakleluasaan untuk tabel `gejala_pasien`
--
ALTER TABLE `gejala_pasien`
  ADD CONSTRAINT `gejala_pasien_ibfk_1` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`),
  ADD CONSTRAINT `gejala_pasien_ibfk_2` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`);

--
-- Ketidakleluasaan untuk tabel `hasil_diagnosa`
--
ALTER TABLE `hasil_diagnosa`
  ADD CONSTRAINT `fk_id_gejala` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`),
  ADD CONSTRAINT `hasil_diagnosa_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`),
  ADD CONSTRAINT `hasil_diagnosa_ibfk_2` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
