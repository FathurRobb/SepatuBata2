-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2021 at 03:22 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sepatu_bata`
--

-- --------------------------------------------------------

--
-- Table structure for table `arsip_karyawan`
--

CREATE TABLE `arsip_karyawan` (
  `kar_nama` varchar(50) NOT NULL,
  `kar_alamat` text NOT NULL,
  `kar_foto` blob NOT NULL,
  `kar_no_hp` char(15) NOT NULL,
  `kar_tgl_masuk` date NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `kar_tgl_keluar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `barang_kode` varchar(15) NOT NULL,
  `barang_nama` varchar(100) NOT NULL,
  `barang_warna` varchar(20) NOT NULL,
  `barang_ukuran` int(11) NOT NULL,
  `barang_jenis` enum('Men','Women','Kids','Sneakers') NOT NULL,
  `barang_stok` int(11) NOT NULL,
  `barang_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`barang_kode`, `barang_nama`, `barang_warna`, `barang_ukuran`, `barang_jenis`, `barang_stok`, `barang_harga`) VALUES
('BR000001', 'BATA COMFIT Sandal Wanita CARRINGTON', 'Red', 36, 'Women', 19, 249900),
('BR000002', 'BATA COMFIT Sandal Wanita CARRINGTON', 'Red', 37, 'Women', 15, 249900),
('BR000003', 'BATA COMFIT Sandal Wanita CARRINGTON', 'Red', 38, 'Women', 23, 249900),
('BR000004', 'BATA COMFIT Sandal Wanita CARRINGTON', 'Red', 39, 'Women', 22, 249900),
('BR000005', 'BATA COMFIT Sandal Wanita CARRINGTON', 'Red', 40, 'Women', 27, 249900),
('BR000006', 'BATA COMFIT Sandal Wanita CARRINGTON', 'Red', 41, 'Women', 1, 249900),
('BR000007', 'SANDAK BY BATA Sepatu Pria DRIVER', 'Black', 41, 'Men', 69, 129900),
('BR000008', 'SANDAK BY BATA Sepatu Pria DRIVER', 'Black', 40, 'Men', 45, 129900),
('BR000009', 'DISNEY Sneakers Anak FROZEN LED LIGHT', 'Purple', 25, 'Kids', 13, 349900),
('BR000010', 'DISNEY Sneakers Anak FROZEN LED LIGHT', 'Purple', 26, 'Kids', 20, 349900),
('BR000011', 'DISNEY Sneakers Anak FROZEN LED LIGHT', 'Purple', 27, 'Kids', 19, 349900),
('BR000012', 'DISNEY Sneakers Anak FROZEN LED LIGHT', 'Purple', 28, 'Kids', 11, 349900),
('BR000013', 'BATA Sepatu Wanita PEPITA', '', 38, 'Women', 48, 149900),
('BR000014', 'BATA Sepatu Wanita BELLA', 'White', 38, 'Sneakers', 21, 249900),
('BR000015', 'BATA Sepatu Wanita BELLA', 'White', 39, 'Sneakers', 25, 249900),
('BR000016', 'NORTH STAR Sepatu Pria SANDERS-SK', 'Blue', 41, 'Men', 13, 100000),
('BR000018', 'NORTH STAR Sepatu Pria SANDERS-SK', 'Blue', 43, 'Men', 12, 100000),
('BR000019', 'NORTH STAR Sepatu Pria SANDERS-SK', 'Blue', 44, 'Men', 14, 100000),
('BR000022', 'BATA sepatu wanita BIAN', 'Brown', 39, 'Women', 22, 250000),
('BR000023', 'POWER Sepatu Wanita MELLO SYMERE', 'PINK', 39, 'Sneakers', 19, 200000),
('BR000024', 'NORTH STAR Sneakers Pria XBT-O', 'BLUE', 41, 'Sneakers', 12, 150000),
('BR000025', 'BUBBLE GUMMERS Sepatu Anak BUBBLEFOAM', 'PURPLE', 30, 'Kids', 20, 249900),
('BR000026', 'BUBBLE GUMMERS Sepatu Anak BUBBLEFOAM', 'PURPLE', 31, 'Kids', 12, 249900),
('BR000027', 'BUBBLE GUMMERS Sepatu Anak BUBBLEFOAM', 'PURPLE', 32, 'Kids', 8, 249900),
('BR000028', 'BUBBLE GUMMERS Sepatu Anak BUBBLEFOAM', 'PURPLE', 33, 'Kids', 23, 249900),
('BR000029', 'BUBBLE GUMMERS Sepatu Anak BUBBLEFOAM', 'PURPLE', 35, 'Kids', 19, 249900),
('BR000030', 'BUBBLE GUMMERS Sepatu Anak BUBBLEFOAM', 'PURPLE', 36, 'Kids', 7, 249900),
('BR000031', 'BATA Sandal Remaja ENERGIZER JR', 'BEIGE', 34, 'Kids', 24, 149900),
('BR000032', 'BATA Sandal Remaja ENERGIZER JR', 'BEIGE', 35, 'Kids', 17, 149900),
('BR000033', 'BATA Sandal Remaja ENERGIZER JR', 'BEIGE', 36, 'Kids', 26, 149900),
('BR000034', 'BATA RED LABEL Sepatu Pria JUDE', 'TAUPE', 43, 'Men', 30, 200000),
('BR000035', 'BATA RED LABEL Sepatu Pria JUDE', 'TAUPE', 44, 'Men', 33, 200000),
('BR000036', 'BATA RED LABEL Heels ESTELLE', 'LIGHT NOUGAT', 36, 'Women', 13, 150000),
('BR000037', 'BATA RED LABEL Heels ESTELLE', 'LIGHT NOUGAT', 37, 'Women', 37, 150000),
('BR000038', 'BATA RED LABEL Heels ESTELLE', 'LIGHT NOUGAT', 39, 'Women', 27, 150000),
('BR000039', 'BATA RED LABEL Sneakers OLIVIER', 'BLUE', 42, 'Sneakers', 19, 150000),
('BR000040', 'BATA RED LABEL Sneakers OLIVIER', 'BLUE', 43, 'Sneakers', 26, 150000),
('BR000041', 'BATA RED LABEL Sneakers OLIVIER', 'BLUE', 44, 'Sneakers', 19, 150000),
('BR000042', 'MARIE CLAIRE Sepatu Wanita REESE', 'NAVY', 36, 'Women', 24, 399900),
('BR000043', 'MARIE CLAIRE Sepatu Wanita REESE', 'NAVY', 37, 'Women', 20, 399900),
('BR000044', 'MARIE CLAIRE Sepatu Wanita REESE', 'NAVY', 38, 'Women', 17, 399900),
('BR000045', 'MARIE CLAIRE Sepatu Wanita REESE', 'NAVY', 39, 'Women', 26, 399900);

-- --------------------------------------------------------

--
-- Table structure for table `detail_jual`
--

CREATE TABLE `detail_jual` (
  `d_jual_id` int(11) NOT NULL,
  `d_jual_nofak` varchar(15) NOT NULL,
  `barang_kode` varchar(15) NOT NULL,
  `d_jual_qty` int(11) NOT NULL,
  `d_jual_diskon` double NOT NULL,
  `d_jual_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_jual`
--

INSERT INTO `detail_jual` (`d_jual_id`, `d_jual_nofak`, `barang_kode`, `d_jual_qty`, `d_jual_diskon`, `d_jual_total`) VALUES
(1, '100221000001', 'BR000001', 1, 0, 249900),
(2, '100221000001', 'BR000006', 2, 25000, 449800),
(3, '100221000002', 'BR000024', 1, 0, 150000),
(4, '100221000002', 'BR000011', 2, 0, 699800),
(5, '100221000009', 'BR000005', 1, 0, 249900),
(6, '100221000009', 'BR000022', 1, 0, 250000),
(7, '100221000011', 'BR000024', 1, 0, 150000),
(8, '110221000012', 'BR000008', 1, 0, 129900),
(9, '110221000014', 'BR000004', 2, 100000, 299800),
(10, '110221000014', 'BR000014', 1, 0, 249900),
(11, '110221000015', 'BR000018', 1, 0, 100000),
(12, '110221000016', 'BR000015', 1, 0, 249900),
(13, '110221000018', 'BR000015', 1, 0, 249900),
(14, '110221000019', 'BR000024', 1, 0, 150000),
(15, '110221000021', 'BR000004', 1, 0, 249900),
(16, '110221000024', 'BR000005', 1, 0, 249900),
(17, '120221000001', 'BR000016', 1, 0, 100000),
(18, '130221000001', 'BR000022', 1, 0, 250000),
(19, '130221000002', 'BR000018', 2, 50000, 100000),
(20, '130221000004', 'BR000022', 1, 0, 250000),
(21, '140221000001', 'BR000037', 1, 0, 150000),
(22, '140221000001', 'BR000027', 2, 10000, 479800),
(23, '140221000002', 'BR000016', 8, 0, 800000),
(24, '140221000002', 'BR000008', 6, 0, 779400),
(25, '140221000002', 'BR000039', 2, 75000, 150000),
(26, '140221000003', 'BR000005', 2, 125000, 249800),
(27, '140221000004', 'BR000039', 1, 0, 150000),
(28, '150221000001', 'BR000026', 2, 100000, 299800),
(29, '150221000001', 'BR000040', 1, 0, 150000),
(30, '150221000002', 'BR000006', 5, 0, 1249500);

--
-- Triggers `detail_jual`
--
DELIMITER $$
CREATE TRIGGER `kurang_stok` AFTER INSERT ON `detail_jual` FOR EACH ROW BEGIN
	UPDATE barang SET barang_stok = barang_stok-NEW.d_jual_qty
    WHERE barang_kode = NEW.barang_kode;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_hak_akses` int(11) NOT NULL,
  `nama_hak_akses` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id_hak_akses`, `nama_hak_akses`) VALUES
(1, 'Manajer'),
(2, 'Gudang'),
(3, 'Kasir');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `jabatan_id` int(11) NOT NULL,
  `jabatan_nama` varchar(20) NOT NULL,
  `jabatan_gaji` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`jabatan_id`, `jabatan_nama`, `jabatan_gaji`) VALUES
(1, 'Manajer', '6500000'),
(2, 'Admin Gudang', '3500000'),
(3, 'Kasir', '2400000'),
(4, 'Cleaning Service', '1700000');

-- --------------------------------------------------------

--
-- Table structure for table `jual`
--

CREATE TABLE `jual` (
  `jual_nofak` varchar(15) NOT NULL,
  `jual_tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jual_total` double NOT NULL,
  `jual_jml_uang` double NOT NULL,
  `jual_kembalian` double NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jual`
