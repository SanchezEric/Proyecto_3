-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2015 a las 23:04:58
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `club_estudio`
--
CREATE DATABASE IF NOT EXISTS `club_estudio` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `club_estudio`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(1, 'Aula'),
(2, 'Sala'),
(3, 'Hardware y recursos'),
(4, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencia`
--

CREATE TABLE IF NOT EXISTS `incidencia` (
  `id_incidencia` int(11) NOT NULL,
  `titulo` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `id_recurso` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `incidencia`
--

INSERT INTO `incidencia` (`id_incidencia`, `titulo`, `descripcion`, `id_recurso`, `id_usuario`, `fecha`) VALUES
(1, 'Cargadores de Portátil', 'Los cargadores de los portátiles 01-19 y 01-22 no funcionan. ', 1, 2, '2015-09-21 09:22:29'),
(2, 'Reparar asiento sala de reuniones', 'Buenos días, mañana se celebrará una reunión muy importante en la sala de reuniones y hemos visto que un par de asientos están en mal estado. Gracias.', 12, 2, '2015-10-05 10:37:18'),
(3, 'Teclados y ratones aula informática', 'Buenos días, algunos estudiantes me han informado que hay ratones y teclados del aula de informática norte que no funcionan correctamente.  ', 4, 3, '2015-10-06 08:33:22'),
(4, 'Pantalla portátil carro rota', 'Esta mañana revisando los portátiles antes de clase he observado que el portátil  01-13 tenía la pantalla rota. Es bastante importante cambiarla cuanto antes, necesitamos todos los portátiles.', 1, 4, '2015-10-10 13:24:37'),
(5, 'Actualización Windows 10', 'Hace un tiempo que siempre que iniciamos este portátil salta un mensaje para actualizar a Windows 10. Nos gustaría que actualizarais el portátil o quitarais el mensaje, es bastante molesto.', 10, 3, '2015-11-04 11:24:35'),
(6, 'No detecta la SIM', 'Me han asignado el teléfono para las llamadas de empresa, pero no me detecta la segunda SIM. Dejaré el teléfono en recepción.', 6, 4, '2015-11-04 10:33:13'),
(7, 'Ratones aula informática', 'Me han informado que siguen fallando algunos ratones del aula informática norte.', 4, 2, '2015-11-04 17:27:39'),
(8, 'Proyector aula Magna', 'El proyector de ha descolgado del techo, lo necesitamos para impartir clase.', 13, 4, '2015-11-04 12:21:34'),
(9, 'Proyector Asus', 'Hemos cogido el proyector Asus para utilizarlo mientras solucionáis lo del aula Magna, pero la bombilla de este proyector emite colores extraños.', 11, 2, '2015-11-04 11:30:00'),
(10, 'Cableado despacho reuniones', 'Esta sala cuenta con dos cables RJ45 pero, han desaparecido y llega muy poca conexión de WI-FI.', 3, 3, '2015-11-04 12:45:33'),
(11, 'Calibrar pizarra táctil', 'La pizarra táctil de este aula está totalmente descalibrada, no podemos utilizarla en este estado.', 14, 3, '2015-11-04 11:17:38'),
(12, 'Proyector Asus', 'La bombilla se ha fundido, esta tarde necesitamos el proyector para una reunión.', 11, 2, '2015-11-04 11:21:33'),
(13, 'Carro portátiles', 'Han desaparecido los portátiles 01-18 y 01-19.', 1, 4, '2015-11-04 12:19:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recurso`
--

CREATE TABLE IF NOT EXISTS `recurso` (
  `id_recurso` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `descr` longtext COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `categoria` varchar(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `recurso`
--

INSERT INTO `recurso` (`id_recurso`, `nombre`, `descr`, `img`, `estado`, `categoria`) VALUES
(1, 'Carro portï¿½tiles', 'Carro de portï¿½tiles situado en recepciï¿½n, contiene de 25 portï¿½tiles Compaq y sus cargadores, todos ellos numerados. Especificaciones: Windows 7, procesador Intel I5, 4GB de memoria RAM, disco duro de 500 GB, pantalla 15.6ï¿½, conectores VGA y HDMI.La llave de este carro estï¿½ en secretarï¿½a y ha de ser retornada junto al carro.', 'carro.jpg', '0', '3'),
(2, 'Despacho entrevistas', 'Despacho  para entrevistas situado en la primera planta detrás de recepción, puerta 01. Consta de un escritorio y dos sillas de oficina.', 'despacho1.jpg', '0', '2'),
(3, 'Despacho reuniones', 'Despacho de reuniones y estudio en grupo, situado en la primera planta detrás de recepción, puerta 02. Consta de una mesa redonda y cinco sillas de oficina.', 'despacho2.jpg', '1', '2'),
(4, 'Aula informática norte', 'Aula de informática situada en la sala 10. Consta de dieciséis equipos sobremesa, pizarra y un proyector. Especificaciones de los equipos: Windows 7, procesador Intel I3, 2GB de memoria RAM, disco duro de 500GB.', 'informatica1.jpg', '2', '1'),
(5, 'Aula informática sur', 'Aula de informática situada en la sala 11. Consta de diecinueve equipos portátiles, pizarra y un proyector. Especificaciones de los equipos: Windows 7, procesador Intel I5, 4GB de memoria RAM, disco duro de 1TB.', 'informatica2.jpg', '1', '1'),
(6, 'Móvil Bogo', 'Teléfono multimedia Android lifeStyle 4SL-QC. Especificaciones: Procesador Quad Core, Dual SIM, pantalla 4.3”, cámara 8 Mp, batería  integrada litio, GPS, Wi-FI, Bluetooth.', 'movil1.jpg', '1', '3'),
(7, 'Móvil HTC', 'Teléfono multimedia Windows Phone HTC 8x. Especificaciones: Procesador Qualcomm, pantalla 4.3”, cámara 8 Mp, batería  integrada litio, GPS, Wi-FI, Bluetooth.', 'movil2.jpg', '1', '3'),
(8, 'Portátil Acer', 'Portátil Acer Aspire, guardado en la sala de profesores. Especificaciones: Windows 7, procesador Intel I3, 4GB de memoria RAM, disco duro de 250 GB, pantalla 15.6”, conector VGA.', 'portatil1.jpg', '1', '3'),
(9, 'Portátil Toshiba', 'Portátil Toshiba Satellite, guardado en la sala de profesores. Especificaciones: Windows 7, procesador Intel I5, 4GB de memoria RAM, disco duro de 500 GB, pantalla 15.6”, conectores VGA y HDMI.', 'portatil2.jpg', '1', '3'),
(10, 'Portátil HP', 'Portátil HP, pensado para diseño, guardado en la sala de profesores. Especificaciones: Windows 8, procesador Intel I7, 8GB de memoria RAM, disco duro de 500 GB, pantalla 15.6”, gráfica gt760, conectores VGA y HDMI.', 'portatil3.jpg', '1', '3'),
(11, 'Proyector Asus', 'Proyector Asus, guardado en la sala de profesores. Contiene mando propio. Especificaciones: Entrada VGA y HDMI, audio Estéreo, resolución nativa 800x600, peso 1.9Kg .', 'proyector.jpg', '1', '3'),
(12, 'Sala Reuniones', 'Aula de reuniones y debates, situada en la sala 35. Espacio para 38 personas.', 'reuniones.jpg', '1', '2'),
(13, 'Aula teoría 01', 'Aula Magna, situada en la sala 38, espacio para 157 estudiantes. Cuenta con proyector y un equipo de sobremesa', 'teoria1.jpg', '1', '1'),
(14, 'Aula teoría 02', 'Aula situada en la sala 32, espacio para 40 estudiantes. Cuenta con un proyector y una pizarra táctil. ', 'teoria2.jpg', '1', '1'),
(15, 'Aula teoría 03', 'Aula situada en la sala 30, espacio para grupos reducidos (16-20 personas). Cuenta con un proyector y una mesa de reuniones.', 'teoria3.jpg', '0', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `id_reserva` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_recurso` int(11) NOT NULL,
  `dateini` date NOT NULL,
  `horareserva` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `id_user`, `id_recurso`, `dateini`, `horareserva`) VALUES
(1, 1, 2, '2015-09-21', 15),
(2, 1, 15, '2015-09-24', 19),
(3, 2, 3, '2015-10-01', 9),
(4, 2, 6, '2015-10-06', 10),
(5, 2, 7, '2015-10-11', 11),
(6, 4, 5, '2015-10-13', 12),
(7, 2, 4, '2015-10-13', 13),
(8, 4, 9, '2015-10-14', 14),
(9, 2, 11, '2015-11-05', 15),
(10, 2, 13, '2015-11-06', 22),
(11, 4, 2, '2015-11-06', 20),
(14, 2, 2, '2015-11-18', 10),
(15, 4, 6, '2015-11-18', 16),
(21, 4, 7, '2015-11-04', 8),
(22, 2, 4, '2015-11-25', 8),
(23, 3, 15, '2015-11-27', 9),
(24, 4, 12, '2015-11-27', 10),
(25, 8, 11, '2015-11-18', 11),
(26, 9, 2, '2015-11-27', 12),
(27, 9, 4, '2015-11-27', 13),
(28, 8, 14, '2015-11-27', 14),
(29, 2, 12, '2015-11-27', 15),
(30, 2, 13, '2015-11-18', 16),
(31, 3, 12, '2015-11-27', 17),
(32, 3, 8, '2015-11-27', 18),
(33, 2, 1, '2015-11-27', 19),
(34, 2, 8, '2015-11-27', 20),
(35, 3, 7, '2015-11-27', 21),
(36, 2, 5, '2015-11-27', 22),
(37, 2, 3, '2015-11-12', 22),
(38, 3, 5, '2015-11-19', 14),
(39, 3, 4, '2015-11-19', 8),
(40, 1, 12, '2015-11-19', 9),
(41, 1, 2, '2015-11-19', 15),
(54, 2, 1, '2015-11-19', 8),
(55, 2, 1, '2015-11-19', 9),
(56, 2, 1, '2015-11-27', 8),
(57, 2, 1, '2015-11-29', 22),
(58, 2, 11, '2015-11-27', 8),
(59, 2, 11, '2015-11-27', 9),
(60, 2, 11, '2015-11-27', 10),
(61, 2, 11, '2015-11-27', 11),
(62, 2, 11, '2015-11-27', 12),
(63, 2, 11, '2015-11-27', 13),
(64, 2, 11, '2015-11-27', 14),
(65, 2, 11, '2015-11-27', 15),
(66, 2, 11, '2015-11-27', 16),
(67, 2, 11, '2015-11-27', 17),
(68, 2, 11, '2015-11-27', 18),
(69, 2, 11, '2015-11-27', 19),
(70, 2, 11, '2015-11-27', 20),
(71, 2, 11, '2015-11-27', 21),
(72, 2, 11, '2015-11-27', 22),
(73, 2, 15, '2015-11-25', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `rol` tinyint(4) NOT NULL,
  `img` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Activo` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_user`, `nom`, `pass`, `rol`, `img`, `Activo`) VALUES
(1, 'us_admin', 'admin123', 1, '1.jpg', 1),
(2, 'us_normal_1', 'user123', 0, '1.jpg', 1),
(3, 'us_normal_2', 'user456', 0, '2.jpg', 1),
(4, 'us_normal_3', 'user789', 0, '2.jpg', 1),
(8, 'us_admin_2', 'admin123', 1, '1.jpg', 1),
(9, 'us_normal_4', 'user123', 0, '2.jpg', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `incidencia`
--
ALTER TABLE `incidencia`
  ADD PRIMARY KEY (`id_incidencia`);

--
-- Indices de la tabla `recurso`
--
ALTER TABLE `recurso`
  ADD PRIMARY KEY (`id_recurso`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `incidencia`
--
ALTER TABLE `incidencia`
  MODIFY `id_incidencia` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `recurso`
--
ALTER TABLE `recurso`
  MODIFY `id_recurso` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
