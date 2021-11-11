install:
	php artisan key:gen --ansi
	php artisan migrate
	php artisan db:seed
	php artisan schedule:work


