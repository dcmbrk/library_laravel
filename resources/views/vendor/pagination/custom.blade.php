@if ($paginator->hasPages())
<nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center">
    <ul class="inline-flex items-center space-x-1 text-sm">
        {{-- Nút Previous --}}
        @if ($paginator->onFirstPage())
        <li>
            <span
                class="w-8 h-8 flex items-center justify-center border border-gray-300 text-gray-400 cursor-not-allowed text-xs rounded">
                ←
            </span>
        </li>
        @else
        <li>
            <a href="{{ $paginator->previousPageUrl() }}"
                class="w-8 h-8 flex items-center justify-center border border-gray-300 text-gray-600 hover:border-blue-400 hover:text-blue-500 text-xs rounded">
                ←
            </a>
        </li>
        @endif

        {{-- Các số trang --}}
        @foreach ($elements as $element)
        @if (is_string($element))
        <li>
            <span class="w-8 h-8 flex items-center justify-center text-gray-500 text-xs">...</span>
        </li>
        @endif

        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li>
            <span
                class="w-8 h-8 flex items-center justify-center border border-blue-500 text-blue-500 font-medium text-xs rounded bg-blue-50">
                {{ $page }}
            </span>
        </li>
        @else
        <li>
            <a href="{{ $url }}"
                class="w-8 h-8 flex items-center justify-center border border-gray-300 text-gray-700 hover:border-blue-400 hover:text-blue-500 text-xs rounded">
                {{ $page }}
            </a>
        </li>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Nút Next --}}
        @if ($paginator->hasMorePages())
        <li>
            <a href="{{ $paginator->nextPageUrl() }}"
                class="w-8 h-8 flex items-center justify-center border border-gray-300 text-gray-600 hover:border-blue-400 hover:text-blue-500 text-xs rounded">
                →
            </a>
        </li>
        @else
        <li>
            <span
                class="w-8 h-8 flex items-center justify-center border border-gray-300 text-gray-400 cursor-not-allowed text-xs rounded">
                →
            </span>
        </li>
        @endif
    </ul>
</nav>
@endif