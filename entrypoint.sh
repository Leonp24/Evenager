#!/bin/sh
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force
php -S 0.0.0.0:8080 -t public
