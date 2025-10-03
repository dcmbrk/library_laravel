@extends('layouts.dashboard')
@section('content')
<div class="bg-white shadow p-6 rounded-lg">
    <h1 class="text-xl font-bold mb-4">Chỉnh sửa sách</h1>

    @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
        <ul class="list-disc ml-5">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('dashboard.books.update', $book->id) }}" method="POST" enctype="multipart/form-data"
        class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div>
            <label class="block mb-1 text-sm font-medium">Tên sách</label>
            <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200 required">
        </div>

        <!-- Slug -->
        <div>
            <label class="block mb-1 text-sm font-medium">Slug</label>
            <input type="text" name="slug" id="slug" value="{{ old('slug', $book->slug) }}"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200">
        </div>

        <!-- Author -->
        <div>
            <label class="block mb-1 text-sm font-medium">Tác giả</label>
            <input type="text" name="author" value="{{ old('author', $book->author) }}"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200">
        </div>

        <!-- Translator -->
        <div>
            <label class="block mb-1 text-sm font-medium">Dịch giả</label>
            <input type="text" name="translator" value="{{ old('translator', $book->translator) }}"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200">
        </div>

        <!-- Publisher -->
        <div>
            <label class="block mb-1 text-sm font-medium">Nhà xuất bản</label>
            <input type="text" name="publisher" value="{{ old('publisher', $book->publisher) }}"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200">
        </div>

        <!-- Publish Date -->
        <div>
            <label class="block mb-1 text-sm font-medium">Ngày xuất bản</label>
            <input type="text" name="publish_date" value="{{ old('publish_date', $book->publish_date) }}"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200">
        </div>

        <!-- Pages -->
        <div>
            <label class="block mb-1 text-sm font-medium">Số trang</label>
            <input type="number" name="pages" value="{{ old('pages', $book->pages) }}"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200">
        </div>

        <!-- Size -->
        <div>
            <label class="block mb-1 text-sm font-medium">Kích thước</label>
            <input type="text" name="size" value="{{ old('size', $book->size) }}"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200">
        </div>

        <!-- Total Copies -->
        <div>
            <label class="block mb-1 text-sm font-medium">Tổng số bản</label>
            <input type="number" name="total_copies" value="{{ old('total_copies', $book->total_copies) }}"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200">
        </div>

        <!-- Available Copies -->
        <div>
            <label class="block mb-1 text-sm font-medium">Số bản còn lại</label>
            <input type="number" name="available_copies" value="{{ old('available_copies', $book->available_copies) }}"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200">
        </div>

        <!-- Category -->
        <div>
            <label class="block mb-1 text-sm font-medium">Danh mục</label>
            <select name="category_id" class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200">
                <option value="">-- Chọn danh mục --</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $book->category_id) == $category->id ?
                    'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Description -->
        <div>
            <label class="block mb-1 text-sm font-medium">Mô tả</label>
            <textarea name="description" rows="4"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200">{{ old('description', $book->description) }}</textarea>
        </div>

        <!-- Image -->
        <div>
            <label class="block mb-1 text-sm font-medium">Ảnh bìa</label>
            <input type="file" name="image" class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200">
            @if($book->image)
            <img src="{{ $book->image }}" alt="Book cover" class="h-32 mt-2">
            @endif
        </div>

        <!-- Submit -->
        <div class="pt-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Cập nhật sách
            </button>
        </div>
    </form>
</div>

{{-- Script auto tạo slug từ title --}}
<script>
    document.getElementById('title').addEventListener('input', function () {
        let slug = this.value.toLowerCase()
            .replace(/ /g, '-')
            .replace(/[^\w-]+/g, '');
        document.getElementById('slug').value = slug;
    });
</script>
@endsection