@echo off
setlocal
cd /d "%~dp0"
title PINKMIC RECORDS - Setup

where php >nul 2>nul
if errorlevel 1 (
  echo [ERROR] PHP tidak ditemukan di PATH. Install PHP 8.2+ atau tambahkan PHP XAMPP ke PATH.
  pause
  exit /b 1
)
where composer >nul 2>nul
if errorlevel 1 (
  echo [ERROR] Composer tidak ditemukan. Install dari https://getcomposer.org
  pause
  exit /b 1
)

echo [1/4] composer install...
call composer install --no-interaction
if errorlevel 1 (
  echo [ERROR] composer install gagal.
  pause
  exit /b 1
)

if not exist "database\database.sqlite" type nul > "database\database.sqlite"

if not exist ".env" (
  copy ".env.example" ".env" >nul
  call php artisan key:generate --force
)

echo [2/4] Bersihkan cache lama...
call php artisan optimize:clear

echo [3/4] Migrasi database + data demo...
call php artisan migrate:fresh --seed --force
if errorlevel 1 (
  echo [ERROR] migrate gagal. Pastikan extension pdo_sqlite aktif di php.ini
  pause
  exit /b 1
)

echo [4/4] Selesai! Jalankan run.bat untuk memulai server.
pause
