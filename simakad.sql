-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jul 2020 pada 18.32
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simakad`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL COMMENT 'y=yes,n=no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `title`, `url`, `icon`, `is_main_menu`, `is_aktif`) VALUES
(1, 'KELOLA MENU', 'kelolamenu', 'fa fa-server', 0, 'y'),
(2, 'KELOLA PENGGUNA', 'user', 'fa fa-user-o', 0, 'y'),
(3, 'level PENGGUNA', 'userlevel', 'fa fa-users', 0, 'y'),
(4, 'Sample Menu', 'Sample Menu', 'fa fa-graduation-cap', 0, 'n'),
(5, 'Sample Menu', 'Sample Menu', 'fa fa-bed', 0, 'n'),
(6, 'Sample Menu', 'Sample Menu', 'fa-id-card', 0, 'n'),
(7, 'Sample Menu', 'Sample Menu', 'fa fa-area-chart', 0, 'n'),
(8, 'Sample Menu', 'Sample Menu', 'fa-id-card', 0, 'n'),
(9, 'Contoh Form', 'welcome/form', 'fa fa-id-card', 0, 'y'),
(13, 'Kelola Data Siswa', 'kelolasiswa', 'fa fa-users', 0, 'y'),
(14, 'List Data Siswa', 'datasiswa', 'fa fa-users', 13, 'y'),
(15, 'Kelola PPDB', 'kelolappdb', 'fa fa-users', 0, 'y'),
(16, 'List Pendaftar', 'ppdb', 'fa fa-users', 15, 'y'),
(17, 'Mutasi Siswa', 'datasiswa/mutasi', 'fa fa-user', 13, 'y'),
(19, 'Kelola Data Guru', 'Dataguru', 'fa fa-user', 0, 'y'),
(20, 'Kelola Kelas', 'Datakelas', 'fa fa-users', 0, 'y'),
(21, 'List Kelas', 'listkelas', 'fa fa-users', 20, 'y'),
(22, 'List Jurusan', 'listjurusan', 'fa fa-user', 20, 'y'),
(23, 'Jadwal Pelajaran', 'Datajadwal', 'fa fa-check', 0, 'y'),
(24, 'List Mata Pelajaran', 'Datamatapelajaran', 'fa fa-users', 23, 'y'),
(25, 'List Jadwal', 'Datajadwal', 'fa fa-check', 23, 'y'),
(26, 'Kelola Nilai', 'Datanilai', 'fa fa-vcard', 0, 'y'),
(27, 'Absensi', 'Dataabsensi', 'fa fa-check', 0, 'y'),
(28, 'RPP Guru', 'Datarpp', 'fa fa-vcard', 0, 'y'),
(29, 'Kelola Rombel', 'Datarombel', 'fa fa-users', 20, 'y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_users` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `images` text NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_users`, `full_name`, `email`, `password`, `images`, `id_user_level`, `is_aktif`) VALUES
(1, 'Nuris Akbar M.Kom', 'nuris.akbar@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Cover_TIPSTRIK_codeigniter.jpg', 1, 'y'),
(3, 'Muhammad hafidz Muzaki', 'hafid@gmail.com', 'f2621da6b3d4f712bf5e29861f186c7c', '7.png', 2, 'y'),
(4, 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '', 1, 'y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_level`
--

