-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 14, 2022 at 02:55 PM
-- Server version: 8.0.30-0ubuntu0.20.04.2
-- PHP Version: 8.0.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `Shop4U`
--
CREATE DATABASE IF NOT EXISTS `Shop4U` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `Shop4U`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `feature` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `image`, `feature`, `active`) VALUES
(3, 'Chinese', '298149184_1045355703021077_79032710986474784_n.jpg', 1, 1),
(4, 'Indian', '296894857_408363141167447_2229782283500432275_n.jpg', 0, 1),
(5, 'Korean', '289904526_440591404480863_8383428573317462376_n.jpg', 1, 1),
(6, 'Western', '291934279_804573747215437_7889349798741817243_n.jpg', 0, 1),
(7, 'Japanese', '295492226_384896047049949_8612464798641849012_n.jpg', 1, 1),
(30, 'Latin', 'no-image.png', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `custOrder`
--

DROP TABLE IF EXISTS `custOrder`;
CREATE TABLE IF NOT EXISTS `custOrder` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `instruction` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `shopperId` bigint NOT NULL,
  `pickerId` bigint DEFAULT NULL,
  `subTotal` decimal(65,2) NOT NULL,
  `total` decimal(65,2) NOT NULL,
  `handlingFee` double(65,2) NOT NULL,
  `tax` decimal(65,2) NOT NULL,
  `orderStatus` int DEFAULT NULL,
  `orderDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `custOrder.shopperId` (`shopperId`),
  KEY `custOrder.pickerId` (`pickerId`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `custOrder`
--

INSERT INTO `custOrder` (`id`, `instruction`, `shopperId`, `pickerId`, `subTotal`, `total`, `handlingFee`, `tax`, `orderStatus`, `orderDate`) VALUES
(7, '', 19, 15, '12.50', '28.13', 15.00, '0.63', 1, '2022-08-08 12:03:57'),
(8, '', 8, 43, '40.00', '57.00', 15.00, '2.00', 5, '2022-06-08 14:05:18'),
(9, 'test', 8, 43, '7.50', '22.88', 15.00, '0.38', 5, '2022-07-08 14:07:12'),
(10, '', 35, 8, '32.50', '49.13', 15.00, '1.63', 5, '2022-09-08 14:20:49'),
(11, 'Leave it at the door', 12, 8, '75.00', '93.75', 15.00, '3.75', 5, '2022-07-08 14:31:16'),
(12, '', 8, 8, '22.50', '38.63', 15.00, '1.13', 5, '2022-09-08 14:41:44'),
(21, '', 19, 43, '30.00', '46.50', 15.00, '1.50', 5, '2022-06-11 17:46:37'),
(24, 'Knock at the door', 12, 8, '12.50', '28.13', 15.00, '0.63', 5, '2022-09-12 23:07:34'),
(25, '', 12, 8, '15.00', '30.75', 15.00, '0.75', 5, '2022-09-13 00:11:09'),
(26, 'Place at door', 35, NULL, '15.00', '30.75', 15.00, '0.75', 1, '2022-08-13 19:19:42'),
(31, '', 12, 43, '12.50', '28.13', 15.00, '0.63', 5, '2022-06-16 11:04:58'),
(32, '', 12, 8, '12.50', '28.13', 15.00, '0.63', 5, '2022-09-01 12:05:33'),
(35, 'Test', 19, 43, '25.00', '41.25', 15.00, '1.25', 5, '2022-07-19 23:15:44'),
(36, 'Test Test', 19, 43, '30.00', '46.50', 15.00, '1.50', 5, '2022-09-19 23:56:42'),
(37, 'test', 19, 43, '15.00', '30.75', 15.00, '0.75', 5, '2022-07-20 00:00:24'),
(38, 'test2', 19, 8, '10.50', '26.03', 15.00, '0.53', 5, '2022-08-20 00:00:33'),
(39, 'test3', 19, 8, '13.00', '28.65', 15.00, '0.65', 5, '2022-09-20 00:00:43'),
(40, 'test4', 19, 8, '17.50', '33.38', 15.00, '0.88', 5, '2022-09-20 00:00:59'),
(41, 'Please make sure that the products are in intact shape and form.', 19, 8, '30.00', '46.50', 15.00, '1.50', 5, '2022-06-21 18:59:09'),
(42, '', 12, 37, '12.50', '28.13', 15.00, '0.63', 5, '2022-09-21 19:22:16'),
(43, '', 12, 8, '11.00', '26.55', 15.00, '0.55', 5, '2022-09-21 19:23:09'),
(44, 'Please send me asap', 19, 8, '20.00', '36.00', 15.00, '1.00', 5, '2022-09-21 19:23:10'),
(45, 'I need my tofu now!!!!!!!!!!!!!!!!!!!!!!!', 19, 8, '15.50', '31.28', 15.00, '0.78', 5, '2022-09-21 19:23:57'),
(46, 'Fiiiiishhhhhh Sauuuuucceeeeeee Noooowwwwwww!!!!!!!!!!!', 19, 37, '5.00', '20.25', 15.00, '0.25', 5, '2022-08-21 19:26:35'),
(47, 'chips chips chips chips chips', 19, 37, '6.50', '21.83', 15.00, '0.33', 5, '2022-09-21 19:27:41'),
(48, 'Dal bhat power\r\n24 hour', 19, 37, '7.50', '22.88', 15.00, '0.38', 5, '2022-09-21 19:28:26'),
(49, 'ghiuuuuuu', 19, 8, '7.50', '22.88', 15.00, '0.38', 5, '2022-09-21 19:29:32'),
(50, 'masalllaaaaaa', 19, 8, '6.00', '21.30', 15.00, '0.30', 5, '2022-09-21 19:29:53'),
(51, '', 12, 8, '12.50', '28.13', 15.00, '0.63', 5, '2022-09-21 19:30:09'),
(52, '', 12, 8, '12.50', '28.13', 15.00, '0.63', 5, '2022-09-21 19:30:34'),
(53, '', 12, 43, '12.50', '28.13', 15.00, '0.63', 5, '2022-09-21 19:31:32'),
(54, '', 37, 43, '5.00', '20.25', 15.00, '0.25', 5, '2022-09-21 19:32:45'),
(55, '', 12, 37, '12.50', '28.13', 15.00, '0.63', 5, '2022-09-21 19:35:38'),
(56, '', 24, 37, '7.50', '22.88', 15.00, '0.38', 5, '2022-09-21 19:35:57'),
(57, '', 12, 37, '7.50', '22.88', 15.00, '0.38', 5, '2022-09-21 19:36:56'),
(58, '', 12, 37, '5.00', '20.25', 15.00, '0.25', 5, '2022-09-21 19:37:17'),
(59, 'Dov\'è la mia pasta?', 19, 37, '5.00', '20.25', 15.00, '0.25', 5, '2022-09-21 19:39:47'),
(60, 'Sel roti pakaune vanera tel magako aayena...', 19, 37, '10.00', '26.10', 15.00, '1.10', 5, '2022-09-21 19:44:02'),
(61, 'thanks!!', 12, 37, '11.00', '27.21', 15.00, '1.21', 5, '2022-09-29 00:03:54'),
(62, 'Call me when you reach', 12, 37, '10.00', '26.10', 15.00, '1.10', 5, '2022-09-29 12:45:33'),
(63, 'Fast', 19, 48, '52.50', '73.28', 15.00, '5.78', 5, '2022-09-30 14:00:47'),
(64, '', 12, 8, '11.00', '27.21', 15.00, '1.21', 5, '2022-10-02 00:04:36'),
(65, '', 12, 8, '5.00', '20.55', 15.00, '0.55', 5, '2022-10-02 00:11:34'),
(67, '', 48, 43, '30.00', '48.30', 15.00, '3.30', 1, '2022-10-05 20:40:30'),
(68, 'Leave at door', 19, 43, '24.00', '41.64', 15.00, '2.64', 1, '2022-10-06 14:42:41'),
(69, 'I want it fast hungry', 48, NULL, '37.50', '56.63', 15.00, '4.13', 0, '2022-10-06 14:43:28'),
(70, '', 35, 8, '5.00', '20.55', 15.00, '0.55', 1, '2022-10-06 14:45:04'),
(71, '', 50, 8, '18.00', '34.98', 15.00, '1.98', 5, '2022-10-06 14:57:36'),
(72, 'needed now....', 48, 8, '27.50', '45.53', 15.00, '3.03', 5, '2022-10-06 15:44:24'),
(73, '', 48, 8, '37.50', '56.63', 15.00, '4.13', 5, '2022-10-06 16:04:48'),
(74, 'Leave at door', 19, 43, '30.00', '48.30', 15.00, '3.30', 1, '2022-10-06 16:07:51'),
(75, 'i need fast', 48, 8, '41.50', '61.07', 15.00, '4.57', 5, '2022-10-06 16:52:32'),
(76, '', 48, 8, '55.00', '76.05', 15.00, '6.05', 1, '2022-10-06 17:04:51'),
(77, 'Quick?????', 48, 8, '47.50', '67.73', 15.00, '5.23', 5, '2022-10-06 17:29:52'),
(78, 'Where is Latino Grocery???', 48, 8, '63.00', '84.93', 15.00, '6.93', 5, '2022-10-06 18:12:12'),
(79, 'Fast!!!!', 48, 51, '20.00', '37.20', 15.00, '2.20', 5, '2022-10-06 18:31:41'),
(80, 'Test', 19, NULL, '5.00', '20.55', 15.00, '0.55', 0, '2022-10-06 18:34:27'),
(81, 'Need fast', 19, 51, '14.50', '31.10', 15.00, '1.60', 1, '2022-10-06 18:34:47'),
(82, 'Chips please', 19, 51, '11.00', '27.21', 15.00, '1.21', 1, '2022-10-06 18:35:07'),
(83, 'Leave at door', 19, 51, '10.00', '26.10', 15.00, '1.10', 1, '2022-10-06 18:35:33'),
(84, 'I want my delivery fast....', 48, 8, '65.00', '87.15', 15.00, '7.15', 5, '2022-10-07 23:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `custOrder_product`
--

DROP TABLE IF EXISTS `custOrder_product`;
CREATE TABLE IF NOT EXISTS `custOrder_product` (
  `custOrder_product_id` int NOT NULL AUTO_INCREMENT,
  `custOrderId` bigint NOT NULL,
  `productId` int NOT NULL,
  `quantity` int NOT NULL,
  `prodSubTotal` decimal(20,2) NOT NULL,
  PRIMARY KEY (`custOrder_product_id`),
  KEY `custOrder_product.productId` (`productId`),
  KEY `custOrder_product.custOrderId` (`custOrderId`)
) ENGINE=InnoDB AUTO_INCREMENT=206 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `custOrder_product`
--

INSERT INTO `custOrder_product` (`custOrder_product_id`, `custOrderId`, `productId`, `quantity`, `prodSubTotal`) VALUES
(40, 7, 6, 1, '5.00'),
(41, 7, 7, 1, '7.50'),
(42, 8, 6, 2, '10.00'),
(43, 8, 7, 2, '15.00'),
(44, 8, 9, 2, '15.00'),
(45, 9, 7, 1, '7.50'),
(46, 10, 7, 1, '7.50'),
(47, 10, 9, 2, '15.00'),
(48, 10, 6, 2, '10.00'),
(49, 11, 7, 10, '75.00'),
(50, 12, 6, 3, '15.00'),
(51, 12, 9, 1, '7.50'),
(74, 21, 6, 1, '5.00'),
(75, 21, 7, 1, '7.50'),
(76, 21, 9, 1, '7.50'),
(77, 21, 10, 1, '10.00'),
(85, 24, 6, 1, '5.00'),
(86, 24, 7, 1, '7.50'),
(87, 25, 9, 1, '7.50'),
(88, 25, 7, 1, '7.50'),
(89, 26, 9, 1, '7.50'),
(90, 26, 7, 1, '7.50'),
(99, 31, 6, 1, '5.00'),
(100, 31, 7, 1, '7.50'),
(101, 32, 7, 1, '7.50'),
(102, 32, 6, 1, '5.00'),
(106, 35, 7, 1, '7.50'),
(107, 35, 9, 1, '7.50'),
(108, 35, 10, 1, '10.00'),
(109, 36, 6, 1, '5.00'),
(110, 36, 7, 1, '7.50'),
(111, 36, 9, 1, '7.50'),
(112, 36, 10, 1, '10.00'),
(113, 37, 7, 1, '7.50'),
(114, 37, 9, 1, '7.50'),
(115, 38, 9, 1, '7.50'),
(116, 38, 16, 1, '3.00'),
(117, 39, 6, 1, '5.00'),
(118, 39, 11, 1, '8.00'),
(119, 40, 19, 1, '6.50'),
(120, 40, 18, 1, '6.00'),
(121, 40, 17, 1, '5.00'),
(122, 41, 6, 1, '5.00'),
(123, 41, 7, 1, '7.50'),
(124, 41, 9, 1, '7.50'),
(125, 41, 10, 1, '10.00'),
(126, 42, 6, 1, '5.00'),
(127, 42, 7, 1, '7.50'),
(128, 43, 6, 1, '5.00'),
(129, 43, 12, 1, '6.00'),
(130, 44, 6, 1, '5.00'),
(131, 44, 7, 1, '7.50'),
(132, 44, 9, 1, '7.50'),
(133, 45, 9, 1, '7.50'),
(134, 45, 16, 1, '3.00'),
(135, 45, 14, 1, '5.00'),
(136, 46, 6, 1, '5.00'),
(137, 47, 19, 1, '6.50'),
(138, 48, 9, 1, '7.50'),
(139, 49, 7, 1, '7.50'),
(140, 50, 12, 1, '6.00'),
(141, 51, 6, 1, '5.00'),
(142, 51, 7, 1, '7.50'),
(143, 52, 6, 1, '5.00'),
(144, 52, 7, 1, '7.50'),
(145, 53, 6, 1, '5.00'),
(146, 53, 7, 1, '7.50'),
(147, 55, 6, 1, '5.00'),
(148, 55, 7, 1, '7.50'),
(149, 56, 7, 1, '7.50'),
(150, 57, 9, 1, '7.50'),
(151, 58, 6, 1, '5.00'),
(152, 59, 17, 1, '5.00'),
(153, 60, 10, 1, '10.00'),
(154, 61, 6, 1, '5.00'),
(155, 61, 18, 1, '6.00'),
(156, 62, 6, 1, '5.00'),
(157, 62, 14, 1, '5.00'),
(158, 63, 7, 3, '22.50'),
(159, 63, 9, 4, '30.00'),
(160, 64, 18, 1, '6.00'),
(161, 64, 6, 1, '5.00'),
(162, 65, 6, 1, '5.00'),
(167, 67, 10, 1, '10.00'),
(168, 67, 9, 1, '7.50'),
(169, 67, 7, 1, '7.50'),
(170, 67, 6, 1, '5.00'),
(171, 68, 12, 4, '24.00'),
(172, 69, 6, 3, '15.00'),
(173, 69, 7, 2, '15.00'),
(174, 69, 9, 1, '7.50'),
(175, 70, 6, 1, '5.00'),
(176, 71, 11, 1, '8.00'),
(177, 71, 6, 2, '10.00'),
(178, 72, 6, 1, '5.00'),
(179, 72, 9, 3, '22.50'),
(180, 73, 9, 4, '30.00'),
(181, 73, 7, 1, '7.50'),
(182, 74, 9, 4, '30.00'),
(183, 75, 6, 3, '15.00'),
(184, 75, 7, 1, '7.50'),
(185, 75, 9, 1, '7.50'),
(186, 75, 19, 1, '6.50'),
(187, 75, 14, 1, '5.00'),
(188, 76, 6, 5, '25.00'),
(189, 76, 9, 4, '30.00'),
(190, 77, 6, 2, '10.00'),
(191, 77, 7, 5, '37.50'),
(192, 78, 6, 5, '25.00'),
(193, 78, 9, 2, '15.00'),
(194, 78, 18, 3, '18.00'),
(195, 78, 17, 1, '5.00'),
(196, 79, 6, 4, '20.00'),
(197, 80, 6, 1, '5.00'),
(198, 81, 11, 1, '8.00'),
(199, 81, 19, 1, '6.50'),
(200, 82, 12, 1, '6.00'),
(201, 82, 17, 1, '5.00'),
(202, 83, 10, 1, '10.00'),
(203, 84, 6, 3, '15.00'),
(204, 84, 7, 4, '30.00'),
(205, 84, 10, 2, '20.00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int NOT NULL,
  `feature` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `description`, `price`, `image`, `category_id`, `feature`, `active`) VALUES
(6, 'Fish Sauce', 'Best fish sauce with high quality', '5.00', '1660052048.jpg', 3, 1, 1),
(7, 'Ghee', 'Best Ghee ever', '7.50', '1660053085.jpg', 4, 0, 1),
(9, 'Rice', 'Best rice ever', '7.50', '1660055067.jpg', 5, 1, 1),
(10, 'Oil', 'Best Oli ever', '10.00', '1660199751.jpg', 6, 0, 1),
(11, 'Soy Sauce', 'Best Soy Sauce ever', '8.00', '1660200688.jpg', 5, 1, 1),
(12, 'Maesri brand curry pastes', 'Best curry paste ever', '6.00', '1660200749.jpg', 3, 1, 1),
(14, 'Tofu', 'Best tofu ever', '5.00', '1660477795.jpg', 7, 1, 1),
(16, 'Turmeric Powder', 'Best Turmeric ever', '3.00', '1660705274.jpg', 4, 0, 1),
(17, 'Pasta', 'Best Pasta ever', '5.00', '1660705638.jpg', 6, 0, 1),
(18, 'Margarine', 'Best Margarine ever', '6.00', '1660799084.jpg', 7, 1, 1),
(19, 'Chips', 'Best Chips ever', '6.50', '1660801653.jpeg', 6, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pwdReset`
--

DROP TABLE IF EXISTS `pwdReset`;
CREATE TABLE IF NOT EXISTS `pwdReset` (
  `pwdResetId` int NOT NULL AUTO_INCREMENT,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL,
  PRIMARY KEY (`pwdResetId`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pwdReset`
--

INSERT INTO `pwdReset` (`pwdResetId`, `pwdResetEmail`, `pwdResetSelector`, `pwdResetToken`, `pwdResetExpires`) VALUES
(40, 'roshani1997@gmail.com', '48b02bc8370e9508', '$2y$10$85Se7W7s15jgAHl83ZEb5O3zWZeSd6CMVnwg438MR.g7EUsVVi106', '1663287553'),
(41, 'Anamoldhakal@gmail.com', '090f4fb44d6b4a59', '$2y$10$8KC/X9JXtvhN2hlIDniHh.LuAlGVJ1MZNSakPrASNbR3qsfwnU5Hm', '1663328330'),
(42, '\" or \"\"=\"', '2e45a827c26adc10', '$2y$10$dsiwZb7fb3pdtLAgi0jWiOKCDx3azYZ4CjfF/sWTFjWUQUCFLxFka', '1663328855'),
(44, 'roshanimanandhar123@gmail.com', 'e19c645f32acb485', '$2y$10$rzGUeluOLIAqA7fTAqxiC.9Z.UMaqAReQFZ4uOdmNHql.1YEIPpAW', '1663862667'),
(45, 'n.sapkota@queensford.edu.au', '13f491b7b8b376aa', '$2y$10$bsffu7moh.NlzHboJiZZuu8rpImLuFetEcI9CoD9yfo2vL.aNQxhO', '1664513289'),
(46, 'narayan225@outlook.com', '80b77b54bfb48f9d', '$2y$10$tXTuHWnKXnI4GRPmJaw0GOdQ7SqOWrH6pgvD4VPnXqnxgfN85oO/.', '1665038548'),
(47, 'jessicabaguiojic@gmail.com', '9384d1f260bb43f7', '$2y$10$U2yV7n634YRpA.x1iSfgaO5eB55O7n5dKlEh37/d1mofnT2QngZm.', '1665044474'),
(48, 'alpinchewandy@gmail.com', '3ff5be0c24285778', '$2y$10$d9UdTtTjXKurv5t9NtKcj.JpI2GLGWPbNwr4LwGLTy8xAwW49Avya', '1665148744');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `role` int NOT NULL,
  `rolename` varchar(8) NOT NULL,
  `suspended` tinyint(1) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `postCode` varchar(10) NOT NULL,
  `transportation` varchar(25) NOT NULL,
  `license` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `erase` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role`, `rolename`, `suspended`, `email`, `password`, `firstname`, `lastname`, `phone`, `address`, `city`, `state`, `postCode`, `transportation`, `license`, `erase`) VALUES
(1, 1, 'Shopper', 1, 'test', '$2y$10$O/niXish1Zxklqsd4pCPuO/c36EdwRSAGwNApgqrvM0dCoLGyZPXO', 'New', 'User', '0456023324', '', '', '', '', '', '', 0),
(3, 2, 'Picker', 0, 'picker123@gmail.com', 'picker', 'Picker', 'Test', '0412345567', '23', 'west', 'SA', '5000', 'Motor Cycle', '', 1),
(6, 1, 'Shopper', 0, 'narayan@gmail.com', '$2y$10$8PAx5ZrZXQoIqGK6IsyooOBe5Ffu.ahDVW07aIAlBXpt0FZRlwuMi', 'Narayan', 'Sapkota', '0489531243', '114 miller st', 'adelaide', 'SA', '5000', '', '', 0),
(7, 1, 'Shopper', 0, 'roshani@gmail.com', '$2y$10$yeEqXQ7Um/cj5T7rcA6muub.p3njJNDAjGXy2fKvGqFjY7Q5yxoMm', 'Roshani', 'Manandhar', '0406484382', '69A Brooker Terrace', 'Adelaide', 'SA', '5033', '', '', 1),
(8, 2, 'Picker', 0, 'alpinchewandy@gmail.com', '$2y$10$IhFNuZElmOhntTCjKvElL.GuhINAKURsl7ewt.d6Mzdw92ZMM1BOa', 'Alpin', 'Chewandy', '0490213014', '103 Waymouth st', 'ADELAIDE', 'SA', '5000', 'Car', 'KTP789456', 0),
(9, 1, 'Shopper', 0, 'sujan77@gmail.com', '$2y$10$cyWU8PiELw5NHyxOdJMDB.rvDWJKAzuL2u4oZDrXJjOpb7GUDiVmu', 'Sujan', 'Poudel', '0433800713', 'northfield', 'Prospect', 'SA', '5085', '', '', 0),
(10, 2, 'Picker', 0, 'rejuan_1998@yahoo.com', '$2y$10$KPu0mNuDVrUGQer6tgymbexEoIg6mEJ6issob7LnOV87DLwGJa4eu', 'Md Rejuan', 'Rijvi', '0410126835', '843 Grand Junction Road', 'Valley View', 'SA', '5093', 'Car', 'S154863', 0),
(11, 1, 'Shopper', 0, 'samsmith1@gmail.com', '$2y$10$oBihmt1O.extIXNFzNTczOq1Ffs8JZR.nBSL/gzdqVQ3YEulm9hZC', 'Sam', 'Smith', '0406484381', '4 Curie street', 'Adealaide', 'SA', '5000', '', '', 1),
(12, 1, 'Shopper', 0, 'kia@gmail.com', '$2y$10$Wf1oc4LnVqNZbQTdaBu0dueJgGxhr19J4KGABd4KT7ctZ6dtfXK5m', 'kia', 'karki', '0412345678', '33 rundle street ', 'adelaide', 'SA', '5000', '', '', 0),
(13, 1, 'Shopper', 1, 'john@gmail.com', '$2y$10$7NIU8dFBTI6JUGJUCAErmuubqcPwHMysXAWLJC/7AjvB.spp0pXI2', 'John', 'Smith', '0487412550', '123 pirie st', 'adelaide', 'SA', '5000', '', '', 0),
(15, 2, 'Picker', 0, 'james12@gmail.com', '$2y$10$4BX7Fhk8v4uf//zdxJaMVOQ013Yb/wFxMZ2AFO8epDMDECAshVy6.', 'James', 'Jones', '0478545462', '34 Grenfell st', 'ADELAIDE', 'SA', '5000', 'Car', 'GG478513', 0),
(17, 2, 'Picker', 0, 'india@yahoo.com', '$2y$10$E35NFMhJuXMxMHyPon9HXearWxyFM6lnuEOIM5ytNuXZYLOs40OG.', 'India', 'Belo', '0458795446', '23 rundel st', 'ADELAIDE', 'SA', '5000', 'Car', 'TR78452', 1),
(18, 1, 'Shopper', 0, 'sivli@hotmail.com', '$2y$10$3KLUuswdHUA9y53nKIS9j.ZUyPZf.oVhh9qvkdOVtkVTtvxIZXAY.', 'Silvi', 'Joe', '0477741114', '34 Grenfell st', 'ADELAIDE', 'SA', '5000', '', '', 0),
(19, 1, 'Shopper', 0, 'narayan225@outlook.com', '$2y$10$J5oXK9fb8y4nClEHQp807ebWhLvcOXu8CNGlpCBZvSv4oO03WjZ/a', 'Narayan', 'Sapkota', '0426035532', '16 Chalani Crescent', 'Hallett Cove', 'SA', '5158', '', '', 0),
(20, 1, 'Shopper', 0, 'ccalvillo@gmail.com', '$2y$10$LUBtwsqu.KMWgVAiujlpAeoU3w2Pw5igOZH0kR.zoEI2v7H0aCqZy', 'Cristian', 'Calvillo', '0422594737', 'sasa', 'delaide', 'SA', '5023', '', '', 0),
(21, 2, 'Picker', 0, 'rob@gmail.com', '$2y$10$HBKV6ZbM/RGJ1SyOKfZvH.8ZgDIv6IACA39tRLCOTTrOQ6AZgfH2u', 'Rob', 'Jaden', '0412345678', '100Pitt street', 'Adelaide', 'SA', '5033', 'Car', '222', 0),
(22, 1, 'Shopper', 0, 'joycesari85@gmail.com', '$2y$10$TefI.BQ686Uad7hzC0Sdb.prfbYXBu0GDaDaKke43CojBKeZ18GfG', 'joysca', 'sari', '0402323243', '40 batley avenau', 'adelaide', 'SA', '5051', '', '', 0),
(23, 2, 'Picker', 0, 'aqcdpr455@gmail.com', '$2y$10$knxyB1xqkOCVMbFUGOthYuGSkJIhaIZ.uuelEvvUJwYot.pVbQZAK', 'Narayan', 'tETS', '0426035532', 'sgdf', 'sfgds', 'SA', '5118', '', '', 1),
(24, 1, 'Shopper', 0, 'rejuan.rijvi1998@gmail.com', '$2y$10$zeImMj3uhpnxdPztn3GiS.HHHFwpFUx15loo3WyCl4sl/MjpPSiVC', 'Md Rejuan', 'Rijvi', '0410126835', '843 Grand Junction Road', 'Valley View', 'SA', '5093', '', '', 0),
(25, 1, 'Shopper', 0, 'roshanimanandhar123@gmail.com', '$2y$10$CukAqREeCeD7dqKwE3UjY.dvc.Yb9VsIPpfZUXfYJRQcKstUKaVIC', 'Roshani', 'Manandhar', '0406484382', '2 Curie Street', 'Adelaide', 'SA', '5033', '', '', 0),
(26, 2, 'Picker', 0, 'abc@gmail.com', '$2y$10$/LKKWlFRpcH62bXnMQEskeoUlZf0QSS4uSKAlkex/8yKiYAo64.ju', 'Sujan', 'Pou', '0433800713', 'Northfield', 'Adelaide', 'SA', '5085', 'Car', '', 0),
(27, 1, 'Shopper', 1, 'abc1@gmail.com', '$2y$10$.cH5NfFWl2ZVipUdGk9biOwY7doyka5PikpbSN8XhwYJ9f37F0fX.', 'Sujan', 'Pou', '0433800713', 'Northfield', 'Adelaide', 'SA', '5085', '', '', 0),
(28, 1, 'Shopper', 0, 'wendy@gmail.com', '$2y$10$lRlldi83QwtzZHTd3PqW/uEygnIMiosZ9TbRDPagyS7bPtQVTwEkG', 'Wendy', 'Smith', '0490123005', '64 Currie st', 'Adelaide', 'SA', '5000', '', '', 0),
(29, 2, 'Picker', 0, 'tomas@yahoo.com', '$2y$10$neLOAgsg2XCiX9mbIJ/n1./LJLrRkLT4R1NtRGnIxRq35LnoCzCQq', 'Thomas', 'Jones', '0481506559', '32 Grenfell st', 'Adelaide', 'SA', '5000', 'Car', 'FI1459645X', 1),
(30, 1, 'Shopper', 0, 'yuni@outlook.com', '$2y$10$VDqBWgZRhAyHgNiHK4clo.6f9JC37xzkTExkNyoZB5j6wUS7Ul4f.', 'Yuni', 'Gold', '0490513559', '89 Currie st', 'Adelaide', 'SA', '5000', '', '', 1),
(31, 1, 'Shopper', 0, 'rejuan_998@yahoo.com.com', '$2y$10$MQBWVq66aLQhOX3MVLAdfe6O9b6BnGbYCq9xfir5q9R6RdFjl6WUS', 'Md Rejuan', 'Rijvi', '0410126835', '843 Grand Junction Road', 'Valley View', 'SA', '5093', '', '', 0),
(32, 1, 'Shopper', 0, 'mike@iibit.com', '$2y$10$NTOjcIDmdGneqq1goR.6Eu3PHWzGFez4hD1aVXU6cD9s2DqJ522Ue', 'Mike', 'Vu', '0490587995', '32 Currie', 'Adelaide', 'SA', '5000', '', '', 1),
(34, 1, 'Shopper', 0, 'narayan445@gmail.com', '$2y$10$yzNtli69GGBWE2VfCcSYUu3OEGkBwicgxocPioB1oxKMlcPOJUJc6', 'John', 'Smith', '0426035532', '16 Chalani Cres', 'Hallett COVE', 'SA', '5158', '', '', 1),
(35, 1, 'Shopper', 0, 'poudelsuzan77@gmail.com', '$2y$10$8HK40A3aSObMbE0c54qZV.cNh4rwrxhuIBNpp9Q1h4XOhYxwVXsVS', 'Sujan', 'poudel', '0433800713', 'Northfield', 'Adelaide', 'SA', '5085', '', '', 0),
(36, 2, 'Picker', 0, '30401780@students.federation.edu.au', '$2y$10$oSgXSpTDaGhR0ZEw/42zY.YO11oTCMSAq.Vh4yG6jZEEnTqn8/UzO', 'sujan', 'poudel', '0433800713', 'Northfield', 'Adelaide', 'SA', '5085', 'Car', 'g12345', 0),
(37, 2, 'Picker', 0, 'jayn123@gmail.com', '$2y$10$KK2ybiE4mleUv0AQl5Saeu363MJagzOZctDNuTvcUhNscGhu1PRqW', 'Jayn', 'Malik', '0412312312', '2Richmond Road', 'Adelaide', 'SA', '5000', 'Car', 'Abc123', 0),
(38, 1, 'Shopper', 0, 'example@gmail.com', '$2y$10$JBKiPabvWkcxPILyIYVlPeicOfl2EaqjOq.QlRd9A2adTyaHg8T2K', 'Hello', 'World', '0404040404', 'kjasdhk jashd', 'Adelaide', 'SA', '5000', '', '', 0),
(39, 1, 'Shopper', 0, 'khatrianish395@gmail.com', '$2y$10$DOEv/BmKli9Af8swoxVKUO3ZhgHAycPEzfrl1h/WRLEAojwu7dd4m', 'Anish ', 'Khatri ', '0406108395', '9 Charles Street, Ascot Park, Sa ', 'Adelaide', 'SA', '5048', '', '', 0),
(40, 2, 'Picker', 0, 'your.email+fakedata32564@gmail.com', '$2y$10$ahb0VWoBzRUZfHQMSIN3IOy9aD4jt3p0vicU2naGvjqi6O4OvZKi2', 'Lucile Hermann', 'Fred Keebler', '0412345678', '57101 Tiana Brooks', 'East Lexi', 'TAS', '3103', 'Motor Cycle', 'Ipsa sunt non occaecati consectetur eum tempora hic.', 1),
(41, 1, 'Shopper', 0, 'your.email+fakedata31989@gmail.com', '$2y$10$hdlGewwl.PVjJSDnFFL3puM7F/4zFWZvi9U.BdiLXF9OsmumBB3eK', 'Imani Harvey', 'Anissa Gleason', '0412345678', '133 Abshire Views', 'West Maureen', 'NSW', '0241', '', '', 1),
(42, 1, 'Shopper', 0, 'test@123mail.com', '$2y$10$2Yj1O6.bNlLlYwjkMysRyuS/4PURuKCUfvgSf2fDJlQOzFfj8oDRa', 'test123', 'Test', '0412345678', 'ajsdnfkl', 'askdfjnjk', 'NT', '5158', '', '', 0),
(43, 2, 'Picker', 0, 'testpicker@gmail.com', '$2y$10$6/QGAISDta38/t7gHZ5j1O.jun4fPoPYHVYwCc.JyyoqKNRmNFSYm', 'Picker', 'Test', '0426035532', 'Test Picker AVE', 'Hobart', 'TAS', '5152', 'Car', 'S217CKS', 0),
(44, 1, 'Shopper', 0, 'roshani123@gmail.com', '$2y$10$fONNcUBmZOgnUXqvJwca7O6JeT4Ilt57skzqHYXFbWqcVD3Zt0QvC', 'Roshani', 'Manandhar', '0406485388', '2 Curie Street', 'Adelaide', 'SA', '5033', '', '', 0),
(45, 1, 'Shopper', 0, 'roshani1997@gmail.com', '$2y$10$EeqtbKXlIeI1ASYkF7tB4eJXRsWVuD9Q0YcZkZ/9olcxN0BoxzNIe', 'Roshani', 'Manandhar', '0406485388', '2 Curie Street', 'Adelaide', 'SA', '5033', '', '', 0),
(46, 2, 'Picker', 0, 'roysmith123@gmail.com', '$2y$10$3VqnVvSue2Bg9tPZwNLN2.EkYnZPj8O3Vcghw./7FEcox9wmXYES6', 'Roy', 'Smith', '0403888999', '22 clare street', 'Adelaide', 'SA', '5000', 'Car', 'way888', 0),
(48, 1, 'Shopper', 0, 'silviagho@gmail.com', '$2y$10$ON4W/P5quTtON1zOX1Y3Vu3I60sgO6tvT5aAeZ6LfkRuJHW9zcZSO', 'Silvia', 'Gho', '0487951556', '02 Grenfell st', 'ADELAIDE', 'SA', '5000', '', '', 0),
(49, 1, 'Shopper', 0, 'test123@gmail.com', '$2y$10$SHoilmPTW/bwfKJQo2BLc.qWvOmOoE86a6xjzTT.Wt4vdheK19RDi', 'Test', 'Test', '0406123123', '1Henley street', 'Adelaide', 'SA', '2077', '', '', 0),
(50, 1, 'Shopper', 0, 'zeetech3000@gmail.com', '$2y$10$yo/Z2wsoa3AQOdXyXi/PxesE9nrtv4TwAH.g9RRSXx8E9fPJ44UD6', 'zee', 'jj', '0416473009', 'portrush road', 'Adelaide', 'SA', '5000', '', '', 0),
(51, 2, 'Picker', 0, 'jessicabaguiojic@gmail.com', '$2y$10$dfc2pg.KYmIQJRD7kWMXQOrdmCCc2bmOewkAOB5waQrqsjOW2GPE.', 'Jessica', 'Ha', '0488443706', 'prospect', 'adelaide', 'SA', '5082', 'Bicycle', '', 0),
(52, 1, 'Shopper', 0, 'testtest@gmail.com', '$2y$10$kcGDBMpBDtXeSOv0MMTZVu46cvKM8/zy15264MRMAYfIYFTKaVBfS', 'Test', '123', '0404123123', '123', 'city', 'SA', '5000', '', '', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `custOrder`
--
ALTER TABLE `custOrder`
  ADD CONSTRAINT `custOrder.pickerId` FOREIGN KEY (`pickerId`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `custOrder.shopperId` FOREIGN KEY (`shopperId`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `custOrder_product`
--
ALTER TABLE `custOrder_product`
  ADD CONSTRAINT `custOrder_product.custOrderId` FOREIGN KEY (`custOrderId`) REFERENCES `custOrder` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `custOrder_product.productId` FOREIGN KEY (`productId`) REFERENCES `product` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;
