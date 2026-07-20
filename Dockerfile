# HASIN portfolio — production image (Nginx + PHP-FPM)
FROM richarvey/nginx-php-fpm:3.1.6

COPY . /var/www/html

WORKDIR /var/www/html

RUN composer install --no-dev --optimize-autoloader --working-dir=/var/www/html \
    && mkdir -p storage/framework/{cache,sessions,views} storage/logs bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache \
    && php artisan storage:link || true

# Image expects scripts in /var/www/html/scripts when RUN_SCRIPTS=1
COPY deploy/render-start.sh /var/www/html/scripts/00-hasin-start.sh
RUN chmod +x /var/www/html/scripts/00-hasin-start.sh

CMD ["/start.sh"]
