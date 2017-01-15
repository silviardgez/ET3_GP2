
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
`DOCUMENTACION_FECHA` datetime NOT NULL,
`DOCUMENTACION_ENLACE` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
`DOCUMENTACION_CATEGORIA` varchar(30) COLLATE utf8_spanish_ci

) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `DOCUMENTACION`
--

INSERT INTO `DOCUMENTACION` (`DOCUMENTACION_ID`, `DOCUMENTACION_NOM`, `DOCUMENTACION_PROFESOR`, `DOCUMENTACION_MATERIA`, `DOCUMENTACION_FECHA`, `DOCUMENTACION_ENLACE`, `DOCUMENTACION_CATEGORIA`) VALUES
(1, 'Definicion ET3', '65938568Y', 1, '2016-12-10 00:00:00', '../Documents/Documentacion/Definicion_ET3.docpdf','Teoria'),
(2, 'Proyecto', '70561875Z', 2, '2016-12-13 00:00:00', '../Documents/Documentacion/Proyecto.txt','Practica'),
(3, 'Entregable Enero', '65938568Y', 2, '2016-12-16 00:00:00', '../Documents/Documentacion/Entregable_Enero.doc','Teoria'),
(4, 'Guia Docente IU', '70561875Z', 1, '2016-12-16 00:00:00', '../Documents/Documentacion/Guia_Docente_IU.pdf',NULL),
(5, 'Guia Docente CDA', '65938568Y', 2, '2016-12-21 00:00:00', '../Documents/Documentacion/Guia_Docente_CDA.pdf',NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ENTREGA`
--

CREATE TABLE IF NOT EXISTS `ENTREGA` (
`ENTREGA_ID` int(10) NOT NULL,
`ENTREGA_NOMBRE` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
`ENTREGA_TRABAJO` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Estructura de tabla para la tabla `ALUMNO_ENTREGA`
--

CREATE TABLE IF NOT EXISTS `ALUMNO_ENTREGA` (
`ENTREGA_ID` int(10) NOT NULL,
`USUARIO_USER` varchar(25) NOT NULL,
`ENTREGA_HORA` time NOT NULL,
`ENTREGA_FECHA` date NOT NULL,
`ENTREGA_HORAS_DEDIC` decimal(2,0) NOT NULL,
`ENTREGA_DOCUMENTO` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


--
-- Volcado de datos para la tabla `ENTREGA`
--

INSERT INTO `ENTREGA` (`ENTREGA_ID`, `ENTREGA_NOMBRE`, `ENTREGA_TRABAJO`) VALUES
(1, 'Entrega ET3', 1),
(2, 'Entrega Trabajo CDA', 1);


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
(500,'GESTION CORRECCIONES'),
(400,'GESTION TRABAJOS'),
(600, 'GESTION DE ITEMS DE RUBRICAS'),
(900, 'GESTION MATERIA'),
(920, 'GESTION INSCRIPCIONES');

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
(500,500),
(500,501),
(500,502),
(500,503),
(500,504),
(500,505),
(500,506),
(500,507),
(600, 600),
(600, 601),
(600, 602),
(600, 603),
(600, 604),
(600, 607),
(600, 608),
(600, 609),
(900, 900),
(900, 901),
(900, 902),
(900, 903),
(900, 904),
(900, 905),
(900, 906),
(900, 907),
(920, 920),
(920, 921),
(920, 922),
(920, 923),
(920, 924),
(920, 925);

-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `INSCRIPCION` (
`INSCRIPCION_ID` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`INSCRIPCION_ALUMNO` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
`INSCRIPCION_MATERIA` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `INSCRIPCION`
--

INSERT INTO `INSCRIPCION` (`INSCRIPCION_ID`, `INSCRIPCION_ALUMNO`, `INSCRIPCION_MATERIA`) VALUES
(1,'44841787K', 1),
(2,'44841787K', 2);;

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
(1, 'Calidad general del proyecto', 1, 25),
(2, 'Enunciado y analisis textual', 1, 25),
(3, 'Clases candidatas', 1, 25),
(4, 'Modelo de dominio', 1, 25),
(5, 'Calidad general del proyecto', 2, 10),
(6, 'Enunciado y analisis textual', 2, 20),
(7, 'Modelo de dominio', 2, 20),
(8, 'Modelo de casos de uso', 2, 20),
(9, 'Descripciones casos de uso y diagramas de secuencia', 2, 20),
(10, 'Presentacion y defensa', 2, 10),
(11, 'Calidad de la construccion', 3, 20),
(12, 'Atencion al tema', 3, 20),
(13, 'Creatividad', 3, 20),
(14, 'Tiempo y esfuerzo', 3, 20),
(15, 'Estructura', 3, 20);

-- --------------------------------------------------------
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
`MATERIA_RESPONSABLE` varchar(25) COLLATE latin1_spanish_ci NOT NULL,
`MATERIA_DESCRIPCION` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `MATERIA`
--

INSERT INTO `MATERIA` (`MATERIA_ID`, `MATERIA_NOM`, `MATERIA_CREDITOS`, `MATERIA_DEPARTAMENTO`, `MATERIA_TITULACION`, `MATERIA_RESPONSABLE`,`MATERIA_DESCRIPCION`) VALUES
(1, 'Interfaces de Usuario', 6, 'Informatica', 'Ingenieria Informatica', 'RESPONSABLE', 'Creacion, construccion y evaluacion de interfaces'),
(2, 'Centros de Datos', 6, 'Informatica', 'Ingenieria Informatica', 'RESPONSABLE', 'Integracion de sistemas y redes');

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
`MATRICULA_ID` int(10) NOT NULL,
`MATRICULA_ALUMNO` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
`MATRICULA_MATERIA` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `MATRICULA`
--

INSERT INTO `MATRICULA` (`MATRICULA_ID`, `MATRICULA_ALUMNO`, `MATRICULA_MATERIA`) VALUES
(1,'34879350R', 1),
(2,'34879350R', 2),
(3,'44841787K', 1),
(4,'76583535K', 2);

--
-- Estructura de tabla para la tabla `NIVEL`
--

CREATE TABLE IF NOT EXISTS `NIVEL` (
`NIVEL_ID` int(10) NOT NULL,
`NIVEL_DESCRIPCION` varchar(1000) COLLATE utf8_spanish_ci,
`NIVEL_ITEM` int(10) NOT NULL,
`NIVEL_RUBRICA` int(10) NOT NULL,
`NIVEL_PORCENTAJE` int(2)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `NIVEL`
--

INSERT INTO `NIVEL` (`NIVEL_ID`, `NIVEL_DESCRIPCION`, `NIVEL_ITEM`, `NIVEL_RUBRICA`, `NIVEL_PORCENTAJE`) VALUES
(1, 'El informe del proyecto(pdf) contiene toda la informacion necesaria, expresada de modo adecuado. No se aportan contenidos vacios ni innecesarios.', 1, 1, 100),
(2, 'El informe del proyecto (pdf) contiene la mayoria de la informacion necesaria, expresada de modo aceptable. No se aportan en general contenidos vacios ni innecesarios, pero hay algunos fallos.', 1, 1, 75),
(3, 'El informe del proyecto (pdf) no contiene una parte importante de la informacion necesaria, ni esta expresada de modo adecuado. Se aportan varios contenidos vacios e innecesarios.', 1, 1, 50),
(4, 'El informe del proyecto (pdf) carece de gran parte de la informacion necesaria, y la que hay esta pobremente reflejada. Se aporta una gran cantidad de contenidos vacios e innecesarios.', 1, 1, 25),
(5, 'La redaccion del enunciado del problema, asi como el analisis textual y de requerimientos son muy buenos, claros y concisos, y sin faltas de ortografias.', 2, 1, 100),
(6, 'La redaccion del enunciado del problema, asi como el analisis textual y de requerimientos son aceptables, y bastante claros, aunque hay algunas faltas de ortografia y/o algunos aspectos mejorables.', 2, 1, 75),
(7, 'La redaccion del enunciado del problema, asi como el analisis textual y de requerimientos son mediocres, con faltas de ortografia y falta de precision y definicion de contenidos.', 2, 1, 50),
(8, 'La redaccion del enunciado del problema, asi como el analisis textual y de requerimientos, son muy basicos, carentes de claridad, y llenos de faltas de ortografia. Ademas, no se presentan los requerimientos basicos del sistema', 2, 1, 25),
(9, 'La seleccion de clases candidatas es muy acertada. Las definiciones de las mismas son perfectas y no se confunden con atributos de otras clases', 3, 1, 100),
(10, 'La seleccion de clases candidatas es medianamente correcta. Las definiciones de las mismas son bastante adecuadas, aunque hay algunos fallos y/o se confunden algunas clases con atributos.', 3, 1, 75),
(11, 'La seleccion de clases candidatas no es muy acertada. Las definiciones de las mismas son, en ocasiones, incorrectas, y falta un numero considerable de clases y atributos', 3, 1, 50),
(12, 'La seleccion de clases candidatas es mala. No existen definiciones o son incorrectas, se confunden clases con atributos, y faltan una gran cantidad de clases basicas.', 3, 1, 25),
(13, 'El modelo de dominio esta bien organizado, es elegante, las relaciones son adecuadas y las multiplicidades son correctas. La notacion es correcta. Se entiende perfectamente.', 4, 1, 100),
(14, 'El modelo de dominio esta bien organizado, aunque es mejorable. Las relaciones y multiplicidades estan bastante bien, aunque hay algunos fallos, y eso lleva a que no se entienda por completo.', 4, 1, 75),
(15, 'El modelo de dominio es muy mejorable. Faltan relaciones y multiplicidades, o las que hay no son adecuadas, lo cual dificulta la comprension del modelo. Aparecen elementos incorrectos.', 4, 1, 50),
(16, 'El modelo de dominio es de muy baja calidad. En su mayoria, las relaciones no son adecuadas y las multiplicidades son incorrectas. No se entiende', 4, 1, 25),
(17, 'El informe del proyecto (pdf) contiene toda la informacion necesaria, expresada de modo adecuado. No se aportan contenidos vacios ni innecesarios.', 5, 2, 100),
(18, 'El informe del proyecto (pdf) contiene la mayoria de la informacion necesaria, expresada de modo aceptable. No se aportan en general contenidos vacios ni innecesarios, pero hay algunos fallos.', 5, 2, 75),
(19, 'El informe del proyecto (pdf) no contiene una parte importante de la informacion necesaria, ni esta expresada de modo adecuado. Se aportan varios contenidos vacios e innecesarios.', 5, 2, 50),
(20, 'El informe del proyecto (pdf) carece de gran parte de la informacion necesaria, y la que hay esta pobremente reflejada. Se aporta una gran cantidad de contenidos vacios e innecesarios.', 5, 2, 25),
(21, 'La redaccion del enunciado del problema, asi como el analisis textual y de requerimientos son muy buenos, claros y concisos, y sin faltas de ortografias.', 6, 2, 100),
(22, 'La redaccion del enunciado del problema, asi como el analisis textual y de requerimientos son aceptables, y bastante claros, aunque hay algunas faltas de ortografia y/o algunos aspectos mejorables.', 6, 2, 75),
(23, 'La redaccion del enunciado del problema, asi como el analisis textual y de requerimientos son mediocres, con faltas de ortografia y falta de precision y definicion de contenidos.', 6, 2, 50),
(24, 'La redaccion del enunciado del problema, asi como el analisis textual y de requerimientos, son muy basicos, carentes de claridad, y llenos de faltas de ortografia. Ademas, no se presentan los requerimientos basicos del sistema', 6, 2, 25),
(25, 'El modelo de dominio esta bien organizado, es elegante, las relaciones son adecuadas y las multiplicidades son correctas. La notacion es correcta. Se entiende perfectamente.', 7, 2, 100),
(26, 'El modelo de dominio esta bien organizado, aunque es mejorable. Las relaciones y multiplicidades estan bastante bien, aunque hay algunos fallos, y eso lleva a que no se entienda por completo.', 7, 2, 75),
(27, 'El modelo de dominio es muy mejorable. Faltan relaciones y multiplicidades, o las que hay no son adecuadas, lo cual dificulta la comprension del modelo. Aparecen elementos incorrectos.', 7, 2, 50),
(28, 'El modelo de dominio es de muy baja calidad. En su mayoria, las relaciones no son adecuadas y las multiplicidades son incorrectas. No se entiende', 7, 2, 25),
(29, 'El modelo de casos de uso esta bien organizado, es elegante. Se reflejan todos los actores y los casos de uso principales, asi como las relaciones de extension e inclusion. Se entiende perfectamente.', 8, 2, 100),
(30, 'El modelo de casos de uso esta bien organizado, aunque hay algunos fallos y eso lleva a que no se entienda por completo (por ejemplo, los nombres de los casos de uso, falta algun actor, algun caso de uso, alguna relacion…).', 8, 2, 75),
(31, 'El modelo de casos de uso es muy mejorable. Faltan actores y casos de uso, las relaciones de inclusion y/o extension no son correctas, o los nombres de los casos de uso no son correctos, lo que dificulta la comprension del modelo.', 8, 2, 50),
(32, 'El modelo de casos de uso es de muy baja calidad. En su mayoria, los casos de uso no son correctos, faltan actores, y las relaciones de inclusion y extension son incorrectas. No se entiende. ', 8, 2, 25),
(33, 'Las descripciones y los diagramas de secuencia estan correctos, organizados y bien escritos. Se entienden perfectamente. Las descripciones y diagramas son coherentes entre si.', 9, 2, 100),
(34, 'Las descripciones y diagramas de secuencia son correctos, si bien hay algunos errores, faltan algunos pasos, o hay algun problema de incoherencia entre descripciones y diagramas.', 9, 2, 75),
(35, 'Las descripciones y diagramas de secuencia son muy mejorables. Faltan pasos importantes, hay errores y/o hay incoherencias entre descripciones y diagramas', 9, 2, 50),
(36, 'Las descripciones y diagramas de secuencia son de muy baja calidad. Faltan muchos pasos importantes y/o hay graves errores y/o hay importantes incoherencias entre descripciones y diagramas', 9, 2, 25),
(37, 'Los alumnos se expresan brillantemente y transmiten perfectamente en que consistio su trabajo. Responden correctamente y con seguridad a las cuestiones planteadas', 10, 2, 100),
(38, 'Los alumnos se expresan con correccion y consiguen transmitir las principales caracteristicas de su trabajo. La presentacion genera interes hasta el final. Responden correctamente a las cuestiones planteadas.', 10, 2, 75),
(39, 'Los alumnos no se expresan con correccion. No transmiten claramente en que consistio el trabajo. La presentacion genera poco interes. No responden correctamente ni con seguridad a algunas de las cuestiones planteadas', 10, 2, 50),
(40, 'Los alumnos no se expresan con correccion. No se comprende bien en que consistio el trabajo. La presentacion transmite aburrimiento y no genera interes. No se ajusta al tiempo establecido.', 10, 2, 25),
(41, 'La maqueta muestra una considerable atencion en su construccion. Todos los elementos estan cuidadosamente y seguramente pegados al fondo. Sus componentes estan nitidamente presentados con muchos detalles. No hay marcas, rayones o manchas de pegamento. Nada cuelga de los bordes', 11, 3, 100),
(42, 'La maqueta muestra atencion en su construccion. Todos los elementos estan cuidadosamente y seguramente pegados al fondo. Sus componentes estan nitidamente presentados con algunos detalles. Tiene algunas marcas notables, rayones o manchas de pegamento presentes. Nada cuelga de los bordes.', 11, 3, 90),
(43, 'La maqueta muestra algo de atencion en su construccion. Todos los elementos estan seguramente pegados al fondo. Hay unas pocas marcas notables, rayones o manchas de pegamento presentes. Nada cuelga de los bordes.', 11, 3, 80),
(44, 'La maqueta muestra poca atencion en su construccion. Ausencia de elementos. Algunos los elementos no estan seguramente pegados al fondo. Hay marcas notables, rayones o manchas de pegamento presentes. Existen elementos que cuelgan de los bordes', 11, 3, 50),
(45, 'La maqueta fue construida descuidadamente, los elementos parecen estar "puestos al azar". Hay piezas sueltas sobre los bordes. Rayones, manchas, rupturas, bordes no nivelados y /o las marcas son evidentes', 11, 3, 25),
(46, 'El estudiante da una explicacion razonable de como cada elemento en la maqueta esta relacionado al tema asignado. Para la mayoria de los elementos, la relacion es clara sin ninguna explicacion', 12, 3, 100),
(47, 'El estudiante da una explicacion razonable de como la mayoria de los elementos en la maqueta estan relacionados con el tema asignado. Para la mayoria de los elementos, la relacion esta clara sin ninguna explicacion', 12, 3, 90),
(48, 'El estudiante da una explicacion bastante clara de como los elementos en la maqueta estan relacionados al tema asignado.', 12, 3, 80),
(59, 'El estudiante da una explicacion breve e insegura de como los elementos en la maqueta estan relacionados al tema asignado', 12, 3, 50),
(50, 'Las explicaciones del estudiante son vagas e ilustran su dificultad en entender como los elementos estan relacionados con el tema asignado', 12, 3, 25),
(51, 'Todos de los objetos usados en la maqueta reflejan un excepcional grado de creatividad del estudiante en su creacion y/o exhibicion', 13, 3, 100),
(52, 'Varios de los objetos usados en la maqueta reflejan la creatividad del estudiante en su creacion y/o', 13, 3, 90),
(53, 'Uno u dos objetos fue hecho o personalizado por el estudiante, pero las ideas eran tipicas mas que creativas.', 13, 3, 80),
(54, 'Un objeto fue hecho o personalizado por el estudiante, pero las ideas poco creativas.', 13, 3, 50),
(55, 'El estudiante no hizo o personalizo ninguno de los elementos en la maqueta.', 13, 3, 25),
(56, 'El tiempo de la clase fue usado sabiamente. Mucho del tiempo y esfuerzo estuvo en la planeacion y arquitectura de la maqueta. Es claro que el estudiante trabajo en su hogar asi como en la escuela', 14, 3, 100),
(57, 'El tiempo de la clase fue usado sabiamente. El estudiante pudo haber puesto mas tiempo y esfuerzo de trabajo en su hogar.', 14, 3, 90),
(58, 'El tiempo de la clase no fue usado sabiamente. El estudiante pudo haber puesto mas tiempo y esfuerzo de trabajo en su hogar', 14, 3, 80),
(59, 'El tiempo de clase ocasionalmente fue usado sabiamente, pero el estudiante no realizo trabajo adicional en su hogar.', 14, 3, 50),
(60, 'El tiempo de clase no fue usado sabiamente y el estudiante no puso esfuerzo adicional.', 14, 3, 25),
(41, 'Todos los componentes reflejan una representacion autentica del tema asignado. La arquitectura de la maqueta esta muy bien organizada', 15, 3, 100),
(42, 'La mayoría de los componentes reflejan una representacion autentica del tema asignado. La arquitectura de la maqueta esta bien organizada.', 15, 3, 90),
(43, 'Algunos de los componentes reflejan una representacion autentica del tema asignado. La arquitectura de la maqueta esta bastante bien organizada.', 15, 3, 80),
(44, 'Pocos componentes reflejan una representacion autentica del tema asignado. La arquitectura de la maqueta esta bien organizado.', 15, 3, 50),
(45, 'Ninguno de los componentes reflejan una representacion autentica del tema asignado. La arquitectura de la maqueta no tiene orden.', 15, 3, 25);
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
(500, '../Views/CORRECCIONES_SHOWALL_Vista.php','CORRECCION SHOWALL'),
(501,'../Views/CORRECCIONES_DELETE_Vista.php','CORRECCION DELETE'),
(502,'../Views/CORRECCIONES_SHOW_Vista.php','CORRECCION SHOW'),
(503,'../Views/CORRECCIONES_SHOWCURRENT_Vista.php','CORRECCION SHOWCURRENT'),
(504,'../Views/CORRECCIONES_ADD_ENTREGA_Vista.php','CORRECCION ADD ENTREGA'),
(505,'../Views/CORRECCIONES_ADD_RUBRICA_Vista.php','CORRECCION ADD RUBRICA'),
(506,'../Views/CORRECCIONES_ADD_Vista.php','CORRECCION_ADD'),
(507,'../Views/CORRECCIONES_EDIT_Vista.php','CORRECCION_EDIT'),
(600, '../Views/ITEM_ADD_Vista.php', 'ITEM ADD'),
(601, '../Views/ITEM_DELETE_Vista.php', 'ITEM DELETE'),
(602, '../Views/ITEM_EDIT_Vista.php', 'ITEM EDIT'),
(603, '../Views/ITEM_SHOWALL_Vista.php', 'ITEM SHOWALL'),
(604, '../Views/ITEM_SHOWCURRENT_Vista.php', 'ITEM SHOWCURRENT'),
(607, '../Views/NIVEL_EDIT_Vista.php', 'NIVEL EDIT'),
(608, '../Views/NIVEL_SHOWALL_Vista.php', 'NIVEL SHOWALL'),
(609, '../Views/NIVEL_SHOWCURRENT_Vista.php', 'NIVEL SHOWCURRENT'),
(900, '../Views/MATERIA_ADD_Vista.php', 'MATERIA ADD'),
(901, '../Views/MATERIA_DELETE_Vista.php', 'MATERIA DELETE'),
(902, '../Views/MATERIA_EDIT_Vista.php', 'MATERIA EDIT'),
(903, '../Views/MATERIA_SHOWALL_Vista.php', 'MATERIA SHOWALL'),
(904, '../Views/MATERIA_SHOWCURRENT_Vista.php', 'MATERIA SHOWCURRENT'),
(905, '../Views/MATERIA_ADD_PROFESOR_Vista.php', 'MATERIA ADD PROFESOR'),
(906, '../Views/MATERIA_SHOW_PROFESORES_Vista.php', 'MATERIA SHOW PROFESORES'),
(907, '../Views/MATERIA_SHOW_ALUMNOS_Vista.php', 'MATERIA SHOW ALUMNOS'),

(920, '../Views/INSCRIPCION_ADD_Vista.php', 'INSCRIPCION ADD'),
(921, '../Views/INSCRIPCION_DELETE_Vista.php', 'INSCRIPCION DELETE'),
(922, '../Views/INSCRIPCION_EDIT_Vista.php', 'INSCRIPCION EDIT'),
(923, '../Views/INSCRIPCION_SHOWALL_Vista.php', 'INSCRIPCION SHOWALL'),
(924, '../Views/INSCRIPCION_SHOWCURRENT_Vista.php', 'INSCRIPCION SHOWCURRENT'),
(925, '../Views/INSCRIPCION_ACCEPT_Vista.php', 'INSCRIPCION ACCEPT');


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
(3, 200),
(4, 200),
(4,5),
(1,300),
(4,300),
(2,301),
(3,301),
(1,400),
(4,400),
(1, 500),
(2, 500),
(3, 500),
(4, 500),
(1, 600),
(2, 600),
(4, 600),
(1,900),
(4,900),
(2,900),
(3,900),
(1,920),
(4,920);

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
(1, 'Rubrica Trabajo ISI ET1', 'Primera entrega ISI 2016/2017 ', 4, '70561875Z'),
(2, 'Rubrica Trabajo ISI ET2', 'Segunda entrega ISI 2016/2017', 6, '86723680H'),
(3, 'Rubrica Proyecto Maqueta', 'Proyecto de construccion y exposicion', 5, '70561875Z');

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
`TRABAJO_FECHA_INICIO` DATETIME NOT NULL,
`TRABAJO_FECHA_FIN` DATETIME NOT NULL,
`TRABAJO_FECHA_CREACION` DATETIME NOT NULL
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
('ALUMNO2', '147b9f5076ae6340663353a96b87062e', 'Maria', 'Alvarez', '76583535K', '1990-10-14', 'maria.alvarez@gmail.com', 663656666,'20770024003102575766','calle 6', NULL, 3, 'Activo', NULL),
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
('ADMIN', 900),
('ADMIN', 901),
('ADMIN', 902),
('ADMIN', 903),
('ADMIN', 904),
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
('PROFESOR', 900),
('PROFESOR', 901),
('PROFESOR', 902),
('PROFESOR', 903),
('PROFESOR', 904),
('RESPONSABLE', 100),
('RESPONSABLE', 101),
('RESPONSABLE', 102),
('RESPONSABLE', 103),
('RESPONSABLE', 104),
('RESPONSABLE', 900),
('RESPONSABLE', 901),
('RESPONSABLE', 902),
('RESPONSABLE', 903),
('RESPONSABLE', 904),
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
('ADMIN',500),
('ALUMNO',500),
('ADMIN',501),
('ADMIN',502),
('ADMIN',503),
('ADMIN',504),
('ADMIN',505),
('ADMIN',506),
('ADMIN',507),
('PROFESOR',500),
('PROFESOR',501),
('PROFESOR',502),
('PROFESOR',503),
('PROFESOR',504),
('PROFESOR',505),
('PROFESOR',506),
('PROFESOR',507),
('RESPONSABLE',500),
('RESPONSABLE',501),
('RESPONSABLE',502),
('RESPONSABLE',503),
('RESPONSABLE',504),
('RESPONSABLE',505),
('RESPONSABLE',506),
('RESPONSABLE',507),
('ALUMNO',303),
('ALUMNO',304),
('ALUMNO',203),
('ALUMNO',204),
('ALUMNO',903),
('ALUMNO',904),
('ALUMNO2',303),
('ALUMNO2',304),
('ALUMNO2',203),
('ALUMNO2',204),
('ALUMNO2',903),
('ALUMNO2',904),
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
('ADMIN', 607),
('ADMIN', 608),
('ADMIN', 609),
('PROFESOR', 607),
('PROFESOR', 608),
('PROFESOR', 609),
('RESPONSABLE', 607),
('RESPONSABLE', 608),
('RESPONSABLE', 609),
('ADMIN', 905),
('ADMIN', 906),
('RESPONSABLE', 905),
('RESPONSABLE', 906),
('RESPONSABLE', 907),
('ADMIN', 907),
('ADMIN', 920),
('ADMIN', 921),
('ADMIN', 922),
('ADMIN', 923),
('ADMIN', 924),
('ADMIN', 925),
('PROFESOR', 923),
('PROFESOR', 924),
('ALUMNO', 920),
('ALUMNO', 921),
('ALUMNO', 922),
('ALUMNO', 923),
('ALUMNO', 924),
('RESPONSABLE', 920),
('RESPONSABLE', 921),
('RESPONSABLE', 922),
('RESPONSABLE', 923),
('RESPONSABLE', 924),
('RESPONSABLE', 925);


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
-- AUTO_INCREMENT de la tabla `DOCUMENTACION`
--
ALTER TABLE `DOCUMENTACION`
MODIFY `DOCUMENTACION_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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

