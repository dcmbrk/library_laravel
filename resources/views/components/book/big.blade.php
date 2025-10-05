@props(['book', 'status'])
<div class="p-5 inline-flex space-x-5">
    <div class="border border-gray-100">
        <img src="{{ $book->image }}" alt="" class="h-[360px] w-[360px] object-contain">
    </div>
    <div>
        <h3 class="uppercase font-bold text-3xl mb-2 w-[500px]">{{ $book->title }}</h3>
        <p class="mb-4">Tác giả: <a class="uppercase hover:text-blue-700 hover:underline cursor-pointer font-bold">{{
                $book->author }}</a>
        </p>
        <p class=" border-t border-gray-300 py-4">Còn lại {{ $book->available_copies }} bản</p>
        @if($status === 'wait')
        <form action="{{ route('books.cancel', $book->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="group w-[120px] px-6 py-3 border border-gray-100 bg-black text-white transition-colors duration-300 ease-in-out relative overflow-hidden hover:bg-red-600">
                <span class="block group-hover:hidden text-center">Chờ duyệt</span>
                <span class="hidden group-hover:block text-center text-white">Hủy</span>
            </button>
        </form>
        @elseif($status === 'reading' || $status === 'overdue')
        <button type="button" class="px-6 py-3 border border-gray-500 text-white bg-black cursor-not-allowed">Đang
            đọc</button>
        @else
        <form action="{{ route('books.borrow', $book->id) }}" method="POST">
            @csrf
            <button type="submit"
                class="px-6 py-3 border border-gray-500 text-white bg-black hover:text-black hover:bg-white transition-colors duration-300 ease-in-out">Mượn</button>
        </form>
        @endif
    </div>
</div>