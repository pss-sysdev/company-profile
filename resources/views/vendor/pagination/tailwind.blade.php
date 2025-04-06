@if ($paginator->hasPages())
    <div class="as-pagination space-extra2-top">
        <ul>
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true"><i class="fas fa-arrow-left"></i></span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i
                            class="fas fa-arrow-left"></i></a>
                </li>
            @endif
            {{-- <li><a href="blog.html">01</a></li>
            <li><a href="blog.html">02</a></li>
            <li><a href="blog.html">03</a></li> --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="" aria-current="page"><a class="active"
                                    href="#">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i
                            class="fas fa-arrow-right"></i></a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true"><i class="fas fa-arrow-right"></i></span>
                </li>
            @endif
        </ul>
    </div>
@endif



{{-- Pagination Elements --}}


{{-- Next Page Link --}}
