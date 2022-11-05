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

-- Volcando datos para la tabla cafeteria.clientes: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `identificacion`, `tipos_identificacion_id`, `correo`, `telefono`) VALUES
	(1, 'Hernan', 'morans', '122333', 1, 'h@gmail.com', '21345678'),
	(2, 'Carolina', 'Rendon', '456789', 1, 'k@gmail.com', '32146712');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Volcando datos para la tabla cafeteria.detalle_ventas: ~10 rows (aproximadamente)
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
	(11, 10, 2, 2000, 1);
/*!40000 ALTER TABLE `detalle_ventas` ENABLE KEYS */;

-- Volcando datos para la tabla cafeteria.failed_jobs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Volcando datos para la tabla cafeteria.migrations: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando datos para la tabla cafeteria.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando datos para la tabla cafeteria.personal_access_tokens: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Volcando datos para la tabla cafeteria.productos: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`id`, `nombre`, `referencia`, `precio`, `peso`, `categoria`, `cantidad`, `estado`, `fecha`) VALUES
	(1, 'cafe', '1234', 4000, 1, 'comida', 0, 1, '2022-11-05'),
	(2, 'Manzanas', '12345', 2000, 2, 'Fruta', 1, 1, '2022-11-04'),
	(3, 'Manzana', '12345', 2000, 2, 'Fruta', 2, 3, '2022-11-05'),
	(4, 'Arrozw', '12456', 3000, 1, 'Arroz roa', 3, 3, '2022-11-05'),
	(5, 'vinos king', '1245678', 52000, 2, 'licor', 2, 1, '2022-11-05');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

-- Volcando datos para la tabla cafeteria.tipos_identificacion: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tipos_identificacion` DISABLE KEYS */;
INSERT INTO `tipos_identificacion` (`id`, `nombre`, `sigla`) VALUES
	(1, 'Cédula de Ciudadanía', 'CC'),
	(2, 'Cédula de Extranjería', 'CE');
/*!40000 ALTER TABLE `tipos_identificacion` ENABLE KEYS */;

-- Volcando datos para la tabla cafeteria.users: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'karol', 'karol@gmail.com', NULL, '$2y$10$xCZprYu6Nd0FD0dvdPH8UuMoN7tQFA5u8mZDdTLUFyopcCoKK7p7.', NULL, '2022-11-05 00:24:52', '2022-11-05 00:24:52'),
	(2, 'vanessa', 'vanessa@gmail.com', NULL, '$2y$10$1H0./8.9k6hazdWQ1i2Oiu4esNGcVFZpU8P5Bg7xIxmQfLEK36tiS', NULL, '2022-11-05 17:34:49', '2022-11-05 17:34:49'),
	(3, 'oviedo', 'oviedo@gmail.com', NULL, '$2y$10$w9FBIe.4KBlmbBfUdZGhtOfBhU86hgvZHK5syfbEdxqogDVinEOea', NULL, '2022-11-05 17:43:18', '2022-11-05 17:43:18');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Volcando datos para la tabla cafeteria.ventas: ~9 rows (aproximadamente)
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
	(10, 2, 14, 2000, 3, 3, '2022-11-05 17:44:57', '2022-11-05 17:45:52');
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
