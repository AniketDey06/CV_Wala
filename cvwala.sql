-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2023 at 07:12 PM
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
-- Database: `cvwala`
--

-- --------------------------------------------------------

--
-- Table structure for table `rdata`
--

CREATE TABLE `rdata` (
  `id` int(11) NOT NULL,
  `upload` longblob NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` text NOT NULL,
  `extracurriculum` varchar(255) NOT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `objective` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `education` varchar(255) NOT NULL,
  `work_experience` varchar(255) DEFAULT NULL,
  `project` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rdata`
--

INSERT INTO `rdata` (`id`, `upload`, `name`, `email`, `phone`, `dob`, `address`, `gender`, `extracurriculum`, `linkedin`, `website`, `objective`, `language`, `skills`, `education`, `work_experience`, `project`, `token`, `dt`) VALUES
(148, 0x75706c6f61642f6d61726a69742e6a706567, 'Subhajit Bag', 'admin@gmail.com', '9836705317', '2023-04-06', 'Khatra Bankura', 'Male', 'dancing', 'www.linkedin.com', 'www.aniketdey.com', 'THe quick brown fox jumps over the lazy dog', 'English Bengali hindi', 'html css c java python php', '[[\"daitm\"],[\"makaut\"],[\"bca\"],[\"499\"],[\"2023\"]]', '[[\"GOOGLE\"],[\"SDE\"],[\"Oct 22 2022 - Nov 02 2023\"]]', '[[\"CVWala\"],[\"cv maker website using html, css, js, php\"]]', '362387494f6be6613daea643a7706a42', '2023-04-19 10:09:57');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `password`, `token`, `dt`) VALUES
(16, 'Subhajit Bag', 'admin@gmail.com', '1234567890', '$2y$10$BjM0DN6q4xB6kPuiRZBMi.OPEV4GgFoXYArhJK0LYl3qk483MQv8K', '362387494f6be6613daea643a7706a42', '2023-04-19 10:07:40'),
(20, 'Subhajit Bag', 'bhau@gmail.com', '1234567890', '$2y$10$q3nsq9haf2GsoKVTdjrk5.a.nWXQdO9Zl1o8B2iY6TqSbhSRfmA8y', '', '2023-04-13 01:33:43'),
(21, 'Subhajit Bag', 'bag@gmail.com', '9836705317', '$2y$10$Vh3GZ8DcIL9cmR3iI3ViUOcFP9qPbMyQOoWzMluPpb3A.Zbj.Z0v6', '04da4aea8e38ac933ab23cb2389dddef', '2023-04-13 02:29:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rdata`
--
ALTER TABLE `rdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rdata`
--
ALTER TABLE `rdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
