-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 27, 2018 at 06:25 AM
-- Server version: 5.7.20
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabella1`
--

CREATE TABLE `tabella1` (
  `id` int(11) NOT NULL,
  `data` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tabella1`
--

INSERT INTO `tabella1` (`id`, `data`) VALUES
(8, '2018-03-01 00:00:00'),
(9, '2018-01-01 00:00:00'),
(10, '2017-03-01 00:00:00'),
(11, '2016-03-01 00:00:00'),
(12, '2010-03-01 00:00:00'),
(13, '1990-03-01 00:00:00'),
(14, '1980-03-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tabella2`
--

CREATE TABLE `tabella2` (
  `id` int(11) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tabella2`
--

INSERT INTO `tabella2` (`id`, `data`) VALUES
(1, '2017-11-13 00:00:00'),
(2, '1995-11-13 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabella1`
--
ALTER TABLE `tabella1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabella2`
--
ALTER TABLE `tabella2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabella1`
--
ALTER TABLE `tabella1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tabella2`
--
ALTER TABLE `tabella2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
