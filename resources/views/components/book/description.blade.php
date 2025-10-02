@props(['book'])


<div class="my-20 flex justify-between">
    <div>
        <h4 class="text-xl font-bold mb-2">Giới thiệu sách</h4>
        <div class="w-[900px] space-y-2">
            {!! $book->description !!}
        </div>
    </div>
    <div>
        <h4 class="text-xl font-bold mb-2">Thông tin chi tiết</h4>
        <ul class="border border-gray-300 px-6 py-5 space-y-2">
            <li class="flex before:content-['•'] before:mr-2">
                <span class="w-[150px] font-semibold">Tác giả:</span>
                <span class="uppercase w-[150px] break-words">{{ $book->author }}</span>
            </li>
            <li class="flex before:content-['•'] before:mr-2">
                <span class="w-[150px] font-semibold">Dịch giả:</span>
                <span class="uppercase w-[150px] break-words">{{ $book->translator }}</span>
            </li>
            <li class="flex before:content-['•'] before:mr-2">
                <span class="w-[150px] font-semibold">Nhà xuất bản:</span>
                <span class="w-[150px] break-words">
                    {{ $book->publisher }}
                </span>
            </li>
            <li class="flex before:content-['•'] before:mr-2">
                <span class="w-[150px] font-semibold">Kích thước:</span>
                <span class="w-[150px] break-words">{{ $book->size }}</span>
            </li>
            <li class="flex before:content-['•'] before:mr-2">
                <span class="w-[150px] font-semibold">Số trang:</span>
                <span class="w-[150px] break-words">{{ $book->pages }}</span>
            </li>
            <li class="flex before:content-['•'] before:mr-2">
                <span class="w-[150px] font-semibold">Ngày phát hành:</span>
                <span class="w-[150px] break-words">{{ $book->publish_date }}</span>
            </li>
        </ul>
    </div>
</div>