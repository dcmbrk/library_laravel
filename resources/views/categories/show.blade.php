@extends('layouts.app')
@section('content')
<div class="flex justify-between w-[1150px] mt-4">
    <div class=" h-[200px] space-y-3 text-center">
        <p class="font-bold text-md">Sắp xếp theo</p>
        <p class="p-2 text-white border text-xs border-white bg-black w-[70px]">
            <a href="">Mặc định</a>
        </p>
        <p
            class="p-2 text-black border text-xs border-black bg-white w-[70px] hover:text-white hover:bg-black transition-colors duration-300">
            <a href="">Còn hàng</a>
        </p>
        <p
            class="p-2 text-black border text-xs border-black bg-white w-[70px] hover:text-white hover:bg-black transition-colors duration-300">
            <a href="">Hết hàng</a>
        </p>
    </div>
    <x-book.section :books="$books">{{$category->name}}</x-book.section>
</div>
@endsection