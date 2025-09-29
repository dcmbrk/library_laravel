<?php
use Illuminate\Support\Facades\Route;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



// BOOK ROUTER //
Route::get('books/{slug}', function ($slug) {
    $user = User::findOrFail(id: 2);

    // Lấy book theo slug (không phụ thuộc pivot)
    $book = Book::where('slug', $slug)
        ->with('category')
        ->firstOrFail();

    // Kiểm tra trong pivot có không
    $status = DB::table('book_user')
        ->where('book_id', $book->id)
        ->where('user_id', $user->id)
        ->value('status') ?? 'none';

    return view('books.show', compact('book', 'status'));
})->name('books.show');

Route::post('books/{book}/borrow', function(Request $request, Book $book){
    $user = User::findOrFail(id: 2);
    // // Kiểm tra nếu user đã mượn rồi thì không cho mượn lại
    if ($user->books()->where('book_id', $book->id)->exists()) {
        return back()->with('error', 'Bạn đã mượn sách này rồi.');
    }
    // Gắn bản ghi vào pivot table book_user
    $user->books()->attach($book->id, [
        'status'      => 'wait',
        'borrow_date' => now(),
        'due_date'    => now()->addDays(14),
    ]);

    return redirect()->route('account.index');
})->name(name: 'books.borrow');

Route::delete('books/{book}/borrow', function (Request $request, Book $book) {
    $user = User::findOrFail(2);

    // Kiểm tra nếu user đã mượn sách thì mới detach
    if ($user->books()->where('book_id', $book->id)->exists()) {
        $user->books()->detach($book->id);
        return redirect()->route('account.index')->with('success', 'Đã hủy mượn sách.');
    }

    return back()->with('error', 'Bạn chưa mượn sách này.');
})->name('books.borrow.cancel');


// ACCOUNT ROUTER//
Route::get('/account', function () {
    $user = User::findOrFail(2);

    $wait_books = $user->books()
                  ->wherePivot('status', 'wait')
                  ->with('category')
                  ->take( 5)
                  ->get();

    $reading_books = $user->books()
                  ->wherePivot('status', 'reading')
                  ->with('category')
                  ->take(5)
                  ->get();

    $already_read_books = $user->books()
                  ->wherePivot('status', 'already_read')
                  ->with('category')
                  ->take( 5)
                  ->get();

    $overdue_books = $user->books()
                  ->wherePivot('status', 'overdue')
                  ->with('category')
                  ->take( 5)
                  ->get();

    return view('account.index', compact('wait_books', 'reading_books', 'already_read_books', 'overdue_books', 'user'));
})->name('account.index');

Route::get('account/{status}', function ($status) {
    $user = User::findOrFail(2);

    $books = $user->books()
                  ->wherePivot('status', $status)
                  ->with('category')
                  ->simplePaginate(20);;

    return view('account.show', compact('books'));
})->whereIn('status', ['wait', 'reading', 'already_read'])
  ->name('account.show');



// CATEGORY ROUTER //
Route::get('/', function(){

    $best_sellers = Book::with('category')
             ->where('category_id', 1)
             ->take(5)
             ->get();

    $modern_literature = Book::with('category')
            ->where('category_id', 9)
            ->take(5)
            ->get();

    return view('categories.index', compact('best_sellers', 'modern_literature'));
});

Route::get('/{slug}', function ($slug) {
    // Tìm category theo slug
    $category = Category::where('slug', $slug)->firstOrFail();

    // Lấy danh sách sách thuộc category đó
    $books = $category->books()->with('category')->simplePaginate(20);

    return view('categories.show', compact('books', 'category'));
})->name('categories.show');
