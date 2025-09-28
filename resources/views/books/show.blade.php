@extends('layouts.app')
@section('content')
<div class="p-5 inline-flex space-x-5">
    <div class="border border-gray-100">
        <img src="{{ $book->image }}" alt="" class="h-[360px] w-[360px] object-contain">
    </div>
    <div>
        <h3 class="uppercase font-bold text-3xl mb-2 w-[500px]">{{ $book->title }}</h3>
        <p class="mb-4">Tác giả: <a class="uppercase hover:text-blue-700 hover:underline cursor-pointer font-bold">{{
                $book->author }}</a>
        </p>
        <p class=" border-t border-gray-300 py-4">Còn lại {{ $book->available_copies }} bản</p>
        <button type="submit"
            class="px-6 py-3 border border-gray-500 hover:text-white hover:bg-black transition-colors duration-300 ease-in-out">Mượn</button>
    </div>
</div>

<div class="my-20 flex justify-between items-center">
    <div>
        <h4 class="text-xl font-bold mb-2">Giới thiệu sách</h4>
        <div class="w-[900px] space-y-2">
            {!! $book->description !!}
        </div>
    </div>
    <div>
        <h4 class="text-xl font-bold mb-2">Thông tin chi tiết</h4>
        <ul class="border border-gray-400 px-6 py-5 space-y-2">
            <li class="flex before:content-['•'] before:mr-2">
                <span class="w-[150px] font-semibold">Tác giả:</span>
                <span class="uppercase w-[150px] break-words">{{ $book->author }}</span>
            </li>
            <li class="flex before:content-['•'] before:mr-2">
                <span class="w-[150px] font-semibold">Dịch giả:</span>
                <span class="uppercase w-[150px] break-words">{{ $book->translator }}</span>
            </li>
            <li class="flex before:content-['•'] before:mr-2">
                <span class="w-[150px] font-semibold">Nhà xuất bản:</span>
                <span class="w-[150px] break-words">
                    {{ $book->publisher }}
                </span>
            </li>
            <li class="flex before:content-['•'] before:mr-2">
                <span class="w-[150px] font-semibold">Kích thước:</span>
                <span class="w-[150px] break-words">{{ $book->size }}</span>
            </li>
            <li class="flex before:content-['•'] before:mr-2">
                <span class="w-[150px] font-semibold">Số trang:</span>
                <span class="w-[150px] break-words">{{ $book->pages }}</span>
            </li>
            <li class="flex before:content-['•'] before:mr-2">
                <span class="w-[150px] font-semibold">Ngày phát hành:</span>
                <span class="w-[150px] break-words">{{ $book->publish_date }}</span>
            </li>
        </ul>
    </div>
</div>
<x-book.list :books="$book->category->books()->where('id', '!=', $book->id)->take(5)->get()">
    Có thể bạn sẽ thích
</x-book.list>

@endsection