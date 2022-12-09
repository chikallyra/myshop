-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Nov 2019 pada 05.01
-- Versi server: 10.3.15-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoonline`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'admin', 'admin', 'Tri Putra Satriawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(10) NOT NULL,
  `nama_kota` varchar(50) NOT NULL,
  `tarif` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Surabaya', 20000),
(3, 'Bandung', 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(50) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telpon_pelanggan` int(25) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_ongkir`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telpon_pelanggan`, `alamat_pelanggan`) VALUES
(4, 3, 'tripsatriawan30@gmail.com', 'putra3030', 'Tri Putra Satriawan', 899879876, ''),
(6, 1, 'putramedia3030@gmail.com', 'putra3030', 'Ibab', 9320323, ''),
(14, 0, 'salah@gmail.com', 'putra3030', 'ILMI', 2147483647, 'CIBESI'),
(15, 0, 'putramedia303@gmail.com', 'putra3030', 'dhafin', 2147483647, 'MANGLAYANG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(50) NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `total_pengembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pengembalian`, `total_pengembalian`) VALUES
(10, 4, 1, '2019-11-20', 250000),
(11, 4, 1, '0000-00-00', 720000),
(12, 4, 1, '0000-00-00', 420000),
(13, 4, 1, '2019-11-14', 1145000),
(14, 0, 1, '0000-00-00', 420000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(15) NOT NULL,
  `berat` int(11) NOT NULL,
  `subharga` int(15) NOT NULL,
  `subberat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subharga`, `subberat`) VALUES
(1, 1, 1, 1, '0', 0, 0, 0, 0),
(2, 1, 2, 1, '0', 0, 0, 0, 0),
(9, 3, 3, 5, '0', 0, 0, 0, 0),
(11, 0, 31, 1, 'vans old skool klasik ', 250000, 100, 250000, 100),
(12, 0, 34, 1, 'Oppo A5s', 1999000, 170, 1999000, 170),
(13, 0, 27, 1, 'COMPAS High white red', 700000, 120, 700000, 120),
(14, 0, 29, 1, 'vans slip on   ', 25000, 120, 25000, 120),
(15, 0, 35, 1, 'Piaggio ZIP 2012', 12000000, 10000, 12000000, 10000),
(16, 0, 28, 1, 'converse 70s high x kaws ', 400000, 120, 400000, 120),
(17, 0, 30, 1, 'converse 70s hig  sunflower ', 250000, 100, 250000, 100),
(18, 0, 27, 1, 'COMPAS High white red', 700000, 120, 700000, 120),
(19, 0, 30, 1, 'converse 70s hig  sunflower ', 250000, 100, 250000, 100),
(20, 0, 27, 1, 'COMPAS High white red', 700000, 120, 700000, 120),
(21, 0, 27, 1, 'COMPAS High white red', 700000, 120, 700000, 120),
(22, 0, 27, 1, 'COMPAS High white red', 700000, 120, 700000, 120),
(23, 0, 27, 1, 'COMPAS High white red', 700000, 120, 700000, 120),
(24, 0, 28, 1, 'converse 70s high x kaws ', 400000, 120, 400000, 120),
(25, 0, 29, 1, 'vans slip on   ', 25000, 120, 25000, 120),
(26, 0, 28, 1, 'converse 70s high x kaws ', 400000, 120, 400000, 120),
(27, 0, 28, 1, 'converse 70s high x kaws ', 400000, 120, 400000, 120),
(28, 0, 27, 1, 'COMPAS High white red', 700000, 120, 700000, 120),
(29, 11, 27, 1, '', 0, 0, 700000, 0),
(30, 12, 28, 1, '', 0, 0, 400000, 0),
(31, 13, 27, 1, '', 0, 0, 25000, 0),
(32, 13, 28, 1, '', 0, 0, 25000, 0),
(33, 13, 29, 1, '', 0, 0, 25000, 0),
(34, 14, 28, 1, '', 0, 0, 400000, 0),
(35, 0, 27, 2, 'COMPAS High white red', 700000, 120, 1400000, 240),
(36, 0, 28, 1, 'converse 70s high x kaws ', 400000, 120, 400000, 120),
(37, 0, 27, 1, 'COMPAS High white red', 700000, 120, 700000, 120),
(38, 0, 28, 1, 'converse 70s high x kaws ', 400000, 120, 400000, 120),
(39, 0, 28, 1, 'converse 70s high x kaws ', 400000, 120, 400000, 120),
(40, 0, 27, 1, 'COMPAS High white red', 700000, 120, 700000, 120),
(41, 0, 27, 1, 'COMPAS High white red', 700000, 120, 700000, 120),
(42, 0, 37, 1, 'Supra GTR 150 Sporty', 23435000, 10000, 23435000, 10000),
(43, 0, 42, 1, 'Piaggio ZIP 2012', 12000000, 10000, 12000000, 10000),
(44, 0, 28, 2, 'converse 70s high x kaws ', 400000, 120, 800000, 240),
(45, 0, 30, 1, 'converse 70s hig  sunflower ', 250000, 100, 250000, 100),
(46, 0, 27, 1, 'COMPAS High white red', 700000, 120, 700000, 120),
(47, 0, 30, 1, 'converse 70s hig  sunflower ', 250000, 100, 250000, 100),
(48, 0, 27, 1, 'COMPAS High white red', 700000, 120, 700000, 120),
(49, 0, 40, 1, 'waffle DT Vans old skool style 36(bmx checkerboard', 250000, 100, 250000, 100),
(50, 0, 27, 1, 'COMPAS High white red', 700000, 120, 700000, 120),
(51, 0, 27, 1, 'COMPAS High white red', 700000, 120, 700000, 120),
(52, 0, 27, 1, 'COMPAS High white red', 700000, 120, 700000, 120),
(53, 0, 27, 2, 'COMPAS High white red', 700000, 120, 1400000, 240),
(54, 0, 28, 1, 'converse 70s high x kaws ', 400000, 120, 400000, 120),
(55, 0, 27, 1, 'COMPAS High white red', 700000, 120, 700000, 120),
(56, 0, 28, 1, 'converse 70s high x kaws ', 400000, 120, 400000, 120),
(57, 0, 27, 1, 'COMPAS High white red', 700000, 120, 700000, 120),
(58, 0, 36, 1, 'iPhone 11 Pro', 14000000, 188, 14000000, 188),
(59, 0, 28, 1, 'converse 70s high x kaws ', 400000, 120, 400000, 120);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`) VALUES
(27, 'COMPAS High white red', 700000, 120, 'localpride.jpg', 'LOCAL PRIDE !! \r\n\r\nRedy stock tipis\r\n\r\nBNIB\r\n\r\nCOMPAS High white red\r\n\r\nSize 39\r\n\r\n\r\n'),
(28, 'converse 70s high x kaws ', 400000, 120, 'converse70shighxkawsblue.jpg', 'readystock \r\n\r\nkualitas premium quality import super bnib.\r\n\r\nmade in vietnam.\r\n\r\nconverse 70s high x kaws \r\n\r\nsize 37-38-39-40\r\n\r\n'),
(29, 'vans slip on   ', 25000, 120, '08197626-10a3-4d9b-9bf6-6f815e4fff92.jpg', 'Ready stock\r\n\r\nKualitas premium qualty import super\r\n\r\nBnib\r\n\r\nvans slip on \r\n \r\nsize 37-43 \r\n\r\n'),
(30, 'converse 70s hig  sunflower ', 250000, 100, 'IMG-20191105-WA0016.jpg', 'size 37-43\r\n\r\npremium quality import Vietnam\r\n'),
(31, 'vans old skool klasik ', 250000, 100, 'IMG-20191105-WA0007.jpg', 'size 39-43 \r\n\r\npremium qualty '),
(32, 'converse 70s retro white', 260000, 150, 'IMG-20191105-WA0015.jpg', 'premium qualty '),
(33, 'Adidas Handball spezial St Patrick', 1300000, 100, 'IMG-20191105-WA0013.jpg', 'Beli woi '),
(36, 'iPhone 11 Pro', 14000000, 188, 'IMG-20191105-WA0009.jpg', '\r\nLayar Super Retina XDR\r\n\r\n\r\nLayar OLEDÂ Multi-Touchsepenuhnya 5,8Â inci (diagonal)\r\n\r\n\r\nLayar HDR\r\n\r\n\r\nResolusi 2436 x 1125 piksel pada 458 pp\r\ni\r\n\r\nChip A13 Bionic\r\n\r\n\r\nNeural Engine generasi ketiga\r\n'),
(37, 'Supra GTR 150 Sporty', 23435000, 10000, 'IMG-20191105-WA0010.jpg', '\r\nTipe Mesin: 4-Langkah, DOHC, 4 Katup\r\n\r\nKapasitas Mesin: 149,16 cc\r\nSistem Suplai Bahan Bakar: PGM-Fi\r\n\r\nPanjang X Lebar X Tinggi: 2.025 x 705 x 1.105 mm\r\n\r\nTinggi Tempat Duduk: 780 mm\r\n\r\nJarak Sumbu Roda: 1.284 mm\r\n\r\nJarak Terendah Ke Tanah: 150 mm\r\n\r\nCurb Weight119 kg: \r\n\r\nRadius Putar1.900 mm\r\n'),
(38, 'converse 70s batman DC comic', 245000, 100, 'IMG-20191105-WA0008.jpg', 'kualiatas premium bnib '),
(39, 'waffle DT vans old skool gum bw ', 175000, 100, 'IMG-20191105-WA0014.jpg', 'size 39-43\r\n\r\nkualiatas premium bnib '),
(40, 'waffle DT Vans old skool style 36(bmx checkerboard)', 250000, 100, 'IMG-20191105-WA0006.jpg', 'size 40-44'),
(41, 'auntenthick half moon maroon ', 250000, 100, 'IMG-20191105-WA0004.jpg', 'kualiatas premium bnib '),
(42, 'Piaggio ZIP 2012', 12000000, 10000, 'IMG-20191105-WA0011.jpg', '\r\nMesin sehat, ss kumplit, full repaint');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
