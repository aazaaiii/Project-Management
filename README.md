# JOELL_PROJECT

### Website Manajemen Renovasi Rumah

## Tentang Proyek

JOELL_PROJECT adalah aplikasi berbasis website untuk membantu pengelolaan layanan renovasi rumah, mulai dari penyampaian informasi layanan, booking konsultasi, pengelolaan pelanggan, manajemen proyek renovasi, pemantauan progres pekerjaan, pembayaran, hingga dokumentasi hasil pekerjaan melalui portofolio.

Aplikasi ini memiliki pembagian hak akses berdasarkan peran pengguna:

| Peran | Tanggung Jawab |
|---|---|
| Admin | Mengelola data pelanggan, booking, proyek, progres, pembayaran, portofolio, dan testimoni |
| Customer | Melakukan booking konsultasi, melihat informasi proyek, memantau progres, dan melihat pembayaran |
| Pengunjung | Melihat informasi perusahaan, layanan, portofolio, dan testimoni |

## Fitur Utama

- Website profil perusahaan dan informasi layanan renovasi rumah.
- Registrasi dan login customer.
- Dashboard admin dan customer berdasarkan hak akses.
- Booking konsultasi renovasi rumah.
- Manajemen data pelanggan.
- Manajemen proyek renovasi.
- Pemantauan status dan progres proyek.
- Upload foto perkembangan proyek.
- Manajemen pembayaran.
- Manajemen portofolio hasil renovasi.
- Manajemen testimoni pelanggan.
- Pembatasan akses halaman berdasarkan role pengguna.

## Penjelasan Fitur Berdasarkan Hak Akses

JOELL_PROJECT menyediakan fitur berdasarkan kebutuhan masing-masing pengguna, yaitu Admin, Customer, dan Pengunjung. Setiap pengguna memiliki hak akses dan fungsi yang berbeda.

## 1. Pengunjung

Pengunjung merupakan pengguna yang belum login dan dapat mengakses informasi umum mengenai JOELL_PROJECT.

### Beranda

Menampilkan informasi utama perusahaan, gambaran layanan renovasi, serta bagian-bagian penting untuk membantu pengunjung mengenal JOELL_PROJECT.

### Tentang Kami

Menampilkan informasi mengenai perusahaan, profil, dan gambaran usaha renovasi rumah.

### Layanan

Menampilkan jenis layanan renovasi rumah yang tersedia beserta informasi dan deskripsinya.

### Cara Kerja

Menjelaskan tahapan proses layanan renovasi, mulai dari konsultasi hingga penyelesaian pekerjaan.

### Portofolio

Menampilkan dokumentasi hasil pekerjaan renovasi yang telah dilakukan. Portofolio dapat dikelompokkan berdasarkan kategori:

- Rumah 2 Lantai
- Interior
- Kitchen Set
- Kamar Mandi
- Lainnya

### Testimoni

Menampilkan ulasan dan pengalaman pelanggan terhadap layanan JOELL_PROJECT.

### Booking Konsultasi

Menyediakan akses bagi pengunjung untuk melakukan booking konsultasi dengan membuat akun atau login terlebih dahulu.

## 2. Admin

Admin bertanggung jawab mengelola data dan aktivitas yang berlangsung dalam aplikasi JOELL_PROJECT.

### Dashboard Admin

Menampilkan ringkasan informasi operasional, seperti:

- Total customer.
- Total booking.
- Total proyek.
- Proyek yang sedang dikerjakan.
- Informasi booking berdasarkan status.

Dashboard membantu admin memantau aktivitas aplikasi melalui satu halaman.

### Manajemen Customer

Digunakan untuk melihat dan mengelola data pelanggan yang telah terdaftar dalam sistem.

Data customer berkaitan dengan informasi akun dan identitas pelanggan yang dibutuhkan dalam proses booking dan pengelolaan proyek.

### Manajemen Booking

Digunakan untuk melihat dan mengelola permintaan booking konsultasi dari customer.

Informasi booking meliputi:

- Nama customer.
- Email.
- Nomor WhatsApp.
- Alamat.
- Jenis layanan.
- Tanggal survey.
- Pesan atau keterangan.
- Status booking.

Admin dapat memantau dan memperbarui status booking sesuai proses penanganannya.

### Manajemen Proyek

Digunakan untuk mengelola proyek renovasi yang dikerjakan untuk customer.

Admin dapat mengatur informasi proyek, menghubungkan proyek dengan customer, serta memperbarui informasi dan status pengerjaan.

### Manajemen Progres Proyek

Digunakan untuk mencatat perkembangan pekerjaan renovasi.

Admin dapat mengelola informasi progres dan dokumentasi foto agar customer dapat mengetahui perkembangan proyeknya.

### Manajemen Pembayaran

Digunakan untuk mengelola informasi pembayaran proyek renovasi, termasuk pencatatan dan pemantauan status pembayaran.

### Manajemen Portofolio

Digunakan untuk mengelola dokumentasi hasil pekerjaan renovasi yang ditampilkan pada halaman publik.

