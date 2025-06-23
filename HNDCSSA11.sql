-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 18, 2024 at 12:53 PM
-- Server version: 5.5.29
-- PHP Version: 5.3.10-1ubuntu3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `HNDCSSA11`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE IF NOT EXISTS `bank_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `exp_month` tinyint(4) NOT NULL,
  `exp_year` tinyint(4) NOT NULL,
  `cvv` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`id`, `user_id`, `card_number`, `exp_month`, `exp_year`, `cvv`, `created_at`) VALUES
(1, 2, '1111111111111111', 11, 11, 111, '2024-12-08 15:38:32'),
(2, 9, '1234566435351111', 11, 22, 111, '2024-12-15 11:09:16'),
(3, 10, '1111222233334444', 12, 30, 123, '2024-12-15 15:39:43'),
(4, 10, '1111222233334444', 12, 45, 123, '2024-12-15 16:31:59'),
(5, 11, '1234567891234567', 4, 21, 127, '2024-12-15 16:54:33'),
(6, 12, '3214567891234567', 5, 28, 127, '2024-12-15 16:57:59'),
(7, 13, '1234567891234567', 12, 12, 123, '2024-12-16 14:27:39'),
(8, 16, '1234567891234567', 12, 14, 127, '2024-12-16 16:01:56'),
(9, 14, '5432187467123452', 6, 34, 127, '2024-12-17 15:23:23');

-- --------------------------------------------------------

--
-- Table structure for table `booking_content`
--

CREATE TABLE IF NOT EXISTS `booking_content` (
  `content_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `booking_id` int(10) unsigned NOT NULL,
  `movie_id` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL DEFAULT '1',
  `price` decimal(4,2) NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=208 ;

--
-- Dumping data for table `booking_content`
--

