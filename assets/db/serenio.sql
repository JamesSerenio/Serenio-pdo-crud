-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 01:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serenio`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) DEFAULT NULL,
  `postal_code` varchar(20) NOT NULL,
  `country` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `street`, `city`, `state`, `postal_code`, `country`, `created_at`) VALUES
(1, 1, '1234 Main St', 'Makati', 'Metro Manila', '1230', 'Philippines', '2024-05-12 00:00:00'),
(2, 1, '5678 Second St', 'Quezon City', 'Metro Manila', '1100', 'Philippines', '2024-05-12 00:00:00');

-- --------------------------------------------------------

--
CREATE TABLE `payments` (
  `payment_id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `product_name` VARCHAR(255) NOT NULL,
  `amount` DECIMAL(10, 2) NOT NULL,
  `payment_status` ENUM('Pending', 'Completed', 'Failed') NOT NULL DEFAULT 'Pending',
  `payment_method` VARCHAR(50) NOT NULL,
  `transaction_id` VARCHAR(100),
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  INDEX `user_id` (`user_id`),
  CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `payments`
--

/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` (`user_id`, `product_name`, `amount`, `payment_status`, `payment_method`, `transaction_id`, `created_at`) VALUES
(:user_id, :product_name, :amount, 'Pending', 'Stripe', NULL, NOW()); --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `rrp` decimal(10,0) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL,
  `img` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `rrp`, `quantity`, `img`, `date_added`) VALUES
(1, 'Halo-Halo', 'A popular Filipino dessert made with a mixture of shaved ice, sweetened fruits, beans, jellies, and topped with ice cream and leche flan.', 30, 35, 25, 'https://businessmirror.com.ph/wp-content/uploads/2024/03/chowking-photo1.jpg', '2024-05-12 00:00:00'),
(2, 'Adobo', 'A Filipino dish consisting of meat (usually chicken or pork) marinated in soy sauce, vinegar, garlic, bay leaves, and black peppercorns then simmered until tender.', 18, 22, 35, 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Adobo_DSCF4391.jpg/1280px-Adobo_DSCF4391.jpg', '2024-05-12 00:00:00'),
(3, 'Lechon', 'A traditional Filipino dish of roasted whole pig, resulting in crispy skin and tender meat.', 50, 60, 15, 'https://upload.wikimedia.org/wikipedia/commons/c/cc/Lechon_Kawali.jpg', '2024-05-12 00:00:00'),
(4, 'Sinigang', 'A sour Filipino soup or stew characterized by its distinct sour taste, usually from tamarind, and includes a variety of vegetables and meat or seafood.', 22, 28, 40, 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f5/Sinigang_na_Baboy_DSCF4234.jpg/1280px-Sinigang_na_Baboy_DSCF4234.jpg', '2024-05-12 00:00:00'),
(5, 'Pancit', 'A Filipino noodle dish with Chinese origins, made with stir-fried noodles, vegetables, meat, and sometimes seafood, typically seasoned with soy sauce and citrus.', 25, 30, 30, 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/ef/Pancit_Ilonggo_Style_-_12110747826.jpg/1280px-Pancit_Ilonggo_Style_-_12110747826.jpg', '2024-05-12 00:00:00'),
(6, 'Kare-Kare', 'A traditional Filipino oxtail stew made with a thick savory peanut sauce.', 40, 45, 20, 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/Mac_MG_5939.jpg/375px-Mac_MG_5939.jpg', '2024-05-23 02:04:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$kGp4g1TjBK4XwLIwRbBHSeZ4W5FpPbYoB1ap5NfFUjUPAcE3KR5QG', '2024-04-29 16:39:58'),
(2, 'james', '$2y$10$U7aTr39pIwhkVe6j1mqMQOZ.02NYY5B.pyHVQ8ntBKRms6P7Wh5Mq', '2024-05-22 08:32:41'),
(3, 'james23', '$2y$10$RFtuExOBbVw5Kb88iXBB0erI4QyS27rSwpP2yxHAtU0XVMSdp1eeS', '2024-05-22 08:34:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