Informasi portofolio meliputi:

- Judul portofolio.
- Kategori.
- Deskripsi.
- Lokasi.
- Luas bangunan.
- Tahun pengerjaan.
- Status publikasi.
- Thumbnail.
- Galeri foto.

### Manajemen Testimoni

Digunakan untuk mengelola testimoni pelanggan yang akan ditampilkan pada halaman website.

## 3. Customer

Customer merupakan pengguna yang telah memiliki akun dan dapat mengakses dashboard pelanggan.

### Registrasi dan Login

Customer dapat membuat akun dan login untuk menggunakan fitur yang tersedia pada dashboard.

### Dashboard Customer

Menampilkan informasi mengenai aktivitas customer, seperti booking konsultasi dan informasi proyek renovasi yang sedang dikerjakan.

### Booking Konsultasi

Customer dapat mengajukan konsultasi renovasi dengan mengisi informasi:

- Jenis layanan.
- Tanggal survey.
- Pesan tambahan jika diperlukan.

Informasi identitas customer diambil dari akun yang sedang login sehingga tidak perlu diisi kembali.

### Informasi Proyek

Customer dapat melihat informasi proyek renovasi yang terhubung dengan akunnya.

### Progres Proyek

Customer dapat memantau perkembangan pekerjaan renovasi berdasarkan informasi progres dan dokumentasi foto yang diberikan admin.

### Informasi Pembayaran

Customer dapat melihat informasi pembayaran yang berkaitan dengan proyek renovasinya.

### Testimoni

Customer dapat memberikan ulasan mengenai pengalaman menggunakan layanan JOELL_PROJECT.

## Bahasa Pemrograman dan Teknologi

| Teknologi | Keterangan |
|---|---|
| PHP | Bahasa pemrograman backend |
| Laravel | Framework pengembangan aplikasi |
| MySQL | Sistem manajemen database |
| HTML | Struktur halaman website |
| CSS | Pengaturan tampilan website |
| JavaScript | Interaksi pada halaman website |
| Blade | Template engine Laravel |

## Struktur Proyek

```text
Project-Management/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Middleware/
│   │   └── Requests/
│   └── Models/
├── bootstrap/
├── config/
├── database/
│   ├── migrations/
│   └── seeders/
├── public/
├── resources/
│   └── views/
│       ├── admin/
│       ├── customer/
│       ├── layouts/
│       └── public/
├── routes/
│   └── web.php
├── storage/
├── tests/
├── .env.example
├── .gitignore
├── artisan
├── composer.json
└── README.md
```

## Kebutuhan Sistem

- Windows 10 atau Windows 11.
- PHP 8.3 atau versi yang sesuai dengan kebutuhan project.
- Composer.
- MySQL.
- Node.js dan NPM.
- Laragon atau web server lokal lainnya.
- Browser seperti Google Chrome atau Microsoft Edge.
- Visual Studio Code sebagai code editor.

## Cara Menjalankan Aplikasi

### 1. Clone Repository

```bash
git clone https://github.com/aazaaiii/Project-Management.git
```

### 2. Masuk ke Folder Project

```bash
cd Project-Management
```

### 3. Install Dependency

Install dependency Laravel menggunakan Composer dan dependency frontend menggunakan NPM.

```bash
composer install
npm install
```

### 4. Konfigurasi Environment

Salin file `.env.example` menjadi `.env`.

Untuk Windows CMD:

```bash
copy .env.example .env
```

Buat database dengan nama `projek_pkk` melalui MySQL atau phpMyAdmin.

Selanjutnya, sesuaikan konfigurasi database dan akun admin pada file `.env`.

```env
APP_NAME="JOELL PROJECT"
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=projek_pkk
DB_USERNAME=root
DB_PASSWORD=

ADMIN_EMAIL=
ADMIN_PASSWORD=
```

Isi `ADMIN_EMAIL` dan `ADMIN_PASSWORD` dengan email dan password admin yang ingin digunakan.

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Migrasi Database

Pastikan MySQL sudah berjalan, kemudian jalankan:

```bash
php artisan migrate --seed
```

Perintah ini digunakan untuk membuat tabel database dan menjalankan seeder.

### 7. Membuat Storage Link

```bash
php artisan storage:link
```

Perintah ini digunakan agar file gambar yang disimpan melalui Laravel dapat diakses dari halaman website.

### 8. Build Frontend

```bash
npm run build
```

Perintah ini digunakan untuk membangun aset frontend aplikasi.

### 9. Menjalankan Aplikasi

```bash
php artisan serve
```

Buka browser dan akses alamat berikut:

```text
http://127.0.0.1:8000
```

## Catatan

- Aplikasi menggunakan sistem autentikasi dengan pembagian hak akses Admin dan Customer.
- Pendaftaran akun admin tidak tersedia secara publik.
- Data layanan ditampilkan secara statis pada halaman website.
- Foto portofolio dan dokumentasi progres dikelola melalui dashboard admin.
- Konfigurasi rahasia aplikasi disimpan dalam file `.env` dan tidak disertakan dalam repository.
