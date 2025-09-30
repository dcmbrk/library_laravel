<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(){
        $user = User::findOrFail(2);
        $wait_books = $user->books()->wherePivot('status', 'wait')->with('category')->take( 5)->get();
        $reading_books = $user->books()->wherePivot('status', 'reading')->with('category')->take(5)->get();
        $already_read_books = $user->books()->wherePivot('status', 'already_read')->with('category')->take( 5)->get();
        $overdue_books = $user->books()->wherePivot('status', 'overdue')->with('category')->take( 5)->get();
        return view('account.index', compact('wait_books', 'reading_books', 'already_read_books', 'overdue_books', 'user'));
    }

    public function show($status){
        $user = User::findOrFail(2);
        $books = $user->books()->wherePivot('status', $status)->with('category')->simplePaginate(20);;
        return view('account.show', compact('books'));
    }
}

// Route::get('account/{status}', function ($status) {
//     $user = User::findOrFail(2);

//     $books = $user->books()
//                   ->wherePivot('status', $status)
//                   ->with('category')
//                   ->simplePaginate(20);;

//     return view('account.show', compact('books'));
// })->whereIn('status', ['wait', 'reading', 'already_read'])
//   ->name('account.show');


// Route::get('/account', function () {
//     $user = User::findOrFail(2);

//     $wait_books = $user->books()
//                   ->wherePivot('status', 'wait')
//                   ->with('category')
//                   ->take( 5)
//                   ->get();

//     $reading_books = $user->books()
//                   ->wherePivot('status', 'reading')
//                   ->with('category')
//                   ->take(5)
//                   ->get();

//     $already_read_books = $user->books()
//                   ->wherePivot('status', 'already_read')
//                   ->with('category')
//                   ->take( 5)
//                   ->get();

//     $overdue_books = $user->books()
//                   ->wherePivot('status', 'overdue')
//                   ->with('category')
//                   ->take( 5)
//                   ->get();

//     return view('account.index', compact('wait_books', 'reading_books', 'already_read_books', 'overdue_books', 'user'));
// })->name('account.index');