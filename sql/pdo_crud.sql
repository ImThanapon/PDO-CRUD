-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2021 at 10:36 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdo_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL COMMENT 'PK คีย์หลักประจำตารางประเภทสินค้า',
  `cat_name` varchar(255) NOT NULL COMMENT 'ชื่อประเภทสินค้า',
  `cat_title` varchar(255) NOT NULL COMMENT 'คำอธิบายประเภท',
  `created_at` datetime NOT NULL COMMENT 'วันที่สร้าง',
  `update_at` datetime NOT NULL COMMENT 'วันที่แก้ไข'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_title`, `created_at`, `update_at`) VALUES
(1, 'apparel', 'เครื่องแต่งกายทุกชนิด', '2021-12-04 18:18:37', '2021-12-04 18:18:37'),
(2, 'food', 'อาหารอุปโภคและบริโภค', '2021-12-04 18:19:34', '2021-12-04 18:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL COMMENT 'PK คีย์หลักประจำตาราง',
  `p_name` varchar(255) NOT NULL COMMENT 'ชื่อสินค้า',
  `p_title` varchar(255) NOT NULL COMMENT 'คำอธิบาย',
  `p_detail` text NOT NULL COMMENT 'รายละเอียด',
  `p_price` float NOT NULL COMMENT 'ราคาสินค้า',
  `p_image` varchar(255) NOT NULL COMMENT 'รูปภาพหน้าปก',
  `p_status` enum('true','false') NOT NULL COMMENT 'สถานะ',
  `cat_id` int(11) NOT NULL COMMENT 'FK ตาราง Categorties',
  `created_at` datetime NOT NULL COMMENT 'วันที่สร้าง',
  `update_at` datetime NOT NULL COMMENT 'วันที่แก้ไข'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `p_title`, `p_detail`, `p_price`, `p_image`, `p_status`, `cat_id`, `created_at`, `update_at`) VALUES
(1, 'ถุงเท้า', 'ถุงเท้าเด็ก อ่อนโยนต่อผิว', 'ถุงเท้าเด็ก 1 คู่', 15, 'https://media.shopat24.com/pdmain/381894_00_fashion_sock.jpg', 'true', 1, '2021-12-04 14:50:49', '2021-12-04 14:50:49'),
(2, 'ถุงมือ', 'ถุงมืองานก่อสร้าง ถนอมมือ ถนอมแรง', 'ถุงมือผ้า สำหรับงานก่อสร้าง', 30, 'https://www.sirasafety.com/wp-content/uploads/2019/03/GLDDOT.jpg', 'true', 1, '2021-12-04 14:59:02', '2021-12-04 14:59:02'),
(3, 'ถุงน่อง', 'ถุงน่อง คุณภาพ ใส่สบาย', 'ถุงน่องจากผ้าฝ้าย', 45, 'https://cc.lnwfile.com/edp07v.jpg', 'true', 1, '2021-12-05 17:44:47', '2021-12-05 17:44:47'),
(43, 'หมวกไหมพรม', 'หมวกไหมพรม ใส่แล้วสบาย', 'หมวกไหมพรม ทำจากไหมชั้นดีเลิศ', 350, 'https://dq.lnwfile.com/ahtfrd.jpg', 'true', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'เสื้อกันหนาว', 'เสื้อกันหนาว ตราช้างน้อย', 'เสื้อกันหนาว ตราช้างน้อย ของแท้ ไม่มีลอกเลียนแบบ', 650, 'https://cf.shopee.co.th/file/5a0e6e8b532a49ac5a8f6a5aaad81564', 'true', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'รองเท้าผ้าใบ', 'รองเท้าผ้าใบนันยาง', 'รองเท้าผ้าใบนันยาง ราคาโปรโมชั่น ลดแลกแจกแถม', 250, 'https://cf.shopee.co.th/file/a821afe49c8717a77d4de15c19390a73', 'true', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK คีย์หลักประจำตารางประเภทสินค้า', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK คีย์หลักประจำตาราง', AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
