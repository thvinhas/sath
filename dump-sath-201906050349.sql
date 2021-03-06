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
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` VALUES (1,'tste',NULL,1,'2019-05-24 04:31:54','2019-05-24 04:31:54');
INSERT INTO `cursos` VALUES (2,'ssdaasd',NULL,1,'2019-05-24 05:43:08','2019-05-24 05:43:08');
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1);
INSERT INTO `migrations` VALUES (2,'2014_10_12_100000_create_password_resets_table',1);
INSERT INTO `migrations` VALUES (3,'2019_05_20_084659_create_cursos_table',2);
INSERT INTO `migrations` VALUES (4,'2019_05_20_085612_create_semestres_table',2);
INSERT INTO `migrations` VALUES (5,'2019_05_20_085632_create_turnos_table',2);
INSERT INTO `migrations` VALUES (6,'2019_05_20_085703_create_perguntas_table',2);
INSERT INTO `migrations` VALUES (7,'2019_05_22_020512_create_turmas_table',2);
INSERT INTO `migrations` VALUES (8,'2019_05_23_083857_create_projetos_table',2);
INSERT INTO `migrations` VALUES (9,'2019_05_24_022410_create_questionarios_table',3);
INSERT INTO `migrations` VALUES (10,'2019_05_29_083402_create_turma_aluno_table',4);
INSERT INTO `migrations` VALUES (11,'2019_06_01_234726_create_questionario_pergunta_table',5);
INSERT INTO `migrations` VALUES (12,'2019_06_02_015636_create_projeto_aluno_table',6);
INSERT INTO `migrations` VALUES (13,'2019_06_02_015917_create_projeto_professor_table',6);
INSERT INTO `migrations` VALUES (14,'2019_06_02_020156_add_collum_turma_id_projetos_table',6);
INSERT INTO `migrations` VALUES (15,'2019_06_02_022652_alter_colunm_media',7);
INSERT INTO `migrations` VALUES (16,'2019_06_02_054553_add_medida_projeto',8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `perguntas`
--

LOCK TABLES `perguntas` WRITE;
/*!40000 ALTER TABLE `perguntas` DISABLE KEYS */;
INSERT INTO `perguntas` VALUES (1,'sSas','aSasAS',1,'2019-05-24 05:39:15','2019-05-24 05:39:15');
INSERT INTO `perguntas` VALUES (2,'vxcvxcv',NULL,1,'2019-05-24 05:49:40','2019-05-24 05:49:40');
INSERT INTO `perguntas` VALUES (3,'sasdasdasdasd','aSasAS',1,'2019-05-24 05:39:15','2019-05-24 05:39:15');
/*!40000 ALTER TABLE `perguntas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `projeto_aluno`
--

