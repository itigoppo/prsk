@if ($paginator->hasPages())
  <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}">
    <div class="flex items-center justify-between text-xs md:hidden">
      @if (!$paginator->onFirstPage())
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
          class="flex cursor-pointer items-center justify-center gap-1 rounded border border-puerto-rico-300 bg-white py-2 pl-2 pr-4 leading-none hover:bg-puerto-rico-100">
          <x-material-symbol optical-size="20">navigate_before</x-material-symbol>
          <span>Previous</span>
        </a>
      @else
        <span
          class="flex items-center justify-center gap-1 rounded border border-gray-500 bg-white py-2 pl-2 pr-4 leading-none text-gray-300">
          <x-material-symbol optical-size="20">navigate_before</x-material-symbol>
          <span>Previous</span>
        </span>
      @endif

      <span>
        @if ($paginator->firstItem())
          {{ $paginator->firstItem() }}〜{{ $paginator->lastItem() }}
        @else
          {{ $paginator->count() }}
        @endif
        / {{ $paginator->total() }}
        {{-- @dd($paginator->lastPage()) --}}
      </span>

      @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" rel="prev"
          class="flex cursor-pointer items-center justify-center gap-1 rounded border border-puerto-rico-300 bg-white py-2 pl-4 pr-2 leading-none hover:bg-puerto-rico-100">
          <span>Next</span>
          <x-material-symbol optical-size="20">navigate_next</x-material-symbol>
        </a>
      @else
        <span
          class="flex items-center justify-center gap-1 rounded border border-gray-500 bg-white py-2 pl-4 pr-2 leading-none text-gray-300">
          <span>Next</span>
          <x-material-symbol optical-size="20">navigate_next</x-material-symbol>
        </span>
      @endif
    </div>

    <div class="max-md:hidden">
      <div class="flex items-center justify-end gap-4">
        <span class="text-xs font-bold leading-normal">
          {{ $paginator->total() }}件中
          @if ($paginator->firstItem())
            {{ $paginator->firstItem() }}〜{{ $paginator->lastItem() }}
          @else
            {{ $paginator->count() }}
          @endif
          件表示中
        </span>

        <div class="flex text-xs">
          @if (!$paginator->onFirstPage())
            <a href="{{ $paginator->url(1) }}" rel="prev"
              class="flex h-8 w-8 cursor-pointer items-center justify-center rounded-l border-y border-l border-puerto-rico-300 bg-white leading-none">
              <x-material-symbol optical-size="20">first_page</x-material-symbol>
            </a>
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
              class="flex h-8 w-8 cursor-pointer items-center justify-center border-y border-l border-puerto-rico-300 bg-white leading-none">
              <x-material-symbol optical-size="20">navigate_before</x-material-symbol>
            </a>
          @else
            <span
              class="flex h-8 w-8 items-center justify-center rounded-l border-y border-l border-puerto-rico-300 bg-white leading-none text-gray-300">
              <x-material-symbol optical-size="20">first_page</x-material-symbol>
            </span>
            <span
              class="flex h-8 w-8 items-center justify-center border-y border-l border-puerto-rico-300 bg-white leading-none text-gray-300">
              <x-material-symbol optical-size="20">navigate_before</x-material-symbol>
            </span>
          @endif

          @foreach ($elements as $element)
            @if (is_string($element))
              <span
                class="flex h-8 w-8 items-center justify-center border-y border-r border-puerto-rico-300 bg-white leading-none text-puerto-rico-300">
                {{ $element }}
              </span>
            @endif

            @if (is_array($element))
              @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                  <span aria-current="page" @class([
                      'flex h-8 w-8 items-center justify-center border-y border-r border-atlantis-300 font-semibold text-atlantis-300 bg-white leading-none',
                      'border-l' => $page === 1,
                  ])>
                    {{ $page }}
                  </span>
                @else
                  <a href="{{ $url }}" @class([
                      'flex h-8 w-8 cursor-pointer items-center justify-center border-y border-r border-puerto-rico-300 bg-white leading-none',
                      'border-l' => $page === 1,
                  ])
                    aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                    {{ $page }}
                  </a>
                @endif
              @endforeach
            @endif
          @endforeach

          @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="prev"
              class="flex h-8 w-8 cursor-pointer items-center justify-center border-y border-r border-puerto-rico-300 bg-white leading-none">
              <x-material-symbol optical-size="20">navigate_next</x-material-symbol>
            </a>
            <a href="{{ $paginator->url($paginator->lastPage()) }}" rel="prev"
              class="flex h-8 w-8 cursor-pointer items-center justify-center rounded-r border-y border-r border-puerto-rico-300 bg-white leading-none">
              <x-material-symbol optical-size="20">last_page</x-material-symbol>
            </a>
          @else
            <span
              class="flex h-8 w-8 items-center justify-center border-y border-r border-puerto-rico-300 bg-white leading-none text-gray-300">
              <x-material-symbol optical-size="20">navigate_next</x-material-symbol>
            </span>
            <span
              class="flex h-8 w-8 items-center justify-center rounded-r border-y border-r border-puerto-rico-300 bg-white leading-none text-gray-300">
              <x-material-symbol optical-size="20">last_page</x-material-symbol>
            </span>
          @endif
        </div>
      </div>
    </div>
  </nav>
@else
  <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}">
    <div class="max-md:hidden">
      <div class="flex items-center justify-end gap-4">
        <span class="text-xs font-bold leading-normal">
          {{ $paginator->total() }}件中
          @if ($paginator->firstItem())
            {{ $paginator->firstItem() }}〜{{ $paginator->lastItem() }}
          @else
            {{ $paginator->count() }}
          @endif
          件表示中
        </span>
      </div>
    </div>
  </nav>
@endif
