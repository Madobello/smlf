-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2025 at 08:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

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
(5, 'Poul Marie', 'Madeleine', '+250787936791', 'jetaimetech@gmail.com', '$2y$10$8IPSf25Y0zdrkSNuAg2jv.FtNTRynTfE49en8BmVFZG.BbhPhCg0O', '2025-02-03 18:53:35', 'active');

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
(8, 'nisingizwe', 'jean aime', '+250787936791', 'jetaimetech@gmail.com', '$2y$10$SGprq/6wlkiydNlAxJu2tOWu0Hxzpub1IzJeAudd5IEEXmdSMkP86');

-- --------------------------------------------------------

--
-- Table structure for table `garage`
--

CREATE TABLE `garage` (
  `id` int(255) NOT NULL,
  `name` text NOT NULL,
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
(18, 'kazi ni kazi garage', 'kazinikazi@gmail.com', '+250787937791', 'kigali', 'Gasabo', 'Kimironko', 'Kimironko2', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.5050597124755!2d30.057418275005062!3d-1.9511665367143132!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19dca5a86d814c61%3A0x7d3b83e12b1c11a9!2sNorrsken%20House%20Kigali!5e0!3m2!1sen!2srw!4v1', 'However, accessing reliable and timely assistance remains a significant challenge, particularly in regions where access to such services is limited or fragmented. Globally, the proliferation of digital technologies has transformed various sectors, including automotive services. Web-based car repair and assistance applications have emerged as innovative solutions to address the needs of drivers, offering convenience, efficiency, and accessibility. These platforms leverage the power of the internet and location-based services to connect drivers with nearby repair shops, roadside assistance providers, and other related services.\r\n', 'header-background.jpg', '2025-02-03 18:50:05', 3, '1'),
(19, 'umurimo unoze garage', 'umurimounoze@gmail.com', '+250787926791', 'kigali', 'Gasabo', 'Gisozi', 'Gisozi1', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.5050597124755!2d30.057418275005062!3d-1.9511665367143132!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19dca5a86d814c61%3A0x7d3b83e12b1c11a9!2sNorrsken%20House%20Kigali!5e0!3m2!1sen!2srw!4v1', 'However, accessing reliable and timely assistance remains a significant challenge, particularly in regions where access to such services is limited or fragmented. Globally, the proliferation of digital technologies has transformed various sectors, including automotive services. Web-based car repair and assistance applications have emerged as innovative solutions to address the needs of drivers, offering convenience, efficiency, and accessibility. These platforms leverage the power of the internet and location-based services to connect drivers with nearby repair shops, roadside assistance providers, and other related services.\r\n', 'recent-car-5.jpg', '2025-01-29 14:28:58', 0, ''),
(21, 'kalimu garage ltd', 'kalimu@gmail.com', '+2507886177756', 'kigali', 'Gasabo', 'Gisozi', 'Gisozi1', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.5050597124755!2d30.057418275005062!3d-1.9511665367143132!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19dca5a86d814c61%3A0x7d3b83e12b1c11a9!2sNorrsken%20House%20Kigali!5e0!3m2!1sen!2srw!4v1', 'However, Accessing Reliable And Timely Assistance Remains A Significant Challenge, Particularly In Regions Where Access To Such Services Is Limited Or Fragmented. Globally, The Proliferation Of Digital Technologies Has Transformed Various Sectors, Including Automotive Services. Web-Based Car Repair And Assistance Applications Have Emerged As Innovative Solutions To Address The Needs Of Drivers, Offering Convenience, Efficiency, And Accessibility. These Platforms Leverage The Power Of The Internet And Location-Based Services To Connect Drivers With Nearby Repair Shops, Roadside Assistance Providers, And Other Related Services. ', 'about-me-image.jpg', '2025-02-03 18:50:05', 3, ''),
(22, 'atecar garage', 'atecar@gmailcom', '+250786775590', 'kigali', 'Kicukiro', 'Gahanga', 'Gahanga1', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20669.63591188147!2d29.61795724675264!3d-1.497942641289567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19dc5b7d3ad4418b%3A0xd2802a31011cd91a!2sMusanze%20Bus%20station!5e0!3m2!1sen!2srw!4v171742', 'welcome', 'garage.png', '2025-02-03 18:50:05', 3, ''),
(24, 'kinamba garage', 'asifiwefideline@gmail.com', '+250787936791', 'north', 'Musanze', 'Musanze', 'Busogo', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.5050597124755!2d30.057418275005062!3d-1.9511665367143132!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19dca5a86d814c61%3A0x7d3b83e12b1c11a9!2sNorrsken%20House%20Kigali!5e0!3m2!1sen!2srw!4v1', 'Car Repair and Assistance Application welcome, fideline !', 'Capture.PNG', '2025-02-03 18:50:05', 24, '12'),
(25, 'ubumwe car clean', 'ubumwe@gmail.com', '+250781959289', 'kigali', 'Gasabo', 'Jabana', 'Gihinga', '', '', 'OIP.jpeg', '2025-02-03 18:50:05', 25, '1');

-- --------------------------------------------------------

--
-- Table structure for table `garageservice`
--

CREATE TABLE `garageservice` (
  `id` int(255) NOT NULL,
  `garagename` varchar(255) NOT NULL,
  `servicename` text NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `adminid` int(255) NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `price` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `garageservice`
--

INSERT INTO `garageservice` (`id`, `garagename`, `servicename`, `description`, `image`, `adminid`, `regdate`, `price`) VALUES
(5, 'kalimu garage ltd', 'car wash', 'However, accessing reliable and timely assistance remains a significant challenge, particularly in regions where access to such services is limited or fragmented. Globally, the proliferation of digital technologies has transformed various sectors, including automotive services. Web-based car repair and assistance applications have emerged as innovative solutions to address the needs of drivers, offering convenience, efficiency, and accessibility. These platforms leverage the power of the internet and location-based services to connect drivers with nearby repair shops, roadside assistance providers, and other related services.\r\n', 'recent-blog-3.jpg', 3, '2025-02-02 15:47:41', '10000'),
(6, 'a', 'car wash', 'Car Repair and Assistance Application welcome, a !', 'Capture.PNG', 23, '2025-02-02 14:26:44', '23000');

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
  `dat` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `garagename`, `firstname`, `lastname`, `email`, `phone`, `servicedescription`, `dat`) VALUES
(1, 'kalimu garage ltd', 'aime', 'john', 'aime@gmail.com', '+250786775590', 'hey', '2025-02-03 11:25:00');

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
(4, 'Smart Mechanism Core System', '+250788758919', 'madeleine@gmail.com', 'Kigali, Rwanda', 'car.jpeg', 'The automotive industry stands as a vital component of modern society, facilitating transportation and economic growth worldwide. With the increasing complexity of vehicles and the challenges faced by drivers, the demand for efficient car repair and assis', 'However, accessing reliable and timely assistance remains a significant challenge, particularly in regions where access to such services is limited or fragmented. Globally, the proliferation of digital technologies has transformed various sectors, including automotive services. Web-based car repair and assistance applications have emerged as innovative solutions to address the needs of drivers, offering convenience, efficiency, and accessibility. These platforms leverage the power of the internet and location-based services to connect drivers with nearby repair shops, roadside assistance providers, and other related services.\r\n', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `garage`
--
ALTER TABLE `garage`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `garageservice`
--
ALTER TABLE `garageservice`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `systeminfo`
--
ALTER TABLE `systeminfo`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
