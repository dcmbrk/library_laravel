@extends('layouts.app')
@section('content')
<p class=" bg-black text-white inline-block text-md p-2">{{$author->name}}</p>

<div class="flex justify-between w-[1150px] mt-4 text-center">
    <div class=" h-[200px] space-y-3 text-center">
        <p class="font-bold text-md">Sắp xếp theo</p>
        <x-button.link :selected="true">Mặc định</x-button.link>
        <x-button.link>Còn hàng</x-button.link>
        <x-button.link>Hết hàng</x-button.link>
    </div>
    @if($author)
    <x-book.section :books="$books">{{$author->name}}</x-book.section>
    @endif
</div>
@endsection