install:
	docker-compose up -d --build
	docker-compose run --rm php-fpm composer install
	docker-compose run --rm php-fpm php artisan telescope:install
	docker-compose run --rm php-fpm php artisan migrate

seed:
	docker-compose run --rm php-fpm php artisan db:seed
	docker-compose run --rm php-fpm php artisan word-stats:persist


test:
	docker-compose run --rm php-fpm ./vendor/bin/phpunit


