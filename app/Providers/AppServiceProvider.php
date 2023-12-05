<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Service\CreateNotificationInterface;
use App\Service\CreateNotificationService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    $this->app->bind(CreateNotificationInterface::class, CreateNotificationService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
