# Use PHP 8.2 as the base image
FROM php:8.2-fpm

# Install system dependencies and PHP extensions required by Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    git \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory inside the container
WORKDIR /var/www

# Copy the composer.json and composer.lock files first to optimize Docker cache
COPY composer.json composer.lock ./

# Install PHP dependencies via Composer
RUN composer install --no-autoloader --no-scripts

# Copy the rest of the Laravel app into the container
COPY . .

# Install the rest of the Composer dependencies
RUN composer install

# Set permissions for Laravel
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Expose port 8000 and start the PHP-FPM server
EXPOSE 8000
CMD ["php-fpm"]
