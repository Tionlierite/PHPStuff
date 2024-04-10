FROM php:8.3-apache

COPY ../config/ /etc/apache2/sites-available/
RUN a2ensite nsk.time.test.conf && a2ensite l-a.time.test.conf && a2dissite 000-default.conf

RUN mkdir -p /var/www/html/nsk.time.test && mkdir -p /var/www/html/l-a.time.test

EXPOSE 80