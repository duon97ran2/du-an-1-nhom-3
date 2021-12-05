-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2021 at 01:25 PM
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

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`banner_id`, `banner_name`, `banner_url`, `banner_image`, `banner_index`, `banner_target`, `banner_position`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 'Dien thoai', 'http://localhost/du-an-1-nhom-3/', 'banner/banner_1.jpg', 1, '_blank', '1', 1, '2021-12-05 11:52:55', '2021-12-05 11:52:55'),
(3, 'Dien thoai', 'http://localhost/du-an-1-nhom-3/', 'banner/banner_2.jpg', 2, '_blank', '1', 1, '2021-12-05 11:53:03', '2021-12-05 11:53:03'),
(4, 'Dien thoai', 'http://localhost/du-an-1-nhom-3/', 'banner/banner_1.jpg', 2, '_blank', '2', 1, '2021-12-05 11:52:55', '2021-12-05 11:52:55'),
(5, 'Dien thoai', 'http://localhost/du-an-1-nhom-3/', 'banner/banner_2.jpg', 1, '_blank', '2', 1, '2021-12-05 11:53:03', '2021-12-05 11:53:03');

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

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_slug`, `brand_image`, `created_at`, `updated_at`) VALUES
(67, 'Apple', 'apple', 'uploads/brands/iphone.jpg', '2021-12-05 11:58:04', '2021-12-05 11:58:04'),
(68, 'Samsung', 'samsung', 'uploads/brands/samsung.jpg', '2021-12-05 11:59:23', '2021-12-05 11:59:23'),
(69, 'Xiaomi', 'xiaomi', 'uploads/brands/xiaomi.jpg', '2021-12-05 11:59:23', '2021-12-05 11:59:23'),
(70, 'Realme', 'realme', 'uploads/brands/realme.jpg', '2021-12-05 11:59:23', '2021-12-05 11:59:23'),
(71, 'Vivo', 'vivo', 'uploads/brands/vivo.jpg', '2021-12-05 11:59:23', '2021-12-05 11:59:23'),
(72, 'Nokia', 'nokia', 'uploads/brands/nokia.jpg', '2021-12-05 11:59:23', '2021-12-05 11:59:23'),
(73, 'Oppo', 'oppo', 'uploads/brands/oppo.jpg', '2021-12-05 11:59:24', '2021-12-05 11:59:24');

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
  `menu_url` varchar(255) DEFAULT NULL,
  `category_index` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_slug`, `category_image`, `is_menu`, `is_parent`, `parent_id`, `created_at`, `updated_at`, `menu_url`, `category_index`) VALUES
(72, 'Điện thoại', 'dien-thoai', '', 1, 1, NULL, '2021-12-05 11:41:13', '2021-12-05 11:41:13', NULL, 2),
(73, 'Phụ kiện', 'phu-kien', '', 1, 1, NULL, '2021-12-05 11:42:56', '2021-12-05 11:42:56', NULL, 3),
(74, 'Trang chủ', 'trang-chu', '', 1, 1, NULL, '2021-12-05 11:42:56', '2021-12-05 11:42:56', 'http://localhost/du-an-1-nhom-3/', 1),
(75, 'Iphone', 'iphone', 'uploads/iphone.png', 0, 0, 72, '2021-12-05 11:45:03', '2021-12-05 11:45:03', NULL, NULL),
(76, 'Samsung', 'samsung', 'uploads/sam-sung.jpg', 0, 0, 72, '2021-12-05 11:45:22', '2021-12-05 11:45:22', NULL, NULL),
(77, 'Oppo', 'oppo', 'uploads/oppo.jpg', 0, 0, 72, '2021-12-05 11:45:46', '2021-12-05 11:45:46', NULL, NULL),
(78, 'Xiaomi', 'xiaomi', 'uploads/xiaomi.jpg', 0, 0, 72, '2021-12-05 11:45:46', '2021-12-05 11:45:46', NULL, NULL),
(79, 'Tai nghe', 'tai-nghe', 'uploads/tai-nghe.jpg', 0, 0, 73, '2021-12-05 11:46:15', '2021-12-05 11:46:15', NULL, NULL),
(80, 'Loa', 'loa', 'uploads/loa.jpg', 0, 0, 73, '2021-12-05 11:46:15', '2021-12-05 11:46:15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
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

--
-- Dumping data for table `gifts`
--

INSERT INTO `gifts` (`gift_id`, `gift_name`, `start_time`, `end_time`) VALUES
(7, 'Khuyến mãi 1', '2021-12-05 17:10:43', '2021-12-05 17:10:43'),
(8, 'Bảo hành 1', '2021-12-05 17:10:43', '2021-12-05 17:10:43');

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
(3, 'Poly Mobile', '123456781', '123456782', '123456783', 'Vietnam', 'chuonqit@gmail.com', 'options/61ac0a9223205-4002756220211205074050.png', 'options/619d01d2e7eb3-132805334020211123215930.png', 'ABC123', 0);

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

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_code`, `order_status`, `order_total`, `payment_type`, `user_id`, `address`, `phone`, `order_date`, `order_confirm_date`) VALUES
(21, 'PM56973021', 0, 55800000, 'shipcod', 8, 'Đồng Trúc - Thạch Thất - Hà Nội', '0982934000', '2021-12-05 17:28:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `total_price` float NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_id`, `id`, `product_id`, `price`, `total_price`, `quantity`, `color`) VALUES
(21, 1, 23, 27900000, 55800000, 2, '');

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
  `product_gifts` varchar(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_variant` tinyint(4) NOT NULL DEFAULT 0,
  `product_status` tinyint(4) NOT NULL DEFAULT 1,
  `product_views` int(11) NOT NULL DEFAULT 0,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_slug`, `product_description`, `product_content`, `product_image`, `product_price`, `product_discount`, `product_quantity`, `product_hot`, `product_gifts`, `category_id`, `brand_id`, `created_at`, `updated_at`, `is_variant`, `product_status`, `product_views`, `is_delete`) VALUES
