#!/bin/sh

# 1. Install Laravel dependencies
composer install --no-interaction --prefer-dist --optimize-autoloader

# 2. Install npm and build Vite assets
npm install
npm run build

# 3. Set permissions
chmod -R 775 storage bootstrap/cache

# 4. Generate app key (sebelum cache config)
php artisan key:generate

# 5. Clear & cache configurations AFTER key generated
php artisan config:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 6. Run migration (force mode for production)
php artisan migrate --force

# 7. Start Laravel dev server (Railway listens on port 8080)
php artisan serve --host=0.0.0.0 --port=8080
