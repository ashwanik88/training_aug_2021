-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 27, 2021 at 01:18 PM
-- Server version: 8.0.27-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `training_aug_2021`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int NOT NULL,
  `category_name` varchar(64) NOT NULL,
  `parent_id` int NOT NULL,
  `photo` varchar(64) NOT NULL,
  `sort_order` int NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `parent_id`, `photo`, `sort_order`, `status`) VALUES
(1, 'Electronics', 0, '', 1, 1),
(2, 'Audio', 1, '', 1, 1),
(3, 'Powerbank', 1, '', 2, 1),
(4, 'Bluetooth', 2, '', 1, 1),
(5, 'Autombiles', 0, '', 2, 1),
(6, 'Bike', 5, '', 1, 1),
(7, 'Clothes', 0, '', 1, 1),
(8, 'Winter Collections', 7, '', 2, 1),
(9, 'Jackets', 8, '', 1, 1),
(10, 'Speakers', 4, '', 1, 1),
(11, '1000 Watt', 10, '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `fullname` varchar(64) NOT NULL,
  `photo` varchar(128) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = active 0 = inactive',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `phone`, `fullname`, `photo`, `status`, `date_added`, `date_modified`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin1@admin.com', '9876543211', 'Admin Admin', '', 1, '2021-10-27 13:58:26', '2021-11-16 13:11:34'),
