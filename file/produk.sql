-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 12 Agu 2019 pada 18.19
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_3`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(225) NOT NULL,
  `kategori` varchar(225) DEFAULT NULL,
  `nama_produk` varchar(225) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `kategori`, `nama_produk`, `harga_beli`, `harga_jual`) VALUES
('P19041201', 'K1002', 'Tempat Tidur Istana', 4800000, 5300000),
('P19041202', 'K1002', 'Tempat Tidur KDI ukir', 3200000, 3600000),
('P19041203', 'K1002', 'Tempat Tidur Ganesha', 3100000, 3500000),
('P19041204', 'K1002', 'Tempat Tidur Cinta', 2800000, 3150000),
('P19041205', 'K1002', 'Tempat Tidur Peluru', 3000000, 3400000),
('P19041206', 'K1002', 'Tempat Tidur Peluru Beranjangan', 3000000, 3500000),
('P19041207', 'K1002', 'Tempat Tidur Gebyok Rata', 2400000, 2750000),
('P19041208', 'K1002', 'Tempat Tidur Gebyok Lengkung', 2400000, 2750000),
('P19041209', 'K1002', 'Tempat Tidur Gebyok Bulan', 2300000, 2650000),
('P19041210', 'K1002', 'Tempat Tidur Gebyok Joglo', 2600000, 2950000),
('P19041211', 'K1002', 'Tempat Tidur Mawar', 2860000, 3210000),
('P19041212', 'K1002', 'Tempat Tidur Mutiara Krawang', 3000000, 3400000),
('P19041213', 'K1002', 'Tempat Tidur Cinderella Krawang', 3800000, 4200000),
('P19041214', 'K1002', 'Tempat Tidur Davinci Lendang', 4000000, 4500000),
('P19041215', 'K1002', 'Tempat Tidur Dahlia', 3500000, 3900000),
('P19041216', 'K1002', 'Tempat Tidur Santika', 2900000, 3250000),
('P19041217', 'K1002', 'Tempat Tidur Havana', 2800000, 3150000),
('P19041218', 'K1002', 'Tempat Tidur Tiara Kanopi', 3150000, 3550000),
('P19041219', 'K1002', 'Tempat Tidur Anggur', 2700000, 3050000),
('P19041220', 'K1002', 'Tempat Tidur Bhineka', 3000000, 3400000),
('P19041221', 'K1002', 'Tempat Tidur Arjuna', 2900000, 3300000),
('P19041222', 'K1002', 'Tempat Tidur Minimalis Pintu Aceh', 3400000, 3800000),
('P19041223', 'K1002', 'Tempat Tidur Minimalis Love', 2700000, 3050000),
('P19041224', 'K1002', 'Tempat Tidur Minimalis Kalung', 3200000, 3600000),
('P19041225', 'K1002', 'Tempat Tidur Nusa Indah Krawang', 3600000, 4000000),
('P19041226', 'K1002', 'Tempat Tidur Mawar Kalung', 2700000, 3050000),
('P19041227', 'K1002', 'Tempat Tidur Rose Krawang', 3000000, 3400000),
('P19041228', 'K1002', 'Tempat Tidur Larasati', 2800000, 3200000),
('P19041229', 'K1002', 'Tmepat Tidur Minimalis Putih Emas', 3000000, 3400000),
('P19041230', 'K1002', 'Tempat Tidur Minimalis Putih', 3000000, 3400000),
('P19041231', 'K1002', 'Tempat Tidur Love Putih Emas', 2900000, 3300000),
('P19041232', 'K1002', 'Tempat Tidur Tempahan (Custome)', 4500000, 5000000),
('P19041233', 'K1001', 'Springbed Helux', 3500000, 3900000),
('P19041234', 'K1001', 'Springbed Ocean Magical', 3200000, 3600000),
('P19041235', 'K1001', 'Springbed Ocean Classical', 1800000, 2100000),
('P19041236', 'K1001', 'Springbed Ocean Simpony', 2500000, 2850000),
('P19041237', 'K1001', 'Springbed Ocean Passioner', 2200000, 2500000),
('P19041238', 'K1001', 'Springbed Ocean Tinderly', 3930000, 4430000),
('P19041239', 'K1001', 'Springbed Caisar Victory', 1500000, 1800000),
('P19041240', 'K1001', 'Springbed Caisar Economy', 1300000, 1600000),
('P19041241', 'K1001', 'Springbed Caisar Davinci', 1600000, 1950000),
('P19041242', 'K1001', 'Springbed Loren Tipe 1000', 2900000, 3300000),
('P19041243', 'K1001', 'Springbed Loren Tipe 800', 2300000, 2650000),
('P19041244', 'K1001', 'Springbed Loren Tipe 600', 1800000, 2100000),
('P19041245', 'K1001', 'Springbed Angel Lux', 1000000, 1300000),
('P19041246', 'K1001', 'Springbed Angle Super', 1500000, 1800000),
('P19041247', 'K1001', 'Springbed Angle new', 1100000, 1400000),
('P19041248', 'K1001', 'Springbed Angle Michael', 1900000, 2200000),
('P19041249', 'K1001', 'Springbed Angle Gabriel', 2100000, 2450000),
('P19041250', 'K1001', 'Springbed Conforta', 2500000, 2850000),
('P19041251', 'K1001', 'Springbed Procella', 1800000, 2100000),
('P19041252', 'K1001', 'Springbed Kanggooro', 2000000, 2350000),
('P19041253', 'K1001', 'Springbed Sweetland', 1500000, 1850000),
('P19041254', 'K1012', 'Bed Dorong Modis Star Kids', 2900000, 3300000),
('P19041255', 'K1012', 'Bed Dorong Modis Emily', 3000000, 3400000),
('P19041256', 'K1012', 'Bed Dorong Modis karakter', 2800000, 3200000),
('P19041257', 'K1012', 'Bed Dorong Helux Teenager', 3300000, 3700000),
('P19041258', 'K1012', 'Bed Dorong Helux Latex', 3500000, 3900000),
('P19041259', 'K1012', 'Bed Dorong Helux Karakter', 3100000, 3500000),
('P19041260', 'K1012', 'Bed Dorong Conforta Latex', 3500000, 3900000),
('P19041261', 'K1012', 'Bed Dorong Conforta Semi Latex', 3000000, 3400000),
('P19041262', 'K1012', 'Bed Dorong Conforta Teenager', 2900000, 3300000),
('P19041263', 'K1012', 'Bed Dorong Caisar Karakter', 2500000, 2850000),
('P19041264', 'K1012', 'Bed Dorong Angle Karakter', 2000000, 2350000),
('P19041265', 'K1005', 'Dipan Impressa', 1500000, 1800000),
('P19041266', 'K1005', 'Dipan Lengkung', 2000000, 2350000),
('P19041267', 'K1005', 'Dipan Minimalis', 2000000, 2350000),
('P19041268', 'K1005', 'Dipan Kipas', 2400000, 2750000),
('P19041269', 'K1005', 'Dipan Cendrawasih', 2500000, 2850000),
('P19041270', 'K1005', 'Dipan Love', 1400000, 1700000),
('P19041271', 'K1005', 'Dipan Rafi Ahmad', 2800000, 3150000),
('P19041272', 'K1005', 'Dipan Classic', 1500000, 1800000),
('P19041273', 'K1005', 'Dipan Modern Kancing', 2000000, 2350000),
('P19041274', 'K1005', 'Dipan Minimalis Modern', 2065000, 2415000),
('P19041275', 'K1003', 'Meja Rias Mawar Goyang', 3000000, 3400000),
('P19041276', 'K1003', 'Meja Rias Semanggi', 3000000, 3400000),
('P19041277', 'K1003', 'Meja Rias Kerang ', 2300000, 2650000),
('P19041278', 'K1003', 'Meja Rias Borobudur', 1500000, 1800000),
('P19041279', 'K1003', 'Meja Rias Alter', 1300000, 1600000),
('P19041280', 'K1003', 'Meja Rias Alter Jumbo Jati 5 Laci', 3300000, 3700000),
('P19041281', 'K1003', 'Meja Rias Maja Pahit', 1200000, 1500000),
('P19041282', 'K1003', 'Meja Rias Pluru', 1500000, 1800000),
('P19041283', 'K1003', 'Meja Rias Gendong 1', 1300000, 1600000),
('P19041284', 'K1003', 'Meja Rias Ukiran Putih', 1700000, 2000000),
('P19041285', 'K1003', 'Meja Rias Minimalis Panjang', 2100000, 2500000),
('P19041286', 'K1003', 'Meja Rias Tempahan', 2500000, 2900000),
('P19041287', 'K1004', 'Lemari Pintu Tambang 3 PT', 3500000, 3900000),
('P19041288', 'K1004', 'Lemari Pintu Tiara 3 PT', 3000000, 3400000),
('P19041289', 'K1004', 'Lemari Pintu Caca Bunga 3 PT', 2800000, 3200000),
('P19041290', 'K1004', 'Lemari Pintu Rahwana 3 PT', 3100000, 3500000),
('P19041291', 'K1004', 'Lemari Pintu Palembang', 2500000, 2850000),
('P19041292', 'K1004', 'Lemari Pintu Anggola Tonjol', 3000000, 3400000),
('P19041293', 'K1004', 'Lemari Pintu Pluru 3PT', 3000000, 3400000),
('P19041294', 'K1004', 'Lemari Pintu Semanggi', 2740000, 3090000),
('P19041295', 'K1004', 'Lemari Pintu Stupa 4PT', 2500000, 2850000),
('P19041296', 'K1004', 'Lemari Pintu Peluru tonjol 4 PT', 3500000, 3900000),
('P19041297', 'K1004', 'Lemari Pintu Adinda Tonjol 4PT', 3600000, 4000000),
('P19041298', 'K1004', 'Lemari Pintu Tempahan (Custome)', 4000000, 4500000),
('P19041299', 'K1004', 'Lemari Hias Lokal 1 PT', 1300000, 1600000),
('P19041300', 'K1004', 'Lemari Hias Lokal 2 PT', 1500000, 1800000),
('P19041301', 'K1004', 'Lemari Hias Lokal 3 PT', 1700000, 2000000),
('P19041302', 'K1004', 'Lemari Hias Jati', 2500000, 2850000),
('P19041303', 'K1004', 'Lemari Hias Minimalis', 2000000, 2350000),
('P19041304', 'K1004', 'Lemari Hias Ukir', 2500000, 2850000),
('P19041305', 'K1007', 'Kaca Hias Minimalis Ukir', 800000, 1050000),
('P19041306', 'K1007', 'Kaca Hias Jati', 1400000, 1700000),
('P19041307', 'K1008', 'Bantal Helux', 180000, 200000),
('P19041308', 'K1008', 'Bantal Conforta', 150000, 170000),
('P19041309', 'K1008', 'Guling Helux', 180000, 200000),
('P19041310', 'K1008', 'Guling Conforta', 150000, 170000),
('P19041311', 'K1004', 'Lemari Pesantren ', 320000, 350000),
('P19041312', 'K1009', 'Buffet TV Olympic ', 1400000, 1700000),
('P19041313', 'K1009', 'Buffet TV Lokal', 800000, 1100000),
('P19041314', 'K1009', 'Buffet TV Jati Davinci ', 2070000, 2420000),
('P19041315', 'K1009', 'Buffet TV Jati Peluru', 2300000, 2650000),
('P19041316', 'K1009', 'Buffet TV Jati Anggur', 2500000, 2850000),
('P19041317', 'K1009', 'Buffet TV Jati Krawang', 2000000, 2350000),
('P19041318', 'K1009', 'Buffet TV Jati Kartini', 1900000, 2200000),
('P19041319', 'K1009', 'Buffet TV Minimalis ', 1700000, 2000000),
('P19041320', 'K1010', 'Sofa Minimalis ', 2000000, 2350000),
('P19041321', 'K1010', 'Sofa Istana', 3500000, 4000000),
('P19041322', 'K1010', 'Sofa Modern', 2850000, 3350000),
('P19041323', 'K1010', 'Sofa Kulit', 3000000, 3400000),
('P19041324', 'K1010', 'Sofa Kain', 1800000, 2100000),
('P19041325', 'K1010', 'Sofa Kancing', 2000000, 2350000),
('P19041326', 'K1010', 'Sofa Princess', 4500000, 5000000),
('P19041327', 'K1011', 'Kursi Tamu Jati Ukir', 2500000, 2850000),
('P19041328', 'K1011', 'Kursi Tamu Jati Kartini', 2000000, 2350000),
('P19041329', 'K1011', 'Kursi Tamu Jati Mawar', 2900000, 3300000),
('P19041330', 'K1011', 'Kursi Tamu Jati Pluru', 3000000, 3400000),
('P19041331', 'K1011', 'Kursi Tamu Jati Semanggi', 2700000, 3050000),
('P19041332', 'K1002', 'Kasur 120x200', 350000, 450000),
('P19041333', 'K1006', 'Meja Makan Minimalis', 2000000, 2350000),
('P19041334', 'K1006', 'Meja Makan Kartini', 2800000, 3200000),
('P19041335', 'K1006', 'Meja Makan Ketapang', 2800000, 3200000),
('P19041336', 'K1006', 'Meja Makan Kerang', 2800000, 3200000),
('P19041337', 'K1006', 'Meja Makan Minimalis tepi daun', 3500000, 3900000),
('P19041338', 'K1006', 'Meja Makan Ukir salina Gendong', 3200000, 3600000),
('P19041339', 'K1006', 'Meja Makan Besi', 1350000, 1650000),
('P19041340', 'K1006', 'Meja Makan Olympic', 2000000, 2350000),
('P19041341', 'K1006', 'Meja Makan Rotan', 2500000, 2850000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
