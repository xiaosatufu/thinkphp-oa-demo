/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50709
Source Host           : localhost:3306
Source Database       : db_oa

Target Server Type    : MYSQL
Target Server Version : 50709
File Encoding         : 65001

Date: 2017-02-23 11:34:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for sp_user
-- ----------------------------
DROP TABLE IF EXISTS `sp_user`;
CREATE TABLE `sp_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` char(32) NOT NULL,
  `nickname` varchar(40) DEFAULT NULL,
  `truename` varchar(40) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `sex` varchar(10) NOT NULL,
  `birthday` date NOT NULL,
  `tel` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_user
-- ----------------------------
INSERT INTO `sp_user` VALUES ('1', 'admin', '123456', 'admin', '管理员', '1', '男', '2016-05-04', '10000', '1@1.com', '北京', '147000000', '1');
INSERT INTO `sp_user` VALUES ('2', 'ggg', '123456', 'ggg', '管理员', '1', '男', '2016-05-04', '10000', '1@1.com', '北京', '147000000', '1');
INSERT INTO `sp_user` VALUES ('3', 'ggg', '123456', 'ggg', '管理员', '5', '男', '2016-05-04', '10000', '1@1.com', '北京', '147000000', '1');
INSERT INTO `sp_user` VALUES ('4', 'test1', '123456', 'test1@', 'test1-', '4', '男', '2016-05-04', '10000', '1@1.com', '北京', '147000000', '2');
INSERT INTO `sp_user` VALUES ('5', 'test2', '123456', 'test2@', 'test2-', '5', '男', '2016-05-04', '10000', '1@1.com', '北京', '147000000', '1');
INSERT INTO `sp_user` VALUES ('6', 'test3', '123456', 'test3@', 'test3-', '6', '男', '2016-05-04', '10000', '1@1.com', '北京', '147000000', '1');
INSERT INTO `sp_user` VALUES ('7', 'test4', '123456', 'test4@', 'test4-', '7', '男', '2016-05-04', '10000', '1@1.com', '北京', '147000000', '1');
INSERT INTO `sp_user` VALUES ('8', '11', '111', '22', '1112', '-1', '男', '2017-02-05', '12', '33', ' 2', '1486632012', null);
INSERT INTO `sp_user` VALUES ('9', 'test', '13222', '65', '22', '-1', '男', '2017-03-11', '111', '222222@1.com', ' eeeee', '1486632883', null);
INSERT INTO `sp_user` VALUES ('10', 'Y', '123', 'Y', 'Y', null, '男', '2017-02-13', '333', '333', null, null, null);
