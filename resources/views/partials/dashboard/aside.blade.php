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

            {{-- Người dùng --}}
            <x-dashboard.navbar url="dashboard/users" label="Người dùng">
                <path
                    d="M858.5 763.6a374 374 0 00-80.6-119.5 375.63 375.63 0 00-119.5-80.6c-.4-.2-.8-.3-1.2-.5C719.5 518 760 444.7 760 362c0-137-111-248-248-248S264 225 264 362c0 82.7 40.5 156 102.8 201.1-.4.2-.8.3-1.2.5-44.8 18.9-85 46-119.5 80.6a375.63 375.63 0 00-80.6 119.5A371.7 371.7 0 00136 901.8a8 8 0 008 8.2h60c4.4 0 7.9-3.5 8-7.8 2-77.2 33-149.5 87.8-204.3 56.7-56.7 132-87.9 212.2-87.9s155.5 31.2 212.2 87.9C779 752.7 810 825 812 902.2c.1 4.4 3.6 7.8 8 7.8h60a8 8 0 008-8.2c-1-47.8-10.9-94.3-29.5-138.2z">
                </path>
            </x-dashboard.navbar>

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