-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 13, 2025 at 02:27 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbhotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `jenis`, `deskripsi`, `gambar`) VALUES
(1, 'Kolam Renang', 'Bar kolam renang dengan penataan unik untuk melewatkan hari dengan secangkir teh atau kopi atau segelas koktail. Memiliki pemandangan yang indah dan kolam renang yang fantasitis', 'hotel-di-padang2.jpg'),
(2, 'Restoran', 'Dengan pemandangan kolam renang dan laut yang indah, Atlantis menyajikan sarapan, makan siang, makan malam dan cemilan lezat menggunakan bahan paling segar untuk pengalaman bersantap yang paling orisinil dan menyenangkan.', 'bar.jpg'),
(3, 'Gym', 'Bagi anda yang suka berolahraga, Kami manajemen Hotel Trivenazi juga Menyediakan fasilitas olahraga dan gym, sehingga client juga bisa berolahraga di hotel tanpa harus capek pergi keluar sekedar mencari tempat GYM, dan juga berolahraga di GYM hotel Trivenazi  juga sangat menyenangkan karena sambil berolahraga juga bisa sambil menikmati sunset di Penghujung senja.', 'gym.jpg'),
(4, 'Ruang Temu Bisnis', 'Menyediakan Ruang temu yang sangat mewah, dan bisa di desain juga, ruang ini berguna sebagai tampat mengadakan acara rapat bisnis yang di lakukan oleh pengusaha - pengusaha besar, dan sebagai acara lainnya juga. sehingga tidak rugi deh bagi para pebisnis atau pengusaha melakukan rapat penting mereka di Hotel Trivenazi .', 'ruang temu.jpg'),
(5, 'Spa', 'Hotel Trivenazi Menyediakan fasilitas SPA bagi para perempuan yang ingin tampil lebih cantik dan memanjakan diri mereka, selain itu petugas SPA juga sangat ramah serta produk yang pakai di SPA Hotel Trivenazi di bawah perlindungan dokter kecantikan, jadi di jamin aman untuk kulit client.', 'spa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int NOT NULL,
  `No_Kamar` int NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `No_Kamar`, `gambar`, `kategori`) VALUES
(1, 1, 'Capture1.JPG', ''),
(2, 2, 'Capture2.JPG', ''),
(3, 3, 'Capture3.JPG', ''),
(4, 4, 'Capture4.JPG', '');

-- --------------------------------------------------------

--
-- Table structure for table `galeri2`
--

CREATE TABLE `galeri2` (
  `id_galeri2` int NOT NULL,
  `nama` varchar(35) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri2`
--

INSERT INTO `galeri2` (`id_galeri2`, `nama`, `gambar`) VALUES
(1, 'Gambar 1', '7854_rs_00_p_1024x768.jpg'),
(2, 'Gambar 2', 'Ballroom nikah1.jpg'),
(3, 'Gambar 3', 'Capture1.jpg'),
(4, 'Gambar 4', 'Capture2.jpg'),
(5, 'Gambar 5', 'Capture3.jpg'),
(6, 'Gambar 6', 'Capture4.jpg'),
(7, 'Gambar 7', 'ruang temu.jpg'),
(8, 'Gambar 8', 'mercurenikah1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `No_Kamar` char(15) NOT NULL,
  `id_galeri` int DEFAULT NULL,
  `Jenis` varchar(50) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Tarif` double DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `video` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`No_Kamar`, `id_galeri`, `Jenis`, `Type`, `Tarif`, `deskripsi`, `video`, `gambar`) VALUES
