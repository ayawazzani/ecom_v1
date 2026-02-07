@if ($paginator->hasPages())
    <nav class="pagination-nav">
        <ul class="custom-pagination">
            {{-- زر السابق --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled"><span>« Previous</span></li>
            @else
                <li class="page-item">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev">« Previous</a>
                </li>
            @endif

            {{-- أرقام الصفحات --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled"><span>{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active"><span>{{ $page }}</span></li>
                        @else
                            <li class="page-item">
                                <a href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- زر التالي --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next">Next »</a>
                </li>
            @else
                <li class="page-item disabled"><span>Next »</span></li>
            @endif
        </ul>
    </nav>
@endif