/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50638
 Source Host           : localhost:3306
 Source Schema         : wext

 Target Server Type    : MySQL
 Target Server Version : 50638
 File Encoding         : 65001

 Date: 24/05/2018 04:45:51
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '无序ID',
  `nickname` varchar(255) DEFAULT '' COMMENT '昵称',
  `gender` int(1) DEFAULT NULL COMMENT '性别',
  `language` varchar(32) DEFAULT NULL COMMENT '语言',
  `city` varchar(32) DEFAULT NULL COMMENT '城市',
  `ptovince` varchar(32) DEFAULT NULL COMMENT '省份',
  `country` varchar(32) DEFAULT NULL COMMENT '国家',
  `avatar` varchar(2000) DEFAULT NULL COMMENT '头像',
  `telepone` int(11) DEFAULT NULL COMMENT '手机号码',
  `openid` varchar(255) NOT NULL DEFAULT '' COMMENT 'OpenID',
  `unionid` varchar(255) DEFAULT '' COMMENT 'UNIONID',
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '资料更新时间',
  `last_login_time` datetime DEFAULT NULL COMMENT '最后一次登陆时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

SET FOREIGN_KEY_CHECKS = 1;
