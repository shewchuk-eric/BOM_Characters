-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema bom
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `bom` ;

-- -----------------------------------------------------
-- Schema bom
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bom` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `bom` ;

-- -----------------------------------------------------
-- Table `bom`.`characters`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bom`.`characters` ;

CREATE TABLE IF NOT EXISTS `bom`.`characters` (
  `char_id` INT NOT NULL AUTO_INCREMENT,
  `charName` VARCHAR(45) NOT NULL,
  `charType` ENUM('Hero', 'Zero') NOT NULL,
  `firstSeen` VARCHAR(60) NOT NULL,
  `abstract` BLOB NULL DEFAULT NULL,
  PRIMARY KEY (`char_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
