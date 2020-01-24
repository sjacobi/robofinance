<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Repositories\TransactionRepository;
use App\Repositories\UserRepository;

use App\Services\TransactionService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(TransactionRepository::class);

        app()->bind(UserRepository::class);

        app()->bind(TransactionService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
