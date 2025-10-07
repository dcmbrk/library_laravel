@extends('layouts.app')
@section('content')

<section class="w-full bg-white">
    <div class="flex mb-6  mx-auto space-x-[30px] w-[1200px]">
        <a href="{{ route('news.show', $news->first()->slug) }}" class="flex-4 flex flex-col items-center bg-white">
            <div class="border border-white w-full p-1 shadow-sm">
                <img src="{{ $news->first()->thumbnail }}" alt="" class="w-full h-auto object-cover  ">
                <div class="p-4 space-y-2">
                    <p class="text-xl">{{ $news->first()->title }}</p>
                    <p class="text-gray-700">{{ $news->first()->date }}</p>
                </div>
            </div>
        </a>
        <div class="flex-2 flex flex-col justify-between">
            <a href="{{ route('news.show', $news->get(2)->slug) }}"
                class="flex space-x-4 border border-white shadow-sm bg-white">
                <img src="{{ $news->get(2)->thumbnail }}" alt="" class="w-[160px] h-[100px] object-cover">
                <div class="space-y-1 flex flex-col justify-center">
                    <p class="text-sm">{{ $news->get(2)->title }}</p>
                    <p class="text-gray-700">{{ $news->get(2)->date }}</p>
                </div>
            </a>
            <hr class="border-t border-gray-300 my-4" />
            <a href="{{ route('news.show', $news->get(3)->slug) }}"
                class="flex space-x-4 border border-white shadow-sm bg-white">
                <img src="{{ $news->get(3)->thumbnail }}" alt="" class="w-[160px] h-[100px] object-cover">
                <div class="space-y-1 flex flex-col justify-center">
                    <p class="text-sm">{{ $news->get(3)->title }}</p>
                    <p class="text-gray-700">{{ $news->get(3)->date }}</p>
                </div>
            </a>
            <hr class="border-t border-gray-300 my-4" />

            <a href="{{ route('news.show', $news->get(4)->slug) }}"
                class="flex space-x-4 border border-white shadow-sm bg-white">
                <img src="{{ $news->get(4)->thumbnail }}" alt="" class="w-[160px] h-[100px] object-cover">
                <div class="space-y-1 flex flex-col justify-center">
                    <p class="text-sm">{{ $news->get(4)->title }}</p>
                    <p class="text-gray-700">{{ $news->get(4)->date }}</p>
                </div>
            </a>
            <hr class="border-t border-gray-300 my-4" />
            <a href="{{ route('news.show', $news->get(5)->slug) }}"
                class="flex space-x-4 border border-white shadow-sm bg-white">
                <img src="{{ $news->get(5)->thumbnail }}" alt="" class="w-[160px] h-[100px] object-cover">
                <div class="space-y-1 flex flex-col justify-center">
                    <p class="text-sm">{{ $news->get(5)->title }}</p>
                    <p class="text-gray-700">{{ $news->get(5)->date }}</p>
                </div>
            </a>
        </div>
    </div>
</section>


<!-- TAC GIA -->
<section>
    <div class="border-t-2 border-gray-300 py-3 flex justify-between items-center mb-5">
        <p class="text-xl font-bold">Các tác giả</p>
        <a class="underline" href="{{ route('authors.index') }}">Xem thêm</a>
    </div>
    <div class=" flex mb-10 space-x-10 justify-around items-center w-[1300px] mx-auto">
        @foreach($authors as $author)
        <a href="{{ route('authors.show', $author->slug) }}" class="text-center space-y-2">
            <img src="{{ $author->image }}" alt="" class="h-[150px] w-[150px] rounded-full object-cover">
            <p class="">{{ $author->name }}</p>
        </a>
        @endforeach
    </div>
</section>


<!-- SACH -->
<x-book.list :books="$best_sellers">{{ $best_sellers->first()->category->name }}</x-book.list>
<x-book.list :books="$modern_literature">{{ $modern_literature->first()->category->name}}</x-book.list>


<!-- TIN TUC -->
<section>
    <div class="border-t-2 border-gray-300 py-3 flex justify-between items-center mb-5">
        <p class="text-xl font-bold">Tin tức về sách</p>
        <a class="underline" href="{{ route('news.index') }}">Xem thêm</a>
    </div>
    <div class=" flex mb-10 space-x-10 justify-around items-center w-[1300px] mx-auto">
        @foreach($news_list as $n)
        <a href="{{ route('news.show', $n->slug) }}" class="flex-1 space-y-2">
            <img src="{{ $n->thumbnail }}" alt="" class="w-[410px] h-[230px] object-contain">
            <p class="font-bold">{{ $n->title }}</p>
            <p class="text-gray-600 w-[400px] truncate text-sm">{{ $n->description }}</p>
            <p class="text-gray-700">{{ $n->date }}</p>
        </a>
        @endforeach
    </div>
</section>


@endsection