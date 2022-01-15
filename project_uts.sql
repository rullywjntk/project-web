-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 15, 2022 at 03:43 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_uts`
--

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `id_favourite` int(11) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `id_place` int(11) NOT NULL,
  `name_place` varchar(255) NOT NULL,
  `location_place` varchar(255) NOT NULL,
  `desc_place` varchar(255) NOT NULL,
  `place_image` varchar(255) NOT NULL,
  `map` varchar(255) NOT NULL,
  `open_place` varchar(100) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name_category` varchar(255) NOT NULL,
  `total_review` int(11) NOT NULL,
  `id_review` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`id_place`, `name_place`, `location_place`, `desc_place`, `place_image`, `map`, `open_place`, `id_category`, `name_category`, `total_review`, `id_review`) VALUES
(1, 'Taman Kota Harmoni', 'Jl. Keputih Tegal Tim. II No.249, Keputih, Kec. Sukolilo, Kota SBY, Jawa Timur 60111', 'Taman kota besar dengan kebun yang berisi beragam bunga, air mancur & karya seni.', 'https://raw.githubusercontent.com/rullywjntk/asset-project-web/main/park/harmoni.jpg', 'https://www.google.co.id/maps/place/Taman+Harmoni/@-7.2952211,112.8013716,17z/data=!4m13!1m7!3m6!1s0x2dd7fa7a177ebfbd:0x94c826f638ea1d55!2sTaman+Harmoni!8m2!3d-7.2952211!4d112.8035603!10e1!3m4!1s0x2dd7fa7a177ebfbd:0x94c826f638ea1d55!8m2!3d-7.2952211!4d112', '06.00 Wib s/d 18.00 Wib ', 1, 'Park', 0, 0),
(2, 'Kebun Bibit Wonorejo', 'Kebun Bibit, Jl. Raya Wonorejo, Wonorejo, Rungkut, Surabaya City, East Java 60296', 'Hutan kota dengan area piknik tepi sungai & taman bermain anak, serta bumi perkemahan & rusa.', 'https://raw.githubusercontent.com/rullywjntk/asset-project-web/main/park/bibitw.jpg', 'https://www.google.com/maps/dir//taman+wonorejo/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x2dd7fa8cf321a5d3:0xa20235fc28e1ca1a?sa=X&ved=2ahUKEwinnfin4sf0AhV94XMBHXWXAbwQ9Rd6BAgFEAQ', '', 1, '', 0, 0),
(3, 'Taman Kunang-kunang', 'Jl. Penjaringan Tim., Penjaringan Sari, Kec. Rungkut, Kota SBY, Jawa Timur 60297', 'Keberadaan lampu yang terang di malam hari akan sangat mengesankan dan indah.\r\n\r\n\r\n\r\n', 'https://raw.githubusercontent.com/rullywjntk/asset-project-web/main/park/Rental-mobil-Surabaya-keTaman-kunang-kunang-1168x657.jpg', 'https://www.google.com/maps/dir//taman+kunang+kunang/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x2dd7faecf437a521:0xc20515bde56f72ce?sa=X&ved=2ahUKEwjTy7G248f0AhXNgtgFHfbWCJIQ9Rd6BAgPEAM', '', 1, '', 0, 0),
(4, 'Taman Flora Bratang', 'Jl. Bratang Binangun, Baratajaya, Kec. Gubeng, Kota SBY, Jawa Timur 60284', 'Taman dengan jalan setapak berkelok melintasi tanaman rimbun, taman bermain, & kawanan rusa.\r\n ', 'https://raw.githubusercontent.com/rullywjntk/asset-project-web/main/park/Wisata-Menarik-di-Taman-Flora-dengan-sewa-mobil-Surabaya.jpg', 'https://www.google.com/maps/dir//taman+flora+bratang/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x2dd7fbb2807f4593:0x51d06bd30548e1d6?sa=X&ved=2ahUKEwjM-P7x5sf0AhW47XMBHbGNAFQQ9Rd6BAgPEAM', '', 1, '', 0, 0),
(5, 'Taman Pelangi', 'Jl. Ahmad Yani No.138, Gayungan, Kec. Gayungan, Kota Surabaya, Jawa Timur 60235', 'Taman kota yang populer di malam hari dengan air mancur warna-warni dan berbentuk daun.', 'https://raw.githubusercontent.com/rullywjntk/asset-project-web/main/park/pelangi.jpg', 'https://www.google.co.id/maps/place/Taman+Pelangi/@-7.3255102,112.7241217,15.75z/data=!4m9!1m2!2m1!1staman+pelangi!3m5!1s0x2dd7fb69dbf567ff:0x2993db27b0539b3d!8m2!3d-7.3275604!4d112.7312242!15sCg10YW1hbiBwZWxhbmdpWg8iDXRhbWFuIHBlbGFuZ2mSAQljaXR5X3BhcmuaAS', '', 1, '', 0, 0),
(6, 'Taman Mundu', 'Jl. Juwet, Tambaksari, Kec. Tambaksari, Kota Surabaya, Jawa Timur 60136', 'Taman untuk wisata keluarga karena fasilitas yang dimilikinya mulai dari taman bermain hingga area batu refleksi.', 'https://raw.githubusercontent.com/rullywjntk/asset-project-web/main/park/taman-kota-di-surabaya-8-Liputan6.jpg', 'https://www.google.co.id/maps/place/Taman+Mundu/@-7.2515993,112.7524096,17z/data=!3m1!4b1!4m5!3m4!1s0x2dd7f9717b3e06b7:0x597ce3c7f0c8762e!8m2!3d-7.2516046!4d112.7545983', '', 1, '', 0, 0),
(7, 'Taman Bungkul', 'Jl. Taman Bungkul, Darmo, Kec. Wonokromo, Kota SBY, Jawa Timur 60241', 'Taman kota ini terkenal akan keindahan dan tata letaknya yang rapi. Lengkap dengan beragam fasilitas yang menambah kenyamanan pengunjung.', 'https://raw.githubusercontent.com/rullywjntk/asset-project-web/main/park/bungkul.jpg', 'https://www.google.co.id/maps/place/Taman+Bungkul/@-7.2913415,112.7376331,17z/data=!3m1!4b1!4m5!3m4!1s0x2dd7fbbe1837258d:0x6de4060b6596563f!8m2!3d-7.2913468!4d112.7398218', '', 1, '', 0, 0),
(8, 'Taman Prestasi', 'Jl. Ketabang Kali No.6, Ketabang, Kec. Genteng, Kota Surabaya, Jawa Timur 60272', 'Taman Prestasi adalah alternatif tujuan taman kota di Surabaya selanjutnya yang tak kalah menarik untuk dijelajahi. ', 'https://raw.githubusercontent.com/rullywjntk/asset-project-web/main/park/taman-kota-di-surabaya-10-Flickr.jpg', 'https://www.google.co.id/maps/place/Taman+Prestasi+Surabaya/@-7.2614669,112.7406397,17z/data=!3m1!4b1!4m5!3m4!1s0x2dd7f966cbf14633:0xa3125b26dcc2d9ea!8m2!3d-7.2614722!4d112.7428284', '', 1, '', 0, 0),
(9, 'Taman Ekspresi', 'Jl. Genteng Kali No.67, Genteng, Kec. Genteng, Kota Surabaya, Jawa Timur 60275', 'Taman di Kota Surabaya yang cukup unik dimana terdapat banyak sekali karya-karya seni yang tampil kontras diantara asrinya pepohonan.', 'https://raw.githubusercontent.com/rullywjntk/asset-project-web/main/park/taman-kota-di-surabaya-11-Casa-Indonesia.jpg', 'https://www.google.co.id/maps/place/Taman+Ekspresi+Dan+Perpustakaan/@-6.7429058,108.5631467,8z/data=!4m6!1m2!2m1!1staman+ekspresi!3m2!1s0x2dd7f966192051db:0x73421d48f52c1f0f!15sCg50YW1hbiBla3NwcmVzaVoQIg50YW1hbiBla3NwcmVzaZIBBHBhcmuaASNDaFpEU1VoTk1HOW5TMF', '', 1, '', 0, 0),
(10, 'Hutan Bambu', 'Jl. Raya Marina Asri, Keputih, Kec. Sukolilo, Kota SBY, Jawa Timur 60111', 'Taman terluas dan terindang di Surabaya. Dengan banyak bunga yang berwarna warni dan bambu yang eksotis.', 'https://raw.githubusercontent.com/rullywjntk/asset-project-web/main/park/Hutan-Bambu-Sukolilo.jpg', 'https://www.google.co.id/maps/place/Hutan+Bambu+Keputih+Surabaya/@-7.2942898,112.8015537,19.75z/data=!4m12!1m6!3m5!1s0x2dd7f900d37fae9b:0x637bddc13af0df47!2sHutan+Bambu+Keputih+Surabaya!8m2!3d-7.2941909!4d112.8017238!3m4!1s0x2dd7f900d37fae9b:0x637bddc13af', '', 1, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `place_category`
--

CREATE TABLE `place_category` (
  `id` int(11) NOT NULL,
  `name_category` varchar(255) NOT NULL,
  `img_category` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `place_category`
--

INSERT INTO `place_category` (`id`, `name_category`, `img_category`) VALUES
(1, 'Park', 'https://raw.githubusercontent.com/rullywjntk/asset-project-web/main/Fountain%20Garden%20Vector.jpg'),
(2, 'Landmark', 'https://raw.githubusercontent.com/rullywjntk/asset-project-web/main/51816.jpg'),
(3, 'Shopping', 'https://raw.githubusercontent.com/rullywjntk/asset-project-web/main/7345.jpg'),
(4, 'Culinary', 'https://raw.githubusercontent.com/rullywjntk/asset-project-web/main/fast-food-advertising-composition_1284-17372.jpg'),
(5, 'Hangout', 'https://raw.githubusercontent.com/rullywjntk/asset-project-web/main/delicious-coffee-time-elements_24877-50198.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` int(11) NOT NULL,
  `id_place` int(11) NOT NULL,
  `user_review` varchar(100) NOT NULL,
  `review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id_review`, `id_place`, `user_review`, `review`) VALUES
(44, 2, 'user', 'tempat nyaman'),
(56, 1, 'user', 'tempatnya bagus');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone_number` int(12) NOT NULL,
  `id_favourite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `phone_number`, `id_favourite`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$n.wTE1CdMlU2KoBdVCks/OjBK436Qe16WKRLBSlKNuDdPx1lY434a', 1213123123, 0),
(3, 'user', 'user@user.com', '$2y$10$bOE1C9ZSHe2/3ogA9lHau.PoUadl8HXIrc3SaGwXXgWkRmkQ0qrhS', 132414513, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`id_place`);

--
-- Indexes for table `place_category`
--
ALTER TABLE `place_category`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`),
  ADD UNIQUE KEY `id_place` (`id_place`),
  ADD UNIQUE KEY `id_place_2` (`id_place`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `id_place` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
