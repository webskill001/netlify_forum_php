-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2020 at 12:36 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ipdiscuss-forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_content` text NOT NULL,
  `category_time&date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_content`, `category_time&date`) VALUES
(1, 'python', 'Python is an interpreted, high-level, general-purpose programming language. Created by Guido van Rossum and first released in 1991, Python\'s design philosophy emphasizes code readability with its notable use of significant whitespace.', '2020-06-24 08:02:13'),
(2, 'javascript', 'JavaScript, often abbreviated as JS, is a programming language that conforms to the ECMAScript specification. JavaScript is high-level, often just-in-time compiled, and multi-paradigm. It has curly-bracket syntax, dynamic typing, prototype-based object-orientation, and first-class functions.', '2020-06-24 08:02:13'),
(3, 'c++', 'C++ is a general-purpose programming language created by Bjarne Stroustrup as an extension of the C programming language, or \"C with Classes\".', '2020-06-24 08:02:52'),
(4, 'java', 'Java is a general-purpose programming language that is class-based and object-oriented, and designed to have as few implementation dependencies as possible.', '2020-06-24 08:33:14');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_desc` text NOT NULL,
  `thread_id` int(11) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `comment_desc`, `thread_id`, `comment_time`) VALUES
(4, 9, 'this is nice comment', 7, '2020-06-25 02:17:37'),
(5, 6, 'i have suggestion about pygame', 1, '2020-06-25 02:22:40'),
(10, 7, 'this i s nice comment but it is not sticky but it is very nice and thruhgt and this i s nice comment but it is not sticky but it is very nice and thruhgt and ', 1, '2020-06-26 00:48:36'),
(12, 0, 'hi this i s', 2, '2020-06-26 01:08:08'),
(13, 6, 'hi this is nice question', 1, '2020-06-26 01:10:40');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(11) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_content` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time&date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_content`, `category_id`, `user_id`, `time&date`) VALUES
(1, 'pygame not installed in my windows pc', 'i want a pygame module but it is not install on my device.', 1, 7, '2020-06-26 08:01:56'),
(2, 'numpy is not working.', 'i want to use a numpy module but it is not install properly.i want to use a numpy module but it is not install properly.', 1, 9, '2020-06-26 08:02:02'),
(3, 'error', 'error occured while downloading java.', 4, 8, '2020-06-26 08:02:08'),
(4, 'i want to learn c++', 'learning.', 3, 7, '2020-06-26 08:02:13'),
(5, 'i have a question', 'i have very hard qestion about pygame', 1, 7, '2020-06-26 08:02:17'),
(7, 'nice ', 'nice question', 1, 9, '2020-06-26 08:02:28'),
(25, 'pyaudio not install', 'pyaudiko not install', 1, 6, '2020-06-26 08:11:53'),
(26, 'this is question', 'this is question desc', 2, 6, '2020-06-26 08:22:24'),
(27, 'this is question at', 'this desc', 2, 8, '2020-06-26 08:23:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `password` varchar(10000) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_email`, `password`, `timestamp`) VALUES
(6, 'sumit', 'sumitchouhan10091999@gmail.com', '$2y$10$Dk.A.v7j0RgQkyZARU2W2.m.z.y.Bwy1coU7kHMQ.QVGr.alMnAO.', '2020-06-26 00:20:49'),
(7, 'sss', 'sss@gmail.com', '$2y$10$KrSFMhEgDmPw/.AHIbh/KeblbROO9UReUO1qh42LfrSdFfIBp6kNW', '2020-06-26 00:24:06'),
(8, 'eee', 'eee@gmail.com', '$2y$10$egGim6WK9I1DM2czgOljauayG/UafsKJazgyW0In.6tC0RfliQli2', '2020-06-26 00:24:32'),
(9, 'rajat', 'rajat@gmail.com', '$2y$10$S9LZvWeyDp3JNhfxoXLaj.c49.N50sY5gtqwS/CJDHPg1jE4YWJS.', '2020-06-26 00:25:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_content`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
