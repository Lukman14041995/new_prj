-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Sep 2023 pada 09.38
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_prj`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2023_08_28_025239_add_column_name_to_table_name', 2),
(5, '2023_08_28_025319_add_paid_to_users_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `negara` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama_pelanggan`, `negara`) VALUES
(1, 'John Doe', 'USA'),
(2, 'Jane Smith', 'UK'),
(3, 'Bob Johnson', 'USA'),
(4, 'Robert Martinez', 'FRANCE'),
(5, 'George Russel', 'UK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `tanggal`, `pelanggan_id`, `produk_id`, `jumlah`) VALUES
(1, '2023-09-01', 1, 1, 3),
(2, '2023-09-01', 3, 2, 4),
(3, '2023-09-01', 4, 1, 3),
(4, '2023-09-01', 3, 5, 2),
(5, '2023-09-01', 3, 3, 4),
(6, '2023-09-02', 1, 1, 1),
(7, '2023-09-02', 1, 1, 3),
(8, '2023-09-02', 1, 2, 5),
(9, '2023-09-02', 4, 4, 5),
(10, '2023-09-02', 5, 4, 2),
(11, '2023-09-03', 2, 1, 3),
(12, '2023-09-03', 1, 5, 4),
(13, '2023-09-03', 4, 4, 4),
(14, '2023-09-03', 1, 5, 3),
(15, '2023-09-03', 5, 1, 5),
(16, '2023-09-03', 1, 1, 2),
(17, '2023-09-03', 2, 2, 2),
(18, '2023-09-03', 4, 1, 3),
(19, '2023-09-04', 4, 4, 5),
(20, '2023-09-04', 5, 3, 5),
(21, '2023-09-04', 5, 4, 4),
(22, '2023-09-04', 5, 1, 2),
(23, '2023-09-05', 5, 4, 1),
(24, '2023-09-05', 4, 1, 4),
(25, '2023-09-05', 3, 3, 4),
(26, '2023-09-05', 2, 5, 4),
(27, '2023-09-05', 3, 5, 2),
(28, '2023-09-05', 5, 2, 5),
(29, '2023-09-06', 5, 1, 2),
(30, '2023-09-06', 3, 5, 5),
(31, '2023-09-06', 3, 4, 1),
(32, '2023-09-06', 3, 4, 5),
(33, '2023-09-06', 4, 1, 4),
(34, '2023-09-06', 5, 1, 2),
(35, '2023-09-06', 3, 4, 1),
(36, '2023-09-07', 5, 1, 5),
(37, '2023-09-07', 2, 5, 4),
(38, '2023-09-07', 2, 1, 3),
(39, '2023-09-07', 1, 5, 4),
(40, '2023-09-07', 1, 5, 4),
(41, '2023-09-07', 5, 1, 3),
(42, '2023-09-07', 2, 4, 5),
(43, '2023-09-07', 5, 2, 4),
(44, '2023-09-07', 3, 3, 2),
(45, '2023-09-08', 3, 2, 5),
(46, '2023-09-08', 4, 5, 5),
(47, '2023-09-08', 1, 2, 1),
(48, '2023-09-09', 3, 5, 2),
(49, '2023-09-09', 5, 3, 5),
(50, '2023-09-09', 4, 3, 2),
(51, '2023-09-10', 2, 2, 3),
(52, '2023-09-10', 3, 2, 4),
(53, '2023-09-10', 1, 2, 4),
(54, '2023-09-10', 5, 1, 5),
(55, '2023-09-10', 2, 4, 2),
(56, '2023-09-11', 3, 2, 3),
(57, '2023-09-11', 2, 1, 1),
(58, '2023-09-11', 5, 5, 1),
(59, '2023-09-11', 1, 4, 3),
(60, '2023-09-12', 2, 5, 3),
(61, '2023-09-12', 3, 4, 3),
(62, '2023-09-12', 2, 1, 1),
(63, '2023-09-13', 1, 5, 4),
(64, '2023-09-13', 3, 3, 5),
(65, '2023-09-13', 3, 2, 4),
(66, '2023-09-13', 5, 5, 2),
(67, '2023-09-13', 3, 3, 2),
(68, '2023-09-13', 2, 2, 3),
(69, '2023-09-14', 4, 5, 5),
(70, '2023-09-14', 2, 4, 3),
(71, '2023-09-14', 2, 2, 4),
(72, '2023-09-14', 5, 4, 4),
(73, '2023-09-14', 4, 3, 2),
(74, '2023-09-14', 4, 5, 2),
(75, '2023-09-14', 2, 2, 1),
(76, '2023-09-14', 5, 2, 2),
(77, '2023-09-15', 2, 5, 3),
(78, '2023-09-15', 2, 5, 2),
(79, '2023-09-15', 5, 5, 1),
(80, '2023-09-15', 1, 3, 2),
(81, '2023-09-15', 5, 1, 1),
(82, '2023-09-15', 4, 3, 3),
(83, '2023-09-15', 1, 3, 3),
(84, '2023-09-16', 4, 5, 2),
(85, '2023-09-17', 5, 1, 1),
(86, '2023-09-17', 1, 3, 4),
(87, '2023-09-17', 1, 1, 4),
(88, '2023-09-17', 1, 1, 3),
(89, '2023-09-17', 4, 3, 2),
(90, '2023-09-18', 3, 4, 2),
(91, '2023-09-18', 4, 4, 4),
(92, '2023-09-18', 5, 1, 5),
(93, '2023-09-18', 3, 2, 2),
(94, '2023-09-19', 3, 5, 3),
(95, '2023-09-19', 1, 5, 5),
(96, '2023-09-19', 2, 4, 4),
(97, '2023-09-20', 1, 3, 5),
(98, '2023-09-20', 2, 5, 4),
(99, '2023-09-20', 1, 1, 4),
(100, '2023-09-20', 2, 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `harga`) VALUES
(1, 'Laptop', '2000.00'),
(2, 'Smartphone', '1000.00'),
(3, 'Tablet', '1500.00'),
(4, 'Printer', '500.00'),
(5, 'Mouse', '100.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','manager','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Admin Admin', 'admin@black.com', '2023-08-27 20:16:25', '$2y$10$2bZh43fof9q..jwsOvop9./4fXFdlX8H2gIEVcNz7p62cczwaDnoq', NULL, '2023-08-27 20:16:25', '2023-08-27 20:16:25', 'user'),
(2, 'anugerah', 'anugerah@gmail.com', NULL, '$2y$10$xUO7qbkqQKBBlZyYC1pv.e/bi8rFTQq1u4AhcOlO1NU54aLCz2qDe', NULL, '2023-09-22 22:53:58', '2023-09-22 22:53:58', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelanggan_id` (`pelanggan_id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`),
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
