-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 14, 2022 at 02:53 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
