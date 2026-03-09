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

# Create/Update .env file with environment variables
# Use values from Render environment or defaults for local dev
echo "Setting up .env with environment variables..."

# Default values (for local Docker development)
APP_NAME="${APP_NAME:-TourApp}"
APP_ENV="${APP_ENV:-production}"
APP_KEY="${APP_KEY:-base64:y9oIFXiWlG7WipoPq3HN4IMYanXZSGf0I1ghk3JDwnY=}"
APP_DEBUG="${APP_DEBUG:-false}"
APP_URL="${APP_URL:-http://localhost}"

DB_CONNECTION="${DB_CONNECTION:-mysql}"
DB_HOST="${DB_HOST:-db}"
DB_PORT="${DB_PORT:-3306}"
DB_DATABASE="${DB_DATABASE:-tour_app}"
DB_USERNAME="${DB_USERNAME:-root}"
DB_PASSWORD="${DB_PASSWORD:-rootpassword}"

CACHE_DRIVER="${CACHE_DRIVER:-database}"
QUEUE_CONNECTION="${QUEUE_CONNECTION:-sync}"
SESSION_DRIVER="${SESSION_DRIVER:-database}"
LOG_CHANNEL="${LOG_CHANNEL:-stderr}"
LOG_LEVEL="${LOG_LEVEL:-debug}"

# Write .env file
cat > /app/.env << EOF
APP_NAME=$APP_NAME
APP_ENV=$APP_ENV
APP_KEY=$APP_KEY
APP_DEBUG=$APP_DEBUG
APP_URL=$APP_URL

DB_CONNECTION=$DB_CONNECTION
DB_HOST=$DB_HOST
DB_PORT=$DB_PORT
DB_DATABASE=$DB_DATABASE
DB_USERNAME=$DB_USERNAME
DB_PASSWORD=$DB_PASSWORD

CACHE_DRIVER=$CACHE_DRIVER
QUEUE_CONNECTION=$QUEUE_CONNECTION
SESSION_DRIVER=$SESSION_DRIVER
LOG_CHANNEL=$LOG_CHANNEL
LOG_LEVEL=$LOG_LEVEL
EOF

echo "✓ .env configured with DB_HOST=$DB_HOST"

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
