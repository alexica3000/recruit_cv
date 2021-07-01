FROM php:8.0-fpm

RUN apt-get update -y && apt-get install -y libmcrypt-dev openssl procps iputils-ping
RUN apt-get clean; docker-php-ext-install pdo pdo_mysql
RUN apt-get install -y libzip-dev zlib1g-dev; docker-php-ext-install zip

RUN curl --silent --show-error https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -sL https://deb.nodesource.com/setup_11.x  | bash -
RUN apt-get -y install nodejs

RUN apt-get update && apt-get install -y \
		libfreetype6-dev \
		libjpeg62-turbo-dev \
		libpng-dev \
	&& docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
	&& docker-php-ext-install -j$(nproc) gd

RUN apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
WORKDIR /app
ADD docker-php.ini /usr/local/etc/php/conf.d/custom.ini