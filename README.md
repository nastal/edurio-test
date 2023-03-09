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
- note: do not interupt console while seeding. It uses build in laravel factories to seed up to 1M records, on MacBookPro M1 it takes about 10 minutes to complete
4. run `make test` to run the tests

## Usage

### Commands
- `php artisan word-stats:rebuild` - within container, rebuilds the word stats table
This command is used after batch process. As also you can rebuild it at any time, as there is no eventual consistency aka event soursing.

### Web API
- `GET http://localhost:47000/api/graph/answer-avarage` - Graph questions avarage answers
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

Note: debug and monitoring tool telescope also consumes some resources, so you can disable it in .env file.
Or you can get some insights:
http://localhost:47000/telescope/requests

https://mevelix.com/articles/laravel-cqrs-from-scratch,1

https://stitcher.io/blog/laravel-beyond-crud-01-domain-oriented-laravel
https://lorisleiva.com/conciliating-laravel-and-ddd