('001', 1, 'Super VIP', 'Double', 2500000, 'Kamar Super President nan Mewah yang memiliki sebuah kamar tidur utama dengan kamar mandi en-suite yang mewah, sofa, bak mandi, mantel mandi dan sebuah lemari pakaian. Kamar ini juga memiliki ruang tamu yang dilengkapi dengan fasilitas Home Theater, TV LCD dengan mini HiFi, ruang makan, dapur, dan kamar mandi tambahan.', 'videos/vid_6784f74f946126.75486492.mp4', 'images/img_6784f74f935597.42199116.JPG'),
('002', 2, 'Super Presidents', 'Single', 2000000, 'Kamar VIP mewah yang memiliki sebuah kamar tidur utama dengan kamar mandi yang Mewah, Bak Mandi, Mantel Mandi dan Sebuah Lemari Pakaian. Kamar ini juga memiliki ruang tamu yang dilengkapi dengan fasilitas  TV LCD.', 'videos/vid_6784d7f968b212.16544853.mp4', 'images/img_6784f763951ce4.15763409.JPG'),
('003', 3, 'Super VIP', 'Single', 1000000, 'Kamar super VIP memiliki dua tempat tidur berukuran Queen atau satu tempat tidur berukuran King dengan dua sofa permanen yang ideal digunakan untuk bersantai, atau bisa berfungsi sebagai tempat tidur tambahan untuk anak-anak.', 'videos/vid_6784d807a66074.33624984.mp4', 'images/img_6784f76f557676.97955223.JPG'),
('004', 4, 'Deluxe VIP', 'Single', 1000000, 'Kamar Deluxe VIP memiliki tempat tidur berukuran Queen atau satu tempat tidur berukuran King dengan satu sofa permanen yang ideal digunakan untuk bersantai, atau bisa berfungsi sebagai tempat tidur bagi anak-anak.', 'videos/vid_6784d81e250c13.88598570.mp4', 'images/img_6784f77b82b3e3.49697139.JPG'),
('532', NULL, 'Super Presidents', 'Double', 2500000, 'testing video dan gambar', 'videos/vid_6784d50c0077c7.87317018.mp4', 'images/img_6784f78baffc58.71301910.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_konfirmasi` int NOT NULL,
  `id_pelanggan` int NOT NULL,
  `jumlah_transfer` int NOT NULL,
  `bank` varchar(50) NOT NULL,
  `gambar` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_konfirmasi`, `id_pelanggan`, `jumlah_transfer`, `bank`, `gambar`, `status`) VALUES
(10, 16, 200000, 'BSI', '6 - storyapps.jpg', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `jk` varchar(11) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `username`, `password`, `no_hp`, `jk`, `alamat`, `email`) VALUES
(1, 'Lathif Fauzi Assallam', 'lathif', '321', '089887766554', 'pria', 'Jl. Bukkit Barisan', 'lathif@gmail.com'),
(16, 'Afri Maulnaa Akbar', 'afrii', '123', '0234y1u3', 'pria', 'ASDADLN', 'skbajba@gmail.com'),
(17, 'Hapid Ramdani', 'hpdrr', 'hpdrr', '082285626081', 'pria', 'Flamboyan', 'hpdrr@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `id_saran` int NOT NULL,
  `gambar` text NOT NULL,
  `nama` varchar(35) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saran`
--

INSERT INTO `saran` (`id_saran`, `gambar`, `nama`, `email`, `phone`, `pesan`) VALUES
(1, 'tamu1.jpg', 'Rina Aryani', 'rinaaryani@gmail.com', '082389132270', 'Selamat Pagi, Hotel yang yang sangat menarik'),
(2, 'staffku5.jpg', 'Handoko', 'handoko@gmail.com', '082389132456', 'Pelayanan Yang luar biasa dari para Staff hotel.'),
(3, 'staffku7.jpg', 'Rido Ilham', 'ridoilham@gmail.com', '082389132567', 'Menyuguhkan pemandangan yang sangat luar biasa dan saya sangat sukaa!'),
(4, 'staffku4.jpg', 'Adly Prasetia Utama', 'adlyprasetyauta@gmail.com', '082389136789', 'Tingkatkan pelayanan agar lebih bagus lagi'),
(5, 'tamu2.jpg', 'Afri Yulianti', 'afriyulianti@gmail.com', '082389132606', 'Pelayanan sangat bagus, terus Tingkatkan!!'),
(6, 'tamu3.jpg', 'Annisa Ramadhani', 'annisaramadhani@gmail.com', '082389136678', 'Kolam renang yang sangat nyaman'),
(8, 'tamu4.jpg', ' Haruka Putri', 'harukaputri@gmail.com', '0855643627', 'Kolam renang yang menenangkan'),
(10, 'tamu5.jpg', 'Andrina Honoka', 'andrinahonoka@gmail.com', '98765432', 'Menampilkan Keindahan Sunset dari Kamar Hotel!!!');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id_slider` int NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `deskripsi1` varchar(50) NOT NULL,
  `deskripsi2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slider`, `gambar`, `deskripsi1`, `deskripsi2`) VALUES
(1, 'trivenazi.jpg', 'Welcome To Trivenazi Hotel', 'Hotel &amp; Resort'),
(2, 'trivenazi1.JPG', 'Pemandangan Indah Menanti', 'Join with Us!'),
(3, 'trivenazi2.JPG', 'Ruangan Yang Nyaman', 'Untuk Pengalaman yang Tak Terlupakan!');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id_staff` int NOT NULL,
  `gambar` text NOT NULL,
  `nama` varchar(25) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id_staff`, `gambar`, `nama`, `deskripsi`) VALUES
(1, 'staffku6.jpg', 'Evan Gunawan', 'Menjabat sebagai Financial Controller, Berperanan langsung terhadap urusan keuangan dan persiapan analisa operasional perusahaan, termasuk laporan keuangan dan interim terjadwal.\r\n\r\nBertanggung jawab terhadap perencanaan dan kebijakan dibidang keuangan, praktek akuntansi, termasuk menangani hal-hal yang berkaitan dengan institusi pembiayaan dan komunitas keuangan, menangani perpajakan, menganalisa dan menilai laporan keuangan sebelum ditetapkan menjadi laporan fiscal dan laporan keuangan resmi perusahaan, Ikut serta dalam mengawasi staf dibagian accounting dan keuangan, Akuntansi Umum, Akuntansi Aktiva, Akuntansi Biaya, dan pengawasan terhadap anggaran.\r\n'),
(2, 'staffku4.jpg', 'Kevin Mahendra', 'Menjabat Direktur Hotel Trivenazi'),
(3, 'staffku5.jpg', 'Andrew Surya Becker', 'Staff Khusus Bagian IT Hotel Trivenazi'),
(4, 'staffku1.jpg', 'Evelyn Maria', 'Menjabat sebagai Kepala Resepsionis Hotel Trivenazi\r\n'),
(5, 'staffku2.jpg', 'Anita Putri', 'Menjabat sebagai Kepala Chef Hotel Trivenazi'),
(6, 'staffku3.jpg', 'Veronica Halim Putri', 'Menjabat Sebagai Manajer Dapur Hotel Trivenazi');

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

CREATE TABLE `tamu` (
  `id_pelanggan` char(15) NOT NULL,
  `Nama` varchar(100) DEFAULT NULL,
  `Alamat` char(15) DEFAULT NULL,
  `Asal` varchar(100) DEFAULT NULL,
  `NoTlp` char(15) DEFAULT NULL,
  `jk` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tamu`
--

INSERT INTO `tamu` (`id_pelanggan`, `Nama`, `Alamat`, `Asal`, `NoTlp`, `jk`) VALUES
('002', 'Rina Aryani', 'Jakarta pusat', 'Jakarta', '082389132607', 'perempuan'),
('003', 'Handoko', 'bukittinggi', 'Jakarta', '082389132608', 'Laki Laki'),
('004', 'Rido', 'padang', 'Solok', '082389132609', 'Laki Laki'),
('005', 'ihsan', 'jakarta', 'jakarta', '08665732561', 'Laki-Laki'),
('1', 'Afri Yuliati', 'Dusun 1 Jorong', 'Solok', '082389132606', 'perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `No_Faktur` varchar(50) NOT NULL,
  `No_Kamar` char(15) NOT NULL,
  `id_pelanggan` varchar(11) NOT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `lama_menginap` int NOT NULL,
  `Tarif` varchar(50) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Telpon` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `ktp_file` varchar(255) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`No_Faktur`, `No_Kamar`, `id_pelanggan`, `tgl_masuk`, `tgl_keluar`, `lama_menginap`, `Tarif`, `Nama`, `Telpon`, `Email`, `ktp_file`, `pesan`) VALUES
('TRX678521F3C90351.89847313', '004', '16', '2025-01-13', '2025-01-15', 2, '200000', 'Afri Maulnaa Akbar', '0234y1u3', 'skbajba@gmail.com', '678521f3c8785.jpg', 'ya');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Lathif Fauzi', 'adminlathif', '0bd9897bf12294ce35fdc0e21065c8a7', 'pimpinan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`),
  ADD KEY `No_Kamar` (`No_Kamar`);

--
-- Indexes for table `galeri2`
--
ALTER TABLE `galeri2`
  ADD PRIMARY KEY (`id_galeri2`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`No_Kamar`),
  ADD KEY `id_galeri` (`id_galeri`),
  ADD KEY `id_galeri_2` (`id_galeri`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id_konfirmasi`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id_saran`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- Indexes for table `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`No_Faktur`),
  ADD KEY `No_Kamar` (`No_Kamar`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `galeri2`
--
ALTER TABLE `galeri2`
  MODIFY `id_galeri2` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_konfirmasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `saran`
--
ALTER TABLE `saran`
  MODIFY `id_saran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id_staff` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
