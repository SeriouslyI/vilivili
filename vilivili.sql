
DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `a_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `a_password` varchar(255) NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `admin` */

insert  into `admin`(`a_id`,`name`,`a_password`) values ('1','lcy888','888888');

/*Table structure for table `follower` */

DROP TABLE IF EXISTS `follower`;

CREATE TABLE `follower` (
  `id` varchar(100) NOT NULL,
  `u_name` varchar(100) DEFAULT NULL,
  `up_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `follower` */

insert  into `follower`(`id`,`u_name`,`up_name`) values ('5be6fe96aa282','lcy','lcy888'),('5be70c9199452','bbb','lcy'),('5be70c945e299','bbb','aas'),('5be70c95e3b57','bbb','aaa');

/*Table structure for table `inf` */

DROP TABLE IF EXISTS `inf`;

CREATE TABLE `inf` (
  `i_id` varchar(255) NOT NULL,
  `a_id` varchar(255) DEFAULT NULL,
  `u_id` varchar(255) DEFAULT NULL,
  `nickname` varchar(24) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `u_email` varchar(50) DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `sex` char(2) DEFAULT NULL,
  `birthday` varchar(100) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`i_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `inf` */

insert  into `inf`(`i_id`,`a_id`,`u_id`,`nickname`,`name`,`u_email`,`signature`,`sex`,`birthday`,`avatar`) values ('1','1',NULL,'lcy888','lcy888',NULL,'对方很懒,没有留下什么','-1','','uploads/avatar/avatar-5be1516a9c49b.jpg'),('158a7cd9a8d2a7c7481074209d026ab2',NULL,'158a7cd9a8d2a7c7481074209d026ab2','aaa','aaa','652131231@qq.com',NULL,NULL,NULL,NULL),('1fb63f0f8480bfd3d6ab5836a930a154',NULL,'1fb63f0f8480bfd3d6ab5836a930a154','qqq','qqq','asdqwe@wqe.com',NULL,NULL,NULL,NULL),('5bd43b5f0fdcd','','5bd43b5f0fdcd','lcy','lcy','forlove655@yahoo.com',NULL,NULL,NULL,''),('7985ef0e5f42189573fff412b808141d',NULL,'7985ef0e5f42189573fff412b808141d','牛在飞','aas','65468321@qq.com','','1','','uploads/avatar/avatar-5be44aa19235f.jpg'),('cf8a92d6f9d122b17814bdd39aff6784',NULL,'cf8a92d6f9d122b17814bdd39aff6784','mmm','mmm','asdasdqwe@werqr.com',NULL,NULL,NULL,NULL),('ecb417a7ec88004b1183009d8d88b152',NULL,'ecb417a7ec88004b1183009d8d88b152','路人甲','bbb','6455231866@qq.com','明天打豆豆。','-1','2018-11-15','uploads/avatar/avatar-5be70c6f327ce.jpg');

/*Table structure for table `message` */

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `m_id` varchar(255) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `v_id` varchar(255) DEFAULT NULL,
  `nickname` varchar(100) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `message` */

insert  into `message`(`m_id`,`message`,`name`,`v_id`,`nickname`,`avatar`) values ('5be4494820044','UP好帅','lcy','5bd43b5f0fsd5','lcy',''),('5be44bb7ce2b6','电影好看+1 主角牛b','aas','5bd43b5f0fsd5','牛在飞','uploads/avatar/avatar-5be44aa19235f.jpg'),('5be44bdc4560f','好看','aas','5be0716b50297','牛在飞','uploads/avatar/avatar-5be44aa19235f.jpg'),('5be6febf16a06','电影好好看','lcy','5bd43b5f0fsd5','lcy',''),('5be70b931052f','11111111111111111','aaa','5bd43b5f0fsd5','aaa',''),('5be70c2dcbf21','太好看了o(╥﹏╥)o','bbb','5bd43b5f0fsd5','路人甲','uploads/avatar/avatar-5be70c6f327ce.jpg'),('5bee372046371','好感动','lcy','5bee26efc6252','lcy','');

/*Table structure for table `up_video` */

DROP TABLE IF EXISTS `up_video`;

CREATE TABLE `up_video` (
  `v_id` varchar(255) NOT NULL,
  `v_name` varchar(255) NOT NULL,
  `v_url` varchar(255) NOT NULL,
  `v_pic` varchar(255) NOT NULL,
  `v_up` varchar(100) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `v_class` int(10) DEFAULT NULL,
  `v_type` int(10) DEFAULT NULL,
  PRIMARY KEY (`v_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `up_video` */

insert  into `up_video`(`v_id`,`v_name`,`v_url`,`v_pic`,`v_up`,`name`,`v_class`,`v_type`) values ('5bee260d2adf1','让世界感受痛楚，神罗天征国日双语对比！ - 1.让世界感受痛楚，神罗天征！中日配音对比','uploads/video/video-5bee260d2b1d9.mp4','uploads/poster/poster-5bee260d86e99.webp','lcy888','lcy888',1,1),('5bee26912c179','「手书」「卡点剪辑」Happy Birthday To许墨 - 1.「手书」「卡点剪辑」Happy Birthday To许墨','uploads/video/video-5bee26912c561.mp4','uploads/poster/poster-5bee26912e889.webp','lcy888','lcy888',1,1),('5bee26efc62100','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',1,1),('5bee26efc6252','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',2,1),('5bee26efc6253','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',2,1),('5bee26efc6254','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',2,1),('5bee26efc6255','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',2,1),('5bee26efc6256','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',2,1),('5bee26efc6257','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',2,1),('5bee26efc6258','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',2,1),('5bee26efc6259','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',2,1),('5bee26efc6261','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',2,1),('5bee26efc6262','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',2,1),('5bee26efc6263','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',2,1),('5bee26efc6264','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',2,1),('5bee26efc6265','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',2,1),('5bee26efc6266','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',2,1),('5bee26efc6267','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',2,1),('5bee26efc6268','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',3,1),('5bee26efc6269','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',3,1),('5bee26efc6270','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',3,1),('5bee26efc6271','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',3,1),('5bee26efc6272','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',3,1),('5bee26efc6273','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',3,1),('5bee26efc6274','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',3,1),('5bee26efc6275','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',3,1),('5bee26efc6276','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',3,1),('5bee26efc6277','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',3,1),('5bee26efc6278','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',3,1),('5bee26efc6279','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',3,1),('5bee26efc6280','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',3,1),('5bee26efc6281','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',3,1),('5bee26efc6282','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',3,1),('5bee26efc6283','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',3,1),('5bee26efc6284','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',3,1),('5bee26efc6285','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',3,1),('5bee26efc6286','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',3,1),('5bee26efc6287','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',3,1),('5bee26efc6288','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',3,1),('5bee26efc6289','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',3,1),('5bee26efc6290','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',3,1),('5bee26efc6291','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',3,1),('5bee26efc6292','【催泪向AMV】为什么你让我如此的脆弱','uploads/video/video-5bee26efc6639.mp4','uploads/poster/poster-5bee26f010bf9.webp','lcy888','lcy888',3,1),('5bee2f54e6209','【RWBY】命运已至 心如磐石','uploads/video/video-5bee2f54e65f1.mp4','uploads/poster/poster-5bee2f553ea59.webp','lcy888','lcy888',1,1),('5bee2f68e46b1','【海贼王】茫茫大海 独孤求败——巴西歌手Rap系列之【鹰眼米霍克】','uploads/video/video-5bee2f68e4a99.mp4','uploads/poster/poster-5bee2f6905849.webp','lcy888','lcy888',1,1),('5bee2f7d7f969','【双男主系列六】愿你能遇见这般温柔的人','uploads/video/video-5bee2f7d7fd51.mp4','uploads/poster/poster-5bee2f7d9be89.webp','lcy888','lcy888',1,1),('5bee2f8c8a161','【AP黑塔利亚】仿进击的巨人OP高帧良心手绘动画','uploads/video/video-5bee2f8c8a549.mp4','uploads/poster/poster-5bee2f8c983f1.webp','lcy888','lcy888',1,1),('5bee325829e51','【镜头配布】点燃激情！用这份活力和节奏来引领潮流吧！【Action - BoA】','uploads/video/video-5bee32582a239.mp4','uploads/poster/poster-5bee3258a1c49.webp','lcy888','lcy888',1,1),('5bee326dd1219','【弱音MMD】当弱音遇到抖音！有毒，停不下来！！','uploads/video/video-5bee326dd1601.mp4','uploads/poster/poster-5bee326ddd951.webp','lcy888','lcy888',1,1),('5bee32800f871','【英雄之心全职高手】英雄之心，何惧落寞，斩荆棘为荣耀拼搏 - 1.英雄之心','uploads/video/video-5bee32800fc59.mp4','uploads/poster/poster-5bee328039851.webp','lcy888','lcy888',1,1),('5bee32964b191','ダンスちえりダンス','uploads/video/video-5bee32964b579.mp4','uploads/poster/poster-5bee32965b749.webp','lcy888','lcy888',1,1);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `u_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`u_id`,`name`,`u_password`,`u_email`) values ('158a7cd9a8d2a7c7481074209d026ab2','aaa','aaa','652131231@qq.com'),('1fb63f0f8480bfd3d6ab5836a930a154','qqq','123','asdqwe@wqe.com'),('5bd43b5f0fdcd','lcy','888888','forlove655@yahoo.com'),('7985ef0e5f42189573fff412b808141d','aas','123456','65468321@qq.com'),('cf8a92d6f9d122b17814bdd39aff6784','mmm','123','asdasdqwe@werqr.com'),('ecb417a7ec88004b1183009d8d88b152','bbb','bbb','6455231866@qq.com');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
