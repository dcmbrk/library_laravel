<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
public function show($slug){
        $user = Auth::user();

        $book = Book::where('slug', $slug)->with('category')->firstOrFail();

        $status = DB::table('book_user')
        ->where('book_id', $book->id)
        ->where('user_id', $user?->id)
        ->orderByDesc('borrow_date')
        ->value('status') ?? 'none';


        $related_books = Book::where('category_id', $book->category_id)
        ->where('id', '!=', $book->id)
        ->take(5)
        ->get();

        return view('books.show', compact(['book', 'status', 'related_books', 'user']));
    }

    public function borrow(Book $book){
        if(Auth::guest()){
            return redirect()->route('login');
        }

        $user = Auth::user();
        $user->books()->attach($book->id, [
            'status'      => 'wait',
            'borrow_date' => now(),
            'due_date'    => now()->addDays(14),
        ]);

        $book->decrement('available_copies',1);
        return redirect()->route('account.index');
    }

   public function cancel(Book $book)
    {
        $user = Auth::user();

        $pivot = DB::table('book_user')
            ->where('user_id', $user->id)
            ->where('book_id', $book->id)
            ->orderByDesc('id')
            ->first();

        if ($pivot) {
            DB::table('book_user')->where('id', $pivot->id)->delete();
        }
        $book->increment('available_copies', 1);
        return redirect()->route('account.index');
    }

}