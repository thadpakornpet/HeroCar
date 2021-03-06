<?php

namespace App\Providers;

use App\Sold;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share(['mailusers' => \App\User::all(), 'typeofusers' => \App\Roles::all(), 'soldcount' => Sold::where('status', 0)->count()]);
    }
}
