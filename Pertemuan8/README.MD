Here’s a clean and interactive README to help you download and set up Laravel! 🚀  

---

# 🚀 Panduan Instalasi dan Penggunaan Laravel  

Halo, teman-teman! 👋 Di README ini, kita akan belajar cara mendownload, menginstal, dan menjalankan **Laravel**, salah satu framework PHP terbaik untuk pengembangan web. Let’s go! 💻✨  

---

## 🛠 Prasyarat  

Sebelum memulai instalasi, pastikan kamu sudah menginstal:  

- 🐘 **PHP** (minimal versi 8.1) — [Download PHP](https://www.php.net/downloads.php)  
- 🐱‍💻 **Composer** (Dependency Manager PHP) — [Download Composer](https://getcomposer.org/download/)  
- 🐬 **XAMPP** atau **Laragon** (Opsional, untuk server lokal) — [Download XAMPP](https://www.apachefriends.org/download.html) atau [Download Laragon](https://laragon.org/download/)  

---

## 🧑‍💻 Instalasi Laravel  

1️⃣ **Buka Terminal/Command Prompt**  
Kita akan mulai dengan membuka terminal atau CMD di komputer kamu. Pastikan Composer sudah terinstal dengan mengecek:  

```bash
composer --version
```

2️⃣ **Masuk ke Folder Proyek**  
Arahkan direktori ke tempat di mana kamu ingin membuat proyek Laravel:  

```bash
cd path/ke/folder/proyek
```

3️⃣ **Buat Proyek Laravel Baru**  
Gunakan perintah Composer untuk membuat proyek Laravel:  

```bash
composer create-project --prefer-dist laravel/laravel nama-proyek
```

Contoh:  

```bash
composer create-project --prefer-dist laravel/laravel laravel-app
```

4️⃣ **Masuk ke Direktori Proyek**  

```bash
cd laravel-app
```

5️⃣ **Jalankan Server Laravel**  

Laravel punya development server bawaan, cukup jalankan perintah ini:  

```bash
php artisan serve
```

Server akan berjalan di `http://localhost:8000`. Buka di browser dan lihat proyek Laravel pertama kamu berjalan! 🎉  

---

## 🏗️ Struktur Folder Laravel  

| Folder/File         | Fungsi                              |  
|---------------------|------------------------------------|  
| `app/`               | Berisi logika utama aplikasi       |  
| `routes/`            | Mengelola rute aplikasi            |  
| `resources/views/`   | Menyimpan file tampilan (Blade)    |  
| `public/`            | Direktori file statis (CSS, JS)    |  
| `.env`               | Konfigurasi environment            |  

---

## ⚡ Perintah Dasar Laravel  

🔹 **Membuat Controller**  

```bash
php artisan make:controller NamaController
```

🔹 **Membuat Model**  

```bash
php artisan make:model NamaModel
```

🔹 **Membuat Migration**  

```bash
php artisan make:migration create_nama_table
```

🔹 **Menjalankan Migration**  

```bash
php artisan migrate
```

🔹 **Clear Cache**  

```bash
php artisan cache:clear
```

---

## 🎉 Menjalankan Laravel dengan XAMPP/Laragon  

Jika kamu menggunakan XAMPP atau Laragon:  

1️⃣ **Pastikan Apache dan MySQL Berjalan**  
2️⃣ **Buat Database Baru di phpMyAdmin**  
3️⃣ **Konfigurasi Database di `.env`**  

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
```

4️⃣ **Jalankan Migration**  

```bash
php artisan migrate
```

---

## 🐱‍🏍 Troubleshooting  

🔸 **Composer Not Recognized**  
Pastikan path Composer sudah ditambahkan ke environment variables.  

🔸 **Port 8000 Sudah Digunakan**  
Jalankan server di port lain:  

```bash
php artisan serve --port=8080
```

---

## 💡 Penutup  

Selamat! 🎉 Kamu sudah berhasil menginstal dan menjalankan Laravel. Terus eksplorasi fitur-fitur keren dari framework ini dan bangun proyek yang luar biasa! Kalau ada masalah atau pertanyaan, jangan ragu buat tanya. 💪  

Happy coding! 💻✨  

---  

**🧑‍🏫 Owen Limantoro**  
*LNT Backend Instructor | BNCC Praetorian*  