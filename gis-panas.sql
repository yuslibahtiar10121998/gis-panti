-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Bulan Mei 2022 pada 18.40
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gis-panas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `wilayah_id` int(11) NOT NULL,
  `panas_id` int(11) DEFAULT NULL,
  `nama_admin` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `nomor_telepon` bigint(15) NOT NULL,
  `is_dinas` tinyint(1) NOT NULL,
  `password` varchar(40) NOT NULL,
  `username` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `wilayah_id`, `panas_id`, `nama_admin`, `email`, `nomor_telepon`, `is_dinas`, `password`, `username`) VALUES
(1, 1, NULL, 'admin kota', 'admin_kota@gmail.com', 628123456789, 1, '21232f297a57a5a743894a0e4a801fc3', 'admin_kota'),
(2, 2, NULL, 'admin kabupaten', 'admin_kabupaten@gmail.com', 628123456789, 1, '21232f297a57a5a743894a0e4a801fc3', 'admin_kabupaten'),
(3, 1, 1, 'Admin A', 'panti asuhan Ar-rahmah@gmail.com', 628123456789, 0, '21232f297a57a5a743894a0e4a801fc3', 'panti asuhan Ar-rahmah'),
(4, 1, 2, 'Admin B', 'yayasan rumah yatim santoaji@gmail.com', 628123456789, 0, '21232f297a57a5a743894a0e4a801fc3', 'yayasan rumah yatim santoaji'),
(5, 1, 3, 'Admin C', 'yayasan yatim piatu tunas harapan@gmail.com', 628123456789, 0, '21232f297a57a5a743894a0e4a801fc3', 'yayasan yatim piatu tunas harapan'),
(6, 1, 13, 'Admin D', 'panti asuhan welas asih@gmail.com', 628123456789, 0, '21232f297a57a5a743894a0e4a801fc3', 'panti asuhan welas asih'),
(7, 1, 14, 'Admin E', 'panti asuhan yatim Muhammadiyah', 628123456789, 0, '21232f297a57a5a743894a0e4a801fc3', 'panti asuhan yatim Muhammadiyah'),
(8, 1, 15, 'Admin F', 'Panti Asuhan Putri Aisyiyah Kota Tegal@gmail.com', 628123456789, 0, '21232f297a57a5a743894a0e4a801fc3', 'Panti Asuhan Putri Aisyiyah Kota Tegal'),
(9, 2, 18, 'Admin G', 'Panti Asuhan Yatim Muhammadiyah@gmail.com', 628123456789, 0, '21232f297a57a5a743894a0e4a801fc3', 'Panti Asuhan Yatim Muhammadiyah Kabupaten'),
(10, 2, 19, 'Admin H', 'Panti Asuhan Yatim Muhammadiyah Slawi@gmail.com', 628123456789, 0, '21232f297a57a5a743894a0e4a801fc3', 'Panti Asuhan Yatim Muhammadiyah Slawi'),
(11, 2, 20, 'Admin I', 'Panti Asuhan Muhammadiyah Margasari@mail.com', 628123456789, 0, '21232f297a57a5a743894a0e4a801fc3', 'Panti Asuhan Muhammadiyah Margasari'),
(12, 2, 21, 'Admin J', 'Panti Asuhan Darul Farroh@gmail.com', 628123456789, 0, '21232f297a57a5a743894a0e4a801fc3', 'Panti Asuhan Darul Farroh'),
(13, 2, 22, 'Admin K', 'Panti Asuhan Putri Aisyiyah Karanganyar@gmail.com', 628123456789, 0, '21232f297a57a5a743894a0e4a801fc3', 'Panti Asuhan Putri Aisyiyah Karanganyar'),
(14, 2, 23, 'Admin L', 'Panti Asuhan Yayasan Al Islah@gmail.com', 628123456789, 0, '21232f297a57a5a743894a0e4a801fc3', 'Panti Asuhan Yayasan Al Islah'),
(15, 2, 24, 'Admin M', 'Panti Asuhan Darul Aitam Wa Dhuafa@gmail.com', 628123456789, 0, '21232f297a57a5a743894a0e4a801fc3', 'Panti Asuhan Darul Aitam Wa Dhuafa'),
(16, 2, 25, 'Admin N', 'Rumah Yatim Bina Anak Sholeh@Gmail.com', 628123456789, 0, '21232f297a57a5a743894a0e4a801fc3', 'Rumah Yatim Bina Anak Sholeh'),
(17, 2, 26, 'Admin P', 'Panti Asuhan Manunggal@gmail.com', 628123456789, 0, '21232f297a57a5a743894a0e4a801fc3', 'Panti Asuhan Manunggal'),
(18, 2, 27, 'Admin S', 'Panti Asuhan Darul Yatama muslimat NU@gmail.com', 628123456789, 0, '21232f297a57a5a743894a0e4a801fc3', 'Panti Asuhan Darul Yatama muslimat NU');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_anak`
--

CREATE TABLE `tbl_anak` (
  `id_anak` int(5) NOT NULL,
  `panas_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `pendidikan_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `kelamin_id` int(11) NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL,
  `asal_tempat_lahir` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `umur` int(2) NOT NULL,
  `nama_lengkap_ibu` varchar(40) NOT NULL,
  `nama_lengkap_ayah` varchar(40) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_anak`
