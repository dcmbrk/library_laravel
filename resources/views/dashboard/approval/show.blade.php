@extends('layouts.dashboard')

@section('content')
<div class="bg-white shadow p-4">
    <div class="flex justify-between items-center mb-4">
    </div>

    @if(session('success'))
    <div class="p-3 mb-4 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
    @endif
    @if(session('error'))
    <div class="p-3 mb-4 bg-red-100 text-red-700 rounded">{{ session('error') }}</div>
    @endif

    <div class="overflow-x-auto flex flex-col">
        <table class="min-w-[1000px] text-sm text-left border whitespace-nowrap">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                <tr>
                    <th class="px-6 py-3">Người mượn</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Tiêu đề sách</th>
                    <th class="px-6 py-3">Bìa</th>
                    <th class="px-6 py-3">Trạng thái</th>
                    <th class="px-6 py-3 sticky right-0 bg-gray-100">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse($approvals as $ap)
                <tr class="bg-white border-b">
                    <td class="px-6 py-4">{{ $ap->user->name }}</td>
                    <td class="px-6 py-4">{{ $ap->user->email }}</td>
                    <td class="px-6 py-4 max-w-[200px] truncate">{{ $ap->book->title }}</td>
                    <td class="px-6 py-4">
                        <img class="w-[96px] h-[96px] object-contain" src="{{ $ap->book->image }}" alt="">
                    </td>
                    @if($ap->status === 'wait')
                    <td class="text-green-500 px-6 py-4 font-semibold">Chờ duyệt</td>
                    @elseif($ap->status === 'reading')
                    <td class="text-yellow-500 px-6 py-4 font-semibold">Đang được mượn</td>
                    @elseif($ap->status === 'overdue')
                    <td class="text-red-500 px-6 py-4 font-semibold">Quá hạn</td>
                    @endif
                    <td class="px-6 py-4 sticky right-0 bg-white">
                        <div class="flex space-x-2">
                            @if($ap->status === 'wait')
                            {{-- Duyệt --}}
                            <form
                                action="{{ route('dashboard.approval.update', ['status' => 'reading', 'id' => $ap->book_id]) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit"
                                    class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-green-700">
                                    Duyệt
                                </button>
                            </form>
                            @elseif($ap->status === 'reading' || $ap->status === 'overdue' )
                            {{-- Trả sách --}}
                            <form
                                action="{{ route('dashboard.approval.update', ['status' => 'returned', 'id' => $ap->book_id]) }}"
                                method="POST">
                                @csrf @method('PUT')
                                <button type="submit"
                                    class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">
                                    Trả sách
                                </button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                        Không có dữ liệu phù hợp.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="p-5 flex justify-end">
        {{ $approvals->links('vendor.pagination.custom') }}
    </div>
</div>
@endsection