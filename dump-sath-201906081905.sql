-- MySQL dump 10.13  Distrib 5.7.21, for Win64 (x86_64)
--
-- Host: localhost    Database: sath
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.26-MariaDB

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
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cursos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cursos_creator_id_foreign` (`creator_id`),
  CONSTRAINT `cursos_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` VALUES (1,'tste',NULL,1,'2019-05-24 04:31:54','2019-05-24 04:31:54'),(2,'ssdaasd',NULL,1,'2019-05-24 05:43:08','2019-05-24 05:43:08');
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_05_20_084659_create_cursos_table',2),(4,'2019_05_20_085612_create_semestres_table',2),(5,'2019_05_20_085632_create_turnos_table',2),(6,'2019_05_20_085703_create_perguntas_table',2),(7,'2019_05_22_020512_create_turmas_table',2),(8,'2019_05_23_083857_create_projetos_table',2),(9,'2019_05_24_022410_create_questionarios_table',3),(10,'2019_05_29_083402_create_turma_aluno_table',4),(11,'2019_06_01_234726_create_questionario_pergunta_table',5),(12,'2019_06_02_015636_create_projeto_aluno_table',6),(13,'2019_06_02_015917_create_projeto_professor_table',6),(14,'2019_06_02_020156_add_collum_turma_id_projetos_table',6),(15,'2019_06_02_022652_alter_colunm_media',7),(16,'2019_06_02_054553_add_medida_projeto',8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perguntas`
--

