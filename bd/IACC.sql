
CREATE DATABASE IACC;

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for historial
-- ----------------------------
DROP TABLE IF EXISTS `historial`;
CREATE TABLE `historial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipoConsulta` varchar(50) DEFAULT NULL,
  `consulta` varchar(255) DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `fechaHora` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for perfiles
-- ----------------------------
DROP TABLE IF EXISTS `perfiles`;
CREATE TABLE `perfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `perfil` varchar(50) NOT NULL,
  `select` tinyint(255) NOT NULL DEFAULT '0',
  `update` tinyint(255) NOT NULL DEFAULT '0',
  `delete` tinyint(255) NOT NULL DEFAULT '0',
  `insert` tinyint(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of perfiles
-- ----------------------------
BEGIN;
INSERT INTO `perfiles` VALUES (1, 'admin', 1, 1, 1, 1);
INSERT INTO `perfiles` VALUES (2, 'vis', 1, 0, 0, 0);
INSERT INTO `perfiles` VALUES (3, 'act', 1, 1, 0, 0);
INSERT INTO `perfiles` VALUES (4, 'crea', 1, 0, 0, 1);
INSERT INTO `perfiles` VALUES (5, 'borra', 1, 0, 1, 1);
COMMIT;

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `rut` varchar(12) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `perfiles` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`rut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
BEGIN;
INSERT INTO `usuarios` VALUES ('100000000-7\n', 'Admin', 'Root', 'admin@test.com', '123456', 'admin');
COMMIT;

-- ----------------------------
-- Procedure structure for eliminar
-- ----------------------------
DROP PROCEDURE IF EXISTS `eliminar`;
delimiter ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar`(p_rut VARCHAR(50))
BEGIN
 SET @QUERY = CONCAT('DELETE FROM  IACC.usuarios WHERE rut = ',p_rut);
  
PREPARE smpt FROM @QUERY;
EXECUTE smpt;
DEALLOCATE PREPARE smpt;

INSERT INTO historial (tipoConsulta,consulta,usuario,fechaHora) VALUES ('DELETE',@QUERY,'TEST',NOW());

END;
;;
delimiter ;

-- ----------------------------
-- Procedure structure for insertar
-- ----------------------------
DROP PROCEDURE IF EXISTS `insertar`;
delimiter ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertar`(	p_rut VARCHAR(50), 
																										p_nombre VARCHAR(50), 
																										p_apellido VARCHAR(50), 
																										p_email VARCHAR(50), 
																										p_password VARCHAR(50),
																										p_perfiles VARCHAR(10))
BEGIN
 
 SET @QUERY = CONCAT("INSERT INTO IACC.usuarios(rut,nombre,apellido,email,password,perfiles) VALUES ('",p_rut,"','",p_nombre,"','",p_apellido,"','",p_email,"','",p_password,"','",p_perfiles,"')");

PREPARE smpt FROM @QUERY;
EXECUTE smpt;
DEALLOCATE PREPARE smpt;

INSERT INTO historial (tipoConsulta,consulta,usuario,fechaHora) VALUES ('INSERT',@QUERY,'TEST',NOW());

END;
;;
delimiter ;

-- ----------------------------
-- Procedure structure for update1
-- ----------------------------
DROP PROCEDURE IF EXISTS `update1`;
delimiter ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `update1`(	p_rut VARCHAR(50), 
														p_nombre VARCHAR(50), 
														p_apellido VARCHAR(50), 
														p_email VARCHAR(50), 
														p_perfiles VARCHAR(10))
BEGIN
 
 
 SET @QUERY = CONCAT("UPDATE usuarios SET nombre = '",p_nombre,"',apellido = '",p_apellido,"',email='",p_email,"',perfiles='",p_perfiles,"' where rut = '",p_rut,"'");


PREPARE smpt FROM @QUERY;
EXECUTE smpt;
DEALLOCATE PREPARE smpt;

INSERT INTO historial (tipoConsulta,consulta,usuario,fechaHora) VALUES ('UPDATE',@QUERY,'TEST',NOW());

 

END;
;;
delimiter ;

-- ----------------------------
-- Procedure structure for update2
-- ----------------------------
DROP PROCEDURE IF EXISTS `update2`;
delimiter ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `update2`(	p_rut VARCHAR(50), 
														p_nombre VARCHAR(50), 
														p_apellido VARCHAR(50), 
														p_email VARCHAR(50),
													  p_password VARCHAR(50),
														p_perfiles VARCHAR(10))
BEGIN
 
 
 SET @QUERY = CONCAT("UPDATE usuarios SET nombre = '",p_nombre,"',apellido = '",p_apellido,"',email='",p_email,"',password='",p_password,"',perfiles='",p_perfiles,"' where rut = '",p_rut,"'");


PREPARE smpt FROM @QUERY;
EXECUTE smpt;
DEALLOCATE PREPARE smpt;

INSERT INTO historial (tipoConsulta,consulta,usuario,fechaHora) VALUES ('UPDATE',@QUERY,'TEST',NOW());

 

END;
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
