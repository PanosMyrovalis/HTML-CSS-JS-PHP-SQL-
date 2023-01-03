-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 03 Ιουλ 2020 στις 11:17:59
-- Έκδοση διακομιστή: 10.1.38-MariaDB
-- Έκδοση PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `myeshop`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `brands`
--

CREATE TABLE `brands` (
  `brand_id` mediumint(8) UNSIGNED NOT NULL,
  `brand_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`) VALUES
(1, 'Apple'),
(2, 'Samsung'),
(3, 'Xiaomi'),
(4, 'Huawei'),
(5, 'Alcatel');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `customers`
--

CREATE TABLE `customers` (
  `customer_id` mediumint(8) UNSIGNED NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pass` char(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `customers`
--

INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `email`, `pass`) VALUES
(44, 'ewfew', 'efwfwe', 'eq2iujhneq3wujiqe', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(45, 'Panagiotis', 'Myrovalis', 'panosmyro@gmail.com', 'fc1200c7a7aa52109d762a9f005b149abef01479'),
(46, 'Panagiotis', 'fewwef', 'panosmyro@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(47, 'Panagiotis', 'Myrovalis', 'panosmyro@gmail.com', 'fc1200c7a7aa52109d762a9f005b149abef01479'),
(48, 'Panagiotis', 'Myrovalis', 'panosmyro@gmail.com421', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(49, 'Panagiotis', 'Myrovalis', 'panosmyro@gmail.com', 'fc1200c7a7aa52109d762a9f005b149abef01479'),
(50, 'Panagiotis', 'Myrovalis', 'panosmyro@gmail.com', 'fc1200c7a7aa52109d762a9f005b149abef01479'),
(51, 'Panagiotis', 'Myrovalis', 'panosmyro@gmail.com', 'fc1200c7a7aa52109d762a9f005b149abef01479'),
(52, '123', '352', '43t', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(53, 'mitsos', 'tsitsos', '123', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(54, '789', '789', '789', 'fc1200c7a7aa52109d762a9f005b149abef01479'),
(69, 'Panagiotis', 'Myrovalis', 'gmail', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(70, 'Panagiotis', 'Myrovalis', 'gmail', '51eac6b471a284d3341d8c0c63d0f1a286262a18'),
(71, 'giannis', 'giannis', 'windowslive', 'fc1200c7a7aa52109d762a9f005b149abef01479'),
(72, 'Panagiotis', 'Myrovalis', 'gmail', '51eac6b471a284d3341d8c0c63d0f1a286262a18'),
(73, 'Dimitris', 'Tsitsos', 'tsitsos@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(74, 'Î“ÎµÏ‰ÏÎ³Î¯Î±', 'ÎœÏ€Î±ÏÎ´Î¬ÎºÎ·', 'hotmail', 'fc1200c7a7aa52109d762a9f005b149abef01479'),
(75, 'Panagiotis', 'Myrovalis', 'zxc', 'fc1200c7a7aa52109d762a9f005b149abef01479'),
(76, 'vasilis', 'aleksinakis', 'gmail', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(77, 'maria', 'andreou', 'qwe', 'fc1200c7a7aa52109d762a9f005b149abef01479'),
(78, 'Panagiotis', 'Myrovalis', 'gmail', 'fc1200c7a7aa52109d762a9f005b149abef01479'),
(79, 'giannis', 'tsimitselis', 'gmail', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(80, 'qwdwwq', 'efewwe', 'popa', '51eac6b471a284d3341d8c0c63d0f1a286262a18');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `orders`
--

CREATE TABLE `orders` (
  `order_id` mediumint(8) UNSIGNED NOT NULL,
  `customer_id` mediumint(8) UNSIGNED NOT NULL,
  `total` decimal(10,2) UNSIGNED NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `total`, `order_date`) VALUES
(1, 1, '178.93', '2020-06-09 09:41:41'),
(2, 1, '178.93', '2020-06-09 09:42:50'),
(3, 1, '178.93', '2020-06-09 09:43:38'),
(4, 1, '178.93', '2020-06-09 09:44:12'),
(5, 1, '178.93', '2020-06-09 10:25:10'),
(6, 1, '178.93', '2020-06-09 10:28:41'),
(7, 62, '178.93', '2020-06-09 10:35:14'),
(8, 62, '0.00', '2020-06-09 10:37:02'),
(9, 62, '1.00', '2020-06-09 10:37:45'),
(10, 62, '175.00', '2020-06-09 10:37:56'),
(11, 62, '175.00', '2020-06-09 10:37:56'),
(12, 62, '175.00', '2020-06-09 10:37:57'),
(13, 62, '175.00', '2020-06-09 10:37:57'),
(14, 62, '175.00', '2020-06-09 10:37:57'),
(15, 62, '175.00', '2020-06-09 10:37:58'),
(16, 62, '178.93', '2020-06-09 10:38:13'),
(17, 62, '178.93', '2020-06-09 10:38:13'),
(18, 62, '178.93', '2020-06-09 10:38:13'),
(19, 62, '178.93', '2020-06-09 10:38:19'),
(20, 62, '178.93', '2020-06-09 10:51:28'),
(21, 62, '178.93', '2020-06-09 10:51:53'),
(22, 62, '178.93', '2020-06-09 10:52:09'),
(23, 62, '178.93', '2020-06-09 10:52:16'),
(24, 62, '178.93', '2020-06-09 10:52:42'),
(25, 62, '178.93', '2020-06-09 10:53:12'),
(26, 62, '178.93', '2020-06-09 10:53:19'),
(27, 62, '178.93', '2020-06-09 10:53:44'),
(28, 62, '178.93', '2020-06-09 10:55:36'),
(29, 62, '178.93', '2020-06-09 14:01:28'),
(30, 62, '178.93', '2020-06-09 14:13:56'),
(31, 62, '178.93', '2020-06-09 14:14:05'),
(32, 62, '178.93', '2020-06-09 14:15:23'),
(33, 62, '178.93', '2020-06-09 14:16:44'),
(34, 62, '178.93', '2020-06-09 14:18:05'),
(35, 62, '178.93', '2020-06-09 14:21:35'),
(36, 62, '178.93', '2020-06-09 14:24:15'),
(37, 62, '178.93', '2020-06-09 14:24:21'),
(38, 62, '178.93', '2020-06-09 14:24:34'),
(39, 62, '178.93', '2020-06-09 14:26:34'),
(40, 62, '178.93', '2020-06-09 14:31:59'),
(41, 62, '178.93', '2020-06-09 14:34:44'),
(42, 62, '178.93', '2020-06-09 14:35:00'),
(43, 62, '178.93', '2020-06-09 14:40:38'),
(44, 62, '178.93', '2020-06-09 14:41:31'),
(45, 62, '178.93', '2020-06-09 14:41:45'),
(46, 62, '178.93', '2020-06-09 14:41:57'),
(47, 62, '178.93', '2020-06-09 14:44:14'),
(48, 62, '178.93', '2020-06-09 14:44:15'),
(49, 62, '178.93', '2020-06-09 14:44:15'),
(50, 62, '178.93', '2020-06-09 14:44:25'),
(51, 62, '178.93', '2020-06-09 14:44:35'),
(52, 62, '178.93', '2020-06-09 14:44:35'),
(53, 62, '178.93', '2020-06-09 14:44:36'),
(54, 62, '178.93', '2020-06-09 14:44:36'),
(55, 62, '178.93', '2020-06-09 14:44:36'),
(56, 62, '178.93', '2020-06-09 14:44:36'),
(57, 62, '178.93', '2020-06-09 14:44:46'),
(58, 62, '178.93', '2020-06-09 14:45:34'),
(59, 62, '178.93', '2020-06-09 14:45:36'),
(60, 62, '178.93', '2020-06-09 14:45:49'),
(61, 62, '178.93', '2020-06-09 14:45:49'),
(62, 62, '178.93', '2020-06-09 14:46:02'),
(63, 62, '178.93', '2020-06-09 14:47:27'),
(64, 62, '178.93', '2020-06-09 14:47:28'),
(65, 62, '178.93', '2020-06-09 14:47:28'),
(66, 62, '178.93', '2020-06-09 14:47:51'),
(67, 62, '178.93', '2020-06-09 14:47:52'),
(68, 62, '178.93', '2020-06-09 14:47:52'),
(69, 62, '178.93', '2020-06-09 14:48:09'),
(70, 62, '178.93', '2020-06-09 14:48:14'),
(71, 62, '178.93', '2020-06-09 14:48:15'),
(72, 62, '178.93', '2020-06-09 14:48:17'),
(73, 62, '178.93', '2020-06-09 14:48:27'),
(74, 62, '178.93', '2020-06-09 14:49:03'),
(75, 62, '178.93', '2020-06-09 14:49:07'),
(76, 62, '178.93', '2020-06-09 14:50:24'),
(77, 62, '178.93', '2020-06-09 14:51:01'),
(78, 62, '178.93', '2020-06-09 14:51:15'),
(79, 62, '178.93', '2020-06-09 14:51:24'),
(80, 62, '178.93', '2020-06-09 14:51:40'),
(81, 62, '178.93', '2020-06-09 14:51:51'),
(82, 62, '178.93', '2020-06-09 14:58:38'),
(83, 62, '178.93', '2020-06-09 14:59:46'),
(84, 62, '178.93', '2020-06-09 15:00:16'),
(85, 62, '178.93', '2020-06-09 20:30:02'),
(86, 62, '178.93', '2020-06-09 20:30:17'),
(87, 62, '178.93', '2020-07-02 12:34:16'),
(88, 62, '178.93', '2020-07-02 12:34:39'),
(89, 62, '178.93', '2020-07-02 12:48:53'),
(90, 62, '178.93', '2020-07-02 13:29:15'),
(91, 62, '178.93', '2020-07-02 13:38:30'),
(92, 72, '178.93', '2020-07-02 15:40:53'),
(93, 73, '178.93', '2020-07-03 07:24:59');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `order_contents`
--

CREATE TABLE `order_contents` (
  `oc_id` mediumint(8) UNSIGNED NOT NULL,
  `order_id` mediumint(8) UNSIGNED NOT NULL,
  `smartphone_id` mediumint(8) UNSIGNED NOT NULL,
  `quantity` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `price` decimal(6,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `order_contents`
--

INSERT INTO `order_contents` (`oc_id`, `order_id`, `smartphone_id`, `quantity`, `price`) VALUES
(1, 1, 2, 1, '599.99'),
(2, 1, 3, 1, '399.99'),
(3, 2, 2, 1, '599.99'),
(4, 2, 3, 1, '399.99'),
(5, 2, 1, 1, '799.99'),
(6, 3, 8, 1, '319.99'),
(7, 3, 7, 1, '689.99'),
(8, 4, 8, 1, '319.99'),
(9, 5, 1, 1, '799.99'),
(10, 6, 8, 1, '319.99'),
(11, 6, 7, 10, '689.99'),
(12, 7, 1, 1, '799.99'),
(13, 7, 8, 1, '319.99'),
(14, 8, 1, 1, '799.99'),
(15, 8, 4, 1, '299.99'),
(16, 8, 3, 1, '399.99'),
(17, 19, 8, 1, '319.99'),
(18, 20, 2, 2, '599.99'),
(19, 23, 2, 1, '599.99'),
(20, 26, 8, 1, '319.99'),
(21, 27, 8, 1, '319.99'),
(22, 28, 7, 1, '689.99'),
(23, 29, 1, 1, '799.99'),
(24, 29, 2, 1, '599.99'),
(25, 30, 8, 2, '319.99'),
(26, 30, 7, 3, '689.99'),
(27, 31, 8, 1, '319.99'),
(28, 32, 8, 1, '319.99'),
(29, 32, 7, 1, '689.99'),
(30, 33, 7, 4, '689.99'),
(31, 33, 3, 1, '399.99'),
(32, 33, 1, 1, '799.99'),
(33, 34, 4, 1, '299.99'),
(34, 37, 7, 1, '689.99'),
(35, 38, 7, 1, '689.99'),
(36, 39, 3, 1, '399.99'),
(37, 40, 7, 1, '689.99'),
(38, 41, 3, 1, '399.99'),
(39, 43, 8, 1, '319.99'),
(40, 73, 8, 1, '319.99'),
(41, 76, 8, 2, '319.99'),
(42, 80, 8, 1, '319.99'),
(43, 81, 2, 1, '599.99'),
(44, 82, 8, 1, '319.99'),
(45, 83, 1, 1, '799.99'),
(46, 84, 8, 3, '319.99'),
(47, 85, 7, 1, '689.99'),
(48, 86, 7, 3, '689.99'),
(49, 87, 8, 1, '319.99'),
(50, 88, 7, 1, '689.99'),
(51, 89, 2, 2, '599.99'),
(52, 89, 8, 1, '319.99'),
(53, 90, 8, 1, '319.99'),
(54, 91, 1, 1, '799.99'),
(55, 92, 8, 2, '319.99'),
(56, 92, 3, 1, '399.99'),
(57, 93, 2, 1, '599.99'),
(58, 93, 3, 2, '399.99');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `smartphones`
--

CREATE TABLE `smartphones` (
  `smartphone_id` mediumint(8) UNSIGNED NOT NULL,
  `brand_id` mediumint(8) UNSIGNED NOT NULL,
  `smartphone_name` varchar(40) NOT NULL,
  `price` decimal(6,2) UNSIGNED NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `smartphones`
--

INSERT INTO `smartphones` (`smartphone_id`, `brand_id`, `smartphone_name`, `price`, `description`, `image_name`) VALUES
(1, 1, 'Iphone 11', '799.99', 'Iphone 11 (gold)', '1'),
(2, 1, 'Iphone X', '599.99', 'Iphone X (silver)', '2'),
(3, 3, 'Xiaomi P20', '399.99', 'Xiaomi P20 (black)', '3'),
(4, 3, 'Xiaomi Redmi Note 8', '299.99', 'Xiaomi Redmi Note 8 (silver)', '4'),
(5, 2, 'Samsung Galaxy Note 10', '689.99', 'Samsung Galaxy Note 10 (silver)', '5'),
(6, 2, 'Samsung Galaxy A20', '319.99', 'Samsung Galaxy A20 (black)', '6');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Ευρετήρια για πίνακα `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Ευρετήρια για πίνακα `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Ευρετήρια για πίνακα `order_contents`
--
ALTER TABLE `order_contents`
  ADD PRIMARY KEY (`oc_id`);

--
-- Ευρετήρια για πίνακα `smartphones`
--
ALTER TABLE `smartphones`
  ADD PRIMARY KEY (`smartphone_id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT για πίνακα `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT για πίνακα `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT για πίνακα `order_contents`
--
ALTER TABLE `order_contents`
  MODIFY `oc_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT για πίνακα `smartphones`
--
ALTER TABLE `smartphones`
  MODIFY `smartphone_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
