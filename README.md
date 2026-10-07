# PINKMIC RECORDS - Laravel 12

Website booking studio musik Makassar (User + Admin). Database SQLite, tanpa Node.js/NPM.

## Syarat
- PHP 8.2+ (extension: pdo_sqlite, sqlite3, mbstring, openssl, fileinfo, ctype, tokenizer, xml)
- Composer

## Cara jalan (Windows)
1. Extract ZIP, buka foldernya (yang berisi `composer.json` dan `artisan`).
2. Double-click `setup.bat` (sekali saja).
3. Double-click `run.bat` -> browser terbuka di http://127.0.0.1:8000

Atau manual lewat terminal di folder proyek:

```powershell
composer install
php artisan optimize:clear
php artisan migrate:fresh --seed
php artisan serve
```

(File `.env` sudah disertakan lengkap dengan APP_KEY.)

## Akun demo
- Admin: admin@pinkmic.test / password
- User : user@pinkmic.test / password

## Fitur
User: landing page, cari/filter studio, detail studio, booking (cek bentrok jadwal), riwayat, batalkan.
Admin: dashboard, CRUD studio, kelola booking (konfirmasi/tolak).
