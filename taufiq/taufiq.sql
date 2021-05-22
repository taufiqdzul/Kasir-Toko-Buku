-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2017 at 09:50 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `taufiq`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
  `id_buku` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `noisbn` varchar(50) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_pokok` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `ppn` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  PRIMARY KEY (`id_buku`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `noisbn`, `penulis`, `penerbit`, `tahun`, `stok`, `harga_pokok`, `harga_jual`, `ppn`, `diskon`) VALUES
(2, 'Matahari', 'KD99288DKK', 'Galang', 'Gramedia', 2017, 99, 150000, 200000, 2, 4),
(3, 'Bintang', 'IKLD3D9DK', 'Darmoko', 'Armico', 2017, 99, 30000, 40000, 2, 1),
(4, 'Bulan', 'EI89EK', 'Dodo', 'Erlangga', 2017, 98, 90000, 100000, 5, 3),
(5, 'Bumi', 'EIK399KL', 'Lomanto', 'Pagoda', 2017, 99, 50000, 60000, 0, 0),
(6, 'Asteroid', 'KDK389', 'Mutan', 'Madiun', 2017, 98, 400000, 600000, 2, 1),
(7, 'Geometri', 'M9399KL', 'Romlah', 'Madiun', 2017, 45, 46000, 50000, 3, 2),
(8, 'Matematika', 'IOL893L', 'Hamdan', 'Bandung', 2017, 39, 65000, 78000, 2, 0),
(9, 'IPA', 'KD9KDL', 'Dato', 'Semarang', 2017, 26, 45000, 80000, 3, 0),
(10, 'Sejarah', 'W939LS', 'Harmadi', 'Jepara', 2017, 29, 200000, 300000, 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

CREATE TABLE IF NOT EXISTS `distributor` (
  `id_distributor` int(11) NOT NULL AUTO_INCREMENT,
  `nama_distributor` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  PRIMARY KEY (`id_distributor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `distributor`
--

INSERT INTO `distributor` (`id_distributor`, `nama_distributor`, `alamat`, `telepon`) VALUES
(1, 'Agung', 'Cibayondah', '08972837228'),
(2, 'Pebby', 'Bojongsoang', '089767276266');

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE IF NOT EXISTS `kasir` (
  `id_kasir` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`id_kasir`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `nama`, `alamat`, `telepon`, `status`) VALUES
('K-0001', 'Muhamad Taufiq', 'Banjaran', '08928292929', 'Pegawai Aktif'),
('K-0002', 'Abdul', 'Ciseeng', '0989392829', 'Pegawai Tidak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `pasok`
--

CREATE TABLE IF NOT EXISTS `pasok` (
  `id_pasok` int(11) NOT NULL AUTO_INCREMENT,
  `id_distributor` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_pasok`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `pasok`
--

INSERT INTO `pasok` (`id_pasok`, `id_distributor`, `id_buku`, `jumlah`, `tanggal`) VALUES
(1, 1, 2, 100, '2017-03-16'),
(2, 2, 2, 1, '2017-03-16'),
(3, 2, 3, 100, '2017-03-16'),
(4, 1, 4, 100, '2017-03-16'),
(5, 2, 5, 100, '2017-03-16'),
(6, 1, 6, 100, '2017-03-16'),
(7, 2, 7, 45, '2017-03-16'),
(8, 2, 8, 39, '2017-03-16'),
(9, 2, 9, 26, '2017-03-16'),
(10, 2, 10, 29, '2017-03-17');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `id_penjualan` int(11) NOT NULL AUTO_INCREMENT,
  `id_buku` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id_penjualan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_buku`, `id_transaksi`, `jumlah`, `total`) VALUES
(1, 2, 1, 1, 195840),
(2, 6, 2, 1, 605880),
(3, 4, 2, 2, 203700),
(4, 3, 3, 1, 40392),
(5, 5, 3, 1, 60000),
(6, 2, 3, 1, 195840),
(7, 6, 4, 1, 605880);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_kasir` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `total_transaksi` int(11) NOT NULL,
  `pembayaran` int(11) NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_kasir`, `tanggal`, `total_transaksi`, `pembayaran`) VALUES
(1, 'K-0001', '2017-03-16', 195840, 200000),
(2, 'K-0001', '2017-03-16', 809580, 1000000),
(3, 'K-0001', '2017-03-16', 296232, 300000),
(4, 'K-0001', '2017-03-16', 605880, 700000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `akses` int(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `akses`) VALUES
(1, 'admin', 'admin', 0),
(2, 'K-0001', 'taufiq', 1),
(3, 'K-0002', 'abdul', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
