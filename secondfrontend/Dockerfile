FROM php:7.0-apache
RUN docker-php-ext-install pdo_mysql
COPY secondfrontend.php /var/www/html/index.php
EXPOSE 80