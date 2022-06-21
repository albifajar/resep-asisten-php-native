-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 21, 2022 at 06:34 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resep_asisten`
--

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `title` text NOT NULL,
  `name` varchar(200) NOT NULL,
  `content` longtext NOT NULL,
  `thumbnail` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`title`, `name`, `content`, `thumbnail`, `id`) VALUES
('testing', 'testing', '&lt;p&gt;testing&lt;/p&gt;\r\n', '62af3a2174a28.png', 5),
('testing 2', 'testing-2', '&lt;p&gt;testing&lt;/p&gt;\r\n', '62af3dedb5d50.png', 10),
('testing 3', 'testing-3', '&lt;p&gt;testing&lt;/p&gt;\r\n', '62af3e0961293.png', 11),
('testing 4', 'testing-4', '&lt;p&gt;testing&lt;/p&gt;\r\n', '62af407ccf177.png', 12),
('testing 3t', 'testing-3t', '', '62af408a167b5.png', 13),
('testing 6', 'testing-6', '&lt;p&gt;testing&lt;/p&gt;\r\n', '62af40a788c01.png', 15),
('testing 3ta', 'testing-3ta', '&lt;p&gt;AAs&lt;/p&gt;\r\n', '62af41028e709.png', 16);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'albi', '$2y$10$IaGAqXwpvYwl1QdoIEteZeE7zy7XWja5CVxpdBFvvaQ2KpytssDtC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_recipe` (`name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
