<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laporan Laravel Filament

## Chaerul Cahyadi

## 4523210120

## Installation

### 1. Buat Proyek Laravel Baru

1. Buat Proyek Kosong

    ```
    laravel new smpmentari_filament
    ```

2. Masuk ke Direktori Laravel smpmentari_filament

    ```
    cd smpmentari_filament
    ```

3. Coba Jalankan Server Untuk Uji Coba

    ```
    php artisan serve
    ```

### 2. Konfigurasi Database

1. Buka Aplikasi Service Kesayangan Kalian & Siapkan DB
    - Bisa pake MAMP, XAMPP
2. Konfigurasi .env
    - Buka file .env di root proyek, sesuaikan dengan berikut :
      ```
      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=8889
      DB_DATABASE=smpmentari_filament
      DB_USERNAME=root
      DB_PASSWORD=root
      ```
3. Migrasi Awal
    - Jika belum ada database smpmentari_filament, ketik yes untuk membuat database
        ```
        php aritisan migrate
        ```

### 3. Install Filament

1. Pasang Paket Filament

    ```
    composer require "filament/filament"
    ```

2. Generate Panel Admin

    ```
    php artisan filament:install --panels
    ```
    `- Panel ID = admin`

3. Buat Akun Filament

    ```
    php artisan make:filament-user
    ```
    ```
    - nama : root
    - email : root@email.com
    - password : root
    ```

4. Link Storage Untuk Upload
    - Jalankan server php artisan serve buka di browser 127.0.0.1:8000/admin
    ```
    php artisan storage:link
    ```

### 4. Desain Data Minimal (Tema SMP Mentari)

-   Kita pakai dua entitas untuk CRUD latihan:
    1.  kegiatan : judul, tanggal, ringkasan, isi, foto
    2.  siswa : nisn, nama, jenis_kelamin, kelas, tanggal_lahir, alamat

- Buat Model + Migrasi

    ```
    php artisan make:model Kegiatan -m
    ```
    ```
    php artisan make:model Siswa -m
    ```

- Edit Migrasi :

    1. di file proyek `database/migrations/xxxx_xx_xx_xxxxxx_create_kegiatans_table.php`

        ```
        public function up(): void
        {
            Schema::create('kegiatans', function (Blueprint $table) {
                $table->id();
                $table->string('judul');
                $table->date('tanggal');
                $table->string('ringkasan')->nullable();
                $table->text('isi')->nullable();
                $table->string('foto')->nullable(); // path gambar
                $table->timestamps();
            });
        }
        ```

    2. di file proyek `database/migrations/xxxx_xx_xx_xxxxxx_create_siswas_table.php`

        ```
        public function up(): void
        {
            Schema::create('siswas', function (Blueprint $table) {
                $table->id();
                $table->string('nisn')->unique();
                $table->string('nama');
                $table->enum('jenis_kelamin', ['L', 'P']);
                $table->string('kelas'); // contoh: 7A, 8B, 9C
                $table->date('tanggal_lahir')->nullable();
                $table->text('alamat')->nullable();
                $table->timestamps();

            });
        }
        ```

- Jalakan migrasi

    ```
    php artisan migrate
    ```

### 5. Generate Filament Resource (CRUD Otomatis)

1. Filament akan membuat halaman List / Create / Edit lengkap.

    ```
    php artisan make:filament-resource Kegiatan --generate
    ```
    ```
    php artisan make:filament-resource Siswa --generate
    ```

    Perintah di atas membuat:

    -   `app/Filament/Resources/KegiatanResource.php`
    -   `app/Filament/Resources/KegiatanResource/Pages/{Create,Edit,List}Kegiatans.php`
    -   `app/Filament/Resources/SiswaResource.php`
    -   `app/Filament/Resources/SiswaResource/Pages/{Create,Edit,List}Siswas.php`

2.  Form & Tabel KegiatanResource

    Edit `app/Filament/Resources/KegiatanResource.php` bagian `form()` dan `table()` contoh minimal:
    1. `KegiatanResource.php`
    2. `KegiatanForm.php`
    3. `KegiatanTable.php`

3. Form & Tabel SiswaResource

    1. `SiswaResource.php`
    2. `SiswaTable.php`
    3. `SiswaForm.php`
    4. `App\Models\Kegiatan.php`
    5. `App\Models\Siswa.php`

### 6. Branding Panel : Identitas SMP Mentari

-   Buka `app/Providers/Filament/AdminPanelProvider.php` dan sesuaikan:
    ```
    ->brandName('SMP Mentari')
    ->navigationGroups([
        'Akademik', 'Publikasi'
    ])
    ->sidebarCollapsibleOnDesktop(true);
    ```

### 7. Halaman Depan (Public) yang Simple

