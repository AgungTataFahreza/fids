-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21 Feb 2020 pada 09.23
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(1, 'bali.jpg', '0'),
(2, 'cloud.jpg', '0'),
(3, 'cloud2.jpg', '0'),
(4, 'cloud3.jpg', '0'),
(6, 'backg.png', '1'),
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
(2, 'HALLO ini running text ', '1'),
(3, 'contoh running txt yang panjang sekali sangat sangat panjang ya sangat panjang', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_angin`
--

CREATE TABLE `tabel_angin` (
  `id` varchar(255) NOT NULL,
  `angin_eng` varchar(255) DEFAULT NULL,
  `angin_indo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_angin`
--

INSERT INTO `tabel_angin` (`id`, `angin_eng`, `angin_indo`) VALUES
('E', 'East', 'Timur'),
('ENE', 'East-Northeast', 'Timur-Timur Laut'),
('ESE', 'East-Southeast', 'Timur Tenggara'),
('N', 'North', 'Utara'),
('NE', 'Northeast', 'Timur Laut'),
('NNE', 'North-Northeast', 'Utara-Timur Laut'),
('NNW', 'North-Northwest', 'Utara-Barat Laut'),
('NW', 'Northwest', 'Barat Laut'),
('S', 'South', 'Selatan'),
('SE', 'Southeast', 'Tenggara'),
('SSE', 'South-Southeast', 'Selatan-Tenggara'),
('SSW', 'South-Southwest', 'Selatan-Barat Daya'),
('SW', 'Southwest', 'Barat Daya'),
('VARIABLE', 'Fluctuate', 'Berubah-ubah'),
('W', 'West', 'Barat'),
('WNW', 'West-Northwest', 'Barat-Barat Laut'),
('WSW', 'West-Southwest', 'Barat-Barat Daya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_city`
--

CREATE TABLE `tabel_city` (
  `id_kota` int(11) NOT NULL,
  `nama_kota` varchar(255) DEFAULT NULL,
  `negara` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_city`
--

INSERT INTO `tabel_city` (`id_kota`, `nama_kota`, `negara`, `image`) VALUES
(1, 'Kuala Lumpur', 'Malaysia', 'kualalumpur.jpg'),
(3, 'Medan', 'Indonesia', 'medan.jpg'),
(4, 'Binjai', 'Indonesiaa', NULL),
(5, 'Aceh', 'Indonesia', NULL),
(6, 'Jakarta', 'Indonesia', 'monas.jpg'),
(7, 'makasar', 'Indonesia', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_cuaca`
--

CREATE TABLE `tabel_cuaca` (
  `id` int(11) NOT NULL,
  `cuaca_eng` varchar(255) DEFAULT NULL,
  `cuaca_indo` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_cuaca`
--

INSERT INTO `tabel_cuaca` (`id`, `cuaca_eng`, `cuaca_indo`, `gambar`) VALUES
(0, 'Clear Skies', 'Cerah', 'clear skies-'),
(1, 'Partly Cloudy', 'Cerah Berawan', 'partly cloudy-'),
(2, 'Partly Cloudy', 'Cerah Berawan', 'partly cloudy-'),
(3, 'Mostly Cloudy', 'Berawan', 'mostly cloudy-'),
(4, 'Overcast', 'Berawan Tebal', 'overcast-'),
(5, 'Haze', 'Udara Kabur', 'haze-'),
(10, 'Smoke', 'Asap', 'smoke-'),
(45, 'Fog', 'Kabut', 'fog-'),
(60, 'Light Rain', 'Hujan Ringan', 'light rain-'),
(61, 'Rain', 'Hujan Sedang', 'rain-'),
(63, 'Heavy Rain', 'Hujan Lebat', 'heavy rain-'),
(80, 'Isolated Shower', 'Hujan Lokal', 'isolated shower-'),
(95, 'Severe Thunderstorm', 'Hujan Petir', 'severe thunderstorms-'),
(97, 'Severe Thunderstorm', 'Hujan Petir', 'severe thunderstorms-'),
(100, 'Clear Skies', 'Cerah', 'clear skies-'),
(101, 'Partly Cloudy', 'Cerah Berawan', 'partly cloudy-'),
(102, 'Partly Cloudy', 'Cerah Berawan', 'partly cloudy-'),
(103, 'Mostly Cloudy', 'Berawan', 'mostly cloudy-'),
(104, 'Overcast', 'Berawan Tebal', 'overcast-');

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
(4, 'Garuda Indonesia', 'cd3f3d42593149_57d126c7e7c54.png'),
(5, 'Citilink', 'citilink-1546842649.jpg'),
(6, 'Batik Air', 'logo-batik-air-png-batik-air-airline-clipart-275da619130fb29d.png');

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
(3, 'baling.png', 'testt');

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
  `flight_number` varchar(255) DEFAULT NULL,
  `id_city` varchar(255) NOT NULL,
  `hari` varchar(255) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `est` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `gate` varchar(255) DEFAULT NULL,
  `status_gate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_keberangkatan`
--

INSERT INTO `tabel_keberangkatan` (`id`, `id_flight`, `flight_number`, `id_city`, `hari`, `waktu`, `est`, `remark`, `status`, `gate`, `status_gate`) VALUES
(353, '3', '202', '6', '2', '05:05', NULL, '16', '0', NULL, '2'),
(354, '3', '202', '6', '3', '12:12', '', '2', '0', NULL, '0'),
(355, '3', '202', '6', '4', '13:13', '', '2', '1', NULL, '0'),
(358, '1', '6969', '2', '1', '13:00', '', '2', '0', NULL, '0'),
(359, '1', '6969', '2', '2', '16:00', '', '2', '0', NULL, '1'),
(360, '1', '6969', '2', '5', '20:00', '', '2', '0', NULL, '0'),
(361, '1', 'JKT - 48', '6', '1', '12:00', '', '2', '0', NULL, '0'),
(362, '1', 'JKT - 48', '6', '2', '15:00', '', '2', '0', NULL, '2'),
(363, '1', 'JKT - 48', '6', '3', '12:20', '', '2', '0', NULL, '0'),
(364, '1', 'JKT - 48', '6', '4', '17:30', '', '2', '2', NULL, '0'),
(365, '1', 'JKT - 48', '6', '5', '03:00', '', '2', '0', NULL, '0'),
(366, '1', 'JKT - 48', '6', '6', '12:00', '', '2', '0', NULL, '0'),
(367, '1', 'JKT - 48', '6', '0', '12:00', '', '2', '0', NULL, '0'),
(368, '1', 'AA 2020', '1', '1', '12:00', '', '2', '0', NULL, '0'),
(369, '1', 'AA 2020', '1', '2', '15:00', '', '2', '0', NULL, NULL),
(370, '1', 'AA 2020', '1', '3', '12:00', '', '2', '0', NULL, '0'),
(371, '1', 'AA 2020', '1', '4', '17:20', '', '2', '1', NULL, '0'),
(372, '1', 'AA 2020', '1', '5', '12:00', '', '2', '0', NULL, '0'),
(373, '1', 'AA 2020', '1', '6', '12:00', '', '2', '0', NULL, '0'),
(374, '1', 'AA 2020', '1', '0', '12:00', '', '2', '0', NULL, '0'),
(375, '5', 'CT 1234', '3', '4', '20:00', '', '2', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_kedatangan`
--

CREATE TABLE `tabel_kedatangan` (
  `id` int(11) NOT NULL,
  `id_flight` varchar(255) NOT NULL,
  `flight_number` varchar(255) DEFAULT NULL,
  `id_city` varchar(255) NOT NULL,
  `hari` varchar(255) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `est` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_kedatangan`
--

INSERT INTO `tabel_kedatangan` (`id`, `id_flight`, `flight_number`, `id_city`, `hari`, `waktu`, `est`, `remark`, `status`) VALUES
(21, '2', '8080', '1', '5', '03:00', NULL, '11', '0'),
(26, '5', '202', '3', '1', '10:00', '', '9', '1'),
(27, '5', '202', '3', '2', '12:00', NULL, '17', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_log`
--

CREATE TABLE `tabel_log` (
  `id` int(255) NOT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `nama_penerbangan` varchar(255) DEFAULT NULL,
  `no_penerbangan` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `jadwal` varchar(255) DEFAULT NULL,
  `est` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_log`
--

INSERT INTO `tabel_log` (`id`, `tanggal`, `jenis`, `nama_penerbangan`, `no_penerbangan`, `kota`, `jadwal`, `est`, `keterangan`) VALUES
(16, '2019-12-02 12:21:17', 'keberangkatan', 'Air Asia', '1', 'Kuala Lumpur', '12:00', '', '2'),
(17, '2019-12-02 12:44:39', 'keberangkatan', 'Air Asia', '1', 'Kuala Lumpur', '12:00', '', '1'),
(18, '2019-12-02 12:53:37', 'keberangkatan', 'Air Asia', '1', 'Kuala Lumpur', '12:00', '14:00', '1'),
(19, '2019-12-02 12:57:41', 'keberangkatan', 'Air Asia', '1', 'Kuala Lumpur', '12:00', '14:00', '1'),
(20, '2019-12-02 01:01:19', 'keberangkatan', 'Air Asia', '1', 'Kuala Lumpur', '12:00', '', '2'),
(21, '2019-12-02 01:01:48', 'keberangkatan', 'Air Asia', '1', 'Kuala Lumpur', '12:00', '14:00', '1'),
(22, '2019-12-02 01:03:07', 'keberangkatan', 'Air Asia', '1', 'Kuala Lumpur', '12:00', NULL, '2'),
(23, '2019-12-02 01:06:30', 'kedatangan', 'Citilink', '202', 'Medan', NULL, '07:00', '10'),
(24, '2019-12-02 01:09:40', 'kedatangan', 'Citilink', '202', 'Medan', '05:05', '07:00', '10'),
(25, '2019-12-02 01:09:54', 'kedatangan', 'Citilink', '202', 'Medan', '05:05', NULL, '9'),
(26, '2019-12-02 01:18:06', 'keberangkatan', 'Air Asia', '1', 'Kuala Lumpur', '12:00', '14:00', '1'),
(27, '2019-12-02 11:17:00', 'keberangkatan', 'Air Asia', '6969', 'Putra Jaya', '01:01', NULL, '3'),
(28, '2019-12-02 11:25:45', 'keberangkatan', 'Air Asia', '6969', 'Putra Jaya', '01:01', NULL, '2'),
(29, '2019-12-02 11:26:10', 'kedatangan', 'Citilink', '202', 'Medan', '12:00', NULL, '9'),
(30, '2019-12-02 11:35:49', 'kedatangan', 'Citilink', '202', 'Medan', '12:00', NULL, '11'),
(31, '2019-12-02 11:46:01', 'kedatangan', 'Citilink', '202', 'Medan', '12:00', NULL, '9'),
(32, '2019-12-02 11:47:08', 'kedatangan', 'Citilink', '202', 'Medan', '12:00', NULL, '9'),
(33, '2019-12-02 11:47:31', 'kedatangan', 'Citilink', '202', 'Medan', '12:00', '13:00', '10'),
(34, '2019-12-02 11:48:06', 'kedatangan', 'Citilink', '202', 'Medan', '12:00', NULL, '9'),
(35, '2019-12-02 11:48:27', 'keberangkatan', 'Air Asia', '1', 'Kuala Lumpur', '12:00', NULL, '3'),
(36, '2019-12-03 01:43:37', 'keberangkatan', 'Air Asia', '2020', 'Medan', '15:00', NULL, '4'),
(37, '2019-12-03 02:30:16', 'kedatangan', 'Citilink', '202', 'Medan', '12:00', NULL, '12'),
(38, '2019-12-03 03:58:45', 'keberangkatan', 'Garuda', '202', 'Jakarta', '05:05', NULL, '16'),
(39, '2019-12-03 04:01:47', 'kedatangan', 'Citilink', '202', 'Medan', '12:00', NULL, '17'),
(40, '2019-12-03 04:06:31', 'keberangkatan', 'Air Asia', '6969', 'Putra Jaya', '02:02', NULL, '18'),
(41, '2020-02-03 11:57:50', 'keberangkatan', 'Air Asia', '1', 'Kuala Lumpur', '12:00', NULL, '3'),
(42, '2020-02-03 12:40:31', 'keberangkatan', 'Air Asia', '1', 'Kuala Lumpur', '12:00', NULL, '3'),
(43, '2020-02-03 12:40:44', 'keberangkatan', 'Air Asia', '1', 'Kuala Lumpur', '12:00', NULL, '3'),
(44, '2020-02-04 04:49:15', 'kedatangan', 'Citilink', '202', 'Medan', '12:00', NULL, '17'),
(45, '2020-02-04 04:52:27', 'keberangkatan', 'Air Asia', '2020', 'Medan', '15:00', NULL, '4'),
(46, '2020-02-06 03:35:43', 'keberangkatan', 'Air Asia', '2020', 'Medan', '17:20', NULL, '2'),
(47, '2020-02-17 01:21:44', 'keberangkatan', 'Air Asia', 'AA 2020', 'Medan', '12:00', NULL, '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_status`
--

CREATE TABLE `tabel_status` (
  `id` int(11) NOT NULL,
  `status_indo` varchar(255) DEFAULT NULL,
  `status_english` varchar(255) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `warna` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_status`
--

INSERT INTO `tabel_status` (`id`, `status_indo`, `status_english`, `jenis`, `warna`) VALUES
(1, 'TERLAMBAT', 'DELAY', 'Keberangkatan', NULL),
(2, 'JADWAL', 'SCHEDULE', 'Keberangkatan', NULL),
(3, 'MENDAFTAR', 'CHECK IN', 'Keberangkatan', NULL),
(4, 'KE RUANG TUNGGU', 'WAITING ROOM', 'Keberangkatan', NULL),
(5, 'LAPOR TIKET', 'BOARDING', 'Keberangkatan', NULL),
(6, 'PANGGILAN KEDUA', 'SECOND CALL', 'Keberangkatan', NULL),
(7, 'PANGGILAN TERAKHIR', 'FINAL CALL', 'Keberangkatan', NULL),
(8, 'DIBATALKAN', 'CANCEL', 'Keberangkatan', NULL),
(9, 'JADWAL', 'SCHEDULE', 'Kedatangan', NULL),
(10, 'TERLAMBAT', 'DELAY', 'Kedatangan', NULL),
(11, 'MENDARAT', 'LANDING', 'Kedatangan', NULL),
(12, 'DIBATALKAN', 'CANCEL', 'Kedatangan', NULL),
(16, 'MENDAFTAR LOKET 1', 'CHECK IN COUNTER 1', 'Keberangkatan', NULL),
(17, 'BAGASI CONVEYOR 1', 'BAGGAGE CONVEYOR 1', 'Kedatangan', NULL),
(18, 'MENDAFTAR LOKET 2', 'CHECK IN COUNTER 2', 'Keberangkatan', NULL);

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
(1, 'SUPERADMIN', 'webadmin', '$2y$10$Q0iUG1ia26JaJD2y6lAtXu0Pxa3meuJeySxxm3B8qLJW4LQvrtZMW', 'SuperAdmin', NULL),
(2, 'SUPERADMIN', 'adminfids', '$2y$10$2dqfZDdTd88ZHqND.eXSXOXYQSbscXxBtHK8YyrRmKGuewIz9gfiC', 'SuperAdmin', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `running_text`
--
ALTER TABLE `running_text`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tabel_angin`
--
ALTER TABLE `tabel_angin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_city`
--
ALTER TABLE `tabel_city`
  ADD PRIMARY KEY (`id_kota`) USING BTREE;

--
-- Indexes for table `tabel_cuaca`
--
ALTER TABLE `tabel_cuaca`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_flight`
--
ALTER TABLE `tabel_flight`
  ADD PRIMARY KEY (`id_penerbangan`) USING BTREE;

--
-- Indexes for table `tabel_iklan`
--
ALTER TABLE `tabel_iklan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_interval`
--
ALTER TABLE `tabel_interval`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_keberangkatan`
--
ALTER TABLE `tabel_keberangkatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_kedatangan`
--
ALTER TABLE `tabel_kedatangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_log`
--
ALTER TABLE `tabel_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_status`
--
ALTER TABLE `tabel_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`id_login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `running_text`
--
ALTER TABLE `running_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tabel_city`
--
ALTER TABLE `tabel_city`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tabel_flight`
--
ALTER TABLE `tabel_flight`
  MODIFY `id_penerbangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tabel_iklan`
--
ALTER TABLE `tabel_iklan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tabel_keberangkatan`
--
ALTER TABLE `tabel_keberangkatan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=376;
--
-- AUTO_INCREMENT for table `tabel_kedatangan`
--
ALTER TABLE `tabel_kedatangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tabel_log`
--
ALTER TABLE `tabel_log`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `tabel_status`
--
ALTER TABLE `tabel_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id_login` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
