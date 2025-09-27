<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/account/books', function () {
    return view('account.books');
});


Route::get('/books', function () {
    return view('books.index');
});

Route::get('/books/1', function () {
    return view('books.show');
});
