-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-09-2022 a las 02:13:07
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coment`
--

CREATE TABLE `coment` (
  `id` int(11) NOT NULL,
  `paciente_id` int(20) NOT NULL,
  `especialidad` varchar(50) NOT NULL,
  `comentario` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `coment`
--

INSERT INTO `coment` (`id`, `paciente_id`, `especialidad`, `comentario`, `date`) VALUES
(1, 2, 'Cardiologia', 'Al paciente le pasó tal tal tal', '2022-07-04 12:22:45'),
(2, 23, 'Cardiologia', 'Al paciente 2 tanto', '2022-07-04 12:23:48'),
(5, 2, 'General', 'Y después esto esto y esto', '2022-07-04 12:26:26'),
(6, 2, 'Clinico', 'Dolor agudo de 3 dias de evolucion', '2022-07-04 18:10:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `dni` bigint(15) NOT NULL,
  `fecha_nac` date NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `hc` varchar(50) NOT NULL,
  `cobertura` varchar(15) NOT NULL,
  `tel` bigint(15) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `grupo_sanguineo` varchar(4) NOT NULL,
  `RH` varchar(20) NOT NULL,
  `frecuencia_card` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `nombre`, `apellido`, `dni`, `fecha_nac`, `sexo`, `hc`, `cobertura`, `tel`, `direccion`, `grupo_sanguineo`, `RH`, `frecuencia_card`) VALUES
(1, 'Cristian', 'Lopez', 33, '2022-06-14', 'Hombre', '', '', 341293485, 'Savio 671', '0+ ', '', 0),
(2, 'Jordi', 'Wild', 3, '2022-06-05', 'Youtuber', '', '', 1627828163, 'Internet', '', '', 0),
(3, '', '', 0, '0000-00-00', '', '', '', 0, '', '', '', 0),
(4, '', '', 0, '0000-00-00', '', '', '', 0, '', '', '', 0),
(5, 'Juan', 'd', 111, '0000-00-00', '', '', '', 0, '', '', '', 0),
(6, 'Juancito', 'Perez', 40009, '1987-01-30', 'masculino', '', '', 3364852356, 'Savio 671', '', '', 0),
(7, 'Juan Facundo ', 'Gardella', 0, '0000-00-00', 'Hombre', '', '', 0, 'Instituto n° 38', '', '', 0),
(8, 'Luciana ', 'Manetta', 0, '0000-00-00', 'Mujer', '', '', 0, 'Instituto n° 38', '0+', '', 0),
(9, 'Juan Facundo ', 'Gardella', 0, '0000-00-00', 'Hombre', '', '', 0, 'Instituto n° 38', '', '', 0),
(10, 'Luciana ', 'Manetta', 0, '0000-00-00', 'Mujer', '', '', 0, 'Instituto n° 38', '0+', '', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `coment`
--
ALTER TABLE `coment`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `coment`
--
ALTER TABLE `coment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
