@extends('layouts.app')
@section('content')
<div class="flex justify-between w-[1150px] mt-4">
    <div class=" h-[200px] space-y-3 text-center">
        <p class="font-bold text-md">Sắp xếp theo</p>
        <x-button.link :selected="true">Mặc định</x-button.link>
        <x-button.link>Còn hàng</x-button.link>
        <x-button.link>Hết hàng</x-button.link>
    </div>
    <x-book.section :books="$books">{{$category->name}}</x-book.section>
</div>
@endsection