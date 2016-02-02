USE `oye_fm`;

TRUNCATE `roles`;
INSERT INTO `roles` VALUES (1,0,'User'),
(2,0,'Admin');

TRUNCATE `users`;
INSERT INTO `users` VALUES (1,2,'admin','$1$Cg5l1j/p$k.BlmLyK6hdUYINrW4pOl1','admin@localhost.com',0,NULL,NULL,NULL,NULL,'127.0.0.1','2015-12-30 10:39:32','2015-12-30 09:14:09','2015-12-30 14:14:09');

TRUNCATE `user_profile`;
INSERT INTO `user_profile` VALUES (1,1,NULL,NULL);
