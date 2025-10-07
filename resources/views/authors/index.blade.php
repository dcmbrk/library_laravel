@extends('layouts.app')
@section('content')
<p class="text-md mb-10 bg-black text-white inline-block px-3 py-2">Tác giả</p>
<div class="grid grid-cols-5 space-y-20 justify-between">
    @foreach($authors as $author)
    <div class="flex items-center flex-col">
        <a href="{{ route('authors.show', $author->slug) }}">
            <img src="{{ $author->image }}" alt="" class="w-[150px] h-[150px] object-cover rounded-full">
        </a>
        <p class="text-lg">{{ $author->name }}</p>
    </div>
    @endforeach
</div>
<div class="place-items-center">
    {{ $authors->links() }}
</div>
@endsection