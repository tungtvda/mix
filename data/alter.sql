INSERT INTO `menu` (`id`, `img`, `name`, `name_cn`, `title`, `title_cn`, `keyword`, `keyword_cn`, `description`, `description_cn`) VALUES (NULL, '/mix/view/admin/Themes/kcfinder/upload/images/slide/anh-dep-du-lich-viet-nam-vietnam-travel-ha-long-bay-03.jpg', 'New', '新', 'New', '新', 'New', 'New', 'New', 'New');

ALTER TABLE `news` ADD `created` DATETIME NOT NULL AFTER `description_cn`;