-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2018 at 01:35 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sistempenjadwalanlab`
--

-- --------------------------------------------------------

--
-- Table structure for table `asdos`
--

CREATE TABLE IF NOT EXISTS `asdos` (
  `npm` varchar(9) NOT NULL,
  `nama_asdos` varchar(50) DEFAULT NULL,
  `semester` int(1) NOT NULL,
  `no_hp` bigint(15) DEFAULT NULL,
  PRIMARY KEY (`npm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asdos`
--

INSERT INTO `asdos` (`npm`, `nama_asdos`, `semester`, `no_hp`) VALUES
('G1A013025', 'Sumitra', 9, 0),
('G1A013027', 'M. Syahkuala Okrianto', 9, 0),
('G1A013033', 'Mahdarina', 5, 0),
('G1A014012', 'Hafzatin Nurlatifa', 7, 0),
('G1A015007', 'Qolby Yostra E.A', 5, 6285320209945),
('G1A015010', 'Tommy Alexander T.', 5, 0),
('G1A015012', 'Andi Irvan Zakaria', 5, 0),
('G1A015013', 'Widiya Oktariani', 5, 0),
('G1A015016', 'Aji Dwi Herza', 5, 0),
('G1A015022', 'Agief Muftahid', 5, 0),
('G1A015023', 'Wika Andita', 5, 0),
('G1A015024', 'Nadine Dwi Pratiwi', 5, 0),
('G1A015028', 'Sudarti Siburian', 5, 0),
('G1A015042', 'Sani Putriana', 5, 0),
('G1A015044', 'Reynaldi Sumantri', 5, 0),
('G1A015051', 'Agung Jodiansyah', 5, 0),
('G1A015064', 'Eka Agustin', 5, 0),
('G1A016007', 'Taufiqrohman', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `nip` bigint(30) NOT NULL,
  `nama_dosen` varchar(50) DEFAULT NULL,
  `alamat_dosen` varchar(50) DEFAULT NULL,
  `status_dosen` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT COMMENT='merupakan table dosen';

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `nama_dosen`, `alamat_dosen`, `status_dosen`) VALUES
(198909032015041004, 'Yudi Setiawan, ST., M.Eng', 'Lingkar Barat', 'Tetap'),
(195904241986021001, 'Drs. Asahar Johar T., M.Si', 'Perumnas UNIB', 'Tetap'),
(198205172008121004, 'Funny Farady Coastera', 'UNIB Belakang', 'Tetap'),
(198101122005011002, 'Rusdi Efendi, S.T., M.Kom', 'Perum Al-Kausar', 'Tetap'),
(197812072005012001, 'Desi Andreswati, S.T., M.Cs', 'Lingkar Barat', 'Tetap'),
(198112222008011011, 'Aan Erlansari, S.T., M.Eng', 'Talang Kering', 'Tetap');

-- --------------------------------------------------------

--
-- Table structure for table `gunakan`
--

CREATE TABLE IF NOT EXISTS `gunakan` (
  `kd_matakuliah` int(4) DEFAULT NULL,
  `id_lab` int(4) DEFAULT NULL,
  `kelompok` varchar(2) NOT NULL,
  PRIMARY KEY (`kelompok`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='merupakan table baru dari entitas mata kuliah dengan ruangan';

--
-- Dumping data for table `gunakan`
--

INSERT INTO `gunakan` (`kd_matakuliah`, `id_lab`, `kelompok`) VALUES
(5001, 1001, 'AA'),
(5002, 1002, 'AB'),
(5004, 1004, 'XB'),
(5003, 1003, 'XC');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_lab`
--

CREATE TABLE IF NOT EXISTS `jadwal_lab` (
  `kd_jadwal` varchar(7) NOT NULL,
  `nama_matkul` varchar(50) DEFAULT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `jam_awal` time DEFAULT NULL,
  `jam_akhir` time DEFAULT NULL,
  `ruang` varchar(30) DEFAULT NULL,
  `kelas` varchar(2) DEFAULT NULL,
  `dosen_pengampu` varchar(30) DEFAULT NULL,
  `asdos` varchar(30) DEFAULT NULL,
  `asdos2` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`kd_jadwal`),
  UNIQUE KEY `jam_awal` (`jam_awal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_lab`
--

INSERT INTO `jadwal_lab` (`kd_jadwal`, `nama_matkul`, `hari`, `jam_awal`, `jam_akhir`, `ruang`, `kelas`, `dosen_pengampu`, `asdos`, `asdos2`) VALUES
('JD001', 'RPL', 'Selasa', '08:00:00', '08:50:00', 'Lab Pemrograman', 'B1', 'Desi Andreswati, S.T., M.Cs', 'Andi Irvan Zakaria', 'Sudarti Siburian'),
('JD002', 'Analisis dan Perancangan Sistem', 'Rabu', '08:30:00', '10:00:00', 'Lab Pemrograman', 'B2', 'Aan Erlansari, S.T., M.Eng', 'Sumitra', 'Rio Ferdiansyah');

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE IF NOT EXISTS `mata_kuliah` (
  `kd_matakuliah` varchar(7) NOT NULL,
  `nama_matakuliah` varchar(50) NOT NULL,
  `semester` int(1) NOT NULL,
  `sks` int(1) NOT NULL,
  PRIMARY KEY (`kd_matakuliah`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='merupakan table mata kuliah';

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`kd_matakuliah`, `nama_matakuliah`, `semester`, `sks`) VALUES
('TIF-215', 'RPL', 3, 3),
('TIF-114', 'PPRPL', 1, 4),
('TIF-125', 'Lingkungan Komputasi', 1, 3),
('TIF-211', 'Matematika Komputasi', 3, 3),
('TIF-214', 'Basis Data', 3, 3),
('TIF-314', 'Jaringan Komputasi', 5, 3),
('TIF-321', 'Analisis dan Perancangan Sistem', 5, 3),
('TIR-411', 'Keamanan Sistem dan Jaringan', 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ruang_lab`
--

CREATE TABLE IF NOT EXISTS `ruang_lab` (
  `id_lab` varchar(5) NOT NULL,
  `nama_lab` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_lab`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='merupakan table ruangan lab';

--
-- Dumping data for table `ruang_lab`
--

INSERT INTO `ruang_lab` (`id_lab`, `nama_lab`) VALUES
('LAB01', 'Lab Pengolahan Citra'),
('LAB02', 'Lab Jaringan'),
('LAB03', 'Lab Sistem Cerdas'),
('LAB04', 'Lab Pemrograman');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `role` enum('admin','member') NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='merupakan table pengguna' AUTO_INCREMENT=26 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `email`, `fullname`, `role`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', 'Administrator', 'admin'),
(25, 'baim', 'baim123', 'baim@gmail.com', 'ibrahim', 'member');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
