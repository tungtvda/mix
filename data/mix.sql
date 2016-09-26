-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 26 Septembre 2016 à 11:05
-- Version du serveur :  10.1.9-MariaDB
-- Version de PHP :  5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mix`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) NOT NULL,
  `TenDangNhap` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MatKhau` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`Id`, `TenDangNhap`, `Full_name`, `MatKhau`) VALUES
(2, 'tungtv', 'Trần Văn Tùng', '1ef26373d3c9447baae66eabd52b1e0e9dc1b702c2f51d5322a67f1c42cf6f3ef0d513d04624c3bfee41b848cac59f4e6c29bf915d10c820c6c883bee00d3afb');

-- --------------------------------------------------------

--
-- Structure de la table `config`
--

CREATE TABLE `config` (
  `Id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `Title` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` varchar(170) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Banner_top` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Link_banner` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Hotline` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GioiThieu` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `config`
--

INSERT INTO `config` (`Id`, `lang_id`, `Title`, `Keyword`, `Description`, `Logo`, `Banner_top`, `Link_banner`, `Icon`, `Name`, `Address`, `Phone`, `Hotline`, `Email`, `Website`, `GioiThieu`) VALUES
(1, 0, 'Câu lạc bộ Du lịch Thủ đô', 'Câu lạc bộ Du lịch Thủ đô', 'Câu lạc bộ Du lịch Thủ đô', '/view/admin/Themes/kcfinder/upload/images/logo-chuan.png', '/view/admin/Themes/kcfinder/upload/images/banner/vang.jpg', '', '/view/admin/Themes/kcfinder/upload/images/logo-chuan.png', 'Câu lạc bộ Du lịch Thủ đô', 'Tầng 4, Số 5 Hàng Chiếu , P. Đồng Xuân, Q.Hoàn Kiếm, Hà Nội', '0915055419', '0915055419', 'info@captourclub.com', '', '<p>\r\n	<span style="font-size:14px;">C&acirc;u lạc bộ du lịch Thủ đ&ocirc; (Captour Club) l&agrave; C&acirc;u lạc bộ nghề nghiệp,trực thuộc Hiệp hội du lịch H&agrave; Nội gồm c&aacute;c doanh nghiệp, tổ chức kinh tế v&agrave; c&ocirc;ng d&acirc;n Việt Nam đang sinh sống . Mục đ&iacute;ch của C&acirc;u lạc bộ l&agrave; tập hợp,li&ecirc;n kết c&aacute;c Hội vi&ecirc;n để hợp t&aacute;c, hỗ trợ nhau, tạo sự b&igrave;nh ổn thị trường, n&acirc;ng cao gi&aacute; trị chất lượng sản phẩm du lịch,c&ugrave;ng nhau g&oacute;p sức phấn đấu cho sự nghiệp ph&aacute;t triển du lịch Thủ đ&ocirc;.&nbsp;</span></p>\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `danhmuc_1`
--

CREATE TABLE `danhmuc_1` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `danhmuc_1`
--

INSERT INTO `danhmuc_1` (`id`, `name`) VALUES
(1, 'Excursion tours'),
(2, 'Vacation packages'),
(3, 'Cruise tours'),
(4, 'Multi country'),
(5, 'Destinations');

-- --------------------------------------------------------

--
-- Structure de la table `danhmuc_2`
--

CREATE TABLE `danhmuc_2` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `default_lang` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `home` varchar(205) COLLATE utf8_unicode_ci DEFAULT NULL,
  `excursion_tours` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vacation_packages` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cruise_tours` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `multi_country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vietnam_visa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `excursion_tours_img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vacation_packages_img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cruise_tours_img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `multi_country_img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vietnam_visa_img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `danhmuc_1`
--
ALTER TABLE `danhmuc_1`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `danhmuc_2`
--
ALTER TABLE `danhmuc_2`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `config`
--
ALTER TABLE `config`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `danhmuc_1`
--
ALTER TABLE `danhmuc_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `danhmuc_2`
--
ALTER TABLE `danhmuc_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
