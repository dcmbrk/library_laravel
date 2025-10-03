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
use Illuminate\Http\Request;


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

Route::delete('/dashboard/categories/{id}/destroy', function ($id) {
    Category::destroy($id);
    return redirect()->route('categories.index');
})->name('categories.destroy');

Route::get('/dashboard/categories/{id}/edit', function ($id) {
    $category = Category::find($id);
    return view('dashboard.categories.edit', compact('category'));
})->name('categories.edit');

Route::put('/dashboard/categories/{id}', function(Request $request, $id){
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $category = Category::findOrFail($id);
    $category->update([
        'name' => $request->name,
        'slug' => Str::slug($request->name, '-'),
    ]);

    return redirect()->route('categories.index')
                     ->with('success', 'Cập nhật danh mục thành công!');
})->name('categories.update');

//END CATEGORY ROUTE//


Route::get('/dashboard', function(){
    return view('dashboard.index');
})->name('dashboard.index');


Route::get('/dashboard/users', function(){
    $users = User::paginate(10);
    return view('dashboard.users.index', compact('users'));
});


// BOOKS DASHBOARD ROUTE //
Route::get('/dashboard/books', function(){
    $books = Book::paginate(10);
    return view('dashboard.books.index', compact('books'));
})->name('dashboard.books.index');

Route::get('/dashboard/books/create', function(){
    $categories = Category::all();
    return view('dashboard.books.create', compact('categories'));
})->name('dashboard.books.create');

Route::delete('/dashboard/books/{id}/destroy', function ($id) {
    Book::destroy($id);
    return redirect()->route('dashboard.books.index');
})->name('dashboard.books.destroy');

Route::post('/dashboard/books/store', function (Request $request) {
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'slug' => 'required|string|unique:books,slug',
        'author' => 'nullable|string|max:255',
        'translator' => 'nullable|string|max:255',
        'publisher' => 'nullable|string|max:255',
        'publish_date' => 'nullable|string|max:255',
        'pages' => 'nullable|integer|min:0',
        'size' => 'nullable|string|max:255',
        'total_copies' => 'required|integer|min:0',
        'available_copies' => 'nullable|integer|min:0',
        'description' => 'nullable|string',
        'url' => 'nullable|url',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    // ép giá trị mặc định khi null
    $validated['author'] = $validated['author'] ?? 'ĐANG CẬP NHẬT';
    $validated['translator'] = $validated['translator'] ?? 'ĐANG CẬP NHẬT';
    $validated['publisher'] = $validated['publisher'] ?? 'ĐANG CẬP NHẬT';
    $validated['publish_date'] = $validated['publish_date'] ?? 'ĐANG CẬP NHẬT';
    $validated['pages'] = $validated['pages'] ?? 0;
    $validated['size'] = $validated['size'] ?? 'ĐANG CẬP NHẬT';
    $validated['available_copies'] = $validated['available_copies'] ?? $validated['total_copies'];

    // xử lý upload ảnh
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('books', 'public');
        $validated['image'] = Storage::url($path);
    }

    Book::create($validated);

    return redirect()->route('dashboard.books.index')
        ->with('success', 'Thêm sách thành công!');
})->name('dashboard.books.store');

// EDIT
Route::get('/dashboard/books/{id}/edit', function($id) {
    $book = Book::findOrFail($id);
    $categories = Category::all();
    return view('dashboard.books.edit', compact('book', 'categories'));
})->name('dashboard.books.edit');

// UPDATE
Route::put('/dashboard/books/{id}', function(Request $request, $id) {
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'slug' => 'required|string|unique:books,slug,' . $id, // cho phép giữ slug cũ
        'author' => 'nullable|string|max:255',
        'translator' => 'nullable|string|max:255',
        'publisher' => 'nullable|string|max:255',
        'publish_date' => 'nullable|string|max:255',
        'pages' => 'nullable|integer|min:0',
        'size' => 'nullable|string|max:255',
        'total_copies' => 'required|integer|min:0',
        'available_copies' => 'nullable|integer|min:0',
        'description' => 'nullable|string',
        'url' => 'nullable|url',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    // ép giá trị mặc định
    $validated['author'] = $validated['author'] ?? 'ĐANG CẬP NHẬT';
    $validated['translator'] = $validated['translator'] ?? 'ĐANG CẬP NHẬT';
    $validated['publisher'] = $validated['publisher'] ?? 'ĐANG CẬP NHẬT';
    $validated['publish_date'] = $validated['publish_date'] ?? 'ĐANG CẬP NHẬT';
    $validated['pages'] = $validated['pages'] ?? 0;
    $validated['size'] = $validated['size'] ?? 'ĐANG CẬP NHẬT';
    $validated['available_copies'] = $validated['available_copies'] ?? $validated['total_copies'];

    // xử lý upload ảnh
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('books', 'public');
        $validated['image'] = Storage::url($path);
    }

    $book = Book::findOrFail($id);
    $book->update($validated);

    return redirect()->route('dashboard.books.index')
                     ->with('success', 'Cập nhật sách thành công!');
})->name('dashboard.books.update');



// END BOOKS DASHBOARD ROUTE //


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
