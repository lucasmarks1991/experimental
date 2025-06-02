#!/bin/sh
set -e

echo "Running migrations..."
php artisan migrate --force

echo "Caching configs..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Clearing application cache..."
php artisan cache:clear

exec "$@"
