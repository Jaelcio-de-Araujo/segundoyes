<?php


// app/Providers/AppServiceProvider.php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }

    public function register()
    {
        //
    }
}
