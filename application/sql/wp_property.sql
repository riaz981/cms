-- phpMyAdmin SQL Dump
-- version 4.3.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 25, 2015 at 03:25 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wp_property`
--

INSERT INTO `wp_property` (`name`, `address`, `url`, `icon`, `minimumStay`, `rates`, `overview`, `dining`, `bathroomDescription`, `bedroomDescription`, `attractionDescription`, `leisureDescription`, `businessDescription`, `sportsDescription`, `id`) VALUES
('Bronte Bliss Beach House', 'Bronte, NSW, Australia', 'http://apartmentclub.localhost/?page_id=47', '{"typeProperty":"Whole Apartment","guestNumber":"4","bedroomNumber":"2","bedsNumber":"3"}', 5, '{"nightlyRate":"300","weeklyRate":"1800","monthlyRate":"7000","cleaningRate":"50"}', 'Bronte Bliss Beach House is a lovely 2 bedroom semi 5 minutes walk to the beach\n\nRelax in your own blissful beach house. This semi is set in a great location on a quiet street just 5 minutes walk from the beach.\n\nThe house is set out across 2 double bedrooms.\n\nThe master bedroom is with king bed and built in wardrobes. The second bedroom can be configured offered as a king bed or two king singles. The house is ideal for either two friends, two couples or a 4-5 person family.\n\nThe living area is open plan with fully equipped kitchen, dining area with 8 seats, lounge suite, ottoman, 55 inch flatscreen TV, wireless internet, CD/Stereo and DVD library.\n\nThe living area opens onto a garden courtyard with seating for 8 people, lighting, trees and gas BBQ. This area is ideal for summer entertaining.\n\nOther amenities include: bathroom, shower, bathtub, washer, dryer, lovely front porch and garden.', 'Dining Area', '1 Bathroom\n\nBathroom 1 - toilet , shower enclosure ', '2 Bedrooms, Sleeps 5\n\nBedroom 1 - 1 double bed\n\nBedroom 2 - 1 double bed', 'bay, cinema\n\nplayground, restaurants', ' 	\n\nbeach combing, scenic drives\n\npaddle boating, walking\n\nphotography, whale watching', 'ATM/bank, hospital\n\nBabysitter, laundrette - serviced\n\nfitness centre, massage therapist\n\ngroceries, medical services', 'cycling, swimming\n\ngolf, wind-surfing\n\nsailing', 1),
('Riaz', 'Rowe Street', 'http://example.com', '{"typeProperty":"Whole House","guestNumber":"2","bedroomNumber":"1","bedsNumber":"1"}', 1, '{"nightlyRate":"300","weeklyRate":"1800","monthlyRate":"7000","cleaningRate":"50"}', 'Something', 'Something', 'Something', 'Something', 'Something', 'Something', 'Something', 'Something', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wp_property`
--
ALTER TABLE `wp_property`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wp_property`
--
ALTER TABLE `wp_property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
