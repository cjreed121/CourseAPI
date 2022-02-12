# CourseAPI

A simple Laravel API that gives you info on RPI courses.

## Documentation

Go to [https://rpi-course-api.herokuapp.com/docs](https://rpi-course-api.herokuapp.com/docs) to see docs for the API.

## Local Installation

In order to run this project locally you need the following:

- PHP
- Composer
- Docker

### Install Steps

1. Clone the repo
2. Run ```composer install``` in the root directory
3. Copy .env.example to .env
4. Configure any values you would like in your .env
5. Run ```php artisan key:generate``` to generate the application key
6. Run ```./vendor/bin/sail up -d``` to start the Docker containers
7. Run ```./vendor/bin/sail artisan migrate``` to perform all migrations
8. Now you should be able to go to [http://localhost](http://localhost) and see the docs

You could create an alias for ```./vendor/bin/sail``` to just ```sail``` to make it easier to type.
