-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2021 a las 23:46:50
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `senamas_eps`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `paciente_documento` varchar(255) DEFAULT NULL,
  `medico_cod` varchar(255) DEFAULT NULL,
  `sede` varchar(255) DEFAULT NULL,
  `consultorio` varchar(255) DEFAULT NULL,
  `fecha_cita` date DEFAULT NULL,
  `hora_cita` time DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `paciente_documento`, `medico_cod`, `sede`, `consultorio`, `fecha_cita`, `hora_cita`, `fecha_registro`) VALUES
(47, '1057489152', '248961', 'Centro', '124', '2021-01-22', '15:00:00', '2021-01-27'),
(48, '30403678', '1237594', 'cable', '32', '2021-01-30', '12:00:00', '2021-01-27'),
(64, '30403678', '14123', 'Centro', '24', '2021-01-28', '06:00:00', '2021-01-27'),
(69, '1057489152', '248961', 'Centro', '18', '2021-01-28', '16:00:00', '2021-01-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `cod_especialidad` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`cod_especialidad`, `nombre`, `descripcion`) VALUES
('123', 'Doctor', 'Especialista'),
('124578', 'Prueba', 'Nueva especialidad'),
('1478', 'Traumatologo', 'Muy importante'),
('36548', 'Cirujano', 'Especialista'),
('6578', 'Ensaydd', 'Especialista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidadmedico`
--

CREATE TABLE `especialidadmedico` (
  `id` int(11) NOT NULL,
  `especialidad` varchar(50) NOT NULL,
  `medico` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `especialidadmedico`
--

INSERT INTO `especialidadmedico` (`id`, `especialidad`, `medico`) VALUES
(57, '1478', '141235478'),
(58, '6578', '141235478'),
(59, '123', '14123'),
(60, '6578', '14123'),
(92, '123', '12345567'),
(93, '1478', '12345567'),
(100, '123', '1587'),
(106, '1478', '248961'),
(107, '36548', '248961'),
(108, '6578', '248961');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `cod_medico` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `documento` varchar(50) DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `genero` varchar(1) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `perfil_profesional` varchar(255) DEFAULT NULL,
  `fecha_ingreso` date NOT NULL,
  `anios_experiencia` varchar(10) DEFAULT NULL,
  `password` varchar(250) NOT NULL,
  `cod_postal` varchar(20) DEFAULT NULL,
  `municipio` varchar(50) NOT NULL,
  `departamento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`cod_medico`, `nombre`, `apellido`, `documento`, `fecha_nacimiento`, `genero`, `email`, `telefono`, `perfil_profesional`, `fecha_ingreso`, `anios_experiencia`, `password`, `cod_postal`, `municipio`, `departamento`) VALUES
('12345567', 'Ensayo', 'Marin', '123765756', '2020-02-06', 'M', 'ensayo123@gmail.com', '786723423', 'asdasdasdas', '2020-03-25', '5', '$2y$12$1RppAaXqHkDM7LemuyGD.e9k9bjyyQtFsH26GpRJ/K.Sd.aiw1X4u', '170001', 'Manizales', 'Risaralda'),
('1237594', 'Carlos Antonio', 'Gimenez', '1843534140218', '1996-03-04', 'M', 'carlos@gmail.com', '32253214', 'asdasdasd', '2020-04-22', '2', '$2y$12$Wh5FUvesTm8nog23PsQp.OyqomGpKnjodLX/puKdnweV713HzgCG.', '170001', 'Manizales', 'Caldas'),
('14123', 'Juan Carlos', 'martinez', '1843534534', '2020-03-10', 'F', 'Juanc@gmail.com', '32255667754', 'Juan carlosmarin jojojo', '2020-03-11', '4', '$2y$12$/YCbBdzeMAPBKUENHdj14O2wRq/kLWXrKOiLXM.WCZ5dOaDwtTGH.', '170001', 'Manizales', 'Risaralda'),
('141235478', 'Marco Gabriel', 'Gamin', '184353412394', '1996-04-03', 'M', 'marcos@gmail.com', '322354189', 'asdasdasd', '2020-04-22', '2', '$2y$12$ab2i3OJtj0Nyj99SOCEV0OXfqUfXNQwN6lrMXgoEOcWyV7UP7AnGe', '170001', 'Manizales', 'Caldas'),
('1587', 'Juan', 'Marin', '1053849158', '1998-03-04', 'M', 'juan@gmail.com', '3224578912', 'profe', '2020-04-12', '2', '$2y$12$dCJ67eQt23y9rb5CMjGmX.8FL7PCVFnvbiuGOeRDw5Y8GYLlEdywa', '17001', 'Caldas', 'manizales'),
('248961', 'Medico prueba', 'Garcia', '18435341684', '1996-03-04', 'M', 'prueba@gmail.com', '3215754951', 'asdasdasd', '2020-04-22', '2', '$2y$12$PPAT7zT2IGEjQC.TXUX0nei80n9UX3qsWOPrM3h3xF20NZzaWeUjG', '170001', 'Manizales', 'Caldas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `documento` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `estado` varchar(50) NOT NULL,
  `genero` varchar(1) NOT NULL,
  `eps` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`documento`, `nombre`, `direccion`, `telefono`, `fecha_nacimiento`, `estado`, `genero`, `eps`, `email`, `password`) VALUES
('1057489152', 'Carlos Steven Quintero Garcia', 'Carrera 44 b # 20 20', '3224559784', '1997-09-24', 'activo', 'M', 'Nueva Eps', 'carlostite@gmail.com', '$2y$12$g3BAfcfMg5avXJCGMU8G8uvzwuMtsn56VN53jeLOIJMiHWfBUycry'),
('1843534384', 'prueba', 'aadsasd', '322530516', '1996-03-04', 'inactivo', 'F', 'Sura', 'prueba123@gmail.com', '$2y$12$LE6cQq5kQiPUdRw8lwmdBORu.UlRholsVCphTFXpOHIEVTEos4Jq2'),
('30403678', 'yolanda', 'Cra 34 sur # 10 10', '3105935923', '1779-12-25', 'activo', 'F', 'Sura', 'lan.da@gmail.com', '$2y$12$JH36oJfF15705AbLcoF2rOgrsjfMQ9jvxBvyiQUoRxRhsjdK4d8EO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `citas_ibfk_1` (`paciente_documento`),
  ADD KEY `citas_ibfk_2` (`medico_cod`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`cod_especialidad`);

--
-- Indices de la tabla `especialidadmedico`
--
ALTER TABLE `especialidadmedico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `especialidad_FK` (`especialidad`),
  ADD KEY `medico_FK` (`medico`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`cod_medico`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`documento`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `especialidadmedico`
--
ALTER TABLE `especialidadmedico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`paciente_documento`) REFERENCES `paciente` (`documento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`medico_cod`) REFERENCES `medico` (`cod_medico`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `especialidadmedico`
--
ALTER TABLE `especialidadmedico`
  ADD CONSTRAINT `especialidad_FK` FOREIGN KEY (`especialidad`) REFERENCES `especialidad` (`cod_especialidad`),
  ADD CONSTRAINT `medico_FK` FOREIGN KEY (`medico`) REFERENCES `medico` (`cod_medico`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
