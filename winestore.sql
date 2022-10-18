-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2022 at 03:55 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `winestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `fullname` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `pass` varchar(25) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `fullname`, `email`, `pass`, `phone`, `status`) VALUES
(100121, 'Nguyen Van A', 'hentaiktvn321@gmail.com', '123456', '2989483097', 1),
(100122, 'Nguyen Van B', 'nguyenb@gmail.com', '123456', '0154408547', 1),
(100123, 'Nguyen Van C', 'nguyenc@gmail.com', '123456', '0194478547', 0),
(100124, 'Nguyen Thi Minh Thu xinh', 'thu@gmail.com', '123456', '0214585474', 1),
(100125, 'Nguyen Thi Minh Thu xinh', 'thu123@gmail.com', '123456', '0214545474', 1),
(100126, 'Nguyen Thi Minh Thu xinh', 'thuq12s@gmail.com', '123456', '1214585474', 1),
(100127, 'Nguyen Thi Minh Thu xinh', 'thuqes@gmail.com', '123456', '1214585774', 1),
(100128, 'Nguyen Thi Minh Thu xinh', 'thuqds@gmail.com', '123456', '1214515474', 1),
(100129, 'Nguyen Thi Minh Thu xinh', 'thuq1s@gmail.com', '123456', '1204585474', 1),
(100130, 'a', 'a@gmail.com', '123456', '0124141112', 1),
(100131, 'b', 'b@gmail.com', '123456', '0124141113', 1),
(100132, 'c', 'c@gmail.com', '123456', '0124241112', 1),
(100133, 'd', 'd@gmail.com', '123456', '0124141199', 1);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'Gruaud-Larose'),
(2, 'Lucente'),
(3, 'Concha Y Toro'),
(4, 'Urbina');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Vang trắng'),
(2, 'Vang đỏ'),
(3, 'Vang ngọt');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `fullname` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `pass` varchar(25) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `fullname`, `email`, `pass`, `phone`, `status`) VALUES
(15485965, 'Nguyen Thi Minh Thư', 'minhthu@gmail.com', '123456', '0152485748', 1),
(15485966, 'Nguyen Thi Minh Thư', 'minhthucte@gmail.com', '123456', '025412547', 1);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `id_name` varchar(15) NOT NULL,
  `name` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `id_name`, `name`) VALUES
(1, 'phap', 'Pháp'),
(2, 'y', 'Ý'),
(3, 'chile', 'Chile'),
(4, 'tay-ban-nha', 'Tây Ban Nha');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(7) NOT NULL,
  `id_account` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(15) NOT NULL,
  `total_money` bigint(20) NOT NULL,
  `pay_method` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_account`, `fullname`, `phone`, `email`, `address`, `date`, `status`, `total_money`, `pay_method`) VALUES
