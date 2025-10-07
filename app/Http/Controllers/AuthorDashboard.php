<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthorDashboard extends Controller
{
    public function index()
    {
        if (Auth::guest()) {
            return redirect()->route('admin.login.index');
        }

        $user = Auth::user();
        if ($user->role !== 'editor' && $user->role !== 'admin') {
            return redirect()->back();
        }

        $authors = Author::paginate(10);
        return view('dashboard.authors.index', compact('authors', 'user'));
    }

    public function create()
    {
        if (Auth::guest()) {
            return redirect()->route('admin.login.index');
        }

        $user = Auth::user();
        if ($user->role !== 'editor' && $user->role !== 'admin') {
            return redirect()->back();
        }

        return view('dashboard.authors.create', compact('user'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'slug'  => 'required|string|unique:authors,slug',
            'bio'   => 'nullable|string',
            'url'   => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('authors', 'public');
            $validated['image'] = Storage::url($path);
        }

        Author::create($validated);

        return redirect()->route('dashboard.authors.index')->with('success', 'Thêm tác giả thành công!');
    }

    public function edit($id)
    {
        $user = Auth::user();
        if ($user->role !== 'editor' && $user->role !== 'admin') {
            return redirect()->back();
        }

        $author = Author::findOrFail($id);
        return view('dashboard.authors.edit', compact('author', 'user'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'slug'  => 'required|string|unique:authors,slug,' . $id,
            'bio'   => 'nullable|string',
            'url'   => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $author = Author::findOrFail($id);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('authors', 'public');
            $validated['image'] = Storage::url($path);
        }

        $author->update($validated);
        return redirect()->route('dashboard.authors.index')->with('success', 'Cập nhật tác giả thành công!');
    }

    public function destroy($id)
    {
        Author::destroy($id);
        return redirect()->route('dashboard.authors.index')->with('success', 'Đã xóa tác giả!');
    }
}
