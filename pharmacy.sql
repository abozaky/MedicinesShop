-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2019 at 12:11 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `id` int(10) UNSIGNED NOT NULL,
  `About_Us_descreption` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `About_Us_descreption`, `created_at`, `updated_at`) VALUES
(5, '<p style=\"margin-bottom: 1rem; margin-left: 40px; color: rgb(145, 152, 153); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\">Website aims to serve the field of medicine in Egypt by providing online medicine to customers through the nearest pharmacies for free without additional fees and also provide services to them through easy search for medicine and knowledge of information such as active substance and its uses and the number of doses attached to the drug.</p><p style=\"margin-bottom: 1rem; margin-left: 40px; color: rgb(145, 152, 153); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\"><span style=\"color: rgb(25, 188, 219); font-weight: 600; font-size: 20px;\">Advanced search for medicine&nbsp;</span>: Do not worry if you do not know the correct name of the medicine you can write through the method of the area and we will correct the name and access to the correct medicine.</p><p style=\"margin-bottom: 1rem; margin-left: 40px; color: rgb(145, 152, 153); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\"><span style=\"color: rgb(25, 188, 219); font-weight: 600; font-size: 20px;\">Fast delivery and medicines are available&nbsp;</span>: Do not worry if the medicine is not available in the pharmacy near you. We offer pharmacies where all the necessary medicines are available</p><p style=\"margin-bottom: 1rem; margin-left: 40px; color: rgb(145, 152, 153); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\"><span style=\"color: rgb(25, 188, 219); font-weight: 600; font-size: 20px;\">Choose your favorite pharmacies&nbsp;</span>: We provide the customer with the choice of purchasing from his favorite pharmacy, not only the nearest, since we know that there are customers who have loyalty to certain pharmacies and will want to buy from them, so we provided them with a choice of their favorite pharmacy.</p><p classname=\"mb-4\" style=\"margin-bottom: 1rem; margin-left: 40px; color: rgb(145, 152, 153); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\"><span style=\"color: rgb(25, 188, 219); font-weight: 600; font-size: 20px;\">Buy medicine easily and pay on delivery&nbsp;</span>: Easy purchase steps where the customer can complete the purchase in three steps and in less than two minutes</p>', '2019-06-26 05:10:34', '2019-06-26 05:10:34');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `article_id` int(10) UNSIGNED NOT NULL,
  `article_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_descreption` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_image` mediumtext COLLATE utf8mb4_unicode_ci,
  `article_status` tinyint(4) NOT NULL DEFAULT '0',
  `article_like` int(11) NOT NULL DEFAULT '0',
  `Arti_Category_id` int(10) UNSIGNED NOT NULL,
  `article_user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `article_title`, `article_descreption`, `article_image`, `article_status`, `article_like`, `Arti_Category_id`, `article_user_id`, `created_at`, `updated_at`) VALUES
