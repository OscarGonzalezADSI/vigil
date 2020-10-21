-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-10-2020 a las 05:05:03
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cursos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprendiz`
--

CREATE TABLE `aprendiz` (
  `id_aprendiz` int(11) NOT NULL,
  `persona_id` int(11) DEFAULT NULL,
  `aprendizEstado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aprendiz`
--

INSERT INTO `aprendiz` (`id_aprendiz`, `persona_id`, `aprendizEstado`) VALUES
(4, 2, 1),
(9, 4, 1),
(11, 27, 1),
(12, 28, 1),
(13, 29, 1),
(14, 30, 1),
(15, 31, 1),
(16, 32, 1),
(17, 34, 1),
(18, 35, 1),
(19, 36, 1),
(20, 37, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certificado`
--

CREATE TABLE `certificado` (
  `id_certificado` int(11) NOT NULL,
  `matricula_id` int(11) DEFAULT NULL,
  `certificadoFecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `certificado`
--

INSERT INTO `certificado` (`id_certificado`, `matricula_id`, `certificadoFecha`) VALUES
(3, 2, '0000-00-00'),
(4, 4, '0000-00-00'),
(5, 3, '0000-00-00'),
(6, 5, '0000-00-00'),
(7, 6, '0000-00-00'),
(8, 7, '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL,
  `cursoNombre` varchar(30) DEFAULT NULL,
  `cursoDescripcion` varchar(500) DEFAULT NULL,
  `cursoDuracion` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id_curso`, `cursoNombre`, `cursoDescripcion`, `cursoDuracion`) VALUES
