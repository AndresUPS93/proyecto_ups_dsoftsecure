-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-07-2019 a las 21:35:59
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbasu`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_actividades`
--

CREATE TABLE `tb_actividades` (
  `ID_ACTIVIDAD` int(11) NOT NULL,
  `ID_GRUPO` int(11) DEFAULT NULL,
  `NOMBRE_ACTIVIDAD` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `FECHA_ACTIVIDAD` date NOT NULL,
  `LUGAR` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_actividades`
--

INSERT INTO `tb_actividades` (`ID_ACTIVIDAD`, `ID_GRUPO`, `NOMBRE_ACTIVIDAD`, `FECHA_ACTIVIDAD`, `LUGAR`) VALUES
(1, 1, 'Visita al hogar Santa Lucía', '2019-07-13', 'Hogar Santa Lucí­a'),
(3, 1, 'Dia del padre', '2019-07-20', 'Centro del adulto mayor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_animador`
--

CREATE TABLE `tb_animador` (
  `ID_ANIMADOR` int(11) NOT NULL,
  `CEDULA` char(10) COLLATE utf8_spanish_ci NOT NULL,
  `NOMBRES_ANIMADOR` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `APELLIDOS_ANIMADOR` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `CARGO` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `TELEFONO` char(9) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CELULAR` char(10) COLLATE utf8_spanish_ci NOT NULL,
  `CORREO` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `USUARIO` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `CLAVE` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_animador`
--

INSERT INTO `tb_animador` (`ID_ANIMADOR`, `CEDULA`, `NOMBRES_ANIMADOR`, `APELLIDOS_ANIMADOR`, `CARGO`, `TELEFONO`, `CELULAR`, `CORREO`, `USUARIO`, `CLAVE`) VALUES
(1, '1721453234', 'Silvia María', 'Gómez Andrade', 'Técnico Docente', '', '0982345654', 'sgomez@est.ups.edu.ec', '1721453234', '1721453234'),
(2, '1721453235', 'Angelica María', 'Naula', 'Trabajadora Social', '3962800', '0987898765', 'anaula@est.ups.edu.ec', '1721453235', '1721453235'),
(3, '1734543445', 'Manuel Darío', 'Jaramillo Monge', 'Docente', '', '0956787654', 'mjaramillo@ups.edu.ec', '1734543445', '1734543445');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_carrera`
--

CREATE TABLE `tb_carrera` (
  `ID_CARRERA` int(11) NOT NULL,
  `NOMBRE_CARRERA` varchar(26) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_carrera`
--

INSERT INTO `tb_carrera` (`ID_CARRERA`, `NOMBRE_CARRERA`) VALUES
(1, 'Sistemas'),
(2, 'Electrónica'),
(3, 'Civil'),
(4, 'Mecatrónica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_coordinador`
--

CREATE TABLE `tb_coordinador` (
  `ID_COORDINADOR` int(11) NOT NULL,
  `NOMBRES_COORDINADOR` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `APELLIDOS_COORDINADOR` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `CEDULA` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `CARGO` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `CELULAR` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `TELEFONO` varchar(9) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CORREO` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `USUARIO` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `CLAVE` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_coordinador`
--

INSERT INTO `tb_coordinador` (`ID_COORDINADOR`, `NOMBRES_COORDINADOR`, `APELLIDOS_COORDINADOR`, `CEDULA`, `CARGO`, `CELULAR`, `TELEFONO`, `CORREO`, `USUARIO`, `CLAVE`) VALUES
(1, 'Francisco', 'Mejia', '1732456540', 'Coordinador general de lo', '0982345654', '', 'fmejia@est.ups.edu.ec', '1732456540', '1732456540');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estudiante`
--

CREATE TABLE `tb_estudiante` (
  `ID_ESTUDIANTE` int(11) NOT NULL,
  `ID_GRUPO` int(11) DEFAULT NULL,
  `ID_CARRERA` int(11) DEFAULT NULL,
  `CEDULA` char(10) COLLATE utf8_spanish_ci NOT NULL,
  `NOMBRES` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `APELLIDOS` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `TELEFONO` char(9) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CELULAR` char(10) COLLATE utf8_spanish_ci NOT NULL,
  `CORREO` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `NIVEL` int(11) NOT NULL,
  `ROL` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `FOTO` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_estudiante`
--

INSERT INTO `tb_estudiante` (`ID_ESTUDIANTE`, `ID_GRUPO`, `ID_CARRERA`, `CEDULA`, `NOMBRES`, `APELLIDOS`, `TELEFONO`, `CELULAR`, `CORREO`, `NIVEL`, `ROL`, `FOTO`) VALUES
(1, 1, 1, '1721965828', 'Andres Arnaldo', 'Garcia Miranda', '023010057', '0987148042', 'agarciam2@est.ups.edu.ec', 8, 'Coordinador', 'fotos/descarga2.jpg'),
(2, 2, 1, '1734567656', 'Jairo', 'Castellanos', '023454345', '0989096543', 'jcastellanos@est.ups.edu.', 8, 'Integrante', 'fotos/img3.jpg'),
(3, 1, 3, '1765678987', 'Daniela', 'Carrera', '023456765', '0987734543', 'dcarrera@est.ups.edu.ec', 6, 'Integrante', 'fotos/descarga.jpg'),
(4, 2, 2, '1745654565', 'Pablo Andres', 'Laverde Collaguazo', '', '0985456788', 'pablo.laverde@epn.edu.ec', 7, 'Coordinador', 'img6.jpg'),
(5, 2, 1, '1723432347', 'Liseth Liliana', 'Carlosama CarriÃ³n', '', '0982347656', 'lcarlosama@est.ups.edu.ec', 9, 'Integrante', 'img7.jpg'),
(6, 1, 3, '1787678987', 'Diana Lilibet', 'Basantes Espinoza', '', '0984567654', 'dbasantes@est.ups.edu.ec', 7, 'Integrante', 'fotos/img4.jpg'),
(7, 1, 4, '1765234543', 'Liliana Elizabeth', 'Quilo Peña', '', '0998678885', 'lquilo@est.ups.edu.ec', 5, 'Integrante', 'img9.jpg'),
(8, 1, 2, '9999999999', 'Carla ', 'Restrepo', '3111845', '0987654321', 'crestreto@gmail.com', 3, 'Integrante', 'fotos/images.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_grupo`
--

CREATE TABLE `tb_grupo` (
  `ID_GRUPO` int(11) NOT NULL,
  `ID_ANIMADOR` int(11) DEFAULT NULL,
  `ID_COORDINADOR` int(11) DEFAULT NULL,
  `NOMBRE_GRUPO` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `DESCRIPCION` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  `MISION` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `VISION` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `ACTIVIDADES` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  `NUMERO_DE_INTEGRANTES` int(11) NOT NULL,
  `AREA` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_grupo`
--

INSERT INTO `tb_grupo` (`ID_GRUPO`, `ID_ANIMADOR`, `ID_COORDINADOR`, `NOMBRE_GRUPO`, `DESCRIPCION`, `MISION`, `VISION`, `ACTIVIDADES`, `NUMERO_DE_INTEGRANTES`, `AREA`) VALUES
(1, 1, 1, 'Grupo de Voluntariado Mahatma Gandhi', 'El Grupo de Voluntariado Mahatma Gandhi es un espacio para vivir la solidaridad con los demÃ¡s como respuesta a la bÃºsqueda de justicia social, coherencia y generosidad hacia los mÃ¡s necesitados. Quienes integran este grupo tienen como propÃ³sito servir de manera desinteresada en sectores vulnerables de su sector.\r\nLos/as jÃ³venes proponen iniciativas que promueven el trabajo en equipo y fortale', 'El Grupo de Voluntariado Mahatma Gandhi genera espacios de crecimiento personal y compromiso social; busca formar a los jÃ³venes como \"buenos cristianos y honrados ciudadanos\", con calidad humana y se', 'El Grupo de Voluntariado Mahatma Gandhi espera incidir positivamente en la vida de los jÃ³venes que lo integran, despertando su interÃ©s en temas sociales, dando respuestas; a necesidades y problemÃ¡t', '-Reuniones formativas una vez a la semana.\r\n-Acción social una o dos veces al mes en instituciones públicas o privadas de la ciudad de Quito.\r\n-Clasificación y distribución de vÃ­veres, juguetes y caramelos en la Campaña Solidaria, organizada en diciembre de cada año por la Pastoral Universitaria.', 15, 'Socio Político de Pastoral'),
(2, 2, 1, 'Jóvenes por el Futuro', 'El Grupo JÃ³venes por el Futuro estÃ¡ conformado por estudiantes universitarios que buscan sensibilizar a miembros de la Comunidad Universitaria a travÃ©s de talleres, proyectos sociales y otras actividades. Como grupo deseamos alcanzar una consolidaciÃ³n entre sus integrantes a travÃ©s de:\r\n-Apoyo emocional y crecimiento personal.\r\n-Altos grados de autoestima y solidaridad.\r\n-Ser un grupo con hÃ¡', 'Jóvenes por el Futuro es un grupo ASU de inspiraciÃ³n salesiana y de Ã­ndole social, polÃ­tica e inclusiva. Que busca fomentar la participaciÃ³n de la Comunidad Universitaria, dirigida de manera pref', 'Al 2022 es un grupo de inclusiÃ³n educativa, que genera un ambiente de familiaridad y confianza entre todos los miembros de la Comunidad Educativa de las instituciones Salesianas de EducaciÃ³n Superio', '-Talleres de Formación para integrantes del grupo.\r\n-Talleres de Formación para la Comunidad Universitaria.\r\n-Cursos de desarrollo social y personal para la Comunidad Universitaria.\r\n-Labores Sociales\r\n-CampaÃ±as de sensibilización para la Comunidad Universitaria.', 20, 'Socio Político de Bienestar Estudiantil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_historial`
--

CREATE TABLE `tb_historial` (
  `id_estudiante` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `id_actividad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_historial`
--

INSERT INTO `tb_historial` (`id_estudiante`, `id_actividad`) VALUES
('1765678987', 1),
('1765234543', 1),
('9999999999', 1),
('9999999999', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_historico`
--

CREATE TABLE `tb_historico` (
  `ID_HISTORICO` date NOT NULL,
  `ID_ESTUDIANTE` int(11) DEFAULT NULL,
  `FECHA_INGRESO` date NOT NULL,
  `FECHA_SALIDA` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_salud`
--

CREATE TABLE `tb_salud` (
  `ID_SALUD` int(11) NOT NULL,
  `ID_ESTUDIANTE` int(11) DEFAULT NULL,
  `ENFERMEDAD` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ALERGIAS` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `MEDICACION` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_actividades`
--
ALTER TABLE `tb_actividades`
  ADD PRIMARY KEY (`ID_ACTIVIDAD`),
  ADD KEY `FK_RELATIONSHIP_6` (`ID_GRUPO`);

--
-- Indices de la tabla `tb_animador`
--
ALTER TABLE `tb_animador`
  ADD PRIMARY KEY (`ID_ANIMADOR`);

--
-- Indices de la tabla `tb_carrera`
--
ALTER TABLE `tb_carrera`
  ADD PRIMARY KEY (`ID_CARRERA`);

--
-- Indices de la tabla `tb_coordinador`
--
ALTER TABLE `tb_coordinador`
  ADD PRIMARY KEY (`ID_COORDINADOR`);

--
-- Indices de la tabla `tb_estudiante`
--
ALTER TABLE `tb_estudiante`
  ADD PRIMARY KEY (`ID_ESTUDIANTE`),
  ADD KEY `FK_RELATIONSHIP_2` (`ID_GRUPO`),
  ADD KEY `FK_RELATIONSHIP_3` (`ID_CARRERA`);

--
-- Indices de la tabla `tb_grupo`
--
ALTER TABLE `tb_grupo`
  ADD PRIMARY KEY (`ID_GRUPO`),
  ADD KEY `FK_RELATIONSHIP_4` (`ID_ANIMADOR`),
  ADD KEY `FK_RELATIONSHIP_7` (`ID_COORDINADOR`);

--
-- Indices de la tabla `tb_historico`
--
ALTER TABLE `tb_historico`
  ADD PRIMARY KEY (`ID_HISTORICO`),
  ADD KEY `FK_RELATIONSHIP_5` (`ID_ESTUDIANTE`);

--
-- Indices de la tabla `tb_salud`
--
ALTER TABLE `tb_salud`
  ADD PRIMARY KEY (`ID_SALUD`),
  ADD KEY `FK_RELATIONSHIP_1` (`ID_ESTUDIANTE`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_actividades`
--
ALTER TABLE `tb_actividades`
  MODIFY `ID_ACTIVIDAD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_animador`
--
ALTER TABLE `tb_animador`
  MODIFY `ID_ANIMADOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_carrera`
--
ALTER TABLE `tb_carrera`
  MODIFY `ID_CARRERA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tb_coordinador`
--
ALTER TABLE `tb_coordinador`
  MODIFY `ID_COORDINADOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tb_estudiante`
--
ALTER TABLE `tb_estudiante`
  MODIFY `ID_ESTUDIANTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tb_grupo`
--
ALTER TABLE `tb_grupo`
  MODIFY `ID_GRUPO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tb_salud`
--
ALTER TABLE `tb_salud`
  MODIFY `ID_SALUD` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_actividades`
--
ALTER TABLE `tb_actividades`
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`ID_GRUPO`) REFERENCES `tb_grupo` (`ID_GRUPO`);

--
-- Filtros para la tabla `tb_estudiante`
--
ALTER TABLE `tb_estudiante`
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`ID_GRUPO`) REFERENCES `tb_grupo` (`ID_GRUPO`),
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ID_CARRERA`) REFERENCES `tb_carrera` (`ID_CARRERA`);

--
-- Filtros para la tabla `tb_grupo`
--
ALTER TABLE `tb_grupo`
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`ID_ANIMADOR`) REFERENCES `tb_animador` (`ID_ANIMADOR`),
  ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`ID_COORDINADOR`) REFERENCES `tb_coordinador` (`ID_COORDINADOR`);

--
-- Filtros para la tabla `tb_historico`
--
ALTER TABLE `tb_historico`
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`ID_ESTUDIANTE`) REFERENCES `tb_estudiante` (`ID_ESTUDIANTE`);

--
-- Filtros para la tabla `tb_salud`
--
ALTER TABLE `tb_salud`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`ID_ESTUDIANTE`) REFERENCES `tb_estudiante` (`ID_ESTUDIANTE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
