-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2016 at 08:12 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `city0corporation`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `id` int(11) NOT NULL,
  `reference_number` int(20) NOT NULL,
  `counter_number` int(22) NOT NULL,
  `mobile_number` int(22) NOT NULL,
  `payment_amount` decimal(10,0) NOT NULL,
  `transaction_number` int(30) NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`id`, `reference_number`, `counter_number`, `mobile_number`, `payment_amount`, `transaction_number`, `payment_date`) VALUES
(1, 1111, 2, 1717390273, '3600', 123456789, '2016-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `corporation_officer`
--

CREATE TABLE `corporation_officer` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile_image` varchar(200) NOT NULL,
  `salt` varchar(200) NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `officer_rank` int(11) NOT NULL DEFAULT '0',
  `account_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `corporation_officer`
--

INSERT INTO `corporation_officer` (`id`, `first_name`, `last_name`, `username`, `password`, `profile_image`, `salt`, `join_date`, `update_date`, `officer_rank`, `account_status`) VALUES
(27, 'Shazzad', 'Hossain', 'corp123456789', '96b89beffae0c3398493eafa992bfd720848a2a48ff471f9fefb6bdd035f6f5c', '', 'œ«(QºÌ%¸È¸Öªq¹\Z°Î&HîüµâŠ', '2016-05-05 19:20:43', '2016-05-06 11:14:14', 3, 1),
(28, 'Masum', 'Billah', 'corp987654321', 'e12e957d56853f9465721e29dc81dcf68856a77f3d2177852e570039afc7d976', '', 'ð±ù‚›ivá|™rD÷91Þ¨²pPÍ6dC7“úG', '2016-05-05 20:08:36', '2016-05-05 20:08:36', 0, 0),
(29, 'Ahsan', 'Khan', 'Ahsan', '25f13454b4da8984683588b3387ec893d17959441e43156a0512d8281ce43ef3', '', '„‘ÂRpý\\­â"ûhÀX=Cgi¨ý;ý?{MC@w', '2016-05-07 07:26:36', '2016-05-07 07:26:36', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `corp_customers`
--

CREATE TABLE `corp_customers` (
  `id` int(11) NOT NULL,
  `secret_id` varchar(100) NOT NULL,
  `secret_password` varchar(200) NOT NULL,
  `secret_password_hash` varchar(200) NOT NULL,
  `salt` varchar(200) NOT NULL,
  `tin_number` varchar(200) NOT NULL,
  `corp_customer_info_id` int(111) NOT NULL,
  `customer_property_id` int(11) NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `create_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `corp_customers`
--

INSERT INTO `corp_customers` (`id`, `secret_id`, `secret_password`, `secret_password_hash`, `salt`, `tin_number`, `corp_customer_info_id`, `customer_property_id`, `update_date`, `create_date`) VALUES
(18, '123456789', 'Hossain', 'cbd430f69b4c3d4f939195af05c893cb4bfa91dc4b2f5960dcc033d017143071', 'lI”T×\\UdG´,§#¯/Éá¢nÁÕ;¢ÉË¨(', '123456789', 41, 22, '2016-05-20 11:09:39', '0000-00-00 00:00:00'),
(19, '987654321', 'Khan', '159c94fdc6a80ea341dbbacd2d04e835c5666e16a3713d24e1176cd8d501df8f', 'õ”DNV€!Lr·@#Èåiä\Zzõ“\0foŽ»lK]ú\\U1', '123456789', 42, 23, '2016-05-20 14:18:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `corp_customer_info`
--

CREATE TABLE `corp_customer_info` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `father_name` varchar(200) NOT NULL,
  `mother_name` varchar(200) NOT NULL,
  `holding_list_id` int(11) NOT NULL,
  `road_list_id` int(11) NOT NULL,
  `wards_list_id` int(11) NOT NULL,
  `moholla_list_id` int(11) NOT NULL,
  `post_code_list_id` int(11) NOT NULL,
  `thana_list_id` int(11) NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `create_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `corp_customer_info`
--

INSERT INTO `corp_customer_info` (`id`, `first_name`, `last_name`, `father_name`, `mother_name`, `holding_list_id`, `road_list_id`, `wards_list_id`, `moholla_list_id`, `post_code_list_id`, `thana_list_id`, `update_date`, `create_date`) VALUES
(41, 'Shazzad', 'Hossain', 'Md. Belal Uddin', 'Mst. Suriya Begum', 2, 1, 35, 1, 1, 5, '2016-05-20 11:09:39', '0000-00-00 00:00:00'),
(42, 'Monirzzaman', 'Khan', 'Md. Shamim Seikh', 'Mst. Amina Khatun', 2, 1, 35, 1, 1, 5, '2016-05-20 11:28:46', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `customer_invoice`
--

CREATE TABLE `customer_invoice` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `client_property_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_invoice`
--

INSERT INTO `customer_invoice` (`id`, `client_id`, `client_property_id`, `order_id`) VALUES
(1, 19, 23, 5),
(2, 18, 22, 6);

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `quarter_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `mobile_number` int(20) NOT NULL,
  `transaction_number` int(30) NOT NULL,
  `payment_amount` decimal(10,0) NOT NULL,
  `payment_update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `payment_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `payment_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`id`, `property_id`, `quarter_id`, `year_id`, `mobile_number`, `transaction_number`, `payment_amount`, `payment_update_date`, `payment_date`, `payment_status`) VALUES
(5, 23, 1, 92, 1717390273, 123456789, '3600', '2016-05-20 17:18:08', '2016-05-06 07:00:00', 0),
(6, 22, 1, 92, 1717390273, 123456789, '3600', '2016-05-21 05:20:36', '2016-05-12 07:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_property`
--

CREATE TABLE `customer_property` (
  `id` int(11) NOT NULL,
  `property_name` varchar(100) NOT NULL,
  `property_area` int(11) NOT NULL,
  `water_amount` int(11) NOT NULL,
  `register_date` date NOT NULL,
  `holding_id` int(11) NOT NULL,
  `road_id` int(11) NOT NULL,
  `ward_id` int(11) NOT NULL,
  `moholla_id` int(11) NOT NULL,
  `post_code_id` int(11) NOT NULL,
  `thana_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_property`
--

INSERT INTO `customer_property` (`id`, `property_name`, `property_area`, `water_amount`, `register_date`, `holding_id`, `road_id`, `ward_id`, `moholla_id`, `post_code_id`, `thana_id`) VALUES
(22, 'Bird Nest', 1200, 0, '2010-02-02', 2, 1, 35, 1, 1, 5),
(23, 'Alvi Villa', 700, 0, '2011-01-01', 2, 1, 35, 1, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `holding_lists`
--

CREATE TABLE `holding_lists` (
  `id` int(11) NOT NULL,
  `holding_name` varchar(100) NOT NULL,
  `road_id` tinyint(4) NOT NULL,
  `moholla_id` tinyint(4) NOT NULL,
  `wards_id` tinyint(4) NOT NULL,
  `thana_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `holding_lists`
--

INSERT INTO `holding_lists` (`id`, `holding_name`, `road_id`, `moholla_id`, `wards_id`, `thana_id`) VALUES
(1, '20/A', 1, 1, 35, 5),
(2, '23/A', 1, 1, 35, 5),
(3, '33/A', 3, 54, 34, 5),
(4, '36/B', 4, 53, 33, 5),
(5, '39/A', 5, 56, 36, 6),
(6, '10/B', 6, 60, 38, 6),
(7, '17/C', 7, 75, 49, 6),
(8, '08/A', 8, 48, 31, 4),
(9, '02/B', 9, 27, 22, 4),
(10, '09/A', 10, 76, 50, 7),
(12, '44/1', 12, 81, 53, 9),
(14, '90/1', 14, 83, 55, 11);

-- --------------------------------------------------------

--
-- Table structure for table `moholla_list`
--

CREATE TABLE `moholla_list` (
  `id` int(11) NOT NULL,
  `moholla_name` varchar(100) NOT NULL,
  `ward_id` tinyint(4) NOT NULL,
  `thana_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `moholla_list`
--

INSERT INTO `moholla_list` (`id`, `moholla_name`, `ward_id`, `thana_id`) VALUES
(1, 'Rajshahi University', 35, 5),
(2, 'Meher Chondi', 35, 5),
(3, 'Shaheb Bazar', 15, 4),
(4, 'Alu Potti', 15, 4),
(5, 'Nokshibazar', 15, 4),
(6, 'Loknath School Market', 16, 4),
(7, 'Bosh Para', 16, 4),
(8, 'Alokar More', 16, 4),
(9, 'Talaimari', 16, 4),
(10, 'Shiroel', 17, 4),
(11, 'Bornali More', 17, 4),
(12, 'Sobji Para', 17, 4),
(13, 'Rani Bazar', 18, 4),
(14, 'Sonadighir More', 18, 4),
(15, 'Ghosh Para More', 18, 4),
(16, 'Collage Para', 19, 4),
(17, 'Methor Potti', 19, 4),
(18, 'CNB', 19, 4),
(19, 'Jadughor More', 20, 4),
(20, 'Fire Service More', 20, 4),
(21, 'Shadur More', 20, 4),
(22, 'Vodra More', 21, 4),
(23, 'Station Bazar', 21, 4),
(24, 'Tika Para', 21, 4),
(25, 'Malo Para', 22, 4),
(26, 'Ghora Mara', 22, 4),
(27, 'Batar More', 22, 4),
(28, 'Hadir More', 23, 4),
(29, 'Poncho Potti', 23, 4),
(30, 'Relget ', 23, 4),
(31, 'Kadirgong', 24, 4),
(32, 'Uposhohor', 24, 4),
(33, 'Kedur More', 24, 4),
(34, 'Power House', 25, 4),
(35, 'Hetem Kha Choto Moszid', 25, 4),
(36, 'Hetem Kha Boro Moszid', 25, 4),
(37, 'Dorga Para', 26, 4),
(38, 'Boalia', 26, 4),
(39, 'Daspukur', 26, 4),
(40, 'Baliapukur', 27, 4),
(41, 'Tikapara', 27, 4),
(42, 'shadurmore', 28, 4),
(43, 'Gonokpara', 28, 4),
(44, 'Ranibazar', 29, 4),
(45, 'P.N girls school', 29, 4),
(46, 'Ghoramara', 30, 4),
(47, 'Shaheb Bazar', 30, 4),
(48, 'Hadir More', 31, 4),
(49, 'Alokar More', 31, 4),
(50, 'Bongram', 32, 4),
(51, 'Choto Bongram', 32, 4),
(52, 'Kajla', 33, 5),
(53, 'Bow Bazar', 33, 5),
(54, 'Mirzapur', 34, 5),
(55, 'Binodpur', 34, 5),
(56, 'Mohisbatan', 36, 6),
(57, 'Appler More', 36, 6),
(58, 'Helenabad', 37, 6),
(59, 'Verypara More', 37, 6),
(60, 'Octar More', 38, 6),
(61, 'Kot Station', 38, 6),
(62, 'Bulonpur', 39, 6),
(63, 'Rajpara', 39, 6),
(64, 'Parker Get', 40, 6),
(65, 'Shaplar get', 40, 6),
(66, 'Guri Para', 41, 6),
(67, 'Lokkhipur', 41, 6),
(68, 'City Byepus', 46, 6),
(69, 'Sobji Bazar', 46, 6),
(70, 'Mintu Chottor', 47, 6),
(71, 'Bondho Get', 47, 6),
(72, 'Ti Bad', 48, 6),
(73, 'Police Line', 48, 6),
(74, 'Biman more', 49, 6),
(75, 'Madrasa More', 49, 6),
(76, 'Dorgapara', 50, 7),
(77, 'Borokuthi', 50, 7),
(78, 'Sobjipara', 51, 7),
(79, 'Ghoradha', 51, 7),
(80, 'Mohollla99', 52, 8),
(81, 'Kajla', 53, 9),
(82, '444444444', 54, 10),
(83, 'Moholla', 55, 11);

-- --------------------------------------------------------

--
-- Table structure for table `officer_rank`
--

CREATE TABLE `officer_rank` (
  `id` int(11) NOT NULL,
  `rank_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `officer_rank`
--

INSERT INTO `officer_rank` (`id`, `rank_name`) VALUES
(3, 'Adminstrator'),
(4, 'Approval Officer'),
(1, 'Chairman'),
(2, 'Co-Ordinator');

-- --------------------------------------------------------

--
-- Table structure for table `post_code_list`
--

CREATE TABLE `post_code_list` (
  `id` int(11) NOT NULL,
  `sub_office` varchar(300) NOT NULL,
  `post_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_code_list`
--

INSERT INTO `post_code_list` (`id`, `sub_office`, `post_code`) VALUES
(1, 'Binodpur Bazar', 6206),
(2, 'Ghuramara', 6100),
(3, 'Kazla', 6204),
(4, 'Rajshahi Canttonment', 6202),
(5, 'Rajshahi Court', 6201),
(6, 'Rajshahi Sadar', 6000),
(7, 'Rajshahi University', 6205),
(8, 'Sapura', 6203);

-- --------------------------------------------------------

--
-- Table structure for table `property_payment`
--

CREATE TABLE `property_payment` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `payment_amount` int(11) NOT NULL,
  `quarter_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL DEFAULT '0',
  `false_status` int(11) NOT NULL DEFAULT '0',
  `payment_approved_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `payment_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `property_payment`
--

INSERT INTO `property_payment` (`id`, `property_id`, `payment_amount`, `quarter_id`, `year_id`, `payment_status`, `false_status`, `payment_approved_date`, `payment_date`) VALUES
(6965, 22, 3600, 1, 88, 1, 1, '2016-05-20 11:25:16', '0000-00-00 00:00:00'),
(6966, 22, 3600, 2, 88, 1, 0, '2016-05-20 11:09:40', '0000-00-00 00:00:00'),
(6967, 22, 3600, 3, 88, 1, 0, '2016-05-20 11:09:40', '0000-00-00 00:00:00'),
(6968, 22, 3600, 4, 88, 1, 0, '2016-05-20 11:09:40', '0000-00-00 00:00:00'),
(6969, 22, 3600, 1, 89, 1, 0, '2016-05-20 11:09:40', '0000-00-00 00:00:00'),
(6970, 22, 3600, 2, 89, 1, 0, '2016-05-20 11:09:40', '0000-00-00 00:00:00'),
(6971, 22, 3600, 3, 89, 1, 0, '2016-05-20 11:09:40', '0000-00-00 00:00:00'),
(6972, 22, 3600, 4, 89, 1, 0, '2016-05-20 11:09:40', '0000-00-00 00:00:00'),
(6973, 22, 3600, 1, 90, 1, 0, '2016-05-20 11:09:40', '0000-00-00 00:00:00'),
(6974, 22, 3600, 2, 90, 1, 0, '2016-05-20 11:09:40', '0000-00-00 00:00:00'),
(6975, 22, 3600, 3, 90, 1, 0, '2016-05-20 11:09:40', '0000-00-00 00:00:00'),
(6976, 22, 3600, 4, 90, 1, 0, '2016-05-20 11:09:40', '0000-00-00 00:00:00'),
(6977, 22, 3600, 1, 91, 1, 0, '2016-05-20 11:09:40', '0000-00-00 00:00:00'),
(6978, 22, 3600, 2, 91, 1, 0, '2016-05-20 11:09:40', '0000-00-00 00:00:00'),
(6979, 22, 3600, 3, 91, 1, 0, '2016-05-20 11:09:40', '0000-00-00 00:00:00'),
(6980, 22, 3600, 4, 91, 1, 0, '2016-05-20 11:09:40', '0000-00-00 00:00:00'),
(6981, 22, 3600, 1, 92, 1, 0, '2016-05-21 05:20:36', '0000-00-00 00:00:00'),
(6982, 22, 3600, 2, 92, 0, 0, '2016-05-20 11:09:40', '0000-00-00 00:00:00'),
(6983, 22, 3600, 3, 92, 0, 0, '2016-05-20 11:09:40', '0000-00-00 00:00:00'),
(6984, 22, 3600, 4, 92, 0, 0, '2016-05-20 11:09:40', '0000-00-00 00:00:00'),
(6985, 22, 3600, 1, 93, 0, 0, '2016-05-20 11:09:40', '0000-00-00 00:00:00'),
(6986, 22, 3600, 2, 93, 0, 0, '2016-05-20 11:09:40', '0000-00-00 00:00:00'),
(6987, 22, 3600, 3, 93, 0, 0, '2016-05-20 11:09:40', '0000-00-00 00:00:00'),
(6988, 22, 3600, 4, 93, 0, 1, '2016-05-20 11:25:46', '0000-00-00 00:00:00'),
(6989, 23, 3600, 1, 88, 1, 0, '2016-05-20 11:28:47', '0000-00-00 00:00:00'),
(6990, 23, 3600, 2, 88, 1, 0, '2016-05-20 11:28:47', '0000-00-00 00:00:00'),
(6991, 23, 3600, 3, 88, 1, 0, '2016-05-20 11:28:47', '0000-00-00 00:00:00'),
(6992, 23, 3600, 4, 88, 1, 0, '2016-05-20 11:28:47', '0000-00-00 00:00:00'),
(6993, 23, 3600, 1, 89, 1, 0, '2016-05-20 11:28:47', '0000-00-00 00:00:00'),
(6994, 23, 3600, 2, 89, 1, 0, '2016-05-20 11:28:47', '0000-00-00 00:00:00'),
(6995, 23, 3600, 3, 89, 1, 0, '2016-05-20 11:28:47', '0000-00-00 00:00:00'),
(6996, 23, 3600, 4, 89, 1, 0, '2016-05-20 11:28:47', '0000-00-00 00:00:00'),
(6997, 23, 3600, 1, 90, 1, 0, '2016-05-20 11:28:47', '0000-00-00 00:00:00'),
(6998, 23, 3600, 2, 90, 1, 0, '2016-05-20 11:28:47', '0000-00-00 00:00:00'),
(6999, 23, 3600, 3, 90, 1, 0, '2016-05-20 11:28:47', '0000-00-00 00:00:00'),
(7000, 23, 3600, 4, 90, 1, 0, '2016-05-20 11:28:47', '0000-00-00 00:00:00'),
(7001, 23, 3600, 1, 91, 1, 0, '2016-05-20 11:28:47', '0000-00-00 00:00:00'),
(7002, 23, 3600, 2, 91, 1, 0, '2016-05-20 11:28:47', '0000-00-00 00:00:00'),
(7003, 23, 3600, 3, 91, 1, 0, '2016-05-20 11:28:47', '0000-00-00 00:00:00'),
(7004, 23, 3600, 4, 91, 1, 0, '2016-05-20 11:28:47', '0000-00-00 00:00:00'),
(7005, 23, 3600, 1, 92, 1, 0, '2016-05-20 17:18:08', '0000-00-00 00:00:00'),
(7006, 23, 3600, 2, 92, 0, 0, '2016-05-20 11:28:47', '0000-00-00 00:00:00'),
(7007, 23, 3600, 3, 92, 0, 0, '2016-05-20 11:28:47', '0000-00-00 00:00:00'),
(7008, 23, 3600, 4, 92, 0, 0, '2016-05-20 11:28:47', '0000-00-00 00:00:00'),
(7009, 23, 3600, 1, 93, 0, 1, '2016-05-20 16:50:02', '0000-00-00 00:00:00'),
(7010, 23, 3600, 2, 93, 0, 1, '2016-05-20 14:20:48', '0000-00-00 00:00:00'),
(7011, 23, 3600, 3, 93, 0, 0, '2016-05-20 11:28:47', '0000-00-00 00:00:00'),
(7012, 23, 3600, 4, 93, 0, 0, '2016-05-20 11:28:47', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `property_tax`
--

CREATE TABLE `property_tax` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `tax_amount` decimal(8,2) NOT NULL,
  `first_quarter` int(11) NOT NULL DEFAULT '0',
  `second_quarter` int(11) NOT NULL DEFAULT '0',
  `third_quarter` int(11) NOT NULL DEFAULT '0',
  `fourth_quarter` int(11) NOT NULL DEFAULT '0',
  `start_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `property_tax`
--

INSERT INTO `property_tax` (`id`, `client_id`, `property_id`, `tax_amount`, `first_quarter`, `second_quarter`, `third_quarter`, `fourth_quarter`, `start_date`) VALUES
(10, 18, 22, '3600.00', 0, 0, 0, 0, '2010-02-02'),
(11, 19, 23, '2100.00', 0, 0, 0, 0, '2011-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `quarter_list`
--

CREATE TABLE `quarter_list` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quarter_list`
--

INSERT INTO `quarter_list` (`id`, `name`) VALUES
(1, 'January-February-March'),
(2, 'April-May-June'),
(3, 'July-August-September'),
(4, 'October-November-December');

-- --------------------------------------------------------

--
-- Table structure for table `roads_list`
--

CREATE TABLE `roads_list` (
  `id` int(11) NOT NULL,
  `road_name` varchar(300) NOT NULL,
  `moholla_id` tinyint(4) NOT NULL,
  `wards_id` tinyint(4) NOT NULL,
  `thana_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roads_list`
--

INSERT INTO `roads_list` (`id`, `road_name`, `moholla_id`, `wards_id`, `thana_id`) VALUES
(1, 'Hanufar Mor Road', 1, 35, 5),
(2, 'Station Bazar Road', 1, 35, 5),
(3, 'Mirzapur Road', 54, 34, 5),
(4, 'Kajla Road', 53, 33, 5),
(5, 'Madical Road', 56, 36, 6),
(6, 'Station Road', 60, 38, 6),
(7, 'Bazar Road', 75, 49, 6),
(8, 'Thana Road', 48, 31, 4),
(9, 'New Market Road', 27, 22, 4),
(10, 'Majhar Road', 76, 50, 7),
(11, 'Road99', 80, 52, 8),
(12, 'Versity Road', 81, 53, 9),
(13, '444444444', 82, 54, 10),
(14, 'Road', 83, 55, 11);

-- --------------------------------------------------------

--
-- Table structure for table `thana_list`
--

CREATE TABLE `thana_list` (
  `id` int(11) NOT NULL,
  `thana_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thana_list`
--

INSERT INTO `thana_list` (`id`, `thana_name`) VALUES
(4, 'Boalia'),
(5, 'Matihar'),
(6, 'Rajpara'),
(7, 'Shah Makdhum'),
(8, 'Godagari99'),
(9, 'Boalia'),
(10, '444444444444'),
(11, 'Matihar');

-- --------------------------------------------------------

--
-- Table structure for table `wards_list`
--

CREATE TABLE `wards_list` (
  `id` int(11) NOT NULL,
  `wards_name` varchar(300) NOT NULL,
  `thana_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wards_list`
--

INSERT INTO `wards_list` (`id`, `wards_name`, `thana_id`) VALUES
(15, 'Ward No.09', 4),
(16, 'Ward No.10', 4),
(17, 'Ward No.11', 4),
(18, 'Ward No.12', 4),
(19, 'Ward No.13', 4),
(20, 'Ward No.14', 4),
(21, 'Ward No.15', 4),
(22, 'Ward No.16', 4),
(23, 'Ward No.18', 4),
(24, 'Ward No.19', 4),
(25, 'Ward No.20', 4),
(26, 'Ward No.21', 4),
(27, 'Ward No.22', 4),
(28, 'Ward No.23', 4),
(29, 'Ward No.24', 4),
(30, 'Ward No.25', 4),
(31, 'Ward No.26', 4),
(32, 'Ward No.27', 4),
(33, 'Ward No.28', 5),
(34, 'Ward No.29', 5),
(35, 'Ward No.30', 5),
(36, 'Ward no.01', 6),
(37, 'Ward no.02', 6),
(38, 'Ward no.03', 6),
(39, 'Ward no.04', 6),
(40, 'Ward no.05', 6),
(41, 'Ward no.06', 6),
(46, 'Ward no.07', 6),
(47, 'Ward no.08', 6),
(48, 'Ward no.10', 6),
(49, 'Ward no.14', 6),
(50, 'Ward no.17', 7),
(51, 'Ward no.18', 7),
(52, 'Ward No.99', 8),
(53, 'Ward No.55', 9),
(54, '444444444', 10),
(55, 'Ward No. 12', 11);

-- --------------------------------------------------------

--
-- Table structure for table `water_tax`
--

CREATE TABLE `water_tax` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `tax_amount` decimal(8,2) NOT NULL,
  `first_quarter` int(11) NOT NULL DEFAULT '0',
  `second_quarter` int(11) NOT NULL DEFAULT '0',
  `third_quarter` int(11) NOT NULL DEFAULT '0',
  `fourth_quarter` int(11) NOT NULL DEFAULT '0',
  `start_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `year_list`
--

CREATE TABLE `year_list` (
  `id` int(11) NOT NULL,
  `name` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `year_list`
--

INSERT INTO `year_list` (`id`, `name`) VALUES
(77, 2000),
(78, 2001),
(79, 2002),
(80, 2003),
(81, 2004),
(82, 2005),
(83, 2006),
(84, 2007),
(85, 2008),
(86, 2009),
(87, 2010),
(88, 2011),
(89, 2012),
(90, 2013),
(91, 2014),
(92, 2015),
(93, 2016);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `corporation_officer`
--
ALTER TABLE `corporation_officer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `corp_customers`
--
ALTER TABLE `corp_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `corp_customer_info`
--
ALTER TABLE `corp_customer_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_invoice`
--
ALTER TABLE `customer_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_property`
--
ALTER TABLE `customer_property`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holding_lists`
--
ALTER TABLE `holding_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moholla_list`
--
ALTER TABLE `moholla_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officer_rank`
--
ALTER TABLE `officer_rank`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rank_name` (`rank_name`);

--
-- Indexes for table `post_code_list`
--
ALTER TABLE `post_code_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_payment`
--
ALTER TABLE `property_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_tax`
--
ALTER TABLE `property_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quarter_list`
--
ALTER TABLE `quarter_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roads_list`
--
ALTER TABLE `roads_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thana_list`
--
ALTER TABLE `thana_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wards_list`
--
ALTER TABLE `wards_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `water_tax`
--
ALTER TABLE `water_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `year_list`
--
ALTER TABLE `year_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `corporation_officer`
--
ALTER TABLE `corporation_officer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `corp_customers`
--
ALTER TABLE `corp_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `corp_customer_info`
--
ALTER TABLE `corp_customer_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `customer_invoice`
--
ALTER TABLE `customer_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customer_property`
--
ALTER TABLE `customer_property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `holding_lists`
--
ALTER TABLE `holding_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `moholla_list`
--
ALTER TABLE `moholla_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `officer_rank`
--
ALTER TABLE `officer_rank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `post_code_list`
--
ALTER TABLE `post_code_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `property_payment`
--
ALTER TABLE `property_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7013;
--
-- AUTO_INCREMENT for table `property_tax`
--
ALTER TABLE `property_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `quarter_list`
--
ALTER TABLE `quarter_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `roads_list`
--
ALTER TABLE `roads_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `thana_list`
--
ALTER TABLE `thana_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `wards_list`
--
ALTER TABLE `wards_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `water_tax`
--
ALTER TABLE `water_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `year_list`
--
ALTER TABLE `year_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
