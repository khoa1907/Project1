-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 20, 2022 lúc 04:04 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlicuahang`
--
CREATE DATABASE IF NOT EXISTS `quanlicuahang` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `quanlicuahang`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

DROP TABLE IF EXISTS `donhang`;
CREATE TABLE `donhang` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`order_id`, `customer_id`, `total`, `status`, `date`) VALUES
(1, 1, 199000, 'hoàn thành', '2022-07-19'),
(2, 2, 920000, 'đang xử lý', '2022-07-19'),
(3, 3, 321000, 'đang xử lý', '2022-07-20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang_sanpham`
--

DROP TABLE IF EXISTS `donhang_sanpham`;
CREATE TABLE `donhang_sanpham` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang_sanpham`
--

INSERT INTO `donhang_sanpham` (`order_id`, `product_id`, `qty`) VALUES
(1, 2, 2),
(1, 5, 3),
(1, 7, 2),
(2, 8, 4),
(3, 1, 5),
(3, 7, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhanh`
--

DROP TABLE IF EXISTS `hinhanh`;
CREATE TABLE `hinhanh` (
  `pic_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `pic` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hinhanh`
--

INSERT INTO `hinhanh` (`pic_id`, `product_id`, `pic`) VALUES
(1, 8, 'public/img/dau-tay-1.jpg'),
(2, 8, 'public/img/dau-tay-2.jpg'),
(3, 8, 'public/img/dau-tay-3.jpg'),
(4, 1, 'public/img/xoai-1.jpg'),
(5, 1, 'public/img/xoai-2.jpg'),
(6, 1, 'public/img/xoai-3.jpg'),
(7, 2, 'public/img/dua-luoi-1.jpg'),
(8, 2, 'public/img/dua-luoi-2.jpg'),
(9, 2, 'public/img/dua-luoi-3.jpg'),
(10, 3, 'public/img/oi-1.jpg'),
(11, 3, 'public/img/oi-2.jpg'),
(12, 3, 'public/img/oi-3.jpg'),
(13, 4, 'public/img/cam-1.jpg'),
(14, 4, 'public/img/cam-2.jpg'),
(15, 4, 'public/img/cam-3.jpg'),
(16, 5, 'public/img/thanh-long-1.jpg'),
(17, 5, 'public/img/thanh-long-2.jpg'),
(18, 5, 'public/img/thanh-long-3.jpg'),
(19, 6, 'public/img/buoi-1.jpg'),
(20, 6, 'public/img/buoi-2.jpg'),
(21, 6, 'public/img/buoi-3.jpg'),
(22, 7, 'public/img/dua-hau-1.jpg'),
(23, 7, 'public/img/dua-hau-2.jpg'),
(24, 7, 'public/img/dua-hau-3.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE `sanpham` (
  `product_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `newprice` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `sold` int(11) NOT NULL,
  `unit` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`product_id`, `name`, `price`, `newprice`, `date`, `amount`, `sold`, `unit`) VALUES
(1, 'Xoài hạt lép', 50000, 45000, '2022-07-19', 100, 30, '1'),
(2, 'Dưa lưới', 68000, NULL, '2022-07-18', 72, 21, '1'),
(3, 'Ổi', 50000, 42000, '2022-07-18', 95, 22, '1'),
(4, 'Cam ', 38000, NULL, '2022-07-16', 44, 11, '1'),
(5, 'Thanh long ', 50000, 45000, '2022-07-19', 34, 32, '1'),
(6, 'Bưởi', 65000, NULL, '2022-07-18', 84, 61, '1'),
(7, 'Dưa hấu', 35000, 32000, '2022-07-16', 49, 31, '1'),
(8, 'Dâu tây', 250000, 230000, '2022-07-19', 95, 32, '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

DROP TABLE IF EXISTS `taikhoan`;
CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `username`, `pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtinkhach`
--

DROP TABLE IF EXISTS `thongtinkhach`;
CREATE TABLE `thongtinkhach` (
  `customer_id` int(11) NOT NULL,
  `customername` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hinhthucthanhtoan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thongtinkhach`
--

INSERT INTO `thongtinkhach` (`customer_id`, `customername`, `address`, `phone`, `email`, `ghichu`, `hinhthucthanhtoan`) VALUES
(1, 'Nguyễn Đình Lộc', 'Hà Nội', '0971596416', 'nguyendinhloc1102001@gmail.com', '', 'Tiền mặt'),
(2, 'Vũ Hoàng Long', 'Hà Nội', '0123456789', '', '', 'Tiền mặt'),
(3, 'Nguyễn Đức Thắng', 'Hà Nội', '0147258369', 'nguyendinhloc1102001@gmail.com', '', 'Chuyển khoản');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customerconstraint` (`customer_id`);

--
-- Chỉ mục cho bảng `donhang_sanpham`
--
ALTER TABLE `donhang_sanpham`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `productconstraint` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD PRIMARY KEY (`pic_id`),
  ADD KEY `productidconstrain` (`product_id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thongtinkhach`
--
ALTER TABLE `thongtinkhach`
  ADD PRIMARY KEY (`customer_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `thongtinkhach`
--
ALTER TABLE `thongtinkhach`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `customerconstraint` FOREIGN KEY (`customer_id`) REFERENCES `thongtinkhach` (`customer_id`);

--
-- Các ràng buộc cho bảng `donhang_sanpham`
--
ALTER TABLE `donhang_sanpham`
  ADD CONSTRAINT `idconstraint` FOREIGN KEY (`order_id`) REFERENCES `donhang` (`order_id`),
  ADD CONSTRAINT `productconstraint` FOREIGN KEY (`product_id`) REFERENCES `sanpham` (`product_id`);

--
-- Các ràng buộc cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD CONSTRAINT `productidconstrain` FOREIGN KEY (`product_id`) REFERENCES `sanpham` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
