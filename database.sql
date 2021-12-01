-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping data for table ladida.barang: ~1 rows (approximately)
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
REPLACE INTO `barang` (`id_barang`, `nama_barang`, `harga`, `deskripsi`, `gambar`) VALUES
	(1, 'Air Mineral  Galon Aqua', 20000, NULL, NULL);
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;

-- Dumping data for table ladida.detail_pemesanan: ~0 rows (approximately)
/*!40000 ALTER TABLE `detail_pemesanan` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_pemesanan` ENABLE KEYS */;

-- Dumping data for table ladida.pembeli: ~0 rows (approximately)
/*!40000 ALTER TABLE `pembeli` DISABLE KEYS */;
/*!40000 ALTER TABLE `pembeli` ENABLE KEYS */;

-- Dumping data for table ladida.pemesanan: ~0 rows (approximately)
/*!40000 ALTER TABLE `pemesanan` DISABLE KEYS */;
/*!40000 ALTER TABLE `pemesanan` ENABLE KEYS */;

-- Dumping data for table ladida.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'Admin@gmail.com', NULL, 1, '$2y$10$Vo9prDntw9.1A8Er7aqBWeGJ0RW/tu3KhbtoRBo2W4TrY8S1w/kCy', NULL, '2021-10-10 07:44:54', '2021-11-16 03:15:39'),
	(2, 'user', 'user@gmail.com', NULL, NULL, '$2y$10$8vcTGEaRLy9WlhcoUYbaFuJbY6n6K5WC3iMkwhCkdmhoH2lJ0fjvK', NULL, '2021-10-10 08:00:33', '2021-10-10 08:00:33'),
	(10, 'Mark', 'admin@admin.com', NULL, 1, '$2y$10$FklQZ6fkJo3X4fpuB54fQe.exnDCzV.p9ePUXZqmCMjbkxZvmIUVi', NULL, '2021-11-16 02:32:33', '2021-11-16 03:17:03');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
