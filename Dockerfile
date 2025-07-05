FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libonig-dev libxml2-dev zip unzip git curl \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copiar solo composer files primero
COPY composer.json composer.lock ./

# Instalar dependencias sin correr scripts para evitar error por falta de artisan
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Copiar todo el código
COPY . .

# Ejecutar scripts que necesitan artisan
RUN php artisan package:discover --ansi

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]