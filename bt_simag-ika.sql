-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26 Jul 2020 pada 11.07
-- Versi Server: 10.1.32-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bt_simag-ika`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_aspek`
--

CREATE TABLE `tbl_aspek` (
  `id_aspek` int(4) NOT NULL,
  `id_instansi` varchar(15) NOT NULL,
  `nama_aspek` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_aspek`
--

INSERT INTO `tbl_aspek` (`id_aspek`, `id_instansi`, `nama_aspek`, `keterangan`, `date_created`) VALUES
(1, '3424532542', 'Kedisiplinan', 'lorem ipsum dolor sit amer', '2020-07-25 07:01:14'),
(4, '3424532542', 'Kerapian', 'lorem', '2020-07-25 09:37:42'),
(5, '3424532542', 'Produktivitas', 'Adakah', '2020-07-25 09:37:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_instansi`
--

CREATE TABLE `tbl_instansi` (
  `id_instansi` varchar(15) NOT NULL,
  `username_instansi` varchar(100) NOT NULL,
  `nama_instansi` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_instansi`
--

INSERT INTO `tbl_instansi` (`id_instansi`, `username_instansi`, `nama_instansi`, `password`, `is_active`, `date_created`) VALUES
('3424532542', 'perikanan', 'Dinas Perikanan', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 1, '2020-07-12'),
('95682471694732', 'kesekretariatan', 'Kesekretariatan', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_konfigurasi`
--

CREATE TABLE `tbl_konfigurasi` (
  `id_konfigurasi` int(1) NOT NULL,
  `nama_aplikasi` varchar(100) NOT NULL,
  `nama_pimpinan` varchar(100) NOT NULL,
  `provinsi` varchar(128) NOT NULL,
  `kabupaten` varchar(128) NOT NULL,
  `kecamatan` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `kontak_person` varchar(20) NOT NULL,
  `stok_min` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_konfigurasi`
--

INSERT INTO `tbl_konfigurasi` (`id_konfigurasi`, `nama_aplikasi`, `nama_pimpinan`, `provinsi`, `kabupaten`, `kecamatan`, `alamat`, `kontak_person`, `stok_min`) VALUES
(1, 'Inventory Barang', 'Waddah', 'Sulawesi Selatan', 'Makassar', 'Manggala', 'jl. Dg. Hayo', '085298730727', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_logbook`
--

CREATE TABLE `tbl_logbook` (
  `id_logbook` int(11) NOT NULL,
  `id_peserta` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_dari` time NOT NULL,
  `waktu_sampai` time NOT NULL,
  `aktifitas` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_logbook`
--

INSERT INTO `tbl_logbook` (`id_logbook`, `id_peserta`, `tanggal`, `waktu_dari`, `waktu_sampai`, `aktifitas`, `date_created`) VALUES
(1, '170835626403919', '2020-07-18', '07:35:00', '10:38:00', 'lorem', '2020-07-18 07:35:24'),
(2, '170835626403919', '2020-07-14', '05:02:00', '06:04:00', 'adakah Lorem ipsum dolor asas', '2020-07-20 02:59:49'),
(3, '170835626403919', '2020-07-20', '06:11:00', '03:13:00', 'lorem ipsum dolor', '2020-07-20 03:12:00'),
(4, '170835626403919', '2020-07-20', '04:20:00', '06:22:00', 'ajg', '2020-07-20 03:18:42'),
(5, '170835626403919', '2020-07-20', '03:22:00', '07:24:00', 'jun', '2020-07-20 03:19:20'),
(8, '170835626403919', '2020-07-20', '05:30:00', '05:30:00', 'sdad', '2020-07-20 03:27:54'),
(9, '170835626403919', '2020-07-20', '08:11:00', '09:12:00', '<ul><li>Adakah</li><li>ada dong</li></ul>', '2020-07-20 08:09:51'),
(10, '170835626403919', '2020-07-21', '08:13:00', '08:12:00', '<ol><li><em>dfgfdhg</em></li><li><em>asf</em></li><li><em>dfs</em></li><li><em>dsf</em></li><li><em>sdg</em></li></ol>', '2020-07-20 08:10:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pekerjaan`
--

CREATE TABLE `tbl_pekerjaan` (
  `id_pekerjaan` varchar(15) NOT NULL,
  `id_instansi` varchar(15) NOT NULL,
  `nama_pekerjaan` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penilaian`
--

CREATE TABLE `tbl_penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_peserta` varchar(15) NOT NULL,
  `id_aspek` varchar(20) NOT NULL,
  `nilai` int(3) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_penilaian`
--

INSERT INTO `tbl_penilaian` (`id_penilaian`, `id_peserta`, `id_aspek`, `nilai`, `date_created`) VALUES
(2, '170835626403919', '1', 98, '2020-07-26 02:14:57'),
(3, '170835626403919', '4', 89, '2020-07-26 02:14:57'),
(4, '170835626403919', '5', 88, '2020-07-26 02:14:57'),
(5, '1241234', '1', 21, '2020-07-26 03:35:20'),
(6, '1241234', '4', 22, '2020-07-26 03:35:20'),
(7, '1241234', '5', 24, '2020-07-26 03:35:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_peserta`
--

CREATE TABLE `tbl_peserta` (
  `id_peserta` varchar(15) NOT NULL,
  `id_instansi` varchar(15) NOT NULL,
  `username_peserta` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(225) NOT NULL,
  `namalengkap` varchar(20) NOT NULL,
  `motto` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `asal_instansi` varchar(100) NOT NULL,
  `gambar` text NOT NULL,
  `pembimbing` varchar(200) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '1',
  `is_accept` int(1) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_peserta`
--

INSERT INTO `tbl_peserta` (`id_peserta`, `id_instansi`, `username_peserta`, `email`, `password`, `namalengkap`, `motto`, `tgl_lahir`, `tempat_lahir`, `jenis_kelamin`, `alamat`, `nohp`, `asal_instansi`, `gambar`, `pembimbing`, `is_active`, `is_accept`, `date_created`) VALUES
('1241234', '3424532542', 'salam', '', 'password', '', 'lorem ipsum dolor', '2020-07-13', 'Gowa', 'L', 'jl. Pallangga', '0151551121', '', '', '', 1, 0, '2020-07-13 01:47:53'),
('170835626403919', '3424532542', 'rezki', 'rezki@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Rezki', '                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Debitis accusantium temporibus, ut fugiat repudiandae unde obcaecati sint ea doloremque voluptate numquam nam dicta tenetur deleniti dignissimos deserunt consequuntur? Incidunt, sunt.\r\n                            ', '0000-00-00', '', 'L', 'Jl. Dg. Hayo', '021525521', 'UNM', './assets/uploads/images/assa_nulis.jpg', '', 1, 0, '2020-07-13 03:36:41'),
('879436752130059', '95682471694732', 'risal', 'risal@gmail.comm', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Muhammad Risal', 'Menjadi tangguh harus dengan mewujudkan diri', '0000-00-00', '', 'L', 'Jl. Dg. Hayo', '2161005511', 'UNM', './assets/uploads/images/udin.jpg', '', 1, 0, '2020-07-23 02:45:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_satuan_waktu`
--

CREATE TABLE `tbl_satuan_waktu` (
  `id_satuan_waktu` varchar(20) NOT NULL,
  `id_user` int(15) NOT NULL,
  `nama_satuan_waktu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_surat`
--

CREATE TABLE `tbl_surat` (
  `id_surat` int(11) NOT NULL,
  `id_instansi` int(15) NOT NULL,
  `instansi_asal` varchar(100) NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `dokumen` varchar(100) NOT NULL,
  `is_read` int(1) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_surat`
--

INSERT INTO `tbl_surat` (`id_surat`, `id_instansi`, `instansi_asal`, `kontak`, `deskripsi`, `dokumen`, `is_read`, `date_created`) VALUES
(1, 2147483647, 'SMKN 1 Karossa', '085298730727', '<p>Lorem ipsummm</p>', './assets/uploads/surat/cetak_buktipdf1.pdf', 0, '2020-07-22 02:05:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` enum('Admin','User','Instansi') NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `email`, `image`, `password`, `role`, `is_active`, `date_created`) VALUES
(1, 'Aswar Kasim', 'aswarkasim@gmail.com', 'default.jpg', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'User', 1, 1560694881),
(9, 'Admin', 'admin@gmail.com', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Admin', 0, 0),
(10, 'assa', 'assa@gmail.com', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Admin', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_aspek`
--
ALTER TABLE `tbl_aspek`
  ADD PRIMARY KEY (`id_aspek`);

--
-- Indexes for table `tbl_instansi`
--
ALTER TABLE `tbl_instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indexes for table `tbl_konfigurasi`
--
ALTER TABLE `tbl_konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `tbl_logbook`
--
ALTER TABLE `tbl_logbook`
  ADD PRIMARY KEY (`id_logbook`);

--
-- Indexes for table `tbl_pekerjaan`
--
ALTER TABLE `tbl_pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `tbl_peserta`
--
ALTER TABLE `tbl_peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `tbl_satuan_waktu`
--
ALTER TABLE `tbl_satuan_waktu`
  ADD PRIMARY KEY (`id_satuan_waktu`);

--
-- Indexes for table `tbl_surat`
--
ALTER TABLE `tbl_surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_aspek`
--
ALTER TABLE `tbl_aspek`
  MODIFY `id_aspek` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_konfigurasi`
--
ALTER TABLE `tbl_konfigurasi`
  MODIFY `id_konfigurasi` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_logbook`
--
ALTER TABLE `tbl_logbook`
  MODIFY `id_logbook` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_surat`
--
ALTER TABLE `tbl_surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
