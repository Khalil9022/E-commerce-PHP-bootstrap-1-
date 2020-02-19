-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Nov 2019 pada 10.12
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_mirota`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(30) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `email_id`, `first_name`, `last_name`, `password`) VALUES
(1, 'admin', 'admin9022@yahoo.com', 'khalil', 'attalla', '123456');

-- --------------------------------------------------------

--
-- Struktur dari tabel `courier`
--

CREATE TABLE `courier` (
  `courier_id` int(11) NOT NULL,
  `courier_nama` varchar(30) NOT NULL,
  `courier_waktu` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `courier`
--

INSERT INTO `courier` (`courier_id`, `courier_nama`, `courier_waktu`) VALUES
(1, 'JNE-REGULER', '7-14 hari'),
(2, 'JNE-EXPRESS', '1-7 hari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `courier_detail`
--

CREATE TABLE `courier_detail` (
  `courier_id` int(11) NOT NULL,
  `kota_id` int(11) NOT NULL,
  `harga_kirim` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `courier_detail`
--

INSERT INTO `courier_detail` (`courier_id`, `kota_id`, `harga_kirim`) VALUES
(1, 1, 10000),
(1, 2, 20000),
(1, 3, 15000),
(2, 1, 15000),
(2, 2, 30000),
(2, 3, 22500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`customer_id`, `admin_id`, `username`, `first_name`, `last_name`, `password`, `email_id`, `address`, `saldo`) VALUES
(1, 1, 'ab', 'ab', 'ab', 'ab@yahoo.com', 'Jogjakarta', '123', 0),
(2, 1, 'a', 'lele', 'Goreng', '123', 'khalilattalla2209@gmail.com', 'Bandung', 38000),
(3, 1, 'abc', 'makan', 'mantap', '123', 'khalilattalla9022@yahoo.com', 'Jogjakarta-Babarsari', 0),
(4, 1, 'khalil', 'khalil', 'attalla', '123', 'khalilattalla9022@yahoo.com', 'jl yadara blok 4', 18000),
(5, 1, 'yahdi', 'yahdi', 'indrawan', '123', 'khalilattalla9022@yahoo.com', 'ad', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'Makanan'),
(2, 'Game'),
(3, 'Minuman'),
(4, 'Alat Rumah Tangga'),
(5, 'Peralatan Dapur'),
(6, 'Alat Tulis Sekolah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `kota_id` int(11) NOT NULL,
  `kota_nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`kota_id`, `kota_nama`) VALUES
(1, 'Magelang'),
(2, 'Solo'),
(3, 'Klaten');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `courier_id` int(11) NOT NULL,
  `order_date` varchar(30) NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `order_address` varchar(30) NOT NULL,
  `order_total_price` int(11) NOT NULL,
  `order_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `courier_id`, `order_date`, `order_quantity`, `order_address`, `order_total_price`, `order_status`) VALUES
(7, 2, 1, '2019-11-04 / 11:08:56', 1, 'Jogjakarta', 2500, 'Dikirim'),
(8, 2, 1, '2019-11-04 / 11:10:30', 1, 'Jogjakarta', 2500, 'Dikirim'),
(9, 2, 1, '2019-11-04 / 11:12:19', 1, 'Jogjakarta', 5000, 'Dikirim'),
(10, 2, 1, '2019-11-04 / 11:19:33', 1, 'Jogjakarta', 2500, 'Dikirim'),
(11, 2, 2, '2019-11-04 / 11:58:34', 1, 'Jogjakarta', 3000, 'Dikirim'),
(12, 2, 1, '2019-11-12 / 17:02:33', 1, 'Bandung', 11500, 'Dikirim'),
(13, 4, 1, '2019-11-13 / 05:04:35', 1, 'jl yadara blok 4', 52000, 'Dikirim'),
(14, 2, 1, '2019-11-19 / 07:25:53', 2, 'Bandung', 66000, 'Dikirim');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `order_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order_details`
--

INSERT INTO `order_details` (`order_id`, `product_id`, `order_quantity`, `order_price`) VALUES
(7, 9, 1, 2500),
(8, 9, 1, 2500),
(9, 9, 2, 2500),
(10, 9, 1, 2500),
(11, 4, 2, 1500),
(12, 4, 1, 1500),
(13, 10, 2, 21000),
(14, 10, 2, 21000),
(14, 25, 1, 14000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengisian_saldo`
--

