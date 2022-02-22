FROM php:7.0-apache
RUN docker-php-ext-install pdo_mysql
COPY . /var/www/html
RUN chmod -R 775 /var/www/html
EXPOSE 80