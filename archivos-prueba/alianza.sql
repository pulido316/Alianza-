-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2016 a las 01:00:05
-- Versión del servidor: 10.1.8-MariaDB
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
(1, 1, 1, NULL, NULL),
(1, 2, 1, NULL, NULL),
(1, 4, 1, NULL, NULL),
(2, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(2, 4, 1, NULL, NULL),
(2, 7, 1, NULL, NULL),
(3, 1, 2, NULL, NULL),
(3, 2, 2, NULL, NULL),
(3, 3, 1, NULL, NULL),
(3, 4, 1, NULL, NULL),
(3, 7, 1, NULL, NULL),
(5, 1, 2, NULL, NULL),
(5, 2, 2, NULL, NULL),
(5, 4, 1, NULL, NULL),
(5, 7, 1, NULL, NULL),
(6, 1, 2, NULL, NULL),
(6, 2, 1, NULL, NULL),
(6, 4, 1, NULL, NULL),
(6, 7, 1, NULL, NULL),
(7, 1, 2, NULL, NULL),
(7, 2, 1, NULL, NULL),
(7, 3, 1, NULL, NULL),
(7, 4, 1, NULL, NULL),
(7, 7, 1, NULL, NULL);

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
(2, 1, NULL, NULL),
(2, 2, NULL, NULL),
(2, 3, NULL, NULL),
(2, 4, NULL, NULL),
(3, 1, NULL, NULL),
(3, 2, NULL, NULL),
(3, 3, NULL, NULL),
(3, 4, NULL, NULL),
(4, 1, NULL, NULL),
(4, 2, NULL, NULL),
(5, 1, NULL, NULL),
(5, 2, NULL, NULL),
(5, 3, NULL, NULL),
(5, 4, NULL, NULL),
(6, 1, NULL, NULL),
(6, 2, NULL, NULL),
(6, 3, NULL, NULL),
(6, 4, NULL, NULL),
(7, 1, NULL, NULL),
(7, 2, NULL, NULL),
(7, 3, NULL, NULL);

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

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `inmueble_id`, `url_img`, `created_at`, `updated_at`) VALUES
(1, 1, 'IMG_5250.JPG', NULL, NULL),
(2, 1, 'IMG_5251.JPG', NULL, NULL),
(3, 1, 'IMG_5252.JPG', NULL, NULL),
(4, 1, 'IMG_5253.JPG', NULL, NULL),
(5, 1, 'IMG_5254.JPG', NULL, NULL),
(6, 1, 'IMG_5255.JPG', NULL, NULL),
(7, 1, 'IMG_5256.JPG', NULL, NULL),
(8, 2, 'IMG_5257.JPG', NULL, NULL),
(9, 2, 'IMG_5258.JPG', NULL, NULL),
(10, 2, 'IMG_5259.JPG', NULL, NULL),
(11, 2, 'IMG_5260.JPG', NULL, NULL),
(12, 2, 'IMG_5261.JPG', NULL, NULL),
(13, 2, 'IMG_5262.JPG', NULL, NULL),
(14, 2, 'IMG_5263.JPG', NULL, NULL),
(15, 2, 'IMG_5264.JPG', NULL, NULL),
(16, 3, 'IMG_5265.JPG', NULL, NULL),
(17, 3, 'IMG_5266.JPG', NULL, NULL),
(18, 3, 'IMG_5267.JPG', NULL, NULL),
(19, 3, 'IMG_5268.JPG', NULL, NULL),
(20, 3, 'IMG_5269.JPG', NULL, NULL),
(21, 3, 'IMG_5270.JPG', NULL, NULL),
(22, 3, 'IMG_5271.JPG', NULL, NULL),
(23, 3, 'IMG_5272.JPG', NULL, NULL),
(24, 3, 'IMG_5273.JPG', NULL, NULL),
(25, 4, 'IMG_5274.JPG', NULL, NULL),
(26, 4, 'IMG_5275.JPG', NULL, NULL),
(27, 5, 'IMG_5276.JPG', NULL, NULL),
(28, 5, 'IMG_5277.JPG', NULL, NULL),
(29, 5, 'IMG_5278.JPG', NULL, NULL),
(30, 5, 'IMG_5279.JPG', NULL, NULL),
(31, 5, 'IMG_5280.JPG', NULL, NULL),
(32, 5, 'IMG_5281.JPG', NULL, NULL),
(33, 5, 'IMG_5282.JPG', NULL, NULL),
(34, 5, 'IMG_5283.JPG', NULL, NULL),
(35, 5, 'IMG_5284.JPG', NULL, NULL),
(36, 5, 'IMG_5285.JPG', NULL, NULL),
(37, 6, 'IMG_5286.JPG', NULL, NULL),
(38, 6, 'IMG_5287.JPG', NULL, NULL),
(39, 6, 'IMG_5288.JPG', NULL, NULL),
(40, 7, 'IMG_5289.JPG', NULL, NULL),
(41, 7, 'IMG_5290.JPG', NULL, NULL),
(42, 7, 'IMG_5291.JPG', NULL, NULL),
(43, 7, 'IMG_5292.JPG', NULL, NULL),
(44, 7, 'IMG_5293.JPG', NULL, NULL);

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
(1, 2, 36, 4, 'calle 21 # 7-70 - Interior 301', 25.00, 28.00, 'Ninguna', NULL, NULL),
(2, 1, 36, 4, ' Cra 8 21 39', 30.00, 32.00, 'Ninguna', NULL, NULL),
(3, 3, 34, 3, 'Cr 7 Numero 23 50 - Interior 401', 37.00, 37.00, 'Ninguna', NULL, NULL),
(4, 2, 67, 5, 'Avenida maldonado', 50.00, 55.00, '', NULL, NULL),
(5, 5, 36, 3, 'Cr 7 Numero 23 50 - Interior 506', 37.00, 37.00, '', NULL, NULL),
(6, 4, 67, 3, 'Calle 28 No. 11 – 22', 35.00, 36.00, 'Ninguna', NULL, NULL),
(7, 3, 3, 3, 'Transversal 3 #60-41 - Interior 904', 38.00, 38.00, 'Ninguna', NULL, NULL);

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
(66, 3, 'Zona Industrial', 'barrio', NULL, NULL),
(67, 3, 'Maldonado', 'barrio', NULL, NULL);

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
  `documento_id` int(11) NOT NULL,
  `telefono` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `observacion` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `nombre`, `apellido`, `email`, `documento_id`, `telefono`, `observacion`, `created_at`, `updated_at`) VALUES