(6, 'anurag', 'd77d2953c546cb33e2d0bff4989f6aa2', 'anurag@anurag.com', '9876543210', 'Anurag', '', 1, '2021-11-18 13:32:56', '2021-11-18 13:32:56'),
(7, 'mayank', '308a3820e4cccbe043cb5228de5e71e3', 'mayank@mayank.com', '9875462130', 'mayank', '', 1, '2021-11-18 13:39:54', '2021-11-18 13:39:54'),
(8, 'mayank1', '308a3820e4cccbe043cb5228de5e71e3', 'mayank@mayank.com', '9875462130', 'mayank', '', 1, '2021-11-18 13:39:54', '2021-11-18 13:39:54'),
(9, 'mayank2', '308a3820e4cccbe043cb5228de5e71e3', 'mayank@mayank.com', '9875462130', 'mayank', '', 1, '2021-11-18 13:39:54', '2021-11-18 13:39:54'),
(10, 'mayank3', '308a3820e4cccbe043cb5228de5e71e3', 'mayank@mayank.com', '9875462130', 'mayank', '', 1, '2021-11-18 13:39:54', '2021-11-18 13:39:54'),
(11, 'mayank4', '308a3820e4cccbe043cb5228de5e71e3', 'mayank@mayank.com', '9875462130', 'mayank', '', 1, '2021-11-18 13:39:54', '2021-11-18 13:39:54'),
(12, 'mayank5', '308a3820e4cccbe043cb5228de5e71e3', 'mayank@mayank.com', '9875462130', 'mayank', '', 1, '2021-11-18 13:39:54', '2021-11-18 13:39:54'),
(13, 'mayank6', '308a3820e4cccbe043cb5228de5e71e3', 'mayank@mayank.com', '9875462130', 'mayank', '', 1, '2021-11-18 13:39:54', '2021-11-18 13:39:54'),
(14, 'mayank7', '308a3820e4cccbe043cb5228de5e71e3', 'mayank@mayank.com', '9875462130', 'mayank', '', 1, '2021-11-18 13:39:54', '2021-11-18 13:39:54'),
(15, 'mayank', '308a3820e4cccbe043cb5228de5e71e3', 'mayank@mayank.com', '9875462130', 'mayank', '', 1, '2021-11-18 13:39:54', '2021-11-18 13:39:54'),
(16, 'mayank1', '308a3820e4cccbe043cb5228de5e71e3', 'mayank@mayank.com', '9875462130', 'mayank', '', 1, '2021-11-18 13:39:54', '2021-11-18 13:39:54'),
(17, 'mayank2', '308a3820e4cccbe043cb5228de5e71e3', 'mayank@mayank.com', '9875462130', 'mayank', '', 1, '2021-11-18 13:39:54', '2021-11-18 13:39:54'),
(18, 'mayank3', '308a3820e4cccbe043cb5228de5e71e3', 'mayank@mayank.com', '9875462130', 'mayank', '', 1, '2021-11-18 13:39:54', '2021-11-18 13:39:54'),
(19, 'mayank4', '308a3820e4cccbe043cb5228de5e71e3', 'mayank@mayank.com', '9875462130', 'mayank', '', 1, '2021-11-18 13:39:54', '2021-11-18 13:39:54'),
(20, 'mayank5', '308a3820e4cccbe043cb5228de5e71e3', 'mayank@mayank.com', '9875462130', 'mayank', '', 1, '2021-11-18 13:39:54', '2021-11-18 13:39:54'),
(21, 'mayank6', '308a3820e4cccbe043cb5228de5e71e3', 'mayank@mayank.com', '9875462130', 'mayank', '', 1, '2021-11-18 13:39:54', '2021-11-18 13:39:54'),
(22, 'mayank7', '308a3820e4cccbe043cb5228de5e71e3', 'mayank@mayank.com', '9875462130', 'mayank', '', 1, '2021-11-18 13:39:54', '2021-11-18 13:39:54'),
(23, 'mayank', '308a3820e4cccbe043cb5228de5e71e3', 'mayank@mayank.com', '9875462130', 'mayank', '', 1, '2021-11-18 13:39:54', '2021-11-18 13:39:54'),
(24, 'mayank1', '308a3820e4cccbe043cb5228de5e71e3', 'mayank@mayank.com', '9875462130', 'mayank', '', 1, '2021-11-18 13:39:54', '2021-11-18 13:39:54'),
(25, 'mayank2', '308a3820e4cccbe043cb5228de5e71e3', 'mayank@mayank.com', '9875462130', 'mayank', '', 1, '2021-11-18 13:39:54', '2021-11-18 13:39:54'),
(26, 'mayank3', '308a3820e4cccbe043cb5228de5e71e3', 'mayank@mayank.com', '9875462130', 'mayank', '', 1, '2021-11-18 13:39:54', '2021-11-18 13:39:54'),
(27, 'mayank4', '308a3820e4cccbe043cb5228de5e71e3', 'mayank@mayank.com', '9875462130', 'mayank', '', 1, '2021-11-18 13:39:54', '2021-11-18 13:39:54'),
(28, 'mayank5', '308a3820e4cccbe043cb5228de5e71e3', 'mayank@mayank.com', '9875462130', 'mayank', '', 1, '2021-11-18 13:39:54', '2021-11-18 13:39:54'),
(29, 'mayank6', '308a3820e4cccbe043cb5228de5e71e3', 'mayank@mayank.com', '9875462130', 'mayank', '', 1, '2021-11-18 13:39:54', '2021-11-18 13:39:54'),
(31, 'admin123', '0192023a7bbd73250516f069df18b500', 'admin123@admin.com', '8754219632', 'admin123', '1638173427_favicon.jpg', 1, '2021-11-24 13:50:06', '2021-11-29 13:40:27'),
(32, 'asdfg', '040b7cf4a55014e185813e0644502ea9', 'asdfg@asdfg.com', '23424324234234', 'asdfg', '', 1, '2021-12-13 14:44:14', '2021-12-13 14:44:14'),
(33, 'zxcvbn', 'b427ebd39c845eb5417b7f7aaf1f9724', 'zxcvbn@zxcvbn.com', '345345345345', 'zxcvbn', '', 0, '2021-12-13 14:45:59', '2021-12-13 14:45:59'),
(34, 'zxcvbn1', 'e396765bd8a6a21268daa6cfd0e78ba2', 'zxcvbn@zxcvbn.com', '345345345345', 'zxcvbn', '', 0, '2021-12-13 14:47:00', '2021-12-13 14:47:00'),
(35, 'zxcvbn2', 'e396765bd8a6a21268daa6cfd0e78ba2', 'zxcvbn@zxcvbn.com', '345345345345', 'zxcvbn', '', 0, '2021-12-13 14:47:39', '2021-12-13 14:47:39'),
(36, 'zxcvbn3', 'ffbc6fde75263e3714fdaa23b4fd419f', 'zxcvbn@zxcvbn.com', '345345345345', 'zxcvbn', '', 1, '2021-12-13 14:48:21', '2021-12-13 14:48:21'),
(37, 'zxcvbn4', '10d1def02565e046de4f260ef8aabcc8', 'zxcvbn@zxcvbn.com', '345345345345', 'zxcvbn', '', 1, '2021-12-13 14:50:14', '2021-12-20 13:58:36');

-- --------------------------------------------------------

--
-- Table structure for table `users_photos`
--

CREATE TABLE `users_photos` (
  `user_photo_id` int NOT NULL,
  `user_id` int NOT NULL,
  `filename` varchar(64) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users_photos`
--

INSERT INTO `users_photos` (`user_photo_id`, `user_id`, `filename`, `date_added`) VALUES
(1, 36, '1639387101_favicon.jpg', '2021-12-13 14:49:36'),
(2, 37, '1639387214_qr_code.png', '2021-12-13 14:50:14'),
(3, 37, '1639387214_rgb-logo.png', '2021-12-13 14:50:14'),
(4, 37, '1639988916_favicon.jpg', '2021-12-20 13:58:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_photos`
--
ALTER TABLE `users_photos`
  ADD PRIMARY KEY (`user_photo_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users_photos`
--
ALTER TABLE `users_photos`
  MODIFY `user_photo_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