(22, 'Samsung Galaxy S21 Ultra 258GB', 'samsung-galaxy-s21-ultra-258gb', 'Samsung Galaxy S21 Ultra 258GB', 'Chưa có thông tin...', 'products/61ac4f0281658-67056511220211205123250.jpg', 345000000, 4, 20, 1, '7,8', 76, 68, '2021-12-05 12:32:50', '2021-12-05 18:03:29', 0, 1, 2, 1),
(23, 'Iphone 13 Pro Max 258GB', 'iphone-13-pro-max-258gb', 'Iphone 13 Pro Max 258GB', 'Chưa có thông tin...', 'products/61ac5bef3acdf-49910227820211205132759.png', 27900000, 10, 18, 1, '7,8', 75, 67, '2021-12-05 13:27:59', '2021-12-05 14:14:42', 0, 1, 3, 0),
(24, 'Tai nghe không dây SP876', 'tai-nghe-khong-day-sp876', 'Tai nghe không dây SP876', 'Chưa có thông tin...', 'products/61ac60be1def5-161299154720211205134830.jpg', 5000000, 5, 20, 0, '7,8', 79, 69, '2021-12-05 13:48:30', '2021-12-05 13:48:30', 0, 1, 4, 0),
(25, 'Samsung Galaxy S21 Ultra 258GB', 'samsung-galaxy-s21-ultra-258gb', 'Samsung Galaxy S21 Ultra 258GB', 'Chưa có thông tin...', 'products/61ac4f0281658-67056511220211205123250.jpg', 25000000, 4, 20, 1, '7,8', 76, 68, '2021-12-05 12:32:50', '2021-12-05 14:14:52', 0, 1, 2, 0),
(26, 'Iphone 13 Pro Max 258GB', 'iphone-13-pro-max-258gb', 'Iphone 13 Pro Max 258GB', 'Chưa có thông tin...', 'products/61ac5bef3acdf-49910227820211205132759.png', 27900000, 10, 20, 1, '7,8', 75, 67, '2021-12-05 13:27:59', '2021-12-05 14:14:42', 0, 1, 3, 0),
(27, 'Tai nghe không dây SP876', 'tai-nghe-khong-day-sp876', 'Tai nghe không dây SP876', 'Chưa có thông tin...', 'products/61ac60be1def5-161299154720211205134830.jpg', 5000000, 5, 20, 0, '7,8', 79, 69, '2021-12-05 13:48:30', '2021-12-05 13:48:30', 0, 1, 4, 0),
(28, 'Samsung Galaxy S21 Ultra 258GB', 'samsung-galaxy-s21-ultra-258gb', 'Samsung Galaxy S21 Ultra 258GB', 'Chưa có thông tin...', 'products/61ac4f0281658-67056511220211205123250.jpg', 25000000, 4, 20, 1, '7,8', 76, 68, '2021-12-05 12:32:50', '2021-12-05 14:14:52', 0, 1, 2, 0),
(29, 'Iphone 13 Pro Max 258GB', 'iphone-13-pro-max-258gb', 'Iphone 13 Pro Max 258GB', 'Chưa có thông tin...', 'products/61ac5bef3acdf-49910227820211205132759.png', 27900000, 10, 20, 1, '7,8', 75, 67, '2021-12-05 13:27:59', '2021-12-05 14:14:42', 0, 1, 3, 0),
(30, 'Tai nghe không dây SP876', 'tai-nghe-khong-day-sp876', 'Tai nghe không dây SP876', 'Chưa có thông tin...', 'products/61ac60be1def5-161299154720211205134830.jpg', 5000000, 5, 20, 0, '7,8', 79, 69, '2021-12-05 13:48:30', '2021-12-05 13:48:30', 0, 1, 4, 0),
(31, 'Samsung Galaxy S21 Ultra 258GB', 'samsung-galaxy-s21-ultra-258gb', 'Samsung Galaxy S21 Ultra 258GB', 'Chưa có thông tin...', 'products/61ac4f0281658-67056511220211205123250.jpg', 25000000, 4, 20, 1, '7,8', 76, 68, '2021-12-05 12:32:50', '2021-12-05 14:14:52', 0, 1, 2, 0),
(32, 'Iphone 13 Pro Max 258GB', 'iphone-13-pro-max-258gb', 'Iphone 13 Pro Max 258GB', 'Chưa có thông tin...', 'products/61ac5bef3acdf-49910227820211205132759.png', 27900000, 10, 20, 1, '7,8', 75, 67, '2021-12-05 13:27:59', '2021-12-05 14:14:42', 0, 1, 3, 0),
(33, 'Tai nghe không dây SP876', 'tai-nghe-khong-day-sp876', 'Tai nghe không dây SP876', 'Chưa có thông tin...', 'products/61ac60be1def5-161299154720211205134830.jpg', 5000000, 5, 20, 0, '7,8', 79, 69, '2021-12-05 13:48:30', '2021-12-05 13:48:30', 0, 1, 4, 0),
(34, 'Samsung Galaxy S21 Ultra 258GB', 'samsung-galaxy-s21-ultra-258gb', 'Samsung Galaxy S21 Ultra 258GB', 'Chưa có thông tin...', 'products/61ac4f0281658-67056511220211205123250.jpg', 25000000, 4, 20, 1, '7,8', 76, 68, '2021-12-05 12:32:50', '2021-12-05 14:14:52', 0, 1, 2, 0),
(35, 'Iphone 13 Pro Max 258GB', 'iphone-13-pro-max-258gb', 'Iphone 13 Pro Max 258GB', 'Chưa có thông tin...', 'products/61ac5bef3acdf-49910227820211205132759.png', 27900000, 10, 20, 1, '7,8', 75, 67, '2021-12-05 13:27:59', '2021-12-05 14:14:42', 0, 1, 3, 0),
(36, 'Tai nghe không dây SP876', 'tai-nghe-khong-day-sp876', 'Tai nghe không dây SP876', 'Chưa có thông tin...', 'products/61ac60be1def5-161299154720211205134830.jpg', 5000000, 5, 20, 0, '7,8', 79, 69, '2021-12-05 13:48:30', '2021-12-05 13:48:30', 0, 1, 4, 0),
(37, 'Samsung Galaxy S21 Ultra 258GB', 'samsung-galaxy-s21-ultra-258gb', 'Samsung Galaxy S21 Ultra 258GB', 'Chưa có thông tin...', 'products/61ac4f0281658-67056511220211205123250.jpg', 25000000, 4, 20, 1, '7,8', 76, 68, '2021-12-05 12:32:50', '2021-12-05 14:14:52', 0, 1, 2, 0),
(38, 'Iphone 13 Pro Max 258GB', 'iphone-13-pro-max-258gb', 'Iphone 13 Pro Max 258GB', 'Chưa có thông tin...', 'products/61ac5bef3acdf-49910227820211205132759.png', 27900000, 10, 20, 1, '7,8', 75, 67, '2021-12-05 13:27:59', '2021-12-05 14:14:42', 0, 1, 3, 0),
(39, 'Tai nghe không dây SP876', 'tai-nghe-khong-day-sp876', 'Tai nghe không dây SP876', 'Chưa có thông tin...', 'products/61ac60be1def5-161299154720211205134830.jpg', 5000000, 5, 20, 0, '7,8', 79, 69, '2021-12-05 13:48:30', '2021-12-05 13:48:30', 0, 1, 4, 0),
(40, 'Samsung Galaxy S21 Ultra 258GB', 'samsung-galaxy-s21-ultra-258gb', 'Samsung Galaxy S21 Ultra 258GB', 'Chưa có thông tin...', 'products/61ac4f0281658-67056511220211205123250.jpg', 25000000, 4, 20, 1, '7,8', 76, 68, '2021-12-05 12:32:50', '2021-12-05 14:14:52', 0, 1, 2, 0),
(41, 'Iphone 13 Pro Max 258GB', 'iphone-13-pro-max-258gb', 'Iphone 13 Pro Max 258GB', 'Chưa có thông tin...', 'products/61ac5bef3acdf-49910227820211205132759.png', 27900000, 10, 20, 1, '7,8', 75, 67, '2021-12-05 13:27:59', '2021-12-05 14:14:42', 0, 1, 3, 0),
(42, 'Tai nghe không dây SP876', 'tai-nghe-khong-day-sp876', 'Tai nghe không dây SP876', 'Chưa có thông tin...', 'products/61ac60be1def5-161299154720211205134830.jpg', 5000000, 5, 20, 0, '7,8', 79, 69, '2021-12-05 13:48:30', '2021-12-05 13:48:30', 0, 1, 4, 0),
(43, 'Samsung Galaxy S21 Ultra 258GB', 'samsung-galaxy-s21-ultra-258gb', 'Samsung Galaxy S21 Ultra 258GB', 'Chưa có thông tin...', 'products/61ac4f0281658-67056511220211205123250.jpg', 25000000, 4, 20, 1, '7,8', 76, 68, '2021-12-05 12:32:50', '2021-12-05 14:14:52', 0, 1, 2, 0),
(44, 'Iphone 13 Pro Max 258GB', 'iphone-13-pro-max-258gb', 'Iphone 13 Pro Max 258GB', 'Chưa có thông tin...', 'products/61ac5bef3acdf-49910227820211205132759.png', 27900000, 10, 20, 1, '7,8', 75, 67, '2021-12-05 13:27:59', '2021-12-05 14:14:42', 0, 1, 3, 0),
(45, 'Tai nghe không dây SP876', 'tai-nghe-khong-day-sp876', 'Tai nghe không dây SP876', 'Chưa có thông tin...', 'products/61ac60be1def5-161299154720211205134830.jpg', 5000000, 5, 20, 0, '7,8', 79, 69, '2021-12-05 13:48:30', '2021-12-05 13:48:30', 0, 1, 4, 0),
(46, 'Samsung Galaxy S21 Ultra 258GB', 'samsung-galaxy-s21-ultra-258gb', 'Samsung Galaxy S21 Ultra 258GB', 'Chưa có thông tin...', 'products/61ac4f0281658-67056511220211205123250.jpg', 25000000, 4, 20, 1, '7,8', 76, 68, '2021-12-05 12:32:50', '2021-12-05 14:14:52', 0, 1, 2, 0),
(47, 'Iphone 13 Pro Max 258GB', 'iphone-13-pro-max-258gb', 'Iphone 13 Pro Max 258GB', 'Chưa có thông tin...', 'products/61ac5bef3acdf-49910227820211205132759.png', 27900000, 10, 20, 1, '7,8', 75, 67, '2021-12-05 13:27:59', '2021-12-05 14:14:42', 0, 1, 3, 0),
(48, 'Tai nghe không dây SP876', 'tai-nghe-khong-day-sp876', 'Tai nghe không dây SP876', 'Chưa có thông tin...', 'products/61ac60be1def5-161299154720211205134830.jpg', 5000000, 5, 20, 0, '7,8', 79, 69, '2021-12-05 13:48:30', '2021-12-05 13:48:30', 0, 1, 4, 0),
(49, 'Samsung Galaxy S21 Ultra 258GB', 'samsung-galaxy-s21-ultra-258gb', 'Samsung Galaxy S21 Ultra 258GB', 'Chưa có thông tin...', 'products/61ac4f0281658-67056511220211205123250.jpg', 25000000, 4, 20, 1, '7,8', 76, 68, '2021-12-05 12:32:50', '2021-12-05 14:14:52', 0, 1, 2, 0),
(50, 'Iphone 13 Pro Max 258GB', 'iphone-13-pro-max-258gb', 'Iphone 13 Pro Max 258GB', 'Chưa có thông tin...', 'products/61ac5bef3acdf-49910227820211205132759.png', 27900000, 10, 20, 1, '7,8', 75, 67, '2021-12-05 13:27:59', '2021-12-05 14:14:42', 0, 1, 3, 0),
(51, 'Tai nghe không dây SP876', 'tai-nghe-khong-day-sp876', 'Tai nghe không dây SP876', 'Chưa có thông tin...', 'products/61ac60be1def5-161299154720211205134830.jpg', 5000000, 5, 20, 0, '7,8', 79, 69, '2021-12-05 13:48:30', '2021-12-05 13:48:30', 0, 1, 4, 0),
(52, 'Samsung Galaxy S21 Ultra 258GB', 'samsung-galaxy-s21-ultra-258gb', 'Samsung Galaxy S21 Ultra 258GB', 'Chưa có thông tin...', 'products/61ac4f0281658-67056511220211205123250.jpg', 25000000, 4, 20, 1, '7,8', 76, 68, '2021-12-05 12:32:50', '2021-12-05 14:14:52', 0, 1, 2, 0),
(53, 'Iphone 13 Pro Max 258GB', 'iphone-13-pro-max-258gb', 'Iphone 13 Pro Max 258GB', 'Chưa có thông tin...', 'products/61ac5bef3acdf-49910227820211205132759.png', 27900000, 10, 20, 1, '7,8', 75, 67, '2021-12-05 13:27:59', '2021-12-05 14:14:42', 0, 1, 3, 0),
(54, 'Tai nghe không dây SP876', 'tai-nghe-khong-day-sp876', 'Tai nghe không dây SP876', 'Chưa có thông tin...', 'products/61ac60be1def5-161299154720211205134830.jpg', 5000000, 5, 20, 0, '7,8', 79, 69, '2021-12-05 13:48:30', '2021-12-05 13:48:30', 0, 1, 4, 0),
(55, 'Samsung Galaxy S21 Ultra 258GB', 'samsung-galaxy-s21-ultra-258gb', 'Samsung Galaxy S21 Ultra 258GB', 'Chưa có thông tin...', 'products/61ac4f0281658-67056511220211205123250.jpg', 25000000, 4, 20, 1, '7,8', 76, 68, '2021-12-05 12:32:50', '2021-12-05 14:14:52', 0, 1, 2, 0),
(56, 'Iphone 13 Pro Max 258GB', 'iphone-13-pro-max-258gb', 'Iphone 13 Pro Max 258GB', 'Chưa có thông tin...', 'products/61ac5bef3acdf-49910227820211205132759.png', 27900000, 10, 20, 1, '7,8', 75, 67, '2021-12-05 13:27:59', '2021-12-05 14:14:42', 0, 1, 3, 0),
(57, 'Tai nghe không dây SP876', 'tai-nghe-khong-day-sp876', 'Tai nghe không dây SP876', 'Chưa có thông tin...', 'products/61ac60be1def5-161299154720211205134830.jpg', 5000000, 5, 20, 0, '7,8', 79, 69, '2021-12-05 13:48:30', '2021-12-05 13:48:30', 0, 1, 4, 0),
(58, 'Samsung Galaxy S21 Ultra 258GB', 'samsung-galaxy-s21-ultra-258gb', 'Samsung Galaxy S21 Ultra 258GB', 'Chưa có thông tin...', 'products/61ac4f0281658-67056511220211205123250.jpg', 25000000, 4, 20, 1, '7,8', 76, 68, '2021-12-05 12:32:50', '2021-12-05 14:14:52', 0, 1, 2, 0),
(59, 'Iphone 13 Pro Max 258GB', 'iphone-13-pro-max-258gb', 'Iphone 13 Pro Max 258GB', 'Chưa có thông tin...', 'products/61ac5bef3acdf-49910227820211205132759.png', 27900000, 10, 20, 1, '7,8', 75, 67, '2021-12-05 13:27:59', '2021-12-05 14:14:42', 0, 1, 3, 0),
(60, 'Tai nghe không dây SP876', 'tai-nghe-khong-day-sp876', 'Tai nghe không dây SP876', 'Chưa có thông tin...', 'products/61ac60be1def5-161299154720211205134830.jpg', 5000000, 5, 20, 0, '7,8', 79, 69, '2021-12-05 13:48:30', '2021-12-05 13:48:30', 0, 1, 4, 0),
(61, 'Samsung Galaxy S21 Ultra 258GB', 'samsung-galaxy-s21-ultra-258gb', 'Samsung Galaxy S21 Ultra 258GB', 'Chưa có thông tin...', 'products/61ac4f0281658-67056511220211205123250.jpg', 25000000, 4, 20, 1, '7,8', 76, 68, '2021-12-05 12:32:50', '2021-12-05 14:14:52', 0, 1, 2, 0),
(62, 'Iphone 13 Pro Max 258GB', 'iphone-13-pro-max-258gb', 'Iphone 13 Pro Max 258GB', 'Chưa có thông tin...', 'products/61ac5bef3acdf-49910227820211205132759.png', 27900000, 10, 20, 1, '7,8', 75, 67, '2021-12-05 13:27:59', '2021-12-05 14:14:42', 0, 1, 3, 0),
(63, 'Tai nghe không dây SP876', 'tai-nghe-khong-day-sp876', 'Tai nghe không dây SP876', 'Chưa có thông tin...', 'products/61ac60be1def5-161299154720211205134830.jpg', 5000000, 5, 20, 0, '7,8', 79, 69, '2021-12-05 13:48:30', '2021-12-05 13:48:30', 0, 1, 4, 0),
(64, 'Samsung Galaxy S21 Ultra 258GB', 'samsung-galaxy-s21-ultra-258gb', 'Samsung Galaxy S21 Ultra 258GB', 'Chưa có thông tin...', 'products/61ac4f0281658-67056511220211205123250.jpg', 25000000, 4, 20, 1, '7,8', 76, 68, '2021-12-05 12:32:50', '2021-12-05 14:14:52', 0, 1, 2, 0),
(65, 'Iphone 13 Pro Max 258GB', 'iphone-13-pro-max-258gb', 'Iphone 13 Pro Max 258GB', 'Chưa có thông tin...', 'products/61ac5bef3acdf-49910227820211205132759.png', 27900000, 10, 20, 1, '7,8', 75, 67, '2021-12-05 13:27:59', '2021-12-05 14:14:42', 0, 1, 3, 0),
(66, 'Tai nghe không dây SP876', 'tai-nghe-khong-day-sp876', 'Tai nghe không dây SP876', 'Chưa có thông tin...', 'products/61ac60be1def5-161299154720211205134830.jpg', 5000000, 5, 20, 0, '7,8', 79, 69, '2021-12-05 13:48:30', '2021-12-05 13:48:30', 0, 1, 4, 0),
(67, 'Samsung Galaxy S21 Ultra 258GB', 'samsung-galaxy-s21-ultra-258gb', 'Samsung Galaxy S21 Ultra 258GB', 'Chưa có thông tin...', 'products/61ac4f0281658-67056511220211205123250.jpg', 25000000, 4, 20, 1, '7,8', 76, 68, '2021-12-05 12:32:50', '2021-12-05 14:14:52', 0, 1, 2, 0),
(68, 'Iphone 13 Pro Max 258GB', 'iphone-13-pro-max-258gb', 'Iphone 13 Pro Max 258GB', 'Chưa có thông tin...', 'products/61ac5bef3acdf-49910227820211205132759.png', 27900000, 10, 20, 1, '7,8', 75, 67, '2021-12-05 13:27:59', '2021-12-05 14:14:42', 0, 1, 3, 0),
(69, 'Tai nghe không dây SP876', 'tai-nghe-khong-day-sp876', 'Tai nghe không dây SP876', 'Chưa có thông tin...', 'products/61ac60be1def5-161299154720211205134830.jpg', 5000000, 5, 20, 0, '7,8', 79, 69, '2021-12-05 13:48:30', '2021-12-05 13:48:30', 0, 1, 4, 0),
(70, 'Samsung Galaxy S21 Ultra 258GB', 'samsung-galaxy-s21-ultra-258gb', 'Samsung Galaxy S21 Ultra 258GB', 'Chưa có thông tin...', 'products/61ac4f0281658-67056511220211205123250.jpg', 25000000, 4, 20, 1, '7,8', 76, 68, '2021-12-05 12:32:50', '2021-12-05 14:14:52', 0, 1, 2, 0),
(71, 'Iphone 13 Pro Max 258GB', 'iphone-13-pro-max-258gb', 'Iphone 13 Pro Max 258GB', 'Chưa có thông tin...', 'products/61ac5bef3acdf-49910227820211205132759.png', 27900000, 10, 20, 1, '7,8', 75, 67, '2021-12-05 13:27:59', '2021-12-05 14:14:42', 0, 1, 3, 0),
(72, 'Tai nghe không dây SP876', 'tai-nghe-khong-day-sp876', 'Tai nghe không dây SP876', 'Chưa có thông tin...', 'products/61ac60be1def5-161299154720211205134830.jpg', 5000000, 5, 20, 0, '7,8', 79, 69, '2021-12-05 13:48:30', '2021-12-05 13:48:30', 0, 1, 4, 0),
(73, 'Samsung Galaxy S21 Ultra 258GB', 'samsung-galaxy-s21-ultra-258gb', 'Samsung Galaxy S21 Ultra 258GB', 'Chưa có thông tin...', 'products/61ac4f0281658-67056511220211205123250.jpg', 25000000, 4, 20, 1, '7,8', 76, 68, '2021-12-05 12:32:50', '2021-12-05 14:14:52', 0, 1, 2, 0),
(74, 'Iphone 13 Pro Max 258GB', 'iphone-13-pro-max-258gb', 'Iphone 13 Pro Max 258GB', 'Chưa có thông tin...', 'products/61ac5bef3acdf-49910227820211205132759.png', 27900000, 10, 20, 1, '7,8', 75, 67, '2021-12-05 13:27:59', '2021-12-05 14:14:42', 0, 1, 3, 0),
(75, 'Tai nghe không dây SP876', 'tai-nghe-khong-day-sp876', 'Tai nghe không dây SP876', 'Chưa có thông tin...', 'products/61ac60be1def5-161299154720211205134830.jpg', 5000000, 5, 20, 0, '7,8', 79, 69, '2021-12-05 13:48:30', '2021-12-05 13:48:30', 0, 1, 4, 0),
(76, 'Samsung Galaxy S21 Ultra 258GB', 'samsung-galaxy-s21-ultra-258gb', 'Samsung Galaxy S21 Ultra 258GB', 'Chưa có thông tin...', 'products/61ac4f0281658-67056511220211205123250.jpg', 25000000, 4, 20, 1, '7,8', 76, 68, '2021-12-05 12:32:50', '2021-12-05 14:14:52', 0, 1, 2, 0),
(77, 'Iphone 13 Pro Max 258GB', 'iphone-13-pro-max-258gb', 'Iphone 13 Pro Max 258GB', 'Chưa có thông tin...', 'products/61ac5bef3acdf-49910227820211205132759.png', 27900000, 10, 20, 1, '7,8', 75, 67, '2021-12-05 13:27:59', '2021-12-05 14:14:42', 0, 1, 3, 0),
(78, 'Tai nghe không dây SP876', 'tai-nghe-khong-day-sp876', 'Tai nghe không dây SP876', 'Chưa có thông tin...', 'products/61ac60be1def5-161299154720211205134830.jpg', 5000000, 5, 20, 0, '7,8', 79, 69, '2021-12-05 13:48:30', '2021-12-05 13:48:30', 0, 1, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_configuration`
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

--
-- Dumping data for table `product_configuration`
--

INSERT INTO `product_configuration` (`display`, `camera_front`, `camera_back`, `ram`, `storage`, `cpu`, `gpu`, `battery`, `sim`, `system`, `made_in`, `product_id`) VALUES
('Màn hình', 'Camera trước', 'Camera sau', 'Ram', 'Bộ nhớ', 'CPU', 'GPU', 'Dung lượng PIN', 'SIM', 'Hệ điều hành', 'Xuất xứ', 22),
('Màn hình', 'Camera trước', 'Camera sau', '', 'Bộ nhớ', 'CPU', 'GPU', 'Dung lượng PIN', 'SIM', 'Hệ điều hành', 'Xuất xứ', 23),
('Màn hình', 'Camera trước', 'Camera sau', 'Ram', 'Bộ nhớ', 'CPU', 'GPU', 'Dung lượng PIN', 'SIM', 'Hệ điều hành', 'Xuất xứ', 22),
('Màn hình', 'Camera trước', 'Camera sau', '', 'Bộ nhớ', 'CPU', 'GPU', 'Dung lượng PIN', 'SIM', 'Hệ điều hành', 'Xuất xứ', 23);

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
  `product_variant_quantity` int(11) NOT NULL,
  `product_variant_image` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
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
  `total_price` float NOT NULL,
  `color` varchar(20) NOT NULL,
  `price` float NOT NULL,
  `is_buy` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shopping_carts`
--

INSERT INTO `shopping_carts` (`cart_id`, `product_id`, `user_id`, `quantity`, `total_price`, `color`, `price`, `is_buy`, `created_at`, `updated_at`) VALUES
(49, 23, 8, 2, 55800000, '', 27900000, 1, '2021-12-05 17:28:22', '2021-12-05 17:28:25');

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
(8, 'Giàng A Sủng', 'Sủng', 'Giàng A', 'chuongkvph13392@fpt.edu.vn', '$2y$10$Xs3WbrAvYF486wfp9zPoDOQeOikx2ROirWY5q6effzCsq0KiMuBSS', NULL, NULL, NULL, 1, 'admin', 1, 1, '2021-12-05 09:18:43', '2021-12-05 09:18:43');

-- --------------------------------------------------------

--
-- Table structure for table `user_tokens`
--

CREATE TABLE `user_tokens` (
  `user_id` int(11) NOT NULL,
  `access_token` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `start_time` datetime NOT NULL DEFAULT current_timestamp(),
  `end_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tokens`
--

INSERT INTO `user_tokens` (`user_id`, `access_token`, `is_active`, `start_time`, `end_time`) VALUES
(8, 'NjFhYzIxODM4NjFmZmNodW9uZ2t2cGgxMzM5MkBmcHQuZWR1LnZu', 1, '2021-12-05 09:18:43', '2021-12-05 09:18:43'),
(8, 'NjFhYzIxODM4NjFmZmNodW9uZ2t2cGgxMzM5MkBmcHQuZWR1LnZu', 1, '2021-12-05 09:18:43', '2021-12-05 09:18:43');

-- --------------------------------------------------------

--
-- Table structure for table `user_vouchers`
--

CREATE TABLE `user_vouchers` (
  `user_id` int(11) NOT NULL,
  `voucher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
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
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `wishlist_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `categories_parent` (`parent_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comments_products` (`product_id`),
  ADD KEY `comments_users` (`user_id`);

--
-- Indexes for table `gifts`
--
ALTER TABLE `gifts`
  ADD PRIMARY KEY (`gift_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `news_users` (`user_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`option_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `users_orders` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_items` (`order_id`),
  ADD KEY `products_orders_items` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `products_brands` (`brand_id`),
  ADD KEY `products_categories` (`category_id`);

--
-- Indexes for table `product_configuration`
--
ALTER TABLE `product_configuration`
  ADD KEY `product_configuration` (`product_id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`product_variant_id`),
  ADD KEY `product_variants` (`product_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `comments_ratings` (`comment_id`);

--
-- Indexes for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `products_carts` (`product_id`),
  ADD KEY `users_carts` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD KEY `users_tokens` (`user_id`);

--
-- Indexes for table `user_vouchers`
--
ALTER TABLE `user_vouchers`
  ADD KEY `users_vouchers_fk1` (`user_id`),
  ADD KEY `users_vouchers_fk2` (`voucher_id`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`voucher_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `users_wishlists` (`user_id`),
  ADD KEY `products_wishlists` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gifts`
--
ALTER TABLE `gifts`
  MODIFY `gift_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `product_variant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `voucher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `users_orders` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `orders_items` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_product_items` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

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
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `comments_ratings` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`comment_id`) ON DELETE CASCADE;

--
-- Constraints for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  ADD CONSTRAINT `products_carts` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_carts` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD CONSTRAINT `users_tokens` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_vouchers`
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
