-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 13, 2023 at 09:09 AM
-- Server version: 5.7.30-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcazctr_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `acl_phinxlog`
--

CREATE TABLE `acl_phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

CREATE TABLE `acos` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 2248),
(8, 1, NULL, NULL, 'Reviews', 2, 15),
(9, 8, NULL, NULL, 'index', 3, 4),
(10, 8, NULL, NULL, 'view', 5, 6),
(11, 8, NULL, NULL, 'add', 7, 8),
(12, 8, NULL, NULL, 'edit', 9, 10),
(13, 8, NULL, NULL, 'delete', 11, 12),
(14, 1, NULL, NULL, 'Users', 16, 45),
(15, 14, NULL, NULL, 'login', 17, 18),
(16, 14, NULL, NULL, 'logout', 19, 20),
(17, 14, NULL, NULL, 'register', 21, 22),
(18, 14, NULL, NULL, 'activate', 23, 24),
(20, 14, NULL, NULL, 'index', 25, 26),
(21, 14, NULL, NULL, 'view', 27, 28),
(22, 14, NULL, NULL, 'add', 29, 30),
(23, 14, NULL, NULL, 'edit', 31, 32),
(24, 14, NULL, NULL, 'delete', 33, 34),
(25, 1, NULL, NULL, 'Attachments', 46, 57),
(27, 25, NULL, NULL, 'view', 47, 48),
(28, 25, NULL, NULL, 'add', 49, 50),
(30, 25, NULL, NULL, 'delete', 51, 52),
(31, 1, NULL, NULL, 'SiteDetails', 58, 71),
(32, 31, NULL, NULL, 'index', 59, 60),
(33, 31, NULL, NULL, 'view', 61, 62),
(34, 31, NULL, NULL, 'add', 63, 64),
(35, 31, NULL, NULL, 'edit', 65, 66),
(36, 31, NULL, NULL, 'delete', 67, 68),
(37, 1, NULL, NULL, 'Error', 72, 75),
(38, 1, NULL, NULL, 'Pages', 76, 81),
(39, 38, NULL, NULL, 'display', 77, 78),
(40, 1, NULL, NULL, 'Feedbacks', 82, 95),
(41, 40, NULL, NULL, 'index', 83, 84),
(42, 40, NULL, NULL, 'view', 85, 86),
(43, 40, NULL, NULL, 'add', 87, 88),
(44, 40, NULL, NULL, 'edit', 89, 90),
(45, 40, NULL, NULL, 'delete', 91, 92),
(46, 1, NULL, NULL, 'Organizations', 96, 109),
(47, 46, NULL, NULL, 'index', 97, 98),
(48, 46, NULL, NULL, 'view', 99, 100),
(49, 46, NULL, NULL, 'add', 101, 102),
(50, 46, NULL, NULL, 'edit', 103, 104),
(51, 46, NULL, NULL, 'delete', 105, 106),
(52, 1, NULL, NULL, 'Groups', 110, 123),
(53, 52, NULL, NULL, 'index', 111, 112),
(54, 52, NULL, NULL, 'view', 113, 114),
(55, 52, NULL, NULL, 'add', 115, 116),
(56, 52, NULL, NULL, 'edit', 117, 118),
(57, 52, NULL, NULL, 'delete', 119, 120),
(58, 1, NULL, NULL, 'InvestigatorContacts', 124, 137),
(59, 58, NULL, NULL, 'index', 125, 126),
(60, 58, NULL, NULL, 'view', 127, 128),
(61, 58, NULL, NULL, 'add', 129, 130),
(62, 58, NULL, NULL, 'edit', 131, 132),
(63, 58, NULL, NULL, 'delete', 133, 134),
(64, 1, NULL, NULL, 'Messages', 138, 151),
(65, 64, NULL, NULL, 'index', 139, 140),
(66, 64, NULL, NULL, 'view', 141, 142),
(67, 64, NULL, NULL, 'add', 143, 144),
(68, 64, NULL, NULL, 'edit', 145, 146),
(69, 64, NULL, NULL, 'delete', 147, 148),
(70, 1, NULL, NULL, 'Sponsors', 152, 165),
(71, 70, NULL, NULL, 'index', 153, 154),
(72, 70, NULL, NULL, 'view', 155, 156),
(73, 70, NULL, NULL, 'add', 157, 158),
(74, 70, NULL, NULL, 'edit', 159, 160),
(75, 70, NULL, NULL, 'delete', 161, 162),
(82, 1, NULL, NULL, 'Placebos', 166, 179),
(83, 82, NULL, NULL, 'index', 167, 168),
(84, 82, NULL, NULL, 'view', 169, 170),
(85, 82, NULL, NULL, 'add', 171, 172),
(86, 82, NULL, NULL, 'edit', 173, 174),
(87, 82, NULL, NULL, 'delete', 175, 176),
(88, 1, NULL, NULL, 'Applications', 180, 185),
(94, 1, NULL, NULL, 'Notifications', 186, 199),
(95, 94, NULL, NULL, 'index', 187, 188),
(96, 94, NULL, NULL, 'view', 189, 190),
(97, 94, NULL, NULL, 'add', 191, 192),
(98, 94, NULL, NULL, 'edit', 193, 194),
(99, 94, NULL, NULL, 'delete', 195, 196),
(106, 1, NULL, NULL, 'Countries', 200, 213),
(107, 106, NULL, NULL, 'index', 201, 202),
(108, 106, NULL, NULL, 'view', 203, 204),
(109, 106, NULL, NULL, 'add', 205, 206),
(110, 106, NULL, NULL, 'edit', 207, 208),
(111, 106, NULL, NULL, 'delete', 209, 210),
(112, 1, NULL, NULL, 'Admin', 214, 481),
(113, 112, NULL, NULL, 'Users', 215, 236),
(114, 113, NULL, NULL, 'dashboard', 216, 217),
(115, 113, NULL, NULL, 'index', 218, 219),
(116, 113, NULL, NULL, 'view', 220, 221),
(117, 113, NULL, NULL, 'profile', 222, 223),
(118, 113, NULL, NULL, 'add', 224, 225),
(119, 113, NULL, NULL, 'edit', 226, 227),
(120, 113, NULL, NULL, 'delete', 228, 229),
(145, 1, NULL, NULL, 'Acl', 482, 483),
(146, 1, NULL, NULL, 'AclManager', 484, 503),
(147, 146, NULL, NULL, 'Acl', 485, 502),
(148, 147, NULL, NULL, 'index', 486, 487),
(149, 147, NULL, NULL, 'permissions', 488, 489),
(150, 147, NULL, NULL, 'updateAcos', 490, 491),
(151, 147, NULL, NULL, 'updateAros', 492, 493),
(152, 147, NULL, NULL, 'revokePerms', 494, 495),
(153, 147, NULL, NULL, 'drop', 496, 497),
(154, 147, NULL, NULL, 'defaults', 498, 499),
(155, 1, NULL, NULL, 'Bake', 504, 505),
(156, 1, NULL, NULL, 'CakePdf', 506, 507),
(157, 1, NULL, NULL, 'Crud', 508, 509),
(172, 1, NULL, NULL, 'Josegonzalez\\Upload', 510, 511),
(173, 1, NULL, NULL, 'Migrations', 512, 513),
(174, 1, NULL, NULL, 'Queue', 514, 515),
(175, 1, NULL, NULL, 'Manager', 516, 751),
(177, 1, NULL, NULL, 'Applicant', 752, 885),
(178, 177, NULL, NULL, 'Users', 753, 760),
(179, 178, NULL, NULL, 'dashboard', 754, 755),
(180, 14, NULL, NULL, 'profile', 35, 36),
(181, 178, NULL, NULL, 'profile', 756, 757),
(182, 177, NULL, NULL, 'Applications', 761, 822),
(183, 182, NULL, NULL, 'index', 762, 763),
(184, 182, NULL, NULL, 'view', 764, 765),
(185, 182, NULL, NULL, 'add', 766, 767),
(186, 182, NULL, NULL, 'edit', 768, 769),
(187, 182, NULL, NULL, 'delete', 770, 771),
(188, 1, NULL, NULL, 'Provinces', 886, 899),
(189, 188, NULL, NULL, 'index', 887, 888),
(190, 188, NULL, NULL, 'view', 889, 890),
(191, 188, NULL, NULL, 'add', 891, 892),
(192, 188, NULL, NULL, 'edit', 893, 894),
(193, 188, NULL, NULL, 'delete', 895, 896),
(194, 1, NULL, NULL, 'Participants', 900, 913),
(195, 194, NULL, NULL, 'index', 901, 902),
(196, 194, NULL, NULL, 'view', 903, 904),
(197, 194, NULL, NULL, 'add', 905, 906),
(198, 194, NULL, NULL, 'edit', 907, 908),
(199, 194, NULL, NULL, 'delete', 909, 910),
(200, 1, NULL, NULL, 'SoftDelete', 914, 915),
(201, 1, NULL, NULL, 'Committees', 916, 929),
(202, 201, NULL, NULL, 'index', 917, 918),
(203, 201, NULL, NULL, 'view', 919, 920),
(204, 201, NULL, NULL, 'add', 921, 922),
(205, 201, NULL, NULL, 'edit', 923, 924),
(206, 201, NULL, NULL, 'delete', 925, 926),
(208, 182, NULL, NULL, 'addAttachments', 772, 773),
(209, 1, NULL, NULL, 'Medicines', 930, 943),
(210, 209, NULL, NULL, 'index', 931, 932),
(211, 209, NULL, NULL, 'view', 933, 934),
(212, 209, NULL, NULL, 'add', 935, 936),
(213, 209, NULL, NULL, 'edit', 937, 938),
(214, 209, NULL, NULL, 'delete', 939, 940),
(215, 14, NULL, NULL, 'dashboard', 37, 38),
(216, 14, NULL, NULL, 'forgotPassword', 39, 40),
(217, 14, NULL, NULL, 'resetPassword', 41, 42),
(218, 25, NULL, NULL, 'download', 53, 54),
(219, 112, NULL, NULL, 'Messages', 237, 250),
(220, 219, NULL, NULL, 'index', 238, 239),
(221, 219, NULL, NULL, 'view', 240, 241),
(222, 219, NULL, NULL, 'add', 242, 243),
(223, 219, NULL, NULL, 'edit', 244, 245),
(224, 219, NULL, NULL, 'delete', 246, 247),
(233, 1, NULL, NULL, 'Finance', 944, 1145),
(234, 233, NULL, NULL, 'Users', 945, 950),
(235, 234, NULL, NULL, 'dashboard', 946, 947),
(242, 233, NULL, NULL, 'Applications', 951, 1070),
(243, 242, NULL, NULL, 'index', 952, 953),
(244, 242, NULL, NULL, 'view', 954, 955),
(249, 1, NULL, NULL, 'Captcha', 1146, 1153),
(250, 249, NULL, NULL, 'Captcha', 1147, 1152),
(251, 250, NULL, NULL, 'display', 1148, 1149),
(252, 1, NULL, NULL, 'Search', 1154, 1155),
(253, 242, NULL, NULL, 'financeApproval', 956, 957),
(254, 175, NULL, NULL, 'Users', 517, 522),
(255, 254, NULL, NULL, 'dashboard', 518, 519),
(262, 175, NULL, NULL, 'Applications', 523, 650),
(263, 262, NULL, NULL, 'index', 524, 525),
(264, 262, NULL, NULL, 'view', 526, 527),
(265, 262, NULL, NULL, 'assignEvaluator', 528, 529),
(266, 262, NULL, NULL, 'removeEvaluator', 530, 531),
(267, 262, NULL, NULL, 'addReview', 532, 533),
(268, 262, NULL, NULL, 'removeReview', 534, 535),
(269, 262, NULL, NULL, 'addCommitteeReview', 536, 537),
(270, 262, NULL, NULL, 'removeCommitteeReview', 538, 539),
(271, 262, NULL, NULL, 'requestInfo', 540, 541),
(272, 262, NULL, NULL, 'removeRequest', 542, 543),
(273, 262, NULL, NULL, 'delete', 544, 545),
(316, 182, NULL, NULL, 'addAmendment', 774, 775),
(317, 182, NULL, NULL, 'amendment', 776, 777),
(318, 182, NULL, NULL, 'requestInfoResponse', 778, 779),
(319, 262, NULL, NULL, 'addSection75Review', 546, 547),
(320, 262, NULL, NULL, 'removeSection75Review', 548, 549),
(321, 262, NULL, NULL, 'addGcpInspection', 550, 551),
(322, 262, NULL, NULL, 'removeGcpInspection', 552, 553),
(323, 182, NULL, NULL, 'addSection75', 780, 781),
(324, 182, NULL, NULL, 'addNotifications', 782, 783),
(325, 182, NULL, NULL, 'addGcpInspection', 784, 785),
(326, 112, NULL, NULL, 'Sites', 251, 266),
(327, 326, NULL, NULL, 'index', 252, 253),
(328, 326, NULL, NULL, 'view', 254, 255),
(329, 326, NULL, NULL, 'add', 256, 257),
(330, 326, NULL, NULL, 'edit', 258, 259),
(331, 326, NULL, NULL, 'delete', 260, 261),
(332, 1, NULL, NULL, 'Base', 1156, 1373),
(333, 332, NULL, NULL, 'ApplicationsBase', 1157, 1272),
(334, 333, NULL, NULL, 'index', 1158, 1159),
(335, 333, NULL, NULL, 'view', 1160, 1161),
(336, 333, NULL, NULL, 'addReview', 1162, 1163),
(337, 333, NULL, NULL, 'removeReview', 1164, 1165),
(338, 333, NULL, NULL, 'addSection75Review', 1166, 1167),
(339, 333, NULL, NULL, 'removeSection75Review', 1168, 1169),
(340, 333, NULL, NULL, 'requestInfo', 1170, 1171),
(341, 333, NULL, NULL, 'removeRequest', 1172, 1173),
(342, 333, NULL, NULL, 'addGcpInspection', 1174, 1175),
(343, 333, NULL, NULL, 'removeGcpInspection', 1176, 1177),
(344, 332, NULL, NULL, 'AmendmentsBase', 1273, 1320),
(345, 344, NULL, NULL, 'index', 1274, 1275),
(346, 344, NULL, NULL, 'view', 1276, 1277),
(347, 344, NULL, NULL, 'addReview', 1278, 1279),
(348, 344, NULL, NULL, 'removeReview', 1280, 1281),
(349, 344, NULL, NULL, 'addSection75Review', 1282, 1283),
(350, 344, NULL, NULL, 'removeSection75Review', 1284, 1285),
(351, 344, NULL, NULL, 'requestInfo', 1286, 1287),
(352, 344, NULL, NULL, 'removeRequest', 1288, 1289),
(353, 344, NULL, NULL, 'addGcpInspection', 1290, 1291),
(354, 344, NULL, NULL, 'removeGcpInspection', 1292, 1293),
(377, 175, NULL, NULL, 'Amendments', 651, 704),
(378, 377, NULL, NULL, 'assignEvaluator', 652, 653),
(379, 377, NULL, NULL, 'removeEvaluator', 654, 655),
(380, 377, NULL, NULL, 'addCommitteeReview', 656, 657),
(381, 377, NULL, NULL, 'removeCommitteeReview', 658, 659),
(382, 377, NULL, NULL, 'delete', 660, 661),
(383, 377, NULL, NULL, 'index', 662, 663),
(384, 377, NULL, NULL, 'view', 664, 665),
(385, 377, NULL, NULL, 'addReview', 666, 667),
(386, 377, NULL, NULL, 'removeReview', 668, 669),
(387, 377, NULL, NULL, 'addSection75Review', 670, 671),
(388, 377, NULL, NULL, 'removeSection75Review', 672, 673),
(389, 377, NULL, NULL, 'requestInfo', 674, 675),
(390, 377, NULL, NULL, 'removeRequest', 676, 677),
(391, 377, NULL, NULL, 'addGcpInspection', 678, 679),
(392, 377, NULL, NULL, 'removeGcpInspection', 680, 681),
(401, 112, NULL, NULL, 'Amendments', 267, 314),
(402, 401, NULL, NULL, 'index', 268, 269),
(403, 401, NULL, NULL, 'view', 270, 271),
(404, 401, NULL, NULL, 'addReview', 272, 273),
(405, 401, NULL, NULL, 'removeReview', 274, 275),
(406, 401, NULL, NULL, 'addSection75Review', 276, 277),
(407, 401, NULL, NULL, 'removeSection75Review', 278, 279),
(408, 401, NULL, NULL, 'requestInfo', 280, 281),
(409, 401, NULL, NULL, 'removeRequest', 282, 283),
(410, 401, NULL, NULL, 'addGcpInspection', 284, 285),
(411, 401, NULL, NULL, 'removeGcpInspection', 286, 287),
(412, 112, NULL, NULL, 'Applications', 315, 430),
(413, 412, NULL, NULL, 'index', 316, 317),
(414, 412, NULL, NULL, 'view', 318, 319),
(415, 412, NULL, NULL, 'addReview', 320, 321),
(416, 412, NULL, NULL, 'removeReview', 322, 323),
(417, 412, NULL, NULL, 'addSection75Review', 324, 325),
(418, 412, NULL, NULL, 'removeSection75Review', 326, 327),
(419, 412, NULL, NULL, 'requestInfo', 328, 329),
(420, 412, NULL, NULL, 'removeRequest', 330, 331),
(421, 412, NULL, NULL, 'addGcpInspection', 332, 333),
(422, 412, NULL, NULL, 'removeGcpInspection', 334, 335),
(423, 412, NULL, NULL, 'finance', 336, 337),
(424, 412, NULL, NULL, 'section75', 338, 339),
(425, 412, NULL, NULL, 'evaluator', 340, 341),
(426, 412, NULL, NULL, 'review', 342, 343),
(427, 412, NULL, NULL, 'communication', 344, 345),
(428, 412, NULL, NULL, 'committee', 346, 347),
(429, 412, NULL, NULL, 'gcp', 348, 349),
(430, 332, NULL, NULL, 'UsersBase', 1321, 1326),
(431, 430, NULL, NULL, 'dashboard', 1322, 1323),
(432, 333, NULL, NULL, 'finance', 1178, 1179),
(433, 333, NULL, NULL, 'section75', 1180, 1181),
(434, 333, NULL, NULL, 'evaluator', 1182, 1183),
(435, 333, NULL, NULL, 'review', 1184, 1185),
(436, 333, NULL, NULL, 'communication', 1186, 1187),
(437, 333, NULL, NULL, 'committee', 1188, 1189),
(438, 333, NULL, NULL, 'gcp', 1190, 1191),
(439, 262, NULL, NULL, 'finance', 554, 555),
(440, 262, NULL, NULL, 'section75', 556, 557),
(441, 262, NULL, NULL, 'evaluator', 558, 559),
(442, 262, NULL, NULL, 'review', 560, 561),
(443, 262, NULL, NULL, 'communication', 562, 563),
(444, 262, NULL, NULL, 'committee', 564, 565),
(445, 262, NULL, NULL, 'gcp', 566, 567),
(466, 1, NULL, NULL, 'ExternalEvaluator', 1374, 1543),
(467, 466, NULL, NULL, 'Amendments', 1375, 1380),
(485, 233, NULL, NULL, 'Amendments', 1071, 1120),
(486, 485, NULL, NULL, 'view', 1072, 1073),
(487, 485, NULL, NULL, 'financeApproval', 1074, 1075),
(488, 485, NULL, NULL, 'index', 1076, 1077),
(489, 485, NULL, NULL, 'addReview', 1078, 1079),
(490, 485, NULL, NULL, 'removeReview', 1080, 1081),
(491, 485, NULL, NULL, 'addSection75Review', 1082, 1083),
(492, 485, NULL, NULL, 'removeSection75Review', 1084, 1085),
(493, 485, NULL, NULL, 'requestInfo', 1086, 1087),
(494, 485, NULL, NULL, 'removeRequest', 1088, 1089),
(495, 485, NULL, NULL, 'addGcpInspection', 1090, 1091),
(496, 485, NULL, NULL, 'removeGcpInspection', 1092, 1093),
(497, 242, NULL, NULL, 'addReview', 958, 959),
(498, 242, NULL, NULL, 'removeReview', 960, 961),
(499, 242, NULL, NULL, 'addSection75Review', 962, 963),
(500, 242, NULL, NULL, 'removeSection75Review', 964, 965),
(501, 242, NULL, NULL, 'requestInfo', 966, 967),
(502, 242, NULL, NULL, 'removeRequest', 968, 969),
(503, 242, NULL, NULL, 'addGcpInspection', 970, 971),
(504, 242, NULL, NULL, 'removeGcpInspection', 972, 973),
(505, 242, NULL, NULL, 'finance', 974, 975),
(506, 242, NULL, NULL, 'section75', 976, 977),
(507, 242, NULL, NULL, 'evaluator', 978, 979),
(508, 242, NULL, NULL, 'review', 980, 981),
(509, 242, NULL, NULL, 'communication', 982, 983),
(510, 242, NULL, NULL, 'committee', 984, 985),
(511, 242, NULL, NULL, 'gcp', 986, 987),
(512, 112, NULL, NULL, 'Groups', 431, 444),
(513, 512, NULL, NULL, 'index', 432, 433),
(514, 512, NULL, NULL, 'view', 434, 435),
(515, 512, NULL, NULL, 'add', 436, 437),
(516, 512, NULL, NULL, 'edit', 438, 439),
(517, 512, NULL, NULL, 'delete', 440, 441),
(518, 112, NULL, NULL, 'Feedbacks', 445, 458),
(519, 518, NULL, NULL, 'index', 446, 447),
(520, 518, NULL, NULL, 'view', 448, 449),
(521, 518, NULL, NULL, 'add', 450, 451),
(522, 518, NULL, NULL, 'edit', 452, 453),
(523, 518, NULL, NULL, 'delete', 454, 455),
(550, 466, NULL, NULL, 'Users', 1381, 1386),
(551, 550, NULL, NULL, 'dashboard', 1382, 1383),
(552, 466, NULL, NULL, 'Applications', 1387, 1502),
(553, 552, NULL, NULL, 'index', 1388, 1389),
(554, 552, NULL, NULL, 'view', 1390, 1391),
(555, 552, NULL, NULL, 'addReview', 1392, 1393),
(556, 552, NULL, NULL, 'removeReview', 1394, 1395),
(557, 552, NULL, NULL, 'addSection75Review', 1396, 1397),
(558, 552, NULL, NULL, 'removeSection75Review', 1398, 1399),
(559, 552, NULL, NULL, 'requestInfo', 1400, 1401),
(560, 552, NULL, NULL, 'removeRequest', 1402, 1403),
(561, 552, NULL, NULL, 'addGcpInspection', 1404, 1405),
(562, 552, NULL, NULL, 'removeGcpInspection', 1406, 1407),
(563, 552, NULL, NULL, 'finance', 1408, 1409),
(564, 552, NULL, NULL, 'section75', 1410, 1411),
(565, 552, NULL, NULL, 'evaluator', 1412, 1413),
(566, 552, NULL, NULL, 'review', 1414, 1415),
(567, 552, NULL, NULL, 'communication', 1416, 1417),
(568, 552, NULL, NULL, 'committee', 1418, 1419),
(569, 552, NULL, NULL, 'gcp', 1420, 1421),
(570, 1, NULL, NULL, 'Evaluator', 1544, 1761),
(571, 570, NULL, NULL, 'Amendments', 1545, 1592),
(572, 571, NULL, NULL, 'index', 1546, 1547),
(573, 571, NULL, NULL, 'view', 1548, 1549),
(574, 571, NULL, NULL, 'addReview', 1550, 1551),
(575, 571, NULL, NULL, 'removeReview', 1552, 1553),
(576, 571, NULL, NULL, 'addSection75Review', 1554, 1555),
(577, 571, NULL, NULL, 'removeSection75Review', 1556, 1557),
(578, 571, NULL, NULL, 'requestInfo', 1558, 1559),
(579, 571, NULL, NULL, 'removeRequest', 1560, 1561),
(580, 571, NULL, NULL, 'addGcpInspection', 1562, 1563),
(581, 571, NULL, NULL, 'removeGcpInspection', 1564, 1565),
(582, 570, NULL, NULL, 'Users', 1593, 1598),
(583, 582, NULL, NULL, 'dashboard', 1594, 1595),
(584, 570, NULL, NULL, 'Applications', 1599, 1714),
(585, 584, NULL, NULL, 'index', 1600, 1601),
(586, 584, NULL, NULL, 'view', 1602, 1603),
(587, 584, NULL, NULL, 'addReview', 1604, 1605),
(588, 584, NULL, NULL, 'removeReview', 1606, 1607),
(589, 584, NULL, NULL, 'addSection75Review', 1608, 1609),
(590, 584, NULL, NULL, 'removeSection75Review', 1610, 1611),
(591, 584, NULL, NULL, 'requestInfo', 1612, 1613),
(592, 584, NULL, NULL, 'removeRequest', 1614, 1615),
(593, 584, NULL, NULL, 'addGcpInspection', 1616, 1617),
(594, 584, NULL, NULL, 'removeGcpInspection', 1618, 1619),
(595, 584, NULL, NULL, 'finance', 1620, 1621),
(596, 584, NULL, NULL, 'section75', 1622, 1623),
(597, 584, NULL, NULL, 'evaluator', 1624, 1625),
(598, 584, NULL, NULL, 'review', 1626, 1627),
(599, 584, NULL, NULL, 'communication', 1628, 1629),
(600, 584, NULL, NULL, 'committee', 1630, 1631),
(601, 584, NULL, NULL, 'gcp', 1632, 1633),
(602, 182, NULL, NULL, 'finance', 786, 787),
(603, 182, NULL, NULL, 'section75', 788, 789),
(604, 182, NULL, NULL, 'evaluator', 790, 791),
(605, 182, NULL, NULL, 'communication', 792, 793),
(606, 182, NULL, NULL, 'committee', 794, 795),
(607, 182, NULL, NULL, 'gcp', 796, 797),
(608, 1, NULL, NULL, 'CsvView', 1762, 1763),
(609, 1, NULL, NULL, 'Reports', 1764, 1789),
(610, 609, NULL, NULL, 'index', 1765, 1766),
(611, 609, NULL, NULL, 'protocolsPerYear', 1767, 1768),
(612, 609, NULL, NULL, 'protocolsPerMonth', 1769, 1770),
(613, 112, NULL, NULL, 'Notifications', 459, 468),
(614, 613, NULL, NULL, 'index', 460, 461),
(615, 613, NULL, NULL, 'view', 462, 463),
(616, 613, NULL, NULL, 'delete', 464, 465),
(617, 332, NULL, NULL, 'NotificationsBase', 1327, 1336),
(618, 617, NULL, NULL, 'index', 1328, 1329),
(619, 617, NULL, NULL, 'view', 1330, 1331),
(620, 617, NULL, NULL, 'delete', 1332, 1333),
(621, 175, NULL, NULL, 'Notifications', 705, 714),
(622, 621, NULL, NULL, 'index', 706, 707),
(623, 621, NULL, NULL, 'view', 708, 709),
(624, 621, NULL, NULL, 'delete', 710, 711),
(625, 570, NULL, NULL, 'Notifications', 1715, 1724),
(626, 625, NULL, NULL, 'index', 1716, 1717),
(627, 625, NULL, NULL, 'view', 1718, 1719),
(628, 625, NULL, NULL, 'delete', 1720, 1721),
(629, 466, NULL, NULL, 'Notifications', 1503, 1512),
(630, 629, NULL, NULL, 'index', 1504, 1505),
(631, 629, NULL, NULL, 'view', 1506, 1507),
(632, 629, NULL, NULL, 'delete', 1508, 1509),
(633, 177, NULL, NULL, 'Notifications', 823, 832),
(634, 633, NULL, NULL, 'index', 824, 825),
(635, 633, NULL, NULL, 'view', 826, 827),
(636, 633, NULL, NULL, 'delete', 828, 829),
(637, 233, NULL, NULL, 'Notifications', 1121, 1130),
(638, 637, NULL, NULL, 'index', 1122, 1123),
(639, 637, NULL, NULL, 'view', 1124, 1125),
(640, 637, NULL, NULL, 'delete', 1126, 1127),
(641, 412, NULL, NULL, 'dg', 350, 351),
(642, 333, NULL, NULL, 'dg', 1192, 1193),
(645, 262, NULL, NULL, 'dg', 568, 569),
(646, 584, NULL, NULL, 'dg', 1634, 1635),
(647, 552, NULL, NULL, 'dg', 1422, 1423),
(648, 242, NULL, NULL, 'dg', 988, 989),
(778, 609, NULL, NULL, 'test', 1771, 1772),
(779, 609, NULL, NULL, 'timelinesForReview', 1773, 1774),
(780, 609, NULL, NULL, 'notificationsPerYear', 1775, 1776),
(781, 609, NULL, NULL, 'amendmentsPerYear', 1777, 1778),
(782, 609, NULL, NULL, 'processingStatus', 1779, 1780),
(783, 609, NULL, NULL, 'protocolsPerPhase', 1781, 1782),
(784, 609, NULL, NULL, 'researchArea', 1783, 1784),
(819, 609, NULL, NULL, 'publicReports', 1785, 1786),
(1092, 88, NULL, NULL, 'mc10', 181, 182),
(1093, 1, NULL, NULL, 'CommitteeDates', 1790, 1797),
(1094, 1093, NULL, NULL, 'add', 1791, 1792),
(1095, 1093, NULL, NULL, 'delete', 1793, 1794),
(1096, 412, NULL, NULL, 'commonHeader', 352, 353),
(1097, 412, NULL, NULL, 'addCommitteeReview', 354, 355),
(1098, 412, NULL, NULL, 'removeCommitteeReview', 356, 357),
(1099, 412, NULL, NULL, 'raiseAppeal', 358, 359),
(1100, 412, NULL, NULL, 'addFinalStage', 360, 361),
(1101, 412, NULL, NULL, 'removeFinalStage', 362, 363),
(1102, 412, NULL, NULL, 'appeal', 364, 365),
(1103, 412, NULL, NULL, 'finals', 366, 367),
(1104, 412, NULL, NULL, 'stages', 368, 369),
(1105, 412, NULL, NULL, 'suspend', 370, 371),
(1106, 412, NULL, NULL, 'reinstate', 372, 373),
(1107, 113, NULL, NULL, 'deactivate', 230, 231),
(1108, 113, NULL, NULL, 'activate', 232, 233),
(1109, 401, NULL, NULL, 'addCommitteeReview', 288, 289),
(1110, 401, NULL, NULL, 'removeCommitteeReview', 290, 291),
(1111, 401, NULL, NULL, 'finance', 292, 293),
(1112, 401, NULL, NULL, 'section75', 294, 295),
(1113, 401, NULL, NULL, 'evaluator', 296, 297),
(1114, 401, NULL, NULL, 'review', 298, 299),
(1115, 401, NULL, NULL, 'communication', 300, 301),
(1116, 401, NULL, NULL, 'committee', 302, 303),
(1117, 401, NULL, NULL, 'dg', 304, 305),
(1118, 401, NULL, NULL, 'gcp', 306, 307),
(1119, 401, NULL, NULL, 'stages', 308, 309),
(1120, 112, NULL, NULL, 'Stages', 469, 480),
(1121, 1120, NULL, NULL, 'index', 470, 471),
(1122, 1120, NULL, NULL, 'view', 472, 473),
(1123, 1120, NULL, NULL, 'add', 474, 475),
(1124, 1120, NULL, NULL, 'edit', 476, 477),
(1125, 332, NULL, NULL, 'CommentsBase', 1337, 1352),
(1126, 1125, NULL, NULL, 'addFromCommittee', 1338, 1339),
(1127, 1125, NULL, NULL, 'addFromEvaluations', 1340, 1341),
(1128, 332, NULL, NULL, 'FeedbacksBase', 1353, 1366),
(1129, 1128, NULL, NULL, 'index', 1354, 1355),
(1130, 1128, NULL, NULL, 'view', 1356, 1357),
(1131, 1128, NULL, NULL, 'add', 1358, 1359),
(1132, 1128, NULL, NULL, 'edit', 1360, 1361),
(1133, 1128, NULL, NULL, 'delete', 1362, 1363),
(1134, 344, NULL, NULL, 'addCommitteeReview', 1294, 1295),
(1135, 344, NULL, NULL, 'removeCommitteeReview', 1296, 1297),
(1136, 344, NULL, NULL, 'finance', 1298, 1299),
(1137, 344, NULL, NULL, 'section75', 1300, 1301),
(1138, 344, NULL, NULL, 'evaluator', 1302, 1303),
(1139, 344, NULL, NULL, 'review', 1304, 1305),
(1140, 344, NULL, NULL, 'communication', 1306, 1307),
(1141, 344, NULL, NULL, 'committee', 1308, 1309),
(1142, 344, NULL, NULL, 'dg', 1310, 1311),
(1143, 344, NULL, NULL, 'gcp', 1312, 1313),
(1144, 344, NULL, NULL, 'stages', 1314, 1315),
(1145, 332, NULL, NULL, 'SitesBase', 1367, 1372),
(1146, 1145, NULL, NULL, 'calendar', 1368, 1369),
(1147, 333, NULL, NULL, 'commonHeader', 1194, 1195),
(1148, 333, NULL, NULL, 'addCommitteeReview', 1196, 1197),
(1149, 333, NULL, NULL, 'removeCommitteeReview', 1198, 1199),
(1150, 333, NULL, NULL, 'raiseAppeal', 1200, 1201),
(1151, 333, NULL, NULL, 'addFinalStage', 1202, 1203),
(1152, 333, NULL, NULL, 'removeFinalStage', 1204, 1205),
(1153, 333, NULL, NULL, 'appeal', 1206, 1207),
(1154, 333, NULL, NULL, 'finals', 1208, 1209),
(1155, 333, NULL, NULL, 'stages', 1210, 1211),
(1156, 333, NULL, NULL, 'suspend', 1212, 1213),
(1157, 333, NULL, NULL, 'reinstate', 1214, 1215),
(1158, 175, NULL, NULL, 'Sites', 715, 720),
(1159, 1158, NULL, NULL, 'calendar', 716, 717),
(1160, 262, NULL, NULL, 'commonHeader', 570, 571),
(1161, 262, NULL, NULL, 'raiseAppeal', 572, 573),
(1162, 262, NULL, NULL, 'addFinalStage', 574, 575),
(1163, 262, NULL, NULL, 'removeFinalStage', 576, 577),
(1164, 262, NULL, NULL, 'appeal', 578, 579),
(1165, 262, NULL, NULL, 'finals', 580, 581),
(1166, 262, NULL, NULL, 'stages', 582, 583),
(1167, 262, NULL, NULL, 'suspend', 584, 585),
(1168, 262, NULL, NULL, 'reinstate', 586, 587),
(1169, 175, NULL, NULL, 'Comments', 721, 736),
(1170, 1169, NULL, NULL, 'addFromCommittee', 722, 723),
(1171, 1169, NULL, NULL, 'addFromEvaluations', 724, 725),
(1172, 377, NULL, NULL, 'finance', 682, 683),
(1173, 377, NULL, NULL, 'section75', 684, 685),
(1174, 377, NULL, NULL, 'evaluator', 686, 687),
(1175, 377, NULL, NULL, 'review', 688, 689),
(1176, 377, NULL, NULL, 'communication', 690, 691),
(1177, 377, NULL, NULL, 'committee', 692, 693),
(1178, 377, NULL, NULL, 'dg', 694, 695),
(1179, 377, NULL, NULL, 'gcp', 696, 697),
(1180, 377, NULL, NULL, 'stages', 698, 699),
(1181, 175, NULL, NULL, 'Feedbacks', 737, 750),
(1182, 1181, NULL, NULL, 'index', 738, 739),
(1183, 1181, NULL, NULL, 'view', 740, 741),
(1184, 1181, NULL, NULL, 'add', 742, 743),
(1185, 1181, NULL, NULL, 'edit', 744, 745),
(1186, 1181, NULL, NULL, 'delete', 746, 747),
(1187, 570, NULL, NULL, 'Sites', 1725, 1730),
(1188, 1187, NULL, NULL, 'calendar', 1726, 1727),
(1189, 584, NULL, NULL, 'commonHeader', 1636, 1637),
(1190, 584, NULL, NULL, 'addCommitteeReview', 1638, 1639),
(1191, 584, NULL, NULL, 'removeCommitteeReview', 1640, 1641),
(1192, 584, NULL, NULL, 'raiseAppeal', 1642, 1643),
(1193, 584, NULL, NULL, 'addFinalStage', 1644, 1645),
(1194, 584, NULL, NULL, 'removeFinalStage', 1646, 1647),
(1195, 584, NULL, NULL, 'appeal', 1648, 1649),
(1196, 584, NULL, NULL, 'finals', 1650, 1651),
(1197, 584, NULL, NULL, 'stages', 1652, 1653),
(1198, 584, NULL, NULL, 'suspend', 1654, 1655),
(1199, 584, NULL, NULL, 'reinstate', 1656, 1657),
(1200, 571, NULL, NULL, 'addCommitteeReview', 1566, 1567),
(1201, 571, NULL, NULL, 'removeCommitteeReview', 1568, 1569),
(1202, 571, NULL, NULL, 'finance', 1570, 1571),
(1203, 571, NULL, NULL, 'section75', 1572, 1573),
(1204, 571, NULL, NULL, 'evaluator', 1574, 1575),
(1205, 571, NULL, NULL, 'review', 1576, 1577),
(1206, 571, NULL, NULL, 'communication', 1578, 1579),
(1207, 571, NULL, NULL, 'committee', 1580, 1581),
(1208, 571, NULL, NULL, 'dg', 1582, 1583),
(1209, 571, NULL, NULL, 'gcp', 1584, 1585),
(1210, 571, NULL, NULL, 'stages', 1586, 1587),
(1211, 570, NULL, NULL, 'Feedbacks', 1731, 1744),
(1212, 1211, NULL, NULL, 'index', 1732, 1733),
(1213, 1211, NULL, NULL, 'view', 1734, 1735),
(1214, 1211, NULL, NULL, 'add', 1736, 1737),
(1215, 1211, NULL, NULL, 'edit', 1738, 1739),
(1216, 1211, NULL, NULL, 'delete', 1740, 1741),
(1217, 552, NULL, NULL, 'commonHeader', 1424, 1425),
(1218, 552, NULL, NULL, 'addCommitteeReview', 1426, 1427),
(1219, 552, NULL, NULL, 'removeCommitteeReview', 1428, 1429),
(1220, 552, NULL, NULL, 'raiseAppeal', 1430, 1431),
(1221, 552, NULL, NULL, 'addFinalStage', 1432, 1433),
(1222, 552, NULL, NULL, 'removeFinalStage', 1434, 1435),
(1223, 552, NULL, NULL, 'appeal', 1436, 1437),
(1224, 552, NULL, NULL, 'finals', 1438, 1439),
(1225, 552, NULL, NULL, 'stages', 1440, 1441),
(1226, 552, NULL, NULL, 'suspend', 1442, 1443),
(1227, 552, NULL, NULL, 'reinstate', 1444, 1445),
(1228, 466, NULL, NULL, 'Feedbacks', 1513, 1526),
(1229, 1228, NULL, NULL, 'index', 1514, 1515),
(1230, 1228, NULL, NULL, 'view', 1516, 1517),
(1231, 1228, NULL, NULL, 'add', 1518, 1519),
(1232, 1228, NULL, NULL, 'edit', 1520, 1521),
(1233, 1228, NULL, NULL, 'delete', 1522, 1523),
(1234, 1, NULL, NULL, 'DirectorGeneral', 1798, 2019),
(1235, 1234, NULL, NULL, 'Applications', 1799, 1918),
(1236, 1235, NULL, NULL, 'addDgReview', 1800, 1801),
(1237, 1235, NULL, NULL, 'removeDgReview', 1802, 1803),
(1238, 1235, NULL, NULL, 'index', 1804, 1805),
(1239, 1235, NULL, NULL, 'view', 1806, 1807),
(1240, 1235, NULL, NULL, 'commonHeader', 1808, 1809),
(1241, 1235, NULL, NULL, 'addReview', 1810, 1811),
(1242, 1235, NULL, NULL, 'removeReview', 1812, 1813),
(1243, 1235, NULL, NULL, 'addCommitteeReview', 1814, 1815),
(1244, 1235, NULL, NULL, 'removeCommitteeReview', 1816, 1817),
(1245, 1235, NULL, NULL, 'addSection75Review', 1818, 1819),
(1246, 1235, NULL, NULL, 'removeSection75Review', 1820, 1821),
(1247, 1235, NULL, NULL, 'requestInfo', 1822, 1823),
(1248, 1235, NULL, NULL, 'removeRequest', 1824, 1825),
(1249, 1235, NULL, NULL, 'addGcpInspection', 1826, 1827),
(1250, 1235, NULL, NULL, 'removeGcpInspection', 1828, 1829),
(1251, 1235, NULL, NULL, 'raiseAppeal', 1830, 1831),
(1252, 1235, NULL, NULL, 'addFinalStage', 1832, 1833),
(1253, 1235, NULL, NULL, 'removeFinalStage', 1834, 1835),
(1254, 1235, NULL, NULL, 'finance', 1836, 1837),
(1255, 1235, NULL, NULL, 'section75', 1838, 1839),
(1256, 1235, NULL, NULL, 'evaluator', 1840, 1841),
(1257, 1235, NULL, NULL, 'review', 1842, 1843),
(1258, 1235, NULL, NULL, 'communication', 1844, 1845),
(1259, 1235, NULL, NULL, 'committee', 1846, 1847),
(1260, 1235, NULL, NULL, 'dg', 1848, 1849),
(1261, 1235, NULL, NULL, 'gcp', 1850, 1851),
(1262, 1235, NULL, NULL, 'appeal', 1852, 1853),
(1263, 1235, NULL, NULL, 'finals', 1854, 1855),
(1264, 1235, NULL, NULL, 'stages', 1856, 1857),
(1265, 1235, NULL, NULL, 'suspend', 1858, 1859),
(1266, 1235, NULL, NULL, 'reinstate', 1860, 1861),
(1267, 1234, NULL, NULL, 'Notifications', 1919, 1928),
(1268, 1267, NULL, NULL, 'index', 1920, 1921),
(1269, 1267, NULL, NULL, 'view', 1922, 1923),
(1270, 1267, NULL, NULL, 'delete', 1924, 1925),
(1271, 1234, NULL, NULL, 'Users', 1929, 1934),
(1272, 1271, NULL, NULL, 'dashboard', 1930, 1931),
(1273, 1234, NULL, NULL, 'Comments', 1935, 1950),
(1274, 1273, NULL, NULL, 'addFromCommittee', 1936, 1937),
(1275, 1273, NULL, NULL, 'addFromEvaluations', 1938, 1939),
(1276, 1234, NULL, NULL, 'Amendments', 1951, 1998),
(1277, 1276, NULL, NULL, 'index', 1952, 1953),
(1278, 1276, NULL, NULL, 'view', 1954, 1955),
(1279, 1276, NULL, NULL, 'addReview', 1956, 1957),
(1280, 1276, NULL, NULL, 'removeReview', 1958, 1959),
(1281, 1276, NULL, NULL, 'addCommitteeReview', 1960, 1961),
(1282, 1276, NULL, NULL, 'removeCommitteeReview', 1962, 1963),
(1283, 1276, NULL, NULL, 'addSection75Review', 1964, 1965),
(1284, 1276, NULL, NULL, 'removeSection75Review', 1966, 1967),
(1285, 1276, NULL, NULL, 'requestInfo', 1968, 1969),
(1286, 1276, NULL, NULL, 'removeRequest', 1970, 1971),
(1287, 1276, NULL, NULL, 'addGcpInspection', 1972, 1973),
(1288, 1276, NULL, NULL, 'removeGcpInspection', 1974, 1975),
(1289, 1276, NULL, NULL, 'finance', 1976, 1977),
(1290, 1276, NULL, NULL, 'section75', 1978, 1979),
(1291, 1276, NULL, NULL, 'evaluator', 1980, 1981),
(1292, 1276, NULL, NULL, 'review', 1982, 1983),
(1293, 1276, NULL, NULL, 'communication', 1984, 1985),
(1294, 1276, NULL, NULL, 'committee', 1986, 1987),
(1295, 1276, NULL, NULL, 'dg', 1988, 1989),
(1296, 1276, NULL, NULL, 'gcp', 1990, 1991),
(1297, 1276, NULL, NULL, 'stages', 1992, 1993),
(1298, 1234, NULL, NULL, 'Feedbacks', 1999, 2012),
(1299, 1298, NULL, NULL, 'index', 2000, 2001),
(1300, 1298, NULL, NULL, 'view', 2002, 2003),
(1301, 1298, NULL, NULL, 'add', 2004, 2005),
(1302, 1298, NULL, NULL, 'edit', 2006, 2007),
(1303, 1298, NULL, NULL, 'delete', 2008, 2009),
(1304, 182, NULL, NULL, 'approvalEdit', 798, 799),
(1305, 182, NULL, NULL, 'raiseAppeal', 800, 801),
(1306, 182, NULL, NULL, 'addIndemnityForms', 802, 803),
(1307, 182, NULL, NULL, 'addFinalReport', 804, 805),
(1308, 182, NULL, NULL, 'dg', 806, 807),
(1309, 182, NULL, NULL, 'appeal', 808, 809),
(1310, 182, NULL, NULL, 'stages', 810, 811),
(1311, 177, NULL, NULL, 'Comments', 833, 842),
(1312, 1311, NULL, NULL, 'addFromApplicant', 834, 835),
(1313, 177, NULL, NULL, 'Amendments', 843, 884),
(1314, 1313, NULL, NULL, 'index', 844, 845),
(1315, 1313, NULL, NULL, 'view', 846, 847),
(1316, 1313, NULL, NULL, 'add', 848, 849),
(1317, 1313, NULL, NULL, 'edit', 850, 851),
(1318, 1313, NULL, NULL, 'addAmendment', 852, 853),
(1319, 1313, NULL, NULL, 'amendment', 854, 855),
(1320, 1313, NULL, NULL, 'addAttachments', 856, 857),
(1321, 1313, NULL, NULL, 'requestInfoResponse', 858, 859),
(1322, 1313, NULL, NULL, 'addSection75', 860, 861),
(1323, 1313, NULL, NULL, 'addNotifications', 862, 863),
(1324, 1313, NULL, NULL, 'addGcpInspection', 864, 865),
(1325, 1313, NULL, NULL, 'delete', 866, 867),
(1326, 1313, NULL, NULL, 'finance', 868, 869),
(1327, 1313, NULL, NULL, 'section75', 870, 871),
(1328, 1313, NULL, NULL, 'evaluator', 872, 873),
(1329, 1313, NULL, NULL, 'communication', 874, 875),
(1330, 1313, NULL, NULL, 'committee', 876, 877),
(1331, 1313, NULL, NULL, 'dg', 878, 879),
(1332, 1313, NULL, NULL, 'gcp', 880, 881),
(1333, 242, NULL, NULL, 'commonHeader', 990, 991),
(1334, 242, NULL, NULL, 'addCommitteeReview', 992, 993),
(1335, 242, NULL, NULL, 'removeCommitteeReview', 994, 995),
(1336, 242, NULL, NULL, 'raiseAppeal', 996, 997),
(1337, 242, NULL, NULL, 'addFinalStage', 998, 999),
(1338, 242, NULL, NULL, 'removeFinalStage', 1000, 1001),
(1339, 242, NULL, NULL, 'appeal', 1002, 1003),
(1340, 242, NULL, NULL, 'finals', 1004, 1005),
(1341, 242, NULL, NULL, 'stages', 1006, 1007),
(1342, 242, NULL, NULL, 'suspend', 1008, 1009),
(1343, 242, NULL, NULL, 'reinstate', 1010, 1011),
(1344, 485, NULL, NULL, 'addCommitteeReview', 1094, 1095),
(1345, 485, NULL, NULL, 'removeCommitteeReview', 1096, 1097),
(1346, 485, NULL, NULL, 'finance', 1098, 1099),
(1347, 485, NULL, NULL, 'section75', 1100, 1101),
(1348, 485, NULL, NULL, 'evaluator', 1102, 1103),
(1349, 485, NULL, NULL, 'review', 1104, 1105),
(1350, 485, NULL, NULL, 'communication', 1106, 1107),
(1351, 485, NULL, NULL, 'committee', 1108, 1109),
(1352, 485, NULL, NULL, 'dg', 1110, 1111),
(1353, 485, NULL, NULL, 'gcp', 1112, 1113),
(1354, 485, NULL, NULL, 'stages', 1114, 1115),
(1355, 233, NULL, NULL, 'Feedbacks', 1131, 1144),
(1356, 1355, NULL, NULL, 'index', 1132, 1133),
(1357, 1355, NULL, NULL, 'view', 1134, 1135),
(1358, 1355, NULL, NULL, 'add', 1136, 1137),
(1359, 1355, NULL, NULL, 'edit', 1138, 1139),
(1360, 1355, NULL, NULL, 'delete', 1140, 1141),
(1361, 326, NULL, NULL, 'calendar', 262, 263),
(1362, 570, NULL, NULL, 'Comments', 1745, 1760),
(1363, 1362, NULL, NULL, 'addFromCommittee', 1746, 1747),
(1364, 1362, NULL, NULL, 'addFromEvaluations', 1748, 1749),
(1365, 466, NULL, NULL, 'Comments', 1527, 1542),
(1366, 1365, NULL, NULL, 'addFromCommittee', 1528, 1529),
(1367, 1365, NULL, NULL, 'addFromEvaluations', 1530, 1531),
(1368, 1, NULL, NULL, 'DatabaseLog', 2020, 2043),
(1369, 1368, NULL, NULL, 'Admin', 2021, 2042),
(1370, 1369, NULL, NULL, 'Logs', 2022, 2035),
(1371, 1370, NULL, NULL, 'index', 2023, 2024),
(1372, 1370, NULL, NULL, 'view', 2025, 2026),
(1373, 1370, NULL, NULL, 'delete', 2027, 2028),
(1374, 1370, NULL, NULL, 'reset', 2029, 2030),
(1375, 1370, NULL, NULL, 'removeDuplicates', 2031, 2032),
(1376, 182, NULL, NULL, 'addAnnualApproval', 812, 813),
(1377, 182, NULL, NULL, 'finals', 814, 815),
(1378, 182, NULL, NULL, 'annualApprovals', 816, 817),
(1379, 412, NULL, NULL, 'removeDgReview', 374, 375),
(1380, 412, NULL, NULL, 'annualApprovals', 376, 377),
(1381, 333, NULL, NULL, 'removeDgReview', 1216, 1217),
(1382, 333, NULL, NULL, 'annualApprovals', 1218, 1219),
(1383, 262, NULL, NULL, 'removeDgReview', 588, 589),
(1384, 262, NULL, NULL, 'annualApprovals', 590, 591),
(1385, 584, NULL, NULL, 'removeDgReview', 1658, 1659),
(1386, 584, NULL, NULL, 'annualApprovals', 1660, 1661),
(1387, 552, NULL, NULL, 'removeDgReview', 1446, 1447),
(1388, 552, NULL, NULL, 'annualApprovals', 1448, 1449),
(1389, 1235, NULL, NULL, 'annualApprovals', 1862, 1863),
(1390, 242, NULL, NULL, 'removeDgReview', 1012, 1013),
(1391, 242, NULL, NULL, 'annualApprovals', 1014, 1015),
(1392, 1234, NULL, NULL, 'Attachments', 2013, 2018),
(1393, 1392, NULL, NULL, 'addApprovalLetter', 2014, 2015),
(1394, 242, NULL, NULL, 'financeAnnualApproval', 1016, 1017),
(1395, 412, NULL, NULL, 'evaluationComment', 378, 379),
(1396, 333, NULL, NULL, 'evaluationComment', 1220, 1221),
(1397, 262, NULL, NULL, 'evaluationComment', 592, 593),
(1398, 584, NULL, NULL, 'evaluationComment', 1662, 1663),
(1399, 552, NULL, NULL, 'evaluationComment', 1450, 1451),
(1400, 1235, NULL, NULL, 'evaluationComment', 1864, 1865),
(1401, 242, NULL, NULL, 'evaluationComment', 1018, 1019),
(1402, 467, NULL, NULL, 'view', 1376, 1377),
(1403, 412, NULL, NULL, 'evaluatorComment', 380, 381),
(1404, 412, NULL, NULL, 'attachSignature', 382, 383),
(1405, 412, NULL, NULL, 'committeeFeedback', 384, 385),
(1406, 333, NULL, NULL, 'evaluatorComment', 1222, 1223),
(1407, 333, NULL, NULL, 'attachSignature', 1224, 1225),
(1408, 333, NULL, NULL, 'committeeFeedback', 1226, 1227),
(1409, 262, NULL, NULL, 'evaluatorComment', 594, 595),
(1410, 262, NULL, NULL, 'attachSignature', 596, 597),
(1411, 262, NULL, NULL, 'committeeFeedback', 598, 599),
(1412, 584, NULL, NULL, 'evaluatorComment', 1664, 1665),
(1413, 584, NULL, NULL, 'attachSignature', 1666, 1667),
(1414, 584, NULL, NULL, 'committeeFeedback', 1668, 1669),
(1415, 552, NULL, NULL, 'evaluatorComment', 1452, 1453),
(1416, 552, NULL, NULL, 'attachSignature', 1454, 1455),
(1417, 552, NULL, NULL, 'committeeFeedback', 1456, 1457),
(1418, 1235, NULL, NULL, 'evaluatorComment', 1866, 1867),
(1419, 1235, NULL, NULL, 'attachSignature', 1868, 1869),
(1420, 1235, NULL, NULL, 'committeeFeedback', 1870, 1871),
(1421, 182, NULL, NULL, 'committeeFeedback', 818, 819),
(1422, 242, NULL, NULL, 'evaluatorComment', 1020, 1021),
(1423, 242, NULL, NULL, 'attachSignature', 1022, 1023),
(1424, 242, NULL, NULL, 'committeeFeedback', 1024, 1025),
(1425, 401, NULL, NULL, 'attachSignature', 310, 311),
(1426, 344, NULL, NULL, 'attachSignature', 1316, 1317),
(1427, 377, NULL, NULL, 'attachSignature', 700, 701),
(1428, 571, NULL, NULL, 'attachSignature', 1588, 1589),
(1429, 1276, NULL, NULL, 'attachSignature', 1994, 1995),
(1430, 485, NULL, NULL, 'attachSignature', 1116, 1117),
(1431, 1125, NULL, NULL, 'addFromNotifications', 1342, 1343),
(1432, 1169, NULL, NULL, 'addFromNotifications', 726, 727),
(1433, 1362, NULL, NULL, 'addFromNotifications', 1750, 1751),
(1434, 1365, NULL, NULL, 'addFromNotifications', 1532, 1533),
(1435, 1273, NULL, NULL, 'addFromNotifications', 1940, 1941),
(1436, 1311, NULL, NULL, 'addFromNotification', 836, 837),
(1437, 188, NULL, NULL, 'getName', 897, 898),
(1438, 58, NULL, NULL, 'getName', 135, 136),
(1439, 31, NULL, NULL, 'getName', 69, 70),
(1440, 38, NULL, NULL, 'getName', 79, 80),
(1441, 194, NULL, NULL, 'getName', 911, 912),
(1442, 201, NULL, NULL, 'getName', 927, 928),
(1443, 94, NULL, NULL, 'getName', 197, 198),
(1444, 37, NULL, NULL, 'getName', 73, 74),
(1445, 52, NULL, NULL, 'getName', 121, 122),
(1446, 14, NULL, NULL, 'getName', 43, 44),
(1447, 1093, NULL, NULL, 'getName', 1795, 1796),
(1448, 209, NULL, NULL, 'getName', 941, 942),
(1449, 40, NULL, NULL, 'getName', 93, 94),
(1450, 609, NULL, NULL, 'getName', 1787, 1788),
(1451, 106, NULL, NULL, 'getName', 211, 212),
(1452, 88, NULL, NULL, 'getName', 183, 184),
(1453, 25, NULL, NULL, 'getName', 55, 56),
(1454, 82, NULL, NULL, 'getName', 177, 178),
(1455, 46, NULL, NULL, 'getName', 107, 108),
(1456, 8, NULL, NULL, 'getName', 13, 14),
(1457, 70, NULL, NULL, 'getName', 163, 164),
(1458, 64, NULL, NULL, 'getName', 149, 150),
(1459, 1120, NULL, NULL, 'getName', 478, 479),
(1460, 613, NULL, NULL, 'getName', 466, 467),
(1461, 512, NULL, NULL, 'getName', 442, 443),
(1462, 113, NULL, NULL, 'getName', 234, 235),
(1463, 518, NULL, NULL, 'getName', 456, 457),
(1464, 412, NULL, NULL, 'getName', 386, 387),
(1465, 401, NULL, NULL, 'getName', 312, 313),
(1466, 219, NULL, NULL, 'getName', 248, 249),
(1467, 326, NULL, NULL, 'getName', 264, 265),
(1468, 1128, NULL, NULL, 'getName', 1364, 1365),
(1469, 617, NULL, NULL, 'getName', 1334, 1335),
(1470, 1125, NULL, NULL, 'getName', 1344, 1345),
(1471, 333, NULL, NULL, 'getName', 1228, 1229),
(1472, 430, NULL, NULL, 'getName', 1324, 1325),
(1473, 1145, NULL, NULL, 'getName', 1370, 1371),
(1474, 344, NULL, NULL, 'getName', 1318, 1319),
(1475, 621, NULL, NULL, 'getName', 712, 713),
(1476, 254, NULL, NULL, 'getName', 520, 521),
(1477, 1181, NULL, NULL, 'getName', 748, 749),
(1478, 262, NULL, NULL, 'getName', 600, 601),
(1479, 377, NULL, NULL, 'getName', 702, 703),
(1480, 1169, NULL, NULL, 'getName', 728, 729),
(1481, 1158, NULL, NULL, 'getName', 718, 719),
(1482, 625, NULL, NULL, 'getName', 1722, 1723),
(1483, 582, NULL, NULL, 'getName', 1596, 1597),
(1484, 1211, NULL, NULL, 'getName', 1742, 1743),
(1485, 584, NULL, NULL, 'getName', 1670, 1671),
(1486, 571, NULL, NULL, 'getName', 1590, 1591),
(1487, 1362, NULL, NULL, 'getName', 1752, 1753),
(1488, 1187, NULL, NULL, 'getName', 1728, 1729),
(1489, 629, NULL, NULL, 'getName', 1510, 1511),
(1490, 550, NULL, NULL, 'getName', 1384, 1385),
(1491, 1228, NULL, NULL, 'getName', 1524, 1525),
(1492, 552, NULL, NULL, 'getName', 1458, 1459),
(1493, 467, NULL, NULL, 'getName', 1378, 1379),
(1494, 1365, NULL, NULL, 'getName', 1534, 1535),
(1495, 1267, NULL, NULL, 'getName', 1926, 1927),
(1496, 1271, NULL, NULL, 'getName', 1932, 1933),
(1497, 1298, NULL, NULL, 'getName', 2010, 2011),
(1498, 1235, NULL, NULL, 'getName', 1872, 1873),
(1499, 1392, NULL, NULL, 'getName', 2016, 2017),
(1500, 1276, NULL, NULL, 'getName', 1996, 1997),
(1501, 1273, NULL, NULL, 'getName', 1942, 1943),
(1502, 633, NULL, NULL, 'getName', 830, 831),
(1503, 178, NULL, NULL, 'getName', 758, 759),
(1504, 182, NULL, NULL, 'getName', 820, 821),
(1505, 1313, NULL, NULL, 'getName', 882, 883),
(1506, 1311, NULL, NULL, 'getName', 838, 839),
(1507, 637, NULL, NULL, 'getName', 1128, 1129),
(1508, 234, NULL, NULL, 'getName', 948, 949),
(1509, 1355, NULL, NULL, 'getName', 1142, 1143),
(1510, 242, NULL, NULL, 'getName', 1026, 1027),
(1511, 485, NULL, NULL, 'getName', 1118, 1119),
(1512, 147, NULL, NULL, 'getName', 500, 501),
(1513, 250, NULL, NULL, 'getName', 1150, 1151),
(1514, 1370, NULL, NULL, 'getName', 2033, 2034),
(1515, 1, NULL, NULL, 'DebugKit', 2044, 2079),
(1516, 1515, NULL, NULL, 'Toolbar', 2045, 2048),
(1517, 1516, NULL, NULL, 'clearCache', 2046, 2047),
(1518, 1515, NULL, NULL, 'Requests', 2049, 2052),
(1519, 1518, NULL, NULL, 'view', 2050, 2051),
(1520, 1515, NULL, NULL, 'MailPreview', 2053, 2060),
(1521, 1520, NULL, NULL, 'index', 2054, 2055),
(1522, 1520, NULL, NULL, 'sent', 2056, 2057),
(1523, 1520, NULL, NULL, 'email', 2058, 2059),
(1524, 1515, NULL, NULL, 'Composer', 2061, 2064),
(1525, 1524, NULL, NULL, 'checkDependencies', 2062, 2063),
(1526, 1515, NULL, NULL, 'Panels', 2065, 2070),
(1527, 1526, NULL, NULL, 'index', 2066, 2067),
(1528, 1526, NULL, NULL, 'view', 2068, 2069),
(1529, 1235, NULL, NULL, 'certificate', 1874, 1875),
(1530, 1125, NULL, NULL, 'submit', 1346, 1347),
(1531, 1169, NULL, NULL, 'submit', 730, 731),
(1532, 1362, NULL, NULL, 'submit', 1754, 1755),
(1533, 1365, NULL, NULL, 'submit', 1536, 1537),
(1534, 1273, NULL, NULL, 'submit', 1944, 1945),
(1535, 1125, NULL, NULL, 'delete', 1348, 1349),
(1536, 1169, NULL, NULL, 'delete', 732, 733),
(1537, 1362, NULL, NULL, 'delete', 1756, 1757),
(1538, 1365, NULL, NULL, 'delete', 1538, 1539),
(1539, 1273, NULL, NULL, 'delete', 1946, 1947),
(1540, 1125, NULL, NULL, 'submitAll', 1350, 1351),
(1541, 1169, NULL, NULL, 'submitAll', 734, 735),
(1542, 1362, NULL, NULL, 'submitAll', 1758, 1759),
(1543, 1365, NULL, NULL, 'submitAll', 1540, 1541),
(1544, 1273, NULL, NULL, 'submitAll', 1948, 1949),
(1545, 1311, NULL, NULL, 'submitAll', 840, 841),
(1632, 1, NULL, NULL, 'Refids', 2080, 2093),
(1633, 1632, NULL, NULL, 'index', 2081, 2082),
(1634, 1632, NULL, NULL, 'view', 2083, 2084),
(1635, 1632, NULL, NULL, 'add', 2085, 2086),
(1636, 1632, NULL, NULL, 'edit', 2087, 2088),
(1637, 1632, NULL, NULL, 'delete', 2089, 2090),
(1638, 1632, NULL, NULL, 'getName', 2091, 2092),
(1639, 1369, NULL, NULL, 'DatabaseLog', 2036, 2041),
(1640, 1639, NULL, NULL, 'index', 2037, 2038),
(1641, 1639, NULL, NULL, 'getName', 2039, 2040),
(1642, 1515, NULL, NULL, 'Dashboard', 2071, 2076),
(1643, 1642, NULL, NULL, 'index', 2072, 2073),
(1644, 1642, NULL, NULL, 'reset', 2074, 2075),
(1645, 1515, NULL, NULL, 'DebugKit', 2077, 2078),
(1646, 262, NULL, NULL, 'generateReferenceNumber', 602, 603),
(1647, 412, NULL, NULL, 'removeQualityAssessment', 388, 389),
(1648, 412, NULL, NULL, 'removeStatisticalAssessment', 390, 391),
(1649, 412, NULL, NULL, 'addNonClinicalReview', 392, 393),
(1650, 412, NULL, NULL, 'addQualityReview', 394, 395),
(1651, 412, NULL, NULL, 'addStatisticalReview', 396, 397),
(1652, 412, NULL, NULL, 'addSdrug', 398, 399),
(1653, 412, NULL, NULL, 'quality', 400, 401),
(1654, 412, NULL, NULL, 'removeNonclinicalAssessment', 402, 403),
(1655, 412, NULL, NULL, 'addClinicalReview', 404, 405),
(1656, 412, NULL, NULL, 'removeClinicalAssessment', 406, 407),
(1657, 412, NULL, NULL, 'updateReference', 408, 409),
(1658, 412, NULL, NULL, 'clear', 410, 411),
(1659, 333, NULL, NULL, 'removeQualityAssessment', 1230, 1231),
(1660, 333, NULL, NULL, 'removeStatisticalAssessment', 1232, 1233),
(1661, 333, NULL, NULL, 'addNonClinicalReview', 1234, 1235),
(1662, 333, NULL, NULL, 'addQualityReview', 1236, 1237),
(1663, 333, NULL, NULL, 'addStatisticalReview', 1238, 1239),
(1664, 333, NULL, NULL, 'addSdrug', 1240, 1241),
(1665, 333, NULL, NULL, 'quality', 1242, 1243),
(1666, 333, NULL, NULL, 'removeNonclinicalAssessment', 1244, 1245),
(1667, 333, NULL, NULL, 'addClinicalReview', 1246, 1247),
(1668, 333, NULL, NULL, 'removeClinicalAssessment', 1248, 1249),
(1669, 333, NULL, NULL, 'updateReference', 1250, 1251),
(1670, 333, NULL, NULL, 'clear', 1252, 1253),
(1671, 262, NULL, NULL, 'processAssignment', 604, 605),
(1672, 262, NULL, NULL, 'assignSelf', 606, 607),
(1673, 262, NULL, NULL, 'removeQualityAssessment', 608, 609),
(1674, 262, NULL, NULL, 'removeStatisticalAssessment', 610, 611),
(1675, 262, NULL, NULL, 'addNonClinicalReview', 612, 613),
(1676, 262, NULL, NULL, 'addQualityReview', 614, 615),
(1677, 262, NULL, NULL, 'addStatisticalReview', 616, 617),
(1678, 262, NULL, NULL, 'addSdrug', 618, 619),
(1679, 262, NULL, NULL, 'quality', 620, 621),
(1680, 262, NULL, NULL, 'removeNonclinicalAssessment', 622, 623),
(1681, 262, NULL, NULL, 'addClinicalReview', 624, 625),
(1682, 262, NULL, NULL, 'removeClinicalAssessment', 626, 627),
(1683, 262, NULL, NULL, 'updateReference', 628, 629),
(1684, 262, NULL, NULL, 'clear', 630, 631),
(1685, 584, NULL, NULL, 'removeQualityAssessment', 1672, 1673),
(1686, 584, NULL, NULL, 'removeStatisticalAssessment', 1674, 1675),
(1687, 584, NULL, NULL, 'addNonClinicalReview', 1676, 1677),
(1688, 584, NULL, NULL, 'addQualityReview', 1678, 1679),
(1689, 584, NULL, NULL, 'addStatisticalReview', 1680, 1681),
(1690, 584, NULL, NULL, 'addSdrug', 1682, 1683),
(1691, 584, NULL, NULL, 'quality', 1684, 1685),
(1692, 584, NULL, NULL, 'removeNonclinicalAssessment', 1686, 1687),
(1693, 584, NULL, NULL, 'addClinicalReview', 1688, 1689),
(1694, 584, NULL, NULL, 'removeClinicalAssessment', 1690, 1691),
(1695, 584, NULL, NULL, 'updateReference', 1692, 1693),
(1696, 584, NULL, NULL, 'clear', 1694, 1695),
(1697, 552, NULL, NULL, 'removeQualityAssessment', 1460, 1461),
(1698, 552, NULL, NULL, 'removeStatisticalAssessment', 1462, 1463),
(1699, 552, NULL, NULL, 'addNonClinicalReview', 1464, 1465),
(1700, 552, NULL, NULL, 'addQualityReview', 1466, 1467),
(1701, 552, NULL, NULL, 'addStatisticalReview', 1468, 1469),
(1702, 552, NULL, NULL, 'addSdrug', 1470, 1471),
(1703, 552, NULL, NULL, 'quality', 1472, 1473),
(1704, 552, NULL, NULL, 'removeNonclinicalAssessment', 1474, 1475),
(1705, 552, NULL, NULL, 'addClinicalReview', 1476, 1477),
(1706, 552, NULL, NULL, 'removeClinicalAssessment', 1478, 1479),
(1707, 552, NULL, NULL, 'updateReference', 1480, 1481),
(1708, 552, NULL, NULL, 'clear', 1482, 1483),
(1709, 1235, NULL, NULL, 'removeQualityAssessment', 1876, 1877),
(1710, 1235, NULL, NULL, 'removeStatisticalAssessment', 1878, 1879),
(1711, 1235, NULL, NULL, 'addNonClinicalReview', 1880, 1881),
(1712, 1235, NULL, NULL, 'addQualityReview', 1882, 1883),
(1713, 1235, NULL, NULL, 'addStatisticalReview', 1884, 1885),
(1714, 1235, NULL, NULL, 'addSdrug', 1886, 1887),
(1715, 1235, NULL, NULL, 'quality', 1888, 1889),
(1716, 1235, NULL, NULL, 'removeNonclinicalAssessment', 1890, 1891),
(1717, 1235, NULL, NULL, 'addClinicalReview', 1892, 1893),
(1718, 1235, NULL, NULL, 'removeClinicalAssessment', 1894, 1895),
(1719, 1235, NULL, NULL, 'updateReference', 1896, 1897),
(1720, 1235, NULL, NULL, 'clear', 1898, 1899),
(1721, 242, NULL, NULL, 'removeQualityAssessment', 1028, 1029),
(1722, 242, NULL, NULL, 'removeStatisticalAssessment', 1030, 1031),
(1723, 242, NULL, NULL, 'addNonClinicalReview', 1032, 1033),
(1724, 242, NULL, NULL, 'addQualityReview', 1034, 1035),
(1725, 242, NULL, NULL, 'addStatisticalReview', 1036, 1037),
(1726, 242, NULL, NULL, 'addSdrug', 1038, 1039),
(1727, 242, NULL, NULL, 'quality', 1040, 1041),
(1728, 242, NULL, NULL, 'removeNonclinicalAssessment', 1042, 1043),
(1729, 242, NULL, NULL, 'addClinicalReview', 1044, 1045),
(1730, 242, NULL, NULL, 'removeClinicalAssessment', 1046, 1047),
(1731, 242, NULL, NULL, 'updateReference', 1048, 1049),
(1732, 242, NULL, NULL, 'clear', 1050, 1051),
(1733, 412, NULL, NULL, 'timelineReport', 412, 413),
(1734, 333, NULL, NULL, 'timelineReport', 1254, 1255),
(1735, 262, NULL, NULL, 'timelineReport', 632, 633),
(1736, 584, NULL, NULL, 'timelineReport', 1696, 1697),
(1737, 552, NULL, NULL, 'timelineReport', 1484, 1485),
(1738, 1235, NULL, NULL, 'timelineReport', 1900, 1901),
(1739, 242, NULL, NULL, 'timelineReport', 1052, 1053),
(1740, 412, NULL, NULL, 'statisticalReview', 414, 415),
(1741, 333, NULL, NULL, 'statisticalReview', 1256, 1257),
(1742, 262, NULL, NULL, 'statisticalReview', 634, 635),
(1743, 584, NULL, NULL, 'statisticalReview', 1698, 1699),
(1744, 552, NULL, NULL, 'statisticalReview', 1486, 1487),
(1745, 1235, NULL, NULL, 'statisticalReview', 1902, 1903),
(1746, 242, NULL, NULL, 'statisticalReview', 1054, 1055),
(1747, 412, NULL, NULL, 'clinicalReview', 416, 417),
(1748, 333, NULL, NULL, 'clinicalReview', 1258, 1259),
(1749, 262, NULL, NULL, 'clinicalReview', 636, 637),
(1750, 584, NULL, NULL, 'clinicalReview', 1700, 1701),
(1751, 552, NULL, NULL, 'clinicalReview', 1488, 1489),
(1752, 1235, NULL, NULL, 'clinicalReview', 1904, 1905),
(1753, 242, NULL, NULL, 'clinicalReview', 1056, 1057),
(1754, 412, NULL, NULL, 'nonClinicalReview', 418, 419),
(1755, 333, NULL, NULL, 'nonClinicalReview', 1260, 1261),
(1756, 262, NULL, NULL, 'nonClinicalReview', 638, 639),
(1757, 584, NULL, NULL, 'nonClinicalReview', 1702, 1703),
(1758, 552, NULL, NULL, 'nonClinicalReview', 1490, 1491),
(1759, 1235, NULL, NULL, 'nonClinicalReview', 1906, 1907),
(1760, 242, NULL, NULL, 'nonClinicalReview', 1058, 1059),
(1761, 1, NULL, NULL, 'Sdrugs', 2094, 2107),
(1762, 1761, NULL, NULL, 'index', 2095, 2096),
(1763, 1761, NULL, NULL, 'view', 2097, 2098),
(1764, 1761, NULL, NULL, 'add', 2099, 2100),
(1765, 1761, NULL, NULL, 'edit', 2101, 2102),
(1766, 1761, NULL, NULL, 'delete', 2103, 2104),
(1767, 1761, NULL, NULL, 'getName', 2105, 2106),
(1768, 1, NULL, NULL, 'Quality', 2108, 2121),
(1769, 1768, NULL, NULL, 'index', 2109, 2110),
(1770, 1768, NULL, NULL, 'view', 2111, 2112),
(1771, 1768, NULL, NULL, 'add', 2113, 2114),
(1772, 1768, NULL, NULL, 'edit', 2115, 2116),
(1773, 1768, NULL, NULL, 'delete', 2117, 2118),
(1774, 1768, NULL, NULL, 'getName', 2119, 2120),
(1775, 412, NULL, NULL, 'qualityReview', 420, 421),
(1776, 333, NULL, NULL, 'qualityReview', 1262, 1263),
(1777, 262, NULL, NULL, 'qualityReview', 640, 641),
(1778, 584, NULL, NULL, 'qualityReview', 1704, 1705),
(1779, 552, NULL, NULL, 'qualityReview', 1492, 1493),
(1780, 1235, NULL, NULL, 'qualityReview', 1908, 1909),
(1781, 242, NULL, NULL, 'qualityReview', 1060, 1061),
(1782, 1, NULL, NULL, 'Compliance', 2122, 2135),
(1783, 1782, NULL, NULL, 'index', 2123, 2124),
(1784, 1782, NULL, NULL, 'view', 2125, 2126),
(1785, 1782, NULL, NULL, 'add', 2127, 2128),
(1786, 1782, NULL, NULL, 'edit', 2129, 2130),
(1787, 1782, NULL, NULL, 'delete', 2131, 2132),
(1788, 1782, NULL, NULL, 'getName', 2133, 2134),
(1789, 1, NULL, NULL, 'Pdrugs', 2136, 2149),
(1790, 1789, NULL, NULL, 'index', 2137, 2138),
(1791, 1789, NULL, NULL, 'view', 2139, 2140),
(1792, 1789, NULL, NULL, 'add', 2141, 2142),
(1793, 1789, NULL, NULL, 'edit', 2143, 2144),
(1794, 1789, NULL, NULL, 'delete', 2145, 2146),
(1795, 1789, NULL, NULL, 'getName', 2147, 2148),
(1796, 1, NULL, NULL, 'Statisticals', 2150, 2163),
(1797, 1796, NULL, NULL, 'index', 2151, 2152),
(1798, 1796, NULL, NULL, 'view', 2153, 2154);
INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1799, 1796, NULL, NULL, 'add', 2155, 2156),
(1800, 1796, NULL, NULL, 'edit', 2157, 2158),
(1801, 1796, NULL, NULL, 'delete', 2159, 2160),
(1802, 1796, NULL, NULL, 'getName', 2161, 2162),
(1803, 1, NULL, NULL, 'NonClinicals', 2164, 2177),
(1804, 1803, NULL, NULL, 'index', 2165, 2166),
(1805, 1803, NULL, NULL, 'view', 2167, 2168),
(1806, 1803, NULL, NULL, 'add', 2169, 2170),
(1807, 1803, NULL, NULL, 'edit', 2171, 2172),
(1808, 1803, NULL, NULL, 'delete', 2173, 2174),
(1809, 1803, NULL, NULL, 'getName', 2175, 2176),
(1810, 1, NULL, NULL, 'QualityAssessments', 2178, 2191),
(1811, 1810, NULL, NULL, 'index', 2179, 2180),
(1812, 1810, NULL, NULL, 'view', 2181, 2182),
(1813, 1810, NULL, NULL, 'add', 2183, 2184),
(1814, 1810, NULL, NULL, 'edit', 2185, 2186),
(1815, 1810, NULL, NULL, 'delete', 2187, 2188),
(1816, 1810, NULL, NULL, 'getName', 2189, 2190),
(1817, 1, NULL, NULL, 'StorageConditions', 2192, 2205),
(1818, 1817, NULL, NULL, 'index', 2193, 2194),
(1819, 1817, NULL, NULL, 'view', 2195, 2196),
(1820, 1817, NULL, NULL, 'add', 2197, 2198),
(1821, 1817, NULL, NULL, 'edit', 2199, 2200),
(1822, 1817, NULL, NULL, 'delete', 2201, 2202),
(1823, 1817, NULL, NULL, 'getName', 2203, 2204),
(1824, 1, NULL, NULL, 'Clinicals', 2206, 2219),
(1825, 1824, NULL, NULL, 'index', 2207, 2208),
(1826, 1824, NULL, NULL, 'view', 2209, 2210),
(1827, 1824, NULL, NULL, 'add', 2211, 2212),
(1828, 1824, NULL, NULL, 'edit', 2213, 2214),
(1829, 1824, NULL, NULL, 'delete', 2215, 2216),
(1830, 1824, NULL, NULL, 'getName', 2217, 2218),
(1831, 412, NULL, NULL, 'attachQualitySignature', 422, 423),
(1832, 333, NULL, NULL, 'attachQualitySignature', 1264, 1265),
(1833, 262, NULL, NULL, 'attachQualitySignature', 642, 643),
(1834, 584, NULL, NULL, 'attachQualitySignature', 1706, 1707),
(1835, 552, NULL, NULL, 'attachQualitySignature', 1494, 1495),
(1836, 1235, NULL, NULL, 'attachQualitySignature', 1910, 1911),
(1837, 242, NULL, NULL, 'attachQualitySignature', 1062, 1063),
(1838, 412, NULL, NULL, 'attachClinicalSignature', 424, 425),
(1839, 333, NULL, NULL, 'attachClinicalSignature', 1266, 1267),
(1840, 262, NULL, NULL, 'attachClinicalSignature', 644, 645),
(1841, 584, NULL, NULL, 'attachClinicalSignature', 1708, 1709),
(1842, 552, NULL, NULL, 'attachClinicalSignature', 1496, 1497),
(1843, 1235, NULL, NULL, 'attachClinicalSignature', 1912, 1913),
(1844, 242, NULL, NULL, 'attachClinicalSignature', 1064, 1065),
(1845, 412, NULL, NULL, 'attachNonClinicalSignature', 426, 427),
(1846, 333, NULL, NULL, 'attachNonClinicalSignature', 1268, 1269),
(1847, 262, NULL, NULL, 'attachNonClinicalSignature', 646, 647),
(1848, 584, NULL, NULL, 'attachNonClinicalSignature', 1710, 1711),
(1849, 552, NULL, NULL, 'attachNonClinicalSignature', 1498, 1499),
(1850, 1235, NULL, NULL, 'attachNonClinicalSignature', 1914, 1915),
(1851, 242, NULL, NULL, 'attachNonClinicalSignature', 1066, 1067),
(1852, 412, NULL, NULL, 'attachStatisticalSignature', 428, 429),
(1853, 333, NULL, NULL, 'attachStatisticalSignature', 1270, 1271),
(1854, 262, NULL, NULL, 'attachStatisticalSignature', 648, 649),
(1855, 584, NULL, NULL, 'attachStatisticalSignature', 1712, 1713),
(1856, 552, NULL, NULL, 'attachStatisticalSignature', 1500, 1501),
(1857, 1235, NULL, NULL, 'attachStatisticalSignature', 1916, 1917),
(1858, 242, NULL, NULL, 'attachStatisticalSignature', 1068, 1069),
(1859, 1, NULL, NULL, 'SdrugsConditions', 2220, 2233),
(1860, 1859, NULL, NULL, 'index', 2221, 2222),
(1861, 1859, NULL, NULL, 'view', 2223, 2224),
(1862, 1859, NULL, NULL, 'add', 2225, 2226),
(1863, 1859, NULL, NULL, 'edit', 2227, 2228),
(1864, 1859, NULL, NULL, 'delete', 2229, 2230),
(1865, 1859, NULL, NULL, 'getName', 2231, 2232),
(1866, 1, NULL, NULL, 'Reminders', 2234, 2247),
(1867, 1866, NULL, NULL, 'index', 2235, 2236),
(1868, 1866, NULL, NULL, 'view', 2237, 2238),
(1869, 1866, NULL, NULL, 'add', 2239, 2240),
(1870, 1866, NULL, NULL, 'edit', 2241, 2242),
(1871, 1866, NULL, NULL, 'delete', 2243, 2244),
(1872, 1866, NULL, NULL, 'getName', 2245, 2246);

-- --------------------------------------------------------

--
-- Table structure for table `annual_approvals`
--

CREATE TABLE `annual_approvals` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `application_id` int(11) DEFAULT NULL,
  `internal_review_comment` text,
  `applicant_review_comment` text,
  `approved_date` date DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `appeals`
--

CREATE TABLE `appeals` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `application_id` int(11) DEFAULT NULL,
  `comment` text,
  `deleted` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `application_id` int(11) DEFAULT NULL,
  `protocol_no` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `report_type` varchar(55) CHARACTER SET utf8 DEFAULT 'Initial',
  `trial_status_id` int(11) DEFAULT NULL,
  `study_title` text CHARACTER SET utf8,
  `short_title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `public_title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `scientific_title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `public_contact_email` varchar(55) CHARACTER SET utf8 DEFAULT NULL,
  `public_contact_name` varchar(155) CHARACTER SET utf8 DEFAULT NULL,
  `public_contact_designation` varchar(55) CHARACTER SET utf8 DEFAULT NULL,
  `public_contact_phone` varchar(55) CHARACTER SET utf8 DEFAULT NULL,
  `public_contact_postal` varchar(55) CHARACTER SET utf8 DEFAULT NULL,
  `public_contact_affiliation` varchar(55) CHARACTER SET utf8 DEFAULT NULL,
  `scientific_contact_email` varchar(55) CHARACTER SET utf8 DEFAULT NULL,
  `scientific_contact_designation` varchar(55) CHARACTER SET utf8 DEFAULT NULL,
  `scientific_contact_name` varchar(55) CHARACTER SET utf8 DEFAULT NULL,
  `scientific_contact_phone` varchar(55) CHARACTER SET utf8 DEFAULT NULL,
  `scientific_contact_postal` varchar(55) CHARACTER SET utf8 DEFAULT NULL,
  `scientific_contact_affiliation` varchar(55) CHARACTER SET utf8 DEFAULT NULL,
  `countries_recruitment` text CHARACTER SET utf8,
  `abstract_of_study` text CHARACTER SET utf8,
  `version_no` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `date_of_protocol` date DEFAULT NULL,
  `protocol_version` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `study_drug` text CHARACTER SET utf8,
  `drug_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `quantity_excemption` varchar(255) CHARACTER SET utf32 DEFAULT NULL,
  `drug_details` text CHARACTER SET utf32,
  `medicine_reaction` text CHARACTER SET utf8,
  `medicine_therapeutic_effects` text CHARACTER SET utf32,
  `medicine_registered_details` text CHARACTER SET utf8,
  `trial_origin_details` text CHARACTER SET utf8,
  `other_country_details` text CHARACTER SET utf8,
  `safety` text CHARACTER SET utf32,
  `medicine_registered` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `trials_origin_country` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `registered_other_country` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `registered_other_country_details` text CHARACTER SET utf8,
  `application_other_country` text CHARACTER SET utf8,
  `application_other_country_details` text CHARACTER SET utf8,
  `rejected_other_country` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `rejected_other_country_details` text CHARACTER SET utf8,
  `administration_route` text CHARACTER SET utf8,
  `exemption_required` text CHARACTER SET utf8,
  `state_antidote` text CHARACTER SET utf8,
  `ethic_considerations` text CHARACTER SET utf8,
  `insurance_company` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `insurance_address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `insurance_amount` text CHARACTER SET utf8,
  `other_insurance` text CHARACTER SET utf8,
  `ethical_review_status` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `date_of_approval_ethics` date DEFAULT NULL,
  `concomitant_medicine` text CHARACTER SET utf8,
  `status_medicine` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `given_concomitantly` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `concomitant_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `concurrent_medicine` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `disease_condition` text CHARACTER SET utf32,
  `sponsor_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `sponsor_contact_person` varchar(255) CHARACTER SET utf32 DEFAULT NULL,
  `sponsor_address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `sponsor_telephone_number` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `sponsor_fax_number` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `sponsor_cell_number` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `sponsor_email_address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `participants_description` text CHARACTER SET utf8,
  `product_type_biologicals` tinyint(1) DEFAULT NULL,
  `product_type_biologicals_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `product_type_proteins` tinyint(1) DEFAULT NULL,
  `product_type_immunologicals` tinyint(1) DEFAULT NULL,
  `product_type_vaccines` tinyint(1) DEFAULT NULL,
  `product_type_hormones` tinyint(1) DEFAULT NULL,
  `product_type_toxoid` tinyint(1) DEFAULT NULL,
  `product_type_chemical` tinyint(1) DEFAULT NULL,
  `product_type_medical_device` tinyint(1) DEFAULT NULL,
  `product_type_chemical_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `product_type_medical_device_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `participants_justification` text CHARACTER SET utf8,
  `ecct_not_applicable` tinyint(1) DEFAULT '0',
  `ecct_ref_number` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email_address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `applicant_covering_letter` tinyint(1) DEFAULT NULL,
  `applicant_protocol` tinyint(1) DEFAULT NULL,
  `applicant_patient_information` tinyint(1) DEFAULT NULL,
  `applicant_investigators_brochure` tinyint(1) DEFAULT NULL,
  `applicant_investigators_cv` tinyint(1) DEFAULT NULL,
  `applicant_signed_declaration` tinyint(1) DEFAULT NULL,
  `applicant_financial_declaration` tinyint(1) DEFAULT NULL,
  `applicant_gmp_certificate` tinyint(1) DEFAULT NULL,
  `applicant_indemnity_cover` tinyint(1) DEFAULT NULL,
  `applicant_opinion_letter` tinyint(1) DEFAULT NULL,
  `applicant_approval_letter` tinyint(1) DEFAULT NULL,
  `applicant_statement` tinyint(1) DEFAULT NULL,
  `applicant_participating_countries` tinyint(1) DEFAULT NULL,
  `applicant_addendum` tinyint(1) DEFAULT NULL,
  `applicant_fees` tinyint(1) DEFAULT NULL,
  `applicant_mc10` tinyint(1) DEFAULT NULL,
  `applicant_study_monitors` tinyint(1) DEFAULT NULL,
  `applicant_monitoring_plans` tinyint(1) DEFAULT NULL,
  `applicant_pi_declaration` tinyint(1) DEFAULT NULL,
  `applicant_study_sponsorship` tinyint(1) DEFAULT NULL,
  `applicant_pharmacy_plan` tinyint(1) DEFAULT NULL,
  `applicant_pharmacy_license` tinyint(1) DEFAULT NULL,
  `applicant_study_medicines` tinyint(1) DEFAULT NULL,
  `applicant_insurance_certificate` tinyint(1) DEFAULT NULL,
  `applicant_generic_insurance` tinyint(1) DEFAULT NULL,
  `applicant_ethics_approval` tinyint(1) DEFAULT NULL,
  `applicant_ethics_letter` tinyint(1) DEFAULT NULL,
  `applicant_country_approvals` tinyint(1) DEFAULT NULL,
  `applicant_advertisments` tinyint(1) DEFAULT NULL,
  `applicant_electronic_versions` tinyint(1) DEFAULT NULL,
  `applicant_safety_monitoring` tinyint(1) DEFAULT NULL,
  `applicant_biological_products` tinyint(1) DEFAULT NULL,
  `applicant_dossier` tinyint(1) DEFAULT NULL,
  `placebo_present` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `principal_inclusion_criteria` text CHARACTER SET utf8,
  `principal_exclusion_criteria` text CHARACTER SET utf8,
  `primary_end_points` text CHARACTER SET utf8,
  `scope_diagnosis` tinyint(1) DEFAULT NULL,
  `scope_prophylaxis` tinyint(1) DEFAULT NULL,
  `scope_therapy` tinyint(1) DEFAULT NULL,
  `scope_safety` tinyint(1) DEFAULT NULL,
  `scope_efficacy` tinyint(1) DEFAULT NULL,
  `scope_pharmacokinetic` tinyint(1) DEFAULT NULL,
  `scope_pharmacodynamic` tinyint(1) DEFAULT NULL,
  `scope_bioequivalence` tinyint(1) DEFAULT NULL,
  `scope_dose_response` tinyint(1) DEFAULT NULL,
  `scope_pharmacogenetic` tinyint(1) DEFAULT NULL,
  `scope_pharmacogenomic` tinyint(1) DEFAULT NULL,
  `scope_pharmacoecomomic` tinyint(1) DEFAULT NULL,
  `scope_others` tinyint(1) DEFAULT NULL,
  `scope_others_specify` text CHARACTER SET utf8,
  `trial_human_pharmacology` tinyint(1) DEFAULT NULL,
  `trial_administration_humans` tinyint(1) DEFAULT NULL,
  `trial_bioequivalence_study` tinyint(1) DEFAULT NULL,
  `trial_other` tinyint(1) DEFAULT NULL,
  `trial_other_specify` text CHARACTER SET utf8,
  `trial_therapeutic_exploratory` tinyint(1) DEFAULT NULL,
  `trial_therapeutic_confirmatory` tinyint(1) DEFAULT NULL,
  `trial_therapeutic_use` tinyint(1) DEFAULT NULL,
  `design_controlled` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `site_capacity` varchar(100) DEFAULT NULL,
  `staff_numbers` text,
  `other_details_explanation` text,
  `other_details_regulatory_notapproved` text,
  `other_details_regulatory_approved` text,
  `other_details_regulatory_rejected` text,
  `other_details_regulatory_halted` text,
  `recording_effects` text,
  `tests_done` text CHARACTER SET utf8,
  `recording_method` text,
  `trial_storage` text,
  `measures_compliance` text,
  `evalution_of_results` text,
  `inform_persons` text,
  `inform_staff` text,
  `record_keeping` text,
  `animal_particulars` text,
  `estimated_duration` text,
  `design_controlled_randomised` varchar(255) DEFAULT NULL,
  `design_controlled_open` varchar(255) DEFAULT NULL,
  `design_controlled_single_blind` varchar(255) DEFAULT NULL,
  `design_controlled_double_blind` varchar(255) DEFAULT NULL,
  `design_controlled_parallel_group` varchar(255) DEFAULT NULL,
  `design_controlled_cross_over` varchar(255) DEFAULT NULL,
  `design_controlled_other` varchar(255) DEFAULT NULL,
  `design_controlled_specify` varchar(255) DEFAULT NULL,
  `design_controlled_comparator` varchar(255) DEFAULT NULL,
  `design_controlled_other_medicinal` varchar(255) DEFAULT NULL,
  `design_controlled_placebo` varchar(255) DEFAULT NULL,
  `design_controlled_medicinal_other` varchar(255) DEFAULT NULL,
  `design_controlled_medicinal_specify` varchar(255) DEFAULT NULL,
  `single_site_member_state` varchar(255) DEFAULT NULL,
  `location_of_area` varchar(255) DEFAULT NULL,
  `single_site_physical_address` varchar(255) DEFAULT NULL,
  `single_site_contact_person` varchar(255) DEFAULT NULL,
  `single_site_telephone` varchar(255) DEFAULT NULL,
  `single_site_name` varchar(255) DEFAULT NULL,
  `single_site_physical_address1` varchar(255) DEFAULT NULL,
  `single_site_contact_person1` varchar(255) DEFAULT NULL,
  `single_site_contact_details` varchar(255) DEFAULT NULL,
  `single_site_province_id` int(11) DEFAULT NULL,
  `multiple_sites_member_state` varchar(255) DEFAULT NULL,
  `multiple_countries` char(30) DEFAULT NULL,
  `multiple_member_states` varchar(255) DEFAULT NULL,
  `number_of_sites` varchar(255) DEFAULT NULL,
  `multi_country_list` text,
  `data_monitoring_committee` varchar(255) DEFAULT NULL,
  `total_enrolment_per_site` text,
  `total_participants_worldwide` varchar(255) DEFAULT '',
  `population_less_than_18_years` varchar(255) DEFAULT NULL,
  `population_utero` varchar(255) DEFAULT NULL,
  `population_preterm_newborn` varchar(255) DEFAULT NULL,
  `population_newborn` varchar(255) DEFAULT NULL,
  `population_infant_and_toddler` varchar(255) DEFAULT NULL,
  `population_children` varchar(255) DEFAULT NULL,
  `population_adolescent` varchar(255) DEFAULT NULL,
  `population_above_18` char(30) DEFAULT NULL,
  `population_adult` varchar(255) DEFAULT NULL,
  `population_elderly` varchar(255) DEFAULT NULL,
  `gender_female` tinyint(1) DEFAULT NULL,
  `gender_male` tinyint(1) DEFAULT NULL,
  `subjects_healthy` varchar(55) DEFAULT NULL,
  `subjects_patients` varchar(55) DEFAULT NULL,
  `subjects_vulnerable_populations` varchar(55) DEFAULT NULL,
  `subjects_women_child_bearing` varchar(55) DEFAULT NULL,
  `subjects_women_using_contraception` varchar(55) DEFAULT NULL,
  `subjects_pregnant_women` varchar(55) DEFAULT NULL,
  `subjects_nursing_women` varchar(55) DEFAULT NULL,
  `subjects_emergency_situation` varchar(55) DEFAULT NULL,
  `subjects_incapable_consent` varchar(55) DEFAULT NULL,
  `subjects_children` varchar(115) DEFAULT NULL,
  `subjects_adolescents` varchar(115) DEFAULT NULL,
  `subjects_prisoners` varchar(115) DEFAULT NULL,
  `subjects_refugees` varchar(115) CHARACTER SET utf8 DEFAULT NULL,
  `subjects_elderly` varchar(115) CHARACTER SET utf8 DEFAULT NULL,
  `subjects_unconscious` varchar(115) CHARACTER SET utf8 DEFAULT NULL,
  `subjects_disorders` varchar(115) CHARACTER SET utf8 DEFAULT NULL,
  `subjects_specify` text CHARACTER SET utf8,
  `subjects_others` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `subjects_others_specify` text CHARACTER SET utf8,
  `investigator1_full_name` varchar(255) DEFAULT NULL,
  `investigator1_date_of_birth` date DEFAULT NULL,
  `investigator1_qualification` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `investigator1_professional_address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `investigator1_telephone` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `investigator1_email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `business_name` varchar(155) CHARACTER SET utf8 DEFAULT NULL,
  `business_office` varchar(55) CHARACTER SET utf8 DEFAULT NULL,
  `business_physical_address` varchar(55) CHARACTER SET utf8 DEFAULT NULL,
  `business_telephone` varchar(55) CHARACTER SET utf8 DEFAULT NULL,
  `business_position` varchar(55) CHARACTER SET utf8 DEFAULT NULL,
  `money_source` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `business_field_manufacture` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `organisations_transferred_` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `number_participants` varchar(5) CHARACTER SET utf8 DEFAULT NULL,
  `notification` text CHARACTER SET utf8,
  `approval_date` date DEFAULT NULL,
  `submitted` tinyint(2) DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_date` datetime DEFAULT NULL,
  `deactivated` tinyint(1) DEFAULT NULL,
  `date_submitted` datetime DEFAULT NULL,
  `action_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) DEFAULT 'UnSubmitted',
  `approved` varchar(25) DEFAULT NULL,
  `approved_date` date DEFAULT NULL,
  `approved_reason` text,
  `final_report` text,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `applications`
 
-- Table structure for table `application_stages`
--

CREATE TABLE `application_stages` (
  `id` int(11) NOT NULL,
  `stage_id` int(11) DEFAULT NULL,
  `application_id` int(11) DEFAULT NULL,
  `stage_date` datetime DEFAULT NULL,
  `alt_date` date DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `application_stages`
--
 

--
-- Table structure for table `aros`
--

CREATE TABLE `aros` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Groups', 1, NULL, 1, 10),
(2, NULL, 'Groups', 2, NULL, 11, 24),
(3, NULL, 'Groups', 3, NULL, 25, 48),
(4, NULL, 'Groups', 4, NULL, 49, 234),
(5, 1, 'Users', 1, NULL, 2, 3),
(6, 2, 'Users', 2, NULL, 12, 13),
(7, 3, 'Users', 3, NULL, 26, 27),
(8, 4, 'Users', 4, NULL, 50, 51),
(9, 4, 'Users', 5, NULL, 52, 53),
(10, 4, 'Users', 6, NULL, 54, 55),
(11, 4, 'Users', 7, NULL, 140, 141),
(12, 4, 'Users', 8, NULL, 56, 57),
(13, 4, 'Users', 9, NULL, 58, 59),
(14, 4, 'Users', 10, NULL, 60, 61),
(15, 1, 'Users', 11, NULL, 6, 7),
(16, 2, 'Users', 12, NULL, 14, 15),
(17, 3, 'Users', 13, NULL, 30, 31),
(18, 4, 'Users', 14, NULL, 62, 63),
(19, 4, 'Users', 15, NULL, 64, 65),
(20, 3, 'Users', 16, NULL, 42, 43),
(21, 4, 'Users', 17, NULL, 66, 67),
(22, 26, 'Users', 18, NULL, 248, 249),
(23, 4, 'Users', 19, NULL, 68, 69),
(24, NULL, 'Groups', 5, NULL, 235, 240),
(25, 24, 'Users', 20, NULL, 236, 237),
(26, NULL, 'Groups', 6, NULL, 241, 256),
(27, 3, 'Users', 21, NULL, 28, 29),
(28, 4, 'Users', 22, NULL, 184, 185),
(29, 26, 'Users', 23, NULL, 242, 243),
(30, 4, 'Users', 24, NULL, 70, 71),
(31, 4, 'Users', 25, NULL, 72, 73),
(32, 26, 'Users', 26, NULL, 246, 247),
(33, 4, 'Users', 27, NULL, 74, 75),
(34, 4, 'Users', 28, NULL, 186, 187),
(35, 4, 'Users', 29, NULL, 76, 77),
(36, 4, 'Users', 30, NULL, 78, 79),
(37, 1, 'Users', 31, NULL, 4, 5),
(38, 4, 'Users', 32, NULL, 132, 133),
(39, 4, 'Users', 33, NULL, 80, 81),
(40, 4, 'Users', 34, NULL, 82, 83),
(41, 4, 'Users', 35, NULL, 208, 209),
(42, 4, 'Users', 36, NULL, 84, 85),
(43, 4, 'Users', 37, NULL, 86, 87),
(44, 4, 'Users', 38, NULL, 88, 89),
(45, 4, 'Users', 39, NULL, 90, 91),
(46, 4, 'Users', 40, NULL, 92, 93),
(47, 3, 'Users', 41, NULL, 36, 37),
(48, 4, 'Users', 42, NULL, 94, 95),
(49, 3, 'Users', 43, NULL, 32, 33),
(50, 4, 'Users', 44, NULL, 96, 97),
(51, NULL, 'Groups', 7, NULL, 257, 262),
(52, 51, 'Users', 45, NULL, 258, 259),
(53, 4, 'Users', 46, NULL, 98, 99),
(54, 4, 'Users', 47, NULL, 100, 101),
(55, 4, 'Users', 48, NULL, 102, 103),
(56, 4, 'Users', 49, NULL, 104, 105),
(57, 4, 'Users', 50, NULL, 106, 107),
(58, 4, 'Users', 51, NULL, 108, 109),
(59, 4, 'Users', 52, NULL, 110, 111),
(60, 4, 'Users', 53, NULL, 112, 113),
(61, 4, 'Users', 54, NULL, 114, 115),
(62, 4, 'Users', 55, NULL, 116, 117),
(63, 4, 'Users', 56, NULL, 118, 119),
(64, 4, 'Users', 57, NULL, 120, 121),
(65, 4, 'Users', 58, NULL, 122, 123),
(66, 4, 'Users', 59, NULL, 124, 125),
(67, 4, 'Users', 60, NULL, 126, 127),
(68, 4, 'Users', 61, NULL, 128, 129),
(69, 26, 'Users', 62, NULL, 244, 245),
(70, 4, 'Users', 63, NULL, 130, 131),
(71, 4, 'Users', 64, NULL, 148, 149),
(72, 4, 'Users', 65, NULL, 134, 135),
(73, 4, 'Users', 66, NULL, 136, 137),
(74, 4, 'Users', 67, NULL, 138, 139),
(75, 3, 'Users', 68, NULL, 34, 35),
(76, 26, 'Users', 69, NULL, 250, 251),
(77, 4, 'Users', 70, NULL, 142, 143),
(78, 4, 'Users', 71, NULL, 144, 145),
(79, 2, 'Users', 72, NULL, 16, 17),
(80, 4, 'Users', 73, NULL, 146, 147),
(81, 4, 'Users', 74, NULL, 150, 151),
(82, 4, 'Users', 75, NULL, 152, 153),
(83, 4, 'Users', 76, NULL, 154, 155),
(84, 4, 'Users', 77, NULL, 156, 157),
(85, 4, 'Users', 78, NULL, 158, 159),
(86, 4, 'Users', 79, NULL, 160, 161),
(87, 4, 'Users', 80, NULL, 162, 163),
(88, 4, 'Users', 81, NULL, 164, 165),
(89, 4, 'Users', 82, NULL, 166, 167),
(90, 4, 'Users', 83, NULL, 168, 169),
(91, 4, 'Users', 84, NULL, 170, 171),
(92, 4, 'Users', 85, NULL, 172, 173),
(93, 4, 'Users', 86, NULL, 174, 175),
(94, 4, 'Users', 87, NULL, 176, 177),
(95, 4, 'Users', 88, NULL, 178, 179),
(96, 4, 'Users', 89, NULL, 180, 181),
(97, 4, 'Users', 90, NULL, 182, 183),
(98, 4, 'Users', 91, NULL, 188, 189),
(99, 4, 'Users', 92, NULL, 190, 191),
(100, 4, 'Users', 93, NULL, 192, 193),
(101, 4, 'Users', 94, NULL, 194, 195),
(102, 3, 'Users', 95, NULL, 38, 39),
(103, 2, 'Users', 96, NULL, 18, 19),
(104, 4, 'Users', 97, NULL, 196, 197),
(105, 2, 'Users', 98, NULL, 20, 21),
(106, 3, 'Users', 99, NULL, 40, 41),
(107, 4, 'Users', 100, NULL, 198, 199),
(108, 4, 'Users', 101, NULL, 200, 201),
(109, 4, 'Users', 102, NULL, 202, 203),
(110, 4, 'Users', 103, NULL, 204, 205),
(111, 4, 'Users', 104, NULL, 206, 207),
(112, 4, 'Users', 105, NULL, 210, 211),
(113, 4, 'Users', 106, NULL, 212, 213),
(114, 1, 'Users', 107, NULL, 8, 9),
(115, 4, 'Users', 108, NULL, 214, 215),
(116, 4, 'Users', 109, NULL, 216, 217),
(117, 3, 'Users', 110, NULL, 44, 45),
(118, 26, 'Users', 111, NULL, 252, 253),
(119, 4, 'Users', 112, NULL, 218, 219),
(120, 4, 'Users', 113, NULL, 220, 221),
(121, 4, 'Users', 114, NULL, 222, 223),
(122, 4, 'Users', 115, NULL, 224, 225),
(123, 4, 'Users', 116, NULL, 226, 227),
(124, 2, 'Users', 117, NULL, 22, 23),
(125, 3, 'Users', 118, NULL, 46, 47),
(126, 4, 'Users', 119, NULL, 228, 229),
(127, 4, 'Users', 120, NULL, 230, 231),
(128, 4, 'Users', 121, NULL, 232, 233),
(129, 24, 'Users', 122, NULL, 238, 239),
(130, 26, 'Users', 123, NULL, 254, 255),
(131, 51, 'Users', 124, NULL, 260, 261);

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

CREATE TABLE `aros_acos` (
  `id` int(11) NOT NULL,
  `aro_id` int(11) NOT NULL,
  `aco_id` int(11) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '1', '1', '1', '1'),
(6, 4, 1, '1', '1', '1', '1'),
(10, 4, 179, '1', '1', '1', '1'),
(11, 4, 178, '1', '1', '1', '1'),
(12, 2, 180, '1', '1', '1', '1'),
(13, 3, 180, '1', '1', '1', '1'),
(14, 4, 180, '1', '1', '1', '1'),
(15, 4, 182, '1', '1', '1', '1'),
(16, 4, 218, '1', '1', '1', '1'),
(17, 24, 1, '1', '1', '1', '1'),
(18, 1, 262, '-1', '-1', '-1', '-1'),
(19, 1, 242, '-1', '-1', '-1', '-1'),
(20, 1, 182, '-1', '-1', '-1', '-1'),
(21, 1, 254, '-1', '-1', '-1', '-1'),
(22, 1, 234, '-1', '-1', '-1', '-1'),
(23, 1, 178, '-1', '-1', '-1', '-1'),
(24, 2, 254, '1', '1', '1', '1'),
(25, 2, 262, '1', '1', '1', '1'),
(26, 24, 234, '1', '1', '1', '1'),
(27, 24, 242, '1', '1', '1', '1'),
(28, 3, 275, '1', '1', '1', '1'),
(29, 3, 283, '1', '1', '1', '1'),
(30, 26, 296, '1', '1', '1', '1'),
(31, 26, 304, '1', '1', '1', '1'),
(32, 2, 23, '1', '1', '1', '1'),
(33, 4, 23, '1', '1', '1', '1'),
(34, 4, 30, '1', '1', '1', '1'),
(35, 3, 23, '1', '1', '1', '1'),
(36, 26, 180, '1', '1', '1', '1'),
(37, 26, 23, '1', '1', '1', '1'),
(38, 4, 262, '-1', '-1', '-1', '-1'),
(39, 4, 75, '1', '1', '1', '1'),
(40, 4, 63, '1', '1', '1', '1'),
(41, 4, 199, '1', '1', '1', '1'),
(42, 4, 36, '1', '1', '1', '1'),
(43, 4, 214, '1', '1', '1', '1'),
(44, 4, 206, '1', '1', '1', '1'),
(45, 4, 51, '1', '1', '1', '1'),
(46, 2, 377, '1', '1', '1', '1'),
(47, 4, 88, '1', '1', '1', '1'),
(53, 2, 1, '-1', '-1', '-1', '-1'),
(54, 24, 485, '1', '1', '1', '1'),
(55, 3, 447, '1', '1', '1', '1'),
(56, 26, 467, '1', '1', '1', '1'),
(57, 3, 524, '1', '1', '1', '1'),
(58, 3, 532, '1', '1', '1', '1'),
(59, 26, 550, '1', '1', '1', '1'),
(60, 26, 552, '1', '1', '1', '1'),
(61, 3, 582, '1', '1', '1', '1'),
(62, 3, 584, '1', '1', '1', '1'),
(63, 3, 571, '1', '1', '1', '1'),
(64, 2, 112, '-1', '-1', '-1', '-1'),
(65, 1, 175, '-1', '-1', '-1', '-1'),
(66, 1, 233, '-1', '-1', '-1', '-1'),
(67, 1, 177, '-1', '-1', '-1', '-1'),
(68, 2, 175, '1', '1', '1', '1'),
(69, 4, 177, '1', '1', '1', '1'),
(70, 24, 180, '1', '1', '1', '1'),
(71, 24, 23, '1', '1', '1', '1'),
(72, 24, 233, '1', '1', '1', '1'),
(73, 3, 570, '1', '1', '1', '1'),
(74, 26, 466, '1', '1', '1', '1'),
(75, 2, 332, '1', '1', '1', '1'),
(76, 3, 332, '1', '1', '1', '1'),
(77, 26, 332, '1', '1', '1', '1'),
(78, 1, 412, '-1', '-1', '-1', '-1'),
(79, 1, 401, '-1', '-1', '-1', '-1'),
(80, 1, 609, '1', '1', '1', '1'),
(81, 2, 609, '1', '1', '1', '1'),
(82, 24, 609, '1', '1', '1', '1'),
(83, 3, 609, '1', '1', '1', '1'),
(84, 26, 609, '1', '1', '1', '1'),
(85, 2, 218, '1', '1', '1', '1'),
(86, 24, 218, '1', '1', '1', '1'),
(87, 26, 218, '1', '1', '1', '1'),
(88, 2, 99, '1', '1', '1', '1'),
(89, 4, 99, '1', '1', '1', '1'),
(90, 24, 99, '1', '1', '1', '1'),
(91, 3, 99, '1', '1', '1', '1'),
(92, 26, 99, '1', '1', '1', '1'),
(94, 51, 609, '1', '1', '1', '1'),
(96, 51, 180, '1', '1', '1', '1'),
(97, 51, 23, '1', '1', '1', '1'),
(98, 51, 218, '1', '1', '1', '1'),
(99, 51, 99, '1', '1', '1', '1'),
(100, 2, 1093, '1', '1', '1', '1'),
(101, 51, 1234, '1', '1', '1', '1'),
(102, 2, 570, '-1', '-1', '-1', '-1'),
(103, 2, 177, '-1', '-1', '-1', '-1'),
(104, 2, 233, '-1', '-1', '-1', '-1'),
(105, 4, 175, '-1', '-1', '-1', '-1'),
(106, 4, 233, '-1', '-1', '-1', '-1'),
(107, 4, 570, '-1', '-1', '-1', '-1'),
(108, 4, 112, '-1', '-1', '-1', '-1'),
(109, 3, 1093, '1', '1', '1', '1'),
(110, 2, 1632, '1', '1', '1', '1'),
(111, 2, 1761, '1', '1', '1', '1'),
(112, 3, 1761, '1', '1', '1', '1'),
(113, 26, 1761, '1', '1', '1', '1'),
(114, 2, 1768, '1', '1', '1', '1'),
(115, 3, 1768, '1', '1', '1', '1'),
(116, 26, 1768, '1', '1', '1', '1'),
(117, 2, 1782, '1', '1', '1', '1'),
(118, 3, 1782, '1', '1', '1', '1'),
(119, 26, 1782, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `assign_evaluators`
--

CREATE TABLE `assign_evaluators` (
  `id` int(11) NOT NULL,
  `application_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `category` varchar(25) DEFAULT NULL,
  `user_message` mediumtext,
  `deleted` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assign_evaluators`
--
 

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` int(11) NOT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `dir` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `description` mediumtext,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attachments`
--
 

--
-- Table structure for table `captchas`
--

CREATE TABLE `captchas` (
  `id` int(11) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `image` varbinary(60000) DEFAULT NULL,
  `result` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `used` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `captchas`
--
 

--
-- Table structure for table `captcha_phinxlog`
--

CREATE TABLE `captcha_phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `clinicals`
--

