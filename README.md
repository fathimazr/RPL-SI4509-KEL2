<h1 align="center">GeoGridAlert</h1>

#### Kelompok 2 RPL
- Fathimah Azzahra
- Al Ferdaus Leon Wagge
- Daffa Haruki Daniswara
- Farah Helmi Triasmike
- Risma Pujiati
- Ryan Muhammad Satria

## Tech Stack
- Laravel 10.10
- Laravel Breeze : Auntentikasi dan Dashboard
- Tailwind CSS : Styling CSS (bawaan Laravel Breeze)
- PHPUnit : Testing

## Requirement
- PHP versi 8 ke atas
- Node.js versi 18 ke atas
- MySQL

## Instalasi
1. Install Dependency
```sh
composer install
npm install
npm run build
```
2. Rename file `.env.example` ke `.env`

3. Ubah pengaturan database pada file `.env` sesuai database masing-masing

```
...
DB_CONNECTION=mysql
DB_HOST=<host, kalo local pake 127.0.0.1>
DB_PORT=<port, sebelahnya tanda titik dua. biasanya 3306>
DB_DATABASE=<nama database>
DB_USERNAME=root
DB_PASSWORD=<kalo ada password>
...
```

4. Migrate (Untuk register dan Login)
```sh
php artisan migrate --seed
```

## Jalanin Project
```sh
php artisan serve
```
