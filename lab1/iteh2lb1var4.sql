-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2020 at 02:56 AM
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
-- Database: `iteh2lb1var4`
--

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `id_nurse` int(11) NOT NULL,
  `name` text NOT NULL,
  `date` date NOT NULL,
  `department` int(11) NOT NULL,
  `shift` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`id_nurse`, `name`, `date`, `department`, `shift`) VALUES
(1, 'ivanova', '2021-12-20', 1, 'First'),
(2, 'petrova', '2022-12-20', 2, 'Third'),
(3, 'sidorova', '2023-12-20', 3, 'Second'),
(4, 'egorova', '2024-12-20', 4, 'First'),
(5, 'testname', '2020-06-03', 1, 'First');

-- --------------------------------------------------------

--
-- Table structure for table `nurse_ward`
--

CREATE TABLE `nurse_ward` (
  `fid_nurse` int(11) NOT NULL,
  `fid_ward` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nurse_ward`
--

INSERT INTO `nurse_ward` (`fid_nurse`, `fid_ward`) VALUES
(1, 1),
(4, 1),
(4, 2),
(3, 2),
(3, 3),
(2, 1),
(5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

CREATE TABLE `ward` (
  `id_ward` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ward`
--

INSERT INTO `ward` (`id_ward`, `name`) VALUES
(1, 'WardFirst'),
(2, 'WardSecond'),
(3, 'WardThird'),
(4, 'test'),
(5, 'testname');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`id_nurse`),
  ADD UNIQUE KEY `id_nurse` (`id_nurse`);

--
-- Indexes for table `nurse_ward`
--
ALTER TABLE `nurse_ward`
  ADD KEY `fid_nurse` (`fid_nurse`),
  ADD KEY `fid_ward` (`fid_ward`);

--
-- Indexes for table `ward`
--
ALTER TABLE `ward`
  ADD PRIMARY KEY (`id_ward`),
  ADD UNIQUE KEY `id_ward` (`id_ward`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nurse_ward`
--
ALTER TABLE `nurse_ward`
  ADD CONSTRAINT `nurse_ward_ibfk_1` FOREIGN KEY (`fid_nurse`) REFERENCES `nurse` (`id_nurse`),
  ADD CONSTRAINT `nurse_ward_ibfk_2` FOREIGN KEY (`fid_ward`) REFERENCES `ward` (`id_ward`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
