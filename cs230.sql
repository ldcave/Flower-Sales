-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 12, 2020 at 05:00 AM
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
-- Database: `cs230`
--

-- --------------------------------------------------------

--
-- Table structure for table `prints`
--

CREATE TABLE `prints` (
  `pid` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `descript` text NOT NULL,
  `picpath` varchar(80) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prints`
--

INSERT INTO `prints` (`pid`, `title`, `descript`, `picpath`, `upload_date`, `rating`) VALUES
(3, 'test1', 'first test', '5f862b29114ac2.66675930.png', '2020-10-13', NULL),
(7, 'sun', 'sunTest', '5f8804271476a9.88894051.png', '2020-10-15', NULL),
(8, 'seeWorld', 'quote', '5f88046fb06e28.50276088.png', '2020-10-15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `uname` varchar(30) NOT NULL,
  `picpath` varchar(50) NOT NULL DEFAULT 'uploads/peace.png',
  `bio` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`uname`, `picpath`, `bio`) VALUES
('tester', 'uploads/anon.png', NULL),
('leahcave', 'uploads/anon.png', NULL),
('ldcave', '../uploads/5f861e1f41ffe3.33232768.png', ''),
('leah', 'uploads/peace.png', NULL),
('testagain', 'uploads/peace.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `rev_id` int(11) NOT NULL COMMENT 'review ID',
  `item_id` int(11) NOT NULL COMMENT 'item to be reviewed',
  `uname` varchar(80) NOT NULL COMMENT 'user who will review',
  `title` varchar(60) NOT NULL,
  `review_text` text NOT NULL,
  `rev_date` datetime NOT NULL,
  `rating_num` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`rev_id`, `item_id`, `uname`, `title`, `review_text`, `rev_date`, `rating_num`, `status`) VALUES
(16, 3, 'ldcave', 'Review5', '5 stars', '2020-11-11 21:46:51', 5, 1),
(17, 8, 'ldcave', 'review ', 'this is a review ', '2020-11-11 22:35:50', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `lname`, `fname`, `email`, `uname`, `password`) VALUES
(8, 'cave', 'leah', 'testing@this', 'ldcave', '$2y$10$dzsd/3zgIast/RR2/pSF0.xbuCIBlVlbdUIXHbmI8lePzSPaF14fu'),
(9, 'name', 'my', 'my@email', 'leah', '$2y$10$AK68P.s0hL.VCcTQ5blnHeUivBi1Nrut4yGhvcvHBs8vtdwdg0veq'),
(10, 'again', 'testing', 'test@again', 'testagain', '$2y$10$XpT7l9csCDKpJ1jqZVn1veSn958EyvSwLZE4Xd3q6LueGTin87Ps2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prints`
--
ALTER TABLE `prints`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`rev_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prints`
--
ALTER TABLE `prints`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `rev_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'review ID', AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
