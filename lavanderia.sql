-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2021 a las 23:47:49
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lavanderia`
--
CREATE DATABASE IF NOT EXISTS `lavanderia` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `lavanderia`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--
-- Creación: 18-10-2021 a las 21:00:14
-- Última actualización: 18-10-2021 a las 21:41:28
--

CREATE TABLE `cliente` (
  `id_venta` varchar(100) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `tipo_servicio` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONES PARA LA TABLA `cliente`:
--   `tipo_servicio`
--       `servicios` -> `tipo`
--

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` VALUES
('1', 'Karen Paola Aguilar', 'karen@example.com', '2021-10-17', 1),
('2', 'Ema', 'ema@example.com', '2021-10-11', 2),
('3', 'Emanuel', 'emanuel@example.com', '2021-10-19', 3),
('4', 'Saul Enrique Khalid', 'saul@example.com', '2021-10-22', 3),
('5', 'Yasury Jamileth', 'yasuary1234@gmail.com', '2021-10-17', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--
-- Creación: 18-10-2021 a las 21:02:30
-- Última actualización: 18-10-2021 a las 21:26:24
--

CREATE TABLE `servicios` (
  `id_servicios` varchar(100) NOT NULL,
  `tipo` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONES PARA LA TABLA `servicios`:
--

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` VALUES
('$15- LAVADA COMPLETA', 1),
('$10- LAVADA MEDIA', 2),
('$7- LAVADA RAPIDA', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--
-- Creación: 16-10-2021 a las 01:15:26
--

CREATE TABLE `user` (
  `cod_user` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONES PARA LA TABLA `user`:
--

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `tipo_servicio` (`tipo_servicio`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_servicios`),
  ADD KEY `tipo` (`tipo`) USING BTREE;

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`cod_user`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`tipo_servicio`) REFERENCES `servicios` (`tipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
