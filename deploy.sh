#!/bin/bash
cd ~/domains/instacapture.ro/public_html

git pull origin main
composer install --no-dev --optimize-autoloader
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
