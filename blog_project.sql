-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2025 at 07:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'news', '2025-08-20 08:52:32', '2025-08-26 19:58:25'),
(2, 'sport', '2025-08-20 08:52:32', '2025-08-26 19:58:36');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `image` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `category_id`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'iran', 'mihan', 1, 1, '175577900231751755775508State_flag_of_Iran_(1964–1980).svg.png', '2025-08-21 12:22:30', '2025-08-21 15:53:22'),
(3, 'messi', 'rgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtr\r\nrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtr\r\nrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtr\r\nrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtrrgrgerhethet rtvrtrtrtrtr', 1, 1, '1755775445images.webp', '2025-08-21 14:48:37', '2025-08-26 19:08:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(1, 'merajmadadi99@gmail.com', '$2y$10$PZCOBCQhqnrBBwhyi29yzuYR.1oV2i.yHHDLIYKnxSPfl5dUlcXAG', 'meraj', 'madadi', '2025-08-26 16:06:01', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
