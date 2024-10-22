/* copiar e colar  no MySQL */
create database webjogos;
use webjogos;
create table if not exists usuario (
  id int(6) auto_increment not null primary key,
  nome varchar(140) not null,
  email varchar(140) not null,
  senha  varchar(255) not null,
  saldo int(11) not null
);


INSERT INTO usuario (nome, email, senha, saldo)
VALUES ('Davi', 'teste@teste.com', 'teste', 0);

create table if not exists jogos (
  id int(6) auto_increment not null primary key,
  preco float not null,
  nome varchar(80) not null,
  genero varchar(25) not null,
  empresa varchar(40) not null,
  data_de_lancamento date not null,
  multijogador varchar(4) not null
);

INSERT INTO jogos (preco, nome, genero, empresa, data_de_lancamento, multijogador) 
values ('154,9', 'Dark Souls Remastered', 'RPG', 'EA SPORTS', '2018-05-28', 'Sim');
INSERT INTO jogos (preco, nome, genero, empresa, data_de_lancamento, multijogador)
values ('0', 'Counter-Strike 2', 'FPS', 'Valve', '2012-08-21', 'Sim');
INSERT INTO jogos (preco, nome, genero, empresa, data_de_lancamento, multijogador)
values ('249,9', 'The Last of Us™ Part I', 'Terror','Naughty Dog', '2022-09-02', 'Não');
INSERT INTO jogos (preco, nome, genero, empresa, data_de_lancamento, multijogador)
values ('93,99', 'Sniper Elite 5', 'Ação', 'Rebellion', '2022-05-25', 'Sim');
INSERT INTO jogos (preco, nome, genero, empresa, data_de_lancamento, multijogador)
values ('27,99', 'The Binding of Isaac: Rebirth', 'Ação', 'Nicalis, Inc.', '2014-11-04', 'Não');