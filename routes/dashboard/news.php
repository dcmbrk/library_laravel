<?php

use App\Http\Controllers\NewsDashboard;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->group(function () {
    Route::resource('news', NewsDashboard::class)
        ->names('dashboard.news');
});