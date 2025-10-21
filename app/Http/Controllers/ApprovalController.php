<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ApprovalController extends Controller
{
    public function show($status)
    {
        if (Auth::guard('admin')->guest()) {
            return redirect()->route('admin.login.index');
        }

        // Cập nhật sách quá hạn
        BookUser::where('status', 'reading')
            ->whereNotNull('due_date')
            ->where('due_date', '<=', now())
            ->update(['status' => 'overdue']);

        $user = Auth::guard('admin')->user();

        $approvals = BookUser::with(['book.category'])
            ->where('status', $status)
            ->orderByDesc('borrow_date')
            ->paginate(10);

        return view("dashboard.approval.show", compact(['approvals', 'user']));
    }

    public function update($status, $id)
    {
        if (Auth::guard('admin')->guest()) {
            return redirect()->route('admin.login.index');
        }

        $user = Auth::guard('admin')->user();

        $approval = BookUser::where('book_id', $id)
            ->when($user->role === 'user', fn($q) => $q->where('user_id', $user->id))
            ->orderByDesc('id')
            ->firstOrFail();

        $approval->update([
            'status' => $status
        ]);

        return back();
    }
}