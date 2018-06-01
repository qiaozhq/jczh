-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-05-08 13:12:09
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jczh`
--

-- --------------------------------------------------------

--
-- 表的结构 `jczh_admin`
--

CREATE TABLE `jczh_admin` (
  `admin_id` mediumint(6) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `lastloginip` varchar(15) DEFAULT '0',
  `lastlogintime` int(10) UNSIGNED DEFAULT '0',
  `email` varchar(40) DEFAULT '',
  `realname` varchar(50) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `jczh_admin`
--

INSERT INTO `jczh_admin` (`admin_id`, `username`, `password`, `lastloginip`, `lastlogintime`, `email`, `realname`, `status`) VALUES
(15, 'jczh                ', '9922aa0092bc93ef9096f52b91640e63', '0', 1525726194, 'dfdfd22', 'aa11', 1);

-- --------------------------------------------------------

--
-- 表的结构 `jczh_job`
--

CREATE TABLE `jczh_job` (
  `job_id` mediumint(8) UNSIGNED NOT NULL,
  `title` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  `education` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `workyears` varchar(20) NOT NULL,
  `number` varchar(20) NOT NULL,
  `worktype` varchar(10) NOT NULL,
  `workinfo` varchar(300) NOT NULL,
  `publishtime` varchar(10) NOT NULL,
  `workrequire` varchar(300) NOT NULL,
  `listorder` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `jczh_job`
--

INSERT INTO `jczh_job` (`job_id`, `title`, `type`, `education`, `address`, `workyears`, `number`, `worktype`, `workinfo`, `publishtime`, `workrequire`, `listorder`, `status`) VALUES
(7, '资深搜索算法工程师', '技术>技术综合', '研究生', '大连市', '3-5年', '2人', '全职', '1.参与考拉搜索，关系搜索，推荐系统等相关领域的算法研发工作\r\n2.可以深入研究不同的技术领域：海量数据分析，搜索相关性算法，用户行为理解与挖掘，个性化搜索，知识图谱，数据挖掘，推荐，自然语言处理，Query理解等。', '2018-04-28', '1.硕士学历两年以上相关工作经验，计算机或数学相关专业；\r\n2.精通Linux平台下的Java语言开发，熟练使用gcc、gdb、Makefile等开发工具, 有分布式数据处理平台开发经验的更佳；\r\n3.具备机器学习/自然语言处理/数据挖掘/Query分析等其中至少一种的研究背景或项目经历；\r\n4.有较强的分析和解决问题能力，有持续自我学习的能力和意愿,善于沟通和逻辑表达；', 1, 1),
(11, 'java高级工程师1', 'java高级工程师2', '22java高级工程师3', '33java高级工程师4', '44java高级工程师5', '55java高级工程师6', '66java高级7', '1java高级工程师1\r\n2java高级工程师2\r\n3java高级工程师3', '2018/04/02', '1java高级工程师1\r\n2java高级工程师2\r\n3java高级工程师3\r\n4java高级工程师4\r\n5java高级工程师5', 2, -1),
(10, '11', '22', '33', '44', '55', '66', '77', '', '', '', 3, -1),
(14, '11', '22', '33', '44', '55', '66', '77', '2\r\n2\r\n3', '111', '1\r\n2\r\n3\r\n4', 22, -1),
(12, '职位名称11111111111111111111111111', '职位名称1111111111111111', '职位名称1111111111111111', '职位名称11111111111111111111111111', '职位名称1111111111111111', '职位名称1111111111111111', '职位名称111111', '职位名称11111111111111111111111111职位名称11111111111111111111111111职位名称11111111111111111111111111职位名称11111111111111111111111111职位名称11111111111111111111111111职位名称11111111111111111111111111职位名称11111111111111111111111111职位名称11111111111111111111111111职位名称11111111111111111111111111职位名称11111111111111111111111111', '职位名称111111', '职位名称11111111111111111111111111职位名称11111111111111111111111111职位名称11111111111111111111111111职位名称11111111111111111111111111职位名称11111111111111111111111111职位名称11111111111111111111111111职位名称11111111111111111111111111职位名称11111111111111111111111111职位名称11111111111111111111111111职位名称11111111111111111111111111', 0, 1),
(13, '11', '22', '33', '44', '55', '', '', '', '', '', 0, -1),
(15, '33333', '22', '33', '44', '55', '66', '77', '1', '1', '2', 0, -1);

-- --------------------------------------------------------

--
-- 表的结构 `jczh_product`
--

CREATE TABLE `jczh_product` (
  `product_id` mediumint(8) UNSIGNED NOT NULL,
  `title` varchar(80) NOT NULL DEFAULT '',
  `thumb` varchar(100) NOT NULL DEFAULT '',
  `description` mediumtext NOT NULL,
  `content` mediumtext NOT NULL,
  `listorder` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `jczh_product`
--

INSERT INTO `jczh_product` (`product_id`, `title`, `thumb`, `description`, `content`, `listorder`, `status`) VALUES
(5, '2222', '/upload/2018/05/01/5ae82292d01b4.jpg', '12121', '', 0, -1),
(6, '3333', '/upload/2018/05/01/5ae837e003a82.jpg', '1212121', '', 0, -1),
(7, '微信小程序研发', '/upload/2018/05/04/5aeb426790869.png', '<p>\r\n	<span style="color:#666666;font-family:lucida, helvetica, " font-size:15px;background-color:#e5f8ff;"="">成功案例：</span><br />\r\n<span style="color:#666666;font-family:lucida, helvetica, " font-size:15px;background-color:#e5f8ff;"="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;问答红包、发令包、人人赞洗衣等</span><br />\r\n<span style="color:#666666;font-family:lucida, helvetica, " font-size:15px;background-color:#e5f8ff;"="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;久诚卓慧在小程序上线第一天就发布了自己产品人人赞小程序，之后研发多个新颖的玩法小程序，包括发令包和问答红包等，也为多个企业定制了小程序模板。</span>\r\n</p>', '<img src="/upload/2018/05/03/5aeb2e0cf3fc1.jpg" alt="" />', 2, 1),
(8, '电商平台整体解决方案', '/upload/2018/05/04/5aeb42a2005e8.jpg', '<p style="color:#666666;font-size:15px;font-family:lucida, helvetica, &quot;background-color:#FFFFFF;">\r\n	1、F2B2C平台<br />\r\n2、B2B2C平台&nbsp;<br />\r\n3、B2C平台&nbsp;<br />\r\n4、分销平台&nbsp;\r\n</p>\r\n<p style="color:#666666;font-size:15px;font-family:lucida, helvetica, &quot;background-color:#FFFFFF;">\r\n	成功案例：大连奥林匹克电子城－中电汇平台(F2B2C平台)<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;大连奥林匹克电子城是大连最大的电子卖场，旗下的中电汇平台致力于整合全国卖场并打通产品渠道，同时为F和B做金融服务，已经成功获得投资，通过该平台的成功研发和奥电的认可，久诚卓慧和奥电达成了深度合作，双方互持股份，品诚将持续为奥电提供整体的电商解决方案服务。\r\n</p>', '<img src="/upload/2018/05/04/5aeb42f4db0e1.jpg" alt="" />', 22, 1),
(10, '1211111111111111', '/upload/2018/05/06/5aef181a06745.jpg', '<p>\r\n	12111111111\r\n</p>\r\n<p>\r\n	<span style="color:#006600;">221111111</span>\r\n</p>\r\n<p>\r\n	<span style="background-color:#E53333;">33111111111</span>\r\n</p>\r\n<p>\r\n	4411111111111\r\n</p>', '<p>\r\n	1111111111111111111111\r\n</p>\r\n<p>\r\n	222222222222222222222\r\n</p>\r\n<p>\r\n	333333333333333333333333\r\n</p>', 0, -1),
(9, '111', '/upload/2018/05/04/5aeb4919ebdfd.jpg', '333', '', 0, -1),
(11, '1122', '/upload/2018/05/07/5aef3bd463d7a.jpg', '222222', '33333333333333333', 0, -1);

-- --------------------------------------------------------

--
-- 表的结构 `jczh_user`
--

CREATE TABLE `jczh_user` (
  `user_id` int(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `job` varchar(100) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `listorder` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `jczh_user`
--

INSERT INTO `jczh_user` (`user_id`, `name`, `job`, `thumb`, `listorder`, `status`) VALUES
(1, '李某某', 'iOS大牛', '/upload/2018/05/04/5aeb40c1220ec.jpg', 0, 1),
(2, 'weixin2', '222', '/upload/2018/05/01/5ae8104b0a852.png', 0, -1),
(3, '李某某', 'iOS大牛', '/upload/2018/05/04/5aeb3f60768ec.jpg', 0, 1),
(4, '赵某某', 'UI大牛', '/upload/2018/05/04/5aeb40e40a904.jpg', 0, 1),
(5, '郭某某', 'web前端大牛', '/upload/2018/05/04/5aeb41152cc87.jpg', 2, 1),
(6, '55', '112', '/upload/2018/05/04/5aeb4169315cf.jpg', 0, 1),
(7, 'weixin', '121', '/upload/2018/05/04/5aeb41db1649b.jpg', 0, -1),
(8, '33', '33', '', 0, -1),
(9, '44', '44', '', 0, -1),
(10, '666', '55', '', 0, -1),
(11, 'weixin', '11', '', 0, -1),
(12, '1', '', '', 0, -1),
(13, '11', '', '', 0, -1),
(14, '22', '', '', 0, -1),
(15, '1111', '222', '/upload/2018/05/04/5aeb48f02a6b7.jpg', 0, -1),
(16, 'weixin', '111', '/upload/2018/05/06/5aee89299c86b.jpg', 121, -1),
(17, '111', '222', '/upload/2018/05/06/5aef159bb76bb.jpg', 11, -1),
(18, '1113', '222', '/upload/2018/05/06/5aef15ae31723.png', 22, -1),
(19, '11', '11', '/upload/2018/05/07/5aef3baab62eb.jpg', 33, -1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jczh_admin`
--
ALTER TABLE `jczh_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `jczh_job`
--
ALTER TABLE `jczh_job`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `status` (`status`,`listorder`,`job_id`),
  ADD KEY `listorder` (`status`,`listorder`,`job_id`),
  ADD KEY `catid` (`status`,`job_id`);

--
-- Indexes for table `jczh_product`
--
ALTER TABLE `jczh_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `status` (`status`,`listorder`,`product_id`),
  ADD KEY `listorder` (`status`,`listorder`,`product_id`),
  ADD KEY `catid` (`status`,`product_id`);

--
-- Indexes for table `jczh_user`
--
ALTER TABLE `jczh_user`
  ADD PRIMARY KEY (`user_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `jczh_admin`
--
ALTER TABLE `jczh_admin`
  MODIFY `admin_id` mediumint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- 使用表AUTO_INCREMENT `jczh_job`
--
ALTER TABLE `jczh_job`
  MODIFY `job_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- 使用表AUTO_INCREMENT `jczh_product`
--
ALTER TABLE `jczh_product`
  MODIFY `product_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- 使用表AUTO_INCREMENT `jczh_user`
--
ALTER TABLE `jczh_user`
  MODIFY `user_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
