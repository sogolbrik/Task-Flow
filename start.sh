#!/bin/sh
set -e

echo "=== Running migrations ==="
php artisan migrate --force

echo "=== Caching config ==="
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "=== Starting PHP-FPM ==="
php-fpm -D

echo "=== Checking PHP-FPM ==="
sleep 2
netstat -tlnp 2>/dev/null || ss -tlnp

echo "=== Starting Nginx ==="
nginx -g 'daemon off;'