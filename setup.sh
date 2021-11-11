#!/usr/bin/env bash
  docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs ;

	docker compose up -d --build &&
	docker exec -it laravel-blog_laravel.test_1 make install