@if ($paginator->hasPages())
    <ul class="pagination-list">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="pagination-item pagination-item-prev">
                Назад
            </li>
        @else
            <li class="pagination-item pagination-item-prev">
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    Назад
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="pagination-item pagination-item-active"><a>{{ $page }}</a></li>
                    @else
                        <li class="pagination-item pagination-item">
                            <a href="{{ $url }}">
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="pagination-item pagination-item-next">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next">
                    Вперед
                </a>
            </li>
        @else
            <li class="pagination-item pagination-item-next">
                Вперед
            </li>
        @endif
    </ul>
@endif
