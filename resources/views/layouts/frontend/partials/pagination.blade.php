@if ($paginator->hasPages())
    <ul class="pagination pagination-lg justify-content-end">
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0" href="#" tabindex="-1">Previous</a>
            </li>
        @else
            <li class="page-item">
                <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark" href="{{ $paginator->previousPageUrl() }}">Previous</a>
            </li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item disabled">{{ $element }}</li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item disabled">
                            <a class="page-link active rounded-0 shadow-sm border-top-0 border-left-0">{{ $page }}</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a>
            </li>
        @else
            <li class="page-item disabled">
                <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0" href="#">Next</a>
            </li>
        @endif
    </ul>
@endif
