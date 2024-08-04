# Dockerfile para o backend
FROM php:8.2-fpm

WORKDIR /var/www/html

# Instale o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Atualize os pacotes e instale dependências para compilar as extensões PHP
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip

# Instale todas as extensões disponíveis
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql && \
    apt-get install -y --no-install-recommends apt-utils && \
    apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev libmcrypt-dev libicu-dev libxml2-dev && \
    docker-php-ext-install pdo pdo_pgsql pgsql mysqli pdo_mysql zip && \
    docker-php-ext-install exif calendar pcntl bcmath intl gd

# Instale as dependências do PHP com o Composer
COPY . .

# RUN composer install --no-interaction --prefer-dist --optimize-autoloader

EXPOSE 8000
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
