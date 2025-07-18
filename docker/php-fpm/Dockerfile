FROM php:8.3.12-fpm

# Install required extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli pdo_mysql

# Set working directory
WORKDIR /var/www/html

# Optional: expose port (not strictly needed, but explicit)
EXPOSE 9000
