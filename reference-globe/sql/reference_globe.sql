-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 15, 2022 at 11:55 AM
-- Server version: 8.0.21
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reference_globe`
--

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'SuperAdmin'),
(2, 'Admin'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` varchar(13) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `role_id` int NOT NULL,
  `dob` date NOT NULL,
  `profile_pic` text COLLATE utf8mb4_general_ci NOT NULL,
  `signature` text COLLATE utf8mb4_general_ci NOT NULL,
  `gender` enum('Male','Female','Other') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Male',
  `status` enum('1','0') COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `mobile`, `email`, `password`, `address`, `role_id`, `dob`, `profile_pic`, `signature`, `gender`, `status`) VALUES
(1, 'Sita100', '8888538591', 'ramesh@gmail.com', '1ab7bc8a726cd0f7137d190e474cdde7', 'Bangalore', 3, '2022-06-23', '', '', 'Male', '1'),
(4, 'Susech1', '8888538590', 'suresh@gmail.com', '1ab7bc8a726cd0f7137d190e474cdde7', 'Delhi', 1, '2022-06-23', '', '', 'Male', '1'),
(5, 'Mohan', '8888538592', 'mohan@gmail.com', '1ab7bc8a726cd0f7137d190e474cdde7', 'Delhi', 2, '2022-06-23', '', '', 'Male', '0'),
(6, 'ramesh1', '1234567890', 'ramesh1@gmail.com', '1ab7bc8a726cd0f7137d190e474cdde7', '', 1, '2022-06-24', '', '', 'Male', '0'),
(7, 'ramesh12', '7828796979', 'ramesh12@gmail.com', '1ab7bc8a726cd0f7137d190e474cdde7', 'sdsdsds1', 1, '2022-07-08', '', '', 'Male', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user_access`
--

DROP TABLE IF EXISTS `user_access`;
CREATE TABLE IF NOT EXISTS `user_access` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_id` int NOT NULL,
  `module` enum('users') COLLATE utf8mb4_general_ci NOT NULL,
  `action` enum('add','edit','delete','view') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_access`
--

INSERT INTO `user_access` (`id`, `role_id`, `module`, `action`) VALUES
(1, 2, 'users', 'edit'),
(2, 2, 'users', 'delete'),
(3, 2, 'users', 'view');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
