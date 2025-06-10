-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2025 at 12:07 AM
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
-- Database: `glamistry`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT 1,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`, `added_at`) VALUES
(9, 1, 2, 4, '2025-06-09 13:06:23'),
(10, 1, 3, 7, '2025-06-09 13:06:30'),
(11, 1, 1, 12, '2025-06-09 13:06:37'),
(12, 1, 14, 7, '2025-06-09 20:11:12');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`) VALUES
(1, 'jewelery', '2025-06-03 20:56:43'),
(2, 'lip glos', '2025-06-03 20:56:43'),
(3, 'mascara', '2025-06-03 20:56:43');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image_name`, `image_path`, `price`, `category_id`, `created_at`) VALUES
(1, 'Gold Necklace', 'product-2.png', './public/product_images/product-2.png', 56, 1, '2025-06-07 11:01:41'),
(2, 'Silver Bracelet', 'product-2.png', './public/product_images/product-2.png', 56, 1, '2025-06-07 11:01:41'),
(3, 'Diamond Ring', 'product-2.png', './public/product_images/product-2.png', 56, 1, '2025-06-07 11:01:41'),
(4, 'Pearl Earrings', 'product-2.png', './public/product_images/product-2.png', 56, 1, '2025-06-07 11:01:41'),
(5, 'Anklet', 'product-2.png', './public/product_images/product-2.png', 56, 1, '2025-06-07 11:01:41'),
(6, 'Charm Pendant', 'product-2.png', './public/product_images/product-2.png', 56, 1, '2025-06-07 11:01:41'),
(7, 'Cherry Lip Gloss', 'product-2.png', './public/product_images/product-2.png', 56, 2, '2025-06-07 11:01:41'),
(8, 'Matte Lip Gloss', 'product-2.png', './public/product_images/product-2.png', 56, 2, '2025-06-07 11:01:41'),
(9, 'Clear Shine Gloss', 'product-2.png', './public/product_images/product-2.png', 56, 2, '2025-06-07 11:01:41'),
(10, 'Rose Tinted Gloss', 'product-2.png', './public/product_images/product-2.png', 56, 2, '2025-06-07 11:01:41'),
(11, 'Vanilla Scented Gloss', 'product-2.png', './public/product_images/product-2.png', 56, 2, '2025-06-07 11:01:41'),
(12, 'Glitter Lip Gloss', 'product-2.png', './public/product_images/product-2.png', 56, 2, '2025-06-07 11:01:41'),
(13, 'Waterproof Mascara', 'product-2.png', './public/product_images/product-2.png', 56, 3, '2025-06-07 11:01:41'),
(14, 'Volumizing Mascara', 'product-2.png', './public/product_images/product-2.png', 56, 3, '2025-06-07 11:01:41'),
(15, 'Lengthening Mascara', 'product-2.png', './public/product_images/product-2.png', 56, 3, '2025-06-07 11:01:41'),
(16, 'Curling Mascara', 'product-2.png', './public/product_images/product-2.png', 56, 3, '2025-06-07 11:01:41'),
(17, 'Fiber Lash Mascara', 'product-2.png', './public/product_images/product-2.png', 56, 3, '2025-06-07 11:01:41'),
(18, 'Colored Mascara', 'product-2.png', './public/product_images/product-2.png', 56, 3, '2025-06-07 11:01:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(11) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `number`, `dob`, `gender`, `password`, `created_at`) VALUES
(1, 'Umar Azam', 'itxumarhere@gmail.com', '03170505259', '2005-06-02', 'male', '$2y$10$7xn4bc4bF.GFV/Icfajtze7aVfbKS5nGFxBY89VfNuqiH2O0XOIkO', '2025-06-06 23:12:05');

-- --------------------------------------------------------

--
-- Table structure for table `user_tokens`
--

CREATE TABLE `user_tokens` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(11) NOT NULL,
  `token` varchar(64) NOT NULL,
  `expires_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tokens`
--

INSERT INTO `user_tokens` (`id`, `user_id`, `name`, `email`, `number`, `token`, `expires_at`, `created_at`) VALUES
(1, 1, 'Umar Azam', 'itxumarhere@gmail.com', '03170505259', 'd4cb151dc2b061dbe647560a42c3a80d0387d50251e69ce5656bf5e04727c9cd', '2025-07-07 01:12:05', '2025-06-06 23:12:05'),
(2, 1, 'Umar Azam', 'itxumarhere@gmail.com', '03170505259', '95743a7d56ba97f6d7ea14b8cb896a9e3d3af8febf2eac9d1b17fa0b15996fb2', '2025-07-07 12:31:03', '2025-06-07 10:31:03'),
(3, 1, 'Umar Azam', 'itxumarhere@gmail.com', '03170505259', 'f1606328544f939ed5a2189197cae86cfbd34db92c2f346c612ab1538888605d', '2025-07-08 00:49:54', '2025-06-07 22:49:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_tokens`
--
ALTER TABLE `user_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
