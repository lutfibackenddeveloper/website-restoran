-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 09, 2024 at 10:19 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webb`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_user` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_user`, `username`, `password`, `role`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(3, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user'),
(4, 'luthfi', '202cb962ac59075b964b07152d234b70', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `id_pesanan_produk` int NOT NULL,
  `id_pemesanan` int NOT NULL,
  `id_produk` varchar(100) NOT NULL,
  `jumlah` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`id_pesanan_produk`, `id_pemesanan`, `id_produk`, `jumlah`) VALUES
(1, 8, '', 2),
(2, 10, '17', 1),
(3, 10, '15', 1),
(4, 10, '16', 1),
(5, 11, '16', 1),
(6, 11, '17', 1),
(7, 11, '19', 1),
(8, 12, '26', 1),
(9, 13, '16', 8),
(10, 13, '17', 2),
(11, 13, '18', 2),
(12, 14, '16', 1),
(13, 15, '16', 1),
(14, 15, '18', 1),
(15, 15, '20', 1),
(16, 16, '17', 1),
(17, 16, '14', 1),
(18, 16, '24', 1),
(19, 16, '26', 1),
(20, 17, '25', 1),
(21, 17, '19', 1),
(22, 17, '15', 1),
(23, 18, '20', 1),
(24, 18, '22', 1),
(25, 18, '16', 1),
(26, 18, '19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int NOT NULL,
  `tanggal_pembayaran` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `metode_pembayaran` varchar(50) NOT NULL,
  `total_pembayaran` int NOT NULL,
  `uang_bayar` int NOT NULL,
  `kembalian` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `tanggal_pembayaran`, `metode_pembayaran`, `total_pembayaran`, `uang_bayar`, `kembalian`) VALUES
(15, '2024-09-06 01:07:31', 'Transfer Bank', 57000, 60000, 3000),
(16, '2024-09-06 01:30:24', 'Transfer Bank', 82000, 90000, 8000),
(17, '2024-09-06 03:05:38', 'Transfer Bank', 43000, 55000, 12000),
(18, '2024-09-08 09:12:53', 'Cash', 57000, 60000, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pemesanan` int NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `total_belanja` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga` int NOT NULL,
  `gambar` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `gambar`) VALUES
(14, 'coto makassar', 15000, 'coto makassar.jpeg'),
(15, 'konro', 25000, 'konro.jpeg'),
(16, 'Sate Ayam', 25000, 'bisnis-makanan-tradisional.jpg'),
(17, 'rendang', 30000, 'rendang.jpeg'),
(18, 'ikan goreng', 20000, 'OIP.jpeg'),
(19, 'mie bakso', 13000, 'mie bakso.jpeg'),
(20, 'jus apel', 12000, 'jus apel.jpeg'),
(21, 'Es kopi Susu', 13000, 'Es-Kopi-dengan-susu.jpg'),
(22, 'Es Teh Manis', 7000, 'es-teh.jpg'),
(23, 'Jus Mangga', 12000, 'jus mangga.jpeg'),
(24, 'jus alpukat', 12000, 'jus alpukat.jpeg'),
(25, 'air mineral', 5000, 'air mineral.png'),
(26, 'ayam bakar', 25000, 'ayamm.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`id_pesanan_produk`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  MODIFY `id_pesanan_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pemesanan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
