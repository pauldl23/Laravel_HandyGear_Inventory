-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2025 at 07:51 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warehouse_laravel_db`
--

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
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(5, '2025_04_07_033950_create_logs_table', 1),
(6, '2025_05_05_051042_add_log_message_to_tbl_logs', 1);

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
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `category_ID` int(11) NOT NULL,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`category_ID`, `category_name`) VALUES
(1, 'Power Tools'),
(2, 'Hand Tools'),
(3, 'Machinery'),
(4, 'Electrical Components'),
(5, 'Plumbing Tools'),
(6, 'Safety Equipment'),
(7, 'Material');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inventory`
--

CREATE TABLE `tbl_inventory` (
  `product_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_ID` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_price` float DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `product_category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_inventory`
--

INSERT INTO `tbl_inventory` (`product_name`, `product_ID`, `product_price`, `product_quantity`, `product_category`, `category_ID`) VALUES
('Aluminum', 'QU-2368-Qx', 7820, 65, 'Material', 7),
('Steel', 'IS-5876-GR', 70062.3, 52, 'Material', 7),
('Red Wood', 'XM-0812-FG', 33833.1, 86, 'Material', 7),
('Brass', 'ZG-3943-JH', 12329.1, 12, 'Material', 7),
('Vinyl', 'DH-0513-WX', 97072.7, 25, 'Material', 7),
('Screwdriver Set', 'SD-1022-BB', 25.49, 80, 'Tools', 1),
('Power Drill', 'PD-1023-CC', 89.99, 40, 'Electrical Components', 4),
('Circular Saw', 'CS-1024-DE', 150, 25, 'Material', 1),
('Plywood (4x8)', 'PW-1027-GG', 45.99, 58, 'Wood', 3),
('Lumber (2x4)', 'LB-1028-HH', 25.99, 70, 'Wood', 3),
('Paint (1 gallon)', 'PT-1029-II', 32.99, 60, 'Finishing Materials', 4),
('Paint Brush Set', 'PB-1030-JJ', 12.49, 100, 'Finishing Materials', 4),
('PVC Pipes (10 ft)', 'PP-1032-LL', 14.99, 150, 'Plumbing', 5),
('Pipe Fittings (Set)', 'PF-1033-MM', 19.99, 19, 'Plumbing', 5),
('Wrench Set', 'WR-1034-NN', 29.99, 60, 'Tools', 1),
('Sandpaper (Pack of 10)', 'SP-1035-OO', 7.99, 120, 'Finishing Materials', 4),
('Steel Rebar (10 ft)', 'SR-1037-QQ', 12.99, 100, 'Metal', 6),
('Tape Measure', 'TM-1039-SS', 8.99, 90, 'Tools', 1),
('Ladder (6 ft)', 'LD-1040-TT', 75, 15, 'Tools', 1),
('Hammer', 'PD-1130-ST', 25.99, 50, 'Tools', 1),
('Screw Nails (Pack)', 'SR-1138-QQ\r\n', 12.49, 200, 'Hardware', 2),
('Paint Roller', 'ZG-6969-JH\r\n', 9.99, 150, 'Finishing Materials', 4),
('PVC Pipe (15 ft)', 'IS-9999-GR', 29.99, 120, 'Plumbing', 5),
('Steel Beam (20 ft)', 'PF-1213-MM\r\n', 120, 28, 'Metal', 6),
('Wood Glue', 'DH-7777-WX\r\n', 6.99, 100, 'Material', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs`
--

CREATE TABLE `tbl_logs` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `log_message` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_logs`
--

INSERT INTO `tbl_logs` (`log_id`, `user_id`, `timestamp`, `log_message`) VALUES
(1, 110002, '2024-12-09 21:57:48', NULL),
(2, 110001, '2024-12-09 21:59:06', NULL),
(3, 110002, '2024-12-09 22:13:41', NULL),
(4, 110002, '2024-12-09 22:18:41', NULL),
(5, 110001, '2024-12-09 22:18:58', NULL),
(6, 110001, '2024-12-09 22:25:27', NULL),
(7, 110001, '2024-12-09 22:25:55', NULL),
(8, 110001, '2024-12-10 23:42:57', NULL),
(9, 110001, '2024-12-10 23:49:22', NULL),
(10, 110001, '2024-12-12 06:14:28', NULL),
(11, 110001, '2024-12-12 09:09:59', NULL),
(12, 110001, '2024-12-12 09:18:15', NULL),
(13, 110001, '2024-12-12 09:35:50', NULL),
(14, 110001, '2024-12-12 09:40:14', NULL),
(15, 110001, '2024-12-12 09:43:15', NULL),
(16, 110001, '2024-12-13 18:57:51', NULL),
(17, 110001, '2024-12-13 20:04:59', NULL),
(18, 110001, '2024-12-14 02:13:26', NULL),
(19, 110001, '2024-12-14 02:14:28', NULL),
(20, 110001, '2024-12-14 02:21:37', NULL),
(21, 110002, '2024-12-14 02:25:21', NULL),
(22, 110001, '2024-12-14 02:26:25', NULL),
(23, 110001, '2024-12-14 02:35:12', NULL),
(24, 110001, '2024-12-16 02:19:22', NULL),
(25, 110006, '2024-12-16 02:20:39', NULL),
(26, 110007, '2024-12-16 02:28:36', NULL),
(27, 110006, '2024-12-16 02:34:33', NULL),
(28, 110007, '2024-12-16 03:01:36', NULL),
(29, 110005, '2024-12-16 03:06:54', NULL),
(30, 110001, '2024-12-16 03:07:37', NULL),
(31, 110005, '2024-12-16 03:07:40', NULL),
(32, 110001, '2024-12-16 03:10:19', NULL),
(33, 110002, '2024-12-16 03:11:09', NULL),
(34, 110002, '2024-12-16 03:11:47', NULL),
(35, 110001, '2024-12-16 03:12:07', NULL),
(36, 110001, '2024-12-16 03:15:32', NULL),
(37, 110001, '2024-12-16 03:39:35', NULL),
(38, 110001, '2024-12-16 03:43:42', NULL),
(39, 110001, '2024-12-16 03:52:47', NULL),
(40, 110001, '2024-12-16 04:38:43', NULL),
(41, 110001, '2024-12-16 04:40:56', NULL),
(42, 110001, '2024-12-16 04:43:57', NULL),
(43, 110001, '2024-12-16 04:51:32', NULL),
(44, 110001, '2024-12-16 04:53:00', NULL),
(45, 110001, '2024-12-16 04:53:30', NULL),
(46, 110001, '2024-12-16 05:00:37', NULL),
(47, 110001, '2024-12-16 05:05:45', NULL),
(48, 110001, '2024-12-16 05:10:36', NULL),
(49, 110001, '2024-12-16 05:21:37', NULL),
(50, 110001, '2024-12-16 05:22:49', NULL),
(51, 110001, '2024-12-16 05:23:24', NULL),
(52, 110001, '2025-05-03 00:36:31', NULL),
(53, 110001, '2025-05-03 00:57:58', NULL),
(54, 110001, '2025-05-03 01:01:08', NULL),
(55, 110001, '2025-05-03 01:24:31', NULL),
(56, 110001, '2025-05-03 01:28:02', NULL),
(57, 110001, '2025-05-03 01:28:10', NULL),
(58, 110005, '2025-05-03 01:40:22', NULL),
(59, 110001, '2025-05-03 01:41:29', NULL),
(60, 110002, '2025-05-03 01:44:58', NULL),
(61, 110001, '2025-05-03 01:47:06', NULL),
(62, 110001, '2025-05-03 01:47:29', NULL),
(63, 110001, '2025-05-03 01:47:41', NULL),
(64, 110001, '2025-05-03 01:48:46', NULL),
(65, 110001, '2025-05-03 01:49:10', NULL),
(66, 110001, '2025-05-03 01:49:25', NULL),
(67, 110001, '2025-05-04 20:13:52', NULL),
(68, 110001, '2025-05-04 21:01:59', NULL),
(69, 110002, '2025-05-04 21:05:45', NULL),
(70, 110001, '2025-05-04 21:06:00', NULL),
(71, 110001, '2025-05-04 21:15:54', NULL),
(72, 110001, '2025-05-04 21:16:46', NULL),
(73, 110001, '2025-05-04 21:17:00', NULL),
(74, 110001, '2025-05-04 21:20:44', NULL),
(75, 110001, '2025-05-04 21:20:47', NULL),
(76, 110001, '2025-05-04 21:20:48', NULL),
(77, 110001, '2025-05-04 21:20:50', NULL),
(78, 110001, '2025-05-04 21:20:58', NULL),
(79, 110001, '2025-05-04 21:21:00', NULL),
(80, 110001, '2025-05-04 21:21:01', NULL),
(81, 110001, '2025-05-04 21:22:47', NULL),
(82, 110001, '2025-05-04 21:22:48', NULL),
(83, 110001, '2025-05-04 21:24:04', NULL),
(84, 110001, '2025-05-04 21:24:39', NULL),
(85, 110001, '2025-05-04 21:25:21', NULL),
(86, 110001, '2025-05-04 21:25:33', NULL),
(87, 110001, '2025-05-04 21:25:49', NULL),
(88, 110001, '2025-05-04 21:25:50', NULL),
(89, 110001, '2025-05-04 21:25:51', NULL),
(90, 110001, '2025-05-04 21:26:05', NULL),
(91, 110001, '2025-05-04 21:26:15', NULL),
(92, 110001, '2025-05-04 21:26:22', NULL),
(93, 110001, '2025-05-04 21:27:06', NULL),
(94, 110001, '2025-05-04 21:32:55', NULL),
(95, 110001, '2025-05-04 21:32:57', NULL),
(96, 110001, '2025-05-04 21:33:02', NULL),
(97, 110002, '2025-05-04 21:33:54', NULL),
(98, 110001, '2025-05-04 21:51:37', NULL),
(99, 110001, '2025-05-04 21:51:48', NULL),
(100, 110001, '2025-05-04 21:51:54', NULL),
(101, 110002, '2025-05-04 21:52:05', NULL),
(102, 110002, '2025-05-04 21:52:15', NULL),
(103, 110001, '2025-05-04 21:52:25', NULL),
(104, 110001, '2025-05-04 22:01:19', NULL),
(105, 110001, '2025-05-04 22:01:25', NULL),
(106, 110001, '2025-05-04 22:01:32', NULL),
(107, 110001, '2025-05-04 22:01:37', NULL),
(108, 110002, '2025-05-04 22:01:49', NULL),
(109, 110002, '2025-05-04 22:02:00', NULL),
(110, 110001, '2025-05-04 22:02:09', NULL),
(111, 110001, '2025-05-04 22:02:32', NULL),
(112, 110001, '2025-05-04 22:02:45', NULL),
(113, 110001, '2025-05-06 07:57:30', NULL),
(114, 110001, '2025-05-06 07:57:35', NULL),
(115, 110002, '2025-05-06 07:57:41', NULL),
(116, 110001, '2025-05-06 08:12:12', NULL),
(117, 110001, '2025-05-06 08:13:01', NULL),
(118, 110001, '2025-05-06 08:13:14', NULL),
(119, 110001, '2025-05-06 08:13:17', NULL),
(120, 110001, '2025-05-06 08:13:50', NULL),
(121, 110001, '2025-05-06 08:13:55', NULL),
(122, 110001, '2025-05-06 08:17:31', NULL),
(123, 110001, '2025-05-06 08:19:13', NULL),
(124, 110002, '2025-05-06 08:19:24', NULL),
(125, 110001, '2025-05-06 08:23:01', NULL),
(126, 110001, '2025-05-06 08:23:05', NULL),
(127, 110001, '2025-05-06 08:23:52', NULL),
(128, 110001, '2025-05-06 08:23:58', NULL),
(129, 110001, '2025-05-06 08:30:07', NULL),
(130, 110001, '2025-05-06 08:31:01', NULL),
(131, 110001, '2025-05-06 19:57:30', NULL),
(132, 110001, '2025-05-06 20:06:42', NULL),
(133, 110001, '2025-05-06 20:49:27', NULL),
(134, 110001, '2025-05-06 21:09:00', NULL),
(135, 110002, '2025-05-06 21:09:05', NULL),
(136, 110001, '2025-05-06 21:09:21', NULL),
(137, 110001, '2025-05-06 21:09:28', NULL),
(138, 110001, '2025-05-06 21:09:42', NULL),
(139, 110001, '2025-05-06 21:21:38', NULL),
(140, 110001, '2025-05-06 21:21:55', NULL),
(141, 110001, '2025-05-07 05:28:41', NULL),
(142, 110001, '2025-05-07 05:28:55', NULL),
(143, 110001, '2025-05-07 05:31:22', NULL),
(144, 110001, '2025-05-07 05:31:37', NULL),
(145, 110001, '2025-05-07 05:37:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `transaction_ID` int(11) NOT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `transaction_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`transaction_ID`, `user_ID`, `transaction_type`, `transaction_date`) VALUES
(1014, 110004, 'Purchase', '2024-02-08'),
(1016, 110006, 'Purchase', '2024-02-10'),
(1017, NULL, 'Purchase', '2024-02-11'),
(1019, 110009, 'Return', '2024-02-13'),
(1021, 110001, 'Purchase', '2024-02-15'),
(1027, NULL, 'Sale', '2024-02-21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userID` int(11) NOT NULL,
  `username` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usertype` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userID`, `username`, `password`, `firstname`, `lastname`, `usertype`) VALUES
