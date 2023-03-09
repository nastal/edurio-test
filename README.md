# Task implementation for the Edurio company.

Hi there 👋

Follow the instructions below to get the project up and running.

## Pre-requisites:
ensure your local environment has the following installed:
- Docker
- Docker Compose
- Make
- cup of tee or coffee while you wait for the seeding to complete

## Installation
1. clone the repository
2. run `make install` from within the project directory
3. run `make seed` to seed the database with dummy data 
- note: do not interrupt console while seeding. It uses build in laravel factories to seed up to 1M records,
it may be about 15 minutes to complete.
4. run `make test` to run the tests

## Usage

### Commands
- `php artisan word-stats:rebuild` - within container, to rebuild the word stats table manually.
This command is used after batch process.

### Web API
- `GET http://localhost:47000/api/graph/answer-average` - Graph questions average answers
- `GET http://localhost:47000/api/graph/answer-count` - Graph questions answers count
- `GET http://localhost:47000/api/graph/question-answer/{id}` - Graph question answers by id (todo pagination for large data)
- `GET http://localhost:47000/api/open/word-stats` - Word cloud (stats)

- `POST http://localhost:47000/api/graph/question-answer { "question_id": 1, "answer": "2" }` - Create graph answer for question
- `POST http://localhost:47000/api/open/question-answer {"question_id" : 16, "answer": "Lorem ipsum dolor sit amet}` - Create graph answer for question


### Notes

In this project used redis for cache to speed up performance, as it is the fastest way to store data in memory.
However, you can set CACHE_DRIVER=file in .env file, and it will work without redis.
As also, redis is used for domain event async dispatching to generate word stats (cloud).
You can switch queue system to database driver, but it will be slower.

After docker with mysql is down, your data will be lost. You can persist it with volumes.

Note: debug and monitoring tool telescope also consumes some resources, so you can disable it in .env file.
Or you can get some insights:
http://localhost:47000/telescope/requests


I've tried to use DDD, CQRS, but of course it's a kind of simplified implementation.
For example, you can find that domain models are actually Eloquent models, but I've tried to use DTO's,
to separate data from logic.
Below are sources with similar approaches, but I'm not guarantee that it's absolutely correct way to implement DDD:

https://mevelix.com/articles/laravel-cqrs-from-scratch,1
https://stitcher.io/blog/laravel-beyond-crud-01-domain-oriented-laravel
https://lorisleiva.com/conciliating-laravel-and-ddd
