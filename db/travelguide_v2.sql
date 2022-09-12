-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 12, 2022 at 02:41 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelguide_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` mediumint(7) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `user_type` tinyint(1) NOT NULL DEFAULT 3,
  `status` varchar(10) NOT NULL DEFAULT 'Pending',
  `joined` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `user_type`, `status`, `joined`) VALUES
(1, 'Admin', 'admin@travelguide.com', 'admin', '0192023a7bbd73250516f069df18b500', 1, 'Active', '2022-09-10 09:45:23'),
(2, 'Manager', 'manager@travelguide.com', 'manager', '0795151defba7a4b5dfa89170de46277', 2, 'Active', '2022-09-10 12:00:33'),
(3, 'Naymur Rahman', 'naymur@example.com', 'naymur', 'e19d5cd5af0378da05f63f891c7467af', 3, 'Active', '2022-09-11 09:20:40'),
(4, 'Alauddin Alo', 'alauddin@example.com', 'alauddin', 'e19d5cd5af0378da05f63f891c7467af', 3, 'Pending', '2022-09-11 10:51:09'),
(5, 'Abu Naser Dipu', 'mdabunaserdipu@gmail.com', 'dipu', 'e19d5cd5af0378da05f63f891c7467af', 3, 'Pending', '2022-09-11 15:32:58'),
(9, 'Amzad Hossain', 'amjadhossain17416762@gmail.com', 'amzad', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 3, 'Pending', '2022-09-11 18:45:21');

-- --------------------------------------------------------

--
-- Stand-in structure for view `users_view`
-- (See below for the actual view)
--
CREATE TABLE `users_view` (
`ID` mediumint(7) unsigned
,`Name` varchar(50)
,`Email` varchar(50)
,`User Name` varchar(20)
,`Phone` varchar(20)
,`Full Address` mediumtext
,`Picture` varchar(50)
,`Type` text
,`Status` varchar(10)
);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` mediumint(7) UNSIGNED NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `country` text NOT NULL,
  `post_code` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `profile_picture` varchar(50) NOT NULL,
  `user_id` mediumint(7) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `first_name`, `last_name`, `email`, `phone`, `country`, `post_code`, `address`, `profile_picture`, `user_id`) VALUES
(1, 'Naymur', 'Rahman', 'naymur@example.com', '01737036324', 'Bangladesh', '7210', 'Alamdanga, Chuadanga', 'naymur.jpg', 3),
(2, 'Alauddin', 'Alo', 'alauddin@example.com', '01743612710', 'Bangladesh', '7050', 'Dighalkandi, Daulatpur, Kushtia', 'alauddin.jpg', 4),
(3, 'Abu Naser', 'Dipu', 'mdabunaserdipu@gmail.com', '01521327682', 'Bangladesh', '1206', 'Mirpur, Dhaka', 'dipu.jpeg', 5),
(4, 'Amzad', 'Hossain', 'amjadhossain17416762@gmail.com', '01776102769', 'Bangladesh', '', '', '', 9),
(7, 'Manager', '', 'manager@travelguide.com', '01558981652', 'Bangladesh', '7210', 'Chuadanga', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `user_type_code` tinyint(1) NOT NULL,
  `user_type_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_code`, `user_type_name`) VALUES
(1, 'Admin'),
(2, 'Manager'),
(3, 'User');

-- --------------------------------------------------------

--
-- Structure for view `users_view`
--
DROP TABLE IF EXISTS `users_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `users_view`  AS SELECT `u`.`id` AS `ID`, `u`.`name` AS `Name`, `u`.`email` AS `Email`, `u`.`username` AS `User Name`, `ui`.`phone` AS `Phone`, concat(`ui`.`address`,'<br><br>',`ui`.`post_code`,'<br><br>',`ui`.`country`) AS `Full Address`, `ui`.`profile_picture` AS `Picture`, `ut`.`user_type_name` AS `Type`, `u`.`status` AS `Status` FROM ((`users` `u` join `user_info` `ui`) join `user_type` `ut`) WHERE `u`.`id` = `ui`.`user_id` AND `u`.`user_type` = `ut`.`user_type_code``user_type_code`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`user_type_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` mediumint(7) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` mediumint(7) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
