SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `bd_aaq` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `bd_aaq` ;

-- -----------------------------------------------------
-- Table `bd_aaq`.`cliente_factura`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bd_aaq`.`cliente_factura` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre_cliente` VARCHAR(256) NOT NULL ,
  `rfc` VARCHAR(16) NULL ,
  `direccion` VARCHAR(256) NULL ,
  `telefono` VARCHAR(12) NULL ,
  `colonia` VARCHAR(128) NULL ,
  `cp` VARCHAR(5) NULL ,
  `ciudad` VARCHAR(128) NULL ,
  `estado` VARCHAR(128) NULL COMMENT 'Tabla de clientes de facturación. ' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_aaq`.`factura`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bd_aaq`.`factura` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `cliente_factura_id` INT NOT NULL ,
  `fecha_factura` DATE NOT NULL ,
  `lugar_expedicion` VARCHAR(128) NOT NULL ,
  `cantidad_total_letra` VARCHAR(512) NULL ,
  `pago_mensual` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_factura_cliente_factura1` (`cliente_factura_id` ASC) ,
  CONSTRAINT `fk_factura_cliente_factura1`
    FOREIGN KEY (`cliente_factura_id` )
    REFERENCES `bd_aaq`.`cliente_factura` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_aaq`.`cliente_cotizacion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bd_aaq`.`cliente_cotizacion` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre_cliente` VARCHAR(256) NULL ,
  `nombre_empresa` VARCHAR(256) NULL ,
  `telefono` VARCHAR(12) NULL ,
  `direccion` VARCHAR(256) NULL ,
  `ciudad` VARCHAR(256) NULL ,
  `cp` VARCHAR(5) NULL ,
  `estado` VARCHAR(128) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_aaq`.`detalle_factura`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bd_aaq`.`detalle_factura` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `factura_id` INT NOT NULL ,
  `cantidad_servicios` VARCHAR(8) NOT NULL ,
  `clave_servicio` VARCHAR(16) NOT NULL ,
  `descripcion_servicio` TEXT NOT NULL ,
  `precio_servicio` FLOAT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_detalle_factura_factura1` (`factura_id` ASC) ,
  CONSTRAINT `fk_detalle_factura_factura1`
    FOREIGN KEY (`factura_id` )
    REFERENCES `bd_aaq`.`factura` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_aaq`.`cotizacion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bd_aaq`.`cotizacion` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `cliente_cotizacion_id` INT NOT NULL ,
  `fecha_cotizacion` DATE NOT NULL ,
  `tiempo_entrega` VARCHAR(256) NULL ,
  `forma_pago` VARCHAR(256) NULL ,
  `garantia` VARCHAR(128) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_cotizacion_cliente_cotizacion1` (`cliente_cotizacion_id` ASC) ,
  CONSTRAINT `fk_cotizacion_cliente_cotizacion1`
    FOREIGN KEY (`cliente_cotizacion_id` )
    REFERENCES `bd_aaq`.`cliente_cotizacion` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_aaq`.`detalles_cotizacion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bd_aaq`.`detalles_cotizacion` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `cotizacion_id` INT NOT NULL ,
  `cantidad_servicio` VARCHAR(8) NOT NULL ,
  `clave` VARCHAR(64) NOT NULL ,
  `descripcion` TEXT NOT NULL ,
  `precio_servicio` INT NOT NULL ,
  INDEX `fk_detalles_cotizacion_cotizacion1` (`cotizacion_id` ASC) ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_detalles_cotizacion_cotizacion1`
    FOREIGN KEY (`cotizacion_id` )
    REFERENCES `bd_aaq`.`cotizacion` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
