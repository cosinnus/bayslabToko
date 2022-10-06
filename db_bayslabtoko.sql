-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 04, 2022 at 12:41 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bayslabtoko`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis_berita` varchar(20) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `slug_berita` varchar(255) NOT NULL,
  `keywords` text,
  `status_berita` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `judul_gambar` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `header_transaksi`
--

CREATE TABLE `header_transaksi` (
  `id_header_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL,
  `status_bayar` varchar(20) NOT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `rekening_pelanggan` varchar(255) DEFAULT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `slug_kategori`, `nama_kategori`, `urutan`, `tanggal_update`) VALUES
(1, 'foods', 'Foods', 1, '2022-09-03 03:35:39'),
(2, 'laptops', 'Laptops', 2, '2022-09-03 03:36:08'),
(3, 'voucher', 'Voucher', 3, '2022-08-03 02:30:17'),
(4, 'clotes', 'Clotes', 4, '2022-09-03 03:36:34'),
(5, 'gadget', 'Gadget', 5, '2022-09-06 00:50:27');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `namaweb` varchar(255) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `keywords` text,
  `metatext` text,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `namaweb`, `tagline`, `email`, `website`, `keywords`, `metatext`, `telepon`, `alamat`, `facebook`, `instagram`, `deskripsi`, `logo`, `icon`, `rekening_pembayaran`, `tanggal_update`) VALUES
(1, 'Bayslab Toko', 'Silakan habiskan uang anda', 'mailto.bayslab@cosinnus.com', 'blog.cosinnus.com', 'Joss', 'Joss', '089001002003', 'Rembang', 'cosinnus', 'bayslab', 'Toko berduit', 'logo_blog.png', 'maspay-logo1.png', 'BCA', '2022-09-08 08:13:38');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `tanggal_daftar` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `slug_produk` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `keywords` text,
  `harga` int(11) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `berat` float DEFAULT NULL,
  `ukuran` varchar(255) DEFAULT NULL,
  `status_produk` varchar(20) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_user`, `id_kategori`, `kode_produk`, `nama_produk`, `slug_produk`, `keterangan`, `keywords`, `harga`, `stok`, `gambar`, `berat`, `ukuran`, `status_produk`, `tanggal_post`, `tanggal_update`) VALUES
(1, 1, 2, 'Lap-001', 'Macbook Pro M2 1TB, 32 RAM', 'macbook-pro-m2-1tb-32-ram-lap-001', '<p>Mbp dgn 32 Neural Engine, 32 GPU, 32 VRAM, 1TB SSD NVMe</p>\r\n', 'Laptop', 54000000, 10, 'elektro11.jpg', 2000, '15x30', 'Publish', '2022-08-10 13:15:33', '2022-09-03 03:49:12'),
(2, 1, 5, 'Smart-001', 'Iphone 13 Promax Bundle Ipad Pro 128Gb', 'iphone-13-promax-bundle-ipad-pro-128gb-smart-001', '<p>Produk bundle yg dinantikan keluarga</p>\r\n', 'Iphone\r\nIpad', 70000000, 100, 'elektro2.jpg', 5000, '100x100', 'Publish', '2022-09-03 03:51:53', '2022-09-06 00:52:28'),
(3, 1, 5, 'SamF-001', 'Samsung Galaxy Fold 1Tb', 'samsung-galaxy-fold-1tb-samf-001', '<p>HP dgn spesifikasi gahar dan bisa dilipat</p>\r\n', 'samsung\r\nfold', 23000000, 100, 'elektro3.jpg', 500, '12x16', 'Publish', '2022-09-06 00:52:12', '2022-09-06 00:52:12'),
(4, 1, 5, 'SamF-002', 'Samsung Galaxy Flip 1Tb', 'samsung-galaxy-flip-1tb-samf-002', '<p>HP canggih bisa dilipat</p>\r\n', 'flip\r\nsamsung', 20000000, 100, 'elektro4.jpg', 500, '12x16', 'Publish', '2022-09-06 00:53:49', '2022-09-06 00:53:49'),
(5, 1, 1, 'Ay_K-001', 'Nasi Ayam Kampleng', 'nasi-ayam-kampleng-ay_k-001', '<p>Nasi ayam rasa kampleng pedas</p>\r\n', 'ayam kampleng', 12000, 10, 'makanan1.jpg', 2000, '100x100', 'Publish', '2022-09-06 00:56:05', '2022-09-06 00:56:05'),
(6, 1, 1, 'M_K-001', 'Mie Kerosine Ala Mesir', 'mie-kerosine-ala-mesir-m_k-001', '<p>Mie enak</p>\r\n', 'mie', 10000, 10, 'makanan2.jpg', 1000, '100x100', 'Publish', '2022-09-06 00:57:43', '2022-09-06 00:57:43');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `tanggal_update`) VALUES
(1, 'Bayu Ajid', 'admin@gmail.com', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', '2022-07-28 21:01:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  ADD PRIMARY KEY (`id_header_transaksi`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  MODIFY `id_header_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
