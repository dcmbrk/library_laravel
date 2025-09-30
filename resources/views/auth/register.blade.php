@extends('layouts.app')
@section('content')
<div class="">
    <div class="grid max-h-screen place-items-center border">
        <div class="border border-gray-500 px-20 py-10 my-20">
            <h2 class="text-center text-lg">Đăng kí tài khoản</h2>
            <form action="/register" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="name" class="block mb-1">Tên hiển thị</label>
                    <input type="text" name="name" id="name" class="border border-gray-300 px-2 py-2 outline-none">
                </div>
                <div>
                    <label for="email" class="block mb-1">Email</label>
                    <input type="email" name="email" id="email" class="border border-gray-300 px-2 py-2 outline-none">
                </div>
                <div>
                    <label for="password" class="block mb-1">Mật khẩu</label>
                    <input type="password" name="password" id="password"
                        class="border border-gray-300 px-2 py-2 mb-3 outline-none">
                </div>

                <div class="flex justify-center">
                    <button class="bg-black text-white py-2 px-3">Đăng kí</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection