# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: rm-m5e38z8q4vs17bang.mysql.rds.aliyuncs.com (MySQL 5.7.20-log)
# Database: Internet_hos
# Generation Time: 2020-02-29 09:18:55 +0000
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
	(1,'lxadmin','$2y$10$eZ.LlwYE.v9PiZEAYa/FOu7MvTZAwHohHDO0MLwINbKv2D4kYRzie','','lxadmin@labsys.cn',1,'',NULL,NULL),
	(2,'lxkefu','$2y$10$LI9qxnQEk6UaZ2CddFMxpuZitb8.Hu2NO5gTPlRe9OQLz2hDxKjpa','','lxkefu@labsys.cn',1,'',NULL,NULL),
	(3,'xdadmin','$2y$10$T6tD50zrn5Z8K/2dg9p8O.SoL3P9wc99fKtm3kfJkHAambXc8wyYC','','xdadmin@labsys.cn',1,'',NULL,NULL),
	(4,'rzadmin','$2y$10$H2bYLZRlQqc709sYzOAp5uzMpUpYY5jG1GflhvJ08C8QuJuMfdth2','','rzadmin@labsys.cn',1,'',NULL,NULL),
	(5,'ytadmin','$2y$10$Zsu4SeVAE9ghx2todNRzoOdnQo4GLd393ww2Sarm2YcKfaqcgaVki','','ytadmin@labsys.cn',1,'',NULL,NULL);

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
	(1,10,0,'明文不脱敏','tuominxianshi','是否脱敏,勾选则显示明文','fa-circle-o','',1,1,0,NULL,NULL),
	(2,20,0,'新都医院','xd_hospital','分配新都医院管理权限','fa-circle-o','#',2,1,0,NULL,NULL),
	(3,20,0,'日照医院','rz_hospital','分配日照医院管理权限','fa-circle-o','#',2,1,0,NULL,NULL),
	(4,20,0,'烟台医院','yt_hospital','分配烟台医院管理权限','fa-circle-o','#',2,1,0,NULL,NULL),
	(51,1,0,'就诊人管理','jiuzhenrenguanli','','fa-circle-o','',3,1,0,NULL,NULL),
	(52,1,51,'就诊人列表','jiuzhenrenliebiao','','fa-circle-o','',3,1,0,NULL,NULL),
	(53,1,51,'就诊人统计','jiuzhenrentongji','','fa-circle-o','',3,1,0,NULL,NULL),
	(71,1,0,'医院管理','yiyuanguanli','','fa-circle-o','',3,1,0,NULL,NULL),
	(72,1,71,'医院列表','yiyuanliebiao','','fa-circle-o','',3,1,0,NULL,NULL),
	(73,1,71,'诊室列表','zhenshiliebiao','','fa-circle-o','',3,1,0,NULL,NULL),
	(74,1,71,'医生列表','yishengliebiao','','fa-circle-o','',3,1,0,NULL,NULL),
	(75,2,72,'添加','yylb_add_tb','','','#',4,1,0,NULL,NULL),
	(76,2,72,'添加','zslb_add_tb','','','#',4,1,0,NULL,NULL),
	(77,2,72,'添加','yslb_add_tb','','','#',4,1,0,NULL,NULL),
	(91,1,0,'问诊管理','wenzhenguanli','','fa-circle-o','',3,1,0,NULL,NULL),
	(92,1,91,'问诊列表','wenzhenliebiao','','fa-circle-o','',3,1,0,NULL,NULL),
	(93,1,91,'电子病历','dianzibingli','','fa-circle-o','',3,1,0,NULL,NULL),
	(94,2,92,'搜索','wzlb_search_tb','','','#',4,1,0,NULL,NULL),
	(95,2,93,'搜索','dzbl_search_tb','','','#',4,1,0,NULL,NULL),
	(111,1,0,'系统管理','xitongguanli','','fa-circle-o','',3,1,0,NULL,NULL),
	(112,1,111,'操作日志','caozuorizhi','','fa-circle-o','',3,1,0,NULL,NULL),
	(113,1,111,'管理员列表','guanliyuanliebiao','','fa-circle-o','',3,1,0,NULL,NULL),
	(114,1,111,'角色管理','jueseguanli','','fa-circle-o','',3,1,0,NULL,NULL),
	(115,1,111,'节点管理','jiedianguanli','','fa-circle-o','',3,1,0,NULL,NULL);

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
	(1,51),
	(1,52),
	(1,53),
	(1,71),
	(1,72),
	(1,73),
	(1,74),
	(1,75),
	(1,76),
	(1,91),
	(1,92),
	(1,93),
	(1,94),
	(1,95),
	(1,111),
	(1,112),
	(1,113),
	(1,114),
	(1,115),
	(2,1),
	(2,2),
	(2,3),
	(2,4),
	(2,51),
	(2,52),
	(2,53),
	(2,71),
	(2,72),
	(2,73),
	(2,74),
	(2,75),
	(2,76),
	(2,91),
	(2,92),
	(2,93),
	(2,94),
	(2,95),
	(3,1),
	(3,2),
	(3,51),
	(3,52),
	(3,53),
	(3,71),
	(3,72),
	(3,73),
	(3,74),
	(3,75),
	(3,76),
	(3,91),
	(3,92),
	(3,93),
	(3,94),
	(3,95),
	(3,111),
	(3,112),
	(3,113),
	(3,114),
	(3,115),
	(4,1),
	(4,3),
	(4,51),
	(4,52),
	(4,53),
	(4,71),
	(4,72),
	(4,73),
	(4,74),
	(4,75),
	(4,76),
	(4,91),
	(4,92),
	(4,93),
	(4,94),
	(4,95),
	(4,111),
	(4,112),
	(4,113),
	(4,114),
	(4,115);

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
	(2,2),
	(3,3),
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
	(1,'超级管理员','chaojiguanliyuan','所有权限',1,NULL,NULL,NULL),
	(2,'测试客服','ceshiguanliyuan','测试权限',1,NULL,NULL,NULL),
	(3,'新都管理员','xinduguanliyuan','新都管理员',1,NULL,NULL,NULL),
	(4,'日照管理员','rizhaoguanliyuan','日照管理员',1,NULL,NULL,NULL),
	(5,'烟台管理员','yantaiguanliyuan','烟台管理员',1,NULL,NULL,NULL);

/*!40000 ALTER TABLE `it_auth_roles` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
