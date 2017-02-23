/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50709
Source Host           : localhost:3306
Source Database       : db_oa

Target Server Type    : MYSQL
Target Server Version : 50709
File Encoding         : 65001

Date: 2017-02-23 11:34:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for sp_knowledge
-- ----------------------------
DROP TABLE IF EXISTS `sp_knowledge`;
CREATE TABLE `sp_knowledge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL COMMENT '标题',
  `thumb` varchar(255) DEFAULT NULL COMMENT '缩略图',
  `picture` varchar(255) DEFAULT NULL COMMENT '图片',
  `description` varchar(255) DEFAULT NULL COMMENT '描述',
  `content` text COMMENT '内容',
  `author` varchar(40) NOT NULL COMMENT '作者',
  `addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_knowledge
-- ----------------------------
INSERT INTO `sp_knowledge` VALUES ('1', '3233', '/Public/Upload/2017-02-16/thumb_58a512257e46f.jpg', '/Public/Upload/2017-02-16/58a512257e46f.jpg', ' 4', ' 5', '33', '1487213093');
INSERT INTO `sp_knowledge` VALUES ('2', '1111', '/Public/Upload/2017-02-16/thumb_58a5127c1b914.jpg', '/Public/Upload/2017-02-16/58a5127c1b914.jpg', ' 233', ' 344', '222', '1487213180');
