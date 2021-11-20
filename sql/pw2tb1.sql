-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2021 at 02:00 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw2tb1`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(10) NOT NULL,
  `kategori_buku_id` int(10) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `stok_tersedia` int(10) NOT NULL,
  `jumlah_stok` int(100) NOT NULL,
  `cover` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `kategori_buku_id`, `judul`, `stok_tersedia`, `jumlah_stok`, `cover`) VALUES
(1, 2, 'Geografi Sejarah Indonesia', 0, 75, 'ab3a8e09c32422429af6df7c4bfc8308.png'),
(2, 1, 'Laut Bercerita', 0, 52, '83cac346f36e5f2a9e74c606125892de.png'),
(3, 4, 'Kepemimpinan dan Seni Berbicara', 0, 123, 'c500b72e53b46f957c46b08a00667203.png'),
(4, 5, 'Studi Dasar Filsafat', 0, 56, 'd096bab8a069699f839a9301d45167a1.png'),
(5, 6, 'Liberalisasi Islam Di Indonesia', 0, 237, 'ed8b2a83248d9d9f95255a816d6c3d8d.png'),
(6, 7, 'Morfologi Bahasa Indonesia', 0, 174, 'e01f705aaf25623cd2081834e59e2756.png'),
(7, 8, 'Fisika Dasar Kemagnetan', 0, 89, '8abd22ce723e39c61139fc7c78d1aaf9.png'),
(8, 9, 'Kesenian Barzanji', 0, 135, '3b4908a22ea1b6f80aa9e8b850bbb967.png'),
(9, 10, 'Pengantar Ilmu Sosial dan Budaya Dasar', 0, 40, '0bd5283c01a4387f65b3ff5fe4d8c393.png'),
(10, 11, 'Elektronika Dasar Lanjutan', 0, 155, '6b8b0be56a3a90eeeac2ab6cf43afde3.png');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id`, `nama`) VALUES
(1, 'Ilmu Komputer'),
(2, 'Teknik'),
(3, 'Ekonomi dan Bisnis'),
(4, 'Ilmu Komunikasi'),
(5, 'Psikologi'),
(6, 'Desain dan Seni Kreatif');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_buku`
--

INSERT INTO `kategori_buku` (`id`, `nama`) VALUES
(1, 'Literartur dan Sastra'),
(2, 'Sejarah dan Geografi'),
(4, 'Umum'),
(5, 'Filsafat dan Psikologi'),
(6, 'Agama'),
(7, 'Bahasa'),
(8, 'Sains dan Matematika'),
(9, 'Seni dan Rekreasi'),
(10, 'Sosial'),
(11, 'Teknologi');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(10) NOT NULL,
  `fakultas_id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `fakultas_id`, `nama`, `gender`) VALUES
(1011, 6, 'Dian', 'Wanita'),
(1144, 3, 'Bella', 'Wanita'),
(1212, 1, 'Dhini', 'Wanita'),
(1221, 2, 'Bagas', 'Pria'),
(1321, 1, 'Agus', 'Pria'),
(1332, 1, 'Agung', 'Pria'),
(2111, 4, 'Yuga', 'Pria');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(10) NOT NULL,
  `nim` int(10) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `status_pengembalian` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `nim`, `tanggal_pinjam`, `status_pengembalian`) VALUES
(13, 1321, '2021-10-01', 0),
(14, 1332, '2021-09-30', 0),
(15, 1212, '2021-09-26', 0),
(16, 1221, '2021-09-28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_buku`
--

CREATE TABLE `peminjaman_buku` (
  `id` int(11) NOT NULL,
  `peminjaman_id` int(10) NOT NULL,
  `buku_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman_buku`
--

INSERT INTO `peminjaman_buku` (`id`, `peminjaman_id`, `buku_id`) VALUES
(7, 16, 2),
(8, 14, 1),
(9, 15, 2),
(10, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`) VALUES
(1, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'Demo user'),
(11, 'admin', 'f4afa102c4050a7097b7e2ffb9ce53dd', 'Administrator'),
(14, 'agus', '1a9398d0c354f408d0adf5abc987ad67', 'agus');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_buku_id` (`kategori_buku_id`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `fakultas_id` (`fakultas_id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `peminjaman_buku`
--
ALTER TABLE `peminjaman_buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjaman_buku_ibfk_1` (`peminjaman_id`),
  ADD KEY `peminjaman_buku_ibfk_2` (`buku_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `peminjaman_buku`
--
ALTER TABLE `peminjaman_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`kategori_buku_id`) REFERENCES `kategori_buku` (`id`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`fakultas_id`) REFERENCES `fakultas` (`id`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `peminjaman_buku`
--
ALTER TABLE `peminjaman_buku`
  ADD CONSTRAINT `peminjaman_buku_ibfk_1` FOREIGN KEY (`peminjaman_id`) REFERENCES `peminjaman` (`id`),
  ADD CONSTRAINT `peminjaman_buku_ibfk_2` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
