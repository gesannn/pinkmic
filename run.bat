@echo off
cd /d "%~dp0"
title PINKMIC RECORDS - Server
start "" http://127.0.0.1:8000
php artisan serve --host=127.0.0.1 --port=8000
