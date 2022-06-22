FROM php:8.1-fpm-alpine

RUN adduser -g www-data -s /bin/sh -D www-data; exit 0

RUN mkdir -p /var/www/html

WORKDIR /var/www/html

RUN sed -i "s/user = www-data/user = www-data/g" /usr/local/etc/php-fpm.d/www.conf
RUN sed -i "s/group = www-data/group = www-data/g" /usr/local/etc/php-fpm.d/www.conf

RUN chmod 777 .

RUN docker-php-ext-install pdo pdo_mysql

RUN mkdir -p /usr/src/php/ext/redis && curl -L https://github.com/phpredis/phpredis/archive/5.3.4.tar.gz | tar xvz -C /usr/src/php/ext/redis --strip 1 && echo 'redis' >> /usr/src/php-available-exts && docker-php-ext-install redis

CMD ["php-fpm", "-y", "/usr/local/etc/php-fpm.conf", "-R"]