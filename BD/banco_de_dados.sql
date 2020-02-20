SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema sisacademico
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `sisacademico` DEFAULT CHARACTER SET utf8 ;
USE `sisacademico` ;

-- -----------------------------------------------------
-- Table `sisacademico`.`endereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisacademico`.`endereco` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `cep` VARCHAR(9) NOT NULL,
  `logradouro` VARCHAR(45) NOT NULL,
  `numero` INT NOT NULL,
  `bairro` VARCHAR(45) NOT NULL,
  `cidade` VARCHAR(45) NOT NULL,
  `estado` VARCHAR(2) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sisacademico`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisacademico`.`usuario` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(15) NOT NULL,
  `sobrenome` VARCHAR(30) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `CPF` VARCHAR(14) NOT NULL,
  `endereco_ID` INT UNSIGNED NOT NULL,
  `tipo_usuario_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  UNIQUE INDEX `CPF_UNIQUE` (`CPF` ASC),
  INDEX `fk_usuario_endereco_idx` (`endereco_ID` ASC),
  CONSTRAINT `fk_usuario_endereco`
    FOREIGN KEY (`endereco_ID`)
    REFERENCES `sisacademico`.`endereco` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sisacademico`.`instituicao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisacademico`.`instituicao` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `endereco_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC),
  INDEX `fk_instituicao_endereco1_idx` (`endereco_ID` ASC),
  CONSTRAINT `fk_instituicao_endereco1`
    FOREIGN KEY (`endereco_ID`)
    REFERENCES `sisacademico`.`endereco` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sisacademico`.`departamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisacademico`.`departamento` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `instituicao_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC),
  INDEX `fk_departamento_instituicao1_idx` (`instituicao_ID` ASC),
  CONSTRAINT `fk_departamento_instituicao1`
    FOREIGN KEY (`instituicao_ID`)
    REFERENCES `sisacademico`.`instituicao` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sisacademico`.`curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisacademico`.`curso` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `departamento_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC),
  INDEX `fk_curso_departamento1_idx` (`departamento_ID` ASC),
  CONSTRAINT `fk_curso_departamento1`
    FOREIGN KEY (`departamento_ID`)
    REFERENCES `sisacademico`.`departamento` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sisacademico`.`aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisacademico`.`aluno` (
  `usuario_ID` INT UNSIGNED NOT NULL,
  `curso_ID` INT UNSIGNED NOT NULL,
  INDEX `fk_aluno_usuario1_idx` (`usuario_ID` ASC),
  INDEX `fk_aluno_curso1_idx` (`curso_ID` ASC),
  CONSTRAINT `fk_aluno_usuario1`
    FOREIGN KEY (`usuario_ID`)
    REFERENCES `sisacademico`.`usuario` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_aluno_curso1`
    FOREIGN KEY (`curso_ID`)
    REFERENCES `sisacademico`.`curso` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sisacademico`.`adm`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisacademico`.`adm` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
