<?php

namespace App\Providers;

use App\Models\Market;
use Illuminate\Support\ServiceProvider;

class MarketServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('layouts.public', function ($view) {
            $market = Market::all();
            $view->with([
                'market' => $market,
            ]);
        });
    }
}