DROP TABLE IF EXISTS `perguntas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perguntas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `perguntas_creator_id_foreign` (`creator_id`),
  CONSTRAINT `perguntas_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perguntas`
--

LOCK TABLES `perguntas` WRITE;
/*!40000 ALTER TABLE `perguntas` DISABLE KEYS */;
INSERT INTO `perguntas` VALUES (1,'sSas','aSasAS',1,'2019-05-24 05:39:15','2019-05-24 05:39:15'),(2,'vxcvxcv',NULL,1,'2019-05-24 05:49:40','2019-05-24 05:49:40'),(3,'sasdasdasdasd','aSasAS',1,'2019-05-24 05:39:15','2019-05-24 05:39:15');
/*!40000 ALTER TABLE `perguntas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projeto_aluno`
--

DROP TABLE IF EXISTS `projeto_aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projeto_aluno` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `projeto_id` bigint(20) unsigned NOT NULL,
  `aluno_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `projeto_aluno_projeto_id_foreign` (`projeto_id`),
  KEY `projeto_aluno_aluno_id_foreign` (`aluno_id`),
  CONSTRAINT `projeto_aluno_aluno_id_foreign` FOREIGN KEY (`aluno_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `projeto_aluno_projeto_id_foreign` FOREIGN KEY (`projeto_id`) REFERENCES `projetos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projeto_aluno`
--

LOCK TABLES `projeto_aluno` WRITE;
/*!40000 ALTER TABLE `projeto_aluno` DISABLE KEYS */;
INSERT INTO `projeto_aluno` VALUES (1,5,2,NULL,NULL);
/*!40000 ALTER TABLE `projeto_aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projeto_professor`
--

DROP TABLE IF EXISTS `projeto_professor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projeto_professor` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `projeto_id` bigint(20) unsigned NOT NULL,
  `aluno_id` bigint(20) unsigned NOT NULL,
  `media` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `projeto_professor_projeto_id_foreign` (`projeto_id`),
  KEY `projeto_professor_aluno_id_foreign` (`aluno_id`),
  CONSTRAINT `projeto_professor_aluno_id_foreign` FOREIGN KEY (`aluno_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `projeto_professor_projeto_id_foreign` FOREIGN KEY (`projeto_id`) REFERENCES `projetos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projeto_professor`
--

LOCK TABLES `projeto_professor` WRITE;
/*!40000 ALTER TABLE `projeto_professor` DISABLE KEYS */;
INSERT INTO `projeto_professor` VALUES (1,5,3,10,NULL,NULL);
/*!40000 ALTER TABLE `projeto_professor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projetos`
--

DROP TABLE IF EXISTS `projetos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projetos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `turma_id` bigint(20) unsigned NOT NULL,
  `media` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `projetos_creator_id_foreign` (`creator_id`),
  KEY `projetos_turma_id_foreign` (`turma_id`),
  CONSTRAINT `projetos_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`),
  CONSTRAINT `projetos_turma_id_foreign` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projetos`
--

LOCK TABLES `projetos` WRITE;
/*!40000 ALTER TABLE `projetos` DISABLE KEYS */;
INSERT INTO `projetos` VALUES (1,'asdasd','asdasdasdasd',1,'2019-06-02 05:15:54','2019-06-02 05:15:54',1,NULL),(2,'dasdas','dasdasd',1,'2019-06-02 05:19:31','2019-06-02 05:19:31',1,NULL),(3,'saddsdas','asdasd',1,'2019-06-02 05:20:49','2019-06-02 05:20:49',1,NULL),(4,'sdasd','sadsad',1,'2019-06-02 05:21:33','2019-06-02 05:21:33',1,NULL),(5,'sdasd','sadsad',1,'2019-06-02 05:43:50','2019-06-02 05:43:50',1,10);
/*!40000 ALTER TABLE `projetos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questionario_pergunta`
--

DROP TABLE IF EXISTS `questionario_pergunta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questionario_pergunta` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `questonario_id` bigint(20) unsigned NOT NULL,
  `pergunta_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `questionario_pergunta_questonario_id_foreign` (`questonario_id`),
  KEY `questionario_pergunta_pergunta_id_foreign` (`pergunta_id`),
  CONSTRAINT `questionario_pergunta_pergunta_id_foreign` FOREIGN KEY (`pergunta_id`) REFERENCES `perguntas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `questionario_pergunta_questonario_id_foreign` FOREIGN KEY (`questonario_id`) REFERENCES `questionarios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questionario_pergunta`
--

LOCK TABLES `questionario_pergunta` WRITE;
/*!40000 ALTER TABLE `questionario_pergunta` DISABLE KEYS */;
INSERT INTO `questionario_pergunta` VALUES (1,3,1,NULL,NULL),(2,3,3,NULL,NULL);
/*!40000 ALTER TABLE `questionario_pergunta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questionarios`
--

DROP TABLE IF EXISTS `questionarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questionarios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creator_id` bigint(20) unsigned NOT NULL,
  `turma_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `questionarios_creator_id_foreign` (`creator_id`),
  CONSTRAINT `questionarios_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questionarios`
--

LOCK TABLES `questionarios` WRITE;
/*!40000 ALTER TABLE `questionarios` DISABLE KEYS */;
INSERT INTO `questionarios` VALUES (1,'dasdd',1,2,'2019-06-02 02:44:19','2019-06-02 02:44:19'),(2,'dasdd',1,2,'2019-06-02 02:44:32','2019-06-02 02:44:32'),(3,'rwerwer',1,2,'2019-06-02 03:01:16','2019-06-02 03:01:16');
/*!40000 ALTER TABLE `questionarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resposta`
--

DROP TABLE IF EXISTS `resposta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resposta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pergunta_id` int(11) NOT NULL,
  `Questionario_id` int(11) NOT NULL,
  `Aluno_id` int(11) NOT NULL,
  `resposta` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resposta`
--

LOCK TABLES `resposta` WRITE;
/*!40000 ALTER TABLE `resposta` DISABLE KEYS */;
INSERT INTO `resposta` VALUES (1,1,3,2,5),(2,3,3,2,4),(3,3,3,1,3);
/*!40000 ALTER TABLE `resposta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `semestres`
--

DROP TABLE IF EXISTS `semestres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `semestres` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `semestres_creator_id_foreign` (`creator_id`),
  CONSTRAINT `semestres_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `semestres`
--

LOCK TABLES `semestres` WRITE;
/*!40000 ALTER TABLE `semestres` DISABLE KEYS */;
INSERT INTO `semestres` VALUES (1,'teste','sfdfsdf',1,'2019-05-24 04:34:27','2019-05-24 04:34:27');
/*!40000 ALTER TABLE `semestres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turma_aluno`
--

DROP TABLE IF EXISTS `turma_aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turma_aluno` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `turma_id` bigint(20) unsigned NOT NULL,
  `aluno_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `turma_aluno_turma_id_foreign` (`turma_id`),
  KEY `turma_aluno_aluno_id_foreign` (`aluno_id`),
  CONSTRAINT `turma_aluno_aluno_id_foreign` FOREIGN KEY (`aluno_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `turma_aluno_turma_id_foreign` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turma_aluno`
--

LOCK TABLES `turma_aluno` WRITE;
/*!40000 ALTER TABLE `turma_aluno` DISABLE KEYS */;
INSERT INTO `turma_aluno` VALUES (1,2,2,NULL,NULL);
/*!40000 ALTER TABLE `turma_aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turmas`
--

DROP TABLE IF EXISTS `turmas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turmas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator_id` bigint(20) unsigned NOT NULL,
  `curso_id` bigint(20) unsigned NOT NULL,
  `turno_id` bigint(20) unsigned NOT NULL,
  `semestre_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `turmas_creator_id_foreign` (`creator_id`),
  KEY `turmas_curso_id_foreign` (`curso_id`),
  KEY `turmas_turno_id_foreign` (`turno_id`),
  KEY `turmas_semestre_id_foreign` (`semestre_id`),
  CONSTRAINT `turmas_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`),
  CONSTRAINT `turmas_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `turmas_semestre_id_foreign` FOREIGN KEY (`semestre_id`) REFERENCES `semestres` (`id`) ON DELETE CASCADE,
  CONSTRAINT `turmas_turno_id_foreign` FOREIGN KEY (`turno_id`) REFERENCES `turnos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turmas`
--

LOCK TABLES `turmas` WRITE;
/*!40000 ALTER TABLE `turmas` DISABLE KEYS */;
INSERT INTO `turmas` VALUES (1,'sdasdasd','aqwewqeqwe',1,1,1,1,'2019-05-24 05:10:16','2019-05-24 05:10:16'),(2,'erwer','werewrw',1,1,1,1,'2019-06-02 02:18:27','2019-06-02 02:18:27');
/*!40000 ALTER TABLE `turmas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turnos`
--

DROP TABLE IF EXISTS `turnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turnos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `turnos_creator_id_foreign` (`creator_id`),
  CONSTRAINT `turnos_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turnos`
--

LOCK TABLES `turnos` WRITE;
/*!40000 ALTER TABLE `turnos` DISABLE KEYS */;
INSERT INTO `turnos` VALUES (1,'sdfsadf','sadfasdf',1,'2019-05-24 04:34:39','2019-05-24 04:34:39');
/*!40000 ALTER TABLE `turnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `login` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perfil` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_login_unique` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Thiago','vinhas.thiago@gmail.com',NULL,'123456','$2y$10$PiQvR/AapI1zwOKYStzQ9eOZAR5EqMqVhPKfKQgd67l1JSFwAXMJy','administrador',NULL,'2019-05-20 11:43:33','2019-05-20 11:43:33'),(2,'João','Joao@teste.com',NULL,'213123','$2y$10$2zf/2.khkgdYc3tjJjfNRe1FERuWF9p8sSbvZAHhDuXALvgi8XQ.i','aluno',NULL,'2019-05-24 05:59:58','2019-05-24 05:59:58'),(3,'Paulo','paulo@teste.com',NULL,'345345435','$2y$10$J1y469Tlji6MrWrq8FN1m.jBVx.EBG/OqjVaWhUiakdCnfnhjX/K6','professor',NULL,'2019-05-24 06:00:40','2019-05-24 06:00:40');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'sath'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-06-08 19:05:09
