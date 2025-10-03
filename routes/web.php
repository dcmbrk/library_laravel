<?php

use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\BookDashboard;
use App\Http\Controllers\CategoryDashboard;
use App\Http\Controllers\UserDashboard;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ApprovalController;
use App\Models\Book;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


// DASHBOARD VIEW //
Route::view('/dashboard', 'dashboard.index')->name('dashboard.index');

//CATEGORY ROUTE//
Route::get('/dashboard/categories', [CategoryDashboard::class, 'index'])->name('categories.index');
Route::get('/dashboard/categories/create', [CategoryDashboard::class, 'create'])->name('categories.create');
Route::post('/dashboard/categories/store', [CategoryDashboard::class, 'store'])->name('categories.store');
Route::delete('/dashboard/categories/{id}/destroy', [CategoryDashboard::class, 'destroy'])->name('categories.destroy');
Route::get('/dashboard/categories/{id}/edit', [CategoryDashboard::class, 'edit'])->name('categories.edit');
Route::put('/dashboard/categories/{id}', [CategoryDashboard::class, 'update'])->name('categories.update');
//END CATEGORY ROUTE//


//APPROVAL DASHBOARD ROUTE //

Route::get('/dashboard/{status}', [ApprovalController::class, 'show'])
    ->where('status', 'wait|reading|returned|rejected')
    ->name('dashboard.status');

Route::get('/dashboard/overdue', [ApprovalController::class, 'overdue'])
    ->name('dashboard.overdue');

Route::post('/dashboard/approval/{book}/borrow', [ApprovalController::class, 'approval'])
    ->name('books.borrow.approval');

Route::delete('/dashboard/approval/{book}/borrow', [ApprovalController::class, 'cancel'])
    ->name('books.borrow.cancel');

Route::put('/dashboard/approval/{book}/return', [ApprovalController::class, 'returnBook'])
    ->name('books.borrow.return');


// END APPROVAL DASHBOARD ROUTE //

// USERS DASHBOARD ROUTE //
Route::get('/dashboard/users', [UserDashboard::class, 'index']);
// END USERS DASHBOARD ROUTE //

// BOOKS DASHBOARD ROUTE //
Route::get('/dashboard/books', [BookDashboard::class, 'index'])->name('dashboard.books.index');
Route::get('/dashboard/books/create', [BookDashboard::class, 'create'])->name('dashboard.books.create');
Route::delete('/dashboard/books/{id}/destroy', [BookDashboard::class, 'destroy'])->name('dashboard.books.destroy');
Route::post('/dashboard/books/store', [BookDashboard::class, 'store'])->name('dashboard.books.store');
Route::get('/dashboard/books/{id}/edit', [BookDashboard::class, 'edit'])->name('dashboard.books.edit');
Route::put('/dashboard/books/{id}', [BookDashboard::class, 'update'])->name('dashboard.books.update');
// END BOOKS DASHBOARD ROUTE //

// AUTH ROUTER //
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register.create');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store'])->name('login.store');
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');
// END AUTH ROUTER //

// ADMIN AUTH ROUTER //
Route::get('/dashboard/login', [AdminAuthController::class, 'index'])->name('admin.login.index');
Route::post('/dashboard/login/store', [AdminAuthController::class, 'login'])->name('admin.login');
Route::get('/dashboard/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// BOOK ROUTER //
Route::get('books/{slug}', [BookController::class, 'show'])->name('books.show');
Route::post('books/{book}/borrow', [BookController::class, 'borrow'])->name('books.borrow');
Route::delete('books/{book}/borrow', [BookController::class, 'cancel'])->name('books.borrow.cancel');
// END BOOK ROUTER //

// ACCOUNT ROUTER//
Route::get('/account', [AccountController::class, 'index'])->name('account.index');
Route::get('/account/{status}', [AccountController::class, 'show'])->name('account.show');
// END ACCOUNT ROUTER//

// CATEGORY ROUTER //
Route::get('/', [CategoryController::class, 'index'])->name('category.index');
Route::get('/{slug}', [CategoryController::class, 'show'])->name('category.show');
// END CATEGORY ROUTER //