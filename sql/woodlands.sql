-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2020 at 05:17 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `woodlands`
--

-- --------------------------------------------------------

--
-- Table structure for table `case_letters`
--

CREATE TABLE `case_letters` (
  `case_id` int(8) NOT NULL,
  `letter_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `case_papers`
--

CREATE TABLE `case_papers` (
  `case_id` int(8) NOT NULL,
  `UCAS_id` int(5) NOT NULL,
  `date_created` date NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'CONDITIONAL',
  `archive` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `case_papers`
--

INSERT INTO `case_papers` (`case_id`, `UCAS_id`, `date_created`, `status`, `archive`) VALUES
(20100516, 101, '2020-02-23', 'CONDITIONAL', 0),
(20100517, 102, '2020-02-23', 'CONDITIONAL', 0),
(20100529, 103, '2020-02-23', 'CONDITIONAL', 0),
(20100530, 104, '2020-02-23', 'CONDITIONAL', 0);

-- --------------------------------------------------------

--
-- Table structure for table `offer_letters`
--

CREATE TABLE `offer_letters` (
  `letter_id` int(10) NOT NULL,
  `letter_body` text NOT NULL,
  `letter_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ucas`
--

CREATE TABLE `ucas` (
  `UCAS_id` int(5) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `sur_name` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `recent_grade` varchar(10) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` text NOT NULL,
  `contact` varchar(255) NOT NULL,
  `case_status` tinyint(1) NOT NULL,
  `unconditional` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ucas`
--

INSERT INTO `ucas` (`UCAS_id`, `first_name`, `sur_name`, `course_name`, `email`, `recent_grade`, `gender`, `date_of_birth`, `address`, `contact`, `case_status`, `unconditional`) VALUES
(101, 'Surya ', 'Kedem', 'BSc Computing', 'suryakedem@email.com', 'A', 'M', '2000-12-01', 'Taplejung, Nepal', '9812345678', 1, 1),
(102, 'Shankar', 'Basukala', 'BSc Computing', 'basuShankar@gmail.com', 'A-', 'M', '2001-01-01', 'Pokhara, Nepal', '9812027819', 1, 1),
(103, 'Alina', 'Sharma', 'BSc Computing', 'sharmaAlina@gmail.com', 'C', 'F', '1997-02-13', 'Dolakha, Nepal', '9183720192', 1, 1),
(104, 'Sujan', 'Dangol', 'BSc Computing', 'dangolSujan@gmail.com', 'pending', 'M', '1998-10-26', 'Kharipati, Nepal', '9212091029', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `case_letters`
--
ALTER TABLE `case_letters`
  ADD KEY `case_id` (`case_id`),
  ADD KEY `letter_id` (`letter_id`);

--
-- Indexes for table `case_papers`
--
ALTER TABLE `case_papers`
  ADD PRIMARY KEY (`case_id`),
  ADD UNIQUE KEY `UCAS_id` (`UCAS_id`);

--
-- Indexes for table `offer_letters`
--
ALTER TABLE `offer_letters`
  ADD PRIMARY KEY (`letter_id`);

--
-- Indexes for table `ucas`
--
ALTER TABLE `ucas`
  ADD PRIMARY KEY (`UCAS_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `case_papers`
--
ALTER TABLE `case_papers`
  MODIFY `case_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20100532;

--
-- AUTO_INCREMENT for table `offer_letters`
--
ALTER TABLE `offer_letters`
  MODIFY `letter_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `case_letters`
--
ALTER TABLE `case_letters`
  ADD CONSTRAINT `case_letters_ibfk_1` FOREIGN KEY (`case_id`) REFERENCES `case_papers` (`case_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `case_letters_ibfk_2` FOREIGN KEY (`letter_id`) REFERENCES `offer_letters` (`letter_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `case_papers`
--
ALTER TABLE `case_papers`
  ADD CONSTRAINT `case_papers_ibfk_1` FOREIGN KEY (`UCAS_id`) REFERENCES `ucas` (`UCAS_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
