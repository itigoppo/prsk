@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-puerto-rico-300 dark:focus:border-puerto-rico-600 focus:ring-puerto-rico-300 dark:focus:ring-puerto-rico-600 rounded-md shadow-sm',
]) !!}>
