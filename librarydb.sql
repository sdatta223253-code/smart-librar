-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2026 at 06:11 AM
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
-- Database: `librarydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `isbn`, `image`, `quantity`) VALUES
(13, 'chayabithi', 'humayun ahmed', 'ISBN‑10: 9844950058', 'book_2.jpg', 96),
(14, 'harry potter', 'JK Rowling', 'ISBN‑10: 9844950098', 'biik_3.jpg', 9),
(15, 'kjg', 'jhff', '856', 'book_4.jpg', 56),
(17, 'emni', 'emni', 'ISBN‑10: 9844950090', 'book_2.jpg', 88),
(18, 'book7', 'Amar Sayyed', 'isbn-7865433', 'book_4.jpg', 83),
(19, 'book8', 'Kazi Nazrul Islam', 'ISBN‑10: 98449500500', 'book_2.jpg', 6),
(20, 'ma', 'anisul haque', 'ISBN‑10: 98449500690', 'ma2.jpg', 42);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `status` enum('borrowed','returned') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `book_id`, `issue_date`, `return_date`, `status`) VALUES
(1, 4, 13, '2026-01-24', '2026-01-24', 'returned'),
(2, 4, 13, '2026-01-24', '2026-01-24', 'returned'),
(3, 4, 13, '2026-01-24', '2026-01-24', 'returned'),
(4, 4, 13, '2026-01-24', '2026-01-24', 'returned'),
(5, 4, 14, '2026-01-24', '2026-01-24', 'returned'),
(6, 4, 14, '2026-01-24', '2026-01-24', 'returned'),
(7, 4, 15, '2026-01-24', '2026-01-24', 'returned'),
(8, 4, 13, '2026-01-24', '2026-01-24', 'returned'),
(9, 4, 13, '2026-01-24', '2026-01-24', 'returned'),
(10, 4, 13, '2026-01-24', '2026-01-24', 'returned'),
(11, 4, 14, '2026-01-24', '2026-01-24', 'returned'),
(12, 4, 14, '2026-01-24', '2026-01-24', 'returned'),
(13, 12, 18, '2026-01-24', NULL, 'borrowed'),
(14, 12, 18, '2026-01-24', NULL, 'borrowed'),
(15, 13, 18, '2026-01-24', NULL, 'borrowed'),
(16, 13, 19, '2026-01-24', NULL, 'borrowed'),
(17, 12, 19, '2026-01-24', NULL, 'borrowed'),
(18, 12, 20, '2026-01-24', NULL, 'borrowed'),
(19, 4, 17, '2026-01-24', NULL, 'borrowed'),
(20, 4, 13, '2026-01-24', NULL, 'borrowed'),
(21, 15, 13, '2026-01-24', NULL, 'borrowed'),
(22, 15, 18, '2026-01-24', '2026-01-24', 'returned'),
(23, 15, 19, '2026-01-24', NULL, 'borrowed'),
(24, 15, 18, '2026-01-24', NULL, 'borrowed');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'jennie', 'jennie@gmail.com', '123', 'admin'),
(4, 'jisoo', 'Jisoo@gmail.com', '123', 'user'),
(5, 'Lisa', 'liso@gmail.com', '123', 'user'),
(7, 'jen', 'rose@gmail.com', '123', 'user'),
(8, 'yoojung', 'korea@gmail.com', '123', 'user'),
(11, 'anna', 'anna@gmail.com', '123', 'user'),
(12, 'ritu', 'ritu@gmail.com', '123', 'user'),
(13, 'mira', 'mira@gmail.com', '123', 'user'),
(14, 'meher', 'meherin@gmail.com', '1234', 'user'),
(15, 'mitu', 'mitu@gmail.com', '123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
