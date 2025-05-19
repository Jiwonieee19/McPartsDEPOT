-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2025 at 07:31 PM
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
-- Database: `mcparts_trial`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `apid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `msg` varchar(250) NOT NULL,
  `apcreation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`apid`, `userid`, `username`, `email`, `lastname`, `status`, `msg`, `apcreation`) VALUES
(23, 23, 'Ale', 'ale@bbl.com', 'Francis', 'PENDING', 'Concern: COUGH - Naa koy cancer', '2025-03-13 15:41:26'),
(24, 25, 'Yoshy', 'yoshy@email.com', 'Batula', 'PENDING', 'Concern: OTHER - I have hubak', '2025-03-13 15:43:31'),
(34, 13, 'ryytry5', 'ryan@gmail.com', 'Compuesto', 'PENDING', 'Concern: FLU - whatdafak', '2025-03-19 14:00:45');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cart_id`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-05-14 17:09:28', '2025-05-14 17:09:28'),
(2, 2, '2025-05-14 17:09:28', '2025-05-14 17:09:28'),
(3, 4, '2025-05-14 17:09:28', '2025-05-14 17:09:28'),
(4, 5, '2025-05-14 17:09:28', '2025-05-14 17:09:28'),
(6, 7, '2025-05-18 15:23:42', '2025-05-18 15:23:42');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(20) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_fullname` varchar(50) NOT NULL,
  `customer_email` varchar(50) DEFAULT NULL,
  `customer_contact` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_fullname`, `customer_email`, `customer_contact`, `created_at`) VALUES
(1, 'Kevin Igitzzz', 'kigit@example.com', '09088185555', '2025-05-08 01:16:37'),
(2, 'Bob Marley', 'bmarley@example.com', '09888172632', '2025-05-08 01:16:37'),
(4, 'Reyan Compuesto', 'rcompousto@gmail.com', '09302390432', '2025-05-08 15:03:00'),
(5, 'Mang Kepweng', 'mkepweng@gmail.com', '09182729372', '2025-05-08 15:06:25'),
(7, 'Benedetta Ducatti', 'bducatti@gmail.com', '09812837199', '2025-05-18 15:23:42');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `hisid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `apid` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `msg` varchar(250) NOT NULL,
  `hismsg` varchar(250) NOT NULL,
  `apcreation` datetime NOT NULL,
  `hiscreation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`hisid`, `userid`, `username`, `email`, `lastname`, `apid`, `status`, `msg`, `hismsg`, `apcreation`, `hiscreation`) VALUES
(13, 13, 'ryytry5', 'ryan@gmail.com', 'Compuesto', 18, 'APPROVED', 'Concern: OTHER - TRYYY RENAME ATTEMPT 10022424QR1', 'try with delete', '2025-03-13 04:23:02', '2025-03-13 07:42:51'),
(14, 12, 'ryytry4', 'ryan@gmail.com', 'Compuesto', 15, 'DECLINED', 'Concern: FEVER - dvvdsv', '1st try decline', '2025-03-12 11:50:24', '2025-03-13 08:45:21'),
(15, 13, 'ryytry5', 'ryan@gmail.com', 'Compuesto', 19, 'APPROVED', 'Concern: OTHER - try approved view', 'tryyyyy this ', '2025-03-13 09:39:28', '2025-03-13 09:40:03'),
(18, 27, 'Mheil', 'mheil@gmail.com', 'Cenita', 21, 'APPROVED', 'Concern: FLU - agay', 'yes', '2025-03-13 15:08:18', '2025-03-13 15:09:01'),
(19, 27, 'Mheil', 'mheil@gmail.com', 'Cenita', 22, 'DECLINED', 'Concern: OTHER - asdgasda', '', '2025-03-13 15:11:53', '2025-03-13 15:12:02'),
(20, 11, 'ryytry3', 'ryan@gmail.com', 'Compuesto', 10, 'APPROVED', 'Concern: FLU - updated', '', '2025-03-11 12:00:15', '2025-03-13 15:57:29'),
(21, 15, 'JV', 'j@email.com', 'Batula', 26, 'APPROVED', 'Concern: COUGH - Naay dugo ang ubo', '', '2025-03-13 15:46:50', '2025-03-13 15:57:34'),
(22, 16, 'Fe', 'fe@gmail.com', 'Malasarte', 27, 'DECLINED', 'Concern: OTHER - Heavy Migraine', '', '2025-03-13 15:47:33', '2025-03-13 15:57:39'),
(23, 17, 'Miya', 'miya@skype.com', 'Balmond', 28, 'DECLINED', 'Concern: FLU - ', '', '2025-03-13 15:49:35', '2025-03-13 15:57:42'),
(24, 18, 'Gwen', 'g@email.com', 'Peralta', 25, 'APPROVED', 'Concern: FEVER - ', '', '2025-03-13 15:44:05', '2025-03-13 15:57:45'),
(25, 19, 'Rho', 'rho@email.com', 'Jornadal', 29, 'APPROVED', 'Concern: FEVER - I have high fever', '', '2025-03-13 15:50:12', '2025-03-13 15:57:48'),
(26, 20, 'Bernard', 'bern@yahoo.com', 'Compuesto', 30, 'DECLINED', 'Concern: COUGH - ', '', '2025-03-13 15:51:01', '2025-03-13 15:57:58'),
(27, 21, 'Jonats', 'jo@gmail.com', 'Sindo', 31, 'APPROVED', 'Concern: OTHER - Pogi Kaayo', '', '2025-03-13 15:51:42', '2025-03-13 15:58:01'),
(28, 30, 'evan', 'evan@email.com', 'Bonso', 32, 'APPROVED', 'Concern: FEVER - labad ulo', 'you cn go to healthcare', '2025-03-13 17:43:33', '2025-03-13 17:44:09'),
(29, 30, 'evan', 'evan@email.com', 'Bonso', 33, 'DECLINED', 'Concern: OTHER - sdghwfsf', 'eeigheotip', '2025-03-13 17:44:51', '2025-03-13 17:45:04');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `stock_quantity` int(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventory_id`, `product_id`, `stock_quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 13, '2025-05-14 16:47:40', '2025-05-18 05:11:10'),
(2, 2, 5, '2025-05-14 16:47:40', '2025-05-14 16:47:40'),
(11, 12, 5, '2025-05-18 16:04:45', '2025-05-18 16:56:57'),
(12, 13, 3, '2025-05-18 16:08:09', '2025-05-18 16:57:02'),
(13, 14, 6, '2025-05-18 16:09:26', '2025-05-18 16:57:07'),
(14, 15, 4, '2025-05-18 16:10:52', '2025-05-18 16:57:14'),
(15, 16, 6, '2025-05-18 16:12:29', '2025-05-18 16:58:16'),
(16, 17, 8, '2025-05-18 16:13:51', '2025-05-18 16:58:44'),
(17, 18, 9, '2025-05-18 16:14:47', '2025-05-18 16:59:53'),
(18, 19, 5, '2025-05-18 16:16:33', '2025-05-18 17:00:07'),
(19, 20, 4, '2025-05-18 16:30:38', '2025-05-18 17:00:13'),
(20, 21, 9, '2025-05-18 16:32:51', '2025-05-18 17:00:22'),
(21, 22, 5, '2025-05-18 16:33:22', '2025-05-18 17:00:26'),
(22, 23, 6, '2025-05-18 16:34:06', '2025-05-18 17:00:33'),
(23, 24, 4, '2025-05-18 16:35:08', '2025-05-18 17:01:01'),
(24, 25, 8, '2025-05-18 16:36:17', '2025-05-18 17:01:07'),
(25, 26, 8, '2025-05-18 16:36:56', '2025-05-18 17:01:13'),
(26, 27, 6, '2025-05-18 16:38:38', '2025-05-18 17:01:20'),
(27, 28, 6, '2025-05-18 16:39:25', '2025-05-18 17:02:10'),
(28, 29, 5, '2025-05-18 16:40:35', '2025-05-18 17:02:15'),
(29, 30, 4, '2025-05-18 16:41:05', '2025-05-18 17:02:22'),
(30, 31, 5, '2025-05-18 16:42:37', '2025-05-18 17:02:29'),
(31, 32, 3, '2025-05-18 16:43:56', '2025-05-18 17:02:35'),
(32, 33, 2, '2025-05-18 16:44:40', '2025-05-18 17:02:42'),
(33, 34, 8, '2025-05-18 16:45:59', '2025-05-18 17:03:04'),
(34, 35, 18, '2025-05-18 16:50:35', '2025-05-18 17:03:11'),
(35, 36, 5, '2025-05-18 16:51:39', '2025-05-18 17:03:15'),
(36, 37, 7, '2025-05-18 16:52:04', '2025-05-18 17:03:21'),
(37, 38, 4, '2025-05-18 16:52:27', '2025-05-18 17:03:27');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `staff_id`, `order_date`) VALUES
(4, 1, 1, '2025-05-16 00:48:50'),
(5, 4, 1, '2025-05-18 14:08:22'),
(6, 7, 6, '2025-05-19 01:16:18'),
(7, 2, 6, '2025-05-19 01:27:11');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(20) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `product_id`, `quantity`, `subtotal`) VALUES
(7, 4, 1, 3, 6900.00),
(8, 4, 2, 2, 4000.00),
(10, 5, 1, 4, 9200.00),
(11, 5, 2, 2, 4000.00),
(12, 6, 14, 1, 1500.00),
(13, 6, 16, 1, 750.00),
(14, 6, 20, 2, 300.00),
(15, 6, 21, 3, 6000.00),
(16, 6, 24, 1, 150.00),
(17, 6, 26, 2, 580.00),
(18, 6, 28, 1, 350.00),
(19, 6, 29, 2, 400.00),
(20, 6, 35, 2, 1000.00),
(21, 6, 36, 1, 800.00),
(22, 6, 37, 2, 4000.00),
(23, 7, 2, 1, 2000.00),
(24, 7, 14, 3, 4500.00),
(25, 7, 23, 2, 2000.00);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_total` decimal(10,2) NOT NULL,
  `payment_paid` decimal(10,2) NOT NULL,
  `payment_change` decimal(10,2) NOT NULL,
  `payment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `order_id`, `payment_total`, `payment_paid`, `payment_change`, `payment_date`) VALUES
(3, 4, 12257.00, 12500.00, 243.00, '2025-05-16 00:48:50'),
(4, 5, 26796.00, 50000.00, 36404.00, '2025-05-18 14:08:22'),
(5, 6, 32134.90, 17000.00, 695.10, '2025-05-19 01:16:18'),
(6, 7, 17255.00, 9000.00, 245.00, '2025-05-19 01:27:11');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_image` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_category` varchar(50) NOT NULL,
  `product_description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_image`, `product_name`, `product_price`, `product_category`, `product_description`) VALUES
(1, 'CRANKSHAFT.png', 'CrankShaft', 2300.00, 'Engine Components', 'Converts piston motion to rotation.'),
(2, 'BATTERY.png', 'Motolite Battery', 2000.00, 'Ignition System', 'Powers electrical components.'),
(12, 'ENGINE_OIL.png', 'Engine Oil', 600.00, 'Engine Components', 'Lubricates and cools engine parts.'),
(13, 'OIL_FILTER.png', 'Oil Filter', 750.00, 'Engine Components', 'Removes dirt from engine oil.'),
(14, 'OVERHEAD_CAMSHAFT.png', 'Overhead Camshaft', 1500.00, 'Engine Components', 'Operates intake and exhaust valves.'),
(15, 'SPROCKET.png', 'Sprocket', 550.00, 'Engine Components', 'Toothed wheel that drives the chain.'),
(16, 'COIL.png', 'Coil', 750.00, 'Ignition System', 'Converts voltage for spark plug use.'),
(17, 'HANDLEBAR_SWITCH.png', 'Handlebar Switch', 525.00, 'Ignition System', 'Controls light, horn, etc.'),
(18, 'KILL_SWITCH.png', 'Kill Switch', 300.00, 'Ignition System', 'Instantly shuts off the engine.'),
(19, 'RECTIFIER.png', 'Rectifier', 1000.00, 'Ignition System', 'Converts AC to DC power.'),
(20, 'SPARK_PLUGS.png', 'Spark Plug', 150.00, 'Ignition System', 'Ignites Air Fuel Mixture.'),
(21, 'CARBURETOR.png', 'Carburetor', 2000.00, 'Fuel System', 'Mixes air and fuel for combustion.'),
(22, 'FUEL_FILTER.png', 'Fuel Filter', 150.00, 'Fuel System', 'Removes impurities from fuel.'),
(23, 'GAUGE_SENDER.png', 'Gauge Sender', 1000.00, 'Fuel System', 'Measures and sends fuel level data.'),
(24, 'TANK_CAP.png', 'Tank Cap', 150.00, 'Fuel System', 'Covers and fill the fuel tank.'),
(25, 'BRAKE_LEVER.png', 'Brake Lever', 325.00, 'Brake System', 'Hand-operated brake control.'),
(26, 'BRAKE_SWITCH.png', 'Brake Switch', 290.00, 'Brake System', 'Actives brake light when braking.'),
(27, 'BRAKEPAD.png', 'Brakepad', 550.00, 'Brake System', 'Friction material for disc braking.'),
(28, 'AIR_FILTER.png', 'Air Filter', 350.00, 'Exhaust and Filter', 'Cleans air before it enters the engine.'),
(29, 'EXHAUST_GASKET.png', 'Exhaust Gasket', 200.00, 'Exhaust and Filter', 'Seals exhaust pipe connection.'),
(30, 'MUFFLER.png', 'Muffler', 2000.00, 'Exhaust and Filter', 'Reduces engine noise.'),
(31, 'PIPE_CASE.png', 'Pipe Case', 1000.00, 'Exhaust and Filter', 'Covers and holds the exhaust pipe.'),
(32, 'CHAIN.png', 'Chain', 1000.00, 'Others', 'Transfers power from engine to wheel.'),
(33, 'CHAIN_SHIELD.png', 'Chain Shield', 500.00, 'Others', 'Protects the chain from debris.'),
(34, 'HAND_SHIELD.png', 'Hand Shield', 450.00, 'Others', 'Guards hand from wind and debris.'),
(35, 'HEADLIGHT.png', 'Headlight', 500.00, 'Others', 'Front-facing light for visibility.'),
(36, 'INNER_TUBE.png', 'Inner Tube', 800.00, 'Others', 'Inflated rubber tube inside the tire.'),
(37, 'RIM.png', 'Rim', 2000.00, 'Others', 'Metal wheel that holds the tire.'),
(38, 'SIDE_MIRROR.png', 'Side Mirror', 300.00, 'Others', 'Allows rear visibility.');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `staff_id` int(11) NOT NULL,
  `staff_username` varchar(50) DEFAULT NULL,
  `staff_firstname` varchar(50) NOT NULL,
  `staff_lastname` varchar(50) NOT NULL,
  `staff_birthdate` date NOT NULL,
  `staff_profile` varchar(50) NOT NULL,
  `staff_email` varchar(50) NOT NULL,
  `staff_contact` varchar(50) NOT NULL,
  `staff_password` varchar(270) DEFAULT NULL,
  `hired_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`staff_id`, `staff_username`, `staff_firstname`, `staff_lastname`, `staff_birthdate`, `staff_profile`, `staff_email`, `staff_contact`, `staff_password`, `hired_date`) VALUES
