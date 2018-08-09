/*
Navicat MySQL Data Transfer

Source Server         : ff
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : oa

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-07-17 08:55:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for toa_target_tpl
-- ----------------------------
DROP TABLE IF EXISTS `toa_target_tpl`;
CREATE TABLE `toa_target_tpl` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `target` char(255) DEFAULT NULL,
  `parentID` int(11) DEFAULT NULL,
  `createtime` datetime DEFAULT NULL,
  `updatetime` datetime DEFAULT NULL,
  `state` int(5) DEFAULT '0' COMMENT '状态',
  `year` int(11) DEFAULT NULL COMMENT '年份',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of toa_target_tpl
-- ----------------------------
INSERT INTO `toa_target_tpl` VALUES ('1', '履行维护之责，维护党的纪律和规矩', '0', '2017-07-13 18:08:16', '2017-07-13 18:08:19', '0', '2017');
INSERT INTO `toa_target_tpl` VALUES ('2', '加强对党章和党的各项纪律以及集团重大决策部署执行情况的监督检查', '1', '2017-07-13 18:08:56', '2017-07-18 18:08:59', '0', '2017');
INSERT INTO `toa_target_tpl` VALUES ('3', '履行协助之责，推动“两个责任”落实', '0', '2017-07-14 08:46:49', '2017-07-24 08:46:52', '0', '2017');
INSERT INTO `toa_target_tpl` VALUES ('4', '坚决落实中央八项规定精神', '1', null, null, '0', '2017');
INSERT INTO `toa_target_tpl` VALUES ('10', '明确责任目标', '3', null, null, '0', '2017');
INSERT INTO `toa_target_tpl` VALUES ('11', '责任目标检查与考核', '3', null, null, '0', '2017');
INSERT INTO `toa_target_tpl` VALUES ('12', '对“两个责任”落实不到位的进行执纪问责', '3', null, null, '0', '2017');
INSERT INTO `toa_target_tpl` VALUES ('13', '履行督查之责，强化监督检查', '0', '2017-07-14 12:07:17', '2017-07-14 12:07:17', '0', '2017');
INSERT INTO `toa_target_tpl` VALUES ('74', '向本单位党委、集团纪委汇报履行监督责任情况', '3', '2017-07-16 09:15:04', '2017-07-16 09:15:04', '0', '2017');
INSERT INTO `toa_target_tpl` VALUES ('88', '日常监督检查', '13', '2017-07-16 13:39:22', '2017-07-16 13:39:22', '0', '2017');
INSERT INTO `toa_target_tpl` VALUES ('89', '实施效能监察', '13', '2017-07-16 13:39:22', '2017-07-16 13:39:22', '0', '2017');
INSERT INTO `toa_target_tpl` VALUES ('90', '专项治理工作', '13', '2017-07-16 13:39:22', '2017-07-16 13:39:22', '0', '2017');
INSERT INTO `toa_target_tpl` VALUES ('91', '督促问题整改', '13', '2017-07-16 13:39:22', '2017-07-16 13:39:22', '0', '2017');
INSERT INTO `toa_target_tpl` VALUES ('92', '履行查处之责，积极践行“四种形态”', '0', '2017-07-16 13:40:43', '2017-07-16 13:40:43', '0', '2017');
INSERT INTO `toa_target_tpl` VALUES ('93', '畅通信访举报渠道', '92', '2017-07-16 13:40:43', '2017-07-16 13:40:43', '0', '2017');
INSERT INTO `toa_target_tpl` VALUES ('94', '问题线索对标管理', '92', '2017-07-16 13:40:43', '2017-07-16 13:40:43', '0', '2017');
INSERT INTO `toa_target_tpl` VALUES ('95', '落实线索处置以上级纪委领导为主', '92', '2017-07-16 13:40:43', '2017-07-16 13:40:43', '0', '2017');
INSERT INTO `toa_target_tpl` VALUES ('96', '加强对领导干部的日常监督管理', '92', '2017-07-16 13:40:43', '2017-07-16 13:40:43', '0', '2017');
INSERT INTO `toa_target_tpl` VALUES ('97', '履行教育保障之责，深入推进源头预防', '0', '2017-07-16 16:08:07', '2017-07-16 16:08:07', '0', '2017');
INSERT INTO `toa_target_tpl` VALUES ('98', '开展反腐倡廉教育', '97', '2017-07-16 16:08:07', '2017-07-16 16:08:07', '0', '2017');
INSERT INTO `toa_target_tpl` VALUES ('99', '完善反腐倡廉制度', '97', '2017-07-16 16:08:07', '2017-07-16 16:08:07', '0', '2017');
INSERT INTO `toa_target_tpl` VALUES ('100', '廉洁风险防控', '97', '2017-07-16 16:08:07', '2017-07-16 16:08:07', '0', '2017');
INSERT INTO `toa_target_tpl` VALUES ('101', '建立健全领导干部廉政档案', '97', '2017-07-16 16:08:07', '2017-07-16 16:08:07', '0', '2017');
