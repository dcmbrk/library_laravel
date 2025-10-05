@extends('layouts.app')

@section('content')

<div class="flex items-center">
    <h2 class="text-md font-bold mb-5 text-center"><span class="p-2 bg-black text-white">{{ $user->name }}</span>
        <span>></span>
        <span class="p-2 bg-black text-white">Danh sách</span>
    </h2>
</div>

<x-book.list-account status="wait" :books="$wait_books">Sách đang chờ duyệt</x-book.list-account>
<x-book.list-account status="reading" :books="$reading_books">Sách đang đọc</x-book.list-account>
<x-book.list-account status="overdue" :books="$overdue_books">Sách quá hạn</x-book.list-account>
<x-book.list-account status="returned" :books="$already_read_books">Sách đã đọc</x-book.list-account>
@endsection