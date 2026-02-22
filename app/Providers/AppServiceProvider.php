<?php

namespace App\Providers;

use App\Jobs\EditPostJob;
use App\Repositories\UserRepository;
use App\Services\PostService;
use Illuminate\Support\ServiceProvider;
use App\Services\IAuthService;
use App\Services\AuthService;
use Illuminate\Contracts\Foundation\Application;

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

        $this->app->bindMethod([EditPostJob::class, 'handle'], function (EditPostJob $job, Application $app) {
            return $job->handle([]); // todo: Исправить в будущем на настоящий массив с данными, вместо пустого
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
