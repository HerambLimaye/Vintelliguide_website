-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2021 at 07:20 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vguide`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(1, 'historical'),
(2, 'hill station'),
(3, 'honeymoon'),
(4, 'national park'),
(5, 'beach'),
(6, 'waterfall'),
(7, 'monument'),
(8, 'metrocity');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `place_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`place_id`, `category_id`) VALUES
(1, 6),
(2, 4),
(3, 3),
(4, 7),
(5, 5),
(6, 1),
(7, 1),
(8, 2),
(9, 2),
(10, 3),
(11, 4),
(12, 5),
(13, 6),
(14, 7),
(15, 8),
(16, 8),
(17, 2),
(18, 1),
(19, 1),
(20, 1),
(21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`place_id`, `place_name`, `category_id`) VALUES
(1, 'dudhsagar', 6),
(2, 'gir', 4),
(3, 'manali', 3),
(4, 'taj mahal', 7),
(5, 'varkala', 5),
(6, 'fatehpur sikri', 1),
(7, 'kolhapur', 1),
(8, 'mahabaleshwar', 2),
(9, 'munnar hills', 2),
(10, 'mussoorie', 3),
(11, 'kaziranga', 4),
(12, 'tarkarli', 5),
(13, 'jog', 6),
(14, 'jaisalmer', 7),
(15, 'mumbai', 8),
(16, 'kolkata', 8),
(17, 'ooty', 2),
(18, 'golden temple', 1),
(19, 'khajuraho', 1),
(20, 'jallianwala bagh', 1),
(21, 'mahabodhi temple', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `age_group` int(11) DEFAULT NULL,
  `work` int(11) DEFAULT NULL,
  `partner` int(11) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `residence` varchar(255) DEFAULT NULL,
  `cat_1` int(11) DEFAULT NULL,
  `cat_2` int(11) DEFAULT NULL,
  `cat_3` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `username`, `password`, `email`, `age_group`, `work`, `partner`, `nationality`, `residence`, `cat_1`, `cat_2`, `cat_3`) VALUES
(1, 'PatientZero', 'my1ac', 'uvw@one.com', 2, 2, 1, 'Indian', 'Kankavli', 1, 2, 3),
(2, 'try1', 'trylets', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'hhhg', 'gfff', 'asa@a', 2, 2, 2, 'D', 'd', 1, 2, 4),
(4, 'herss', 'asaa', 'asa@a', 2, 2, 2, 'D', 'd', 1, 2, 3),
(5, 'Ayushi', 'abcd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'abcd', 'abcd', 'aditidshahasane@gmail.com', 1, 1, 4, 'India ', 'Panvel', 1, 2, 6),
(7, 'Adjdj', 'djdirjdjd', 'sjdjdj@djdjf', 2, 2, 2, 'Djdj', 'Xhdjdj', 1, NULL, NULL),
(8, 'Mayuri', 'maxx@0901', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'sayalisainath', 'mau09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'mamam', 'sjdjd', 'asa@a', 2, 2, 2, 'D', 'd', NULL, NULL, NULL),
(11, 'qqq', '1131', 'xyz@hotmail.com', 4, 3, 2, 'D', 'd', 1, 4, 5),
(12, 'dhhffh', 'jdjdjdjdj', 'asa@a', 2, 2, 2, 'D', 'd', NULL, NULL, NULL),
(13, 'ddghhs', 'hdhdh', 'jjdjd@b', 2, 2, 2, 'D', 'd', 1, 2, NULL),
(14, 'hhhj', 'jkjkkm', 'asa@a', 2, 2, 2, 'D', 'd', 1, NULL, NULL),
(15, 'Captain1344', 'password', 'hisenberg696969@gmail.com', 1, 1, 1, 'Indian', 'Dombivli', 1, 5, 7),
(16, 'sayaligokhale18@gmail.com', 'abcdefgh', 'sayaligokhale18@gmail.com', 2, 2, 2, 'Indian', 'Bangalore', 2, 5, 8),
(17, 'sgdgdgd', 'gdg', 'asa@a', 2, 2, 2, 'D', 'd', 1, 2, NULL),
(18, 'hgghgh', 'hhhhhhhhhh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'saya', 'abcdef', 'a.c@vit.edu.in', 2, 2, 2, 'African', 'Uganda', 2, 5, 6),
(20, 'dfgfgf', '456tg', 'a.c@vit.edu.in', 2, 2, 2, 'African', 'Uganda', 1, NULL, NULL),
(21, 'dhfhfhjj', '5868', 'a.c@vit.edu.in', 2, 2, 2, 'African', 'Uganda', 1, 2, NULL),
(22, 'fkfkk', 'tgjgjvn', 'a.c@vit.edu.in', 2, 2, 2, 'D', 'd', 1, 2, NULL),
(23, 'ghjhj', 'etrtr4', 'a.c@vit.edu.in', 2, 2, 2, 'D', 'Uganda', 1, 2, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`place_id`,`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`place_id`),
  ADD KEY `place_name` (`place_name`) USING BTREE,
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `username_2` (`username`) USING BTREE,
  ADD KEY `cat_1` (`cat_1`),
  ADD KEY `cat_2` (`cat_2`),
  ADD KEY `cat_3` (`cat_3`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`place_id`) REFERENCES `place` (`place_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `place`
--
ALTER TABLE `place`
  ADD CONSTRAINT `place_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_ibfk_1` FOREIGN KEY (`cat_1`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_info_ibfk_2` FOREIGN KEY (`cat_2`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_info_ibfk_3` FOREIGN KEY (`cat_3`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
