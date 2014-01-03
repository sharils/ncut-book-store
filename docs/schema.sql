/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : ncut-book-store

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2014-01-03 20:36:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `user_id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `sn` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `phone_ext` char(5) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `sn` (`sn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('3273891391', 'admin', 'admin@yahoo.com.tww', '', '0911123111', '12341');

-- ----------------------------
-- Table structure for `announce`
-- ----------------------------
DROP TABLE IF EXISTS `announce`;
CREATE TABLE `announce` (
  `id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of announce
-- ----------------------------
INSERT INTO `announce` VALUES ('1', '3273891392', '2014-01-01 20:25:03', 'test', 'test');

-- ----------------------------
-- Table structure for `blacklist`
-- ----------------------------
DROP TABLE IF EXISTS `blacklist`;
CREATE TABLE `blacklist` (
  `user_id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `black_user_id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`black_user_id`),
  KEY `black_user_id` (`black_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of blacklist
-- ----------------------------

-- ----------------------------
-- Table structure for `book`
-- ----------------------------
DROP TABLE IF EXISTS `book`;
CREATE TABLE `book` (
  `id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `publisher_id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `isbn` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `market_price` int(4) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(4) NOT NULL,
  `remark` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `version` char(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `isbn` (`isbn`),
  KEY `publisher_id` (`publisher_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of book
-- ----------------------------

-- ----------------------------
-- Table structure for `clerk`
-- ----------------------------
DROP TABLE IF EXISTS `clerk`;
CREATE TABLE `clerk` (
  `user_id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `sn` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `phone_ext` char(5) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `sn` (`sn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of clerk
-- ----------------------------
INSERT INTO `clerk` VALUES ('3273891392', 'c', 'c', 'c', 'c', 'c');

-- ----------------------------
-- Table structure for `course`
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `sn` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `teacher_user_id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('required','optional') COLLATE utf8_unicode_ci NOT NULL,
  `department` enum('me','cme','rac','cc','ae','csie','ddm','la','ba','iem','im','dlim','ee','dee') COLLATE utf8_unicode_ci NOT NULL,
  `grade` enum('1','2','3','4') COLLATE utf8_unicode_ci NOT NULL,
  `group` enum('a','b','c','d','e') COLLATE utf8_unicode_ci NOT NULL,
  `name` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `system` enum('1a','1b','1c','1d','2a','2b','2c','3a','3b') COLLATE utf8_unicode_ci NOT NULL,
  `semester` enum('1','2') COLLATE utf8_unicode_ci NOT NULL,
  `year` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `teacher_user_id` (`teacher_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of course
-- ----------------------------

-- ----------------------------
-- Table structure for `course_book`
-- ----------------------------
DROP TABLE IF EXISTS `course_book`;
CREATE TABLE `course_book` (
  `course_id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `book_id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `sample` enum('','1') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`course_id`,`book_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of course_book
-- ----------------------------

-- ----------------------------
-- Table structure for `message`
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `sender_user_id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `receiver_user_id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sender_user_id` (`sender_user_id`),
  KEY `receiver_user_id` (`receiver_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of message
-- ----------------------------

-- ----------------------------
-- Table structure for `publisher`
-- ----------------------------
DROP TABLE IF EXISTS `publisher`;
CREATE TABLE `publisher` (
  `id` char(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `account` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fax` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `person` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` char(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of publisher
-- ----------------------------

-- ----------------------------
-- Table structure for `shop_book`
-- ----------------------------
DROP TABLE IF EXISTS `shop_book`;
CREATE TABLE `shop_book` (
  `book_id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `num` int(4) NOT NULL,
  `shelf` enum('','1') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of shop_book
-- ----------------------------

-- ----------------------------
-- Table structure for `shop_order`
-- ----------------------------
DROP TABLE IF EXISTS `shop_order`;
CREATE TABLE `shop_order` (
  `id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `clerk_user_id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`clerk_user_id`),
  KEY `clerk_user_id` (`clerk_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of shop_order
-- ----------------------------

-- ----------------------------
-- Table structure for `shop_order_detail`
-- ----------------------------
DROP TABLE IF EXISTS `shop_order_detail`;
CREATE TABLE `shop_order_detail` (
  `id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `shop_order_id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `book_id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `num` int(4) NOT NULL,
  PRIMARY KEY (`shop_order_id`),
  KEY `book_id` (`book_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of shop_order_detail
-- ----------------------------

-- ----------------------------
-- Table structure for `student`
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `user_id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `sn` char(8) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `department` enum('me','cme','rac','cc','ae','csie','ddm','la','ba','iem','im','dlim','ee','dee') COLLATE utf8_unicode_ci NOT NULL,
  `group` enum('a','b','c','d') COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `system` enum('1a','1b','1c','1d','2a','2b','2c','3a','3b') COLLATE utf8_unicode_ci NOT NULL,
  `year` int(4) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of student
-- ----------------------------
-- ----------------------------
-- Table structure for `student_order`
-- ----------------------------
DROP TABLE IF EXISTS `student_order`;
CREATE TABLE `student_order` (
  `id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `student_user_id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `clerk_user_id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `status` enum('shopping','submitted','processing','ordered','shipping','arrived','return','finished','cancel') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_user_id` (`student_user_id`),
  KEY `clerk_user_id` (`clerk_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of student_order
-- ----------------------------

-- ----------------------------
-- Table structure for `student_order_detail`
-- ----------------------------
DROP TABLE IF EXISTS `student_order_detail`;
CREATE TABLE `student_order_detail` (
  `id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `student_order_id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `book_id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `num` int(4) NOT NULL,
  `remark` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`student_order_id`,`book_id`),
  KEY `book_id` (`book_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of student_order_detail
-- ----------------------------

-- ----------------------------
-- Table structure for `teacher`
-- ----------------------------
DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `user_id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `sn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `phone_ext` char(5) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `sn` (`sn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of teacher
-- ----------------------------

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `pwd` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `salt` char(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('3273891391', 'bdH7mnGJ3stqQ', 'bdddd3d1ba641059d367');
INSERT INTO `user` VALUES ('3273891392', 'bdH7mnGJ3stqQ', 'bdddd3d1ba641059d367');
