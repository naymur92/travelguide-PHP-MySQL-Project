-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2022 at 07:34 AM
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
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `b_id` smallint(5) UNSIGNED NOT NULL,
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `package_id` tinyint(3) UNSIGNED NOT NULL,
  `booking_time` datetime NOT NULL DEFAULT current_timestamp(),
  `journey_date` date NOT NULL,
  `booking_status` varchar(10) NOT NULL DEFAULT 'Pending',
  `extra_info` varchar(100) NOT NULL,
  `total_person` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`b_id`, `user_id`, `package_id`, `booking_time`, `journey_date`, `booking_status`, `extra_info`, `total_person`) VALUES
(10, 4, 30, '2022-10-31 10:46:07', '2023-11-15', 'Checked', '4* single', 2),
(11, 4, 25, '2022-10-31 10:48:38', '2022-11-25', 'Confirmed', '', 1),
(12, 4, 32, '2022-10-31 10:49:41', '2022-12-21', 'Checked', '', 3),
(13, 3, 29, '2022-10-31 10:51:12', '2022-11-23', 'Pending', '', 5),
(14, 3, 28, '2022-10-31 10:51:42', '2022-11-24', 'Cancelled', '', 4),
(15, 5, 26, '2022-10-31 10:52:42', '2022-11-17', 'Confirmed', '', 1),
(16, 5, 29, '2022-10-31 10:53:03', '2022-11-17', 'Pending', '', 3),
(17, 5, 26, '2022-10-31 10:56:55', '2022-11-16', 'Checked', 'sssssssssssss', 2),
(18, 5, 47, '2022-10-31 10:59:10', '2022-12-06', 'Pending', '', 4);

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
  `p_thumb` varchar(200) NOT NULL,
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
(25, 'Bandarban | Rangamati | Cox&#039;s Bazar | Saint Martin Iland', 'Bandarban | Rangamati | Cox&#039;s Bazar | Saint Martin Iland', '2', '&lt;p style=&quot;box-sizing: inherit;&quot;&gt;&amp;gt;&amp;gt; Air ticket with all taxes on Biman Dhaka-Chittagong-Dhaka (economy class).&lt;br&gt;&lt;span style=&quot;font-size: 1rem;&quot;&gt;&amp;gt;&amp;gt; Sangu River, Nafakhum, Amiakhum, Chimbuk Hill,&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;font-size: 1rem;&quot;&gt;Kaptai Lake, Boga Lake, Sajek Hill etc.&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;box-sizing: inherit;&quot;&gt;&lt;span style=&quot;font-size: 1rem;&quot;&gt;and many more facilities.&lt;/span&gt;&lt;/p&gt;', '&lt;h3&gt;&lt;b&gt;&lt;font color=&quot;#6badde&quot;&gt;Package Includes:&lt;/font&gt;&lt;/b&gt;&lt;/h3&gt;&lt;ul&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Air ticket with all taxes on Biman Dhaka-Chittagong-Dhaka (economy class).&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;02 nights hotel accommodation in Bandarban&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;02 nights hotel accommodation in Rangamati&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;03 nights hotel accommodation in Cox&#039;s Bazar&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;03 nights hotel accommodation in Saint Martin&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Daily breakfast at the hotel (Premium package)&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Transportation Service: Dhaka International Airport - Chattogram Airport - Bandarban - Rangamati - Cox&#039;s Bazar - Saint Martin&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Health Insurance.&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Meet &amp;amp; assist at Chattogram Airport&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Room Service as per hotel rules.&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Tour in Bandarban: Sangu River, Nafakhum, Amiakhum, Chimbuk Hill&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Tour in Rangamati: Kaptai Lake, Boga Lake, Sajek Hill etc.&lt;/li&gt;&lt;/ul&gt;&lt;p style=&quot;box-sizing: inherit;&quot;&gt;&lt;font color=&quot;#6badde&quot;&gt;&lt;b style=&quot;font-family: Poppins, sans-serif; font-size: 24px;&quot;&gt;Package Price Details (Per Person):&lt;/b&gt;&lt;br&gt;&lt;/font&gt;&lt;/p&gt;&lt;table class=&quot;table table-bordered&quot;&gt;&lt;tbody&gt;&lt;tr&gt;&lt;td style=&quot;text-align: center; &quot;&gt;&lt;b&gt;Sharing Basis&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;text-align: center; &quot;&gt;&lt;b&gt;3* Hotel&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;text-align: center; &quot;&gt;&lt;b&gt;3* Hotel&lt;br&gt;&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;text-align: center; &quot;&gt;&lt;b&gt;3* Hotel&lt;/b&gt;&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Quad Share&lt;/td&gt;&lt;td&gt;Tk. 12,000&lt;/td&gt;&lt;td&gt;Tk. 15,000&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 20,000&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Triple Share&lt;/td&gt;&lt;td&gt;Tk. 15,000&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 17,000&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 23,000&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Double Share&lt;/td&gt;&lt;td&gt;Tk. 18,000&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 19,000&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 26,000&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Single Share&lt;/td&gt;&lt;td&gt;Tk. 20,000&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 22,000&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 30,000&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;p style=&quot;box-sizing: inherit; margin-top: 30px; margin-bottom: 0px; font-family: Poppins, sans-serif; font-weight: 600; line-height: 1.5em; color: rgb(48, 180, 249); font-size: 24px;&quot;&gt;&lt;br&gt;&lt;/p&gt;', '25(0).jpg|25(1).jpg|25(2).jpg|25(3).jpg', 10, 10, 12000, 'Available', '2022-09-17 12:22:35'),
(26, 'Umrah Package - 15 Days', 'Umrah Package', '1', '&lt;p&gt;&amp;gt;&amp;gt;&amp;nbsp;&lt;span style=&quot;font-size: 1rem;&quot;&gt;Air ticket with all taxes on Biman or Saudi Airlines&lt;br&gt;&lt;/span&gt;&lt;span style=&quot;font-size: 1rem;&quot;&gt;&amp;gt;&amp;gt;&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;font-size: 1rem;&quot;&gt;Transportation Service, Ziyarah&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 1rem;&quot;&gt;and many more..&lt;/span&gt;&lt;/p&gt;', '&lt;h3&gt;&lt;span style=&quot;font-weight: bolder;&quot;&gt;&lt;font color=&quot;#6badde&quot;&gt;Package Includes:&lt;/font&gt;&lt;/span&gt;&lt;/h3&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;ul style=&quot;box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style-position: initial; list-style-image: initial; font-family: Poppins, sans-serif; font-size: 14px;&quot;&gt;&lt;ul&gt;&lt;/ul&gt;&lt;/ul&gt;&lt;p&gt;&lt;/p&gt;&lt;ul&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Air ticket with all taxes on Biman or Saudi Airlines: Dhaka-Jeddah-Dhaka/ Dhaka-Jeddah, Madinah-Dhaka/ Dhaka-Madinah, Jeddah-Dhaka (economy class).&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;07 nights hotel accommodation in Makkah&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;07 nights hotel accommodation in Madinah&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Daily breakfast at the hotel (Premium package)&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Transportation Service: Jeddah airport- Makkah Hotel - Madinah Hotel - Madinah Airport or vice versa.&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Umrah Visa Fee&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Health Insurance.&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Meet &amp;amp; assist at Jeddah Airport&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Room Service as per hotel rules.&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Umrah guidebook in Bangla&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Ziyarah/ Sightseeing tour in Madinah: Masjid al-Nabawi, Jannatul Baqi, Masjid Quba, Imam Ali [a]&#039;s house, Masjid-e-Jummah etc (on request basis).&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Ziyarah/ Sightseeing tour in Makkah: Mina, Arafat, Muzdalifa, Jabal-e-Noor, Jabal-e-soor, Jannatul Mualla etc (on request basis).&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;PCR Test before departure from KSA&lt;/li&gt;&lt;/ul&gt;&lt;h3 style=&quot;color: rgb(0, 0, 0);&quot;&gt;&lt;span style=&quot;font-weight: bolder;&quot;&gt;&lt;font color=&quot;#6badde&quot;&gt;Package Excludes:&lt;/font&gt;&lt;/span&gt;&lt;/h3&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;ul style=&quot;box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style-position: initial; list-style-image: initial;&quot;&gt;&lt;ul&gt;&lt;/ul&gt;&lt;/ul&gt;&lt;p&gt;&lt;/p&gt;&lt;ul&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;PCR Test before the flight from Bangladesh&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Food not included with the package price for Makkah/Madinah (where not specified), but available at hotel or restaurant (Approx. SR15/per lunch or dinner). Food Menu for Lunch &amp;amp; Dinner: Chicken/ Fish, Vegetable/ Vorta/ Shak/ Dall/ Plain Rice.&lt;/li&gt;&lt;li style=&quot;box-sizing: inherit;&quot;&gt;Any kinks of personal cost or others which are not mentioned above.&lt;/li&gt;&lt;/ul&gt;&lt;p style=&quot;box-sizing: inherit;&quot;&gt;&lt;font color=&quot;#6badde&quot;&gt;&lt;span style=&quot;font-weight: bolder; font-family: Poppins, sans-serif; font-size: 24px;&quot;&gt;Package Price Details (Per Person):&lt;/span&gt;&lt;br&gt;&lt;/font&gt;&lt;/p&gt;&lt;table class=&quot;table table-bordered&quot;&gt;&lt;tbody&gt;&lt;tr&gt;&lt;td style=&quot;text-align: center;&quot;&gt;&lt;span style=&quot;font-weight: bolder;&quot;&gt;Sharing Basis&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;text-align: center;&quot;&gt;&lt;span style=&quot;font-weight: bolder;&quot;&gt;3* Hotel&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;text-align: center;&quot;&gt;&lt;span style=&quot;font-weight: bolder;&quot;&gt;4* Hotel&lt;br&gt;&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;text-align: center;&quot;&gt;&lt;span style=&quot;font-weight: bolder;&quot;&gt;5* Hotel&lt;/span&gt;&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Quad Share&lt;/td&gt;&lt;td&gt;Tk. 1,35,000&lt;/td&gt;&lt;td&gt;Tk. 1,70,000&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 1,95,000&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Triple Share&lt;/td&gt;&lt;td&gt;Tk. 1,40,000&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 1,80,000&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 2,05,000&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Double Share&lt;/td&gt;&lt;td&gt;Tk. 1,45,000&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 1,95,000&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 2,20,000&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Single Share&lt;/td&gt;&lt;td&gt;Tk. 1,66,000&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 2,55,000&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 2,85,000&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;p style=&quot;box-sizing: inherit; margin-top: 30px; margin-bottom: 0px; font-family: Poppins, sans-serif; font-weight: 600; line-height: 1.5em; color: rgb(48, 180, 249); font-size: 24px;&quot;&gt;&lt;br&gt;&lt;/p&gt;', '26(0).jpg|26(1).jpg|26(2).jpg|26(3).jpg|26(4).jpg', 15, 14, 135000, 'Available', '2022-09-17 12:44:24'),
(27, 'Tour in Sylhet', 'Dhaka | Sylhet | Dhaka', '3', '&lt;p&gt;&amp;gt;&amp;gt; Dhaka - Sylhet - Dhaka Air journey.&lt;br&gt;&amp;gt;&amp;gt; Sylhet tea garden&lt;br&gt;&amp;gt;&amp;gt; Tea Factory&lt;/p&gt;', '&lt;h3 align=&quot;left&quot;&gt;&lt;font color=&quot;#6BADDE&quot;&gt;5 Days Tour in Sylhet:&lt;/font&gt;&lt;/h3&gt;&lt;p&gt;Lorem, ipsum dolor sit amet consectetur adipisicing, elit. Molestias \r\naspernatur, cumque, deleniti suscipit voluptate debitis laboriosam. Nisi\r\n officiis quaerat quia, expedita harum beatae. Id qui sed quia \r\nperspiciatis iure optio.&lt;/p&gt;&lt;h3&gt;&lt;font color=&quot;#6BADDE&quot;&gt;Package Price Detail (Per Person):&lt;/font&gt;&lt;/h3&gt;&lt;table class=&quot;table table-bordered&quot;&gt;&lt;tbody&gt;&lt;tr&gt;&lt;td align=&quot;left&quot;&gt;&lt;b&gt;Sharing Basis&lt;/b&gt;&lt;br&gt;&lt;/td&gt;&lt;td align=&quot;center&quot;&gt;&lt;b&gt;3* Hotel&lt;/b&gt;&lt;br&gt;&lt;/td&gt;&lt;td align=&quot;center&quot;&gt;&lt;b&gt;4* Hotel&lt;/b&gt;&lt;br&gt;&lt;/td&gt;&lt;td align=&quot;center&quot;&gt;&lt;b&gt;5* Hotel&lt;/b&gt;&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Quad Share&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 3,000&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 5,000&lt;/td&gt;&lt;td&gt;Tk. 7,000&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Triple Share&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 4,000&lt;/td&gt;&lt;td&gt;Tk. 6,000&lt;/td&gt;&lt;td&gt;Tk. 8,000&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Double Share&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 5,000&lt;/td&gt;&lt;td&gt;Tk. 7,000&lt;/td&gt;&lt;td&gt;Tk. 9,000&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Single Share&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 6,000&lt;/td&gt;&lt;td&gt;Tk. 8,000&lt;/td&gt;&lt;td&gt;Tk. 10,000&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;h3&gt;&lt;br&gt;&lt;/h3&gt;&lt;p&gt;&lt;/p&gt;&lt;h3&gt;&lt;font color=&quot;#6BADDE&quot;&gt;&lt;/font&gt;&lt;/h3&gt;&lt;p&gt;&lt;/p&gt;', '27(0).jpg', 5, 4, 3000, 'Available', '2022-09-17 15:41:15'),
(28, 'Tour in Sundarban | Karamjal | Kayra', 'Sundarban | Karamjal | Kayra', '3', '&lt;p&gt;&amp;gt;&amp;gt; Sundarban | Karamjal | Kayra&lt;br&gt;&lt;span style=&quot;font-size: 1rem;&quot;&gt;&amp;gt;&amp;gt; Transportation Service&lt;/span&gt;&lt;/p&gt;', '&lt;h3 align=&quot;left&quot;&gt;&lt;font color=&quot;#6BADDE&quot;&gt;Sundarban | Karamjal | Kayra:&lt;/font&gt;&lt;/h3&gt;&lt;p&gt;Lorem, ipsum dolor sit amet consectetur adipisicing, elit. Molestias \r\n  aspernatur, cumque, deleniti suscipit voluptate debitis laboriosam. Nisi\r\n   officiis quaerat quia, expedita harum beatae. Id qui sed quia \r\n  perspiciatis iure optio.&lt;/p&gt;&lt;h3&gt;&lt;font color=&quot;#6BADDE&quot;&gt;Package Price Detail (Per Person):&lt;/font&gt;&lt;/h3&gt;&lt;table class=&quot;table table-bordered&quot;&gt;&lt;tbody&gt;&lt;tr&gt;&lt;td align=&quot;left&quot;&gt;&lt;b&gt;Sharing Basis&lt;/b&gt;&lt;br&gt;&lt;/td&gt;&lt;td align=&quot;center&quot;&gt;&lt;b&gt;3* Hotel&lt;/b&gt;&lt;br&gt;&lt;/td&gt;&lt;td align=&quot;center&quot;&gt;&lt;b&gt;4* Hotel&lt;/b&gt;&lt;br&gt;&lt;/td&gt;&lt;td align=&quot;center&quot;&gt;&lt;b&gt;5* Hotel&lt;/b&gt;&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Quad Share&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 3,000&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 5,000&lt;/td&gt;&lt;td&gt;Tk. 7,000&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Triple Share&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 4,000&lt;/td&gt;&lt;td&gt;Tk. 6,000&lt;/td&gt;&lt;td&gt;Tk. 8,000&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Double Share&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 5,000&lt;/td&gt;&lt;td&gt;Tk. 7,000&lt;/td&gt;&lt;td&gt;Tk. 9,000&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Single Share&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 6,000&lt;/td&gt;&lt;td&gt;Tk. 8,000&lt;/td&gt;&lt;td&gt;Tk. 10,000&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;h3&gt;&lt;br&gt;&lt;/h3&gt;&lt;p&gt;&lt;/p&gt;&lt;h3&gt;&lt;font color=&quot;#6BADDE&quot;&gt;&lt;/font&gt;&lt;/h3&gt;&lt;p&gt;&lt;/p&gt;', '28(0).jpg', 6, 5, 3000, 'Available', '2022-09-17 15:48:47'),
(29, 'Tour in Rangamati | Kaptai Lake', 'Rangamati | Kaptai Lake', '3', '&lt;p&gt;&amp;gt;&amp;gt; Rangamati | Kaptai Lake&lt;br&gt;&lt;span style=&quot;font-size: 1rem;&quot;&gt;&amp;gt;&amp;gt; Dhaka | Rangamati | Kaptai Lake | Dhaka&lt;/span&gt;&lt;/p&gt;', '&lt;h3 align=&quot;left&quot;&gt;&lt;font color=&quot;#6BADDE&quot;&gt;Rangamati | Kaptai Lake:&lt;/font&gt;&lt;/h3&gt;&lt;p&gt;Lorem, ipsum dolor sit amet consectetur adipisicing, elit. Molestias \r\n  aspernatur, cumque, deleniti suscipit voluptate debitis laboriosam. Nisi\r\n   officiis quaerat quia, expedita harum beatae. Id qui sed quia \r\n  perspiciatis iure optio.&lt;/p&gt;&lt;h3&gt;&lt;font color=&quot;#6BADDE&quot;&gt;Package Price Detail (Per Person):&lt;/font&gt;&lt;/h3&gt;&lt;table class=&quot;table table-bordered&quot;&gt;&lt;tbody&gt;&lt;tr&gt;&lt;td align=&quot;left&quot;&gt;&lt;b&gt;Sharing Basis&lt;/b&gt;&lt;br&gt;&lt;/td&gt;&lt;td align=&quot;center&quot;&gt;&lt;b&gt;3* Hotel&lt;/b&gt;&lt;br&gt;&lt;/td&gt;&lt;td align=&quot;center&quot;&gt;&lt;b&gt;4* Hotel&lt;/b&gt;&lt;br&gt;&lt;/td&gt;&lt;td align=&quot;center&quot;&gt;&lt;b&gt;5* Hotel&lt;/b&gt;&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Quad Share&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 3,000&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 5,000&lt;/td&gt;&lt;td&gt;Tk. 7,000&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Triple Share&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 4,000&lt;/td&gt;&lt;td&gt;Tk. 6,000&lt;/td&gt;&lt;td&gt;Tk. 8,000&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Double Share&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 5,000&lt;/td&gt;&lt;td&gt;Tk. 7,000&lt;/td&gt;&lt;td&gt;Tk. 9,000&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Single Share&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 6,000&lt;/td&gt;&lt;td&gt;Tk. 8,000&lt;/td&gt;&lt;td&gt;Tk. 10,000&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;h3&gt;&lt;br&gt;&lt;/h3&gt;&lt;p&gt;&lt;/p&gt;&lt;h3&gt;&lt;font color=&quot;#6BADDE&quot;&gt;&lt;/font&gt;&lt;/h3&gt;&lt;p&gt;&lt;/p&gt;', '29(0).jpg', 4, 3, 3000, 'Available', '2022-09-17 15:51:07'),
(30, 'Tour in Cox&#039;s Bazar', 'Dhaka | Sylhet | Dhaka', '3', '&lt;p&gt;&amp;gt;&amp;gt; Dhaka | Cox&#039;s Bazar | Dhaka&lt;br&gt;&lt;span style=&quot;font-size: 1rem;&quot;&gt;&amp;gt;&amp;gt; Air Transportation&lt;/span&gt;&lt;/p&gt;', '&lt;h3 align=&quot;left&quot;&gt;&lt;font color=&quot;#6BADDE&quot;&gt;Package Inclusion:&lt;/font&gt;&lt;/h3&gt;&lt;p&gt;Lorem, ipsum dolor sit amet consectetur adipisicing, elit. Molestias \r\n  aspernatur, cumque, deleniti suscipit voluptate debitis laboriosam. Nisi\r\n   officiis quaerat quia, expedita harum beatae. Id qui sed quia \r\n  perspiciatis iure optio.&lt;/p&gt;&lt;h3&gt;&lt;font color=&quot;#6BADDE&quot;&gt;Package Price Detail (Per Person):&lt;/font&gt;&lt;/h3&gt;&lt;table class=&quot;table table-bordered&quot;&gt;&lt;tbody&gt;&lt;tr&gt;&lt;td align=&quot;left&quot;&gt;&lt;b&gt;Sharing Basis&lt;/b&gt;&lt;br&gt;&lt;/td&gt;&lt;td align=&quot;center&quot;&gt;&lt;b&gt;3* Hotel&lt;/b&gt;&lt;br&gt;&lt;/td&gt;&lt;td align=&quot;center&quot;&gt;&lt;b&gt;4* Hotel&lt;/b&gt;&lt;br&gt;&lt;/td&gt;&lt;td align=&quot;center&quot;&gt;&lt;b&gt;5* Hotel&lt;/b&gt;&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Quad Share&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 7,000&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 9,000&lt;/td&gt;&lt;td&gt;Tk. 12,000&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Triple Share&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 8,000&lt;/td&gt;&lt;td&gt;Tk. 10,000&lt;/td&gt;&lt;td&gt;Tk. 14,000&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Double Share&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 9,000&lt;/td&gt;&lt;td&gt;Tk. 12,000&lt;/td&gt;&lt;td&gt;Tk. 16,000&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Single Share&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 10,000&lt;/td&gt;&lt;td&gt;Tk. 14,000&lt;/td&gt;&lt;td&gt;Tk. 18,000&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;h3&gt;&lt;br&gt;&lt;/h3&gt;&lt;p&gt;&lt;/p&gt;&lt;h3&gt;&lt;font color=&quot;#6BADDE&quot;&gt;&lt;/font&gt;&lt;/h3&gt;&lt;p&gt;&lt;/p&gt;', '30(0).jpg', 3, 3, 7000, 'Available', '2022-09-17 15:55:14'),
(31, 'Tour in Nator | Bogura | Mohasthangar', 'Nator | Bogura | Mohasthangar', '3', '&lt;p&gt;&amp;gt;&amp;gt; Nator | Bogura | Mohasthangar&lt;br&gt;&lt;span style=&quot;font-size: 1rem;&quot;&gt;&amp;gt;&amp;gt; Company Transport Service&lt;/span&gt;&lt;/p&gt;', '&lt;h3 align=&quot;left&quot;&gt;&lt;font color=&quot;#6BADDE&quot;&gt;Package Inclusion:&lt;/font&gt;&lt;/h3&gt;&lt;p&gt;Lorem, ipsum dolor sit amet consectetur adipisicing, elit. Molestias \r\n  aspernatur, cumque, deleniti suscipit voluptate debitis laboriosam. Nisi\r\n   officiis quaerat quia, expedita harum beatae. Id qui sed quia \r\n  perspiciatis iure optio.&lt;/p&gt;&lt;h3&gt;&lt;font color=&quot;#6BADDE&quot;&gt;Package Price Detail (Per Person):&lt;/font&gt;&lt;/h3&gt;&lt;table class=&quot;table table-bordered&quot;&gt;&lt;tbody&gt;&lt;tr&gt;&lt;td align=&quot;left&quot;&gt;&lt;b&gt;Sharing Basis&lt;/b&gt;&lt;br&gt;&lt;/td&gt;&lt;td align=&quot;center&quot;&gt;&lt;b&gt;3* Hotel&lt;/b&gt;&lt;br&gt;&lt;/td&gt;&lt;td align=&quot;center&quot;&gt;&lt;b&gt;4* Hotel&lt;/b&gt;&lt;br&gt;&lt;/td&gt;&lt;td align=&quot;center&quot;&gt;&lt;b&gt;5* Hotel&lt;/b&gt;&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Quad Share&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 4,000&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 6,000&lt;/td&gt;&lt;td&gt;Tk. 8,000&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Triple Share&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 5,000&lt;/td&gt;&lt;td&gt;Tk. 7,000&lt;/td&gt;&lt;td&gt;Tk. 9,000&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Double Share&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 6,000&lt;/td&gt;&lt;td&gt;Tk. 8,000&lt;/td&gt;&lt;td&gt;Tk. 10,000&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Single Share&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 7,000&lt;/td&gt;&lt;td&gt;Tk. 9,000&lt;/td&gt;&lt;td&gt;Tk. 11,000&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;h3&gt;&lt;br&gt;&lt;/h3&gt;&lt;p&gt;&lt;/p&gt;&lt;h3&gt;&lt;font color=&quot;#6BADDE&quot;&gt;&lt;/font&gt;&lt;/h3&gt;&lt;p&gt;&lt;/p&gt;', '31(0).jpg', 3, 3, 4000, 'Available', '2022-09-17 15:59:21'),
(32, 'Tour in Greece', 'Dhaka | Greece | Dhaka', '4', '&lt;p&gt;&amp;gt;&amp;gt; Dhaka | Greece | Dhaka&lt;br&gt;&lt;span style=&quot;font-size: 1rem;&quot;&gt;&amp;gt;&amp;gt; Airport drop and receive&lt;/span&gt;&lt;/p&gt;', '&lt;h3 align=&quot;left&quot;&gt;&lt;font color=&quot;#6BADDE&quot;&gt;Package Inclusion:&lt;/font&gt;&lt;/h3&gt;&lt;p&gt;Lorem, ipsum dolor sit amet consectetur adipisicing, elit. Molestias \r\n  aspernatur, cumque, deleniti suscipit voluptate debitis laboriosam. Nisi\r\n   officiis quaerat quia, expedita harum beatae. Id qui sed quia \r\n  perspiciatis iure optio.&lt;/p&gt;&lt;h3&gt;&lt;font color=&quot;#6BADDE&quot;&gt;Package Price Detail (Per Person):&lt;/font&gt;&lt;/h3&gt;&lt;table class=&quot;table table-bordered&quot;&gt;&lt;tbody&gt;&lt;tr&gt;&lt;td align=&quot;left&quot;&gt;&lt;b&gt;Sharing Basis&lt;/b&gt;&lt;br&gt;&lt;/td&gt;&lt;td align=&quot;center&quot;&gt;&lt;b&gt;3* Hotel&lt;/b&gt;&lt;br&gt;&lt;/td&gt;&lt;td align=&quot;center&quot;&gt;&lt;b&gt;4* Hotel&lt;/b&gt;&lt;br&gt;&lt;/td&gt;&lt;td align=&quot;center&quot;&gt;&lt;b&gt;5* Hotel&lt;/b&gt;&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Quad Share&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 12,000&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 14,000&lt;/td&gt;&lt;td&gt;Tk. 16,000&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Triple Share&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 14,000&lt;/td&gt;&lt;td&gt;Tk. 16,000&lt;/td&gt;&lt;td&gt;Tk. 18,000&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Double Share&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 16,000&lt;/td&gt;&lt;td&gt;Tk. 18,000&lt;/td&gt;&lt;td&gt;Tk. 20,000&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Single Share&lt;br&gt;&lt;/td&gt;&lt;td&gt;Tk. 10,000&lt;/td&gt;&lt;td&gt;Tk. 14,000&lt;/td&gt;&lt;td&gt;Tk. 18,000&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;h3&gt;&lt;br&gt;&lt;/h3&gt;&lt;p&gt;&lt;/p&gt;&lt;h3&gt;&lt;font color=&quot;#6BADDE&quot;&gt;&lt;/font&gt;&lt;/h3&gt;&lt;p&gt;&lt;/p&gt;', '32(0).jpg', 5, 4, 12000, 'Available', '2022-09-17 16:08:24'),
(47, 'North Bengal Archaeological Tour', 'Soto Sona Mosque|Kusumba Mosque|Kantajew Temple|Terracotta', '3', '&lt;p&gt;&amp;gt;&amp;gt; North Bengal of Bangladesh&lt;br&gt;&amp;gt;&amp;gt; Bagha Mosque, Natore \r\nRajbari, Kushumba Mosque, Somapura Mahavihara&lt;br&gt;&amp;gt;&amp;gt; Kantajew Temple, Nayabad Mosque, Tajhat Place and Dimla \r\nKali Mandir and so on&lt;br&gt;&lt;/p&gt;', '&lt;p&gt;In this tour, I will show you all major impressive archaeological sites \r\nin North Bengal of Bangladesh, including Varendra Research Museum, \r\nHistoric Kingdom of Gauda, Bagha Mosque, Temple Village Puthia, Natore \r\nRajbari, Kushumba Mosque, Somapura Mahavihara, and Ancient City \r\nMahasthangarh, Kantajew Temple, Nayabad Mosque, Tajhat Place and Dimla \r\nKali Mandir and so on!&lt;br&gt;&lt;br&gt;If you are an archaeology lover and want \r\nto come closer to the heavenly beauty of the countryside then this could\r\n be the best tour for you.&lt;br&gt;&lt;br&gt;Bangladesh is the largest river delta \r\nin the world. It is heir to a rich cultural legacy despite the various \r\ndestructive activities of nature and man. If we look back two thousand \r\nfive hundred years ago to the streams of history, we find many splendid \r\ncities, magnificent palaces, and buildings, temples, stupas, mosques, \r\nand mausoleums erected by various rulers and settlers of this country. \r\nParticularly the Northern part of our country is significantly rich with\r\n its archaeological wealth and treasures.&lt;/p&gt;&lt;h2&gt;Itinerary&lt;/h2&gt;&lt;ul&gt;&lt;li&gt;Day One: Dhaka - Rajshahi by Train, Rajshahi City Tour&lt;/li&gt;&lt;li&gt;Day Two: Visit the Historic Kingdom of Gauda also Known as Lakhnauti&lt;/li&gt;&lt;li&gt;Day Three: Bagha Mosque, Temple Village Puthia, Natore Rajbari&lt;/li&gt;&lt;li&gt;Day Four: Kushumba Mosque, Somapura Mahavihara, and Ancient City Mahasthangarh&lt;/li&gt;&lt;li&gt;Day Five: River Island and Rangpur&lt;/li&gt;&lt;li&gt;Day Six: Handicraft Factory and Tista River&lt;/li&gt;&lt;li&gt;Day Seven: Kantajew Temple, Nayabad Mosque, Tajhat Place, Fly Back to Dhaka&lt;br&gt;&lt;/li&gt;&lt;/ul&gt;', '47(0).jpg|47(1).jpg|47(2).jpg|47(3).jpg', 7, 6, 9000, 'Available', '2022-10-28 10:13:21');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `pmt_id` smallint(5) UNSIGNED NOT NULL,
  `booking_id` smallint(5) UNSIGNED NOT NULL,
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `payment_gatway` varchar(10) NOT NULL,
  `total_amount` mediumint(8) UNSIGNED NOT NULL,
  `payment_amount` mediumint(8) UNSIGNED NOT NULL,
  `transaction_id` varchar(20) NOT NULL,
  `sender_number` varchar(15) NOT NULL,
  `payment_status` varchar(10) NOT NULL DEFAULT 'Pending',
  `payment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`pmt_id`, `booking_id`, `user_id`, `payment_gatway`, `total_amount`, `payment_amount`, `transaction_id`, `sender_number`, `payment_status`, `payment_time`) VALUES
(7, 10, 4, 'bkash', 28000, 12000, 'slikfg34576', '01558981652', 'Partial', '2022-10-31 10:46:07'),
(8, 11, 4, 'rocket', 12000, 12000, 'das3242', '01558981652', 'Confirmed', '2022-10-31 10:48:38'),
(9, 12, 4, 'nagad', 36000, 36000, 'fgh4w5634', '3453700786', 'Confirmed', '2022-10-31 10:49:41'),
(10, 13, 3, 'rocket', 15000, 13000, 'ag56', '34985923', 'Pending', '2022-10-31 10:51:12'),
(11, 14, 3, 'rocket', 12000, 12000, 'waeffasf', '234234141234', 'Invalid', '2022-10-31 10:51:42'),
(12, 15, 5, 'rocket', 135000, 135000, 'fdgast45', '6745667', 'Confirmed', '2022-10-31 10:52:42'),
(13, 16, 5, 'rocket', 9000, 9000, 'dfdgasfgaf', '45688624', 'Pending', '2022-10-31 10:53:03'),
(14, 17, 5, 'nagad', 270000, 222222, '2222222222', '22222222', 'Partial', '2022-10-31 10:56:55'),
(15, 18, 5, 'bkash', 36000, 36000, 'sfhgsfhs', '5734724', 'Pending', '2022-10-31 10:59:10');

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
-- Stand-in structure for view `view_bookings`
-- (See below for the actual view)
--
CREATE TABLE `view_bookings` (
`Booking ID` smallint(5) unsigned
,`User ID` smallint(5) unsigned
,`Booking Time` datetime
,`Journey Date` date
,`Booking Status` varchar(10)
,`Extra Info` varchar(100)
,`Total Person` tinyint(2)
,`Package ID` smallint(4) unsigned
,`Package Name` varchar(100)
,`Duration` varchar(23)
,`Package Cost` mediumint(7) unsigned
,`Payment ID` smallint(5) unsigned
,`Payment Gatway` varchar(10)
,`Payment Amount` mediumint(8) unsigned
,`Total Amount` mediumint(8) unsigned
,`Send From` varchar(15)
,`Transaction ID` varchar(20)
,`Payment Status` varchar(10)
);

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
,`Thumbnail` varchar(200)
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
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `w_id` smallint(5) UNSIGNED NOT NULL,
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `package_id` smallint(5) UNSIGNED NOT NULL,
  `wishlist_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`w_id`, `user_id`, `package_id`, `wishlist_time`) VALUES
