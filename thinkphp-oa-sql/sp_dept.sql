/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50709
Source Host           : localhost:3306
Source Database       : db_oa

Target Server Type    : MYSQL
Target Server Version : 50709
File Encoding         : 65001

Date: 2017-02-23 11:34:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for sp_dept
-- ----------------------------
DROP TABLE IF EXISTS `sp_dept`;
CREATE TABLE `sp_dept` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '50',
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_dept
-- ----------------------------
INSERT INTO `sp_dept` VALUES ('1', '管理部', '0', '1', '管理部门');
INSERT INTO `sp_dept` VALUES ('2', '技术部', '0', '4', '技术部下辖程序部和设计部');
INSERT INTO `sp_dept` VALUES ('3', '总裁办', '1', '2', '总裁办');
INSERT INTO `sp_dept` VALUES ('4', '财务部', '0', '3', '财务部');
INSERT INTO `sp_dept` VALUES ('5', '程序部', '0', '4', null);
INSERT INTO `sp_dept` VALUES ('6', '设计部', '2', '5', null);
INSERT INTO `sp_dept` VALUES ('7', '运营部', '2', '6', null);
INSERT INTO `sp_dept` VALUES ('8', '人事部', '0', '7', null);
INSERT INTO `sp_dept` VALUES ('9', '行政部', '0', '8', null);
INSERT INTO `sp_dept` VALUES ('10', '运维部', '0', '77', '运维部');
INSERT INTO `sp_dept` VALUES ('11', '竞价部', '0', '55', '竞价部');