(10229486, 100121, 'Nguyễn Thị Minh Thư', '0921123435', 'minhthu@gmail.com', '99 An Dương Vương, Phường 16, Quận 8, TP HCM', '2022-10-17 03:30:04', 'Đã xác nhận', 5000001, 'COD'),
(11794453, 100121, 'Nguyễn Thị Minh Thư', '0921123435', 'minhthu@gmail.com', '99 An Dương Vương, Phường 16, Quận 8, TP HCM', '2022-10-17 13:17:11', 'Chờ xác nhận', 26690749, 'COD'),
(15558721, 100121, 'Nguyễn Thị Minh Thư', '0921123435', 'minhthu@gmail.com', '99 An Dương Vương, Phường 16, Quận 8, TP HCM', '2022-10-17 03:29:40', 'Đã xác nhận', 1232323, 'COD'),
(16747352, 100121, 'Nguyễn Thị Minh Thư', '0921123435', 'minhthu@gmail.com', '99 An Dương Vương, Phường 16, Quận 8, TP HCM', '2022-10-17 03:29:29', 'Đã xác nhận', 40368573, 'COD'),
(17868664, 100121, 'Nguyễn Thị Minh Thư', '0921123435', 'minhthu@gmail.com', '99 An Dương Vương, Phường 16, Quận 8, TP HCM', '2022-10-17 01:20:18', 'Đã xác nhận', 50708102, 'COD'),
(22941061, 100121, 'Nguyễn Thị Minh Thư', '0921123435', 'minhthu@gmail.com', '99 An Dương Vương, Phường 16, Quận 8, TP HCM', '2022-10-16 06:47:59', 'Đã xác nhận', 61522328, 'COD'),
(23057667, 100121, 'Nguyễn Thị Minh Thư', '0921123435', 'minhthu@gmail.com', '99 An Dương Vương, Phường 16, Quận 8, TP HCM', '2022-10-16 04:44:24', 'Đã hủy', 10000, 'COD'),
(24356974, 100121, 'Nguyễn Thị Minh Thư', '0921123435', 'minhthu@gmail.com', '99 An Dương Vương, Phường 16, Quận 8, TP HCM', '2022-10-16 06:26:17', 'Đã hủy', 66672770, 'COD'),
(28855390, 100121, 'Nguyễn Thị Minh Thư', '0921123435', 'minhthu@gmail.com', '99 An Dương Vương, Phường 16, Quận 8, TP HCM', '2022-10-16 04:51:16', 'Đã xác nhận', 71033904, 'COD'),
(32223654, 100121, 'Nguyễn Thị Minh Thư', '0921123435', 'minhthu@gmail.com', '99 An Dương Vương, Phường 16, Quận 8, TP HCM', '2022-10-16 04:52:57', 'Đã hủy', 71033904, 'COD'),
(34738019, 100121, 'Nguyễn Thị Minh Thư', '0921123435', 'minhthu@gmail.com', '99 An Dương Vương, Phường 16, Quận 8, TP HCM', '2022-10-17 13:17:19', 'Chờ xác nhận', 15000000, 'COD'),
(43970075, 100121, 'Nguyễn Thị Minh Thư', '0921123435', 'minhthu@gmail.com', '99 An Dương Vương, Phường 16, Quận 8, TP HCM', '2022-10-17 03:29:50', 'Chờ xác nhận', 23294799, 'COD'),
(58788669, 100121, 'Nguyễn Thị Minh Thư', '0921123435', 'minhthu@gmail.com', '99 An Dương Vương, Phường 16, Quận 8, TP HCM', '2022-10-17 13:17:29', 'Chờ xác nhận', 31359805, 'COD'),
(58877495, 100121, 'Nguyễn Thị Minh Thư', '0921123435', 'minhthu@gmail.com', '99 An Dương Vương, Phường 16, Quận 8, TP HCM', '2022-10-17 13:17:24', 'Chờ xác nhận', 15000000, 'COD'),
(60247286, 100121, 'Nguyễn Thị Minh Thư', '0921123435', 'minhthu@gmail.com', '99 An Dương Vương, Phường 16, Quận 8, TP HCM', '2022-10-17 03:29:45', 'Đã xác nhận', 3000000, 'COD'),
(64927791, 100121, 'Nguyễn Thị Minh Thư', '0921123435', 'minhthu@gmail.com', '99 An Dương Vương, Phường 16, Quận 8, TP HCM', '2022-10-16 06:26:49', 'Đã xác nhận', 60000000, 'COD'),
(67725957, 100121, 'Nguyễn Thị Minh Thư', '0921123435', 'minhthu@gmail.com', '99 An Dương Vương, Phường 16, Quận 8, TP HCM', '2022-10-17 13:17:15', 'Đã xác nhận', 2880000, 'COD'),
(69081578, 100121, 'Nguyễn Thị Minh Thư', '0921123435', 'minhthu@gmail.com', '99 An Dương Vương, Phường 16, Quận 8, TP HCM', '2022-10-17 03:29:58', 'Chờ xác nhận', 36332316, 'COD'),
(70531101, 100121, 'Nguyễn Thị Minh Thư', '0921123435', 'minhthu@gmail.com', '99 An Dương Vương, Phường 16, Quận 8, TP HCM', '2022-10-17 13:17:54', 'Chờ xác nhận', 46359805, 'COD'),
(72701926, 100121, 'Nguyễn Thị Minh Thư', '0921123435', 'minhthu@gmail.com', '99 An Dương Vương, Phường 16, Quận 8, TP HCM', '2022-10-17 13:17:48', 'Chờ xác nhận', 2880000, 'COD'),
(77928522, 100121, 'Nguyễn Thị Minh Thư', '0921123435', 'minhthu@gmail.com', '99 An Dương Vương, Phường 16, Quận 8, TP HCM', '2022-10-17 13:17:06', 'Đã hủy', 12000000, 'COD'),
(80351506, 100121, 'Nguyễn Thị Minh Thư', '0921123435', 'minhthu@gmail.com', '99 An Dương Vương, Phường 16, Quận 8, TP HCM', '2022-10-17 03:29:34', 'Đã hủy', 30761164, 'COD'),
(81763037, 100121, 'Nguyễn Thị Minh Thư', '0921123435', 'minhthu@gmail.com', '99 An Dương Vương, Phường 16, Quận 8, TP HCM', '2022-10-17 13:17:00', 'Chờ xác nhận', 12000000, 'COD'),
(83370854, 100121, 'Nguyễn Thị Minh Thư', '0921123435', 'minhthu@gmail.com', '99 An Dương Vương, Phường 16, Quận 8, TP HCM', '2022-10-16 04:48:28', 'Đã hủy', 71033904, 'COD'),
(97394361, 100121, 'Nguyễn Thị Minh Thư', '0921123435', 'minhthu@gmail.com', '99 An Dương Vương, Phường 16, Quận 8, TP HCM', '2022-10-17 03:29:23', 'Chờ xác nhận', 41570749, 'COD'),
(98830100, 100121, 'Nguyễn Thị Minh Thư', '0921123435', 'minhthu@gmail.com', '99 An Dương Vương, Phường 16, Quận 8, TP HCM', '2022-10-16 04:41:53', 'Đã hủy', 13334554, 'COD');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id_order` int(7) NOT NULL,
  `id_wine` smallint(6) NOT NULL,
  `quantity` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id_order`, `id_wine`, `quantity`) VALUES