(11, 3, 26, '2022-10-30 21:20:12'),
(13, 3, 29, '2022-10-30 21:20:17'),
(14, 4, 27, '2022-10-31 10:48:57'),
(15, 4, 29, '2022-10-31 10:49:00'),
(16, 5, 25, '2022-10-31 10:52:12'),
(17, 5, 29, '2022-10-31 10:52:14'),
(18, 5, 47, '2022-10-31 10:52:16');

-- --------------------------------------------------------

--
-- Structure for view `users_view`
--
DROP TABLE IF EXISTS `users_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `users_view`  AS SELECT `u`.`id` AS `ID`, `u`.`name` AS `Name`, `u`.`email` AS `Email`, `u`.`username` AS `User Name`, `ui`.`phone` AS `Phone`, concat(`ui`.`address`,'<br><br>',`ui`.`post_code`,'<br><br>',`ui`.`country`) AS `Full Address`, `ui`.`profile_picture` AS `Picture`, `ut`.`user_type_name` AS `Type`, `u`.`status` AS `Status` FROM ((`users` `u` join `user_info` `ui`) join `user_type` `ut`) WHERE `u`.`id` = `ui`.`user_id` AND `u`.`user_type` = `ut`.`user_type_code``user_type_code`  ;

-- --------------------------------------------------------

--
-- Structure for view `view_bookings`
--
DROP TABLE IF EXISTS `view_bookings`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_bookings`  AS SELECT `b`.`b_id` AS `Booking ID`, `b`.`user_id` AS `User ID`, `b`.`booking_time` AS `Booking Time`, `b`.`journey_date` AS `Journey Date`, `b`.`booking_status` AS `Booking Status`, `b`.`extra_info` AS `Extra Info`, `b`.`total_person` AS `Total Person`, `pac`.`p_id` AS `Package ID`, `pac`.`p_name` AS `Package Name`, concat(`pac`.`p_dur_days`,' Days & ',`pac`.`p_dur_nights`,' Nights') AS `Duration`, `pac`.`p_price` AS `Package Cost`, `pmt`.`pmt_id` AS `Payment ID`, `pmt`.`payment_gatway` AS `Payment Gatway`, `pmt`.`payment_amount` AS `Payment Amount`, `pmt`.`total_amount` AS `Total Amount`, `pmt`.`sender_number` AS `Send From`, `pmt`.`transaction_id` AS `Transaction ID`, `pmt`.`payment_status` AS `Payment Status` FROM ((`bookings` `b` join `packages` `pac`) join `payments` `pmt`) WHERE `b`.`package_id` = `pac`.`p_id` AND `b`.`b_id` = `pmt`.`booking_id`;

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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user_edit`  AS SELECT `u`.`id` AS `id`, `ui`.`first_name` AS `first_name`, `ui`.`last_name` AS `last_name`, `ui`.`email` AS `email`, `ui`.`phone` AS `phone`, `u`.`username` AS `username`, `ui`.`country` AS `country`, `ui`.`post_code` AS `post_code`, `ui`.`address` AS `address`, `ui`.`profile_picture` AS `profile_picture`, `u`.`user_type` AS `user_type`, `u`.`status` AS `status` FROM (`users` `u` join `user_info` `ui`) WHERE `u`.`id` = `ui`.`user_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`b_id`);

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`pmt_id`),
  ADD UNIQUE KEY `transaction_id` (`transaction_id`);

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
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`w_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `b_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `p_id` smallint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `pmt_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `w_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
