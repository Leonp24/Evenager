#!/bin/sh

# HAPUS build sebelumnya
rm -rf public/build

# Install Laravel dependencies
composer install --no-interaction --prefer-dist --optimize-autoloader
npm install
npm run build

# Set permissions
chmod -R 775 storage bootstrap/cache

# Generate app key
php artisan key:generate

# Cache Laravel
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Jalankan migrasi
php artisan migrate --force

# Start Laravel server
php artisan serve --host=0.0.0.0 --port=8080
