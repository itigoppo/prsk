@if (session('success'))
  <div class="absolute start-1/2 top-5 -translate-x-1/2" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
    x-cloak x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform -translate-y-5"
    x-transition:enter-end="opacity-100 transform translate-y-full" x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 transform translate-y-full"
    x-transition:leave-end="opacity-0 transform -translate-y-5">
    <div
      class="pointer-events-auto flex items-center gap-1 rounded-lg bg-white px-4 py-3 text-sm shadow-lg ring-1 ring-black ring-opacity-5">
      <x-material-symbol :fill="true" class="text-puerto-rico-300"
        optical-size="20">check_circle</x-material-symbol>
      <span>{{ session('success') }}</span>
    </div>
  </div>
@endif

@if (session('error'))
  <div class="absolute start-1/2 top-5 -translate-x-1/2" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
    x-cloak x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform -translate-y-5"
    x-transition:enter-end="opacity-100 transform translate-y-full" x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 transform translate-y-full"
    x-transition:leave-end="opacity-0 transform -translate-y-5">
    <div
      class="pointer-events-auto flex items-center gap-1 rounded-lg bg-white px-4 py-3 text-sm shadow-lg ring-1 ring-black ring-opacity-5">
      <x-material-symbol :fill="true" class="text-sea-pink-400" optical-size="20">error</x-material-symbol>
      <span>{{ session('error') }}</span>
    </div>
  </div>
@endif
