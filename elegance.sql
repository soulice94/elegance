-- MySQL Script generated by MySQL Workbench
-- Tue Apr 24 13:10:18 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema elegance
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema elegance
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `elegance` DEFAULT CHARACTER SET utf8 ;
USE `elegance` ;

-- -----------------------------------------------------
-- Table `elegance`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elegance`.`users` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `paterno` VARCHAR(45) NOT NULL,
  `materno` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `remember_token` VARCHAR(255) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elegance`.`categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elegance`.`categorias` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`ID`));


-- -----------------------------------------------------
-- Table `elegance`.`marcas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elegance`.`marcas` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elegance`.`colors`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elegance`.`colors` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elegance`.`generos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elegance`.`generos` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elegance`.`productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elegance`.`productos` (
  `codigo` VARCHAR(32) NOT NULL,
  `categorias_ID` INT NOT NULL,
  `marcas_ID` INT NOT NULL,
  `colors_ID` INT NOT NULL,
  `generos_ID` INT NOT NULL,
  `nombre` VARCHAR(128) NOT NULL,
  `costo` INT NOT NULL,
  `precio` INT NOT NULL,
  `unidades` INT NOT NULL,
  `descuento` INT NULL,
  `descripcion` VARCHAR(256) NULL,
  `modelo` VARCHAR(32) NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`codigo`, `categorias_ID`, `marcas_ID`, `colors_ID`, `generos_ID`),
  INDEX `fk_productos_categorias1_idx` (`categorias_ID` ASC),
  INDEX `fk_productos_marcas1_idx` (`marcas_ID` ASC),
  INDEX `fk_productos_colors1_idx` (`colors_ID` ASC),
  INDEX `fk_productos_generos1_idx` (`generos_ID` ASC),
  CONSTRAINT `fk_productos_categorias1`
    FOREIGN KEY (`categorias_ID`)
    REFERENCES `elegance`.`categorias` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_productos_marcas1`
    FOREIGN KEY (`marcas_ID`)
    REFERENCES `elegance`.`marcas` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_productos_colors1`
    FOREIGN KEY (`colors_ID`)
    REFERENCES `elegance`.`colors` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_productos_generos1`
    FOREIGN KEY (`generos_ID`)
    REFERENCES `elegance`.`generos` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elegance`.`clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elegance`.`clientes` (
  `celular` VARCHAR(20) NOT NULL,
  `nombre` VARCHAR(70) NOT NULL,
  `paterno` VARCHAR(70) NOT NULL,
  `materno` VARCHAR(70) NOT NULL,
  `email` VARCHAR(70) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`celular`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elegance`.`reparaciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elegance`.`reparaciones` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `entrega` DATETIME NULL,
  `total` INT NOT NULL,
  `users_ID` INT NOT NULL,
  `clientes_celular` VARCHAR(20) NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  `entregado` TINYINT NOT NULL,
  PRIMARY KEY (`ID`, `clientes_celular`),
  INDEX `fk_reparaciones_users1_idx` (`users_ID` ASC),
  INDEX `fk_reparaciones_clientes1_idx` (`clientes_celular` ASC),
  CONSTRAINT `fk_reparaciones_users1`
    FOREIGN KEY (`users_ID`)
    REFERENCES `elegance`.`users` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reparaciones_clientes1`
    FOREIGN KEY (`clientes_celular`)
    REFERENCES `elegance`.`clientes` (`celular`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elegance`.`ventas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elegance`.`ventas` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `users_ID` INT NOT NULL,
  `fecha` DATE NOT NULL,
  `clientes_celular` VARCHAR(20) NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`ID`, `clientes_celular`),
  INDEX `fk_ventas_users1_idx` (`users_ID` ASC),
  INDEX `fk_ventas_clientes1_idx` (`clientes_celular` ASC),
  CONSTRAINT `fk_ventas_users1`
    FOREIGN KEY (`users_ID`)
    REFERENCES `elegance`.`users` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ventas_clientes1`
    FOREIGN KEY (`clientes_celular`)
    REFERENCES `elegance`.`clientes` (`celular`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elegance`.`detalles_ventas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elegance`.`detalles_ventas` (
  `ventas_ID` INT NOT NULL,
  `unidades` INT NOT NULL,
  `productos_codigo` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`ventas_ID`, `productos_codigo`),
  INDEX `fk_ventas_has_productos_ventas1_idx` (`ventas_ID` ASC),
  INDEX `fk_detalles_ventas_productos1_idx` (`productos_codigo` ASC),
  CONSTRAINT `fk_ventas_has_productos_ventas1`
    FOREIGN KEY (`ventas_ID`)
    REFERENCES `elegance`.`ventas` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalles_ventas_productos1`
    FOREIGN KEY (`productos_codigo`)
    REFERENCES `elegance`.`productos` (`codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elegance`.`apartados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elegance`.`apartados` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `liquidado` TINYINT NOT NULL,
  `entregado` TINYINT NOT NULL,
  `users_ID` INT NOT NULL,
  `productos_codigo` VARCHAR(32) NOT NULL,
  `clientes_celular` VARCHAR(20) NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  `entrega` DATETIME NULL,
  PRIMARY KEY (`ID`, `productos_codigo`, `clientes_celular`),
  INDEX `fk_apartado_users1_idx` (`users_ID` ASC),
  INDEX `fk_apartados_productos1_idx` (`productos_codigo` ASC),
  INDEX `fk_apartados_clientes1_idx` (`clientes_celular` ASC),
  CONSTRAINT `fk_apartado_users1`
    FOREIGN KEY (`users_ID`)
    REFERENCES `elegance`.`users` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_apartados_productos1`
    FOREIGN KEY (`productos_codigo`)
    REFERENCES `elegance`.`productos` (`codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_apartados_clientes1`
    FOREIGN KEY (`clientes_celular`)
    REFERENCES `elegance`.`clientes` (`celular`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elegance`.`detalles_reparaciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elegance`.`detalles_reparaciones` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(300) NOT NULL,
  `precio` INT NOT NULL,
  `entregado` TINYINT NOT NULL,
  `reparaciones_ID` INT NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_detalles_reparaciones_reparaciones1_idx` (`reparaciones_ID` ASC),
  CONSTRAINT `fk_detalles_reparaciones_reparaciones1`
    FOREIGN KEY (`reparaciones_ID`)
    REFERENCES `elegance`.`reparaciones` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elegance`.`pagos_apartados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elegance`.`pagos_apartados` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `cantidad` INT NOT NULL,
  `apartado_ID` INT NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL,
  `users_ID` INT NOT NULL,
  PRIMARY KEY (`ID`, `users_ID`),
  INDEX `fk_pagos_apartados_apartado1_idx` (`apartado_ID` ASC),
  INDEX `fk_pagos_apartados_users1_idx` (`users_ID` ASC),
  CONSTRAINT `fk_pagos_apartados_apartado1`
    FOREIGN KEY (`apartado_ID`)
    REFERENCES `elegance`.`apartados` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pagos_apartados_users1`
    FOREIGN KEY (`users_ID`)
    REFERENCES `elegance`.`users` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elegance`.`representante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elegance`.`representante` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `paterno` VARCHAR(45) NOT NULL,
  `materno` VARCHAR(45) NOT NULL,
  `celular` VARCHAR(20) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elegance`.`provedores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elegance`.`provedores` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `empresa` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `representante_ID` INT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_provedores_representante1_idx` (`representante_ID` ASC),
  CONSTRAINT `fk_provedores_representante1`
    FOREIGN KEY (`representante_ID`)
    REFERENCES `elegance`.`representante` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elegance`.`pedidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elegance`.`pedidos` (
  `ID` INT NOT NULL,
  `representante_ID` INT NOT NULL,
  `provedores_ID` INT NOT NULL,
  `users_ID` INT NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_pedidos_representante1_idx` (`representante_ID` ASC),
  INDEX `fk_pedidos_provedores1_idx` (`provedores_ID` ASC),
  INDEX `fk_pedidos_users1_idx` (`users_ID` ASC),
  CONSTRAINT `fk_pedidos_representante1`
    FOREIGN KEY (`representante_ID`)
    REFERENCES `elegance`.`representante` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedidos_provedores1`
    FOREIGN KEY (`provedores_ID`)
    REFERENCES `elegance`.`provedores` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedidos_users1`
    FOREIGN KEY (`users_ID`)
    REFERENCES `elegance`.`users` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elegance`.`detalles_pedidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elegance`.`detalles_pedidos` (
  `ID` INT NOT NULL,
  `descripcion` VARCHAR(200) NOT NULL,
  `unidades` INT NOT NULL,
  `costo` INT NULL,
  `total` INT NOT NULL,
  `pedidos_ID` INT NOT NULL,
  `marcas_ID` INT NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_detalles_pedidos_pedidos1_idx` (`pedidos_ID` ASC),
  INDEX `fk_detalles_pedidos_marcas1_idx` (`marcas_ID` ASC),
  CONSTRAINT `fk_detalles_pedidos_pedidos1`
    FOREIGN KEY (`pedidos_ID`)
    REFERENCES `elegance`.`pedidos` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalles_pedidos_marcas1`
    FOREIGN KEY (`marcas_ID`)
    REFERENCES `elegance`.`marcas` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elegance`.`carrito`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elegance`.`carrito` (
  `productos_codigo` VARCHAR(32) NOT NULL,
  `cantidad` INT NOT NULL,
  PRIMARY KEY (`productos_codigo`, `cantidad`),
  INDEX `fk_carrito_productos1_idx` (`productos_codigo` ASC),
  CONSTRAINT `fk_carrito_productos1`
    FOREIGN KEY (`productos_codigo`)
    REFERENCES `elegance`.`productos` (`codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
