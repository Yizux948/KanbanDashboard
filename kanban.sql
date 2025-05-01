-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-09-2023 a las 00:13:57
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `kanban`
--
CREATE DATABASE IF NOT EXISTS `kanban` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `kanban`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observaciones`
--

CREATE TABLE `observaciones` (
  `id_obs` int(11) NOT NULL,
  `f_h` datetime NOT NULL,
  `dsc` text NOT NULL,
  `persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `ced` int(11) NOT NULL,
  `nom` text NOT NULL,
  `ape` text NOT NULL,
  `tlf` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_espera`
--

CREATE TABLE `t_espera` (
  `id_tarea` int(11) NOT NULL,
  `motivo` text NOT NULL,
  `f_h_e` datetime NOT NULL,
  `persona_esp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_finz`
--

CREATE TABLE `t_finz` (
  `id_finz` int(11) NOT NULL,
  `f_h_f` datetime NOT NULL,
  `persona_fin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_finz`
--

INSERT INTO `t_finz` (`id_finz`, `f_h_f`, `persona_fin`) VALUES
(19, '2023-09-24 23:59:31', 'Yo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_prioritarias`
--

CREATE TABLE `t_prioritarias` (
  `id_priori` int(11) NOT NULL,
  `f_h` datetime NOT NULL,
  `modl` text NOT NULL,
  `tiempo` int(2) NOT NULL,
  `tit` text NOT NULL,
  `dsc` text NOT NULL,
  `status` int(1) NOT NULL,
  `persona` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_prioritarias`
--

INSERT INTO `t_prioritarias` (`id_priori`, `f_h`, `modl`, `tiempo`, `tit`, `dsc`, `status`, `persona`) VALUES
(19, '2023-09-24 23:53:46', 'días', 2, 'titulo', '111', 3, 'Yo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_pro`
--

CREATE TABLE `t_pro` (
  `id_pro` int(11) NOT NULL,
  `f_h_p` datetime NOT NULL,
  `persona_pro` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_pro`
--

INSERT INTO `t_pro` (`id_pro`, `f_h_p`, `persona_pro`) VALUES
(19, '2023-09-24 23:56:29', 'Yo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD PRIMARY KEY (`id_obs`),
  ADD KEY `id_obs` (`id_obs`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`ced`);

--
-- Indices de la tabla `t_espera`
--
ALTER TABLE `t_espera`
  ADD PRIMARY KEY (`id_tarea`),
  ADD KEY `id_tarea` (`id_tarea`);

--
-- Indices de la tabla `t_finz`
--
ALTER TABLE `t_finz`
  ADD PRIMARY KEY (`id_finz`),
  ADD KEY `id_finz` (`id_finz`);

--
-- Indices de la tabla `t_prioritarias`
--
ALTER TABLE `t_prioritarias`
  ADD PRIMARY KEY (`id_priori`),
  ADD KEY `persona` (`persona`(768));

--
-- Indices de la tabla `t_pro`
--
ALTER TABLE `t_pro`
  ADD PRIMARY KEY (`id_pro`),
  ADD KEY `id_pro` (`id_pro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_prioritarias`
--
ALTER TABLE `t_prioritarias`
  MODIFY `id_priori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD CONSTRAINT `observaciones_ibfk_1` FOREIGN KEY (`id_obs`) REFERENCES `t_prioritarias` (`id_priori`) ON DELETE CASCADE;

--
-- Filtros para la tabla `t_espera`
--
ALTER TABLE `t_espera`
  ADD CONSTRAINT `t_espera_ibfk_1` FOREIGN KEY (`id_tarea`) REFERENCES `t_prioritarias` (`id_priori`) ON DELETE CASCADE;

--
-- Filtros para la tabla `t_finz`
--
ALTER TABLE `t_finz`
  ADD CONSTRAINT `t_finz_ibfk_1` FOREIGN KEY (`id_finz`) REFERENCES `t_prioritarias` (`id_priori`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
