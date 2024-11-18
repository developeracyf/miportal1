-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-11-2024 a las 16:29:35
-- Versión del servidor: 10.11.9-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u101296607_sha`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `contraseña` varchar(200) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `link` varchar(500) NOT NULL,
  `impuesto` varchar(500) NOT NULL,
  `operatividad` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `contraseña`, `id_cargo`, `link`, `impuesto`, `operatividad`) VALUES
(2, 'gab', 'gab', 'gab', 1, '', '', ''),
(83, 'PORTAFOLIO VERDE', '900036866', '900036866', 6, 'https://app.powerbi.com/view?r=eyJrIjoiODFiMTY5MWYtYTFlNC00MjlkLTk4OTMtNWZhMzA2Y2U4MDdkIiwidCI6IjU1YWVkZjI2LWVhNGQtNGY2Zi04ZTZiLTI3OGNhNjg5MWE5MiIsImMiOjl9&pageName=ReportSection003ca6e5ba29db76b2ed', '', 'https://app.powerbi.com/view?r=eyJrIjoiOTJkZjM3NWItMzIxNi00MTE2LTk5YTItYzkzNTYyYjdjMDU0IiwidCI6IjU1YWVkZjI2LWVhNGQtNGY2Zi04ZTZiLTI3OGNhNjg5MWE5MiIsImMiOjl9'),
(84, 'CORPO FV', '900218918', '900218918', 2, 'https://app.powerbi.com/view?r=eyJrIjoiOGQxNmI4MzQtNTdhOC00MWVlLWJjZjgtNzNjODUzNjdmMDhiIiwidCI6IjU1YWVkZjI2LWVhNGQtNGY2Zi04ZTZiLTI3OGNhNjg5MWE5MiIsImMiOjl9&pageName=ReportSection003ca6e5ba29db76b2ed', '', ''),
(85, 'GEODIC', '900367242', '900367242', 2, 'https://app.powerbi.com/view?r=eyJrIjoiOTU0NTY0YzMtOTUxMi00OTE0LWJlMTctZDZjZjNiYjkyMmUxIiwidCI6IjU1YWVkZjI2LWVhNGQtNGY2Zi04ZTZiLTI3OGNhNjg5MWE5MiIsImMiOjl9&pageName=ReportSection003ca6e5ba29db76b2ed', '', ''),
(123, 'CONEQUIPOS', '800039236', '800039236', 2, 'https://app.powerbi.com/view?r=eyJrIjoiMzZjMGUwODUtMTZmNC00ZmU2LTk2MmMtZTk5ODljNTI3Yjk3IiwidCI6IjU1YWVkZjI2LWVhNGQtNGY2Zi04ZTZiLTI3OGNhNjg5MWE5MiIsImMiOjl9&pageName=ReportSection003ca6e5ba29db76b2ed', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
