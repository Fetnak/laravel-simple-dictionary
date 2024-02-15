#!/bin/sh

php artisan config:cache > /dev/null
php artisan config:clear > /dev/null
php artisan route:cache > /dev/null
php artisan route:clear > /dev/null
php artisan optimize > /dev/null
php artisan serve
