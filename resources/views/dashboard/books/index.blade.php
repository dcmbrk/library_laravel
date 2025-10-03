@extends('layouts.dashboard')
@section('content')
<div class="bg-white shadow p-4">
    <!-- Header -->
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Quản lý sách</h2>
        <a href="{{ route('dashboard.books.create') }}"
            class="px-4 py-2 bg-blue-600 text-white hover:bg-blue-700 rounded-lg">
            Tạo sách mới
        </a>
    </div>

    <div class="overflow-x-auto flex flex-col">
        <table class="min-w-[1500px] text-sm text-left border whitespace-nowrap">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                <tr>
                    <th class="px-6 py-3">Ảnh bìa</th>
                    <th class="px-6 py-3">Tiêu đề</th>
                    <th class="px-6 py-3">Tác giả</th>
                    <th class="px-6 py-3">Dịch giả</th>
                    <th class="px-6 py-3">NXB</th>
                    <th class="px-6 py-3">Năm</th>
                    <th class="px-6 py-3">Số trang</th>
                    <th class="px-6 py-3">Kích thước</th>
                    <th class="px-6 py-3">Tổng</th>
                    <th class="px-6 py-3">Còn lại</th>
                    <th class="px-6 py-3">Mô tả</th>
                    <th class="px-6 py-3">Ngày tạo</th>
                    <th class="px-6 py-3">Phân loại</th>
                    <th class="px-6 py-3 sticky right-0 bg-gray-100">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                <tr class="bg-white border-b">
                    <td class="px-6 py-4"><img class="w-[128px] h-[128px] object-contain" src="{{ $book->image }}"
                            alt=""></td>
                    <td class="px-6 py-4 max-w-[200px] truncate">{{ $book->title }}</td>
                    <td class="px-6 py-4 max-w-[200px] truncate">{{ $book->author }}</td>
                    <td class="px-6 py-4 max-w-[200px] truncate">{{ $book->translator }}</td>
                    <td class="px-6 py-4 max-w-[200px] truncate">{{ $book->publisher }}</td>
                    <td class="px-6 py-4 max-w-[200px] truncate">{{ $book->publish_date }}</td>
                    <td class="px-6 py-4 max-w-[200px] truncate">{{ $book->pages }}</td>
                    <td class="px-6 py-4 max-w-[200px] truncate">{{ $book->size }}</td>
                    <td class="px-6 py-4 max-w-[200px] truncate">{{ $book->total_copies }}</td>
                    <td class="px-6 py-4 max-w-[200px] truncate">{{ $book->available_copies }}</td>
                    <!-- truncate mô tả -->
                    <td class="px-6 py-4 max-w-[200px] truncate">{{ $book->description }}</td>
                    <td class="px-6 py-4 max-w-[200px] truncate">{{ $book->created_at }}</td>
                    <td class="px-6 py-4 max-w-[200px] truncate">
                        <span class="px-2 py-1 text-xs bg-green-100 text-green-600 rounded">{{
                            $book->category->name}}</span>
                    </td>
                    <td class="px-6 py-4 max-w-[200px] truncate sticky right-0 bg-white space-y-2">
                        <a href="{{ route('dashboard.books.edit', $book->id) }}"
                            class="text-blue-600 hover:underline mr-2">Sửa</a>

                        <form action="{{ route('dashboard.books.destroy', $book->id) }}" method="POST">
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
        {{ $books->links('vendor.pagination.custom') }}
    </div>
</div>
@endsection