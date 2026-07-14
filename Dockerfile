# Step 1: Use an official PHP image with Apache
FROM php:8.2-apache

# Step 2: Install system dependencies & PHP extensions needed for Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql gd zip

# Step 3: Enable Apache Mod_Rewrite for Laravel routing
RUN a2enmod rewrite

# Step 4: Copy Apache VirtualHost configuration
COPY docker/apache.conf /etc/apache2/sites-available/0000-default.conf
RUN a2ensite 000-default.conf

# Step 5: Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Step 6: Set working directory
WORKDIR /var/www/html

# Step 7: Copy existing application code
COPY . .

# Step 8: Set permissions for Laravel storage and cache directories
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Step 9: Expose port 80
EXPOSE 80

# Step 10: Start Apache server
CMD ["apache2-foreground"]