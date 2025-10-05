<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserDashboard extends Controller
{
    public function index(){
        if(Auth::guest()){
           return redirect()->route('admin.login.index');
        }

        $users = User::paginate(10);
        return view('dashboard.users.index', compact('users'));
    }
}
