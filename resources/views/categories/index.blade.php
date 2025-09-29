@extends('layouts.app')
@section('content')
<section class="h-[400px] w-full p-0">
    <img src="https://fastly.picsum.photos/id/318/1440/400.jpg?hmac=Qjs6RMk2LDwceoJ5b2otHhfH9vSBNwwoeaQA5dxVoWU" alt=""
        class="w-[1400px] object-contain">
    <!-- <img src="https://bizweb.dktcdn.net/100/363/455/files/trang-web-e0ba045b-0fdc-4a9b-be09-d251ae20b05e.png?v=1697532722619"
        alt=""> -->
</section>

<x-book.list :books="$best_sellers">{{ $best_sellers->first()->category->name }}</x-book.list>
<x-book.list :books="$modern_literature">{{ $modern_literature->first()->category->name}}</x-book.list>
@endsection