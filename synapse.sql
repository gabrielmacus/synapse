-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2017 a las 20:07:23
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `synapse`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repository`
--

CREATE TABLE `repository` (
  `id` int(11) UNSIGNED NOT NULL,
  `created_at` int(11) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `updated_at` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `repository`
--

INSERT INTO `repository` (`id`, `created_at`, `name`, `user_id`, `updated_at`) VALUES
(1, 1508426355, 'demo editado', 1, 1508426373);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `streaming`
--

CREATE TABLE `streaming` (
  `id` int(11) UNSIGNED NOT NULL,
  `created_at` int(11) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cmd` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `updated_at` int(11) UNSIGNED DEFAULT NULL,
  `pid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `streaming`
--

INSERT INTO `streaming` (`id`, `created_at`, `name`, `cmd`, `user_id`, `updated_at`, `pid`) VALUES
(2, 1508265869, 'Camara en San Miguel de Tucumán', 'ffmpeg -i "http://181.118.102.16:8090/mjpg/video.mjpg?COUNTER" -timeout 30 -hls_time 10 -hls_list_size 5 -hls_wrap 10 -start_number 1', 1, 1508354146, ''),
(3, 1508269495, 'Camara en Gran Bretaña', 'ffmpeg -i "http://81.149.56.38:8083/mjpg/video.mjpg?COUNTER" -timeout 30 -hls_time 10 -hls_list_size 5 -hls_wrap 10 -start_number 1', 1, 1508354142, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` int(11) UNSIGNED DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permissions_group` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `created_at`, `email`, `name`, `surname`, `permissions_group`) VALUES
(1, 'gabrielmacus', 'db9d122352f43ec163d5a3c24e9e1ffabccc568a6b15fe9b116c7647181907e6', 1508244885, 'gabrielmacus@gmail.com', 'Gabriel', 'Macus', 10);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `repository`
--
ALTER TABLE `repository`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_repository_user` (`user_id`);

--
-- Indices de la tabla `streaming`
--
ALTER TABLE `streaming`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_streaming_user` (`user_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `repository`
--
ALTER TABLE `repository`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `streaming`
--
ALTER TABLE `streaming`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `repository`
--
ALTER TABLE `repository`
  ADD CONSTRAINT `c_fk_repository_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `streaming`
--
ALTER TABLE `streaming`
  ADD CONSTRAINT `c_fk_streaming_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
