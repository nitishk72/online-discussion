-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 08, 2020 at 05:48 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `discussion`
--

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `topic` varchar(32) NOT NULL,
  `question` varchar(2048) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `title`, `topic`, `question`, `timestamp`) VALUES
(11, 'How to get date ?', 'php', '<p>How to get date in php ?<br>I want to get date in DD/MM/YYYY format</p>\n', '2020-04-08 14:56:05'),
(12, 'How to INSERT data in mysql ?', 'php', '<p>I want to insert data into mysql database using php ?</p>\n<p>I have a user table and I want to insert user registraion details?</p>\n', '2020-04-08 14:57:55'),
(13, 'HTML form', 'php', '<p>How to create HTML form for login and register with validation</p>\n', '2020-04-08 14:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(512) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `image` varchar(128) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `active`, `image`, `created_at`) VALUES
(24, 'name', 'name@gmail.com', '8f56444e2c4b207676988337b6dc7d2f', 0, NULL, '2020-04-07 17:20:41'),
(47, 'test', 'test@gmail.com', '1aedb8d9dc4751e229a335e371db8058', 0, NULL, '2020-04-07 17:36:41'),
(49, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0, NULL, '2020-04-07 18:09:16'),
(54, 'test', 'test3@gmail.com', 'fe01ce2a7fbac8fafaed7c982a04e229', 0, NULL, '2020-04-07 18:11:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
