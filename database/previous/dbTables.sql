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
-- Table structure for table `Alumno`
--

DROP TABLE IF EXISTS `Alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Alumno` (
  `IdAlumno` int(11) NOT NULL AUTO_INCREMENT,
  `IdHorario` int(11) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `ApellidoPaterno` varchar(100) DEFAULT NULL,
  `ApellidoMaterno` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Codigo` char(8) DEFAULT NULL, 
-- campos agregados para psp 
  `IdUsuario` int(11) DEFAULT NULL,
  `lleva_psp` char(1) DEFAULT NULL,
-- fin de campos agregados para psp
  PRIMARY KEY (`IdAlumno`),
  KEY `IdHorario` (`IdHorario`),
  KEY `IdUsuario` (`IdUsuario`),  
--  KEY `id` (`id`),
--  KEY `idPspGroup` (`idPspGroup`),
--  KEY `idSupervisor` (`idSupervisor`), 
  CONSTRAINT `Alumno_ibfk_1` FOREIGN KEY (`IdHorario`) REFERENCES `Horario` (`IdHorario`),
  CONSTRAINT `Alumno_ibfk_2` FOREIGN KEY (`IdUsuario`) REFERENCES `Usuario` (`IdUsuario`)
--  CONSTRAINT `Alumno_ibfk_4` FOREIGN KEY (`id`) REFERENCES `statuses` (`id`),
--  CONSTRAINT `Alumno_ibfk_5` FOREIGN KEY (`idPspGroup`) REFERENCES `pspgroups` (`id`),
--  CONSTRAINT `Alumno_ibfk_6` FOREIGN KEY (`idSupervisor`) REFERENCES `supervisors` (`id`)  
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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

-- inserts criterios de psp

INSERT INTO `criterio` (`IdCriterio`, `IdAspecto`, `Nombre`, `deleted_at`, `created_at`, `updated_at`, `Estado`) VALUES (NULL, NULL, 'Participación', NULL, NULL, NULL, NULL), (NULL, NULL, 'Manejo de Conflictos', NULL, NULL, NULL, NULL);
INSERT INTO `criterio` (`IdCriterio`, `IdAspecto`, `Nombre`, `deleted_at`, `created_at`, `updated_at`, `Estado`) VALUES (NULL, NULL, 'Feedback', NULL, NULL, NULL, NULL), (NULL, NULL, 'Productividad', NULL, NULL, NULL, NULL);
INSERT INTO `criterio` (`IdCriterio`, `IdAspecto`, `Nombre`, `deleted_at`, `created_at`, `updated_at`, `Estado`) VALUES (NULL, NULL, 'Tecnología', NULL, NULL, NULL, NULL), (NULL, NULL, 'Define', NULL, NULL, NULL, NULL);
INSERT INTO `criterio` (`IdCriterio`, `IdAspecto`, `Nombre`, `deleted_at`, `created_at`, `updated_at`, `Estado`) VALUES (NULL, NULL, 'Conoce', NULL, NULL, NULL, NULL);

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
  `es_adminpsp` char(1) DEFAULT NULL,
  `es_supervisorpsp` char(1) DEFAULT NULL,
-- fin campos agregados para psp
  PRIMARY KEY (`IdDocente`,`Vigente`),
  KEY `IdEspecialidad` (`IdEspecialidad`),
  KEY `IdUsuario` (`IdUsuario`),
  CONSTRAINT `Docente_ibfk_1` FOREIGN KEY (`IdEspecialidad`) REFERENCES `Especialidad` (`IdEspecialidad`),
  CONSTRAINT `Docente_ibfk_2` FOREIGN KEY (`IdUsuario`) REFERENCES `Usuario` (`IdUsuario`)

) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `idPspProcess` int(10) unsigned DEFAULT NULL,
-- fin de campo agregado para psp 
  PRIMARY KEY (`IdHorario`),
  KEY `IdCursoxCiclo` (`IdCursoxCiclo`),
--  KEY `idPspProcess` (`idPspProcess`),
  CONSTRAINT `Horario_ibfk_1` FOREIGN KEY (`IdCursoxCiclo`) REFERENCES `CursoxCiclo` (`IdCursoxCiclo`)
--  CONSTRAINT `Horario_ibfk_2` FOREIGN KEY (`idPspProcess`) REFERENCES `pspprocesses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
INSERT INTO `Perfil` VALUES (1,'Coordinador','Coordinador de la Especialidad',NULL,'2016-05-28 02:56:00','2016-06-24 18:05:44'),(2,'Profesor','Profesor de una Especialidad',NULL,'2016-05-28 02:56:00','2016-06-24 20:15:18'),(3,'Administrador','Administrador de la Facultad',NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(4,'Acreditador','Acreditador de una Especialidad',NULL,'2016-05-28 02:56:00','2016-05-28 02:56:00'),(5,'Investigador','Investigador de la facultad',NULL,'2016-05-28 02:56:00','2016-06-24 12:01:17'),(6,'Supervisor','Supervisor de Psp',NULL,'2016-05-28 02:56:00','2016-06-24 12:01:17'),(0,'Alumno','Alumno de la facultad',NULL,'2016-05-28 02:56:00','2016-06-24 12:01:17');
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
INSERT INTO `Usuario` VALUES (1,3,'admin','$2y$10$Lr3YPtN8NaNBVNHtrK0MBO5Yf6ZiyMJicGTYDASKXrSrnnBWgFz/.',NULL,'2016-05-28 02:56:00','2016-06-07 10:30:17');
/*!40000 ALTER TABLE `Usuario` ENABLE KEYS */;
UNLOCK TABLES;

-- Agregados para poder visualizar el flujo de psp (sprint 2)
LOCK TABLES `CursoxDocente`  WRITE;
/*!40000 ALTER TABLE `cursoxdocente`  DISABLE KEYS */;
INSERT INTO `CursoxDocente` (`IdCursoxDocente`, `IdDocente`, `IdCurso`, `deleted_at`, `created_at`, `updated_at`) VALUES (NULL, '4', '38', NULL, NULL, NULL);
/*!40000 ALTER TABLE `cursoxdocente`  ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `Horario`  WRITE;
/*!40000 ALTER TABLE `horario`  DISABLE KEYS */;
INSERT INTO `Horario` (`IdHorario`, `IdCursoxCiclo`, `Codigo`, `TotalAlumnos`, `deleted_at`, `created_at`, `updated_at`, `idPspProcess`) VALUES (NULL, '11', 'H1081', NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `horario`  ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `HorarioxDocente`  WRITE;
/*!40000 ALTER TABLE `horarioxdocente`  DISABLE KEYS */;
INSERT INTO `HorarioxDocente` (`IdHorarioxDocente`, `IdDocente`, `IdHorario`, `deleted_at`, `created_at`, `updated_at`) VALUES (NULL, '4', '6', NULL, NULL, NULL);
/*!40000 ALTER TABLE `horarioxdocente`  ENABLE KEYS */;
UNLOCK TABLES;
-- Fin de Agregados para poder visualizar el flujo de psp (sprint 2)


/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-26 11:11:57
