-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2021 a las 13:46:34
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_proyectos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acciones`
--

CREATE TABLE `acciones` (
  `acc_id` int(11) NOT NULL,
  `acc_nombre` varchar(50) NOT NULL,
  `acc_fr_inicio` date NOT NULL,
  `acc_fr_fin` date NOT NULL,
  `acc_ft_inicio` date NOT NULL,
  `acc_ft_fin` date NOT NULL,
  `acc_usu_id` int(11) NOT NULL,
  `acc_duracion` int(11) NOT NULL,
  `acc_sit_id` int(11) NOT NULL,
  `acc_proy_id` int(11) NOT NULL,
  `acc_obs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `acciones`
--

INSERT INTO `acciones` (`acc_id`, `acc_nombre`, `acc_fr_inicio`, `acc_fr_fin`, `acc_ft_inicio`, `acc_ft_fin`, `acc_usu_id`, `acc_duracion`, `acc_sit_id`, `acc_proy_id`, `acc_obs`) VALUES
(1, 'Compras de equipos', '2021-10-15', '2021-10-20', '2021-10-10', '2021-10-15', 3, 3, 1, 1, ''),
(2, 'Contratación de personal', '2021-10-10', '2021-10-31', '2021-10-10', '2021-10-15', 4, 5, 2, 1, 'Seleccionando personal'),
(3, 'Instalación', '0000-00-00', '0000-00-00', '2021-10-15', '2021-10-20', 5, 5, 1, 1, ''),
(4, 'Diseño de la BBDD', '2021-10-19', '2021-10-19', '2021-10-19', '2021-10-19', 15, 1, 4, 2, ''),
(5, 'Acuerdo de criterios', '2021-10-20', '2021-10-20', '2021-10-20', '2021-10-20', 13, 1, 4, 2, ''),
(6, 'Desarrollo de programas', '2021-10-20', '0000-00-00', '2021-10-20', '2021-10-24', 9, 5, 2, 2, ''),
(7, 'Pruebas', '2021-10-24', '2021-10-25', '2021-10-24', '2021-10-25', 15, 2, 1, 2, ''),
(8, 'Implantación', '2021-10-25', '2021-10-25', '2021-10-25', '2021-10-25', 15, 1, 1, 2, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `cat_id` int(11) NOT NULL,
  `cat_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`cat_id`, `cat_nombre`) VALUES
(1, 'Responsable de proyecto'),
(2, 'Responsable de acción'),
(3, 'Responsable de tarea'),
(4, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `proy_id` int(11) NOT NULL,
  `proy_nombre` varchar(50) NOT NULL,
  `proy_fr_inicio` date NOT NULL,
  `proy_fr_fin` date NOT NULL,
  `proy_ft_inicio` date NOT NULL,
  `proy_ft_fin` date NOT NULL,
  `proy_usu_id` int(11) NOT NULL,
  `proy_duracion` int(11) NOT NULL,
  `proy_sit_id` int(11) NOT NULL,
  `proy_obs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`proy_id`, `proy_nombre`, `proy_fr_inicio`, `proy_fr_fin`, `proy_ft_inicio`, `proy_ft_fin`, `proy_usu_id`, `proy_duracion`, `proy_sit_id`, `proy_obs`) VALUES
