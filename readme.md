# CV Recruitment Project

##  Without docker

---

### Server Requirements

- Laravel 8
- Redis (https://redis.io/)
- Laravel Echo Server (`npm install -g laravel-echo-server`)

### Setup 

- `composer install`
- `find ./storage/ -type d -exec chmod 0755 {} \;`
- `find ./storage/ -type f -exec chmod 0644 {} \;`
- `npm install`
- `npm run dev|prod`
- `php artisan queue:work`
- `redis-server`
- `laravel-echo-server start`

## With docker

---

### Requirements

- Docker
- Docker-Compose

### Setup

- `docker-compose up -d`
- check for logs `docker-compose logs -f`

## Generals

---

### First time setup

- `docker-compose exec app /bin/bash`
- `php artisan db:seed`
