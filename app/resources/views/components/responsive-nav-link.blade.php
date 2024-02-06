@props(['active'])

@php
  // $classes = $active ?? false ? 'block w-full ps-3 pe-4 py-2 border-l-4
//border-puerto-rico-400 dark:border-puerto-rico-600
//text-start text-base font-medium text-puerto-rico-700 dark:text-puerto-rico-300
// bg-puerto-rico-50 dark:bg-puerto-rico-900/50
// focus:outline-none focus:text-puerto-rico-800 dark:focus:text-puerto-rico-200 focus:bg-puerto-rico-100 dark:focus:bg-puerto-rico-900
// focus:border-puerto-rico-700 dark:focus:border-puerto-rico-300 transition duration-150 ease-in-out'
  //: 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600 focus:outline-none focus:text-gray-800 dark:focus:text-gray-200 focus:bg-gray-50 dark:focus:bg-gray-700 focus:border-gray-300 dark:focus:border-gray-600 transition duration-150 ease-in-out';

  $classes = 'block w-full ps-3 pe-4 py-2 text-start text-base font-medium focus:outline-none transition duration-150 ease-in-out flex items-center';
  if (Auth::check()) {
      $classes .= $active ?? false ? ' text-white border-puerto-rico-600' : ' text-puerto-rico-200 border-transparent';
      $classes .= ' hover:text-puerto-rico-600 focus:text-puerto-rico-600';
  } else {
      $classes .= $active ?? false ? ' text-white border-azure-100' : ' text-gray-300 border-transparent';
      $classes .= ' hover:text-white focus:text-white';
  }
@endphp
<a {{ $attributes->merge(['class' => $classes]) }}>
  <div>{{ $slot }}</div>
  @if ($active ?? false)
    <x-material-symbol type="rounded" optical-size="20" class="ml-1">keyboard_double_arrow_left</x-material-symbol>
  @endif
</a>
