<?php

use App\Http\Controllers\ApprovalController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard/approval')->name('dashboard.approval.')->group(function () {
    Route::get('/{status}', [ApprovalController::class, 'show'])->name('index');
    Route::put('/{status}/{id}', [ApprovalController::class, 'update'])->name('update');
});