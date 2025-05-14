<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MarketController;
use App\Http\Controllers\Admin\StoreCategoryController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\StoreUserController;
use Illuminate\Support\Facades\Route;

Route::prefix('administrator')
    ->name('admin.')
    ->middleware(['auth', 'verified', 'admin'])
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // store categories
        Route::prefix('market')
            ->name('market.')
            ->controller(MarketController::class)
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/', 'store')->name('store');
                Route::get('/{id}/edit', 'edit')->name('edit');
                Route::put('/{id}', 'update')->name('update');
                Route::delete('/{id}', 'destroy')->name('destroy');
            });
        // store categories
        Route::prefix('store-categories')
            ->name('store-categories.')
            ->controller(StoreCategoryController::class)
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/', 'store')->name('store');
                Route::get('/{id}/edit', 'edit')->name('edit');
                Route::put('/{id}', 'update')->name('update');
                Route::delete('/{id}', 'destroy')->name('destroy');
            });

        // stores
        Route::prefix('stores')
            ->name('stores.')
            ->controller(StoreController::class)
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/', 'store')->name('store');
                Route::get('/{id}/edit', 'edit')->name('edit');
                Route::put('/{id}', 'update')->name('update');
                Route::delete('/{id}', 'destroy')->name('destroy');
            });

        // store users
        Route::prefix('store-users')
            ->name('store-users.')
            ->controller(StoreUserController::class)
            ->group(function () {
                Route::get('/{id}', 'index')->name('index');
                Route::post('/', 'store')->name('store');
                // Route::get('/{id}/edit', 'edit')->name('edit');
                // Route::put('/{id}', 'update')->name('update');
                // Route::delete('/{id}', 'destroy')->name('destroy');
            });
    });
