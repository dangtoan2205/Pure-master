-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 20, 2023 lúc 11:29 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_phppure-master`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` tinyint(2) NOT NULL DEFAULT 1,
  `fullname` varchar(60) NOT NULL,
  `lever` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `email`, `phone`, `gender`, `fullname`, `lever`, `status`, `created_at`, `updated_at`) VALUES
(1, '123Boss', '8a134c42eee93eb7cc8a57cb1278aae5', 'admin@gmail.com', '0999999999', 1, 'Boss shop', 1, 1, '2022-05-02 15:50:38', '2022-05-14 17:17:09'),
(2, 'staff', '5e4997230bf822b3240823547bd1effd', 'staff@gmail.com', '0345678945', 1, 'toan123', 2, 1, '2022-05-02 15:50:38', '2022-12-17 08:20:05'),
(6, 'Staff2', '5e4997230bf822b3240823547bd1effd', 'staff2@gmail.com', '0356565656', 0, 'toan123', 0, 1, '2022-05-04 17:02:20', '2022-05-17 09:58:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `advertise`
--

CREATE TABLE `advertise` (
  `id` int(10) UNSIGNED NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `rules` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `advertise`
--

INSERT INTO `advertise` (`id`, `manufacturer_id`, `product_id`, `photo`, `rules`, `created_at`, `deleted_at`, `updated_at`) VALUES
(6, 10, 8, '1651654037.png', 1, NULL, NULL, '2022-05-14 22:22:18'),
(7, 9, 15, '1651330264.png', 1, NULL, NULL, '2022-05-14 22:22:16'),
(8, 11, 7, '1651505024.jpg', 1, NULL, NULL, '2022-05-14 22:22:13'),
(9, 10, 8, '1651655725.jpg', 1, NULL, NULL, '2022-05-14 22:22:11'),
(16, 24, 0, '1652539729.jpg', 3, NULL, NULL, '2022-05-14 22:22:08'),
(17, 24, 0, '1652539758.jpg', 3, NULL, NULL, '2022-05-14 22:22:06'),
(18, 14, 0, '1652539831.png', 2, NULL, NULL, '2022-05-14 22:22:01'),
(19, 23, 0, '1652540356.png', 2, NULL, NULL, '2022-05-14 22:22:03'),
(20, 9, 0, '1652541662.jpg', 2, '2022-05-14 22:21:02', NULL, '2022-05-14 22:48:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_lap_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `config_laptop`
--

CREATE TABLE `config_laptop` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `name_detail` varchar(50) NOT NULL,
  `icon` varchar(150) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `config_laptop`
--

INSERT INTO `config_laptop` (`id`, `name`, `name_detail`, `icon`, `created_at`, `deleted_at`, `updated_at`) VALUES
(1, 'ram', 'Dung lượng RAM', NULL, '2022-05-09 17:03:07', NULL, '2022-05-09 17:03:07'),
(2, 'ssd', 'Ổ cứng', NULL, '2022-05-09 17:03:35', NULL, '2022-05-09 17:03:35'),
(3, 'cpu', 'Loại CPU', NULL, '2022-05-09 17:03:43', NULL, '2022-05-09 17:03:43'),
(4, 'screen', 'Kích thước màn hình', NULL, '2022-05-09 17:03:43', NULL, '2022-05-09 17:03:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `config_product_laptop`
--

CREATE TABLE `config_product_laptop` (
  `pro_laptop_id` int(11) NOT NULL,
  `config_laptop_id` int(11) NOT NULL,
  `values` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `config_product_laptop`
--

INSERT INTO `config_product_laptop` (`pro_laptop_id`, `config_laptop_id`, `values`, `created_at`, `deleted_at`, `updated_at`) VALUES
(1, 1, '8GB', '2022-05-09 21:55:53', NULL, '2022-05-09 21:55:53'),
(2, 1, '8GB', '2022-05-09 22:30:33', NULL, '2022-05-09 22:30:33'),
(3, 1, '16GB', '2022-05-10 01:21:49', NULL, '2022-05-10 01:21:49'),
(4, 1, '4GB', '0000-00-00 00:00:00', NULL, '2022-05-10 02:37:38'),
(10, 1, '8GB', '2022-05-10 02:49:00', NULL, '2022-05-10 02:49:00'),
(11, 1, '8GB', '2022-05-10 02:50:58', NULL, '2022-05-10 02:50:58'),
(15, 1, '8GB', '2022-05-14 21:57:39', NULL, '2022-05-14 21:57:39'),
(1, 2, '512GB M.2 NVMe™ PCIe® 3.0', '2022-05-09 21:55:53', NULL, '2022-05-09 21:55:53'),
(2, 2, '256GB', '2022-05-09 22:30:33', NULL, '2022-05-09 22:30:33'),
(3, 2, '512GB SSD', '2022-05-10 01:21:49', NULL, '2022-05-10 01:21:49'),
(4, 2, '512GB SSD PCle NVMe', '0000-00-00 00:00:00', NULL, '2022-05-10 02:37:38'),
(10, 2, '512GB SSD NVMe M.2 PCIe Gen 3 x 4', '2022-05-10 02:49:00', NULL, '2022-05-10 02:49:00'),
(11, 2, '512GB M.2 NVMe™ PCIe® 3.0 SSD', '2022-05-10 02:50:58', NULL, '2022-05-10 02:50:58'),
(15, 2, '512GB NVMe PCIe Gen3x4 SSD, 2 khe M.2 SSD NVMe PCIe Gen3x4', '2022-05-14 21:57:39', NULL, '2022-05-14 21:57:39'),
(1, 3, 'Intel® Core™ i5-10300H', '2022-05-09 21:55:53', NULL, '2022-05-09 21:55:53'),
(2, 3, 'Intel Core i3 Gen 11', '2022-05-09 22:30:33', NULL, '2022-05-09 22:30:33'),
(3, 3, 'M1 Pro/M1 Max', '2022-05-10 01:21:49', NULL, '2022-05-10 01:21:49'),
(4, 3, 'Intel Core i5-1135G7 2.40 GHz up to 4.20 GHz, 8MB', '0000-00-00 00:00:00', NULL, '2022-05-10 02:37:38'),
(10, 3, 'AMD Ryzen 7 4800H', '2022-05-10 02:49:00', NULL, '2022-05-10 02:49:00'),
(11, 3, 'Intel® Core™ i5-1135G7', '2022-05-10 02:50:58', NULL, '2022-05-10 02:50:58'),
(15, 3, 'AMD RyzenTM 7 5700U', '2022-05-14 21:57:39', NULL, '2022-05-14 21:57:39'),
(1, 4, '15.6 inches', '2022-05-09 21:55:53', NULL, '2022-05-09 21:55:53'),
(2, 4, '14 inches', '2022-05-09 22:30:33', NULL, '2022-05-09 22:30:33'),
(3, 4, '14.2 inches', '2022-05-10 01:21:49', NULL, '2022-05-10 01:21:49'),
(4, 4, '14 inches', '0000-00-00 00:00:00', NULL, '2022-05-10 02:37:38'),
(10, 4, '15.6 inches', '2022-05-10 02:49:00', NULL, '2022-05-10 02:49:00'),
(11, 4, '14 inches', '2022-05-10 02:50:58', NULL, '2022-05-10 02:50:58'),
(15, 4, '15.6 inches', '2022-05-14 21:57:39', NULL, '2022-05-14 21:57:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `gender` tinyint(2) NOT NULL DEFAULT 1,
  `address` varchar(200) DEFAULT NULL,
  `token` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `phone`, `status`, `gender`, `address`, `token`, `created_at`, `deleted_at`, `updated_at`) VALUES
(1, 'long3', 'long3@gmail.com', '202cb962ac59075b964b07152d234b70', '321', 1, 1, '123 meo2', NULL, '2022-05-05 16:35:47', '2022-05-14 21:03:58', '2022-05-20 16:49:09'),
(35, 'toan1', 'toan1@gmail.com', '100ed97f6f776fc4bf78f00a00e0ee19', '0963836224', 1, 1, 'Hà Nội', NULL, '2023-01-11 09:51:35', NULL, '2023-01-11 09:51:35'),
(36, 'toan2', 'toan2@gmail.com', '100ed97f6f776fc4bf78f00a00e0ee19', '0963836224', 1, 1, 'Thái Bình', NULL, '2023-01-11 09:52:22', NULL, '2023-01-11 09:52:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `forgot_password`
--

CREATE TABLE `forgot_password` (
  `customer_id` int(11) NOT NULL,
  `token` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufactures`
--

CREATE TABLE `manufactures` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `phone` char(15) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `rules` tinyint(3) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufactures`
--

INSERT INTO `manufactures` (`id`, `name`, `address`, `phone`, `photo`, `rules`, `created_at`, `deleted_at`, `updated_at`) VALUES
(5, 'Bphone', 'Việt Nam', '0202022', 'https://media.vov.vn/uploaded/rgjxainnqfs/2018_09_25/bphone_jwsl.jpg', 0, NULL, NULL, NULL),
(6, 'Xiaomi', 'Tàu', '+8912121212', 'https://cdn.sforum.vn/sforum/wp-content/uploads/2021/03/Xiaomi-Mi-Logo.jpg', 1, NULL, NULL, NULL),
(9, 'Apple', 'Mỹ', '3232323232', 'https://ontop.vn/wp-content/uploads/2021/09/cover-ontop.vn-Apple-AR-Easter-Egg-logo-.jpg', 1, NULL, NULL, NULL),
(10, 'SamSung', 'Hàn quóc', '-980004448', 'https://images.samsung.com/is/image/samsung/assets/vn/about-us/brand/logo/mo/360_197_1.png?$FB_TYPE_B_PNG$', 1, NULL, NULL, NULL),
(11, 'Oppo', 'Tàu', '-00444111', 'https://cdn.tgdd.vn/Files/2019/03/12/1154295/oppo-logo-old_600x277.jpg', 1, NULL, NULL, NULL),
(14, 'Asus', 'Tàu', '+999', 'https://phucgia.com.vn/wp-content/uploads/2020/03/logo-Asus.jpg', 2, '2022-05-09 18:44:37', NULL, '2022-05-09 18:44:37'),
(20, 'HP', 'Nhật', '+999', 'https://logos-world.net/wp-content/uploads/2020/11/Hewlett-Packard-Logo-1981-2008.png', 2, '2022-05-09 19:20:06', NULL, '2022-05-09 19:20:06'),
(22, 'Dell', 'Mỹ tho', '+888', 'https://rubee.com.vn/admin/webroot/upload/image/images/bai-viet/dell-old-logo.jpg', 2, '2022-05-09 19:34:47', NULL, '2022-05-09 19:34:47'),
(23, 'MSI', 'Tân bắc, Đài loan', '+777', 'https://logos-world.net/wp-content/uploads/2020/11/MSI-Logo.png', 2, '2022-05-09 19:36:42', NULL, '2022-05-09 19:36:42'),
(24, 'Apple(macbook)', 'mỹ tho', '+9999', 'https://ontop.vn/wp-content/uploads/2021/09/cover-ontop.vn-Apple-AR-Easter-Egg-logo-.jpg', 2, '2022-05-10 13:21:11', NULL, '2022-05-10 13:21:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name_receiver` varchar(60) NOT NULL,
  `phone_receiver` varchar(20) NOT NULL,
  `address_receiver` varchar(200) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `total_price` float NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `name_receiver`, `phone_receiver`, `address_receiver`, `status`, `total_price`, `created_at`, `deleted_at`, `updated_at`) VALUES
(3, 1, 'long3', '321', 'meo 321', 0, 30990000, '2022-04-01 08:55:37', NULL, '2022-05-01 08:55:37'),
(4, 1, 'long3', '321', '123 meo2', 1, 18290000, '2022-05-01 09:49:11', NULL, '2022-05-01 09:49:11'),
(5, 2, 'ko phai meo dau', '20999', 'meo ko o nha', 2, 91130000, '2022-05-03 10:15:34', NULL, '2022-05-03 10:15:34'),
(6, 2, 'meo duc', '242424', 'meo duc boy', 1, 10600000, '2022-05-03 17:37:00', NULL, '2022-05-03 17:37:00'),
(7, 2, 'meo', '12121', 'meo hoang', 0, 65730000, '2022-05-06 18:35:49', NULL, '2022-05-06 18:35:49'),
(13, 3, 'lucas', '+99999', '-99999', 1, 31380000, '2022-05-10 08:44:03', NULL, '2022-05-10 08:44:03'),
(14, 3, 'lucas', '+99999', '-99999', 0, 37780000, '2022-05-13 17:39:36', NULL, '2022-05-13 17:39:36'),
(15, 3, 'lucas', '+99999', '-99999', 0, 18290000, '2022-05-14 14:06:53', NULL, '2022-05-14 14:06:53'),
(16, 3, 'lucas', '+99999', 'ko quen', 0, 58300000, '2022-05-22 08:45:01', NULL, '2022-05-22 08:45:01'),
(17, 3, 'lucas', '+99999', 'quen', 1, 47070000, '2022-05-22 08:45:12', NULL, '2022-05-22 08:45:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_lp_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `product_id`, `product_lp_id`, `quantity`, `created_at`, `deleted_at`, `updated_at`) VALUES
(13, 0, 11, 2, '2022-05-10 15:44:03', NULL, '2022-05-10 15:44:03'),
(14, 0, 10, 2, '2022-05-14 00:39:36', NULL, '2022-05-14 00:39:36'),
(17, 0, 11, 3, '2022-05-22 15:45:12', NULL, '2022-05-22 15:45:12'),
(3, 8, 0, 1, '2022-05-13 09:02:23', NULL, NULL),
(5, 8, 0, 2, NULL, NULL, NULL),
(4, 9, 0, 1, '2022-05-13 09:02:23', NULL, NULL),
(7, 9, 0, 2, NULL, NULL, NULL),
(15, 9, 0, 1, '2022-05-14 21:06:53', NULL, '2022-05-14 21:06:53'),
(6, 10, 0, 2, NULL, NULL, NULL),
(5, 15, 0, 1, NULL, NULL, NULL),
(7, 15, 0, 1, NULL, NULL, NULL),
(16, 15, 0, 2, '2022-05-22 15:45:01', NULL, '2022-05-22 15:45:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `descriptions` text NOT NULL,
  `slug` varchar(200) NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `photo`, `price`, `descriptions`, `slug`, `manufacturer_id`, `created_at`, `deleted_at`, `updated_at`) VALUES
(7, 'OPPO Reno7 Z 5G5', '1651656571.jpg', 10490000, 'Khám phá thế hệ chụp chân dung mới nhất, OPPO Reno7 5G sẵn sàng cho tấm ảnh và thước phim chân dung nghệ thuật, chất lượng cao. Sức mạnh của Dimensity 900 5G, kết nối 5G và sạc 66W, điện thoại còn mở ra kỷ nguyên tốc độ, sử dụng bền lâu theo thời gian.\r\n\r\nOPPO Reno7 5G\r\n\r\nĐẳng cấp chụp ảnh chân dung ngang tầm DSLR\r\nThế hệ chụp chân dung mới Bokeh Flare của OPPO Reno7 5G tương tự với máy ảnh DSLR với khả năng xóa phông chuyên nghiệp. Giờ đây, bạn chỉ cần nhìn vào camera và tạo dáng, ảnh chân dung rạng ngời đã có OPPO Reno7 Z lo. Ngoài ra với cấu tạo 25 mức điều chỉnh khẩu độ, bạn có thể tùy chỉnh các mức khẩu độ khác nhau, dễ dàng sáng tạo ảnh chân dung hoàn hảo.\r\n\r\ncamera OPPO Reno7 5G\r\n\r\nVideo chân dung Bokeh Flare chuyên nghiệp\r\nKhông chỉ chụp ảnh Bokeh Flare, OPPO Reno7 5G cao cấp có thể quay video đẹp, chuyên nghiệp như DSLR. Sự kết hợp của AI, tối ưu tông màu da thông minh, giúp bạn thật sự nổi bật khi có mặt trong các thước phim. Chế độ này còn áp dụng được cho camera trước và camera sau, trong mọi điều kiện ánh sáng, dù ngày hay đêm.\r\n\r\ncamera OPPO Reno7 5G\r\n\r\nMang ánh sáng vào mỗi video\r\nÁnh sáng mờ ảo lãng mạn trong nhà hàng hay buổi party đêm sẽ không ảnh hưởng đến bạn. AI của OPPO Reno7 có thể nhận dạng cảnh và bật chế độ Siêu ban Đêm hoặc Live HDR, đảm bảo mỗi thước phim tươi đẹp và ý nghĩa của bạn đều được ghi lại một cách trọn vẹn, tươi sáng và sống động.\r\n\r\ncamera OPPO Reno7 5G\r\n\r\nVideo chân dung nổi bật AI tỏa sáng\r\nTrở thành tâm điểm trong video chưa bao giờ dễ dàng đến thế. Chỉ cần bạn chọn Video chân dung màu AI, OPPO Reno7 5G sẽ biến tấu màu, khung nền trắng đen và làm nổi bật chủ thể. Cả thế giới giờ đây chỉ xung quanh bạn, bạn chính là ngôi sao sáng trong kiệt tác nghệ thuật độc đáo này.\r\n\r\ncamera OPPO Reno7 5G\r\n\r\nChỉnh ảnh chân dung lung linh\r\nOPPO Reno7 5G có Chỉnh sửa Chân dung AI với 193 điểm kiểm soát, để làm bật lên vẻ rạng ngời nhưng vẫn đảm bảo các nét nguyên thủy tự nhiên. Camera có tổng công 8 tùy chọn chỉnh sửa cho camera trước, mỗi lần xuất hiện của bạn đều là lần bạn đẹp nhất.\r\n\r\ncamera OPPO Reno7 5G\r\n\r\nChi tiết sắc nét nhất có thể\r\nBộ ba camera 64MP trên OPPO Reno7 5G là trợ lý hoàn hảo cho mỗi khung hình sắc nét. Bạn có thể chụp ảnh bằng camera chính 64MP với các góc thường, camera góc rộng 8MP với các khung cảnh rộng lớn, hùng vĩ và cuối cùng là camera siêu cận 2MP ghi lại chi tiết siêu nhỏ ở khoảng cách 4cm. Kết hợp đó là camera selfie 32MP của Sony với chất ảnh chất lượng.\r\n\r\ncamera OPPO Reno7 5G\r\n\r\nOPPO Reno7 còn có khả năng chụp ảnh siêu nét với tốc độ màn trập cực ngắn 1/20ms khi chụp ngoài trời. Đồng thời, công nghệ Làm nét hình ảnh độc quyền, còn chụp được các khoảnh khắc di chuyển cực kì khó.\r\n\r\ncamera OPPO Reno7 5G\r\n\r\nVideo siêu chống rung\r\nTạm biệt những thước phim mờ ảo hay nhòe với OPPO Reno7 5G, điện thoại có khả năng siêu chống rung, để chi tiết luôn ổn định và sắc nét, dù bạn đang di chuyển. Hơn nữa, tính năng Video Khóa nét chủ thể, chỉ cần bạn chạm vào chủ thể, AI của Reno7 sẽ xử lý các phần còn lại, đảm bảo chủ thể luôn được lấy nét mà không cần lấy nét thủ công cho từng khung hình.\r\n\r\ncamera OPPO Reno7 5G\r\n\r\nẢnh siêu nét 108MP\r\nẢnh chất lượng 108MP trên OPPO Ren7 5G có khó không? Câu trả lời là không, với chế độ Ảnh siêu nét 108MP, sử dụng thuật toán siêu phân giải độc quyền, bạn sẽ dễ dàng có ảnh 108MP như bạn mong muốn. Giờ đây, hãy khám phá các chi tiết vô tận 108MP mang lại.\r\n\r\ncamera OPPO Reno7 5G\r\n\r\nThiết kế Glow tỏa sáng\r\nOPPO Reno7 tỏa sáng lung linh với thiết kế Glow cải tiến và máy siêu mỏng chỉ 7.81mm và trọng lượng 173g. OPPO Reno7 5G cung cấp hai phiên bản màu để bạn chọn lựa là Xanh Sao Băng và Đen Huyền Bí.\r\n\r\nTrong đó, Xanh Sao Băng sử dụng tạo hình bằng laser (LDI – Laser Direct Imaging) đầu tiên trong ngành, để bạn có thể ngắm nhìn các chi tiết hoa văn lung linh ở cấp độ micromet. Được biết, đây là thiết kế được lấy cảm hứng từ cơn mưa sao băng tuyệt đẹp. Đen Huyền Bí sẽ giúp bạn chìm đắm trong vũ trụ đầy sao huyền bí.\r\n\r\nthiết kế OPPO Reno7 5G\r\n\r\nMở ra không gian giải trí bất tận\r\nOPPO Reno7 5G với màn hình lớn 6.4 inch, FHD+, tần số quét 90Hz trên tấm nền AMOLED cao cấp, sẽ mở ra không gian giải trí bất tận. Mỗi chi tiết đều được tái tạo một cách chân thực nhất để bạn tận hưởng các bộ phim, game yêu thích ngay trên thiết bị nhỏ gọn. Chưa dừng lại đó, Chứng nhận Bảo vệ mắt còn giúp bảo vệ đôi mắt tối ưu và an toàn cho người dùng.\r\n\r\nMàn hình OPPO Reno7 5G\r\n\r\nHiệu năng thần tốc\r\nDimensity 900 5G trên tiến trình 5nm, xung nhịp CPU cao nhất lên tới 2.4GHz, mang tới hiệu năng mạnh mẽ, thần tốc để bạn luôn có trải nghiệm mượt mà. Thế hệ 5G, Wi-Fi 6 mới nhất cũng có mặt trên Reno7 để bạn dẫn đầu xu hướng công nghệ với kết nối nhanh chóng.\r\n\r\nHiệu năng OPPO Reno7 5G\r\n\r\nThế giới game hoàn hảo\r\nHệ thống HyperBoost cho phép ổn định tốc độ khung hình AI, ngăn ngừa độ trễ và mất tốc độ khung hình, để bạn có trải nghiệm game hoàn hảo.\r\n\r\nNgoài ra, Reno7 còn có vật liệu cách nhiệt hàng không vũ trụ Borazon, tăng khả năng cách nhiệt hơn 7% so với tấm cách nhiệt graphite. Đồng thời, hệ thống đa tản nhiệt, có sự kết hợp giữa các tấm graphite đa lớp, hệ thống làm mát chất lỏng và Borazo, giúp điện thoại luôn duy trì độ ổn định ngay cả trong các ván game cường độ gắt.\r\n\r\nGame OPPO Reno7 5G\r\n\r\nSiêu nhanh vượt trội Super VOOC 65W\r\nKhông cần phải chờ đợi quá lâu để làm đầy viên pin, chỉ cần vỏn vẹn 5 phút, bạn đã có ngay 2 giờ để chơi game. Khi cần sạc 100% pin, bạn cũng chỉ mất khoảng 31 phút, tiết kiệm thời gian tối ưu, cho cuộc sống năng động.\r\n\r\nSạc nhanh OPPO Reno7 5G\r\n\r\nPin 4.5000mAh, thỏa sức làm điều mình thích\r\nOPPO Reno7 5G có viên pin 4.500mAh để bạn sử dụng thoải mái làm điều mình thích trong cả ngày dài. Hơn nữa, chế độ Tiết kiệm pin thông minh kết hợp chế độ chờ Siêu ban đêm còn giúp Reno7 luôn giữ kết nối, mọi lúc mọi nơi.\r\n\r\nPin OPPO Reno7 5G\r\n\r\nChứng nhận TUV SUD mượt mà trong 36 tháng\r\nKhi sở hữu OPPO Reno7 5G, bạn hoàn toàn yên tâm về độ mượt. Điện thoại có Tăng cường hệ thống AI Độc quyền để mỗi thao tác diễn ra nhanh chóng. Hơn nữa, hiệu suất còn đảm bảo với chứng nhận TUV SUD từ Đức với xếp loại A.\r\n\r\nOPPO Reno7 5G', 'Màn hình	Chính: 6.43 inch, Chính: AMOLED, FHD+, 1080 x 2400 Pixels\r\nCamera sau	64.0 MP + 8.0 MP + 2.0 MP\r\nCamera Selfie	32.0 MP\r\nRAM	8 GB\r\nBộ nhớ trong	256 GB\r\nCPU	MediaTek Dimensity 900 5G\r\nGPU	Mali-', 11, NULL, NULL, NULL),
(8, 'Samsung Galaxy S22 Ultra 5G 128GB ', '1650700964.jpg', 30990000, 'Được', 'ew', 10, NULL, NULL, NULL),
(9, 'Điện thoại iPhone 12 64GB', '1650701034.jpg', 18290000, 'Phone 12 ra mắt với vai trò mở ra một kỷ nguyên hoàn toàn mới. Tốc độ mạng 5G siêu tốc, bộ vi xử lý A14 Bionic nhanh nhất thế giới smartphone, màn hình OLED tràn cạnh tuyệt đẹp và camera siêu chụp đêm, tất cả đều có mặt trên iPhone 12.\r\n\r\nĐiện thoại iPhone 12\r\n\r\nThiết kế mỏng nhẹ, nhỏ gọn và đẳng cấp\r\niPhone 12 đã có sự đột phá về thiết kế với kiểu dáng mới vuông vắn, mạnh mẽ và sang trọng hơn. Không chỉ vậy, iPhone 12 mỏng hơn 11%, nhỏ gọn hơn 15% và nhẹ hơn 16% so với thế hệ trước iPhone 11.\r\n\r\nBất ngờ hơn nữa là dù gọn hơn đáng kể nhưng iPhone 12 vẫn có màn hình 6,1 inch như iPhone 11 mà không hề bị cắt giảm. Phần viền màn hình thu hẹp tối đa cùng sự nỗ lực trong thiết kế đã tạo nên điều kỳ diệu ở iPhone 12.\r\n\r\nThiết kế iPhone 12\r\n\r\niPhone 12 có thiết kế nhỏ gọn, mỏng nhẹ và đẳng cấp\r\n\r\nCeramic Shield, bảo vệ an toàn cho mặt kính\r\niPhone 12 thể hiện sự cao cấp từ những vật liệu chế tác, bao gồm khung nhôm cứng cáp và 2 mặt kính tuyệt đẹp. Hơn thế nữa, mặt kính của iPhone 12 được bảo vệ bởi một lớp gốm (Ceramic Shield), giúp cứng hơn mặt kính của bất kỳ chiếc điện thoại nào khác. iPhone của bạn sẽ bền vững hơn tới 4 lần, khó xước hơn, mang tới cảm giác yên tâm khi sử dụng.\r\n\r\nCamera iPhone 12\r\n\r\niPhone 12 chống nước hoàn hảo\r\niPhone 12 tiếp tục có khả năng chống nước và chống bụi chuẩn IP68, nhưng giờ đây bạn đã có thể ngâm nước ở độ sâu tới 6m trong vòng 30 phút thay vì 1,5m như trước kia. Tha hồ sử dụng mà không còn bất cứ nỗi lo nào về hư hại từ nước.\r\n\r\niPhone 12 chống nước\r\n\r\nMàu sắc mới của iPhone 12\r\niPhone 12 mang đến cho bạn nhiều sự lựa chọn màu hơn bao giờ hết. Có tới 6 màu sắc iPhone 12 thời trang, bao gồm Đen, Trắng, Đỏ, Xanh lá, Xanh dương và Tím. Bạn có thể tự do thể hiện cá tính, khác biệt với phiên bản màu sắc phù hợp.\r\n\r\nNgoài ra iPhone 12 có 3 phiên bản dung lượng cho người dùng lựa chọn gồm: iPhone 12 64GB, iPhone 12 128GB và iPhone 12 256GB.\r\n\r\niPhone 12 các màu sắc\r\n\r\nTổng hợp các tùy chọn màu sắc mới trên iPhone 12\r\n\r\n5G siêu tốc, mở ra kỷ nguyên di động mới\r\niPhone 12 sẽ có hỗ trợ kết nối mạng 5G nhanh nhất hiện nay. Bạn có thể làm việc, giải trí với tốc độ mạng nhanh đáng kinh ngạc. Xem video trực tuyến, phát trực tiếp, chơi game online, gọi FaceTime HD hay làm bất cứ điều gì bạn muốn mà không hề có hiện tượng giật hình vì mạng yếu. iPhone 12 cho trải nghiệm mạng di động nhanh chưa từng thấy.\r\n\r\niPhone 12 với 5G\r\n\r\niPhone 12 sẽ có hỗ trợ kết nối 5G cho các model series\r\n\r\nApple A14 Bionic, bộ vi xử lý nhanh nhất thế giới smartphone\r\nSức mạnh của iPhone 12 vượt trội so với phần còn lại nhờ bộ vi xử lý Apple A14 Bionic, con chip nhanh nhất thế giới điện thoại hiện nay. Apple A14 Bionic là con chip đầu tiên trên thế giới sản xuất trên tiến trình 5nm, với 6 nhân CPU và 4 nhân GPU cùng 11,8 tỷ bóng bán dẫn, không chỉ cho hiệu năng tuyệt đỉnh mà còn tiết kiệm năng lượng hơn rất nhiều.\r\n\r\nApple A14 Bionic cũng được nâng cấp về khả năng học hỏi thói quen người dùng khi tăng từ 8 lên 16 lõi Neural Engine, đồng thời trang bị bộ xử lý tín hiệu hình ảnh hoàn toàn mới để iPhone 12 có thể mang đến những điều khác biệt trong cả chụp ảnh và quay phim.\r\n\r\nChip Apple A14 Bionic trên iPhone 12\r\n\r\nHiệu năng iPhone 12 có trở nên \"vô đối\" với chip Apple A14 Bionic?\r\n\r\nMàn hình OLED Super Retina XDR siêu sắc nét\r\nSo với màn hình iPhone 11, màn hình iPhone 12 đã có một sự nhảy vọt. Ngoài thiết kế viền mỏng hơn, chất lượng màn hình iPhone 12 cải thiện rõ rệt với công nghệ OLED và độ sắc nét tuyệt vời từ công nghệ Super Retina XDR.\r\n\r\nBạn sẽ được chiêm ngưỡng những hình ảnh giàu chi tiết, độ tương phản cao tới 2.000.000:1, màu sắc rực rỡ và màu đen cực sâu. Đây là màn hình iPhone đẹp nhất từ trước đến nay, khiến bạn đắm chìm trong không gian giải trí hấp dẫn.\r\n\r\nMàn hình iPhone 12 \r\n\r\nHệ thống camera mới, thách thức màn đêm\r\nCả camera góc rộng và góc siêu rộng trên iPhone 12 đều được trang bị tính năng chụp đêm Night mode, cho khả năng chụp ảnh thiếu sáng hoàn hảo.\r\n\r\nCamera chính 12MP khẩu độ lớn tới f/1.6, cho khả năng thu sáng nhiều hơn tới 27%. Dù là bạn chụp ảnh ban ngày hay dưới màn đêm, iPhone 12 cũng đều tái tạo lại độ chi tiết tuyệt vời, màu sắc chính xác và tạo nên những tác phẩm nghệ thuật.\r\n\r\ncamera iPhone 12\r\n\r\nSmart HDR 3, chụp đẹp trong mọi hoàn cảnh\r\nTính năng mới Smart HDR 3 trên iPhone 12 giúp bạn chụp ảnh đẹp trong mọi hoàn cảnh, kể cả khi điều kiện ánh sáng phức tạp như nắng gắt hay ngược sáng.\r\n\r\nNgoài ra, trí tuệ nhân tạo còn giúp nhận diện cảnh hiệu quả để điều chỉnh màu và cân bằng trắng phù hợp. Ví dụ khi bạn chụp đồ ăn, iPhone sẽ khéo léo tinh chỉnh đôi chút để món ăn trông hấp dẫn và ngon mắt hơn.\r\n\r\nchụp ảnh trên iPhone 12\r\n\r\nMột phim trường ngay trên tay bạn\r\nĐiện thoại iPhone 12 có thể quay những thước phim chuyên nghiệp, bất chấp điều kiện thiếu sáng. Hơn nữa, giờ đây bạn đã có thể quay video 4K HDR Dolby Vision, cho chất lượng như những đoạn phim truyền hình trên Netflix.\r\n\r\nTrên iPhone 12 còn có đầy đủ công cụ để chỉnh sửa, biên tập và xuất bản video nhanh chóng. Hãy thử thưởng thức đoạn phim của bạn trên màn hình lớn của TV 4K HDR, bạn sẽ thấy bất ngờ vì những gì mình làm được.\r\n\r\nQuay video trên iPhone 12\r\n\r\nSelfie trong đêm tuyệt đẹp với iPhone 12\r\nTính năng chụp đêm Night mode không chỉ áp dụng cho camera sau mà còn xuất hiện trên cả camera trước của iPhone 12. Bạn có thể tự tin selfie dù là dưới trời tối.\r\n\r\nCác tính năng khác của camera sau như Deep Fusion, Smart HDR 3, quay video 4K HDR Dolby Vision cũng đều có mặt ở camera trước, giúp camera trước iPhone 12 làm được nhiều hơn là những gì bạn nghĩ.\r\n\r\n', 'Màn hình	6.1 inch, OLED, Super Retina XDR, 2532 x 1170 Pixels\r\nCamera sau	12.0 MP + 12.0 MP\r\nCamera Selfie	12.0 MP\r\nRAM	4 GB\r\nBộ nhớ trong	64 GB\r\nCPU	Apple A14 Bionic\r\nDung lượng pin	2815 mAh\r\nThẻ sim', 9, NULL, NULL, NULL),
(10, 'Bphone A60', '1650701176.jpg', 5300000, 'WQWE', 'ew', 5, NULL, NULL, NULL),
(14, 'iPhone SE 2022 | Chính hãng VN/A', '1651137042.jpg', 12490000, 'Cầm iPhone SE 3 trên tay, bạn sẽ cảm nhận rõ ràng loạt công nghệ tối tân ẩn bên trong một thiết bị có kiểu dáng gọn nhẹ với phím home tròn quen thuộc. Sự kết hợp giữa chip xử lý A15 Bionic mạnh mẽ và kết nối 5G nhanh nhạy sẽ đem tới trải nghiệm vượt ngoài mong đợi của bạn.\r\n\r\nĐiện thoại iPhone SE 3 chính hãng\r\n\r\nKiểu dáng thân thiện, đậm bản sắc iPhone\r\niPhone SE 3 (iPhone SE 2022) phát huy những giá trị truyền thống đặc trưng của dòng điện thoại mang logo Táo khi sử dụng màn hình 4.7 inch quen thuộc, kết hợp cùng phím home tròn đã trở thành biểu tượng của dòng sản phẩm Apple. Kích cỡ thân thiện nằm gọn trong lòng bàn tay giúp chủ nhân thiết bị dễ dàng thao tác trên toàn màn hình một cách đơn giản, nhẹ nhàng.\r\n\r\niPhone SE 3 - Kiểu dáng thân thiện, đậm bản sắc iPhone\r\n\r\nApple A15 thực sự mạnh mẽ, thật sự hiệu quả\r\nCội nguồn sức mạnh mà iPhone SE 3 có được nằm ở chip Apple A15 Bionic – đây là bộ vi xử lý siêu mạnh hiện đang góp mặt trên những sản phẩm thuộc iPhone 13 series. Sự hiện diện của con chip này đảm bảo iPhone SE 2022 có thể đáp ứng trọn vẹn các tác vụ bạn mong muốn và giúp cho mọi ứng dụng đều trở nên mượt mà.\r\n\r\niPhone SE 3 - Camera tốt, xử lý ảnh hậu kỳ tuyệt vời\r\n\r\nĐắm mình vào mọi tựa game bạn yêu thích\r\nCó được nguồn hiệu năng mạnh mẽ, iPhone SE 3 tạo điều kiện để bạn thỏa thích chơi mọi tựa game mình yêu thích, đặc biệt là khi sản phẩm ghi nhận hiệu suất đồ họa nhanh hơn 1.2 lần so với phiên bản iPhone SE 2020. Thế giới giải trí của bạn sẽ trở nên phong phú và sống động, loại bỏ mọi hiện tượng giật lag khi bạn đang đắm mình trong không gian game.\r\n\r\niPhone SE 3 - Đắm mình vào mọi tựa game bạn yêu thích\r\n\r\nTrải nghiệm pin ấn tượng hơn bạn nghĩ\r\nSở hữu thân máy nhỏ nhắn, nhưng iPhone SE 3 (iPhone SE 2022) lại đem tới thời lượng trải nghiệm khiến bạn phải ngạc nhiên. Sự phối hợp nhịp nhàng giữa chip xử lý mạnh mẽ tiết kiệm năng lượng, viên pin dung lượng tốt và nền tảng iOS 15 giúp tối ưu đáng kể thời gian sử dụng giữa mỗi lần sạc. Sản phẩm được hỗ trợ sạc nhanh 20W, có thể sạc từ 0% đến 50% chỉ trong nửa tiếng ngắn ngủi.\r\n\r\niPhone SE 3 - Trải nghiệm pin ấn tượng hơn bạn nghĩ\r\n\r\nBắt kịp tốc độ thời đại với 5G\r\nVới kết nối 5G, iPhone SE 3 ghi nhận tốc độ tương tác và trải nghiệm thực sự ấn tượng trong mọi tác vụ, từ chơi game, thưởng thức các video, livestream và tải xuống những file dữ liệu nặng. Sự hỗ trợ của 5G giúp quá trình FaceTime trở nên sắc nét hơn và SharePlay mượt mà hơn. Apple đã tối ưu cơ chế hoạt động để thiết bị tự động bật/tắt 5G linh hoạt nhằm tối ưu trải nghiệm pin tốt hơn. Bạn có thể an tâm sử dụng sản phẩm trong nhiều năm tới, khi 5G phủ sóng rộng rãi tại Việt Nam.\r\n\r\niPhone SE 3 - Bắt kịp tốc độ thời đại với 5G\r\n\r\nBền bỉ nhưng không kém phần thanh lịch\r\nToàn bộ cấu trúc khung của iPhone SE 3 2022 đều được hoàn thiện từ chất liệu kim loại có độ bền cao, đồng thời đem lại trải nghiệm cầm nắm cao cấp. Hai mặt kính trước – sau không chỉ giúp ghi điểm nhờ vẻ ngoài bóng bẩy thanh lịch mà còn có khả năng chống xước cao, cực kỳ bền bỉ. Bạn có thể hoàn toàn an tâm về chất lượng khung vỏ của sản phẩm.\r\n\r\niPhone SE 3 - Bền bỉ nhưng không kém phần thanh lịch\r\n\r\nIP67 – khỏi lo về những sự cố về nước\r\niPhone SE 3 (iPhone SE 2022) ghi nhận khả năng chống nước và bụi đạt chuẩn IP67. Nhờ đó, sản phẩm dễ dàng chống chịu được sự xâm nhập của chất lỏng trước những tai nạn bất ngờ có thể xảy ra trong quá trình bạn trải nghiệm thiết bị. Đây là một tính năng cao cấp, đòi hỏi cao ở quy trình hoàn thiện và xây dựng khung vỏ, nói lên những đầu tư chăm chút kỹ lưỡng mà Apple dành cho thế hệ iPhone SE mới.\r\n\r\niPhone SE 3 - khỏi lo về những sự cố về nước\r\n\r\nCamera tốt, xử lý ảnh hậu kỳ tuyệt vời\r\nCamera chính 12MP trên iPhone SE 3 được tinh chỉnh và tối ưu để có thể bắt được những khuôn hình đẹp ưng ý ngay khi bạn muốn. Những dữ liệu thông tin hình ảnh sẽ được can thiệp bởi chip A15 Bionic để xử lý ảnh hậu kỳ tốt và cho ra những khuôn hình thực sự tuyệt vời mà bạn không cần phải tinh chỉnh thủ công hay nhờ đến sự trợ giúp của bất cứ ứng dụng bên thứ ba nào.\r\n\r\niPhone SE 3 - Camera tốt, xử lý ảnh hậu kỳ tuyệt vời\r\n\r\nChuyên nghiệp hơn với Phong Cách Nhiếp Ảnh\r\nTrong giao diện chụp ảnh của iPhone SE 3, bạn sẽ tìm thấy tính năng Phong Cách Nhiếp Ảnh – đây là bộ giao diện giúp bạn định hình được khuôn hình sẽ được tối ưu theo hướng nào. Nếu bạn muốn làm nổi bật các chi tiết, hãy ưu tiên độ tương phản cao, còn nếu muốn hình ảnh trở nên nổi bật hơn, phong cách sống động sẽ giúp ích rất nhiều cho bạn.\r\n\r\niPhone SE 3 - Chuyên nghiệp hơn với Phong Cách Nhiếp Ảnh\r\n\r\nTouch ID nhanh nhạy và quen thuộc\r\nMột trong những giá trị truyền thống của dòng iPhone được bảo lưu trên iPhone SE 3 (iPhone SE 2022) là phím home tròn trên mặt trước, đi kèm với cảm biến nhận diện vân tay Touch ID. Sự nhanh nhạy và tiện dụng của cảm biến vân tay giúp bạn dễ dàng mở khóa màn hình và thực hiện các khâu xác thực khi thanh toán online mà không cần trải qua các bước xác thực rườm rà khác.\r\n\r\niPhone SE 3 - Touch ID nhanh nhạy và quen thuộc', 'Màn hình	4.7 inch, HD, 1334 x 750 Pixels\r\nRAM	3 GB\r\nBộ nhớ trong	64 GB\r\nCPU	Apple A15 Bionic\r\nDung lượng pin	15 Giờ\r\nThẻ sim	1 - 1 eSIM, 1 Nano SIM\r\nHệ điều hành	iOS 15\r\nXuất xứ	Trung Quốc\r\nThời gian ', 9, NULL, NULL, NULL),
(15, 'iPhone 13 Pro Max 128GB | Chính hãng VN/A', '1651137488.jpg', 29150000, 'Phone 13 Pro Max xứng đáng là một chiếc iPhone lớn nhất, mạnh mẽ nhất và có thời lượng pin dài nhất từ trước đến nay sẽ cho bạn trải nghiệm tuyệt vời, từ những tác vụ bình thường cho đến các ứng dụng chuyên nghiệp.\r\n\r\niPhone 13 Pro Max\r\n\r\nĐắm chìm trong không gian màn hình lớn cực đã\r\nDù là giải trí khi xem phim, chơi game hay kiểm tra email, đọc tài liệu thì màn hình lớn tới 6,7 inch của iPhone 13 Pro Max cũng luôn cho trải nghiệm tuyệt vời nhất.\r\n\r\nKhông chỉ lớn, đây còn là màn hình chất lượng hàng đầu thế giới smartphone với tấm nền OLED tuyệt đẹp, công nghệ Super Retina XDR siêu nét và độ sáng tối đa đạt mức khó tin, lên tới 1200 nits cho nội dung HDR. Trước mắt bạn là một không gian giải trí mãn nhãn, một thiết bị di động lý tưởng để giải quyết nhanh công việc với màn hình thực sự xuất sắc.\r\n\r\nmàn hình iPhone 13 Pro Max\r\n\r\niPhone 13 Pro Max xanh lá sang trọng, bí ẩn\r\niPhone 13 Pro Max giờ đây đã khoác lên màu xanh lá Alpine Green bí ẩn mà không kém phần sang trọng. Sắc màu mới đem lại cảm nhận mới mẻ mà giúp bạn có thêm nhiều lựa chọn khi sắm sửa cho bản thân một chiếc iPhone cao cấp thế hệ mới. Cầm iPhone 13 Pro Max màu xanh lá trên tay, bạn sẽ có cảm giác như đang sử dụng phiên bản giới hạn của sản phẩm này.\r\n\r\niPhone 13 Pro Max màu xanh lá\r\n\r\nBước nhảy vọt về thời lượng pin\r\nDòng iPhone Pro Max luôn được người dùng yêu thích nhờ thời lượng pin siêu dài, tuy nhiên iPhone 13 Pro Max còn làm được nhiều hơn thế. Dung lượng pin lớn hơn, màn hình mới và bộ vi xử lý Apple A15 Bionic tiết kiệm điện hơn giúp iPhone 13 Pro Max trở thành chiếc iPhone có thời lượng pin tốt nhất từ trước đến nay.\r\n\r\nSo với iPhone 12 Pro Max, iPhone 13 Pro Max có thời gian sử dụng dài hơn 2,5 giờ. Bạn sẽ cảm nhận rõ sự khác biệt khi sử dụng thực tế, thời lượng pin iPhone 13 Pro Max thậm chí còn có thể kéo dài đến ngày thứ 3 với nhu cầu sử dụng thông thường.\r\n\r\npin iPhone 13 Pro Max\r\n\r\nSang trọng, lịch lãm và quý phái\r\niPhone 13 Pro Max có kiểu dáng sang trọng, thời thượng và sự tinh xảo đến từng đường nét. Phần khung máy cứng cáp làm từ thép không gỉ nằm giữa hai mặt kính cao cấp, trong đó phần kính bảo vệ màn hình có chất liệu gốm siêu cứng, iPhone 13 Pro Max vừa tuyệt đẹp, lại vừa vô cùng bền bỉ.\r\n\r\nHơn nữa, điện thoại còn có khả năng chống nước chuẩn IP68, cho phép bạn sử dụng mà không sợ các nguy cơ như đổ nước hay gặp trời mưa. Sẽ có 4 lựa chọn màu sắc dành cho iPhone 13 Pro Max là Xám, Vàng, Trắng và Xanh Sierra, tất cả các màu đều có khí chất riêng biệt, đẳng cấp.\r\n\r\nthiết kế iPhone 13 Pro Max\r\n\r\nSức mạnh của hệ thống camera Pro mới\r\nCả 3 camera trên iPhone 13 Pro Max đều sử dụng cảm biến mới với chất lượng ống kính hàng đầu hiện nay. Nổi bật nhất là camera chính có khẩu độ lên tới f/1.5, kích thước điểm ảnh 1.9um, những con số khó tin đối với một chiếc điện thoại di động, cho hình ảnh và video thiếu sáng tốt hơn bao giờ hết.\r\n\r\nCamera góc siêu rộng cũng được nâng cấp với khẩu độ f/1.8, cảm biến nhanh hơn, mang tới những bức ảnh góc siêu rộng tự nhiên và chân thực. Cuối cùng là camera Tele hỗ trợ zoom quang học 3x. Đặc biệt, hệ thống chống rung quang học kép có mặt trên cả camera chính và camera Tele.\r\n\r\ncamera iPhone 13 Pro Max\r\n\r\nĐiện thoại đầu tiên trên thế giới có khả năng quay video macro\r\nCamera góc siêu rộng của iPhone 13 Pro Max không chỉ chụp được những hình ảnh khung hình rộng mà còn có khả năng lấy nét ở khoảng cách chỉ 2cm, mang đến tính năng macro đầy thú vị. Bạn có thể nhìn rõ từng chi tiết nhỏ như nhụy hoa, côn trùng, đồng xu, mặt đồng hồ,...\r\n\r\nẤn tượng hơn nữa khi iPhone 13 Pro Max còn có thể quay video macro, để bạn có những thước phim như chương trình truyền hình Discovery, lưu lại cảnh thiên nhiên ở góc nhìn gần nhất.\r\n\r\n\r\n\r\nChụp đêm sáng rõ như ban ngày\r\niPhone 13 Pro Max hội tụ đủ những yếu tố để trở thành chiếc điện thoại chụp đêm xuất sắc nhất hiện nay. Khẩu độ và kích thước cảm biến siêu lớn; máy quét LiDAR chuyên dụng đi cùng chip xử lý hình ảnh ISP mới tích hợp trên Apple A15 Bionic và thuật toán phần mềm thông minh giúp thu sáng tốt hơn tới 2,2 lần ở camera chính, hơn 92% ở camera góc siêu rộng. Hơn nữa, tất cả các camera trên iPhone 13 Pro Max đều có chế độ chụp đêm, cho hình ảnh luôn rõ nét trong đêm tối.\r\n\r\nchụp đêm iPhone 13 Pro Max\r\n\r\nĐiều kỳ diệu từ camera Tele\r\nCamera Tele chỉ có mặt trên dòng iPhone Pro. Với iPhone 13 Pro Max, camera Tele có thể zoom quang học 3x, phóng to hình ảnh và video gấp 3 lần nhưng vẫn giữ nguyên chất lượng. Camera Tele còn tham gia vào tính năng chụp ảnh chân dung xóa phông, cho khả năng tách phông nền mượt mà, nổi bật chủ thể một cách tự nhiên, chế độ chân dung đêm độc đáo. Các hiệu ứng ánh sáng chuẩn studio có sẵn còn làm bức ảnh của bạn trở nên nghệ thuật hơn.\r\n\r\ncamera tele iPhone 13 Pro Max\r\n\r\nChế độ quay video xóa phông điện ảnh Cinematic\r\nGiờ đây bạn đã có thể sáng tạo những thước phim chất lượng tương đương các bom tấn điện ảnh trên chiếc điện thoại iPhone 13 Pro Max. Chế độ quay phim điện ảnh Cinemactic có thể lấy nét vào chủ thể, đồng thời làm mờ hậu cảnh và những nhân vật khác trong khung hình. Thậm chí cả trong và sau khi quay, bạn còn có thể đổi chủ thể lấy nét một cách dễ dàng. Hiệu ứng chiều sâu cùng hình ảnh nổi bật tạo thành những đoạn video đầy thú vị và sống động.\r\n\r\nvideo điện ảnh iPhone 13 Pro Max\r\n\r\nNhiếp ảnh chưa bao giờ dễ dàng đến thế\r\nNgoài việc chụp ảnh sắc nét, iPhone 13 Pro Max còn có những công cụ chỉnh sửa ảnh đơn giản và hiệu quả. Trên điện thoại có sẵn rất nhiều bộ lọc màu, đơn giản bạn chỉ cần vuốt để xem trước và áp dụng những bộ lọc màu khác nhau để có được bức ảnh đúng như ý muốn. Dù là chỉnh sửa đơn giản hay chuyên sâu, điện thoại cũng đáp ứng một cách hoàn hảo để bạn tận hưởng cảm giác như là một nhiếp ảnh gia chuyên nghiệp.\r\n\r\nselfie iPhone 13 Pro Max\r\n\r\nQuay, dựng, biên tập video ProRes\r\nBạn có thể sản xuất những bộ phim hay dự án điện ảnh chỉ bằng chiếc iPhone 13 Pro Max. Phần cứng mạnh mẽ, ống kính camera hàng đầu, nhiều tính năng và chế độ ProRes hoàn toàn mới cho phép bạn quay, dựng, biên tập video hiệu quả. Chế độ ProRes với nhiều thiết lập chuyên sâu, có thể chỉnh sửa ở ứng dụng Final Cut Pro trên máy tính Mac, tạo nên những thước phim chất lượng đáng kinh ngạc.\r\n\r\nchế độ proRES trên iPhone 13 Pro Max\r\n\r\nSelfie đẳng cấp Pro Max\r\nKhông chỉ đơn thuần đóng vai trò selfie, camera trước của iPhone 13 Pro Max còn tích hợp đầy đủ những tính năng cao cấp có mặt trên camera chính. Bạn có thể chụp ảnh chân dung xóa phông, chế độ chụp đêm, Smart HDR 4, Apple ProRAW, quay video 4K HDR Dolby Vison, chế độ điện ảnh Cinematic, video ProRes trên camera trước độ phân giải 12MP. Cũng không thể không nhắc đến tính năng nhận diện khuôn mặt Face ID an toàn và tiện lợi bậc nhất thế giới smartphone.\r\n\r\nselfie iPhone 13 Pro Max\r\n\r\nCảm nhận độ mượt trên từng ngón tay\r\niPhone 13 Pro Max lần đầu tiên trình diễn màn hình ProMotion 120Hz siêu mượt với tốc độ làm tươi nhanh gấp đôi các thế hệ trước. Tất cả những gì trên điện thoại, từ hiệu ứng chuyển cảnh cho đến thao tác vuốt chạm đều mượt mà hơn bao giờ hết.\r\n\r\nBạn có thể cảm nhận rõ rệt kể cả khi sử dụng những tác vụ thông thường hay chơi game nặng. Thậm chí màn hình iPhone 13 Pro Max còn tự động điều chỉnh tần số quét linh hoạt từ 10 đến 120Hz dựa theo tác vụ bạn đang sử dụng, hiệu ứng chuyển cảnh dựa theo tốc độ ngón tay cuộn trang của bạn để mọi thứ mượt mà đến khó tin.\r\n\r\nmàn hình iPhone 13 Pro Max\r\n\r\nHiệu năng không đối thủ\r\nApple A14 Bionic cho đến nay vẫn là con chip mạnh nhất thế giới smartphone, vì thế bạn có thể hình dung được Apple A15 Bionic trên iPhone 13 Pro Max với những nâng cấp đột phá mạnh mẽ đến mức nào. So với các đối thủ hiện tại trên thị trường, iPhone 13 Pro Max mạnh hơn về 50% ở cả CPU và GPU, mọi tác vụ phức tạp đều được xử lý trong chớp mắt, mọi game nặng đều được tái hiện với đồ họa sống động và mượt mà.\r\n\r\nKhông chỉ mang đến tốc độ cao, Apple A15 Bionic còn tích hợp bộ xử lý hình ảnh mới ISP; bảo mật an toàn dữ liệu Face ID, các thông tin cá nhân; hỗ trợ trí tuệ nhân tạo với 15,8 nghìn tỉ phép tính mỗi giây, cho phép chạy các tính năng như Cinematic hay Smart HDR 4 trơn tru và ổn định.\r\n\r\ncấu hình iPhone 13 Pro Max\r\n\r\nTốc độ mạng 5G nhanh nhất\r\nThêm một cái nhất nữa dành cho iPhone 13 Pro Max, đây là chiếc điện thoại có tốc độ mạng 5G nhanh nhất thế giới hiện tại. Với việc trang bị nhiều băng tần 5G, tương thích với nhiều nhà mạng ở các quốc gia khác nhau, iPhone 13 Pro Max luôn cho tốc độ mạng tối đa. Bạn có thể xem phim 4K mượt mà, tải tệp tin trong chớp mắt, chơi game online không độ trễ ở bất cứ đâu.', 'Màn hình	6.7 inch, OLED, Super Retina XDR, 2778 x 1284 Pixels\r\nCamera sau	12.0 MP + 12.0 MP + 12.0 MP\r\nCamera Selfie	12.0 MP\r\nRAM	6 GB\r\nBộ nhớ trong	128 GB\r\nCPU	Apple A15 Bionic\r\nGPU	Apple GPU 5 nhân\r', 9, NULL, NULL, NULL),
(17, 'Xiaomi Redmi Note 11', '1651656292.jpg', 4990000, 'Sức mạnh mới, chơi game tuyệt đỉnh\r\nXiaomi Redmi Note 11 sử dụng bộ vi xử lý mới mạnh mẽ với 8 nhân tốc độ cao, mang đến hiệu suất lý tưởng cho mọi hoạt động. Dù là chạy các tác vụ phổ biến hay những tựa game đồ họa cao, Redmi Note 11 đều hoàn thành xuất sắc nhiệm vụ. CPU mạnh hơn 5% và GPU mạnh hơn 10% chắc chắn là tin rất vui cho các game thủ. Thoải mái tận hưởng không gian gaming trong lòng bàn tay một cách mượt mà, không giật lag.\r\n\r\nSức mạnh Xiaomi Redmi Note 11\r\n\r\nĐắm chìm trong màn hình lớn siêu mượt\r\nHãy thử xem một bộ phim hay video âm nhạc yêu thích trên Xiaomi Redmi Note 11, bạn sẽ cảm nhận ngay được sự ấn tượng khó quên. Diện tích hiển thị lên tới 6,5 inch, độ phân giải Full HD+ sắc nét, đồng thời tốc độ làm mới 90Hz mượt mà đến từng thao tác, mọi hiệu ứng chuyển cảnh, màu sắc trước mắt đều đẹp mỹ mãn. Màn hình này còn có tính năng điều chỉnh ánh sáng và nhiệt độ màu thông minh, để hình ảnh luôn phù hợp với môi trường xung quanh.\r\n\r\nmàn hình Xiaomi Redmi Note 11\r\n\r\nThỏa sức sử dụng, sạc đầy trong chớp mắt\r\nMang trên mình viên pin 5000mAh và những công nghệ tiết kiệm năng lượng hàng đầu, Redmi Note 11 có thể cùng bạn chơi game đến 10 giờ hay xem phim 14 giờ liên tục. Hãy thỏa thích học tập, làm việc, liên lạc, chơi game, lướt mạng xã hội và làm mọi điều bạn muốn trên không gian hiển thị rộng lớn của sản phẩm này.\r\n\r\ncông nghệ sạc nhanh Xiaomi Redmi Note 11\r\n\r\nTrang bị công nghệ sạc nhanh hàng đầu\r\nVới Xiaomi Redmi Note 11, bạn chẳng lo gián đoạn trải nghiệm của mình bởi ngoài viên pin dung lượng lớn, sản phẩm còn sở hữu công nghệ sạc nhanh 33W ghi nhận khả năng tái tạo năng lượng đáng kinh nhạc. Chỉ với khoảng 1 tiếng chờ đợi, sản phẩm có thể nạp đầy pin từ 0% đến 100% một cách hết sức ấn tượng. Redmi Note 11 sẽ luôn đem lại trải nghiệm pin khiến bạn hài lòng.\r\n\r\nsạc nhanh Xiaomi Redmi Note 11\r\n\r\nQuay video rõ nét không ngờ\r\nCamera AI độ phân giải cực “khủng” 50MP trên Xiaomi Redmi Note 11 giúp bạn lưu giữ những bức ảnh tuyệt đẹp với ánh sáng, màu sắc và độ chi tiết tuyệt vời. Sự hiện diện của camera góc siêu rộng 8MPvà camera 2MP macro cũng góp phần giúp bạn nắm bắt nhiều khuôn hình ưng ý với góc nhìn toàn cảnh rộng rãi hoặc bắt cận từng chi tiết cực kỳ rõ ràng.\r\n\r\nsáng tạo video Xiaomi Redmi Note 11\r\n\r\nThỏa sức sáng tạo video ưng ý\r\nNắm bắt được xu hướng hiện tại là Short Video, Redmi Note 11 có rất nhiều tính năng quay video thú vị, để bạn ghi lại và chia sẻ câu chuyện với chất lượng điện ảnh, giúp chủ nhân chiếc điện thoại dễ dàng dựng video mang đậm dấu ấn cá nhân, thỏa sức thể hiện sức sáng tạo của bản thân chỉ với vài thao tác đơn giản.\r\n\r\nQuay video Xiaomi Redmi Note 11\r\n\r\nLàm đẹp toàn cảnh với camera selfie 13MP\r\nCầm Xiaomi Redmi Note 11 trên tay, bạn không còn bó hẹp bản thân vào những khung hình selfie từ camera trước, chế độ làm đẹp toàn cảnh sẽ giúp bạn nới rộng bối cảnh để thoải mái tạo dáng, căn chỉnh, sáng tạo, từ đó có được các bức ảnh thực sự ưng ý của bản thân và bạn bè.\r\n\r\nLàm đẹp toàn cảnh với Xiaomi Redmi Note 11\r\n\r\nSở hữu thân máy nhẹ nhàng, mỏng gọn\r\nRedmi Note 11 thể hiện sự tinh tế trong lòng bàn tay khi khoác lên mình thiết kế gọn gàng, sang trọng. Với trọng lượng chỉ 1,79 gram và độ dày xấp xỉ 8,1mm, phiên bản mới nhất của dòng Redmi Note series danh tiếng cho thấy phong cách thanh lịch, đem lại cảm nhận nhẹ nhàng tinh tế khi cầm nắm và trải nghiệm.\r\n\r\nthân máy Xiaomi Redmi Note 11\r\n\r\nKhoe dáng thời trang qua sắc màu tinh tế\r\nPhiên bản Redmi Note 11 lên kệ tại thị trường Việt tạo ấn tượng với hai phiên bản màu sắc là Xanh và Xám. Cả hai đều mang tới sắc thái đậm chất thanh lịch về cảm quan thẩm mỹ. Nhà sản xuất Xiaomi đã tối ưu các tone màu để tạo hiệu ứng chuyển sắc khi chúng ta nghiêng máy dưới các góc độ ánh sáng khác nhau, cho thấy sự tinh tế và nói lên phong cách thời trang đậm nét.', 'Màn hình	6.43 inch, AMOLED, FHD+, 1080 x 2400 Pixels\r\nCamera sau	50.0 MP + 8.0 MP + 2.0 MP + 2.0 MP\r\nCamera Selfie	13.0 MP\r\nRAM	4 GB\r\nBộ nhớ trong	128 GB\r\nCPU	Snapdragon 680\r\nGPU	Adreno 610\r\nDung lượn', 6, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_laptop`
--

CREATE TABLE `product_laptop` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `descriptions` text NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_laptop`
--

INSERT INTO `product_laptop` (`id`, `name`, `photo`, `price`, `descriptions`, `manufacturer_id`, `created_at`, `deleted_at`, `updated_at`) VALUES
(1, 'Laptop Asus Gaming TUF FX506LH HN188W', '1652105662.jpg', 16990000, 'Laptop ASUS Gaming TUF FX506LH-HN188W - Chiếc máy gaming giá rẻ\r\nLaptop ASUS TUF Gaming F15 FX506LH-HN188W là laptop chuẩn gaming và đây sẽ là dòng máy không làm mọi người dùng phải thất vọng vì thông số cấu hình và tính năng của máy. Hãy cùng đi sâu hơn vào những con số lý tưởng laptop Asus Gaming bên dưới nội dung dưới đây nhé.\r\n\r\nChuẩn gaming nhẹ nhàng nhưng bền bỉ\r\nLaptop ASUS Gaming TUF FX506LH-HN188W có trọng lượng vào khoảng 2.2kg. Có thể thấy đây là mẫu thiết kế tuy không quá nhẹ như những chiếc máy phổ thông nhưng gần như là hoàn hảo dành cho một mẫu laptop gaming.\r\n\r\nLaptop ASUS Gaming TUF FX506LH-HN188W\r\n\r\nChưa kể, laptop ASUS Gaming TUF FX506LH-HN188W còn vượt qua được những thử nghiệm MIL-STD-810G nghiêm ngặt bao gồm phơi nhiễm bức xạ mặt trời, độ cao và nhiệt độ cao. Vì thế mà độ bền của laptop này bền bỉ hơn bao giờ hết.\r\n\r\nMàn hình siêu mỏng, bứt phá hiệu năng\r\nLaptop ASUS TUF F15 FX506LH-HN188W được sử dụng màn hình kích thước 15.6 inches Full HD IPS đi kèm màn hình Nano-Edge mới với viền màn hình siêu mỏng, gói gọn trong 6.5 mm giúp mở rộng thêm không gian hiển thị lên nhiều lần.\r\n\r\nLaptop ASUS Gaming TUF FX506LH-HN188W\r\n\r\nNgoài ra, laptop ASUS TUF F15 FX506LH-HN188W được cung cấp hiệu năng bởi con chip Intel Core i5-10300H, xung nhịp tối đa 4.5GHz 4 nhân và 8 luồng. Đây là chip có hiệu năng mạnh mẽ giúp người sử dụng chạy trên trên mọi tựa game với lối đồ họa khác nhau hay đảm nhận các tác vụ văn phòng mượt mà.\r\n\r\nKết hợp cùng với đó là CPU mạnh mẽ được gia cố bởi NVIDIA GeForce GTX 1650 4GB GDDR6, góp phần tạo nên chất lượng của laptop. Điều này còn giúp cho laptop có khả năng phản hồi cao với các tác vụ đồ họa nặng với hình ảnh đầu ra mượt mà nhất.\r\n\r\nMua ngay laptop ASUS Gaming TUF FX506LH-HN188W tại CellphoneS\r\nLaptop ASUS Gaming TUF FX506LH-HN188W đang là phiên bản được bán chạy nhất hiện nay và nhận được nhiều lời khen có cánh. Hãy đến ngay cửa hàng CellphoneS để được tận tay trải nghiệm và tư vấn sản phẩm trước khi đặt mua nhé.', 14, '2022-05-09 21:14:22', NULL, '2022-05-09 21:14:22'),
(2, 'Laptop Dell Insprion 14 5406-3661SLV Nhập khẩu chính hãng', '1652109885.jpg', 13990000, 'Laptop Dell insprion 14 5406-3661SLV – Màn hình cảm ứng tiện lợi\r\nLaptop Dell insprion 14 5406-3661SLV là một sản phẩm thuộc thương hiệu Dell với màn hình cảm ứng tiện lợi cùng hiệu năng vượt trội. Chiếc laptop Dell Inspiron này hứa hẹn mang lại những trải nghiệm dùng mượt mà cho người sử dụng.\r\n\r\nThiết kế nhỏ gọn, màn hình hỗ trợ cảm ứng\r\nLaptop Dell insprion 14 5406-3661SLV sở hữu một thiết kế vô cùng nhỏ gọn. Laptop với màn hình 14 inch, độ phân giải cao mang lại khả nang hiển thị rõ nét. Màn hình trên mẫu laptop chất lượng này còn hỗ trợ cảm ứng nhờ đó người dùng có thể điều khiển một cách tiện lợi.\r\n\r\nLaptop Dell insprion 14 5406-3661SLV\r\n\r\nVề thiết kế bên ngoài, Dell insprion 14 5406-3661SLV được trang bị một thiết kế trang nhã với tone màu bạc sang trọng. Bàn phím rút gọn với hành trình phím sâu, mang lại trải nghiệm đánh máy thoải mái.\r\n\r\nHiệu năng ổn định với chip Intel i3, bộ nhớ RAM lớn\r\nVề cấu hình, Dell insprion 14 5406-3661SLV được trang bị con chip Intel thế hệ 11, kết hợp với bộ nhớ RAM lớn cùng ổ cứng SSD tốc độ đọc – ghi cao. Laptop Dell insprion 14 5406-3661SLV cho một trải nghiệm dùng ổn định ở các tác vụ cơ bản.\r\n\r\nLaptop Dell insprion 14 5406-3661SLV\r\n\r\nVề thời lượng sử dụng, laptop Dell insprion 14 5406-3661SLV được trang bị viên pin mang lại thời gian sử dụng lâu ấn tượng.\r\n\r\nMua ngay laptop Dell insprion 14 5406-3661SLV chính hãng tại CellphoneS\r\nLaptop Dell insprion 14 5406-3661SLV với thiết kế mỏng nhẹ, giá cả phải chăng. Hiện mẫu laptop Dell giá rẻ chất lượng này được bán chính hãng với nhiều khuyến mãi tại hệ thống bán lẻ CellphoneS.', 22, '2022-05-09 22:24:45', NULL, '2022-05-09 22:24:45'),
(3, 'Macbook Pro 14 inch 2021 | Chính hãng Apple Việt Nam', '1652115189.jpg', 49990000, 'Macbook Pro 14 inch - Chiếc Macbook đáng mong đợi nhất 2021\r\nKế thừa những tinh hoa từ đời MacBook tốt nhất cùng với những nâng cấp đáng kể trong nhiều năm qua, Macbook Pro 14 inch dự kiến sẽ là mẫu laptop làm cho giới công nghệ \"phát sốt\", cũng như là cỗ máy xử lý công việc tối ưu hiệu quả.\r\n\r\nThiết kế lưng máy phẳng tối giản, màn hình XDR Retina 14 inch rực rỡ\r\nMacbook Pro 14 inch\r\n\r\nMáy sẽ mang kiểu dáng được Apple tái thiết kế lại cho dòng MacBook Pro năm 2021. MacBook Pro 14 inch 2021 sẽ được làm phẳng tối giản ở các cạnh nhằm tạo vẻ hiện đại cho máy.\r\n\r\nĐặc biệt, máy sẽ được trang bị khe cắm thẻ SDXC. Đây chính là điểm ưu đối với các nhiếp ảnh gia hoặc người dùng không chuộng cổng USB-C để sao lưu dữ liệu.\r\n\r\nMacbook Pro 14 2021 sẽ có màn hình kích thước 14 inch và sử dụng công nghệ màn hình Liquid Retina XDR tiên tiến. Tấm nền sẽ cải thiện độ sáng và độ bão hòa trên màn hình một cách đáng kể, qua đó giúp cho những công việc thiết kế đồ họa hay giải trí trở nên tốt hơn.\r\n\r\nBộ vi xử lý hiệu năng mạnh mẽ cần thiết cho mọi công việc\r\nMacbook Pro 14 inch\r\n\r\nThời gian gần đây Apple đã tự mình phát triển thành công bộ vi xử lý riêng, mang tên Apple M1 Pro chip, cho các dòng MacBook của hãng. Và đối với MacBook Pro 14 inch 2021, Apple mang đến cho dòng máy này con chip Apple M1 Pro Chip - thế hệ nối tiếp của Apple M1 trước đó.\r\n\r\nChip Apple có lõi bên trong và kết hợp với chip đồ họa riêng biệt mạnh gấp nhiều lần trước đó, giúp cho máy hoàn toàn phù hợp để sử dụng phần mềm đồ họa nặng, cũng như vận hành mượt mà những tựa game cấu hình cao.\r\n\r\nMáy được Apple trang bị công nghệ hiện đại chứa đựng RAM cùng vị trí như GPU và CPU, do đó mà với dung lượng RAM ổn định, chiếc máy vẫn sẽ vận hành với hiệu năng tốt nhất.\r\n\r\nNgoài ra, cũng đáng chú ý đó là Mac Pro 2021 14 inch sẽ hoàn toàn tương thích với công nghệ Wi-Fi 6 mới nhất. Bởi vì các đời MacBook Pro chạy chip M1 trước đó vốn đã có sẵn Wi-Fi 6, nên sẽ không ngạc nhiên khi MacBook Pro 14 2021 cũng được lắp đặt khả năng kết nối mới nhất này.\r\n\r\nThời lượng pin đáp ứng làm việc và giải trí\r\nMacbook Pro 14 inch\r\n\r\nHẳn bạn còn nhớ MacBook Pro chạy chip M1 trước đó có thời lượng sử dụng lên đến nhiều giờ. Vì thế bạn hoàn toàn yên tâm về thời gian sử dụng, bởi MacBook Pro 2021 14 inch sẽ có viên pin cung cấp cho máy khi hoạt động liên tục. Kết hợp cùng với khả năng giảm lượng pin tiêu thụ trên chip, có thể khẳng định thời lượng pin trên MacBook Pro 14 inch 2021 sẽ làm hài lòng tất cả người dùng.\r\n\r\nNgoài ra, cũng đáng chú ý rằng âm thanh trên Macbook Pro 14 inch cũng được nâng cấp đáng kể. Âm thanh của máy được tinh chỉnh nhằm tạo âm thanh cân bằng hơn, bass sâu hơn, và tích hợp microphone chống ồn giúp cho cuộc trò chuyện video call trở nên suôn sẻ & rõ tiếng.\r\n\r\nHiệu năng tản nhiệt ổn định, tản nhiệt hiệu quả\r\nMacbook Pro 14 inch\r\n\r\nPhần tản nhiệt chính với cấu trúc quạt bên trong, cũng như bảng mạch chủ tạo không gian thoát nhiệt hiệu quả hơn. Nhờ đó, bạn có thể yên tâm sử dụng MacBook Pro 14 inch và giải trí hoặc làm việc đồ họa nặng mà không phải lo nóng máy. Hệ thống tản nhiệt sẽ làm cho trải nghiệm dùng máy của bạn ổn định hơn nhiều lần.\r\n\r\nMột chi tiết khác cũng đáng chú ý đó là cổng MagSafe. Apple đã quyết định mang cổng MagSafe lên dòng MacBook Pro mới, mà khởi đầu chính là MacBook Pro 14 inch. \r\n\r\nHơn nữa, với sự phổ biến của MagSafe đối với người dùng iPhone, không ngạc nhiên khi sắp tới Apple sẽ trang bị cổng MagSafe cho MacBook Pro 2021 14 inch để đảm bảo người dùng có thể sử dụng cùng loại phụ kiện cho nhiều thiết bị.\r\n\r\nMua Macbook Pro 14 inch 2021 tại CellphoneS\r\nCó thể thấy, đây hứa hẹn sẽ là chiếc laptop hấp dẫn nhất trong năm 2021, và sẽ là thiết bị đồng hành cùng bạn trong mọi công việc. Để sớm có ngay trong tay chiếc Macbook Pro 14 inch 2021 chính hãng Apple Việt Nam với giá ưu đãi cùng nhiều phần quà hấp dẫn, bạn hãy đến với hệ thống CellphoneS và đặt trước ngay.\r\n\r\nHệ thống CellphoneS mang đến cho bạn loạt sản phẩm mới nhất đến từ Apple và các thương hiệu điện tử đình đám hiện nay. Bạn có thể đến trực tiếp cửa hàng CellphoneS gần nhất tại TPHCM và HN để trải nghiệm sản phẩm, hoặc gọi đến hotline 1800.2097 để được hướng dẫn cách đặt trước Macbook Pro 14 inch.', 24, '2022-05-09 23:53:09', NULL, '2022-05-09 23:53:09'),
(4, 'Laptop HP 240 G8 3D0A4PA', '1652121673.jpg', 16890000, 'Laptop HP 240 G8 3D0A4PA- Hiệu năng mạnh mẽ vượt trội\r\nLaptop HP 240 G8 3D0A4PA là dòng sản phẩm máy tính xách tay cao cấp được thiết kế với hiệu năng mạnh mẽ, hứa hẹn sẽ mang đến cho người dùng khám phá những giờ phút chơi game tuyệt vời và ngập tràn cảm hứng.\r\n\r\nTrọng lượng nhỏ gọn, thiết kế nguyên khối sang trọng\r\nLaptop HP 240 G8 3D0A4PA được thiết kế với thân máy mỏng, viền màn hình siêu mỏng mang đến cho người dùng sự tiện lợi khi được hãng thiết kế với kích thước nhỏ gọn chỉ 14 inch IPS Full HD. Nhờ đó mà trọng lượng của chiếc HP này khá nhỏ gọn với 1.47kg giúp người dùng dễ dàng di chuyển hơn.\r\n\r\nTrọng lượng nhỏ gọn, thiết kế nguyên khối sang trọng\r\n\r\nToàn bộ vỏ bọc bên ngoài chiếc laptop HP 240 G8 3D0A4PA được thiết kế nguyên khối với gam màu bạc mang lại sự sang trọng, hiện đại phù hợp với mọi không gian làm việc của bạn. Chiếc laptop được bảo vệ bởi lớp vỏ ngoài chắc chắn tránh được các tác động bên ngoài như va chạm, trầy xước,...\r\n\r\nHiệu năng mạnh mẽ vượt trội, hệ điều hành Windows 10\r\nLaptop HP 240 G8 3D0A4PA được chính hãng này trang bị cho con chip Intel thế hệ mới mang đến hiệu năng cực tốt. Với tốc độ xung nhịp cao hỗ trợ tối đa người dùng khi thao tác với các tác vụ nâng cao.\r\n\r\nLaptop HP 240 G8 3D0A4PA là một trong những sản phẩm laptop hoạt động mạnh mẽ được hãng thiết kế hỗ trợ bộ ram DDR4 có dung lượng vừa phải giúp bạn hoàn toàn có thể trải nghiệm được nhiều tính năng, phần mềm mượt mà.\r\n\r\nHiệu năng mạnh mẽ vượt trội, hệ điều hành Windows 10\r\n\r\nChiếc laptop HP 240 G8 3D0A4PA được trang bị  hệ điều hành Windows 10 giúp bạn có thể sử dụng những phần mềm game cao cấp.\r\n\r\nMua ngay Laptop HP 240 G8 3D0A4PA chính hãng tại CellphoneS\r\nLaptop HP 240 G8 3D0A4PA hiện đã được chính thức mở bán tại hệ thống cửa hàng CellphoneS với khá nhiều ưu đãi hấp dẫn. Khi mua hàng tại đây, bạn sẽ nhận được hỗ trợ bảo hành sản phẩm lâu dài. Vậy các bạn hãy ghé thăm cửa hàng của chúng tôi ngay từ bây giờ bạn nhé!', 20, '2022-05-10 01:41:13', NULL, '2022-05-10 01:41:13'),
(10, 'Laptop Asus gaming Rog Strix G15 G513IH-HN015W', '1652125707.jpg', 18890000, 'Laptop Asus gaming Rog Strix G15 G513IH-HN015W - Cấu hình mạnh mẽ chiến game\nAsus ROG Strix G15 G513IH-HN015TW là chiếc laptop có cấu hình mạnh mẽ, đáp ứng được hầu hết các tựa game trên thị trường hiện nay. Ngay cả khi hoạt động trong nhiều giờ liền máy vẫn khá mát mẻ do có hệ thống tản nhiệt cao cấp. Nếu bạn là một game thủ hay người dùng muốn tìm máy có cấu hình cao thì đừng bỏ qua chiếc laptop Asus chất lượng này.\n\nThiết kế mạnh mẽ\nAsus ROG Strix G15 G513IH-HN015TW có ngoại hình vô cùng mạnh mẽ với màu sắc trang nhã. Khung máy có kích thước nhỏ hơn đến 7% so với thế hệ trước giúp bạn có thể chơi bất cứ tựa game nào mà bạn muốn. \n\nThiết kế mạnh mẽ\n\nNhững đường cắt hay biểu tượng trên máy cũng được thiết kế tinh tế. Dù đặt ở bất cứ vị trí nào máy cũng cực kỳ thu hút và ấn tượng. Hệ thống đèn chiếu sáng mặt đáy cùng hệ thống Aura Sync nổi bật từ logo kim loại của ROG càng khiến Asus ROG Strix G15 thu hút hơn.\n\nĐèn LED RGB tỏa sáng rực rỡ\nHệ thống đèn LED nhiều màu sắc vừa có khả năng tăng cường độ bảo mật đèn LED vừa tạo nên hiệu ứng ánh sáng nổi bật tại mắt đáy. Mặt lưng được làm bằng chất liệu nhôm cứng cáp cho cảm giác khung máy trở nên bóng bẩy hơn. Phần chiếu nghỉ tay được phủ bằng soft-touch cho cảm giác khá dễ chịu và thoải mái. \n\nĐèn LED RGB tỏa sáng rực rỡ\n\nHệ thống tản nhiệt tốt\nAsus ROG Strix G15 G513IH-HN015TW có hệ thống tản nhiệt siêu khủng. Với keo tản nhiệt kim loại lỏng trên CPU máy sở hữu khả năng làm mát vô cùng tuyệt vời. So với phương pháp làm mát truyền thống thì phương pháp này có tính vượt trội hơn nhiều lần.\n\nHệ thống tản nhiệt tốt\n\nChúng hoạt động theo nguyên tắc, đi lên đến 6 ống đồng và 4 khe tản nhiệt có kích thước lớn. Lúc này ROG Strix series  sẽ hoạt động mạnh, làm mát nhưng rất êm ái. Độ ồn ở mức khá thấp giúp cho game thủ không cảm thấy bị phân tâm. Ngay cả khi chơi liên tục trong nhiều giờ đồng hồ, máy cũng nóng lên không đáng kể. Đây là một trong những tính năng được rất nhiều game thủ yêu thích.\n\nBàn di chuột lớn hơn\nBàn di chuột của Asus ROG Strix G15 G513IH-HN015TW R7 có diện tích lớn hơn. Việc này thuận tiện hơn khi bạn cần sử máy hàng ngày. Thiết kế này giúp bạn có không gian lớn hơn để làm việc. Khi thực hiện các thao tác, động tác độ chính xác sẽ cao hơn và cảm giác bàn tay được thoải mái hơn nhiều lần. Bàn di chuột cứng được phủ một lớp nhám mang đến cảm giác mềm mại; mượt mà khi chạm vào. \n\nBàn di chuột lớn hơn\n\nChiến game siêu mượt\nKhả năng chiến game của Asus ROG Strix G15 G513IH-HN015TW được đánh giá rất xuất sắc. Với màn hình FHD 144Hz cùng Adaptive-Sync giúp loại bỏ hiện tượng xé viền. Không chỉ vậy, nhà sản xuất luôn chú trọng đến trải nghiệm cho người dùng khi thiết kế viền chỉ mỏng 4,5mm ở 3 cạnh. Bạn hoàn toàn tập trung vào những trận chiến mà không bị bất cứ yếu tố nào làm phân tâm.\n\nChiến game siêu mượt\n\nMua ngay laptop Asus ROG Strix G15 G513IH-HN015TW chính hãng tại CellphoneS\nVới thiết kế đẹp mắt, hiệu năng mạnh mẽ, hệ thống tản nhiệt siêu khủng... laptop Asus ROG Strix G15 G513IH-HN015TW là một trong những chiếc laptop gaming mà game thủ nào cũng mong muốn sở hữu. Nếu bạn đang quan tâm đến mẫu laptop này hãy đến ngay CellphoneS để trải nghiệm và mua được hàng chính hãng cùng hàng ngàn ưu đãi hấp dẫn khác.', 14, '2022-05-10 02:48:27', NULL, '2022-05-10 02:48:27'),
(11, 'Laptop Asus Vivobook A415EA EB1474W', '1652125833.jpg', 15690000, 'Laptop Asus VivoBook A415EA EB1474W - Thiết kế hiện đại, hiệu năng tối ưu\r\nLaptop Asus VivoBook A415EA EB1474W được hãng Asus cho ra mắt đóng vai trò là người bạn đồng hành đắc lực trong laptop học tập - văn phòng. Được sở hữu lối thiết kế đơn giản nhưng cũng rất thanh lịch, với những thông số kỹ thuật khá ổn định, cùng mình tìm hiểu thêm ở bài viết dưới đây nhé.\r\n\r\nThiết kế gọn nhẹ và thanh lịch, nắp lưng chắc chắn\r\nLaptop Asus VivoBook A415EA EB1474W được sở hữu với thiết kế gọn nhẹ và thanh lịch có độ mỏng 17.9 mm và chỉ 1.4 kg sẽ khẳng định tiện lợi của sản phẩm, bạn dễ dàng bỏ vừa balo mang đi học tập hoặc đi làm việc khắp mọi nơi. Nắp lưng của laptop được hoàn thiện đơn giản chắc chắn nhưng vẫn có tính thẩm mỹ.\r\n\r\nThiết kế gọn nhẹ và thanh lịch, nắp lưng chắc chắn\r\n\r\nHiệu năng tối ưu nâng cao hiệu suất công việc, ổ cứng hiện đại  \r\nLaptop Asus VivoBook A415EA EB1474W có hiệu năng tối ưu cùng bộ CPU Intel Core i5 thế hệ thứ 11 hiện đại xung nhịp trung bình 2.4 GHz đạt tối ưu đến 4.2 GHz, mọi thao tác sẽ mượt mà và hiệu quả hơn, giúp nâng cao hiệu suất công việc.\r\n\r\nHiệu năng tối ưu nâng cao hiệu suất công việc, ổ cứng hiện đại  \r\n\r\nLaptop còn được trang bị ổ cứng hiện đại SSD 512GB NVMe PCIe giúp nâng cao tốc độ khởi động ứng dụng nhanh chóng, tiết kiệm được thời gian, hiệu quả năng suất của công việc sẽ được cải thiện rất đáng kể.\r\n\r\nMua laptop Asus VivoBook A415EA EB1474W chất lượng tại CellphoneS\r\nNếu bạn đang chọn tìm mua laptop Asus VivoBook A415EA EB1474W ở đâu uy tín, chất lượng thì của hàng hệ thống CellphoneS sẽ là nơi sáng giá dành cho bạn.', 14, '2022-05-10 02:50:33', NULL, '2022-05-10 02:50:33'),
(15, 'Laptop MSI Modern A5M 239VN', '1671239933.jpg', 16690000, 'Laptop MSI Modern A5M 239VN  - Hiện đại, tản nhiệt mạnh mẽ\r\nLaptop MSI Modern A5M 239VN là sản phẩm thuộc thương hiệu MSI, do đó laptop sở hữu nhiều ưu điểm của thương hiệu laptop chất lượng này như thiết kế nhỏ gọn, hiệu năng vượt trội. Hãy cùng tìm hiểu chi tiết hơn về  Modern A5M 239VN qua bài viết.  \r\n\r\nThiết kế mỏng nhẹ, công nghệ tản nhiệt Cooler Boost 3 độc quyền\r\nLaptop MSI Modern A5M 239VN được trang bị cho mình một bộ vi xử lý AMD Ryzen 7 với 8 nhân đem lại một hiệu năng giúp máy hoạt động một cách mạnh mẽ hơn bao giờ hết, đặc biệt ở các tác vụ đa nhiệm.\r\n\r\nThiết kế mỏng nhẹ, công nghệ tản nhiệt Cooler Boost 3 độc quyền\r\n\r\nModern 15 được trang bị cho riêng mình công nghệ tản nhiệt Cooler Boost 3 độc quyền của MSI, với 2 quạt được thiết kế riêng biệt và 3 ống dẫn nhiệt, vượt trội hơn rất nhiều so với các đối thủ cạnh tranh trong phân khúc, giữ cho máy luôn mát mẻ ngay cả khi chạy các chương trình hay ứng dụng nặng.\r\n\r\nWi-Fi 6 ổn định, pin dung lượng lớn, hỗ trợ sạc nhanh\r\nLaptop MSI Modern A5M 239VN được trạng bị kết nối wifi chuẩn Wi-Fi 6 (802.11ax) mang lại khả năng kết nối mạng không dây ổn định hơn hết và với cùng tốc độ cao gấp 3 lần so với Wi-Fi 5. Ngoài ra,  Wi-Fi 6 còn giảm thiểu hiện tượng nghẽn kết nối khi có nhiều thiết bị cùng sử dụng cùng chung băng tần.\r\n\r\nWi-Fi 6 ổn định, pin dung lượng lớn, hỗ trợ sạc nhanh\r\n\r\nMSI cũng trang bị cho Modern A5M 239VN viên pin dung lượng lớn cùng công nghệ sạc nhanh giúp laptop có thể hoạt động nhiều giờ.\r\n\r\nMua ngay laptop MSI Modern A5M 239VN giá ưu đãi tại CellphoneS\r\nĐể có thể sở hữu ngay chiếc laptop MSI Modern A5M 239VN chất lượng này thì bạn cũng không nên bỏ qua một địa điểm mua hàng uy tín, chất lượng là CellphoneS nhé!', 23, '2022-05-14 21:57:11', NULL, '2022-05-14 21:57:11');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `advertise`
--
ALTER TABLE `advertise`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manufacturer_id` (`manufacturer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `product_lap_id` (`product_lap_id`);

--
-- Chỉ mục cho bảng `config_laptop`
--
ALTER TABLE `config_laptop`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `config_product_laptop`
--
ALTER TABLE `config_product_laptop`
  ADD PRIMARY KEY (`config_laptop_id`,`pro_laptop_id`),
  ADD KEY `pro_laptop_id` (`pro_laptop_id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Chỉ mục cho bảng `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_ibfk_1` (`customer_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`product_id`,`order_id`,`product_lp_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `products_ibfk_1` (`manufacturer_id`);

--
-- Chỉ mục cho bảng `product_laptop`
--
ALTER TABLE `product_laptop`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_laptop_ibfk_1` (`manufacturer_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `advertise`
--
ALTER TABLE `advertise`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT cho bảng `config_laptop`
--
ALTER TABLE `config_laptop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
