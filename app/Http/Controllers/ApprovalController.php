<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookUser;
use App\Models\User;
use Carbon\Carbon;

class ApprovalController extends Controller
{
    /**
     * Hiển thị danh sách theo status (wait, reading, returned, rejected)
     */
    public function show($status)
    {
        $apprs = BookUser::with('book', 'user')
            ->where('status', $status)
            ->paginate(10);

        return view("dashboard.approval.index", compact('apprs', 'status'));
    }

    /**
     * Hiển thị danh sách quá hạn
     */
    public function overdue()
    {
        $apprs = BookUser::with('book','user')
            ->where('status', 'overdue')
            ->where('due_date', '<', Carbon::now())
            ->paginate(10);

        $status = 'overdue';
        return view("dashboard.approval.index", compact('apprs', 'status'));
    }


    /**
     * Duyệt -> chuyển từ wait sang reading
     */
    public function approval(Request $request, Book $book)
    {
        $user = User::findOrFail(2); // TODO: thay bằng Auth::user()

        $borrow = BookUser::where([
            ['user_id', $user->id],
            ['book_id', $book->id],
            ['status', 'wait'],
        ])->first();

        if (!$borrow) {
            return back()->with('error', 'Không tìm thấy yêu cầu để duyệt.');
        }

        $borrow->update([
            'status'      => 'reading',
            'borrow_date' => now(),
            'due_date'    => now()->addDays(14),
        ]);

        return redirect()->route('dashboard.status', 'wait')
                         ->with('success', 'Đã duyệt mượn sách.');
    }

    /**
     * Từ chối -> chuyển từ wait sang rejected
     */
    public function cancel(Request $request, Book $book)
    {
        $user = User::findOrFail(2);

        $borrow = BookUser::where([
            ['user_id', $user->id],
            ['book_id', $book->id],
            ['status', 'wait'],
        ])->first();

        if (!$borrow) {
            return back()->with('error', 'Không tìm thấy yêu cầu để từ chối.');
        }

        $borrow->update(['status' => 'rejected']);

        return redirect()->route('dashboard.status', 'wait')
                         ->with('success', 'Đã từ chối yêu cầu.');
    }

    /**
     * Trả sách -> chuyển từ reading sang returned
     */
    public function returnBook(Request $request, Book $book)
    {
        $user = User::findOrFail(2);

        $borrow = BookUser::where([
            ['user_id', $user->id],
            ['book_id', $book->id],
            ['status', 'reading'],
        ])->first();

        if (!$borrow) {
            return back()->with('error', 'Không tìm thấy sách đang mượn để trả.');
        }

        $borrow->update([
            'status'      => 'returned',
            'return_date' => now(),
        ]);

        return redirect()->route('dashboard.status', 'reading')
                         ->with('success', 'Đã trả sách thành công.');
    }
}
