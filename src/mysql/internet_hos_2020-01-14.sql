# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: rm-m5e38z8q4vs17bangzo.mysql.rds.aliyuncs.com (MySQL 5.7.20-log)
# Database: internet_hos
# Generation Time: 2020-01-14 01:45:11 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table it_admin_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `it_admin_users`;

CREATE TABLE `it_admin_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '姓名',
  `password` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密码',
  `avatar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '头像',
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '邮箱',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1正常2禁用',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '记住我',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `it_admin_users` WRITE;
/*!40000 ALTER TABLE `it_admin_users` DISABLE KEYS */;

INSERT INTO `it_admin_users` (`id`, `name`, `password`, `avatar`, `email`, `status`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'lxadmin','$2y$10$bIKAQxUp/PlXwhCy/Q85VuKt88oy7OHhjq.95.VOAj6j.AkmTDEE.','','sssdf@126.com',1,'83o7Z10QveK6ta70NlLzmTZ2t75uxOuJmd1sNyfh9JWWwL4lJYM3RwM2gco1','2019-09-29 15:32:52','2019-09-29 15:32:52'),
	(2,'lxkefu','$2y$10$15pHNgl./RjY4YEyfVX7P.IqlvPGSvBhOnTgTwYJg/kfa1fa0yqYO','','kefu@126.com',1,'',NULL,NULL);

/*!40000 ALTER TABLE `it_admin_users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table it_auth_permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `it_auth_permissions`;

CREATE TABLE `it_auth_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) unsigned NOT NULL COMMENT '1页面链接2按钮3其他',
  `pid` int(11) NOT NULL COMMENT '父id',
  `label` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '展示的名称',
  `pinyin` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '唯一拼音标识',
  `description` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '概要',
  `icon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'icon图标',
  `url` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#' COMMENT 'url链接,非页面类可为空',
  `sort` int(11) NOT NULL DEFAULT '1' COMMENT '排序',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态1正常2禁用',
  `creator` int(11) NOT NULL DEFAULT '0' COMMENT '创建人员id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `auth_permissions_pinyin_unique` (`pinyin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `it_auth_permissions` WRITE;
/*!40000 ALTER TABLE `it_auth_permissions` DISABLE KEYS */;

INSERT INTO `it_auth_permissions` (`id`, `type`, `pid`, `label`, `pinyin`, `description`, `icon`, `url`, `sort`, `status`, `creator`, `created_at`, `updated_at`)
VALUES
	(1,3,0,'明文脱敏','mingwentuomin','明文还是脱敏','','#',1,1,0,NULL,NULL);

/*!40000 ALTER TABLE `it_auth_permissions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table it_auth_role_permission
# ------------------------------------------------------------

DROP TABLE IF EXISTS `it_auth_role_permission`;

CREATE TABLE `it_auth_role_permission` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  KEY `auth_role_permission_permission_id_foreign` (`permission_id`),
  KEY `auth_role_permission_role_id_foreign` (`role_id`),
  CONSTRAINT `auth_role_permission_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `it_auth_permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_role_permission_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `it_auth_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `it_auth_role_permission` WRITE;
/*!40000 ALTER TABLE `it_auth_role_permission` DISABLE KEYS */;

INSERT INTO `it_auth_role_permission` (`permission_id`, `role_id`)
VALUES
	(1,1);

/*!40000 ALTER TABLE `it_auth_role_permission` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table it_auth_role_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `it_auth_role_user`;

CREATE TABLE `it_auth_role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  KEY `auth_role_user_user_id_foreign` (`user_id`),
  KEY `auth_role_user_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `it_auth_role_user` WRITE;
/*!40000 ALTER TABLE `it_auth_role_user` DISABLE KEYS */;

INSERT INTO `it_auth_role_user` (`user_id`, `role_id`)
VALUES
	(1,1);

/*!40000 ALTER TABLE `it_auth_role_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table it_auth_roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `it_auth_roles`;

CREATE TABLE `it_auth_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '展示的名称',
  `pinyin` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '唯一拼音标识',
  `description` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '概要',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态1正常2禁用',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `auth_roles_pinyin_unique` (`pinyin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `it_auth_roles` WRITE;
/*!40000 ALTER TABLE `it_auth_roles` DISABLE KEYS */;

INSERT INTO `it_auth_roles` (`id`, `label`, `pinyin`, `description`, `status`, `created_at`, `updated_at`)
VALUES
	(1,'admin','admin','',1,NULL,NULL),
	(2,'yunying','yunying','脱敏加星',1,NULL,NULL);

/*!40000 ALTER TABLE `it_auth_roles` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
