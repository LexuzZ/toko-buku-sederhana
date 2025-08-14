
# Proyek Toko Buku Sederhana
[![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com/)
[![PHP](https://img.shields.io/badge/PHP-%5E8.2-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-8.x-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)](LICENSE)

Proyek ini adalah aplikasi web sederhana yang dibangun dengan Laravel untuk mengelola koleksi buku di sebuah toko buku. Aplikasi ini memungkinkan pemilik toko untuk melacak buku, penulis, dan rating, serta menampilkan data buku terpopuler dan penulis paling terkenal untuk membantu memberikan rekomendasi kepada pelanggan.


## Features

- Daftar Buku: Halaman utama yang menampilkan buku-buku terpopuler.
- Top 10 Penulis: Halaman yang menampilkan peringkat penulis.
- Beri Rating: Formulir untuk mengirimkan rating buku baru.


## Clone Repositori

Buka terminal Anda dan clone repositori ini ke direktori lokal Anda.

```bash
  git clone [URL_REPOSITORI_ANDA]
  cd Book
```
    
## Install Dependensi PHP

Jalankan Composer untuk menginstal semua dependensi PHP yang diperlukan oleh Laravel.

```bash
  composer install
```
## Buat File Environment

Salin file `.env.example` menjadi `.env.` File ini akan berisi semua konfigurasi spesifik untuk lingkungan Anda.

```bash
  cp .env.example .env
```
## Generate Kunci Aplikasi

Setiap aplikasi Laravel membutuhkan kunci enkripsi yang unik. Jalankan perintah berikut untuk membuatnya.

```bash
  php artisan key:generate
```
## Konfigurasi Database

Buka file `.env` yang baru Anda buat dan perbarui pengaturan koneksi database sesuai dengan konfigurasi lokal Anda.

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=toko_buku
DB_USERNAME=root
DB_PASSWORD=
```
## Jalankan Migrasi dan Seeding

Perintah ini akan membuat semua tabel yang diperlukan di database Anda dan mengisinya dengan data sampel dalam jumlah besar.

```bash
php artisan migrate:fresh --seed
```
## Jalankan Server Pengembangan

Setelah semua langkah di atas berhasil, jalankan server pengembangan lokal Laravel.

```bash
php artisan serve
```
## Buka Aplikasi

Buka browser Anda dan kunjungi alamat `http://127.0.0.1:8000`. Aplikasi toko buku Anda sekarang sudah siap untuk diuji.
    
## Tech Yang Digunakan

**Client:** Blade, TailwindCSS

**Server:** Node, Laravel, MySQL


## 🚀 About Me
Perkenalkan nama saya **Haerul Taka**.

Saya alumni Mahasiswa **Telkom University Surabaya**

Jika kamu tertarik untuk berkenalan denganku, silakan ikuti akun [Linkedin](https://www.linkedin.com/in/haerul-taka-b55656204/) aku ya.


## 🛠 Skills

### 💻 Programming Languages
[![PHP](https://img.shields.io/badge/PHP-%5E8.2-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![JavaScript](https://img.shields.io/badge/JavaScript-ES6+-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)](https://developer.mozilla.org/docs/Web/JavaScript)
[![TypeScript](https://img.shields.io/badge/TypeScript-5.x-3178C6?style=for-the-badge&logo=typescript&logoColor=white)](https://www.typescriptlang.org/)
[![Java](https://img.shields.io/badge/Java-11+-007396?style=for-the-badge&logo=java&logoColor=white)](https://www.java.com/)

### 🌐 Web Development
[![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)](https://developer.mozilla.org/docs/Web/HTML)
[![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)](https://developer.mozilla.org/docs/Web/CSS)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.x-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com/)
[![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3.x-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com/)
[![React](https://img.shields.io/badge/React-18.x-61DAFB?style=for-the-badge&logo=react&logoColor=black)](https://react.dev/)
[![Next.js](https://img.shields.io/badge/Next.js-14.x-000000?style=for-the-badge&logo=next.js&logoColor=white)](https://nextjs.org/)
[![Node.js](https://img.shields.io/badge/Node.js-18.x-339933?style=for-the-badge&logo=nodedotjs&logoColor=white)](https://nodejs.org/)

### 🗄️ Databases
[![MySQL](https://img.shields.io/badge/MySQL-8.x-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![MariaDB](https://img.shields.io/badge/MariaDB-10.x-003545?style=for-the-badge&logo=mariadb&logoColor=white)](https://mariadb.org/)
[![PostgreSQL](https://img.shields.io/badge/PostgreSQL-15.x-4169E1?style=for-the-badge&logo=postgresql&logoColor=white)](https://www.postgresql.org/)
[![SQLite](https://img.shields.io/badge/SQLite-3-003B57?style=for-the-badge&logo=sqlite&logoColor=white)](https://www.sqlite.org/)

### ⚙️ Frameworks & Backend
[![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com/)
[![Livewire](https://img.shields.io/badge/Livewire-3.x-4E56A6?style=for-the-badge&logo=laravel&logoColor=white)](https://livewire.laravel.com/)
[![Express.js](https://img.shields.io/badge/Express.js-4.x-000000?style=for-the-badge&logo=express&logoColor=white)](https://expressjs.com/)
[![GraphQL](https://img.shields.io/badge/GraphQL-16.x-E10098?style=for-the-badge&logo=graphql&logoColor=white)](https://graphql.org/)

### 🛠 Tools & Others
[![Composer](https://img.shields.io/badge/Composer-2.x-885630?style=for-the-badge&logo=composer&logoColor=white)](https://getcomposer.org/)
[![NPM](https://img.shields.io/badge/NPM-9.x-CB3837?style=for-the-badge&logo=npm&logoColor=white)](https://www.npmjs.com/)
[![Git](https://img.shields.io/badge/Git-F05032?style=for-the-badge&logo=git&logoColor=white)](https://git-scm.com/)
[![GitHub](https://img.shields.io/badge/GitHub-181717?style=for-the-badge&logo=github&logoColor=white)](https://github.com/)
[![VS Code](https://img.shields.io/badge/VS%20Code-007ACC?style=for-the-badge&logo=visual-studio-code&logoColor=white)](https://code.visualstudio.com/)
[![Postman](https://img.shields.io/badge/Postman-10.x-FF6C37?style=for-the-badge&logo=postman&logoColor=white)](https://www.postman.com/)
[![Docker](https://img.shields.io/badge/Docker-24.x-2496ED?style=for-the-badge&logo=docker&logoColor=white)](https://www.docker.com/)
## Authors

- [@LexuzZ](https://www.github.com/LexuzZ)

