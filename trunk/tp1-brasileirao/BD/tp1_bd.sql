-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.41-3ubuntu12.10


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema tp1_bd
--

CREATE DATABASE IF NOT EXISTS tp1_bd;
USE tp1_bd;

DROP TABLE IF EXISTS `tp1_bd`.`arbitro`;
CREATE TABLE  `tp1_bd`.`arbitro` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `data_nascimento` date NOT NULL,
  `nome` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `tp1_bd`.`cartao`;
CREATE TABLE  `tp1_bd`.`cartao` (
  `tempo` datetime NOT NULL,
  `tipo` int(10) unsigned NOT NULL,
  `partida_id` int(10) unsigned NOT NULL,
  `tecnico_id` int(10) unsigned NOT NULL,
  `jogador_id` int(10) unsigned NOT NULL,
  `arbitro_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`tempo`),
  KEY `cartao_partida_fk_constraint` (`partida_id`),
  KEY `cartao_tecnico_fk_constraint` (`tecnico_id`),
  KEY `cartao_jogador_fk_constraint` (`jogador_id`),
  KEY `cartao_arbitro_fk_constraint` (`arbitro_id`),
  CONSTRAINT `cartao_arbitro_fk_constraint` FOREIGN KEY (`arbitro_id`) REFERENCES `arbitro` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `cartao_jogador_fk_constraint` FOREIGN KEY (`jogador_id`) REFERENCES `jogador` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `cartao_partida_fk_constraint` FOREIGN KEY (`partida_id`) REFERENCES `partida` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `cartao_tecnico_fk_constraint` FOREIGN KEY (`tecnico_id`) REFERENCES `tecnico` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `tp1_bd`.`estadio`;
CREATE TABLE  `tp1_bd`.`estadio` (
  `id` int(10) unsigned zerofill NOT NULL,
  `endereco` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `tp1_bd`.`falta`;
CREATE TABLE  `tp1_bd`.`falta` (
  `tempo` time NOT NULL,
  `jogador_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`tempo`),
  KEY `jogador_fk_constraint` (`jogador_id`),
  CONSTRAINT `jogador_fk_constraint` FOREIGN KEY (`jogador_id`) REFERENCES `jogador` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `tp1_bd`.`gol`;
CREATE TABLE  `tp1_bd`.`gol` (
  `tempo` datetime NOT NULL,
  `tipo` int(10) unsigned NOT NULL,
  `partida_id` int(10) unsigned NOT NULL,
  `jogador_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`tempo`),
  KEY `gol_partida_fk_constraint` (`partida_id`),
  KEY `gol_jogador_fk_constraint` (`jogador_id`),
  CONSTRAINT `gol_jogador_fk_constraint` FOREIGN KEY (`jogador_id`) REFERENCES `jogador` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `gol_partida_fk_constraint` FOREIGN KEY (`partida_id`) REFERENCES `partida` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `tp1_bd`.`jogador`;
CREATE TABLE  `tp1_bd`.`jogador` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `data_nascimento` date NOT NULL,
  `nome` varchar(80) NOT NULL,
  `numero_camisa` int(10) unsigned NOT NULL,
  `posicao_id` int(10) unsigned NOT NULL,
  `cartoes_amarelos` int(10) unsigned NOT NULL DEFAULT '0',
  `cartoes_vermelhos` int(10) unsigned NOT NULL DEFAULT '0',
  `total_faltas` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `posicao_fk_constraint` (`posicao_id`),
  CONSTRAINT `posicao_fk_constraint` FOREIGN KEY (`posicao_id`) REFERENCES `posicoes_jogadores` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `tp1_bd`.`partida`;
CREATE TABLE  `tp1_bd`.`partida` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `mandante_id` int(10) unsigned NOT NULL,
  `visitante_id` int(10) unsigned NOT NULL,
  `estadio_id` int(10) unsigned NOT NULL,
  `data` datetime NOT NULL,
  `ac_pri_tempo` int(10) unsigned NOT NULL DEFAULT '0',
  `ac_seg_tempo` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mandante_fk_constraint` (`mandante_id`),
  KEY `visitante_fk_constraint` (`visitante_id`),
  KEY `estadio_fk_constraint` (`estadio_id`),
  CONSTRAINT `estadio_fk_constraint` FOREIGN KEY (`estadio_id`) REFERENCES `estadio` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `mandante_fk_constraint` FOREIGN KEY (`mandante_id`) REFERENCES `time` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `visitante_fk_constraint` FOREIGN KEY (`visitante_id`) REFERENCES `time` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `tp1_bd`.`posicoes_jogadores`;
CREATE TABLE  `tp1_bd`.`posicoes_jogadores` (
  `id` int(10) unsigned NOT NULL,
  `posicao_nome` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `tp1_bd`.`tecnico`;
CREATE TABLE  `tp1_bd`.`tecnico` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `data_nascimento` date NOT NULL,
  `data_inicio` date NOT NULL,
  `nome` varchar(80) NOT NULL,
  `total_cartoes` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `tp1_bd`.`time`;
CREATE TABLE  `tp1_bd`.`time` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `estado` varchar(80) NOT NULL,
  `brasao` varchar(255) NOT NULL,
  `gols_pro` int(10) unsigned NOT NULL DEFAULT '0',
  `gols_contra` int(10) unsigned NOT NULL DEFAULT '0',
  `total_faltas` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
