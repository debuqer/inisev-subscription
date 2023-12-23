<?php

namespace App\Providers;

use App\Services\Blog\BlogServiceHandler;
use App\Services\Contracts\BlogService;
use App\Http\Response\Response;
use App\Services\Contracts\SubscriptionService;
use App\Http\Response\ResponseHandler;
use App\Services\Subscription\SubscriptionServiceHandler;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(Response::class, ResponseHandler::class);
        $this->app->bind(BlogService::class, BlogServiceHandler::class);
        $this->app->bind(SubscriptionService::class, SubscriptionServiceHandler::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
