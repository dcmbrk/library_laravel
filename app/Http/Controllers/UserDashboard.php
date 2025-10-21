<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserDashboard extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->guest()) {
            return redirect()->route('admin.login.index');
        }

        $user = Auth::guard('admin')->user();

        if ($user->role !== 'admin') {
            return redirect()->back();
        }

        $users = User::paginate(10);
        return view('dashboard.users.index', compact(['users', 'user']));
    }

    public function statusSwitch(Request $request)
    {
        if (Auth::guard('admin')->guest()) {
            return redirect()->route('admin.login.index');
        }

        $user = Auth::guard('admin')->user();

        if ($user->role !== 'admin') {
            return redirect()->back();
        }

        $targetUser = User::findOrFail($request->input('id'));
        $targetUser->update([
            'status' => $request->input('status'),
        ]);

        return redirect()->route('dashboard.users.index')
                         ->with('success', 'Cập nhật trạng thái người dùng thành công!');
    }

    public function roleSwitch(Request $request)
    {
        if (Auth::guard('admin')->guest()) {
            return redirect()->route('admin.login.index');
        }

        $user = Auth::guard('admin')->user();

        if ($user->role !== 'admin') {
            return redirect()->back();
        }

        $targetUser = User::findOrFail($request->input('id'));
        $targetUser->update([
            'role' => $request->input('role'),
        ]);

        return redirect()->route('dashboard.users.index')
                         ->with('success', 'Cập nhật vai trò người dùng thành công!');
    }

    public function destroy($id)
    {
        if (Auth::guard('admin')->guest()) {
            return redirect()->route('admin.login.index');
        }

        $user = Auth::guard('admin')->user();

        if ($user->role !== 'admin') {
            return redirect()->back();
        }

        $targetUser = User::findOrFail($id);
        $targetUser->delete();

        return redirect()->route('dashboard.users.index')
                         ->with('success', 'Xóa người dùng thành công!');
    }
}