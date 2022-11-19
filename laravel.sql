-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2022 at 05:20 PM
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
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`, `images`, `created_at`, `updated_at`) VALUES
(1, 'Gruaud-Larose', 'Rượu Hennessy hay còn được gọi là rượu Cognac vì được sản xuất tại thành phố Cognac của vùng Charentes, Pháp, đây cũng là loại rượu nặng được chế biến từ nho với nhiều niên hạn và cách thức pha trộn khác nhau.', 'https://chevalier.vn/wp-content/uploads/2021/09/Ruou-Vang-Chateau-Gruaud-Larose.jpg', '2022-11-04 04:38:05', '2022-11-06 00:53:10'),
(7, 'Hennessy', 'Hardys được mệnh danh là thương hiệu rượu vang số một của nước Úc và là thương hiệu mạnh thứ hai toàn cầu. Để khẳng định được vị thế của mình trong phân khúc rượu vang cao cấp, thương hiệu vang Úc này đã trải qua gần hai thế kỷ với không ít biến cố. Và ngày nay, Hardys đã có mặt trên 130 quốc gia trên toàn thế giới với hơn 2 triệu ly được uống mỗi ngày.', 'https://chevalier.vn/wp-content/uploads/2021/09/Ruou-Vang-Chateau-Gruaud-Larose.jpg', '2022-11-04 20:12:12', '2022-11-06 00:54:00'),
(8, 'Concha Y Toro', 'Concha y Toro được biết đến như nhà sản xuất và xuất khẩu rượu vang nổi tiếng nhất châu Mỹ Latinh và là một trong 10 công ty thương hiệu rượu vang nổi tiếng lớn nhất thế giới. Sản lượng  bán ra mỗi năm của thương hiệu vang Chile này hơn 33 triệu thùng và phân phối trên 135 quốc gia.', 'https://chevalier.vn/wp-content/uploads/2021/09/Ruou-Vang-Chateau-Gruaud-Larose.jpg', '2022-11-04 20:12:12', '2022-11-06 00:53:49'),
(9, 'Robert Mondavi', 'Là loại rượu vang được sản xuất bên ngoài các khu vực trồng nho truyền thống của châu Âu và Trung Đông nhưng rượu vang của Robert Mondavi đã phát triển thành công một số loại rượu cao cấp và nhận được sự tôn trọng và tin tưởng của những người sành rượu.Cabernet Sauvignon là loại rượu được tiêu thụ nhiều nhất tại Mỹ với mức giá trung bình 30$.', 'https://chevalier.vn/wp-content/uploads/2021/09/Ruou-Vang-Chateau-Gruaud-Larose.jpg', '2022-11-04 20:12:12', '2022-11-06 00:53:38');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Vang trắng', 'Rượu vang trắng hay còn gọi là vang trắng, rượu nho trắng là một thể loại của rượu vang theo đó khác với rượu vang đỏ, rượu vang trắng có màu nhạt hơn nó được gọi là màu trắng nhưng không hoàn toàn là màu trắng mà còn có màu vàng, vàng rơm, v.v.. vì màu sắc của rượu trắng phụ thuộc vào màu của vỏ nho', '2022-11-04 04:38:05', '2022-11-06 00:54:38'),
(2, 'Vang đỏ', 'Rượu vang đỏ hay còn gọi là vang đỏ hay rượu nho đỏ là một dạng phổ biến của rượu vang được làm từ những loại nho đậm màu. Vang đỏ thường có màu đậm pha trộn giữa màu đỏ, đen và tím. Quá trình làm rượu vang đỏ thì vỏ nho cũng được nghiền nát cùng với ruột để tạo ra nước ép rồi lên men thành rượu.', '2022-11-04 04:38:05', '2022-11-06 00:54:52'),
(89, 'Vang ngọt', 'Vang ngọt là từ dùng để chỉ rượu vang có chứa lượng đường trong khoảng từ 45g/L hoặc hơn. Rượu vang ngọt cũng là loại rượu vang trái ngược với vang dry (vang không ngọt). Nồng độ cồn trung bình của vang ngọt là vào khoảng từ 15% đến 22%.', '2022-11-04 19:39:38', '2022-11-06 00:55:22'),
(101, 'Vang hồng', 'Rượu vang hồng hay còn gọi là “rosé wine”. Là loại rượu vang ngoài nhập khẩu được làm từ các loại nho có vỏ màu sẫm. Để rượu vang có màu hồng, trong quá trình sản xuất rượu vang, nước ép nho sẽ được tiếp xúc với vỏ trong một khoảng thời gian ngắn (tuỳ thuộc vào nhà sản xuất). Sau đó, vỏ nho sẽ được tách riêng và tiếp tục quá trình lên', '2022-11-04 19:58:10', '2022-11-06 21:03:29');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wards` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `firstname`, `lastname`, `phone`, `email`, `city`, `district`, `wards`, `address`, `type`, `created_at`, `updated_at`) VALUES
(6, 1, 'Thư', 'Nguyễn Thị Minh', NULL, 'thucute@gmail.com', NULL, NULL, NULL, NULL, '0', '2022-11-04 04:42:36', '2022-11-04 04:42:36'),
(7, 2, 'Trân', 'Lee Mai', NULL, 'trancute@gmail.com', NULL, NULL, NULL, NULL, '0', '2022-11-04 04:43:40', '2022-11-04 04:43:40'),
(8, 6, 'Tiến', 'Nguyễn Vĩnh', '09212345678', 'gtainguyenk19@gmail.com', 'Không', 'Không', 'Không', 'Không', '0', '2022-11-08 19:50:48', '2022-11-18 07:01:16'),
(43, 8, 'Vũ', 'Phạm Hoài', '0721452749', 'vuvu@gmail.com', 'Không', 'Không', 'Không', 'Không', '0', '2022-11-13 00:33:31', '2022-11-18 07:08:26');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_16_144156_create_customers_table', 1),
(6, '2022_10_16_144228_create_orders_table', 1),
(7, '2022_10_18_062610_create_products_table', 1),
(8, '2022_10_18_071057_create_brands_table', 1),
(9, '2022_10_18_072303_create_origins_table', 1),
(10, '2022_10_18_072322_create_categories_table', 1),
(11, '2022_10_18_072506_create_order_details_table', 1),
(12, '2022_10_24_051622_create_files_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `total`, `status`, `address`, `phone`, `fullname`, `email`, `created_at`, `updated_at`) VALUES
(179, 8, 9000000, 0, '99 An Dương Vương, Tỉnh Điện Biên, Thành phố Điện Biên Phủ, Phường Mường Thanh', '0925521452', 'Nguyễn Vĩnh Tiến', 'gtainguyenk19@gmail.com', '2022-11-13 00:12:44', '2022-11-13 00:12:44'),
(180, 8, 7500000, 1, '99 An Dương Vương, Tỉnh Cà Mau, Huyện Cái Nước, Xã Đông Hưng', '0925521452', 'Nguyễn Vĩnh Tiến', 'gtainguyenk19@gmail.com', '2022-11-13 00:13:35', '2022-11-13 01:04:56'),
(181, 8, 7500000, 0, 'Yêu Minh Thư, Thành phố Hồ Chí Minh, Quận 8, Phường 08', '0925521452', 'Nguyễn Vĩnh Tiến', 'tien23851@gmail.com', '2022-11-13 00:14:21', '2022-11-13 00:14:21'),
(182, 43, 1500000, 2, '99 An Dương Vương, Tỉnh Đắk Nông, Huyện Cư Jút, Xã Đắk DRông', '0841141521', 'Phạm Hoài Vũ', 'vuvu@gmail.com', '2022-11-13 00:45:26', '2022-11-13 01:04:54'),
(183, 43, 1500000, 0, '99 An Dương Vương, Tỉnh Đắk Nông, Huyện Cư Jút, Xã Cư Knia', '0841141521', 'Phạm Hoài Vũ', 'vuvu@gmail.com', '2022-11-13 01:23:48', '2022-11-13 01:23:48'),
(184, 43, 1500000, 0, '99 An Dương Vương, Tỉnh Đắk Lắk, Huyện Lắk, Xã Buôn Tría', '0925521452', 'Phạm Hoài Vũ', 'gtainguyenk19@gmail.com', '2022-11-13 01:24:11', '2022-11-13 01:24:11'),
(185, 43, 1500000, 0, '99 An Dương Vương, Tỉnh Cà Mau, Huyện Cái Nước, Xã Đông Thới', '0925521452', 'Phạm Hoài Vũ', 'gtainguyenk19@gmail.com', '2022-11-13 01:26:15', '2022-11-13 01:26:15'),
(186, 43, 7500000, 0, '99 An Dương Vương, Tỉnh Bình Thuận, Huyện Hàm Tân, Xã Tân Hà', '0925521452', 'Phạm Hoài Vũ', 'tien23851@gmail.com', '2022-11-13 18:00:48', '2022-11-13 18:00:48');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `product_id`, `price`, `product_name`, `quantity`, `order_id`, `created_at`, `updated_at`) VALUES
(132, 56, '1500000.00', 'Rượu vang Pháp Chateau La Grave 1912', 1, 179, '2022-11-13 00:12:44', '2022-11-13 00:12:44'),
(133, 57, '1500000.00', 'Rượu vang Pháp Chateau Plince 2016', 1, 179, '2022-11-13 00:12:44', '2022-11-13 00:12:44'),
(134, 61, '6000000.00', 'Rượu vang Pháp Château Dauzac 2019', 1, 179, '2022-11-13 00:12:44', '2022-11-13 00:12:44'),
(135, 57, '1500000.00', 'Rượu vang Pháp Chateau Plince 2016', 1, 180, '2022-11-13 00:13:35', '2022-11-13 00:13:35'),
(136, 61, '6000000.00', 'Rượu vang Pháp Château Dauzac 2019', 1, 180, '2022-11-13 00:13:36', '2022-11-13 00:13:36'),
(137, 57, '1500000.00', 'Rượu vang Pháp Chateau Plince 2016', 1, 181, '2022-11-13 00:14:21', '2022-11-13 00:14:21'),
(138, 61, '6000000.00', 'Rượu vang Pháp Château Dauzac 2019', 1, 181, '2022-11-13 00:14:22', '2022-11-13 00:14:22'),
(139, 57, '1500000.00', 'Rượu vang Pháp Chateau Plince 2016', 1, 182, '2022-11-13 00:45:26', '2022-11-13 00:45:26'),
(140, 56, '1500000.00', 'Rượu vang Pháp Chateau La Grave 1912', 1, 183, '2022-11-13 01:23:48', '2022-11-13 01:23:48'),
(141, 56, '1500000.00', 'Rượu vang Pháp Chateau La Grave 1912', 1, 184, '2022-11-13 01:24:11', '2022-11-13 01:24:11'),
(142, 56, '1500000.00', 'Rượu vang Pháp Chateau La Grave 1912', 1, 185, '2022-11-13 01:26:15', '2022-11-13 01:26:15'),
(143, 60, '7500000.00', 'Rượu vang Pháp Chateau Lynch Moussas 2014', 1, 186, '2022-11-13 18:00:49', '2022-11-13 18:00:49');