(1, 'yoshieee', 'Yosh', 'Batula', '2005-05-06', 'leviCUT.jpg', 'ybatula@gmail.com', '09878909216', 'uiauia', '2025-05-08 04:13:53'),
(2, 'jrizz', 'Jose', 'Rizal', '2001-04-08', 'jrizal.jpg', 'jrizal@gmail.com', '09888888801', 'peperizz', '2025-05-08 04:39:52'),
(4, 'Kalyeee', 'Kalye', 'West', '2025-11-01', 'kwest.jpg', 'kwest@gmail.com', '09878909216', 'kalyewest', '2025-05-08 06:18:53'),
(5, 'jvealthy', 'Jan Vincent', 'Oclarit', '2002-04-15', 'jv.jpg', 'jvoclarit@gmail.com', '09115354231', 'jvlovesyou', '2025-05-18 05:31:18'),
(6, 'mheilzzz', 'Mheil Andrei', 'Cenita', '2005-11-16', '2x2.png', 'mcenita@gmail.com', '09664441013', '$2y$10$jbj44V.ZwWL6RAMG299ddOtNxzEJpiy2FoqPw9xk6PPDsmV4RejCe', '2025-05-18 15:17:32');

-- --------------------------------------------------------

--
-- Table structure for table `stock_in_line`
--

