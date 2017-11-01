-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-10-2017 a las 19:40:31
-- Versión del servidor: 5.7.17
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `oceadis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(40) COLLATE utf8_swedish_ci NOT NULL,
  `descr` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `menu_name` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Volcado de datos para la tabla `department`
--

INSERT INTO `department` (`id`, `name`, `descr`, `menu_name`, `active`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Recursos Humanos', 'Encargado de reclutar el personal de la empresa', 'RH', 1, 1, '2017-10-18 14:39:33', 1, '2017-10-18 14:39:33'),
(2, 'Buceo', 'buzos', 'Buceo', 1, 1, '2017-10-22 13:38:10', 1, '2017-10-22 13:38:10'),
(3, 'Admin', 'Admin', 'Admin', 1, 1, '2017-10-26 10:15:05', 1, '2017-10-26 10:15:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `department_document`
--

CREATE TABLE `department_document` (
  `id_departmen` int(11) NOT NULL,
  `id_document` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `updated_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `id_section` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descr` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `document_name` varchar(40) COLLATE utf8_swedish_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `dir_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_revs`
--

CREATE TABLE `log_revs` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `id_document` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_swedish_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m140209_132017_init', 1508946321),
('m140403_174025_create_account_table', 1508946321),
('m140504_113157_update_tables', 1508946321),
('m140504_130429_create_token_table', 1508946322),
('m140830_171933_fix_ip_field', 1508946322),
('m140830_172703_change_account_table_name', 1508946322),
('m141222_110026_update_ip_field', 1508946322),
('m141222_135246_alter_username_length', 1508946322),
('m150614_103145_update_social_account_table', 1508946322),
('m150623_212711_fix_username_notnull', 1508946322),
('m151218_234654_add_timezone_to_profile', 1508946322),
('m160929_103127_add_last_login_at_to_user_table', 1508946322);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `page_sections`
--

CREATE TABLE `page_sections` (
  `id` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `name_section` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `code_section` longtext COLLATE utf8_unicode_ci NOT NULL,
  `position` smallint(2) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `page_sections`
--

INSERT INTO `page_sections` (`id`, `name`, `name_section`, `code_section`, `position`, `active`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Alcance', 'alcance', '<p>codigo</p>', 1, 1, 1, '2017-10-26 19:23:38', 1, '2017-10-26 19:26:33'),
(2, 'Politica', 'politica', '<p>codigo<span id=\"selection-marker-1\" class=\"redactor-selection-marker\"></span></p>', 2, 1, 1, '2017-10-26 19:24:23', 1, '2017-10-26 19:24:23'),
(3, 'Objetivo', 'objetivo', '<p>codigo<span id=\"selection-marker-1\" class=\"redactor-selection-marker\"></span></p>', 3, 1, 1, '2017-10-26 19:24:42', 1, '2017-10-26 19:24:42'),
(4, 'Misión', 'mision', '<p>codigo<span id=\"selection-marker-1\" class=\"redactor-selection-marker\"></span></p>', 4, 1, 1, '2017-10-26 19:25:19', 1, '2017-10-26 19:25:19'),
(5, 'Visión', 'vision', '<p>codigo<span id=\"selection-marker-1\" class=\"redactor-selection-marker\"></span></p>', 5, 1, 1, '2017-10-26 19:25:38', 1, '2017-10-26 19:25:38'),
(6, 'Valores', 'valores', '<p>codigo<span id=\"selection-marker-1\" class=\"redactor-selection-marker\"></span></p>', 6, 1, 1, '2017-10-26 19:25:59', 1, '2017-10-26 19:25:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `page_section_image`
--

CREATE TABLE `page_section_image` (
  `id` int(11) NOT NULL,
  `id_page_section` int(11) NOT NULL,
  `dir_name` varchar(45) COLLATE utf8_swedish_ci NOT NULL,
  `tittle` varchar(45) COLLATE utf8_swedish_ci NOT NULL,
  `position` int(3) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`, `timezone`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `position` smallint(2) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `descr` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sections_department`
--

CREATE TABLE `sections_department` (
  `id_department` int(11) NOT NULL,
  `id_section` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `social_account`
--

CREATE TABLE `social_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `token`
--

CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `token`
--

