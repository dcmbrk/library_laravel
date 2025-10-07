@extends('layouts.dashboard')
@section('content')
<div class="bg-white shadow p-4">
    <!-- Header -->
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Quản lý tin tức</h2>
        <a href="{{ route('dashboard.news.create') }}"
            class="px-4 py-2 bg-blue-600 text-white hover:bg-blue-700 rounded-lg">
            Tạo tin mới
        </a>
    </div>

    <div class="overflow-x-auto flex flex-col">
        <table class="min-w-[1500px] text-sm text-left border whitespace-nowrap">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                <tr>
                    <th class="px-6 py-3">Ảnh bìa</th>
                    <th class="px-6 py-3">Tiêu đề</th>
                    <th class="px-6 py-3">Ngày đăng</th>
                    <th class="px-6 py-3">Nội dung</th>
                    <th class="px-6 py-3">Mô tả</th>
                    <th class="px-6 py-3 sticky right-0 bg-gray-100">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($news as $n)
                <tr class="bg-white border-b">
                    <td class="px-6 py-4">
                        <img src="{{ $n->thumbnail }}" class="w-[156px] h-[90px] object-contain" alt="">
                    </td>
                    <td class="px-6 py-4 truncate max-w-[200px]">{{ $n->title }}</td>
                    <td class="px-6 py-4 truncate max-w-[200px]">{{ $n->date }}</td>
                    <td class="px-6 py-4 truncate max-w-[200px]">{{ $n->content_html }}</td>
                    <td class="px-6 py-4 truncate max-w-[200px]">{{ $n->description }}</td>
                    <td class="px-6 py-4 text-black space-y-4">
                        <a href="{{ route('dashboard.news.edit', $n->id) }}" class="text-blue-600 hover:underline">
                            Sửa
                        </a>
                        <form action="{{ route('dashboard.news.destroy', $n->id) }}" method="POST">
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
        {{ $news->links('vendor.pagination.custom') }}
    </div>
</div>
@endsection