@extends('layouts.app')
@section('content')
<div class="flex mx-auto w-[1100px] space-x-14 mt-4">
    <img src="{{ $author->image }}" alt="{{ $author->name }}" class="w-[225px] h-[225px] object-cover rounded-full">
    <div class="items-start mt-1 mb-4">
        <p class="font-bold text-xl uppercase mb-4">{{ $author->name }}</p>
        <div class="max-w-[650px] text-md space-y-3">{!! $author->bio !!}</div>
    </div>
</div>

<div class="flex space-x-14 mt-[80px] mb-[80px]">
    <div class="w-[400px] h-[550px] flex items-center justify-center border border-gray-200 bg-gray-100">
        <img src="{{ $author->books->first()->image }}" alt="{{ $author->name }}"
            class="w-[320px] h-[480px] object-cover">
    </div>
    <div class="items-start mb-4">
        <p class="font-bold text-3xl uppercase mb-4">{{ $author->books->first()->title }}</p>
        <div class="max-w-[650px] text-md space-y-3">{!! $author->books->first()->description !!}</div>
    </div>
</div>

<x-book.list :books="$author->books->take(5)">Sách cùng tác giả</x-book.list>


@endsection