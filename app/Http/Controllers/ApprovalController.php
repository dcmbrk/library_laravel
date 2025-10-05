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
        if(Auth::guest()){
           return redirect()->route('admin.login.index');
        }

        BookUser::where('status', 'reading')
        ->whereNotNull('due_date')
        ->where('due_date', '<=', now())
        ->update(['status' => 'overdue']);


        $user = Auth::user();

        $approvals = BookUser::with(['book.category'])
            ->where('status', $status)
            ->orderByDesc('borrow_date')
            ->paginate(10);


        return view("dashboard.approval.show", compact(['approvals', 'user']));
    }

    public function update($status, $id)
    {
        if (Auth::guest()) {
            return redirect()->route('admin.login.index');
        }

        $approval = BookUser::where('book_id', $id)
        ->when(Auth::user()->role === 'user', fn($q) => $q->where('user_id', Auth::id()))
        ->orderByDesc('id')
        ->firstOrFail();

        $approval->update([
            'status' => $status
        ]);

        return back();
    }


    // public function destroy($id)
    // {
    //     if(Auth::guest()){
    //        return redirect()->route('admin.login.index');
    //     }

    //     $approval = BookUser::findOrFail($id);
    //     $approval->delete();

    //     return back();
    // }
}
