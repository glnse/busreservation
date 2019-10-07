-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2019 at 04:10 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

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
  `id` int(11) NOT NULL,
  `bus_name` varchar(100) NOT NULL,
  `status` varchar(10) DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obr_buses`
--

INSERT INTO `obr_buses` (`id`, `bus_name`, `status`) VALUES
(1, 'Lorem Ipsum', 'available'),
(2, 'Bus Name', 'available');

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
  `purpose` text NOT NULL,
  `remarks` text NOT NULL,
  `status` varchar(10) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obr_requests`
--

INSERT INTO `obr_requests` (`id`, `fname`, `lname`, `contact`, `email`, `address`, `purpose`, `remarks`, `status`) VALUES
(1, 'Juan', 'Dela Cruz', '09672105875', 'darko05.gt@gmail.com', 'darko05.gt@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Id exercitationem, voluptatem accusantium, inventore nesciunt suscipit error ipsum expedita deleniti tenetur adipisci nam, fuga unde qui quisquam ipsam quos consequatur! Sed!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Id exercitationem, voluptatem accusantium, inventore nesciunt suscipit error ipsum expedita deleniti tenetur adipisci nam, fuga unde qui quisquam ipsam quos consequatur! Sed!', 'pending'),
(2, 'Juan', 'Dela Cruz', '09999999999', 'juandelacruz@gmail.com', 'Lingayen, Pangasinan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores officia reiciendis, optio magni accusantium earum eaque provident asperiores dignissimos, impedit dolores natus animi esse quos blanditiis explicabo accusamus corrupti minus.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores officia reiciendis, optio magni accusantium earum eaque provident asperiores dignissimos, impedit dolores natus animi esse quos blanditiis explicabo accusamus corrupti minus.', 'pending');

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
(1, 'pgo', '1618cdbd6e3c266ee2406d77e3601eb0', 'pgo'),
(2, 'engineer', '1618cdbd6e3c266ee2406d77e3601eb0', 'engineer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `obr_buses`
--
ALTER TABLE `obr_buses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obr_requests`
--
ALTER TABLE `obr_requests`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `obr_requests`
--
ALTER TABLE `obr_requests`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `obr_users`
--
ALTER TABLE `obr_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
