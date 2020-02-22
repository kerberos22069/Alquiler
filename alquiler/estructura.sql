-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-02-2020 a las 00:16:58
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
-- Estructura de tabla para la tabla `pagos_fletes`
--

CREATE TABLE `pagos_fletes` (
  `idpagos_fletes` int(11) NOT NULL,
  `fecha_pagos_fletes` date DEFAULT NULL,
  `descripcion_pagos_fletes` text DEFAULT NULL,
  `total_pagos_fletes` varchar(45) DEFAULT NULL,
  `pagos_flet_reg` timestamp NULL DEFAULT NULL,
  `choferes_idchoferes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pagos_fletes`
--
ALTER TABLE `pagos_fletes`
  ADD PRIMARY KEY (`idpagos_fletes`),
  ADD KEY `fk_pagos_fletes_choferes1_idx` (`choferes_idchoferes`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pagos_fletes`
--
ALTER TABLE `pagos_fletes`
  MODIFY `idpagos_fletes` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
