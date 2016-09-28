-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 28 Septembre 2016 à 12:25
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
-- Structure de la table `booking_tour`
--

CREATE TABLE `booking_tour` (
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
-- Structure de la table `config`
--

CREATE TABLE `config` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `config`
--

INSERT INTO `config` (`Id`, `lang_id`, `Logo`, `Icon`, `Name`, `Address`, `Phone`, `fax`, `Hotline`, `Email`, `Website`, `Address_hcm`, `Phone_hcm`, `fax_hcm`, `Hotline_hcm`, `Email_hcm`) VALUES
(1, 0, '/view/admin/Themes/kcfinder/upload/images/logo-chuan.png', '/view/admin/Themes/kcfinder/upload/images/logo-chuan.png', 'Câu lạc bộ Du lịch Thủ đô', 'Tầng 4, Số 5 Hàng Chiếu , P. Đồng Xuân, Q.Hoàn Kiếm, Hà Nội', '0915055419', NULL, '0915055419', 'info@captourclub.com', '', NULL, NULL, NULL, NULL, NULL);

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
  `danhmuc1_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `danhmuc_2`
--

INSERT INTO `danhmuc_2` (`id`, `danhmuc1_id`, `name`, `name_cn`, `name_url`, `img`, `banner`, `position`) VALUES
(1, 1, ' Air, Helicopter & Balloon Tours', NULL, 'test', '/mix/view/admin/Themes/kcfinder/upload/images/danhmuctour/balloon-tour-experience-with-winery-visit-in-florence-266514.jpg', '/mix/view/admin/Themes/kcfinder/upload/images/danhmuctour/grand-canyon-national-park-362695.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `danhmuc_subport`
--

CREATE TABLE `danhmuc_subport` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `danhmuc_tintuc`
--

CREATE TABLE `danhmuc_tintuc` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `info_mix`
--

CREATE TABLE `info_mix` (
  `id` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_cn` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(170) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_cn` varchar(170) COLLATE utf8_unicode_ci DEFAULT NULL
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
  `default_lang` tinyint(1) NOT NULL,
  `currency` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `language`
--

INSERT INTO `language` (`id`, `name`, `code`, `icon`, `active`, `default_lang`, `currency`) VALUES
(1, 'English', 'en', '/mix/view/admin/Themes/kcfinder/upload/images/language/icon-en.jpg', 0, 0, '$'),
(2, '忠富国', 'cn', '/mix/view/admin/Themes/kcfinder/upload/images/language/china.gif', 0, 0, '人民币');

-- --------------------------------------------------------

--
-- Structure de la table `link`
--

CREATE TABLE `link` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
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
-- Structure de la table `news`
--

CREATE TABLE `news` (
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
-- Structure de la table `slide`
--

CREATE TABLE `slide` (
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
-- Structure de la table `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rss` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `subport`
--

CREATE TABLE `subport` (
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
-- Structure de la table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tour`
--

CREATE TABLE `tour` (
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
-- Structure de la table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_cn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_video` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `highlights` tinyint(1) NOT NULL
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
-- Index pour la table `booking_tour`
--
ALTER TABLE `booking_tour`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `danhmuc1_id` (`danhmuc1_id`);

--
-- Index pour la table `danhmuc_subport`
--
ALTER TABLE `danhmuc_subport`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `danhmuc_tintuc`
--
ALTER TABLE `danhmuc_tintuc`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `info_mix`
--
ALTER TABLE `info_mix`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `danhmuc_id` (`danhmuc_id`);

--
-- Index pour la table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `subport`
--
ALTER TABLE `subport`
  ADD PRIMARY KEY (`id`),
  ADD KEY `danhmuc_id` (`danhmuc_id`);

--
-- Index pour la table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`id`),
  ADD KEY `DanhMuc1Id` (`DanhMuc1Id`),
  ADD KEY `DanhMuc2Id` (`DanhMuc2Id`);

--
-- Index pour la table `video`
--
ALTER TABLE `video`
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
-- AUTO_INCREMENT pour la table `booking_tour`
--
ALTER TABLE `booking_tour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `danhmuc_subport`
--
ALTER TABLE `danhmuc_subport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `danhmuc_tintuc`
--
ALTER TABLE `danhmuc_tintuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `info_mix`
--
ALTER TABLE `info_mix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `link`
--
ALTER TABLE `link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `subport`
--
ALTER TABLE `subport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `tour`
--
ALTER TABLE `tour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `danhmuc_2`
--
ALTER TABLE `danhmuc_2`
  ADD CONSTRAINT `danhmuc_2_ibfk_1` FOREIGN KEY (`danhmuc1_id`) REFERENCES `danhmuc_1` (`id`);

--
-- Contraintes pour la table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`danhmuc_id`) REFERENCES `danhmuc_tintuc` (`id`);

--
-- Contraintes pour la table `subport`
--
ALTER TABLE `subport`
  ADD CONSTRAINT `subport_ibfk_1` FOREIGN KEY (`danhmuc_id`) REFERENCES `danhmuc_subport` (`id`);

--
-- Contraintes pour la table `tour`
--
ALTER TABLE `tour`
  ADD CONSTRAINT `tour_ibfk_1` FOREIGN KEY (`DanhMuc1Id`) REFERENCES `danhmuc_1` (`id`),
  ADD CONSTRAINT `tour_ibfk_2` FOREIGN KEY (`DanhMuc2Id`) REFERENCES `danhmuc_2` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
