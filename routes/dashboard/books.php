<?php

use App\Http\Controllers\BookDashboard;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::resource('books', BookDashboard::class);
});