CREATE TABLE `tbl_user_level` (
  `id_user_level` int(11) NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user_level`
--

INSERT INTO `tbl_user_level` (`id_user_level`, `nama_level`) VALUES
(1, 'Super Admin'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_guru`
--

CREATE TABLE `t_guru` (
  `id_guru` int(11) NOT NULL,
  `nipy` int(12) DEFAULT NULL,
  `nik` int(16) DEFAULT NULL,
  `nama_guru` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `induk` enum('Ya','Tidak') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_guru`
--

INSERT INTO `t_guru` (`id_guru`, `nipy`, `nik`, `nama_guru`, `jenis_kelamin`, `tanggal_lahir`, `induk`) VALUES
(1, 0, 0, 'NOT ASSIGN', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jadwal_pelajaran`
--

CREATE TABLE `t_jadwal_pelajaran` (
  `id_jadwal` int(11) NOT NULL,
  `id_matpel` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu') DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jurusan`
--

CREATE TABLE `t_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_jurusan`
--

INSERT INTO `t_jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'NOT ASSIGN'),
(2, 'TKJ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kelas`
--

CREATE TABLE `t_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(50) DEFAULT NULL,
  `tingkat` enum('X','XI','XII','0') DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `id_wali_kelas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_kelas`
--

INSERT INTO `t_kelas` (`id_kelas`, `nama_kelas`, `tingkat`, `id_jurusan`, `id_wali_kelas`) VALUES
(1, 'NOT ASSIGN', '0', 1, 1),
(2, 'XI-TKJ-1', 'X', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_matpel`
--

CREATE TABLE `t_matpel` (
  `id_matpel` int(11) NOT NULL,
  `nama_matpel` varchar(50) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `semester` enum('Ganjil','Genap') DEFAULT NULL,
  `tahun_ajaran_mulai` year(4) DEFAULT NULL,
  `tahun_ajaran_selesai` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_nilai`
--

CREATE TABLE `t_nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_matpel` int(11) DEFAULT NULL,
  `nilai_absensi` int(3) DEFAULT NULL,
  `nilai_tugas` int(3) DEFAULT NULL,
  `nilai_kuis` int(3) DEFAULT NULL,
  `nilai_uts` int(3) DEFAULT NULL,
  `nilai_uas` int(3) DEFAULT NULL,
  `niali_akhir` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_ppdb`
--

CREATE TABLE `t_ppdb` (
  `id_pendaftaran` int(11) NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `nisn` int(10) DEFAULT NULL,
  `asal_sekolah` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_telp_siswa` varchar(12) DEFAULT NULL,
  `nama_wali` varchar(50) DEFAULT NULL,
  `no_telp_wali` varchar(12) DEFAULT NULL,
  `file_ijazah` text DEFAULT NULL,
  `file_skhun` text DEFAULT NULL,
  `file_foto` text DEFAULT NULL,
  `status_penerimaan` enum('Diterima','Ditolak') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_ppdb`
--

INSERT INTO `t_ppdb` (`id_pendaftaran`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `nisn`, `asal_sekolah`, `alamat`, `no_telp_siswa`, `nama_wali`, `no_telp_wali`, `file_ijazah`, `file_skhun`, `file_foto`, `status_penerimaan`) VALUES
(1, 'Adit', 'Bandung', '1998-06-25', 1234567890, 'SMP 1 Cidaun', 'Jl. Dipati Ukur No.112-116, Lebakgede, Kecamatan Coblong', '081220983123', 'suryanto', '12312312333', 'sada', 'asda', 'asdasdas', 'Diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_rpp`
--

CREATE TABLE `t_rpp` (
  `id_rpp` int(11) NOT NULL,
  `judul_rpp` varchar(50) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `id_matpel` int(11) DEFAULT NULL,
  `status_persetujuan` enum('Disetujui','Revisi') DEFAULT NULL,
  `catatan_revisi` text DEFAULT NULL,
  `tanggal_upload` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_siswa`
--

CREATE TABLE `t_siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_pendaftaran` int(11) DEFAULT NULL,
  `nis` int(7) DEFAULT NULL,
  `nisn` int(10) DEFAULT NULL,
  `nama_siswa` varchar(50) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `status_aktif` enum('Aktif','Tidak Aktif') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_siswa`
--

INSERT INTO `t_siswa` (`id_siswa`, `id_pendaftaran`, `nis`, `nisn`, `nama_siswa`, `id_kelas`, `status_aktif`) VALUES
(3, 1, 0, 1234567890, 'Adit', 2, 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_users`);

--
-- Indeks untuk tabel `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- Indeks untuk tabel `t_guru`
--
ALTER TABLE `t_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `t_jadwal_pelajaran`
--
ALTER TABLE `t_jadwal_pelajaran`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_matpel` (`id_matpel`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `t_jurusan`
--
ALTER TABLE `t_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `t_kelas`
--
ALTER TABLE `t_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `id_wali_kelas` (`id_wali_kelas`);

--
-- Indeks untuk tabel `t_matpel`
--
ALTER TABLE `t_matpel`
  ADD PRIMARY KEY (`id_matpel`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indeks untuk tabel `t_nilai`
--
ALTER TABLE `t_nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_matpel` (`id_matpel`);

--
-- Indeks untuk tabel `t_ppdb`
--
ALTER TABLE `t_ppdb`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indeks untuk tabel `t_rpp`
--
ALTER TABLE `t_rpp`
  ADD PRIMARY KEY (`id_rpp`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_matpel` (`id_matpel`);

--
-- Indeks untuk tabel `t_siswa`
--
ALTER TABLE `t_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_pendaftaran` (`id_pendaftaran`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_guru`
--
ALTER TABLE `t_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_jadwal_pelajaran`
--
ALTER TABLE `t_jadwal_pelajaran`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_jurusan`
--
ALTER TABLE `t_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_kelas`
--
ALTER TABLE `t_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_matpel`
--
ALTER TABLE `t_matpel`
  MODIFY `id_matpel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_nilai`
--
ALTER TABLE `t_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_ppdb`
--
ALTER TABLE `t_ppdb`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_rpp`
--
ALTER TABLE `t_rpp`
  MODIFY `id_rpp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_siswa`
--
ALTER TABLE `t_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_kelas`
--
ALTER TABLE `t_kelas`
  ADD CONSTRAINT `t_kelas_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `t_jurusan` (`id_jurusan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `t_kelas_ibfk_2` FOREIGN KEY (`id_wali_kelas`) REFERENCES `t_guru` (`id_guru`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `t_siswa`
--
ALTER TABLE `t_siswa`
  ADD CONSTRAINT `t_siswa_ibfk_1` FOREIGN KEY (`id_pendaftaran`) REFERENCES `t_ppdb` (`id_pendaftaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_siswa_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `t_kelas` (`id_kelas`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
