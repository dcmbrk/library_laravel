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
    /**
     * Hiển thị danh sách theo status (wait, reading, returned, rejected)
     */
    public function show($status)
    {
        if(Auth::guest()){
           return redirect()->route('admin.login.index');
        }

        $user = Auth::user();

        $approvals = BookUser::with(['book.category'])
            ->where('status', $status)
            ->orderByDesc('borrow_date')
            ->paginate(10);


        return view("dashboard.approval.show", compact(['approvals', 'user']));
    }
}