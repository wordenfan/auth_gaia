# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: rm-m5e38z8q4vs17bang.mysql.rds.aliyuncs.com (MySQL 5.7.20-log)
# Database: Internet_hos
# Generation Time: 2020-02-22 14:35:00 +0000
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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '记住我',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `it_admin_users` WRITE;
/*!40000 ALTER TABLE `it_admin_users` DISABLE KEYS */;

INSERT INTO `it_admin_users` (`id`, `name`, `password`, `avatar`, `email`, `status`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'lxadmin','$2y$10$bIKAQxUp/PlXwhCy/Q85VuKt88oy7OHhjq.95.VOAj6j.AkmTDEE.','','sssdf@126.com',2,'','2019-09-29 15:32:52','2020-02-21 17:13:55'),
	(2,'lxkefu','$2y$10$15pHNgl./RjY4YEyfVX7P.IqlvPGSvBhOnTgTwYJg/kfa1fa0yqYO','','kefu@126.com',1,'','2020-02-19 21:49:01','2020-02-21 16:05:25'),
	(3,'xdadmin','$2y$10$k9p.K9rVf3/ARNq9GFPaB.okU1fIK/Egval9MSQneCWCoFfAod3Xi','','asd@126.com',1,'','2020-02-19 21:51:52','2020-02-21 18:02:42'),
	(4,'rzadmin','$2y$10$p5MgmsKe2T77azP0W5DTIehqkTZuY8IPYyKT.voWgK0ckiSVlNnoy','','asdm@126.com',1,'','2020-02-19 21:51:52','2020-02-21 20:05:53'),
	(5,'11d','$2y$10$ucPgBX1YJIHJuiFR4Kh0wOO71I9LUu158SnHEotl0Q.XaMtUJux9O','','1@163.com',1,'','2020-02-21 17:42:26','2020-02-21 18:41:04');

/*!40000 ALTER TABLE `it_admin_users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table it_auth_permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `it_auth_permissions`;

CREATE TABLE `it_auth_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) unsigned NOT NULL COMMENT '1页面链接2按钮3其他10数据权限20分配医院',
  `pid` int(11) unsigned NOT NULL COMMENT '父id',
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
	(1,10,0,'明文显示','mingwenxianshi','是否脱敏,勾选则显示明文','','#',1,1,0,NULL,NULL),
	(2,20,0,'新都医院','xd_hospital','分配新都医院管理权限','','#',1,1,0,NULL,NULL),
	(3,20,0,'日照医院','rz_hospital','分配日照医院管理权限','','#',1,1,0,NULL,NULL),
	(4,20,0,'烟台医院','yt_hospital','分配y烟台医院管理权限','','#',1,1,0,NULL,NULL),
	(10,1,0,'权限管理','quanxianguanli','一级菜单','','#',1,1,0,NULL,NULL),
	(11,1,10,'管理员列表','guanliyuanliebiao','二级菜单','','#',1,1,0,NULL,NULL),
	(12,1,10,'角色列表','jueseliebiao','二级菜单','','#',1,1,0,NULL,NULL),
	(13,1,10,'节点列表','jiedianliebiao','二级菜单','','#',1,1,0,NULL,NULL),
	(14,2,11,'禁用启用按钮','forbidden_bt','禁用启用按钮','','#',1,1,0,NULL,NULL),
	(15,2,11,'指派医院按钮','fenpeiyiyuan_bt','指派医院按钮','','#',2,1,0,NULL,NULL),
	(16,2,11,'分配权限','fenpeiquanxian_bt','分配权限','','#',3,1,0,NULL,NULL),
	(17,2,0,'测试','sdfas','sdfasd','','#',1,1,0,NULL,NULL),
	(18,2,0,'测试2','sdfas2','sdfasd','','#',1,1,0,NULL,NULL);

/*!40000 ALTER TABLE `it_auth_permissions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table it_auth_role_permission
# ------------------------------------------------------------

DROP TABLE IF EXISTS `it_auth_role_permission`;

CREATE TABLE `it_auth_role_permission` (
  `role_id` int(10) unsigned NOT NULL,
  `permission_id` int(10) unsigned NOT NULL,
  KEY `auth_role_permission_permission_id_foreign` (`permission_id`),
  KEY `auth_role_permission_role_id_foreign` (`role_id`),
  CONSTRAINT `auth_role_permission_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `it_auth_permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_role_permission_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `it_auth_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `it_auth_role_permission` WRITE;
/*!40000 ALTER TABLE `it_auth_role_permission` DISABLE KEYS */;

INSERT INTO `it_auth_role_permission` (`role_id`, `permission_id`)
VALUES
	(1,1),
	(1,2),
	(1,3),
	(1,4),
	(3,2),
	(4,3),
	(1,10),
	(1,11),
	(1,12),
	(1,13),
	(1,14),
	(1,15),
	(1,16),
	(5,2),
	(5,3),
	(5,1),
	(5,10),
	(5,11),
	(5,14);

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
	(1,1),
	(1,2),
	(3,2),
	(2,2),
	(5,2),
	(5,1),
	(3,4),
	(4,4);

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
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `auth_roles_pinyin_unique` (`pinyin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `it_auth_roles` WRITE;
/*!40000 ALTER TABLE `it_auth_roles` DISABLE KEYS */;

INSERT INTO `it_auth_roles` (`id`, `label`, `pinyin`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'超级管理员','admin','超级管理员',1,NULL,NULL,NULL),
	(2,'客服','kefu','脱敏加星',1,NULL,NULL,NULL),
	(3,'新都管理员','xdkq_admin','新都管理员',1,NULL,NULL,NULL),
	(4,'日照管理员','rzkq_admin','日照口腔管理员',1,NULL,NULL,NULL),
	(5,'测试管理11员','ceshi','测试描述',1,'2020-02-22 15:55:33','2020-02-22 15:59:05',NULL);

/*!40000 ALTER TABLE `it_auth_roles` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