CREATE TABLE `clinicals` (
  `id` int(11) NOT NULL,
  `application_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `clinical_id` int(11) DEFAULT NULL,
  `evaluation_type` varchar(255) NOT NULL DEFAULT 'Initial',
  `sponsor_justification` longtext,
  `sponsor_comment` longtext,
  `low_intervention` varchar(255) DEFAULT NULL,
  `evidence_based` varchar(255) DEFAULT NULL,
  `products_authorised` varchar(255) DEFAULT NULL,
  `poses_risk` varchar(255) DEFAULT NULL,
  `posed_risks_comment` longtext,
  `trial_phase` longtext,
  `therapeutic_condition` longtext,
  `action_mechanism` longtext,
  `development_status` longtext,
  `rationale_acceptable` varchar(255) DEFAULT NULL,
  `objective_acceptable` varchar(255) DEFAULT NULL,
  `endpoint_acceptable` varchar(255) DEFAULT NULL,
  `objective_comments` longtext,
  `secondary_objective_acceptable` varchar(255) DEFAULT NULL,
  `secondary_endpoint_acceptable` varchar(255) DEFAULT NULL,
  `secondary_objective_comments` longtext,
  `study_health_participants` tinyint(1) DEFAULT NULL,
  `study_participants` tinyint(1) DEFAULT NULL,
  `study_adults` tinyint(1) DEFAULT NULL,
  `study_adolescent` tinyint(1) DEFAULT NULL,
  `study_elderly` tinyint(1) DEFAULT NULL,
  `study_male` tinyint(1) DEFAULT NULL,
  `study_female` tinyint(1) DEFAULT NULL,
  `adolescents_age_group` varchar(255) DEFAULT NULL,
  `potential_contraception` varchar(255) DEFAULT NULL,
  `potential_none_contraception` varchar(255) DEFAULT NULL,
  `study_population_comments` longtext,
  `inclusion_acceptable` varchar(255) DEFAULT NULL,
  `inclusion_comments` longtext,
  `exclusion_acceptable` varchar(255) DEFAULT NULL,
  `exclusion_comments` longtext,
  `vulnerable_population` varchar(255) DEFAULT NULL,
  `justifiable_population` varchar(255) DEFAULT NULL,
  `clinical_benefit` varchar(255) DEFAULT NULL,
  `vulnerable_comments` longtext,
  `proposed_study_acceptable` longtext,
  `study_plan_comments` longtext,
  `imp_acceptable` varchar(255) DEFAULT NULL,
  `imp_other` longtext,
  `imp_comments` longtext,
  `comparator_usage` varchar(255) DEFAULT NULL,
  `comparator_comments` longtext,
  `comparator_smpc` tinyint(1) DEFAULT NULL,
  `comparator_international` tinyint(1) DEFAULT NULL,
  `comparator_publications` tinyint(1) DEFAULT NULL,
  `comparator_acceptable` varchar(255) DEFAULT NULL,
  `comparator_workspace_comments` longtext,
  `placebo_usage` varchar(255) DEFAULT NULL,
  `placebo_justified` varchar(255) DEFAULT NULL,
  `placebo_comments` longtext,
  `auxiliary_usage` varchar(255) DEFAULT NULL,
  `auxiliary_justified` varchar(255) DEFAULT NULL,
  `auxiliary_comments` longtext,
  `medical_device_justified` varchar(255) DEFAULT NULL,
  `medical_device_comments` longtext,
  `associated_risks_comments` longtext,
  `emergency_procedure_justified` varchar(255) DEFAULT NULL,
  `additional_measures` varchar(255) DEFAULT NULL,
  `unbinding_comments` longtext,
  `teratogenicity_risk` varchar(255) DEFAULT NULL,
  `contraceptive_acceptable` varchar(255) DEFAULT NULL,
  `proposal_insufficient` varchar(255) DEFAULT NULL,
  `proposal_comments` longtext,
  `male_participants` tinyint(1) DEFAULT NULL,
  `male_participants_comments` longtext,
  `contraception_treatment` tinyint(1) DEFAULT NULL,
  `contraception_treatment_comments` longtext,
  `other_issue_comments` longtext,
  `pregnancy_interval` tinyint(1) DEFAULT NULL,
  `pregnancy_interval_comments` longtext,
  `pregnancy_test` tinyint(1) DEFAULT NULL,
  `pregnancy_test_comments` longtext,
  `postmenopausal` tinyint(1) DEFAULT NULL,
  `postmenopausal_comments` longtext,
  `other_issue` tinyint(1) DEFAULT NULL,
  `general_contraception_comments` longtext,
  `discontinuation_criteria` varchar(255) DEFAULT NULL,
  `criteria_acceptable` varchar(255) DEFAULT NULL,
  `termination_criteria_acceptable` longtext,
  `discontinuation_comments` longtext,
  `permitted_concomitant` varchar(255) DEFAULT NULL,
  `prohibited_concomitant` tinyint(1) DEFAULT NULL,
  `concomitant_comments` longtext,
  `procedures_adequate` tinyint(1) DEFAULT NULL,
  `insufficient_frequency` tinyint(1) DEFAULT NULL,
  `frequency_comments` longtext,
  `relevant_targets` tinyint(1) DEFAULT NULL,
  `relevant_targets_comments` longtext,
  `minimization_measures` tinyint(1) DEFAULT NULL,
  `minimization_measures_comments` longtext,
  `risk_unacceptable` tinyint(1) DEFAULT NULL,
  `risk_unacceptable_comments` longtext,
  `insufficient_followup` tinyint(1) DEFAULT NULL,
  `insufficient_followup_comments` longtext,
  `other_safety` tinyint(1) DEFAULT NULL,
  `other_safety_comments` longtext,
  `rsi_included` varchar(255) DEFAULT NULL,
  `acceptable_document` varchar(255) DEFAULT NULL,
  `acceptable_format` varchar(255) DEFAULT NULL,
  `expected_acceptable` varchar(255) DEFAULT NULL,
  `general_irs_comments` longtext,
  `general_safety_comments` longtext,
  `dsmc_committee` varchar(255) DEFAULT NULL,
  `arrangements_acceptable` varchar(255) DEFAULT NULL,
  `dsmc_comments` longtext,
  `trial_definition_acceptable` varchar(255) DEFAULT NULL,
  `trial_definition_comments` longtext,
  `collection_unacceptable` varchar(255) DEFAULT NULL,
  `collection_unacceptable_comments` longtext,
  `data_policies_acceptable` tinyint(1) DEFAULT NULL,
  `data_policies_acceptable_comments` longtext,
  `unauthorised_unacceptable` tinyint(1) DEFAULT NULL,
  `unauthorised_unacceptable_comments` longtext,
  `measures_unacceptable` tinyint(1) DEFAULT NULL,
  `measures_unacceptable_comments` longtext,
  `breach_unacceptable` tinyint(1) DEFAULT NULL,
  `breach_unacceptable_comments` longtext,
  `other_protection` tinyint(1) DEFAULT NULL,
  `other_protection_comments` longtext,
  `data_protection_comments` longtext,
  `recruitment_unacceptable` tinyint(1) DEFAULT NULL,
  `recruitment_unacceptable_comments` longtext,
  `recruitment_comments` longtext,
  `risk_evaluation_unacceptable` varchar(255) DEFAULT NULL,
  `participants_protection_acceptable` varchar(255) DEFAULT NULL,
  `condition_unmonitored` tinyint(1) DEFAULT NULL,
  `condition_unmonitored_comments` longtext,
  `unsafeguarded_rights` tinyint(1) DEFAULT NULL,
  `unsafeguarded_rights_comments` longtext,
  `unmonitored_threshold` tinyint(1) DEFAULT NULL,
  `unmonitored_threshold_comments` longtext,
  `risk_assessment_comments` longtext,
  `application_acceptable` tinyint(1) DEFAULT NULL,
  `application_acceptable_comments` longtext,
  `supplementary_required` tinyint(1) DEFAULT NULL,
  `supplementary_required_comments` longtext,
  `overal_assessment_comments` longtext,
  `file` varchar(255) DEFAULT NULL,
  `dir` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `chosen` int(11) DEFAULT NULL,
  `submitted` int(11) DEFAULT '0',
  `deleted` datetime DEFAULT CURRENT_TIMESTAMP,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `assessor_discussion` longtext,
  `additional` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clinicals`
--
 

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `foreign_key` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `sender` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `content` longtext,
  `review` mediumtext,
  `manager_feedback` text,
  `submitted` char(25) DEFAULT NULL,
  `ef_submitted` char(5) DEFAULT NULL,
  `approver` int(11) DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--
 

--
-- Table structure for table `committees`
--

CREATE TABLE `committees` (
  `id` int(11) NOT NULL,
  `application_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `telephone_number` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `committees`
--
 
-- --------------------------------------------------------

--
-- Table structure for table `committee_dates`
--

CREATE TABLE `committee_dates` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `meeting_date` date DEFAULT NULL,
  `meeting_number` int(5) DEFAULT NULL,
  `start_time` varchar(255) DEFAULT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `committee_dates`
--
 

--
-- Table structure for table `committee_reviews`
--

CREATE TABLE `committee_reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `application_id` int(11) DEFAULT NULL,
  `decision` varchar(255) DEFAULT NULL,
  `internal_review_comment` text,
  `applicant_review_comment` text,
  `outcome_date` date DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `dir` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `committee_reviews`
--
 

--
-- Table structure for table `compliance`
--

CREATE TABLE `compliance` (
  `id` int(11) NOT NULL,
  `application_id` int(11) DEFAULT NULL,
  `quality_assessment_id` int(11) DEFAULT NULL,
  `site_name` varchar(255) DEFAULT NULL,
  `site_function` varchar(255) DEFAULT NULL,
  `valid_license` tinyint(4) DEFAULT '0',
  `comment` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `compliance`
-- 

 
--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `code` char(2) DEFAULT '',
  `name` text,
  `name_fr` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `database_logs`
--

CREATE TABLE `database_logs` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `message` mediumtext NOT NULL,
  `context` mediumtext,
  `created` timestamp NULL DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `hostname` varchar(50) DEFAULT NULL,
  `uri` mediumtext,
  `refer` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `count` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `database_logs`
--
 

--
-- Table structure for table `database_log_phinxlog`
--

CREATE TABLE `database_log_phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dg_reviews`
--

CREATE TABLE `dg_reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `application_id` int(11) DEFAULT NULL,
  `decision` varchar(255) DEFAULT NULL,
  `internal_review_comment` text,
  `applicant_review_comment` text,
  `authorization_certificate` text,
  `approved_date` date DEFAULT NULL,
  `authorization_letter` tinyint(1) DEFAULT NULL,
  `approval_letter` tinyint(1) DEFAULT NULL,
  `indemnity_forms` tinyint(1) DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dg_reviews`
--
 
-- --------------------------------------------------------

--
-- Table structure for table `evaluations`
--

CREATE TABLE `evaluations` (
  `id` int(11) NOT NULL,
  `application_id` int(11) DEFAULT NULL,
  `evaluation_id` int(11) DEFAULT NULL,
  `evaluation_type` varchar(21) NOT NULL DEFAULT 'Initial',
  `user_id` int(11) DEFAULT NULL,
  `vulnerable_population` varchar(25) DEFAULT NULL,
  `vulnerable_pregnant` tinyint(1) DEFAULT NULL,
  `vulnerable_adolescent` tinyint(1) DEFAULT NULL,
  `vulnerable_children` tinyint(1) DEFAULT NULL,
  `vulnerable_elderly` tinyint(1) DEFAULT NULL,
  `vulnerable_refugees` tinyint(1) DEFAULT NULL,
  `vulnerable_unconscious` tinyint(1) DEFAULT NULL,
  `vulnerable_prisoners` tinyint(1) DEFAULT NULL,
  `vulnerable_mental` tinyint(1) DEFAULT NULL,
  `vulnerable_others` tinyint(1) DEFAULT NULL,
  `justification_adequate` varchar(255) DEFAULT NULL,
  `adequate_provisions` varchar(50) DEFAULT NULL,
  `vulnerable_population_comments` mediumtext,
  `rationale_stated` varchar(255) DEFAULT NULL,
  `hypothesis_explained` varchar(55) DEFAULT NULL,
  `design_sound` varchar(255) DEFAULT NULL,
  `control_arm` varchar(55) DEFAULT NULL,
  `criteria_complete` varchar(255) DEFAULT NULL,
  `subject_allocation` varchar(255) DEFAULT NULL,
  `procedures_appropriate` varchar(255) DEFAULT NULL,
  `drugs_described` varchar(255) DEFAULT NULL,
  `appropriate_criteria` varchar(255) DEFAULT NULL,
  `clinical_procedures` varchar(55) DEFAULT NULL,
  `laboratory_tests` varchar(55) DEFAULT NULL,
  `statistical_basis` varchar(55) DEFAULT NULL,
  `scientific_issues_comments` mediumtext,
  `information_sheet` varchar(55) DEFAULT NULL,
  `proposed_study` varchar(55) DEFAULT NULL,
  `explain_study` varchar(55) DEFAULT NULL,
  `research_duration` varchar(55) DEFAULT NULL,
  `full_description` varchar(55) DEFAULT NULL,
  `nature_discomfort` varchar(55) DEFAULT NULL,
  `possible_benefits` varchar(55) DEFAULT NULL,
  `outline_community` varchar(55) DEFAULT NULL,
  `outline_procedure` varchar(55) DEFAULT NULL,
  `conveyed_persons` varchar(55) DEFAULT NULL,
  `participation_voluntary` varchar(55) DEFAULT NULL,
  `compensation_provided` varchar(55) DEFAULT NULL,
  `alternatives_participation` varchar(55) DEFAULT NULL,
  `contact_research` varchar(55) DEFAULT NULL,
  `subjects_illiterate` varchar(55) DEFAULT NULL,
  `conclude_statement` varchar(55) DEFAULT NULL,
  `cost_participants` varchar(55) DEFAULT NULL,
  `incapable_consent` varchar(55) DEFAULT NULL,
  `research_outcome` varchar(55) DEFAULT NULL,
  `informed_consent_text` mediumtext,
  `recruitment_material` varchar(55) DEFAULT NULL,
  `material_claims` varchar(55) DEFAULT NULL,
  `promises_inappropriate` varchar(55) DEFAULT NULL,
  `study_questionnaires` varchar(55) DEFAULT NULL,
  `attached_proposal` varchar(55) DEFAULT NULL,
  `lay_language` varchar(55) DEFAULT NULL,
  `relevant_answer` varchar(55) DEFAULT NULL,
  `worded_sensitively` varchar(55) DEFAULT NULL,
  `consent_information` varchar(55) DEFAULT NULL,
  `embarrassing_questions` varchar(55) DEFAULT NULL,
  `consent_participant` varchar(55) DEFAULT NULL,
  `describe_confidentiality` varchar(55) DEFAULT NULL,
  `interview_focus` varchar(55) DEFAULT NULL,
  `tapes_stored` varchar(55) DEFAULT NULL,
  `other_materials_comments` mediumtext,
  `investigational_medicines` mediumtext,
  `there_placebo` varchar(55) DEFAULT NULL,
  `new_drug` varchar(55) DEFAULT NULL,
  `new_medicine` varchar(55) DEFAULT NULL,
  `certificate_submitted` varchar(55) DEFAULT NULL,
  `medicines_registered` varchar(55) DEFAULT NULL,
  `brochure_attached` varchar(55) DEFAULT NULL,
  `adr_attached` varchar(55) DEFAULT NULL,
  `dsmb_established` varchar(55) DEFAULT NULL,
  `names_dsmb` varchar(55) DEFAULT NULL,
  `clinical_trials_text` mediumtext,
  `biological_materials` varchar(55) DEFAULT NULL,
  `consent_volume` varchar(55) DEFAULT NULL,
  `consent_procedure` varchar(55) DEFAULT NULL,
  `consent_describe` varchar(55) DEFAULT NULL,
  `consent_provision` varchar(55) DEFAULT NULL,
  `consent_specimens` varchar(55) DEFAULT NULL,
  `proposal_specimens` varchar(55) DEFAULT NULL,
  `genomic_analysis` varchar(55) DEFAULT NULL,
  `insurance_cover` varchar(55) DEFAULT NULL,
  `sponsor_sign` varchar(55) DEFAULT NULL,
  `sign_gcp` varchar(55) DEFAULT NULL,
  `run_study` varchar(55) DEFAULT NULL,
  `cvs_submitted` varchar(55) DEFAULT NULL,
  `ethics_letter` varchar(55) DEFAULT NULL,
  `biological_materials_comments` mediumtext,
  `recommendations` mediumtext,
  `file` varchar(255) DEFAULT NULL,
  `dir` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `signature` tinyint(1) DEFAULT NULL,
  `comment_vulnerable_population` mediumtext,
  `comment_scientific_issues` mediumtext,
  `comment_informed_consent` mediumtext,
  `comment_other_materials` mediumtext,
  `comment_clinical_trials` mediumtext,
  `comment_human_biological` mediumtext,
  `comment_recommendations` mediumtext,
  `submitted` int(2) DEFAULT NULL,
  `chosen` int(11) DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `evaluations`
--
 

--
-- Table structure for table `evaluation_headers`
--

CREATE TABLE `evaluation_headers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `application_id` int(11) DEFAULT NULL,
  `population` text,
  `study_design` text,
  `deleted` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `feedback` mediumtext,
  `deleted` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedbacks`
--
 
-- --------------------------------------------------------

--
-- Table structure for table `final_stages`
--

CREATE TABLE `final_stages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `application_id` int(11) DEFAULT NULL,
  `internal_review_comment` text,
  `applicant_review_comment` text,
  `approved_date` date DEFAULT NULL,
  `authorization_letter` tinyint(1) DEFAULT NULL,
  `indemnity_forms` tinyint(1) DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `finance_annual_approvals`
--

CREATE TABLE `finance_annual_approvals` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `application_id` int(11) DEFAULT NULL,
  `internal_comments` mediumtext,
  `public_comments` mediumtext,
  `outcome` varchar(255) DEFAULT NULL,
  `outcome_date` date DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `dir` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `finance_annual_approvals`
--
 
-- --------------------------------------------------------

--
-- Table structure for table `finance_approvals`
--

CREATE TABLE `finance_approvals` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `application_id` int(11) DEFAULT NULL,
  `internal_comments` mediumtext,
  `public_comments` mediumtext,
  `outcome` varchar(255) DEFAULT NULL,
  `outcome_date` date DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `dir` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `finance_approvals`
--
 

--
-- Table structure for table `gcp_inspections`
--

CREATE TABLE `gcp_inspections` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `application_id` int(11) DEFAULT NULL,
  `decision` varchar(255) DEFAULT NULL,
  `internal_review_comment` text,
  `applicant_review_comment` text,
  `file` varchar(255) DEFAULT NULL,
  `dir` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gcp_inspections`
--

 
-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` mediumtext,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `created`, `modified`) VALUES
(1, 'Administrator', 'Administrators', '2017-12-02 11:39:38', '2017-12-02 11:39:38'),
(2, 'Managers', 'Managers', '2017-12-02 11:39:52', '2017-12-02 11:39:52'),
(3, 'Internal Evaluators', 'Internal Evaluators', '2017-12-02 11:40:12', '2018-01-21 23:36:04'),
(4, 'Principal Investigators', 'Investigators', '2017-12-02 11:40:27', '2017-12-02 11:40:27'),
(5, 'Finance', 'Finance functions', '2018-01-15 22:24:02', '2018-01-15 22:24:02'),
(6, 'External Evaluators', 'External Evaluators', '2018-01-21 23:35:44', '2018-01-21 23:35:44'),
(7, 'Director General', 'Director General Role', '2018-03-04 21:20:16', '2018-03-04 21:20:16');

-- --------------------------------------------------------

--
-- Table structure for table `investigator_contacts`
--

CREATE TABLE `investigator_contacts` (
  `id` int(11) NOT NULL,
  `application_id` int(11) DEFAULT NULL,
  `given_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `family_name` varchar(100) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `professional_address` varchar(255) DEFAULT NULL,
  `telephone` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `investigator_contacts`
--
 

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` int(11) NOT NULL,
  `application_id` int(11) DEFAULT NULL,
  `medicine_name` varchar(255) DEFAULT NULL,
  `quantity_required` varchar(255) DEFAULT NULL,
  `medicine_registered` varchar(10) DEFAULT NULL,
  `drug_details` text,
  `medicine_reaction` text,
  `medicine_therapeutic_effects` text,
  `medicine_registered_details` text,
  `trial_origin_details` text,
  `trials_origin_country` varchar(55) DEFAULT NULL,
  `registered_other_country` varchar(55) DEFAULT NULL,
  `registered_other_country_details` text,
  `application_other_country` text,
  `application_other_country_details` text,
  `rejected_other_country` varchar(55) DEFAULT NULL,
  `rejected_other_country_details` text,
  `exemption_required` text,
  `state_antidote` text,
  `status_medicine` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicines`
--
 

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `content` longtext,
  `type` varchar(255) DEFAULT NULL,
  `description` mediumtext,
  `style` varchar(255) DEFAULT NULL,
  `priority` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `subject`, `content`, `type`, `description`, `style`, `priority`, `created`, `modified`, `deleted`) VALUES
(1, 'applicant_submit_application_email', 'CTR: New Application :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>REF: :protocol_no</p>\r\n\r\n<p>Dear :email_address,</p>\r\n\r\n<p><strong>RE: ACKNOWLEDGEMENT OF RECEIPT OF AN APPLICATION TO CONDUCT A CLINICAL TRIAL :protocol_no</strong></p>\r\n\r\n<p>We acknowledge with thanks receipt of the application to conduct a trial, your temporary reference number is <strong>:protocol_no</strong>. The application will be processed by finance and an invoice issued. Once an invoice is confirmed we will issue a new permanent reference number.</p>\r\n\r\n<p>We appreciate your submission.</p>\r\n\r\n<p><em>pdf_copy&nbsp; :pdf_link</em></p>\r\n\r\n<p>Yours faithfully</p>\r\n\r\n<p><strong>MEDICINES CONTROL AUTHORITY OF ZIMBABWE</strong></p>\r\n', 'email', 'Email sent to applicant after submitting a protocol', 'success', 3, '2017-12-05 21:58:48', '2018-08-31 13:55:57', NULL),
(2, 'applicant_submit_application_notification', 'CTR: Submitted application :protocol_no', '<p>Thank you for submitting the application to MCAZ. An acknowledgement email has been sent to <em>:email_address</em>. Your protocol number is <strong>:protocol_no</strong>.</p>\r\n', 'notification', 'System notification generated for the user when they submit a new Protocol', 'success', 4, '2017-12-05 22:15:10', '2018-01-17 22:21:11', NULL),
(3, 'registration_email', 'CTR: Registration to MCAZ CTR', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p>You are getting this email because you have registered as a new user in the :ctr_site. To activate your account, please click on the link below and then proceed to login</p>\r\n\r\n<p><strong>:activation_link</strong></p>\r\n\r\n<p><em>if you did not register, you can safely ignore this email!</em></p>\r\n', 'email', 'Email Sent to reporter upon successful registration', '', NULL, '2017-12-05 00:00:00', '2018-01-17 22:19:30', NULL),
(4, 'manager_submit_application_email', 'CTR: New Application :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear Sir/Madam,</p>\r\n\r\n<p>A new application :protocol_no, has been submitted from the <a href="https://e-ctr.mcaz.co.zw">online portal</a> and is ready for review.</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ CTR</p>\r\n', 'email', 'Email sent to evaluators when a new application is submitted.', '', NULL, '2017-12-09 14:39:08', '2018-09-13 08:13:39', NULL),
(5, 'manager_submit_application_notification', 'CTR: New Application :protocol_no', '<p>New application :protocol_no submitted on :date_submitted is ready for review.</p>\r\n', 'notification', 'Notification sent to evaluators on new application report submitted.', 'info', 5, '2017-12-09 14:41:28', '2018-01-17 22:24:15', NULL),
(6, 'finance_submit_approval_email', 'CTR: Finance Review :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>REF: :protocol_no</p>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>RE: FINANCE REVIEW OF APPLICATION :protocol_no</strong></p>\r\n\r\n<p>A review has been submitted by finance on <strong>:protocol_no</strong>.</p>\r\n\r\n<p>Internal MCAZ Comments:</p>\r\n\r\n<p>:internal_comments</p>\r\n\r\n<p>Applicant Comments:</p>\r\n\r\n<p>:public_comments</p>\r\n\r\n<p>Yours faithfully</p>\r\n\r\n<p><strong>MEDICINES CONTROL AUTHORITY OF ZIMBABWE</strong></p>\r\n', 'email', 'Email sent to all managers and finance users when a finance approval is conducted.', '', NULL, '2018-01-17 22:34:25', '2018-11-07 09:35:51', NULL),
(7, 'finance_submit_approval_notification', 'CTR: Finance Review :protocol_no', '<p>A receipt has been submitted by finance on application :protocol_no</p>\r\n', 'notification', 'Notification sent when finance review protocol.', 'warning', 1, '2018-01-17 22:35:57', '2018-01-17 22:35:57', NULL),
(8, 'applicant_finance_comments_email', 'CTR: New finance message on :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>REF: :protocol_no</p>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>RE: CLINICAL TRIAL :protocol_no</strong></p>\r\n\r\n<p>We acknowledge with thanks receipt of the application to conduct a trial <strong>:protocol_no</strong>. Kindly review the comments below.</p>\r\n\r\n<p>:public_comments.</p>\r\n\r\n<p>Yours faithfully</p>\r\n\r\n<p><strong>MEDICINES CONTROL AUTHORITY OF ZIMBABWE</strong></p>\r\n', 'email', 'Email sent to applicant when finance submit review with applicant comment', '', NULL, '2018-01-17 22:44:06', '2018-10-20 20:50:42', NULL),
(9, 'applicant_finance_comments_notification', 'CTR: New message on :protocol_no', '<p>Kindly review the comment from MCAZ below:</p>\r\n\r\n<p>:public_comments</p>\r\n', 'notification', 'Notification sent to applicant when MCAZ finance submit comment', 'success', 1, '2018-01-17 22:45:50', '2018-01-17 22:45:50', NULL),
(10, 'manager_assign_evaluator_email', 'CTR: Assigned :protocol_no to :evaluator_name', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: CLINICAL TRIALS :protocol_no</strong></p>\r\n\r\n<p>Application :protocol_no has been assigned to :evaluator_name for review on the <a href="https://e-ctr.mcaz.co.zw">online portal</a>.</p>\r\n\r\n<p>Message:</p>\r\n\r\n<p>:user_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to all managers when manager assigns evaluator ', '', NULL, '2018-01-19 23:04:54', '2018-09-13 08:14:17', NULL),
(11, 'manager_assign_evaluator_notification', 'CTR: :protocol_no assigned to :evaluator_name', '<p>Application :protocol_no has been assigned to :evaluator_name for review.</p>\r\n\r\n<p>Message:</p>\r\n\r\n<p>:user_message</p>\r\n', 'notification', 'Notification sent to managers when they assign an evaluator..', 'danger', 3, '2018-01-19 23:22:26', '2018-01-19 23:22:26', NULL),
(12, 'manager_assign_evaluator_message', 'CTR: :protocol_no assigned to :evaluator_name', '<p>Dear :evaluator_name,</p>\r\n\r\n<p>You have been assigned application :protocol_no by :name</p>\r\n\r\n<p>:user_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>:name</p>\r\n', 'message', 'Message sent to evaluator ', 'danger', 1, '2018-01-19 23:33:09', '2018-01-19 23:33:09', NULL),
(13, 'evaluator_assigned_manager_email', 'CTR: Assigned :protocol_no by :name', '<p>Dear :evaluator_name,</p>\r\n\r\n<p>You have been assigned :protocol_no by :name for review.</p>\r\n\r\n<p>Message</p>\r\n\r\n<p>:user_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>:name</p>\r\n', 'email', 'Email sent to evaluator after being assigned by manager', '', NULL, '2018-01-19 23:35:39', '2018-01-19 23:54:28', NULL),
(14, 'evaluator_assigned_manager_notification', 'CTR: Assigned :protocol_no by :name', '<p>You have been assigned :protocol_no by :name for review.</p>\r\n', 'notification', 'notification sent to evaluator after being assigned by manager', 'danger', 1, '2018-01-19 23:37:01', '2018-01-19 23:54:40', NULL),
(15, 'applicant_submit_amendment_email', 'CTR: New Amendment :amend_no for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>REF: :protocol_no</p>\r\n\r\n<p>Dear :applicant_name,</p>\r\n\r\n<p><strong>RE: ACKNOWLEDGEMENT OF RECEIPT OF AMENDMENT TO CLINICAL TRIAL :protocol_no</strong></p>\r\n\r\n<p>We acknowledge with thanks receipt of the amendment :amend_no to clinical trial <strong>:protocol_no</strong>. The report will be processed and tabled for consideration by the Pharmacovigilance and Clinical Trials Committee. We will notify you of the Committee&rsquo;s decision in due course.</p>\r\n\r\n<p>We appreciate your submission.</p>\r\n\r\n<p><em>pdf_copy&nbsp; :pdf_link</em></p>\r\n\r\n<p>Yours faithfully</p>\r\n\r\n<p><strong>MEDICINES CONTROL AUTHORITY OF ZIMBABWE</strong></p>\r\n', 'email', 'Email sent to applicant after successful submission of amendment', '', NULL, '2018-01-20 13:37:38', '2018-05-24 06:40:39', NULL),
(16, 'applicant_submit_amendment_notification', 'CTR: New Amendment :amend_no for :protocol_no', '<p>Thank you for submitting the amendment :amend_no for :protocol_no to MCAZ. An acknowledgement email has been sent to <em>:email_address</em>.</p>\r\n', 'notification', 'Notificition sent to applicant after submitting an amendment.', 'info', 1, '2018-01-20 13:50:27', '2018-03-09 12:42:03', NULL),
(17, 'manager_submit_amendment_email', 'CTR: New Amendment for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p>A new amendment :amend_no for :protocol_no, has been submitted from the <a href="https://e-ctr.mcaz.co.zw">online portal</a> and is ready for review.</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ CTR</p>\r\n', 'email', 'Email sent to managers when amendment is submitted', '', NULL, '2018-01-20 13:56:52', '2018-11-08 05:42:28', NULL),
(18, 'manager_submit_amendment_notification', 'CTR: New Amendment for :protocol_no', '<p>New amendment :amend_no for :protocol_no submitted on :date_submitted is ready for review.</p>\r\n', 'notification', 'Notification sent to manager when amendment submitted', 'success', 1, '2018-01-20 13:59:04', '2018-03-09 18:10:09', NULL),
(19, 'manager_create_review_email', 'CTR: New Review for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: REVIEW CLINICAL TRIAL :protocol_no</strong></p>\r\n\r\n<p>A new review has been submitted for :protocol_no by :evaluator_name on the <a href="https://e-ctr.mcaz.co.zw">online portal</a></p>\r\n\r\n<p>Message:</p>\r\n\r\n<p>:user_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to managers and assigned evaluators when a new review is created for a protocol', '', NULL, '2018-01-21 14:48:40', '2018-09-13 08:16:09', NULL),
(20, 'manager_create_review_notification', 'CTR: New Review for :protocol_no', '<p>A new review has been submitted for :protocol_no by :evaluator_name.</p>\r\n\r\n<p>Message:</p>\r\n\r\n<p>:user_message</p>\r\n', 'notification', 'Notification sent to managers and assigned evaluators when a PVCT review is conducted', 'success', 1, '2018-01-21 15:17:05', '2018-01-21 18:12:24', NULL),
(21, 'manager_create_committee_review_email', 'CTR: New PVCT Review for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: PVCT REVIEW CLINICAL TRIAL :protocol_no</strong></p>\r\n\r\n<p>A new PVCT review has been submitted for :protocol_no by :evaluator_name on :outcome_date on the <a href="https://e-ctr.mcaz.co.zw">online portal</a>.</p>\r\n\r\n<p>Decision:</p>\r\n\r\n<p>:decision</p>\r\n\r\n<p>Internal Message:</p>\r\n\r\n<p>:internal_message</p>\r\n\r\n<p>Applicant&#39;s Message:</p>\r\n\r\n<p>:user_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to managers and assigned evaluators when a new director general review is created for a protocol', '', NULL, '2018-01-21 18:10:35', '2018-09-13 08:17:43', NULL),
(22, 'manager_create_committee_review_notification', 'CTR: New PVCT Review for :protocol_no', '<p>A new PVCT review has been submitted for :protocol_no by :evaluator_name on :outcome_date.</p>\r\n\r\n<p>Decision:</p>\r\n\r\n<p>:decision</p>\r\n\r\n<p>Internal Message:</p>\r\n\r\n<p>:internal_message</p>\r\n\r\n<p>Applicant&#39;s Message:</p>\r\n\r\n<p>:user_message</p>\r\n', 'notification', 'Notification sent to managers and assigned evaluators when a PVCT review is conducted', 'danger', 1, '2018-01-21 18:12:22', '2018-03-03 10:40:21', NULL),
(23, 'manager_create_reporter_request_email', 'CTR: Request for info for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: REQUEST FOR INFO FOR :protocol_no</strong></p>\r\n\r\n<p>:evaluator_name has requested for info in regards to :protocol_no on the <a href="https://e-ctr.mcaz.co.zw">online portal</a>.</p>\r\n\r\n<p>MCAZ Message:</p>\r\n\r\n<p>:internal_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to all managers and reporters when a request for info is raised ', '', NULL, '2018-01-22 00:11:34', '2018-09-13 08:20:20', NULL),
(24, 'manager_create_reporter_request_notification', 'CTR: Request for info for :protocol_no', '<p>:evaluator_name has requested for info in regards to :protocol_no.</p>\r\n\r\n<p>MCAZ Message:</p>\r\n\r\n<p>:internal_message</p>\r\n', 'notification', 'Notification sent to managers and evaluators when request for info raised.', 'info', 5, '2018-01-22 00:12:56', '2018-01-22 00:12:56', NULL),
(25, 'applicant_get_request_email', 'CTR: Request for info for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: REQUEST FOR INFO FOR CLINICAL TRIAL :protocol_no</strong></p>\r\n\r\n<p>Kindly review the request for info for :protocol_no.</p>\r\n\r\n<p>MCAZ Message:</p>\r\n\r\n<p>:internal_message</p>\r\n\r\n<p>:respond</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to applicant after request for info by MCAZ evaluators', '', NULL, '2018-01-22 00:23:52', '2018-09-02 13:08:38', NULL),
(26, 'applicant_get_request_notification', 'CTR: Request for info for :protocol_no', '<p>Kindly review the request for info for :protocol_no.</p>\r\n\r\n<p>MCAZ Message:</p>\r\n\r\n<p>:internal_message</p>\r\n\r\n<p>:respond</p>\r\n', 'notification', 'Notification sent to applicant after request for info by MCAZ evaluators', 'warning', 1, '2018-01-22 00:25:16', '2018-09-02 13:10:03', NULL),
(27, 'applicant_respond_request_email', 'CTR: Communication for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: COMMUNICATION FOR :protocol_no</strong></p>\r\n\r\n<p>:applicant_name has sent communication for :protocol_no.</p>\r\n\r\n<p>Applicant Message:</p>\r\n\r\n<p>:applicant_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to managers and assigned evaluators when an applicant responds to a request for more info', '', NULL, '2018-01-22 01:09:41', '2018-01-24 00:52:31', NULL),
(28, 'applicant_respond_request_notification', 'CTR: Communication for :protocol_no', '<p>:applicant_name has sent communication for :protocol_no.</p>\r\n\r\n<p>Applicant Message:</p>\r\n\r\n<p>:applicant_message</p>\r\n', 'notification', 'Notification sent to managers and assigned evaluators when an applicant responds to a request for more info', 'success', 2, '2018-01-22 01:09:46', '2018-01-24 00:51:44', NULL),
(29, 'applicant_send_request_email', 'CTR: Response for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: RESPONSE FOR CLINICAL TRIAL :protocol_no</strong></p>\r\n\r\n<p>Your response for :protocol_no has been successfully sent to MCAZ.</p>\r\n\r\n<p>Message:</p>\r\n\r\n<p>:applicant_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to applicant after responding to request for more info', '', NULL, '2018-01-22 01:16:09', '2018-01-22 01:16:09', NULL),
(30, 'applicant_send_request_notification', 'CTR: Response for :protocol_no', '<p>Your response for :protocol_no has been successfully sent to MCAZ.</p>\r\n\r\n<p>Message:</p>\r\n\r\n<p>:applicant_message</p>\r\n', 'notification', 'Notification sent to applicant after responding to request for more info', 'warning', 1, '2018-01-22 01:16:12', '2018-01-22 01:16:12', NULL),
(31, 'forgot_password_email', 'CTR : Forgot Password', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p>You requested for your password to be reset on the Clinical Trials platform.</p>\r\n\r\n<p>To reset your password, click on the link below.</p>\r\n\r\n<p><strong>:reset_password_link</strong></p>\r\n\r\n<p>If you click on the link, your new password will be&nbsp;<strong>:new_password</strong>. Ensure you change it after log in.</p>\r\n\r\n<p><em>if&nbsp; you did not request for your password to be reset, you may safely ignore this email</em></p>\r\n', 'email', 'Email sent to Investigator to reset password', '', NULL, '2018-01-03 02:23:24', '2018-11-22 12:51:33', NULL),
(32, 'applicant_section75_request_email', 'CTR: Section 75 request for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: SECTION 75 REQUEST FOR :protocol_no</strong></p>\r\n\r\n<p>:applicant_name has sent a request in regards to :protocol_no.</p>\r\n\r\n<p>Applicant Comment:</p>\r\n\r\n<p>:applicant_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to managers and assigned evaluators when an applicant sends a section 75 application', '', NULL, '2018-01-23 21:27:40', '2018-01-23 21:27:40', NULL),
(33, 'applicant_section75_request_notification', 'CTR: Section 75 request for :protocol_no', '<p>Section 75 Request.</p>\r\n\r\n<p>:name has sent a section 75 request in regards to :protocol_no.</p>\r\n\r\n<p>Applicant Comment:</p>\r\n\r\n<p>:applicant_message</p>\r\n', 'notification', 'Notification sent to managers and assigned evaluators when an applicant sends a section 75 application', 'danger', 1, '2018-01-23 21:29:26', '2018-11-13 08:52:44', NULL),
(34, 'manager_create_section75_email', 'CTR: New Section 75 review for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: SECTION 75 REVIEW FOR :protocol_no</strong></p>\r\n\r\n<p>A new section 75 review has been submitted for :protocol_no by :evaluator_name on the <a href="https://e-ctr.mcaz.co.zw">online portal</a>.</p>\r\n\r\n<p>Internal Message:</p>\r\n\r\n<p>:internal_message</p>\r\n\r\n<p>Applicant&#39;s Message:</p>\r\n\r\n<p>:user_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to managers and assigned evaluators when a new section 75 review is created for a protocol', '', NULL, '2018-01-23 22:04:02', '2018-09-13 08:21:06', NULL),
(35, 'manager_create_section75_notification', 'CTR: New Section 75 review for :protocol_no', '<p>A new section 75 review has been submitted for :protocol_no by :evaluator_name.</p>\r\n\r\n<p>Internal Message:</p>\r\n\r\n<p>:internal_message</p>\r\n\r\n<p>Applicant&#39;s Message:</p>\r\n\r\n<p>:user_message</p>\r\n', 'notification', 'Notification sent to managers and assigned evaluators when a new section 75 review is created for a protocol', 'info', 5, '2018-01-23 22:05:04', '2018-01-23 22:22:37', NULL),
(36, 'applicant_send_section75_email', 'CTR: Section 75 request for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: SECTION 75 REQUEST FOR :protocol_no</strong></p>\r\n\r\n<p>Your section 75 request for :protocol_no has been sent to MCAZ.</p>\r\n\r\n<p>Comment:</p>\r\n\r\n<p>:applicant_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to applicant after submitting a section 75 request', '', NULL, '2018-01-23 22:14:19', '2018-01-23 22:14:19', NULL),
(37, 'manager_applicant_section75_email', 'CTR: New Section 75 review for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: SECTION 75 REVIEW FOR :protocol_no</strong></p>\r\n\r\n<p>A new section 75 review has been submitted for :protocol_no by MCAZ on the <a href="https://e-ctr.mcaz.co.zw">online portal</a>.</p>\r\n\r\n<p>Decision: :decision</p>\r\n\r\n<p>Message:</p>\r\n\r\n<p>:user_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to applicant after MCAZ review and decision', '', NULL, '2018-01-23 22:22:14', '2018-09-13 08:22:04', NULL),
(38, 'manager_applicant_section75_notification', 'CTR: New Section 75 review for :protocol_no', '<p>A new section 75 review has been submitted for :protocol_no by MCAZ.</p>\r\n\r\n<p>Decision: :decision</p>\r\n\r\n<p>Message:</p>\r\n\r\n<p>:user_message</p>\r\n', 'notification', 'Notification sent to applicant after MCAZ review and decision', 'warning', 5, '2018-01-23 22:22:19', '2018-01-23 22:22:19', NULL),
(39, 'applicant_notification_managers_email', 'CTR: New Notification for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: NOTIFICATION FOR :protocol_no</strong></p>\r\n\r\n<p>:applicant_name has sent notification(s) in regards to :protocol_no.</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to managers and assigned evaluators when the applicant submits a notification', '', NULL, '2018-01-23 23:21:32', '2018-01-23 23:21:32', NULL),
(40, 'applicant_notification_managers_notification', 'CTR: New Notification for :protocol_no', '<p>Notification (DSMB report, clarification memo, safety report etc) has been submitted.</p>\r\n\r\n<p>:applicant_name has sent notification(s) in regards to :protocol_no.</p>\r\n', 'notification', 'Notification sent to managers and assigned evaluators when the applicant submits a notification', 'info', 1, '2018-01-23 23:21:45', '2018-08-31 21:16:44', NULL),
(41, 'applicant_send_notification_email', 'CTR: New Notification for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: NOTIFICATION FOR :protocol_no</strong></p>\r\n\r\n<p>Notification(s) for :protocol_no sent to MCAZ.</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to applicant after successfully submitting a notification', '', NULL, '2018-01-23 23:27:50', '2018-01-23 23:27:50', NULL),
(42, 'applicant_send_notification', 'CTR: New Notification for :protocol_no', '<p>Notification(s) for :protocol_no sent to MCAZ.</p>\r\n', 'notification', 'Notification sent to applicant after successfully submitting a notification', 'info', 5, '2018-01-23 23:27:55', '2018-01-23 23:27:55', NULL),
(43, 'manager_create_gcp_email', 'CTR: New GCP Inspection for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: GCP INSPECTION FOR :protocol_no</strong></p>\r\n\r\n<p>A new GCP inspection has been submitted for :protocol_no by :evaluator_name on the <a href="https://e-ctr.mcaz.co.zw">online portal.</a></p>\r\n\r\n<p>Internal Message:</p>\r\n\r\n<p>:internal_message</p>\r\n\r\n<p>Applicant&#39;s Message:</p>\r\n\r\n<p>:user_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to managers and assigned evaluators when a new GCP inspection is conducted for a protocol', '', NULL, '2018-01-24 00:12:21', '2018-09-13 08:22:45', NULL),
(44, 'manager_create_gcp_notification', 'CTR: New GCP Inspection for :protocol_no', '<p>A new GCP inspection has been submitted for :protocol_no by :evaluator_name.</p>\r\n\r\n<p>Internal Message:</p>\r\n\r\n<p>:internal_message</p>\r\n\r\n<p>Applicant&#39;s Message:</p>\r\n\r\n<p>:user_message</p>\r\n', 'notification', 'Notification sent to managers and assigned evaluators when a new GCP inspection is conducted for a protocol', 'warning', 4, '2018-01-24 00:12:26', '2018-01-24 00:12:26', NULL),
(45, 'manager_applicant_gcp_email', 'CTR: New GCP Inspection for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: GCP INSPECTION FOR :protocol_no</strong></p>\r\n\r\n<p>A GCP Inspection review has been submitted for :protocol_no by MCAZ on the <a href="https://e-ctr.mcaz.co.zw">online portal.</a></p>\r\n\r\n<p>Message:</p>\r\n\r\n<p>:user_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to applicant after MCAZ GCP Inspection', '', NULL, '2018-01-24 00:18:54', '2018-09-13 08:23:37', NULL),
(46, 'manager_applicant_gcp_notification', 'CTR: New GCP Inspection for :protocol_no', '<p>A GCP Inspection review has been submitted for :protocol_no by MCAZ.</p>\r\n\r\n<p>Message:</p>\r\n\r\n<p>:user_message</p>\r\n', 'notification', 'Notification sent to applicant after MCAZ GCP Inspection', 'success', 2, '2018-01-24 00:18:57', '2018-01-24 00:18:57', NULL),
(47, 'applicant_gcp_request_email', 'CTR: GCP inspection for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: GCP INSPECTION FOR :protocol_no</strong></p>\r\n\r\n<p>:applicant_name has sent a gcp inspection notification in regards to :protocol_no.</p>\r\n\r\n<p>Applicant Comment:</p>\r\n\r\n<p>:applicant_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to managers and assigned evaluators when an applicant sends a response to gcp inspection', '', NULL, '2018-01-24 00:35:17', '2018-01-24 00:35:17', NULL),
(48, 'applicant_gcp_request_notification', 'CTR: GCP inspection for :protocol_no', '<p>:applicant_name has sent a gcp inspection notification in regards to :protocol_no.</p>\r\n\r\n<p>Applicant Comment:</p>\r\n\r\n<p>:applicant_message</p>\r\n', 'notification', 'Notification sent to managers and assigned evaluators when an applicant sends a response to gcp inspection', 'warning', 3, '2018-01-24 00:35:20', '2018-01-24 00:40:53', NULL),
(49, 'applicant_send_gcp_email', 'CTR: New GCP Inspection comment for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: GCP INSPECTION COMMENT FOR :protocol_no</strong></p>\r\n\r\n<p>Your feedback on the GCP Inspection for :protocol_no has been sent to MCAZ.</p>\r\n\r\n<p>Comment:</p>\r\n\r\n<p>:applicant_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to applicant after submitting a gcp inspection feedback', '', NULL, '2018-01-24 00:39:16', '2018-01-24 00:39:16', NULL),
(50, 'applicant_gcp_inspection_notification', 'CTR: New GCP Inspection comment for :protocol_no', '<p>Your feedback on the GCP Inspection for :protocol_no has been sent to MCAZ.</p>\r\n\r\n<p>Comment:</p>\r\n\r\n<p>:applicant_message</p>\r\n', 'notification', 'Notification sent to applicant after submitting a gcp inspection feedback', 'warning', 4, '2018-01-24 00:40:33', '2018-01-24 00:40:33', NULL),
(51, 'manager_create_dg_review_email', 'CTR: New DG Review for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: DIRECTOR GENERAL REVIEW OF CLINICAL TRIAL :protocol_no</strong></p>\r\n\r\n<p>A new review by the director general has been submitted for :protocol_no by :evaluator_name on the <a href="https://e-ctr.mcaz.co.zw">online portal</a>.</p>\r\n\r\n<p>Internal Message:</p>\r\n\r\n<p>:internal_message</p>\r\n\r\n<p>Applicant&#39;s Message:</p>\r\n\r\n<p>:user_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to managers and assigned evaluators when a new director general review is created for a protocol', '', NULL, '2018-02-11 05:19:52', '2018-09-13 08:28:40', NULL),
(52, 'manager_create_dg_review_notification', 'CTR: New DG Review for :protocol_no', '<p>A new review by the director general has been submitted for :protocol_no by :evaluator_name.</p>\r\n\r\n<p>Internal Message:</p>\r\n\r\n<p>:internal_message</p>\r\n\r\n<p>Applicant&#39;s Message:</p>\r\n\r\n<p>:user_message</p>\r\n', 'notification', 'Notification sent to managers and assigned evaluators when a review by the director general is conducted', 'danger', 1, '2018-02-11 05:21:52', '2018-02-11 05:21:52', NULL),
(53, 'director_general_committee_review_email', 'CTR: PVCT Review for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: PVCT REVIEW CLINICAL TRIAL :protocol_no</strong></p>\r\n\r\n<p>A new PVCT Committee review has been submitted for :protocol_no on :outcome_date. Kindly review recommendations.</p>\r\n\r\n<p>Decision:</p>\r\n\r\n<p>:decision</p>\r\n\r\n<p>Internal Message:</p>\r\n\r\n<p>:internal_message</p>\r\n\r\n<p>Applicant&#39;s Message:</p>\r\n\r\n<p>:user_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to Secretary General after successful review of application by PVCT committee.', '', NULL, '2018-03-03 09:50:24', '2018-03-03 12:07:58', NULL),
(54, 'director_general_committee_review_notification', 'CTR: New PVCT Review for :protocol_no', '<p>A new PVCT Committee review has been submitted for :protocol_no on :outcome_date. Kindly review recommendations.</p>\r\n\r\n<p>Decision:</p>\r\n\r\n<p>:decision</p>\r\n\r\n<p>Internal Message:</p>\r\n\r\n<p>:user_message</p>\r\n\r\n<p>Applicant&#39;s Message:</p>\r\n\r\n<p>:user_message</p>\r\n', 'notification', 'Notification sent to Secretary General after recommendation for approval by PVCT review', 'success', 1, '2018-03-03 09:54:05', '2018-03-03 12:22:44', NULL),
(55, 'applicant_committee_review_email', 'CTR: PVCT Committee Review for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: PVCT COMMITTEE REVIEW FOR CLINICAL TRIAL :protocol_no</strong></p>\r\n\r\n<p>A new PVCT Committee review has been submitted for :protocol_no on :outcome_date.</p>\r\n\r\n<p>Applicant&#39;s Message:</p>\r\n\r\n<p>:user_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to applicant after successful PVCT Committee review.', '', NULL, '2018-03-03 09:59:37', '2018-10-08 18:20:24', NULL),
(56, 'applicant_committee_review_notification', 'CTR: PVCT Review for :protocol_no', '<p>A new PVCT Committee review has been submitted for :protocol_no on :outcome_date.</p>\r\n\r\n<p>Applicant&#39;s Message:</p>\r\n\r\n<p>:user_message</p>\r\n', 'notification', 'Notification sent to applicant after PVCT Committee Review.', 'danger', 1, '2018-03-03 10:02:01', '2018-10-08 18:20:39', NULL),
(57, 'director_general_decision_email', 'CTR: New DG Review for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: DIRECTOR GENERAL REVIEW OF CLINICAL TRIAL :protocol_no</strong></p>\r\n\r\n<p>A new review by the director general has been submitted for :protocol_no on :approval_date.</p>\r\n\r\n<p>Decision:</p>\r\n\r\n<p>:decision</p>\r\n\r\n<p>Internal Message:</p>\r\n\r\n<p>:internal_message</p>\r\n\r\n<p>Applicant&#39;s Message:</p>\r\n\r\n<p>:user_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to Director General After successful entering decision', '', NULL, '2018-03-03 13:09:47', '2018-03-03 13:09:47', NULL),
(58, 'director_general_decision_notification', 'CTR: New DG Review for :protocol_no', '<p>A new review by the director general has been submitted for :protocol_no on :approval_date.</p>\r\n\r\n<p>Decision:</p>\r\n\r\n<p>:decision</p>\r\n\r\n<p>Internal Message:</p>\r\n\r\n<p>:internal_message</p>\r\n\r\n<p>Applicant&#39;s Message:</p>\r\n\r\n<p>:user_message</p>\r\n', 'notification', 'Notification sent to Director General after decision', 'info', 3, '2018-03-03 13:14:38', '2018-03-03 13:14:38', NULL),
(59, 'manager_director_general_email', 'CTR: New DG Review for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: DIRECTOR GENERAL REVIEW OF CLINICAL TRIAL :protocol_no</strong></p>\r\n\r\n<p>A new review by the director general has been submitted on the <a href="https://e-ctr.mcaz.co.zw">online portal</a> for :protocol_no on :approved_date.</p>\r\n\r\n<p>Decision:</p>\r\n\r\n<p>:decision</p>\r\n\r\n<p>Internal Message:</p>\r\n\r\n<p>:internal_message</p>\r\n\r\n<p>Applicant&#39;s Message:</p>\r\n\r\n<p>:user_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to managers after Director General Decision', '', NULL, '2018-03-03 13:14:57', '2018-09-13 08:29:48', NULL),
(60, 'manager_director_general_notification', 'CTR: New DG Review for :protocol_no', '<p>A new review by the director general has been submitted for :protocol_no on :approval_date.</p>\r\n\r\n<p>Decision:</p>\r\n\r\n<p>:decision</p>\r\n\r\n<p>Internal Message:</p>\r\n\r\n<p>:internal_message</p>\r\n\r\n<p>Applicant&#39;s Message:</p>\r\n\r\n<p>:user_message</p>\r\n', 'notification', 'Notification sent to managers after successful Director General Review', 'danger', 1, '2018-03-03 13:16:01', '2018-03-03 13:16:01', NULL),
(61, 'applicant_director_general_email', 'CTR: New Director General Review for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: DIRECTOR GENERAL REVIEW OF CLINICAL TRIAL :protocol_no</strong></p>\r\n\r\n<p>A new review by the director general has been submitted for :protocol_no on :approved_date. If the application is authorized, kindly upload the indemnity forms.</p>\r\n\r\n<p>Decision:</p>\r\n\r\n<p>:decision</p>\r\n\r\n<p>Message:</p>\r\n\r\n<p>:user_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to applicant when Director General Makes Decision', '', NULL, '2018-03-03 13:26:55', '2018-04-03 12:16:53', NULL),
(62, 'applicant_director_general_notification', 'CTR: New Director General Review for :protocol_no', '<p>A new review by the director general has been submitted for :protocol_no on :approved_date. If the application is approved, kindly upload the indemnity forms.</p>\r\n\r\n<p>Decision:</p>\r\n\r\n<p>:decision</p>\r\n\r\n<p>Message:</p>\r\n\r\n<p>:user_message</p>\r\n', 'notification', 'Notification sent to Applicant when Director General Makes Decision', 'danger', 1, '2018-03-03 13:28:41', '2018-04-03 12:17:26', NULL),
(63, 'director_general_final_email', 'CTR: Final report for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: FINAL REPORT FOR :protocol_no</strong></p>\r\n\r\n<p>Final report has been submitted for :protocol_no on :approved_date.</p>\r\n\r\n<p>Message:</p>\r\n\r\n<p>:user_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to Director General when the final report has been submitted by the applicant', '', NULL, '2018-03-03 17:25:12', '2018-04-03 20:26:07', NULL),
(64, 'director_general_final_notification', 'CTR: Final report for :protocol_no', '<p>Final report has been submitted for :protocol_no on :approved_date.</p>\r\n\r\n<p>Message:</p>\r\n\r\n<p>:user_message</p>\r\n', 'notification', 'Notification sent to Director General when the final report has been issued', 'warning', 1, '2018-03-03 17:26:47', '2018-04-03 20:27:21', NULL),
(65, 'manager_final_stage_email', 'CTR: Final report for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: FINAL REPORT FOR :protocol_no</strong></p>\r\n\r\n<p>Final report has been submitted on the <a href="https://e-ctr.mcaz.co.zw">online portal</a> for :protocol_no on :approved_date.</p>\r\n\r\n<p>Message:</p>\r\n\r\n<p>:user_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to managers when final stage approval has been conducted', '', NULL, '2018-03-03 17:31:12', '2018-09-13 08:31:08', NULL),
(66, 'manager_final_stage_notification', 'CTR: Final report for :protocol_no', '<p>Final Report has been submitted for :protocol_no on :approved_date.</p>\r\n\r\n<p>Message:</p>\r\n\r\n<p>:user_message</p>\r\n', 'notification', 'Notification sent to managers when final report has been submitted', 'success', 1, '2018-03-03 17:32:11', '2018-04-03 20:30:11', NULL),
(67, 'applicant_final_stage_email', 'CTR: Final report for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: FINAL REPORT FOR :protocol_no</strong></p>\r\n\r\n<p>Final report has been submitted for :protocol_no on :approved_date.</p>\r\n\r\n<p>Message:</p>\r\n\r\n<p>:user_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to applicant when final stage has been submitted', '', NULL, '2018-03-03 17:33:53', '2018-04-03 20:31:32', NULL),
(68, 'applicant_final_stage_notification', 'CTR: Final report for :protocol_no', '<p>Final report has been submitted for :protocol_no on :approved_date.</p>\r\n\r\n<p>Message:</p>\r\n\r\n<p>:user_message</p>\r\n', 'notification', 'Notification sent to applicant when final report has been submitted', 'warning', 1, '2018-03-03 17:35:00', '2018-04-03 20:32:10', NULL),
(69, 'manager_applicant_query_email', 'CTR: Correspondence to Applicant for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: CORRESPONDENCE REGARDING :protocol_no</strong></p>\r\n\r\n<p>New query/comment has been raised by the PVCT committe for :protocol_no on the <a href="https://e-ctr.mcaz.co.zw">online portal</a>.</p>\r\n\r\n<p>Subject: :subject</p>\r\n\r\n<p>:content</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to managers when query/comment raised by PVCT Committee', '', NULL, '2018-03-03 21:23:09', '2018-09-13 08:32:32', NULL),
(70, 'manager_applicant_query_notification', 'CTR: Correspondence to Applicant for :protocol_no', '<p>New query/comment has been raised by the PVCT committe for :protocol_no.</p>\r\n\r\n<p>Subject: :subject</p>\r\n\r\n<p>:content</p>\r\n', 'notification', 'Notification sent to managers when new query/comment raised', 'warning', 3, '2018-03-03 21:24:52', '2018-03-03 21:24:52', NULL),
(71, 'applicant_pvct_query_email', 'CTR: PVCT Query on :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: PVCT QUERY REGARDING :protocol_no</strong></p>\r\n\r\n<p>New query/comment has been raised by the PVCT committe for :protocol_no.</p>\r\n\r\n<p>Subject: :subject</p>\r\n\r\n<p>:content</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to applicant when new query raised by PVCT committee', '', NULL, '2018-03-03 21:30:49', '2018-03-03 21:30:49', NULL),
(72, 'applicant_pvct_query_notification', 'CTR: PVCT Query on :protocol_no', '<p>New query/comment has been raised by the PVCT committe for :protocol_no.</p>\r\n\r\n<p>Subject: :subject</p>\r\n\r\n<p>:content</p>\r\n', 'notification', 'Notification sent to applicant when new PVCT query/comment has been raised.', 'danger', 1, '2018-03-03 21:32:08', '2018-03-03 21:32:08', NULL),
(73, 'manager_applicant_response_email', 'CTR: Applicant response to query on :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: APPLICANT RESPONSE TO QUERY ON :protocol_no</strong></p>\r\n\r\n<p>Applicant has responded to query raised on :protocol_no on the <a href="https://e-ctr.mcaz.co.zw">online portal</a>.</p>\r\n\r\n<p>Subject: :subject</p>\r\n\r\n<p>:content</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to Manager when applicant responds to queries raised by committee', '', NULL, '2018-03-03 22:03:58', '2018-09-13 08:33:12', NULL),
(74, 'manager_applicant_response_notification', 'CTR: Applicant response to query on :protocol_no', '<p>Applicant has responded to query raised on :protocol_no.</p>\r\n\r\n<p>Subject: :subject</p>\r\n\r\n<p>:content</p>\r\n', 'notification', 'Notification sent to manager when applicant responds to queries', 'success', 1, '2018-03-03 22:05:03', '2018-03-03 22:05:03', NULL),
(75, 'applicant_response_query_email', 'CTR: New response to query on :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: RESPONSE TO QUERY FOR :protocol_no</strong></p>\r\n\r\n<p>Response submitted to query raised for :protocol_no.</p>\r\n\r\n<p>Subject: :subject</p>\r\n\r\n<p>:content</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to applicant after successful response to query', '', NULL, '2018-03-03 22:07:15', '2018-10-20 19:28:37', NULL),
(76, 'applicant_response_query_notification', 'CTR: New response to query on :protocol_no', '<p>Response to query for :protocol_no.</p>\r\n\r\n<p>Subject: :subject</p>\r\n\r\n<p>:content</p>\r\n', 'notification', 'Notification sent to applicant after they respond to query', 'info', NULL, '2018-03-03 22:08:34', '2018-03-03 22:08:34', NULL),
(77, 'manager_evaluation_query_email', 'CTR: New query/comment for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: QUERY REGARDING :protocol_no</strong></p>\r\n\r\n<p>New query/comment has been raised by the :sender on :protocol_no on the <a href="https://e-ctr.mcaz.co.zw">online portal</a>.</p>\r\n\r\n<p>Subject: :subject</p>\r\n\r\n<p>:content</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to evaluators when a new query is raised.', '', NULL, '2018-03-08 06:48:01', '2018-09-13 08:37:36', NULL),
(78, 'manager_evaluation_query_notification', 'CTR: New query/comment for :protocol_no', '<p>New query/comment has been raised by the :sender on :protocol_no.</p>\r\n\r\n<p>Subject: :subject</p>\r\n\r\n<p>:content</p>\r\n', 'notification', 'Notification sent to evaluators when new query is raised.', 'danger', 1, '2018-03-08 06:48:24', '2018-03-08 06:48:24', NULL),
(79, 'manager_appeal_email', 'CTR: Appeal for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: APPEAL FOR :protocol_no</strong></p>\r\n\r\n<p>:applicant_name has raised an appeal for :protocol_no. on the <a href="https://e-ctr.mcaz.co.zw">online portal</a></p>\r\n\r\n<p>Applicant Message:</p>\r\n\r\n<p>:applicant_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to managers and assigned evaluators when applicant raises an appeal on committee or dg decision', '', NULL, '2018-04-02 10:17:52', '2018-09-13 08:41:26', NULL),
(80, 'manager_appeal_notification', 'CTR: Appeal for :protocol_no', '<p>:applicant_name has raised an appeal for :protocol_no.</p>\r\n\r\n<p>Applicant Message:</p>\r\n\r\n<p>:applicant_message</p>\r\n', 'notification', 'Notification sent to managers and assigned evaluators when applicant raises an appeal on committee or dg decision', 'danger', 1, '2018-04-02 10:19:33', '2018-04-02 10:19:33', NULL),
(81, 'applicant_raise_appeal_email', 'CTR: Appeal for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: APPEAL FOR :protocol_no</strong></p>\r\n\r\n<p>Appeal for :protocol_no has been submitted to MCAZ.</p>\r\n\r\n<p>Message:</p>\r\n\r\n<p>:applicant_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to applicant when they successfully appeal', '', NULL, '2018-04-02 10:22:04', '2018-04-02 10:22:04', NULL),
(82, 'applicant_raise_appeal_notification', 'CTR: Appeal for :protocol_no', '<p>Appeal for :protocol_no has been submitted to MCAZ.</p>\r\n\r\n<p>Message:</p>\r\n\r\n<p>:applicant_message</p>\r\n', 'notification', 'Notification sent to applicant upon successful appeal', 'success', 1, '2018-04-02 10:24:05', '2018-04-02 10:24:05', NULL),
(83, 'manager_appeal_respond_email', 'CTR: Response to Appeal for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: RESPONSE TO APPEAL FOR :protocol_no</strong></p>\r\n\r\n<p>Response has been submitted for appeal for :protocol_no. on the <a href="https://e-ctr.mcaz.co.zw">online portal.</a></p>\r\n\r\n<p>MCAZ Message:</p>\r\n\r\n<p>:applicant_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to managers and evaluators when MCAZ responds to appeal.', '', NULL, '2018-04-02 10:29:12', '2018-09-13 08:42:09', NULL),
(84, 'manager_appeal_respond_notification', 'CTR: Response to Appeal for :protocol_no', '<p>Response has been submitted for appeal for :protocol_no.</p>\r\n\r\n<p>MCAZ Message:</p>\r\n\r\n<p>:applicant_message</p>\r\n', 'notification', 'Notification sent to managers and evaluators when MCAZ respond to appeal', 'info', 1, '2018-04-02 10:30:25', '2018-04-02 10:30:25', NULL),
(85, 'applicant_appeal_respond_email', 'CTR: Response to Appeal for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: RESPONSE TO APPEAL FOR :protocol_no</strong></p>\r\n\r\n<p>Response has been submitted for appeal for :protocol_no.</p>\r\n\r\n<p>MCAZ Message:</p>\r\n\r\n<p>:applicant_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to applicant when MCAZ respond to appeal.', '', NULL, '2018-04-02 10:33:45', '2018-04-02 10:33:45', NULL),
(86, 'applicant_appeal_respond_notification', 'CTR: Response to Appeal for :protocol_no', '<p>Response has been submitted for appeal for :protocol_no.</p>\r\n\r\n<p>MCAZ Message:</p>\r\n\r\n<p>:applicant_message</p>\r\n', 'notification', 'Notification sent to Applicant when MCAZ respond to appeal', 'warning', 1, '2018-04-02 10:35:00', '2018-04-02 10:35:00', NULL),
(87, 'suspend_email', 'CTR: Application :protocol_no suspended', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: APPLICATION :protocol_no HAS BEEN SUSPENDED</strong></p>\r\n\r\n<p>Application :protocol_no has been suspended.</p>\r\n\r\n<p>MCAZ Message:</p>\r\n\r\n<p>:message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to applicant, managers and assigned evaluators when study is suspended.', '', NULL, '2018-04-02 12:26:55', '2018-04-02 12:26:55', NULL),
(88, 'suspend_notification', 'CTR: Application :protocol_no suspended', '<p>Application :protocol_no has been suspended.</p>\r\n\r\n<p>MCAZ Message:</p>\r\n\r\n<p>:message</p>\r\n', 'notification', 'Notification sent to applicant, managers and assigned evaluators when study is suspended.', 'danger', 1, '2018-04-02 12:53:10', '2018-04-02 12:53:10', NULL);
INSERT INTO `messages` (`id`, `name`, `subject`, `content`, `type`, `description`, `style`, `priority`, `created`, `modified`, `deleted`) VALUES
(89, 'reinstate_email', 'CTR: Application :protocol_no reinstated', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: APPLICATION :protocol_no HAS BEEN REINSTATED</strong></p>\r\n\r\n<p>Application :protocol_no has been reinstated.</p>\r\n\r\n<p>MCAZ Message:</p>\r\n\r\n<p>:message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to applicant, managers and assigned evaluators when study is reinstated.', '', NULL, '2018-04-02 12:54:34', '2018-04-02 12:54:34', NULL),
(90, 'reinstate_notification', 'CTR: Application :protocol_no reinstated', '<p>Application :protocol_no has been reinstated.</p>\r\n\r\n<p>MCAZ Message:</p>\r\n\r\n<p>:message</p>\r\n', 'notification', 'Notification sent to applicant, managers and assigned evaluators when study is reinstated.', 'success', 1, '2018-04-02 12:55:40', '2018-04-02 12:55:40', NULL),
(91, 'indemnity_forms_email', 'CTR: Indemnity forms for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: INDEMNITY FORMS FOR :protocol_no</strong></p>\r\n\r\n<p>Indemnity forms for :protocol_no have been uploaded by :applicant_name.</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>:applicant_name</p>\r\n', 'email', 'Email sent to managers, evaluators, director generals and users that indemnity forms have been uploaded', '', NULL, '2018-04-03 14:50:08', '2018-04-03 14:51:06', NULL),
(92, 'indemnity_forms_notification', 'CTR: Indemnity forms for :protocol_no', '<p>Indemnity forms for :protocol_no have been uploaded by :applicant_name.</p>\r\n', 'notification', 'Notification sent to managers, evaluators, director generals and users that indemnity forms have been uploaded', 'success', 1, '2018-04-03 14:51:17', '2018-04-03 14:51:17', NULL),
(93, 'finance_annual_approval_email', 'CTR: Annual Approval for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: NEW ANNUAL APPROVAL :protocol_no</strong></p>\r\n\r\n<p>Application for annual approval for :protocol_no has been submitted to MCAZ.</p>\r\n\r\n<p>Message:</p>\r\n\r\n<p>:user_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to Finance users when a new application for annual approval is submitted by applicant', '', NULL, '2018-06-06 17:06:06', '2018-06-06 17:06:06', NULL),
(94, 'finance_annual_approval_notification', 'CTR: Annual Approval for :protocol_no', '<p>Application for annual approval for :protocol_no has been submitted to MCAZ.</p>\r\n\r\n<p>Message:</p>\r\n\r\n<p>:user_message</p>\r\n', 'notification', 'Notification sent to Finance when annual approval submitted by applicant.', 'danger', 1, '2018-06-06 17:07:54', '2018-06-06 17:07:54', NULL),
(95, 'manager_annual_approval_email', 'CTR: Annual Approval for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: NEW ANNUAL APPROVAL :protocol_no</strong></p>\r\n\r\n<p>Application for annual approval for :protocol_no has been submitted to MCAZ and is currently under review by finance.</p>\r\n\r\n<p>Message:</p>\r\n\r\n<p>:user_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to managers when annual approval is submitted by applicant.', '', NULL, '2018-06-06 17:13:42', '2018-06-06 17:13:42', NULL),
(96, 'manager_annual_approval_notification', 'CTR: Annual Approval for :protocol_no', '<p>Application for annual approval for :protocol_no has been submitted to MCAZ and is currently under review by finance.</p>\r\n\r\n<p>Message:</p>\r\n\r\n<p>:user_message</p>\r\n', 'notification', 'Notification sent to managers when annual approval sent.', 'info', 5, '2018-06-06 17:15:55', '2018-06-06 17:15:55', NULL),
(97, 'applicant_annual_approval_email', 'CTR: Annual Approval for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: NEW ANNUAL APPROVAL :protocol_no</strong></p>\r\n\r\n<p>Application for annual approval for :protocol_no has been submitted to MCAZ and is currently under review by finance.</p>\r\n\r\n<p>Message:</p>\r\n\r\n<p>:user_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to applicant when annual approval is submitted to MCAZ', '', NULL, '2018-06-06 17:20:07', '2018-06-06 17:20:07', NULL),
(98, 'applicant_annual_approval_notification', 'CTR: Annual Approval for :protocol_no', '<p>Application for annual approval for :protocol_no has been submitted to MCAZ and is currently under review by finance.</p>\r\n\r\n<p>Message:</p>\r\n\r\n<p>:user_message</p>\r\n', 'notification', 'Notification sent to applicant when they submit annual approval request.', 'info', 5, '2018-06-06 17:22:47', '2018-06-06 17:22:47', NULL),
(99, 'manager_notification_query_email', 'CTR: New notification query/comment for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: NOTIFICATION QUERY REGARDING :protocol_no</strong></p>\r\n\r\n<p>New query/comment has been raised by the :sender on :protocol_no.</p>\r\n\r\n<p>Subject: :subject</p>\r\n\r\n<p>:content</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent when comment/query on notification is raised.', '', NULL, '2018-11-12 23:34:03', '2018-11-12 23:34:03', NULL),
(100, 'manager_notification_query_notification', 'CTR: New notification query/comment for :protocol_no', '<p>New notification query/comment has been raised by the :sender on :protocol_no.</p>\r\n\r\n<p>Subject: :subject</p>\r\n\r\n<p>:content</p>\r\n', 'notification', 'Notification sent to evaluators when new query is raised.', 'danger', 1, '2018-11-12 23:37:49', '2018-11-12 23:44:17', NULL),
(101, 'applicant_notification_query_email', 'CTR: Notification Query on :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: NOTIFICATION COMMENT/QUERY REGARDING :protocol_no</strong></p>\r\n\r\n<p>New query/comment has been raised by MCAZ on the notifications submitted for :protocol_no.</p>\r\n\r\n<p>Subject: :subject</p>\r\n\r\n<p>:content</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to applicant when new query/comment is raised by MCAZ', '', NULL, '2018-11-12 23:40:51', '2018-11-15 11:42:57', NULL),
(102, 'applicant_notification_query_notification', 'CTR: Notification Query on :protocol_no', '<p>New notification query/comment has been raised by the PVCT committe for :protocol_no.</p>\r\n\r\n<p>Subject: :subject</p>\r\n\r\n<p>:content</p>\r\n', 'notification', 'notification sent to applicant when comment/query raised by mcaz', 'danger', 1, '2018-11-12 23:43:10', '2018-11-12 23:43:10', NULL),
(103, 'authorization_certificate', 'authorization_certificate', '<p><img alt="Logo" src="https://e-ctr.mcaz.co.zw/img/mcaz_3.png" style="height:101px; width:882px" /></p>\r\n\r\n<p style="text-align:right"><span style="font-size:12px"><span style="font-family:Times New Roman,Times,serif">Form M.C. 19</span></span></p>\r\n\r\n<p style="text-align:center"><span style="font-size:12px"><span style="font-family:Times New Roman,Times,serif"><strong>MEDICINES AND ALLIED SUBSTANCES CONTROL ACT [CHAPTER 15:03] </strong></span></span></p>\r\n\r\n<p style="text-align:center"><span style="font-size:12px"><span style="font-family:Times New Roman,Times,serif"><strong>AUTHORISATION TO CONDUCT A CLINICAL TRIAL TITLED </strong></span></span></p>\r\n\r\n<p><span style="font-size:12px"><span style="font-family:Times New Roman,Times,serif">:scientific_title</span></span></p>\r\n\r\n<p><span style="font-size:12px"><span style="font-family:Times New Roman,Times,serif"><strong>REF No.</strong> :protocol_no</span></span></p>\r\n\r\n<p><span style="font-size:12px"><span style="font-family:Times New Roman,Times,serif">IT is hereby notified that the Medicines Control Authority of Zimbabwe has, in terms of subsection (2) of section 18 of the Medicines and Allied Substances Control Act [Chapter15:03], with the approval of the Secretary for Health, authorised</span></span></p>\r\n\r\n<p><span style="font-size:12px"><span style="font-family:Times New Roman,Times,serif">:principal_investigator</span></span></p>\r\n\r\n<p><span style="font-size:12px"><span style="font-family:Times New Roman,Times,serif">:business_name</span></span></p>\r\n\r\n<p><span style="font-size:12px"><span style="font-family:Times New Roman,Times,serif">to conduct a clinical trial titled</span></span></p>\r\n\r\n<p><span style="font-size:12px"><span style="font-family:Times New Roman,Times,serif">:scientific_title</span></span></p>\r\n\r\n<p><span style="font-size:12px"><span style="font-family:Times New Roman,Times,serif">Version: :protocol_version</span></span></p>\r\n\r\n<p><span style="font-size:12px"><span style="font-family:Times New Roman,Times,serif">:date_of_protocol</span></span></p>\r\n\r\n<p><span style="font-size:12px"><span style="font-family:Times New Roman,Times,serif"><strong>REF No.</strong> :protocol_no&nbsp;</span></span></p>\r\n\r\n<p><span style="font-size:12px"><span style="font-family:Times New Roman,Times,serif">in compliance with current good clinical practice (cGCP) and the contents of the clinical trial protocol application subject to the following conditions:&mdash;</span></span></p>\r\n\r\n<ol>\r\n	<li>\r\n	<p><span style="font-size:12px"><span style="font-family:Times New Roman,Times,serif">Reporting of all serious adverse events to MCAZ</span></span></p>\r\n	</li>\r\n	<li>\r\n	<p><span style="font-size:12px"><span style="font-family:Times New Roman,Times,serif">Submission of all amendments to the protocol for approval by MCAZ;</span></span></p>\r\n	</li>\r\n	<li>\r\n	<p><span style="font-size:12px"><span style="font-family:Times New Roman,Times,serif">Submission of a progress report of the clinical trial annually on the anniversary of the approval date of the application; and</span></span></p>\r\n	</li>\r\n	<li>\r\n	<p><span style="font-size:12px"><span style="font-family:Times New Roman,Times,serif">Submission of the final report and copy of any publication of the clinical trial prior to publication of results.</span></span></p>\r\n	</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:12px"><span style="font-family:Times New Roman,Times,serif">Date : &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;</span></span></p>\r\n\r\n<p style="text-align:center">:dg_signature<br />\r\n<span style="font-size:12px"><span style="font-family:Times New Roman,Times,serif">&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;</span></span></p>\r\n\r\n<p style="text-align:center"><span style="font-size:12px"><span style="font-family:Times New Roman,Times,serif">G. N. Mahlangu (Ms)</span></span></p>\r\n\r\n<p style="text-align:center"><span style="font-size:12px"><span style="font-family:Times New Roman,Times,serif">Director-General</span></span></p>\r\n', 'message', 'Message template for authorization certificate', 'success', 1, '2020-09-17 16:55:55', '2020-09-17 17:28:04', NULL),
(104, 'manager_new_query_email', 'CTR: New Committee feedback for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: NEW COMMITTEE FEEDBACK :protocol_no</strong></p>\r\n\r\n<p>New query/comment has been submitted by :evaluator_name for :protocol_no on the <a href="https://e-ctr.mcaz.co.zw">online portal</a>.</p>\r\n\r\n<p>Subject: :subject</p>\r\n\r\n<p>:content</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to managers when query/comment raised by evaluator', '', NULL, '2020-01-25 21:23:09', '2020-01-25 21:23:09', NULL),
(105, 'manager_new_query_notification', 'CTR: New query submitted for :protocol_no', '<p>New query/comment has been raised by :evaluator_name for :protocol_no.</p>\r\n\r\n<p>Subject: :subject</p>\r\n\r\n<p>:content</p>\r\n', 'notification', 'Notification sent to managers when new query/comment submitted', 'warning', 3, '2018-03-03 21:24:52', '2018-03-03 21:24:52', NULL),
(106, 'manager_revert_query_notification', 'CTR: Internal feedback for :protocol_no', '<p>New query/comment has been raised by :manager_name for :protocol_no.</p>\r\n\r\n<p>Subject: :subject</p>\r\n\r\n<p>:content</p>\r\n', 'notification', 'Notification sent to managers when new query/comment raised', 'warning', 3, '2021-03-03 21:24:52', '2021-03-03 21:24:52', NULL),
(107, 'manager_revert_query_email', 'CTR: Internal feedback for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: Internal feedback :protocol_no</strong></p>\r\n\r\n<p>New query/comment has been raised by :manager_name for :protocol_no on the <a href="https://e-ctr.mcaz.co.zw">online portal</a>.</p>\r\n\r\n<p>Subject: :subject</p>\r\n\r\n<p>:content</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to managers when query/comment raised by manager', '', NULL, '2020-01-23 21:23:09', '2020-01-23 21:23:09', NULL),
(108, 'manager_delete_query_email', 'CTR: Deleted feedback for :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: Deleted feedback for :protocol_no</strong></p>\r\n\r\n<p>The query/comment below has been deleted by :manager_name for :protocol_no on the <a href="https://e-ctr.mcaz.co.zw">online portal</a>.</p>\r\n\r\n<p>Subject: :subject</p>\r\n\r\n<p>:content</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to managers when query/comment is deleted by manager', '', NULL, '2021-02-21 21:23:09', '2021-02-21 21:23:09', NULL),
(109, 'manager_delete_query_notification', 'CTR: Deleted feedback for :protocol_no', '<p>The query/comment below has been deleted by :manager_name for :protocol_no.</p>\r\n\r\n<p>Subject: :subject</p>\r\n\r\n<p>:content</p>\r\n', 'notification', 'Notification sent to managers when new query/comment raised', 'warning', 3, '2021-02-21 21:23:09', '2021-02-21 21:23:09', NULL),
(110, 'manager_assign_query_email', 'CTR: :protocol_no response assigned to :evaluator_name', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: APPLICANT RESPONSE ASSIGNED TO :evaluator_name</strong></p>\r\n\r\n<p>Applicant\'s response in the committee feedback for :protocol_no has been assigned to :evaluator_name on the <a href="https://e-ctr.mcaz.co.zw">online portal</a>.</p>\r\n\r\n<p>:assign_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to managers when query/comment raised by evaluator', '', NULL, '2020-02-27 21:23:09', '2020-02-25 21:23:09', NULL),
(111, 'manager_assign_query_notification', 'CTR: :protocol_no response assigned to :evaluator_name', '<p>Applicant\'s response in the committee feedback for :protocol_no has been assigned to :evaluator_name on the <a href="https://e-ctr.mcaz.co.zw">online portal</a>.</p>\r\n\r\n<p>:assign_message</p>\r\n', 'notification', 'Notification sent to managers and evaluator when manager assigns query to an evaluator', 'warning', 3, '2018-03-03 21:24:52', '2018-03-03 21:24:52', NULL),
(112, 'reference_change_email', 'CTR: Updated Protocol :protocol_no ', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p><strong>REF: CLINICAL TRIALS :protocol_no</strong></p>\r\n\r\n<p>Application :protocol_no has been updated, please review this&nbsp;on the <a href="https://e-ctr.mcaz.co.zw">online portal</a>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to Manager when a protocol is modified', 'success', NULL, '2022-09-27 10:28:30', '2022-09-27 11:25:33', NULL),
(113, 'reference_change_notification', 'CTR: Protocol Reference Update for :protocol_no', '<p>The following report protocol has been modified to&nbsp;:protocol_no&nbsp;</p>\r\n\r\n<p>Message:</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'notification', 'Notification sent to managers and assigned evaluators when a PVCT protocol update is done', 'warning', 1, '2022-09-27 11:20:30', '2022-09-27 11:23:34', NULL),
(114, 'unassigned_protocol_reminder_email', 'CTR: Reminder to Assign :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style="text-align:right"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">REF: :protocol_no</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Dear :name,</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><u><strong>RE: REMINDER TO ASSIGN&nbsp;&nbsp;REPORT :protocol_no&nbsp;</strong></u></span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Kindly assign report :protocol_no to any of the evaluators available. The report was created on :created.</span></span></span></p>\r\n\r\n<p><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Yours faithfully,</span></span></span></p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', '', 'warning', 1, NULL, '2023-01-24 10:11:14', NULL),
(115, 'finance_protocol_reminder_email', 'CTR: Reminder to Approve :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style="text-align:right"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">REF: :protocol_no</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Dear :name,</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><u><strong>RE: REMINDER TO APPROVE REPORT :protocol_no&nbsp;</strong></u></span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Kindly approve the financial documents for the report :protocol_no . The report was created on :created.</span></span></span></p>\r\n\r\n<p><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Yours faithfully,</span></span></span></p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', '', 'success', 1, '2023-01-24 10:01:35', '2023-01-24 10:11:42', NULL),
(116, 'evaluation_protocol_reminder_email', 'CTR: Reminder to Evaluate :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style="text-align:right"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">REF: :protocol_no</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Dear :name,</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><u><strong>RE: REMINDER TO EVALUATE&nbsp;REPORT :protocol_no&nbsp;</strong></u></span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Kindly evaluate&nbsp;report :protocol_no . The report was created on :created.</span></span></span></p>\r\n\r\n<p><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Yours faithfully,</span></span></span></p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', '', 'success', 1, '2023-01-24 11:50:25', '2023-01-24 11:50:25', NULL),
(117, 'committee_protocol_reminder_email', 'CTR: Reminder to Provide Feedback :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style="text-align:right"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">REF: :protocol_no</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Dear :name,</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><u><strong>RE: REMINDER TO PROVIDE FEEDBACK&nbsp;REPORT :protocol_no&nbsp;</strong></u></span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Kindly provide your feedback for the report&nbsp;&nbsp;report :protocol_no . The report was created on :created.</span></span></span></p>\r\n\r\n<p><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Yours faithfully,</span></span></span></p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Notify assigned evaluators once review has been done ', 'warning', 1, '2023-01-27 06:36:59', '2023-01-27 06:36:59', NULL),
(118, 'comments_protocol_reminder_email', 'CTR: Reminder to Provide Committee Comment :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style="text-align:right"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">REF: :protocol_no</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Dear :name,</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><u><strong>RE: REMINDER TO PROVIDE COMMITTEE COMMENT FOR&nbsp;REPORT :protocol_no&nbsp;</strong></u></span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Kindly provide your committee comment&nbsp;for the report&nbsp;&nbsp;report :protocol_no . The report was created on :created.</span></span></span></p>\r\n\r\n<p><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Yours faithfully,</span></span></span></p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Notify evaluators to provide committee comments ', 'warning', 1, '2023-01-27 07:43:04', '2023-01-27 07:43:04', NULL),
(119, 'applicant_correspondence_reminder_email', 'CTR: Reminder to Respond to Committee Comment :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style="text-align:right"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">REF: :protocol_no</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Dear :name,</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><u><strong>RE: REMINDER TO PROVIDE RESPONSE TO COMMENTS FOR&nbsp;REPORT :protocol_no&nbsp;</strong></u></span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Kindly provide your response to the committee&nbsp;comments for the&nbsp;report :protocol_no . The report was created on :created.</span></span></span></p>\r\n\r\n<p><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Yours faithfully,</span></span></span></p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Notify applicant to respond to queries', '', NULL, '2023-01-30 06:36:08', '2023-01-30 06:36:08', NULL),
(120, 'committee_reviews_reminder_email', 'CTR: Reminder to Provide Review :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style="text-align:right"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">REF: :protocol_no</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Dear :name,</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><u><strong>RE: REMINDER TO PROVIDE COMMITTEE REVIEW&nbsp;FOR&nbsp;REPORT :protocol_no&nbsp;</strong></u></span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Kindly provide your&nbsp;committee&nbsp;review for the&nbsp;report :protocol_no . The report was created on :created.</span></span></span></p>\r\n\r\n<p><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Yours faithfully,</span></span></span></p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Notify managers and evaluators to provide review', 'success', 1, '2023-01-30 07:20:56', '2023-01-30 13:19:05', NULL),
(121, 'committee_approval_reminder_email', 'CTR: Reminder to Provide Review :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style="text-align:right"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">REF: :protocol_no</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Dear :name,</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><u><strong>RE: REMINDER TO PROVIDE COMMITTEE REVIEW&nbsp;FOR&nbsp;REPORT :protocol_no&nbsp;</strong></u></span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Kindly provide your&nbsp;committee&nbsp;review for the&nbsp;report :protocol_no . The report was created on :created.</span></span></span></p>\r\n\r\n<p><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Yours faithfully,</span></span></span></p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Alert managers for review decision', '', NULL, '2023-01-30 12:14:33', '2023-01-30 13:19:30', NULL),
(122, 'director_approval_reminder_email', 'CTR: Reminder to Provide Review :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style="text-align:right"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">REF: :protocol_no</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Dear :name,</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><u><strong>RE: REMINDER TO PROVIDE GP INSPECTION&nbsp;REVIEW&nbsp;FOR&nbsp;REPORT :protocol_no&nbsp;</strong></u></span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Kindly provide your&nbsp;review for the&nbsp;report :protocol_no . The report was created on :created.</span></span></span></p>\r\n\r\n<p><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Yours faithfully,</span></span></span></p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Reminder to managers', 'success', 1, '2023-01-30 13:42:58', '2023-01-30 13:43:20', NULL),
(123, 'final_approval_reminder_email', 'CTR: Reminder to Provide Review :protocol_no', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style="text-align:right"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">REF: :protocol_no</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Dear :name,</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><u><strong>RE: REMINDER TO PROVIDE DG&nbsp;REVIEW&nbsp;FOR&nbsp;REPORT :protocol_no&nbsp;</strong></u></span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Kindly provide your&nbsp;review for the&nbsp;report :protocol_no . The report was created on :created.</span></span></span></p>\r\n\r\n<p><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Yours faithfully,</span></span></span></p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Reminder to Director Generals', 'info', 1, '2023-01-31 07:39:46', '2023-01-31 07:39:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `non_clinicals`
--

CREATE TABLE `non_clinicals` (
  `id` int(11) NOT NULL,
  `application_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `non_clinical_id` int(11) DEFAULT NULL,
  `evaluation_type` varchar(255) NOT NULL DEFAULT 'Initial',
  `basis_provided` varchar(255) DEFAULT NULL,
  `primary_comment` longtext,
  `relevant_vitro_vivo` varchar(255) DEFAULT NULL,
  `pharmacological_exposure` varchar(255) DEFAULT NULL,
  `active_metabolites` varchar(255) DEFAULT NULL,
  `imp_compound` varchar(255) DEFAULT NULL,
  `off_target_identified` varchar(255) DEFAULT NULL,
  `off_target_effects` varchar(255) DEFAULT NULL,
  `secondary_comment` longtext,
  `cardiovascular` varchar(255) DEFAULT NULL,
  `cardiovascular_comments` longtext,
  `respiratory` varchar(255) DEFAULT NULL,
  `respiratory_comments` longtext,
  `pharmacology_comment` longtext,
  `cns` varchar(255) DEFAULT NULL,
  `cns_comments` longtext,
  `other` varchar(255) DEFAULT NULL,
  `other_comments` longtext,
  `significant_concerns` varchar(255) DEFAULT NULL,
  `planned_exposure` varchar(255) DEFAULT NULL,
  `safety_comment` longtext,
  `interactions_identified` varchar(255) DEFAULT NULL,
  `Pharmacodynamic_comment` longtext,
  `adequate_analysis` varchar(255) DEFAULT NULL,
  `analysis_comment` longtext,
  `absorption` varchar(255) DEFAULT NULL,
  `absorption_comments` longtext,
  `distribution` varchar(255) DEFAULT NULL,
  `distribution_comments` longtext,
  `metabolism` varchar(255) DEFAULT NULL,
  `metabolism_comments` longtext,
  `excretion` varchar(255) DEFAULT NULL,
  `excretion_comments` longtext,
  `adme_concerns` varchar(255) DEFAULT NULL,
  `major_metabolites` varchar(255) DEFAULT NULL,
  `unique_metabolites` varchar(255) DEFAULT NULL,
  `pharmacokinetics_comment` longtext,
  `enzyme_inhibition` varchar(255) DEFAULT NULL,
  `enzyme_inhibition_comments` longtext,
  `enzyme_induction` varchar(255) DEFAULT NULL,
  `enzyme_induction_comments` longtext,
  `transporter` varchar(255) DEFAULT NULL,
  `transporter_comments` longtext,
  `co_pathways` varchar(255) DEFAULT NULL,
  `co_pathways_comments` longtext,
  `drug_interaction` varchar(255) DEFAULT NULL,
  `interaction_highlighted` varchar(255) DEFAULT NULL,
  `drug_interaction_comment` longtext,
  `pk_studies` varchar(255) DEFAULT NULL,
  `concerns_identified` varchar(255) DEFAULT NULL,
  `identified_studies_comment` longtext,
  `toxicologically_relevant` varchar(255) DEFAULT NULL,
  `human_pharmacology` varchar(255) DEFAULT NULL,
  `human_pk` varchar(255) DEFAULT NULL,
  `well_designed_studies` varchar(255) DEFAULT NULL,
  `toxicology_comment` longtext,
  `toxicities_identified` varchar(255) DEFAULT NULL,
  `sufficient_margins` varchar(255) DEFAULT NULL,
  `single_dose_comment` longtext,
  `repeat_toxicities_identified` varchar(255) DEFAULT NULL,
  `repeat_sufficient_margins` varchar(255) DEFAULT NULL,
  `repeat_treatment_duration` varchar(255) DEFAULT NULL,
  `repeat_dose_comment` longtext,
  `gene_mutations` longtext,
  `gene_mutation_results` varchar(255) DEFAULT NULL,
  `vitro_mammalian` longtext,
  `vitro_mammalian_results` varchar(255) DEFAULT NULL,
  `vivo_genotoxicit` longtext,
  `vivo_genotoxicit_results` varchar(255) DEFAULT NULL,
  `additional_assays` longtext,
  `additional_assays_results` varchar(255) DEFAULT NULL,
  `potential_genotoxic` varchar(255) DEFAULT NULL,
  `genotoxicity_comment` longtext,
  `carcinogenicity` varchar(255) DEFAULT NULL,
  `carcinogenicity_exposure` varchar(255) DEFAULT NULL,
  `carcinogenicity_comment` longtext,
  `fertility` varchar(255) DEFAULT NULL,
  `fertility_findings` longtext,
  `embryo_dev` varchar(255) DEFAULT NULL,
  `embryo_dev_findings` longtext,
  `pre_post_natal` varchar(255) DEFAULT NULL,
  `pre_post_natal_findings` longtext,
  `reproductive_margins` varchar(255) DEFAULT NULL,
  `reproductive_comment` longtext,
  `juvenile_age_range` varchar(255) DEFAULT NULL,
  `enhanced_juvenile` varchar(255) DEFAULT NULL,
  `planned_juvenile_exposure` varchar(255) DEFAULT NULL,
  `juvenile_comment` longtext,
  `other_potential_toxicities` varchar(255) DEFAULT NULL,
  `other_potential_exposure` varchar(255) DEFAULT NULL,
  `other_potential_comment` longtext,
  `imp_teratogenic` tinyint(1) DEFAULT NULL,
  `imp_genotoxic` tinyint(1) DEFAULT NULL,
  `imp_insufficient` tinyint(1) DEFAULT NULL,
  `imp_irelevant` tinyint(1) DEFAULT NULL,
  `imp_nodata` tinyint(1) DEFAULT NULL,
  `male_partners_included` varchar(255) DEFAULT NULL,
  `considered_suspected` tinyint(1) DEFAULT NULL,
  `considered_possible` tinyint(1) DEFAULT NULL,
  `considered_unlikely` tinyint(1) DEFAULT NULL,
  `imp_assessor_comment` longtext,
  `local_toxicity` varchar(255) DEFAULT NULL,
  `local_toxicity_comments` longtext,
  `std_phototoxic` varchar(255) DEFAULT NULL,
  `std_phototoxic_comments` longtext,
  `std_tissue` varchar(255) DEFAULT NULL,
  `std_tissue_comments` longtext,
  `std_antigenicity` varchar(255) DEFAULT NULL,
  `std_antigenicity_comments` longtext,
  `std_imuno` varchar(255) DEFAULT NULL,
  `std_imuno_comments` longtext,
  `std_dependence` varchar(255) DEFAULT NULL,
  `std_dependence_comments` longtext,
  `std_metabolites` varchar(255) DEFAULT NULL,
  `std_metabolites_comments` longtext,
  `std_impurities` varchar(255) DEFAULT NULL,
  `std_impurities_comments` longtext,
  `std_other` varchar(255) DEFAULT NULL,
  `std_other_comments` longtext,
  `other_toxicity_comments` longtext,
  `fih_dose` varchar(255) DEFAULT NULL,
  `fih_dose_steps` varchar(255) DEFAULT NULL,
  `fih_dose_max` varchar(255) DEFAULT NULL,
  `fih_dose_comments` longtext,
  `glp_aspects` varchar(255) DEFAULT NULL,
  `glp_aspects_comments` longtext,
  `non_clinical_acceptable` tinyint(1) DEFAULT NULL,
  `supplementary_info_needed` tinyint(1) DEFAULT NULL,
  `overall_comments` longtext,
  `file` varchar(255) DEFAULT NULL,
  `dir` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `chosen` int(11) DEFAULT NULL,
  `submitted` int(11) DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` datetime DEFAULT NULL,
  `additional` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `system_message` mediumtext,
  `user_message` mediumtext,
  `deleted` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` int(11) NOT NULL,
  `application_id` int(11) DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `telephone_number` varchar(255) DEFAULT NULL,
  `all_tasks` char(30) DEFAULT NULL,
  `monitoring` char(30) DEFAULT NULL,
  `regulatory` char(30) DEFAULT NULL,
  `investigator_recruitment` char(30) DEFAULT NULL,
  `ivrs_treatment_randomisation` char(30) DEFAULT NULL,
  `data_management` char(30) DEFAULT NULL,
  `e_data_capture` char(30) DEFAULT NULL,
  `susar_reporting` char(30) DEFAULT NULL,
  `quality_assurance_auditing` char(30) DEFAULT NULL,
  `statistical_analysis` char(30) DEFAULT NULL,
  `medical_writing` char(30) DEFAULT NULL,
  `other_duties` char(30) DEFAULT NULL,
  `other_duties_specify` mediumtext,
  `misc` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id` int(11) NOT NULL,
  `application_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `place_of_birth` varchar(255) DEFAULT NULL,
  `particulars` mediumtext,
  `file` varchar(255) DEFAULT NULL,
  `dir` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `participants`
--
 

--
-- Table structure for table `pdrugs`
--

CREATE TABLE `pdrugs` (
  `id` int(11) NOT NULL,
  `application_id` int(11) DEFAULT NULL,
  `quality_assessment_id` int(11) DEFAULT NULL,
  `composition` tinyint(4) DEFAULT '0',
  `composition_workspace` longtext,
  `composition_comment` longtext,
  `pharma_adequate` varchar(255) DEFAULT NULL,
  `pharma_comments` longtext,
  `manu_identified` varchar(255) DEFAULT NULL,
  `manu_workspace` longtext,
  `manu_comments` longtext,
  `batch_described` varchar(255) DEFAULT NULL,
  `batch_workspace` longtext,
  `batch_comments` longtext,
  `control_described` varchar(255) DEFAULT NULL,
  `control_workspace` longtext,
  `control_comments` longtext,
  `control_steps_described` varchar(255) DEFAULT NULL,
  `control_steps_comments` longtext,
  `validation_described` varchar(255) DEFAULT NULL,
  `validation_workspace` longtext,
  `validation_comments` longtext,
  `specification_criteria` varchar(255) DEFAULT NULL,
  `specifications_comments` longtext,
  `analytical_described` varchar(255) DEFAULT NULL,
  `analytical_comments` longtext,
  `procedures_validated` varchar(255) DEFAULT NULL,
  `procedures_comments` longtext,
  `justification_satisfactory` varchar(255) DEFAULT NULL,
  `justification_comments` longtext,
  `justification_workspace` longtext,
  `animal_origin` varchar(255) DEFAULT NULL,
  `tse_satisfactory` varchar(255) DEFAULT NULL,
  `tse_comments` longtext,
  `excipients_controlled` varchar(255) DEFAULT NULL,
  `excipients_workspace` longtext,
  `excipients_comments` longtext,
  `appropriate_limits` varchar(255) DEFAULT NULL,
  `appropriate_control_workspace` longtext,
  `appropriate_control_comments` longtext,
  `analytical_methods` varchar(255) DEFAULT NULL,
  `analytical_methods_comments` longtext,
  `validation_procedure` varchar(255) DEFAULT NULL,
  `validation_results` varchar(255) DEFAULT NULL,
  `validation_second_comments` longtext,
  `batch_analyses` varchar(255) DEFAULT NULL,
  `batch_described_comments` longtext,
  `impurities_acceptable` varchar(255) DEFAULT NULL,
  `impurities_workspace` longtext,
  `impurities_comments` longtext,
  `product_specifications` varchar(255) DEFAULT NULL,
  `justification_satis_comments` longtext,
  `justification_specs_comments` longtext,
  `justification_specs_workspace` longtext,
  `reference_standards` varchar(255) DEFAULT NULL,
  `reference_standards_comments` longtext,
  `closure_system` varchar(255) DEFAULT NULL,
  `closure_system_comments` longtext,
  `stability_tests` varchar(255) DEFAULT NULL,
  `stability_tests_workspace` longtext,
  `substantial_amendment` varchar(255) DEFAULT NULL,
  `registered_protocol` varchar(255) DEFAULT NULL,
  `pdrug_comments` longtext,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

 
--
-- Table structure for table `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20221006124508, 'CreateCompliance', '2022-10-06 15:05:54', '2022-10-06 15:05:54', 0);

-- --------------------------------------------------------

--
-- Table structure for table `placebos`
--

CREATE TABLE `placebos` (
  `id` int(11) NOT NULL,
  `application_id` int(11) DEFAULT NULL,
  `placebo_present` varchar(30) DEFAULT NULL,
  `pharmaceutical_form` varchar(255) DEFAULT NULL,
  `route_of_administration` varchar(255) DEFAULT NULL,
  `composition` varchar(255) DEFAULT NULL,
  `identical_indp` varchar(30) DEFAULT NULL,
  `major_ingredients` mediumtext,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(11) NOT NULL,
  `province_name` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `province_name`, `created`, `modified`) VALUES
(1, 'Bulawayo', '2017-11-23 00:57:47', '2017-11-23 00:57:47'),
(2, 'Harare', '2017-11-23 00:57:57', '2017-11-23 00:57:57'),
(3, 'Manicaland', '2017-11-23 00:58:06', '2017-11-23 00:58:06'),
(4, 'Mashonaland Central', '2017-11-23 00:58:18', '2017-11-23 08:36:10'),
(5, 'Mashonaland East', '2017-11-23 08:36:26', '2017-11-23 08:36:26'),
(6, 'Mashonaland West', '2017-11-23 08:36:53', '2017-11-23 08:36:53'),
(7, 'Masvingo', '2017-11-23 08:37:07', '2017-11-23 08:37:07'),
(8, 'Matebeleland North', '2017-11-23 08:37:22', '2017-11-23 08:37:22'),
(9, 'Matebeleland South', '2017-11-23 08:37:33', '2017-11-23 08:37:33'),
(10, 'Midlands', '2017-11-23 08:37:45', '2017-11-23 08:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `quality`
--

CREATE TABLE `quality` (
  `id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `submitted` varchar(255) NOT NULL,
  `quality_workspace` text NOT NULL,
  `gmp_smpc` tinyint(4) NOT NULL,
  `gmp_included` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `quality_assessments`
--

CREATE TABLE `quality_assessments` (
  `id` int(11) NOT NULL,
  `application_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `quality_assessment_id` int(11) DEFAULT NULL,
  `evaluation_type` varchar(255) DEFAULT NULL,
  `quality_workspace` longtext,
  `gmp_included` tinyint(4) DEFAULT '0',
  `gmp_smpc` tinyint(4) DEFAULT '0',
  `quality_data` varchar(255) DEFAULT NULL,
  `auxiliary_workspace` longtext,
  `auxiliary_comments` longtext,
  `adventitious_agents` varchar(255) DEFAULT NULL,
  `adventitious_workspace` longtext,
  `adventitious_comments` longtext,
  `novel_excipients` varchar(255) DEFAULT NULL,
  `novel_excipients_workspace` longtext,
  `novel_excipients_comments` longtext,
  `reconstitution` varchar(255) DEFAULT NULL,
  `reconstitution_workspace` longtext,
  `reconstitution_comments` longtext,
  `labelling` varchar(255) DEFAULT NULL,
  `labelling_comments` longtext,
  `blinding_workspace` longtext,
  `blinding_comments` longtext,
  `acceptable` varchar(255) DEFAULT NULL,
  `supplementary_need` varchar(255) DEFAULT NULL,
  `overall_comments` longtext,
  `file` varchar(255) DEFAULT NULL,
  `dir` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `additional` longtext,
  `chosen` int(11) DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quality_assessments`
--
 

--
-- Table structure for table `queued_jobs`
--

CREATE TABLE `queued_jobs` (
  `id` int(11) NOT NULL,
  `job_type` varchar(45) NOT NULL,
  `data` longtext,
  `job_group` varchar(255) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `notbefore` datetime DEFAULT NULL,
  `fetched` datetime DEFAULT NULL,
  `completed` datetime DEFAULT NULL,
  `progress` float DEFAULT NULL,
  `failed` int(11) NOT NULL DEFAULT '0',
  `failure_message` text,
  `workerkey` varchar(45) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `priority` int(3) NOT NULL DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `queued_jobs`
--
 

--
-- Table structure for table `queue_phinxlog`
--

CREATE TABLE `queue_phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `queue_processes`
--

CREATE TABLE `queue_processes` (
  `id` int(11) NOT NULL,
  `pid` varchar(30) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `refids`
--

CREATE TABLE `refids` (
  `id` int(11) NOT NULL,
  `foreign_key` int(11) NOT NULL,
  `model` varchar(255) DEFAULT NULL,
  `refid` int(11) DEFAULT NULL,
  `year` int(5) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `refids`
-- 

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(11) NOT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `reminder_type` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reminders`
--
 

--
-- Table structure for table `request_infos`
--

CREATE TABLE `request_infos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `application_id` int(11) DEFAULT NULL,
  `mcaz_comment` text,
  `applicant_comment` text,
  `file` varchar(255) DEFAULT NULL,
  `dir` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request_infos`
--
 

--
-- Table structure for table `reviewers`
--

CREATE TABLE `reviewers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `application_id` int(11) DEFAULT NULL,
  `description` text,
  `notified` tinyint(1) DEFAULT '0',
  `accepted` char(30) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `application_id` int(11) DEFAULT NULL,
  `review_comment` text,
  `file` varchar(255) DEFAULT NULL,
  `dir` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sdrugs`
--

CREATE TABLE `sdrugs` (
  `id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `quality_assessment_id` int(11) DEFAULT NULL,
  `mono_ph` tinyint(1) DEFAULT NULL,
  `mono_japan` tinyint(1) DEFAULT NULL,
  `mono_other` tinyint(1) DEFAULT NULL,
  `mono_no` tinyint(1) DEFAULT NULL,
  `quality_workspace` longtext,
  `gmp_smpc` tinyint(1) DEFAULT NULL,
  `gmp_included` tinyint(1) DEFAULT NULL,
  `labelling` varchar(255) DEFAULT NULL,
  `labelling_comments` longtext,
  `blinding_workspace` longtext,
  `blinding_comments` longtext,
  `acceptable` varchar(255) DEFAULT NULL,
  `supplementary_need` varchar(255) DEFAULT NULL,
  `overall_comments` longtext,
  `submitted` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` datetime DEFAULT NULL,
  `drug_eur` tinyint(1) DEFAULT NULL,
  `drug_usp` tinyint(1) DEFAULT NULL,
  `drug_none` tinyint(1) DEFAULT NULL,
  `drug_authorised` varchar(255) DEFAULT NULL,
  `drug_ssection` longtext,
  `nomen_workspace` longtext,
  `noment_comment` longtext,
  `str_subsection` varchar(255) DEFAULT NULL,
  `str_workspace` longtext,
  `str_comment` longtext,
  `gen_prop_adequately` varchar(255) DEFAULT NULL,
  `gen_prop_workspace` longtext,
  `gen_prop_comment` longtext,
  `manu_identified` varchar(255) DEFAULT NULL,
  `process_described` varchar(255) DEFAULT NULL,
  `gen_manu_comment` longtext,
  `process_workspace` longtext,
  `workspace_comment` longtext,
  `control_described` varchar(255) DEFAULT NULL,
  `control_workspace` longtext,
  `control_comment` longtext,
  `control_steps_described` varchar(255) DEFAULT NULL,
  `control_steps_comments` longtext,
  `validation_described` varchar(255) DEFAULT NULL,
  `validation_comments` longtext,
  `manufacturing_described` varchar(255) DEFAULT NULL,
  `manufacturing_workspace` longtext,
  `manufacturing_comments` longtext,
  `substance_described` varchar(255) DEFAULT NULL,
  `substance_workspace` longtext,
  `substance_comments` longtext,
  `impurities_characterised` varchar(255) DEFAULT NULL,
  `impurities_workspace` longtext,
  `impurities_comments` longtext,
  `specifications_appropriate` varchar(255) DEFAULT NULL,
  `specifications_workspace` longtext,
  `specifications_comments` longtext,
  `analytical_described` varchar(255) DEFAULT NULL,
  `analytical_comments` longtext,
  `acceptance_presented` varchar(255) DEFAULT NULL,
  `suitability_explained` varchar(255) DEFAULT NULL,
  `validation_procedures_comments` longtext,
  `batch_provided` varchar(255) DEFAULT NULL,
  `batch_workspace` longtext,
  `batch_comments` longtext,
  `substantial_amendment` varchar(255) DEFAULT NULL,
  `registered_protocol` varchar(255) DEFAULT NULL,
  `sdrug_comments` longtext,
  `justification_acceptable` varchar(255) DEFAULT NULL,
  `justification_workspace` longtext,
  `justification_comments` longtext,
  `reference_described` varchar(255) DEFAULT NULL,
  `reference_comments` longtext,
  `container_suitable` varchar(255) DEFAULT NULL,
  `container_comments` longtext,
  `stability_satisfactory` varchar(255) DEFAULT NULL,
  `stability_workspace` longtext,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
 

--
-- Table structure for table `sdrugs_conditions`
--

CREATE TABLE `sdrugs_conditions` (
  `id` int(11) NOT NULL,
  `application_id` int(11) DEFAULT NULL,
  `sdrug_id` int(11) DEFAULT NULL,
  `batch_details` varchar(255) DEFAULT NULL,
  `manu_process` varchar(255) DEFAULT NULL,
  `neg_seventy` varchar(255) DEFAULT NULL,
  `neg_twenty` varchar(255) DEFAULT NULL,
  `pos_five` varchar(255) DEFAULT NULL,
  `pos_twenty_five` int(255) DEFAULT NULL,
  `pos_thirty` int(255) DEFAULT NULL,
  `pos_forty` int(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `model` varchar(255) DEFAULT 'sdrug'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

 

-- --------------------------------------------------------

--
-- Table structure for table `seventy_fives`
--

CREATE TABLE `seventy_fives` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `application_id` int(11) DEFAULT NULL,
  `decision` varchar(255) DEFAULT NULL,
  `internal_review_comment` text,
  `applicant_review_comment` text,
  `file` varchar(255) DEFAULT NULL,
  `dir` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seventy_fives`
--
 

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `content` longtext,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `description`, `content`, `created`, `modified`) VALUES
(1, 'home', '          \r\n          <div class="row"><div class="col-md-12 col-sm-12 col-xs-12 column"><div class="ge-content ge-content-type-tinymce" data-ge-content-type="tinymce"><h2>Clinical Trials</h2><hr><p>Clinical trials are defined as a systematic study in human beings or animals inorder to establish the efficacy of, or to discover or verify the effects or adverse reactions of medicines, and includes a study of the absorption, distribution, metabolism and excretion of medicines.</p><p>All clinical trials that are conducted in Zimbabwe are regulated in terms of Part III of the Medicines and Allied Substances Control Act [Chapter 15:03] and its regulations. In terms of the Act, no person shall conduct a clinical trial of any medicine without the prior written authorisation of the Authority, granted with the approval of the Secretary of the Ministry of Health and Child Care.</p><p>The guidelines for Good Clinical Practice have been updated. You will find the new guidelines on the Downloads page. The file is entitled "Guidelines for GCP 2012 Zimbabwe", it replaces "Zimbabwe Guidelines for good clinical trial practice", which has been removed from this website.</p><p>Details of approved, ongoing and previously approved clinical trials will be made available on this site in due course.</p><p><br></p></div></div></div>', '2017-12-30 23:17:05', '2018-12-12 07:05:07'),
(2, 'News', '<div class="row">\r\n        <div class="col-md-4 col-sm-4 col-xs-4 column">\r\n          \r\n          <div class="ge-content ge-content-type-tinymce" data-ge-content-type="tinymce"><h2>News</h2><p>News items will be here...</p></div>\r\n          </div>\r\n</div>', '2017-12-30 23:18:38', '2020-07-27 11:33:16'),
(3, 'faqs', '<div class="row">\r\n        <div class="col-md-12">\r\n          <h2>Frequently Asked Questions</h2>\r\n          <p>Probably an ordered list </p>\r\n          <ul> \r\n             <li>We need to ensure ability to add images</li>\r\n              <li>Hence the reason we will most likely kill this method</li>\r\n           </ul>\r\n</div>\r\n</div>', '2017-12-30 23:21:13', '2017-12-30 23:21:13'),
(4, 'contactus', '\r\n\r\n<div class="row"><div class="col-md-12 col-sm-12 col-xs-12 column"><div class="ge-content ge-content-type-tinymce" data-ge-content-type="tinymce" data-gramm_id="1a06caa5-8c3a-b085-2a9c-0d59e98b4678" data-gramm="true" data-gramm_editor="true"><p>Your feedback is welcome...</p><p>You may contact us using the email below</p><p><em>mcaz@mcaz.co.zw</em></p></div><input name="mce_0" value="<p>Your feedback is welcome...</p>\r\n<p>You may contact us using the email below</p>\r\n<p><em>mcaz@mcaz.co.zw</em></p>" type="hidden"></div></div>', '2017-12-30 23:22:24', '2018-08-31 14:13:09');
INSERT INTO `sites` (`id`, `description`, `content`, `created`, `modified`) VALUES
(5, 'fees_schedule', '<div class="row">\r\n        <div class="col-xs-12 col-md-12 col-sm-12 column">\r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            <div class="ge-content ge-content-type-tinymce" data-ge-content-type="tinymce"><p style="font-variant: normal; font-style: normal"><a name="docs-internal-guid-b1b299fd-a9c4-3a12-ceed-a2201e05dbec"></a>\r\n                <font color="#000000">\r\n                    <font face="Times New Roman">\r\n                        <font style="font-size: 12pt" size="3"><u><b><span style="background: transparent">FEE\r\nSCHEDULE</span></b></u></font>\r\n                    </font>\r\n                </font>\r\n            </p><p>\r\n                <br>\r\n                <br>\r\n            </p><p style="margin-bottom: 0.11in; font-variant: normal; font-style: normal; line-height: 129%">\r\n                <font color="#000000">\r\n                    <font face="Times New Roman">\r\n                        <font style="font-size: 12pt" size="3"><u><b><span style="background: transparent">Funded\r\nby a local sponsor</span></b></u></font>\r\n                    </font>\r\n                </font>\r\n            </p><table cellspacing="2" cellpadding="2">\r\n                <colgroup><col width="208">\r\n                <col width="142">\r\n                <col width="113">\r\n                <col width="138">\r\n                </colgroup><tbody><tr>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in" bgcolor="#d9d9d9">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">Type\r\n            of study</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in" bgcolor="#d9d9d9">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">Fee\r\n            (US$)</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in" bgcolor="#d9d9d9">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">VAT\r\n            (15%)</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in" bgcolor="#d9d9d9">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">Total\r\n            (US$)</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                </tr>\r\n                <tr>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">Human\r\n            medicine</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">2000</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">300</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">2300</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                </tr>\r\n                <tr>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">Sub-study</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">1000</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">150</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">1150</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                </tr>\r\n                <tr>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">Operational\r\n            research</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">1000</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">150</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">1150</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                </tr>\r\n                <tr>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">Observational\r\n            study</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">200</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">30</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">230</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                </tr>\r\n                <tr>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">Any\r\n            other case</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">100</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">15</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">115</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                </tr>\r\n                <tr>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p>\r\n                            <br>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p>\r\n                            <br>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p>\r\n                            <br>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p>\r\n                            <br>\r\n                        </p>\r\n                    </td>\r\n                </tr>\r\n                <tr>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">Application\r\n            to import an unregistered medicine through section 75 of the Act </span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">10</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">1.5</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">11.50</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                </tr>\r\n                <tr>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p>\r\n                            <br>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p>\r\n                            <br>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p>\r\n                            <br>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p>\r\n                            <br>\r\n                        </p>\r\n                    </td>\r\n                </tr>\r\n                <tr>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">Any\r\n            amendment to the original application</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">50</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">7.5</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">57.5</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                </tr>\r\n            </tbody></table><p>\r\n                <br>\r\n                <br>\r\n                <br>\r\n            </p><p style="margin-bottom: 0.11in; font-variant: normal; font-style: normal; line-height: 129%">\r\n                <font color="#000000">\r\n                    <font face="Times New Roman">\r\n                        <font style="font-size: 12pt" size="3"><u><b><span style="background: transparent">Funded\r\nby a non-resident</span></b></u></font>\r\n                    </font>\r\n                </font>\r\n            </p><table cellspacing="2" cellpadding="2">\r\n                <colgroup><col width="213">\r\n                <col width="128">\r\n                <col width="130">\r\n                <col width="130">\r\n                </colgroup><tbody><tr>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in" bgcolor="#d9d9d9">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">Type\r\n            of study</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in" bgcolor="#d9d9d9">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">Fee\r\n            (US$)</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in" bgcolor="#d9d9d9">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">VAT</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in" bgcolor="#d9d9d9">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">Total\r\n            (US$)</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                </tr>\r\n                <tr>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">Phase\r\n            I study</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">5000</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">750</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">5750</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                </tr>\r\n                <tr>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">Phase\r\n            II study</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">4000</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">600</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">4600</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                </tr>\r\n                <tr>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">Phase\r\n            III or IV study</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">3000</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">450</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">3450</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                </tr>\r\n                <tr>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">Operational</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">1000</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">150</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">1150</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                </tr>\r\n                <tr>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">Bioequivalence/Bioavailability</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">500</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">75</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">575</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                </tr>\r\n                <tr>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">Observational</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">200</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">30</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">230</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                </tr>\r\n                <tr>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">Any\r\n            other case</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">200</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">30</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">230</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                </tr>\r\n                <tr>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p>\r\n                            <br>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p>\r\n                            <br>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p>\r\n                            <br>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p>\r\n                            <br>\r\n                        </p>\r\n                    </td>\r\n                </tr>\r\n                <tr>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">Application\r\n            to import an unregistered medicine through section 75 of the Act</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">10</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">1.5</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">11.5</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                </tr>\r\n                <tr>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p>\r\n                            <br>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p>\r\n                            <br>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p>\r\n                            <br>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p>\r\n                            <br>\r\n                        </p>\r\n                    </td>\r\n                </tr>\r\n                <tr>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">Any\r\n            amendment to the original application</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">100</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">15</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                    <td style="border: 1px solid #000000; padding: 0.02in 0.08in">\r\n                        <p style="font-variant: normal; font-style: normal; font-weight: normal; text-decoration: none">\r\n                            <font color="#000000">\r\n                                <font face="Times New Roman">\r\n                                    <font style="font-size: 12pt" size="3"><span style="background: transparent">115</span></font>\r\n                                </font>\r\n                            </font>\r\n                        </p>\r\n                    </td>\r\n                </tr>\r\n            </tbody></table><p>\r\n                <br>\r\n                <br>\r\n                <br>\r\n            </p></div>\r\n        </div>\r\n    </div>', '2018-02-18 16:32:49', '2018-02-18 16:37:50');
INSERT INTO `sites` (`id`, `description`, `content`, `created`, `modified`) VALUES
(6, 'Committee calendar', '<div class="row">\r\n        <div class="col-xs-12 col-md-12 col-sm-12 column">\r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            <div class="ge-content ge-content-type-tinymce" data-ge-content-type="tinymce"><p style="font-variant: normal; font-style: normal;" data-mce-style="font-variant: normal; font-style: normal;"><a name="docs-internal-guid-b1b299fd-a9c4-3a12-ceed-a2201e05dbec" class="mce-item-anchor"></a> <span data-mce-style="color: #000000;" style="color: #000000;"><span data-mce-style="font-family: Times\\ New\\ Roman;" style="font-family: Times\\ New\\ Roman;"><span data-mce-style="font-size: medium;" style="font-size: medium;"><u><strong><span style="background: transparent;" data-mce-style="background: transparent;">COMMITTEE CALENDAR</span></strong></u></span> </span> </span></p><p><br> <span style="font-size: 10pt; font-family: \'Times New Roman\'; color: #000000; background-color: transparent; font-weight: bold; font-style: normal; font-variant: normal; text-decoration: underline; -webkit-text-decoration-skip: none; text-decoration-skip-ink: none; vertical-align: baseline; white-space: pre-wrap;" id="docs-internal-guid-56916af1-ae8e-448c-81be-07fdeecd728b" data-mce-style="font-size: 10pt; font-family: \'Times New Roman\'; color: #000000; background-color: transparent; font-weight: bold; font-style: normal; font-variant: normal; text-decoration: underline; -webkit-text-decoration-skip: none; text-decoration-skip-ink: none; vertical-align: baseline; white-space: pre-wrap;">PROPOSED PHARMACOVIGILANCE &amp; CLINICAL TRIALS COMMITTEE MEETINGS DATES</span></p><p>:calendar<br data-mce-bogus="1"></p><p><span style="font-size: 10pt; font-family: \'Times New Roman\'; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;" id="docs-internal-guid-fb677134-ae8f-8f8c-5694-79af4fdf6cdf" data-mce-style="font-size: 10pt; font-family: \'Times New Roman\'; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">The meetings are usually conducted in the first Wednesday’s of the month. However these dates can be changed in certain situations. </span><br> <br> <br></p></div>\r\n        </div>\r\n    </div>', '2018-02-19 14:51:16', '2018-03-04 12:37:04');

-- --------------------------------------------------------

--
-- Table structure for table `site_details`
--

CREATE TABLE `site_details` (
  `id` int(11) NOT NULL,
  `application_id` int(11) DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL,
  `site_name` varchar(255) DEFAULT NULL,
  `physical_address` varchar(255) DEFAULT NULL,
  `contact_details` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `site_capacity` varchar(30) DEFAULT NULL,
  `misc` varchar(255) DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site_details`
--

INSERT INTO `site_details` (`id`, `application_id`, `province_id`, `site_name`, `physical_address`, `contact_details`, `contact_person`, `site_capacity`, `misc`, `deleted`, `created`, `modified`) VALUES
(1, 42, 2, 'Chitungwiza ', 'Chitungwiza hospital', 'Chitungiwza CEO', 'Jane Doe', NULL, NULL, NULL, '2018-05-15 08:44:24', '2018-05-15 08:44:24'),
(2, 59, 2, 'Chitungwiza ', 'Chitungwiza hospital', 'Chitungiwza CEO', 'Jane Doe', NULL, NULL, NULL, '2018-07-17 13:58:57', '2018-07-17 13:58:57'),
(3, 50, 2, 'Pandora House', '103 Baines', 'Liberty', 'Liberty', NULL, NULL, NULL, '2018-08-28 10:05:59', '2018-08-28 10:05:59'),
(4, 127, NULL, '', '', '', '', NULL, NULL, NULL, '2018-12-12 09:32:19', '2018-12-12 09:32:19'),
(5, 124, 5, 'Seke North CRS', 'Makoni Municipal Clinic, Chitungwiza', '+263772246011', 'Lynda Stranix-Chibanda', NULL, NULL, NULL, '2018-12-12 09:46:41', '2018-12-12 09:46:41'),
(6, 124, 5, 'St Mary\'s CRS', 'St Mary\'s Municipal Clinic, Chitungwiza', '+263 24 704890', 'Prof Tsungai Chipato', NULL, NULL, NULL, '2018-12-12 09:46:41', '2018-12-12 09:46:41'),
(7, 111, 2, 'Budiriro Polyclinic', 'Budiriro', 'Budiriro', 'Sr Ruvarashe', NULL, NULL, NULL, '2018-12-12 10:00:25', '2018-12-12 10:00:25'),
(8, 111, 2, 'Mandara Clinic', 'Mandara', 'Mandara', 'Sr Choto', NULL, NULL, NULL, '2018-12-12 10:00:25', '2018-12-12 10:00:25'),
(9, 67, 3, 'Name of site', 'Physical address', 'Contact details', 'Contact person', NULL, NULL, NULL, '2022-05-05 09:05:21', '2022-05-05 09:05:21'),
(10, 68, 6, 'TEST', 'TEST', 'TEST', 'TEST', NULL, NULL, NULL, '2022-09-27 11:46:54', '2022-09-27 11:46:54'),
(11, 72, 3, 'another test', 'another test', '254724743788', 'another test', NULL, NULL, NULL, '2022-10-03 10:39:54', '2022-10-03 10:39:54');

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `id` int(11) NOT NULL,
  `application_id` int(11) DEFAULT NULL,
  `sponsor` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `telephone_number` varchar(255) DEFAULT NULL,
  `fax_number` varchar(255) DEFAULT NULL,
  `cell_number` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sponsors`
--
 

--
-- Table structure for table `stages`
--

CREATE TABLE `stages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `min_day` int(11) DEFAULT NULL,
  `max_day` int(11) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `allowance` int(11) DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stages`
--

INSERT INTO `stages` (`id`, `name`, `description`, `min_day`, `max_day`, `duration`, `allowance`, `deleted`, `created`, `modified`) VALUES
(1, 'Submitted', 'Stage 1', 0, 0, 0, 0, NULL, '2018-03-09 16:49:16', '2018-03-09 17:44:01'),
(2, 'Finance', 'Stage 2', 0, 3, 3, 0, NULL, '2018-03-09 16:51:53', '2018-03-09 17:44:07'),
(3, 'Assigned', 'Stage 3', 3, 5, 2, 0, NULL, '2018-03-09 16:55:16', '2018-03-09 17:44:17'),
(4, 'Evaluated', 'Stage 4', 5, 19, 14, 0, NULL, '2018-03-09 17:01:32', '2018-03-09 17:44:27'),
(5, 'Committee', 'Stage 5', 29, 59, 21, 10, NULL, '2018-03-09 17:02:55', '2018-03-09 17:46:17'),
(6, 'Correspondence', 'Stage 6', 34, 64, 5, 0, NULL, '2018-03-09 17:08:32', '2018-03-09 17:47:07'),
(7, 'ApplicantResponse', 'Stage 7', 64, 94, 30, 0, NULL, '2018-03-09 17:09:16', '2018-03-09 17:47:38'),
(8, 'Presented', 'Stage 8', 71, 101, 7, 0, NULL, '2018-03-09 17:11:12', '2018-03-09 17:48:30'),
(9, 'DirectorGeneral', 'Stage 9', 76, 106, 5, 0, NULL, '2018-03-09 17:12:11', '2018-03-09 17:49:54'),
(10, 'DirectorAuthorize', 'Stage 10', 90, 120, 14, 0, NULL, '2018-03-09 17:17:33', '2018-03-09 17:50:48'),
(11, 'DirectorDeclined', 'Stage 11', 90, 120, 14, 0, NULL, '2018-03-09 17:18:07', '2018-03-09 17:51:08'),
(12, 'FinalStage', 'Stage 12', 93, 123, 3, 0, NULL, '2018-03-09 17:28:29', '2018-03-09 17:51:26'),
(13, 'CommitteeDeclined', 'Stage 13', 34, 64, 5, 0, NULL, '2018-04-02 09:48:25', '2018-04-02 09:49:12');

-- --------------------------------------------------------

--
-- Table structure for table `statisticals`
--

CREATE TABLE `statisticals` (
  `id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `statistical_id` int(11) DEFAULT NULL,
  `evaluation_type` varchar(255) DEFAULT NULL,
  `design_type` varchar(255) DEFAULT NULL,
  `randomized` varchar(255) DEFAULT NULL,
  `blinding` varchar(255) DEFAULT NULL,
  `design_description` longtext,
  `design_acceptable` varchar(255) DEFAULT NULL,
  `design_comment` longtext,
  `rand_description` longtext,
  `rand_comment` longtext,
  `sample_acceptable` varchar(255) DEFAULT NULL,
  `power_acceptable` varchar(255) DEFAULT NULL,
  `sample_description` longtext,
  `sample_comment` longtext,
  `analysis_description` longtext,
  `analysis_objective` varchar(255) DEFAULT NULL,
  `analysis_objective_comments` longtext,
  `methods_appropriate` varchar(255) DEFAULT NULL,
  `methods_appropriate_comments` longtext,
  `considerations` varchar(255) DEFAULT NULL,
  `considerations_comments` longtext,
  `multiplicity` varchar(255) DEFAULT NULL,
  `multiplicity_comments` longtext,
  `analyses_acceptable` varchar(255) DEFAULT NULL,
  `analysis_comment` longtext,
  `interim_safety` varchar(255) DEFAULT NULL,
  `interim_planning` varchar(255) DEFAULT NULL,
  `interim_description` longtext,
  `interim_comment` longtext,
  `statistical_acceptable` varchar(255) DEFAULT NULL,
  `information_needed` varchar(255) DEFAULT NULL,
  `overall_comment` longtext,
  `file` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `dir` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `signature` tinyint(4) DEFAULT '0',
  `chosen` int(11) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` datetime DEFAULT NULL,
  `additional` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `storage_conditions`
--

CREATE TABLE `storage_conditions` (
  `id` int(11) NOT NULL,
  `application_id` int(11) DEFAULT NULL,
  `sdrug_id` int(11) DEFAULT NULL,
  `pdrug_id` int(11) DEFAULT NULL,
  `batch_details` varchar(255) DEFAULT NULL,
  `manu_process` varchar(255) DEFAULT NULL,
  `neg_seventy` varchar(255) DEFAULT NULL,
  `neg_twenty` varchar(255) DEFAULT NULL,
  `pos_five` varchar(255) DEFAULT NULL,
  `pos_twenty_five` int(255) DEFAULT NULL,
  `pos_thirty` int(255) DEFAULT NULL,
  `pos_forty` int(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `model` varchar(255) DEFAULT 'sdrug'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

 

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_no` char(40) DEFAULT NULL,
  `name_of_institution` varchar(255) DEFAULT NULL,
  `institution_physical` varchar(255) DEFAULT NULL,
  `institution_address` varchar(255) DEFAULT NULL,
  `institution_contact` varchar(255) DEFAULT NULL,
  `county_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  `activation_key` varchar(200) DEFAULT NULL,
  `forgot_password` tinyint(2) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `is_admin` tinyint(1) DEFAULT '0',
  `deactivated` tinyint(1) NOT NULL DEFAULT '0',
  `file` varchar(255) DEFAULT NULL,
  `dir` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `confirm_password`, `name`, `email`, `phone_no`, `name_of_institution`, `institution_physical`, `institution_address`, `institution_contact`, `county_id`, `country_id`, `group_id`, `activation_key`, `forgot_password`, `is_active`, `is_admin`, `deactivated`, `file`, `dir`, `size`, `type`, `created`, `modified`, `deleted`) VALUES
(1, 'administrator', '$2y$10$/ikpcYr/rX0qSH4FzaSb0OpDe03ME/3eoh5k.TWN7oATYzj/X9BWy', '$2y$10$Z1A.X8vCGGhPJOqF.0FcceUynm789U6tJaME5jjwpkDkXPmlxLnye', 'Administrator', 'kiprotich.japheth19@gmail.com', '+254724743788', 'Kenyatta National Hospital', '', '', '', NULL, NULL, 1, '', NULL, 1, 0, 0, NULL, NULL, NULL, NULL, '2017-12-02 11:43:41', '2021-07-10 07:19:29', NULL),
(2, 'manager', '$2y$10$YDcht4mV0adBwWU7L9BzPu2jbkt8XnRvSmWWCJcL9TVIci7hc5n6G', '$2y$10$kK676jpdYesDMEn43gm.0udILF8Sk89DLzm8M4offAp.hdzdNDqqu', 'manager', 'keeprawteachjapheth@gmail.com', '+254724743788', 'Kenyatta National Hospital', '', '', '', NULL, NULL, 2, '', NULL, 1, 0, 0, 'LC pp signature.PNG', 'webroot/files/Users/file/', '72369', 'image/png', '2017-12-02 11:48:08', '2018-08-29 10:54:48', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acl_phinxlog`
--
ALTER TABLE `acl_phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `acos`
--
ALTER TABLE `acos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lft` (`lft`,`rght`),
  ADD KEY `alias` (`alias`);

--
-- Indexes for table `annual_approvals`
--
ALTER TABLE `annual_approvals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appeals`
--
ALTER TABLE `appeals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_stages`
--
ALTER TABLE `application_stages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aros`
--
ALTER TABLE `aros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lft` (`lft`,`rght`),
  ADD KEY `alias` (`alias`);

--
-- Indexes for table `aros_acos`
--
ALTER TABLE `aros_acos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `aro_id` (`aro_id`,`aco_id`),
  ADD KEY `aco_id` (`aco_id`);

--
-- Indexes for table `assign_evaluators`
--
ALTER TABLE `assign_evaluators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `captchas`
--
ALTER TABLE `captchas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `captcha_phinxlog`
--
ALTER TABLE `captcha_phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `clinicals`
--
ALTER TABLE `clinicals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committees`
--
ALTER TABLE `committees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committee_dates`
--
ALTER TABLE `committee_dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committee_reviews`
--
ALTER TABLE `committee_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compliance`
--
ALTER TABLE `compliance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `database_logs`
--
ALTER TABLE `database_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `database_log_phinxlog`
--
ALTER TABLE `database_log_phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `dg_reviews`
--
ALTER TABLE `dg_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluation_headers`
--
ALTER TABLE `evaluation_headers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `final_stages`
--
ALTER TABLE `final_stages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finance_annual_approvals`
--
ALTER TABLE `finance_annual_approvals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finance_approvals`
--
ALTER TABLE `finance_approvals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gcp_inspections`
--
ALTER TABLE `gcp_inspections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investigator_contacts`
--
ALTER TABLE `investigator_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `non_clinicals`
--
ALTER TABLE `non_clinicals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pdrugs`
--
ALTER TABLE `pdrugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `placebos`
--
ALTER TABLE `placebos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quality`
--
ALTER TABLE `quality`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quality_assessments`
--
ALTER TABLE `quality_assessments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queued_jobs`
--
ALTER TABLE `queued_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queue_phinxlog`
--
ALTER TABLE `queue_phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `queue_processes`
--
ALTER TABLE `queue_processes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refids`
--
ALTER TABLE `refids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_infos`
--
ALTER TABLE `request_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviewers`
--
ALTER TABLE `reviewers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sdrugs`
--
ALTER TABLE `sdrugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sdrugs_conditions`
--
ALTER TABLE `sdrugs_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seventy_fives`
--
ALTER TABLE `seventy_fives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_details`
--
ALTER TABLE `site_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statisticals`
--
ALTER TABLE `statisticals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storage_conditions`
--
ALTER TABLE `storage_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acos`
--
ALTER TABLE `acos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1873;
--
-- AUTO_INCREMENT for table `annual_approvals`
--
ALTER TABLE `annual_approvals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `appeals`
--
ALTER TABLE `appeals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `application_stages`
--
ALTER TABLE `application_stages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;
--
-- AUTO_INCREMENT for table `aros`
--
ALTER TABLE `aros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
--
-- AUTO_INCREMENT for table `aros_acos`
--
ALTER TABLE `aros_acos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `assign_evaluators`
--
ALTER TABLE `assign_evaluators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=441;
--
-- AUTO_INCREMENT for table `captchas`
--
ALTER TABLE `captchas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `clinicals`
--
ALTER TABLE `clinicals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;
--
-- AUTO_INCREMENT for table `committees`
--
ALTER TABLE `committees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `committee_dates`
--
ALTER TABLE `committee_dates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `committee_reviews`
--
ALTER TABLE `committee_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `compliance`
--
ALTER TABLE `compliance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `database_logs`
--
ALTER TABLE `database_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=365;
--
-- AUTO_INCREMENT for table `dg_reviews`
--
ALTER TABLE `dg_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `evaluation_headers`
--
ALTER TABLE `evaluation_headers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `final_stages`
--
ALTER TABLE `final_stages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `finance_annual_approvals`
--
ALTER TABLE `finance_annual_approvals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `finance_approvals`
--
ALTER TABLE `finance_approvals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `gcp_inspections`
--
ALTER TABLE `gcp_inspections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `investigator_contacts`
--
ALTER TABLE `investigator_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT for table `non_clinicals`
--
ALTER TABLE `non_clinicals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5313;
--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pdrugs`
--
ALTER TABLE `pdrugs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `placebos`
--
ALTER TABLE `placebos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `quality`
--
ALTER TABLE `quality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quality_assessments`
--
ALTER TABLE `quality_assessments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `queued_jobs`
--
ALTER TABLE `queued_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4665;
--
-- AUTO_INCREMENT for table `queue_processes`
--
ALTER TABLE `queue_processes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49307;
--
-- AUTO_INCREMENT for table `refids`
--
ALTER TABLE `refids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `request_infos`
--
ALTER TABLE `request_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `reviewers`
--
ALTER TABLE `reviewers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sdrugs`
--
ALTER TABLE `sdrugs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sdrugs_conditions`
--
ALTER TABLE `sdrugs_conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `seventy_fives`
--
ALTER TABLE `seventy_fives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `site_details`
--
ALTER TABLE `site_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `stages`
--
ALTER TABLE `stages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `statisticals`
--
ALTER TABLE `statisticals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `storage_conditions`
--
ALTER TABLE `storage_conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

DELIMITER $$
CREATE TRIGGER `tgr_compliance` BEFORE INSERT ON `compliance` FOR EACH ROW BEGIN
  SET NEW.quality_assessment_id = 
     (
       SELECT id 
         FROM quality_assessments
        WHERE created = NEW.created_at
     );
END
$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER `tgr_pdrugs` BEFORE INSERT ON `pdrugs` FOR EACH ROW BEGIN
  SET NEW.quality_assessment_id = 
     (
       SELECT id 
         FROM quality_assessments
        WHERE created = NEW.created_at
     );
END
$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER `trg_refids` BEFORE INSERT ON `refids` FOR EACH ROW BEGIN
      DECLARE nrefid INT;
      SELECT  COALESCE(MAX(refid), 0) + 1
      INTO    nrefid
      FROM    `refids`      
      WHERE   model = NEW.model;
      SET NEW.refid = nrefid;
END
$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER `tgr_sdrugs` BEFORE INSERT ON `sdrugs` FOR EACH ROW BEGIN
  SET NEW.quality_assessment_id = 
     (
       SELECT id 
         FROM quality_assessments
        WHERE created = NEW.created_at
     );
END
$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER `tgr_sdrugs_conditions` BEFORE INSERT ON `sdrugs_conditions` FOR EACH ROW BEGIN
  SET NEW.sdrug_id = 
     (
       SELECT id 
         FROM sdrugs
        WHERE created_at = NEW.created_at and NEW.model = 'sdrug'
     );
END
$$
DELIMITER ;


DELIMITER $$
CREATE TRIGGER `tgr_pdrugs_storage_conditions` BEFORE INSERT ON `storage_conditions` FOR EACH ROW BEGIN
  SET NEW.pdrug_id = 
     (
       SELECT id 
         FROM pdrugs
        WHERE created_at = NEW.created_at and NEW.model = 'pdrug'
     );
END
$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER `tgr_sdrugs_storage_conditions` BEFORE INSERT ON `storage_conditions` FOR EACH ROW BEGIN
  SET NEW.sdrug_id = 
     (
       SELECT id 
         FROM sdrugs
        WHERE created_at = NEW.created_at AND NEW.model = 'sdrug'
     );
END
$$
DELIMITER ;