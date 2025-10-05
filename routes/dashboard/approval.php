<?php

use App\Http\Controllers\ApprovalController;
use Illuminate\Support\Facades\Route;

Route::put('/dashboard/approval/{status}/{id}', [ApprovalController::class, 'update'])
    ->name('dashboard.approval.update');

Route::get('/dashboard/approval/{status}', [ApprovalController::class, 'show'])
    ->name('dashboard.approval.index');