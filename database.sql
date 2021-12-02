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

-- Dumping structure for table ladida.barang
DROP TABLE IF EXISTS `barang`;
CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(30) NOT NULL,
  `harga` int(5) NOT NULL,
  `deskripsi` varchar(100) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ladida.barang: ~2 rows (approximately)
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
REPLACE INTO `barang` (`id_barang`, `nama_barang`, `harga`, `deskripsi`, `gambar`) VALUES
	(1, 'Air Mineral  Galon Aqua', 20000, 'asdsad', '1638390366Air Mineral  Galon Aqua.jpg'),
	(4, 'Tabung Gas Elpiji', 19000, 'Tabung Gas Hijau Elpiji 3Kg', '1638389088Aquades.jpg');
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;

-- Dumping structure for table ladida.detail_pemesanan
DROP TABLE IF EXISTS `detail_pemesanan`;
CREATE TABLE IF NOT EXISTS `detail_pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(2) NOT NULL,
  KEY `detail_to_pemesanan` (`id_pemesanan`),
  KEY `detail_to_barang` (`id_barang`),
  CONSTRAINT `detail_to_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_to_pemesanan` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ladida.detail_pemesanan: ~0 rows (approximately)
/*!40000 ALTER TABLE `detail_pemesanan` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_pemesanan` ENABLE KEYS */;

-- Dumping structure for table ladida.pembeli
DROP TABLE IF EXISTS `pembeli`;
CREATE TABLE IF NOT EXISTS `pembeli` (
  `id_pembeli` int(2) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(25) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_pembeli`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ladida.pembeli: ~1 rows (approximately)
/*!40000 ALTER TABLE `pembeli` DISABLE KEYS */;
REPLACE INTO `pembeli` (`id_pembeli`, `nama_lengkap`, `alamat`, `no_telp`) VALUES
	(3, 'Isyak Rizqi', 'Banyuwangi', '87762680737');
/*!40000 ALTER TABLE `pembeli` ENABLE KEYS */;

-- Dumping structure for table ladida.pemesanan
DROP TABLE IF EXISTS `pemesanan`;
CREATE TABLE IF NOT EXISTS `pemesanan` (
  `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_pemesanan` date NOT NULL,
  `total_biaya` int(6) NOT NULL,
  `status` int(1) DEFAULT '0',
  `id_pembeli` int(11) NOT NULL,
  PRIMARY KEY (`id_pemesanan`),
  KEY `pemesanan_pembeli` (`id_pembeli`),
  CONSTRAINT `pemesanan_pembeli` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ladida.pemesanan: ~0 rows (approximately)
/*!40000 ALTER TABLE `pemesanan` DISABLE KEYS */;
/*!40000 ALTER TABLE `pemesanan` ENABLE KEYS */;

-- Dumping structure for table ladida.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