--

INSERT INTO `jual` (`jual_nofak`, `jual_tanggal`, `jual_total`, `jual_jml_uang`, `jual_kembalian`, `username`) VALUES
('100221000001', '2021-02-10 17:12:45', 699700, 700000, 300, 'Kasir1'),
('100221000002', '2021-02-10 17:26:29', 849800, 850000, 200, 'Kasir1'),
('100221000003', '2021-02-10 17:27:34', 849800, 850000, 200, 'Kasir1'),
('100221000004', '2021-02-10 17:28:34', 849800, 850000, 200, 'Kasir1'),
('100221000005', '2021-02-10 17:29:21', 849800, 850000, 200, 'Kasir1'),
('100221000006', '2021-02-10 17:30:20', 849800, 850000, 200, 'Kasir1'),
('100221000007', '2021-02-10 17:33:11', 849800, 850000, 200, 'Kasir1'),
('100221000008', '2021-02-10 17:34:48', 849800, 850000, 200, 'Kasir1'),
('100221000009', '2021-02-10 17:38:44', 499900, 500000, 100, 'Kasir1'),
('100221000010', '2021-02-10 17:39:15', 499900, 500000, 100, 'Kasir1'),
('100221000011', '2021-02-10 17:41:55', 150000, 150000, 0, 'Kasir1'),
('110221000012', '2021-02-11 07:37:35', 129900, 130000, 100, 'Kasir1'),
('110221000013', '2021-02-11 07:39:00', 129900, 130000, 100, 'Kasir1'),
('110221000014', '2021-02-11 07:40:28', 549700, 550000, 300, 'Kasir1'),
('110221000015', '2021-02-11 09:39:43', 100000, 100000, 0, 'Kasir1'),
('110221000016', '2021-02-11 09:40:57', 249900, 250000, 100, 'Kasir1'),
('110221000017', '2021-02-11 09:41:27', 249900, 250000, 100, 'Kasir1'),
('110221000018', '2021-02-11 09:49:14', 249900, 250000, 100, 'Kasir1'),
('110221000019', '2021-02-11 09:51:59', 150000, 150000, 0, 'Kasir1'),
('110221000020', '2021-02-11 09:53:41', 150000, 150000, 0, 'Kasir1'),
('110221000021', '2021-02-11 09:58:03', 249900, 250000, 100, 'Kasir1'),
('110221000022', '2021-02-11 09:58:31', 249900, 250000, 100, 'Kasir1'),
('110221000023', '2021-02-11 09:58:46', 249900, 250000, 100, 'Kasir1'),
('110221000024', '2021-02-11 10:03:42', 249900, 250000, 100, 'Kasir1'),
('120221000001', '2021-02-12 09:23:43', 100000, 100000, 0, 'Kasir1'),
('130221000001', '2021-02-13 13:26:17', 250000, 250000, 0, 'Kasir1'),
('130221000002', '2021-02-13 15:44:26', 100000, 100000, 0, 'Kasir1'),
('130221000003', '2021-02-13 15:45:10', 100000, 100000, 0, 'Kasir1'),
('130221000004', '2021-02-13 15:46:26', 250000, 250000, 0, 'Kasir1'),
('140221000001', '2021-02-14 10:44:38', 629800, 640000, 10200, 'Kasir1'),
('140221000002', '2021-02-14 13:38:56', 1729400, 1800000, 70600, 'Kasir1'),
('140221000003', '2021-02-14 13:39:51', 249800, 250000, 200, 'Kasir1'),
('140221000004', '2021-02-14 14:34:28', 150000, 150000, 0, 'Kasir1'),
('150221000001', '2021-02-15 10:10:18', 449800, 450000, 200, 'Gudang02'),
('150221000002', '2021-02-15 10:23:23', 1249500, 1300000, 50500, 'Kasir1');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `kar_nik` varchar(20) NOT NULL,
  `kar_nama` varchar(50) NOT NULL,
  `kar_tgl_lahir` date NOT NULL,
  `kar_jenkel` enum('Laki-Laki','Perempuan') NOT NULL,
  `kar_alamat` text NOT NULL,
  `kar_agama` enum('Islam','Kristen Protestan','Katolik','Hindu','Buddha','Kong Hu Cu') NOT NULL,
  `kar_status_kawin` enum('Kawin','Belum Kawin') NOT NULL,
  `kar_foto` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `kar_no_hp` char(15) NOT NULL,
  `kar_norek` char(20) NOT NULL,
  `kar_tgl_masuk` date NOT NULL,
  `jabatan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`kar_nik`, `kar_nama`, `kar_tgl_lahir`, `kar_jenkel`, `kar_alamat`, `kar_agama`, `kar_status_kawin`, `kar_foto`, `kar_no_hp`, `kar_norek`, `kar_tgl_masuk`, `jabatan_id`) VALUES
('3273052603000004', 'Ilham Fathur Robbani', '2000-03-25', 'Laki-Laki', 'Jl. Soekarno-Hatta No.378, Kb. Lega, Kec. Bojongloa Kidul, Kota Bandung, Jawa Barat 40235', 'Islam', 'Belum Kawin', '4x6jas.jpg', '087829473109', '09798279668742', '2021-01-04', 1),
('3292457246811479', 'Benjamin', '2001-02-08', 'Laki-Laki', 'Jl. Garuda No. 457 Kota Bandung', 'Kristen Protestan', 'Belum Kawin', 'FOTO_DUL3x4.jpg', '086284924628', '3247527488161', '2021-02-15', 3),
('3329091003780012', 'Rahmat Hidayat', '1987-03-10', 'Laki-Laki', 'Jalan Ahmad Yani no 212 Kelurahan Merdeka Kecamatan Sumur Bandung Kota Bandung ', 'Islam', 'Kawin', 'fotoG.jpeg', '085846789119', '0987653456745', '2020-10-19', 2),
('3574251409000012', 'Indah Tentram Sejahtera', '1999-09-14', 'Perempuan', 'Jl. Kebonkopi No. 267 Kota Cimahi', 'Buddha', 'Belum Kawin', 'fotoOrang1.jpg', '089843725009', '342346575674564357', '2020-12-07', 3);

--
-- Triggers `karyawan`
--
DELIMITER $$
CREATE TRIGGER `sebelum_hapus_karyawan` BEFORE DELETE ON `karyawan` FOR EACH ROW BEGIN
    INSERT INTO arsip_karyawan(kar_nama,kar_alamat,kar_foto,kar_no_hp,kar_tgl_masuk,jabatan_id)
    VALUES(OLD.kar_nama,OLD.kar_alamat,OLD.kar_foto,OLD.kar_no_hp,OLD.kar_tgl_masuk,OLD.jabatan_id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_hak_akses` int(11) NOT NULL,
  `kar_nik` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `id_hak_akses`, `kar_nik`) VALUES
