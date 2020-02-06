-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-02-2020 a las 18:26:00
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alquiler`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquiler`
--

CREATE TABLE `alquiler` (
  `idalquiler` int(11) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT '1',
  `valor` int(11) NOT NULL,
  `pagado` tinyint(4) NOT NULL DEFAULT '0',
  `fechafin` date DEFAULT NULL,
  `producto_idprod` int(11) NOT NULL,
  `factura_idfactura` int(11) NOT NULL,
  `alq_stado` int(11) DEFAULT NULL,
  `alq_devuelto` text COMMENT 'Contiene el json con la informacion de las devoluciones'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alquiler`
--

INSERT INTO `alquiler` (`idalquiler`, `fecha_inicio`, `cantidad`, `valor`, `pagado`, `fechafin`, `producto_idprod`, `factura_idfactura`, `alq_stado`, `alq_devuelto`) VALUES
(17, '2020-01-01 09:14:56', 0, 544, 0, '2020-01-11', 5, 1, 0, '[{\"fecha\":\"2020-01-11 09:29:35\",\"cantidad\":\"2\",\"estado\":0}]'),
(18, '2020-01-01 09:14:56', 0, 1000, 0, '2020-01-11', 3, 1, 0, '[{\"fecha\":\"2020-01-04 09:17:47\",\"cantidad\":\"3\",\"estado\":\"0\"},{\"fecha\":\"2020-01-11 09:35:56\",\"cantidad\":\"2\",\"estado\":0}]'),
(19, '2020-01-31 11:50:00', 1, 14, 0, NULL, 6, 2, 0, '[]'),
(20, '2020-01-31 11:50:00', 3, 544, 0, NULL, 5, 2, 0, '[]'),
(21, '2020-01-31 11:50:00', 3, 330, 0, NULL, 4, 2, 0, '[]'),
(22, '2020-01-31 11:50:00', 3, 5, 0, NULL, 2, 2, 0, '[]'),
(23, '2020-01-31 11:50:00', 3, 1000, 0, NULL, 3, 2, 0, '[]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `cliente_nombre` varchar(45) DEFAULT NULL,
  `cliente_apellido` varchar(45) DEFAULT NULL,
  `cliente_cc` varchar(15) DEFAULT NULL,
  `cliente_correo` varchar(45) DEFAULT NULL,
  `cliente_telefono` varchar(25) NOT NULL,
  `cliente_direccion` varchar(45) DEFAULT NULL,
  `cliente_stado` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idcliente`, `cliente_nombre`, `cliente_apellido`, `cliente_cc`, `cliente_correo`, `cliente_telefono`, `cliente_direccion`, `cliente_stado`) VALUES
(1, 'Poncho', 'Martinez', '1234', 'asdasd@asdas.com', '520', 'asdasd adasdas', 0),
(2, 'Diego', 'Ilario', '12345', 'eswasa@gmasd.com', '5412541', 'asasdas asd asd as das d as', 0),
(3, 'Edward', 'Martinez', '214234235235', 'dasdasd@gmail.com', '3168274086', '540006zxvzczxc', 0),
(4, 'fredy paolo', 'jaramillo', '12345687', 'fredyjaramillo@gmail.com', '3168274086', 'av 3 25 65 brr san mateo', 1),
(5, 'Ponchito', 'Martinelli', '1234', 'ponchito@NC.com', '33233545', 'La modelo', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idfactura` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `fac_descueto` int(11) NOT NULL DEFAULT '0',
  `cliente_idcliente` int(11) NOT NULL,
  `abonos` text,
  `estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`idfactura`, `fecha`, `fac_descueto`, `cliente_idcliente`, `abonos`, `estado`) VALUES
(1, '2020-01-01 09:14:56', 500, 2, '[{\"fecha\":\"2020-01-05 09:19:13\",\"cantidad\":\"2000\"},{\"fecha\":\"2020-01-30 10:26:57\",\"cantidad\":\"15000\"}]', NULL),
(2, '2020-01-31 11:50:00', 5000, 2, '[]', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idprod` int(11) NOT NULL,
  `prod_nombre` varchar(45) NOT NULL,
  `prod_descripcion` varchar(250) DEFAULT NULL,
  `prod_precio` int(11) DEFAULT NULL,
  `prod_stock` int(11) DEFAULT NULL,
  `prod_alquilado` int(11) DEFAULT NULL,
  `prod_reparacion` int(11) DEFAULT NULL,
  `prod_danado` int(11) DEFAULT NULL,
  `prod_stado` int(11) NOT NULL DEFAULT '1',
  `foto` int(10) NOT NULL DEFAULT '7'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idprod`, `prod_nombre`, `prod_descripcion`, `prod_precio`, `prod_stock`, `prod_alquilado`, `prod_reparacion`, `prod_danado`, `prod_stado`, `foto`) VALUES
(1, 'asdasda', '84s5d4fsdf', 14, 5, 541, 5212, 554, 0, 7),
(2, 'zxczczx', 'sdfsdfsdfsdf', 5, 17, 13, 0, 0, 1, 7),
(3, 'cruceta', 'grande', 1000, 92, 8, 6, 6, 1, 7),
(4, 'Formaleta', 'Un cuadrado de metal sin valor', 330, 97, 3, 0, 0, 1, 7),
(5, 'Estructura', 'dfgdfgfdg', 544, 97, 3, 2, 2, 1, 7),
(6, 'asdasd', 'asdsad', 14, 0, 2, 1, 1, 1, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporte`
--

CREATE TABLE `transporte` (
  `idtransporte` int(11) NOT NULL,
  `transporte_flete` int(11) DEFAULT '0',
  `factura_idfactura` int(11) NOT NULL,
  `transporte_conductor` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `transporte`
--

INSERT INTO `transporte` (`idtransporte`, `transporte_flete`, `factura_idfactura`, `transporte_conductor`) VALUES
(3, 1000, 1, 'Chofer 2'),
(4, 20000, 2, 'Chofer 1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  ADD PRIMARY KEY (`idalquiler`),
  ADD KEY `fk_alquiler_producto1_idx` (`producto_idprod`),
  ADD KEY `fk_alquiler_factura1_idx` (`factura_idfactura`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idfactura`),
  ADD KEY `fk_factura_cliente1_idx` (`cliente_idcliente`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idprod`);

--
-- Indices de la tabla `transporte`
--
ALTER TABLE `transporte`
  ADD PRIMARY KEY (`idtransporte`),
  ADD KEY `fk_transporte_factura1_idx` (`factura_idfactura`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  MODIFY `idalquiler` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idprod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `transporte`
--
ALTER TABLE `transporte`
  MODIFY `idtransporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alquiler`
--
ALTER TABLE `alquiler`
  ADD CONSTRAINT `fk_alquiler_factura1` FOREIGN KEY (`factura_idfactura`) REFERENCES `factura` (`idfactura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_alquiler_producto1` FOREIGN KEY (`producto_idprod`) REFERENCES `producto` (`idprod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `fk_factura_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `transporte`
--
ALTER TABLE `transporte`
  ADD CONSTRAINT `fk_transporte_factura1` FOREIGN KEY (`factura_idfactura`) REFERENCES `factura` (`idfactura`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
