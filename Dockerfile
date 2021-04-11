FROM php:7.2-apache
RUN apt-get update && apt-get install -y \
    && docker-php-ext-install pdo pdo_mysql
RUN a2enmod rewrite
COPY ./db/ /docker-entrypoint-initdb.d/