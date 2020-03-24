-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 24-03-2020 a las 17:19:20
-- Versión del servidor: 5.7.29-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `MotorBikes`
--

-- --------------------------------------------------------

create database MotorBikes;

--
-- Estructura de tabla para la tabla `Cliente`
--

CREATE TABLE `Cliente` (
  `documento` varchar(15) NOT NULL,
  `Nombre` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Cliente`
--

INSERT INTO `Cliente` (`documento`, `Nombre`) VALUES
('1001053835', 'jairo'),
('10234893', 'jairo'),
('231342', '321'),
('432414', '4213'),
('432432', '12341'),
('6534', 'fdsaf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Motos`
--

CREATE TABLE `Motos` (
  `placa` varchar(100) NOT NULL,
  `documento` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Motos`
--

INSERT INTO `Motos` (`placa`, `documento`) VALUES
('3331887', '1001053835'),
('483fdnskj9', '1001053835'),
('ION18D', '1001053835');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Repuestos`
--

CREATE TABLE `Repuestos` (
  `idRepuesto` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `stock` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Repuestos`
--

INSERT INTO `Repuestos` (`idRepuesto`, `nombre`, `stock`) VALUES
(76, 'Exosto', 28),
(213, 'Parte 11', 135),
(231, 'Parte 2', 112),
(322, 'fdsaf', 1227),
(654, 'hjkgh', 112);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Servicio`
--

CREATE TABLE `Servicio` (
  `idServicio` varchar(100) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `documentoE` varchar(15) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fechaEntrega` varchar(15) NOT NULL,
  `precio` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Servicio`
--

INSERT INTO `Servicio` (`idServicio`, `placa`, `documentoE`, `descripcion`, `fechaEntrega`, `precio`) VALUES
('1233', 'ION18D', '1030585983', 'fdsafdsafdsafdsavdsvdss', '2020-03-31', 123313232),
('150', 'ION18D', '1030585983', 'problemas con el exosto', '2020-03-28', 1000000),
('321', 'ION18D', '1030585983', 'Falla en la rueda', '2020-03-25', 332452),
('432', 'ION18D', '1030585983', 'fhdsjkahf', '2020-03-27', 143233),
('432432', 'ION18D', '1030585983', 'fdsafdsa', '2020-03-19', 32423),
('56', 'ION18D', '1030585983', 'Falla en el vehiculo', '2020-04-02', 2300000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tecnico`
--

CREATE TABLE `Tecnico` (
  `documentoE` varchar(15) NOT NULL,
  `nombre` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Tecnico`
--

INSERT INTO `Tecnico` (`documentoE`, `nombre`) VALUES
('1030585983', 'Jose'),
('195455', 'Miguel');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Cliente`
--
ALTER TABLE `Cliente`
  ADD PRIMARY KEY (`documento`);

--
-- Indices de la tabla `Motos`
--
ALTER TABLE `Motos`
  ADD PRIMARY KEY (`placa`),
  ADD KEY `documento` (`documento`);

--
-- Indices de la tabla `Repuestos`
--
ALTER TABLE `Repuestos`
  ADD PRIMARY KEY (`idRepuesto`);

--
-- Indices de la tabla `Servicio`
--
ALTER TABLE `Servicio`
  ADD PRIMARY KEY (`idServicio`),
  ADD KEY `Servicio` (`placa`),
  ADD KEY `documentoE` (`documentoE`);

--
-- Indices de la tabla `Tecnico`
--
ALTER TABLE `Tecnico`
  ADD PRIMARY KEY (`documentoE`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Motos`
--
ALTER TABLE `Motos`
  ADD CONSTRAINT `documento` FOREIGN KEY (`documento`) REFERENCES `Cliente` (`documento`);

--
-- Filtros para la tabla `Servicio`
--
ALTER TABLE `Servicio`
  ADD CONSTRAINT `Servicio` FOREIGN KEY (`placa`) REFERENCES `Motos` (`placa`),
  ADD CONSTRAINT `documentoE` FOREIGN KEY (`documentoE`) REFERENCES `Tecnico` (`documentoE`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
