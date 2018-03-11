create database `bd_pet`;
use `bd_pet`;

create table if not exists `usuario`(
	id_user serial auto_increment primary key,
    nome varchar(50) not null,
    data_nasc  varchar (10) not null,
    telefone varchar(20) not null,
    whatsapp varchar(20) null,
    rua varchar(40) not null,
    numero int(5) not null,
    bairro varchar(30) not null,
    cidade varchar(30) not null,
    usuario varchar(12) not null,
    email varchar(50) not null,
    senha mediumtext not null,
    tipo int(2) not null default '2'
);

create table if not exists `pet`(
	id_pet serial auto_increment primary key,
    id_user int not null,
    nome_pet varchar(40) not null,
    especie varchar(20) not null, 
    data_pet varchar (10) not null,
    raca  varchar (10) null,
    peso  varchar (10) null,
    foto  mediumtext null,
    cuidados mediumtext null    
);

create table if not exists `agenda`(
	id_ag serial auto_increment primary key,
    id_user int not null, 
    data_ag varchar (10) not null,
    hora time not null,
    servico  varchar (20) null,
    pet  varchar (40) null,
    condicao int (2) not null default '3'
);

create table if not exists `horario`(
	id_hora serial auto_increment primary key,
    hora time  
);

create table if not exists `servico`(
	id_serv serial auto_increment primary key,
    nome_serv text,
    tempo time,
    grupo text,
    observacao text
);

-- isert permanente --
INSERT INTO `usuario` (`nome`, `data_nasc`, `telefone`, `whatsapp`, `rua`, `numero`, `bairro`, `cidade`, `usuario`, `email`, `senha`, `tipo`) VALUES ('Helder', '02-03-1994', '8888', '8888', 'Teste', '45', 'Teste', 'Teste', 'helder', 'helder@helder.com', 'e10adc3949ba59abbe56e057f20f883e', '1');

INSERT INTO `horario` (`hora`) VALUES
('08:00'), ('09:00'), ('10:00'), ('11:00'),
('12:00'), ('13:00'), ('14:00'), ('15:00'),
('16:00'), ('17:00'), ('18:00');