-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 11, 2019 at 12:09 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(17, 'PHP'),
(18, 'Java Programming'),
(19, 'React Js');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_user_id` int(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL DEFAULT 'Unapproved',
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_user_id`, `comment_content`, `comment_status`, `comment_date`) VALUES
(21, 54, 24, 'This is Umesh', 'Approved', '2018-02-25'),
(22, 52, 24, 'This is raju', 'Approved', '2018-02-25'),
(23, 52, 24, 'This is umesh gm\r\nThis is umesh gmThis is umesh gmThis is umesh gmThis is umesh gmThis is umesh gmThis is umesh gm', 'Approved', '2018-02-25'),
(24, 57, 24, 'This is very bad site', 'Approved', '2019-02-11');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_user_id` int(11) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'Pending',
  `post_views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_user_id`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views`) VALUES
(52, 17, 'Pre-Proccessed PHP', 18, '2018-02-25', 'image_1.jpg', 'This is a php course  This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course ', 'Php', 0, 'Publish', 9),
(53, 17, 'Pre-Proccessed PHP', 18, '2018-02-25', 'image_1.jpg', 'This is a php course  This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course ', 'Php', 0, 'Publish', 1),
(54, 18, 'Java Programming with Sanish', 18, '2018-02-25', '172445.jpg', 'This is JavaScript Programming and is super easy...', 'java, javascript', 0, 'Publish', 17),
(55, 18, 'Java Programming with Sanish', 18, '2018-02-25', '172445.jpg', 'This is JavaScript Programming and is super easy...', 'java, javascript', 0, 'Publish', 5),
(56, 17, 'Pre-Proccessed PHP', 18, '2018-02-25', 'image_1.jpg', 'This is a php course  This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course ', 'Php', 0, 'Publish', 7),
(57, 17, 'Pre-Proccessed PHP', 18, '2018-02-25', 'image_1.jpg', 'This is a php course  This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course ', 'Php', 0, 'Publish', 23),
(58, 17, 'Pre-Proccessed PHP', 18, '2019-02-11', 'image_1.jpg', 'This is a php course  This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course This is a php course ', 'Php', 0, 'Publish', 4),
(59, 18, 'Hamada Article', 26, '2019-02-11', 'FB_20160331_11_21_43_Saved_Picture.jpg', '', 'hello', 0, 'Pending', 2),
(60, 17, 'Wafik Article', 26, '2019-02-11', 'FB_20160331_11_23_16_Saved_Picture.jpg', 'Hello From the other sideeeeee \r\ni must have called a thousand time', 'memo sasuke', 0, 'Publish', 1),
(61, 17, 'marwa', 23, '2019-02-11', 'FB_20160129_17_34_58_Saved_Picture.jpg', 'Bla Bla\r\nHello World', '', 0, 'Pending', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` enum('User','Subscriber','Admin') NOT NULL DEFAULT 'Subscriber'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`) VALUES
(18, 'Sanish', '$2y$10$4wJQ5vQx8DRtDHe5GmK1a.WbFLMzgJblBRgy30OnOSSl5G2.FGv72', 'Sanish', 'Gurung', 'sanish@gmail.com', '8468-spongebob-square-pants-spongebobs-face.jpg', 'Admin'),
(22, 'Peter', '$2y$10$iusesomecrazystrings2ui1qr860E30b0c9ijNqwCSwHnHdgz.1K', 'Peter', 'Pan', 'peter@gmail.com', '172445.jpg', 'Subscriber'),
(23, 'Ahmed', '$2y$10$HLyuBpVfvgxMs353WU15lO8jklk7tXBkY2t1DoHBlrLnN8x6kAWFq', '', '', 'ahmed@ahmed.com', '', 'Subscriber'),
(24, 'Meme', '$2y$10$h.qhYZHl7k1eG/Q/nmtkVugxPMUOe4g74S51iqZwBeswBc1y27A.G', 'Ahmed', 'Elkhateeb', 'sasuke@sasuke.com', 'Deep programming.jpg', 'Subscriber'),
(25, 'Tryagain', '$2y$10$/PUCsWy6oZSUmto6cb4CVOi5xZ/20hxL7Wr2Tj2tjcfV6p1R6ysvC', 'Minato', 'Namikaze', 'trial@trial.com', 'Deep programming.jpg', 'Subscriber'),
(26, 'Kakashi', '$2y$10$Yjf.LyIiwaT.BMo1tkamBO6q6a2I1kYjIfQMXjMSfcgbVEx5Tk1rK', 'Hataki', 'Kakashi', 'kakashi@kakashi.com', 'Deep programming.jpg', 'Subscriber');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
