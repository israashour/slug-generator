<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::group( function () {
    Route::get('/dashboard', DashboardController::class, 'index')->name('index');
    Route::get('/slug-history', DashboardController::class, 'slugHistory')->name('slug-history');
    Route::get('/slug-generate', DashboardController::class, 'generateSlug')->name('generate-slug');
});
