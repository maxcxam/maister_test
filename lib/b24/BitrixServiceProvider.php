<?php

namespace App\B24;

use Illuminate\Support\ServiceProvider;

class BitrixServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('bitrix', function ($app) {
            return new CRest();
        });
    }

    public function boot()
    {
        // Additional bootstrapping code, if needed
    }
}
