<?php

namespace App\Providers;

use App\Repositories\Media\EloquentMedia;
use App\Repositories\Media\MediaRepository;
use App\Services\StorageService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(MediaRepository::class, EloquentMedia::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
