-- phpMyAdmin SQL Dump
-- version 4.3.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 23, 2015 at 12:54 PM
-- Server version: 5.6.23
-- PHP Version: 5.5.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `apartmentclub`
--

-- --------------------------------------------------------

--
-- Table structure for table `wp_property`
--

CREATE TABLE IF NOT EXISTS `wp_property` (
  `name` text NOT NULL,
  `address` text NOT NULL,
  `url` text NOT NULL,
  `icon` text NOT NULL,
  `minimumStay` int(11) NOT NULL,
  `rates` text NOT NULL,
  `overview` text NOT NULL,
  `dining` text NOT NULL,
  `bathroomDescription` text NOT NULL,
  `bedroomDescription` text NOT NULL,
  `attractionDescription` text NOT NULL,
  `leisureDescription` text NOT NULL,
  `businessDescription` text NOT NULL,
  `sportsDescription` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;


ALTER TABLE `wp_property`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wp_property`
--
ALTER TABLE `wp_property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
