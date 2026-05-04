-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 04-05-2026 a las 06:31:51
-- Versión del servidor: 9.6.0
-- Versión de PHP: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ministeam`
--
CREATE DATABASE IF NOT EXISTS `ministeam` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `ministeam`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `biblioteca`
--

DROP TABLE IF EXISTS `biblioteca`;
CREATE TABLE `biblioteca` (
  `id` int NOT NULL,
  `usuario_id` int NOT NULL,
  `juego_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `biblioteca`
--

INSERT INTO `biblioteca` (`id`, `usuario_id`, `juego_id`) VALUES
(5, 4, 7),
(6, 4, 8),
(7, 4, 9),
(8, 4, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

DROP TABLE IF EXISTS `juegos`;
CREATE TABLE `juegos` (
  `id` int NOT NULL,
  `titulo` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `precio` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`id`, `titulo`, `descripcion`, `precio`) VALUES
(7, 'God of War', 'Kratos vive una vida pacífica junto a su hijo Atreus en las tierras nórdicas hasta la muerte de su esposa.', 80.00),
(8, 'The Last of Us', 'En un mundo hostil y pospandémico, Joel y Ellie, unidos por circunstancias desesperadas, deben confiar el uno en el otro para sobrevivir a un viaje brutal a través de lo que queda de Estados Unidos.', 75.00),
(9, 'The Legend of Zelda: Breath of the Wild', 'After a century of hibernation, Link reawakens to once again save a ruined Hyrule from a great evil.', 30.00),
(10, 'Sekiro: Shadows Die Twice', 'Set in a reimagining of 1500s Sengoku era Japan. An unnamed shinobi, tasked with protecting a young lord of mystical lineage, who is left for dead when a powerful samurai attacks and chops off his arm.', 60.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol` enum('cliente','admin') COLLATE utf8mb4_unicode_ci DEFAULT 'cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`, `rol`) VALUES
(1, 'admin@ministeam.com', '$2y$10$kgIjVJCuyWOJ9NAEd6jQVO29QWdTINeC9fIyt4LRcIOlpXy5rihkW', 'admin'),
(3, 'usuario@ministeam.com', '$2y$10$t.BEfhZ.p3gctDMtIRGm0O7MM6VFZpQKFDCQYMPCiadgDIYcwQkhS', 'cliente'),
(4, 'mriveraroig@gmail.com', '$2y$10$DC3B04Nb4yepJ.LRxIYBze8H1MwSYmIk5zhnG6qO6UDDGbhr/S9Pu', 'cliente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `biblioteca`
--
ALTER TABLE `biblioteca`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario_id` (`usuario_id`,`juego_id`),
  ADD KEY `juego_id` (`juego_id`);

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `biblioteca`
--
ALTER TABLE `biblioteca`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `biblioteca`
--
ALTER TABLE `biblioteca`
  ADD CONSTRAINT `biblioteca_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `biblioteca_ibfk_2` FOREIGN KEY (`juego_id`) REFERENCES `juegos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
