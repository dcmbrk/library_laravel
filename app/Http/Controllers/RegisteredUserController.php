<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisteredUserController extends Controller
{
    public function create(){
        return view('auth.register');
    }


public function store(){
    User::create([
        'name' => request('name'),
        'email' => request('email'),
        'password' => Hash::make(request('password')), // ✅ mã hoá
        'role' => 'reader',
    ]);

    dd("hello");
}

}
