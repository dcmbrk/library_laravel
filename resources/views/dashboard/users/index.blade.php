@extends('layouts.dashboard')
@section('content')
<div class="relative overflow-x-auto bg-white shadow flex flex-col">
    <table class="w-full text-sm text-left rtl:text-right">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
            <tr>
                <th scope="col" class="px-6 py-3">tên hiển thị</th>
                <th scope="col" class="px-6 py-3">email</th>
                <th scope="col" class="px-6 py-3">quyền</th>
                <th scope="col" class="px-6 py-3">Trạng thái</th>
                <th scope="col" class="px-6 py-3">ngày tạo</th>
                <th scope="col" class="px-6 py-3">hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $u)
            <tr class="bg-white border-b border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-blue-600 whitespace-nowrap">
                    {{ $u->name }}
                </th>
                <td class="px-6 py-4 text-black">{{ $u->email }}</td>
                <td class="px-6 py-4 text-black uppercase">{{ $u->role }}</td>
                @if($u->status === 'online')
                <td class="px-6 py-4 uppercase text-green-500">{{ $u->status }}</td>
                @else
                <td class="px-6 py-4 uppercase text-red-500">{{ $u->status }}</td>
                @endif
                <td class="px-6 py-4 text-black">{{ $u->created_at }}</td>
                @if( $u->role !== 'admin')
                <td class="px-6 py-4 sticky right-0 bg-white">
                    <div class="flex space-x-2 items-center justify-start">
                        @if( $u->status === 'online' )
                        <form action="{{ route('dashboard.users.status', ['id' => $u->id, 'status' => 'offline']) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit"
                                class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors duration-200">
                                Khóa
                            </button>
                        </form>
                        @else
                        <form action="{{ route('dashboard.users.status', ['id' => $u->id, 'status' => 'online']) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit"
                                class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors duration-200">
                                Mở
                            </button>
                        </form>
                        @endif
                        @if( $user->role === 'reader')
                        <form action="{{ route('dashboard.users.role', ['id' => $u->id, 'role' => 'editor']) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit"
                                class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors duration-200">
                                Editor
                            </button>
                        </form>
                        @else
                        <form action="{{ route('dashboard.users.role', ['id' => $u->id, 'role' => 'reader']) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit"
                                class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors duration-200">
                                Reader
                            </button>
                        </form>
                        @endif
                    </div>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="p-10 place-items-end">
        {{ $users->links('vendor.pagination.custom') }}
    </div>
</div>
@endsection