-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.33 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para cafeteria
CREATE DATABASE IF NOT EXISTS `cafeteria` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `cafeteria`;

-- Volcando estructura para tabla cafeteria.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `identificacion` varchar(100) DEFAULT NULL,
  `tipos_identificacion_id` int(11) NOT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_clientes_tipos_identificacion` (`tipos_identificacion_id`),
  CONSTRAINT `FK_clientes_tipos_identificacion` FOREIGN KEY (`tipos_identificacion_id`) REFERENCES `tipos_identificacion` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla cafeteria.clientes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `identificacion`, `tipos_identificacion_id`, `correo`, `telefono`) VALUES
	(1, 'Hernan', 'morans', '122333', 1, 'h@gmail.com', '21345678'),
	(2, 'Carolina', 'Rendon', '456789', 1, 'k@gmail.com', '32146712'),
	(3, 'Elsy', 'rendon', '66834340', 1, 'k@gmail.com', '3212312333');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Volcando estructura para tabla cafeteria.detalle_ventas
CREATE TABLE IF NOT EXISTS `detalle_ventas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ventas_id` int(11) NOT NULL,
  `productos_id` int(11) NOT NULL,
  `precio_venta` double DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__ventas` (`ventas_id`),
  KEY `FK__productos` (`productos_id`),
  CONSTRAINT `FK__productos` FOREIGN KEY (`productos_id`) REFERENCES `productos` (`id`),
  CONSTRAINT `FK__ventas` FOREIGN KEY (`ventas_id`) REFERENCES `ventas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla cafeteria.detalle_ventas: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_ventas` DISABLE KEYS */;
INSERT INTO `detalle_ventas` (`id`, `ventas_id`, `productos_id`, `precio_venta`, `cantidad`) VALUES
	(1, 2, 1, 4000, 1),
	(2, 3, 2, 2000, 1),
	(3, 4, 2, 2000, 2),
	(4, 5, 2, 2000, 2),
	(5, 5, 1, 4000, 1),
	(6, 5, 5, 52000, 1),
	(7, 6, 1, 4000, 1),
	(8, 7, 1, 4000, 1),
	(9, 8, 1, 4000, 1),
	(10, 9, 1, 4000, 1),
	(11, 10, 2, 2000, 1),
	(12, 11, 2, 2000, 1),
	(13, 11, 5, 52000, 1),
	(14, 12, 7, 5000, 1);
/*!40000 ALTER TABLE `detalle_ventas` ENABLE KEYS */;

-- Volcando estructura para tabla cafeteria.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla cafeteria.failed_jobs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Volcando estructura para tabla cafeteria.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla cafeteria.migrations: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla cafeteria.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla cafeteria.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla cafeteria.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla cafeteria.personal_access_tokens: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Volcando estructura para tabla cafeteria.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `referencia` varchar(100) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `peso` int(11) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla cafeteria.productos: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`id`, `nombre`, `referencia`, `precio`, `peso`, `categoria`, `cantidad`, `estado`, `fecha`) VALUES
	(1, 'cafe', '1234', 4000, 1, 'comida', 0, 1, '2022-11-05'),
	(2, 'Manzanas', '12345', 2000, 2, 'Fruta', 0, 1, '2022-11-04'),
	(3, 'Manzana', '12345', 2000, 2, 'Fruta', 2, 3, '2022-11-05'),
	(4, 'Arrozw', '12456', 3000, 1, 'Arroz roa', 3, 3, '2022-11-05'),
	(5, 'vinos king', '1245678', 52000, 2, 'licor', 1, 3, '2022-11-05'),
	(6, 'gaseosa', '123453', 4000, 1, 'comidas', NULL, 1, '2022-11-17'),
	(7, 'prueba', '1234', 5000, 1, 'prueba koneta', NULL, 1, '2022-11-17'),
	(8, 'Manzana', '12345', 2000, 2, 'Arroz roa', 1, 1, '2022-11-17');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

