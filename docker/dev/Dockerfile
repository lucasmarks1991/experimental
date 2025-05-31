FROM php:8.2-fpm-alpine

RUN apk add --no-cache --virtual .build-deps \
        autoconf \
        build-base \
        linux-headers \
        libxml2-dev \
        sqlite-dev \
        postgresql-dev \
        mariadb-connector-c-dev \
        unixodbc-dev \
        freetds-dev \
        icu-dev \
        oniguruma-dev \
        zlib-dev \
        libpng-dev \
        libjpeg-turbo-dev \
        libwebp-dev \
        libxpm-dev \
        libzip-dev \
    && apk add --no-cache \
        bash \
        git \
        curl \
        nginx \
        supervisor \
        icu \
        postgresql-libs \
        libzip \
        unixodbc \
    && docker-php-ext-install -j$(nproc) \
        pdo \
        pdo_mysql \
        pdo_pgsql \
        pdo_sqlite \
        intl \
        mbstring \
        xml \
        zip \
        opcache \
    && pecl install pdo_sqlsrv sqlsrv \
    && docker-php-ext-enable pdo_sqlsrv sqlsrv \
    && apk del .build-deps

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
