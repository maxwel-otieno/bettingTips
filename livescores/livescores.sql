-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 20, 2022 at 07:19 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `livescores`
--

-- --------------------------------------------------------

--
-- Table structure for table `livescore`
--

DROP TABLE IF EXISTS `livescore`;
CREATE TABLE IF NOT EXISTS `livescore` (
  `country` varchar(200) NOT NULL,
  `league` varchar(300) NOT NULL,
  `minutes` varchar(10) NOT NULL,
  `home_team_name` varchar(300) NOT NULL,
  `home_team_score` int(11) NOT NULL,
  `away_team_score` int(11) NOT NULL,
  `away_team_name` varchar(300) NOT NULL,
  `current_id` int(11) NOT NULL,
  `rank` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `livescore_meta`
--

DROP TABLE IF EXISTS `livescore_meta`;
CREATE TABLE IF NOT EXISTS `livescore_meta` (
  `date` varchar(200) NOT NULL,
  `current_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
