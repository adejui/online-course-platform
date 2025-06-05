@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-end text-sm pt-5 pb-1 px-5">
        <span class="inline-flex rounded-md shadow-sm">
            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                    <span
                        class="inline-flex items-center px-2 py-1 text-xs font-medium text-gray-400 bg-gray-200 cursor-default rounded-l-md"
                        aria-hidden="true">&laquo;</span>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                    class="inline-flex items-center px-2 py-1 text-xs font-medium text-gray-700 bg-white border border-gray-300 rounded-l-md hover:bg-gray-100"
                    aria-label="{{ __('pagination.previous') }}">&laquo;</a>
            @endif

            {{-- Page Numbers --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span aria-disabled="true">
                        <span
                            class="inline-flex items-center px-2 py-1 -ml-px text-xs font-medium text-gray-700 bg-white border border-gray-300 cursor-default">{{ $element }}</span>
                    </span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span aria-current="page">
                                <span
                                    class="inline-flex items-center px-2 py-1 -ml-px text-xs font-medium text-white bg-blue-600 border border-blue-600 cursor-default">{{ $page }}</span>
                            </span>
                        @else
                            <a href="{{ $url }}"
                                class="inline-flex items-center px-2 py-1 -ml-px text-xs font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-100"
                                aria-label="Go to page {{ $page }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                    class="inline-flex items-center px-2 py-1 -ml-px text-xs font-medium text-gray-700 bg-white border border-gray-300 rounded-r-md hover:bg-gray-100"
                    aria-label="{{ __('pagination.next') }}">&raquo;</a>
            @else
                <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                    <span
                        class="inline-flex items-center px-2 py-1 -ml-px text-xs font-medium text-gray-400 bg-gray-200 cursor-default rounded-r-md"
                        aria-hidden="true">&raquo;</span>
                </span>
            @endif
        </span>
    </nav>
@endif
