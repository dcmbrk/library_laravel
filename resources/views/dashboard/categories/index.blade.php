@extends('layouts.dashboard')
@section('content')
<div class="relative overflow-x-auto bg-white shadow flex flex-col">

    <!-- Nút tạo danh mục -->
    <div class="flex justify-end p-4">
        <a href="{{ route('categories.create') }}"
            class="bg-blue-600 text-white px-4 py-2 hover:bg-blue-700 transition rounded-lg">
            Tạo danh mục
        </a>
    </div>

    <table class="w-full text-sm text-left rtl:text-right">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
            <tr>
                <th scope="col" class="px-6 py-3">tên danh mục</th>
                <th scope="col" class="px-6 py-3">ngày tạo</th>
                <th scope="col" class="px-6 py-3">hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr class="bg-white border-b border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-blue-600 whitespace-nowrap">
                    {{ $category->name }}
                </th>
                <td class="px-6 py-4 text-black">{{ $category->created_at }}</td>
                <td class="py-4 text-black flex space-x-8 ml-6">
                    <div><a href="" class="text-blue-600">Sửa</a></div>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="p-10 place-items-end">
        {{ $categories->links('vendor.pagination.custom') }}
    </div>
</div>
@endsection