--

INSERT INTO `tbl_anak` (`id_anak`, `panas_id`, `kecamatan_id`, `pendidikan_id`, `status_id`, `kelamin_id`, `nama_lengkap`, `asal_tempat_lahir`, `tanggal_lahir`, `umur`, `nama_lengkap_ibu`, `nama_lengkap_ayah`, `gambar`) VALUES
(29, 1, 2, 1, 1, 1, 'Adam', 'slarang kidul', '2022-04-22', 12, 'diana', 'juned', ''),
(30, 1, 2, 2, 2, 2, 'Adhyastha', 'dukuh waru', '2022-04-21', 8, 'muriati', 'kayad', ''),
(31, 1, 2, 4, 3, 2, 'Ayla', 'slapura', '2015-06-01', 11, 'diah', 'jadi', ''),
(32, 1, 2, 2, 1, 1, 'Audrey', ' tembok', '2017-10-01', 12, 'tarmidi', 'm.husain', ''),
(33, 1, 2, 2, 1, 1, 'Alena', 'debong', '2021-08-04', 3, 'sentiana', 'khodimir', ''),
(34, 2, 2, 3, 1, 2, 'Bagas', 'dukuh waru', '2015-07-01', 17, 'surmi', 'hedi', ''),
(35, 2, 2, 4, 2, 2, 'Bastian', 'kalibakung', '2021-11-18', 2, 'rohan', 'dedi', ''),
(36, 2, 2, 3, 3, 1, 'Briana', 'dampyak', '2022-04-21', 16, 'rukhi', 'bambang', ''),
(37, 2, 2, 4, 3, 2, 'Beni', 'dampyak', '2022-04-08', 3, 'warina', 'sahrul', ''),
(38, 2, 2, 1, 2, 1, 'Bella', 'slerok', '2021-12-31', 6, 'dini', 'agus', ''),
(39, 3, 2, 4, 3, 2, 'Chaska', 'tegal timur', '2022-04-13', 2, 'jannah', 'wage', ''),
(40, 3, 2, 2, 1, 1, 'Celine', 'blubuk', '2022-04-01', 16, 'sonah', 'sepul', ''),
(41, 3, 2, 1, 2, 1, 'Casandra', 'slapura', '2020-07-23', 7, 'surni', 'dika', ''),
(42, 3, 2, 1, 2, 2, 'Celvin', 'slarang kidul', '2022-04-20', 6, 'indah', 'wawan', ''),
(43, 3, 2, 1, 2, 1, 'Candy', 'kambangan', '2022-01-06', 9, 'ina', 'darmadi', ''),
(44, 13, 2, 1, 3, 1, 'Dian', 'tegalsari', '2020-08-13', 8, 'imah', 'jiun', ''),
(45, 13, 2, 1, 3, 2, 'Deni', 'margasari', '2021-08-23', 7, 'hanisa', 'heri', ''),
(46, 13, 2, 2, 2, 2, 'Doni', 'slawi wetan', '2022-04-15', 12, 'hilda', 'wahab', ''),
(47, 13, 2, 2, 3, 2, 'Dendy', 'babakan', '2021-12-22', 13, 'tia', 'andi', ''),
(48, 13, 2, 2, 1, 1, 'Desi', 'banjaran', '2021-06-18', 12, 'wulan', 'idris', ''),
(49, 14, 2, 1, 3, 1, 'Emeline', 'tegal selatan', '2022-03-08', 8, 'siti', 'bagas', ''),
(50, 14, 2, 1, 2, 2, 'Eren', 'slarang kidul', '2021-02-19', 7, 'imah', 'denan', ''),
(51, 14, 2, 2, 3, 1, 'Ema', 'kalisapu', '2019-05-17', 13, 'lasri', 'sopyan', ''),
(52, 14, 2, 3, 3, 2, 'Edin', 'lebaksiu', '2022-01-26', 18, 'mina', 'barok', ''),
(53, 14, 2, 1, 1, 1, 'Esti', 'adiwerna', '2019-07-20', 8, 'wati', 'ilyas', ''),
(54, 15, 2, 1, 2, 2, 'Fariz', 'babakan', '2022-03-11', 7, 'dini', 'wahab', ''),
(55, 15, 2, 3, 3, 2, 'Farhan', 'tegal selatan', '2008-11-21', 14, 'alin', 'dani', ''),
(56, 15, 2, 1, 1, 2, 'Feri', 'kambangan', '2017-06-13', 9, 'linda', 'firdaus', ''),
(57, 15, 2, 3, 3, 2, 'Ferian', 'debong', '2020-10-30', 16, 'iis', 'pahruri', ''),
(58, 15, 2, 4, 2, 2, 'Fauzi', 'slarang lor', '2019-11-29', 4, 'imah', 'slamet', ''),
(59, 18, 6, 2, 2, 1, 'Gea', 'tegalsari', '2022-02-04', 12, 'hani', 'syukri', ''),
(60, 18, 6, 1, 1, 2, 'Galan', 'babakan', '2021-08-19', 8, 'puja', 'rizki', ''),
(61, 18, 6, 4, 3, 1, 'Gita', 'banjaran', '2020-11-05', 2, 'ikmah', 'kamto', ''),
(62, 18, 6, 4, 3, 2, 'Geri', 'Padegangan', '2021-11-17', 3, 'wahdah', 'jahan', ''),
(63, 18, 6, 4, 3, 2, 'Geri', 'Padegangan', '2021-11-17', 3, 'iin', 'soleh', ''),
(64, 19, 19, 2, 2, 2, 'Heri', 'semboja', '2016-10-26', 12, 'pitri', 'peri', ''),
(65, 19, 19, 3, 3, 1, 'Heni', 'margasari', '2021-02-10', 17, 'feni', 'carmad', ''),
(66, 19, 19, 4, 3, 1, 'Hani', 'talang', '2022-01-07', 3, 'tika', 'ulin', ''),
(67, 19, 19, 1, 2, 1, 'Helmi', 'babakan', '2021-05-03', 9, 'yusli', 'bahtiar', ''),
(68, 19, 19, 4, 2, 2, 'Haikal', 'tegal selatan', '2022-04-13', 4, 'yusli', 'bahtiar', ''),
(69, 20, 16, 1, 2, 1, 'Indah', 'banjaran', '2022-01-13', 10, 'yusli', 'bahtiar', ''),
(70, 20, 16, 1, 3, 1, 'Idah', 'tegalandong', '2021-11-19', 7, 'yusli', 'bahtiar', ''),
(71, 20, 16, 4, 3, 2, 'Idos', 'margadana', '2021-12-07', 3, 'yusli', 'bahtiar', ''),
(72, 20, 16, 1, 2, 1, 'Ismi', 'babakan', '2022-02-21', 8, 'yusli', 'bahtiar', ''),
(73, 20, 16, 2, 3, 2, 'Ibnu', 'kedung banteng', '2021-08-20', 13, 'yusli', 'bahtiar', ''),
(74, 21, 6, 2, 1, 2, 'Jerry', 'margasari', '2013-10-11', 13, 'yusli', 'bahtiar', ''),
(75, 21, 6, 2, 1, 2, 'Jean', 'Padegangan', '2021-09-01', 12, 'yusli', 'bahtiar', ''),
(76, 21, 6, 1, 3, 2, 'Jefri', 'kedawung', '2021-11-03', 7, 'yusli', 'bahtiar', ''),
(77, 21, 6, 1, 3, 2, 'Jojo', 'lebaksiu', '2021-04-15', 7, 'yusli', 'bahtiar', ''),
(78, 21, 6, 4, 3, 2, 'Jordi', 'margasari', '2022-03-10', 3, 'yusli', 'bahtiar', ''),
(79, 22, 10, 3, 3, 2, 'Khibar', 'tegal selatan', '2022-03-17', 16, 'yusli', 'bahtiar', ''),
(80, 22, 10, 2, 1, 2, 'Khodim', 'babakan', '2020-06-18', 12, 'yusli', 'bahtiar', ''),
(81, 22, 10, 2, 2, 1, 'Kumala', 'talang', '2020-10-21', 3, 'yusli', 'bahtiar', ''),
(82, 22, 10, 1, 2, 2, 'Khalid', 'Padegangan', '2015-09-12', 9, 'yusli', 'bahtiar', ''),
(83, 22, 10, 2, 3, 1, 'Kiki', 'bumijawa', '2020-02-14', 12, 'yusli', 'bahtiar', ''),
(84, 23, 14, 2, 2, 2, 'Labib', 'slarang kidul', '2021-10-14', 12, 'yusli', 'bahtiar', ''),
(85, 23, 14, 4, 3, 1, 'Lina', 'cacaban', '2022-03-03', 4, 'yusli', 'bahtiar', ''),
(86, 23, 14, 1, 2, 1, 'Leni', 'jembayat', '2015-02-04', 9, 'yusli', 'bahtiar', ''),
(87, 23, 14, 1, 1, 1, 'Luna', 'tegalandong', '2021-12-03', 7, 'yusli', 'bahtiar', ''),
(88, 23, 14, 2, 3, 1, 'Leona', 'babakan', '2022-01-13', 14, 'yusli', 'bahtiar', ''),
(89, 24, 15, 4, 1, 1, 'Mila', 'dukuhwaru', '2021-11-26', 4, 'yusli', 'bahtiar', ''),
(90, 24, 15, 1, 2, 1, 'Mulan', 'talang', '2021-08-18', 8, 'yusli', 'bahtiar', ''),
(91, 24, 15, 2, 1, 2, 'Melky', 'bulakpacing', '2008-09-01', 12, 'yusli', 'bahtiar', ''),
(92, 24, 15, 1, 2, 1, 'Maya', 'margasari', '2021-11-10', 8, 'yusli', 'bahtiar', ''),
(93, 24, 15, 2, 3, 1, 'Milea', 'blubuk', '2021-12-08', 13, 'yusli', 'bahtiar', ''),
(94, 25, 19, 1, 2, 1, 'Nabila', 'talang', '2021-11-19', 3, 'yusli', 'bahtiar', ''),
(95, 25, 19, 1, 2, 1, 'Nurul', 'guci', '2021-07-08', 7, 'yusli', 'bahtiar', ''),
(96, 25, 19, 4, 2, 1, 'Ningsih', 'tegal barat', '2021-08-11', 3, 'yusli', 'bahtiar', ''),
(97, 25, 19, 2, 1, 2, 'Nadiem', 'Padegangan', '2022-03-10', 13, 'yusli', 'bahtiar', ''),
(98, 25, 19, 1, 3, 1, 'Nuni', 'dukuhsalam', '2011-06-03', 7, 'yusli', 'bahtiar', ''),
(99, 26, 19, 2, 2, 2, 'Panji', 'bulakamba', '2020-04-16', 17, 'yusli', 'bahtiar', ''),
(100, 26, 19, 4, 3, 2, 'Pendi', 'talang', '2021-12-30', 2, 'yusli', 'bahtiar', ''),
(101, 26, 19, 1, 1, 2, 'Pablo', 'slawi', '2018-02-03', 9, 'yusli', 'bahtiar', ''),
(102, 26, 19, 1, 3, 2, 'Pendi', 'jalingkut', '2022-03-14', 9, 'yusli', 'bahtiar', ''),
(103, 26, 19, 1, 1, 1, 'Pika', 'tegalsari', '2013-06-03', 10, 'yusli', 'bahtiar', ''),
(104, 27, 18, 2, 3, 1, 'Santi', 'tegal timur', '2021-08-05', 14, 'yusli', 'bahtiar', ''),
(105, 27, 18, 4, 3, 1, 'Sandy', 'babakan', '2021-05-14', 3, 'yusli', 'bahtiar', ''),
(106, 27, 18, 2, 2, 2, 'Sandhika', 'slarang lor', '2022-03-19', 13, 'yusli', 'bahtiar', ''),
(107, 27, 18, 3, 2, 1, 'Serli', 'guci', '2018-10-03', 16, 'yusli', 'bahtiar', ''),
(108, 27, 18, 4, 1, 1, 'Susi', 'lebaksiu', '2021-02-21', 4, 'yusli', 'bahtiar', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kecamatan`
--

CREATE TABLE `tbl_kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `wilayah_id` int(11) NOT NULL,
  `nama_kecamatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kecamatan`
--

INSERT INTO `tbl_kecamatan` (`id_kecamatan`, `wilayah_id`, `nama_kecamatan`) VALUES
(1, 1, 'margadana'),
(2, 1, 'tegal_timur'),
(3, 1, 'tegal_barat'),
(4, 1, 'tegal_selatan'),
(6, 2, 'adiwerna'),
(7, 2, 'balapulang'),
(8, 2, 'bojong'),
(9, 2, 'bumijawa'),
(10, 2, 'dukuhturi'),
(11, 2, 'dukuhwaru'),
(12, 2, 'jatinegara'),
(13, 2, 'kedungbanteng'),
(14, 2, 'kramat'),
(15, 2, 'lebaksiu'),
(16, 2, 'margasari'),
(17, 2, 'pagerbarang'),
(18, 2, 'pangkah'),
(19, 2, 'slawi'),
(20, 2, 'suradadi'),
(21, 2, 'talang'),
(22, 2, 'tarub'),
(23, 2, 'warureja');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelamin`
--

CREATE TABLE `tbl_kelamin` (
  `id_kelamin` int(11) NOT NULL,
  `nama_kelamin` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kelamin`
--

INSERT INTO `tbl_kelamin` (`id_kelamin`, `nama_kelamin`) VALUES
(1, 'perempuan'),
(2, 'laki_laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_panas`
--

CREATE TABLE `tbl_panas` (
  `id_panas` int(5) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `nama_panas` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `daya_tampung` int(4) NOT NULL,
  `jumlah_anak` int(4) NOT NULL,
  `jumlah_pengurus` int(4) NOT NULL,
  `nomor_rekening` bigint(40) NOT NULL,
  `nomor_telepon` bigint(15) NOT NULL,
  `tahun_berdiri` int(4) NOT NULL,
  `gambar` text NOT NULL,
  `latitude` varchar(80) NOT NULL,
  `longitude` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_panas`
--

INSERT INTO `tbl_panas` (`id_panas`, `kecamatan_id`, `nama_panas`, `alamat`, `daya_tampung`, `jumlah_anak`, `jumlah_pengurus`, `nomor_rekening`, `nomor_telepon`, `tahun_berdiri`, `gambar`, `latitude`, `longitude`) VALUES
(1, 2, 'panti asuhan Ar-rahmah ', 'Jl. Werkudoro No.207, Pengabean', 14, 7, 3, 5288598276443, 62824209004742, 2000, 'kota_Panti_Asuhan_Ar-rahmah.jpg', '-6.8859988008069335', '109.13856842804694'),
(2, 2, 'yayasan rumah yatim santoaji', 'Jl. Arjuna gg.10 No.10, Slerok', 22, 11, 2, 9477232829373, 62881378490127, 2004, 'kota_Yayasan_Rumah_Yatim_Santoaji.jpg', '-6.876045205046623', '109.14546175443434'),
(3, 2, 'yayasan yatim piatu tunas harapan', 'Jl. Werkudoro No.24, Slerok', 20, 10, 4, 2793287483622, 62892751094486, 2010, 'default-image2.jpg', '-6.886207806555863', '109.14516031025582'),
(13, 2, 'panti asuhan welas asih', 'Jl.Sumbodro No.3, Slerok', 15, 12, 3, 2747614436787, 62824277468110, 2001, 'kota_Panti_Asuhan_Welas_Asih.jpg', '-6.88006483529086', '109.14477079676294'),
(14, 2, 'panti asuhan yatim muhammadiyah', 'Jl.RA.Kartini No.43,Mangkukusuman', 10, 8, 3, 8279172466091, 62847198832303, 1990, 'kota_Panti_Asuhan_Yatim_Muhammadiyah.jpg', '-6.872694753757716', '109.13776675446553'),
(15, 2, 'Panti Asuhan Putri Aisyiyah Kota Tegal ', 'Jl.Perintis Kemerdekaan No.28,Panggung', 15, 9, 3, 297799324184, 62811232461456, 2003, 'kota_Panti_Asuhan_Putri_Aisyiyah.jpg', '-6.860682517023494', '109.14720019921096'),
(18, 6, 'Panti Asuhan Yatim Muhammadiyah', 'jl.Kajen, Lemahduwur', 16, 6, 3, 2377218824569, 62894782486511, 2005, 'Panti_Asuhan_Yatim_Muhammadiyah1.jpg', '-6.92430706993916', '109.13300610776362'),
(19, 19, 'Panti Asuhan Yatim Muhammadiyah Slawi', 'Jl. Kh Wahid Hasyim No.2, Slawi Kulon', 20, 14, 2, 2324388894104, 6282249347561, 2004, 'Panti_Asuhan_Yatim_Muhammadiyah_Slawi1.jpg', '-6.990324637728662', '109.134546962178'),
(20, 16, 'Panti Asuhan Muhammadiyah Margasari', 'Jl. Arjuna Jl. Karangjati No.21, RT.05/RW.RT.02', 22, 10, 4, 8928877325113, 6282468826187, 1999, 'Panti_Asuhan_Muhammadiyah_Margasari.jpg', '-7.097348010230929', '109.02484167831146'),
(21, 6, 'Panti Asuhan Darul Farroh', 'Jl. Mbah Santri, RT.12/RW.3, Dulpiri, Harjosari Kidul', 16, 9, 4, 782382981136611, 6289482740012, 2003, 'Panti_Asuhan_Darul_Farroh.jpg', '-6.952571951742403', '109.12753532698571'),
(22, 10, 'Panti Asuhan Putri Aisyiyah Karanganyar', 'Jl. Cokroyudan, Trukan, Karanganyar', 25, 15, 5, 981378291048372, 6282640193847, 2000, 'default-image6.jpg', '-6.8937601206541235', '109.13624462559882'),
(23, 14, 'Panti Asuhan Yayasan Al Islah', 'JL.Pala Raya,No.1 RT.002/05,Sibata,Mejasem Barat', 28, 15, 5, 2732014783912, 6283019387511, 2002, 'default-image7.jpg', '-6.879982860279633', '109.15227566598506'),
(24, 15, 'Panti Asuhan Darul Aitam Wa Dhuafa', 'Jl.Tegal-Cilacap No.666, Balapulang Wetan, Lebaksiu Lor', 25, 12, 4, 12903782942201, 6289232274019, 2009, 'Panti_Asuhan_Darul_Aitam_Wa_Dhuafa.jpg', '-7.046801621421332', '109.10606663495395'),
(25, 19, 'Rumah Yatim Bina Anak Sholeh', 'Jl.Gajah Mada No.9, Karang Moncol, Kalisapu', 13, 7, 2, 738927841098983, 6282789401283, 2007, 'Rumah_Yatim_Bina_Anak_Sholeh.jpg', '-6.9899524685915395', '109.12621719676372'),
(26, 19, 'Panti Asuhan Manunggal ', 'Jl.Jenderal Ahmad Yani No.86, Procot', 30, 14, 5, 47988792857209, 6287409938412, 2001, 'Panti_Asuhan_Manunggal_Slawi.jpg', '-6.978453885841247', '109.13910784314187'),
(27, 18, 'Panti Asuhan Darul Yatama muslimat NU', 'Jl. Raya Kalikangkung No.8, Kalikangkung Kulon, Kalikangkung', 18, 14, 5, 72890938881237, 6285200918273, 2010, 'Panti_Asuhan_Darul_Yatama_muslimat_NU.jpg', '-6.950169725008261', '109.16651889948427');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pendidikan`
--

CREATE TABLE `tbl_pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `pendidikan` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pendidikan`
--

INSERT INTO `tbl_pendidikan` (`id_pendidikan`, `pendidikan`) VALUES
(1, 'sd'),
(2, 'smp'),
(3, 'sma'),
(4, 'tidak sekolah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rekap`
--

CREATE TABLE `tbl_rekap` (
  `id_rekap` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `wilayah_id` int(11) NOT NULL,
  `tahun` char(4) NOT NULL,
  `laki_laki` int(11) DEFAULT '0',
  `perempuan` int(11) DEFAULT '0',
  `yatim` int(11) DEFAULT '0',
  `piatu` int(11) DEFAULT '0',
  `yatim_piatu` int(11) DEFAULT '0',
  `sd` int(11) DEFAULT '0',
  `smp` int(11) DEFAULT '0',
  `sma` int(11) DEFAULT '0',
  `tidak_sekolah` int(11) DEFAULT '0',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_rekap`
--

INSERT INTO `tbl_rekap` (`id_rekap`, `kecamatan_id`, `wilayah_id`, `tahun`, `laki_laki`, `perempuan`, `yatim`, `piatu`, `yatim_piatu`, `sd`, `smp`, `sma`, `tidak_sekolah`, `updated_at`) VALUES
(100, 6, 2, '2022', 2, 8, 3, 1, 6, 3, 3, 0, 4, '2022-04-23 18:54:24'),
(101, 7, 2, '2022', 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-04-23 18:54:24'),
(102, 8, 2, '2022', 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-04-23 18:54:24'),
(103, 9, 2, '2022', 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-04-23 18:54:24'),
(104, 10, 2, '2022', 2, 3, 1, 2, 2, 1, 3, 1, 0, '2022-04-23 18:54:24'),
(105, 11, 2, '2022', 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-04-23 18:54:24'),
(106, 12, 2, '2022', 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-04-23 18:54:24'),
(107, 13, 2, '2022', 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-04-23 18:54:24'),
(108, 14, 2, '2022', 4, 1, 1, 2, 2, 2, 2, 0, 1, '2022-04-23 18:54:24'),
(109, 15, 2, '2022', 4, 1, 2, 2, 1, 2, 2, 0, 1, '2022-04-23 18:54:24'),
(110, 16, 2, '2022', 3, 2, 0, 2, 3, 3, 1, 0, 1, '2022-04-23 18:54:24'),
(111, 17, 2, '2022', 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-04-23 18:54:24'),
(112, 18, 2, '2022', 4, 1, 1, 2, 2, 0, 2, 1, 2, '2022-04-23 18:54:24'),
(113, 19, 2, '2022', 8, 7, 3, 7, 5, 7, 3, 1, 4, '2022-04-23 18:54:24'),
(114, 20, 2, '2022', 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-04-23 18:54:24'),
(115, 21, 2, '2022', 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-04-23 18:54:24'),
(116, 22, 2, '2022', 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-04-23 18:54:24'),
(117, 23, 2, '2022', 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-04-23 18:54:24'),
(167, 1, 1, '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-20 15:28:29'),
(168, 2, 1, '2022', 13, 17, 8, 10, 12, 12, 8, 5, 5, '2022-05-20 15:28:29'),
(169, 3, 1, '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-20 15:28:30'),
(170, 4, 1, '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-20 15:28:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rekap_anak`
--

CREATE TABLE `tbl_rekap_anak` (
  `id_rekap_anak` int(11) NOT NULL,
  `id_rekap` int(11) NOT NULL,
  `id_anak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_rekap_anak`
--

INSERT INTO `tbl_rekap_anak` (`id_rekap_anak`, `id_rekap`, `id_anak`) VALUES
(31, 168, 29),
(32, 168, 30),
(33, 168, 31),
(34, 168, 32),
(35, 168, 33),
(36, 168, 34),
(37, 168, 35),
(38, 168, 36),
(39, 168, 37),
(40, 168, 38),
(41, 168, 39),
(42, 168, 40),
(43, 168, 41),
(44, 168, 42),
(45, 168, 43),
(46, 168, 44),
(47, 168, 45),
(48, 168, 46),
(49, 168, 47),
(50, 168, 48),
(51, 168, 49),
(52, 168, 50),
(53, 168, 51),
(54, 168, 52),
(55, 168, 53),
(56, 168, 54),
(57, 168, 55),
(58, 168, 56),
(59, 168, 57),
(60, 168, 58);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_status`
--

INSERT INTO `tbl_status` (`id_status`, `status`) VALUES
(1, 'yatim'),
(2, 'piatu'),
(3, 'yatim_piatu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_wilayah`
--

CREATE TABLE `tbl_wilayah` (
  `id_wilayah` int(11) NOT NULL,
  `nama_wilayah` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_wilayah`
--

INSERT INTO `tbl_wilayah` (`id_wilayah`, `nama_wilayah`) VALUES
(1, 'kota'),
(2, 'kabupaten');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `fk_wilayah` (`wilayah_id`),
  ADD KEY `fk_panti` (`panas_id`);

--
-- Indeks untuk tabel `tbl_anak`
--
ALTER TABLE `tbl_anak`
  ADD PRIMARY KEY (`id_anak`),
  ADD KEY `fk_status` (`status_id`),
  ADD KEY `fk_pendidikan` (`pendidikan_id`),
  ADD KEY `fk_kelamin` (`kelamin_id`),
  ADD KEY `fk_panas_id` (`panas_id`),
  ADD KEY `fk_kecamatan_anak` (`kecamatan_id`);

--
-- Indeks untuk tabel `tbl_kecamatan`
--
ALTER TABLE `tbl_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`),
  ADD KEY `fk_id_kecamatan` (`wilayah_id`);

--
-- Indeks untuk tabel `tbl_kelamin`
--
ALTER TABLE `tbl_kelamin`
  ADD PRIMARY KEY (`id_kelamin`);

--
-- Indeks untuk tabel `tbl_panas`
--
ALTER TABLE `tbl_panas`
  ADD PRIMARY KEY (`id_panas`),
  ADD KEY `fk_idkecamatan` (`kecamatan_id`);

--
-- Indeks untuk tabel `tbl_pendidikan`
--
ALTER TABLE `tbl_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indeks untuk tabel `tbl_rekap`
--
ALTER TABLE `tbl_rekap`
  ADD PRIMARY KEY (`id_rekap`),
  ADD KEY `fk_kecamatan` (`kecamatan_id`),
  ADD KEY `fk_wilayah_id` (`wilayah_id`);

--
-- Indeks untuk tabel `tbl_rekap_anak`
--
ALTER TABLE `tbl_rekap_anak`
  ADD PRIMARY KEY (`id_rekap_anak`),
  ADD KEY `rekap` (`id_rekap`);

--
-- Indeks untuk tabel `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `tbl_wilayah`
--
ALTER TABLE `tbl_wilayah`
  ADD PRIMARY KEY (`id_wilayah`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbl_anak`
--
ALTER TABLE `tbl_anak`
  MODIFY `id_anak` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT untuk tabel `tbl_kecamatan`
--
ALTER TABLE `tbl_kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tbl_kelamin`
--
ALTER TABLE `tbl_kelamin`
  MODIFY `id_kelamin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_panas`
--
ALTER TABLE `tbl_panas`
  MODIFY `id_panas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tbl_pendidikan`
--
ALTER TABLE `tbl_pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_rekap`
--
ALTER TABLE `tbl_rekap`
  MODIFY `id_rekap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT untuk tabel `tbl_rekap_anak`
--
ALTER TABLE `tbl_rekap_anak`
  MODIFY `id_rekap_anak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_wilayah`
--
ALTER TABLE `tbl_wilayah`
  MODIFY `id_wilayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD CONSTRAINT `fk_panti` FOREIGN KEY (`panas_id`) REFERENCES `tbl_panas` (`id_panas`),
  ADD CONSTRAINT `fk_wilayah` FOREIGN KEY (`wilayah_id`) REFERENCES `tbl_wilayah` (`id_wilayah`);

--
-- Ketidakleluasaan untuk tabel `tbl_anak`
--
ALTER TABLE `tbl_anak`
  ADD CONSTRAINT `fk_kecamatan_anak` FOREIGN KEY (`kecamatan_id`) REFERENCES `tbl_kecamatan` (`id_kecamatan`),
  ADD CONSTRAINT `fk_kelamin` FOREIGN KEY (`kelamin_id`) REFERENCES `tbl_kelamin` (`id_kelamin`),
  ADD CONSTRAINT `fk_panas_id` FOREIGN KEY (`panas_id`) REFERENCES `tbl_panas` (`id_panas`),
  ADD CONSTRAINT `fk_pendidikan` FOREIGN KEY (`pendidikan_id`) REFERENCES `tbl_pendidikan` (`id_pendidikan`),
  ADD CONSTRAINT `fk_status` FOREIGN KEY (`status_id`) REFERENCES `tbl_status` (`id_status`);

--
-- Ketidakleluasaan untuk tabel `tbl_kecamatan`
--
ALTER TABLE `tbl_kecamatan`
  ADD CONSTRAINT `fk_id_kecamatan` FOREIGN KEY (`wilayah_id`) REFERENCES `tbl_wilayah` (`id_wilayah`);

--
-- Ketidakleluasaan untuk tabel `tbl_panas`
--
ALTER TABLE `tbl_panas`
  ADD CONSTRAINT `fk_idkecamatan` FOREIGN KEY (`kecamatan_id`) REFERENCES `tbl_kecamatan` (`id_kecamatan`);

--
-- Ketidakleluasaan untuk tabel `tbl_rekap`
--
ALTER TABLE `tbl_rekap`
  ADD CONSTRAINT `fk_kecamatan` FOREIGN KEY (`kecamatan_id`) REFERENCES `tbl_kecamatan` (`id_kecamatan`),
  ADD CONSTRAINT `fk_wilayah_id` FOREIGN KEY (`wilayah_id`) REFERENCES `tbl_wilayah` (`id_wilayah`);

--
-- Ketidakleluasaan untuk tabel `tbl_rekap_anak`
--
ALTER TABLE `tbl_rekap_anak`
  ADD CONSTRAINT `rekap` FOREIGN KEY (`id_rekap`) REFERENCES `tbl_rekap` (`id_rekap`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
