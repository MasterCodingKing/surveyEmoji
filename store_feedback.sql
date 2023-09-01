-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2023 at 10:46 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store_feedback`
--

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `id` int(11) NOT NULL,
  `device_name` varchar(50) NOT NULL,
  `serial` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`id`, `device_name`, `serial`) VALUES
(1, 'COUNTER 1', '009jlj'),
(2, 'COUNTER 2', '855kj'),
(3, 'COUNTER 3', '8698hf'),
(4, 'COUNTER 4', '5555'),
(5, 'COUNTER 5', '4667');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `Devices` varchar(50) NOT NULL,
  `store_code` varchar(50) NOT NULL,
  `rating_code` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `Devices`, `store_code`, `rating_code`, `date_time`) VALUES
(248, '855kj', '140', 5, '2023-05-18 05:13:11'),
(249, '5555', '140', 4, '2023-05-18 05:13:34'),
(250, '4667', '140', 2, '2023-05-18 05:13:46'),
(251, '8698hf', '100', 4, '2023-05-25 07:12:03'),
(252, '8698hf', '100', 4, '2023-06-08 08:21:26'),
(253, '8698hf', '140', 2, '2023-06-08 08:22:48'),
(254, '009jlj', '140', 4, '2023-06-08 08:23:19');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rating_code` int(11) NOT NULL,
  `rating_description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rating_code`, `rating_description`) VALUES
(1, 'Very Happy'),
(2, 'Happy'),
(3, 'Sad'),
(4, 'Angry');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `store_code` varchar(50) NOT NULL,
  `store_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `store_code`, `store_name`) VALUES
(1, '140', 'TABACO SUPERMARKET'),
(2, '100', 'TABACO DEPARTMENT STORE'),
(3, '300\n', 'LEGAZPI DEPARTMENT STORE'),
(4, '340', 'LEGAZPI SUPERMARKET');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_code`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `device`
--
ALTER TABLE `device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
