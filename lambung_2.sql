-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2021 at 07:21 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lambung_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(11) NOT NULL,
  `nama_gejala` varchar(100) NOT NULL,
  `kode_gejala` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `nama_gejala`, `kode_gejala`) VALUES
(1, 'Tidak enak uluh hati', 'G01'),
(2, 'Mual dan Muntah', 'G02'),
(3, 'Panas Dalam', 'G03'),
(4, 'Rasa Asam di Mulut', 'G04'),
(5, 'Demam', 'G05'),
(6, 'Perut Kembung', 'G06'),
(7, 'Cepat Merasa Kenyang', 'G07'),
(8, 'Rasa Gemetar Kaki Pada saat  berdiri', 'G08'),
(9, 'Rasa Panas di Dada', 'G09'),
(10, 'Sendawa', 'G10'),
(11, 'Cegukan', 'G11'),
(12, 'Susah Menelan', 'G12'),
(13, 'Rasa nyeri Ketika menelan', 'G13'),
(14, 'Sesak nafas pada saat malam hari', 'G14'),
(15, 'Suara Parau', 'G15'),
(16, 'Kurang nafsu makan', 'G16'),
(17, 'Mulut terasa pahit', 'G17'),
(18, 'Rasa Nyeri Uluh hati', 'G18'),
(19, 'Rasa Nyeri di dada', 'G19'),
(20, 'Muntah Darah', 'G20'),
(21, 'Tinja warnah Kehitaman', 'G21'),
(22, 'Rasa nyeri berkurang setelah munta', 'G22'),
(23, 'Rasa nyeri pada tenga malam', 'G23'),
(24, 'Piroris ( Rasa panas di daerah perut, dada sampai ke leher )', 'G24'),
(25, 'Rasa nyeri pada perut bagian atas', 'G25'),
(26, 'BAB berdarah', 'G26'),
(27, 'Rasa nyeri di perut', 'G27'),
(28, 'Denyut nadi tidak normal', 'G28'),
(29, 'Tensi turun', 'G29'),
(30, 'BAB sebanyak tiga kali', 'G30'),
(31, 'Tinja encer', 'G31'),
(32, 'Tinja kadang berdarah', 'G32'),
(33, 'Mual', 'G33'),
(34, 'Munta-munta', 'G34');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `umur` int(11) NOT NULL,
  `hasil_diagnosa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama`, `alamat`, `umur`, `hasil_diagnosa`) VALUES
(33, 'nmasnmasn', 'asmnsamsna', 76, 'Gastroentritis'),
(34, 'nmasnasmn', 'samnnsamnas', 78, 'Tukak%20Lambung'),
(35, 'nmsanma', 'nmasnma', 78, 'Tukak'),
(36, 'maamad', 'Jl. Kambarago', 67, 'Kanker');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL,
  `info` longtext NOT NULL,
  `solusi` longtext NOT NULL,
  `solusi_` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `nama_penyakit`, `info`, `solusi`, `solusi_`) VALUES
