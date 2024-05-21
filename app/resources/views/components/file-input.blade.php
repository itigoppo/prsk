@props(['disabled' => false])

<input @disabled($disabled) {!! $attributes->merge([
    'class' =>
        'rounded-md border border-gray-300 text-xs leading-none tracking-[0.56px] shadow-sm outline-none file:mr-4 file:cursor-pointer file:border-0 file:bg-gradient-to-r file:from-puerto-rico-400 file:to-puerto-rico-300 file:px-4 file:py-3 file:font-bold file:leading-none file:tracking-[0.56px] file:text-white file:hover:opacity-70 focus:border-puerto-rico-300 focus:ring-puerto-rico-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-puerto-rico-600 dark:focus:ring-puerto-rico-600 disabled:bg-gray-400 disabled:text-white file:disabled:cursor-not-allowed',
]) !!} />
