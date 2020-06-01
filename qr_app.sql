-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 01-06-2020 a las 01:10:14
-- Versión del servidor: 10.1.44-MariaDB-0+deb9u1
-- Versión de PHP: 7.0.33-0+deb9u7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `qr_app`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `app_acceso`
--

CREATE TABLE `app_acceso` (
  `tipo` int(1) NOT NULL DEFAULT '0',
  `id` varchar(13) COLLATE utf8_spanish_ci NOT NULL,
  `id_ciudadela` int(255) NOT NULL DEFAULT '0',
  `contrasena` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `status` varchar(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `app_acceso`
--

INSERT INTO `app_acceso` (`tipo`, `id`, `id_ciudadela`, `contrasena`, `status`) VALUES
(0, '0921899019', 1, '$2y$10$CcrNYI8jYQW3Xd0TLX/p.eT5.H66XgFr0d.ofEs8.qmPh5WYIoyBC', 'A'),
(0, '0921899019', 3, '$2y$10$M5oWRoG7OSGQPlphg4.mZ.ikpK7Mh8A1hUdFXbOfafPZ9UlshgdJi', 'A'),
(0, '1111111111', 2, '$2y$10$vsKj5wSJz8uJUVU78ymcTupaUdDiCVcVu8L.4CGp27tc5TbsLHmHq', 'A'),
(2, '2222222222', 0, '$2y$10$1RevfrH66eSaz68VbNrrDO0tYXhLBSmMDU2ppfJkqfJDqDgcWcX8m', 'A'),
(0, '0910099720', 1, '$2y$10$IRK9mnH1YvZUlGOBYY7ZSO7SlF7gPgD/rH7DsdRfqHP4Qp2f5NEWu', 'A'),
(0, '0922222222', 4, '$2y$10$/tZ30UTkIYyMjQ9HmmALI.9EESQ.XhQIyU9nqB2kCE2B9ZFQafw7.', 'A'),
(2, '1104859127', 0, '$2y$10$2YWqO.bw.D0PUKn3eBCnweE0sZiOAhwMJMNig26dIMWSSqmP01t2e', 'A'),
(0, '0994479733', 1, '$2y$10$hQJ5/TLXSyhHfEVvaFBrceWHMjy417Z6MlpDB6rSOOwiw90Po4IeO', 'A'),
(0, '0910796358', 3, '$2y$10$JdZu9ucE0vNe4LKO8z6wSenuRAQ/7L0VriZtAMeJI6v4WiSuuRtSa', 'A'),
(0, '1104859127', 1, '$2y$10$Ao6S4isJ06uLhKHachimWO7y1zSMZind7Bx9wCm75itptTkbt1Lp.', 'A'),
(0, '0911989762', 3, '$2y$10$cuJM6VEDiwmDDRLnAsVLJevfnesmyduoLjIp48WcEP6zftkcn/FUS', 'A'),
(0, '0928570886', 1, '$2y$10$rVNlJcOOuvzpSp4O5kFtFOj6tLJUWxZvmLBtxe7pLrr7MMcQPWPnW', 'A'),
(0, '0928570886', 1, '$2y$10$GuT.4a3LAnOfUCn0RV84X.gRmrlMMxezF3iuCZYjnHyHU3ya5.WKi', 'A'),
(2, '0910099720', 0, '$2y$10$Vf70vA1PgsrCj6j.rH08vu5GCt0V8GbsT.ggkXNvRpK21qpkAvT0y', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudadelas`
--

CREATE TABLE `ciudadelas` (
  `id` int(255) NOT NULL,
  `ciudadelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciudadelas`
--

INSERT INTO `ciudadelas` (`id`, `ciudadelas`) VALUES
(1, 'Bellavista'),
(2, 'Urdesa'),
(3, 'Samborondon'),
(4, 'Ferroviaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_invitaciones`
--

CREATE TABLE `info_invitaciones` (
  `id_table` int(11) NOT NULL,
  `id_residente` varchar(13) COLLATE utf8_spanish_ci NOT NULL,
  `id_visitante` varchar(13) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_solicitud` datetime NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_hasta` datetime NOT NULL,
  `status` varchar(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'A',
  `id_ciudadela` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `info_invitaciones`
--

INSERT INTO `info_invitaciones` (`id_table`, `id_residente`, `id_visitante`, `nombres`, `apellidos`, `correo`, `fecha_solicitud`, `fecha_inicio`, `fecha_hasta`, `status`, `id_ciudadela`) VALUES
(16, '0921899019', '0921899635', 'Jose', 'Udrovo', 'none', '2020-05-21 21:09:46', '2020-06-10 06:30:24', '2021-06-11 17:30:35', 'A', 1),
(17, '0921899019', '0855532154', 'Richard', 'Vivanco', 'none', '2020-05-21 21:26:35', '2020-06-01 06:00:08', '2020-06-30 17:00:21', 'A', 1),
(18, '0921899019', '0921899019', 'Richard Andrés', 'Vivanco', 'rvivanco@verga.com', '2020-05-21 21:29:03', '2020-08-01 06:00:07', '2020-08-31 17:00:18', 'A', 1),
(19, '0921899019', '9999999999', 'Juan', 'P', 'none', '2020-05-21 22:13:09', '2020-05-22 17:13:01', '2020-05-23 17:13:04', 'A', 1),
(20, '0921899019', '9999999999', 'L', 'L', 'none', '2020-05-21 22:22:48', '2020-05-30 17:22:37', '2020-05-31 17:22:39', 'A', 1),
(21, '0921899019', '0954099089', 'Juan', 'Horacio', 'jhoracio@g.com', '2020-05-22 23:47:04', '2020-06-01 06:00:35', '2020-07-01 17:00:48', 'A', 1),
(22, '0921899019', '0910099720', 'Jai', 'Miranda', 'jmkranda@jjf.com', '2020-05-26 16:12:27', '2020-05-27 00:30:59', '2020-05-30 00:30:05', 'A', 3),
(23, '0921899019', '2222222222', 'Carmen', 'Ontano', 'contano@hotmail.es', '2020-05-26 16:44:09', '2020-06-01 07:30:48', '2020-06-30 18:00:58', 'A', 3),
(24, '0910099720', '2222222222', 'Carmen', 'Ontano', 'none', '2020-05-29 12:13:18', '2020-05-30 17:30:14', '2020-06-05 17:30:24', 'A', 1),
(25, '0922222222', '2222222222', 'Carmen Ontano', 'Ontano', 'none', '2020-05-29 12:27:41', '2020-05-01 07:27:37', '2020-05-31 07:27:41', 'A', 4),
(26, '0921899019', '1104859127', '11111', '111', 'none', '2020-05-30 00:06:22', '2020-05-30 17:05:32', '2020-06-30 19:05:51', 'A', 3),
(27, '0910796358', '0939763941', 'luis', 'salvador', 'none', '2020-05-30 02:01:23', '2020-05-30 21:00:38', '2020-05-31 21:00:43', 'A', 3),
(28, '0921899019', '1104859127', 'tty', 'yyy', 'none', '2020-05-30 19:04:06', '2020-06-09 05:03:45', '2020-06-12 14:03:58', 'A', 3),
(29, '1104859127', '1004859127', 'Juan Jose', 'Macias Granda', 'jpalominp@hotmail.com', '2020-05-30 20:53:47', '2020-05-30 15:53:00', '2020-05-30 15:54:00', 'A', 1),
(30, '1104859127', '0921899631', 'dasdsa', 'asdas', 'none', '2020-05-31 03:13:29', '2020-05-30 20:20:00', '2020-05-31 20:20:00', 'A', 1),
(31, '1104859127', '0928570886', 'Richard Manuel', 'weqwe', 'rvivanco@espol.edu.ec', '2020-05-31 04:02:50', '2020-05-31 20:20:00', '2020-06-11 20:20:00', 'A', 1),
(32, '0921899019', '2222222222', 'Carmen', 'Ontano', 'none', '2020-05-31 18:42:45', '2020-06-01 00:00:21', '2020-06-30 00:00:29', 'A', 3),
(33, '0921899019', '2222222222', 'Carmen', 'Ontano', 'none', '2020-05-31 18:46:19', '2020-06-01 00:00:19', '2020-06-30 00:00:25', 'A', 3),
(34, '0921899019', '2222222222', 'Andrés', 'Ontano', 'test@correo.com', '2020-05-31 18:54:34', '2020-06-30 00:00:00', '2020-06-01 00:00:00', 'A', 3),
(35, '0921899019', '2222222222', 'Andrés', 'Ontano', 'test@correo.com', '2020-05-31 18:55:07', '2020-06-30 00:00:00', '2020-06-01 00:00:00', 'A', 3),
(36, '0921899019', '2222222222', 'Andrés', 'Ontano', 'test@correo.com', '2020-05-31 18:56:25', '2020-06-30 00:00:00', '2020-06-01 00:00:00', 'A', 3),
(37, '0921899019', '2222222222', 'Andrés', 'Ontano', 'test@correo.com', '2020-05-31 18:56:28', '2020-06-30 00:00:00', '2020-06-01 00:00:00', 'A', 3),
(38, '0921899019', '2222222222', 'Andrés', 'Ontano', 'test@correo.com', '2020-05-31 18:57:15', '2020-06-30 00:00:00', '2020-06-01 00:00:00', 'A', 3),
(39, '0921899019', '2222222222', 'Andrés', 'Ontano', 'test@correo.com', '2020-05-31 19:00:57', '2020-06-30 00:00:00', '2020-06-01 00:00:00', 'A', 3),
(40, '0921899019', '2222222222', 'Andrés', 'Ontano', 'test@correo.com', '2020-05-31 19:01:29', '2020-06-30 00:00:00', '2020-06-01 00:00:00', 'A', 3),
(41, '0911989762', '0910099720', 'maruka', 'pistola', 'none', '2020-06-01 00:03:24', '2020-05-29 08:00:06', '2020-06-06 16:00:31', 'A', 3),
(42, '0921899019', '0910099720', 'Maruca', 'Pistola', 'none', '2020-06-01 00:22:39', '2020-06-04 00:00:25', '2020-06-08 00:00:32', 'I', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_invitaciones_norm`
--

CREATE TABLE `info_invitaciones_norm` (
  `Cont` int(11) NOT NULL,
  `id_residente` varchar(13) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(500) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `ingreso` datetime DEFAULT NULL,
  `status` varchar(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'A',
  `id_ciudadela` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `info_invitaciones_norm`
--

INSERT INTO `info_invitaciones_norm` (`Cont`, `id_residente`, `nombres`, `apellidos`, `correo`, `fecha`, `ingreso`, `status`, `id_ciudadela`) VALUES
(14, '0921899019', 'Lino Ontano', 'Viteri', 'none', '2020-05-23 17:41:00', '0000-00-00 00:00:00', 'A', 3),
(15, '0921899019', 'Lino Ontano', 'Viteri', 'none', '2020-05-23 17:41:00', '0000-00-00 00:00:00', 'A', 4),
(16, '0921899019', 'Abby Lastenia', 'Viteri Mite', 'none', '2020-05-23 18:18:55', '0000-00-00 00:00:00', 'A', 1),
(17, '0921899019', 'Jaime', 'Camil', 'jcam@jd.clm', '2020-05-23 18:29:31', '0000-00-00 00:00:00', 'A', 1),
(18, '0921899019', 'Hilda', 'Mora', 'hmora@jf.com', '2020-05-23 18:35:42', '0000-00-00 00:00:00', 'A', 1),
(19, '0921899019', 'Erick', 'Mor', 'emor@emono.knfo', '2020-05-23 19:00:31', '0000-00-00 00:00:00', 'A', 1),
(20, '0921899019', 'Juan', 'Piguave', 'lianontano@outlook.com', '2020-05-24 13:40:06', '0000-00-00 00:00:00', 'A', 3),
(21, '0921899019', 'richard', 'vivanco', 'none', '2020-05-25 15:38:20', '0000-00-00 00:00:00', 'A', 3),
(22, '1104859127', 'richard', 'vivanco', 'none', '2020-05-25 15:57:54', '0000-00-00 00:00:00', 'A', 2),
(23, '0921899019', 'Abby', 'Viteri', 'none', '2020-05-26 11:09:32', '0000-00-00 00:00:00', 'A', 3),
(24, '0921899019', 'Lino Susano Mariano Mengano', 'Ruiz Zapata Vera Paredes Zea Farias Huajufleowpkfhdiskdbdus', 'lian@nf.com', '2020-05-27 01:33:56', '0000-00-00 00:00:00', 'A', 3),
(25, '0921899019', 'Jean', 'Pineda', 'none', '2020-05-27 14:05:25', '0000-00-00 00:00:00', 'A', 3),
(26, '0921899019', 'richard', 'vivanco', 'rwivanco95@hotmail.com', '2020-05-29 19:03:49', '0000-00-00 00:00:00', 'A', 3),
(27, '0928570861', 'jose', 'palomino', 'none', '2020-05-29 19:45:21', '0000-00-00 00:00:00', 'A', 2),
(28, '0928570861', 'Xavier', 'Manrique', 'none', '2020-05-29 19:46:01', '0000-00-00 00:00:00', 'A', 2),
(29, '0910796358', 'jose luis', 'Salvador', 'joseluisalvadorm@gmail.com', '2020-05-29 20:53:55', '0000-00-00 00:00:00', 'A', 3),
(30, '0910796358', 'jose l', 'salvador', 'joseluisalvadorm@gmail.com', '2020-05-29 20:55:50', '0000-00-00 00:00:00', 'A', 3),
(31, '0921899019', 'rixhard', 'fjjfjdj', 'none', '2020-05-30 14:01:24', NULL, 'A', 3),
(32, '1104859127', 'Richard', 'Palomino', 'rvivanco@espol.edu.ec', '2020-05-30 20:52:59', NULL, 'A', 1),
(33, '1104859127', 'Anddy', 'Macias', 'rvivanco@espol.edu.ec', '2020-05-30 21:09:20', NULL, 'A', 1),
(34, '0921899019', 'Lino', 'Gangalee', 'none', '2020-05-30 21:12:56', NULL, 'A', 3),
(35, '1104859127', 'Richard Manuel', 'dsada', 'none', '2020-05-31 03:59:59', NULL, 'A', 1),
(36, '1104859127', 'Richard Manuel', 'dsada', 'none', '2020-05-31 04:02:01', NULL, 'A', 1),
(37, '0911989762', 'andrea', 'ontano', 'none', '2020-05-31 19:06:22', NULL, 'A', 3),
(38, '0928570861', 'jojaira', 'villon', 'none', '2020-05-31 19:10:35', NULL, 'A', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_residentes`
--

CREATE TABLE `info_residentes` (
  `id_table` int(11) NOT NULL,
  `id` varchar(13) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `genero` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(9) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `status` varchar(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'P',
  `invitacion` varchar(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'N',
  `contrasena` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `id_ciudadela` int(20) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `fecha_aprobacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `info_residentes`
--

INSERT INTO `info_residentes` (`id_table`, `id`, `nombres`, `apellidos`, `genero`, `correo`, `telefono`, `fecha_nacimiento`, `status`, `invitacion`, `contrasena`, `id_ciudadela`, `fecha_registro`, `fecha_aprobacion`) VALUES
(1, '0910099720', 'Jailene Paulina1', 'Miranda Castañeda', 'F', 'mirandajp@gmail.com', 959554258, '1998-01-30', 'A', 'S', '$2y$10$IRK9mnH1YvZUlGOBYY7ZSO7SlF7gPgD/rH7DsdRfqHP4Qp2f5NEWu', 1, '2020-04-02 20:01:34', NULL),
(2, '0910796358', 'xavier ', 'Manrique ', 'M', 'xman@manriqueseguridad.com', 994765866, '1967-05-03', 'P', 'N', '$2y$10$n6VBfUMr5wDVOb98UdCIienoEJL1c/Ddw68OYc4OsK21ppbJdYcTe', 3, '2020-05-15 23:55:32', NULL),
(3, '0921885643', 'Juan', 'Calle', 'F', 'j@.com', 958942006, '2020-05-21', 'P', 'N', '$2y$10$bDmeAtheZQuna3U.okVPM.c8JaWTKQEdUdsqsfce0jAItYWoV.BS.', 4, '2020-05-21 22:20:20', NULL),
(4, '0921899012', 'Diego', 'Salinas', 'M', 'finster18@gmail.com', 958942006, '1988-04-18', 'P', 'N', '$2y$10$Z8ACaCCAN0gGZF2w2wSxpeUTeT2ospris6YINFP7iL.a3QcKYv75O', 1, '2020-04-02 20:07:28', NULL),
(5, '0921899019', 'Lino Andrés', 'Ontano Viteri', 'M', 'lianontano@outlook.com', 959554258, '1995-04-13', 'A', 'N', '$2y$10$CcrNYI8jYQW3Xd0TLX/p.eT5.H66XgFr0d.ofEs8.qmPh5WYIoyBC', 1, '2020-05-20 14:19:00', '2020-05-26 23:02:44'),
(6, '0928570861', 'Anddy', 'Macias', 'M', 'servicio@manriqueseguridad.com', 42029290, '1994-08-14', 'P', 'N', '$2y$10$z78.RcR/DV9A1UHzCEkGs.1AIfbpE6o2HMfyRMAcVU8cAidwGQUmG', 2, '2020-05-15 22:17:46', NULL),
(7, '0963515788', 'kerwin', 'marquez', 'M', 'kerwin.marquez24@gmail.com', 960984061, '1988-09-24', 'P', 'N', '$2y$10$9W/d5vf66GjPirmtnQQT6.YJPpyGv5El7ksooWmYvO9gXTk2/sEzO', 3, '2020-05-15 23:36:27', NULL),
(10, '0921899019', 'Lino', 'Ontano', 'M', 'ali@jf.com', 958942006, '1995-04-13', 'A', 'S', '$2y$10$M5oWRoG7OSGQPlphg4.mZ.ikpK7Mh8A1hUdFXbOfafPZ9UlshgdJi', 3, '2020-05-24 00:54:26', '2020-05-26 23:02:44'),
(16, '1111111111', 'Abby', 'Viteri', 'F', 'abbyviteri@yahoo.com', 95566438, '1970-12-03', 'A', 'N', '$2y$10$vsKj5wSJz8uJUVU78ymcTupaUdDiCVcVu8L.4CGp27tc5TbsLHmHq', 2, '2020-05-26 16:14:44', '2020-05-26 23:00:50'),
(18, '0922222222', 'Andrea', 'Hidalgo Martinez', 'F', 'ahidalgo@hotamil.com', 955555555, '1980-05-29', 'A', 'S', '$2y$10$/tZ30UTkIYyMjQ9HmmALI.9EESQ.XhQIyU9nqB2kCE2B9ZFQafw7.', 4, '2020-05-29 12:25:40', NULL),
(19, '1104859127', 'rssz', 'ssssz', 'M', '1104859127', 989679545, '2020-05-29', 'P', 'N', '$2y$10$Slv.YQuPWFD/kGYIcnNXMODS/fp9IRt0CRX1sQbNSL/vdapGRy3dK', 3, '2020-05-29 23:58:16', NULL),
(21, '0994479733', 'Anddy', 'Maciaa', 'M', 'servicio@manriqueseguridad.com', 42029290, '1994-08-14', 'A', 'N', '$2y$10$hQJ5/TLXSyhHfEVvaFBrceWHMjy417Z6MlpDB6rSOOwiw90Po4IeO', 1, '2020-05-30 00:31:47', NULL),
(22, '0910796358', 'xavier ', 'manrique', 'M', 'xman@manriqueseguridad.com', 994765866, '1967-06-03', 'A', 'S', '$2y$10$JdZu9ucE0vNe4LKO8z6wSenuRAQ/7L0VriZtAMeJI6v4WiSuuRtSa', 3, '2020-05-30 01:45:04', NULL),
(23, '1111111114', 'jsjdjd', 'hdjdud', 'M', 'rwivanco@hdhdh.com', 8448875, '2020-05-30', 'P', 'N', '$2y$10$C0M7iQpQsvsfFiCim8iZH.jtGP3GZ9v3LJ.U1Qb56SxLZBBmTWduG', 1, '2020-05-30 19:13:13', NULL),
(24, '1104859127', 'Richard Manuel', 'Vivanco Granda', 'M', 'rvivanco@espol.edu.ec', 989679545, '2020-04-09', 'A', 'S', '$2y$10$Ao6S4isJ06uLhKHachimWO7y1zSMZind7Bx9wCm75itptTkbt1Lp.', 1, '2020-05-30 20:50:06', NULL),
(37, '0911989762', 'catalina', 'no me acuerdo', 'F', 'abby@gmail.com', 2147483647, '1990-01-30', 'A', 'S', '$2y$10$cuJM6VEDiwmDDRLnAsVLJevfnesmyduoLjIp48WcEP6zftkcn/FUS', 3, '2020-05-31 23:47:37', NULL),
(38, '0928570886', 'Anddy', 'Macias', 'M', 'anddyloberty@gmail.com', 42029290, '1994-08-14', 'A', 'S', '$2y$10$GuT.4a3LAnOfUCn0RV84X.gRmrlMMxezF3iuCZYjnHyHU3ya5.WKi', 1, '2020-06-01 00:06:49', NULL);

--
-- Disparadores `info_residentes`
--
DELIMITER $$
CREATE TRIGGER `insertAcceso` AFTER UPDATE ON `info_residentes` FOR EACH ROW BEGIN
IF (NEW.status='A' AND OLD.status='P') THEN
	INSERT INTO app_acceso values(0,NEW.id,NEW.id_ciudadela,NEW.contrasena,NEW.status);
END IF;
IF (NEW.status='I' AND OLD.status='A') THEN
	DELETE FROM `app_acceso` where id = NEW.id and tipo = 0 and id_ciudadela= NEW.id_ciudadela; 
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_visitantes`
--

CREATE TABLE `info_visitantes` (
  `id` varchar(13) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `info_visitantes`
--

INSERT INTO `info_visitantes` (`id`, `nombres`, `apellidos`, `contrasena`, `status`) VALUES
('0910099720', 'maruka ', 'pistola', '$2y$10$Vf70vA1PgsrCj6j.rH08vu5GCt0V8GbsT.ggkXNvRpK21qpkAvT0y', 'A'),
('1104859122', 'hotmail003', '1104859127', '$2y$10$1ETvp0aq71dzlSi.QgFRwuhqtMiVYDsFc/zUOEUAzJB6s3m1GsC9q', 'A'),
('1104859127', 'Richard', 'Vivanco', '$2y$10$2YWqO.bw.D0PUKn3eBCnweE0sZiOAhwMJMNig26dIMWSSqmP01t2e', 'A'),
('2222222222', 'Carmen', 'Ontano', '$2y$10$1RevfrH66eSaz68VbNrrDO0tYXhLBSmMDU2ppfJkqfJDqDgcWcX8m', 'A');

--
-- Disparadores `info_visitantes`
--
DELIMITER $$
CREATE TRIGGER `insertAccesoVisita` AFTER INSERT ON `info_visitantes` FOR EACH ROW INSERT INTO app_acceso values(2,NEW.id,0,NEW.contrasena,NEW.status)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso`
--

CREATE TABLE `ingreso` (
  `id` int(10) NOT NULL,
  `cedula` varchar(13) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `telefono` int(9) NOT NULL,
  `fecha` datetime NOT NULL,
  `ciudadela` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ingreso`
--

INSERT INTO `ingreso` (`id`, `cedula`, `nombres`, `apellidos`, `telefono`, `fecha`, `ciudadela`) VALUES
(160, '1104859127', 'Richard', 'Vivanco', 989679545, '2020-05-25 15:17:00', 1),
(161, '1104859127', 'Richard', 'Vivanco', 989679545, '2020-05-25 15:17:08', 1),
(162, '1104859127', 'Richard', 'Vivanco', 989679545, '2020-05-25 15:17:19', 1),
(163, '1104859127', 'Richard', 'Vivanco', 989679545, '2020-05-25 15:17:34', 1),
(164, '1104859127', 'Richard', 'Vivanco', 989679545, '2020-05-25 15:18:31', 1),
(165, '1104859127', 'Richard', 'Vivanco', 989679545, '2020-05-25 15:18:33', 1),
(166, '1104859127', 'Richard', 'Vivanco', 989679545, '2020-05-25 15:22:11', 1),
(167, '1104859127', 'Richard', 'Vivanco', 989679545, '2020-05-25 15:22:19', 1),
(168, '1104859127', 'Richard', 'Vivanco', 989679545, '2020-05-25 15:32:51', 1),
(169, '1104859127', 'Richard', 'Vivanco', 989679545, '2020-05-25 16:01:24', 1),
(170, '1104859127', 'Richard', 'Vivanco', 989679545, '2020-05-25 16:02:44', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_recurrente`
--

CREATE TABLE `ingreso_recurrente` (
  `id` int(11) NOT NULL,
  `id_residente` varchar(13) NOT NULL,
  `id_visitante` varchar(13) NOT NULL,
  `nombres` varchar(200) NOT NULL,
  `apellidos` varchar(200) NOT NULL,
  `fecha` datetime NOT NULL,
  `ciudadela` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ingreso_recurrente`
--

INSERT INTO `ingreso_recurrente` (`id`, `id_residente`, `id_visitante`, `nombres`, `apellidos`, `fecha`, `ciudadela`) VALUES
(1, '1104859127', '1102254544', 'Richard', 'Torres', '2020-05-14 09:26:20', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `email`, `contrasena`) VALUES
(1, 'Rimavig', 'rwivanco95@hotmail.com', 'hotmail003');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudadelas`
--
ALTER TABLE `ciudadelas`
  ADD PRIMARY KEY (`id`,`ciudadelas`) USING BTREE;

--
-- Indices de la tabla `info_invitaciones`
--
ALTER TABLE `info_invitaciones`
  ADD PRIMARY KEY (`id_table`),
  ADD KEY `id_ciudadela` (`id_ciudadela`),
  ADD KEY `id_residente` (`id_residente`);

--
-- Indices de la tabla `info_invitaciones_norm`
--
ALTER TABLE `info_invitaciones_norm`
  ADD PRIMARY KEY (`Cont`);

--
-- Indices de la tabla `info_residentes`
--
ALTER TABLE `info_residentes`
  ADD PRIMARY KEY (`id_table`);

--
-- Indices de la tabla `info_visitantes`
--
ALTER TABLE `info_visitantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ingreso_recurrente`
--
ALTER TABLE `ingreso_recurrente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudadelas`
--
ALTER TABLE `ciudadelas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `info_invitaciones`
--
ALTER TABLE `info_invitaciones`
  MODIFY `id_table` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT de la tabla `info_invitaciones_norm`
--
ALTER TABLE `info_invitaciones_norm`
  MODIFY `Cont` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT de la tabla `info_residentes`
--
ALTER TABLE `info_residentes`
  MODIFY `id_table` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;
--
-- AUTO_INCREMENT de la tabla `ingreso_recurrente`
--
ALTER TABLE `ingreso_recurrente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `info_invitaciones`
--
ALTER TABLE `info_invitaciones`
  ADD CONSTRAINT `info_invitaciones_ibfk_1` FOREIGN KEY (`id_ciudadela`) REFERENCES `ciudadelas` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
