
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `squola` DEFAULT CHARACTER SET utf8 ;
USE `squola` ;

-- -----------------------------------------------------
-- Table `squola`.`venditore`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `squola`.`venditore` (
  `idvenditore` INT NOT NULL AUTO_INCREMENT,
  `uservenditore` VARCHAR(100) NOT NULL,
  `passvenditore` VARCHAR(512) NOT NULL,
  `nomevenditore` VARCHAR(45) NOT NULL,
  `indirizzovenditore` VARCHAR(100) NOT NULL,
  `attivo` TINYINT NULL DEFAULT 0,
  PRIMARY KEY (`idvenditore`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `squola`.`utente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `squola`.`utente` (
  `idutente` INT NOT NULL AUTO_INCREMENT,
  `userutente` VARCHAR(100) NOT NULL,
  `passutente` VARCHAR(512) NOT NULL,
  `nomeutente` VARCHAR(45) NOT NULL,
  `attivo` TINYINT NULL DEFAULT 0,
  PRIMARY KEY (`idutente`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `squola`.`prodotto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `squola`.`prodotto` (
  `idprodotto` INT NOT NULL AUTO_INCREMENT,
  `nomeprodotto` VARCHAR(100) NOT NULL,
  `prezzoprodotto` INT NOT NULL,
  `imgprodotto` VARCHAR(100) NOT NULL,
  `venditore` INT NOT NULL,
  `quantita` INT,
  PRIMARY KEY (`idprodotto`),
  INDEX `fk_prodotto_venditore_idx` (`venditore` ASC),
  CONSTRAINT `fk_prodotto_venditore`
    FOREIGN KEY (`venditore`)
    REFERENCES `squola`.`venditore` (`idvenditore`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `squola`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `squola`.`categoria` (
  `idcategoria` INT NOT NULL AUTO_INCREMENT,
  `nomecategoria` VARCHAR(50) NOT NULL,
  `imgcategoria` VARCHAR(100) NOT NULL,
  `imgslide` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idcategoria`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `squola`.`prodotto_ha_categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `squola`.`prodotto_ha_categoria` (
  `prodotto` INT NOT NULL,
  `categoria` INT NOT NULL,
  `qty` INT NOT NULL,
  PRIMARY KEY (`prodotto`, `categoria`),
  INDEX `fk_prodotto_has_categoria_categoria1_idx` (`categoria` ASC),
  INDEX `fk_prodotto_has_categoria_prodotto1_idx` (`prodotto` ASC),
  CONSTRAINT `fk_prodotto_has_categoria_prodotto1`
    FOREIGN KEY (`prodotto`)
    REFERENCES `squola`.`prodotto` (`idprodotto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_prodotto_has_categoria_categoria1`
    FOREIGN KEY (`categoria`)
    REFERENCES `squola`.`categoria` (`idcategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `squola`.`utente_ha_prodotto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `squola`.`utente_ha_prodotto` (
  `prodotto` INT NOT NULL,
  `utente` INT NOT NULL,
  PRIMARY KEY (`prodotto`, `utente`),
  INDEX `fk_prodotto_has_utente_utente1_idx` (`utente` ASC),
  INDEX `fk_prodotto_has_utente_prodotto1_idx` (`prodotto` ASC),
  CONSTRAINT `fk_prodotto_has_utente_prodotto1`
    FOREIGN KEY (`prodotto`)
    REFERENCES `squola`.`prodotto` (`idprodotto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_prodotto_has_utente_utente1`
    FOREIGN KEY (`utente`)
    REFERENCES `squola`.`utente` (`idutente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `squola`.`steps`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `squola`.`steps` (
  `idstep` INT NOT NULL AUTO_INCREMENT,
  `nomestep` VARCHAR(50) NOT NULL,
  `imgstep` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idstep`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `squola`.`notifica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `squola`.`notifica` (
  `idnotifica` INT NOT NULL AUTO_INCREMENT,
  `idutente` INT NOT NULL,
  `message` VARCHAR(100) NOT NULL,
  `status` INT,
  PRIMARY KEY (`idnotifica`))
ENGINE = InnoDB;





SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;