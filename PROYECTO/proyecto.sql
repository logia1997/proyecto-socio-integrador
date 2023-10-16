-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-10-2023 a las 05:30:48
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `idPago` int(11) NOT NULL,
  `idCasa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `agua`
--

INSERT INTO `agua` (`id`, `idMes`, `idEstado`, `anno`, `idPago`, `idCasa`) VALUES
(1, 1, 3, '2023', 29, 2),
(2, 2, 3, '2022', 31, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banco`
--

CREATE TABLE `banco` (
  `id` int(2) NOT NULL,
  `banco` char(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `casa`
--

INSERT INTO `casa` (`id`, `idUsuario`, `calle`, `idLado`, `telefono`) VALUES
(0, 15, 2, 1, 41415881),
(2, 19, 11, 2, 2147483647),
(3, 30, 7, 1, 15125),
(5, 20, 10, 2, 23123312),
(15, 29, 10, 1, 124321123),
(45, 20, 1, 1, 41231),
(999, 1, 2, 1, 101010101);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clap`
--

CREATE TABLE `clap` (
  `id` int(11) NOT NULL,
  `Entregado` tinyint(1) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condicionespecial`
--

CREATE TABLE `condicionespecial` (
  `id` int(1) NOT NULL,
  `condicion` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `estadopago`
--

INSERT INTO `estadopago` (`id`, `estado`) VALUES
(1, 'Aprobado'),
(2, 'Denegado'),
(3, 'pendient');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `gas`
--

INSERT INTO `gas` (`id`, `idCasa`, `idTipo`, `idPeso`, `cantidad`) VALUES
(31, 2, 1, 1, 1),
(32, 2, 1, 3, 1),
(33, 2, 2, 2, 1),
(34, 2, 3, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupofamiliar`
--

CREATE TABLE `grupofamiliar` (
  `id` int(11) NOT NULL,
  `idCasa` int(11) NOT NULL,
  `idHabitacion` int(1) NOT NULL,
  `idJefefamilia` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `grupofamiliar`
--

INSERT INTO `grupofamiliar` (`id`, `idCasa`, `idHabitacion`, `idJefefamilia`) VALUES
(15, 2, 1, 26661390),
(16, 2, 1, 18888139),
(17, 45, 1, 123123),
(18, 45, 1, 12142),
(19, 45, 1, 3123142),
(21, 3, 2, 90000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE `habitacion` (
  `id` int(1) NOT NULL,
  `tipo` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialgas`
--

CREATE TABLE `historialgas` (
  `id` int(11) NOT NULL,
  `idCasa` int(11) NOT NULL,
  `idVenta` int(11) NOT NULL,
  `idPago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lado`
--

CREATE TABLE `lado` (
  `id` int(1) NOT NULL,
  `lado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mes`
--

CREATE TABLE `mes` (
  `id` int(2) NOT NULL,
  `mes` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `idEstadopago` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id`, `captura`, `referencia`, `cedula`, `idOpcion`, `fecha`, `idEstadopago`) VALUES
(15, 'mamase mamase mama cusa', 1, 255213, 1, '2023-10-08 16:34:24', 1),
(16, 'pepe el grillo', 2123123, 111111, 1, '2023-10-08 16:45:39', 1),
(17, 'nulo', 5464, 123579, 1, '2023-10-10 01:26:07', 1),
(18, 'nulo', 142, 312, 1, '2023-10-11 22:25:12', 1),
(19, 'nulo', 781231, 27881234, 1, '2023-10-11 22:32:13', 3),
(20, 'nulo', 123456, 1, 2, '2023-10-11 22:35:01', 3),
(21, 'nulo', 12345, 100101, 1, '2023-10-11 22:36:03', 3),
(22, 'nulo', 3, 4, 1, '2023-10-11 22:43:39', 3),
(23, 'nulo', 11222, 252525, 1, '2023-10-13 00:56:30', 3),
(24, 'nulo', 222, 2323, 1, '2023-10-13 01:00:13', 3),
(25, 'nulo', 111, 1113, 1, '2023-10-13 01:00:45', 3),
(26, 'nulo', 52, 23113, 2, '2023-10-15 18:23:53', 3),
(27, 'nulo', 142412, 2567771, 2, '2023-10-15 20:32:02', 3),
(28, 'nulo', 12, 124, 1, '2023-10-15 20:32:44', 3),
(29, 'nulo', 22, 124, 1, '2023-10-15 20:33:42', 3),
(30, 'nulo', 56, 65, 1, '2023-10-15 21:02:24', 3),
(31, 'nulo', 54, 24, 1, '2023-10-15 21:08:45', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `id` int(1) NOT NULL,
  `permiso` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`cedula`, `nombre`, `apellido`, `fechaNacimiento`, `nivelInstrucion`, `estudia`, `enfermedad`, `idVacuna`, `idEstadoCivil`, `numeroCarnet`, `serialCarnet`, `idBeneficio`, `idCondicion`, `ciJefe`) VALUES
(12142, '123123123', '1312312313', '0000-00-00', '1424', '41212', '42214', 1, 1, 1243, 4123, 8, 7, 12142),
(90000, 'persona1', 'cacio', '2023-10-20', '123', '15343', '1423432', 2, 2, 142142, 1214241, 6, 3, 90000),
(123123, '1', '1', '2023-09-20', '123', '14243345', 'dsaa3123', 1, 1, 1231231, 2147483647, 8, 7, 123123),
(3123142, '123', '412', '0003-12-04', '412435', '4241245345', '1232545', 1, 1, 2314565, 123455, 8, 7, 3123142),
(18888139, 'cacha', 'carvallo', '2023-09-29', 'profesional', 'medica+', 'nada', 1, 1, 1231, 54565, 7, 7, 18888139),
(26661390, 'persona1', 'carvallo', '2023-09-13', 'universitario', 'gamer', 'ninguna', 1, 1, 7, 21341, 2, 7, 26661390);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peso`
--

CREATE TABLE `peso` (
  `id` int(1) NOT NULL,
  `peso` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tipopago`
--

INSERT INTO `tipopago` (`id`, `banco`, `numero`, `cedula`, `tipo`, `idSector`) VALUES
(1, 4, 25600, 2599030, 'pagomovil', 2),
(2, 8, 4151588104, 29000132, 'transferen', 2);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `password`, `idPermiso`, `IdSector`) VALUES
(1, 'master', 'master123', 1, NULL),
(15, 'jefe1', '123', 7, NULL),
(16, 'agua1', '1', 3, NULL),
(17, 'clap1', '1', 4, NULL),
(18, 'gas1', '1', 5, NULL),
(19, 'luis', '1', 2, 2),
(20, 'carla', '1', 2, 1),
(22, 'pepe', '123', 2, 2),
(23, 'pepe', '123', 2, 2),
(25, 'pep', '123', 4, NULL),
(26, 'pep', '123', 4, NULL),
(27, 'luis', '42', 2, 1),
(28, 'kaito', '42', 2, 1),
(29, 'usuario_prueba1', '4', 2, 2),
(30, 'sanson', '4', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacuna`
--

CREATE TABLE `vacuna` (
  `id` int(1) NOT NULL,
  `docis` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `idPeso` int(1) NOT NULL,
  `idTipo` int(1) NOT NULL,
  `cantidad` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agua`
--
ALTER TABLE `agua`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idMes` (`idMes`),
  ADD KEY `idEstado` (`idEstado`,`idPago`,`idCasa`),
  ADD KEY `idCasa` (`idCasa`),
  ADD KEY `idPago` (`idPago`);

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
-- AUTO_INCREMENT de la tabla `agua`
--
ALTER TABLE `agua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `gas`
--
ALTER TABLE `gas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `grupofamiliar`
--
ALTER TABLE `grupofamiliar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
  ADD CONSTRAINT `agua_ibfk_1` FOREIGN KEY (`idMes`) REFERENCES `mes` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `agua_ibfk_2` FOREIGN KEY (`idEstado`) REFERENCES `estadomes` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `agua_ibfk_3` FOREIGN KEY (`idCasa`) REFERENCES `casa` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `agua_ibfk_4` FOREIGN KEY (`idPago`) REFERENCES `pago` (`id`) ON UPDATE CASCADE;

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
