@props(['url', 'label'])

<li>
    <a href="{{ url($url) }}" class="flex items-center px-4 py-[10px] rounded-lg group space-x-2
              {{ request()->is($url) ? 'bg-[#1677ff] text-gray-100' : 'text-gray-300 hover:text-gray-100' }}">
        <svg class="w-4 h-4 fill-current transition-colors duration-200
                   {{ request()->is($url) ? 'text-gray-100' : 'text-gray-300 group-hover:text-gray-100' }}"
            viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
            {!! $slot !!}
        </svg>
        <span class="transition-colors duration-200
                     {{ request()->is($url) ? 'text-gray-100' : 'text-gray-300 group-hover:text-gray-100' }}">
            {{ $label }}
        </span>
    </a>
</li>