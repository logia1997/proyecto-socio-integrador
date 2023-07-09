-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2022 a las 01:38:46
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agua`
--

CREATE TABLE `agua` (
  `id` int(11) NOT NULL,
  `idMes` int(2) NOT NULL,
  `idEstado` int(1) NOT NULL,
  `anno` year(4) NOT NULL,
  `idPago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banco`
--

CREATE TABLE `banco` (
  `id` int(2) NOT NULL,
  `banco` char(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `banco`
--

INSERT INTO `banco` (`id`, `banco`) VALUES
(1, '100% Banco'),
(2, 'Bancamiga'),
(3, 'BanCaribe'),
(4, 'Banco Activo'),
(5, 'Banco Agrícola de Venezuela'),
(6, 'Banco Bicentenario del Pueblo'),
(7, 'Banco Caroní'),
(8, 'Banco de Venezuela'),
(9, 'Banco del Tesoro'),
(10, 'Banco Exterior'),
(11, 'Banco Internacional de Desarrollo'),
(12, 'Banco Mercantil'),
(13, 'Banco Nacional de Crédito BNC'),
(14, 'Banco Plaza'),
(15, 'Banco Sofitasa'),
(16, 'Banco Venezolano de Crédito'),
(17, 'Bancrecer'),
(18, 'Banesco'),
(19, 'BANFANB'),
(20, 'Bangente'),
(21, 'Banplus'),
(22, 'BBVA Provincial'),
(23, 'BFC Banco Fondo Común'),
(24, 'BOD'),
(25, 'Citibank Sucursal Venezuela'),
(26, 'DELSUR'),
(27, 'Instituto Municipal de Crédito Popular (IMCP)'),
(28, 'Mi Banco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficio`
--

