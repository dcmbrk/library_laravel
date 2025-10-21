<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsDashboard extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->guest()) {
            return redirect()->route('admin.login.index');
        }

        $user = Auth::guard('admin')->user();

        if ($user->role !== 'admin') {
            return redirect()->back();
        }

        $news = News::paginate(10);
        return view('dashboard.news.index', compact(['news', 'user']));
    }

    public function create()
    {
        if (Auth::guard('admin')->guest()) {
            return redirect()->route('admin.login.index');
        }

        $user = Auth::guard('admin')->user();

        if ($user->role !== 'admin') {
            return redirect()->back();
        }

        return view('dashboard.news.create', compact(['user']));
    }

    public function store(Request $request)
    {
        if (Auth::guard('admin')->guest()) {
            return redirect()->route('admin.login.index');
        }

        $user = Auth::guard('admin')->user();

        if ($user->role !== 'admin') {
            return redirect()->back();
        }

        $validated = $request->validate([
            'title'         => 'required|string|max:255',
            'slug'          => 'required|string|unique:news,slug',
            'description'   => 'nullable|string|max:1000',
            'date'          => 'nullable|string|max:255',
            'url'           => 'nullable|url|max:255',
            'thumbnail'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'content_html'  => 'required|string',
        ]);

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('news', 'public');
            $validated['thumbnail'] = Storage::url($path);
        }

        News::create($validated);

        return redirect()->route('dashboard.news.index')->with('success', 'Tạo tin tức thành công!');
    }

    public function edit($id)
    {
        if (Auth::guard('admin')->guest()) {
            return redirect()->route('admin.login.index');
        }

        $user = Auth::guard('admin')->user();

        if ($user->role !== 'admin') {
            return redirect()->back();
        }

        $news = News::findOrFail($id);
        return view('dashboard.news.edit', compact(['news', 'user']));
    }

    public function update(Request $request, $id)
    {
        if (Auth::guard('admin')->guest()) {
            return redirect()->route('admin.login.index');
        }

        $user = Auth::guard('admin')->user();

        if ($user->role !== 'admin') {
            return redirect()->back();
        }

        $validated = $request->validate([
            'title'         => 'required|string|max:255',
            'slug'          => 'required|string|unique:news,slug,' . $id,
            'description'   => 'nullable|string|max:1000',
            'date'          => 'nullable|string|max:255',
            'url'           => 'nullable|url|max:255',
            'thumbnail'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'content_html'  => 'required|string',
        ]);

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('news', 'public');
            $validated['thumbnail'] = Storage::url($path);
        }

        $news = News::findOrFail($id);
        $news->update($validated);

        return redirect()->route('dashboard.news.index')->with('success', 'Cập nhật tin tức thành công!');
    }

    public function destroy($id)
    {
        if (Auth::guard('admin')->guest()) {
            return redirect()->route('admin.login.index');
        }

        $user = Auth::guard('admin')->user();

        if ($user->role !== 'admin') {
            return redirect()->back();
        }

        News::destroy($id);
        return redirect()->route('dashboard.news.index')->with('success', 'Xóa tin tức thành công!');
    }
}