(6, 'hello', '<p style=\"border: 0px; box-sizing: inherit; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; font-size: 14px; vertical-align: baseline; background: 0px 0px rgb(246, 246, 246); color: rgb(34, 41, 47); font-family: &quot;Open Sans&quot;, Helvetica, Arial, sans-serif;\"><b><span style=\"font-family: Tahoma;\">Check the dev tools &gt; console to check for any errors.</span></b></p><p style=\"border: 0px; box-sizing: inherit; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; font-size: 14px; vertical-align: baseline; background: 0px 0px rgb(246, 246, 246); color: rgb(34, 41, 47); font-family: &quot;Open Sans&quot;, Helvetica, Arial, sans-serif;\">That Textarea that is hidden is normal I believe, as Summernote will use it\'s own textarea and then insert the content into your defined textarea.</p><p style=\"border: 0px; box-sizing: inherit; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; font-size: 14px; vertical-align: baseline; background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: &quot;Open Sans&quot;, Helvetica, Arial, sans-serif;\"><span style=\"background-color: rgb(246, 246, 246); color: rgb(34, 41, 47);\">Make sure that you haven\'t got another </span><span style=\"background-color: rgb(107, 173, 222);\">Summernote </span><font color=\"#22292f\" style=\"background-color: rgb(246, 246, 246);\">defined on that page too, as since you\'re using ID\'s</font><font color=\"#22292f\" style=\"background-color: rgb(255, 255, 0);\"> (for an unknown reason)</font><font color=\"#22292f\" style=\"background-color: rgb(246, 246, 246);\"> you can only have one.</font></p><p style=\"border: 0px; box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 14px; vertical-align: baseline; background: 0px 0px rgb(246, 246, 246); color: rgb(34, 41, 47); font-family: &quot;Open Sans&quot;, Helvetica, Arial, sans-serif;\">Also make sure your backend is correct, validation, routing etc</p>', '1561509998.jpg', 0, 0, 6, 1, '2019-06-26 00:46:38', '2019-06-26 00:46:38'),
(7, 'article tow', '<p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; border: 0px; padding: 0px; font-size: 14px; vertical-align: baseline; background: 0px 0px rgb(246, 246, 246); color: rgb(34, 41, 47); font-family: &quot;open sans&quot;, helvetica, arial, sans-serif;\"><span style=\"font-weight: bolder;\"><span style=\"font-family: tahoma;\">check the dev tools &gt; console to check for any errors.</span></span></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; border: 0px; padding: 0px; font-size: 14px; vertical-align: baseline; background: 0px 0px rgb(246, 246, 246); color: rgb(34, 41, 47); font-family: &quot;open sans&quot;, helvetica, arial, sans-serif;\">that textarea that is hidden is normal i believe, as summernote will use it\'s own textarea and then insert the content into your defined textarea.</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; color: rgb(33, 37, 41); background-image: initial; background-position: 0px 0px; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; padding: 0px; font-size: 14px; vertical-align: baseline; font-family: &quot;open sans&quot;, helvetica, arial, sans-serif;\"><span style=\"background-color: rgb(246, 246, 246); color: rgb(34, 41, 47);\">make sure that you haven\'t got another&nbsp;</span><span style=\"background-color: rgb(107, 173, 222);\">summernote&nbsp;</span><font color=\"#22292f\" style=\"background-color: rgb(246, 246, 246);\">defined on that page too, as since you\'re using id\'s</font><font color=\"#22292f\" style=\"background-color: rgb(255, 255, 0);\">&nbsp;(for an unknown reason)</font><font color=\"#22292f\" style=\"background-color: rgb(246, 246, 246);\">&nbsp;you can only have one.</font></p><h3 style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; border: 0px; padding: 0px; font-size: 14px; vertical-align: baseline; background: 0px 0px rgb(246, 246, 246); color: rgb(34, 41, 47); font-family: &quot;open sans&quot;, helvetica, arial, sans-serif;\">also make sure your backend is correct, <b><u>validation</u></b>, routing etc</h3><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; border: 0px; padding: 0px; font-size: 14px; vertical-align: baseline; background: 0px 0px rgb(246, 246, 246); color: rgb(34, 41, 47); font-family: &quot;open sans&quot;, helvetica, arial, sans-serif;\"><img src=\"data:image/jpeg;base64,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\" data-filename=\"diclofenac.jpg\" style=\"width: 25%;\"><br></p>', '1561517676.jpg', 0, 1, 6, 1, '2019-06-26 02:19:38', '2019-06-26 02:54:36');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Category_id` int(10) UNSIGNED NOT NULL,
  `Category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Category_id`, `Category_name`, `created_at`, `updated_at`) VALUES
(4, 'cardiovascula', '2019-06-23 05:19:01', '2019-06-23 05:19:01'),
(5, 'Gastrointestinal', '2019-06-23 05:19:12', '2019-06-23 05:19:12'),
(6, 'Endocrine', '2019-06-23 05:19:26', '2019-06-23 05:19:26'),
(7, 'Gastrointestinal', '2019-06-23 05:19:34', '2019-06-23 05:19:34'),
(8, 'Respiratory', '2019-06-23 05:19:41', '2019-06-23 05:19:41'),
(10, 'mohamed', '2019-06-23 23:48:55', '2019-06-23 23:48:55');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(10) UNSIGNED NOT NULL,
  `comment_descreption` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_article_id` int(10) UNSIGNED NOT NULL,
  `comment_user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_descreption`, `comment_article_id`, `comment_user_id`, `created_at`, `updated_at`) VALUES
