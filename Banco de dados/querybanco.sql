use sys;

drop database neoservice;

create database neoservice;

use neoservice;

create table TbEmpresas(
IdEmpresa int NOT NULL AUTO_INCREMENT,
NmUsuario varchar(100)NOT NULL,
Senha varchar(100)NOT NULL,
Email varchar(150)NOT NULL,
NmEmpresa varchar(100)NOT NULL,
CNPJ varchar(50)NOT NULL,
Razao varchar(100)NOT NULL,
CEP int NOT NULL,
Estado varchar(100)NOT NULL,
Cidade varchar(100)NOT NULL,
Bairro varchar(100)NOT NULL,
Endereco varchar(225)NOT NULL,
Numero int,
biografia varchar(150) null,
foto varchar(50)not null,
primary key (IdEmpresa)
)default charset = utf8;

create table TbCandidatos(
IdCandidato int NOT NULL AUTO_INCREMENT,
NmUsuario varchar(100)NOT NULL,
Senha varchar(100)NOT NULL,
NmCandidato varchar(100) NOT NULL,
Email varchar(150)NOT NULL,
bdat date NOT NULL,
cep varchar(10) NOT NULL,
estado varchar(2)NOT NULL,
cidade varchar(50)NOT NULL,
bairro varchar(100)NOT NULL,
rua varchar(225)NOT NULL,
biografia varchar(150) NULL,
xp varchar(150) NULL,
ingles varchar(30) NULL,
formacao varchar (150) NULL,
profissao varchar (50) NULL,
foto varchar(50)not null,
primary key (IdCandidato)
)default charset = utf8;


create table TbMensagens(
IdMensagem int NOT NULL AUTO_INCREMENT,
fk_IdContato int,
foreign key(fk_IdContato) references TbContatos(IdContato),
fk_IdEmpresa int,
foreign key(fk_IdEmpresa) references TbEmpresas(IdEmpresa),
fk_IdCandidato int,
foreign key(fk_IdCandidato) references TbCandidatos(IdCandidato),
Mensagem varchar(225),
primary key (IdMensagem)
)default charset = utf8;

create table TbContatos(
IdContato int NOT NULL AUTO_INCREMENT,
fk_IdEmpresa int,
foreign key(fk_IdEmpresa) references TbEmpresas(IdEmpresa),
fk_IdCandidato int,
foreign key(fk_IdCandidato) references TbCandidatos(IdCandidato),
primary key (IdContato)
);

create table TbSolicitacao(
IdSolicitacao int NOT NULL AUTO_INCREMENT,
fk_IdEmpresa int,
foreign key(fk_IdEmpresa) references TbEmpresas(IdEmpresa),
fk_IdCandidato int,
foreign key(fk_IdCandidato) references TbCandidatos(IdCandidato),
primary key (IdSolicitacao)
);

create table TbCompetencias(
IdCompetencia int NOT NULL AUTO_INCREMENT,
competencia varchar(50) null,
primary key (IdCompetencia)
);

create table TbCompetenciaRelacao(
IdRelacao int NOT NULL AUTO_INCREMENT,
fk_IdCandidato int,
foreign key(fk_IdCandidato) references TbCandidatos(IdCandidato),
fk_IdCompetencia int,
foreign key(fk_IdCompetencia) references TbCompetencias(IdCompetencia),
primary key (IdRelacao)
);

create table TbVagas(
IdVaga int NOT NULL AUTO_INCREMENT,
fk_IdEmpresa int,
foreign key(fk_IdEmpresa) references TbEmpresas(IdEmpresa),
vaga varchar(50) not null,
salario decimal(10,2) not null,
horario varchar(50) not null,
descricao varchar(100) not null,
primary key (IdVaga)
);
