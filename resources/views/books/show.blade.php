@extends('layouts.app')
@section('content')
<div class="p-5 inline-flex space-x-5">
    <div class="border border-gray-100">
        <img src="https://bizweb.dktcdn.net/100/363/455/products/thiet-ke-chua-co-ten-17.png?v=1758516205250" alt=""
            class="h-[360px] w-[360px] object-contain">
    </div>
    <div>
        <h3 class="uppercase font-bold text-3xl w-full mb-2">khi ta không còn hiểu nôi thế giới</h3>
        <p class="mb-4">Tác giả: <a
                class="uppercase hover:text-blue-700 hover:underline cursor-pointer font-bold">benjamín labatut</a>
        </p>
        <p class=" border-t border-gray-300 py-4">Còn lại 10 bản</p>
        <button type="submit"
            class="px-6 py-3 border border-gray-500 hover:text-white hover:bg-black transition-colors duration-300 ease-in-out">Mượn</button>
    </div>
</div>

<div class="my-20 flex justify-between items-center">
    <div>
        <h4 class="text-xl font-bold mb-2">Giới thiệu sách</h4>
        <div class="w-[900px] space-y-2">
            <p>Lọt vào chung khảo giải Booker Quốc tế 2021 và giải Sách Quốc gia 2021 cho văn học dịch</p>
            <p>Là Một trong “10 cuốn sách hay nhất năm 2021” của New York Times Book Review</p>
            <p>Xếp thứ 83 trong “100 cuốn sách hay nhất thế kỷ 21” của New York Times</p>
            <p>Fritz Haber, Alexander Grothendieck, Werner Heisenberg, Erwin Schrödinger… là những nhà khoa học tiên
                phong
                lỗi lạc đã ghi tên mình vào lịch sử với các khám phá làm thay đổi thế giới. Nhưng làm thế nào họ đạt
                được
                điều đó, họ đã trải qua và đánh đổi những gì? Bằng cách pha trộn sự thật với hư cấu, Benjamín Labatut đã
                biến lịch sử vật lý học hiện đại thành một câu chuyện hấp dẫn và ám ảnh về cuộc vật lộn với những câu
                hỏi
                xoay quanh sự tồn tại, về lằn ranh mong manh giữa tốt và xấu, giữa kiến tạo và hủy diệt mà tiến bộ khoa
                học
                mang lại cho con người.</p>
        </div>
    </div>
    <div>
        <h4 class="text-xl font-bold mb-2">Thông tin chi tiết</h4>
        <ul class="border border-gray-400 px-6 py-5 space-y-2">
            <li class="flex before:content-['•'] before:mr-2">
                <span class="w-[150px] font-semibold">Tác giả:</span>
                <span class="uppercase w-[150px] break-words">benjamín labatut</span>
            </li>
            <li class="flex before:content-['•'] before:mr-2">
                <span class="w-[150px] font-semibold">Dịch giả:</span>
                <span class="uppercase w-[150px] break-words">tôm giang</span>
            </li>
            <li class="flex before:content-['•'] before:mr-2">
                <span class="w-[150px] font-semibold">Nhà xuất bản:</span>
                <span class="w-[150px] break-words">
                    Nhà Xuất bản Thành Phố Hồ Chí Minh
                </span>
            </li>
            <li class="flex before:content-['•'] before:mr-2">
                <span class="w-[150px] font-semibold">Kích thước:</span>
                <span class="w-[150px] break-words">Đang cập nhật</span>
            </li>
            <li class="flex before:content-['•'] before:mr-2">
                <span class="w-[150px] font-semibold">Số trang:</span>
                <span class="w-[150px] break-words">236</span>
            </li>
            <li class="flex before:content-['•'] before:mr-2">
                <span class="w-[150px] font-semibold">Ngày phát hành:</span>
                <span class="w-[150px] break-words">2025</span>
            </li>
        </ul>
    </div>
</div>
<x-book.list>Có thể bạn sẽ thích</x-book.list>

@endsection