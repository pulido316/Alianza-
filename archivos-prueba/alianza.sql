-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-10-2016 a las 23:41:24
-- Versión del servidor: 10.0.17-MariaDB
-- Versión de PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alianza`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles`
--

CREATE TABLE `detalles` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `detalles`
--

INSERT INTO `detalles` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Habitacion', NULL, NULL),
(2, 'Baños', NULL, NULL),
(3, 'Garaje', NULL, NULL),
(4, 'Cocina', NULL, NULL),
(5, 'Patio', NULL, NULL),
(6, 'Sala', NULL, NULL),
(7, 'Sala Comedor', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribuciones`
--

CREATE TABLE `distribuciones` (
  `inmueble_id` int(10) UNSIGNED NOT NULL,
  `detalle_id` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `distribuciones`
--

INSERT INTO `distribuciones` (`inmueble_id`, `detalle_id`, `cantidad`, `created_at`, `updated_at`) VALUES
(1, 1, 4, NULL, NULL),
(1, 2, 2, NULL, NULL),
(1, 4, 1, NULL, NULL),
(1, 5, 1, NULL, NULL),
(1, 7, 1, NULL, NULL),
(7, 1, 5, NULL, NULL),
(7, 2, 5, NULL, NULL),
(7, 3, 1, NULL, NULL),
(7, 4, 1, NULL, NULL),
(7, 5, 1, NULL, NULL),
(7, 7, 1, NULL, NULL),
(8, 1, 2, NULL, NULL),
(8, 2, 1, NULL, NULL),
(8, 4, 1, NULL, NULL),
(8, 5, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dotaciones`
--

CREATE TABLE `dotaciones` (
  `inmueble_id` int(10) UNSIGNED NOT NULL,
  `servicio_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `dotaciones`
--

INSERT INTO `dotaciones` (`inmueble_id`, `servicio_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(1, 2, NULL, NULL),
(1, 3, NULL, NULL),
(1, 4, NULL, NULL),
(7, 1, NULL, NULL),
(7, 2, NULL, NULL),
(7, 3, NULL, NULL),
(8, 1, NULL, NULL),
(8, 2, NULL, NULL),
(8, 3, NULL, NULL),
(8, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(10) UNSIGNED NOT NULL,
  `inmueble_id` int(10) UNSIGNED NOT NULL,
  `url_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmuebles`
--

CREATE TABLE `inmuebles` (
  `id` int(10) UNSIGNED NOT NULL,
  `persona_id` int(10) UNSIGNED NOT NULL,
  `lugar_id` int(10) UNSIGNED NOT NULL,
  `tipo_id` int(10) UNSIGNED NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `area_total` double(8,2) NOT NULL,
  `area_construccion` double(8,2) NOT NULL,
  `observacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `inmuebles`
--

INSERT INTO `inmuebles` (`id`, `persona_id`, `lugar_id`, `tipo_id`, `direccion`, `area_total`, `area_construccion`, `observacion`, `created_at`, `updated_at`) VALUES
(1, 1, 15, 2, 'mz x casa 7', 70.50, 60.12, 'n/a', NULL, NULL),
(7, 1, 22, 1, 'calle 15 casa 27', 50.15, 49.60, 'n/a', NULL, NULL),
(8, 1, 30, 5, 'avenida norte 558', 50.00, 50.00, 'feo', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugares`
--

CREATE TABLE `lugares` (
  `id` int(10) UNSIGNED NOT NULL,
  `ubicacion_id` int(10) UNSIGNED DEFAULT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` enum('zona','barrio') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `lugares`
--

INSERT INTO `lugares` (`id`, `ubicacion_id`, `nombre`, `tipo`, `created_at`, `updated_at`) VALUES
(1, NULL, 'SUROIENTAL', 'zona', NULL, NULL),
(2, NULL, 'CENTRO', 'zona', NULL, NULL),
(3, NULL, 'NORTE', 'zona', NULL, NULL),
(15, 1, 'Ciudad Jardínn', 'barrio', NULL, NULL),
(16, 1, 'Pinos de Oriente', 'barrio', NULL, NULL),
(17, 1, 'San Francisco', 'barrio', NULL, NULL),
(18, 1, 'La Florida', 'barrio', NULL, NULL),
(19, 1, 'Jordán', 'barrio', NULL, NULL),
(20, 1, 'Tunjuelito', 'barrio', NULL, NULL),
(21, 1, 'Cooservicios', 'barrio', NULL, NULL),
(22, 1, 'Santa Marta', 'barrio', NULL, NULL),
(23, 1, 'Finca San Antonio', 'barrio', NULL, NULL),
(24, 1, 'San Carlos', 'barrio', NULL, NULL),
(25, 1, 'La Perla', 'barrio', NULL, NULL),
(26, 2, 'Surinama', 'barrio', NULL, NULL),
(27, 2, 'Obrero', 'barrio', NULL, NULL),
(28, 2, 'Gonzalo Suárez Rendón', 'barrio', NULL, NULL),
(29, 2, 'Aquimín', 'barrio', NULL, NULL),
(30, 2, 'El Bosque', 'barrio', NULL, NULL),
(31, 2, 'Bogotá', 'barrio', NULL, NULL),
(32, 2, 'San Laureano', 'barrio', NULL, NULL),
(33, 2, 'El Consuelo', 'barrio', NULL, NULL),
(34, 2, 'Santa Bárbara', 'barrio', NULL, NULL),
(35, 2, 'San Ignacio', 'barrio', NULL, NULL),
(36, 2, 'Centro', 'barrio', NULL, NULL),
(37, 2, 'Santa Lucía', 'barrio', NULL, NULL),
(38, 2, 'Popular', 'barrio', NULL, NULL),
(39, 2, 'Las Nieves', 'barrio', NULL, NULL),
(40, 2, 'Maldonado', 'barrio', NULL, NULL),
(41, 2, '20 de Julio', 'barrio', NULL, NULL),
(42, 2, 'Lidueña', 'barrio', NULL, NULL),
(43, 2, 'Belalcázar', 'barrio', NULL, NULL),
(44, 2, 'Jorge Eliécer Gaitan', 'barrio', NULL, NULL),
(45, 2, 'muiscas', 'barrio', NULL, NULL),
(46, 3, 'Santa Ana', 'barrio', NULL, NULL),
(47, 3, 'Asis Boyacense', 'barrio', NULL, NULL),
(48, 3, 'Villa Luz', 'barrio', NULL, NULL),
(49, 3, 'Filadelfia', 'barrio', NULL, NULL),
(50, 3, 'Buena Vista', 'barrio', NULL, NULL),
(51, 3, 'Villa del Norte', 'barrio', NULL, NULL),
(52, 3, 'Santa Catalina', 'barrio', NULL, NULL),
(53, 3, 'Compes', 'barrio', NULL, NULL),
(54, 3, 'Los Muiscas', 'barrio', NULL, NULL),
(55, 3, 'Suamox', 'barrio', NULL, NULL),
(56, 3, 'Coeducadores', 'barrio', NULL, NULL),
(57, 3, 'Palos Verdes', 'barrio', NULL, NULL),
(58, 3, 'El Capitolio', 'barrio', NULL, NULL),
(59, 3, 'Portal del Campo', 'barrio', NULL, NULL),
(60, 3, 'Manantial del Norte', 'barrio', NULL, NULL),
(61, 3, 'Alcalá Real', 'barrio', NULL, NULL),
(62, 3, 'La Arboleda', 'barrio', NULL, NULL),
(63, 3, 'Balcones de Terranova', 'barrio', NULL, NULL),
(64, 3, 'Tejares del Norte', 'barrio', NULL, NULL),
(65, 3, 'La Colorada', 'barrio', NULL, NULL),
(66, 3, 'Zona Industrial', 'barrio', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_10_04_140326_create_lugares_table', 1),
('2016_10_04_140638_create_servicios_table', 1),
('2016_10_04_140727_create_personas_table', 1),
('2016_10_04_140746_create_tipos_table', 1),
('2016_10_04_140805_create_operaciones_table', 1),
('2016_10_04_140806_create_inmuebles_table', 1),
('2016_10_04_140835_create_postulaciones_table', 1),
('2016_10_04_141324_create_dotaciones_table', 1),
('2016_10_15_140709_create_imagenes_table', 1),
('2016_10_15_220258_create_detalles_table', 1),
('2016_10_15_220418_create_distribuciones_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operaciones`
--

CREATE TABLE `operaciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `operaciones`
--

INSERT INTO `operaciones` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Venta', NULL, NULL),
(2, 'Arriendo', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `observacion` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `nombre`, `apellido`, `email`, `telefono`, `observacion`, `created_at`, `updated_at`) VALUES
(1, 'pepe', 'rojas', 'pepe.rojas@correo.com', '123456789', 'N/A', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulaciones`
--

CREATE TABLE `postulaciones` (
  `operacion_id` int(10) UNSIGNED NOT NULL,
  `inmueble_id` int(10) UNSIGNED NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  `precio` double(8,2) NOT NULL,
  `estado_pustulacion` enum('activo','inactivo') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `postulaciones`
--

INSERT INTO `postulaciones` (`operacion_id`, `inmueble_id`, `fecha_inicio`, `fecha_fin`, `precio`, `estado_pustulacion`, `created_at`, `updated_at`) VALUES
(1, 1, '2016-10-16', NULL, 999999.99, 'activo', NULL, NULL),
(1, 7, '2016-10-16', '2016-10-11', 300000.00, 'activo', NULL, NULL),
(1, 8, '2016-10-16', NULL, 250000.00, 'activo', NULL, NULL),
(2, 7, '2016-10-16', '2016-10-21', 999999.99, 'activo', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Agua', NULL, NULL),
(2, 'Luz', NULL, NULL),
(3, 'Gas', NULL, NULL),
(4, 'Administracion', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Casa', NULL, NULL),
(2, 'Lote', NULL, NULL),
(3, 'Apartamento', NULL, NULL),
(4, 'Aparta Estudio', NULL, NULL),
(5, 'Local', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'AlianzaAdmin', 'AlianzaAdmin@alianza.com', '$2y$10$dHkK55zSVAWHAV7WHr09iuTV4SN8rimJgKf1v5v9MAq8ZPe3LJmua', NULL, '2016-10-16 14:05:39', '2016-10-16 14:05:39');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalles`
--
ALTER TABLE `detalles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `distribuciones`
--
ALTER TABLE `distribuciones`
  ADD PRIMARY KEY (`inmueble_id`,`detalle_id`),
  ADD UNIQUE KEY `distribuciones_inmueble_id_detalle_id_unique` (`inmueble_id`,`detalle_id`),
  ADD KEY `distribuciones_detalle_id_foreign` (`detalle_id`);

--
-- Indices de la tabla `dotaciones`
--
ALTER TABLE `dotaciones`
  ADD PRIMARY KEY (`inmueble_id`,`servicio_id`),
  ADD UNIQUE KEY `dotaciones_inmueble_id_servicio_id_unique` (`inmueble_id`,`servicio_id`),
  ADD KEY `dotaciones_servicio_id_foreign` (`servicio_id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imagenes_inmueble_id_foreign` (`inmueble_id`);

--
-- Indices de la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inmuebles_direccion_unique` (`direccion`),
  ADD KEY `inmuebles_persona_id_foreign` (`persona_id`),
  ADD KEY `inmuebles_lugar_id_foreign` (`lugar_id`),
  ADD KEY `inmuebles_tipo_id_foreign` (`tipo_id`);

--
-- Indices de la tabla `lugares`
--
ALTER TABLE `lugares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lugares_ubicacion_id_foreign` (`ubicacion_id`);

--
-- Indices de la tabla `operaciones`
--
ALTER TABLE `operaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personas_email_unique` (`email`);

--
-- Indices de la tabla `postulaciones`
--
ALTER TABLE `postulaciones`
  ADD PRIMARY KEY (`operacion_id`,`inmueble_id`),
  ADD UNIQUE KEY `postulaciones_operacion_id_inmueble_id_unique` (`operacion_id`,`inmueble_id`),
  ADD KEY `postulaciones_inmueble_id_foreign` (`inmueble_id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalles`
--
ALTER TABLE `detalles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `lugares`
--
ALTER TABLE `lugares`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT de la tabla `operaciones`
--
ALTER TABLE `operaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `distribuciones`
--
ALTER TABLE `distribuciones`
  ADD CONSTRAINT `distribuciones_detalle_id_foreign` FOREIGN KEY (`detalle_id`) REFERENCES `detalles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `distribuciones_inmueble_id_foreign` FOREIGN KEY (`inmueble_id`) REFERENCES `inmuebles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `dotaciones`
--
ALTER TABLE `dotaciones`
  ADD CONSTRAINT `dotaciones_inmueble_id_foreign` FOREIGN KEY (`inmueble_id`) REFERENCES `inmuebles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dotaciones_servicio_id_foreign` FOREIGN KEY (`servicio_id`) REFERENCES `servicios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `imagenes_inmueble_id_foreign` FOREIGN KEY (`inmueble_id`) REFERENCES `inmuebles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  ADD CONSTRAINT `inmuebles_lugar_id_foreign` FOREIGN KEY (`lugar_id`) REFERENCES `lugares` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inmuebles_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inmuebles_tipo_id_foreign` FOREIGN KEY (`tipo_id`) REFERENCES `tipos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `lugares`
--
ALTER TABLE `lugares`
  ADD CONSTRAINT `lugares_ubicacion_id_foreign` FOREIGN KEY (`ubicacion_id`) REFERENCES `lugares` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `postulaciones`
--
ALTER TABLE `postulaciones`
  ADD CONSTRAINT `postulaciones_inmueble_id_foreign` FOREIGN KEY (`inmueble_id`) REFERENCES `inmuebles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `postulaciones_operacion_id_foreign` FOREIGN KEY (`operacion_id`) REFERENCES `operaciones` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
