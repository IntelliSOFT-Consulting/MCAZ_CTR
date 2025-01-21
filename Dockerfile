# Use the official PHP image with Apache
FROM php:7.1-apache

# Set the working directory
WORKDIR /var/www/html

# Install required dependencies
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    libicu-dev \
    libzip-dev \
    zip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd intl pdo pdo_mysql zip \
    && apt-get clean

# Enable Apache Rewrite Module
RUN a2enmod rewrite

# Install Composer globally
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy project files to the container
COPY . /var/www/html

# Set proper permissions for the web server
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Configure CakePHP permissions
RUN mkdir -p /var/www/html/tmp \
    && mkdir -p /var/www/html/logs \
    && chown -R www-data:www-data /var/www/html/tmp /var/www/html/logs

# Expose the default web server port
# EXPOSE 80

# # Start the Apache server
# CMD ["apache2-foreground"] 
# RUN ./install_wkhtmltopdf.sh
 
RUN apt-get update && apt-get install -y supervisor
RUN mkdir -p /var/log/supervisor
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf
CMD supervisord -c /etc/supervisor/conf.d/supervisord.conf && apache2-foreground
 