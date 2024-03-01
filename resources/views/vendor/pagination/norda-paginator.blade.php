@if ($paginator->hasPages())
    <nav class="d-flex justify-items-center justify-content-between">
        <div class="pro-pagination-style text-center mt-10">
        <div class="d-flex justify-content-between flex-fill d-sm-none">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true"><a class="prev disabled"><i class="icon-arrow-left"></i></a></li>
                @else
                    <li class="page-item"><a class="prev" href="{{ $paginator->previousPageUrl() }}" aria-label="Предыдущая"><i class="icon-arrow-left"></i></a></li>
                @endif

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Следующая</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">Следующая</span>
                    </li>
                @endif
            </ul>
        </div>

        <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
            <div>
                <p class="small text-muted">
                    {!! __('Показаны') !!}
                    <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
                    {!! __('-') !!}
                    <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
                    {!! __('из') !!}
                    <span class="fw-semibold">{{ $paginator->total() }}</span>
                    {!! __('результатов') !!}
                </p>
            </div>

            <div>
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="Предыдущая">
                            <span class="page-link" aria-hidden="true">&lsaquo;</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Предыдущая">&lsaquo;</a>
                        </li>
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
{{--                                    <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>--}}
                                    <li><a class="page-item active active" aria-current="page">{{ $page }}</a></li>
                                @else
{{--                                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>--}}
                                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
{{--                        <li class="page-item">--}}
{{--                            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Следующая">&rsaquo;</a>--}}
{{--                        </li>--}}
                        <li><a class="next" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Следующая"><i class="icon-arrow-right"></i></a></li>
                    @else
{{--                        <li class="page-item disabled" aria-disabled="true" aria-label="Следующая">--}}
{{--                            <span class="page-link" aria-hidden="true">&rsaquo;</span>--}}
{{--                        </li>--}}
                        <li><a class="next disabled"><i class="icon-arrow-right"></i></a></li>
                    @endif
                </ul>
            </div>
        </div>
        </div>
    </nav>
@endif