CREATE TABLE `stock_in_line` (
  `stock_in_id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `stock_in_quantity` int(20) NOT NULL,
  `stock_in_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock_in_line`
--

INSERT INTO `stock_in_line` (`stock_in_id`, `inventory_id`, `supplier_id`, `stock_in_quantity`, `stock_in_date`) VALUES
(1, 1, 4, 3, '2025-05-18 13:11:10'),
(4, 11, 6, 5, '2025-05-19 00:56:57'),
(5, 12, 6, 3, '2025-05-19 00:57:02'),
(6, 13, 6, 10, '2025-05-19 00:57:07'),
(7, 14, 6, 4, '2025-05-19 00:57:14'),
(8, 15, 6, 7, '2025-05-19 00:58:16'),
(9, 16, 6, 8, '2025-05-19 00:58:44'),
(10, 17, 6, 9, '2025-05-19 00:59:53'),
(11, 18, 6, 5, '2025-05-19 01:00:07'),
(12, 19, 6, 6, '2025-05-19 01:00:13'),
(13, 20, 6, 12, '2025-05-19 01:00:22'),
(14, 21, 6, 5, '2025-05-19 01:00:26'),
(15, 22, 6, 8, '2025-05-19 01:00:33'),
(16, 23, 5, 5, '2025-05-19 01:01:01'),
(17, 24, 5, 8, '2025-05-19 01:01:07'),
(18, 25, 5, 10, '2025-05-19 01:01:13'),
(19, 26, 5, 6, '2025-05-19 01:01:20'),
(20, 27, 4, 7, '2025-05-19 01:02:10'),
(21, 28, 4, 7, '2025-05-19 01:02:15'),
(22, 29, 4, 4, '2025-05-19 01:02:22'),
(23, 30, 4, 5, '2025-05-19 01:02:29'),
(24, 31, 4, 3, '2025-05-19 01:02:35'),
(25, 32, 4, 2, '2025-05-19 01:02:42'),
(26, 33, 3, 8, '2025-05-19 01:03:04'),
(27, 34, 3, 20, '2025-05-19 01:03:11'),
(28, 35, 3, 6, '2025-05-19 01:03:15'),
(29, 36, 3, 9, '2025-05-19 01:03:21'),
(30, 37, 3, 4, '2025-05-19 01:03:27');

-- --------------------------------------------------------

--
-- Table structure for table `stock_out_line`
--

CREATE TABLE `stock_out_line` (
  `stock_out_id` int(11) NOT NULL,
  `order_item_id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `stock_out_quantity` int(20) NOT NULL,
  `stock_out_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock_out_line`
--

INSERT INTO `stock_out_line` (`stock_out_id`, `order_item_id`, `inventory_id`, `stock_out_quantity`, `stock_out_date`) VALUES
(1, 7, 1, 3, '2025-05-16 00:48:50'),
(2, 8, 2, 2, '2025-05-16 00:48:50'),
(4, 10, 1, 4, '2025-05-18 14:08:22'),
(5, 11, 2, 2, '2025-05-18 14:08:22'),
(6, 12, 13, 1, '2025-05-19 01:16:18'),
(7, 13, 15, 1, '2025-05-19 01:16:18'),
(8, 14, 19, 2, '2025-05-19 01:16:18'),
(9, 15, 20, 3, '2025-05-19 01:16:18'),
(10, 16, 23, 1, '2025-05-19 01:16:18'),
(11, 17, 25, 2, '2025-05-19 01:16:18'),
(12, 18, 27, 1, '2025-05-19 01:16:18'),
(13, 19, 28, 2, '2025-05-19 01:16:18'),
(14, 20, 34, 2, '2025-05-19 01:16:18'),
(15, 21, 35, 1, '2025-05-19 01:16:18'),
(16, 22, 36, 2, '2025-05-19 01:16:18'),
(17, 23, 2, 1, '2025-05-19 01:27:11'),
(18, 24, 13, 3, '2025-05-19 01:27:11'),
(19, 25, 22, 2, '2025-05-19 01:27:11');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL,
  `supplier_fullname` varchar(50) NOT NULL,
  `supplier_email` varchar(50) DEFAULT NULL,
  `supplier_contact` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `supplier_fullname`, `supplier_email`, `supplier_contact`, `created_at`) VALUES
