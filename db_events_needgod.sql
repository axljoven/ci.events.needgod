-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 21, 2019 at 11:24 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_events_needgod`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `details` text NOT NULL,
  `speakers` varchar(128) NOT NULL,
  `venue` varchar(128) NOT NULL,
  `reg_fee` float NOT NULL,
  `reg_fee_details` text NOT NULL,
  `image` text NOT NULL,
  `date` text NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `status` varchar(32) NOT NULL DEFAULT 'draft',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `details`, `speakers`, `venue`, `reg_fee`, `reg_fee_details`, `image`, `date`, `date_start`, `date_end`, `status`) VALUES
(1, 'Snatch them from the flames', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Justin Peters and Andrew Rappapport', 'SM North Edsa', 700, 'Php 700 (normal rate)\r\nPhp 800 with lunch', '', 'May 21 - 22, 2019', '2019-05-21', '2019-05-22', 'draft'),
(2, 'Sufficiency of Scriptures', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Paul Washer', 'Rock of Refuge Christian Church', 850.5, 'Php 850.5 / person', '', 'May 25 2019\r\n8AM - 5PM', '2019-05-25', '2019-05-25', 'draft');

-- --------------------------------------------------------

--
-- Table structure for table `registrants`
--

DROP TABLE IF EXISTS `registrants`;
CREATE TABLE IF NOT EXISTS `registrants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `middlename` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `nickname` varchar(128) NOT NULL,
  `gender` varchar(12) NOT NULL DEFAULT 'male',
  `email` varchar(128) NOT NULL,
  `mobile_number` varchar(128) NOT NULL,
  `church_name` varchar(128) NOT NULL,
  `church_address` text NOT NULL,
  `role` varchar(32) NOT NULL,
  `email_per_event_key` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registrants`
--

INSERT INTO `registrants` (`id`, `event_id`, `firstname`, `middlename`, `lastname`, `nickname`, `gender`, `email`, `mobile_number`, `church_name`, `church_address`, `role`, `email_per_event_key`) VALUES
(14, 1, 'Axl', 'Moreno', 'Joven', '', 'male', 'axlmorenojoven@gmail.com', '09279908363', 'Rrcc', 'Quezon City', 'member', '1_axlmorenojoven@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
