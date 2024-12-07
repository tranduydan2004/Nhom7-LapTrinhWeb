-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2024 at 01:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_do_an`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `danhgia` int(11) DEFAULT NULL CHECK (`danhgia` between 1 and 5),
  `binhluan` varchar(1000) DEFAULT NULL,
  `idsp` int(11) DEFAULT NULL,
  `create_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`id`, `ten`, `email`, `danhgia`, `binhluan`, `idsp`, `create_at`) VALUES
(1, 'phuoc', 'phuoc@gmail.com', 4, 'DAP TRAI', 2, '0000-00-00'),
(2, 'Châu Thành Phước', 'phuoccua1512@gmail.com', 3, 'jjjjj ', 2, '2024-11-03'),
(3, 'ChayThanhPhuocccccc', 'ssssscua1512@gmail.com', 3, 'vippro 10 điểm', 2, '2024-11-03'),
(4, 'Châu Thành Phước', 'phuoccua1512@gmail.com', 5, 'gfg ffff', 73, '2024-11-03'),
(5, 'Châu Thành Phước', 'phuoccua1512@gmail.com', 5, 'dsdasda', 74, '2024-11-03'),
(6, 'phuoc123', 't1occua1512@gmail.com', 5, 'fafafaf  afafafa v', 74, '2024-11-03'),
(7, 'Châu Thành Phước', 'phuoccua1512@gmail.com', 5, 'tam dc', 74, '2024-11-03'),
(8, 'Châu Thành Phước', 'phuoccua1512@gmail.com', 5, 'jjjjjjjjjjj', 2, '2024-11-03'),
(9, 'Châu Thành Phước', 'phuoccua1512@gmail.com', 5, 'xin chao', 64, '2024-11-04'),
(10, 'Châu Thành Phước', 'phuoccua1512@gmail.com', 5, '111', 1, '2024-11-04'),
(11, 'Châu Thà', 'phuocua1512@gmail.com', 4, 'uuuuu hh', 74, '2024-11-08'),
(12, 'Châu Thành Phước', 'phuoccua1512@gmail.com', 5, 'fdsa', 73, '2024-11-18');

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`) VALUES
(1, 'Áo sơ mi'),
(2, 'Áo Polo & Rugby Shirt'),
(3, 'Áo thun'),
(4, 'Áo khoác'),
(5, 'Áo Hoodie & Sweatshirt'),
(6, 'Áo Vest & Ghi Lê'),
(7, 'Áo len'),
(8, 'Quần jeans'),
(9, 'Quần tây'),
(10, 'Quần kaki'),
(11, 'Quần jogger'),
(12, 'Quần short'),
(13, 'Quần lót'),
(14, 'Giày Dép'),
(15, 'Thắt lưng'),
(16, 'Ví da'),
(17, 'Cà Vạt & Nơ'),
(18, 'Vớ nam'),
(19, 'Mũ nón'),
(20, 'Túi xách');

-- --------------------------------------------------------

--
-- Table structure for table `discount_codes`
--

CREATE TABLE `discount_codes` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `expiration` date NOT NULL,
  `is_active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discount_codes`
--

INSERT INTO `discount_codes` (`id`, `code`, `amount`, `expiration`, `is_active`) VALUES
(1, 'DISCOUNT10', 10, '2024-12-31', 1),
(2, 'SAVE50', 50, '2024-11-30', 1),
(3, '20THANG10', 30, '2024-10-17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `idgiohang` int(11) NOT NULL,
  `idsp` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `soluong` int(11) DEFAULT 1,
  `kichthuoc` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `giohang`
--

INSERT INTO `giohang` (`idgiohang`, `idsp`, `iduser`, `soluong`, `kichthuoc`) VALUES
(9, 73, 6, 1, 'S');

-- --------------------------------------------------------

--
-- Table structure for table `hinhanhsanpham`
--

CREATE TABLE `hinhanhsanpham` (
  `id` int(11) NOT NULL,
  `idsp` int(11) NOT NULL,
  `img_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hinhanhsanpham`
--

INSERT INTO `hinhanhsanpham` (`id`, `idsp`, `img_path`) VALUES
(1, 1, 'img\\ao1-1\\ao1-1-1.jpg'),
(2, 1, 'img\\ao1-1\\ao1-1-2.jpg'),
(3, 1, 'img\\ao1-1\\ao1-1-3.jpg'),
(4, 2, 'img\\ao1-2\\ao1-2-1.jpg'),
(5, 2, 'img\\ao1-2\\ao1-2-2.jpg'),
(6, 2, 'img\\ao1-2\\ao1-2-3.jpg'),
(7, 3, 'img\\ao1-3\\ao1-3-1.jpg'),
(8, 3, 'img\\ao1-3\\ao1-3-2.jpg'),
(9, 4, 'img\\ao1-4\\ao1-4-1.jpg'),
(10, 4, 'img\\ao1-4\\ao1-4-2.jpg'),
(11, 64, 'img\\ao1-5\\ao1-5-1.jpg'),
(12, 64, 'img\\ao1-5\\ao1-5-2.jpg'),
(13, 65, 'img\\ao1-6\\ao1-6-1.jpg'),
(14, 65, 'img\\ao1-6\\ao1-6-2.jpg'),
(15, 66, 'img\\ao1-7\\ao1-7-1.jpg'),
(16, 66, 'img\\ao1-7\\ao1-7-2.jpg'),
(17, 67, 'img\\ao1-8\\ao1-8-1.jpg'),
(18, 67, 'img\\ao1-8\\ao1-8-2.jpg'),
(19, 68, 'img\\ao1-9\\ao1-9-1.jpg'),
(20, 68, 'img\\ao1-9\\ao1-9-2.jpg'),
(21, 69, 'img\\ao1-10\\ao1-10-1.jpg'),
(22, 69, 'img\\ao1-10\\ao1-10-2.jpg'),
(23, 70, 'img\\ao1-11\\ao1-11-1.jpg'),
(24, 70, 'img\\ao1-11\\ao1-11-2.jpg'),
(25, 71, 'img\\ao1-12\\ao1-12-1.jpg'),
(26, 71, 'img\\ao1-12\\ao1-12-2.jpg'),
(27, 72, 'img\\ao1-13\\ao1-13-1.jpg'),
(28, 72, 'img\\ao1-13\\ao1-13-2.jpg'),
(29, 73, 'img\\ao1-14\\ao1-14-1.jpg'),
(30, 73, 'img\\ao1-14\\ao1-14-2.jpg'),
(31, 74, 'img\\ao1-15\\ao1-15-1.jpg'),
(32, 74, 'img\\ao1-15\\ao1-15-2.jpg'),
(33, 75, 'img\\ao2-1\\ao2-1-1.jpg'),
(34, 75, 'img\\ao2-1\\ao2-1-2.jpg'),
(35, 76, 'img\\ao2-2\\ao2-2-1.jpg'),
(36, 76, 'img\\ao2-2\\ao2-2-2.jpg'),
(37, 77, 'img\\ao2-3\\ao2-3-1.jpg'),
(38, 77, 'img\\ao2-3\\ao2-3-2.jpg'),
(39, 78, 'img\\ao2-4\\ao2-4-1.jpg'),
(40, 78, 'img\\ao2-4\\ao2-4-2.jpg'),
(41, 79, 'img\\ao2-5\\ao2-5-1.jpg'),
(42, 79, 'img\\ao2-5\\ao2-5-2.jpg'),
(43, 80, 'img\\ao2-6\\ao2-6-1.jpg'),
(44, 80, 'img\\ao2-6\\ao2-6-2.jpg'),
(45, 81, 'img\\ao2-7\\ao2-7-1.jpg'),
(46, 81, 'img\\ao2-7\\ao2-7-2.jpg'),
(47, 82, 'img\\ao2-8\\ao2-8-1.jpg'),
(48, 82, 'img\\ao2-8\\ao2-8-2.jpg'),
(49, 83, 'img\\ao2-9\\ao2-9-1.jpg'),
(50, 83, 'img\\ao2-9\\ao2-9-2.jpg'),
(51, 84, 'img\\ao3-1\\ao3-1-1.jpg'),
(52, 84, 'img\\ao3-1\\ao3-1-2.jpg'),
(53, 85, 'img\\ao3-2\\ao3-2-1.jpg'),
(54, 85, 'img\\ao3-2\\ao3-2-2.jpg'),
(55, 86, 'img\\ao3-3\\ao3-3-1.jpg'),
(56, 86, 'img\\ao3-3\\ao3-3-2.jpg'),
(57, 87, 'img\\ao3-4\\ao3-4-1.jpg'),
(58, 87, 'img\\ao3-4\\ao3-4-2.jpg'),
(59, 88, 'img\\ao3-5\\ao3-5-1.jpg'),
(60, 88, 'img\\ao3-5\\ao3-5-2.jpg'),
(61, 89, 'img\\ao3-6\\ao3-6-1.jpg'),
(62, 89, 'img\\ao3-6\\ao3-6-2.jpg'),
(63, 90, 'img\\ao3-7\\ao3-7-1.jpg'),
(64, 90, 'img\\ao3-7\\ao3-7-2.jpg'),
(65, 91, 'img\\ao8-1\\ao8-1-1.jpg'),
(66, 91, 'img\\ao8-1\\ao8-1-2.jpg'),
(67, 92, 'img\\ao8-2\\ao8-2-1.jpg'),
(68, 92, 'img\\ao8-1\\ao8-2-2.jpg'),
(69, 93, 'img\\ao8-3\\ao8-3-1.jpg'),
(70, 93, 'img\\ao8-3\\ao8-3-2.jpg'),
(71, 94, 'img\\quan8-4\\quan8-4-1.jpg'),
(72, 94, 'img\\quan8-4\\quan8-4-2.jpg'),
(73, 95, 'img\\quan8-5\\quan8-5-1.jpg'),
(74, 95, 'img\\quan8-5\\quan8-5-2.jpg'),
(75, 96, 'img\\quan8-6\\quan8-6-1.jpg'),
(76, 96, 'img\\quan8-6\\quan8-6-2.jpg'),
(77, 97, 'img\\quan9-1\\quan9-1-1.jpg'),
(78, 97, 'img\\quan9-1\\quan9-1-2.jpg'),
(79, 98, 'img\\quan9-2\\quan9-2-1.jpg'),
(80, 98, 'img\\quan9-2\\quan9-2-2.jpg'),
(81, 99, 'img\\quan9-3\\quan9-3-1.jpg'),
(82, 99, 'img\\quan9-3\\quan9-3-2.jpg'),
(83, 100, 'img\\quan9-4\\quan9-4-1.jpg'),
(84, 100, 'img\\quan9-4\\quan9-4-2.jpg'),
(85, 101, 'img\\quan9-5\\quan9-5-1.jpg'),
(86, 101, 'img\\quan9-5\\quan9-5-2.jpg'),
(87, 102, 'img\\quan9-6\\quan9-6-1.jpg'),
(88, 102, 'img\\quan9-6\\quan9-6-2.jpg'),
(89, 103, 'img\\quan10-1\\quan10-1-1.jpg'),
(90, 103, 'img\\quan10-1\\quan10-1-2.jpg'),
(91, 104, 'img\\quan10-2\\quan10-2-1.jpg'),
(92, 104, 'img\\quan10-2\\quan10-2-2.jpg'),
(93, 105, 'img\\quan10-3\\quan10-3-1.jpg'),
(94, 105, 'img\\quan10-3\\quan10-3-2.jpg'),
(95, 106, 'img\\quan10-4\\quan10-4-1.jpg'),
(96, 106, 'img\\quan10-4\\quan10-4-2.jpg'),
(97, 107, 'img\\quan10-5\\quan10-5-1.jpg'),
(98, 107, 'img\\quan10-5\\quan10-5-2.jpg'),
(99, 108, 'img\\quan10-6\\quan10-6-1.jpg'),
(100, 108, 'img\\quan10-6\\quan10-6-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order_info`
--

