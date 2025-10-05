<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BookDashboard extends Controller
{
    public function index(){
        if(Auth::guest()){
           return redirect()->route('admin.login.index');
        }
        $user = Auth::user();
        $books = Book::paginate(10);
        return view('dashboard.books.index', compact(['books', 'user']));
    }

    public function create(){
        if(Auth::guest()){
           return redirect()->route('admin.login.index');
        }
        $user = Auth::user();
        $categories = Category::all();
        return view('dashboard.books.create', compact(['categories', 'user']));
    }

    public function destroy($id){
        Book::destroy($id);
        return redirect()->route('dashboard.books.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'slug'             => 'required|string|unique:books,slug',
            'author'           => 'nullable|string|max:255',
            'translator'       => 'nullable|string|max:255',
            'publisher'        => 'nullable|string|max:255',
            'publish_date'     => 'nullable|string|max:255',
            'pages'            => 'nullable|integer|min:0',
            'size'             => 'nullable|string|max:255',
            'total_copies'     => 'required|integer|min:0',
            'available_copies' => 'nullable|integer|min:0',
            'description'      => 'nullable|string',
            'url'              => 'nullable|url',
            'category_id'      => 'required|exists:categories,id',
            'image'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $validated['author']           = $validated['author'] ?? 'ĐANG CẬP NHẬT';
        $validated['translator']       = $validated['translator'] ?? 'ĐANG CẬP NHẬT';
        $validated['publisher']        = $validated['publisher'] ?? 'ĐANG CẬP NHẬT';
        $validated['publish_date']     = $validated['publish_date'] ?? 'ĐANG CẬP NHẬT';
        $validated['pages']            = $validated['pages'] ?? 0;
        $validated['size']             = $validated['size'] ?? 'ĐANG CẬP NHẬT';
        $validated['available_copies'] = $validated['available_copies'] ?? $validated['total_copies'];

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('books', 'public');
            $validated['image'] = Storage::url($path);
        }

        Book::create($validated);

        return redirect()->route('dashboard.books.index', compact('user'));
    }


    public function edit($id){
        if(Auth::guest()){
            return redirect()->route('login');
        }

        $user = Auth::user();

        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('dashboard.books.edit', compact(['book', 'categories', 'user']));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
        'title' => 'required|string|max:255',
        'slug' => 'required|string|unique:books,slug,' . $id, // cho phép giữ slug cũ
        'author' => 'nullable|string|max:255',
        'translator' => 'nullable|string|max:255',
        'publisher' => 'nullable|string|max:255',
        'publish_date' => 'nullable|string|max:255',
        'pages' => 'nullable|integer|min:0',
        'size' => 'nullable|string|max:255',
        'total_copies' => 'required|integer|min:0',
        'available_copies' => 'nullable|integer|min:0',
        'description' => 'nullable|string',
        'url' => 'nullable|url',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    // ép giá trị mặc định
    $validated['author'] = $validated['author'] ?? 'ĐANG CẬP NHẬT';
    $validated['translator'] = $validated['translator'] ?? 'ĐANG CẬP NHẬT';
    $validated['publisher'] = $validated['publisher'] ?? 'ĐANG CẬP NHẬT';
    $validated['publish_date'] = $validated['publish_date'] ?? 'ĐANG CẬP NHẬT';
    $validated['pages'] = $validated['pages'] ?? 0;
    $validated['size'] = $validated['size'] ?? 'ĐANG CẬP NHẬT';
    $validated['available_copies'] = $validated['available_copies'] ?? $validated['total_copies'];

    // xử lý upload ảnh
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('books', 'public');
        $validated['image'] = Storage::url($path);
    }

    $book = Book::findOrFail($id);
    $book->update($validated);

    return redirect()->route('dashboard.books.index')
                     ->with('success', 'Cập nhật sách thành công!');
    }
}
