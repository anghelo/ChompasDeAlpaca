﻿-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-11-2011 a las 16:37:30
-- Versión del servidor: 5.1.37
-- Versión de PHP: 5.3.0

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
-- Estructura de tabla para la tabla `insumo`
--
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `pedidoId` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `productoId` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`pedidoId`),
  KEY `pedido_productoId_fk` (`productoId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `pedido`
--


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
-- Volcar la base de datos para la tabla `producto`
--

INSERT INTO `producto` (`productoId`, `nombre`, `cantidad`, `insumo`, `minimo`, `cantidadPedido`) VALUES
(1, 'Office', 200, 'Classic', 100, 200),
(2, 'Mid Season', 100, 'Modern', 80, 100),
(3, 'Holmes', 100, 'Classic', 80, 100),
(4, 'Gigardo', 180, 'Elegant', 120, 180),
(5, 'Anton', 150, 'Classic', 100, 150),
(6, 'L''Blanc', 200, 'Elegant', 150, 200);

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_productoId_fk` FOREIGN KEY (`productoId`) REFERENCES `producto` (`productoId`);

--
-- Filtros para la tabla `producto`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
