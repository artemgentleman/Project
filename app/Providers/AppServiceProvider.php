<?php

namespace App\Providers;

use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;
use App\Services\IAuthService;
use App\Services\AuthService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    
    {
        $this->app->singleton(IAuthService::class, function (Application $app) {
            return new AuthService(new UserRepository());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
