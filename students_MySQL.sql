-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2020 at 07:22 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.13
CREATE DATABASE alumni;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`username`, `password`) VALUES
('chris', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `name` varchar(65) NOT NULL,
  `username` varchar(36) NOT NULL,
  `password` varchar(65) NOT NULL,
  `email` varchar(225) DEFAULT NULL,
  `school` varchar(65) NOT NULL,
  `approved` varchar(35) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`name`, `username`, `password`, `email`, `school`, `approved`, `description`) VALUES
('stavros', 's.mach', '123', 'stavros@mail.com', 'computing', 'no', 'c#, java'),
('petros', 'p.tsak', '333', 'petros@mail.com', 'business', 'no', 'test1, test2'),
('fbh', 'rgfg', 'fs', 'fa@com', 'afafa', '', 'fa'),
('christos', 'passsa', 'fafad', 'adad@d', 'afafa', '', 'fa');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