-   Walau fokus praktikum adalah Filament (admin), tambahkan landing page publik agar konteks sekolah terasa.

    1. Route

        ```
        Route::get('/', function () {
            return view('welcome');
        });

        Route::get('/kegiatan', function () {
            return view('kegiatan-public', [
                'items' => \App\Models\Kegiatan::latest()->paginate(9),
            ]);
        });
        ```

-   View `resources/views/kegiatan-public.blade.php`
-   View `resources/views/layouts/app.blade.php`
-   Pastikan sudah menjalankan `php artisan storage:link` agar gambar dari `FileUpload` tampil di halaman publik.

### 8. Menjalankan Aplikasi

1. Terminal 1 (Laravel)

    ```
    php artisan serve
    ```

    Buka:

    -   Admin: http://localhost:8000/admin (CRUD Kegiatan & Siswa)
    -   Publik: http://localhost:8000/kegiatan

### 9. Screenshot Hasil Running

1. Halaman Utama `/`
    <img width="1470" height="924" alt="Image" src="https://github.com/user-attachments/assets/3ab04ee9-3599-4180-b064-de0ef00bf82c" />

2. Halaman Kegiatan (Publik) `/kegiatan`
    <img width="1470" height="924" alt="Image" src="https://github.com/user-attachments/assets/c0ba0268-acd2-43f0-85bc-0457d05ea56e" />

3. Halaman Login `/admin/login`
    <img width="1470" height="924" alt="Image" src="https://github.com/user-attachments/assets/804b3eab-0830-4255-b9a8-99d2725641e4" />

4. Halaman Dashboard Admin `/admin`
    <img width="1470" height="924" alt="Image" src="https://github.com/user-attachments/assets/2586c71f-2ef9-427b-a215-edbcd9ee8b0e" />

5. Halaman Siswa `/admin/siswas`
    <img width="1470" height="924" alt="Image" src="https://github.com/user-attachments/assets/47ec1e8b-5d59-467a-aec1-7b142ea39cc9" />

6. Halaman Tambah Siswa `/admin/siswas/create` 
    <img width="1470" height="924" alt="Image" src="https://github.com/user-attachments/assets/2a3a1eb9-f413-4568-8029-eb1a462b0007" />
    <img width="1470" height="924" alt="Image" src="https://github.com/user-attachments/assets/68404438-871c-4e73-8d44-05f4d72aeca8" />

7. Halaman Detail Siswa `/admin/siswas/{record}`
    <img width="1470" height="924" alt="Image" src="https://github.com/user-attachments/assets/7b0fff6c-c617-4e4d-ae03-f54ccef49409" />

8. Halaman Edit Siswa `/admin/siswas/{record}/edit`
    <img width="1470" height="924" alt="Image" src="https://github.com/user-attachments/assets/d3a52148-24f2-4b2a-9be6-aacb99f5fef3" />

9. Halaman Delete Siswa `/admin/siswas/{record}/edit`
    <img width="1470" height="924" alt="Image" src="https://github.com/user-attachments/assets/31c78169-120e-43b6-9fa8-05c1e91eac18" />
    <img width="1470" height="924" alt="Image" src="https://github.com/user-attachments/assets/86f7b670-df4e-4582-bb56-73d52f170c08" />

10. Halaman Kegiatan `/admin/kegiatans`
    <img width="1470" height="924" alt="Image" src="https://github.com/user-attachments/assets/7259ba97-e48c-4d01-a656-a9e8c8e72555" />

11. Halaman Tambah Kegiatan `/admin/kegiatans/create` 
    <img width="1470" height="924" alt="Image" src="https://github.com/user-attachments/assets/600ee61a-be93-4996-8d0c-8e49e945ffe4" />
    <img width="1470" height="924" alt="Image" src="https://github.com/user-attachments/assets/5b3ef7cf-14c2-402d-b18b-d67cb85d71ac" />

12. Halaman Detail Kegiatan `/admin/kegiatans/{record}`
    <img width="1470" height="924" alt="Image" src="https://github.com/user-attachments/assets/55c8a503-b194-4088-bca1-eedd0466ec4c" />

13. Halaman Edit Kegiatan `/admin/kegiatans/{record}/edit`
    <img width="1470" height="924" alt="Image" src="https://github.com/user-attachments/assets/e19703dc-f9aa-444e-afbd-7b1ee294359b" />
    <img width="1470" height="924" alt="Image" src="https://github.com/user-attachments/assets/1b6cc34f-511a-4244-81ef-f474cf478c5c" />

14. Halaman Delete Kegiatan `/admin/kegiatans/{record}/edit`
    <img width="1470" height="924" alt="Image" src="https://github.com/user-attachments/assets/47cd2f94-d0a1-48c4-b125-5f8f37ad52d1" />
    <img width="1470" height="924" alt="Image" src="https://github.com/user-attachments/assets/b6e5aa2a-2ad1-4978-ae01-c2bfc4278d92" />