LOCK TABLES `projeto_aluno` WRITE;
/*!40000 ALTER TABLE `projeto_aluno` DISABLE KEYS */;
INSERT INTO `projeto_aluno` VALUES (1,5,2,NULL,NULL);
/*!40000 ALTER TABLE `projeto_aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `projeto_professor`
--

LOCK TABLES `projeto_professor` WRITE;
/*!40000 ALTER TABLE `projeto_professor` DISABLE KEYS */;
INSERT INTO `projeto_professor` VALUES (1,5,3,10,NULL,NULL);
/*!40000 ALTER TABLE `projeto_professor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `projetos`
--

LOCK TABLES `projetos` WRITE;
/*!40000 ALTER TABLE `projetos` DISABLE KEYS */;
INSERT INTO `projetos` VALUES (1,'asdasd','asdasdasdasd',1,'2019-06-02 05:15:54','2019-06-02 05:15:54',1,NULL);
INSERT INTO `projetos` VALUES (2,'dasdas','dasdasd',1,'2019-06-02 05:19:31','2019-06-02 05:19:31',1,NULL);
INSERT INTO `projetos` VALUES (3,'saddsdas','asdasd',1,'2019-06-02 05:20:49','2019-06-02 05:20:49',1,NULL);
INSERT INTO `projetos` VALUES (4,'sdasd','sadsad',1,'2019-06-02 05:21:33','2019-06-02 05:21:33',1,NULL);
INSERT INTO `projetos` VALUES (5,'sdasd','sadsad',1,'2019-06-02 05:43:50','2019-06-02 05:43:50',1,10);
/*!40000 ALTER TABLE `projetos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `questionario_pergunta`
--

LOCK TABLES `questionario_pergunta` WRITE;
/*!40000 ALTER TABLE `questionario_pergunta` DISABLE KEYS */;
INSERT INTO `questionario_pergunta` VALUES (1,3,1,NULL,NULL);
INSERT INTO `questionario_pergunta` VALUES (2,3,3,NULL,NULL);
/*!40000 ALTER TABLE `questionario_pergunta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `questionarios`
--

LOCK TABLES `questionarios` WRITE;
/*!40000 ALTER TABLE `questionarios` DISABLE KEYS */;
INSERT INTO `questionarios` VALUES (1,'dasdd',1,2,'2019-06-02 02:44:19','2019-06-02 02:44:19');
INSERT INTO `questionarios` VALUES (2,'dasdd',1,2,'2019-06-02 02:44:32','2019-06-02 02:44:32');
INSERT INTO `questionarios` VALUES (3,'rwerwer',1,2,'2019-06-02 03:01:16','2019-06-02 03:01:16');
/*!40000 ALTER TABLE `questionarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `resposta`
--

LOCK TABLES `resposta` WRITE;
/*!40000 ALTER TABLE `resposta` DISABLE KEYS */;
INSERT INTO `resposta` VALUES (1,1,3,2,5);
INSERT INTO `resposta` VALUES (2,3,3,2,4);
INSERT INTO `resposta` VALUES (3,3,3,1,3);
/*!40000 ALTER TABLE `resposta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `semestres`
--

LOCK TABLES `semestres` WRITE;
/*!40000 ALTER TABLE `semestres` DISABLE KEYS */;
INSERT INTO `semestres` VALUES (1,'teste','sfdfsdf',1,'2019-05-24 04:34:27','2019-05-24 04:34:27');
/*!40000 ALTER TABLE `semestres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `turma_aluno`
--

LOCK TABLES `turma_aluno` WRITE;
/*!40000 ALTER TABLE `turma_aluno` DISABLE KEYS */;
INSERT INTO `turma_aluno` VALUES (1,2,2,NULL,NULL);
/*!40000 ALTER TABLE `turma_aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `turmas`
--

LOCK TABLES `turmas` WRITE;
/*!40000 ALTER TABLE `turmas` DISABLE KEYS */;
INSERT INTO `turmas` VALUES (1,'sdasdasd','aqwewqeqwe',1,1,1,1,'2019-05-24 05:10:16','2019-05-24 05:10:16');
INSERT INTO `turmas` VALUES (2,'erwer','werewrw',1,1,1,1,'2019-06-02 02:18:27','2019-06-02 02:18:27');
/*!40000 ALTER TABLE `turmas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `turnos`
--

LOCK TABLES `turnos` WRITE;
/*!40000 ALTER TABLE `turnos` DISABLE KEYS */;
INSERT INTO `turnos` VALUES (1,'sdfsadf','sadfasdf',1,'2019-05-24 04:34:39','2019-05-24 04:34:39');
/*!40000 ALTER TABLE `turnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Thiago','vinhas.thiago@gmail.com',NULL,'123456','$2y$10$PiQvR/AapI1zwOKYStzQ9eOZAR5EqMqVhPKfKQgd67l1JSFwAXMJy','administrador',NULL,'2019-05-20 11:43:33','2019-05-20 11:43:33');
INSERT INTO `users` VALUES (2,'João','Joao@teste.com',NULL,'213123','$2y$10$2zf/2.khkgdYc3tjJjfNRe1FERuWF9p8sSbvZAHhDuXALvgi8XQ.i','aluno',NULL,'2019-05-24 05:59:58','2019-05-24 05:59:58');
INSERT INTO `users` VALUES (3,'Paulo','paulo@teste.com',NULL,'345345435','$2y$10$J1y469Tlji6MrWrq8FN1m.jBVx.EBG/OqjVaWhUiakdCnfnhjX/K6','professor',NULL,'2019-05-24 06:00:40','2019-05-24 06:00:40');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-06-05  3:49:40