(4, 'سسسسس', 7, 1, '2019-06-26 02:20:34', '2019-06-26 02:20:34');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` int(10) UNSIGNED NOT NULL,
  `Medicine_Name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Quantity` smallint(6) NOT NULL,
  `price` smallint(6) NOT NULL,
  `image` mediumtext COLLATE utf8mb4_unicode_ci,
  `Medi_Category_id` int(10) UNSIGNED NOT NULL,
  `Pharmacy_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `Medicine_Name`, `description`, `Quantity`, `price`, `image`, `Medi_Category_id`, `Pharmacy_id`, `created_at`, `updated_at`) VALUES
(1, 'voltarin', 'Lorem ipsum dolor sit amet, lorem in, orci in donec quis, dui fringilla,', 34, 5, '1561267550.jpg', 5, 1, '2019-06-23 05:25:50', '2019-06-28 00:06:20'),
(2, 'toblex', 'Lorem ipsum dolor sit amet, lorem in, orci in donec quis, dui fringilla,', 44, 3, '1561268859.jpg', 6, 1, '2019-06-23 05:47:39', '2019-06-23 05:47:39'),
(3, 'assad', 'matically take care of passing the user into the gate closure:to', 3, 3, '1561421283.jpg', 6, 1, '2019-06-25 00:08:03', '2019-06-25 00:08:03');

-- --------------------------------------------------------

--
-- Stand-in structure for view `medicine_pharmacy_user`
-- (See below for the actual view)
--
CREATE TABLE `medicine_pharmacy_user` (
`id` int(10) unsigned
,`Medicine_Name` varchar(50)
,`description` varchar(191)
,`Quantity` smallint(6)
,`price` smallint(6)
,`image` mediumtext
,`created_at` timestamp
,`PharmacyName` varchar(30)
,`City` varchar(30)
,`Address` varchar(50)
,`DrMobile` int(11)
,`name` varchar(191)
,`email` varchar(191)
,`role` tinyint(4)
,`RegStatus` tinyint(4)
,`Category_name` varchar(191)
);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_05_27_052422_create__article__medicine__categories', 1),
(4, '2019_05_28_152151_create_pharmacies_table', 1),
(5, '2019_05_29_134712_create_medicines_table', 1),
(6, '2019_06_18_225243_create__orders__book__now', 1),
(7, '2019_06_18_232724_create_medicine_pharmacy_user_view', 1),
(8, '2019_06_22_012416__create_info_articles', 1),
(9, '2019_06_22_012620__create_comments', 1),
(10, '2019_06_26_052308___create__about__us', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `order_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_user` int(11) NOT NULL,
  `total` smallint(6) NOT NULL,
  `Quantity` smallint(6) NOT NULL,
  `order_status` tinyint(4) NOT NULL DEFAULT '0',
  `order_expired_deliver` datetime NOT NULL,
  `Medicine_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_name`, `order_username`, `mobile_user`, `total`, `Quantity`, `order_status`, `order_expired_deliver`, `Medicine_id`, `created_at`, `updated_at`) VALUES
(2, 'voltarin', 'abo', 123214, 0, 0, 0, '2019-06-26 01:32:48', 1, '2019-06-25 23:30:48', '2019-06-28 00:06:20');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacies`
--

CREATE TABLE `pharmacies` (
  `id` int(10) UNSIGNED NOT NULL,
  `PharmacyName` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `City` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DrMobile` int(11) NOT NULL,
  `auth_id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pharmacies`
