FROM php:7.4.30-apache
RUN apt-get update
RUN apt-get install -y \
        default-mysql-client \
        ssl-cert \
        libzip-dev \
        libpng-dev \
        zip \
        vim
ENV APACHE_DOCUMENT_ROOT /var/www/html/www

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN docker-php-ext-install gd zip mysqli pdo_mysql
RUN pecl install xdebug-3.1.5
RUN docker-php-ext-enable xdebug
RUN echo "xdebug.mode=debug" >> /usr/local/etc/php/php.ini &&\
  echo 'xdebug.log=/tmp/xdebug.log' >> /usr/local/etc/php/conf.d/xdebug.ini &&\
  echo 'xdebug.client_host=host.docker.internal' >> /usr/local/etc/php/conf.d/xdebug.ini &&\
  echo 'xdebug.client_port=9003' >> /usr/local/etc/php/conf.d/xdebug.ini &&\
  echo 'xdebug.idekey=PHPSTORM' >> /usr/local/etc/php/conf.d/xdebug.ini

RUN a2enmod rewrite
RUN a2enmod ssl  && a2ensite default-ssl

RUN touch /usr/local/etc/php/conf.d/uploads.ini \
      && echo "upload_max_filesize = 256M; \
file_uploads = On; \
memory_limit = 256M; \
post_max_size = 256M; \
max_execution_time = 600;" >> /usr/local/etc/php/conf.d/uploads.ini

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# wpcli
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && \
chmod +x wp-cli.phar && \
mv wp-cli.phar /usr/local/bin/wp && \
echo 'wp() {' >> ~/.bashrc && \
echo '/usr/local/bin/wp "$@" --allow-root' >> ~/.bashrc && \
echo '}' >> ~/.bashrc

RUN chmod 755 -R /var/www