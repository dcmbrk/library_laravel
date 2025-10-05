<?php

use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\BookDashboard;
use App\Http\Controllers\CategoryDashboard;
use App\Http\Controllers\UserDashboard;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ApprovalController;
use Illuminate\Support\Facades\Auth;


Route::put('/dashboard/approval/{status}/{id}', [ApprovalController::class, 'update'])
    ->name('dashboard.approval.update');
Route::get('/dashboard/approval/{status}', [ApprovalController::class, 'show'])->name('dashboard.approval.index');

Route::get('/dashboard', function(){
    if(Auth::guest()){
        return redirect()->route('admin.login.index');
    }
    $user = Auth::user();

    return view('dashboard.index', compact('user'));
})->name('dashboard.index');


Route::get('/dashboard/users', [UserDashboard::class, 'index']);

Route::controller(AdminAuthController::class)->group(function () {
    Route::get('/dashboard/login', 'index')->name('admin.login.index');
    Route::post('/dashboard/login', 'login')->name('admin.login');
    Route::get('/dashboard/logout', 'logout')->name('admin.logout');
});

Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::resource('categories', CategoryDashboard::class);
    Route::resource('books', BookDashboard::class);
});

Route::controller(RegisteredUserController::class)->group(function () {
    Route::get('/register', 'create')->name('register.create');
    Route::post('/register', 'store')->name('register.store');
});

Route::controller(SessionController::class)->group(function () {
    Route::get('/login', 'create')->name('login');
    Route::post('/login', 'store')->name('login.store');
    Route::post('/logout', 'destroy')->name('logout');
});

Route::controller(AccountController::class)->group(function () {
    Route::get('/account', 'index')->name('account.index');
    Route::get('/account/{status}', 'show')->name('account.show');
});

Route::controller(BookController::class)->group(function () {
    Route::get('books/{slug}', 'show')->name('books.show');
    Route::post('books/{book}/borrow', 'borrow')->name('books.borrow');
    Route::delete('books/{book}/borrow', 'cancel')->name('books.cancel');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/', 'index')->name('category.index');
    Route::get('/{slug}', 'show')->name('category.show');
});
