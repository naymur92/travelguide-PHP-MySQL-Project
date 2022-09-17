-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2022 at 09:03 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

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
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `p_id` smallint(4) UNSIGNED NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_title` varchar(100) NOT NULL,
  `p_category` varchar(100) NOT NULL,
  `p_short_des` varchar(1500) NOT NULL,
  `p_description` varchar(10000) NOT NULL,
  `p_thumb` varchar(100) NOT NULL,
  `p_dur_days` tinyint(2) NOT NULL,
  `p_dur_nights` tinyint(2) NOT NULL,
  `p_price` mediumint(7) UNSIGNED NOT NULL,
  `p_status` varchar(10) NOT NULL DEFAULT 'Available',
  `p_create_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`p_id`, `p_name`, `p_title`, `p_category`, `p_short_des`, `p_description`, `p_thumb`, `p_dur_days`, `p_dur_nights`, `p_price`, `p_status`, `p_create_time`) VALUES
(25, 'Bandarban | Rangamati | Cox&#039;s Bazar | Saint Martin Iland', 'Bandarban | Rangamati | Cox&#039;s Bazar | Saint Martin Iland', '2', '&lt;p style=&quot;box-sizing: inherit;&quot;&gt;&amp;gt;&amp;gt; Air ticket with all taxes on Biman Dhaka-Chittagong-Dhaka (economy class).&lt;/p&gt;&lt;p style=&quot;box-sizing: inherit;&quot;&gt;&amp;gt;&amp;gt; Transportation Service: Dhaka International Airport - Chattogram Airport - Bandarban - Rangamati - Cox&#039;s Bazar - Saint Martin&lt;/p&gt;&lt;p style=&quot;box-sizing: inherit;&quot;&gt;&amp;gt;&amp;gt; Tour in Bandarban: Sangu River, Nafakhum, Amiakhum, Chimbuk Hill&lt;/p&gt;&lt;p style=&quot;box-sizing: inherit;&quot;&gt;&amp;gt;&amp;gt; Tour in Rangamati: Kaptai Lake, Boga Lake, Sajek Hill etc.&lt;/p&gt;&lt;p style=&quot;box-sizing: inherit;&quot;&gt;and many more facilities.&lt;/p&gt;', '&lt;h3&gt;&lt;b&gt;&lt;font color=&quot;#6badde&quot;&gt;Package Includes:&lt;/font&gt;&lt;/b&gt;&lt;/h3&gt;&lt;ul&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Air ticket with all taxes on Biman Dhaka-Chittagong-Dhaka (economy class).&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;02 nights hotel accommodation in Bandarban&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;02 nights hotel accommodation in Rangamati&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;03 nights hotel accommodation in Cox&#039;s Bazar&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;03 nights hotel accommodation in Saint Martin&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Daily breakfast at the hotel (Premium package)&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Transportation Service: Dhaka International Airport - Chattogram Airport - Bandarban - Rangamati - Cox&#039;s Bazar - Saint Martin&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Health Insurance.&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Meet &amp;amp; assist at Chattogram Airport&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Room Service as per hotel rules.&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Tour in Bandarban: Sangu River, Nafakhum, Amiakhum, Chimbuk Hill&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Tour in Rangamati: Kaptai Lake, Boga Lake, Sajek Hill etc.&lt;/li&gt;&lt;/ul&gt;&lt;p style=&quot;box-sizing: inherit;&quot;&gt;&lt;font color=&quot;#6badde&quot;&gt;&lt;b style=&quot;font-family: Poppins, sans-serif; font-size: 24px;&quot;&gt;Package Price Details (Per Person):&lt;/b&gt;&lt;br&gt;&lt;/font&gt;&lt;/p&gt;&lt;table class=&quot;table table-bordered&quot;&gt;&lt;tbody&gt;&lt;tr&gt;&lt;td style=&quot;text-align: center; &quot;&gt;&lt;b&gt;Sharing Basis&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;text-align: center; &quot;&gt;&lt;b&gt;3* Hotel&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;text-align: center; &quot;&gt;&lt;b&gt;3* Hotel&lt;br&gt;&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;text-align: center; &quot;&gt;&lt;b&gt;3* Hotel&lt;/b&gt;&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Quad Share&lt;/td&gt;&lt;td&gt;Tk. 12,000&lt;/td&gt;&lt;td&gt;Tk. 15,000&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 20,000&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Triple Share&lt;/td&gt;&lt;td&gt;Tk. 15,000&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 17,000&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 23,000&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Double Share&lt;/td&gt;&lt;td&gt;Tk. 18,000&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 19,000&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 26,000&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Single Share&lt;/td&gt;&lt;td&gt;Tk. 20,000&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 22,000&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 30,000&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;p style=&quot;box-sizing: inherit; margin-top: 30px; margin-bottom: 0px; font-family: Poppins, sans-serif; font-weight: 600; line-height: 1.5em; color: rgb(48, 180, 249); font-size: 24px;&quot;&gt;&lt;br&gt;&lt;/p&gt;', '25.jpg', 10, 10, 12000, 'Available', '2022-09-17 12:22:35'),
(26, 'Umrah Package - 15 Days', 'Umrah Package', '1', '&lt;p&gt;&amp;gt;&amp;gt;&amp;nbsp;&lt;span style=&quot;font-size: 1rem;&quot;&gt;Air ticket with all taxes on Biman or Saudi Airlines: Dhaka-Jeddah-Dhaka/ Dhaka-Jeddah, Madinah-Dhaka/ Dhaka-Madinah, Jeddah-Dhaka (economy class).&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 1rem;&quot;&gt;&amp;gt;&amp;gt;&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;font-size: 1rem;&quot;&gt;Transportation Service: Jeddah airport- Makkah Hotel - Madinah Hotel - Madinah Airport or vice versa.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 1rem;&quot;&gt;&amp;gt;&amp;gt;&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;font-size: 1rem;&quot;&gt;Ziyarah: Masjid al-Nabawi, Jannatul Baqi, Masjid Quba, Imam Ali [a]&#039;s house, Masjid-e-Jummah,&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;font-size: 1rem;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;font-size: 1rem;&quot;&gt;Mina, Arafat, Muzdalifa, Jabal-e-Noor, Jabal-e-soor, Jannatul Mualla&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;font-size: 1rem;&quot;&gt;(on request basis).&lt;/span&gt;&lt;/p&gt;', '&lt;h3&gt;&lt;span style=&quot;font-weight: bolder;&quot;&gt;&lt;font color=&quot;#6badde&quot;&gt;Package Includes:&lt;/font&gt;&lt;/span&gt;&lt;/h3&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;ul style=&quot;box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style-position: initial; list-style-image: initial; font-family: Poppins, sans-serif; font-size: 14px;&quot;&gt;&lt;ul&gt;&lt;/ul&gt;&lt;/ul&gt;&lt;p&gt;&lt;/p&gt;&lt;ul&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Air ticket with all taxes on Biman or Saudi Airlines: Dhaka-Jeddah-Dhaka/ Dhaka-Jeddah, Madinah-Dhaka/ Dhaka-Madinah, Jeddah-Dhaka (economy class).&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;07 nights hotel accommodation in Makkah&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;07 nights hotel accommodation in Madinah&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Daily breakfast at the hotel (Premium package)&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Transportation Service: Jeddah airport- Makkah Hotel - Madinah Hotel - Madinah Airport or vice versa.&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Umrah Visa Fee&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Health Insurance.&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Meet &amp;amp; assist at Jeddah Airport&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Room Service as per hotel rules.&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Umrah guidebook in Bangla&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Ziyarah/ Sightseeing tour in Madinah: Masjid al-Nabawi, Jannatul Baqi, Masjid Quba, Imam Ali [a]&#039;s house, Masjid-e-Jummah etc (on request basis).&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Ziyarah/ Sightseeing tour in Makkah: Mina, Arafat, Muzdalifa, Jabal-e-Noor, Jabal-e-soor, Jannatul Mualla etc (on request basis).&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;PCR Test before departure from KSA&lt;/li&gt;&lt;/ul&gt;&lt;h3 style=&quot;color: rgb(0, 0, 0);&quot;&gt;&lt;span style=&quot;font-weight: bolder;&quot;&gt;&lt;font color=&quot;#6badde&quot;&gt;Package Excludes:&lt;/font&gt;&lt;/span&gt;&lt;/h3&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;ul style=&quot;box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style-position: initial; list-style-image: initial;&quot;&gt;&lt;ul&gt;&lt;/ul&gt;&lt;/ul&gt;&lt;p&gt;&lt;/p&gt;&lt;ul&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;PCR Test before the flight from Bangladesh&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Food not included with the package price for Makkah/Madinah (where not specified), but available at hotel or restaurant (Approx. SR15/per lunch or dinner). Food Menu for Lunch &amp;amp; Dinner: Chicken/ Fish, Vegetable/ Vorta/ Shak/ Dall/ Plain Rice.&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Any kinks of personal cost or others which are not mentioned above.&lt;/li&gt;&lt;/ul&gt;&lt;p style=&quot;box-sizing: inherit;&quot;&gt;&lt;font color=&quot;#6badde&quot;&gt;&lt;span style=&quot;font-weight: bolder; font-family: Poppins, sans-serif; font-size: 24px;&quot;&gt;Package Price Details (Per Person):&lt;/span&gt;&lt;br&gt;&lt;/font&gt;&lt;/p&gt;&lt;table class=&quot;table table-bordered&quot;&gt;&lt;tbody&gt;&lt;tr&gt;&lt;td style=&quot;text-align: center;&quot;&gt;&lt;span style=&quot;font-weight: bolder;&quot;&gt;Sharing Basis&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;text-align: center;&quot;&gt;&lt;span style=&quot;font-weight: bolder;&quot;&gt;3* Hotel&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;text-align: center;&quot;&gt;&lt;span style=&quot;font-weight: bolder;&quot;&gt;3* Hotel&lt;br&gt;&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;text-align: center;&quot;&gt;&lt;span style=&quot;font-weight: bolder;&quot;&gt;3* Hotel&lt;/span&gt;&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Quad Share&lt;/td&gt;&lt;td&gt;Tk. 1,35,000&lt;/td&gt;&lt;td&gt;Tk. 1,70,000&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 1,95,000&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Triple Share&lt;/td&gt;&lt;td&gt;Tk. 1,40,000&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 1,80,000&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 2,05,000&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Double Share&lt;/td&gt;&lt;td&gt;Tk. 1,45,000&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 1,95,000&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 2,20,000&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Single Share&lt;/td&gt;&lt;td&gt;Tk. 1,66,000&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 2,55,000&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 2,85,000&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;p style=&quot;box-sizing: inherit; margin-top: 30px; margin-bottom: 0px; font-family: Poppins, sans-serif; font-weight: 600; line-height: 1.5em; color: rgb(48, 180, 249); font-size: 24px;&quot;&gt;&lt;br&gt;&lt;/p&gt;', '26.jpg', 15, 14, 135000, 'Available', '2022-09-17 12:44:24');

