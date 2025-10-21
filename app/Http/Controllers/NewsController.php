<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index(){
        $news = News::simplePaginate(12);
        return view('news.index', compact(['news']));
    }

    public function show($slug){
    $news = News::where('slug', $slug)->firstOrFail();

    return view('news.show', compact('news'));
    }
}