(10229486, 5760, 1),
(10229486, 6066, 1),
(11794453, 1476, 1),
(15558721, 3313, 1),
(16747352, 923, 1),
(16747352, 1555, 1),
(17868664, 8, 3),
(17868664, 923, 1),
(22941061, 1821, 2),
(23057667, 923, 1),
(23057667, 1476, 1),
(24356974, 8, 5),
(28855390, 259, 4),
(32223654, 8, 1),
(32223654, 259, 2),
(34738019, 2297, 1),
(43970075, 3778, 1),
(48732127, 3581, 12),
(48732127, 4683, 1),
(58788669, 2557, 1),
(58877495, 2297, 1),
(60247286, 3581, 1),
(64529432, 3313, 1),
(64927791, 2297, 4),
(67725957, 259, 1),
(69081578, 3981, 1),
(69081578, 4683, 1),
(70531101, 2297, 1),
(70531101, 2557, 1),
(72701926, 259, 1),
(77928522, 8, 1),
(79023662, 8, 1),
(79023662, 74, 1),
(80351506, 1821, 1),
(81602714, 8, 1),
(81602714, 259, 1),
(81602714, 1555, 1),
(81763037, 8, 1),
(83370854, 8, 1),
(83370854, 259, 2),
(83644696, 74, 1),
(83644696, 2074, 1),
(83644696, 2297, 1),
(83644696, 3581, 1),
(83644696, 4432, 1),
(83644696, 4683, 1),
(86688795, 3581, 4),
(86688795, 3778, 1),
(86688795, 4683, 1),
(87701512, 8, 1),
(87701512, 74, 1),
(89934907, 8, 1),
(97394361, 8, 1),
(97394361, 259, 1),
(97394361, 1476, 1),
(98763382, 8, 1),
(98830100, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wines`
--

CREATE TABLE `wines` (
  `id` smallint(6) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(150) DEFAULT NULL,
  `country` varchar(15) NOT NULL,
  `brand` varchar(25) NOT NULL,
  `category` varchar(25) NOT NULL,
  `tone` float NOT NULL,
  `year` year(4) NOT NULL,
  `description` varchar(500) NOT NULL,
  `quantity` tinyint(2) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wines`
--

INSERT INTO `wines` (`id`, `name`, `image`, `country`, `brand`, `category`, `tone`, `year`, `description`, `quantity`, `price`) VALUES
(8, 'Em Thu xinh dep', 'https://www.totalwine.com/dynamic/250x/media/sys_master/twmmedia/h30/hc0/11986426003486.png', 'Ý', 'Concha Y Toro', 'Vang trắng', 5, 2022, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 25, 12000000),
(78, 'Tfabhg04pVDYMtht', 'https://www.totalwine.com/dynamic/250x/media/sys_master/twmmedia/he2/he0/9465000230942.png', 'Ý', 'Concha Y Toro', 'Vang trắng', 9, 2022, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 60, 25963923),
(259, 'jWsu7iDZMS1', 'https://www.totalwine.com/dynamic/250x/media/sys_master/twmmedia/ha7/hbe/11941382225950.png', 'Ý', 'Concha Y Toro', 'Vang trắng', 9, 2022, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 15, 2880000),
(435, 'IFTIUGVRqUkfiol', 'https://www.totalwine.com/dynamic/250x/media/sys_master/twmmedia/h04/h77/12674920120350.png', 'Ý', 'Gruaud-Larose', 'Vang trắng', 12, 2022, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 40, 11780031),
(617, 'PVpQ6pduwtwYI97t', 'https://www.totalwine.com/dynamic/250x/media/sys_master/twmmedia/h04/h77/12674920120350.png', 'Ý', 'Gruaud-Larose', 'Vang trắng', 19, 2022, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 69, 24066418),
(923, 'ptF4CPRM66aMIJW', 'https://www.totalwine.com/dynamic/x220,sq/media/sys_master/twmmedia/h61/h7b/13771984109598.png', 'Pháp', 'Lucente', 'Vang trắng', 15, 2022, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 79, 14708102),
(1476, 'PuD4x9nh4VQEoKH', 'https://www.totalwine.com/dynamic/x220,sq/media/sys_master/twmmedia/hb7/h69/13287131349022.png', 'Pháp', 'Lucente', 'Vang đỏ', 13, 2022, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 8, 26690749),
(1555, 'gDoonBJueiFJgEN', 'https://www.totalwine.com/dynamic/x220,sq/media/sys_master/twmmedia/hff/h43/17160740765726.png', 'Pháp', 'Lucente', 'Vang ngọt', 5, 2022, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 9, 25660471),
(1684, 'C4RXEi8KnIyXMApt', 'https://www.totalwine.com/dynamic/250x/media/sys_master/twmmedia/h3a/haa/16375138058270.png', 'Ý', 'Gruaud-Larose', 'Vang ngọt', 10, 2022, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 63, 10634426),
(1821, 'ZuawGgphfUUpF0q', 'https://www.totalwine.com/dynamic/x220,sq/media/sys_master/twmmedia/h9b/ha8/15200340967454.png', 'Pháp', 'Lucente', 'Vang hồng', 19, 2022, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 28, 30761164),
(2297, 'têe', 'https://www.totalwine.com/dynamic/x220,sq/media/sys_master/twmmedia/h60/he9/13287142555678.png', 'Pháp', 'Lucente', 'Vang trắng', 10, 2022, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 10, 15000000),
(2557, 'dddddddd', 'https://www.totalwine.com/dynamic/x220,sq/media/sys_master/twmmedia/h60/he9/13287142555678.png', 'Ý', 'Gruaud-Larose', 'Vang ngọt', 15, 2022, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 57, 31359805),
(3313, 'a', 'https://www.totalwine.com/dynamic/x220,sq/media/sys_master/twmmedia/hbb/h43/16826544062494.png', 'Pháp', 'Lucente', 'Vang trắng', 10, 2022, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 1, 1232323),
(3474, 'Jconf40W7TeyOOu', 'https://www.totalwine.com/dynamic/250x/media/sys_master/twmmedia/h37/h18/14261353545758.png', 'Ý', 'Gruaud-Larose', 'Vang ngọt', 5, 2022, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 53, 11445707),
(3581, '2mot2223', 'https://www.totalwine.com/dynamic/x220,sq/media/sys_master/twmmedia/h4c/h5c/17160735752222.png', 'Pháp', 'Lucente', 'Vang ngọt', 10, 2022, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 10, 3000000),
(3778, 'oU0kwJF4CurbB13', 'https://www.totalwine.com/dynamic/x220,sq/media/sys_master/twmmedia/h44/h86/13290194403358.png', 'Pháp', 'Lucente', 'Vang ngọt', 16, 2022, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 95, 23294799),
(3981, 'MqlHF892NalT9iW', 'https://www.totalwine.com/dynamic/x220,sq/media/sys_master/twmmedia/he2/hcd/15218873466910.png', 'Pháp', 'Lucente', 'Vang ngọt', 14.2, 2022, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 4, 21332316),
(4432, 'y', 'https://www.totalwine.com/dynamic/x220,sq/media/sys_master/twmmedia/h59/h0c/15381522120734.png', 'Pháp', 'Lucente', 'Vang đỏ', 10, 2022, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 10, 6500000),
(4683, 'x-edit', 'https://www.totalwine.com/dynamic/x220,sq/media/sys_master/twmmedia/ha5/h43/17160734277662.png', 'Pháp', 'Lucente', 'Vang trắng', 10, 2022, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 10, 15000000),
(4701, 'qOFGuOEDGb54Gy3', 'https://www.totalwine.com/dynamic/x220,sq/media/sys_master/twmmedia/h18/hf0/17160737226782.png', 'Pháp', 'Lucente', 'Vang trắng', 8, 2022, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 73, 4947905),
(5141, 'oU0zrbXR9rw7yxD', 'https://www.totalwine.com/dynamic/x220,sq/media/sys_master/twmmedia/h8b/h15/12396318883870.png', 'Pháp', 'Lucente', 'Vang đỏ', 12, 2022, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 98, 500388),
(5176, 'cOZ4JkH5QVHytHx', 'https://www.totalwine.com/dynamic/250x/media/sys_master/twmmedia/h76/h7e/14554454097950.png', 'Ý', 'Gruaud-Larose', 'Vang ngọt', 16, 2022, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 60, 11419055),
(5197, '333', 'https://res.cloudinary.com/dqnv3y6ob/image/asset/c_scale,h_480,q_auto/v1602680823/products/529003.png', 'Pháp', 'Lucente', 'Vang trắng', 10, 2022, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 1, 1),
(5266, 'n619CEvryJbSom3t', 'https://www.totalwine.com/dynamic/250x/media/sys_master/twmmedia/h4f/haa/12291754754078.png', 'Ý', 'Gruaud-Larose', 'Vang ngọt', 14, 2022, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 50, 2702585),
(5585, 'EMrZhCl6B6YWv77t', 'https://www.totalwine.com/dynamic/250x/media/sys_master/twmmedia/hbc/h9c/12291725656094.png', 'Ý', 'Gruaud-Larose', 'Vang ngọt', 12, 2022, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 17, 5611941),
(5760, 'e', 'https://www.totalwine.com/dynamic/250x/media/sys_master/twmmedia/h0b/heb/15078179110942.png', 'Chile', 'Lucente', 'Vang ngọt', 10, 2022, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 10, 5000000),
(6066, 'v', 'https://res.cloudinary.com/dqnv3y6ob/image/asset/c_scale,h_480,q_auto/v1/products/509454.png', 'Pháp', 'Lucente', 'Vang đỏ', 10, 2022, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 1, 1),
(6269, 'dickson1', 'https://res.cloudinary.com/dqnv3y6ob/image/asset/c_scale,h_480,q_auto/v1555940509/products/509590.png', 'Pháp', 'Lucente', 'Vang trắng', 10, 2022, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 10, 9000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_name` (`id_name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id_order`,`id_wine`);

--
-- Indexes for table `wines`
--
ALTER TABLE `wines`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100134;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
