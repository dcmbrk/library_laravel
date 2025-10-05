<header>
    <!-- <div class="h-[40px] bg-gradient-to-r from-brand/95 via-brand/90 to-brand/85 flex items-center justify-center">
    </div> -->

    <div class="h-[40px] flex items-center justify-center">
        <img src="https://fastly.picsum.photos/id/310/1440/40.jpg?hmac=CCBv16cxZ7-X0pXw00Ah62sLF3Gq19DYy2qUSUkcuRg"
            alt="">
    </div>

    <nav
        class="relative flex items-center justify-between px-6 py-4  text-sm min-w-[1440px] border border-gray-200 tracking-tight">
        <div class="flex space-x-5 cursor-pointer items-center">
            <a href="/" class="hover:underline">Trang chủ</a>


            <!-- <a href="/account/books">My books</a> -->
            @auth
            <a href="{{ route('account.index') }}" class="hover:underline">Sách của tôi</a>
            @endauth
            <div class="relative group">
                <!-- Link cha -->
                <a href="#" class="inline-flex items-center">
                    Danh sách
                    <i class="fa fa-angle-down"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true" data-slot="icon"
                            class="text-gray-400 h-5 w-5 group-hover:text-black">
                            <path fill-rule="evenodd"
                                d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                clip-rule="evenodd"></path>
                        </svg></i>
                </a>

                <!-- Dropdown -->
                <div
                    class="absolute left-0 top-full w-[800px] bg-white border border-t-0 shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition duration-200 p-6 z-50">
                    <div class="grid grid-cols-3 gap-6">

                        <!-- Cột 1 -->
                        <div>
                            <h4 class="font-bold mb-2"> <a href="{{ route('category.show', 'hu-cau') }}"
                                    class="hover:underline">Hư
                                    cấu</a></h4>
                            <ul class="space-y-1 text-sm">
                                <li><a href="{{ route('category.show', 'van-hoc-hien-dai') }}"
                                        class="hover:underline">Văn học hiện đại</a></li>
                                <li><a href="{{ route('category.show', 'van-hoc-kinh-dien') }}"
                                        class="hover:underline">Văn học kinh điển</a></li>
                                <li><a href="{{ route('category.show', 'van-hoc-thieu-nhi') }}"
                                        class="hover:underline">Văn học thiếu nhi</a></li>
                                <li><a href="{{ route('category.show', 'lang-man') }}" class="hover:underline">Lãng
                                        mạn</a></li>
                                <li><a href="{{ route('category.show', 'ky-ao') }}" class="hover:underline">Kỳ ảo</a>
                                </li>
                                <li><a href="{{ route('category.show', 'khoa-hoc-vien-tuong') }}"
                                        class="hover:underline">Khoa học Viễn tưởng</a></li>
                                <li><a href="{{ route('category.show', 'tan-van') }}" class="hover:underline">Tản
                                        văn</a></li>
                            </ul>
                        </div>

                        <!-- Cột 2 -->
                        <div>
                            <h4 class="font-bold mb-2"> <a href="{{ route('category.show', 'phi-hu-cau') }}"
                                    class="hover:underline">Phi
                                    hư cấu</a></h4>
                            <ul class="space-y-1 text-sm">
                                <li><a href="{{ route('category.show', 'triet-hoc') }}" class="hover:underline">Triết
                                        học</a></li>
                                <li><a href="{{ route('category.show', 'khoa-hoc') }}" class="hover:underline">Khoa
                                        học</a></li>
                                <li><a href="{{ route('category.show', 'kinh-doanh') }}" class="hover:underline">Kinh
                                        doanh</a></li>
                                <li><a href="{{ route('category.show', 'ky-nang') }}" class="hover:underline">Kỹ
                                        năng</a></li>
                                <li><a href="{{ route('category.show', 'nghe-thuat') }}" class="hover:underline">Nghệ
                                        thuật</a></li>
                            </ul>
                        </div>

                        <!-- Cột 3 -->
                        <!-- <div>
                            <h4 class="font-bold mb-2">Thiếu nhi</h4>
                            <ul class="space-y-1 text-sm">
                                <li><a href="{{ route('category.show', 'triet-hoc') }}" class="hover:underline">0-5
                                        tuổi</a></li>
                                <li><a href="{{ route('category.show', 'triet-hoc') }}" class="hover:underline">6-8
                                        tuổi</a></li>
                                <li><a href="{{ route('category.show', 'triet-hoc') }}" class="hover:underline">9-12
                                        tuổi</a></li>
                                <li><a href="{{ route('category.show', 'triet-hoc') }}" class="hover:underline">13-15
                                        tuổi</a></li>
                            </ul>
                        </div> -->

                        <!-- Cột 4 -->
                        <div>
                            <h4 class="font-bold mb-2"> <a href="{{ route('category.show', 'phan-loai-khac') }}"
                                    class="hover:underline">Phân
                                    loại
                                    khác</a></h4>
                            <ul class="space-y-1 text-sm">
                                <li><a href="{{ route('category.show', 'sach-ban-chay') }}" class="hover:underline">Sách
                                        bán chạy</a></li>
                                <li><a href="{{ route('category.show', 'tac-gia-viet-nam') }}"
                                        class="hover:underline">Tác giả Việt Nam</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="absolute left-1/2 -translate-x-1/2">
            <a href="/" class="font-serif font-bold text-xl tracking-widest">nhã nam</a>
        </div>
        <div class="relative group">
            <!-- Nút icon user -->
            <button class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"
                    class="w-5 h-5 fill-black group-hover:fill-gray-700 transition">
                    <path
                        d="M320 312C386.3 312 440 258.3 440 192C440 125.7 386.3 72 320 72C253.7 72 200 125.7 200 192C200 258.3 253.7 312 320 312zM290.3 368C191.8 368 112 447.8 112 546.3C112 562.7 125.3 576 141.7 576L498.3 576C514.7 576 528 562.7 528 546.3C528 447.8 448.2 368 349.7 368L290.3 368z" />
                </svg>
            </button>

            <!-- Dropdown đăng nhập / đăng ký -->
            <div
                class="absolute right-0 top-full w-36 bg-white border shadow-lg border-gray-200
               opacity-0 invisible group-hover:opacity-100 group-hover:visible transition duration-300 z-50 border-t-0">
                <ul class="flex flex-col text-sm">
                    @guest
                    <li>
                        <a href="{{ route('login') }}" class="block px-4 py-1 hover:underline">Đăng nhập</a>
                    </li>
                    <li>
                        <a href="{{ route('register.create') }}" class="block px-4 py-1 hover:underline">Đăng ký</a>
                    </li>
                    @endguest
                    @auth
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-3 hover:underline">
                                Đăng xuất
                            </button>
                        </form>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>