@extends('layouts.dashboard')

@section('content')
<div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6">
    <h1 class="text-2xl font-bold mb-4">Tạo danh mục mới</h1>

    {{-- Hiển thị lỗi validate --}}
    @if ($errors->any())
    <div class="mb-4">
        <ul class="list-disc list-inside text-red-600 text-sm">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- Form create --}}
    <form action="{{ route('categories.update', $category->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Tên danh mục</label>
            <input type="text" name="name" id="name" value="{{ $category->name }}"
                class="outline-none p-2 border mt-1 block w-full rounded-md border-gray-300 shadow-sm  focus:border-gray-500">
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('categories.index') }}" class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Quay
                lại</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Lưu</button>
        </div>
    </form>
</div>
@endsection