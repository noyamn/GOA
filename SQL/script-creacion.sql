-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2015 a las 21:35:38
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `agente`
--

INSERT INTO `agente` (`id`, `codigo`, `razon_social`, `nombre_fantasia`, `domicilio`, `codigo_postal`, `id_localidad`, `estado_logico`) VALUES
(1, '00001', 'Aiken computacion', 'Aiken computacion', 'Av. I. Arieta 1520', '1754', 1, 1),
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `apertura`
--

INSERT INTO `apertura` (`id`, `codigo`, `descripcion`, `estado_logico`, `id_incidente`) VALUES
(7, '000505', 'Agregar apellido', 1, 1),
(8, '000506', 'Modificar nombre', 1, 1),
(9, '000524', 'Modificar apellido', 1, 2),
(10, '000525', 'Modificar Compania/ Nombre', 1, 2),
(11, '000572', 'Conciliacion Interbanking', 1, 3),
(12, '000010', 'Datos varios', 1, 4),
(13, '000008', 'Destino', 1, 4),
(14, '000070', 'Error en carga de datos', 1, 5),
(15, '000079', 'Está pagando otros servicios', 1, 5),
(17, '000504', 'Correccion de apellido', 1, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `incidencia`
--

INSERT INTO `incidencia` (`id`, `codigo`, `fecha_alta`, `fecha_cierre`, `beneficiario`, `mtcn`, `monto`, `destino`, `observaciones`, `respuesta`, `prioridad`, `id_agente`, `id_operador`, `id_estado`, `id_apertura`) VALUES
(1, '1', '2015-12-11 14:33:28', '2015-12-11 14:36:35', 'Carlos Perez', 1500000001, '1000.00', 'Buenos Aires', '<p>El apellido del beneficiario era erroneo</p>', '<p>El incidente ha sido procesado correctamente</p>', 2, 1, 2, 3, 7),
(2, '2', '2015-12-11 14:52:23', NULL, 'Roberto Montoto', 1500000021, '15000.00', 'Jujuy', '<p>Numero de MTCN mal ingresado.</p>', NULL, 1, 1, 0, 1, 14),
(3, '3', '2015-12-11 14:53:31', '2015-12-16 16:21:33', 'Armando Barredas', 1500000430, '150.00', 'Mar del Plata', '<p>Se ingreso el apellido erroneamente</p>', '<p>asdasd</p>', 2, 1, 1, 3, 9),
(4, '4', '2015-12-11 14:54:49', NULL, 'Roberto Montoto', 1500000005, '6000.00', 'Uruguay', '<p>Servicio ya abonado</p>', NULL, 1, 1, 2, 2, 15),
(5, '5', '2015-12-11 14:56:04', NULL, 'Carlos Saul', 1500000543, '5650.00', 'Mar del Plata', '<p>Primer nombre mal ingresado</p>', NULL, 2, 1, 2, 2, 8),
(6, '6', '2015-12-11 14:57:44', NULL, 'Monica Perez', 1500000048, '16550.00', 'Uruguay', '<p>Se debe observar la compania ya que se encuentra inhabilitada</p>', NULL, 2, 1, 0, 1, 10),
(7, '7', '2015-12-12 14:02:15', '2015-12-12 14:03:51', 'Luciano Soro', 1500000025, '15250.00', 'San Salvador', '<p>El destino que se observa en el sistema no corresponde con el ingresado.</p>', '<p>Se corrigio en el sistema el destino, ya que se habia ingresado erroneamente.</p>', 3, 1, 2, 3, 13),
(8, '8', '2015-12-12 21:28:41', '2015-12-12 23:25:32', 'Carlos Perez', 1500000012, '10000.00', 'Santa Fe', '<p>El apellido del beneficiario se introdujo erroneamente.</p>', '<p>Se corrigio el apellido del beneficiario, ya que era erroneo.</p>', 2, 1, 2, 3, 7),
(9, '9', '2015-12-16 15:27:13', '2015-12-16 15:30:43', 'Daniel Rodriguez', 1500000321, '8550.00', 'Tierra del Fuego', '<p>Queria consultar por el estado del envio de dinero.</p>', '<p>El envio se encuentra en proceso.</p>', 3, 2, 1, 3, 12),
(10, '10', '2015-12-16 15:35:40', NULL, 'Raul Gomez', 1500000101, '850.00', 'Buenos Aires', '<p>Queria saber el estado de la operatoria via homebanking</p>', NULL, 4, 2, 0, 1, 11),
(11, '11', '2015-12-16 16:07:23', NULL, 'Daniel Rodriguez', 1500000225, '1250.00', 'Tierra del Fuego', '<p>Error al ingresar el primer nombre del beneficiario</p>', '', 2, 2, 0, 1, 8);

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
(3, '00003', 'Transferencia a cuenta', 2, 4, 1),
(4, '00004', 'Verificacion', 2, 5, 1),
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notificacion`
--

INSERT INTO `notificacion` (`id`, `fecha_alta`, `id_usuario`, `id_operador`, `isRecibida`, `isVista`, `texto`, `id_formato`) VALUES
(1, '2015-12-16 15:27:13', NULL, 1, 1, 1, 'Se ha registrado una nueva incidencia con Nro: 9.', 2),
(2, '2015-12-16 15:27:13', NULL, 2, 1, 1, 'Se ha registrado una nueva incidencia con Nro: 9.', 2),
(3, '2015-12-16 15:29:55', 2, NULL, 1, 1, 'Su incidencia con Nro: 9, a cambiado a estado En Proceso.', 1),
(4, '2015-12-16 15:30:43', 2, NULL, 1, 1, 'Su incidencia con Nro: 9, a cambiado a estado Cerrado.', 1),
(5, '2015-12-16 15:35:40', NULL, 1, 1, 0, 'Se ha registrado una nueva incidencia con Nro: 10.', 2),
(6, '2015-12-16 15:35:40', NULL, 2, 1, 1, 'Se ha registrado una nueva incidencia con Nro: 10.', 2),
(7, '2015-12-16 16:07:23', NULL, 1, 1, 0, 'Se ha registrado una nueva incidencia con Nro: 11.', 2),
(8, '2015-12-16 16:07:23', NULL, 2, 1, 1, 'Se ha registrado una nueva incidencia con Nro: 11.', 2),
(9, '2015-12-16 16:07:39', 2, NULL, 1, 0, 'Su incidencia con Nro: 11, a cambiado a estado En Proceso.', 1),
(10, '2015-12-16 16:07:57', 2, NULL, 1, 0, 'Su incidencia con Nro: 11, a cambiado a estado Cerrado.', 1),
(11, '2015-12-16 16:21:06', NULL, 1, 1, 0, 'Se ha registrado una nueva incidencia con Nro: 12.', 2),
(12, '2015-12-16 16:21:06', NULL, 2, 1, 1, 'Se ha registrado una nueva incidencia con Nro: 12.', 2),
(13, '2015-12-16 16:21:28', 1, NULL, 1, 1, 'Su incidencia con Nro: 3, a cambiado a estado En Proceso.', 1),
(14, '2015-12-16 16:21:33', 1, NULL, 1, 1, 'Su incidencia con Nro: 3, a cambiado a estado Cerrado.', 1),
(15, '2015-12-16 16:25:13', 1, NULL, 1, 1, 'Su incidencia con Nro: 12, a cambiado a estado En Proceso.', 1),
(16, '2015-12-16 16:25:18', 1, NULL, 1, 1, 'Su incidencia con Nro: 12, a cambiado a estado Cerrado.', 1),
(17, '2015-12-16 16:33:33', 1, NULL, 1, 1, 'Su incidencia con Nro: 4, a cambiado a estado En Proceso.', 1),
(18, '2015-12-16 16:33:50', 1, NULL, 1, 1, 'Su incidencia con Nro: 4, a cambiado a estado En Proceso.', 1),
(19, '2015-12-16 17:33:11', 1, NULL, 0, 0, 'Su incidencia con Nro: 2, a cambiado a estado En Proceso.', 1),
(20, '2015-12-16 17:33:42', 1, NULL, 0, 0, 'Su incidencia con Nro: 2, a cambiado a estado En Proceso.', 1);

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
(1, '00001', 'Ana Gomez', '28693210', 'operador1@wugoa.com.ar', 1),
(2, '00002', 'Adrian Soria', '30458120', 'operador@wugoa.com.ar', 1);

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
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `id_usuario`, `email`, `password`, `id_tipo`, `remember_token`, `updated_at`, `created_at`) VALUES
(1, 1, 'agente@wugoa.com.ar', 'agente1234', 1, 'f5Y12OZ0CYJSvxArDnPhhFiiJys6Im3F93mtH18AQIyyFY4hyGkM3hRhTLh2', '2015-12-16 20:32:59', NULL),
(2, 2, 'operador@wugoa.com.ar', 'operador1234', 2, 'YlxkGO0V8xoW5HlBDEGGkE78AfPe3ziIm6yWkbwGwyKkESx1STsdBVcOZd4C', '2015-12-16 18:44:16', NULL),
(3, 2, 'agente1@wugoa.com.ar', 'agente1234', 1, 'M1rHvbq5HlItDw9zj9fugFmF8brevlCtnvcpZbJMKiMysdsPmR5T8EpzmTj5', '2015-12-16 19:19:56', NULL),
(8, 3, 'agente3@wunion.com.ar', 'agente1234', 1, NULL, NULL, NULL),
(9, 1, 'operador1@wugoa.com.ar', 'operador1234', 2, 'UsiONhWmWjRR5fJyrleHtGxTIEpyoltL5sapB4SPOXwHwRvYjCF4zaxVu5Y6', '2015-12-16 19:29:54', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `apertura`
--
ALTER TABLE `apertura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `usuario_agente`
--
ALTER TABLE `usuario_agente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
