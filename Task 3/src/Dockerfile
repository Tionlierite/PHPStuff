FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    unzip \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

COPY ./xdebug.ini "${PHP_INI_DIR}/conf.d"

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./composer.json /var/www/html/

WORKDIR /var/www/html

RUN composer install --no-scripts --no-autoloader

COPY . /var/www/html

RUN composer dump-autoload --optimize
