-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 10:03 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `modify` varchar(255) DEFAULT NULL,
  `deleted` int(11) NOT NULL,
  `open_time` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `priority` int(11) NOT NULL,
  `share` int(11) NOT NULL,
  `folder` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `username`, `file_name`, `type`, `size`, `modify`, `deleted`, `open_time`, `image`, `priority`, `share`, `folder`) VALUES
(9, 'vytg2903@gmail.com', 'wpViewFile.pdf', 'pdf', 3245563, '22-12-14 12:18:06', 0, '22-12-14 12:18:06', 'CSS/images/pdf.png', 0, 1, NULL),
(10, 'vytg2903@gmail.com', 'background4.jpg', 'jpg', 749306, '22-12-15 12:29:09', 1, '22-12-14 12:58:01', 'files/vytg2903@gmail.com/background4.jpg', 0, 1, NULL),
(17, 'vyy2903@gmail.com', 'readme (1).txt', 'txt', 1164, '22-12-14 12:21:41', 1, '22-12-14 09:56:12', 'CSS/images/txt.png', 1, 0, NULL),
(18, 'vyy2903@gmail.com', 'create_bill.png', 'png', 5135, '22-12-14 11:05:22', 0, '22-12-14 09:56:44', 'files/vyy2903@gmail.com/create_bill.png', 0, 0, NULL),
(19, 'vyy2903@gmail.com', 'BMTT_N2_1.pdf', 'pdf', 4234189, '22-12-14 11:06:53', 0, '22-12-14 09:56:57', 'CSS/images/pdf.png', 0, 1, NULL),
(20, 'vyy2903@gmail.com', '52000170_52000149.docx', 'docx', 846802, '22-12-14 10:58:25', 0, '22-12-14 10:06:49', 'CSS/images/doc.png', 0, 1, NULL),
(21, 'vyy2903@gmail.com', 'bill.png', 'png', 3048, '22-12-14 10:58:03', 0, '22-12-14 10:55:48', 'files/vyy2903@gmail.com/bill.png', 0, 0, NULL),
(25, 'vyy2903@gmail.com', 'MY.png', 'png', 56749, '22-12-14 12:20:18', 1, '22-12-14 11:02:23', 'files/vyy2903@gmail.com/MY.png', 1, 0, NULL),
(26, 'vyy2903@gmail.com', 'BÁO-CÁO-TIẾN-ĐỘ-LẦN-1.docx', 'docx', 237321, '22-12-14 12:13:58', 1, '22-12-14 11:29:19', 'CSS/images/doc.png', 1, 0, NULL),
(27, 'vytg2903@gmail.com', 'mysqli.txt', 'txt', 337, '22-12-14 08:22:49', 0, '22-12-14 08:22:49', 'CSS/images/txt.png', 0, 1, NULL),
(28, 'vytg2903@gmail.com', 'people.png', 'png', 10855, '22-12-14 08:23:09', 0, '22-12-14 08:23:09', 'files/vytg2903@gmail.com/people.png', 0, 1, NULL),
(29, 'vytg2903@gmail.com', '52000170_52000149.pdf', 'pdf', 3898057, '22-12-14 09:09:24', 0, '22-12-14 09:09:24', 'CSS/images/pdf.png', 0, 1, NULL),
(30, 'vytg2903@gmail.com', 'quanlykho (4).pdf', 'pdf', 118689, '22-12-15 12:27:08', 0, '22-12-14 09:59:02', 'CSS/images/pdf.png', 0, 1, NULL),
(31, 'quang9angoquyen@gmail.com', '2_preprocess_smoke.txt', 'txt', 8024, '22-12-15 10:08:47', 0, '22-12-15 02:00:37', 'CSS/images/txt.png', 1, 0, 'Folder1'),
(32, 'quang9angoquyen@gmail.com', 'minigame.jpg', 'jpg', 90188, '22-12-15 10:13:10', 0, '22-12-15 10:13:10', 'files/quang9angoquyen@gmail.com/minigame.jpg', 0, 0, NULL),
(34, 'quang9angoquyen@gmail.com', 'seu1.jpg', 'jpg', 24062, '22-12-15 02:23:03', 0, '22-12-15 02:23:03', 'files/quang9angoquyen@gmail.com/seu1.jpg', 0, 0, NULL),
(35, 'quang9angoquyen@gmail.com', 'm1.jpg', 'jpg', 136584, '22-12-15 02:24:01', 0, '22-12-15 02:24:01', 'files/quang9angoquyen@gmail.com/m1.jpg', 0, 0, 'Folder1');

