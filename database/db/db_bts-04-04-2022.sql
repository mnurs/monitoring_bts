-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Apr 2022 pada 03.50
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bts`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bts`
--

CREATE TABLE `bts` (
  `id` int(11) NOT NULL,
  `id_user_pic` bigint(20) UNSIGNED NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `id_wilayah` bigint(20) NOT NULL,
  `id_jenis_bts` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `latitude` decimal(11,7) NOT NULL,
  `longitude` decimal(11,7) NOT NULL,
  `tinggi_tower` int(11) NOT NULL,
  `panjang_tanah` int(11) NOT NULL,
  `lebar_tanah` int(11) NOT NULL,
  `ada_genset` tinyint(1) NOT NULL DEFAULT 0,
  `ada_tembok_batas` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `edited_by` varchar(100) DEFAULT NULL,
  `edited_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `id` int(11) NOT NULL,
  `id_bts` int(11) NOT NULL,
  `path_foto` text NOT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `edited_by` varchar(100) DEFAULT NULL,
  `edited_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `edited_by` varchar(100) DEFAULT NULL,
  `edited_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kondisi`
--

CREATE TABLE `kondisi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `edited_by` varchar(100) DEFAULT NULL,
  `edited_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `value` varchar(20) NOT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `edited_by` varchar(100) DEFAULT NULL,
  `edited_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuesioner`
--

CREATE TABLE `kuesioner` (
  `id` int(11) NOT NULL,
  `jawaban` text NOT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `edited_by` varchar(100) DEFAULT NULL,
  `edited_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuesioner_jawaban`
--

CREATE TABLE `kuesioner_jawaban` (
  `id` int(11) NOT NULL,
  `id_monitoring` int(11) NOT NULL,
  `id_kuesioner` int(11) NOT NULL,
  `jawaban` text NOT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `edited_by` varchar(100) DEFAULT NULL,
  `edited_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuesioner_pilihan`
--

CREATE TABLE `kuesioner_pilihan` (
  `id` int(11) NOT NULL,
  `id_kuesioner` int(11) NOT NULL,
  `pilihan_jawaban` text NOT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `edited_by` varchar(100) DEFAULT NULL,
  `edited_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `monitoring`
--

CREATE TABLE `monitoring` (
  `id` int(11) NOT NULL,
  `id_bts` int(11) NOT NULL,
  `id_kondisi_bts` int(11) DEFAULT NULL,
  `id_user_surveyor` bigint(20) UNSIGNED DEFAULT NULL,
  `tgl_generate` date NOT NULL,
  `tgl_kunjungan` date DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `edited_by` varchar(100) DEFAULT NULL,
  `edited_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Struktur dari tabel `pemilik`
--

CREATE TABLE `pemilik` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `edited_by` varchar(100) DEFAULT NULL,
  `edited_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `role` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `edited_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `wilayah`
--

CREATE TABLE `wilayah` (
  `id` bigint(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `id_parent` bigint(20) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `edited_by` varchar(100) DEFAULT NULL,
  `edited_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bts`
--
ALTER TABLE `bts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_bts_users` (`id_user_pic`),
  ADD KEY `FK_bts_wilayah` (`id_wilayah`),
  ADD KEY `FK_bts_pemilik` (`id_pemilik`),
  ADD KEY `FK_bts_jenis` (`id_jenis_bts`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_foto_bts` (`id_bts`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kondisi`
--
ALTER TABLE `kondisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kuesioner`
--
ALTER TABLE `kuesioner`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kuesioner_jawaban`
--
ALTER TABLE `kuesioner_jawaban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_kuesioner_jawaban_monitor` (`id_monitoring`),
  ADD KEY `FK_kuesioner_jawaban_kuesioner` (`id_kuesioner`);

--
-- Indeks untuk tabel `kuesioner_pilihan`
--
ALTER TABLE `kuesioner_pilihan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_kuesioner_pilihan_kuesioner` (`id_kuesioner`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `monitoring`
--
ALTER TABLE `monitoring`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_monitoring_users` (`id_user_surveyor`),
  ADD KEY `FK_monitoring_bts` (`id_bts`),
  ADD KEY `FK_monitoring_kondisi` (`id_kondisi_bts`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_wilayah_parent` (`id_parent`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bts`
--
ALTER TABLE `bts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kondisi`
--
ALTER TABLE `kondisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kuesioner`
--
ALTER TABLE `kuesioner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kuesioner_jawaban`
--
ALTER TABLE `kuesioner_jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kuesioner_pilihan`
--
ALTER TABLE `kuesioner_pilihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `monitoring`
--
ALTER TABLE `monitoring`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bts`
--
ALTER TABLE `bts`
  ADD CONSTRAINT `FK_bts_jenis` FOREIGN KEY (`id_jenis_bts`) REFERENCES `jenis` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_bts_pemilik` FOREIGN KEY (`id_pemilik`) REFERENCES `pemilik` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_bts_users` FOREIGN KEY (`id_user_pic`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_bts_wilayah` FOREIGN KEY (`id_wilayah`) REFERENCES `wilayah` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `FK_foto_bts` FOREIGN KEY (`id_bts`) REFERENCES `bts` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kuesioner_jawaban`
--
ALTER TABLE `kuesioner_jawaban`
  ADD CONSTRAINT `FK_kuesioner_jawaban_kuesioner` FOREIGN KEY (`id_kuesioner`) REFERENCES `kuesioner` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_kuesioner_jawaban_monitor` FOREIGN KEY (`id_monitoring`) REFERENCES `monitoring` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kuesioner_pilihan`
--
ALTER TABLE `kuesioner_pilihan`
  ADD CONSTRAINT `FK_kuesioner_pilihan_kuesioner` FOREIGN KEY (`id_kuesioner`) REFERENCES `kuesioner_pilihan` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `monitoring`
--
ALTER TABLE `monitoring`
  ADD CONSTRAINT `FK_monitoring_bts` FOREIGN KEY (`id_bts`) REFERENCES `bts` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_monitoring_kondisi` FOREIGN KEY (`id_kondisi_bts`) REFERENCES `kondisi` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_monitoring_users` FOREIGN KEY (`id_user_surveyor`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `wilayah`
--
ALTER TABLE `wilayah`
  ADD CONSTRAINT `FK_wilayah_parent` FOREIGN KEY (`id_parent`) REFERENCES `wilayah` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