('Gudang02', '276af16909ba113902350e1470c19fab', 3, '3292457246811479'),--Gudang02
('GudangGaram', '7d6b40e4fee90f55182085226370df5b', 2, '3329091003780012'),--GudangGaram
('Kasir1', '93f2521b5b730c5f76f86f40fb1887cb', 3, '3574251409000012'),--Kasir1
('ManajerTampan', 'e10adc3949ba59abbe56e057f20f883e', 1, '3273052603000004');--123456

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_kode`);

--
-- Indexes for table `detail_jual`
--
ALTER TABLE `detail_jual`
  ADD PRIMARY KEY (`d_jual_id`),
  ADD KEY `barang_kode` (`barang_kode`),
  ADD KEY `jual_nofak` (`d_jual_nofak`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_hak_akses`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`jabatan_id`);

--
-- Indexes for table `jual`
--
ALTER TABLE `jual`
  ADD PRIMARY KEY (`jual_nofak`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`kar_nik`),
  ADD KEY `jabatan_id` (`jabatan_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `kar_nik` (`kar_nik`),
  ADD KEY `id_hak_akses` (`id_hak_akses`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_jual`
--
ALTER TABLE `detail_jual`
  MODIFY `d_jual_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id_hak_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `jabatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_jual`
--
ALTER TABLE `detail_jual`
  ADD CONSTRAINT `detail_jual_ibfk_1` FOREIGN KEY (`barang_kode`) REFERENCES `barang` (`barang_kode`),
  ADD CONSTRAINT `detail_jual_ibfk_2` FOREIGN KEY (`d_jual_nofak`) REFERENCES `jual` (`jual_nofak`);

--
-- Constraints for table `jual`
--
ALTER TABLE `jual`
  ADD CONSTRAINT `jual_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_2` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`jabatan_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`kar_nik`) REFERENCES `karyawan` (`kar_nik`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_hak_akses`) REFERENCES `hak_akses` (`id_hak_akses`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
