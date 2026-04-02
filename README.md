# 🚗 Sistem Rental Mobil

Aplikasi manajemen rental kendaraan berbasis web yang dibangun dengan **Laravel 11.51.0** dan **Filament v5.4.1**. Sistem ini memudahkan pengelolaan data kendaraan, pemesanan (booking), dan monitoring status secara real-time melalui dashboard admin.

---

## Fitur Utama

- Manajemen data kendaraan (tambah, edit, hapus, foto kendaraan)
- Manajemen booking penyewa (kode booking, status, pembayaran)
- Dashboard statistik kendaraan dan booking
- Filter status kendaraan: Tersedia, Disewa, Maintenance
- Filter status booking: Menunggu Konfirmasi, Dikonfirmasi, Selesai, Dibatalkan
- Panel admin berbasis Filament

---

## Tech Stack

- **PHP** ^8.3
- **Laravel** ^11.51
- **Filament** ^5.4
- **Database** SQLite (default) / MySQL
- **Vite** + Tailwind CSS

---

## Persyaratan

- PHP >= 8.2
- Composer
- Node.js & NPM
- SQLite atau MySQL

---

## Instalasi

### 1. Clone repository

```bash
git clone https://github.com/kalyzet/rentcar.git
cd rentcar
```

### 2. Install dependensi PHP

```bash
composer install
```

### 3. Install dependensi Node.js

```bash
npm install
```

### 4. Konfigurasi environment

```bash
cp .env.example .env
php artisan key:generate
```

### 5. Setup database

Secara default menggunakan SQLite. Pastikan file database tersedia:

```bash
touch database/database.sqlite
```

Jika ingin menggunakan MySQL, ubah konfigurasi di `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=rental_mobil
DB_USERNAME=root
DB_PASSWORD=
```

Kemudian jalankan migrasi:

```bash
php artisan migrate
```

Atau jika ingin menggunakan data awal dari file SQL yang tersedia:

```bash
mysql -u root -p rental_mobil < rental_mobil.sql
```

### 6. Buat akun admin

```bash
php artisan make:filament-user
```

Ikuti instruksi untuk mengisi nama, email, dan password.

### 7. Build assets

```bash
npm run build
```

### 8. Jalankan aplikasi

```bash
php artisan serve
```

Akses aplikasi di `http://localhost:8000`

---

## Menjalankan Mode Development

Untuk development dengan hot-reload, jalankan kedua perintah berikut secara bersamaan di terminal terpisah:

```bash
php artisan serve
npm run dev
```

Atau gunakan perintah berikut sekaligus (membutuhkan `concurrently`):

```bash
composer run dev
```

---

## Akses Panel Admin

Setelah aplikasi berjalan, akses panel admin di:

```
http://localhost:8000/admin
```

Login menggunakan akun yang sudah dibuat sebelumnya.

---

## Struktur Direktori Utama

```
app/
├── Filament/
│   ├── Resources/
│   │   ├── Bookings/       # Resource manajemen booking
│   │   └── Vehicles/       # Resource manajemen kendaraan
│   └── Widgets/
│       ├── BookingStats.php  # Statistik booking
│       └── VehicleStats.php  # Statistik kendaraan
├── Models/
│   ├── Booking.php
│   └── Vehicle.php
database/
├── migrations/             # Migrasi database
└── seeders/                # Seeder data awal
```

---

## Lisensi

Proyek ini menggunakan lisensi [MIT](https://opensource.org/licenses/MIT).
