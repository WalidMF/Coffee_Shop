-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2023 at 07:13 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffee_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Hot Drinks'),
(2, 'Juices'),
(3, 'Soft Drinks'),
(4, 'Cocktails');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `date`, `status`, `total`) VALUES
(1, '2023-01-10', 'done', 30),
(2, '2023-02-01', 'out for delivery', 50),
(3, '2023-02-02', 'processing', 35),
(4, '2023-02-02', 'canceled', 35);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `picture` varchar(225) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `picture`, `category_id`) VALUES
(1, 'Tea', 5, '', 1),
(2, 'Green Tea', 10, '', 1),
(3, 'Turkish Coffee', 10, '', 1),
(4, 'French Coffee', 15, '', 1),
(5, 'Nescafe', 10, '', 1),
(6, 'Hot Chocolate,', 25, '', 1),
(7, 'Orchid', 10, '', 1),
(8, 'Manga', 15, '', 2),
(9, 'Lemon', 10, '', 2),
(10, 'Guava', 10, '', 2),
(11, 'kiwi', 15, '', 2),
(12, 'Orange', 10, '', 2),
(13, 'Strawberry', 12, '', 2),
(14, 'Cola', 10, '', 3),
(15, 'Pepsi', 10, '', 3),
(16, 'Mirinda apple', 10, '', 3),
(17, 'Miranda orange', 10, '', 3),
(18, 'Fayrouz', 15, '', 3),
(19, 'Fruit Cocktail', 25, '', 4),
(20, 'Juice Cocktail', 20, '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `room` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `picture` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `room`, `type`, `picture`) VALUES
(1, 'Walid Mostafa', 'walid@gmail.com', 'w123', 'R2000', 'admin', NULL),
(2, 'Eslam Abdelsattar', 'eslam@gmail.com', 'e123', 'R2001', 'admin', NULL),
(3, 'Aml Ibrahim', 'aml@gmail.com', 'a123', 'R2000', 'user', NULL),
(4, 'Naglaa Hamdi', 'naglaa@gmail.com', 'n123', 'R2001', 'user', NULL),
(5, 'Khaled Alaa', 'khaled@gmail.com', 'k123', 'R2000', 'user', NULL),
(6, 'Shimaa Moubark', 'shimaa@gmail.com', 's123', 'R2002', 'user', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_order_product`
--

CREATE TABLE `user_order_product` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_order_product`
--

INSERT INTO `user_order_product` (`user_id`, `product_id`, `order_id`, `product_count`) VALUES
(3, 1, 1, 1),
(3, 3, 1, 1),
(3, 8, 1, 1),
(5, 3, 2, 1),
(5, 4, 2, 2),
(5, 14, 2, 1),
(4, 5, 3, 1),
(4, 6, 3, 1),
(6, 2, 4, 1),
(6, 19, 4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pro_cat_fk` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_order_product`
--
ALTER TABLE `user_order_product`
  ADD KEY `user_fk` (`user_id`),
  ADD KEY `product_fk` (`product_id`),
  ADD KEY `order_fk` (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `pro_cat_fk` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_order_product`
--
ALTER TABLE `user_order_product`
  ADD CONSTRAINT `order_fk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
