-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table tooku.carts: ~0 rows (approximately)

-- Dumping data for table tooku.failed_jobs: ~0 rows (approximately)

-- Dumping data for table tooku.migrations: ~0 rows (approximately)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2024_08_02_140050_create_orders_table', 1),
	(6, '2024_08_02_183126_create_carts_table', 1),
	(7, '2024_08_02_183511_create_produks_table', 1);

-- Dumping data for table tooku.orders: ~14 rows (approximately)
REPLACE INTO `orders` (`id`, `name`, `qty`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Durian Merah', 1, 395000, 'unpaid', '2024-08-03 10:27:23', '2024-08-03 10:27:23'),
	(2, 'Durian Merah', 1, 395000, 'unpaid', '2024-08-03 10:28:15', '2024-08-03 10:28:15'),
	(3, 'Durian Merah', 1, 395000, 'unpaid', '2024-08-03 10:28:33', '2024-08-03 10:28:33'),
	(4, 'Durian Merah', 1, 395000, 'unpaid', '2024-08-03 10:30:02', '2024-08-03 10:30:02'),
	(5, 'Durian Musang King', 1, 2201000, 'unpaid', '2024-08-03 10:30:28', '2024-08-03 10:30:28'),
	(6, 'durian', 1, 1000000, 'paid', '2024-08-03 10:31:13', '2024-08-03 10:31:53'),
	(7, 'Durian Montong', 1, 1411000, 'unpaid', '2024-08-03 10:32:31', '2024-08-03 10:32:31'),
	(8, 'Durian Musang King', 1, 2201000, 'unpaid', '2024-08-03 10:32:38', '2024-08-03 10:32:38'),
	(9, 'Durian Montong', 1, 980000, 'unpaid', '2024-08-03 10:33:04', '2024-08-03 10:33:04'),
	(10, 'Durian Merah', 1, 395000, 'unpaid', '2024-08-03 10:35:51', '2024-08-03 10:35:51'),
	(11, 'Durian Montong', 1, 2668000, 'unpaid', '2024-08-03 10:38:55', '2024-08-03 10:38:55'),
	(12, 'Durian Montong', 1, 1411000, 'unpaid', '2024-08-03 10:41:28', '2024-08-03 10:41:28'),
	(13, 'Durian Merah', 1, 395000, 'unpaid', '2024-08-03 10:41:48', '2024-08-03 10:41:48'),
	(14, 'Durian Montong', 1, 585000, 'unpaid', '2024-08-03 10:42:08', '2024-08-03 10:42:08'),
	(15, 'Durian Montong', 1, 1411000, 'paid', '2024-08-03 10:42:54', '2024-08-03 10:43:16'),
	(16, 'Durian Montong', 1, 1411000, 'paid', '2024-08-03 10:48:34', '2024-08-03 10:48:51'),
	(17, 'Durian Montong', 1, 1016000, 'paid', '2024-08-03 10:51:16', '2024-08-03 10:51:32');

-- Dumping data for table tooku.password_reset_tokens: ~0 rows (approximately)

-- Dumping data for table tooku.personal_access_tokens: ~0 rows (approximately)

-- Dumping data for table tooku.produks: ~3 rows (approximately)
REPLACE INTO `produks` (`id`, `nama`, `deskripsi`, `gambar`, `harga`, `created_at`, `updated_at`) VALUES
	(1, 'Durian Musang King', 'Musang King merupakan durian asal Malaysia yang pertama kali diperkenalkan pada tahun 1990. Durian ini juga memiliki nama lain yaitu Mao Shan Wang atau artinya Raja Kucing.', 'public/assets/img.durian.jpg', 431000, NULL, NULL),
	(2, 'Durian Merah', 'Tabelak merupakan buah khas kalimantan yang banyak terdapat di pedalaman Kalimantan, Indonesia. Bentuk pohonnya serupa dengan pohon duriaan pada umumnya dengan tinggi batang bisa mencapai 25-30 meter..', 'public/assets/img.durian.jpg', 395000, NULL, NULL),
	(3, 'Durian Montong', 'Durian adalah nama tumbuhan tropis yang berasal dari wilayah Asia Tenggara, sekaligus nama buahnya yang bisa dimakan.', 'public/assets/img.durian.jpg', 585000, NULL, NULL);

-- Dumping data for table tooku.users: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
