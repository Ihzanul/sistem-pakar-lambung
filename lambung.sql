-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2021 at 02:18 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lambung`
--

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(11) NOT NULL,
  `nama_gejala` varchar(50) NOT NULL,
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
(21, 'Tinja warnah Kehitaman', 'G21');

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
(1, 'wew', 'Jl. Kambarago', 12, 'Dispesia');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL,
  `info` longtext NOT NULL,
  `solusi` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `nama_penyakit`, `info`, `solusi`) VALUES
(1, 'Dispesia', 'Malaria tertiana adalah salah satu dari jenis-jenis malaria yang terbilang umum dan ringan meski masih ada yang lebih ringan dari ini, yakni malaria ovale. Jenis tertiana adalah kondisi malaria yang ada hubungannya dengan parasit bernama Plasmodium vivax. Parasit inilah yang pada umumnya menyebabkan adanya infeksi pada eritrosit muda di mana diameternya juga memang lebih besar ketimbang yang normal.', 'Ketika sudah menempuh diagnosa, maka akan dapat ditentukan oleh dokter bahwa malaria tersebut memang jenis malaria tertiana dan pengobatan pun bisa diberikan. Ada sejumlah obat-obatan yang bakal diberikan oleh dokter kepada penderita. Obat penurun demam adalah yang paling pasti diberikan oleh dokter, sekaligus vitamin sebagai cara meningkatkan daya tahan tubuh penderita.'),
(2, 'Gerd', 'Malaria quartana merupakan salah satu jenis malaria yang disebabkan oleh adanya plasmodium malariae. Jenis malara kuartana juga bisadikatakan merupakan salah satu jenis malaria yang tingkat keparahannya bisa lebih besar dibandingkan dengan jenis malaria yang lain. Masa inkubasi yang terjadi pada malaria jneis quartana ini juga lebih lama dibandingkan dengan jenis malaria yang lain.', 'Jika anda akan menggunakan cara medis berarti anda harus melakukan pengobatan oleh dokter, biasanya dalam pemberian obat dokter akan memberikan obat yang memiliki funsii untuk membunuh semua parasit yang ada kemudian akan memberikan obat yang bisa menyembuhka infeksi yang ada. Obat-bat yang biasanya dianjurkan oleh dokter untuk pengobatan malaria khususnya malaria quartana ialah seperti  vaksin, Primakuin dll.'),
(3, 'Gastritis', 'penyebab utama dari malaria jenis tropika adalah parasit yang bernama Plasmodium falciparum di mana jenis malaria inilah yang paling sering terjadi komplikasi. Seluruh bentuk eritrosit juga diketahui diserang oleh malaria tropika berbeda dari jenis malaria tertiana yang hanya menyerang eritrosit muda.\r\n', 'Kina 3×2 tablet yang perlu dikonsumsi selama 7 hari.\r\nKombinasi sulfadoksin 1000 mg bersama dengan 25 mg akan pirimetamin per tablet dengan dosis tunggal yang perlu dikonsumsi sebanyak 2-3 tablet.\r\nKombinasi tetrasiklin dan kina.\r\nJenis obat antibiotik seperti tetrasiklin selama 7-10 hari dengan dosis 4 x 250 mg per hari, serta minosiklin dengan dosis 2 x 100 mg per hari yang juga dikonsumsi seminggu.');

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
  `G21` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rule`
--

INSERT INTO `rule` (`id_rule`, `G01`, `G02`, `G03`, `G04`, `G05`, `G06`, `G07`, `G08`, `G09`, `G10`, `G11`, `G12`, `G13`, `G14`, `G15`, `G16`, `G17`, `G18`, `G19`, `G20`, `G21`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 1, 0, 1, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 0, 0),
(3, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 1, 0, 1, 1);

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
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rule`
--
ALTER TABLE `rule`
  MODIFY `id_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
