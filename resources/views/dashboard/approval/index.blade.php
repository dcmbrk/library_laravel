@extends('layouts.dashboard')

@section('content')
<div class="bg-white shadow p-4">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">
            @if($status === 'wait') Yêu cầu mượn sách đang chờ
            @elseif($status === 'reading') Sách đang mượn
            @elseif($status === 'returned') Sách đã trả
            @elseif($status === 'overdue') Sách quá hạn
            @endif
        </h2>
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
                @forelse($apprs as $ap)
                <tr class="bg-white border-b">
                    <td class="px-6 py-4">{{ $ap->user->name ?? 'Không rõ' }}</td>
                    <td class="px-6 py-4">{{ $ap->user->email ?? 'Không có email' }}</td>
                    <td class="px-6 py-4 max-w-[200px] truncate">{{ $ap->book->title }}</td>
                    <td class="px-6 py-4">
                        <img class="w-[96px] h-[96px] object-contain" src="{{ $ap->book->image }}" alt="">
                    </td>
                    <td class="px-6 py-4 font-semibold">{{ ucfirst($ap->status) }}</td>
                    <td class="px-6 py-4 sticky right-0 bg-white">
                        <div class="flex space-x-2">
                            @if($status === 'wait')
                            {{-- Duyệt --}}
                            <form action="{{ route('books.borrow.approval', $ap->book) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700">
                                    Duyệt
                                </button>
                            </form>
                            {{-- Từ chối --}}
                            <form action="{{ route('books.borrow.cancel', $ap->book) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                    Từ chối
                                </button>
                            </form>
                            @elseif($status === 'reading')
                            {{-- Trả sách --}}
                            <form action="{{ route('books.borrow.return', $ap->book) }}" method="POST">
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
        {{ $apprs->links('vendor.pagination.custom') }}
    </div>
</div>
@endsection