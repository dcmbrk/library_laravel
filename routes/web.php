<?php

use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SessionController;
use App\Models\Book;
use Illuminate\Support\Str;


//CATEGORY ROUTE//
Route::get('/dashboard/categories', function(){
    $categories = Category::paginate(10);
    return view('dashboard.categories.index', compact('categories'));
})->name('categories.index');


Route::get('/dashboard/categories/create', function(){
    return view('dashboard.categories.create');
})->name('categories.create');

Route::post('/dashboard/categories/store', function(){
    $slug = Str::slug(request()->get('name'), '-');
    Category::create([
        'name' => request()->get('name'),
        'slug' => $slug
    ]);
    return redirect()->route('categories.index');
})->name('categories.store');

Route::delete('/dashboard/categories/destroy/{id}', function ($id) {
    Category::destroy($id);
    return redirect()->route('categories.index');
})->name('categories.destroy');
//END CATEGORY ROUTE//


Route::get('/dashboard', function(){
    return view('dashboard.index');
})->name('dashboard.index');


Route::get('/dashboard/users', function(){
    $users = User::paginate(10);
    return view('dashboard.users.index', compact('users'));
});


Route::get('/dashboard/books', function(){
    $books = Book::paginate(10);
    return view('dashboard.books.index', compact('books'));
});



// AUTH ROUTER //
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register.create');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store'])->name('login.store');
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');

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