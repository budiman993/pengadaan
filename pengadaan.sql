-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Agu 2021 pada 04.51
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
-- Database: `pengadaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `token` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama`, `email`, `alamat`, `password`, `status`, `token`, `created_at`, `updated_at`) VALUES
(1, 'Budiman', 'admin@gmail.com', 'Karawang', 'eyJpdiI6IjdwcjJpRWZzUFA1dG5oSzdyVCs2Y1E9PSIsInZhbHVlIjoiWFA1REw4bnZ5WFdXVDJ5czNkNEgxa3BIXC9wRDNielRXZ01hRWZNMWcySVk9IiwibWFjIjoiZmFhYzFjYTZkMWM1ZDQ4MWU5ZTg5MGMzZTc4OTcyYzE0NDNiNDhjMDU4OTg4YThjZmYxYTk3MzQwNWUxNjY4NSJ9', 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZF9hZG1pbiI6MX0.dzSMZAa1trOL-XpnEmpnLe5oKt2vajnMsL0-PflD0s0', '2021-08-01 20:56:03', '2021-08-18 20:12:59'),
(8, 'Admin2', 'admin2@gmail.com', 'Karawang Barat', 'eyJpdiI6IjhVSGtPTG9ZUllZQ0xaa1ZmejNNM2c9PSIsInZhbHVlIjoidEROenFFOVVrb1VuVjJKOUIwd1pPVWNHSXZNa1RoNmh1TlVGblBNQmpjUT0iLCJtYWMiOiI0Nzc1ZjQzNDAwYTJmYzkzZDNjZDc3ZDM1M2RiNWJlOWU1YzIzYTQ4NGZiODAyMDdmMTllMWQ4OTVmOGU1ZDM1In0=', 1, 'keluar', '2021-08-04 23:07:51', '2021-08-09 08:36:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_laporan`
--

CREATE TABLE `tbl_laporan` (
  `id_laporan` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `id_suplier` int(11) NOT NULL,
  `laporan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_laporan`
--

INSERT INTO `tbl_laporan` (`id_laporan`, `id_pengajuan`, `id_suplier`, `laporan`, `created_at`, `updated_at`) VALUES
(2, 3, 4, 'public/laporan/EEOvPDtqsQzXRNI4zkBEEOdjSkzN3oIKscxZKUAp.pdf', '2021-08-11 19:16:38', '2021-08-11 19:16:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengadaan`
--

CREATE TABLE `tbl_pengadaan` (
  `id_pengadaan` int(11) NOT NULL,
  `nama_pengadaan` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text NOT NULL,
  `anggaran` double NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pengadaan`
--

INSERT INTO `tbl_pengadaan` (`id_pengadaan`, `nama_pengadaan`, `deskripsi`, `gambar`, `anggaran`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kursi', 'https://serangopen.serangkab.go.id/files/proposal/81PROPOSAL%20PENGADAAN%20ALAT%20HADROH.pdf', 'public/gambar/Vus0NUg66lsGrcRTIlgdC5IKcG77cvZcJ9648iLi.jpg', 10000000, 1, '2021-08-04 19:37:57', '2021-08-04 21:09:57'),
(2, 'Meja', 'http://ehibahbansosmandiri.cilegon.go.id/media/proposal/b805993c9d22bcf6dcdf57dc90fb75f7.pdf', 'public/gambar/t0ZmBuOGuFFUvjAREPeP5u64mzH8u350yhTcyuh1.jpg', 20000000, 1, '2021-08-04 19:45:28', '2021-08-08 19:56:32'),
(4, 'Laptop', 'https://dindik.ponorogo.go.id/wp-content/uploads/2020/03/PROPOSAL_PENGADAAN_KOMPUTER_DI_LAB_KOMPU.pdf', 'public/gambar/i8u3dAu2kOQxg5Jj6El40wIV529ljGPifpFwRHbX.jpg', 5000000, 1, '2021-08-08 19:55:00', '2021-08-08 19:55:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengajuan`
--

CREATE TABLE `tbl_pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_suplier` int(11) NOT NULL,
  `id_pengadaan` int(11) NOT NULL,
  `anggaran` double NOT NULL,
  `proposal` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pengajuan`
--

INSERT INTO `tbl_pengajuan` (`id_pengajuan`, `id_suplier`, `id_pengadaan`, `anggaran`, `proposal`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 9000000, 'public/proposal/HnxdbFWVOo6b09Xe7K1cQJ9pqgIgsfpY6jso8Gvg.pdf', 2, '2021-08-09 07:32:14', '2021-08-15 19:16:07'),
(2, 4, 4, 4500000, 'public/proposal/3uoSBkYNyj1hMRiUlBDFrx8Wyo86mEEVoC3k6z0p.pdf', 0, '2021-08-09 08:36:58', '2021-08-09 08:37:22'),
(3, 4, 2, 19000000, 'public/proposal/g0n7pNp9ykKiiKgygcexshpXmJkLcWjEtFBZdI7u.pdf', 3, '2021-08-09 08:39:22', '2021-08-11 19:17:40'),
(4, 5, 1, 8000000, 'public/proposal/Q7nNLQ8vPapAhS6CsntodYXfd9htaSkHE8gVfXdH.pdf', 2, '2021-08-09 09:03:22', '2021-08-09 19:20:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_suplier`
--

CREATE TABLE `tbl_suplier` (
  `id_suplier` int(11) NOT NULL,
  `nama_usaha` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_npwp` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `token` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_suplier`
--

INSERT INTO `tbl_suplier` (`id_suplier`, `nama_usaha`, `email`, `alamat`, `no_npwp`, `password`, `status`, `token`, `created_at`, `updated_at`) VALUES
(1, 'CV Lancar Jaya', 'mutia@gmail.com', 'Karawang', '123123124', 'eyJpdiI6ImZibDBDZjNITEVudXd4QUZmNnM0bGc9PSIsInZhbHVlIjoid2ZMXC9OZjhWcDFVcDVJNnd0SzM2MGQwcDJcLzQwelZ5dVZcL2dJOGxTRGx3OD0iLCJtYWMiOiJmMGUzOTBmZDQ2MjNlNDAzMzFhNzViNGQzZjhiMjEyNWRjNjE3MmQ0MjRmOTUzNWI0ZjY1ODRmZWIzYWNmYmZiIn0=', 1, 'keluar', '2021-07-27 20:14:25', '2021-08-01 18:53:39'),
(2, 'Maju Mundur', 'majumundur@gmail.com', 'Karawang Barat', '12348190', 'eyJpdiI6IlFacnhZZ2ZyTUdhUE41cGJjRkJwb2c9PSIsInZhbHVlIjoiaGV5VVN4M1lCa3FUQTNXY2lLZGl6WEc2N2FzekVLOGpoQnRjTHNyTXVRZz0iLCJtYWMiOiIyNmYxYmE5NTZjNzQ0NjJiMDJhMDZhMTZjYzNlY2M1MGFlNDQ0Yzg0ZTIwYzg2ODRjNWViY2E0NjExZTVmYjE2In0=', 1, 'keluar', '2021-07-27 20:26:44', '2021-08-17 21:23:40'),
(4, 'CV Apa Aja', 'apaaja@gmail.com', 'Karawang', '123213123', 'eyJpdiI6ImlnY20xZkRIeDVGakZwQ0d6MUtcL0hBPT0iLCJ2YWx1ZSI6InkzWXhBWDZwN0t3VlhlRkJGZlwvNklDY0FOSU80VWU2bFh2bURkSnN2MFFrPSIsIm1hYyI6IjAzYmQ3ZWUxMWEzNmUxMmY4ZWU0MThhNWZjOTQ2ODg5ZDAxNDlkYTAwOWRlNGI5ZWNiMWUxNzM5NTc0OTY0OWUifQ==', 1, 'keluar', '2021-07-28 20:31:53', '2021-08-18 20:06:27'),
(5, 'CV Bangkit', 'bangkit@gmail.com', 'Indonesia', '123123123123', 'eyJpdiI6ImRadnVMeFRJOWNmTitFMTdrMEh3T0E9PSIsInZhbHVlIjoiQ2xmS09TODY0NTFvZHlwOGx3UU9oZHJjb1o3TEJoM2g3dFFzdWh4c05lND0iLCJtYWMiOiJmNDdhNDk2YmMxZjQyMmJmNDY3OTRlODVhOTZmZDRkMmZmYzAwZWVhNjQxNmQ0ZDdlOTllMGIzNjNlMjc2MGNhIn0=', 1, 'keluar', '2021-08-09 09:01:47', '2021-08-09 09:03:41');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tbl_laporan`
--
ALTER TABLE `tbl_laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `tbl_pengadaan`
--
ALTER TABLE `tbl_pengadaan`
  ADD PRIMARY KEY (`id_pengadaan`);

--
-- Indeks untuk tabel `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indeks untuk tabel `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_laporan`
--
ALTER TABLE `tbl_laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengadaan`
--
ALTER TABLE `tbl_pengadaan`
  MODIFY `id_pengadaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
