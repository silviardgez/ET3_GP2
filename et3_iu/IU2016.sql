
DROP DATABASE IF EXISTS `IU2016`;
CREATE DATABASE IF NOT EXISTS `IU2016` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `IU2016`;

-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-12-2016 a las 12:12:43
-- Versión del servidor: 5.5.44-0+deb8u1
-- Versión de PHP: 5.6.13-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `IU2016`
--

-- --------------------------------------------------------


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CORRECCION`
--

CREATE TABLE IF NOT EXISTS `CORRECCION` (
`CORRECCION_ID` int(10) NOT NULL,
  `CORRECCION_NOM` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `CORRECCION_ENTREGA` int(10) NOT NULL,
  `CORRECCION_RUBRICA` int(10) NOT NULL,
  `CORRECCION_PROFESOR` int(10) NOT NULL,
  `CORRECCION_NOTA` int(2) NOT NULL,
  `CORRECCION_COMENTARIOS` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `CORRECCION`
--

INSERT INTO `CORRECCION` (`CORRECCION_ID`, `CORRECCION_NOM`, `CORRECCION_ENTREGA`, `CORRECCION_RUBRICA`, `CORRECCION_PROFESOR`, `CORRECCION_NOTA`, `CORRECCION_COMENTARIOS`) VALUES
(1, 'Correcion ET3', 1, 1, 1, 10, ''),
(2, 'Correcion Trabajo CDA', 2, 2, 2, 9, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DOCUMENTACION`
--

