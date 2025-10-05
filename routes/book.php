<?php

use App\Http\Controllers\BookController;

Route::controller(BookController::class)->group(function () {
    Route::get('books/{slug}', 'show')->name('books.show');
    Route::post('books/{book}/borrow', 'borrow')->name('books.borrow');
    Route::delete('books/{book}/borrow', 'cancel')->name('books.cancel');
});