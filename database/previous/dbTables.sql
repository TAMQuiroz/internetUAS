-- MySQL dump 10.13  Distrib 5.7.9, for osx10.9 (x86_64)
--
-- Host: dp2-prod.cbzmrvgwxay3.us-west-2.rds.amazonaws.com    Database: dp2_production
-- ------------------------------------------------------
-- Server version 5.6.27-log

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
-- Table structure for table `Accion`
--

DROP TABLE IF EXISTS `Accion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Accion` (
  `IdAccion` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdAccion`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Accion`
--

LOCK TABLES `Accion` WRITE;
/*!40000 ALTER TABLE `Accion` DISABLE KEYS */;
INSERT INTO `Accion` VALUES (1,'Editar Periodo',NULL,NULL,NULL),(2,'Editar Ciclo',NULL,NULL,NULL),(3,'Iniciar Ciclo',NULL,NULL,NULL),(4,'Finalizar Ciclo',NULL,NULL,NULL),(5,'Nuevo Curso',NULL,NULL,NULL),(6,'Listar Curso',NULL,NULL,NULL),(7,'Editar Curso',NULL,NULL,NULL),(8,'Borrar Curso',NULL,NULL,NULL),(9,'Ver Curso',NULL,NULL,NULL),(10,'Nuevo Profesor',NULL,NULL,NULL),(11,'Listar Profesor',NULL,NULL,NULL),(12,'Editar Profesor',NULL,NULL,NULL),(13,'Borrar Profesor',NULL,NULL,NULL),(14,'Ver Profesor',NULL,NULL,NULL),(15,'Nuevo Objetivo Educacionales',NULL,NULL,NULL),(16,'Listar Objetivo Educacionales',NULL,NULL,NULL),(17,'Editar Objetivo Educacionales',NULL,NULL,NULL),(18,'Borrar Objetivo Educacionales',NULL,NULL,NULL),(19,'Ver Objetivo Educacionales',NULL,NULL,NULL),(20,'Nuevo Resultado Estudiantil',NULL,NULL,NULL),(21,'Listar Resultado Estudiantil',NULL,NULL,NULL),(22,'Editar Resultado Estudiantil',NULL,NULL,NULL),(23,'Borrar Resultado Estudiantil',NULL,NULL,NULL),(24,'Ver Resultado Estudiantil',NULL,NULL,NULL),(25,'Administrar Aspecto',NULL,NULL,NULL),(26,'Administrar Criterio',NULL,NULL,NULL),(27,'Administrar Nivel de Criterio',NULL,NULL,NULL),(28,'Matriz de Aporte',NULL,NULL,NULL),(29,'Resultados Estudiantiles Evaluados',NULL,NULL,NULL),(30,'Nuevo Instrumentos de Medición',NULL,NULL,NULL),(31,'Listar Instrumentos de Medición',NULL,NULL,NULL),(32,'Editar Instrumentos de Medición',NULL,NULL,NULL),(33,'Borrar Instrumentos de Medición',NULL,NULL,NULL),(34,'Agregar Cursos Dictados',NULL,NULL,NULL),(35,'Ver Cursos Dictados',NULL,NULL,NULL),(36,'Evaluar Cursos con la Tabla de Desempeño',NULL,NULL,NULL),(37,'Informe de Curso',NULL,NULL,NULL),(38,'Carga Alumnos',NULL,NULL,NULL),(39,'Subir Evidencias',NULL,NULL,NULL),(40,'Subir Evidencias de Medicion',NULL,NULL,NULL),(41,'Realizar Sugerencia',NULL,NULL,NULL),(42,'Editar Sugerencia',NULL,NULL,NULL),(43,'Ver Sugerencia',NULL,NULL,NULL),(44,'Buscar Sugerencias',NULL,NULL,NULL),(45,'Agregar Plan de Mejora',NULL,NULL,NULL),(46,'Editar Plan de Mejora',NULL,NULL,NULL),(47,'Ver Plan de Mejora',NULL,NULL,NULL),(48,'Seguimiento Plan de Mejora',NULL,NULL,NULL),(49,'Nuevo Tipos de Plan de Mejora',NULL,NULL,NULL),(50,'Listar Tipos de Plan de Mejora',NULL,NULL,NULL),(51,'Editar Tipos de Plan de Mejora',NULL,NULL,NULL),(52,'Ver Tipos de Plan de Mejora',NULL,NULL,NULL),(53,'Consolidado de Cursos Dictados',NULL,NULL,NULL),(54,'Consolidado de medición',NULL,NULL,NULL),(55,'Consolidado de evaluación',NULL,NULL,NULL),(56,'Consolidado de Resultados de Medición',NULL,NULL,NULL),(57,'Nuevo Usuario',NULL,NULL,NULL),(58,'Listar Usuario',NULL,NULL,NULL),(59,'Editar Usuario',NULL,NULL,NULL),(60,'Borrar Usuario',NULL,NULL,NULL),(61,'Ver Usuario',NULL,NULL,NULL),(62,'Nuevo Perfil',NULL,NULL,NULL),(63,'Listar Perfil',NULL,NULL,NULL),(64,'Editar Perfil',NULL,NULL,NULL),(65,'Borrar Perfil',NULL,NULL,NULL),(66,'Ver Perfil',NULL,NULL,NULL),(67,'Listar Mis Cursos',NULL,NULL,NULL),(68,'Listar Plan de Mejora',NULL,NULL,NULL),(69,'Nuevo Especialidad',NULL,NULL,NULL),(70,'Listar Especialidad',NULL,NULL,NULL),(71,'Editar Especialidad',NULL,NULL,NULL),(72,'Ver Especialidad',NULL,NULL,NULL),(73,'Subir Evidencia Curso',NULL,NULL,NULL),(74,'Administrar Instrumentos de Medicion',NULL,NULL,NULL),(75,'Borrar Plan de Mejora',NULL,NULL,NULL),(76,'Borrar Sugerencia',NULL,NULL,NULL),(77,'Eliminar Tipo Plan de Prueba',NULL,NULL,NULL),(78,'Eliminar Especialidad',NULL,NULL,NULL),(79,'Reporte de Avance de Tabla de Desempeño',NULL,NULL,NULL);
/*!40000 ALTER TABLE `Accion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Acreditador`
--

DROP TABLE IF EXISTS `Acreditador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Acreditador` (
  `IdAcreditador` int(11) NOT NULL AUTO_INCREMENT,
  `IdEspecialidad` int(11) DEFAULT NULL,
  `IdUsuario` int(11) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `ApellidoPaterno` varchar(100) DEFAULT NULL,
  `ApellidoMaterno` varchar(100) DEFAULT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `Vigente` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdAcreditador`),
  KEY `IdEspecialidad` (`IdEspecialidad`),
  KEY `IdUsuario` (`IdUsuario`),
  CONSTRAINT `Acreditador_ibfk_1` FOREIGN KEY (`IdEspecialidad`) REFERENCES `Especialidad` (`IdEspecialidad`),
  CONSTRAINT `Acreditador_ibfk_2` FOREIGN KEY (`IdUsuario`) REFERENCES `Usuario` (`IdUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Acreditador`
--

LOCK TABLES `Acreditador` WRITE;
/*!40000 ALTER TABLE `Acreditador` DISABLE KEYS */;
INSERT INTO `Acreditador` VALUES (1,NULL,6,'John','Smith','Rodriguez','jsmith@abet.org',1,NULL,'2016-06-19 15:36:04','2016-06-19 15:36:04'),(2,1,7,'Petter','Sanchez','Brown','psanchez@abet.org',1,NULL,'2016-06-19 15:47:10','2016-06-19 15:47:10'),(3,3,8,'Roger','Anderson','Greysson','a20105555@pucp.pe',1,NULL,'2016-06-19 16:22:40','2016-06-19 16:22:40'),(4,2,9,'josecarlos','pereyra','leon','jpereyraleon@gmail.com',0,NULL,'2016-06-20 21:35:34','2016-06-20 21:36:32'),(5,2,10,'josecarlos','pereyra','leon','jpereyraleon@gmail.com',0,NULL,'2016-06-20 21:35:34','2016-06-20 21:35:55'),(6,2,11,'josecarlos','pereyra','leon','jpereyraleon@gmail.com',0,NULL,'2016-06-20 21:35:37','2016-06-20 21:35:57'),(7,2,12,'joca','pereyra','leon','jpereyraleon@gmail.com',1,NULL,'2016-06-20 21:37:04','2016-06-20 21:37:04'),(8,1,13,'joca','pereyra','leon','jpereyraleon@gmail.com',1,NULL,'2016-06-23 18:54:30','2016-06-23 18:54:30');
/*!40000 ALTER TABLE `Acreditador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Alumno`
--

DROP TABLE IF EXISTS `Alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Alumno` (
  `IdAlumno` int(11) NOT NULL AUTO_INCREMENT,
  `IdHorario` int(11) DEFAULT NULL,
  `Codigo` char(8) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `ApellidoPaterno` varchar(100) DEFAULT NULL,
  `ApellidoMaterno` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
-- campos agregados para psp
  `id` int(10) DEFAULT NULL, /*id de statuses*/
  `telefono` char(9) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `IdUsuario` int(10) DEFAULT NULL,
  `idPspGroup` int(10) DEFAULT NULL,
  `IdEspecialidad` int(10) DEFAULT NULL,
  `idSupervisor` int(10) DEFAULT NULL,
  `lleva_psp` char(1) DEFAULT NULL,
-- fin de campos agregados para psp
  PRIMARY KEY (`IdAlumno`),
  KEY `IdHorario` (`IdHorario`),
  KEY `IdEspecialidad` (`IdEspecialidad`),
  KEY `IdUsuario` (`IdUsuario`),  
--  KEY `id` (`id`),
--  KEY `idPspGroup` (`idPspGroup`),
--  KEY `idSupervisor` (`idSupervisor`), 
  CONSTRAINT `Alumno_ibfk_1` FOREIGN KEY (`IdHorario`) REFERENCES `Horario` (`IdHorario`),
  CONSTRAINT `Alumno_ibfk_2` FOREIGN KEY (`IdUsuario`) REFERENCES `Usuario` (`IdUsuario`),
  CONSTRAINT `Alumno_ibfk_3` FOREIGN KEY (`IdEspecialidad`) REFERENCES `Especialidad` (`IdEspecialidad`)
--  CONSTRAINT `Alumno_ibfk_4` FOREIGN KEY (`id`) REFERENCES `statuses` (`id`),
--  CONSTRAINT `Alumno_ibfk_5` FOREIGN KEY (`idPspGroup`) REFERENCES `pspgroups` (`idPspGroup`),
--  CONSTRAINT `Alumno_ibfk_6` FOREIGN KEY (`idSupervisor`) REFERENCES `supervisors` (`idSupervisor`)
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Alumno`
--

-- LOCK TABLES `Alumno` WRITE;
-- /*!40000 ALTER TABLE `Alumno` DISABLE KEYS */;
-- INSERT INTO `Alumno` VALUES (25,1,'20072069','JERÍ PIEROBÓN, RAFAEL EDUARDO',NULL,NULL,NULL,'2016-06-19 06:17:52','2016-06-19 06:17:52'),(26,1,'20074330','HURTADO MONTENEGRO, CARLOS ANDRÉS',NULL,NULL,NULL,'2016-06-19 06:17:52','2016-06-19 06:17:52'),(27,1,'20077048','GOYZUETA CALVET, GERARMIN',NULL,NULL,NULL,'2016-06-19 06:17:52','2016-06-19 06:17:52'),(28,1,'20080480','CHUQUILIN ALVA, CARLOS EDUARDO',NULL,NULL,NULL,'2016-06-19 06:17:52','2016-06-19 06:17:52'),(29,1,'20082033','ASMAT RAMÍREZ, EVELYN FIORELLA',NULL,NULL,NULL,'2016-06-19 06:17:52','2016-06-19 06:17:52'),(30,1,'20084813','RÍOS GÁRATE, FERNANDO DANIEL',NULL,NULL,NULL,'2016-06-19 06:17:52','2016-06-19 06:17:52'),(31,1,'20095213','VILLARAN FASANANDO, DIEGO EDUARDO',NULL,NULL,NULL,'2016-06-19 06:17:52','2016-06-19 06:17:52'),(32,1,'20100480','PEREYRA LEON, JOSE CARLOS',NULL,NULL,NULL,'2016-06-19 06:17:52','2016-06-19 06:17:52'),(33,1,'20101528','BARZOLA MATTA, PABLO ALEJANDRO',NULL,NULL,NULL,'2016-06-19 06:17:52','2016-06-19 06:17:52'),(34,1,'20101889','ENCARNACIÓN MENDOZA, MIRIAM LUCERO',NULL,NULL,NULL,'2016-06-19 06:17:52','2016-06-19 06:17:52'),(35,1,'20105435','ROSSI RAMAYONI, DANTE PAOLO JUNIOR',NULL,NULL,NULL,'2016-06-19 06:17:52','2016-06-19 06:17:52'),(36,1,'20105555','GUTIERREZ DELGADO, MARIELLA VICKY',NULL,NULL,NULL,'2016-06-19 06:17:52','2016-06-19 06:17:52'),(71,4,'20072069','JERÍ PIEROBÓN, RAFAEL EDUARDO',NULL,NULL,NULL,'2016-06-24 18:42:44','2016-06-24 18:42:44'),(72,4,'20077243','BEJAR LUQUE, RICARDO JOEL',NULL,NULL,NULL,'2016-06-24 18:42:44','2016-06-24 18:42:44'),(73,4,'20079007','BRUDERER VEGA, RAMON SIMON',NULL,NULL,NULL,'2016-06-24 18:42:44','2016-06-24 18:42:44'),(74,4,'20084048','PUENTERNAN FERNÁNDEZ, WILLY',NULL,NULL,NULL,'2016-06-24 18:42:44','2016-06-24 18:42:44'),(75,4,'20084368','QUIROZ CORAL, MIGUEL ANGEL',NULL,NULL,NULL,'2016-06-24 18:42:44','2016-06-24 18:42:44'),(76,4,'20090242','FERNÁNDEZ SALGADO, ITALO',NULL,NULL,NULL,'2016-06-24 18:42:44','2016-06-24 18:42:44'),(77,4,'20092049','ALVAREZ TENGAN, ALONSO YOSHIO',NULL,NULL,NULL,'2016-06-24 18:42:44','2016-06-24 18:42:44'),(78,4,'20092101','MARROQUÍN RODRÍGUEZ, JOSÉ EDUARDO',NULL,NULL,NULL,'2016-06-24 18:42:44','2016-06-24 18:42:44'),(79,4,'20094131','ESPINOZA TORRES, HENRY ANTONIO',NULL,NULL,NULL,'2016-06-24 18:42:44','2016-06-24 18:42:44'),(80,4,'20095197','URIBE CANCHANYA, IVAN RENATO',NULL,NULL,NULL,'2016-06-24 18:42:44','2016-06-24 18:42:44'),(81,4,'20095401','BANDA MORENO, FERNANDO JAVIER',NULL,NULL,NULL,'2016-06-24 18:42:44','2016-06-24 18:42:44'),(82,4,'20095577','SANDOVAL LINARES, ANGEL GABRIEL',NULL,NULL,NULL,'2016-06-24 18:42:44','2016-06-24 18:42:44'),(83,4,'20097009','CAHUANA MACEDO, FRANZ ANDRÉ',NULL,NULL,NULL,'2016-06-24 18:42:44','2016-06-24 18:42:44'),(84,4,'20100496','GONZALES VÁSQUEZ, ERICK IVAN',NULL,NULL,NULL,'2016-06-24 18:42:44','2016-06-24 18:42:44'),(85,4,'20100846','URQUIZO GÁLVEZ, YEDA VALERIA',NULL,NULL,NULL,'2016-06-24 18:42:44','2016-06-24 18:42:44'),(86,4,'20101200','DE LA CRUZ SAIRITUPA, CARLOS ANDERSON',NULL,NULL,NULL,'2016-06-24 18:42:44','2016-06-24 18:42:44'),(87,4,'20101234','DONGO ALVA, CHRISTIAN OMAR',NULL,NULL,NULL,'2016-06-24 18:42:44','2016-06-24 18:42:44'),(88,4,'20101364','IBAÑEZ OCHOA, MILAGROS DEL PILAR',NULL,NULL,NULL,'2016-06-24 18:42:44','2016-06-24 18:42:44'),(89,4,'20101528','BARZOLA MATTA, PABLO ALEJANDRO',NULL,NULL,NULL,'2016-06-24 18:42:44','2016-06-24 18:42:44'),(90,4,'20101616','DÁVILA GARCÍA, GERARDO PAOLO',NULL,NULL,NULL,'2016-06-24 18:42:44','2016-06-24 18:42:44'),(91,4,'20101692','HOYOS NAVAL, DENNIS FELIX',NULL,NULL,NULL,'2016-06-24 18:42:44','2016-06-24 18:42:44'),(92,4,'20101889','ENCARNACIÓN MENDOZA, MIRIAM LUCERO',NULL,NULL,NULL,'2016-06-24 18:42:44','2016-06-24 18:42:44'),(93,4,'20102513','SIGNOL PINTO, JORGE LUIGUI',NULL,NULL,NULL,'2016-06-24 18:42:44','2016-06-24 18:42:44'),(94,4,'20102550','ROJAS NAPAN, PIER GONSALO',NULL,NULL,NULL,'2016-06-24 18:42:44','2016-06-24 18:42:44'),(95,4,'20105555','GUTIERREZ DELGADO, MARIELLA VICKY',NULL,NULL,NULL,'2016-06-24 18:42:44','2016-06-24 18:42:44'),(96,4,'20110056','VIERA BARTHELMES, CECILIA DEL PILAR',NULL,NULL,NULL,'2016-06-24 18:42:44','2016-06-24 18:42:44'),(97,4,'20110871','SARMIENTO TELLO, SAMOEL BENJAMÍN',NULL,NULL,NULL,'2016-06-24 18:42:44','2016-06-24 18:42:44'),(98,4,'20110914','BRAVO ROJAS, ANDREA XIMENA',NULL,NULL,NULL,'2016-06-24 18:42:44','2016-06-24 18:42:44'),(99,4,'20110982','FERNÁNDEZ LEÓN, LUIS FERNANDO',NULL,NULL,NULL,'2016-06-24 18:42:44','2016-06-24 18:42:44'),(100,4,'20111228','LEON CARDENAS, RAUL RUBEN',NULL,NULL,NULL,'2016-06-24 18:42:44','2016-06-24 18:42:44'),(101,4,'20111836','LEON SHIMABUKURO, ALEXIS ENRIQUE',NULL,NULL,NULL,'2016-06-24 18:42:44','2016-06-24 18:42:44'),(102,4,'20112180','SANCHEZ ATIQUIPA, JOSE LUIS',NULL,NULL,NULL,'2016-06-24 18:42:44','2016-06-24 18:42:44'),(103,4,'20112188','VILLANUEVA CHIRINOS, CLAUDIA ALEXANDRA',NULL,NULL,NULL,'2016-06-24 18:42:44','2016-06-24 18:42:44'),(104,4,'20123136','SALAS RODRIGUEZ, LUIS ALBERTO',NULL,NULL,NULL,'2016-06-24 18:42:44','2016-06-24 18:42:44'),(105,5,'20072069','JERÍ PIEROBÓN, RAFAEL EDUARDO',NULL,NULL,NULL,'2016-06-24 20:39:59','2016-06-24 20:39:59'),(106,5,'20077243','BEJAR LUQUE, RICARDO JOEL',NULL,NULL,NULL,'2016-06-24 20:39:59','2016-06-24 20:39:59'),(107,5,'20079007','BRUDERER VEGA, RAMON SIMON',NULL,NULL,NULL,'2016-06-24 20:39:59','2016-06-24 20:39:59'),(108,5,'20084048','PUENTERNAN FERNÁNDEZ, WILLY',NULL,NULL,NULL,'2016-06-24 20:39:59','2016-06-24 20:39:59'),(109,5,'20084368','QUIROZ CORAL, MIGUEL ANGEL',NULL,NULL,NULL,'2016-06-24 20:39:59','2016-06-24 20:39:59'),(110,5,'20090242','FERNÁNDEZ SALGADO, ITALO',NULL,NULL,NULL,'2016-06-24 20:39:59','2016-06-24 20:39:59'),(111,5,'20092049','ALVAREZ TENGAN, ALONSO YOSHIO',NULL,NULL,NULL,'2016-06-24 20:39:59','2016-06-24 20:39:59'),(112,5,'20092101','MARROQUÍN RODRÍGUEZ, JOSÉ EDUARDO',NULL,NULL,NULL,'2016-06-24 20:39:59','2016-06-24 20:39:59'),(113,5,'20094131','ESPINOZA TORRES, HENRY ANTONIO',NULL,NULL,NULL,'2016-06-24 20:39:59','2016-06-24 20:39:59'),(114,5,'20095197','URIBE CANCHANYA, IVAN RENATO',NULL,NULL,NULL,'2016-06-24 20:39:59','2016-06-24 20:39:59'),(115,5,'20095401','BANDA MORENO, FERNANDO JAVIER',NULL,NULL,NULL,'2016-06-24 20:39:59','2016-06-24 20:39:59'),(116,5,'20095577','SANDOVAL LINARES, ANGEL GABRIEL',NULL,NULL,NULL,'2016-06-24 20:39:59','2016-06-24 20:39:59'),(117,5,'20097009','CAHUANA MACEDO, FRANZ ANDRÉ',NULL,NULL,NULL,'2016-06-24 20:39:59','2016-06-24 20:39:59'),(118,5,'20100496','GONZALES VÁSQUEZ, ERICK IVAN',NULL,NULL,NULL,'2016-06-24 20:39:59','2016-06-24 20:39:59'),(119,5,'20100846','URQUIZO GÁLVEZ, YEDA VALERIA',NULL,NULL,NULL,'2016-06-24 20:39:59','2016-06-24 20:39:59'),(120,5,'20101200','DE LA CRUZ SAIRITUPA, CARLOS ANDERSON',NULL,NULL,NULL,'2016-06-24 20:39:59','2016-06-24 20:39:59'),(121,5,'20101234','DONGO ALVA, CHRISTIAN OMAR',NULL,NULL,NULL,'2016-06-24 20:39:59','2016-06-24 20:39:59'),(122,5,'20101364','IBAÑEZ OCHOA, MILAGROS DEL PILAR',NULL,NULL,NULL,'2016-06-24 20:39:59','2016-06-24 20:39:59'),(123,5,'20101528','BARZOLA MATTA, PABLO ALEJANDRO',NULL,NULL,NULL,'2016-06-24 20:39:59','2016-06-24 20:39:59'),(124,5,'20101616','DÁVILA GARCÍA, GERARDO PAOLO',NULL,NULL,NULL,'2016-06-24 20:39:59','2016-06-24 20:39:59'),(125,5,'20101692','HOYOS NAVAL, DENNIS FELIX',NULL,NULL,NULL,'2016-06-24 20:39:59','2016-06-24 20:39:59'),(126,5,'20101889','ENCARNACIÓN MENDOZA, MIRIAM LUCERO',NULL,NULL,NULL,'2016-06-24 20:39:59','2016-06-24 20:39:59'),(127,5,'20102513','SIGNOL PINTO, JORGE LUIGUI',NULL,NULL,NULL,'2016-06-24 20:39:59','2016-06-24 20:39:59'),(128,5,'20102550','ROJAS NAPAN, PIER GONSALO',NULL,NULL,NULL,'2016-06-24 20:39:59','2016-06-24 20:39:59'),(129,5,'20105555','GUTIERREZ DELGADO, MARIELLA VICKY',NULL,NULL,NULL,'2016-06-24 20:39:59','2016-06-24 20:39:59'),(130,5,'20110056','VIERA BARTHELMES, CECILIA DEL PILAR',NULL,NULL,NULL,'2016-06-24 20:39:59','2016-06-24 20:39:59'),(131,5,'20110871','SARMIENTO TELLO, SAMOEL BENJAMÍN',NULL,NULL,NULL,'2016-06-24 20:39:59','2016-06-24 20:39:59'),(132,5,'20110914','BRAVO ROJAS, ANDREA XIMENA',NULL,NULL,NULL,'2016-06-24 20:39:59','2016-06-24 20:39:59'),(133,5,'20110982','FERNÁNDEZ LEÓN, LUIS FERNANDO',NULL,NULL,NULL,'2016-06-24 20:39:59','2016-06-24 20:39:59'),(134,5,'20111228','LEON CARDENAS, RAUL RUBEN',NULL,NULL,NULL,'2016-06-24 20:39:59','2016-06-24 20:39:59'),(135,5,'20111836','LEON SHIMABUKURO, ALEXIS ENRIQUE',NULL,NULL,NULL,'2016-06-24 20:39:59','2016-06-24 20:39:59'),(136,5,'20112180','SANCHEZ ATIQUIPA, JOSE LUIS',NULL,NULL,NULL,'2016-06-24 20:39:59','2016-06-24 20:39:59'),(137,5,'20112188','VILLANUEVA CHIRINOS, CLAUDIA ALEXANDRA',NULL,NULL,NULL,'2016-06-24 20:39:59','2016-06-24 20:39:59'),(138,5,'20123136','SALAS RODRIGUEZ, LUIS ALBERTO',NULL,NULL,NULL,'2016-06-24 20:39:59','2016-06-24 20:39:59');
-- /*!40000 ALTER TABLE `Alumno` ENABLE KEYS */;
-- UNLOCK TABLES;
-- */
--
-- Table structure for table `Aporte`
--

DROP TABLE IF EXISTS `Aporte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Aporte` (
  `IdAporte` int(11) NOT NULL AUTO_INCREMENT,
  `IdResultadoEstudiantil` int(11) DEFAULT NULL,
  `IdCurso` int(11) DEFAULT NULL,
  `IdCicloAcademico` int(11) DEFAULT NULL,
  `Valor` int(3) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdAporte`),
  KEY `IdResultadoEstudiantil` (`IdResultadoEstudiantil`),
  KEY `IdCurso` (`IdCurso`),
  KEY `IdCicloAcademico` (`IdCicloAcademico`),
  CONSTRAINT `Aporte_ibfk_1` FOREIGN KEY (`IdResultadoEstudiantil`) REFERENCES `ResultadoEstudiantil` (`IdResultadoEstudiantil`),
  CONSTRAINT `Aporte_ibfk_2` FOREIGN KEY (`IdCurso`) REFERENCES `Curso` (`IdCurso`),
  CONSTRAINT `Aporte_ibfk_3` FOREIGN KEY (`IdCicloAcademico`) REFERENCES `CicloxEspecialidad` (`IdCicloAcademico`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Aporte`
--

LOCK TABLES `Aporte` WRITE;
/*!40000 ALTER TABLE `Aporte` DISABLE KEYS */;
INSERT INTO `Aporte` VALUES (13,1,47,NULL,1,'2016-06-19 18:50:55','2016-06-19 06:30:16','2016-06-19 18:50:55'),(14,8,47,NULL,1,'2016-06-19 18:50:55','2016-06-19 06:30:17','2016-06-19 18:50:55'),(15,12,47,NULL,1,'2016-06-19 18:50:55','2016-06-19 06:30:17','2016-06-19 18:50:55'),(16,1,47,NULL,1,'2016-06-19 18:51:11','2016-06-19 18:50:55','2016-06-19 18:51:11'),(17,8,47,NULL,1,'2016-06-19 18:51:11','2016-06-19 18:50:55','2016-06-19 18:51:11'),(18,12,47,NULL,1,'2016-06-19 18:51:11','2016-06-19 18:50:55','2016-06-19 18:51:11'),(19,1,47,NULL,1,'2016-06-19 18:58:11','2016-06-19 18:51:11','2016-06-19 18:58:11'),(20,8,47,NULL,1,'2016-06-19 18:58:11','2016-06-19 18:51:11','2016-06-19 18:58:11'),(21,12,47,NULL,1,'2016-06-19 18:58:11','2016-06-19 18:51:11','2016-06-19 18:58:11'),(22,1,47,NULL,1,'2016-06-19 19:51:38','2016-06-19 18:58:11','2016-06-19 19:51:38'),(23,1,47,NULL,1,'2016-06-24 15:47:14','2016-06-19 19:51:38','2016-06-24 15:47:14'),(24,12,47,NULL,1,'2016-06-24 15:47:14','2016-06-19 19:51:38','2016-06-24 15:47:14'),(25,1,28,NULL,1,'2016-06-24 18:38:22','2016-06-24 15:47:14','2016-06-24 18:38:22'),(26,12,28,NULL,1,'2016-06-24 18:38:22','2016-06-24 15:47:14','2016-06-24 18:38:22'),(27,1,47,NULL,1,'2016-06-24 18:38:22','2016-06-24 15:47:14','2016-06-24 18:38:22'),(28,12,47,NULL,1,'2016-06-24 18:38:22','2016-06-24 15:47:14','2016-06-24 18:38:22'),(29,1,28,NULL,1,'2016-06-24 20:37:31','2016-06-24 18:38:22','2016-06-24 20:37:31'),(30,12,28,NULL,1,'2016-06-24 20:37:31','2016-06-24 18:38:22','2016-06-24 20:37:31'),(31,2,29,NULL,1,'2016-06-24 20:37:31','2016-06-24 18:38:22','2016-06-24 20:37:31'),(32,3,29,NULL,1,'2016-06-24 20:37:31','2016-06-24 18:38:22','2016-06-24 20:37:31'),(33,1,47,NULL,1,'2016-06-24 20:37:31','2016-06-24 18:38:22','2016-06-24 20:37:31'),(34,12,47,NULL,1,'2016-06-24 20:37:31','2016-06-24 18:38:22','2016-06-24 20:37:31'),(35,1,28,NULL,1,NULL,'2016-06-24 20:37:31','2016-06-24 20:37:31'),(36,12,28,NULL,1,NULL,'2016-06-24 20:37:31','2016-06-24 20:37:31'),(37,2,29,NULL,1,NULL,'2016-06-24 20:37:31','2016-06-24 20:37:31'),(38,3,29,NULL,1,NULL,'2016-06-24 20:37:31','2016-06-24 20:37:31'),(39,2,30,NULL,1,NULL,'2016-06-24 20:37:31','2016-06-24 20:37:31'),(40,3,30,NULL,1,NULL,'2016-06-24 20:37:31','2016-06-24 20:37:31'),(41,1,47,NULL,1,NULL,'2016-06-24 20:37:31','2016-06-24 20:37:31'),(42,12,47,NULL,1,NULL,'2016-06-24 20:37:31','2016-06-24 20:37:31');
/*!40000 ALTER TABLE `Aporte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ArchivoEntrada`
--

DROP TABLE IF EXISTS `ArchivoEntrada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ArchivoEntrada` (
  `IdArchivoEntrada` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(500) DEFAULT NULL,
  `mime` varchar(500) DEFAULT NULL,
  `original_filename` varchar(500) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdArchivoEntrada`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ArchivoEntrada`
--

LOCK TABLES `ArchivoEntrada` WRITE;
/*!40000 ALTER TABLE `ArchivoEntrada` DISABLE KEYS */;
INSERT INTO `ArchivoEntrada` VALUES (12,'phpw5SsOi.zip','application/zip','untitled folder.zip','2016-06-26 10:45:04','2016-06-26 10:43:41','2016-06-26 10:45:04'),(13,'phpAv7gOu.zip','application/zip','untitled folder.zip',NULL,'2016-06-26 10:45:14','2016-06-26 10:45:14'),(14,'phpnC32uv.zip','application/zip','evidenciaHueso.zip',NULL,'2016-06-26 10:45:29','2016-06-26 10:45:29');
/*!40000 ALTER TABLE `ArchivoEntrada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ArchivoEntradaPlan`
--

DROP TABLE IF EXISTS `ArchivoEntradaPlan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ArchivoEntradaPlan` (
  `IdArchivoEntrada` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(500) DEFAULT NULL,
  `mime` varchar(500) DEFAULT NULL,
  `original_filename` varchar(500) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdArchivoEntrada`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ArchivoEntradaPlan`
--

LOCK TABLES `ArchivoEntradaPlan` WRITE;
/*!40000 ALTER TABLE `ArchivoEntradaPlan` DISABLE KEYS */;
INSERT INTO `ArchivoEntradaPlan` VALUES (5,'phpNUmdYM.pdf','application/pdf','Folleto_Informativo_40_2013-2_(2) (1).pdf',NULL,'2016-06-24 20:08:54','2016-06-24 20:08:54');
/*!40000 ALTER TABLE `ArchivoEntradaPlan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Aspecto`
--

DROP TABLE IF EXISTS `Aspecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Aspecto` (
  `IdAspecto` int(11) NOT NULL AUTO_INCREMENT,
  `IdResultadoEstudiantil` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdAspecto`),
  KEY `IdResultadoEstudiantil` (`IdResultadoEstudiantil`),
  CONSTRAINT `Aspecto_ibfk_1` FOREIGN KEY (`IdResultadoEstudiantil`) REFERENCES `ResultadoEstudiantil` (`IdResultadoEstudiantil`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Aspecto`
--

LOCK TABLES `Aspecto` WRITE;
/*!40000 ALTER TABLE `Aspecto` DISABLE KEYS */;
INSERT INTO `Aspecto` VALUES (1,1,'Matemáticas',NULL,'2016-06-18 20:03:28','2016-06-24 20:25:49',1),(2,1,'Ing. Informática',NULL,'2016-06-18 20:03:42','2016-06-24 20:25:49',1),(3,2,'Diseña',NULL,'2016-06-18 20:04:04','2016-06-24 20:25:49',1),(4,2,'Conduce e interpreta resultados',NULL,'2016-06-18 20:04:18','2016-06-24 20:25:49',1),(5,3,'Procesos',NULL,'2016-06-18 20:04:37','2016-06-24 20:25:49',1),(6,3,'Sistemas Informáticos',NULL,'2016-06-18 20:04:51','2016-06-24 20:25:49',1),(7,3,'Componentes',NULL,'2016-06-18 20:05:04','2016-06-24 20:25:49',1),(8,4,'Trabajo en equipo',NULL,'2016-06-18 20:05:40','2016-06-24 20:25:49',1),(9,5,'Problemas de ingeniería',NULL,'2016-06-18 20:05:56','2016-06-24 20:25:49',1),(10,6,'Responsabilidad profesional y Ética',NULL,'2016-06-18 20:06:19','2016-06-24 20:25:49',1),(11,7,'Comunicación en español',NULL,'2016-06-18 20:06:33','2016-06-24 20:25:50',1),(12,8,'Sociedad',NULL,'2016-06-18 20:06:49','2016-06-24 20:25:50',1),(13,9,'Aprendizaje',NULL,'2016-06-18 20:07:00','2016-06-24 20:25:50',1),(14,10,'Temas de Actualidad',NULL,'2016-06-18 20:07:14','2016-06-24 20:25:50',1),(15,11,'Técnicas, estrategias y herramientas',NULL,'2016-06-18 20:07:27','2016-06-24 20:25:50',1),(16,12,'Economía',NULL,'2016-06-18 20:07:38','2016-06-24 20:25:50',1),(17,12,'Gestión de Proyectos',NULL,'2016-06-18 20:07:49','2016-06-24 20:25:50',1);
/*!40000 ALTER TABLE `Aspecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Calificacion`
--

DROP TABLE IF EXISTS `Calificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Calificacion` (
  `IdCalificacion` int(11) NOT NULL AUTO_INCREMENT,
  `IdCriterio` int(11) DEFAULT NULL,
  `IdHorario` int(11) DEFAULT NULL,
  `IdAlumno` int(11) DEFAULT NULL,
  `Nota` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdCalificacion`),
  KEY `IdAlumno` (`IdAlumno`),
  KEY `IdHorario` (`IdHorario`),
  KEY `IdCriterio` (`IdCriterio`),
  CONSTRAINT `Calificacion_ibfk_1` FOREIGN KEY (`IdAlumno`) REFERENCES `Alumno` (`IdAlumno`),
  CONSTRAINT `Calificacion_ibfk_2` FOREIGN KEY (`IdHorario`) REFERENCES `Horario` (`IdHorario`),
  CONSTRAINT `Calificacion_ibfk_3` FOREIGN KEY (`IdCriterio`) REFERENCES `Criterio` (`IdCriterio`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Calificacion`
--

LOCK TABLES `Calificacion` WRITE;
/*!40000 ALTER TABLE `Calificacion` DISABLE KEYS */;
INSERT INTO `Calificacion` VALUES (1,1,1,25,3,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(2,4,1,25,2,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(3,1,1,26,2,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(4,4,1,26,1,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(5,5,1,26,2,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(6,24,1,26,2,NULL,'2016-06-19 17:40:03','2016-06-19 17:40:03'),(7,28,1,26,2,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(8,29,1,26,2,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(9,1,1,27,4,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(10,4,1,27,1,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(11,5,1,27,2,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(12,24,1,27,2,NULL,'2016-06-19 17:40:03','2016-06-19 17:40:03'),(13,28,1,27,2,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(14,29,1,27,2,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(15,1,1,28,4,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(16,4,1,28,1,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(17,5,1,28,2,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(18,24,1,28,2,NULL,'2016-06-19 17:40:03','2016-06-19 17:40:03'),(19,28,1,28,2,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(20,29,1,28,2,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(21,1,1,29,2,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(22,4,1,29,2,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(23,5,1,29,2,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(24,24,1,29,2,NULL,'2016-06-19 17:40:03','2016-06-19 17:40:03'),(25,28,1,29,2,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(26,29,1,29,2,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(27,1,1,30,2,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(28,4,1,30,1,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(29,5,1,30,2,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(30,24,1,30,2,NULL,'2016-06-19 17:40:03','2016-06-19 17:40:03'),(31,28,1,30,2,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(32,29,1,30,2,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(33,1,1,31,4,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(34,4,1,31,2,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(35,5,1,31,3,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(36,24,1,31,2,NULL,'2016-06-19 17:40:03','2016-06-19 17:40:03'),(37,28,1,31,3,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(38,29,1,31,2,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(39,1,1,32,1,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(40,4,1,32,1,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(41,5,1,32,2,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(42,24,1,32,2,NULL,'2016-06-19 17:40:03','2016-06-19 17:40:03'),(43,28,1,32,2,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(44,29,1,32,2,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(45,1,1,33,2,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(46,4,1,33,2,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(47,5,1,33,1,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(48,24,1,33,3,NULL,'2016-06-19 17:40:03','2016-06-19 17:40:03'),(49,28,1,33,3,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(50,29,1,33,2,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(51,1,1,34,1,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(52,4,1,34,1,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(53,5,1,34,2,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(54,24,1,34,4,NULL,'2016-06-19 17:40:03','2016-06-19 17:40:03'),(55,28,1,34,2,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(56,29,1,34,2,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(57,1,1,35,3,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(58,4,1,35,2,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(59,5,1,35,2,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(60,24,1,35,4,NULL,'2016-06-19 17:40:03','2016-06-19 17:40:03'),(61,28,1,35,2,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(62,29,1,35,2,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(63,1,1,36,4,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(64,4,1,36,1,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(65,5,1,36,2,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(66,24,1,36,3,NULL,'2016-06-19 17:40:03','2016-06-19 17:40:03'),(67,28,1,36,3,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(68,29,1,36,1,NULL,'2016-06-19 17:40:03','2016-06-20 00:46:07'),(69,5,1,25,1,NULL,'2016-06-20 00:46:07','2016-06-20 00:46:07'),(70,28,1,25,2,NULL,'2016-06-20 00:46:07','2016-06-20 00:46:07'),(71,29,1,25,2,NULL,'2016-06-20 00:46:07','2016-06-20 00:46:07'),(72,6,5,105,4,NULL,'2016-06-24 20:41:23','2016-06-24 20:41:23');
/*!40000 ALTER TABLE `Calificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CicloAcademico`
--

DROP TABLE IF EXISTS `CicloAcademico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CicloAcademico` (
  `Descripcion` varchar(200) DEFAULT NULL,
  `Numero` int(11) DEFAULT NULL,
  `IdCicloAcademico` int(11) NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdCicloAcademico`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CicloAcademico`
--

LOCK TABLES `CicloAcademico` WRITE;
/*!40000 ALTER TABLE `CicloAcademico` DISABLE KEYS */;
INSERT INTO `CicloAcademico` VALUES ('2016-1',20161,1,NULL,'2016-06-19 05:57:09','2016-06-19 05:57:09'),('2016-2',20162,2,NULL,'2016-06-19 05:57:50','2016-06-19 05:57:50');
/*!40000 ALTER TABLE `CicloAcademico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CicloxAspecto`
--

DROP TABLE IF EXISTS `CicloxAspecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CicloxAspecto` (
  `IdCicloxAspecto` int(11) NOT NULL AUTO_INCREMENT,
  `IdAspecto` int(11) DEFAULT NULL,
  `IdCicloAcademico` int(11) DEFAULT NULL,
  `TotalAlumnos` int(11) DEFAULT NULL,
  `TotalCumplen` int(11) DEFAULT NULL,
  `Promedio` float DEFAULT NULL,
  `Porcentaje` float DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdCicloxAspecto`),
  KEY `IdCicloAcademico` (`IdCicloAcademico`),
  KEY `IdAspecto` (`IdAspecto`),
  CONSTRAINT `CicloxAspecto_ibfk_1` FOREIGN KEY (`IdCicloAcademico`) REFERENCES `CicloxEspecialidad` (`IdCicloAcademico`),
  CONSTRAINT `CicloxAspecto_ibfk_2` FOREIGN KEY (`IdAspecto`) REFERENCES `Aspecto` (`IdAspecto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CicloxAspecto`
--

LOCK TABLES `CicloxAspecto` WRITE;
/*!40000 ALTER TABLE `CicloxAspecto` DISABLE KEYS */;
/*!40000 ALTER TABLE `CicloxAspecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CicloxCriterio`
--

DROP TABLE IF EXISTS `CicloxCriterio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CicloxCriterio` (
  `IdCicloxCriterio` int(11) NOT NULL AUTO_INCREMENT,
  `IdCriterio` int(11) DEFAULT NULL,
  `IdCicloAcademico` int(11) DEFAULT NULL,
  `TotalAlumnos` int(11) DEFAULT NULL,
  `TotalCumplen` int(11) DEFAULT NULL,
  `Porcentaje` float DEFAULT NULL,
  `Promedio` float DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdCicloxCriterio`),
  KEY `IdCriterio` (`IdCriterio`),
  KEY `IdCicloAcademico` (`IdCicloAcademico`),
  CONSTRAINT `CicloxCriterio_idfk_1` FOREIGN KEY (`IdCriterio`) REFERENCES `Criterio` (`IdCriterio`),
  CONSTRAINT `CicloxCriterio_idfk_2` FOREIGN KEY (`IdCicloAcademico`) REFERENCES `CicloxEspecialidad` (`IdCicloAcademico`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CicloxCriterio`
--

LOCK TABLES `CicloxCriterio` WRITE;
/*!40000 ALTER TABLE `CicloxCriterio` DISABLE KEYS */;
/*!40000 ALTER TABLE `CicloxCriterio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for 
--

DROP TABLE IF EXISTS `CicloxEspecialidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CicloxEspecialidad` (
  `IdCicloAcademico` int(11) NOT NULL AUTO_INCREMENT,
  `IdCiclo` int(11) NOT NULL,
  `IdEspecialidad` int(11) DEFAULT NULL,
  `IdDocente` int(11) DEFAULT NULL,
  `IdPeriodo` int(11) DEFAULT NULL,
  `Numero` int(11) DEFAULT NULL,
  `Vigente` int(10) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `FechaInicio` datetime DEFAULT NULL,
  `FechaFin` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdCicloAcademico`),
  KEY `IdEspecialidad` (`IdEspecialidad`),
  KEY `IdPeriodo` (`IdPeriodo`),
  KEY `IdDocente` (`IdDocente`),
  KEY `IdCiclo` (`IdCiclo`),
  CONSTRAINT `CicloAcademico_ibfk_1` FOREIGN KEY (`IdEspecialidad`) REFERENCES `Especialidad` (`IdEspecialidad`),
  CONSTRAINT `CicloAcademico_ibfk_2` FOREIGN KEY (`IdPeriodo`) REFERENCES `Periodo` (`IdPeriodo`),
  CONSTRAINT `CicloAcademico_ibfk_3` FOREIGN KEY (`IdDocente`) REFERENCES `Docente` (`IdDocente`),
  CONSTRAINT `CicloAcademico_ibfk_4` FOREIGN KEY (`IdCiclo`) REFERENCES `CicloAcademico` (`IdCicloAcademico`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CicloxEspecialidad`
--

LOCK TABLES `CicloxEspecialidad` WRITE;
/*!40000 ALTER TABLE `CicloxEspecialidad` DISABLE KEYS */;
INSERT INTO `CicloxEspecialidad` VALUES (1,1,1,NULL,1,NULL,1,NULL,'2016-03-14 00:00:00','2016-08-22 00:00:00',NULL,'2016-06-19 05:59:06','2016-06-19 05:59:07');
/*!40000 ALTER TABLE `CicloxEspecialidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CicloxResultado`
--

DROP TABLE IF EXISTS `CicloxResultado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CicloxResultado` (
  `IdCicloxResultado` int(11) NOT NULL AUTO_INCREMENT,
  `IdResultadoEstudiantil` int(11) DEFAULT NULL,
  `IdCicloAcademico` int(11) DEFAULT NULL,
  `TotalAlumnos` int(11) DEFAULT NULL,
  `TotalCumplen` int(11) DEFAULT NULL,
  `Promedio` float DEFAULT NULL,
  `Porcentaje` float DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdCicloxResultado`),
  KEY `IdCicloAcademico` (`IdCicloAcademico`),
  KEY `IdResultadoEstudiantil` (`IdResultadoEstudiantil`),
  CONSTRAINT `CicloxResultado_ibfk_1` FOREIGN KEY (`IdCicloAcademico`) REFERENCES `CicloxEspecialidad` (`IdCicloAcademico`),
  CONSTRAINT `CicloxResultado_ibfk_2` FOREIGN KEY (`IdResultadoEstudiantil`) REFERENCES `ResultadoEstudiantil` (`IdResultadoEstudiantil`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CicloxResultado`
--

LOCK TABLES `CicloxResultado` WRITE;
/*!40000 ALTER TABLE `CicloxResultado` DISABLE KEYS */;
INSERT INTO `CicloxResultado` VALUES (1,1,1,NULL,NULL,NULL,NULL,NULL,'2016-06-19 05:59:06','2016-06-19 05:59:06'),(2,2,1,NULL,NULL,NULL,NULL,NULL,'2016-06-19 05:59:06','2016-06-19 05:59:06'),(3,3,1,NULL,NULL,NULL,NULL,NULL,'2016-06-19 05:59:06','2016-06-19 05:59:06'),(4,4,1,NULL,NULL,NULL,NULL,NULL,'2016-06-19 05:59:06','2016-06-19 05:59:06'),(5,5,1,NULL,NULL,NULL,NULL,NULL,'2016-06-19 05:59:06','2016-06-19 05:59:06'),(6,6,1,NULL,NULL,NULL,NULL,NULL,'2016-06-19 05:59:06','2016-06-19 05:59:06'),(7,7,1,NULL,NULL,NULL,NULL,NULL,'2016-06-19 05:59:07','2016-06-19 05:59:07'),(8,8,1,NULL,NULL,NULL,NULL,NULL,'2016-06-19 05:59:07','2016-06-19 05:59:07'),(9,9,1,NULL,NULL,NULL,NULL,NULL,'2016-06-19 05:59:07','2016-06-19 05:59:07'),(10,10,1,NULL,NULL,NULL,NULL,NULL,'2016-06-19 05:59:07','2016-06-19 05:59:07'),(11,11,1,NULL,NULL,NULL,NULL,NULL,'2016-06-19 05:59:07','2016-06-19 05:59:07'),(12,12,1,NULL,NULL,NULL,NULL,NULL,'2016-06-19 05:59:07','2016-06-19 05:59:07');
/*!40000 ALTER TABLE `CicloxResultado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ConfEspecialidad`
--

DROP TABLE IF EXISTS `ConfEspecialidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ConfEspecialidad` (
  `IdConfEspecialidad` int(11) NOT NULL AUTO_INCREMENT,
  `IdEspecialidad` int(11) DEFAULT NULL,
  `IdPeriodo` int(11) DEFAULT NULL,
  `IdCicloInicio` int(11) NOT NULL,
  `IdCicloFin` int(11) NOT NULL,
  `UmbralAceptacion` int(11) DEFAULT NULL,
  `NivelEsperado` int(11) DEFAULT NULL,
  `CantNivelCriterio` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdConfEspecialidad`),
  KEY `IdEspecialidad` (`IdEspecialidad`),
  KEY `IdPeriodo` (`IdPeriodo`),
  KEY `IdCicloInicio` (`IdCicloInicio`),
  KEY `IdCicloFin` (`IdCicloFin`),
  CONSTRAINT `ConfEspecialidad_ibfk_1` FOREIGN KEY (`IdEspecialidad`) REFERENCES `Especialidad` (`IdEspecialidad`),
  CONSTRAINT `ConfEspecialidad_ibfk_2` FOREIGN KEY (`IdPeriodo`) REFERENCES `Periodo` (`IdPeriodo`),
  CONSTRAINT `ConfEspecialidad_ibfk_3` FOREIGN KEY (`IdCicloInicio`) REFERENCES `CicloAcademico` (`IdCicloAcademico`),
  CONSTRAINT `ConfEspecialidad_ibfk_4` FOREIGN KEY (`IdCicloFin`) REFERENCES `CicloAcademico` (`IdCicloAcademico`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ConfEspecialidad`
--

LOCK TABLES `ConfEspecialidad` WRITE;
/*!40000 ALTER TABLE `ConfEspecialidad` DISABLE KEYS */;
INSERT INTO `ConfEspecialidad` VALUES (1,1,1,1,2,70,3,4,NULL,'2016-06-19 05:58:24','2016-06-24 20:25:49');
/*!40000 ALTER TABLE `ConfEspecialidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Criterio`
--

DROP TABLE IF EXISTS `Criterio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Criterio` (
  `IdCriterio` int(11) NOT NULL AUTO_INCREMENT,
  `IdAspecto` int(11) DEFAULT NULL,
  `Nombre` varchar(200) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdCriterio`),
  KEY `IdAspecto` (`IdAspecto`),
  CONSTRAINT `Criterio_ibfk_1` FOREIGN KEY (`IdAspecto`) REFERENCES `Aspecto` (`IdAspecto`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Criterio`
--

LOCK TABLES `Criterio` WRITE;
/*!40000 ALTER TABLE `Criterio` DISABLE KEYS */;
INSERT INTO `Criterio` VALUES (1,1,'Aplica conceptos lógicos para la resolucion de problemas',NULL,'2016-06-18 20:29:37','2016-06-24 20:25:49',1),(4,2,'Diseña algoritmos para la resolución de un problema identificado',NULL,'2016-06-18 20:33:21','2016-06-24 20:25:49',1),(5,2,'Utiliza lenguajes de programación para implementar algoritmos sean diseñados por él o por cualquier otra persona',NULL,'2016-06-18 20:33:32','2016-06-24 20:25:49',1),(6,3,'Realiza el diseño de un experimento',NULL,'2016-06-18 20:36:44','2016-06-24 20:25:49',1),(7,4,'Ejecuta el experimento e interpreta sus resultados',NULL,'2016-06-18 20:37:01','2016-06-24 20:25:49',1),(8,5,'Identifica el contexto o el entorno empresarial donde se lleva a cabo un proceso de negocio',NULL,'2016-06-18 20:37:34','2016-06-24 20:25:49',1),(9,5,'Diseño de Soluciones',NULL,'2016-06-18 20:37:48','2016-06-24 20:25:49',1),(10,6,'Diseña una solución informática a partir de los requerimientos de negocio  identificados',NULL,'2016-06-18 20:38:08','2016-06-24 20:25:49',1),(11,7,'Diseña componentes que interaccionen con otras soluciones informáticas',NULL,'2016-06-18 20:38:29','2016-06-24 20:25:49',1),(12,8,' Participa en el equipo de trabajo aportando en el logro del objetivo',NULL,'2016-06-18 20:38:49','2016-06-24 20:25:49',1),(13,8,'Gestiona los problemas presentados durante el trabajo del equipo con la finalidad de resolverlos',NULL,'2016-06-18 20:39:04','2016-06-24 20:25:49',1),(14,8,'Da y recibe críticas constructivas utilizando un lenguaje adecuado',NULL,'2016-06-18 20:39:14','2016-06-24 20:25:49',1),(15,8,'Realiza su trabajo en el equipo de una forma efectiva y eficiente',NULL,'2016-06-18 20:39:24','2016-06-24 20:25:49',1),(16,9,'Plantea e implementa la solución del problema',NULL,'2016-06-18 20:39:48','2016-06-24 20:25:49',1),(17,10,'Reconoce la responsabilidad ética con la sociedad en relación a la seguridad en el trabajo (1).',NULL,'2016-06-18 20:40:10','2016-06-24 20:25:49',1),(18,10,'Reconoce la responsabilidad ética con la sociedad en relación con la satisfacción del cliente (2).',NULL,'2016-06-18 20:40:32','2016-06-24 20:25:49',1),(19,10,'Reconoce la responsabilidad ética con la sociedad en relación al respeto a sus compañeros de trabajo.',NULL,'2016-06-18 20:40:48','2016-06-24 20:25:50',1),(20,10,'Reconoce a través de su comportamiento la responsabilidad ética en su profesión',NULL,'2016-06-18 20:40:58','2016-06-24 20:25:50',1),(21,11,'Redacta textos utilizando estructuras sintácticas adecuadas',NULL,'2016-06-18 20:41:20','2016-06-24 20:25:50',1),(22,11,'Expone adecuadamente utilizando un vocabulario adecuado',NULL,'2016-06-18 20:41:30','2016-06-24 20:25:50',1),(23,11,'Comprende la idea principal plasmada en un texto',NULL,'2016-06-18 20:41:42','2016-06-24 20:25:50',1),(24,12,'Comprende el impacto de la tecnología en la solución de problemas',NULL,'2016-06-18 20:42:09','2016-06-24 20:25:50',1),(25,13,'Define un plan de capacitación una vez terminado sus estudios universitarios',NULL,'2016-06-18 20:42:36','2016-06-24 20:25:50',1),(26,14,'Conoce temas sociales y culturales de actualidad ',NULL,'2016-06-18 20:42:52','2016-06-24 20:25:50',1),(27,15,'Aplica las Técnicas, Herramientas y Estrategias.',NULL,'2016-06-18 20:43:09','2016-06-24 20:25:50',1),(28,16,'Realiza la evaluación económica de un proyecto',NULL,'2016-06-18 20:43:27','2016-06-24 20:25:50',1),(29,17,'Realiza la planificación y seguimiento de un proyecto',NULL,'2016-06-18 20:43:43','2016-06-24 20:25:50',1);
/*!40000 ALTER TABLE `Criterio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Curso`
--

DROP TABLE IF EXISTS `Curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Curso` (
  `IdCurso` int(11) NOT NULL AUTO_INCREMENT,
  `IdEspecialidad` int(11) DEFAULT NULL,
  `NivelAcademico` int(11) DEFAULT NULL,
  `Codigo` varchar(6) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Especialidad_p` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`IdCurso`),
  KEY `IdEspecialidad` (`IdEspecialidad`),
  CONSTRAINT `Curso_ibfk_1` FOREIGN KEY (`IdEspecialidad`) REFERENCES `Especialidad` (`IdEspecialidad`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Curso`
--

LOCK TABLES `Curso` WRITE;
/*!40000 ALTER TABLE `Curso` DISABLE KEYS */;
INSERT INTO `Curso` VALUES (1,3,5,'CIV281','Laboratorio de Materiales',NULL,NULL,NULL,NULL),(2,3,5,'CIV280','Materiales de Construcción',NULL,NULL,NULL,NULL),(3,3,6,'CIV223','Resistencia de Materiales 2',NULL,NULL,NULL,NULL),(4,3,6,'CIV229','Fundamentos de Ingeniería Ambiental',NULL,NULL,NULL,NULL),(5,3,6,'CIV230','Geología',NULL,NULL,NULL,NULL),(6,3,6,'CIV274','Mecánica de Fluidos',NULL,NULL,NULL,NULL),(7,3,6,'CIV275','Laboratorio de Mecánica de Fluidos',NULL,NULL,NULL,NULL),(8,3,6,'CIV282','Construcción de Edificaciones',NULL,NULL,NULL,NULL),(9,3,6,'CIV290','Laboratorio de Geología',NULL,NULL,NULL,NULL),(10,3,7,'CIV202','Primera Práctica Supervisada Preprofesional',NULL,NULL,NULL,NULL),(11,3,7,'CIV224','Análisis Estructural 1',NULL,NULL,NULL,NULL),(12,3,7,'CIV244','Mecánica de Suelos',NULL,NULL,NULL,NULL),(13,3,7,'CIV276','Hidráulica de Canales Abiertos',NULL,NULL,NULL,NULL),(14,3,7,'CIV277','Laboratorio de Hidráulica de Canales Abiertos',NULL,NULL,NULL,NULL),(15,3,7,'CIV283','Instalaciones de Edificaciones',NULL,NULL,NULL,NULL),(16,3,7,'CIV294','Laboratorio de Mecánica de Suelos',NULL,NULL,NULL,NULL),(17,3,8,'CIV225','Análisis Estructural 2',NULL,NULL,NULL,NULL),(18,3,8,'CIV226','Concreto Armado 1',NULL,NULL,NULL,NULL),(19,3,8,'CIV239','Ingeniería de Cimentaciones',NULL,NULL,NULL,NULL),(20,3,8,'CIV259','Ingeniería de Carreteras',NULL,NULL,NULL,NULL),(21,3,8,'CIV284','Planificación de la Construcción',NULL,NULL,NULL,NULL),(22,3,8,'CIV299','Campo de Ingeniería de Carreteras',NULL,NULL,NULL,NULL),(23,3,9,'CIV203','Segunda Práctica Supervisada Preprofesional',NULL,NULL,NULL,NULL),(24,3,9,'CIV205','Proyecto de fin de carrera 1',NULL,NULL,NULL,NULL),(25,3,9,'CIV227','Ingeniería Antisísmica',NULL,NULL,NULL,NULL),(26,3,9,'CIV278','Ingeniería de ReCursos Hídricos',NULL,NULL,NULL,NULL),(27,3,10,'CIV206','Proyecto de fin de carrera 2',NULL,NULL,NULL,NULL),(28,1,5,'INF220','Fundamentos de Programación',NULL,NULL,NULL,NULL),(29,1,5,'INF246','Bases de datos',NULL,NULL,'2016-06-24 18:36:43',NULL),(30,1,5,'INF263','Algoritmia',NULL,NULL,'2016-06-24 20:36:38',NULL),(31,1,6,'INF248','Sistemas de Información 1',NULL,NULL,NULL,NULL),(32,1,6,'INF281','Lenguaje de Programación 1',NULL,NULL,NULL,NULL),(33,1,6,'INF291','Métodos y Procedimientos',NULL,NULL,NULL,NULL),(34,1,7,'INF239','Sistemas Operativos',NULL,NULL,NULL,NULL),(35,1,7,'INF250','Sistemas de Información 2',NULL,NULL,NULL,NULL),(36,1,7,'INF265','Aplicaciones de Ciencias de la Computación',NULL,NULL,NULL,NULL),(37,1,7,'INF282','Lenguaje de Programación 2',NULL,NULL,NULL,NULL),(38,1,8,'INF008','Práctica Supervisada Preprofesional',NULL,NULL,NULL,NULL),(39,1,8,'INF234','Modelos y Simulación Empresarial',NULL,NULL,NULL,NULL),(40,1,8,'INF238','Redes de Computadoras',NULL,NULL,NULL,NULL),(41,1,8,'INF245','Ingeniería de Software',NULL,NULL,NULL,NULL),(42,1,9,'INF226','Desarrollo de Programas 1',NULL,NULL,NULL,NULL),(43,1,9,'INF273','Administración de la Función Informática',NULL,NULL,NULL,NULL),(44,1,9,'INF274','Administración de Sistemas Operativos y Base de Datos',NULL,NULL,NULL,NULL),(45,1,9,'INF295','Planeamiento Estratégico en Informática',NULL,NULL,NULL,NULL),(46,1,9,'INF391','Proyecto de Tesis 1',NULL,NULL,NULL,NULL),(47,1,10,'INF227','Desarrollo de Programas 2',NULL,NULL,NULL,NULL),(48,1,10,'INF392','Proyecto de Tesis 2',NULL,NULL,NULL,NULL),(49,2,5,'IND251','Gestión y Dirección de Empresas',NULL,NULL,NULL,NULL),(50,2,5,'IND252','Laboratorio de Estudio del Trabajo',NULL,NULL,NULL,NULL),(51,2,6,'IND213','Ingeniería de Plantas',NULL,NULL,NULL,NULL),(52,2,6,'IND231','Ingeniería Económica',NULL,NULL,NULL,NULL),(53,2,7,'IND214','Control Integral de Calidad',NULL,NULL,NULL,NULL),(54,2,7,'IND270','Procesos Industriales',NULL,NULL,NULL,NULL),(55,2,7,'IND273','Investigación Operativa 1',NULL,NULL,NULL,NULL),(56,2,7,'IND275','Control de Gestión Industrial',NULL,NULL,NULL,NULL),(57,2,7,'IND276','Laboratorio de Control Integral de Calidad',NULL,NULL,NULL,NULL),(58,2,7,'IND290','Seguridad Integral',NULL,NULL,NULL,NULL),(59,2,7,'IND331','Sicología Industrial',NULL,NULL,NULL,NULL),(60,2,8,'IND221','Automatización Industrial',NULL,NULL,NULL,NULL),(61,2,8,'IND281','Investigación Operativa 2',NULL,NULL,NULL,NULL),(62,2,8,'IND282','Planeamiento y Control de Operaciones',NULL,NULL,NULL,NULL),(63,2,8,'IND283','Mercadotecnia Industrial',NULL,NULL,NULL,NULL),(64,2,8,'IND284','Finanzas Industriales',NULL,NULL,NULL,NULL),(65,2,8,'IND333','Logística Industrial',NULL,NULL,NULL,NULL),(66,2,8,'IND277','Laboratorio de Procesos Industriales',NULL,NULL,NULL,NULL),(67,2,9,'IND232','Elaboración y Evaluación de Proyectos',NULL,NULL,NULL,NULL),(68,2,9,'IND286','Laboratorio de Automatización Industrial',NULL,NULL,NULL,NULL),(69,2,9,'IND291','Simulación de Sistemas',NULL,NULL,NULL,NULL),(70,2,9,'IND292','Análisis y Diseño de Sistemas',NULL,NULL,NULL,NULL),(71,2,9,'IND294','Sistemas Integrados de Producción',NULL,NULL,NULL,NULL),(72,2,9,'IND296','Trabajo de Tesis 1',NULL,NULL,NULL,NULL),(73,2,9,'IND297','Laboratorio de Sistemas Integrados de Producción',NULL,NULL,NULL,NULL),(74,2,9,'IND318','Gestión Ambiental',NULL,NULL,NULL,NULL),(75,2,9,'IND201','Ética Profesional en Ingeniería Industrial',NULL,NULL,NULL,NULL),(76,2,10,'IND328','Gestión de Proyectos',NULL,NULL,NULL,NULL),(77,2,10,'IND298','Trabajo de Tesis 2',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `Curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CursoxCiclo`
--

DROP TABLE IF EXISTS `CursoxCiclo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CursoxCiclo` (
  `IdCursoxCiclo` int(11) NOT NULL AUTO_INCREMENT,
  `IdCurso` int(11) DEFAULT NULL,
  `IdCicloAcademico` int(11) DEFAULT NULL,
  `TotalAlumnos` int(11) DEFAULT NULL,
  `Evaluado` varchar(10) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdCursoxCiclo`),
  KEY `IdCurso` (`IdCurso`),
  KEY `IdCicloAcademico` (`IdCicloAcademico`),
  CONSTRAINT `CursoEvaluado_ibfk_1` FOREIGN KEY (`IdCurso`) REFERENCES `Curso` (`IdCurso`),
  CONSTRAINT `CursoEvaluado_ibfk_2` FOREIGN KEY (`IdCicloAcademico`) REFERENCES `CicloxEspecialidad` (`IdCicloAcademico`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CursoxCiclo`
--

LOCK TABLES `CursoxCiclo` WRITE;
/*!40000 ALTER TABLE `CursoxCiclo` DISABLE KEYS */;
INSERT INTO `CursoxCiclo` VALUES (1,28,1,NULL,'1',NULL,'2016-06-19 06:01:11','2016-06-26 10:45:05'),(2,29,1,NULL,'1',NULL,'2016-06-19 06:01:11','2016-06-26 10:45:05'),(3,30,1,NULL,'1',NULL,'2016-06-19 06:01:12','2016-06-26 10:45:06'),(4,31,1,NULL,NULL,NULL,'2016-06-19 06:01:12','2016-06-24 18:58:27'),(5,32,1,NULL,NULL,NULL,'2016-06-19 06:01:12','2016-06-24 18:58:27'),(6,33,1,NULL,NULL,NULL,'2016-06-19 06:01:12','2016-06-24 18:58:27'),(7,34,1,NULL,NULL,NULL,'2016-06-19 06:01:12','2016-06-24 18:58:27'),(8,35,1,NULL,NULL,NULL,'2016-06-19 06:01:12','2016-06-24 18:58:27'),(9,36,1,NULL,NULL,NULL,'2016-06-19 06:01:12','2016-06-24 18:58:27'),(10,37,1,NULL,NULL,NULL,'2016-06-19 06:01:12','2016-06-24 18:58:27'),(11,38,1,NULL,NULL,NULL,'2016-06-19 06:01:12','2016-06-24 18:58:27'),(12,39,1,NULL,NULL,NULL,'2016-06-19 06:01:12','2016-06-24 18:58:27'),(13,40,1,NULL,NULL,NULL,'2016-06-19 06:01:12','2016-06-24 18:58:27'),(14,41,1,NULL,NULL,NULL,'2016-06-19 06:01:12','2016-06-24 18:58:27'),(15,42,1,NULL,NULL,NULL,'2016-06-19 06:01:12','2016-06-24 18:58:27'),(16,43,1,NULL,NULL,NULL,'2016-06-19 06:01:12','2016-06-24 18:58:27'),(17,44,1,NULL,NULL,NULL,'2016-06-19 06:01:12','2016-06-24 18:58:27'),(18,45,1,NULL,NULL,NULL,'2016-06-19 06:01:12','2016-06-24 18:58:27'),(19,46,1,NULL,NULL,NULL,'2016-06-19 06:01:12','2016-06-24 18:58:27'),(20,47,1,NULL,'1',NULL,'2016-06-19 06:01:12','2016-06-26 10:45:06'),(21,48,1,NULL,NULL,NULL,'2016-06-19 06:01:13','2016-06-24 18:58:27');
/*!40000 ALTER TABLE `CursoxCiclo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CursoxCicloxAspecto`
--

DROP TABLE IF EXISTS `CursoxCicloxAspecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CursoxCicloxAspecto` (
  `IdCursoxCicloxAspecto` int(11) NOT NULL AUTO_INCREMENT,
  `IdCursoxCiclo` int(11) DEFAULT NULL,
  `IdAspecto` int(11) DEFAULT NULL,
  `TotalAlumnos` int(11) DEFAULT NULL,
  `TotalCumplen` int(11) DEFAULT NULL,
  `Porcentaje` float DEFAULT NULL,
  `Promedio` float DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdCursoxCicloxAspecto`),
  KEY `IdCursoxCiclo` (`IdCursoxCiclo`),
  KEY `IdAspecto` (`IdAspecto`),
  CONSTRAINT `CursoxCicloxAspecto_idfk_1` FOREIGN KEY (`IdCursoxCiclo`) REFERENCES `CursoxCiclo` (`IdCursoxCiclo`),
  CONSTRAINT `CursoxCicloxAspecto_idfk_2` FOREIGN KEY (`IdAspecto`) REFERENCES `Aspecto` (`IdAspecto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CursoxCicloxAspecto`
--

LOCK TABLES `CursoxCicloxAspecto` WRITE;
/*!40000 ALTER TABLE `CursoxCicloxAspecto` DISABLE KEYS */;
/*!40000 ALTER TABLE `CursoxCicloxAspecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CursoxCicloxCriterio`
--

DROP TABLE IF EXISTS `CursoxCicloxCriterio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CursoxCicloxCriterio` (
  `IdCursoxCicloxCriterio` int(11) NOT NULL AUTO_INCREMENT,
  `IdCursoxCiclo` int(11) DEFAULT NULL,
  `IdCriterio` int(11) DEFAULT NULL,
  `TotalAlumnos` int(11) DEFAULT NULL,
  `TotalCumplen` int(11) DEFAULT NULL,
  `Porcentaje` float DEFAULT NULL,
  `Promedio` float DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdCursoxCicloxCriterio`),
  KEY `IdCursoxCiclo` (`IdCursoxCiclo`),
  KEY `IdCriterio` (`IdCriterio`),
  CONSTRAINT `CursoxCicloxCriterio_idfk_1` FOREIGN KEY (`IdCursoxCiclo`) REFERENCES `CursoxCiclo` (`IdCursoxCiclo`),
  CONSTRAINT `CursoxCicloxCriterio_idfk_2` FOREIGN KEY (`IdCriterio`) REFERENCES `Criterio` (`IdCriterio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CursoxCicloxCriterio`
--

LOCK TABLES `CursoxCicloxCriterio` WRITE;
/*!40000 ALTER TABLE `CursoxCicloxCriterio` DISABLE KEYS */;
/*!40000 ALTER TABLE `CursoxCicloxCriterio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CursoxCicloxResultado`
--

DROP TABLE IF EXISTS `CursoxCicloxResultado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CursoxCicloxResultado` (
  `IdCursoxCicloxResultado` int(11) NOT NULL AUTO_INCREMENT,
  `IdCursoxCiclo` int(11) DEFAULT NULL,
  `IdResultadoEstudiantil` int(11) DEFAULT NULL,
  `TotalAlumnos` int(11) DEFAULT NULL,
  `TotalCumplen` int(11) DEFAULT NULL,
  `Porcentaje` float DEFAULT NULL,
  `Promedio` float DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdCursoxCicloxResultado`),
  KEY `IdResultadoEstudiantil` (`IdResultadoEstudiantil`),
  KEY `IdCursoxCiclo` (`IdCursoxCiclo`),
  CONSTRAINT `CursoxCicloxResultado_idfk_1` FOREIGN KEY (`IdResultadoEstudiantil`) REFERENCES `ResultadoEstudiantil` (`IdResultadoEstudiantil`),
  CONSTRAINT `CursoxCicloxResultado_idfk_2` FOREIGN KEY (`IdCursoxCiclo`) REFERENCES `CursoxCiclo` (`IdCursoxCiclo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CursoxCicloxResultado`
--

LOCK TABLES `CursoxCicloxResultado` WRITE;
/*!40000 ALTER TABLE `CursoxCicloxResultado` DISABLE KEYS */;
/*!40000 ALTER TABLE `CursoxCicloxResultado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CursoxDocente`
--

DROP TABLE IF EXISTS `CursoxDocente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CursoxDocente` (
  `IdCursoxDocente` int(11) NOT NULL AUTO_INCREMENT,
  `IdDocente` int(11) DEFAULT NULL,
  `IdCurso` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdCursoxDocente`),
  KEY `IdDocente` (`IdDocente`),
  KEY `IdCurso` (`IdCurso`),
  CONSTRAINT `CursoxDocente_idfk_1` FOREIGN KEY (`IdDocente`) REFERENCES `Docente` (`IdDocente`),
  CONSTRAINT `CursoxDocente_idfk_2` FOREIGN KEY (`IdCurso`) REFERENCES `Curso` (`IdCurso`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CursoxDocente`
--

LOCK TABLES `CursoxDocente` WRITE;
/*!40000 ALTER TABLE `CursoxDocente` DISABLE KEYS */;
INSERT INTO `CursoxDocente` VALUES (1,4,47,NULL,NULL,NULL),(2,4,28,NULL,NULL,NULL),(3,4,29,NULL,NULL,NULL),(4,4,30,NULL,NULL,NULL);
/*!40000 ALTER TABLE `CursoxDocente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Docente`
--

DROP TABLE IF EXISTS `Docente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Docente` (
  `IdDocente` int(11) NOT NULL AUTO_INCREMENT,
  `IdEspecialidad` int(11) DEFAULT NULL,
  `IdUsuario` int(11) DEFAULT NULL,
  `Codigo` varchar(20) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `ApellidoPaterno` varchar(100) DEFAULT NULL,
  `ApellidoMaterno` varchar(100) DEFAULT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `Cargo` varchar(100) DEFAULT NULL,
  `Vigente` int(11) NOT NULL,
  `rolTutoria` int(11) NULL,
  `rolEvaluaciones` int(11) NULL, 
  `oficina` varchar(20) NULL,
  `telefono` varchar(20) NULL,
  `anexo` varchar(20) NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
-- campos agregados para psp
  `direccion` varchar(200) DEFAULT NULL,
-- fin campos agregados para psp

  PRIMARY KEY (`IdDocente`,`Vigente`),
  KEY `IdEspecialidad` (`IdEspecialidad`),
  KEY `IdUsuario` (`IdUsuario`),
  CONSTRAINT `Docente_ibfk_1` FOREIGN KEY (`IdEspecialidad`) REFERENCES `Especialidad` (`IdEspecialidad`),
  CONSTRAINT `Docente_ibfk_2` FOREIGN KEY (`IdUsuario`) REFERENCES `Usuario` (`IdUsuario`)

) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Docente`
--

LOCK TABLES `Docente` WRITE;
/*!40000 ALTER TABLE `Docente` DISABLE KEYS */;
INSERT INTO `Docente` VALUES(1,1,2,'19960275','Luis Alberto','Flores','García',' luis.flores@pucp.edu.pe','Profesor Contratado',1,NULL,NULL,NULL,NULL,NULL,'Ingeniería de Software, Gestión de Proyectos, Gestión de Procesos\r\nIngeniería de Software  ',NULL,'2016-06-18 17:24:00','2016-06-18 17:24:00',NULL),
(2,2,3,'19911254','Cesar Augusto','Stoll','Quevedo','  cstoll@pucp.pe ','Profesor Contratado',1,NULL,NULL,NULL,NULL,NULL,'',NULL,'2016-06-18 17:52:40','2016-06-18 17:52:40', NULL),
(3,3,4,'19941253','Ramzy Francis','Kahhat','Abedrabbo','ramzy.kahhat@pucp.edu.pe  ','Profesor Contratado',1,NULL,NULL,NULL,NULL,NULL,'INGENIERÍA SOSTENIBLE, INGENIERÍA AMBIENTAL',NULL,'2016-06-18 17:55:02','2016-06-18 17:55:02',NULL),
(4,1,5,'00009299','César Augusto','Aguilera','Serpa','cesar.aguilera@pucp.edu.pe','Profesor Contratado',1,NULL,NULL,NULL,NULL,NULL,'',NULL,'2016-06-19 06:07:14','2016-06-19 06:07:14',NULL);
/*!40000 ALTER TABLE `Docente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Especialidad`
--

DROP TABLE IF EXISTS `Especialidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Especialidad` (
  `IdEspecialidad` int(11) NOT NULL AUTO_INCREMENT,
  `Codigo` varchar(20) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `IdDocente` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdEspecialidad`),
  KEY `Especialidad_ibfk_1` (`IdDocente`),
  CONSTRAINT `Especialidad_ibfk_1` FOREIGN KEY (`IdDocente`) REFERENCES `Docente` (`IdDocente`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Especialidad`
--

LOCK TABLES `Especialidad` WRITE;
/*!40000 ALTER TABLE `Especialidad` DISABLE KEYS */;
INSERT INTO `Especialidad` VALUES (1,'INF','Ingeniería Informática','Tendrás una excelente base tecnológica y científica para la automatización de la información en cualquier organización.',NULL,'2016-06-18 05:00:00','2016-06-18 17:29:10',1),(2,'IND','Ingeniería Industrial','Podrás desarrollarte en el ámbito de los proceso y la gerencia industrial.',NULL,'2016-06-18 05:00:00','2016-06-18 17:57:10',2),(3,'CIV','Ingeniería Civil','Podrás ser responsable del planeamiento, diseño y construcción de obras.',NULL,'2016-06-18 05:00:00','2016-06-18 17:57:18',3),(4,'TEL','Ingenieria de las Telecomunicaciones','Como ingenierio de telecomunicaciones te encargaras de planificar, diseñar y de mantener operativa esta infraestructura.',NULL,'2016-06-24 11:45:15','2016-06-24 11:55:26',NULL);
/*!40000 ALTER TABLE `Especialidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EvidenciaCurso`
--

DROP TABLE IF EXISTS `EvidenciaCurso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `EvidenciaCurso` (
  `IdEvidenciaCurso` int(11) NOT NULL AUTO_INCREMENT,
  `IdArchivoEntrada` int(11) DEFAULT NULL,
  `IdHorario` int(11) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdEvidenciaCurso`),
  KEY `IdHorario` (`IdHorario`),
  KEY `IdArchivoEntrada` (`IdArchivoEntrada`),
  CONSTRAINT `EvidenciaCurso_ibfk_1` FOREIGN KEY (`IdHorario`) REFERENCES `Horario` (`IdHorario`),
  CONSTRAINT `EvidenciaCurso_ibfk_2` FOREIGN KEY (`IdArchivoEntrada`) REFERENCES `ArchivoEntrada` (`IdArchivoEntrada`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EvidenciaCurso`
--

LOCK TABLES `EvidenciaCurso` WRITE;
/*!40000 ALTER TABLE `EvidenciaCurso` DISABLE KEYS */;
INSERT INTO `EvidenciaCurso` VALUES (7,12,5,NULL,NULL,'2016-06-26 10:45:04','2016-06-26 10:43:41','2016-06-26 10:45:04'),(8,13,1,NULL,NULL,NULL,'2016-06-26 10:45:14','2016-06-26 10:45:14'),(9,14,2,NULL,NULL,NULL,'2016-06-26 10:45:29','2016-06-26 10:45:29');
/*!40000 ALTER TABLE `EvidenciaCurso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EvidenciaMedicion`
--

DROP TABLE IF EXISTS `EvidenciaMedicion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `EvidenciaMedicion` (
  `IdEvidenciaMedicion` int(11) NOT NULL AUTO_INCREMENT,
  `IdArchivoEntrada` int(11) DEFAULT NULL,
  `IdFuentexCursoxCriterioxCiclo` int(11) DEFAULT NULL,
  `IdHorario` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdEvidenciaMedicion`),
  KEY `IdHorario` (`IdHorario`),
  KEY `IdArchivoEntrada` (`IdArchivoEntrada`),
  KEY `IdFuentexCursoxCriterioxCiclo` (`IdFuentexCursoxCriterioxCiclo`),
  CONSTRAINT `EvidenciaMedicion_ibfk_1` FOREIGN KEY (`IdHorario`) REFERENCES `Horario` (`IdHorario`),
  CONSTRAINT `EvidenciaMedicion_ibfk_2` FOREIGN KEY (`IdArchivoEntrada`) REFERENCES `ArchivoEntrada` (`IdArchivoEntrada`),
  CONSTRAINT `EvidenciaMedicion_ibfk_3` FOREIGN KEY (`IdFuentexCursoxCriterioxCiclo`) REFERENCES `FuentexCursoxCriterioxCiclo` (`IdFuentexCursoxCriterioxCiclo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EvidenciaMedicion`
--

LOCK TABLES `EvidenciaMedicion` WRITE;
/*!40000 ALTER TABLE `EvidenciaMedicion` DISABLE KEYS */;
/*!40000 ALTER TABLE `EvidenciaMedicion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `FuenteMedicion`
--

DROP TABLE IF EXISTS `FuenteMedicion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `FuenteMedicion` (
  `IdFuenteMedicion` int(11) NOT NULL AUTO_INCREMENT,
  `IdEspecialidad` int(11) DEFAULT NULL,
  `Nombre` varchar(200) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdFuenteMedicion`),
  KEY `IdEspecialidad` (`IdEspecialidad`),
  CONSTRAINT `FuenteMedicion_ibfk_1` FOREIGN KEY (`IdEspecialidad`) REFERENCES `Especialidad` (`IdEspecialidad`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FuenteMedicion`
--

LOCK TABLES `FuenteMedicion` WRITE;
/*!40000 ALTER TABLE `FuenteMedicion` DISABLE KEYS */;
INSERT INTO `FuenteMedicion` VALUES (1,1,'Documentación y resultados del proyecto',NULL,'2016-05-27 21:56:00','2016-05-27 21:56:00'),(2,1,'Reporte de experimentación numérica',NULL,'2016-05-27 21:56:00','2016-05-27 21:56:00'),(3,1,'Documentación del proyecto',NULL,'2016-05-27 21:56:00','2016-05-27 21:56:00'),(4,1,'Evaluación de Desempeño',NULL,'2016-05-27 21:56:00','2016-05-27 21:56:00'),(5,1,'Presentación oral',NULL,'2016-05-27 21:56:00','2016-05-27 21:56:00');
/*!40000 ALTER TABLE `FuenteMedicion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `FuentexCursoxCriterioxCiclo`
--

DROP TABLE IF EXISTS `FuentexCursoxCriterioxCiclo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `FuentexCursoxCriterioxCiclo` (
  `IdFuentexCursoxCriterioxCiclo` int(11) NOT NULL AUTO_INCREMENT,
  `IdFuenteMedicion` int(11) DEFAULT NULL,
  `IdCriterio` int(11) DEFAULT NULL,
  `IdCurso` int(11) DEFAULT NULL,
  `IdCicloAcademico` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdFuentexCursoxCriterioxCiclo`),
  KEY `IdFuenteMedicion` (`IdFuenteMedicion`),
  KEY `IdCriterio` (`IdCriterio`),
  KEY `IdCurso` (`IdCurso`),
  KEY `IdCicloAcademico` (`IdCicloAcademico`),
  CONSTRAINT `FuentexCursoxCriterioxCiclo_ibfk_1` FOREIGN KEY (`IdFuenteMedicion`) REFERENCES `FuenteMedicion` (`IdFuenteMedicion`),
  CONSTRAINT `FuentexCursoxCriterioxCiclo_ibfk_2` FOREIGN KEY (`IdCriterio`) REFERENCES `Criterio` (`IdCriterio`),
  CONSTRAINT `FuentexCursoxCriterioxCiclo_ibfk_3` FOREIGN KEY (`IdCurso`) REFERENCES `Curso` (`IdCurso`),
  CONSTRAINT `FuentexCursoxCriterioxCiclo_ibfk_4` FOREIGN KEY (`IdCicloAcademico`) REFERENCES `CicloxEspecialidad` (`IdCicloAcademico`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FuentexCursoxCriterioxCiclo`
--

LOCK TABLES `FuentexCursoxCriterioxCiclo` WRITE;
/*!40000 ALTER TABLE `FuentexCursoxCriterioxCiclo` DISABLE KEYS */;
/*!40000 ALTER TABLE `FuentexCursoxCriterioxCiclo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Horario`
--

DROP TABLE IF EXISTS `Horario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Horario` (
  `IdHorario` int(11) NOT NULL AUTO_INCREMENT,
  `IdCursoxCiclo` int(11) DEFAULT NULL,
  `Codigo` varchar(10) DEFAULT NULL,
  `TotalAlumnos` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
-- inicio de campo agregado para PSP
  `idPspProcess` int(10) DEFAULT NULL,
-- fin de campo agregado para psp 
  PRIMARY KEY (`IdHorario`),
  KEY `IdCursoxCiclo` (`IdCursoxCiclo`),
--  KEY `idPspProcess` (`idPspProcess`),
--  CONSTRAINT `Horario_ibfk_2` FOREIGN KEY (`idPspProcess`) REFERENCES `pspprocesses` (`idPspProcess`),
  CONSTRAINT `Horario_ibfk_1` FOREIGN KEY (`IdCursoxCiclo`) REFERENCES `CursoxCiclo` (`IdCursoxCiclo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Horario`
--

LOCK TABLES `Horario` WRITE;
/*!40000 ALTER TABLE `Horario` DISABLE KEYS */;
INSERT INTO `Horario` VALUES (1,20,'H1081',12,NULL,'2016-06-19 06:12:24','2016-06-19 06:12:24',NULL),
(2,20,'H9812',NULL,NULL,'2016-06-22 20:42:32','2016-06-22 20:42:32',NULL),
(3,1,'H0601',NULL,NULL,'2016-06-23 18:05:08','2016-06-23 18:05:08',NULL),
(4,2,'H0581',NULL,NULL,'2016-06-24 18:37:25','2016-06-24 18:37:25',NULL),
(5,3,'H555',NULL,NULL,'2016-06-24 20:38:27','2016-06-24 20:38:27',NULL);
/*!40000 ALTER TABLE `Horario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `HorarioxAspecto`
--

DROP TABLE IF EXISTS `HorarioxAspecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `HorarioxAspecto` (
  `IdHorarioxAspecto` int(11) NOT NULL AUTO_INCREMENT,
  `IdHorario` int(11) DEFAULT NULL,
  `IdAspecto` int(11) DEFAULT NULL,
  `TotalAlumnos` int(11) DEFAULT NULL,
  `TotalCumplen` int(11) DEFAULT NULL,
  `Porcentaje` float DEFAULT NULL,
  `Promedio` float DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdHorarioxAspecto`),
  KEY `IdHorario` (`IdHorario`),
  KEY `IdAspecto` (`IdAspecto`),
  CONSTRAINT `HorarioxAspecto_idfk_1` FOREIGN KEY (`IdHorario`) REFERENCES `Horario` (`IdHorario`),
  CONSTRAINT `HorarioxAspecto_idfk_2` FOREIGN KEY (`IdAspecto`) REFERENCES `Aspecto` (`IdAspecto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `HorarioxAspecto`
--

LOCK TABLES `HorarioxAspecto` WRITE;
/*!40000 ALTER TABLE `HorarioxAspecto` DISABLE KEYS */;
/*!40000 ALTER TABLE `HorarioxAspecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `HorarioxCriterio`
--

DROP TABLE IF EXISTS `HorarioxCriterio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `HorarioxCriterio` (
  `IdHorarioxCriterio` int(11) NOT NULL AUTO_INCREMENT,
  `IdHorario` int(11) DEFAULT NULL,
  `IdCriterio` int(11) DEFAULT NULL,
  `TotalAlumnos` int(11) DEFAULT NULL,
  `TotalCumplen` int(11) DEFAULT NULL,
  `Porcentaje` float DEFAULT NULL,
  `Promedio` float DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdHorarioxCriterio`),
  KEY `IdHorario` (`IdHorario`),
  KEY `IdCriterio` (`IdCriterio`),
  CONSTRAINT `HorarioxCriterio_idfk_1` FOREIGN KEY (`IdHorario`) REFERENCES `Horario` (`IdHorario`),
  CONSTRAINT `HorarioxCriterio_idfk_2` FOREIGN KEY (`IdCriterio`) REFERENCES `Criterio` (`IdCriterio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `HorarioxCriterio`
--

LOCK TABLES `HorarioxCriterio` WRITE;
/*!40000 ALTER TABLE `HorarioxCriterio` DISABLE KEYS */;
/*!40000 ALTER TABLE `HorarioxCriterio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `HorarioxDocente`
--

DROP TABLE IF EXISTS `HorarioxDocente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `HorarioxDocente` (
  `IdHorarioxDocente` int(11) NOT NULL AUTO_INCREMENT,
  `IdDocente` int(11) DEFAULT NULL,
  `IdHorario` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdHorarioxDocente`),
  KEY `IdHorario` (`IdHorario`),
  KEY `IdDocente` (`IdDocente`),
  CONSTRAINT `HorarioxDocente_ibfk_1` FOREIGN KEY (`IdHorario`) REFERENCES `Horario` (`IdHorario`),
  CONSTRAINT `HorarioxDocente_ibfk_2` FOREIGN KEY (`IdDocente`) REFERENCES `Docente` (`IdDocente`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `HorarioxDocente`
--

LOCK TABLES `HorarioxDocente` WRITE;
/*!40000 ALTER TABLE `HorarioxDocente` DISABLE KEYS */;
INSERT INTO `HorarioxDocente` VALUES (1,4,1,NULL,'2016-06-19 06:12:24','2016-06-19 06:12:24'),(2,4,2,NULL,'2016-06-22 20:42:32','2016-06-22 20:42:32'),(3,4,3,NULL,'2016-06-23 18:05:08','2016-06-23 18:05:08'),(4,4,4,NULL,'2016-06-24 18:37:25','2016-06-24 18:37:25'),(5,4,5,NULL,'2016-06-24 20:38:27','2016-06-24 20:38:27');
/*!40000 ALTER TABLE `HorarioxDocente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `HorarioxResultado`
--

DROP TABLE IF EXISTS `HorarioxResultado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `HorarioxResultado` (
  `IdHorarioxResultado` int(11) NOT NULL AUTO_INCREMENT,
  `IdHorario` int(11) DEFAULT NULL,
  `IdResultadoEstudiantil` int(11) DEFAULT NULL,
  `TotalAlumnos` int(11) DEFAULT NULL,
  `TotalCumplen` int(11) DEFAULT NULL,
  `Porcentaje` float DEFAULT NULL,
  `Promedio` float DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdHorarioxResultado`),
  KEY `IdHorario` (`IdHorario`),
  KEY `IdResultadoEstudiantil` (`IdResultadoEstudiantil`),
  CONSTRAINT `HorarioxResultado_idfk_1` FOREIGN KEY (`IdHorario`) REFERENCES `Horario` (`IdHorario`),
  CONSTRAINT `HorarioxResultado_idfk_2` FOREIGN KEY (`IdResultadoEstudiantil`) REFERENCES `ResultadoEstudiantil` (`IdResultadoEstudiantil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `HorarioxResultado`
--

LOCK TABLES `HorarioxResultado` WRITE;
/*!40000 ALTER TABLE `HorarioxResultado` DISABLE KEYS */;
/*!40000 ALTER TABLE `HorarioxResultado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Informe`
--

DROP TABLE IF EXISTS `Informe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Informe` (
  `IdInforme` int(11) NOT NULL AUTO_INCREMENT,
  `IdHorario` int(11) DEFAULT NULL,
  `Titulo` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdInforme`),
  KEY `IdHorario` (`IdHorario`),
  CONSTRAINT `Informe_ibfk_1` FOREIGN KEY (`IdHorario`) REFERENCES `Horario` (`IdHorario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Informe`
--

LOCK TABLES `Informe` WRITE;
/*!40000 ALTER TABLE `Informe` DISABLE KEYS */;
/*!40000 ALTER TABLE `Informe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `NivelCriterio`
--

DROP TABLE IF EXISTS `NivelCriterio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `NivelCriterio` (
  `IdNivelCriterio` int(11) NOT NULL AUTO_INCREMENT,
  `IdCriterio` int(11) DEFAULT NULL,
  `IdPeriodo` int(11) DEFAULT NULL,
  `Valor` int(11) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdNivelCriterio`),
  KEY `IdCriterio` (`IdCriterio`),
  KEY `IdPeriodo` (`IdPeriodo`),
  CONSTRAINT `NivelCriterio_ibfk_1` FOREIGN KEY (`IdCriterio`) REFERENCES `Criterio` (`IdCriterio`),
  CONSTRAINT `NivelCriterio_ibfk_2` FOREIGN KEY (`IdPeriodo`) REFERENCES `Periodo` (`IdPeriodo`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `NivelCriterio`
--

LOCK TABLES `NivelCriterio` WRITE;
/*!40000 ALTER TABLE `NivelCriterio` DISABLE KEYS */;
INSERT INTO `NivelCriterio` VALUES (1,1,1,1,'Aplicar operaciones lógicas en situciones de manera deficiente',NULL,'2016-06-24 11:35:00','2016-06-24 11:35:00'),(2,1,1,2,'Aplicar operaciones lógicas en situciones simples',NULL,'2016-06-24 11:35:00','2016-06-24 11:35:00'),(3,1,1,3,'Aplicar operaciones lógicas en situciones complejas',NULL,'2016-06-24 11:35:00','2016-06-24 11:35:00'),(4,1,1,4,'Establecer soluciones integradas de manera lógica en problemas simples',NULL,'2016-06-24 11:35:00','2016-06-24 11:35:00'),(5,4,1,1,'Ser capaz de leer código fuente en lenguaje de alto nivel y entender parcialmente el algoritmo',NULL,'2016-06-24 11:38:47','2016-06-24 11:38:47'),(6,4,1,2,'Ser capaz de leer código fuente en lenguaje de alto nivel y entender el algoritmo',NULL,'2016-06-24 11:38:47','2016-06-24 11:38:47'),(7,4,1,3,'Tener la capacidad de modificar un algoritmo',NULL,'2016-06-24 11:38:47','2016-06-24 11:38:47'),(8,4,1,4,'Desarrollar el algoritmo nuevo a partir de una especificación',NULL,'2016-06-24 11:38:47','2016-06-24 11:38:47'),(9,5,1,1,'Conocer paradigmas de programación',NULL,'2016-06-24 11:40:30','2016-06-24 11:40:30'),(10,5,1,2,'Aplicar paradigmas de programación',NULL,'2016-06-24 11:40:30','2016-06-24 11:40:30'),(11,5,1,3,'Implementar un algoritmo',NULL,'2016-06-24 11:40:30','2016-06-24 11:40:30'),(12,5,1,4,'Utiliza patrones de programación ',NULL,'2016-06-24 11:40:30','2016-06-24 11:40:30'),(13,6,1,1,'Tener problemas al identificar y definir las variables involucradas',NULL,'2016-06-24 11:42:54','2016-06-24 11:42:54'),(14,6,1,2,'Identificar y definir las variables involucradas',NULL,'2016-06-24 11:42:54','2016-06-24 11:42:54'),(15,6,1,3,'Establecer hipótesis de trabajo',NULL,'2016-06-24 11:42:54','2016-06-24 11:42:54'),(16,6,1,4,'Establecer el grado de confianza del experimento',NULL,'2016-06-24 11:42:54','2016-06-24 11:42:54'),(17,7,1,1,'Ejecutar con dificultad un experimento ',NULL,'2016-06-24 11:43:28','2016-06-24 11:43:28'),(18,7,1,2,'Ejecutar un experimento',NULL,'2016-06-24 11:43:28','2016-06-24 11:43:28'),(19,7,1,3,'Presentar resultados en formatos organizados',NULL,'2016-06-24 11:43:29','2016-06-24 11:43:29'),(20,7,1,4,'Interpreta los resultados',NULL,'2016-06-24 11:43:29','2016-06-24 11:43:29'),(21,8,1,1,'Identificar requerimientos con dificultad',NULL,'2016-06-24 11:46:37','2016-06-24 11:46:37'),(22,8,1,2,'Identificar tanto los requerimientos proporcionados por el usuario como aquellos requerimientos implícitos .',NULL,'2016-06-24 11:46:37','2016-06-24 11:46:37'),(23,8,1,3,'Identificar requerimientos relacionándolos con patrones de procesos  organizacionales',NULL,'2016-06-24 11:46:37','2016-06-24 11:46:37'),(24,8,1,4,'Identificar requerimientos, distinguiendo aquellos que producen un mayor impacto en el  rendimiento de la organización de los que no.',NULL,'2016-06-24 11:46:37','2016-06-24 11:46:37'),(25,9,1,1,'Presentar una solución deficiente a los requerimientos identificados.',NULL,'2016-06-24 11:58:56','2016-06-24 11:58:56'),(26,9,1,2,'Presentar una única solución a los requerimientos de información ',NULL,'2016-06-24 11:58:56','2016-06-24 11:58:56'),(27,9,1,3,'Diseñar más de una alternativa de solución a los requerimientos de información.',NULL,'2016-06-24 11:58:56','2016-06-24 11:58:56'),(28,9,1,4,'Diseñar más de una alternativa de solución a los requerimientos de información y efectúa una evaluación económica de su propuesta. ',NULL,'2016-06-24 11:58:56','2016-06-24 11:58:56'),(29,10,1,1,'Sus modelos no guardan relación con los requerimientos identificados y reflejan poco entendimiento de las técnicas  de análisis y diseño de sistemas',NULL,'2016-06-24 11:59:41','2016-06-24 11:59:41'),(30,10,1,2,'Utilizar las técnicas  de análisis y diseño de sistemas. Sus modelos se enfocan únicamente en los procesos y  requerimientos principales. Su modelo conllevará a un sistema poco configurable.',NULL,'2016-06-24 11:59:41','2016-06-24 11:59:41'),(31,10,1,3,'Utilizar bien las técnicas de análisis y diseño de sistemas. Se enfoca tanto en los requerimientos principales como en los secundarios mostrando un modelo sólido y   configurable. ',NULL,'2016-06-24 11:59:41','2016-06-24 11:59:41'),(32,10,1,4,'Utilizar bien las técnicas de análisis y diseño de sistemas. Enfoca muy bien todos los  requerimientos y su modelo refleja las interacciones de su parte frente al sistema completo. Presenta una evalua',NULL,'2016-06-24 11:59:41','2016-06-24 11:59:41'),(33,11,1,1,'El componente no presenta  interacción con el resto del sistema. ',NULL,'2016-06-24 12:00:50','2016-06-24 12:00:50'),(34,11,1,2,'El componente no presenta  interacción con el resto del sistema. ',NULL,'2016-06-24 12:00:50','2016-06-24 12:00:50'),(35,11,1,3,'El componente interacciona con el resto del sistema, sin embargo solo considera las interfaces principales requeridas con los otros componentes del sistema.',NULL,'2016-06-24 12:00:50','2016-06-24 12:00:50'),(36,11,1,4,'El componente interacciona con el resto del sistema y considera todas las interfaces requeridas con otros componentes u otros sistemas.',NULL,'2016-06-24 12:00:50','2016-06-24 12:00:50'),(37,12,1,1,'Trabaja de forma individual',NULL,'2016-06-24 12:01:31','2016-06-24 12:01:31'),(38,12,1,2,'Comparte responsabilidades con los demás miembros del equipo.',NULL,'2016-06-24 12:01:31','2016-06-24 12:01:31'),(39,12,1,3,'Apoya a otros miembros del equipo en sus necesidades, demostrando compromiso con las metas del equipo. ',NULL,'2016-06-24 12:01:31','2016-06-24 12:01:31'),(40,12,1,4,'Apoya a otros miembros del equipo en sus necesidades, demostrando compromiso con las metas del equipo, motivando la partici pación de todo el equipo. ',NULL,'2016-06-24 12:01:31','2016-06-24 12:01:31'),(41,13,1,1,'Pierde el control ante un conflicto',NULL,'2016-06-24 12:02:17','2016-06-24 12:02:17'),(42,13,1,2,'En ocasiones entra en conflicto con los compañeros de grupo',NULL,'2016-06-24 12:02:17','2016-06-24 12:02:17'),(43,13,1,3,'Trata de resolver el conflicto aportando ideas',NULL,'2016-06-24 12:02:17','2016-06-24 12:02:17'),(44,13,1,4,'Resuelve el conflicto de manera satisfactoria',NULL,'2016-06-24 12:02:17','2016-06-24 12:02:17'),(45,14,1,1,'Da feedback pero no le gusta recibir feedback ni críticas de los demás.',NULL,'2016-06-24 12:03:21','2016-06-24 12:03:21'),(46,14,1,2,'Da feedback, pero presenta problemas a la hora de recibir feedback, no acepta las críticas de los demás y utiliza un lenguaje crítico al momento de dar feedback.',NULL,'2016-06-24 12:03:21','2016-06-24 12:03:21'),(47,14,1,3,'Da y recibe feedback, le cuesta trabajo aceptar las críticas de los demás. Evita utilizar un lenguaje crítico al momento de dar feedback.',NULL,'2016-06-24 12:03:21','2016-06-24 12:03:21'),(48,14,1,4,'Da, solicita  y recibe feedback, aceptando las críticas de los demás e incorporándolas  en sus mejoras. Evita utilizar un lenguaje crítico al momento de dar feedback.',NULL,'2016-06-24 12:03:21','2016-06-24 12:03:21'),(49,15,1,1,'Dificultad al presentar los trabajos a tiempo',NULL,'2016-06-24 12:04:29','2016-06-24 12:04:29'),(50,15,1,2,'Cumple con las tareas asignadas de manera correcta',NULL,'2016-06-24 12:04:29','2016-06-24 12:04:29'),(51,15,1,3,'Tiene una actitud proactiva y cumple con las tareas asignadas',NULL,'2016-06-24 12:04:29','2016-06-24 12:04:29'),(52,15,1,4,'Son altamente efectivos y altamente eficientes (supera las expectativas)',NULL,'2016-06-24 12:04:29','2016-06-24 12:04:29'),(53,16,1,1,'Identificar parcialmente un problema simple',NULL,'2016-06-24 12:05:23','2016-06-24 12:05:23'),(54,16,1,2,'Identificar problemas simples, plantear la solución e implementarla',NULL,'2016-06-24 12:05:23','2016-06-24 12:05:23'),(55,16,1,3,'Identificar problemas simples, plantear varias soluciones e implementar la más conveniente',NULL,'2016-06-24 12:05:23','2016-06-24 12:05:23'),(56,16,1,4,'Identificar problemas complejos, plantear la solución e implementarla',NULL,'2016-06-24 12:05:23','2016-06-24 12:05:23'),(57,17,1,1,'No reconoce y no se compromete nada con la seguridad en el trabajo',NULL,'2016-06-24 12:06:00','2016-06-24 12:06:00'),(58,17,1,2,'Reconoce y se compromete mínimamente con la seguridad en el trabajo',NULL,'2016-06-24 12:06:00','2016-06-24 12:06:00'),(59,17,1,3,'Reconoce y se compromete parcialmente con la seguridad en el trabajo.',NULL,'2016-06-24 12:06:00','2016-06-24 12:06:00'),(60,17,1,4,'Reconoce y se compromete totalmente con la seguridad en el trabajo.',NULL,'2016-06-24 12:06:00','2016-06-24 12:06:00'),(61,18,1,1,'No reconoce y no se compromete nada con la satisfacción a los clientes',NULL,'2016-06-24 12:12:06','2016-06-24 12:12:06'),(62,18,1,2,'Reconoce y se compromete mínimamente con la satisfacción a los clientes',NULL,'2016-06-24 12:12:06','2016-06-24 12:12:06'),(63,18,1,3,'Reconoce y se compromete parcialmente con la satisfacción a los clientes',NULL,'2016-06-24 12:12:06','2016-06-24 12:12:06'),(64,18,1,4,'Reconoce y se compromete totalmente con la satisfacción a los clientes',NULL,'2016-06-24 12:12:06','2016-06-24 12:12:06'),(65,19,1,1,'No Considera  nada el respeto a sus compañeros de trabajo',NULL,'2016-06-24 12:12:40','2016-06-24 12:12:40'),(66,19,1,2,'Considera mínimamente el respeto a sus compañeros de trabajo',NULL,'2016-06-24 12:12:40','2016-06-24 12:12:40'),(67,19,1,3,'Considera  parcialmente el respeto a sus compañeros de trabajo',NULL,'2016-06-24 12:12:40','2016-06-24 12:12:40'),(68,19,1,4,'Considera totalmente el respeto a sus compañeros de trabajo',NULL,'2016-06-24 12:12:40','2016-06-24 12:12:40'),(69,20,1,1,'No se comporta éticamente en su desempeño profesional.',NULL,'2016-06-24 12:13:15','2016-06-24 12:13:15'),(70,20,1,2,'Sólo a veces se comporta éticamente en su desempeño profesional.',NULL,'2016-06-24 12:13:15','2016-06-24 12:13:15'),(71,20,1,3,'La mayoría de las veces se comporta éticamente en su desempeño profesional.',NULL,'2016-06-24 12:13:15','2016-06-24 12:13:15'),(72,20,1,4,'Siempre se comporta éticamente en su desempeño profesional.',NULL,'2016-06-24 12:13:15','2016-06-24 12:13:15'),(73,21,1,1,'Presenta textos que permiten inferir su propósito general.',NULL,'2016-06-24 12:32:09','2016-06-24 12:32:09'),(74,21,1,2,'Además exponen ideas relevantes y cuida las extensiones de los párrafos.',NULL,'2016-06-24 12:32:09','2016-06-24 12:32:09'),(75,21,1,3,'Además las ideas expuestas son bien sustentadas y cohesionadas y cada párrafo desarrolla una idea central.',NULL,'2016-06-24 12:32:09','2016-06-24 12:32:09'),(76,21,1,4,'Además utiliza variadas estructuras sintácticas, un vocabulario acorde al nivel del propósito del texto y comete pocos errores gramaticales.',NULL,'2016-06-24 12:32:09','2016-06-24 12:32:09'),(77,22,1,1,'Expone oralmente dando a entender un propósito general. Interactua con el interlocutor.',NULL,'2016-06-24 12:32:35','2016-06-24 12:32:35'),(78,22,1,2,'Además se expresa con pocas vacilaciones (buena fluidez) y de manera coherente (buena conexión de ideas). Hace buen uso del tiempo.',NULL,'2016-06-24 12:32:35','2016-06-24 12:32:35'),(79,22,1,3,'Además su pronunciación y nivel de voz permite entenderlo con facilidad y escoge una estrategia de comunicación adecuada al tema y al interlocutor.',NULL,'2016-06-24 12:32:35','2016-06-24 12:32:35'),(80,22,1,4,'Además utiliza variadas estructuras sintácticas, un vocabulario acorde al nivel del propósito de la exposición y comete pocos errores gramaticales.',NULL,'2016-06-24 12:32:35','2016-06-24 12:32:35'),(81,23,1,1,'No es capaz de obtener una síntesis de manera rápida y directa de un texto que se le presenta',NULL,'2016-06-24 12:33:03','2016-06-24 12:33:03'),(82,23,1,2,'Comprende parcialmente el contenido de un texto y resume algunas de las ideas',NULL,'2016-06-24 12:33:03','2016-06-24 12:33:03'),(83,23,1,3,'Distingue la idea principal al leer un documento pero, presenta  algunas deficiencias al generar una síntesis de lo adquirido',NULL,'2016-06-24 12:33:03','2016-06-24 12:33:03'),(84,23,1,4,'Distingue claramente la idea principal de un texto y es capaz de sintetizarlo de manera eficiente sobre conclusiones.',NULL,'2016-06-24 12:33:03','2016-06-24 12:33:03'),(85,24,1,1,'No conocer alguna solución tecnológica que ha tenido cierto impacto en un determinado contexto ',NULL,'2016-06-24 12:34:50','2016-06-24 12:34:50'),(86,24,1,2,'Conocer alguna solución tecnológica que ha tenido cierto impacto en un determinado contexto ',NULL,'2016-06-24 12:34:50','2016-06-24 12:34:50'),(87,24,1,3,'Conocer con más profundidad la tecnología utilizada en una solución que ha tenido cierto impacto en un contexto',NULL,'2016-06-24 12:34:50','2016-06-24 12:34:50'),(88,24,1,4,'Conocer con más profundidad las tecnologías utilizadas en diversas soluciones que han tenido cierto impacto en diferentes contextos.',NULL,'2016-06-24 12:34:50','2016-06-24 12:34:50'),(89,25,1,1,'No define  un plan de capacitación',NULL,'2016-06-24 12:35:24','2016-06-24 12:35:24'),(90,25,1,2,'Tiene un plan de capacitación a corto plazo(menos de un año) de temas específicos a su carrera',NULL,'2016-06-24 12:35:24','2016-06-24 12:35:24'),(91,25,1,3,'Tiene un plan de capacitación  a mediano plazo ( alrededor de tres años) para desarrollar  conocimientos y habilidades adicionales a su carrera.',NULL,'2016-06-24 12:35:24','2016-06-24 12:35:24'),(92,25,1,4,'Tiene un plan de capacitación  a largo  plazo (más de cinco años) para desarrollar  conocimientos y habilidades adicionales a su carrera.',NULL,'2016-06-24 12:35:24','2016-06-24 12:35:24'),(93,26,1,1,'No conocer algún tema de actualidad',NULL,'2016-06-24 12:36:01','2016-06-24 12:36:01'),(94,26,1,2,'Conocer algún tema de actualidad.',NULL,'2016-06-24 12:36:01','2016-06-24 12:36:01'),(95,26,1,3,'Conoce y mantine una posición respecto a algún  campo de interés específico (deportes, política, economía,etc)',NULL,'2016-06-24 12:36:01','2016-06-24 12:36:01'),(96,26,1,4,'Conoce  y mantiene  una posición  en varios campos de la actualidad.',NULL,'2016-06-24 12:36:01','2016-06-24 12:36:01'),(97,27,1,1,'Presentar problemas al aplicar las THE\'s básicas',NULL,'2016-06-24 12:36:36','2016-06-24 12:36:36'),(98,27,1,2,'Aplicar las THE\'s básicas',NULL,'2016-06-24 12:36:36','2016-06-24 12:36:36'),(99,27,1,3,'Seleccionar y aplicar las THE\'s para un contexto simple.Es decir, da solución a problemas  que involucre aspectos informáticos.',NULL,'2016-06-24 12:36:36','2016-06-24 12:36:36'),(100,27,1,4,'Seleccionar y aplicar las THE\'s para un contexto complejo.Es decir, da solución a un problema que involucre a  además de aspectos informáticos ( técnicas de gestión,RRHH, calidad,etc)',NULL,'2016-06-24 12:36:36','2016-06-24 12:36:36'),(101,28,1,1,'No identifica las variables que influyen en el costo de un proyecto software',NULL,'2016-06-24 12:38:24','2016-06-24 12:38:24'),(102,28,1,2,'Identifica las variables del proyecto que en influyen en el costo del proyecto software',NULL,'2016-06-24 12:38:24','2016-06-24 12:38:24'),(103,28,1,3,'Evalua alternativas basados en el costo-presente de un proyecto software',NULL,'2016-06-24 12:38:24','2016-06-24 12:38:24'),(104,28,1,4,'Evalua alternativas basados en el costo-futuro  de un proyecto software',NULL,'2016-06-24 12:38:24','2016-06-24 12:38:24'),(105,29,1,1,'No se tiene un plan de proyecto documentado previo a la ejecución del proyecto.',NULL,'2016-06-24 12:39:00','2016-06-24 12:39:00'),(106,29,1,2,'Se tiene un plan de proyecto que contempla  todo el trabajo necesario para completar el proyecto (alcance, tiempo, “costos”, riesgos, calidad).',NULL,'2016-06-24 12:39:00','2016-06-24 12:39:00'),(107,29,1,3,'Se conoce el estado del proyecto (Se tiene registros del esfuerzo real empleado, porcentaje de avance y cambios ocurridos en el proyecto). ',NULL,'2016-06-24 12:39:00','2016-06-24 12:39:00'),(108,29,1,4,'Se tiene registros de solicitudes de cambios, acciones correctivas y preventivas desarrolladas durante el proyecto.',NULL,'2016-06-24 12:39:00','2016-06-24 12:39:00');
/*!40000 ALTER TABLE `NivelCriterio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ObjetivoEducacional`
--

DROP TABLE IF EXISTS `ObjetivoEducacional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ObjetivoEducacional` (
  `IdObjetivoEducacional` int(11) NOT NULL AUTO_INCREMENT,
  `IdEspecialidad` int(11) DEFAULT NULL,
  `Numero` int(11) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `CicloRegistro` varchar(10) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdObjetivoEducacional`),
  KEY `IdEspecialidad` (`IdEspecialidad`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ObjetivoEducacional`
--

LOCK TABLES `ObjetivoEducacional` WRITE;
/*!40000 ALTER TABLE `ObjetivoEducacional` DISABLE KEYS */;
INSERT INTO `ObjetivoEducacional` VALUES (1,1,1,'Conducir el análisis de procesos de negocio y necesidades de información de la organización.',NULL,NULL,'2016-06-18 19:30:47','2016-06-24 20:25:49',1),(2,1,2,'Dirigir las actividades del ciclo de vida de proyectos informáticos , utilizando tecnología,estándares y herramientas adecuadas.',NULL,NULL,'2016-06-18 19:31:36','2016-06-24 20:25:49',1),(3,1,3,'Administrar la infraestructura informatica de la organización.',NULL,'2016-06-23 17:55:22','2016-06-18 19:32:00','2016-06-23 17:55:22',1),(4,2,1,'Formular, implementar, controlar, supervisar y evaluar proyectos de ingeniería industrial utilizando de manera eficiente los factores de producción de bienes y servicios.',NULL,NULL,'2016-06-18 19:42:24','2016-06-18 19:42:24',NULL),(5,2,2,'Diseñar, mejorar, implementar y administrar procesos y sistemas, solucionando problemas que se generen al interior de la empresa o en interacción con otras entidades.',NULL,NULL,'2016-06-18 19:42:41','2016-06-18 19:42:41',NULL),(6,2,3,'Liderar y trabajar en equipo promoviendo la comunicación y la participación activa de sus integrantes con el fin de mejorar su desempeño.',NULL,NULL,'2016-06-18 19:43:40','2016-06-18 19:43:40',NULL),(7,2,4,'Asumir con éxito retos profesionales que involucren la adquisición de conocimientos y habilidades adicionales a su formación profesional.',NULL,NULL,'2016-06-18 19:44:05','2016-06-18 19:44:05',NULL),(8,2,5,'Ser agente de cambio demostrando en todo momento una actitud positiva frente a la innovación y actuando de manera responsable y ética.',NULL,NULL,'2016-06-18 19:44:19','2016-06-18 19:44:19',NULL),(9,2,6,'Seguir con éxito estudios de posgrado a nivel nacional e internacional.',NULL,NULL,'2016-06-18 19:44:32','2016-06-18 19:44:32',NULL),(10,3,1,'Integrar el equipo de trabajo interdisciplinario, y ser capaz de comunicarse técnicamente con los profesionales de otras disciplinas relacionadas con la ingeniería civil.\r\n',NULL,NULL,'2016-06-18 19:51:57','2016-06-18 19:51:57',NULL),(11,3,2,'Asumir retos que involucren la adquisición de nuevos conocimientos y habilidades adicionales a su formación profesional, con una actitud proactiva frente a la innovación.\r\n',NULL,NULL,'2016-06-18 19:52:09','2016-06-18 19:52:09',NULL),(12,3,3,'Administrar eficientemente los recursos para mejorar la calidad de las obras civiles e incrementar su rentabilidad velando por la seguridad de los trabajadores a su cargo.\r\n',NULL,NULL,'2016-06-18 19:52:20','2016-06-18 19:52:20',NULL),(13,3,4,'Respetar el medio ambiente actuando con responsabilidad social frente a las comunidades y al entorno donde se desarrollan sus actividades.',NULL,NULL,'2016-06-18 19:52:31','2016-06-18 19:52:31',NULL);
/*!40000 ALTER TABLE `ObjetivoEducacional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PasswordResets`
--

DROP TABLE IF EXISTS `PasswordResets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PasswordResets` (
  `user_id` int(10) unsigned NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `PasswordResets_token_index` (`token`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PasswordResets`
--

LOCK TABLES `PasswordResets` WRITE;
/*!40000 ALTER TABLE `PasswordResets` DISABLE KEYS */;
INSERT INTO `PasswordResets` VALUES (2,'84e4ea1ec9e6605a7c971dbfbf4cbc9fe87cec037c15f211fedc80c4f19cdc70','2016-06-18 17:24:00'),(3,'8e5ca56be3bb11596e6bcbab6c00c4dd6ffe8bdece697e145e7eff7753e61710','2016-06-18 17:52:40'),(4,'f3190fddc2ca4a89c6964c48095102e26c127ca5647e126d977cf90881ed24b6','2016-06-18 17:55:02'),(5,'6d0c1aff957edce1f35b492e79e723d932ad1d6449f8350db12d384bdd68e84b','2016-06-19 06:07:14'),(6,'690c2febf6fbd6daea61e173bced9e8d19ed682519d6d4f8934cd5bb0a8c845e','2016-06-19 15:36:04'),(7,'7282e96cbe3e71258191260751e2fe020391d856ba1fa1a1ad941e17d3352f3f','2016-06-19 15:47:11'),(8,'8c2edda6f5ef7dfcffbe425f324e62bdca53f8ce02c680ecdfbe59996292c0a1','2016-06-19 16:22:40'),(9,'0a1cce0a347c5fd7aaa0727f9158477af89c18bced175891c3ee10a147236b40','2016-06-20 21:35:34'),(10,'ad698abba86fc0b83deac41e7c010a2831b53566b103fda16f518d5b370d7c09','2016-06-20 21:35:34'),(11,'4f6f1ab33e00bc44c8239a996bf04b73e22af1f4753361d705e4c61b20f6b640','2016-06-20 21:35:37'),(12,'1f0af9fc01744156b4e392459b1820cf9bd49e8b6cbf38cedebe5644a76d7548','2016-06-20 21:37:04'),(13,'dddb4aaa3f24ef075b882210b468d54dee745555104ff26a00be962bd793625e','2016-06-23 18:54:30');
/*!40000 ALTER TABLE `PasswordResets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Perfil`
--

DROP TABLE IF EXISTS `Perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Perfil` (
  `IdPerfil` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdPerfil`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Perfil`
--

LOCK TABLES `Perfil` WRITE;
/*!40000 ALTER TABLE `Perfil` DISABLE KEYS */;
INSERT INTO `Perfil` VALUES (1,'Coordinador','Coordinador de la Especialidad',NULL,'2016-05-28 02:56:00','2016-06-24 18:05:44'),(2,'Profesor','Profesor de una Especialidad',NULL,'2016-05-28 02:56:00','2016-06-24 20:15:18'),(3,'Administrador','Administrador de la Facultad',NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(4,'Acreditador','Acreditador de una Especialidad',NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(5,'Investigador','Investigador de la facultad',NULL,'2016-05-28 02:56:00','2016-06-24 12:01:17');
/*!40000 ALTER TABLE `Perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PerfilxAccion`
--

DROP TABLE IF EXISTS `PerfilxAccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PerfilxAccion` (
  `IdPerfilxAccion` int(11) NOT NULL AUTO_INCREMENT,
  `IdPerfil` int(11) DEFAULT NULL,
  `IdAccion` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdPerfilxAccion`),
  KEY `IdPerfil` (`IdPerfil`),
  KEY `IdAccion` (`IdAccion`)
) ENGINE=InnoDB AUTO_INCREMENT=301 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PerfilxAccion`
--

LOCK TABLES `PerfilxAccion` WRITE;
/*!40000 ALTER TABLE `PerfilxAccion` DISABLE KEYS */;
INSERT INTO `PerfilxAccion` VALUES (1,3,1,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(2,3,2,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(5,3,5,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(6,3,6,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(7,3,7,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(8,3,8,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(9,3,9,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(10,3,10,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(11,3,11,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(12,3,12,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(13,3,13,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(14,3,14,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(15,3,15,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(16,3,16,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(17,3,17,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(18,3,18,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(19,3,19,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(20,3,20,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(21,3,21,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(22,3,22,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(23,3,23,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(24,3,24,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(25,3,25,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(26,3,26,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(27,3,27,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(28,3,28,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(29,3,29,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(30,3,30,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(31,3,31,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(32,3,32,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(33,3,33,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(34,3,34,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(35,3,35,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(36,3,36,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(37,3,37,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(38,3,38,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(39,3,39,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(40,3,40,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(41,3,41,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(42,3,42,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(43,3,43,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(44,3,44,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(45,3,45,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(46,3,46,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(47,3,47,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(48,3,48,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(49,3,49,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(50,3,50,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(51,3,51,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(52,3,52,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(53,3,53,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(54,3,54,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(55,3,55,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(56,3,56,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(57,3,57,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(58,3,58,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(59,3,59,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(60,3,60,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(61,3,61,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(62,3,62,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(63,3,63,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(64,3,64,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(65,3,65,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(66,3,66,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(67,3,67,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(68,3,68,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(69,3,69,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(70,3,70,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(71,3,71,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(72,3,72,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(73,3,73,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(74,3,74,NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(75,3,75,NULL,'2016-05-27 21:56:00','2016-05-27 21:56:00'),(76,2,36,'2016-06-18 21:49:11','2016-06-18 21:42:39','2016-06-18 21:49:11'),(77,2,36,'2016-06-18 21:50:59','2016-06-18 21:49:11','2016-06-18 21:50:59'),(78,2,38,'2016-06-18 21:50:59','2016-06-18 21:49:11','2016-06-18 21:50:59'),(79,2,39,'2016-06-18 21:50:59','2016-06-18 21:49:11','2016-06-18 21:50:59'),(80,2,40,'2016-06-18 21:50:59','2016-06-18 21:49:11','2016-06-18 21:50:59'),(81,2,41,'2016-06-18 21:50:59','2016-06-18 21:49:11','2016-06-18 21:50:59'),(82,2,42,'2016-06-18 21:50:59','2016-06-18 21:49:11','2016-06-18 21:50:59'),(83,2,43,'2016-06-18 21:50:59','2016-06-18 21:49:11','2016-06-18 21:50:59'),(84,2,44,'2016-06-18 21:50:59','2016-06-18 21:49:11','2016-06-18 21:50:59'),(85,2,55,'2016-06-18 21:50:59','2016-06-18 21:49:11','2016-06-18 21:50:59'),(86,2,73,'2016-06-18 21:50:59','2016-06-18 21:49:11','2016-06-18 21:50:59'),(87,2,35,'2016-06-18 22:00:07','2016-06-18 21:50:59','2016-06-18 22:00:07'),(88,2,36,'2016-06-18 22:00:07','2016-06-18 21:50:59','2016-06-18 22:00:07'),(89,2,38,'2016-06-18 22:00:07','2016-06-18 21:50:59','2016-06-18 22:00:07'),(90,2,39,'2016-06-18 22:00:07','2016-06-18 21:50:59','2016-06-18 22:00:07'),(91,2,40,'2016-06-18 22:00:07','2016-06-18 21:50:59','2016-06-18 22:00:07'),(92,2,41,'2016-06-18 22:00:07','2016-06-18 21:50:59','2016-06-18 22:00:07'),(93,2,42,'2016-06-18 22:00:07','2016-06-18 21:50:59','2016-06-18 22:00:07'),(94,2,43,'2016-06-18 22:00:07','2016-06-18 21:50:59','2016-06-18 22:00:07'),(95,2,44,'2016-06-18 22:00:07','2016-06-18 21:50:59','2016-06-18 22:00:07'),(96,2,73,'2016-06-18 22:00:07','2016-06-18 21:50:59','2016-06-18 22:00:07'),(98,2,36,'2016-06-18 22:12:43','2016-06-18 22:00:07','2016-06-18 22:12:43'),(99,2,37,'2016-06-18 22:12:43','2016-06-18 22:00:07','2016-06-18 22:12:43'),(100,2,38,'2016-06-18 22:12:43','2016-06-18 22:00:07','2016-06-18 22:12:43'),(101,2,39,'2016-06-18 22:12:43','2016-06-18 22:00:07','2016-06-18 22:12:43'),(102,2,40,'2016-06-18 22:12:43','2016-06-18 22:00:07','2016-06-18 22:12:43'),(103,2,41,'2016-06-18 22:12:43','2016-06-18 22:00:07','2016-06-18 22:12:43'),(104,2,42,'2016-06-18 22:12:43','2016-06-18 22:00:07','2016-06-18 22:12:43'),(105,2,43,'2016-06-18 22:12:43','2016-06-18 22:00:07','2016-06-18 22:12:43'),(106,2,44,'2016-06-18 22:12:43','2016-06-18 22:00:07','2016-06-18 22:12:43'),(107,2,47,'2016-06-18 22:12:43','2016-06-18 22:00:07','2016-06-18 22:12:43'),(108,2,67,'2016-06-18 22:12:43','2016-06-18 22:00:07','2016-06-18 22:12:43'),(109,2,73,'2016-06-18 22:12:43','2016-06-18 22:00:07','2016-06-18 22:12:43'),(110,2,35,'2016-06-24 13:58:17','2016-06-18 22:12:43','2016-06-24 13:58:17'),(111,2,36,'2016-06-24 13:58:18','2016-06-18 22:12:43','2016-06-24 13:58:18'),(112,2,37,'2016-06-24 13:58:18','2016-06-18 22:12:43','2016-06-24 13:58:18'),(113,2,38,'2016-06-24 13:58:18','2016-06-18 22:12:43','2016-06-24 13:58:18'),(114,2,39,'2016-06-24 13:58:18','2016-06-18 22:12:43','2016-06-24 13:58:18'),(115,2,40,'2016-06-24 13:58:18','2016-06-18 22:12:43','2016-06-24 13:58:18'),(116,2,41,'2016-06-24 13:58:18','2016-06-18 22:12:43','2016-06-24 13:58:18'),(117,2,42,'2016-06-24 13:58:18','2016-06-18 22:12:43','2016-06-24 13:58:18'),(118,2,43,'2016-06-24 13:58:18','2016-06-18 22:12:43','2016-06-24 13:58:18'),(119,2,44,'2016-06-24 13:58:18','2016-06-18 22:12:43','2016-06-24 13:58:18'),(120,2,47,'2016-06-24 13:58:18','2016-06-18 22:12:43','2016-06-24 13:58:18'),(121,2,67,'2016-06-24 13:58:18','2016-06-18 22:12:43','2016-06-24 13:58:18'),(122,2,73,'2016-06-24 13:58:18','2016-06-18 22:12:43','2016-06-24 13:58:18'),(123,5,54,'2016-06-18 22:21:29','2016-06-18 22:18:58','2016-06-18 22:21:29'),(124,5,55,'2016-06-18 22:21:29','2016-06-18 22:18:58','2016-06-18 22:21:29'),(125,5,56,'2016-06-18 22:21:29','2016-06-18 22:18:58','2016-06-18 22:21:29'),(126,5,54,'2016-06-24 12:01:17','2016-06-18 22:21:29','2016-06-24 12:01:17'),(127,5,55,'2016-06-24 12:01:17','2016-06-18 22:21:29','2016-06-24 12:01:17'),(128,5,56,'2016-06-24 12:01:17','2016-06-18 22:21:29','2016-06-24 12:01:17'),(129,5,70,'2016-06-24 12:01:17','2016-06-18 22:21:29','2016-06-24 12:01:17'),(130,5,72,'2016-06-24 12:01:17','2016-06-18 22:21:29','2016-06-24 12:01:17'),(131,4,54,NULL,'2016-06-18 22:24:21','2016-06-18 22:24:21'),(132,4,55,NULL,'2016-06-18 22:24:21','2016-06-18 22:24:21'),(133,4,56,NULL,'2016-06-18 22:24:21','2016-06-18 22:24:21'),(134,1,1,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(135,1,2,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(136,1,5,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(137,1,6,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(138,1,7,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(139,1,8,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(140,1,9,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(141,1,10,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(142,1,11,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(143,1,12,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(144,1,13,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(145,1,14,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(146,1,15,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(147,1,16,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(148,1,17,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(149,1,18,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(150,1,19,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(151,1,20,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(152,1,21,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(153,1,22,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(154,1,23,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(155,1,24,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(156,1,25,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(157,1,26,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(158,1,27,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(159,1,28,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(160,1,29,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(161,1,30,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(162,1,31,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(163,1,32,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(164,1,33,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(165,1,34,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(166,1,35,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(167,1,36,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(168,1,37,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(169,1,38,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(170,1,39,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(171,1,40,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(172,1,41,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(173,1,42,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(174,1,43,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(175,1,44,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(176,1,45,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(177,1,46,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(178,1,47,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(179,1,48,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(180,1,49,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(181,1,50,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(182,1,51,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(183,1,52,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(184,1,53,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(185,1,54,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(186,1,55,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(187,1,56,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(188,1,67,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(189,1,68,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(190,1,73,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(191,1,74,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(192,1,75,'2016-06-24 18:05:44','2016-06-18 22:36:52','2016-06-24 18:05:44'),(193,4,53,NULL,'2016-06-18 22:36:52','2016-06-18 22:36:52'),(194,5,53,'2016-06-24 12:01:17','2016-06-18 22:36:52','2016-06-24 12:01:17'),(195,5,53,NULL,'2016-06-24 12:01:17','2016-06-24 12:01:17'),(196,5,54,NULL,'2016-06-24 12:01:17','2016-06-24 12:01:17'),(197,5,55,NULL,'2016-06-24 12:01:17','2016-06-24 12:01:17'),(198,5,56,NULL,'2016-06-24 12:01:17','2016-06-24 12:01:17'),(199,5,70,NULL,'2016-06-24 12:01:17','2016-06-24 12:01:17'),(200,5,72,NULL,'2016-06-24 12:01:17','2016-06-24 12:01:17'),(201,5,78,NULL,'2016-06-24 12:01:17','2016-06-24 12:01:17'),(202,6,78,'2016-06-24 14:37:22','2016-06-24 12:01:44','2016-06-24 14:37:22'),(203,2,36,'2016-06-24 18:17:49','2016-06-24 13:58:18','2016-06-24 18:17:49'),(204,2,37,'2016-06-24 18:17:49','2016-06-24 13:58:18','2016-06-24 18:17:49'),(205,2,38,'2016-06-24 18:17:49','2016-06-24 13:58:18','2016-06-24 18:17:49'),(206,2,39,'2016-06-24 18:17:49','2016-06-24 13:58:18','2016-06-24 18:17:49'),(207,2,40,'2016-06-24 18:17:49','2016-06-24 13:58:18','2016-06-24 18:17:49'),(208,2,41,'2016-06-24 18:17:49','2016-06-24 13:58:18','2016-06-24 18:17:49'),(209,2,42,'2016-06-24 18:17:49','2016-06-24 13:58:18','2016-06-24 18:17:49'),(210,2,43,'2016-06-24 18:17:49','2016-06-24 13:58:18','2016-06-24 18:17:49'),(211,2,44,'2016-06-24 18:17:49','2016-06-24 13:58:18','2016-06-24 18:17:49'),(212,2,47,'2016-06-24 18:17:49','2016-06-24 13:58:18','2016-06-24 18:17:49'),(213,2,67,'2016-06-24 18:17:49','2016-06-24 13:58:18','2016-06-24 18:17:49'),(214,2,73,'2016-06-24 18:17:49','2016-06-24 13:58:18','2016-06-24 18:17:49'),(215,6,78,NULL,'2016-06-24 14:37:22','2016-06-24 14:37:22'),(216,1,1,NULL,'2016-06-24 18:05:44','2016-06-24 18:05:44'),(217,1,2,NULL,'2016-06-24 18:05:44','2016-06-24 18:05:44'),(218,1,5,NULL,'2016-06-24 18:05:44','2016-06-24 18:05:44'),(219,1,6,NULL,'2016-06-24 18:05:44','2016-06-24 18:05:44'),(220,1,7,NULL,'2016-06-24 18:05:44','2016-06-24 18:05:44'),(221,1,8,NULL,'2016-06-24 18:05:44','2016-06-24 18:05:44'),(222,1,9,NULL,'2016-06-24 18:05:44','2016-06-24 18:05:44'),(223,1,10,NULL,'2016-06-24 18:05:44','2016-06-24 18:05:44'),(224,1,11,NULL,'2016-06-24 18:05:44','2016-06-24 18:05:44'),(225,1,12,NULL,'2016-06-24 18:05:44','2016-06-24 18:05:44'),(226,1,13,NULL,'2016-06-24 18:05:44','2016-06-24 18:05:44'),(227,1,14,NULL,'2016-06-24 18:05:44','2016-06-24 18:05:44'),(228,1,15,NULL,'2016-06-24 18:05:44','2016-06-24 18:05:44'),(229,1,16,NULL,'2016-06-24 18:05:44','2016-06-24 18:05:44'),(230,1,17,NULL,'2016-06-24 18:05:44','2016-06-24 18:05:44'),(231,1,18,NULL,'2016-06-24 18:05:44','2016-06-24 18:05:44'),(232,1,19,NULL,'2016-06-24 18:05:44','2016-06-24 18:05:44'),(233,1,20,NULL,'2016-06-24 18:05:44','2016-06-24 18:05:44'),(234,1,21,NULL,'2016-06-24 18:05:44','2016-06-24 18:05:44'),(235,1,22,NULL,'2016-06-24 18:05:44','2016-06-24 18:05:44'),(236,1,23,NULL,'2016-06-24 18:05:44','2016-06-24 18:05:44'),(237,1,24,NULL,'2016-06-24 18:05:44','2016-06-24 18:05:44'),(238,1,25,NULL,'2016-06-24 18:05:44','2016-06-24 18:05:44'),(239,1,26,NULL,'2016-06-24 18:05:44','2016-06-24 18:05:44'),(240,1,27,NULL,'2016-06-24 18:05:44','2016-06-24 18:05:44'),(241,1,28,NULL,'2016-06-24 18:05:44','2016-06-24 18:05:44'),(242,1,29,NULL,'2016-06-24 18:05:44','2016-06-24 18:05:44'),(243,1,30,NULL,'2016-06-24 18:05:44','2016-06-24 18:05:44'),(244,1,31,NULL,'2016-06-24 18:05:44','2016-06-24 18:05:44'),(245,1,32,NULL,'2016-06-24 18:05:44','2016-06-24 18:05:44'),(246,1,33,NULL,'2016-06-24 18:05:44','2016-06-24 18:05:44'),(247,1,34,NULL,'2016-06-24 18:05:45','2016-06-24 18:05:45'),(248,1,35,NULL,'2016-06-24 18:05:45','2016-06-24 18:05:45'),(249,1,36,NULL,'2016-06-24 18:05:45','2016-06-24 18:05:45'),(250,1,37,NULL,'2016-06-24 18:05:45','2016-06-24 18:05:45'),(251,1,38,NULL,'2016-06-24 18:05:45','2016-06-24 18:05:45'),(252,1,39,NULL,'2016-06-24 18:05:45','2016-06-24 18:05:45'),(253,1,40,NULL,'2016-06-24 18:05:45','2016-06-24 18:05:45'),(254,1,41,NULL,'2016-06-24 18:05:45','2016-06-24 18:05:45'),(255,1,42,NULL,'2016-06-24 18:05:45','2016-06-24 18:05:45'),(256,1,43,NULL,'2016-06-24 18:05:45','2016-06-24 18:05:45'),(257,1,44,NULL,'2016-06-24 18:05:45','2016-06-24 18:05:45'),(258,1,45,NULL,'2016-06-24 18:05:45','2016-06-24 18:05:45'),(259,1,46,NULL,'2016-06-24 18:05:45','2016-06-24 18:05:45'),(260,1,47,NULL,'2016-06-24 18:05:45','2016-06-24 18:05:45'),(261,1,48,NULL,'2016-06-24 18:05:45','2016-06-24 18:05:45'),(262,1,49,NULL,'2016-06-24 18:05:45','2016-06-24 18:05:45'),(263,1,50,NULL,'2016-06-24 18:05:45','2016-06-24 18:05:45'),(264,1,51,NULL,'2016-06-24 18:05:45','2016-06-24 18:05:45'),(265,1,52,NULL,'2016-06-24 18:05:45','2016-06-24 18:05:45'),(266,1,53,NULL,'2016-06-24 18:05:45','2016-06-24 18:05:45'),(267,1,54,NULL,'2016-06-24 18:05:45','2016-06-24 18:05:45'),(268,1,55,NULL,'2016-06-24 18:05:45','2016-06-24 18:05:45'),(269,1,56,NULL,'2016-06-24 18:05:45','2016-06-24 18:05:45'),(270,1,67,NULL,'2016-06-24 18:05:45','2016-06-24 18:05:45'),(271,1,68,NULL,'2016-06-24 18:05:45','2016-06-24 18:05:45'),(272,1,73,NULL,'2016-06-24 18:05:45','2016-06-24 18:05:45'),(273,1,74,NULL,'2016-06-24 18:05:45','2016-06-24 18:05:45'),(274,1,75,NULL,'2016-06-24 18:05:45','2016-06-24 18:05:45'),(275,1,79,NULL,'2016-06-24 18:05:45','2016-06-24 18:05:45'),(276,2,36,'2016-06-24 20:15:18','2016-06-24 18:17:49','2016-06-24 20:15:18'),(277,2,37,'2016-06-24 20:15:18','2016-06-24 18:17:49','2016-06-24 20:15:18'),(278,2,38,'2016-06-24 20:15:18','2016-06-24 18:17:49','2016-06-24 20:15:18'),(279,2,39,'2016-06-24 20:15:18','2016-06-24 18:17:49','2016-06-24 20:15:18'),(280,2,40,'2016-06-24 20:15:18','2016-06-24 18:17:49','2016-06-24 20:15:18'),(281,2,41,'2016-06-24 20:15:18','2016-06-24 18:17:49','2016-06-24 20:15:18'),(282,2,42,'2016-06-24 20:15:18','2016-06-24 18:17:49','2016-06-24 20:15:18'),(283,2,43,'2016-06-24 20:15:18','2016-06-24 18:17:49','2016-06-24 20:15:18'),(284,2,44,'2016-06-24 20:15:18','2016-06-24 18:17:49','2016-06-24 20:15:18'),(285,2,47,'2016-06-24 20:15:18','2016-06-24 18:17:49','2016-06-24 20:15:18'),(286,2,67,'2016-06-24 20:15:18','2016-06-24 18:17:49','2016-06-24 20:15:18'),(287,2,73,'2016-06-24 20:15:18','2016-06-24 18:17:49','2016-06-24 20:15:18'),(288,2,79,'2016-06-24 20:15:18','2016-06-24 18:17:49','2016-06-24 20:15:18'),(289,2,36,NULL,'2016-06-24 20:15:18','2016-06-24 20:15:18'),(290,2,37,NULL,'2016-06-24 20:15:18','2016-06-24 20:15:18'),(291,2,38,NULL,'2016-06-24 20:15:18','2016-06-24 20:15:18'),(292,2,39,NULL,'2016-06-24 20:15:18','2016-06-24 20:15:18'),(293,2,40,NULL,'2016-06-24 20:15:18','2016-06-24 20:15:18'),(294,2,41,NULL,'2016-06-24 20:15:18','2016-06-24 20:15:18'),(295,2,42,NULL,'2016-06-24 20:15:18','2016-06-24 20:15:18'),(296,2,43,NULL,'2016-06-24 20:15:18','2016-06-24 20:15:18'),(297,2,47,NULL,'2016-06-24 20:15:18','2016-06-24 20:15:18'),(298,2,67,NULL,'2016-06-24 20:15:18','2016-06-24 20:15:18'),(299,2,73,NULL,'2016-06-24 20:15:18','2016-06-24 20:15:18'),(300,2,79,NULL,'2016-06-24 20:15:18','2016-06-24 20:15:18');
/*!40000 ALTER TABLE `PerfilxAccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Periodo`
--

DROP TABLE IF EXISTS `Periodo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Periodo` (
  `IdPeriodo` int(11) NOT NULL AUTO_INCREMENT,
  `IdEspecialidad` int(11) DEFAULT NULL,
  `Vigente` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdPeriodo`),
  KEY `IdEspecialidad` (`IdEspecialidad`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Periodo`
--

LOCK TABLES `Periodo` WRITE;
/*!40000 ALTER TABLE `Periodo` DISABLE KEYS */;
INSERT INTO `Periodo` VALUES (1,1,1,NULL,'2016-06-19 05:58:24','2016-06-19 05:58:24');
/*!40000 ALTER TABLE `Periodo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PeriodoxAspecto`
--

DROP TABLE IF EXISTS `PeriodoxAspecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PeriodoxAspecto` (
  `IdPeriodoxAspecto` int(11) NOT NULL AUTO_INCREMENT,
  `IdPeriodo` int(11) DEFAULT NULL,
  `IdAspecto` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdPeriodoxAspecto`),
  KEY `IdAspecto` (`IdAspecto`),
  KEY `IdPeriodo` (`IdPeriodo`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PeriodoxAspecto`
--

LOCK TABLES `PeriodoxAspecto` WRITE;
/*!40000 ALTER TABLE `PeriodoxAspecto` DISABLE KEYS */;
INSERT INTO `PeriodoxAspecto` VALUES (1,1,1,NULL,'2016-06-19 06:04:28','2016-06-19 06:04:28'),(2,1,2,NULL,'2016-06-19 06:04:28','2016-06-19 06:04:28'),(3,1,3,NULL,'2016-06-19 06:04:28','2016-06-19 06:04:28'),(4,1,4,NULL,'2016-06-19 06:04:28','2016-06-19 06:04:28'),(5,1,5,NULL,'2016-06-19 06:04:28','2016-06-19 06:04:28'),(6,1,6,NULL,'2016-06-19 06:04:28','2016-06-19 06:04:28'),(7,1,7,NULL,'2016-06-19 06:04:28','2016-06-19 06:04:28'),(8,1,8,NULL,'2016-06-19 06:04:28','2016-06-19 06:04:28'),(9,1,9,NULL,'2016-06-19 06:04:28','2016-06-19 06:04:28'),(10,1,10,NULL,'2016-06-19 06:04:28','2016-06-19 06:04:28'),(11,1,11,NULL,'2016-06-19 06:04:28','2016-06-19 06:04:28'),(12,1,12,NULL,'2016-06-19 06:04:28','2016-06-19 06:04:28'),(13,1,13,NULL,'2016-06-19 06:04:28','2016-06-19 06:04:28'),(14,1,14,NULL,'2016-06-19 06:04:28','2016-06-19 06:04:28'),(15,1,15,NULL,'2016-06-19 06:04:28','2016-06-19 06:04:28'),(16,1,16,NULL,'2016-06-19 06:04:28','2016-06-19 06:04:28'),(17,1,17,NULL,'2016-06-19 06:04:28','2016-06-19 06:04:28');
/*!40000 ALTER TABLE `PeriodoxAspecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PeriodoxCriterio`
--

DROP TABLE IF EXISTS `PeriodoxCriterio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PeriodoxCriterio` (
  `IdPeriodoxCriterio` int(11) NOT NULL AUTO_INCREMENT,
  `IdPeriodo` int(11) DEFAULT NULL,
  `IdCriterio` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdPeriodoxCriterio`),
  KEY `IdCriterio` (`IdCriterio`),
  KEY `IdPeriodo` (`IdPeriodo`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PeriodoxCriterio`
--

LOCK TABLES `PeriodoxCriterio` WRITE;
/*!40000 ALTER TABLE `PeriodoxCriterio` DISABLE KEYS */;
INSERT INTO `PeriodoxCriterio` VALUES (1,1,1,NULL,'2016-06-19 06:04:28','2016-06-19 06:04:28'),(2,1,4,NULL,'2016-06-19 06:04:28','2016-06-19 06:04:28'),(3,1,5,NULL,'2016-06-19 06:04:28','2016-06-19 06:04:28'),(4,1,6,NULL,'2016-06-19 06:04:29','2016-06-19 06:04:29'),(5,1,7,NULL,'2016-06-19 06:04:29','2016-06-19 06:04:29'),(6,1,8,NULL,'2016-06-19 06:04:29','2016-06-19 06:04:29'),(7,1,9,NULL,'2016-06-19 06:04:29','2016-06-19 06:04:29'),(8,1,10,NULL,'2016-06-19 06:04:29','2016-06-19 06:04:29'),(9,1,11,NULL,'2016-06-19 06:04:29','2016-06-19 06:04:29'),(10,1,12,NULL,'2016-06-19 06:04:29','2016-06-19 06:04:29'),(11,1,13,NULL,'2016-06-19 06:04:29','2016-06-19 06:04:29'),(12,1,14,NULL,'2016-06-19 06:04:29','2016-06-19 06:04:29'),(13,1,15,NULL,'2016-06-19 06:04:29','2016-06-19 06:04:29'),(14,1,16,NULL,'2016-06-19 06:04:29','2016-06-19 06:04:29'),(15,1,17,NULL,'2016-06-19 06:04:29','2016-06-19 06:04:29'),(16,1,18,NULL,'2016-06-19 06:04:29','2016-06-19 06:04:29'),(17,1,19,NULL,'2016-06-19 06:04:29','2016-06-19 06:04:29'),(18,1,20,NULL,'2016-06-19 06:04:29','2016-06-19 06:04:29'),(19,1,21,NULL,'2016-06-19 06:04:29','2016-06-19 06:04:29'),(20,1,22,NULL,'2016-06-19 06:04:29','2016-06-19 06:04:29'),(21,1,23,NULL,'2016-06-19 06:04:29','2016-06-19 06:04:29'),(22,1,24,NULL,'2016-06-19 06:04:30','2016-06-19 06:04:30'),(23,1,25,NULL,'2016-06-19 06:04:30','2016-06-19 06:04:30'),(24,1,26,NULL,'2016-06-19 06:04:30','2016-06-19 06:04:30'),(25,1,27,NULL,'2016-06-19 06:04:30','2016-06-19 06:04:30'),(26,1,28,NULL,'2016-06-19 06:04:30','2016-06-19 06:04:30'),(27,1,29,NULL,'2016-06-19 06:04:30','2016-06-19 06:04:30');
/*!40000 ALTER TABLE `PeriodoxCriterio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PeriodoxFuente`
--

DROP TABLE IF EXISTS `PeriodoxFuente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PeriodoxFuente` (
  `IdPeriodo` int(11) NOT NULL,
  `IdFuenteMedicion` int(11) DEFAULT NULL,
  KEY `IdFuenteMedicion` (`IdFuenteMedicion`),
  KEY `IdPeriodo` (`IdPeriodo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PeriodoxFuente`
--

LOCK TABLES `PeriodoxFuente` WRITE;
/*!40000 ALTER TABLE `PeriodoxFuente` DISABLE KEYS */;
INSERT INTO `PeriodoxFuente` VALUES (1,1),(1,2),(1,3);
/*!40000 ALTER TABLE `PeriodoxFuente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PeriodoxObjetivo`
--

DROP TABLE IF EXISTS `PeriodoxObjetivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PeriodoxObjetivo` (
  `IdPeriodoxObjetivo` int(11) NOT NULL AUTO_INCREMENT,
  `IdPeriodo` int(11) DEFAULT NULL,
  `IdObjetivoEducacional` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdPeriodoxObjetivo`),
  KEY `IdObjetivoEducacional` (`IdObjetivoEducacional`),
  KEY `IdPeriodo` (`IdPeriodo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PeriodoxObjetivo`
--

LOCK TABLES `PeriodoxObjetivo` WRITE;
/*!40000 ALTER TABLE `PeriodoxObjetivo` DISABLE KEYS */;
INSERT INTO `PeriodoxObjetivo` VALUES (1,1,1,NULL,'2016-06-19 06:04:27','2016-06-19 06:04:27'),(2,1,2,NULL,'2016-06-19 06:04:27','2016-06-19 06:04:27');
/*!40000 ALTER TABLE `PeriodoxObjetivo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PeriodoxResultado`
--

DROP TABLE IF EXISTS `PeriodoxResultado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PeriodoxResultado` (
  `IdPeriodoxResultado` int(11) NOT NULL AUTO_INCREMENT,
  `IdPeriodo` int(11) DEFAULT NULL,
  `IdResultadoEstudiantil` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdPeriodoxResultado`),
  KEY `IdResultadoEstudiantil` (`IdResultadoEstudiantil`),
  KEY `IdPeriodo` (`IdPeriodo`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PeriodoxResultado`
--

LOCK TABLES `PeriodoxResultado` WRITE;
/*!40000 ALTER TABLE `PeriodoxResultado` DISABLE KEYS */;
INSERT INTO `PeriodoxResultado` VALUES (1,1,1,NULL,'2016-06-19 06:04:27','2016-06-19 06:04:27'),(2,1,2,NULL,'2016-06-19 06:04:27','2016-06-19 06:04:27'),(3,1,3,NULL,'2016-06-19 06:04:27','2016-06-19 06:04:27'),(4,1,4,NULL,'2016-06-19 06:04:27','2016-06-19 06:04:27'),(5,1,5,NULL,'2016-06-19 06:04:27','2016-06-19 06:04:27'),(6,1,6,NULL,'2016-06-19 06:04:27','2016-06-19 06:04:27'),(7,1,7,NULL,'2016-06-19 06:04:27','2016-06-19 06:04:27'),(8,1,8,NULL,'2016-06-19 06:04:27','2016-06-19 06:04:27'),(9,1,9,NULL,'2016-06-19 06:04:27','2016-06-19 06:04:27'),(10,1,10,NULL,'2016-06-19 06:04:28','2016-06-19 06:04:28'),(11,1,11,NULL,'2016-06-19 06:04:28','2016-06-19 06:04:28'),(12,1,12,NULL,'2016-06-19 06:04:28','2016-06-19 06:04:28');
/*!40000 ALTER TABLE `PeriodoxResultado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PlanAccion`
--

DROP TABLE IF EXISTS `PlanAccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PlanAccion` (
  `IdPlanAccion` int(11) NOT NULL AUTO_INCREMENT,
  `IdPlanMejora` int(11) DEFAULT NULL,
  `IdCicloAcademico` int(11) DEFAULT NULL,
  `IdDocente` int(11) DEFAULT NULL,
  `Comentario` varchar(200) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `IdArchivoEntrada` int(11) DEFAULT NULL,
  `Porcentaje` int(11) DEFAULT NULL,
  `Estado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdPlanAccion`),
  KEY `IdPlanMejora` (`IdPlanMejora`),
  KEY `IdDocente` (`IdDocente`),
  KEY `IdCicloAcademico` (`IdCicloAcademico`),
  KEY `PlanAccion_idfk_4` (`IdArchivoEntrada`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PlanAccion`
--

LOCK TABLES `PlanAccion` WRITE;
/*!40000 ALTER TABLE `PlanAccion` DISABLE KEYS */;
INSERT INTO `PlanAccion` VALUES (1,1,1,NULL,NULL,'ASDSAD',NULL,'2016-06-23 01:00:58','2016-06-23 01:00:58',NULL,NULL,NULL),(2,2,1,NULL,NULL,'Detección del problema',NULL,'2016-06-24 16:26:31','2016-06-24 16:26:31',NULL,NULL,NULL);
/*!40000 ALTER TABLE `PlanAccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PlanMejora`
--

DROP TABLE IF EXISTS `PlanMejora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PlanMejora` (
  `IdPlanMejora` int(11) NOT NULL AUTO_INCREMENT,
  `IdTipoPlanMejora` int(11) DEFAULT NULL,
  `IdEspecialidad` int(11) DEFAULT NULL,
  `IdArchivoEntrada` int(11) DEFAULT NULL,
  `IdDocente` int(11) DEFAULT NULL,
  `Identificador` varchar(10) DEFAULT NULL,
  `AnalisisCausal` varchar(500) DEFAULT NULL,
  `Hallazgo` varchar(500) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `FechaImplementacion` datetime DEFAULT NULL,
  `Estado` varchar(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdPlanMejora`),
  KEY `IdEspecialidad` (`IdEspecialidad`),
  KEY `IdTipoPlanMejora` (`IdTipoPlanMejora`),
  KEY `IdArchivoEntrada` (`IdArchivoEntrada`),
  KEY `IdDocente` (`IdDocente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PlanMejora`
--

LOCK TABLES `PlanMejora` WRITE;
/*!40000 ALTER TABLE `PlanMejora` DISABLE KEYS */;
INSERT INTO `PlanMejora` VALUES (1,1,1,2,1,NULL,'ASDASDAD','ASDAD','PLAN DE MEJORA','2016-06-22 00:00:00','En Ejecución','2016-06-24 15:33:35','2016-06-23 01:00:58','2016-06-24 15:33:35'),(2,2,1,5,1,NULL,'Falta de habilidades blandas','Se detectó un nivel deficiente en exposiciones','Mejor nivel en exposiciones','2016-06-30 00:00:00','Pendiente',NULL,'2016-06-24 16:26:31','2016-06-24 20:08:54');
/*!40000 ALTER TABLE `PlanMejora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ResultadoEstudiantil`
--

DROP TABLE IF EXISTS `ResultadoEstudiantil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ResultadoEstudiantil` (
  `IdResultadoEstudiantil` int(11) NOT NULL AUTO_INCREMENT,
  `IdEspecialidad` int(11) DEFAULT NULL,
  `Identificador` char(1) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `CicloRegistro` varchar(10) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdResultadoEstudiantil`),
  KEY `IdEspecialidad` (`IdEspecialidad`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ResultadoEstudiantil`
--

LOCK TABLES `ResultadoEstudiantil` WRITE;
/*!40000 ALTER TABLE `ResultadoEstudiantil` DISABLE KEYS */;
INSERT INTO `ResultadoEstudiantil` VALUES (1,1,'A','Aplicar los conocimientos relacionados con las matemáticas, ciencias e ingeniería.',NULL,NULL,'2016-06-18 19:34:12','2016-06-24 20:25:49',1),(2,1,'B','Diseñar y conducir experimentos, y analiza e interpreta los datos.',NULL,NULL,'2016-06-18 19:35:11','2016-06-24 20:25:49',1),(3,1,'C','Diseñar sistemas, componentes o procesos que satisfagan las necesidades presentadas.',NULL,NULL,'2016-06-18 19:35:34','2016-06-24 20:25:49',1),(4,1,'D','Trabajar en equipos multidisciplinarios.',NULL,NULL,'2016-06-18 19:35:57','2016-06-24 20:25:49',1),(5,1,'E','Identificar, formular y resolver problemas de ingeniería.',NULL,NULL,'2016-06-18 19:36:16','2016-06-24 20:25:49',1),(6,1,'F','Comprender su responsabilidad profesional y ética.',NULL,NULL,'2016-06-18 19:36:42','2016-06-24 20:25:49',1),(7,1,'G','Comunicar efectivamente sus ideas de manera oral y escrita.',NULL,NULL,'2016-06-18 19:37:05','2016-06-24 20:25:50',1),(8,1,'H','Comprender el impacto de la ingeniería en la solución de problemas globales y sociales basándose en la educación general recibida.',NULL,NULL,'2016-06-18 19:37:55','2016-06-24 20:25:50',1),(9,1,'I','Reconocer la necesidad y se compromete con el aprendizaje a lo largo de toda la vida.',NULL,NULL,'2016-06-18 19:38:42','2016-06-24 20:25:50',1),(10,1,'J','Conocer temas de actualidad.',NULL,NULL,'2016-06-18 19:38:57','2016-06-24 20:25:50',1),(11,1,'K','Utilizar las técnicas, estrategias y herramientas de la ingeniería moderna, necesarias para la práctica de la misma.',NULL,NULL,'2016-06-18 19:39:22','2016-06-24 20:25:50',1),(12,1,'L','Participar en proyectos informáticos teniendo en cuenta aspectos de ingeniería y gestión de proyectos.',NULL,NULL,'2016-06-18 19:39:45','2016-06-24 20:25:50',1),(13,2,'A','Aplicar los conocimientos de matemáticas, ciencias e ingeniería relacionados con la ingeniería industrial.',NULL,NULL,'2016-06-18 19:46:11','2016-06-18 19:46:11',0),(14,2,'B','Diseñar y conducir experimentos, así como analizar e interpretar datos.',NULL,NULL,'2016-06-18 19:46:28','2016-06-18 19:46:28',0),(15,2,'C','Diseñar componentes, procesos o sistemas que satisfagan necesidades específicas, tomando en cuenta las consideraciones económicas, técnicas, ambientales, sociales, políticas y éticas.',NULL,NULL,'2016-06-18 19:47:43','2016-06-18 19:47:43',0),(16,2,'D','Trabajar y desenvolverse adecuadamente en equipos multidisciplinarios.',NULL,NULL,'2016-06-18 19:48:05','2016-06-18 19:48:15',0),(17,2,'E','Identificar, formular y resolver problemas de ingeniería industrial.',NULL,NULL,'2016-06-18 19:48:46','2016-06-18 19:48:46',0),(18,2,'F','Comprender su responsabilidad profesional y ética.',NULL,NULL,'2016-06-18 19:49:14','2016-06-18 19:49:14',0),(19,2,'G','Comunicarse efectivamente y establecer con fluidez relaciones interpersonales.',NULL,NULL,'2016-06-18 19:49:35','2016-06-18 19:49:35',0),(20,2,'H','Comprender el impacto de las soluciones de ingeniería en un contexto global, económico, ambiental y social como resultado de una formación integral.',NULL,NULL,'2016-06-18 19:49:57','2016-06-18 19:49:57',0),(21,2,'I','Reconocer la necesidad y comprometerse con el aprendizaje a lo largo de toda la vida buscando permanentemente la excelencia.',NULL,NULL,'2016-06-18 19:50:18','2016-06-18 19:50:18',0),(22,2,'J','Conocer temas contemporáneos.',NULL,NULL,'2016-06-18 19:50:41','2016-06-18 19:50:41',0),(23,2,'K','Usar herramientas, habilidades y técnicas actualizadas de la ingeniería industrial, necesarias para la práctica de la misma.',NULL,NULL,'2016-06-18 19:50:57','2016-06-18 19:50:57',0),(24,3,'A','Aplique las herramientas de las ciencias exactas y la ingeniería relacionadas con los análisis y diseños vinculados con la ingeniería civil.',NULL,NULL,'2016-06-18 19:53:04','2016-06-18 19:53:04',0),(25,3,'B','Conduzca experimentos y analice e interprete los resultados obtenidos.',NULL,NULL,'2016-06-18 19:53:18','2016-06-18 19:53:18',0),(26,3,'C','Diseñe sistemas, componentes o procesos que satisfagan las necesidades de los proyectos a su cargo.',NULL,NULL,'2016-06-18 19:53:33','2016-06-18 19:53:33',0),(27,3,'D','Se integre proactivamente en equipos de diferentes áreas de la ingeniería civil.',NULL,NULL,'2016-06-18 19:53:46','2016-06-18 19:53:46',0),(28,3,'E','Identifique y resuelva problemas propios de la ingeniería civil y actividades conexas.',NULL,NULL,'2016-06-18 19:54:01','2016-06-18 19:54:01',0),(29,3,'F','Actúe con responsabilidad profesional, ética y moral como resultado de una formación integral y de respeto a la dignidad de las personas.',NULL,NULL,'2016-06-18 19:54:15','2016-06-18 19:54:15',0),(30,3,'G','Comunique y transmita conceptos e ideas de manera efectiva, en forma oral, escrita y gráfica. Asimismo, elabore, sustente e interprete documentos e informes técnicos',NULL,NULL,'2016-06-18 19:55:17','2016-06-18 19:55:17',0),(31,3,'H','Comprenda el impacto de las soluciones de ingeniería en un contexto global, económico, ambiental y social.',NULL,NULL,'2016-06-18 19:55:36','2016-06-18 19:55:36',0),(32,3,'I','Reconozca la necesidad del aprendizaje a lo largo de toda la vida, y busque permanentemente la excelencia.',NULL,NULL,'2016-06-18 19:55:52','2016-06-18 19:55:52',0),(33,3,'J','Esté familiarizado con tópicos actuales, emergentes y globales en el campo profesional de la ingeniería civil y áreas conexas.',NULL,NULL,'2016-06-18 19:56:08','2016-06-18 19:56:08',0),(34,3,'K','Aplique técnicas, habilidades y herramientas de vanguardia, necesarias para la práctica de la ingeniería civil y áreas conexas',NULL,NULL,'2016-06-18 19:56:29','2016-06-18 19:56:29',0);
/*!40000 ALTER TABLE `ResultadoEstudiantil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ResultadoxObjetivo`
--

DROP TABLE IF EXISTS `ResultadoxObjetivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ResultadoxObjetivo` (
  `IdResultadoxObjetivo` int(11) NOT NULL AUTO_INCREMENT,
  `IdResultadoEstudiantil` int(11) DEFAULT NULL,
  `IdObjetivoEducacional` int(11) DEFAULT NULL,
  `IdPeriodo` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdResultadoxObjetivo`),
  KEY `IdResultadoEstudiantil` (`IdResultadoEstudiantil`),
  KEY `IdPeriodo` (`IdPeriodo`),
  KEY `IdObjetivoEducacional` (`IdObjetivoEducacional`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ResultadoxObjetivo`
--

LOCK TABLES `ResultadoxObjetivo` WRITE;
/*!40000 ALTER TABLE `ResultadoxObjetivo` DISABLE KEYS */;
INSERT INTO `ResultadoxObjetivo` VALUES (1,1,2,NULL,'2016-06-18 19:34:24','2016-06-18 19:34:12','2016-06-18 19:34:24'),(2,1,3,NULL,'2016-06-18 19:34:24','2016-06-18 19:34:12','2016-06-18 19:34:24'),(3,1,2,NULL,NULL,'2016-06-18 19:34:36','2016-06-18 19:34:36'),(4,1,3,NULL,'2016-06-23 17:55:22','2016-06-18 19:34:36','2016-06-23 17:55:22'),(5,2,1,NULL,NULL,'2016-06-18 19:35:11','2016-06-18 19:35:11'),(6,2,2,NULL,NULL,'2016-06-18 19:35:11','2016-06-18 19:35:11'),(7,3,1,NULL,NULL,'2016-06-18 19:35:34','2016-06-18 19:35:34'),(8,3,2,NULL,NULL,'2016-06-18 19:35:34','2016-06-18 19:35:34'),(9,4,2,NULL,NULL,'2016-06-18 19:35:57','2016-06-18 19:35:57'),(10,5,1,NULL,NULL,'2016-06-18 19:36:16','2016-06-18 19:36:16'),(11,6,1,NULL,NULL,'2016-06-18 19:36:42','2016-06-18 19:36:42'),(12,6,2,NULL,NULL,'2016-06-18 19:36:42','2016-06-18 19:36:42'),(13,6,3,NULL,'2016-06-23 17:55:22','2016-06-18 19:36:42','2016-06-23 17:55:22'),(14,8,1,NULL,NULL,'2016-06-18 19:37:55','2016-06-18 19:37:55'),(15,8,2,NULL,NULL,'2016-06-18 19:37:55','2016-06-18 19:37:55'),(16,8,3,NULL,'2016-06-23 17:55:22','2016-06-18 19:37:55','2016-06-23 17:55:22'),(17,7,2,NULL,NULL,'2016-06-18 19:38:05','2016-06-18 19:38:05'),(18,9,2,NULL,NULL,'2016-06-18 19:38:42','2016-06-18 19:38:42'),(19,10,3,NULL,'2016-06-23 17:55:22','2016-06-18 19:38:57','2016-06-23 17:55:22'),(20,11,1,NULL,NULL,'2016-06-18 19:39:22','2016-06-18 19:39:22'),(21,11,2,NULL,NULL,'2016-06-18 19:39:22','2016-06-18 19:39:22'),(22,12,2,NULL,NULL,'2016-06-18 19:39:45','2016-06-18 19:39:45'),(23,12,3,NULL,'2016-06-23 17:55:22','2016-06-18 19:39:45','2016-06-23 17:55:22'),(24,13,5,NULL,NULL,'2016-06-18 19:46:11','2016-06-18 19:46:11'),(25,13,7,NULL,NULL,'2016-06-18 19:46:11','2016-06-18 19:46:11'),(26,14,4,NULL,NULL,'2016-06-18 19:46:28','2016-06-18 19:46:28'),(27,14,8,NULL,NULL,'2016-06-18 19:46:28','2016-06-18 19:46:28'),(28,15,6,NULL,NULL,'2016-06-18 19:47:43','2016-06-18 19:47:43'),(29,15,7,NULL,NULL,'2016-06-18 19:47:43','2016-06-18 19:47:43'),(30,16,8,NULL,'2016-06-18 19:48:15','2016-06-18 19:48:05','2016-06-18 19:48:15'),(31,16,9,NULL,'2016-06-18 19:48:15','2016-06-18 19:48:05','2016-06-18 19:48:15'),(32,16,8,NULL,NULL,'2016-06-18 19:48:15','2016-06-18 19:48:15'),(33,16,9,NULL,NULL,'2016-06-18 19:48:15','2016-06-18 19:48:15'),(34,17,5,NULL,NULL,'2016-06-18 19:48:46','2016-06-18 19:48:46'),(35,17,8,NULL,NULL,'2016-06-18 19:48:46','2016-06-18 19:48:46'),(36,18,4,NULL,NULL,'2016-06-18 19:49:14','2016-06-18 19:49:14'),(37,18,8,NULL,NULL,'2016-06-18 19:49:14','2016-06-18 19:49:14'),(38,19,5,NULL,NULL,'2016-06-18 19:49:35','2016-06-18 19:49:35'),(39,19,6,NULL,NULL,'2016-06-18 19:49:35','2016-06-18 19:49:35'),(40,19,9,NULL,NULL,'2016-06-18 19:49:35','2016-06-18 19:49:35'),(41,20,4,NULL,NULL,'2016-06-18 19:49:57','2016-06-18 19:49:57'),(42,20,7,NULL,NULL,'2016-06-18 19:49:57','2016-06-18 19:49:57'),(43,20,9,NULL,NULL,'2016-06-18 19:49:57','2016-06-18 19:49:57'),(44,21,4,NULL,NULL,'2016-06-18 19:50:18','2016-06-18 19:50:18'),(45,21,5,NULL,NULL,'2016-06-18 19:50:18','2016-06-18 19:50:18'),(46,21,6,NULL,NULL,'2016-06-18 19:50:18','2016-06-18 19:50:18'),(47,22,7,NULL,NULL,'2016-06-18 19:50:41','2016-06-18 19:50:41'),(48,22,8,NULL,NULL,'2016-06-18 19:50:41','2016-06-18 19:50:41'),(49,22,9,NULL,NULL,'2016-06-18 19:50:41','2016-06-18 19:50:41'),(50,23,4,NULL,NULL,'2016-06-18 19:50:57','2016-06-18 19:50:57'),(51,23,6,NULL,NULL,'2016-06-18 19:50:57','2016-06-18 19:50:57'),(52,23,7,NULL,NULL,'2016-06-18 19:50:57','2016-06-18 19:50:57'),(53,23,9,NULL,NULL,'2016-06-18 19:50:57','2016-06-18 19:50:57'),(54,24,10,NULL,NULL,'2016-06-18 19:53:04','2016-06-18 19:53:04'),(55,24,12,NULL,NULL,'2016-06-18 19:53:04','2016-06-18 19:53:04'),(56,25,10,NULL,NULL,'2016-06-18 19:53:18','2016-06-18 19:53:18'),(57,25,13,NULL,NULL,'2016-06-18 19:53:18','2016-06-18 19:53:18'),(58,26,11,NULL,NULL,'2016-06-18 19:53:33','2016-06-18 19:53:33'),(59,26,12,NULL,NULL,'2016-06-18 19:53:33','2016-06-18 19:53:33'),(60,27,12,NULL,NULL,'2016-06-18 19:53:46','2016-06-18 19:53:46'),(61,27,13,NULL,NULL,'2016-06-18 19:53:46','2016-06-18 19:53:46'),(62,28,10,NULL,NULL,'2016-06-18 19:54:01','2016-06-18 19:54:01'),(63,28,12,NULL,NULL,'2016-06-18 19:54:01','2016-06-18 19:54:01'),(64,29,11,NULL,NULL,'2016-06-18 19:54:15','2016-06-18 19:54:15'),(65,29,13,NULL,NULL,'2016-06-18 19:54:15','2016-06-18 19:54:15'),(66,30,10,NULL,NULL,'2016-06-18 19:55:17','2016-06-18 19:55:17'),(67,30,13,NULL,NULL,'2016-06-18 19:55:17','2016-06-18 19:55:17'),(68,31,10,NULL,NULL,'2016-06-18 19:55:36','2016-06-18 19:55:36'),(69,31,11,NULL,NULL,'2016-06-18 19:55:36','2016-06-18 19:55:36'),(70,32,10,NULL,NULL,'2016-06-18 19:55:52','2016-06-18 19:55:52'),(71,32,12,NULL,NULL,'2016-06-18 19:55:52','2016-06-18 19:55:52'),(72,33,10,NULL,NULL,'2016-06-18 19:56:08','2016-06-18 19:56:08'),(73,33,11,NULL,NULL,'2016-06-18 19:56:08','2016-06-18 19:56:08'),(74,33,13,NULL,NULL,'2016-06-18 19:56:08','2016-06-18 19:56:08'),(75,34,10,NULL,NULL,'2016-06-18 19:56:29','2016-06-18 19:56:29'),(76,34,12,NULL,NULL,'2016-06-18 19:56:29','2016-06-18 19:56:29'),(77,34,13,NULL,NULL,'2016-06-18 19:56:29','2016-06-18 19:56:29');
/*!40000 ALTER TABLE `ResultadoxObjetivo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Seguimiento`
--

DROP TABLE IF EXISTS `Seguimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Seguimiento` (
  `IdSeguimiento` int(11) NOT NULL AUTO_INCREMENT,
  `IdPlanMejora` int(11) DEFAULT NULL,
  `IdCicloAcademico` int(11) DEFAULT NULL,
  `IdDocente` int(11) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  `Comentario` varchar(200) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdSeguimiento`),
  KEY `IdPlanMejora` (`IdPlanMejora`),
  KEY `IdDocente` (`IdDocente`),
  KEY `IdCicloAcademico` (`IdCicloAcademico`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Seguimiento`
--

LOCK TABLES `Seguimiento` WRITE;
/*!40000 ALTER TABLE `Seguimiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `Seguimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Sugerencia`
--

DROP TABLE IF EXISTS `Sugerencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Sugerencia` (
  `IdSugerencia` int(11) NOT NULL AUTO_INCREMENT,
  `IdPlanMejora` int(11) DEFAULT NULL,
  `IdDocente` int(11) DEFAULT NULL,
  `IdEspecialidad` int(11) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  `Titulo` varchar(100) DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdSugerencia`),
  KEY `IdDocente` (`IdDocente`),
  KEY `IdPlanMejora` (`IdPlanMejora`),
  KEY `IdEspecialidad` (`IdEspecialidad`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Sugerencia`
--

LOCK TABLES `Sugerencia` WRITE;
/*!40000 ALTER TABLE `Sugerencia` DISABLE KEYS */;
INSERT INTO `Sugerencia` VALUES (4,2,4,1,NULL,'Grabar exposiciones','Para revisar en qué fallan los alumnos',NULL,'2016-06-24 16:37:51','2016-06-24 16:37:51');
/*!40000 ALTER TABLE `Sugerencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TipoPlanMejora`
--

DROP TABLE IF EXISTS `TipoPlanMejora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TipoPlanMejora` (
  `IdTipoPlanMejora` int(11) NOT NULL AUTO_INCREMENT,
  `IdEspecialidad` int(11) DEFAULT NULL,
  `Codigo` varchar(10) DEFAULT NULL,
  `Tema` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(300) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdTipoPlanMejora`),
  KEY `IdEspecialidad` (`IdEspecialidad`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TipoPlanMejora`
--

LOCK TABLES `TipoPlanMejora` WRITE;
/*!40000 ALTER TABLE `TipoPlanMejora` DISABLE KEYS */;
INSERT INTO `TipoPlanMejora` VALUES (1,1,'SOUT-I','Resultados Estudiante','Aprendizaje a lo largo de la vida',NULL,'2016-05-27 21:56:00','2016-05-27 21:56:00'),(2,1,'SOUT-L','Resultados Estudiante','Gestión de proyectos',NULL,'2016-05-27 21:56:00','2016-05-27 21:56:00'),(3,1,'SOUT-D','Resultados Estudiante','Trabajo en equipo',NULL,'2016-05-27 21:56:00','2016-05-27 21:56:00'),(4,1,'SCOU','Tutoría','',NULL,'2016-05-27 21:56:00','2016-05-27 21:56:00'),(5,1,'EOBJ','Objetivos Educativos','',NULL,'2016-05-27 21:56:00','2016-05-27 21:56:00'),(6,1,'MPRO','Proceso de Medición','',NULL,'2016-05-27 21:56:00','2016-05-27 21:56:00'),(7,1,'CURR','Plan de Estudio','',NULL,'2016-05-27 21:56:00','2016-05-27 21:56:00'),(8,1,'FACU','Profesores','',NULL,'2016-05-27 21:56:00','2016-05-27 21:56:00'),(9,1,'FACI','Instalaciones','',NULL,'2016-05-27 21:56:00','2016-05-27 21:56:00');
/*!40000 ALTER TABLE `TipoPlanMejora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Usuario`
--

DROP TABLE IF EXISTS `Usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Usuario` (
  `IdUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `IdPerfil` int(11) DEFAULT NULL,
  `Usuario` varchar(20) DEFAULT NULL,
  `Contrasena` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdUsuario`),
  KEY `IdPerfil` (`IdPerfil`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usuario`
--

LOCK TABLES `Usuario` WRITE;
/*!40000 ALTER TABLE `Usuario` DISABLE KEYS */;
INSERT INTO `Usuario` VALUES (1,3,'admin','$2y$10$Lr3YPtN8NaNBVNHtrK0MBO5Yf6ZiyMJicGTYDASKXrSrnnBWgFz/.',NULL,'2016-05-28 02:56:00','2016-06-07 10:30:17'),(2,1,'19960275','$2y$10$QRu0wVz9R97NcMbXjO4gHejd7BgmfZkSuAphqHUs.uOq/XRfBsoX2',NULL,'2016-06-18 17:24:00','2016-06-18 17:29:10'),(3,1,'19911254','$2y$10$2yl/Y4ssBmtaE.pAiZwvTeyzoWBKTS73qtFYeCYubxYQXf5E3.vy.',NULL,'2016-06-18 17:52:40','2016-06-18 17:57:10'),(4,1,'19941253','$2y$10$SHiLJjdmjB8cdOCtuMfIv.OtPTdQ6Mn1UhHt8rj/HM3j68vZnXEX6',NULL,'2016-06-18 17:55:02','2016-06-18 17:57:18'),(5,2,'00009299','$2y$10$OofZ78Tl.2q5L8GExfLfZuDBizQFNPytxaw/IOvni1hroWC/JGr2C',NULL,'2016-06-19 06:07:14','2016-06-19 06:07:39'),(6,5,'jsmith','$2y$10$AEsbDkYpZqxBlrtOXZgNK.JBbqCWLZ4p82Jcz3CJjDXFoIw9p5oI6',NULL,'2016-06-19 15:36:04','2016-06-19 15:36:46'),(7,4,'psanchez','$2y$10$DR/epPHs997jbrGW1uNe2OxL7t7GWFfx9mREMWntbfJbAYU7c1EiG',NULL,'2016-06-19 15:47:10','2016-06-19 15:52:11'),(8,4,'randerson','$2y$10$ccrjw9054mLzkpG3evrkdOiNMe/aThjWDB2VxUMkmmUCDY1sGDCRO',NULL,'2016-06-19 16:22:40','2016-06-19 16:23:08'),(12,4,'jocapereyra','$2y$10$LUOkWo11fCu7SC9q8q/4BOzx8a3s2VAip7Asv.XVkDe15xVNr3p4O',NULL,'2016-06-20 21:37:04','2016-06-20 21:37:28'),(13,4,'acredijoca','$2y$10$DnwKIpFtq1QbAwSA/bjomO7FLAyMsugQ23eQaN2XABG2ccEutgk3e',NULL,'2016-06-23 18:54:30','2016-06-23 19:03:28');
/*!40000 ALTER TABLE `Usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-26 11:11:57
