
@if ($paginator->hasPages())
    <style>
        .pagination-pss {
            display: flex !important;
            gap: 9px;
        }

        .as-pagination li {
            margin: 0 4px;
        }

        .pagination-pss .active span {
            color: white;
            background-color: var(--theme-color2);
        }

        .pagination-pss .disabled span:hover {
            color: white;
            background-color: var(--smoke-color4) !important;
        }

        @media (max-width: 768px) {
            .pagination-pss {
                display: flex !important;
                gap: unset;
            }

            .as-pagination li {
                margin: auto;
            }
        }
    </style>
    <div class="as-pagination space-extra2-top d-none d-md-block">
        <ul class="pagination-pss">
            {{-- Previous Arrow --}}
            @php
                $total = $paginator->lastPage();
                $current = $paginator->currentPage();
            @endphp

            {{-- Previous Arrow --}}
            @if ($paginator->onFirstPage())
                <li class="disabled"><span><i class="fas fa-arrow-left"></i></span></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}"><i class="fas fa-arrow-left"></i></a></li>
            @endif

            {{-- Always show page 1 --}}
            @if ($current == 1)
                <li class="active"><span>1</span></li>
            @else
                <li><a href="{{ $paginator->url(1) }}">1</a></li>
            @endif

            {{-- Show ... after 1 if needed --}}
            @if ($current > 3)
                <li class="disabled"><span>...</span></li>
            @endif

            {{-- Middle pages logic --}}
            @for ($i = max(2, $current - 1); $i <= min($total - 1, $current + 1); $i++)
                @if ($i == 1 || $i == $total) @continue @endif

                @if ($i == $current)
                    <li class="active"><span>{{ $i }}</span></li>
                @else
                    <li><a href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                @endif
            @endfor

            {{-- Show ... before last if needed --}}
            @if ($current < $total - 2)
                <li class="disabled"><span>...</span></li>
            @endif

            {{-- Always show last page if it's not the same as current --}}
            @if ($total > 1)
                @if ($current == $total)
                    <li class="active"><span>{{ $total }}</span></li>
                @else
                    <li><a href="{{ $paginator->url($total) }}">{{ $total }}</a></li>
                @endif
            @endif

            {{-- Next Arrow --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}"><i class="fas fa-arrow-right"></i></a></li>
            @else
                <li class="disabled"><span><i class="fas fa-arrow-right"></i></span></li>
            @endif

        </ul>
    </div>
@endif

@php
    $current = $paginator->currentPage();
    $last = $paginator->lastPage();
@endphp

@if ($paginator->hasPages())
    <div class="as-pagination space-extra2-top d-block d-md-none">
        <ul class="pagination-pss">
            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <li class="disabled"><span><i class="fas fa-arrow-left"></i></span></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}"><i class="fas fa-arrow-left"></i></a></li>
            @endif

            {{-- Page 1 --}}
            @if ($current == 1)
                <li class="active"><span>1</span></li>
            @else
                <li><a href="{{ $paginator->url(1) }}">1</a></li>
            @endif

            {{-- Dots after 1 --}}
            @if ($current > 2)
                <li class="disabled"><span>...</span></li>
            @endif

            {{-- Current page (if not 1 or last) --}}
            @if ($current > 1 && $current < $last)
                <li class="active"><span>{{ $current }}</span></li>
            @endif

            {{-- Dots before last --}}
            @if ($current < $last - 1)
                <li class="disabled"><span>...</span></li>
            @endif

            {{-- Last page --}}
            @if ($last != 1)
                @if ($current == $last)
                    <li class="active"><span>{{ $last }}</span></li>
                @else
                    <li><a href="{{ $paginator->url($last) }}">{{ $last }}</a></li>
                @endif
            @endif

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}"><i class="fas fa-arrow-right"></i></a></li>
            @else
                <li class="disabled"><span><i class="fas fa-arrow-right"></i></span></li>
            @endif
        </ul>
    </div>
@endif



{{-- Pagination Elements --}}


{{-- Next Page Link --}}