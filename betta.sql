-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jun 2020 pada 18.36
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `betta`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ikan`
--

CREATE TABLE `ikan` (
  `id` int(10) NOT NULL,
  `peserta_id` int(10) NOT NULL,
  `kategori_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(4) NOT NULL,
  `nama_kategori` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `lokasi`, `deskripsi`, `cover`, `created_at`, `updated_at`) VALUES
(6, 'halfmon', 'rak 3', 'penilaian ikan halfmon', '66536-2019-07-24-01-48-22.jpg', '2019-07-10 20:20:48', '2019-07-23 18:48:22'),
(7, 'plakat super', 'rak2', 'kjskdjkfcdsjckds', '70235-2019-07-24-01-48-38.jpg', '2019-07-23 17:03:47', '2019-07-23 18:48:38'),
(8, 'plakat', 'kjgk', 'nnnlnllllnl', '13414-2019-08-07-03-22-34.jpg', '2019-08-06 20:22:34', '2019-08-06 20:22:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `ikan_id` int(11) NOT NULL,
  `warna` int(11) NOT NULL,
  `gerak` int(11) NOT NULL,
  `sirip` int(11) NOT NULL,
  `dasi` int(11) NOT NULL,
  `ekor` int(11) NOT NULL,
  `cacat` int(11) NOT NULL,
  `total_nilai` int(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `id` int(10) NOT NULL,
  `nama_peserta` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tlfn` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`id`, `nama_peserta`, `tlfn`, `alamat`, `created_at`, `updated_at`) VALUES
(22, 'Ragil', '08973265652365', 'Kediri', '2019-07-28 23:48:23', '2019-07-28 23:48:23'),
(24, 'Miko', '08956453435456', 'Mrican', '2019-07-29 00:01:18', '2019-07-29 00:01:18'),
(32, 'galih d', '0989798769', 'jl.kha dahlan 90', '2019-08-06 00:25:18', '2019-08-06 00:26:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','panitia','juri') COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `level`, `telp`, `remember_token`, `gambar`, `created_at`, `updated_at`) VALUES
(110, 'Galih Dwi', 'gdwi24@gmail.com', '$2y$10$b/U9ooXgT0Omr5dgqmvPBuIVOMxw/o8w79tiqrpoCM9c.r3dyrpk2', 'admin', '987656789', NULL, '86388-2019-07-24-01-07-01.jpg', NULL, '2019-07-23 18:07:01'),
(111, 'pegi', 'pegi@gmail.com', '$2y$10$EOflJdL6LfcRE1P1CxveQetlWWgfsgGs3pxr/RtLu3LNlUbczvl02', 'panitia', '08955327875238', NULL, '58651-2019-07-24-01-06-23.png', '2019-07-17 21:46:11', '2019-07-23 20:57:10'),
(112, 'fico', 'fico@gmail.com', '$2y$10$IBQj/B9EtYbmdICZe4PieOfmQhN.FzTm3YRDdOYxyi2fA.6./GLQu', 'juri', '09797532764776', NULL, '68996-2019-07-18-06-08-45.jpg', '2019-07-17 23:08:46', '2019-07-23 20:27:23');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ikan`
--
ALTER TABLE `ikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `peserta_id` (`peserta_id`),
  ADD KEY `ikan_ibfk_1` (`kategori_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ikan_id` (`ikan_id`);

--
-- Indeks untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ikan`
--
ALTER TABLE `ikan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2271;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ikan`
--
ALTER TABLE `ikan`
  ADD CONSTRAINT `ikan_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ikan_ibfk_2` FOREIGN KEY (`peserta_id`) REFERENCES `peserta` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`ikan_id`) REFERENCES `ikan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
