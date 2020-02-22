-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Nov 2019 pada 10.37
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fids`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(2) NOT NULL,
  `judul_gambar` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `judul_gambar`, `status`) VALUES
(1, 'bali.jpg', '1'),
(2, 'cloud.jpg', '0'),
(3, 'cloud2.jpg', '0'),
(4, 'cloud3.jpg', '0'),
(6, 'backg.png', '0'),
(7, 'vunature_com-mountains-alps-switzerland-dawn-sunrise-stunning-nature-desktop-backgrounds.jpg', '0'),
(8, 'ubuntu-18_04-default-wallpaper-2.jpg', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `running_text`
--

CREATE TABLE `running_text` (
  `id` int(11) NOT NULL,
  `text` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `running_text`
--

INSERT INTO `running_text` (`id`, `text`, `status`) VALUES
(2, 'ini running text juga', '1'),
(3, 'ini contoh running txt yang panjang sekali sangat sangat panjang ya sangat panjang', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_city`
--

CREATE TABLE `tabel_city` (
  `id_kota` int(11) NOT NULL,
  `nama_kota` varchar(255) DEFAULT NULL,
  `negara` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_city`
--

INSERT INTO `tabel_city` (`id_kota`, `nama_kota`, `negara`) VALUES
(1, 'Kuala Lumpur', 'Malaysia'),
(2, 'Putra Jaya', 'Malaysia'),
(3, 'Medan', 'Indonesia'),
(4, 'Binjai', 'Indonesiaa'),
(5, 'Aceh', 'Indonesia'),
(6, 'Jakarta', 'Indonesia'),
(7, 'makasar', 'Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_flight`
--

CREATE TABLE `tabel_flight` (
  `id_penerbangan` int(11) NOT NULL,
  `nama_penerbangan` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_flight`
--

INSERT INTO `tabel_flight` (`id_penerbangan`, `nama_penerbangan`, `image`) VALUES
(1, 'Air Asia', 'airasia.jpg'),
(2, 'Lion Air', 'lion_air.jpg'),
(3, 'Garuda', '6_-Sunce-S_G-2D_56-350x300.png'),
(4, 'Garuda Indonesia', 'cd3f3d42593149_57d126c7e7c54.png'),
(5, 'Citilink', 'citilink-1546842649.jpg'),
(6, 'Batik Air', 'logo-batik-air-png-batik-air-airline-clipart-275da619130fb29d.png'),
(7, 'dummydummyboom', '6_-Sunce-S_G-2D_56-350x3002.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_iklan`
--

CREATE TABLE `tabel_iklan` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_iklan`
--

INSERT INTO `tabel_iklan` (`id`, `gambar`, `link`) VALUES
(1, '450400_(1).png', 'ubuntu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_interval`
--

CREATE TABLE `tabel_interval` (
  `id` int(11) NOT NULL,
  `interval` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_interval`
--

INSERT INTO `tabel_interval` (`id`, `interval`) VALUES
(1, 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_keberangkatan`
--

CREATE TABLE `tabel_keberangkatan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_flight` varchar(255) NOT NULL,
  `flight_number` int(11) DEFAULT NULL,
  `id_city` varchar(255) NOT NULL,
  `hari` varchar(255) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `est` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_keberangkatan`
--

INSERT INTO `tabel_keberangkatan` (`id`, `id_flight`, `flight_number`, `id_city`, `hari`, `waktu`, `est`, `remark`) VALUES
(217, '1', 1, '1', '1', '12:00', '', NULL),
(218, '1', 1, '1', '2', '15:00', '', NULL),
(219, '1', 1, '1', '3', '12:00', '', NULL),
(220, '1', 1, '1', '4', '17:30', '', NULL),
(221, '1', 1, '1', '5', '12:00', '', NULL),
(222, '1', 1, '1', '6', '12:00', '', NULL),
(223, '1', 1, '1', '0', '12:00', '', NULL),
(224, '1', 2020, '3', '1', '12:00', '', NULL),
(225, '1', 2020, '3', '2', '15:00', '', NULL),
(226, '1', 2020, '3', '3', '12:00', '', NULL),
(227, '1', 2020, '3', '4', '17:20', '', NULL),
(228, '1', 2020, '3', '5', '12:00', '', NULL),
(229, '1', 2020, '3', '6', '12:00', '', NULL),
(230, '1', 2020, '3', '0', '12:00', '', NULL),
(231, '1', 6969, '2', '1', '13:00', '', NULL),
(232, '1', 6969, '2', '2', '15:00', '', NULL),
(233, '1', 6969, '2', '3', '02:00', '', NULL),
(234, '1', 6969, '2', '4', '17:15', '', NULL),
(235, '1', 6969, '2', '5', '04:00', '', NULL),
(236, '1', 6969, '2', '6', '17:00', '', NULL),
(237, '1', 6969, '2', '0', '06:00', '', NULL),
(238, '1', 6969, '2', '1', '13:00', '', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_kedatangan`
--

CREATE TABLE `tabel_kedatangan` (
  `id` int(11) NOT NULL,
  `id_flight` varchar(255) NOT NULL,
  `flight_number` int(11) DEFAULT NULL,
  `id_city` varchar(255) NOT NULL,
  `hari` varchar(255) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `est` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_kedatangan`
--

INSERT INTO `tabel_kedatangan` (`id`, `id_flight`, `flight_number`, `id_city`, `hari`, `waktu`, `est`, `remark`) VALUES
(19, '5', 202, '3', '2', '15:00', '', NULL),
(20, '2', 8080, '1', '2', '15:00', '', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_user`
--

CREATE TABLE `tabel_user` (
  `id_login` int(3) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_user`
--

INSERT INTO `tabel_user` (`id_login`, `nama`, `username`, `password`, `level`, `gambar`) VALUES
(1, 'SUPERADMIN', 'webadmin', '$2y$10$XgxUJ9EfAP0aJRB9Jbxr3uS4lFu0/PXHklVOPxsXH0foL2vYDx1se', 'SuperAdmin', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indeks untuk tabel `running_text`
--
ALTER TABLE `running_text`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `tabel_city`
--
ALTER TABLE `tabel_city`
  ADD PRIMARY KEY (`id_kota`) USING BTREE;

--
-- Indeks untuk tabel `tabel_flight`
--
ALTER TABLE `tabel_flight`
  ADD PRIMARY KEY (`id_penerbangan`) USING BTREE;

--
-- Indeks untuk tabel `tabel_iklan`
--
ALTER TABLE `tabel_iklan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_interval`
--
ALTER TABLE `tabel_interval`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_keberangkatan`
--
ALTER TABLE `tabel_keberangkatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_kedatangan`
--
ALTER TABLE `tabel_kedatangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`id_login`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `running_text`
--
ALTER TABLE `running_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tabel_city`
--
ALTER TABLE `tabel_city`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tabel_flight`
--
ALTER TABLE `tabel_flight`
  MODIFY `id_penerbangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tabel_iklan`
--
ALTER TABLE `tabel_iklan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tabel_keberangkatan`
--
ALTER TABLE `tabel_keberangkatan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT untuk tabel `tabel_kedatangan`
--
ALTER TABLE `tabel_kedatangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id_login` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