-- --------------------------------------------------------

--
-- Table structure for table `origins`
--

CREATE TABLE `origins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `origins`
--

INSERT INTO `origins` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Pháp', 'Id quia nisi quo.', '2022-11-04 04:38:05', '2022-11-05 04:45:10'),
(2, 'Ý', 'Velit veniam quis hic natus ut sapiente sit.', '2022-11-04 04:38:05', '2022-11-05 04:45:14'),
(3, 'Chile', 'Messi là người hùng Chile', '2022-11-04 04:38:05', '2022-11-12 21:52:26'),
(34, 'Tây Ban Nha', 'Tui crush Minh Thư.', '2022-11-05 04:45:27', '2022-11-05 04:45:27');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(103, 'App\\Models\\User', 1, 'ADMIN TOKEN', 'e23973cc24b835f4884acb848b16359fd13949919281ee65f331bb97cffbdb61', '[\"admin:create\",\"admin:update\",\"admin:delete\"]', '2022-11-13 01:04:57', NULL, '2022-11-13 00:48:11', '2022-11-13 01:04:57'),
(104, 'App\\Models\\User', 1, 'ADMIN TOKEN', '8622ea982289b654e72fcbbc25786d0ab92a86cd090c48d14bed5ceed2d0ad21', '[\"admin:create\",\"admin:update\",\"admin:delete\"]', '2022-11-13 17:55:08', NULL, '2022-11-13 17:31:13', '2022-11-13 17:55:08'),
(109, 'App\\Models\\User', 1, 'ADMIN TOKEN', '6fe0b84d1924e3ed8b3186ead9bbf3dc3a6253c7be707fe26032f9024824990e', '[\"admin:create\",\"admin:update\",\"admin:delete\"]', '2022-11-18 09:14:06', NULL, '2022-11-18 08:39:33', '2022-11-18 09:14:06');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `vol` int(11) NOT NULL,
  `c` decimal(8,2) NOT NULL,
  `year` year(4) NOT NULL,
  `price` double NOT NULL,
  `brand_id` int(11) NOT NULL,
  `origin_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `images`, `quantity`, `status`, `vol`, `c`, `year`, `price`, `brand_id`, `origin_id`, `category_id`, `created_at`, `updated_at`) VALUES
