@extends('layouts.dashboard')
@section('content')
<div class="flex flex-col items-center w-full h-screen mt-[300px]">
    <div class="flex space-x-4 uppercase">
        @if($user->role === 'admin')
        <div class="border bg-white p-4 text-sm">
            <a href="/dashboard/users">quản lí người dùng</a>
        </div>
        @endif
        @if($user->role === 'editor')
        <div class="border bg-white p-4 text-sm">
            <a href="/dashboard/books">quản lí sách</a>
        </div>
        <div class="border bg-white p-4 text-sm">
            <a href="/dashboard/category">danh mục sách</a>
        </div>
        @endif
    </div>
</div>
@endsection