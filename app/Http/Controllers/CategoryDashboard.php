<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryDashboard extends Controller
{
    public function index(){
        $categories = Category::paginate(10);
        return view('dashboard.categories.index', compact('categories'));
    }

    public function create(){
        return view('dashboard.categories.create');
    }

    public function store(){
        $slug = Str::slug(request()->get('name'), '-');
        Category::create([
            'name' => request()->get('name'),
            'slug' => $slug
        ]);
        return redirect()->route('categories.index');
    }

    public function destroy($id){
        Category::destroy($id);
        return redirect()->route('categories.index');
    }

    public function edit($id){
        $category = Category::find($id);
        return view('dashboard.categories.edit', compact('category'));
    }

    public function update(Request $request, $id){
        $request->validate([
        'name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
        ]);

        return redirect()->route('categories.index')
                        ->with('success', 'Cập nhật danh mục thành công!');
    }
}
