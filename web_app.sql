-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2022 a las 04:32:36
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `web_app`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `name` text NOT NULL,
  `hours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `subjects`
--

INSERT INTO `subjects` (`id`, `teacher_id`, `name`, `hours`) VALUES
(4, NULL, 'Fisica', 1),
(5, 24, 'Algoritmia', 2),
(7, 30, 'Matemática', 5),
(8, 24, 'Historia', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `document` varchar(12) NOT NULL,
  `name` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `profession` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `teachers`
--

INSERT INTO `teachers` (`id`, `document`, `name`, `lastname`, `birthdate`, `profession`) VALUES
(24, '6202745', 'Arnaldo', 'Borda', '2001-10-12', 'Ingeniero'),
(30, '5532876', 'Abel', 'Amariilla', '2003-04-05', 'Matemático '),
(31, '123456', 'Juan', 'Perez', '1990-01-01', 'Físico'),
(32, '5681111', 'Rodrigo', 'Lopez', '2001-03-28', 'Churro'),
(33, '1234569', 'juan', 'perez', '2022-02-02', 'Programador'),
(34, '1245678', 'Carlos', 'Barboza', '2022-12-28', 'Estudiante');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_subject` (`teacher_id`);

--
-- Indices de la tabla `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `teacher_subject` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;
