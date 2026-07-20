#!/usr/bin/env bash
set -euo pipefail

cd /var/www/html

# Prefer sqlite on free tier if no DATABASE_URL is set
if [ -z "${DATABASE_URL:-}" ] && [ "${DB_CONNECTION:-sqlite}" = "sqlite" ]; then
  mkdir -p database
  touch database/database.sqlite
  chmod 664 database/database.sqlite || true
fi

mkdir -p storage/framework/{cache,sessions,views} storage/logs bootstrap/cache
chmod -R 775 storage bootstrap/cache || true

php artisan config:clear || true
php artisan migrate --force --seed || php artisan migrate --force

# Link public storage only if missing (avoids noisy ERROR on restart)
if [ ! -L public/storage ] && [ ! -e public/storage ]; then
  php artisan storage:link || true
fi

php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true
