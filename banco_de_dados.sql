SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema epiz_25231414_sisacademico
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Table `epiz_25231414_sisacademico`.`endereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `epiz_25231414_sisacademico`.`endereco` (
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
-- Table `epiz_25231414_sisacademico`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `epiz_25231414_sisacademico`.`usuario` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(15) NOT NULL,
  `sobrenome` VARCHAR(30) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `CPF` VARCHAR(14) NOT NULL,
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
-- Table `epiz_25231414_sisacademico`.`departamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `epiz_25231414_sisacademico`.`departamento` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `instituicao_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC),
  INDEX `fk_departamento_instituicao1_idx` (`instituicao_ID` ASC),
  CONSTRAINT `fk_departamento_instituicao1`
    FOREIGN KEY (`instituicao_ID`)
    REFERENCES `epiz_25231414_sisacademico`.`instituicao` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `epiz_25231414_sisacademico`.`curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `epiz_25231414_sisacademico`.`curso` (
  `ID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `departamento_ID` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC),
  INDEX `fk_curso_departamento1_idx` (`departamento_ID` ASC),
  CONSTRAINT `fk_curso_departamento1`
    FOREIGN KEY (`departamento_ID`)
    REFERENCES `epiz_25231414_sisacademico`.`departamento` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `epiz_25231414_sisacademico`.`aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `epiz_25231414_sisacademico`.`aluno` (
  `usuario_ID` INT UNSIGNED NOT NULL,
  `data_nascimento` VARCHAR(10),
  `nome_pai` VARCHAR(60),
  `nome_mae` VARCHAR(60),
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
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


INSERT INTO adm (usuario, senha) VALUES ('exa856', md5('pcemelhorqueconsole'));
INSERT INTO adm (usuario, senha) VALUES ('profClaudio', md5('analisedesistemas856'));
INSERT INTO adm (usuario, senha) VALUES ('grupoAvaliador', md5('avaliador856'));

-- Insert dos usuarios --
INSERT INTO usuario (ID, nome, sobrenome, email, CPF, telefone, endereco_ID) VALUES
(601, 'Francisco Hugo', 'Rezende', 'franciscohr@maquinas.com.br', '92546317599', '75994628820', 1);
INSERT INTO usuario (ID, nome, sobrenome, email, CPF, telefone, endereco_ID) VALUES
(701, 'Cristiane', 'Benedita Almada', 'crisada@vinhas.fot.br', '25073799526', '75996462376', 2);
INSERT INTO usuario (ID, nome, sobrenome, email, CPF, telefone, endereco_ID) VALUES
(801, 'Caio Giovanni', 'Gonçalves', 'caiogoncalves@ideia.com.br', '99559754580', '75994068404', 3);
INSERT INTO usuario (ID, nome, sobrenome, email, CPF, telefone, endereco_ID) VALUES     
(802, 'Felipe Benjamin', 'Monteiro', 'felipe-6@vente.com.br', '95244698559', '75983373121', 4);
INSERT INTO usuario (ID, nome, sobrenome, email, CPF, telefone, endereco_ID) VALUES
(901, 'Isabelly Bruna', 'Souza', 'isabellybrunarocha@rizzo.com', '01218158549', '75982143156', 5);
INSERT INTO usuario (ID, nome, sobrenome, email, CPF, telefone, endereco_ID) VALUES
(501, 'Marcelo Mateus', 'Augusto da Rocha', 'mateusrocha@tema.com.br', '08212660559', '75995055492', 6);

-- INSERT dos enderecos --
INSERT INTO endereco (ID, cep, logradouro, numero, bairro, cidade, UF) VALUES 
(1, 44003212, 'rua cajazeiras', 115, 'Aviario', 'Salvador', 'BA');
INSERT INTO endereco (ID, cep, logradouro, numero, bairro, cidade, UF) VALUES 
(2, 44056333, 'avenida almeida', 10, 'Guaruja', 'Salvador', 'BA');
INSERT INTO endereco (ID, cep, logradouro, numero, bairro, cidade, UF) VALUES 
(3, 44056444, 'vila ponta preta', 15, 'Abrantes', 'Camacari', 'BA');
INSERT INTO endereco (ID, cep, logradouro, numero, bairro, cidade, UF) VALUES 
(4, 44056555, 'rua djalminha', 11, 'Itacimirim', 'camacari', 'BA');
INSERT INTO endereco (ID, cep, logradouro, numero, bairro, cidade, UF) VALUES 
(5, 44056666, 'rua tupinambas', 215, 'Novo Horizonte', 'Feira de Santana', 'BA');
INSERT INTO endereco (ID, cep, logradouro, numero, bairro, cidade, UF) VALUES 
(6, 44056777, 'rua almerim', 144, 'Mangabeira', 'Feira de Santana', 'BA');
INSERT INTO endereco (ID, cep, logradouro, numero, bairro, cidade, UF) VALUES 
(8, 44056001, 'rua praia do forte', 333, 'Campo Grande', 'Salvador', 'BA');
INSERT INTO endereco (ID, cep, logradouro, numero, bairro, cidade, UF) VALUES 
(7, 44056031, 'avenida getulio vargas', 220, 'Centro', 'Feira de Santana', 'BA');
INSERT INTO endereco (ID, cep, logradouro, numero, bairro, cidade, UF) VALUES 
(9, 44056765, 'rua casa blanca', 445, 'Rio Verde', 'Camacari', 'BA');


-- INSERT da instituicao --
INSERT INTO instituicao (ID,nome,endereco_ID) VALUES (1,'Unifacs Feira de Santana', 7);
INSERT INTO instituicao (ID,nome,endereco_ID) VALUES (2,'Unifacs salvador', 8);
INSERT INTO instituicao (ID,nome,endereco_ID) VALUES (3,'Unifacs camacari', 9);

-- insert do departamento --
INSERT INTO departamento (ID,nome,instituicao_ID) VALUES (1,'Ciencias Exatas', 1);
INSERT INTO departamento (ID,nome,instituicao_ID) VALUES (2,'Ciencias Agrarias', 1);
INSERT INTO departamento (ID,nome,instituicao_ID) VALUES (3,'Ciencias Biologicas',1);
INSERT INTO departamento (ID,nome,instituicao_ID) VALUES (4,'Ciencias da Saude', 1);
INSERT INTO departamento (ID,nome,instituicao_ID) VALUES (6,'Ciencias Exatas', 2);
INSERT INTO departamento (ID,nome,instituicao_ID) VALUES (7,'Ciencias Agrarias', 2);
INSERT INTO departamento (ID,nome,instituicao_ID) VALUES (8,'Ciencias Biologicas', 2);
INSERT INTO departamento (ID,nome,instituicao_ID) VALUES (9,'Ciencias da Saude', 2);
INSERT INTO departamento (ID,nome,instituicao_ID) VALUES (10,'Ciencias da Saude', 3);
INSERT INTO departamento (ID,nome,instituicao_ID) VALUES (5,'Ciencias Humanas', 3);

-- insert do curso --
INSERT INTO curso (ID,nome,departamento_ID) VALUES (1,'Engenharia Civil', 1);
INSERT INTO curso (ID,nome,departamento_ID) VALUES (2,'Engenharia Computacao ', 1);
INSERT INTO curso (ID,nome,departamento_ID) VALUES (3,'Engenharia Civil', 2);
INSERT INTO curso (ID,nome,departamento_ID) VALUES (4,'Engenharia Computacao ', 2);
INSERT INTO curso (ID,nome,departamento_ID) VALUES (5,'Medicina', 1);
INSERT INTO curso (ID,nome,departamento_ID) VALUES (6,'Enfermagem', 1);
INSERT INTO curso (ID,nome,departamento_ID) VALUES (7,'Medicina', 2);
INSERT INTO curso (ID,nome,departamento_ID) VALUES (8,'Enfermagem', 2);
INSERT INTO curso (ID,nome,departamento_ID) VALUES (13,'Enfermagem', 3);
INSERT INTO curso (ID,nome,departamento_ID) VALUES (9,'Administracao', 3);
INSERT INTO curso (ID,nome,departamento_ID) VALUES (10,'Contabilidade', 3);
INSERT INTO curso (ID,nome,departamento_ID) VALUES (11,'Agronomia', 1);
INSERT INTO curso (ID,nome,departamento_ID) VALUES (12,'Agronomia', 2);

-- insert do caluno --
INSERT INTO aluno (Usuario_ID,curso_ID) VALUES (501, 1);
INSERT INTO aluno (Usuario_ID,curso_ID) VALUES (601, 2);
INSERT INTO aluno (Usuario_ID,curso_ID) VALUES (701, 2);
INSERT INTO aluno (Usuario_ID,curso_ID) VALUES (801, 3);
INSERT INTO aluno (Usuario_ID,curso_ID) VALUES (802, 3);
INSERT INTO aluno (Usuario_ID,curso_ID) VALUES (901, 1);