(1, 'pepe', 'rojas', 'pepe.rojas@correo.com', 1049630805, '123456789', 'N/A', NULL, NULL),
(2, 'Juan', 'Perez', 'juan217@hotmail.com', 6642376, '3145982609', 'Ninguna', NULL, NULL),
(3, 'Milena ', 'Torres', 'm_torres6@gmail.com', 1043675428, '3125609568', 'Ninguna', NULL, NULL),
(4, 'Fanny ', 'Torres', 'ftorres13@hotmail.com', 1049785275, '3218675639', 'Ninguna', NULL, NULL),
(5, 'Maria', 'Sanchez', 'mariasanchez09@hotmail.com', 40087265, '3157265801', 'Ninguna', NULL, NULL),
(6, 'Andres Felipe', 'Martinez Gutierrez', 'felipeMG@gmail.com', 1037625894, '3208276471', 'Ninguna', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulaciones`
--

CREATE TABLE `postulaciones` (
  `operacion_id` int(10) UNSIGNED NOT NULL,
  `inmueble_id` int(10) UNSIGNED NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  `precio` double(15,2) NOT NULL,
  `estado_pustulacion` enum('activo','inactivo') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `postulaciones`
--

INSERT INTO `postulaciones` (`operacion_id`, `inmueble_id`, `fecha_inicio`, `fecha_fin`, `precio`, `estado_pustulacion`, `created_at`, `updated_at`) VALUES
(1, 6, '2016-10-27', NULL, 75000000.00, 'activo', NULL, NULL),
(1, 7, '2016-10-27', NULL, 90000000.00, 'activo', NULL, NULL),
(2, 1, '2016-10-10', NULL, 380000.00, 'activo', NULL, NULL),
(2, 2, '2016-10-17', NULL, 230000.00, 'activo', NULL, NULL),
(2, 3, '2016-10-18', NULL, 450000.00, 'activo', NULL, NULL),
(2, 4, '2016-10-19', NULL, 950000.00, 'activo', NULL, NULL),
(2, 5, '2016-10-27', NULL, 460000.00, 'activo', NULL, NULL);

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
  ADD UNIQUE KEY `personas_email_unique` (`email`),
  ADD UNIQUE KEY `personas_documento_id_unique` (`documento_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT de la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `lugares`
--
ALTER TABLE `lugares`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT de la tabla `operaciones`
--
ALTER TABLE `operaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
