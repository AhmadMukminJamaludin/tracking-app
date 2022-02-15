-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Feb 2022 pada 14.05
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `track_app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_nasabah`
--

CREATE TABLE `data_nasabah` (
  `id_data_nasabah` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `nama_nasabah` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `phone` varchar(15) NOT NULL,
  `no_ktp` int(50) NOT NULL,
  `npwp` int(50) NOT NULL,
  `kewarganegaraan` varchar(20) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(6) NOT NULL,
  `status_perkawinan` varchar(10) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `alamat_identitas` varchar(100) NOT NULL,
  `alamat_terkini` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_nasabah`
--

INSERT INTO `data_nasabah` (`id_data_nasabah`, `user_id`, `nama_nasabah`, `tempat_lahir`, `tanggal_lahir`, `phone`, `no_ktp`, `npwp`, `kewarganegaraan`, `provinsi`, `jenis_kelamin`, `status_perkawinan`, `nama_ibu`, `alamat_identitas`, `alamat_terkini`) VALUES
(1, 6, 'Afsheena Farzana Putri', 'Jepara', '2022-02-07', '089522822345', 2147483647, 2147483647, 'Indonesia', 'Jawa Tengah', 'wanita', 'lajang', 'Fathonah', 'jepara, jawa tengah', 'jepara');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pekerjaan`
--

CREATE TABLE `data_pekerjaan` (
  `id_data_pekerjaan` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `bd_usaha` varchar(100) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `tahun` int(5) NOT NULL,
  `bulan` int(5) NOT NULL,
  `penghasilan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pekerjaan`
--

INSERT INTO `data_pekerjaan` (`id_data_pekerjaan`, `user_id`, `pekerjaan`, `bd_usaha`, `nama_perusahaan`, `tahun`, `bulan`, `penghasilan`) VALUES
(1, 6, 'Pekerja swasta', 'Pekerja Komputer', 'PT. Shopee Indonesia', 1, 3, '5 juta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_permohonan_kredit`
--

CREATE TABLE `data_permohonan_kredit` (
  `id_permohonan_kredit` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `jumlah_nominal` varchar(25) NOT NULL,
  `tujuan_penggunaan` varchar(100) NOT NULL,
  `ket_penggunaan` varchar(100) NOT NULL,
  `jumlah_tanggungan` int(5) NOT NULL,
  `jaminan_kredit` varchar(200) NOT NULL,
  `posisi_jaminan` varchar(100) NOT NULL,
  `status_jaminan` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `progress` int(5) NOT NULL,
  `scan_berkas` varchar(255) NOT NULL,
  `qrcode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_permohonan_kredit`
--

INSERT INTO `data_permohonan_kredit` (`id_permohonan_kredit`, `user_id`, `jumlah_nominal`, `tujuan_penggunaan`, `ket_penggunaan`, `jumlah_tanggungan`, `jaminan_kredit`, `posisi_jaminan`, `status_jaminan`, `created_at`, `progress`, `scan_berkas`, `qrcode`) VALUES
(1, 6, '10000000', 'Menambah modal usaha', 'Ingin menambah modal usaha', 12, 'fc ktp suami', 'tidak sedang dijaminkan', 'milik sendiri', '2022-02-08', 4, '', ''),
(3, 4, '10,000,000', 'Investasi', 'Untuk investasi bitcoin', 12, 'fc akta kelahiran', 'tidak sedang dijaminkan', 'milik sendiri', '2022-02-09', 1, 'facae5a5393b9c535e247113134df6dd.pdf', ''),
(4, 19, '12,000,000', 'Konsumsi', 'Ingin makan KFC 12 porsi', 12, 'sandal swallow', 'sedang dijaminkan', 'milik orang lain', '2022-02-09', 3, 'd813268cce501d13bf8eb137954f1d50.pdf', ''),
(7, 17, '1,300,000', 'Konsumsi', 'ingin makan enak', 7, 'FC KTP', 'tidak sedang dijaminkan', 'milik sendiri', '2022-02-09', 1, '074a4b60d0e0d2ee37eccc57d382155f.jpg', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pribadi_nasabah`
--

CREATE TABLE `data_pribadi_nasabah` (
  `id_data_pribadi_nasabah` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_ktp` int(35) NOT NULL,
  `alamat_identitas` varchar(255) NOT NULL,
  `alamat_terkini` varchar(255) NOT NULL,
  `kepemilikan_rumah` varchar(50) NOT NULL,
  `tahun` int(5) NOT NULL,
  `bulan` int(5) NOT NULL,
  `pendidikan` varchar(5) NOT NULL,
  `nama_suamiistri` varchar(100) NOT NULL,
  `nama_gadis_ibu_kandung` varchar(100) NOT NULL,
  `jumlah_tanggungan` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pribadi_nasabah`
--

INSERT INTO `data_pribadi_nasabah` (`id_data_pribadi_nasabah`, `user_id`, `name`, `tempat_lahir`, `tanggal_lahir`, `no_ktp`, `alamat_identitas`, `alamat_terkini`, `kepemilikan_rumah`, `tahun`, `bulan`, `pendidikan`, `nama_suamiistri`, `nama_gadis_ibu_kandung`, `jumlah_tanggungan`) VALUES
(1, 6, 'Afsheena Farzana Putri', 'Jepara', '2022-02-08', 2147483647, 'Jepara, jawa tengah', 'Jepara, jawa tengah', 'milik sendiri', 1, 3, 'S1', 'Leonardi', 'Listiani Putri', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(4) NOT NULL,
  `nama_divisi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'Administrator'),
(2, 'Petugas SLK'),
(3, 'Kepala Bagian Analis'),
(16, 'Staff Analis'),
(17, 'Customer Service'),
(20, 'Nasabah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `progres_permohonan_kredit`
--

CREATE TABLE `progres_permohonan_kredit` (
  `id_progress` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `id_petugas` int(5) NOT NULL,
  `tanggal_progres` date NOT NULL,
  `status_progres` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `progres_permohonan_kredit`
--

INSERT INTO `progres_permohonan_kredit` (`id_progress`, `user_id`, `id_petugas`, `tanggal_progres`, `status_progres`) VALUES
(1, 17, 0, '2022-02-09', 'Permohonan kredit baru'),
(2, 17, 1, '2022-02-09', 'Dalam pemeriksaan petugas'),
(3, 6, 1, '2022-02-09', 'Permohonan baru'),
(4, 17, 1, '2022-02-09', 'Dalam pemeriksaan petugas customer service'),
(22, 19, 5, '2022-02-10', 'Dalam pemeriksaan Customer Service'),
(23, 19, 5, '2022-02-10', 'Dalam pemeriksaan Customer Service'),
(24, 17, 5, '2022-02-10', 'Dalam pemeriksaan Customer Service'),
(25, 17, 5, '2022-02-10', 'Dalam pemeriksaan Petugas SLIK'),
(26, 6, 5, '2022-02-10', 'Seluruh berkas dalam pengiriman Staff Analisis'),
(27, 17, 5, '2022-02-10', 'Dalam pemeriksaan Kepala Bagian Analisis'),
(28, 6, 1, '2022-02-10', 'Dalam pemeriksaan Kepala Bagian Analisis'),
(29, 6, 1, '2022-02-10', 'Dalam pemeriksaan Kepala Bagian Analisis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id_setting` int(1) NOT NULL,
  `judul_1` varchar(50) NOT NULL,
  `subjudul_1` varchar(100) NOT NULL,
  `judul_2` varchar(100) NOT NULL,
  `subjudul_2` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id_setting`, `judul_1`, `subjudul_1`, `judul_2`, `subjudul_2`, `gambar`) VALUES
(1, 'Welcome to TRACKING-APP', 'Before you get started, you must login or register if you don\'t already have an account.', 'Selamat Datang :)', 'Aplikasi Pelayanan Pengajuan Kredit Berbasis Website', '5dfc406b68ebcaf4129b98ce67698df7.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(4) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(15) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(25) NOT NULL,
  `role_id` int(3) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `nip`, `name`, `username`, `photo`, `phone`, `password`, `email`, `role_id`, `created_at`) VALUES
(1, '32278905676512', 'Ahmad Mukmin Jamaludin', 'Jamaludin', 'f81a6728d84d2e8931b96dd0d66262a2.jpg', '089522822321', '$2y$10$atceAQBELL2i7APy9iJR0O0afnsrLoe1nIqqe7OZD8CTuKcXRupgS', 'jcfirda@gmail.com', 1, '2022-01-30'),
(4, '', 'Firda Dzikrina Istighfarani', 'Firda', '', '089522822321', '$2y$10$CVawsOfmSbgl5UP.TBsUiOENoGM/YnPc9HCQjPpUs6mtk4IBpKmny', 'firda@gmail.com', 2, '2022-01-31'),
(5, '3322114532234', 'Najikhatus Salma', 'Salma', '', '089522822333', '$2y$10$bxer/SeUbASm.CO7Fu52QuZJLeUDUyePP76hEAGqmN5IknP3DzeRO', 'salma@gmail.com', 3, '2022-02-01'),
(6, '332211453221', 'Afsheena Farzana Putri', 'Sheena', '6ee202182cf7731915622dc589ec09f6.png', '089522822345', '$2y$10$WmWzufSah3ONhXmT1mqsJuvIxNuHQqxct9t6uMsltdntT4mrexy9K', 'sheena@gmail.com', 2, '2022-02-03'),
(7, '', 'Fathonah', 'Fathonah', '', '089522822345', '$2y$10$hZZaNCqFqnA.5P7BRQSMEO6uBuow9BkJq5bbcsjyHjrJVT9w7BSsi', 'fathonah@gmail.com', 2, '2022-02-03'),
(8, '', 'Mukhlisin', 'Mukhlisin', '', '089522822345', '$2y$10$f.6viLTaN5tGCpdtpKz2uuakX09Lq2.Xqakkga5Wvea1/V35E9cTi', 'mukhlisin@gmail.com', 2, '2022-02-03'),
(9, '', 'Listiyani Putri', 'Lilis', '', '089522822325', '$2y$10$7o4mXxCc56xpKmPrHu.2AuHIaAS5AUYLgKw8Lyl3MNUjZ/o.Idy3.', 'lilis@gmail.com', 2, '2022-02-03'),
(10, '', 'Muhammad Farid', 'Farid', '', '089522822332', '$2y$10$oJVNDo55Yrbe9ej29JKxS.VFW5.AjZg/aSwzN2q4GxHhGnVYvrXge', 'farid@gmail.com', 2, '2022-02-03'),
(11, '', 'Muhammad Ferry Hidayat Djati', 'Ferry ', '', '089522822324', '$2y$10$mqW8VMqRG5tTI.VTd3ifqOkYF1/6.RFk2kzgFuSb8MzWsvCp5NZgy', 'ferry@gmail.com', 2, '2022-02-03'),
(15, '', 'Afwah Mumtazah', 'Afwah ', '', '089556765435', '$2y$10$1jhq.x3DlE48nDU2Jk/YEOksqQYDqfEaGuJWskfwKVPricVR1zyyG', 'afwah@gmail.com', 2, '2022-02-04'),
(17, '', 'Ahmad Azhar Sholahudin Basyir', 'Azhar', '', '089522825645', '$2y$10$Fx3YV4yGVs27ulin4flIuuGb.qzvs4fTNuwvKKs7fobQQXyrfE0Cm', 'azhar@gmail.com', 2, '2022-02-04'),
(19, '', 'Ah. Nadirun Ahwan', 'Ahwan', '', '089522822345', '$2y$10$a0ZBDOCldl6btfL1bo.Yve8f5ydor4qAoTiObqxX4CnkCO8YfCHsS', 'ahwan@gmail.com', 2, '2022-02-04');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_nasabah`
--
ALTER TABLE `data_nasabah`
  ADD PRIMARY KEY (`id_data_nasabah`);

--
-- Indeks untuk tabel `data_pekerjaan`
--
ALTER TABLE `data_pekerjaan`
  ADD PRIMARY KEY (`id_data_pekerjaan`);

--
-- Indeks untuk tabel `data_permohonan_kredit`
--
ALTER TABLE `data_permohonan_kredit`
  ADD PRIMARY KEY (`id_permohonan_kredit`);

--
-- Indeks untuk tabel `data_pribadi_nasabah`
--
ALTER TABLE `data_pribadi_nasabah`
  ADD PRIMARY KEY (`id_data_pribadi_nasabah`);

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indeks untuk tabel `progres_permohonan_kredit`
--
ALTER TABLE `progres_permohonan_kredit`
  ADD PRIMARY KEY (`id_progress`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_nasabah`
--
ALTER TABLE `data_nasabah`
  MODIFY `id_data_nasabah` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_pekerjaan`
--
ALTER TABLE `data_pekerjaan`
  MODIFY `id_data_pekerjaan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_permohonan_kredit`
--
ALTER TABLE `data_permohonan_kredit`
  MODIFY `id_permohonan_kredit` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `data_pribadi_nasabah`
--
ALTER TABLE `data_pribadi_nasabah`
  MODIFY `id_data_pribadi_nasabah` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `progres_permohonan_kredit`
--
ALTER TABLE `progres_permohonan_kredit`
  MODIFY `id_progress` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id_setting` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
