USE `oye_fm_testing`;

TRUNCATE `clientes`;
INSERT INTO `clientes` (`id`, `empresa`, `ruc`, `direccion`, `observaciones`, `estado`) VALUES
(1, 'oye_fm', '123456', 'Ibarra', 'observaciones', 'a'),
(2,'aki', '456789', 'Ibarra', 'nada', 'p');

SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE `tipo_vendedor`;
SET FOREIGN_KEY_CHECKS = 1;
INSERT INTO `tipo_vendedor` (`id`, `nombre`, `observaciones`, `estado`) VALUES 
(1, 'interno', 'dentro de la empresa', 'a'),
(2, 'externo', 'fuera de la empresa', 'a'),
(3, 'otros', 'no hace nada', 'p');

TRUNCATE `vendedores`;
INSERT INTO `vendedores` (`nombre`, `apellido`, `edad`, `cedula`, `direccion`, `telefono`, `observaciones`, `estado`, `id_tipo_vendedor`) VALUES 
('nombre1', 'apellido1', '25', '1234567891', 'ibarra', '1234', 'ninguna', 'a', '1'),
('nombre2', 'apellido2', '28', '4567891234', 'quito', '56789', 'nada aun', 'a', '1'),
('nombre3', 'apellido3', '30', '7789456', 'otavalo', '852146', 'eliminado', 'p', '2');

TRUNCATE `roles`;
INSERT INTO `roles` VALUES (1,0,'User'),
(2,0,'Admin');

TRUNCATE `users`;
INSERT INTO `users` VALUES (1,2,'admin','$1$Cg5l1j/p$k.BlmLyK6hdUYINrW4pOl1','admin@localhost.com',0,NULL,NULL,NULL,NULL,'127.0.0.1','2015-12-30 10:39:32','2015-12-30 09:14:09','2015-12-30 14:14:09');

TRUNCATE `user_profile`;
INSERT INTO `user_profile` VALUES (1,1,NULL,NULL);
