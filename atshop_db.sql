-- phpMyAdmin SQL Dump
-- version 5.2.0-rc1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th6 09, 2022 lúc 04:21 PM
-- Phiên bản máy phục vụ: 5.7.33
-- Phiên bản PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `atshop_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `img` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` mediumtext,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `image` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `image`, `created_at`) VALUES
(10, 'phone', 'phone', 'phone', 0, '1654613960.png', '2022-06-07 14:59:20'),
(11, 'head phone', 'headphone', 'headphone', 0, '1654614106.png', '2022-06-07 15:01:46'),
(12, 'head phone1', 'headphone1', 'headphone1', 0, '1654614117.png', '2022-06-07 15:01:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `rate` tinyint(4) DEFAULT NULL,
  `comment` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `selling_price`, `quantity`, `rate`, `comment`, `created_at`) VALUES
(1, 22, 4, 200, 2, NULL, NULL, '2022-06-09 14:45:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `small_description` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `original_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `image` varchar(191) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `status`, `created_at`) VALUES
(3, 11, 'phone', 'phone', 'phone', 'phone', 5000, 2000, '1654692020.png', 2, 0, '2022-06-08 12:40:20'),
(4, 11, 'JBL TUNE 750TNC', 'JBL-TUNE-750TNC', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo libero alias officiis dolore doloremque eveniet culpa dignissimos, itaque, cum animi excepturi sed veritatis asperiores soluta, nisi atque quae illum. Ipsum', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit laudantium obcaecati odit dolorem, doloremque accusamus esse neque ipsa dignissimos saepe quisquam tempore perferendis deserunt sapiente! Recusandae illum totam earum ratione. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquam incidunt maxime rerum reprehenderit voluptas asperiores ipsam quas consequuntur maiores, at odit obcaecati vero sunt! Reiciendis aperiam perferendis consequuntur odio quas. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut quaerat eum veniam doloremque nihil repudiandae odio ratione culpa libero tempora. Expedita, quo molestias. Minus illo quis dignissimos aliquid sapiente error!', 2345, 2000, '1654780717.png', 10, 0, '2022-06-09 13:18:37'),
(5, 11, 'JBL E55BT KEY BLACK', 'jbl-e55bt-key-black', 'Trong thÃªÌ giá»›i phá»¥ kiÃªÌ£n Ã¢m thanh nÃ³i chung vÃ  tai nghe nÃ³i riÃªng, Sony luÃ´n lÃ  mÃ´Ì£t trong nhá»¯ng thÆ°Æ¡ng hiÃªÌ£u dÃ¢Ìƒn Ä‘Ã¢Ì€u. NÃªÌu nÄƒm 2018, hÃ£ng cho ra máº¯t chiÃªÌc 1000XM3 Ä‘Æ°á»£c Ä‘Ã´ng Ä‘áº£o ngÆ°á»i dÃ¹ng Ä‘Ã³n nhÃ¢Ì£n. ThÃ¬ nÄƒm nay 2020, Sony WH-1000XM4 phá»¥ kiÃªÌ£n tai nghe rÃ¢Ìt Ä‘Ã¡ng Ä‘ÃªÌ‰ tráº£i nghiÃªÌ£m', 'Tai nghe Sony sá»Ÿ há»¯u thiÃªÌt kÃªÌ tÆ°Æ¡ng tá»± sáº£n pháº©m trÆ°á»›c\r\nBa thÃªÌ hÃªÌ£ trÆ°á»›c Ä‘Ã³ trong dÃ²ng tai nghe WH-1000XM Ä‘ÃªÌ€u sá»Ÿ há»¯u thiÃªÌt kÃªÌ tÆ°Æ¡ng tá»± nhau. VÃ¢Ì£y nÃªn khÃ´ng quÃ¡ láº¡i khi tai nghe Sony WH-1000XM4 láº¡i cÃ³ váº» bÃªÌ€ ngoÃ i giÃ´Ìng tai nghe trÆ°á»›c Ä‘Ã³ cá»§a mÃ¬nh Ä‘ÃªÌn vÃ¢Ì£y. Tai nghe vá»›i thiÃªÌt kÃªÌ phÃ¢Ì€n Ä‘Ã¢Ì€u dÃ y mÃ´Ì£t chÃºt, vá»‹ trÃ­ nÃºt bÃ¢Ìm Ä‘Æ°á»£c bÃ´Ì trÃ­ khÃ´ng cÃ³ gÃ¬ thay Ä‘á»•i.\r\nTuy sá»­ dá»¥ng mÃ´Ì£t thiÃªÌt kÃªÌ xÆ°a cÅ© nhÆ°ng nhÃ¬n tÃ´Ì‰ng thÃªÌ‰ tai nghe vÃ¢Ìƒn rÃ¢Ìt Ã´Ì‰n, Ä‘Ã´Ì£ thu hÃºt khÃ´ng thua kÃ©m gÃ¬ nhá»¯ng mÃ¢Ìƒu tai nghe má»›i nhÃ¢Ìt trÃªn thá»‹ trÆ°á»ng.\r\n\r\nChá»©c nÄƒng khá»­ tiáº¿ng á»“n chá»§ Ä‘á»™ng, hÃ´Ìƒ trá»£ â€œSpeak to Chatâ€\r\nSony WH-1000XM4 Ä‘Æ°á»£c trang bá»‹ kháº£ nÄƒng phÃ¢n tÃ­ch vÃ  Ä‘iÃªÌ€u khiÃªÌ‰n thá»i gian thá»±c. Nhá» Ä‘Ã³ giÃºp tai nghe chá»¥p tai WH-1000MX4 luÃ´n phÃ¢n tÃ­ch cÃ¡c tiÃªÌng Ã´Ì€n xung quanh vÃ  Ä‘iÃªÌ€u chá»‰nh má»©c Ä‘Ã´Ì£ chÃ´Ìng Ã´Ì€n nháº±m mang láº¡i cho ngÆ°á»i dÃ¹ng Ã¢m thanh chÃ¢Ìt lÆ°á»£ng tÃ´Ìt nhÃ¢Ìt.', 1000, 500, '1654783857.png', 10, 0, '2022-06-09 14:10:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` int(15) NOT NULL,
  `address` varchar(191) DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT '0',
  `creat_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `password`, `role_as`, `creat_at`) VALUES
(19, 'cong pham', 'cong@gmail.com', 396396332, 'Sá»‘ 8 pháº¡m vÄƒn Ä‘á»“ng, mai dá»‹ch, hÃ  ná»™i', 'cong', 1, '2022-06-05 16:09:17'),
(20, 'kha12', 'kha3@gmail.com', 21123, '', 'kha', 0, '2022-06-06 15:25:02'),
(21, 'khad2', 'kha45@gmail.com', 4221424, '', 'kha1', 0, '2022-06-08 15:36:37'),
(22, 'cong pham ne', 'congj2school@gmail.com', 396396332, 'Sá»‘ 8 pháº¡m vÄƒn Ä‘á»“ng, mai dá»‹ch, hÃ  ná»™i', 'cong', 0, '2022-06-09 08:59:48');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
