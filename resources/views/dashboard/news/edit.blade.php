@extends('layouts.dashboard')

@section('content')
<div class="bg-white shadow p-6 rounded-lg">
    <h1 class="text-xl font-bold mb-4">Chỉnh sửa tin tức</h1>

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

    {{-- Form chỉnh sửa --}}
    <form action="{{ route('dashboard.news.update', $news->id) }}" method="POST" enctype="multipart/form-data"
        class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Tiêu đề -->
        <div>
            <label class="block mb-1 text-sm font-medium">Tiêu đề</label>
            <input type="text" name="title" id="title" value="{{ old('title', $news->title) }}"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200 required">
        </div>

        <!-- Slug -->
        <div>
            <label class="block mb-1 text-sm font-medium">Slug</label>
            <input type="text" name="slug" id="slug" value="{{ old('slug', $news->slug) }}"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200">
        </div>

        <!-- Mô tả -->
        <div>
            <label class="block mb-1 text-sm font-medium">Mô tả</label>
            <textarea name="description" rows="3"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200">{{ old('description', $news->description) }}</textarea>
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
            <input type="url" name="url" value="{{ old('url', $news->url) }}"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200" placeholder="https://...">
        </div>

        <!-- Ảnh bìa -->
        <div>
            <label class="block mb-1 text-sm font-medium">Ảnh bìa hiện tại</label>
            @if($news->thumbnail)
            <img src="{{ $news->thumbnail }}" alt="Thumbnail" class="w-[200px] h-auto rounded mb-2 border">
            @else
            <p class="text-gray-500 italic">Chưa có ảnh bìa</p>
            @endif
            <label class="block mb-1 text-sm font-medium">Chọn ảnh bìa mới (nếu muốn thay)</label>
            <input type="file" name="thumbnail" class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200">
        </div>

        <!-- Nội dung -->
        <div>
            <label class="block mb-1 text-sm font-medium">Nội dung HTML</label>
            <textarea name="content_html" rows="8"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200">{{ old('content_html', $news->content_html) }}</textarea>
        </div>

        <!-- Submit -->
        <div class="pt-4 flex justify-between">
            <a href="{{ route('dashboard.news.index') }}"
                class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300">
                Quay lại
            </a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Cập nhật tin tức
            </button>
        </div>
    </form>
</div>

{{-- Script tự tạo slug từ tiêu đề --}}
<script>
    document.getElementById('title').addEventListener('input', function () {
        let slug = this.value.toLowerCase()
            .normalize('NFD') // bỏ dấu tiếng Việt
            .replace(/[\u0300-\u036f]/g, '')
            .replace(/[^a-z0-9\s-]/g, '')
            .trim()
            .replace(/\s+/g, '-');
        document.getElementById('slug').value = slug;
    });
</script>
@endsection