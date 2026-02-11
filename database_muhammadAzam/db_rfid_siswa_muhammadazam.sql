-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Feb 2026 pada 06.28
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rfid_siswa_muhammadazam`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru_muhammadazam`
--

CREATE TABLE `guru_muhammadazam` (
  `id_guru_muhammadAzam` varchar(10) NOT NULL,
  `id_user_muhammadAzam` varchar(10) NOT NULL,
  `nip_muhammadAzam` varchar(30) NOT NULL,
  `nama_guru_muhammadAzam` varchar(100) NOT NULL,
  `no_hp_muhammadAzam` varchar(20) DEFAULT NULL,
  `alamat_muhammadAzam` text DEFAULT NULL,
  `created_at_muhammadAzam` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `guru_muhammadazam`
--

INSERT INTO `guru_muhammadazam` (`id_guru_muhammadAzam`, `id_user_muhammadAzam`, `nip_muhammadAzam`, `nama_guru_muhammadAzam`, `no_hp_muhammadAzam`, `alamat_muhammadAzam`, `created_at_muhammadAzam`) VALUES
('GRU001', 'USR003', '1987654321', 'Pak Budi', '08111111111', 'Bandung', '2026-02-11 03:49:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kehadiran_muhammadazam`
--

CREATE TABLE `kehadiran_muhammadazam` (
  `id_kehadiran_muhammadAzam` varchar(10) NOT NULL,
  `id_siswa_muhammadAzam` varchar(10) NOT NULL,
  `id_kelas_muhammadAzam` varchar(10) NOT NULL,
  `id_semester_muhammadAzam` varchar(10) NOT NULL,
  `id_tahun_ajaran_muhammadAzam` varchar(10) NOT NULL,
  `tanggal_muhammadAzam` date NOT NULL,
  `jam_muhammadAzam` time NOT NULL,
  `status_muhammadAzam` enum('Hadir','Izin','Sakit','Alpha') NOT NULL DEFAULT 'Hadir',
  `keterangan_muhammadAzam` varchar(150) DEFAULT NULL,
  `created_at_muhammadAzam` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kehadiran_muhammadazam`
--

INSERT INTO `kehadiran_muhammadazam` (`id_kehadiran_muhammadAzam`, `id_siswa_muhammadAzam`, `id_kelas_muhammadAzam`, `id_semester_muhammadAzam`, `id_tahun_ajaran_muhammadAzam`, `tanggal_muhammadAzam`, `jam_muhammadAzam`, `status_muhammadAzam`, `keterangan_muhammadAzam`, `created_at_muhammadAzam`) VALUES
('KHD001', 'SIS001', 'KLS001', 'SMT001', 'TA001', '2026-02-11', '10:52:20', 'Hadir', 'Scan RFID', '2026-02-11 03:52:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_muhammadazam`
--

CREATE TABLE `kelas_muhammadazam` (
  `id_kelas_muhammadAzam` varchar(10) NOT NULL,
  `nama_kelas_muhammadAzam` varchar(50) NOT NULL,
  `jurusan_muhammadAzam` varchar(50) NOT NULL,
  `created_at_muhammadAzam` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kelas_muhammadazam`
--

INSERT INTO `kelas_muhammadazam` (`id_kelas_muhammadAzam`, `nama_kelas_muhammadAzam`, `jurusan_muhammadAzam`, `created_at_muhammadAzam`) VALUES
('KLS001', 'XI RPL B', 'Rekayasa Perangkat Lunak', '2026-02-11 03:49:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel_muhammadazam`
--

CREATE TABLE `mapel_muhammadazam` (
  `id_mapel_muhammadAzam` varchar(10) NOT NULL,
  `nama_mapel_muhammadAzam` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mapel_muhammadazam`
--

INSERT INTO `mapel_muhammadazam` (`id_mapel_muhammadAzam`, `nama_mapel_muhammadAzam`) VALUES
('MPL002', 'Basis Data'),
('MPL001', 'Pemrograman Web');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_muhammadazam`
--

CREATE TABLE `nilai_muhammadazam` (
  `id_nilai_muhammadAzam` varchar(10) NOT NULL,
  `id_siswa_muhammadAzam` varchar(10) NOT NULL,
  `id_mapel_muhammadAzam` varchar(10) NOT NULL,
  `id_guru_muhammadAzam` varchar(10) NOT NULL,
  `id_kelas_muhammadAzam` varchar(10) NOT NULL,
  `id_semester_muhammadAzam` varchar(10) NOT NULL,
  `id_tahun_ajaran_muhammadAzam` varchar(10) NOT NULL,
  `nilai_angka_muhammadAzam` int(11) NOT NULL,
  `nilai_huruf_muhammadAzam` varchar(5) NOT NULL,
  `created_at_muhammadAzam` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `nilai_muhammadazam`
--

INSERT INTO `nilai_muhammadazam` (`id_nilai_muhammadAzam`, `id_siswa_muhammadAzam`, `id_mapel_muhammadAzam`, `id_guru_muhammadAzam`, `id_kelas_muhammadAzam`, `id_semester_muhammadAzam`, `id_tahun_ajaran_muhammadAzam`, `nilai_angka_muhammadAzam`, `nilai_huruf_muhammadAzam`, `created_at_muhammadAzam`) VALUES
('NIL001', 'SIS001', 'MPL001', 'GRU001', 'KLS001', 'SMT001', 'TA001', 90, 'A', '2026-02-11 03:49:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rfid_muhammadazam`
--

CREATE TABLE `rfid_muhammadazam` (
  `id_rfid_muhammadAzam` varchar(10) NOT NULL,
  `id_user_muhammadAzam` varchar(10) NOT NULL,
  `uid_rfid_muhammadAzam` varchar(50) NOT NULL,
  `status_rfid_muhammadAzam` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif',
  `created_at_muhammadAzam` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rfid_muhammadazam`
--

INSERT INTO `rfid_muhammadazam` (`id_rfid_muhammadAzam`, `id_user_muhammadAzam`, `uid_rfid_muhammadAzam`, `status_rfid_muhammadAzam`, `created_at_muhammadAzam`) VALUES
('RF001', 'USR001', 'ADMIN123456', 'aktif', '2026-02-11 03:49:11'),
('RF002', 'USR002', 'SISWA123456', 'aktif', '2026-02-11 03:49:11'),
('RF003', 'USR003', 'GURU123456', 'aktif', '2026-02-11 03:49:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `semester_muhammadazam`
--

CREATE TABLE `semester_muhammadazam` (
  `id_semester_muhammadAzam` varchar(10) NOT NULL,
  `nama_semester_muhammadAzam` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `semester_muhammadazam`
--

INSERT INTO `semester_muhammadazam` (`id_semester_muhammadAzam`, `nama_semester_muhammadAzam`) VALUES
('SMT001', 'Semester 1'),
('SMT002', 'Semester 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa_muhammadazam`
--

CREATE TABLE `siswa_muhammadazam` (
  `id_siswa_muhammadAzam` varchar(10) NOT NULL,
  `id_user_muhammadAzam` varchar(10) NOT NULL,
  `id_kelas_muhammadAzam` varchar(10) NOT NULL,
  `nis_muhammadAzam` varchar(30) NOT NULL,
  `nama_siswa_muhammadAzam` varchar(100) NOT NULL,
  `jenis_kelamin_muhammadAzam` enum('L','P') NOT NULL,
  `tempat_lahir_muhammadAzam` varchar(50) DEFAULT NULL,
  `tanggal_lahir_muhammadAzam` date DEFAULT NULL,
  `alamat_muhammadAzam` text DEFAULT NULL,
  `no_hp_muhammadAzam` varchar(20) DEFAULT NULL,
  `created_at_muhammadAzam` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `siswa_muhammadazam`
--

INSERT INTO `siswa_muhammadazam` (`id_siswa_muhammadAzam`, `id_user_muhammadAzam`, `id_kelas_muhammadAzam`, `nis_muhammadAzam`, `nama_siswa_muhammadAzam`, `jenis_kelamin_muhammadAzam`, `tempat_lahir_muhammadAzam`, `tanggal_lahir_muhammadAzam`, `alamat_muhammadAzam`, `no_hp_muhammadAzam`, `created_at_muhammadAzam`) VALUES
('SIS001', 'USR002', 'KLS001', '10243302', 'Muhammad Azam Izzatulhaq', 'L', 'Bandung', '2008-02-05', 'Bandung', '089778892112', '2026-02-11 03:49:11'),
('SIS003', 'USR004', 'KLS001', '10243303', 'Muhammad Alif Firdaus', 'L', 'Bandung', '2006-02-03', 'Jl. Gado Bangkong', '089778892112', '2026-02-11 04:50:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajaran_muhammadazam`
--

CREATE TABLE `tahun_ajaran_muhammadazam` (
  `id_tahun_ajaran_muhammadAzam` varchar(10) NOT NULL,
  `nama_tahun_ajaran_muhammadAzam` varchar(20) NOT NULL,
  `status_muhammadAzam` enum('aktif','nonaktif') NOT NULL DEFAULT 'nonaktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tahun_ajaran_muhammadazam`
--

INSERT INTO `tahun_ajaran_muhammadazam` (`id_tahun_ajaran_muhammadAzam`, `nama_tahun_ajaran_muhammadAzam`, `status_muhammadAzam`) VALUES
('TA001', '2024/2025', 'aktif'),
('TA002', '2025/2026', 'nonaktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_muhammadazam`
--

CREATE TABLE `user_muhammadazam` (
  `id_user_muhammadAzam` varchar(10) NOT NULL,
  `username_muhammadAzam` varchar(50) NOT NULL,
  `nama_muhammadAzam` varchar(100) NOT NULL,
  `role_muhammadAzam` enum('admin','siswa','guru') NOT NULL,
  `created_at_muhammadAzam` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_muhammadazam`
--

INSERT INTO `user_muhammadazam` (`id_user_muhammadAzam`, `username_muhammadAzam`, `nama_muhammadAzam`, `role_muhammadAzam`, `created_at_muhammadAzam`) VALUES
('USR001', 'admin', 'Admin Utama', 'admin', '2026-02-11 03:49:11'),
('USR002', 'azam', 'Muhammad Azam', 'siswa', '2026-02-11 03:49:11'),
('USR003', 'guru1', 'Pak Budi', 'guru', '2026-02-11 03:49:11'),
('USR004', 'M.Alif', 'Muhammad Alif Firdaus', 'siswa', '2026-02-11 04:50:43');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `guru_muhammadazam`
--
ALTER TABLE `guru_muhammadazam`
  ADD PRIMARY KEY (`id_guru_muhammadAzam`),
  ADD UNIQUE KEY `id_user_muhammadAzam` (`id_user_muhammadAzam`),
  ADD UNIQUE KEY `nip_muhammadAzam` (`nip_muhammadAzam`);

--
-- Indeks untuk tabel `kehadiran_muhammadazam`
--
ALTER TABLE `kehadiran_muhammadazam`
  ADD PRIMARY KEY (`id_kehadiran_muhammadAzam`),
  ADD KEY `fk_kehadiran_siswa_muhammadAzam` (`id_siswa_muhammadAzam`),
  ADD KEY `fk_kehadiran_kelas_muhammadAzam` (`id_kelas_muhammadAzam`),
  ADD KEY `fk_kehadiran_semester_muhammadAzam` (`id_semester_muhammadAzam`),
  ADD KEY `fk_kehadiran_tahun_ajaran_muhammadAzam` (`id_tahun_ajaran_muhammadAzam`);

--
-- Indeks untuk tabel `kelas_muhammadazam`
--
ALTER TABLE `kelas_muhammadazam`
  ADD PRIMARY KEY (`id_kelas_muhammadAzam`),
  ADD UNIQUE KEY `nama_kelas_muhammadAzam` (`nama_kelas_muhammadAzam`);

--
-- Indeks untuk tabel `mapel_muhammadazam`
--
ALTER TABLE `mapel_muhammadazam`
  ADD PRIMARY KEY (`id_mapel_muhammadAzam`),
  ADD UNIQUE KEY `nama_mapel_muhammadAzam` (`nama_mapel_muhammadAzam`);

--
-- Indeks untuk tabel `nilai_muhammadazam`
--
ALTER TABLE `nilai_muhammadazam`
  ADD PRIMARY KEY (`id_nilai_muhammadAzam`),
  ADD KEY `fk_nilai_siswa_muhammadAzam` (`id_siswa_muhammadAzam`),
  ADD KEY `fk_nilai_mapel_muhammadAzam` (`id_mapel_muhammadAzam`),
  ADD KEY `fk_nilai_guru_muhammadAzam` (`id_guru_muhammadAzam`),
  ADD KEY `fk_nilai_kelas_muhammadAzam` (`id_kelas_muhammadAzam`),
  ADD KEY `fk_nilai_semester_muhammadAzam` (`id_semester_muhammadAzam`),
  ADD KEY `fk_nilai_tahun_ajaran_muhammadAzam` (`id_tahun_ajaran_muhammadAzam`);

--
-- Indeks untuk tabel `rfid_muhammadazam`
--
ALTER TABLE `rfid_muhammadazam`
  ADD PRIMARY KEY (`id_rfid_muhammadAzam`),
  ADD UNIQUE KEY `id_user_muhammadAzam` (`id_user_muhammadAzam`),
  ADD UNIQUE KEY `uid_rfid_muhammadAzam` (`uid_rfid_muhammadAzam`);

--
-- Indeks untuk tabel `semester_muhammadazam`
--
ALTER TABLE `semester_muhammadazam`
  ADD PRIMARY KEY (`id_semester_muhammadAzam`),
  ADD UNIQUE KEY `nama_semester_muhammadAzam` (`nama_semester_muhammadAzam`);

--
-- Indeks untuk tabel `siswa_muhammadazam`
--
ALTER TABLE `siswa_muhammadazam`
  ADD PRIMARY KEY (`id_siswa_muhammadAzam`),
  ADD UNIQUE KEY `id_user_muhammadAzam` (`id_user_muhammadAzam`),
  ADD UNIQUE KEY `nis_muhammadAzam` (`nis_muhammadAzam`),
  ADD KEY `fk_siswa_kelas_muhammadAzam` (`id_kelas_muhammadAzam`);

--
-- Indeks untuk tabel `tahun_ajaran_muhammadazam`
--
ALTER TABLE `tahun_ajaran_muhammadazam`
  ADD PRIMARY KEY (`id_tahun_ajaran_muhammadAzam`),
  ADD UNIQUE KEY `nama_tahun_ajaran_muhammadAzam` (`nama_tahun_ajaran_muhammadAzam`);

--
-- Indeks untuk tabel `user_muhammadazam`
--
ALTER TABLE `user_muhammadazam`
  ADD PRIMARY KEY (`id_user_muhammadAzam`),
  ADD UNIQUE KEY `username_muhammadAzam` (`username_muhammadAzam`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `guru_muhammadazam`
--
ALTER TABLE `guru_muhammadazam`
  ADD CONSTRAINT `fk_guru_user_muhammadAzam` FOREIGN KEY (`id_user_muhammadAzam`) REFERENCES `user_muhammadazam` (`id_user_muhammadAzam`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kehadiran_muhammadazam`
--
ALTER TABLE `kehadiran_muhammadazam`
  ADD CONSTRAINT `fk_kehadiran_kelas_muhammadAzam` FOREIGN KEY (`id_kelas_muhammadAzam`) REFERENCES `kelas_muhammadazam` (`id_kelas_muhammadAzam`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kehadiran_semester_muhammadAzam` FOREIGN KEY (`id_semester_muhammadAzam`) REFERENCES `semester_muhammadazam` (`id_semester_muhammadAzam`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kehadiran_siswa_muhammadAzam` FOREIGN KEY (`id_siswa_muhammadAzam`) REFERENCES `siswa_muhammadazam` (`id_siswa_muhammadAzam`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kehadiran_tahun_ajaran_muhammadAzam` FOREIGN KEY (`id_tahun_ajaran_muhammadAzam`) REFERENCES `tahun_ajaran_muhammadazam` (`id_tahun_ajaran_muhammadAzam`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai_muhammadazam`
--
ALTER TABLE `nilai_muhammadazam`
  ADD CONSTRAINT `fk_nilai_guru_muhammadAzam` FOREIGN KEY (`id_guru_muhammadAzam`) REFERENCES `guru_muhammadazam` (`id_guru_muhammadAzam`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nilai_kelas_muhammadAzam` FOREIGN KEY (`id_kelas_muhammadAzam`) REFERENCES `kelas_muhammadazam` (`id_kelas_muhammadAzam`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nilai_mapel_muhammadAzam` FOREIGN KEY (`id_mapel_muhammadAzam`) REFERENCES `mapel_muhammadazam` (`id_mapel_muhammadAzam`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nilai_semester_muhammadAzam` FOREIGN KEY (`id_semester_muhammadAzam`) REFERENCES `semester_muhammadazam` (`id_semester_muhammadAzam`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nilai_siswa_muhammadAzam` FOREIGN KEY (`id_siswa_muhammadAzam`) REFERENCES `siswa_muhammadazam` (`id_siswa_muhammadAzam`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nilai_tahun_ajaran_muhammadAzam` FOREIGN KEY (`id_tahun_ajaran_muhammadAzam`) REFERENCES `tahun_ajaran_muhammadazam` (`id_tahun_ajaran_muhammadAzam`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rfid_muhammadazam`
--
ALTER TABLE `rfid_muhammadazam`
  ADD CONSTRAINT `fk_rfid_user_muhammadAzam` FOREIGN KEY (`id_user_muhammadAzam`) REFERENCES `user_muhammadazam` (`id_user_muhammadAzam`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa_muhammadazam`
--
ALTER TABLE `siswa_muhammadazam`
  ADD CONSTRAINT `fk_siswa_kelas_muhammadAzam` FOREIGN KEY (`id_kelas_muhammadAzam`) REFERENCES `kelas_muhammadazam` (`id_kelas_muhammadAzam`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_siswa_user_muhammadAzam` FOREIGN KEY (`id_user_muhammadAzam`) REFERENCES `user_muhammadazam` (`id_user_muhammadAzam`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
