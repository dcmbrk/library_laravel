<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/dashboard', function () {
    if (Auth::guest()) {
        return redirect()->route('admin.login.index');
    }
    $user = Auth::user();
    return view('dashboard.index', compact('user'));
})->name('dashboard.index');
