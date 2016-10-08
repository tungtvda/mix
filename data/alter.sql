INSERT INTO `menu` (`id`, `img`, `name`, `name_cn`, `title`, `title_cn`, `keyword`, `keyword_cn`, `description`, `description_cn`) VALUES (NULL, '/mix/view/admin/Themes/kcfinder/upload/images/slide/anh-dep-du-lich-viet-nam-vietnam-travel-ha-long-bay-03.jpg', 'New', '新', 'New', '新', 'New', 'New', 'New', 'New');

ALTER TABLE `news` ADD `created` DATETIME NOT NULL AFTER `description_cn`;

INSERT INTO `mix`.`menu` (`id`, `img`, `name`, `name_cn`, `title`, `title_cn`, `keyword`, `keyword_cn`, `description`, `description_cn`) VALUES (NULL, NULL, 'Search', '搜索', 'Search', '搜索', 'Search', 'Search', 'Search', 'Search'), (NULL, NULL, 'PACKAGES', '套餐', 'PACKAGES', '套餐', 'PACKAGES', 'PACKAGES', 'PACKAGES', 'PACKAGES'), (NULL, NULL, 'PROMOTIONS', '促销', 'PROMOTIONS', '促销', 'PROMOTIONS', 'PROMOTIONS', 'PROMOTIONS', 'PROMOTIONS'), (NULL, NULL, 'Video', '视频', 'Video', '视频', 'Video', 'Video', 'Video', 'Video');


ALTER TABLE `tour` ADD `inclusion` TEXT NULL AFTER `description_cn`, ADD `inclusion_cn` TEXT NULL AFTER `inclusion`, ADD `exclusion` TEXT NULL AFTER `inclusion_cn`, ADD `exclusion_en` TEXT NULL AFTER `exclusion`;
ALTER TABLE `tour` CHANGE `exclusion_en` `exclusion_cn` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL;

ALTER TABLE `tour` ADD `summary` TEXT NULL AFTER `hotel`, ADD `summary_cn` TEXT NULL AFTER `summary`, ADD `highlights` TEXT NULL AFTER `summary_cn`, ADD `highlights_cn` TEXT NULL AFTER `highlights`;