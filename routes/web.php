<?php

use App\Http\Controllers\NewsDashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Models\Author;

Route::get('/authors/{slug}', function($slug){
    $author = Author::where('slug', $slug)->firstOrFail();
    return view('authors.show', compact('author'));
})->name('authors.show');


Route::get('/authors', function(){
    $authors = Author::simplePaginate(20);
    return view('authors.index', compact('authors'));
})->name('authors.index');


Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');

// Route::get('/dashboard/news', [NewsDashboard::class, 'index'])->name('dashboard.news.index');
// Route::get('/dashboard/news/create', [NewsDashboard::class, 'create'])->name('dashboard.news.create');
// Route::post('/dashboard/news/create', [NewsDashboard::class, 'store'])->name('dashboard.news.store');

Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::resource('news', App\Http\Controllers\NewsDashboard::class)
        ->names('dashboard.news');
});



require __DIR__.'/dashboard/index.php';
require __DIR__.'/dashboard/approval.php';
require __DIR__.'/dashboard/books.php';
require __DIR__.'/dashboard/categories.php';
require __DIR__.'/dashboard/users.php';


require __DIR__.'/auth.php';
require __DIR__.'/account.php';
require __DIR__.'/book.php';
require __DIR__.'/category.php';
