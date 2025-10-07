@extends('layouts.dashboard')

@section('content')
<div class="bg-white shadow p-4">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Quản lý tác giả</h2>
        <a href="{{ route('dashboard.authors.create') }}"
            class="px-4 py-2 bg-blue-600 text-white hover:bg-blue-700 rounded-lg">
            Thêm tác giả
        </a>
    </div>

    <div class="overflow-x-auto flex flex-col">
        <table class="min-w-[1200px] text-sm text-left border whitespace-nowrap">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                <tr>
                    <th class="px-6 py-3">Ảnh</th>
                    <th class="px-6 py-3">Tên</th>
                    <th class="px-6 py-3">Mô tả</th>
                    <th class="px-6 py-3">URL</th>
                    <th class="px-6 py-3 sticky right-0 bg-gray-100">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($authors as $author)
                <tr class="bg-white border-b">
                    <td class="px-6 py-4">
                        <img src="{{ $author->image }}" class="w-[90px] h-[90px] object-cover" alt="">
                    </td>
                    <td class="px-6 py-4 font-medium">{{ $author->name }}</td>
                    <td class="px-6 py-4 truncate max-w-[300px]">{{ $author->bio }}</td>
                    <td class="px-6 py-4 text-blue-600">
                        <a href="{{ $author->url }}" target="_blank">{{ $author->url }}</a>
                    </td>
                    <td class="px-6 py-4 space-y-2">
                        <a href="{{ route('dashboard.authors.edit', $author->id) }}"
                            class="text-blue-600 hover:underline">
                            Sửa
                        </a>
                        <form action="{{ route('dashboard.authors.destroy', $author->id) }}" method="POST"
                            onsubmit="return confirm('Bạn có chắc chắn muốn xóa tác giả này không?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="p-10 place-items-end">
        {{ $authors->links('vendor.pagination.custom') }}
    </div>
</div>
@endsection