-- -----------------------------------------------------
-- Table `producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `producto` (
  `producto_id` INT(11) NOT NULL AUTO_INCREMENT,
  `producto_nombre` VARCHAR(45) NOT NULL,
  `producto_descripcion` TINYTEXT NULL DEFAULT NULL,
  `producto_precio` DECIMAL NOT NULL DEFAULT 0.0 COMMENT 'El costo de alquilar este producto por un dia.',
  `producto_stock` INT NULL DEFAULT 0 COMMENT 'Indica la cantidad de productos totales sin importar el estado en que se encuentren.',
  `producto_disponible` INT NULL DEFAULT 0 COMMENT 'Indica la cantidad de productos disponibles para alquilar a los clientes.',
  `producto_reparacion` INT NULL DEFAULT 0 COMMENT 'Indica la cantida de productos que se encuentran en proceso de reparacion.',
  `producto_danado` INT NULL DEFAULT 0 COMMENT 'Indica la cantidad de productos que se encuentran danados e inutilizables.',
  PRIMARY KEY (`producto_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cliente` (
  `cliente_id` INT(11) NOT NULL,
  `cliente_nombre` VARCHAR(45) NULL DEFAULT NULL,
  `cliente_apellido` VARCHAR(45) NULL DEFAULT NULL,
  `cliente_cc` VARCHAR(45) NULL DEFAULT NULL,
  `cliente_correo` VARCHAR(45) NULL DEFAULT NULL,
  `cliente_direccion` TINYTEXT NULL DEFAULT NULL,
  PRIMARY KEY (`cliente_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `factura`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `factura` (
  `factura_id` INT(11) NOT NULL,
  `factura_fecha` DATETIME NULL DEFAULT NULL COMMENT 'Es la fecha en que se genero el corte de la factura. Al principio es null, pero una vez se haya decidido cerrarla se inserta la fecha.',
  `factura_descuento` DECIMAL NULL DEFAULT 0.0 COMMENT 'Representa el porcentaje total de descuento que se aplicara a la factura total. Por defecto este campo iniciara en 0.0',
  `cliente_cliente_id` INT(11) NOT NULL,
  PRIMARY KEY (`factura_id`),
  INDEX `fk_factura_cliente1_idx` (`cliente_cliente_id` ASC) VISIBLE,
  CONSTRAINT `fk_factura_cliente1`
    FOREIGN KEY (`cliente_cliente_id`)
    REFERENCES `cliente` (`cliente_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `alquiler`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `alquiler` (
  `alquiler_id` INT(11) NOT NULL,
  `alquiler_fecha_inicio` DATETIME NOT NULL COMMENT 'Representa el momento en que se decidio alquilar el producto ',
  `alquiler_cantidad` INT NOT NULL DEFAULT 1 COMMENT 'Indica la cantidad de objetos que decidieron alquilarse del producto relacionado con esta misma fila.',
  `alquiler_valor` DECIMAL NOT NULL COMMENT 'Representa el coste total del alquiler para el producto relacionado con esta fila. Cabe recordar que este precio no esta atado al precio real del producto, lo cual significa que valor indicado en este campo se calculara externamente. No conservamos el porcentaje de cambio aplicado.',
  `alquiler_pagado` TINYINT NOT NULL DEFAULT 0 COMMENT 'Indica si el costo total del alquiler ha sido pagado en su totalidad. En ningun momento se tienen en cuenta abonos o cualquier otro adelanto.',
  `alquiler_fecha_fin` DATETIME NULL DEFAULT NULL COMMENT 'Indica la fecha de reposicion total o parcial del producto; es decir, el último momento en que entregaron \'n\' cantidad de productos alquilados.',
  `alquiler_cantidad_devolucion` INT NOT NULL DEFAULT 0 COMMENT 'Representa la cantidad de productos que se han devuelto. ',
  `producto_id` INT(11) NOT NULL,
  `factura_id` INT(11) NOT NULL,
  PRIMARY KEY (`alquiler_id`),
  INDEX `fk_alquiler_producto1_idx` (`producto_id` ASC) VISIBLE,
  INDEX `fk_alquiler_factura1_idx` (`factura_id` ASC) VISIBLE,
  CONSTRAINT `fk_alquiler_producto1`
    FOREIGN KEY (`producto_id`)
    REFERENCES `producto` (`producto_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alquiler_factura1`
    FOREIGN KEY (`factura_id`)
    REFERENCES `factura` (`factura_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `transporte`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `transporte` (
  `transporte_id` INT NOT NULL,
  `transporte_flete` DECIMAL NOT NULL DEFAULT 0.0 COMMENT 'Indica el costo de un viaje toral por parte del conductor. El viaje es independiente del producto alquilado; eso significa que, el precio indicado representa un costo total determinado de forma externa. El precio no lo controlamos nosotros.',
  `transporte_conductor` VARCHAR(100) NOT NULL COMMENT 'Representa el nombre del conductor responsable de un tranporte.',
  `factura_factura_id` INT(11) NOT NULL,
  PRIMARY KEY (`transporte_id`),
  INDEX `fk_transporte_factura1_idx` (`factura_factura_id` ASC) VISIBLE,
  CONSTRAINT `fk_transporte_factura1`
    FOREIGN KEY (`factura_factura_id`)
    REFERENCES `factura` (`factura_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
