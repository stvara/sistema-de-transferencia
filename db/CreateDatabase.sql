CREATE DATABASE usuarios;

USE usuarios;

CREATE TABLE IF NOT EXISTS `comprador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) DEFAULT NULL,
  `cpf` bigint(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `dinheiro` int(20) DEFAULT NULL,

  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `lojista` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) DEFAULT NULL,
  `cpf` bigint(12) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `dinheiro` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO comprador (nome, cpf, email,senha,dinheiro)
 VALUES ("joao",11111111111, 'comprador@compras.com.br','senha123',5000);

INSERT INTO lojista (nome, cpf, email,senha,dinheiro)
 VALUES ("jose",222222222222, 'vendedor@vendas.com.br','senha123',5000);