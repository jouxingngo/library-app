# Library App

Selamat datang di proyek **Library App**! Aplikasi ini dibangun menggunakan **Laravel** dan dirancang untuk membantu pengelolaan perpustakaan. Aplikasi ini memungkinkan pengguna untuk meminjam buku, mengelola kategori buku, dan mengelola pengguna dalam sistem.

## Teknologi yang Digunakan

- **Laravel**: Framework PHP yang elegan dan kuat.
- **Spatie Role & Permission**: Untuk manajemen peran dan izin pengguna.
- **Laravel Breeze**: Untuk sistem autentikasi sederhana.
- **Bootstrap 4**: Untuk styling yang responsif dan modern.

## Fitur Utama

- **Dashboard Admin**: Melihat statistik pengguna, buku, kategori, dan peminjaman.
- **Manajemen Buku**: Menambahkan, mengedit, dan menghapus buku.
- **Manajemen Kategori**: Mengelola kategori buku.
- **Sistem Peminjaman**: Pengguna dapat meminjam buku dengan mudah.

## Cara Menjalankan

Untuk menjalankan aplikasi ini, silakan ikuti langkah-langkah di bawah ini:

1. **Clone Repository**:
   ```bash
   git clone https://github.com/jouxingngo/library-app.git
   cd library-app
2. **Instalasi Dependensi**:
   ```bash
   composer install
   npm install
   npm run dev
3. **Migrasi Database**:
   ```bash
   php artisan migrate
4. **Seeding Database**:
   ```bash
   php artisan db:seed --class=RolePermissionSeeder
   php artisan db:seed --class=UserSeeder
5. **Login ke Halaman Admin**:
    Anda dapat login ke halaman admin menggunakan kredensial berikut:
    - **Email**: `admin@example.com`
    - **Password**: `password`

## Kontak
Terima kasih telah mengunjungi proyek ini! Jika Anda memiliki pertanyaan atau umpan balik, jangan ragu untuk menghubungi saya di Instagram: [@jouxingngo](https://instagram.com/jouxing_ngo).
