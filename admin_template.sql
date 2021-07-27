-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2021 at 03:39 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_template`
--

-- --------------------------------------------------------

--
-- Table structure for table `hire_list`
--

CREATE TABLE `hire_list` (
  `id` int(11) NOT NULL,
  `hire_name` varchar(100) NOT NULL,
  `hire_phone` int(15) NOT NULL,
  `hire_email` varchar(32) NOT NULL,
  `hire_address` varchar(100) NOT NULL,
  `hire_disc` text NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hire_list`
--

INSERT INTO `hire_list` (`id`, `hire_name`, `hire_phone`, `hire_email`, `hire_address`, `hire_disc`, `dateTime`) VALUES
(1, 'prokash', 1952406914, 'prokas003@gmail.com', '', '', '2021-04-13 04:40:34'),
(2, 'prokash', 1952406914, 'prokas003@gmail.com', '', '', '2021-04-13 04:44:55'),
(3, 'prokash biswas', 1952406916, 'prokas003@gmail.com', '', '', '2021-04-13 17:56:11'),
(4, 'prokash biswas', 1952406916, 'prokas003@gmail.com', '', '', '2021-04-13 18:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` varchar(32) NOT NULL,
  `date_of_birth` date NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `email`, `image`, `password`, `phone`, `address`, `created_at`, `date_of_birth`, `dateTime`) VALUES
(1, 'test', 'admin', 'test@gmail.com', 'admin_.png', 'admin', '01735262026', 'test', '', '1997-12-08', '2020-12-28 10:58:23'),
(3, 'Shuvo Goswami', 'shuvo', 'shuvo@gmail.com', 'admin_.png', 'shuvo', '01711972481', 'Mawlana Abdur rahim market,joypurhat', 'prokash', '2020-12-22', '2020-12-28 11:13:31'),
(14, 'prokash', 'prokash', 'ettadi123@gmail.com', 'admin_.png', '$2y$10$Gu2S2.J5xz56FD4UevJHLOILN2rMg0KXFBnKFA9xqchxtZkJtWleS', '01712735747', 'Mawlana Abdur rahim market,joypurhat', 'shuvo', '2020-12-29', '2020-12-29 06:33:31'),
(15, 'Admin', 'admin', 'prokas003@gmail.com', 'admin_.png', 'admin1234', '01952406916', 'Arpara, Marua, Chowgachha, Jessore.', 'prokash', '1997-08-15', '2021-04-03 09:21:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hire_list`
--
ALTER TABLE `hire_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`,`phone`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hire_list`
--
ALTER TABLE `hire_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
