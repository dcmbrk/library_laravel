<?php

use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoryController;

// AUTH ROUTER //
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register.create');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');
// END AUTH ROUTER //


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
