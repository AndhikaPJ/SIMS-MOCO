-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22 Des 2021 pada 02.13
-- Versi Server: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_monitoring_subkon`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `armada`
--

CREATE TABLE `armada` (
  `id_armada` int(11) NOT NULL,
  `nama_armada` varchar(100) NOT NULL,
  `jenis_pengangkutan` varchar(100) NOT NULL,
  `tanggal_komisioning` date NOT NULL,
  `no_plat` varchar(60) NOT NULL,
  `no_rangka_mesin` varchar(100) NOT NULL,
  `foto_armada` text NOT NULL,
  `berat_kosongan` int(11) NOT NULL,
  `nomor_unit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `armada`
--

INSERT INTO `armada` (`id_armada`, `nama_armada`, `jenis_pengangkutan`, `tanggal_komisioning`, `no_plat`, `no_rangka_mesin`, `foto_armada`, `berat_kosongan`, `nomor_unit`) VALUES
(1, 'garuda', 'hauling', '2021-12-20', '41141', '5465756', 'a5946fef9cd80eb9fd23f35b430859eb.jpg', 1000, 'BH731');

-- --------------------------------------------------------

--
-- Struktur dari tabel `arsip_dokumen`
--

CREATE TABLE `arsip_dokumen` (
  `id_arsip_dokumen` int(11) NOT NULL,
  `nama_dokumen` varchar(100) NOT NULL,
  `nomor_dokumen` varchar(30) NOT NULL,
  `tanggal_dokumen` date NOT NULL,
  `file_dokumen` text NOT NULL,
  `keterangan` text NOT NULL,
  `status_dokumen` varchar(30) NOT NULL,
  `id_vendor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `arsip_dokumen`
--

INSERT INTO `arsip_dokumen` (`id_arsip_dokumen`, `nama_dokumen`, `nomor_dokumen`, `tanggal_dokumen`, `file_dokumen`, `keterangan`, `status_dokumen`, `id_vendor`) VALUES
(1, 'dokumen history pembelian sekolah ', '42513', '2021-12-20', 'fc201e81fc2a42bcdbe8e6ce4377ff47.png', '', 'ON PROGRESS', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_simper`
--

CREATE TABLE `pengajuan_simper` (
  `id_pengajuan_simper` int(11) NOT NULL,
  `id_sopir` int(11) NOT NULL,
  `jenis_simper` varchar(100) NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `masa_berlaku` date NOT NULL,
  `nomor_sim` varchar(100) NOT NULL,
  `status_pengajuan` varchar(40) NOT NULL,
  `keterangan_admin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengajuan_simper`
--

INSERT INTO `pengajuan_simper` (`id_pengajuan_simper`, `id_sopir`, `jenis_simper`, `tanggal_pengajuan`, `masa_berlaku`, `nomor_sim`, `status_pengajuan`, `keterangan_admin`) VALUES
(1, 1, 'BARU', '2021-12-20', '2022-02-20', '6524134455466', 'DITERIMA', ''),
(2, 1, 'PERPANJANG', '2021-12-20', '0000-00-00', '976876768', 'DITERIMA', ''),
(4, 1, 'PERPANJANG', '2021-12-21', '0000-00-00', '656757', 'DITOLAK', 'berkas salah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` text NOT NULL,
  `jabatan` text NOT NULL,
  `no_hp` varchar(22) NOT NULL,
  `level` varchar(20) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `nama_lengkap`, `jabatan`, `no_hp`, `level`, `date_create`, `email`) VALUES
(1, 'Admin', '$2y$10$cf7LwPCMmk1HU2DyISIehurelPrrQiFDA.QiBoF8HtxwtHBjIZN0K', 'Andika Prima Jaya', 'Banjarmasin', '08123123123123', 'Administrator', '2021-11-19 00:11:27', 'andikaprimajaya@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksi`
--

CREATE TABLE `produksi` (
  `id_produksi` int(11) NOT NULL,
  `no_tiket` varchar(100) NOT NULL,
  `jenis_pengangkutan` varchar(50) NOT NULL,
  `shift` varchar(100) NOT NULL,
  `id_sopir` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `jam_keluar` time NOT NULL,
  `berat_kotor` int(11) NOT NULL,
  `berat_bersih` int(11) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `jam_validasi` time NOT NULL,
  `tanggal_validasi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produksi`
--

INSERT INTO `produksi` (`id_produksi`, `no_tiket`, `jenis_pengangkutan`, `shift`, `id_sopir`, `tanggal_masuk`, `jam_masuk`, `tanggal_keluar`, `jam_keluar`, `berat_kotor`, `berat_bersih`, `lokasi`, `jam_validasi`, `tanggal_validasi`) VALUES
(1, 'WB00-14/12/00048', 'hauling', '6:30 - 18:00', 1, '2021-12-20', '10:00:00', '2021-12-21', '11:00:00', 3000, 2000, 'Sei Putting KPP-BGM', '03:07:00', '2021-12-21 06:40:13'),
(3, 'WB00-14/12/87193', 'hauling', '6:30 - 18:00', 1, '2021-12-20', '10:00:00', '2021-12-20', '11:00:00', 80001, 79001, 'Sei Putting H3254', '10:00:00', '2021-12-21 06:43:16'),
(4, 'WB00-14/12/87193', 'hauling', '6:30 - 18:00', 1, '2021-12-21', '10:00:00', '2021-12-21', '22:00:00', 20000, 19000, 'Sei Putting KPP-BGM', '10:00:00', '2021-12-22 00:02:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sopir`
--

CREATE TABLE `sopir` (
  `id_sopir` int(11) NOT NULL,
  `id_armada` int(11) NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `nik` varchar(40) NOT NULL,
  `nama_sopir` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `jenis_sim` varchar(100) NOT NULL,
  `posisi` varchar(100) NOT NULL,
  `foto_sopir` text NOT NULL,
  `foto_ktp` text NOT NULL,
  `foto_sim` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sopir`
--

INSERT INTO `sopir` (`id_sopir`, `id_armada`, `id_vendor`, `nik`, `nama_sopir`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_hp`, `jenis_sim`, `posisi`, `foto_sopir`, `foto_ktp`, `foto_sim`) VALUES
(1, 1, 2, '876313176431', 'Jali', 'tapin', '2021-12-20', 'jl semangat', '08409831094', 'SIM C', 'PJO', 'ad7bef5a7f789d4af50c955ad1bf786c.png', '7cd4797a3f2f10bde46e11800a539349.png', 'faf932a62e0dfe7d9a192dc6964e63f1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `target_produksi`
--

CREATE TABLE `target_produksi` (
  `id_target_produksi` int(11) NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `volume_bulanan` int(11) NOT NULL,
  `jumlah_hari` int(11) NOT NULL,
  `id_vendor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `target_produksi`
--

INSERT INTO `target_produksi` (`id_target_produksi`, `bulan`, `volume_bulanan`, `jumlah_hari`, `id_vendor`) VALUES
(1, 'Januari', 10000, 41, 2),
(2, 'Februari', 90000, 30, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor`
--

CREATE TABLE `vendor` (
  `id_vendor` int(11) NOT NULL,
  `nama_vendor` varchar(100) NOT NULL,
  `alamat_vendor` text NOT NULL,
  `pemilik` varchar(100) NOT NULL,
  `no_telp_vendor` varchar(30) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `jumlah_aktual_unit_komisioning` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `vendor`
--

INSERT INTO `vendor` (`id_vendor`, `nama_vendor`, `alamat_vendor`, `pemilik`, `no_telp_vendor`, `username`, `password`, `jumlah_aktual_unit_komisioning`) VALUES
(2, 'CV bersama', 'Banjarmasin', 'Udin', '0831749318', 'udin', '$2y$10$OGNemlEONFNo1NPYdTy6WORyjiXBpSWeFlmWP7qrs2enPyqXsGMWa', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `armada`
--
ALTER TABLE `armada`
  ADD PRIMARY KEY (`id_armada`);

--
-- Indexes for table `arsip_dokumen`
--
ALTER TABLE `arsip_dokumen`
  ADD PRIMARY KEY (`id_arsip_dokumen`),
  ADD KEY `id_vendor` (`id_vendor`);

--
-- Indexes for table `pengajuan_simper`
--
ALTER TABLE `pengajuan_simper`
  ADD PRIMARY KEY (`id_pengajuan_simper`),
  ADD KEY `id_sopir` (`id_sopir`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id_produksi`),
  ADD KEY `id_sopir` (`id_sopir`);

--
-- Indexes for table `sopir`
--
ALTER TABLE `sopir`
  ADD PRIMARY KEY (`id_sopir`),
  ADD KEY `id_armada` (`id_armada`,`id_vendor`),
  ADD KEY `id_vendor` (`id_vendor`);

--
-- Indexes for table `target_produksi`
--
ALTER TABLE `target_produksi`
  ADD PRIMARY KEY (`id_target_produksi`),
  ADD KEY `id_vendor` (`id_vendor`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id_vendor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `armada`
--
ALTER TABLE `armada`
  MODIFY `id_armada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `arsip_dokumen`
--
ALTER TABLE `arsip_dokumen`
  MODIFY `id_arsip_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pengajuan_simper`
--
ALTER TABLE `pengajuan_simper`
  MODIFY `id_pengajuan_simper` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id_produksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sopir`
--
ALTER TABLE `sopir`
  MODIFY `id_sopir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `target_produksi`
--
ALTER TABLE `target_produksi`
  MODIFY `id_target_produksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id_vendor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `arsip_dokumen`
--
ALTER TABLE `arsip_dokumen`
  ADD CONSTRAINT `arsip_dokumen_ibfk_1` FOREIGN KEY (`id_vendor`) REFERENCES `vendor` (`id_vendor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
