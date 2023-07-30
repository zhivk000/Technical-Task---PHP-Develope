-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30 юли 2023 в 16:49
-- Версия на сървъра: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `credit_test`
--

-- --------------------------------------------------------

--
-- Структура на таблица `credits`
--

CREATE TABLE `credits` (
  `credit_no` int(50) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `credit` int(50) DEFAULT NULL,
  `term` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Схема на данните от таблица `credits`
--

INSERT INTO `credits` (`credit_no`, `name`, `credit`, `term`) VALUES
(3, 'name', 213, 1),
(4, 'name2', 1234, 1),
(5, 'zhivko', 80000, 1),
(6, 'name3', 50000, 10);

-- --------------------------------------------------------

--
-- Структура на таблица `payments`
--

CREATE TABLE `payments` (
  `payment_no` int(50) NOT NULL,
  `credit_no` int(50) DEFAULT NULL,
  `payment` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Схема на данните от таблица `payments`
--

INSERT INTO `payments` (`payment_no`, `credit_no`, `payment`) VALUES
(7, 5, 3000),
(8, 5, 5000),
(10, 5, 72000),
(11, 3, 213),
(12, 6, 50000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credits`
--
ALTER TABLE `credits`
  ADD PRIMARY KEY (`credit_no`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_no`),
  ADD KEY `credit_no` (`credit_no`),
  ADD KEY `credit_no_2` (`credit_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credits`
--
ALTER TABLE `credits`
  MODIFY `credit_no` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_no` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`credit_no`) REFERENCES `credits` (`credit_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
