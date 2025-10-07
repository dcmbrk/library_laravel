@extends('layouts.app')
@section('content')
<div class="flex mx-auto w-[1100px] space-x-14 mt-4">
    <img src="{{ $author->image }}" alt="{{ $author->name }}" class="w-[195px] h-[195px] object-cover rounded-full">
    <div class="items-start mt-1 mb-4">
        <p class="font-bold text-lg uppercase mb-4">{{ $author->name }}</p>
        <div class="max-w-[650px] text-md space-y-3">{!! $author->bio !!}</div>
    </div>
</div>

<div class="flex space-x-14 mt-[80px] mb-[80px] w-[1200px] mx-auto">
    <div class="w-[320px] h-[440px] flex items-center justify-center border border-gray-200 bg-gray-100">
        <a href="{{ route('books.show', $author->books->first()->slug) }}">
            <img src="{{ $author->books->first()->image }}" alt="{{ $author->name }}"
                class="w-[250px] h-[375px] object-cover">
        </a>
    </div>
    <div class="items-start mb-4">
        <p class="font-bold text-2xl uppercase mb-4">{{ $author->books->first()->title }}</p>
        <div class="max-w-[650px] text-md space-y-3">{!! $author->books->first()->description !!}</div>
    </div>
</div>

@if($author->books->skip(1)->count() >= 1)
<section>
    <div class="border-t-2 border-gray-300 py-3 flex justify-between items-center mb-5">
        <p class="text-xl font-bold">Sách cùng tác giả</p>
        <a class="underline" href="{{ route('category.author', $author->slug) }}">Xem thêm</a>
    </div>

    <div class="flex mb-10 space-x-10">
        @foreach($author->books->skip(1)->take(5) as $book)
        <x-book.item :book="$book"></x-book.item>
        @endforeach
    </div>
</section>
@endif
@endsection