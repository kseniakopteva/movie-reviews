# Base image with PHP, Composer, and Nginx
FROM richarvey/nginx-php-fpm:1.7.2

# Enable required PHP extensions for Laravel + PostgreSQL
RUN docker-php-ext-install pdo pdo_pgsql

# Set working directory
WORKDIR /var/www/html

# Copy app files
COPY . .

# Install dependencies
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# Laravel permissions
RUN chown -R www-data:www-data storage bootstrap/cache && chmod -R 775 storage bootstrap/cache

# Copy Nginx config
COPY conf/nginx/nginx-site.conf /etc/nginx/sites-enabled/default

# Add deploy script
COPY scripts/00-laravel-deploy.sh /usr/local/bin/00-laravel-deploy.sh
RUN chmod +x /usr/local/bin/00-laravel-deploy.sh

# Expose HTTP port
EXPOSE 80

# Start Nginx + PHP-FPM
CMD ["/start.sh"]
