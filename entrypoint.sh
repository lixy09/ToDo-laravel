#!/bin/bash

# Copy the appropriate .env file
cp /var/www/html/.env /var/www/html/.env

# Generate the application key
php artisan key:generate --ansi

# Cache laravel config
php artisan config:clear
php artisan config:cache

# Setup storage
php artisan storage:link

# Dynamically set the Apache port (heroku sets it otherwise 80)
if [[ -z "${PORT}" ]]; then
  export PORT=80
fi

# Update the ports.conf file
echo "Listen ${PORT}" > /etc/apache2/ports.conf

# Start Apache
exec "$@"
