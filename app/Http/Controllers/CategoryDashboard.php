<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryDashboard extends Controller
{
    public function index()
    {
        // ✅ Dùng guard admin
        if (Auth::guard('admin')->guest()) {
            return redirect()->route('admin.login.index');
        }

        $user = Auth::guard('admin')->user();

        if ($user->role !== 'editor') {
            return redirect()->back();
        }

        $categories = Category::paginate(10);
        return view('dashboard.categories.index', compact(['categories', 'user']));
    }

    public function create()
    {
        if (Auth::guard('admin')->guest()) {
            return redirect()->route('admin.login.index');
        }

        $user = Auth::guard('admin')->user();

        if ($user->role !== 'editor') {
            return redirect()->back();
        }

        return view('dashboard.categories.create', compact('user'));
    }

    public function store()
    {
        $slug = Str::slug(request()->get('name'), '-');
        Category::create([
            'name' => request()->get('name'),
            'slug' => $slug,
        ]);

        return redirect()->route('dashboard.categories.index');
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('dashboard.categories.index');
    }

    public function edit($id)
    {
        if (Auth::guard('admin')->guest()) {
            return redirect()->route('admin.login.index');
        }

        $user = Auth::guard('admin')->user();

        if ($user->role !== 'editor') {
            return redirect()->back();
        }

        $category = Category::find($id);
        return view('dashboard.categories.edit', compact(['category', 'user']));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
        ]);

        return redirect()->route('dashboard.categories.index');
    }
}