-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2022 at 10:53 AM
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
(27, 'vytg2903@gmail.com', 'mysqli.txt', 'txt', 337, '22-12-14 08:22:49', 0, '22-12-14 08:22:49', 'CSS/images/txt.png', 0, 1, NULL),
(28, 'vytg2903@gmail.com', 'people.png', 'png', 10855, '22-12-14 08:23:09', 0, '22-12-14 08:23:09', 'files/vytg2903@gmail.com/people.png', 0, 1, NULL),
(76, 'quang9angoquyen@gmail.com', 'external.jpg', 'jpg', 24062, '22-12-16 12:42:03', 0, '22-12-16 12:42:03', 'files/quang9angoquyen@gmail.com/external.jpg', 0, 1, NULL);

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
  `share` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `folder`
--

INSERT INTO `folder` (`id`, `username`, `name`, `parent`, `date_create`, `modify`, `deleted`, `share`, `priority`) VALUES
(37, 'quang9angoquyen@gmail.com', 'level1', NULL, '2022-12-16', '2022-12-16', 0, 0, 0),
(38, 'quang9angoquyen@gmail.com', 'level22', 'level1', '2022-12-16', '2022-12-16', 0, 0, 0),
(40, 'quang9angoquyen@gmail.com', 'gfsdfg', 'level22', '2022-12-16', '2022-12-16', 0, 0, 0);

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
(20, 30, '[\"vyy2903@gmail.com\"]', 'ed1d83f497164b4c8d30101e7f17e85a4585c531d3f59a769d417eb465439e5b', 0),
(21, 34, '[\"huynhnguyentuongvy293@gmail.com\"]', '656f5010b643ba4201ccf35f3c44dfb2fc165913f774b8462a2fc4547a7f40e4', 0),
(22, 34, '[\"huynhnguyentuongvy293@gmail.com\"]', 'f28ddb0e4e7073e8e9da6f40252fe08f2729c6c3602687d6c6455005fbedf818', 0),
(23, 34, '[\"huynhnguyentuongvy293@gmail.com\"]', '30311d8aeb19bcfbb2e0dc88b62ae8e6ba4e9c3c51ae7f58ab3a03a01068f7f4', 0),
(24, 76, '[\"huynhnguyentuongvy293@gmail.com\"]', 'd2b38b22acccefd31fb57904bae12188cc97885ce18aadc3bd3a8111fd607aaf', 0),
(25, 76, '[\"huynhnguyentuongvy293@gmail.com\"]', 'fed0ca7980d8d7049f31a06ac5ee5196f74aed9310cb59e3250e4bc2c590e0a7', 0);

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
(5, 'vytuong2903@gmail.com', 27),
(6, 'huynhnguyentuongvy293@gmail.com', 34),
(7, 'huynhnguyentuongvy293@gmail.com', 34),
(8, 'huynhnguyentuongvy293@gmail.com', 34),
(9, 'huynhnguyentuongvy293@gmail.com', 76),
(10, 'huynhnguyentuongvy293@gmail.com', 76);

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
(5, 'p.thihc@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 1, 100000000, 90188, 'Pham Hoc', 0, NULL, '8c56f5a3a755580c65bbe3bf16b2aa9a'),
(7, 'vyy2903@gmail.com', '5a44030af59b98301ab128f4fdc9cfb2', 1, 100000000, 5456863, 'Huỳnh Nguyễn Tường Vy', 0, NULL, '25c10fc3aeff46febfa3a9c79fa0af3a'),
(8, 'huynhnguyentuongvy293@gmail.com', '5a44030af59b98301ab128f4fdc9cfb2', 1, 100000000, 0, 'Huỳnh Nguyễn Tường Vy', 0, NULL, '712eb8314e08aced5b80081e7eb167d0'),
(9, 'vytuong2903@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 100000000, 0, 'Huỳnh Nguyễn Tường Vy', 0, NULL, '8defc6b311fff90a8bb860366445ad1c'),
(10, 'quang9angoquyen@gmail.com', 'e13fb571df4e603a9647ef48c4cce730', 1, 100000000, 2849739, 'Dang Quang', 0, '0', '618aadfcf7b80895a53d722f493dea7f');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `folder`
--
ALTER TABLE `folder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `forgot_password`
--
ALTER TABLE `forgot_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `share`
--
ALTER TABLE `share`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `share_with_me`
--
ALTER TABLE `share_with_me`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
