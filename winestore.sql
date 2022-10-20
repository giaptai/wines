-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2022 at 05:16 AM
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
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(13, 'Prof. Hardy Waelchi', 'sconroy@example.net', '1-323-899-2237', '2022-10-19 06:42:32', 'GIB7BB', 'xzphiLy1', '2022-10-19 06:42:33', '2022-10-19 06:42:33'),
(14, 'Prof. Rae Wolf Sr.', 'alysson.crist@example.net', '346-218-6609', '2022-10-19 06:42:32', 'jPpxo4', 'usLXg0oc', '2022-10-19 06:42:33', '2022-10-19 06:42:33'),
(15, 'Santos Murphy Jr.', 'vita.deckow@example.org', '(651) 676-6807', '2022-10-19 06:42:32', 'UyUgme', 'Anatl8FG', '2022-10-19 06:42:33', '2022-10-19 06:42:33'),
(16, 'Lexus Howe', 'gus.hyatt@example.net', '+1-213-814-0088', '2022-10-19 06:42:32', '5NKke0', 'BTWcq922', '2022-10-19 06:42:33', '2022-10-19 06:42:33'),
(17, 'Prof. Jorge Schowalter III', 'nelle.hilpert@example.org', '1-424-295-3514', '2022-10-19 06:42:32', 'Ihq7kf', '62LEk4gW', '2022-10-19 06:42:33', '2022-10-19 06:42:33'),
(18, 'Prof. Vida Ruecker IV', 'francisco.fay@example.net', '1-716-278-3947', '2022-10-19 06:42:32', 'zLmhbH', '5EN2iFnN', '2022-10-19 06:42:33', '2022-10-19 06:42:33'),
(19, 'Golden Cruickshank', 'lucio.rowe@example.org', '661-565-3701', '2022-10-19 06:42:32', 'Dn87Io', 'me3Q1qM3', '2022-10-19 06:42:33', '2022-10-19 06:42:33'),
(20, 'Mrs. Arlie Mitchell II', 'emmy.connelly@example.com', '941-532-0998', '2022-10-19 06:42:32', 'CbOn08', 'OaMWj1Vo', '2022-10-19 06:42:33', '2022-10-19 06:42:33'),
(21, 'Magnolia Ledner', 'nbergnaum@example.net', '+1-719-569-0695', '2022-10-19 06:42:32', '87TwFE', '7fyOBCfk', '2022-10-19 06:42:33', '2022-10-19 06:42:33'),
(22, 'Telly Legros', 'kessler.chester@example.net', '442.668.0210', '2022-10-19 06:42:32', 'Faaog1', 'rbeT8kce', '2022-10-19 06:42:33', '2022-10-19 06:42:33'),
(23, 'Buddy Gulgowski PhD', 'trantow.jimmie@example.com', '916-594-0771', '2022-10-19 06:42:32', 'nEykPn', 'hsSuITXT', '2022-10-19 06:42:33', '2022-10-19 06:42:33'),
(24, 'Mr. Gerald Rice', 'swift.ozella@example.com', '+1 (707) 934-3474', '2022-10-19 06:42:32', 'ldIjHC', 'GAzJR4n9', '2022-10-19 06:42:33', '2022-10-19 06:42:33'),
(25, 'Shanna Upton', 'dolores22@example.org', '401-971-7394', '2022-10-19 09:22:58', 'y645y2', 'nZHzd1rW', '2022-10-19 09:22:58', '2022-10-19 09:22:58'),
(26, 'Nguyễn Thị Minh Thư', 'minhthu@gmail.com', '1-949-541-0509', '2022-10-19 09:22:58', '122332', 'W7aHmYcl', '2022-10-19 09:22:58', '2022-10-19 09:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(4, 'Mara Upton', 'Earum harum qui dolor aut et sint. Placeat qui dolorem consequatur et.', '2022-10-19 19:42:59', '2022-10-19 19:42:59'),
(5, 'Alberta Bailey', 'Tempore est quibusdam aperiam autem et saepe modi.', '2022-10-19 19:42:59', '2022-10-19 19:42:59'),
(6, 'Chase Weber', 'Harum ut laborum hic praesentium.', '2022-10-19 19:42:59', '2022-10-19 19:42:59'),
(7, 'Kayden Hermiston DDS', 'Hic et sed doloribus tenetur aut non temporibus impedit.', '2022-10-19 19:43:01', '2022-10-19 19:43:01'),
(8, 'Lizzie Wiz', 'Nostrum quisquam maiores non iste quibusdam necessitatibus aut ad.', '2022-10-19 19:43:01', '2022-10-19 20:00:30'),
(9, 'Estell Mertz VI', 'Quia et sunt ut architecto. Quisquam suscipit sit officiis sed.', '2022-10-19 19:43:01', '2022-10-19 20:00:36'),
(10, 'Ellie Moen', 'Dolores et ut ratione ipsum non doloribus. Aut dolor sint quos inventore vitae.', '2022-10-19 19:43:02', '2022-10-19 19:43:02'),
(11, 'Annetta Ebert', 'Illo voluptatem aut natus ut quam harum. Autem illum itaque quia quis.', '2022-10-19 19:43:02', '2022-10-19 19:43:02'),
(12, 'Dr. Ashleigh McCullough IV', 'Magnam qui nobis facere minima aspernatur doloremque.', '2022-10-19 19:43:02', '2022-10-19 19:43:02'),
(13, 'Jaeden Hyatt', 'Eius inventore expedita consequatur consequatur sed inventore.', '2022-10-19 19:43:04', '2022-10-19 19:43:04'),
(14, 'Chaz Gutkowski', 'Qui necessitatibus qui rem. Amet aut aperiam voluptatum odit.', '2022-10-19 19:43:04', '2022-10-19 19:43:04'),
(15, 'Marcel Borer', 'Voluptas ratione deserunt vel debitis est assumenda fugit.', '2022-10-19 19:43:04', '2022-10-19 19:43:04');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Josue Hermiston', 'Optio impedit aut in vel repellat rerum.', '2022-10-19 02:53:21', '2022-10-19 02:53:21'),
(3, 'Kristopher Nicola', 'Aliquid harum rerum ut.', '2022-10-19 02:53:21', '2022-10-19 19:55:05'),
(5, 'Fae Lemke', 'In vel et similique quia.', '2022-10-19 09:50:16', '2022-10-19 09:50:16'),
(7, 'Kayden Hermiston', 'Nulla placeat vero quidem aut.', '2022-10-19 09:50:19', '2022-10-19 19:58:46'),
(8, 'nice', 'Occaecati ut reiciendis voluptas ut deserunt.', '2022-10-19 09:50:19', '2022-10-19 10:39:40'),
(9, 'Ms. Selena D\'Amore MD', 'Minus culpa excepturi enim ut velit sint.', '2022-10-19 09:50:19', '2022-10-19 09:50:19'),
(13, 'Tremaine Kulas', 'Voluptatem ea mollitia a nobis ad facere.', '2022-10-19 19:51:46', '2022-10-19 19:51:46'),
(14, 'Edwin Bailey PhD', 'Rerum velit accusamus dolore temporibus voluptas.', '2022-10-19 19:51:46', '2022-10-19 19:51:46'),
(15, 'David White', 'Ut et quis et ut.', '2022-10-19 19:51:46', '2022-10-19 19:51:46');

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
(29, '2014_10_12_000000_create_users_table', 1),
(30, '2014_10_12_100000_create_password_resets_table', 1),
(31, '2019_08_19_000000_create_failed_jobs_table', 1),
(32, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(33, '2022_10_19_082032_create_products_table', 1),
(34, '2022_10_19_083234_create_categories', 1),
(35, '2022_10_19_083810_create_brands', 1),
(36, '2022_10_19_092631_create_orders', 1),
(37, '2022_10_19_133050_create_accounts', 2),
(38, '2022_10_19_133803_create_accounts', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_money` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `status`, `total_money`, `created_at`, `updated_at`) VALUES
(1, 'Chờ xác nhận', 5378748, '2022-10-19 02:45:56', '2022-10-19 02:45:56'),
(2, 'Chờ xác nhận', 5613927, '2022-10-19 02:45:56', '2022-10-19 02:45:56'),
(3, 'Chờ xác nhận', 3812309, '2022-10-19 02:45:56', '2022-10-19 02:45:56'),
(4, 'Chờ xác nhận', 526291, '2022-10-19 02:45:56', '2022-10-19 02:45:56'),
(5, 'Chờ xác nhận', 681071, '2022-10-19 02:45:56', '2022-10-19 02:45:56'),
(6, 'Chờ xác nhận', 1702915, '2022-10-19 02:45:56', '2022-10-19 02:45:56'),
(7, 'Chờ xác nhận', 6952946, '2022-10-19 02:45:56', '2022-10-19 02:45:56'),
(8, 'Chờ xác nhận', 7446026, '2022-10-19 02:45:56', '2022-10-19 02:45:56'),
(9, 'Chờ xác nhận', 7876937, '2022-10-19 02:45:56', '2022-10-19 02:45:56'),
(10, 'Chờ xác nhận', 6859411, '2022-10-19 02:45:56', '2022-10-19 02:45:56'),
(11, 'Chờ xác nhận', 6875977, '2022-10-19 02:45:56', '2022-10-19 02:45:56'),
(12, 'Chờ xác nhận', 816276, '2022-10-19 02:45:56', '2022-10-19 02:45:56'),
(13, 'Chờ xác nhận', 3327062, '2022-10-19 02:45:56', '2022-10-19 02:45:56'),
(14, 'Chờ xác nhận', 1528034, '2022-10-19 02:45:56', '2022-10-19 02:45:56'),
(15, 'Chờ xác nhận', 448963, '2022-10-19 02:45:56', '2022-10-19 02:45:56'),
(16, 'Chờ xác nhận', 5113803, '2022-10-19 02:45:56', '2022-10-19 02:45:56'),
(17, 'Chờ xác nhận', 7301821, '2022-10-19 02:45:56', '2022-10-19 02:45:56'),
(18, 'Chờ xác nhận', 8656479, '2022-10-19 02:45:56', '2022-10-19 02:45:56'),
(19, 'Chờ xác nhận', 2837413, '2022-10-19 02:45:56', '2022-10-19 02:45:56'),
(20, 'Chờ xác nhận', 6380228, '2022-10-19 02:45:56', '2022-10-19 02:45:56');

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

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tone` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` tinyint(4) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `name`, `country`, `brand`, `category`, `tone`, `year`, `description`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(21, '0', 'Dr. Johann Kuvalis DDS', 'Bahrain', 'Sienna Rempel', 'Karina Leannon', 10, 1970, 'Consequatur rerum aut non non dolor voluptate alias. Cumque facilis laudantium rerum suscipit qui est. Aliquam rem ratione rerum eos et.', 10, 1500000, '2022-10-19 03:08:14', '2022-10-19 03:08:14'),
(22, '0', 'Jayce Graham', 'Guadeloupe', 'Dr. Cara Lehner', 'Ms. Chanelle Walker', 10, 1987, 'Sunt minus voluptate voluptates amet. Et et sunt qui provident. Voluptas dolor assumenda id repellat. Voluptatem deserunt esse repellendus debitis.', 10, 1500000, '2022-10-19 03:08:14', '2022-10-19 03:08:14'),
(23, '0', 'Dr. Edmond Kohler V', 'Australia', 'Keyon Gorczany', 'Eva Parker', 10, 1987, 'Eius consequatur corporis ea non velit atque mollitia ipsum. Qui doloribus est voluptatum vero.', 10, 1500000, '2022-10-19 03:08:14', '2022-10-19 03:08:14'),
(24, '0', 'Irma Gislason', 'Belarus', 'Dr. Cora Jacobs', 'Prof. Amira Roob', 10, 2016, 'Fuga ipsam qui aut odio temporibus porro. Sit officia fuga enim suscipit fuga nam. Molestias harum qui rem eum culpa.', 10, 1500000, '2022-10-19 03:08:14', '2022-10-19 03:08:14'),
(25, '0', 'Oral Auer', 'Sierra Leone', 'Miss Alysson Zemlak', 'Mr. Ethel Mante Sr.', 10, 1989, 'Ducimus reprehenderit voluptates asperiores. Nobis culpa est quo dolorum. Odit laboriosam corrupti facere numquam totam.', 10, 1500000, '2022-10-19 03:08:14', '2022-10-19 03:08:14'),
(26, '0', 'Ayla Dietrich', 'Iceland', 'Pearlie Smitham', 'Elian Marvin', 10, 1996, 'Placeat ut doloribus dolorem animi velit. Praesentium natus velit ullam cupiditate qui quis consequatur. Eum quo minima velit possimus.', 10, 1500000, '2022-10-19 03:08:14', '2022-10-19 03:08:14'),
(27, '0', 'Mrs. Jammie Lehner MD', 'Turkey', 'Sage Dietrich', 'Mrs. Caroline Dach', 10, 1978, 'Autem ipsam dolor voluptatem rem consequatur minus et. Voluptas ex fuga eveniet ut aliquam. Cum quo blanditiis consectetur quidem.', 10, 1500000, '2022-10-19 03:08:14', '2022-10-19 03:08:14'),
(28, '0', 'Lawrence Breitenberg', 'Saint Helena', 'Lizzie Kunde', 'Benton Olson', 10, 1990, 'Quam nostrum quasi quaerat non impedit aut repellat. Velit qui reiciendis autem. Temporibus quis provident rerum quia. Fuga itaque quis accusamus et.', 10, 1500000, '2022-10-19 03:08:14', '2022-10-19 03:08:14'),
(29, '0', 'Madaline Cole', 'Dominican Republic', 'Estel McLaughlin', 'Maxine Beahan', 10, 2013, 'Sequi eos quasi eius mollitia dolores perferendis aliquid. Atque ducimus et sunt cupiditate rerum tempora. Autem inventore accusamus ab.', 10, 1500000, '2022-10-19 03:08:14', '2022-10-19 03:08:14'),
(30, '0', 'Easton Hills Jr.', 'Switzerland', 'Tia Simonis', 'Shanny Douglas IV', 10, 2006, 'Dicta repudiandae ratione voluptas earum iste. Quis eveniet labore unde praesentium eius. Magnam consequatur molestiae et porro.', 10, 1500000, '2022-10-19 03:08:14', '2022-10-19 03:08:14'),
(31, '0', 'Gonzalo Collins', 'Korea', 'Ms. Camylle Orn', 'Elyssa Nicolas IV', 10, 2015, 'Libero tempora quis ea quisquam quia at. A quaerat vero cumque et. Totam numquam qui quam vel aut blanditiis vel.', 10, 1500000, '2022-10-19 03:08:14', '2022-10-19 03:08:14'),
(32, '0', 'Marlin Conroy DDS', 'Peru', 'Isaias Nolan', 'Isadore Corkery', 10, 1997, 'Vel officiis voluptas reprehenderit dolorem. Tempora facere voluptas neque eveniet harum quo qui. Nihil et quia et. Sint quibusdam mollitia sit.', 10, 1500000, '2022-10-19 03:08:14', '2022-10-19 03:08:14'),
(33, '0', 'Dr. Joyce Hackett', 'Belarus', 'Drew Fay', 'Dr. Nat Nienow', 10, 1992, 'Dolor dignissimos eos et qui omnis animi in. Enim corporis et ea libero libero quis quam. Vel labore et magni nisi laboriosam facilis.', 10, 1500000, '2022-10-19 03:08:14', '2022-10-19 03:08:14'),
(34, '0', 'Miss Lesly Harber III', 'Gambia', 'Amely Stroman', 'Alford Bauch', 10, 1995, 'Et dolorem perspiciatis dolor. Nihil laboriosam quas quisquam et itaque repellendus adipisci. Rem nesciunt molestiae non.', 10, 1500000, '2022-10-19 03:08:14', '2022-10-19 03:08:14'),
(35, '0', 'Prof. Shirley Hauck Sr.', 'Poland', 'Aniyah West', 'Margaret Moen', 10, 2007, 'Ipsa quibusdam ut sint quisquam ipsa error. Ratione est numquam ipsum eius. Alias assumenda esse dolorem eos. Optio odit perspiciatis veniam aut in.', 10, 1500000, '2022-10-19 03:08:14', '2022-10-19 03:08:14'),
(36, '0', 'Layla Schiller Jr.', 'Tonga', 'Sierra Volkman Sr.', 'Mr. Lula Bergnaum', 10, 1980, 'Vel mollitia voluptas facilis repellat non. Et rerum vel expedita officiis. Quisquam nesciunt ducimus magni unde consequatur quasi.', 10, 1500000, '2022-10-19 03:08:14', '2022-10-19 03:08:14'),
(37, '0', 'Ronny Flatley Sr.', 'Svalbard & Jan Mayen Islands', 'Yadira Braun V', 'Ms. Aurelie Lowe', 10, 1988, 'Maxime facilis sit quo aliquam ut voluptatem. Laudantium ut debitis ea consequatur blanditiis minus.', 10, 1500000, '2022-10-19 03:08:14', '2022-10-19 03:08:14'),
(38, '0', 'Federico Schaefer V', 'Palestinian Territories', 'Sienna Parisian IV', 'Alverta Mayer', 10, 1979, 'Earum veniam nihil eum rerum assumenda sed. Quos sint et inventore aut. Rerum libero aut totam nihil id sapiente.', 10, 1500000, '2022-10-19 03:08:14', '2022-10-19 03:08:14'),
(39, '0', 'Zachery Kautzer', 'Tokelau', 'London Sipes DDS', 'Dr. Floy Reichert III', 10, 2001, 'Harum vero natus cum sed voluptatum. Quisquam impedit similique quae. Illo praesentium illo temporibus voluptatem sequi ullam sed.', 10, 1500000, '2022-10-19 03:08:14', '2022-10-19 03:08:14'),
(40, '0', 'Prof. Will Osinski V', 'Ghana', 'Anne Hilpert', 'Kathryn Rippin', 10, 2019, 'Qui dignissimos et et in maxime natus. Cumque et a odit non. Nihil qui tempora sunt.', 10, 1500000, '2022-10-19 03:08:14', '2022-10-19 03:08:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Miss Dulce Hamill', 'johnson.jonas@example.org', '2022-10-19 02:39:49', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'wBV5qI3tYE', '2022-10-19 02:39:49', '2022-10-19 02:39:49'),
(2, 'Cullen Reinger', 'gabriel70@example.net', '2022-10-19 02:39:49', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'O16WBK6FJc', '2022-10-19 02:39:49', '2022-10-19 02:39:49'),
(3, 'Mrs. Lauren Schultz', 'jakubowski.johanna@example.org', '2022-10-19 02:39:49', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ad3DLlbjod', '2022-10-19 02:39:49', '2022-10-19 02:39:49'),
(4, 'Kallie Kilback', 'geovanni.glover@example.org', '2022-10-19 02:39:49', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'fs0feV0zFd', '2022-10-19 02:39:49', '2022-10-19 02:39:49'),
(5, 'Mr. Florencio Marks', 'monserrate78@example.com', '2022-10-19 02:39:49', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'bfMBFreMfb', '2022-10-19 02:39:49', '2022-10-19 02:39:49'),
(6, 'Marlee Brown DDS', 'pasquale11@example.org', '2022-10-19 02:39:49', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'MOhnIdIzdk', '2022-10-19 02:39:49', '2022-10-19 02:39:49'),
(7, 'Dr. Muriel Senger I', 'brice91@example.com', '2022-10-19 02:39:49', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '4Ta03aMoT0', '2022-10-19 02:39:49', '2022-10-19 02:39:49'),
(8, 'Brody Roberts', 'tflatley@example.org', '2022-10-19 02:39:49', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'BsXQJwcIWr', '2022-10-19 02:39:49', '2022-10-19 02:39:49'),
(9, 'Dillon Upton', 'yrolfson@example.com', '2022-10-19 02:39:49', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'IJyzoS34lk', '2022-10-19 02:39:49', '2022-10-19 02:39:49'),
(10, 'Cleora Yost II', 'bechtelar.dominic@example.com', '2022-10-19 02:39:49', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'XZTzGwpEAn', '2022-10-19 02:39:49', '2022-10-19 02:39:49'),
(11, 'Test User', 'test@example.com', '2022-10-19 02:39:49', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'v0eh9gINUm', '2022-10-19 02:39:49', '2022-10-19 02:39:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accounts_email_unique` (`email`),
  ADD UNIQUE KEY `accounts_phone_unique` (`phone`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
