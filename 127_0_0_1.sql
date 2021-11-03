-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-07-2021 a las 18:30:31
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `university_projects`
--
CREATE DATABASE IF NOT EXISTS `university_projects` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `university_projects`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id` int(11) NOT NULL,
  `matricula` int(11) NOT NULL,
  `idPromedio` int(11) NOT NULL,
  `idGrupo` int(11) NOT NULL,
  `idNAcademico` int(11) NOT NULL,
  `idCuatrimestre` int(11) NOT NULL,
  `idArea` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idProyecto` int(11) DEFAULT NULL,
  `idEspecialidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id`, `matricula`, `idPromedio`, `idGrupo`, `idNAcademico`, `idCuatrimestre`, `idArea`, `idUsuario`, `idProyecto`, `idEspecialidad`) VALUES
(11, 12123688, 7, 7, 1, 2, 1, 25, 3, 2),
(12, 12123688, 12, 9, 1, 2, 4, 26, NULL, 4),
(13, 19190511, 18, 26, 1, 6, 1, 27, 3, 1),
(16, 19190521, 11, 26, 1, 6, 1, 32, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amigos`
--

CREATE TABLE `amigos` (
  `id_ami` int(11) NOT NULL,
  `de` int(11) NOT NULL,
  `para` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `amigos`
--

INSERT INTO `amigos` (`id_ami`, `de`, `para`, `fecha`, `estado`) VALUES
(46, 2, 1, '2017-07-13 18:18:51', 0),
(49, 3, 1, '2017-07-13 18:37:35', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `nombreArea` varchar(150) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id`, `nombreArea`, `descripcion`) VALUES
(1, 'TECNOLOGÍAS DE LA INFORMACIÓN', 'TI'),
(2, 'MECATRÓNICA ÁREA AUTOMATIZACIÓN', 'MECATRÓNICA'),
(3, 'ADMINISTRACIÓN ÁREA CAPITAL HUMANO', 'ADMINISTRACIÓN'),
(4, 'QUÍMICA ÁREA INDUSTRIAL', 'QUÍMICA'),
(5, 'MANTENIMIENTO ÁREA INDUSTRIAL', 'MANTENIMIENTO'),
(6, 'ENERGÍAS RENOVABLES', 'ENERGÍAS'),
(7, 'CONTADURÍA', 'CONTADURÍA'),
(8, 'MECANICA ÁREA AUTOMOTRÍZ', 'MECÁNICA AUTOMOTRÍZ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE `asignatura` (
  `id` int(11) NOT NULL,
  `asignatura` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`id`, `asignatura`) VALUES
(1, 'BASE DE DATOS EN LA NUBE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuatrimestre`
--

CREATE TABLE `cuatrimestre` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cuatrimestre`
--

INSERT INTO `cuatrimestre` (`id`, `numero`, `nombre`) VALUES
(1, 1, 'PRIMERO'),
(2, 2, 'SEGUNDO'),
(3, 3, 'TERCER'),
(4, 4, 'CUARTO'),
(5, 5, 'QUINTO'),
(6, 6, 'SEXTO'),
(7, 7, 'SÉPTIMO'),
(8, 8, 'OCTAVO'),
(9, 9, 'NOVENO'),
(10, 10, 'DÉCIMO'),
(11, 11, 'UNDÉCIMO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `id` int(11) NOT NULL,
  `especialidad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`id`, `especialidad`) VALUES
