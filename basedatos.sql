-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-11-2011 a las 04:31:43
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`pedidoId`, `fecha`, `cantidad`, `productoId`, `estado`) VALUES
(1, '2011-11-11', 200, 1, 1),
(2, '2011-11-11', 200, 1, 1),
(3, '2011-11-11', 200, 1, 1),
(4, '2011-11-11', 200, 1, 1),
(5, '2011-11-11', 200, 1, 1),
(6, '2011-11-11', 200, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `productoId` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `insumo` varchar(11) NOT NULL,
  `minimo` int(11) NOT NULL,
  `cantidadPedido` int(11) NOT NULL,
  PRIMARY KEY (`productoId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `producto`
--

INSERT INTO `producto` (`productoId`, `nombre`, `cantidad`, `insumo`, `minimo`, `cantidadPedido`) VALUES
(1, 'Office', 299, 'Classic', 100, 200),
(2, 'Mid Season', 80, 'Modern', 80, 100),
(3, 'Holmes', 90, 'Classic', 80, 100),
(4, 'Gigardo', 180, 'Elegant', 120, 180),
(5, 'Anton', 150, 'Classic', 100, 150),
(6, 'L''Blanc', 200, 'Elegant', 150, 200);
