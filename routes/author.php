<?php
use App\Models\Author;

Route::get('/authors/{slug}', function($slug){
    $author = Author::where('slug', $slug)->firstOrFail();
    return view('authors.show', compact('author'));
})->name('authors.show');


Route::get('/authors', function(){
    $authors = Author::simplePaginate(20);
    return view('authors.index', compact('authors'));
})->name('authors.index');
