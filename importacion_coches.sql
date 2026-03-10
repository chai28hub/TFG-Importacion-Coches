-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 10-03-2026 a las 17:35:08
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `importacion_coches`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `fecha_cita` date DEFAULT NULL,
  `hora_cita` time DEFAULT NULL,
  `estado` varchar(20) DEFAULT 'Pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `coche_interes` varchar(50) DEFAULT NULL,
  `mensaje` text DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `email`, `telefono`, `coche_interes`, `mensaje`, `fecha_registro`) VALUES
(1, 'chaima', 'chaai1801@gmail.com', '642156197', 'ford mustang 5.0', 'me gustaría saber el precio del coche puesto en España', '2026-02-15 11:40:25'),
(2, 'tito', 'elfakhari54@gmail.com', '642644812', 'ford mustang 5.0 2019', 'quiero saber el precio en españa', '2026-02-15 11:44:36'),
(3, 'marwa', 'marwa22@gmail.com', '678987654', 'ferarri 2023', 'me gustaría tener un presupuesto para comprar este modelo si es posible, gracias', '2026-02-18 16:25:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coches`
--

CREATE TABLE `coches` (
  `id` int(11) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `precio` int(10) NOT NULL,
  `km` int(10) NOT NULL,
  `anyo` int(4) NOT NULL,
  `origen` varchar(20) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `combustible` varchar(20) NOT NULL,
  `transmision` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `coches`
--

INSERT INTO `coches` (`id`, `marca`, `modelo`, `precio`, `km`, `anyo`, `origen`, `imagen`, `combustible`, `transmision`) VALUES
(1, 'Ford', 'Mustang EcoBost', 24000, 45000, 2020, 'dubai', 'mustang1.jpg', 'gasolina', 'automático'),
(2, 'Audi', 'Rsq3', 55000, 85000, 2021, 'alemania', 'audirsq3.jpg', 'gasolina', 'automático'),
(3, 'Dodge', 'Charger 5.7 R-T', 33000, 147000, 2020, 'España', 'dodge.jpg', 'gasolina', 'automático'),
(4, 'Ford ', 'Mustang 5.0', 35000, 15000, 2022, 'dubai', 'mustang5.jpg', 'gasolina', 'automático'),
(5, 'Jeep', 'Wrangler Rubicon', 58000, 53000, 2023, 'dubai', 'jeep.jpg', 'gasolina', 'automático'),
(7, 'Ford', 'Raptor', 45000, 87000, 2019, 'dubai', 'raptor.jpg', 'gasolina', 'automático'),
(8, 'Volkswagen', 'Golf VII', 19500, 55300, 2019, 'España', 'golf.jpg', 'gasolina', 'manual'),
(9, 'Mercedes', 'Benz GLC 43 AMG', 58000, 48400, 2022, 'España', 'mercedes.jpg', 'gasolina', 'automático'),
(10, 'Dodge', 'Charger GT', 30000, 23000, 2023, 'dubai', 'charger.jpg', 'gasolina', 'automático');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `coches`
--
ALTER TABLE `coches`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `coches`
--
ALTER TABLE `coches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
