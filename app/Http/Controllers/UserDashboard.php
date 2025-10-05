<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserDashboard extends Controller
{
    public function index()
    {
        if (Auth::guest()) {
            return redirect()->route('admin.login.index');
        }

        $user = Auth::user();

        if($user->role !== 'admin'){
            return redirect()->back();
        }

        $users = User::paginate(10);
        return view('dashboard.users.index', compact(['users', 'user']));
    }

    public function statusSwitch(Request $request)
    {
        if (Auth::guest()) {
            return redirect()->route('admin.login.index');
        }

        $user = Auth::user();
        if($user->role !== 'admin'){
            return redirect()->back();
        }

        $user = User::findOrFail($request->input('id'));
        $user->update([
            'status' => $request->input('status'),
        ]);

        return redirect()->back();
    }

    public function roleSwitch(Request $request)
    {
        if (Auth::guest()) {
            return redirect()->route('admin.login.index');
        }

        $user = Auth::user();
        if($user->role !== 'admin'){
            return redirect()->back();
        }

        $user = User::findOrFail($request->input('id'));
        $user->update([
            'role' => $request->input('role'),
        ]);

        return redirect()->back();
    }
}