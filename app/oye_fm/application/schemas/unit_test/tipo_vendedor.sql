SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE `tipo_vendedor`;
SET FOREIGN_KEY_CHECKS = 1;
INSERT INTO `oye_fm_unit_test`.`tipo_vendedor` (`nombre`, `observaciones`, `estado`) VALUES 
('interno', 'dentro de la empresa', 'a'),
('externo', 'fuera de la empresa', 'a'),
('otros', 'no hace nada', 'p');
