#!/bin/bash

COMPOSER_MEMORY_LIMIT=-1 composer update
npm install
npm run dev

service cron start

php-fpm
