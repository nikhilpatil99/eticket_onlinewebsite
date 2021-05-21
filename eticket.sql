-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2020 at 01:16 PM
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
-- Database: `eticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus_info`
--

CREATE TABLE `bus_info` (
  `match_no` varchar(30) NOT NULL,
  `match_name` varchar(30) NOT NULL,
  `match_date` varchar(255) NOT NULL,
  `match_time` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_info`
--

INSERT INTO `bus_info` (`match_no`, `match_name`, `match_date`, `match_time`, `location`) VALUES
('1', 'India VS Pakistan', '2020-09-09', '9:00 AM', 'Eden Gardens');

-- --------------------------------------------------------

--
-- Table structure for table `bus_type`
--

CREATE TABLE `bus_type` (
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_type`
--

INSERT INTO `bus_type` (`name`) VALUES
('5'),
('4'),
('3'),
('2'),
('1');

-- --------------------------------------------------------

--
-- Table structure for table `company_info`
--

CREATE TABLE `company_info` (
  `name` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_info`
--

INSERT INTO `company_info` (`name`, `address`, `email`, `phone`) VALUES
('KITCOEK', 'Kolhapur', 'kitcoek@gmail.com', '0231232930');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `name` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`name`, `contact`, `phone`) VALUES
('Eden Gardens', 'Kolkata, West Bengal', '033 2248 0411'),
('Wankhede Stadium', 'Maharashtra', '033 2248 0412'),
('Raipur International Cricket S', 'Chhattisgarh', '033 2248 0413');

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `name` varchar(255) NOT NULL,
  `route` varchar(30) NOT NULL,
  `amount` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`name`, `route`, `amount`) VALUES
('1', 'Platinum', '7000'),
('2', 'Platinum', '14000');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `name` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`name`) VALUES
('Administrator'),
('User');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `route_name` varchar(30) NOT NULL,
  `avail_ticket` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`route_name`, `avail_ticket`) VALUES
('Platinum', '98');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `date_issue` date NOT NULL,
  `date_travel` date NOT NULL,
  `route` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `ticketid` varchar(30) NOT NULL,
  `fare_amount` varchar(30) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `total_amount` varchar(30) NOT NULL,
  `payment_status` varchar(30) NOT NULL,
  `vehicle_number` varchar(30) NOT NULL,
  `dep_time` varchar(30) NOT NULL,
  `bus_type` varchar(30) NOT NULL,
  `user` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`date_issue`, `date_travel`, `route`, `firstname`, `lastname`, `ticketid`, `fare_amount`, `phone_number`, `total_amount`, `payment_status`, `vehicle_number`, `dep_time`, `bus_type`, `user`, `location`) VALUES
('2020-04-03', '2020-09-09', 'Platinum', 'Nikhil', 'Patil', 'Platinum0092', '14000', '9011679090', '14000', 'Paid', 'India VS Pakistan', ' 9:00 AM', '2', 'nik', 'Eden Gardens');

-- --------------------------------------------------------

--
-- Table structure for table `ticketid`
--

CREATE TABLE `ticketid` (
  `number` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticketid`
--

INSERT INTO `ticketid` (`number`) VALUES
('93');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_name` varchar(30) NOT NULL,
  `password` varchar(70) NOT NULL,
  `right` varchar(30) NOT NULL,
  `location` varchar(255) NOT NULL,
  `email` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_name`, `password`, `right`, `location`, `email`) VALUES
('nik', '99', 'User', 'Eden Gardens', 'patilnikhil9090@gmail.com'),
('admin', 'admin', 'Administrator', 'Wankhede Stadium', 'admin@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD UNIQUE KEY `route_name` (`route_name`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD UNIQUE KEY `ticketid` (`ticketid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
