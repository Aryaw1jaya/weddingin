-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jun 2021 pada 18.46
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weddingin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` text NOT NULL,
  `wedding_date` date DEFAULT NULL,
  `status` enum('waiting','paid','noted','cancel') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `date`, `invoice`, `total`, `name`, `address`, `phone`, `wedding_date`, `status`) VALUES
(18, 11, '2021-06-09', '1120210609180749', 35000000, 'Richard', 'Jl. Sawah Baru, Bintaro, Tangerang, Banten.', '08123123123', '2021-06-16', 'noted');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders_confirm`
--

CREATE TABLE `orders_confirm` (
  `id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `nominal` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orders_confirm`
--

INSERT INTO `orders_confirm` (`id`, `orders_id`, `account_name`, `account_number`, `nominal`, `note`, `image`) VALUES
(8, 18, 'Richard', '12341234', 35000000, 'Sudah lunas, Siap Nikah Minggu Depan', '610e45ee96475e344c0e9e21f32734eb.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orders_detail`
--

INSERT INTO `orders_detail` (`id`, `orders_id`, `product_id`, `subtotal`) VALUES
(22, 18, 23, 35000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `edition` enum('reguler','premium') NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `fasilitas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `edition`, `image`, `description`, `fasilitas`) VALUES
(16, 'Pernikahan Hall room - Hotel Bintang 5', 45000000, 'premium', '127e0baa9fbb3d241aef65fa5cbc21ea.jpg', '																												Rayakan pernikahan anda di hotel bintang 5. </br>\r\nFasilitas Paling mewah untuk acara pernikahan anda.																								', '-Aula Hotel Bintang 5 </br>\r\n-Catering Mewah </br>\r\n-50 meja bundar untuk 8 orang </br>\r\n-Semua Fasilitas Hotel Bintang 5																								'),
(19, 'Pernikahan Ruangan Kaca - Private Hall Room', 15800000, 'reguler', '2e9d5a092640aadb317eba86e297442f.jpg', '														Rayakan pernikahan anda di ruangan kaca yang elegan <br>\r\nDengan suasana dan atmospir yang misterius.												', '														- Ruangan Kaca dengan dekorasi Wedding </br>\r\n- 100 Kursi Tamu <br>\r\n- Catering Mewah												'),
(21, 'Pernikahan Pinggir Pantai - Karma Beach Bali', 49000000, 'premium', '9282caa40a95614875b64da19e1a9d72.jpg', '							Rayakan Pernikahan anda dipinggir pantai yang indah. <br>\r\nDi area pantai yang bersih dan asri. <br>						', '							Fasilitas <br>\r\n- Dekorasi dan tempat wedding pinggir pantai <br>\r\n- Area Pantai Khusus Wedding <br>\r\n- Catering Seafood yang mewah. <br>						'),
(23, 'Pernikahan Hall Room - Hotel Bintang 4', 35000000, 'premium', '2d936b5a575e73ba3f4d811ab02f1a8d.png', '														Rayakan penikahan anda di balai room Hotel bintang 4. <br>\r\nDekorasi Mewah dan Hall room yang megah. <br>\r\nLokasi : V Hotel Tebet - Jl. Prof. DR. Soepomo No.100, RT.1/RW.6, Tebet Bar, Tebet, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12810. <br>\r\n												', '														- Ruangan Hall room yang mewah <br>\r\n- 50 pasang Kursi <br>\r\n- Catering Makanan yang mewah dan di refill setiap habis. <br>												');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$I52FUe8oEeyXPw8y6olwD.m12vecYpd0FiS66r2iN08cOiRmHE.I6', '1'),
(8, 'user', 'user@gmail.com', '$2y$10$8gsIXv697CZ4STu8D/5Ho.jAFC/V7EY/zm03ODiyALvR5nmD5.8Na', '2'),
(11, 'Richard', 'richard@gmail.com', '$2y$10$Ffo9A00Nv8iXO.K.cByfRub5XZvgXvAX9Bx2agwKUJKwrTBGQAU1e', '2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders_confirm`
--
ALTER TABLE `orders_confirm`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `orders_confirm`
--
ALTER TABLE `orders_confirm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
