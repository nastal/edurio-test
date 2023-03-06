install:
	docker-compose up -d --build
	docker-compose run --rm php-fpm composer install
	docker-compose run --rm php-fpm php artisan migrate
	docker-compose run --rm php-fpm php artisan php artisan telescope:install



