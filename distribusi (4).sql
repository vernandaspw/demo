-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2022 at 06:13 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `distribusi`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` int(11) NOT NULL,
  `kd_barang` varchar(50) NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barang_keluar`, `kd_barang`, `jumlah_keluar`, `tanggal`) VALUES
(9, 'ACE200', 1, '2022-01-21'),
(10, 'ADMIL1', 2, '2022-01-21');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` int(11) NOT NULL,
  `kd_barang` varchar(50) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `kd_barang`, `jumlah_masuk`, `tanggal`) VALUES
(10, 'ACE200', 30, '2022-01-10');

-- --------------------------------------------------------

--
-- Table structure for table `data_barang`
--

CREATE TABLE `data_barang` (
  `kd_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_barang`
--

INSERT INTO `data_barang` (`kd_barang`, `nama_barang`, `jenis`, `satuan`, `stok`, `harga_jual`) VALUES
('ACE200', 'ACEMAIN 100 ML X 8012', 'INSC2', 'BTL2', 29, 180002),
('ADMIL1', 'ADMIL 160 SL 1 LTR X 20', 'HERB', 'Bungkus', 77, 20000),
('AGRO500', 'AGROCOL 500 GR X 20', 'FUNG', 'Bungkus', 0, 53000);

-- --------------------------------------------------------

--
-- Table structure for table `data_driver`
--

CREATE TABLE `data_driver` (
  `id_driver` int(11) NOT NULL,
  `no_pegawai` varchar(250) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  `alamat` text NOT NULL,
  `no_polisi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_driver`
--

INSERT INTO `data_driver` (`id_driver`, `no_pegawai`, `nama`, `no_hp`, `alamat`, `no_polisi`) VALUES
(1, '02118001', 'ronianto', '09392389239', 'km12', 'BG-1123-AKJ'),
(2, '02118002', 'budi', '08367388333', 'demang', 'BG-3009-RA');

-- --------------------------------------------------------

--
-- Table structure for table `data_kustomer`
--

CREATE TABLE `data_kustomer` (
  `id_kustomer` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `saldo` int(11) NOT NULL,
  `no_rekening` varchar(50) NOT NULL,
  `bank_rekening` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_kustomer`
--

INSERT INTO `data_kustomer` (`id_kustomer`, `nama_lengkap`, `no_hp`, `alamat`, `email`, `username`, `password`, `saldo`, `no_rekening`, `bank_rekening`) VALUES
(1, 'Rini oktaviani', '087873735730', 'palembang', 'indahseptiani925@gmail.com', 'rini', '25d55ad283aa400af464c76d713c07ad', 500000, '1120034567', 'Bank Mayapada'),
(2, 'lili ', '081367140843', 'bukit', 'lili@gmail.com', 'lilinur', '25d55ad283aa400af464c76d713c07ad', 299998, '12293873878', 'Bank  Mandiri');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `kd_barang` varchar(50) NOT NULL,
  `pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_transaksi`, `kd_barang`, `pembelian`) VALUES
