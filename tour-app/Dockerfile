# Build stage
FROM node:18-alpine AS frontend-builder
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

# PHP stage
FROM php:8.2-fpm-alpine

# Install system dependencies
RUN apk add --no-cache \
    nginx \
    curl \
    zip \
    unzip \
    git \
    postgresql-dev \
    mysql-dev \
    oniguruma-dev \
    libzip-dev \
    netcat-openbsd

# Install PHP extensions
RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    pdo_pgsql \
    bcmath \
    mbstring \
    zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copy application files trước
COPY . .

# Create writable directories
RUN mkdir -p bootstrap/cache storage/logs storage/framework/cache storage/framework/sessions storage/framework/views && \
    chmod -R 777 bootstrap/cache storage

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Copy built frontend from builder stage
COPY --from=frontend-builder /app/public/build ./public/build

# Setup permissions
RUN chmod -R 777 storage bootstrap/cache

# Copy nginx config
COPY nginx.conf /etc/nginx/nginx.conf

# Copy entrypoint script
COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Setup environment
RUN if [ -f .env.example ]; then cp .env.example .env; else echo "APP_KEY=" > .env; fi

# Generate APP_KEY
RUN php artisan key:generate --no-interaction 2>/dev/null || true

# Configure PHP-FPM error logging
RUN sed -i 's/catch_workers_output = no/catch_workers_output = yes/' /usr/local/etc/php-fpm.conf.d/docker.conf || true

# Expose port
EXPOSE 80

# Use entrypoint script
ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
