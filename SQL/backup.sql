-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-12-2015 a las 07:18:12
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;


--
-- Base de datos: `goa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agente`
--

CREATE TABLE IF NOT EXISTS `agente` (
  `id` int(11) NOT NULL,
  `codigo` varchar(6) NOT NULL,
  `razon_social` varchar(200) NOT NULL,
  `nombre_fantasia` varchar(200) NOT NULL,
  `domicilio` varchar(200) DEFAULT NULL,
  `codigo_postal` varchar(4) DEFAULT NULL,
  `id_localidad` int(5) DEFAULT NULL,
  `estado_logico` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `agente`
--

INSERT INTO `agente` (`id`, `codigo`, `razon_social`, `nombre_fantasia`, `domicilio`, `codigo_postal`, `id_localidad`, `estado_logico`) VALUES
(1, '00001', 'Aiken computación', 'Aiken computación', 'Av. I. Arieta 1520', '1754', 1, 1),
(2, '00002', 'Locutorio Noyames', 'Locutorio Noyames', 'Florencio Varela', '1754', 1, 1),
(3, '00003', 'Gustavo Lopez SA', 'Pago Facil Reconquista', 'Amadeo Sabatini 5083', '1678', 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apertura`
--

CREATE TABLE IF NOT EXISTS `apertura` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `estado_logico` tinyint(1) DEFAULT NULL,
  `id_incidente` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `apertura`
--

INSERT INTO `apertura` (`id`, `codigo`, `descripcion`, `estado_logico`, `id_incidente`) VALUES
(7, '000505', 'Agregar apellido', 1, 1),
(8, '000506', 'Agregar primer o segundo nombre', 1, 1),
(9, '000524', 'Modificar apellido', 1, 2),
(10, '000525', 'Modificar Compania/ Nombre', 1, 2),
(11, '000572', 'Conciliacion Interbanking', 1, 3),
(12, '000010', 'Datos varios', 1, 4),
(13, '000008', 'Destino', 1, 4),
(14, '000070', 'Error en carga de datos', 1, 5),
(15, '000079', 'Está pagando otros servicios', 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_incidencia`
--

CREATE TABLE IF NOT EXISTS `estado_incidencia` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_incidencia`
--

INSERT INTO `estado_incidencia` (`id`, `descripcion`) VALUES
(1, 'Ingresado'),
(2, 'En Proceso'),
(3, 'Cerrado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formato_notificacion`
--

CREATE TABLE IF NOT EXISTS `formato_notificacion` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `formato` varchar(250) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `formato_notificacion`
--

INSERT INTO `formato_notificacion` (`id`, `codigo`, `formato`) VALUES
(1, 1, 'Su incidencia con Nro: %s, a cambiado a estado %s.'),
(2, 2, 'Se ha registrado una nueva incidencia con Nro: %s.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencia`
--

CREATE TABLE IF NOT EXISTS `incidencia` (
  `id` int(11) NOT NULL,
  `codigo` varchar(13) NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_cierre` datetime DEFAULT NULL,
  `beneficiario` varchar(20) DEFAULT NULL,
  `mtcn` int(11) DEFAULT NULL,
  `monto` decimal(12,2) DEFAULT NULL,
  `destino` varchar(20) DEFAULT NULL,
  `observaciones` varchar(200) DEFAULT NULL,
  `respuesta` varchar(200) DEFAULT NULL,
  `prioridad` int(11) DEFAULT NULL,
  `id_agente` int(11) NOT NULL,
  `id_operador` int(11) DEFAULT NULL,
  `id_estado` int(11) NOT NULL,
  `id_apertura` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `incidencia`
--

INSERT INTO `incidencia` (`id`, `codigo`, `fecha_alta`, `fecha_cierre`, `beneficiario`, `mtcn`, `monto`, `destino`, `observaciones`, `respuesta`, `prioridad`, `id_agente`, `id_operador`, `id_estado`, `id_apertura`) VALUES
(1, '1', '2015-12-11 14:33:28', '2015-12-11 14:36:35', 'Carlos Perez', 1500000001, '1000.00', 'Buenos Aires', '<p>El apellido del beneficiario era erroneo</p>', '<p>El incidente ha sido procesado correctamente</p>', 2, 1, 2, 3, 7),
(2, '2', '2015-12-11 14:52:23', NULL, 'Roberto Montoto', 1500000021, '15000.00', 'Jujuy', '<p>Numero de MTCN mal ingresado.</p>', NULL, 1, 1, 0, 1, 14),
(3, '3', '2015-12-11 14:53:31', NULL, 'Armando Barredas', 1500000430, '150.00', 'Mar del Plata', '<p>Se ingreso el apellido erroneamente</p>', NULL, 2, 1, 0, 1, 9),
(4, '4', '2015-12-11 14:54:49', NULL, 'Roberto Montoto', 1500000005, '6000.00', 'Uruguay', '<p>Servicio ya abonado</p>', NULL, 1, 1, 2, 2, 15),
(5, '5', '2015-12-11 14:56:04', NULL, 'Carlos Saul', 1500000543, '5650.00', 'Mar del Plata', '<p>Primer nombre mal ingresado</p>', NULL, 2, 1, 2, 2, 8),
(6, '6', '2015-12-11 14:57:44', NULL, 'Monica Perez', 1500000048, '16550.00', 'Uruguay', '<p>Se debe observar la compania ya que se encuentra inhabilitada</p>', NULL, 2, 1, 0, 1, 10),
(7, '7', '2015-12-12 14:02:15', '2015-12-12 14:03:51', 'Luciano Soro', 1500000025, '15250.00', 'San Salvador', '<p>El destino que se observa en el sistema no corresponde con el ingresado.</p>', '<p>Se corrigio en el sistema el destino, ya que se habia ingresado erroneamente.</p>', 3, 1, 2, 3, 13),
(8, '8', '2015-12-12 21:28:41', '2015-12-12 23:25:32', 'Carlos Perez', 1500000012, '10000.00', 'Santa Fe', '<p>El apellido del beneficiario se introdujo erroneamente.</p>', '<p>Se corrigio el apellido del beneficiario, ya que era erroneo.</p>', 2, 1, 2, 3, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidente`
--

CREATE TABLE IF NOT EXISTS `incidente` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `id_tipo` int(11) NOT NULL,
  `prioridad` int(11) DEFAULT NULL,
  `estado_logico` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `incidente`
--

INSERT INTO `incidente` (`id`, `codigo`, `descripcion`, `id_tipo`, `prioridad`, `estado_logico`) VALUES
(1, '00001', 'Cambio de beneficiario', 1, 2, 1),
(2, '00002', 'Cambio de remitente', 1, 2, 1),
(3, '00003', 'Transferencia a cuenta', 2, 1, 1),
(4, '00004', 'Verificación', 2, 3, 1),
(5, '00005', 'Falta de \r\n\r\npago', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE IF NOT EXISTS `localidad` (
  `id` int(11) NOT NULL,
  `codigo` varchar(6) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `id_provincia` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `localidad`
--

INSERT INTO `localidad` (`id`, `codigo`, `descripcion`, `id_provincia`) VALUES
(1, '001', 'San Justo', 1),
(2, '002', 'Caseros', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

CREATE TABLE IF NOT EXISTS `notificacion` (
  `id` int(11) NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_operador` int(11) DEFAULT NULL,
  `isRecibida` tinyint(1) DEFAULT NULL,
  `isVista` tinyint(1) DEFAULT NULL,
  `texto` varchar(250) DEFAULT NULL,
  `id_formato` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notificacion`
--

INSERT INTO `notificacion` (`id`, `fecha_alta`, `id_usuario`, `id_operador`, `isRecibida`, `isVista`, `texto`, `id_formato`) VALUES
(1, '2015-12-11 14:33:28', NULL, 1, 0, 1, 'Se ha registrado una nueva incidencia con Nro: 1.', 2),
(2, '2015-12-11 14:33:28', NULL, 2, 1, 1, 'Se ha registrado una nueva incidencia con Nro: 1.', 2),
(3, '2015-12-11 14:35:22', 1, NULL, 1, 1, 'Su incidencia con Nro: 1, a cambiado a estado En Proceso.', 1),
(4, '2015-12-11 14:36:35', 1, NULL, 1, 1, 'Su incidencia con Nro: 1, a cambiado a estado Cerrado.', 1),
(5, '2015-12-11 14:52:23', NULL, 1, 1, 1, 'Se ha registrado una nueva incidencia con Nro: 2.', 2),
(6, '2015-12-11 14:52:24', NULL, 2, 1, 1, 'Se ha registrado una nueva incidencia con Nro: 2.', 2),
(7, '2015-12-11 14:53:31', NULL, 1, 1, 1, 'Se ha registrado una nueva incidencia con Nro: 3.', 2),
(8, '2015-12-11 14:53:31', NULL, 2, 1, 1, 'Se ha registrado una nueva incidencia con Nro: 3.', 2),
(9, '2015-12-11 14:54:49', NULL, 1, 1, 1, 'Se ha registrado una nueva incidencia con Nro: 4.', 2),
(10, '2015-12-11 14:54:49', NULL, 2, 1, 1, 'Se ha registrado una nueva incidencia con Nro: 4.', 2),
(11, '2015-12-11 14:56:04', NULL, 1, 1, 1, 'Se ha registrado una nueva incidencia con Nro: 5.', 2),
(12, '2015-12-11 14:56:04', NULL, 2, 1, 1, 'Se ha registrado una nueva incidencia con Nro: 5.', 2),
(13, '2015-12-11 14:57:44', NULL, 1, 1, 1, 'Se ha registrado una nueva incidencia con Nro: 6.', 2),
(14, '2015-12-11 14:57:44', NULL, 2, 1, 1, 'Se ha registrado una nueva incidencia con Nro: 6.', 2),
(15, '2015-12-11 14:57:54', 1, NULL, 1, 1, 'Su incidencia con Nro: 5, a cambiado a estado En Proceso.', 1),
(16, '2015-12-11 14:58:05', 1, NULL, 1, 1, 'Su incidencia con Nro: 4, a cambiado a estado En Proceso.', 1),
(17, '2015-12-12 14:02:15', NULL, 1, 1, 1, 'Se ha registrado una nueva incidencia con Nro: 7.', 2),
(18, '2015-12-12 14:02:15', NULL, 2, 1, 1, 'Se ha registrado una nueva incidencia con Nro: 7.', 2),
(19, '2015-12-12 14:02:49', 1, NULL, 1, 1, 'Su incidencia con Nro: 7, a cambiado a estado En Proceso.', 1),
(20, '2015-12-12 14:03:51', 1, NULL, 1, 1, 'Su incidencia con Nro: 7, a cambiado a estado Cerrado.', 1),
(21, '2015-12-12 18:53:30', 1, NULL, 1, 1, 'Su incidencia con Nro: 2, a cambiado a estado En Proceso.', 1),
(22, '2015-12-12 18:54:27', 1, NULL, 1, 1, 'Su incidencia con Nro: 2, a cambiado a estado En Proceso.', 1),
(23, '2015-12-12 21:28:41', NULL, 1, 0, 0, 'Se ha registrado una nueva incidencia con Nro: 8.', 2),
(24, '2015-12-12 21:28:41', NULL, 2, 1, 1, 'Se ha registrado una nueva incidencia con Nro: 8.', 2),
(25, '2015-12-12 23:05:27', 1, NULL, 1, 1, 'Su incidencia con Nro: 8, a cambiado a estado En Proceso.', 1),
(26, '2015-12-12 23:25:32', 1, NULL, 1, 1, 'Su incidencia con Nro: 8, a cambiado a estado Cerrado.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operador`
--

CREATE TABLE IF NOT EXISTS `operador` (
  `id` int(11) NOT NULL,
  `codigo` varchar(6) NOT NULL,
  `nombre_apellido` varchar(200) NOT NULL,
  `dni` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `estado_logico` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `operador`
--

INSERT INTO `operador` (`id`, `codigo`, `nombre_apellido`, `dni`, `email`, `estado_logico`) VALUES
(0, '0', '', '', '', 1),
(1, '00001', 'Roberto Gomez', '28693210', 'rgomez@gmail.com', 1),
(2, '00002', 'Adrian Soria', '30458120', 'asoria@yahoo.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE IF NOT EXISTS `provincia` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`id`, `descripcion`) VALUES
(1, 'Buenos Aires');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_incidente`
--

CREATE TABLE IF NOT EXISTS `tipo_incidente` (
  `id` int(11) NOT NULL,
  `codigo` varchar(2) NOT NULL,
  `descripcion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_incidente`
--

INSERT INTO `tipo_incidente` (`id`, `codigo`, `descripcion`) VALUES
(1, 'R', 'Reclamo'),
(2, 'C', 'Consulta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `remember_token` varchar(200) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `id_usuario`, `email`, `password`, `id_tipo`, `remember_token`, `updated_at`) VALUES
(1, 1, 'agente@wugoa.com.ar', 'agente1234', 1, 'f9M4wTkeh6Ui6Cey1mFPWnBcxDWABuzu6qyZ6h1fFm4KBjlxpdLYRhoqNhQE', '2015-12-13 03:21:38'),
(2, 2, 'operador@wugoa.com.ar', 'operador1234', 2, 'G9TTDMdLOuxT0w41OVCGNTblZLgdhHidRN20dTI09hFbc5GZQbblaiF0rCaW', '2015-12-13 04:31:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_agente`
--

CREATE TABLE IF NOT EXISTS `usuario_agente` (
  `id` int(11) NOT NULL,
  `nombre_apellido` varchar(20) DEFAULT NULL,
  `dni` varchar(10) DEFAULT NULL,
  `id_agente` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_agente`
--

INSERT INTO `usuario_agente` (`id`, `nombre_apellido`, `dni`, `id_agente`) VALUES
(1, 'Mariano Noya', '35428754', 1),
(2, 'Leandro Ramos', '34653142', 1),
(3, 'Diego Ocaranza', '27654376', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agente`
--
ALTER TABLE `agente`
  ADD PRIMARY KEY (`id`,`codigo`);

--
-- Indices de la tabla `apertura`
--
ALTER TABLE `apertura`
  ADD PRIMARY KEY (`id`,`codigo`);

--
-- Indices de la tabla `estado_incidencia`
--
ALTER TABLE `estado_incidencia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `formato_notificacion`
--
ALTER TABLE `formato_notificacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `incidencia`
--
ALTER TABLE `incidencia`
  ADD PRIMARY KEY (`id`,`codigo`);

--
-- Indices de la tabla `incidente`
--
ALTER TABLE `incidente`
  ADD PRIMARY KEY (`id`,`codigo`);

--
-- Indices de la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD PRIMARY KEY (`id`,`codigo`);

--
-- Indices de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `operador`
--
ALTER TABLE `operador`
  ADD PRIMARY KEY (`id`,`codigo`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_incidente`
--
ALTER TABLE `tipo_incidente`
  ADD PRIMARY KEY (`id`,`codigo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario_agente`
--
ALTER TABLE `usuario_agente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agente`
--
ALTER TABLE `agente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `apertura`
--
ALTER TABLE `apertura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `estado_incidencia`
--
ALTER TABLE `estado_incidencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `formato_notificacion`
--
ALTER TABLE `formato_notificacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `incidencia`
--
ALTER TABLE `incidencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `incidente`
--
ALTER TABLE `incidente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `localidad`
--
ALTER TABLE `localidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `operador`
--
ALTER TABLE `operador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tipo_incidente`
--
ALTER TABLE `tipo_incidente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario_agente`
--
ALTER TABLE `usuario_agente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