CREATE TABLE `order_info` (
  `order_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(12) NOT NULL,
  `address` text NOT NULL,
  `products` text NOT NULL,
  `notes` text DEFAULT NULL,
  `payment_method` enum('COD','cash') NOT NULL,
  `discount_code` varchar(50) DEFAULT NULL,
  `total_amount` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `iduser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_info`
--

INSERT INTO `order_info` (`order_id`, `fullname`, `email`, `phone_number`, `address`, `products`, `notes`, `payment_method`, `discount_code`, `total_amount`, `created_at`, `iduser`) VALUES
(4, 'Châu Thành Phước', 'phuoccua1512@gmail.com', '0968111512', '12 phạm văn hai, phường 12, undefined, Hanoi', 'Áo Sơ Mi Caro Vải Bamboo Thêu Gentlemen Ở Lai Form Slimfit SM154 Màu Trắng, Số lượng: 1, Kích thước: S, Giá: 445.000đ\nÁo Overshirt Vải Caro Flannel Thêu Heritage Form Loose SM166 Caro Xanh Lá, Số lượng: 1, Kích thước: S, Giá: 475.000đ\n', 'note', 'cash', NULL, 460000, '2024-11-11 11:12:24', 4),
(5, 'Châu Thành Phước', 'phuoccua1512@gmail.com', '0968111512', 's, f, undefined, Hanoi', 'Áo Sơ Mi Caro Vải Bamboo Thêu Gentlemen Ở Lai Form Slimfit SM154 Màu Trắng, Số lượng: 1, Kích thước: S, Giá: 445.000đ\nÁo Overshirt Vải Caro Flannel Thêu Heritage Form Loose SM166 Caro Xanh Lá, Số lượng: 1, Kích thước: S, Giá: 475.000đ\n', 'fdsfasf', 'COD', NULL, 460000, '2024-11-12 12:06:59', 4),
(6, 'Châu Thành Phước', 'phuoccua1512@gmail.com', '0968111512', 'dDS, d, Quận 3, TP. Hồ Chí Minh', 'Áo Sơ Mi Tay Ngắn Trơn Vải Bamboo Cổ Cutaway Form Slimfit SM153 Màu Be, Số lượng: 1, Kích thước: S, Giá: 395.000đ\n', 'dsds', 'COD', NULL, 197500, '2024-11-16 08:32:36', 4),
(7, 'Châu Thành Phước', 'phuoccua1512@gmail.com', '0968111512', 'à, fa, Ba Đình, Hà Nội', 'Áo Polo Vải Sọc Ngang Thêu 4M Ở Lai Form Regular PO142 Màu Sọc Xanh, Số lượng: 1, Kích thước: S, Giá: 395.000đ\n', 'a', 'COD', NULL, 197500, '2024-11-16 08:42:49', 4),
(8, 'Châu Thành Phước', 'phuoccua1512@gmail.com', '0968111512', 's, gf, Quận 1, TP. Hồ Chí Minh', 'Áo Sơ Mi Caro Vải Bamboo Thêu Gentlemen Ở Lai Form Slimfit SM154 Màu Trắng, Số lượng: 1, Kích thước: S, Giá: 445.000đ\nÁo Sơ Mi Tay Ngắn Trơn Vải Bamboo Cổ Cutaway Form Slimfit SM153 Màu Be, Số lượng: 1, Kích thước: S, Giá: 395.000đ\n', 'kk', 'COD', 'SAVE50', 420000, '2024-11-16 09:00:12', 4),
(9, 'Châu Thành Phước', 'phuoccua1512@gmail.com', '0968111512', 'fa, fa, Ba Đình, Hà Nội', 'Áo Sơ Mi Caro Vải Bamboo Thêu Gentlemen Ở Lai Form Slimfit SM154 Màu Trắng, Số lượng: 1, Kích thước: S, Giá: 445.000đ\n', 'à', 'COD', 'SAVE50', 222500, '2024-11-18 00:03:11', 4);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(10) DEFAULT 0,
  `mota` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `danhGia` float NOT NULL DEFAULT 1,
  `sodanhgia` int(11) NOT NULL DEFAULT 1,
  `luotxem` int(11) NOT NULL DEFAULT 0,
  `iddm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `price`, `mota`, `danhGia`, `sodanhgia`, `luotxem`, `iddm`) VALUES
