-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 22, 2023 lúc 03:25 AM
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
-- Cơ sở dữ liệu: `store`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Aya', 'dsg@gmail.com', '$2y$10$4298tk2c8TIWUlk9rMyINevbmCOEgGzW2dR8/ikXWYiJ7I5iwN/su');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_title`) VALUES
(1, 'Adidas'),
(2, 'Uniqlo'),
(3, 'Nike'),
(4, 'Madewell'),
(5, 'Zara'),
(6, 'Mango'),
(7, 'Gumac'),
(8, 'Khác');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `category_title`) VALUES
(13, 'Áo'),
(16, 'Trang sức'),
(17, 'Quần'),
(18, 'Đồ mùa hè - Đồ biển'),
(19, 'Phụ kiện'),
(20, 'Đồ Âu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_pending`
--

CREATE TABLE `order_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_pending`
--

INSERT INTO `order_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(1, 1, 1636815833, 9, 1, 'chưa giải quyết'),
(2, 3, 62808901, 9, 1, 'chưa giải quyết'),
(3, 3, 283410289, 13, 1, 'chưa giải quyết'),
(4, 3, 48334149, 11, 3, 'chưa giải quyết'),
(5, 3, 148497574, 11, 1, 'chưa giải quyết'),
(6, 3, 1489743980, 11, 100000, 'chưa giải quyết'),
(7, 3, 1708288190, 13, 1, 'chưa giải quyết'),
(8, 3, 1223407983, 10, 2, 'chưa giải quyết'),
(9, 3, 1896612416, 9, 2, 'chưa giải quyết'),
(10, 3, 915247828, 9, 3, 'chưa giải quyết'),
(11, 3, 1046991262, 9, 3, 'chưa giải quyết');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keyword` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_img1` varchar(255) NOT NULL,
  `product_img2` varchar(255) NOT NULL,
  `product_img3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keyword`, `category_id`, `brand_id`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `Date`, `Status`) VALUES
(9, 'Áo hoddie', 'Áo đông xuân, phù hợp mọi giới tính', 'Áo, Hoddie', 13, 2, 'n9.jpg', 'n9.jpg', 'n9.jpg', '123000', '2023-02-25 04:52:05', 'true'),
(10, 'Áo Sơ Mi Tay Ngắn In Họa Tiết', 'Cảm thấy thoải mái và tươi mới khi mặc chiếc áo này.  Thích hợp để sử dụng hàng ngày.', 'Áo, Sơ mi', 13, 6, 'f1.jpg', 'f1.jpg', 'f1.jpg', '100000', '2023-02-25 04:55:13', 'true'),
(11, 'T-Shirt in hình anime', '💒 Áo thun Japanese Anime Tshirt Unisex ngắn tay giá siêu rẻ cực HOT', 'Áo, Ngắn tay, T-Shirt', 13, 7, 'OIPKNY.jpg', 'n10.jpg', 'ts-KillaKill.jpg', '100000', '2023-03-13 07:16:39', 'true'),
(12, 'Giày Nike Chính Hãng', 'Giày_Nike Air Force 1 Black White, Giày AF1 Vệt Đen Đế Air Đủ Size Nam Nữ Bản Chuẩn HotTrend', 'Giày, Nike', 19, 3, 'd1.jpg', 'd1.jpg', 'd1.jpg', '530000', '2023-02-25 05:00:41', 'true'),
(13, 'Áo thun unisex', 'Kiểu dáng năng động, khỏe khoắn, form rộng phù hợp với nhiều vóc dáng. ', 'Áo, áo thun, unisex', 13, 5, 'n11.png', 'n11.png', 'n11.png', '255000', '2023-02-26 06:08:12', 'true'),
(14, 'Áo Sơ Mi Dài Tay', 'Áo sơ mi dài tay là item không thể thiếu trong tủ đồ của các quý ông và quý cô. Với chất liệu cotton cao cấp, kiểu dáng thời trang và đa dạng màu sắc, chúng tôi tự hào mang đến cho khách hàng những sản phẩm áo sơ mi dài tay chất lượng, ', 'Áo, Sơ mi, dài tay', 13, 5, 'n7.jpg', 'n7.jpg', 'n7.jpg', '156000', '2023-03-13 06:24:17', 'true'),
(18, 'Áo đen', 'Áo mặc màu trắng', 'Áo Trắng, Shirt', 0, 0, 'pngegg (6).png', 'pngegg (7).png', 'pngegg (6).png', '123000', '2023-04-05 08:31:34', 'true');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_product` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_product`, `order_date`, `order_status`) VALUES
(6, 3, 369000, 915247828, 1, '2023-04-05 08:29:12', 'chưa giải quyết'),
(7, 3, 369000, 1046991262, 1, '2023-04-05 08:43:09', 'chưa giải quyết');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `useremail` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_img` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `useremail`, `password`, `user_img`, `user_ip`, `user_address`, `phone`) VALUES
(3, 'Tom', 'dvp123@gmail.com', '$2y$10$N4L6KZWDCfO7Aq.UCb83W.EnBz1a/S6XhtIKHgokpQsjQmNqun2cq', '103312186_p5_master1200.jpg', ' ::1', 'Cẩm Phả, Quảng Ninh', '12365489541');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `order_pending`
--
ALTER TABLE `order_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Chỉ mục cho bảng `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `order_pending`
--
ALTER TABLE `order_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
