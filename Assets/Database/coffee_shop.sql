-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2023 at 08:24 PM
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
(93, '2023-02-16'),
(94, '2023-02-16'),
(95, '2023-02-16'),
(96, '2023-02-16'),
(97, '2023-02-16'),
(98, '2023-02-16'),
(99, '2023-02-16'),
(100, '2023-02-17'),
(101, '2023-02-17'),
(102, '2023-02-17');

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
(29, 'Processing', 'no ic', 'R1', 45, 93),
(30, 'Processing', 'ay 7aga', 'R3', 55, 94),
(31, 'Processing', 'ok', 'R2', 45, 95),
(32, 'Processing', '', '0', 35, 97),
(33, 'Processing', '', '0', 70, 98),
(34, 'Processing', '', 'R2', 90, 100),
(35, 'Processing', '', 'R1', 75, 101);

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
(2, 'Green Tea', 10, 'green-tea.png', 'unavailable', 1),
(3, 'Turkish Coffee', 10, 'turkish-coffee.png', 'available', 1),
(4, 'French Coffee', 15, 'french-coffee.png', 'available', 1),
(5, 'Latte', 10, 'latte.png', 'unavailable', 1),
(6, 'Hot Chocolate', 25, 'hot-chocolate.png', 'available', 1),
(7, 'Cocoa', 10, 'cocoa.png', 'available', 1),
(8, 'Manga', 15, 'manga-juice.png', 'available', 2),
(9, 'Lemon', 10, 'lemon-juice.png', 'available', 2),
(10, 'Watermelon', 10, 'watermelon-juice.png', 'available', 2),
(11, 'Cranberry', 15, 'cranberry-juice.png', 'available', 2),
(12, 'Orange', 10, 'orange-juice.png', 'available', 2),
(13, 'Strawberry', 12, 'strawberry-juice.png', 'available', 2),
(14, 'Cola', 10, 'cola.png', 'available', 3),
(15, 'Pepsi', 10, 'pepsi.png', 'available', 3),
(16, 'Mirinda apple', 10, 'miranda-apple.png', 'available', 3),
(17, 'Miranda Orange', 10, 'miranda-orange.png', 'available', 3),
(18, 'Fayrouz', 15, 'fayrouz.png', 'available', 3),
(19, 'Fruit Cocktail', 25, 'fruit-cocktail.png', 'available', 4),
(20, 'Juice Cocktail', 20, 'vegetables-cocktail.png', 'available', 4),
(21, 'Apple', 10, 'fayrouz.png', 'Available', 2);

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
(1, 'Walid Mostafa', 'walid@gmail.com', 'walid2023', 'R2000', 'admin', 'walid.png'),
(2, 'Eslam Abdelsattar', 'eslam@gmail.com', 'eslam2023', 'R2001', 'admin', 'eslam.png'),
(3, 'Aml Ibrahim', 'aml@gmail.com', 'amll2023', 'R2000', 'user', 'aml.png'),
(4, 'Naglaa Hamdi', 'naglaa@gmail.com', 'naglaa2023', 'R2001', 'user', 'naglaa.png'),
(5, 'Khaled Alaa', 'khaled@gmail.com', 'khaled2023', 'R2000', 'user', 'khaled.png'),
(6, 'Shimaa Moubark', 'shimaa@gmail.com', 'shimaa2023', 'R2002', 'user', 'shimaa.png'),
(11, 'Ali', 'ali@gmail.com', 'alii2023', 'R1', 'user', '0.60703500 1676658901.png');

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
(4, 1, 93, 1),
(4, 9, 93, 3),
(4, 16, 93, 1),
(4, 12, 94, 1),
(4, 8, 94, 3),
(6, 11, 95, 3),
(4, 6, 97, 1),
(4, 5, 97, 1),
(5, 6, 98, 1),
(5, 11, 98, 3),
(6, 6, 100, 1),
(6, 2, 100, 3),
(6, 8, 100, 1),
(6, 12, 100, 2),
(6, 12, 101, 1),
(6, 6, 101, 1),
(6, 8, 101, 1),
(6, 15, 101, 1),
(6, 17, 101, 1),
(6, 1, 101, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `orders_info`
--
ALTER TABLE `orders_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
