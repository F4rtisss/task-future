FROM php:8.3-fpm

WORKDIR /var/www/notebooks.com

RUN apt-get update && apt-get install -y \
    g++ \
    libpng-dev \
    libicu-dev \
    libpq-dev \
    libzip-dev \
    libz-dev \
    zip \
    wget \
    libcurl4-openssl-dev \
    pkg-config \
    libssl-dev \
    zlib1g-dev \
    && docker-php-ext-install opcache pdo pdo_mysql zip gd

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN echo 'memory_limit = -1' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini


CMD ["php-fpm"]