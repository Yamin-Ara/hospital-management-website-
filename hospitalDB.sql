-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2021 at 12:03 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `App_Num` int(11) NOT NULL,
  `Date_time` datetime NOT NULL,
  `doc_ID` int(11) NOT NULL,
  `nurse_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`App_Num`, `Date_time`, `doc_ID`, `nurse_ID`) VALUES
(100, '2021-05-21 10:00:00', 1, 2),
(102, '2021-05-18 11:00:00', 2, 3),
(103, '2021-05-11 16:00:00', 3, 4),
(106, '2021-05-11 13:00:00', 1, 1),
(107, '2021-05-10 16:30:00', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `cares`
--

CREATE TABLE `cares` (
  `p_ID` int(11) NOT NULL,
  `nurse_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cares`
--

INSERT INTO `cares` (`p_ID`, `nurse_ID`) VALUES
(1, 1),
(1, 2),
(2, 4),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `Doc_Name` varchar(25) NOT NULL,
  `doc_ID` int(11) NOT NULL,
  `Department` varchar(45) NOT NULL,
  `Visiting_hour` varchar(11) NOT NULL,
  `Mobile_num` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`Doc_Name`, `doc_ID`, `Department`, `Visiting_hour`, `Mobile_num`) VALUES
('Mike', 1, 'A', '09:00-11:00', '2356788'),
('Sandra ', 2, 'B', '11:00-13:00', '8753765'),
('Derek', 3, 'C', '15:00-18:00', '3459871');

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `Name` varchar(25) NOT NULL,
  `nurse_ID` int(11) NOT NULL,
  `Department` varchar(45) NOT NULL,
  `Password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`Name`, `nurse_ID`, `Department`, `Password`) VALUES
('Anne', 1, 'A', '1234'),
('Abbe', 2, 'A', '2345'),
('Deb', 3, 'B', '12345678'),
('Ash', 4, 'C', '87654321');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `Name` varchar(25) NOT NULL,
  `p_ID` int(11) NOT NULL,
  `Cell_num` varchar(14) NOT NULL,
  `Address` varchar(455) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`Name`, `p_ID`, `Cell_num`, `Address`) VALUES
('Henry Lupin', 1, '01716375890', 'Dhaka'),
('Wilson Grey', 2, '01820462751', 'Sylhet'),
('Jamil Karim', 3, '01682316789', 'Dhaka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`App_Num`),
  ADD KEY `doc_ID` (`doc_ID`,`nurse_ID`),
  ADD KEY `nurse_ID` (`nurse_ID`);

--
-- Indexes for table `cares`
--
ALTER TABLE `cares`
  ADD KEY `p_ID` (`p_ID`,`nurse_ID`),
  ADD KEY `nurse_ID` (`nurse_ID`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doc_ID`),
  ADD KEY `doc_ID` (`doc_ID`),
  ADD KEY `doc_ID_2` (`doc_ID`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`nurse_ID`),
  ADD UNIQUE KEY `Password` (`Password`),
  ADD KEY `nurse_ID` (`nurse_ID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`p_ID`),
  ADD KEY `p_ID` (`p_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `App_Num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doc_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `nurse_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `p_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`nurse_ID`) REFERENCES `nurse` (`nurse_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`doc_ID`) REFERENCES `doctor` (`doc_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `cares`
--
ALTER TABLE `cares`
  ADD CONSTRAINT `cares_ibfk_1` FOREIGN KEY (`nurse_ID`) REFERENCES `nurse` (`nurse_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cares_ibfk_2` FOREIGN KEY (`p_ID`) REFERENCES `patient` (`p_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nurse`
--
ALTER TABLE `nurse`
  ADD CONSTRAINT `nurse_ibfk_1` FOREIGN KEY (`Password`) REFERENCES `users` (`password`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
