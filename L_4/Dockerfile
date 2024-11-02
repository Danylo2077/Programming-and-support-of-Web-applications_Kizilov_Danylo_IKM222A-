FROM php:7.4-apache


RUN docker-php-ext-install mysqli


COPY ./src /var/www/html/

# Налаштування прав доступу
RUN chown -R www-data:www-data /var/www/html
 
