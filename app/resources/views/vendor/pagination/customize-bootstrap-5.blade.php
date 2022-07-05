@if ($paginator->hasPages())
    <nav>
        <ul class="pagination justify-content-end">
            {{-- First Page View --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.first')">
                    <span class="page-link" aria-hidden="true">&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->url(1) }}" rel="first"
                       aria-label="@lang('pagination.first')">&laquo;</a>
                </li>
            @endif

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                       aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            @php
                $paginateLimit = 5;
                $startPage = 1;
                $endPage = $paginator->lastPage();
                if ($paginator->lastPage() > $paginateLimit) {
                    if ($paginator->currentPage() <= floor($paginateLimit / 2)) {
                        // 現在ページが表示するリンクの中心位置よりも左の時
                        $endPage = $paginateLimit;
                    } elseif ($paginator->currentPage() > $paginator->lastPage() - floor($paginateLimit / 2)) {
                        // 現在ページが表示するリンクの中心位置よりも右の時
                        $startPage = $paginator->lastPage() - ($paginateLimit - 1);
                        $endPage = $paginator->lastPage();
                    } else {
                        // 現在ページが表示するリンクの中心位置の時
                        $startPage = $paginator->currentPage() - (floor(($paginateLimit % 2 == 0 ? $paginateLimit - 1 : $paginateLimit)  / 2));
                        $endPage = $paginator->currentPage() + floor($paginateLimit / 2);
                    }
                }
            @endphp

            {{-- Pagination Elements --}}
            @if ($startPage != 1)
                <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
            @endif

            @for ($i = $startPage; $i <= $endPage; $i++)
                @if ($i == $paginator->currentPage())
                    <li class="page-item active" aria-current="page"><span class="page-link">{{ $i }}</span>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                @endif
            @endfor

            @if ($endPage != $paginator->lastPage())
                <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"
                       aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif

            {{-- Last Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}" rel="last"
                       aria-label="@lang('pagination.last')">&raquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.last')">
                    <span class="page-link" aria-hidden="true">&raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
