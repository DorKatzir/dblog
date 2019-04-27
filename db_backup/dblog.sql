-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2019 at 12:39 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `article`, `date`) VALUES
(1, 6, 'my first post :)', 'Hello this is my first post. Just testing one two three one two three can you read this?\r\nno paragraphs allowed, maybe in time i can fix this.', '2017-11-10 16:01:32'),
(2, 7, 'Lorem ipsum from Avi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec commodo quis libero eu eleifend. Sed sagittis consectetur tortor ac sollicitudin. In quis turpis id augue pellentesque ultrices. Suspendisse potenti. Nulla ullamcorper nunc nec elit euismod, laoreet fermentum quam efficitur. Mauris in lectus nec quam molestie faucibus id et eros. Suspendisse commodo volutpat nibh, a ornare tortor pharetra in. Duis velit neque, imperdiet vitae metus at, placerat pellentesque mi. Sed sed massa nibh. Donec et nibh ac ante dapibus tristique. Cras quis justo bibendum nisi mollis eleifend ut quis tellus. Integer lorem enim, fringilla nec magna quis, vestibulum viverra arcu. Donec eget nunc odio.', '2017-11-10 16:03:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(6, 'Dor', 'ddd@gmail.com', '$2y$10$440B.A/sHBS7nLGbZDw94.Gac2vx/CgXvRlTyObRSlOO4qj4/WNJ.'),
(7, 'Avi Levi', 'avi@gmail.com', '$2y$10$o4K3Kfd8TCCTNHWPqNi/XuZ3VLQXTRKck4WXg/gRmUMhZnbMftaTu'),
(8, 'Dor', 'doriomer@gmail.com', '$2y$10$J7I.q5EK9oSGXZw1GSP7PeXslWErLRP.bTPlGt0orjNbLt22NV2Wm'),
(9, 'jojo', 'jojo@gmail.com', '$2y$10$EzPpJPgnIR2H0zUMVZRbsuJZ0NvtVS8iXA4gwR7UM8rgIl07lRqty'),
(11, 'techjump', 'techj@gmail.com', '$2y$10$8CvD3PwvmmyRx4Pxn14Nv.aoOzoYj0mjFPLzJzhiMRgjevsjdou06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
