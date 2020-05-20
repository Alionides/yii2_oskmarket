-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2020 at 07:42 AM
-- Server version: 10.4.8-MariaDB
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
-- Database: `basic`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`) VALUES
(1, 'Baku'),
(2, 'Moscow'),
(3, 'Berlin '),
(4, 'Tokyo'),
(5, 'Helsinki '),
(6, 'Oslo '),
(7, 'Denver '),
(8, 'Rio '),
(9, 'Nairobi ');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`) VALUES
(1, 'Html'),
(2, 'Css'),
(3, 'Php'),
(4, 'Python'),
(5, 'Android'),
(6, 'VueJs'),
(7, 'React');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `city_id`) VALUES
(1, 'Ali', 1),
(12, 'AGFPsE', 1),
(13, 'Cwvqpd', 1),
(14, 'Pkyoxr', 5),
(15, 'Kztsvt', 0),
(16, 'Sxtcmx', 3),
(17, 'Rlcdvg', 2),
(18, 'Qbmghc', 7);

-- --------------------------------------------------------

--
-- Table structure for table `userskills`
--

CREATE TABLE `userskills` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userskills`
--

INSERT INTO `userskills` (`id`, `user_id`, `skill_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 5),
(5, 1, 1),
(6, 10, 0),
(7, 10, 1),
(8, 10, 2),
(9, 10, 3),
(10, 10, 4),
(11, 10, 6),
(12, 11, 0),
(13, 11, 2),
(14, 12, 0),
(15, 12, 1),
(16, 12, 4),
(17, 12, 5),
(18, 12, 6),
(19, 13, 0),
(20, 13, 5),
(21, 14, 0),
(22, 14, 1),
(23, 14, 2),
(24, 14, 3),
(25, 14, 6),
(26, 15, 0),
(27, 15, 1),
(28, 15, 2),
(29, 15, 3),
(30, 15, 4),
(31, 15, 5),
(32, 15, 6),
(33, 16, 1),
(34, 16, 2),
(35, 16, 4),
(36, 16, 5),
(37, 16, 6),
(38, 17, 0),
(39, 17, 1),
(40, 17, 2),
(41, 17, 3),
(42, 17, 4),
(43, 17, 5),
(44, 17, 6),
(45, 18, 0),
(46, 18, 1),
(47, 18, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userskills`
--
ALTER TABLE `userskills`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `userskills`
--
ALTER TABLE `userskills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
