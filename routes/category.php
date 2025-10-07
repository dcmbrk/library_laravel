<?php

use App\Http\Controllers\CategoryController;

Route::controller(CategoryController::class)->group(function () {
    Route::get('/', 'index')->name('category.index');
    Route::get('/{slug}', 'show')->name('category.show');
    Route::get('/category/author/{author_id}', 'author')->name('category.author');
});
