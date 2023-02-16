-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2023 at 09:01 PM
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
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `date`) VALUES
(1, '2023-02-02'),
(31, '2023-02-15'),
(32, '2023-02-15'),
(33, '2023-02-15'),
(34, '2023-02-15'),
(35, '2023-02-15'),
(36, '2023-02-15'),
(37, '2023-02-15'),
(38, '2023-02-15'),
(39, '2023-02-15'),
(40, '2023-02-15'),
(41, '2023-02-15'),
(42, '2023-02-15'),
(43, '2023-02-15'),
(44, '2023-02-15'),
(45, '2023-02-15'),
(46, '2023-02-15'),
(47, '2023-02-15'),
(48, '2023-02-15'),
(49, '2023-02-15'),
(50, '2023-02-15'),
(51, '2023-02-15'),
(52, '2023-02-15'),
(53, '2023-02-15'),
(54, '2023-02-15'),
(55, '2023-02-15'),
(56, '2023-02-15'),
(57, '2023-02-15'),
(58, '2023-02-15');

-- --------------------------------------------------------

--
-- Table structure for table `orders_info`
--

CREATE TABLE `orders_info` (
  `id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `notes` text DEFAULT NULL,
  `room` varchar(30) NOT NULL,
  `total` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_info`
--

INSERT INTO `orders_info` (`id`, `status`, `notes`, `room`, `total`, `order_id`) VALUES
(1, 'done', 'notes', 'R2', 90, 1),
(2, 'done', 'notes', 'R2', 90, 33),
(3, 'Processing', 'walid', 'R3', 90, 34),
(4, 'Processing', 'walid', 'R3', 90, 35),
(6, 'Processing', 'ajbsjs', 'R1', 100, 36),
(7, 'Processing', 'mgmhg', 'R1', 80, 39),
(8, 'Processing', 'walid', 'R2', 70, 45),
(9, 'Processing', 'walid', 'R3', 110, 47),
(10, 'Processing', 'ay 7aha', 'R2', 70, 49),
(11, 'Processing', 'gggg', 'R1', 40, 51),
(12, 'Processing', 'walod', 'R2', 35, 53),
(13, 'Processing', 'qqqq', 'R2', 70, 55),
(14, 'Processing', '', '0', 35, 56);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `picture` varchar(225) NOT NULL,
  `status` varchar(30) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `picture`, `status`, `category_id`) VALUES
(1, 'Tea', 5, 'tea.png', 'available', 1),
(2, 'Green Tea', 10, 'green-tea.png', 'available', 1),
(3, 'Turkish Coffee', 10, 'turkish-coffee.png', '', 1),
(4, 'French Coffee', 15, 'french-coffee.png', '', 1),
(5, 'Latte', 10, 'latte.png', '', 1),
(6, 'Hot Chocolate', 25, 'hot-chocolate.png', '', 1),
(7, 'Cocoa', 10, 'cocoa.png', '', 1),
(8, 'Manga', 15, 'manga-juice.png', '', 2),
(9, 'Lemon', 10, 'lemon-juice.png', '', 2),
(10, 'Watermelon', 10, 'watermelon-juice.png', '', 2),
(11, 'Cranberry', 15, 'cranberry-juice.png', '', 2),
(12, 'Orange', 10, 'orange-juice.png', '', 2),
(13, 'Strawberry', 12, 'strawberry-juice.png', '', 2),
(14, 'Cola', 10, 'cola.png', '', 3),
(15, 'Pepsi', 10, 'pepsi.png', '', 3),
(16, 'Mirinda apple', 10, 'miranda-apple.png', '', 3),
(17, 'Miranda Orange', 10, 'miranda-orange.png', '', 3),
(18, 'Fayrouz', 15, 'fayrouz.png', '', 3),
(19, 'Fruit Cocktail', 25, 'fruit-cocktail.png', '', 4),
(20, 'Juice Cocktail', 20, 'vegetables-cocktail.png', '', 4);

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
(1, 'Walid Mostafa', 'walid@gmail.com', 'walid2000', 'R2000', 'admin', 'walid.png'),
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
(1, 14, 1, 4),
(1, 16, 1, 5),
(1, 12, 1, 1),
(1, 15, 1, 1),
(1, 18, 1, 1),
(1, 4, 1, 1),
(1, 11, 1, 1),
(1, 3, 1, 1),
(1, 4, 1, 1),
(1, 5, 1, 1),
(1, 1, 1, 1),
(1, 10, 1, 1),
(1, 12, 1, 1),
(1, 1, 1, 1),
(1, 2, 44, 1),
(1, 1, 44, 1),
(1, 4, 44, 2),
(1, 4, 44, 2),
(1, 4, 44, 2),
(1, 4, 44, 1),
(1, 8, 45, 1),
(1, 9, 45, 1),
(1, 11, 45, 3),
(1, 6, 47, 2),
(1, 8, 47, 4),
(1, 12, 49, 1),
(1, 5, 49, 2),
(1, 9, 49, 4),
(1, 12, 51, 3),
(1, 3, 51, 1),
(1, 11, 53, 1),
(1, 5, 53, 1),
(1, 9, 53, 1),
(1, 11, 54, 1),
(1, 10, 54, 1),
(1, 12, 55, 1),
(1, 11, 55, 3),
(1, 4, 55, 1),
(1, 5, 56, 1),
(1, 6, 56, 1),
(1, 11, 58, 1);

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
-- Indexes for table `orders_info`
--
ALTER TABLE `orders_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_info_fk` (`order_id`);

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
  ADD KEY `order_id` (`order_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `orders_info`
--
ALTER TABLE `orders_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
-- Constraints for table `orders_info`
--
ALTER TABLE `orders_info`
  ADD CONSTRAINT `order_info_fk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
