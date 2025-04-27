Manajemen Inventory
Tentang Proyek

Vent adalah aplikasi manajemen inventaris berbasis web yang dirancang untuk membantu perusahaan dalam mengelola dan memantau inventaris barang secara efektif.
Dibangun menggunakan Laravel dan Filament untuk backend dan dashboard admin yang dinamis, serta DaisyUI (TailwindCSS) untuk landing page yang modern dan responsif.

Aplikasi ini bertujuan untuk:

    Memudahkan pencatatan keluar-masuk barang

    Memantau ketersediaan stok secara real-time

    Meningkatkan efisiensi pengelolaan inventaris perusahaan

Fitur Utama

    CRUD Data Item

    CRUD Data Kategori

    CRUD Data Supplier

    CRUD Data User Admin

    Tabel ringkasan stok barang:

        Total stok

        Total nilai stok

        Rata-rata harga barang

    Tabel barang dengan stok di bawah ambang batas

    Laporan barang berdasarkan kategori

    Ringkasan per kategori dan per pemasok

    Ringkasan keseluruhan inventaris

Technology Stack

    Laravel – PHP Framework

    MySQL – Relational Database Management System

    Nginx – Web Server

    Docker – Containerization Platform

Prasyarat

Pastikan sistem Anda telah menginstal:

    Docker Desktop (Windows/MacOS) atau

    Docker dan docker-compose package (Linux)

Panduan Instalasi
1. Clone Project

git clone https://github.com/FadhilFirmansyah/container-inventory.git

Clone project ke direktori aktif Anda.
2. Pindah ke Direktori Project

cd container-inventory

3. Install Project
3.1. Linux & MacOS (UNIX)

Jalankan skrip otomatis:

./setup.sh

3.2. Windows

Karena setup.sh tidak bisa langsung dijalankan di Windows (tanpa WSL), ikuti langkah manual:
3.2.1. Compose Up

docker-compose up -d --build

3.2.2. Ubah Izin Akses Folder

docker-compose exec app chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache

3.2.3. Install Dependency Frontend

docker exec laravel_app npm install

3.2.4. Build Frontend

docker exec laravel_app npm run build

3.2.5. Install Dependency Backend

docker exec laravel_app composer install

3.2.6. Duplikat File ENV

docker exec laravel_app cp .env.example .env

3.2.7. Generate Key Laravel

docker exec laravel_app php artisan key:generate

3.2.8. Ubah Konfigurasi Database di .env

Sebelum:

DB_HOST=127.0.0.1
DB_PORT=3306
DB_USERNAME=root
DB_PASSWORD=

Sesudah:

DB_HOST=db
DB_PORT=3306
DB_USERNAME=root
DB_PASSWORD=root

3.2.9. Migrasi dan Seed Database

docker exec laravel_app php artisan migrate --seed

Credential Login

    Username: admin

    Email: admin@gmail.com

    Password: sudo

Troubleshooting

Jika muncul error saat menjalankan:

docker exec laravel_app php artisan migrate --seed

Solusi:

    Ubah DB_HOST di .env menjadi:

DB_HOST=mysql_db

    Sesuaikan docker-compose.yml:

app:
  build:
    context: .
    dockerfile: Dockerfile
  container_name: laravel_app
  restart: always
  working_dir: /var/www/html
  volumes:
    - ./inventory-project:/var/www/html
  depends_on:
    - db
  networks:
    - app-network

db:
  image: mysql:8.0
  container_name: mysql_db
  restart: always
  environment:
    MYSQL_ROOT_PASSWORD: root
    MYSQL_DATABASE: inventory
  ports:
    - "3307:3306"
  volumes:
    - db_data:/var/lib/mysql
  healthcheck:
    test: ["CMD", "mysqladmin", "ping", "-proot"]
    interval: 10s
    timeout: 5s
    retries: 5
  networks:
    - app-network

    Lalu jalankan ulang perintah migrate & seed.

Struktur Arsitektur Aplikasi
File/Folder	Deskripsi
docker-compose.yml	Konfigurasi multi-container Docker
Dockerfile	Instruksi untuk membangun image Laravel
inventory-project/	Source code aplikasi Vent
nginx.conf	Konfigurasi server Nginx
setup.sh	Skrip otomatis setup environment
License

This project is open-source and free to use.
