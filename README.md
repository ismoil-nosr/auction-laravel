# Laravel Auction
[![Yeticave Auction](https://auction.github.uz/img/screenshot.jpg "Yeticave Auction")](https://auction.github.uz/ "Yeticave Auction")

# Demo
[https://auction.github.uz](https://auction.github.uz "https://auction.github.uz")

# Installation
```bash
git clone https://github.com/ismoil-nosr/auction-laravel.git
cd auction-laravel/
composer install
php artisan migrate --seed
```

## Docker
First create an image:

    sudo docker build -f ./.deploy/Dockerfile -t laravel_auction

Then run container:

    sudo docker run -d -t -i -e APP_ENV='development' \ 
    -e DB_CONNECTION='mysql' \
    -e DB_HOST='mysql_server' \
    -e DB_PORT='3306' \
    -e DB_DATABASE='laravel_auction' \
    -e DB_USERNAME='laravel_auction \
	-e DB_PASSWORD='password' \
    -p 80:80 \
	-p 443:443\
    --name laravel_auction

## Docker-compose
```bash
git clone https://github.com/ismoil-nosr/auction-laravel.git
cd auction-laravel/
docker-compose up -d
```

------------

>PHP: 7.4 FPM
DB: MySQL 5.7.29
WebServer: Caddy 2.x
Supervisord: latest
Composer: latest


## Useful links
- [Laravel Framework](https://github.com/laravel/framework "Laravel Framework")
- [Laravel Caprover boilerplate](https://github.com/jackbrycesmith/laravel-caprover-template "Laravel Caprover boilerplate")
- [Caprover PaaS Manager](https://github.com/caprover/caprover "Caprover PaaS Manager")