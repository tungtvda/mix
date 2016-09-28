-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2016 at 04:27 PM
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
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL,
  `name_kh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc_1`
--

CREATE TABLE IF NOT EXISTS `danhmuc_1` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmuc_1`
--

INSERT INTO `danhmuc_1` (`id`, `name`) VALUES
(1, 'Chọn danh mục cấp 1'),
(2, 'Excursion tours'),
(3, 'Vacation packages'),
(4, 'Cruise tours'),
(5, 'Multi country'),
(6, 'Destinations');

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc_2`
--

CREATE TABLE IF NOT EXISTS `danhmuc_2` (
  `id` int(11) NOT NULL,
  `danhmuc1_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` int(11) NOT NULL,
  `title` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_cn` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(170) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_en` varchar(170) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmuc_2`
--

INSERT INTO `danhmuc_2` (`id`, `danhmuc1_id`, `name`, `name_cn`, `name_url`, `img`, `banner`, `position`, `title`, `title_cn`, `keyword`, `keyword_cn`, `description`, `description_en`) VALUES
(1, 2, 'Air, Helicopter & Balloon Tours', '飞机，直升机和热气球之旅', 'air-helicopter--balloon-tours', '/mix/view/admin/Themes/kcfinder/upload/images/danhmuctour/balloon-tour-experience-with-winery-visit-in-florence-266514.jpg', '/mix/view/admin/Themes/kcfinder/upload/images/danhmuctour/grand-canyon-national-park-362695.jpg', 1, 'Air, Helicopter & Balloon Tours', 'Air, Helicopter & Balloon Tours', 'Air, Helicopter & Balloon Tours', 'Air, Helicopter & Balloon Tours', 'Air, Helicopter & Balloon Tours', 'Air, Helicopter & Balloon Tours'),
(2, 2, 'Day Trips & Excursions', '一日游和短途游览', 'day-trips--excursions', '/mix/view/admin/Themes/kcfinder/upload/images/danhmuctour/balloon-tour-experience-with-winery-visit-in-florence-266514.jpg', '/mix/view/admin/Themes/kcfinder/upload/images/danhmuctour/grand-canyon-national-park-362695.jpg', 2, 'Day Trips & Excursions', 'Day Trips & Excursions', 'Day Trips & Excursions', 'Day Trips & Excursions', 'Day Trips & Excursions', 'Day Trips & Excursions'),
(3, 2, 'Tours & Sightseeing', '旅游与观光', 'tours--sightseeing', '/mix/view/admin/Themes/kcfinder/upload/images/danhmuctour/balloon-tour-experience-with-winery-visit-in-florence-266514.jpg', '/mix/view/admin/Themes/kcfinder/upload/images/danhmuctour/grand-canyon-national-park-362695.jpg', 3, 'Tours & Sightseeing', 'Tours & Sightseeing', 'Tours & Sightseeing', 'Tours & Sightseeing', 'Tours & Sightseeing', 'Tours & Sightseeing'),
(4, 2, 'Multi-day & Extended Tours', '多日＆扩展旅游', 'multi-day--extended-tours', '/mix/view/admin/Themes/kcfinder/upload/images/danhmuctour/balloon-tour-experience-with-winery-visit-in-florence-266514.jpg', '/mix/view/admin/Themes/kcfinder/upload/images/danhmuctour/grand-canyon-national-park-362695.jpg', 4, 'Multi-day & Extended Tours', 'Multi-day & Extended Tours', 'Multi-day & Extended Tours', 'Multi-day & Extended Tours', 'Multi-day & Extended Tours', 'Multi-day & Extended Tours'),
(5, 1, 'Food, Wine & Nightlife', '美食，美酒与夜生活', 'food-wine--nightlife', '/mix/view/admin/Themes/kcfinder/upload/images/danhmuctour/balloon-tour-experience-with-winery-visit-in-florence-266514.jpg', '/mix/view/admin/Themes/kcfinder/upload/images/danhmuctour/grand-canyon-national-park-362695.jpg', 5, 'Food, Wine & Nightlife', 'Food, Wine & Nightlife', 'Food, Wine & Nightlife', 'Food, Wine & Nightlife', 'Food, Wine & Nightlife', 'Food, Wine & Nightlife'),
(6, 3, 'Cultural & Theme Tours', '文化与主题旅游', 'cultural--theme-tours', '/mix/view/admin/Themes/kcfinder/upload/images/danhmuctour/balloon-tour-experience-with-winery-visit-in-florence-266514.jpg', '/mix/view/admin/Themes/kcfinder/upload/images/danhmuctour/grand-canyon-national-park-362695.jpg', 1, 'Cultural & Theme Tours', 'Cultural & Theme Tours', 'Cultural & Theme Tours', 'Cultural & Theme Tours', 'Cultural & Theme Tours', 'Cultural & Theme Tours'),
(7, 3, 'Transfers & Ground Transport', '转会及地面运输', 'transfers--ground-transport', '/mix/view/admin/Themes/kcfinder/upload/images/danhmuctour/balloon-tour-experience-with-winery-visit-in-florence-266514.jpg', '/mix/view/admin/Themes/kcfinder/upload/images/danhmuctour/grand-canyon-national-park-362695.jpg', 2, 'Transfers & Ground Transport', 'Transfers & Ground Transport', 'Transfers & Ground Transport', 'Transfers & Ground Transport', 'Transfers & Ground Transport', 'Transfers & Ground Transport'),
(8, 1, 'Shore Excursions', '岸上观光', 'shore-excursions', '/mix/view/admin/Themes/kcfinder/upload/images/danhmuctour/balloon-tour-experience-with-winery-visit-in-florence-266514.jpg', '/mix/view/admin/Themes/kcfinder/upload/images/danhmuctour/grand-canyon-national-park-362695.jpg', 3, 'Shore Excursions', 'Shore Excursions', 'Shore Excursions', 'Shore Excursions', 'Shore Excursions', 'Shore Excursions'),
(9, 4, 'Shows, Concerts & Sports ', '表演，演唱会及体育', 'shows-concerts--sports-', '/mix/view/admin/Themes/kcfinder/upload/images/danhmuctour/balloon-tour-experience-with-winery-visit-in-florence-266514.jpg', '/mix/view/admin/Themes/kcfinder/upload/images/danhmuctour/grand-canyon-national-park-362695.jpg', 1, 'Shows, Concerts & Sports ', 'Shows, Concerts & Sports ', 'Shows, Concerts & Sports ', 'Shows, Concerts & Sports ', 'Shows, Concerts & Sports ', 'Shows, Concerts & Sports '),
(10, 4, 'Walking & Biking Tours', '走与单车旅游', 'walking--biking-tours', '/mix/view/admin/Themes/kcfinder/upload/images/danhmuctour/balloon-tour-experience-with-winery-visit-in-florence-266514.jpg', '/mix/view/admin/Themes/kcfinder/upload/images/danhmuctour/grand-canyon-national-park-362695.jpg', 2, 'Walking & Biking Tours', 'Walking & Biking Tours', 'Walking & Biking Tours', 'Walking & Biking Tours', 'Walking & Biking Tours', 'Walking & Biking Tours'),
(11, 4, 'Water Sports', '水上运动', 'water-sports', '/mix/view/admin/Themes/kcfinder/upload/images/danhmuctour/balloon-tour-experience-with-winery-visit-in-florence-266514.jpg', '/mix/view/admin/Themes/kcfinder/upload/images/danhmuctour/grand-canyon-national-park-362695.jpg', 3, 'Water Sports', 'Water Sports', 'Water Sports', 'Water Sports', 'Water Sports', 'Water Sports'),
(12, 5, 'Outdoor Activities', '户外运动', 'outdoor-activities', '/mix/view/admin/Themes/kcfinder/upload/images/danhmuctour/balloon-tour-experience-with-winery-visit-in-florence-266514.jpg', '/mix/view/admin/Themes/kcfinder/upload/images/danhmuctour/grand-canyon-national-park-362695.jpg', 1, 'Outdoor Activities', 'Outdoor Activities', 'Outdoor Activities', 'Outdoor Activities', 'Outdoor Activities', 'Outdoor Activities'),
(13, 5, 'Sightseeing Tickets & Passes', '观光通行证', 'sightseeing-tickets--passes', '/mix/view/admin/Themes/kcfinder/upload/images/danhmuctour/balloon-tour-experience-with-winery-visit-in-florence-266514.jpg', '/mix/view/admin/Themes/kcfinder/upload/images/danhmuctour/grand-canyon-national-park-362695.jpg', 2, 'Sightseeing Tickets & Passes', 'Sightseeing Tickets & Passes', 'Sightseeing Tickets & Passes', 'Sightseeing Tickets & Passes', 'Sightseeing Tickets & Passes', 'Sightseeing Tickets & Passes'),
(14, 5, 'Classes & Workshops', '课程及工作坊', 'classes--workshops', '/mix/view/admin/Themes/kcfinder/upload/images/danhmuctour/balloon-tour-experience-with-winery-visit-in-florence-266514.jpg', '/mix/view/admin/Themes/kcfinder/upload/images/danhmuctour/grand-canyon-national-park-362695.jpg', 0, 'Classes & Workshops', 'Classes & Workshops', 'Classes & Workshops', 'Classes & Workshops', 'Classes & Workshops', 'Classes & Workshops');

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc_subport`
--

CREATE TABLE IF NOT EXISTS `danhmuc_subport` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc_tintuc`
--

CREATE TABLE IF NOT EXISTS `danhmuc_tintuc` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_cn` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(170) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_en` varchar(170) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `info_mix`
--

CREATE TABLE IF NOT EXISTS `info_mix` (
  `id` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `content_cn` text COLLATE utf8_unicode_ci,
  `title` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_cn` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(170) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_cn` varchar(170) COLLATE utf8_unicode_ci DEFAULT NULL
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `name`, `code`, `icon`, `active`, `default_lang`, `currency`) VALUES
(1, 'English', 'en', '/mix/view/admin/Themes/kcfinder/upload/images/language/icon-en.jpg', 0, 0, '$'),
(2, '忠富国', 'cn', '/mix/view/admin/Themes/kcfinder/upload/images/language/china.gif', 0, 0, '人民币');

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE IF NOT EXISTS `link` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_en` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(170) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_cn` varchar(170) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL,
  `danhmuc_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `content_cn` text COLLATE utf8_unicode_ci,
  `title` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_cn` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(170) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_cn` varchar(170) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_small` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE IF NOT EXISTS `social` (
  `id` int(11) NOT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rss` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
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
-- Table structure for table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE IF NOT EXISTS `tour` (
  `id` int(11) NOT NULL,
  `DanhMuc1Id` int(11) NOT NULL,
  `DanhMuc2Id` int(11) NOT NULL,
  `promotion` tinyint(1) NOT NULL,
  `packages` tinyint(1) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price_cn` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `durations` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `durations_cn` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `departure` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `destination` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `departure_time` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vehicle` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vehicle_en` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hotel` int(11) NOT NULL,
  `schedule` text COLLATE utf8_unicode_ci,
  `schedule_cn` text COLLATE utf8_unicode_ci,
  `price_list` text COLLATE utf8_unicode_ci,
  `price_list_cn` text COLLATE utf8_unicode_ci,
  `content` text COLLATE utf8_unicode_ci,
  `content_cn` text COLLATE utf8_unicode_ci,
  `list_img` text COLLATE utf8_unicode_ci,
  `title` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_cn` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(170) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_cn` varchar(170) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_video` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `highlights` tinyint(1) NOT NULL
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
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `info_mix`
--
ALTER TABLE `info_mix`
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
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subport`
--
ALTER TABLE `subport`
  ADD PRIMARY KEY (`id`),
  ADD KEY `danhmuc_id` (`danhmuc_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`id`),
  ADD KEY `DanhMuc1Id` (`DanhMuc1Id`),
  ADD KEY `DanhMuc2Id` (`DanhMuc2Id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `danhmuc_1`
--
ALTER TABLE `danhmuc_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `danhmuc_2`
--
ALTER TABLE `danhmuc_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
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
-- AUTO_INCREMENT for table `info_mix`
--
ALTER TABLE `info_mix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subport`
--
ALTER TABLE `subport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tour`
--
ALTER TABLE `tour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
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