(1, 'Stephen Curry', 'scurry@gmail.com', '09928192211', '2025-05-08 03:12:58'),
(3, 'Jimmy Butler', 'jbutler@gmai.com', '09192901822', '2025-05-08 03:40:39'),
(4, 'Br Br Patapim', 'bpatapim@gmail.com', '09029109291', '2025-05-08 15:18:06'),
(5, 'Jane de Leon', 'jleon@gmail.com', '09882817483', '2025-05-08 15:20:49'),
(6, 'Kairi Esports', 'kesports@gmail.com', '09111628188', '2025-05-18 15:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `suffix` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `civil_status` varchar(20) NOT NULL,
  `birthdate` date NOT NULL,
  `birthplace` varchar(100) NOT NULL,
  `weight` decimal(5,2) NOT NULL,
  `height` decimal(5,2) NOT NULL,
  `purok` varchar(20) NOT NULL,
  `mobile_number` int(50) NOT NULL,
  `emer_number` int(50) NOT NULL,
  `emer_contname` varchar(100) NOT NULL,
  `emer_relation` varchar(20) NOT NULL,
  `usercreation` datetime NOT NULL,
  `profile` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `email`, `password`, `firstname`, `middlename`, `lastname`, `suffix`, `age`, `gender`, `civil_status`, `birthdate`, `birthplace`, `weight`, `height`, `purok`, `mobile_number`, `emer_number`, `emer_contname`, `emer_relation`, `usercreation`, `profile`) VALUES
