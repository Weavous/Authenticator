FROM nginx:stable-alpine

RUN sed -i "s/user www-data/user www-data/g" /etc/nginx/nginx.conf

ADD ./docker/nginx/conf.d/default.conf /etc/nginx/conf.d/

RUN mkdir -p /var/www/html

RUN adduser -g www-data -s /bin/sh -D www-data; exit 0