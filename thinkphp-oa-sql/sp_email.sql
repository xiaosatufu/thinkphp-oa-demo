/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50709
Source Host           : localhost:3306
Source Database       : db_oa

Target Server Type    : MYSQL
Target Server Version : 50709
File Encoding         : 65001

Date: 2017-02-23 11:34:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for sp_email
-- ----------------------------
DROP TABLE IF EXISTS `sp_email`;
CREATE TABLE `sp_email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_id` int(11) NOT NULL COMMENT '发送者ID',
  `to_id` int(11) NOT NULL COMMENT '接收者ID',
  `title` varchar(50) NOT NULL COMMENT '标题',
  `file` varchar(255) DEFAULT NULL COMMENT '文件',
  `hasfile` smallint(1) DEFAULT '0' COMMENT '是否有附件',
  `filename` varchar(255) DEFAULT '0' COMMENT '是否有附件',
  `content` text COMMENT '内容',
  `addtime` int(11) DEFAULT NULL COMMENT '文件原始名',
  `isread` smallint(1) DEFAULT '0' COMMENT '是否阅读',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_email
-- ----------------------------
INSERT INTO `sp_email` VALUES ('1', '1', '2', '213123123', '/Public/Upload/2017-02-16/58a547c4e31fd.jpg', '1', 'tfrmb.jpg', ' 2323', '1487226820', '0');
INSERT INTO `sp_email` VALUES ('2', '1', '4', 'this is test one', '/Public/Upload/2017-02-16/58a54e467267b.txt', '1', '2017美国排名网址.txt', ' this is test one~~~~', '1487228486', '0');
INSERT INTO `sp_email` VALUES ('3', '1', '3', ' 对对对', null, '0', '0', ' ff', '1487229804', '0');
INSERT INTO `sp_email` VALUES ('4', '1', '8', '澳洲研究生', null, '0', '0', ' ~ddd', '1487233302', '0');
INSERT INTO `sp_email` VALUES ('5', '1', '8', '澳洲。。', '/Public/Upload/2017-02-16/58a561628f819.png', '1', '南加州大学.png', ' 南加大', '1487233378', '0');
