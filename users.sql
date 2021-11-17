-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 03, 2021 at 03:41 AM
-- Server version: 5.7.36-log
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `escuelar_helicarrier_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refferal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referrer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refferal_code_affilate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'gravatar',
  `avatar_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_changed_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `confirmation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `timezone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uuid`, `first_name`, `last_name`, `email`, `refferal_code`, `referrer_email`, `refferal_code_affilate`, `dob`, `phone`, `gender`, `address`, `city`, `pincode`, `state`, `country`, `avatar_type`, `avatar_location`, `password`, `password_changed_at`, `active`, `confirmation_code`, `confirmed`, `timezone`, `last_login_at`, `last_login_ip`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`) VALUES
(1, 'b65b1a8e-e265-4b28-aa69-8acf10b7aa18', 'Ray', 'bolivar', 'admin@lms.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gravatar', NULL, '$2y$10$HDKQ/oTt5oz8h6wgIFvcbuXpHTURIag0YY6jYRCWhQeTOdymJfJCy', NULL, 1, '20637027fdcd7c1b5007c45a3add1163', 1, NULL, '2021-11-03 11:03:09', '103.149.241.10', NULL, '2020-12-14 05:28:21', '2021-11-03 11:03:09', NULL, NULL, NULL, NULL, NULL),
(2, '47e2f580-ee44-4dd3-bbb0-bd81e8fc2c6d', 'Teacher', 'User', 'teacher@lms.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gravatar', NULL, '$2y$10$ypZNoWy8Y/Xs8m./EOsJge2ZTcRUhBaOKBbyPru8In3JUVKzG2Om6', NULL, 1, 'b625d3817a199870f749085d03f30cc7', 1, NULL, '2021-08-26 11:36:53', '39.37.143.142', NULL, '2020-12-14 05:28:21', '2021-08-26 11:36:53', NULL, NULL, NULL, NULL, NULL),
(3, '18e693f1-c276-4e98-8c93-71d9c36e686f', 'Student', 'User', 'student@lms.com', '8D5A0651', 'ray1no3@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gravatar', NULL, '$2y$10$duf7yTdS4npN9cmsrnXsVO2.T0vpibojM.gnJiQMS2lCT/Meabzza', NULL, 1, '9016257594f0ab8e9cf9f48445c6e0a5', 1, NULL, '2021-10-29 10:13:53', '31.221.182.24', NULL, '2020-12-14 05:28:21', '2021-10-29 10:13:53', NULL, 'cus_K10rwy55xlKtll', 'visa', '4242', NULL),
(4, '146c3673-673e-4b4c-ade7-8cfd4f3e1dd7', 'Normal', 'User', 'user@lms.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gravatar', NULL, '$2y$10$ecn5Y.CHH64Ien0Pp1K4JuarPv0fgGJeqZXjJrIZfGLH2NcP.QC6i', NULL, 1, '97517de76bcb031e2b5a266e57f7bbfb', 1, NULL, NULL, NULL, NULL, '2020-12-14 05:28:21', '2020-12-14 05:28:21', NULL, NULL, NULL, NULL, NULL),
(5, '6cf524c1-63d6-4850-8a74-bf66c3017493', 'umer', 'fayyaz', 'umerfayyaz500@gmail.com', '532EAE73', 'umerpaypal@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gravatar', NULL, '$2y$10$zE7pX.J/nWpiAQMO/jF6heVqyTpPdYJ1c961lbsflcBfTik2GoaQO', NULL, 1, NULL, 1, NULL, '2021-10-21 18:36:43', '182.179.173.251', 'tMsEn0hJXes5oNKyKeiS2xX1YZ2cNA3rvK2ffXj6g3fV05uAk3YVNyyF4YTp', '2021-07-12 11:42:24', '2021-10-30 11:09:13', NULL, NULL, NULL, NULL, NULL),
(7, '6e668555-87a7-44af-a123-8889db7bae67', 'Hamid', 'khan', 'hamid@gmail.com', '4540C956', 'mohsin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gravatar', NULL, '$2y$10$yzRHjgB1uC0lxbRrJXEWQu07R2Lid83T39MQ/TlWA0KkfHVgwqsXq', NULL, 1, NULL, 1, NULL, '2021-11-02 16:23:09', '103.149.241.10', NULL, '2021-07-13 06:11:14', '2021-11-02 16:23:09', NULL, 'cus_K9T3UyWft6wZqS', 'visa', '4242', NULL),
(14, 'b2c16075-6cb1-469b-a046-f5ed8ab51953', 'afridi', 'khan', 'afridi@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gravatar', NULL, '$2y$10$xP23CJS83qbCJ5frcxP/w.jvW0Nl5H0H030Xn6BNK4oTpPYkDKONW', NULL, 1, NULL, 1, NULL, '2021-08-12 16:12:29', '119.155.38.22', NULL, '2021-08-12 16:12:15', '2021-08-12 16:13:11', NULL, 'cus_K1fAUWFRmddvPC', 'visa', '4242', NULL),
(103, '77c7f743-29e9-4c4e-993e-bfefab95ac5d', 'mtest', 'khan', 'mtest@gmail.com', '5B58E238', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gravatar', NULL, '$2y$10$9OYefukF4Vv1/JmSuwcTv.s9LHgPSWGtyTTrzgwynJLTNzJ/B.KL.', NULL, 1, NULL, 1, NULL, '2021-11-02 13:45:14', '39.37.184.253', NULL, '2021-10-27 11:35:05', '2021-11-02 13:45:14', NULL, NULL, NULL, NULL, NULL),
(104, '4c02afa2-72bc-4d54-8033-d5764845d203', 'mtest1K', 'khan', 'mtest1@gmail.com', '1EA65CB7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gravatar', NULL, '$2y$10$5bqqFwqjdXFA1nYvWBwpB.mDsk6leXX1ri5NNp5fd8UzeTmSB7uaK', NULL, 1, NULL, 1, NULL, '2021-11-01 18:43:41', '39.37.184.253', NULL, '2021-10-27 17:01:51', '2021-11-01 18:43:41', NULL, 'cus_KVDVQDwoqz20ed', NULL, NULL, NULL),
(105, '6313447f-d356-4cad-bb9c-001f12de87ed', 'M Javed', 'Raza', 'javeedraza2547@gmail.com', 'AF5F0F16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gravatar', NULL, '$2y$10$lYTrIvD66.O9pOmlH.Ez/OGbjMQyvA6atQERnG989z9TVZ5742MHu', NULL, 1, NULL, 1, NULL, '2021-11-03 11:32:50', '103.116.250.91', NULL, '2021-10-28 19:02:00', '2021-11-03 11:32:50', NULL, NULL, NULL, NULL, NULL),
(106, '6fe7e39a-6430-45fd-b6a9-7fdc809e3c41', 'test99', 'test', 'test99@gmail.com', 'A4E2C229', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gravatar', NULL, '$2y$10$GlyRJio8NxkwQKk3MYk1w.1FgRBkmFAlVjKX1MksVANYGtcemYaPO', NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, '2021-10-29 15:59:57', '2021-10-29 15:59:57', NULL, NULL, NULL, NULL, NULL),
(108, 'e8e974a1-f4e6-46e3-9ae1-2dc4f175a680', 'alberto', 'escritor', 'convierte2@gmail.com', 'E1CD3E06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gravatar', NULL, '$2y$10$P27C7Z/VV20f4ebCPQRwWuBtRLUejHrHut08TUEP.Q0TdvmW6PFCa', NULL, 1, NULL, 1, NULL, '2021-11-03 07:52:26', '46.6.159.13', '8A2wO5xx4qKBbbvUhMwqaJ5QYurcxmTbRl8l84wJmWl0d8vmzahw9Ttt49J1', '2021-10-30 15:36:14', '2021-11-03 07:52:26', NULL, NULL, NULL, NULL, NULL),
(109, '21a94214-35ba-4a1e-b833-9999f2457ca7', 'umer test', 'test', 'mkhan9658@gmail.com', 'A5707B5F', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gravatar', NULL, '$2y$10$uIISiRtqol24aicQSdulf.45a7TBYBOJqkoCzJLzRqosz6pXhfUyS', NULL, 1, NULL, 1, NULL, '2021-10-30 15:41:21', '103.149.241.10', NULL, '2021-10-30 15:39:14', '2021-10-30 15:41:21', NULL, NULL, NULL, NULL, NULL),
(113, '5973b455-4827-47fe-a5eb-63c4b469687c', 'Asdf', 'Test', 'asdf123@gmail.com', '72D1F3FB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gravatar', NULL, '$2y$10$GK/h.4jM1I2Yi/35igOXLu473ERi9WVTVJCZh46FpPHgG5.ZSTO0e', NULL, 1, NULL, 1, NULL, '2021-11-01 21:40:49', '103.116.250.122', NULL, '2021-11-01 21:39:52', '2021-11-01 21:40:49', NULL, NULL, NULL, NULL, NULL),
(114, 'a3368fe9-dd08-4b49-aea6-44939eb9f6c6', 'mtestagain', 'khan', 'mtestagain@gmail.com', '3224F477', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gravatar', NULL, '$2y$10$IcQaLCkAUdv/f8okVrrJC.AJt082pK4qQk/mteqIGkEa6bjkjxe..', NULL, 1, NULL, 1, NULL, '2021-11-02 15:58:49', '103.149.241.10', NULL, '2021-11-01 21:53:25', '2021-11-02 15:58:49', NULL, NULL, NULL, NULL, NULL),
(115, '7b121fc8-16b1-4e2d-9d4f-79d92fa7dff6', 'test24', 'raza', 'test24@gmail.com', 'C1F4939F', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gravatar', NULL, '$2y$10$qvDKN/qkIg9Y1S/0aZOQpOvPxTvgfaXvkLgDaBOeW4dCEgXWybzNS', NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, '2021-11-01 22:10:05', '2021-11-01 22:10:05', NULL, NULL, NULL, NULL, NULL),
(116, '82da3374-f22a-4ff5-85ce-2bbf8a0c7a15', 'Diana', 'Dimerman', 'didi19260@gmail.com', '78BAF078', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gravatar', NULL, '$2y$10$X6OnEk/xvrI7cxK/SZaHiukTbqvoktP.ZekIbXYVuGvEG4IZ75Beq', NULL, 1, NULL, 1, NULL, '2021-11-02 03:37:33', '79.177.28.187', NULL, '2021-11-01 22:15:52', '2021-11-02 03:37:33', NULL, NULL, NULL, NULL, NULL),
(117, '3a792bfe-c239-4ede-af84-9103162b337a', 'Yennis', 'Molina', 'yennismm@gmail.com', '1AEB02F0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gravatar', NULL, '$2y$10$RjzKnsBm7U/kzLDKtIoiOu1v8UAfPNZr7fph7Z17hW08XZ5BQXK9a', NULL, 1, NULL, 1, NULL, '2021-11-02 02:01:18', '84.124.146.128', NULL, '2021-11-01 22:33:07', '2021-11-02 02:01:18', NULL, NULL, NULL, NULL, NULL),
(118, '46d14c1b-deb8-4887-8df5-04775aec5cc7', 'Concha', 'Mateo Gracia', 'cmateog@hotmail.es', 'E6F31EB3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gravatar', NULL, '$2y$10$8K1UbUO2zwdVRWe1JPzM4.f3WUGu//myF22G7hfp/XI0SVyRx8TiK', NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, '2021-11-01 22:37:23', '2021-11-01 22:37:23', NULL, NULL, NULL, NULL, NULL),
(119, 'cfbfc870-6009-4aac-bff5-1cff8c1558ae', 'Fran', 'Loga', 'franlogaescritor@gmail.com', 'B6798454', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gravatar', NULL, '$2y$10$hmqYXjpBQ3PEv.gqEbSraedSJWcFbZGt9uQUvFyYdEyBcaPhyJira', NULL, 1, NULL, 1, NULL, '2021-11-02 21:31:51', '46.25.203.90', NULL, '2021-11-01 22:41:09', '2021-11-02 21:31:51', NULL, NULL, NULL, NULL, NULL),
(120, '60d7949e-9653-4637-ad29-91d7e3ddd0ac', 'Ana', 'Borrasca', 'mislecturass@gmail.com', '27226272', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gravatar', NULL, '$2y$10$0XsGhcSuAeV9H9JMjDzIsuvM3PjbnFFjmpj7iXBYwOoMBYSFKpCYC', NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, '2021-11-01 22:56:53', '2021-11-01 22:56:53', NULL, NULL, NULL, NULL, NULL),
(121, '79e6ed9f-f1fa-445a-a467-7c8f8bdcfa84', 'Vanessa', 'Arjona', 'vanessabucha@gmail.com', '524D8517', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gravatar', NULL, '$2y$10$NDUgqhxDLiw.GZ2lUm1iC.etpKJgI8i5IFO5M5djnNZai4VByegpa', NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, '2021-11-02 00:39:58', '2021-11-02 00:39:58', NULL, NULL, NULL, NULL, NULL),
(122, 'e3431c69-8d15-4f79-b05c-a3250d98f949', 'Patricia', 'Winer', 'momentumalicante@gmail.com', 'BCBB8DFE', 'infojuga@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gravatar', NULL, '$2y$10$l19oGLaxkVD/bftyqwWL5eBiQSuNJiqPuiEw54gvdYwylfzq2ExWq', NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, '2021-11-02 01:41:41', '2021-11-02 01:44:38', NULL, NULL, NULL, NULL, NULL),
(123, 'ab8969cc-17e8-4d6b-af4b-1ebbfc20b09e', 'Lilia', 'Torres', 'liliagleztorres8@gmail.com', 'D64B6696', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gravatar', NULL, '$2y$10$2RVPpS2OIgZW.s5MTUyED.69lgXCMXQ4IJj2ULQHBgQt94ZByv4x2', NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, '2021-11-03 01:38:51', '2021-11-03 01:38:51', NULL, NULL, NULL, NULL, NULL),
(124, '53a5f9f8-de52-4414-bce2-83795240b033', 'Margarita', 'Tomás', 'margaridatl09@gmail.com', '895448F2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gravatar', NULL, '$2y$10$JREz8blgWmUk.wsE8KXND.vGXl/uBYL3WGQAJWXDhNAXwG8/rumBa', NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, '2021-11-03 01:41:11', '2021-11-03 01:41:11', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