(6, 'vigilancia basica', 'vigilancia', '12 horas'),
(7, 'vigilancia media', 'vigilancia', '24 horas'),
(8, 'vigilancia alta', 'vigilancia', '36 horas'),
(9, 'alta seguridad privada', 'alta seguridad privada', '45 dias'),
(10, 'bodega segura', 'seguridad', '35 dias'),
(11, 'bodega segura', 'seguridad', '35 dias'),
(12, 'seguro', 'que si', '24 horas'),
(13, 'seguro', 'que si', '24 horas'),
(14, 'seguro2', 'que si', '24 horas'),
(15, 'seguro3', 'que si', '24 horas'),
(16, 'pedagogÃ­a de la seguridad', 'si claro', '25 dias'),
(17, 'seguridad centro comercial', 'seguridad privada', '45 dias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha`
--

CREATE TABLE `ficha` (
  `id_ficha` int(11) NOT NULL,
  `curso_id` int(11) DEFAULT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `fichaInicio` datetime DEFAULT NULL,
  `fichaFin` datetime DEFAULT NULL,
  `fichaEstado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ficha`
--

INSERT INTO `ficha` (`id_ficha`, `curso_id`, `instructor_id`, `fichaInicio`, `fichaFin`, `fichaEstado`) VALUES
(5, 7, 1, '2020-10-18 23:35:00', '2020-10-19 23:35:00', 1),
(7, 7, 1, '2020-10-18 22:24:00', '2020-10-19 22:24:00', 1),
(8, 15, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(9, 16, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(10, 17, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructor`
--

CREATE TABLE `instructor` (
  `id_instructor` int(11) NOT NULL,
  `persona_id` int(11) DEFAULT NULL,
  `instructorEstado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `instructor`
--

INSERT INTO `instructor` (`id_instructor`, `persona_id`, `instructorEstado`) VALUES
(1, 3, 1),
(2, 33, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `id_matricula` int(11) NOT NULL,
  `aprendiz_id` int(11) DEFAULT NULL,
  `ficha_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`id_matricula`, `aprendiz_id`, `ficha_id`) VALUES
(2, 4, 7),
(3, 11, 7),
(4, 4, 8),
(5, 11, 5),
(6, 19, 5),
(7, 20, 5),
(8, 20, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL,
  `personaNombre` varchar(30) DEFAULT NULL,
  `personaApellido` varchar(30) DEFAULT NULL,
  `personaCedula` varchar(30) DEFAULT NULL,
  `personaDireccion` varchar(30) DEFAULT NULL,
  `personaCelular` varchar(30) DEFAULT NULL,
  `personaCorreo` varchar(30) DEFAULT NULL,
  `foto` text NOT NULL,
  `TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UPDATE` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `personaNombre`, `personaApellido`, `personaCedula`, `personaDireccion`, `personaCelular`, `personaCorreo`, `foto`, `TIMESTAMP`, `UPDATE`) VALUES
(2, 'MARIO', 'PANTOJA', '555555', 'MZC4 L21 TORCOROMA 2', '3228858439', 'oigonzalezp@gmail.com', '', '2020-10-16 21:29:23', '2020-10-17 02:17:43'),
(3, 'JOSE MARIA', 'CORDOBA', '88888888', 'CALLE 11 BG 45', '32288584397', 'josemaria@gmail.com	', '', '2020-10-16 21:33:25', '2020-10-16 21:45:27'),
(4, 'MANUEL ', 'SANCHEZ', '66666666', '', '32244556689', 'mauricio@gmail.com', '', '2020-10-17 00:44:32', '2020-10-17 02:18:13'),
(5, 'RODRIGO', 'PEREZ', '3333333333', 'MZ C4 21G BOTTON', '3118877665', 'rodrigo@gmail.com', '', '2020-10-17 02:31:00', '2020-10-18 21:25:56'),
(6, 'Oscar', 'Gonzalez', '1090', 'mzc4', '3228858439', 'oigonzalezp@gmail.com', 'url', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Oscar', 'Gonzalez', '1090', 'mzc4', '3228858439', 'oigonzalezp@gmail.com', 'url', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'personaNombre', 'personaApellido', '111111', 'personaDireccion', '222222', 'aaaa@bbbb.com', '', '2020-10-19 05:16:03', '0000-00-00 00:00:00'),
(9, 'personaNombre', 'personaApellido', '111111', 'personaDireccion', '222222', 'aaaa@bbbb.com', '', '2020-10-19 05:20:20', '0000-00-00 00:00:00'),
(10, 'personaNombre', 'personaApellido', '222222', 'personaDireccion', '222222', 'aaaa@bbbb.com', '', '2020-10-19 05:22:31', '0000-00-00 00:00:00'),
(11, 'personaNombre', 'personaApellido', '222222', 'personaDireccion', '222222', 'aaaa@bbbb.com', '', '2020-10-19 05:23:36', '0000-00-00 00:00:00'),
(12, 'personaNombre', 'personaApellido', '123456', 'personaDireccion', '222222', 'aaaa@bbbb.com', '', '2020-10-19 05:27:00', '0000-00-00 00:00:00'),
(13, 'personaNombre', 'personaApellido', '123456', 'personaDireccion', '222222', 'aaaa@bbbb.com', '', '2020-10-19 05:28:58', '0000-00-00 00:00:00'),
(14, 'personaNombre', 'personaApellido', '1000000111', 'personaDireccion', '222222', 'aaaa@bbbb.com', '', '2020-10-19 05:33:03', '0000-00-00 00:00:00'),
(15, 'personaNombre', 'personaApellido', '1000000112', 'personaDireccion', '222222', 'aaaa@bbbb.com', '', '2020-10-19 05:38:34', '0000-00-00 00:00:00'),
(16, 'personaNombre', 'personaApellido', '1000000113', 'personaDireccion', '222222', 'aaaa@bbbb.com', '', '2020-10-19 05:42:56', '0000-00-00 00:00:00'),
(17, 'personaNombre', 'personaApellido', '1000000114', 'personaDireccion', '222222', 'aaaa@bbbb.com', '', '2020-10-19 05:49:05', '0000-00-00 00:00:00'),
(18, 'personaNombre', 'personaApellido', '1000000115', 'personaDireccion', '222222', 'aaaa@bbbb.com', '', '2020-10-19 05:56:47', '0000-00-00 00:00:00'),
(19, 'personaNombre', 'personaApellido', '1000000116', 'personaDireccion', '222222', 'aaaa@bbbb.com', '', '2020-10-19 05:58:40', '0000-00-00 00:00:00'),
(20, 'personaNombre', 'personaApellido', '1000000116', 'personaDireccion', '222222', 'aaaa@bbbb.com', '', '2020-10-19 06:00:27', '0000-00-00 00:00:00'),
(21, 'personaNombre', 'personaApellido', '1000000117', 'personaDireccion', '222222', 'aaaa@bbbb.com', '', '2020-10-19 06:01:19', '0000-00-00 00:00:00'),
(22, 'personaNombre', 'personaApellido', '1000000117', 'personaDireccion', '222222', 'aaaa@bbbb.com', '', '2020-10-19 06:06:02', '0000-00-00 00:00:00'),
(23, 'personaNombre', 'personaApellido', '1000000118', 'personaDireccion', '222222', 'aaaa@bbbb.com', '', '2020-10-19 06:06:53', '0000-00-00 00:00:00'),
(24, 'personaNombre', 'personaApellido', '1000000119', 'personaDireccion', '222222', 'aaaa@bbbb.com', '', '2020-10-19 06:09:51', '0000-00-00 00:00:00'),
(25, 'personaNombre', 'personaApellido', '1000000120', 'personaDireccion', '222222', 'aaaa@bbbb.com', '', '2020-10-19 06:12:33', '0000-00-00 00:00:00'),
(26, 'personaNombre', 'personaApellido', '1000000121', 'personaDireccion', '222222', 'aaaa@bbbb.com', '', '2020-10-19 06:13:50', '0000-00-00 00:00:00'),
(27, 'personaNombre', 'personaApellido', '10000001212', 'personaDireccion', '222222', 'aaaa@bbbb.com', '', '2020-10-19 06:20:05', '0000-00-00 00:00:00'),
(28, 'personaNombre', 'personaApellido', '10000001213', 'personaDireccion', '222222', 'aaaa@bbbb.com', '', '2020-10-19 06:29:03', '0000-00-00 00:00:00'),
(29, 'personaNombre', 'personaApellido', '10000001214', 'personaDireccion', '222222', 'aaaa@bbbb.com', '', '2020-10-19 06:29:57', '0000-00-00 00:00:00'),
(30, 'personaNombre', 'personaApellido', '10000001215', 'personaDireccion', '222222', 'aaaa@bbbb.com', '', '2020-10-19 06:31:32', '0000-00-00 00:00:00'),
(31, 'rodrigo', 'rodrigo', '989898', 'rodrigo', '878787', 'rodrigo@gmail.com', '', '2020-10-19 06:54:30', '0000-00-00 00:00:00'),
(32, 'visualnombre', 'visualapellido', '343434', 'visualDireccion', '676767', 'visualnombre@gmail.com', '', '2020-10-19 20:14:13', '0000-00-00 00:00:00'),
(33, 'rodrigo', 'lara', '1090555555', 'mzc4', '322887645', 'rodrigo45@gmail.com', '', '2020-10-19 20:53:49', '0000-00-00 00:00:00'),
(34, 'ricardo', 'montaner', '64795333', 'mz4', '4444444', 'gggggg', '', '2020-10-20 01:57:03', '0000-00-00 00:00:00'),
(35, 'rosalia', 'gutierres', '5555577889', 'mz ffff', '333355535', 'mmmm@ggg.com', '', '2020-10-20 01:58:47', '0000-00-00 00:00:00'),
(36, 'jose', 'garcia', '637577775', 'mz c3rrrr', '33345545', 'hhhh@dddd.com', '', '2020-10-20 02:00:31', '0000-00-00 00:00:00'),
(37, 'jorge', 'bustamante', '6555554467', 'mzc4rrrrr', '32266547777', 'bustamante@gmail.com', '', '2020-10-21 02:52:39', '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  ADD PRIMARY KEY (`id_aprendiz`),
  ADD KEY `persona_id` (`persona_id`);

--
-- Indices de la tabla `certificado`
--
ALTER TABLE `certificado`
  ADD PRIMARY KEY (`id_certificado`),
  ADD KEY `matricula_id` (`matricula_id`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD PRIMARY KEY (`id_ficha`),
  ADD KEY `curso_id` (`curso_id`,`instructor_id`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- Indices de la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`id_instructor`),
  ADD KEY `persona_id` (`persona_id`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`id_matricula`),
  ADD KEY `aprendiz_id` (`aprendiz_id`),
  ADD KEY `ficha_id` (`ficha_id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  MODIFY `id_aprendiz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `certificado`
--
ALTER TABLE `certificado`
  MODIFY `id_certificado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `ficha`
--
ALTER TABLE `ficha`
  MODIFY `id_ficha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `instructor`
--
ALTER TABLE `instructor`
  MODIFY `id_instructor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `id_matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  ADD CONSTRAINT `aprendiz_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id_persona`);

--
-- Filtros para la tabla `certificado`
--
ALTER TABLE `certificado`
  ADD CONSTRAINT `certificado_ibfk_1` FOREIGN KEY (`matricula_id`) REFERENCES `matricula` (`id_matricula`);

--
-- Filtros para la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD CONSTRAINT `ficha_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `instructor` (`id_instructor`),
  ADD CONSTRAINT `ficha_ibfk_2` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id_curso`);

--
-- Filtros para la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `instructor_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id_persona`);

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`aprendiz_id`) REFERENCES `aprendiz` (`id_aprendiz`),
  ADD CONSTRAINT `matricula_ibfk_2` FOREIGN KEY (`ficha_id`) REFERENCES `ficha` (`id_ficha`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
