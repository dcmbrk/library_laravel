@extends('layouts.app')
@section('content')
<p class=" bg-black text-white inline-block text-md p-2 mb-4">Tin Nhã Nam</p>
<div class="grid grid-cols-4 mt-4 justify-between space-y-6">
    @foreach($news as $n)
    <div class="space-y-2 flex flex-col items-center">
        <a href="{{ route('news.show', $n->slug) }}">
            <div class="overflow-hidden"> <!-- ✅ giữ ảnh không tràn khi zoom -->
                <img src="{{ $n->thumbnail }}"
                    class="w-[300px] h-[200px] object-contain transform transition duration-500 hover:scale-110" alt="">
            </div>
            <div>
                <p class="w-[300px]">{{ $n->title }}</p>
                <p class="text-gray-500">{{ $n->date }}</p>
            </div>
        </a>
    </div>

    @endforeach
</div>

<div class="flex justify-center">
    {{ $news->links() }}
</div>
@endsection