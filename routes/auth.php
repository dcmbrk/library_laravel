<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;

// Auth người dùng
Route::controller(SessionController::class)->group(function () {
    Route::get('/login', 'create')->name('login');
    Route::post('/login', 'store')->name('login.store');
    Route::post('/logout', 'destroy')->name('logout');
});

// Đăng ký
Route::controller(RegisteredUserController::class)->group(function () {
    Route::get('/register', 'create')->name('register.create');
    Route::post('/register', 'store')->name('register.store');
});
