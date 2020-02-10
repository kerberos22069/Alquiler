-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-02-2020 a las 00:13:18
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

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
  `cantidad` int(11) NOT NULL DEFAULT 1,
  `valor` int(11) NOT NULL,
  `pagado` tinyint(4) NOT NULL DEFAULT 0,
  `fechafin` date DEFAULT NULL,
  `producto_idprod` int(11) NOT NULL,
  `factura_idfactura` int(11) NOT NULL,
  `alq_stado` int(11) DEFAULT NULL,
  `alq_devuelto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alquiler`
--

INSERT INTO `alquiler` (`idalquiler`, `fecha_inicio`, `cantidad`, `valor`, `pagado`, `fechafin`, `producto_idprod`, `factura_idfactura`, `alq_stado`, `alq_devuelto`) VALUES
(17, '2020-01-01 09:14:56', 20, 544, 0, '2020-01-11', 5, 1, 0, '[{\"fecha\":\"2020-01-11 09:29:35\",\"cantidad\":\"2\",\"estado\":0}]'),
(18, '2020-01-01 09:14:56', 10, 1000, 0, '2020-01-11', 3, 1, 0, '[{\"fecha\":\"2020-01-04 09:17:47\",\"cantidad\":\"3\",\"estado\":\"0\"},{\"fecha\":\"2020-01-11 09:35:56\",\"cantidad\":\"2\",\"estado\":0}]');

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

--
-- Volcado de datos para la tabla `choferes`
--

INSERT INTO `choferes` (`idchoferes`, `cc_chofer`, `nom_chofer`, `chofe_telefono`, `direccion`, `stado`) VALUES
(0, '99999', 'NO REGISTRA', 'NO APLICA', 'NO APLICA', 0),
(1, '1234', 'cristia', '3168274086', 'av 3 25 65 brr san mateosss', 0),
(2, '12312', 'cristia MARTINEZ HERNANDEZ', '3168274086', 'casda asdas  asd', 0);

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
  `cliente_stado` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idcliente`, `cliente_nombre`, `cliente_apellido`, `cliente_cc`, `cliente_correo`, `cliente_telefono`, `cliente_direccion`, `cliente_stado`) VALUES
(1, 'Poncho', 'Martinez', '1234', 'asdasd@asdas.com', '520', 'asdasd adasdas', 0),
(2, 'Diego', 'Ilario', '12345', 'eswasa@gmasd.com', '5412541', 'asasdas asd asd as das d as', 1),
(3, 'Edward', 'Martinez', '214234235235', 'dasdasd@gmail.com', '3168274086', '540006zxvzczxc', 1),
(4, 'fredy paolo', 'jaramillo', '12345687', 'fredyjaramillo@gmail.com', '3168274086', 'av 3 25 65 brr san mateo', 1),
(5, 'Ponchito', 'Martinelli', '1234', 'ponchito@NC.com', '33233545', 'La modelo', 0);

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
  `fac_descueto` int(11) NOT NULL DEFAULT 0,
  `cliente_idcliente` int(11) NOT NULL,
  `abonos` text DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  `fact_observacion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`idfactura`, `fecha`, `fac_descueto`, `cliente_idcliente`, `abonos`, `estado`, `fact_observacion`) VALUES
(1, '2020-01-01 09:14:56', 500, 2, '[{\"fecha\":\"2020-01-05 09:19:13\",\"cantidad\":\"2000\"},{\"fecha\":\"2020-01-30 10:26:57\",\"cantidad\":\"15000\"}]', NULL, ''),
(3, '2020-02-08 17:55:48', 0, 1, '[]', NULL, ''),
(4, '0000-00-00 00:00:00', 0, 4, '[]', NULL, ''),
(5, '0000-00-00 00:00:00', 0, 4, '[]', NULL, ''),
(6, '0000-00-00 00:00:00', 0, 4, '[]', NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro_diario`
--

CREATE TABLE `libro_diario` (
  `idlibro_diario` int(11) NOT NULL
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
  `prod_stado` int(11) NOT NULL DEFAULT 1,
  `foto` int(10) NOT NULL DEFAULT 7
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idprod`, `prod_nombre`, `prod_descripcion`, `prod_precio`, `prod_stock`, `prod_alquilado`, `prod_reparacion`, `prod_danado`, `prod_stado`, `foto`) VALUES
(1, 'asdasda', '84s5d4fsdf', 14, 5, 541, 5212, 554, 0, 7),
(2, 'zxczczx', 'sdfsdfsdfsdf', 5, 20, 10, 0, 0, 1, 7),
(3, 'cruceta', 'grande', 1000, 92, 8, 6, 6, 1, 7),
(4, 'Formaleta', 'Un cuadrado de metal sin valor', 330, 97, 3, 0, 0, 1, 7),
(5, 'Estructura', 'dfgdfgfdg', 544, 99, 1, 2, 2, 1, 7),
(6, 'asdasd', 'asdsad', 14, 1, 1, 1, 1, 1, 7);

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
-- Estructura de tabla para la tabla `transporte`
--

CREATE TABLE `transporte` (
  `idtransporte` int(11) NOT NULL,
  `transporte_flete` int(11) DEFAULT 0,
  `factura_idfactura` int(11) NOT NULL,
  `transporte_conductor` varchar(45) DEFAULT NULL,
  `choferes_idchoferes` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `transporte`
--

INSERT INTO `transporte` (`idtransporte`, `transporte_flete`, `factura_idfactura`, `transporte_conductor`, `choferes_idchoferes`) VALUES
(3, 1000, 1, '1', 1);

-- --------------------------------------------------------

--
-- Estructura para la vista `clientebyfacturaselect`
--
DROP TABLE IF EXISTS `clientebyfacturaselect`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `clientebyfacturaselect`  AS  select `factura`.`idfactura` AS `idfactura`,`factura`.`fecha` AS `fecha`,`factura`.`fac_descueto` AS `fac_descueto`,`factura`.`cliente_idcliente` AS `cliente_idcliente`,`factura`.`abonos` AS `abonos`,`factura`.`estado` AS `estado`,`cliente`.`cliente_cc` AS `cliente_cc`,`cliente`.`cliente_nombre` AS `cliente_nombre` from (`factura` join `cliente` on(`cliente`.`idcliente` = `factura`.`cliente_idcliente`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `reporte_chofer`
--
DROP TABLE IF EXISTS `reporte_chofer`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reporte_chofer`  AS  select `transporte`.`idtransporte` AS `idtransporte`,`factura`.`fecha` AS `fecha`,`transporte`.`factura_idfactura` AS `factura_idfactura`,`cliente`.`cliente_nombre` AS `cliente_nombre`,`choferes`.`idchoferes` AS `idchoferes`,`choferes`.`cc_chofer` AS `cc_chofer`,`choferes`.`nom_chofer` AS `nom_chofer`,`transporte`.`transporte_flete` AS `valor` from (((`transporte` join `factura` on(`transporte`.`factura_idfactura` = `factura`.`idfactura`)) join `cliente` on(`cliente`.`idcliente` = `factura`.`cliente_idcliente`)) join `choferes` on(`choferes`.`idchoferes` = `transporte`.`choferes_idchoferes`)) ;

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
-- Indices de la tabla `libro_diario`
--
ALTER TABLE `libro_diario`
  ADD PRIMARY KEY (`idlibro_diario`);

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
  MODIFY `idalquiler` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `idprod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
