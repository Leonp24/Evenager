#!/bin/sh

# Laravel & NPM deps
composer install --no-interaction --prefer-dist --optimize-autoloader
npm install
npm run build

# Rename manifest supaya Laravel bisa temukan
mv public/build/.vite/manifest.json public/build/manifest.json

php artisan migrate --force
php artisan db:seed --force


# Laravel perms
chmod -R 775 storage bootstrap/cache

# Laravel setup
php artisan key:generate
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force

# Start server
sleep 5
php artisan serve --host=0.0.0.0 --port=8080
