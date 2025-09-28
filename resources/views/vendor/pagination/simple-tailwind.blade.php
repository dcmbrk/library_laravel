@if ($paginator->hasPages())
<nav role="navigation" aria-label="{!! __('Pagination Navigation') !!}" class="flex justify-between mt-6">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <span
        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-black border border-black cursor-default leading-5">
        {!! __('pagination.previous') !!}
    </span>
    @else
    <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-black border border-black leading-5 hover:bg-gray-800 focus:outline-none focus:ring ring-gray-300 active:bg-gray-900 transition ease-in-out duration-150">
        {!! __('pagination.previous') !!}
    </a>
    @endif

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}" rel="next"
        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-black border border-black leading-5 hover:bg-gray-800 focus:outline-none focus:ring ring-gray-300 active:bg-gray-900 transition ease-in-out duration-150">
        {!! __('pagination.next') !!}
    </a>
    @else
    <span
        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-black border border-black cursor-default leading-5">
        {!! __('pagination.next') !!}
    </span>
    @endif
</nav>
@endif