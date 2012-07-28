/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50150
Source Host           : localhost:3306
Source Database       : fundayuda

Target Server Type    : MYSQL
Target Server Version : 50150
File Encoding         : 65001

Date: 2012-07-28 15:47:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `centro_medico`
-- ----------------------------
DROP TABLE IF EXISTS `centro_medico`;
CREATE TABLE `centro_medico` (
  `COD_CENTRO` int(2) NOT NULL AUTO_INCREMENT,
  `NOMBRE_CENTRO` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`COD_CENTRO`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of centro_medico
-- ----------------------------
INSERT INTO `centro_medico` VALUES ('1', 'CENTRO POLICLINICO LA VIÑA');
INSERT INTO `centro_medico` VALUES ('2', 'CENTRO MEDICO DR. RAFAEL GUERRA MENDEZ');

-- ----------------------------
-- Table structure for `resp_sol`
-- ----------------------------
DROP TABLE IF EXISTS `resp_sol`;
CREATE TABLE `resp_sol` (
  `ID_SOL` int(2) DEFAULT NULL,
  `monto_apro` varchar(20) DEFAULT NULL,
  `ID_EMPRESA` varchar(20) DEFAULT NULL,
  `ID_TRABAJADOR` int(2) DEFAULT NULL,
  `FECHA_VIS` date DEFAULT NULL,
  `COD_CENTRO` int(2) DEFAULT NULL,
  `OBSERVACIONES` varchar(150) DEFAULT NULL,
  KEY `fk_sol` (`ID_SOL`),
  CONSTRAINT `fk_sol` FOREIGN KEY (`ID_SOL`) REFERENCES `solicitud` (`ID_SOLICITUD`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of resp_sol
-- ----------------------------

-- ----------------------------
-- Table structure for `solicitud`
-- ----------------------------
DROP TABLE IF EXISTS `solicitud`;
CREATE TABLE `solicitud` (
  `ID_SOLICITUD` int(2) NOT NULL AUTO_INCREMENT,
  `COD_SOLICITUD` int(2) DEFAULT NULL,
  `OBSERVACIONES` varchar(150) DEFAULT NULL,
  `MONTO_SOLICITUD` varchar(18) DEFAULT NULL,
  `FECHA_SOLICITUD` date DEFAULT NULL,
  `STATUS` varchar(20) DEFAULT NULL,
  `CEDULA_RIF_USR` varchar(12) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID_SOLICITUD`),
  KEY `FK_COD_SOLICITUD` (`COD_SOLICITUD`),
  CONSTRAINT `FK_COD_SOLICITUD` FOREIGN KEY (`COD_SOLICITUD`) REFERENCES `tipo_solicitud` (`COD_SOLICITUD`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of solicitud
-- ----------------------------
INSERT INTO `solicitud` VALUES ('3', '1', 'prueba al sistema', '600,00', '2011-10-27', 'Sin Procesar', '16595338');
INSERT INTO `solicitud` VALUES ('4', '2', 'construccion casa', '50.000,00', '2011-10-30', 'Sin Procesar', '16595338');

-- ----------------------------
-- Table structure for `tipo_solicitud`
-- ----------------------------
DROP TABLE IF EXISTS `tipo_solicitud`;
CREATE TABLE `tipo_solicitud` (
  `COD_SOLICITUD` int(2) NOT NULL AUTO_INCREMENT,
  `NOMBRE_SOLICITUD` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`COD_SOLICITUD`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipo_solicitud
-- ----------------------------
INSERT INTO `tipo_solicitud` VALUES ('1', 'QUIRURGICA');
INSERT INTO `tipo_solicitud` VALUES ('2', 'MATERIALES DE DESPLAZAMIENTO');
INSERT INTO `tipo_solicitud` VALUES ('3', 'DONACION');
INSERT INTO `tipo_solicitud` VALUES ('4', 'TERAPIA');

-- ----------------------------
-- Table structure for `tipo_usuario`
-- ----------------------------
DROP TABLE IF EXISTS `tipo_usuario`;
CREATE TABLE `tipo_usuario` (
  `TIPO_USR` int(2) NOT NULL AUTO_INCREMENT,
  `NOMBRE_TIPO` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`TIPO_USR`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipo_usuario
-- ----------------------------
INSERT INTO `tipo_usuario` VALUES ('1', 'BENEFICIARIO');
INSERT INTO `tipo_usuario` VALUES ('2', 'BENEFICIADO');

-- ----------------------------
-- Table structure for `usuario`
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `ID_USUARIO` int(10) NOT NULL,
  `CEDULA_RIF_USR` varchar(20) DEFAULT NULL,
  `NOMBRE_USR` varchar(30) DEFAULT NULL,
  `APELLIDO_USR` varchar(30) DEFAULT NULL,
  `FECHA_NAC_USR` date DEFAULT NULL,
  `TIPO_USR` int(2) DEFAULT NULL,
  `EMPRESA` varchar(200) DEFAULT NULL,
  `TELEFONO` varchar(20) DEFAULT NULL,
  `EMAIL` varchar(40) DEFAULT NULL,
  `DIRECCION` varchar(150) DEFAULT NULL,
  `PASSWORD` varchar(25) DEFAULT NULL,
  `ENCARGADO` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_USUARIO`),
  KEY `FK_TIPO_USR` (`TIPO_USR`),
  CONSTRAINT `FK_TIPO_USR` FOREIGN KEY (`TIPO_USR`) REFERENCES `tipo_usuario` (`TIPO_USR`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('123456', null, null, 'Gonzalez', null, '2', null, '(656) 5654-412', 'angelica_maria2302@HOTMAIL.COM', 'El prado', '123', 'Angelica ');
INSERT INTO `usuario` VALUES ('16595338', 'J-12121212-1', null, null, null, '2', 'alcal', '(121) 2121-212', 'angeledugo@gmail.com', 'asdad', '1234', 'Angel Gonzalez');
INSERT INTO `usuario` VALUES ('17030621', 'J-12121211-2', null, null, null, '1', 'Alcaldia', '(121) 2121-212', 'angeledu@gmail.com', 'La Isabelica', '123456', 'Pedro Rojas');
