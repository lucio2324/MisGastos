-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-11-2017 a las 01:52:57
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `A-ControlCash`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `id` int(11) NOT NULL,
  `tipoGasto` varchar(40) NOT NULL,
  `descripcion` varchar(75) NOT NULL,
  `valorGasto` int(11) NOT NULL,
  `fechaGasto` varchar(10) NOT NULL,
  `idUsuario` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `gastos`
--

INSERT INTO `gastos` (`id`, `tipoGasto`, `descripcion`, `valorGasto`, `fechaGasto`, `idUsuario`) VALUES
(20, 'Medicos', 'ibupirac', 623, '01/07/2017', 'alvaro'),
(21, 'Alimentos', 'pizza', 200, '30/07/2017', 'alvaro'),
(22, 'Alimentos', 'banana', 150, '12/07/2017', 'alvaro'),
(24, 'Alimentos', 'papa', 123, '14/07/2017', 'pablo'),
(25, 'Transporte', 'colectivo', 145, '15/07/2017', 'pablo'),
(26, 'Alimentos', 'Compra con Tarjeta Banco Provincia', 1500, '11/07/2017', 'pablo'),
(27, 'Transporte', 'Nafta', 500, '14/07/2017', 'diego'),
(29, 'Entretenimiento', 'cine', 100, '03/11/2017', 'alvaro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

CREATE TABLE `ingresos` (
  `id` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `fechaIngreso` varchar(10) NOT NULL,
  `idUsuario` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ingresos`
--

INSERT INTO `ingresos` (`id`, `valor`, `fechaIngreso`, `idUsuario`) VALUES
(85, 455, '2017/5/23', 'lucio'),
(88, 300, '2017/5/23', 'lucio'),
(92, 243, '2017/5/23', 'lucio'),
(93, 45, '2017/5/23', 'lucio'),
(94, 45, '2017/5/23', 'lucio'),
(97, 16, '2017/5/29', 'alvaro'),
(112, 456, '2017/6/14', 'pablo'),
(117, 800, '2017/6/14', 'pablo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nombre` varchar(40) NOT NULL,
  `contrasena` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre`, `contrasena`) VALUES
('alvaro', 'alvaro'),
('alvaro12', 'alvaro12'),
('diego', '1234'),
('german', 'german'),
('lucio', 'lucio'),
('pablo', 'pablo'),
('sergio112', 'sergio12');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD CONSTRAINT `gastos_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD CONSTRAINT `ingresos_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