CREATE TABLE IF NOT EXISTS `DOCUMENTACION` (
  `DOCUMENTACION_ID` int(10) NOT NULL DEFAULT '0',
  `DOCUMENTACION_NOM` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `DOCUMENTACION_PROFESOR` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `DOCUMENTACION_MATERIA` int(10) NOT NULL,
  `DOCUMENTACION_FECHA` date NOT NULL,
  `DOCUMENTACION_ENLACE` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `DOCUMENTACION_CATEGORIA` varchar(30) COLLATE utf8_spanish_ci NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `DOCUMENTACION`
--

INSERT INTO `DOCUMENTACION` (`DOCUMENTACION_ID`, `DOCUMENTACION_NOM`, `DOCUMENTACION_PROFESOR`, `DOCUMENTACION_MATERIA`, `DOCUMENTACION_FECHA`, `DOCUMENTACION_ENLACE`, `DOCUMENTACION_CATEGORIA`) VALUES
(1, 'Definicion ET3', '65938568Y', 1, '2016-12-10', '../Documents/Documentacion/Definicion_ET3','Teoria'),
(2, 'Proyecto', '70561875Z', 2, '2016-12-13', '../Documents/Documentacion/Proyecto','Practica'),
(3, 'Entregable Enero', '65938568Y', 2, '2016-12-16', '../Documents/Documentacion/Entregable_Enero','Teoria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ENTREGA`
--

CREATE TABLE IF NOT EXISTS `ENTREGA` (
`ENTREGA_ID` int(10) NOT NULL,
  `ENTREGA_NOMBRE` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ENTREGA_TRABAJO` int(10) NOT NULL,
  `ENTREGA_HORA` time NOT NULL,
  `ENTREGA_FECHA` date NOT NULL,
  `ENTREGA_ALUMNO` varchar(10) NOT NULL,
  `ENTREGA_HORAS_DEDIC` decimal(2,0) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ENTREGA`
--

INSERT INTO `ENTREGA` (`ENTREGA_ID`, `ENTREGA_NOMBRE`, `ENTREGA_TRABAJO`, `ENTREGA_HORA`, `ENTREGA_FECHA`, `ENTREGA_ALUMNO`, `ENTREGA_HORAS_DEDIC`) VALUES
(1, 'Entrega ET3', 1, '23:59:59', '2017-01-15', '65938568Y', 10),
(2, 'Entrega Trabajo CDA', 2, '23:59:59', '2017-01-09', '70561875Z', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `FUNCIONALIDAD`
--

CREATE TABLE IF NOT EXISTS `FUNCIONALIDAD` (
`FUNCIONALIDAD_ID` int(10) NOT NULL,
  `FUNCIONALIDAD_NOM` varchar(80) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `FUNCIONALIDAD`
--

INSERT INTO `FUNCIONALIDAD` (`FUNCIONALIDAD_ID`, `FUNCIONALIDAD_NOM`) VALUES
(1, 'GESTION USUARIOS'),
(2, 'GESTION ROLES'),
(3, 'GESTION FUNCIONALIDADES'),
(4, 'GESTION PAGINAS'),
(5, 'GESTION USUARIOS2'),
(100, 'GESTION RUBRICAS'),
(200, 'GESTION DOCUMENTACION'),
(300,'GESTION ENTREGAS'),
(301,'GESTION ENTREGAS2'),
(400,'GESTION TRABAJOS'),
(600, 'GESTION DE ITEMS DE RUBRICAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `FUNCIONALIDAD_PAGINA`
--

CREATE TABLE IF NOT EXISTS `FUNCIONALIDAD_PAGINA` (
  `FUNCIONALIDAD_ID` int(10) NOT NULL,
  `PAGINA_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `FUNCIONALIDAD_PAGINA`
--

INSERT INTO `FUNCIONALIDAD_PAGINA` (`FUNCIONALIDAD_ID`, `PAGINA_ID`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(4, 13),
(4, 14),
(4, 15),
(4, 16),
(4, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(5,3),
(5,4),
(5,5),
(5,6),
(100, 100),
(100, 101),
(100, 102),
(100, 103),
(100, 104),
(200, 200),
(200, 201),
(200, 202),
(200, 203),
(200, 204),
(300, 300),
(300, 301),
(300, 302),
(300, 303),
(300, 304),
(301, 303),
(301, 304),
(400, 400),
(400, 401),
(400, 402),
(400, 403),
(400, 404),
(600, 600),
(600, 601),
(600, 602),
(600, 603),
(600, 604),
(600, 605),
(600, 606),
(600, 607),
(600, 608),
(600, 609);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `INSCRIPCION`
--

CREATE TABLE IF NOT EXISTS `INSCRIPCION` (
  `INSCRIPCION_ALUMNO` int(10) NOT NULL,
  `INSCRIPCION_MATERIA` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `INSCRIPCION`
--

INSERT INTO `INSCRIPCION` (`INSCRIPCION_ALUMNO`, `INSCRIPCION_MATERIA`) VALUES
(3, 1),
(4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ITEM`
--

CREATE TABLE IF NOT EXISTS `ITEM` (
`ITEM_ID` int(10) NOT NULL,
  `ITEM_NOMBRE` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ITEM_RUBRICA` int(10) NOT NULL,
  `ITEM_PORCENTAJE` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ITEM`
--

INSERT INTO `ITEM` (`ITEM_ID`, `ITEM_NOMBRE`, `ITEM_RUBRICA`, `ITEM_PORCENTAJE`) VALUES
(1, 'Documentacion Gestion', 1, 25),
(2, 'Documentacion Proyecto', 1, 25),
(3, 'Codificacion', 1, 25),
(4, 'Apariencia', 1, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `MATERIA`
--

CREATE TABLE IF NOT EXISTS `MATERIA` (
`MATERIA_ID` int(10) NOT NULL,
  `MATERIA_NOM` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `MATERIA_CREDITOS` int(3) NOT NULL,
  `MATERIA_DEPARTAMENTO` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `MATERIA_TITULACION` varchar(30) COLLATE utf8_spanish_ci NOT NULL,

  `MATERIA_DESCRIPCION` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `MATERIA`
--

INSERT INTO `MATERIA` (`MATERIA_ID`, `MATERIA_NOM`, `MATERIA_CREDITOS`, `MATERIA_DEPARTAMENTO`, `MATERIA_TITULACION`, `MATERIA_DESCRIPCION`) VALUES
(1, 'Interfaces de Usuario', 6, 'Informatica', 'Ingenieria Informatica',  'Diseño, construcción y evaluación de interfaces'),
(2, 'Centros de Datos', 6, 'Informatica', 'Ingenieria Informatica',  'Integración de sistemas y redes');

-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `IMPARTE_MATERIA` (
`MATERIA_ID` int(10) NOT NULL,
 `PROFESOR_USER` varchar(25) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
INSERT INTO `IMPARTE_MATERIA` (`MATERIA_ID`,`PROFESOR_USER`)VALUES (1,'RESPONSABLE'),(1,'PROFESOR');
--
-- Estructura de tabla para la tabla `MATRICULA`
--

CREATE TABLE IF NOT EXISTS `MATRICULA` (
  `MATRICULA_ALUMNO` int(10) NOT NULL,
  `MATRICULA_MATERIA` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `MATRICULA`
--

INSERT INTO `MATRICULA` (`MATRICULA_ALUMNO`, `MATRICULA_MATERIA`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `NIVEL`
--

CREATE TABLE IF NOT EXISTS `NIVEL` (
`NIVEL_ID` int(10) NOT NULL,
  `NIVEL_DESCRIPCION` varchar(50) COLLATE utf8_spanish_ci,
  `NIVEL_ITEM` int(10) NOT NULL,
  `NIVEL_RUBRICA` int(10) NOT NULL,
  `NIVEL_PORCENTAJE` int(2)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `NIVEL`
--

INSERT INTO `NIVEL` (`NIVEL_ID`, `NIVEL_DESCRIPCION`, `NIVEL_ITEM`, `NIVEL_RUBRICA`, `NIVEL_PORCENTAJE`) VALUES
(1, 'Muy Mal', 1, 1, 0),
(2, 'Mal', 1, 1, 25),
(3, 'Bien', 1, 1, 50),
(4, 'Muy Bien', 1, 1, 75),
(5, 'Perfecto', 1, 1, 100),
(6, 'Muy Mal', 2, 1, 0),
(7, 'Mal', 2, 1, 25),
(8, 'Bien', 2, 1, 50),
(9, 'Muy Bien', 2, 1, 75),
(10, 'Perfecto', 2, 1, 100),
(11, 'Muy Mal', 3, 1, 0),
(12, 'Mal', 3, 1, 25),
(13, 'Bien', 3, 1, 50),
(14, 'Muy Bien', 3, 1, 75),
(15, 'Perfecto', 3, 1, 100),
(16, 'Muy Mal', 4, 1, 0),
(17, 'Mal', 4, 1, 25),
(18, 'Bien', 4, 1, 50),
(19, 'Muy Bien', 4, 1, 75),
(20, 'Perfecto', 4, 1, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PAGINA`
--

CREATE TABLE IF NOT EXISTS `PAGINA` (
`PAGINA_ID` int(10) NOT NULL,
  `PAGINA_LINK` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `PAGINA_NOM` varchar(80) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `PAGINA`
--

INSERT INTO `PAGINA` (`PAGINA_ID`, `PAGINA_LINK`, `PAGINA_NOM`) VALUES
(1, '../Views/USUARIO_ADD_Vista.php', 'USUARIO ADD'),
(2, '../Views/USUARIO_DELETE_Vista.php', 'USUARIO DELETE'),
(3, '../Views/USUARIO_EDIT_Vista.php', 'USUARIO EDIT'),
(4, '../Views/USUARIO_SHOWALL_Vista.php', 'USUARIO SHOWALL'),
(5, '../Views/USUARIO_SHOW_CONSULT_Vista.php', 'USUARIO SHOW CONSULT'),
(6, '../Views/USUARIO_SHOWCURRENT_Vista.php', 'USUARIO SHOWCURRENT'),
(7, '../Views/FUNCIONALIDAD_ADD_Vista.php', 'FUNCIONALIDAD ADD'),
(8, '../Views/FUNCIONALIDAD_DELETE_Vista.php', 'FUNCIONALIDAD DELETE'),
(9, '../Views/FUNCIONALIDAD_EDIT_Vista.php', 'FUNCIONALIDAD EDIT'),
(10, '../Views/FUNCIONALIDAD_SHOWALL_Vista.php', 'FUNCIONALIDAD SHOWALL'),
(11, '../Views/FUNCIONALIDAD_SHOW_PAGINAS_Vista.php', 'FUNCIONALIDAD SHOW PAGINAS'),
(12, '../Views/FUNCIONALIDAD_SHOWCURRENT_Vista.php', 'FUNCIONALIDAD SHOWCURRENT'),
(13, '../Views/PAGINA_ADD_Vista.php', 'PAGINA ADD'),
(14, '../Views/PAGINA_DELETE_Vista.php', 'PAGINA DELETE'),
(15, '../Views/PAGINA_EDIT_Vista.php', 'PAGINA EDIT'),
(16, '../Views/PAGINA_SHOWALL_Vista.php', 'PAGINA SHOWALL'),
(17, '../Views/PAGINA_SHOWCURRENT_Vista.php', 'PAGINA SHOWCURRENT'),
(18, '../Views/ROL_ADD_Vista.php', 'ROL ADD'),
(19, '../Views/ROL_DELETE_Vista.php', 'ROL DELETE'),
(20, '../Views/ROL_EDIT_Vista.php', 'ROL EDIT'),
(21, '../Views/ROL_SHOWALL_Vista.php', 'ROL SHOWALL'),
(22, '../Views/ROL_SHOW_FUNCIONES_Vista.php', 'ROL SHOW FUNCIONES'),
(23, '../Views/ROL_SHOWCURRENT_Vista.php', 'ROL SHOWCURRENT'),
(100, '../Views/RUBRICA_ADD_Vista.php', 'RUBRICA ADD'),
(101, '../Views/RUBRICA_DELETE_Vista.php', 'RUBRICA DELETE'),
(102, '../Views/RUBRICA_EDIT_Vista.php', 'RUBRICA EDIT'),
(103, '../Views/RUBRICA_SHOWALL_Vista.php', 'RUBRICA SHOWALL'),
(104, '../Views/RUBRICA_SHOWCURRENT_Vista.php', 'RUBRICA SHOWCURRENT'),
(200, '../Views/DOCUMENTACION_ADD_Vista.php', 'DOCUMENTACION ADD'),
(201, '../Views/DOCUMENTACION_DELETE_Vista.php', 'DOCUMENTACION DELETE'),
(202, '../Views/DOCUMENTACION_EDIT_Vista.php', 'DOCUMENTACION EDIT'),
(203, '../Views/DOCUMENTACION_SHOWALL_Vista.php', 'DOCUMENTACION SHOWALL'),
(204, '../Views/DOCUMENTACION_SHOWCURRENT_Vista.php', 'DOCUMENTACION SHOWCURRENT'),
(300, '../Views/ENTREGAS_ADD_Vista.php', 'ENTREGAS ADD'),
(301, '../Views/ENTREGAS_DELETE_Vista.php', 'ENTREGAS DELETE'),
(302, '../Views/ENTREGAS_EDIT_Vista.php', 'ENTREGAS EDIT'),
(303, '../Views/ENTREGAS_SHOWALL_Vista.php', 'ENTREGAS SHOWALL'),
(304, '../Views/ENTREGAS_SHOWCURRENT_Vista.php', 'ENTREGAS SHOWCURRENT'),
(400, '../Views/TRABAJO_ADD_Vista.php', 'TRABAJO ADD'),
(401, '../Views/TRABAJO_DELETE_Vista.php', 'TRABAJO DELETE'),
(402, '../Views/TRABAJO_EDIT_Vista.php', 'TRABAJO EDIT'),
(403, '../Views/TRABAJO_SHOWALL_Vista.php', 'TRABAJO SHOWALL'),
(404, '../Views/TRABAJO_SHOWCURRENT_Vista.php', 'TRABAJO SHOWCURRENT'),
(600, '../Views/ITEM_ADD_Vista.php', 'ITEM ADD'),
(601, '../Views/ITEM_DELETE_Vista.php', 'ITEM DELETE'),
(602, '../Views/ITEM_EDIT_Vista.php', 'ITEM EDIT'),
(603, '../Views/ITEM_SHOWALL_Vista.php', 'ITEM SHOWALL'),
(604, '../Views/ITEM_SHOWCURRENT_Vista.php', 'ITEM SHOWCURRENT'),
(605, '../Views/NIVEL_ADD_Vista.php', 'NIVEL ADD'),
(606, '../Views/NIVEL_DELETE_Vista.php', 'NIVEL DELETE'),
(607, '../Views/NIVEL_EDIT_Vista.php', 'NIVEL EDIT'),
(608, '../Views/NIVEL_SHOWALL_Vista.php', 'NIVEL SHOWALL'),
(609, '../Views/NIVEL_SHOWCURRENT_Vista.php', 'NIVEL SHOWCURRENT');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ROL`
--

CREATE TABLE IF NOT EXISTS `ROL` (
`ROL_ID` int(10) NOT NULL,
  `ROL_NOM` varchar(80) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `ROL`
--

INSERT INTO `ROL` (`ROL_ID`, `ROL_NOM`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'PROFESOR'),
(3, 'ALUMNO'),
(4,'PROFESOR RESPONSABLE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ROL_FUNCIONALIDAD`
--

CREATE TABLE IF NOT EXISTS `ROL_FUNCIONALIDAD` (
  `ROL_ID` int(10) NOT NULL,
  `FUNCIONALIDAD_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `ROL_FUNCIONALIDAD`
--

INSERT INTO `ROL_FUNCIONALIDAD` (`ROL_ID`, `FUNCIONALIDAD_ID`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 100),
(2, 100),
(4, 100),
(1, 200),
(2, 200),
(4, 200),
(4,5),
(1,300),
(4,300),
(2,301),
(3,301),
(1,400),
(4,400),
(1, 600),
(2, 600),
(4, 600);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `RUBRICA`
--

CREATE TABLE IF NOT EXISTS `RUBRICA` (
`RUBRICA_ID` int(10) NOT NULL,
  `RUBRICA_NOMBRE` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `RUBRICA_DESCRIPCION` varchar(65) COLLATE utf8_spanish_ci NOT NULL,
  `RUBRICA_NIVELES` int(5) NOT NULL,
  `RUBRICA_AUTOR` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `RUBRICA`
--

INSERT INTO `RUBRICA` (`RUBRICA_ID`, `RUBRICA_NOMBRE`, `RUBRICA_DESCRIPCION`, `RUBRICA_NIVELES`, `RUBRICA_AUTOR`) VALUES
(1, 'Rubrica ET3', 'Rubrica para la correccion de ET3', 7, '70561875Z'),
(2, 'Correcion TFG 2017', 'Falta por insertar items', 5, '86723680H'),
(3, 'Proyecto PI', 'Correction binaria', 2, '70561875Z');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TRABAJO`
--

CREATE TABLE IF NOT EXISTS `TRABAJO` (
`TRABAJO_ID` int(10) NOT NULL,
  `TRABAJO_NOM` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `TRABAJO_DESCRIPCION` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `TRABAJO_MATERIA` int(10) NOT NULL,
  `TRABAJO_PROFESOR` int(10) NOT NULL,
  `TRABAJO_FECHA_INICIO` date NOT NULL,
  `TRABAJO_FECHA_FIN` date NOT NULL,
  `TRABAJO_FECHA_CREACION` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `TRABAJO`
--

INSERT INTO `TRABAJO` (`TRABAJO_ID`, `TRABAJO_NOM`, `TRABAJO_DESCRIPCION`, `TRABAJO_MATERIA`, `TRABAJO_PROFESOR`, `TRABAJO_FECHA_INICIO`, `TRABAJO_FECHA_FIN`,`TRABAJO_FECHA_CREACION`) VALUES
(1, 'ET3', 'Desarrollo de plataforma e-learning', 1, 1, '0000-00-00', '0000-00-00','0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USUARIO`
--

CREATE TABLE IF NOT EXISTS `USUARIO` (
  `USUARIO_USER` varchar(25) COLLATE latin1_spanish_ci NOT NULL,
  `USUARIO_PASSWORD` varchar(128) COLLATE latin1_spanish_ci NOT NULL,
  `USUARIO_NOMBRE` varchar(25) COLLATE latin1_spanish_ci DEFAULT NULL,
  `USUARIO_APELLIDO` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `USUARIO_DNI` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `USUARIO_FECH_NAC` date DEFAULT NULL,
  `USUARIO_EMAIL` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `USUARIO_TELEFONO` int(15) DEFAULT NULL,
  `USUARIO_CUENTA` varchar(60) COLLATE latin1_spanish_ci DEFAULT NULL,
  `USUARIO_DIRECCION` varchar(80) COLLATE latin1_spanish_ci DEFAULT NULL,
  `USUARIO_COMENTARIOS` varchar(1000) COLLATE latin1_spanish_ci DEFAULT NULL,
  `USUARIO_TIPO` int(10) DEFAULT NULL,
  `USUARIO_ESTADO` enum('Activo','Inactivo') COLLATE latin1_spanish_ci DEFAULT NULL,
  `USUARIO_FOTO` varchar(500) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `USUARIO`
--

INSERT INTO `USUARIO` (`USUARIO_USER`, `USUARIO_PASSWORD`, `USUARIO_NOMBRE`, `USUARIO_APELLIDO`, `USUARIO_DNI`, `USUARIO_FECH_NAC`, `USUARIO_EMAIL`, `USUARIO_TELEFONO`, `USUARIO_CUENTA`, `USUARIO_DIRECCION`, `USUARIO_COMENTARIOS`, `USUARIO_TIPO`, `USUARIO_ESTADO`, `USUARIO_FOTO`) VALUES
('ADMIN', '73acd9a5972130b75066c82595a1fae3', 'Pedro', 'Rodriguez', '65938568Y', '1975-11-29', 'pedro.rodriguez@gmail.com', 676676676, '20770024003102575766', 'calle1', NULL, 1, 'Activo', NULL),
('PROFESOR', '0ee43a0e0e2b00017eb657f549eadbe9', 'Pepe', 'Perez', '70561875Z', '1957-10-31', 'pepe.perez@gmail.com', 666666666, '20770024003102575766','calle 3', NULL, 2, 'Activo', NULL),
('ALUMNO', '147b9f5076ae6340663353a96b87062e', 'Luis', 'Gomez', '44841787K', '1957-10-31', 'luis.gomez@gmail.com', 666656666,'20770024003102575766','calle 2', NULL, 3, 'Activo', NULL),
('RESPONSABLE','6d53f6eeea6fb5325511b7408f259db7','Pablo', 'Fernandez', '86723680H','1965-10-29', 'pablo.fernandez@gmail.com',666666777,'20770024003102575766','calle falsa', NULL,4,'Activo',NULL);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USUARIO_PAGINA`
--

CREATE TABLE IF NOT EXISTS `USUARIO_PAGINA` (
  `USUARIO_USER` varchar(25) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `PAGINA_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `USUARIO_PAGINA`
--

INSERT INTO `USUARIO_PAGINA` (`USUARIO_USER`, `PAGINA_ID`) VALUES
('ADMIN', 1),
('ADMIN', 2),
('ADMIN', 3),
('ADMIN', 4),
('ADMIN', 5),
('ADMIN', 6),
('ADMIN', 7),
('ADMIN', 8),
('ADMIN', 9),
('ADMIN', 10),
('ADMIN', 11),
('ADMIN', 12),
('ADMIN', 13),
('ADMIN', 14),
('ADMIN', 15),
('ADMIN', 16),
('ADMIN', 17),
('ADMIN', 18),
('ADMIN', 19),
('ADMIN', 20),
('ADMIN', 21),
('ADMIN', 22),
('ADMIN', 23),
('ADMIN', 100),
('ADMIN', 101),
('ADMIN', 102),
('ADMIN', 103),
('ADMIN', 104),
('ADMIN', 200),
('ADMIN', 201),
('ADMIN', 202),
('ADMIN', 203),
('ADMIN', 204),
('PROFESOR', 100),
('PROFESOR', 101),
('PROFESOR', 102),
('PROFESOR', 103),
('PROFESOR', 104),
('PROFESOR', 200),
('PROFESOR', 201),
('PROFESOR', 202),
('PROFESOR', 203),
('PROFESOR', 204),
('RESPONSABLE', 100),
('RESPONSABLE', 101),
('RESPONSABLE', 102),
('RESPONSABLE', 103),
('RESPONSABLE', 104),
('RESPONSABLE', 200),
('RESPONSABLE', 201),
('RESPONSABLE', 202),
('RESPONSABLE', 203),
('RESPONSABLE', 204),
('RESPONSABLE',3),
('RESPONSABLE',4),
('RESPONSABLE',5),
('RESPONSABLE',6),
('ADMIN',300),
('ADMIN',301),
('ADMIN',302),
('ADMIN',303),
('ADMIN',304),
('RESPONSABLE',300),
('RESPONSABLE',301),
('RESPONSABLE',302),
('RESPONSABLE',303),
('RESPONSABLE',304),
('ADMIN',400),
('ADMIN',401),
('ADMIN',402),
('ADMIN',403),
('ADMIN',404),
('RESPONSABLE',400),
('RESPONSABLE',401),
('RESPONSABLE',402),
('RESPONSABLE',403),
('RESPONSABLE',404),
('ALUMNO',303),
('ALUMNO',304),
('ALUMNO',203),
('ALUMNO',204),
('PROFESOR',303),
('PRODESOR',304),
('ADMIN', 600),
('ADMIN', 601),
('ADMIN', 602),
('ADMIN', 603),
('ADMIN', 604),
('PROFESOR', 600),
('PROFESOR', 601),
('PROFESOR', 602),
('PROFESOR', 603),
('PROFESOR', 604),
('RESPONSABLE', 600),
('RESPONSABLE', 601),
('RESPONSABLE', 602),
('RESPONSABLE', 603),
('RESPONSABLE', 604),
('ADMIN', 605),
('ADMIN', 606),
('ADMIN', 607),
('ADMIN', 608),
('ADMIN', 609),
('PROFESOR', 605),
('PROFESOR', 606),
('PROFESOR', 607),
('PROFESOR', 608),
('PROFESOR', 609),
('RESPONSABLE', 605),
('RESPONSABLE', 606),
('RESPONSABLE', 607),
('RESPONSABLE', 608),
('RESPONSABLE', 609);

--
-- Índices para tablas volcadas
--

--

--
-- Indices de la tabla `CORRECCION`
--
ALTER TABLE `CORRECCION`
 ADD PRIMARY KEY (`CORRECCION_ID`);

--
-- Indices de la tabla `DOCUMENTACION`
--
ALTER TABLE `DOCUMENTACION`
 ADD PRIMARY KEY (`DOCUMENTACION_ID`);

--
-- Indices de la tabla `ENTREGA`
--
ALTER TABLE `ENTREGA`
 ADD PRIMARY KEY (`ENTREGA_ID`);

--
-- Indices de la tabla `FUNCIONALIDAD`
--
ALTER TABLE `FUNCIONALIDAD`
 ADD PRIMARY KEY (`FUNCIONALIDAD_ID`);

--
-- Indices de la tabla `FUNCIONALIDAD_PAGINA`
--
ALTER TABLE `FUNCIONALIDAD_PAGINA`
 ADD PRIMARY KEY (`FUNCIONALIDAD_ID`,`PAGINA_ID`), ADD KEY `PAGINA_ID` (`PAGINA_ID`);

--
-- Indices de la tabla `ITEM`
--
ALTER TABLE `ITEM`
 ADD PRIMARY KEY (`ITEM_ID`, `ITEM_RUBRICA`), ADD KEY `ITEM_RUBRICA` (`ITEM_RUBRICA`);

--
-- Indices de la tabla `MATERIA`
--
ALTER TABLE `MATERIA`
 ADD PRIMARY KEY (`MATERIA_ID`);

--
-- Indices de la tabla `NIVEL`
--
ALTER TABLE `NIVEL`
 ADD PRIMARY KEY (`NIVEL_ID`, `NIVEL_ITEM`, `NIVEL_RUBRICA`), ADD KEY `NIVEL_ITEM` (`NIVEL_ITEM`), ADD KEY `NIVEL_RUBRICA` (`NIVEL_RUBRICA`);

--
-- Indices de la tabla `PAGINA`
--
ALTER TABLE `PAGINA`
 ADD PRIMARY KEY (`PAGINA_ID`);

--

--
-- Indices de la tabla `ROL`
--
ALTER TABLE `ROL`
 ADD PRIMARY KEY (`ROL_ID`);

--
-- Indices de la tabla `ROL_FUNCIONALIDAD`
--
ALTER TABLE `ROL_FUNCIONALIDAD`
 ADD PRIMARY KEY (`ROL_ID`,`FUNCIONALIDAD_ID`), ADD KEY `FUNCIONALIDAD_ID` (`FUNCIONALIDAD_ID`);

--
-- Indices de la tabla `RUBRICA`
--
ALTER TABLE `RUBRICA`
 ADD PRIMARY KEY (`RUBRICA_ID`);

--
-- Indices de la tabla `TRABAJO`
--
ALTER TABLE `TRABAJO`
 ADD PRIMARY KEY (`TRABAJO_ID`);

--
-- Indices de la tabla `USUARIO`
--
ALTER TABLE `USUARIO`
 ADD KEY `USUARIO_ibfk_1` (`USUARIO_TIPO`);

--
-- Indices de la tabla `USUARIO_PAGINA`
--
ALTER TABLE `USUARIO_PAGINA`
 ADD PRIMARY KEY (`USUARIO_USER`,`PAGINA_ID`), ADD KEY `USUARIO__PAGINA_ID_fk` (`PAGINA_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `CORRECCION`
--
ALTER TABLE `CORRECCION`
MODIFY `CORRECCION_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ENTREGA`
--
ALTER TABLE `ENTREGA`
MODIFY `ENTREGA_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `FUNCIONALIDAD`
--
ALTER TABLE `FUNCIONALIDAD`
MODIFY `FUNCIONALIDAD_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `ITEM`
--
ALTER TABLE `ITEM`
MODIFY `ITEM_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `MATERIA`
--
ALTER TABLE `MATERIA`
MODIFY `MATERIA_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `NIVEL`
--
ALTER TABLE `NIVEL`
MODIFY `NIVEL_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `PAGINA`
--
ALTER TABLE `PAGINA`
MODIFY `PAGINA_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `ROL`
--
ALTER TABLE `ROL`
MODIFY `ROL_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `RUBRICA`
--
ALTER TABLE `RUBRICA`
MODIFY `RUBRICA_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `TRABAJO`
--
ALTER TABLE `TRABAJO`
MODIFY `TRABAJO_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `FUNCIONALIDAD_PAGINA`
--
ALTER TABLE `FUNCIONALIDAD_PAGINA`
ADD CONSTRAINT `FUNCIONALIDAD_PAGINA_ibfk_1` FOREIGN KEY (`FUNCIONALIDAD_ID`) REFERENCES `FUNCIONALIDAD` (`FUNCIONALIDAD_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FUNCIONALIDAD_PAGINA_ibfk_2` FOREIGN KEY (`PAGINA_ID`) REFERENCES `PAGINA` (`PAGINA_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ROL_FUNCIONALIDAD`
--
ALTER TABLE `ROL_FUNCIONALIDAD`
ADD CONSTRAINT `ROL_FUNCIONALIDAD_ibfk_1` FOREIGN KEY (`ROL_ID`) REFERENCES `ROL` (`ROL_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `ROL_FUNCIONALIDAD_ibfk_2` FOREIGN KEY (`FUNCIONALIDAD_ID`) REFERENCES `FUNCIONALIDAD` (`FUNCIONALIDAD_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `USUARIO`
--
ALTER TABLE `USUARIO`
ADD CONSTRAINT `USUARIO_ibfk_1` FOREIGN KEY (`USUARIO_TIPO`) REFERENCES `ROL` (`ROL_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `USUARIO_PAGINA`
--
ALTER TABLE `USUARIO_PAGINA`
ADD CONSTRAINT `USUARIO_PAGINA_PAGINA_PAGINA_ID_fk` FOREIGN KEY (`PAGINA_ID`) REFERENCES `PAGINA` (`PAGINA_ID`) ON DELETE CASCADE ON UPDATE CASCADE;


--
-- Filtros para la tabla `ITEM`
--
ALTER TABLE `ITEM`
ADD CONSTRAINT `ITEM_ibfk_1` FOREIGN KEY (`ITEM_RUBRICA`) REFERENCES `RUBRICA` (`RUBRICA_ID`) ON DELETE CASCADE ON UPDATE CASCADE;


-- Filtros para la tabla `NIVEL`
--
ALTER TABLE `NIVEL`
ADD CONSTRAINT `NIVEL_ibfk_1` FOREIGN KEY (`NIVEL_ITEM`) REFERENCES `ITEM`(`ITEM_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `NIVEL_ibfk_2` FOREIGN KEY (`NIVEL_RUBRICA`) REFERENCES `RUBRICA`(`RUBRICA_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;