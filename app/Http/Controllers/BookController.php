<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function show($slug){
        $user = User::findOrFail(id: 2);

        $book = Book::where('slug', $slug)
            ->with('category')
            ->firstOrFail();

            $status = DB::table('book_user')
            ->where('book_id', $book->id)
            ->where('user_id', $user->id)
            ->value('status') ?? 'none';

            $related_books = Book::where('category_id', $book->category_id)
            ->where('id', '!=', $book->id)
            ->take(5)
            ->get();


        return view('books.show', compact('book', 'status', 'related_books'));
    }

    public function borrow(Request $request, Book $book){
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
    }

    public function cancel(Request $request, Book $book){
        $user = User::findOrFail(2);
        // Kiểm tra nếu user đã mượn sách thì mới detach
        if ($user->books()->where('book_id', $book->id)->exists()) {
            $user->books()->detach($book->id);
            return redirect()->route('account.index')->with('success', 'Đã hủy mượn sách.');
        }
        return back()->with('error', 'Bạn chưa mượn sách này.');
    }
}