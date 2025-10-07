<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(){
        $authors = Author::all()->skip(14)->take(6);

        $best_sellers = Book::with('category')->where('category_id', 1)->take(5)->get();
        $modern_literature = Book::with('category')->where('category_id', 9)->take(5)->get();

        $news = News::all()->take(6);
        $news_list = News::all()->skip(6)->take(3);

        return view('categories.index', compact(['best_sellers', 'modern_literature', 'authors', 'news', 'news_list']));
    }

    public function show($slug){

        $category = Category::where('slug', $slug)->firstOrFail();

        $books = $category->books()->with('category')->simplePaginate(20);
        return view('categories.show', compact('books', 'category'));
    }

    public function author($slug)
{
    $author = Author::where('slug', $slug)->firstOrFail();

    $books = Book::where('author_id', $author->id)
        ->with(['author', 'category'])
        ->simplePaginate(20);

    return view('categories.author', compact('books', 'author'));
}

}