-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 17, 2019 at 07:22 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `busreservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `obr_buses`
--

CREATE TABLE `obr_buses` (
  `id` int(255) NOT NULL,
  `bus_name` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Available',
  `driver_name` varchar(100) DEFAULT NULL,
  `place` varchar(500) DEFAULT NULL,
  `mvfile_no` varchar(100) NOT NULL,
  `plate_no` varchar(10) NOT NULL,
  `engine_no` varchar(50) NOT NULL,
  `chassis_no` varchar(100) NOT NULL,
  `denomination` varchar(100) NOT NULL,
  `piston_displacement` varchar(100) NOT NULL,
  `no_of_cylinders` varchar(100) NOT NULL,
  `fuel` varchar(100) NOT NULL,
  `make` varchar(100) NOT NULL,
  `series` varchar(100) NOT NULL,
  `body_type` varchar(100) NOT NULL,
  `body_no` varchar(100) NOT NULL,
  `year_model` varchar(4) NOT NULL,
  `gross_wt` varchar(100) NOT NULL,
  `net_wt` varchar(100) NOT NULL,
  `shipping_wt` varchar(100) NOT NULL,
  `net_capacity` varchar(100) NOT NULL,
  `or_no` varchar(100) NOT NULL,
  `or_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `obr_history`
--

CREATE TABLE `obr_history` (
  `id` int(255) NOT NULL,
  `log_body` text NOT NULL,
  `date_log` date NOT NULL,
  `bus_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `obr_requests`
--

CREATE TABLE `obr_requests` (
  `id` int(255) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `contact` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `company` varchar(500) NOT NULL,
  `purpose` text NOT NULL,
  `remarks` text NOT NULL,
  `status` varchar(10) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `obr_schedules`
--

CREATE TABLE `obr_schedules` (
  `id` int(255) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `request_id` int(255) NOT NULL,
  `reserve_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `obr_users`
--

CREATE TABLE `obr_users` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pw` varchar(32) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obr_users`
--

INSERT INTO `obr_users` (`id`, `username`, `pw`, `role`) VALUES
(1, 'pgo', 'e87632157a7ea2f03deb124b2f2e2219', 'pgo'),
(2, 'engineer', 'e87632157a7ea2f03deb124b2f2e2219', 'engineer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `obr_buses`
--
ALTER TABLE `obr_buses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obr_history`
--
ALTER TABLE `obr_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obr_requests`
--
ALTER TABLE `obr_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obr_schedules`
--
ALTER TABLE `obr_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obr_users`
--
ALTER TABLE `obr_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `obr_buses`
--
ALTER TABLE `obr_buses`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `obr_history`
--
ALTER TABLE `obr_history`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `obr_requests`
--
ALTER TABLE `obr_requests`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `obr_schedules`
--
ALTER TABLE `obr_schedules`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `obr_users`
--
ALTER TABLE `obr_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
