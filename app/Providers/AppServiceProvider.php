<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\CountryRepository;
use App\Repositories\CountryRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CountryRepositoryInterface::class, CountryRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
