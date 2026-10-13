[Uploading readme_pertemuan_11_ecommerce_auth.md…]()
# 🛒 E-Commerce Auth System - Tugas Pemrograman Web (Pertemuan 11)

Repository ini berisi *source code* untuk tugas Pertemuan 11 mata kuliah **Pemrograman Web**. Proyek ini berfokus pada implementasi sistem autentikasi dan otorisasi pengguna (Login, Register, Logout, serta Proteksi Route) pada aplikasi E-Commerce menggunakan *framework* **Laravel**.

---

## 🚀 Fitur Utama

- **User Registration:** Pendaftaran akun baru pengguna dengan validasi input.
- **User Authentication (Login & Logout):** Sistem autentikasi aman berbasis sesi Laravel.
- **Route Protection & Middleware:** Pembatasan akses halaman khusus pengguna tersertifikasi/terautentikasi.
- **User Profile & Dashboard:** Halaman khusus pengguna setelah berhasil melakukan proses login.
- **Responsive Layout:** Antarmuka responsif yang disesuaikan untuk kenyamanan penggunaan di berbagai perangkat.

---

## 🛠️ Teknologi yang Digunakan

- **Framework:** Laravel 11/12
- **Language:** PHP 8.2+
- **Database:** MySQL / MariaDB
- **Styling:** Tailwind CSS / Bootstrap
- **Tools:** Composer, Git, VS Code

---

## 📁 Struktur Folder Utama

```text
TugasPemrogramanWeb-Pertemuan11-EcommerceAuth/
├── app/
│   ├── Http/
│   │   ├── Controllers/     # Logic autentikasi dan e-commerce
│   │   └── Middleware/      # Proteksi rute dan otorisasi
│   └── Models/              # Model database (User, Product, dll.)
├── database/
│   └── migrations/          # Schema tabel database
├── resources/
│   └── views/               # Blade templates (Login, Register, Dashboard)
├── routes/
│   └── web.php              # Pendaftaran rute aplikasi
└── README.md
```

---

## 💻 Panduan Menjalankan Proyek Secara Lokal

1. **Clone Repositori**
   ```bash
   git clone https://github.com/ValdoMilo/TugasPemrogramanWeb-Pertemuan11-EcommerceAuth.git
   cd TugasPemrogramanWeb-Pertemuan11-EcommerceAuth
   ```

2. **Instalasi Dependensi**
   ```bash
   composer install
   npm install && npm run build
   ```

3. **Konfigurasi Environment**
   Salin file `.env.example` menjadi `.env`:
   ```bash
   cp .env.example .env
   ```
   Atur koneksi database MySQL di file `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=tugas_p11_db
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Generate Application Key & Migrasi Database**
   ```bash
   php artisan key:generate
   php artisan migrate
   ```

5. **Jalankan Development Server**
   ```bash
   php artisan serve
   ```
   Akses aplikasi di browser melalui `http://127.0.0.1:8000`.

---

## 👨‍💻 Identitas Pembuat

- **Nama:** Revaldo Ginting
- **NIM:** 4253250033
- **Kelas:** PSIK 25B
- **Program Studi:** Ilmu Komputer
- **Fakultas:** FMIPA - Universitas Negeri Medan
- **GitHub:** [@ValdoMilo](https://github.com/ValdoMilo)
