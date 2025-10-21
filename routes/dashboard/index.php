<?php
use Illuminate\Support\Facades\Auth;

Route::get('/dashboard', function () {
    if (!Auth::guard('admin')->check()) {
        return redirect()->route('admin.login.index');
    }

    $user = Auth::guard('admin')->user();

    return view('dashboard.index', compact('user'));
})->name('dashboard.index');
