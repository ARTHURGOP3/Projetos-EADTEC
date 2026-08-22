create database livraria;
use livraria;

create table filial(
fcodigo int auto_increment, 
fnome varchar(100) not null
comment 'nome da filial',
frua varchar(100) not null
comment 'grupo de endereço, nome da rua',
fcidade varchar(100) not null
comment 'grupo de endereço, nome da cidade ',
frua_numero char(5) not null
comment 'grupo de endereço, número da rua',
fbairro varchar(100)
comment 'grupo de endereço, nome do bairro',
fuf char(2) not null
comment 'grupo de endereço, sigla do estado',
fcep char(8)
comment 'grupo de endereço, número cep da rua',
ftelefone char(11) not null,
constraint pk_filial primary key (fcodigo)
);


create table livro(
lisbn char(13)
comment 'código de identificação de livros', 
ltitulo varchar(100) not null,
lautor varchar(100) not null,
lano_pub date
comment ' ano de publicação do livro',
leditora varchar(100) not null,
lnumero_exem bigint unsigned -- bigint porque uma livraria pode ter números muito grandes em estoque de um livro
comment 'número do exemplares',
lgenero_lite varchar(100) default 'Não informado'
comment 'gênero literário',
fcodigo int not null,
constraint pk_livro primary key (lisbn),
constraint fk_filial_fcodigo 
foreign key (fcodigo)
references filial (fcodigo)
);

describe livro;
describe filial;