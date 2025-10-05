@extends('layouts.app')
@section('content')
<div class="">
    <div class="grid max-h-screen place-items-center border">
        <div class="border border-gray-500 px-20 py-10 my-20">
            <h2 class="text-center text-lg">Đăng nhập tài khoản</h2>

            <form action="{{ route('login.store') }}" method="POST" class="space-y-6" novalidate>
                @csrf

                <x-form.label for="email">Email</x-form.label>
                <div>
                    <x-form.input type="email" name="email" id="email" value="{{ old('email') }}"></x-form.input>
                    <x-form.error name="email"></x-form.error>
                </div>

                <x-form.label for="password">Mật khẩu</x-form.label>
                <div>
                    <x-form.input type="password" name="password" id="password"></x-form.input>
                    <x-form.error name="password"></x-form.error>
                </div>

                <div class="flex justify-center">
                    <button class="bg-black text-white py-2 px-3">Đăng nhập</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection