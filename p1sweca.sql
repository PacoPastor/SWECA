-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-11-2016 a las 16:15:54
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `p1sweca`
--
CREATE DATABASE IF NOT EXISTS `p1sweca` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `p1sweca`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Dimensiones`
--

CREATE TABLE `Dimensiones` (
  `id` int(11) NOT NULL,
  `id_Estudio` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `comentario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Dimensiones`
--

INSERT INTO `Dimensiones` (`id`, `id_Estudio`, `nombre`, `comentario`) VALUES
(1, 1, 'Preguntas de caracter general y personal', 'Para las siguientes 4 preguntas se le ofrecerán las posibles respuestas. Elija aquellas que se correspondan con su perfil.'),
(2, 1, 'Preguntas de valor afectivo del servicio', 'Valore el nivel de satisfacción con los servicios descritos de la biblioteca, siendo un 0 la menor de las satisfacciones y un 9 la mayor.'),
(3, 1, 'Preguntas sobre la biblioteca como espacio', 'Valore el nivel de satisfacción con los espacios descritos de la biblioteca, siendo un 0 la menor de las satisfacciones y un 9 la mayor.'),
(4, 1, 'Preguntas sobre el control de la información', 'Valore el nivel de satisfacción con la información disponible en la biblioteca, siendo un 0 la menor de las satisfacciones y un 9 la mayor.'),
(5, 1, 'Observaciones', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `EncuestasRellenas`
--

CREATE TABLE `EncuestasRellenas` (
  `id` int(11) NOT NULL,
  `id_Estudio` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `hora_comienzo` varchar(255) NOT NULL,
  `hora_fin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `EncuestasRellenas`
--

