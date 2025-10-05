<aside
    class="fixed top-0 left-0 z-40 w-[200px] h-screen transition-transform -translate-x-full sm:translate-x-0 mt-[64px]"
    aria-label="Sidebar">
    <div class="h-full px-1 py-[6px] overflow-y-auto bg-[#001529]">
        <ul class="space-y-3 font-medium text-sm">

            {{-- Trang chủ --}}
            <x-dashboard.navbar url="dashboard" label="Trang chủ">
                <path
                    d="M946.5 505L560.1 118.8l-25.9-25.9a31.5 31.5 0 00-44.4 0L77.5 505a63.9 63.9 0 00-18.8 46c.4 35.2 29.7 63.3 64.9 63.3h42.5V940h691.8V614.3h43.4c17.1 0 33.2-6.7 45.3-18.8a63.6 63.6 0 0018.7-45.3c0-17-6.7-33.1-18.8-45.2zM568 868H456V664h112v204z">
                </path>
            </x-dashboard.navbar>

            <li class="relative group">
                <!-- Nút chính -->
                <button
                    class="px-4 flex items-center justify-between w-full p-2 text-gray-300 rounded-lg space-x-2 hover:text-white">
                    <div class="flex items-center space-x-2">
                        <svg class="w-3.5 h-3.5 transition duration-75 flex-shrink-0" fill="currentColor"
                            viewBox="64 64 896 896" aria-hidden="true">
                            <path
                                d="M257.7 752c2 0 4-.2 6-.5L431.9 722c2-.4 3.9-1.3 5.3-2.8l423.9-423.9a9.96 9.96 0 000-14.1L694.9 114.9c-1.9-1.9-4.4-2.9-7.1-2.9s-5.2 1-7.1 2.9L256.8 538.8c-1.5 1.5-2.4 3.3-2.8 5.3l-29.5 168.2a33.5 33.5 0 009.4 29.8c6.6 6.4 14.9 9.9 23.8 9.9zm67.4-174.4L687.8 215l73.3 73.3-362.7 362.6-88.9 15.7 15.6-89zM880 836H144c-17.7 0-32 14.3-32 32v36c0 4.4 3.6 8 8 8h784c4.4 0 8-3.6 8-8v-36c0-17.7-14.3-32-32-32z">
                            </path>
                        </svg>
                        <span>Duyệt sách</span>
                    </div>
                    <svg class="w-3.5 h-3.5 transition-transform duration-200 group-hover:text-white group-[.open]:rotate-90"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <!-- Submenu -->
                <ul class="hidden group-[.open]:block mt-1 text-sm space-y-1">
                    <li>
                        <a href="{{ route('dashboard.approval.index', 'wait') }}"
                            class="{{ request()->is('dashboard/approval/wait') ? 'bg-[#1677ff] text-white' : 'text-gray-300 hover:text-white' }} block px-4 py-3 rounded-lg">
                            Yêu cầu mượn sách
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.approval.index', 'reading') }}"
                            class="{{ request()->is('dashboard/approval/reading') ? 'bg-[#1677ff] text-white' : 'text-gray-300 hover:text-white' }} block px-4 py-3 rounded-lg">
                            Sách đang được mượn
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.approval.index', 'overdue') }}"
                            class="{{ request()->is('dashboard/approval/overdue') ? 'bg-[#1677ff] text-white' : 'text-gray-300 hover:text-white' }} block px-4 py-3 rounded-lg">
                            Sách đã quá hạn trả
                        </a>
                    </li>
                </ul>
            </li>


            {{-- Danh mục sách --}}
            <x-dashboard.navbar url="dashboard/categories" label="Danh mục sách">
                <path
                    d="M938 458.8l-29.6-312.6c-1.5-16.2-14.4-29-30.6-30.6L565.2 86h-.4c-3.2 0-5.7 1-7.6 2.9L88.9 557.2a9.96 9.96 0 000 14.1l363.8 363.8c1.9 1.9 4.4 2.9 7.1 2.9s5.2-1 7.1-2.9l468.3-468.3c2-2.1 3-5 2.8-8z">
                </path>
            </x-dashboard.navbar>

            {{-- Menu có submenu --}}
            <li class="relative group">
                <!-- Nút chính -->
                <button
                    class="px-4 flex items-center justify-between w-full p-2 text-gray-300 rounded-lg space-x-2 hover:text-white">
                    <div class="flex items-center space-x-2">
                        <svg class="w-3.5 h-3.5 transition duration-75 flex-shrink-0" fill="currentColor"
                            viewBox="64 64 896 896" aria-hidden="true">
                            <path
                                d="M832 64H724c-4.4 0-8 3.6-8 8v848c0 4.4 3.6 8 8 8h108c17.7 0 32-14.3 32-32V96c0-17.7-14.3-32-32-32zm-54 728H752V232h26v560zM668 64H192c-17.7 0-32 14.3-32 32v832c0 17.7 14.3 32 32 32h476c4.4 0 8-3.6 8-8V72c0-4.4-3.6-8-8-8z">
                            </path>
                        </svg>
                        <span>Sách</span>
                    </div>
                    <svg class="w-3.5 h-3.5 transition-transform duration-200 group-hover:text-white group-[.open]:rotate-90"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <!-- Submenu -->
                <ul class="hidden group-[.open]:block mt-1 text-sm space-y-1">
                    <li>
                        <a href="{{ url('dashboard/books') }}"
                            class="{{ request()->is('dashboard/books') ? 'bg-[#1677ff] text-white' : 'text-gray-300 hover:text-white' }} px-4 flex items-center p-[12px] rounded-lg space-x-2">
                            Danh sách
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('dashboard/books/create') }}"
                            class="{{ request()->is('dashboard/books/create') ? 'bg-[#1677ff] text-white' : 'text-gray-300 hover:text-white' }} px-4 flex items-center p-[12px] rounded-lg space-x-2">
                            Thêm sách
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</aside>