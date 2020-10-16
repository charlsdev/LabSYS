/*
 Navicat Premium Data Transfer

 Source Server         : Servidor DHCP
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : labsys

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 24/03/2020 17:22:35
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for administrador
-- ----------------------------
DROP TABLE IF EXISTS `administrador`;
CREATE TABLE `administrador`  (
  `cedula` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apellidos` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombres` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `edad` int(3) NOT NULL,
  `direccion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `genero` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codigo` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`cedula`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of administrador
-- ----------------------------
INSERT INTO `administrador` VALUES ('1308994902', 'Choez Calle', 'Jennifer Elizabeth', 25, 'Via a Chade', 'Femenino', '0993751461', 'eli123@hotmail.es', 'CHO902');
INSERT INTO `administrador` VALUES ('1315767200', 'Villacreses Parrales', 'Carlos Andres', 21, 'Calle Noboa y Antepara', 'Masculino', '0993751461', 'youquince@gmail.com', 'VIL200');
INSERT INTO `administrador` VALUES ('1711112969', 'Marquez Montero', 'Sol Maria', 25, 'Via a Guayaquil', 'Femenino', '0993751461', 'alys25@gmail.com', 'MAR969');

-- ----------------------------
-- Table structure for informacion_examen
-- ----------------------------
DROP TABLE IF EXISTS `informacion_examen`;
CREATE TABLE `informacion_examen`  (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `id_paciente` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cedula_pac` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cedula_lab` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cod_laboratorio` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `medico_ref` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fech_examen` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `precio` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `observaciones` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`, `id_paciente`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of informacion_examen
-- ----------------------------
INSERT INTO `informacion_examen` VALUES (1, 'PAC0001', '1316650512', '0951332774', 'DIVI774', 'Dr. Mario Velez', '2020-03-22', '125.50', 'Realizado');
INSERT INTO `informacion_examen` VALUES (2, 'PAC0002', '1308306131', '0951332774', 'LABO774', 'Dr. Mario Velez', '2020-03-22', '96.00', 'Realizado');
INSERT INTO `informacion_examen` VALUES (3, 'PAC0003', '1315767200', '0951332774', 'LABO774', 'Dr. Mario Velez', '2020-03-29', '125.50', 'Realizado');
INSERT INTO `informacion_examen` VALUES (4, 'PAC0004', '1350604763', '0951332774', 'LABO774', 'Dr. Mario Velez', '2020-03-27', '125.50', 'Realizado');
INSERT INTO `informacion_examen` VALUES (5, 'PAC0005', '1316650512', '0951332774', 'NARC774', 'Dr. Mario Velez', '2020-03-23', '60.00', 'Realizado');
INSERT INTO `informacion_examen` VALUES (6, 'PAC0006', '1316650512', '0951332774', 'NARC774', 'Dr. Mario Velez', '2020-03-25', '125.50', 'Realizado');
INSERT INTO `informacion_examen` VALUES (7, 'PAC0007', '0920868122', '0951332774', 'DIVI774', 'Dr. Mario Velez', '2020-03-28', '96.00', 'Pendiente');
INSERT INTO `informacion_examen` VALUES (8, 'PAC0008', '1316650512', '0951332774', 'NARC774', 'Dr. Mario Velez', '2020-03-28', '96.00', 'Realizado');
INSERT INTO `informacion_examen` VALUES (9, 'PAC0009', '1316650512', '0951332774', 'LABO774', 'Dr. Mario Velez', '2020-03-27', '60.00', 'Realizado');
INSERT INTO `informacion_examen` VALUES (10, 'PAC0010', '1316650512', '0951332774', 'DIVI774', 'Dr. Mario Velez', '2020-04-02', '125.50', 'Realizado');
INSERT INTO `informacion_examen` VALUES (11, 'PAC0011', '1316650512', '0951332774', 'DIVI774', 'Dr. Mario Velez', '2020-03-26', '125.50', 'Realizado');

-- ----------------------------
-- Table structure for laboratorio
-- ----------------------------
DROP TABLE IF EXISTS `laboratorio`;
CREATE TABLE `laboratorio`  (
  `cod_laboratorio` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cedula` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre_lab` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `direccion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of laboratorio
-- ----------------------------
INSERT INTO `laboratorio` VALUES ('DIVI774', '0951332774', 'Divino Ninio', 'Calle Ricaurte y Olmedo');
INSERT INTO `laboratorio` VALUES ('NARC774', '0951332774', 'Narcisita de Jesus', 'Calle Ricaurte y Olmedo');
INSERT INTO `laboratorio` VALUES ('LABO895', '1315767895', 'Bio Medic', 'Parrales y Guale');
INSERT INTO `laboratorio` VALUES ('LABO774', '0951332774', 'LaboMed', '15 de Octubre');
INSERT INTO `laboratorio` VALUES ('DIVI949', '0954142949', 'Divino Ninio', 'Atahualpa');
INSERT INTO `laboratorio` VALUES ('DIVI895', '1315767895', 'Santa Marianita', 'Parrales y Guale');

-- ----------------------------
-- Table structure for laboratorista
-- ----------------------------
DROP TABLE IF EXISTS `laboratorista`;
CREATE TABLE `laboratorista`  (
  `cedula` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apellidos` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombres` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `edad` int(3) NOT NULL,
  `direccion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `genero` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codigo` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`cedula`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of laboratorista
-- ----------------------------
INSERT INTO `laboratorista` VALUES ('0951332774', 'Marquez Montero', 'Karina Olanda', 21, 'Calle Noboa y Antepara', 'Femenino', 'Pin.Education.ec@gmail.com', '0993751461', 'MAR774');
INSERT INTO `laboratorista` VALUES ('0954142949', 'Rodriguez Perez', 'Allison Briggette', 21, 'Via a Guayaquil', 'Femenino', 'youquince@gmail.com', '0986574213', 'ROD949');
INSERT INTO `laboratorista` VALUES ('1315767895', 'Villacreses Ponce', 'Juan Carlos', 49, 'Calle Noboa y Antepara', 'Masculino', 'Pin.Education.ec@gmail.com', '0993751461', 'VIL895');

-- ----------------------------
-- Table structure for login
-- ----------------------------
DROP TABLE IF EXISTS `login`;
CREATE TABLE `login`  (
  `username` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `privilegio` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`username`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of login
-- ----------------------------
INSERT INTO `login` VALUES ('0920868122', '25f9e794323b453885f5181f1b624d0b', 'Usuario', 'Enabled');
INSERT INTO `login` VALUES ('0951332774', '25f9e794323b453885f5181f1b624d0b', 'Laboratorista', 'Enabled');
INSERT INTO `login` VALUES ('0954142949', 'e807f1fcf82d132f9bb018ca6738a19f', 'Laboratorista', 'Enabled');
INSERT INTO `login` VALUES ('1308306131', 'e807f1fcf82d132f9bb018ca6738a19f', 'Usuario', 'Enabled');
INSERT INTO `login` VALUES ('1308994902', 'e807f1fcf82d132f9bb018ca6738a19f', 'Administrador', 'Enabled');
INSERT INTO `login` VALUES ('1315283323', 'e807f1fcf82d132f9bb018ca6738a19f', 'Usuario', 'Enabled');
INSERT INTO `login` VALUES ('1315767200', 'c3c4aabfeb61fbda61d4b64e04ef846b', 'Administrador', 'Enabled');
INSERT INTO `login` VALUES ('1315767895', '25f9e794323b453885f5181f1b624d0b', 'Laboratorista', 'Enabled');
INSERT INTO `login` VALUES ('1316650512', 'c3c4aabfeb61fbda61d4b64e04ef846b', 'Usuario', 'Enabled');
INSERT INTO `login` VALUES ('1350446066', '25f9e794323b453885f5181f1b624d0b', 'Usuario', 'Enabled');
INSERT INTO `login` VALUES ('1350604763', 'd41d8cd98f00b204e9800998ecf8427e', 'Usuario', 'Enabled');
INSERT INTO `login` VALUES ('1385460223', 'eb6b75e2e38e3953e4383fde1e522e40', 'Usuario', 'Enabled');
INSERT INTO `login` VALUES ('1711112969', 'e807f1fcf82d132f9bb018ca6738a19f', 'Administrador', 'Enabled');

-- ----------------------------
-- Table structure for parametros_reactivo
-- ----------------------------
DROP TABLE IF EXISTS `parametros_reactivo`;
CREATE TABLE `parametros_reactivo`  (
  `cod_ensayo` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cod_laboratorio` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tipo` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ensayo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ref_menor` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ref_mayor` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `referencia` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`cod_ensayo`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of parametros_reactivo
-- ----------------------------
INSERT INTO `parametros_reactivo` VALUES ('DIVI774GLU', 'DIVI774', 'Orina', 'Glucosa', '0', '0', 'Escasas');
INSERT INTO `parametros_reactivo` VALUES ('DIVI774HEM', 'DIVI774', 'Sangre', 'Hemoglobina', '56.0', '120.0', '0');
INSERT INTO `parametros_reactivo` VALUES ('DIVI774MIC', 'DIVI774', 'Heces', 'Microscopico', '0', '0', 'Positivo');
INSERT INTO `parametros_reactivo` VALUES ('DIVI774PRO', 'DIVI774', 'Orina', 'Proteinas', '0', '0', 'Negativo');
INSERT INTO `parametros_reactivo` VALUES ('DIVI774SAN', 'DIVI774', 'Heces', 'Sangre', '0', '0', 'Positivo');
INSERT INTO `parametros_reactivo` VALUES ('DIVI949HEM', 'DIVI949', 'Sangre', 'Hemoglobina', '6.35', '12.5', '0');
INSERT INTO `parametros_reactivo` VALUES ('LABO774HEM', 'LABO774', 'Sangre', 'Hemoglobina', '2.30', '6.70', '0');
INSERT INTO `parametros_reactivo` VALUES ('LABO895GLU', 'LABO895', 'Orina', 'Glucosa', '0', '0', 'Escasas');
INSERT INTO `parametros_reactivo` VALUES ('LABO895SAN', 'LABO895', 'Heces', 'Sangre', '0.00', '0.00', '+');
INSERT INTO `parametros_reactivo` VALUES ('NARC774GLU', 'NARC774', 'Orina', 'Glucosa', '0', '0', 'Escasas');
INSERT INTO `parametros_reactivo` VALUES ('NARC774SAN', 'NARC774', 'Heces', 'Sangre', '0', '0', 'Negativo');

-- ----------------------------
-- Table structure for resultado_examen
-- ----------------------------
DROP TABLE IF EXISTS `resultado_examen`;
CREATE TABLE `resultado_examen`  (
  `id_paciente` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cod_ensayo` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `resultado` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `observaciones` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of resultado_examen
-- ----------------------------
INSERT INTO `resultado_examen` VALUES ('PAC0003', 'LABO774HEM', '75.00', 'Alto');
INSERT INTO `resultado_examen` VALUES ('PAC0001', 'DIVI774GLU', 'Negativo', 'Negativo');
INSERT INTO `resultado_examen` VALUES ('PAC0001', 'DIVI774MIC', 'Escasas', 'Escasas');
INSERT INTO `resultado_examen` VALUES ('PAC0001', 'DIVI774SAN', 'Negativo', 'Negativo');
INSERT INTO `resultado_examen` VALUES ('PAC0001', 'DIVI774HEM', '165.00', 'Alto');
INSERT INTO `resultado_examen` VALUES ('PAC0004', 'LABO774HEM', '75.00', 'Normal');
INSERT INTO `resultado_examen` VALUES ('PAC0002', 'LABO774HEM', '75.00', 'Alto');
INSERT INTO `resultado_examen` VALUES ('PAC0006', 'NARC774GLU', 'Negativo', 'Normal');
INSERT INTO `resultado_examen` VALUES ('PAC0005', 'NARC774SAN', 'Negativo', 'Negativo');
INSERT INTO `resultado_examen` VALUES ('PAC0005', 'NARC774GLU', '75.00', 'Normal');
INSERT INTO `resultado_examen` VALUES ('PAC0007', 'DIVI774HEM', '175.00', 'Alto');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `cedula` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apellidos` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombres` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `edad` int(3) NOT NULL,
  `direccion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `genero` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codigo` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`cedula`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('0920868122', 'Gonzalez Martinez', 'Orlando Quinonez', 20, 'Calle Noboa y Antepara', 'Masculino', '0993751461', 'ernan58@gmail.com', 'GON122');
INSERT INTO `user` VALUES ('1308306131', 'Parrales Briones', 'Maricela Del Rocio', 47, 'Calle Noboa y Antepara', 'Femenino', '0993751461', 'maricelaB123@gmail.com', 'PAR131');
INSERT INTO `user` VALUES ('1315283323', 'Hernandez Castillo', 'Marcos Antonio', 28, 'Calle Noboa y Antepara', 'Masculino', '0982346134', 'marcosantonio22@gmail.com', 'FIG323');
INSERT INTO `user` VALUES ('1316650512', 'Villacreses Parrales', 'Gabriela Madeleine', 23, 'Via a guale', 'Femenino', '0953214855', 'carlosvillacresesparrales23@gmail.com', 'VIL512');
INSERT INTO `user` VALUES ('1350446066', 'Villacreses Ponce', 'Juan Carlos', 48, 'Via a guale', 'Masculino', '0998564715', 'alison97rodriguez@gmail.com', 'VIL066');
INSERT INTO `user` VALUES ('1350604763', 'Villacreses Parrales', 'Ambar Briggette', 17, 'Calle FKenedith', 'Femenino', '0982088695', 'carlosvillacresesparrales23@gmail.com', 'VIL763');
INSERT INTO `user` VALUES ('1385460223', 'Figueroa Castillo', 'Victor Antonio', 21, 'Via a Chade', 'Femenino', '0968377293', 'youquince@gmail.com', 'FIG223');

SET FOREIGN_KEY_CHECKS = 1;
