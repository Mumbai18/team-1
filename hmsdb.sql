-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2018 at 02:08 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointmenttb`
--

CREATE TABLE `appointmenttb` (
  `id` int(10) NOT NULL,
  `fname` varchar(80) NOT NULL,
  `lname` varchar(80) NOT NULL,
  `age` varchar(80) NOT NULL,
  `contact` varchar(80) NOT NULL,
  `cancer` varchar(80) NOT NULL,
  `cancer_stage` varchar(10) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `location` varchar(40) NOT NULL,
  `income` int(10) NOT NULL,
  `verify` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointmenttb`
--

INSERT INTO `appointmenttb` (`id`, `fname`, `lname`, `age`, `contact`, `cancer`, `cancer_stage`, `sex`, `location`, `income`, `verify`) VALUES
(1, 'Rajesh', 'Raj', '30', '566423322', 'Bladder Cancer', 'Stage 1', 'Male', 'Ghatkopar', 10000, 'Not Verified'),
(2, 'Ramesh', 'Chanda', '35', '123456789', 'Kidney', 'Stage 3', 'Female', 'location', 10000, 'verify'),
(3, 'Ramesh', 'Prasad', '30', '1235566858', 'Bladder Cancer', 'Stage 3', 'Female', 'location', 3000, 'verify');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `id` int(11) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `contact` int(11) NOT NULL,
  `nationality` varchar(40) NOT NULL,
  `purpose` varchar(20) NOT NULL,
  `donation_amt` int(20) NOT NULL,
  `acc_no` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `pan_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`id`, `uname`, `pwd`, `fname`, `lname`, `contact`, `nationality`, `purpose`, `donation_amt`, `acc_no`, `date`, `pan_no`) VALUES
(2, 'Suresh', '123', 'Suresh', 'Kamal', 1235566858, 'Indian', 'General', 0, '', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `type` varchar(10) NOT NULL,
  `feedback` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logintb`
--

CREATE TABLE `logintb` (
  `username` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logintb`
--

INSERT INTO `logintb` (`username`, `password`) VALUES
('admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE `volunteer` (
  `id` int(10) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `age` int(10) NOT NULL,
  `contact` int(20) NOT NULL,
  `cancer` varchar(40) NOT NULL,
  `cancer_stage` varchar(40) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `location` varchar(20) NOT NULL,
  `income` int(10) NOT NULL,
  `verify` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `volunteer`
--

INSERT INTO `volunteer` (`id`, `uname`, `pwd`, `fname`, `lname`, `age`, `contact`, `cancer`, `cancer_stage`, `sex`, `location`, `income`, `verify`) VALUES
(1, 'Sudha', '123', 'Sudha', 'Prasad', 25, 985655667, 'Kidney', 'Stage 3', 'Female', 'location', 10000, 'verify');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointmenttb`
--
ALTER TABLE `appointmenttb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointmenttb`
--
ALTER TABLE `appointmenttb`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `volunteer`
--
ALTER TABLE `volunteer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
