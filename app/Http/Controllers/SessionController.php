<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.user.login');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
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

        $user = Auth::user();

        if ($user->status !== 'online') {
            Auth::logout();
            throw ValidationException::withMessages([
                'email' => 'Tài khoản của bạn đã bị khóa.',
            ]);
        }

        $request->session()->regenerate();
        return redirect()->intended('/');
    }



    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
