FROM php:7.4.3-apache
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN a2enmod rewrite

COPY ./ems/ /var/www/html
