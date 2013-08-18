-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主機: localhost
-- 建立日期: Aug 18, 2013, 06:49 AM
-- 伺服器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 資料庫: `test`
-- 

-- --------------------------------------------------------

-- 
-- 資料表格式： `admin`
-- 

CREATE TABLE `admin` (
  `user_id` char(10) collate utf8_bin NOT NULL,
  `sn` char(50) collate utf8_bin NOT NULL,
  `email` varchar(50) collate utf8_bin NOT NULL,
  `phone` char(10) collate utf8_bin NOT NULL,
  `phone_ext` char(5) collate utf8_bin NOT NULL,
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `sn` (`sn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- 
-- 列出以下資料庫的數據： `admin`
-- 

INSERT INTO `admin` VALUES (0x33323733383931333931, 0x61646d696e, 0x61646d696e407961686f6f2e636f6d2e747777, 0x30393131313233313131, 0x3132333431);

-- --------------------------------------------------------

-- 
-- 資料表格式： `blacklist`
-- 

CREATE TABLE `blacklist` (
  `user_id` char(10) collate utf8_bin NOT NULL,
  `black_user_id` char(10) collate utf8_bin NOT NULL,
  PRIMARY KEY  (`user_id`,`black_user_id`),
  KEY `black_user_id` (`black_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- 
-- 列出以下資料庫的數據： `blacklist`
-- 


-- --------------------------------------------------------

-- 
-- 資料表格式： `book`
-- 

CREATE TABLE `book` (
  `id` char(10) collate utf8_bin NOT NULL,
  `publisher_id` char(10) collate utf8_bin NOT NULL,
  `author` varchar(50) collate utf8_bin NOT NULL,
  `isbn` char(15) collate utf8_bin NOT NULL,
  `market_price` int(4) NOT NULL,
  `name` varchar(50) collate utf8_bin NOT NULL,
  `price` int(4) NOT NULL,
  `remark` varchar(50) collate utf8_bin NOT NULL,
  `type` char(50) collate utf8_bin NOT NULL,
  `version` char(10) collate utf8_bin NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `isbn` (`isbn`),
  KEY `publisher_id` (`publisher_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- 
-- 列出以下資料庫的數據： `book`
-- 


-- --------------------------------------------------------

-- 
-- 資料表格式： `clerk`
-- 

CREATE TABLE `clerk` (
  `user_id` char(10) collate utf8_bin NOT NULL,
  `sn` char(50) collate utf8_bin NOT NULL,
  `email` varchar(50) collate utf8_bin NOT NULL,
  `name` varchar(50) collate utf8_bin NOT NULL,
  `phone` char(10) collate utf8_bin NOT NULL,
  `phone_ext` char(5) collate utf8_bin NOT NULL,
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `sn` (`sn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=FIXED;

-- 
-- 列出以下資料庫的數據： `clerk`
-- 


-- --------------------------------------------------------

-- 
-- 資料表格式： `course`
-- 

CREATE TABLE `course` (
  `id` char(10) collate utf8_bin NOT NULL,
  `teacher_user_id` char(10) collate utf8_bin NOT NULL,
  `type` enum('') collate utf8_bin NOT NULL,
  `name` char(50) collate utf8_bin NOT NULL,
  `year` int(4) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `teacher_user_id` (`teacher_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- 
-- 列出以下資料庫的數據： `course`
-- 


-- --------------------------------------------------------

-- 
-- 資料表格式： `course_book`
-- 

CREATE TABLE `course_book` (
  `course_id` char(10) collate utf8_bin NOT NULL,
  `book_id` char(10) collate utf8_bin NOT NULL,
  `sample` enum('') collate utf8_bin NOT NULL,
  PRIMARY KEY  (`course_id`,`book_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- 
-- 列出以下資料庫的數據： `course_book`
-- 


-- --------------------------------------------------------

-- 
-- 資料表格式： `message`
-- 

CREATE TABLE `message` (
  `id` char(10) collate utf8_bin NOT NULL,
  `sender_user_id` char(10) collate utf8_bin NOT NULL,
  `receiver_user_id` char(10) collate utf8_bin NOT NULL,
  `content` text collate utf8_bin NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `sender_user_id` (`sender_user_id`),
  KEY `receiver_user_id` (`receiver_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- 
-- 列出以下資料庫的數據： `message`
-- 


-- --------------------------------------------------------

-- 
-- 資料表格式： `publisher`
-- 

CREATE TABLE `publisher` (
  `id` char(10) collate utf8_bin NOT NULL default '0',
  `email` varchar(50) collate utf8_bin NOT NULL,
  `account` char(50) collate utf8_bin NOT NULL,
  `address` varchar(50) collate utf8_bin NOT NULL,
  `name` char(50) collate utf8_bin NOT NULL,
  `person` varchar(50) collate utf8_bin NOT NULL,
  `phone` char(10) collate utf8_bin NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- 
-- 列出以下資料庫的數據： `publisher`
-- 


-- --------------------------------------------------------

-- 
-- 資料表格式： `shop_book`
-- 

CREATE TABLE `shop_book` (
  `book_id` char(10) collate utf8_bin NOT NULL,
  `num` int(4) NOT NULL,
  PRIMARY KEY  (`book_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- 
-- 列出以下資料庫的數據： `shop_book`
-- 


-- --------------------------------------------------------

-- 
-- 資料表格式： `shop_order`
-- 

CREATE TABLE `shop_order` (
  `id` char(10) collate utf8_bin NOT NULL,
  `clerk_user_id` char(10) collate utf8_bin NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `clerk_user_id` (`clerk_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- 
-- 列出以下資料庫的數據： `shop_order`
-- 


-- --------------------------------------------------------

-- 
-- 資料表格式： `shop_order_detail`
-- 

CREATE TABLE `shop_order_detail` (
  `shop_order_id` char(10) collate utf8_bin NOT NULL,
  `book_id` char(10) collate utf8_bin NOT NULL,
  `num` int(4) NOT NULL,
  PRIMARY KEY  (`shop_order_id`),
  KEY `book_id` (`book_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=FIXED;

-- 
-- 列出以下資料庫的數據： `shop_order_detail`
-- 


-- --------------------------------------------------------

-- 
-- 資料表格式： `student`
-- 

CREATE TABLE `student` (
  `user_id` char(10) collate utf8_bin NOT NULL,
  `sn` char(8) collate utf8_bin NOT NULL,
  `email` varchar(50) collate utf8_bin NOT NULL,
  `class` enum('') collate utf8_bin NOT NULL,
  `department` varchar(50) collate utf8_bin NOT NULL,
  `name` varchar(50) collate utf8_bin NOT NULL,
  `type` enum('') collate utf8_bin NOT NULL,
  `phone` char(10) collate utf8_bin NOT NULL,
  `year` int(4) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- 
-- 列出以下資料庫的數據： `student`
-- 


-- --------------------------------------------------------

-- 
-- 資料表格式： `student_course`
-- 

CREATE TABLE `student_course` (
  `student_user_id` char(10) collate utf8_bin NOT NULL,
  `course_id` char(10) collate utf8_bin NOT NULL,
  PRIMARY KEY  (`student_user_id`),
  KEY `course_id` (`course_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=FIXED;

-- 
-- 列出以下資料庫的數據： `student_course`
-- 


-- --------------------------------------------------------

-- 
-- 資料表格式： `student_order`
-- 

CREATE TABLE `student_order` (
  `id` char(10) collate utf8_bin NOT NULL,
  `student_user_id` char(10) collate utf8_bin NOT NULL,
  `clerk_user_id` char(10) collate utf8_bin NOT NULL,
  `date` int(10) NOT NULL,
  `outdate` int(10) NOT NULL,
  `status` enum('') collate utf8_bin NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `student_user_id` (`student_user_id`),
  KEY `clerk_user_id` (`clerk_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- 
-- 列出以下資料庫的數據： `student_order`
-- 


-- --------------------------------------------------------

-- 
-- 資料表格式： `student_order_detail`
-- 

CREATE TABLE `student_order_detail` (
  `student_order_id` char(10) collate utf8_bin NOT NULL,
  `book_id` char(10) collate utf8_bin NOT NULL,
  `num` int(4) NOT NULL,
  PRIMARY KEY  (`student_order_id`),
  KEY `book_id` (`book_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=FIXED;

-- 
-- 列出以下資料庫的數據： `student_order_detail`
-- 


-- --------------------------------------------------------

-- 
-- 資料表格式： `teacher`
-- 

CREATE TABLE `teacher` (
  `user_id` char(10) collate utf8_bin NOT NULL,
  `sn` varchar(50) collate utf8_bin NOT NULL,
  `email` varchar(50) collate utf8_bin NOT NULL,
  `name` varchar(50) collate utf8_bin NOT NULL,
  `phone` char(10) collate utf8_bin NOT NULL,
  `phone_ext` char(5) collate utf8_bin NOT NULL,
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `sn` (`sn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=FIXED;

-- 
-- 列出以下資料庫的數據： `teacher`
-- 


-- --------------------------------------------------------

-- 
-- 資料表格式： `user`
-- 

CREATE TABLE `user` (
  `id` char(10) collate utf8_bin NOT NULL,
  `pwd` varchar(50) collate utf8_bin NOT NULL,
  `salt` char(40) collate utf8_bin NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `user_id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- 
-- 列出以下資料庫的數據： `user`
-- 

INSERT INTO `user` VALUES (0x33323733383931333931, 0x626448376d6e474a3373747151, 0x6264646464336431626136343130353964333637);
