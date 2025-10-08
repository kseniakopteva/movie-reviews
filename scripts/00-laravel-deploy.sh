#!/usr/bin/env bash
set -e

echo "Running composer"
composer install --no-dev --working-dir=/var/www/html --no-interaction --prefer-dist --optimize-autoloader

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate:fresh --force

echo "Setting permissions..."
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

echo "Starting PHP-FPM in foreground..."
php-fpm &

echo "Starting Nginx in foreground..."
nginx -g 'daemon off;'
