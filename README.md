<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laporan Laravel Filament

## Syoba Ismaunun

## 4523210107

## Installation

# SMP Mentari - Laravel + Filament CRUD

Aplikasi manajemen sekolah sederhana menggunakan Laravel dan Filament Admin Panel. Dibangun sebagai modul praktikum untuk pembelajaran CRUD dengan tampilan admin yang modern.

## Fitur

- 📚 **Manajemen Kegiatan Sekolah**: CRUD lengkap untuk kegiatan dengan foto
- 👨‍🎓 **Manajemen Data Siswa**: Kelola data siswa dengan informasi lengkap (NISN, kelas, dll)
- 🎨 **Admin Panel Modern**: Menggunakan Filament v4 dengan UI yang responsif
- 🌐 **Halaman Publik**: Tampilan kegiatan sekolah untuk umum

## Tech Stack

- **Laravel 11+**
- **Filament v4** (Admin Panel)
- **MySQL/MariaDB**
- **Tailwind CSS**

## Persyaratan Sistem

- PHP 8.2+
- Composer 2.x
- Node.js 18+ & NPM
- MySQL/MariaDB
- Git (opsional)

## Instalasi

1. **Clone repository**
   ```bash
   git clone https://github.com/Faathir81/smpmentari-filament.git
   cd smpmentari-filament
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Konfigurasi environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Setup database**
   
   Edit file `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=smpmentari_filament
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Jalankan migrasi**
   ```bash
   php artisan migrate
   ```

6. **Link storage**
   ```bash
   php artisan storage:link
   ```

7. **Buat admin user**
   ```bash
   php artisan make:filament-user
   ```
   Ikuti prompt untuk membuat akun admin.

8. **Jalankan aplikasi**
   ```bash
   php artisan serve
   ```

## Akses Aplikasi

- **Admin Panel**: http://localhost:8000/admin
- **Halaman Publik**: http://localhost:8000/kegiatan

## Struktur Database

### Tabel Kegiatan
- judul
- tanggal
- ringkasan
- isi
- foto

### Tabel Siswa
- nisn (unique)
- nama
- jenis_kelamin (L/P)
- kelas
- tanggal_lahir
- alamat

## Pengembangan Lebih Lanjut

Proyek ini dapat dikembangkan dengan menambahkan:
- Manajemen guru dan staff
- Sistem absensi
- Nilai dan rapor
- Pengumuman sekolah
- Dashboard analytics

## Lisensi

Proyek ini dibuat untuk keperluan edukasi dan pembelajaran.

## Kontribusi

Silakan fork repository ini dan ajukan pull request untuk kontribusi.

## Kontak

Untuk pertanyaan atau diskusi, silakan buka issue di repository ini.

## Screenshot Hasil Running

1. Halaman Utama `/`
    ![WhatsApp Image 2025-11-07 at 19 18 09_334288ed](https://github.com/user-attachments/assets/ab4c3ecd-7059-463a-94cd-67f81e8b7412)


2. Halaman Dasboard `Dasboard`
   <img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/b31d26f5-d8ab-4f71-86eb-502d7d83a83d" />


3. Halaman Kegiatan `kegiatan`
   <img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/afc3f22e-ffc6-48fd-91f2-341cd5c46856" />


4. Halaman Siswa `Siswa`
   <img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/4092db98-0653-45ef-9397-c15b12528288" />


5. Halaman Creat Siswa
   <img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/ea1300e0-811e-406a-9432-399cb347c140" />

6. Halaman Creat Kegiatan
   <img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/640b1ff6-47ea-43e0-9b37-bcb7474c5ba5" />

7. Halaman Login
   ![WhatsApp Image 2025-11-07 at 19 19 33_a27aa5f5](https://github.com/user-attachments/assets/33324574-4d27-451d-9977-4d14dc3b1397)



