-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2014 at 10:16 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecomm`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
`kd_brg` int(11) NOT NULL,
  `kd_ktgr` char(6) NOT NULL,
  `nm_brg` varchar(50) NOT NULL,
  `bahan` varchar(25) NOT NULL,
  `ukuran` varchar(4) NOT NULL,
  `harga` double NOT NULL,
  `stok` int(5) NOT NULL,
  `nama_field` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=armscii8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_brg`, `kd_ktgr`, `nm_brg`, `bahan`, `ukuran`, `harga`, `stok`, `nama_field`, `keterangan`) VALUES
(18, '1', 'Akrapovic Perisai', 'Serat Karbon', 'all ', 800000, 70, 'akrapovic5.jpg', ''),
(19, '1', 'akrapovic150', 'stenlis', 'all ', 700000, 90, 'akrapovic7.jpg', ''),
(20, '3', 'Termignomi', 'Stenlis', 'all ', 700000, 90, 'termignomi.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `biaya_kirim`
--

CREATE TABLE IF NOT EXISTS `biaya_kirim` (
`kd_biaya_krm` int(11) NOT NULL,
  `nm_kota` varchar(50) NOT NULL,
  `biaya_krm` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `biaya_kirim`
--

INSERT INTO `biaya_kirim` (`kd_biaya_krm`, `nm_kota`, `biaya_krm`) VALUES
(1, 'Banda Aceh', 90000),
(4, 'Bandung', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `dpesan`
--

CREATE TABLE IF NOT EXISTS `dpesan` (
`no_dpsn` int(11) NOT NULL,
  `no_psn` int(11) NOT NULL,
  `kd_brg` int(11) NOT NULL,
  `jum_brg` tinyint(4) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `dpesan`
--

INSERT INTO `dpesan` (`no_dpsn`, `no_psn`, `kd_brg`, `jum_brg`) VALUES
(1, 1, 9, 2),
(2, 1, 8, 1),
(3, 1, 10, 3),
(6, 4, 15, 2),
(7, 4, 14, 2),
(8, 4, 8, 3),
(9, 4, 13, 5),
(10, 5, 20, 1),
(11, 5, 19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
`kd_ktgr` int(11) NOT NULL,
  `nm_ktgr` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kd_ktgr`, `nm_ktgr`) VALUES
(1, 'akraprovic'),
(3, 'Termignomi'),
(4, 'Yosimura'),
(5, 'M4');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
`idlogin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=armscii8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`idlogin`, `username`, `password`, `status`) VALUES
(1, 'admin', '*2A1A57C49941F3BE8E4CEB49E4929EF2F8117AF0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pemesan`
--

CREATE TABLE IF NOT EXISTS `pemesan` (
`id_pms` int(11) NOT NULL,
  `nm_pms` varchar(100) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `pesan` text NOT NULL,
  `tglinput` datetime NOT NULL,
  `kd_pos` varchar(6) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pemesan`
--

INSERT INTO `pemesan` (`id_pms`, `nm_pms`, `alamat`, `kota`, `email`, `telp`, `pesan`, `tglinput`, `kd_pos`) VALUES
(1, 'Abdillah', 'Jl. Pecangaan no.22', 'Jepara', 'abdillah@gmail.com', '098978767698', 'cek bismillah', '2011-07-24 09:04:57', '87982'),
(4, 'Andi anas', 'Kute', 'Bali', 'andanas@gmail.com', '08876675768', 'ada deh', '2011-07-30 08:24:58', '29809'),
(5, 'dhion', 'pbb', 'bandung', 'syaifrijal@gmail.com', '0857478845', 'asa', '2014-12-09 01:01:29', '53382');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE IF NOT EXISTS `perusahaan` (
`id_perus` int(11) NOT NULL,
  `nama_perus` varchar(50) NOT NULL,
  `alamat_perus` varchar(250) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `bank` varchar(30) NOT NULL,
  `no_rek` varchar(15) NOT NULL,
  `atas_nm` varchar(30) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perus`, `nama_perus`, `alamat_perus`, `no_telp`, `email`, `bank`, `no_rek`, `atas_nm`, `about`) VALUES
(1, 'Putra Jaya Sport Muffler Production', 'JLN Ketuhu sebelah perum mutiara regency,kelurahan wirasana,utara tugu patung knalpot,Menjual Aneka Knalpot dari Kota knalpot Purbalingga,Banyumas, Jawa Tengah', '082226495777 //', 'putrajayasport@gmail.com', 'BCA', '097 0465 171', 'BAYU DWI SAPUTRA', 'Kami adalah produsen skaligus distributor asli desa Pesayangan, ingin menawarkan beberapa varian knalpot mOTOR juga MOBIL untuk Ninja 250 injeksi/carbu, Ninja mono,CBR 150/250,R15,R25,Pulsar 200ns, Byson, Vixion, Pulsar, Tiger, Satria Fu, Mx, Vario, Mio dll.\r\n\nSUARA dan KUALITAS terjamin, SESUAI KEINGINAN ANDA . . .');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
`no_psn` int(11) NOT NULL,
  `tgl_psn` date NOT NULL,
  `id_pms` int(11) NOT NULL,
  `status` enum('sedang diproses','dikirim','selesai') NOT NULL,
  `kd_biaya_krm` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`no_psn`, `tgl_psn`, `id_pms`, `status`, `kd_biaya_krm`) VALUES
(5, '2014-12-09', 5, 'sedang diproses', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

CREATE TABLE IF NOT EXISTS `tamu` (
`id_tamu` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `komentar` text NOT NULL,
  `tampil` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tamu`
--

INSERT INTO `tamu` (`id_tamu`, `nama`, `alamat`, `komentar`, `tampil`) VALUES
(4, 'fachri', 'sukabirus', 'jaya terus pjs', 0),
(5, 'syaifrijal', 'pbb', 'terimakasih pjs barang sangat bagus', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
 ADD PRIMARY KEY (`kd_brg`);

--
-- Indexes for table `biaya_kirim`
--
ALTER TABLE `biaya_kirim`
 ADD PRIMARY KEY (`kd_biaya_krm`);

--
-- Indexes for table `dpesan`
--
ALTER TABLE `dpesan`
 ADD PRIMARY KEY (`no_dpsn`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`kd_ktgr`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`idlogin`);

--
-- Indexes for table `pemesan`
--
ALTER TABLE `pemesan`
 ADD PRIMARY KEY (`id_pms`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
 ADD PRIMARY KEY (`id_perus`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
 ADD PRIMARY KEY (`no_psn`);

--
-- Indexes for table `tamu`
--
ALTER TABLE `tamu`
 ADD PRIMARY KEY (`id_tamu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
MODIFY `kd_brg` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `biaya_kirim`
--
ALTER TABLE `biaya_kirim`
MODIFY `kd_biaya_krm` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dpesan`
--
ALTER TABLE `dpesan`
MODIFY `no_dpsn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
MODIFY `kd_ktgr` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
MODIFY `idlogin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pemesan`
--
ALTER TABLE `pemesan`
MODIFY `id_pms` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
MODIFY `id_perus` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
MODIFY `no_psn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tamu`
--
ALTER TABLE `tamu`
MODIFY `id_tamu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`no_psn`) REFERENCES `pemesan` (`id_pms`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
