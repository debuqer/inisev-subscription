# Inisev subscription system

A simple subscription system platform which allow users to subscribe their websites.

When the website has new post, all it's subscribers will be notify by email.

### Usage

-
```php
composer install
```

- Configuring env
```php 
   cp .env.example .env
   php artisan key:generate
```

Note: In order to have faster deployment process, QUEUE_CONNECTION is database as default

- migrate and seed

``` 
php artisan migrate
php artisan db:seed
```

- Serve using docker-compose or artisan serve
 ```php
php artisan serve
```

- Running schedule which is responsible for calling SendStories Command

``` 
php artisan schedule:run
```

- Running queue:work

``` 
php artisan queue:work
```

- Endpoints are documented here

https://www.postman.com/debuqer/workspace/inisev/overview