INSERT INTO `EncuestasRellenas` (`id`, `id_Estudio`, `ip`, `hora_comienzo`, `hora_fin`) VALUES
(1, 1, '::1', '03/11/16 10:54:08', '03/11/16 10:56:04'),
(2, 1, '::1', '03/11/16 10:57:22', '03/11/16 10:58:00'),
(3, 1, '::1', '03/11/16 11:03:53', '03/11/16 11:06:26'),
(4, 1, '::1', '03/11/16 11:07:38', '03/11/16 11:08:33'),
(5, 1, '::1', '03/11/16 11:12:15', '03/11/16 11:12:44'),
(6, 1, '::1', '03/11/16 11:13:30', '03/11/16 11:13:46'),
(7, 1, '::1', '03/11/16 11:15:37', '03/11/16 11:16:04'),
(8, 1, '::1', '08/11/16 12:58:50', '08/11/16 12:59:37'),
(9, 1, '::1', '10/11/16 14:17:38', '10/11/16 14:18:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Estudios`
--

CREATE TABLE `Estudios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Estudios`
--

INSERT INTO `Estudios` (`id`, `nombre`) VALUES
(1, 'Biblioteca UCA 2016/2017');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Preguntas`
--

CREATE TABLE `Preguntas` (
  `id` int(11) NOT NULL,
  `id_Dimension` int(11) NOT NULL,
  `id_tipoPregunta` int(11) NOT NULL,
  `pregunta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Preguntas`
--

INSERT INTO `Preguntas` (`id`, `id_Dimension`, `id_tipoPregunta`, `pregunta`) VALUES
(1, 1, 1, '¿Qué tipo de usuario es?'),
(2, 1, 2, 'Sexo:'),
(3, 1, 3, '¿A qué facultad pertenece?'),
(4, 1, 4, '¿Qué estudios cursa?'),
(5, 2, 5, 'Calidad del servicio del personal de la biblioteca:'),
(6, 2, 5, 'Facilidad en la búsqueda de libros o información:'),
(7, 2, 5, 'Esfuerzos del personal para que el alumnado haga un uso responsable de las instalaciones:'),
(8, 2, 5, 'Calidad del nuevo sistema de gestión de la biblioteca, KOHA:'),
(9, 3, 5, 'Puestos de lectura y/o estudio:'),
(10, 3, 5, 'Salas de estudio:'),
(11, 3, 5, 'Mobiliario de biblioteca (estanterías, etiquetado y orden, ordenadores comunes):'),
(12, 3, 5, 'Conexiones a red en las Bibliotecas (WiFi y cableada):'),
(13, 4, 5, 'Recursos bibliográficos (electrónicos):'),
(14, 4, 5, 'Recursos bibliográficos (físico). Libros:'),
(15, 4, 5, 'Recursos bibliográficos (físico). Revistas:'),
(16, 4, 5, 'Catálogo de la biblioteca:'),
(17, 5, 6, 'Indique cualquier otro detalle relacionado con el sistema de biblioteca que no haya sido mencionado en las preguntas:');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Respuestas`
--

CREATE TABLE `Respuestas` (
  `id` int(11) NOT NULL,
  `id_Preguntas` int(11) NOT NULL,
  `id_EncuestasRellenas` int(11) NOT NULL,
  `respuesta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Respuestas`
--

INSERT INTO `Respuestas` (`id`, `id_Preguntas`, `id_EncuestasRellenas`, `respuesta`) VALUES
(1, 1, 1, 'Alumno'),
(2, 2, 1, 'Sin especificar'),
(3, 3, 1, 'Escuela Superior de Ingeniería'),
(4, 4, 1, 'Ingeniería Mecánica'),
(5, 5, 1, '9'),
(6, 6, 1, '8'),
(7, 7, 1, '5'),
(8, 8, 1, '9'),
(9, 9, 1, '5'),
(10, 10, 1, '7'),
(11, 11, 1, '3'),
(12, 12, 1, '8'),
(13, 13, 1, '5'),
(14, 14, 1, '7'),
(15, 15, 1, '5'),
(16, 16, 1, '9'),
(17, 17, 1, 'Me amola too'),
(18, 1, 2, 'PAS'),
(19, 2, 2, 'Hombre'),
(20, 3, 2, 'Escuela Superior de Ingeniería'),
(21, 4, 2, 'Ingeniería Informática'),
(22, 5, 2, '8'),
(23, 6, 2, '5'),
(24, 7, 2, '9'),
(25, 8, 2, '3'),
(26, 9, 2, '4'),
(27, 10, 2, '6'),
(28, 11, 2, '5'),
(29, 12, 2, '9'),
(30, 13, 2, '7'),
(31, 14, 2, '9'),
(32, 15, 2, '8'),
(33, 16, 2, '9'),
(34, 17, 2, 'Sin comentarios.'),
(35, 1, 3, 'PDI'),
(36, 2, 3, 'Mujer'),
(37, 3, 3, 'Facultad de Ciencias'),
(38, 4, 3, 'Biotecnología'),
(39, 5, 3, '9'),
(40, 6, 3, '7'),
(41, 7, 3, '7'),
(42, 8, 3, '8'),
(43, 9, 3, '9'),
(44, 10, 3, '3'),
(45, 11, 3, '6'),
(46, 12, 3, '7'),
(47, 13, 3, '8'),
(48, 14, 3, '9'),
(49, 15, 3, '9'),
(50, 16, 3, '8'),
(51, 17, 3, 'Obserbvaiicos'),
(52, 1, 4, 'PAS'),
(53, 2, 4, 'Hombre'),
(54, 3, 4, 'Facultad de Derecho'),
(55, 4, 4, 'Derecho'),
(56, 5, 4, '7'),
(57, 6, 4, '6'),
(58, 7, 4, '8'),
(59, 8, 4, '4'),
(60, 9, 4, '9'),
(61, 10, 4, '5'),
(62, 11, 4, '0'),
(63, 12, 4, '7'),
(64, 13, 4, '6'),
(65, 14, 4, '4'),
(66, 15, 4, '8'),
(67, 16, 4, '7'),
(68, 17, 4, 'fkldsfkldshfilsdjglkadsñfs'),
(69, 1, 5, 'PAS'),
(70, 2, 5, 'Hombre'),
(71, 3, 5, 'Facultad de Derecho'),
(72, 4, 5, 'Derecho'),
(73, 5, 5, '6'),
(74, 6, 5, '5'),
(75, 7, 5, '8'),
(76, 8, 5, '7'),
(77, 9, 5, '8'),
(78, 10, 5, '6'),
(79, 11, 5, '8'),
(80, 12, 5, '6'),
(81, 13, 5, '5'),
(82, 14, 5, '5'),
(83, 15, 5, '5'),
(84, 16, 5, '5'),
(85, 17, 5, 'hilfdsñga'),
(86, 1, 6, 'Alumno'),
(87, 2, 6, 'Sin especificar'),
(88, 3, 6, 'Facultad de Derecho'),
(89, 4, 6, 'Derecho'),
(90, 5, 6, '0'),
(91, 6, 6, '0'),
(92, 7, 6, '0'),
(93, 8, 6, '0'),
(94, 9, 6, '0'),
(95, 10, 6, '0'),
(96, 11, 6, '0'),
(97, 12, 6, '0'),
(98, 13, 6, '0'),
(99, 14, 6, '0'),
(100, 15, 6, '0'),
(101, 16, 6, '0'),
(102, 17, 6, 'fdsfs'),
(103, 1, 7, 'PDI'),
(104, 2, 7, 'Hombre'),
(105, 3, 7, 'Facultad de Ciencias'),
(106, 4, 7, 'Biotecnología'),
(107, 5, 7, '0'),
(108, 6, 7, '0'),
(109, 7, 7, '0'),
(110, 8, 7, '0'),
(111, 9, 7, '0'),
(112, 10, 7, '0'),
(113, 11, 7, '0'),
(114, 12, 7, '0'),
(115, 13, 7, '0'),
(116, 14, 7, '0'),
(117, 15, 7, '0'),
(118, 16, 7, '0'),
(119, 17, 7, 'Descontento absoluta.'),
(120, 1, 8, 'PAS'),
(121, 2, 8, 'Hombre'),
(122, 3, 8, 'Escuela Superior de Ingeniería'),
(123, 4, 8, 'Ingeniería Mecánica'),
(124, 5, 8, '0'),
(125, 6, 8, '0'),
(126, 7, 8, '9'),
(127, 8, 8, '0'),
(128, 9, 8, '0'),
(129, 10, 8, '0'),
(130, 11, 8, '0'),
(131, 12, 8, '0'),
(132, 13, 8, '0'),
(133, 14, 8, '0'),
(134, 15, 8, '0'),
(135, 16, 8, '0'),
(136, 17, 8, 'jajajajajaaj'),
(137, 1, 9, 'PAS'),
(138, 2, 9, 'Mujer'),
(139, 3, 9, 'Escuela Superior de Ingeniería'),
(140, 4, 9, 'Ingeniería Mecánica'),
(141, 5, 9, '6'),
(142, 6, 9, '4'),
(143, 7, 9, '8'),
(144, 8, 9, '3'),
(145, 9, 9, '8'),
(146, 10, 9, '0'),
(147, 11, 9, '0'),
(148, 12, 9, '0'),
(149, 13, 9, '0'),
(150, 14, 9, '0'),
(151, 15, 9, '0'),
(152, 16, 9, '0'),
(153, 17, 9, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `RespuestasPreg4`
--

CREATE TABLE `RespuestasPreg4` (
  `id` int(11) NOT NULL,
  `id_Dimension` int(11) NOT NULL,
  `id_Preg3` int(11) NOT NULL,
  `respuesta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `RespuestasPreg4`
--

INSERT INTO `RespuestasPreg4` (`id`, `id_Dimension`, `id_Preg3`, `respuesta`) VALUES
(1, 1, 16, 'Administración y Dirección de Empresas'),
(2, 1, 7, 'Arquitectura Naval e Ingeniería Marítima'),
(3, 1, 12, 'Biotecnología'),
(4, 1, 13, 'Ciencias de la Actividad Física y del Deporte'),
(5, 1, 14, 'Ciencias Ambientales'),
(6, 1, 14, 'Ciencias del Mar'),
(7, 1, 18, 'Criminología y Seguridad'),
(8, 1, 18, 'Derecho'),
(9, 1, 13, 'Educación Infantil'),
(10, 1, 13, 'Educación Primaria'),
(11, 1, 19, 'Enfermería (Algeciras)'),
(12, 1, 20, 'Enfermería (Cádiz)'),
(13, 1, 20, 'Enfermería (Jerez)'),
(14, 1, 12, 'Enología'),
(15, 1, 21, 'Estudios Árabes e Islámicos'),
(16, 1, 21, 'Estudios Franceses'),
(17, 1, 21, 'Estudios Ingleses'),
(18, 1, 21, 'Filología Clásica'),
(19, 1, 21, 'Filología Hispánica'),
(20, 1, 16, 'Finanzas y Contabilidad'),
(21, 1, 20, 'Fisioterapia'),
(22, 1, 17, 'Gestión y Administración Pública'),
(23, 1, 21, 'Historia'),
(24, 1, 21, 'Humanidades'),
(25, 1, 11, 'Ingeniería Aeroespacial'),
(26, 1, 9, 'Ingeniería Civil'),
(27, 1, 11, 'Ingeniería en Diseño Industrial y Desarrollo de Producto'),
(28, 1, 8, 'Ingeniería Radioelectrónica'),
(29, 1, 9, 'Ingeniería en Tecnologías Industriales (Algeciras)'),
(30, 1, 11, 'Ingeniería en Tecnologías Industriales (Cádiz)'),
(31, 1, 11, 'Ingeniería Eléctrica'),
(32, 1, 11, 'Ingeniería Electrónica Industrial'),
(33, 1, 11, 'Ingeniería Mecánica'),
(34, 1, 11, 'Ingeniería Informática'),
(35, 1, 12, 'Ingeniería Química'),
(36, 1, 21, 'Lingüística y Lenguas Aplicadas'),
(37, 1, 17, 'Marketing e Investigación de Mercados'),
(38, 1, 12, 'Matemáticas'),
(39, 1, 22, 'Medicina'),
(40, 1, 13, 'Psicología'),
(41, 1, 17, 'Publicidad y Relaciones Públicas'),
(42, 1, 12, 'Química'),
(43, 1, 15, 'Relaciones Laborales y Recursos Humanos'),
(44, 1, 15, 'Trabajo Social'),
(45, 1, 17, 'Turismo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `RespuestasPreg123`
--

CREATE TABLE `RespuestasPreg123` (
  `id` int(11) NOT NULL,
  `id_Pregunta` int(11) NOT NULL,
  `respuesta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `RespuestasPreg123`
--

INSERT INTO `RespuestasPreg123` (`id`, `id_Pregunta`, `respuesta`) VALUES
(1, 1, 'Alumno'),
(2, 1, 'PDI'),
(3, 1, 'PAS'),
(4, 2, 'Sin especificar'),
(5, 2, 'Hombre'),
(6, 2, 'Mujer'),
(7, 3, 'Escuela de Ingeniería Naval y Oceánica'),
(8, 3, 'Escuela de Ingenierías Marina, Náutica y Radioelectrónica'),
(9, 3, 'Escuela Politécnica Superior de Algeciras'),
(10, 3, 'Escuela Profesional de la Medicina de la Educación Física y Deporte'),
(11, 3, 'Escuela Superior de Ingeniería'),
(12, 3, 'Facultad de Ciencias'),
(13, 3, 'Facultad de Ciencias de la Educación'),
(14, 3, 'Facultad de Ciencias del Mar y Ambientales'),
(15, 3, 'Facultad de Ciencias del Trabajo'),
(16, 3, 'Facultad de Ciencias Económicas y Empresariales'),
(17, 3, 'Facultad de Ciencias Sociales y de la Comunicación'),
(18, 3, 'Facultad de Derecho'),
(19, 3, 'Facultad de Enfermería'),
(20, 3, 'Facultad de Enfermería y Fisioterapia'),
(21, 3, 'Facultad de Filosofía y Letras'),
(22, 3, 'Facultad de Medicina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoPreguntas`
--

CREATE TABLE `tipoPreguntas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipoPreguntas`
--

INSERT INTO `tipoPreguntas` (`id`, `nombre`) VALUES
(1, 'Preguntas de tipo de usuario'),
(2, 'Preguntas de sexo'),
(3, 'Preguntas de centro donde se cursan estudios'),
(4, 'Preguntas sobre titulación que se cursa'),
(5, 'Preguntas de puntuación (0-9)'),
(6, 'Preguntas de introducción de texto');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Dimensiones`
--
ALTER TABLE `Dimensiones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Estudio` (`id_Estudio`);

--
-- Indices de la tabla `EncuestasRellenas`
--
ALTER TABLE `EncuestasRellenas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Estudio` (`id_Estudio`);

--
-- Indices de la tabla `Estudios`
--
ALTER TABLE `Estudios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Preguntas`
--
ALTER TABLE `Preguntas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Dimension` (`id_Dimension`),
  ADD KEY `id_tipoPregunta` (`id_tipoPregunta`);

--
-- Indices de la tabla `Respuestas`
--
ALTER TABLE `Respuestas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Preguntas` (`id_Preguntas`),
  ADD KEY `id_EncuestasRellenas` (`id_EncuestasRellenas`);

--
-- Indices de la tabla `RespuestasPreg4`
--
ALTER TABLE `RespuestasPreg4`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Dimension` (`id_Dimension`),
  ADD KEY `id_Preg3` (`id_Preg3`);

--
-- Indices de la tabla `RespuestasPreg123`
--
ALTER TABLE `RespuestasPreg123`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Pregunta` (`id_Pregunta`);

--
-- Indices de la tabla `tipoPreguntas`
--
ALTER TABLE `tipoPreguntas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Dimensiones`
--
ALTER TABLE `Dimensiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `EncuestasRellenas`
--
ALTER TABLE `EncuestasRellenas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `Estudios`
--
ALTER TABLE `Estudios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `Preguntas`
--
ALTER TABLE `Preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `Respuestas`
--
ALTER TABLE `Respuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;
--
-- AUTO_INCREMENT de la tabla `RespuestasPreg4`
--
ALTER TABLE `RespuestasPreg4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT de la tabla `RespuestasPreg123`
--
ALTER TABLE `RespuestasPreg123`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `tipoPreguntas`
--
ALTER TABLE `tipoPreguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Dimensiones`
--
ALTER TABLE `Dimensiones`
  ADD CONSTRAINT `Dimensiones_ibfk_1` FOREIGN KEY (`id_Estudio`) REFERENCES `Estudios` (`id`);

--
-- Filtros para la tabla `EncuestasRellenas`
--
ALTER TABLE `EncuestasRellenas`
  ADD CONSTRAINT `EncuestasRellenas_ibfk_1` FOREIGN KEY (`id_Estudio`) REFERENCES `Estudios` (`id`);

--
-- Filtros para la tabla `Preguntas`
--
ALTER TABLE `Preguntas`
  ADD CONSTRAINT `Preguntas_ibfk_1` FOREIGN KEY (`id_Dimension`) REFERENCES `Dimensiones` (`id`),
  ADD CONSTRAINT `Preguntas_ibfk_2` FOREIGN KEY (`id_tipoPregunta`) REFERENCES `tipoPreguntas` (`id`);

--
-- Filtros para la tabla `Respuestas`
--
ALTER TABLE `Respuestas`
  ADD CONSTRAINT `Respuestas_ibfk_1` FOREIGN KEY (`id_Preguntas`) REFERENCES `Preguntas` (`id`),
  ADD CONSTRAINT `Respuestas_ibfk_2` FOREIGN KEY (`id_EncuestasRellenas`) REFERENCES `EncuestasRellenas` (`id`);

--
-- Filtros para la tabla `RespuestasPreg4`
--
ALTER TABLE `RespuestasPreg4`
  ADD CONSTRAINT `RespuestasPreg4_ibfk_1` FOREIGN KEY (`id_Dimension`) REFERENCES `Dimensiones` (`id`),
  ADD CONSTRAINT `RespuestasPreg4_ibfk_2` FOREIGN KEY (`id_Preg3`) REFERENCES `RespuestasPreg123` (`id`);

--
-- Filtros para la tabla `RespuestasPreg123`
--
ALTER TABLE `RespuestasPreg123`
  ADD CONSTRAINT `RespuestasPreg123_ibfk_1` FOREIGN KEY (`id_Pregunta`) REFERENCES `Preguntas` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
