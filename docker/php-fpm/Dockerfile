FROM php:8.2.4-fpm

EXPOSE 9000
WORKDIR /var/www

RUN apt-get update && apt-get install -y \
        curl \
        wget \
        less \
        vim \
        git \
        postgresql \
        libpq-dev

RUN mv /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini
RUN rm -f /usr/local/etc/php/php.ini-development
RUN rm /etc/apt/preferences.d/no-debian-php

RUN docker-php-ext-install \
        pdo_pgsql \
        pgsql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

CMD ["php-fpm"]
