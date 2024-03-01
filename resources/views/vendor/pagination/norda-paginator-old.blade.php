@if ($paginator->hasPages())
    <div class="pro-pagination-style text-center mt-10">
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li><a class="prev disabled"><i class="icon-arrow-left"></i></a></li>
            @else
                <li><a class="prev" href="{{ $paginator->previousPageUrl() }}" aria-label="@lang('pagination.previous')"><i class="icon-arrow-left"></i></a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><a class="active" aria-current="page">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a class="next" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="icon-arrow-right"></i></a></li>
            @else
                <li><a class="next disabled"><i class="icon-arrow-right"></i></a></li>
            @endif
        </ul>
    </nav>
    </div>
@endif

{{--<div class="pro-pagination-style text-center mt-10">--}}
{{--    <ul>--}}
{{--        <li><a class="prev" href="#"><i class="icon-arrow-left"></i></a></li>--}}
{{--        <li><a class="active" href="#">1</a></li>--}}
{{--        <li><a href="#">2</a></li>--}}
{{--        <li><a href="#">3</a></li>--}}
{{--        <li><a class="next" href="#"><i class="icon-arrow-right"></i></a></li>--}}
{{--    </ul>--}}
{{--</div>--}}