(110001, 'johndoe', 'password123', 'John', 'Doe', 'Admin'),
(110002, 'janedoe', 'secure456', 'Jane', 'Doe', 'User'),
(110003, 'asmith', 'mypassword789', 'Alice', 'Smith', 'User'),
(110004, 'bwilliams', 'passkey101', 'Bob', 'Williams', 'Admin'),
(110005, 'cmartin', 'alpha112', 'Carol', 'Martin', 'User'),
(110006, 'ddavis', 'beta113', 'Diana', 'Davis', 'User'),
(110008, 'fwright', 'delta115', 'Frank', 'Wright', 'User'),
(110009, 'gpatel', 'epsilon116', 'George', 'Patel', 'Admin'),
(110010, 'hlee', 'zeta117', 'Hannah', 'Lee', 'User'),
(110011, 'irodriguez', 'theta118', 'Isabel', 'Rodriguez', 'User'),
(110012, 'jwatson', 'iota119', 'Jack', 'Watson', 'Admin'),
(110013, 'kclark', 'kappa120', 'Karen', 'Clark', 'User'),
(110014, 'lramirez', 'lambda121', 'Leo', 'Ramirez', 'User'),
(110015, 'msanders', 'mu122', 'Maria', 'Sanders', 'Admin'),
(110016, 'njones', 'nu123', 'Nina', 'Jones', 'User'),
(110017, 'owilson', 'xi124', 'Oscar', 'Wilson', 'User'),
(110019, 'qgreen', 'pi126', 'Quincy', 'Green', 'User'),
(110022, 'tking', 'tau129', 'Tina', 'King', 'User'),
(110023, 'uallen', 'upsilon130', 'Uma', 'Allen', 'User'),
(110024, 'vyoung', 'phi131', 'Victor', 'Young', 'Admin');

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
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`category_ID`);

--
-- Indexes for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  ADD KEY `fk_category` (`category_ID`);

--
-- Indexes for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`transaction_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userID`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `category_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_ID`) REFERENCES `tbl_categories` (`category_ID`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD CONSTRAINT `tbl_transaction_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `tbl_users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
