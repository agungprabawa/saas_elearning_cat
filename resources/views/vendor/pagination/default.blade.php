@if ($paginator->hasPages())
    <nav class="kt-pagination  kt-pagination--brand" >
        <ul class="kt-pagination__links" style="margin:0 auto">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="kt-pagination__link--next disabled" >
                    <a href="#">
                        <i class="fa fa-angle-left kt-font-brand"></i>
                    </a>
                </li>
            @else
                <li class="kt-pagination__link--next">
                    <a class="" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        <i class="fa fa-angle-left kt-font-brand"></i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="" ><a class="">{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="kt-pagination__link--active" ><a class="">{{ $page }}</a></li>
                        @else
                            <li class=""><a class="" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="kt-pagination__link--prev">
                    <a class="" href="{{ $paginator->nextPageUrl() }}" rel="next" >
                        <i class="fa fa-angle-right kt-font-brand"></i>
                    </a>
                </li>
            @else
                <li class="kt-pagination__link--prev disabled">
                    <span class="" aria-hidden="true">
                        <i class="fa fa-angle-right kt-font-brand"></i>
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
