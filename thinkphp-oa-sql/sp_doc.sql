/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50709
Source Host           : localhost:3306
Source Database       : db_oa

Target Server Type    : MYSQL
Target Server Version : 50709
File Encoding         : 65001

Date: 2017-02-23 11:34:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for sp_doc
-- ----------------------------
DROP TABLE IF EXISTS `sp_doc`;
CREATE TABLE `sp_doc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL COMMENT '公文标题',
  `filepath` varchar(255) DEFAULT NULL COMMENT '附件储存路径',
  `filename` varchar(255) DEFAULT NULL COMMENT '附件原名',
  `hasfile` smallint(1) DEFAULT '0' COMMENT '是否存在附件',
  `content` text COMMENT '公文内容',
  `author` varchar(40) NOT NULL COMMENT '作者',
  `addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_doc
-- ----------------------------
INSERT INTO `sp_doc` VALUES ('2', '的点点滴滴顶顶顶顶顶顶顶顶顶顶多多多多顶顶顶顶顶顶顶顶顶顶多多多多多多多多多多多', '/Public/Upload/2017-02-15/58a41c4dcf2fc.jpg', 'tfybb.jpg', '1', '&lt;p&gt;123&lt;/p&gt;', '123', '1486720299');
INSERT INTO `sp_doc` VALUES ('3', '444', null, null, '0', ' dd', '1sss', '1487057232');
INSERT INTO `sp_doc` VALUES ('4', 'rrr', null, null, '0', ' v', 'ff', '1487059244');
INSERT INTO `sp_doc` VALUES ('6', '3333', null, null, '0', '&lt;p&gt;vvvvvv&lt;/p&gt;', 'dd', '1487066244');
INSERT INTO `sp_doc` VALUES ('7', 'ddd', null, null, '0', '&lt;p&gt;&lt;span style=&quot;color: rgb(255, 0, 0); font-family: 微软雅黑, &amp;quot;Microsoft YaHei&amp;quot;;&quot;&gt;fffffffffffffffffffffffffffffffffffffffffff&lt;/span&gt;&lt;/p&gt;', 'dddd', '1487066266');
INSERT INTO `sp_doc` VALUES ('11', '哈哈哈', '/Public/Upload/2017-02-15/58a3fa2fc6649.jpg', '托福冲刺大.jpg', '1', '&lt;p&gt;大大大大的过过&lt;/p&gt;', '底底层', '1487141423');
