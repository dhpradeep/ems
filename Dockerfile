FROM php:7.4.3-apache
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN a2enmod rewrite
RUN mkdir /var/www/html/ems

COPY . /var/www/html/ems
