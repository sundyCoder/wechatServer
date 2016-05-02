-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-04-22 04:22:22
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wechat`
--

-- --------------------------------------------------------

--
-- 表的结构 `groupinfo`
--

CREATE TABLE IF NOT EXISTS `groupinfo` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `group_id` varchar(20) DEFAULT '' COMMENT '群组ID',
  `group_name` varchar(50) DEFAULT '' COMMENT '群组名',
  `description` varchar(150) DEFAULT '' COMMENT '群组描述',
  `image_path` varchar(2) DEFAULT '' COMMENT '群组头像',
  `owner_id` varchar(2) DEFAULT '' COMMENT '群主',
  `members` varchar(30) DEFAULT '' COMMENT '成员',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='群组信息表' AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- 表的结构 `userinfo`
--

CREATE TABLE IF NOT EXISTS `userinfo` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(20) DEFAULT '' COMMENT '用户名',
  `singname` varchar(150) DEFAULT '' COMMENT '个性签名',
  `password` varchar(50) DEFAULT '' COMMENT '密码',
  `telephone` varchar(20) DEFAULT '' COMMENT '手机号',
  `img_avar` varchar(30) DEFAULT '' COMMENT '头像',
  `nick` varchar(30) DEFAULT '' COMMENT '昵称',
  `type` varchar(30) DEFAULT 'N',
  `sex` varchar(30) DEFAULT 'M' COMMENT '性别 M-女 N-男',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='用户信息表' AUTO_INCREMENT=14 ;

 

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
