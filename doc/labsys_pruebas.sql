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

 Date: 16/03/2020 01:43:31
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
INSERT INTO `administrador` VALUES ('1315767200', 'Villacreses Parrales', 'Carlos Andres', 21, 'Calle Noboa y Antepara', 'Masculino', '0993751461', 'youquince@gmail.com', 'VIL200');

-- ----------------------------
-- Table structure for informacion_examen
-- ----------------------------
DROP TABLE IF EXISTS `informacion_examen`;
CREATE TABLE `informacion_examen`  (
  `id_paciente` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cedula_pac` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cedula_lab` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `medico_ref` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fech_examen` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `precio` double(3, 2) NOT NULL,
  `observaciones` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_paciente`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

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
INSERT INTO `laboratorio` VALUES ('LABO895', '1315767895', 'Labo Med', 'Parrales y Guale');

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
INSERT INTO `laboratorista` VALUES ('0951332774', 'Villacreses Parrales', 'Karina Holanda', 25, 'Via a Guayaquil', 'Femenino', 'antoniovic15@outlook.com', '0993751461', 'VIL774');
INSERT INTO `laboratorista` VALUES ('0954142949', 'Rodriguez Perez', 'Allison Briggette', 21, 'Calle Noboa y Antepara', 'Femenino', 'alys25@gmail.com', '0993751461', 'ROD949');
INSERT INTO `laboratorista` VALUES ('1315767895', 'Villacreses Ponce', 'Juan Carlos', 49, 'Calle Noboa y Antepara', 'Masculino', 'youquince@gmail.com', '0993751461', 'VIL895');

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
INSERT INTO `login` VALUES ('0951332774', 'd41d8cd98f00b204e9800998ecf8427e', 'Laboratorista', 'Enabled');
INSERT INTO `login` VALUES ('0954142949', 'd41d8cd98f00b204e9800998ecf8427e', 'Laboratorista', 'Enabled');
INSERT INTO `login` VALUES ('1308306131', 'e807f1fcf82d132f9bb018ca6738a19f', 'Usuario', 'Enabled');
INSERT INTO `login` VALUES ('1315283323', 'e807f1fcf82d132f9bb018ca6738a19f', 'Usuario', 'Enabled');
INSERT INTO `login` VALUES ('1315767200', 'c3c4aabfeb61fbda61d4b64e04ef846b', 'Administrador', 'Enabled');
INSERT INTO `login` VALUES ('1315767895', 'd41d8cd98f00b204e9800998ecf8427e', 'Laboratorista', 'Enabled');
INSERT INTO `login` VALUES ('1316650512', 'e807f1fcf82d132f9bb018ca6738a19f', 'Usuario', 'Enabled');
INSERT INTO `login` VALUES ('1350446066', '25f9e794323b453885f5181f1b624d0b', 'Usuario', 'Enabled');
INSERT INTO `login` VALUES ('1350604763', 'd41d8cd98f00b204e9800998ecf8427e', 'Usuario', 'Enabled');
INSERT INTO `login` VALUES ('1385460223', 'eb6b75e2e38e3953e4383fde1e522e40', 'Usuario', 'Enabled');

-- ----------------------------
-- Table structure for parametros_heces
-- ----------------------------
DROP TABLE IF EXISTS `parametros_heces`;
CREATE TABLE `parametros_heces`  (
  `cod_ensayo` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cod_laboratorio` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ensayo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `resultado` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`cod_ensayo`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for parametros_orina
-- ----------------------------
DROP TABLE IF EXISTS `parametros_orina`;
CREATE TABLE `parametros_orina`  (
  `cod_ensayo` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cod_laboratorio` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ensayo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `valor_referencia` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`cod_ensayo`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for parametros_sangre
-- ----------------------------
DROP TABLE IF EXISTS `parametros_sangre`;
CREATE TABLE `parametros_sangre`  (
  `cod_ensayo` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cod_laboratorio` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ensayo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `etapas_ref` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ref_menor` double(4, 2) NOT NULL,
  `ref_mayor` double(4, 2) NOT NULL,
  PRIMARY KEY (`cod_ensayo`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for resultado_examen
-- ----------------------------
DROP TABLE IF EXISTS `resultado_examen`;
CREATE TABLE `resultado_examen`  (
  `id_paciente` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codigo_lab` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cod_ensayo` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `resultado` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `observaciones` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_paciente`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

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
INSERT INTO `user` VALUES ('1308306131', 'Parrales Briones', 'Maricela Del Rocio', 47, 'Calle Noboa y Antepara', 'Femenino', '0993751461', 'maricelaB123@gmail.com', 'PAR131');
INSERT INTO `user` VALUES ('1315283323', 'Hernandez Castillo', 'Marcos Antonio', 28, 'Calle Noboa y Antepara', 'Masculino', '0982346134', 'marcosantonio22@gmail.com', 'FIG323');
INSERT INTO `user` VALUES ('1316650512', 'Villacreses Parrales', 'Gabriela Madeleine', 23, 'Via a guale', 'Femenino', '0953214855', 'carlosvillacresesparrales23@gmail.com', 'VIL512');
INSERT INTO `user` VALUES ('1350446066', 'Villacreses Ponce', 'Juan Carlos', 48, 'Via a guale', 'Masculino', '0998564715', 'alison97rodriguez@gmail.com', 'VIL066');
INSERT INTO `user` VALUES ('1350604763', 'Villacreses Parrales', 'Ambar Briggette', 17, 'Calle FKenedith', 'Femenino', '0982088695', 'carlosvillacresesparrales23@gmail.com', 'VIL763');
INSERT INTO `user` VALUES ('1385460223', 'Figueroa Castillo', 'Victor Antonio', 21, 'Via a Chade', 'Femenino', '0968377293', 'youquince@gmail.com', 'FIG223');

SET FOREIGN_KEY_CHECKS = 1;
