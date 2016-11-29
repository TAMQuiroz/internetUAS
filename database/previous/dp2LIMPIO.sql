-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2016 a las 07:41:23
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dp2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accion`
--

CREATE TABLE `Accion` (
  `IdAccion` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `accion`
--

INSERT INTO `Accion` (`IdAccion`, `Nombre`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Editar Periodo', NULL, NULL, NULL),
(2, 'Editar Ciclo', NULL, NULL, NULL),
(3, 'Iniciar Ciclo', NULL, NULL, NULL),
(4, 'Finalizar Ciclo', NULL, NULL, NULL),
(5, 'Nuevo Curso', NULL, NULL, NULL),
(6, 'Listar Curso', NULL, NULL, NULL),
(7, 'Editar Curso', NULL, NULL, NULL),
(8, 'Borrar Curso', NULL, NULL, NULL),
(9, 'Ver Curso', NULL, NULL, NULL),
(10, 'Nuevo Profesor', NULL, NULL, NULL),
(11, 'Listar Profesor', NULL, NULL, NULL),
(12, 'Editar Profesor', NULL, NULL, NULL),
(13, 'Borrar Profesor', NULL, NULL, NULL),
(14, 'Ver Profesor', NULL, NULL, NULL),
(15, 'Nuevo Objetivo Educacionales', NULL, NULL, NULL),
(16, 'Listar Objetivo Educacionales', NULL, NULL, NULL),
(17, 'Editar Objetivo Educacionales', NULL, NULL, NULL),
(18, 'Borrar Objetivo Educacionales', NULL, NULL, NULL),
(19, 'Ver Objetivo Educacionales', NULL, NULL, NULL),
(20, 'Nuevo Resultado Estudiantil', NULL, NULL, NULL),
(21, 'Listar Resultado Estudiantil', NULL, NULL, NULL),
(22, 'Editar Resultado Estudiantil', NULL, NULL, NULL),
(23, 'Borrar Resultado Estudiantil', NULL, NULL, NULL),
(24, 'Ver Resultado Estudiantil', NULL, NULL, NULL),
(25, 'Administrar Aspecto', NULL, NULL, NULL),
(26, 'Administrar Criterio', NULL, NULL, NULL),
(27, 'Administrar Nivel de Criterio', NULL, NULL, NULL),
(28, 'Matriz de Aporte', NULL, NULL, NULL),
(29, 'Resultados Estudiantiles Evaluados', NULL, NULL, NULL),
(30, 'Nuevo Instrumentos de Medición', NULL, NULL, NULL),
(31, 'Listar Instrumentos de Medición', NULL, NULL, NULL),
(32, 'Editar Instrumentos de Medición', NULL, NULL, NULL),
(33, 'Borrar Instrumentos de Medición', NULL, NULL, NULL),
(34, 'Agregar Cursos Dictados', NULL, NULL, NULL),
(35, 'Ver Cursos Dictados', NULL, NULL, NULL),
(36, 'Evaluar Cursos con la Tabla de Desempeño', NULL, NULL, NULL),
(37, 'Informe de Curso', NULL, NULL, NULL),
(38, 'Carga Alumnos', NULL, NULL, NULL),
(39, 'Subir Evidencias', NULL, NULL, NULL),
(40, 'Subir Evidencias de Medicion', NULL, NULL, NULL),
(41, 'Realizar Sugerencia', NULL, NULL, NULL),
(42, 'Editar Sugerencia', NULL, NULL, NULL),
(43, 'Ver Sugerencia', NULL, NULL, NULL),
(44, 'Buscar Sugerencias', NULL, NULL, NULL),
(45, 'Agregar Plan de Mejora', NULL, NULL, NULL),
(46, 'Editar Plan de Mejora', NULL, NULL, NULL),
(47, 'Ver Plan de Mejora', NULL, NULL, NULL),
(48, 'Seguimiento Plan de Mejora', NULL, NULL, NULL),
(49, 'Nuevo Tipos de Plan de Mejora', NULL, NULL, NULL),
(50, 'Listar Tipos de Plan de Mejora', NULL, NULL, NULL),
(51, 'Editar Tipos de Plan de Mejora', NULL, NULL, NULL),
(52, 'Ver Tipos de Plan de Mejora', NULL, NULL, NULL),
(53, 'Consolidado de Cursos Dictados', NULL, NULL, NULL),
(54, 'Consolidado de medición', NULL, NULL, NULL),
(55, 'Consolidado de evaluación', NULL, NULL, NULL),
(56, 'Consolidado de Resultados de Medición', NULL, NULL, NULL),
(57, 'Nuevo Usuario', NULL, NULL, NULL),
(58, 'Listar Usuario', NULL, NULL, NULL),
(59, 'Editar Usuario', NULL, NULL, NULL),
(60, 'Borrar Usuario', NULL, NULL, NULL),
(61, 'Ver Usuario', NULL, NULL, NULL),
(62, 'Nuevo Perfil', NULL, NULL, NULL),
(63, 'Listar Perfil', NULL, NULL, NULL),
(64, 'Editar Perfil', NULL, NULL, NULL),
(65, 'Borrar Perfil', NULL, NULL, NULL),
(66, 'Ver Perfil', NULL, NULL, NULL),
(67, 'Listar Mis Cursos', NULL, NULL, NULL),
(68, 'Listar Plan de Mejora', NULL, NULL, NULL),
(69, 'Nuevo Especialidad', NULL, NULL, NULL),
(70, 'Listar Especialidad', NULL, NULL, NULL),
(71, 'Editar Especialidad', NULL, NULL, NULL),
(72, 'Ver Especialidad', NULL, NULL, NULL),
(73, 'Subir Evidencia Curso', NULL, NULL, NULL),
(74, 'Administrar Instrumentos de Medicion', NULL, NULL, NULL),
(75, 'Borrar Plan de Mejora', NULL, NULL, NULL),
(76, 'Borrar Sugerencia', NULL, NULL, NULL),
(77, 'Eliminar Tipo Plan de Prueba', NULL, NULL, NULL),
(78, 'Eliminar Especialidad', NULL, NULL, NULL),
(79, 'Reporte de Avance de Tabla de Desempeño', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acreditador`
--

