#!/bin/sh
set -e

echo "Starting application..."

# Configure PHP error logging to stderr
cat > /usr/local/etc/php/conf.d/error-logging.ini << EOF
display_errors = On
display_startup_errors = On
error_reporting = E_ALL
log_errors = On
error_log = /proc/self/fd/2
EOF

# Check if .env exists
if [ ! -f /app/.env ]; then
    echo "Creating .env file..."
    APP_KEY_VALUE="${APP_KEY:-base64:y9oIFXiWlG7WipoPq3HN4IMYanXZSGf0I1ghk3JDwnY=}"
    cat > /app/.env << EOF
APP_NAME=TourApp
APP_ENV=production
APP_KEY=$APP_KEY_VALUE
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=tour_app
DB_USERNAME=root
DB_PASSWORD=rootpassword

CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
LOG_CHANNEL=stderr
LOG_LEVEL=debug
EOF
else
    # Update LOG_CHANNEL to stderr for container
    sed -i 's/LOG_CHANNEL=.*/LOG_CHANNEL=stderr/' /app/.env || true
    sed -i 's/APP_DEBUG=.*/APP_DEBUG=true/' /app/.env || true
    # Ensure APP_KEY is set
    if ! grep -q "^APP_KEY=" /app/.env; then
        echo "APP_KEY=${APP_KEY:-base64:y9oIFXiWlG7WipoPq3HN4IMYanXZSGf0I1ghk3JDwnY=}" >> /app/.env
    fi
fi

# Run migrations if database exists
if [ -f /app/database.sqlite ]; then
    echo "Running migrations..."
    php artisan migrate --force 2>&1 || echo "Migration warning - continuing anyway"
elif grep -q "DB_CONNECTION=mysql" /app/.env; then
    echo "Waiting for MySQL..."
    sleep 2
    echo "Running migrations..."
    php artisan migrate --force 2>&1 || echo "Migration completed or skipped"
fi

# Fix permissions for storage and bootstrap
echo "Fixing permissions..."
chmod -R 777 /app/storage /app/bootstrap/cache

# Clear cache - skip if database not available
echo "Clearing cache..."
php artisan cache:clear 2>/dev/null || echo "Cache clear skipped (database not available)"
php artisan config:clear 2>/dev/null || true
php artisan view:clear 2>/dev/null || true

echo "Starting PHP-FPM and Nginx..."

# Start PHP-FPM in background
php-fpm --nodaemonize --force-stderr 2>&1 &
PHP_PID=$!

# Start Nginx in foreground
nginx -g 'daemon off;' 2>&1

# Cleanup
kill $PHP_PID 2>/dev/null || true
