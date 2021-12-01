-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2021 at 07:46 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poly_mobile`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `banner_id` int(11) NOT NULL,
  `banner_name` varchar(255) NOT NULL,
  `banner_url` varchar(255) NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `banner_index` int(11) NOT NULL DEFAULT 1,
  `banner_target` varchar(20) NOT NULL,
  `banner_position` varchar(20) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `brand_slug` varchar(100) NOT NULL,
  `brand_image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(120) NOT NULL,
  `category_slug` varchar(120) NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `is_menu` tinyint(4) NOT NULL DEFAULT 0,
  `is_parent` tinyint(4) NOT NULL DEFAULT 0,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `menu_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_slug`, `category_image`, `is_menu`, `is_parent`, `parent_id`, `created_at`, `updated_at`, `menu_url`) VALUES
(1, 'Điện thoại', 'dien-thoai', '', 1, 1, NULL, '2021-11-12 01:54:57', '2021-11-12 01:54:57', NULL),
(2, 'Iphone', 'iphone', '', 0, 0, 1, '2021-11-12 01:55:48', '2021-11-12 01:55:48', NULL),
(3, 'Phụ kiện', 'phu-kien', '', 1, 1, NULL, '2021-11-12 03:18:59', '2021-11-12 03:18:59', NULL),
(4, 'Tai nghe', 'tai-nghe', '', 0, 0, 3, '2021-11-12 03:19:17', '2021-11-12 03:19:17', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_content` varchar(255) NOT NULL,
  `comment_author` varchar(120) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gifts`
--

CREATE TABLE `gifts` (
  `gift_id` int(11) NOT NULL,
  `gift_name` varchar(200) NOT NULL,
  `start_time` datetime NOT NULL DEFAULT current_timestamp(),
  `end_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(120) NOT NULL,
  `news_slug` varchar(120) NOT NULL,
  `news_description` varchar(255) NOT NULL,
  `news_content` text NOT NULL,
  `news_image` varchar(255) NOT NULL,
  `news_tags` varchar(255) DEFAULT NULL,
  `news_views` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `option_id` int(11) NOT NULL,
  `app_name` varchar(120) DEFAULT NULL,
  `hotline_1` varchar(20) DEFAULT NULL,
  `hotline_2` varchar(20) DEFAULT NULL,
  `hotline_3` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `license` varchar(255) DEFAULT NULL,
  `is_maintenance` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`option_id`, `app_name`, `hotline_1`, `hotline_2`, `hotline_3`, `address`, `email`, `logo`, `favicon`, `license`, `is_maintenance`) VALUES
(3, 'Poly Mobile', '123456789', '123456789', '123456789', 'Vietnam', 'chuonqit@gmail.com', 'options/6197ef6b9cc6d-99555165220211120013939.png', 'options/6197efe97a969-35880710120211120014145.jpg', 'ABC123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_code` varchar(10) NOT NULL,
  `order_status` tinyint(4) NOT NULL DEFAULT 0,
  `order_total` float NOT NULL,
  `payment_type` varchar(20) NOT NULL DEFAULT 'shipcod',
  `user_id` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `order_confirm_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(120) NOT NULL,
  `product_slug` varchar(120) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_content` text NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_discount` float NOT NULL DEFAULT 0,
  `product_quantity` int(11) NOT NULL,
  `product_hot` tinyint(4) NOT NULL DEFAULT 0,
  `product_gifts` varchar(20) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_variant` tinyint(4) NOT NULL DEFAULT 0,
  `product_status` tinyint(4) NOT NULL DEFAULT 1,
  `product_views` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_configuration`
--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_slug`, `product_description`, `product_content`, `product_image`, `product_price`, `product_discount`, `product_quantity`, `product_hot`, `product_gifts`, `category_id`, `brand_id`, `created_at`, `updated_at`, `is_variant`, `product_status`, `product_views`) VALUES
(1, '13 Pro Max 128GB', '13-pro-max-128gb', 'Iphone 13 Pro Max 128GB', 'Iphone 13 Pro Max 128GB', '', 28000000, 0, 20, 0, NULL, 2, 1, '2021-11-12 01:58:04', '2021-11-12 01:58:04', 1, 1, 0),
(2, 'Airpod Pro', 'airpod-pro', 'Airpod Pro', 'Airpod Pro', '', 2500000, 0, 22, 0, NULL, 4, 1, '2021-11-12 03:19:52', '2021-11-12 03:19:52', 0, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_configuration`
--

CREATE TABLE `product_configuration` (
  `display` varchar(150) DEFAULT NULL,
  `camera_front` varchar(150) DEFAULT NULL,
  `camera_back` varchar(150) DEFAULT NULL,
  `ram` varchar(150) DEFAULT NULL,
  `storage` varchar(150) DEFAULT NULL,
  `cpu` varchar(150) DEFAULT NULL,
  `gpu` varchar(150) DEFAULT NULL,
  `battery` varchar(150) DEFAULT NULL,
  `sim` varchar(150) DEFAULT NULL,
  `system` varchar(150) DEFAULT NULL,
  `made_in` varchar(150) DEFAULT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `product_variant_id` int(11) NOT NULL,
  `product_variant_name` varchar(120) NOT NULL,
  `product_variant_slug` varchar(120) NOT NULL,
  `product_variant_price` float NOT NULL,
  `product_variant_discount` float NOT NULL DEFAULT 0,
  `product_variant_image` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--
-- Đang đổ dữ liệu cho bảng `product_variants`
--

INSERT INTO `product_variants` (`product_variant_id`, `product_variant_name`, `product_variant_slug`, `product_variant_price`, `product_variant_discount`, `product_variant_image`, `product_id`) VALUES
(1, 'Gold', 'gold', 29000000, 0, '', 1),
(2, 'Hồng', 'hong', 27000000, 0, '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratings`
--

CREATE TABLE `ratings` (
  `rating_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `rating_star` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_carts`
--

CREATE TABLE `shopping_carts` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `color` varchar(20) NOT NULL,
  `price` float NOT NULL,
  `is_buy` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `first_name` varchar(40) DEFAULT NULL,
  `last_name` varchar(80) DEFAULT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `gender` tinyint(4) NOT NULL DEFAULT 1,
  `role` varchar(15) NOT NULL DEFAULT 'user',
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verify` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `first_name`, `last_name`, `email`, `password`, `avatar`, `address`, `phone`, `gender`, `role`, `is_active`, `is_verify`, `created_at`, `updated_at`) VALUES
(2, 'Kiều Văn Chương', 'Chương', 'Kiều Văn', 'chuongkvph13392@fpt.edu.vn', '$2y$10$I7KB/v.qvjU0SibwLukGd.P5yxnuG46k6Gi89Xgk3slHIn706lfR6', NULL, NULL, NULL, 1, 'admin', 1, 1, '2021-11-18 08:01:07', '2021-11-18 08:01:07'),
(7, 'Giàng A Sủng', 'Sủng', 'Giàng A', 'chuonqit@gmail.com', '$2y$10$0wsYXqgiWrl8rfo8DdUJNuvkEq2ksjnzaG4ffbkM.LJCeD1R4AC16', NULL, NULL, NULL, 1, 'user', 1, 1, '2021-11-19 23:55:51', '2021-11-20 00:04:35');

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Table structure for table `user_tokens`
=======
-- Cấu trúc bảng cho bảng `user_tokens`
>>>>>>> origin/linh
--

CREATE TABLE `user_tokens` (
  `user_id` int(11) NOT NULL,
  `access_token` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `start_time` datetime NOT NULL DEFAULT current_timestamp(),
  `end_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
<<<<<<< HEAD
-- Dumping data for table `user_tokens`
--

INSERT INTO `user_tokens` (`user_id`, `access_token`, `is_active`, `start_time`, `end_time`) VALUES
(2, 'MTYzNzE5NzI2NzUzODc2NjU4OXxjaHVvbmdrdnBoMTMzOTJAZnB0LmVkdS52bg==', 1, '2021-11-18 08:01:07', '2021-11-18 08:01:07'),
(2, '0b79ee71e432918c144448f8984ac98e', 0, '2021-11-18 19:59:48', '2021-11-18 20:59:48'),
(2, 'NjE5NmEzODcwZWM2YWNodW9uZ2t2cGgxMzM5MkBmcHQuZWR1LnZu', 1, '2021-11-18 20:03:35', '2021-11-18 21:03:35'),
(2, 'NjE5NmE4ODM4NzE3MWNodW9uZ2t2cGgxMzM5MkBmcHQuZWR1LnZu', 1, '2021-11-18 20:24:51', '2021-11-18 21:24:51'),
(2, 'NjE5NmFjNjViZTFhZWNodW9uZ2t2cGgxMzM5MkBmcHQuZWR1LnZu', 0, '2021-11-18 20:41:25', '2021-11-18 21:41:25'),
(2, 'NjE5NmIyMTE0NmY5YmNodW9uZ2t2cGgxMzM5MkBmcHQuZWR1LnZu', 0, '2021-11-19 03:05:37', '2021-11-19 04:05:37'),
(7, 'NjE5N2Q3MTc5YzIxMmNodW9ucWl0QGdtYWlsLmNvbQ==', 1, '2021-11-19 23:55:51', '2021-11-19 23:55:51'),
(7, 'NjE5N2Q4ZTkzZDFiNGNodW9ucWl0QGdtYWlsLmNvbQ==', 1, '2021-11-20 00:03:37', '2021-11-20 01:03:37');
=======
-- Đang đổ dữ liệu cho bảng `user_tokens`
--

INSERT INTO `user_tokens` (`user_id`, `access_token`, `is_active`, `start_time`, `end_time`) VALUES
(1, 'MTYzNjY1MDgwODEyMjI0MDQxMDJ8Y2h1b25na3ZwaDEzMzkyQGZwdC5lZHUudm4=', 1, '2021-11-12 00:13:28', '2021-11-12 00:13:28');
>>>>>>> origin/linh

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Table structure for table `user_vouchers`
=======
-- Cấu trúc bảng cho bảng `user_vouchers`
>>>>>>> origin/linh
--

CREATE TABLE `user_vouchers` (
  `user_id` int(11) NOT NULL,
  `voucher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Table structure for table `vouchers`
=======
-- Cấu trúc bảng cho bảng `vouchers`
>>>>>>> origin/linh
--

CREATE TABLE `vouchers` (
  `voucher_id` int(11) NOT NULL,
  `voucher_code` varchar(50) NOT NULL,
  `limit_number` int(11) NOT NULL,
  `end_time` datetime NOT NULL DEFAULT current_timestamp(),
  `description` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `apply_price` float NOT NULL,
  `minimum_order_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Table structure for table `wishlists`
=======
-- Cấu trúc bảng cho bảng `wishlists`
>>>>>>> origin/linh
--

CREATE TABLE `wishlists` (
  `wishlist_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
<<<<<<< HEAD
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
=======
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banners`
>>>>>>> origin/linh
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`banner_id`);

--
<<<<<<< HEAD
-- Indexes for table `brands`
=======
-- Chỉ mục cho bảng `brands`
>>>>>>> origin/linh
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
<<<<<<< HEAD
-- Indexes for table `categories`
=======
-- Chỉ mục cho bảng `categories`
>>>>>>> origin/linh
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `categories_parent` (`parent_id`);

--
<<<<<<< HEAD
-- Indexes for table `comments`
=======
-- Chỉ mục cho bảng `comments`
>>>>>>> origin/linh
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comments_products` (`product_id`),
  ADD KEY `comments_users` (`user_id`);

--
<<<<<<< HEAD
-- Indexes for table `gifts`
=======
-- Chỉ mục cho bảng `gifts`
>>>>>>> origin/linh
--
ALTER TABLE `gifts`
  ADD PRIMARY KEY (`gift_id`);

--
<<<<<<< HEAD
-- Indexes for table `news`
=======
-- Chỉ mục cho bảng `news`
>>>>>>> origin/linh
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `news_users` (`user_id`);

--
<<<<<<< HEAD
-- Indexes for table `options`
=======
-- Chỉ mục cho bảng `options`
>>>>>>> origin/linh
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`option_id`);

--
<<<<<<< HEAD
-- Indexes for table `orders`
=======
-- Chỉ mục cho bảng `orders`
>>>>>>> origin/linh
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `users_orders` (`user_id`);

--
<<<<<<< HEAD
-- Indexes for table `order_items`
=======
-- Chỉ mục cho bảng `order_items`
>>>>>>> origin/linh
--
ALTER TABLE `order_items`
  ADD KEY `orders_items` (`order_id`),
  ADD KEY `products_orders_items` (`product_id`);

--
<<<<<<< HEAD
-- Indexes for table `products`
=======
-- Chỉ mục cho bảng `products`
>>>>>>> origin/linh
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `products_brands` (`brand_id`),
  ADD KEY `products_categories` (`category_id`);

--
<<<<<<< HEAD
-- Indexes for table `product_configuration`
=======
-- Chỉ mục cho bảng `product_configuration`
>>>>>>> origin/linh
--
ALTER TABLE `product_configuration`
  ADD KEY `product_configuration` (`product_id`);

--
<<<<<<< HEAD
-- Indexes for table `product_variants`
=======
-- Chỉ mục cho bảng `product_variants`
>>>>>>> origin/linh
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`product_variant_id`),
  ADD KEY `product_variants` (`product_id`);

--
<<<<<<< HEAD
-- Indexes for table `ratings`
=======
-- Chỉ mục cho bảng `ratings`
>>>>>>> origin/linh
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `comments_ratings` (`comment_id`);

--
<<<<<<< HEAD
-- Indexes for table `shopping_carts`
=======
-- Chỉ mục cho bảng `shopping_carts`
>>>>>>> origin/linh
--
ALTER TABLE `shopping_carts`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `products_carts` (`product_id`),
  ADD KEY `users_carts` (`user_id`);

--
<<<<<<< HEAD
-- Indexes for table `users`
=======
-- Chỉ mục cho bảng `users`
>>>>>>> origin/linh
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
<<<<<<< HEAD
-- Indexes for table `user_tokens`
=======
-- Chỉ mục cho bảng `user_tokens`
>>>>>>> origin/linh
--
ALTER TABLE `user_tokens`
  ADD KEY `users_tokens` (`user_id`);

--
<<<<<<< HEAD
-- Indexes for table `user_vouchers`
=======
-- Chỉ mục cho bảng `user_vouchers`
>>>>>>> origin/linh
--
ALTER TABLE `user_vouchers`
  ADD KEY `users_vouchers_fk1` (`user_id`),
  ADD KEY `users_vouchers_fk2` (`voucher_id`);

--
<<<<<<< HEAD
-- Indexes for table `vouchers`
=======
-- Chỉ mục cho bảng `vouchers`
>>>>>>> origin/linh
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`voucher_id`);

--
<<<<<<< HEAD
-- Indexes for table `wishlists`
=======
-- Chỉ mục cho bảng `wishlists`
>>>>>>> origin/linh
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `users_wishlists` (`user_id`),
  ADD KEY `products_wishlists` (`product_id`);

--
<<<<<<< HEAD
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
=======
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banners`
>>>>>>> origin/linh
--
ALTER TABLE `banners`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT;

--
<<<<<<< HEAD
-- AUTO_INCREMENT for table `brands`
=======
-- AUTO_INCREMENT cho bảng `brands`
>>>>>>> origin/linh
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
<<<<<<< HEAD
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
=======
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `comments`
>>>>>>> origin/linh
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
<<<<<<< HEAD
-- AUTO_INCREMENT for table `gifts`
=======
-- AUTO_INCREMENT cho bảng `gifts`
>>>>>>> origin/linh
--
ALTER TABLE `gifts`
  MODIFY `gift_id` int(11) NOT NULL AUTO_INCREMENT;

--
<<<<<<< HEAD
-- AUTO_INCREMENT for table `news`
=======
-- AUTO_INCREMENT cho bảng `news`
>>>>>>> origin/linh
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT;

--
<<<<<<< HEAD
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
=======
-- AUTO_INCREMENT cho bảng `options`
--
ALTER TABLE `options`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
>>>>>>> origin/linh
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
<<<<<<< HEAD
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `product_variant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ratings`
=======
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `product_variant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `ratings`
>>>>>>> origin/linh
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT;

--
<<<<<<< HEAD
-- AUTO_INCREMENT for table `shopping_carts`
=======
-- AUTO_INCREMENT cho bảng `shopping_carts`
>>>>>>> origin/linh
--
ALTER TABLE `shopping_carts`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
<<<<<<< HEAD
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vouchers`
=======
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `vouchers`
>>>>>>> origin/linh
--
ALTER TABLE `vouchers`
  MODIFY `voucher_id` int(11) NOT NULL AUTO_INCREMENT;

--
<<<<<<< HEAD
-- AUTO_INCREMENT for table `wishlists`
=======
-- AUTO_INCREMENT cho bảng `wishlists`
>>>>>>> origin/linh
--
ALTER TABLE `wishlists`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT;

--
<<<<<<< HEAD
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
=======
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`category_id`);

--
-- Các ràng buộc cho bảng `comments`
>>>>>>> origin/linh
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
<<<<<<< HEAD
-- Constraints for table `news`
=======
-- Các ràng buộc cho bảng `news`
>>>>>>> origin/linh
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
<<<<<<< HEAD
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `users_orders` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `orders_items` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_orders_items` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brands` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE;

--
-- Constraints for table `product_configuration`
--
ALTER TABLE `product_configuration`
  ADD CONSTRAINT `product_configuration` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `product_variants` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `ratings`
=======
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `users_orders` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `orders_items` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_orders_items` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brands` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`),
  ADD CONSTRAINT `products_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Các ràng buộc cho bảng `product_configuration`
--
ALTER TABLE `product_configuration`
  ADD CONSTRAINT `product_configuration` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Các ràng buộc cho bảng `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `product_variants` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Các ràng buộc cho bảng `ratings`
>>>>>>> origin/linh
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `comments_ratings` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`comment_id`) ON DELETE CASCADE;

--
<<<<<<< HEAD
-- Constraints for table `shopping_carts`
=======
-- Các ràng buộc cho bảng `shopping_carts`
>>>>>>> origin/linh
--
ALTER TABLE `shopping_carts`
  ADD CONSTRAINT `products_carts` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_carts` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
<<<<<<< HEAD
-- Constraints for table `user_tokens`
=======
-- Các ràng buộc cho bảng `user_tokens`
>>>>>>> origin/linh
--
ALTER TABLE `user_tokens`
  ADD CONSTRAINT `users_tokens` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
<<<<<<< HEAD
-- Constraints for table `user_vouchers`
=======
-- Các ràng buộc cho bảng `user_vouchers`
>>>>>>> origin/linh
--
ALTER TABLE `user_vouchers`
  ADD CONSTRAINT `users_vouchers_fk1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_vouchers_fk2` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`voucher_id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `products_wishlists` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_wishlists` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
