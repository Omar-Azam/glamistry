-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2025 at 01:52 AM
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
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `company` varchar(100) DEFAULT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) DEFAULT NULL,
  `state` varchar(100) NOT NULL,
  `postal_code` varchar(20) NOT NULL,
  `country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'earrings', '2025-06-15 22:51:37'),
(2, 'bracelets', '2025-06-15 22:52:02'),
(3, 'anklets', '2025-06-15 22:52:34'),
(4, 'rings', '2025-06-15 22:52:45'),
(5, 'necklaces', '2025-06-15 22:53:09'),
(6, 'lipsticks', '2025-06-15 22:53:48'),
(7, 'blush', '2025-06-15 22:53:58'),
(8, 'nail polish', '2025-06-15 22:54:29'),
(9, 'eyeshadows', '2025-06-15 22:54:43'),
(10, 'foundations', '2025-06-15 22:54:56');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `order_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image_name`, `description`, `image_path`, `price`, `category_id`, `created_at`) VALUES
(1, 'Dreamy Starlight Bracelet', 'b1.jpg', 'Delicate and enchanting, the Dreamy Starlight Bracelet is a celestial-inspired piece that captures the soft glow of a starry night. Featuring tiny star charms and shimmering accents along a fine gold-plated chain, it wraps your wrist in a touch of wonder and grace. Perfect for dreamers, stargazers, and lovers of quiet elegance.\r\n', '/product_images/b1.jpg', 79, 2, '2025-06-15 22:57:00'),
(2, 'Golden Pearls Bracelet', 'b2.jpg', 'Timeless and elegant, the Golden Pearls Bracelet combines the soft luster of pearls with the rich glow of gold. Featuring lustrous pearl beads delicately linked with gold accents, this bracelet exudes classic charm and sophistication. Whether worn alone or layered, it adds a touch of graceful beauty to any ensemble.\r\n', '/product_images/b2.jpg', 64, 2, '2025-06-15 22:57:00'),
(3, 'Gold Snake Chain Bracelet', 'b3.jpg', 'Sleek, sensual, and undeniably sophisticated — the Golden Snake Chain Bracelet is a timeless piece designed to drape gracefully around your wrist like liquid gold. Crafted with a smooth, flexible snake-link design, it captures the essence of bold minimalism and quiet luxury. The way it catches the light with every movement gives it an almost hypnotic shimmer, making it perfect for both elevated everyday looks and refined evening wear.', '/product_images/b3.jpg', 84, 2, '2025-06-15 22:57:00'),
(4, 'Bangled Chain Bracelet ', 'b4.jpg', 'Boldly elegant and richly textured, the Gold Bangled Chain Bracelet blends the timeless beauty of bangles with the fluidity of chain design. Featuring interlocking gold-plated links paired with solid bangle-style curves, this piece strikes the perfect balance between structure and movement. Each element gleams with a high-polish finish, wrapping your wrist in warmth, luxury, and confident style.', '/product_images/b4.jpg', 77, 2, '2025-06-15 22:57:00'),
(5, 'Sleek White Pearl Bracelet', 'b5.jpg', 'A timeless blend of elegance and modern minimalism, this sleek white pearl bracelet features lustrous, hand-picked pearls strung seamlessly along a delicate band. The smooth, radiant pearls offer a graceful shimmer, perfect for both everyday sophistication and special occasions. Understated yet luxurious, it adds a refined touch to any ensemble.', '/product_images/b5.jpg', 92, 2, '2025-06-15 22:57:00'),
(6, 'Daisy Dazzle Bracelet', 'b6.jpg', 'Bright, playful, and effortlessly charming — the Daisy Dazzle Bracelet captures the essence of springtime joy. Adorned with delicate daisy motifs and shimmering accents, this bracelet adds a fresh pop of floral elegance to your wrist. Whether worn solo or layered, its the perfect accessory to dazzle with a touch of nature-inspired beauty.\r\n', '/product_images/b6.jpg', 105, 2, '2025-06-15 22:57:00'),
(7, 'Curved Droplet Earrings', 'e1.jpg', 'Graceful and refined, the Gold Curved Droplet Earrings exude modern elegance with a fluid silhouette. Crafted in radiant gold, their gently curved design mimics the natural fall of a droplet, catching the light with every movement. Lightweight yet striking, they offer a sophisticated finish — perfect for elevating both day and evening looks.', 'product_images/e1.jpg', 33, 1, '2025-06-15 23:11:42'),
(8, 'Twisted Chunk Earrings', 'e2.jpg', 'Make a bold impression with the Twisted Chunk Earrings — a striking fusion of contemporary design and statement luxury. Featuring thick, sculpted curves that spiral with artistic precision, these earrings command attention while maintaining a sense of elegance. Their high-shine metallic finish adds depth and drama, perfect for elevating everyday wear or completing a glam evening look. ', 'product_images/e2.jpg', 41, 1, '2025-06-15 23:12:27'),
(9, 'Pearl Hoop Earrings', 'e3.jpg', 'A timeless twist on a classic favorite, the Pearl Hoop Earrings blend the graceful charm of pearls with the bold appeal of hoops. Each elegant curve is adorned with luminous white pearls, creating a harmonious balance of softness and strength. Whether styled for a chic daytime look or an elevated evening ensemble, these earrings add a touch of sophistication and effortless glamour to any outfit.', 'product_images/e3.jpg', 37, 1, '2025-06-15 23:13:21');

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
  `role` varchar(20) NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `number`, `dob`, `gender`, `password`, `role`, `created_at`) VALUES
(1, 'Omar Azam', 'thisisomarazam@gmail.com', '03170505259', '2005-06-06', 'male', '$2y$10$kJRKLXOqZR1haKGJvxtBF./ksPTcexONu0Agq8Pcgdcpst.6zfyY6', 'admin', '2025-06-15 22:49:23');

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
(1, 1, 'Omar Azam', 'thisisomarazam@gmail.com', '03170505259', 'd84585ef37187af0ec47e5c8d6788d16020f0b61d381a46b349e12defa749ad0', '2025-07-16 00:49:23', '2025-06-15 22:49:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

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
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_tokens`
--
ALTER TABLE `user_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

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