CREATE TABLE `pengisian_saldo` (
  `customer_id` int(11) NOT NULL,
  `saldo_pengisian` int(11) NOT NULL,
  `waktu_pengisian` date NOT NULL,
  `jam` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengisian_saldo`
--

INSERT INTO `pengisian_saldo` (`customer_id`, `saldo_pengisian`, `waktu_pengisian`, `jam`) VALUES
(2, 5000, '2019-11-03', '18:21:54'),
(2, 10000, '2019-11-04', '10:44:04'),
(2, 50000, '2019-11-04', '10:44:11'),
(2, 100000, '2019-11-04', '10:48:10'),
(4, 20000, '2019-11-13', '04:34:24'),
(4, 50000, '2019-11-13', '05:04:23'),
(2, 50000, '2019-11-19', '07:22:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`product_id`, `kategori_id`, `product_name`, `product_price`, `product_quantity`, `img`) VALUES
(4, 1, 'oreo', 1500, 55, '5dcb765f0dc88.jpg'),
(5, 3, 'Es Apel', 3500, 100, '5dd38b9e98107.jpg'),
(6, 5, 'Kuali', 20000, 30, '5dcad5023f7c9.jpg'),
(7, 2, 'Final Fantasy IV', 210000, 12, '5dcad4dfeaa42.jpg'),
(8, 3, 'Jus Anggur', 5000, 20, '5dcad4f012cdf.jpg'),
(9, 6, 'Pensil 2b', 2500, 10, '5dcad4d736180.jpg'),
(10, 4, 'Sapu lidi', 21000, 96, '5dcad4b57252f.jpeg'),
(12, 6, 'Pencil 3b', 3000, 100, '5dcad4c26cd2d.jpg'),
(13, 6, 'Pencil 5b', 5000, 200, '5dcad4cb4b689.jpg'),
(14, 1, 'Chitato  ', 5000, 150, '5dcb7675bf789.jpg'),
(15, 1, 'cheetoz', 2400, 60, '5dcad5a827762.jpg'),
(16, 1, 'Chiki Ballz', 1500, 210, '5dcad5c6c64ee.jpg'),
(17, 2, 'The legend of zelda', 450000, 45, '5dcad5e271295.jpg'),
(18, 2, 'Borderlands 2 ', 40000, 50, '5dcad60180495.jpg'),
(19, 2, 'Destiny 2 Forsaken', 218000, 78, '5dcad614171c3.jpg'),
(20, 2, 'Just Cause 3 ', 32000, 180, '5dcad629789a7.jpg'),
(21, 1, 'Pookie ', 6000, 100, '5dcad64318143.jpg'),
(22, 3, 'Indomilk Coklat ', 4500, 170, '5dcad65c510c3.jpg'),
(23, 3, 'Ultra Milk All variant', 5000, 100, '5dcad673691f6.jpg'),
(24, 3, 'Coconuts', 8000, 65, '5dcad68b302d6.jpg'),
(25, 4, 'Kain Pel', 14000, 79, '5dcad6af47ca1.jpeg'),
(26, 4, 'Tong Sampah Plastik', 15000, 120, '5dcad6c484fea.jpeg'),
(27, 4, 'Karpet Welcome', 25000, 45, '5dcad6de5c6b5.jpeg'),
(28, 5, 'Panci', 50000, 65, '5dcad7129089c.jpg'),
(29, 5, 'Thermos', 104000, 20, '5dcad732b6f99.jpg'),
(30, 6, 'Pulpen', 2000, 300, '5dcad7497334c.jpg'),
(31, 6, 'Penggaris 30cm', 450, 3000, '5dcad75b95a09.jpg'),
(32, 6, 'Penghapus', 1500, 150, '5dcad76a155c8.jpg'),
(34, 6, 'kotak pensil', 20000, 12, '5dcb8171eedd0.jpg'),
(35, 1, 'chitatoe', 1500, 30, '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `courier`
--
ALTER TABLE `courier`
  ADD PRIMARY KEY (`courier_id`);

--
-- Indeks untuk tabel `courier_detail`
--
ALTER TABLE `courier_detail`
  ADD KEY `courier_id` (`courier_id`),
  ADD KEY `kota_id` (`kota_id`);

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`kota_id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `courier_id` (`courier_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indeks untuk tabel `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `pengisian_saldo`
--
ALTER TABLE `pengisian_saldo`
  ADD KEY `customer_id` (`customer_id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `courier`
--
ALTER TABLE `courier`
  MODIFY `courier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kota`
--
ALTER TABLE `kota`
  MODIFY `kota_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `courier_detail`
--
ALTER TABLE `courier_detail`
  ADD CONSTRAINT `courier_detail_ibfk_1` FOREIGN KEY (`courier_id`) REFERENCES `courier` (`courier_id`),
  ADD CONSTRAINT `courier_detail_ibfk_2` FOREIGN KEY (`kota_id`) REFERENCES `kota` (`kota_id`);

--
-- Ketidakleluasaan untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`courier_id`) REFERENCES `courier` (`courier_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Ketidakleluasaan untuk tabel `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Ketidakleluasaan untuk tabel `pengisian_saldo`
--
ALTER TABLE `pengisian_saldo`
  ADD CONSTRAINT `pengisian_saldo_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
