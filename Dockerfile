# Base image with PHP, Composer, and Nginx
FROM php:8.3-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    nginx \
    git \
    unzip \
    curl \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# Set working directory
WORKDIR /var/www/html

# Copy app files
COPY . .

# Ensure Composer is up to date and accessible
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install required PHP extensions for Laravel + PostgreSQL
RUN docker-php-ext-install pdo pdo_pgsql

# Install dependencies
RUN composer install -vvv --no-dev --no-interaction --prefer-dist --optimize-autoloader

# Laravel permissions
RUN chown -R www-data:www-data storage bootstrap/cache && chmod -R 775 storage bootstrap/cache

# Copy Nginx config
COPY conf/nginx/nginx-site.conf /etc/nginx/sites-enabled/default

# Add deploy script
COPY scripts/00-laravel-deploy.sh /usr/local/bin/00-laravel-deploy.sh
RUN chmod +x /usr/local/bin/00-laravel-deploy.sh

# Expose HTTP port
EXPOSE 80

# Run Laravel optimizations, migrations, and start Nginx + PHP-FPM
CMD ["bash", "-c", "/usr/local/bin/00-laravel-deploy.sh"]
