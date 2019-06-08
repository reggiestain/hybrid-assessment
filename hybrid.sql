-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2019 at 10:28 AM
-- Server version: 5.7.14
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hybrid`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_balance`
--

CREATE TABLE `account_balance` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `balance` decimal(8,2) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `street_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `street_number`, `street_name`, `street_address`, `province`, `post_code`, `country`, `created_at`, `updated_at`) VALUES
(1, 6, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-24 23:07:04', '2019-04-24 23:07:04'),
(2, 6, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-24 23:07:33', '2019-04-24 23:07:33'),
(3, 6, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-24 23:08:16', '2019-04-24 23:08:16'),
(4, 6, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-24 23:08:44', '2019-04-24 23:08:44'),
(5, 6, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-24 23:10:18', '2019-04-24 23:10:18'),
(6, 6, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-24 23:24:41', '2019-04-24 23:24:41'),
(7, 5, NULL, NULL, NULL, 'GP', NULL, 'South Africa', '2019-05-16 19:40:42', '2019-05-16 19:40:42'),
(8, 5, '93', 'hornbill avenue, rooihuiskraal', NULL, 'GP', '0157', 'South Africa', '2019-05-16 19:48:53', '2019-05-16 19:48:53'),
(9, 5, NULL, NULL, NULL, 'GP', NULL, 'South Africa', '2019-05-16 20:38:01', '2019-05-16 20:38:01');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_09_10_000000_create_user_groups_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2018_12_09_083553_create_product_category_table', 1),
(5, '2018_12_10_082241_create_products_table', 1),
(6, '2018_12_11_092839_create_account_balance_table', 1),
(7, '2018_12_11_093026_create_transactions_table', 1),
(8, '2019_04_15_122329_create_social_identities_table', 2),
(9, '2019_04_19_204725_create_shoppingcart_table', 2),
(20, '2019_04_24_172253_create_address_table', 5),
(18, '2019_04_23_235453_create_orders_table', 4),
(21, '2016_09_13_070520_add_verification_to_user_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `items` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Un-paid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `items`, `email`, `phone`, `qty`, `address`, `amount`, `name`, `payment_id`, `status`, `created_at`, `updated_at`) VALUES
(25, NULL, 'Kano Button-Up Africa Print Long Sleeve', 'reggiestain15@gmail.com', '784450830', '1', '93 hornbill avenue, rooihuiskraal', '600.00', 'Reginald Bossman', '25', 'COMPLETE', '2019-05-23 16:29:05', '2019-05-28 17:03:53'),
(26, NULL, 'Kano Button-Up Africa Print Long Sleeve', 'reggiestain@gmail.com', '781304587', '1', '93 hornbill avenue, rooihuiskraal', '600.00', 'Reginald Bossman', '26', 'Un-paid', '2019-05-23 16:30:45', '2019-05-23 16:30:45'),
(27, NULL, 'African Ankara Trend', 'reggiestain15@gmail.com', '0784450830', '1', '93 hornbill avenue, rooihuiskraal', '550.00', 'Reginald Bossman', '27', 'Un-paid', '2019-05-23 20:00:12', '2019-05-23 20:00:12'),
(28, NULL, 'Keyon Button-Up African Print Shirt', 'reggiestain15@gmail.com', '0784450830', '4', '93 hornbill avenue, rooihuiskraal', '2,200.00', 'Reginald Bossman', '28', 'Un-paid', '2019-05-24 14:40:43', '2019-05-24 14:40:43'),
(29, NULL, 'African Ankara Trend', 'reggiestain15@gmail.com', '784450830', '1', 'centurion', '550.00', 'Reginald Bossman', '29', 'Un-paid', '2019-05-28 17:05:28', '2019-05-28 17:05:28');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `price` decimal(8,2) UNSIGNED NOT NULL,
  `discount` int(10) UNSIGNED NOT NULL,
  `product_category_id` int(10) UNSIGNED NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `discount`, `product_category_id`, `mime_type`, `created_at`, `updated_at`) VALUES
(10, 'Short Sleeve Mandarin Button-Up African', 'Short Sleeve Mandarin Button-Up African Print Shirt (Maroon Multipattern)', '550.00', 0, 2, 'public/images/products/men/african-shirt-6.jpg', '2019-03-05 14:07:49', '2019-04-04 17:10:02'),
(11, 'Keyon Button-Up African Print Shirt', 'Keyon Button-Up African Print Shirt (Purple/Tan)', '550.00', 0, 2, 'public/images/products/men/african-shirt-4.jpg', '2019-03-05 14:07:49', '2019-04-04 17:10:13'),
(12, 'Kano Button-Up Africa Print Long Sleeve', 'Kano Button-Up Africa Print Long Sleeve Denim Mandarin Shirt (Red Navy Stripe)', '600.00', 0, 2, 'public/images/products/men/african-shirt-2.jpg', '2019-03-05 14:07:49', '2019-04-04 16:50:18'),
(13, 'African Print Blazer', 'African Print Blazer (Black Brown Geometric)', '3500.00', 0, 2, 'public/images/products/men/african-coat-1.jpg', '2019-03-05 14:07:49', '2019-04-04 17:10:34'),
(14, 'African Ankara Trend', 'African Ankara Trend', '550.00', 0, 2, 'public/images/products/men/african-shirt-8.jpg', '2019-03-05 14:07:49', '2019-04-04 17:10:53'),
(15, 'African Kofi Blazer', NULL, '3500.00', 0, 2, 'public/images/products/men/african-coat-2.jpg', '2019-03-05 14:07:49', '2019-04-04 17:11:25'),
(16, 'Dashiki Cotton Mixed Long Sleeve T-shirt', 'Dashiki Cotton Mixed Long Sleeve T-shirt', '350.00', 0, 2, 'public/images/products/men/african-t-l-1.jpg', '2019-03-05 14:07:49', '2019-04-04 17:17:23'),
(17, 'Afia Short Sleevw T-Shirt', 'Afia Short Sleevw T-Shirt', '300.00', 0, 2, 'public/images/products/men/african-t-3.jpg', '2019-03-05 14:07:49', '2019-04-04 17:17:37'),
(18, 'Ringo Two Tone Long Sleeve Shirt', 'Ringo Two Tone Long Sleeve Shirt', '600.00', 0, 2, 'public/images/products/men/african-shirt-l-3.jpg', '2019-03-05 14:07:49', '2019-04-04 17:12:17'),
(19, 'Buttoms bala African high waist pants', NULL, '600.00', 0, 1, 'public/images/products/women/african-w-10.jpg', '2019-03-07 22:00:00', '2019-04-04 17:12:51'),
(20, 'African Porcupine Long Skirt', NULL, '600.00', 0, 1, 'public/images/products/women/african-w-3.jpg', '2019-03-07 22:00:00', '2019-04-04 17:13:13'),
(21, 'African shoilder jumpsuit', NULL, '1800.00', 0, 1, 'public/images/products/women/african-w-6.jpg', '2019-03-07 22:00:00', '2019-04-04 17:13:37'),
(22, 'African Flair Dress', NULL, '1800.00', 0, 1, 'public/images/products/women/african-w-1.jpg', '2019-03-07 22:00:00', '2019-04-04 17:14:11'),
(23, 'Zonke Printed Midi Skirt', NULL, '650.00', 0, 3, 'public/images/products/kids/african-k-g-1.jpg', NULL, '2019-04-04 17:14:37'),
(24, 'Sindi Midi Skirt', NULL, '450.00', 0, 3, 'public/images/products/kids/african-k-g-2.jpg', '2019-03-07 22:00:00', '2019-04-09 10:51:36'),
(25, 'Lebo Long Sleeve Cape', NULL, '600.00', 0, 3, 'public/images/products/kids/african-k-g-3.jpg', '2019-03-07 22:00:00', '2019-04-04 17:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Women', 'Women', '2019-03-05 14:07:45', '2019-03-05 14:07:45'),
(2, 'Men', 'Men', '2019-03-05 14:07:45', '2019-03-05 14:07:45'),
(3, 'Kids', 'Kids', '2019-03-05 14:07:45', '2019-03-05 14:07:45'),
(4, 'all', 'All', '2019-03-05 14:07:45', '2019-03-05 14:07:45');

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `social_identities`
--

CREATE TABLE `social_identities` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `provider_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `price` decimal(8,2) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_group_id` int(10) UNSIGNED NOT NULL DEFAULT '2',
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `verification_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `surname`, `email`, `user_group_id`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `verified`, `verification_token`) VALUES
(3, 'Nhlanhla', 'Mbhele', 'treysoul4@gmail.com', 2, '$2y$10$udtg1M3fegxviPaGFRo9RuAuiOQBwfvUL1wamaQvNT4xGDU7.n3vy', '0000-00-00 00:00:00', 'rGLgdvCMDY9ylNCapunnD4lxBhQsdRDKMcS6UjAIonwbFZQBeaJO6Sofawbn', '2019-03-13 06:16:45', '2019-03-13 06:16:45', 0, NULL),
(4, 'Lizile', 'Xulu', 'xulu.lizile@gmail.com', 1, '$2y$10$0EFEniZPZlPcGhgFggYwjeUNrbbL/Dzltjq0MSHT8BKNuZSKNjKzK', '0000-00-00 00:00:00', 'EgL7GRRf4AcwRLZGXapxdz9uJW0owANM3mXSXHh7Xsmg03dVTGgYxMtXusqC', '2019-04-04 16:30:20', '2019-04-04 16:30:20', 0, NULL),
(7, 'Reggie', 'Bossman', 'reggiestain@gmail.com', 2, '$2y$10$UGZBpKGVcCeDjYwaLWPKFeKF3AdoWchj11C1Jwe2nSNSpM6PIAHaq', NULL, '4pYFqPSY83YHBElo4vFWMf9WzcsIU74C23xe4sTjwNpDaIMSuq9uicuYz5mn', '2019-05-16 21:02:16', '2019-05-16 21:04:36', 1, '7daf4a8038afc480d00b256c83608e7eff55f0870a46316f2e791b8072c08335'),
(8, 'Admin', 'Admin', 'reggiestain15@gmail.com', 1, '$2y$10$4X3VjpoZTZ8QQ9rvplunuuWAwSR.U3.3ngyfZe/iM4Fs3DIOSQ1ha', NULL, 'YhAWoikoJ67rkYVTIvYELW09iQ5EPHnSX5tVXG7gejSIJoFZ1639VOPbBdnP', '2019-05-17 07:03:40', '2019-05-17 07:03:44', 1, 'caf4f5ab3e08cd6483af591d38b79224bd9c6b00b0642ea8a47352c75be6858e');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', '', '2019-03-05 22:00:00', '2019-03-05 22:00:00'),
(2, 'guest', '', '2019-03-05 22:00:00', '2019-03-12 22:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_balance`
--
ALTER TABLE `account_balance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_balance_user_id_foreign` (`user_id`);

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_product_category_id_foreign` (`product_category_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Indexes for table `social_identities`
--
ALTER TABLE `social_identities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `social_identities_provider_id_unique` (`provider_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_product_id_foreign` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_user_group_id_foreign` (`user_group_id`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_balance`
--
ALTER TABLE `account_balance`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `social_identities`
--
ALTER TABLE `social_identities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