-- Volcando estructura para tabla cafeteria.tipos_identificacion
CREATE TABLE IF NOT EXISTS `tipos_identificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `sigla` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla cafeteria.tipos_identificacion: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tipos_identificacion` DISABLE KEYS */;
INSERT INTO `tipos_identificacion` (`id`, `nombre`, `sigla`) VALUES
	(1, 'Cédula de Ciudadanía', 'CC'),
	(2, 'Cédula de Extranjería', 'CE');
/*!40000 ALTER TABLE `tipos_identificacion` ENABLE KEYS */;

-- Volcando estructura para tabla cafeteria.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla cafeteria.users: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'karol', 'karol@gmail.com', NULL, '$2y$10$xCZprYu6Nd0FD0dvdPH8UuMoN7tQFA5u8mZDdTLUFyopcCoKK7p7.', NULL, '2022-11-05 00:24:52', '2022-11-05 00:24:52'),
	(2, 'vanessa', 'vanessa@gmail.com', NULL, '$2y$10$1H0./8.9k6hazdWQ1i2Oiu4esNGcVFZpU8P5Bg7xIxmQfLEK36tiS', NULL, '2022-11-05 17:34:49', '2022-11-05 17:34:49'),
	(3, 'oviedo', 'oviedo@gmail.com', NULL, '$2y$10$w9FBIe.4KBlmbBfUdZGhtOfBhU86hgvZHK5syfbEdxqogDVinEOea', NULL, '2022-11-05 17:43:18', '2022-11-05 17:43:18'),
	(4, 'sebastian', 'sebastia@gmail.com', NULL, '$2y$10$OwBHWirxcXdmJ.kVajzTYO78HFXNJTwOaOTpr567UgKjZfpf0iBF2', NULL, '2022-11-17 16:02:21', '2022-11-17 16:02:21'),
	(5, 'karol', 'k@gmail.com', NULL, '$2y$10$ERCHhHrxhE..EaT92OcU1uzXV7scInxbo5nMePe/fmpPWCS/1ch4C', NULL, '2024-02-03 16:18:11', '2024-02-03 16:18:11');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Volcando estructura para tabla cafeteria.ventas
CREATE TABLE IF NOT EXISTS `ventas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clientes_id` int(11) NOT NULL,
  `num_venta` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `users_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__clientes` (`clientes_id`),
  KEY `FK_ventas_users` (`users_id`),
  CONSTRAINT `FK__clientes` FOREIGN KEY (`clientes_id`) REFERENCES `clientes` (`id`),
  CONSTRAINT `FK_ventas_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla cafeteria.ventas: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` (`id`, `clientes_id`, `num_venta`, `total`, `estado`, `users_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 5, 65000, 1, 1, '2022-11-05 08:59:57', '2022-11-05 08:59:58'),
	(2, 2, 6, 4000, 1, 1, '2022-11-05 15:45:45', '2022-11-05 15:45:45'),
	(3, 2, 7, 2000, 1, 1, '2022-11-05 15:55:00', '2022-11-05 15:55:01'),
	(4, 2, 8, 4000, 1, 1, '2022-11-05 15:55:53', '2022-11-05 15:55:53'),
	(5, 2, 9, 60000, 1, 1, '2022-11-05 16:03:10', '2022-11-05 16:03:10'),
	(6, 2, 10, 4000, 1, 1, '2022-11-05 16:15:40', '2022-11-05 16:15:40'),
	(7, 2, 11, 0, 1, 1, '2022-11-05 16:17:11', '2022-11-05 16:17:11'),
	(8, 2, 12, 0, 1, 1, '2022-11-05 16:18:14', '2022-11-05 16:18:14'),
	(9, 2, 13, 4000, 1, 1, '2022-11-05 16:19:29', '2022-11-05 16:19:29'),
	(10, 2, 14, 2000, 3, 3, '2022-11-05 17:44:57', '2022-11-05 17:45:52'),
	(11, 3, 15, 54000, 1, 1, '2022-11-10 15:41:19', '2022-11-10 15:41:19'),
	(12, 1, 16, 5000, 1, 4, '2022-11-17 16:11:00', '2022-11-17 16:11:00');
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
