@extends('layouts.app')
@section('content')
<div class="w-[890px] mx-auto space-y-4">
    <p class="text-lg font-bold">{{ $news->title }}</p>
    <p class="text-gray-500">{{ $news->date }}</p>
    <div class="news-content prose max-w-none space-y-4">
        {!! $news->content_html !!}
    </div>
</div>
@endsection



<style>
    .news-content img {
        display: block;
        margin-left: auto;
        margin-right: auto;
        border-radius: 8px;
        max-width: 100%;
        height: auto;
    }
</style>