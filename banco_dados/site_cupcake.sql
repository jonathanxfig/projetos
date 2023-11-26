-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: site_cupcake
-- ------------------------------------------------------
-- Server version	8.0.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cadastro_clientes`
--

DROP TABLE IF EXISTS `cadastro_clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cadastro_clientes` (
  `codigo` int NOT NULL AUTO_INCREMENT,
  `nome_cliente` varchar(45) NOT NULL,
  `cpf_cliente` bigint NOT NULL,
  `endereco_cliente` varchar(45) NOT NULL,
  `email_cliente` varchar(45) NOT NULL,
  `senha_cliente` varchar(45) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabela para Cadastro de Clientes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cadastro_clientes`
--

LOCK TABLES `cadastro_clientes` WRITE;
/*!40000 ALTER TABLE `cadastro_clientes` DISABLE KEYS */;
INSERT INTO `cadastro_clientes` VALUES (14,'Noah',13827443741,'Rua 500','noah@gmail.com','123'),(15,'jessica',1234567890,'Rua 123','jessica@gmail.com','123'),(16,'luana lopes da costa',666999,'rua do meio','lua@gmail.com','1234567'),(17,'David',123456789,'Avenida 1','ddvictor@gmail.com','123456789'),(18,'Jonathan',1234567890,'Rua 2','jonathan123@gmail.com','741'),(19,'Teste',1234567890,'Rua 741','jonathan123@gmail.com','8523'),(20,'Jon',1234567890,'Rua 96','jon@gmail.com','123'),(21,'Teste Usuário',1234567890,'Rua 74','user@gmail.com','789'),(22,'Teste',13874114752,'Rua 123','teste@gmail.com','123'),(23,'Teste Jonathan',1234567890,'Rua 123','teste.jonathan@gmail.com','123'),(24,'Jonathan T.',1234567890,'Rua 23','jonathan.teste1@gmail.com','123');
/*!40000 ALTER TABLE `cadastro_clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cadastro_usuarios`
--

DROP TABLE IF EXISTS `cadastro_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cadastro_usuarios` (
  `idcadastro_usuarios` int NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(45) NOT NULL,
  `email_usuario` varchar(45) NOT NULL,
  `telefone_usuario` bigint NOT NULL,
  `endereco_usuario` varchar(200) NOT NULL,
  `cpf_usuario` bigint NOT NULL,
  `forma_de_pagamento` varchar(45) NOT NULL,
  PRIMARY KEY (`idcadastro_usuarios`)
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cadastro_usuarios`
--

LOCK TABLES `cadastro_usuarios` WRITE;
/*!40000 ALTER TABLE `cadastro_usuarios` DISABLE KEYS */;
INSERT INTO `cadastro_usuarios` VALUES (92,'Jonathan Teste','jonathan.teste1@gmail.com',219998887777,'Rua 23',1234567890,'pix'),(91,'Teste Jonathan','teste.jonathan@gmail.com',21974445555,'Rua 123',1234567890,'pix'),(90,'Jonathan Teste 1','jonathan@gmail.com',21988556520,'Rua 123',1234567890,'pix'),(89,'Jon','jon@gmail.com',21988887777,'Rua 23',1034567890,'pix'),(88,'Jonathan','jonathan.teste@gmail.com',21977778888,'Rua 96',123456789,'pix'),(87,'Jonathan','jonathan123@gmail.com',2199998521,'Rua 741',1234567890,'pix'),(86,'Jonathan','jonathan@gmail.com',21999998888,'Rua 123',1234567890,'debito'),(85,'Jonathan','jonathan@gmail.com',21999998888,'Rua 123',13811122285,'pix'),(84,'Jonathan','teste@gmail.com',21999998888,'Rua 123',1234567890,'debito'),(75,'igor','igor@gmail.com',21999287377,'rua 123',1234567890,'cartao_credito'),(76,'jonathan','jonathan@gmail.com',123456789,'Rua 1',1234567890,'pix'),(77,'eduardosoares ','eduardosoaresbr.@gmail.com',34345789,'piedade ',1234567890,'pix'),(78,'Teste','teste@gmail.com',21912345678,'Rua 123',1234567890,'pix'),(79,'noah ','noahf@gmail.com',21972597597,'Rua 3',12485632504,'cartao_credito'),(80,'jessica','jessica@gmail.com',21988557895,'Rua 123',1234567890,'cartao_credito'),(81,'Igor Rodrigues da Silva','igor@gmail.com',21888888888,'Rua do Lado, nº 13',17217217212,'pix'),(82,'Luana','lua@gmail.com',2199999999,'rua do meio',667,'cartao_credito'),(83,'David','ddvictor2@gmail.com',21977248889,'Avenida 1',12345678,'pix');
/*!40000 ALTER TABLE `cadastro_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrinho`
--

DROP TABLE IF EXISTS `carrinho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carrinho` (
  `id_usuario` int NOT NULL,
  `carrinho_json` text,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrinho`
--

LOCK TABLES `carrinho` WRITE;
/*!40000 ALTER TABLE `carrinho` DISABLE KEYS */;
INSERT INTO `carrinho` VALUES (655,'[]'),(2147483647,'[{\"id\":\"1\",\"nome\":\"Cupcake de Morango\",\"preco\":\"3.5\",\"quantidade\":\"1\"},{\"id\":\"3\",\"nome\":\"Cupcake de Baunilha\",\"preco\":\"3\",\"quantidade\":\"1\"}]'),(656231,'[{\"id\":\"2\",\"nome\":\"Cupcake de Chocolate\",\"preco\":\"4\",\"quantidade\":\"1\"},{\"id\":\"2\",\"nome\":\"Cupcake de Chocolate\",\"preco\":\"4\",\"quantidade\":\"1\"}]'),(65621,'[]'),(65623452,'[{\"id\":\"2\",\"nome\":\"Cupcake de Chocolate\",\"preco\":\"4\",\"quantidade\":\"1\"},{\"id\":\"3\",\"nome\":\"Cupcake de Baunilha\",\"preco\":\"3\",\"quantidade\":\"1\"}]'),(656234,'[{\"id\":\"2\",\"nome\":\"Cupcake de Chocolate\",\"preco\":\"4\",\"quantidade\":\"1\"}]'),(65623630,'[{\"id\":\"3\",\"nome\":\"Cupcake de Baunilha\",\"preco\":\"3\",\"quantidade\":\"1\"}]'),(6562365,'[{\"id\":\"3\",\"nome\":\"Cupcake de Baunilha\",\"preco\":\"3\",\"quantidade\":\"1\"}]'),(656236,'[{\"id\":\"3\",\"nome\":\"Cupcake de Baunilha\",\"preco\":\"3\",\"quantidade\":\"1\"}]'),(6562379,'{\"1\":{\"id\":\"3\",\"nome\":\"Cupcake de Baunilha\",\"preco\":\"3\",\"quantidade\":\"1\"},\"2\":{\"id\":\"3\",\"nome\":\"Cupcake de Baunilha\",\"preco\":\"3\",\"quantidade\":\"1\"}}'),(656237,'[{\"id\":\"3\",\"nome\":\"Cupcake de Baunilha\",\"preco\":\"3\",\"quantidade\":\"1\"}]'),(656238,'[{\"id\":\"3\",\"nome\":\"Cupcake de Baunilha\",\"preco\":\"3\",\"quantidade\":\"1\"}]'),(65623,'[]'),(65624098,'[]'),(65626381,'[{\"id\":\"1\",\"nome\":\"Cupcake de Morango\",\"preco\":\"3.5\",\"quantidade\":\"1\"},{\"id\":\"2\",\"nome\":\"Cupcake de Chocolate\",\"preco\":\"4\",\"quantidade\":\"3\"}]'),(656264862,'{\"1\":{\"id\":\"6\",\"nome\":\"Cupcake de Cereja\",\"preco\":\"6\",\"quantidade\":\"2\"}}'),(65626,'{\"1\":{\"id\":\"1\",\"nome\":\"Cupcake de Morango\",\"preco\":\"3.5\",\"quantidade\":\"1\"},\"2\":{\"id\":\"3\",\"nome\":\"Cupcake de Baunilha\",\"preco\":\"3\",\"quantidade\":\"1\"},\"3\":{\"id\":\"4\",\"nome\":\"Cupcake de Lim\\u00e3o\",\"preco\":\"5\",\"quantidade\":\"1\"}}'),(6562954,'{\"2\":{\"id\":\"1\",\"nome\":\"Cupcake de Morango\",\"preco\":\"3.5\",\"quantidade\":\"1\"}}'),(65629856,'[{\"id\":\"6\",\"nome\":\"Cupcake de Maracuj\\u00e1\",\"preco\":\"6\",\"quantidade\":\"2\"},{\"id\":\"1\",\"nome\":\"Cupcake de Morango\",\"preco\":\"3.5\",\"quantidade\":\"5\"},{\"id\":\"2\",\"nome\":\"Cupcake de Chocolate\",\"preco\":\"4\",\"quantidade\":\"2\"},{\"id\":\"3\",\"nome\":\"Cupcake de Baunilha\",\"preco\":\"3\",\"quantidade\":\"2\"}]'),(6562999,'[]'),(6563588,'[]'),(656389,'[{\"id\":\"4\",\"nome\":\"Cupcake de Lim\\u00e3o\",\"preco\":\"5\",\"quantidade\":\"2\"},{\"id\":\"5\",\"nome\":\"Cupcake de Laranja\",\"preco\":\"4.5\",\"quantidade\":\"1\"},{\"id\":\"1\",\"nome\":\"Cupcake de Morango\",\"preco\":\"3.5\",\"quantidade\":\"1\"}]'),(65638,'{\"1\":{\"id\":\"1\",\"nome\":\"Cupcake de Morango\",\"preco\":\"3.5\",\"quantidade\":\"1\"},\"2\":{\"id\":\"6\",\"nome\":\"Cupcake de Cereja\",\"preco\":\"6\",\"quantidade\":\"1\"}}'),(656391,'{\"1\":{\"id\":\"4\",\"nome\":\"Cupcake de Lim\\u00e3o\",\"preco\":\"5\",\"quantidade\":\"2\"}}'),(656392,'[{\"id\":\"2\",\"nome\":\"Cupcake de Chocolate\",\"preco\":\"4\",\"quantidade\":\"1\"},{\"id\":\"1\",\"nome\":\"Cupcake de Morango\",\"preco\":\"3.5\",\"quantidade\":\"1\"}]'),(6563957,'[{\"id\":\"1\",\"nome\":\"Cupcake de Morango\",\"preco\":\"3.5\",\"quantidade\":\"1\"},{\"id\":\"5\",\"nome\":\"Cupcake de Laranja\",\"preco\":\"4.5\",\"quantidade\":\"1\"}]'),(656399,'[{\"id\":\"2\",\"nome\":\"Cupcake de Chocolate\",\"preco\":\"4\",\"quantidade\":\"1\"}]'),(65639,'[]'),(6563,'[{\"id\":\"2\",\"nome\":\"Cupcake de Chocolate\",\"preco\":\"4\",\"quantidade\":\"1\"},{\"id\":\"4\",\"nome\":\"Cupcake de Lim\\u00e3o\",\"preco\":\"5\",\"quantidade\":\"1\"}]');
/*!40000 ALTER TABLE `carrinho` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentario_clientes`
--

DROP TABLE IF EXISTS `comentario_clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comentario_clientes` (
  `cod_cont` int NOT NULL AUTO_INCREMENT,
  `nome_cont` varchar(45) NOT NULL,
  `email_cont` varchar(45) NOT NULL,
  `telefone_cont` bigint NOT NULL,
  `comentario_cont` varchar(150) NOT NULL,
  PRIMARY KEY (`cod_cont`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentario_clientes`
--

LOCK TABLES `comentario_clientes` WRITE;
/*!40000 ALTER TABLE `comentario_clientes` DISABLE KEYS */;
INSERT INTO `comentario_clientes` VALUES (26,'Teste','teste@gmail.com',21963335555,'testando a caixa de comentário'),(25,'Jonathan Teste','testejon@gmail.com',21966662222,'Entrega muito rápida'),(15,'noah','noahf@gmail.com',21972597597,'to com fome, anda logo'),(16,'jessica','jessica@gmail.com',21988557895,'teste de comentário'),(17,'Igor Rodrigues da Silva','igor@gmail.com',21888888888,'Pedi um cupcake de murango e veio de baunilha'),(18,'luana lopes da costa','lua@gmail.com',21999999999,'Oi ximis'),(19,'David','ddvictor@gmail.com',21977248889,'Rápida entrega! '),(20,'Jonathan','jonathan@gmail.com',21999998888,'Olá'),(21,'Jonathan','jonathan@gmail.com',21999998888,'Olá, tudo bem?'),(22,'Jonathan','jonathan1@gmail.com',21977771234,'Olá'),(23,'Jonathan','jonathan741@gmail.com',21988887412,'Entrega super rápida'),(24,'Jonathan Teste','jonathan1234@gmail.com',21988885555,'Olá!'),(27,'Teste Jonathan','teste.jonathan@gmail.com',21974445555,'muito bom os cupcakes!!!!!'),(28,'Jonathan Teste','jonathan.q@gmail.com',21966662222,'entrega rápida');
/*!40000 ALTER TABLE `comentario_clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedidos` (
  `idpedidos` int NOT NULL AUTO_INCREMENT,
  `nome_pedidos` varchar(45) NOT NULL,
  `quantidade_pedidos` int NOT NULL,
  `preco_pedidos` decimal(10,2) NOT NULL,
  PRIMARY KEY (`idpedidos`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-26 17:32:15
