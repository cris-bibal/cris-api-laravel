-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2014 at 08:00 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_rest_api`
--
CREATE DATABASE IF NOT EXISTS `db_rest_api` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_rest_api`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(5, 'cri', 'cris@email.com', '$2y$10$l4Uc317D4in1qYG8j2pe9e9VnMIo4rhk0aHLTac9AEYvIYU54qrAe', 'cris', 'bibal', '2014-08-30 21:05:16', '0000-00-00 00:00:00'),
(7, 'cris', 'cris@email2.com', '$2y$10$Arbz37N7dUvH5wPYvFXHiuBswljx73ooGa9Vax0ijGTsLo7RJAyWu', 'cris', 'bibal', '2014-09-01 03:20:05', '2014-09-01 12:44:05'),
(8, 'testname', 'test@email.com', '$2y$10$v40VNmXTq5rnbuO5EZGgXOyZ4oViO9/jrYKlfxxRDEQrUIWiou6qa', 'cris', 'bibal', '2014-09-01 05:49:42', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