(5, 'ryy', 'r.compuesto.545237@umindanao.edu.ph', '$2y$10$Sit7AXHDEFNpUuPCdVV73.heiUU8dnRFOs311dST69LUjl1rkGuWK', 'rjay', 'eco', 'coms', 'none', -12, 'Male', 'Single', '0000-00-00', '', 0.00, 0.00, '', 8088080, 0, '', '', '0000-00-00 00:00:00', ''),
(7, 'yosh', 'w@gmail.com', '$2y$10$FblvpeElKaktccBjUfAKxunhauYJKK0lEB8Drd7xu64QRPXyptRc6', 'Annika', 'Thunder', 'Batula', 'Jr.', 17, 'Female', 'Married', '2025-03-15', '', 0.00, 0.00, '', 2147483647, 0, '', '', '0000-00-00 00:00:00', ''),
(8, 'ryy99', 'ryan@gmail.com', '$2y$10$39MQbCftkUMEodepjqHXE.r6Pjt2cGPk1jeiHFXBlruldsZwcfw6a', 'Ryan', 'Ednalgan', 'Compuesto', 'none', 28, 'Male', 'Married', '2003-07-18', 'Kapalong', 132.23, 5.80, 'Purok 5', 2147483647, 2147483647, 'Joyce Compuesto', 'Wife', '0000-00-00 00:00:00', '80f70fe7-b268-4e6b-bfa6-ebfa3c84b9db.jpg'),
(13, 'ryytry5', 'ryan@gmail.com', '$2y$10$KybzC0S9Ac0JRtDvBmLvveP8eZVCCMHUYC01iSeTu3tLuIBqrYMKW', 'Ryan', 'Ednalgan', 'Compuesto', 'Jr.', 21, 'Male', 'Single', '2025-02-24', 'Kapalong', 132.23, 5.80, 'Purok 5', 2147483647, 0, 'Joyce Compuesto', 'Wife', '2025-03-11 17:29:32', 'cool.jpg'),
(14, 'Yoshi', 'y@email.com', '$2y$10$Xj6yyXsGRkg1wGo9sjXE2O5xq0YW625CdjUZWXHpnTjl/iXvruaNG', 'yOSH', '', 'Oclarit', 'none', 78, 'Male', 'Married', '2017-02-21', 'Digos City', 50.60, 4.11, 'Purok 5', 2147483647, 2147483647, 'Oliver', 'Boyfriend', '2025-03-13 13:46:36', ''),
(15, 'JV', 'j@email.com', '$2y$10$TyysJnaSk9WqrKZikDpIhO3cPMzkOrFY.JLQItSN0BchV4q3N6fC.', 'Jv', '', 'Batula', 'none', 30, 'Male', 'Single', '2007-01-13', 'Manila City', 66.60, 5.10, 'Purok 3', 2147483647, 2147483647, 'Yosh', 'Girlfiriend', '2025-03-13 13:48:40', ''),
(16, 'Fe', 'fe@gmail.com', '$2y$10$gVAM3NjhJ4N8vg597AMJeOMwnQ1iyF9uUnqhm4LbVJ.AfcbRdmWxW', 'Fe', '', 'Malasarte', 'none', 35, 'Female', 'Married', '2002-01-23', 'Toril', 45.00, 5.50, 'Purok 3', 2147483647, 2147483647, 'Joevan', 'Boyfriend', '2025-03-13 13:51:50', ''),
(17, 'Miya', 'miya@skype.com', '$2y$10$0rLVssHM0q4wUPjRU9mxl.VHRRH0NDEnqFDs1LZtUB7o4tDU3QAza', 'Miya', 'Ling', 'Balmond', 'none', 99, 'Female', 'Widowed', '2025-03-13', 'Davao City', 45.90, 4.00, 'Purok 7', 2147483647, 2147483647, 'Gusion', 'Husband', '2025-03-13 13:53:39', ''),
(18, 'Gwen', 'g@email.com', '$2y$10$nw/7zzP9IqJ5.QNxPM874O9xP0crny1c1sAxfCh2EJ/cBT5k7p4Ce', 'Gwen', 'qwerty', 'Peralta', 'none', 60, 'Female', 'Single', '2025-03-13', 'Davao City', 50.00, 5.11, 'Purok 5', 2147483647, 2147483647, 'Cha', 'Friend', '2025-03-13 14:02:24', ''),
(19, 'Rho', 'rho@email.com', '$2y$10$.nTPR/vGP/NUXSZY.EQ9h./6uHmBhoEbbmD7z0sKDZX0Qlc2GdIJC', 'Rho', 'batula', 'Jornadal', 'none', 46, 'Male', 'Widowed', '2025-03-13', 'Kapalong', 66.90, 7.11, 'Purok 5', 2147483647, 2147483647, 'Jonathan', 'Boyfriend', '2025-03-13 14:05:26', ''),
(20, 'Bernard', 'bern@yahoo.com', '$2y$10$B/AjRXNwtGA.6vVN7yLTtey9I30ykIn6HlKf7bfcw/5m/gy3sBZnS', 'Bernard', 'Arzadon', 'Compuesto', 'none', 46, 'Female', 'Married', '2025-03-13', 'Matina', 5.11, 5.80, 'Purok 7', 2147483647, 2147483647, 'Ryan', 'Husband', '2025-03-13 14:08:37', ''),
(21, 'Jonats', 'jo@gmail.com', '$2y$10$8GHf9jMt4GJgnyXskH2NG.T298cStKScICiLrxkPsunncxnEneZUC', 'Jonathan', 'Bayot', 'Sindo', 'none', 15, 'Male', 'Single', '2025-03-13', 'davao', 4.11, 5.10, 'Purok 4', 2147483647, 2147483647, 'Fletcher', 'Friend', '2025-03-13 14:11:24', ''),
(22, 'Wil', 'wil@gmail.com', '$2y$10$XKjgU7KZn8EeKYUAXH3Ch.SN1MtozouenKhGxBE7r678bh3IPjDuC', 'Wiley', 'secret', 'Abunda', 'none', 46, 'Female', 'Widowed', '2018-02-13', 'Buhangin', 90.00, 5.10, 'Purok 3', 2147483647, 2147483647, 'Alejandro', 'Boyfriend', '2025-03-13 14:14:03', ''),
(23, 'Ale', 'ale@bbl.com', '$2y$10$.2tbNxpCdUB3SXVIE152C.Pt2y.2n92dnXWr2Uo2I56ZgshEvtq2C', 'Alejandro', '', 'Francis', 'none', 70, 'Female', 'Married', '2016-02-13', 'EL RIo', 5.10, 5.90, 'Purok 2', 2147483647, 2147483647, 'Nograles', 'Friend', '2025-03-13 14:15:50', ''),
(24, 'Flet', 'flet@skype.com', '$2y$10$Z.08BWhfpfKj.tzrjILj5.KwE.WqIMjr7mEngsmebK073GGjedXPq', 'Fletcher', 'Gwapo', 'Mala', 'Jr.', 9, 'Male', 'Single', '2021-01-30', 'Davao', 10.11, 3.11, 'Purok 6', 2147483647, 2147483647, 'Ryan', 'Friend', '2025-03-13 14:18:17', ''),
(25, 'Yoshy', 'yoshy@email.com', '$2y$10$AbVUcIjxYAnGoLGN.0c4n.RfYENaeuBfsUfFnaUkAffrSjTkBIire', 'Yoshy', 'Bebe', 'Batula', 'none', 7, 'Male', 'Single', '2015-01-13', 'Panabo City', 7.50, 3.50, 'Purok 1', 2147483647, 2147483647, 'Kent', 'Brother', '2025-03-13 14:21:11', ''),
(26, 'Girly', 'Girly@email.com', '$2y$10$KQlnLTNOKPX9DT39dsPcceOQ5Hc8S0P1Uoamt.DthxPMh1mjLoPOq', 'Girly', 'hehe', 'Haha', 'none', 90, 'Male', 'Single', '1992-12-18', 'Panabo City', 55.20, 5.70, 'Purok 6', 2147483647, 2147483647, 'Boyi', 'Brother', '2025-03-13 14:24:06', 'catty.jpg'),
(28, 'Kent', 'kent@gmail.com', '$2y$10$QXek7Z7fLrsHJJCROSCeReiXZqLboKxAfxUlFslsdVxZXQ9B4afsW', 'Kent', 'sfsef', 'Seren', 'none', 5, 'Male', 'Other', '2022-06-13', 'Davao', 132.23, 5.80, 'Purok 2', 2147483647, 2147483647, 'Ragas', 'Friend', '2025-03-13 15:55:44', ''),
(29, 'Lao', 'lao.@email.com', '$2y$10$chnY061Rhf1twF1Oj.jqYOiai8WDXHe1O4ffInpU6doE2hTNsr1rW', 'Jay', '', 'Lao', 'none', 8, 'Female', 'Widowed', '2025-03-01', 'Bangkal', 23.21, 5.11, 'Purok 6', 2147483647, 2147483647, 'ryan jay', 'Brother', '2025-03-13 16:00:28', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`apid`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD UNIQUE KEY `unique_cart_product` (`cart_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`hisid`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD UNIQUE KEY `unique_combination` (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `stock_in_line`
--
ALTER TABLE `stock_in_line`
  ADD PRIMARY KEY (`stock_in_id`),
  ADD KEY `inventory_id` (`inventory_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `stock_out_line`
--
ALTER TABLE `stock_out_line`
  ADD PRIMARY KEY (`stock_out_id`),
  ADD KEY `order_item_id` (`order_item_id`),
  ADD KEY `inventory_id` (`inventory_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `apid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `hisid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stock_in_line`
--
ALTER TABLE `stock_in_line`
  MODIFY `stock_in_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `stock_out_line`
--
ALTER TABLE `stock_out_line`
  MODIFY `stock_out_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`cart_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staffs` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock_in_line`
--
ALTER TABLE `stock_in_line`
  ADD CONSTRAINT `stock_in_line_ibfk_1` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`inventory_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_in_line_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`supplier_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock_out_line`
--
ALTER TABLE `stock_out_line`
  ADD CONSTRAINT `stock_out_line_ibfk_1` FOREIGN KEY (`order_item_id`) REFERENCES `order_items` (`order_item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_out_line_ibfk_2` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`inventory_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
