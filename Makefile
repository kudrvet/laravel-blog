setup:
	composer install
	php artisan key:gen --ansi
	php artisan migrate
	php artisan db:seed
	php artisan horizon &
	php artisan schedule:work &
	php artisan serve &