#!/usr/bin/env bash
#  docker run --rm \
#    -u "$(id -u):$(id -g)" \
#    -v $(pwd):/var/www/html \
#    -w /var/www/html \
#    laravelsail/php80-composer:latest \
#    composer install --ignore-platform-reqs --no-scripts;

	docker compose up -d --build
#	docker exec -it laravel-blog-laravel.test-1 make install