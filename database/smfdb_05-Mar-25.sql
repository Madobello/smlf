-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2025 at 11:35 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smfdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `phone`, `email`, `password`, `regdate`, `status`) VALUES
(5, 'Paul Marie Madeleine', 'ISINGIZWE', '+250788758919', 'isingizwemariemadeleine99@gmail.com', '$2y$10$nt6NikZk5ABjLLrYM0b9XONppjE8cMrCpmh0Ya8Ednm.37PNZ5Gje', '2025-02-19 05:42:03', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `carid` int(11) NOT NULL,
  `carname` varchar(20) NOT NULL,
  `cartype` varchar(20) NOT NULL,
  `carmodel` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `adminid` int(255) NOT NULL,
  `garagename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`carid`, `carname`, `cartype`, `carmodel`, `country`, `adminid`, `garagename`) VALUES
(1, 'BMW', 'Hybrid', 'Jeep', 'Germany', 5, 'Atecar'),
(2, 'PRIUS', 'Electric (EV)', 'Toyota', 'Japan', 5, 'Orange Garage'),
(3, 'Pajero', 'Diesel', 'Mitsubishi', 'Japan', 5, 'Luna Auto'),
(4, 'T-Cross', 'Diesel', 'Volkswagen', 'Germany', 5, 'Auto Express Garage'),
(5, 'Altis', 'Diesel', 'Toyota', 'Germany', 5, 'AutoXpress'),
(6, 'Sonata', 'Diesel', 'Hundai', 'Germany', 5, 'Gatsata Shop'),
(7, 'K5', 'Hybrid', 'KIA', 'Korea', 5, 'AutoSpare'),
(8, 'Seoul', 'Hybrid', 'Jeep', 'Korea', 5, 'Bello Auto'),
(9, 'Ferrari', 'Diesel', 'Fuel', 'England', 5, 'Nyabugogo Garage');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(255) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `firstname`, `lastname`, `phone`, `email`, `password`) VALUES
(8, 'nisingizwe', 'jean aime', '+250787936791', 'jetaimetech@gmail.com', '$2y$10$SGprq/6wlkiydNlAxJu2tOWu0Hxzpub1IzJeAudd5IEEXmdSMkP86'),
(9, 'paul marie madeleine', 'isingizwe', '+250788758919', 'isingizwemariemadeleine99@gmail.com', '$2y$10$ToW1by0OiDtGLl2onxzPFuNdbalP0lSPxgqhj7Ht0yHj.nvYIspZy'),
(10, 'cedrick', 'cedrick', '+250784366616', 'cedrickhakuzimana@gmail.com', '$2y$10$LgaOG3Zmz1dVKBwaP9Lyb.50npJ9Ge/Eoyi99FZtPTx/./xOyzWfm'),
(11, 'bello', 'bb', '+250783109457', 'bello@gmail.com', '$2y$10$pqWwUn0ntAfCJ6ZQgMa0r.6hU27G9p1oVi4lKiVGkkNPXZFAKMQT.'),
(12, 'luna', 'luna', '+250788443984', 'luna@gmail.com', '$2y$10$qcpnArijsFNYDtCG4MIFeOUqSGiM/tVd/P4jfpfSnRKOp8piA8eKK'),
(13, 'slyvie', 'rolande', '+250788865695', 'rolande@gmail.com', '$2y$10$EovbkO3Z4TUUJAqWyRRSV.A9sBRk1a43/2fu2q8Ub0E7ByZa1sKpW'),
(14, 'danny', 'idukundatwese', '+250788984609', 'idtdanny@gmail.com', '$2y$10$Wb8aUc7AZtKUuN1D3qiFxuADJCMxiSyb/md23ZqefT3eqryDve4w.');

-- --------------------------------------------------------

--
-- Table structure for table `garage`
--

CREATE TABLE `garage` (
  `id` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `province` text NOT NULL,
  `district` text NOT NULL,
  `sector` text NOT NULL,
  `village` text NOT NULL,
  `maplink` text NOT NULL,
  `aboutus` text NOT NULL,
  `profileimg` varchar(500) NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `adminid` int(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `garage`
--

INSERT INTO `garage` (`id`, `name`, `email`, `phone`, `province`, `district`, `sector`, `village`, `maplink`, `aboutus`, `profileimg`, `regdate`, `adminid`, `password`) VALUES
(30, 'Orange garage', 'orangegarage2022@gmail.com', '+250 788-308-413', 'kigali', 'Gasabo', 'Gatsata', 'Karuruma', '', 'car wash and repair', 'pic6.PNG', '2025-03-04 21:08:45', 5, '1234'),
(32, 'AutoSpare', 'auto2@gmail.com', '+250788621344', 'north', 'Musanze', 'Musanze', 'Busogo', '', '', 'pic5.PNG', '2025-03-04 21:08:54', 32, '123'),
(33, 'Bello Auto', 'bello@gmail.com', '+250783109457', 'east', 'Nyagatare', 'Gatunda', 'Kinazi', '', 'MAINTENANCE', 'Capture.PNG', '2025-03-04 21:09:17', 5, '123'),
(34, 'Gogo Shop', 'gogo@gmail.com', '+250788291019', 'kigali', 'Gasabo', 'Jabana', 'Kabeza', '', 'car wash', 'pic2.PNG', '2025-03-04 21:09:25', 34, '123'),
(36, 'AutoXpress', 'xpress@gmail.com', '+2500787314574', 'kigali', 'Kicukiro', 'Gahanga', 'gahanga', 'https://maps.app.goo.gl/Svyo768pQ79wTyUZ9', 'auto repair', '', '2025-03-04 21:09:32', 36, '123'),
(37, 'FFSpare', 'ff@gmail.com', '+250788567930', 'west', 'Nyabihu', 'Mukamira', 'Rwankeri', '', '', '', '2025-03-04 21:09:40', 0, '123'),
(31, 'Auto Express Garage', 'auto2@gmail.com', '+250788939001', 'north', 'Musanze', 'Musanze', 'Busogo', 'https://maps.app.goo.gl/BNtYjbFNteZiNTav8', 'However, accessing reliable and timely assistance remains a significant challenge, particularly in regions where access to such services is limited or fragmented. Globally, the proliferation of digital technologies has transformed various sectors, including automotive services. Web-based car repair and assistance applications have emerged as innovative solutions to address the needs of drivers, offering convenience, efficiency, and accessibility. These platforms leverage the power of the internet and location-based services to connect drivers with nearby repair shops, roadside assistance providers, and other related services.\r\n', 'pic7.jpg', '2025-03-04 21:09:49', 5, ''),
(26, 'Nyabugogo Garage', 'garage@gmail.com', '+250783109457', 'kigali', 'Gasabo', 'Jabana', 'Rugarama', '', 'However, accessing reliable and timely assistance remains a significant challenge, particularly in regions where access to such services is limited or fragmented. Globally, the proliferation of digital technologies has transformed various sectors, including automotive services. Web-based car repair and assistance applications have emerged as innovative solutions to address the needs of drivers, offering convenience, efficiency, and accessibility. These platforms leverage the power of the internet and location-based services to connect drivers with nearby repair shops, roadside assistance providers, and other related services.\r\n', 'pic1.PNG', '2025-03-04 21:10:07', 5, '123'),
(28, 'Gatsata Shop', 'gatsata@gmail.com', '+250786673889', 'kigali', 'Gasabo', 'Gatsata', 'Akamatamu', '', '', 'recent-blog-3.jpg', '2025-03-04 21:10:17', 5, '12'),
(29, 'Luna Auto', 'luna@gmail.com', '+250788443984', 'kigali', 'Gasabo', 'Jabana', 'Gihinga', '', '', 'pic2.PNG', '2025-03-04 21:10:28', 5, '1234'),
(38, 'atecar', 'atecar@gmail.com', '+250780490702', 'kigali', 'Kicukiro', 'Gahanga', 'gahanga', 'https://maps.app.goo.gl/KPXvfWA2VNeTtbjTA', 'Repair and Maintenance', 'atecar.jpg', '2025-03-04 22:09:16', 38, '123');

-- --------------------------------------------------------

--
-- Table structure for table `garageservice`
--

CREATE TABLE `garageservice` (
  `id` int(255) NOT NULL,
  `garagename` varchar(255) NOT NULL,
  `servicename` text NOT NULL,
  `description` text NOT NULL,
  `carname` varchar(255) NOT NULL,
  `cartype` varchar(255) NOT NULL,
  `ton` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `adminid` int(255) NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `price` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `garageservice`
--

INSERT INTO `garageservice` (`id`, `garagename`, `servicename`, `description`, `carname`, `cartype`, `ton`, `image`, `adminid`, `regdate`, `price`) VALUES
(5, 'kalimu garage ltd', 'car wash', 'However, accessing reliable and timely assistance remains a significant challenge, particularly in regions where access to such services is limited or fragmented. Globally, the proliferation of digital technologies has transformed various sectors, including automotive services. Web-based car repair and assistance applications have emerged as innovative solutions to address the needs of drivers, offering convenience, efficiency, and accessibility. These platforms leverage the power of the internet and location-based services to connect drivers with nearby repair shops, roadside assistance providers, and other related services.\r\n', '', '', '', 'recent-blog-3.jpg', 3, '2025-02-02 15:47:41', '10000'),
(6, 'a', 'car wash', 'Car Repair and Assistance Application welcome, a !', '', '', '', 'Capture.PNG', 23, '2025-02-02 14:26:44', '23000'),
(7, 'luna', 'repair', 'repair', '', '', '', 'download.jpg', 29, '2025-02-19 09:23:16', '10000'),
(8, 'luna', 'repair and maintenance', 'Orange Garage and Spare Parts specializes in providing top-quality services for V8 cars. We are committed to offering the best automotive solutions to our clients.\r\nExpert maintenance and repair services for V8 cars.\r\nHigh-quality spare parts specifically designed for V8 engines.\r\nDedicated team providing exceptional customer service and support.', '', '', '', '', 5, '2025-02-22 07:27:25', '150000'),
(9, 'nyabugogo', 'service nshya', 'kumena amavuta', 'BMW200', 'long vehicle', '1T', '', 26, '2025-03-01 12:32:17', '30000'),
(2, 'Gogo', 'car wash', 'These platforms leverage the power of the internet and location-based services to connect drivers with nearby repair shops, roadside assistance providers, and other related services.', 'Toyota', 'short vehicle', 'Hybrid', '', 0, '2025-03-03 12:05:02', '10000'),
(10, 'autoxpress', 'auto repair', 'auto repair', 'Ford', 'short vehicle', 'T2', 'pic8.PNG', 36, '2025-03-03 13:45:02', '60000'),
(11, 'atecar', 'car lighting', 'Troubleshooting Car Lights', '', '', '', '', 38, '2025-03-04 10:55:34', '10000');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `garagename` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `servicedescription` text DEFAULT NULL,
  `dat` datetime DEFAULT NULL,
  `appointment` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `garagename`, `firstname`, `lastname`, `email`, `phone`, `servicedescription`, `dat`, `appointment`) VALUES
(2, 'kazi ni kazi garage', 'cedrick', 'cedrick', 'cedrickhakuzimana@gmail.com', '+250784366616', 'garage yayyy', '2025-02-06 10:42:11', ''),
(3, 'atecar garage', 'cedrick', 'cedrick', 'cedrickhakuzimana@gmail.com', '+250784366616', 'dddzaaraqatawg', '2025-02-06 10:45:07', ''),
(4, 'umurimo unoze garage', 'bello', 'bb', 'bello@gmail.com', '+250783109457', 'repair', '2025-02-08 07:55:52', ''),
(5, 'umurimo unoze garage', 'bello', 'bb', 'bello@gmail.com', '+250783109457', 'maintenance', '2025-02-08 07:56:11', ''),
(6, 'kazi ni kazi garage', 'bello', 'bb', 'bello@gmail.com', '+250783109457', 'maintenance', '2025-02-08 07:57:16', ''),
(7, 'kazi ni kazi garage', 'bello', 'bb', 'bello@gmail.com', '+250783109457', 'maintanance', '2025-02-08 07:58:30', ''),
(8, 'kazi ni kazi garage', 'bello', 'bb', 'bello@gmail.com', '+250783109457', 'repair', '2025-02-19 10:09:44', ''),
(9, 'luna', 'bello', 'bb', 'bello@gmail.com', '+250783109457', 'maintenance ', '2025-02-19 10:19:09', ''),
(10, 'nyabugogo', 'danny', 'idukundatwese', 'idtdanny@gmail.com', '+250788984609', 'Dealt', '2025-03-04 12:15:59', ''),
(11, 'atecar', 'danny', 'idukundatwese', 'idtdanny@gmail.com', '+250788984609', 'Fixing Light', '2025-03-04 12:18:41', 'Approved'),
(13, 'atecar', 'danny', 'idukundatwese', 'idtdanny@gmail.com', '+250788984609', 'Engine Failure', '2025-03-04 13:24:32', '');

-- --------------------------------------------------------

--
-- Table structure for table `systeminfo`
--

CREATE TABLE `systeminfo` (
  `id` int(255) NOT NULL,
  `name` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `logo` text NOT NULL,
  `quote` text NOT NULL,
  `aboutus` text NOT NULL,
  `adminid` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `systeminfo`
--

INSERT INTO `systeminfo` (`id`, `name`, `phone`, `email`, `address`, `logo`, `quote`, `aboutus`, `adminid`) VALUES
(4, 'Smart Mechanism Locate and Finder', '+250788758919', 'isingizwemariemadeleine99@gmail.com', 'Kigali, Rwanda', 'pic2.PNG', 'The automotive industry stands as a vital component of modern society, facilitating transportation and economic growth worldwide. With the increasing complexity of vehicles and the challenges faced by drivers, the demand for efficient car repair and assis', 'However, accessing reliable and timely assistance remains a significant challenge, particularly in regions where access to such services is limited or fragmented. Globally, the proliferation of digital technologies has transformed various sectors, including automotive services. Web-based car repair and assistance applications have emerged as innovative solutions to address the needs of drivers, offering convenience, efficiency, and accessibility. These platforms leverage the power of the internet and location-based services to connect drivers with nearby repair shops, roadside assistance providers, and other related services.\r\n', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`carid`),
  ADD KEY `adminid` (`adminid`),
  ADD KEY `garagename` (`garagename`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `garage`
--
ALTER TABLE `garage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adminid` (`adminid`);

--
-- Indexes for table `garageservice`
--
ALTER TABLE `garageservice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `garagename` (`garagename`),
  ADD KEY `adminid` (`adminid`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `systeminfo`
--
ALTER TABLE `systeminfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `carid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `garage`
--
ALTER TABLE `garage`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `garageservice`
--
ALTER TABLE `garageservice`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `systeminfo`
--
ALTER TABLE `systeminfo`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
