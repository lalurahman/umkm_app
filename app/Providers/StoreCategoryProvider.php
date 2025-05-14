<?php

namespace App\Providers;

use App\Models\StoreCategory;
use Illuminate\Support\ServiceProvider;

class StoreCategoryProvider extends ServiceProvider
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
            $categories = StoreCategory::all();
            $view->with([
                'categories' => $categories,
            ]);
        });
    }
}
