-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 21-07-2021 a las 04:23:31
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id17276055_universityprojects`
--
CREATE DATABASE IF NOT EXISTS `university_projects` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
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
(17, 19190511, 18, 26, 1, 6, 1, 1, NULL, 1);

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
  `idArea` int(11) NOT NULL,
  `idNA` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Luis Valentin', 'Gomez', 'Morales', 'tic19190511.lgomez@alumnos.utsv.edu.mx', 'f57bcff7d63ce1ff577dc22d025e5ccfa434a3c5', 1, '2021-07-20 03:37:42', 1, 'fotos/43610022_1207946196028111_8195448305493213184_n.jpg', 'imag/mex-fet.jpg');

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
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `maestro`
--
ALTER TABLE `maestro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asignatura` (`idAsignatura`),
  ADD KEY `especialidad` (`idEspecialidad`),
  ADD KEY `area` (`idArea`),
  ADD KEY `nivel` (`idNA`),
  ADD KEY `user` (`idUsuario`);

--
-- Indices de la tabla `nivelacademico`
--
ALTER TABLE `nivelacademico`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lider` (`idLider`);

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `foro`
--
ALTER TABLE `foro`
  ADD CONSTRAINT `usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `maestro`
--
ALTER TABLE `maestro`
  ADD CONSTRAINT `area` FOREIGN KEY (`idArea`) REFERENCES `area` (`id`),
  ADD CONSTRAINT `asignatura` FOREIGN KEY (`idAsignatura`) REFERENCES `asignatura` (`id`),
  ADD CONSTRAINT `especialidad` FOREIGN KEY (`idEspecialidad`) REFERENCES `especialidad` (`id`),
  ADD CONSTRAINT `nivel` FOREIGN KEY (`idNA`) REFERENCES `nivelacademico` (`id`),
  ADD CONSTRAINT `user` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD CONSTRAINT `lider` FOREIGN KEY (`idLider`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `de` FOREIGN KEY (`idDe`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `para` FOREIGN KEY (`idPara`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
