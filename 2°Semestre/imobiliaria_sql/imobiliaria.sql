create database joao_de_barro;
use joao_de_barro;

create table sindico(
    smatricula int auto_increment not null,
    snome varchar(200),
    srua varchar(100) not null comment 'grupo de endereço, nome da rua',
    scidade varchar(100) not null comment 'grupo de endereço, nome da cidade',
    srua_numero char(5) not null comment 'grupo de endereço, número da rua',
    sbairro varchar(100) comment 'grupo de endereço, nome do bairro',
    suf char(2) not null comment 'grupo de endereço, sigla do estado',
    scep char(8) comment 'grupo de endereço, número cep da rua',
    stelefone char(11) not null,
    constraint pk_sindico primary key (smatricula)
);
describe sindico;

create table proprietarios(
    prg char(9) not null,
    pnome varchar(100),
    ptelefone char(11) not null,
    pemail varchar(200) not null,
    constraint pk_proprietario primary key (prg)
);
describe proprietarios;

create table condominio(
    ccodigo int auto_increment not null,
    cnome varchar(200),
    crua varchar(100) not null comment 'grupo de endereço, nome da rua',
    ccidade varchar(100) not null comment 'grupo de endereço, nome da cidade',
    crua_numero char(5) not null comment 'grupo de endereço, número da rua',
    cbairro varchar(100) comment 'grupo de endereço, nome do bairro',
    cuf char(2) not null comment 'grupo de endereço, sigla do estado',
    ccep char(8) comment 'grupo de endereço, número cep da rua',
    smatricula int unique,
    constraint pk_condominio primary key (ccodigo),
    constraint fk_condominio foreign key (smatricula)
        references sindico (smatricula)
);
describe condominio;

create table apartamentos(
    anumero int unsigned,
    atipo varchar(40) default 'Padrão',
    ccodigo int,
    prg char(9) not null,
    constraint pk_apartamento primary key (ccodigo, anumero)
        comment 'para não dar erro entre condominios com o mesmo numero de apartamentos',
    constraint fk_apartamento_condominio foreign key (ccodigo)
        references condominio (ccodigo),
    constraint fk_apartamento_proprietario foreign key (prg)
        references proprietarios (prg)
);
describe apartamentos;

create table garagem(
    gnumero int unsigned,
    gtipo varchar(40) default 'Padrão',
    anumero int unsigned,
    ccodigo int,
    constraint pk_garagem primary key (ccodigo, anumero),
    constraint fk_garagem foreign key (ccodigo, anumero)
        references apartamentos (ccodigo, anumero)
);
describe garagem;


