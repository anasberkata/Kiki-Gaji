-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 16, 2022 at 03:56 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sipuji`
--

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` int(11) NOT NULL,
  `tanggal_gaji` date NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`id_gaji`, `tanggal_gaji`, `id_petugas`, `date_created`, `is_active`) VALUES
(8, '2022-01-25', 1, '2022-08-15', 1),
(9, '2022-02-25', 1, '2022-08-16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gaji_detail`
--

CREATE TABLE `gaji_detail` (
  `id_gaji_detail` int(11) NOT NULL,
  `id_gaji` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `kehadiran` int(11) NOT NULL,
  `total_gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gaji_detail`
--

INSERT INTO `gaji_detail` (`id_gaji_detail`, `id_gaji`, `id_karyawan`, `kehadiran`, `total_gaji`) VALUES
(12, 8, 1, 30, 4500000),
(13, 8, 2, 21, 1575000),
(15, 8, 4, 15, 450000),
(16, 9, 1, 30, 4500000),
(17, 9, 2, 25, 1875000),
(18, 9, 4, 15, 450000);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Owner'),
(2, 'Bendahara'),
(3, 'Kasir'),
(4, 'Pelayan'),
(5, 'Kurir');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `gaji_pokok` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `id_jabatan`, `gaji_pokok`, `date_created`, `is_active`) VALUES
(1, 'Eka Anas Jatnika', 1, 150000, '2022-08-15', 1),
(2, 'Siti Patimah, S.Kom', 2, 75000, '2022-08-15', 1),
(4, 'Pak Ootong Surotong', 5, 30000, '2022-08-15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `username` varchar(125) NOT NULL,
  `email` varchar(125) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(125) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `email`, `password`, `image`, `role_id`, `date_created`, `is_active`) VALUES
(1, 'Owner', 'admin', 'admin@gmail.com', 'admin', 'default.jpg', 1, '2022-08-09', 1),
(2, 'Bendahara', 'bendahara', 'bendahara@gmail.com', 'bendahara', 'default.jpg', 2, '2022-08-09', 1),
(4, 'Siti Patimah, S.Kom', 'sitipatimah', 'sitipatimah@gmail.com', '1234567890', 'default.jpg', 1, '2022-08-14', 1),
(5, 'Eka Anas Jatnika', 'anasberkata', 'anasberkata@gmail.com', 'Dean114119', 'default.jpg', 1, '2022-08-16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'Bendahara');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `gaji_detail`
--
ALTER TABLE `gaji_detail`
  ADD PRIMARY KEY (`id_gaji_detail`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gaji_detail`
--
ALTER TABLE `gaji_detail`
  MODIFY `id_gaji_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
