<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function index()
    {
        return view('auth.admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Thử đăng nhập
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Kiểm tra role
            if (Auth::user()->role === 'admin') {
                return redirect()->route('dashboard.index');
            } else {
                Auth::logout(); // Không phải admin thì out ra luôn
                return back()->withErrors([
                    'email' => 'Bạn không có quyền truy cập admin.',
                ]);
            }
        }

        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không đúng.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Quan trọng: KHÔNG redirect về route logout (tránh vòng lặp)
        return redirect()->route('admin.login.index'); // hoặc route('login') / '/'
    }
}
