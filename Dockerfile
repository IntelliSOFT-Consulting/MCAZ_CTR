FROM php:7.0-apache

RUN a2enmod rewrite
RUN docker-php-ext-install mbstring
RUN docker-php-ext-install mysqli
RUN apt-get update && apt-get install -y libicu-dev \
    libzip-dev \
    libmcrypt-dev \   
    libxrender1 libfontconfig1 libx11-dev libjpeg-dev \
    && docker-php-ext-install zip \ 
    && docker-php-ext-install intl \
    && docker-php-ext-install mcrypt mysqli \
    && docker-php-ext-install pdo_mysql
  
RUN mkdir -p /var/www/html 
COPY . /var/www/html/ 

# RUN chmod -R 777 /var/www/html/tmp/cache 