(1, 'Dispesia', 'Dispepsia merupakan suatu kondisi yang bisa menyebabkan rasa tidak nyaman pada perut bagian atas karena penyakit asam lambung atau maag. Meski begitu, dispepsia bukanlah sebuah penyakit, tapi tanda atau gejala dari suatu penyakit pencernaan yang dialami seseorang. Hal yang perlu diwaspadai, dispepsia yang dibiarkan bisa berkembang menjadi lebih serius.', 'Dapat memberikan obat-obatan : <br>\r\n1. Antasida. <br>\r\n2. Proton Pump Inhibitors (PPI). Obat golongan ini dapat mengurangi produksi asam lambung.\r\n\r\n3. H-2 receptor antagonists (H2RAs) untuk mengurangi produksi asam lambung.\r\n\r\n4. Prokinetik dapat membantu proses pengosongan lambung.\r\n\r\n5. Antibiotik, pemberiaannya dilakukan jika dispepsia disebabkan oleh infeksi.\r\n\r\n6. Anti-depressants atau anti-anxiety dapat digunakan juga untuk menghilangkan rasa tidak nyaman yang diakibatkan dispepsia dengan menurunkan sensasi nyeri yang dialami.', 'ispepsia merupakan suatu kondisi yang bisa menyebabkan rasa tidak nyaman pada perut bagian atas karena penyakit asam lambung atau maag. Meski begitu, dispepsia bukanlah sebuah penyakit, tapi tanda atau gejala dari suatu penyakit pencernaan yang dialami seseorang. Hal yang perlu diwaspa'),
(2, 'Gerd', 'Gastroesophageal reflux disease (GERD) adalah penyakit kronik pada sistem pencernaan. GERD terjadi ketika asam lambung naik kembali ke esofagus (kerongkongan). Hal ini dapat menyebabkan terjadinya iritasi pada esofagus.', 'Bisa mengonsumsi obat-obatan golongan berikut ini:\r\n\r\n1. Antasida.\r\n2. H-2 receptor blockers, seperti cimetidine, famotidine, dan ranitidine.\r\n3. Proton pump inhibitors (PPIs), seperti lansoprazole dan omeprazole.', ''),
(3, 'Gastritis', 'Gastritis merupakan penyakit pada lambung yang terjadi akibat peradangan dinding lambung. Pada dinding lambung atau lapisan mukosa lambung ini terdapat kelenjar yang menghasilkan asam lambung dan enzim pencernaan yang bernama pepsin. Untuk melindungi lapisan mukosa lambung dari kerusakan yang diakibatkan asam lambung, dinding lambung dilapisi oleh lendir (mukus) yang tebal. Apabila mukus tersebut rusak, dinding lambung rentan mengalami peradangan.', '1. antasida. Antasida mampu meredakan gejala gastritis (terutama rasa nyeri) secara cepat, dengan cara menetralisir asam lambung.\r\n2. Obat penghambat histamin 2 (H2 blocker). Obat ini mampu meredakan gejala gastritis dengan cara menurunkan produksi asam di dalam lambung.\r\n3. Obat penghambat pompa proton (PPI). Obat ini memiliki tujuan yang sama seperti penghambat histamin 2, yaitu menurunkan produksi asam lambung, namun dengan mekanisme kerja yang berbeda.\r\n4. Obat antibiotik. Obat ini diresepkan pada penderita gastritis yang disebabkan oleh infeksi bakteri, yaitu Helicobacter pylori.\r\n5. Obat antidiare. Diberikan kepada penderita gastritis dengan keluhan diare.', ''),
(4, 'Tukak', 'cecee2d', 'cc2cc', '2fe3'),
(5, 'Kanker', 'cecxsw3333333333333', 'd33d3d3d33', 'd3d3d3d3d3'),
(6, 'Gastroparesis', 'ceqccecccwc', 'c2c2c2', 'c2c2c'),
(7, 'Gastroentritis', 'd2d2', 'd2d2d2', 'dddqdq');

-- --------------------------------------------------------

--
-- Table structure for table `rule`
--

CREATE TABLE `rule` (
  `id_rule` int(11) NOT NULL,
  `G01` tinyint(4) NOT NULL,
  `G02` tinyint(4) NOT NULL,
  `G03` tinyint(4) NOT NULL,
  `G04` tinyint(4) NOT NULL,
  `G05` tinyint(4) NOT NULL,
  `G06` tinyint(4) NOT NULL,
  `G07` tinyint(4) NOT NULL,
  `G08` tinyint(4) NOT NULL,
  `G09` tinyint(4) NOT NULL,
  `G10` tinyint(4) NOT NULL,
  `G11` tinyint(4) NOT NULL,
  `G12` tinyint(4) NOT NULL,
  `G13` tinyint(4) NOT NULL,
  `G14` tinyint(4) NOT NULL,
  `G15` tinyint(4) NOT NULL,
  `G16` tinyint(4) NOT NULL,
  `G17` tinyint(4) NOT NULL,
  `G18` tinyint(4) NOT NULL,
  `G19` tinyint(4) NOT NULL,
  `G20` tinyint(4) NOT NULL,
  `G21` tinyint(4) NOT NULL,
  `G22` tinyint(4) NOT NULL,
  `G23` tinyint(4) NOT NULL,
  `G24` tinyint(4) NOT NULL,
  `G25` tinyint(4) NOT NULL,
  `G26` tinyint(4) NOT NULL,
  `G27` tinyint(4) NOT NULL,
  `G28` tinyint(4) NOT NULL,
  `G29` tinyint(4) NOT NULL,
  `G30` tinyint(4) NOT NULL,
  `G31` tinyint(4) NOT NULL,
  `G32` tinyint(4) NOT NULL,
  `G33` tinyint(4) NOT NULL,
  `G34` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rule`
--

INSERT INTO `rule` (`id_rule`, `G01`, `G02`, `G03`, `G04`, `G05`, `G06`, `G07`, `G08`, `G09`, `G10`, `G11`, `G12`, `G13`, `G14`, `G15`, `G16`, `G17`, `G18`, `G19`, `G20`, `G21`, `G22`, `G23`, `G24`, `G25`, `G26`, `G27`, `G28`, `G29`, `G30`, `G31`, `G32`, `G33`, `G34`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 1, 0, 1, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 1, 0),
(6, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 1),
(7, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 1, 1, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD KEY `id_penyakit` (`id_penyakit`);

--
-- Indexes for table `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`id_rule`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `rule`
--
ALTER TABLE `rule`
  MODIFY `id_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD CONSTRAINT `penyakit_ibfk_1` FOREIGN KEY (`id_penyakit`) REFERENCES `rule` (`id_rule`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
