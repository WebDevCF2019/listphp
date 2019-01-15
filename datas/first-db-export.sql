-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema sql8614_listephp
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema sql8614_listephp
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `sql8614_listephp` DEFAULT CHARACTER SET utf8 ;
USE `sql8614_listephp` ;

-- -----------------------------------------------------
-- Table `sql8614_listephp`.`userlist`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sql8614_listephp`.`userlist` (
  `iduserlist` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `thelogin` VARCHAR(60) NOT NULL,
  `thepwd` CHAR(64) NOT NULL,
  `thename` VARCHAR(120) NOT NULL,
  `themail` VARCHAR(160) NOT NULL,
  PRIMARY KEY (`iduserlist`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `thelogin_UNIQUE` ON `sql8614_listephp`.`userlist` (`thelogin` ASC);


-- -----------------------------------------------------
-- Table `sql8614_listephp`.`listephp`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sql8614_listephp`.`listephp` (
  `idlistephp` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `thetitle` VARCHAR(120) NOT NULL,
  `thedesc` VARCHAR(500) NOT NULL,
  `thetext` TEXT NOT NULL,
  `thedate` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `userlist_iduserlist` SMALLINT UNSIGNED NOT NULL,
  PRIMARY KEY (`idlistephp`),
  CONSTRAINT `fk_listephp_userlist`
    FOREIGN KEY (`userlist_iduserlist`)
    REFERENCES `sql8614_listephp`.`userlist` (`iduserlist`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `thetitle_UNIQUE` ON `sql8614_listephp`.`listephp` (`thetitle` ASC);

CREATE INDEX `fk_listephp_userlist_idx` ON `sql8614_listephp`.`listephp` (`userlist_iduserlist` ASC);


-- -----------------------------------------------------
-- Table `sql8614_listephp`.`linkphp`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sql8614_listephp`.`linkphp` (
  `idlinkphp` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `thetitle` VARCHAR(150) NOT NULL,
  `thedesc` VARCHAR(500) NULL,
  `theurl` VARCHAR(500) NOT NULL,
  PRIMARY KEY (`idlinkphp`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sql8614_listephp`.`listephp_has_linkphp`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sql8614_listephp`.`listephp_has_linkphp` (
  `listephp_idlistephp` INT UNSIGNED NOT NULL,
  `linkphp_idlinkphp` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`listephp_idlistephp`, `linkphp_idlinkphp`),
  CONSTRAINT `fk_listephp_has_linkphp_listephp1`
    FOREIGN KEY (`listephp_idlistephp`)
    REFERENCES `sql8614_listephp`.`listephp` (`idlistephp`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_listephp_has_linkphp_linkphp1`
    FOREIGN KEY (`linkphp_idlinkphp`)
    REFERENCES `sql8614_listephp`.`linkphp` (`idlinkphp`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_listephp_has_linkphp_linkphp1_idx` ON `sql8614_listephp`.`listephp_has_linkphp` (`linkphp_idlinkphp` ASC);

CREATE INDEX `fk_listephp_has_linkphp_listephp1_idx` ON `sql8614_listephp`.`listephp_has_linkphp` (`listephp_idlistephp` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
