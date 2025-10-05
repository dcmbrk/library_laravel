<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $wait_books = $user->books()
            ->wherePivot('status', 'wait')
            ->with('category')
            ->groupBy('books.id')
            ->take(5)
            ->get();

        $reading_books = $user->books()
            ->wherePivot('status', 'reading')
            ->with('category')
            ->groupBy('books.id')
            ->take(5)
            ->get();

        $already_read_books = $user->books()
            ->wherePivot('status', 'returned')
            ->with('category')
            ->groupBy('books.id')
            ->take(5)
            ->get();

        $overdue_books = $user->books()
            ->wherePivot('status', 'overdue')
            ->with('category')
            ->groupBy('books.id')
            ->take(5)
            ->get();

        return view('account.index', compact('wait_books', 'reading_books', 'already_read_books', 'overdue_books', 'user'));
    }


    public function show($status)
    {
        $user = Auth::user();

        $books = $user->books()
            ->wherePivot('status', $status)
            ->with('category')
            ->groupBy('books.id')
            ->simplePaginate(20);

        return view('account.show', compact('books'));
    }

}