-- --------------------------------------------------------

--
-- Table structure for table `package_category`
--

CREATE TABLE `package_category` (
  `category_id` tinyint(2) NOT NULL,
  `category_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `package_category`
--

INSERT INTO `package_category` (`category_id`, `category_name`) VALUES
(1, 'Umrah Package'),
(2, 'Special Tour Package'),
(3, 'National Tour'),
(4, 'International Tour'),
(5, 'Dream Destination');

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
(4, 'Alauddin Alo', 'alauddin@example.com', 'alauddin', 'e19d5cd5af0378da05f63f891c7467af', 3, 'Active', '2022-09-11 10:51:09'),
(5, 'Abu Naser Dipu', 'mdabunaserdipu@gmail.com', 'dipu', 'e19d5cd5af0378da05f63f891c7467af', 3, 'Pending', '2022-09-11 15:32:58'),
(9, 'Amjad Hossain', 'amjadhossain17416762@gmail.com', 'amjad', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 3, 'Muted', '2022-09-11 18:45:21'),
(10, 'Rasel Ahmed', 'rasel@example.com', 'rasel', 'e19d5cd5af0378da05f63f891c7467af', 3, 'Disabled', '2022-09-13 10:04:51'),
(11, 'Mahmud Hasan', 'mahmud@example.com', 'mahmud', 'e19d5cd5af0378da05f63f891c7467af', 3, 'Pending', '2022-09-13 10:06:19'),
(12, 'Anamul Hossain', 'anamul@example.com', 'anamul', 'e19d5cd5af0378da05f63f891c7467af', 3, 'Active', '2022-09-13 10:08:27');

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
(4, 'Amjad', 'Hossain', 'amjadhossain17416762@gmail.com', '01776102769', 'Bangladesh', '1207', 'Banasree', 'amjad.jpg', 9),
(7, 'Manager', '', 'manager@travelguide.com', '01558981652', 'Bangladesh', '7210', 'Chuadanga', '', 2),
(8, 'Rasel', 'Ahmed', 'rasel@example.com', '01723000000', 'Bangladesh', '1206', 'Dhaka', '', 10),
(9, 'Mahmud', 'Hasan', 'mahmud@example.com', '01721000000', 'Bangladesh', '1206', 'Mirpur', '', 11),
(10, 'Anamul', 'Hossain', 'anamul@example.com', '01720000000', 'Bangladesh', '1206', 'Paltan', '', 12);

--
-- Triggers `user_info`
--
DELIMITER $$
CREATE TRIGGER `au_user_info` AFTER UPDATE ON `user_info` FOR EACH ROW BEGIN
  UPDATE users SET name=CONCAT(NEW.first_name," ",NEW.last_name), email=NEW.email WHERE id=OLD.user_id;
END
$$
DELIMITER ;

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
-- Stand-in structure for view `view_packages`
-- (See below for the actual view)
--
CREATE TABLE `view_packages` (
`ID` smallint(4) unsigned
,`Name` varchar(100)
,`Title` varchar(100)
,`Category` varchar(20)
,`Short Description` varchar(1500)
,`Description` varchar(10000)
,`Thumbnail` varchar(100)
,`Duration` varchar(23)
,`Status` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_user_edit`
-- (See below for the actual view)
--
CREATE TABLE `view_user_edit` (
`id` mediumint(7) unsigned
,`first_name` varchar(20)
,`last_name` varchar(20)
,`email` varchar(50)
,`phone` varchar(20)
,`username` varchar(20)
,`country` text
,`post_code` varchar(10)
,`address` varchar(200)
,`profile_picture` varchar(50)
,`user_type` tinyint(1)
,`status` varchar(10)
);

-- --------------------------------------------------------

--
-- Structure for view `users_view`
--
DROP TABLE IF EXISTS `users_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `users_view`  AS SELECT `u`.`id` AS `ID`, `u`.`name` AS `Name`, `u`.`email` AS `Email`, `u`.`username` AS `User Name`, `ui`.`phone` AS `Phone`, concat(`ui`.`address`,'<br><br>',`ui`.`post_code`,'<br><br>',`ui`.`country`) AS `Full Address`, `ui`.`profile_picture` AS `Picture`, `ut`.`user_type_name` AS `Type`, `u`.`status` AS `Status` FROM ((`users` `u` join `user_info` `ui`) join `user_type` `ut`) WHERE `u`.`id` = `ui`.`user_id` AND `u`.`user_type` = `ut`.`user_type_code`;

-- --------------------------------------------------------

--
-- Structure for view `view_packages`
--
DROP TABLE IF EXISTS `view_packages`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_packages`  AS SELECT `p`.`p_id` AS `ID`, `p`.`p_name` AS `Name`, `p`.`p_title` AS `Title`, `pc`.`category_name` AS `Category`, `p`.`p_short_des` AS `Short Description`, `p`.`p_description` AS `Description`, `p`.`p_thumb` AS `Thumbnail`, concat(`p`.`p_dur_days`,' Days & ',`p`.`p_dur_nights`,' Nights') AS `Duration`, `p`.`p_status` AS `Status` FROM (`packages` `p` join `package_category` `pc`) WHERE `p`.`p_category` = `pc`.`category_id`;

-- --------------------------------------------------------

--
-- Structure for view `view_user_edit`
--
DROP TABLE IF EXISTS `view_user_edit`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user_edit`  AS SELECT `u`.`id` AS `id`, `ui`.`first_name` AS `first_name`, `ui`.`last_name` AS `last_name`, `ui`.`email` AS `email`, `ui`.`phone` AS `phone`, `u`.`username` AS `username`, `ui`.`country` AS `country`, `ui`.`post_code` AS `post_code`, `ui`.`address` AS `address`, `ui`.`profile_picture` AS `profile_picture`, `u`.`user_type` AS `user_type`, `u`.`status` AS `status` FROM (`users` `u` join `user_info` `ui`) WHERE `u`.`id` = `ui`.`user_id``user_id`;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `package_category`
--
ALTER TABLE `package_category`
  ADD PRIMARY KEY (`category_id`);

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
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`user_type_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `p_id` smallint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` mediumint(7) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` mediumint(7) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
