#!/bin/sh

echo "🎬 entrypoint.sh"

composer dump-autoload --no-interaction --no-dev --optimize
cp .env.example .env

echo "🎬 artisan commands"

php artisan key:generate
php artisan cache:clear
php artisan migrate --no-interaction --force --seed

echo "🎬 start supervisord"

supervisord -c $LARAVEL_PATH/.deploy/config/supervisor.conf
