#!/bin/sh

echo "🎬 entrypoint.sh"

composer dump-autoload --no-interaction --no-dev --optimize
cp .env.example .env

echo "🎬 artisan commands"

php artisan key:generate
php artisan cache:clear
php artisan migrate --no-interaction --force --seed
php artisan storage:link

echo "🎬 at least moves"

mv ./public/storage ./public/uploads

echo "🎬 start supervisord"

supervisord -c $LARAVEL_PATH/.deploy/config/supervisor.conf

echo "🎬 last update"

apt-get update