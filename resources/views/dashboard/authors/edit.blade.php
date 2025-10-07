@extends('layouts.dashboard')

@section('content')
<div class="bg-white shadow p-6 rounded-lg">
    <h1 class="text-xl font-bold mb-4">Chỉnh sửa tác giả</h1>

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
    <form action="{{ route('dashboard.authors.update', $author->id) }}" method="POST" enctype="multipart/form-data"
        class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Tên tác giả -->
        <div>
            <label class="block mb-1 text-sm font-medium">Tên tác giả</label>
            <input type="text" name="name" id="name" value="{{ old('name', $author->name) }}"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200" required>
        </div>

        <!-- Slug -->
        <div>
            <label class="block mb-1 text-sm font-medium">Slug</label>
            <input type="text" name="slug" id="slug" value="{{ old('slug', $author->slug) }}"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200">
        </div>

        <!-- Tiểu sử -->
        <div>
            <label class="block mb-1 text-sm font-medium">Tiểu sử</label>
            <textarea name="bio" rows="4"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200">{{ old('bio', $author->bio) }}</textarea>
        </div>

        <!-- URL -->
        <div>
            <label class="block mb-1 text-sm font-medium">Liên kết (URL)</label>
            <input type="url" name="url" value="{{ old('url', $author->url) }}"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200" placeholder="https://...">
        </div>

        <!-- Ảnh tác giả -->
        <div>
            <label class="block mb-1 text-sm font-medium">Ảnh hiện tại</label>
            @if($author->image)
            <img src="{{ $author->image }}" alt="{{ $author->name }}"
                class="w-[150px] h-[150px] object-cover rounded-full border mb-3">
            @else
            <p class="text-gray-500 italic">Chưa có ảnh</p>
            @endif

            <label class="block mb-1 text-sm font-medium">Chọn ảnh mới (nếu muốn thay)</label>
            <input type="file" name="image" class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200">
        </div>

        <!-- Nút lưu -->
        <div class="pt-4 flex justify-between">
            <a href="{{ route('dashboard.authors.index') }}"
                class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300">
                Quay lại
            </a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Cập nhật tác giả
            </button>
        </div>
    </form>
</div>

{{-- Script tự tạo slug từ tên --}}
<script>
    document.getElementById('name').addEventListener('input', function () {
        let slug = this.value.toLowerCase()
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '')
            .replace(/[^a-z0-9\s-]/g, '')
            .trim()
            .replace(/\s+/g, '-');
        document.getElementById('slug').value = slug;
    });
</script>
@endsection