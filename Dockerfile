FROM php:8.2-apache

# Install system packages
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    zip

# Install PHP extensions (MYSQL FIX)
RUN docker-php-ext-install pdo pdo_mysql

# Enable Apache rewrite & set public folder
RUN a2enmod rewrite
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' \
    /etc/apache2/sites-available/*.conf \
    /etc/apache2/apache2.conf

WORKDIR /var/www/html

COPY . .

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Permissions
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 80