(1, 'DISEÑO WEB'),
(2, 'JAVA'),
(3, 'ARDUINO'),
(4, 'DISEÑO GRÁFICO'),
(5, 'MULTIMEDIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro`
--

CREATE TABLE `foro` (
  `id` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `asunto` varchar(600) NOT NULL,
  `file` varchar(150) DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `foro`
--

INSERT INTO `foro` (`id`, `titulo`, `asunto`, `file`, `fecha`, `idUsuario`) VALUES
(2, 'SOR - 1er Proyecto TIC 201', 'logo de SOR version 1.0.', 'fotos/IMG-20200214-WA0000.jpg', '2021-07-16 00:00:00', 27),
(5, 'Imagen UTSV', 'UTSV', 'imag/descargaUT.jpg', '2021-07-16 00:00:00', 32),
(9, 'imaps', 'Lorem ipsum dolor sit amet consectetur adipiscing elit, at hac auctor scelerisque dui purus. Tellus parturient morbi dictum orci blandit risus faucibus, volutpat condimentum proin arcu vestibulum natoque, facilisis sapien feugiat suscipit tincidunt lacus. Gravida primis morbi nibh nascetur placerat porta ad, tellus bibendum est varius sociosqu dapibus augue ultrices, suspendisse fusce nam duis pharetra sagittis.', 'imag/3.jpg', '2021-07-16 00:00:00', 25),
(11, 'wvtw', 'Lorem ipsum dolor sit amet consectetur adipiscing elit, at hac auctor scelerisque dui purus. Tellus parturient morbi dictum orci blandit risus faucibus, volutpat condimentum proin arcu vestibulum natoque, facilisis sapien feugiat suscipit tincidunt lacus. Gravida primis morbi nibh nascetur placerat porta ad, tellus bibendum est varius sociosqu dapibus augue ultrices, suspendisse fusce nam duis pharetra sagittis.', 'fotos/IMG-20200214-WA0002.jpg', '2021-07-16 21:35:43', 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto`
--

CREATE TABLE `foto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `direccion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `foto`
--

INSERT INTO `foto` (`id`, `nombre`, `direccion`) VALUES
(1, 'valentin', 'fotos/IMG-20200214-WA0000.jpg'),
(2, '', 'fotos/IMG-20200214-WA0002.jpg'),
(3, '', 'fotos/WhatsApp Image 2020-05-06 at 11.35.16 AM (2).jpeg'),
(4, '1', 'fotos/perfil.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id` int(11) NOT NULL,
  `grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id`, `grupo`) VALUES
(1, 101),
(2, 102),
(3, 103),
(4, 104),
(5, 105),
(6, 201),
(7, 202),
(8, 203),
(9, 204),
(10, 205),
(11, 301),
(12, 302),
(13, 303),
(14, 304),
(15, 305),
(16, 401),
(17, 402),
(18, 403),
(19, 404),
(20, 405),
(21, 501),
(22, 502),
(23, 503),
(24, 504),
(25, 505),
(26, 601),
(27, 602),
(28, 603),
(29, 604),
(30, 605),
(31, 701),
(32, 702),
(33, 703),
(34, 704),
(35, 705),
(36, 801),
(37, 802),
(38, 803),
(39, 804),
(40, 805),
(41, 901),
(42, 902),
(43, 903),
(44, 904),
(45, 905),
(46, 1001),
(47, 1002),
(48, 1003),
(49, 1004),
(50, 1005);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestro`
--

CREATE TABLE `maestro` (
  `id` int(11) NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  `idEspecialidad` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idArea` int(11) NOT NULL,
  `idNA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `maestro`
--

INSERT INTO `maestro` (`id`, `idAsignatura`, `idEspecialidad`, `idUsuario`, `idArea`, `idNA`) VALUES
(7, 1, 4, 21, 1, 3),
(8, 1, 1, 22, 4, 2),
(9, 1, 1, 23, 5, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivelacademico`
--

CREATE TABLE `nivelacademico` (
  `id` int(11) NOT NULL,
  `nivel` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `nivelacademico`
--

INSERT INTO `nivelacademico` (`id`, `nivel`, `descripcion`) VALUES
(1, 'TSU', 'TÉCNICO SUPERIOR UNIVERSITARIO'),
(2, 'ING', 'INGENIERÍA'),
(3, 'MC', 'MAESTRO TIEMPO COMPLETO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id_not` int(11) NOT NULL,
  `user1` int(11) NOT NULL,
  `user2` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `leido` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `id_pub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id_not`, `user1`, `user2`, `tipo`, `leido`, `fecha`, `id_pub`) VALUES
(4, 1, 1, 'ha comentado', 0, '2017-10-23 14:51:14', 4),
(5, 1, 4, 'ha comentado', 0, '2017-10-28 10:18:15', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promedio`
--

CREATE TABLE `promedio` (
  `id` int(11) NOT NULL,
  `promedio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `promedio`
--

INSERT INTO `promedio` (`id`, `promedio`) VALUES
(1, 8),
(2, 8.1),
(3, 8.2),
(4, 8.3),
(5, 8.4),
(6, 8.5),
(7, 8.6),
(8, 8.7),
(9, 8.8),
(10, 8.9),
(11, 9),
(12, 9.1),
(13, 9.2),
(14, 9.3),
(15, 9.4),
(16, 9.5),
(17, 9.6),
(18, 9.7),
(19, 9.8),
(20, 9.9),
(21, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  `idLider` int(11) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `miembros` int(11) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`id`, `nombre`, `descripcion`, `idLider`, `capacidad`, `miembros`, `foto`) VALUES
(3, 'University Projects', 'University Projects, es una herramienta web que tiene como el objetivo aumentar el numero de proyectos multidisciplinarios, de igual manera mejorar la comunicación entre todos los alumnos de la UTSV. Es una red de trabajo, en el cual todos podrán apoyarse, compartiendo ideas, información, etc.', 27, 3, 3, 'fotosProyectos/logo.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `rol`) VALUES
(1, 'ALUMNO'),
(2, 'MAESTRO'),
(3, 'ADMINISTRADOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `id` int(11) NOT NULL,
  `idDe` int(11) NOT NULL,
  `idPara` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`id`, `idDe`, `idPara`, `estado`, `fecha`) VALUES
(36, 32, 27, 1, '0000-00-00'),
(40, 25, 27, 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `apellidoPaterno` varchar(150) NOT NULL,
  `apellidoMaterno` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `contraseña` varchar(250) NOT NULL,
  `idRol` int(11) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` int(11) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `portada` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `email`, `contraseña`, `idRol`, `modified_on`, `estado`, `foto`, `portada`) VALUES
(21, 'Benita', 'Espinoza', 'Cruz', 'usuario1@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, '2021-04-12 04:03:46', 0, 'fotos/favicon.jpg', ''),
(22, 'Luis Valentin', 'Espinoza', 'Morales', '123@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, '2021-04-12 04:45:11', 0, 'fotos/WhatsApp Image 2020-11-05 at 8.41.30 AM (1).jpeg', ''),
(23, 'hhhh', 'd', 'gjk', '123456@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, '2021-04-12 05:33:02', 0, 'fotos/perfil.png', ''),
(25, 'Jesus', 'Salas', 'Estrada', 'use@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, '2021-04-19 21:54:50', 0, 'fotos/images (22).jpeg', ''),
(26, 'A', 'S', 'E', 'ase@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, '2021-04-19 22:11:24', 0, 'fotos/perfil.png', ''),
(27, 'Luis Valentin', 'Gomez', 'Morales', 'tic19190511.lgomez@alumnos.utsv.edu.mx', 'f57bcff7d63ce1ff577dc22d025e5ccfa434a3c5', 1, '2021-06-03 17:09:10', 1, 'fotos/43610022_1207946196028111_8195448305493213184_n.jpg', 'fotos/5c51c611cb7f5d53392a4e76ce97f687.jpg'),
(32, 'Jesus Aldair', 'Palacios', 'Olmos', 'usuario2@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, '2021-07-08 15:52:00', 0, 'fotos/perfil.png', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grupo` (`idGrupo`),
  ADD KEY `nAcademico` (`idNAcademico`),
  ADD KEY `cuatrimestre` (`idCuatrimestre`),
  ADD KEY `area` (`idArea`),
  ADD KEY `usuario` (`idUsuario`),
  ADD KEY `proyecto` (`idProyecto`),
  ADD KEY `especialidad` (`idEspecialidad`),
  ADD KEY `promedio` (`idPromedio`) USING BTREE;

--
-- Indices de la tabla `amigos`
--
ALTER TABLE `amigos`
  ADD PRIMARY KEY (`id_ami`);

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cuatrimestre`
--
ALTER TABLE `cuatrimestre`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `foro`
--
ALTER TABLE `foro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`idUsuario`);

--
-- Indices de la tabla `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `maestro`
--
ALTER TABLE `maestro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `especialidad` (`idEspecialidad`),
  ADD KEY `usuario` (`idUsuario`),
  ADD KEY `area` (`idArea`),
  ADD KEY `nivel` (`idNA`),
  ADD KEY `fk_maestro_5` (`idAsignatura`);

--
-- Indices de la tabla `nivelacademico`
--
ALTER TABLE `nivelacademico`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id_not`);

--
-- Indices de la tabla `promedio`
--
ALTER TABLE `promedio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumno` (`idLider`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id`),
  ADD KEY `de` (`idDe`),
  ADD KEY `para` (`idPara`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index` (`idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `amigos`
--
ALTER TABLE `amigos`
  MODIFY `id_ami` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cuatrimestre`
--
ALTER TABLE `cuatrimestre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `foro`
--
ALTER TABLE `foro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `foto`
--
ALTER TABLE `foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `maestro`
--
ALTER TABLE `maestro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `nivelacademico`
--
ALTER TABLE `nivelacademico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id_not` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `promedio`
--
ALTER TABLE `promedio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `fk_alumno_1` FOREIGN KEY (`idArea`) REFERENCES `area` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_alumno_2` FOREIGN KEY (`idCuatrimestre`) REFERENCES `cuatrimestre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_alumno_3` FOREIGN KEY (`idEspecialidad`) REFERENCES `especialidad` (`id`),
  ADD CONSTRAINT `fk_alumno_4` FOREIGN KEY (`idGrupo`) REFERENCES `grupo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_alumno_5` FOREIGN KEY (`idNAcademico`) REFERENCES `nivelacademico` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_alumno_6` FOREIGN KEY (`idProyecto`) REFERENCES `proyecto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_alumno_7` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_alumno_8` FOREIGN KEY (`idPromedio`) REFERENCES `promedio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `foro`
--
ALTER TABLE `foro`
  ADD CONSTRAINT `usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `maestro`
--
ALTER TABLE `maestro`
  ADD CONSTRAINT `fk_maestro_1` FOREIGN KEY (`idArea`) REFERENCES `area` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_maestro_2` FOREIGN KEY (`idEspecialidad`) REFERENCES `especialidad` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_maestro_3` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_maestro_4` FOREIGN KEY (`idNA`) REFERENCES `nivelacademico` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_maestro_5` FOREIGN KEY (`idAsignatura`) REFERENCES `asignatura` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `de` FOREIGN KEY (`idDe`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `para` FOREIGN KEY (`idPara`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
