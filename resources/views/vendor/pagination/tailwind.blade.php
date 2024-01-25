@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}">
        <div class="flex justify-center gap-4 flex-1 sm:hidden text-white">
            @if (! $paginator->onFirstPage())
                <a href="{{ $paginator->previousPageUrl() }}" class="bg-p2_sec-2 rounded w-7 h-7 flex justify-center items-center pg">
                &#60
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="bg-p2_sec-2 rounded w-7 h-7 flex justify-center items-center pg">
                    >
                </a>
            @endif
        </div>
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-center ">
            <div>
                <span class="flex justify-center gap-4 font-nunito-700 text-xl/[20px] text-white">
                    {{-- Previous Page Link --}}
                    @if (! $paginator->onFirstPage())
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="bg-p2_sec-2 rounded w-7 h-7 flex justify-center items-center pg w-5 h-5" aria-label="{{ __('pagination.previous') }}">
                            <
                        </a>
                    @else
                        <span rel="prev" class="bg-p2_sec-2 rounded w-7 h-7 flex justify-center items-center opacity-30">
                            <
                        </span>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="bg-p2_sec-2 rounded w-7 h-7 flex justify-center items-center">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span class="bg-header rounded w-7 h-7 flex justify-center items-center">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="bg-p2_sec-2 rounded w-7 h-7 flex justify-center items-center pg" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="bg-p2_sec-2 rounded w-7 h-7 flex justify-center items-center pg w-5 h-5" aria-label="{{ __('pagination.next') }}">
                            >
                        </a>
                    @else
                        <span rel="next" class="bg-p2_sec-2 rounded w-7 h-7 flex justify-center items-center opacity-30 w-5 h-5">
                            >
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
