-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2016 at 04:25 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mix`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `Id` int(11) NOT NULL,
  `TenDangNhap` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MatKhau` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `TenDangNhap`, `Full_name`, `MatKhau`) VALUES
(2, 'tungtv', 'Trần Văn Tùng', '1ef26373d3c9447baae66eabd52b1e0e9dc1b702c2f51d5322a67f1c42cf6f3ef0d513d04624c3bfee41b848cac59f4e6c29bf915d10c820c6c883bee00d3afb');

-- --------------------------------------------------------

--
-- Table structure for table `booking_tour`
--

CREATE TABLE IF NOT EXISTS `booking_tour` (
  `id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `name_tour` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_customer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `departure_day` date NOT NULL,
  `adults` int(11) NOT NULL,
  `children_6_11` int(11) NOT NULL,
  `children_5` int(11) NOT NULL,
  `request` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `Id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `Logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Hotline` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Address_hcm` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Phone_hcm` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax_hcm` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Hotline_hcm` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email_hcm` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`Id`, `lang_id`, `Logo`, `Icon`, `Name`, `Address`, `Phone`, `fax`, `Hotline`, `Email`, `Website`, `Address_hcm`, `Phone_hcm`, `fax_hcm`, `Hotline_hcm`, `Email_hcm`) VALUES
(1, 0, '/view/admin/Themes/kcfinder/upload/images/logo-chuan.png', '/view/admin/Themes/kcfinder/upload/images/logo-chuan.png', 'Câu lạc bộ Du lịch Thủ đô', 'Tầng 4, Số 5 Hàng Chiếu , P. Đồng Xuân, Q.Hoàn Kiếm, Hà Nội', '0915055419', NULL, '0915055419', 'info@captourclub.com', '', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc_1`
--

CREATE TABLE IF NOT EXISTS `danhmuc_1` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmuc_1`
--

INSERT INTO `danhmuc_1` (`id`, `name`) VALUES
(1, 'Excursion tours'),
(2, 'Vacation packages'),
(3, 'Cruise tours'),
(4, 'Multi country'),
(5, 'Destinations');

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc_2`
--

CREATE TABLE IF NOT EXISTS `danhmuc_2` (
  `id` int(11) NOT NULL,
  `danhmuc1_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc_subport`
--

CREATE TABLE IF NOT EXISTS `danhmuc_subport` (
  `id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc_tintuc`
--

CREATE TABLE IF NOT EXISTS `danhmuc_tintuc` (
  `id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `id` int(11) NOT NULL,
  `id_lang` int(11) DEFAULT NULL,
  `about_us` text COLLATE utf8_unicode_ci,
  `title_about` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword_about` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_about` varchar(170) COLLATE utf8_unicode_ci DEFAULT NULL,
  `why_us` text COLLATE utf8_unicode_ci,
  `title_why` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword_why` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_why` varchar(170) COLLATE utf8_unicode_ci DEFAULT NULL,
  `our_services` text COLLATE utf8_unicode_ci,
  `title_services` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword_services` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_services` varchar(170) COLLATE utf8_unicode_ci DEFAULT NULL,
  `terms_conditions` text COLLATE utf8_unicode_ci,
  `title_conditions` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword_conditions` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_conditions` varchar(170) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_method` text COLLATE utf8_unicode_ci,
  `title_` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword_` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_` varchar(170) COLLATE utf8_unicode_ci DEFAULT NULL,
  `privacy_policy` text COLLATE utf8_unicode_ci,
  `title_policy` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword_policy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_policy` varchar(170) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `default_lang` tinyint(1) NOT NULL,
  `currency` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE IF NOT EXISTS `link` (
  `id` int(11) NOT NULL,
  `id_lang` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `home` varchar(205) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword` varchar(170) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `excursion_tours` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `excursion_tours_img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_excursion` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword_excursion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_excursion` varchar(170) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vacation_packages` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vacation_packages_img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_vacation` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword_vacation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_vacation` varchar(170) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cruise_tours` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cruise_tours_img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_cruise` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword_cruise` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_cruise` varchar(170) COLLATE utf8_unicode_ci DEFAULT NULL,
  `multi_country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `multi_country_img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_country` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword_country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_country` varchar(170) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vietnam_visa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vietnam_visa_img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_vietnam_visa` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword_vietnam_visa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_vietnam_visa` varchar(170) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `danhmuc_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(170) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang_id` int(11) NOT NULL,
  `price` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_small` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subport`
--

CREATE TABLE IF NOT EXISTS `subport` (
  `id` int(11) NOT NULL,
  `danhmuc_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(205) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_format` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skype` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `yahoo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE IF NOT EXISTS `tour` (
  `id` int(11) NOT NULL,
  `DanhMuc1Id` int(11) NOT NULL,
  `DanhMuc2Id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `promotion` tinyint(1) NOT NULL,
  `packages` tinyint(1) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `durations` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `departure` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `destination` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `departure_time` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vehicle` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hotel` int(11) NOT NULL,
  `schedule` text COLLATE utf8_unicode_ci,
  `price_list` text COLLATE utf8_unicode_ci,
  `content` text COLLATE utf8_unicode_ci,
  `list_img` text COLLATE utf8_unicode_ci,
  `title` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(170) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `booking_tour`
--
ALTER TABLE `booking_tour`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `danhmuc_1`
--
ALTER TABLE `danhmuc_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danhmuc_2`
--
ALTER TABLE `danhmuc_2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `danhmuc1_id` (`danhmuc1_id`);

--
-- Indexes for table `danhmuc_subport`
--
ALTER TABLE `danhmuc_subport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danhmuc_tintuc`
--
ALTER TABLE `danhmuc_tintuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `danhmuc_id` (`danhmuc_id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subport`
--
ALTER TABLE `subport`
  ADD PRIMARY KEY (`id`),
  ADD KEY `danhmuc_id` (`danhmuc_id`);

--
-- Indexes for table `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`id`),
  ADD KEY `DanhMuc1Id` (`DanhMuc1Id`),
  ADD KEY `DanhMuc2Id` (`DanhMuc2Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `booking_tour`
--
ALTER TABLE `booking_tour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `danhmuc_1`
--
ALTER TABLE `danhmuc_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `danhmuc_2`
--
ALTER TABLE `danhmuc_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `danhmuc_subport`
--
ALTER TABLE `danhmuc_subport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `danhmuc_tintuc`
--
ALTER TABLE `danhmuc_tintuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `link`
--
ALTER TABLE `link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subport`
--
ALTER TABLE `subport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tour`
--
ALTER TABLE `tour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `danhmuc_2`
--
ALTER TABLE `danhmuc_2`
  ADD CONSTRAINT `danhmuc_2_ibfk_1` FOREIGN KEY (`danhmuc1_id`) REFERENCES `danhmuc_1` (`id`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`danhmuc_id`) REFERENCES `danhmuc_tintuc` (`id`);

--
-- Constraints for table `subport`
--
ALTER TABLE `subport`
  ADD CONSTRAINT `subport_ibfk_1` FOREIGN KEY (`danhmuc_id`) REFERENCES `danhmuc_subport` (`id`);

--
-- Constraints for table `tour`
--
ALTER TABLE `tour`
  ADD CONSTRAINT `tour_ibfk_1` FOREIGN KEY (`DanhMuc1Id`) REFERENCES `danhmuc_1` (`id`),
  ADD CONSTRAINT `tour_ibfk_2` FOREIGN KEY (`DanhMuc2Id`) REFERENCES `danhmuc_2` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