-- --------------------------------------------------------

--
-- Table structure for table `folder`
--

CREATE TABLE `folder` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `parent` varchar(50) DEFAULT NULL,
  `date_create` date NOT NULL,
  `modify` date NOT NULL,
  `deleted` int(11) NOT NULL,
  `share` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `folder`
--

INSERT INTO `folder` (`id`, `username`, `name`, `parent`, `date_create`, `modify`, `deleted`, `share`) VALUES
(1, 'quang9angoquyen@gmail.com', 'Folder1', NULL, '2022-12-15', '2022-12-15', 0, 0),
(2, 'quang9angoquyen@gmail.com', 'Folder2', 'Folder1', '2022-12-15', '2022-12-15', 0, 0),
(3, 'quang9angoquyen@gmail.com', 'Folder3', NULL, '2022-12-15', '2022-12-15', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password`
--

CREATE TABLE `forgot_password` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `share`
--

CREATE TABLE `share` (
  `id` int(11) NOT NULL,
  `id_file` int(11) NOT NULL,
  `users` varchar(255) NOT NULL,
  `keyShare` varchar(255) NOT NULL,
  `isAll` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `share`
--

INSERT INTO `share` (`id`, `id_file`, `users`, `keyShare`, `isAll`) VALUES
(1, 19, '[]', '3535b2fd71eb7f42776c73a0a987c681215ca77b7e5a105085a0eb25bbbf2684', 1),
(11, 27, '[]', '6c9175ed267251b2fbd7db8422f46a4d852ead058f73b84b1103710d679ebf8b', 1),
(18, 29, '[\"vyy2903@gmail.com\"]', '4eb5676ec2c6988c85430f52486f35a1b3e02ab67d2748ee96204ef9707f9010', 0),
(20, 30, '[\"vyy2903@gmail.com\"]', 'ed1d83f497164b4c8d30101e7f17e85a4585c531d3f59a769d417eb465439e5b', 0);

-- --------------------------------------------------------

--
-- Table structure for table `share_with_me`
--

CREATE TABLE `share_with_me` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `id_file` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `share_with_me`
--

INSERT INTO `share_with_me` (`id`, `username`, `id_file`) VALUES
(1, 'vyy2903@gmail.com', 30),
(2, 'vyy2903@gmail.com', 29),
(3, 'vytg2903@gmail.com', 19),
(4, 'vyy2903@gmail.com', 27),
(5, 'vytuong2903@gmail.com', 27);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  `size_page` int(11) DEFAULT NULL,
  `use_size` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `size_page`, `use_size`, `name`, `gender`, `phone`, `token`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 0, 100000000, 0, 'admin', 0, '0384708803', ''),
(3, 'vytg2903@gmail.com', '5a44030af59b98301ab128f4fdc9cfb2', 1, 100000000, 8022807, 'Huỳnh Nguyễn Tường Vy', 0, '0384708003', ''),
(5, 'p.thihc@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 1, 100000000, 0, 'Pham Hoc', 0, NULL, '8c56f5a3a755580c65bbe3bf16b2aa9a'),
(7, 'vyy2903@gmail.com', '5a44030af59b98301ab128f4fdc9cfb2', 1, 100000000, 5456863, 'Huỳnh Nguyễn Tường Vy', 0, NULL, '25c10fc3aeff46febfa3a9c79fa0af3a'),
(8, 'huynhnguyentuongvy293@gmail.com', '5a44030af59b98301ab128f4fdc9cfb2', 1, 100000000, 0, 'Huỳnh Nguyễn Tường Vy', 0, NULL, '712eb8314e08aced5b80081e7eb167d0'),
(9, 'vytuong2903@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 100000000, 0, 'Huỳnh Nguyễn Tường Vy', 0, NULL, '8defc6b311fff90a8bb860366445ad1c'),
(10, 'quang9angoquyen@gmail.com', 'e13fb571df4e603a9647ef48c4cce730', 1, 100000000, 632279, 'Dang Quang', 0, '0', '618aadfcf7b80895a53d722f493dea7f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `folder`
--
ALTER TABLE `folder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `share`
--
ALTER TABLE `share`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `share_with_me`
--
ALTER TABLE `share_with_me`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `folder`
--
ALTER TABLE `folder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `forgot_password`
--
ALTER TABLE `forgot_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `share`
--
ALTER TABLE `share`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `share_with_me`
--
ALTER TABLE `share_with_me`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
