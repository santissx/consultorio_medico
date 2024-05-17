-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-05-2024 a las 23:56:18
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.2.12

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

--
-- Estructura de tabla para la tabla `barrios`
--

CREATE TABLE `barrios` (
  `id_barrio` int(11) NOT NULL,
  `nom_barrio` varchar(100) DEFAULT NULL,
  `id_localidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `barrios`
--

INSERT INTO `barrios` (`id_barrio`, `nom_barrio`, `id_localidad`) VALUES
(1, 'Villa Elisa', 1),
(2, 'Punta Mogotes', 2),
(3, 'Altos de Palihue', 3),
(4, 'Villa Cubas', 4),
(5, 'Barrio San Antonio', 5),
(6, 'Bº San Jorge', 6),
(7, 'Villa Barberán', 7),
(8, 'Bº Obrero', 8),
(9, 'San José Obrero', 9),
(10, 'Km 5', 10),
(11, 'Pujol', 11),
(12, 'Lamb', 12),
(13, 'Bº Malvinas', 13),
(14, 'Banda Norte', 14),
(15, 'Villa La Bolsa', 15),
(16, 'San Gerónimo', 16),
(17, 'Bº Sur', 17),
(18, 'Bº Serantes', 18),
(19, 'San Carlos', 19),
(20, 'Barrio San Jacinto', 20),
(21, 'Bº Paraná', 21),
(22, 'Obrero', 22),
(23, 'Lote 111', 23),
(24, 'Nueva Formosa', 24),
(25, 'Bº Gorriti', 25),
(26, 'Bº Santa Rosa', 26),
(27, 'Bº San José', 27),
(28, 'Bº Juan XXIII', 28),
(29, 'Villa Parque', 29),
(30, 'Bº Mutti', 30),
(31, 'Yacampis', 31),
(32, 'Villa Unión', 32),
(33, 'Bº Jardín', 33),
(34, 'Itaembé Miní', 34),
(35, 'Bº 9 de Julio', 35),
(36, 'Bº Belgrano', 36),
(37, 'Río Grande', 37),
(38, 'Los Canales', 38),
(39, 'Bº Colonia Nueva Esperanza', 39),
(40, 'San Roque', 40),
(41, 'Centenario', 41),
(42, 'Las Victorias', 42),
(43, 'Bº Tres Cerritos', 43),
(44, 'Bº 25 de Mayo', 44),
(45, 'Bº Chijra', 45),
(46, 'Carpintería', 46),
(47, 'Bº Gregorio Álvarez', 47),
(48, 'Bº Joaquín Víctor González', 48),
(49, 'Barrio 500', 49),
(50, 'La Ribera', 50),
(51, 'Bº Sismográfica', 51),
(52, 'San Benito', 52),
(53, 'Bº 2 de Abril', 53),
(54, 'Bº Lago Argentino', 54),
(55, 'Bº Candioti', 55),
(56, 'Bº Fisherton', 56),
(57, 'Bº Amancay', 57),
(58, 'Villa Balnearia', 58),
(59, 'Bº Avenida', 59),
(60, 'Bº Parque', 60),
(61, 'Andorra', 61),
(62, 'El Mirador', 62),
(63, 'San Cayetano', 63),
(64, 'San José', 64),
(65, 'San Antonio', 65),
(66, 'esperanza', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calles`
--

CREATE TABLE `calles` (
  `id_calle` int(11) NOT NULL,
  `nom_calle` varchar(200) DEFAULT NULL,
  `id_barrio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `calles`
--

INSERT INTO `calles` (`id_calle`, `nom_calle`, `id_barrio`) VALUES
(1, 'Calle San Martín', 1),
(2, 'Avenida Belgrano', 1),
(3, 'Calle Mitre', 2),
(4, 'Avenida Rivadavia', 2),
(5, 'Calle 25 de Mayo', 3),
(6, 'Avenida Independencia', 3),
(7, 'Calle Sarmiento', 4),
(8, 'Avenida Libertador', 4),
(9, 'Calle Buenos Aires', 5),
(10, 'Avenida Corrientes', 5),
(11, 'Calle 9 de Julio', 6),
(12, 'Avenida Santa Fe', 6),
(13, 'Calle España', 7),
(14, 'Avenida San Juan', 7),
(15, 'Calle Córdoba', 8),
(16, 'Avenida Entre Ríos', 8),
(17, 'Calle Mendoza', 9),
(18, 'Avenida Pueyrredón', 9),
(19, 'Calle La Rioja', 10),
(20, 'Avenida Alberdi', 10),
(21, 'Calle San Martín', 11),
(22, 'Avenida Belgrano', 11),
(23, 'Calle Mitre', 12),
(24, 'Avenida Rivadavia', 12),
(25, 'Calle 25 de Mayo', 13),
(26, 'Avenida Independencia', 13),
(27, 'Calle Sarmiento', 14),
(28, 'Avenida Libertador', 14),
(29, 'Calle Buenos Aires', 15),
(30, 'Avenida Corrientes', 15),
(31, 'Calle 9 de Julio', 16),
(32, 'Avenida Santa Fe', 16),
(33, 'Calle España', 17),
(34, 'Avenida San Juan', 17),
(35, 'Calle Córdoba', 18),
(36, 'Avenida Entre Ríos', 18),
(37, 'Calle Mendoza', 19),
(38, 'Avenida Pueyrredón', 19),
(39, 'Calle La Rioja', 20),
(40, 'Avenida Alberdi', 20),
(41, 'Calle San Martín', 21),
(42, 'Avenida Belgrano', 21),
(43, 'Calle Mitre', 22),
(44, 'Avenida Rivadavia', 22),
(45, 'Calle 25 de Mayo', 23),
(46, 'Avenida Independencia', 23),
(47, 'Calle Sarmiento', 24),
(48, 'Avenida Libertador', 24),
(49, 'Calle Buenos Aires', 25),
(50, 'Avenida Corrientes', 25),
(51, 'Calle 9 de Julio', 26),
(52, 'Avenida Santa Fe', 26),
(53, 'Calle España', 27),
(54, 'Avenida San Juan', 27),
(55, 'Calle Córdoba', 28),
(56, 'Avenida Entre Ríos', 28),
(57, 'Calle Mendoza', 29),
(58, 'Avenida Pueyrredón', 29),
(59, 'Calle La Rioja', 30),
(60, 'Avenida Alberdi', 30),
(61, 'Calle San Martín', 31),
(62, 'Avenida Belgrano', 32),
(63, 'Calle 25 de Mayo', 33),
(64, 'Calle Sarmiento', 34),
(65, 'Calle Buenos Aires', 35),
(66, 'Calle 9 de Julio', 36),
(67, 'Calle España', 37),
(68, 'Calle Córdoba', 38),
(69, 'Calle Mendoza', 39),
(70, 'Calle La Rioja', 40),
(71, 'Calle San Martín', 41),
(72, 'Avenida Belgrano', 42),
(73, 'Calle 25 de Mayo', 43),
(74, 'Calle Sarmiento', 44),
(75, 'Calle Buenos Aires', 45),
(76, 'Calle 9 de Julio', 46),
(77, 'Calle España', 47),
(78, 'Calle Córdoba', 48),
(79, 'Calle Mendoza', 49),
(80, 'Calle La Rioja', 50),
(81, 'Calle San Martín', 51),
(82, 'Avenida Belgrano', 52),
(83, 'Calle 25 de Mayo', 53),
(84, 'Calle Sarmiento', 54),
(85, 'Calle Buenos Aires', 55),
(86, 'Calle 9 de Julio', 56),
(87, 'Calle España', 57),
(88, 'Calle Córdoba', 58),
(89, 'Calle Mendoza', 59),
(90, 'Calle La Rioja', 60),
(91, 'Calle San Martín', 61),
(92, 'Avenida Belgrano', 62),
(93, 'Calle 25 de Mayo', 63),
(94, 'Calle Sarmiento', 64),
(95, 'Calle Buenos Aires', 65),
(96, '9 de julio', 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_cita` int(11) NOT NULL,
  `fecha_y_hora` datetime DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `id_paciente` bigint(20) DEFAULT NULL,
  `id_medico` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_cita`, `fecha_y_hora`, `id_estado`, `id_paciente`, `id_medico`) VALUES
(4, '2024-05-30 19:01:00', 3, 2, 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cronogramas`
--

CREATE TABLE `cronogramas` (
  `id_cronograma` int(11) NOT NULL,
  `id_medico` bigint(20) DEFAULT NULL,
  `id_horario_entrada` int(11) DEFAULT NULL,
  `dia` date DEFAULT NULL,
  `id_horario_salida` int(11) DEFAULT NULL
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
(43, '03704206331', 'lea@gmail.com', 47, NULL),
(47, '03704206331', 'sdfsdaf@gmail.com', 51, NULL),
(48, '03704206331', 'santibernardez125@gmail.com', 52, NULL),
(51, '03704206331', 'sdafsadf@gmail.com', 55, NULL),
(52, '03704206331', 'sdafsadf@gmail.com', 56, NULL),
(62, '03704206331', 'santibernardez125@gmail.com', 68, NULL),
(63, '03704206331', 'lea@gmail.com', 69, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `id_direccion` int(11) NOT NULL,
  `tipo_residencia` varchar(100) DEFAULT NULL,
  `id_calle` int(11) DEFAULT NULL,
  `id_medico` bigint(20) DEFAULT NULL,
  `id_empleado` bigint(20) DEFAULT NULL,
  `id_paciente` bigint(20) DEFAULT NULL,
  `altura` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentaciones`
--

CREATE TABLE `documentaciones` (
  `id_documentacion` bigint(20) NOT NULL,
  `dni` int(11) DEFAULT NULL,
  `nif` int(11) DEFAULT NULL,
  `nro_seguridad_social` int(11) DEFAULT NULL,
  `id_tipos_documentos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `documentaciones`
--

INSERT INTO `documentaciones` (`id_documentacion`, `dni`, `nif`, `nro_seguridad_social`, `id_tipos_documentos`) VALUES
(1, 43115000, NULL, NULL, NULL),
(24, 43115076, NULL, NULL, NULL),
(25, 35825252, NULL, NULL, NULL),
(26, 0, NULL, NULL, NULL),
(27, 0, NULL, NULL, NULL),
(28, 43115076, NULL, NULL, NULL),
(29, 43115076, NULL, NULL, NULL),
(30, 1524785, NULL, NULL, NULL),
(32, 12345, NULL, NULL, 2),
(33, 34598807, NULL, NULL, 1),
(40, 34598807, NULL, NULL, NULL),
(42, 34598807, NULL, NULL, 2),
(43, 34598807, NULL, NULL, NULL),
(44, 2147483647, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` bigint(20) NOT NULL,
  `id_persona` bigint(20) DEFAULT NULL,
  `id_puesto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `id_persona`, `id_puesto`) VALUES
(13, 51, 1);

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
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id_estado` int(11) NOT NULL,
  `tipo_estado` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id_estado`, `tipo_estado`) VALUES
(1, 'completada'),
(2, 'incompleto'),
(3, 'en curso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios_entradas`
--

CREATE TABLE `horarios_entradas` (
  `id_horario_entrada` int(11) NOT NULL,
  `hora_entrada` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `horarios_entradas`
--

INSERT INTO `horarios_entradas` (`id_horario_entrada`, `hora_entrada`) VALUES
(1, '01:00:00'),
(2, '02:00:00'),
(3, '03:00:00'),
(4, '04:00:00'),
(5, '05:00:00'),
(6, '06:00:00'),
(7, '07:00:00'),
(8, '08:00:00'),
(9, '09:00:00'),
(10, '10:00:00'),
(11, '11:00:00'),
(12, '12:00:00'),
(13, '13:00:00'),
(14, '14:00:00'),
(15, '15:00:00'),
(16, '16:00:00'),
(17, '17:00:00'),
(18, '18:00:00'),
(19, '19:00:00'),
(20, '20:00:00'),
(21, '21:00:00'),
(22, '22:00:00'),
(23, '23:00:00'),
(24, '00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios_salidas`
--

CREATE TABLE `horarios_salidas` (
  `id_horario_salida` int(11) NOT NULL,
  `hora_salida` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `horarios_salidas`
--

INSERT INTO `horarios_salidas` (`id_horario_salida`, `hora_salida`) VALUES
(1, '01:00:00'),
(2, '02:00:00'),
(3, '03:00:00'),
(4, '04:00:00'),
(5, '05:00:00'),
(6, '06:00:00'),
(7, '07:00:00'),
(8, '08:00:00'),
(9, '09:00:00'),
(10, '10:00:00'),
(11, '11:00:00'),
(12, '12:00:00'),
(13, '13:00:00'),
(14, '14:00:00'),
(15, '15:00:00'),
(16, '16:00:00'),
(17, '17:00:00'),
(18, '18:00:00'),
(19, '19:00:00'),
(20, '20:00:00'),
(21, '21:00:00'),
(22, '22:00:00'),
(23, '23:00:00'),
(24, '00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidades`
--

CREATE TABLE `localidades` (
  `id_localidad` int(11) NOT NULL,
  `nom_loc` varchar(100) DEFAULT NULL,
  `codigo_postal` int(11) DEFAULT NULL,
  `id_provincia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `localidades`
--

INSERT INTO `localidades` (`id_localidad`, `nom_loc`, `codigo_postal`, `id_provincia`) VALUES
(1, 'La Plata', 1900, 1),
(2, 'Mar del Plata', 7600, 1),
(3, 'Bahía Blanca', 8000, 1),
(4, 'San Fernando del Valle de Catamarca', 4700, 2),
(5, 'San José', 4700, 2),
(6, 'Valle Viejo', 4700, 2),
(7, 'Resistencia', 3500, 3),
(8, 'Barranqueras', 3503, 3),
(9, 'Fontana', 3502, 3),
(10, 'Comodoro Rivadavia', 9000, 4),
(11, 'Puerto Madryn', 9120, 4),
(12, 'Trelew', 9100, 4),
(13, 'Villa Carlos Paz', 5152, 5),
(14, 'Río Cuarto', 5800, 5),
(15, 'Alta Gracia', 5186, 5),
(16, 'Corrientes', 3400, 6),
(17, 'Goya', 3450, 6),
(18, 'Mercedes', 3470, 6),
(19, 'Concordia', 3200, 7),
(20, 'Gualeguaychú', 2820, 7),
(21, 'Paraná', 3100, 7),
(22, 'Formosa', 3600, 8),
(23, 'Clorinda', 3602, 8),
(24, 'Pirané', 3622, 8),
(25, 'San Salvador de Jujuy', 4600, 9),
(26, 'San Pedro', 4606, 9),
(27, 'Libertador General San Martín', 4614, 9),
(28, 'Santa Rosa', 6300, 10),
(29, 'General Pico', 6360, 10),
(30, 'Toay', 6301, 10),
(31, 'La Rioja', 5300, 11),
(32, 'Chilecito', 5360, 11),
(33, 'Chepes', 5380, 11),
(34, 'Posadas', 3300, 13),
(35, 'Eldorado', 3380, 13),
(36, 'Puerto Iguazú', 3370, 13),
(37, 'Neuquén', 8300, 14),
(38, 'Centenario', 8306, 14),
(39, 'Plottier', 8316, 14),
(40, 'Viedma', 8500, 15),
(41, 'General Roca', 8332, 15),
(42, 'San Carlos de Bariloche', 8400, 15),
(43, 'Salta', 4400, 16),
(44, 'San Ramón de la Nueva Orán', 4530, 16),
(45, 'San Salvador de Jujuy', 4600, 16),
(46, 'San Juan', 5400, 17),
(47, 'Rawson', 5407, 17),
(48, 'Caucete', 5401, 17),
(49, 'San Luis', 5700, 18),
(50, 'Villa Mercedes', 5730, 18),
(51, 'Merlo', 5881, 18),
(52, 'Río Gallegos', 9400, 19),
(53, 'Caleta Olivia', 9011, 19),
(54, 'El Calafate', 9405, 19),
(55, 'Santa Fe', 3000, 20),
(56, 'Rosario', 2000, 20),
(57, 'Reconquista', 3560, 20),
(58, 'Santiago del Estero', 4200, 21),
(59, 'La Banda', 4206, 21),
(60, 'Termas de Río Hondo', 4220, 21),
(61, 'Ushuaia', 9410, 22),
(62, 'Río Grande', 9420, 22),
(63, 'San Miguel de Tucumán', 4000, 23),
(64, 'Yerba Buena', 4107, 23),
(65, 'Tafí Viejo', 4103, 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `medicamentos` (
  `id_medicamento` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `ingrediente_activo` varchar(100) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `medicamentos` (`id_medicamento`, `nombre`, `descripcion`, `ingrediente_activo`, `activo`) VALUES
(8, 'dsfasd', 'sadfsda', 'fsdafsadfsad', 0),
(9, 'Leqa', 'asdfsda', 'actron', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `id_medico` bigint(20) NOT NULL,
  `id_persona` bigint(20) DEFAULT NULL,
  `nro_colegiado` varchar(10) DEFAULT NULL,
  `id_tipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`id_medico`, `id_persona`, `nro_colegiado`, `id_tipo`) VALUES
(22, 42, 'nrm-255', 1),
(25, 68, '258', 1),
(26, 69, '247830', 1);

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
(25, 1),
(26, 10),
(25, 1),
(26, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicosxpacientes`
--

CREATE TABLE `medicosxpacientes` (
  `id_medico` bigint(20) NOT NULL,
  `id_paciente` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medicosxpacientes`
--

INSERT INTO `medicosxpacientes` (`id_medico`, `id_paciente`) VALUES
(22, 12),
(22, 12);

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
(2, 'paciente con ', 40),
(9, 'paciente con sarasa', 52),
(12, 'paciente con ', 55),
(13, 'paciente con asd', 56);

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
(40, 'masculino', '1995-02-01', 39, 1),
(42, 'masculino', '0000-00-00', 41, NULL),
(47, 'masculino', '1999-03-01', 46, NULL),
(51, 'gsdfgsdfg', '1995-12-01', 50, 28),
(52, 'masculino', '2000-12-02', 51, 29),
(55, 'masculino', '2024-05-15', 55, 32),
(56, 'jkhkljlkhj', '0000-00-00', 56, 33),
(68, 'gsdfgsdfg', '1995-02-01', 70, 43),
(69, 'jkhkljlkhj', '2024-05-31', 71, 44);

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

--
-- Volcado de datos para la tabla `prescripciones`
--

INSERT INTO `prescripciones` (`id_prescripcion`, `fecha_prescripcion`, `id_medico`, `id_paciente`, `id_medicamento`) VALUES
(6, '2024-05-17', NULL, 2, NULL),
(7, '2024-05-08', 22, 2, 8),
(8, '2024-05-28', 22, 2, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `id_provincia` int(11) NOT NULL,
  `nom_prov` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id_provincia`, `nom_prov`) VALUES
(1, 'Buenos Aires'),
(2, 'Catamarca'),
(3, 'Chaco'),
(4, 'Chubut'),
(5, 'Córdoba'),
(6, 'Corrientes'),
(7, 'Entre Ríos'),
(8, 'Formosa'),
(9, 'Jujuy'),
(10, 'La Pampa'),
(11, 'La Rioja'),
(12, 'Mendoza'),
(13, 'Misiones'),
(14, 'Neuquén'),
(15, 'Río Negro'),
(16, 'Salta'),
(17, 'San Juan'),
(18, 'San Luis'),
(19, 'Santa Cruz'),
(20, 'Santa Fe'),
(21, 'Santiago del Estero'),
(22, 'Tierra del Fuego, Antártida e Islas del Atlántico Sur'),
(23, 'Tucumán');

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
(1, 'ATS'),
(2, 'Auxiliar de enfermeria'),
(3, 'Celador'),
(4, 'Administrativo'),
(5, 'Especialista en Informática Médica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id_registro` bigint(20) NOT NULL,
  `nombres` text NOT NULL,
  `apellidos` text NOT NULL
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
(43, 'lean', 'asdf'),
(44, 'Leandro Ariel', 'Bernardez'),
(45, 'Leandro Ariel', 'Bernardez'),
(46, 'Santiago joaquin', 'Bernardez'),
(47, 'Leandro Ariel', 'Bernardez'),
(48, 'Leandro Ariel', 'Bernardez'),
(49, 'Leandro Ariel', 'Bernardez'),
(50, 'Leandro Ariel', 'Bernardez'),
(51, 'Leandro Ariel', 'Bernardez'),
(53, 'Leandro Ariel', 'Bernardez'),
(54, 'Leandro Ariel', 'Bernardez'),
(55, 'Leandro Ariel', 'Bernardez'),
(56, 'Leandro Ariel', 'Bernardez'),
(66, 'Leandro Ariel', 'Bernardez'),
(67, 'Leandro Ariel', 'Bernardez'),
(69, 'Leandro Ariel', 'Bernardez'),
(70, 'Leandro Ariel', 'Bernardez'),
(71, 'Leandro Arielasdsa', 'Bernardez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sustituciones`
--

CREATE TABLE `sustituciones` (
  `id_sustitucion` int(11) NOT NULL,
  `alta_suplencia` date DEFAULT NULL,
  `baja_suplencia` date DEFAULT NULL,
  `id_medico` bigint(20) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sustituciones`
--

INSERT INTO `sustituciones` (`id_sustitucion`, `alta_suplencia`, `baja_suplencia`, `id_medico`, `id_estado`) VALUES
(1, '2024-05-09', '2024-05-14', 22, 1),
(6, '2024-05-10', '2024-05-29', 22, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_documentos`
--

CREATE TABLE `tipos_documentos` (
  `id_documento` int(11) NOT NULL,
  `tipo_documento` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipos_documentos`
--

INSERT INTO `tipos_documentos` (`id_documento`, `tipo_documento`) VALUES
(1, 'dni'),
(2, 'pasaporte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_medicos`
--

CREATE TABLE `tipos_medicos` (
  `id_tipo` int(11) NOT NULL,
  `tipo_medico` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipos_medicos`
--

INSERT INTO `tipos_medicos` (`id_tipo`, `tipo_medico`) VALUES
(1, 'titular'),
(2, 'suplente'),
(3, 'interino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(150) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `username`, `pass`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacaciones`
--

CREATE TABLE `vacaciones` (
  `id_vacacion` int(11) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `id_medico` bigint(20) DEFAULT NULL,
  `id_empleado` bigint(20) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `barrios`
--
ALTER TABLE `barrios`
  ADD PRIMARY KEY (`id_barrio`),
  ADD KEY `id_foreignkeylocalidad` (`id_localidad`);

--
-- Indices de la tabla `calles`
--
ALTER TABLE `calles`
  ADD PRIMARY KEY (`id_calle`),
  ADD KEY `id_foreignkeybarrio` (`id_barrio`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `fk_medicos` (`id_medico`),
  ADD KEY `fk_estados` (`id_estado`);

--
-- Indices de la tabla `cronogramas`
--
ALTER TABLE `cronogramas`
  ADD PRIMARY KEY (`id_cronograma`),
  ADD KEY `id_medico` (`id_medico`),
  ADD KEY `id_horario` (`id_horario_entrada`),
  ADD KEY `id_dia` (`dia`),
  ADD KEY `fk_horariosalida` (`id_horario_salida`);

--
-- Indices de la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  ADD PRIMARY KEY (`id_personal`),
  ADD KEY `id_persona` (`id_persona`),
  ADD KEY `id_direccion` (`id_direccion`);

--
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD PRIMARY KEY (`id_direccion`),
  ADD KEY `id_calle` (`id_calle`),
  ADD KEY `fk_idmedico` (`id_medico`),
  ADD KEY `fk_idpaciente` (`id_paciente`),
  ADD KEY `fk_idempleado` (`id_empleado`);

--
-- Indices de la tabla `documentaciones`
--
ALTER TABLE `documentaciones`
  ADD PRIMARY KEY (`id_documentacion`),
  ADD KEY `fk_tipos_doc` (`id_tipos_documentos`);

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
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `horarios_entradas`
--
ALTER TABLE `horarios_entradas`
  ADD PRIMARY KEY (`id_horario_entrada`);

--
-- Indices de la tabla `horarios_salidas`
--
ALTER TABLE `horarios_salidas`
  ADD PRIMARY KEY (`id_horario_salida`);

--
-- Indices de la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD PRIMARY KEY (`id_localidad`),
  ADD KEY `id_foreignkeyprovincia` (`id_provincia`);

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
  ADD KEY `idx_id_medico` (`id_medico`),
  ADD KEY `fk_tipo` (`id_tipo`);

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
-- Indices de la tabla `sustituciones`
--
ALTER TABLE `sustituciones`
  ADD PRIMARY KEY (`id_sustitucion`),
  ADD KEY `id_medico` (`id_medico`),
  ADD KEY `estados_ibfk` (`id_estado`);

--
-- Indices de la tabla `tipos_documentos`
--
ALTER TABLE `tipos_documentos`
  ADD PRIMARY KEY (`id_documento`);

--
-- Indices de la tabla `tipos_medicos`
--
ALTER TABLE `tipos_medicos`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `vacaciones`
--
ALTER TABLE `vacaciones`
  ADD PRIMARY KEY (`id_vacacion`),
  ADD KEY `id_foreignkeymedicos` (`id_medico`),
  ADD KEY `id_foreignkeyempleados` (`id_empleado`),
  ADD KEY `id_foreignkeyperiodo` (`id_estado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `barrios`
--
ALTER TABLE `barrios`
  MODIFY `id_barrio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `calles`
--
ALTER TABLE `calles`
  MODIFY `id_calle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cronogramas`
--
ALTER TABLE `cronogramas`
  MODIFY `id_cronograma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  MODIFY `id_personal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `id_direccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `documentaciones`
--
ALTER TABLE `documentaciones`
  MODIFY `id_documentacion` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id_especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `horarios_entradas`
--
ALTER TABLE `horarios_entradas`
  MODIFY `id_horario_entrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `horarios_salidas`
--
ALTER TABLE `horarios_salidas`
  MODIFY `id_horario_salida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `localidades`
--
ALTER TABLE `localidades`
  MODIFY `id_localidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  MODIFY `id_medicamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id_medico` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id_paciente` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `prescripciones`
--
ALTER TABLE `prescripciones`
  MODIFY `id_prescripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id_provincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `puestos_trabajos`
--
ALTER TABLE `puestos_trabajos`
  MODIFY `id_puesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id_registro` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `sustituciones`
--
ALTER TABLE `sustituciones`
  MODIFY `id_sustitucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipos_documentos`
--
ALTER TABLE `tipos_documentos`
  MODIFY `id_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipos_medicos`
--
ALTER TABLE `tipos_medicos`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vacaciones`
--
ALTER TABLE `vacaciones`
  MODIFY `id_vacacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `barrios`
--
ALTER TABLE `barrios`
  ADD CONSTRAINT `id_foreignkeylocalidad` FOREIGN KEY (`id_localidad`) REFERENCES `localidades` (`id_localidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `calles`
--
ALTER TABLE `calles`
  ADD CONSTRAINT `id_foreignkeybarrio` FOREIGN KEY (`id_barrio`) REFERENCES `barrios` (`id_barrio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_estados` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_medicos` FOREIGN KEY (`id_medico`) REFERENCES `medicos` (`id_medico`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cronogramas`
--
ALTER TABLE `cronogramas`
  ADD CONSTRAINT `cronogramas_ibfk_1` FOREIGN KEY (`id_medico`) REFERENCES `medicos` (`id_medico`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cronogramas_ibfk_2` FOREIGN KEY (`id_horario_entrada`) REFERENCES `horarios_entradas` (`id_horario_entrada`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_horariosalida` FOREIGN KEY (`id_horario_salida`) REFERENCES `horarios_salidas` (`id_horario_salida`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `direcciones_ibfk_5` FOREIGN KEY (`id_calle`) REFERENCES `calles` (`id_calle`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idempleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idmedico` FOREIGN KEY (`id_medico`) REFERENCES `medicos` (`id_medico`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idpaciente` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `documentaciones`
--
ALTER TABLE `documentaciones`
  ADD CONSTRAINT `fk_tipos_doc` FOREIGN KEY (`id_tipos_documentos`) REFERENCES `tipos_documentos` (`id_documento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empleados_ibfk_2` FOREIGN KEY (`id_puesto`) REFERENCES `puestos_trabajos` (`id_puesto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD CONSTRAINT `id_foreignkeyprovincia` FOREIGN KEY (`id_provincia`) REFERENCES `provincias` (`id_provincia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD CONSTRAINT `fk_tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipos_medicos` (`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `medicos_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `fk_medico` FOREIGN KEY (`id_medico`) REFERENCES `medicos` (`id_medico`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_ibfk_1` FOREIGN KEY (`id_registro`) REFERENCES `registros` (`id_registro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personas_ibfk_2` FOREIGN KEY (`id_documentacion`) REFERENCES `documentaciones` (`id_documentacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `prescripciones`
--
ALTER TABLE `prescripciones`
  ADD CONSTRAINT `prescripciones_ibfk_1` FOREIGN KEY (`id_medico`) REFERENCES `medicos` (`id_medico`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `prescripciones_ibfk_2` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prescripciones_ibfk_3` FOREIGN KEY (`id_medicamento`) REFERENCES `medicamentos` (`id_medicamento`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `sustituciones`
--
ALTER TABLE `sustituciones`
  ADD CONSTRAINT `estados_ibfk` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sustituciones_ibfk_1` FOREIGN KEY (`id_medico`) REFERENCES `medicos` (`id_medico`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vacaciones`
--
ALTER TABLE `vacaciones`
  ADD CONSTRAINT `fk_id_estado` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_foreignkeyempleados` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_foreignkeymedicos` FOREIGN KEY (`id_medico`) REFERENCES `medicos` (`id_medico`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