CREATE TABLE `Acreditador` (
  `IdAcreditador` int(11) NOT NULL,
  `IdEspecialidad` int(11) DEFAULT NULL,
  `IdUsuario` int(11) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `ApellidoPaterno` varchar(100) DEFAULT NULL,
  `ApellidoMaterno` varchar(100) DEFAULT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `Vigente` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alternatives`
--

CREATE TABLE `alternatives` (
  `id` int(10) UNSIGNED NOT NULL,
  `letra` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_question` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `Alumno` (
  `IdAlumno` int(11) NOT NULL,
  `IdHorario` int(11) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `ApellidoPaterno` varchar(100) DEFAULT NULL,
  `ApellidoMaterno` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Codigo` char(8) DEFAULT NULL,
  `IdUsuario` int(11) DEFAULT NULL,
  `lleva_psp` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aporte`
--

CREATE TABLE `Aporte` (
  `IdAporte` int(11) NOT NULL,
  `IdResultadoEstudiantil` int(11) DEFAULT NULL,
  `IdCurso` int(11) DEFAULT NULL,
  `IdCicloAcademico` int(11) DEFAULT NULL,
  `Valor` int(3) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aporte`
--

INSERT INTO `Aporte` (`IdAporte`, `IdResultadoEstudiantil`, `IdCurso`, `IdCicloAcademico`, `Valor`, `deleted_at`, `created_at`, `updated_at`) VALUES
(55, 35, 78, 2, 1, NULL, '2016-11-23 07:24:21', '2016-11-23 07:24:21'),
(56, 44, 78, 2, 1, NULL, '2016-11-23 07:24:21', '2016-11-23 07:24:21'),
(57, 46, 78, 2, 1, NULL, '2016-11-23 07:24:21', '2016-11-23 07:24:21'),
(58, 42, 79, 2, 1, NULL, '2016-11-23 07:24:21', '2016-11-23 07:24:21'),
(59, 41, 79, 2, 1, NULL, '2016-11-23 07:24:21', '2016-11-23 07:24:21'),
(60, 37, 79, 2, 1, NULL, '2016-11-23 07:24:21', '2016-11-23 07:24:21'),
(61, 39, 79, 2, 1, NULL, '2016-11-23 07:24:21', '2016-11-23 07:24:21'),
(62, 43, 79, 2, 1, NULL, '2016-11-23 07:24:21', '2016-11-23 07:24:21'),
(63, 45, 79, 2, 1, NULL, '2016-11-23 07:24:21', '2016-11-23 07:24:21'),
(64, 40, 80, 2, 1, NULL, '2016-11-23 07:24:21', '2016-11-23 07:24:21'),
(65, 36, 80, 2, 1, NULL, '2016-11-23 07:24:21', '2016-11-23 07:24:21'),
(66, 38, 80, 2, 1, NULL, '2016-11-23 07:24:21', '2016-11-23 07:24:21'),
(67, 40, 87, 2, 1, NULL, '2016-11-23 07:24:21', '2016-11-23 07:24:21'),
(68, 36, 87, 2, 1, NULL, '2016-11-23 07:24:21', '2016-11-23 07:24:21'),
(69, 38, 87, 2, 1, NULL, '2016-11-23 07:24:21', '2016-11-23 07:24:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivoentrada`
--

CREATE TABLE `ArchivoEntrada` (
  `IdArchivoEntrada` int(11) NOT NULL,
  `filename` varchar(500) DEFAULT NULL,
  `mime` varchar(500) DEFAULT NULL,
  `original_filename` varchar(500) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivoentradaplan`
--

CREATE TABLE `ArchivoEntradaPlan` (
  `IdArchivoEntrada` int(11) NOT NULL,
  `filename` varchar(500) DEFAULT NULL,
  `mime` varchar(500) DEFAULT NULL,
  `original_filename` varchar(500) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aspecto`
--

CREATE TABLE `Aspecto` (
  `IdAspecto` int(11) NOT NULL,
  `IdResultadoEstudiantil` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aspecto`
--

INSERT INTO `Aspecto` (`IdAspecto`, `IdResultadoEstudiantil`, `Nombre`, `deleted_at`, `created_at`, `updated_at`, `Estado`) VALUES
(18, 35, 'Ingeniería Informática', NULL, '2016-11-23 06:44:59', '2016-11-23 07:15:51', 1),
(19, 35, 'Matemáticas', NULL, '2016-11-23 06:45:07', '2016-11-23 07:15:51', 1),
(20, 36, 'Conduce e interpreta resultados', NULL, '2016-11-23 06:45:30', '2016-11-23 07:15:51', 1),
(21, 36, 'Diseña', NULL, '2016-11-23 06:45:39', '2016-11-23 07:15:51', 1),
(22, 37, 'Componentes', NULL, '2016-11-23 06:45:47', '2016-11-23 07:15:51', 1),
(23, 37, 'Procesos', NULL, '2016-11-23 06:45:55', '2016-11-23 07:15:51', 1),
(24, 37, 'Sistemas informáticos', NULL, '2016-11-23 06:46:06', '2016-11-23 07:15:51', 1),
(25, 38, 'Trabajo en equipo', NULL, '2016-11-23 06:46:23', '2016-11-23 07:15:51', 1),
(26, 39, 'Problemas de ingeniería', NULL, '2016-11-23 06:46:37', '2016-11-23 07:15:51', 1),
(27, 40, 'Responsabilidad profesional y ética', NULL, '2016-11-23 06:46:49', '2016-11-23 07:15:51', 1),
(28, 41, 'Comunicación en español', NULL, '2016-11-23 06:47:04', '2016-11-23 07:15:52', 1),
(29, 42, 'Sociedad', NULL, '2016-11-23 06:47:21', '2016-11-23 07:15:52', 1),
(30, 43, 'Aprendizaje', NULL, '2016-11-23 06:47:30', '2016-11-23 07:15:52', 1),
(31, 44, 'Temas de actualidad', NULL, '2016-11-23 06:47:39', '2016-11-23 07:15:52', 1),
(32, 45, 'Técnicas, estrategias y herramientas', NULL, '2016-11-23 06:47:52', '2016-11-23 07:15:52', 1),
(33, 46, 'Economía', NULL, '2016-11-23 06:48:03', '2016-11-23 07:15:53', 1),
(34, 46, 'Gestión de proyectos', NULL, '2016-11-23 06:48:12', '2016-11-23 07:15:53', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `Calificacion` (
  `IdCalificacion` int(11) NOT NULL,
  `IdCriterio` int(11) DEFAULT NULL,
  `IdHorario` int(11) DEFAULT NULL,
  `IdAlumno` int(11) DEFAULT NULL,
  `Nota` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cicloacademico`
--

CREATE TABLE `CicloAcademico` (
  `Descripcion` varchar(200) DEFAULT NULL,
  `Numero` int(11) DEFAULT NULL,
  `IdCicloAcademico` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cicloacademico`
--

INSERT INTO `CicloAcademico` (`Descripcion`, `Numero`, `IdCicloAcademico`, `deleted_at`, `created_at`, `updated_at`) VALUES
('2016-2', 20162, 3, NULL, '2016-11-23 06:36:20', '2016-11-23 06:36:20'),
('2017-0', 20170, 4, NULL, '2016-11-23 06:36:26', '2016-11-23 06:36:26'),
('2017-1', 20171, 5, NULL, '2016-11-23 06:36:32', '2016-11-23 06:36:32'),
('2017-2', 20172, 6, NULL, '2016-11-23 06:36:38', '2016-11-23 06:36:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cicloxaspecto`
--

CREATE TABLE `CicloxAspecto` (
  `IdCicloxAspecto` int(11) NOT NULL,
  `IdAspecto` int(11) DEFAULT NULL,
  `IdCicloAcademico` int(11) DEFAULT NULL,
  `TotalAlumnos` int(11) DEFAULT NULL,
  `TotalCumplen` int(11) DEFAULT NULL,
  `Promedio` float DEFAULT NULL,
  `Porcentaje` float DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cicloxcriterio`
--

CREATE TABLE `CicloxCriterio` (
  `IdCicloxCriterio` int(11) NOT NULL,
  `IdCriterio` int(11) DEFAULT NULL,
  `IdCicloAcademico` int(11) DEFAULT NULL,
  `TotalAlumnos` int(11) DEFAULT NULL,
  `TotalCumplen` int(11) DEFAULT NULL,
  `Porcentaje` float DEFAULT NULL,
  `Promedio` float DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cicloxespecialidad`
--

CREATE TABLE `CicloxEspecialidad` (
  `IdCicloAcademico` int(11) NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cicloxespecialidad`
--

INSERT INTO `CicloxEspecialidad` (`IdCicloAcademico`, `IdCiclo`, `IdEspecialidad`, `IdDocente`, `IdPeriodo`, `Numero`, `Vigente`, `Descripcion`, `FechaInicio`, `FechaFin`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 3, 5, NULL, 2, NULL, 1, NULL, '2016-07-15 00:00:00', '2016-12-20 00:00:00', NULL, '2016-11-23 07:16:30', '2016-11-23 07:16:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cicloxresultado`
--

CREATE TABLE `CicloxResultado` (
  `IdCicloxResultado` int(11) NOT NULL,
  `IdResultadoEstudiantil` int(11) DEFAULT NULL,
  `IdCicloAcademico` int(11) DEFAULT NULL,
  `TotalAlumnos` int(11) DEFAULT NULL,
  `TotalCumplen` int(11) DEFAULT NULL,
  `Promedio` float DEFAULT NULL,
  `Porcentaje` float DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cicloxresultado`
--

INSERT INTO `CicloxResultado` (`IdCicloxResultado`, `IdResultadoEstudiantil`, `IdCicloAcademico`, `TotalAlumnos`, `TotalCumplen`, `Promedio`, `Porcentaje`, `deleted_at`, `created_at`, `updated_at`) VALUES
(13, 35, 2, NULL, NULL, NULL, NULL, NULL, '2016-11-23 07:16:30', '2016-11-23 07:16:30'),
(14, 42, 2, NULL, NULL, NULL, NULL, NULL, '2016-11-23 07:16:30', '2016-11-23 07:16:30'),
(15, 40, 2, NULL, NULL, NULL, NULL, NULL, '2016-11-23 07:16:30', '2016-11-23 07:16:30'),
(16, 41, 2, NULL, NULL, NULL, NULL, NULL, '2016-11-23 07:16:30', '2016-11-23 07:16:30'),
(17, 44, 2, NULL, NULL, NULL, NULL, NULL, '2016-11-23 07:16:30', '2016-11-23 07:16:30'),
(18, 37, 2, NULL, NULL, NULL, NULL, NULL, '2016-11-23 07:16:30', '2016-11-23 07:16:30'),
(19, 36, 2, NULL, NULL, NULL, NULL, NULL, '2016-11-23 07:16:30', '2016-11-23 07:16:30'),
(20, 39, 2, NULL, NULL, NULL, NULL, NULL, '2016-11-23 07:16:30', '2016-11-23 07:16:30'),
(21, 46, 2, NULL, NULL, NULL, NULL, NULL, '2016-11-23 07:16:30', '2016-11-23 07:16:30'),
(22, 43, 2, NULL, NULL, NULL, NULL, NULL, '2016-11-23 07:16:30', '2016-11-23 07:16:30'),
(23, 38, 2, NULL, NULL, NULL, NULL, NULL, '2016-11-23 07:16:30', '2016-11-23 07:16:30'),
(24, 45, 2, NULL, NULL, NULL, NULL, NULL, '2016-11-23 07:16:30', '2016-11-23 07:16:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competences`
--

CREATE TABLE `competences` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competencextutstudentxevaluations`
--

CREATE TABLE `competencextutstudentxevaluations` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_tutev` int(10) UNSIGNED NOT NULL,
  `id_competence` int(10) UNSIGNED NOT NULL,
  `puntaje_maximo` double(8,2) UNSIGNED DEFAULT NULL,
  `puntaje` double(8,2) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `confespecialidad`
--

CREATE TABLE `ConfEspecialidad` (
  `IdConfEspecialidad` int(11) NOT NULL,
  `IdEspecialidad` int(11) DEFAULT NULL,
  `IdPeriodo` int(11) DEFAULT NULL,
  `IdCicloInicio` int(11) NOT NULL,
  `IdCicloFin` int(11) NOT NULL,
  `UmbralAceptacion` int(11) DEFAULT NULL,
  `NivelEsperado` int(11) DEFAULT NULL,
  `CantNivelCriterio` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `confespecialidad`
--

INSERT INTO `ConfEspecialidad` (`IdConfEspecialidad`, `IdEspecialidad`, `IdPeriodo`, `IdCicloInicio`, `IdCicloFin`, `UmbralAceptacion`, `NivelEsperado`, `CantNivelCriterio`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 5, 2, 3, 5, 75, 3, 4, NULL, '2016-11-23 07:15:49', '2016-11-23 07:15:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `criterio`
--

CREATE TABLE `Criterio` (
  `IdCriterio` int(11) NOT NULL,
  `IdAspecto` int(11) DEFAULT NULL,
  `Nombre` varchar(200) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `criterio`
--

INSERT INTO `Criterio` (`IdCriterio`, `IdAspecto`, `Nombre`, `deleted_at`, `created_at`, `updated_at`, `Estado`) VALUES
(30, NULL, 'Participación', NULL, NULL, NULL, NULL),
(31, NULL, 'Manejo de Conflictos', NULL, NULL, NULL, NULL),
(32, NULL, 'Feedback', NULL, NULL, NULL, NULL),
(33, NULL, 'Productividad', NULL, NULL, NULL, NULL),
(34, NULL, 'Tecnología', NULL, NULL, NULL, NULL),
(35, NULL, 'Define', NULL, NULL, NULL, NULL),
(36, NULL, 'Conoce', NULL, NULL, NULL, NULL),
(37, 18, 'Diseña algoritmos para la resolución de un problema identificado.', NULL, '2016-11-23 06:49:22', '2016-11-23 07:15:51', 1),
(38, 18, 'Utiliza lenguajes de programación para implementar algoritmos que sean diseñados por él.', NULL, '2016-11-23 06:50:42', '2016-11-23 07:15:51', 1),
(39, 19, 'Aplicar conceptos lógicos para la resolución de problemas.', NULL, '2016-11-23 06:51:18', '2016-11-23 07:15:51', 1),
(40, 20, 'Ejecuta el experimento e interpreta sus resultados.', NULL, '2016-11-23 06:51:36', '2016-11-23 07:15:51', 1),
(41, 21, 'Realiza el diseño de un experimento.', NULL, '2016-11-23 06:51:51', '2016-11-23 07:15:51', 1),
(42, 22, 'Diseña componentes que interaccionen con otras soluciones informáticas.', NULL, '2016-11-23 06:52:13', '2016-11-23 07:15:51', 1),
(43, 23, 'Diseño de soluciones.', NULL, '2016-11-23 06:52:28', '2016-11-23 07:15:51', 1),
(44, 23, 'Identifica el contexto o el entorno empresarial donde se lleva a cabo un proceso de negocio.', NULL, '2016-11-23 06:53:01', '2016-11-23 07:15:51', 1),
(45, 24, 'Diseña una solución informática a partir de los requerimientos de negocio identificados.', NULL, '2016-11-23 06:53:32', '2016-11-23 07:15:51', 1),
(46, 25, 'Participa en el equipo de trabajo aportando en el logro de objetivos.', NULL, '2016-11-23 06:53:55', '2016-11-23 07:15:51', 1),
(47, 25, 'Da y recibe críticas constructivas utilizando un lenguaje adecuado.', NULL, '2016-11-23 06:54:24', '2016-11-23 07:15:51', 1),
(48, 25, 'Gestiona los problemas presentados durante el trabajo del equipo con la finalidad de resolverlos.', NULL, '2016-11-23 06:54:47', '2016-11-23 07:15:51', 1),
(49, 25, 'Realiza su trabajo en el equipo de una forma efectiva y eficiente.', NULL, '2016-11-23 06:55:03', '2016-11-23 07:15:51', 1),
(50, 26, 'Plantea e implementa la solución del problema.', NULL, '2016-11-23 06:56:28', '2016-11-23 07:15:51', 1),
(51, 27, 'Reconoce a través de su comportamiento la responsabilidad ética en su profesión.', NULL, '2016-11-23 06:57:39', '2016-11-23 07:15:51', 1),
(52, 27, 'Reconoce la responsabilidad ética con la sociedad en relación a la seguridad en el trabajo (1)', NULL, '2016-11-23 07:00:05', '2016-11-23 07:15:51', 1),
(53, 27, 'Reconoce la responsabilidad ética con la sociedad en relación al respeto a sus compañeros de trabajo', NULL, '2016-11-23 07:00:27', '2016-11-23 07:15:51', 1),
(54, 27, 'Reconoce la responsabilidad ética con la sociedad en relación con la satisfacción del cliente (2).', NULL, '2016-11-23 07:01:04', '2016-11-23 07:15:51', 1),
(55, 28, 'Comunicación en español Comprende la idea principal plasmada en un texto.', NULL, '2016-11-23 07:01:31', '2016-11-23 07:15:52', 1),
(56, 28, 'Expone adecuadamente utilizando un vocabulario adecuado.', NULL, '2016-11-23 07:02:05', '2016-11-23 07:15:52', 1),
(57, 28, 'Redacta textos utilizando estructuras sintácticas adecuadas.', NULL, '2016-11-23 07:02:21', '2016-11-23 07:15:52', 1),
(58, 29, 'Comprende el impacto de la tecnología en la solución de problemas', NULL, '2016-11-23 07:03:09', '2016-11-23 07:15:52', 1),
(59, 30, 'Define un plan de capacitación una vez terminado sus estudios universitarios.', NULL, '2016-11-23 07:03:26', '2016-11-23 07:15:52', 1),
(60, 31, 'Conoce temas sociales y culturales de actualidad', NULL, '2016-11-23 07:03:39', '2016-11-23 07:15:52', 1),
(61, 32, 'Aplica las Técnicas, Herramientas y Estrategias.', NULL, '2016-11-23 07:04:01', '2016-11-23 07:15:52', 1),
(62, 33, 'Realiza la evaluación económica de un proyecto.', NULL, '2016-11-23 07:04:18', '2016-11-23 07:15:53', 1),
(63, 34, 'Realiza la planificación y seguimiento de un proyecto.', NULL, '2016-11-23 07:04:33', '2016-11-23 07:15:53', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `Curso` (
  `IdCurso` int(11) NOT NULL,
  `IdEspecialidad` int(11) DEFAULT NULL,
  `NivelAcademico` int(11) DEFAULT NULL,
  `Codigo` varchar(6) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Especialidad_p` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `Curso` (`IdCurso`, `IdEspecialidad`, `NivelAcademico`, `Codigo`, `Nombre`, `deleted_at`, `created_at`, `updated_at`, `Especialidad_p`) VALUES
(78, 5, 10, 'INF227', 'DP2', NULL, '2016-11-23 07:10:58', '2016-11-23 07:10:58', NULL),
(79, 5, 10, 'INF392', 'Tesis2', NULL, '2016-11-23 07:11:31', '2016-11-23 07:11:31', NULL),
(80, 5, 9, 'INF226', 'DP1', NULL, '2016-11-23 07:12:12', '2016-11-23 07:12:12', NULL),
(81, 5, 8, 'INF245', 'Software', NULL, '2016-11-23 07:12:39', '2016-11-23 07:12:39', NULL),
(82, 5, 7, 'INF282', 'LP2', NULL, '2016-11-23 07:13:00', '2016-11-23 07:13:00', NULL),
(83, 5, 6, 'INF281', 'LP1', NULL, '2016-11-23 07:13:17', '2016-11-23 07:13:17', NULL),
(84, 5, 5, 'INF263', 'Algoritmia', NULL, '2016-11-23 07:13:40', '2016-11-23 07:13:40', NULL),
(85, 5, -1, 'INF382', 'TASI1', NULL, '2016-11-23 07:14:17', '2016-11-23 07:14:17', NULL),
(86, 5, -1, 'INF372', 'Gráficos', NULL, '2016-11-23 07:14:40', '2016-11-23 07:14:40', NULL),
(87, 5, 7, 'INF008', 'PSP', NULL, '2016-11-23 07:22:31', '2016-11-23 07:22:31', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursoxciclo`
--

CREATE TABLE `CursoxCiclo` (
  `IdCursoxCiclo` int(11) NOT NULL,
  `IdCurso` int(11) DEFAULT NULL,
  `IdCicloAcademico` int(11) DEFAULT NULL,
  `TotalAlumnos` int(11) DEFAULT NULL,
  `Evaluado` varchar(10) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cursoxciclo`
--

INSERT INTO `CursoxCiclo` (`IdCursoxCiclo`, `IdCurso`, `IdCicloAcademico`, `TotalAlumnos`, `Evaluado`, `deleted_at`, `created_at`, `updated_at`) VALUES
(43, 78, 2, NULL, '1', NULL, '2016-11-23 07:16:48', '2016-11-23 07:23:19'),
(44, 79, 2, NULL, '1', NULL, '2016-11-23 07:16:48', '2016-11-23 07:23:20'),
(45, 80, 2, NULL, '1', NULL, '2016-11-23 07:16:48', '2016-11-23 07:23:20'),
(46, 87, 2, NULL, NULL, NULL, '2016-11-23 07:23:16', '2016-11-23 07:23:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursoxcicloxaspecto`
--

CREATE TABLE `CursoxCicloxAspecto` (
  `IdCursoxCicloxAspecto` int(11) NOT NULL,
  `IdCursoxCiclo` int(11) DEFAULT NULL,
  `IdAspecto` int(11) DEFAULT NULL,
  `TotalAlumnos` int(11) DEFAULT NULL,
  `TotalCumplen` int(11) DEFAULT NULL,
  `Porcentaje` float DEFAULT NULL,
  `Promedio` float DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursoxcicloxcriterio`
--

CREATE TABLE `CursoxCicloxCriterio` (
  `IdCursoxCicloxCriterio` int(11) NOT NULL,
  `IdCursoxCiclo` int(11) DEFAULT NULL,
  `IdCriterio` int(11) DEFAULT NULL,
  `TotalAlumnos` int(11) DEFAULT NULL,
  `TotalCumplen` int(11) DEFAULT NULL,
  `Porcentaje` float DEFAULT NULL,
  `Promedio` float DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursoxcicloxresultado`
--

CREATE TABLE `CursoxCicloxResultado` (
  `IdCursoxCicloxResultado` int(11) NOT NULL,
  `IdCursoxCiclo` int(11) DEFAULT NULL,
  `IdResultadoEstudiantil` int(11) DEFAULT NULL,
  `TotalAlumnos` int(11) DEFAULT NULL,
  `TotalCumplen` int(11) DEFAULT NULL,
  `Porcentaje` float DEFAULT NULL,
  `Promedio` float DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursoxdocente`
--

CREATE TABLE `CursoxDocente` (
  `IdCursoxDocente` int(11) NOT NULL,
  `IdDocente` int(11) DEFAULT NULL,
  `IdCurso` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cursoxdocente`
--

INSERT INTO `CursoxDocente` (`IdCursoxDocente`, `IdDocente`, `IdCurso`, `deleted_at`, `created_at`, `updated_at`) VALUES
(6, 6, 78, NULL, NULL, NULL),
(7, 5, 79, NULL, NULL, NULL),
(8, 6, 80, NULL, NULL, NULL),
(9, 5, 81, NULL, NULL, NULL),
(10, 5, 82, NULL, NULL, NULL),
(11, 6, 83, NULL, NULL, NULL),
(12, 5, 84, NULL, NULL, NULL),
(13, 5, 85, NULL, NULL, NULL),
(14, 6, 86, NULL, NULL, NULL),
(15, 5, 86, NULL, NULL, NULL),
(16, 6, 87, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cycles`
--

CREATE TABLE `cycles` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deliverables`
--

CREATE TABLE `deliverables` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_proyecto` int(10) UNSIGNED NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_limite` date NOT NULL,
  `id_padre` int(10) UNSIGNED DEFAULT NULL,
  `porcen_avance` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `Docente` (
  `IdDocente` int(11) NOT NULL,
  `IdEspecialidad` int(11) DEFAULT NULL,
  `IdUsuario` int(11) DEFAULT NULL,
  `Codigo` varchar(20) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `ApellidoPaterno` varchar(100) DEFAULT NULL,
  `ApellidoMaterno` varchar(100) DEFAULT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `Cargo` varchar(100) DEFAULT NULL,
  `Vigente` int(11) NOT NULL,
  `rolTutoria` int(11) DEFAULT NULL,
  `rolEvaluaciones` int(11) DEFAULT NULL,
  `oficina` varchar(20) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `anexo` varchar(20) DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `es_adminpsp` char(1) DEFAULT NULL,
  `es_supervisorpsp` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `Docente` (`IdDocente`, `IdEspecialidad`, `IdUsuario`, `Codigo`, `Nombre`, `ApellidoPaterno`, `ApellidoMaterno`, `Correo`, `Cargo`, `Vigente`, `rolTutoria`, `rolEvaluaciones`, `oficina`, `telefono`, `anexo`, `Descripcion`, `deleted_at`, `created_at`, `updated_at`, `direccion`, `es_adminpsp`, `es_supervisorpsp`) VALUES
(5, 5, 14, '19960275', 'Luis Alberto', 'Flores', 'García', 'luis.flores@pucp.edu.com', 'Profesor Contratado', 1, NULL, NULL, NULL, NULL, NULL, '', NULL, '2016-11-23 06:34:27', '2016-11-23 06:34:27', NULL, NULL, NULL),
(6, 5, 15, '00009299', 'César Augusto', 'Aguilera', 'Serpa', 'cesar.aguilera@pucp.edu.com', 'Profesor Contratado', 1, NULL, NULL, NULL, NULL, NULL, '', NULL, '2016-11-23 06:35:24', '2016-11-23 06:35:24', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `Especialidad` (
  `IdEspecialidad` int(11) NOT NULL,
  `Codigo` varchar(20) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `IdDocente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `Especialidad` (`IdEspecialidad`, `Codigo`, `Nombre`, `Descripcion`, `deleted_at`, `created_at`, `updated_at`, `IdDocente`) VALUES
(5, 'INF', 'Ingeniería Informática', 'Tendrás una excelente base tecnológica y científica para la automatización de la información en cualquier organización.', NULL, '2016-11-23 06:29:28', '2016-11-23 06:36:04', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evalternatives`
--

CREATE TABLE `evalternatives` (
  `id` int(10) UNSIGNED NOT NULL,
  `letra` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_evquestion` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluations`
--

CREATE TABLE `evaluations` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `tiempo` int(10) UNSIGNED NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `estado` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ubicacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` datetime NOT NULL,
  `duracion` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `imagen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_grupo` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evidenciacurso`
--

CREATE TABLE `EvidenciaCurso` (
  `IdEvidenciaCurso` int(11) NOT NULL,
  `IdArchivoEntrada` int(11) DEFAULT NULL,
  `IdHorario` int(11) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evidenciamedicion`
--

CREATE TABLE `EvidenciaMedicion` (
  `IdEvidenciaMedicion` int(11) NOT NULL,
  `IdArchivoEntrada` int(11) DEFAULT NULL,
  `IdFuentexCursoxCriterioxCiclo` int(11) DEFAULT NULL,
  `IdHorario` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evquestions`
--

CREATE TABLE `evquestions` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `tiempo` int(10) UNSIGNED NOT NULL,
  `puntaje` double(8,2) UNSIGNED NOT NULL,
  `dificultad` int(10) UNSIGNED NOT NULL,
  `requisito` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rpta` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tamano_arch` int(10) UNSIGNED DEFAULT NULL,
  `extension_arch` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_docente` int(11) NOT NULL,
  `id_competence` int(10) UNSIGNED NOT NULL,
  `id_evaluation` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evquestionxstudentxdocentes`
--

CREATE TABLE `evquestionxstudentxdocentes` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_tutstudent` int(10) UNSIGNED NOT NULL,
  `id_evquestion` int(10) UNSIGNED NOT NULL,
  `id_evaluation` int(10) UNSIGNED NOT NULL,
  `id_docente` int(11) DEFAULT NULL,
  `puntaje` double(8,2) UNSIGNED DEFAULT NULL,
  `respuesta` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comentario` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `clave_elegida` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path_archivo` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `freehours`
--

CREATE TABLE `freehours` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `hora_ini` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `idsupervisor` int(10) UNSIGNED NOT NULL,
  `idpspprocess` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fuentemedicion`
--

CREATE TABLE `FuenteMedicion` (
  `IdFuenteMedicion` int(11) NOT NULL,
  `IdEspecialidad` int(11) DEFAULT NULL,
  `Nombre` varchar(200) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fuentemedicion`
--

INSERT INTO `FuenteMedicion` (`IdFuenteMedicion`, `IdEspecialidad`, `Nombre`, `deleted_at`, `created_at`, `updated_at`) VALUES
(6, 5, 'Documentación', NULL, '2016-11-23 07:09:14', '2016-11-23 07:09:14'),
(7, 5, 'Rep. Exp. Numérica', NULL, '2016-11-23 07:09:32', '2016-11-23 07:09:32'),
(8, 5, 'Doc. del Proyecto', NULL, '2016-11-23 07:09:43', '2016-11-23 07:09:43'),
(9, 5, 'Eval. de Desempeño', NULL, '2016-11-23 07:09:53', '2016-11-23 07:09:53'),
(10, 5, 'Presentación oral', NULL, '2016-11-23 07:10:06', '2016-11-23 07:10:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fuentexcursoxcriterioxciclo`
--

CREATE TABLE `FuentexCursoxCriterioxCiclo` (
  `IdFuentexCursoxCriterioxCiclo` int(11) NOT NULL,
  `IdFuenteMedicion` int(11) DEFAULT NULL,
  `IdCriterio` int(11) DEFAULT NULL,
  `IdCurso` int(11) DEFAULT NULL,
  `IdCicloAcademico` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fuentexcursoxcriterioxciclo`
--

INSERT INTO `FuentexCursoxCriterioxCiclo` (`IdFuentexCursoxCriterioxCiclo`, `IdFuenteMedicion`, `IdCriterio`, `IdCurso`, `IdCicloAcademico`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 6, 37, 78, 2, '2016-11-23 07:19:15', '2016-11-23 07:19:07', '2016-11-23 07:19:15'),
(2, 10, 37, 78, 2, '2016-11-23 07:19:15', '2016-11-23 07:19:07', '2016-11-23 07:19:15'),
(3, 7, 38, 78, 2, '2016-11-23 07:19:15', '2016-11-23 07:19:07', '2016-11-23 07:19:15'),
(4, 9, 38, 78, 2, '2016-11-23 07:19:15', '2016-11-23 07:19:07', '2016-11-23 07:19:15'),
(5, 8, 39, 78, 2, '2016-11-23 07:19:15', '2016-11-23 07:19:07', '2016-11-23 07:19:15'),
(6, 6, 37, 78, 2, '2016-11-23 07:19:30', '2016-11-23 07:19:15', '2016-11-23 07:19:30'),
(7, 10, 37, 78, 2, '2016-11-23 07:19:30', '2016-11-23 07:19:15', '2016-11-23 07:19:30'),
(8, 7, 38, 78, 2, '2016-11-23 07:19:30', '2016-11-23 07:19:15', '2016-11-23 07:19:30'),
(9, 9, 38, 78, 2, '2016-11-23 07:19:30', '2016-11-23 07:19:15', '2016-11-23 07:19:30'),
(10, 8, 39, 78, 2, '2016-11-23 07:19:30', '2016-11-23 07:19:15', '2016-11-23 07:19:30'),
(11, 6, 60, 78, 2, '2016-11-23 07:19:30', '2016-11-23 07:19:15', '2016-11-23 07:19:30'),
(12, 8, 60, 78, 2, '2016-11-23 07:19:30', '2016-11-23 07:19:16', '2016-11-23 07:19:30'),
(13, 10, 60, 78, 2, '2016-11-23 07:19:30', '2016-11-23 07:19:16', '2016-11-23 07:19:30'),
(14, 6, 37, 78, 2, NULL, '2016-11-23 07:19:30', '2016-11-23 07:19:30'),
(15, 10, 37, 78, 2, NULL, '2016-11-23 07:19:30', '2016-11-23 07:19:30'),
(16, 7, 38, 78, 2, NULL, '2016-11-23 07:19:30', '2016-11-23 07:19:30'),
(17, 9, 38, 78, 2, NULL, '2016-11-23 07:19:30', '2016-11-23 07:19:30'),
(18, 8, 39, 78, 2, NULL, '2016-11-23 07:19:30', '2016-11-23 07:19:30'),
(19, 6, 60, 78, 2, NULL, '2016-11-23 07:19:30', '2016-11-23 07:19:30'),
(20, 8, 60, 78, 2, NULL, '2016-11-23 07:19:30', '2016-11-23 07:19:30'),
(21, 10, 60, 78, 2, NULL, '2016-11-23 07:19:30', '2016-11-23 07:19:30'),
(22, 6, 62, 78, 2, NULL, '2016-11-23 07:19:30', '2016-11-23 07:19:30'),
(23, 8, 62, 78, 2, NULL, '2016-11-23 07:19:30', '2016-11-23 07:19:30'),
(24, 10, 62, 78, 2, NULL, '2016-11-23 07:19:30', '2016-11-23 07:19:30'),
(25, 7, 63, 78, 2, NULL, '2016-11-23 07:19:30', '2016-11-23 07:19:30'),
(26, 9, 63, 78, 2, NULL, '2016-11-23 07:19:30', '2016-11-23 07:19:30'),
(27, 6, 58, 79, 2, NULL, '2016-11-23 07:20:14', '2016-11-23 07:20:14'),
(28, 8, 58, 79, 2, NULL, '2016-11-23 07:20:14', '2016-11-23 07:20:14'),
(29, 10, 58, 79, 2, NULL, '2016-11-23 07:20:14', '2016-11-23 07:20:14'),
(30, 6, 55, 79, 2, NULL, '2016-11-23 07:20:14', '2016-11-23 07:20:14'),
(31, 10, 55, 79, 2, NULL, '2016-11-23 07:20:14', '2016-11-23 07:20:14'),
(32, 7, 56, 79, 2, NULL, '2016-11-23 07:20:14', '2016-11-23 07:20:14'),
(33, 9, 56, 79, 2, NULL, '2016-11-23 07:20:14', '2016-11-23 07:20:14'),
(34, 8, 57, 79, 2, NULL, '2016-11-23 07:20:14', '2016-11-23 07:20:14'),
(35, 6, 42, 79, 2, NULL, '2016-11-23 07:20:14', '2016-11-23 07:20:14'),
(36, 7, 43, 79, 2, NULL, '2016-11-23 07:20:14', '2016-11-23 07:20:14'),
(37, 8, 44, 79, 2, NULL, '2016-11-23 07:20:14', '2016-11-23 07:20:14'),
(38, 10, 44, 79, 2, NULL, '2016-11-23 07:20:14', '2016-11-23 07:20:14'),
(39, 9, 45, 79, 2, NULL, '2016-11-23 07:20:14', '2016-11-23 07:20:14'),
(40, 6, 50, 79, 2, NULL, '2016-11-23 07:20:14', '2016-11-23 07:20:14'),
(41, 7, 50, 79, 2, NULL, '2016-11-23 07:20:14', '2016-11-23 07:20:14'),
(42, 9, 50, 79, 2, NULL, '2016-11-23 07:20:14', '2016-11-23 07:20:14'),
(43, 10, 50, 79, 2, NULL, '2016-11-23 07:20:14', '2016-11-23 07:20:14'),
(44, 6, 59, 79, 2, NULL, '2016-11-23 07:20:14', '2016-11-23 07:20:14'),
(45, 8, 59, 79, 2, NULL, '2016-11-23 07:20:14', '2016-11-23 07:20:14'),
(46, 10, 59, 79, 2, NULL, '2016-11-23 07:20:14', '2016-11-23 07:20:14'),
(47, 7, 61, 79, 2, NULL, '2016-11-23 07:20:14', '2016-11-23 07:20:14'),
(48, 9, 61, 79, 2, NULL, '2016-11-23 07:20:14', '2016-11-23 07:20:14'),
(49, 6, 51, 80, 2, NULL, '2016-11-23 07:20:45', '2016-11-23 07:20:45'),
(50, 7, 52, 80, 2, NULL, '2016-11-23 07:20:45', '2016-11-23 07:20:45'),
(51, 8, 53, 80, 2, NULL, '2016-11-23 07:20:45', '2016-11-23 07:20:45'),
(52, 10, 53, 80, 2, NULL, '2016-11-23 07:20:45', '2016-11-23 07:20:45'),
(53, 9, 54, 80, 2, NULL, '2016-11-23 07:20:45', '2016-11-23 07:20:45'),
(54, 6, 40, 80, 2, NULL, '2016-11-23 07:20:45', '2016-11-23 07:20:45'),
(55, 7, 40, 80, 2, NULL, '2016-11-23 07:20:45', '2016-11-23 07:20:45'),
(56, 10, 40, 80, 2, NULL, '2016-11-23 07:20:45', '2016-11-23 07:20:45'),
(57, 8, 41, 80, 2, NULL, '2016-11-23 07:20:45', '2016-11-23 07:20:45'),
(58, 9, 41, 80, 2, NULL, '2016-11-23 07:20:45', '2016-11-23 07:20:45'),
(59, 10, 47, 80, 2, NULL, '2016-11-23 07:20:45', '2016-11-23 07:20:45'),
(60, 9, 48, 80, 2, NULL, '2016-11-23 07:20:45', '2016-11-23 07:20:45'),
(61, 6, 46, 80, 2, NULL, '2016-11-23 07:20:45', '2016-11-23 07:20:45'),
(62, 8, 46, 80, 2, NULL, '2016-11-23 07:20:45', '2016-11-23 07:20:45'),
(63, 7, 49, 80, 2, NULL, '2016-11-23 07:20:45', '2016-11-23 07:20:45'),
(64, 6, 51, 87, 2, NULL, '2016-11-23 07:24:49', '2016-11-23 07:24:49'),
(65, 10, 51, 87, 2, NULL, '2016-11-23 07:24:49', '2016-11-23 07:24:49'),
(66, 7, 52, 87, 2, NULL, '2016-11-23 07:24:49', '2016-11-23 07:24:49'),
(67, 9, 52, 87, 2, NULL, '2016-11-23 07:24:49', '2016-11-23 07:24:49'),
(68, 7, 53, 87, 2, NULL, '2016-11-23 07:24:49', '2016-11-23 07:24:49'),
(69, 9, 53, 87, 2, NULL, '2016-11-23 07:24:49', '2016-11-23 07:24:49'),
(70, 7, 54, 87, 2, NULL, '2016-11-23 07:24:49', '2016-11-23 07:24:49'),
(71, 9, 54, 87, 2, NULL, '2016-11-23 07:24:49', '2016-11-23 07:24:49'),
(72, 6, 40, 87, 2, NULL, '2016-11-23 07:24:49', '2016-11-23 07:24:49'),
(73, 8, 40, 87, 2, NULL, '2016-11-23 07:24:49', '2016-11-23 07:24:49'),
(74, 10, 40, 87, 2, NULL, '2016-11-23 07:24:49', '2016-11-23 07:24:49'),
(75, 7, 41, 87, 2, NULL, '2016-11-23 07:24:49', '2016-11-23 07:24:49'),
(76, 9, 41, 87, 2, NULL, '2016-11-23 07:24:49', '2016-11-23 07:24:49'),
(77, 7, 47, 87, 2, NULL, '2016-11-23 07:24:49', '2016-11-23 07:24:49'),
(78, 9, 47, 87, 2, NULL, '2016-11-23 07:24:49', '2016-11-23 07:24:49'),
(79, 6, 48, 87, 2, NULL, '2016-11-23 07:24:49', '2016-11-23 07:24:49'),
(80, 10, 48, 87, 2, NULL, '2016-11-23 07:24:49', '2016-11-23 07:24:49'),
(81, 7, 46, 87, 2, NULL, '2016-11-23 07:24:49', '2016-11-23 07:24:49'),
(82, 9, 46, 87, 2, NULL, '2016-11-23 07:24:49', '2016-11-23 07:24:49'),
(83, 8, 49, 87, 2, NULL, '2016-11-23 07:24:49', '2016-11-23 07:24:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_lider` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `Horario` (
  `IdHorario` int(11) NOT NULL,
  `IdCursoxCiclo` int(11) DEFAULT NULL,
  `Codigo` varchar(10) DEFAULT NULL,
  `TotalAlumnos` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idPspProcess` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `Horario` (`IdHorario`, `IdCursoxCiclo`, `Codigo`, `TotalAlumnos`, `deleted_at`, `created_at`, `updated_at`, `idPspProcess`) VALUES
(7, 43, '1081', NULL, NULL, '2016-11-23 07:17:27', '2016-11-23 07:17:27', NULL),
(8, 44, '1082', NULL, NULL, '2016-11-23 07:17:52', '2016-11-23 07:17:52', NULL),
(9, 45, '1083', NULL, NULL, '2016-11-23 07:18:04', '2016-11-23 07:18:04', NULL),
(10, 46, '1084', NULL, NULL, '2016-11-23 07:24:08', '2016-11-23 07:24:08', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarioxaspecto`
--

CREATE TABLE `HorarioxAspecto` (
  `IdHorarioxAspecto` int(11) NOT NULL,
  `IdHorario` int(11) DEFAULT NULL,
  `IdAspecto` int(11) DEFAULT NULL,
  `TotalAlumnos` int(11) DEFAULT NULL,
  `TotalCumplen` int(11) DEFAULT NULL,
  `Porcentaje` float DEFAULT NULL,
  `Promedio` float DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarioxcriterio`
--

CREATE TABLE `HorarioxCriterio` (
  `IdHorarioxCriterio` int(11) NOT NULL,
  `IdHorario` int(11) DEFAULT NULL,
  `IdCriterio` int(11) DEFAULT NULL,
  `TotalAlumnos` int(11) DEFAULT NULL,
  `TotalCumplen` int(11) DEFAULT NULL,
  `Porcentaje` float DEFAULT NULL,
  `Promedio` float DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarioxdocente`
--

CREATE TABLE `HorarioxDocente` (
  `IdHorarioxDocente` int(11) NOT NULL,
  `IdDocente` int(11) DEFAULT NULL,
  `IdHorario` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horarioxdocente`
--

INSERT INTO `HorarioxDocente` (`IdHorarioxDocente`, `IdDocente`, `IdHorario`, `deleted_at`, `created_at`, `updated_at`) VALUES
(7, 6, 7, NULL, '2016-11-23 07:17:27', '2016-11-23 07:17:27'),
(8, 5, 8, NULL, '2016-11-23 07:17:52', '2016-11-23 07:17:52'),
(9, 6, 9, NULL, '2016-11-23 07:18:04', '2016-11-23 07:18:04'),
(10, 6, 10, NULL, '2016-11-23 07:24:08', '2016-11-23 07:24:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarioxresultado`
--

CREATE TABLE `HorarioxResultado` (
  `IdHorarioxResultado` int(11) NOT NULL,
  `IdHorario` int(11) DEFAULT NULL,
  `IdResultadoEstudiantil` int(11) DEFAULT NULL,
  `TotalAlumnos` int(11) DEFAULT NULL,
  `TotalCumplen` int(11) DEFAULT NULL,
  `Porcentaje` float DEFAULT NULL,
  `Promedio` float DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informe`
--

CREATE TABLE `Informe` (
  `IdInforme` int(11) NOT NULL,
  `IdHorario` int(11) DEFAULT NULL,
  `Titulo` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscriptionfiles`
--

CREATE TABLE `inscriptionfiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `tiene_convenio` int(11) NOT NULL,
  `fecha_recep_convenio` date NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_termino` date NOT NULL,
  `activ_formativas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `razon_social` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `actividad_economica` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion_empresa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `distrito_empresa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_area` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ubicacion_area` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `equipamiento_area` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `equi_del_practicante` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `personal_area` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cond_seguridad_area` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Correo_jefe_directo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telef_jefe_directo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jefe_directo_aux` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `puesto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `recomendaciones` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invdocuments`
--

CREATE TABLE `invdocuments` (
  `id` int(10) UNSIGNED NOT NULL,
  `observacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_investigador` int(11) NOT NULL,
  `ruta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `version` int(11) NOT NULL,
  `id_entregable` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `investigators`
--

CREATE TABLE `investigators` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ape_paterno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ape_materno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `celular` int(11) NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `id_area` int(10) UNSIGNED DEFAULT NULL,
  `Vigente` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `investigatorxdeliverables`
--

CREATE TABLE `investigatorxdeliverables` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_investigador` int(10) UNSIGNED NOT NULL,
  `id_entregable` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `investigatorxgroups`
--

CREATE TABLE `investigatorxgroups` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_investigador` int(10) UNSIGNED NOT NULL,
  `id_grupo` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `investigatorxprojects`
--

CREATE TABLE `investigatorxprojects` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_investigador` int(10) UNSIGNED NOT NULL,
  `id_proyecto` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_09_20_183437_create_groups_table', 1),
('2016_09_20_184142_create_investigators_table', 1),
('2016_09_20_184538_create_events_table', 1),
('2016_09_20_185302_create_projects_table', 1),
('2016_09_20_191741_create_deliverables_table', 1),
('2016_09_20_204804_create_invdocuments_table', 1),
('2016_09_20_205100_create_areas_table', 1),
('2016_09_21_014939_create_statuses_table', 1),
('2016_09_21_100145_create_investigatorxgroups_table', 1),
('2016_09_21_100209_create_investigatorxprojects_table', 1),
('2016_09_21_100233_create_investigatorxdeliverables_table', 1),
('2016_09_21_102519_add_fk_to_groups_table', 1),
('2016_09_21_103006_add_fk_to_investigators_table', 1),
('2016_09_21_103216_add_fk_to_events_table', 1),
('2016_09_21_103423_add_fk_to_projects_table', 1),
('2016_09_21_103658_add_fk_to_deliverables_table', 1),
('2016_09_21_103836_add_fk_to_invdocuments_table', 1),
('2016_09_21_104417_add_fk_to_investigatorxgroups_table', 1),
('2016_09_21_104555_add_fk_to_investigatorxprojects_table', 1),
('2016_09_21_104655_add_fk_to_investigatorxdeliverables_table', 1),
('2016_09_27_131046_create_cycles_table', 1),
('2016_09_27_131232_create_templates_table', 1),
('2016_09_27_131250_create_phases_table', 1),
('2016_09_27_132750_create_skills_table', 1),
('2016_09_27_181325_create_schedulesxcycles_table', 1),
('2016_09_27_181512_create_usersxprofiles_table', 1),
('2016_09_27_181621_create_pspdocuments_table', 1),
('2016_09_27_181840_create_pspprocesses_table', 1),
('2016_09_27_182922_create_pspprocessesxphases_table', 1),
('2016_09_27_183138_create_pspgroups_table', 1),
('2016_09_27_183139_create_pspgroupsxpspprocesses_table', 1),
('2016_09_27_193739_create_supervisors_table', 1),
('2016_09_27_193742_add_fk_to_templates', 1),
('2016_09_27_195254_add_fk_to_pspdocuments', 1),
('2016_09_27_233333_create_skillsxstudents_table', 1),
('2016_10_02_171220_create_topics_table', 1),
('2016_10_03_015255_create_reasons_table', 1),
('2016_10_03_134756_create_parameters_table', 1),
('2016_10_04_135707_add_fk_to_supervisors', 1),
('2016_10_04_164928_create_inscriptionfiles_table', 1),
('2016_10_06_190545_create_tutorships_table', 1),
('2016_10_07_114911_create_tutstudents_table', 1),
('2016_10_08_153840_create_questions_table', 1),
('2016_10_08_155759_create_alternatives_table', 1),
('2016_10_08_160450_create_competences_table', 1),
('2016_10_11_005652_create_teacherxcompetences_table', 1),
('2016_10_14_012110_create_evaluations_table', 1),
('2016_10_17_121009_create_teacherxgroups_table', 1),
('2016_10_17_121045_add_fk_to_teacherxgroups_table', 1),
('2016_10_17_163247_create_teacherxprojects_table', 1),
('2016_10_17_163313_add_fk_to_teacherxprojects_table', 1),
('2016_10_18_112933_add_fk_to_questions_table', 1),
('2016_10_18_120435_add_fk_to_teacherxcompetences_table', 1),
('2016_10_18_171504_create_teacherxdeliverables_table', 1),
('2016_10_18_171527_add_fk_to_teacherxdeliverables_table', 1),
('2016_10_19_195037_create_pspmeetings_table', 1),
('2016_10_20_132326_create_tutschedules_table', 1),
('2016_10_20_133032_add_fk_to_tutschedules_table', 1),
('2016_10_20_134031_create_noavailabilitys_table', 1),
('2016_10_20_134201_add_fk_to_noavailabilitys_table', 1),
('2016_10_20_141827_create_tutmeetings_table', 1),
('2016_10_20_142640_add_fk_to_tutmeetings_table', 1),
('2016_10_23_165740_create_pspprocessesxdocente_table', 1),
('2016_10_23_165848_create_pspprocessesxsupervisors_table', 1),
('2016_10_23_195337_add_fk_to_pspprocesses_table', 1),
('2016_10_26_100409_add_column_id_especialidad_parameters_table', 1),
('2016_10_26_153034_create_tutstudentxevaluations_table', 1),
('2016_10_26_155107_create_evquestions_table', 1),
('2016_10_26_155149_create_evalternatives_table', 1),
('2016_10_26_155238_add_fk_to_evalternatives_table', 1),
('2016_10_26_155300_add_fk_to_evquestions_table', 1),
('2016_10_26_160441_add_fk_to_tutstudentxevaluations_table', 1),
('2016_10_27_060014_add_column_deleted_at_parameters_table', 1),
('2016_10_30_000435_create_freehours_table', 1),
('2016_10_30_000437_add_fk_to_pspmeetings', 1),
('2016_10_30_000451_add_fk_to_freehours', 1),
('2016_10_30_123701_create_evquestionxstudentxdocentes_table', 1),
('2016_10_30_224802_create_schedule_meetings_table', 1),
('2016_10_30_230201_add_fk_to_schedule_meetings_table', 1),
('2016_10_31_204316_create_pspstudents_table', 1),
('2016_10_31_205202_add_fk_to_pspstudents_table', 1),
('2016_11_02_124522_create_teacherxtutstudentxevaluations_table', 1),
('2016_11_03_211145_add_new_columns_in_parameters', 1),
('2016_11_06_082603_create_pspstudentsxinscriptionfiles_table', 1),
('2016_11_06_083936_add_fk_to_phases_table', 1),
('2016_11_06_090115_add_fk_to_pspgroups_table', 1),
('2016_11_06_174401_add_column_inicio_table', 1),
('2016_11_06_200950_create_competencextutstudentxevaluations_table', 1),
('2016_11_07_023436_add_column_corregida_tutstudentxevaluations_table', 1),
('2016_11_08_114808_create_studentxgroups_table', 1),
('2016_11_08_114842_add_fk_to_studentxgroups_table', 1),
('2016_11_08_124356_create_studentxprojects_table', 1),
('2016_11_08_124452_add_fk_to_studentxprojects_table', 1),
('2016_11_08_131823_create_studentxdeliverables_table', 1),
('2016_11_08_131846_add_fk_to_studentxdeliverables_table', 1),
('2016_11_14_155132_create_pspcriterios_table', 1),
('2016_11_14_155209_add_fk_to_pspcriterios_table', 1),
('2016_11_14_183433_create_pspstudentsxcriterios_table', 1),
('2016_11_14_190904_add_fk_to_pspstudentsxcriterios_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivelcriterio`
--

CREATE TABLE `NivelCriterio` (
  `IdNivelCriterio` int(11) NOT NULL,
  `IdCriterio` int(11) DEFAULT NULL,
  `IdPeriodo` int(11) DEFAULT NULL,
  `Valor` int(11) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noavailabilitys`
--

CREATE TABLE `noavailabilitys` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `id_docente` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetivoeducacional`
--

CREATE TABLE `ObjetivoEducacional` (
  `IdObjetivoEducacional` int(11) NOT NULL,
  `IdEspecialidad` int(11) DEFAULT NULL,
  `Numero` int(11) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `CicloRegistro` varchar(10) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `objetivoeducacional`
--

INSERT INTO `ObjetivoEducacional` (`IdObjetivoEducacional`, `IdEspecialidad`, `Numero`, `Descripcion`, `CicloRegistro`, `deleted_at`, `created_at`, `updated_at`, `Estado`) VALUES
(14, 5, 1, 'Conducir el análisis de procesos de negocio y necesidades de información de la organización', NULL, NULL, '2016-11-23 06:37:39', '2016-11-23 07:15:51', 1),
(15, 5, 2, 'Dirigir las actividades del ciclo de vida de proyectos informáticos, utilizando tecnología, estándares y herramientas adecuadas.', NULL, NULL, '2016-11-23 06:38:15', '2016-11-23 07:15:51', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parameters`
--

CREATE TABLE `parameters` (
  `id` int(10) UNSIGNED NOT NULL,
  `duracionCita` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_especialidad` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `start_date` timestamp NOT NULL,
  `end_date` timestamp NOT NULL,
  `number_days` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `passwordresets`
--

CREATE TABLE `PasswordResets` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `passwordresets`
--

INSERT INTO `PasswordResets` (`user_id`, `token`, `created_at`) VALUES
(14, '04d26f744f02822b789741803459958688e0a63a96a18d56166d550e9a2180ac', '2016-11-23 06:34:27'),
(15, '914946a0a393f80cc63bdeccfff62e055f5f2205cc8ea16952d7a35a9005caaf', '2016-11-23 06:35:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `Perfil` (
  `IdPerfil` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `Perfil` (`IdPerfil`, `Nombre`, `Descripcion`, `deleted_at`, `created_at`, `updated_at`) VALUES
(0, 'Alumno', 'Alumno de la facultad', NULL, '2016-05-28 02:56:00', '2016-06-24 12:01:17'),
(1, 'Coordinador', 'Coordinador de la Especialidad', NULL, '2016-05-28 02:56:00', '2016-06-24 18:05:44'),
(2, 'Profesor', 'Profesor de una Especialidad', NULL, '2016-05-28 02:56:00', '2016-06-24 20:15:18'),
(3, 'Administrador', 'Administrador de la Facultad', NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(4, 'Acreditador', 'Acreditador de una Especialidad', NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(5, 'Investigador', 'Investigador de la facultad', NULL, '2016-05-28 02:56:00', '2016-06-24 12:01:17'),
(6, 'Supervisor', 'Supervisor de Psp', NULL, '2016-05-28 02:56:00', '2016-06-24 12:01:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfilxaccion`
--

CREATE TABLE `PerfilxAccion` (
  `IdPerfilxAccion` int(11) NOT NULL,
  `IdPerfil` int(11) DEFAULT NULL,
  `IdAccion` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfilxaccion`
--

INSERT INTO `PerfilxAccion` (`IdPerfilxAccion`, `IdPerfil`, `IdAccion`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 3, 1, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(2, 3, 2, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(5, 3, 5, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(6, 3, 6, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(7, 3, 7, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(8, 3, 8, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(9, 3, 9, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(10, 3, 10, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(11, 3, 11, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(12, 3, 12, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(13, 3, 13, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(14, 3, 14, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(15, 3, 15, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(16, 3, 16, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(17, 3, 17, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(18, 3, 18, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(19, 3, 19, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(20, 3, 20, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(21, 3, 21, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(22, 3, 22, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(23, 3, 23, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(24, 3, 24, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(25, 3, 25, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(26, 3, 26, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(27, 3, 27, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(28, 3, 28, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(29, 3, 29, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(30, 3, 30, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(31, 3, 31, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(32, 3, 32, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(33, 3, 33, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(34, 3, 34, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(35, 3, 35, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(36, 3, 36, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(37, 3, 37, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(38, 3, 38, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(39, 3, 39, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(40, 3, 40, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(41, 3, 41, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(42, 3, 42, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(43, 3, 43, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(44, 3, 44, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(45, 3, 45, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(46, 3, 46, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(47, 3, 47, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(48, 3, 48, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(49, 3, 49, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(50, 3, 50, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(51, 3, 51, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(52, 3, 52, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(53, 3, 53, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(54, 3, 54, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(55, 3, 55, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(56, 3, 56, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(57, 3, 57, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(58, 3, 58, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(59, 3, 59, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(60, 3, 60, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(61, 3, 61, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(62, 3, 62, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(63, 3, 63, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(64, 3, 64, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(65, 3, 65, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(66, 3, 66, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(67, 3, 67, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(68, 3, 68, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(69, 3, 69, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(70, 3, 70, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(71, 3, 71, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(72, 3, 72, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(73, 3, 73, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(74, 3, 74, NULL, '2016-05-28 02:56:00', '2016-05-28 02:56:00'),
(75, 3, 75, NULL, '2016-05-27 21:56:00', '2016-05-27 21:56:00'),
(76, 2, 36, '2016-06-18 21:49:11', '2016-06-18 21:42:39', '2016-06-18 21:49:11'),
(77, 2, 36, '2016-06-18 21:50:59', '2016-06-18 21:49:11', '2016-06-18 21:50:59'),
(78, 2, 38, '2016-06-18 21:50:59', '2016-06-18 21:49:11', '2016-06-18 21:50:59'),
(79, 2, 39, '2016-06-18 21:50:59', '2016-06-18 21:49:11', '2016-06-18 21:50:59'),
(80, 2, 40, '2016-06-18 21:50:59', '2016-06-18 21:49:11', '2016-06-18 21:50:59'),
(81, 2, 41, '2016-06-18 21:50:59', '2016-06-18 21:49:11', '2016-06-18 21:50:59'),
(82, 2, 42, '2016-06-18 21:50:59', '2016-06-18 21:49:11', '2016-06-18 21:50:59'),
(83, 2, 43, '2016-06-18 21:50:59', '2016-06-18 21:49:11', '2016-06-18 21:50:59'),
(84, 2, 44, '2016-06-18 21:50:59', '2016-06-18 21:49:11', '2016-06-18 21:50:59'),
(85, 2, 55, '2016-06-18 21:50:59', '2016-06-18 21:49:11', '2016-06-18 21:50:59'),
(86, 2, 73, '2016-06-18 21:50:59', '2016-06-18 21:49:11', '2016-06-18 21:50:59'),
(87, 2, 35, '2016-06-18 22:00:07', '2016-06-18 21:50:59', '2016-06-18 22:00:07'),
(88, 2, 36, '2016-06-18 22:00:07', '2016-06-18 21:50:59', '2016-06-18 22:00:07'),
(89, 2, 38, '2016-06-18 22:00:07', '2016-06-18 21:50:59', '2016-06-18 22:00:07'),
(90, 2, 39, '2016-06-18 22:00:07', '2016-06-18 21:50:59', '2016-06-18 22:00:07'),
(91, 2, 40, '2016-06-18 22:00:07', '2016-06-18 21:50:59', '2016-06-18 22:00:07'),
(92, 2, 41, '2016-06-18 22:00:07', '2016-06-18 21:50:59', '2016-06-18 22:00:07'),
(93, 2, 42, '2016-06-18 22:00:07', '2016-06-18 21:50:59', '2016-06-18 22:00:07'),
(94, 2, 43, '2016-06-18 22:00:07', '2016-06-18 21:50:59', '2016-06-18 22:00:07'),
(95, 2, 44, '2016-06-18 22:00:07', '2016-06-18 21:50:59', '2016-06-18 22:00:07'),
(96, 2, 73, '2016-06-18 22:00:07', '2016-06-18 21:50:59', '2016-06-18 22:00:07'),
(98, 2, 36, '2016-06-18 22:12:43', '2016-06-18 22:00:07', '2016-06-18 22:12:43'),
(99, 2, 37, '2016-06-18 22:12:43', '2016-06-18 22:00:07', '2016-06-18 22:12:43'),
(100, 2, 38, '2016-06-18 22:12:43', '2016-06-18 22:00:07', '2016-06-18 22:12:43'),
(101, 2, 39, '2016-06-18 22:12:43', '2016-06-18 22:00:07', '2016-06-18 22:12:43'),
(102, 2, 40, '2016-06-18 22:12:43', '2016-06-18 22:00:07', '2016-06-18 22:12:43'),
(103, 2, 41, '2016-06-18 22:12:43', '2016-06-18 22:00:07', '2016-06-18 22:12:43'),
(104, 2, 42, '2016-06-18 22:12:43', '2016-06-18 22:00:07', '2016-06-18 22:12:43'),
(105, 2, 43, '2016-06-18 22:12:43', '2016-06-18 22:00:07', '2016-06-18 22:12:43'),
(106, 2, 44, '2016-06-18 22:12:43', '2016-06-18 22:00:07', '2016-06-18 22:12:43'),
(107, 2, 47, '2016-06-18 22:12:43', '2016-06-18 22:00:07', '2016-06-18 22:12:43'),
(108, 2, 67, '2016-06-18 22:12:43', '2016-06-18 22:00:07', '2016-06-18 22:12:43'),
(109, 2, 73, '2016-06-18 22:12:43', '2016-06-18 22:00:07', '2016-06-18 22:12:43'),
(110, 2, 35, '2016-06-24 13:58:17', '2016-06-18 22:12:43', '2016-06-24 13:58:17'),
(111, 2, 36, '2016-06-24 13:58:18', '2016-06-18 22:12:43', '2016-06-24 13:58:18'),
(112, 2, 37, '2016-06-24 13:58:18', '2016-06-18 22:12:43', '2016-06-24 13:58:18'),
(113, 2, 38, '2016-06-24 13:58:18', '2016-06-18 22:12:43', '2016-06-24 13:58:18'),
(114, 2, 39, '2016-06-24 13:58:18', '2016-06-18 22:12:43', '2016-06-24 13:58:18'),
(115, 2, 40, '2016-06-24 13:58:18', '2016-06-18 22:12:43', '2016-06-24 13:58:18'),
(116, 2, 41, '2016-06-24 13:58:18', '2016-06-18 22:12:43', '2016-06-24 13:58:18'),
(117, 2, 42, '2016-06-24 13:58:18', '2016-06-18 22:12:43', '2016-06-24 13:58:18'),
(118, 2, 43, '2016-06-24 13:58:18', '2016-06-18 22:12:43', '2016-06-24 13:58:18'),
(119, 2, 44, '2016-06-24 13:58:18', '2016-06-18 22:12:43', '2016-06-24 13:58:18'),
(120, 2, 47, '2016-06-24 13:58:18', '2016-06-18 22:12:43', '2016-06-24 13:58:18'),
(121, 2, 67, '2016-06-24 13:58:18', '2016-06-18 22:12:43', '2016-06-24 13:58:18'),
(122, 2, 73, '2016-06-24 13:58:18', '2016-06-18 22:12:43', '2016-06-24 13:58:18'),
(123, 5, 54, '2016-06-18 22:21:29', '2016-06-18 22:18:58', '2016-06-18 22:21:29'),
(124, 5, 55, '2016-06-18 22:21:29', '2016-06-18 22:18:58', '2016-06-18 22:21:29'),
(125, 5, 56, '2016-06-18 22:21:29', '2016-06-18 22:18:58', '2016-06-18 22:21:29'),
(126, 5, 54, '2016-06-24 12:01:17', '2016-06-18 22:21:29', '2016-06-24 12:01:17'),
(127, 5, 55, '2016-06-24 12:01:17', '2016-06-18 22:21:29', '2016-06-24 12:01:17'),
(128, 5, 56, '2016-06-24 12:01:17', '2016-06-18 22:21:29', '2016-06-24 12:01:17'),
(129, 5, 70, '2016-06-24 12:01:17', '2016-06-18 22:21:29', '2016-06-24 12:01:17'),
(130, 5, 72, '2016-06-24 12:01:17', '2016-06-18 22:21:29', '2016-06-24 12:01:17'),
(131, 4, 54, NULL, '2016-06-18 22:24:21', '2016-06-18 22:24:21'),
(132, 4, 55, NULL, '2016-06-18 22:24:21', '2016-06-18 22:24:21'),
(133, 4, 56, NULL, '2016-06-18 22:24:21', '2016-06-18 22:24:21'),
(134, 1, 1, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(135, 1, 2, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(136, 1, 5, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(137, 1, 6, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(138, 1, 7, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(139, 1, 8, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(140, 1, 9, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(141, 1, 10, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(142, 1, 11, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(143, 1, 12, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(144, 1, 13, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(145, 1, 14, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(146, 1, 15, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(147, 1, 16, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(148, 1, 17, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(149, 1, 18, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(150, 1, 19, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(151, 1, 20, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(152, 1, 21, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(153, 1, 22, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(154, 1, 23, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(155, 1, 24, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(156, 1, 25, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(157, 1, 26, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(158, 1, 27, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(159, 1, 28, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(160, 1, 29, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(161, 1, 30, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(162, 1, 31, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(163, 1, 32, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(164, 1, 33, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(165, 1, 34, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(166, 1, 35, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(167, 1, 36, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(168, 1, 37, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(169, 1, 38, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(170, 1, 39, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(171, 1, 40, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(172, 1, 41, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(173, 1, 42, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(174, 1, 43, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(175, 1, 44, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(176, 1, 45, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(177, 1, 46, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(178, 1, 47, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(179, 1, 48, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(180, 1, 49, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(181, 1, 50, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(182, 1, 51, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(183, 1, 52, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(184, 1, 53, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(185, 1, 54, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(186, 1, 55, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(187, 1, 56, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(188, 1, 67, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(189, 1, 68, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(190, 1, 73, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(191, 1, 74, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(192, 1, 75, '2016-06-24 18:05:44', '2016-06-18 22:36:52', '2016-06-24 18:05:44'),
(193, 4, 53, NULL, '2016-06-18 22:36:52', '2016-06-18 22:36:52'),
(194, 5, 53, '2016-06-24 12:01:17', '2016-06-18 22:36:52', '2016-06-24 12:01:17'),
(195, 5, 53, NULL, '2016-06-24 12:01:17', '2016-06-24 12:01:17'),
(196, 5, 54, NULL, '2016-06-24 12:01:17', '2016-06-24 12:01:17'),
(197, 5, 55, NULL, '2016-06-24 12:01:17', '2016-06-24 12:01:17'),
(198, 5, 56, NULL, '2016-06-24 12:01:17', '2016-06-24 12:01:17'),
(199, 5, 70, NULL, '2016-06-24 12:01:17', '2016-06-24 12:01:17'),
(200, 5, 72, NULL, '2016-06-24 12:01:17', '2016-06-24 12:01:17'),
(201, 5, 78, NULL, '2016-06-24 12:01:17', '2016-06-24 12:01:17'),
(202, 6, 78, '2016-06-24 14:37:22', '2016-06-24 12:01:44', '2016-06-24 14:37:22'),
(203, 2, 36, '2016-06-24 18:17:49', '2016-06-24 13:58:18', '2016-06-24 18:17:49'),
(204, 2, 37, '2016-06-24 18:17:49', '2016-06-24 13:58:18', '2016-06-24 18:17:49'),
(205, 2, 38, '2016-06-24 18:17:49', '2016-06-24 13:58:18', '2016-06-24 18:17:49'),
(206, 2, 39, '2016-06-24 18:17:49', '2016-06-24 13:58:18', '2016-06-24 18:17:49'),
(207, 2, 40, '2016-06-24 18:17:49', '2016-06-24 13:58:18', '2016-06-24 18:17:49'),
(208, 2, 41, '2016-06-24 18:17:49', '2016-06-24 13:58:18', '2016-06-24 18:17:49'),
(209, 2, 42, '2016-06-24 18:17:49', '2016-06-24 13:58:18', '2016-06-24 18:17:49'),
(210, 2, 43, '2016-06-24 18:17:49', '2016-06-24 13:58:18', '2016-06-24 18:17:49'),
(211, 2, 44, '2016-06-24 18:17:49', '2016-06-24 13:58:18', '2016-06-24 18:17:49'),
(212, 2, 47, '2016-06-24 18:17:49', '2016-06-24 13:58:18', '2016-06-24 18:17:49'),
(213, 2, 67, '2016-06-24 18:17:49', '2016-06-24 13:58:18', '2016-06-24 18:17:49'),
(214, 2, 73, '2016-06-24 18:17:49', '2016-06-24 13:58:18', '2016-06-24 18:17:49'),
(215, 6, 78, NULL, '2016-06-24 14:37:22', '2016-06-24 14:37:22'),
(216, 1, 1, NULL, '2016-06-24 18:05:44', '2016-06-24 18:05:44'),
(217, 1, 2, NULL, '2016-06-24 18:05:44', '2016-06-24 18:05:44'),
(218, 1, 5, NULL, '2016-06-24 18:05:44', '2016-06-24 18:05:44'),
(219, 1, 6, NULL, '2016-06-24 18:05:44', '2016-06-24 18:05:44'),
(220, 1, 7, NULL, '2016-06-24 18:05:44', '2016-06-24 18:05:44'),
(221, 1, 8, NULL, '2016-06-24 18:05:44', '2016-06-24 18:05:44'),
(222, 1, 9, NULL, '2016-06-24 18:05:44', '2016-06-24 18:05:44'),
(223, 1, 10, NULL, '2016-06-24 18:05:44', '2016-06-24 18:05:44'),
(224, 1, 11, NULL, '2016-06-24 18:05:44', '2016-06-24 18:05:44'),
(225, 1, 12, NULL, '2016-06-24 18:05:44', '2016-06-24 18:05:44'),
(226, 1, 13, NULL, '2016-06-24 18:05:44', '2016-06-24 18:05:44'),
(227, 1, 14, NULL, '2016-06-24 18:05:44', '2016-06-24 18:05:44'),
(228, 1, 15, NULL, '2016-06-24 18:05:44', '2016-06-24 18:05:44'),
(229, 1, 16, NULL, '2016-06-24 18:05:44', '2016-06-24 18:05:44'),
(230, 1, 17, NULL, '2016-06-24 18:05:44', '2016-06-24 18:05:44'),
(231, 1, 18, NULL, '2016-06-24 18:05:44', '2016-06-24 18:05:44'),
(232, 1, 19, NULL, '2016-06-24 18:05:44', '2016-06-24 18:05:44'),
(233, 1, 20, NULL, '2016-06-24 18:05:44', '2016-06-24 18:05:44'),
(234, 1, 21, NULL, '2016-06-24 18:05:44', '2016-06-24 18:05:44'),
(235, 1, 22, NULL, '2016-06-24 18:05:44', '2016-06-24 18:05:44'),
(236, 1, 23, NULL, '2016-06-24 18:05:44', '2016-06-24 18:05:44'),
(237, 1, 24, NULL, '2016-06-24 18:05:44', '2016-06-24 18:05:44'),
(238, 1, 25, NULL, '2016-06-24 18:05:44', '2016-06-24 18:05:44'),
(239, 1, 26, NULL, '2016-06-24 18:05:44', '2016-06-24 18:05:44'),
(240, 1, 27, NULL, '2016-06-24 18:05:44', '2016-06-24 18:05:44'),
(241, 1, 28, NULL, '2016-06-24 18:05:44', '2016-06-24 18:05:44'),
(242, 1, 29, NULL, '2016-06-24 18:05:44', '2016-06-24 18:05:44'),
(243, 1, 30, NULL, '2016-06-24 18:05:44', '2016-06-24 18:05:44'),
(244, 1, 31, NULL, '2016-06-24 18:05:44', '2016-06-24 18:05:44'),
(245, 1, 32, NULL, '2016-06-24 18:05:44', '2016-06-24 18:05:44'),
(246, 1, 33, NULL, '2016-06-24 18:05:44', '2016-06-24 18:05:44'),
(247, 1, 34, NULL, '2016-06-24 18:05:45', '2016-06-24 18:05:45'),
(248, 1, 35, NULL, '2016-06-24 18:05:45', '2016-06-24 18:05:45'),
(249, 1, 36, NULL, '2016-06-24 18:05:45', '2016-06-24 18:05:45'),
(250, 1, 37, NULL, '2016-06-24 18:05:45', '2016-06-24 18:05:45'),
(251, 1, 38, NULL, '2016-06-24 18:05:45', '2016-06-24 18:05:45'),
(252, 1, 39, NULL, '2016-06-24 18:05:45', '2016-06-24 18:05:45'),
(253, 1, 40, NULL, '2016-06-24 18:05:45', '2016-06-24 18:05:45'),
(254, 1, 41, NULL, '2016-06-24 18:05:45', '2016-06-24 18:05:45'),
(255, 1, 42, NULL, '2016-06-24 18:05:45', '2016-06-24 18:05:45'),
(256, 1, 43, NULL, '2016-06-24 18:05:45', '2016-06-24 18:05:45'),
(257, 1, 44, NULL, '2016-06-24 18:05:45', '2016-06-24 18:05:45'),
(258, 1, 45, NULL, '2016-06-24 18:05:45', '2016-06-24 18:05:45'),
(259, 1, 46, NULL, '2016-06-24 18:05:45', '2016-06-24 18:05:45'),
(260, 1, 47, NULL, '2016-06-24 18:05:45', '2016-06-24 18:05:45'),
(261, 1, 48, NULL, '2016-06-24 18:05:45', '2016-06-24 18:05:45'),
(262, 1, 49, NULL, '2016-06-24 18:05:45', '2016-06-24 18:05:45'),
(263, 1, 50, NULL, '2016-06-24 18:05:45', '2016-06-24 18:05:45'),
(264, 1, 51, NULL, '2016-06-24 18:05:45', '2016-06-24 18:05:45'),
(265, 1, 52, NULL, '2016-06-24 18:05:45', '2016-06-24 18:05:45'),
(266, 1, 53, NULL, '2016-06-24 18:05:45', '2016-06-24 18:05:45'),
(267, 1, 54, NULL, '2016-06-24 18:05:45', '2016-06-24 18:05:45'),
(268, 1, 55, NULL, '2016-06-24 18:05:45', '2016-06-24 18:05:45'),
(269, 1, 56, NULL, '2016-06-24 18:05:45', '2016-06-24 18:05:45'),
(270, 1, 67, NULL, '2016-06-24 18:05:45', '2016-06-24 18:05:45'),
(271, 1, 68, NULL, '2016-06-24 18:05:45', '2016-06-24 18:05:45'),
(272, 1, 73, NULL, '2016-06-24 18:05:45', '2016-06-24 18:05:45'),
(273, 1, 74, NULL, '2016-06-24 18:05:45', '2016-06-24 18:05:45'),
(274, 1, 75, NULL, '2016-06-24 18:05:45', '2016-06-24 18:05:45'),
(275, 1, 79, NULL, '2016-06-24 18:05:45', '2016-06-24 18:05:45'),
(276, 2, 36, '2016-06-24 20:15:18', '2016-06-24 18:17:49', '2016-06-24 20:15:18'),
(277, 2, 37, '2016-06-24 20:15:18', '2016-06-24 18:17:49', '2016-06-24 20:15:18'),
(278, 2, 38, '2016-06-24 20:15:18', '2016-06-24 18:17:49', '2016-06-24 20:15:18'),
(279, 2, 39, '2016-06-24 20:15:18', '2016-06-24 18:17:49', '2016-06-24 20:15:18'),
(280, 2, 40, '2016-06-24 20:15:18', '2016-06-24 18:17:49', '2016-06-24 20:15:18'),
(281, 2, 41, '2016-06-24 20:15:18', '2016-06-24 18:17:49', '2016-06-24 20:15:18'),
(282, 2, 42, '2016-06-24 20:15:18', '2016-06-24 18:17:49', '2016-06-24 20:15:18'),
(283, 2, 43, '2016-06-24 20:15:18', '2016-06-24 18:17:49', '2016-06-24 20:15:18'),
(284, 2, 44, '2016-06-24 20:15:18', '2016-06-24 18:17:49', '2016-06-24 20:15:18'),
(285, 2, 47, '2016-06-24 20:15:18', '2016-06-24 18:17:49', '2016-06-24 20:15:18'),
(286, 2, 67, '2016-06-24 20:15:18', '2016-06-24 18:17:49', '2016-06-24 20:15:18'),
(287, 2, 73, '2016-06-24 20:15:18', '2016-06-24 18:17:49', '2016-06-24 20:15:18'),
(288, 2, 79, '2016-06-24 20:15:18', '2016-06-24 18:17:49', '2016-06-24 20:15:18'),
(289, 2, 36, NULL, '2016-06-24 20:15:18', '2016-06-24 20:15:18'),
(290, 2, 37, NULL, '2016-06-24 20:15:18', '2016-06-24 20:15:18'),
(291, 2, 38, NULL, '2016-06-24 20:15:18', '2016-06-24 20:15:18'),
(292, 2, 39, NULL, '2016-06-24 20:15:18', '2016-06-24 20:15:18'),
(293, 2, 40, NULL, '2016-06-24 20:15:18', '2016-06-24 20:15:18'),
(294, 2, 41, NULL, '2016-06-24 20:15:18', '2016-06-24 20:15:18'),
(295, 2, 42, NULL, '2016-06-24 20:15:18', '2016-06-24 20:15:18'),
(296, 2, 43, NULL, '2016-06-24 20:15:18', '2016-06-24 20:15:18'),
(297, 2, 47, NULL, '2016-06-24 20:15:18', '2016-06-24 20:15:18'),
(298, 2, 67, NULL, '2016-06-24 20:15:18', '2016-06-24 20:15:18'),
(299, 2, 73, NULL, '2016-06-24 20:15:18', '2016-06-24 20:15:18'),
(300, 2, 79, NULL, '2016-06-24 20:15:18', '2016-06-24 20:15:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE `Periodo` (
  `IdPeriodo` int(11) NOT NULL,
  `IdEspecialidad` int(11) DEFAULT NULL,
  `Vigente` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `periodo`
--

INSERT INTO `Periodo` (`IdPeriodo`, `IdEspecialidad`, `Vigente`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 5, 1, NULL, '2016-11-23 07:15:49', '2016-11-23 07:15:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodoxaspecto`
--

CREATE TABLE `PeriodoxAspecto` (
  `IdPeriodoxAspecto` int(11) NOT NULL,
  `IdPeriodo` int(11) DEFAULT NULL,
  `IdAspecto` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `periodoxaspecto`
--

INSERT INTO `PeriodoxAspecto` (`IdPeriodoxAspecto`, `IdPeriodo`, `IdAspecto`, `deleted_at`, `created_at`, `updated_at`) VALUES
(18, 2, 18, NULL, '2016-11-23 07:15:49', '2016-11-23 07:15:49'),
(19, 2, 19, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(20, 2, 29, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(21, 2, 27, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(22, 2, 28, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(23, 2, 31, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(24, 2, 22, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(25, 2, 23, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(26, 2, 24, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(27, 2, 20, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(28, 2, 21, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(29, 2, 26, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(30, 2, 33, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(31, 2, 34, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(32, 2, 30, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(33, 2, 25, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(34, 2, 32, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodoxcriterio`
--

CREATE TABLE `PeriodoxCriterio` (
  `IdPeriodoxCriterio` int(11) NOT NULL,
  `IdPeriodo` int(11) DEFAULT NULL,
  `IdCriterio` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `periodoxcriterio`
--

INSERT INTO `PeriodoxCriterio` (`IdPeriodoxCriterio`, `IdPeriodo`, `IdCriterio`, `deleted_at`, `created_at`, `updated_at`) VALUES
(28, 2, 37, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(29, 2, 38, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(30, 2, 39, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(31, 2, 58, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(32, 2, 51, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(33, 2, 52, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(34, 2, 53, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(35, 2, 54, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(36, 2, 55, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(37, 2, 56, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(38, 2, 57, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(39, 2, 60, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(40, 2, 42, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(41, 2, 43, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(42, 2, 44, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(43, 2, 45, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(44, 2, 40, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(45, 2, 41, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(46, 2, 50, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(47, 2, 62, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(48, 2, 63, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(49, 2, 59, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(50, 2, 47, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(51, 2, 48, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(52, 2, 46, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(53, 2, 49, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50'),
(54, 2, 61, NULL, '2016-11-23 07:15:50', '2016-11-23 07:15:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodoxfuente`
--

CREATE TABLE `PeriodoxFuente` (
  `IdPeriodo` int(11) NOT NULL,
  `IdFuenteMedicion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `periodoxfuente`
--

INSERT INTO `PeriodoxFuente` (`IdPeriodo`, `IdFuenteMedicion`) VALUES
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodoxobjetivo`
--

CREATE TABLE `PeriodoxObjetivo` (
  `IdPeriodoxObjetivo` int(11) NOT NULL,
  `IdPeriodo` int(11) DEFAULT NULL,
  `IdObjetivoEducacional` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `periodoxobjetivo`
--

INSERT INTO `PeriodoxObjetivo` (`IdPeriodoxObjetivo`, `IdPeriodo`, `IdObjetivoEducacional`, `deleted_at`, `created_at`, `updated_at`) VALUES
(4, 2, 14, NULL, '2016-11-23 07:15:49', '2016-11-23 07:15:49'),
(5, 2, 15, NULL, '2016-11-23 07:15:49', '2016-11-23 07:15:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodoxresultado`
--

CREATE TABLE `PeriodoxResultado` (
  `IdPeriodoxResultado` int(11) NOT NULL,
  `IdPeriodo` int(11) DEFAULT NULL,
  `IdResultadoEstudiantil` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `periodoxresultado`
--

INSERT INTO `PeriodoxResultado` (`IdPeriodoxResultado`, `IdPeriodo`, `IdResultadoEstudiantil`, `deleted_at`, `created_at`, `updated_at`) VALUES
(13, 2, 35, NULL, '2016-11-23 07:15:49', '2016-11-23 07:15:49'),
(14, 2, 42, NULL, '2016-11-23 07:15:49', '2016-11-23 07:15:49'),
(15, 2, 40, NULL, '2016-11-23 07:15:49', '2016-11-23 07:15:49'),
(16, 2, 41, NULL, '2016-11-23 07:15:49', '2016-11-23 07:15:49'),
(17, 2, 44, NULL, '2016-11-23 07:15:49', '2016-11-23 07:15:49'),
(18, 2, 37, NULL, '2016-11-23 07:15:49', '2016-11-23 07:15:49'),
(19, 2, 36, NULL, '2016-11-23 07:15:49', '2016-11-23 07:15:49'),
(20, 2, 39, NULL, '2016-11-23 07:15:49', '2016-11-23 07:15:49'),
(21, 2, 46, NULL, '2016-11-23 07:15:49', '2016-11-23 07:15:49'),
(22, 2, 43, NULL, '2016-11-23 07:15:49', '2016-11-23 07:15:49'),
(23, 2, 38, NULL, '2016-11-23 07:15:49', '2016-11-23 07:15:49'),
(24, 2, 45, NULL, '2016-11-23 07:15:49', '2016-11-23 07:15:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `phases`
--

CREATE TABLE `phases` (
  `id` int(10) UNSIGNED NOT NULL,
  `numero` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `idpspprocess` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planaccion`
--

CREATE TABLE `PlanAccion` (
  `IdPlanAccion` int(11) NOT NULL,
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
  `Estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planmejora`
--

CREATE TABLE `PlanMejora` (
  `IdPlanMejora` int(11) NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `num_entregables` int(11) NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `id_grupo` int(10) UNSIGNED NOT NULL,
  `id_area` int(10) UNSIGNED NOT NULL,
  `id_status` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pspcriterios`
--

CREATE TABLE `pspcriterios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_pspprocess` int(10) UNSIGNED NOT NULL,
  `peso` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pspdocuments`
--

CREATE TABLE `pspdocuments` (
  `id` int(10) UNSIGNED NOT NULL,
  `ruta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `titulo_plantilla` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ruta_plantilla` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `es_obligatorio` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `idstudent` int(11) NOT NULL,
  `idtemplate` int(10) UNSIGNED NOT NULL,
  `idtipoestado` int(10) UNSIGNED NOT NULL,
  `numerofase` int(11) DEFAULT NULL,
  `fecha_limite` date NOT NULL,
  `es_fisico` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pspgroups`
--

CREATE TABLE `pspgroups` (
  `id` int(10) UNSIGNED NOT NULL,
  `numero` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idpspprocess` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pspgroupsxpspprocesses`
--

CREATE TABLE `pspgroupsxpspprocesses` (
  `idpspgroup` int(10) UNSIGNED NOT NULL,
  `idpspprocess` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pspmeetings`
--

CREATE TABLE `pspmeetings` (
  `id` int(10) UNSIGNED NOT NULL,
  `idtipoestado` int(10) UNSIGNED NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `fecha` date NOT NULL,
  `idstudent` int(11) NOT NULL,
  `idsupervisor` int(10) UNSIGNED NOT NULL,
  `asistencia` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `lugar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `retroalimentacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tiporeunion` int(11) NOT NULL,
  `idfreehour` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pspprocesses`
--

CREATE TABLE `pspprocesses` (
  `id` int(10) UNSIGNED NOT NULL,
  `numero_Fases` int(11) NOT NULL,
  `numero_Plantillas` int(11) NOT NULL,
  `max_tam_plantilla` int(11) NOT NULL,
  `idespecialidad` int(11) NOT NULL,
  `idcurso` int(11) NOT NULL,
  `idCiclo` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pspprocessesxdocente`
--

CREATE TABLE `pspprocessesxdocente` (
  `id` int(10) UNSIGNED NOT NULL,
  `idpspprocess` int(10) UNSIGNED NOT NULL,
  `iddocente` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pspprocessesxphases`
--

CREATE TABLE `pspprocessesxphases` (
  `idphase` int(10) UNSIGNED NOT NULL,
  `idpspprocess` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pspprocessesxsupervisors`
--

CREATE TABLE `pspprocessesxsupervisors` (
  `id` int(10) UNSIGNED NOT NULL,
  `idpspprocess` int(10) UNSIGNED NOT NULL,
  `idsupervisor` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pspstudents`
--

CREATE TABLE `pspstudents` (
  `id` int(10) UNSIGNED NOT NULL,
  `idalumno` int(11) NOT NULL,
  `idtipoestado` int(10) UNSIGNED DEFAULT NULL,
  `idpspgroup` int(10) UNSIGNED DEFAULT NULL,
  `idespecialidad` int(11) DEFAULT NULL,
  `idsupervisor` int(10) UNSIGNED DEFAULT NULL,
  `idpspprocess` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pspstudentsxcriterios`
--

CREATE TABLE `pspstudentsxcriterios` (
  `id` int(10) UNSIGNED NOT NULL,
  `idpspstudent` int(10) UNSIGNED NOT NULL,
  `idcriterio` int(10) UNSIGNED NOT NULL,
  `nota` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pspstudentsxinscriptionfiles`
--

CREATE TABLE `pspstudentsxinscriptionfiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `idinscriptionfile` int(10) UNSIGNED NOT NULL,
  `idpspstudents` int(10) UNSIGNED NOT NULL,
  `acepta_terminos` int(11) NOT NULL,
  `nota_final` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `tiempo` int(10) UNSIGNED NOT NULL,
  `puntaje` double(8,2) UNSIGNED NOT NULL,
  `dificultad` int(10) UNSIGNED NOT NULL,
  `requisito` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rpta` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tamano_arch` int(10) UNSIGNED DEFAULT NULL,
  `extension_arch` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_especialidad` int(11) NOT NULL,
  `id_docente` int(11) NOT NULL,
  `id_competence` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reasons`
--

CREATE TABLE `reasons` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultadoestudiantil`
--

CREATE TABLE `ResultadoEstudiantil` (
  `IdResultadoEstudiantil` int(11) NOT NULL,
  `IdEspecialidad` int(11) DEFAULT NULL,
  `Identificador` char(1) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `CicloRegistro` varchar(10) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `resultadoestudiantil`
--

INSERT INTO `ResultadoEstudiantil` (`IdResultadoEstudiantil`, `IdEspecialidad`, `Identificador`, `Descripcion`, `CicloRegistro`, `deleted_at`, `created_at`, `updated_at`, `Estado`) VALUES
(35, 5, 'A', 'Aplicar los conocimientos relacionados con las matemáticas, ciencias e ingeniería.', NULL, NULL, '2016-11-23 06:38:44', '2016-11-23 07:15:51', 1),
(36, 5, 'B', 'Diseñar y conducir experimentos y analizar e interpretar los datos.', NULL, NULL, '2016-11-23 06:39:08', '2016-11-23 07:15:51', 1),
(37, 5, 'C', 'Diseñar sistemas, componentes o procesos que satisfagan las necesidades presentadas.', NULL, NULL, '2016-11-23 06:39:33', '2016-11-23 07:15:51', 1),
(38, 5, 'D', 'Trabajar en equipos multidisciplinarios.', NULL, NULL, '2016-11-23 06:39:47', '2016-11-23 07:15:51', 1),
(39, 5, 'E', 'Identificar, formular y resolver problemas de ingeniería.', NULL, NULL, '2016-11-23 06:40:11', '2016-11-23 07:15:51', 1),
(40, 5, 'F', 'Comprender su responsabilidad profesional y ética.', NULL, NULL, '2016-11-23 06:40:37', '2016-11-23 07:15:51', 1),
(41, 5, 'G', 'Comunicar efectivamente sus ideas de manera oral y escrita.', NULL, NULL, '2016-11-23 06:41:05', '2016-11-23 07:15:51', 1),
(42, 5, 'H', 'Comprender el impacto de la ingeniería en la solución de problemas globales y sociales basándose en la educación general recibida.', NULL, NULL, '2016-11-23 06:41:38', '2016-11-23 07:15:52', 1),
(43, 5, 'I', 'Reconocer la necesidad y se compromete con el aprendizaje a lo largo de toda la vida.', NULL, NULL, '2016-11-23 06:42:19', '2016-11-23 07:15:52', 1),
(44, 5, 'J', 'Conocer temas de actualidad.', NULL, NULL, '2016-11-23 06:42:38', '2016-11-23 07:15:52', 1),
(45, 5, 'K', 'Utilizar las técnicas, estrategias y herramientas de la ingeniería moderna necesarias para la práctica de la misma.', NULL, NULL, '2016-11-23 06:43:16', '2016-11-23 07:15:52', 1),
(46, 5, 'L', 'Practicar en proyectos informáticos teniendo en cuenta aspectos de ingeniería y gestión de proyectos.', NULL, NULL, '2016-11-23 06:43:50', '2016-11-23 07:15:52', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultadoxobjetivo`
--

CREATE TABLE `ResultadoxObjetivo` (
  `IdResultadoxObjetivo` int(11) NOT NULL,
  `IdResultadoEstudiantil` int(11) DEFAULT NULL,
  `IdObjetivoEducacional` int(11) DEFAULT NULL,
  `IdPeriodo` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `resultadoxobjetivo`
--

INSERT INTO `ResultadoxObjetivo` (`IdResultadoxObjetivo`, `IdResultadoEstudiantil`, `IdObjetivoEducacional`, `IdPeriodo`, `deleted_at`, `created_at`, `updated_at`) VALUES
(78, 35, 15, NULL, NULL, '2016-11-23 06:38:44', '2016-11-23 06:38:44'),
(79, 36, 14, NULL, NULL, '2016-11-23 06:39:09', '2016-11-23 06:39:09'),
(80, 36, 15, NULL, NULL, '2016-11-23 06:39:09', '2016-11-23 06:39:09'),
(81, 37, 14, NULL, NULL, '2016-11-23 06:39:33', '2016-11-23 06:39:33'),
(82, 37, 15, NULL, NULL, '2016-11-23 06:39:33', '2016-11-23 06:39:33'),
(83, 38, 15, NULL, NULL, '2016-11-23 06:39:47', '2016-11-23 06:39:47'),
(84, 39, 14, NULL, NULL, '2016-11-23 06:40:11', '2016-11-23 06:40:11'),
(85, 40, 14, NULL, NULL, '2016-11-23 06:40:37', '2016-11-23 06:40:37'),
(86, 40, 15, NULL, NULL, '2016-11-23 06:40:37', '2016-11-23 06:40:37'),
(87, 41, 15, NULL, NULL, '2016-11-23 06:41:05', '2016-11-23 06:41:05'),
(88, 42, 14, NULL, NULL, '2016-11-23 06:41:38', '2016-11-23 06:41:38'),
(89, 42, 15, NULL, NULL, '2016-11-23 06:41:39', '2016-11-23 06:41:39'),
(90, 43, 15, NULL, NULL, '2016-11-23 06:42:19', '2016-11-23 06:42:19'),
(91, 45, 14, NULL, NULL, '2016-11-23 06:43:16', '2016-11-23 06:43:16'),
(92, 45, 15, NULL, NULL, '2016-11-23 06:43:16', '2016-11-23 06:43:16'),
(93, 46, 15, NULL, NULL, '2016-11-23 06:43:50', '2016-11-23 06:43:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schedulesxcycles`
--

CREATE TABLE `schedulesxcycles` (
  `idschedules` int(11) NOT NULL,
  `idcycles` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schedule_meetings`
--

CREATE TABLE `schedule_meetings` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `idfase` int(10) UNSIGNED DEFAULT NULL,
  `idpspprocess` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE `Seguimiento` (
  `IdSeguimiento` int(11) NOT NULL,
  `IdPlanMejora` int(11) DEFAULT NULL,
  `IdCicloAcademico` int(11) DEFAULT NULL,
  `IdDocente` int(11) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  `Comentario` varchar(200) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `skills`
--

CREATE TABLE `skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `skillsxstudents`
--

CREATE TABLE `skillsxstudents` (
  `idstudent` int(11) NOT NULL,
  `idcriterio` int(10) UNSIGNED NOT NULL,
  `nota` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `statuses`
--

CREATE TABLE `statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_estado` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `studentxdeliverables`
--

CREATE TABLE `studentxdeliverables` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_estudiante` int(10) UNSIGNED NOT NULL,
  `id_entregable` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `studentxgroups`
--

CREATE TABLE `studentxgroups` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_estudiante` int(10) UNSIGNED NOT NULL,
  `id_grupo` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `studentxprojects`
--

CREATE TABLE `studentxprojects` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_estudiante` int(10) UNSIGNED NOT NULL,
  `id_proyecto` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sugerencia`
--

CREATE TABLE `Sugerencia` (
  `IdSugerencia` int(11) NOT NULL,
  `IdPlanMejora` int(11) DEFAULT NULL,
  `IdDocente` int(11) DEFAULT NULL,
  `IdEspecialidad` int(11) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  `Titulo` varchar(100) DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supervisors`
--

CREATE TABLE `supervisors` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombres` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido_paterno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido_materno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codigo_trabajador` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idfaculty` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `vigente` int(11) NOT NULL,
  `idpspprocess` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teacherxcompetences`
--

CREATE TABLE `teacherxcompetences` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_docente` int(11) NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `id_competence` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teacherxdeliverables`
--

CREATE TABLE `teacherxdeliverables` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `id_entregable` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teacherxgroups`
--

CREATE TABLE `teacherxgroups` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `id_grupo` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teacherxprojects`
--

CREATE TABLE `teacherxprojects` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `id_proyecto` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teacherxtutstudentxevaluations`
--

CREATE TABLE `teacherxtutstudentxevaluations` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_tutstudentxevaluation` int(10) UNSIGNED NOT NULL,
  `id_docente` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `templates`
--

CREATE TABLE `templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `idphase` int(10) UNSIGNED NOT NULL,
  `idtipoestado` int(10) UNSIGNED NOT NULL,
  `idprofesor` int(11) DEFAULT NULL,
  `idsupervisor` int(10) UNSIGNED DEFAULT NULL,
  `idadmin` int(11) DEFAULT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numerofase` int(11) DEFAULT NULL,
  `ruta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoplanmejora`
--

CREATE TABLE `TipoPlanMejora` (
  `IdTipoPlanMejora` int(11) NOT NULL,
  `IdEspecialidad` int(11) DEFAULT NULL,
  `Codigo` varchar(10) DEFAULT NULL,
  `Tema` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(300) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `topics`
--

CREATE TABLE `topics` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutmeetings`
--

CREATE TABLE `tutmeetings` (
  `id` int(10) UNSIGNED NOT NULL,
  `inicio` datetime DEFAULT NULL,
  `fin` datetime DEFAULT NULL,
  `duracion` int(10) UNSIGNED DEFAULT NULL,
  `no_programada` int(10) UNSIGNED DEFAULT NULL,
  `observacion` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lugar` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adicional` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `creador` int(10) UNSIGNED NOT NULL,
  `estado` int(10) UNSIGNED NOT NULL,
  `id_topic` int(10) UNSIGNED DEFAULT NULL,
  `id_reason` int(10) UNSIGNED DEFAULT NULL,
  `id_tutstudent` int(10) UNSIGNED NOT NULL,
  `id_docente` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutorships`
--

CREATE TABLE `tutorships` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_tutor` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `id_suplente` int(11) NOT NULL,
  `id_alumno` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutschedules`
--

CREATE TABLE `tutschedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `dia` int(10) UNSIGNED DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `id_docente` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutstudents`
--

CREATE TABLE `tutstudents` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `codigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ape_paterno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ape_materno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_especialidad` int(11) DEFAULT NULL,
  `id_tutoria` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutstudentxevaluations`
--

CREATE TABLE `tutstudentxevaluations` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_tutstudent` int(10) UNSIGNED NOT NULL,
  `id_evaluation` int(10) UNSIGNED NOT NULL,
  `intentos` int(10) UNSIGNED NOT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `inicio` datetime DEFAULT NULL,
  `corregida` int(10) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usersxprofiles`
--

CREATE TABLE `usersxprofiles` (
  `iduser` int(11) NOT NULL,
  `idprofile` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `Usuario` (
  `IdUsuario` int(11) NOT NULL,
  `IdPerfil` int(11) DEFAULT NULL,
  `Usuario` varchar(20) DEFAULT NULL,
  `Contrasena` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `Usuario` (`IdUsuario`, `IdPerfil`, `Usuario`, `Contrasena`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 3, 'admin', '$2y$10$Lr3YPtN8NaNBVNHtrK0MBO5Yf6ZiyMJicGTYDASKXrSrnnBWgFz/.', NULL, '2016-05-28 02:56:00', '2016-06-07 10:30:17'),
(14, 1, '19960275', '$2y$10$xbZpkd3MctO6JgT9uhnnBO33dOCsrUAtt6z8DnhGeW2VaQmxe1tY.', NULL, '2016-11-23 06:34:27', '2016-11-23 06:36:04'),
(15, 2, '00009299', '$2y$10$ubgaveiu8G/9OI2fxN33Ye9j16mWnsDzgMv53GH3yN8z2yeTSsh.m', NULL, '2016-11-23 06:35:24', '2016-11-23 06:35:24');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accion`
--
ALTER TABLE `Accion`
  ADD PRIMARY KEY (`IdAccion`);

--
-- Indices de la tabla `acreditador`
--
ALTER TABLE `Acreditador`
  ADD PRIMARY KEY (`IdAcreditador`),
  ADD KEY `IdEspecialidad` (`IdEspecialidad`),
  ADD KEY `IdUsuario` (`IdUsuario`);

--
-- Indices de la tabla `alternatives`
--
ALTER TABLE `alternatives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternatives_id_question_foreign` (`id_question`);

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `Alumno`
  ADD PRIMARY KEY (`IdAlumno`),
  ADD KEY `IdHorario` (`IdHorario`),
  ADD KEY `IdUsuario` (`IdUsuario`);

--
-- Indices de la tabla `aporte`
--
ALTER TABLE `Aporte`
  ADD PRIMARY KEY (`IdAporte`),
  ADD KEY `IdResultadoEstudiantil` (`IdResultadoEstudiantil`),
  ADD KEY `IdCurso` (`IdCurso`),
  ADD KEY `IdCicloAcademico` (`IdCicloAcademico`);

--
-- Indices de la tabla `archivoentrada`
--
ALTER TABLE `ArchivoEntrada`
  ADD PRIMARY KEY (`IdArchivoEntrada`);

--
-- Indices de la tabla `archivoentradaplan`
--
ALTER TABLE `ArchivoEntradaPlan`
  ADD PRIMARY KEY (`IdArchivoEntrada`);

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aspecto`
--
ALTER TABLE `Aspecto`
  ADD PRIMARY KEY (`IdAspecto`),
  ADD KEY `IdResultadoEstudiantil` (`IdResultadoEstudiantil`);

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `Calificacion`
  ADD PRIMARY KEY (`IdCalificacion`),
  ADD KEY `IdAlumno` (`IdAlumno`),
  ADD KEY `IdHorario` (`IdHorario`),
  ADD KEY `IdCriterio` (`IdCriterio`);

--
-- Indices de la tabla `cicloacademico`
--
ALTER TABLE `CicloAcademico`
  ADD PRIMARY KEY (`IdCicloAcademico`);

--
-- Indices de la tabla `cicloxaspecto`
--
ALTER TABLE `CicloxAspecto`
  ADD PRIMARY KEY (`IdCicloxAspecto`),
  ADD KEY `IdCicloAcademico` (`IdCicloAcademico`),
  ADD KEY `IdAspecto` (`IdAspecto`);

--
-- Indices de la tabla `cicloxcriterio`
--
ALTER TABLE `CicloxCriterio`
  ADD PRIMARY KEY (`IdCicloxCriterio`),
  ADD KEY `IdCriterio` (`IdCriterio`),
  ADD KEY `IdCicloAcademico` (`IdCicloAcademico`);

--
-- Indices de la tabla `cicloxespecialidad`
--
ALTER TABLE `CicloxEspecialidad`
  ADD PRIMARY KEY (`IdCicloAcademico`),
  ADD KEY `IdEspecialidad` (`IdEspecialidad`),
  ADD KEY `IdPeriodo` (`IdPeriodo`),
  ADD KEY `IdDocente` (`IdDocente`),
  ADD KEY `IdCiclo` (`IdCiclo`);

--
-- Indices de la tabla `cicloxresultado`
--
ALTER TABLE `CicloxResultado`
  ADD PRIMARY KEY (`IdCicloxResultado`),
  ADD KEY `IdCicloAcademico` (`IdCicloAcademico`),
  ADD KEY `IdResultadoEstudiantil` (`IdResultadoEstudiantil`);

--
-- Indices de la tabla `competences`
--
ALTER TABLE `competences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `competences_id_especialidad_foreign` (`id_especialidad`);

--
-- Indices de la tabla `competencextutstudentxevaluations`
--
ALTER TABLE `competencextutstudentxevaluations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `competencextutstudentxevaluations_id_tutev_foreign` (`id_tutev`),
  ADD KEY `competencextutstudentxevaluations_id_competence_foreign` (`id_competence`);

--
-- Indices de la tabla `confespecialidad`
--
ALTER TABLE `ConfEspecialidad`
  ADD PRIMARY KEY (`IdConfEspecialidad`),
  ADD KEY `IdEspecialidad` (`IdEspecialidad`),
  ADD KEY `IdPeriodo` (`IdPeriodo`),
  ADD KEY `IdCicloInicio` (`IdCicloInicio`),
  ADD KEY `IdCicloFin` (`IdCicloFin`);

--
-- Indices de la tabla `criterio`
--
ALTER TABLE `Criterio`
  ADD PRIMARY KEY (`IdCriterio`),
  ADD KEY `IdAspecto` (`IdAspecto`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `Curso`
  ADD PRIMARY KEY (`IdCurso`),
  ADD KEY `IdEspecialidad` (`IdEspecialidad`);

--
-- Indices de la tabla `cursoxciclo`
--
ALTER TABLE `CursoxCiclo`
  ADD PRIMARY KEY (`IdCursoxCiclo`),
  ADD KEY `IdCurso` (`IdCurso`),
  ADD KEY `IdCicloAcademico` (`IdCicloAcademico`);

--
-- Indices de la tabla `cursoxcicloxaspecto`
--
ALTER TABLE `CursoxCicloxAspecto`
  ADD PRIMARY KEY (`IdCursoxCicloxAspecto`),
  ADD KEY `IdCursoxCiclo` (`IdCursoxCiclo`),
  ADD KEY `IdAspecto` (`IdAspecto`);

--
-- Indices de la tabla `cursoxcicloxcriterio`
--
ALTER TABLE `CursoxCicloxCriterio`
  ADD PRIMARY KEY (`IdCursoxCicloxCriterio`),
  ADD KEY `IdCursoxCiclo` (`IdCursoxCiclo`),
  ADD KEY `IdCriterio` (`IdCriterio`);

--
-- Indices de la tabla `cursoxcicloxresultado`
--
ALTER TABLE `CursoxCicloxResultado`
  ADD PRIMARY KEY (`IdCursoxCicloxResultado`),
  ADD KEY `IdResultadoEstudiantil` (`IdResultadoEstudiantil`),
  ADD KEY `IdCursoxCiclo` (`IdCursoxCiclo`);

--
-- Indices de la tabla `cursoxdocente`
--
ALTER TABLE `CursoxDocente`
  ADD PRIMARY KEY (`IdCursoxDocente`),
  ADD KEY `IdDocente` (`IdDocente`),
  ADD KEY `IdCurso` (`IdCurso`);

--
-- Indices de la tabla `cycles`
--
ALTER TABLE `cycles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `deliverables`
--
ALTER TABLE `deliverables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deliverables_id_proyecto_foreign` (`id_proyecto`),
  ADD KEY `deliverables_id_padre_foreign` (`id_padre`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `Docente`
  ADD PRIMARY KEY (`IdDocente`,`Vigente`),
  ADD KEY `IdEspecialidad` (`IdEspecialidad`),
  ADD KEY `IdUsuario` (`IdUsuario`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `Especialidad`
  ADD PRIMARY KEY (`IdEspecialidad`),
  ADD KEY `Especialidad_ibfk_1` (`IdDocente`);

--
-- Indices de la tabla `evalternatives`
--
ALTER TABLE `evalternatives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evalternatives_id_evquestion_foreign` (`id_evquestion`);

--
-- Indices de la tabla `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluations_id_especialidad_foreign` (`id_especialidad`);

--
-- Indices de la tabla `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_id_grupo_foreign` (`id_grupo`);

--
-- Indices de la tabla `evidenciacurso`
--
ALTER TABLE `EvidenciaCurso`
  ADD PRIMARY KEY (`IdEvidenciaCurso`),
  ADD KEY `IdHorario` (`IdHorario`),
  ADD KEY `IdArchivoEntrada` (`IdArchivoEntrada`);

--
-- Indices de la tabla `evidenciamedicion`
--
ALTER TABLE `EvidenciaMedicion`
  ADD PRIMARY KEY (`IdEvidenciaMedicion`),
  ADD KEY `IdHorario` (`IdHorario`),
  ADD KEY `IdArchivoEntrada` (`IdArchivoEntrada`),
  ADD KEY `IdFuentexCursoxCriterioxCiclo` (`IdFuentexCursoxCriterioxCiclo`);

--
-- Indices de la tabla `evquestions`
--
ALTER TABLE `evquestions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evquestions_id_docente_foreign` (`id_docente`),
  ADD KEY `evquestions_id_competence_foreign` (`id_competence`),
  ADD KEY `evquestions_id_evaluation_foreign` (`id_evaluation`);

--
-- Indices de la tabla `evquestionxstudentxdocentes`
--
ALTER TABLE `evquestionxstudentxdocentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evquestionxstudentxdocentes_id_tutstudent_foreign` (`id_tutstudent`),
  ADD KEY `evquestionxstudentxdocentes_id_evquestion_foreign` (`id_evquestion`),
  ADD KEY `evquestionxstudentxdocentes_id_evaluation_foreign` (`id_evaluation`),
  ADD KEY `evquestionxstudentxdocentes_id_docente_foreign` (`id_docente`);

--
-- Indices de la tabla `freehours`
--
ALTER TABLE `freehours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `freehours_idsupervisor_foreign` (`idsupervisor`),
  ADD KEY `freehours_idpspprocess_foreign` (`idpspprocess`);

--
-- Indices de la tabla `fuentemedicion`
--
ALTER TABLE `FuenteMedicion`
  ADD PRIMARY KEY (`IdFuenteMedicion`),
  ADD KEY `IdEspecialidad` (`IdEspecialidad`);

--
-- Indices de la tabla `fuentexcursoxcriterioxciclo`
--
ALTER TABLE `FuentexCursoxCriterioxCiclo`
  ADD PRIMARY KEY (`IdFuentexCursoxCriterioxCiclo`),
  ADD KEY `IdFuenteMedicion` (`IdFuenteMedicion`),
  ADD KEY `IdCriterio` (`IdCriterio`),
  ADD KEY `IdCurso` (`IdCurso`),
  ADD KEY `IdCicloAcademico` (`IdCicloAcademico`);

--
-- Indices de la tabla `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groups_id_especialidad_foreign` (`id_especialidad`),
  ADD KEY `groups_id_lider_foreign` (`id_lider`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `Horario`
  ADD PRIMARY KEY (`IdHorario`),
  ADD KEY `IdCursoxCiclo` (`IdCursoxCiclo`);

--
-- Indices de la tabla `horarioxaspecto`
--
ALTER TABLE `HorarioxAspecto`
  ADD PRIMARY KEY (`IdHorarioxAspecto`),
  ADD KEY `IdHorario` (`IdHorario`),
  ADD KEY `IdAspecto` (`IdAspecto`);

--
-- Indices de la tabla `horarioxcriterio`
--
ALTER TABLE `HorarioxCriterio`
  ADD PRIMARY KEY (`IdHorarioxCriterio`),
  ADD KEY `IdHorario` (`IdHorario`),
  ADD KEY `IdCriterio` (`IdCriterio`);

--
-- Indices de la tabla `horarioxdocente`
--
ALTER TABLE `HorarioxDocente`
  ADD PRIMARY KEY (`IdHorarioxDocente`),
  ADD KEY `IdHorario` (`IdHorario`),
  ADD KEY `IdDocente` (`IdDocente`);

--
-- Indices de la tabla `horarioxresultado`
--
ALTER TABLE `HorarioxResultado`
  ADD PRIMARY KEY (`IdHorarioxResultado`),
  ADD KEY `IdHorario` (`IdHorario`),
  ADD KEY `IdResultadoEstudiantil` (`IdResultadoEstudiantil`);

--
-- Indices de la tabla `informe`
--
ALTER TABLE `Informe`
  ADD PRIMARY KEY (`IdInforme`),
  ADD KEY `IdHorario` (`IdHorario`);

--
-- Indices de la tabla `inscriptionfiles`
--
ALTER TABLE `inscriptionfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `invdocuments`
--
ALTER TABLE `invdocuments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invdocuments_id_investigador_foreign` (`id_investigador`),
  ADD KEY `invdocuments_id_entregable_foreign` (`id_entregable`);

--
-- Indices de la tabla `investigators`
--
ALTER TABLE `investigators`
  ADD PRIMARY KEY (`id`),
  ADD KEY `investigators_id_especialidad_foreign` (`id_especialidad`),
  ADD KEY `investigators_id_area_foreign` (`id_area`);

--
-- Indices de la tabla `investigatorxdeliverables`
--
ALTER TABLE `investigatorxdeliverables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `investigatorxdeliverables_id_investigador_foreign` (`id_investigador`),
  ADD KEY `investigatorxdeliverables_id_entregable_foreign` (`id_entregable`);

--
-- Indices de la tabla `investigatorxgroups`
--
ALTER TABLE `investigatorxgroups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `investigatorxgroups_id_investigador_foreign` (`id_investigador`),
  ADD KEY `investigatorxgroups_id_grupo_foreign` (`id_grupo`);

--
-- Indices de la tabla `investigatorxprojects`
--
ALTER TABLE `investigatorxprojects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `investigatorxprojects_id_investigador_foreign` (`id_investigador`),
  ADD KEY `investigatorxprojects_id_proyecto_foreign` (`id_proyecto`);

--
-- Indices de la tabla `nivelcriterio`
--
ALTER TABLE `NivelCriterio`
  ADD PRIMARY KEY (`IdNivelCriterio`),
  ADD KEY `IdCriterio` (`IdCriterio`),
  ADD KEY `IdPeriodo` (`IdPeriodo`);

--
-- Indices de la tabla `noavailabilitys`
--
ALTER TABLE `noavailabilitys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `noavailabilitys_id_docente_foreign` (`id_docente`);

--
-- Indices de la tabla `objetivoeducacional`
--
ALTER TABLE `ObjetivoEducacional`
  ADD PRIMARY KEY (`IdObjetivoEducacional`),
  ADD KEY `IdEspecialidad` (`IdEspecialidad`);

--
-- Indices de la tabla `parameters`
--
ALTER TABLE `parameters`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `passwordresets`
--
ALTER TABLE `PasswordResets`
  ADD KEY `PasswordResets_token_index` (`token`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `Perfil`
  ADD PRIMARY KEY (`IdPerfil`);

--
-- Indices de la tabla `perfilxaccion`
--
ALTER TABLE `PerfilxAccion`
  ADD PRIMARY KEY (`IdPerfilxAccion`),
  ADD KEY `IdPerfil` (`IdPerfil`),
  ADD KEY `IdAccion` (`IdAccion`);

--
-- Indices de la tabla `periodo`
--
ALTER TABLE `Periodo`
  ADD PRIMARY KEY (`IdPeriodo`),
  ADD KEY `IdEspecialidad` (`IdEspecialidad`);

--
-- Indices de la tabla `periodoxaspecto`
--
ALTER TABLE `PeriodoxAspecto`
  ADD PRIMARY KEY (`IdPeriodoxAspecto`),
  ADD KEY `IdAspecto` (`IdAspecto`),
  ADD KEY `IdPeriodo` (`IdPeriodo`);

--
-- Indices de la tabla `periodoxcriterio`
--
ALTER TABLE `PeriodoxCriterio`
  ADD PRIMARY KEY (`IdPeriodoxCriterio`),
  ADD KEY `IdCriterio` (`IdCriterio`),
  ADD KEY `IdPeriodo` (`IdPeriodo`);

--
-- Indices de la tabla `periodoxfuente`
--
ALTER TABLE `PeriodoxFuente`
  ADD KEY `IdFuenteMedicion` (`IdFuenteMedicion`),
  ADD KEY `IdPeriodo` (`IdPeriodo`);

--
-- Indices de la tabla `periodoxobjetivo`
--
ALTER TABLE `PeriodoxObjetivo`
  ADD PRIMARY KEY (`IdPeriodoxObjetivo`),
  ADD KEY `IdObjetivoEducacional` (`IdObjetivoEducacional`),
  ADD KEY `IdPeriodo` (`IdPeriodo`);

--
-- Indices de la tabla `periodoxresultado`
--
ALTER TABLE `PeriodoxResultado`
  ADD PRIMARY KEY (`IdPeriodoxResultado`),
  ADD KEY `IdResultadoEstudiantil` (`IdResultadoEstudiantil`),
  ADD KEY `IdPeriodo` (`IdPeriodo`);

--
-- Indices de la tabla `phases`
--
ALTER TABLE `phases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phases_idpspprocess_foreign` (`idpspprocess`);

--
-- Indices de la tabla `planaccion`
--
ALTER TABLE `PlanAccion`
  ADD PRIMARY KEY (`IdPlanAccion`),
  ADD KEY `IdPlanMejora` (`IdPlanMejora`),
  ADD KEY `IdDocente` (`IdDocente`),
  ADD KEY `IdCicloAcademico` (`IdCicloAcademico`),
  ADD KEY `PlanAccion_idfk_4` (`IdArchivoEntrada`);

--
-- Indices de la tabla `planmejora`
--
ALTER TABLE `PlanMejora`
  ADD PRIMARY KEY (`IdPlanMejora`),
  ADD KEY `IdEspecialidad` (`IdEspecialidad`),
  ADD KEY `IdTipoPlanMejora` (`IdTipoPlanMejora`),
  ADD KEY `IdArchivoEntrada` (`IdArchivoEntrada`),
  ADD KEY `IdDocente` (`IdDocente`);

--
-- Indices de la tabla `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_id_grupo_foreign` (`id_grupo`),
  ADD KEY `projects_id_area_foreign` (`id_area`),
  ADD KEY `projects_id_status_foreign` (`id_status`);

--
-- Indices de la tabla `pspcriterios`
--
ALTER TABLE `pspcriterios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pspcriterios_id_pspprocess_foreign` (`id_pspprocess`);

--
-- Indices de la tabla `pspdocuments`
--
ALTER TABLE `pspdocuments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pspdocuments_idstudent_foreign` (`idstudent`),
  ADD KEY `pspdocuments_idtemplate_foreign` (`idtemplate`),
  ADD KEY `pspdocuments_idtipoestado_foreign` (`idtipoestado`);

--
-- Indices de la tabla `pspgroups`
--
ALTER TABLE `pspgroups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pspgroups_idpspprocess_foreign` (`idpspprocess`);

--
-- Indices de la tabla `pspgroupsxpspprocesses`
--
ALTER TABLE `pspgroupsxpspprocesses`
  ADD KEY `pspgroupsxpspprocesses_idpspgroup_foreign` (`idpspgroup`),
  ADD KEY `pspgroupsxpspprocesses_idpspprocess_foreign` (`idpspprocess`);

--
-- Indices de la tabla `pspmeetings`
--
ALTER TABLE `pspmeetings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pspmeetings_idstudent_foreign` (`idstudent`),
  ADD KEY `pspmeetings_idsupervisor_foreign` (`idsupervisor`),
  ADD KEY `pspmeetings_idtipoestado_foreign` (`idtipoestado`),
  ADD KEY `pspmeetings_idfreehour_foreign` (`idfreehour`);

--
-- Indices de la tabla `pspprocesses`
--
ALTER TABLE `pspprocesses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pspprocesses_idespecialidad_foreign` (`idespecialidad`),
  ADD KEY `pspprocesses_idcurso_foreign` (`idcurso`);

--
-- Indices de la tabla `pspprocessesxdocente`
--
ALTER TABLE `pspprocessesxdocente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pspprocessesxdocente_idpspprocess_foreign` (`idpspprocess`),
  ADD KEY `pspprocessesxdocente_iddocente_foreign` (`iddocente`);

--
-- Indices de la tabla `pspprocessesxphases`
--
ALTER TABLE `pspprocessesxphases`
  ADD KEY `pspprocessesxphases_idphase_foreign` (`idphase`),
  ADD KEY `pspprocessesxphases_idpspprocess_foreign` (`idpspprocess`);

--
-- Indices de la tabla `pspprocessesxsupervisors`
--
ALTER TABLE `pspprocessesxsupervisors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pspprocessesxsupervisors_idpspprocess_foreign` (`idpspprocess`),
  ADD KEY `pspprocessesxsupervisors_idsupervisor_foreign` (`idsupervisor`);

--
-- Indices de la tabla `pspstudents`
--
ALTER TABLE `pspstudents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pspstudents_idalumno_foreign` (`idalumno`),
  ADD KEY `pspstudents_idtipoestado_foreign` (`idtipoestado`),
  ADD KEY `pspstudents_idpspgroup_foreign` (`idpspgroup`),
  ADD KEY `pspstudents_idespecialidad_foreign` (`idespecialidad`),
  ADD KEY `pspstudents_idsupervisor_foreign` (`idsupervisor`),
  ADD KEY `pspstudents_idpspprocess_foreign` (`idpspprocess`);

--
-- Indices de la tabla `pspstudentsxcriterios`
--
ALTER TABLE `pspstudentsxcriterios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pspstudentsxcriterios_idpspstudent_foreign` (`idpspstudent`),
  ADD KEY `pspstudentsxcriterios_idcriterio_foreign` (`idcriterio`);

--
-- Indices de la tabla `pspstudentsxinscriptionfiles`
--
ALTER TABLE `pspstudentsxinscriptionfiles`
  ADD KEY `pspstudentsxinscriptionfiles_idinscriptionfile_foreign` (`idinscriptionfile`),
  ADD KEY `pspstudentsxinscriptionfiles_idpspstudents_foreign` (`idpspstudents`);

--
-- Indices de la tabla `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_id_especialidad_foreign` (`id_especialidad`),
  ADD KEY `questions_id_docente_foreign` (`id_docente`),
  ADD KEY `questions_id_competence_foreign` (`id_competence`);

--
-- Indices de la tabla `reasons`
--
ALTER TABLE `reasons`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `resultadoestudiantil`
--
ALTER TABLE `ResultadoEstudiantil`
  ADD PRIMARY KEY (`IdResultadoEstudiantil`),
  ADD KEY `IdEspecialidad` (`IdEspecialidad`);

--
-- Indices de la tabla `resultadoxobjetivo`
--
ALTER TABLE `ResultadoxObjetivo`
  ADD PRIMARY KEY (`IdResultadoxObjetivo`),
  ADD KEY `IdResultadoEstudiantil` (`IdResultadoEstudiantil`),
  ADD KEY `IdPeriodo` (`IdPeriodo`),
  ADD KEY `IdObjetivoEducacional` (`IdObjetivoEducacional`);

--
-- Indices de la tabla `schedulesxcycles`
--
ALTER TABLE `schedulesxcycles`
  ADD KEY `schedulesxcycles_idschedules_foreign` (`idschedules`),
  ADD KEY `schedulesxcycles_idcycles_foreign` (`idcycles`);

--
-- Indices de la tabla `schedule_meetings`
--
ALTER TABLE `schedule_meetings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedule_meetings_idfase_foreign` (`idfase`),
  ADD KEY `schedule_meetings_idpspprocess_foreign` (`idpspprocess`);

--
-- Indices de la tabla `seguimiento`
--
ALTER TABLE `Seguimiento`
  ADD PRIMARY KEY (`IdSeguimiento`),
  ADD KEY `IdPlanMejora` (`IdPlanMejora`),
  ADD KEY `IdDocente` (`IdDocente`),
  ADD KEY `IdCicloAcademico` (`IdCicloAcademico`);

--
-- Indices de la tabla `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `skillsxstudents`
--
ALTER TABLE `skillsxstudents`
  ADD KEY `skillsxstudents_idstudent_foreign` (`idstudent`),
  ADD KEY `skillsxstudents_idcriterio_foreign` (`idcriterio`);

--
-- Indices de la tabla `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `studentxdeliverables`
--
ALTER TABLE `studentxdeliverables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentxdeliverables_id_estudiante_foreign` (`id_estudiante`),
  ADD KEY `studentxdeliverables_id_entregable_foreign` (`id_entregable`);

--
-- Indices de la tabla `studentxgroups`
--
ALTER TABLE `studentxgroups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentxgroups_id_estudiante_foreign` (`id_estudiante`),
  ADD KEY `studentxgroups_id_grupo_foreign` (`id_grupo`);

--
-- Indices de la tabla `studentxprojects`
--
ALTER TABLE `studentxprojects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentxprojects_id_estudiante_foreign` (`id_estudiante`),
  ADD KEY `studentxprojects_id_proyecto_foreign` (`id_proyecto`);

--
-- Indices de la tabla `sugerencia`
--
ALTER TABLE `Sugerencia`
  ADD PRIMARY KEY (`IdSugerencia`),
  ADD KEY `IdDocente` (`IdDocente`),
  ADD KEY `IdPlanMejora` (`IdPlanMejora`),
  ADD KEY `IdEspecialidad` (`IdEspecialidad`);

--
-- Indices de la tabla `supervisors`
--
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `supervisors_codigo_trabajador_unique` (`codigo_trabajador`),
  ADD KEY `supervisors_iduser_foreign` (`iduser`),
  ADD KEY `supervisors_idfaculty_foreign` (`idfaculty`),
  ADD KEY `supervisors_idpspprocess_foreign` (`idpspprocess`);

--
-- Indices de la tabla `teacherxcompetences`
--
ALTER TABLE `teacherxcompetences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacherxcompetences_id_docente_foreign` (`id_docente`),
  ADD KEY `teacherxcompetences_id_especialidad_foreign` (`id_especialidad`),
  ADD KEY `teacherxcompetences_id_competence_foreign` (`id_competence`);

--
-- Indices de la tabla `teacherxdeliverables`
--
ALTER TABLE `teacherxdeliverables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacherxdeliverables_id_profesor_foreign` (`id_profesor`),
  ADD KEY `teacherxdeliverables_id_entregable_foreign` (`id_entregable`);

--
-- Indices de la tabla `teacherxgroups`
--
ALTER TABLE `teacherxgroups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacherxgroups_id_profesor_foreign` (`id_profesor`),
  ADD KEY `teacherxgroups_id_grupo_foreign` (`id_grupo`);

--
-- Indices de la tabla `teacherxprojects`
--
ALTER TABLE `teacherxprojects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacherxprojects_id_profesor_foreign` (`id_profesor`),
  ADD KEY `teacherxprojects_id_proyecto_foreign` (`id_proyecto`);

--
-- Indices de la tabla `teacherxtutstudentxevaluations`
--
ALTER TABLE `teacherxtutstudentxevaluations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacherxtutstudentxevaluations_id_tutstudentxevaluation_foreign` (`id_tutstudentxevaluation`),
  ADD KEY `teacherxtutstudentxevaluations_id_docente_foreign` (`id_docente`);

--
-- Indices de la tabla `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `templates_idphase_foreign` (`idphase`),
  ADD KEY `templates_idsupervisor_foreign` (`idsupervisor`),
  ADD KEY `templates_idprofesor_foreign` (`idprofesor`),
  ADD KEY `templates_idadmin_foreign` (`idadmin`),
  ADD KEY `templates_idtipoestado_foreign` (`idtipoestado`);

--
-- Indices de la tabla `tipoplanmejora`
--
ALTER TABLE `TipoPlanMejora`
  ADD PRIMARY KEY (`IdTipoPlanMejora`),
  ADD KEY `IdEspecialidad` (`IdEspecialidad`);

--
-- Indices de la tabla `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tutmeetings`
--
ALTER TABLE `tutmeetings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutmeetings_id_topic_foreign` (`id_topic`),
  ADD KEY `tutmeetings_id_reason_foreign` (`id_reason`),
  ADD KEY `tutmeetings_id_tutstudent_foreign` (`id_tutstudent`),
  ADD KEY `tutmeetings_id_docente_foreign` (`id_docente`);

--
-- Indices de la tabla `tutorships`
--
ALTER TABLE `tutorships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutorships_id_tutor_foreign` (`id_tutor`),
  ADD KEY `tutorships_id_profesor_foreign` (`id_profesor`);

--
-- Indices de la tabla `tutschedules`
--
ALTER TABLE `tutschedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutschedules_id_docente_foreign` (`id_docente`);

--
-- Indices de la tabla `tutstudents`
--
ALTER TABLE `tutstudents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tutstudents_codigo_unique` (`codigo`),
  ADD KEY `tutstudents_id_especialidad_foreign` (`id_especialidad`),
  ADD KEY `tutstudents_id_usuario_foreign` (`id_usuario`),
  ADD KEY `tutstudents_id_tutoria_foreign` (`id_tutoria`);

--
-- Indices de la tabla `tutstudentxevaluations`
--
ALTER TABLE `tutstudentxevaluations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutstudentxevaluations_id_tutstudent_foreign` (`id_tutstudent`),
  ADD KEY `tutstudentxevaluations_id_evaluation_foreign` (`id_evaluation`);

--
-- Indices de la tabla `usersxprofiles`
--
ALTER TABLE `usersxprofiles`
  ADD KEY `usersxprofiles_iduser_foreign` (`iduser`),
  ADD KEY `usersxprofiles_idprofile_foreign` (`idprofile`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD KEY `IdPerfil` (`IdPerfil`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accion`
--
ALTER TABLE `Accion`
  MODIFY `IdAccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT de la tabla `acreditador`
--
ALTER TABLE `Acreditador`
  MODIFY `IdAcreditador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `alternatives`
--
ALTER TABLE `alternatives`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `Alumno`
  MODIFY `IdAlumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;
--
-- AUTO_INCREMENT de la tabla `aporte`
--
ALTER TABLE `Aporte`
  MODIFY `IdAporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT de la tabla `archivoentrada`
--
ALTER TABLE `ArchivoEntrada`
  MODIFY `IdArchivoEntrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `archivoentradaplan`
--
ALTER TABLE `ArchivoEntradaPlan`
  MODIFY `IdArchivoEntrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `aspecto`
--
ALTER TABLE `Aspecto`
  MODIFY `IdAspecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `Calificacion`
  MODIFY `IdCalificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT de la tabla `cicloacademico`
--
ALTER TABLE `CicloAcademico`
  MODIFY `IdCicloAcademico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `cicloxaspecto`
--
ALTER TABLE `CicloxAspecto`
  MODIFY `IdCicloxAspecto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cicloxcriterio`
--
ALTER TABLE `CicloxCriterio`
  MODIFY `IdCicloxCriterio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cicloxespecialidad`
--
ALTER TABLE `CicloxEspecialidad`
  MODIFY `IdCicloAcademico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cicloxresultado`
--
ALTER TABLE `CicloxResultado`
  MODIFY `IdCicloxResultado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `competences`
--
ALTER TABLE `competences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `competencextutstudentxevaluations`
--
ALTER TABLE `competencextutstudentxevaluations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `confespecialidad`
--
ALTER TABLE `ConfEspecialidad`
  MODIFY `IdConfEspecialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `criterio`
--
ALTER TABLE `Criterio`
  MODIFY `IdCriterio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `Curso`
  MODIFY `IdCurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT de la tabla `cursoxciclo`
--
ALTER TABLE `CursoxCiclo`
  MODIFY `IdCursoxCiclo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT de la tabla `cursoxcicloxaspecto`
--
ALTER TABLE `CursoxCicloxAspecto`
  MODIFY `IdCursoxCicloxAspecto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cursoxcicloxcriterio`
--
ALTER TABLE `CursoxCicloxCriterio`
  MODIFY `IdCursoxCicloxCriterio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cursoxcicloxresultado`
--
ALTER TABLE `CursoxCicloxResultado`
  MODIFY `IdCursoxCicloxResultado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cursoxdocente`
--
ALTER TABLE `CursoxDocente`
  MODIFY `IdCursoxDocente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `cycles`
--
ALTER TABLE `cycles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `deliverables`
--
ALTER TABLE `deliverables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `Docente`
  MODIFY `IdDocente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `Especialidad`
  MODIFY `IdEspecialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `evalternatives`
--
ALTER TABLE `evalternatives`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `evidenciacurso`
--
ALTER TABLE `EvidenciaCurso`
  MODIFY `IdEvidenciaCurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `evidenciamedicion`
--
ALTER TABLE `EvidenciaMedicion`
  MODIFY `IdEvidenciaMedicion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `evquestions`
--
ALTER TABLE `evquestions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `evquestionxstudentxdocentes`
--
ALTER TABLE `evquestionxstudentxdocentes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `freehours`
--
ALTER TABLE `freehours`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `fuentemedicion`
--
ALTER TABLE `FuenteMedicion`
  MODIFY `IdFuenteMedicion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `fuentexcursoxcriterioxciclo`
--
ALTER TABLE `FuentexCursoxCriterioxCiclo`
  MODIFY `IdFuentexCursoxCriterioxCiclo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `Horario`
  MODIFY `IdHorario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `horarioxaspecto`
--
ALTER TABLE `HorarioxAspecto`
  MODIFY `IdHorarioxAspecto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `horarioxcriterio`
--
ALTER TABLE `HorarioxCriterio`
  MODIFY `IdHorarioxCriterio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `horarioxdocente`
--
ALTER TABLE `HorarioxDocente`
  MODIFY `IdHorarioxDocente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `horarioxresultado`
--
ALTER TABLE `HorarioxResultado`
  MODIFY `IdHorarioxResultado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `informe`
--
ALTER TABLE `Informe`
  MODIFY `IdInforme` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `inscriptionfiles`
--
ALTER TABLE `inscriptionfiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `invdocuments`
--
ALTER TABLE `invdocuments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `investigators`
--
ALTER TABLE `investigators`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `investigatorxdeliverables`
--
ALTER TABLE `investigatorxdeliverables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `investigatorxgroups`
--
ALTER TABLE `investigatorxgroups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `investigatorxprojects`
--
ALTER TABLE `investigatorxprojects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `nivelcriterio`
--
ALTER TABLE `NivelCriterio`
  MODIFY `IdNivelCriterio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT de la tabla `noavailabilitys`
--
ALTER TABLE `noavailabilitys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `objetivoeducacional`
--
ALTER TABLE `ObjetivoEducacional`
  MODIFY `IdObjetivoEducacional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `parameters`
--
ALTER TABLE `parameters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `Perfil`
  MODIFY `IdPerfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `perfilxaccion`
--
ALTER TABLE `PerfilxAccion`
  MODIFY `IdPerfilxAccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;
--
-- AUTO_INCREMENT de la tabla `periodo`
--
ALTER TABLE `Periodo`
  MODIFY `IdPeriodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `periodoxaspecto`
--
ALTER TABLE `PeriodoxAspecto`
  MODIFY `IdPeriodoxAspecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT de la tabla `periodoxcriterio`
--
ALTER TABLE `PeriodoxCriterio`
  MODIFY `IdPeriodoxCriterio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT de la tabla `periodoxobjetivo`
--
ALTER TABLE `PeriodoxObjetivo`
  MODIFY `IdPeriodoxObjetivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `periodoxresultado`
--
ALTER TABLE `PeriodoxResultado`
  MODIFY `IdPeriodoxResultado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `phases`
--
ALTER TABLE `phases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `planaccion`
--
ALTER TABLE `PlanAccion`
  MODIFY `IdPlanAccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `planmejora`
--
ALTER TABLE `PlanMejora`
  MODIFY `IdPlanMejora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pspcriterios`
--
ALTER TABLE `pspcriterios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pspdocuments`
--
ALTER TABLE `pspdocuments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pspgroups`
--
ALTER TABLE `pspgroups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pspmeetings`
--
ALTER TABLE `pspmeetings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pspprocesses`
--
ALTER TABLE `pspprocesses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pspprocessesxdocente`
--
ALTER TABLE `pspprocessesxdocente`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pspprocessesxsupervisors`
--
ALTER TABLE `pspprocessesxsupervisors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pspstudents`
--
ALTER TABLE `pspstudents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pspstudentsxcriterios`
--
ALTER TABLE `pspstudentsxcriterios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `reasons`
--
ALTER TABLE `reasons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `resultadoestudiantil`
--
ALTER TABLE `ResultadoEstudiantil`
  MODIFY `IdResultadoEstudiantil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT de la tabla `resultadoxobjetivo`
--
ALTER TABLE `ResultadoxObjetivo`
  MODIFY `IdResultadoxObjetivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT de la tabla `schedule_meetings`
--
ALTER TABLE `schedule_meetings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `seguimiento`
--
ALTER TABLE `Seguimiento`
  MODIFY `IdSeguimiento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `studentxdeliverables`
--
ALTER TABLE `studentxdeliverables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `studentxgroups`
--
ALTER TABLE `studentxgroups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `studentxprojects`
--
ALTER TABLE `studentxprojects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sugerencia`
--
ALTER TABLE `Sugerencia`
  MODIFY `IdSugerencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `supervisors`
--
ALTER TABLE `supervisors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `teacherxcompetences`
--
ALTER TABLE `teacherxcompetences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `teacherxdeliverables`
--
ALTER TABLE `teacherxdeliverables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `teacherxgroups`
--
ALTER TABLE `teacherxgroups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `teacherxprojects`
--
ALTER TABLE `teacherxprojects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `teacherxtutstudentxevaluations`
--
ALTER TABLE `teacherxtutstudentxevaluations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `templates`
--
ALTER TABLE `templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipoplanmejora`
--
ALTER TABLE `TipoPlanMejora`
  MODIFY `IdTipoPlanMejora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tutmeetings`
--
ALTER TABLE `tutmeetings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tutorships`
--
ALTER TABLE `tutorships`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tutschedules`
--
ALTER TABLE `tutschedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tutstudents`
--
ALTER TABLE `tutstudents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tutstudentxevaluations`
--
ALTER TABLE `tutstudentxevaluations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `Usuario`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acreditador`
--
ALTER TABLE `Acreditador`
  ADD CONSTRAINT `Acreditador_ibfk_1` FOREIGN KEY (`IdEspecialidad`) REFERENCES `Especialidad` (`IdEspecialidad`),
  ADD CONSTRAINT `Acreditador_ibfk_2` FOREIGN KEY (`IdUsuario`) REFERENCES `Usuario` (`IdUsuario`);

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `Alumno`
  ADD CONSTRAINT `Alumno_ibfk_1` FOREIGN KEY (`IdHorario`) REFERENCES `Horario` (`IdHorario`),
  ADD CONSTRAINT `Alumno_ibfk_2` FOREIGN KEY (`IdUsuario`) REFERENCES `Usuario` (`IdUsuario`);

--
-- Filtros para la tabla `aporte`
--
ALTER TABLE `Aporte`
  ADD CONSTRAINT `Aporte_ibfk_1` FOREIGN KEY (`IdResultadoEstudiantil`) REFERENCES `ResultadoEstudiantil` (`IdResultadoEstudiantil`),
  ADD CONSTRAINT `Aporte_ibfk_2` FOREIGN KEY (`IdCurso`) REFERENCES `Curso` (`IdCurso`),
  ADD CONSTRAINT `Aporte_ibfk_3` FOREIGN KEY (`IdCicloAcademico`) REFERENCES `CicloxEspecialidad` (`IdCicloAcademico`);

--
-- Filtros para la tabla `aspecto`
--
ALTER TABLE `Aspecto`
  ADD CONSTRAINT `Aspecto_ibfk_1` FOREIGN KEY (`IdResultadoEstudiantil`) REFERENCES `ResultadoEstudiantil` (`IdResultadoEstudiantil`);

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `Calificacion`
  ADD CONSTRAINT `Calificacion_ibfk_1` FOREIGN KEY (`IdAlumno`) REFERENCES `Alumno` (`IdAlumno`),
  ADD CONSTRAINT `Calificacion_ibfk_2` FOREIGN KEY (`IdHorario`) REFERENCES `Horario` (`IdHorario`),
  ADD CONSTRAINT `Calificacion_ibfk_3` FOREIGN KEY (`IdCriterio`) REFERENCES `Criterio` (`IdCriterio`);

--
-- Filtros para la tabla `cicloxaspecto`
--
ALTER TABLE `CicloxAspecto`
  ADD CONSTRAINT `CicloxAspecto_ibfk_1` FOREIGN KEY (`IdCicloAcademico`) REFERENCES `CicloxEspecialidad` (`IdCicloAcademico`),
  ADD CONSTRAINT `CicloxAspecto_ibfk_2` FOREIGN KEY (`IdAspecto`) REFERENCES `Aspecto` (`IdAspecto`);

--
-- Filtros para la tabla `cicloxcriterio`
--
ALTER TABLE `CicloxCriterio`
  ADD CONSTRAINT `CicloxCriterio_idfk_1` FOREIGN KEY (`IdCriterio`) REFERENCES `Criterio` (`IdCriterio`),
  ADD CONSTRAINT `CicloxCriterio_idfk_2` FOREIGN KEY (`IdCicloAcademico`) REFERENCES `CicloxEspecialidad` (`IdCicloAcademico`);

--
-- Filtros para la tabla `cicloxespecialidad`
--
ALTER TABLE `CicloxEspecialidad`
  ADD CONSTRAINT `CicloAcademico_ibfk_1` FOREIGN KEY (`IdEspecialidad`) REFERENCES `Especialidad` (`IdEspecialidad`),
  ADD CONSTRAINT `CicloAcademico_ibfk_2` FOREIGN KEY (`IdPeriodo`) REFERENCES `Periodo` (`IdPeriodo`),
  ADD CONSTRAINT `CicloAcademico_ibfk_3` FOREIGN KEY (`IdDocente`) REFERENCES `Docente` (`IdDocente`),
  ADD CONSTRAINT `CicloAcademico_ibfk_4` FOREIGN KEY (`IdCiclo`) REFERENCES `CicloAcademico` (`IdCicloAcademico`);

--
-- Filtros para la tabla `cicloxresultado`
--
ALTER TABLE `CicloxResultado`
  ADD CONSTRAINT `CicloxResultado_ibfk_1` FOREIGN KEY (`IdCicloAcademico`) REFERENCES `CicloxEspecialidad` (`IdCicloAcademico`),
  ADD CONSTRAINT `CicloxResultado_ibfk_2` FOREIGN KEY (`IdResultadoEstudiantil`) REFERENCES `ResultadoEstudiantil` (`IdResultadoEstudiantil`);

--
-- Filtros para la tabla `confespecialidad`
--
ALTER TABLE `ConfEspecialidad`
  ADD CONSTRAINT `ConfEspecialidad_ibfk_1` FOREIGN KEY (`IdEspecialidad`) REFERENCES `Especialidad` (`IdEspecialidad`),
  ADD CONSTRAINT `ConfEspecialidad_ibfk_2` FOREIGN KEY (`IdPeriodo`) REFERENCES `Periodo` (`IdPeriodo`),
  ADD CONSTRAINT `ConfEspecialidad_ibfk_3` FOREIGN KEY (`IdCicloInicio`) REFERENCES `CicloAcademico` (`IdCicloAcademico`),
  ADD CONSTRAINT `ConfEspecialidad_ibfk_4` FOREIGN KEY (`IdCicloFin`) REFERENCES `CicloAcademico` (`IdCicloAcademico`);

--
-- Filtros para la tabla `criterio`
--
ALTER TABLE `Criterio`
  ADD CONSTRAINT `Criterio_ibfk_1` FOREIGN KEY (`IdAspecto`) REFERENCES `Aspecto` (`IdAspecto`);

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `Curso`
  ADD CONSTRAINT `Curso_ibfk_1` FOREIGN KEY (`IdEspecialidad`) REFERENCES `Especialidad` (`IdEspecialidad`);

--
-- Filtros para la tabla `cursoxciclo`
--
ALTER TABLE `CursoxCiclo`
  ADD CONSTRAINT `CursoEvaluado_ibfk_1` FOREIGN KEY (`IdCurso`) REFERENCES `Curso` (`IdCurso`),
  ADD CONSTRAINT `CursoEvaluado_ibfk_2` FOREIGN KEY (`IdCicloAcademico`) REFERENCES `CicloxEspecialidad` (`IdCicloAcademico`);

--
-- Filtros para la tabla `cursoxcicloxaspecto`
--
ALTER TABLE `CursoxCicloxAspecto`
  ADD CONSTRAINT `CursoxCicloxAspecto_idfk_1` FOREIGN KEY (`IdCursoxCiclo`) REFERENCES `CursoxCiclo` (`IdCursoxCiclo`),
  ADD CONSTRAINT `CursoxCicloxAspecto_idfk_2` FOREIGN KEY (`IdAspecto`) REFERENCES `Aspecto` (`IdAspecto`);

--
-- Filtros para la tabla `cursoxcicloxcriterio`
--
ALTER TABLE `CursoxCicloxCriterio`
  ADD CONSTRAINT `CursoxCicloxCriterio_idfk_1` FOREIGN KEY (`IdCursoxCiclo`) REFERENCES `CursoxCiclo` (`IdCursoxCiclo`),
  ADD CONSTRAINT `CursoxCicloxCriterio_idfk_2` FOREIGN KEY (`IdCriterio`) REFERENCES `Criterio` (`IdCriterio`);

--
-- Filtros para la tabla `cursoxcicloxresultado`
--
ALTER TABLE `CursoxCicloxResultado`
  ADD CONSTRAINT `CursoxCicloxResultado_idfk_1` FOREIGN KEY (`IdResultadoEstudiantil`) REFERENCES `ResultadoEstudiantil` (`IdResultadoEstudiantil`),
  ADD CONSTRAINT `CursoxCicloxResultado_idfk_2` FOREIGN KEY (`IdCursoxCiclo`) REFERENCES `CursoxCiclo` (`IdCursoxCiclo`);

--
-- Filtros para la tabla `cursoxdocente`
--
ALTER TABLE `CursoxDocente`
  ADD CONSTRAINT `CursoxDocente_idfk_1` FOREIGN KEY (`IdDocente`) REFERENCES `Docente` (`IdDocente`),
  ADD CONSTRAINT `CursoxDocente_idfk_2` FOREIGN KEY (`IdCurso`) REFERENCES `Curso` (`IdCurso`);

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `Docente`
  ADD CONSTRAINT `Docente_ibfk_1` FOREIGN KEY (`IdEspecialidad`) REFERENCES `Especialidad` (`IdEspecialidad`),
  ADD CONSTRAINT `Docente_ibfk_2` FOREIGN KEY (`IdUsuario`) REFERENCES `Usuario` (`IdUsuario`);

--
-- Filtros para la tabla `especialidad`
--
ALTER TABLE `Especialidad`
  ADD CONSTRAINT `Especialidad_ibfk_1` FOREIGN KEY (`IdDocente`) REFERENCES `Docente` (`IdDocente`);

--
-- Filtros para la tabla `evidenciacurso`
--
ALTER TABLE `EvidenciaCurso`
  ADD CONSTRAINT `EvidenciaCurso_ibfk_1` FOREIGN KEY (`IdHorario`) REFERENCES `Horario` (`IdHorario`),
  ADD CONSTRAINT `EvidenciaCurso_ibfk_2` FOREIGN KEY (`IdArchivoEntrada`) REFERENCES `ArchivoEntrada` (`IdArchivoEntrada`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `evidenciamedicion`
--
ALTER TABLE `EvidenciaMedicion`
  ADD CONSTRAINT `EvidenciaMedicion_ibfk_1` FOREIGN KEY (`IdHorario`) REFERENCES `Horario` (`IdHorario`),
  ADD CONSTRAINT `EvidenciaMedicion_ibfk_2` FOREIGN KEY (`IdArchivoEntrada`) REFERENCES `ArchivoEntrada` (`IdArchivoEntrada`),
  ADD CONSTRAINT `EvidenciaMedicion_ibfk_3` FOREIGN KEY (`IdFuentexCursoxCriterioxCiclo`) REFERENCES `FuentexCursoxCriterioxCiclo` (`IdFuentexCursoxCriterioxCiclo`);

--
-- Filtros para la tabla `fuentemedicion`
--
ALTER TABLE `FuenteMedicion`
  ADD CONSTRAINT `FuenteMedicion_ibfk_1` FOREIGN KEY (`IdEspecialidad`) REFERENCES `Especialidad` (`IdEspecialidad`);

--
-- Filtros para la tabla `fuentexcursoxcriterioxciclo`
--
ALTER TABLE `FuentexCursoxCriterioxCiclo`
  ADD CONSTRAINT `FuentexCursoxCriterioxCiclo_ibfk_1` FOREIGN KEY (`IdFuenteMedicion`) REFERENCES `FuenteMedicion` (`IdFuenteMedicion`),
  ADD CONSTRAINT `FuentexCursoxCriterioxCiclo_ibfk_2` FOREIGN KEY (`IdCriterio`) REFERENCES `Criterio` (`IdCriterio`),
  ADD CONSTRAINT `FuentexCursoxCriterioxCiclo_ibfk_3` FOREIGN KEY (`IdCurso`) REFERENCES `Curso` (`IdCurso`),
  ADD CONSTRAINT `FuentexCursoxCriterioxCiclo_ibfk_4` FOREIGN KEY (`IdCicloAcademico`) REFERENCES `CicloxEspecialidad` (`IdCicloAcademico`);

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `Horario`
  ADD CONSTRAINT `Horario_ibfk_1` FOREIGN KEY (`IdCursoxCiclo`) REFERENCES `CursoxCiclo` (`IdCursoxCiclo`);

--
-- Filtros para la tabla `horarioxaspecto`
--
ALTER TABLE `HorarioxAspecto`
  ADD CONSTRAINT `HorarioxAspecto_idfk_1` FOREIGN KEY (`IdHorario`) REFERENCES `Horario` (`IdHorario`),
  ADD CONSTRAINT `HorarioxAspecto_idfk_2` FOREIGN KEY (`IdAspecto`) REFERENCES `Aspecto` (`IdAspecto`);

--
-- Filtros para la tabla `horarioxcriterio`
--
ALTER TABLE `HorarioxCriterio`
  ADD CONSTRAINT `HorarioxCriterio_idfk_1` FOREIGN KEY (`IdHorario`) REFERENCES `Horario` (`IdHorario`),
  ADD CONSTRAINT `HorarioxCriterio_idfk_2` FOREIGN KEY (`IdCriterio`) REFERENCES `Criterio` (`IdCriterio`);

--
-- Filtros para la tabla `horarioxdocente`
--
ALTER TABLE `HorarioxDocente`
  ADD CONSTRAINT `HorarioxDocente_ibfk_1` FOREIGN KEY (`IdHorario`) REFERENCES `Horario` (`IdHorario`),
  ADD CONSTRAINT `HorarioxDocente_ibfk_2` FOREIGN KEY (`IdDocente`) REFERENCES `Docente` (`IdDocente`);

--
-- Filtros para la tabla `horarioxresultado`
--
ALTER TABLE `HorarioxResultado`
  ADD CONSTRAINT `HorarioxResultado_idfk_1` FOREIGN KEY (`IdHorario`) REFERENCES `Horario` (`IdHorario`),
  ADD CONSTRAINT `HorarioxResultado_idfk_2` FOREIGN KEY (`IdResultadoEstudiantil`) REFERENCES `ResultadoEstudiantil` (`IdResultadoEstudiantil`);

--
-- Filtros para la tabla `informe`
--
ALTER TABLE `Informe`
  ADD CONSTRAINT `Informe_ibfk_1` FOREIGN KEY (`IdHorario`) REFERENCES `Horario` (`IdHorario`);

--
-- Filtros para la tabla `nivelcriterio`
--
ALTER TABLE `NivelCriterio`
  ADD CONSTRAINT `NivelCriterio_ibfk_1` FOREIGN KEY (`IdCriterio`) REFERENCES `Criterio` (`IdCriterio`),
  ADD CONSTRAINT `NivelCriterio_ibfk_2` FOREIGN KEY (`IdPeriodo`) REFERENCES `Periodo` (`IdPeriodo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;