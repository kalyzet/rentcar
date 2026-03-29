-- Buat database baru (opsional, jalankan jika belum buat database)
-- CREATE DATABASE rental_kendaraan_mvp;
-- USE rental_kendaraan_mvp;

-- --------------------------------------------------------
-- 1. Struktur Tabel `vehicles`
-- --------------------------------------------------------
CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `jenis` enum('mobil','motor') NOT NULL,
  `plat_nomor` varchar(20) NOT NULL,
  `harga_per_hari` int(11) NOT NULL,
  `status` enum('tersedia','disewa','maintenance') NOT NULL DEFAULT 'tersedia',
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL, -- Menyimpan path/nama file gambar
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vehicles_plat_nomor_unique` (`plat_nomor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert Data Dummy untuk Vehicles
INSERT INTO `vehicles` (`nama`, `jenis`, `plat_nomor`, `harga_per_hari`, `status`, `deskripsi`, `foto`) VALUES
('Avanza Veloz 2022', 'mobil', 'DA 1234 ABC', 350000, 'tersedia', 'Mobil keluarga nyaman, AC dingin, transmisi otomatis.', 'avanza.jpg'),
('Honda Vario 160', 'motor', 'DA 5678 XYZ', 100000, 'tersedia', 'Motor matic lincah, irit bensin, cocok untuk dalam kota.', 'vario.jpg');

-- --------------------------------------------------------
-- 2. Struktur Tabel `bookings`
-- --------------------------------------------------------
CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_booking` varchar(20) NOT NULL, -- Contoh: RENT-001, penting untuk tracking WA
  `nama_penyewa` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `lokasi_tujuan` varchar(255) NOT NULL,
  `keperluan_sewa` varchar(255) NOT NULL,
  `catatan` text DEFAULT NULL,
  `total_harga` int(11) NOT NULL, -- Hasil kali hari x harga_per_hari
  `status_booking` enum('menunggu konfirmasi','dikonfirmasi','selesai','dibatalkan') NOT NULL DEFAULT 'menunggu konfirmasi',
  `status_pembayaran` enum('belum bayar','dp','lunas') NOT NULL DEFAULT 'belum bayar',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bookings_kode_booking_unique` (`kode_booking`),
  KEY `bookings_vehicle_id_foreign` (`vehicle_id`),
  -- Menambahkan batasan Foreign Key agar id kendaraan valid
  CONSTRAINT `bookings_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert Data Dummy untuk Bookings
INSERT INTO `bookings` (`kode_booking`, `nama_penyewa`, `no_hp`, `vehicle_id`, `tanggal_mulai`, `tanggal_selesai`, `lokasi_tujuan`, `keperluan_sewa`, `catatan`, `total_harga`, `status_booking`, `status_pembayaran`) VALUES
('RENT-001', 'Budi Santoso', '081234567890', 1, '2026-03-28', '2026-03-30', 'Banjarbaru', 'Dinas Kantor', 'Tolong mobil dicuci bersih sebelum diambil', 700000, 'menunggu konfirmasi', 'belum bayar');