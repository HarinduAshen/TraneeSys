-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2024 at 04:02 PM
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
-- Database: `newnewtms`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('admin@gmail.com1|127.0.0.1', 'i:1;', 1726633785),
('admin@gmail.com1|127.0.0.1:timer', 'i:1726633785;', 1726633785),
('admin1@gmail.com1|127.0.0.1', 'i:2;', 1726633797),
('admin1@gmail.com1|127.0.0.1:timer', 'i:1726633797;', 1726633797),
('kavinitharushika537@gmail.com|127.0.0.1', 'i:1;', 1727925995),
('kavinitharushika537@gmail.com|127.0.0.1:timer', 'i:1727925995;', 1727925995);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('Special','General') NOT NULL,
  `count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `division_id`, `type`, `count`, `created_at`, `updated_at`) VALUES
(24, 22, 'Special', 0, '2024-08-27 23:04:49', '2024-08-27 23:04:49');

-- --------------------------------------------------------

--
-- Table structure for table `degreeorcourses`
--

CREATE TABLE `degreeorcourses` (
  `id` int(100) UNSIGNED NOT NULL,
  `fid` int(11) NOT NULL,
  `dname` varchar(191) NOT NULL,
  `dnames` varchar(191) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT 1,
  `type` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `degreeorcourses`
--

INSERT INTO `degreeorcourses` (`id`, `fid`, `dname`, `dnames`, `IsActive`, `type`, `created_at`, `updated_at`, `order_id`) VALUES
(69, 27, 'test4', 'test4', 1, 1, '2024-06-25 04:33:31', '2024-06-25 04:33:31', NULL),
(70, 28, 'test4', 'test4', 1, 1, '2024-07-01 00:18:26', '2024-07-01 00:18:26', NULL),
(71, 29, 'Information Technology & management', 'තොරතුරු තාක්ෂණය සහ  කළමනාකරණය', 1, 1, '2024-07-01 00:25:30', '2024-07-22 01:06:04', NULL),
(72, 29, 'Information Technology', 'තොරතුරු තාක්ෂණය', 1, 1, '2024-07-01 04:59:06', '2024-07-01 04:59:06', NULL),
(73, 30, 'Information and Communication Technology', 'තොරතුරු සහ සන්නිවේදන තාක්ෂණය', 1, 1, '2024-07-01 05:00:25', '2024-07-01 05:00:25', NULL),
(74, 31, 'Compuer Science', 'පරිගණක විද්යාව', 1, 1, '2024-07-01 05:01:25', '2024-07-01 05:01:25', NULL),
(75, 32, 'Software Developer', 'මෘදුකාංග සංවර්ධක', 1, 1, '2024-07-01 05:02:43', '2024-07-01 05:02:43', NULL),
(76, 35, 'Applied Science', 'ව්යවහාරික විද්යාව', 1, 1, '2024-07-01 05:04:10', '2024-07-01 05:04:10', NULL),
(77, 33, 'Computer Science', 'පරිගණක විද්යාව', 1, 1, '2024-07-01 05:06:06', '2024-07-02 00:22:09', NULL),
(78, 36, 'Web and Multimedia', 'වෙබ් සහ බහුමාධ්‍ය', 1, 1, '2024-07-01 05:08:23', '2024-07-01 05:08:23', NULL),
(79, 34, 'Compuer Science', 'පරිගණක විද්යාව', 1, 1, '2024-07-01 05:09:03', '2024-07-01 05:09:03', NULL),
(88, 52, 'BEng (Hons) Software Engineering', 'මෘදුකාංග ඉංජිනේරු', 1, 1, '2024-08-22 03:36:01', '2024-08-22 03:36:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `division_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`division_id`, `division_name`, `created_at`, `updated_at`) VALUES
(22, 'Information Technology', '2024-07-01 00:26:12', '2024-07-09 23:41:29'),
(23, 'Communication Engineering', '2024-07-01 05:12:46', '2024-07-01 05:12:46'),
(24, 'Electronics and Microelectronics', '2024-07-01 05:13:32', '2024-07-01 05:13:32'),
(25, 'Industrial services', '2024-07-01 05:14:06', '2024-07-01 05:14:06'),
(26, 'Space Applications', '2024-07-01 05:14:44', '2024-07-09 23:41:46'),
(27, 'Astronomy', '2024-07-01 05:15:11', '2024-07-01 05:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `durations`
--

CREATE TABLE `durations` (
  `id` int(100) UNSIGNED NOT NULL,
  `name` varchar(190) NOT NULL,
  `names` varchar(190) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `durations`
--

INSERT INTO `durations` (`id`, `name`, `names`, `created_at`, `updated_at`) VALUES
(12, '1 year', 'වසර 1 යි', '2024-07-01 05:11:39', '2024-07-01 05:11:39'),
(13, '2 year', 'වසර 2 යි', '2024-07-01 05:11:45', '2024-07-01 05:11:45'),
(14, '3 months', 'මාස 3 යි', '2024-07-01 05:12:02', '2024-07-01 05:12:02'),
(17, '6 months', 'මාස 6 යි', '2024-10-07 10:51:58', '2024-10-07 10:51:58');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '0001_01_01_000000_create_users_table', 2),
(6, '0001_01_01_000001_create_cache_table', 2),
(7, '0001_01_01_000002_create_jobs_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$12$qmCMZwr/Vx627pl7xJhj.eBjLVm4WRB89lknoaTG8xI48PgC5NS7.', '2024-09-17 22:50:59'),
('chilankarunarathna@gmail.com', '$2y$12$Cfd.QXPe9CH3eQI7EkGpjeYg9PMb1nl5c4doJC6IXM0T3pIa8gx3O', '2024-08-15 04:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('XFWs6lti7gdOHBW06LOhrS2HqdejlyhY5SCQwfPy', 10, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUGhUamVpTmU4bWY3RlRoTVZuOXUxc2poOVhGQkM5V2REMHgwczJBVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90cmFpbmVlL2RldGFpbHMvMjIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxMDt9', 1730127545);

-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

CREATE TABLE `supervisors` (
  `id` int(100) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `names` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supervisors`
--

INSERT INTO `supervisors` (`id`, `name`, `names`, `created_at`, `updated_at`) VALUES
(10, 'Mrs. Rasika Somathilaka', 'රසිකා සෝමතිලක මිය', '2024-07-01 00:27:50', '2024-07-21 23:33:40'),
(15, 'Mrs. Lakshani Karunarathna', 'ලක්ෂානි කරුණාරත්න  මිය', '2024-08-22 03:38:33', '2024-08-22 03:38:33');

-- --------------------------------------------------------

--
-- Table structure for table `trainees`
--

CREATE TABLE `trainees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `registration_number` varchar(255) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `phone_number` varchar(15) NOT NULL,
  `nic` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `duration_id` int(100) UNSIGNED DEFAULT NULL,
  `university_id` int(100) UNSIGNED DEFAULT NULL,
  `degree_id` int(100) UNSIGNED DEFAULT NULL,
  `supervisor_id` int(100) UNSIGNED DEFAULT NULL,
  `division_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainees`
--

INSERT INTO `trainees` (`id`, `name`, `address`, `birthday`, `registration_number`, `gender`, `start_date`, `end_date`, `phone_number`, `nic`, `image`, `created_at`, `updated_at`, `email`, `duration_id`, `university_id`, `degree_id`, `supervisor_id`, `division_id`) VALUES
(50, 'Umesh Silva', '509/17, Mukalangamuwa, Siduwa', '1996-05-17', '90959', 'male', '2024-03-04', '2024-09-04', '0778241853', '961382599V', 'trainee_images/ABLuM2zxT9RRuGyNsHfOSBfivf6ehLuQZeu6Y6RS.jpg', '2024-07-02 03:06:20', '2024-08-22 05:07:09', 'umesh123hirantha@gmail.com', 12, 36, 78, 10, 22),
(78, 'saman', '123/A,Dediywala,Waskduwa.', '2024-10-03', '90100', 'male', '2024-10-03', '2024-10-03', '0766479764', '200351900345', 'trainee_images/QTJ5vibm640mrAFatY0luUOOgfKGz5wgIDqs6eEk.jpg', '2024-10-03 04:09:06', '2024-10-03 04:09:06', 'saman2003@gmail.com', 14, 38, 88, 15, 23),
(79, 'amal', '123/A,Dediywala,Waskduwa.', '2000-10-01', '90102', 'male', '2024-06-11', '2025-02-21', '011425789', '200024859725', 'trainee_images/53vgnOzQu00nEgzFo57RU2sXJvdOvwnSSr14hJoc.png', '2024-10-07 01:47:06', '2024-10-07 01:47:06', 'Amaffgl@gmail.com', 12, 34, 79, 15, 24),
(80, 'W.L.K.Tharushika', 'Kotta road Govinna', '2000-10-29', '90962', 'female', '2024-04-08', '2024-10-08', '0720897059', '200080302225', 'trainee_images/DVbkFzFwqMFB45tr24C5XBKK5o6RPTo658YNEdea.jpg', '2024-10-07 22:30:23', '2024-10-07 22:30:23', 'kavinitharushika537@gmail.com', 17, 30, 73, 10, 22),
(81, 'C.M.G.I.Bandara', 'C/49, Kahawandala, Udamulla, Mawanella', '2000-10-09', '90963', 'male', '2024-04-08', '2024-10-08', '0774474422', '200028301630', 'trainee_images/Cn5z1FrSzejR1cUuiTCTUBMcvgnuoaaBiUzpXC3j.jpg', '2024-10-07 22:34:19', '2024-10-07 22:34:19', 'gayanisuru777@gmail.com', 17, 30, 73, 10, 22),
(82, 'R S Thathsarani', '183,Thissa Mawatha,Walana,Panadura', '2003-01-06', '90992', 'female', '2024-07-05', '2025-01-05', '0764469560', '200350601539', 'trainee_images/lnFPWH9iWr3vq2pMFNQxSMbPX9WktqF1BrNqj7Zo.jpg', '2024-10-07 22:41:23', '2024-10-07 22:41:23', 'samindikathathsarani@gmail.com', 17, 32, 75, 15, 22),
(83, 'R.K.A.Devindi Kumari Rathnayaka', 'No 01, Station Road, Kuda Waskaduwa, Waskaduwa', '2003-04-29', '90991', 'female', '2024-07-05', '2025-01-05', '0741598809', '200362012155', 'trainee_images/2nIIG7xqUk6jzjWvOeoQLjUWyCo8IIXRghT0aEsW.png', '2024-10-07 22:45:46', '2024-10-07 22:45:46', 'devindirathnayaka03@gmail.com', 17, 32, 75, 15, 22),
(84, 'D.S.Dilshari', '123/A,Dediywala,Waskduwa.', '2003-01-19', '90993', 'female', '2024-07-05', '2025-01-05', '0766479767', '200351900347', 'trainee_images/bZaDIVLGKOwSiUR059Yx51r3DWfHTh0U0ag8yQSe.jpg', '2024-10-07 22:50:06', '2024-10-07 22:50:06', 'dilsharisadeepa2003@gmail.com', 17, 32, 75, 15, 22),
(85, 'J. A. T. Silva', '149/2/1, Mananduwa , Panapitiya Rd, Nugagoda, Waskaduwa.', '2002-08-21', '90990', 'female', '2024-07-05', '2025-01-05', '0755746663', '200273401530', 'trainee_images/hsTIWWZLp0raxnxpcbTMXEzwjakRpLBJiXhkQyjQ.jpg', '2024-10-07 22:52:29', '2024-10-07 22:52:29', 'anjutishani001@gmail.com', 17, 32, 75, 15, 22),
(86, 'A.D.I.Sankalpa Silva', '21/1/2, Sri Medananda Mawatha , Mathugama', '2003-06-13', '90970', 'female', '2024-05-02', '2024-11-02', '0722063291', '200316512977', 'trainee_images/wEbMFzBD9gFoAMDeI4XbOD98zAw8hzY1k4xWEaaa.jpg', '2024-10-07 22:58:02', '2024-10-07 22:58:02', 'diuthsankalpa@gmail.com', 17, 32, 75, 15, 22),
(87, 'A.D.I.Sankalpa', '21/1/2, Sri Medananda Mawatha , Mathugama', '2024-10-08', '90213', 'male', '2024-10-08', '2024-10-08', '0722063278', '200316512977', 'trainee_images/qhq5OlNK5XezgS3FPQLujW7NBCqmdGxf9IriNOPD.png', '2024-10-08 00:25:50', '2024-10-08 00:25:50', 'diuthsankalpa@gmail.com', 12, 52, 88, 10, 26);

-- --------------------------------------------------------

--
-- Table structure for table `uniorinstitutes`
--

CREATE TABLE `uniorinstitutes` (
  `id` int(100) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `names` varchar(191) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT 1,
  `typefac` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `divisioncode` varchar(100) DEFAULT NULL,
  `division_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uniorinstitutes`
--

INSERT INTO `uniorinstitutes` (`id`, `name`, `names`, `IsActive`, `typefac`, `created_at`, `updated_at`, `divisioncode`, `division_id`) VALUES
(29, 'University of  Moratuwa', 'මොරටුව විශ්වවිද්‍යාලය', 1, 1, '2024-07-01 00:24:21', '2024-07-21 23:32:48', NULL, 0),
(30, 'Uva Wellassa University Of Sri Lanka', 'ඌව වෙල්ලස්ස විශ්වවිද්‍යාලය', 1, 1, '2024-07-01 03:56:20', '2024-08-16 04:19:00', NULL, 0),
(31, 'University of Ruhuna', 'රුහුණු විශ්වවිද්‍යාලය', 1, 1, '2024-07-01 04:50:41', '2024-07-01 04:50:41', NULL, 0),
(32, 'Vocational Training Authority', 'වෘත්තීය පුහුණු අධිකාරිය', 1, 1, '2024-07-01 04:51:58', '2024-07-01 04:51:58', NULL, 0),
(33, 'University of Sabaragamuwa', 'සබරගමුව විශ්වවිද්‍යාලය', 1, 1, '2024-07-01 04:53:26', '2024-07-01 04:53:26', NULL, 0),
(34, 'University of Peradeniya', 'පේරාදෙණිය විශ්වවිද්‍යාලය', 1, 1, '2024-07-01 04:54:11', '2024-07-01 04:54:11', NULL, 0),
(35, 'University of Jayawardanapura', 'ජයවර්ධනපුර විශ්වවිද්‍යාලය', 1, 1, '2024-07-01 04:54:47', '2024-07-01 04:54:47', NULL, 0),
(36, 'University of Vocational Technology', 'වෘත්තීය තාක්ෂණ විශ්ව විද්යාලය', 1, 1, '2024-07-01 04:55:47', '2024-07-01 04:55:47', NULL, 0),
(37, 'Open University of Sri Lanka', 'ශ්‍රී ලංකා විවෘත විශ්වවිද්‍යාලය', 1, 1, '2024-07-01 04:56:38', '2024-07-01 04:56:38', NULL, 0),
(38, 'NSBM Green University', 'NSBM හරිත විශ්ව විද්‍යාලය', 1, 1, '2024-07-01 05:05:07', '2024-07-01 05:05:07', NULL, 0),
(52, 'Informatics Institute of Technology', 'IIT විශ්වවිද්‍යාලය', 1, 1, '2024-08-22 03:12:32', '2024-08-22 03:12:32', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  `division_id` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `division_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'gayan', 'gayanisuru777@gmail.com', NULL, '$2y$12$lqd1/Pe.RbXURPC1N6PFT.7ae3c3erKn0564byh8iLFyb6Ihroq7S', 'user', '', NULL, '2024-07-22 04:36:45', '2024-07-22 04:36:45'),
(5, 'harry Potter', 'chilankarunarathna@gmail.com', NULL, '$2y$12$D5rdn/L0L.JVOKVysZnf7eiY8HIxVM1jErGwZ5/LlTwz3En0eHv8W', 'user', '', NULL, '2024-07-24 00:17:15', '2024-07-24 00:17:15'),
(6, 'harry Potter', 'rmcckarunarathna@gmail.com', NULL, '$2y$12$pmNriTWK024UN/40Y3b8s.2j4UK86jq3S6Mb2VPhNK11Vrx/.PNLG', 'admin', '', 'FXR6vRMFPfeiYEoBXVFKg5LMCQ6yZcO01p6kqNW4JO092hQP2owMLCbiKg1J', '2024-07-24 00:17:38', '2024-07-24 00:17:38'),
(7, 'sasa', 'sasadarishashiprabha@gmail.com', NULL, '$2y$12$UDZs8D0Uo4OWIxSWYKLkfe..jpmAO6BeOGjoNCmRcBxqmICxBacCa', 'admin', '', NULL, '2024-07-24 00:21:10', '2024-07-24 00:21:10'),
(10, 'Rasika Somarathna', 'admin@gmail.com', NULL, '$2y$12$1AtEVMR/l1Fg5vYz69V7JuaKSABtQ5vNPgD53UEO4qPzEC2WDbY5.', 'admin', '', NULL, '2024-08-13 00:50:29', '2024-08-13 00:50:29'),
(11, 'Trainee', 'trainee@gmail.com', NULL, '$2y$12$/BPb.m4AHpnvplX5vKGa8ent8TDh.xyrBXE6.bBlG4xYbFJxKSHZ2', 'user', '', NULL, '2024-08-13 00:53:08', '2024-08-13 00:53:08'),
(12, 'harry Potter', '123@gmail.com', NULL, '$2y$12$VHEHqqUUE3gORNgvqa7MBeLwLsaO8w8T/E6GqnvV8SGQd7IZ7o0ru', 'admin', '', NULL, '2024-08-15 19:23:10', '2024-08-15 19:23:10'),
(22, 'amal', 'amal@gmail.com', NULL, '$2y$12$rWoUVSlvSDEIS3nc.KTiJOO5kz/Nz40XYARCQbAJnrtuK8yo4.LZK', 'user', '22', NULL, '2024-08-26 23:15:03', '2024-08-26 23:15:03'),
(23, 'Amali', 'amali@gmail.com', NULL, '$2y$12$Q3dIII.8oa.2.dlM4AhrweadPib66e62ZbQJbdzuRDxjaEgRgyhqO', 'user', '23', NULL, '2024-08-26 23:15:53', '2024-08-26 23:15:53'),
(24, 'kasun', 'kasun@gmail.com', NULL, '$2y$12$u.kmz4cK2BapsP./qqdG2OjWXEvtCsyords.cnhWfZinliSqjYvJW', 'user', '26', NULL, '2024-08-26 23:17:23', '2024-08-26 23:17:23'),
(25, 'admin1', 'admin1@gmail.com', NULL, '$2y$12$6Ys5qj9tYOk9.9d7zfhEduzMhGuCVFvrPglPO8JE0MI1ZRQHlWdS.', 'Admin', '22', NULL, '2024-09-17 22:41:19', '2024-09-17 22:41:19'),
(27, 'kavini', 'kavinitharushika537@gmail.com', NULL, '$2y$12$n.86ay.i62eY2q9SAuJ02.TLoyZbIC94uJmQi.nIQwFp7EhcDG.EW', 'Admin', '22', NULL, '2024-10-02 21:56:23', '2024-10-02 21:56:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_division_id_foreign` (`division_id`);

--
-- Indexes for table `degreeorcourses`
--
ALTER TABLE `degreeorcourses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`division_id`);

--
-- Indexes for table `durations`
--
ALTER TABLE `durations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainees`
--
ALTER TABLE `trainees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `duration constration` (`duration_id`),
  ADD KEY `supervisor_constration` (`supervisor_id`),
  ADD KEY `degree_constration` (`degree_id`),
  ADD KEY `university_constartin` (`university_id`),
  ADD KEY `division_id` (`division_id`);

--
-- Indexes for table `uniorinstitutes`
--
ALTER TABLE `uniorinstitutes`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `degreeorcourses`
--
ALTER TABLE `degreeorcourses`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `division_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `durations`
--
ALTER TABLE `durations`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `supervisors`
--
ALTER TABLE `supervisors`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `trainees`
--
ALTER TABLE `trainees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `uniorinstitutes`
--
ALTER TABLE `uniorinstitutes`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`division_id`) ON DELETE CASCADE;

--
-- Constraints for table `trainees`
--
ALTER TABLE `trainees`
  ADD CONSTRAINT `degree_constration` FOREIGN KEY (`degree_id`) REFERENCES `degreeorcourses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `duration constration` FOREIGN KEY (`duration_id`) REFERENCES `durations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `supervisor_constration` FOREIGN KEY (`supervisor_id`) REFERENCES `supervisors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `university_constartin` FOREIGN KEY (`university_id`) REFERENCES `uniorinstitutes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
