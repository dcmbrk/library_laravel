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

        $this->gmail_approval();

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

        if ($status === 'returned') {
            $book = Book::find($id);
            if ($book) {
                $book->increment('available_copies', 1);
            }
    }

    return back();
    }

    public function gmail_approval(){
                $overdueBooks = BookUser::with(['user', 'book'])
            ->where('status', 'reading')
            ->whereNotNull('due_date')
            ->where('due_date', '<=', now())
            ->get();

        $grouped = [];
        foreach ($overdueBooks as $record) {
            $email = $record->user->email ?? null;
            if ($email) {
                $grouped[$email][] = $record->book->title ?? 'Sách không rõ tên';
            }
        }

        $mailer = new MailController();
        foreach ($grouped as $email => $books) {
            $mailer->sendMail($email, $books);
        }

        foreach ($overdueBooks as $record) {
            $record->status = 'overdue';
            $record->save();
        }
    }
}
