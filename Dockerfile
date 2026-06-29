FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip nginx

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

RUN curl -sL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

WORKDIR /var/www

COPY . .

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-interaction --optimize-autoloader --no-dev

RUN npm install && npm run build

COPY ./nginx.conf /etc/nginx/sites-available/default
RUN rm -f /etc/nginx/sites-enabled/default && \
    ln -s /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default

# Fix PHP-FPM listen address (lebih reliable pakai cara ini)
RUN echo '[www]' > /usr/local/etc/php-fpm.d/zzz-custom.conf && \
    echo 'listen = 127.0.0.1:9000' >> /usr/local/etc/php-fpm.d/zzz-custom.conf

RUN chmod -R 775 storage bootstrap/cache

EXPOSE 8080

CMD ["sh", "-c", "\
    php artisan migrate --force && \
    php artisan storage:link --force && \
    php artisan config:cache && \
    php artisan route:cache && \
    php-fpm -D && \
    nginx -g 'daemon off;'"]