#!/bin/sh

# Install Laravel dependencies
composer install --no-interaction --prefer-dist --optimize-autoloader
npm install
npm run build

# Set permissions
chmod -R 775 storage bootstrap/cache

# Generate app key
php artisan key:generate

# Cache konfigurasi Laravel
php artisan config:clear
php artisan view:clear
php artisan route:clear
php artisan cache:clear
rm -rf bootstrap/cache/*.php


# Jalankan migrasi (opsional)
php artisan migrate --force

# Start server
php artisan serve --host=0.0.0.0 --port=8080
