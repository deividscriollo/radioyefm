SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE `tipo_programa`;
SET FOREIGN_KEY_CHECKS = 1;
INSERT INTO `oye_fm_unit_test`.`tipo_programa` (`nombre`, `categoria`, `observaciones`, `estado`) VALUES 
('Apto publico', 'A', 'todo publico', 'a'),
('Informativo', 'I', 'noticias', 'a'),
('Educativo', 'E', 'Aprendizaje', 'p');