INSERT INTO `booking_content` (`content_id`, `booking_id`, `movie_id`, `quantity`, `price`) VALUES
(1, 1, 2, 1, 7.99),
(2, 2, 2, 1, 7.99),
(3, 2, 3, 1, 7.99),
(4, 3, 1, 1, 7.99),
(5, 3, 3, 1, 7.99),
(6, 4, 0, 1, 7.99),
(7, 5, 0, 1, 7.99),
(8, 6, 2, 1, 7.99),
(9, 7, 2, 1, 7.99),
(10, 8, 2, 1, 7.99),
(11, 9, 1, 1, 7.99),
(12, 10, 1, 1, 7.99),
(13, 11, 5, 1, 7.99),
(14, 12, 1, 1, 7.99),
(15, 12, 5, 1, 7.99),
(16, 13, 1, 1, 7.99),
(17, 14, 1, 1, 7.99),
(18, 15, 1, 1, 7.99),
(19, 16, 1, 1, 7.99),
(20, 17, 1, 1, 7.99),
(21, 18, 0, 1, 7.99),
(22, 19, 1, 1, 7.99),
(23, 20, 2, 1, 7.99),
(24, 21, 3, 1, 7.99),
(25, 22, 1, 1, 7.99),
(26, 23, 1, 1, 7.99),
(27, 24, 1, 2, 7.99),
(28, 25, 5, 1, 7.99),
(29, 26, 1, 5, 7.99),
(30, 27, 1, 14, 7.99),
(31, 28, 0, 5, 7.99),
(32, 29, 2, 5, 7.99),
(33, 30, 2, 8, 7.99),
(34, 31, 1, 19, 3.00),
(35, 31, 3, 16, 7.99),
(36, 32, 0, 9, 7.99),
(37, 33, 1, 10, 7.99),
(38, 34, 1, 6, 7.99),
(39, 35, 3, 1, 7.99),
(40, 36, 1, 1, 7.99),
(41, 37, 1, 1, 7.99),
(42, 37, 2, 1, 7.99),
(43, 37, 3, 1, 7.99),
(44, 37, 4, 1, 7.99),
(45, 37, 5, 1, 7.99),
(46, 38, 1, 4, 7.99),
(47, 39, 2, 1, 7.99),
(48, 39, 3, 1, 7.99),
(49, 40, 5, 1, 7.99),
(50, 41, 0, 2, 7.99),
(51, 41, 2, 1, 7.99),
(52, 43, 2, 10, 7.99),
(53, 44, 2, 1, 7.99),
(54, 45, 1, 4, 7.99),
(55, 46, 0, 4, 7.99),
(56, 47, 4, 4, 7.99),
(57, 48, 2, 1, 7.99),
(58, 49, 3, 5, 7.99),
(59, 50, 1, 14, 7.99),
(60, 51, 1, 1, 7.99),
(61, 52, 1, 1, 7.99),
(62, 52, 2, 2, 7.99),
(63, 53, 3, 4, 7.99),
(64, 54, 3, 5, 7.99),
(65, 55, 3, 7, 7.99),
(66, 56, 2, 1, 7.99),
(67, 57, 2, 1, 7.99),
(68, 58, 1, 1, 7.99),
(69, 59, 2, 1, 7.99),
(70, 60, 1, 16, 7.99),
(71, 61, 2, 1, 7.99),
(72, 62, 2, 4, 7.99),
(73, 63, 6, 9, 7.99),
(74, 64, 8, 1, 7.99),
(75, 65, 2, 7, 7.99),
(76, 65, 13, 13, 7.99),
(77, 66, 1, 1, 7.99),
(78, 67, 13, 4, 7.99),
(79, 68, 6, 1, 7.99),
(80, 69, 2, 1, 7.99),
(81, 70, 2, 2, 7.99),
(82, 70, 3, 6, 7.99),
(83, 70, 4, 2, 7.99),
(84, 70, 5, 3, 7.99),
(85, 70, 6, 3, 7.99),
(86, 70, 7, 3, 7.99),
(87, 70, 8, 2, 7.99),
(88, 70, 9, 2, 19.99),
(89, 70, 10, 3, 7.99),
(90, 70, 11, 2, 7.99),
(91, 70, 12, 3, 7.99),
(92, 70, 13, 5, 7.99),
(93, 71, 2, 6, 7.99),
(94, 71, 3, 4, 7.99),
(95, 71, 5, 2, 7.99),
(96, 72, 1, 2, 7.99),
(97, 73, 0, 2, 7.99),
(98, 73, 1, 8, 7.99),
(99, 73, 2, 4, 7.99),
(100, 73, 3, 2, 7.99),
(101, 74, 0, 7, 7.99),
(102, 74, 1, 3, 7.99),
(103, 74, 2, 1, 7.99),
(104, 74, 9, 2, 19.99),
(105, 75, 0, 1, 7.99),
(106, 75, 3, 1, 7.99),
(107, 76, 3, 1, 7.99),
(108, 77, 3, 2, 7.99),
(109, 78, 2, 1, 7.99),
(110, 79, 2, 1, 7.99),
(111, 80, 3, 1, 7.99),
(112, 81, 0, 3, 7.99),
(113, 82, 3, 1, 7.99),
(114, 83, 2, 1, 7.99),
(115, 84, 3, 1, 7.99),
(116, 85, 3, 1, 7.99),
(117, 86, 2, 1, 7.99),
(118, 87, 0, 1, 7.99),
(119, 88, 0, 1, 7.99),
(120, 89, 11, 1, 7.99),
(121, 90, 2, 7, 7.99),
(122, 90, 3, 1, 7.99),
(123, 91, 1, 1, 7.99),
(124, 92, 0, 6, 7.99),
(125, 93, 0, 1, 7.99),
(126, 93, 10, 3, 7.99),
(127, 94, 3, 2, 7.99),
(128, 95, 0, 2, 7.99),
(129, 96, 0, 2, 7.99),
(130, 97, 1, 12, 7.99),
(131, 98, 2, 25, 7.99),
(132, 99, 0, 7, 7.99),
(133, 99, 1, 4, 7.99),
(134, 99, 3, 4, 7.99),
(135, 100, 2, 5, 7.99),
(136, 101, 1, 1, 7.99),
(137, 101, 3, 3, 7.99),
(138, 102, 2, 14, 7.99),
(139, 103, 0, 2, 7.99),
(140, 104, 2, 4, 7.99),
(141, 105, 6, 3, 7.99),
(142, 105, 8, 2, 7.99),
(143, 106, 2, 1, 7.99),
(144, 106, 3, 5, 7.99),
(145, 107, 1, 1, 7.99),
(146, 108, 7, 2, 7.99),
(147, 109, 10, 6, 7.99),
(148, 110, 4, 2, 7.99),
(149, 110, 10, 2, 7.99),
(150, 111, 1, 4, 7.99),
(151, 111, 2, 1, 7.99),
(152, 112, 1, 2, 7.00),
(153, 112, 2, 4, 7.00),
(154, 112, 3, 2, 7.99),
(155, 112, 4, 1, 7.99),
(156, 112, 6, 3, 7.99),
(157, 112, 9, 1, 19.99),
(158, 112, 10, 1, 7.99),
(159, 112, 13, 1, 7.99),
(160, 113, 4, 1, 7.99),
(161, 114, 13, 5, 7.99),
(162, 115, 13, 8, 7.99),
(163, 116, 3, 6, 7.99),
(164, 117, 0, 1, 7.99),
(165, 118, 0, 1, 7.99),
(166, 119, 4, 6, 7.99),
(167, 120, 1, 1, 7.99),
(168, 121, 1, 1, 7.99),
(169, 122, 1, 1, 7.99),
(170, 123, 7, 1, 7.99),
(171, 124, 12, 1, 7.99),
(172, 125, 1, 1, 7.99),
(173, 125, 13, 5, 7.99),
(174, 126, 11, 6, 7.99),
(175, 127, 12, 6, 7.99),
(176, 128, 0, 2, 7.99),
(177, 128, 1, 5, 7.99),
(178, 128, 2, 3, 7.99),
(179, 128, 8, 1, 7.99),
(180, 129, 13, 7, 7.99),
(181, 130, 6, 6, 7.99),
(182, 131, 10, 5, 7.99),
(183, 132, 2, 1, 7.99),
(184, 133, 0, 1, 7.99),
(185, 134, 2, 3, 7.99),
(186, 135, 2, 1, 7.99),
(187, 136, 1, 1, 7.99),
(188, 137, 1, 1, 7.99),
(189, 138, 2, 1, 7.99),
(190, 139, 0, 1, 7.99),
(191, 140, 2, 1, 7.99),
(192, 141, 3, 1, 7.99),
(193, 142, 2, 1, 7.99),
(194, 143, 1, 1, 7.99),
(195, 144, 1, 5, 7.99),
(196, 145, 5, 8, 7.99),
(197, 146, 3, 1, 7.99),
(198, 147, 2, 1, 7.99),
(199, 148, 13, 4, 7.99),
(200, 149, 1, 1, 7.99),
(201, 150, 6, 6, 7.99),
(202, 151, 6, 1, 7.99),
(203, 151, 11, 1, 7.99),
(204, 152, 13, 4, 7.99),
(205, 153, 7, 5, 7.99),
(206, 154, 7, 4, 7.99),
(207, 155, 11, 2, 7.99);

