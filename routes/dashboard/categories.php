<?php

use App\Http\Controllers\CategoryDashboard;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::resource('categories', CategoryDashboard::class);
});