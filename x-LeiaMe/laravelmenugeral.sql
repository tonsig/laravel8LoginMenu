/* *******************************************
 * Base inicial para qualquer sistema, com usuários e menus
 * Esse recurso leva em consideração que será utilizado 
 * o framework W3.css e Font Awesome ( https://fontawesome.com/ ) 
 * para icones vetoriais
 ********************************************* */

/* cria banco de dados se não existir e usa ele */
CREATE DATABASE IF NOT EXISTS laravelmenugeral;
USE laravelmenugeral;

/* caso existam tabelas, deleta elas, na ordem correta */

DROP TABLE IF EXISTS Usuarios;
DROP TABLE IF EXISTS NivelUsuarios;
DROP TABLE IF EXISTS Menus;
DROP TABLE IF EXISTS UsaMenus;

/* cria as tabelas */

CREATE TABLE NivelUsuarios (
  id INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  nome VARCHAR(30)  NULL    ,
PRIMARY KEY(id));

CREATE TABLE Menus (
  id INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  titulo VARCHAR(20)  NULL  ,
  icone VARCHAR(80)  NULL  ,
  ativo BOOLEAN  NULL DEFAULT 1  COMMENT '1=true' ,
  rota  VARCHAR(255) NULL        COMMENT 'rota a ser executada',
  idMenuPai INTEGER UNSIGNED  NULL   COMMENT    'diferente de zero é item filho',
  ordem INTEGER UNSIGNED  NULL   COMMENT 'ordem qua aparece abaixo do menupai'   ,
PRIMARY KEY(id));


CREATE TABLE Usuarios (
  id INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  nivelUsuarios_id INTEGER UNSIGNED  NOT NULL  ,
  nome VARCHAR(60)  NOT NULL  ,
  cpf BIGINT(11) ZEROFILL  NOT NULL  ,
  email VARCHAR(50)  NOT NULL  ,
  senha VARCHAR(128)  NOT NULL  ,
  ativo BOOLEAN  NULL DEFAULT 1  COMMENT '1=true' ,
  dataUltAcesso TIMESTAMP  NULL    ,
PRIMARY KEY(id)  ,
INDEX Usuarios_FKIndex1(NivelUsuarios_id),
  FOREIGN KEY(NivelUsuarios_id)
    REFERENCES NivelUsuarios(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION);

CREATE TABLE UsaMenus (
  id INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  Menus_id INTEGER UNSIGNED  NOT NULL  ,
  NivelUsuarios_id INTEGER UNSIGNED  NOT NULL  ,
  ativo BOOL  NULL DEFAULT 1  COMMENT '1=true'   ,
PRIMARY KEY(id)  ,
INDEX UsaMenus_FKIndex1(NivelUsuarios_id)  ,
INDEX UsaMenus_FKIndex2(Menus_id),
  FOREIGN KEY(NivelUsuarios_id)
    REFERENCES NivelUsuarios(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Menus_id)
    REFERENCES Menus(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION);
/* popula alguns registros nas tabelas */

INSERT INTO MENUS (titulo, idMenuPai, ordem, rota, icone) VALUES 
('Cadastros','1','0','','fa fa-bell fa-fw'),
('Consultas','2','0','','fa fa-bank fa-fw'),
('Meus Cursos','3','0','','fa fa-history fa-fw'),
('Usuarios','1',1,'usuario','fa fa-users fa-fw'),
('Alunos','1',2,'aluno','fa fa-eye fa-fw'),
('Usuarios','2',1,'usuario','fa fa-users fa-fw'),
('Alunos','2',2,'aluno','fa fa-bullseye fa-fw'),
('Lógica','3',1,'cursoLogica','fa fa-bell fa-fw'),
('Orientação a Objetos','3',2,'cursoOO','fa fa-diamond fa-fw');

INSERT INTO NivelUsuarios (nome) VALUES
('admin'),
('aluno');

INSERT INTO Usuarios (NivelUsuarios_id, nome, cpf, email, senha) VALUES
('1', 'Fulano da Silva', '11111111111', 'admin@gmail.com', md5('1')),
('2', 'Aluno da Silva', '22222222222', 'aluno@gmail.com', md5('1'));

INSERT INTO UsaMenus (menus_id, NivelUsuarios_id, ativo) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 1, 1),
(4, 1, 1),
(5, 1, 1),
(6, 1, 1),
(7, 1, 1),
(8, 1, 1),
(9, 1, 1),
(2, 2, 1),
(3, 2, 1),
(6, 2, 1),
(7, 2, 1),
(8, 2, 1),
(9, 2, 1);