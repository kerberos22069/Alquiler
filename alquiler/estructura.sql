-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-02-2020 a las 15:03:32
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
  `alq_devuelto` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `choferes`
--

CREATE TABLE `choferes` (
  `idchoferes` int(11) NOT NULL,
  `cc_chofer` varchar(45) NOT NULL,
  `nom_chofer` varchar(250) NOT NULL,
  `chofe_telefono` varchar(30) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `stado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `clientebyfacturaselect`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `clientebyfacturaselect` (
`idfactura` int(11)
,`fecha` datetime
,`fac_descueto` int(11)
,`cliente_idcliente` int(11)
,`abonos` text
,`estado` tinyint(4)
,`cliente_cc` varchar(15)
,`cliente_nombre` varchar(45)
);

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
  `estado` tinyint(4) DEFAULT NULL,
  `fact_observacion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'TABLERO INDUSTRIAL', '1.20 cm x 0.60 cm', 350, 5, 541, 5212, 554, 0, 7),
(2, 'TABLERO INDUSTRIAL', '1.20 cm x 0.50 cm', 350, 100, 34, 0, 0, 1, 7),
(3, 'TABLERO INDUSTRIAL', '1.20 cm x 0.40 cm', 350, 88, 12, 6, 6, 1, 7),
(4, 'TABLERO INDUSTRIAL', '1.20 cm x 0.30 cm', 300, 84, 16, 0, 0, 1, 7),
(5, 'TABLERO INDUSTRIAL', '1.20 cm x 0.20 cm', 300, 95, 5, 2, 2, 1, 7),
(6, 'TABLERO INDUSTRIAL', '1.20 cm x 0.10 cm', 250, 100, 5, 1, 1, 1, 7),
(7, 'ESQUINEROS', '1.20 cm x 0.20 cm x 0.20 cm', 70, 100, 2, 0, 0, 1, 7),
(8, 'ANGULOS', '1.20', 250, 97, 5, 0, 0, 1, 7),
(9, 'CHAPETAS', '', 15, 97, 6, 0, 0, 1, 7),
(10, 'MORDAZAS', '', 15, -1, 1, 0, 0, 1, 7),
(11, 'PINES', '', 15, -3, 3, 0, 0, 1, 7),
(12, 'CORBATAS', '', 15, -8, 8, 0, 0, 1, 7),
(13, 'FORMALETAS INDUSTRIAL', 'M2 (5 CHAPETAS)', 650, -12, 12, 0, 0, 1, 7),
(14, 'FORMALETAS INDUSTRIAL', 'M2 (5 CHAPETAS 1, CHERCA, 1PARAL)', 800, NULL, NULL, NULL, NULL, 1, 7);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `reporte_chofer`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `reporte_chofer` (
`idtransporte` int(11)
,`fecha` datetime
,`factura_idfactura` int(11)
,`cliente_nombre` varchar(45)
,`idchoferes` int(11)
,`cc_chofer` varchar(45)
,`nom_chofer` varchar(250)
,`valor` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `reporte_ordenes`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `reporte_ordenes` (
`fecha` datetime
,`idfactura` int(11)
,`cliente_cc` varchar(15)
,`cliente_nombre` varchar(45)
,`fact_observacion` text
,`estado` tinyint(4)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporte`
--

CREATE TABLE `transporte` (
  `idtransporte` int(11) NOT NULL,
  `transporte_flete` int(11) DEFAULT '0',
  `factura_idfactura` int(11) NOT NULL,
  `transporte_conductor` varchar(45) DEFAULT NULL,
  `choferes_idchoferes` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura para la vista `clientebyfacturaselect`
--
DROP TABLE IF EXISTS `clientebyfacturaselect`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `clientebyfacturaselect`  AS  select `factura`.`idfactura` AS `idfactura`,`factura`.`fecha` AS `fecha`,`factura`.`fac_descueto` AS `fac_descueto`,`factura`.`cliente_idcliente` AS `cliente_idcliente`,`factura`.`abonos` AS `abonos`,`factura`.`estado` AS `estado`,`cliente`.`cliente_cc` AS `cliente_cc`,`cliente`.`cliente_nombre` AS `cliente_nombre` from (`factura` join `cliente` on((`cliente`.`idcliente` = `factura`.`cliente_idcliente`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `reporte_chofer`
--
DROP TABLE IF EXISTS `reporte_chofer`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reporte_chofer`  AS  select `transporte`.`idtransporte` AS `idtransporte`,`factura`.`fecha` AS `fecha`,`transporte`.`factura_idfactura` AS `factura_idfactura`,`cliente`.`cliente_nombre` AS `cliente_nombre`,`choferes`.`idchoferes` AS `idchoferes`,`choferes`.`cc_chofer` AS `cc_chofer`,`choferes`.`nom_chofer` AS `nom_chofer`,`transporte`.`transporte_flete` AS `valor` from (((`transporte` join `factura` on((`transporte`.`factura_idfactura` = `factura`.`idfactura`))) join `cliente` on((`cliente`.`idcliente` = `factura`.`cliente_idcliente`))) join `choferes` on((`choferes`.`idchoferes` = `transporte`.`choferes_idchoferes`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `reporte_ordenes`
--
DROP TABLE IF EXISTS `reporte_ordenes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reporte_ordenes`  AS  select `factura`.`fecha` AS `fecha`,`factura`.`idfactura` AS `idfactura`,`cliente`.`cliente_cc` AS `cliente_cc`,`cliente`.`cliente_nombre` AS `cliente_nombre`,`factura`.`fact_observacion` AS `fact_observacion`,`factura`.`estado` AS `estado` from (`factura` join `cliente` on((`cliente`.`idcliente` = `factura`.`cliente_idcliente`))) ;

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
-- Indices de la tabla `choferes`
--
ALTER TABLE `choferes`
  ADD PRIMARY KEY (`idchoferes`);

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
  ADD KEY `fk_transporte_factura1_idx` (`factura_idfactura`),
  ADD KEY `fk_transporte_choferes1_idx` (`choferes_idchoferes`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  MODIFY `idalquiler` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `choferes`
--
ALTER TABLE `choferes`
  MODIFY `idchoferes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idprod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `transporte`
--
ALTER TABLE `transporte`
  MODIFY `idtransporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `fk_factura_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `transporte`
--
ALTER TABLE `transporte`
  ADD CONSTRAINT `fk_transporte_choferes1` FOREIGN KEY (`choferes_idchoferes`) REFERENCES `choferes` (`idchoferes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transporte_factura1` FOREIGN KEY (`factura_idfactura`) REFERENCES `factura` (`idfactura`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
