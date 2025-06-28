#!/bin/sh

# Jalankan migrasi dan cache config (opsional)
php artisan migrate --force
php artisan config:cache

# Jalankan server Laravel
php artisan serve --host=0.0.0.0 --port=8080
