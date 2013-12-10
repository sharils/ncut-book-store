-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
--
-- �D��: localhost
-- �إߤ��: Aug 28, 2013, 02:18 PM
-- ���A������: 5.0.51
-- PHP ����: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- ��Ʈw: `test`
--

-- --------------------------------------------------------

--
-- ��ƪ�榡�G `admin`
--

CREATE TABLE `admin` (
  `user_id` char(10) collate utf8_unicode_ci NOT NULL,
  `sn` char(50) collate utf8_unicode_ci NOT NULL,
  `email` varchar(50) collate utf8_unicode_ci NOT NULL,
  `name` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `phone` char(10) collate utf8_unicode_ci NOT NULL,
  `phone_ext` char(5) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `sn` (`sn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- �C�X�H�U��Ʈw���ƾڡG `admin`
--

INSERT INTO `admin` VALUES (0x33323733383931333931, 0x61646d696e, 0x61646d696e407961686f6f2e636f6d2e747777, '', 0x30393131313233313131, 0x3132333431);

-- --------------------------------------------------------

--
-- ��ƪ�榡�G `announce`
--
CREATE TABLE `announce` (
  `id` char(10) collate utf8_unicode_ci NOT NULL,
  `user_id` char(10) collate utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `title` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `message` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- �C�X�H�U��Ʈw���ƾڡG `announce`
--


-- --------------------------------------------------------

--
-- ��ƪ�榡�G `blacklist`
--

CREATE TABLE `blacklist` (
  `user_id` char(10) collate utf8_unicode_ci NOT NULL,
  `black_user_id` char(10) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`user_id`,`black_user_id`),
  KEY `black_user_id` (`black_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- �C�X�H�U��Ʈw���ƾڡG `blacklist`
--


-- --------------------------------------------------------

--
-- ��ƪ�榡�G `book`
--

CREATE TABLE `book` (
  `id` char(10) collate utf8_unicode_ci NOT NULL,
  `publisher_id` char(10) collate utf8_unicode_ci NOT NULL,
  `author` varchar(50) collate utf8_unicode_ci NOT NULL,
  `isbn` char(30) collate utf8_unicode_ci NOT NULL,
  `market_price` int(4) NOT NULL,
  `name` varchar(100) character set utf8 collate utf8_unicode_ci NOT NULL,
  `price` int(4) NOT NULL,
  `remark` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `type` char(50) collate utf8_unicode_ci NOT NULL,
  `version` char(10) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `isbn` (`isbn`),
  KEY `publisher_id` (`publisher_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- �C�X�H�U��Ʈw���ƾڡG `book`
--


-- --------------------------------------------------------

--
-- ��ƪ�榡�G `clerk`
--

CREATE TABLE `clerk` (
  `user_id` char(10) collate utf8_unicode_ci NOT NULL,
  `sn` char(50) collate utf8_unicode_ci NOT NULL,
  `email` varchar(50) collate utf8_unicode_ci NOT NULL,
  `name` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `phone` char(10) collate utf8_unicode_ci NOT NULL,
  `phone_ext` char(5) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `sn` (`sn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

--
-- �C�X�H�U��Ʈw���ƾڡG `clerk`
--


-- --------------------------------------------------------

--
-- ��ƪ�榡�G `course`
--

CREATE TABLE `course` (
  `id` char(10) collate utf8_unicode_ci NOT NULL,
  `sn` char(10) collate utf8_unicode_ci NOT NULL,
  `teacher_user_id` char(10) collate utf8_unicode_ci NOT NULL,
  `type` enum('required','optional') collate utf8_unicode_ci NOT NULL,
  `department` enum('me', 'cme', 'rac', 'cc', 'ae', 'csie', 'ddm', 'la', 'ba', 'iem', 'im', 'dlim', 'ee', 'dee') collate utf8_unicode_ci NOT NULL,
  `grade` enum('1','2','3','4') collate utf8_unicode_ci NOT NULL,
  `group` enum('a', 'b', 'c','d','e') collate utf8_unicode_ci NOT NULL,
  `name` char(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `system` enum('1a', '1b', '1c', '1d', '2a', '2b', '2c', '3a', '3b') collate utf8_unicode_ci NOT NULL,
  `semester` enum('1','2') collate utf8_unicode_ci NOT NULL,
  `year` int(4) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `teacher_user_id` (`teacher_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- �C�X�H�U��Ʈw���ƾڡG `course`
--


-- --------------------------------------------------------

--
-- ��ƪ�榡�G `course_book`
--

CREATE TABLE `course_book` (
  `course_id` char(10) collate utf8_unicode_ci NOT NULL,
  `book_id` char(10) collate utf8_unicode_ci NOT NULL,
  `sample` enum('','1') collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`course_id`,`book_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- �C�X�H�U��Ʈw���ƾڡG `course_book`
--


-- --------------------------------------------------------

--
-- ��ƪ�榡�G `message`
--

CREATE TABLE `message` (
  `id` char(10) collate utf8_unicode_ci NOT NULL,
  `sender_user_id` char(10) collate utf8_unicode_ci NOT NULL,
  `receiver_user_id` char(10) collate utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `content` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `sender_user_id` (`sender_user_id`),
  KEY `receiver_user_id` (`receiver_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- �C�X�H�U��Ʈw���ƾڡG `message`
--


-- --------------------------------------------------------

--
-- ��ƪ�榡�G `publisher`
--

CREATE TABLE `publisher` (
  `id` char(10) collate utf8_unicode_ci NOT NULL default '0',
  `email` varchar(50) collate utf8_unicode_ci NOT NULL,
  `account` char(50) collate utf8_unicode_ci NOT NULL,
  `address` varchar(50) collate utf8_unicode_ci NOT NULL,
  `fax` char(10) collate utf8_unicode_ci NOT NULL,
  `name` char(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `person` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `phone` char(10) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- �C�X�H�U��Ʈw���ƾڡG `publisher`
--


-- --------------------------------------------------------

--
-- ��ƪ�榡�G `shop_book`
--

CREATE TABLE `shop_book` (
  `book_id` char(10) collate utf8_unicode_ci NOT NULL,
  `num` int(4) NOT NULL,
  `shelf` enum('','1') collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`book_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- �C�X�H�U��Ʈw���ƾڡG `shop_book`
--


-- --------------------------------------------------------

--
-- ��ƪ�榡�G `shop_order`
--

CREATE TABLE `shop_order` (
  `id` char(10) collate utf8_unicode_ci NOT NULL,
  `clerk_user_id` char(10) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`clerk_user_id`),
  KEY `clerk_user_id` (`clerk_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- �C�X�H�U��Ʈw���ƾڡG `shop_order`
--


-- --------------------------------------------------------

--
-- ��ƪ�榡�G `shop_order_detail`
--

CREATE TABLE `shop_order_detail` (
  `id` char(10) collate utf8_unicode_ci NOT NULL,
  `shop_order_id` char(10) collate utf8_unicode_ci NOT NULL,
  `book_id` char(10) collate utf8_unicode_ci NOT NULL,
  `num` int(4) NOT NULL,
  PRIMARY KEY  (`shop_order_id`),
  KEY `book_id` (`book_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

--
-- �C�X�H�U��Ʈw���ƾڡG `shop_order_detail`
--


-- --------------------------------------------------------

--
-- ��ƪ�榡�G `student`
--

CREATE TABLE `student` (
  `user_id` char(10) collate utf8_unicode_ci NOT NULL,
  `sn` char(8) collate utf8_unicode_ci NOT NULL,
  `email` varchar(50) collate utf8_unicode_ci NOT NULL,
  `department` enum('me', 'cme', 'rac', 'cc', 'ae', 'csie', 'ddm', 'la', 'ba', 'iem', 'im', 'dlim', 'ee', 'dee') collate utf8_unicode_ci NOT NULL,
  `group` enum('a', 'b', 'c','d') collate utf8_unicode_ci NOT NULL,
  `name` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `phone` char(10) collate utf8_unicode_ci NOT NULL,
  `system` enum('1a', '1b', '1c', '1d', '2a', '2b', '2c', '3a', '3b') collate utf8_unicode_ci NOT NULL,
  `year` int(4) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- �C�X�H�U��Ʈw���ƾڡG `student`
--
-- --------------------------------------------------------

--
-- ��ƪ�榡�G `student_order`
--

CREATE TABLE `student_order` (
  `id` char(10) collate utf8_unicode_ci NOT NULL,
  `student_user_id` char(10) collate utf8_unicode_ci NOT NULL,
  `clerk_user_id` char(10) collate utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `status` enum('shopping','submitted','processing','ordered','shipping','arrived','return','finished','cancel') collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `student_user_id` (`student_user_id`),
  KEY `clerk_user_id` (`clerk_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- �C�X�H�U��Ʈw���ƾڡG `student_order`
--


-- --------------------------------------------------------

--
-- ��ƪ�榡�G `student_order_detail`
--

CREATE TABLE `student_order_detail` (
  `id` char(10) collate utf8_unicode_ci NOT NULL,
  `student_order_id` char(10) collate utf8_unicode_ci NOT NULL,
  `book_id` char(10) collate utf8_unicode_ci NOT NULL,
  `num` int(4) NOT NULL,
  `remark` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`student_order_id`,`book_id`),
  KEY `book_id` (`book_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

--
-- �C�X�H�U��Ʈw���ƾڡG `student_order_detail`
--


-- --------------------------------------------------------

--
-- ��ƪ�榡�G `teacher`
--

CREATE TABLE `teacher` (
  `user_id` char(10) collate utf8_unicode_ci NOT NULL,
  `sn` varchar(50) collate utf8_unicode_ci NOT NULL,
  `email` varchar(50) collate utf8_unicode_ci NOT NULL,
  `name` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `phone` char(10) collate utf8_unicode_ci NOT NULL,
  `phone_ext` char(5) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `sn` (`sn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

--
-- �C�X�H�U��Ʈw���ƾڡG `teacher`
--


-- --------------------------------------------------------

--
-- ��ƪ�榡�G `user`
--

CREATE TABLE `user` (
  `id` char(10) collate utf8_unicode_ci NOT NULL,
  `pwd` varchar(50) collate utf8_unicode_ci NOT NULL,
  `salt` char(40) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `user_id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- �C�X�H�U��Ʈw���ƾڡG `user`
--

INSERT INTO `user` VALUES (0x33323733383931333931, 0x626448376d6e474a3373747151, 0x6264646464336431626136343130353964333637);