(1, 'Montaje de red', '0000-00-00', '0000-00-00', '2021-10-15', '2021-10-31', 1, 15, 1, 'No se han comprado los equipos'),
(2, 'Gestor de proyectos', '2021-10-19', '0000-00-00', '2021-10-19', '2021-10-24', 15, 5, 2, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `situaciones`
--

CREATE TABLE `situaciones` (
  `sit_id` int(11) NOT NULL,
  `sit_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `situaciones`
--

INSERT INTO `situaciones` (`sit_id`, `sit_nombre`) VALUES
(1, 'Sin iniciar'),
(2, 'Activo'),
(3, 'Parado'),
(4, 'Finalizado'),
(5, 'Descartado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `tar_id` int(11) NOT NULL,
  `tar_nombre` varchar(50) NOT NULL,
  `tar_fr_inicio` date NOT NULL,
  `tar_fr_fin` date NOT NULL,
  `tar_ft_inicio` date NOT NULL,
  `tar_ft_fin` date NOT NULL,
  `tar_usu_id` int(11) NOT NULL,
  `tar_duracion` int(11) NOT NULL,
  `tar_sit_id` int(11) NOT NULL,
  `tar_acc_id` int(11) NOT NULL,
  `tar_obs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`tar_id`, `tar_nombre`, `tar_fr_inicio`, `tar_fr_fin`, `tar_ft_inicio`, `tar_ft_fin`, `tar_usu_id`, `tar_duracion`, `tar_sit_id`, `tar_acc_id`, `tar_obs`) VALUES
(1, 'PC', '0000-00-00', '0000-00-00', '2021-10-17', '2021-10-18', 5, 2, 2, 1, ''),
(2, 'Switches', '2021-10-20', '2021-10-21', '2021-10-17', '2021-10-23', 5, 3, 2, 1, 'Ya comprado'),
(3, 'Servidor', '2021-10-20', '2021-10-21', '2021-10-17', '2021-10-23', 6, 2, 2, 1, ''),
(4, 'Cables', '0000-00-00', '0000-00-00', '2021-10-17', '2021-10-23', 6, 5, 2, 1, ''),
(5, 'SSOO', '2021-10-20', '2021-10-23', '2021-10-17', '2021-10-23', 5, 5, 2, 1, ''),
(6, 'Contratación', '2021-10-17', '2021-10-23', '2021-10-17', '2021-10-23', 5, 5, 2, 2, ''),
(7, 'Formación', '2021-10-24', '2021-10-30', '2021-10-24', '2021-10-30', 6, 5, 1, 2, ''),
(8, 'Instalación de red', '0000-00-00', '0000-00-00', '2021-10-24', '2021-10-30', 6, 5, 1, 3, ''),
(9, 'Instalación de SSOO', '0000-00-00', '0000-00-00', '2021-10-24', '2021-10-30', 6, 3, 1, 3, ''),
(10, 'DIseño BBDD', '2021-10-19', '2021-10-19', '2021-10-19', '2021-10-19', 15, 1, 4, 4, ''),
(11, 'Acuerdo de criterios', '2021-10-20', '2021-10-20', '2021-10-20', '2021-10-20', 15, 1, 4, 5, ''),
(12, 'Proyectos', '2021-10-20', '0000-00-00', '2021-10-20', '2021-10-24', 9, 5, 2, 6, ''),
(13, 'Front + Usuarios', '2021-10-20', '2021-10-24', '2021-10-20', '2021-10-24', 10, 5, 2, 6, ''),
(14, 'Categorías', '2021-10-20', '2021-10-24', '2021-10-20', '2021-10-24', 11, 5, 2, 6, ''),
(15, 'Situaciones', '2021-10-20', '2021-10-24', '2021-10-20', '2021-10-24', 14, 5, 2, 6, ''),
(16, 'Acciones', '2021-10-20', '2021-10-24', '2021-10-20', '2021-10-24', 12, 5, 2, 6, ''),
(17, 'Tareas', '2021-10-20', '2021-10-24', '2021-10-20', '2021-10-24', 13, 5, 2, 6, ''),
(18, 'Controladores', '2021-10-20', '2021-10-20', '2021-10-20', '2021-10-20', 13, 1, 4, 6, ''),
(19, 'Pruebas', '2021-10-24', '2021-10-24', '2021-10-24', '2021-10-24', 15, 1, 1, 7, ''),
(20, 'Implantación', '2021-10-25', '2021-10-25', '2021-10-25', '2021-10-25', 15, 1, 1, 8, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usu_id` int(11) NOT NULL,
  `usu_nombre` varchar(50) NOT NULL,
  `usu_password` varchar(50) NOT NULL,
  `usu_cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usu_id`, `usu_nombre`, `usu_password`, `usu_cat_id`) VALUES
(1, 'Jefe de proyecto 1', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(2, 'Jefe de proyecto 2', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(3, 'Responsable de acción 1', '81dc9bdb52d04dc20036dbd8313ed055', 2),
(4, 'Responsable de acción 2', '81dc9bdb52d04dc20036dbd8313ed055', 2),
(5, 'Responsable de tarea 1', '81dc9bdb52d04dc20036dbd8313ed055', 3),
(6, 'Responsable de tarea 2', '81dc9bdb52d04dc20036dbd8313ed055', 3),
(7, 'Usuario 1', '81dc9bdb52d04dc20036dbd8313ed055', 4),
(8, 'Usuario 2', '81dc9bdb52d04dc20036dbd8313ed055', 4),
(9, 'José Luis', '1234', 1),
(10, 'Alvaro', '1234', 1),
(11, 'Alberto', '1234', 1),
(12, 'Adrián', '1234', 1),
(13, 'Jorge', '1234', 1),
(14, 'José Ignacio', '1234', 1),
(15, 'Javier', '1234', 1),
(16, 'Oswaldo', '1234', 1),
(17, 'Angel', '1234', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acciones`
--
ALTER TABLE `acciones`
  ADD PRIMARY KEY (`acc_id`),
  ADD KEY `r_acc_usu` (`acc_usu_id`),
  ADD KEY `r_acc_proy` (`acc_proy_id`),
  ADD KEY `r_acc_sit` (`acc_sit_id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`proy_id`),
  ADD KEY `r_proy_usu` (`proy_usu_id`),
  ADD KEY `r_proy_sit` (`proy_sit_id`);

--
-- Indices de la tabla `situaciones`
--
ALTER TABLE `situaciones`
  ADD PRIMARY KEY (`sit_id`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`tar_id`),
  ADD KEY `r_tar_usu` (`tar_usu_id`),
  ADD KEY `r_tar_acc` (`tar_acc_id`),
  ADD KEY `r_tar_sit` (`tar_sit_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usu_id`),
  ADD KEY `r_usu_cat` (`usu_cat_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acciones`
--
ALTER TABLE `acciones`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `proy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `situaciones`
--
ALTER TABLE `situaciones`
  MODIFY `sit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `tar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acciones`
--
ALTER TABLE `acciones`
  ADD CONSTRAINT `r_acc_proy` FOREIGN KEY (`acc_proy_id`) REFERENCES `proyectos` (`proy_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `r_acc_sit` FOREIGN KEY (`acc_sit_id`) REFERENCES `situaciones` (`sit_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `r_acc_usu` FOREIGN KEY (`acc_usu_id`) REFERENCES `usuarios` (`usu_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD CONSTRAINT `r_proy_sit` FOREIGN KEY (`proy_sit_id`) REFERENCES `situaciones` (`sit_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `r_proy_usu` FOREIGN KEY (`proy_usu_id`) REFERENCES `usuarios` (`usu_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD CONSTRAINT `r_tar_acc` FOREIGN KEY (`tar_acc_id`) REFERENCES `acciones` (`acc_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `r_tar_sit` FOREIGN KEY (`tar_sit_id`) REFERENCES `situaciones` (`sit_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `r_tar_usu` FOREIGN KEY (`tar_usu_id`) REFERENCES `usuarios` (`usu_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `r_usu_cat` FOREIGN KEY (`usu_cat_id`) REFERENCES `categorias` (`cat_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
