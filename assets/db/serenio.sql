-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2024 at 01:39 PM
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
(1, 'Halo-Halo', 'A popular Filipino dessert made with a mixture of shaved ice, sweetened fruits, beans, jellies, and topped with ice cream and leche flan.', 30, 35, 25, 'https://www.angsarap.net/wp-content/uploads/2019/04/Halo-Halo.jpg', '2024-05-12 00:00:00'),
(2, 'Adobo', 'A Filipino dish consisting of meat (usually chicken or pork) marinated in soy sauce, vinegar, garlic, bay leaves, and black peppercorns then simmered until tender.', 18, 22, 35, 'https://www.kawalingpinoy.com/wp-content/uploads/2020/06/Adobo-3.jpg', '2024-05-12 00:00:00'),
(3, 'Lechon', 'A traditional Filipino dish of roasted whole pig, resulting in crispy skin and tender meat.', 50, 60, 15, 'https://www.angsarap.net/wp-content/uploads/2019/03/Lechon-Kawali-2.jpg', '2024-05-12 00:00:00'),
(4, 'Sinigang', 'A sour Filipino soup or stew characterized by its distinct sour taste, usually from tamarind, and includes a variety of vegetables and meat or seafood.', 22, 28, 40, 'https://www.kawalingpinoy.com/wp-content/uploads/2020/06/Sinigang-na-Baboy-2.jpg', '2024-05-12 00:00:00'),
(5, 'Pancit', 'A Filipino noodle dish with Chinese origins, made with stir-fried noodles, vegetables, meat, and sometimes seafood, typically seasoned with soy sauce and citrus.', 25, 30, 30, 'https://www.kawalingpinoy.com/wp-content/uploads/2020/08/Pancit-Canton-2.jpg', '2024-05-12 00:00:00');
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
(1, 'admin', '$2y$10$kGp4g1TjBK4XwLIwRbBHSeZ4W5FpPbYoB1ap5NfFUjUPAcE3KR5QG', '2024-04-29 16:39:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
