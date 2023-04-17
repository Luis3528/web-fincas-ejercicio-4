# web-fincas-ejercicio-4
web fincas 
Aplicación MVC con PHP - APACHE - MYSQL - ORM

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// Archivos de la BD es el siguiente:-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-04-2023 a las 05:07:46
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbfincas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fincas`
--

CREATE TABLE `fincas` (
  `id` int(11) NOT NULL,
  `clave` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `numHectaras` int(11) DEFAULT NULL,
  `metrosCuadrados` int(11) DEFAULT NULL,
  `propietario` varchar(50) DEFAULT NULL,
  `capataz` varchar(50) DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL,
  `departamento` varchar(50) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `siProduceLeche` tinyint(1) DEFAULT NULL,
  `siProduceCereales` tinyint(1) DEFAULT NULL,
  `siProduceFrutas` tinyint(1) DEFAULT NULL,
  `siProduceVerduras` tinyint(1) DEFAULT NULL,
  `usuariocc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fincas`
--

INSERT INTO `fincas` (`id`, `clave`, `nombre`, `numHectaras`, `metrosCuadrados`, `propietario`, `capataz`, `pais`, `departamento`, `ciudad`, `siProduceLeche`, `siProduceCereales`, `siProduceFrutas`, `siProduceVerduras`, `usuariocc`) VALUES
(123, '321', 'LUIS ENRIQUE', 124, 12000, 'luis z', 'felix', 'colombia', 'bolivar', 'arjona', 0, 0, 0, 0, 142412);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `fincas`
--
ALTER TABLE `fincas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuariocc` (`usuariocc`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `fincas`
--
ALTER TABLE `fincas`
  ADD CONSTRAINT `fincas_ibfk_1` FOREIGN KEY (`usuariocc`) REFERENCES `usuarios` (`cc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;```
