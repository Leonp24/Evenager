#!/bin/sh

# Install dependencies
composer install --no-dev --optimize-autoloader
npm install
npm run build

# Cache konfigurasi Laravel
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Jalankan migrasi (kalau perlu)
php artisan migrate --force

# Jalankan Laravel server
sleep 5
php artisan serve --host=0.0.0.0 --port=8080
