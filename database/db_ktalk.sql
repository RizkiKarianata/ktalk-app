-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Okt 2020 pada 15.49
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ktalk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(4) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `fullname`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Moehammad Rizki Karianata', 'natarizky884@gmail.com', 'NIFA11102', '2020-10-19 04:31:46', '2020-10-19 04:31:46'),
(2, 'Farrah Arisqa', 'farraharisqa@gmail.com', 'Rizki123', '2020-10-19 04:38:10', '2020-10-19 04:38:10'),
(3, 'Intan Puja Ningrum', 'intanpuja@gmail.com', 'Rizki123', '2020-10-19 04:46:36', '2020-10-19 04:46:36'),
(4, 'Nina Aryi Nabilah', 'ninaanw@gmail.com', 'Rizki123', '2020-10-19 04:47:29', '2020-10-19 04:47:29'),
(5, 'Ferhan Davala', 'ferhanfd009@gmail.com', 'tanjung123', '2020-10-19 04:48:14', '2020-10-19 04:48:14'),
(6, 'Bima Aditya', 'bimaadit@gmail.com', 'klayatan123', '2020-10-19 04:48:41', '2020-10-19 04:48:41'),
(7, 'Rafli Abitya Asmoro', 'raflikipel11@gmail.com', 'arismunadnar123', '2020-10-19 04:49:18', '2020-10-19 04:49:18'),
(8, 'Amelia Fitranda', 'ameliaf@gmail.com', 'panjen009', '2020-10-19 04:49:59', '2020-10-19 04:49:59'),
(9, 'Priska Larasati', 'priskalarasati@gmail.com', 'tebo111022', '2020-10-19 04:56:57', '2020-10-19 04:56:57'),
(10, 'Rahmat Hidayat', 'rhmathdyat121@gmail.com', '123456', '2020-10-19 05:20:24', '2020-10-19 05:20:24');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
