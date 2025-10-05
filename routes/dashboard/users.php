<?php

use App\Http\Controllers\UserDashboard;
use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard/users', [UserDashboard::class, 'index'])->name('dashboard.users.index');
Route::put('/dashboard/users/status', [UserDashboard::class, 'statusSwitch'])->name('dashboard.users.status');
Route::put('/dashboard/users/role', [UserDashboard::class, 'roleSwitch'])->name('dashboard.users.role');


Route::controller(AdminAuthController::class)->group(function () {
    Route::get('/dashboard/login', 'index')->name('admin.login.index');
    Route::post('/dashboard/login', 'login')->name('admin.login');
    Route::get('/dashboard/logout', 'logout')->name('admin.logout');
});
