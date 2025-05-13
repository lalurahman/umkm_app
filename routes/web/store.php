<?php

use App\Http\Controllers\Store\DashboardController;
use App\Http\Controllers\Store\ProductCategoryController;
use App\Http\Controllers\Store\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('store')
    ->name('store.')
    ->middleware(['auth', 'verified', 'store'])
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // product categories
        Route::prefix('product-categories')
            ->name('product-categories.')
            ->controller(ProductCategoryController::class)
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/', 'store')->name('store');
                Route::get('/{id}/edit', 'edit')->name('edit');
                Route::put('/{id}', 'update')->name('update');
                Route::delete('/{id}', 'destroy')->name('destroy');
            });
        // products
        Route::prefix('products')
            ->name('products.')
            ->controller(ProductController::class)
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/', 'store')->name('store');
                Route::get('/{id}/edit', 'edit')->name('edit');
                Route::put('/{id}', 'update')->name('update');
                Route::delete('/{id}', 'destroy')->name('destroy');
            });
    });
