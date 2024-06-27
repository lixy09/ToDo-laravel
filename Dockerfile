FROM php:8.2-apache

# Copy existing application directory contents
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html

# Set directory permissions for Apache and Laravel
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Install dependencies
RUN apt-get update && apt-get install -y \
    zip \
    libzip-dev \
    unzip \
    && docker-php-ext-install pdo pdo_mysql zip

# Install Composer and PHP dependencies
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer install --no-dev --optimize-autoloader

# Install Node.js and npm
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install -y nodejs \
    && npm install \
    && npm run build

# Enable Apache mod_rewrite
RUN a2enmod rewrite headers

# Copy Apache config
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# Copy and make entrypoint executable
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Start Apache using the entrypoint script
ENTRYPOINT ["/entrypoint.sh"]
CMD ["apache2-foreground"]