CREATE TABLE `beneficio` (
  `id` int(1) NOT NULL,
  `beneficio` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `beneficio`
--

INSERT INTO `beneficio` (`id`, `beneficio`) VALUES
(1, 'Protección Social'),
(2, 'Hogares de la Patria'),
(3, 'José Gregorio Hernández'),
(4, 'Economía Familiar'),
(5, '100% Familia'),
(6, 'Parto Humanisado'),
(7, 'Lactancia Materna'),
(8, 'Ninguno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casa`
--

CREATE TABLE `casa` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `calle` int(3) NOT NULL,
  `idLado` int(1) NOT NULL,
  `telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `casa`
--

INSERT INTO `casa` (`id`, `idUsuario`, `calle`, `idLado`, `telefono`) VALUES
(47, 14, 2, 2, 2147483647);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clap`
--

CREATE TABLE `clap` (
  `id` int(11) NOT NULL,
  `Entregado` tinyint(1) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condicionespecial`
--

CREATE TABLE `condicionespecial` (
  `id` int(1) NOT NULL,
  `condicion` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `condicionespecial`
--

INSERT INTO `condicionespecial` (`id`, `condicion`) VALUES
(1, 'Fisica'),
(2, 'Auditiva'),
(3, 'Visual'),
(4, 'Intelectual'),
(5, 'Mental'),
(6, 'Multiple'),
(7, 'Ninguno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadocivil`
--

CREATE TABLE `estadocivil` (
  `id` int(1) NOT NULL,
  `estado` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estadocivil`
--

INSERT INTO `estadocivil` (`id`, `estado`) VALUES
(1, 'Soltero/a'),
(2, 'Casado/a'),
(3, 'Viudo/a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadomes`
--

CREATE TABLE `estadomes` (
  `id` int(1) NOT NULL,
  `estado` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estadomes`
--

INSERT INTO `estadomes` (`id`, `estado`) VALUES
(1, 'Pagado'),
(2, 'Deuda'),
(3, 'Proceso'),
(4, 'Denegado'),
(5, 'Pagar'),
(6, 'Espera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadopago`
--

CREATE TABLE `estadopago` (
  `id` int(1) NOT NULL,
  `estado` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estadopago`
--

INSERT INTO `estadopago` (`id`, `estado`) VALUES
(1, 'Aprobado'),
(2, 'Denegado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gas`
--

CREATE TABLE `gas` (
  `id` int(11) NOT NULL,
  `idCasa` int(11) NOT NULL,
  `idTipo` int(1) NOT NULL,
  `idPeso` int(1) NOT NULL,
  `cantidad` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `gas`
--

INSERT INTO `gas` (`id`, `idCasa`, `idTipo`, `idPeso`, `cantidad`) VALUES
(30, 47, 1, 1, 3),
(31, 47, 1, 2, 1),
(32, 47, 1, 3, 1),
(33, 47, 1, 4, 1),
(34, 47, 2, 1, 2),
(35, 47, 2, 2, 1),
(36, 47, 2, 3, 1),
(37, 47, 2, 4, 1),
(38, 47, 3, 1, 1),
(39, 47, 3, 2, 1),
(40, 47, 3, 3, 1),
(41, 47, 3, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupofamiliar`
--

CREATE TABLE `grupofamiliar` (
  `id` int(11) NOT NULL,
  `idCasa` int(11) NOT NULL,
  `idHabitacion` int(1) NOT NULL,
  `idJefefamilia` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grupofamiliar`
--

INSERT INTO `grupofamiliar` (`id`, `idCasa`, `idHabitacion`, `idJefefamilia`) VALUES
(14, 47, 3, 27655540),
(15, 47, 1, 15670865);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE `habitacion` (
  `id` int(1) NOT NULL,
  `tipo` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`id`, `tipo`) VALUES
(1, 'Propia'),
(2, 'Cuido'),
(3, 'Alquilada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialclap`
--

CREATE TABLE `historialclap` (
  `id` int(11) NOT NULL,
  `idCasa` int(11) NOT NULL,
  `idVenta` int(11) NOT NULL,
  `idPago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialgas`
--

CREATE TABLE `historialgas` (
  `id` int(11) NOT NULL,
  `idCasa` int(11) NOT NULL,
  `idVenta` int(11) NOT NULL,
  `idPago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lado`
--

CREATE TABLE `lado` (
  `id` int(1) NOT NULL,
  `lado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `lado`
--

INSERT INTO `lado` (`id`, `lado`) VALUES
(1, 'a'),
(2, 'b');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `contenido` varchar(500) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mes`
--

CREATE TABLE `mes` (
  `id` int(2) NOT NULL,
  `mes` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mes`
--

INSERT INTO `mes` (`id`, `mes`) VALUES
(1, 'Enero'),
(2, 'Febrero'),
(3, 'Marzo'),
(4, 'Abril'),
(5, 'Mayo'),
(6, 'Junio'),
(7, 'Julio'),
(8, 'Agosto'),
(9, 'Septiembre'),
(10, 'Octubre'),
(11, 'Noviembre'),
(12, 'Diciembre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id` int(11) NOT NULL,
  `captura` text NOT NULL,
  `referencia` int(30) NOT NULL,
  `cedula` int(8) NOT NULL,
  `idOpcion` int(1) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idEstadopago` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `id` int(1) NOT NULL,
  `permiso` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`id`, `permiso`) VALUES
(1, 'Master'),
(2, 'Usuario'),
(3, 'Agua'),
(4, 'Clap'),
(5, 'Gas'),
(6, 'Foro'),
(7, 'Jefe de Calle');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `cedula` int(8) NOT NULL,
  `nombre` char(50) NOT NULL,
  `apellido` char(50) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `nivelInstrucion` varchar(200) NOT NULL,
  `estudia` varchar(200) NOT NULL,
  `enfermedad` varchar(200) NOT NULL,
  `idVacuna` int(1) NOT NULL,
  `idEstadoCivil` int(1) NOT NULL,
  `numeroCarnet` int(10) NOT NULL,
  `serialCarnet` int(10) NOT NULL,
  `idBeneficio` int(1) NOT NULL,
  `idCondicion` int(1) NOT NULL,
  `ciJefe` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`cedula`, `nombre`, `apellido`, `fechaNacimiento`, `nivelInstrucion`, `estudia`, `enfermedad`, `idVacuna`, `idEstadoCivil`, `numeroCarnet`, `serialCarnet`, `idBeneficio`, `idCondicion`, `ciJefe`) VALUES
(15670865, 'Yaritza', 'Guevara', '1980-06-05', 'Magister en Educacion', 'no', 'no', 3, 2, 7801013, 7898454, 2, 1, 15670865),
(27655540, 'Carlos', 'Gomez', '2001-01-13', 'Bachiller', 'Ing. Sistema', 'No', 3, 1, 6801012, 74699956, 8, 7, 27655540);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peso`
--

CREATE TABLE `peso` (
  `id` int(1) NOT NULL,
  `peso` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `peso`
--

INSERT INTO `peso` (`id`, `peso`) VALUES
(1, 10),
(2, 18),
(3, 27),
(4, 43);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector`
--

CREATE TABLE `sector` (
  `id` int(1) NOT NULL,
  `sector` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sector`
--

INSERT INTO `sector` (`id`, `sector`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipogas`
--

CREATE TABLE `tipogas` (
  `id` int(1) NOT NULL,
  `tipo` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipogas`
--

INSERT INTO `tipogas` (`id`, `tipo`) VALUES
(1, 'Bengas'),
(2, 'Barinesagas'),
(3, 'Cocigas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopago`
--

CREATE TABLE `tipopago` (
  `id` int(3) NOT NULL,
  `banco` int(2) NOT NULL,
  `numero` bigint(25) NOT NULL,
  `cedula` int(8) NOT NULL,
  `tipo` char(10) NOT NULL,
  `idSector` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` char(20) NOT NULL,
  `password` char(25) NOT NULL,
  `idPermiso` int(1) NOT NULL,
  `IdSector` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `password`, `idPermiso`, `IdSector`) VALUES
(1, 'master', 'master123', 1, NULL),
(13, 'Carlos', '123456789', 7, NULL),
(14, 'Casa47', '47casa', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacuna`
--

CREATE TABLE `vacuna` (
  `id` int(1) NOT NULL,
  `docis` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vacuna`
--

INSERT INTO `vacuna` (`id`, `docis`) VALUES
(1, 0),
(2, 1),
(3, 2),
(4, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventagas`
--

CREATE TABLE `ventagas` (
  `id` int(11) NOT NULL,
  `Entregado` tinyint(1) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idPeso` int(1) NOT NULL,
  `idTipo` int(1) NOT NULL,
  `cantidad` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agua`
--
ALTER TABLE `agua`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idPago` (`idPago`) USING BTREE,
  ADD KEY `idMes` (`idMes`),
  ADD KEY `idEstado` (`idEstado`);

--
-- Indices de la tabla `banco`
--
ALTER TABLE `banco`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `beneficio`
--
ALTER TABLE `beneficio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `casa`
--
ALTER TABLE `casa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idLado` (`idLado`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `clap`
--
ALTER TABLE `clap`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `condicionespecial`
--
ALTER TABLE `condicionespecial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estadocivil`
--
ALTER TABLE `estadocivil`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estadomes`
--
ALTER TABLE `estadomes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estadopago`
--
ALTER TABLE `estadopago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gas`
--
ALTER TABLE `gas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCasa` (`idCasa`),
  ADD KEY `idTipo` (`idTipo`),
  ADD KEY `idPeso` (`idPeso`);

--
-- Indices de la tabla `grupofamiliar`
--
ALTER TABLE `grupofamiliar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idJefefamilia` (`idJefefamilia`),
  ADD KEY `idCasa` (`idCasa`),
  ADD KEY `idHabitacion` (`idHabitacion`);

--
-- Indices de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historialclap`
--
ALTER TABLE `historialclap`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idVenta` (`idVenta`),
  ADD UNIQUE KEY `idPago` (`idPago`) USING BTREE,
  ADD KEY `idCasa` (`idCasa`);

--
-- Indices de la tabla `historialgas`
--
ALTER TABLE `historialgas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idVenta` (`idVenta`),
  ADD UNIQUE KEY `idPago` (`idPago`),
  ADD KEY `idCasa` (`idCasa`);

--
-- Indices de la tabla `lado`
--
ALTER TABLE `lado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `mes`
--
ALTER TABLE `mes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEstadopago` (`idEstadopago`),
  ADD KEY `idOpcion` (`idOpcion`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`cedula`),
  ADD KEY `idVacuna` (`idVacuna`),
  ADD KEY `idEstadoCivil` (`idEstadoCivil`),
  ADD KEY `idBeneficio` (`idBeneficio`),
  ADD KEY `idCondicion` (`idCondicion`),
  ADD KEY `ciJefe` (`ciJefe`);

--
-- Indices de la tabla `peso`
--
ALTER TABLE `peso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipogas`
--
ALTER TABLE `tipogas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipopago`
--
ALTER TABLE `tipopago`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idSector` (`idSector`),
  ADD KEY `banco` (`banco`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPermiso` (`idPermiso`),
  ADD KEY `IdSector` (`IdSector`);

--
-- Indices de la tabla `vacuna`
--
ALTER TABLE `vacuna`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventagas`
--
ALTER TABLE `ventagas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPeso` (`idPeso`),
  ADD KEY `idTipo` (`idTipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banco`
--
ALTER TABLE `banco`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `beneficio`
--
ALTER TABLE `beneficio`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `clap`
--
ALTER TABLE `clap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `condicionespecial`
--
ALTER TABLE `condicionespecial`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `estadocivil`
--
ALTER TABLE `estadocivil`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estadomes`
--
ALTER TABLE `estadomes`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `estadopago`
--
ALTER TABLE `estadopago`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `gas`
--
ALTER TABLE `gas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `grupofamiliar`
--
ALTER TABLE `grupofamiliar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `historialclap`
--
ALTER TABLE `historialclap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lado`
--
ALTER TABLE `lado`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mes`
--
ALTER TABLE `mes`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `peso`
--
ALTER TABLE `peso`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sector`
--
ALTER TABLE `sector`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipogas`
--
ALTER TABLE `tipogas`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipopago`
--
ALTER TABLE `tipopago`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `vacuna`
--
ALTER TABLE `vacuna`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ventagas`
--
ALTER TABLE `ventagas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agua`
--
ALTER TABLE `agua`
  ADD CONSTRAINT `agua_ibfk_1` FOREIGN KEY (`id`) REFERENCES `casa` (`id`),
  ADD CONSTRAINT `agua_ibfk_2` FOREIGN KEY (`idMes`) REFERENCES `mes` (`id`),
  ADD CONSTRAINT `agua_ibfk_3` FOREIGN KEY (`idEstado`) REFERENCES `estadomes` (`id`),
  ADD CONSTRAINT `agua_ibfk_4` FOREIGN KEY (`idPago`) REFERENCES `pago` (`id`);

--
-- Filtros para la tabla `casa`
--
ALTER TABLE `casa`
  ADD CONSTRAINT `casa_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `casa_ibfk_2` FOREIGN KEY (`idLado`) REFERENCES `lado` (`id`);

--
-- Filtros para la tabla `gas`
--
ALTER TABLE `gas`
  ADD CONSTRAINT `gas_ibfk_1` FOREIGN KEY (`idCasa`) REFERENCES `casa` (`id`),
  ADD CONSTRAINT `gas_ibfk_2` FOREIGN KEY (`idTipo`) REFERENCES `tipogas` (`id`),
  ADD CONSTRAINT `gas_ibfk_3` FOREIGN KEY (`idPeso`) REFERENCES `peso` (`id`);

--
-- Filtros para la tabla `grupofamiliar`
--
ALTER TABLE `grupofamiliar`
  ADD CONSTRAINT `grupofamiliar_ibfk_1` FOREIGN KEY (`idCasa`) REFERENCES `casa` (`id`),
  ADD CONSTRAINT `grupofamiliar_ibfk_2` FOREIGN KEY (`idHabitacion`) REFERENCES `habitacion` (`id`);

--
-- Filtros para la tabla `historialclap`
--
ALTER TABLE `historialclap`
  ADD CONSTRAINT `historialclap_ibfk_1` FOREIGN KEY (`idCasa`) REFERENCES `casa` (`id`),
  ADD CONSTRAINT `historialclap_ibfk_2` FOREIGN KEY (`idVenta`) REFERENCES `clap` (`id`),
  ADD CONSTRAINT `historialclap_ibfk_3` FOREIGN KEY (`idPago`) REFERENCES `pago` (`id`);

--
-- Filtros para la tabla `historialgas`
--
ALTER TABLE `historialgas`
  ADD CONSTRAINT `historialgas_ibfk_1` FOREIGN KEY (`idCasa`) REFERENCES `casa` (`id`),
  ADD CONSTRAINT `historialgas_ibfk_2` FOREIGN KEY (`idVenta`) REFERENCES `ventagas` (`id`),
  ADD CONSTRAINT `historialgas_ibfk_3` FOREIGN KEY (`idPago`) REFERENCES `pago` (`id`);

--
-- Filtros para la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `mensaje_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`idEstadopago`) REFERENCES `estadopago` (`id`),
  ADD CONSTRAINT `pago_ibfk_2` FOREIGN KEY (`idOpcion`) REFERENCES `tipopago` (`id`);

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`idVacuna`) REFERENCES `vacuna` (`id`),
  ADD CONSTRAINT `persona_ibfk_2` FOREIGN KEY (`idEstadoCivil`) REFERENCES `estadocivil` (`id`),
  ADD CONSTRAINT `persona_ibfk_3` FOREIGN KEY (`idBeneficio`) REFERENCES `beneficio` (`id`),
  ADD CONSTRAINT `persona_ibfk_4` FOREIGN KEY (`idCondicion`) REFERENCES `condicionespecial` (`id`),
  ADD CONSTRAINT `persona_ibfk_5` FOREIGN KEY (`ciJefe`) REFERENCES `grupofamiliar` (`idJefefamilia`);

--
-- Filtros para la tabla `tipopago`
--
ALTER TABLE `tipopago`
  ADD CONSTRAINT `tipopago_ibfk_1` FOREIGN KEY (`idSector`) REFERENCES `sector` (`id`),
  ADD CONSTRAINT `tipopago_ibfk_2` FOREIGN KEY (`banco`) REFERENCES `banco` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idPermiso`) REFERENCES `permiso` (`id`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`IdSector`) REFERENCES `sector` (`id`);

--
-- Filtros para la tabla `ventagas`
--
ALTER TABLE `ventagas`
  ADD CONSTRAINT `ventagas_ibfk_1` FOREIGN KEY (`idPeso`) REFERENCES `peso` (`id`),
  ADD CONSTRAINT `ventagas_ibfk_2` FOREIGN KEY (`idTipo`) REFERENCES `tipogas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
