-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-02-2020 a las 07:17:37
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `labsys`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `cedula` varchar(10) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `edad` int(3) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `genero` varchar(15) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `codigo` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion_examen`
--

CREATE TABLE `informacion_examen` (
  `id_paciente` varchar(6) NOT NULL,
  `cedula_pac` varchar(10) NOT NULL,
  `cedula_lab` varchar(10) NOT NULL,
  `medico_ref` varchar(50) NOT NULL,
  `fech_examen` varchar(25) NOT NULL,
  `precio` double(3,2) NOT NULL,
  `observaciones` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio`
--

CREATE TABLE `laboratorio` (
  `cod_laboratorio` varchar(6) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `nombre_lab` varchar(25) NOT NULL,
  `direccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorista`
--

CREATE TABLE `laboratorista` (
  `cedula` varchar(10) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `edad` int(3) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `genero` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `username` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `privilegio` varchar(15) NOT NULL,
  `estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametros_heces`
--

CREATE TABLE `parametros_heces` (
  `cod_ensayo` varchar(9) NOT NULL,
  `cod_laboratorio` varchar(6) NOT NULL,
  `ensayo` varchar(50) NOT NULL,
  `resultado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametros_orina`
--

CREATE TABLE `parametros_orina` (
  `cod_ensayo` varchar(9) NOT NULL,
  `cod_laboratorio` varchar(6) NOT NULL,
  `ensayo` varchar(50) NOT NULL,
  `valor_referencia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametros_sangre`
--

CREATE TABLE `parametros_sangre` (
  `cod_ensayo` varchar(9) NOT NULL,
  `cod_laboratorio` varchar(6) NOT NULL,
  `ensayo` varchar(50) NOT NULL,
  `etapas_ref` varchar(20) NOT NULL,
  `ref_menor` double(4,2) NOT NULL,
  `ref_mayor` double(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultado_examen`
--

CREATE TABLE `resultado_examen` (
  `id_paciente` varchar(6) NOT NULL,
  `codigo_lab` varchar(6) NOT NULL,
  `cod_ensayo` varchar(9) NOT NULL,
  `resultado` varchar(10) NOT NULL,
  `observaciones` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `cedula` varchar(10) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `edad` int(3) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `genero` varchar(15) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `codigo` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `informacion_examen`
--
ALTER TABLE `informacion_examen`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Indices de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD PRIMARY KEY (`cedula`,`cod_laboratorio`);

--
-- Indices de la tabla `laboratorista`
--
ALTER TABLE `laboratorista`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `parametros_heces`
--
ALTER TABLE `parametros_heces`
  ADD PRIMARY KEY (`cod_ensayo`);

--
-- Indices de la tabla `parametros_orina`
--
ALTER TABLE `parametros_orina`
  ADD PRIMARY KEY (`cod_ensayo`);

--
-- Indices de la tabla `parametros_sangre`
--
ALTER TABLE `parametros_sangre`
  ADD PRIMARY KEY (`cod_ensayo`);

--
-- Indices de la tabla `resultado_examen`
--
ALTER TABLE `resultado_examen`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`cedula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
