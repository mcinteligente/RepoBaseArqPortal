-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-08-2015 a las 15:40:57
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `database_example`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `px_thematics`
--

CREATE TABLE IF NOT EXISTS `px_thematics` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `slug` tinytext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `px_thematics`
--

INSERT INTO `px_thematics` (`id`, `name`, `slug`) VALUES
(1, 'Educación', 'educacion'),
(2, 'Desarollo', 'desarollo'),
(3, 'Medellín', 'medellin'),
(4, 'Marketing Digital', 'marketing-digital');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `px_thematics`
--
ALTER TABLE `px_thematics`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `px_thematics`
--
ALTER TABLE `px_thematics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
