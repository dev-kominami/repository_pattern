<?php

namespace App\Providers;

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
        $this->app->bind(
            \App\Repositories\Companies\CompaniesDataAccessRepositoryInterface::class,
            \App\Repositories\Companies\CompaniesMysqlRepository::class
        );
        $this->app->bind(
            \App\Repositories\Jobs\JobsDataAccessRepositoryInterface::class,
            \App\Repositories\Jobs\JobsMysqlRepository::class
        );
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
