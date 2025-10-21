@extends('layouts.dashboard')
@section('content')
<div class="flex flex-col items-center w-full h-screen mt-[300px]">
    <div class="flex uppercase justify-center">
        @if($user->role === 'admin')
        <div class="border bg-white p-4 text-sm m-2">
            <a href="/dashboard/users">quản lí người dùng</a>
        </div>
        <div class="border bg-white p-4 text-sm m-2">
            <a href="/dashboard/news">quản lí tin tức</a>
        </div>
        @endif
        @if($user->role === 'editor')
        <div class="border bg-white p-4 text-sm m-2">
            <a href="{{ route('dashboard.approval.index', 'wait') }}">duyệt đơn</a>
        </div>
        <div class="border bg-white p-4 text-sm m-2">
            <a href="/dashboard/books">quản lí sách</a>
        </div>
        <div class="border bg-white p-4 text-sm m-2">
            <a href="/dashboard/categories">danh mục sách</a>
        </div>
        @endif
    </div>
</div>
@endsection