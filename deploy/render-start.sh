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
php artisan migrate --force

# Seed only when the site has no projects yet (preserves admin edits on restart)
PROJECT_COUNT="$(php artisan tinker --execute='echo \\App\\Models\\Project::count();' 2>/dev/null | tail -n 1 || echo 0)"
if [ "${PROJECT_COUNT:-0}" = "0" ]; then
  php artisan db:seed --force || true
fi

# Drop incorrect companion entry if an older DB still has it
php artisan tinker --execute="\\App\\Models\\Project::where('title', 'AgroCulture (Organization Suite)')->delete();" || true

# Sitemap must be a static file on Render (nginx serves *.xml from public/)
php artisan portfolio:build-sitemap || true

# Link public storage only if missing (avoids noisy ERROR on restart)
if [ ! -L public/storage ] && [ ! -e public/storage ]; then
  php artisan storage:link || true
fi

php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true
