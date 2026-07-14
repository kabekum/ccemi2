# ==========================================
# STAGE 1: COMPOSER BUILDER
# ==========================================
FROM composer:latest AS builder

WORKDIR /app

# Copy only the package lists first (helps Docker cache layers)
COPY composer.json composer.lock ./

# Install dependencies using Composer's official highly-optimized internal binaries
RUN COMPOSER_MEMORY_LIMIT=-1 composer install \
    --no-dev \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

# Copy the rest of the application code into the builder stage
COPY . .

# ==========================================
# STAGE 2: FINAL RUNTIME ENVIRONMENT
# ==========================================
FROM php:8.2-apache

# Install minimal runtime extensions needed for Laravel execution
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql gd zip \
    && rm -rf /var/lib/apt/lists/*

# Enable Apache Mod_Rewrite
RUN a2enmod rewrite
COPY docker/apache.conf /etc/apache2/sites-available/000-default.conf
RUN a2ensite 000-default.conf

WORKDIR /var/www/html

# Copy the application from Stage 1 (This brings along the pre-built vendor folder!)
COPY --from=builder /app /var/www/html

# Fix permissions for execution
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80

CMD ["apache2-foreground"]
