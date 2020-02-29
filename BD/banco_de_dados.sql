SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema epiz_25231414_sisacademico
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `epiz_25231414_sisacademico` DEFAULT CHARACTER SET utf8 ;
USE `epiz_25231414_sisacademico` ;
-- -----------------------------------------------------
-- Table `epiz_25231414_sisacademico`.`endereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `epiz_25231414_sisacademico`.`endereco` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `cep` VARCHAR(9) NOT NULL,
  `logradouro` VARCHAR(50) NOT NULL,
  `numero` VARCHAR(6) NOT NULL,
  `bairro` VARCHAR(50) NOT NULL,
  `cidade` VARCHAR(50) NOT NULL,
  `estado` VARCHAR(2) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `epiz_25231414_sisacademico`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `epiz_25231414_sisacademico`.`usuario` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(15) NOT NULL,
  `sobrenome` VARCHAR(30) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(35) NOT NULL,
  `CPF` VARCHAR(14) NOT NULL,
  `RG` VARCHAR(12) NOT NULL,
  `telefone` VARCHAR(16) NOT NULL,
  `endereco_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  UNIQUE INDEX `CPF_UNIQUE` (`CPF` ASC),
  INDEX `fk_usuario_endereco_idx` (`endereco_ID` ASC),
  CONSTRAINT `fk_usuario_endereco`
    FOREIGN KEY (`endereco_ID`)
    REFERENCES `epiz_25231414_sisacademico`.`endereco` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `epiz_25231414_sisacademico`.`instituicao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `epiz_25231414_sisacademico`.`instituicao` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `endereco_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC),
  INDEX `fk_instituicao_endereco1_idx` (`endereco_ID` ASC),
  CONSTRAINT `fk_instituicao_endereco1`
    FOREIGN KEY (`endereco_ID`)
    REFERENCES `epiz_25231414_sisacademico`.`endereco` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `epiz_25231414_sisacademico`.`curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `epiz_25231414_sisacademico`.`curso` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `instituicao_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC),
  INDEX `fk_curso_instituicao1_idx` (`instituicao_ID` ASC),
  CONSTRAINT `fk_curso_instituicao1`
    FOREIGN KEY (`instituicao_ID`)
    REFERENCES `epiz_25231414_sisacademico`.`instituicao` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `epiz_25231414_sisacademico`.`aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `epiz_25231414_sisacademico`.`aluno` (
  `usuario_ID` INT UNSIGNED NOT NULL,
  `data_nascimento` VARCHAR(10),
  `nome_pai` VARCHAR(100),
  `nome_mae` VARCHAR(100),
  `curso_ID` INT UNSIGNED NOT NULL,
  INDEX `fk_aluno_usuario1_idx` (`usuario_ID` ASC),
  INDEX `fk_aluno_curso1_idx` (`curso_ID` ASC),
  CONSTRAINT `fk_aluno_usuario1`
    FOREIGN KEY (`usuario_ID`)
    REFERENCES `epiz_25231414_sisacademico`.`usuario` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_aluno_curso1`
    FOREIGN KEY (`curso_ID`)
    REFERENCES `epiz_25231414_sisacademico`.`curso` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `epiz_25231414_sisacademico`.`adm`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `epiz_25231414_sisacademico`.`adm` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(20) NOT NULL,
  `senha` VARCHAR(35) NOT NULL,
  `permissao` TINYINT(1) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

INSERT INTO endereco (ID, cep, logradouro, numero, bairro, cidade, estado) VALUES (1, '44036-900', 'Avenida Transnordestina', 'S/N', 'Novo Horizonte', 'Feira de Santana', 'BA');
INSERT INTO endereco (ID, cep, logradouro, numero, bairro, cidade, estado) VALUES (2, '45662-900', 'Rodovia Jorge Amado', 'S/N', 'Salobrinho', 'Ilhéus', 'BA');

INSERT INTO instituicao (ID, nome, endereco_ID) VALUES (1, 'SysAcademy', 1);
INSERT INTO instituicao (ID, nome, endereco_ID) VALUES (2, 'SysAcademy', 2);

INSERT INTO curso (ID, nome, instituicao_ID) VALUES (1, 'Engenharia de Computação', 1);
INSERT INTO curso (ID, nome, instituicao_ID) VALUES (2, 'Ciência da Computação', 1);
INSERT INTO curso (ID, nome, instituicao_ID) VALUES (3, 'Sistemas da Informação', 1);
INSERT INTO curso (ID, nome, instituicao_ID) VALUES (4, 'Análise e Desenvolvimento de Sistemas', 1);
INSERT INTO curso (ID, nome, instituicao_ID) VALUES (5, 'Engenharia de Software', 2);
INSERT INTO curso (ID, nome, instituicao_ID) VALUES (6, 'Engenharia de Computação', 2);
INSERT INTO curso (ID, nome, instituicao_ID) VALUES (7, 'Redes de Computadores', 2);
