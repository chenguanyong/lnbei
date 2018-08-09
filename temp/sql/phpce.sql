/*
Navicat MySQL Data Transfer

Source Server         : hy
Source Server Version : 50715
Source Host           : localhost:3306
Source Database       : phpce

Target Server Type    : MYSQL
Target Server Version : 50715
File Encoding         : 65001

Date: 2018-01-06 11:24:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ce_article
-- ----------------------------
DROP TABLE IF EXISTS `ce_article`;
CREATE TABLE `ce_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(64) NOT NULL COMMENT '文章标题',
  `uid` int(11) DEFAULT '0' COMMENT '用户id(0表示管理员上传，大于0用户上传)',
  `image` char(128) DEFAULT NULL COMMENT '文章图片',
  `filepath` char(128) DEFAULT NULL COMMENT '文件地址',
  `downtype` tinyint(128) DEFAULT '0' COMMENT '下载类型，1是积分，2是金币',
  `filename` char(32) DEFAULT NULL COMMENT '文件名',
  `content` text NOT NULL COMMENT '文章内容',
  `descript` text COMMENT '文章描述',
  `relurl` char(128) DEFAULT NULL COMMENT '\n\n\n\n外部地址',
  `update_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL COMMENT '发布时间',
  `navid` int(11) DEFAULT NULL COMMENT '导航id',
  `cateid` int(11) NOT NULL DEFAULT '0' COMMENT '文章父分类',
  `catesubid` int(11) DEFAULT '0' COMMENT '文章子分类',
  `tags` char(32) DEFAULT NULL COMMENT '文章标签',
  `downcount` tinyint(4) DEFAULT '0' COMMENT '下载次数',
  `commentcount` int(11) DEFAULT '0' COMMENT '评论次数',
  `browsecount` int(11) DEFAULT '45' COMMENT '浏览次数',
  `type` int(11) DEFAULT '1' COMMENT '奖励类型（1是表示积分，2是金币）',
  `collectcount` int(11) DEFAULT '0' COMMENT '收藏人数',
  `integralcount` int(11) DEFAULT '0' COMMENT '积分',
  `goldcount` int(11) DEFAULT '0' COMMENT '金币',
  `isrecommend` tinyint(4) DEFAULT '0' COMMENT '是否推荐',
  `ishot` tinyint(4) DEFAULT '0' COMMENT '是否热门',
  `seodescription` char(200) DEFAULT NULL COMMENT '文章描述',
  `seokeywords` char(64) DEFAULT NULL COMMENT '文章关键词',
  `isstatus` tinyint(4) DEFAULT '0' COMMENT '是否审核',
  `companyID` int(11) DEFAULT NULL,
  `keyword` char(200) DEFAULT NULL,
  `cityID` int(11) DEFAULT NULL,
  `auth` char(50) DEFAULT NULL COMMENT '作者',
  `iscomment` tinyint(4) DEFAULT '0' COMMENT '是否评论',
  `ispublish` tinyint(4) DEFAULT NULL COMMENT '是否发布',
  `IsDelete` tinyint(4) DEFAULT '0',
  `IsForeign

foreign` tinyint(4) DEFAULT '1' COMMENT '是否对外1：表示对外0：表示不对外',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ce_article
-- ----------------------------
INSERT INTO `ce_article` VALUES ('61', 'ghdfgh', '0', 'ghd', 'dgh', '4', 'sfgsd', 'dfgsdf', 'sdfg', 'dfg', '232', '2323', '163', '163', '0', null, '0', '0', '45', '1', '0', '0', '0', '0', '0', null, null, '0', null, null, null, null, '0', null, '0', '1');

-- ----------------------------
-- Table structure for ce_articlecate
-- ----------------------------
DROP TABLE IF EXISTS `ce_articlecate`;
CREATE TABLE `ce_articlecate` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` char(100) DEFAULT NULL,
  `State` int(5) DEFAULT '0' COMMENT '状态',
  `Pid` int(11) DEFAULT '0',
  `CityID` int(11) DEFAULT NULL,
  `CompanyID` int(11) DEFAULT NULL,
  `Createtime` datetime DEFAULT NULL,
  `Updatetime` datetime DEFAULT NULL,
  `UserID` int(11) NOT NULL COMMENT '用户id',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ce_articlecate
-- ----------------------------
INSERT INTO `ce_articlecate` VALUES ('1', '首页', '0', '0', '0', '0', '2017-06-14 14:45:55', '2017-06-14 14:45:58', '0');
INSERT INTO `ce_articlecate` VALUES ('2', '新闻', '0', '1', '0', '0', '2017-06-12 14:46:34', '2017-06-29 14:46:38', '0');
INSERT INTO `ce_articlecate` VALUES ('3', '历史', '0', '2', '0', '0', '2017-06-20 14:47:16', '2017-06-27 14:47:19', '0');

-- ----------------------------
-- Table structure for ce_article_auth
-- ----------------------------
DROP TABLE IF EXISTS `ce_article_auth`;
CREATE TABLE `ce_article_auth` (
  `ID` int(11) NOT NULL,
  `ArticleID` int(11) DEFAULT NULL,
  `Foreign` tinytext COMMENT '对外的权限',
  `Inside` tinytext COMMENT '对内的权限',
  `Createtime` datetime DEFAULT NULL,
  `Updatetime` datetime DEFAULT NULL,
  `CompanyID` int(11) DEFAULT NULL,
  `CityID` int(11) DEFAULT NULL,
  `IsDelete` int(5) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ce_article_auth
-- ----------------------------

-- ----------------------------
-- Table structure for ce_article_cate
-- ----------------------------
DROP TABLE IF EXISTS `ce_article_cate`;
CREATE TABLE `ce_article_cate` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ArticleID` int(11) DEFAULT '2' COMMENT '导航id',
  `CateID` int(11) DEFAULT '0' COMMENT '上级菜单id',
  `createtime` datetime DEFAULT NULL COMMENT '创建时间',
  `updatetime` datetime DEFAULT NULL COMMENT '更新时间',
  `companyID` int(11) DEFAULT NULL,
  `cityID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=164 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of ce_article_cate
-- ----------------------------
INSERT INTO `ce_article_cate` VALUES ('163', '0', '0', '2017-06-04 16:39:07', '2017-06-04 16:39:10', '0', '0');

-- ----------------------------
-- Table structure for ce_auth_com_city_role
-- ----------------------------
DROP TABLE IF EXISTS `ce_auth_com_city_role`;
CREATE TABLE `ce_auth_com_city_role` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CompanyID` int(11) unsigned DEFAULT NULL,
  `CityID` int(11) unsigned DEFAULT NULL,
  `Auth` tinytext,
  `RoleID` int(10) unsigned DEFAULT NULL,
  `IsAll` int(5) DEFAULT '0' COMMENT '是不是全部',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ce_auth_com_city_role
-- ----------------------------
INSERT INTO `ce_auth_com_city_role` VALUES ('4', '1', '1', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50', '1', '0');
INSERT INTO `ce_auth_com_city_role` VALUES ('5', '1', '1', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50', '2', '0');

-- ----------------------------
-- Table structure for ce_auth_com_city_user
-- ----------------------------
DROP TABLE IF EXISTS `ce_auth_com_city_user`;
CREATE TABLE `ce_auth_com_city_user` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CompanyID` int(11) unsigned DEFAULT NULL,
  `CityID` int(11) unsigned DEFAULT NULL,
  `Auth` tinytext,
  `UserID` int(10) unsigned DEFAULT NULL,
  `IsAll` int(5) DEFAULT '0' COMMENT '是否是全部',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ce_auth_com_city_user
-- ----------------------------
INSERT INTO `ce_auth_com_city_user` VALUES ('1', '1', '1', '1,2,3,', '1', '0');

-- ----------------------------
-- Table structure for ce_city
-- ----------------------------
DROP TABLE IF EXISTS `ce_city`;
CREATE TABLE `ce_city` (
  `ID` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `parentID` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `parentid` (`parentID`)
) ENGINE=MyISAM AUTO_INCREMENT=3360 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ce_city
-- ----------------------------
INSERT INTO `ce_city` VALUES ('1', '中国', '0');
INSERT INTO `ce_city` VALUES ('2', '北京市', '1');
INSERT INTO `ce_city` VALUES ('3', '上海市', '1');
INSERT INTO `ce_city` VALUES ('4', '天津市', '1');
INSERT INTO `ce_city` VALUES ('5', '重庆市', '1');
INSERT INTO `ce_city` VALUES ('6', '河北省', '1');
INSERT INTO `ce_city` VALUES ('7', '山西省', '1');
INSERT INTO `ce_city` VALUES ('8', '内蒙古', '1');
INSERT INTO `ce_city` VALUES ('9', '辽宁省', '1');
INSERT INTO `ce_city` VALUES ('10', '吉林省', '1');
INSERT INTO `ce_city` VALUES ('11', '黑龙江省', '1');
INSERT INTO `ce_city` VALUES ('12', '江苏省', '1');
INSERT INTO `ce_city` VALUES ('13', '浙江省', '1');
INSERT INTO `ce_city` VALUES ('14', '安徽省', '1');
INSERT INTO `ce_city` VALUES ('15', '福建省', '1');
INSERT INTO `ce_city` VALUES ('16', '江西省', '1');
INSERT INTO `ce_city` VALUES ('17', '山东省', '1');
INSERT INTO `ce_city` VALUES ('18', '河南省', '1');
INSERT INTO `ce_city` VALUES ('19', '湖北省', '1');
INSERT INTO `ce_city` VALUES ('20', '湖南省', '1');
INSERT INTO `ce_city` VALUES ('21', '广东省', '1');
INSERT INTO `ce_city` VALUES ('22', '广西', '1');
INSERT INTO `ce_city` VALUES ('23', '海南省', '1');
INSERT INTO `ce_city` VALUES ('24', '四川省', '1');
INSERT INTO `ce_city` VALUES ('25', '贵州省', '1');
INSERT INTO `ce_city` VALUES ('26', '云南省', '1');
INSERT INTO `ce_city` VALUES ('27', '西藏', '1');
INSERT INTO `ce_city` VALUES ('28', '陕西省', '1');
INSERT INTO `ce_city` VALUES ('29', '甘肃省', '1');
INSERT INTO `ce_city` VALUES ('30', '青海省', '1');
INSERT INTO `ce_city` VALUES ('31', '宁夏', '1');
INSERT INTO `ce_city` VALUES ('32', '新疆', '1');
INSERT INTO `ce_city` VALUES ('33', '台湾省', '1');
INSERT INTO `ce_city` VALUES ('34', '香港', '1');
INSERT INTO `ce_city` VALUES ('35', '澳门', '1');
INSERT INTO `ce_city` VALUES ('36', '东城区', '2');
INSERT INTO `ce_city` VALUES ('37', '西城区', '2');
INSERT INTO `ce_city` VALUES ('38', '崇文区', '2');
INSERT INTO `ce_city` VALUES ('39', '宣武区', '2');
INSERT INTO `ce_city` VALUES ('40', '朝阳区', '2');
INSERT INTO `ce_city` VALUES ('41', '石景山区', '2');
INSERT INTO `ce_city` VALUES ('42', '海淀区', '2');
INSERT INTO `ce_city` VALUES ('43', '门头沟区', '2');
INSERT INTO `ce_city` VALUES ('44', '房山区', '2');
INSERT INTO `ce_city` VALUES ('45', '通州区', '2');
INSERT INTO `ce_city` VALUES ('46', '顺义区', '2');
INSERT INTO `ce_city` VALUES ('47', '昌平区', '2');
INSERT INTO `ce_city` VALUES ('48', '大兴区', '2');
INSERT INTO `ce_city` VALUES ('49', '怀柔区', '2');
INSERT INTO `ce_city` VALUES ('50', '平谷区', '2');
INSERT INTO `ce_city` VALUES ('51', '密云县', '2');
INSERT INTO `ce_city` VALUES ('52', '延庆县', '2');
INSERT INTO `ce_city` VALUES ('53', '黄浦区', '3');
INSERT INTO `ce_city` VALUES ('54', '卢湾区', '3');
INSERT INTO `ce_city` VALUES ('55', '徐汇区', '3');
INSERT INTO `ce_city` VALUES ('56', '长宁区', '3');
INSERT INTO `ce_city` VALUES ('57', '静安区', '3');
INSERT INTO `ce_city` VALUES ('58', '普陀区', '3');
INSERT INTO `ce_city` VALUES ('59', '闸北区', '3');
INSERT INTO `ce_city` VALUES ('60', '虹口区', '3');
INSERT INTO `ce_city` VALUES ('61', '杨浦区', '3');
INSERT INTO `ce_city` VALUES ('62', '闵行区', '3');
INSERT INTO `ce_city` VALUES ('63', '宝山区', '3');
INSERT INTO `ce_city` VALUES ('64', '嘉定区', '3');
INSERT INTO `ce_city` VALUES ('65', '浦东新区', '3');
INSERT INTO `ce_city` VALUES ('66', '金山区', '3');
INSERT INTO `ce_city` VALUES ('67', '松江区', '3');
INSERT INTO `ce_city` VALUES ('68', '青浦区', '3');
INSERT INTO `ce_city` VALUES ('69', '南汇区', '3');
INSERT INTO `ce_city` VALUES ('70', '奉贤区', '3');
INSERT INTO `ce_city` VALUES ('71', '崇明县', '3');
INSERT INTO `ce_city` VALUES ('72', '和平区', '4');
INSERT INTO `ce_city` VALUES ('73', '河东区', '4');
INSERT INTO `ce_city` VALUES ('74', '河西区', '4');
INSERT INTO `ce_city` VALUES ('75', '南开区', '4');
INSERT INTO `ce_city` VALUES ('76', '河北区', '4');
INSERT INTO `ce_city` VALUES ('77', '红桥区', '4');
INSERT INTO `ce_city` VALUES ('78', '塘沽区', '4');
INSERT INTO `ce_city` VALUES ('79', '汉沽区', '4');
INSERT INTO `ce_city` VALUES ('80', '大港区', '4');
INSERT INTO `ce_city` VALUES ('81', '东丽区', '4');
INSERT INTO `ce_city` VALUES ('82', '西青区', '4');
INSERT INTO `ce_city` VALUES ('83', '津南区', '4');
INSERT INTO `ce_city` VALUES ('84', '北辰区', '4');
INSERT INTO `ce_city` VALUES ('85', '武清区', '4');
INSERT INTO `ce_city` VALUES ('86', '宝坻区', '4');
INSERT INTO `ce_city` VALUES ('87', '宁河县', '4');
INSERT INTO `ce_city` VALUES ('88', '静海县', '4');
INSERT INTO `ce_city` VALUES ('89', '蓟县', '4');
INSERT INTO `ce_city` VALUES ('90', '万州区', '5');
INSERT INTO `ce_city` VALUES ('91', '涪陵区', '5');
INSERT INTO `ce_city` VALUES ('92', '渝中区', '5');
INSERT INTO `ce_city` VALUES ('93', '大渡口区', '5');
INSERT INTO `ce_city` VALUES ('94', '江北区', '5');
INSERT INTO `ce_city` VALUES ('95', '沙坪坝区', '5');
INSERT INTO `ce_city` VALUES ('96', '九龙坡区', '5');
INSERT INTO `ce_city` VALUES ('97', '南岸区', '5');
INSERT INTO `ce_city` VALUES ('98', '北碚区', '5');
INSERT INTO `ce_city` VALUES ('99', '万盛区', '5');
INSERT INTO `ce_city` VALUES ('100', '双桥区', '5');
INSERT INTO `ce_city` VALUES ('101', '渝北区', '5');
INSERT INTO `ce_city` VALUES ('102', '巴南区', '5');
INSERT INTO `ce_city` VALUES ('103', '黔江区', '5');
INSERT INTO `ce_city` VALUES ('104', '长寿区', '5');
INSERT INTO `ce_city` VALUES ('105', '綦江县', '5');
INSERT INTO `ce_city` VALUES ('106', '潼南县', '5');
INSERT INTO `ce_city` VALUES ('107', '铜梁县', '5');
INSERT INTO `ce_city` VALUES ('108', '大足县', '5');
INSERT INTO `ce_city` VALUES ('109', '荣昌县', '5');
INSERT INTO `ce_city` VALUES ('110', '璧山县', '5');
INSERT INTO `ce_city` VALUES ('111', '梁平县', '5');
INSERT INTO `ce_city` VALUES ('112', '城口县', '5');
INSERT INTO `ce_city` VALUES ('113', '丰都县', '5');
INSERT INTO `ce_city` VALUES ('114', '垫江县', '5');
INSERT INTO `ce_city` VALUES ('115', '武隆县', '5');
INSERT INTO `ce_city` VALUES ('116', '忠县', '5');
INSERT INTO `ce_city` VALUES ('117', '开县', '5');
INSERT INTO `ce_city` VALUES ('118', '云阳县', '5');
INSERT INTO `ce_city` VALUES ('119', '奉节县', '5');
INSERT INTO `ce_city` VALUES ('120', '巫山县', '5');
INSERT INTO `ce_city` VALUES ('121', '巫溪县', '5');
INSERT INTO `ce_city` VALUES ('122', '石柱县', '5');
INSERT INTO `ce_city` VALUES ('123', '秀山县', '5');
INSERT INTO `ce_city` VALUES ('124', '酉阳县', '5');
INSERT INTO `ce_city` VALUES ('125', '彭水县', '5');
INSERT INTO `ce_city` VALUES ('126', '江津区', '5');
INSERT INTO `ce_city` VALUES ('127', '合川区', '5');
INSERT INTO `ce_city` VALUES ('128', '永川区', '5');
INSERT INTO `ce_city` VALUES ('129', '南川区', '5');
INSERT INTO `ce_city` VALUES ('130', '石家庄市', '6');
INSERT INTO `ce_city` VALUES ('131', '唐山市', '6');
INSERT INTO `ce_city` VALUES ('132', '秦皇岛市', '6');
INSERT INTO `ce_city` VALUES ('133', '邯郸市', '6');
INSERT INTO `ce_city` VALUES ('134', '邢台市', '6');
INSERT INTO `ce_city` VALUES ('135', '保定市', '6');
INSERT INTO `ce_city` VALUES ('136', '张家口市', '6');
INSERT INTO `ce_city` VALUES ('137', '承德市', '6');
INSERT INTO `ce_city` VALUES ('138', '沧州市', '6');
INSERT INTO `ce_city` VALUES ('139', '廊坊市', '6');
INSERT INTO `ce_city` VALUES ('140', '衡水市', '6');
INSERT INTO `ce_city` VALUES ('141', '太原市', '7');
INSERT INTO `ce_city` VALUES ('142', '大同市', '7');
INSERT INTO `ce_city` VALUES ('143', '阳泉市', '7');
INSERT INTO `ce_city` VALUES ('144', '长治市', '7');
INSERT INTO `ce_city` VALUES ('145', '晋城市', '7');
INSERT INTO `ce_city` VALUES ('146', '朔州市', '7');
INSERT INTO `ce_city` VALUES ('147', '晋中市', '7');
INSERT INTO `ce_city` VALUES ('148', '运城市', '7');
INSERT INTO `ce_city` VALUES ('149', '忻州市', '7');
INSERT INTO `ce_city` VALUES ('150', '临汾市', '7');
INSERT INTO `ce_city` VALUES ('151', '吕梁市', '7');
INSERT INTO `ce_city` VALUES ('152', '呼和浩特市', '8');
INSERT INTO `ce_city` VALUES ('153', '包头市', '8');
INSERT INTO `ce_city` VALUES ('154', '乌海市', '8');
INSERT INTO `ce_city` VALUES ('155', '赤峰市', '8');
INSERT INTO `ce_city` VALUES ('156', '通辽市', '8');
INSERT INTO `ce_city` VALUES ('157', '鄂尔多斯市', '8');
INSERT INTO `ce_city` VALUES ('158', '呼伦贝尔市', '8');
INSERT INTO `ce_city` VALUES ('159', '巴彦淖尔市', '8');
INSERT INTO `ce_city` VALUES ('160', '乌兰察布市', '8');
INSERT INTO `ce_city` VALUES ('161', '兴安盟', '8');
INSERT INTO `ce_city` VALUES ('162', '锡林郭勒盟', '8');
INSERT INTO `ce_city` VALUES ('163', '阿拉善盟', '8');
INSERT INTO `ce_city` VALUES ('164', '沈阳市', '9');
INSERT INTO `ce_city` VALUES ('165', '大连市', '9');
INSERT INTO `ce_city` VALUES ('166', '鞍山市', '9');
INSERT INTO `ce_city` VALUES ('167', '抚顺市', '9');
INSERT INTO `ce_city` VALUES ('168', '本溪市', '9');
INSERT INTO `ce_city` VALUES ('169', '丹东市', '9');
INSERT INTO `ce_city` VALUES ('170', '锦州市', '9');
INSERT INTO `ce_city` VALUES ('171', '营口市', '9');
INSERT INTO `ce_city` VALUES ('172', '阜新市', '9');
INSERT INTO `ce_city` VALUES ('173', '辽阳市', '9');
INSERT INTO `ce_city` VALUES ('174', '盘锦市', '9');
INSERT INTO `ce_city` VALUES ('175', '铁岭市', '9');
INSERT INTO `ce_city` VALUES ('176', '朝阳市', '9');
INSERT INTO `ce_city` VALUES ('177', '葫芦岛市', '9');
INSERT INTO `ce_city` VALUES ('178', '长春市', '10');
INSERT INTO `ce_city` VALUES ('179', '吉林市', '10');
INSERT INTO `ce_city` VALUES ('180', '四平市', '10');
INSERT INTO `ce_city` VALUES ('181', '辽源市', '10');
INSERT INTO `ce_city` VALUES ('182', '通化市', '10');
INSERT INTO `ce_city` VALUES ('183', '白山市', '10');
INSERT INTO `ce_city` VALUES ('184', '松原市', '10');
INSERT INTO `ce_city` VALUES ('185', '白城市', '10');
INSERT INTO `ce_city` VALUES ('186', '延边', '10');
INSERT INTO `ce_city` VALUES ('187', '哈尔滨市', '11');
INSERT INTO `ce_city` VALUES ('188', '齐齐哈尔市', '11');
INSERT INTO `ce_city` VALUES ('189', '鸡西市', '11');
INSERT INTO `ce_city` VALUES ('190', '鹤岗市', '11');
INSERT INTO `ce_city` VALUES ('191', '双鸭山市', '11');
INSERT INTO `ce_city` VALUES ('192', '大庆市', '11');
INSERT INTO `ce_city` VALUES ('193', '伊春市', '11');
INSERT INTO `ce_city` VALUES ('194', '佳木斯市', '11');
INSERT INTO `ce_city` VALUES ('195', '七台河市', '11');
INSERT INTO `ce_city` VALUES ('196', '牡丹江市', '11');
INSERT INTO `ce_city` VALUES ('197', '黑河市', '11');
INSERT INTO `ce_city` VALUES ('198', '绥化市', '11');
INSERT INTO `ce_city` VALUES ('199', '大兴安岭地区', '11');
INSERT INTO `ce_city` VALUES ('200', '南京市', '12');
INSERT INTO `ce_city` VALUES ('201', '无锡市', '12');
INSERT INTO `ce_city` VALUES ('202', '徐州市', '12');
INSERT INTO `ce_city` VALUES ('203', '常州市', '12');
INSERT INTO `ce_city` VALUES ('204', '苏州市', '12');
INSERT INTO `ce_city` VALUES ('205', '南通市', '12');
INSERT INTO `ce_city` VALUES ('206', '连云港市', '12');
INSERT INTO `ce_city` VALUES ('207', '淮安市', '12');
INSERT INTO `ce_city` VALUES ('208', '盐城市', '12');
INSERT INTO `ce_city` VALUES ('209', '扬州市', '12');
INSERT INTO `ce_city` VALUES ('210', '镇江市', '12');
INSERT INTO `ce_city` VALUES ('211', '泰州市', '12');
INSERT INTO `ce_city` VALUES ('212', '宿迁市', '12');
INSERT INTO `ce_city` VALUES ('213', '杭州市', '13');
INSERT INTO `ce_city` VALUES ('214', '宁波市', '13');
INSERT INTO `ce_city` VALUES ('215', '温州市', '13');
INSERT INTO `ce_city` VALUES ('216', '嘉兴市', '13');
INSERT INTO `ce_city` VALUES ('217', '湖州市', '13');
INSERT INTO `ce_city` VALUES ('218', '绍兴市', '13');
INSERT INTO `ce_city` VALUES ('219', '金华市', '13');
INSERT INTO `ce_city` VALUES ('220', '衢州市', '13');
INSERT INTO `ce_city` VALUES ('221', '舟山市', '13');
INSERT INTO `ce_city` VALUES ('222', '台州市', '13');
INSERT INTO `ce_city` VALUES ('223', '丽水市', '13');
INSERT INTO `ce_city` VALUES ('224', '合肥市', '14');
INSERT INTO `ce_city` VALUES ('225', '芜湖市', '14');
INSERT INTO `ce_city` VALUES ('226', '蚌埠市', '14');
INSERT INTO `ce_city` VALUES ('227', '淮南市', '14');
INSERT INTO `ce_city` VALUES ('228', '马鞍山市', '14');
INSERT INTO `ce_city` VALUES ('229', '淮北市', '14');
INSERT INTO `ce_city` VALUES ('230', '铜陵市', '14');
INSERT INTO `ce_city` VALUES ('231', '安庆市', '14');
INSERT INTO `ce_city` VALUES ('232', '黄山市', '14');
INSERT INTO `ce_city` VALUES ('233', '滁州市', '14');
INSERT INTO `ce_city` VALUES ('234', '阜阳市', '14');
INSERT INTO `ce_city` VALUES ('235', '宿州市', '14');
INSERT INTO `ce_city` VALUES ('236', '巢湖市', '14');
INSERT INTO `ce_city` VALUES ('237', '六安市', '14');
INSERT INTO `ce_city` VALUES ('238', '亳州市', '14');
INSERT INTO `ce_city` VALUES ('239', '池州市', '14');
INSERT INTO `ce_city` VALUES ('240', '宣城市', '14');
INSERT INTO `ce_city` VALUES ('241', '福州市', '15');
INSERT INTO `ce_city` VALUES ('242', '厦门市', '15');
INSERT INTO `ce_city` VALUES ('243', '莆田市', '15');
INSERT INTO `ce_city` VALUES ('244', '三明市', '15');
INSERT INTO `ce_city` VALUES ('245', '泉州市', '15');
INSERT INTO `ce_city` VALUES ('246', '漳州市', '15');
INSERT INTO `ce_city` VALUES ('247', '南平市', '15');
INSERT INTO `ce_city` VALUES ('248', '龙岩市', '15');
INSERT INTO `ce_city` VALUES ('249', '宁德市', '15');
INSERT INTO `ce_city` VALUES ('250', '南昌市', '16');
INSERT INTO `ce_city` VALUES ('251', '景德镇市', '16');
INSERT INTO `ce_city` VALUES ('252', '萍乡市', '16');
INSERT INTO `ce_city` VALUES ('253', '九江市', '16');
INSERT INTO `ce_city` VALUES ('254', '新余市', '16');
INSERT INTO `ce_city` VALUES ('255', '鹰潭市', '16');
INSERT INTO `ce_city` VALUES ('256', '赣州市', '16');
INSERT INTO `ce_city` VALUES ('257', '吉安市', '16');
INSERT INTO `ce_city` VALUES ('258', '宜春市', '16');
INSERT INTO `ce_city` VALUES ('259', '抚州市', '16');
INSERT INTO `ce_city` VALUES ('260', '上饶市', '16');
INSERT INTO `ce_city` VALUES ('261', '济南市', '17');
INSERT INTO `ce_city` VALUES ('262', '青岛市', '17');
INSERT INTO `ce_city` VALUES ('263', '淄博市', '17');
INSERT INTO `ce_city` VALUES ('264', '枣庄市', '17');
INSERT INTO `ce_city` VALUES ('265', '东营市', '17');
INSERT INTO `ce_city` VALUES ('266', '烟台市', '17');
INSERT INTO `ce_city` VALUES ('267', '潍坊市', '17');
INSERT INTO `ce_city` VALUES ('268', '济宁市', '17');
INSERT INTO `ce_city` VALUES ('269', '泰安市', '17');
INSERT INTO `ce_city` VALUES ('270', '威海市', '17');
INSERT INTO `ce_city` VALUES ('271', '日照市', '17');
INSERT INTO `ce_city` VALUES ('272', '莱芜市', '17');
INSERT INTO `ce_city` VALUES ('273', '临沂市', '17');
INSERT INTO `ce_city` VALUES ('274', '德州市', '17');
INSERT INTO `ce_city` VALUES ('275', '聊城市', '17');
INSERT INTO `ce_city` VALUES ('276', '滨州市', '17');
INSERT INTO `ce_city` VALUES ('277', '荷泽市', '17');
INSERT INTO `ce_city` VALUES ('278', '郑州市', '18');
INSERT INTO `ce_city` VALUES ('279', '开封市', '18');
INSERT INTO `ce_city` VALUES ('280', '洛阳市', '18');
INSERT INTO `ce_city` VALUES ('281', '平顶山市', '18');
INSERT INTO `ce_city` VALUES ('282', '安阳市', '18');
INSERT INTO `ce_city` VALUES ('283', '鹤壁市', '18');
INSERT INTO `ce_city` VALUES ('284', '新乡市', '18');
INSERT INTO `ce_city` VALUES ('285', '焦作市', '18');
INSERT INTO `ce_city` VALUES ('286', '濮阳市', '18');
INSERT INTO `ce_city` VALUES ('287', '许昌市', '18');
INSERT INTO `ce_city` VALUES ('288', '漯河市', '18');
INSERT INTO `ce_city` VALUES ('289', '三门峡市', '18');
INSERT INTO `ce_city` VALUES ('290', '南阳市', '18');
INSERT INTO `ce_city` VALUES ('291', '商丘市', '18');
INSERT INTO `ce_city` VALUES ('292', '信阳市', '18');
INSERT INTO `ce_city` VALUES ('293', '周口市', '18');
INSERT INTO `ce_city` VALUES ('294', '驻马店市', '18');
INSERT INTO `ce_city` VALUES ('295', '武汉市', '19');
INSERT INTO `ce_city` VALUES ('296', '黄石市', '19');
INSERT INTO `ce_city` VALUES ('297', '十堰市', '19');
INSERT INTO `ce_city` VALUES ('298', '宜昌市', '19');
INSERT INTO `ce_city` VALUES ('299', '襄樊市', '19');
INSERT INTO `ce_city` VALUES ('300', '鄂州市', '19');
INSERT INTO `ce_city` VALUES ('301', '荆门市', '19');
INSERT INTO `ce_city` VALUES ('302', '孝感市', '19');
INSERT INTO `ce_city` VALUES ('303', '荆州市', '19');
INSERT INTO `ce_city` VALUES ('304', '黄冈市', '19');
INSERT INTO `ce_city` VALUES ('305', '咸宁市', '19');
INSERT INTO `ce_city` VALUES ('306', '随州市', '19');
INSERT INTO `ce_city` VALUES ('307', '恩施土家族苗族自治州', '19');
INSERT INTO `ce_city` VALUES ('308', '仙桃市', '19');
INSERT INTO `ce_city` VALUES ('309', '潜江市', '19');
INSERT INTO `ce_city` VALUES ('310', '天门市', '19');
INSERT INTO `ce_city` VALUES ('311', '神农架林区', '19');
INSERT INTO `ce_city` VALUES ('312', '长沙市', '20');
INSERT INTO `ce_city` VALUES ('313', '株洲市', '20');
INSERT INTO `ce_city` VALUES ('314', '湘潭市', '20');
INSERT INTO `ce_city` VALUES ('315', '衡阳市', '20');
INSERT INTO `ce_city` VALUES ('316', '邵阳市', '20');
INSERT INTO `ce_city` VALUES ('317', '岳阳市', '20');
INSERT INTO `ce_city` VALUES ('318', '常德市', '20');
INSERT INTO `ce_city` VALUES ('319', '张家界市', '20');
INSERT INTO `ce_city` VALUES ('320', '益阳市', '20');
INSERT INTO `ce_city` VALUES ('321', '郴州市', '20');
INSERT INTO `ce_city` VALUES ('322', '永州市', '20');
INSERT INTO `ce_city` VALUES ('323', '怀化市', '20');
INSERT INTO `ce_city` VALUES ('324', '娄底市', '20');
INSERT INTO `ce_city` VALUES ('325', '湘西土家族苗族自治州', '20');
INSERT INTO `ce_city` VALUES ('326', '广州市', '21');
INSERT INTO `ce_city` VALUES ('327', '韶关市', '21');
INSERT INTO `ce_city` VALUES ('328', '深圳市', '21');
INSERT INTO `ce_city` VALUES ('329', '珠海市', '21');
INSERT INTO `ce_city` VALUES ('330', '汕头市', '21');
INSERT INTO `ce_city` VALUES ('331', '佛山市', '21');
INSERT INTO `ce_city` VALUES ('332', '江门市', '21');
INSERT INTO `ce_city` VALUES ('333', '湛江市', '21');
INSERT INTO `ce_city` VALUES ('334', '茂名市', '21');
INSERT INTO `ce_city` VALUES ('335', '肇庆市', '21');
INSERT INTO `ce_city` VALUES ('336', '惠州市', '21');
INSERT INTO `ce_city` VALUES ('337', '梅州市', '21');
INSERT INTO `ce_city` VALUES ('338', '汕尾市', '21');
INSERT INTO `ce_city` VALUES ('339', '河源市', '21');
INSERT INTO `ce_city` VALUES ('340', '阳江市', '21');
INSERT INTO `ce_city` VALUES ('341', '清远市', '21');
INSERT INTO `ce_city` VALUES ('342', '东莞市', '21');
INSERT INTO `ce_city` VALUES ('343', '中山市', '21');
INSERT INTO `ce_city` VALUES ('344', '潮州市', '21');
INSERT INTO `ce_city` VALUES ('345', '揭阳市', '21');
INSERT INTO `ce_city` VALUES ('346', '云浮市', '21');
INSERT INTO `ce_city` VALUES ('347', '南宁市', '22');
INSERT INTO `ce_city` VALUES ('348', '柳州市', '22');
INSERT INTO `ce_city` VALUES ('349', '桂林市', '22');
INSERT INTO `ce_city` VALUES ('350', '梧州市', '22');
INSERT INTO `ce_city` VALUES ('351', '北海市', '22');
INSERT INTO `ce_city` VALUES ('352', '防城港市', '22');
INSERT INTO `ce_city` VALUES ('353', '钦州市', '22');
INSERT INTO `ce_city` VALUES ('354', '贵港市', '22');
INSERT INTO `ce_city` VALUES ('355', '玉林市', '22');
INSERT INTO `ce_city` VALUES ('356', '百色市', '22');
INSERT INTO `ce_city` VALUES ('357', '贺州市', '22');
INSERT INTO `ce_city` VALUES ('358', '河池市', '22');
INSERT INTO `ce_city` VALUES ('359', '来宾市', '22');
INSERT INTO `ce_city` VALUES ('360', '崇左市', '22');
INSERT INTO `ce_city` VALUES ('361', '海口市', '23');
INSERT INTO `ce_city` VALUES ('362', '三亚市', '23');
INSERT INTO `ce_city` VALUES ('363', '五指山市', '23');
INSERT INTO `ce_city` VALUES ('364', '琼海市', '23');
INSERT INTO `ce_city` VALUES ('365', '儋州市', '23');
INSERT INTO `ce_city` VALUES ('366', '文昌市', '23');
INSERT INTO `ce_city` VALUES ('367', '万宁市', '23');
INSERT INTO `ce_city` VALUES ('368', '东方市', '23');
INSERT INTO `ce_city` VALUES ('369', '定安县', '23');
INSERT INTO `ce_city` VALUES ('370', '屯昌县', '23');
INSERT INTO `ce_city` VALUES ('371', '澄迈县', '23');
INSERT INTO `ce_city` VALUES ('372', '临高县', '23');
INSERT INTO `ce_city` VALUES ('373', '白沙黎族自治县', '23');
INSERT INTO `ce_city` VALUES ('374', '昌江黎族自治县', '23');
INSERT INTO `ce_city` VALUES ('375', '乐东黎族自治县', '23');
INSERT INTO `ce_city` VALUES ('376', '陵水黎族自治县', '23');
INSERT INTO `ce_city` VALUES ('377', '保亭黎族苗族自治县', '23');
INSERT INTO `ce_city` VALUES ('378', '琼中黎族苗族自治县', '23');
INSERT INTO `ce_city` VALUES ('379', '西沙群岛', '23');
INSERT INTO `ce_city` VALUES ('380', '南沙群岛', '23');
INSERT INTO `ce_city` VALUES ('381', '中沙群岛的岛礁及其海域', '23');
INSERT INTO `ce_city` VALUES ('382', '成都市', '24');
INSERT INTO `ce_city` VALUES ('383', '自贡市', '24');
INSERT INTO `ce_city` VALUES ('384', '攀枝花市', '24');
INSERT INTO `ce_city` VALUES ('385', '泸州市', '24');
INSERT INTO `ce_city` VALUES ('386', '德阳市', '24');
INSERT INTO `ce_city` VALUES ('387', '绵阳市', '24');
INSERT INTO `ce_city` VALUES ('388', '广元市', '24');
INSERT INTO `ce_city` VALUES ('389', '遂宁市', '24');
INSERT INTO `ce_city` VALUES ('390', '内江市', '24');
INSERT INTO `ce_city` VALUES ('391', '乐山市', '24');
INSERT INTO `ce_city` VALUES ('392', '南充市', '24');
INSERT INTO `ce_city` VALUES ('393', '眉山市', '24');
INSERT INTO `ce_city` VALUES ('394', '宜宾市', '24');
INSERT INTO `ce_city` VALUES ('395', '广安市', '24');
INSERT INTO `ce_city` VALUES ('396', '达州市', '24');
INSERT INTO `ce_city` VALUES ('397', '雅安市', '24');
INSERT INTO `ce_city` VALUES ('398', '巴中市', '24');
INSERT INTO `ce_city` VALUES ('399', '资阳市', '24');
INSERT INTO `ce_city` VALUES ('400', '阿坝州', '24');
INSERT INTO `ce_city` VALUES ('401', '甘孜州', '24');
INSERT INTO `ce_city` VALUES ('402', '凉山州', '24');
INSERT INTO `ce_city` VALUES ('403', '贵阳市', '25');
INSERT INTO `ce_city` VALUES ('404', '六盘水市', '25');
INSERT INTO `ce_city` VALUES ('405', '遵义市', '25');
INSERT INTO `ce_city` VALUES ('406', '安顺市', '25');
INSERT INTO `ce_city` VALUES ('407', '铜仁地区', '25');
INSERT INTO `ce_city` VALUES ('408', '黔西南州', '25');
INSERT INTO `ce_city` VALUES ('409', '毕节地区', '25');
INSERT INTO `ce_city` VALUES ('410', '黔东南州', '25');
INSERT INTO `ce_city` VALUES ('411', '黔南州', '25');
INSERT INTO `ce_city` VALUES ('412', '昆明市', '26');
INSERT INTO `ce_city` VALUES ('413', '曲靖市', '26');
INSERT INTO `ce_city` VALUES ('414', '玉溪市', '26');
INSERT INTO `ce_city` VALUES ('415', '保山市', '26');
INSERT INTO `ce_city` VALUES ('416', '昭通市', '26');
INSERT INTO `ce_city` VALUES ('417', '丽江市', '26');
INSERT INTO `ce_city` VALUES ('418', '思茅市', '26');
INSERT INTO `ce_city` VALUES ('419', '临沧市', '26');
INSERT INTO `ce_city` VALUES ('420', '楚雄州', '26');
INSERT INTO `ce_city` VALUES ('421', '红河州', '26');
INSERT INTO `ce_city` VALUES ('422', '文山州', '26');
INSERT INTO `ce_city` VALUES ('423', '西双版纳', '26');
INSERT INTO `ce_city` VALUES ('424', '大理', '26');
INSERT INTO `ce_city` VALUES ('425', '德宏', '26');
INSERT INTO `ce_city` VALUES ('426', '怒江', '26');
INSERT INTO `ce_city` VALUES ('427', '迪庆', '26');
INSERT INTO `ce_city` VALUES ('428', '拉萨市', '27');
INSERT INTO `ce_city` VALUES ('429', '昌都', '27');
INSERT INTO `ce_city` VALUES ('430', '山南', '27');
INSERT INTO `ce_city` VALUES ('431', '日喀则', '27');
INSERT INTO `ce_city` VALUES ('432', '那曲', '27');
INSERT INTO `ce_city` VALUES ('433', '阿里', '27');
INSERT INTO `ce_city` VALUES ('434', '林芝', '27');
INSERT INTO `ce_city` VALUES ('435', '西安市', '28');
INSERT INTO `ce_city` VALUES ('436', '铜川市', '28');
INSERT INTO `ce_city` VALUES ('437', '宝鸡市', '28');
INSERT INTO `ce_city` VALUES ('438', '咸阳市', '28');
INSERT INTO `ce_city` VALUES ('439', '渭南市', '28');
INSERT INTO `ce_city` VALUES ('440', '延安市', '28');
INSERT INTO `ce_city` VALUES ('441', '汉中市', '28');
INSERT INTO `ce_city` VALUES ('442', '榆林市', '28');
INSERT INTO `ce_city` VALUES ('443', '安康市', '28');
INSERT INTO `ce_city` VALUES ('444', '商洛市', '28');
INSERT INTO `ce_city` VALUES ('445', '兰州市', '29');
INSERT INTO `ce_city` VALUES ('446', '嘉峪关市', '29');
INSERT INTO `ce_city` VALUES ('447', '金昌市', '29');
INSERT INTO `ce_city` VALUES ('448', '白银市', '29');
INSERT INTO `ce_city` VALUES ('449', '天水市', '29');
INSERT INTO `ce_city` VALUES ('450', '武威市', '29');
INSERT INTO `ce_city` VALUES ('451', '张掖市', '29');
INSERT INTO `ce_city` VALUES ('452', '平凉市', '29');
INSERT INTO `ce_city` VALUES ('453', '酒泉市', '29');
INSERT INTO `ce_city` VALUES ('454', '庆阳市', '29');
INSERT INTO `ce_city` VALUES ('455', '定西市', '29');
INSERT INTO `ce_city` VALUES ('456', '陇南市', '29');
INSERT INTO `ce_city` VALUES ('457', '临夏州', '29');
INSERT INTO `ce_city` VALUES ('458', '甘州', '29');
INSERT INTO `ce_city` VALUES ('459', '西宁市', '30');
INSERT INTO `ce_city` VALUES ('460', '海东地区', '30');
INSERT INTO `ce_city` VALUES ('461', '海州', '30');
INSERT INTO `ce_city` VALUES ('462', '黄南州', '30');
INSERT INTO `ce_city` VALUES ('463', '海南州', '30');
INSERT INTO `ce_city` VALUES ('464', '果洛州', '30');
INSERT INTO `ce_city` VALUES ('465', '玉树州', '30');
INSERT INTO `ce_city` VALUES ('466', '海西州', '30');
INSERT INTO `ce_city` VALUES ('467', '银川市', '31');
INSERT INTO `ce_city` VALUES ('468', '石嘴山市', '31');
INSERT INTO `ce_city` VALUES ('469', '吴忠市', '31');
INSERT INTO `ce_city` VALUES ('470', '固原市', '31');
INSERT INTO `ce_city` VALUES ('471', '中卫市', '31');
INSERT INTO `ce_city` VALUES ('472', '乌鲁木齐市', '32');
INSERT INTO `ce_city` VALUES ('473', '克拉玛依市', '32');
INSERT INTO `ce_city` VALUES ('474', '吐鲁番地区', '32');
INSERT INTO `ce_city` VALUES ('475', '哈密地区', '32');
INSERT INTO `ce_city` VALUES ('476', '昌吉州', '32');
INSERT INTO `ce_city` VALUES ('477', '博尔州', '32');
INSERT INTO `ce_city` VALUES ('478', '巴音郭楞州', '32');
INSERT INTO `ce_city` VALUES ('479', '阿克苏地区', '32');
INSERT INTO `ce_city` VALUES ('480', '克孜勒苏柯尔克孜自治州', '32');
INSERT INTO `ce_city` VALUES ('481', '喀什地区', '32');
INSERT INTO `ce_city` VALUES ('482', '和田地区', '32');
INSERT INTO `ce_city` VALUES ('483', '伊犁州', '32');
INSERT INTO `ce_city` VALUES ('484', '塔城地区', '32');
INSERT INTO `ce_city` VALUES ('485', '阿勒泰地区', '32');
INSERT INTO `ce_city` VALUES ('486', '石河子市', '32');
INSERT INTO `ce_city` VALUES ('487', '阿拉尔市', '32');
INSERT INTO `ce_city` VALUES ('488', '图木舒克市', '32');
INSERT INTO `ce_city` VALUES ('489', '五家渠市', '32');
INSERT INTO `ce_city` VALUES ('490', '台北市', '33');
INSERT INTO `ce_city` VALUES ('491', '高雄市', '33');
INSERT INTO `ce_city` VALUES ('492', '基隆市', '33');
INSERT INTO `ce_city` VALUES ('493', '新竹市', '33');
INSERT INTO `ce_city` VALUES ('494', '台中市', '33');
INSERT INTO `ce_city` VALUES ('495', '嘉义市', '33');
INSERT INTO `ce_city` VALUES ('496', '台南市', '33');
INSERT INTO `ce_city` VALUES ('497', '台北县', '33');
INSERT INTO `ce_city` VALUES ('498', '桃园县', '33');
INSERT INTO `ce_city` VALUES ('499', '新竹县', '33');
INSERT INTO `ce_city` VALUES ('500', '苗栗县', '33');
INSERT INTO `ce_city` VALUES ('501', '台中县', '33');
INSERT INTO `ce_city` VALUES ('502', '彰化县', '33');
INSERT INTO `ce_city` VALUES ('503', '南投县', '33');
INSERT INTO `ce_city` VALUES ('504', '云林县', '33');
INSERT INTO `ce_city` VALUES ('505', '嘉义县', '33');
INSERT INTO `ce_city` VALUES ('506', '台南县', '33');
INSERT INTO `ce_city` VALUES ('507', '高雄县', '33');
INSERT INTO `ce_city` VALUES ('508', '屏东县', '33');
INSERT INTO `ce_city` VALUES ('509', '宜兰县', '33');
INSERT INTO `ce_city` VALUES ('510', '花莲县', '33');
INSERT INTO `ce_city` VALUES ('511', '台东县', '33');
INSERT INTO `ce_city` VALUES ('512', '澎湖县', '33');
INSERT INTO `ce_city` VALUES ('513', '金门县', '33');
INSERT INTO `ce_city` VALUES ('514', '连江县', '33');
INSERT INTO `ce_city` VALUES ('515', '中西区', '34');
INSERT INTO `ce_city` VALUES ('516', '东区', '34');
INSERT INTO `ce_city` VALUES ('517', '南区', '34');
INSERT INTO `ce_city` VALUES ('518', '湾仔区', '34');
INSERT INTO `ce_city` VALUES ('519', '九龙城区', '34');
INSERT INTO `ce_city` VALUES ('520', '观塘区', '34');
INSERT INTO `ce_city` VALUES ('521', '深水埗区', '34');
INSERT INTO `ce_city` VALUES ('522', '黄大仙区', '34');
INSERT INTO `ce_city` VALUES ('523', '油尖旺区', '34');
INSERT INTO `ce_city` VALUES ('524', '离岛区', '34');
INSERT INTO `ce_city` VALUES ('525', '葵青区', '34');
INSERT INTO `ce_city` VALUES ('526', '北区', '34');
INSERT INTO `ce_city` VALUES ('527', '西贡区', '34');
INSERT INTO `ce_city` VALUES ('528', '沙田区', '34');
INSERT INTO `ce_city` VALUES ('529', '大埔区', '34');
INSERT INTO `ce_city` VALUES ('530', '荃湾区', '34');
INSERT INTO `ce_city` VALUES ('531', '屯门区', '34');
INSERT INTO `ce_city` VALUES ('532', '元朗区', '34');
INSERT INTO `ce_city` VALUES ('533', '花地玛堂区', '35');
INSERT INTO `ce_city` VALUES ('534', '市圣安多尼堂区', '35');
INSERT INTO `ce_city` VALUES ('535', '大堂区', '35');
INSERT INTO `ce_city` VALUES ('536', '望德堂区', '35');
INSERT INTO `ce_city` VALUES ('537', '风顺堂区', '35');
INSERT INTO `ce_city` VALUES ('538', '嘉模堂区', '35');
INSERT INTO `ce_city` VALUES ('539', '圣方济各堂区', '35');
INSERT INTO `ce_city` VALUES ('540', '长安区', '130');
INSERT INTO `ce_city` VALUES ('541', '桥东区', '130');
INSERT INTO `ce_city` VALUES ('542', '桥西区', '130');
INSERT INTO `ce_city` VALUES ('543', '新华区', '130');
INSERT INTO `ce_city` VALUES ('544', '井陉矿区', '130');
INSERT INTO `ce_city` VALUES ('545', '裕华区', '130');
INSERT INTO `ce_city` VALUES ('546', '井陉县', '130');
INSERT INTO `ce_city` VALUES ('547', '正定县', '130');
INSERT INTO `ce_city` VALUES ('548', '栾城县', '130');
INSERT INTO `ce_city` VALUES ('549', '行唐县', '130');
INSERT INTO `ce_city` VALUES ('550', '灵寿县', '130');
INSERT INTO `ce_city` VALUES ('551', '高邑县', '130');
INSERT INTO `ce_city` VALUES ('552', '深泽县', '130');
INSERT INTO `ce_city` VALUES ('553', '赞皇县', '130');
INSERT INTO `ce_city` VALUES ('554', '无极县', '130');
INSERT INTO `ce_city` VALUES ('555', '平山县', '130');
INSERT INTO `ce_city` VALUES ('556', '元氏县', '130');
INSERT INTO `ce_city` VALUES ('557', '赵县', '130');
INSERT INTO `ce_city` VALUES ('558', '辛集市', '130');
INSERT INTO `ce_city` VALUES ('559', '藁城市', '130');
INSERT INTO `ce_city` VALUES ('560', '晋州市', '130');
INSERT INTO `ce_city` VALUES ('561', '新乐市', '130');
INSERT INTO `ce_city` VALUES ('562', '鹿泉市', '130');
INSERT INTO `ce_city` VALUES ('563', '路南区', '131');
INSERT INTO `ce_city` VALUES ('564', '路北区', '131');
INSERT INTO `ce_city` VALUES ('565', '古冶区', '131');
INSERT INTO `ce_city` VALUES ('566', '开平区', '131');
INSERT INTO `ce_city` VALUES ('567', '丰南区', '131');
INSERT INTO `ce_city` VALUES ('568', '丰润区', '131');
INSERT INTO `ce_city` VALUES ('569', '滦县', '131');
INSERT INTO `ce_city` VALUES ('570', '滦南县', '131');
INSERT INTO `ce_city` VALUES ('571', '乐亭县', '131');
INSERT INTO `ce_city` VALUES ('572', '迁西县', '131');
INSERT INTO `ce_city` VALUES ('573', '玉田县', '131');
INSERT INTO `ce_city` VALUES ('574', '唐海县', '131');
INSERT INTO `ce_city` VALUES ('575', '遵化市', '131');
INSERT INTO `ce_city` VALUES ('576', '迁安市', '131');
INSERT INTO `ce_city` VALUES ('577', '海港区', '132');
INSERT INTO `ce_city` VALUES ('578', '山海关区', '132');
INSERT INTO `ce_city` VALUES ('579', '北戴河区', '132');
INSERT INTO `ce_city` VALUES ('580', '青龙县', '132');
INSERT INTO `ce_city` VALUES ('581', '昌黎县', '132');
INSERT INTO `ce_city` VALUES ('582', '抚宁县', '132');
INSERT INTO `ce_city` VALUES ('583', '卢龙县', '132');
INSERT INTO `ce_city` VALUES ('584', '邯山区', '133');
INSERT INTO `ce_city` VALUES ('585', '丛台区', '133');
INSERT INTO `ce_city` VALUES ('586', '复兴区', '133');
INSERT INTO `ce_city` VALUES ('587', '峰峰矿区', '133');
INSERT INTO `ce_city` VALUES ('588', '邯郸县', '133');
INSERT INTO `ce_city` VALUES ('589', '临漳县', '133');
INSERT INTO `ce_city` VALUES ('590', '成安县', '133');
INSERT INTO `ce_city` VALUES ('591', '大名县', '133');
INSERT INTO `ce_city` VALUES ('592', '涉县', '133');
INSERT INTO `ce_city` VALUES ('593', '磁县', '133');
INSERT INTO `ce_city` VALUES ('594', '肥乡县', '133');
INSERT INTO `ce_city` VALUES ('595', '永年县', '133');
INSERT INTO `ce_city` VALUES ('596', '邱县', '133');
INSERT INTO `ce_city` VALUES ('597', '鸡泽县', '133');
INSERT INTO `ce_city` VALUES ('598', '广平县', '133');
INSERT INTO `ce_city` VALUES ('599', '馆陶县', '133');
INSERT INTO `ce_city` VALUES ('600', '魏县', '133');
INSERT INTO `ce_city` VALUES ('601', '曲周县', '133');
INSERT INTO `ce_city` VALUES ('602', '武安市', '133');
INSERT INTO `ce_city` VALUES ('603', '桥东区', '134');
INSERT INTO `ce_city` VALUES ('604', '桥西区', '134');
INSERT INTO `ce_city` VALUES ('605', '邢台县', '134');
INSERT INTO `ce_city` VALUES ('606', '临城县', '134');
INSERT INTO `ce_city` VALUES ('607', '内丘县', '134');
INSERT INTO `ce_city` VALUES ('608', '柏乡县', '134');
INSERT INTO `ce_city` VALUES ('609', '隆尧县', '134');
INSERT INTO `ce_city` VALUES ('610', '任县', '134');
INSERT INTO `ce_city` VALUES ('611', '南和县', '134');
INSERT INTO `ce_city` VALUES ('612', '宁晋县', '134');
INSERT INTO `ce_city` VALUES ('613', '巨鹿县', '134');
INSERT INTO `ce_city` VALUES ('614', '新河县', '134');
INSERT INTO `ce_city` VALUES ('615', '广宗县', '134');
INSERT INTO `ce_city` VALUES ('616', '平乡县', '134');
INSERT INTO `ce_city` VALUES ('617', '威县', '134');
INSERT INTO `ce_city` VALUES ('618', '清河县', '134');
INSERT INTO `ce_city` VALUES ('619', '临西县', '134');
INSERT INTO `ce_city` VALUES ('620', '南宫市', '134');
INSERT INTO `ce_city` VALUES ('621', '沙河市', '134');
INSERT INTO `ce_city` VALUES ('622', '新市区', '135');
INSERT INTO `ce_city` VALUES ('623', '北市区', '135');
INSERT INTO `ce_city` VALUES ('624', '南市区', '135');
INSERT INTO `ce_city` VALUES ('625', '满城县', '135');
INSERT INTO `ce_city` VALUES ('626', '清苑县', '135');
INSERT INTO `ce_city` VALUES ('627', '涞水县', '135');
INSERT INTO `ce_city` VALUES ('628', '阜平县', '135');
INSERT INTO `ce_city` VALUES ('629', '徐水县', '135');
INSERT INTO `ce_city` VALUES ('630', '定兴县', '135');
INSERT INTO `ce_city` VALUES ('631', '唐县', '135');
INSERT INTO `ce_city` VALUES ('632', '高阳县', '135');
INSERT INTO `ce_city` VALUES ('633', '容城县', '135');
INSERT INTO `ce_city` VALUES ('634', '涞源县', '135');
INSERT INTO `ce_city` VALUES ('635', '望都县', '135');
INSERT INTO `ce_city` VALUES ('636', '安新县', '135');
INSERT INTO `ce_city` VALUES ('637', '易县', '135');
INSERT INTO `ce_city` VALUES ('638', '曲阳县', '135');
INSERT INTO `ce_city` VALUES ('639', '蠡县', '135');
INSERT INTO `ce_city` VALUES ('640', '顺平县', '135');
INSERT INTO `ce_city` VALUES ('641', '博野县', '135');
INSERT INTO `ce_city` VALUES ('642', '雄县', '135');
INSERT INTO `ce_city` VALUES ('643', '涿州市', '135');
INSERT INTO `ce_city` VALUES ('644', '定州市', '135');
INSERT INTO `ce_city` VALUES ('645', '安国市', '135');
INSERT INTO `ce_city` VALUES ('646', '高碑店市', '135');
INSERT INTO `ce_city` VALUES ('647', '桥东区', '136');
INSERT INTO `ce_city` VALUES ('648', '桥西区', '136');
INSERT INTO `ce_city` VALUES ('649', '宣化区', '136');
INSERT INTO `ce_city` VALUES ('650', '下花园区', '136');
INSERT INTO `ce_city` VALUES ('651', '宣化县', '136');
INSERT INTO `ce_city` VALUES ('652', '张北县', '136');
INSERT INTO `ce_city` VALUES ('653', '康保县', '136');
INSERT INTO `ce_city` VALUES ('654', '沽源县', '136');
INSERT INTO `ce_city` VALUES ('655', '尚义县', '136');
INSERT INTO `ce_city` VALUES ('656', '蔚县', '136');
INSERT INTO `ce_city` VALUES ('657', '阳原县', '136');
INSERT INTO `ce_city` VALUES ('658', '怀安县', '136');
INSERT INTO `ce_city` VALUES ('659', '万全县', '136');
INSERT INTO `ce_city` VALUES ('660', '怀来县', '136');
INSERT INTO `ce_city` VALUES ('661', '涿鹿县', '136');
INSERT INTO `ce_city` VALUES ('662', '赤城县', '136');
INSERT INTO `ce_city` VALUES ('663', '崇礼县', '136');
INSERT INTO `ce_city` VALUES ('664', '双桥区', '137');
INSERT INTO `ce_city` VALUES ('665', '双滦区', '137');
INSERT INTO `ce_city` VALUES ('666', '鹰手营子矿区', '137');
INSERT INTO `ce_city` VALUES ('667', '承德县', '137');
INSERT INTO `ce_city` VALUES ('668', '兴隆县', '137');
INSERT INTO `ce_city` VALUES ('669', '平泉县', '137');
INSERT INTO `ce_city` VALUES ('670', '滦平县', '137');
INSERT INTO `ce_city` VALUES ('671', '隆化县', '137');
INSERT INTO `ce_city` VALUES ('672', '丰宁县', '137');
INSERT INTO `ce_city` VALUES ('673', '宽城县', '137');
INSERT INTO `ce_city` VALUES ('674', '围场县', '137');
INSERT INTO `ce_city` VALUES ('675', '新华区', '138');
INSERT INTO `ce_city` VALUES ('676', '运河区', '138');
INSERT INTO `ce_city` VALUES ('677', '沧县', '138');
INSERT INTO `ce_city` VALUES ('678', '青县', '138');
INSERT INTO `ce_city` VALUES ('679', '东光县', '138');
INSERT INTO `ce_city` VALUES ('680', '海兴县', '138');
INSERT INTO `ce_city` VALUES ('681', '盐山县', '138');
INSERT INTO `ce_city` VALUES ('682', '肃宁县', '138');
INSERT INTO `ce_city` VALUES ('683', '南皮县', '138');
INSERT INTO `ce_city` VALUES ('684', '吴桥县', '138');
INSERT INTO `ce_city` VALUES ('685', '献县', '138');
INSERT INTO `ce_city` VALUES ('686', '孟村县', '138');
INSERT INTO `ce_city` VALUES ('687', '泊头市', '138');
INSERT INTO `ce_city` VALUES ('688', '任丘市', '138');
INSERT INTO `ce_city` VALUES ('689', '黄骅市', '138');
INSERT INTO `ce_city` VALUES ('690', '河间市', '138');
INSERT INTO `ce_city` VALUES ('691', '安次区', '139');
INSERT INTO `ce_city` VALUES ('692', '广阳区', '139');
INSERT INTO `ce_city` VALUES ('693', '固安县', '139');
INSERT INTO `ce_city` VALUES ('694', '永清县', '139');
INSERT INTO `ce_city` VALUES ('695', '香河县', '139');
INSERT INTO `ce_city` VALUES ('696', '大城县', '139');
INSERT INTO `ce_city` VALUES ('697', '文安县', '139');
INSERT INTO `ce_city` VALUES ('698', '大厂县', '139');
INSERT INTO `ce_city` VALUES ('699', '霸州市', '139');
INSERT INTO `ce_city` VALUES ('700', '三河市', '139');
INSERT INTO `ce_city` VALUES ('701', '桃城区', '140');
INSERT INTO `ce_city` VALUES ('702', '枣强县', '140');
INSERT INTO `ce_city` VALUES ('703', '武邑县', '140');
INSERT INTO `ce_city` VALUES ('704', '武强县', '140');
INSERT INTO `ce_city` VALUES ('705', '饶阳县', '140');
INSERT INTO `ce_city` VALUES ('706', '安平县', '140');
INSERT INTO `ce_city` VALUES ('707', '故城县', '140');
INSERT INTO `ce_city` VALUES ('708', '景县', '140');
INSERT INTO `ce_city` VALUES ('709', '阜城县', '140');
INSERT INTO `ce_city` VALUES ('710', '冀州市', '140');
INSERT INTO `ce_city` VALUES ('711', '深州市', '140');
INSERT INTO `ce_city` VALUES ('712', '小店区', '141');
INSERT INTO `ce_city` VALUES ('713', '迎泽区', '141');
INSERT INTO `ce_city` VALUES ('714', '杏花岭区', '141');
INSERT INTO `ce_city` VALUES ('715', '尖草坪区', '141');
INSERT INTO `ce_city` VALUES ('716', '万柏林区', '141');
INSERT INTO `ce_city` VALUES ('717', '晋源区', '141');
INSERT INTO `ce_city` VALUES ('718', '清徐县', '141');
INSERT INTO `ce_city` VALUES ('719', '阳曲县', '141');
INSERT INTO `ce_city` VALUES ('720', '娄烦县', '141');
INSERT INTO `ce_city` VALUES ('721', '古交市', '141');
INSERT INTO `ce_city` VALUES ('722', '城区', '142');
INSERT INTO `ce_city` VALUES ('723', '矿区', '142');
INSERT INTO `ce_city` VALUES ('724', '南郊区', '142');
INSERT INTO `ce_city` VALUES ('725', '新荣区', '142');
INSERT INTO `ce_city` VALUES ('726', '阳高县', '142');
INSERT INTO `ce_city` VALUES ('727', '天镇县', '142');
INSERT INTO `ce_city` VALUES ('728', '广灵县', '142');
INSERT INTO `ce_city` VALUES ('729', '灵丘县', '142');
INSERT INTO `ce_city` VALUES ('730', '浑源县', '142');
INSERT INTO `ce_city` VALUES ('731', '左云县', '142');
INSERT INTO `ce_city` VALUES ('732', '大同县', '142');
INSERT INTO `ce_city` VALUES ('733', '城区', '143');
INSERT INTO `ce_city` VALUES ('734', '矿区', '143');
INSERT INTO `ce_city` VALUES ('735', '郊区', '143');
INSERT INTO `ce_city` VALUES ('736', '平定县', '143');
INSERT INTO `ce_city` VALUES ('737', '盂县', '143');
INSERT INTO `ce_city` VALUES ('738', '城区', '144');
INSERT INTO `ce_city` VALUES ('739', '郊区', '144');
INSERT INTO `ce_city` VALUES ('740', '长治县', '144');
INSERT INTO `ce_city` VALUES ('741', '襄垣县', '144');
INSERT INTO `ce_city` VALUES ('742', '屯留县', '144');
INSERT INTO `ce_city` VALUES ('743', '平顺县', '144');
INSERT INTO `ce_city` VALUES ('744', '黎城县', '144');
INSERT INTO `ce_city` VALUES ('745', '壶关县', '144');
INSERT INTO `ce_city` VALUES ('746', '长子县', '144');
INSERT INTO `ce_city` VALUES ('747', '武乡县', '144');
INSERT INTO `ce_city` VALUES ('748', '沁县', '144');
INSERT INTO `ce_city` VALUES ('749', '沁源县', '144');
INSERT INTO `ce_city` VALUES ('750', '潞城市', '144');
INSERT INTO `ce_city` VALUES ('751', '城区', '145');
INSERT INTO `ce_city` VALUES ('752', '沁水县', '145');
INSERT INTO `ce_city` VALUES ('753', '阳城县', '145');
INSERT INTO `ce_city` VALUES ('754', '陵川县', '145');
INSERT INTO `ce_city` VALUES ('755', '泽州县', '145');
INSERT INTO `ce_city` VALUES ('756', '高平市', '145');
INSERT INTO `ce_city` VALUES ('757', '朔城区', '146');
INSERT INTO `ce_city` VALUES ('758', '平鲁区', '146');
INSERT INTO `ce_city` VALUES ('759', '山阴县', '146');
INSERT INTO `ce_city` VALUES ('760', '应县', '146');
INSERT INTO `ce_city` VALUES ('761', '右玉县', '146');
INSERT INTO `ce_city` VALUES ('762', '怀仁县', '146');
INSERT INTO `ce_city` VALUES ('763', '榆次区', '147');
INSERT INTO `ce_city` VALUES ('764', '榆社县', '147');
INSERT INTO `ce_city` VALUES ('765', '左权县', '147');
INSERT INTO `ce_city` VALUES ('766', '和顺县', '147');
INSERT INTO `ce_city` VALUES ('767', '昔阳县', '147');
INSERT INTO `ce_city` VALUES ('768', '寿阳县', '147');
INSERT INTO `ce_city` VALUES ('769', '太谷县', '147');
INSERT INTO `ce_city` VALUES ('770', '祁县', '147');
INSERT INTO `ce_city` VALUES ('771', '平遥县', '147');
INSERT INTO `ce_city` VALUES ('772', '灵石县', '147');
INSERT INTO `ce_city` VALUES ('773', '介休市', '147');
INSERT INTO `ce_city` VALUES ('774', '盐湖区', '148');
INSERT INTO `ce_city` VALUES ('775', '临猗县', '148');
INSERT INTO `ce_city` VALUES ('776', '万荣县', '148');
INSERT INTO `ce_city` VALUES ('777', '闻喜县', '148');
INSERT INTO `ce_city` VALUES ('778', '稷山县', '148');
INSERT INTO `ce_city` VALUES ('779', '新绛县', '148');
INSERT INTO `ce_city` VALUES ('780', '绛县', '148');
INSERT INTO `ce_city` VALUES ('781', '垣曲县', '148');
INSERT INTO `ce_city` VALUES ('782', '夏县', '148');
INSERT INTO `ce_city` VALUES ('783', '平陆县', '148');
INSERT INTO `ce_city` VALUES ('784', '芮城县', '148');
INSERT INTO `ce_city` VALUES ('785', '永济市', '148');
INSERT INTO `ce_city` VALUES ('786', '河津市', '148');
INSERT INTO `ce_city` VALUES ('787', '忻府区', '149');
INSERT INTO `ce_city` VALUES ('788', '定襄县', '149');
INSERT INTO `ce_city` VALUES ('789', '五台县', '149');
INSERT INTO `ce_city` VALUES ('790', '代县', '149');
INSERT INTO `ce_city` VALUES ('791', '繁峙县', '149');
INSERT INTO `ce_city` VALUES ('792', '宁武县', '149');
INSERT INTO `ce_city` VALUES ('793', '静乐县', '149');
INSERT INTO `ce_city` VALUES ('794', '神池县', '149');
INSERT INTO `ce_city` VALUES ('795', '五寨县', '149');
INSERT INTO `ce_city` VALUES ('796', '岢岚县', '149');
INSERT INTO `ce_city` VALUES ('797', '河曲县', '149');
INSERT INTO `ce_city` VALUES ('798', '保德县', '149');
INSERT INTO `ce_city` VALUES ('799', '偏关县', '149');
INSERT INTO `ce_city` VALUES ('800', '原平市', '149');
INSERT INTO `ce_city` VALUES ('801', '尧都区', '150');
INSERT INTO `ce_city` VALUES ('802', '曲沃县', '150');
INSERT INTO `ce_city` VALUES ('803', '翼城县', '150');
INSERT INTO `ce_city` VALUES ('804', '襄汾县', '150');
INSERT INTO `ce_city` VALUES ('805', '洪洞县', '150');
INSERT INTO `ce_city` VALUES ('806', '古县', '150');
INSERT INTO `ce_city` VALUES ('807', '安泽县', '150');
INSERT INTO `ce_city` VALUES ('808', '浮山县', '150');
INSERT INTO `ce_city` VALUES ('809', '吉县', '150');
INSERT INTO `ce_city` VALUES ('810', '乡宁县', '150');
INSERT INTO `ce_city` VALUES ('811', '大宁县', '150');
INSERT INTO `ce_city` VALUES ('812', '隰县', '150');
INSERT INTO `ce_city` VALUES ('813', '永和县', '150');
INSERT INTO `ce_city` VALUES ('814', '蒲县', '150');
INSERT INTO `ce_city` VALUES ('815', '汾西县', '150');
INSERT INTO `ce_city` VALUES ('816', '侯马市', '150');
INSERT INTO `ce_city` VALUES ('817', '霍州市', '150');
INSERT INTO `ce_city` VALUES ('818', '离石区', '151');
INSERT INTO `ce_city` VALUES ('819', '文水县', '151');
INSERT INTO `ce_city` VALUES ('820', '交城县', '151');
INSERT INTO `ce_city` VALUES ('821', '兴县', '151');
INSERT INTO `ce_city` VALUES ('822', '临县', '151');
INSERT INTO `ce_city` VALUES ('823', '柳林县', '151');
INSERT INTO `ce_city` VALUES ('824', '石楼县', '151');
INSERT INTO `ce_city` VALUES ('825', '岚县', '151');
INSERT INTO `ce_city` VALUES ('826', '方山县', '151');
INSERT INTO `ce_city` VALUES ('827', '中阳县', '151');
INSERT INTO `ce_city` VALUES ('828', '交口县', '151');
INSERT INTO `ce_city` VALUES ('829', '孝义市', '151');
INSERT INTO `ce_city` VALUES ('830', '汾阳市', '151');
INSERT INTO `ce_city` VALUES ('831', '新城区', '152');
INSERT INTO `ce_city` VALUES ('832', '回民区', '152');
INSERT INTO `ce_city` VALUES ('833', '玉泉区', '152');
INSERT INTO `ce_city` VALUES ('834', '赛罕区', '152');
INSERT INTO `ce_city` VALUES ('835', '土默特左旗', '152');
INSERT INTO `ce_city` VALUES ('836', '托克托县', '152');
INSERT INTO `ce_city` VALUES ('837', '和林格尔县', '152');
INSERT INTO `ce_city` VALUES ('838', '清水河县', '152');
INSERT INTO `ce_city` VALUES ('839', '武川县', '152');
INSERT INTO `ce_city` VALUES ('840', '东河区', '153');
INSERT INTO `ce_city` VALUES ('841', '昆都仑区', '153');
INSERT INTO `ce_city` VALUES ('842', '青山区', '153');
INSERT INTO `ce_city` VALUES ('843', '石拐区', '153');
INSERT INTO `ce_city` VALUES ('844', '白云矿区', '153');
INSERT INTO `ce_city` VALUES ('845', '九原区', '153');
INSERT INTO `ce_city` VALUES ('846', '土默特右旗', '153');
INSERT INTO `ce_city` VALUES ('847', '固阳县', '153');
INSERT INTO `ce_city` VALUES ('848', '达尔罕茂明安联合旗', '153');
INSERT INTO `ce_city` VALUES ('849', '海勃湾区', '154');
INSERT INTO `ce_city` VALUES ('850', '海南区', '154');
INSERT INTO `ce_city` VALUES ('851', '乌达区', '154');
INSERT INTO `ce_city` VALUES ('852', '红山区', '155');
INSERT INTO `ce_city` VALUES ('853', '元宝山区', '155');
INSERT INTO `ce_city` VALUES ('854', '松山区', '155');
INSERT INTO `ce_city` VALUES ('855', '阿鲁科尔沁旗', '155');
INSERT INTO `ce_city` VALUES ('856', '巴林左旗', '155');
INSERT INTO `ce_city` VALUES ('857', '巴林右旗', '155');
INSERT INTO `ce_city` VALUES ('858', '林西县', '155');
INSERT INTO `ce_city` VALUES ('859', '克什克腾旗', '155');
INSERT INTO `ce_city` VALUES ('860', '翁牛特旗', '155');
INSERT INTO `ce_city` VALUES ('861', '喀喇沁旗', '155');
INSERT INTO `ce_city` VALUES ('862', '宁城县', '155');
INSERT INTO `ce_city` VALUES ('863', '敖汉旗', '155');
INSERT INTO `ce_city` VALUES ('864', '科尔沁区', '156');
INSERT INTO `ce_city` VALUES ('865', '科尔沁左翼中旗', '156');
INSERT INTO `ce_city` VALUES ('866', '科尔沁左翼后旗', '156');
INSERT INTO `ce_city` VALUES ('867', '开鲁县', '156');
INSERT INTO `ce_city` VALUES ('868', '库伦旗', '156');
INSERT INTO `ce_city` VALUES ('869', '奈曼旗', '156');
INSERT INTO `ce_city` VALUES ('870', '扎鲁特旗', '156');
INSERT INTO `ce_city` VALUES ('871', '霍林郭勒市', '156');
INSERT INTO `ce_city` VALUES ('872', '东胜区', '157');
INSERT INTO `ce_city` VALUES ('873', '达拉特旗', '157');
INSERT INTO `ce_city` VALUES ('874', '准格尔旗', '157');
INSERT INTO `ce_city` VALUES ('875', '鄂托克前旗', '157');
INSERT INTO `ce_city` VALUES ('876', '鄂托克旗', '157');
INSERT INTO `ce_city` VALUES ('877', '杭锦旗', '157');
INSERT INTO `ce_city` VALUES ('878', '乌审旗', '157');
INSERT INTO `ce_city` VALUES ('879', '伊金霍洛旗', '157');
INSERT INTO `ce_city` VALUES ('880', '海拉尔区', '158');
INSERT INTO `ce_city` VALUES ('881', '阿荣旗', '158');
INSERT INTO `ce_city` VALUES ('882', '莫力达瓦达斡尔族自治旗', '158');
INSERT INTO `ce_city` VALUES ('883', '鄂伦春自治旗', '158');
INSERT INTO `ce_city` VALUES ('884', '鄂温克族自治旗', '158');
INSERT INTO `ce_city` VALUES ('885', '陈巴尔虎旗', '158');
INSERT INTO `ce_city` VALUES ('886', '新巴尔虎左旗', '158');
INSERT INTO `ce_city` VALUES ('887', '新巴尔虎右旗', '158');
INSERT INTO `ce_city` VALUES ('888', '满洲里市', '158');
INSERT INTO `ce_city` VALUES ('889', '牙克石市', '158');
INSERT INTO `ce_city` VALUES ('890', '扎兰屯市', '158');
INSERT INTO `ce_city` VALUES ('891', '额尔古纳市', '158');
INSERT INTO `ce_city` VALUES ('892', '根河市', '158');
INSERT INTO `ce_city` VALUES ('893', '临河区', '159');
INSERT INTO `ce_city` VALUES ('894', '五原县', '159');
INSERT INTO `ce_city` VALUES ('895', '磴口县', '159');
INSERT INTO `ce_city` VALUES ('896', '乌拉特前旗', '159');
INSERT INTO `ce_city` VALUES ('897', '乌拉特中旗', '159');
INSERT INTO `ce_city` VALUES ('898', '乌拉特后旗', '159');
INSERT INTO `ce_city` VALUES ('899', '杭锦后旗', '159');
INSERT INTO `ce_city` VALUES ('900', '集宁区', '160');
INSERT INTO `ce_city` VALUES ('901', '卓资县', '160');
INSERT INTO `ce_city` VALUES ('902', '化德县', '160');
INSERT INTO `ce_city` VALUES ('903', '商都县', '160');
INSERT INTO `ce_city` VALUES ('904', '兴和县', '160');
INSERT INTO `ce_city` VALUES ('905', '凉城县', '160');
INSERT INTO `ce_city` VALUES ('906', '察哈尔右翼前旗', '160');
INSERT INTO `ce_city` VALUES ('907', '察哈尔右翼中旗', '160');
INSERT INTO `ce_city` VALUES ('908', '察哈尔右翼后旗', '160');
INSERT INTO `ce_city` VALUES ('909', '四子王旗', '160');
INSERT INTO `ce_city` VALUES ('910', '丰镇市', '160');
INSERT INTO `ce_city` VALUES ('911', '乌兰浩特市', '161');
INSERT INTO `ce_city` VALUES ('912', '阿尔山市', '161');
INSERT INTO `ce_city` VALUES ('913', '科尔沁右翼前旗', '161');
INSERT INTO `ce_city` VALUES ('914', '科尔沁右翼中旗', '161');
INSERT INTO `ce_city` VALUES ('915', '扎赉特旗', '161');
INSERT INTO `ce_city` VALUES ('916', '突泉县', '161');
INSERT INTO `ce_city` VALUES ('917', '二连浩特市', '162');
INSERT INTO `ce_city` VALUES ('918', '锡林浩特市', '162');
INSERT INTO `ce_city` VALUES ('919', '阿巴嘎旗', '162');
INSERT INTO `ce_city` VALUES ('920', '苏尼特左旗', '162');
INSERT INTO `ce_city` VALUES ('921', '苏尼特右旗', '162');
INSERT INTO `ce_city` VALUES ('922', '东乌珠穆沁旗', '162');
INSERT INTO `ce_city` VALUES ('923', '西乌珠穆沁旗', '162');
INSERT INTO `ce_city` VALUES ('924', '太仆寺旗', '162');
INSERT INTO `ce_city` VALUES ('925', '镶黄旗', '162');
INSERT INTO `ce_city` VALUES ('926', '正镶白旗', '162');
INSERT INTO `ce_city` VALUES ('927', '正蓝旗', '162');
INSERT INTO `ce_city` VALUES ('928', '多伦县', '162');
INSERT INTO `ce_city` VALUES ('929', '阿拉善左旗', '163');
INSERT INTO `ce_city` VALUES ('930', '阿拉善右旗', '163');
INSERT INTO `ce_city` VALUES ('931', '额济纳旗', '163');
INSERT INTO `ce_city` VALUES ('932', '和平区', '164');
INSERT INTO `ce_city` VALUES ('933', '沈河区', '164');
INSERT INTO `ce_city` VALUES ('934', '大东区', '164');
INSERT INTO `ce_city` VALUES ('935', '皇姑区', '164');
INSERT INTO `ce_city` VALUES ('936', '铁西区', '164');
INSERT INTO `ce_city` VALUES ('937', '苏家屯区', '164');
INSERT INTO `ce_city` VALUES ('938', '东陵区', '164');
INSERT INTO `ce_city` VALUES ('939', '新城子区', '164');
INSERT INTO `ce_city` VALUES ('940', '于洪区', '164');
INSERT INTO `ce_city` VALUES ('941', '辽中县', '164');
INSERT INTO `ce_city` VALUES ('942', '康平县', '164');
INSERT INTO `ce_city` VALUES ('943', '法库县', '164');
INSERT INTO `ce_city` VALUES ('944', '新民市', '164');
INSERT INTO `ce_city` VALUES ('945', '中山区', '165');
INSERT INTO `ce_city` VALUES ('946', '西岗区', '165');
INSERT INTO `ce_city` VALUES ('947', '沙河口区', '165');
INSERT INTO `ce_city` VALUES ('948', '甘井子区', '165');
INSERT INTO `ce_city` VALUES ('949', '旅顺口区', '165');
INSERT INTO `ce_city` VALUES ('950', '金州区', '165');
INSERT INTO `ce_city` VALUES ('951', '长海县', '165');
INSERT INTO `ce_city` VALUES ('952', '瓦房店市', '165');
INSERT INTO `ce_city` VALUES ('953', '普兰店市', '165');
INSERT INTO `ce_city` VALUES ('954', '庄河市', '165');
INSERT INTO `ce_city` VALUES ('955', '铁东区', '166');
INSERT INTO `ce_city` VALUES ('956', '铁西区', '166');
INSERT INTO `ce_city` VALUES ('957', '立山区', '166');
INSERT INTO `ce_city` VALUES ('958', '千山区', '166');
INSERT INTO `ce_city` VALUES ('959', '台安县', '166');
INSERT INTO `ce_city` VALUES ('960', '岫岩满族自治县', '166');
INSERT INTO `ce_city` VALUES ('961', '海城市', '166');
INSERT INTO `ce_city` VALUES ('962', '新抚区', '167');
INSERT INTO `ce_city` VALUES ('963', '东洲区', '167');
INSERT INTO `ce_city` VALUES ('964', '望花区', '167');
INSERT INTO `ce_city` VALUES ('965', '顺城区', '167');
INSERT INTO `ce_city` VALUES ('966', '抚顺县', '167');
INSERT INTO `ce_city` VALUES ('967', '新宾满族自治县', '167');
INSERT INTO `ce_city` VALUES ('968', '清原满族自治县', '167');
INSERT INTO `ce_city` VALUES ('969', '平山区', '168');
INSERT INTO `ce_city` VALUES ('970', '溪湖区', '168');
INSERT INTO `ce_city` VALUES ('971', '明山区', '168');
INSERT INTO `ce_city` VALUES ('972', '南芬区', '168');
INSERT INTO `ce_city` VALUES ('973', '本溪满族自治县', '168');
INSERT INTO `ce_city` VALUES ('974', '桓仁满族自治县', '168');
INSERT INTO `ce_city` VALUES ('975', '元宝区', '169');
INSERT INTO `ce_city` VALUES ('976', '振兴区', '169');
INSERT INTO `ce_city` VALUES ('977', '振安区', '169');
INSERT INTO `ce_city` VALUES ('978', '宽甸满族自治县', '169');
INSERT INTO `ce_city` VALUES ('979', '东港市', '169');
INSERT INTO `ce_city` VALUES ('980', '凤城市', '169');
INSERT INTO `ce_city` VALUES ('981', '古塔区', '170');
INSERT INTO `ce_city` VALUES ('982', '凌河区', '170');
INSERT INTO `ce_city` VALUES ('983', '太和区', '170');
INSERT INTO `ce_city` VALUES ('984', '黑山县', '170');
INSERT INTO `ce_city` VALUES ('985', '义县', '170');
INSERT INTO `ce_city` VALUES ('986', '凌海市', '170');
INSERT INTO `ce_city` VALUES ('987', '北镇市', '170');
INSERT INTO `ce_city` VALUES ('988', '站前区', '171');
INSERT INTO `ce_city` VALUES ('989', '西市区', '171');
INSERT INTO `ce_city` VALUES ('990', '鲅鱼圈区', '171');
INSERT INTO `ce_city` VALUES ('991', '老边区', '171');
INSERT INTO `ce_city` VALUES ('992', '盖州市', '171');
INSERT INTO `ce_city` VALUES ('993', '大石桥市', '171');
INSERT INTO `ce_city` VALUES ('994', '海州区', '172');
INSERT INTO `ce_city` VALUES ('995', '新邱区', '172');
INSERT INTO `ce_city` VALUES ('996', '太平区', '172');
INSERT INTO `ce_city` VALUES ('997', '清河门区', '172');
INSERT INTO `ce_city` VALUES ('998', '细河区', '172');
INSERT INTO `ce_city` VALUES ('999', '阜新蒙古族自治县', '172');
INSERT INTO `ce_city` VALUES ('1000', '彰武县', '172');
INSERT INTO `ce_city` VALUES ('1001', '白塔区', '173');
INSERT INTO `ce_city` VALUES ('1002', '文圣区', '173');
INSERT INTO `ce_city` VALUES ('1003', '宏伟区', '173');
INSERT INTO `ce_city` VALUES ('1004', '弓长岭区', '173');
INSERT INTO `ce_city` VALUES ('1005', '太子河区', '173');
INSERT INTO `ce_city` VALUES ('1006', '辽阳县', '173');
INSERT INTO `ce_city` VALUES ('1007', '灯塔市', '173');
INSERT INTO `ce_city` VALUES ('1008', '双台子区', '174');
INSERT INTO `ce_city` VALUES ('1009', '兴隆台区', '174');
INSERT INTO `ce_city` VALUES ('1010', '大洼县', '174');
INSERT INTO `ce_city` VALUES ('1011', '盘山县', '174');
INSERT INTO `ce_city` VALUES ('1012', '银州区', '175');
INSERT INTO `ce_city` VALUES ('1013', '清河区', '175');
INSERT INTO `ce_city` VALUES ('1014', '铁岭县', '175');
INSERT INTO `ce_city` VALUES ('1015', '西丰县', '175');
INSERT INTO `ce_city` VALUES ('1016', '昌图县', '175');
INSERT INTO `ce_city` VALUES ('1017', '调兵山市', '175');
INSERT INTO `ce_city` VALUES ('1018', '开原市', '175');
INSERT INTO `ce_city` VALUES ('1019', '双塔区', '176');
INSERT INTO `ce_city` VALUES ('1020', '龙城区', '176');
INSERT INTO `ce_city` VALUES ('1021', '朝阳县', '176');
INSERT INTO `ce_city` VALUES ('1022', '建平县', '176');
INSERT INTO `ce_city` VALUES ('1023', '喀喇沁左翼蒙古族自治县', '176');
INSERT INTO `ce_city` VALUES ('1024', '北票市', '176');
INSERT INTO `ce_city` VALUES ('1025', '凌源市', '176');
INSERT INTO `ce_city` VALUES ('1026', '连山区', '177');
INSERT INTO `ce_city` VALUES ('1027', '龙港区', '177');
INSERT INTO `ce_city` VALUES ('1028', '南票区', '177');
INSERT INTO `ce_city` VALUES ('1029', '绥中县', '177');
INSERT INTO `ce_city` VALUES ('1030', '建昌县', '177');
INSERT INTO `ce_city` VALUES ('1031', '兴城市', '177');
INSERT INTO `ce_city` VALUES ('1032', '南关区', '178');
INSERT INTO `ce_city` VALUES ('1033', '宽城区', '178');
INSERT INTO `ce_city` VALUES ('1034', '朝阳区', '178');
INSERT INTO `ce_city` VALUES ('1035', '二道区', '178');
INSERT INTO `ce_city` VALUES ('1036', '绿园区', '178');
INSERT INTO `ce_city` VALUES ('1037', '双阳区', '178');
INSERT INTO `ce_city` VALUES ('1038', '农安县', '178');
INSERT INTO `ce_city` VALUES ('1039', '九台市', '178');
INSERT INTO `ce_city` VALUES ('1040', '榆树市', '178');
INSERT INTO `ce_city` VALUES ('1041', '德惠市', '178');
INSERT INTO `ce_city` VALUES ('1042', '昌邑区', '179');
INSERT INTO `ce_city` VALUES ('1043', '龙潭区', '179');
INSERT INTO `ce_city` VALUES ('1044', '船营区', '179');
INSERT INTO `ce_city` VALUES ('1045', '丰满区', '179');
INSERT INTO `ce_city` VALUES ('1046', '永吉县', '179');
INSERT INTO `ce_city` VALUES ('1047', '蛟河市', '179');
INSERT INTO `ce_city` VALUES ('1048', '桦甸市', '179');
INSERT INTO `ce_city` VALUES ('1049', '舒兰市', '179');
INSERT INTO `ce_city` VALUES ('1050', '磐石市', '179');
INSERT INTO `ce_city` VALUES ('1051', '铁西区', '180');
INSERT INTO `ce_city` VALUES ('1052', '铁东区', '180');
INSERT INTO `ce_city` VALUES ('1053', '梨树县', '180');
INSERT INTO `ce_city` VALUES ('1054', '伊通满族自治县', '180');
INSERT INTO `ce_city` VALUES ('1055', '公主岭市', '180');
INSERT INTO `ce_city` VALUES ('1056', '双辽市', '180');
INSERT INTO `ce_city` VALUES ('1057', '龙山区', '181');
INSERT INTO `ce_city` VALUES ('1058', '西安区', '181');
INSERT INTO `ce_city` VALUES ('1059', '东丰县', '181');
INSERT INTO `ce_city` VALUES ('1060', '东辽县', '181');
INSERT INTO `ce_city` VALUES ('1061', '东昌区', '182');
INSERT INTO `ce_city` VALUES ('1062', '二道江区', '182');
INSERT INTO `ce_city` VALUES ('1063', '通化县', '182');
INSERT INTO `ce_city` VALUES ('1064', '辉南县', '182');
INSERT INTO `ce_city` VALUES ('1065', '柳河县', '182');
INSERT INTO `ce_city` VALUES ('1066', '梅河口市', '182');
INSERT INTO `ce_city` VALUES ('1067', '集安市', '182');
INSERT INTO `ce_city` VALUES ('1068', '八道江区', '183');
INSERT INTO `ce_city` VALUES ('1069', '抚松县', '183');
INSERT INTO `ce_city` VALUES ('1070', '靖宇县', '183');
INSERT INTO `ce_city` VALUES ('1071', '长白朝鲜族自治县', '183');
INSERT INTO `ce_city` VALUES ('1072', '江源县', '183');
INSERT INTO `ce_city` VALUES ('1073', '临江市', '183');
INSERT INTO `ce_city` VALUES ('1074', '宁江区', '184');
INSERT INTO `ce_city` VALUES ('1075', '前郭尔罗斯蒙古族自治县', '184');
INSERT INTO `ce_city` VALUES ('1076', '长岭县', '184');
INSERT INTO `ce_city` VALUES ('1077', '乾安县', '184');
INSERT INTO `ce_city` VALUES ('1078', '扶余县', '184');
INSERT INTO `ce_city` VALUES ('1079', '洮北区', '185');
INSERT INTO `ce_city` VALUES ('1080', '镇赉县', '185');
INSERT INTO `ce_city` VALUES ('1081', '通榆县', '185');
INSERT INTO `ce_city` VALUES ('1082', '洮南市', '185');
INSERT INTO `ce_city` VALUES ('1083', '大安市', '185');
INSERT INTO `ce_city` VALUES ('1084', '延吉市', '186');
INSERT INTO `ce_city` VALUES ('1085', '图们市', '186');
INSERT INTO `ce_city` VALUES ('1086', '敦化市', '186');
INSERT INTO `ce_city` VALUES ('1087', '珲春市', '186');
INSERT INTO `ce_city` VALUES ('1088', '龙井市', '186');
INSERT INTO `ce_city` VALUES ('1089', '和龙市', '186');
INSERT INTO `ce_city` VALUES ('1090', '汪清县', '186');
INSERT INTO `ce_city` VALUES ('1091', '安图县', '186');
INSERT INTO `ce_city` VALUES ('1092', '道里区', '187');
INSERT INTO `ce_city` VALUES ('1093', '南岗区', '187');
INSERT INTO `ce_city` VALUES ('1094', '道外区', '187');
INSERT INTO `ce_city` VALUES ('1095', '香坊区', '187');
INSERT INTO `ce_city` VALUES ('1096', '动力区', '187');
INSERT INTO `ce_city` VALUES ('1097', '平房区', '187');
INSERT INTO `ce_city` VALUES ('1098', '松北区', '187');
INSERT INTO `ce_city` VALUES ('1099', '呼兰区', '187');
INSERT INTO `ce_city` VALUES ('1100', '依兰县', '187');
INSERT INTO `ce_city` VALUES ('1101', '方正县', '187');
INSERT INTO `ce_city` VALUES ('1102', '宾县', '187');
INSERT INTO `ce_city` VALUES ('1103', '巴彦县', '187');
INSERT INTO `ce_city` VALUES ('1104', '木兰县', '187');
INSERT INTO `ce_city` VALUES ('1105', '通河县', '187');
INSERT INTO `ce_city` VALUES ('1106', '延寿县', '187');
INSERT INTO `ce_city` VALUES ('1107', '阿城市', '187');
INSERT INTO `ce_city` VALUES ('1108', '双城市', '187');
INSERT INTO `ce_city` VALUES ('1109', '尚志市', '187');
INSERT INTO `ce_city` VALUES ('1110', '五常市', '187');
INSERT INTO `ce_city` VALUES ('1111', '龙沙区', '188');
INSERT INTO `ce_city` VALUES ('1112', '建华区', '188');
INSERT INTO `ce_city` VALUES ('1113', '铁锋区', '188');
INSERT INTO `ce_city` VALUES ('1114', '昂昂溪区', '188');
INSERT INTO `ce_city` VALUES ('1115', '富拉尔基区', '188');
INSERT INTO `ce_city` VALUES ('1116', '碾子山区', '188');
INSERT INTO `ce_city` VALUES ('1117', '梅里斯达斡尔族区', '188');
INSERT INTO `ce_city` VALUES ('1118', '龙江县', '188');
INSERT INTO `ce_city` VALUES ('1119', '依安县', '188');
INSERT INTO `ce_city` VALUES ('1120', '泰来县', '188');
INSERT INTO `ce_city` VALUES ('1121', '甘南县', '188');
INSERT INTO `ce_city` VALUES ('1122', '富裕县', '188');
INSERT INTO `ce_city` VALUES ('1123', '克山县', '188');
INSERT INTO `ce_city` VALUES ('1124', '克东县', '188');
INSERT INTO `ce_city` VALUES ('1125', '拜泉县', '188');
INSERT INTO `ce_city` VALUES ('1126', '讷河市', '188');
INSERT INTO `ce_city` VALUES ('1127', '鸡冠区', '189');
INSERT INTO `ce_city` VALUES ('1128', '恒山区', '189');
INSERT INTO `ce_city` VALUES ('1129', '滴道区', '189');
INSERT INTO `ce_city` VALUES ('1130', '梨树区', '189');
INSERT INTO `ce_city` VALUES ('1131', '城子河区', '189');
INSERT INTO `ce_city` VALUES ('1132', '麻山区', '189');
INSERT INTO `ce_city` VALUES ('1133', '鸡东县', '189');
INSERT INTO `ce_city` VALUES ('1134', '虎林市', '189');
INSERT INTO `ce_city` VALUES ('1135', '密山市', '189');
INSERT INTO `ce_city` VALUES ('1136', '向阳区', '190');
INSERT INTO `ce_city` VALUES ('1137', '工农区', '190');
INSERT INTO `ce_city` VALUES ('1138', '南山区', '190');
INSERT INTO `ce_city` VALUES ('1139', '兴安区', '190');
INSERT INTO `ce_city` VALUES ('1140', '东山区', '190');
INSERT INTO `ce_city` VALUES ('1141', '兴山区', '190');
INSERT INTO `ce_city` VALUES ('1142', '萝北县', '190');
INSERT INTO `ce_city` VALUES ('1143', '绥滨县', '190');
INSERT INTO `ce_city` VALUES ('1144', '尖山区', '191');
INSERT INTO `ce_city` VALUES ('1145', '岭东区', '191');
INSERT INTO `ce_city` VALUES ('1146', '四方台区', '191');
INSERT INTO `ce_city` VALUES ('1147', '宝山区', '191');
INSERT INTO `ce_city` VALUES ('1148', '集贤县', '191');
INSERT INTO `ce_city` VALUES ('1149', '友谊县', '191');
INSERT INTO `ce_city` VALUES ('1150', '宝清县', '191');
INSERT INTO `ce_city` VALUES ('1151', '饶河县', '191');
INSERT INTO `ce_city` VALUES ('1152', '萨尔图区', '192');
INSERT INTO `ce_city` VALUES ('1153', '龙凤区', '192');
INSERT INTO `ce_city` VALUES ('1154', '让胡路区', '192');
INSERT INTO `ce_city` VALUES ('1155', '红岗区', '192');
INSERT INTO `ce_city` VALUES ('1156', '大同区', '192');
INSERT INTO `ce_city` VALUES ('1157', '肇州县', '192');
INSERT INTO `ce_city` VALUES ('1158', '肇源县', '192');
INSERT INTO `ce_city` VALUES ('1159', '林甸县', '192');
INSERT INTO `ce_city` VALUES ('1160', '杜尔伯特蒙古族自治县', '192');
INSERT INTO `ce_city` VALUES ('1161', '伊春区', '193');
INSERT INTO `ce_city` VALUES ('1162', '南岔区', '193');
INSERT INTO `ce_city` VALUES ('1163', '友好区', '193');
INSERT INTO `ce_city` VALUES ('1164', '西林区', '193');
INSERT INTO `ce_city` VALUES ('1165', '翠峦区', '193');
INSERT INTO `ce_city` VALUES ('1166', '新青区', '193');
INSERT INTO `ce_city` VALUES ('1167', '美溪区', '193');
INSERT INTO `ce_city` VALUES ('1168', '金山屯区', '193');
INSERT INTO `ce_city` VALUES ('1169', '五营区', '193');
INSERT INTO `ce_city` VALUES ('1170', '乌马河区', '193');
INSERT INTO `ce_city` VALUES ('1171', '汤旺河区', '193');
INSERT INTO `ce_city` VALUES ('1172', '带岭区', '193');
INSERT INTO `ce_city` VALUES ('1173', '乌伊岭区', '193');
INSERT INTO `ce_city` VALUES ('1174', '红星区', '193');
INSERT INTO `ce_city` VALUES ('1175', '上甘岭区', '193');
INSERT INTO `ce_city` VALUES ('1176', '嘉荫县', '193');
INSERT INTO `ce_city` VALUES ('1177', '铁力市', '193');
INSERT INTO `ce_city` VALUES ('1178', '永红区', '194');
INSERT INTO `ce_city` VALUES ('1179', '向阳区', '194');
INSERT INTO `ce_city` VALUES ('1180', '前进区', '194');
INSERT INTO `ce_city` VALUES ('1181', '东风区', '194');
INSERT INTO `ce_city` VALUES ('1182', '郊区', '194');
INSERT INTO `ce_city` VALUES ('1183', '桦南县', '194');
INSERT INTO `ce_city` VALUES ('1184', '桦川县', '194');
INSERT INTO `ce_city` VALUES ('1185', '汤原县', '194');
INSERT INTO `ce_city` VALUES ('1186', '抚远县', '194');
INSERT INTO `ce_city` VALUES ('1187', '同江市', '194');
INSERT INTO `ce_city` VALUES ('1188', '富锦市', '194');
INSERT INTO `ce_city` VALUES ('1189', '新兴区', '195');
INSERT INTO `ce_city` VALUES ('1190', '桃山区', '195');
INSERT INTO `ce_city` VALUES ('1191', '茄子河区', '195');
INSERT INTO `ce_city` VALUES ('1192', '勃利县', '195');
INSERT INTO `ce_city` VALUES ('1193', '东安区', '196');
INSERT INTO `ce_city` VALUES ('1194', '阳明区', '196');
INSERT INTO `ce_city` VALUES ('1195', '爱民区', '196');
INSERT INTO `ce_city` VALUES ('1196', '西安区', '196');
INSERT INTO `ce_city` VALUES ('1197', '东宁县', '196');
INSERT INTO `ce_city` VALUES ('1198', '林口县', '196');
INSERT INTO `ce_city` VALUES ('1199', '绥芬河市', '196');
INSERT INTO `ce_city` VALUES ('1200', '海林市', '196');
INSERT INTO `ce_city` VALUES ('1201', '宁安市', '196');
INSERT INTO `ce_city` VALUES ('1202', '穆棱市', '196');
INSERT INTO `ce_city` VALUES ('1203', '爱辉区', '197');
INSERT INTO `ce_city` VALUES ('1204', '嫩江县', '197');
INSERT INTO `ce_city` VALUES ('1205', '逊克县', '197');
INSERT INTO `ce_city` VALUES ('1206', '孙吴县', '197');
INSERT INTO `ce_city` VALUES ('1207', '北安市', '197');
INSERT INTO `ce_city` VALUES ('1208', '五大连池市', '197');
INSERT INTO `ce_city` VALUES ('1209', '北林区', '198');
INSERT INTO `ce_city` VALUES ('1210', '望奎县', '198');
INSERT INTO `ce_city` VALUES ('1211', '兰西县', '198');
INSERT INTO `ce_city` VALUES ('1212', '青冈县', '198');
INSERT INTO `ce_city` VALUES ('1213', '庆安县', '198');
INSERT INTO `ce_city` VALUES ('1214', '明水县', '198');
INSERT INTO `ce_city` VALUES ('1215', '绥棱县', '198');
INSERT INTO `ce_city` VALUES ('1216', '安达市', '198');
INSERT INTO `ce_city` VALUES ('1217', '肇东市', '198');
INSERT INTO `ce_city` VALUES ('1218', '海伦市', '198');
INSERT INTO `ce_city` VALUES ('1219', '呼玛县', '199');
INSERT INTO `ce_city` VALUES ('1220', '塔河县', '199');
INSERT INTO `ce_city` VALUES ('1221', '漠河县', '199');
INSERT INTO `ce_city` VALUES ('1222', '玄武区', '200');
INSERT INTO `ce_city` VALUES ('1223', '白下区', '200');
INSERT INTO `ce_city` VALUES ('1224', '秦淮区', '200');
INSERT INTO `ce_city` VALUES ('1225', '建邺区', '200');
INSERT INTO `ce_city` VALUES ('1226', '鼓楼区', '200');
INSERT INTO `ce_city` VALUES ('1227', '下关区', '200');
INSERT INTO `ce_city` VALUES ('1228', '浦口区', '200');
INSERT INTO `ce_city` VALUES ('1229', '栖霞区', '200');
INSERT INTO `ce_city` VALUES ('1230', '雨花台区', '200');
INSERT INTO `ce_city` VALUES ('1231', '江宁区', '200');
INSERT INTO `ce_city` VALUES ('1232', '六合区', '200');
INSERT INTO `ce_city` VALUES ('1233', '溧水县', '200');
INSERT INTO `ce_city` VALUES ('1234', '高淳县', '200');
INSERT INTO `ce_city` VALUES ('1235', '崇安区', '201');
INSERT INTO `ce_city` VALUES ('1236', '南长区', '201');
INSERT INTO `ce_city` VALUES ('1237', '北塘区', '201');
INSERT INTO `ce_city` VALUES ('1238', '锡山区', '201');
INSERT INTO `ce_city` VALUES ('1239', '惠山区', '201');
INSERT INTO `ce_city` VALUES ('1240', '滨湖区', '201');
INSERT INTO `ce_city` VALUES ('1241', '江阴市', '201');
INSERT INTO `ce_city` VALUES ('1242', '宜兴市', '201');
INSERT INTO `ce_city` VALUES ('1243', '鼓楼区', '202');
INSERT INTO `ce_city` VALUES ('1244', '云龙区', '202');
INSERT INTO `ce_city` VALUES ('1245', '九里区', '202');
INSERT INTO `ce_city` VALUES ('1246', '贾汪区', '202');
INSERT INTO `ce_city` VALUES ('1247', '泉山区', '202');
INSERT INTO `ce_city` VALUES ('1248', '丰县', '202');
INSERT INTO `ce_city` VALUES ('1249', '沛县', '202');
INSERT INTO `ce_city` VALUES ('1250', '铜山县', '202');
INSERT INTO `ce_city` VALUES ('1251', '睢宁县', '202');
INSERT INTO `ce_city` VALUES ('1252', '新沂市', '202');
INSERT INTO `ce_city` VALUES ('1253', '邳州市', '202');
INSERT INTO `ce_city` VALUES ('1254', '天宁区', '203');
INSERT INTO `ce_city` VALUES ('1255', '钟楼区', '203');
INSERT INTO `ce_city` VALUES ('1256', '戚墅堰区', '203');
INSERT INTO `ce_city` VALUES ('1257', '新北区', '203');
INSERT INTO `ce_city` VALUES ('1258', '武进区', '203');
INSERT INTO `ce_city` VALUES ('1259', '溧阳市', '203');
INSERT INTO `ce_city` VALUES ('1260', '金坛市', '203');
INSERT INTO `ce_city` VALUES ('1261', '沧浪区', '204');
INSERT INTO `ce_city` VALUES ('1262', '平江区', '204');
INSERT INTO `ce_city` VALUES ('1263', '金阊区', '204');
INSERT INTO `ce_city` VALUES ('1264', '虎丘区', '204');
INSERT INTO `ce_city` VALUES ('1265', '吴中区', '204');
INSERT INTO `ce_city` VALUES ('1266', '相城区', '204');
INSERT INTO `ce_city` VALUES ('1267', '常熟市', '204');
INSERT INTO `ce_city` VALUES ('1268', '张家港市', '204');
INSERT INTO `ce_city` VALUES ('1269', '昆山市', '204');
INSERT INTO `ce_city` VALUES ('1270', '吴江市', '204');
INSERT INTO `ce_city` VALUES ('1271', '太仓市', '204');
INSERT INTO `ce_city` VALUES ('1272', '崇川区', '205');
INSERT INTO `ce_city` VALUES ('1273', '港闸区', '205');
INSERT INTO `ce_city` VALUES ('1274', '海安县', '205');
INSERT INTO `ce_city` VALUES ('1275', '如东县', '205');
INSERT INTO `ce_city` VALUES ('1276', '启东市', '205');
INSERT INTO `ce_city` VALUES ('1277', '如皋市', '205');
INSERT INTO `ce_city` VALUES ('1278', '通州市', '205');
INSERT INTO `ce_city` VALUES ('1279', '海门市', '205');
INSERT INTO `ce_city` VALUES ('1280', '连云区', '206');
INSERT INTO `ce_city` VALUES ('1281', '新浦区', '206');
INSERT INTO `ce_city` VALUES ('1282', '海州区', '206');
INSERT INTO `ce_city` VALUES ('1283', '赣榆县', '206');
INSERT INTO `ce_city` VALUES ('1284', '东海县', '206');
INSERT INTO `ce_city` VALUES ('1285', '灌云县', '206');
INSERT INTO `ce_city` VALUES ('1286', '灌南县', '206');
INSERT INTO `ce_city` VALUES ('1287', '清河区', '207');
INSERT INTO `ce_city` VALUES ('1288', '楚州区', '207');
INSERT INTO `ce_city` VALUES ('1289', '淮阴区', '207');
INSERT INTO `ce_city` VALUES ('1290', '清浦区', '207');
INSERT INTO `ce_city` VALUES ('1291', '涟水县', '207');
INSERT INTO `ce_city` VALUES ('1292', '洪泽县', '207');
INSERT INTO `ce_city` VALUES ('1293', '盱眙县', '207');
INSERT INTO `ce_city` VALUES ('1294', '金湖县', '207');
INSERT INTO `ce_city` VALUES ('1295', '亭湖区', '208');
INSERT INTO `ce_city` VALUES ('1296', '盐都区', '208');
INSERT INTO `ce_city` VALUES ('1297', '响水县', '208');
INSERT INTO `ce_city` VALUES ('1298', '滨海县', '208');
INSERT INTO `ce_city` VALUES ('1299', '阜宁县', '208');
INSERT INTO `ce_city` VALUES ('1300', '射阳县', '208');
INSERT INTO `ce_city` VALUES ('1301', '建湖县', '208');
INSERT INTO `ce_city` VALUES ('1302', '东台市', '208');
INSERT INTO `ce_city` VALUES ('1303', '大丰市', '208');
INSERT INTO `ce_city` VALUES ('1304', '广陵区', '209');
INSERT INTO `ce_city` VALUES ('1305', '邗江区', '209');
INSERT INTO `ce_city` VALUES ('1306', '维扬区', '209');
INSERT INTO `ce_city` VALUES ('1307', '宝应县', '209');
INSERT INTO `ce_city` VALUES ('1308', '仪征市', '209');
INSERT INTO `ce_city` VALUES ('1309', '高邮市', '209');
INSERT INTO `ce_city` VALUES ('1310', '江都市', '209');
INSERT INTO `ce_city` VALUES ('1311', '京口区', '210');
INSERT INTO `ce_city` VALUES ('1312', '润州区', '210');
INSERT INTO `ce_city` VALUES ('1313', '丹徒区', '210');
INSERT INTO `ce_city` VALUES ('1314', '丹阳市', '210');
INSERT INTO `ce_city` VALUES ('1315', '扬中市', '210');
INSERT INTO `ce_city` VALUES ('1316', '句容市', '210');
INSERT INTO `ce_city` VALUES ('1317', '海陵区', '211');
INSERT INTO `ce_city` VALUES ('1318', '高港区', '211');
INSERT INTO `ce_city` VALUES ('1319', '兴化市', '211');
INSERT INTO `ce_city` VALUES ('1320', '靖江市', '211');
INSERT INTO `ce_city` VALUES ('1321', '泰兴市', '211');
INSERT INTO `ce_city` VALUES ('1322', '姜堰市', '211');
INSERT INTO `ce_city` VALUES ('1323', '宿城区', '212');
INSERT INTO `ce_city` VALUES ('1324', '宿豫区', '212');
INSERT INTO `ce_city` VALUES ('1325', '沭阳县', '212');
INSERT INTO `ce_city` VALUES ('1326', '泗阳县', '212');
INSERT INTO `ce_city` VALUES ('1327', '泗洪县', '212');
INSERT INTO `ce_city` VALUES ('1328', '上城区', '213');
INSERT INTO `ce_city` VALUES ('1329', '下城区', '213');
INSERT INTO `ce_city` VALUES ('1330', '江干区', '213');
INSERT INTO `ce_city` VALUES ('1331', '拱墅区', '213');
INSERT INTO `ce_city` VALUES ('1332', '西湖区', '213');
INSERT INTO `ce_city` VALUES ('1333', '滨江区', '213');
INSERT INTO `ce_city` VALUES ('1334', '萧山区', '213');
INSERT INTO `ce_city` VALUES ('1335', '余杭区', '213');
INSERT INTO `ce_city` VALUES ('1336', '桐庐县', '213');
INSERT INTO `ce_city` VALUES ('1337', '淳安县', '213');
INSERT INTO `ce_city` VALUES ('1338', '建德市', '213');
INSERT INTO `ce_city` VALUES ('1339', '富阳市', '213');
INSERT INTO `ce_city` VALUES ('1340', '临安市', '213');
INSERT INTO `ce_city` VALUES ('1341', '海曙区', '214');
INSERT INTO `ce_city` VALUES ('1342', '江东区', '214');
INSERT INTO `ce_city` VALUES ('1343', '江北区', '214');
INSERT INTO `ce_city` VALUES ('1344', '北仑区', '214');
INSERT INTO `ce_city` VALUES ('1345', '镇海区', '214');
INSERT INTO `ce_city` VALUES ('1346', '鄞州区', '214');
INSERT INTO `ce_city` VALUES ('1347', '象山县', '214');
INSERT INTO `ce_city` VALUES ('1348', '宁海县', '214');
INSERT INTO `ce_city` VALUES ('1349', '余姚市', '214');
INSERT INTO `ce_city` VALUES ('1350', '慈溪市', '214');
INSERT INTO `ce_city` VALUES ('1351', '奉化市', '214');
INSERT INTO `ce_city` VALUES ('1352', '鹿城区', '215');
INSERT INTO `ce_city` VALUES ('1353', '龙湾区', '215');
INSERT INTO `ce_city` VALUES ('1354', '瓯海区', '215');
INSERT INTO `ce_city` VALUES ('1355', '洞头县', '215');
INSERT INTO `ce_city` VALUES ('1356', '永嘉县', '215');
INSERT INTO `ce_city` VALUES ('1357', '平阳县', '215');
INSERT INTO `ce_city` VALUES ('1358', '苍南县', '215');
INSERT INTO `ce_city` VALUES ('1359', '文成县', '215');
INSERT INTO `ce_city` VALUES ('1360', '泰顺县', '215');
INSERT INTO `ce_city` VALUES ('1361', '瑞安市', '215');
INSERT INTO `ce_city` VALUES ('1362', '乐清市', '215');
INSERT INTO `ce_city` VALUES ('1363', '秀城区', '216');
INSERT INTO `ce_city` VALUES ('1364', '秀洲区', '216');
INSERT INTO `ce_city` VALUES ('1365', '嘉善县', '216');
INSERT INTO `ce_city` VALUES ('1366', '海盐县', '216');
INSERT INTO `ce_city` VALUES ('1367', '海宁市', '216');
INSERT INTO `ce_city` VALUES ('1368', '平湖市', '216');
INSERT INTO `ce_city` VALUES ('1369', '桐乡市', '216');
INSERT INTO `ce_city` VALUES ('1370', '吴兴区', '217');
INSERT INTO `ce_city` VALUES ('1371', '南浔区', '217');
INSERT INTO `ce_city` VALUES ('1372', '德清县', '217');
INSERT INTO `ce_city` VALUES ('1373', '长兴县', '217');
INSERT INTO `ce_city` VALUES ('1374', '安吉县', '217');
INSERT INTO `ce_city` VALUES ('1375', '越城区', '218');
INSERT INTO `ce_city` VALUES ('1376', '绍兴县', '218');
INSERT INTO `ce_city` VALUES ('1377', '新昌县', '218');
INSERT INTO `ce_city` VALUES ('1378', '诸暨市', '218');
INSERT INTO `ce_city` VALUES ('1379', '上虞市', '218');
INSERT INTO `ce_city` VALUES ('1380', '嵊州市', '218');
INSERT INTO `ce_city` VALUES ('1381', '婺城区', '219');
INSERT INTO `ce_city` VALUES ('1382', '金东区', '219');
INSERT INTO `ce_city` VALUES ('1383', '武义县', '219');
INSERT INTO `ce_city` VALUES ('1384', '浦江县', '219');
INSERT INTO `ce_city` VALUES ('1385', '磐安县', '219');
INSERT INTO `ce_city` VALUES ('1386', '兰溪市', '219');
INSERT INTO `ce_city` VALUES ('1387', '义乌市', '219');
INSERT INTO `ce_city` VALUES ('1388', '东阳市', '219');
INSERT INTO `ce_city` VALUES ('1389', '永康市', '219');
INSERT INTO `ce_city` VALUES ('1390', '柯城区', '220');
INSERT INTO `ce_city` VALUES ('1391', '衢江区', '220');
INSERT INTO `ce_city` VALUES ('1392', '常山县', '220');
INSERT INTO `ce_city` VALUES ('1393', '开化县', '220');
INSERT INTO `ce_city` VALUES ('1394', '龙游县', '220');
INSERT INTO `ce_city` VALUES ('1395', '江山市', '220');
INSERT INTO `ce_city` VALUES ('1396', '定海区', '221');
INSERT INTO `ce_city` VALUES ('1397', '普陀区', '221');
INSERT INTO `ce_city` VALUES ('1398', '岱山县', '221');
INSERT INTO `ce_city` VALUES ('1399', '嵊泗县', '221');
INSERT INTO `ce_city` VALUES ('1400', '椒江区', '222');
INSERT INTO `ce_city` VALUES ('1401', '黄岩区', '222');
INSERT INTO `ce_city` VALUES ('1402', '路桥区', '222');
INSERT INTO `ce_city` VALUES ('1403', '玉环县', '222');
INSERT INTO `ce_city` VALUES ('1404', '三门县', '222');
INSERT INTO `ce_city` VALUES ('1405', '天台县', '222');
INSERT INTO `ce_city` VALUES ('1406', '仙居县', '222');
INSERT INTO `ce_city` VALUES ('1407', '温岭市', '222');
INSERT INTO `ce_city` VALUES ('1408', '临海市', '222');
INSERT INTO `ce_city` VALUES ('1409', '莲都区', '223');
INSERT INTO `ce_city` VALUES ('1410', '青田县', '223');
INSERT INTO `ce_city` VALUES ('1411', '缙云县', '223');
INSERT INTO `ce_city` VALUES ('1412', '遂昌县', '223');
INSERT INTO `ce_city` VALUES ('1413', '松阳县', '223');
INSERT INTO `ce_city` VALUES ('1414', '云和县', '223');
INSERT INTO `ce_city` VALUES ('1415', '庆元县', '223');
INSERT INTO `ce_city` VALUES ('1416', '景宁畲族自治县', '223');
INSERT INTO `ce_city` VALUES ('1417', '龙泉市', '223');
INSERT INTO `ce_city` VALUES ('1418', '瑶海区', '224');
INSERT INTO `ce_city` VALUES ('1419', '庐阳区', '224');
INSERT INTO `ce_city` VALUES ('1420', '蜀山区', '224');
INSERT INTO `ce_city` VALUES ('1421', '包河区', '224');
INSERT INTO `ce_city` VALUES ('1422', '长丰县', '224');
INSERT INTO `ce_city` VALUES ('1423', '肥东县', '224');
INSERT INTO `ce_city` VALUES ('1424', '肥西县', '224');
INSERT INTO `ce_city` VALUES ('1425', '镜湖区', '225');
INSERT INTO `ce_city` VALUES ('1426', '弋江区', '225');
INSERT INTO `ce_city` VALUES ('1427', '鸠江区', '225');
INSERT INTO `ce_city` VALUES ('1428', '三山区', '225');
INSERT INTO `ce_city` VALUES ('1429', '芜湖县', '225');
INSERT INTO `ce_city` VALUES ('1430', '繁昌县', '225');
INSERT INTO `ce_city` VALUES ('1431', '南陵县', '225');
INSERT INTO `ce_city` VALUES ('1432', '龙子湖区', '226');
INSERT INTO `ce_city` VALUES ('1433', '蚌山区', '226');
INSERT INTO `ce_city` VALUES ('1434', '禹会区', '226');
INSERT INTO `ce_city` VALUES ('1435', '淮上区', '226');
INSERT INTO `ce_city` VALUES ('1436', '怀远县', '226');
INSERT INTO `ce_city` VALUES ('1437', '五河县', '226');
INSERT INTO `ce_city` VALUES ('1438', '固镇县', '226');
INSERT INTO `ce_city` VALUES ('1439', '大通区', '227');
INSERT INTO `ce_city` VALUES ('1440', '田家庵区', '227');
INSERT INTO `ce_city` VALUES ('1441', '谢家集区', '227');
INSERT INTO `ce_city` VALUES ('1442', '八公山区', '227');
INSERT INTO `ce_city` VALUES ('1443', '潘集区', '227');
INSERT INTO `ce_city` VALUES ('1444', '凤台县', '227');
INSERT INTO `ce_city` VALUES ('1445', '金家庄区', '228');
INSERT INTO `ce_city` VALUES ('1446', '花山区', '228');
INSERT INTO `ce_city` VALUES ('1447', '雨山区', '228');
INSERT INTO `ce_city` VALUES ('1448', '当涂县', '228');
INSERT INTO `ce_city` VALUES ('1449', '杜集区', '229');
INSERT INTO `ce_city` VALUES ('1450', '相山区', '229');
INSERT INTO `ce_city` VALUES ('1451', '烈山区', '229');
INSERT INTO `ce_city` VALUES ('1452', '濉溪县', '229');
INSERT INTO `ce_city` VALUES ('1453', '铜官山区', '230');
INSERT INTO `ce_city` VALUES ('1454', '狮子山区', '230');
INSERT INTO `ce_city` VALUES ('1455', '郊区', '230');
INSERT INTO `ce_city` VALUES ('1456', '铜陵县', '230');
INSERT INTO `ce_city` VALUES ('1457', '迎江区', '231');
INSERT INTO `ce_city` VALUES ('1458', '大观区', '231');
INSERT INTO `ce_city` VALUES ('1459', '宜秀区', '231');
INSERT INTO `ce_city` VALUES ('1460', '怀宁县', '231');
INSERT INTO `ce_city` VALUES ('1461', '枞阳县', '231');
INSERT INTO `ce_city` VALUES ('1462', '潜山县', '231');
INSERT INTO `ce_city` VALUES ('1463', '太湖县', '231');
INSERT INTO `ce_city` VALUES ('1464', '宿松县', '231');
INSERT INTO `ce_city` VALUES ('1465', '望江县', '231');
INSERT INTO `ce_city` VALUES ('1466', '岳西县', '231');
INSERT INTO `ce_city` VALUES ('1467', '桐城市', '231');
INSERT INTO `ce_city` VALUES ('1468', '屯溪区', '232');
INSERT INTO `ce_city` VALUES ('1469', '黄山区', '232');
INSERT INTO `ce_city` VALUES ('1470', '徽州区', '232');
INSERT INTO `ce_city` VALUES ('1471', '歙县', '232');
INSERT INTO `ce_city` VALUES ('1472', '休宁县', '232');
INSERT INTO `ce_city` VALUES ('1473', '黟县', '232');
INSERT INTO `ce_city` VALUES ('1474', '祁门县', '232');
INSERT INTO `ce_city` VALUES ('1475', '琅琊区', '233');
INSERT INTO `ce_city` VALUES ('1476', '南谯区', '233');
INSERT INTO `ce_city` VALUES ('1477', '来安县', '233');
INSERT INTO `ce_city` VALUES ('1478', '全椒县', '233');
INSERT INTO `ce_city` VALUES ('1479', '定远县', '233');
INSERT INTO `ce_city` VALUES ('1480', '凤阳县', '233');
INSERT INTO `ce_city` VALUES ('1481', '天长市', '233');
INSERT INTO `ce_city` VALUES ('1482', '明光市', '233');
INSERT INTO `ce_city` VALUES ('1483', '颍州区', '234');
INSERT INTO `ce_city` VALUES ('1484', '颍东区', '234');
INSERT INTO `ce_city` VALUES ('1485', '颍泉区', '234');
INSERT INTO `ce_city` VALUES ('1486', '临泉县', '234');
INSERT INTO `ce_city` VALUES ('1487', '太和县', '234');
INSERT INTO `ce_city` VALUES ('1488', '阜南县', '234');
INSERT INTO `ce_city` VALUES ('1489', '颍上县', '234');
INSERT INTO `ce_city` VALUES ('1490', '界首市', '234');
INSERT INTO `ce_city` VALUES ('1491', '埇桥区', '235');
INSERT INTO `ce_city` VALUES ('1492', '砀山县', '235');
INSERT INTO `ce_city` VALUES ('1493', '萧县', '235');
INSERT INTO `ce_city` VALUES ('1494', '灵璧县', '235');
INSERT INTO `ce_city` VALUES ('1495', '泗县', '235');
INSERT INTO `ce_city` VALUES ('1496', '居巢区', '236');
INSERT INTO `ce_city` VALUES ('1497', '庐江县', '236');
INSERT INTO `ce_city` VALUES ('1498', '无为县', '236');
INSERT INTO `ce_city` VALUES ('1499', '含山县', '236');
INSERT INTO `ce_city` VALUES ('1500', '和县', '236');
INSERT INTO `ce_city` VALUES ('1501', '金安区', '237');
INSERT INTO `ce_city` VALUES ('1502', '裕安区', '237');
INSERT INTO `ce_city` VALUES ('1503', '寿县', '237');
INSERT INTO `ce_city` VALUES ('1504', '霍邱县', '237');
INSERT INTO `ce_city` VALUES ('1505', '舒城县', '237');
INSERT INTO `ce_city` VALUES ('1506', '金寨县', '237');
INSERT INTO `ce_city` VALUES ('1507', '霍山县', '237');
INSERT INTO `ce_city` VALUES ('1508', '谯城区', '238');
INSERT INTO `ce_city` VALUES ('1509', '涡阳县', '238');
INSERT INTO `ce_city` VALUES ('1510', '蒙城县', '238');
INSERT INTO `ce_city` VALUES ('1511', '利辛县', '238');
INSERT INTO `ce_city` VALUES ('1512', '贵池区', '239');
INSERT INTO `ce_city` VALUES ('1513', '东至县', '239');
INSERT INTO `ce_city` VALUES ('1514', '石台县', '239');
INSERT INTO `ce_city` VALUES ('1515', '青阳县', '239');
INSERT INTO `ce_city` VALUES ('1516', '宣州区', '240');
INSERT INTO `ce_city` VALUES ('1517', '郎溪县', '240');
INSERT INTO `ce_city` VALUES ('1518', '广德县', '240');
INSERT INTO `ce_city` VALUES ('1519', '泾县', '240');
INSERT INTO `ce_city` VALUES ('1520', '绩溪县', '240');
INSERT INTO `ce_city` VALUES ('1521', '旌德县', '240');
INSERT INTO `ce_city` VALUES ('1522', '宁国市', '240');
INSERT INTO `ce_city` VALUES ('1523', '鼓楼区', '241');
INSERT INTO `ce_city` VALUES ('1524', '台江区', '241');
INSERT INTO `ce_city` VALUES ('1525', '仓山区', '241');
INSERT INTO `ce_city` VALUES ('1526', '马尾区', '241');
INSERT INTO `ce_city` VALUES ('1527', '晋安区', '241');
INSERT INTO `ce_city` VALUES ('1528', '闽侯县', '241');
INSERT INTO `ce_city` VALUES ('1529', '连江县', '241');
INSERT INTO `ce_city` VALUES ('1530', '罗源县', '241');
INSERT INTO `ce_city` VALUES ('1531', '闽清县', '241');
INSERT INTO `ce_city` VALUES ('1532', '永泰县', '241');
INSERT INTO `ce_city` VALUES ('1533', '平潭县', '241');
INSERT INTO `ce_city` VALUES ('1534', '福清市', '241');
INSERT INTO `ce_city` VALUES ('1535', '长乐市', '241');
INSERT INTO `ce_city` VALUES ('1536', '思明区', '242');
INSERT INTO `ce_city` VALUES ('1537', '海沧区', '242');
INSERT INTO `ce_city` VALUES ('1538', '湖里区', '242');
INSERT INTO `ce_city` VALUES ('1539', '集美区', '242');
INSERT INTO `ce_city` VALUES ('1540', '同安区', '242');
INSERT INTO `ce_city` VALUES ('1541', '翔安区', '242');
INSERT INTO `ce_city` VALUES ('1542', '城厢区', '243');
INSERT INTO `ce_city` VALUES ('1543', '涵江区', '243');
INSERT INTO `ce_city` VALUES ('1544', '荔城区', '243');
INSERT INTO `ce_city` VALUES ('1545', '秀屿区', '243');
INSERT INTO `ce_city` VALUES ('1546', '仙游县', '243');
INSERT INTO `ce_city` VALUES ('1547', '梅列区', '244');
INSERT INTO `ce_city` VALUES ('1548', '三元区', '244');
INSERT INTO `ce_city` VALUES ('1549', '明溪县', '244');
INSERT INTO `ce_city` VALUES ('1550', '清流县', '244');
INSERT INTO `ce_city` VALUES ('1551', '宁化县', '244');
INSERT INTO `ce_city` VALUES ('1552', '大田县', '244');
INSERT INTO `ce_city` VALUES ('1553', '尤溪县', '244');
INSERT INTO `ce_city` VALUES ('1554', '沙县', '244');
INSERT INTO `ce_city` VALUES ('1555', '将乐县', '244');
INSERT INTO `ce_city` VALUES ('1556', '泰宁县', '244');
INSERT INTO `ce_city` VALUES ('1557', '建宁县', '244');
INSERT INTO `ce_city` VALUES ('1558', '永安市', '244');
INSERT INTO `ce_city` VALUES ('1559', '鲤城区', '245');
INSERT INTO `ce_city` VALUES ('1560', '丰泽区', '245');
INSERT INTO `ce_city` VALUES ('1561', '洛江区', '245');
INSERT INTO `ce_city` VALUES ('1562', '泉港区', '245');
INSERT INTO `ce_city` VALUES ('1563', '惠安县', '245');
INSERT INTO `ce_city` VALUES ('1564', '安溪县', '245');
INSERT INTO `ce_city` VALUES ('1565', '永春县', '245');
INSERT INTO `ce_city` VALUES ('1566', '德化县', '245');
INSERT INTO `ce_city` VALUES ('1567', '金门县', '245');
INSERT INTO `ce_city` VALUES ('1568', '石狮市', '245');
INSERT INTO `ce_city` VALUES ('1569', '晋江市', '245');
INSERT INTO `ce_city` VALUES ('1570', '南安市', '245');
INSERT INTO `ce_city` VALUES ('1571', '芗城区', '246');
INSERT INTO `ce_city` VALUES ('1572', '龙文区', '246');
INSERT INTO `ce_city` VALUES ('1573', '云霄县', '246');
INSERT INTO `ce_city` VALUES ('1574', '漳浦县', '246');
INSERT INTO `ce_city` VALUES ('1575', '诏安县', '246');
INSERT INTO `ce_city` VALUES ('1576', '长泰县', '246');
INSERT INTO `ce_city` VALUES ('1577', '东山县', '246');
INSERT INTO `ce_city` VALUES ('1578', '南靖县', '246');
INSERT INTO `ce_city` VALUES ('1579', '平和县', '246');
INSERT INTO `ce_city` VALUES ('1580', '华安县', '246');
INSERT INTO `ce_city` VALUES ('1581', '龙海市', '246');
INSERT INTO `ce_city` VALUES ('1582', '延平区', '247');
INSERT INTO `ce_city` VALUES ('1583', '顺昌县', '247');
INSERT INTO `ce_city` VALUES ('1584', '浦城县', '247');
INSERT INTO `ce_city` VALUES ('1585', '光泽县', '247');
INSERT INTO `ce_city` VALUES ('1586', '松溪县', '247');
INSERT INTO `ce_city` VALUES ('1587', '政和县', '247');
INSERT INTO `ce_city` VALUES ('1588', '邵武市', '247');
INSERT INTO `ce_city` VALUES ('1589', '武夷山市', '247');
INSERT INTO `ce_city` VALUES ('1590', '建瓯市', '247');
INSERT INTO `ce_city` VALUES ('1591', '建阳市', '247');
INSERT INTO `ce_city` VALUES ('1592', '新罗区', '248');
INSERT INTO `ce_city` VALUES ('1593', '长汀县', '248');
INSERT INTO `ce_city` VALUES ('1594', '永定县', '248');
INSERT INTO `ce_city` VALUES ('1595', '上杭县', '248');
INSERT INTO `ce_city` VALUES ('1596', '武平县', '248');
INSERT INTO `ce_city` VALUES ('1597', '连城县', '248');
INSERT INTO `ce_city` VALUES ('1598', '漳平市', '248');
INSERT INTO `ce_city` VALUES ('1599', '蕉城区', '249');
INSERT INTO `ce_city` VALUES ('1600', '霞浦县', '249');
INSERT INTO `ce_city` VALUES ('1601', '古田县', '249');
INSERT INTO `ce_city` VALUES ('1602', '屏南县', '249');
INSERT INTO `ce_city` VALUES ('1603', '寿宁县', '249');
INSERT INTO `ce_city` VALUES ('1604', '周宁县', '249');
INSERT INTO `ce_city` VALUES ('1605', '柘荣县', '249');
INSERT INTO `ce_city` VALUES ('1606', '福安市', '249');
INSERT INTO `ce_city` VALUES ('1607', '福鼎市', '249');
INSERT INTO `ce_city` VALUES ('1608', '东湖区', '250');
INSERT INTO `ce_city` VALUES ('1609', '西湖区', '250');
INSERT INTO `ce_city` VALUES ('1610', '青云谱区', '250');
INSERT INTO `ce_city` VALUES ('1611', '湾里区', '250');
INSERT INTO `ce_city` VALUES ('1612', '青山湖区', '250');
INSERT INTO `ce_city` VALUES ('1613', '南昌县', '250');
INSERT INTO `ce_city` VALUES ('1614', '新建县', '250');
INSERT INTO `ce_city` VALUES ('1615', '安义县', '250');
INSERT INTO `ce_city` VALUES ('1616', '进贤县', '250');
INSERT INTO `ce_city` VALUES ('1617', '昌江区', '251');
INSERT INTO `ce_city` VALUES ('1618', '珠山区', '251');
INSERT INTO `ce_city` VALUES ('1619', '浮梁县', '251');
INSERT INTO `ce_city` VALUES ('1620', '乐平市', '251');
INSERT INTO `ce_city` VALUES ('1621', '安源区', '252');
INSERT INTO `ce_city` VALUES ('1622', '湘东区', '252');
INSERT INTO `ce_city` VALUES ('1623', '莲花县', '252');
INSERT INTO `ce_city` VALUES ('1624', '上栗县', '252');
INSERT INTO `ce_city` VALUES ('1625', '芦溪县', '252');
INSERT INTO `ce_city` VALUES ('1626', '庐山区', '253');
INSERT INTO `ce_city` VALUES ('1627', '浔阳区', '253');
INSERT INTO `ce_city` VALUES ('1628', '九江县', '253');
INSERT INTO `ce_city` VALUES ('1629', '武宁县', '253');
INSERT INTO `ce_city` VALUES ('1630', '修水县', '253');
INSERT INTO `ce_city` VALUES ('1631', '永修县', '253');
INSERT INTO `ce_city` VALUES ('1632', '德安县', '253');
INSERT INTO `ce_city` VALUES ('1633', '星子县', '253');
INSERT INTO `ce_city` VALUES ('1634', '都昌县', '253');
INSERT INTO `ce_city` VALUES ('1635', '湖口县', '253');
INSERT INTO `ce_city` VALUES ('1636', '彭泽县', '253');
INSERT INTO `ce_city` VALUES ('1637', '瑞昌市', '253');
INSERT INTO `ce_city` VALUES ('1638', '渝水区', '254');
INSERT INTO `ce_city` VALUES ('1639', '分宜县', '254');
INSERT INTO `ce_city` VALUES ('1640', '月湖区', '255');
INSERT INTO `ce_city` VALUES ('1641', '余江县', '255');
INSERT INTO `ce_city` VALUES ('1642', '贵溪市', '255');
INSERT INTO `ce_city` VALUES ('1643', '章贡区', '256');
INSERT INTO `ce_city` VALUES ('1644', '赣县', '256');
INSERT INTO `ce_city` VALUES ('1645', '信丰县', '256');
INSERT INTO `ce_city` VALUES ('1646', '大余县', '256');
INSERT INTO `ce_city` VALUES ('1647', '上犹县', '256');
INSERT INTO `ce_city` VALUES ('1648', '崇义县', '256');
INSERT INTO `ce_city` VALUES ('1649', '安远县', '256');
INSERT INTO `ce_city` VALUES ('1650', '龙南县', '256');
INSERT INTO `ce_city` VALUES ('1651', '定南县', '256');
INSERT INTO `ce_city` VALUES ('1652', '全南县', '256');
INSERT INTO `ce_city` VALUES ('1653', '宁都县', '256');
INSERT INTO `ce_city` VALUES ('1654', '于都县', '256');
INSERT INTO `ce_city` VALUES ('1655', '兴国县', '256');
INSERT INTO `ce_city` VALUES ('1656', '会昌县', '256');
INSERT INTO `ce_city` VALUES ('1657', '寻乌县', '256');
INSERT INTO `ce_city` VALUES ('1658', '石城县', '256');
INSERT INTO `ce_city` VALUES ('1659', '瑞金市', '256');
INSERT INTO `ce_city` VALUES ('1660', '南康市', '256');
INSERT INTO `ce_city` VALUES ('1661', '吉州区', '257');
INSERT INTO `ce_city` VALUES ('1662', '青原区', '257');
INSERT INTO `ce_city` VALUES ('1663', '吉安县', '257');
INSERT INTO `ce_city` VALUES ('1664', '吉水县', '257');
INSERT INTO `ce_city` VALUES ('1665', '峡江县', '257');
INSERT INTO `ce_city` VALUES ('1666', '新干县', '257');
INSERT INTO `ce_city` VALUES ('1667', '永丰县', '257');
INSERT INTO `ce_city` VALUES ('1668', '泰和县', '257');
INSERT INTO `ce_city` VALUES ('1669', '遂川县', '257');
INSERT INTO `ce_city` VALUES ('1670', '万安县', '257');
INSERT INTO `ce_city` VALUES ('1671', '安福县', '257');
INSERT INTO `ce_city` VALUES ('1672', '永新县', '257');
INSERT INTO `ce_city` VALUES ('1673', '井冈山市', '257');
INSERT INTO `ce_city` VALUES ('1674', '袁州区', '258');
INSERT INTO `ce_city` VALUES ('1675', '奉新县', '258');
INSERT INTO `ce_city` VALUES ('1676', '万载县', '258');
INSERT INTO `ce_city` VALUES ('1677', '上高县', '258');
INSERT INTO `ce_city` VALUES ('1678', '宜丰县', '258');
INSERT INTO `ce_city` VALUES ('1679', '靖安县', '258');
INSERT INTO `ce_city` VALUES ('1680', '铜鼓县', '258');
INSERT INTO `ce_city` VALUES ('1681', '丰城市', '258');
INSERT INTO `ce_city` VALUES ('1682', '樟树市', '258');
INSERT INTO `ce_city` VALUES ('1683', '高安市', '258');
INSERT INTO `ce_city` VALUES ('1684', '临川区', '259');
INSERT INTO `ce_city` VALUES ('1685', '南城县', '259');
INSERT INTO `ce_city` VALUES ('1686', '黎川县', '259');
INSERT INTO `ce_city` VALUES ('1687', '南丰县', '259');
INSERT INTO `ce_city` VALUES ('1688', '崇仁县', '259');
INSERT INTO `ce_city` VALUES ('1689', '乐安县', '259');
INSERT INTO `ce_city` VALUES ('1690', '宜黄县', '259');
INSERT INTO `ce_city` VALUES ('1691', '金溪县', '259');
INSERT INTO `ce_city` VALUES ('1692', '资溪县', '259');
INSERT INTO `ce_city` VALUES ('1693', '东乡县', '259');
INSERT INTO `ce_city` VALUES ('1694', '广昌县', '259');
INSERT INTO `ce_city` VALUES ('1695', '信州区', '260');
INSERT INTO `ce_city` VALUES ('1696', '上饶县', '260');
INSERT INTO `ce_city` VALUES ('1697', '广丰县', '260');
INSERT INTO `ce_city` VALUES ('1698', '玉山县', '260');
INSERT INTO `ce_city` VALUES ('1699', '铅山县', '260');
INSERT INTO `ce_city` VALUES ('1700', '横峰县', '260');
INSERT INTO `ce_city` VALUES ('1701', '弋阳县', '260');
INSERT INTO `ce_city` VALUES ('1702', '余干县', '260');
INSERT INTO `ce_city` VALUES ('1703', '鄱阳县', '260');
INSERT INTO `ce_city` VALUES ('1704', '万年县', '260');
INSERT INTO `ce_city` VALUES ('1705', '婺源县', '260');
INSERT INTO `ce_city` VALUES ('1706', '德兴市', '260');
INSERT INTO `ce_city` VALUES ('1707', '历下区', '261');
INSERT INTO `ce_city` VALUES ('1708', '市中区', '261');
INSERT INTO `ce_city` VALUES ('1709', '槐荫区', '261');
INSERT INTO `ce_city` VALUES ('1710', '天桥区', '261');
INSERT INTO `ce_city` VALUES ('1711', '历城区', '261');
INSERT INTO `ce_city` VALUES ('1712', '长清区', '261');
INSERT INTO `ce_city` VALUES ('1713', '平阴县', '261');
INSERT INTO `ce_city` VALUES ('1714', '济阳县', '261');
INSERT INTO `ce_city` VALUES ('1715', '商河县', '261');
INSERT INTO `ce_city` VALUES ('1716', '章丘市', '261');
INSERT INTO `ce_city` VALUES ('1717', '市南区', '262');
INSERT INTO `ce_city` VALUES ('1718', '市北区', '262');
INSERT INTO `ce_city` VALUES ('1719', '四方区', '262');
INSERT INTO `ce_city` VALUES ('1720', '黄岛区', '262');
INSERT INTO `ce_city` VALUES ('1721', '崂山区', '262');
INSERT INTO `ce_city` VALUES ('1722', '李沧区', '262');
INSERT INTO `ce_city` VALUES ('1723', '城阳区', '262');
INSERT INTO `ce_city` VALUES ('1724', '胶州市', '262');
INSERT INTO `ce_city` VALUES ('1725', '即墨市', '262');
INSERT INTO `ce_city` VALUES ('1726', '平度市', '262');
INSERT INTO `ce_city` VALUES ('1727', '胶南市', '262');
INSERT INTO `ce_city` VALUES ('1728', '莱西市', '262');
INSERT INTO `ce_city` VALUES ('1729', '淄川区', '263');
INSERT INTO `ce_city` VALUES ('1730', '张店区', '263');
INSERT INTO `ce_city` VALUES ('1731', '博山区', '263');
INSERT INTO `ce_city` VALUES ('1732', '临淄区', '263');
INSERT INTO `ce_city` VALUES ('1733', '周村区', '263');
INSERT INTO `ce_city` VALUES ('1734', '桓台县', '263');
INSERT INTO `ce_city` VALUES ('1735', '高青县', '263');
INSERT INTO `ce_city` VALUES ('1736', '沂源县', '263');
INSERT INTO `ce_city` VALUES ('1737', '市中区', '264');
INSERT INTO `ce_city` VALUES ('1738', '薛城区', '264');
INSERT INTO `ce_city` VALUES ('1739', '峄城区', '264');
INSERT INTO `ce_city` VALUES ('1740', '台儿庄区', '264');
INSERT INTO `ce_city` VALUES ('1741', '山亭区', '264');
INSERT INTO `ce_city` VALUES ('1742', '滕州市', '264');
INSERT INTO `ce_city` VALUES ('1743', '东营区', '265');
INSERT INTO `ce_city` VALUES ('1744', '河口区', '265');
INSERT INTO `ce_city` VALUES ('1745', '垦利县', '265');
INSERT INTO `ce_city` VALUES ('1746', '利津县', '265');
INSERT INTO `ce_city` VALUES ('1747', '广饶县', '265');
INSERT INTO `ce_city` VALUES ('1748', '芝罘区', '266');
INSERT INTO `ce_city` VALUES ('1749', '福山区', '266');
INSERT INTO `ce_city` VALUES ('1750', '牟平区', '266');
INSERT INTO `ce_city` VALUES ('1751', '莱山区', '266');
INSERT INTO `ce_city` VALUES ('1752', '长岛县', '266');
INSERT INTO `ce_city` VALUES ('1753', '龙口市', '266');
INSERT INTO `ce_city` VALUES ('1754', '莱阳市', '266');
INSERT INTO `ce_city` VALUES ('1755', '莱州市', '266');
INSERT INTO `ce_city` VALUES ('1756', '蓬莱市', '266');
INSERT INTO `ce_city` VALUES ('1757', '招远市', '266');
INSERT INTO `ce_city` VALUES ('1758', '栖霞市', '266');
INSERT INTO `ce_city` VALUES ('1759', '海阳市', '266');
INSERT INTO `ce_city` VALUES ('1760', '潍城区', '267');
INSERT INTO `ce_city` VALUES ('1761', '寒亭区', '267');
INSERT INTO `ce_city` VALUES ('1762', '坊子区', '267');
INSERT INTO `ce_city` VALUES ('1763', '奎文区', '267');
INSERT INTO `ce_city` VALUES ('1764', '临朐县', '267');
INSERT INTO `ce_city` VALUES ('1765', '昌乐县', '267');
INSERT INTO `ce_city` VALUES ('1766', '青州市', '267');
INSERT INTO `ce_city` VALUES ('1767', '诸城市', '267');
INSERT INTO `ce_city` VALUES ('1768', '寿光市', '267');
INSERT INTO `ce_city` VALUES ('1769', '安丘市', '267');
INSERT INTO `ce_city` VALUES ('1770', '高密市', '267');
INSERT INTO `ce_city` VALUES ('1771', '昌邑市', '267');
INSERT INTO `ce_city` VALUES ('1772', '市中区', '268');
INSERT INTO `ce_city` VALUES ('1773', '任城区', '268');
INSERT INTO `ce_city` VALUES ('1774', '微山县', '268');
INSERT INTO `ce_city` VALUES ('1775', '鱼台县', '268');
INSERT INTO `ce_city` VALUES ('1776', '金乡县', '268');
INSERT INTO `ce_city` VALUES ('1777', '嘉祥县', '268');
INSERT INTO `ce_city` VALUES ('1778', '汶上县', '268');
INSERT INTO `ce_city` VALUES ('1779', '泗水县', '268');
INSERT INTO `ce_city` VALUES ('1780', '梁山县', '268');
INSERT INTO `ce_city` VALUES ('1781', '曲阜市', '268');
INSERT INTO `ce_city` VALUES ('1782', '兖州市', '268');
INSERT INTO `ce_city` VALUES ('1783', '邹城市', '268');
INSERT INTO `ce_city` VALUES ('1784', '泰山区', '269');
INSERT INTO `ce_city` VALUES ('1785', '岱岳区', '269');
INSERT INTO `ce_city` VALUES ('1786', '宁阳县', '269');
INSERT INTO `ce_city` VALUES ('1787', '东平县', '269');
INSERT INTO `ce_city` VALUES ('1788', '新泰市', '269');
INSERT INTO `ce_city` VALUES ('1789', '肥城市', '269');
INSERT INTO `ce_city` VALUES ('1790', '环翠区', '270');
INSERT INTO `ce_city` VALUES ('1791', '文登市', '270');
INSERT INTO `ce_city` VALUES ('1792', '荣成市', '270');
INSERT INTO `ce_city` VALUES ('1793', '乳山市', '270');
INSERT INTO `ce_city` VALUES ('1794', '东港区', '271');
INSERT INTO `ce_city` VALUES ('1795', '岚山区', '271');
INSERT INTO `ce_city` VALUES ('1796', '五莲县', '271');
INSERT INTO `ce_city` VALUES ('1797', '莒县', '271');
INSERT INTO `ce_city` VALUES ('1798', '莱城区', '272');
INSERT INTO `ce_city` VALUES ('1799', '钢城区', '272');
INSERT INTO `ce_city` VALUES ('1800', '兰山区', '273');
INSERT INTO `ce_city` VALUES ('1801', '罗庄区', '273');
INSERT INTO `ce_city` VALUES ('1802', '河东区', '273');
INSERT INTO `ce_city` VALUES ('1803', '沂南县', '273');
INSERT INTO `ce_city` VALUES ('1804', '郯城县', '273');
INSERT INTO `ce_city` VALUES ('1805', '沂水县', '273');
INSERT INTO `ce_city` VALUES ('1806', '苍山县', '273');
INSERT INTO `ce_city` VALUES ('1807', '费县', '273');
INSERT INTO `ce_city` VALUES ('1808', '平邑县', '273');
INSERT INTO `ce_city` VALUES ('1809', '莒南县', '273');
INSERT INTO `ce_city` VALUES ('1810', '蒙阴县', '273');
INSERT INTO `ce_city` VALUES ('1811', '临沭县', '273');
INSERT INTO `ce_city` VALUES ('1812', '德城区', '274');
INSERT INTO `ce_city` VALUES ('1813', '陵县', '274');
INSERT INTO `ce_city` VALUES ('1814', '宁津县', '274');
INSERT INTO `ce_city` VALUES ('1815', '庆云县', '274');
INSERT INTO `ce_city` VALUES ('1816', '临邑县', '274');
INSERT INTO `ce_city` VALUES ('1817', '齐河县', '274');
INSERT INTO `ce_city` VALUES ('1818', '平原县', '274');
INSERT INTO `ce_city` VALUES ('1819', '夏津县', '274');
INSERT INTO `ce_city` VALUES ('1820', '武城县', '274');
INSERT INTO `ce_city` VALUES ('1821', '乐陵市', '274');
INSERT INTO `ce_city` VALUES ('1822', '禹城市', '274');
INSERT INTO `ce_city` VALUES ('1823', '东昌府区', '275');
INSERT INTO `ce_city` VALUES ('1824', '阳谷县', '275');
INSERT INTO `ce_city` VALUES ('1825', '莘县', '275');
INSERT INTO `ce_city` VALUES ('1826', '茌平县', '275');
INSERT INTO `ce_city` VALUES ('1827', '东阿县', '275');
INSERT INTO `ce_city` VALUES ('1828', '冠县', '275');
INSERT INTO `ce_city` VALUES ('1829', '高唐县', '275');
INSERT INTO `ce_city` VALUES ('1830', '临清市', '275');
INSERT INTO `ce_city` VALUES ('1831', '滨城区', '276');
INSERT INTO `ce_city` VALUES ('1832', '惠民县', '276');
INSERT INTO `ce_city` VALUES ('1833', '阳信县', '276');
INSERT INTO `ce_city` VALUES ('1834', '无棣县', '276');
INSERT INTO `ce_city` VALUES ('1835', '沾化县', '276');
INSERT INTO `ce_city` VALUES ('1836', '博兴县', '276');
INSERT INTO `ce_city` VALUES ('1837', '邹平县', '276');
INSERT INTO `ce_city` VALUES ('1838', '牡丹区', '277');
INSERT INTO `ce_city` VALUES ('1839', '曹县', '277');
INSERT INTO `ce_city` VALUES ('1840', '单县', '277');
INSERT INTO `ce_city` VALUES ('1841', '成武县', '277');
INSERT INTO `ce_city` VALUES ('1842', '巨野县', '277');
INSERT INTO `ce_city` VALUES ('1843', '郓城县', '277');
INSERT INTO `ce_city` VALUES ('1844', '鄄城县', '277');
INSERT INTO `ce_city` VALUES ('1845', '定陶县', '277');
INSERT INTO `ce_city` VALUES ('1846', '东明县', '277');
INSERT INTO `ce_city` VALUES ('1847', '中原区', '278');
INSERT INTO `ce_city` VALUES ('1848', '二七区', '278');
INSERT INTO `ce_city` VALUES ('1849', '管城回族区', '278');
INSERT INTO `ce_city` VALUES ('1850', '金水区', '278');
INSERT INTO `ce_city` VALUES ('1851', '上街区', '278');
INSERT INTO `ce_city` VALUES ('1852', '惠济区', '278');
INSERT INTO `ce_city` VALUES ('1853', '中牟县', '278');
INSERT INTO `ce_city` VALUES ('1854', '巩义市', '278');
INSERT INTO `ce_city` VALUES ('1855', '荥阳市', '278');
INSERT INTO `ce_city` VALUES ('1856', '新密市', '278');
INSERT INTO `ce_city` VALUES ('1857', '新郑市', '278');
INSERT INTO `ce_city` VALUES ('1858', '登封市', '278');
INSERT INTO `ce_city` VALUES ('1859', '龙亭区', '279');
INSERT INTO `ce_city` VALUES ('1860', '顺河回族区', '279');
INSERT INTO `ce_city` VALUES ('1861', '鼓楼区', '279');
INSERT INTO `ce_city` VALUES ('1862', '禹王台区', '279');
INSERT INTO `ce_city` VALUES ('1863', '金明区', '279');
INSERT INTO `ce_city` VALUES ('1864', '杞县', '279');
INSERT INTO `ce_city` VALUES ('1865', '通许县', '279');
INSERT INTO `ce_city` VALUES ('1866', '尉氏县', '279');
INSERT INTO `ce_city` VALUES ('1867', '开封县', '279');
INSERT INTO `ce_city` VALUES ('1868', '兰考县', '279');
INSERT INTO `ce_city` VALUES ('1869', '老城区', '280');
INSERT INTO `ce_city` VALUES ('1870', '西工区', '280');
INSERT INTO `ce_city` VALUES ('1871', '廛河回族区', '280');
INSERT INTO `ce_city` VALUES ('1872', '涧西区', '280');
INSERT INTO `ce_city` VALUES ('1873', '吉利区', '280');
INSERT INTO `ce_city` VALUES ('1874', '洛龙区', '280');
INSERT INTO `ce_city` VALUES ('1875', '孟津县', '280');
INSERT INTO `ce_city` VALUES ('1876', '新安县', '280');
INSERT INTO `ce_city` VALUES ('1877', '栾川县', '280');
INSERT INTO `ce_city` VALUES ('1878', '嵩县', '280');
INSERT INTO `ce_city` VALUES ('1879', '汝阳县', '280');
INSERT INTO `ce_city` VALUES ('1880', '宜阳县', '280');
INSERT INTO `ce_city` VALUES ('1881', '洛宁县', '280');
INSERT INTO `ce_city` VALUES ('1882', '伊川县', '280');
INSERT INTO `ce_city` VALUES ('1883', '偃师市', '280');
INSERT INTO `ce_city` VALUES ('1884', '新华区', '281');
INSERT INTO `ce_city` VALUES ('1885', '卫东区', '281');
INSERT INTO `ce_city` VALUES ('1886', '石龙区', '281');
INSERT INTO `ce_city` VALUES ('1887', '湛河区', '281');
INSERT INTO `ce_city` VALUES ('1888', '宝丰县', '281');
INSERT INTO `ce_city` VALUES ('1889', '叶县', '281');
INSERT INTO `ce_city` VALUES ('1890', '鲁山县', '281');
INSERT INTO `ce_city` VALUES ('1891', '郏县', '281');
INSERT INTO `ce_city` VALUES ('1892', '舞钢市', '281');
INSERT INTO `ce_city` VALUES ('1893', '汝州市', '281');
INSERT INTO `ce_city` VALUES ('1894', '文峰区', '282');
INSERT INTO `ce_city` VALUES ('1895', '北关区', '282');
INSERT INTO `ce_city` VALUES ('1896', '殷都区', '282');
INSERT INTO `ce_city` VALUES ('1897', '龙安区', '282');
INSERT INTO `ce_city` VALUES ('1898', '安阳县', '282');
INSERT INTO `ce_city` VALUES ('1899', '汤阴县', '282');
INSERT INTO `ce_city` VALUES ('1900', '滑县', '282');
INSERT INTO `ce_city` VALUES ('1901', '内黄县', '282');
INSERT INTO `ce_city` VALUES ('1902', '林州市', '282');
INSERT INTO `ce_city` VALUES ('1903', '鹤山区', '283');
INSERT INTO `ce_city` VALUES ('1904', '山城区', '283');
INSERT INTO `ce_city` VALUES ('1905', '淇滨区', '283');
INSERT INTO `ce_city` VALUES ('1906', '浚县', '283');
INSERT INTO `ce_city` VALUES ('1907', '淇县', '283');
INSERT INTO `ce_city` VALUES ('1908', '红旗区', '284');
INSERT INTO `ce_city` VALUES ('1909', '卫滨区', '284');
INSERT INTO `ce_city` VALUES ('1910', '凤泉区', '284');
INSERT INTO `ce_city` VALUES ('1911', '牧野区', '284');
INSERT INTO `ce_city` VALUES ('1912', '新乡县', '284');
INSERT INTO `ce_city` VALUES ('1913', '获嘉县', '284');
INSERT INTO `ce_city` VALUES ('1914', '原阳县', '284');
INSERT INTO `ce_city` VALUES ('1915', '延津县', '284');
INSERT INTO `ce_city` VALUES ('1916', '封丘县', '284');
INSERT INTO `ce_city` VALUES ('1917', '长垣县', '284');
INSERT INTO `ce_city` VALUES ('1918', '卫辉市', '284');
INSERT INTO `ce_city` VALUES ('1919', '辉县市', '284');
INSERT INTO `ce_city` VALUES ('1920', '解放区', '285');
INSERT INTO `ce_city` VALUES ('1921', '中站区', '285');
INSERT INTO `ce_city` VALUES ('1922', '马村区', '285');
INSERT INTO `ce_city` VALUES ('1923', '山阳区', '285');
INSERT INTO `ce_city` VALUES ('1924', '修武县', '285');
INSERT INTO `ce_city` VALUES ('1925', '博爱县', '285');
INSERT INTO `ce_city` VALUES ('1926', '武陟县', '285');
INSERT INTO `ce_city` VALUES ('1927', '温县', '285');
INSERT INTO `ce_city` VALUES ('1928', '济源市', '285');
INSERT INTO `ce_city` VALUES ('1929', '沁阳市', '285');
INSERT INTO `ce_city` VALUES ('1930', '孟州市', '285');
INSERT INTO `ce_city` VALUES ('1931', '华龙区', '286');
INSERT INTO `ce_city` VALUES ('1932', '清丰县', '286');
INSERT INTO `ce_city` VALUES ('1933', '南乐县', '286');
INSERT INTO `ce_city` VALUES ('1934', '范县', '286');
INSERT INTO `ce_city` VALUES ('1935', '台前县', '286');
INSERT INTO `ce_city` VALUES ('1936', '濮阳县', '286');
INSERT INTO `ce_city` VALUES ('1937', '魏都区', '287');
INSERT INTO `ce_city` VALUES ('1938', '许昌县', '287');
INSERT INTO `ce_city` VALUES ('1939', '鄢陵县', '287');
INSERT INTO `ce_city` VALUES ('1940', '襄城县', '287');
INSERT INTO `ce_city` VALUES ('1941', '禹州市', '287');
INSERT INTO `ce_city` VALUES ('1942', '长葛市', '287');
INSERT INTO `ce_city` VALUES ('1943', '源汇区', '288');
INSERT INTO `ce_city` VALUES ('1944', '郾城区', '288');
INSERT INTO `ce_city` VALUES ('1945', '召陵区', '288');
INSERT INTO `ce_city` VALUES ('1946', '舞阳县', '288');
INSERT INTO `ce_city` VALUES ('1947', '临颍县', '288');
INSERT INTO `ce_city` VALUES ('1948', '湖滨区', '289');
INSERT INTO `ce_city` VALUES ('1949', '渑池县', '289');
INSERT INTO `ce_city` VALUES ('1950', '陕县', '289');
INSERT INTO `ce_city` VALUES ('1951', '卢氏县', '289');
INSERT INTO `ce_city` VALUES ('1952', '义马市', '289');
INSERT INTO `ce_city` VALUES ('1953', '灵宝市', '289');
INSERT INTO `ce_city` VALUES ('1954', '宛城区', '290');
INSERT INTO `ce_city` VALUES ('1955', '卧龙区', '290');
INSERT INTO `ce_city` VALUES ('1956', '南召县', '290');
INSERT INTO `ce_city` VALUES ('1957', '方城县', '290');
INSERT INTO `ce_city` VALUES ('1958', '西峡县', '290');
INSERT INTO `ce_city` VALUES ('1959', '镇平县', '290');
INSERT INTO `ce_city` VALUES ('1960', '内乡县', '290');
INSERT INTO `ce_city` VALUES ('1961', '淅川县', '290');
INSERT INTO `ce_city` VALUES ('1962', '社旗县', '290');
INSERT INTO `ce_city` VALUES ('1963', '唐河县', '290');
INSERT INTO `ce_city` VALUES ('1964', '新野县', '290');
INSERT INTO `ce_city` VALUES ('1965', '桐柏县', '290');
INSERT INTO `ce_city` VALUES ('1966', '邓州市', '290');
INSERT INTO `ce_city` VALUES ('1967', '梁园区', '291');
INSERT INTO `ce_city` VALUES ('1968', '睢阳区', '291');
INSERT INTO `ce_city` VALUES ('1969', '民权县', '291');
INSERT INTO `ce_city` VALUES ('1970', '睢县', '291');
INSERT INTO `ce_city` VALUES ('1971', '宁陵县', '291');
INSERT INTO `ce_city` VALUES ('1972', '柘城县', '291');
INSERT INTO `ce_city` VALUES ('1973', '虞城县', '291');
INSERT INTO `ce_city` VALUES ('1974', '夏邑县', '291');
INSERT INTO `ce_city` VALUES ('1975', '永城市', '291');
INSERT INTO `ce_city` VALUES ('1976', '浉河区', '292');
INSERT INTO `ce_city` VALUES ('1977', '平桥区', '292');
INSERT INTO `ce_city` VALUES ('1978', '罗山县', '292');
INSERT INTO `ce_city` VALUES ('1979', '光山县', '292');
INSERT INTO `ce_city` VALUES ('1980', '新县', '292');
INSERT INTO `ce_city` VALUES ('1981', '商城县', '292');
INSERT INTO `ce_city` VALUES ('1982', '固始县', '292');
INSERT INTO `ce_city` VALUES ('1983', '潢川县', '292');
INSERT INTO `ce_city` VALUES ('1984', '淮滨县', '292');
INSERT INTO `ce_city` VALUES ('1985', '息县', '292');
INSERT INTO `ce_city` VALUES ('1986', '川汇区', '293');
INSERT INTO `ce_city` VALUES ('1987', '扶沟县', '293');
INSERT INTO `ce_city` VALUES ('1988', '西华县', '293');
INSERT INTO `ce_city` VALUES ('1989', '商水县', '293');
INSERT INTO `ce_city` VALUES ('1990', '沈丘县', '293');
INSERT INTO `ce_city` VALUES ('1991', '郸城县', '293');
INSERT INTO `ce_city` VALUES ('1992', '淮阳县', '293');
INSERT INTO `ce_city` VALUES ('1993', '太康县', '293');
INSERT INTO `ce_city` VALUES ('1994', '鹿邑县', '293');
INSERT INTO `ce_city` VALUES ('1995', '项城市', '293');
INSERT INTO `ce_city` VALUES ('1996', '驿城区', '294');
INSERT INTO `ce_city` VALUES ('1997', '西平县', '294');
INSERT INTO `ce_city` VALUES ('1998', '上蔡县', '294');
INSERT INTO `ce_city` VALUES ('1999', '平舆县', '294');
INSERT INTO `ce_city` VALUES ('2000', '正阳县', '294');
INSERT INTO `ce_city` VALUES ('2001', '确山县', '294');
INSERT INTO `ce_city` VALUES ('2002', '泌阳县', '294');
INSERT INTO `ce_city` VALUES ('2003', '汝南县', '294');
INSERT INTO `ce_city` VALUES ('2004', '遂平县', '294');
INSERT INTO `ce_city` VALUES ('2005', '新蔡县', '294');
INSERT INTO `ce_city` VALUES ('2006', '江岸区', '295');
INSERT INTO `ce_city` VALUES ('2007', '江汉区', '295');
INSERT INTO `ce_city` VALUES ('2008', '硚口区', '295');
INSERT INTO `ce_city` VALUES ('2009', '汉阳区', '295');
INSERT INTO `ce_city` VALUES ('2010', '武昌区', '295');
INSERT INTO `ce_city` VALUES ('2011', '青山区', '295');
INSERT INTO `ce_city` VALUES ('2012', '洪山区', '295');
INSERT INTO `ce_city` VALUES ('2013', '东西湖区', '295');
INSERT INTO `ce_city` VALUES ('2014', '汉南区', '295');
INSERT INTO `ce_city` VALUES ('2015', '蔡甸区', '295');
INSERT INTO `ce_city` VALUES ('2016', '江夏区', '295');
INSERT INTO `ce_city` VALUES ('2017', '黄陂区', '295');
INSERT INTO `ce_city` VALUES ('2018', '新洲区', '295');
INSERT INTO `ce_city` VALUES ('2019', '黄石港区', '296');
INSERT INTO `ce_city` VALUES ('2020', '西塞山区', '296');
INSERT INTO `ce_city` VALUES ('2021', '下陆区', '296');
INSERT INTO `ce_city` VALUES ('2022', '铁山区', '296');
INSERT INTO `ce_city` VALUES ('2023', '阳新县', '296');
INSERT INTO `ce_city` VALUES ('2024', '大冶市', '296');
INSERT INTO `ce_city` VALUES ('2025', '茅箭区', '297');
INSERT INTO `ce_city` VALUES ('2026', '张湾区', '297');
INSERT INTO `ce_city` VALUES ('2027', '郧县', '297');
INSERT INTO `ce_city` VALUES ('2028', '郧西县', '297');
INSERT INTO `ce_city` VALUES ('2029', '竹山县', '297');
INSERT INTO `ce_city` VALUES ('2030', '竹溪县', '297');
INSERT INTO `ce_city` VALUES ('2031', '房县', '297');
INSERT INTO `ce_city` VALUES ('2032', '丹江口市', '297');
INSERT INTO `ce_city` VALUES ('2033', '西陵区', '298');
INSERT INTO `ce_city` VALUES ('2034', '伍家岗区', '298');
INSERT INTO `ce_city` VALUES ('2035', '点军区', '298');
INSERT INTO `ce_city` VALUES ('2036', '猇亭区', '298');
INSERT INTO `ce_city` VALUES ('2037', '夷陵区', '298');
INSERT INTO `ce_city` VALUES ('2038', '远安县', '298');
INSERT INTO `ce_city` VALUES ('2039', '兴山县', '298');
INSERT INTO `ce_city` VALUES ('2040', '秭归县', '298');
INSERT INTO `ce_city` VALUES ('2041', '长阳土家族自治县', '298');
INSERT INTO `ce_city` VALUES ('2042', '五峰土家族自治县', '298');
INSERT INTO `ce_city` VALUES ('2043', '宜都市', '298');
INSERT INTO `ce_city` VALUES ('2044', '当阳市', '298');
INSERT INTO `ce_city` VALUES ('2045', '枝江市', '298');
INSERT INTO `ce_city` VALUES ('2046', '襄城区', '299');
INSERT INTO `ce_city` VALUES ('2047', '樊城区', '299');
INSERT INTO `ce_city` VALUES ('2048', '襄阳区', '299');
INSERT INTO `ce_city` VALUES ('2049', '南漳县', '299');
INSERT INTO `ce_city` VALUES ('2050', '谷城县', '299');
INSERT INTO `ce_city` VALUES ('2051', '保康县', '299');
INSERT INTO `ce_city` VALUES ('2052', '老河口市', '299');
INSERT INTO `ce_city` VALUES ('2053', '枣阳市', '299');
INSERT INTO `ce_city` VALUES ('2054', '宜城市', '299');
INSERT INTO `ce_city` VALUES ('2055', '梁子湖区', '300');
INSERT INTO `ce_city` VALUES ('2056', '华容区', '300');
INSERT INTO `ce_city` VALUES ('2057', '鄂城区', '300');
INSERT INTO `ce_city` VALUES ('2058', '东宝区', '301');
INSERT INTO `ce_city` VALUES ('2059', '掇刀区', '301');
INSERT INTO `ce_city` VALUES ('2060', '京山县', '301');
INSERT INTO `ce_city` VALUES ('2061', '沙洋县', '301');
INSERT INTO `ce_city` VALUES ('2062', '钟祥市', '301');
INSERT INTO `ce_city` VALUES ('2063', '孝南区', '302');
INSERT INTO `ce_city` VALUES ('2064', '孝昌县', '302');
INSERT INTO `ce_city` VALUES ('2065', '大悟县', '302');
INSERT INTO `ce_city` VALUES ('2066', '云梦县', '302');
INSERT INTO `ce_city` VALUES ('2067', '应城市', '302');
INSERT INTO `ce_city` VALUES ('2068', '安陆市', '302');
INSERT INTO `ce_city` VALUES ('2069', '汉川市', '302');
INSERT INTO `ce_city` VALUES ('2070', '沙市区', '303');
INSERT INTO `ce_city` VALUES ('2071', '荆州区', '303');
INSERT INTO `ce_city` VALUES ('2072', '公安县', '303');
INSERT INTO `ce_city` VALUES ('2073', '监利县', '303');
INSERT INTO `ce_city` VALUES ('2074', '江陵县', '303');
INSERT INTO `ce_city` VALUES ('2075', '石首市', '303');
INSERT INTO `ce_city` VALUES ('2076', '洪湖市', '303');
INSERT INTO `ce_city` VALUES ('2077', '松滋市', '303');
INSERT INTO `ce_city` VALUES ('2078', '黄州区', '304');
INSERT INTO `ce_city` VALUES ('2079', '团风县', '304');
INSERT INTO `ce_city` VALUES ('2080', '红安县', '304');
INSERT INTO `ce_city` VALUES ('2081', '罗田县', '304');
INSERT INTO `ce_city` VALUES ('2082', '英山县', '304');
INSERT INTO `ce_city` VALUES ('2083', '浠水县', '304');
INSERT INTO `ce_city` VALUES ('2084', '蕲春县', '304');
INSERT INTO `ce_city` VALUES ('2085', '黄梅县', '304');
INSERT INTO `ce_city` VALUES ('2086', '麻城市', '304');
INSERT INTO `ce_city` VALUES ('2087', '武穴市', '304');
INSERT INTO `ce_city` VALUES ('2088', '咸安区', '305');
INSERT INTO `ce_city` VALUES ('2089', '嘉鱼县', '305');
INSERT INTO `ce_city` VALUES ('2090', '通城县', '305');
INSERT INTO `ce_city` VALUES ('2091', '崇阳县', '305');
INSERT INTO `ce_city` VALUES ('2092', '通山县', '305');
INSERT INTO `ce_city` VALUES ('2093', '赤壁市', '305');
INSERT INTO `ce_city` VALUES ('2094', '曾都区', '306');
INSERT INTO `ce_city` VALUES ('2095', '广水市', '306');
INSERT INTO `ce_city` VALUES ('2096', '恩施市', '307');
INSERT INTO `ce_city` VALUES ('2097', '利川市', '307');
INSERT INTO `ce_city` VALUES ('2098', '建始县', '307');
INSERT INTO `ce_city` VALUES ('2099', '巴东县', '307');
INSERT INTO `ce_city` VALUES ('2100', '宣恩县', '307');
INSERT INTO `ce_city` VALUES ('2101', '咸丰县', '307');
INSERT INTO `ce_city` VALUES ('2102', '来凤县', '307');
INSERT INTO `ce_city` VALUES ('2103', '鹤峰县', '307');
INSERT INTO `ce_city` VALUES ('2104', '芙蓉区', '312');
INSERT INTO `ce_city` VALUES ('2105', '天心区', '312');
INSERT INTO `ce_city` VALUES ('2106', '岳麓区', '312');
INSERT INTO `ce_city` VALUES ('2107', '开福区', '312');
INSERT INTO `ce_city` VALUES ('2108', '雨花区', '312');
INSERT INTO `ce_city` VALUES ('2109', '长沙县', '312');
INSERT INTO `ce_city` VALUES ('2110', '望城县', '312');
INSERT INTO `ce_city` VALUES ('2111', '宁乡县', '312');
INSERT INTO `ce_city` VALUES ('2112', '浏阳市', '312');
INSERT INTO `ce_city` VALUES ('2113', '荷塘区', '313');
INSERT INTO `ce_city` VALUES ('2114', '芦淞区', '313');
INSERT INTO `ce_city` VALUES ('2115', '石峰区', '313');
INSERT INTO `ce_city` VALUES ('2116', '天元区', '313');
INSERT INTO `ce_city` VALUES ('2117', '株洲县', '313');
INSERT INTO `ce_city` VALUES ('2118', '攸县', '313');
INSERT INTO `ce_city` VALUES ('2119', '茶陵县', '313');
INSERT INTO `ce_city` VALUES ('2120', '炎陵县', '313');
INSERT INTO `ce_city` VALUES ('2121', '醴陵市', '313');
INSERT INTO `ce_city` VALUES ('2122', '雨湖区', '314');
INSERT INTO `ce_city` VALUES ('2123', '岳塘区', '314');
INSERT INTO `ce_city` VALUES ('2124', '湘潭县', '314');
INSERT INTO `ce_city` VALUES ('2125', '湘乡市', '314');
INSERT INTO `ce_city` VALUES ('2126', '韶山市', '314');
INSERT INTO `ce_city` VALUES ('2127', '珠晖区', '315');
INSERT INTO `ce_city` VALUES ('2128', '雁峰区', '315');
INSERT INTO `ce_city` VALUES ('2129', '石鼓区', '315');
INSERT INTO `ce_city` VALUES ('2130', '蒸湘区', '315');
INSERT INTO `ce_city` VALUES ('2131', '南岳区', '315');
INSERT INTO `ce_city` VALUES ('2132', '衡阳县', '315');
INSERT INTO `ce_city` VALUES ('2133', '衡南县', '315');
INSERT INTO `ce_city` VALUES ('2134', '衡山县', '315');
INSERT INTO `ce_city` VALUES ('2135', '衡东县', '315');
INSERT INTO `ce_city` VALUES ('2136', '祁东县', '315');
INSERT INTO `ce_city` VALUES ('2137', '耒阳市', '315');
INSERT INTO `ce_city` VALUES ('2138', '常宁市', '315');
INSERT INTO `ce_city` VALUES ('2139', '双清区', '316');
INSERT INTO `ce_city` VALUES ('2140', '大祥区', '316');
INSERT INTO `ce_city` VALUES ('2141', '北塔区', '316');
INSERT INTO `ce_city` VALUES ('2142', '邵东县', '316');
INSERT INTO `ce_city` VALUES ('2143', '新邵县', '316');
INSERT INTO `ce_city` VALUES ('2144', '邵阳县', '316');
INSERT INTO `ce_city` VALUES ('2145', '隆回县', '316');
INSERT INTO `ce_city` VALUES ('2146', '洞口县', '316');
INSERT INTO `ce_city` VALUES ('2147', '绥宁县', '316');
INSERT INTO `ce_city` VALUES ('2148', '新宁县', '316');
INSERT INTO `ce_city` VALUES ('2149', '城步苗族自治县', '316');
INSERT INTO `ce_city` VALUES ('2150', '武冈市', '316');
INSERT INTO `ce_city` VALUES ('2151', '岳阳楼区', '317');
INSERT INTO `ce_city` VALUES ('2152', '云溪区', '317');
INSERT INTO `ce_city` VALUES ('2153', '君山区', '317');
INSERT INTO `ce_city` VALUES ('2154', '岳阳县', '317');
INSERT INTO `ce_city` VALUES ('2155', '华容县', '317');
INSERT INTO `ce_city` VALUES ('2156', '湘阴县', '317');
INSERT INTO `ce_city` VALUES ('2157', '平江县', '317');
INSERT INTO `ce_city` VALUES ('2158', '汨罗市', '317');
INSERT INTO `ce_city` VALUES ('2159', '临湘市', '317');
INSERT INTO `ce_city` VALUES ('2160', '武陵区', '318');
INSERT INTO `ce_city` VALUES ('2161', '鼎城区', '318');
INSERT INTO `ce_city` VALUES ('2162', '安乡县', '318');
INSERT INTO `ce_city` VALUES ('2163', '汉寿县', '318');
INSERT INTO `ce_city` VALUES ('2164', '澧县', '318');
INSERT INTO `ce_city` VALUES ('2165', '临澧县', '318');
INSERT INTO `ce_city` VALUES ('2166', '桃源县', '318');
INSERT INTO `ce_city` VALUES ('2167', '石门县', '318');
INSERT INTO `ce_city` VALUES ('2168', '津市市', '318');
INSERT INTO `ce_city` VALUES ('2169', '永定区', '319');
INSERT INTO `ce_city` VALUES ('2170', '武陵源区', '319');
INSERT INTO `ce_city` VALUES ('2171', '慈利县', '319');
INSERT INTO `ce_city` VALUES ('2172', '桑植县', '319');
INSERT INTO `ce_city` VALUES ('2173', '资阳区', '320');
INSERT INTO `ce_city` VALUES ('2174', '赫山区', '320');
INSERT INTO `ce_city` VALUES ('2175', '南县', '320');
INSERT INTO `ce_city` VALUES ('2176', '桃江县', '320');
INSERT INTO `ce_city` VALUES ('2177', '安化县', '320');
INSERT INTO `ce_city` VALUES ('2178', '沅江市', '320');
INSERT INTO `ce_city` VALUES ('2179', '北湖区', '321');
INSERT INTO `ce_city` VALUES ('2180', '苏仙区', '321');
INSERT INTO `ce_city` VALUES ('2181', '桂阳县', '321');
INSERT INTO `ce_city` VALUES ('2182', '宜章县', '321');
INSERT INTO `ce_city` VALUES ('2183', '永兴县', '321');
INSERT INTO `ce_city` VALUES ('2184', '嘉禾县', '321');
INSERT INTO `ce_city` VALUES ('2185', '临武县', '321');
INSERT INTO `ce_city` VALUES ('2186', '汝城县', '321');
INSERT INTO `ce_city` VALUES ('2187', '桂东县', '321');
INSERT INTO `ce_city` VALUES ('2188', '安仁县', '321');
INSERT INTO `ce_city` VALUES ('2189', '资兴市', '321');
INSERT INTO `ce_city` VALUES ('2190', '零陵区', '322');
INSERT INTO `ce_city` VALUES ('2191', '冷水滩区', '322');
INSERT INTO `ce_city` VALUES ('2192', '祁阳县', '322');
INSERT INTO `ce_city` VALUES ('2193', '东安县', '322');
INSERT INTO `ce_city` VALUES ('2194', '双牌县', '322');
INSERT INTO `ce_city` VALUES ('2195', '道县', '322');
INSERT INTO `ce_city` VALUES ('2196', '江永县', '322');
INSERT INTO `ce_city` VALUES ('2197', '宁远县', '322');
INSERT INTO `ce_city` VALUES ('2198', '蓝山县', '322');
INSERT INTO `ce_city` VALUES ('2199', '新田县', '322');
INSERT INTO `ce_city` VALUES ('2200', '江华瑶族自治县', '322');
INSERT INTO `ce_city` VALUES ('2201', '鹤城区', '323');
INSERT INTO `ce_city` VALUES ('2202', '中方县', '323');
INSERT INTO `ce_city` VALUES ('2203', '沅陵县', '323');
INSERT INTO `ce_city` VALUES ('2204', '辰溪县', '323');
INSERT INTO `ce_city` VALUES ('2205', '溆浦县', '323');
INSERT INTO `ce_city` VALUES ('2206', '会同县', '323');
INSERT INTO `ce_city` VALUES ('2207', '麻阳苗族自治县', '323');
INSERT INTO `ce_city` VALUES ('2208', '新晃侗族自治县', '323');
INSERT INTO `ce_city` VALUES ('2209', '芷江侗族自治县', '323');
INSERT INTO `ce_city` VALUES ('2210', '靖州苗族侗族自治县', '323');
INSERT INTO `ce_city` VALUES ('2211', '通道侗族自治县', '323');
INSERT INTO `ce_city` VALUES ('2212', '洪江市', '323');
INSERT INTO `ce_city` VALUES ('2213', '娄星区', '324');
INSERT INTO `ce_city` VALUES ('2214', '双峰县', '324');
INSERT INTO `ce_city` VALUES ('2215', '新化县', '324');
INSERT INTO `ce_city` VALUES ('2216', '冷水江市', '324');
INSERT INTO `ce_city` VALUES ('2217', '涟源市', '324');
INSERT INTO `ce_city` VALUES ('2218', '吉首市', '325');
INSERT INTO `ce_city` VALUES ('2219', '泸溪县', '325');
INSERT INTO `ce_city` VALUES ('2220', '凤凰县', '325');
INSERT INTO `ce_city` VALUES ('2221', '花垣县', '325');
INSERT INTO `ce_city` VALUES ('2222', '保靖县', '325');
INSERT INTO `ce_city` VALUES ('2223', '古丈县', '325');
INSERT INTO `ce_city` VALUES ('2224', '永顺县', '325');
INSERT INTO `ce_city` VALUES ('2225', '龙山县', '325');
INSERT INTO `ce_city` VALUES ('2226', '荔湾区', '326');
INSERT INTO `ce_city` VALUES ('2227', '越秀区', '326');
INSERT INTO `ce_city` VALUES ('2228', '海珠区', '326');
INSERT INTO `ce_city` VALUES ('2229', '天河区', '326');
INSERT INTO `ce_city` VALUES ('2230', '白云区', '326');
INSERT INTO `ce_city` VALUES ('2231', '黄埔区', '326');
INSERT INTO `ce_city` VALUES ('2232', '番禺区', '326');
INSERT INTO `ce_city` VALUES ('2233', '花都区', '326');
INSERT INTO `ce_city` VALUES ('2234', '南沙区', '326');
INSERT INTO `ce_city` VALUES ('2235', '萝岗区', '326');
INSERT INTO `ce_city` VALUES ('2236', '增城市', '326');
INSERT INTO `ce_city` VALUES ('2237', '从化市', '326');
INSERT INTO `ce_city` VALUES ('2238', '武江区', '327');
INSERT INTO `ce_city` VALUES ('2239', '浈江区', '327');
INSERT INTO `ce_city` VALUES ('2240', '曲江区', '327');
INSERT INTO `ce_city` VALUES ('2241', '始兴县', '327');
INSERT INTO `ce_city` VALUES ('2242', '仁化县', '327');
INSERT INTO `ce_city` VALUES ('2243', '翁源县', '327');
INSERT INTO `ce_city` VALUES ('2244', '乳源瑶族自治县', '327');
INSERT INTO `ce_city` VALUES ('2245', '新丰县', '327');
INSERT INTO `ce_city` VALUES ('2246', '乐昌市', '327');
INSERT INTO `ce_city` VALUES ('2247', '南雄市', '327');
INSERT INTO `ce_city` VALUES ('2248', '罗湖区', '328');
INSERT INTO `ce_city` VALUES ('2249', '福田区', '328');
INSERT INTO `ce_city` VALUES ('2250', '南山区', '328');
INSERT INTO `ce_city` VALUES ('2251', '宝安区', '328');
INSERT INTO `ce_city` VALUES ('2252', '龙岗区', '328');
INSERT INTO `ce_city` VALUES ('2253', '盐田区', '328');
INSERT INTO `ce_city` VALUES ('2254', '香洲区', '329');
INSERT INTO `ce_city` VALUES ('2255', '斗门区', '329');
INSERT INTO `ce_city` VALUES ('2256', '金湾区', '329');
INSERT INTO `ce_city` VALUES ('2257', '龙湖区', '330');
INSERT INTO `ce_city` VALUES ('2258', '金平区', '330');
INSERT INTO `ce_city` VALUES ('2259', '濠江区', '330');
INSERT INTO `ce_city` VALUES ('2260', '潮阳区', '330');
INSERT INTO `ce_city` VALUES ('2261', '潮南区', '330');
INSERT INTO `ce_city` VALUES ('2262', '澄海区', '330');
INSERT INTO `ce_city` VALUES ('2263', '南澳县', '330');
INSERT INTO `ce_city` VALUES ('2264', '禅城区', '331');
INSERT INTO `ce_city` VALUES ('2265', '南海区', '331');
INSERT INTO `ce_city` VALUES ('2266', '顺德区', '331');
INSERT INTO `ce_city` VALUES ('2267', '三水区', '331');
INSERT INTO `ce_city` VALUES ('2268', '高明区', '331');
INSERT INTO `ce_city` VALUES ('2269', '蓬江区', '332');
INSERT INTO `ce_city` VALUES ('2270', '江海区', '332');
INSERT INTO `ce_city` VALUES ('2271', '新会区', '332');
INSERT INTO `ce_city` VALUES ('2272', '台山市', '332');
INSERT INTO `ce_city` VALUES ('2273', '开平市', '332');
INSERT INTO `ce_city` VALUES ('2274', '鹤山市', '332');
INSERT INTO `ce_city` VALUES ('2275', '恩平市', '332');
INSERT INTO `ce_city` VALUES ('2276', '赤坎区', '333');
INSERT INTO `ce_city` VALUES ('2277', '霞山区', '333');
INSERT INTO `ce_city` VALUES ('2278', '坡头区', '333');
INSERT INTO `ce_city` VALUES ('2279', '麻章区', '333');
INSERT INTO `ce_city` VALUES ('2280', '遂溪县', '333');
INSERT INTO `ce_city` VALUES ('2281', '徐闻县', '333');
INSERT INTO `ce_city` VALUES ('2282', '廉江市', '333');
INSERT INTO `ce_city` VALUES ('2283', '雷州市', '333');
INSERT INTO `ce_city` VALUES ('2284', '吴川市', '333');
INSERT INTO `ce_city` VALUES ('2285', '茂南区', '334');
INSERT INTO `ce_city` VALUES ('2286', '茂港区', '334');
INSERT INTO `ce_city` VALUES ('2287', '电白县', '334');
INSERT INTO `ce_city` VALUES ('2288', '高州市', '334');
INSERT INTO `ce_city` VALUES ('2289', '化州市', '334');
INSERT INTO `ce_city` VALUES ('2290', '信宜市', '334');
INSERT INTO `ce_city` VALUES ('2291', '端州区', '335');
INSERT INTO `ce_city` VALUES ('2292', '鼎湖区', '335');
INSERT INTO `ce_city` VALUES ('2293', '广宁县', '335');
INSERT INTO `ce_city` VALUES ('2294', '怀集县', '335');
INSERT INTO `ce_city` VALUES ('2295', '封开县', '335');
INSERT INTO `ce_city` VALUES ('2296', '德庆县', '335');
INSERT INTO `ce_city` VALUES ('2297', '高要市', '335');
INSERT INTO `ce_city` VALUES ('2298', '四会市', '335');
INSERT INTO `ce_city` VALUES ('2299', '惠城区', '336');
INSERT INTO `ce_city` VALUES ('2300', '惠阳区', '336');
INSERT INTO `ce_city` VALUES ('2301', '博罗县', '336');
INSERT INTO `ce_city` VALUES ('2302', '惠东县', '336');
INSERT INTO `ce_city` VALUES ('2303', '龙门县', '336');
INSERT INTO `ce_city` VALUES ('2304', '梅江区', '337');
INSERT INTO `ce_city` VALUES ('2305', '梅县', '337');
INSERT INTO `ce_city` VALUES ('2306', '大埔县', '337');
INSERT INTO `ce_city` VALUES ('2307', '丰顺县', '337');
INSERT INTO `ce_city` VALUES ('2308', '五华县', '337');
INSERT INTO `ce_city` VALUES ('2309', '平远县', '337');
INSERT INTO `ce_city` VALUES ('2310', '蕉岭县', '337');
INSERT INTO `ce_city` VALUES ('2311', '兴宁市', '337');
INSERT INTO `ce_city` VALUES ('2312', '城区', '338');
INSERT INTO `ce_city` VALUES ('2313', '海丰县', '338');
INSERT INTO `ce_city` VALUES ('2314', '陆河县', '338');
INSERT INTO `ce_city` VALUES ('2315', '陆丰市', '338');
INSERT INTO `ce_city` VALUES ('2316', '源城区', '339');
INSERT INTO `ce_city` VALUES ('2317', '紫金县', '339');
INSERT INTO `ce_city` VALUES ('2318', '龙川县', '339');
INSERT INTO `ce_city` VALUES ('2319', '连平县', '339');
INSERT INTO `ce_city` VALUES ('2320', '和平县', '339');
INSERT INTO `ce_city` VALUES ('2321', '东源县', '339');
INSERT INTO `ce_city` VALUES ('2322', '江城区', '340');
INSERT INTO `ce_city` VALUES ('2323', '阳西县', '340');
INSERT INTO `ce_city` VALUES ('2324', '阳东县', '340');
INSERT INTO `ce_city` VALUES ('2325', '阳春市', '340');
INSERT INTO `ce_city` VALUES ('2326', '清城区', '341');
INSERT INTO `ce_city` VALUES ('2327', '佛冈县', '341');
INSERT INTO `ce_city` VALUES ('2328', '阳山县', '341');
INSERT INTO `ce_city` VALUES ('2329', '连山壮族瑶族自治县', '341');
INSERT INTO `ce_city` VALUES ('2330', '连南瑶族自治县', '341');
INSERT INTO `ce_city` VALUES ('2331', '清新县', '341');
INSERT INTO `ce_city` VALUES ('2332', '英德市', '341');
INSERT INTO `ce_city` VALUES ('2333', '连州市', '341');
INSERT INTO `ce_city` VALUES ('2334', '湘桥区', '344');
INSERT INTO `ce_city` VALUES ('2335', '潮安县', '344');
INSERT INTO `ce_city` VALUES ('2336', '饶平县', '344');
INSERT INTO `ce_city` VALUES ('2337', '榕城区', '345');
INSERT INTO `ce_city` VALUES ('2338', '揭东县', '345');
INSERT INTO `ce_city` VALUES ('2339', '揭西县', '345');
INSERT INTO `ce_city` VALUES ('2340', '惠来县', '345');
INSERT INTO `ce_city` VALUES ('2341', '普宁市', '345');
INSERT INTO `ce_city` VALUES ('2342', '云城区', '346');
INSERT INTO `ce_city` VALUES ('2343', '新兴县', '346');
INSERT INTO `ce_city` VALUES ('2344', '郁南县', '346');
INSERT INTO `ce_city` VALUES ('2345', '云安县', '346');
INSERT INTO `ce_city` VALUES ('2346', '罗定市', '346');
INSERT INTO `ce_city` VALUES ('2347', '兴宁区', '347');
INSERT INTO `ce_city` VALUES ('2348', '青秀区', '347');
INSERT INTO `ce_city` VALUES ('2349', '江南区', '347');
INSERT INTO `ce_city` VALUES ('2350', '西乡塘区', '347');
INSERT INTO `ce_city` VALUES ('2351', '良庆区', '347');
INSERT INTO `ce_city` VALUES ('2352', '邕宁区', '347');
INSERT INTO `ce_city` VALUES ('2353', '武鸣县', '347');
INSERT INTO `ce_city` VALUES ('2354', '隆安县', '347');
INSERT INTO `ce_city` VALUES ('2355', '马山县', '347');
INSERT INTO `ce_city` VALUES ('2356', '上林县', '347');
INSERT INTO `ce_city` VALUES ('2357', '宾阳县', '347');
INSERT INTO `ce_city` VALUES ('2358', '横县', '347');
INSERT INTO `ce_city` VALUES ('2359', '城中区', '348');
INSERT INTO `ce_city` VALUES ('2360', '鱼峰区', '348');
INSERT INTO `ce_city` VALUES ('2361', '柳南区', '348');
INSERT INTO `ce_city` VALUES ('2362', '柳北区', '348');
INSERT INTO `ce_city` VALUES ('2363', '柳江县', '348');
INSERT INTO `ce_city` VALUES ('2364', '柳城县', '348');
INSERT INTO `ce_city` VALUES ('2365', '鹿寨县', '348');
INSERT INTO `ce_city` VALUES ('2366', '融安县', '348');
INSERT INTO `ce_city` VALUES ('2367', '融水苗族自治县', '348');
INSERT INTO `ce_city` VALUES ('2368', '三江侗族自治县', '348');
INSERT INTO `ce_city` VALUES ('2369', '秀峰区', '349');
INSERT INTO `ce_city` VALUES ('2370', '叠彩区', '349');
INSERT INTO `ce_city` VALUES ('2371', '象山区', '349');
INSERT INTO `ce_city` VALUES ('2372', '七星区', '349');
INSERT INTO `ce_city` VALUES ('2373', '雁山区', '349');
INSERT INTO `ce_city` VALUES ('2374', '阳朔县', '349');
INSERT INTO `ce_city` VALUES ('2375', '临桂县', '349');
INSERT INTO `ce_city` VALUES ('2376', '灵川县', '349');
INSERT INTO `ce_city` VALUES ('2377', '全州县', '349');
INSERT INTO `ce_city` VALUES ('2378', '兴安县', '349');
INSERT INTO `ce_city` VALUES ('2379', '永福县', '349');
INSERT INTO `ce_city` VALUES ('2380', '灌阳县', '349');
INSERT INTO `ce_city` VALUES ('2381', '龙胜各族自治县', '349');
INSERT INTO `ce_city` VALUES ('2382', '资源县', '349');
INSERT INTO `ce_city` VALUES ('2383', '平乐县', '349');
INSERT INTO `ce_city` VALUES ('2384', '荔蒲县', '349');
INSERT INTO `ce_city` VALUES ('2385', '恭城瑶族自治县', '349');
INSERT INTO `ce_city` VALUES ('2386', '万秀区', '350');
INSERT INTO `ce_city` VALUES ('2387', '蝶山区', '350');
INSERT INTO `ce_city` VALUES ('2388', '长洲区', '350');
INSERT INTO `ce_city` VALUES ('2389', '苍梧县', '350');
INSERT INTO `ce_city` VALUES ('2390', '藤县', '350');
INSERT INTO `ce_city` VALUES ('2391', '蒙山县', '350');
INSERT INTO `ce_city` VALUES ('2392', '岑溪市', '350');
INSERT INTO `ce_city` VALUES ('2393', '海城区', '351');
INSERT INTO `ce_city` VALUES ('2394', '银海区', '351');
INSERT INTO `ce_city` VALUES ('2395', '铁山港区', '351');
INSERT INTO `ce_city` VALUES ('2396', '合浦县', '351');
INSERT INTO `ce_city` VALUES ('2397', '港口区', '352');
INSERT INTO `ce_city` VALUES ('2398', '防城区', '352');
INSERT INTO `ce_city` VALUES ('2399', '上思县', '352');
INSERT INTO `ce_city` VALUES ('2400', '东兴市', '352');
INSERT INTO `ce_city` VALUES ('2401', '钦南区', '353');
INSERT INTO `ce_city` VALUES ('2402', '钦北区', '353');
INSERT INTO `ce_city` VALUES ('2403', '灵山县', '353');
INSERT INTO `ce_city` VALUES ('2404', '浦北县', '353');
INSERT INTO `ce_city` VALUES ('2405', '港北区', '354');
INSERT INTO `ce_city` VALUES ('2406', '港南区', '354');
INSERT INTO `ce_city` VALUES ('2407', '覃塘区', '354');
INSERT INTO `ce_city` VALUES ('2408', '平南县', '354');
INSERT INTO `ce_city` VALUES ('2409', '桂平市', '354');
INSERT INTO `ce_city` VALUES ('2410', '玉州区', '355');
INSERT INTO `ce_city` VALUES ('2411', '容县', '355');
INSERT INTO `ce_city` VALUES ('2412', '陆川县', '355');
INSERT INTO `ce_city` VALUES ('2413', '博白县', '355');
INSERT INTO `ce_city` VALUES ('2414', '兴业县', '355');
INSERT INTO `ce_city` VALUES ('2415', '北流市', '355');
INSERT INTO `ce_city` VALUES ('2416', '右江区', '356');
INSERT INTO `ce_city` VALUES ('2417', '田阳县', '356');
INSERT INTO `ce_city` VALUES ('2418', '田东县', '356');
INSERT INTO `ce_city` VALUES ('2419', '平果县', '356');
INSERT INTO `ce_city` VALUES ('2420', '德保县', '356');
INSERT INTO `ce_city` VALUES ('2421', '靖西县', '356');
INSERT INTO `ce_city` VALUES ('2422', '那坡县', '356');
INSERT INTO `ce_city` VALUES ('2423', '凌云县', '356');
INSERT INTO `ce_city` VALUES ('2424', '乐业县', '356');
INSERT INTO `ce_city` VALUES ('2425', '田林县', '356');
INSERT INTO `ce_city` VALUES ('2426', '西林县', '356');
INSERT INTO `ce_city` VALUES ('2427', '隆林各族自治县', '356');
INSERT INTO `ce_city` VALUES ('2428', '八步区', '357');
INSERT INTO `ce_city` VALUES ('2429', '昭平县', '357');
INSERT INTO `ce_city` VALUES ('2430', '钟山县', '357');
INSERT INTO `ce_city` VALUES ('2431', '富川瑶族自治县', '357');
INSERT INTO `ce_city` VALUES ('2432', '金城江区', '358');
INSERT INTO `ce_city` VALUES ('2433', '南丹县', '358');
INSERT INTO `ce_city` VALUES ('2434', '天峨县', '358');
INSERT INTO `ce_city` VALUES ('2435', '凤山县', '358');
INSERT INTO `ce_city` VALUES ('2436', '东兰县', '358');
INSERT INTO `ce_city` VALUES ('2437', '罗城仫佬族自治县', '358');
INSERT INTO `ce_city` VALUES ('2438', '环江毛南族自治县', '358');
INSERT INTO `ce_city` VALUES ('2439', '巴马瑶族自治县', '358');
INSERT INTO `ce_city` VALUES ('2440', '都安瑶族自治县', '358');
INSERT INTO `ce_city` VALUES ('2441', '大化瑶族自治县', '358');
INSERT INTO `ce_city` VALUES ('2442', '宜州市', '358');
INSERT INTO `ce_city` VALUES ('2443', '兴宾区', '359');
INSERT INTO `ce_city` VALUES ('2444', '忻城县', '359');
INSERT INTO `ce_city` VALUES ('2445', '象州县', '359');
INSERT INTO `ce_city` VALUES ('2446', '武宣县', '359');
INSERT INTO `ce_city` VALUES ('2447', '金秀瑶族自治县', '359');
INSERT INTO `ce_city` VALUES ('2448', '合山市', '359');
INSERT INTO `ce_city` VALUES ('2449', '江洲区', '360');
INSERT INTO `ce_city` VALUES ('2450', '扶绥县', '360');
INSERT INTO `ce_city` VALUES ('2451', '宁明县', '360');
INSERT INTO `ce_city` VALUES ('2452', '龙州县', '360');
INSERT INTO `ce_city` VALUES ('2453', '大新县', '360');
INSERT INTO `ce_city` VALUES ('2454', '天等县', '360');
INSERT INTO `ce_city` VALUES ('2455', '凭祥市', '360');
INSERT INTO `ce_city` VALUES ('2456', '秀英区', '361');
INSERT INTO `ce_city` VALUES ('2457', '龙华区', '361');
INSERT INTO `ce_city` VALUES ('2458', '琼山区', '361');
INSERT INTO `ce_city` VALUES ('2459', '美兰区', '361');
INSERT INTO `ce_city` VALUES ('2460', '锦江区', '382');
INSERT INTO `ce_city` VALUES ('2461', '青羊区', '382');
INSERT INTO `ce_city` VALUES ('2462', '金牛区', '382');
INSERT INTO `ce_city` VALUES ('2463', '武侯区', '382');
INSERT INTO `ce_city` VALUES ('2464', '成华区', '382');
INSERT INTO `ce_city` VALUES ('2465', '龙泉驿区', '382');
INSERT INTO `ce_city` VALUES ('2466', '青白江区', '382');
INSERT INTO `ce_city` VALUES ('2467', '新都区', '382');
INSERT INTO `ce_city` VALUES ('2468', '温江区', '382');
INSERT INTO `ce_city` VALUES ('2469', '金堂县', '382');
INSERT INTO `ce_city` VALUES ('2470', '双流县', '382');
INSERT INTO `ce_city` VALUES ('2471', '郫县', '382');
INSERT INTO `ce_city` VALUES ('2472', '大邑县', '382');
INSERT INTO `ce_city` VALUES ('2473', '蒲江县', '382');
INSERT INTO `ce_city` VALUES ('2474', '新津县', '382');
INSERT INTO `ce_city` VALUES ('2475', '都江堰市', '382');
INSERT INTO `ce_city` VALUES ('2476', '彭州市', '382');
INSERT INTO `ce_city` VALUES ('2477', '邛崃市', '382');
INSERT INTO `ce_city` VALUES ('2478', '崇州市', '382');
INSERT INTO `ce_city` VALUES ('2479', '自流井区', '383');
INSERT INTO `ce_city` VALUES ('2480', '贡井区', '383');
INSERT INTO `ce_city` VALUES ('2481', '大安区', '383');
INSERT INTO `ce_city` VALUES ('2482', '沿滩区', '383');
INSERT INTO `ce_city` VALUES ('2483', '荣县', '383');
INSERT INTO `ce_city` VALUES ('2484', '富顺县', '383');
INSERT INTO `ce_city` VALUES ('2485', '东区', '384');
INSERT INTO `ce_city` VALUES ('2486', '西区', '384');
INSERT INTO `ce_city` VALUES ('2487', '仁和区', '384');
INSERT INTO `ce_city` VALUES ('2488', '米易县', '384');
INSERT INTO `ce_city` VALUES ('2489', '盐边县', '384');
INSERT INTO `ce_city` VALUES ('2490', '江阳区', '385');
INSERT INTO `ce_city` VALUES ('2491', '纳溪区', '385');
INSERT INTO `ce_city` VALUES ('2492', '龙马潭区', '385');
INSERT INTO `ce_city` VALUES ('2493', '泸县', '385');
INSERT INTO `ce_city` VALUES ('2494', '合江县', '385');
INSERT INTO `ce_city` VALUES ('2495', '叙永县', '385');
INSERT INTO `ce_city` VALUES ('2496', '古蔺县', '385');
INSERT INTO `ce_city` VALUES ('2497', '旌阳区', '386');
INSERT INTO `ce_city` VALUES ('2498', '中江县', '386');
INSERT INTO `ce_city` VALUES ('2499', '罗江县', '386');
INSERT INTO `ce_city` VALUES ('2500', '广汉市', '386');
INSERT INTO `ce_city` VALUES ('2501', '什邡市', '386');
INSERT INTO `ce_city` VALUES ('2502', '绵竹市', '386');
INSERT INTO `ce_city` VALUES ('2503', '涪城区', '387');
INSERT INTO `ce_city` VALUES ('2504', '游仙区', '387');
INSERT INTO `ce_city` VALUES ('2505', '三台县', '387');
INSERT INTO `ce_city` VALUES ('2506', '盐亭县', '387');
INSERT INTO `ce_city` VALUES ('2507', '安县', '387');
INSERT INTO `ce_city` VALUES ('2508', '梓潼县', '387');
INSERT INTO `ce_city` VALUES ('2509', '北川羌族自治县', '387');
INSERT INTO `ce_city` VALUES ('2510', '平武县', '387');
INSERT INTO `ce_city` VALUES ('2511', '江油市', '387');
INSERT INTO `ce_city` VALUES ('2512', '市中区', '388');
INSERT INTO `ce_city` VALUES ('2513', '元坝区', '388');
INSERT INTO `ce_city` VALUES ('2514', '朝天区', '388');
INSERT INTO `ce_city` VALUES ('2515', '旺苍县', '388');
INSERT INTO `ce_city` VALUES ('2516', '青川县', '388');
INSERT INTO `ce_city` VALUES ('2517', '剑阁县', '388');
INSERT INTO `ce_city` VALUES ('2518', '苍溪县', '388');
INSERT INTO `ce_city` VALUES ('2519', '船山区', '389');
INSERT INTO `ce_city` VALUES ('2520', '安居区', '389');
INSERT INTO `ce_city` VALUES ('2521', '蓬溪县', '389');
INSERT INTO `ce_city` VALUES ('2522', '射洪县', '389');
INSERT INTO `ce_city` VALUES ('2523', '大英县', '389');
INSERT INTO `ce_city` VALUES ('2524', '市中区', '390');
INSERT INTO `ce_city` VALUES ('2525', '东兴区', '390');
INSERT INTO `ce_city` VALUES ('2526', '威远县', '390');
INSERT INTO `ce_city` VALUES ('2527', '资中县', '390');
INSERT INTO `ce_city` VALUES ('2528', '隆昌县', '390');
INSERT INTO `ce_city` VALUES ('2529', '市中区', '391');
INSERT INTO `ce_city` VALUES ('2530', '沙湾区', '391');
INSERT INTO `ce_city` VALUES ('2531', '五通桥区', '391');
INSERT INTO `ce_city` VALUES ('2532', '金口河区', '391');
INSERT INTO `ce_city` VALUES ('2533', '犍为县', '391');
INSERT INTO `ce_city` VALUES ('2534', '井研县', '391');
INSERT INTO `ce_city` VALUES ('2535', '夹江县', '391');
INSERT INTO `ce_city` VALUES ('2536', '沐川县', '391');
INSERT INTO `ce_city` VALUES ('2537', '峨边彝族自治县', '391');
INSERT INTO `ce_city` VALUES ('2538', '马边彝族自治县', '391');
INSERT INTO `ce_city` VALUES ('2539', '峨眉山市', '391');
INSERT INTO `ce_city` VALUES ('2540', '顺庆区', '392');
INSERT INTO `ce_city` VALUES ('2541', '高坪区', '392');
INSERT INTO `ce_city` VALUES ('2542', '嘉陵区', '392');
INSERT INTO `ce_city` VALUES ('2543', '南部县', '392');
INSERT INTO `ce_city` VALUES ('2544', '营山县', '392');
INSERT INTO `ce_city` VALUES ('2545', '蓬安县', '392');
INSERT INTO `ce_city` VALUES ('2546', '仪陇县', '392');
INSERT INTO `ce_city` VALUES ('2547', '西充县', '392');
INSERT INTO `ce_city` VALUES ('2548', '阆中市', '392');
INSERT INTO `ce_city` VALUES ('2549', '东坡区', '393');
INSERT INTO `ce_city` VALUES ('2550', '仁寿县', '393');
INSERT INTO `ce_city` VALUES ('2551', '彭山县', '393');
INSERT INTO `ce_city` VALUES ('2552', '洪雅县', '393');
INSERT INTO `ce_city` VALUES ('2553', '丹棱县', '393');
INSERT INTO `ce_city` VALUES ('2554', '青神县', '393');
INSERT INTO `ce_city` VALUES ('2555', '翠屏区', '394');
INSERT INTO `ce_city` VALUES ('2556', '宜宾县', '394');
INSERT INTO `ce_city` VALUES ('2557', '南溪县', '394');
INSERT INTO `ce_city` VALUES ('2558', '江安县', '394');
INSERT INTO `ce_city` VALUES ('2559', '长宁县', '394');
INSERT INTO `ce_city` VALUES ('2560', '高县', '394');
INSERT INTO `ce_city` VALUES ('2561', '珙县', '394');
INSERT INTO `ce_city` VALUES ('2562', '筠连县', '394');
INSERT INTO `ce_city` VALUES ('2563', '兴文县', '394');
INSERT INTO `ce_city` VALUES ('2564', '屏山县', '394');
INSERT INTO `ce_city` VALUES ('2565', '广安区', '395');
INSERT INTO `ce_city` VALUES ('2566', '岳池县', '395');
INSERT INTO `ce_city` VALUES ('2567', '武胜县', '395');
INSERT INTO `ce_city` VALUES ('2568', '邻水县', '395');
INSERT INTO `ce_city` VALUES ('2569', '华蓥市', '395');
INSERT INTO `ce_city` VALUES ('2570', '通川区', '396');
INSERT INTO `ce_city` VALUES ('2571', '达县', '396');
INSERT INTO `ce_city` VALUES ('2572', '宣汉县', '396');
INSERT INTO `ce_city` VALUES ('2573', '开江县', '396');
INSERT INTO `ce_city` VALUES ('2574', '大竹县', '396');
INSERT INTO `ce_city` VALUES ('2575', '渠县', '396');
INSERT INTO `ce_city` VALUES ('2576', '万源市', '396');
INSERT INTO `ce_city` VALUES ('2577', '雨城区', '397');
INSERT INTO `ce_city` VALUES ('2578', '名山县', '397');
INSERT INTO `ce_city` VALUES ('2579', '荥经县', '397');
INSERT INTO `ce_city` VALUES ('2580', '汉源县', '397');
INSERT INTO `ce_city` VALUES ('2581', '石棉县', '397');
INSERT INTO `ce_city` VALUES ('2582', '天全县', '397');
INSERT INTO `ce_city` VALUES ('2583', '芦山县', '397');
INSERT INTO `ce_city` VALUES ('2584', '宝兴县', '397');
INSERT INTO `ce_city` VALUES ('2585', '巴州区', '398');
INSERT INTO `ce_city` VALUES ('2586', '通江县', '398');
INSERT INTO `ce_city` VALUES ('2587', '南江县', '398');
INSERT INTO `ce_city` VALUES ('2588', '平昌县', '398');
INSERT INTO `ce_city` VALUES ('2589', '雁江区', '399');
INSERT INTO `ce_city` VALUES ('2590', '安岳县', '399');
INSERT INTO `ce_city` VALUES ('2591', '乐至县', '399');
INSERT INTO `ce_city` VALUES ('2592', '简阳市', '399');
INSERT INTO `ce_city` VALUES ('2593', '汶川县', '400');
INSERT INTO `ce_city` VALUES ('2594', '理县', '400');
INSERT INTO `ce_city` VALUES ('2595', '茂县', '400');
INSERT INTO `ce_city` VALUES ('2596', '松潘县', '400');
INSERT INTO `ce_city` VALUES ('2597', '九寨沟县', '400');
INSERT INTO `ce_city` VALUES ('2598', '金川县', '400');
INSERT INTO `ce_city` VALUES ('2599', '小金县', '400');
INSERT INTO `ce_city` VALUES ('2600', '黑水县', '400');
INSERT INTO `ce_city` VALUES ('2601', '马尔康县', '400');
INSERT INTO `ce_city` VALUES ('2602', '壤塘县', '400');
INSERT INTO `ce_city` VALUES ('2603', '阿坝县', '400');
INSERT INTO `ce_city` VALUES ('2604', '若尔盖县', '400');
INSERT INTO `ce_city` VALUES ('2605', '红原县', '400');
INSERT INTO `ce_city` VALUES ('2606', '康定县', '401');
INSERT INTO `ce_city` VALUES ('2607', '泸定县', '401');
INSERT INTO `ce_city` VALUES ('2608', '丹巴县', '401');
INSERT INTO `ce_city` VALUES ('2609', '九龙县', '401');
INSERT INTO `ce_city` VALUES ('2610', '雅江县', '401');
INSERT INTO `ce_city` VALUES ('2611', '道孚县', '401');
INSERT INTO `ce_city` VALUES ('2612', '炉霍县', '401');
INSERT INTO `ce_city` VALUES ('2613', '甘孜县', '401');
INSERT INTO `ce_city` VALUES ('2614', '新龙县', '401');
INSERT INTO `ce_city` VALUES ('2615', '德格县', '401');
INSERT INTO `ce_city` VALUES ('2616', '白玉县', '401');
INSERT INTO `ce_city` VALUES ('2617', '石渠县', '401');
INSERT INTO `ce_city` VALUES ('2618', '色达县', '401');
INSERT INTO `ce_city` VALUES ('2619', '理塘县', '401');
INSERT INTO `ce_city` VALUES ('2620', '巴塘县', '401');
INSERT INTO `ce_city` VALUES ('2621', '乡城县', '401');
INSERT INTO `ce_city` VALUES ('2622', '稻城县', '401');
INSERT INTO `ce_city` VALUES ('2623', '得荣县', '401');
INSERT INTO `ce_city` VALUES ('2624', '西昌市', '402');
INSERT INTO `ce_city` VALUES ('2625', '木里藏族自治县', '402');
INSERT INTO `ce_city` VALUES ('2626', '盐源县', '402');
INSERT INTO `ce_city` VALUES ('2627', '德昌县', '402');
INSERT INTO `ce_city` VALUES ('2628', '会理县', '402');
INSERT INTO `ce_city` VALUES ('2629', '会东县', '402');
INSERT INTO `ce_city` VALUES ('2630', '宁南县', '402');
INSERT INTO `ce_city` VALUES ('2631', '普格县', '402');
INSERT INTO `ce_city` VALUES ('2632', '布拖县', '402');
INSERT INTO `ce_city` VALUES ('2633', '金阳县', '402');
INSERT INTO `ce_city` VALUES ('2634', '昭觉县', '402');
INSERT INTO `ce_city` VALUES ('2635', '喜德县', '402');
INSERT INTO `ce_city` VALUES ('2636', '冕宁县', '402');
INSERT INTO `ce_city` VALUES ('2637', '越西县', '402');
INSERT INTO `ce_city` VALUES ('2638', '甘洛县', '402');
INSERT INTO `ce_city` VALUES ('2639', '美姑县', '402');
INSERT INTO `ce_city` VALUES ('2640', '雷波县', '402');
INSERT INTO `ce_city` VALUES ('2641', '南明区', '403');
INSERT INTO `ce_city` VALUES ('2642', '云岩区', '403');
INSERT INTO `ce_city` VALUES ('2643', '花溪区', '403');
INSERT INTO `ce_city` VALUES ('2644', '乌当区', '403');
INSERT INTO `ce_city` VALUES ('2645', '白云区', '403');
INSERT INTO `ce_city` VALUES ('2646', '小河区', '403');
INSERT INTO `ce_city` VALUES ('2647', '开阳县', '403');
INSERT INTO `ce_city` VALUES ('2648', '息烽县', '403');
INSERT INTO `ce_city` VALUES ('2649', '修文县', '403');
INSERT INTO `ce_city` VALUES ('2650', '清镇市', '403');
INSERT INTO `ce_city` VALUES ('2651', '钟山区', '404');
INSERT INTO `ce_city` VALUES ('2652', '六枝特区', '404');
INSERT INTO `ce_city` VALUES ('2653', '水城县', '404');
INSERT INTO `ce_city` VALUES ('2654', '盘县', '404');
INSERT INTO `ce_city` VALUES ('2655', '红花岗区', '405');
INSERT INTO `ce_city` VALUES ('2656', '汇川区', '405');
INSERT INTO `ce_city` VALUES ('2657', '遵义县', '405');
INSERT INTO `ce_city` VALUES ('2658', '桐梓县', '405');
INSERT INTO `ce_city` VALUES ('2659', '绥阳县', '405');
INSERT INTO `ce_city` VALUES ('2660', '正安县', '405');
INSERT INTO `ce_city` VALUES ('2661', '道真仡佬族苗族自治县', '405');
INSERT INTO `ce_city` VALUES ('2662', '务川仡佬族苗族自治县', '405');
INSERT INTO `ce_city` VALUES ('2663', '凤冈县', '405');
INSERT INTO `ce_city` VALUES ('2664', '湄潭县', '405');
INSERT INTO `ce_city` VALUES ('2665', '余庆县', '405');
INSERT INTO `ce_city` VALUES ('2666', '习水县', '405');
INSERT INTO `ce_city` VALUES ('2667', '赤水市', '405');
INSERT INTO `ce_city` VALUES ('2668', '仁怀市', '405');
INSERT INTO `ce_city` VALUES ('2669', '西秀区', '406');
INSERT INTO `ce_city` VALUES ('2670', '平坝县', '406');
INSERT INTO `ce_city` VALUES ('2671', '普定县', '406');
INSERT INTO `ce_city` VALUES ('2672', '镇宁布依族苗族自治县', '406');
INSERT INTO `ce_city` VALUES ('2673', '关岭布依族苗族自治县', '406');
INSERT INTO `ce_city` VALUES ('2674', '紫云苗族布依族自治县', '406');
INSERT INTO `ce_city` VALUES ('2675', '铜仁市', '407');
INSERT INTO `ce_city` VALUES ('2676', '江口县', '407');
INSERT INTO `ce_city` VALUES ('2677', '玉屏侗族自治县', '407');
INSERT INTO `ce_city` VALUES ('2678', '石阡县', '407');
INSERT INTO `ce_city` VALUES ('2679', '思南县', '407');
INSERT INTO `ce_city` VALUES ('2680', '印江土家族苗族自治县', '407');
INSERT INTO `ce_city` VALUES ('2681', '德江县', '407');
INSERT INTO `ce_city` VALUES ('2682', '沿河土家族自治县', '407');
INSERT INTO `ce_city` VALUES ('2683', '松桃苗族自治县', '407');
INSERT INTO `ce_city` VALUES ('2684', '万山特区', '407');
INSERT INTO `ce_city` VALUES ('2685', '兴义市', '408');
INSERT INTO `ce_city` VALUES ('2686', '兴仁县', '408');
INSERT INTO `ce_city` VALUES ('2687', '普安县', '408');
INSERT INTO `ce_city` VALUES ('2688', '晴隆县', '408');
INSERT INTO `ce_city` VALUES ('2689', '贞丰县', '408');
INSERT INTO `ce_city` VALUES ('2690', '望谟县', '408');
INSERT INTO `ce_city` VALUES ('2691', '册亨县', '408');
INSERT INTO `ce_city` VALUES ('2692', '安龙县', '408');
INSERT INTO `ce_city` VALUES ('2693', '毕节市', '409');
INSERT INTO `ce_city` VALUES ('2694', '大方县', '409');
INSERT INTO `ce_city` VALUES ('2695', '黔西县', '409');
INSERT INTO `ce_city` VALUES ('2696', '金沙县', '409');
INSERT INTO `ce_city` VALUES ('2697', '织金县', '409');
INSERT INTO `ce_city` VALUES ('2698', '纳雍县', '409');
INSERT INTO `ce_city` VALUES ('2699', '威宁彝族回族苗族自治县', '409');
INSERT INTO `ce_city` VALUES ('2700', '赫章县', '409');
INSERT INTO `ce_city` VALUES ('2701', '凯里市', '410');
INSERT INTO `ce_city` VALUES ('2702', '黄平县', '410');
INSERT INTO `ce_city` VALUES ('2703', '施秉县', '410');
INSERT INTO `ce_city` VALUES ('2704', '三穗县', '410');
INSERT INTO `ce_city` VALUES ('2705', '镇远县', '410');
INSERT INTO `ce_city` VALUES ('2706', '岑巩县', '410');
INSERT INTO `ce_city` VALUES ('2707', '天柱县', '410');
INSERT INTO `ce_city` VALUES ('2708', '锦屏县', '410');
INSERT INTO `ce_city` VALUES ('2709', '剑河县', '410');
INSERT INTO `ce_city` VALUES ('2710', '台江县', '410');
INSERT INTO `ce_city` VALUES ('2711', '黎平县', '410');
INSERT INTO `ce_city` VALUES ('2712', '榕江县', '410');
INSERT INTO `ce_city` VALUES ('2713', '从江县', '410');
INSERT INTO `ce_city` VALUES ('2714', '雷山县', '410');
INSERT INTO `ce_city` VALUES ('2715', '麻江县', '410');
INSERT INTO `ce_city` VALUES ('2716', '丹寨县', '410');
INSERT INTO `ce_city` VALUES ('2717', '都匀市', '411');
INSERT INTO `ce_city` VALUES ('2718', '福泉市', '411');
INSERT INTO `ce_city` VALUES ('2719', '荔波县', '411');
INSERT INTO `ce_city` VALUES ('2720', '贵定县', '411');
INSERT INTO `ce_city` VALUES ('2721', '瓮安县', '411');
INSERT INTO `ce_city` VALUES ('2722', '独山县', '411');
INSERT INTO `ce_city` VALUES ('2723', '平塘县', '411');
INSERT INTO `ce_city` VALUES ('2724', '罗甸县', '411');
INSERT INTO `ce_city` VALUES ('2725', '长顺县', '411');
INSERT INTO `ce_city` VALUES ('2726', '龙里县', '411');
INSERT INTO `ce_city` VALUES ('2727', '惠水县', '411');
INSERT INTO `ce_city` VALUES ('2728', '三都水族自治县', '411');
INSERT INTO `ce_city` VALUES ('2729', '五华区', '412');
INSERT INTO `ce_city` VALUES ('2730', '盘龙区', '412');
INSERT INTO `ce_city` VALUES ('2731', '官渡区', '412');
INSERT INTO `ce_city` VALUES ('2732', '西山区', '412');
INSERT INTO `ce_city` VALUES ('2733', '东川区', '412');
INSERT INTO `ce_city` VALUES ('2734', '呈贡县', '412');
INSERT INTO `ce_city` VALUES ('2735', '晋宁县', '412');
INSERT INTO `ce_city` VALUES ('2736', '富民县', '412');
INSERT INTO `ce_city` VALUES ('2737', '宜良县', '412');
INSERT INTO `ce_city` VALUES ('2738', '石林彝族自治县', '412');
INSERT INTO `ce_city` VALUES ('2739', '嵩明县', '412');
INSERT INTO `ce_city` VALUES ('2740', '禄劝彝族苗族自治县', '412');
INSERT INTO `ce_city` VALUES ('2741', '寻甸回族彝族自治县', '412');
INSERT INTO `ce_city` VALUES ('2742', '安宁市', '412');
INSERT INTO `ce_city` VALUES ('2743', '麒麟区', '413');
INSERT INTO `ce_city` VALUES ('2744', '马龙县', '413');
INSERT INTO `ce_city` VALUES ('2745', '陆良县', '413');
INSERT INTO `ce_city` VALUES ('2746', '师宗县', '413');
INSERT INTO `ce_city` VALUES ('2747', '罗平县', '413');
INSERT INTO `ce_city` VALUES ('2748', '富源县', '413');
INSERT INTO `ce_city` VALUES ('2749', '会泽县', '413');
INSERT INTO `ce_city` VALUES ('2750', '沾益县', '413');
INSERT INTO `ce_city` VALUES ('2751', '宣威市', '413');
INSERT INTO `ce_city` VALUES ('2752', '红塔区', '414');
INSERT INTO `ce_city` VALUES ('2753', '江川县', '414');
INSERT INTO `ce_city` VALUES ('2754', '澄江县', '414');
INSERT INTO `ce_city` VALUES ('2755', '通海县', '414');
INSERT INTO `ce_city` VALUES ('2756', '华宁县', '414');
INSERT INTO `ce_city` VALUES ('2757', '易门县', '414');
INSERT INTO `ce_city` VALUES ('2758', '峨山彝族自治县', '414');
INSERT INTO `ce_city` VALUES ('2759', '新平彝族傣族自治县', '414');
INSERT INTO `ce_city` VALUES ('2760', '元江哈尼族彝族傣族自治县', '414');
INSERT INTO `ce_city` VALUES ('2761', '隆阳区', '415');
INSERT INTO `ce_city` VALUES ('2762', '施甸县', '415');
INSERT INTO `ce_city` VALUES ('2763', '腾冲县', '415');
INSERT INTO `ce_city` VALUES ('2764', '龙陵县', '415');
INSERT INTO `ce_city` VALUES ('2765', '昌宁县', '415');
INSERT INTO `ce_city` VALUES ('2766', '昭阳区', '416');
INSERT INTO `ce_city` VALUES ('2767', '鲁甸县', '416');
INSERT INTO `ce_city` VALUES ('2768', '巧家县', '416');
INSERT INTO `ce_city` VALUES ('2769', '盐津县', '416');
INSERT INTO `ce_city` VALUES ('2770', '大关县', '416');
INSERT INTO `ce_city` VALUES ('2771', '永善县', '416');
INSERT INTO `ce_city` VALUES ('2772', '绥江县', '416');
INSERT INTO `ce_city` VALUES ('2773', '镇雄县', '416');
INSERT INTO `ce_city` VALUES ('2774', '彝良县', '416');
INSERT INTO `ce_city` VALUES ('2775', '威信县', '416');
INSERT INTO `ce_city` VALUES ('2776', '水富县', '416');
INSERT INTO `ce_city` VALUES ('2777', '古城区', '417');
INSERT INTO `ce_city` VALUES ('2778', '玉龙纳西族自治县', '417');
INSERT INTO `ce_city` VALUES ('2779', '永胜县', '417');
INSERT INTO `ce_city` VALUES ('2780', '华坪县', '417');
INSERT INTO `ce_city` VALUES ('2781', '宁蒗彝族自治县', '417');
INSERT INTO `ce_city` VALUES ('2782', '翠云区', '418');
INSERT INTO `ce_city` VALUES ('2783', '普洱哈尼族彝族自治县', '418');
INSERT INTO `ce_city` VALUES ('2784', '墨江哈尼族自治县', '418');
INSERT INTO `ce_city` VALUES ('2785', '景东彝族自治县', '418');
INSERT INTO `ce_city` VALUES ('2786', '景谷傣族彝族自治县', '418');
INSERT INTO `ce_city` VALUES ('2787', '镇沅彝族哈尼族拉祜族自治县', '418');
INSERT INTO `ce_city` VALUES ('2788', '江城哈尼族彝族自治县', '418');
INSERT INTO `ce_city` VALUES ('2789', '孟连傣族拉祜族佤族自治县', '418');
INSERT INTO `ce_city` VALUES ('2790', '澜沧拉祜族自治县', '418');
INSERT INTO `ce_city` VALUES ('2791', '西盟佤族自治县', '418');
INSERT INTO `ce_city` VALUES ('2792', '临翔区', '419');
INSERT INTO `ce_city` VALUES ('2793', '凤庆县', '419');
INSERT INTO `ce_city` VALUES ('2794', '云县', '419');
INSERT INTO `ce_city` VALUES ('2795', '永德县', '419');
INSERT INTO `ce_city` VALUES ('2796', '镇康县', '419');
INSERT INTO `ce_city` VALUES ('2797', '双江拉祜族佤族布朗族傣族自治县', '419');
INSERT INTO `ce_city` VALUES ('2798', '耿马傣族佤族自治县', '419');
INSERT INTO `ce_city` VALUES ('2799', '沧源佤族自治县', '420');
INSERT INTO `ce_city` VALUES ('2800', '楚雄市', '420');
INSERT INTO `ce_city` VALUES ('2801', '双柏县', '420');
INSERT INTO `ce_city` VALUES ('2802', '牟定县', '420');
INSERT INTO `ce_city` VALUES ('2803', '南华县', '420');
INSERT INTO `ce_city` VALUES ('2804', '姚安县', '420');
INSERT INTO `ce_city` VALUES ('2805', '大姚县', '420');
INSERT INTO `ce_city` VALUES ('2806', '永仁县', '420');
INSERT INTO `ce_city` VALUES ('2807', '元谋县', '420');
INSERT INTO `ce_city` VALUES ('2808', '武定县', '420');
INSERT INTO `ce_city` VALUES ('2809', '禄丰县', '420');
INSERT INTO `ce_city` VALUES ('2810', '个旧市', '421');
INSERT INTO `ce_city` VALUES ('2811', '开远市', '421');
INSERT INTO `ce_city` VALUES ('2812', '蒙自县', '421');
INSERT INTO `ce_city` VALUES ('2813', '屏边苗族自治县', '421');
INSERT INTO `ce_city` VALUES ('2814', '建水县', '421');
INSERT INTO `ce_city` VALUES ('2815', '石屏县', '421');
INSERT INTO `ce_city` VALUES ('2816', '弥勒县', '421');
INSERT INTO `ce_city` VALUES ('2817', '泸西县', '421');
INSERT INTO `ce_city` VALUES ('2818', '元阳县', '421');
INSERT INTO `ce_city` VALUES ('2819', '红河县', '421');
INSERT INTO `ce_city` VALUES ('2820', '金平苗族瑶族傣族自治县', '421');
INSERT INTO `ce_city` VALUES ('2821', '绿春县', '421');
INSERT INTO `ce_city` VALUES ('2822', '河口瑶族自治县', '421');
INSERT INTO `ce_city` VALUES ('2823', '文山县', '422');
INSERT INTO `ce_city` VALUES ('2824', '砚山县', '422');
INSERT INTO `ce_city` VALUES ('2825', '西畴县', '422');
INSERT INTO `ce_city` VALUES ('2826', '麻栗坡县', '422');
INSERT INTO `ce_city` VALUES ('2827', '马关县', '422');
INSERT INTO `ce_city` VALUES ('2828', '丘北县', '422');
INSERT INTO `ce_city` VALUES ('2829', '广南县', '422');
INSERT INTO `ce_city` VALUES ('2830', '富宁县', '422');
INSERT INTO `ce_city` VALUES ('2831', '景洪市', '423');
INSERT INTO `ce_city` VALUES ('2832', '勐海县', '423');
INSERT INTO `ce_city` VALUES ('2833', '勐腊县', '423');
INSERT INTO `ce_city` VALUES ('2834', '大理市', '424');
INSERT INTO `ce_city` VALUES ('2835', '漾濞彝族自治县', '424');
INSERT INTO `ce_city` VALUES ('2836', '祥云县', '424');
INSERT INTO `ce_city` VALUES ('2837', '宾川县', '424');
INSERT INTO `ce_city` VALUES ('2838', '弥渡县', '424');
INSERT INTO `ce_city` VALUES ('2839', '南涧彝族自治县', '424');
INSERT INTO `ce_city` VALUES ('2840', '巍山彝族回族自治县', '424');
INSERT INTO `ce_city` VALUES ('2841', '永平县', '424');
INSERT INTO `ce_city` VALUES ('2842', '云龙县', '424');
INSERT INTO `ce_city` VALUES ('2843', '洱源县', '424');
INSERT INTO `ce_city` VALUES ('2844', '剑川县', '424');
INSERT INTO `ce_city` VALUES ('2845', '鹤庆县', '424');
INSERT INTO `ce_city` VALUES ('2846', '瑞丽市', '425');
INSERT INTO `ce_city` VALUES ('2847', '潞西市', '425');
INSERT INTO `ce_city` VALUES ('2848', '梁河县', '425');
INSERT INTO `ce_city` VALUES ('2849', '盈江县', '425');
INSERT INTO `ce_city` VALUES ('2850', '陇川县', '425');
INSERT INTO `ce_city` VALUES ('2851', '泸水县', '426');
INSERT INTO `ce_city` VALUES ('2852', '福贡县', '426');
INSERT INTO `ce_city` VALUES ('2853', '贡山独龙族怒族自治县', '426');
INSERT INTO `ce_city` VALUES ('2854', '兰坪白族普米族自治县', '426');
INSERT INTO `ce_city` VALUES ('2855', '香格里拉县', '427');
INSERT INTO `ce_city` VALUES ('2856', '德钦县', '427');
INSERT INTO `ce_city` VALUES ('2857', '维西傈僳族自治县', '427');
INSERT INTO `ce_city` VALUES ('2858', '城关区', '428');
INSERT INTO `ce_city` VALUES ('2859', '林周县', '428');
INSERT INTO `ce_city` VALUES ('2860', '当雄县', '428');
INSERT INTO `ce_city` VALUES ('2861', '尼木县', '428');
INSERT INTO `ce_city` VALUES ('2862', '曲水县', '428');
INSERT INTO `ce_city` VALUES ('2863', '堆龙德庆县', '428');
INSERT INTO `ce_city` VALUES ('2864', '达孜县', '428');
INSERT INTO `ce_city` VALUES ('2865', '墨竹工卡县', '428');
INSERT INTO `ce_city` VALUES ('2866', '昌都县', '429');
INSERT INTO `ce_city` VALUES ('2867', '江达县', '429');
INSERT INTO `ce_city` VALUES ('2868', '贡觉县', '429');
INSERT INTO `ce_city` VALUES ('2869', '类乌齐县', '429');
INSERT INTO `ce_city` VALUES ('2870', '丁青县', '429');
INSERT INTO `ce_city` VALUES ('2871', '察雅县', '429');
INSERT INTO `ce_city` VALUES ('2872', '八宿县', '429');
INSERT INTO `ce_city` VALUES ('2873', '左贡县', '429');
INSERT INTO `ce_city` VALUES ('2874', '芒康县', '429');
INSERT INTO `ce_city` VALUES ('2875', '洛隆县', '429');
INSERT INTO `ce_city` VALUES ('2876', '边坝县', '429');
INSERT INTO `ce_city` VALUES ('2877', '乃东县', '430');
INSERT INTO `ce_city` VALUES ('2878', '扎囊县', '430');
INSERT INTO `ce_city` VALUES ('2879', '贡嘎县', '430');
INSERT INTO `ce_city` VALUES ('2880', '桑日县', '430');
INSERT INTO `ce_city` VALUES ('2881', '琼结县', '430');
INSERT INTO `ce_city` VALUES ('2882', '曲松县', '430');
INSERT INTO `ce_city` VALUES ('2883', '措美县', '430');
INSERT INTO `ce_city` VALUES ('2884', '洛扎县', '430');
INSERT INTO `ce_city` VALUES ('2885', '加查县', '430');
INSERT INTO `ce_city` VALUES ('2886', '隆子县', '430');
INSERT INTO `ce_city` VALUES ('2887', '错那县', '430');
INSERT INTO `ce_city` VALUES ('2888', '浪卡子县', '430');
INSERT INTO `ce_city` VALUES ('2889', '日喀则市', '431');
INSERT INTO `ce_city` VALUES ('2890', '南木林县', '431');
INSERT INTO `ce_city` VALUES ('2891', '江孜县', '431');
INSERT INTO `ce_city` VALUES ('2892', '定日县', '431');
INSERT INTO `ce_city` VALUES ('2893', '萨迦县', '431');
INSERT INTO `ce_city` VALUES ('2894', '拉孜县', '431');
INSERT INTO `ce_city` VALUES ('2895', '昂仁县', '431');
INSERT INTO `ce_city` VALUES ('2896', '谢通门县', '431');
INSERT INTO `ce_city` VALUES ('2897', '白朗县', '431');
INSERT INTO `ce_city` VALUES ('2898', '仁布县', '431');
INSERT INTO `ce_city` VALUES ('2899', '康马县', '431');
INSERT INTO `ce_city` VALUES ('2900', '定结县', '431');
INSERT INTO `ce_city` VALUES ('2901', '仲巴县', '431');
INSERT INTO `ce_city` VALUES ('2902', '亚东县', '431');
INSERT INTO `ce_city` VALUES ('2903', '吉隆县', '431');
INSERT INTO `ce_city` VALUES ('2904', '聂拉木县', '431');
INSERT INTO `ce_city` VALUES ('2905', '萨嘎县', '431');
INSERT INTO `ce_city` VALUES ('2906', '岗巴县', '431');
INSERT INTO `ce_city` VALUES ('2907', '那曲县', '432');
INSERT INTO `ce_city` VALUES ('2908', '嘉黎县', '432');
INSERT INTO `ce_city` VALUES ('2909', '比如县', '432');
INSERT INTO `ce_city` VALUES ('2910', '聂荣县', '432');
INSERT INTO `ce_city` VALUES ('2911', '安多县', '432');
INSERT INTO `ce_city` VALUES ('2912', '申扎县', '432');
INSERT INTO `ce_city` VALUES ('2913', '索县', '432');
INSERT INTO `ce_city` VALUES ('2914', '班戈县', '432');
INSERT INTO `ce_city` VALUES ('2915', '巴青县', '432');
INSERT INTO `ce_city` VALUES ('2916', '尼玛县', '432');
INSERT INTO `ce_city` VALUES ('2917', '普兰县', '433');
INSERT INTO `ce_city` VALUES ('2918', '札达县', '433');
INSERT INTO `ce_city` VALUES ('2919', '噶尔县', '433');
INSERT INTO `ce_city` VALUES ('2920', '日土县', '433');
INSERT INTO `ce_city` VALUES ('2921', '革吉县', '433');
INSERT INTO `ce_city` VALUES ('2922', '改则县', '433');
INSERT INTO `ce_city` VALUES ('2923', '措勤县', '433');
INSERT INTO `ce_city` VALUES ('2924', '林芝县', '434');
INSERT INTO `ce_city` VALUES ('2925', '工布江达县', '434');
INSERT INTO `ce_city` VALUES ('2926', '米林县', '434');
INSERT INTO `ce_city` VALUES ('2927', '墨脱县', '434');
INSERT INTO `ce_city` VALUES ('2928', '波密县', '434');
INSERT INTO `ce_city` VALUES ('2929', '察隅县', '434');
INSERT INTO `ce_city` VALUES ('2930', '朗县', '434');
INSERT INTO `ce_city` VALUES ('2931', '新城区', '435');
INSERT INTO `ce_city` VALUES ('2932', '碑林区', '435');
INSERT INTO `ce_city` VALUES ('2933', '莲湖区', '435');
INSERT INTO `ce_city` VALUES ('2934', '灞桥区', '435');
INSERT INTO `ce_city` VALUES ('2935', '未央区', '435');
INSERT INTO `ce_city` VALUES ('2936', '雁塔区', '435');
INSERT INTO `ce_city` VALUES ('2937', '阎良区', '435');
INSERT INTO `ce_city` VALUES ('2938', '临潼区', '435');
INSERT INTO `ce_city` VALUES ('2939', '长安区', '435');
INSERT INTO `ce_city` VALUES ('2940', '蓝田县', '435');
INSERT INTO `ce_city` VALUES ('2941', '周至县', '435');
INSERT INTO `ce_city` VALUES ('2942', '户县', '435');
INSERT INTO `ce_city` VALUES ('2943', '高陵县', '435');
INSERT INTO `ce_city` VALUES ('2944', '王益区', '436');
INSERT INTO `ce_city` VALUES ('2945', '印台区', '436');
INSERT INTO `ce_city` VALUES ('2946', '耀州区', '436');
INSERT INTO `ce_city` VALUES ('2947', '宜君县', '436');
INSERT INTO `ce_city` VALUES ('2948', '渭滨区', '437');
INSERT INTO `ce_city` VALUES ('2949', '金台区', '437');
INSERT INTO `ce_city` VALUES ('2950', '陈仓区', '437');
INSERT INTO `ce_city` VALUES ('2951', '凤翔县', '437');
INSERT INTO `ce_city` VALUES ('2952', '岐山县', '437');
INSERT INTO `ce_city` VALUES ('2953', '扶风县', '437');
INSERT INTO `ce_city` VALUES ('2954', '眉县', '437');
INSERT INTO `ce_city` VALUES ('2955', '陇县', '437');
INSERT INTO `ce_city` VALUES ('2956', '千阳县', '437');
INSERT INTO `ce_city` VALUES ('2957', '麟游县', '437');
INSERT INTO `ce_city` VALUES ('2958', '凤县', '437');
INSERT INTO `ce_city` VALUES ('2959', '太白县', '437');
INSERT INTO `ce_city` VALUES ('2960', '秦都区', '438');
INSERT INTO `ce_city` VALUES ('2961', '杨凌区', '438');
INSERT INTO `ce_city` VALUES ('2962', '渭城区', '438');
INSERT INTO `ce_city` VALUES ('2963', '三原县', '438');
INSERT INTO `ce_city` VALUES ('2964', '泾阳县', '438');
INSERT INTO `ce_city` VALUES ('2965', '乾县', '438');
INSERT INTO `ce_city` VALUES ('2966', '礼泉县', '438');
INSERT INTO `ce_city` VALUES ('2967', '永寿县', '438');
INSERT INTO `ce_city` VALUES ('2968', '彬县', '438');
INSERT INTO `ce_city` VALUES ('2969', '长武县', '438');
INSERT INTO `ce_city` VALUES ('2970', '旬邑县', '438');
INSERT INTO `ce_city` VALUES ('2971', '淳化县', '438');
INSERT INTO `ce_city` VALUES ('2972', '武功县', '438');
INSERT INTO `ce_city` VALUES ('2973', '兴平市', '438');
INSERT INTO `ce_city` VALUES ('2974', '临渭区', '439');
INSERT INTO `ce_city` VALUES ('2975', '华县', '439');
INSERT INTO `ce_city` VALUES ('2976', '潼关县', '439');
INSERT INTO `ce_city` VALUES ('2977', '大荔县', '439');
INSERT INTO `ce_city` VALUES ('2978', '合阳县', '439');
INSERT INTO `ce_city` VALUES ('2979', '澄城县', '439');
INSERT INTO `ce_city` VALUES ('2980', '蒲城县', '439');
INSERT INTO `ce_city` VALUES ('2981', '白水县', '439');
INSERT INTO `ce_city` VALUES ('2982', '富平县', '439');
INSERT INTO `ce_city` VALUES ('2983', '韩城市', '439');
INSERT INTO `ce_city` VALUES ('2984', '华阴市', '439');
INSERT INTO `ce_city` VALUES ('2985', '宝塔区', '440');
INSERT INTO `ce_city` VALUES ('2986', '延长县', '440');
INSERT INTO `ce_city` VALUES ('2987', '延川县', '440');
INSERT INTO `ce_city` VALUES ('2988', '子长县', '440');
INSERT INTO `ce_city` VALUES ('2989', '安塞县', '440');
INSERT INTO `ce_city` VALUES ('2990', '志丹县', '440');
INSERT INTO `ce_city` VALUES ('2991', '吴起县', '440');
INSERT INTO `ce_city` VALUES ('2992', '甘泉县', '440');
INSERT INTO `ce_city` VALUES ('2993', '富县', '440');
INSERT INTO `ce_city` VALUES ('2994', '洛川县', '440');
INSERT INTO `ce_city` VALUES ('2995', '宜川县', '440');
INSERT INTO `ce_city` VALUES ('2996', '黄龙县', '440');
INSERT INTO `ce_city` VALUES ('2997', '黄陵县', '440');
INSERT INTO `ce_city` VALUES ('2998', '汉台区', '441');
INSERT INTO `ce_city` VALUES ('2999', '南郑县', '441');
INSERT INTO `ce_city` VALUES ('3000', '城固县', '441');
INSERT INTO `ce_city` VALUES ('3001', '洋县', '441');
INSERT INTO `ce_city` VALUES ('3002', '西乡县', '441');
INSERT INTO `ce_city` VALUES ('3003', '勉县', '441');
INSERT INTO `ce_city` VALUES ('3004', '宁强县', '441');
INSERT INTO `ce_city` VALUES ('3005', '略阳县', '441');
INSERT INTO `ce_city` VALUES ('3006', '镇巴县', '441');
INSERT INTO `ce_city` VALUES ('3007', '留坝县', '441');
INSERT INTO `ce_city` VALUES ('3008', '佛坪县', '441');
INSERT INTO `ce_city` VALUES ('3009', '榆阳区', '442');
INSERT INTO `ce_city` VALUES ('3010', '神木县', '442');
INSERT INTO `ce_city` VALUES ('3011', '府谷县', '442');
INSERT INTO `ce_city` VALUES ('3012', '横山县', '442');
INSERT INTO `ce_city` VALUES ('3013', '靖边县', '442');
INSERT INTO `ce_city` VALUES ('3014', '定边县', '442');
INSERT INTO `ce_city` VALUES ('3015', '绥德县', '442');
INSERT INTO `ce_city` VALUES ('3016', '米脂县', '442');
INSERT INTO `ce_city` VALUES ('3017', '佳县', '442');
INSERT INTO `ce_city` VALUES ('3018', '吴堡县', '442');
INSERT INTO `ce_city` VALUES ('3019', '清涧县', '442');
INSERT INTO `ce_city` VALUES ('3020', '子洲县', '442');
INSERT INTO `ce_city` VALUES ('3021', '汉滨区', '443');
INSERT INTO `ce_city` VALUES ('3022', '汉阴县', '443');
INSERT INTO `ce_city` VALUES ('3023', '石泉县', '443');
INSERT INTO `ce_city` VALUES ('3024', '宁陕县', '443');
INSERT INTO `ce_city` VALUES ('3025', '紫阳县', '443');
INSERT INTO `ce_city` VALUES ('3026', '岚皋县', '443');
INSERT INTO `ce_city` VALUES ('3027', '平利县', '443');
INSERT INTO `ce_city` VALUES ('3028', '镇坪县', '443');
INSERT INTO `ce_city` VALUES ('3029', '旬阳县', '443');
INSERT INTO `ce_city` VALUES ('3030', '白河县', '443');
INSERT INTO `ce_city` VALUES ('3031', '商州区', '444');
INSERT INTO `ce_city` VALUES ('3032', '洛南县', '444');
INSERT INTO `ce_city` VALUES ('3033', '丹凤县', '444');
INSERT INTO `ce_city` VALUES ('3034', '商南县', '444');
INSERT INTO `ce_city` VALUES ('3035', '山阳县', '444');
INSERT INTO `ce_city` VALUES ('3036', '镇安县', '444');
INSERT INTO `ce_city` VALUES ('3037', '柞水县', '444');
INSERT INTO `ce_city` VALUES ('3038', '城关区', '445');
INSERT INTO `ce_city` VALUES ('3039', '七里河区', '445');
INSERT INTO `ce_city` VALUES ('3040', '西固区', '445');
INSERT INTO `ce_city` VALUES ('3041', '安宁区', '445');
INSERT INTO `ce_city` VALUES ('3042', '红古区', '445');
INSERT INTO `ce_city` VALUES ('3043', '永登县', '445');
INSERT INTO `ce_city` VALUES ('3044', '皋兰县', '445');
INSERT INTO `ce_city` VALUES ('3045', '榆中县', '445');
INSERT INTO `ce_city` VALUES ('3046', '金川区', '447');
INSERT INTO `ce_city` VALUES ('3047', '永昌县', '447');
INSERT INTO `ce_city` VALUES ('3048', '白银区', '448');
INSERT INTO `ce_city` VALUES ('3049', '平川区', '448');
INSERT INTO `ce_city` VALUES ('3050', '靖远县', '448');
INSERT INTO `ce_city` VALUES ('3051', '会宁县', '448');
INSERT INTO `ce_city` VALUES ('3052', '景泰县', '448');
INSERT INTO `ce_city` VALUES ('3053', '秦城区', '449');
INSERT INTO `ce_city` VALUES ('3054', '北道区', '449');
INSERT INTO `ce_city` VALUES ('3055', '清水县', '449');
INSERT INTO `ce_city` VALUES ('3056', '秦安县', '449');
INSERT INTO `ce_city` VALUES ('3057', '甘谷县', '449');
INSERT INTO `ce_city` VALUES ('3058', '武山县', '449');
INSERT INTO `ce_city` VALUES ('3059', '张家川回族自治县', '449');
INSERT INTO `ce_city` VALUES ('3060', '凉州区', '450');
INSERT INTO `ce_city` VALUES ('3061', '民勤县', '450');
INSERT INTO `ce_city` VALUES ('3062', '古浪县', '450');
INSERT INTO `ce_city` VALUES ('3063', '天祝藏族自治县', '450');
INSERT INTO `ce_city` VALUES ('3064', '甘州区', '451');
INSERT INTO `ce_city` VALUES ('3065', '肃南裕固族自治县', '451');
INSERT INTO `ce_city` VALUES ('3066', '民乐县', '451');
INSERT INTO `ce_city` VALUES ('3067', '临泽县', '451');
INSERT INTO `ce_city` VALUES ('3068', '高台县', '451');
INSERT INTO `ce_city` VALUES ('3069', '山丹县', '451');
INSERT INTO `ce_city` VALUES ('3070', '崆峒区', '452');
INSERT INTO `ce_city` VALUES ('3071', '泾川县', '452');
INSERT INTO `ce_city` VALUES ('3072', '灵台县', '452');
INSERT INTO `ce_city` VALUES ('3073', '崇信县', '452');
INSERT INTO `ce_city` VALUES ('3074', '华亭县', '452');
INSERT INTO `ce_city` VALUES ('3075', '庄浪县', '452');
INSERT INTO `ce_city` VALUES ('3076', '静宁县', '452');
INSERT INTO `ce_city` VALUES ('3077', '肃州区', '453');
INSERT INTO `ce_city` VALUES ('3078', '金塔县', '453');
INSERT INTO `ce_city` VALUES ('3079', '瓜州县', '453');
INSERT INTO `ce_city` VALUES ('3080', '肃北蒙古族自治县', '453');
INSERT INTO `ce_city` VALUES ('3081', '阿克塞哈萨克族自治县', '453');
INSERT INTO `ce_city` VALUES ('3082', '玉门市', '453');
INSERT INTO `ce_city` VALUES ('3083', '敦煌市', '453');
INSERT INTO `ce_city` VALUES ('3084', '西峰区', '454');
INSERT INTO `ce_city` VALUES ('3085', '庆城县', '454');
INSERT INTO `ce_city` VALUES ('3086', '环县', '454');
INSERT INTO `ce_city` VALUES ('3087', '华池县', '454');
INSERT INTO `ce_city` VALUES ('3088', '合水县', '454');
INSERT INTO `ce_city` VALUES ('3089', '正宁县', '454');
INSERT INTO `ce_city` VALUES ('3090', '宁县', '454');
INSERT INTO `ce_city` VALUES ('3091', '镇原县', '454');
INSERT INTO `ce_city` VALUES ('3092', '安定区', '455');
INSERT INTO `ce_city` VALUES ('3093', '通渭县', '455');
INSERT INTO `ce_city` VALUES ('3094', '陇西县', '455');
INSERT INTO `ce_city` VALUES ('3095', '渭源县', '455');
INSERT INTO `ce_city` VALUES ('3096', '临洮县', '455');
INSERT INTO `ce_city` VALUES ('3097', '漳县', '455');
INSERT INTO `ce_city` VALUES ('3098', '岷县', '455');
INSERT INTO `ce_city` VALUES ('3099', '武都区', '456');
INSERT INTO `ce_city` VALUES ('3100', '成县', '456');
INSERT INTO `ce_city` VALUES ('3101', '文县', '456');
INSERT INTO `ce_city` VALUES ('3102', '宕昌县', '456');
INSERT INTO `ce_city` VALUES ('3103', '康县', '456');
INSERT INTO `ce_city` VALUES ('3104', '西和县', '456');
INSERT INTO `ce_city` VALUES ('3105', '礼县', '456');
INSERT INTO `ce_city` VALUES ('3106', '徽县', '456');
INSERT INTO `ce_city` VALUES ('3107', '两当县', '456');
INSERT INTO `ce_city` VALUES ('3108', '临夏市', '457');
INSERT INTO `ce_city` VALUES ('3109', '临夏县', '457');
INSERT INTO `ce_city` VALUES ('3110', '康乐县', '457');
INSERT INTO `ce_city` VALUES ('3111', '永靖县', '457');
INSERT INTO `ce_city` VALUES ('3112', '广河县', '457');
INSERT INTO `ce_city` VALUES ('3113', '和政县', '457');
INSERT INTO `ce_city` VALUES ('3114', '东乡族自治县', '457');
INSERT INTO `ce_city` VALUES ('3115', '积石山保安族东乡族撒拉族自治县', '457');
INSERT INTO `ce_city` VALUES ('3116', '合作市', '458');
INSERT INTO `ce_city` VALUES ('3117', '临潭县', '458');
INSERT INTO `ce_city` VALUES ('3118', '卓尼县', '458');
INSERT INTO `ce_city` VALUES ('3119', '舟曲县', '458');
INSERT INTO `ce_city` VALUES ('3120', '迭部县', '458');
INSERT INTO `ce_city` VALUES ('3121', '玛曲县', '458');
INSERT INTO `ce_city` VALUES ('3122', '碌曲县', '458');
INSERT INTO `ce_city` VALUES ('3123', '夏河县', '458');
INSERT INTO `ce_city` VALUES ('3124', '城东区', '459');
INSERT INTO `ce_city` VALUES ('3125', '城中区', '459');
INSERT INTO `ce_city` VALUES ('3126', '城西区', '459');
INSERT INTO `ce_city` VALUES ('3127', '城北区', '459');
INSERT INTO `ce_city` VALUES ('3128', '大通回族土族自治县', '459');
INSERT INTO `ce_city` VALUES ('3129', '湟中县', '459');
INSERT INTO `ce_city` VALUES ('3130', '湟源县', '459');
INSERT INTO `ce_city` VALUES ('3131', '平安县', '460');
INSERT INTO `ce_city` VALUES ('3132', '民和回族土族自治县', '460');
INSERT INTO `ce_city` VALUES ('3133', '乐都县', '460');
INSERT INTO `ce_city` VALUES ('3134', '互助土族自治县', '460');
INSERT INTO `ce_city` VALUES ('3135', '化隆回族自治县', '460');
INSERT INTO `ce_city` VALUES ('3136', '循化撒拉族自治县', '460');
INSERT INTO `ce_city` VALUES ('3137', '门源回族自治县', '461');
INSERT INTO `ce_city` VALUES ('3138', '祁连县', '461');
INSERT INTO `ce_city` VALUES ('3139', '海晏县', '461');
INSERT INTO `ce_city` VALUES ('3140', '刚察县', '461');
INSERT INTO `ce_city` VALUES ('3141', '同仁县', '462');
INSERT INTO `ce_city` VALUES ('3142', '尖扎县', '462');
INSERT INTO `ce_city` VALUES ('3143', '泽库县', '462');
INSERT INTO `ce_city` VALUES ('3144', '河南蒙古族自治县', '462');
INSERT INTO `ce_city` VALUES ('3145', '共和县', '463');
INSERT INTO `ce_city` VALUES ('3146', '同德县', '463');
INSERT INTO `ce_city` VALUES ('3147', '贵德县', '463');
INSERT INTO `ce_city` VALUES ('3148', '兴海县', '463');
INSERT INTO `ce_city` VALUES ('3149', '贵南县', '463');
INSERT INTO `ce_city` VALUES ('3150', '玛沁县', '464');
INSERT INTO `ce_city` VALUES ('3151', '班玛县', '464');
INSERT INTO `ce_city` VALUES ('3152', '甘德县', '464');
INSERT INTO `ce_city` VALUES ('3153', '达日县', '464');
INSERT INTO `ce_city` VALUES ('3154', '久治县', '464');
INSERT INTO `ce_city` VALUES ('3155', '玛多县', '464');
INSERT INTO `ce_city` VALUES ('3156', '玉树县', '465');
INSERT INTO `ce_city` VALUES ('3157', '杂多县', '465');
INSERT INTO `ce_city` VALUES ('3158', '称多县', '465');
INSERT INTO `ce_city` VALUES ('3159', '治多县', '465');
INSERT INTO `ce_city` VALUES ('3160', '囊谦县', '465');
INSERT INTO `ce_city` VALUES ('3161', '曲麻莱县', '465');
INSERT INTO `ce_city` VALUES ('3162', '格尔木市', '466');
INSERT INTO `ce_city` VALUES ('3163', '德令哈市', '466');
INSERT INTO `ce_city` VALUES ('3164', '乌兰县', '466');
INSERT INTO `ce_city` VALUES ('3165', '都兰县', '466');
INSERT INTO `ce_city` VALUES ('3166', '天峻县', '466');
INSERT INTO `ce_city` VALUES ('3167', '兴庆区', '467');
INSERT INTO `ce_city` VALUES ('3168', '西夏区', '467');
INSERT INTO `ce_city` VALUES ('3169', '金凤区', '467');
INSERT INTO `ce_city` VALUES ('3170', '永宁县', '467');
INSERT INTO `ce_city` VALUES ('3171', '贺兰县', '467');
INSERT INTO `ce_city` VALUES ('3172', '灵武市', '467');
INSERT INTO `ce_city` VALUES ('3173', '大武口区', '468');
INSERT INTO `ce_city` VALUES ('3174', '惠农区', '468');
INSERT INTO `ce_city` VALUES ('3175', '平罗县', '468');
INSERT INTO `ce_city` VALUES ('3176', '利通区', '469');
INSERT INTO `ce_city` VALUES ('3177', '盐池县', '469');
INSERT INTO `ce_city` VALUES ('3178', '同心县', '469');
INSERT INTO `ce_city` VALUES ('3179', '青铜峡市', '469');
INSERT INTO `ce_city` VALUES ('3180', '原州区', '470');
INSERT INTO `ce_city` VALUES ('3181', '西吉县', '470');
INSERT INTO `ce_city` VALUES ('3182', '隆德县', '470');
INSERT INTO `ce_city` VALUES ('3183', '泾源县', '470');
INSERT INTO `ce_city` VALUES ('3184', '彭阳县', '470');
INSERT INTO `ce_city` VALUES ('3185', '沙坡头区', '471');
INSERT INTO `ce_city` VALUES ('3186', '中宁县', '471');
INSERT INTO `ce_city` VALUES ('3187', '海原县', '471');
INSERT INTO `ce_city` VALUES ('3188', '天山区', '472');
INSERT INTO `ce_city` VALUES ('3189', '沙依巴克区', '472');
INSERT INTO `ce_city` VALUES ('3190', '新市区', '472');
INSERT INTO `ce_city` VALUES ('3191', '水磨沟区', '472');
INSERT INTO `ce_city` VALUES ('3192', '头屯河区', '472');
INSERT INTO `ce_city` VALUES ('3193', '达坂城区', '472');
INSERT INTO `ce_city` VALUES ('3194', '东山区', '472');
INSERT INTO `ce_city` VALUES ('3195', '乌鲁木齐县', '472');
INSERT INTO `ce_city` VALUES ('3196', '独山子区', '473');
INSERT INTO `ce_city` VALUES ('3197', '克拉玛依区', '473');
INSERT INTO `ce_city` VALUES ('3198', '白碱滩区', '473');
INSERT INTO `ce_city` VALUES ('3199', '乌尔禾区', '473');
INSERT INTO `ce_city` VALUES ('3200', '吐鲁番市', '474');
INSERT INTO `ce_city` VALUES ('3201', '鄯善县', '474');
INSERT INTO `ce_city` VALUES ('3202', '托克逊县', '474');
INSERT INTO `ce_city` VALUES ('3203', '哈密市', '475');
INSERT INTO `ce_city` VALUES ('3204', '巴里坤哈萨克自治县', '475');
INSERT INTO `ce_city` VALUES ('3205', '伊吾县', '475');
INSERT INTO `ce_city` VALUES ('3206', '昌吉市', '476');
INSERT INTO `ce_city` VALUES ('3207', '阜康市', '476');
INSERT INTO `ce_city` VALUES ('3208', '米泉市', '476');
INSERT INTO `ce_city` VALUES ('3209', '呼图壁县', '476');
INSERT INTO `ce_city` VALUES ('3210', '玛纳斯县', '476');
INSERT INTO `ce_city` VALUES ('3211', '奇台县', '476');
INSERT INTO `ce_city` VALUES ('3212', '吉木萨尔县', '476');
INSERT INTO `ce_city` VALUES ('3213', '木垒哈萨克自治县', '476');
INSERT INTO `ce_city` VALUES ('3214', '博乐市', '477');
INSERT INTO `ce_city` VALUES ('3215', '精河县', '477');
INSERT INTO `ce_city` VALUES ('3216', '温泉县', '477');
INSERT INTO `ce_city` VALUES ('3217', '库尔勒市', '478');
INSERT INTO `ce_city` VALUES ('3218', '轮台县', '478');
INSERT INTO `ce_city` VALUES ('3219', '尉犁县', '478');
INSERT INTO `ce_city` VALUES ('3220', '若羌县', '478');
INSERT INTO `ce_city` VALUES ('3221', '且末县', '478');
INSERT INTO `ce_city` VALUES ('3222', '焉耆回族自治县', '478');
INSERT INTO `ce_city` VALUES ('3223', '和静县', '478');
INSERT INTO `ce_city` VALUES ('3224', '和硕县', '478');
INSERT INTO `ce_city` VALUES ('3225', '博湖县', '478');
INSERT INTO `ce_city` VALUES ('3226', '阿克苏市', '479');
INSERT INTO `ce_city` VALUES ('3227', '温宿县', '479');
INSERT INTO `ce_city` VALUES ('3228', '库车县', '479');
INSERT INTO `ce_city` VALUES ('3229', '沙雅县', '479');
INSERT INTO `ce_city` VALUES ('3230', '新和县', '479');
INSERT INTO `ce_city` VALUES ('3231', '拜城县', '479');
INSERT INTO `ce_city` VALUES ('3232', '乌什县', '479');
INSERT INTO `ce_city` VALUES ('3233', '阿瓦提县', '479');
INSERT INTO `ce_city` VALUES ('3234', '柯坪县', '479');
INSERT INTO `ce_city` VALUES ('3235', '阿图什市', '480');
INSERT INTO `ce_city` VALUES ('3236', '阿克陶县', '480');
INSERT INTO `ce_city` VALUES ('3237', '阿合奇县', '480');
INSERT INTO `ce_city` VALUES ('3238', '乌恰县', '480');
INSERT INTO `ce_city` VALUES ('3239', '喀什市', '481');
INSERT INTO `ce_city` VALUES ('3240', '疏附县', '481');
INSERT INTO `ce_city` VALUES ('3241', '疏勒县', '481');
INSERT INTO `ce_city` VALUES ('3242', '英吉沙县', '481');
INSERT INTO `ce_city` VALUES ('3243', '泽普县', '481');
INSERT INTO `ce_city` VALUES ('3244', '莎车县', '481');
INSERT INTO `ce_city` VALUES ('3245', '叶城县', '481');
INSERT INTO `ce_city` VALUES ('3246', '麦盖提县', '481');
INSERT INTO `ce_city` VALUES ('3247', '岳普湖县', '481');
INSERT INTO `ce_city` VALUES ('3248', '伽师县', '481');
INSERT INTO `ce_city` VALUES ('3249', '巴楚县', '481');
INSERT INTO `ce_city` VALUES ('3250', '塔什库尔干塔吉克自治县', '481');
INSERT INTO `ce_city` VALUES ('3251', '和田市', '482');
INSERT INTO `ce_city` VALUES ('3252', '和田县', '482');
INSERT INTO `ce_city` VALUES ('3253', '墨玉县', '482');
INSERT INTO `ce_city` VALUES ('3254', '皮山县', '482');
INSERT INTO `ce_city` VALUES ('3255', '洛浦县', '482');
INSERT INTO `ce_city` VALUES ('3256', '策勒县', '482');
INSERT INTO `ce_city` VALUES ('3257', '于田县', '482');
INSERT INTO `ce_city` VALUES ('3258', '民丰县', '482');
INSERT INTO `ce_city` VALUES ('3259', '伊宁市', '483');
INSERT INTO `ce_city` VALUES ('3260', '奎屯市', '483');
INSERT INTO `ce_city` VALUES ('3261', '伊宁县', '483');
INSERT INTO `ce_city` VALUES ('3262', '察布查尔锡伯自治县', '483');
INSERT INTO `ce_city` VALUES ('3263', '霍城县', '483');
INSERT INTO `ce_city` VALUES ('3264', '巩留县', '483');
INSERT INTO `ce_city` VALUES ('3265', '新源县', '483');
INSERT INTO `ce_city` VALUES ('3266', '昭苏县', '483');
INSERT INTO `ce_city` VALUES ('3267', '特克斯县', '483');
INSERT INTO `ce_city` VALUES ('3268', '尼勒克县', '483');
INSERT INTO `ce_city` VALUES ('3269', '塔城市', '484');
INSERT INTO `ce_city` VALUES ('3270', '乌苏市', '484');
INSERT INTO `ce_city` VALUES ('3271', '额敏县', '484');
INSERT INTO `ce_city` VALUES ('3272', '沙湾县', '484');
INSERT INTO `ce_city` VALUES ('3273', '托里县', '484');
INSERT INTO `ce_city` VALUES ('3274', '裕民县', '484');
INSERT INTO `ce_city` VALUES ('3275', '和布克赛尔蒙古自治县', '484');
INSERT INTO `ce_city` VALUES ('3276', '阿勒泰市', '485');
INSERT INTO `ce_city` VALUES ('3277', '布尔津县', '485');
INSERT INTO `ce_city` VALUES ('3278', '富蕴县', '485');
INSERT INTO `ce_city` VALUES ('3279', '福海县', '485');
INSERT INTO `ce_city` VALUES ('3280', '哈巴河县', '485');
INSERT INTO `ce_city` VALUES ('3281', '青河县', '485');
INSERT INTO `ce_city` VALUES ('3282', '吉木乃县', '485');
INSERT INTO `ce_city` VALUES ('3358', '钓鱼岛', '0');

-- ----------------------------
-- Table structure for ce_config
-- ----------------------------
DROP TABLE IF EXISTS `ce_config`;
CREATE TABLE `ce_config` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'id值',
  `Name` char(50) DEFAULT NULL COMMENT '名称',
  `Value` char(255) DEFAULT NULL COMMENT '值',
  `Createtime` datetime DEFAULT NULL COMMENT '创建时间',
  `Updatetime` datetime DEFAULT NULL COMMENT '更新时间',
  `CompanyID` int(11) DEFAULT NULL COMMENT '公司ID',
  `CityID` int(11) DEFAULT NULL COMMENT ' 城市ID',
  `PID` int(11) DEFAULT '0' COMMENT '父id',
  `State` int(5) DEFAULT '0' COMMENT '1 删除。0未删除',
  `Diction` int(11) DEFAULT NULL COMMENT '字典项',
  `Type` int(5) DEFAULT '0' COMMENT '0:text,1:checkbox,2:radio3:select',
  `Class` varchar(255) DEFAULT NULL COMMENT 'css样式',
  `Remarks` varchar(255) DEFAULT NULL COMMENT '描述',
  `Title` varchar(255) DEFAULT NULL COMMENT '标题',
  `Rule` varchar(255) DEFAULT NULL COMMENT '规则',
  `Message` varchar(255) DEFAULT NULL COMMENT '提示信息',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='系统配置表';

-- ----------------------------
-- Records of ce_config
-- ----------------------------
INSERT INTO `ce_config` VALUES ('1', 'SYSTEM', '林北移动互联网', '2017-08-15 11:27:26', '2017-08-15 11:27:31', '1', '1', '3', '0', '0', '0', null, null, '系统名称', 'required: true,', 'required: \"This field is required.\",');
INSERT INTO `ce_config` VALUES ('2', 'COMPANY', '林北软件集团', '2017-08-13 11:37:52', '2017-08-13 11:37:56', '1', '1', '3', '0', '0', '1', null, null, '系统作者', null, null);
INSERT INTO `ce_config` VALUES ('3', '', '系统', '2017-08-13 11:37:52', '2017-08-13 11:37:56', '1', '1', '0', '0', '0', '1', 'green ace-icon fa fa-home bigger-120', null, null, null, null);

-- ----------------------------
-- Table structure for ce_databases
-- ----------------------------
DROP TABLE IF EXISTS `ce_databases`;
CREATE TABLE `ce_databases` (
  `ID` int(11) NOT NULL,
  `Nmae` char(255) DEFAULT NULL,
  `Content` char(255) DEFAULT NULL,
  `Createtime` datetime DEFAULT NULL,
  `Updatetime` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ce_databases
-- ----------------------------

-- ----------------------------
-- Table structure for ce_department
-- ----------------------------
DROP TABLE IF EXISTS `ce_department`;
CREATE TABLE `ce_department` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `OrganizationName` char(32) CHARACTER SET utf8 DEFAULT NULL,
  `ShortName` char(32) CHARACTER SET utf8 DEFAULT NULL,
  `ClassDepth` int(1) DEFAULT NULL,
  `ParentID` int(8) DEFAULT '0',
  `CompetentID` int(8) DEFAULT NULL,
  `SubIDList` char(128) DEFAULT NULL,
  `DutyLeaderUserID` int(11) DEFAULT NULL,
  `OrderNumber` int(8) DEFAULT '1000',
  `DateTimeCreated` datetime DEFAULT NULL,
  `DateTimeUpdated` datetime DEFAULT NULL,
  `IsDelete` bit(1) DEFAULT b'0',
  `CityID` int(11) DEFAULT '0',
  `CompanyID` int(11) DEFAULT NULL,
  `Flag` int(5) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=119 DEFAULT CHARSET=ascii ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ce_department
-- ----------------------------
INSERT INTO `ce_department` VALUES ('1', '河南投资集团有限公司', '投资集团', '0', '0', '1', '1', null, '10', '2013-02-13 23:46:58', '2013-02-13 23:46:58', '\0', '1', '1', '1');
INSERT INTO `ce_department` VALUES ('2', '集团本部', '集团本部', '1', '1', '1', '2', null, '20', '2012-12-21 12:45:50', '2012-12-21 12:45:50', '\0', '1', '1', '1');
INSERT INTO `ce_department` VALUES ('3', '控股企业', '控股企业', '1', '1', '1', '3', null, '30', '2012-12-21 12:46:56', '2012-12-21 12:46:56', '\0', '1', '1', '0');
INSERT INTO `ce_department` VALUES ('4', '参股企业', '参股企业', '1', '1', '1', '4', null, '40', '2012-12-21 12:47:19', '2012-12-21 12:47:19', '\0', '1', '1', '0');
INSERT INTO `ce_department` VALUES ('5', '总经理工作部', '总经部', '2', '2', '2', '5', null, '100', '2014-04-08 08:42:09', '2014-04-08 08:42:09', '\0', '1', '1', '0');
INSERT INTO `ce_department` VALUES ('6', '发展计划部', '计划部', '2', '2', '2', '6', null, '300', '2014-04-17 14:35:37', '2014-04-17 14:35:37', '\0', '1', '1', '0');
INSERT INTO `ce_department` VALUES ('7', '企业策划部', '企划部', '2', '2', '2', '7|99|100|101|104', null, '400', '2013-07-26 09:57:06', '2013-07-26 09:57:06', '\0', '6', '1', '0');
INSERT INTO `ce_department` VALUES ('8', '资本运营部', '资本部', '2', '2', '2', '8', null, '500', '2014-04-17 15:46:34', '2014-04-17 15:46:34', '\0', '7', '1', null);
INSERT INTO `ce_department` VALUES ('9', '豫能控股', '电力子公司', '2', '2', '2', '9|23|24|25|27|28|29|30|31|32|33|34|45|73|74|85|86|108|115', null, '1800', '2013-07-26 10:07:15', '2013-07-26 10:07:15', '\0', '8', '1', null);
INSERT INTO `ce_department` VALUES ('10', '金融管理部', '金融部', '2', '2', '2', '10|35|36|37|38|89|98|110', null, '1300', '2016-03-14 09:55:16', '2016-03-14 09:55:16', '\0', '9', '1', '0');
INSERT INTO `ce_department` VALUES ('11', '大河纸业', '造纸子公司', '2', '2', '2', '11|39|40|46|47', null, '1900', '2013-07-26 10:07:51', '2013-07-26 10:07:51', '\0', '12', '1', '0');
INSERT INTO `ce_department` VALUES ('12', '同力股份', '同力股份', '2', '2', '2', '12|104|42|43|48|49|50|51|52|53|75|76|77|78|79|80|81|82|87|96|97|102|105|114', null, '2000', '2013-07-26 10:08:21', '2013-07-26 10:08:21', '\0', '12', '1', '0');
INSERT INTO `ce_department` VALUES ('13', '产业管理部', '产业部', '2', '2', '2', '13|54|55|56|57|58|59|60|83|84|93', null, '1500', '2016-03-14 09:55:45', '2016-03-14 09:55:45', '\0', '13', '1', '0');
INSERT INTO `ce_department` VALUES ('14', '控股发展', '控股发展', '2', '2', '2', '14|41|61|62|72|103|106', null, '1400', '2015-12-03 05:05:06', '2015-12-03 05:05:06', '\0', '14', '1', '0');
INSERT INTO `ce_department` VALUES ('15', '天地置业', '天地置业', '2', '2', '2', '15|44|63|64|65|66|67|68|69|70|71|88|94|95', null, '1600', '2015-12-03 05:04:11', '2015-12-03 05:04:11', '\0', '15', '1', '0');
INSERT INTO `ce_department` VALUES ('16', '资产管理部', '资产部', '2', '2', '2', '16', null, '1700', '2016-03-14 09:56:14', '2016-03-14 09:56:14', '\0', '16', '1', '0');
INSERT INTO `ce_department` VALUES ('17', '专家咨询办公室', '专家办公室', '2', '2', '2', '17', null, '2100', '2013-07-26 10:23:31', '2013-07-26 10:23:31', '\0', '1', '1', '0');
INSERT INTO `ce_department` VALUES ('18', '人力资源部', '人力部', '2', '2', '2', '18', null, '700', '2013-07-26 10:00:55', '2013-07-26 10:00:55', '\0', '1', '1', '0');
INSERT INTO `ce_department` VALUES ('19', '财务部', '财务部', '2', '2', '2', '19', null, '800', '2013-07-26 10:01:20', '2013-07-26 10:01:20', '\0', '1', '1', '1');
INSERT INTO `ce_department` VALUES ('20', '审计部', '审计部', '2', '2', '2', '20', null, '900', '2013-07-26 10:01:33', '2013-07-26 10:01:33', '\0', '1', '1', '1');
INSERT INTO `ce_department` VALUES ('21', '党群工作部', '党群部', '2', '2', '2', '21', null, '1100', '2014-04-17 15:46:56', '2014-04-17 15:46:56', '\0', '1', '1', null);
INSERT INTO `ce_department` VALUES ('22', '纪检监察部', '纪检部', '2', '2', '2', '22', null, '1200', '2014-04-17 15:46:44', '2014-04-17 15:46:44', '\0', '1', '1', null);
INSERT INTO `ce_department` VALUES ('23', '河南豫能控股股份有限公司', '豫能控股', '2', '3', '9', '23|115', null, '2000', '2013-01-29 14:23:43', '2013-01-29 14:23:43', '\0', '1', '1', null);
INSERT INTO `ce_department` VALUES ('24', '南阳鸭河口发电有限责任公司', '鸭河口发电', '2', '3', '9', '24', null, '2100', '2012-12-21 11:11:09', '2013-01-29 14:24:20', '\0', '1', '1', null);
INSERT INTO `ce_department` VALUES ('25', '南阳天益发电有限责任公司', '天益发电', '2', '3', '9', '25', null, '2200', '2012-12-21 11:36:45', '2013-01-29 14:25:23', '\0', '1', '1', null);
INSERT INTO `ce_department` VALUES ('26', '法律事务部', '法律部', '2', '2', '2', '26', null, '1000', '2012-12-21 12:32:09', '2013-07-26 10:01:42', '\0', '1', '1', null);
INSERT INTO `ce_department` VALUES ('27', '鹤壁万和发电有限责任公司', '万和发电', '2', '3', '9', '27', null, '2300', '2012-12-21 13:01:18', '2013-01-29 14:25:33', '\0', '1', '1', null);
INSERT INTO `ce_department` VALUES ('28', '鹤壁同力发电有限责任公司', '同力发电', '2', '3', '9', '28', null, '2400', '2012-12-24 03:42:15', '2013-01-29 14:25:58', '\0', '1', '1', null);
INSERT INTO `ce_department` VALUES ('29', '鹤壁丰鹤发电有限责任公司', '鹤壁丰鹤', '2', '3', '9', '29', null, '2500', '2012-12-24 03:42:41', '2013-01-29 14:26:29', '\0', '1', '1', null);
INSERT INTO `ce_department` VALUES ('30', '河南新中益电力有限公司', '新中益', '2', '3', '9', '30', null, '2600', '2012-12-24 03:43:26', '2013-01-29 14:27:11', '\0', '1', '1', null);
INSERT INTO `ce_department` VALUES ('31', '濮阳龙丰热电有限责任公司', '龙丰热电', '2', '3', '9', '31', null, '2700', '2012-12-24 03:46:35', '2013-02-28 11:33:57', '\0', '1', '1', null);
INSERT INTO `ce_department` VALUES ('32', '焦作天力电力投资有限公司', '焦作天力', '2', '3', '9', '32', null, '2800', '2012-12-24 03:48:05', '2013-01-29 14:27:40', '\0', '1', '1', null);
INSERT INTO `ce_department` VALUES ('33', '郑州新力电力有限公司', '郑州新力', '2', '3', '9', '33', null, '2800', '2012-12-24 03:52:21', '2013-01-29 14:28:12', '\0', '1', '1', null);
INSERT INTO `ce_department` VALUES ('34', '河南投资集团燃料有限责任公司', '燃料公司', '2', '3', '9', '34', null, '2900', '2012-12-24 03:52:50', '2013-01-29 14:28:23', '\0', '1', '1', null);
INSERT INTO `ce_department` VALUES ('35', '中原证券股份有限公司', '中原证券', '2', '3', '10', '35', null, '1300100', '2012-12-24 04:03:10', '2013-07-26 10:25:02', '\0', '1', '1', null);
INSERT INTO `ce_department` VALUES ('36', '中原信托有限公司', '中原信托', '2', '3', '10', '36', null, '1300200', '2012-12-24 04:10:31', '2013-07-26 10:27:20', '\0', '1', '1', null);
INSERT INTO `ce_department` VALUES ('37', '开封市商业银行股份有限公司', '开封商行', '2', '3', '10', '37', null, '1300300', '2012-12-24 04:11:42', '2013-07-26 10:27:40', '\0', '1', '1', null);
INSERT INTO `ce_department` VALUES ('38', '河南投资集团担保有限公司', '担保公司', '2', '3', '10', '38|110', null, '1300400', '2012-12-24 04:17:13', '2013-07-26 10:28:00', '\0', '1', '1', null);
INSERT INTO `ce_department` VALUES ('39', '驻马店市白云纸业有限公司', '白云纸业', '2', '3', '11', '39', null, '3200', '2012-12-24 04:24:50', '2013-01-29 14:29:12', '\0', '1', '1', null);
INSERT INTO `ce_department` VALUES ('40', '濮阳龙丰纸业有限公司', '龙丰纸业', '2', '3', '11', '40', null, '3300', '2012-12-24 04:25:16', '2013-01-29 14:24:50', '\0', '1', '1', null);
INSERT INTO `ce_department` VALUES ('41', '河南省许平南高速公路有限责任公司', '许平南', '2', '3', '14', '41', null, '1400300', '2013-01-16 08:24:44', '2013-07-26 10:33:51', '\0', '1', '1', null);
INSERT INTO `ce_department` VALUES ('42', '驻马店市豫龙同力水泥有限公司', '豫龙同力', '2', '3', '12', '42|75|76|77|78|79|80|81|82', null, '1000', '2013-01-21 14:50:41', '2013-01-29 14:48:24', '\0', '1', '1', null);
INSERT INTO `ce_department` VALUES ('43', '河南同力水泥股份公司', '同力股份', '2', '3', '12', '43', null, '1000', '2013-01-21 14:51:37', '2013-01-21 14:51:37', '\0', '1', '1', null);
INSERT INTO `ce_department` VALUES ('44', '林州市太行大峡谷旅游开发有限公司', '大峡谷', '2', '3', '15', '44', null, '1600200', '2013-01-29 10:47:45', '2013-07-26 10:36:55', '\0', '1', '1', null);
INSERT INTO `ce_department` VALUES ('45', '河南豫能电力检修工程有限公司', '豫能检修', '2', '3', '9', '45|115', null, '2850', '2013-01-29 14:35:38', '2013-01-29 14:36:50', '\0', '1', '1', null);
INSERT INTO `ce_department` VALUES ('46', '焦作瑞丰纸业有限公司', '瑞丰纸业', '2', '3', '11', '46', null, '3310', '2013-01-29 14:38:44', '2013-01-29 14:38:44', '\0', '1', '1', null);
INSERT INTO `ce_department` VALUES ('47', '周口大河林业有限公司', '大河林业', '2', '3', '11', '47', null, '3310', '2013-01-29 14:39:00', '2013-01-29 14:39:00', '\0', '1', '1', null);
INSERT INTO `ce_department` VALUES ('48', '三门峡市建方水泥有限公司', '建方水泥', '2', '3', '12', '48', null, '3310', '2013-01-29 14:39:42', '2013-01-29 14:39:42', '\0', '1', null, null);
INSERT INTO `ce_department` VALUES ('49', '河南省豫鹤同力水泥有限公司', '豫鹤同力', '2', '3', '12', '49|97|105', null, '4000', '2013-01-29 14:40:33', '2013-01-29 14:40:33', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('50', '洛阳黄河同力水泥有限责任公司', '黄河同力', '2', '3', '12', '50', null, '4000', '2013-01-29 14:40:51', '2013-01-29 14:40:51', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('51', '新乡平原同力水泥有限责任公司', '平原同力', '2', '3', '12', '51|96|102', null, '4100', '2013-01-29 14:41:10', '2013-01-29 14:41:10', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('52', '河南省同力水泥有限公司', '省同力', '2', '3', '12', '52|114|105', null, '4200', '2013-01-29 14:41:25', '2013-09-17 15:09:11', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('53', '河南省豫南水泥有限公司', '豫南水泥', '2', '3', '12', '53', null, '4200', '2013-01-29 14:42:00', '2013-09-17 15:09:37', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('54', '郑州拓洋实业有限公司', '拓洋实业', '2', '3', '13', '54', null, '5000', '2013-01-29 14:42:57', '2013-01-29 14:42:57', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('55', '河南安彩高科股份有限公司', '安彩高科', '2', '3', '13', '55', null, '1500100', '2013-01-29 14:43:10', '2013-07-26 10:35:08', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('56', '南阳信泰科技有限公司', '信泰科技', '2', '3', '13', '56', null, '5000', '2013-01-29 14:43:19', '2013-01-29 14:43:19', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('57', '郑州海特模具有限公司', '海特模具', '2', '3', '13', '57', null, '5000', '2013-01-29 14:43:29', '2013-01-29 14:43:29', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('58', '河南仲景药业有限公司', '仲景药业', '2', '3', '13', '58', null, '5000', '2013-01-29 14:43:39', '2013-01-29 14:43:39', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('59', '洛阳春都投资股份有限公司', '春都投资', '2', '3', '13', '59', null, '5000', '2013-01-29 14:43:50', '2013-01-29 14:43:50', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('60', '河南新能硅业科技有限公司', '新能硅业', '2', '3', '13', '60', null, '5000', '2013-01-29 14:44:01', '2013-01-29 14:44:01', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('61', '河南天地置业有限责任公司', '天地置业', '2', '3', '14', '61', null, '1400100', '2013-01-29 14:44:53', '2013-07-26 10:32:59', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('62', '河南投资集团电子科技有限责任公司', '电子科技', '2', '3', '14', '62', null, '1400200', '2013-01-29 14:45:22', '2013-07-26 10:33:10', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('63', '天地酒店管理公司', '酒管公司', '2', '3', '15', '63|94|95', null, '1600100', '2013-01-29 14:45:40', '2013-07-26 10:37:07', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('64', '河南投资集团丹阳岛开发有限公司', '丹阳岛', '2', '3', '15', '64', null, '1600300', '2013-01-29 14:46:28', '2013-07-26 10:37:17', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('65', '内黄林场', '内黄林场', '2', '3', '15', '65', null, '1600400', '2013-01-29 14:46:46', '2013-07-26 10:42:03', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('66', '民权林场', '民权林场', '2', '3', '15', '66', null, '1600500', '2013-01-29 14:46:54', '2013-07-26 10:43:24', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('67', '西华林场', '西华林场', '2', '3', '15', '67', null, '1600600', '2013-01-29 14:47:01', '2013-07-26 10:43:09', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('68', '扶沟林场', '扶沟林场', '2', '3', '15', '68', null, '1600700', '2013-01-29 14:47:12', '2013-07-26 10:42:39', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('69', '河南省国有固始林场', '固始林场', '2', '3', '15', '69', null, '1600800', '2013-01-29 14:47:26', '2013-07-26 10:42:20', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('70', '河南省林业厅物资站', '物资站', '2', '3', '15', '70', null, '1601000', '2013-01-29 14:47:49', '2013-07-26 10:39:15', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('71', '河南投资集团白条河农场', '白条河农场', '2', '3', '15', '71', null, '1600900', '2013-01-29 14:48:00', '2013-07-26 10:40:31', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('72', '河南林长高速公路有限责任公司', '林长高速', '2', '3', '14', '72', null, '1400400', '2013-01-31 15:31:00', '2013-07-26 10:34:45', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('73', '新乡中益计划部', '中益计划部', '3', '85', '85', '73', null, '1000', '2013-02-04 16:58:32', '2013-03-14 11:46:55', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('74', '鹤壁鹤淇发电有限责任公司', '鹤壁鹤淇', '2', '3', '9', '74', null, '1000', '2013-02-16 14:35:29', '2013-02-16 14:35:29', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('75', '豫龙同力信阳分公司', '豫龙同力信阳', '3', '42', '42', '75', null, '1000', '2013-02-19 15:26:41', '2013-02-19 17:06:24', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('76', '豫龙同力采购部-大宗原材料', '豫龙同力大采', '3', '42', '42', '76', null, '1000', '2013-02-19 16:57:10', '2013-02-19 16:59:57', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('77', '豫龙同力采购部-备品备件', '豫龙同力备品', '3', '42', '42', '77', null, '1000', '2013-02-19 16:57:45', '2013-02-19 17:00:21', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('78', '豫龙同力物流部-运输服务', '豫龙同力物流', '3', '42', '42', '78', null, '1000', '2013-02-19 16:58:11', '2013-02-19 17:00:29', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('79', '豫龙同力二期-工程', '豫龙同力二期', '3', '42', '42', '79', null, '1000', '2013-02-19 16:58:34', '2013-02-19 17:00:37', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('80', '豫龙同力综合办-劳务', '豫龙同力劳务', '3', '42', '42', '80', null, '1000', '2013-02-19 16:58:54', '2013-02-19 17:00:57', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('81', '豫龙同力生产部-维修服务', '豫龙同力维修', '3', '42', '42', '81', null, '1000', '2013-02-19 16:59:14', '2013-02-19 17:01:09', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('82', '豫龙同力新辉', '豫龙同力新辉', '3', '42', '42', '82', null, '1000', '2013-02-20 10:19:00', '2013-02-20 10:19:00', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('83', '河南省立安实业有限责任公司', '立安实业', '2', '3', '13', '83', null, '1500700', '2013-02-27 10:43:29', '2013-07-26 10:32:28', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('84', '河南省发展燃气有限公司', '发展燃气', '2', '3', '13', '84', null, '1000', '2013-03-05 17:28:53', '2014-05-08 09:35:35', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('85', '新乡中益发电有限公司', '新乡中益', '2', '3', '9', '73|85|86', null, '1000', '2013-03-14 11:45:59', '2013-03-14 11:45:59', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('86', '新乡中益物资部', '中益物资部', '3', '85', '85', '86', null, '1000', '2013-03-14 11:47:41', '2013-03-14 11:47:41', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('87', '三门峡腾跃同力水泥有限公司', '腾跃同力', '2', '3', '12', '87', null, '1000', '2013-06-07 11:20:34', '2013-06-07 11:20:34', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('88', '河南省绿源林产品有限公司', '绿源公司', '2', '3', '15', '88', null, '1601100', '2013-06-26 16:06:03', '2013-07-26 10:39:31', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('89', '北京新安财富创业投资有限公司', '北新投', '2', '3', '10', '89', null, '1300800', '2013-07-02 10:23:02', '2013-07-26 10:31:38', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('90', '战略发展部', '战略部', '2', '2', '2', '90', null, '200', '2013-07-26 09:53:26', '2013-07-26 09:55:37', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('91', '工程管理部', '工程部', '2', '2', '2', '91', null, '400', '2013-07-26 09:53:46', '2014-04-17 15:46:21', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('92', '董事会办公室', '董事会办公室', '2', '2', '2', '92', null, '2200', '2013-07-26 10:24:06', '2015-04-23 15:26:40', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('93', '郑州宝蓝包装技术有限公司', '郑州宝蓝', '2', '3', '13', '93', null, '1500800', '2013-09-04 15:22:47', '2013-09-04 15:23:17', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('94', '河南天地酒店有限公司', '天地酒店', '3', '63', '15', '94', null, '1000', '2013-09-06 16:44:33', '2013-09-06 16:44:33', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('95', '天地酒店公司红旗渠迎宾馆分公司', '红旗渠迎宾馆', '3', '63', '15', '95', null, '1000', '2013-09-06 16:44:59', '2013-09-06 16:46:13', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('96', '长垣县同力水泥有限责任公司', '长垣同力', '3', '51', '12', '96', null, '1000', '2013-09-17 15:07:40', '2013-09-18 08:25:09', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('97', '濮阳同力水泥有限公司', '濮阳同力', '3', '49', '12', '97', null, '1000', '2013-09-18 08:24:51', '2013-09-18 08:24:51', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('98', '河南创业投资有限公司', '河南创投', '2', '3', '10', '98', null, '1300900', '2013-11-14 10:32:04', '2013-11-14 10:33:03', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('99', '电力董事会', '电力董事会', '3', '2', '7', '99', null, '1000', '2014-04-08 08:43:46', '2014-04-08 08:45:27', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('100', '造纸董事会', '造纸董事会', '3', '2', '7', '100', null, '1000', '2014-04-08 08:44:11', '2014-04-08 08:45:43', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('101', '水泥董事会', '水泥董事会', '3', '2', '7', '101|104', null, '1000', '2014-04-08 08:44:20', '2014-04-08 08:45:55', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('102', '长垣同力建材有限公司', '长垣同力建材', '3', '51', '12', '102', null, '1000', '2014-06-09 10:51:22', '2014-06-09 10:51:22', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('103', '河南投资集团控股发展有限公司', '控股发展', '2', '3', '14', '103', null, '1400500', '2014-06-16 11:28:26', '2014-06-16 11:29:09', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('104', '同力水泥豫北运营区', '同力豫北区', '3', '12', '101', '104', null, '1000', '2015-01-20 09:54:38', '2015-01-20 09:54:38', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('105', '鹤壁同力建材有限公司', '鹤壁同力建材', '3', '49', '52', '105', null, '1000', '2015-02-28 10:31:21', '2015-02-28 10:31:21', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('106', '郑州航空港水务发展有限公司', '港区水务', '2', '3', '14', '106', null, '1400510', '2015-04-07 16:54:00', '2015-04-07 16:55:54', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('107', '集团领导', '集团领导', '2', '2', '2', '107', null, '50', '2015-04-24 11:53:46', '2015-04-24 11:54:16', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('108', '濮阳豫能发电有限责任公司', '濮阳豫能', '2', '3', '9', '108', null, '2850', '2015-04-24 15:51:33', '2015-04-24 15:52:45', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('109', '控股企业高管', '企业高管', '2', '2', '2', '109', null, '1750', '2015-04-27 10:11:41', '2015-04-27 10:12:25', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('110', '综合部', '担保-综合部', '3', '38', '38', '110', null, '1000', '2015-05-04 10:10:22', '2015-05-04 10:10:22', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('111', '基金管理部', '基金部', '2', '2', '2', '111', null, '1210', '2015-11-10 16:01:15', '2015-11-10 16:02:20', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('112', '信息管理部', '信息部', '2', '2', '2', '112', null, '1220', '2015-11-10 16:02:53', '2015-11-10 16:02:53', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('113', '业务协同部', '协同部', '2', '2', '2', '113', null, '1230', '2015-11-10 16:03:14', '2015-11-10 16:05:35', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('114', '省同力综合办', '综合办', '3', '52', '52', '114', null, '1000', '2016-05-10 11:08:20', '2016-05-10 11:08:20', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('115', '河南煤炭储配交易中心有限公司', '煤炭交易', '3', '23', '45', '115', null, '1000', '2016-05-13 17:24:16', '2016-05-13 17:24:16', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('116', '河南城市发展投资有限公司', '省发投', '2', '1', '117', '116', null, '1000', '2016-06-02 08:14:47', '2016-06-02 08:16:07', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('117', '河南城发', '河南城发', '2', '2', '2', '117|116', null, '1400', '2016-06-02 08:15:13', '2016-06-02 08:19:44', '\0', null, null, null);
INSERT INTO `ce_department` VALUES ('118', '颐城控股', '颐城控股', '2', '2', '2', '118', null, '1400', '2016-06-02 08:23:33', '2016-06-02 08:23:33', '\0', null, null, null);

-- ----------------------------
-- Table structure for ce_department1
-- ----------------------------
DROP TABLE IF EXISTS `ce_department1`;
CREATE TABLE `ce_department1` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `DepartmentID` int(5) DEFAULT NULL,
  `DepartmentName` char(50) DEFAULT NULL,
  `ParentID` int(5) DEFAULT NULL,
  `IsDelete` int(5) DEFAULT '0',
  `DatetimeCreated` datetime DEFAULT NULL,
  `DatetimeUpdated` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ce_department1
-- ----------------------------

-- ----------------------------
-- Table structure for ce_directory
-- ----------------------------
DROP TABLE IF EXISTS `ce_directory`;
CREATE TABLE `ce_directory` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `FileName` char(255) DEFAULT NULL,
  `ParentID` bigint(20) DEFAULT NULL,
  `CityID` int(11) DEFAULT '0',
  `CompanyID` int(11) DEFAULT '0' COMMENT '公司ID',
  `Size` int(11) NOT NULL DEFAULT '0' COMMENT '文件数量',
  `IsDelete` int(11) NOT NULL DEFAULT '0' COMMENT '是否删除',
  `Type` int(11) DEFAULT '0',
  `DatetimeCreated` datetime DEFAULT NULL,
  `DatetimeUpdated` datetime DEFAULT NULL,
  `Path` char(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ce_directory
-- ----------------------------
INSERT INTO `ce_directory` VALUES ('1', '我的图片', '0', '0', '0', '0', '0', '0', '2017-05-25 10:30:02', '2017-05-16 10:29:59', 'sdfsld');
INSERT INTO `ce_directory` VALUES ('2', '手机', '1', '0', '0', '0', '0', '0', '2017-05-25 10:30:02', '2017-05-16 10:29:59', 'sdfsld');
INSERT INTO `ce_directory` VALUES ('3', '电脑', '1', '0', '0', '0', '0', '0', '2017-05-25 10:30:02', '2017-05-16 10:29:59', 'sdfsld');
INSERT INTO `ce_directory` VALUES ('4', '我的模板', '3', '0', '0', '0', '0', '0', '2017-05-25 10:30:02', '2017-05-16 10:29:59', 'sdfsld');
INSERT INTO `ce_directory` VALUES ('5', '我的文件', '0', '0', '0', '0', '0', '0', '2017-05-25 10:30:02', '2017-05-16 10:29:59', 'sdfsld');
INSERT INTO `ce_directory` VALUES ('6', '金融', '1', '0', '0', '0', '0', '0', '2017-05-25 10:30:02', '2017-05-16 10:29:59', 'sdfsld');
INSERT INTO `ce_directory` VALUES ('7', '机械', '1', '0', '0', '0', '0', '0', '2017-05-25 10:30:02', '2017-05-16 10:29:59', 'sdfsld');
INSERT INTO `ce_directory` VALUES ('8', '水平', '1', '0', '0', '0', '0', '0', '2017-05-25 10:30:02', '2017-05-16 10:29:59', 'sdfsld');
INSERT INTO `ce_directory` VALUES ('9', '被子', '1', '0', '0', '0', '0', '0', '2017-05-25 10:30:02', '2017-05-16 10:29:59', 'sdfsld');
INSERT INTO `ce_directory` VALUES ('10', '我的图片', '0', '0', '0', '0', '0', '0', '2017-05-25 10:30:02', '2017-05-16 10:29:59', 'sdfsld');
INSERT INTO `ce_directory` VALUES ('11', '我的图片', '0', '0', '0', '0', '0', '0', '2017-05-25 10:30:02', '2017-05-16 10:29:59', 'sdfsld');
INSERT INTO `ce_directory` VALUES ('12', '我的图片', '0', '0', '0', '0', '0', '0', '2017-05-25 10:30:02', '2017-05-16 10:29:59', 'sdfsld');
INSERT INTO `ce_directory` VALUES ('13', '我的图片', '0', '0', '0', '0', '0', '0', '2017-05-25 10:30:02', '2017-05-16 10:29:59', 'sdfsld');
INSERT INTO `ce_directory` VALUES ('14', '我的图片', '0', '0', '0', '0', '0', '0', '2017-05-25 10:30:02', '2017-05-16 10:29:59', 'sdfsld');
INSERT INTO `ce_directory` VALUES ('15', '我的图片', '0', '0', '0', '0', '0', '0', '2017-05-25 10:30:02', '2017-05-16 10:29:59', 'sdfsld');
INSERT INTO `ce_directory` VALUES ('16', '我的图片', '0', '0', '0', '0', '0', '0', '2017-05-25 10:30:02', '2017-05-16 10:29:59', 'sdfsld');
INSERT INTO `ce_directory` VALUES ('17', '我的图片', '0', '0', '0', '0', '0', '0', '2017-05-25 10:30:02', '2017-05-16 10:29:59', 'sdfsld');
INSERT INTO `ce_directory` VALUES ('18', '我的图片', '0', '0', '0', '0', '0', '0', '2017-05-25 10:30:02', '2017-05-16 10:29:59', 'sdfsld');
INSERT INTO `ce_directory` VALUES ('19', '我的图片', '0', '0', '0', '0', '0', '0', '2017-05-25 10:30:02', '2017-05-16 10:29:59', 'sdfsld');
INSERT INTO `ce_directory` VALUES ('20', '我的图片', '0', '0', '0', '0', '0', '0', '2017-05-25 10:30:02', '2017-05-16 10:29:59', 'sdfsld');
INSERT INTO `ce_directory` VALUES ('21', '我的图片', '0', '0', '0', '0', '0', '0', '2017-05-25 10:30:02', '2017-05-16 10:29:59', 'sdfsld');
INSERT INTO `ce_directory` VALUES ('22', '我的图片', '0', '0', '0', '0', '0', '0', '2017-05-25 10:30:02', '2017-05-16 10:29:59', 'sdfsld');
INSERT INTO `ce_directory` VALUES ('23', '我的图片', '0', '0', '0', '0', '0', '0', '2017-05-25 10:30:02', '2017-05-16 10:29:59', 'sdfsld');
INSERT INTO `ce_directory` VALUES ('24', '我的图片', '0', '0', '0', '0', '0', '0', '2017-05-25 10:30:02', '2017-05-16 10:29:59', 'sdfsld');
INSERT INTO `ce_directory` VALUES ('25', '我的图片', '0', '0', '0', '0', '0', '0', '2017-05-25 10:30:02', '2017-05-16 10:29:59', 'sdfsld');
INSERT INTO `ce_directory` VALUES ('26', '我的图片', '0', '0', '0', '0', '0', '0', '2017-05-25 10:30:02', '2017-05-16 10:29:59', 'sdfsld');
INSERT INTO `ce_directory` VALUES ('27', '我的图片', '0', '0', '0', '0', '0', '0', '2017-05-25 10:30:02', '2017-05-16 10:29:59', 'sdfsld');
INSERT INTO `ce_directory` VALUES ('28', '我的图片', '0', '0', '0', '0', '0', '0', '2017-05-25 10:30:02', '2017-05-16 10:29:59', 'sdfsld');

-- ----------------------------
-- Table structure for ce_email
-- ----------------------------
DROP TABLE IF EXISTS `ce_email`;
CREATE TABLE `ce_email` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Title` char(255) DEFAULT NULL COMMENT '标题',
  `From` char(255) DEFAULT NULL,
  `To` char(255) DEFAULT NULL,
  `Body` text COMMENT '内容',
  `Dir` int(5) DEFAULT '0' COMMENT '0：草稿箱，1：发件箱2：收件箱3：回收站;文件目录',
  `IsHot` int(5) DEFAULT '0' COMMENT '热点',
  `UserID` bigint(20) DEFAULT NULL COMMENT '用户id',
  `Updatetime` datetime DEFAULT NULL,
  `Createtime` datetime DEFAULT NULL,
  `IsRead` int(5) DEFAULT '0' COMMENT '是否阅读',
  `Status` int(5) DEFAULT '0' COMMENT '发送状态0:未发送，1:已发送，',
  `IsDelete` int(5) DEFAULT '0' COMMENT '状态0：未删除1：删除',
  `CityID` int(11) DEFAULT NULL COMMENT '城市id',
  `CompanyID` int(11) DEFAULT NULL COMMENT '公司id',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ce_email
-- ----------------------------
INSERT INTO `ce_email` VALUES ('1', '谁', '9@qq.com', '44@a.com', 'dsfsd', '0', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('2', '谁1', '9@qq.com', '44@a.com', 'dsfsd', '0', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('3', '谁2', '9@qq.com', '44@a.com', 'dsfsd', '0', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('4', '谁3', '9@qq.com', '44@a.com', 'dsfsd', '0', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('5', '谁4', '9@qq.com', '44@a.com', 'dsfsd', '3', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('6', '谁5', '9@qq.com', '44@a.com', 'dsfsd', '0', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('7', '谁6', '9@qq.com', '44@a.com', 'dsfsd', '3', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('8', '谁45', '9@qq.com', '44@a.com', 'dsfsd', '3', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('9', '谁334', '9@qq.com', '44@a.com', 'dsfsd', '3', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('10', '谁345', '9@qq.com', '44@a.com', 'dsfsd', '0', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('11', '谁45', '9@qq.com', '44@a.com', 'dsfsd', '3', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('12', '谁344', '9@qq.com', '44@a.com', 'dsfsd', '0', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('13', '谁34', '9@qq.com', '44@a.com', 'dsfsd', '3', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('14', '谁fd', '9@qq.com', '44@a.com', 'dsfsd', '1', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('15', '谁34v', '9@qq.com', '44@a.com', 'dsfsd', '0', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('16', '谁43tv', '9@qq.com', '44@a.com', 'dsfsd', '1', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('17', '谁34tt', '9@qq.com', '44@a.com', 'dsfsd', '1', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('18', '谁tte', '9@qq.com', '44@a.com', 'dsfsd', '1', '1', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('19', '谁sdfg', '9@qq.com', '44@a.com', 'dsfsd', '1', '1', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('20', '谁sdfgdf', '9@qq.com', '44@a.com', 'dsfsd', '1', '1', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('21', '谁sd', '9@qq.com', '44@a.com', 'dsfsd', '0', '1', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('22', '谁dg', '9@qq.com', '44@a.com', 'dsfsd', '1', '1', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('23', '谁sdfg', '9@qq.com', '44@a.com', 'dsfsd', '1', '1', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('24', '谁dsgv', '9@qq.com', '44@a.com', 'dsfsd', '1', '1', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('25', '谁sddg', '9@qq.com', '44@a.com', 'dsfsd', '1', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('26', '谁ffds3', '9@qq.com', '44@a.com', 'dsfsd', '0', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('27', '谁sergw', '9@qq.com', '44@a.com', 'dsfsd', '0', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('28', '谁regw', '9@qq.com', '44@a.com', 'dsfsd', '0', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('29', '谁cwe', '9@qq.com', '44@a.com', 'dsfsd', '0', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('30', '谁23v', '9@qq.com', '44@a.com', 'dsfsd', '0', '1', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('31', '谁er2', '9@qq.com', '44@a.com', 'dsfsd', '0', '1', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('32', '谁fv3', '9@qq.com', '44@a.com', 'dsfsd', '0', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('33', '谁rfe3', '9@qq.com', '44@a.com', 'dsfsd', '0', '1', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('34', '谁wrew4', '9@qq.com', '44@a.com', 'dsfsd', '0', '1', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('35', '谁fgbre', '9@qq.com', '44@a.com', 'dsfsd', '0', '1', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('36', '谁g', '9@qq.com', '44@a.com', 'dsfsd', '0', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('37', '谁erw', '9@qq.com', '44@a.com', 'dsfsd', '0', '1', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('38', '谁wrg', '9@qq.com', '44@a.com', 'dsfsd', '0', '1', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', null, '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('39', '谁reg', '9@qq.com', '44@a.com', 'dsfsd', '0', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', '0', '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('40', '谁th', '9@qq.com', '44@a.com', 'dsfsd', '0', '1', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', '0', '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('41', '谁a', '9@qq.com', '44@a.com', 'dsfsd', '0', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', '0', '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('42', '谁af', '9@qq.com', '44@a.com', 'dsfsd', '0', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', '0', '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('43', '谁as', '9@qq.com', '44@a.com', 'dsfsd', '0', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', '0', '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('44', '谁w', '9@qq.com', '44@a.com', 'dsfsd', '1', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', '0', '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('45', '谁gf', '9@qq.com', '44@a.com', 'dsfsd', '2', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', '0', '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('46', '谁fg', '9@qq.com', '44@a.com', 'dsfsd', '3', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', '0', '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('47', '谁hs', '9@qq.com', '44@a.com', 'dsfsd', '3', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', '0', '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('48', '谁hhwsreg', '9@qq.com', '44@a.com', 'dsfsd', '3', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', '0', '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('49', '谁sdfvs', '9@qq.com', '44@a.com', 'dsfsd', '3', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', '0', '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('50', '谁vgf', '9@qq.com', '44@a.com', 'dsfsd', '3', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', '0', '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('51', '谁ds', '9@qq.com', '44@a.com', 'dsfsd', '3', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', '0', '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('52', '谁gsdf', '9@qq.com', '44@a.com', 'dsfsd', '3', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', '0', '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('53', '谁adfa', '9@qq.com', '44@a.com', 'dsfsd', '2', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', '0', '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('54', '谁afe', '9@qq.com', '44@a.com', 'dsfsd', '2', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', '0', '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('55', '谁ef', '9@qq.com', '44@a.com', 'dsfsd', '2', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', '0', '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('56', '谁daf', '9@qq.com', '44@a.com', 'dsfsd', '2', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', '0', '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('57', '谁df', '9@qq.com', '44@a.com', 'dsfsd', '2', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', '0', '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('58', '谁aef', '9@qq.com', '44@a.com', 'dsfsd', '2', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', '0', '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('59', '谁34er', '9@qq.com', '44@a.com', 'dsfsd', '3', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', '0', '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('60', '谁v43', '9@qq.com', '44@a.com', 'dsfsd', '3', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', '0', '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('61', '谁wert134', '9@qq.com', '44@a.com', 'dsfsd', '3', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', '0', '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('62', '谁324', '9@qq.com', '44@a.com', 'dsfsd', '0', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', '0', '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('63', '谁rqe', '9@qq.com', '44@a.com', 'dsfsd', '0', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', '0', '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('64', '谁efe', '9@qq.com', '44@a.com', 'dsfsd', '0', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', '0', '0', '0', '0', '0');
INSERT INTO `ce_email` VALUES ('65', '谁we', '9@qq.com', '44@a.com', 'dsfsd', '0', '0', '12', '2017-06-05 14:49:28', '2017-06-13 14:49:25', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for ce_emailfiledir
-- ----------------------------
DROP TABLE IF EXISTS `ce_emailfiledir`;
CREATE TABLE `ce_emailfiledir` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `CompanyID` int(11) DEFAULT NULL,
  `CityID` int(11) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  `CreateTime` datetime DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `ParentID` int(11) DEFAULT NULL COMMENT '父ID',
  `Type` int(11) DEFAULT NULL COMMENT '0:邮件1：消息2：任务',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文件分组';

-- ----------------------------
-- Records of ce_emailfiledir
-- ----------------------------

-- ----------------------------
-- Table structure for ce_enclosure
-- ----------------------------
DROP TABLE IF EXISTS `ce_enclosure`;
CREATE TABLE `ce_enclosure` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Name` char(100) DEFAULT NULL COMMENT '名称',
  `Type` int(255) unsigned DEFAULT '0' COMMENT '0:图片1file',
  `EmailID` int(11) DEFAULT '0' COMMENT '邮件ID',
  `Path` char(255) DEFAULT NULL COMMENT '附件地址',
  `IsDelete` int(5) DEFAULT '0' COMMENT '是否删除',
  `Createtime` datetime DEFAULT NULL,
  `Updatetime` datetime DEFAULT NULL,
  `Quote` int(5) DEFAULT '0' COMMENT '引用计数',
  `CityID` int(11) DEFAULT '0' COMMENT '城市ID',
  `CompanyID` int(11) DEFAULT '0' COMMENT '公司id',
  `EmailDirID` int(11) DEFAULT NULL COMMENT '附件分组id',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COMMENT='邮箱附件表';

-- ----------------------------
-- Records of ce_enclosure
-- ----------------------------
INSERT INTO `ce_enclosure` VALUES ('1', 'dfa', '1', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('2', 'dfa', '1', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('3', 'dfa', '1', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('4', 'dfa', '1', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('5', 'dfa', '1', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('6', 'dfa', '1', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('7', 'dfa', '0', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('8', 'dfa', '1', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('9', 'dfa', '1', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('10', 'dfa', '0', '2', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('11', 'dfa', '1', '3', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('12', 'dfa', '1', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('13', 'dfa', '1', '3', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('14', 'dfa', '1', '3', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('15', 'dfa', '0', '13', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('16', 'dfa', '0', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('17', 'dfa', '0', '13', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('18', 'dfa', '0', '2', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('19', 'dfa', '0', '4', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('20', 'dfa', '0', '13', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('21', 'dfa', '0', '123', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('22', 'dfa', '1', '12', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('23', 'dfa', '0', '12', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('24', 'dfa', '1', '11', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('25', 'dfa', '1', '15', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('26', 'dfa', '1', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('27', 'dfa', '0', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('28', 'dfa', '1', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('29', 'dfa', '0', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('30', 'dfa', '11', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('31', 'dfa', '0', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('32', 'dfa', '0', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('33', 'dfa', '0', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('34', 'dfa', '1', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('35', 'dfa', '0', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('36', 'dfa', '1', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('37', 'dfa', '1', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('38', 'dfa', '0', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('39', 'dfa', '1', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('40', 'dfa', '0', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('41', 'dfa', '0', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('42', 'dfa', '1', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('43', 'dfa', '1', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('44', 'dfa', '1', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('45', 'dfa', '1', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('46', 'dfa', '1', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('47', 'dfa', '0', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('48', 'dfa', '11', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('49', 'dfa', '1', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('50', 'dfa', '0', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('51', 'dfa', '1', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);
INSERT INTO `ce_enclosure` VALUES ('52', 'dfa', '1', '1', 'dsfasf', '0', '2017-06-05 17:29:06', '2017-06-19 17:29:10', '0', '0', '0', null);

-- ----------------------------
-- Table structure for ce_file
-- ----------------------------
DROP TABLE IF EXISTS `ce_file`;
CREATE TABLE `ce_file` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `FileName` varchar(255) DEFAULT NULL,
  `URL` varchar(255) DEFAULT NULL,
  `Path` varchar(255) DEFAULT NULL,
  `UserID` bigint(20) DEFAULT NULL,
  `Quote` int(5) DEFAULT NULL,
  `type` char(20) DEFAULT NULL COMMENT '文件类型',
  `FileID` bigint(20) DEFAULT NULL,
  `DatetimeCreated` datetime DEFAULT NULL,
  `DatetimeUpdated` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ce_file
-- ----------------------------

-- ----------------------------
-- Table structure for ce_image
-- ----------------------------
DROP TABLE IF EXISTS `ce_image`;
CREATE TABLE `ce_image` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ImageName` char(255) DEFAULT NULL,
  `URL` char(255) DEFAULT NULL,
  `Path` char(255) DEFAULT NULL,
  `UserID` bigint(20) DEFAULT NULL,
  `Type` char(20) DEFAULT NULL COMMENT '文件类型',
  `FileID` bigint(20) DEFAULT NULL,
  `DatetimeCreated` datetime DEFAULT NULL,
  `DatetimeUpdated` datetime DEFAULT NULL,
  `IsDelete` int(5) DEFAULT '0',
  `Quote` int(5) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ce_image
-- ----------------------------
INSERT INTO `ce_image` VALUES ('4', '杯子', 'http://dsfaldkf', 'sdfa', '1', 'png', '1', '2017-05-09 14:58:22', '2017-05-15 14:58:25', null, null);
INSERT INTO `ce_image` VALUES ('5', '杯子', 'http://dsfaldkf', 'sdfa', '1', 'png', '1', '2017-05-09 14:58:22', '2017-05-15 14:58:25', null, null);
INSERT INTO `ce_image` VALUES ('6', '杯子', 'http://dsfaldkf', 'sdfa', '1', 'png', '1', '2017-05-09 14:58:22', '2017-05-15 14:58:25', null, null);
INSERT INTO `ce_image` VALUES ('7', '杯子', 'http://dsfaldkf', 'sdfa', '1', 'png', '1', '2017-05-09 14:58:22', '2017-05-15 14:58:25', null, null);
INSERT INTO `ce_image` VALUES ('8', '杯子', 'http://dsfaldkf', 'sdfa', '1', 'png', '1', '2017-05-09 14:58:22', '2017-05-15 14:58:25', null, null);
INSERT INTO `ce_image` VALUES ('9', '杯子', 'http://dsfaldkf', 'sdfa', '1', 'png', '1', '2017-05-09 14:58:22', '2017-05-15 14:58:25', null, null);
INSERT INTO `ce_image` VALUES ('10', '杯子', 'http://dsfaldkf', 'sdfa', '1', 'png', '1', '2017-05-09 14:58:22', '2017-05-15 14:58:25', null, null);
INSERT INTO `ce_image` VALUES ('11', '杯子', 'http://dsfaldkf', 'sdfa', '1', 'png', '1', '2017-05-09 14:58:22', '2017-05-15 14:58:25', null, null);
INSERT INTO `ce_image` VALUES ('12', '杯子', 'http://dsfaldkf', 'sdfa', '1', 'png', '1', '2017-05-09 14:58:22', '2017-05-15 14:58:25', null, null);
INSERT INTO `ce_image` VALUES ('13', '杯子', 'http://dsfaldkf', 'sdfa', '1', 'png', '1', '2017-05-09 14:58:22', '2017-05-15 14:58:25', null, null);
INSERT INTO `ce_image` VALUES ('14', '杯子', 'http://dsfaldkf', 'sdfa', '1', 'png', '1', '2017-05-09 14:58:22', '2017-05-15 14:58:25', null, null);
INSERT INTO `ce_image` VALUES ('15', '杯子', 'http://dsfaldkf', 'sdfa', '1', 'png', '1', '2017-05-09 14:58:22', '2017-05-15 14:58:25', null, null);
INSERT INTO `ce_image` VALUES ('16', '杯子', 'http://dsfaldkf', 'sdfa', '1', 'png', '1', '2017-05-09 14:58:22', '2017-05-15 14:58:25', null, null);
INSERT INTO `ce_image` VALUES ('17', '杯子', 'http://dsfaldkf', 'sdfa', '1', 'png', '1', '2017-05-09 14:58:22', '2017-05-15 14:58:25', null, null);
INSERT INTO `ce_image` VALUES ('18', '杯子', 'http://dsfaldkf', 'sdfa', '1', 'png', '1', '2017-05-09 14:58:22', '2017-05-15 14:58:25', null, null);
INSERT INTO `ce_image` VALUES ('19', '杯子', 'http://dsfaldkf', 'sdfa', '1', 'png', '1', '2017-05-09 14:58:22', '2017-05-15 14:58:25', null, null);
INSERT INTO `ce_image` VALUES ('20', '杯子', 'http://dsfaldkf', 'sdfa', '1', 'png', '1', '2017-05-09 14:58:22', '2017-05-15 14:58:25', null, null);
INSERT INTO `ce_image` VALUES ('21', '杯子', 'http://dsfaldkf', 'sdfa', '1', 'png', '1', '2017-05-09 14:58:22', '2017-05-15 14:58:25', null, null);
INSERT INTO `ce_image` VALUES ('22', '杯子', 'http://dsfaldkf', 'sdfa', '1', 'png', '1', '2017-05-09 14:58:22', '2017-05-15 14:58:25', null, null);
INSERT INTO `ce_image` VALUES ('23', '杯子', 'http://dsfaldkf', 'sdfa', '1', 'png', '1', '2017-05-09 14:58:22', '2017-05-15 14:58:25', null, null);
INSERT INTO `ce_image` VALUES ('24', '杯子', 'http://dsfaldkf', 'sdfa', '1', 'png', '1', '2017-05-09 14:58:22', '2017-05-15 14:58:25', null, null);
INSERT INTO `ce_image` VALUES ('25', '杯子', 'http://dsfaldkf', 'sdfa', '1', 'png', '1', '2017-05-09 14:58:22', '2017-05-15 14:58:25', null, null);
INSERT INTO `ce_image` VALUES ('26', 'f.jpg', 'upload/file/image/20170603/f49078f99afd1c35eafe130c1f0f09a2.jpg', 'upload/file/image/20170603/f49078f99afd1c35eafe130c1f0f09a2.jpg', null, null, '0', null, null, '0', null);
INSERT INTO `ce_image` VALUES ('27', 'f.jpg', 'upload/file/image/20170603/9fbfb16832af7818d43b087083428ae5.jpg', 'upload/file/image/20170603/9fbfb16832af7818d43b087083428ae5.jpg', null, null, '0', null, null, '0', null);
INSERT INTO `ce_image` VALUES ('28', 'f.jpg', 'upload/file/image/20170603/db00c0fc7bcd83f9b781963a6a5fa13d.jpg', 'upload/file/image/20170603/db00c0fc7bcd83f9b781963a6a5fa13d.jpg', null, null, '0', null, null, '0', null);
INSERT INTO `ce_image` VALUES ('29', 'f.jpg', 'upload/file/image/20170617/f9a4e5e9a3f618d32170eefaaaee258f.jpg', 'upload/file/image/20170617/f9a4e5e9a3f618d32170eefaaaee258f.jpg', null, 'jpeg', '1', null, null, '0', null);
INSERT INTO `ce_image` VALUES ('30', 'tt.jpg', 'upload/file/image/20170617/8df690015218566aea0b74ccc361d4a4.jpg', 'upload/file/image/20170617/8df690015218566aea0b74ccc361d4a4.jpg', null, 'jpeg', '1', null, null, '0', null);

-- ----------------------------
-- Table structure for ce_information
-- ----------------------------
DROP TABLE IF EXISTS `ce_information`;
CREATE TABLE `ce_information` (
  `ID` bigint(20) NOT NULL,
  `Information` char(255) DEFAULT NULL COMMENT '信息主题',
  `From` bigint(20) DEFAULT NULL COMMENT '来自',
  `To` bigint(20) DEFAULT NULL COMMENT '去向',
  `Type` char(255) DEFAULT NULL COMMENT '类型',
  `Createtime` datetime DEFAULT NULL,
  `Updatetime` datetime DEFAULT NULL,
  `IsDelete` int(5) DEFAULT NULL COMMENT '是否删除',
  `IsRead` int(5) DEFAULT NULL COMMENT '是否以读',
  `CompanyID` int(11) DEFAULT NULL,
  `CityID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户之间信息表';

-- ----------------------------
-- Records of ce_information
-- ----------------------------

-- ----------------------------
-- Table structure for ce_log
-- ----------------------------
DROP TABLE IF EXISTS `ce_log`;
CREATE TABLE `ce_log` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Title` char(255) DEFAULT NULL COMMENT '标题',
  `Content` char(255) DEFAULT NULL COMMENT '内容',
  `CompanyID` int(11) DEFAULT NULL COMMENT '公司ID',
  `CityID` int(11) DEFAULT NULL COMMENT '城市',
  `Createtime` datetime DEFAULT NULL COMMENT '创建时间',
  `Updatetime` datetime DEFAULT NULL COMMENT '更新时间',
  `UserID` bigint(20) DEFAULT NULL COMMENT '用户id',
  `Type` int(255) DEFAULT NULL COMMENT '类型。2：警告，1：错误，0普通',
  `IsDelete` int(5) DEFAULT NULL COMMENT '是否删除',
  `ErrorID` bigint(20) DEFAULT NULL COMMENT '错误代码',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='日志表';

-- ----------------------------
-- Records of ce_log
-- ----------------------------
INSERT INTO `ce_log` VALUES ('1', 'sdfasd', '都是发的', '0', '0', '2017-05-08 11:20:12', '2017-05-15 11:20:16', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for ce_member
-- ----------------------------
DROP TABLE IF EXISTS `ce_member`;
CREATE TABLE `ce_member` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `UserID` bigint(20) NOT NULL,
  `Username` char(60) NOT NULL DEFAULT '' COMMENT '用户名',
  `Nickname` char(32) DEFAULT NULL COMMENT '昵称',
  `Password` char(64) NOT NULL DEFAULT '' COMMENT '登录密码；mb_password加密',
  `Avatar` char(255) DEFAULT '' COMMENT '用户头像，相对于upload/avatar目录',
  `Email` char(100) NOT NULL DEFAULT '' COMMENT '登录邮箱',
  `CityID` char(16) DEFAULT '0' COMMENT '市',
  `Signature` char(64) DEFAULT NULL COMMENT '个性签名',
  `Lleval_id` tinyint(4) DEFAULT '0' COMMENT '会员等级',
  `Iintegral` int(11) DEFAULT '0' COMMENT '积分',
  `Gold` int(11) DEFAULT '0' COMMENT '金币',
  `Status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '用户状态 0：禁用； 1：正常 ；2：未验证',
  `Sendtime` char(32) DEFAULT NULL COMMENT '找回密码发送邮件的时间',
  `IsDelete` int(5) DEFAULT NULL,
  `Createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `Updatetime` datetime DEFAULT NULL COMMENT '更新时间',
  `CompanyID` int(11) DEFAULT NULL,
  `Auth` tinytext COMMENT '权限列表',
  PRIMARY KEY (`id`),
  KEY `user_login_key` (`Username`) USING BTREE,
  KEY `user` (`UserID`),
  CONSTRAINT `user` FOREIGN KEY (`UserID`) REFERENCES `ce_memberinfo` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of ce_member
-- ----------------------------

-- ----------------------------
-- Table structure for ce_memberinfo
-- ----------------------------
DROP TABLE IF EXISTS `ce_memberinfo`;
CREATE TABLE `ce_memberinfo` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `UserID` bigint(20) DEFAULT NULL COMMENT '用户名',
  `OldPassword` char(64) NOT NULL DEFAULT '' COMMENT '登录密码；mb_password加密',
  `Sex` char(4) DEFAULT '0' COMMENT '性别 1是男，2是女',
  `Email_code` char(60) DEFAULT NULL COMMENT '激活码',
  `Phone` bigint(11) unsigned DEFAULT NULL COMMENT '手机号',
  `Job` char(32) DEFAULT NULL COMMENT '职位',
  `Sign_count` int(11) DEFAULT '0' COMMENT '连续签到次数',
  `Real_name` char(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_login_key` (`UserID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户详细信息表';

-- ----------------------------
-- Records of ce_memberinfo
-- ----------------------------

-- ----------------------------
-- Table structure for ce_memberrule
-- ----------------------------
DROP TABLE IF EXISTS `ce_memberrule`;
CREATE TABLE `ce_memberrule` (
  `ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员角色表';

-- ----------------------------
-- Records of ce_memberrule
-- ----------------------------

-- ----------------------------
-- Table structure for ce_menu
-- ----------------------------
DROP TABLE IF EXISTS `ce_menu`;
CREATE TABLE `ce_menu` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `MenuName` char(100) COLLATE utf8_latvian_ci DEFAULT NULL,
  `ParentID` int(11) unsigned DEFAULT NULL,
  `URL` char(100) COLLATE utf8_latvian_ci DEFAULT NULL,
  `Flag` int(11) DEFAULT '0' COMMENT '是否是按钮',
  `css` char(20) COLLATE utf8_latvian_ci DEFAULT NULL,
  `IsDelete` int(11) DEFAULT '0',
  `DatetimeCreated` datetime DEFAULT NULL,
  `DatetimeUpdated` datetime DEFAULT NULL,
  `Condition` varchar(255) COLLATE utf8_latvian_ci DEFAULT NULL COMMENT '额外的规则',
  `Param` varchar(255) COLLATE utf8_latvian_ci DEFAULT NULL COMMENT '参数',
  `CompanyID` int(11) DEFAULT NULL,
  `CityID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci;

-- ----------------------------
-- Records of ce_menu
-- ----------------------------
INSERT INTO `ce_menu` VALUES ('1', '系统设置', '0', '#', '0', null, '0', '2017-02-21 18:33:05', '2017-02-20 18:33:08', null, null, '1', '1');
INSERT INTO `ce_menu` VALUES ('2', '内容管理', '0', '#', '0', null, '0', '2017-02-20 18:34:21', '2017-02-20 18:34:25', null, null, '1', '1');
INSERT INTO `ce_menu` VALUES ('3', 'OA中心', '0', '#', '0', null, '0', '2017-02-21 18:35:39', '2017-02-21 18:35:41', null, null, '1', '1');
INSERT INTO `ce_menu` VALUES ('4', '角色管理', '1', '#index/Role/index', '0', null, '0', '2017-02-23 15:40:29', '2017-02-23 15:40:57', null, null, '1', '1');
INSERT INTO `ce_menu` VALUES ('5', '菜单管理', '1', '#index/Menu/index/', '0', null, '0', '2017-02-23 15:40:31', '2017-02-23 15:41:00', null, null, '1', '1');
INSERT INTO `ce_menu` VALUES ('6', '用户管理', '1', '#index/User/index/', '0', null, '0', '2017-02-23 15:40:33', '2017-02-23 15:41:03', null, null, '1', '1');
INSERT INTO `ce_menu` VALUES ('7', '部门管理', '1', '#index/Department/index/', '0', null, '0', '2017-02-23 15:40:36', '2017-02-23 15:41:05', null, null, '1', '1');
INSERT INTO `ce_menu` VALUES ('20', '数据库管理', '1', '#index/Database/index/', '0', null, '0', '2017-02-23 15:40:36', '2017-02-23 15:40:36', null, null, '1', '1');
INSERT INTO `ce_menu` VALUES ('21', '日志管理', '1', '#index/Log/index/', '0', null, '0', '2017-02-23 15:40:36', '2017-02-23 15:40:36', null, null, '1', '1');
INSERT INTO `ce_menu` VALUES ('22', '网信管理', '0', '#', '0', null, '0', '2017-02-23 15:40:36', '2017-02-23 15:40:36', null, null, '1', '1');
INSERT INTO `ce_menu` VALUES ('23', '页面管理', '2', '#', '0', null, '0', '2017-02-23 15:40:36', '2017-02-23 15:40:36', null, null, '1', '1');
INSERT INTO `ce_menu` VALUES ('24', '控件管理', '2', '#web/Widget/index', '0', null, '0', '2017-02-23 15:40:36', '2017-02-23 15:40:36', null, null, '1', '1');
INSERT INTO `ce_menu` VALUES ('25', '文章管理', '2', '#web/Article/index', '0', null, '0', '2017-02-23 15:40:36', '2017-02-23 15:40:36', null, null, '1', '1');
INSERT INTO `ce_menu` VALUES ('26', '其他管理', '1', '#', '0', null, '0', '2017-02-23 15:40:36', '2017-02-23 15:40:36', null, null, '1', '1');
INSERT INTO `ce_menu` VALUES ('27', '图片管理', '26', '#index/Image/index/', '0', null, '0', '2017-02-23 15:40:36', '2017-02-23 15:40:36', null, null, '1', '1');
INSERT INTO `ce_menu` VALUES ('28', '文件管理', '26', '#index/File/index/', '0', null, '0', '2017-02-23 15:40:36', '2017-02-23 15:40:36', null, null, '1', '1');
INSERT INTO `ce_menu` VALUES ('29', '页面设计', '23', '#web/Index/index', '0', null, '0', '2017-02-23 15:40:36', '2017-02-23 15:40:36', null, null, '1', '1');
INSERT INTO `ce_menu` VALUES ('30', ' 系统配置', '26', '#index/Sysconf/index', '0', null, '0', '2017-02-23 15:40:36', '2017-02-23 15:40:36', null, null, '1', '1');
INSERT INTO `ce_menu` VALUES ('31', '消息管理', '22', '#netletter/index/index', '0', null, '0', '2017-02-23 15:40:36', '2017-02-23 15:40:36', null, null, '1', '1');
INSERT INTO `ce_menu` VALUES ('32', '任务管理', '22', '#netletter/task/index', '0', null, '0', '2017-02-23 15:40:36', '2017-02-23 15:40:36', null, null, '1', '1');
INSERT INTO `ce_menu` VALUES ('33', '邮件管理', '22', '#netletter/Email/index', '0', null, '0', '2017-02-23 15:40:36', '2017-02-23 15:40:36', null, null, '1', '1');
INSERT INTO `ce_menu` VALUES ('35', '信息提醒', '22', '#netletter/Waringmsg /index', '0', null, '0', '2017-02-23 15:40:36', '2017-02-23 15:40:36', null, null, '1', '1');
INSERT INTO `ce_menu` VALUES ('36', '文章列表', '2', '#web/Article/articleList', '0', null, '0', '2017-02-23 15:40:36', '2017-02-23 15:40:36', null, null, '1', '1');
INSERT INTO `ce_menu` VALUES ('37', '弹出框', '3', '#widow/Filewindow/index', '0', null, '0', '2017-02-23 15:40:36', '2017-02-23 15:40:36', null, null, '1', '1');
INSERT INTO `ce_menu` VALUES ('38', '模板管理', '2', '#web/template/index', '0', null, '0', '2017-02-23 15:40:36', '2017-02-23 15:40:36', null, null, '1', '1');
INSERT INTO `ce_menu` VALUES ('39', '模块管理', '2', '#web/Navigation/index', '0', null, '0', '2017-02-23 15:40:36', '2017-02-23 15:40:36', null, null, '1', '1');
INSERT INTO `ce_menu` VALUES ('40', '权限管理', '2', '#web/Auth/index', '0', null, '0', '2017-02-23 15:40:36', '2017-02-23 15:40:36', null, null, '1', '1');
INSERT INTO `ce_menu` VALUES ('41', '个人桌面', '3', '#web/Auth/index', '0', null, '0', '2017-02-23 15:40:36', '2017-02-23 15:40:36', null, null, '1', '1');
INSERT INTO `ce_menu` VALUES ('42', '人事管理', '3', '#web/Auth/index', '0', null, '0', '2017-02-23 15:40:36', '2017-02-23 15:40:36', null, null, '1', '1');
INSERT INTO `ce_menu` VALUES ('43', '财务管理', '3', '#web/Auth/index', '0', null, '0', '2017-02-23 15:40:36', '2017-02-23 15:40:36', null, null, '1', '1');
INSERT INTO `ce_menu` VALUES ('44', '业务管理', '3', '#web/Auth/index', '0', null, '0', '2017-02-23 15:40:36', '2017-02-23 15:40:36', null, null, '1', '1');
INSERT INTO `ce_menu` VALUES ('45', '合同管理', '3', '#web/Auth/index', '0', null, '0', '2017-02-23 15:40:36', '2017-02-23 15:40:36', null, null, '1', '1');
INSERT INTO `ce_menu` VALUES ('46', '政策管理', '3', '#web/Auth/index', '0', null, '0', '2017-02-23 15:40:36', '2017-02-23 15:40:36', null, null, '1', '1');
INSERT INTO `ce_menu` VALUES ('47', '资料管理', '3', '#web/Auth/index', '0', null, '0', '2017-02-23 15:40:36', '2017-02-23 15:40:36', null, null, '1', '1');
INSERT INTO `ce_menu` VALUES ('48', '资产管理', '3', '#web/Auth/index', '0', null, '0', '2017-02-23 15:40:36', '2017-02-23 15:40:36', null, null, '1', '1');
INSERT INTO `ce_menu` VALUES ('49', '论坛', '3', '#web/Auth/index', '0', null, '0', '2017-02-23 15:40:36', '2017-02-23 15:40:36', null, null, '1', '1');

-- ----------------------------
-- Table structure for ce_menu_role
-- ----------------------------
DROP TABLE IF EXISTS `ce_menu_role`;
CREATE TABLE `ce_menu_role` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `MenuID` bigint(20) NOT NULL,
  `RoleID` bigint(20) NOT NULL,
  `DatetimeCreated` datetime DEFAULT NULL,
  `DatetimeUpdated` datetime DEFAULT NULL,
  `IsDelete` int(11) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci;

-- ----------------------------
-- Records of ce_menu_role
-- ----------------------------
INSERT INTO `ce_menu_role` VALUES ('1', '1', '1', '2017-02-23 14:56:26', '2017-03-06 16:32:39', '0');
INSERT INTO `ce_menu_role` VALUES ('2', '2', '1', '2017-02-23 15:50:31', '2017-03-06 16:32:41', '0');
INSERT INTO `ce_menu_role` VALUES ('3', '3', '1', '2017-02-23 15:50:34', '2017-03-06 16:32:45', '0');
INSERT INTO `ce_menu_role` VALUES ('4', '4', '1', '2017-03-06 16:32:04', '2017-03-06 16:32:46', '0');
INSERT INTO `ce_menu_role` VALUES ('5', '5', '1', '2017-03-06 16:32:09', '2017-03-06 16:32:48', '0');
INSERT INTO `ce_menu_role` VALUES ('6', '6', '1', '2017-03-06 16:32:11', '2017-03-06 16:32:51', '0');
INSERT INTO `ce_menu_role` VALUES ('7', '7', '1', '2017-03-23 16:32:20', '2017-03-06 16:32:53', '0');
INSERT INTO `ce_menu_role` VALUES ('8', '8', '1', '2017-03-06 16:32:12', '2017-03-06 16:32:55', '0');
INSERT INTO `ce_menu_role` VALUES ('9', '9', '1', '2017-03-16 16:32:22', '2017-03-06 16:32:57', '0');
INSERT INTO `ce_menu_role` VALUES ('10', '21', '1', '2017-03-06 16:32:25', '2017-03-06 16:32:59', '0');
INSERT INTO `ce_menu_role` VALUES ('11', '22', '1', '2017-03-06 16:32:27', '2017-03-06 16:33:04', '0');
INSERT INTO `ce_menu_role` VALUES ('12', '23', '1', '2017-03-06 16:32:29', '2017-03-06 16:33:06', '0');
INSERT INTO `ce_menu_role` VALUES ('13', '24', '1', '2017-03-06 16:32:31', '2017-03-06 16:33:07', '0');
INSERT INTO `ce_menu_role` VALUES ('16', '25', '1', '2017-03-06 16:32:33', '2017-03-06 16:33:09', '0');
INSERT INTO `ce_menu_role` VALUES ('17', '20', '1', null, null, '0');
INSERT INTO `ce_menu_role` VALUES ('18', '27', '1', null, null, '0');
INSERT INTO `ce_menu_role` VALUES ('19', '28', '1', null, null, '0');
INSERT INTO `ce_menu_role` VALUES ('20', '29', '1', null, null, '0');
INSERT INTO `ce_menu_role` VALUES ('21', '26', '1', null, null, '0');
INSERT INTO `ce_menu_role` VALUES ('22', '30', '1', null, null, '0');
INSERT INTO `ce_menu_role` VALUES ('23', '31', '1', null, null, '0');
INSERT INTO `ce_menu_role` VALUES ('24', '32', '1', null, null, '0');
INSERT INTO `ce_menu_role` VALUES ('25', '33', '1', null, null, '0');
INSERT INTO `ce_menu_role` VALUES ('27', '35', '1', null, null, '0');
INSERT INTO `ce_menu_role` VALUES ('28', '36', '1', null, null, '0');
INSERT INTO `ce_menu_role` VALUES ('29', '37', '1', null, null, '0');
INSERT INTO `ce_menu_role` VALUES ('30', '38', '1', null, null, '0');
INSERT INTO `ce_menu_role` VALUES ('31', '39', '1', null, null, '0');
INSERT INTO `ce_menu_role` VALUES ('32', '40', '1', null, null, '0');
INSERT INTO `ce_menu_role` VALUES ('33', '41', '1', null, null, '0');
INSERT INTO `ce_menu_role` VALUES ('34', '42', '1', null, null, '0');
INSERT INTO `ce_menu_role` VALUES ('35', '43', '1', null, null, '0');
INSERT INTO `ce_menu_role` VALUES ('36', '44', '1', null, null, '0');
INSERT INTO `ce_menu_role` VALUES ('37', '45', '1', null, null, '0');
INSERT INTO `ce_menu_role` VALUES ('38', '46', '1', null, null, '0');
INSERT INTO `ce_menu_role` VALUES ('39', '47', '1', null, null, '0');
INSERT INTO `ce_menu_role` VALUES ('40', '48', '1', null, null, '0');
INSERT INTO `ce_menu_role` VALUES ('41', '49', '1', null, null, '0');

-- ----------------------------
-- Table structure for ce_message
-- ----------------------------
DROP TABLE IF EXISTS `ce_message`;
CREATE TABLE `ce_message` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `MessageID` bigint(20) DEFAULT NULL,
  `SendID` bigint(20) DEFAULT NULL,
  `DatetimeCreated` datetime DEFAULT NULL,
  `DatetimeUpdated` datetime DEFAULT NULL,
  `CityID` int(11) DEFAULT NULL,
  `CompanyID` int(11) DEFAULT NULL,
  `IsRead` int(5) DEFAULT NULL,
  `state` int(5) DEFAULT '0' COMMENT '0：未发送。1：已发送2：草稿',
  `UserID` int(11) DEFAULT '0' COMMENT '发送人ID ',
  PRIMARY KEY (`ID`),
  KEY `message` (`MessageID`),
  CONSTRAINT `message` FOREIGN KEY (`MessageID`) REFERENCES `ce_messageinfo` (`messageID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ce_message
-- ----------------------------

-- ----------------------------
-- Table structure for ce_messagegroup
-- ----------------------------
DROP TABLE IF EXISTS `ce_messagegroup`;
CREATE TABLE `ce_messagegroup` (
  `ID` int(11) NOT NULL,
  `MessageGroupID` int(11) DEFAULT NULL,
  `Name` char(20) DEFAULT NULL,
  `IsDelete` int(5) DEFAULT NULL,
  `DatetimeCreated` datetime DEFAULT NULL,
  `DatetimeUpdated` datetime DEFAULT NULL,
  `CompanyID` int(11) DEFAULT NULL,
  `CityID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ce_messagegroup
-- ----------------------------

-- ----------------------------
-- Table structure for ce_messageinfo
-- ----------------------------
DROP TABLE IF EXISTS `ce_messageinfo`;
CREATE TABLE `ce_messageinfo` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) DEFAULT NULL,
  `body` char(255) DEFAULT NULL,
  `type` char(255) DEFAULT '0',
  `IsDelete` int(5) DEFAULT '0',
  `messageID` bigint(20) NOT NULL DEFAULT '0',
  `state` int(5) DEFAULT '0' COMMENT '0：表示未发送。1：已发送2：草稿',
  `msggroupID` bigint(20) DEFAULT '0' COMMENT '消息组id',
  `UserID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `messageID` (`messageID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ce_messageinfo
-- ----------------------------

-- ----------------------------
-- Table structure for ce_navigation
-- ----------------------------
DROP TABLE IF EXISTS `ce_navigation`;
CREATE TABLE `ce_navigation` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL COMMENT '名称',
  `ParentID` int(11) DEFAULT NULL,
  `CompanyID` int(11) DEFAULT NULL,
  `CityID` int(11) DEFAULT NULL,
  `Accesstype` int(5) DEFAULT '0' COMMENT '访问类型',
  `UserID` int(11) DEFAULT NULL COMMENT '创建id',
  `isParent` int(5) DEFAULT NULL,
  `EnName` varchar(255) DEFAULT NULL COMMENT '英文名称',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='栏目表';

-- ----------------------------
-- Records of ce_navigation
-- ----------------------------
INSERT INTO `ce_navigation` VALUES ('1', '综合', '0', '0', '0', '0', '1', '1', null);
INSERT INTO `ce_navigation` VALUES ('2', '首页', '1', '0', '0', '0', '1', '1', null);
INSERT INTO `ce_navigation` VALUES ('3', '演示', '1', '0', '0', '0', '1', '1', null);
INSERT INTO `ce_navigation` VALUES ('4', '下载', '1', '0', '0', '0', '1', '1', null);
INSERT INTO `ce_navigation` VALUES ('5', '文档', '1', '0', '0', '0', '1', '1', null);

-- ----------------------------
-- Table structure for ce_pagehtml
-- ----------------------------
DROP TABLE IF EXISTS `ce_pagehtml`;
CREATE TABLE `ce_pagehtml` (
  `ID` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `Name` char(255) DEFAULT NULL COMMENT '网页的名称',
  `TempleID` int(20) DEFAULT NULL COMMENT '模板id',
  `SoureCode` text COMMENT '源代码',
  `BinaryCode` text COMMENT '编译后的代码',
  `DatetimeUpdated` datetime DEFAULT NULL COMMENT '更新时间',
  `CityID` int(11) DEFAULT NULL,
  `Title` varchar(255) DEFAULT NULL COMMENT '网页标题',
  `KeyWord` varchar(255) DEFAULT NULL COMMENT '关键内容',
  `Accesstype` int(5) DEFAULT NULL COMMENT '访问类型0：公共1私有2:保护',
  `IsDelete` int(5) DEFAULT '0' COMMENT '是否删除',
  `CompanyID` int(20) DEFAULT NULL,
  `DatetimeCreated` datetime DEFAULT NULL COMMENT '创建时间',
  `NavID` int(11) DEFAULT '0' COMMENT '导航id',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ce_pagehtml
-- ----------------------------
INSERT INTO `ce_pagehtml` VALUES ('1', '首页', '1', 'r', 'd', '2017-04-11 16:50:44', '0', '首页', '我是', '0', '0', '0', '2017-04-11 16:50:31', '2');
INSERT INTO `ce_pagehtml` VALUES ('2', '导航', '2', 'd', 'd', '2017-04-11 16:50:47', '0', '演示', '林北', '0', '0', '0', '2017-04-19 16:50:34', '3');
INSERT INTO `ce_pagehtml` VALUES ('3', '商城', '3', 'c', 'd', '2017-04-11 16:50:50', '0', '下载', '软件', '0', '0', '0', '2017-04-11 16:50:38', '4');
INSERT INTO `ce_pagehtml` VALUES ('4', '联系我们', '4', 'd', 'd', '2017-04-11 16:50:53', '0', '文档', 'doc', '0', '0', '0', '2017-04-11 16:50:42', '5');

-- ----------------------------
-- Table structure for ce_page_log
-- ----------------------------
DROP TABLE IF EXISTS `ce_page_log`;
CREATE TABLE `ce_page_log` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `PageID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL COMMENT '用户id',
  `CreateTime` datetime DEFAULT NULL COMMENT '创建时间',
  `CompanyID` int(11) DEFAULT NULL,
  `CityID` int(11) DEFAULT NULL,
  `Content` varchar(255) DEFAULT NULL COMMENT '内容',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='本表是网页内容和用户修改日志表';

-- ----------------------------
-- Records of ce_page_log
-- ----------------------------

-- ----------------------------
-- Table structure for ce_rank
-- ----------------------------
DROP TABLE IF EXISTS `ce_rank`;
CREATE TABLE `ce_rank` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `RankID` bigint(20) DEFAULT NULL,
  `RankName` char(100) COLLATE utf8_latvian_ci DEFAULT NULL,
  `IsDelete` int(11) unsigned DEFAULT '0',
  `Css` char(10) COLLATE utf8_latvian_ci DEFAULT NULL,
  `Auth` tinytext COLLATE utf8_latvian_ci,
  `CompanyAuth` tinytext COLLATE utf8_latvian_ci,
  `CityAuth` tinytext COLLATE utf8_latvian_ci,
  `Condition` varchar(255) COLLATE utf8_latvian_ci DEFAULT NULL,
  `State` int(5) DEFAULT '1' COMMENT '状态',
  `DatetimeCreated` datetime DEFAULT NULL,
  `DatetimeUpdated` datetime DEFAULT NULL,
  `CityID` int(11) DEFAULT NULL,
  `CompanyID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci COMMENT='权限表';

-- ----------------------------
-- Records of ce_rank
-- ----------------------------

-- ----------------------------
-- Table structure for ce_rank_member
-- ----------------------------
DROP TABLE IF EXISTS `ce_rank_member`;
CREATE TABLE `ce_rank_member` (
  `ID` int(11) NOT NULL,
  `RankID` int(11) NOT NULL COMMENT '等级id',
  `MemberID` int(11) NOT NULL COMMENT '会员id',
  `Createtime` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='权限与会员表';

-- ----------------------------
-- Records of ce_rank_member
-- ----------------------------

-- ----------------------------
-- Table structure for ce_role
-- ----------------------------
DROP TABLE IF EXISTS `ce_role`;
CREATE TABLE `ce_role` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `RoleID` bigint(20) DEFAULT NULL,
  `RoleName` char(100) COLLATE utf8_latvian_ci DEFAULT NULL,
  `IsDelete` int(11) unsigned DEFAULT '0',
  `CompanyID` int(11) DEFAULT NULL,
  `CityID` int(11) DEFAULT NULL,
  `Css` char(10) COLLATE utf8_latvian_ci DEFAULT NULL,
  `Auth` tinytext COLLATE utf8_latvian_ci,
  `CompanyAuth` tinytext COLLATE utf8_latvian_ci,
  `CityAuth` tinytext COLLATE utf8_latvian_ci,
  `DatetimeCreated` datetime DEFAULT NULL,
  `DatetimeUpdated` datetime DEFAULT NULL,
  `Condition` varchar(255) COLLATE utf8_latvian_ci DEFAULT NULL,
  `State` int(5) DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci;

-- ----------------------------
-- Records of ce_role
-- ----------------------------
INSERT INTO `ce_role` VALUES ('1', '1', '管理员', '0', '1', '1', 'fa', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50', '1,2,3,4', '2,3,2,1,22,222,1', '2017-02-21 18:37:01', '2017-02-21 18:37:05', null, '1');
INSERT INTO `ce_role` VALUES ('2', '2', '审核员', '0', '1', '1', 'fa', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50', '1', '1', '2017-02-21 18:37:37', '2017-02-24 10:06:04', null, '1');

-- ----------------------------
-- Table structure for ce_role_user
-- ----------------------------
DROP TABLE IF EXISTS `ce_role_user`;
CREATE TABLE `ce_role_user` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `RoleID` bigint(20) DEFAULT NULL,
  `UserID` bigint(20) DEFAULT NULL,
  `IsDelete` int(11) DEFAULT '0',
  `DatetimeCreated` datetime DEFAULT NULL,
  `DatetimeUpdated` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=453 DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci;

-- ----------------------------
-- Records of ce_role_user
-- ----------------------------
INSERT INTO `ce_role_user` VALUES ('1', '1', '824', '0', null, null);
INSERT INTO `ce_role_user` VALUES ('29', '11', '16', '0', '2017-02-23 12:31:26', '2017-02-23 12:31:26');
INSERT INTO `ce_role_user` VALUES ('30', '1', '1', '0', '2017-02-23 16:32:08', '2017-02-23 16:32:08');
INSERT INTO `ce_role_user` VALUES ('31', '13', '2', '0', '2017-02-23 16:32:08', '2017-02-23 16:32:08');
INSERT INTO `ce_role_user` VALUES ('32', '13', '3', '0', '2017-02-23 16:32:08', '2017-02-23 16:32:08');
INSERT INTO `ce_role_user` VALUES ('33', '3', '1', '0', '2017-02-27 11:21:42', '2017-02-27 11:21:42');
INSERT INTO `ce_role_user` VALUES ('34', '2', '1', '0', '2017-02-27 11:22:27', '2017-02-27 11:22:27');
INSERT INTO `ce_role_user` VALUES ('35', '2', '825', '0', '2017-02-27 11:22:27', '2017-02-27 11:22:27');
INSERT INTO `ce_role_user` VALUES ('36', '2', '827', '0', '2017-02-27 11:22:27', '2017-02-27 11:22:27');
INSERT INTO `ce_role_user` VALUES ('37', '1', '825', '0', '2017-02-27 11:23:00', '2017-02-27 11:23:00');
INSERT INTO `ce_role_user` VALUES ('38', '1', '827', '0', '2017-02-27 11:23:00', '2017-02-27 11:23:00');
INSERT INTO `ce_role_user` VALUES ('39', '1', '5', '0', '2017-02-28 06:39:25', '2017-02-28 06:39:25');
INSERT INTO `ce_role_user` VALUES ('40', '1', '9', '0', '2017-02-28 06:39:25', '2017-02-28 06:39:25');
INSERT INTO `ce_role_user` VALUES ('41', '1', '11', '0', '2017-02-28 06:39:26', '2017-02-28 06:39:26');
INSERT INTO `ce_role_user` VALUES ('42', '1', '342', '0', '2017-02-28 06:39:26', '2017-02-28 06:39:26');
INSERT INTO `ce_role_user` VALUES ('43', '1', '391', '0', '2017-02-28 06:39:26', '2017-02-28 06:39:26');
INSERT INTO `ce_role_user` VALUES ('44', '1', '556', '0', '2017-02-28 06:39:26', '2017-02-28 06:39:26');
INSERT INTO `ce_role_user` VALUES ('45', '1', '541', '0', '2017-02-28 06:39:26', '2017-02-28 06:39:26');
INSERT INTO `ce_role_user` VALUES ('46', '1', '545', '0', '2017-02-28 06:39:26', '2017-02-28 06:39:26');
INSERT INTO `ce_role_user` VALUES ('47', '1', '597', '0', '2017-02-28 06:39:26', '2017-02-28 06:39:26');
INSERT INTO `ce_role_user` VALUES ('48', '1', '601', '0', '2017-02-28 06:39:26', '2017-02-28 06:39:26');
INSERT INTO `ce_role_user` VALUES ('49', '1', '676', '0', '2017-02-28 06:39:27', '2017-02-28 06:39:27');
INSERT INTO `ce_role_user` VALUES ('50', '1', '749', '0', '2017-02-28 06:39:27', '2017-02-28 06:39:27');
INSERT INTO `ce_role_user` VALUES ('51', '1', '8', '0', '2017-02-28 06:39:27', '2017-02-28 06:39:27');
INSERT INTO `ce_role_user` VALUES ('52', '1', '16', '0', '2017-02-28 06:39:27', '2017-02-28 06:39:27');
INSERT INTO `ce_role_user` VALUES ('53', '1', '380', '0', '2017-02-28 06:39:27', '2017-02-28 06:39:27');
INSERT INTO `ce_role_user` VALUES ('54', '1', '393', '0', '2017-02-28 06:39:27', '2017-02-28 06:39:27');
INSERT INTO `ce_role_user` VALUES ('55', '1', '549', '0', '2017-02-28 06:39:27', '2017-02-28 06:39:27');
INSERT INTO `ce_role_user` VALUES ('56', '1', '474', '0', '2017-02-28 06:39:27', '2017-02-28 06:39:27');
INSERT INTO `ce_role_user` VALUES ('57', '1', '501', '0', '2017-02-28 06:39:27', '2017-02-28 06:39:27');
INSERT INTO `ce_role_user` VALUES ('58', '1', '575', '0', '2017-02-28 06:39:27', '2017-02-28 06:39:27');
INSERT INTO `ce_role_user` VALUES ('59', '1', '760', '0', '2017-02-28 06:39:27', '2017-02-28 06:39:27');
INSERT INTO `ce_role_user` VALUES ('60', '1', '761', '0', '2017-02-28 06:39:27', '2017-02-28 06:39:27');
INSERT INTO `ce_role_user` VALUES ('61', '1', '766', '0', '2017-02-28 06:39:27', '2017-02-28 06:39:27');
INSERT INTO `ce_role_user` VALUES ('62', '1', '789', '0', '2017-02-28 06:39:28', '2017-02-28 06:39:28');
INSERT INTO `ce_role_user` VALUES ('63', '1', '805', '0', '2017-02-28 06:39:28', '2017-02-28 06:39:28');
INSERT INTO `ce_role_user` VALUES ('64', '1', '806', '0', '2017-02-28 06:39:28', '2017-02-28 06:39:28');
INSERT INTO `ce_role_user` VALUES ('65', '1', '808', '0', '2017-02-28 06:39:28', '2017-02-28 06:39:28');
INSERT INTO `ce_role_user` VALUES ('66', '1', '811', '0', '2017-02-28 06:39:28', '2017-02-28 06:39:28');
INSERT INTO `ce_role_user` VALUES ('67', '1', '815', '0', '2017-02-28 06:39:28', '2017-02-28 06:39:28');
INSERT INTO `ce_role_user` VALUES ('68', '1', '3', '0', '2017-02-28 06:39:28', '2017-02-28 06:39:28');
INSERT INTO `ce_role_user` VALUES ('69', '1', '7', '0', '2017-02-28 06:39:28', '2017-02-28 06:39:28');
INSERT INTO `ce_role_user` VALUES ('70', '1', '55', '0', '2017-02-28 06:39:28', '2017-02-28 06:39:28');
INSERT INTO `ce_role_user` VALUES ('71', '1', '100', '0', '2017-02-28 06:39:28', '2017-02-28 06:39:28');
INSERT INTO `ce_role_user` VALUES ('72', '1', '369', '0', '2017-02-28 06:39:28', '2017-02-28 06:39:28');
INSERT INTO `ce_role_user` VALUES ('73', '1', '389', '0', '2017-02-28 06:39:28', '2017-02-28 06:39:28');
INSERT INTO `ce_role_user` VALUES ('74', '1', '437', '0', '2017-02-28 06:39:28', '2017-02-28 06:39:28');
INSERT INTO `ce_role_user` VALUES ('75', '1', '560', '0', '2017-02-28 06:39:28', '2017-02-28 06:39:28');
INSERT INTO `ce_role_user` VALUES ('76', '1', '779', '0', '2017-02-28 06:39:28', '2017-02-28 06:39:28');
INSERT INTO `ce_role_user` VALUES ('77', '1', '395', '0', '2017-02-28 06:39:28', '2017-02-28 06:39:28');
INSERT INTO `ce_role_user` VALUES ('78', '1', '547', '0', '2017-02-28 06:39:28', '2017-02-28 06:39:28');
INSERT INTO `ce_role_user` VALUES ('79', '1', '548', '0', '2017-02-28 06:39:28', '2017-02-28 06:39:28');
INSERT INTO `ce_role_user` VALUES ('80', '1', '492', '0', '2017-02-28 06:39:29', '2017-02-28 06:39:29');
INSERT INTO `ce_role_user` VALUES ('81', '1', '493', '0', '2017-02-28 06:39:29', '2017-02-28 06:39:29');
INSERT INTO `ce_role_user` VALUES ('82', '1', '680', '0', '2017-02-28 06:39:29', '2017-02-28 06:39:29');
INSERT INTO `ce_role_user` VALUES ('83', '1', '684', '0', '2017-02-28 06:39:29', '2017-02-28 06:39:29');
INSERT INTO `ce_role_user` VALUES ('84', '1', '783', '0', '2017-02-28 06:39:29', '2017-02-28 06:39:29');
INSERT INTO `ce_role_user` VALUES ('85', '1', '56', '0', '2017-02-28 06:39:29', '2017-02-28 06:39:29');
INSERT INTO `ce_role_user` VALUES ('86', '1', '73', '0', '2017-02-28 06:39:29', '2017-02-28 06:39:29');
INSERT INTO `ce_role_user` VALUES ('87', '1', '113', '0', '2017-02-28 06:39:29', '2017-02-28 06:39:29');
INSERT INTO `ce_role_user` VALUES ('88', '1', '154', '0', '2017-02-28 06:39:29', '2017-02-28 06:39:29');
INSERT INTO `ce_role_user` VALUES ('89', '1', '179', '0', '2017-02-28 06:39:29', '2017-02-28 06:39:29');
INSERT INTO `ce_role_user` VALUES ('90', '1', '180', '0', '2017-02-28 06:39:29', '2017-02-28 06:39:29');
INSERT INTO `ce_role_user` VALUES ('91', '1', '186', '0', '2017-02-28 06:39:29', '2017-02-28 06:39:29');
INSERT INTO `ce_role_user` VALUES ('92', '1', '385', '0', '2017-02-28 06:39:29', '2017-02-28 06:39:29');
INSERT INTO `ce_role_user` VALUES ('93', '1', '625', '0', '2017-02-28 06:39:29', '2017-02-28 06:39:29');
INSERT INTO `ce_role_user` VALUES ('94', '1', '711', '0', '2017-02-28 06:39:30', '2017-02-28 06:39:30');
INSERT INTO `ce_role_user` VALUES ('95', '1', '715', '0', '2017-02-28 06:39:30', '2017-02-28 06:39:30');
INSERT INTO `ce_role_user` VALUES ('96', '1', '717', '0', '2017-02-28 06:39:30', '2017-02-28 06:39:30');
INSERT INTO `ce_role_user` VALUES ('97', '1', '718', '0', '2017-02-28 06:39:30', '2017-02-28 06:39:30');
INSERT INTO `ce_role_user` VALUES ('98', '1', '719', '0', '2017-02-28 06:39:30', '2017-02-28 06:39:30');
INSERT INTO `ce_role_user` VALUES ('99', '1', '728', '0', '2017-02-28 06:39:30', '2017-02-28 06:39:30');
INSERT INTO `ce_role_user` VALUES ('100', '1', '731', '0', '2017-02-28 06:39:30', '2017-02-28 06:39:30');
INSERT INTO `ce_role_user` VALUES ('101', '1', '771', '0', '2017-02-28 06:39:30', '2017-02-28 06:39:30');
INSERT INTO `ce_role_user` VALUES ('102', '1', '156', '0', '2017-02-28 06:39:30', '2017-02-28 06:39:30');
INSERT INTO `ce_role_user` VALUES ('103', '1', '160', '0', '2017-02-28 06:39:30', '2017-02-28 06:39:30');
INSERT INTO `ce_role_user` VALUES ('104', '1', '402', '0', '2017-02-28 06:39:30', '2017-02-28 06:39:30');
INSERT INTO `ce_role_user` VALUES ('105', '1', '482', '0', '2017-02-28 06:39:30', '2017-02-28 06:39:30');
INSERT INTO `ce_role_user` VALUES ('106', '1', '509', '0', '2017-02-28 06:39:30', '2017-02-28 06:39:30');
INSERT INTO `ce_role_user` VALUES ('107', '1', '598', '0', '2017-02-28 06:39:30', '2017-02-28 06:39:30');
INSERT INTO `ce_role_user` VALUES ('108', '1', '74', '0', '2017-02-28 06:39:31', '2017-02-28 06:39:31');
INSERT INTO `ce_role_user` VALUES ('109', '1', '83', '0', '2017-02-28 06:39:31', '2017-02-28 06:39:31');
INSERT INTO `ce_role_user` VALUES ('110', '1', '101', '0', '2017-02-28 06:39:31', '2017-02-28 06:39:31');
INSERT INTO `ce_role_user` VALUES ('111', '1', '183', '0', '2017-02-28 06:39:31', '2017-02-28 06:39:31');
INSERT INTO `ce_role_user` VALUES ('112', '1', '208', '0', '2017-02-28 06:39:31', '2017-02-28 06:39:31');
INSERT INTO `ce_role_user` VALUES ('113', '1', '383', '0', '2017-02-28 06:39:31', '2017-02-28 06:39:31');
INSERT INTO `ce_role_user` VALUES ('114', '1', '429', '0', '2017-02-28 06:39:31', '2017-02-28 06:39:31');
INSERT INTO `ce_role_user` VALUES ('115', '1', '430', '0', '2017-02-28 06:39:31', '2017-02-28 06:39:31');
INSERT INTO `ce_role_user` VALUES ('116', '1', '433', '0', '2017-02-28 06:39:31', '2017-02-28 06:39:31');
INSERT INTO `ce_role_user` VALUES ('117', '1', '712', '0', '2017-02-28 06:39:31', '2017-02-28 06:39:31');
INSERT INTO `ce_role_user` VALUES ('118', '1', '713', '0', '2017-02-28 06:39:31', '2017-02-28 06:39:31');
INSERT INTO `ce_role_user` VALUES ('119', '1', '714', '0', '2017-02-28 06:39:31', '2017-02-28 06:39:31');
INSERT INTO `ce_role_user` VALUES ('120', '1', '716', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('121', '1', '739', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('122', '1', '752', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('123', '1', '765', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('124', '1', '33', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('125', '1', '102', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('126', '1', '110', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('127', '1', '161', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('128', '1', '373', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('129', '1', '384', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('130', '1', '416', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('131', '1', '564', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('132', '1', '641', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('133', '1', '677', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('134', '1', '726', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('135', '1', '727', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('136', '1', '753', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('137', '1', '772', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('138', '1', '795', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('139', '1', '362', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('140', '1', '379', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('141', '1', '404', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('142', '1', '543', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('143', '1', '563', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('144', '1', '603', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('145', '1', '633', '0', '2017-02-28 06:39:33', '2017-02-28 06:39:33');
INSERT INTO `ce_role_user` VALUES ('146', '1', '639', '0', '2017-02-28 06:39:33', '2017-02-28 06:39:33');
INSERT INTO `ce_role_user` VALUES ('147', '1', '403', '0', '2017-02-28 06:39:33', '2017-02-28 06:39:33');
INSERT INTO `ce_role_user` VALUES ('148', '1', '405', '0', '2017-02-28 06:39:33', '2017-02-28 06:39:33');
INSERT INTO `ce_role_user` VALUES ('149', '1', '406', '0', '2017-02-28 06:39:33', '2017-02-28 06:39:33');
INSERT INTO `ce_role_user` VALUES ('150', '1', '540', '0', '2017-02-28 06:39:33', '2017-02-28 06:39:33');
INSERT INTO `ce_role_user` VALUES ('151', '1', '551', '0', '2017-02-28 06:39:33', '2017-02-28 06:39:33');
INSERT INTO `ce_role_user` VALUES ('152', '1', '1', '0', '2017-02-28 06:39:33', '2017-02-28 06:39:33');
INSERT INTO `ce_role_user` VALUES ('153', '8', '1', '0', '2017-02-28 06:39:33', '2017-02-28 06:39:33');
INSERT INTO `ce_role_user` VALUES ('154', '9', '1', '0', '2017-02-28 06:39:33', '2017-02-28 06:39:33');
INSERT INTO `ce_role_user` VALUES ('155', '1', '526', '0', '2017-02-28 06:39:33', '2017-02-28 06:39:33');
INSERT INTO `ce_role_user` VALUES ('156', '1', '533', '0', '2017-02-28 06:39:33', '2017-02-28 06:39:33');
INSERT INTO `ce_role_user` VALUES ('157', '1', '534', '0', '2017-02-28 06:39:33', '2017-02-28 06:39:33');
INSERT INTO `ce_role_user` VALUES ('158', '1', '600', '0', '2017-02-28 06:39:34', '2017-02-28 06:39:34');
INSERT INTO `ce_role_user` VALUES ('159', '1', '628', '0', '2017-02-28 06:39:34', '2017-02-28 06:39:34');
INSERT INTO `ce_role_user` VALUES ('160', '1', '642', '0', '2017-02-28 06:39:34', '2017-02-28 06:39:34');
INSERT INTO `ce_role_user` VALUES ('161', '1', '396', '0', '2017-02-28 06:39:34', '2017-02-28 06:39:34');
INSERT INTO `ce_role_user` VALUES ('162', '1', '544', '0', '2017-02-28 06:39:34', '2017-02-28 06:39:34');
INSERT INTO `ce_role_user` VALUES ('163', '1', '455', '0', '2017-02-28 06:39:34', '2017-02-28 06:39:34');
INSERT INTO `ce_role_user` VALUES ('164', '1', '468', '0', '2017-02-28 06:39:34', '2017-02-28 06:39:34');
INSERT INTO `ce_role_user` VALUES ('165', '1', '480', '0', '2017-02-28 06:39:34', '2017-02-28 06:39:34');
INSERT INTO `ce_role_user` VALUES ('166', '1', '554', '0', '2017-02-28 06:39:34', '2017-02-28 06:39:34');
INSERT INTO `ce_role_user` VALUES ('167', '1', '502', '0', '2017-02-28 06:39:34', '2017-02-28 06:39:34');
INSERT INTO `ce_role_user` VALUES ('168', '1', '637', '0', '2017-02-28 06:39:34', '2017-02-28 06:39:34');
INSERT INTO `ce_role_user` VALUES ('169', '1', '638', '0', '2017-02-28 06:39:34', '2017-02-28 06:39:34');
INSERT INTO `ce_role_user` VALUES ('170', '1', '15', '0', '2017-02-28 06:39:34', '2017-02-28 06:39:34');
INSERT INTO `ce_role_user` VALUES ('171', '1', '58', '0', '2017-02-28 06:39:34', '2017-02-28 06:39:34');
INSERT INTO `ce_role_user` VALUES ('172', '1', '397', '0', '2017-02-28 06:39:34', '2017-02-28 06:39:34');
INSERT INTO `ce_role_user` VALUES ('173', '1', '550', '0', '2017-02-28 06:39:34', '2017-02-28 06:39:34');
INSERT INTO `ce_role_user` VALUES ('174', '1', '559', '0', '2017-02-28 06:39:35', '2017-02-28 06:39:35');
INSERT INTO `ce_role_user` VALUES ('175', '1', '537', '0', '2017-02-28 06:39:35', '2017-02-28 06:39:35');
INSERT INTO `ce_role_user` VALUES ('176', '1', '546', '0', '2017-02-28 06:39:35', '2017-02-28 06:39:35');
INSERT INTO `ce_role_user` VALUES ('177', '1', '594', '0', '2017-02-28 06:39:35', '2017-02-28 06:39:35');
INSERT INTO `ce_role_user` VALUES ('178', '1', '596', '0', '2017-02-28 06:39:35', '2017-02-28 06:39:35');
INSERT INTO `ce_role_user` VALUES ('179', '1', '531', '0', '2017-02-28 06:39:35', '2017-02-28 06:39:35');
INSERT INTO `ce_role_user` VALUES ('180', '1', '664', '0', '2017-02-28 06:39:35', '2017-02-28 06:39:35');
INSERT INTO `ce_role_user` VALUES ('181', '1', '398', '0', '2017-02-28 06:39:35', '2017-02-28 06:39:35');
INSERT INTO `ce_role_user` VALUES ('182', '1', '491', '0', '2017-02-28 06:39:35', '2017-02-28 06:39:35');
INSERT INTO `ce_role_user` VALUES ('183', '1', '503', '0', '2017-02-28 06:39:35', '2017-02-28 06:39:35');
INSERT INTO `ce_role_user` VALUES ('184', '1', '630', '0', '2017-02-28 06:39:35', '2017-02-28 06:39:35');
INSERT INTO `ce_role_user` VALUES ('185', '1', '640', '0', '2017-02-28 06:39:35', '2017-02-28 06:39:35');
INSERT INTO `ce_role_user` VALUES ('186', '1', '643', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('187', '1', '644', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('188', '1', '651', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('189', '1', '819', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('190', '1', '820', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('191', '1', '99', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('192', '1', '400', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('193', '1', '447', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('194', '1', '557', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('195', '1', '499', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('196', '1', '500', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('197', '1', '506', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('198', '1', '17', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('199', '1', '18', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('200', '1', '19', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('201', '1', '169', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('202', '1', '401', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('203', '1', '631', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('204', '1', '399', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('205', '1', '561', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('206', '1', '539', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('207', '1', '552', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('208', '1', '553', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('209', '1', '6', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('210', '1', '80', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('211', '1', '392', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('212', '1', '443', '0', '2017-02-28 06:39:37', '2017-02-28 06:39:37');
INSERT INTO `ce_role_user` VALUES ('213', '1', '555', '0', '2017-02-28 06:39:37', '2017-02-28 06:39:37');
INSERT INTO `ce_role_user` VALUES ('214', '1', '510', '0', '2017-02-28 06:39:37', '2017-02-28 06:39:37');
INSERT INTO `ce_role_user` VALUES ('215', '1', '604', '0', '2017-02-28 06:39:37', '2017-02-28 06:39:37');
INSERT INTO `ce_role_user` VALUES ('216', '1', '608', '0', '2017-02-28 06:39:37', '2017-02-28 06:39:37');
INSERT INTO `ce_role_user` VALUES ('217', '1', '762', '0', '2017-02-28 06:39:37', '2017-02-28 06:39:37');
INSERT INTO `ce_role_user` VALUES ('218', '1', '782', '0', '2017-02-28 06:39:37', '2017-02-28 06:39:37');
INSERT INTO `ce_role_user` VALUES ('219', '1', '790', '0', '2017-02-28 06:39:37', '2017-02-28 06:39:37');
INSERT INTO `ce_role_user` VALUES ('220', '1', '807', '0', '2017-02-28 06:39:37', '2017-02-28 06:39:37');
INSERT INTO `ce_role_user` VALUES ('221', '1', '810', '0', '2017-02-28 06:39:37', '2017-02-28 06:39:37');
INSERT INTO `ce_role_user` VALUES ('222', '1', '812', '0', '2017-02-28 06:39:37', '2017-02-28 06:39:37');
INSERT INTO `ce_role_user` VALUES ('223', '1', '813', '0', '2017-02-28 06:39:37', '2017-02-28 06:39:37');
INSERT INTO `ce_role_user` VALUES ('224', '1', '814', '0', '2017-02-28 06:39:37', '2017-02-28 06:39:37');
INSERT INTO `ce_role_user` VALUES ('225', '1', '816', '0', '2017-02-28 06:39:37', '2017-02-28 06:39:37');
INSERT INTO `ce_role_user` VALUES ('226', '1', '2', '0', '2017-02-28 06:39:37', '2017-02-28 06:39:37');
INSERT INTO `ce_role_user` VALUES ('227', '1', '82', '0', '2017-02-28 06:39:38', '2017-02-28 06:39:38');
INSERT INTO `ce_role_user` VALUES ('228', '1', '157', '0', '2017-02-28 06:39:38', '2017-02-28 06:39:38');
INSERT INTO `ce_role_user` VALUES ('229', '1', '158', '0', '2017-02-28 06:39:38', '2017-02-28 06:39:38');
INSERT INTO `ce_role_user` VALUES ('230', '1', '159', '0', '2017-02-28 06:39:38', '2017-02-28 06:39:38');
INSERT INTO `ce_role_user` VALUES ('231', '1', '394', '0', '2017-02-28 06:39:38', '2017-02-28 06:39:38');
INSERT INTO `ce_role_user` VALUES ('232', '1', '809', '0', '2017-02-28 06:39:38', '2017-02-28 06:39:38');
INSERT INTO `ce_role_user` VALUES ('233', '1', '407', '0', '2017-02-28 06:39:38', '2017-02-28 06:39:38');
INSERT INTO `ce_role_user` VALUES ('234', '1', '408', '0', '2017-02-28 06:39:38', '2017-02-28 06:39:38');
INSERT INTO `ce_role_user` VALUES ('235', '1', '409', '0', '2017-02-28 06:39:38', '2017-02-28 06:39:38');
INSERT INTO `ce_role_user` VALUES ('236', '1', '532', '0', '2017-02-28 06:39:38', '2017-02-28 06:39:38');
INSERT INTO `ce_role_user` VALUES ('237', '1', '107', '0', '2017-02-28 06:39:38', '2017-02-28 06:39:38');
INSERT INTO `ce_role_user` VALUES ('238', '1', '420', '0', '2017-02-28 06:39:38', '2017-02-28 06:39:38');
INSERT INTO `ce_role_user` VALUES ('239', '1', '607', '0', '2017-02-28 06:39:38', '2017-02-28 06:39:38');
INSERT INTO `ce_role_user` VALUES ('240', '1', '609', '0', '2017-02-28 06:39:39', '2017-02-28 06:39:39');
INSERT INTO `ce_role_user` VALUES ('241', '1', '610', '0', '2017-02-28 06:39:39', '2017-02-28 06:39:39');
INSERT INTO `ce_role_user` VALUES ('242', '1', '611', '0', '2017-02-28 06:39:39', '2017-02-28 06:39:39');
INSERT INTO `ce_role_user` VALUES ('243', '1', '615', '0', '2017-02-28 06:39:39', '2017-02-28 06:39:39');
INSERT INTO `ce_role_user` VALUES ('244', '1', '616', '0', '2017-02-28 06:39:39', '2017-02-28 06:39:39');
INSERT INTO `ce_role_user` VALUES ('245', '1', '620', '0', '2017-02-28 06:39:39', '2017-02-28 06:39:39');
INSERT INTO `ce_role_user` VALUES ('246', '1', '621', '0', '2017-02-28 06:39:39', '2017-02-28 06:39:39');
INSERT INTO `ce_role_user` VALUES ('247', '1', '626', '0', '2017-02-28 06:39:39', '2017-02-28 06:39:39');
INSERT INTO `ce_role_user` VALUES ('248', '1', '634', '0', '2017-02-28 06:39:39', '2017-02-28 06:39:39');
INSERT INTO `ce_role_user` VALUES ('249', '1', '636', '0', '2017-02-28 06:39:39', '2017-02-28 06:39:39');
INSERT INTO `ce_role_user` VALUES ('250', '1', '562', '0', '2017-02-28 06:39:39', '2017-02-28 06:39:39');
INSERT INTO `ce_role_user` VALUES ('251', '1', '645', '0', '2017-02-28 06:39:39', '2017-02-28 06:39:39');
INSERT INTO `ce_role_user` VALUES ('252', '1', '647', '0', '2017-02-28 06:39:40', '2017-02-28 06:39:40');
INSERT INTO `ce_role_user` VALUES ('253', '1', '648', '0', '2017-02-28 06:39:40', '2017-02-28 06:39:40');
INSERT INTO `ce_role_user` VALUES ('254', '1', '649', '0', '2017-02-28 06:39:40', '2017-02-28 06:39:40');
INSERT INTO `ce_role_user` VALUES ('255', '1', '652', '0', '2017-02-28 06:39:40', '2017-02-28 06:39:40');
INSERT INTO `ce_role_user` VALUES ('256', '1', '653', '0', '2017-02-28 06:39:40', '2017-02-28 06:39:40');
INSERT INTO `ce_role_user` VALUES ('257', '1', '654', '0', '2017-02-28 06:39:40', '2017-02-28 06:39:40');
INSERT INTO `ce_role_user` VALUES ('258', '1', '655', '0', '2017-02-28 06:39:40', '2017-02-28 06:39:40');
INSERT INTO `ce_role_user` VALUES ('259', '1', '656', '0', '2017-02-28 06:39:40', '2017-02-28 06:39:40');
INSERT INTO `ce_role_user` VALUES ('260', '1', '657', '0', '2017-02-28 06:39:40', '2017-02-28 06:39:40');
INSERT INTO `ce_role_user` VALUES ('261', '1', '658', '0', '2017-02-28 06:39:40', '2017-02-28 06:39:40');
INSERT INTO `ce_role_user` VALUES ('262', '1', '659', '0', '2017-02-28 06:39:40', '2017-02-28 06:39:40');
INSERT INTO `ce_role_user` VALUES ('263', '1', '660', '0', '2017-02-28 06:39:40', '2017-02-28 06:39:40');
INSERT INTO `ce_role_user` VALUES ('264', '1', '661', '0', '2017-02-28 06:39:40', '2017-02-28 06:39:40');
INSERT INTO `ce_role_user` VALUES ('265', '1', '662', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('266', '1', '663', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('267', '1', '665', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('268', '1', '666', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('269', '1', '667', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('270', '1', '668', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('271', '1', '669', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('272', '1', '670', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('273', '1', '671', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('274', '1', '672', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('275', '1', '673', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('276', '1', '674', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('277', '1', '675', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('278', '1', '678', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('279', '1', '679', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('280', '1', '681', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('281', '1', '682', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('282', '1', '683', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('283', '1', '685', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('284', '1', '687', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('285', '1', '688', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('286', '1', '689', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('287', '1', '690', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('288', '1', '691', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('289', '1', '692', '0', '2017-02-28 06:39:42', '2017-02-28 06:39:42');
INSERT INTO `ce_role_user` VALUES ('290', '1', '694', '0', '2017-02-28 06:39:42', '2017-02-28 06:39:42');
INSERT INTO `ce_role_user` VALUES ('291', '1', '695', '0', '2017-02-28 06:39:42', '2017-02-28 06:39:42');
INSERT INTO `ce_role_user` VALUES ('292', '1', '696', '0', '2017-02-28 06:39:42', '2017-02-28 06:39:42');
INSERT INTO `ce_role_user` VALUES ('293', '1', '697', '0', '2017-02-28 06:39:42', '2017-02-28 06:39:42');
INSERT INTO `ce_role_user` VALUES ('294', '1', '700', '0', '2017-02-28 06:39:42', '2017-02-28 06:39:42');
INSERT INTO `ce_role_user` VALUES ('295', '1', '701', '0', '2017-02-28 06:39:42', '2017-02-28 06:39:42');
INSERT INTO `ce_role_user` VALUES ('296', '1', '702', '0', '2017-02-28 06:39:42', '2017-02-28 06:39:42');
INSERT INTO `ce_role_user` VALUES ('297', '1', '703', '0', '2017-02-28 06:39:42', '2017-02-28 06:39:42');
INSERT INTO `ce_role_user` VALUES ('298', '1', '704', '0', '2017-02-28 06:39:42', '2017-02-28 06:39:42');
INSERT INTO `ce_role_user` VALUES ('299', '1', '706', '0', '2017-02-28 06:39:42', '2017-02-28 06:39:42');
INSERT INTO `ce_role_user` VALUES ('300', '1', '707', '0', '2017-02-28 06:39:42', '2017-02-28 06:39:42');
INSERT INTO `ce_role_user` VALUES ('301', '1', '708', '0', '2017-02-28 06:39:42', '2017-02-28 06:39:42');
INSERT INTO `ce_role_user` VALUES ('302', '1', '709', '0', '2017-02-28 06:39:43', '2017-02-28 06:39:43');
INSERT INTO `ce_role_user` VALUES ('303', '1', '710', '0', '2017-02-28 06:39:43', '2017-02-28 06:39:43');
INSERT INTO `ce_role_user` VALUES ('304', '1', '720', '0', '2017-02-28 06:39:43', '2017-02-28 06:39:43');
INSERT INTO `ce_role_user` VALUES ('305', '1', '721', '0', '2017-02-28 06:39:43', '2017-02-28 06:39:43');
INSERT INTO `ce_role_user` VALUES ('306', '1', '722', '0', '2017-02-28 06:39:43', '2017-02-28 06:39:43');
INSERT INTO `ce_role_user` VALUES ('307', '1', '723', '0', '2017-02-28 06:39:43', '2017-02-28 06:39:43');
INSERT INTO `ce_role_user` VALUES ('308', '1', '724', '0', '2017-02-28 06:39:43', '2017-02-28 06:39:43');
INSERT INTO `ce_role_user` VALUES ('309', '1', '725', '0', '2017-02-28 06:39:43', '2017-02-28 06:39:43');
INSERT INTO `ce_role_user` VALUES ('310', '1', '730', '0', '2017-02-28 06:39:43', '2017-02-28 06:39:43');
INSERT INTO `ce_role_user` VALUES ('311', '1', '732', '0', '2017-02-28 06:39:43', '2017-02-28 06:39:43');
INSERT INTO `ce_role_user` VALUES ('312', '1', '733', '0', '2017-02-28 06:39:44', '2017-02-28 06:39:44');
INSERT INTO `ce_role_user` VALUES ('313', '1', '735', '0', '2017-02-28 06:39:44', '2017-02-28 06:39:44');
INSERT INTO `ce_role_user` VALUES ('314', '1', '736', '0', '2017-02-28 06:39:44', '2017-02-28 06:39:44');
INSERT INTO `ce_role_user` VALUES ('315', '1', '737', '0', '2017-02-28 06:39:44', '2017-02-28 06:39:44');
INSERT INTO `ce_role_user` VALUES ('316', '1', '738', '0', '2017-02-28 06:39:44', '2017-02-28 06:39:44');
INSERT INTO `ce_role_user` VALUES ('317', '1', '740', '0', '2017-02-28 06:39:44', '2017-02-28 06:39:44');
INSERT INTO `ce_role_user` VALUES ('318', '1', '741', '0', '2017-02-28 06:39:44', '2017-02-28 06:39:44');
INSERT INTO `ce_role_user` VALUES ('319', '1', '742', '0', '2017-02-28 06:39:44', '2017-02-28 06:39:44');
INSERT INTO `ce_role_user` VALUES ('320', '1', '743', '0', '2017-02-28 06:39:44', '2017-02-28 06:39:44');
INSERT INTO `ce_role_user` VALUES ('321', '1', '744', '0', '2017-02-28 06:39:44', '2017-02-28 06:39:44');
INSERT INTO `ce_role_user` VALUES ('322', '1', '745', '0', '2017-02-28 06:39:44', '2017-02-28 06:39:44');
INSERT INTO `ce_role_user` VALUES ('323', '1', '746', '0', '2017-02-28 06:39:44', '2017-02-28 06:39:44');
INSERT INTO `ce_role_user` VALUES ('324', '1', '747', '0', '2017-02-28 06:39:45', '2017-02-28 06:39:45');
INSERT INTO `ce_role_user` VALUES ('325', '1', '750', '0', '2017-02-28 06:39:45', '2017-02-28 06:39:45');
INSERT INTO `ce_role_user` VALUES ('326', '1', '751', '0', '2017-02-28 06:39:45', '2017-02-28 06:39:45');
INSERT INTO `ce_role_user` VALUES ('327', '1', '754', '0', '2017-02-28 06:39:45', '2017-02-28 06:39:45');
INSERT INTO `ce_role_user` VALUES ('328', '1', '755', '0', '2017-02-28 06:39:45', '2017-02-28 06:39:45');
INSERT INTO `ce_role_user` VALUES ('329', '1', '756', '0', '2017-02-28 06:39:45', '2017-02-28 06:39:45');
INSERT INTO `ce_role_user` VALUES ('330', '1', '757', '0', '2017-02-28 06:39:45', '2017-02-28 06:39:45');
INSERT INTO `ce_role_user` VALUES ('331', '1', '758', '0', '2017-02-28 06:39:45', '2017-02-28 06:39:45');
INSERT INTO `ce_role_user` VALUES ('332', '1', '763', '0', '2017-02-28 06:39:45', '2017-02-28 06:39:45');
INSERT INTO `ce_role_user` VALUES ('333', '1', '764', '0', '2017-02-28 06:39:45', '2017-02-28 06:39:45');
INSERT INTO `ce_role_user` VALUES ('334', '1', '767', '0', '2017-02-28 06:39:45', '2017-02-28 06:39:45');
INSERT INTO `ce_role_user` VALUES ('335', '1', '768', '0', '2017-02-28 06:39:45', '2017-02-28 06:39:45');
INSERT INTO `ce_role_user` VALUES ('336', '1', '773', '0', '2017-02-28 06:39:45', '2017-02-28 06:39:45');
INSERT INTO `ce_role_user` VALUES ('337', '1', '774', '0', '2017-02-28 06:39:45', '2017-02-28 06:39:45');
INSERT INTO `ce_role_user` VALUES ('338', '1', '776', '0', '2017-02-28 06:39:46', '2017-02-28 06:39:46');
INSERT INTO `ce_role_user` VALUES ('339', '1', '778', '0', '2017-02-28 06:39:46', '2017-02-28 06:39:46');
INSERT INTO `ce_role_user` VALUES ('340', '1', '780', '0', '2017-02-28 06:39:46', '2017-02-28 06:39:46');
INSERT INTO `ce_role_user` VALUES ('341', '1', '784', '0', '2017-02-28 06:39:46', '2017-02-28 06:39:46');
INSERT INTO `ce_role_user` VALUES ('342', '1', '785', '0', '2017-02-28 06:39:46', '2017-02-28 06:39:46');
INSERT INTO `ce_role_user` VALUES ('343', '1', '786', '0', '2017-02-28 06:39:46', '2017-02-28 06:39:46');
INSERT INTO `ce_role_user` VALUES ('344', '1', '787', '0', '2017-02-28 06:39:46', '2017-02-28 06:39:46');
INSERT INTO `ce_role_user` VALUES ('345', '1', '788', '0', '2017-02-28 06:39:46', '2017-02-28 06:39:46');
INSERT INTO `ce_role_user` VALUES ('346', '1', '791', '0', '2017-02-28 06:39:46', '2017-02-28 06:39:46');
INSERT INTO `ce_role_user` VALUES ('347', '1', '792', '0', '2017-02-28 06:39:46', '2017-02-28 06:39:46');
INSERT INTO `ce_role_user` VALUES ('348', '1', '793', '0', '2017-02-28 06:39:46', '2017-02-28 06:39:46');
INSERT INTO `ce_role_user` VALUES ('349', '1', '794', '0', '2017-02-28 06:39:46', '2017-02-28 06:39:46');
INSERT INTO `ce_role_user` VALUES ('350', '1', '796', '0', '2017-02-28 06:39:46', '2017-02-28 06:39:46');
INSERT INTO `ce_role_user` VALUES ('351', '1', '797', '0', '2017-02-28 06:39:46', '2017-02-28 06:39:46');
INSERT INTO `ce_role_user` VALUES ('352', '1', '798', '0', '2017-02-28 06:39:47', '2017-02-28 06:39:47');
INSERT INTO `ce_role_user` VALUES ('353', '1', '799', '0', '2017-02-28 06:39:47', '2017-02-28 06:39:47');
INSERT INTO `ce_role_user` VALUES ('354', '1', '801', '0', '2017-02-28 06:39:47', '2017-02-28 06:39:47');
INSERT INTO `ce_role_user` VALUES ('355', '1', '802', '0', '2017-02-28 06:39:47', '2017-02-28 06:39:47');
INSERT INTO `ce_role_user` VALUES ('356', '1', '817', '0', '2017-02-28 06:39:47', '2017-02-28 06:39:47');
INSERT INTO `ce_role_user` VALUES ('357', '1', '818', '0', '2017-02-28 06:39:47', '2017-02-28 06:39:47');
INSERT INTO `ce_role_user` VALUES ('358', '1', '821', '0', '2017-02-28 06:39:47', '2017-02-28 06:39:47');
INSERT INTO `ce_role_user` VALUES ('359', '1', '822', '0', '2017-02-28 06:39:47', '2017-02-28 06:39:47');
INSERT INTO `ce_role_user` VALUES ('360', '1', '823', '0', '2017-02-28 06:39:47', '2017-02-28 06:39:47');
INSERT INTO `ce_role_user` VALUES ('361', '1', '75', '0', '2017-02-28 06:39:47', '2017-02-28 06:39:47');
INSERT INTO `ce_role_user` VALUES ('362', '1', '77', '0', '2017-02-28 06:39:47', '2017-02-28 06:39:47');
INSERT INTO `ce_role_user` VALUES ('363', '1', '558', '0', '2017-02-28 06:39:47', '2017-02-28 06:39:47');
INSERT INTO `ce_role_user` VALUES ('364', '1', '477', '0', '2017-02-28 06:39:47', '2017-02-28 06:39:47');
INSERT INTO `ce_role_user` VALUES ('365', '1', '490', '0', '2017-02-28 06:39:47', '2017-02-28 06:39:47');
INSERT INTO `ce_role_user` VALUES ('366', '1', '729', '0', '2017-02-28 06:39:48', '2017-02-28 06:39:48');
INSERT INTO `ce_role_user` VALUES ('367', '1', '1', '0', '2017-02-28 06:39:48', '2017-02-28 06:39:48');
INSERT INTO `ce_role_user` VALUES ('368', '1', '10', '0', '2017-02-28 06:39:48', '2017-02-28 06:39:48');
INSERT INTO `ce_role_user` VALUES ('369', '1', '62', '0', '2017-02-28 06:39:48', '2017-02-28 06:39:48');
INSERT INTO `ce_role_user` VALUES ('370', '1', '824', '0', '2017-02-28 06:39:48', '2017-02-28 06:39:48');
INSERT INTO `ce_role_user` VALUES ('371', '1', '4', '0', '2017-02-28 06:39:48', '2017-02-28 06:39:48');
INSERT INTO `ce_role_user` VALUES ('372', '1', '184', '0', '2017-02-28 06:39:48', '2017-02-28 06:39:48');
INSERT INTO `ce_role_user` VALUES ('373', '1', '538', '0', '2017-02-28 06:39:48', '2017-02-28 06:39:48');
INSERT INTO `ce_role_user` VALUES ('374', '1', '617', '0', '2017-02-28 06:39:48', '2017-02-28 06:39:48');
INSERT INTO `ce_role_user` VALUES ('375', '1', '57', '0', '2017-02-28 06:39:48', '2017-02-28 06:39:48');
INSERT INTO `ce_role_user` VALUES ('376', '1', '646', '0', '2017-02-28 06:39:48', '2017-02-28 06:39:48');
INSERT INTO `ce_role_user` VALUES ('377', '1', '781', '0', '2017-02-28 06:39:48', '2017-02-28 06:39:48');
INSERT INTO `ce_role_user` VALUES ('378', '1', '12', '0', '2017-02-28 06:39:48', '2017-02-28 06:39:48');
INSERT INTO `ce_role_user` VALUES ('379', '1', '90', '0', '2017-02-28 06:39:49', '2017-02-28 06:39:49');
INSERT INTO `ce_role_user` VALUES ('380', '1', '686', '0', '2017-02-28 06:39:49', '2017-02-28 06:39:49');
INSERT INTO `ce_role_user` VALUES ('381', '1', '435', '0', '2017-02-28 06:39:49', '2017-02-28 06:39:49');
INSERT INTO `ce_role_user` VALUES ('382', '1', '589', '0', '2017-02-28 06:39:49', '2017-02-28 06:39:49');
INSERT INTO `ce_role_user` VALUES ('383', '1', '26', '0', '2017-02-28 06:39:49', '2017-02-28 06:39:49');
INSERT INTO `ce_role_user` VALUES ('384', '1', '137', '0', '2017-02-28 06:39:49', '2017-02-28 06:39:49');
INSERT INTO `ce_role_user` VALUES ('385', '1', '138', '0', '2017-02-28 06:39:49', '2017-02-28 06:39:49');
INSERT INTO `ce_role_user` VALUES ('386', '1', '166', '0', '2017-02-28 06:39:49', '2017-02-28 06:39:49');
INSERT INTO `ce_role_user` VALUES ('387', '1', '188', '0', '2017-02-28 06:39:49', '2017-02-28 06:39:49');
INSERT INTO `ce_role_user` VALUES ('388', '1', '331', '0', '2017-02-28 06:39:49', '2017-02-28 06:39:49');
INSERT INTO `ce_role_user` VALUES ('389', '1', '333', '0', '2017-02-28 06:39:49', '2017-02-28 06:39:49');
INSERT INTO `ce_role_user` VALUES ('390', '1', '339', '0', '2017-02-28 06:39:49', '2017-02-28 06:39:49');
INSERT INTO `ce_role_user` VALUES ('391', '1', '341', '0', '2017-02-28 06:39:49', '2017-02-28 06:39:49');
INSERT INTO `ce_role_user` VALUES ('392', '1', '344', '0', '2017-02-28 06:39:49', '2017-02-28 06:39:49');
INSERT INTO `ce_role_user` VALUES ('393', '1', '346', '0', '2017-02-28 06:39:49', '2017-02-28 06:39:49');
INSERT INTO `ce_role_user` VALUES ('394', '1', '428', '0', '2017-02-28 06:39:49', '2017-02-28 06:39:49');
INSERT INTO `ce_role_user` VALUES ('395', '1', '574', '0', '2017-02-28 06:39:49', '2017-02-28 06:39:49');
INSERT INTO `ce_role_user` VALUES ('396', '1', '27', '0', '2017-02-28 06:39:50', '2017-02-28 06:39:50');
INSERT INTO `ce_role_user` VALUES ('397', '1', '192', '0', '2017-02-28 06:39:50', '2017-02-28 06:39:50');
INSERT INTO `ce_role_user` VALUES ('398', '1', '332', '0', '2017-02-28 06:39:50', '2017-02-28 06:39:50');
INSERT INTO `ce_role_user` VALUES ('399', '1', '386', '0', '2017-02-28 06:39:50', '2017-02-28 06:39:50');
INSERT INTO `ce_role_user` VALUES ('400', '1', '387', '0', '2017-02-28 06:39:50', '2017-02-28 06:39:50');
INSERT INTO `ce_role_user` VALUES ('401', '1', '388', '0', '2017-02-28 06:39:50', '2017-02-28 06:39:50');
INSERT INTO `ce_role_user` VALUES ('402', '1', '595', '0', '2017-02-28 06:39:51', '2017-02-28 06:39:51');
INSERT INTO `ce_role_user` VALUES ('403', '1', '627', '0', '2017-02-28 06:39:51', '2017-02-28 06:39:51');
INSERT INTO `ce_role_user` VALUES ('404', '1', '632', '0', '2017-02-28 06:39:51', '2017-02-28 06:39:51');
INSERT INTO `ce_role_user` VALUES ('405', '1', '38', '0', '2017-02-28 06:39:51', '2017-02-28 06:39:51');
INSERT INTO `ce_role_user` VALUES ('406', '1', '123', '0', '2017-02-28 06:39:51', '2017-02-28 06:39:51');
INSERT INTO `ce_role_user` VALUES ('407', '1', '152', '0', '2017-02-28 06:39:51', '2017-02-28 06:39:51');
INSERT INTO `ce_role_user` VALUES ('408', '1', '200', '0', '2017-02-28 06:39:51', '2017-02-28 06:39:51');
INSERT INTO `ce_role_user` VALUES ('409', '1', '287', '0', '2017-02-28 06:39:52', '2017-02-28 06:39:52');
INSERT INTO `ce_role_user` VALUES ('410', '1', '288', '0', '2017-02-28 06:39:52', '2017-02-28 06:39:52');
INSERT INTO `ce_role_user` VALUES ('411', '1', '292', '0', '2017-02-28 06:39:52', '2017-02-28 06:39:52');
INSERT INTO `ce_role_user` VALUES ('412', '1', '295', '0', '2017-02-28 06:39:52', '2017-02-28 06:39:52');
INSERT INTO `ce_role_user` VALUES ('413', '1', '311', '0', '2017-02-28 06:39:52', '2017-02-28 06:39:52');
INSERT INTO `ce_role_user` VALUES ('414', '1', '312', '0', '2017-02-28 06:39:52', '2017-02-28 06:39:52');
INSERT INTO `ce_role_user` VALUES ('415', '1', '363', '0', '2017-02-28 06:39:52', '2017-02-28 06:39:52');
INSERT INTO `ce_role_user` VALUES ('416', '1', '588', '0', '2017-02-28 06:39:52', '2017-02-28 06:39:52');
INSERT INTO `ce_role_user` VALUES ('417', '1', '39', '0', '2017-02-28 06:39:52', '2017-02-28 06:39:52');
INSERT INTO `ce_role_user` VALUES ('418', '1', '40', '0', '2017-02-28 06:39:53', '2017-02-28 06:39:53');
INSERT INTO `ce_role_user` VALUES ('419', '1', '41', '0', '2017-02-28 06:39:53', '2017-02-28 06:39:53');
INSERT INTO `ce_role_user` VALUES ('420', '1', '42', '0', '2017-02-28 06:39:53', '2017-02-28 06:39:53');
INSERT INTO `ce_role_user` VALUES ('421', '1', '43', '0', '2017-02-28 06:39:53', '2017-02-28 06:39:53');
INSERT INTO `ce_role_user` VALUES ('422', '1', '136', '0', '2017-02-28 06:39:53', '2017-02-28 06:39:53');
INSERT INTO `ce_role_user` VALUES ('423', '1', '199', '0', '2017-02-28 06:39:53', '2017-02-28 06:39:53');
INSERT INTO `ce_role_user` VALUES ('424', '1', '299', '0', '2017-02-28 06:39:53', '2017-02-28 06:39:53');
INSERT INTO `ce_role_user` VALUES ('425', '1', '300', '0', '2017-02-28 06:39:53', '2017-02-28 06:39:53');
INSERT INTO `ce_role_user` VALUES ('426', '1', '343', '0', '2017-02-28 06:39:53', '2017-02-28 06:39:53');
INSERT INTO `ce_role_user` VALUES ('427', '1', '440', '0', '2017-02-28 06:39:53', '2017-02-28 06:39:53');
INSERT INTO `ce_role_user` VALUES ('428', '1', '577', '0', '2017-02-28 06:39:53', '2017-02-28 06:39:53');
INSERT INTO `ce_role_user` VALUES ('429', '1', '698', '0', '2017-02-28 06:39:53', '2017-02-28 06:39:53');
INSERT INTO `ce_role_user` VALUES ('430', '1', '134', '0', '2017-02-28 06:39:53', '2017-02-28 06:39:53');
INSERT INTO `ce_role_user` VALUES ('431', '1', '23', '0', '2017-02-28 06:39:53', '2017-02-28 06:39:53');
INSERT INTO `ce_role_user` VALUES ('432', '1', '97', '0', '2017-02-28 06:39:53', '2017-02-28 06:39:53');
INSERT INTO `ce_role_user` VALUES ('433', '1', '143', '0', '2017-02-28 06:39:53', '2017-02-28 06:39:53');
INSERT INTO `ce_role_user` VALUES ('434', '1', '205', '0', '2017-02-28 06:39:54', '2017-02-28 06:39:54');
INSERT INTO `ce_role_user` VALUES ('435', '1', '233', '0', '2017-02-28 06:39:54', '2017-02-28 06:39:54');
INSERT INTO `ce_role_user` VALUES ('436', '1', '283', '0', '2017-02-28 06:39:54', '2017-02-28 06:39:54');
INSERT INTO `ce_role_user` VALUES ('437', '1', '284', '0', '2017-02-28 06:39:54', '2017-02-28 06:39:54');
INSERT INTO `ce_role_user` VALUES ('438', '1', '291', '0', '2017-02-28 06:39:54', '2017-02-28 06:39:54');
INSERT INTO `ce_role_user` VALUES ('439', '1', '434', '0', '2017-02-28 06:39:54', '2017-02-28 06:39:54');
INSERT INTO `ce_role_user` VALUES ('440', '1', '619', '0', '2017-02-28 06:39:54', '2017-02-28 06:39:54');
INSERT INTO `ce_role_user` VALUES ('441', '1', '35', '0', '2017-02-28 06:39:54', '2017-02-28 06:39:54');
INSERT INTO `ce_role_user` VALUES ('442', '1', '36', '0', '2017-02-28 06:39:54', '2017-02-28 06:39:54');
INSERT INTO `ce_role_user` VALUES ('443', '1', '96', '0', '2017-02-28 06:39:54', '2017-02-28 06:39:54');
INSERT INTO `ce_role_user` VALUES ('444', '1', '142', '0', '2017-02-28 06:39:55', '2017-02-28 06:39:55');
INSERT INTO `ce_role_user` VALUES ('445', '1', '151', '0', '2017-02-28 06:39:55', '2017-02-28 06:39:55');
INSERT INTO `ce_role_user` VALUES ('446', '1', '191', '0', '2017-02-28 06:39:55', '2017-02-28 06:39:55');
INSERT INTO `ce_role_user` VALUES ('447', '1', '223', '0', '2017-02-28 06:39:55', '2017-02-28 06:39:55');
INSERT INTO `ce_role_user` VALUES ('448', '1', '602', '0', '2017-02-28 06:39:55', '2017-02-28 06:39:55');
INSERT INTO `ce_role_user` VALUES ('449', '1', '734', '0', '2017-02-28 06:39:55', '2017-02-28 06:39:55');
INSERT INTO `ce_role_user` VALUES ('450', '1', '614', '0', '2017-02-28 06:39:55', '2017-02-28 06:39:55');
INSERT INTO `ce_role_user` VALUES ('451', '1', '21', '0', '2017-02-28 06:39:55', '2017-02-28 06:39:55');
INSERT INTO `ce_role_user` VALUES ('452', '1', '71', '0', '2017-02-28 06:39:55', '2017-02-28 06:39:55');

-- ----------------------------
-- Table structure for ce_select
-- ----------------------------
DROP TABLE IF EXISTS `ce_select`;
CREATE TABLE `ce_select` (
  `ID` int(11) NOT NULL,
  `Name` char(255) DEFAULT NULL,
  `Pid` int(11) DEFAULT NULL,
  `CompanyID` int(11) DEFAULT NULL,
  `code` char(5) DEFAULT NULL COMMENT '选择码',
  `CityID` int(11) DEFAULT NULL,
  `Createtime` datetime DEFAULT NULL,
  `Updatetime` datetime DEFAULT NULL,
  `IsDelete` int(5) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='字典表';

-- ----------------------------
-- Records of ce_select
-- ----------------------------

-- ----------------------------
-- Table structure for ce_task
-- ----------------------------
DROP TABLE IF EXISTS `ce_task`;
CREATE TABLE `ce_task` (
  `ID` int(11) NOT NULL,
  `Title` char(255) DEFAULT NULL,
  `Body` char(255) DEFAULT NULL,
  `Type` int(255) DEFAULT NULL,
  `UserID` bigint(20) NOT NULL,
  `Createtime` datetime DEFAULT NULL,
  `updatetime` datetime DEFAULT NULL,
  `IsDetele` int(5) DEFAULT NULL,
  `CityID` int(11) DEFAULT NULL,
  `CompanyID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='任务表';

-- ----------------------------
-- Records of ce_task
-- ----------------------------

-- ----------------------------
-- Table structure for ce_template
-- ----------------------------
DROP TABLE IF EXISTS `ce_template`;
CREATE TABLE `ce_template` (
  `ID` int(11) NOT NULL,
  `Name` char(80) DEFAULT NULL COMMENT '模版名称',
  `CompanyID` int(255) DEFAULT NULL,
  `CityID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT '0' COMMENT '用户id',
  `Type` int(11) DEFAULT NULL COMMENT '类型',
  `CreateTime` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='模板数据';

-- ----------------------------
-- Records of ce_template
-- ----------------------------

-- ----------------------------
-- Table structure for ce_user
-- ----------------------------
DROP TABLE IF EXISTS `ce_user`;
CREATE TABLE `ce_user` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `UserID` bigint(20) DEFAULT NULL,
  `UserName` char(30) NOT NULL COMMENT '用户名',
  `Names` char(20) DEFAULT NULL COMMENT '真实姓名',
  `PassWord` char(100) NOT NULL COMMENT '登录密码',
  `DepartmentID` int(5) DEFAULT '0',
  `CompanyID` int(5) DEFAULT NULL COMMENT '部门id',
  `IsDelete` int(1) DEFAULT '0' COMMENT '是否删除',
  `phone` char(12) DEFAULT NULL COMMENT '手机号',
  `moblie` char(12) DEFAULT NULL COMMENT '手机号',
  `DatetimeCreated` datetime DEFAULT NULL COMMENT '创建时间',
  `DatetimeUpdated` datetime DEFAULT NULL COMMENT '更新时间',
  `CityID` int(11) DEFAULT NULL,
  `Image` char(255) DEFAULT NULL COMMENT '头像',
  `loginFlag` int(5) DEFAULT '0' COMMENT '登录标志',
  `Nickname` varchar(50) DEFAULT NULL COMMENT '昵称',
  `Email` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `Agreement` int(5) DEFAULT NULL COMMENT '同意协议',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ce_user
-- ----------------------------
INSERT INTO `ce_user` VALUES ('1', '1', 'chen', '陈官勇', '202cb962ac59075b964b07152d234b70', '1', '1', '0', '15638202185', '6040992', '2017-03-02 15:08:15', '2017-03-02 15:08:20', '2', null, '0', 'CHEN', null, null);

-- ----------------------------
-- Table structure for ce_userinfo
-- ----------------------------
DROP TABLE IF EXISTS `ce_userinfo`;
CREATE TABLE `ce_userinfo` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `UserID` bigint(20) DEFAULT NULL,
  `bz` char(200) DEFAULT NULL COMMENT '备注',
  `email` char(50) DEFAULT NULL COMMENT '邮件',
  `Grade` int(255) DEFAULT '0' COMMENT '等级',
  `workID` bigint(20) DEFAULT NULL COMMENT '工号',
  `IsDelete` int(5) DEFAULT '0' COMMENT '是否删除',
  `Integral` int(11) DEFAULT '0' COMMENT '积分',
  `Role` varchar(50) DEFAULT NULL COMMENT '角色',
  `Department` varchar(50) DEFAULT NULL COMMENT '部门',
  `Company` varchar(50) DEFAULT NULL COMMENT '所在公司',
  `City` varchar(50) DEFAULT NULL COMMENT '所在城市',
  `Lasttime` datetime DEFAULT NULL COMMENT '最后登录时间',
  `IP` char(20) DEFAULT NULL COMMENT '登录ip',
  `Position` varchar(50) DEFAULT NULL COMMENT '职位',
  `InductionTime` datetime DEFAULT NULL COMMENT '入职时间',
  `state` int(5) DEFAULT '0' COMMENT '0:正常1:实习2:离职',
  `Adress` varchar(255) DEFAULT NULL COMMENT '地址',
  `Age` int(11) DEFAULT '0' COMMENT ' 年龄',
  `Personsigna` varchar(255) DEFAULT NULL COMMENT '个性签名',
  PRIMARY KEY (`ID`),
  KEY `userID` (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ce_userinfo
-- ----------------------------
INSERT INTO `ce_userinfo` VALUES ('1', '1', 'dfadsfadsf', '22rsd', '1', '1234', '0', '144', '管理员', '信息部', '林北软件集团', '林州', '2017-07-30 15:11:25', '192.168.0.1', 'CEO', '2017-07-30 15:11:43', '0', '中国河南林州', '20', '失败是成功之母');

-- ----------------------------
-- Table structure for ce_user_auth
-- ----------------------------
DROP TABLE IF EXISTS `ce_user_auth`;
CREATE TABLE `ce_user_auth` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `UserID` int(11) DEFAULT NULL,
  `CompanyAuth` tinytext,
  `CityAuth` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ce_user_auth
-- ----------------------------
INSERT INTO `ce_user_auth` VALUES ('1', '1', '2,3,4,5,6,7,8,9', '65,45,343,23,');

-- ----------------------------
-- Table structure for ce_widget
-- ----------------------------
DROP TABLE IF EXISTS `ce_widget`;
CREATE TABLE `ce_widget` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ParentID` int(11) DEFAULT NULL COMMENT '控件父id',
  `Name` char(50) DEFAULT NULL COMMENT '控件名称',
  `Namespace` char(60) DEFAULT NULL COMMENT '空间命名空间',
  `Class` char(60) DEFAULT NULL COMMENT '控件类名',
  `DatetimeCreated` datetime DEFAULT NULL,
  `DatetimeUpdated` datetime DEFAULT NULL,
  `IsDelete` int(5) DEFAULT '0',
  `Flag` int(5) unsigned DEFAULT '0' COMMENT '标示',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='控件类';

-- ----------------------------
-- Records of ce_widget
-- ----------------------------
INSERT INTO `ce_widget` VALUES ('1', '0', '按钮', '3', 'e', '2017-04-11 16:44:20', '2017-04-11 16:44:20', '0', '0');
INSERT INTO `ce_widget` VALUES ('2', '0', '模板', '4', '5', '2017-04-12 16:45:12', '2017-04-11 16:44:20', '0', '0');
INSERT INTO `ce_widget` VALUES ('3', '1', 'button', 'r', 'r', '2017-04-12 16:45:43', '2017-04-11 16:44:20', '0', '1');
INSERT INTO `ce_widget` VALUES ('4', '2', 'panl', 'r', 'r', '2017-04-12 16:46:07', '2017-04-11 16:44:20', '0', '1');

-- ----------------------------
-- Table structure for ce_widget_template
-- ----------------------------
DROP TABLE IF EXISTS `ce_widget_template`;
CREATE TABLE `ce_widget_template` (
  `ID` int(11) NOT NULL,
  `WidgetID` int(11) DEFAULT NULL,
  `TemplateID` int(11) DEFAULT NULL,
  `CreateTime` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='空间和模板关系表';

-- ----------------------------
-- Records of ce_widget_template
-- ----------------------------
