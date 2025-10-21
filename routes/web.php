<?php

use App\Http\Controllers\MailController;
Route::get('/send-mail', [MailController::class, 'sendMail']);

require __DIR__.'/dashboard/index.php';
require __DIR__.'/dashboard/auth.php';
require __DIR__.'/dashboard/approval.php';
require __DIR__.'/dashboard/books.php';
require __DIR__.'/dashboard/categories.php';
require __DIR__.'/dashboard/users.php';
require __DIR__.'/dashboard/news.php';

require __DIR__.'/author.php';
require __DIR__.'/news.php';
require __DIR__.'/auth.php';
require __DIR__.'/account.php';
require __DIR__.'/book.php';
require __DIR__.'/category.php';
