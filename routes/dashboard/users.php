<?php

use App\Http\Controllers\UserDashboard;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard/users')->name('dashboard.users.')->group(function () {
    Route::get('/', [UserDashboard::class, 'index'])->name('index');
    Route::put('/status', [UserDashboard::class, 'statusSwitch'])->name('status');
    Route::put('/role', [UserDashboard::class, 'roleSwitch'])->name('role');
});