-- --------------------------------------------------------

--
-- Table structure for table `comingFilms`
--

CREATE TABLE IF NOT EXISTS `comingFilms` (
  `movie_id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_title` varchar(255) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `age_rating` varchar(10) NOT NULL,
  `theatre` varchar(255) NOT NULL,
  `further_info` text,
  `release` date DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `preview` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`movie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `comingFilms`
--

INSERT INTO `comingFilms` (`movie_id`, `movie_title`, `genre`, `age_rating`, `theatre`, `further_info`, `release`, `img`, `preview`) VALUES
(1, 'Captain America: Brave New World', 'Action', 'PG-13', 'Edinburgh Cinema', 'Sam finds himself in the middle of an international incident after meeting with President Thaddeus Ross. He must soon discover the reason behind a nefarious global plot before the true mastermind has the entire world seeing red.', '2025-07-25', 'captainamerica.jpg', 'https://www.youtube.com/watch?v=SWZyuEQPQYo'),
(2, 'A Minecraft Movie', 'Adventure', 'PG', 'Edinburgh Cinema', 'A mysterious portal pulls four misfits into the Overworld, a bizarre, cubic wonderland that thrives on imagination. To get back home, they''ll have to master the terrain while embarking on a magical quest with an unexpected crafter named Steve.', '2025-12-10', 'minecraftmovie.jpg', 'https://www.youtube.com/watch?v=wJO_vIDZn-I'),
(3, 'Thunderbolts', 'Action', 'PG-13', 'Edinburgh Cinema', 'A group of supervillains are recruited to go on missions for the government.', '2025-08-15', 'thunderbolts.jpg', 'https://www.youtube.com/watch?v=8IiAm7KUuoY'),
(4, 'Jurassic World Rebirth', 'Adventure', 'PG-13', 'Edinburgh Cinema', 'A woman and a family get stranded on an island that''s home to ferocious dinosaurs.', '2025-06-12', 'jurassicworldrebirth.jpg', 'https://www.youtube.com/watch?v=etSijxQO2Bg'),
(5, 'Snow White', 'Adventure', 'PG', 'Edinburgh Cinema', 'Snow White is a live-action adaptation of Disney''s 1937 animated film Snow White and the Seven Dwarfs. It''s scheduled for release in theaters on March 21, 2025.', '2025-03-21', 'snow.jpg', 'https://www.youtube.com/watch?v=iV46TJKL8cU');

-- --------------------------------------------------------

--
-- Table structure for table `movie_booking`
--

CREATE TABLE IF NOT EXISTS `movie_booking` (
  `booking_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id` int(10) unsigned NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `booking_date` datetime NOT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=156 ;

--
-- Dumping data for table `movie_booking`
--

INSERT INTO `movie_booking` (`booking_id`, `id`, `total`, `booking_date`) VALUES
(31, 2, 184.84, '2024-12-07 14:51:33'),
(32, 2, 7.99, '2024-12-07 14:51:48'),
(33, 2, 79.90, '2024-12-07 14:55:42'),
(34, 2, 47.94, '2024-12-07 14:55:59'),
(35, 2, 7.99, '2024-12-07 14:56:03'),
(36, 2, 7.99, '2024-12-07 14:56:56'),
(37, 2, 39.95, '2024-12-07 15:00:19'),
(38, 2, 31.96, '2024-12-07 15:00:35'),
(39, 2, 15.98, '2024-12-07 15:01:16'),
(40, 2, 7.99, '2024-12-07 15:06:37'),
(41, 2, 23.97, '2024-12-07 15:07:00'),
(42, 2, 0.00, '2024-12-07 17:53:28'),
(43, 2, 79.90, '2024-12-07 17:57:25'),
(44, 2, 7.99, '2024-12-07 17:57:37'),
(45, 2, 31.96, '2024-12-08 11:13:32'),
(46, 2, 31.96, '2024-12-08 11:19:10'),
(47, 2, 31.96, '2024-12-08 11:19:17'),
(48, 2, 7.99, '2024-12-08 11:19:49'),
(49, 2, 39.95, '2024-12-08 11:21:55'),
(50, 2, 111.86, '2024-12-08 11:26:08'),
(51, 2, 7.99, '2024-12-08 11:31:59'),
(52, 2, 23.97, '2024-12-08 11:32:17'),
(53, 2, 31.96, '2024-12-08 11:36:36'),
(54, 2, 39.95, '2024-12-08 14:23:07'),
(55, 2, 55.93, '2024-12-08 14:33:42'),
(56, 2, 7.99, '2024-12-08 15:38:01'),
(57, 2, 7.99, '2024-12-08 15:39:46'),
(58, 2, 7.99, '2024-12-08 15:41:01'),
(59, 2, 7.99, '2024-12-08 15:51:57'),
(60, 2, 127.84, '2024-12-11 15:12:31'),
(61, 2, 7.99, '2024-12-11 15:24:32'),
(62, 2, 31.96, '2024-12-11 15:26:11'),
(63, 2, 71.91, '2024-12-11 15:26:20'),
(64, 2, 7.99, '2024-12-11 15:26:32'),
(65, 2, 159.80, '2024-12-11 15:26:55'),
(66, 2, 7.99, '2024-12-11 15:41:21'),
(67, 2, 31.96, '2024-12-11 15:41:30'),
(68, 2, 7.99, '2024-12-13 16:12:10'),
(69, 2, 7.99, '2024-12-13 16:12:17'),
(70, 2, 311.64, '2024-12-13 16:54:34'),
(71, 2, 95.88, '2024-12-13 18:13:37'),
(72, 2, 15.98, '2024-12-13 20:20:41'),
(73, 2, 127.84, '2024-12-13 22:08:05'),
(74, 2, 127.87, '2024-12-14 15:21:33'),
(75, 2, 15.98, '2024-12-14 15:32:33'),
(76, 2, 7.99, '2024-12-14 15:34:07'),
(77, 2, 15.98, '2024-12-14 15:42:04'),
(78, 2, 7.99, '2024-12-14 15:44:35'),
(79, 2, 7.99, '2024-12-14 15:47:44'),
(80, 2, 7.99, '2024-12-14 15:52:28'),
(81, 2, 23.97, '2024-12-14 16:19:07'),
(82, 2, 7.99, '2024-12-14 16:24:53'),
(83, 2, 7.99, '2024-12-14 16:25:35'),
(84, 2, 7.99, '2024-12-14 16:27:22'),
(85, 2, 7.99, '2024-12-14 16:31:05'),
(86, 2, 7.99, '2024-12-14 16:31:34'),
(87, 2, 7.99, '2024-12-14 16:34:28'),
(88, 2, 7.99, '2024-12-14 17:05:34'),
(89, 2, 7.99, '2024-12-14 17:07:26'),
(90, 9, 63.92, '2024-12-15 11:09:30'),
(91, 9, 7.99, '2024-12-15 11:55:06'),
(92, 9, 47.94, '2024-12-15 12:05:38'),
(93, 9, 31.96, '2024-12-15 12:08:46'),
(94, 9, 15.98, '2024-12-15 12:44:47'),
(95, 10, 15.98, '2024-12-15 15:40:28'),
(96, 2, 15.98, '2024-12-15 15:50:48'),
(97, 10, 95.88, '2024-12-15 16:00:24'),
(98, 10, 199.75, '2024-12-15 16:02:01'),
(99, 10, 119.85, '2024-12-15 16:07:00'),
(100, 2, 39.95, '2024-12-15 16:29:40'),
(101, 10, 31.96, '2024-12-15 16:31:21'),
(102, 10, 111.86, '2024-12-15 16:33:30'),
(103, 2, 15.98, '2024-12-15 16:36:22'),
(104, 2, 31.96, '2024-12-15 16:45:32'),
(105, 2, 39.95, '2024-12-15 16:47:37'),
(106, 11, 47.94, '2024-12-15 16:54:41'),
(107, 12, 7.99, '2024-12-15 16:58:23'),
(108, 12, 15.98, '2024-12-15 16:59:24'),
(109, 12, 47.94, '2024-12-15 17:00:09'),
(110, 12, 31.96, '2024-12-15 17:00:28'),
(111, 13, 39.95, '2024-12-16 14:27:50'),
(112, 16, 125.91, '2024-12-16 16:02:04'),
(113, 16, 7.99, '2024-12-16 16:09:48'),
(114, 16, 39.95, '2024-12-16 16:10:03'),
(115, 16, 63.92, '2024-12-16 16:10:14'),
(116, 16, 47.94, '2024-12-16 16:10:28'),
(117, 16, 7.99, '2024-12-16 16:45:12'),
(118, 16, 7.99, '2024-12-16 17:16:33'),
(119, 2, 47.94, '2024-12-16 17:44:29'),
(120, 2, 7.99, '2024-12-17 12:36:03'),
(121, 2, 7.99, '2024-12-17 13:00:11'),
(122, 2, 7.99, '2024-12-17 13:04:27'),
(123, 2, 7.99, '2024-12-17 13:10:33'),
(124, 2, 7.99, '2024-12-17 13:10:38'),
(125, 2, 47.94, '2024-12-17 13:10:53'),
(126, 2, 47.94, '2024-12-17 13:13:28'),
(127, 2, 47.94, '2024-12-17 13:17:17'),
(128, 2, 87.89, '2024-12-17 14:04:26'),
(129, 2, 55.93, '2024-12-17 14:04:35'),
(130, 2, 47.94, '2024-12-17 14:42:06'),
(131, 14, 39.95, '2024-12-17 15:24:02'),
(132, 14, 7.99, '2024-12-17 15:24:23'),
(133, 14, 7.99, '2024-12-17 15:34:29'),
(134, 14, 23.97, '2024-12-17 15:59:29'),
(135, 14, 7.99, '2024-12-17 16:11:26'),
(136, 14, 7.99, '2024-12-17 16:19:03'),
(137, 14, 7.99, '2024-12-17 16:25:29'),
(138, 14, 7.99, '2024-12-17 16:32:33'),
(139, 14, 7.99, '2024-12-17 16:32:43'),
(140, 14, 7.99, '2024-12-17 16:36:31'),
(141, 14, 7.99, '2024-12-17 16:36:40'),
(142, 14, 7.99, '2024-12-17 16:47:20'),
(143, 14, 7.99, '2024-12-17 16:47:53'),
(144, 14, 39.95, '2024-12-17 17:13:07'),
(145, 14, 63.92, '2024-12-17 17:13:41'),
(146, 14, 7.99, '2024-12-17 17:34:13'),
(147, 14, 7.99, '2024-12-17 17:38:02'),
(148, 14, 31.96, '2024-12-17 17:38:30'),
(149, 2, 7.99, '2024-12-17 17:41:57'),
(150, 2, 47.94, '2024-12-18 10:54:30'),
(151, 2, 15.98, '2024-12-18 10:59:41'),
(152, 2, 31.96, '2024-12-18 10:59:51'),
(153, 2, 39.95, '2024-12-18 11:16:03'),
(154, 2, 31.96, '2024-12-18 11:21:14'),
(155, 2, 15.98, '2024-12-18 11:56:04');

-- --------------------------------------------------------

--
-- Table structure for table `movie_listings`
--

CREATE TABLE IF NOT EXISTS `movie_listings` (
  `movie_id` int(20) NOT NULL,
  `movie_title` varchar(30) NOT NULL,
  `genre` varchar(30) NOT NULL,
  `age_rating` varchar(30) NOT NULL,
  `show1` varchar(6) NOT NULL,
  `show2` varchar(6) NOT NULL,
  `show3` varchar(6) NOT NULL,
  `theatre` varchar(20) NOT NULL,
  `further_info` varchar(500) NOT NULL,
  `release` varchar(30) NOT NULL,
  `img` varchar(30) NOT NULL,
  `preview` varchar(300) NOT NULL,
  `mov_price` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_listings`
--

INSERT INTO `movie_listings` (`movie_id`, `movie_title`, `genre`, `age_rating`, `show1`, `show2`, `show3`, `theatre`, `further_info`, `release`, `img`, `preview`, `mov_price`) VALUES
(0, 'Spiderman', 'action', 'PG-13', '11:00', '16:00', '20:00', 'Edinburgh Cinema', 'The Spider-Man franchise continues to captivate audiences worldwide with its blend of action, humor, and heartfelt storytelling. The character, created by Marvel Comics in 1962, has appeared in numerous films, animated series, and video games. Recent movies include the animated "Spider-Man: Across the Spider-Verse," showcasing a multiverse of Spider-People, and the live-action "Spider-Man: No Way Home," where Tom Holland''s Spider-Man teams up with previous incarnations of the character.  These f', 'today', 'spiderman.jpg', 'https://www.youtube.com/watch?v=t06RUxPbp_c', 7.99),
(1, 'Marvels Avengers', 'action', 'PG-13', '12:00', '17:00', '21:00', 'Edinburgh Cinema', 'Marvel''s Avengers is a superhero team from Marvel Comics, first appearing in 1963. It brings together iconic heroes like Iron Man, Thor, Hulk, Captain America, Black Widow, and Hawkeye to combat powerful threats. The team became globally popular through Marvel Studios'' films, beginning with The Avengers (2012), which introduced the team fighting Loki and an alien invasion. Subsequent films, including Avengers: Age of Ultron, Infinity War, and Endgame, depict battles against formidable foes like ', 'today', 'marvel.jpg', 'https://www.youtube.com/watch?v=eOrNdBpGMv8', 7.99),
(2, 'Thor', 'action', 'PG-13', '11:30', '15:30', '19:30', 'Edinburgh Cinema', 'Thor, a Marvel superhero based on the Norse god of thunder, wields the magical hammer Mjolnir, granting him the power of flight and weather manipulation. A founding member of the Avengers, Thor fights to protect both Earth and Asgard from threats. Portrayed by Chris Hemsworth in the Marvel Cinematic Universe, Thor''s journey spans from his arrogance in Thor (2011) to his growth as a leader in films like Thor: Ragnarok (2017) and Avengers: Endgame (2019). Known for his strength, valor, and occasio', 'today', 'thor.jpg', 'https://www.youtube.com/watch?v=JOddp-nlNvQ', 7.99),
(3, 'Gladiator II', 'Action', 'PG-15', '13:00', '17:00', '21:00', 'Edinburgh Cinema', 'In Gladiator II (2024), Lucius Verus, inspired by the legendary Maximus, is thrust into the Colosseum after being enslaved by Rome''s corrupt rulers. As he fights for survival, he discovers his true heritage and leads a rebellion to restore justice and the Roman Republic', 'today', 'gladiator2.jpg', 'https://www.youtube.com/watch?v=4rgYUipGJNo', 7.99),
(4, 'Red One', 'Sci-Fi', 'PG-13', '12:15', '14:30', '20:30', 'Edinburgh Cinema', 'A thrilling sci-fi adventure that blurs the lines between reality and imagination, where a mysterious artifact could change the fate of humanity. Secrets unravel as a daring team faces the unknown.', 'today', 'redone.jpg', 'https://www.youtube.com/watch?v=-VulfNtbSxg', 7.99),
(5, 'Venom-The Last Dance', 'Sci-Fi', 'PG-13', '10:30', '15:00', '19:00', 'Edinburgh Cinema', 'In Venom: The Last Dance, the final chapter of the trilogy, Eddie Brock and Venom face their ultimate challenge as they are hunted by enemies from both their worlds. With danger closing in, the duo must make a critical, life-altering decision that defines their legacy. This film marks Tom Hardy''s return as the titular anti-hero in a story filled with high stakes and emotional depth?', 'today', 'venom.jpg', 'https://www.youtube.com/watch?v=D42iEo8605Y', 7.99),
(6, 'Paddington in Peru', 'Fantasy', 'PG', '12:00', '15:00', '18:00', 'Edinburgh Cinema', 'PADDINGTON IN PERU brings Paddington back home to the Peruvian jungle to visit his beloved Aunt Lucy, now a resident at the Home for Retired Bears. With the Brown Family and Mrs Bird in tow, a thrilling adventure ensues when a mysterious disappearance plunges them into an unexpected journey from the Amazon rainforest to the mountain peaks of Peru.', '2024-11-08', 'paddington.jpg', 'https://www.youtube.com/watch?v=lKgitu25ZAg', 7.99),
(7, 'Moana 2', 'Fantasy', 'PG', '13:00', '16:00', '19:00', 'Edinburgh Cinema', 'Walt Disney Animation Studios epic animated musical “Moana 2” takes audiences on an expansive new voyage with Moana, Maui and a brand-new crew of unlikely seafarers. After receiving an unexpected call from her wayfinding ancestors, Moana must journey to the far seas of Oceania and into dangerous, long-lost waters for an adventure unlike anything she’s ever faced.', '2024-11-29', 'moana.jpg', 'https://www.youtube.com/watch?v=hDZ7y8RP5HE', 7.99),
(8, 'Small Things like These', 'Drama', '12A', '14:00', '17:00', '20:00', 'Edinburgh Cinema', 'Oscar winner Cillian Murphy delivers a stunning performance as devoted father Bill Furlong in this film based on the best-selling novel of the same name by Claire Keegan. While working as a coal merchant to support his family, he discovers disturbing secrets kept by the local convent — and uncovers truths of his own.', '2024-11-01', 'smallthingslikethese.jpg', 'https://www.youtube.com/watch?v=Nqwn5Y_Y4xs', 7.99),
(9, 'Andre Rieus 2024 Christmas Con', 'Musical', 'U', '11:00', '14:00', '17:00', 'Edinburgh Cinema', 'Celebrate the holiday season with Andre Rieu’s dazzling Christmas Concert, Gold and Silver, exclusively in cinemas! This magical event embodies the festive spirit of Christmas, bringing joy, warmth, and sparkle to the big screen.', '2024-12-07', 'christmas.jpg', 'https://www.youtube.com/watch?v=el7JKURuIZI', 19.99),
(10, 'Juror 2', 'Drama', 'PG-13', '13:30', '16:30', '19:30', 'Edinburgh Cinema', 'A courtroom drama exploring morality and justice.', '2024-01-01', 'juror2.jpg', 'https://www.youtube.com/watch?v=q8RubWgTvTE', 7.99),
(11, 'Wicked', 'Fantasy', 'PG', '12:00', '15:30', '19:00', 'Edinburgh Cinema', 'The untold story of the witches of Oz.', '2024-03-15', 'wicked.jpg', 'https://www.youtube.com/watch?v=pqi45Qhq3CI', 7.99),
(12, 'Sonic the Hedgehog 3', 'Action', 'PG', '11:00', '14:00', '17:00', 'Edinburgh Cinema', 'Sonic faces new challenges in this sequel.', '2024-06-01', 'sonic3.jpg', 'https://www.youtube.com/watch?v=Kk0cw0LtgdM', 7.99),
(13, 'Eileen', 'Drama', 'R', '13:00', '16:00', '19:00', 'Edinburgh Cinema', 'A gripping drama exploring dark events.', '2024-01-20', 'eileen.jpg', 'https://www.youtube.com/watch?v=arLbYhyP_14', 7.99);

-- --------------------------------------------------------

--
-- Table structure for table `movie_reviews`
--

CREATE TABLE IF NOT EXISTS `movie_reviews` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `review_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`review_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `movie_reviews`
--

INSERT INTO `movie_reviews` (`review_id`, `movie_id`, `user_name`, `rating`, `comment`, `review_date`) VALUES
(1, 6, 'Eve', 5, 'fghfh', '2024-12-13 18:02:21'),
(2, 3, 'Eve', 5, 'vhhhh', '2024-12-13 18:12:57'),
(3, 2, 'Eve', 4, 'No bad.', '2024-12-13 18:13:17'),
(4, 1, 'Eve', 5, 'Good movie', '2024-12-13 18:19:35'),
(5, 0, 'coco', 5, 'sdfsdfsdf', '2024-12-14 16:14:13'),
(6, 2, 'Gabriel', 5, 'Good movie', '2024-12-15 11:08:48'),
(7, 0, 'Eve', 5, 'asdasdad', '2024-12-15 12:06:06'),
(8, 0, 'tyyyyyyy', 3, 'yyyy', '2024-12-15 12:36:17'),
(9, 0, 'jamoncin', 4, 'jujuju yeah me encanta', '2024-12-15 15:43:19'),
(10, 0, 'jamoncin', 5, 'yeahhhhhh theeeee beeest', '2024-12-15 16:06:44'),
(11, 13, 'jamoncin', 1, 'very boring movie !', '2024-12-15 16:07:49'),
(12, 13, 'jamoncin', 3, 'okey maybe not that bad!', '2024-12-15 16:08:11'),
(13, 3, 'jamoncin', 5, 'this is soooo coool', '2024-12-15 16:30:51'),
(14, 10, 'Silvia', 5, 'Good movie', '2024-12-15 17:01:03'),
(15, 6, 'Alfonso', 3, 'Nice movie', '2024-12-18 10:51:47'),
(16, 11, 'New User', 5, 'Amazing!', '2024-12-18 11:21:41');

-- --------------------------------------------------------

--
-- Table structure for table `new_users`
--

CREATE TABLE IF NOT EXISTS `new_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `new_users`
--

INSERT INTO `new_users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'eve', 'evelinmihaylov@hotmail.com', '5e56e3537355f988e26a2c4a29107d440b8e755610042963b5aabac56dbb99d7', '2024-10-11 13:16:42'),
(2, 'eve2', 'eve2@hotmail.com', '7e2c161766dfce5005c9e9d0275b64d8f582fb8f2f65e5b5e2d4acc1092831ff', '2024-10-13 16:49:47'),
(3, 'evenew', 'evenew@hotmail.com', 'f1afaa9401e36195f78bb09dde83d00c5e46190cfac561eb2552fd3eba114ceb', '2024-10-22 20:41:28'),
(4, 'user1', 'user1@hotmail.com', '0a041b9462caa4a31bac3567e0b6e6fd9100787db2ab433d96f6d178cabfce90', '2024-10-23 12:44:20'),
(5, 'eee', 'eee@hotmail.com', '282b91e08fd50a38f030dbbdee7898d36dd523605d94d9dd6e50b298e47844be', '2024-10-30 14:51:36'),
(6, 'eve4', 'eve4@hotmail.com', 'b7de5e79b7ec01a3195259f4b78242aff6d12909a598fa874cb4467ae69b3e67', '2024-12-05 18:46:33'),
(7, 'eve5', 'eve5@hotmail.com', '85262adf74518bbb70c7cb94cd6159d91669e5a81edf1efebd543eadbda9fa2b', '2024-12-08 15:52:46'),
(8, 'eve6', 'eve6@hotmail.com', '69f7de0ba1a96ca8e6a1caf7e703a456bb1876c2f6637f6cfa9031d666a605a0', '2024-12-11 14:06:23'),
(9, 'hello1', 'hello1@hotmail.com', '91e9240f415223982edc345532630710e94a7f52cd5f48f5ee1afc555078f0ab', '2024-12-15 11:02:23'),
(10, 'gabi', 'gabi@hotmail.com', 'afb259b0841ed741fa7a3dbbb6a889a3e7b42b4229dda24b6b7947836b6209e6', '2024-12-15 15:29:32'),
(11, 'Silvia', 'silvia@hotmail.com', '2d51a3b3ca1cdf790485938566c720527b2ebbe5a1f0326316ce63aafbc385d4', '2024-12-15 16:41:28'),
(12, 'Silvia89', 'silvia89@hotmail.com', '2d51a3b3ca1cdf790485938566c720527b2ebbe5a1f0326316ce63aafbc385d4', '2024-12-15 16:56:36'),
(13, 'adolfo', 'adolfo@hotmail.com', '028576b71b246afffa7254a6c4cb535eea9a37e1477843d476be73e0ef4704f4', '2024-12-16 14:25:57'),
(14, 'newUser', 'newuser@hotmail.com', '9c9064c59f1ffa2e174ee754d2979be80dd30db552ec03e7e327e9b1a4bd594e', '2024-12-17 15:17:05');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
