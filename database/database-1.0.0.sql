-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-04-2018 a las 17:04:38
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lidertrans`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lt_bodega`
--

CREATE TABLE `lt_bodega` (
  `fecha_venta_bod` datetime NOT NULL,
  `doc_cliente` int(11) NOT NULL,
  `id_bodega` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `valor_servicio` int(11) NOT NULL,
  `observaciones` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lt_bodega`
--

INSERT INTO `lt_bodega` (`fecha_venta_bod`, `doc_cliente`, `id_bodega`, `id_servicio`, `valor_servicio`, `observaciones`) VALUES
('2017-04-01 00:00:00', 1, 1, 1, 1000, 'asdsad'),
('2017-04-01 00:00:00', 1116245037, 2, 1, 1000, ''),
('2017-04-01 00:00:00', 1, 3, 1, 1000, ''),
('2017-04-01 00:00:00', 80793699, 4, 1, 1000, 'asdasnd asdns djklasd'),
('2017-04-04 00:00:00', 80793699, 5, 1, 1000, 'HJVHJHJVVHJ'),
('2017-05-10 17:45:52', 80793699, 6, 1, 1000, 'Una maleta verde'),
('2017-05-24 11:33:26', 1116245037, 7, 1, 1000, 'Una maleta grande y 2 bolsas\r\n'),
('2017-05-24 11:33:41', 80793699, 8, 1, 1000, '1 maletin negro'),
('2017-05-24 11:33:53', 14345543, 9, 1, 1000, 'un costal de papa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lt_clientes`
--

CREATE TABLE `lt_clientes` (
  `id_cliente` int(11) NOT NULL,
  `doc_cliente` int(11) DEFAULT NULL,
  `nom_cliente` varchar(50) NOT NULL,
  `apell_cliente` varchar(50) NOT NULL,
  `tel_cliente` varchar(20) NOT NULL,
  `email_cliente` varchar(50) NOT NULL,
  `ciudad_cliente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lt_clientes`
--

INSERT INTO `lt_clientes` (`id_cliente`, `doc_cliente`, `nom_cliente`, `apell_cliente`, `tel_cliente`, `email_cliente`, `ciudad_cliente`) VALUES
(1, 80793699, 'CHARLES', 'CIFUENTES', '3174015113', 'charlescifuentes@gmail.com', 'TULUÁ'),
(3, 1, 'CLIENTE', 'GENERAL', '12345', 'N/A', 'N/A'),
(6, 1116245037, 'VALERIA', 'CIFUENTES', '3145554332', 'valeriacifuentes@gmail.com', 'CALI'),
(7, 14345543, 'CARLOS', 'PEREZ', '3103387665', 'carlosperez@hotmail.com', 'BOGOTÁ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lt_configuracion`
--

CREATE TABLE `lt_configuracion` (
  `id_configuracion` int(11) NOT NULL,
  `nombre_empresa` varchar(100) NOT NULL,
  `nit_empresa` varchar(100) NOT NULL,
  `direccion_empresa` varchar(100) NOT NULL,
  `telefono_empresa` varchar(100) NOT NULL,
  `cia_aseguradora` varchar(100) NOT NULL,
  `poliza_numero` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lt_configuracion`
--

INSERT INTO `lt_configuracion` (`id_configuracion`, `nombre_empresa`, `nit_empresa`, `direccion_empresa`, `telefono_empresa`, `cia_aseguradora`, `poliza_numero`) VALUES
(1, 'LIDERTRANS LTDA', '821.003.072-2', 'CARRERA 20 # 25-75', '2258129 - 2243950', 'QBE SEGUROS', '706533142');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lt_cuota_administracion`
--

CREATE TABLE `lt_cuota_administracion` (
  `id_cadmin` int(11) NOT NULL,
  `fecha_venta` datetime NOT NULL,
  `numero_vehiculo` varchar(10) NOT NULL,
  `id_ruta` int(11) NOT NULL,
  `pasajeros` int(11) NOT NULL,
  `valor_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lt_cuota_administracion`
--

INSERT INTO `lt_cuota_administracion` (`id_cadmin`, `fecha_venta`, `numero_vehiculo`, `id_ruta`, `pasajeros`, `valor_admin`) VALUES
(1, '2017-04-01 00:00:00', '51', 1, 4, 3000),
(2, '2017-04-03 00:00:00', '85', 1, 3, 4500),
(3, '2017-04-03 00:00:00', '04', 1, 4, 6500),
(4, '2017-04-03 00:00:00', '51', 4, 4, 2500),
(5, '2017-04-03 00:00:00', '51', 1, 4, 4500),
(6, '2017-04-04 00:00:00', '51', 1, 8, 3000),
(7, '2017-04-04 00:00:00', '85', 2, 1, 3000),
(8, '2017-04-04 00:00:00', '51', 1, 3, 4500),
(9, '2017-05-10 00:00:00', '85', 1, 1, 3000),
(10, '2017-05-10 00:00:00', '51', 4, 2, 3000),
(11, '2017-05-10 15:40:53', '51', 2, 2, 3000),
(12, '2017-05-10 15:42:08', '85', 4, 3, 4500),
(13, '2017-05-10 17:25:34', '51', 1, 4, 3000),
(14, '2017-05-24 11:10:03', '85', 1, 1, 3000),
(15, '2017-05-24 11:10:54', '51', 4, 4, 6500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lt_rutas`
--

CREATE TABLE `lt_rutas` (
  `id_ruta` int(11) NOT NULL,
  `nom_ruta` varchar(50) NOT NULL,
  `valor_ruta` int(11) NOT NULL,
  `activo_ruta` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lt_rutas`
--

INSERT INTO `lt_rutas` (`id_ruta`, `nom_ruta`, `valor_ruta`, `activo_ruta`) VALUES
(1, 'TULUÁ - LA MARINA', 2500, 1),
(2, 'LA MARINA - TULUÁ', 2500, 1),
(4, 'CEILAN - TULUÁ', 3500, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lt_servicios`
--

CREATE TABLE `lt_servicios` (
  `id_servicio` int(11) NOT NULL,
  `nom_servicio` varchar(50) NOT NULL,
  `valor_servicio` int(11) NOT NULL,
  `activo_servicio` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lt_servicios`
--

INSERT INTO `lt_servicios` (`id_servicio`, `nom_servicio`, `valor_servicio`, `activo_servicio`) VALUES
(1, 'SERVICIO BODEGA', 1000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lt_tiquetes`
--

CREATE TABLE `lt_tiquetes` (
  `fecha_venta_tiq` datetime NOT NULL,
  `numero_vehiculo` varchar(10) NOT NULL,
  `id_tiquete` int(11) NOT NULL,
  `doc_cliente` int(11) NOT NULL,
  `id_ruta` int(11) NOT NULL,
  `pasajeros` int(11) NOT NULL,
  `valor_ruta` int(11) NOT NULL,
  `observaciones` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lt_tiquetes`
--

INSERT INTO `lt_tiquetes` (`fecha_venta_tiq`, `numero_vehiculo`, `id_tiquete`, `doc_cliente`, `id_ruta`, `pasajeros`, `valor_ruta`, `observaciones`) VALUES
('2017-04-01 00:00:00', '51', 1, 1, 1, 3, 2500, NULL),
('2017-04-01 00:00:00', '51', 2, 1, 1, 1, 2500, NULL),
('2017-04-01 00:00:00', '85', 3, 1, 2, 1, 2500, NULL),
('2017-04-01 00:00:00', '85', 4, 1, 1, 1, 2500, NULL),
('2017-04-03 00:00:00', '85', 5, 80793699, 2, 1, 2500, NULL),
('2017-04-03 00:00:00', '04', 6, 1, 2, 2, 2500, NULL),
('2017-04-03 00:00:00', '04', 7, 1, 2, 2, 2500, NULL),
('2017-04-03 00:00:00', '51', 8, 1, 4, 1, 3500, NULL),
('2017-04-03 00:00:00', '51', 10, 1, 1, 2, 2500, NULL),
('2017-04-03 00:00:00', '51', 11, 1, 1, 1, 2500, NULL),
('2017-04-03 00:00:00', '51', 12, 1, 1, 1, 2500, NULL),
('2017-04-04 00:00:00', '51', 15, 1, 1, 3, 2500, NULL),
('2017-04-04 00:00:00', '51', 16, 1, 1, 1, 2500, NULL),
('2017-04-04 00:00:00', '85', 17, 1, 2, 1, 2500, NULL),
('2017-04-04 00:00:00', '51', 18, 1, 1, 3, 2500, NULL),
('2017-04-04 00:00:00', '51', 22, 1, 1, 1, 2500, NULL),
('2017-04-05 00:00:00', '04', 23, 1, 1, 1, 2500, NULL),
('2017-04-05 00:00:00', '04', 24, 1, 2, 1, 2500, NULL),
('2017-04-05 00:00:00', '04', 25, 1, 1, 1, 2500, NULL),
('2017-04-17 00:00:00', '04', 26, 1, 1, 1, 2500, NULL),
('2017-04-17 00:00:00', '51', 27, 1, 2, 1, 2500, NULL),
('0000-00-00 00:00:00', '51', 28, 1, 2, 1, 0, NULL),
('0000-00-00 00:00:00', '51', 29, 1, 2, 1, 2500, NULL),
('0000-00-00 00:00:00', '51', 30, 1, 1, 1, 2500, NULL),
('2017-05-09 23:59:44', '51', 31, 1, 2, 1, 2500, NULL),
('2017-05-10 12:19:29', '51', 32, 1, 1, 1, 2500, NULL),
('2017-05-10 17:24:06', '51', 33, 1116245037, 1, 2, 2500, NULL),
('2017-05-10 17:24:44', '51', 34, 80793699, 1, 1, 2500, NULL),
('2017-05-10 17:25:01', '51', 35, 14345543, 1, 1, 2500, NULL),
('2017-05-24 11:09:48', '85', 36, 1, 1, 1, 2500, NULL),
('2017-05-24 11:10:24', '51', 37, 1, 4, 2, 3500, NULL),
('2017-05-24 11:10:38', '51', 38, 1, 4, 1, 3500, NULL),
('2017-05-24 11:10:45', '51', 39, 1, 4, 1, 3500, NULL),
('2017-05-27 18:26:23', '51', 40, 1, 2, 1, 2500, NULL),
('2017-05-27 18:27:26', '51', 41, 1, 1, 1, 2500, NULL),
('2017-05-27 18:42:04', '51', 42, 1, 2, 1, 2500, NULL),
('2017-05-31 10:39:00', '51', 43, 1, 1, 1, 2500, NULL),
('2017-05-31 11:40:07', '51', 44, 1, 1, 1, 2500, NULL),
('2017-05-31 11:44:52', '51', 45, 1, 1, 1, 2500, NULL),
('2017-05-31 11:46:27', '51', 46, 1, 1, 1, 2500, NULL),
('2017-10-30 19:48:10', '51', 47, 1, 1, 1, 2500, NULL),
('2017-10-30 19:50:27', '51', 48, 1, 1, 1, 2500, NULL),
('2017-10-30 19:51:11', '51', 49, 1, 1, 1, 2500, NULL),
('2017-10-30 19:51:58', '51', 50, 1, 1, 1, 2500, NULL),
('2017-10-30 19:54:05', '51', 51, 1, 1, 1, 2500, NULL),
('2017-10-30 20:23:48', '51', 52, 1, 1, 1, 2500, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lt_users`
--

CREATE TABLE `lt_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  `user_nombres` varchar(250) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lt_users`
--

INSERT INTO `lt_users` (`user_id`, `user_name`, `user_password`, `user_nombres`, `user_email`, `user_active`) VALUES
(1, 'admin', 'admin', 'Usuario Demo', 'charlescifuentes@colombia-web.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lt_vehiculos`
--

CREATE TABLE `lt_vehiculos` (
  `numero_vehiculo` varchar(10) NOT NULL,
  `placa_vehiculo` varchar(10) NOT NULL,
  `nombres_conductor` varchar(50) NOT NULL,
  `apellidos_conductor` varchar(50) NOT NULL,
  `telefono_conductor` varchar(50) NOT NULL,
  `numero_licencia` varchar(50) NOT NULL,
  `categoria_licencia` varchar(5) NOT NULL,
  `venc_licencia` date NOT NULL,
  `numero_soat` varchar(50) NOT NULL,
  `venc_soat` date NOT NULL,
  `num_tarjeta_operacion` varchar(50) NOT NULL,
  `venc_tarjeta_operacion` date NOT NULL,
  `extracto_contractual` varchar(50) NOT NULL,
  `venc_extracto_contractual` date NOT NULL,
  `num_tecnico_mecanica` varchar(50) NOT NULL,
  `venc_tecnico_mecanica` date NOT NULL,
  `clase_vehiculo` varchar(20) NOT NULL,
  `capacidad_pasajeros` int(11) NOT NULL,
  `pasajeros_asignados` int(11) NOT NULL DEFAULT '0',
  `enturnar` tinyint(1) NOT NULL DEFAULT '0',
  `nombres_propietario` varchar(50) NOT NULL,
  `apellidos_propietario` varchar(50) NOT NULL,
  `telefono_propietario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lt_vehiculos`
--

INSERT INTO `lt_vehiculos` (`numero_vehiculo`, `placa_vehiculo`, `nombres_conductor`, `apellidos_conductor`, `telefono_conductor`, `numero_licencia`, `categoria_licencia`, `venc_licencia`, `numero_soat`, `venc_soat`, `num_tarjeta_operacion`, `venc_tarjeta_operacion`, `extracto_contractual`, `venc_extracto_contractual`, `num_tecnico_mecanica`, `venc_tecnico_mecanica`, `clase_vehiculo`, `capacidad_pasajeros`, `pasajeros_asignados`, `enturnar`, `nombres_propietario`, `apellidos_propietario`, `telefono_propietario`) VALUES
('04', 'CDF-34C', 'JUANA', 'MARIA', '123123123', 'SADSAD', 'B1', '2017-03-16', 'SDFDSF123213', '2017-03-08', 'ASDDASD12321', '2017-04-21', 'DSDF213213', '2017-04-21', 'SDFDSF123213', '2017-04-27', 'AUTOMOVIL', 4, 0, 0, 'PABLO', 'PEREZ', '123123123'),
('07', 'CCD-12C', 'CASJDJKS', 'SAKLDSAKD', '21312', 'ASDSALKD', 'SADSA', '2017-05-18', 'ASDSAD', '2017-05-18', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', 0, 0, 0, 'ASDSAD', 'ASDASD', '23123'),
('51', 'CQW858', 'CHARLES', 'CIFUENTES', '3174015113', '675767SDASD', 'C1', '2018-06-20', '2545ASDE2', '2017-03-31', '225SSDFE', '2017-03-28', 'ASD254', '2017-03-30', 'QWE213', '2017-03-30', 'TAXI', 4, 13, 1, 'JUAN', 'DE LA CRUZ', '3123432343'),
('85', 'NCT13C', 'LEIDY', 'GUEVARA', '3103381276', '', '', '0000-00-00', '25SDA', '2017-04-12', '12321SADASD', '2017-03-08', 'ASDAS23132', '2017-03-08', 'ASDASD123', '2017-03-31', 'MOTO', 1, 0, 0, 'JUANA', 'DE ARCO', '876675654');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `lt_bodega`
--
ALTER TABLE `lt_bodega`
  ADD PRIMARY KEY (`id_bodega`),
  ADD KEY `doc_cliente` (`doc_cliente`),
  ADD KEY `id_servicio` (`id_servicio`);

--
-- Indices de la tabla `lt_clientes`
--
ALTER TABLE `lt_clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `doc_cliente` (`doc_cliente`);

--
-- Indices de la tabla `lt_configuracion`
--
ALTER TABLE `lt_configuracion`
  ADD PRIMARY KEY (`id_configuracion`);

--
-- Indices de la tabla `lt_cuota_administracion`
--
ALTER TABLE `lt_cuota_administracion`
  ADD PRIMARY KEY (`id_cadmin`),
  ADD KEY `numero_vehiculo` (`numero_vehiculo`),
  ADD KEY `id_ruta` (`id_ruta`);

--
-- Indices de la tabla `lt_rutas`
--
ALTER TABLE `lt_rutas`
  ADD PRIMARY KEY (`id_ruta`),
  ADD UNIQUE KEY `id_ruta` (`id_ruta`);

--
-- Indices de la tabla `lt_servicios`
--
ALTER TABLE `lt_servicios`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `lt_tiquetes`
--
ALTER TABLE `lt_tiquetes`
  ADD PRIMARY KEY (`id_tiquete`),
  ADD UNIQUE KEY `id_tiquete` (`id_tiquete`),
  ADD KEY `id_ruta` (`id_ruta`),
  ADD KEY `valor_ruta` (`valor_ruta`),
  ADD KEY `doc_cliente` (`doc_cliente`),
  ADD KEY `numero_vehiculo` (`numero_vehiculo`) USING BTREE;

--
-- Indices de la tabla `lt_users`
--
ALTER TABLE `lt_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_name` (`user_nombres`);

--
-- Indices de la tabla `lt_vehiculos`
--
ALTER TABLE `lt_vehiculos`
  ADD PRIMARY KEY (`numero_vehiculo`),
  ADD UNIQUE KEY `numero_vehiculo` (`numero_vehiculo`),
  ADD KEY `placa_vehiculo` (`placa_vehiculo`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `lt_bodega`
--
ALTER TABLE `lt_bodega`
  MODIFY `id_bodega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `lt_clientes`
--
ALTER TABLE `lt_clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `lt_cuota_administracion`
--
ALTER TABLE `lt_cuota_administracion`
  MODIFY `id_cadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `lt_rutas`
--
ALTER TABLE `lt_rutas`
  MODIFY `id_ruta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `lt_servicios`
--
ALTER TABLE `lt_servicios`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `lt_tiquetes`
--
ALTER TABLE `lt_tiquetes`
  MODIFY `id_tiquete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT de la tabla `lt_users`
--
ALTER TABLE `lt_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `lt_bodega`
--
ALTER TABLE `lt_bodega`
  ADD CONSTRAINT `lt_bodega_ibfk_1` FOREIGN KEY (`doc_cliente`) REFERENCES `lt_clientes` (`doc_cliente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `lt_bodega_ibfk_2` FOREIGN KEY (`id_servicio`) REFERENCES `lt_servicios` (`id_servicio`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `lt_cuota_administracion`
--
ALTER TABLE `lt_cuota_administracion`
  ADD CONSTRAINT `lt_cuota_administracion_ibfk_1` FOREIGN KEY (`numero_vehiculo`) REFERENCES `lt_vehiculos` (`numero_vehiculo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `lt_cuota_administracion_ibfk_2` FOREIGN KEY (`id_ruta`) REFERENCES `lt_rutas` (`id_ruta`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `lt_tiquetes`
--
ALTER TABLE `lt_tiquetes`
  ADD CONSTRAINT `lt_tiquetes_ibfk_2` FOREIGN KEY (`doc_cliente`) REFERENCES `lt_clientes` (`doc_cliente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `lt_tiquetes_ibfk_3` FOREIGN KEY (`id_ruta`) REFERENCES `lt_rutas` (`id_ruta`) ON UPDATE CASCADE,
  ADD CONSTRAINT `lt_tiquetes_ibfk_4` FOREIGN KEY (`numero_vehiculo`) REFERENCES `lt_vehiculos` (`numero_vehiculo`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
