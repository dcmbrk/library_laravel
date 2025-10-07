@extends('layouts.dashboard')

@section('content')
<div class="bg-white shadow p-6 rounded-lg">
    <h1 class="text-xl font-bold mb-4">Tạo tin tức mới</h1>

    {{-- Hiển thị lỗi --}}
    @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
        <ul class="list-disc ml-5">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- Form tạo tin tức --}}
    <form action="{{ route('dashboard.news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <!-- Tiêu đề -->
        <div>
            <label class="block mb-1 text-sm font-medium">Tiêu đề</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200 required">
        </div>

        <!-- Slug -->
        <div>
            <label class="block mb-1 text-sm font-medium">Slug</label>
            <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200">
        </div>

        <!-- Mô tả -->
        <div>
            <label class="block mb-1 text-sm font-medium">Mô tả</label>
            <textarea name="description" rows="3"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200">{{ old('description') }}</textarea>
        </div>

        <!-- Ngày đăng -->
        <div>
            <label class="block mb-1 text-sm font-medium">Ngày đăng</label>
            <input type="text" name="date" value="{{ old('date', $news->date ?? '') }}"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200">
        </div>

        <!-- Nguồn bài viết -->
        <div>
            <label class="block mb-1 text-sm font-medium">Nguồn (URL gốc)</label>
            <input type="url" name="url" value="{{ old('url') }}"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200" placeholder="https://...">
        </div>

        <!-- Ảnh bìa -->
        <div>
            <label class="block mb-1 text-sm font-medium">Ảnh bìa (thumbnail)</label>
            <input type="file" name="thumbnail" class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200">
        </div>

        <!-- Nội dung -->
        <div>
            <label class="block mb-1 text-sm font-medium">Nội dung HTML</label>
            <textarea name="content_html" rows="8"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200">{{ old('content_html') }}</textarea>
        </div>

        <!-- Submit -->
        <div class="pt-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Lưu tin tức
            </button>
        </div>
    </form>
</div>

{{-- Script tự tạo slug từ tiêu đề --}}
<script>
    document.getElementById('title').addEventListener('input', function () {
        let slug = this.value.toLowerCase()
            .normalize('NFD') // loại bỏ dấu tiếng Việt
            .replace(/[\u0300-\u036f]/g, '')
            .replace(/[^a-z0-9\s-]/g, '')
            .trim()
            .replace(/\s+/g, '-');
        document.getElementById('slug').value = slug;
    });
</script>
@endsection