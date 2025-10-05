<?php

use App\Http\Controllers\AccountController;

Route::controller(AccountController::class)->group(function () {
    Route::get('/account', 'index')->name('account.index');
    Route::get('/account/{status}', 'show')->name('account.show');
});