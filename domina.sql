-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-04-2021 a las 19:01:10
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `domina`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camion`
--

CREATE TABLE `camion` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `finca_id` bigint(20) UNSIGNED NOT NULL,
  `repartidor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `camion`
--

INSERT INTO `camion` (`id`, `finca_id`, `repartidor_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2021-04-01 05:00:00', NULL),
(2, 2, 1, '2021-04-01 05:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `finca`
--

CREATE TABLE `finca` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad_arbol` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `finca`
--

INSERT INTO `finca` (`id`, `nombre`, `direccion`, `cantidad_arbol`, `created_at`, `updated_at`) VALUES
(1, 'Joaquina', 'km 2 via medellin', 200, '2021-04-01 05:00:00', NULL),
(2, 'Rosario', 'km 20 via monteria', 100, '2021-04-01 05:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote`
--

CREATE TABLE `lote` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha_recoleccion` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `lote`
--

INSERT INTO `lote` (`id`, `fecha_recoleccion`, `cantidad`, `created_at`, `updated_at`) VALUES
(1, '2021-04-02', 8, '2021-04-02 05:00:00', NULL),
(2, '2021-04-09', 8, '2021-04-09 05:00:00', NULL),
(3, '2021-04-16', 8, '2021-04-16 05:00:00', NULL),
(4, '2021-04-23', 8, '2021-04-23 05:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `manifiesto`
--

CREATE TABLE `manifiesto` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha_nomina` date NOT NULL,
  `repartidor_id` bigint(20) UNSIGNED NOT NULL,
  `camion_id` bigint(20) UNSIGNED NOT NULL,
  `finca_id` bigint(20) UNSIGNED NOT NULL,
  `cantidad_lotes` int(11) NOT NULL,
  `cantidad_lotes_entregados` int(11) NOT NULL,
  `cantidad_lotes_devuelto` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `manifiesto`
--

INSERT INTO `manifiesto` (`id`, `fecha_nomina`, `repartidor_id`, `camion_id`, `finca_id`, `cantidad_lotes`, `cantidad_lotes_entregados`, `cantidad_lotes_devuelto`, `created_at`, `updated_at`) VALUES
(1, '2021-04-29', 2, 1, 1, 4, 3, 1, '2021-04-29 05:00:00', NULL),
(2, '2021-04-29', 1, 2, 2, 5, 4, 1, '2021-04-29 05:00:00', NULL),
(3, '2021-04-29', 2, 1, 1, 8, 5, 3, '2021-04-29 05:00:00', NULL),
(4, '2021-04-29', 1, 2, 2, 8, 6, 2, '2021-04-29 05:00:00', NULL),
(5, '2021-04-29', 2, 1, 1, 7, 3, 4, '2021-04-29 05:00:00', NULL),
(6, '2021-04-29', 1, 2, 2, 8, 4, 4, '2021-04-29 05:00:00', NULL),
(7, '2021-04-29', 2, 1, 1, 7, 5, 2, '2021-04-29 05:00:00', NULL),
(8, '2021-04-29', 1, 2, 2, 8, 2, 6, '2021-04-29 05:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(16, '2014_10_12_000000_create_users_table', 1),
(17, '2014_10_12_100000_create_password_resets_table', 1),
(18, '2019_08_19_000000_create_failed_jobs_table', 1),
(19, '2021_04_29_143143_create_lote', 1),
(20, '2021_04_29_143332_create_finca', 1),
(21, '2021_04_29_144309_create_repartidor', 1),
(22, '2021_04_29_144327_create_camion', 1),
(23, '2021_04_29_144358_create_manifiesto', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repartidor`
--

CREATE TABLE `repartidor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `repartidor`
--

INSERT INTO `repartidor` (`id`, `nombre`, `direccion`, `telefono`, `created_at`, `updated_at`) VALUES
(1, 'Sebastian Ricardo', 'calle 89 #45-39', '3233943940', '2021-04-01 05:00:00', NULL),
(2, 'Juan Gonzales', 'calle 14 #34-02', '3203894859', '2021-04-01 05:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `camion`
--
ALTER TABLE `camion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `camion_finca_id_foreign` (`finca_id`),
  ADD KEY `camion_repartidor_id_foreign` (`repartidor_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `finca`
--
ALTER TABLE `finca`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lote`
--
ALTER TABLE `lote`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `manifiesto`
--
ALTER TABLE `manifiesto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manifiesto_repartidor_id_foreign` (`repartidor_id`),
  ADD KEY `manifiesto_camion_id_foreign` (`camion_id`),
  ADD KEY `manifiesto_finca_id_foreign` (`finca_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `repartidor`
--
ALTER TABLE `repartidor`
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
-- AUTO_INCREMENT de la tabla `camion`
--
ALTER TABLE `camion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `finca`
--
ALTER TABLE `finca`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `lote`
--
ALTER TABLE `lote`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `manifiesto`
--
ALTER TABLE `manifiesto`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `repartidor`
--
ALTER TABLE `repartidor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `camion`
--
ALTER TABLE `camion`
  ADD CONSTRAINT `camion_finca_id_foreign` FOREIGN KEY (`finca_id`) REFERENCES `finca` (`id`),
  ADD CONSTRAINT `camion_repartidor_id_foreign` FOREIGN KEY (`repartidor_id`) REFERENCES `repartidor` (`id`);

--
-- Filtros para la tabla `manifiesto`
--
ALTER TABLE `manifiesto`
  ADD CONSTRAINT `manifiesto_camion_id_foreign` FOREIGN KEY (`camion_id`) REFERENCES `camion` (`id`),
  ADD CONSTRAINT `manifiesto_finca_id_foreign` FOREIGN KEY (`finca_id`) REFERENCES `finca` (`id`),
  ADD CONSTRAINT `manifiesto_repartidor_id_foreign` FOREIGN KEY (`repartidor_id`) REFERENCES `repartidor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
