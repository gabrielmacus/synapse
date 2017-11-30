-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2017 a las 21:02:49
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
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` int(11) UNSIGNED NOT NULL,
  `created_at` int(11) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `belongs` int(11) UNSIGNED DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `updated_at` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `created_at`, `name`, `belongs`, `user_id`, `updated_at`) VALUES
(1, 1512050751, 'Posts', 0, 1, NULL),
(3, 1512050866, 'Automotores', 1, 1, 1512050867),
(4, 1512050872, 'Autos', 3, 1, 1512050873),
(5, 1512050883, 'Motos', 3, 1, 1512050885),
(6, 1512050968, 'Inmuebles', 1, 1, 1512050970),
(7, 1512050976, 'Casas', 6, 1, 1512050977),
(8, 1512050981, 'Departamentos', 6, 1, 1512050983),
(9, 1512056354, 'Trabajo', 1, 1, 1512056356),
(10, 1512056377, 'Buscar Trabajo', 9, 1, 1512056378),
(11, 1512056386, 'Ofertar Trabajo', 9, 1, 1512056388),
(14, 1512061838, 'Servicios', 1, 1, 1512061840),
(15, 1512061846, 'Otros', 1, 1, 1512061848),
(16, 1512061855, 'Prestar servicio', 14, 1, 1512061858),
(17, 1512061874, 'Buscar Servicio', 14, 1, 1512061875);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `file`
--

CREATE TABLE `file` (
  `id` int(11) UNSIGNED NOT NULL,
  `created_at` int(11) UNSIGNED DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` int(11) UNSIGNED DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `file`
--

INSERT INTO `file` (`id`, `created_at`, `url`, `name`, `description`, `size`, `user_id`) VALUES
(3, 1512046805, '2017/11/30/5a2000d5b2105/file_1.jpg', '106842245_6.jpg', '', 33469, 1),
(4, 1512046805, '2017/11/30/5a2000d5d5f45/file_1.png', 'placeholder4.png', '', 8081, 1),
(5, 1512048870, '2017/11/30/5a2008e6b7fa2/file_1.jpg', 'car_db5_aston_martin_93821_1920x1080.jpg', '', 729337, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission`
--

CREATE TABLE `permission` (
  `id` int(11) UNSIGNED NOT NULL,
  `created_at` int(11) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actions` text COLLATE utf8mb4_unicode_ci,
  `login_redirect` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `updated_at` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permission`
--

INSERT INTO `permission` (`id`, `created_at`, `name`, `actions`, `login_redirect`, `user_id`, `updated_at`) VALUES
(2, 1511892427, 'Publicador', '{"category":{"action":""},"file":{"action":"file","type":"1"},"file.save":{"action":"file.save","type":"1"},"file.upload":{"action":"file.upload","type":"1"},"home":{"action":"home","type":"3"},"file.delete":{"action":"file.delete","type":"1"},"post":{"action":"post","type":"2"},"post.save":{"action":"post.save","type":"1"},"post.delete":{"action":"post.delete","type":"1"}}', '/', 1, 1511892592);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE `post` (
  `id` int(11) UNSIGNED NOT NULL,
  `created_at` int(11) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `updated_at` int(11) UNSIGNED DEFAULT NULL,
  `user_username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_surname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`id`, `created_at`, `title`, `text`, `user_id`, `updated_at`, `user_username`, `user_type`, `user_email`, `user_name`, `user_surname`) VALUES
(3, 1511982476, 'Post creador por un desarrollador', 'Texto', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1511982884, 'Post de demodemo2', 'ASdjaspdojas apsd opajsd opjasdpadspoj sadjpoasd asd', 5, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 1511984318, 'Post de demodemo (editado x demodemo)', 'asdfdfgfghfghfgh', 4, 1511984750, 'demodemo', 'account', 'a@a.com', 'Demo', 'Demo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` int(11) UNSIGNED DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission_id` int(11) UNSIGNED DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `user_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `created_at`, `type`, `email`, `name`, `surname`, `permission_id`, `status`, `user_id`) VALUES
(1, 'gabrielmacus', 'db9d122352f43ec163d5a3c24e9e1ffabccc568a6b15fe9b116c7647181907e6', 1511893070, 'account', 'gabrielmacus@gmail.com', 'Gabriel', 'Macus', 1000, 1, 1),
(4, 'demodemo', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 1511893184, 'account', 'a@a.com', 'Demo', 'Demo', 2, 1, 1),
(5, 'demodemo2', '4011ba02e51104c678c31a76a444485b38f3865e504d89c3a0a80b439bb1a237', 1511982547, 'account', 'demo@d.com', 'Demo 2', 'Demo 2', 2, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_category_user` (`user_id`);

--
-- Indices de la tabla `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_file_user` (`user_id`);

--
-- Indices de la tabla `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_permission_user` (`user_id`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_post_user` (`user_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_user_permission` (`permission_id`),
  ADD KEY `index_foreignkey_user_user` (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `c_fk_category_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `c_fk_file_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `permission`
--
ALTER TABLE `permission`
  ADD CONSTRAINT `c_fk_permission_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `c_fk_post_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `c_fk_user_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
