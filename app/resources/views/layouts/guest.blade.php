<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
  <div class="flex min-h-screen flex-col items-center bg-gray-50 pt-6 dark:bg-gray-900 sm:justify-center sm:pt-0">
    <div class="focus:outline-none focus:ring-2 focus:ring-puerto-rico-500 focus:ring-offset-2">
      <a href="/">
        <x-application-logo type="rounded" opticalSize="48" class="text-puerto-rico-400" />
      </a>
    </div>

    <div class="mt-6 w-full overflow-hidden bg-white px-6 py-4 shadow-md dark:bg-gray-800 sm:max-w-md sm:rounded-lg">
      {{ $slot }}
    </div>
  </div>
</body>

</html>
