-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2019-04-21 22:41:49
-- 服务器版本： 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii2`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `auth` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `auth`) VALUES
(1, 'admin', '96e79218965eb72c92a549dd5a330112', 'xxxx'),
(2, 'test', '96e79218965eb72c92a549dd5a330112', 'mmmmm');

-- --------------------------------------------------------

--
-- 表的结构 `bind_account`
--

CREATE TABLE `bind_account` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL COMMENT '单位标示',
  `user_id` varchar(50) DEFAULT NULL COMMENT '用户标示'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bind_account`
--

INSERT INTO `bind_account` (`id`, `company_id`, `user_id`) VALUES
(7, 2, 'oCbNK5HvXHAlhMqPiDupn6y4BRCY');

-- --------------------------------------------------------

--
-- 表的结构 `company`
--

CREATE TABLE `company` (
  `name` varchar(50) DEFAULT NULL COMMENT '公司名称',
  `address` varchar(200) DEFAULT NULL COMMENT '公司地址',
  `phone_call` varchar(20) DEFAULT NULL COMMENT '公司电话',
  `user_id` varchar(50) DEFAULT NULL COMMENT '用户标示',
  `remarks` text COMMENT '描述',
  `street_id` int(11) DEFAULT NULL COMMENT '所属街道',
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `company`
--

INSERT INTO `company` (`name`, `address`, `phone_call`, `user_id`, `remarks`, `street_id`, `id`) VALUES
('上海立泉环境科技有限公司', NULL, NULL, NULL, '上海立泉环境科技有限公司专注提供水、气、泥、节能减排等领域的一体化解决方案。\r\n\r\n立泉总部位于上海市闵行区科技创新基地，创始人和核心团队成员拥有在海内外市场研习多年的国际化背景以及在国内环保产业界历练多年的本土化实践经验。立泉联合国内多家知名环保工程公司，并携手国外数家科技咨询和先进制造企业，以全球领先的专业设计和工程经验，为客户定制专业的一体化解决方案。配合先进可靠的设备以及快速响应的服务，立泉的定制化方案突破了传统设施的种种壁垒，为客户创造了显著的经济效益、环境效益和社会效益。\r\n\r\n针对生产型企业日益迫切的污泥减量需求，立泉结合瑞士先进制造和自身在国内的运营服务优势，突破了一系列技术难题，精心打造出诺亚方舟®工业污泥深度干化减量创新方案，效果突出，设备安全稳定。立泉与瑞士合作建立的泉瑞德中国工厂（连云港）极大地缩短了产品配送和技术服务响应的时间，得到了客户的高度认可。立泉合作方瑞士Watropur自1992年即专注热泵式除湿干化设备制造，是全球该领域最早起步的厂家，累计有近三千个案例，很多设备已经安全稳定运行十年以上。\r\n\r\n立泉不仅致力于解决当下的污染问题，更以积极创新的方式推动工业企业的清洁生产，与客户一起引领循环经济的发展。', 1, 1),
('西觅亚科教集团', NULL, NULL, NULL, '公司成立于 2000 年，自成立至今，西觅亚始终致力于引进全球的优秀\r\nSTEM 教育产品，如：SVR、SCRATCH、MATRIX、LEGO Education 等，从小培养孩子们的学习思维能力和创新能力。所采用的教育方案已经在多个世界性教育奖项中荣获殊誉。\r\n\r\n十余年来，西觅亚从教育产品、竞赛活动的引入，到经验性课程的研发与教学，再到整体教育解决方案的提供，以及国际教育交流的开展，从无到有，也像种子一样经历了孕育、发芽、破土、成长的过程，现在已成为了一个部门齐全、业务完备，集生产、研发、推广于一体的集团化现代企业，旗下北京西觅亚科技有限公司、引领未来教育科技（北京）有限公司、上海西觅亚科技有限公司北京昌平区回龙观分公司、上海西觅亚科技有限公司、上海引领未来教育科技有限公司、西觅亚科技开发（深圳）有限公司、上海西觅亚科技有限公司深圳景田北分公司、上海西觅亚科技有限公司深圳科兴分公司等子公司，在全国各地创新人才的培养夯实基础。\r\n\r\n西觅亚多年来坚持创新能力培养教育的推动，并结合中国教育需求形成创新人才教育培养体系及系列课程。目前，在中国已经覆盖 2000 多所幼儿园，6000 多所中小学，70 多所大学，600 多个校外活动场所， 积极服务于中国基础教育新课改的进程，为中国的基础教育提供先进的产品、技术、经验以及良好的服务。西觅亚创新能力培养课程及启蒙创新教师培养计划为培养 21 世纪创新型人才提供有力支撑，为中国的创新教育做出自己的贡献。\r\n\r\n西觅亚公司的英文名字“Semia”源自西班牙语“Semilla”，是“种子”的意思，如今这颗传播世界最好教育的种子已经长成了参天大树，西觅亚公司在北京、上海、香港、深圳设立公司，在山东、南京、广州、武汉建有办事处，西觅亚公司将一如既往地支持中外科技、文化交流，支持中国教育的发展，为中国的教育事业发展做出自己的贡献。\r\n', 2, 2),
('上海复为品牌策划有限公司', NULL, NULL, NULL, '   上海复大品牌研究所——上海复为品牌策划有限公司，专业从事企业品牌、形象、营销、文化的策划设计。\r\n\r\n    复大复为是中国CIS定义起草单位，行业标准起草单位，CIS策划教程编写单位。我们的团队自1993年以来，先后荣获“中国策划业十大杰出团队”、“全国经典策划案例奖”等众多荣誉，并通过SB/T10411-2007认证和ISO9001：2000认证。\r\n\r\n    我们曾为国家司法鉴定中心、国家传感信息中心、长沙国土资源局、杭州湾跨海大桥、建设银行、中国烟草、西气东输、宝钢冶金、济川药业、双钱轮胎、灵山大佛、报喜鸟服饰、相宜本草、CITIBANK（中国）、RICKMERS(中国)等行业龙头单位提供策划、设计、咨询服务。\r\n\r\n    我们作为中国品牌策划行业的开拓者和领导者，肩负时代赋予的责任和使命，深知只有专业，才是策划设计的立命之本，所以我们追求专业而不是规模，以专业赢得客户的信任与尊重，以专业彰显员工的能力与尊严。\r\n\r\n    我们只做精品，在成就客户成功的同时，历练自己。我们让每一位员工都有机会参与国内外一流项目的策划设计。希望我们员工即使退休后也能骄傲地对子孙后代说：虽然我们的名字未能写进历史，但我们的工作、我们的能力已经书写了历史。\r\n', 1, 3),
('上海砂轩文化发展有限公司', NULL, NULL, NULL, '砂轩紫砂壶商城是一支年轻、时尚、头脑敏锐、朝气蓬勃的团队。是一家采用互联网O2O模式从事茶道文化传播及器具收藏的专业电商平台。铁壶CHINA以经营传统、高端的日本铁壶银壶艺术藏品为主，秉承“艺术藏品不单是种种美好，更是思想文化的传承和记载”的经营理念，以高雅、品质、独特为服务宗旨，更注重于艺术收藏品的历史价值和生活意义。', 3, 4);

-- --------------------------------------------------------

--
-- 表的结构 `company_fuli`
--

CREATE TABLE `company_fuli` (
  `company_id` int(11) NOT NULL,
  `fuli_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `company_fuli`
--

INSERT INTO `company_fuli` (`company_id`, `fuli_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 3),
(34, 0),
(2, 5),
(36, 0);

-- --------------------------------------------------------

--
-- 表的结构 `delivery_info`
--

CREATE TABLE `delivery_info` (
  `id` int(11) NOT NULL COMMENT '唯一标示',
  `resume_id` int(11) DEFAULT NULL COMMENT '简历id',
  `recruit_id` int(11) DEFAULT NULL COMMENT '简历id',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `status` int(11) DEFAULT NULL COMMENT '状态，1:带查看，2:拒绝，3:约面试，4:入职通知，5:禁止投递',
  `user_id` int(11) DEFAULT NULL COMMENT '用户id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `delivery_info`
--

INSERT INTO `delivery_info` (`id`, `resume_id`, `recruit_id`, `create_time`, `status`, `user_id`) VALUES
(1, 1, 8, '2019-04-01 00:00:00', 1, 1),
(2, 1, 9, '2019-04-09 00:00:00', 3, 2),
(3, 1, 10, '2019-03-20 00:00:00', 1, 3),
(4, 1, 8, '2019-03-20 00:00:00', 2, 4),
(5, 1, 9, '2019-03-20 00:00:00', 4, 5);

-- --------------------------------------------------------

--
-- 表的结构 `demo`
--

CREATE TABLE `demo` (
  `id` int(11) NOT NULL,
  `keya` varchar(11) NOT NULL,
  `keyb` varchar(11) NOT NULL,
  `keyc` varchar(11) NOT NULL,
  `keyd` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `demo`
--

INSERT INTO `demo` (`id`, `keya`, `keyb`, `keyc`, `keyd`) VALUES
(1, '77887', 'bbb', 'ccc', 'ddd'),
(2, 'aaa', 'bbb', 'ccc', 'ddd');

-- --------------------------------------------------------

--
-- 表的结构 `fuli`
--

CREATE TABLE `fuli` (
  `id` int(11) NOT NULL,
  `fuli` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `fuli`
--

INSERT INTO `fuli` (`id`, `fuli`) VALUES
(1, '做五休二'),
(2, '五险一金'),
(3, '员工宿舍'),
(4, '出国机会'),
(5, '绩效奖金'),
(6, '节日福利'),
(7, '定期体检'),
(8, '餐饮补贴'),
(9, '出国旅游'),
(10, '专业培训');

-- --------------------------------------------------------

--
-- 表的结构 `jobInfo`
--

CREATE TABLE `jobInfo` (
  `id` int(11) NOT NULL,
  `job_name` varchar(50) DEFAULT NULL COMMENT '岗位名称',
  `remarks` varchar(200) DEFAULT NULL COMMENT '岗位描述'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `jobInfo`
--

INSERT INTO `jobInfo` (`id`, `job_name`, `remarks`) VALUES
(1, '人事类型', '人事类型'),
(2, '财务类型', '财务类型');

-- --------------------------------------------------------

--
-- 表的结构 `recruitInfo`
--

CREATE TABLE `recruitInfo` (
  `id` int(11) NOT NULL,
  `jobName` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '岗位信息',
  `mansize` int(11) DEFAULT NULL COMMENT '招聘人数',
  `age` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '年龄要求',
  `record` int(2) DEFAULT NULL COMMENT '学历0:初中或以下，1:高中，2:中专，3:大专、高职，4：本科，5：研究生，6:博士，7：博士后，8:其他',
  `pay` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '月薪范围',
  `workingplace` varchar(200) CHARACTER SET utf8 DEFAULT NULL COMMENT '工作地点',
  `company_id` int(11) DEFAULT NULL COMMENT '单位标示',
  `work_content` varchar(1000) CHARACTER SET utf8 DEFAULT NULL COMMENT '工作内容',
  `work_demand` varchar(1000) CHARACTER SET utf8 DEFAULT NULL COMMENT '岗位要求',
  `company_user_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '单位联系人',
  `home_phone` varchar(13) DEFAULT NULL COMMENT '联系手机',
  `scene_join_number` int(11) DEFAULT NULL COMMENT '现场参加人数',
  `job_id` int(11) NOT NULL COMMENT '岗位信息标示'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `recruitInfo`
--

INSERT INTO `recruitInfo` (`id`, `jobName`, `mansize`, `age`, `record`, `pay`, `workingplace`, `company_id`, `work_content`, `work_demand`, `company_user_name`, `home_phone`, `scene_join_number`, `job_id`) VALUES
(8, '乐高幼儿老师', 2, '20-35岁', 3, '3000-6000', '上海市闵行区、浦东区、杨浦区', 2, '1、教授乐高幼教课程；\r\n2、开展幼教项目公开课；\r\n3、教研交流。', '1、热爱孩子、热爱教育事业；\r\n2、熟练掌握专业的幼儿教学理论、技能和灵活多变的教学方式；\r\n3、普通话标准，具有良好语言表达能力和较强的文字功底；\r\n4、较强的敬业精神和创新意识。', '刘娜娜', '15821869906', 2, 1),
(9, '乐高机器人老师', 2, '20-35岁', 3, '3000-6000', '上海市闵行区、浦东区、杨浦区', 2, '1、教授乐高机器人课程；\r\n2、独立编写教案；\r\n3、带队参加机器人各项比赛；\r\n4、及时完成中心领导的相关工作事宜。', '1.热爱教育事业，较强的敬业精神和创新意识；\r\n2.熟练掌握专业的学龄儿童教学理论、技能和灵活多变的教学方式；\r\n3.普通话标准，具有良好语言表达能力和较强的文字功底；\r\n4.具有学龄儿童教育等相关专业经验者优先； ', '刘娜娜', '15821869906', 2, 2),
(10, '销售经理（环保设备）', 2, '20-35岁', 3, '4000-15000', '上海市闵行区中春路7611弄89号', 1, '1.结合企业发展战略制定相应的销售计划和目标并实施完成。\r\n2.负责客户的开发与管理（包括业务洽谈，合同签订等），收集反馈市场信息，推广产品与设计方案。\r\n3.解答客户常规问题（包括一般性技术问题）。及时跟踪并处理客户反馈，定期进行重点客户的拜访，维护新老客户关系。\r\n4.发现实际工作中出现的问题（包括销售环节，团队协作等环节），提出合理建议并解决。', '1.能够敏锐的感知市场销售动态和趋势变化，捕捉新的市场机会。\r\n2.机敏灵活，具有较强的沟通协调能力及团队合作精神。\r\n3.学历和专业不限，但工科背景、市场营销、环境等相关专业优先考虑。\r\n4.应届毕业生条件优秀者亦可 （适应外地出差）。\r\n5.有驾照者可加分', '潘女士', '13916105084', 2, 1);

-- --------------------------------------------------------

--
-- 表的结构 `resume`
--

CREATE TABLE `resume` (
  `id` int(11) NOT NULL,
  `url_id` varchar(200) DEFAULT NULL COMMENT '目前做为唯一图片链接地址',
  `username` varchar(50) DEFAULT NULL COMMENT '用户名',
  `sex` int(1) NOT NULL DEFAULT '1' COMMENT '1:男，0:女',
  `identitycard` varchar(50) DEFAULT NULL COMMENT '身份证',
  `birthday` int(8) DEFAULT NULL COMMENT 'YYYYMMDD',
  `education` int(1) NOT NULL DEFAULT '8' COMMENT ' 0:初中或以下，1:高中，2:中专，3:大专、高职，4：本科，5：研究生，6:博士，7：博士后，8:其他',
  `province` varchar(50) DEFAULT NULL COMMENT '省份',
  `city` varchar(50) DEFAULT NULL COMMENT '市',
  `county` varchar(50) DEFAULT NULL COMMENT '县/区',
  `place` int(1) NOT NULL DEFAULT '0' COMMENT '户籍地0.本区，1本市非本区，2外省市',
  `domicile` varchar(200) DEFAULT NULL COMMENT '现住地',
  `phone` varchar(20) DEFAULT NULL COMMENT '手机',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0:公开，1:关闭，2：企业可看，3:投递可看',
  `remark` varchar(1000) DEFAULT NULL COMMENT '简历详情',
  `userId` varchar(32) DEFAULT NULL COMMENT '简历关联用户id',
  `resume_code` varchar(20) DEFAULT NULL COMMENT '简历编码',
  `record_date` date DEFAULT NULL COMMENT '登记日期',
  `nation` varchar(10) DEFAULT NULL COMMENT '民族',
  `marital_status` int(1) NOT NULL DEFAULT '0' COMMENT '婚姻状态，0:未婚，1:已婚，2:已婚已育',
  `home_phone` varchar(20) DEFAULT NULL COMMENT '家庭电话',
  `personnel_type` int(3) NOT NULL DEFAULT '0' COMMENT '0:失业，1:征地，2:协保，3:下岗，4:退休，5:应期毕业生，6：外来媳妇，7:退伍军人',
  `Job_intention` varchar(200) DEFAULT NULL COMMENT '求职意向',
  `expected_income` varchar(50) DEFAULT NULL COMMENT '期望收入',
  `political_status` int(1) NOT NULL DEFAULT '0' COMMENT '政治面貌 0 群众 1:党员 2:团员',
  `street` varchar(200) DEFAULT NULL COMMENT '街道',
  `person_height` varchar(10) NOT NULL DEFAULT '0' COMMENT '身高',
  `leparray_data` text,
  `workarray_data` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `resume`
--

INSERT INTO `resume` (`id`, `url_id`, `username`, `sex`, `identitycard`, `birthday`, `education`, `province`, `city`, `county`, `place`, `domicile`, `phone`, `status`, `remark`, `userId`, `resume_code`, `record_date`, `nation`, `marital_status`, `home_phone`, `personnel_type`, `Job_intention`, `expected_income`, `political_status`, `street`, `person_height`, `leparray_data`, `workarray_data`) VALUES
(1, 'fbaloihpln.gif', '吴佳维', 1, '310112198708180319', NULL, 2, '广东省', '广州市', '黄浦区', 0, '宝铭路', '18616729587', 0, '哈哈哈', 'oVI_i5PmzL3GrnF_S9EtZVxC1QaM', NULL, '2019-04-14', '汉', 1, '64881325', 7, '服务员', '3000', 1, '莘庄镇', '170', '[{\"school_name\":\"\\u5c0f\\u5b66\",\"major\":\"a\",\"start_date\":\"1973-04-16\",\"end_date\":\"2019-04-15\"}]', '[{\"corporate_name\":\"b\",\"work_name\":\"b\",\"start_date\":\"2019-04-15\",\"end_date\":\"2019-04-15\"}]'),
(14, 'fbi783kiod.jpg', 'hu沪', 1, '310112198507081815', 19850708, 8, '上海市', '上海市', '黄浦区', 0, '路2号', '134455549931', 0, NULL, 'oCbNK5HvXHAlhMqPiDupn6y4BRCY', NULL, NULL, '韩', 0, '122333', 0, NULL, '9000', 0, '莘庄镇', '180', '[{\"begin\":\"2015-04\",\"end\":\"2022-04\",\"school\":\"a s d f\\u963f\\u65af\\u987f\\u53d1\\u751f\\u7684\\u53d1\",\"majoy\":\"a s d fa s d fa s d\\u963f\\u65af\\u987f\\u53d1\\u751f\\u7684\\u53d1\"}]', '[{\"begin\":\"2019-04\",\"end\":\"2015-04\",\"corporate_name\":\"x xx x gong so i\\u8c22\\u8c22\\u606d\\u9001 i\",\"job_name\":\"sa d\\u6492\\u5730\\u5462\",\"profile\":\"\\u963f\\u65af\\u987f\\u53d1\\u591a\\u5c11\\u5206\"}]');

-- --------------------------------------------------------

--
-- 表的结构 `street`
--

CREATE TABLE `street` (
  `id` int(11) NOT NULL,
  `street_name` varchar(50) DEFAULT NULL COMMENT '街道名'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `street`
--

INSERT INTO `street` (`id`, `street_name`) VALUES
(1, '七宝镇'),
(2, '浦江镇'),
(3, '梅陇镇'),
(4, '虹桥镇'),
(5, '马桥镇'),
(6, '吴泾镇'),
(7, '华漕镇'),
(8, '颛桥镇'),
(9, '江川路街道'),
(10, '新虹街道'),
(11, '古美路街道'),
(12, '浦锦街道'),
(13, '长三角及扶贫专区'),
(14, '大学生实践和生态环保专区'),
(0, '莘庄镇');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `openid` varchar(50) DEFAULT NULL,
  `session_key` varchar(50) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `sign` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `sex` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `openid`, `session_key`, `type`, `sign`, `username`, `sex`) VALUES
(4, 'oVI_i5PmzL3GrnF_S9EtZVxC1QaM', 'GjrhyFIZot3g5rjq6w5eFg==', 0, 0, NULL, NULL),
(5, 'oVI_i5PyQNLfnw0MinAyaJstHKNw', 'v6nWhbHiSpoMnZK5IiRuZQ==', 0, 0, NULL, NULL),
(6, 'oCbNK5HvXHAlhMqPiDupn6y4BRCY', '6G9aOJEEvKUxOGELdgubfQ==', 0, 0, NULL, NULL),
(7, 'oCbNK5P9Pd3Z6_gAnw_SpplhQpxc', 'v8WQuxJBjqOGbCmsMDuxUg==', 0, 0, NULL, NULL),
(8, 'oCbNK5OAtP8hTpULU49qamerI5KE', 'xhRJgxq4cB75JhYFdyhNgw==', 0, 0, NULL, NULL),
(9, 'oCbNK5HGYkRzQepc1idevoazPHYA', 'yjY30irE1CwE2mhlRCNATg==', 0, 0, NULL, NULL),
(10, 'oCbNK5O3-O4DYmsZEAV-oLd2Zcvk', '2a7b899CJl+IUFGId03yhw==', 0, 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bind_account`
--
ALTER TABLE `bind_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_info`
--
ALTER TABLE `delivery_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demo`
--
ALTER TABLE `demo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuli`
--
ALTER TABLE `fuli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobInfo`
--
ALTER TABLE `jobInfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recruitInfo`
--
ALTER TABLE `recruitInfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `street`
--
ALTER TABLE `street`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `bind_account`
--
ALTER TABLE `bind_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `delivery_info`
--
ALTER TABLE `delivery_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一标示', AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `demo`
--
ALTER TABLE `demo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `fuli`
--
ALTER TABLE `fuli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 使用表AUTO_INCREMENT `jobInfo`
--
ALTER TABLE `jobInfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `recruitInfo`
--
ALTER TABLE `recruitInfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 使用表AUTO_INCREMENT `resume`
--
ALTER TABLE `resume`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- 使用表AUTO_INCREMENT `street`
--
ALTER TABLE `street`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
