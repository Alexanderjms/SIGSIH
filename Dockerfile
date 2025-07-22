FROM php:8.2-fpm

# Instala dependencias del sistema y Node.js
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    npm

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copia los archivos del proyecto
COPY . .

# Instala dependencias PHP (Laravel, Livewire)
RUN composer install

# Instala dependencias Node.js (TailwindCSS)
RUN npm install && npm run build

# Permisos para Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]