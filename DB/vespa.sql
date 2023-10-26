-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2021 at 02:53 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vespa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_toko` varchar(35) NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `nomor_hp` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_toko`, `gambar`, `username`, `password`, `email`, `nomor_hp`, `alamat`, `description`) VALUES
(1, '21 marc garage', 'logo.jpg', 'admin', 'admin', '21marc.garage@gmail.com', '0811918945', 'Jl. Raya Condet, No.103', '      Kami Menyediakan Motor vespa berkualitas bekas atau baru dengan harga yang sangat terjangkau, cocok untuk semua kalangan khususnya anak anak muda');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id_message` int(8) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `waktu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id_message`, `email`, `pesan`, `waktu`) VALUES
(2, 'rizdaagisa@gmail.com', 'adadadaadadadad', '02-04-2021');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(8) NOT NULL,
  `id_product` int(8) NOT NULL,
  `id_pelanggan` int(8) NOT NULL,
  `jumlah_order` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `id_product`, `id_pelanggan`, `jumlah_order`) VALUES
(12, 3, 38, 1),
(13, 2, 39, 1),
(21, 32, 62, 1),
(22, 33, 62, 2),
(23, 32, 75, 1),
(24, 32, 76, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` varchar(25) NOT NULL,
  `nomor` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `waktu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `alamat`, `nomor`, `email`, `waktu`) VALUES
(59, 'rizda', 'Jl. Raya Bogor No.103 , C', 'muhammad rizd', 'rizdaagisa@gmail.com', '19-08-2020'),
(60, 'rrrrrrrr', 'jalan catur', 'muhammad rizd', 'rizdaagisa@gmail.com', '19-08-2020'),
(61, 'm rizdalah', 'jalan warga', 'muhammad rizd', 'rizdaagisa@gmail.com', '19-08-2020'),
(62, 'abid', 'jalan catur', 'muhammad rizd', 'rizdaagisa@gmail.com', '19-08-2020'),
(75, 'adadadadadada', 'JL SIAGA DARMA VIII NO 18', '081290255683', 'rizdaagisa@gmail.com', '02-04-2021'),
(76, 'muhammad rizdalah agisa', 'JL SIAGA DARMA VIII NO 18', '081290255683', 'rizdaagisa@gmail.com', '02-04-2021');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `nama_product` varchar(100) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `harga` int(100) NOT NULL,
  `stock` int(10) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `nama_product`, `gambar`, `harga`, `stock`, `description`) VALUES
(30, 'Vespa S 125 I-GET.', '1.jpg', 31000000, 1, 'Vespa S 125 I-GET. Tipe Vespa Matic yang pertama adalah S 125 I-GET. Jika melihat harga, inilah produk merek Italia yang termurah. Banderolnya cuma Rp 34 juta (OTR Jakarta).\r\n\r\nVarian ini paling murah lantaran belum tersentuh revisi terbaru. Alhasil sistem pencahayaannya masih bohlam. Lalu panel instrumen juga mengandalkan analog, minim sentuhan digital (kecuali indikator jam).\r\n\r\nMeski demikian, soal spesifikasi mesin tidak perlu diragukan. Motor matik ini telah dilengkapi jantung mekanis berteknologi I-GET (Italian Green Experience Technology) dengan kapasitas 125 cc. Kehadiran I-GET membuat performa lebih baik dan getaran semakin halus. Berbeda dengan mesin generasi lama.\r\n\r\nDi atas kertas, mesin Vespa S 125 I-GET bisa memuntahkan torsi hinga 10,2 Nm pada 6.000 rpm dan tenaga maksimal 10,19 hp pada 7.600 rpm.  Soal tangki bahan bakar, kapasitas totalnya mencapai 7,5 liter.\r\n\r\nVespa memasarkan S 125 I-GET dengan branding muda dan sporty. Ciri khasnya punya lampu depan berbentuk kotak dan jok ala single seater. Dimensinya yang mungil, membuat motor ini lincah dipakai di kepadatan jalan perkotaan.'),
(31, ' Vespa LX 125 I-GET', '2.jpg', 35000000, 2, ' Vespa LX 125 I-GET. Jenis Vespa matic selanjutnya adalah LX 125 I-GET. Motor ini adalah kembaran dari S 125 I-GET. Masuk sebagai kategory entry level untuk motor Vespa modern.\r\n\r\nDari sisi mesin dan rangka, sungguh tidak ada beda. Hanya saja untuk desain serta fitur dibuat karakter yang berlainan. Desain LX sungguh menonjolkan kesan elegan. Vespa matic satu ini  menyasar generasi muda yang ingin mendapatkan aura skuter Eropa yang otentik. Desainnya sengaja membuat kamu seperti kembali ke masa lalu.\r\n\r\nCiri khasnya pakai Lampu depan berbentuk bulat, dengan spion yang juga bulat. Kemudian untuk jok dirancang nyaman untuk berboncengan. Soal pilihan warna, tersedia: Blue Avio (biru), Nero Vulcano (hitam), dan Red Passione (merah).\r\n\r\nDari sisi harga, Vespa LX 125 I-GET mencapai Rp 35,8 juta (OTR Jakarta). Lebih mahal dari Vespa S, apa penyebabnya?\r\n\r\nSkuter ini dilengkapi dengan berbagai fitur yang lebih modern. Kamu bisa lihat penyematan sistem pencahayaan LED di lampu depan. Lalu panel instrumen kombinasi analog dan digital. Tidak ketinggalan ada USB port di kompartemen depan untuk mengisi daya baterai smartphone ketika berkendara.'),
(32, 'Vespa Primavera 150 I-GET ABS', '3.jpg', 36000000, 1, 'Vespa Primavera 150 I-GET ABS Di kelas 150 cc, Vespa matic yang tersedia salah satunya Primavera 150 I-GET ABS. Desainnya cenderung membulat, seperti ingin kembali ke era 60-an. Hampir tak ada sudut tajam yang bisa ditemui di bodinya.\r\n\r\nJika dilihat sekilas, Vespa Primavera 150 sangat mirip dengan Vespa LX, tapi ukurannya lebih besar. Pembeda lainnya adalah ukuran pelek. Primavera pakai roda depan 110/70-12 inci dan belakang 120/70-12 inci. Dengan begitu, kamu tidak perlu takut bodi bawah bersinggungan dengan aspal ketika melewati jalan bergelombang.\r\n\r\nAda dua varian Vespa Primavera yang ditawarkan di Indonesia: Primavera S dan Primavera. Perbedaannya hanya tampak dari balutan warna bodi. Untuk Primavera S, beberapa komponen dilabur dengan chrome abu-abu gelap sehingga terlihat lebih elegan.\r\n\r\nSoal fitur, antara tipe Vespa matic Primavera S dan Primavera tidak ada beda. Keduanya pakai sistem pencahayaan LED di lampu depan dan belakang. Lalu panel instrumen telah dilengkapi sistem digital serta analog. Ada pula USB port untuk mengisi daya smartphone.'),
(33, 'Vespa Sprint 150 I-GET ABS', '4.jpg', 25000000, 4, 'Vespa Sprint 150 I-GET ABS Sprint merupakan varian legendaris Vespa. Motor ini sudah dikenal sejak Vespa masih menggunakan mesin dua tak dengan transmisi manual. Namun kini Sprint 150 I-GET ABS sudah menjadi salah satu Vespa matic terbaik yang bisa kamu beli di pasaran.\r\n\r\nJika melihat secara detail, basis mesin dan rangka Vespa Sprint modern adalah Primavera. Hanya saja ada beberapa komponen yang membuatnya beda. Salah satunya lampu depan yang berbentuk persegi enam. Kemudian spion juga dirancang lebih menyudut.\r\n\r\nPenampilan Sprint memang tidak terlalu klasik seperti saudaranya. Vespa sengaja memberi karakter modern dan sportif untuk skuter ini. Jika kamu tertarik, ada dua varian Vespa Sprint 150 New yang bisa dibeli di Moladin dengan DP yang Ringan: Sprint 150 Rp 46,7 juta (OTR Jakarta) dan Sprint S Rp 49,2 juta (OTR Jakarta).'),
(34, 'Vespa GTS 150', '5.jpg', 26000000, 2, 'Vespa GTS 150 Vespa matic berikutnya adalah GTS 150. Meski sama-sama dengan Sprint dan Primavera pakai kapasitas mesin 150 cc, namun bodinya jauh lebih bongsor. Performa jantung mekanisnya juga lebih bertenaga. \r\n\r\nCiri khas Vespa GTS 150 menggunakan mesin dengan empat katup dan pendingin cairan. Maka dari itu, torsi puncaknya semakin buas mencapai 13,5 Nm pada 6.750 rpm dan tenaga maksimal 14,48 hp pada 7.750 rpm.\r\n\r\nKelebihan lain, punya banyak fitur modern. Ada start & stop system (SSS) untuk menghemat konsumsi bahan bakar. Fitur SSS mampu menonaktifkan mesin secara otomatis saat berhenti lebih dari tiga detik, lalu akan aktif kembali ketika selongsong gas diputar.\r\n\r\nFitur lain adalah ABS di kedua roda untuk keselamatan. Ada pula tilt sensor yang mampu menonaktifkan mesin secara otomatis, saat terjadi kecelakaan. Kemudian bike finder, memudahkan pencarian motor di lokasi parkir. Tidak ketinggalan sistem pencahayaan LED dan USB port tetap hadir.'),
(35, 'Vespa GTS Super Tech 300, ', '7.jpg', 41000000, 1, 'Vespa GTS Super Tech 300, Kalau kamu mencari jenis vespa matic yang paling canggih, maka pilihlah GTS Super Tech 300. Harganya mencapai Rp 152,9 juta (OTR Jakrta). Mahal memang, namun sepadan dengan kelebihannya.\r\n\r\nSkuter ini pakai panel instrumen dengan layar TFT warna-warni berukuran 4,3 inci. Menariknya lagi, panel instrumen tersebut sanggup terkoneksi dengan smartphone via aplikasi Vespa Mia Connectivity System. Alhasil dari dahsboard, kamu bisa melihat pesan singkat, telepon masuk, hingga mengakses fitur navigasi.\r\n\r\nKelebihan lain, memiliki GTS Super Tech 300 punya anti slip regulation (ASR) untuk mencegah cengkeraman roda berkurang saat melewati jalan licin. Kelebihan lain, memiliki GTS Super Tech 300 punya anti slip regulation (ASR) untuk mencegah cengkeraman roda berkurang saat melewati jalan licin. Ada pula dual channel ABS, bike finder, dan masih banyak lagi.'),
(36, 'Vespa 946.', '8.jpg', 33000000, 3, 'Vespa 946. Varian Vespa matic yang satu ini sangatlah unik, lantaran dibuat layaknya maha karya. Menariknya lagi, Vespa kerap kolaborasi bareng berbagai merek ternama dunia untuk menggarap 946.\r\n\r\nTidak percaya? Pada 2015, Vespa 946 Emporio Armani meluncur dengan jumlah yang sangat terbatas. Harganya ketika itu hampir menyentuh Rp 200 jutaan. \r\n\r\nSelanjutnya pada 2017, hadir Vespa 946 Red. Inilah hasil kolaborasi dengan Red Foundation, dikenal sebagai yayasan global yang memerangi penyakit AIDS, Malaria, dan Tuberkolosis di berbagai negara dunia. Konsumen yang memiliki Vespa 946 Red tidak hanya membeli motor. Mereka juga otomatis menyumbang ke RED Foundation. \r\n\r\nLalu yang terbaru, ada Vespa 946 Christian Dior pada 12 Juni 2020. Hanya saja skuter edisi terbatas ini belum dijual. Konsumen bisa membelinya pada musim semi 2021 di butik Dior seluruh dunia. Setelah itu, barulah masuk ke Indonesia lewat diler Motoplex Piaggio.'),
(37, 'Vespa Elettrica 45 KM/H', '9.jpg', 26000000, 1, 'Vespa Elettrica 45 KM/H'),
(38, 'Vespa Primavera 50 4T3V', '10.jpg', 31000000, 1, 'Vespa Primavera 50 4T3V'),
(39, 'New Vespa PX 150', '11.jpg', 24000000, 2, 'New Vespa PX 150'),
(40, 'Vespa GTS Super Tech 300', '12.jpg', 34000000, 2, 'Vespa GTS Super Tech 300'),
(41, 'Vespa Sprint Carbon 150 I-GET ABS', '13.jpg', 37000000, 2, 'Vespa Sprint Carbon 150 I-GET ABS'),
(42, 'Vespa Sprint Notte 150 I-GET ABS', '15.jpg', 35000000, 3, 'Vespa Sprint Notte 150 I-GET ABS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_message`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_message` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
