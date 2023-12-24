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




**Below note added 1 day after submitting the task**

```php
return UserStory::query()->whereNull('sent_at')->lazy(1);
```

**Note:** This was set to load user stories 1 by 1 which is not a good option in production(1 query per user story), so in the real world, I'll change this line to read the chunk size from config. Using lazy can optimize memory usage since it uses PHP generators.
