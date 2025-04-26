# Gunakan image PHP dengan FPM (FastCGI Process Manager)
FROM php:8.2-fpm

# Install ekstensi yang diperlukan untuk Laravel
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev git unzip && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd pdo pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set direktori kerja ke /var/www
WORKDIR /var/www

# Salin file Laravel ke dalam container
COPY . /var/www

# Install dependensi Laravel
RUN composer install

# Expose port 9000 dan jalankan php-fpm
EXPOSE 9000
CMD ["php-fpm"]
