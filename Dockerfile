# Use the official PHP image
FROM php:8-fpm

# Set the working directory
WORKDIR /var/www/html

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    dnsutils \
    postgresql-client 

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy project files
COPY . .

# Install project dependencies
RUN composer install --no-interaction

# Expose port 8000 (adjust if your Lumen app uses a different port)
EXPOSE 8000