--

INSERT INTO `pharmacies` (`id`, `PharmacyName`, `City`, `Address`, `DrMobile`, `auth_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'ezaby', 'Assiut', 'Assiut', 12345678, 5234, 1, '2019-06-23 04:05:10', '2019-06-23 04:05:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '0',
  `RegStatus` tinyint(4) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `RegStatus`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'abo', 'abdo.zaky0@gmail.com', 1, 1, NULL, '$2y$10$vnbbbzD3TeWJGSkcT3ySWehpgplNbRrzBFGPMurk0E3e//GAOa0Py', 'NlXwxUTmQR7K7JBlwClWOQlWM8RfvPisPrCGoL9035lkbTTHMg73WYzgjCbS', '2019-06-23 04:01:14', '2019-06-27 05:21:15'),
(2, 'moh', 'mohamed@gmail.com', 0, 0, NULL, '$2y$10$e8D0nzyJOvOAXJ0SbNuXMepZSxhZHIHkjKo.x9ezcycb96eWZgW5.', NULL, '2019-06-25 03:29:32', '2019-06-25 03:29:32');

-- --------------------------------------------------------

--
-- Structure for view `medicine_pharmacy_user`
--
DROP TABLE IF EXISTS `medicine_pharmacy_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `medicine_pharmacy_user`  AS  select `medicines`.`id` AS `id`,`medicines`.`Medicine_Name` AS `Medicine_Name`,`medicines`.`description` AS `description`,`medicines`.`Quantity` AS `Quantity`,`medicines`.`price` AS `price`,`medicines`.`image` AS `image`,`medicines`.`created_at` AS `created_at`,`pharmacies`.`PharmacyName` AS `PharmacyName`,`pharmacies`.`City` AS `City`,`pharmacies`.`Address` AS `Address`,`pharmacies`.`DrMobile` AS `DrMobile`,`users`.`name` AS `name`,`users`.`email` AS `email`,`users`.`role` AS `role`,`users`.`RegStatus` AS `RegStatus`,`categories`.`Category_name` AS `Category_name` from (((`medicines` join `pharmacies` on((`medicines`.`Pharmacy_id` = `pharmacies`.`id`))) join `users` on((`pharmacies`.`user_id` = `users`.`id`))) join `categories` on((`medicines`.`Medi_Category_id` = `categories`.`Category_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `articles_arti_category_id_foreign` (`Arti_Category_id`),
  ADD KEY `articles_article_user_id_foreign` (`article_user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comments_comment_article_id_foreign` (`comment_article_id`),
  ADD KEY `comments_comment_user_id_foreign` (`comment_user_id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicines_medi_category_id_foreign` (`Medi_Category_id`),
  ADD KEY `medicines_pharmacy_id_foreign` (`Pharmacy_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `orders_medicine_id_foreign` (`Medicine_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pharmacies`
--
ALTER TABLE `pharmacies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pharmacies_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pharmacies`
--
ALTER TABLE `pharmacies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_arti_category_id_foreign` FOREIGN KEY (`Arti_Category_id`) REFERENCES `categories` (`Category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `articles_article_user_id_foreign` FOREIGN KEY (`article_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_comment_article_id_foreign` FOREIGN KEY (`comment_article_id`) REFERENCES `articles` (`article_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_comment_user_id_foreign` FOREIGN KEY (`comment_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `medicines`
--
ALTER TABLE `medicines`
  ADD CONSTRAINT `medicines_medi_category_id_foreign` FOREIGN KEY (`Medi_Category_id`) REFERENCES `categories` (`Category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `medicines_pharmacy_id_foreign` FOREIGN KEY (`Pharmacy_id`) REFERENCES `pharmacies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_medicine_id_foreign` FOREIGN KEY (`Medicine_id`) REFERENCES `medicines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pharmacies`
--
ALTER TABLE `pharmacies`
  ADD CONSTRAINT `pharmacies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