INSERT INTO `token` (`user_id`, `code`, `created_at`, `type`) VALUES
(1, 'KbpeyROzIVhjZre8xEqPIqu_n7HWm7a9', 1508951186, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  `last_login_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `last_login_at`) VALUES
(1, 'admin', 'martinez230786@gmail.com', '$2y$10$XYNkzKSQ35sLitsNsVQmFOYe9DzM4A.F1F2a507rJPLl3S9MUMcd.', 'L6ne4UJE0foE0QQnQQlBjV5CYvp1dowu', 1508951245, NULL, NULL, '::1', 1508951186, 1508951186, 0, 1509063584),
(2, 'joseperez', 'prueba@gmail.com', '$2y$10$R344Zl7ZGGdgIZN33ewZeeHqoBfYHbFqdEceFU1cPNR/y5VDjP7li', 's2O-VEU75jGyHdwSlhQy0XXfEdNhOF7L', 1509030705, NULL, NULL, '::1', 1509030705, 1509030705, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_department`
--

CREATE TABLE `user_department` (
  `id_user` int(11) NOT NULL,
  `id_department` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Volcado de datos para la tabla `user_department`
--

INSERT INTO `user_department` (`id_user`, `id_department`, `created_at`, `created_by`) VALUES
(1, 3, '2017-10-26 11:56:05', 1),
(2, 2, '2017-10-26 12:13:20', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `menu_name` (`menu_name`),
  ADD UNIQUE KEY `name_active` (`menu_name`,`active`),
  ADD KEY `departament_crea_idx` (`created_by`),
  ADD KEY `department_update_idx` (`updated_by`);

--
-- Indices de la tabla `department_document`
--
ALTER TABLE `department_document`
  ADD PRIMARY KEY (`id_departmen`,`id_document`,`id_section`),
  ADD KEY `dd_crea_idx` (`created_by`),
  ADD KEY `dd_update_idx` (`updated_by`),
  ADD KEY `document_idx` (`id_document`),
  ADD KEY `section_idx` (`id_section`);

--
-- Indices de la tabla `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_active` (`active`,`name`),
  ADD KEY `document_crea_idx` (`created_by`),
  ADD KEY `document_update_idx` (`updated_by`);

--
-- Indices de la tabla `log_revs`
--
ALTER TABLE `log_revs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_log_idx` (`id_user`),
  ADD KEY `user_document_idx` (`id_document`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Indices de la tabla `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `page_sections`
--
ALTER TABLE `page_sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`),
  ADD UNIQUE KEY `namesection` (`name_section`),
  ADD UNIQUE KEY `position` (`position`),
  ADD KEY `section_crea_idx` (`created_by`),
  ADD KEY `section_update_idx` (`updated_by`);

--
-- Indices de la tabla `page_section_image`
--
ALTER TABLE `page_section_image`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hash_UNIQUE` (`hash`),
  ADD KEY `page_section_id_idx` (`id_page_section`),
  ADD KEY `create_ps_image_idx` (`created_by`);

--
-- Indices de la tabla `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indices de la tabla `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`),
  ADD UNIQUE KEY `position_active` (`position`,`active`),
  ADD KEY `section_crea_idx` (`created_by`),
  ADD KEY `section_update_idx` (`updated_by`);

--
-- Indices de la tabla `sections_department`
--
ALTER TABLE `sections_department`
  ADD PRIMARY KEY (`id_department`,`id_section`),
  ADD UNIQUE KEY `department_section` (`id_department`,`id_section`),
  ADD KEY `sd_section_idx` (`id_section`),
  ADD KEY `sd_create_idx` (`created_by`);

--
-- Indices de la tabla `social_account`
--
ALTER TABLE `social_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_unique` (`provider`,`client_id`),
  ADD UNIQUE KEY `account_unique_code` (`code`),
  ADD KEY `fk_user_account` (`user_id`);

--
-- Indices de la tabla `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_username` (`username`),
  ADD UNIQUE KEY `user_unique_email` (`email`);

--
-- Indices de la tabla `user_department`
--
ALTER TABLE `user_department`
  ADD PRIMARY KEY (`id_user`,`id_department`),
  ADD KEY `ud_department_idx` (`id_department`),
  ADD KEY `ud_create_idx` (`created_by`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `document`
--
ALTER TABLE `document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `log_revs`
--
ALTER TABLE `log_revs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `page_sections`
--
ALTER TABLE `page_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `page_section_image`
--
ALTER TABLE `page_section_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_crea` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `department_update` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `department_document`
--
ALTER TABLE `department_document`
  ADD CONSTRAINT `dd_crea` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `dd_update` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `department` FOREIGN KEY (`id_departmen`) REFERENCES `department` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `document` FOREIGN KEY (`id_document`) REFERENCES `document` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `section` FOREIGN KEY (`id_section`) REFERENCES `sections` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `document_crea` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `document_update` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `log_revs`
--
ALTER TABLE `log_revs`
  ADD CONSTRAINT `user_document` FOREIGN KEY (`id_document`) REFERENCES `document` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_log` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `page_section_image`
--
ALTER TABLE `page_section_image`
  ADD CONSTRAINT `create_ps_image` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `page_section_id` FOREIGN KEY (`id_page_section`) REFERENCES `page_sections` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `section_crea` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `section_update` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sections_department`
--
ALTER TABLE `sections_department`
  ADD CONSTRAINT `sd_create` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sd_department` FOREIGN KEY (`id_department`) REFERENCES `department` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sd_section` FOREIGN KEY (`id_section`) REFERENCES `sections` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `user_department`
--
ALTER TABLE `user_department`
  ADD CONSTRAINT `ud_create` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ud_department` FOREIGN KEY (`id_department`) REFERENCES `department` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ud_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
