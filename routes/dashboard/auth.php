<?php
use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Route;

Route::controller(AdminAuthController::class)->group(function () {
    Route::get('/dashboard/login', 'index')->name('admin.login.index');
    Route::post('/dashboard/login', 'login')->name('admin.login');
    Route::get('/dashboard/logout', 'logout')->name('admin.logout');
});
