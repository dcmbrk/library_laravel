<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminAuthController extends Controller
{
    public function index()
    {
        return view('auth.admin.login');
    }

    public function login(Request $request)
    {
        $attributes = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ], [
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không đúng định dạng.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
        ]);

        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Email hoặc mật khẩu không chính xác.',
            ]);
        }

        if (Auth::user()->role !== 'admin' && Auth::user()->role !== 'editor') {
            Auth::logout();
            throw ValidationException::withMessages([
                'email' => 'Bạn không có quyền truy cập.',
            ]);
        }

        if (Auth::user()->status !== 'online') {
            Auth::logout();
            throw ValidationException::withMessages([
                'email' => 'Tài khoản đã bị khóa.',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('dashboard.index');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('admin.login.index');
    }
}