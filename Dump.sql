-- MySQL dump 10.13  Distrib 5.7.12, for osx10.9 (x86_64)
--
-- Host: localhost    Database: frota
-- ------------------------------------------------------
-- Server version	5.7.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Endereco`
--

DROP TABLE IF EXISTS `Endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Endereco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cep` varchar(45) DEFAULT NULL,
  `logradouro` varchar(200) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `Estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_franchise` int(11) DEFAULT NULL,
  `id_pessoa` int(11) DEFAULT NULL,
  `funcao` varchar(100) DEFAULT NULL,
  `data_admissao` datetime DEFAULT NULL,
  `data_demissao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pessoa_client_idx` (`id_pessoa`),
  KEY `id_franchise_client_idx` (`id_franchise`),
  CONSTRAINT `id_franchise_client` FOREIGN KEY (`id_franchise`) REFERENCES `franchise` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_pessoa_client` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `condutor`
--

DROP TABLE IF EXISTS `condutor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `condutor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pessoa` int(11) DEFAULT NULL,
  `data_nascimento` varchar(45) DEFAULT NULL,
  `cnh` varchar(100) DEFAULT NULL,
  `cnh_validade` datetime DEFAULT NULL,
  `cnh_cidade` varchar(200) DEFAULT NULL,
  `cnh_estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pessoa_condutor_idx` (`id_pessoa`),
  CONSTRAINT `id_pessoa_condutor` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `foto`
--

DROP TABLE IF EXISTS `foto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `foto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagem` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `franchise`
--

DROP TABLE IF EXISTS `franchise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `franchise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_owner` int(11) DEFAULT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_owner_franchise_idx` (`id_owner`),
  CONSTRAINT `id_owner_franchise` FOREIGN KEY (`id_owner`) REFERENCES `owner` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `franchise_manager`
--

DROP TABLE IF EXISTS `franchise_manager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `franchise_manager` (
  `id` int(11) NOT NULL,
  `id_franchise` int(11) DEFAULT NULL,
  `id_pessoa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_franchise_franchise_manager_idx` (`id_franchise`),
  KEY `id_pessoa_franchise_manager_idx` (`id_pessoa`),
  CONSTRAINT `id_franchise_franchise_manager` FOREIGN KEY (`id_franchise`) REFERENCES `franchise` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_pessoa_franchise_manager` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `owner`
--

DROP TABLE IF EXISTS `owner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `owner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `owner_manager`
--

DROP TABLE IF EXISTS `owner_manager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `owner_manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_owner` int(11) DEFAULT NULL,
  `id_pessoa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_owner_idx` (`id_owner`),
  KEY `id_pessoa_idx` (`id_pessoa`),
  CONSTRAINT `id_owner_owner_manager` FOREIGN KEY (`id_owner`) REFERENCES `owner` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_pessoa_owner_manager` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `sobrenome` varchar(200) DEFAULT NULL,
  `cpf` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `id_foto` int(11) DEFAULT NULL,
  `id_endereco` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_endereco_idx` (`id_endereco`),
  KEY `id_foto_idx` (`id_foto`),
  CONSTRAINT `id_endereco_pessoa` FOREIGN KEY (`id_endereco`) REFERENCES `Endereco` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_foto_pessoa` FOREIGN KEY (`id_foto`) REFERENCES `foto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(100) DEFAULT NULL,
  `value` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tag_client`
--

DROP TABLE IF EXISTS `tag_client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag_client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tag` int(11) DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tag_tag_client_idx` (`id_tag`),
  KEY `id_client_tag_client_idx` (`id_client`),
  CONSTRAINT `id_client_tag_client` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_tag_tag_client` FOREIGN KEY (`id_tag`) REFERENCES `tag` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tag_veiculo`
--

DROP TABLE IF EXISTS `tag_veiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag_veiculo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tag` int(11) DEFAULT NULL,
  `id_veiculo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tag_tag_veiculo_idx` (`id_tag`),
  KEY `id_veiculo_tag_veiculo_idx` (`id_veiculo`),
  CONSTRAINT `id_tag_tag_veiculo` FOREIGN KEY (`id_tag`) REFERENCES `tag` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_veiculo_tag_veiculo` FOREIGN KEY (`id_veiculo`) REFERENCES `veiculo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `telefone`
--

DROP TABLE IF EXISTS `telefone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telefone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `telefone_pessoa`
--

DROP TABLE IF EXISTS `telefone_pessoa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telefone_pessoa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_telefone` int(11) DEFAULT NULL,
  `id_pessoa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_telefone_idx` (`id_telefone`),
  KEY `id_pessoa_idx` (`id_pessoa`),
  CONSTRAINT `id_pessoa_telefone_pessoa` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_telefone_telefone_pessoa` FOREIGN KEY (`id_telefone`) REFERENCES `telefone` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `veiculo`
--

DROP TABLE IF EXISTS `veiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `veiculo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  `chassi` varchar(200) DEFAULT NULL,
  `tipo` varchar(200) DEFAULT NULL,
  `ano` varchar(45) DEFAULT NULL,
  `fabricante` varchar(200) DEFAULT NULL,
  `modelo` varchar(200) DEFAULT NULL,
  `modelo_extra` varchar(200) DEFAULT NULL,
  `placa` varchar(45) DEFAULT NULL,
  `cidade` varchar(200) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `proprietario` varchar(200) DEFAULT NULL,
  `cor` varchar(45) DEFAULT NULL,
  `carroceria` varchar(100) DEFAULT NULL,
  `carroceria_subtipo` varchar(100) DEFAULT NULL,
  `valor` varchar(45) DEFAULT NULL,
  `id_foto` int(11) DEFAULT NULL,
  `id_franchise` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_foto_veiculo_idx` (`id_foto`),
  KEY `id_franchise_veiculo_idx` (`id_franchise`),
  CONSTRAINT `id_foto_veiculo` FOREIGN KEY (`id_foto`) REFERENCES `foto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_franchise_veiculo` FOREIGN KEY (`id_franchise`) REFERENCES `franchise` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `veiculo_client`
--

DROP TABLE IF EXISTS `veiculo_client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `veiculo_client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_veiculo` int(11) DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_veiculo_veiculo_cliente_idx` (`id_veiculo`),
  KEY `id_cliente_veiculo_client_idx` (`id_client`),
  CONSTRAINT `id_client_veiculo_client` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_veiculo_veiculo_client` FOREIGN KEY (`id_veiculo`) REFERENCES `veiculo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-16  7:19:01