(1, 'Áo Overshirt Vải Caro Flannel Thêu Heritage Form Loose SM167', 475000, 'Áo sơ mi loại mới nhất', 3, 2, 15, 1),
(2, 'Áo Overshirt Vải Caro Flannel Thêu Heritage Form Loose SM166 Caro Xanh Lá', 475000, 'Áo sơ mi loại mới nhất', 3, 3, 77, 1),
(3, 'Áo Sơ Mi Tay Ngắn 2 Túi Thêu 4M Form Regular SM164 Màu Trắng', 375000, 'Áo sơ mi loại mới nhất', 1, 1, 2, 1),
(4, 'Áo Sơ Mi Thêu 3 Sọc Ở Ngực Form Slimfit SM163', 199000, 'Áo sơ mi loại mới nhất', 1, 1, 4, 1),
(64, 'Áo Sơ Mi Phối Dây Sọc Ở Nẹp Form Slimfit SM162', 199000, 'Áo sơ mi loại mới nhất', 3, 2, 12, 1),
(65, 'Áo Sơ Mi Thêu 1 Sọc Lá Cổ Form Slimfit SM161', 219000, 'Áo sơ mi loại mới nhất', 1, 1, 2, 1),
(66, 'Áo Sơ Mi Vải Oxford Sọc Phối Cổ Trắng Form Regular SM165 Màu Sọc Be', 375000, 'Áo sơ mi loại mới nhất', 1, 1, 1, 1),
(67, 'Áo Sơ Mi Vải Oxford Trơn Signature Form Regular SM157 Màu Trắng Kem', 375000, 'Áo sơ mi loại mới nhất', 1, 1, 1, 1),
(68, 'Áo Sơ Mi Oxford Thêu Logo 4M SM085 Màu Xanh Đen', 375000, 'Áo sơ mi loại mới nhất', 1, 1, 1, 1),
(69, 'Áo Sơ Mi Vải Oxford Trơn Form Regular SM158 Màu Kem', 249000, 'Áo sơ mi loại mới nhất', 1, 1, 1, 1),
(70, 'Áo Sơ Mi Vải Oxford Sọc Form Regular SM159 Sọc Xanh Biển', 249000, 'Áo sơ mi loại mới nhất', 1, 1, 3, 1),
(71, 'Áo Sơ Mi Vải Bamboo Thêu Gentlemen Ở Măng Séc Form Slimfit SM155 Màu Xanh Biển', 425000, 'Áo sơ mi loại mới nhất', 1, 1, 2, 1),
(72, 'Áo Sơ Mi Sọc Vải Bamboo Thêu Gentlemen Ở Măng Séc Form Slimfit SM156', 430000, 'Áo sơ mi loại mới nhất', 1, 1, 14, 1),
(73, 'Áo Sơ Mi Caro Vải Bamboo Thêu Gentlemen Ở Lai Form Slimfit SM154 Màu Trắng', 445000, 'Áo sơ mi loại mới nhất', 3.66667, 3, 79, 1),
(74, 'Áo Sơ Mi Tay Ngắn Trơn Vải Bamboo Cổ Cutaway Form Slimfit SM153 Màu Be', 395000, 'Áo sơ mi loại mới nhất', 4, 5, 20, 1),
(75, 'Áo Thun In Cao Leisure Form Slimfit AT158 Màu Trắng', 219000, 'áo thun mới nhất', 3, 1, 1, 2),
(76, 'Áo Polo Vải Sọc Ngang Thêu 4M Ở Lai Form Regular PO142 Màu Sọc Xanh', 395000, 'áo polo mới nhất', 3, 1, 2, 2),
(77, 'Áo Polo Vải Họa Tiết Nanh Sói Phối Tay Raglan Form Slimfit PO139 Màu Nâu', 375000, 'áo polo mới nhất', 3, 1, 1, 2),
(78, 'Áo Rugby Shirt Sọc Thêu Logo Ngực Form Regular PO140​ Màu Sọc Xanh', 445000, 'áo polo mới nhất', 3, 1, 1, 2),
(79, 'Áo Polo Trơn Form Regular PO137 Màu Trắng', 229000, 'áo polo mới nhất', 3, 1, 2, 2),
(80, 'Áo Polo Bo Sọc Form Regular PO136 Màu Trắng', 249000, 'áo polo mới nhất', 3, 1, 1, 2),
(81, 'Áo Polo Phối Bo Kiểu Thêu Ngực Form Regular PO133 Màu Xanh Đen', 300000, 'áo polo mới nhất', 3, 1, 1, 2),
(82, 'Áo Polo Phối Bo Form Regular PO135', 249000, 'áo polo mới nhất', 3, 1, 1, 2),
(83, 'Áo Polo Rã Phối Dọc Thêu Ở Bo Cổ Form Regular PO131 Màu Xanh Lá', 299000, 'áo polo mới nhất', 3, 1, 1, 2),
(84, 'Áo Thun In Cao Leisure Form Slimfit AT158 Màu Trắng', 219000, 'áo polo mới nhất', 3, 1, 1, 3),
(85, 'Áo Thun Trơn Vải Rayon Thêu 4MEN Club Tay Áo Form Slimfit AT155 Màu Trắng', 245000, 'áo polo mới nhất', 3, 1, 1, 3),
(86, 'Áo Thun Sọc Loang Thêu Cổ và Tay Form Slimfit AT156 Màu Sọc Be', 245000, 'áo polo mới nhất', 3, 1, 1, 3),
(87, 'Áo Thun In Thêu Heritage Sau Lưng Form Loose AT157 Màu Be', 315000, 'áo thun mới nhất', 3, 1, 5, 3),
(88, 'Áo Thun Cổ Tròn Form Regular AT152 Màu Trắng', 205000, 'áo thun mới nhất', 3, 1, 1, 3),
(89, 'Áo Thun Wash Loang In Graphic Tennis Sau Lưng Form Regular AT151 Màu Kem', 199000, 'áo thun mới nhất', 3, 1, 1, 3),
(90, 'Áo Thun In Trame Graphic Tennis Form Regular AT153 Màu Xanh Đen', 199000, 'áo thun mới nhất', 3, 1, 1, 3),
(91, 'Quần Jeans Thêu 4M Túi Sau Form Straight QJ104 Màu Be', 545000, 'áo thun mới nhất', 3, 1, 1, 8),
(92, 'Quần Jeans Túi Đồng Hồ Kiểu Trang Trí Dây Sọc Form Slimfit QJ103 Xanh Biển', 545000, 'áo thun mới nhất', 3, 1, 1, 8),
(93, 'Quần Jeans Thêu 4MEN Club Rã Túi Sau Form Slimfit QJ105 Màu Xanh Biển Đậm', 500000, 'áo thun mới nhất', 3, 1, 1, 8),
(94, 'Quần Jeans Xanh Nhạt In Túi Sau Form Slimfit QJ100', 499000, 'áo thun mới nhất', 3, 1, 1, 8),
(95, 'Quần Jeans Xanh Túi Đắp Lưng Thêu Vintage Form Regular QJ094', 490000, 'áo thun mới nhất', 3, 1, 1, 8),
(96, 'Quần Jeans Basic Form Slimfit QJ098', 490000, 'áo thun mới nhất', 3, 1, 1, 8),
(97, 'Quần Tây Sidetab Form Slim-Cropped QT056 Màu Xám', 390000, 'áo thun mới nhất', 3, 1, 1, 9),
(98, 'Quần Tây Lưng Thun Form Regular QT060', 399000, 'áo thun mới nhất', 3, 1, 1, 9),
(99, 'Quần Tây Trơn Form Slimfit QT058 Màu Lục', 299000, 'áo thun mới nhất', 3, 1, 1, 9),
(100, 'Quần Tây Trơn Vải Rayon Ít Nhăn Thêu 4MEN Premium Form Slimfit QT031 Màu Xám Đậm', 339000, 'Quần mới nhất', 3, 1, 1, 9),
(101, 'Quần Tây Slimfit Rã Phối QT040 Màu Nâu Xám', 339000, 'Quần mới nhất', 3, 1, 1, 9),
(102, 'Quần Tây Sidetab 1 Bên Form Regular QT062 Màu Trắng', 425000, 'Quần mới nhất', 3, 1, 1, 9),
(103, 'Quần Kaki Túi Kiểu Trang Trí Dây Sọc Form Regular QK029 Màu Be', 425000, 'Quần mới nhất', 3, 1, 1, 10),
(104, 'Quần Kaki Trơn Signature Gắn Tag Kim Loại Form Slimfit QK028 Màu Be', 475000, 'Quần mới nhất', 3, 1, 1, 10),
(105, 'Quần Kaki Tổ Ong Form Regular QK027 Màu Đen', 399000, 'Quần mới nhất', 3, 1, 1, 10),
(106, 'Quần Kaki Túi Nhỏ Kiểu Form Slimfit QK026 Màu Đen', 399000, 'Quần mới nhất', 3, 1, 1, 10),
(107, 'Quần Kaki Túi Chéo Kiểu Form Slimfit QK024 Màu Nâu', 199000, 'Quần mới nhất', 3, 1, 1, 10),
(108, 'Quần Kaki Túi Chéo Thêu 4MEN Form Slimfit QK025 Màu Đen', 199000, 'Quần mới nhất', 3, 1, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `username`, `pass`, `email`, `tel`, `role`) VALUES
(4, 'phuocchau', 'matkhau', 'ff@gmail.com', '0203324', 0),
(5, 'phuocchau1', 'matkhau', 'phuocotaku1512@gmail.com', '03252342', 0),
(6, 'phuocchau3232', 'matkhau', 'phuoccfafua1512@gmail.com', '03252342', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idsp` (`idsp`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount_codes`
--
ALTER TABLE `discount_codes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`idgiohang`),
  ADD KEY `idsp` (`idsp`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `hinhanhsanpham`
--
ALTER TABLE `hinhanhsanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idsp` (`idsp`);

--
-- Indexes for table `order_info`
--
ALTER TABLE `order_info`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_user_id` (`iduser`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_sanpham_danhmuc` (`iddm`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `discount_codes`
--
ALTER TABLE `discount_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `idgiohang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `hinhanhsanpham`
--
ALTER TABLE `hinhanhsanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `order_info`
--
ALTER TABLE `order_info`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `fk_idsp` FOREIGN KEY (`idsp`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`idsp`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `taikhoan` (`id`);

--
-- Constraints for table `hinhanhsanpham`
--
ALTER TABLE `hinhanhsanpham`
  ADD CONSTRAINT `hinhanhsanpham_ibfk_1` FOREIGN KEY (`idsp`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_info`
--
ALTER TABLE `order_info`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`iduser`) REFERENCES `taikhoan` (`id`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `lk_sanpham_danhmuc` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
