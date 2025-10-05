<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(){
        $best_sellers = Book::with('category')->where('category_id', 1)->take(5)->get();
        $modern_literature = Book::with('category')->where('category_id', 9)->take(5)->get();

        return view('categories.index', compact('best_sellers', 'modern_literature'));
    }

    public function show($slug){

        $category = Category::where('slug', $slug)->firstOrFail();

        $books = $category->books()->with('category')->simplePaginate(20);
        return view('categories.show', compact('books', 'category'));
    }
}
