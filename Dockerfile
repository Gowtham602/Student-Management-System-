FROM php:8.2-cli

# Install system packages
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    zip

# Install PHP extensions (MySQL)
RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /app

COPY . .

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Permissions
RUN chmod -R 775 storage bootstrap/cache

# Railway will provide PORT
CMD php -S 0.0.0.0:$PORT -t public
