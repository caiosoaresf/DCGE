create database dados;
use dados;

create table eletronicos(
    codigo int not null,
    nome varchar(20) not null,

    constraint pk_eletronicos primary key (codigo)
);

insert into eletronicos values(1,"Chuveiro");
insert into eletronicos values(2,"Computador");
insert into eletronicos values(3,"Televisão");

create table usuarios(
	Nome varchar (50) not null,
    Usuario varchar (50) not null,
    Senha varchar(50) not null,
    Email varchar(50) not null,
    foto varchar(100) default"profile-img.jpg",
    constraint Pk_Usuario primary key (Usuario)
);
/*update usuarios set Senha="senha" where id = 1;*/
select * from usuarios;