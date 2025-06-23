<nav>
    <ul class="pagination">

        @if ($paginator->onFirstPage())

        @else

        <li class="page-item" aria-disabled="true" aria-label="« Previous">

            <a class="page-link" onclick="loadPagination('{{ $paginator->previousPageUrl() }}')" href="javascript:;">‹</a>
        </li>
        @endif


        @foreach ($elements as $element)
            @if (is_array($element))
                @if (count($element) < 2)

                @else
                    @foreach ($element as $key => $el)
                        @if ($key == $paginator->currentPage())

                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $key }}</span></li>
                        @else

                        <li class="page-item">
                            <a class="page-link" href="javascript:;" onclick="loadPagination('{{ $el }}')">{{ $key }}</a>
                        </li>
                        @endif
                    @endforeach
                @endif

            @else
            <li class="page-item">
                <a class="page-link" href="javascript:;" >...</a>
            </li>
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" onclick="loadPagination('{{ $paginator->nextPageUrl() }}')" href="javascript:;" rel="next" aria-label="Next »">›</a>
            </li>
        @endif


    </ul>
</nav>
