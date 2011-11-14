-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-11-2011 a las 23:29:20
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `chompasalpaca`
--
CREATE DATABASE `chompasalpaca` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `chompasalpaca`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `pedidoId` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `productoId` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`pedidoId`),
  KEY `pedido_productoId_fk` (`productoId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`pedidoId`, `fecha`, `cantidad`, `productoId`, `estado`) VALUES
(1, '2011-11-11', 100, 2, 1),
(2, '2011-11-11', 180, 4, 1),
(3, '2011-11-11', 150, 5, 1),
(4, '2011-11-11', 200, 6, 1),
(5, '2011-11-11', 100, 3, 1),
(6, '2011-11-11', 180, 4, 1),
(7, '2011-11-11', 180, 4, 1),
(8, '2011-11-11', 200, 6, 1),
(9, '2011-11-11', 100, 3, 1),
(10, '2011-11-11', 200, 6, 1),
(11, '2011-11-11', 180, 4, 1),
(12, '2011-11-11', 150, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `productoId` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `insumo` varchar(11) NOT NULL,
  `minimo` int(11) NOT NULL,
  `cantidadPedido` int(11) NOT NULL,
  PRIMARY KEY (`productoId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`productoId`, `nombre`, `cantidad`, `insumo`, `minimo`, `cantidadPedido`) VALUES
(1, 'Office', 200, 'Classic', 100, 200),
(2, 'Mid Season', 150, 'Modern', 80, 100),
(3, 'Holmes', 160, 'Classic', 80, 100),
(4, 'Gigardo', 210, 'Elegant', 120, 180),
(5, 'Anton', 180, 'Classic', 100, 150),
(6, 'L''Blanc', 200, 'Elegant', 150, 200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `usuarioId` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) NOT NULL,
  `contrasena` varchar(10) NOT NULL,
  PRIMARY KEY (`usuarioId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuarioId`, `usuario`, `contrasena`) VALUES
(1, 'admin', 'admin');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_productoId_fk` FOREIGN KEY (`productoId`) REFERENCES `producto` (`productoId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