(57, 'Rượu vang Pháp Chateau Plince 2016', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 'uploads/1668314211_Rượu-Vang-F-Negroamaro.jpg', 2, 0, 700, '15.00', 1912, 1500000, 1, 3, 2, '2022-11-04 18:38:47', '2022-11-12 21:36:51'),
(60, 'Rượu vang Pháp Chateau Lynch Moussas 2014', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 'uploads/1668314198_Rượu-vang-Chile-VEO-ULTIMA-Cabernet-Sauvignon.jpg', 53, 0, 1080, '11.00', 2022, 7500000, 8, 1, 89, '2022-11-05 08:34:55', '2022-11-12 21:36:38'),
(61, 'Rượu vang Pháp Château Dauzac 2019', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 'uploads/rượu-vangChateau-Cantenac-Brown.jpg', 53, 0, 1080, '11.00', 2022, 6000000, 9, 34, 101, '2022-11-05 08:35:06', '2022-11-06 00:39:14'),
(62, 'Rượu vang Pháp Château De Camensac 2014', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 'uploads/Rượu-Vang-M-Malvasia-Nera.jpg', 53, 0, 1080, '11.00', 2022, 4500000, 1, 1, 1, '2022-11-05 08:35:16', '2022-11-06 00:39:26'),
(63, 'Rượu Vang Pháp Chateau De Candale 2011', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which', 'uploads/Rượu-Vang-50-Anniversario-3.jpg', 53, 0, 1080, '11.00', 2022, 8620000, 1, 1, 89, '2022-11-05 08:35:28', '2022-11-06 00:39:45'),
(64, 'Rượu vang Pháp Chateau Fombrauge 2018', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 'uploads/1668385907_for-you-.png', 53, 0, 1080, '11.00', 2018, 4360000, 8, 3, 101, '2022-11-05 08:35:39', '2022-11-13 17:31:47'),
(65, 'Rượu vang Pháp Chateau Lynch Moussas 2019', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 'uploads/image-original.png', 53, 0, 700, '11.00', 2022, 9800000, 9, 34, 2, '2022-11-05 08:35:50', '2022-11-06 00:40:25'),
(66, 'Rượu vang Tây Ban Nha Carmelo Rodero Reserva 2015', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 'uploads/rượu-vangChateau-Cantenac-Brown.jpg', 15, 0, 1392, '13.00', 2022, 33800000, 7, 34, 1, '2022-11-05 08:40:53', '2022-11-06 00:40:37'),
(67, 'Rượu vang Tây Ban Nha Carmelo Rodero TSM 2015', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 'uploads/Rượu-vang-Montes-Alpha-M.jpg', 15, 0, 1392, '13.00', 2015, 23000000, 8, 2, 1, '2022-11-05 08:41:04', '2022-11-06 00:41:02'),
(68, 'Rượu vang Tây Ban Nha Portia Summa Limited Edition', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 'uploads/1668314074_for-you-.png', 15, 0, 1392, '13.00', 2022, 33000000, 7, 2, 2, '2022-11-05 08:41:14', '2022-11-12 21:34:34'),
(69, 'Rượu Vang Chile Haras De Pirque Reserva De Propiedad 2018', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 'uploads/St-mary-1.png', 15, 0, 1392, '13.00', 2012, 16400000, 8, 2, 101, '2022-11-05 08:41:26', '2022-11-06 00:41:37'),
(70, 'Rượu vang Chile Hussonet Cabernet Sauvignon 2019', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 'uploads/Rượu-vang-Montes-Classic-Series-Merlot.jpg', 54, 0, 897, '19.00', 2019, 17000000, 9, 1, 1, '2022-11-05 08:42:40', '2022-11-06 00:41:59'),
(71, 'Rượu Vang Ý 50 Anniversario', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 'uploads/Rượu-Vang-Chateau-Vieux-Pelletan.jpg', 54, 0, 897, '19.00', 2019, 2200000, 1, 1, 2, '2022-11-05 08:42:51', '2022-11-06 00:42:16'),
(72, 'Rượu Vang Ý 62 Anniversario Primitivo di Manduria DOP Riserva', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 'uploads/1668315948_Vang-Tây-Ban-Nha-No.12.jpg', 68, 0, 1540, '20.00', 2018, 6010000, 1, 1, 1, '2022-11-05 19:52:55', '2022-11-12 22:05:49'),
(76, 'Rượu vang Pháp Chateau Lynch Moussas 2018', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 'uploads/1668314036_rượu-vangChateau-Cantenac-Brown.jpg', 13, 0, 1090, '9.00', 2019, 3300000, 8, 2, 89, '2022-11-09 11:17:41', '2022-11-12 21:33:56'),
(86, 'Tiến Nguyễn 2019', 'Namor Tiến Nguyễn', 'uploads/1668786043_ts606 (1).jpg', 1, 0, 750, '12.00', 1984, 2500000, 9, 2, 101, '2022-11-18 08:40:43', '2022-11-18 08:40:43'),
(87, 'Tiến Nguyễn Vĩnh', 'ok', 'uploads/1668786067_unnamed-file-119.jpg', 1, 0, 750, '12.00', 1950, 3500000, 7, 3, 89, '2022-11-18 08:41:07', '2022-11-18 08:41:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `role_as`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Thư', 'Nguyễn Thị Minh', 1, 'thucute@gmail.com', NULL, '$2y$10$96tKAJymdDhSjtxykyEMDuJXVS4ksC8YsJe1mmy72KfV5wOtHNu.W', NULL, '2022-11-04 04:42:36', '2022-11-04 04:42:36'),
(2, 'Trân', 'Lee Mai', 1, 'trancute@gmail.com', NULL, '$2y$10$PvB9WWDwCHIs/LatshaLTuEyLFhQCinHtM6tDHvWuZJP9nhWjs9LO', NULL, '2022-11-04 04:43:40', '2022-11-04 04:43:40'),
(6, 'Tiến', 'Nguyễn Vĩnh', 0, 'gtainguyenk19@gmail.com', NULL, '$2y$10$nFf02D2fAu.py.fcFJTXyeZm9zWPojWr6KVI1vhWFs7GyBjW/OZ4e', NULL, '2022-11-08 19:50:48', '2022-11-08 20:16:56'),
(7, 'Vinh', 'Nguyễn Lê', 0, 'vinhcute@gmail.com', NULL, '$2y$10$TDUePEC0FzsHDjVLNUfnR.IIcyVhq061qBZJ.G3VURg3.wjnv71tW', NULL, '2022-11-09 23:52:35', '2022-11-09 23:57:21'),
(8, 'Vũ', 'Phạm Hoài', 0, 'vuvu@gmail.com', NULL, '$2y$10$XcAizMxGzYXGilgioJ7CIeeNCJREycAtIFKorHtDMES/0zKQNo5.a', NULL, '2022-11-13 00:33:31', '2022-11-18 08:16:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `origins`
--
ALTER TABLE `origins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `origins`
--
ALTER TABLE `origins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
