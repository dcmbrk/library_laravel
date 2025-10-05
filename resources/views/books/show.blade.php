@extends('layouts.app')
@section('content')
<p>{{ $status }}</p>
@if($user)
<p>{{ $user->name }}</p>
@endif
<x-book.big :book="$book" :status="$status"></x-book.big>
<x-book.description class="description" :book="$book"></x-book.description>
<x-book.list :books="$related_books">
    Có thể bạn sẽ thích
</x-book.list>
@endsection