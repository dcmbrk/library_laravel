@extends('layouts.dashboard')
@section('content')
<div class="relative overflow-x-auto bg-white shadow flex flex-col">
    <table class="w-full text-sm text-left rtl:text-right">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
            <tr>
                <th scope="col" class="px-6 py-3">tên hiển thị</th>
                <th scope="col" class="px-6 py-3">email</th>
                <th scope="col" class="px-6 py-3">quyền</th>
                <!-- <th scope="col" class="px-6 py-3">Trạng thái</th> -->
                <th scope="col" class="px-6 py-3">ngày tạo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr class="bg-white border-b border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-blue-600 whitespace-nowrap">
                    {{ $user->name }}
                </th>
                <td class="px-6 py-4 text-black">{{ $user->email }}</td>
                <td class="px-6 py-4 text-black uppercase">{{ $user->role }}</td>
                <td class="px-6 py-4 text-black">{{ $user->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="p-10 place-items-end">
        {{ $users->links('vendor.pagination.custom') }}
    </div>
</div>
@endsection