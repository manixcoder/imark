-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 18, 2022 at 04:15 AM
-- Server version: 5.7.36
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arknewte_imark`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand_name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(7, 'test brand', '20200711190320-tshirt.jpg', 1, '2020-07-13 17:47:49', '0000-00-00 00:00:00'),
(9, 'Levis', '20200713135337-Levis.png', 0, '2020-07-13 17:54:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'no-image.jpg',
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'T-Shirts & Tank Tops', '', 0, '2020-07-13 17:56:04', '2020-07-13 17:56:04'),
(3, 'iMARK Specials', '20200710175150-tshirt.jpg', 1, '2020-07-10 12:21:50', '2020-07-10 12:21:50'),
(4, 'Specials Sweaters & Fleece', '20200710175311-hausary.jpg', 1, '2020-07-10 12:23:11', '2020-07-10 12:23:11'),
(5, 'Corporate Dress Shirts', '20200710175345-Georgette Fabric.jpg', 1, '2020-07-10 12:23:45', '2020-07-10 12:23:45'),
(6, 'Bags', '', 1, '2020-07-10 12:24:54', '2020-07-10 12:24:54'),
(7, 'Sports shirts', '', 1, '2020-07-10 12:26:35', '2020-07-10 12:26:35'),
(8, 'Jackets', '', 1, '2020-07-10 12:26:52', '2020-07-10 12:26:52'),
(9, 'Heels', '', 0, '2020-07-13 17:56:51', '2020-07-13 17:56:51');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `image`, `city_name`, `state_id`) VALUES
(1, 'ahem.jpg', 'Ahmadabad', 1),
(2, '', 'Chennai ', 1),
(3, '', 'New Delhi', 1),
(4, '', 'Chandigarh ', 1),
(5, '', 'Mumbai', 1),
(6, '', 'Pune', 1),
(7, '', 'Banglore\r\n', 1),
(8, '', 'Colkata', 1),
(9, '', 'Hyderabad\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `color_name` varchar(255) DEFAULT NULL,
  `color_code` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `color_name`, `color_code`, `status`, `created_at`) VALUES
(2, 'Azure Blue', '#007fff', 1, '2020-07-10 11:57:49'),
(3, 'Black', '#000000', 1, '2020-07-10 11:58:36'),
(4, 'Navy', '#000080', 1, '2020-07-10 11:59:15'),
(5, 'Apple Red', '#ff0800', 1, '2020-07-10 12:00:15'),
(6, 'White', '#FFFFFF', 1, '2020-07-10 12:01:06'),
(7, 'Maroon', '#800000', 1, '2020-07-10 12:01:40'),
(8, 'Vine Green', '#38a32a', 1, '2020-07-10 12:02:37'),
(9, 'True Royal', '#4169e1', 1, '2020-07-10 12:03:20'),
(10, 'True Royal', '#4169e1', 1, '2020-07-10 12:05:08'),
(11, 'Sterling Grey', '#b5b5ab', 1, '2020-07-10 12:06:27'),
(12, 'Mid night black', '#0a0a0a', 1, '2020-07-13 18:08:11');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `product_code` varchar(255) DEFAULT NULL,
  `product_price` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `inventory` varchar(255) DEFAULT NULL,
  `description` text,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `color_id`, `size_id`, `product_name`, `sku`, `product_code`, `product_price`, `image`, `inventory`, `description`, `status`, `created_at`, `updated_at`) VALUES
(7, 7, 2, 3, 3, 'T-balck C', '10', 'BLC001', '10', '20200711190758-LBAHk.jpg,20200711190758-tshirt.jpg', '10', NULL, 0, '2020-07-11 13:37:58', '0000-00-00 00:00:00'),
(8, 9, 8, 4, 5, 'Denim jacket', '07', 'DM001', '60', '20200713140232-levisjacket.jpg', '100', NULL, NULL, '2020-07-13 08:32:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `star` varchar(255) DEFAULT NULL,
  `comment` text,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `size_name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `size_name`, `status`, `created_at`) VALUES
(2, 'XSmall', 1, '2020-07-10 12:06:58'),
(3, 'Small', 1, '2020-07-10 12:07:13'),
(4, 'Medium', 1, '2020-07-10 12:07:30'),
(5, 'Large', 1, '2020-07-10 12:07:43'),
(6, 'XL', 1, '2020-07-10 12:08:00'),
(7, '2XL & Up', 1, '2020-07-14 19:39:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `users_role` int(11) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remember_token` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '''0'' Inactive , ''1'' Active',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `users_role`, `profile_image`, `name`, `password`, `email`, `country_id`, `phone`, `email_verified_at`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'avatar-5.jpg', 'Admin', '$2a$08$TnLUue010iZQcUVL.b0bPeCaFvVqa221s0MmNopcnzeIg4q4jjxQa', 'admin@gmail.com', 0, '9020202020', '2020-07-10 15:31:55', 'w5m1xvlF3H1ffYSoFSkmAS4crD7ctpz7uSeIBuw7pPodC3TE6Y6rGcrMHk3m', 0, '2020-05-13 00:29:20', '2020-05-13 00:29:20'),
(1039, 2, '20200711172207-6.jpeg', 'Excutive', '$2y$10$kRB7Oae3r0dMTMMb.fOUMe5gmjOKwvy0H2RjH.K0H7lLe3c6XLRwG', 'excutive@gmail.com', NULL, '9920211111', '2020-07-11 11:52:07', NULL, 0, '2020-07-11 11:52:07', '2020-07-08 09:17:17'),
(1040, 3, '', 'Customer', '$2y$10$EWTWf4Vca9pa4bkILySyv.18g0Bs0P6t30SQE1tvK4XWk.OuH8jsy', 'customer@gmail.com', NULL, '9920210210', '2020-07-09 04:19:29', NULL, 1, '2020-07-08 09:17:17', '2020-07-08 09:17:17'),
(1041, 2, '20200713125906-images.jpg', 'Executive1', '$2y$10$X.O2zu145/T.pTo5y0OhkO60tdsQ52IRvtWqSWDKUQH4FZxEjJuEe', 'adam123@gmail.com', NULL, '9087654321', '2020-07-13 07:40:44', NULL, 0, '2020-07-13 17:10:44', '2020-07-13 07:29:06'),
(1043, 2, '20200714115918-Screenshot (1).png', 'executive2', '$2y$10$lKavj8NjGUotMIP1LQOE9uUhK6WfVBPM5K0xS5F4aH.R9Cxw0uxOi', 'exe1@gmail', NULL, '1234567890', '2020-07-14 06:30:40', NULL, 0, '2020-07-14 16:00:40', '2020-07-14 06:29:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
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
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1044;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
