-- MySQL dump 10.13  Distrib 5.6.32-78.1, for Linux (x86_64)
--
-- Host: localhost    Database: willy241_pontodainformacao
-- ------------------------------------------------------
-- Server version	5.6.32-78.1

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
-- Table structure for table `categorias_imagem`
--

DROP TABLE IF EXISTS `categorias_imagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias_imagem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_id` int(11) DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL,
  `caminho` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `caminho_completo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias_imagem`
--

LOCK TABLES `categorias_imagem` WRITE;
/*!40000 ALTER TABLE `categorias_imagem` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorias_imagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias_solicitadas`
--

DROP TABLE IF EXISTS `categorias_solicitadas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias_solicitadas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `observacao` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias_solicitadas`
--

LOCK TABLES `categorias_solicitadas` WRITE;
/*!40000 ALTER TABLE `categorias_solicitadas` DISABLE KEYS */;
INSERT INTO `categorias_solicitadas` VALUES (1,'Technologie','Salut, je veux une nouvelle catégorie que s\'apelle Technologie. Merci!',2,'2015-08-26 04:05:37','2015-10-07 04:40:01','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `categorias_solicitadas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `centro_id` int(10) unsigned DEFAULT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,0,NULL,'Tecnologia',NULL,'2015-08-05 00:00:20','2015-08-05 00:00:20'),(2,1,NULL,'Tablets',NULL,'2015-08-05 22:15:47','2015-08-05 22:15:47'),(3,1,NULL,'Smartphones',NULL,'2015-08-05 22:19:05','2015-08-05 22:19:05'),(4,1,NULL,'Celulares',NULL,'2015-08-05 22:19:30','2015-08-05 22:19:30'),(5,0,NULL,'Livros',NULL,'2015-08-05 22:21:44','2015-08-05 22:21:44'),(7,5,NULL,'Comédia',NULL,'2015-08-05 22:22:51','2015-08-05 22:22:51'),(8,5,NULL,'Ficção',NULL,'2015-08-05 22:22:58','2015-08-05 22:22:58'),(10,3,NULL,'Apple',NULL,'2015-08-13 03:37:47','2015-08-13 03:37:47'),(11,10,NULL,'Iphone',NULL,'2015-08-13 03:38:20','2015-08-13 03:38:20'),(69,NULL,1,'Categoria Teste',NULL,'2016-06-07 09:37:32','2016-06-07 11:04:33'),(71,NULL,2,'teste categoria 3',NULL,'2016-06-16 15:00:35','2016-06-16 15:04:32'),(72,NULL,2,'teste categoria 4',NULL,'2016-06-16 15:01:40','2016-06-16 15:04:40'),(73,NULL,2,'teste categoria 2',NULL,'2016-06-16 15:02:00','2016-06-16 15:04:24'),(74,NULL,2,'teste categoria 6',NULL,'2016-06-16 15:02:13','2016-06-16 15:04:57'),(75,NULL,2,'teste categoria 7',NULL,'2016-06-16 15:02:27','2016-06-16 15:05:12'),(76,NULL,2,'teste categoria 8',NULL,'2016-06-16 15:02:43','2016-06-16 15:05:25'),(77,NULL,2,'teste categoria 9',NULL,'2016-06-16 15:02:58','2016-06-16 15:05:40'),(78,NULL,2,'teste categoria 5',NULL,'2016-06-16 15:03:10','2016-06-16 15:04:47'),(79,NULL,2,'teste categoria X',NULL,'2016-06-16 15:03:21','2016-06-16 15:09:45'),(80,NULL,4,'01',NULL,'2016-07-12 23:55:18','2016-07-12 23:55:18'),(81,NULL,4,'02',NULL,'2016-07-12 23:55:28','2016-07-12 23:55:28'),(82,NULL,4,'03',NULL,'2016-07-12 23:55:37','2016-07-12 23:55:37'),(83,NULL,4,'04',NULL,'2016-07-12 23:55:46','2016-07-12 23:55:46'),(84,NULL,4,'05',NULL,'2016-07-12 23:56:01','2016-07-12 23:56:01'),(85,NULL,1,'categoria x rio',NULL,'2016-09-15 22:43:16','2016-09-15 22:43:16'),(86,NULL,2,'teste categoria 1',NULL,'2016-11-26 13:02:45','2016-11-26 13:02:45');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories_requested`
--

DROP TABLE IF EXISTS `categories_requested`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories_requested` (
  `id` int(11) NOT NULL,
  `nome_categoria` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `motivo` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `visualizado` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories_requested`
--

LOCK TABLES `categories_requested` WRITE;
/*!40000 ALTER TABLE `categories_requested` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories_requested` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `centros_comerciais`
--

DROP TABLE IF EXISTS `centros_comerciais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `centros_comerciais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `centros_comerciais`
--

LOCK TABLES `centros_comerciais` WRITE;
/*!40000 ALTER TABLE `centros_comerciais` DISABLE KEYS */;
INSERT INTO `centros_comerciais` VALUES (1,'Rio','2016-09-15 22:27:35','2016-09-15 22:27:35','0000-00-00 00:00:00'),(2,'Sta. Efigenia','2015-08-26 02:05:57','2015-08-26 02:05:57','0000-00-00 00:00:00'),(4,'Lapa','2015-08-26 02:06:22','2015-08-26 02:06:22','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `centros_comerciais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensagens`
--

DROP TABLE IF EXISTS `mensagens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mensagens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `remetente_id` int(11) NOT NULL DEFAULT '0',
  `destinatario_id` int(11) NOT NULL DEFAULT '0',
  `titulo` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `mensagem` text COLLATE utf8_unicode_ci,
  `visualizado` tinyint(1) DEFAULT NULL,
  `global` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user_remetente` (`remetente_id`),
  KEY `id_user_destinatario` (`destinatario_id`),
  CONSTRAINT `id_user_destinatario` FOREIGN KEY (`destinatario_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `id_user_remetente` FOREIGN KEY (`remetente_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensagens`
--

LOCK TABLES `mensagens` WRITE;
/*!40000 ALTER TABLE `mensagens` DISABLE KEYS */;
INSERT INTO `mensagens` VALUES (1,5,8,'Titulo Exemplo','Mensagem teste para o Admin',1,0,'2016-06-08 08:48:51','2016-06-08 15:40:54',NULL),(2,5,8,'Titulo Exemplo','Mensagem teste para o Admin 2',1,0,'2016-06-08 08:48:51','2016-06-09 04:07:43',NULL),(3,8,5,'Titulo Exemplo','Mensagem teste para o user Denis',1,0,'2016-06-08 08:48:51','2016-06-08 12:55:13',NULL),(4,9,5,'Titulo Exemplo','Mensagem teste para o user Denis',0,0,'2016-06-08 08:48:51',NULL,NULL),(5,36,5,'Titulo Exemplo','Mensagem teste para o user Denis',0,0,'2016-06-08 08:48:51',NULL,NULL),(6,36,5,'Titulo Exemplo','Mensagem teste para o user Denis',1,0,'2016-06-08 10:51:51','2016-06-08 12:10:13',NULL),(7,5,5,'RE: Titulo Exemplo','<p><span style=\"line-height: 17.1429px;\">Ok,&nbsp;</span><span style=\"line-height: 17.1429px; font-style: italic;\">teste&nbsp;</span><span style=\"line-height: 17.1429px; font-weight: bold;\">recebido&nbsp;</span><br></p>',1,0,'2016-06-08 12:18:54','2016-06-08 12:56:43',NULL),(8,5,5,'RE: RE: Titulo Exemplo','<p>resposta</p>',1,0,'2016-06-08 13:21:55','2016-06-08 15:04:16',NULL),(9,34,8,'Teste de mensagem de usuário','<p>Mensagem teste do usuário para o admin bla bla bla</p>',1,0,'2016-06-08 15:16:02','2016-06-08 15:16:16',NULL),(10,8,34,'RE: Teste de mensagem de usuário','Mensagem Recebida',1,0,'2016-06-08 15:22:41','2016-06-08 15:22:46',NULL),(11,8,34,'RE: Teste de mensagem de usuário','<p>Nova resposta</p>',1,0,'2016-06-08 15:25:20','2016-06-08 15:34:42',NULL),(12,34,8,'Mensagem teste','<p>teste</p>',1,0,'2016-06-09 04:06:42','2016-06-09 04:07:18',NULL),(13,8,34,'RE: Mensagem teste','<p>resposta</p>',1,0,'2016-06-09 04:07:24','2016-08-12 17:06:28',NULL),(14,8,5,'Mensagem Geral','Mensagem geral teste',0,0,'2016-08-12 17:05:04','2016-08-12 17:05:04',NULL),(15,8,6,'Mensagem Geral','Mensagem geral teste',0,0,'2016-08-12 17:05:04','2016-08-12 17:05:04',NULL),(16,8,7,'Mensagem Geral','Mensagem geral teste',0,0,'2016-08-12 17:05:04','2016-08-12 17:05:04',NULL),(17,8,8,'Mensagem Geral','Mensagem geral teste',1,0,'2016-08-12 17:05:04','2016-08-12 17:05:09',NULL),(18,8,9,'Mensagem Geral','Mensagem geral teste',0,0,'2016-08-12 17:05:04','2016-08-12 17:05:04',NULL),(19,8,34,'Mensagem Geral','Mensagem geral teste',1,0,'2016-08-12 17:05:04','2016-08-12 17:06:26',NULL),(20,8,35,'Mensagem Geral','Mensagem geral teste',0,0,'2016-08-12 17:05:04','2016-08-12 17:05:04',NULL),(21,8,36,'Mensagem Geral','Mensagem geral teste',0,0,'2016-08-12 17:05:04','2016-08-12 17:05:04',NULL),(22,8,37,'Mensagem Geral','Mensagem geral teste',0,0,'2016-08-12 17:05:04','2016-08-12 17:05:04',NULL),(23,8,38,'Mensagem Geral','Mensagem geral teste',0,0,'2016-08-12 17:05:04','2016-08-12 17:05:04',NULL),(24,8,39,'Mensagem Geral','Mensagem geral teste',0,0,'2016-08-12 17:05:04','2016-08-12 17:05:04',NULL),(25,8,40,'Mensagem Geral','Mensagem geral teste',0,0,'2016-08-12 17:05:04','2016-08-12 17:05:04',NULL),(26,8,41,'Mensagem Geral','Mensagem geral teste',0,0,'2016-08-12 17:05:04','2016-08-12 17:05:04',NULL),(27,8,42,'Mensagem Geral','Mensagem geral teste',0,0,'2016-08-12 17:05:04','2016-08-12 17:05:04',NULL),(28,8,43,'Mensagem Geral','Mensagem geral teste',0,0,'2016-08-12 17:05:04','2016-08-12 17:05:04',NULL),(29,8,44,'Mensagem Geral','Mensagem geral teste',0,0,'2016-08-12 17:05:04','2016-08-12 17:05:04',NULL),(30,8,45,'Mensagem Geral','Mensagem geral teste',0,0,'2016-08-12 17:05:04','2016-08-12 17:05:04',NULL),(31,8,34,'RE: Mensagem teste','teste',1,0,'2016-08-12 17:05:46','2016-08-12 17:06:09',NULL),(32,8,34,'RE: Mensagem teste','teste antonio',0,0,'2016-08-23 23:35:05','2016-08-23 23:35:05',NULL),(33,8,34,'RE: Mensagem teste','teste 2',0,0,'2016-08-24 03:07:50','2016-08-24 03:07:50',NULL),(34,8,5,'Mensagem Geral','atencao todos 09/08/2016',0,0,'2016-09-09 23:30:12','2016-09-09 23:30:12',NULL),(35,8,6,'Mensagem Geral','atencao todos 09/08/2016',0,0,'2016-09-09 23:30:12','2016-09-09 23:30:12',NULL),(36,8,7,'Mensagem Geral','atencao todos 09/08/2016',0,0,'2016-09-09 23:30:12','2016-09-09 23:30:12',NULL),(37,8,8,'Mensagem Geral','atencao todos 09/08/2016',1,0,'2016-09-09 23:30:12','2016-09-15 22:34:30',NULL),(38,8,9,'Mensagem Geral','atencao todos 09/08/2016',0,0,'2016-09-09 23:30:12','2016-09-09 23:30:12',NULL),(39,8,34,'Mensagem Geral','atencao todos 09/08/2016',0,0,'2016-09-09 23:30:12','2016-09-09 23:30:12',NULL),(40,8,35,'Mensagem Geral','atencao todos 09/08/2016',0,0,'2016-09-09 23:30:12','2016-09-09 23:30:12',NULL),(41,8,36,'Mensagem Geral','atencao todos 09/08/2016',0,0,'2016-09-09 23:30:12','2016-09-09 23:30:12',NULL),(42,8,37,'Mensagem Geral','atencao todos 09/08/2016',0,0,'2016-09-09 23:30:12','2016-09-09 23:30:12',NULL),(43,8,38,'Mensagem Geral','atencao todos 09/08/2016',0,0,'2016-09-09 23:30:12','2016-09-09 23:30:12',NULL),(44,8,39,'Mensagem Geral','atencao todos 09/08/2016',0,0,'2016-09-09 23:30:12','2016-09-09 23:30:12',NULL),(45,8,40,'Mensagem Geral','atencao todos 09/08/2016',0,0,'2016-09-09 23:30:12','2016-09-09 23:30:12',NULL),(46,8,41,'Mensagem Geral','atencao todos 09/08/2016',0,0,'2016-09-09 23:30:12','2016-09-09 23:30:12',NULL),(47,8,42,'Mensagem Geral','atencao todos 09/08/2016',0,0,'2016-09-09 23:30:12','2016-09-09 23:30:12',NULL),(48,8,43,'Mensagem Geral','atencao todos 09/08/2016',0,0,'2016-09-09 23:30:12','2016-09-09 23:30:12',NULL),(49,8,44,'Mensagem Geral','atencao todos 09/08/2016',0,0,'2016-09-09 23:30:12','2016-09-09 23:30:12',NULL),(50,8,45,'Mensagem Geral','atencao todos 09/08/2016',0,0,'2016-09-09 23:30:12','2016-09-09 23:30:12',NULL),(51,8,5,'RE: Titulo Exemplo','lklkl',0,0,'2016-12-05 18:09:22','2016-12-05 18:09:22',NULL),(52,8,5,'Mensagem Geral','tedtedted',0,0,'2016-12-07 14:18:16','2016-12-07 14:18:16',NULL),(53,8,6,'Mensagem Geral','tedtedted',0,0,'2016-12-07 14:18:16','2016-12-07 14:18:16',NULL),(54,8,7,'Mensagem Geral','tedtedted',0,0,'2016-12-07 14:18:16','2016-12-07 14:18:16',NULL),(55,8,8,'Mensagem Geral','tedtedted',1,0,'2016-12-07 14:18:16','2016-12-12 15:09:39',NULL),(56,8,9,'Mensagem Geral','tedtedted',0,0,'2016-12-07 14:18:16','2016-12-07 14:18:16',NULL),(57,8,34,'Mensagem Geral','tedtedted',0,0,'2016-12-07 14:18:16','2016-12-07 14:18:16',NULL),(58,8,35,'Mensagem Geral','tedtedted',0,0,'2016-12-07 14:18:16','2016-12-07 14:18:16',NULL),(59,8,36,'Mensagem Geral','tedtedted',0,0,'2016-12-07 14:18:16','2016-12-07 14:18:16',NULL),(60,8,37,'Mensagem Geral','tedtedted',0,0,'2016-12-07 14:18:16','2016-12-07 14:18:16',NULL),(61,8,38,'Mensagem Geral','tedtedted',0,0,'2016-12-07 14:18:16','2016-12-07 14:18:16',NULL),(62,8,39,'Mensagem Geral','tedtedted',0,0,'2016-12-07 14:18:16','2016-12-07 14:18:16',NULL),(63,8,40,'Mensagem Geral','tedtedted',0,0,'2016-12-07 14:18:16','2016-12-07 14:18:16',NULL),(64,8,41,'Mensagem Geral','tedtedted',0,0,'2016-12-07 14:18:16','2016-12-07 14:18:16',NULL),(65,8,42,'Mensagem Geral','tedtedted',0,0,'2016-12-07 14:18:16','2016-12-07 14:18:16',NULL),(66,8,43,'Mensagem Geral','tedtedted',0,0,'2016-12-07 14:18:16','2016-12-07 14:18:16',NULL),(67,8,44,'Mensagem Geral','tedtedted',0,0,'2016-12-07 14:18:16','2016-12-07 14:18:16',NULL),(68,8,45,'Mensagem Geral','tedtedted',0,0,'2016-12-07 14:18:16','2016-12-07 14:18:16',NULL),(69,47,8,'ola','ola 2',1,0,'2017-01-13 13:08:38','2017-01-13 13:28:17',NULL),(70,47,8,'','<p>dsekcneocvnelkcvnsçcvnm nsjfvnsdlcknmaçcmacascklnsdcçavcnlks</p>',1,0,'2017-01-13 13:22:16','2017-01-13 13:28:20',NULL),(71,47,8,'okdefirjdderfecvecedcecececececececedcececedc','',1,0,'2017-01-13 13:23:44','2017-01-13 13:28:24',NULL),(72,8,47,'RE: ','hhhhhhhhhhhhhhhhhhhhhhhhhhhhhh',1,0,'2017-01-13 13:28:44','2017-01-13 13:29:31',NULL),(73,8,5,'Mensagem Geral','kkkkkkkkkkkkkkkkklllllllllllllllllmmmmmmmmm',0,0,'2017-01-13 13:28:54','2017-01-13 13:28:54',NULL),(74,8,6,'Mensagem Geral','kkkkkkkkkkkkkkkkklllllllllllllllllmmmmmmmmm',0,0,'2017-01-13 13:28:54','2017-01-13 13:28:54',NULL),(75,8,7,'Mensagem Geral','kkkkkkkkkkkkkkkkklllllllllllllllllmmmmmmmmm',0,0,'2017-01-13 13:28:54','2017-01-13 13:28:54',NULL),(76,8,8,'Mensagem Geral','kkkkkkkkkkkkkkkkklllllllllllllllllmmmmmmmmm',1,0,'2017-01-13 13:28:54','2017-01-13 13:28:58',NULL),(77,8,9,'Mensagem Geral','kkkkkkkkkkkkkkkkklllllllllllllllllmmmmmmmmm',0,0,'2017-01-13 13:28:54','2017-01-13 13:28:54',NULL),(78,8,34,'Mensagem Geral','kkkkkkkkkkkkkkkkklllllllllllllllllmmmmmmmmm',0,0,'2017-01-13 13:28:54','2017-01-13 13:28:54',NULL),(79,8,35,'Mensagem Geral','kkkkkkkkkkkkkkkkklllllllllllllllllmmmmmmmmm',0,0,'2017-01-13 13:28:54','2017-01-13 13:28:54',NULL),(80,8,36,'Mensagem Geral','kkkkkkkkkkkkkkkkklllllllllllllllllmmmmmmmmm',0,0,'2017-01-13 13:28:54','2017-01-13 13:28:54',NULL),(81,8,37,'Mensagem Geral','kkkkkkkkkkkkkkkkklllllllllllllllllmmmmmmmmm',0,0,'2017-01-13 13:28:54','2017-01-13 13:28:54',NULL),(82,8,38,'Mensagem Geral','kkkkkkkkkkkkkkkkklllllllllllllllllmmmmmmmmm',0,0,'2017-01-13 13:28:54','2017-01-13 13:28:54',NULL),(83,8,39,'Mensagem Geral','kkkkkkkkkkkkkkkkklllllllllllllllllmmmmmmmmm',0,0,'2017-01-13 13:28:54','2017-01-13 13:28:54',NULL),(84,8,40,'Mensagem Geral','kkkkkkkkkkkkkkkkklllllllllllllllllmmmmmmmmm',0,0,'2017-01-13 13:28:54','2017-01-13 13:28:54',NULL),(85,8,41,'Mensagem Geral','kkkkkkkkkkkkkkkkklllllllllllllllllmmmmmmmmm',0,0,'2017-01-13 13:28:54','2017-01-13 13:28:54',NULL),(86,8,42,'Mensagem Geral','kkkkkkkkkkkkkkkkklllllllllllllllllmmmmmmmmm',0,0,'2017-01-13 13:28:54','2017-01-13 13:28:54',NULL),(87,8,43,'Mensagem Geral','kkkkkkkkkkkkkkkkklllllllllllllllllmmmmmmmmm',0,0,'2017-01-13 13:28:54','2017-01-13 13:28:54',NULL),(88,8,44,'Mensagem Geral','kkkkkkkkkkkkkkkkklllllllllllllllllmmmmmmmmm',0,0,'2017-01-13 13:28:54','2017-01-13 13:28:54',NULL),(89,8,45,'Mensagem Geral','kkkkkkkkkkkkkkkkklllllllllllllllllmmmmmmmmm',0,0,'2017-01-13 13:28:54','2017-01-13 13:28:54',NULL),(90,8,46,'Mensagem Geral','kkkkkkkkkkkkkkkkklllllllllllllllllmmmmmmmmm',0,0,'2017-01-13 13:28:54','2017-01-13 13:28:54',NULL),(91,8,47,'Mensagem Geral','kkkkkkkkkkkkkkkkklllllllllllllllllmmmmmmmmm',1,0,'2017-01-13 13:28:54','2017-01-13 13:29:28',NULL),(92,8,47,'RE: okdefirjdderfecvecedcecececececececedcececedc','o loco',1,0,'2017-01-13 13:37:08','2017-01-13 13:37:45',NULL);
/*!40000 ALTER TABLE `mensagens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pacotes`
--

DROP TABLE IF EXISTS `pacotes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pacotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `valor` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `vezes` int(11) NOT NULL DEFAULT '0',
  `favorito` tinyint(1) NOT NULL DEFAULT '0',
  `categoria` tinyint(1) NOT NULL DEFAULT '0',
  `centro_id` int(11) NOT NULL DEFAULT '0',
  `valido_por` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pacotes`
--

LOCK TABLES `pacotes` WRITE;
/*!40000 ALTER TABLE `pacotes` DISABLE KEYS */;
INSERT INTO `pacotes` VALUES (1,'Pacote 1 completo (Categoria+Favorito) ','R$ 100,00',2,1,1,2,90,'2015-08-26 03:24:12','2016-06-16 15:07:59','0000-00-00 00:00:00'),(7,'pacote 2 intermediario (+categoria)','R$ 50,00',1,0,1,2,60,'2016-05-07 16:16:21','2016-06-16 15:57:42','0000-00-00 00:00:00'),(8,'pacote 3 simples     (+favorito)','R$ 25,00',1,1,0,2,30,'2016-05-07 16:17:00','2016-06-16 16:19:37','0000-00-00 00:00:00'),(9,'pacote 4 gratuito (20 tags)','R$ 0,01',1,0,0,2,30,'2016-05-07 16:17:26','2016-06-16 16:19:53','0000-00-00 00:00:00'),(10,'Pacote Teste Atualizado 4','R$ 202,00',30,0,0,1,30,'2016-06-07 09:37:26','2016-06-07 10:52:36','0000-00-00 00:00:00'),(11,'pacote teste Atualizado','R$ 10,00',10,0,0,0,10,'2016-06-07 09:59:00','2016-06-07 10:37:24','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `pacotes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reminders`
--

DROP TABLE IF EXISTS `password_reminders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_reminders_email_index` (`email`),
  KEY `password_reminders_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reminders`
--

LOCK TABLES `password_reminders` WRITE;
/*!40000 ALTER TABLE `password_reminders` DISABLE KEYS */;
INSERT INTO `password_reminders` VALUES ('antoniovietri@gmail.com','6a31b9d63c3d1328aa0b24a3e7f339faaf9d7bd1','2016-05-05 00:46:55');
/*!40000 ALTER TABLE `password_reminders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `planos_solicitados`
--

DROP TABLE IF EXISTS `planos_solicitados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `planos_solicitados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `mensagem` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `planos_solicitados`
--

LOCK TABLES `planos_solicitados` WRITE;
/*!40000 ALTER TABLE `planos_solicitados` DISABLE KEYS */;
INSERT INTO `planos_solicitados` VALUES (1,47,'boa noite Antonio, como faco para ter um de seus serviços',0,'2017-01-13 12:58:52','2017-01-13 12:58:52','0000-00-00 00:00:00'),(2,47,'@@@@@@@@@@@@@@@@@@@@',0,'2017-01-13 13:45:49','2017-01-13 13:45:49','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `planos_solicitados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `nome` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao` varchar(355) COLLATE utf8_unicode_ci DEFAULT NULL,
  `preco` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `cor` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modelo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `peso` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `garantia` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (1,6,'Produto Teste 1 ','Descrição do meu produto teste que tem uma capacidade de 255','R$ 2.500,00',23,'Preto','TGW23','2kg','3 meses com a loja','1','2015-09-12 15:44:45','2015-09-12 15:44:45',NULL),(2,6,'Iphone 6','O Apple iPhone 6 é um smartphone iOS com características inovadoras que o tornam uma excelente opção para qualquer tipo de utilização, representando um dos melhores dispositivos móveis já feitos. A tela de 4.7 polegadas é um verdadeiro record que coloca esse Apple no topo de sua categoria. A resolução também é alta: 1334x750 pixel. As funcionalidades of','R$ 4.000,00',23,'Branco','ïphone 6','120 kg','1 ano com a própria empresa','1','2015-09-27 20:03:52','2015-09-27 20:03:52',NULL),(3,6,'Moto x 2º Geração 4g','A Motorola inova em tecnologia trazendo a 2ª geração do incrível Moto X, um aparelho com uma série de novas tecnologias que já era capaz de antecipar seus desejos e conta agora com mais interação com usuário através da voz. Seu design renovado e cheio de estilo traz um fino acabamento metálico na borda e Tela Nítida Full HD de 5,2 Polegadas.','R$ 1.000,00',11,'Branco','Moto x 2 geração','100 kg','3 meses com a loja e 1 ano com a fabrica','1','2015-09-27 20:07:01','2015-09-27 20:07:01',NULL),(4,6,'Tablet LG Pad 8','Faça tudo o que quiser, sem travar ou ficar lento. O Tablet LG G Pad 8, possui processador Quad-Core 1.2 Ghz da Qualcomm e tela de Smart TV LG com 8\" HD de alta definição com tecnologia IPS. Atenda ou rejeite chamadas e responda mensagens do seu Smartphone Android (de qualquer marca) com o QPair 2.0. Além disso, tenha uma fácil usabilidade. Use-o como c','R$ 400,00',21,'Preto','LG','1 kg','1 ano com a fábrica','1','2015-09-27 20:09:38','2015-09-27 20:09:38',NULL);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos_categorias`
--

DROP TABLE IF EXISTS `produtos_categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produtos_categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produtos_id` int(11) DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos_categorias`
--

LOCK TABLES `produtos_categorias` WRITE;
/*!40000 ALTER TABLE `produtos_categorias` DISABLE KEYS */;
INSERT INTO `produtos_categorias` VALUES (1,1,5),(2,1,7),(3,1,8),(4,1,1),(5,1,2),(6,1,3),(7,1,10),(8,1,11),(9,2,1),(10,2,3),(11,2,10),(12,2,11),(13,3,1),(14,3,3),(15,4,1),(16,4,2);
/*!40000 ALTER TABLE `produtos_categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos_imagem`
--

DROP TABLE IF EXISTS `produtos_imagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produtos_imagem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produtos_id` int(11) DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL,
  `caminho` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `caminho_completo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos_imagem`
--

LOCK TABLES `produtos_imagem` WRITE;
/*!40000 ALTER TABLE `produtos_imagem` DISABLE KEYS */;
INSERT INTO `produtos_imagem` VALUES (1,1,1,'uploads/produto/1/','p_produto-teste_2014-07-28_0.jpg','uploads/produto/1/p_produto-teste_2014-07-28_0.jpg','2015-09-12 15:44:59','2015-09-12 15:44:59',NULL),(2,1,2,'uploads/produto/1/','p_produto-teste_2014-07-28_1.jpg','uploads/produto/1/p_produto-teste_2014-07-28_1.jpg','2015-09-12 15:45:10','2015-09-12 15:45:10',NULL),(3,2,1,'uploads/produto/2/','120998637G1.jpg','uploads/produto/2/120998637G1.jpg','2015-09-27 20:04:51','2015-09-27 20:04:51',NULL),(4,3,1,'uploads/produto/3/','url.jpg','uploads/produto/3/url.jpg','2015-09-27 20:07:26','2015-09-27 20:07:26',NULL),(5,4,1,'uploads/produto/4/','tablet-lg-g-pad-8-16gb-tela-8-wi-fi-android-4.4processador-quad-core-camera-5mp-frontal-088277500.jp','uploads/produto/4/tablet-lg-g-pad-8-16gb-tela-8-wi-fi-android-4.4processador-quad-core-camera-5mp-frontal-088277500.jpg','2015-09-27 20:10:01','2015-09-27 20:10:01',NULL);
/*!40000 ALTER TABLE `produtos_imagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ruas`
--

DROP TABLE IF EXISTS `ruas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ruas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `centro_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ruas`
--

LOCK TABLES `ruas` WRITE;
/*!40000 ALTER TABLE `ruas` DISABLE KEYS */;
INSERT INTO `ruas` VALUES (1,'Rua Hum',2,'2016-06-16 15:10:27','2016-06-16 15:10:27','0000-00-00 00:00:00'),(16,'Rua Dois',2,'2016-06-16 15:10:40','2016-06-16 15:10:40','0000-00-00 00:00:00'),(17,'Rua tres',2,'2016-06-16 15:10:53','2016-06-16 15:10:53','0000-00-00 00:00:00'),(18,'Rua Quatro',2,'2016-06-16 15:11:08','2016-06-16 15:11:08','0000-00-00 00:00:00'),(19,'Rua Teste',1,'2016-06-07 07:05:52','2016-06-07 10:05:52','0000-00-00 00:00:00'),(20,'Rua Cinco',2,'2016-06-16 15:11:26','2016-06-16 15:11:26','0000-00-00 00:00:00'),(21,'av nazare',4,'2016-07-12 23:54:59','2016-07-12 23:54:59','0000-00-00 00:00:00'),(22,'rua oito',1,'2016-09-15 22:43:00','2016-09-15 22:43:00','0000-00-00 00:00:00'),(23,'Rua seis',2,'2016-11-26 13:02:04','2016-11-26 13:02:04','0000-00-00 00:00:00'),(24,'sete',2,'2017-01-13 12:50:21','2017-01-13 12:50:21','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `ruas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `texto_site`
--

DROP TABLE IF EXISTS `texto_site`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `texto_site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
  `descricao` varchar(1000) COLLATE utf8_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `texto_site`
--

LOCK TABLES `texto_site` WRITE;
/*!40000 ALTER TABLE `texto_site` DISABLE KEYS */;
INSERT INTO `texto_site` VALUES (4,'quemSomos','<p style=\"line-height: 17.1429px;\">Hello Dmitry,</p><p style=\"line-height: 17.1429px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ligula risus, viverra sit amet purus id, ullamcorper venenatis leo. Ut vitae semper neque. Nunc vel lacus vel erat sodales ultricies sed sed massa. Duis non elementum velit. Nunc quis molestie dui. Nullam ullamcorper lectus in mattis volutpat. Nunc egestas felis sit amet ultrices euismod. Donec lacinia neque vel quam pharetra, non dignissim arcu semper. Donec ultricies, neque ut vehicula ultrices, ligula velit sodales purus, eget eleifend libero risus sed turpis. Fusce hendrerit vel dui ut pulvinar. Ut sed tristique ante, sed egestas turpis. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><p style=\"line-height: 17.1429px;\">Fusce sit amet dui at nunc laoreet facilisis. Proin consequat orci sollicitudin sem cursus, quis vehicula eros ultrices. Cras fermentum justo at nibh tincidunt, consectetur elementum est aliquam.</p>','2015-09-28 23:25:57','2015-09-29 04:54:10'),(5,'termosUso','<p><span style=\"line-height: 17.1429px;\">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </span></p><p><span style=\"line-height: 17.1429px;\">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </span></p><p><span style=\"line-height: 17.1429px;\">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? </span></p><p><span style=\"line-height: 17.1429px;\">Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur,','2015-09-28 23:25:57','2015-09-28 23:25:57'),(6,'faleConosco','Caso tenha alguma dúvida, sugestão ou reclamação a fazer, por favor, entre em contato conosco, e responderemos ao seu contato o mais rápido possível.','2015-09-28 23:25:57','2015-09-28 23:25:57');
/*!40000 ALTER TABLE `texto_site` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `remember_token` varchar(64) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `sobrenome` varchar(50) DEFAULT NULL,
  `cpf` varchar(18) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `perfil` tinyint(4) DEFAULT NULL,
  `data_nascimento` datetime DEFAULT NULL,
  `company_name` varchar(64) DEFAULT NULL,
  `centro_id` int(11) DEFAULT NULL,
  `rua_id` int(11) DEFAULT NULL,
  `company_numero` varchar(10) DEFAULT NULL,
  `company_loja` varchar(10) DEFAULT NULL,
  `company_andar` varchar(10) DEFAULT NULL,
  `company_email` varchar(100) DEFAULT NULL,
  `company_site` varchar(100) DEFAULT NULL,
  `company_telefone` varchar(18) DEFAULT NULL,
  `company_tags` varchar(300) DEFAULT NULL,
  `company_logotipo` varchar(300) DEFAULT NULL,
  `pacote_id` int(11) DEFAULT NULL,
  `data_vencimento` timestamp NULL DEFAULT NULL,
  `favorito` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(4) DEFAULT NULL,
  `categoria` tinyint(1) DEFAULT '0',
  `visualizado` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (5,'denisthadeu@hotmail.com','$2y$10$QNqTo/3mj6ludx/fHV/CkeHzRAS9sQvn2uP.2DgvTBroRAszbMz0K','6Opp1eq5lxecpSKoeCSooFdwx4yXK17N7sy1pSvY8MdOGYZruqP051BksdgE','Dênis','Baptista','','','',1,NULL,'Dênis LTDA',2,17,'12','12','12','denis@comercial.com.br','denis.com.br','(21) 1212-12121','games,hardware,web','/uploads/logotipos/5_244097.jpg',9,'2016-12-26 12:59:05',0,1,0,1,'2015-08-01 03:58:51','2016-12-09 13:48:47'),(6,'denis@softbrazil.com.br','$2y$10$QNqTo/3mj6ludx/fHV/CkeHzRAS9sQvn2uP.2DgvTBroRAszbMz0K','ud928Zimi9fJ79D2gzIUlI8O2xOnteag5mMPzwyImgyZlsUhOdMRLUahr8Xy','Dênis Thadeu','Leal Baptista','042.931.911-86','(21) 3325-6564','(21) 9915-48350',2,NULL,'Denis LTDA',2,1,'209','214','2','denis.baptista91@gmail.com','www.denisbaptista.com.br','(21) 3325-6564','WebDesign,Programador,PHP','/uploads/logotipos/2_3.jpg',9,'2016-12-26 13:16:25',0,1,0,1,'2015-08-28 03:46:56','2016-11-26 13:16:25'),(7,'viniciusfsfaria@gmail.com','$2y$10$cRVcRXxtqoIy7vuRIjuoV.36JUfbL5SeeBGRHs94zSoHsPe7JkWZm','G5NIvBWXXyQf5XA3NUIXwqM19PEkmhTplRAIUhF4UObgCaEkanOTy5l25hwn','Vinicius','Faria',NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,0,1,'2015-09-01 02:16:13','2016-06-09 04:05:57'),(8,'antoniovietri@gmail.com','$2y$10$UsFgV/f4fZYro5GtvUetYuxX8tSK8tL5qxosHx5UUUXvcyhYLrwjW','fZNMLGy0rf21tHdL1TSyDgdeCSt0dln3br2aapIl6WQOzboh2RS9P5KYMj5P','Antonio ','Vietri',NULL,NULL,NULL,1,NULL,'Admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,0,1,'2015-09-02 22:56:02','2017-01-13 14:16:06'),(9,'dudynhaa_91@hotmail.com','$2y$10$TfRJkUFwwv81nYEH/BBdN.7r/GTkHOnS3wvzkM8dlFERVgtqFcV1a',NULL,'maria eduarda','araujo',NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,0,1,'2015-09-04 22:33:21','2016-06-09 04:05:40'),(34,'willy_maciel@live.com','$2y$10$UsFgV/f4fZYro5GtvUetYuxX8tSK8tL5qxosHx5UUUXvcyhYLrwjW','7Qkm5sOl0NWNgR0xs0uNXjGvMotXqB8sg72TrXdc4qNjUJAGZ6qO4FmCxhwh','Willy','Maciel','111.111.111-11','(21) 2424-2454','(21) 9999-99999',2,NULL,'WillySoft',1,19,'23','10','5','email@comercial.com','site.com.br','(21) 2222-42222','games,lojas,teste',NULL,10,'2016-10-15 22:39:39',1,1,1,1,'2016-06-07 12:25:07','2016-09-15 22:47:17'),(35,'',NULL,NULL,'Teste','','','','',2,NULL,'',2,16,'','','','','','','',NULL,9,'2016-06-21 03:00:00',0,1,0,1,'2016-06-07 16:09:40','2017-01-13 12:47:21'),(36,'teste@novo.com','$2y$10$ZwBqCOVWWFdxpdg0rOXyjOMw8lqqOZIeOxjAEnbdqM/4e.gdCBa82',NULL,'Novo n','Teste','444.444.444-44','(21) 2222-1111','(21) 9999-99999',2,NULL,'Empresa Teste',2,17,'21','2','3','email@comercial.com.br','site.empresa.com','(21) 1111-11111','tag1,tag2,tag3,tag4,denis,teste',NULL,1,'2017-01-02 23:19:28',1,1,1,1,'2016-06-07 16:17:27','2016-10-05 00:19:28'),(37,'nova@loja.com','$2y$10$f5VBdTl8BWGYFwStqGvkhOcVpbdCjumciXnf60C4tRO.OwPNhuB9u',NULL,'Nova Loja','','123.123.123-12','(23) 1231-2312','(12) 3123-12312',2,NULL,'Loja Favorita',2,17,'2','2','2','loja@favorita.com','site','(22) 2222-22222','php,hardware,games,denis,teste',NULL,0,'2016-08-07 03:00:00',0,1,0,1,'2016-06-08 05:06:13','2016-06-16 15:50:19'),(38,'aaaa@aaaa.com.br',NULL,NULL,'aaaa','','','','',2,NULL,'aaaa',2,16,'1','1','1','','','(11) 1111-11111','teste,teste aaaa',NULL,1,'2016-09-14 03:00:00',0,1,1,1,'2016-06-16 07:05:47','2016-06-16 15:59:46'),(39,'',NULL,NULL,'bbbb','','','','',2,NULL,'bbbb',2,16,'2','2','2','bbbb@bbbb.com.br','','','teste,teste bbbb',NULL,7,'2016-08-15 03:00:00',0,1,1,1,'2016-06-16 07:06:54','2016-06-21 23:28:48'),(40,'',NULL,NULL,'cccc','','','','',2,NULL,'cccc',2,16,'3','3','3','cccc@cccc.com.br','','','teste,teste cccc',NULL,8,'2016-07-01 03:00:00',1,1,0,1,'2016-06-16 07:07:52','2016-06-21 23:25:10'),(41,'',NULL,NULL,'dddd','','','','',2,NULL,'dddd',2,18,'4','4','4','dddd@dddd.com.br','','','teste,teste dddd',NULL,9,'2016-06-21 03:00:00',0,1,0,1,'2016-06-16 07:09:39','2016-06-16 15:25:50'),(42,'',NULL,NULL,'eeee','','','','',2,NULL,'eeee',2,18,'5','5','5','','','','teste,teste eeee',NULL,7,'2016-09-11 00:05:38',0,1,1,1,'2016-06-16 07:10:57','2016-07-13 00:05:38'),(43,'',NULL,NULL,'ffff','','','','',2,NULL,'ffff',2,20,'6','6','6','','','','teste,teste ffff',NULL,7,'2016-08-15 03:00:00',0,1,0,1,'2016-06-16 15:27:41','2016-06-16 15:41:33'),(44,'',NULL,NULL,'GGGG','','','','',2,NULL,'GGGG',2,1,'7','7','7','','','','TESTE,teste gggg',NULL,8,'2016-07-01 03:00:00',0,1,0,1,'2016-06-16 15:41:04','2016-06-16 15:43:38'),(45,'',NULL,NULL,'KKKK','KKKK','','','',2,NULL,'KKKK',2,1,'11','11','11','KKKK@KKKK.COM.BR','','',NULL,NULL,7,'2017-01-25 12:58:06',0,0,1,1,'2016-07-13 00:02:38','2016-11-26 12:58:06'),(46,'filipecmart@gmail.com','$2y$10$suiPRM9wPEkRIqAEOMREfO0UTKhdWV00cK6.aJHfgs94dNWEUsRYe','AA8LVDfUpd56kDWzPbovIlEz71gZQBVFndCbQzPq1zOJjB51YL63DqK3Yn5B','filipe','','','','',2,NULL,'filipe',2,23,'123','123','123','','','(55) 5555-66666','esmeralda,novo teste',NULL,NULL,NULL,1,1,1,1,'2016-12-09 13:53:05','2016-12-12 15:24:46'),(47,'cinde@amo.com.br','$2y$10$TBKfK/uY9c0H3r7HQznbleyKXfeAuSHKyEy2RF3hWXktxZwv0gGji','68MVXd4ER0qNG9E59f7GO9Dxvir8GydbEAU7jaD5Wm91WF6aQN14qvd6LQTh','cinde','','111.111.111-11','','',2,NULL,'CINDEEE',2,20,'1','1','1','','','','estrela,contabil',NULL,9,'2017-02-12 14:05:54',0,1,1,1,'2017-01-13 12:52:28','2017-01-13 14:12:57'),(48,'peleco@peleco.com.br','$2y$10$qw2DGoSo2pEw0jCOQCoclup6VNM5zy6Bz1EErTHxOLgHb1sAAtDXK',NULL,'peleco','','','','',2,NULL,'',2,20,'','','','','','','AR CONDICIONADO',NULL,9,'2017-02-12 14:03:18',0,1,0,1,'2017-01-13 13:33:12','2017-01-13 14:03:59'),(49,'TOTO@TOTO.COM.BR','$2y$10$zjkgrrLrBySOTweNAjxJQOm9LehKtAH0RfEOLapoK1U0fAYsIxMly','bFlsrygJO3IkmP6md660LqvsU8fk6vv77K77jVeo9VjXihF2FPKwc27GYyR1','TOTO','','','','',2,NULL,'',2,20,'12','1','','','','','TV',NULL,9,'2017-02-12 14:02:16',0,1,0,1,'2017-01-13 13:58:43','2017-01-13 14:15:51');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_categorias`
--

DROP TABLE IF EXISTS `user_categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_categorias`
--

LOCK TABLES `user_categorias` WRITE;
/*!40000 ALTER TABLE `user_categorias` DISABLE KEYS */;
INSERT INTO `user_categorias` VALUES (1,34,69),(25,40,71),(26,41,72),(28,39,73),(31,8,5),(33,46,86),(34,46,72),(35,35,74),(38,47,79);
/*!40000 ALTER TABLE `user_categorias` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-06 17:07:27