(6, 4, 'ACE200', 1),
(7, 5, 'ACE200', 1),
(8, 5, 'ADMIL1', 1),
(9, 6, 'ACE200', 1),
(10, 6, 'ADMIL1', 8),
(11, 7, 'ADMIL1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `no_faktur` varchar(250) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `status_pembayaran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `no_faktur`, `id_transaksi`, `total_bayar`, `tanggal_bayar`, `status_pembayaran`) VALUES
(7, 'NO-001-FKT', 5, 200002, '2022-01-21', 'Transfer');

-- --------------------------------------------------------

--
-- Table structure for table `surat_jalan`
--

CREATE TABLE `surat_jalan` (
  `id_surat_jalan` int(11) NOT NULL,
  `id_driver` int(11) NOT NULL,
  `no_faktur` varchar(250) NOT NULL,
  `tanggal_jalan` date NOT NULL,
  `tujuan` text NOT NULL,
  `status_jalan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_jalan`
--

INSERT INTO `surat_jalan` (`id_surat_jalan`, `id_driver`, `no_faktur`, `tanggal_jalan`, `tujuan`, `status_jalan`) VALUES
(6, 1, 'NO-001-FKT', '2022-01-22', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `topup_saldo`
--

CREATE TABLE `topup_saldo` (
  `id_topup` int(11) NOT NULL,
  `id_kustomer` int(11) NOT NULL,
  `jumlah_topup` int(11) NOT NULL,
  `tanggal_topup` date NOT NULL,
  `status_topup` enum('Berhasil','Di Proses','Gagal') NOT NULL,
  `bukti_pembayaran` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_kustomer` int(11) NOT NULL,
  `total_barang` int(11) NOT NULL,
  `total_bayar` varchar(30) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `status_transaksi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_kustomer`, `total_barang`, `total_bayar`, `tgl_transaksi`, `status_transaksi`) VALUES
(4, 2, 1, '180002', '2022-01-20', ''),
(5, 2, 2, '200002', '2022-01-20', 'Sudah Di Kirim'),
(6, 2, 9, '340002', '2022-01-20', ''),
(7, 2, 1, '20000', '2022-01-20', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_pegawai` varchar(250) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `level` enum('Admin','Sales','Gudang','Customer','Kepala Cabang') NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `no_pegawai`, `username`, `email`, `password`, `no_hp`, `alamat`, `level`, `status`) VALUES
(1, 'enioktarina', '021180080', 'enioktarina', 'enioktarina@gmail.com', '25d55ad283aa400af464c76d713c07ad', '088286792770', 'palembang', 'Admin', 'Aktif'),
(2, 'Indah septiani', '021180014', 'indahseptiani', 'indahseptiani925@gmail.com', '25d55ad283aa400af464c76d713c07ad', '087873735733', 'palembang', 'Gudang', 'Aktif'),
(3, 'indah paramitha', '021180041', 'indahp', 'indahparamitha153@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0813671408341', 'palembang', 'Sales', 'Aktif'),
(5, 'silvia indriani', '021180051', 'silvia', 'silvia@gmail.com', '25d55ad283aa400af464c76d713c07ad', '09392389239', 'palembang', 'Kepala Cabang', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`),
  ADD KEY `kd_barang` (`kd_barang`) USING BTREE;

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`),
  ADD KEY `kd_barang` (`kd_barang`);

--
-- Indexes for table `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `data_driver`
--
ALTER TABLE `data_driver`
  ADD PRIMARY KEY (`id_driver`);

--
-- Indexes for table `data_kustomer`
--
ALTER TABLE `data_kustomer`
  ADD PRIMARY KEY (`id_kustomer`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_transaksi` (`id_transaksi`) USING BTREE,
  ADD KEY `no_faktur` (`no_faktur`);

--
-- Indexes for table `surat_jalan`
--
ALTER TABLE `surat_jalan`
  ADD PRIMARY KEY (`id_surat_jalan`),
  ADD KEY `no_faktur` (`no_faktur`) USING BTREE,
  ADD KEY `id_driver` (`id_driver`) USING BTREE;

--
-- Indexes for table `topup_saldo`
--
ALTER TABLE `topup_saldo`
  ADD PRIMARY KEY (`id_topup`),
  ADD KEY `id_kostumer` (`id_kustomer`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_barang_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barang_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `data_driver`
--
ALTER TABLE `data_driver`
  MODIFY `id_driver` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_kustomer`
--
ALTER TABLE `data_kustomer`
  MODIFY `id_kustomer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `surat_jalan`
--
ALTER TABLE `surat_jalan`
  MODIFY `id_surat_jalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `topup_saldo`
--
ALTER TABLE `topup_saldo`
  MODIFY `id_topup` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_ibfk_2` FOREIGN KEY (`kd_barang`) REFERENCES `data_barang` (`kd_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`kd_barang`) REFERENCES `data_barang` (`kd_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_jalan`
--
ALTER TABLE `surat_jalan`
  ADD CONSTRAINT `surat_jalan_ibfk_1` FOREIGN KEY (`id_driver`) REFERENCES `data_driver` (`id_driver`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_jalan_ibfk_2` FOREIGN KEY (`no_faktur`) REFERENCES `pembayaran` (`no_faktur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `topup_saldo`
--
ALTER TABLE `topup_saldo`
  ADD CONSTRAINT `topup_saldo_ibfk_1` FOREIGN KEY (`id_kustomer`) REFERENCES `data_kustomer` (`id_kustomer`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
