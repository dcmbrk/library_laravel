<?php

namespace App\Http\Controllers;
use App\Models\User;

class UserDashboard extends Controller
{
    public function index(){
        $users = User::paginate(10);
        return view('dashboard.users.index', compact('users'));
    }
}