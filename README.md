# Manajemen Inventory

## Tentang Proyek

Aplikasi manajemen inventaris berbasis web yang dirancang untuk membantu perusahaan dalam mengelola dan memantau inventaris barang secara efektif.  
Dibangun menggunakan Laravel dan Filament untuk backend dan dashboard admin.

Aplikasi ini bertujuan untuk:
- Menyelesaikan UTS backend

## Fitur Utama

- CRUD Data Item
- CRUD Data Kategori
- CRUD Data Supplier
- CRUD Data User Admin
- Tabel ringkasan stok barang:
  - Total stok
  - Total nilai stok
  - Rata-rata harga barang
- Tabel barang dengan stok di bawah ambang batas
- Laporan barang berdasarkan kategori
- Ringkasan per kategori dan per pemasok
- Ringkasan keseluruhan inventaris

## Technology Stack

- Laravel
- MySQL
- Docker

## Prasyarat

- Docker + docker-compose (Linux)

## Panduan Instalasi

### 1. Clone Project

```bash
git clone https://github.com/FadhilFirmansyah/container-inventory.git
```

### 2. Masuk ke Direktori Project

```bash
cd container-inventory
```

### 3. Install Project

#### Untuk Linux & MacOS

```bash
./setup.sh
```

#### Untuk Windows

##### 3.2.1. Jalankan docker-compose

```bash
docker-compose up -d --build
```

##### 3.2.2. Ubah permission storage dan cache

```bash
docker-compose exec app chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache
```

##### 3.2.3. Install Dependency Frontend

```bash
docker exec laravel_app npm install
```

##### 3.2.4. Build Frontend

```bash
docker exec laravel_app npm run build
```

##### 3.2.5. Install Dependency Backend

```bash
docker exec laravel_app composer install
```

##### 3.2.6. Copy file ENV

```bash
docker exec laravel_app cp .env.example .env
```

##### 3.2.7. Generate Key Laravel

```bash
docker exec laravel_app php artisan key:generate
```

##### 3.2.8. Edit konfigurasi .env

Sebelum:

```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_USERNAME=root
DB_PASSWORD=
```

Sesudah:

```
DB_HOST=db
DB_PORT=3306
DB_USERNAME=root
DB_PASSWORD=root_password
```

##### 3.2.9. Migrasi dan seeding database

```bash
docker exec laravel_app php artisan migrate --seed
```

## Credential Login

- Username: admin
- Email: admin@gmail.com
- Password: root_password

## Troubleshooting

Jika muncul error saat migrate & seed:

```bash
docker exec laravel_app php artisan migrate --seed
```

Lakukan langkah berikut:

### 1. Ubah `.env`

```dotenv
DB_HOST=mysql_db
```

### 2. Update `docker-compose.yml`

```yaml
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
```

Kemudian jalankan ulang migrate & seed.

## Struktur Arsitektur

| File/Folder         | Deskripsi                                |
|---------------------|------------------------------------------|
| docker-compose.yml  | Konfigurasi multi-container Docker       |
| Dockerfile           | Instruksi build image Laravel           |
| inventory-project/  | Source code aplikasi Vent                |

## License

This project is open-source and free to use.
