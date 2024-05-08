-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-02-2024 a las 01:04:57
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `consultorio_medico`
--

-- --------------------------------------------------------


CREATE DATABASE 'consultorio_medico';
USE DATABASE 'consultorio_medico';
--
-- Estructura de tabla para la tabla `barrios`
--

CREATE TABLE `barrios` (
  `id_barrio` int(11) NOT NULL,
  `nombres` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calles`
--

CREATE TABLE `calles` (
  `id_calle` int(11) NOT NULL,
  `nombres_altura` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_cita` int(11) NOT NULL,
  `numero_orden` int(11) DEFAULT NULL,
  `estado_cita` varchar(50) DEFAULT NULL,
  `id_paciente` bigint(20) DEFAULT NULL,
  `id_cronograma` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cronogramas`
--

CREATE TABLE `cronogramas` (
  `id_cronograma` int(11) NOT NULL,
  `id_medico` bigint(20) DEFAULT NULL,
  `id_horario` int(11) DEFAULT NULL,
  `id_dia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_personales`
--

CREATE TABLE `datos_personales` (
  `id_personal` int(11) NOT NULL,
  `telefonos` varchar(20) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `id_persona` bigint(20) DEFAULT NULL,
  `id_direccion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datos_personales`
--

INSERT INTO `datos_personales` (`id_personal`, `telefonos`, `correo`, `id_persona`, `id_direccion`) VALUES
(4, '3704-854110', NULL, 6, NULL),
(5, '3704-854110', NULL, 7, NULL),
(6, '3704-854110', 'enzoexe999@gmail.com', 10, NULL),
(7, '3704-658970', 'gianna@gmail.com', 11, NULL),
(8, '03704206331', 'santibernardez125@gmail.com', 12, NULL),
(9, '213123131', 'sdafsadf@gmail.com', 13, NULL),
(10, '321232132', 'sdfsdaf@gmail.com', 14, NULL),
(11, '32324432342', 'sdagasdf@gmail.com', 15, NULL),
(12, '03704206331', 'santibernardez125@gmail.com', 16, NULL),
(13, '3453452345324', 'lea@gmail.com', 17, NULL),
(14, '547881', 'lea3@gmail.com', 18, NULL),
(15, '3704206331', 'lea@gmail.com', 19, NULL),
(16, '3453452345324', 'dgfsdfsdgf@gmail.com', 20, NULL),
(18, '03704788455', 'sdafsadf@gmail.com', 22, NULL),
(19, '', '', 23, NULL),
(20, '03704206331', 'lea@gmail.com', 24, NULL),
(21, '03704206331', 'sdfsdaf@gmail.com', 25, NULL),
(24, '03704206331', 'santibernardez125@gmail.com', 28, NULL),
(29, '03704206331', 'lea@gmail.com', 33, NULL),
(36, '03704206331', 'sdfsdaf@gmail.com', 40, NULL),
(38, '03704206331', 'santibernardez125@gmail.com', 42, NULL),
(40, '03704788455', 'santibernardez125@gmail.com', 44, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias`
--

CREATE TABLE `dias` (
  `id_dia` int(11) NOT NULL,
  `dia_semana` varchar(20) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `id_direccion` int(11) NOT NULL,
  `tipo_residencia` varchar(100) DEFAULT NULL,
  `id_pais` int(11) DEFAULT NULL,
  `id_provincia` int(11) DEFAULT NULL,
  `id_localidad` int(11) DEFAULT NULL,
  `id_barrio` int(11) DEFAULT NULL,
  `id_calle` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentaciones`
--

CREATE TABLE `documentaciones` (
  `id_documentacion` bigint(20) NOT NULL,
  `tipo_documento` varchar(150) DEFAULT NULL,
  `dni` int(11) DEFAULT NULL,
  `nif` int(11) DEFAULT NULL,
  `nro_seguridad_social` int(11) DEFAULT NULL,
  `id_profesional` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `documentaciones`
--

INSERT INTO `documentaciones` (`id_documentacion`, `tipo_documento`, `dni`, `nif`, `nro_seguridad_social`, `id_profesional`) VALUES
(1, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL, NULL),
(10, NULL, NULL, NULL, NULL, NULL),
(11, NULL, NULL, NULL, NULL, NULL),
(12, NULL, NULL, NULL, NULL, NULL),
(13, NULL, NULL, NULL, NULL, NULL),
(14, NULL, NULL, NULL, NULL, NULL),
(15, NULL, NULL, NULL, NULL, NULL),
(16, NULL, NULL, NULL, NULL, NULL),
(17, NULL, NULL, NULL, NULL, NULL),
(18, NULL, NULL, NULL, NULL, NULL),
(20, NULL, NULL, NULL, NULL, NULL),
(21, NULL, NULL, NULL, NULL, NULL),
(22, NULL, NULL, NULL, NULL, NULL),
(23, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` bigint(20) NOT NULL,
  `id_persona` bigint(20) DEFAULT NULL,
  `id_puesto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id_especialidad` int(11) NOT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id_especialidad`, `nombre`, `descripcion`) VALUES
(1, 'Cardiólogo', NULL),
(2, 'Dermatólogo', NULL),
(3, 'Neurólogo', NULL),
(4, 'Gastroenterólogo', NULL),
(5, 'Pediatra', NULL),
(6, 'Endocrinólogo', NULL),
(7, 'Oftalmólogo', NULL),
(8, 'Cirujano Ortopédico', NULL),
(9, 'Psiquiatra', NULL),
(10, 'Médico de Familia', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_medicamentos`
--

CREATE TABLE `historial_medicamentos` (
  `id_historial` int(11) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `id_paciente` bigint(20) DEFAULT NULL,
  `id_medicamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id_horario` int(11) NOT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidades`
--

CREATE TABLE `localidades` (
  `id_localidad` int(11) NOT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `codigo_postal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `medicamentos` (
  `id_medicamento` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `ingrediente_activo` varchar(100) DEFAULT NULL,
  `posologia` varchar(50) DEFAULT NULL,
  `restricciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `id_medico` bigint(20) NOT NULL,
  `tipo_medico` varchar(100) DEFAULT NULL,
  `id_persona` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`id_medico`, `tipo_medico`, `id_persona`) VALUES
(22, 'suplente', 42),
(23, 'suplente', 44);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicosxespecialidades`
--

CREATE TABLE `medicosxespecialidades` (
  `id_medico` bigint(20) DEFAULT NULL,
  `id_especialidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medicosxespecialidades`
--

INSERT INTO `medicosxespecialidades` (`id_medico`, `id_especialidad`) VALUES
(23, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicosxpacientes`
--

CREATE TABLE `medicosxpacientes` (
  `id_medico` bigint(20) NOT NULL,
  `id_paciente` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id_paciente` bigint(20) NOT NULL,
  `informacion_medica` varchar(500) DEFAULT NULL,
  `id_persona` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id_paciente`, `informacion_medica`, `id_persona`) VALUES
(2, 'paciente con ', 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `id_pais` int(11) NOT NULL,
  `nombres` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo_vacaciones`
--

CREATE TABLE `periodo_vacaciones` (
  `id_periodo` int(11) NOT NULL,
  `estado_vacaciones` varchar(50) DEFAULT NULL,
  `id_empleado` bigint(20) DEFAULT NULL,
  `id_medico` bigint(20) DEFAULT NULL,
  `id_vacacione` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_persona` bigint(20) NOT NULL,
  `sexo` varchar(15) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `id_registro` bigint(20) DEFAULT NULL,
  `id_documentacion` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `sexo`, `fecha_nacimiento`, `id_registro`, `id_documentacion`) VALUES
(6, 'Masculino', '1999-04-26', 5, NULL),
(7, 'Masculino', '1999-04-26', 6, NULL),
(8, 'Masculino', '1999-04-26', 7, NULL),
(9, 'Masculino', '1999-04-26', 8, NULL),
(10, 'Masculino', '1999-04-26', 9, NULL),
(11, 'Femenino', '2008-10-06', 10, NULL),
(12, 'masculino', '0000-00-00', 11, NULL),
(13, 'jkhkljlkhj', '0000-00-00', 12, NULL),
(14, 'gsdfgsdfg', '2000-12-02', 13, NULL),
(15, 'fsdafsdaf', '2000-12-02', 14, NULL),
(16, 'jkhkljlkhj', '2000-12-02', 15, NULL),
(17, 'mascu', '2001-12-12', 16, NULL),
(18, 'mascu', '2001-12-12', 17, NULL),
(19, 'masculino', '1995-02-01', 18, NULL),
(20, 'dfgdfg', '2000-12-12', 19, NULL),
(22, 'masculino', '1995-03-01', 21, NULL),
(23, '', '0000-00-00', 22, NULL),
(24, 'masculino', '0000-00-00', 23, NULL),
(25, 'masculino', '2000-12-02', 24, NULL),
(28, 's', '2000-12-02', 27, NULL),
(33, 'masculino', '0000-00-00', 32, NULL),
(40, 'masculino', '1995-02-01', 39, NULL),
(42, 'masculino', '0000-00-00', 41, NULL),
(44, 'dfgdsfgsdf', '2000-11-02', 43, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prescripciones`
--

CREATE TABLE `prescripciones` (
  `id_prescripcion` int(11) NOT NULL,
  `fecha_prescripcion` date DEFAULT NULL,
  `id_medico` bigint(20) DEFAULT NULL,
  `id_paciente` bigint(20) DEFAULT NULL,
  `id_medicamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesionales`
--

CREATE TABLE `profesionales` (
  `id_profesional` int(11) NOT NULL,
  `nro_colegiado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesionales`
--

INSERT INTO `profesionales` (`id_profesional`, `nro_colegiado`) VALUES
(4, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `id_provincia` int(11) NOT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `poblacion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puestos_trabajos`
--

CREATE TABLE `puestos_trabajos` (
  `id_puesto` int(11) NOT NULL,
  `nombre_puesto` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `puestos_trabajos`
--

INSERT INTO `puestos_trabajos` (`id_puesto`, `nombre_puesto`) VALUES
(1, 'Enfermero/a Jefe'),
(2, 'Asistente Administrativo de Salud'),
(3, 'Técnico de Radiología'),
(4, 'Recepcionista de Consultorio'),
(5, 'Especialista en Informática Médica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id_registro` bigint(20) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id_registro`, `nombres`, `apellidos`) VALUES
(5, 'Enzo', 'Reinoso'),
(6, 'Enzo', 'Reinoso'),
(7, 'Enzo', 'Reinoso'),
(8, 'Enzo', 'Reinoso'),
(9, 'Enzo', 'Reinoso'),
(10, 'Gianna', 'Reinoso'),
(11, 'sdfasdf', 'asdfdsaf'),
(12, 'khugkhgjk', 'jhklhlhkjljkh'),
(13, 'dfsgsdfg', 'dfgsdfgsdf'),
(14, 'sadfsadfsda', 'fsadfsad'),
(15, 'Leandro Ariel', 'Bernardez'),
(16, 'gfdh', 'hgfdhdgf'),
(17, 'leandro', 'berna'),
(18, 'lea', 'vernarde'),
(19, 'gdfgdsf', 'gdsfgsdfg'),
(21, 'francisco', 'moreno'),
(22, '', ''),
(23, 'Leandro Ariel', 'Bernardez'),
(24, 'Leandro Ariel', 'Bernardez'),
(27, 'Leandro Ariel', 'Bernardez'),
(28, 'Leandro Ariel', 'Bernardez'),
(29, 'Leandro Ariel', 'Bernardez'),
(30, 'Leandro Ariel', 'Bernardez'),
(31, 'Lean', 'Bernar'),
(32, 'Leandro Ariel', 'Bernardez'),
(39, 'san', 'qwer'),
(41, 'Leandro Ariel', 'Bernardez'),
(42, 'fran', 'more'),
(43, 'lean', 'asdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revistas`
--

CREATE TABLE `revistas` (
  `id_revista` int(11) NOT NULL,
  `tipo_revista` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `Tipo_roles` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rolesxusuarios`
--

CREATE TABLE `rolesxusuarios` (
  `id_rolusuario` int(11) NOT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sustituciones`
--

CREATE TABLE `sustituciones` (
  `id_sustitucion` int(11) NOT NULL,
  `alta_suplencia` date DEFAULT NULL,
  `baja_suplencia` date DEFAULT NULL,
  `id_medico` bigint(20) DEFAULT NULL,
  `id_revista` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(150) DEFAULT NULL,
  `contraseña` varchar(255) DEFAULT NULL,
  `id_persona` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacaciones`
--

CREATE TABLE `vacaciones` (
  `id_vacacione` int(11) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `barrios`
--
ALTER TABLE `barrios`
  ADD PRIMARY KEY (`id_barrio`);

--
-- Indices de la tabla `calles`
--
ALTER TABLE `calles`
  ADD PRIMARY KEY (`id_calle`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `id_cronograma` (`id_cronograma`);

--
-- Indices de la tabla `cronogramas`
--
ALTER TABLE `cronogramas`
  ADD PRIMARY KEY (`id_cronograma`),
  ADD KEY `id_medico` (`id_medico`),
  ADD KEY `id_horario` (`id_horario`),
  ADD KEY `id_dia` (`id_dia`);

--
-- Indices de la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  ADD PRIMARY KEY (`id_personal`),
  ADD KEY `id_persona` (`id_persona`),
  ADD KEY `id_direccion` (`id_direccion`);

--
-- Indices de la tabla `dias`
--
ALTER TABLE `dias`
  ADD PRIMARY KEY (`id_dia`);

--
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD PRIMARY KEY (`id_direccion`),
  ADD KEY `id_pais` (`id_pais`),
  ADD KEY `id_provincia` (`id_provincia`),
  ADD KEY `id_localidad` (`id_localidad`),
  ADD KEY `id_barrio` (`id_barrio`),
  ADD KEY `id_calle` (`id_calle`);

--
-- Indices de la tabla `documentaciones`
--
ALTER TABLE `documentaciones`
  ADD PRIMARY KEY (`id_documentacion`),
  ADD KEY `id_profesional` (`id_profesional`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `id_persona` (`id_persona`),
  ADD KEY `id_puesto` (`id_puesto`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id_especialidad`),
  ADD KEY `idx_id_especialidad` (`id_especialidad`);

--
-- Indices de la tabla `historial_medicamentos`
--
ALTER TABLE `historial_medicamentos`
  ADD PRIMARY KEY (`id_historial`),
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `id_medicamento` (`id_medicamento`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id_horario`);

--
-- Indices de la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD PRIMARY KEY (`id_localidad`);

--
-- Indices de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`id_medicamento`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id_medico`),
  ADD KEY `id_persona` (`id_persona`),
  ADD KEY `idx_id_medico` (`id_medico`);

--
-- Indices de la tabla `medicosxespecialidades`
--
ALTER TABLE `medicosxespecialidades`
  ADD KEY `id_medico` (`id_medico`),
  ADD KEY `id_especialidad` (`id_especialidad`);

--
-- Indices de la tabla `medicosxpacientes`
--
ALTER TABLE `medicosxpacientes`
  ADD KEY `fk_medico` (`id_medico`),
  ADD KEY `fk_paciente` (`id_paciente`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id_paciente`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `periodo_vacaciones`
--
ALTER TABLE `periodo_vacaciones`
  ADD PRIMARY KEY (`id_periodo`),
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `id_medico` (`id_medico`),
  ADD KEY `id_vacacione` (`id_vacacione`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `id_registro` (`id_registro`),
  ADD KEY `id_documentacion` (`id_documentacion`);

--
-- Indices de la tabla `prescripciones`
--
ALTER TABLE `prescripciones`
  ADD PRIMARY KEY (`id_prescripcion`),
  ADD KEY `id_medico` (`id_medico`),
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `id_medicamento` (`id_medicamento`);

--
-- Indices de la tabla `profesionales`
--
ALTER TABLE `profesionales`
  ADD PRIMARY KEY (`id_profesional`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id_provincia`);

--
-- Indices de la tabla `puestos_trabajos`
--
ALTER TABLE `puestos_trabajos`
  ADD PRIMARY KEY (`id_puesto`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id_registro`);

--
-- Indices de la tabla `revistas`
--
ALTER TABLE `revistas`
  ADD PRIMARY KEY (`id_revista`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `rolesxusuarios`
--
ALTER TABLE `rolesxusuarios`
  ADD PRIMARY KEY (`id_rolusuario`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `sustituciones`
--
ALTER TABLE `sustituciones`
  ADD PRIMARY KEY (`id_sustitucion`),
  ADD KEY `id_medico` (`id_medico`),
  ADD KEY `id_revista` (`id_revista`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `vacaciones`
--
ALTER TABLE `vacaciones`
  ADD PRIMARY KEY (`id_vacacione`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `barrios`
--
ALTER TABLE `barrios`
  MODIFY `id_barrio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `calles`
--
ALTER TABLE `calles`
  MODIFY `id_calle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cronogramas`
--
ALTER TABLE `cronogramas`
  MODIFY `id_cronograma` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  MODIFY `id_personal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `dias`
--
ALTER TABLE `dias`
  MODIFY `id_dia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `id_direccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `documentaciones`
--
ALTER TABLE `documentaciones`
  MODIFY `id_documentacion` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id_especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `historial_medicamentos`
--
ALTER TABLE `historial_medicamentos`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `localidades`
--
ALTER TABLE `localidades`
  MODIFY `id_localidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  MODIFY `id_medicamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id_medico` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id_paciente` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `periodo_vacaciones`
--
ALTER TABLE `periodo_vacaciones`
  MODIFY `id_periodo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `prescripciones`
--
ALTER TABLE `prescripciones`
  MODIFY `id_prescripcion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profesionales`
--
ALTER TABLE `profesionales`
  MODIFY `id_profesional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id_provincia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `puestos_trabajos`
--
ALTER TABLE `puestos_trabajos`
  MODIFY `id_puesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id_registro` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `revistas`
--
ALTER TABLE `revistas`
  MODIFY `id_revista` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rolesxusuarios`
--
ALTER TABLE `rolesxusuarios`
  MODIFY `id_rolusuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sustituciones`
--
ALTER TABLE `sustituciones`
  MODIFY `id_sustitucion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vacaciones`
--
ALTER TABLE `vacaciones`
  MODIFY `id_vacacione` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`),
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`id_cronograma`) REFERENCES `cronogramas` (`id_cronograma`);

--
-- Filtros para la tabla `cronogramas`
--
ALTER TABLE `cronogramas`
  ADD CONSTRAINT `cronogramas_ibfk_1` FOREIGN KEY (`id_medico`) REFERENCES `medicos` (`id_medico`),
  ADD CONSTRAINT `cronogramas_ibfk_2` FOREIGN KEY (`id_horario`) REFERENCES `horarios` (`id_horario`),
  ADD CONSTRAINT `cronogramas_ibfk_3` FOREIGN KEY (`id_dia`) REFERENCES `dias` (`id_dia`);

--
-- Filtros para la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  ADD CONSTRAINT `datos_personales_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`),
  ADD CONSTRAINT `datos_personales_ibfk_2` FOREIGN KEY (`id_direccion`) REFERENCES `direcciones` (`id_direccion`);

--
-- Filtros para la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD CONSTRAINT `direcciones_ibfk_1` FOREIGN KEY (`id_pais`) REFERENCES `paises` (`id_pais`),
  ADD CONSTRAINT `direcciones_ibfk_2` FOREIGN KEY (`id_provincia`) REFERENCES `provincias` (`id_provincia`),
  ADD CONSTRAINT `direcciones_ibfk_3` FOREIGN KEY (`id_localidad`) REFERENCES `localidades` (`id_localidad`),
  ADD CONSTRAINT `direcciones_ibfk_4` FOREIGN KEY (`id_barrio`) REFERENCES `barrios` (`id_barrio`),
  ADD CONSTRAINT `direcciones_ibfk_5` FOREIGN KEY (`id_calle`) REFERENCES `calles` (`id_calle`);

--
-- Filtros para la tabla `documentaciones`
--
ALTER TABLE `documentaciones`
  ADD CONSTRAINT `documentaciones_ibfk_1` FOREIGN KEY (`id_profesional`) REFERENCES `profesionales` (`id_profesional`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`),
  ADD CONSTRAINT `empleados_ibfk_2` FOREIGN KEY (`id_puesto`) REFERENCES `puestos_trabajos` (`id_puesto`);

--
-- Filtros para la tabla `historial_medicamentos`
--
ALTER TABLE `historial_medicamentos`
  ADD CONSTRAINT `historial_medicamentos_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`),
  ADD CONSTRAINT `historial_medicamentos_ibfk_2` FOREIGN KEY (`id_medicamento`) REFERENCES `medicamentos` (`id_medicamento`);

--
-- Filtros para la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD CONSTRAINT `medicos_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`);

--
-- Filtros para la tabla `medicosxespecialidades`
--
ALTER TABLE `medicosxespecialidades`
  ADD CONSTRAINT `medicosxespecialidades_ibfk_1` FOREIGN KEY (`id_medico`) REFERENCES `medicos` (`id_medico`) ON DELETE CASCADE,
  ADD CONSTRAINT `medicosxespecialidades_ibfk_2` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidades` (`id_especialidad`) ON DELETE CASCADE;

--
-- Filtros para la tabla `medicosxpacientes`
--
ALTER TABLE `medicosxpacientes`
  ADD CONSTRAINT `fk_medico` FOREIGN KEY (`id_medico`) REFERENCES `medicos` (`id_medico`),
  ADD CONSTRAINT `fk_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`);

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`);

--
-- Filtros para la tabla `periodo_vacaciones`
--
ALTER TABLE `periodo_vacaciones`
  ADD CONSTRAINT `periodo_vacaciones_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`),
  ADD CONSTRAINT `periodo_vacaciones_ibfk_2` FOREIGN KEY (`id_medico`) REFERENCES `medicos` (`id_medico`),
  ADD CONSTRAINT `periodo_vacaciones_ibfk_3` FOREIGN KEY (`id_vacacione`) REFERENCES `vacaciones` (`id_vacacione`);

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_ibfk_1` FOREIGN KEY (`id_registro`) REFERENCES `registros` (`id_registro`),
  ADD CONSTRAINT `personas_ibfk_2` FOREIGN KEY (`id_documentacion`) REFERENCES `documentaciones` (`id_documentacion`);

--
-- Filtros para la tabla `prescripciones`
--
ALTER TABLE `prescripciones`
  ADD CONSTRAINT `prescripciones_ibfk_1` FOREIGN KEY (`id_medico`) REFERENCES `medicos` (`id_medico`),
  ADD CONSTRAINT `prescripciones_ibfk_2` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`),
  ADD CONSTRAINT `prescripciones_ibfk_3` FOREIGN KEY (`id_medicamento`) REFERENCES `medicamentos` (`id_medicamento`);

--
-- Filtros para la tabla `rolesxusuarios`
--
ALTER TABLE `rolesxusuarios`
  ADD CONSTRAINT `rolesxusuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`),
  ADD CONSTRAINT `rolesxusuarios_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `sustituciones`
--
ALTER TABLE `sustituciones`
  ADD CONSTRAINT `sustituciones_ibfk_1` FOREIGN KEY (`id_medico`) REFERENCES `medicos` (`id_medico`),
  ADD CONSTRAINT `sustituciones_ibfk_2` FOREIGN KEY (`id_revista`) REFERENCES `revistas` (`id_revista`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
