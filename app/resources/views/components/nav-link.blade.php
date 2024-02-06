@props(['active'])

@php
  $classes = 'inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 transition duration-150 ease-in-out border-b-2';
  if (Auth::check()) {
      $classes .= $active ?? false ? ' text-white border-puerto-rico-600' : ' text-puerto-rico-200 border-transparent';
      $classes .= ' hover:text-puerto-rico-600 focus:text-puerto-rico-600';
  } else {
      $classes .= $active ?? false ? ' text-white border-azure-100' : ' text-gray-300 border-transparent';
      $classes .= ' hover:text-white focus:text-white';
  }
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
  {{ $slot }}
</a>
