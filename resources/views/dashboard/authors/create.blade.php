@extends('layouts.dashboard')

@section('content')
<div class="bg-white shadow p-6 rounded-lg">
    <h1 class="text-xl font-bold mb-4">Thêm tác giả mới</h1>

    @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
        <ul class="list-disc ml-5">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('dashboard.authors.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label class="block mb-1 text-sm font-medium">Tên tác giả</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200" required>
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium">Slug</label>
            <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200">
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium">Tiểu sử</label>
            <textarea name="bio" rows="4"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200">{{ old('bio') }}</textarea>
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium">Liên kết (URL)</label>
            <input type="url" name="url" value="{{ old('url') }}"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200" placeholder="https://...">
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium">Ảnh tác giả</label>
            <input type="file" name="image" class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200">
        </div>

        <div class="pt-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Lưu tác giả
            </button>
        </div>
    </form>
</div>

<script>
    document.getElementById('name').addEventListener('input', function () {
        let slug = this.value.toLowerCase()
            .normalize('NFD').replace(/[\u0300-\u036f]/g, '')
            .replace(/[^a-z0-9\s-]/g, '')
            .trim().replace(/\s+/g, '-');
        document.getElementById('slug').value = slug;
    });
</script>
@endsection