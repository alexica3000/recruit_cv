FROM php:8.0-fpm

RUN apt-get update -y && apt-get install -y libmcrypt-dev openssl procps iputils-ping
RUN apt-get install -y libzip-dev zlib1g-dev; docker-php-ext-install zip
RUN pecl install redis xdebug; docker-php-ext-enable redis xdebug; rm -rf /tmp/pear
RUN echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && echo "xdebug.client_host = host.docker.internal"
RUN apt-get clean; docker-php-ext-install pdo pdo_mysql pcntl posix exif

RUN curl --silent --show-error https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -sL https://deb.nodesource.com/setup_11.x  | bash -
RUN apt-get -y install nodejs

RUN apt-get update && apt-get install -y \
		libfreetype6-dev \
		libjpeg62-turbo-dev \
		libpng-dev \
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
	&& docker-php-ext-install -j$(nproc) gd

RUN apt-get update && apt-get install -y cron && apt-get install -y mariadb-client

COPY crontab.laravel /etc/cron.d/crontab.laravel
RUN chmod 0644 /etc/cron.d/crontab.laravel
RUN crontab /etc/cron.d/crontab.laravel

RUN apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
WORKDIR /app
ADD docker-php.ini /usr/local/etc/php/conf.d/custom.ini
ADD app-entrypoint.sh /app-entrypoint.sh
RUN chmod 755 /*.sh
CMD ["/app-entrypoint.sh"]
