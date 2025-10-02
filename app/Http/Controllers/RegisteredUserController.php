<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        // validate
        $attributes = request()->validate([
            'email' => ['required', 'email', 'unique:users,email'],
            'name' => ['required', 'min:4'],
            'password' => ['required', 'min:6'],
        ], [
            'email.required' => 'Không được để trống email',
            'email.email' => 'Email không hợp lệ',
            'email.unique' => 'Email đã tồn tại',
            'name.required' => 'Không được để trống tên',
            'name.min' => 'Tên phải có ít nhất 4 ký tự',
            'password.required' => 'Không được để trống mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
        ]);

        $attributes['password'] = Hash::make($attributes['password']);

        $user = User::create($attributes);

        Auth::login($user);

        return redirect('/')->with('success', 'Đăng ký thành công, bạn đã được đăng nhập!');
    }
}